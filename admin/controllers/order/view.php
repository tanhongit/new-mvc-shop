<?php
require_once('admin/models/order.php');
if (isset($_GET['order_id'])) $order_id = intval($_GET['order_id']); else $order_id=0;
$order = get_a_record('orders', $order_id);
if (!$order) {
    show_404();
}
$title = 'Chi tiết đơn hàng';
$order_detail = order_detail($order_id);
require('admin/views/order/view.php');