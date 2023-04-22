<?php

require_once('admin/models/order.php');

if (isset($_GET['order_id']))
    $orderId = intval($_GET['order_id']);
else $orderId = 0;

$order = get_a_record('orders', $orderId);

if (!$order) {
    show_404();
}

$title = 'Chi tiết đơn hàng';
$yourPurchaseNav = 'class="active open"';
$orderDetail = orderDetail($orderId);

$status = array(
    0 => 'Đã xác nhận đơn hàng',
    2 => 'Đang giao hàng',
    1 => 'Đã giao hàng',
    3 => 'Đơn hàng đã hủy'
);

require('admin/views/purchase/view.php');
