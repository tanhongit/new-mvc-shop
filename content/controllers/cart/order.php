<?php
$title = 'Đơn hàng - Chị kòi Shop';
$cart = cart_list();
if (empty($cart)) {
	header('location:.');
}
//load view
require('content/views/cart/order.php');