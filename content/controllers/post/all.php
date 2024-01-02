<?php
require_once('content/models/posts.php');
$option = array(
    'order_by' => 'id desc'
);
$posts = getRecord('posts', $option);
if (empty($posts)) show_404();
$title = 'All Posts - Quán Chị Kòi';
//load view
require('content/views/post/all.php');
