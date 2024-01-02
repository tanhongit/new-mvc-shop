<?php
if (isset($_GET['id'])) $userId = $_GET['id'];
$user_info = getRecord('users', $userId);
$title = 'Change Password - Forgot Password';
require('content/views/forgot-password/change-password.php');
