<?php

if (!isset($_GET['id'])) {
    show404NotFound();
}

$user_info = getRecord('users', intval($_GET['id']));
$title = 'Change Password - Forgot Password';
require('content/views/forgot-password/change-password.php');
