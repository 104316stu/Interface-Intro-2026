<?php

require 'Data/GetData.php';

$post = [
    'id'     => (int)$postData['Post_id'],
    'title'  => $postData['Title'],
    'author' => $postData['Username'],
    'date'   => timetodate($postData['Timestamp']),
    'image'  => $postData['image'],
    'body'   => explode("\n", $postData['Body'] ?? ''),
];

$sidebar = [];
foreach ($allPosts as $row) {
    if ((int)$row['Post_id'] !== $post['id']) {
        $sidebar[] = [
            'id'    => $row['Post_id'],
            'title' => $row['Title'],
            'image' => $row['image'],
        ];
    }
}

include 'index_view.php';
