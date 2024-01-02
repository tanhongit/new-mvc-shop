<?php

permission_user();
permission_moderator();
require_once('admin/models/users.php');
$options = [
    'order_by' => 'id ASC',
];
$title = 'Danh sách Thành viên';
$nav_user = 'class="active open"';
$list_user = getAll('users', $options);
require('admin/views/user/listall.php');
