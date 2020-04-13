<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');
if (!empty($_POST)) {
    feedback_order_add();
}
if (isset($_GET['order_id'])) $order_id = intval($_GET['order_id']);
else $order_id = 0;
$order = get_a_record('orders', $order_id);
$order_detail = order_detail($order_id);
if (isset($user_nav)) {
    $user_action = get_a_record('users', $user_nav);
}
$status = array(
    0 => 'Đã xác nhận',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy'
);
$title = 'Gửi phản hồi của bạn đến Chị Kòi Quán';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/add.php');
