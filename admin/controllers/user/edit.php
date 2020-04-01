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
    exit;
}
require_once('admin/models/users.php');
if (!empty($_POST)) {
    user_update();
}
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/edit.php');
