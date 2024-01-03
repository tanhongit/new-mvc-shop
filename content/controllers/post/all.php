<?php

require_once('content/models/posts.php');
$option = [
    'order_by' => 'id desc',
];
$posts = getRecord('posts', $option);
if (empty($posts)) {
    show404NotFound();
}
$title = 'All Posts - Quán Chị Kòi';
//load view
require('content/views/post/all.php');
