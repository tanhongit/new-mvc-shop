<?php
permission_user();
//load model
require_once('admin/models/posts.php');
if (!empty($_POST)) {
    post_update();
}
if (isset($_GET['post_id'])) $post_id = intval($_GET['post_id']);
else $post_id = 0;
$title = 'Sửa bài viết - Chị Kòi Quán';
$nav_post  = 'class="active open"';
$post = get_a_record('posts', $post_id);
global $userNav;
$login_user = get_a_record('users', $userNav);
if ($login_user['role_id'] == 2) {
    if ($post['post_author'] == $userNav)  require('admin/views/post/edit.php');
    else  header('location:admin.php?controller=post');
} else  require('admin/views/post/edit.php');
