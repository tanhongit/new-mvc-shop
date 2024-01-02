<?php

permission_user();
permission_moderator();

require_once('admin/models/roles.php');

$roleId = intval($_GET['role_id']);
roleDestroy($roleId);

header('location:admin.php?controller=role');
