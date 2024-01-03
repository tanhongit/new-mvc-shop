<?php

permission_user();
permission_moderator();

require_once('admin/models/roles.php');

if (!empty($_POST)) {
    role_update();
}

if (isset($_GET['role_id'])) {
    $roleId = intval($_GET['role_id']);
} else {
    $roleId = 0;
}

$title = ($roleId == 0) ? 'Thêm quyền truy cập' : 'Sửa quyền truy cập';
$adminNav = 'class="active open"';
$role = getRecord('roles', $roleId);

require('admin/views/role/edit.php');
