<?php
require_once('admin/models/purchase.php');
global $user_nav;
if (!empty($user_nav)) {
    $options = array(
        'where' => 'status = 2 and user_id =' . $user_nav,
        'order_by' => 'createtime DESC'
    );
    $order_delivery  = get_all('orders', $options);
    $title = 'Đơn hàng đang vận chuyển';
    $status = array(
        0 => 'Đã xác nhận đơn hàng',
        2 => 'Đang giao hàng',
        1 => 'Đã giao hàng'
    );
}
require('admin/views/purchase/delivery.php');
