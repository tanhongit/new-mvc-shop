<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
$title = 'Đơn hàng - Quán Chị kòi';
$cart = cart_list();
if (empty($cart)) {
	header('location:.');
}
global $userNav;
if (isset($userNav)) $user_login = get_a_record('users', $userNav);
//load view
require('content/views/cart/order.php');
