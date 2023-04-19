<?php

require_once('content/models/cart.php');

global $userNav;

$user_login = get_a_record('users', $userNav);

unset($_SESSION['user']);
cart_destroy();

if ($user_login['role_id'] == 0) {
    header('location:index.php');
} else {
    header('location:admin.php');
}
