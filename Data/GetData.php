<?php

$id = $_GET['id'] ?? null;

$db = new SQLite3(__DIR__ . '/Posts.sqlite');

if ($id) {
    // prepared query voor injections
    // specifieke post pakken van de database
    $preparedQuery = $db->prepare(
        'SELECT Posts.*, Users.Username
         FROM Posts
         JOIN Users ON Users.User_id = Posts.User_id
         WHERE Post_id = :id'
    );

    $preparedQuery->bindValue(
        ':id',
        (int)$id,
        SQLITE3_INTEGER
    );

    $queryResult = $preparedQuery->execute();
} else {
    // geen id? dan pakt hij gewoon de nieuwste post
    $queryResult = $db->query(
        'SELECT Posts.*, Users.Username
         FROM Posts
         JOIN Users ON Users.User_id = Posts.User_id
         ORDER BY Post_id DESC
         LIMIT 1'
    );
}

// de post die groot op de pagina komt
$postData = $queryResult->fetchArray(SQLITE3_ASSOC);

if (!$postData) {
    exit('Geen post gevonden.');
}

// alles pakken voor de sidebar, gesorteerd op id
$result = $db->query('SELECT Post_id, Title, image FROM Posts ORDER BY Post_id DESC');

$allPosts = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $allPosts[] = $row;
}
