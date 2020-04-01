<?php
permission_user();
require_once('admin/models/users.php');
$user_id = intval($_GET['user_id']);
user_delete($user_id);
header('location:admin.php?controller=user&action=listall');