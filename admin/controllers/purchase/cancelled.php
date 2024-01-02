<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = [
        'where' => 'status = 3 and user_id =' . $userNav,
        'order_by' => 'createtime DESC',
    ];
    $cancelledOrders = getAll('orders', $options);
    $title = 'Đơn hàng đã hủy';
    $yourPurchaseNav = 'class="active open"';
    $status = [
        0 => 'Đã xác nhận đơn hàng',
        2 => 'Đang giao hàng',
        1 => 'Đã giao hàng',
        3 => 'Đơn hàng đã hủy',
    ];
}

require('admin/views/purchase/cancelled.php');
