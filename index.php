<?php

$post = [
    'title'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pellentesque congue sapien.',
    'author' => 'John Johnathan',
    'date'   => '24th Aug 2023',
    'image'  => 'Uploads/testimage.webp',
    'body'   => [
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pellentesque congue sapien.
        Morbi rhoncus mollis erat ac molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pellentesque congue sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pellentesque congue sapien.',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pellentesque congue sapien.',
    ],
];

$sidebar = [
    ['title' => 'Lorem ipsum dolor...', 'image' => 'Uploads/testimage.webp'],
    ['title' => 'Lorem ipsum dolor...', 'image' => 'Uploads/testimage.webp'],
    ['title' => 'Lorem ipsum dolor...', 'image' => 'Uploads/testimage.webp'],
    ['title' => 'Lorem ipsum dolor...', 'image' => 'Uploads/testimage.webp'],
];

include 'index_view.php';
