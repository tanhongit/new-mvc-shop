<?php
permission_user();
permission_moderator();
require_once('admin/models/roles.php');
$roleId = intval($_GET['role_id']);
role_delete($roleId);
header('location:admin.php?controller=role');