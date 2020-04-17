<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
//form submit
if (!empty($_POST)) {
    foreach ($_POST['number'] as $product_id => $number) {
        cart_update($product_id, $number);
        global $user_nav;
        if (isset($user_nav)) update_cart_user_db();
    }
    header('location:index.php?controller=cart');
}
$title = 'Giỏ hàng - Quán Chị Kòi';
$cart = cart_list();
//load vieư
require('content/views/cart/index.php');
