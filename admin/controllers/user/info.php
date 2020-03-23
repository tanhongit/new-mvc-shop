<?php
require_once('admin/models/users.php');
$title = 'Thông tin cá nhân';
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']); else $user_id=0;
$user = $_SESSION['user'];
$user_info = get_a_record('users', $user_id);
require('admin/views/user/info.php');