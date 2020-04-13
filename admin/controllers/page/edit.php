<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
//load model
require_once('admin/models/posts.php');
if (!empty($_POST)) {
    page_update();
}
if (isset($_GET['post_id'])) $post_id = intval($_GET['post_id']);
else $post_id = 0;
$title = 'Sửa trang - Chị Kòi Quán';
$nav_page  = 'class="active open"';
$post = get_a_record('posts', $post_id);
global $user_nav;
$login_user = get_a_record('users', $user_nav);
if ($login_user['role_id'] == 2) {
    if ($post['post_author'] == $user_nav)  require('admin/views/page/edit.php');
    else  header('location:admin.php?controller=page');
} else  require('admin/views/page/edit.php');
