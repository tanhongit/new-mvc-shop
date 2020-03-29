<?php
if (isset($_GET['id'])) $user_id = $_GET['id'];
$user_info = get_a_record('users', $user_id);
$title = 'Change Password - Forgot Password';
require('content/views/forgot-password/change-password.php');