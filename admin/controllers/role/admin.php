<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/users.php');
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Danh sách Admin';
$nav_admin  = 'class="active open"';
$list_user = get_all('users', $options);
require('admin/views/role/admin.php');
