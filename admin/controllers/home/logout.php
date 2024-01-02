<?php

require_once('content/models/cart.php');

global $userNav;

$user_login = getRecord('users', $userNav);

unset($_SESSION['user']);
cartDestroy();

if ($user_login['role_id'] == 0) {
    header('location:index.php');
} else {
    header('location:admin.php');
}
