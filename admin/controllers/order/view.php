<?php

permission_user();

require_once('admin/models/order.php');

if (isset($_GET['order_id'])) {
    $orderId = intval($_GET['order_id']);
} else {
    $orderId = 0;
}

$order = getRecord('orders', $orderId);

if (!$order) {
    show404NotFound();
}

$title = 'Chi tiết đơn hàng';
$orderNav = 'class="active open"';

$orderDetail = orderDetail($orderId);

$status = [
    0 => 'Đã xác nhận đơn hàng',
    2 => 'Đang giao hàng',
    1 => 'Đã giao hàng',
    3 => 'Đơn hàng đã hủy',
];
require('admin/views/order/view.php');
