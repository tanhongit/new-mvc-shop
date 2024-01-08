<?php

require_once('content/models/cart.php');

global $userNav;

$userLogin = getRecord('users', $userNav);

unset($_SESSION['user']);
cartDestroy();

if ($userLogin['role_id'] == 0) {
    header('location:index.php');
} else {
    header('location:admin.php');
}
