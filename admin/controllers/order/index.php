<?php
if (isset($_POST['order_id'])) {
    foreach ($_POST['order_id'] as $order_id) {
        $order_id = intval($order_id);
    }
}
$options = array(
    'order_by' => 'status ASC, id DESC'
);
$url = 'admin.php?controller=order';
$total_rows = get_total('orders', $options);
$title = 'Đơn hàng';
$user = $_SESSION['user'];
$orders = get_all('orders', $options);
$status = array(
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý'
);
require('admin/views/order/index.php');