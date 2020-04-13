<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/posts.php');
$page_id = intval($_GET['post_id']);

$post = get_a_record('posts', $page_id);
global $user_nav;
$login_user = get_a_record('users', $user_nav);

if ($login_user['role_id'] == 2) {
    if ($post['post_author'] == $user_nav) {
        post_public($page_id);
        require('admin/views/page/result.php');
    } else  header('location:admin.php?controller=page');
} else {
    post_public($page_id);
    echo '<div style="padding-top: 200" class="container"><div class="alert alert-success" style="text-align: center;"><strong>Tốt!</strong> Bạn đã thay đổi trại thái của trang là "Công khai". Giờ đây trang này đã có thể xem được đối với người dùng.<br><br> Đến <a href="admin.php?controller=page">All Page</a> hoặc <a href="javascript: history.go(-1)">Trở lại</a>.!!</div></div>';
    require('admin/views/page/result.php');
}
