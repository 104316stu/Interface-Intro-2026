<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Deze pagina verwacht een formulier.');
}

// bij een te groot bestand zijn $_POST en $_FILES allebei leeg
if (empty($_POST) && empty($_FILES)) {
    exit('Bestand te groot, probeer een kleinere afbeelding.');
}

$author = trim($_POST['author'] ?? '');
$title  = trim($_POST['title'] ?? '');
$body   = trim($_POST['body'] ?? '');

if ($author === '' || $title === '' || $body === '') {
    exit('Vul alle velden in.');
}

if (strlen($title) > 70) {
    exit('Titel mag maximaal 70 tekens zijn.');
}

// de textarea stuurt \r\n, index.php splitst op \n
$body = str_replace("\r\n", "\n", $body);

$image = $_FILES['image'] ?? null;

if (!$image || $image['error'] !== UPLOAD_ERR_OK) {
    exit('Er ging iets mis met de upload.');
}

$info = getimagesize($image['tmp_name']);

$allowed = [
    'image/jpeg' => '.jpg',
    'image/png'  => '.png',
    'image/gif'  => '.gif',
    'image/webp' => '.webp',
    'image/avif' => '.avif',
];

if (!$info || !isset($allowed[$info['mime']])) {
    exit('Alleen jpg, png, gif of webp.');
}

// nooit de naam van de gebruiker gebruiken, die kan ../ bevatten
$fileName = 'post_' . bin2hex(random_bytes(8)) . $allowed[$info['mime']];

if (!move_uploaded_file($image['tmp_name'], __DIR__ . '/../Uploads/' . $fileName)) {
    exit('Kon het bestand niet opslaan.');
}

$db = new SQLite3(__DIR__ . '/Posts.sqlite');

$preparedQuery = $db->prepare(
    'SELECT User_id FROM Users WHERE Username = :name'
);

$preparedQuery->bindValue(':name', $author, SQLITE3_TEXT);

$user = $preparedQuery->execute()->fetchArray(SQLITE3_ASSOC);

if ($user) {
    $userId = $user['User_id'];
} else {
    $preparedQuery = $db->prepare(
        'INSERT INTO Users (Username) VALUES (:name)'
    );

    $preparedQuery->bindValue(':name', $author, SQLITE3_TEXT);
    $preparedQuery->execute();

    $userId = $db->lastInsertRowID();
}

// Timestamp niet meegeven, die vult de database zelf
$preparedQuery = $db->prepare(
    'INSERT INTO Posts (User_id, Title, Body, image)
     VALUES (:user, :title, :body, :image)'
);

$preparedQuery->bindValue(':user',  $userId, SQLITE3_INTEGER);
$preparedQuery->bindValue(':title', $title,  SQLITE3_TEXT);
$preparedQuery->bindValue(':body',  $body,   SQLITE3_TEXT);
$preparedQuery->bindValue(':image', 'Uploads/' . $fileName, SQLITE3_TEXT);

$preparedQuery->execute();

// redirect zodat F5 niet nog een post plaatst
header('Location: ../index.php');
exit;
