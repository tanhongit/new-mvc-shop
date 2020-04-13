<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/roles.php');
if (isset($_POST['role_id'])) {
    foreach ($_POST['role_id'] as $role_id) {
        $role_id = intval($role_id);
        role_delete($role_id);
    }
}
$url = 'admin.php?controller=role';
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Danh sách quyền truy cập website';
$nav_admin  = 'class="active open"';
$roles = get_all('roles', $options);
require('admin/views/role/index.php');