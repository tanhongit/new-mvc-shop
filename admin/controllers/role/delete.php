<?php
permission_user();
permission_moderator();
require_once('admin/models/roles.php');
$role_id = intval($_GET['role_id']);
role_delete($role_id);
header('location:admin.php?controller=role');