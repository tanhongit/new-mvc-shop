<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
$options = array(
    'where' => 'status = 3',
    'order_by' => 'createtime DESC'
);
$order_complete  = get_all('orders', $options);

$title = 'Đơn hàng đã bị hủy';
$nav_order  = 'class="active open"';
$status = array(
    0 => 'Chưa xử lý',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy'
);
require('admin/views/order/order-cancell.php');