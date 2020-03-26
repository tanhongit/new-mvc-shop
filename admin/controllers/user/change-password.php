<?php
require_once('admin/models/users.php');
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$user_info = get_a_record('users', $user_id);
require('admin/views/user/change-password.php');
