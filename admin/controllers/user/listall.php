<?php
require_once('admin/models/users.php');
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Danh sách Thành viên';
$user = $_SESSION['user'];
$list_user = get_all('users', $options);
require('admin/views/user/listall.php');