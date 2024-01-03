<?php

require_once('admin/models/users.php');
$title = 'Thông tin cá nhân';
$nav_profile = $nav_user = 'class="active open"';
global $linkConnectDB;
if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']);
} else {
    $userId = 0;
}
if (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT id FROM users WHERE id='$userId'")) == 0) {
    echo "<div style='padding-top: 200px' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> NgườI dùng này không tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
    require('admin/views/user/result.php');
    exit;
}
global $userNav;
$loginUser = getRecord('users', $userNav);
if ($userId != $userNav && $loginUser['role_id'] == 0) {
    header('location:index.php');
    exit;
} elseif ($userId != $userNav && $loginUser['role_id'] == 2) {
    header('location:admin.php');
    exit;
}
$user_info = getRecord('users', $userId);
require('admin/views/user/info.php');
