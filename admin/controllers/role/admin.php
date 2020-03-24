<?php
require_once('admin/models/users.php');
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Danh sách Admin';
$list_user = get_all('users', $options);
require('admin/views/role/admin.php');
