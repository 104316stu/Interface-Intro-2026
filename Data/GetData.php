<?php

$id = $_GET['id'] ?? null;

$db = new SQLite3(__DIR__ . '/Posts.sqlite');

if ($id) {
    // prepared query voor injections
    $preparedQuery = $db->prepare(
        'SELECT Posts.*, Users.Username
         FROM Posts
         JOIN Users ON Users.User_id = Posts.User_id
         WHERE Post_id = :id'
    );

    $preparedQuery->bindValue(':id', (int)$id, SQLITE3_INTEGER);

    $queryResult = $preparedQuery->execute();
} else {
    // geen id? dan de nieuwste
    $queryResult = $db->query(
        'SELECT Posts.*, Users.Username
         FROM Posts
         JOIN Users ON Users.User_id = Posts.User_id
         ORDER BY Post_id DESC
         LIMIT 1'
    );
}

$postData = $queryResult->fetchArray(SQLITE3_ASSOC);

if (!$postData) {
    exit('Geen post gevonden.');
}

$result = $db->query(
    'SELECT Posts.Post_id, Posts.Title, Posts.image, Posts.Timestamp, Users.Username
     FROM Posts
     JOIN Users ON Users.User_id = Posts.User_id
     ORDER BY Post_id DESC'
);

$allPosts = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $allPosts[] = $row;
}

function timetodate($timestamp) {
    // database slaat UTC op als tekst
    $posted = strtotime($timestamp . ' UTC');

    if (!$posted) {
        return $timestamp;
    }

    $timeDifference = time() - $posted;

    if ($timeDifference < 60) {
        return $timeDifference . ' seconden geleden';
    } elseif ($timeDifference < 3600) {
        return floor($timeDifference / 60) . ' minuten geleden';
    } elseif ($timeDifference < 86400) {
        return floor($timeDifference / 3600) . ' uren geleden';
    } else {
        return floor($timeDifference / 86400) . ' dagen geleden';
    }
}
