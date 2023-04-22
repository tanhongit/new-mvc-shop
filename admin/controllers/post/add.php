<?php

permission_user();

//load model
require_once('admin/models/posts.php');

if (!empty($_POST)) {
    addPost();
}

if (isset($_GET['post_id']))
    $postId = intval($_GET['post_id']);
else $postId = 0;

$post = get_a_record('posts', $postId);
$title = 'Thêm trang mới - Chị Kòi Quán';
$postNav = 'class="active open"';

require('admin/views/post/add.php');
