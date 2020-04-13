<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
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
$nav_order  = 'class="active open"';
$orders = get_all('orders', $options);
$status = array(
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy'
);
require('admin/views/order/index.php');