<?php

permission_user();
require_once('admin/models/users.php');
$userId = intval($_GET['user_id']);
global $userNav;
$user = getRecord('users', $userNav);
if ($_GET['user_id'] == $userNav || $user['role_id'] <> 1) {
    echo '<div style="padding-top: 200px" class="container"><div class="alert alert-danger" style="text-align: center;"><strong>Error!</strong> Bạn không có quyền hoặc không được phép xóa người dùng này.<br><br> Hãy <a href="javascript: history.go(-1)">Quay lại</a> .!!</div></div>';
    require('admin/views/user/result.php');
    exit;
} else {
    userDestroy($userId);
}
header('location:admin.php?controller=user&action=listall');
