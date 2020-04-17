<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('admin/models/users.php');
require_once('content/models/cart.php');
if (!empty($_POST)) {
    $email = escape($_POST['email']);
    $password = md5($_POST['password']);
    user_login($email, $password);
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role_id'] == 1 || $user['role_id'] == 2) {
        update_sesion_cart();
        update_cart_user_db();
        header('location:admin.php');
    } elseif ($user['role_id'] == 0) {
        update_sesion_cart();
        update_cart_user_db();
        header('location:index.php');
    }
}
$title = 'Administrator - Login Quản Trị Shop';
require('admin/views/home/login.php');
