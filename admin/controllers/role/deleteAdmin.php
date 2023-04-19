<?php
permission_user();
permission_moderator();
require_once('admin/models/users.php');
$roleId = intval($_GET['user_id']);
user_delete($roleId);
header('location:admin.php?controller=role&action=admin');
