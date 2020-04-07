<?php
permission_user();
//load model
require_once('admin/models/posts.php');
if (!empty($_POST)) {
    post_update();
}

if (isset($_GET['post_id'])) $post_id = intval($_GET['post_id']);
else $post_id = 0;
$title = 'Sửa trang - Chị Kòi Quán';
$post = get_a_record('posts', $post_id);
require('admin/views/post/edit.php');
