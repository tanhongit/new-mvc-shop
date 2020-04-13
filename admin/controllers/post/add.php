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
    post_add();
}

if (isset($_GET['post_id'])) $post_id = intval($_GET['post_id']);
else $post_id = 0;
$post = get_a_record('posts', $post_id);
$title = 'Thêm trang mới - Chị Kòi Quán';
$nav_post  = 'class="active open"';
require('admin/views/post/add.php');
