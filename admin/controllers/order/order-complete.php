<?php

permission_user();

$options = array(
    'where' => 'status = 1',
    'order_by' => 'createtime DESC'
);
$orderComplete = get_all('orders', $options);

$title = 'Đơn hàng đã xử lý';
$orderNav = 'class="active open"';
$status = array(
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý'
);
require('admin/views/order/order-complete.php');