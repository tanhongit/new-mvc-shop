<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = [
        'where' => 'status = 1 and user_id =' . $userNav,
        'order_by' => 'createtime DESC',
    ];
    $receiedOrders = getAll('orders', $options);
    $title = 'Đơn hàng đã nhận';
    $yourPurchaseNav = 'class="active open"';
    $status = [
        0 => 'Đã xác nhận đơn hàng',
        2 => 'Đang giao hàng',
        1 => 'Đã giao hàng',
    ];
}

require('admin/views/purchase/receied.php');
