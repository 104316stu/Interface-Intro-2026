<?php

require __DIR__ . '/../Data/GetData.php';

$blogs = [];
foreach ($allPosts as $row) {
    $blogs[] = [
        'id'     => $row['Post_id'],
        'title'  => $row['Title'],
        'author' => $row['Username'],
        'date'   => timetodate($row['Timestamp']),
        'image'  => '../' . $row['image'],
    ];
}

include 'blogs_view.php';
