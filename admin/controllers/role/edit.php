<?php
permission_user();
require_once('admin/models/roles.php');
if (!empty($_POST)) {
    $role = array(
        'id' => intval($_POST['role_id']),
        'role_name' => escape($_POST['name']),
        'role_desc' => ($_POST['description'])
    );
    save('roles', $role);
    header('location:admin.php?controller=role');
}
if (isset($_GET['role_id'])) $role_id = intval($_GET['role_id']); else $role_id=0;
$title = ($role_id==0) ? 'Thêm quyền truy cập' : 'Sửa quyền truy cập';
$role = get_a_record('roles', $role_id);
require('admin/views/role/edit.php');