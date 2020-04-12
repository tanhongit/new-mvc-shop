<?php
require_once('admin/models/purchase.php');
global $user_nav;
if (!empty($user_nav)) {
    $options = array(
        'where' => 'user_id =' . $user_nav,
        'order_by' => 'createtime DESC'
    );
    $order_all  = get_all('orders', $options);
    $title = 'Tất cả đơn hàng của bạn';
    $your_Purchase  = 'class="active open"';
    $status = array(
        0 => 'Đã xác nhận đơn hàng',
        2 => 'Đang giao hàng',
        1 => 'Đã giao hàng',
        3 => 'Đơn hàng đã hủy'
    );
}
require('admin/views/purchase/index.php');