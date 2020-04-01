<?php
permission_user();
require_once('admin/models/users.php');
if (!empty($_POST)) {
    user_add();
}
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/add.php');
