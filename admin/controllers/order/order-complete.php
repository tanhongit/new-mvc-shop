<?php
$options = array(
    'where' => 'status = 1',
    'order_by' => 'createtime DESC'
);
$order_complete  = get_all('orders', $options);

$title = 'Đơn hàng đã xử lý';
$user = $_SESSION['user'];
$status = array(
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý'
);
require('admin/views/order/order-complete.php');