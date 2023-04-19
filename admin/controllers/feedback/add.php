<?php

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (!empty($_POST)) {
    addFeedbackOrder();
}

if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
} else {
    $order_id = 0;
}

$order = get_a_record('orders', $order_id);
$order_detail = order_detail($order_id);

if (isset($userNav)) {
    $user_action = get_a_record('users', $userNav);
}

$status = array(
    0 => 'Đã xác nhận',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy'
);
$title = 'Gửi phản hồi của bạn đến Chị Kòi Quán';
$navFeedback = 'class="active open"';

require('admin/views/feedback/add.php');
