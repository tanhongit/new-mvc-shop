<?php

permission_user();

require_once 'admin/models/users.php';

$options = [
    'order_by' => 'id ASC',
];
$title = 'Danh sách Admin';
$adminNav = 'class="active open"';
$list_user = get_all('users', $options);

require 'admin/views/role/admin.php';
