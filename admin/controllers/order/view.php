<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/order.php');
if (isset($_GET['order_id'])) $order_id = intval($_GET['order_id']); else $order_id=0;
$order = get_a_record('orders', $order_id);
if (!$order) {
    show_404();
}
$title = 'Chi tiết đơn hàng';
$nav_order  = 'class="active open"';
$order_detail = order_detail($order_id);
$status = array(
    0 => 'Đã xác nhận đơn hàng',
    2 => 'Đang giao hàng',
    1 => 'Đã giao hàng',
    3 => 'Đơn hàng đã hủy'
);
require('admin/views/order/view.php');