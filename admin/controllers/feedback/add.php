<?php

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (!empty($_POST)) {
    addFeedbackOrder();
}

if (isset($_GET['order_id'])) {
    $orderId = intval($_GET['order_id']);
} else {
    $orderId = 0;
}

$order = get_a_record('orders', $orderId);
$orderDetail = orderDetail($orderId);

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
