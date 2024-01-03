<?php

permission_user();

if (isset($_POST['order_id'])) {
    foreach ($_POST['order_id'] as $orderId) {
        $orderId = intval($orderId);
    }
}

$options = [
    'order_by' => 'status ASC, id DESC',
];

$url = 'admin.php?controller=order';
$totalRows = getTotal('orders', $options);
$title = 'Đơn hàng';
$orderNav = 'class="active open"';
$orders = getAll('orders', $options);

$status = [
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy',
];
require('admin/views/order/index.php');
