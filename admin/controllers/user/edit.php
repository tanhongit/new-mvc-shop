<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']);
} else {
    $userId = 0;
}
global $userNav;
$loginUser = getRecord('users', $userNav);
if ($userId != $userNav && $loginUser['role_id'] == 0) {
    header('location:index.php');
} elseif ($userId != $userNav && $loginUser['role_id'] == 2) {
    header('location:admin.php');
}
require_once('admin/models/users.php');
if (!empty($_POST)) {
    user_update();
}
$title = ($userId == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$nav_user = 'class="active open"';
$user_info = getRecord('users', $userId);
require('admin/views/user/edit.php');
