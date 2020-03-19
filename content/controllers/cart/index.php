<?php
//form submit
if (!empty($_POST)) {
    foreach ($_POST['number'] as $product_id => $number) {
        cart_update($product_id, $number);
    }
    header('location:index.php?controller=cart');
}
//data
$title = 'Giỏ hàng - Quán Chị Kòi';
$cart = cart_list();
//load vieư
require('content/views/cart/index.php');