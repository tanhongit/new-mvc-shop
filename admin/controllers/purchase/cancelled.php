<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('admin/models/purchase.php');
global $user_nav;
if (!empty($user_nav)) {
    $options = array(
        'where' => 'status = 3 and user_id =' . $user_nav,
        'order_by' => 'createtime DESC'
    );
    $order_cancelled  = get_all('orders', $options);
    $title = 'Đơn hàng đã hủy';
    $your_Purchase  = 'class="active open"';
    $status = array(
        0 => 'Đã xác nhận đơn hàng',
        2 => 'Đang giao hàng',
        1 => 'Đã giao hàng',
        3 => 'Đơn hàng đã hủy'
    );
}
require('admin/views/purchase/cancelled.php');
