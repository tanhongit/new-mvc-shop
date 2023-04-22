<?php
//form submit
if (!empty($_POST)) {
    foreach ($_POST['number'] as $productId => $number) {
        cart_update($productId, $number);
        global $userNav;
        if (isset($userNav)) mergeCartSessionWithDB();
    }
    header('location:index.php?controller=cart');
}
$title = 'Giỏ hàng - Quán Chị Kòi';
$cart = cart_list();
//load vieư
require('content/views/cart/index.php');
