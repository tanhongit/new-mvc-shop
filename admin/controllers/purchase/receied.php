<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = array(
        'where' => 'status = 1 and user_id =' . $userNav,
        'order_by' => 'createtime DESC'
    );
    $receiedOrders = get_all('orders', $options);
    $title = 'Đơn hàng đã nhận';
    $yourPurchaseNav = 'class="active open"';
    $status = array(
        0 => 'Đã xác nhận đơn hàng',
        2 => 'Đang giao hàng',
        1 => 'Đã giao hàng'
    );
}

require('admin/views/purchase/receied.php');
