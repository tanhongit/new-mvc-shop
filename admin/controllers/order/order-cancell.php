<?php

permission_user();

$options = [
    'where' => 'status = 3',
    'order_by' => 'createtime DESC',
];

$orderComplete = getAll('orders', $options);

$title = 'Đơn hàng đã bị hủy';
$orderNav = 'class="active open"';
$status = [
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy',
];

require('admin/views/order/order-cancell.php');
