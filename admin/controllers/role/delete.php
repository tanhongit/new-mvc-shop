<?php
permission_user();
require_once('admin/models/roles.php');
$role_id = intval($_GET['role_id']);
role_delete($role_id);
header('location:admin.php?controller=role');