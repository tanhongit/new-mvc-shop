<?php
require_once('admin/models/users.php');
if (isset($_GET['user_id'])) $userId = intval($_GET['user_id']);
else $userId = 0;
global $userNav;
$loginUser = get_a_record('users', $userNav);
if ($userId != $userNav && $loginUser['role_id'] == 0) {
    header('location:index.php');
    exit;
}
$user_info = get_a_record('users', $userId);
$nav_user = $nav_profile = 'class="active open"';
require('admin/views/user/change-password.php');
