<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
global $user_nav;
$login_user = get_a_record('users', $user_nav);
if ($user_id != $user_nav && $login_user['role_id'] == 0) {
    header('location:index.php');
} elseif ($user_id != $user_nav && $login_user['role_id'] == 2) {
    header('location:admin.php');
}
require_once('admin/models/users.php');
if (!empty($_POST)) {
    user_update();
}
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$nav_user = 'class="active open"';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/edit.php');
