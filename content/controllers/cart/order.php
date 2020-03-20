<?php
$title = 'Đơn hàng - Quán Chị kòi';
$cart = cart_list();
if (empty($cart)) {
	header('location:.');
}
//load view
require('content/views/cart/order.php');