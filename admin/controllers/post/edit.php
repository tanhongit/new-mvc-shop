<?php

permission_user();

//load model
require_once('admin/models/posts.php');

if (!empty($_POST)) {
    post_update();
}

if (isset($_GET['post_id']))
    $postId = intval($_GET['post_id']);
else $postId = 0;

$title = 'Sửa bài viết - Chị Kòi Quán';
$postNav = 'class="active open"';
$post = get_a_record('posts', $postId);
global $userNav;
$loginUser = get_a_record('users', $userNav);

if ($loginUser['role_id'] == 2) {
    if ($post['post_author'] == $userNav)
        require('admin/views/post/edit.php');
    else header('location:admin.php?controller=post');
} else require('admin/views/post/edit.php');
