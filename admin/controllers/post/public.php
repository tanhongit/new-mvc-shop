<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/posts.php');
$post_id = intval($_GET['post_id']);

$post = get_a_record('posts', $post_id);
global $user_nav;
$login_user = get_a_record('users', $user_nav);

if ($login_user['role_id'] == 2) {
    if ($post['post_author'] == $user_nav) {
        post_public($post_id);
        require('admin/views/post/result.php');
    } else  header('location:admin.php?controller=post');
} else {
    post_public($post_id);
    echo '<div style="padding-top: 200" class="container"><div class="alert alert-success" style="text-align: center;"><strong>Tốt!</strong> Bạn đã thay đổi trại thái của trang là "Công khai". Giờ đây trang này đã có thể xem được đối với người dùng.<br><br> Đến <a href="admin.php?controller=post">All post</a> hoặc <a href="javascript: history.go(-1)">Trở lại</a>.!!</div></div>';
    require('admin/views/post/result.php');
}
