<?php

if (!isset($_GET['id'])) {
    show404NotFound();
}
$productId = intval($_GET['id']);
cart_delete($productId);
global $userNav;
if (isset($userNav)) {
    delete_cart_user_db($productId);
}
header('location:' . PATH_URL . 'cart');
