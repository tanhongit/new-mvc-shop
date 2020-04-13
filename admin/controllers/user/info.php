<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('admin/models/users.php');
$title = 'Thông tin cá nhân';
$nav_profile = $nav_user = 'class="active open"';
global $linkconnectDB;
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
if (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT id FROM users WHERE id='$user_id'")) == 0) {
    echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> NgườI dùng này không tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
    require('admin/views/user/result.php');
    exit;
}
global $user_nav;
$login_user = get_a_record('users', $user_nav);
if ($user_id != $user_nav && $login_user['role_id'] == 0) {
    header('location:index.php');
    exit;
} elseif ($user_id != $user_nav && $login_user['role_id'] == 2) {
    header('location:admin.php');
    exit;
}
$user_info = get_a_record('users', $user_id);
require('admin/views/user/info.php');
