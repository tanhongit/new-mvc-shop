<?php

permission_user();

$options = [
    'where' => 'status = 1',
    'order_by' => 'createtime DESC',
];
$orderComplete = getAll('orders', $options);

$title = 'Đơn hàng đã xử lý';
$orderNav = 'class="active open"';
$status = [
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
];
require('admin/views/order/order-complete.php');
