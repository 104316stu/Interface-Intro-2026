<?php

require 'Data/GetData.php';

// main post most recent
function timetodate($timestamp) {
    // database slaat UTC op als tekst, hier weer een getal van maken
    $posted = strtotime($timestamp . ' UTC');

    if (!$posted) {
        return $timestamp;
    }

    $current = time();
    $timeDifference = $current - $posted;
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


$post = [
    'id'     => (int)$postData['Post_id'],
    'title'  => $postData['Title'],
    'author' => $postData['Username'],
    'date'   => timetodate($postData['Timestamp']),
    'image'  => $postData['image'],
    'body'   => explode("\n", $postData['Body'] ?? ''),
];

// sidebar
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
