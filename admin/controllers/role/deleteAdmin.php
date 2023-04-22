<?php

permission_user();
permission_moderator();

require_once('admin/models/users.php');

$roleId = intval($_GET['user_id']);
userDestroy($roleId);

header('location:admin.php?controller=role&action=admin');
