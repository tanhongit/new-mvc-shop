<?php

permission_user();

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (isset($_GET['feedback_id'])) {
    $feedbackId = intval($_GET['feedback_id']);
} else {
    $feedbackId = 0;
}

$title = $feedbackId === 0 ? '' : 'Xem chi tiết phản hồi của khách hàng';
$feedback = getRecord('feedbacks', $feedbackId);

if ($feedback['order_id'] <> 0) {
    $orderDetail = orderDetail($feedback['order_id']);
    $order = getRecord('orders', $feedback['order_id']);
}

if ($feedback['product_id'] <> 0) {
    $product = getRecord('products', $feedback['product_id']);
}

$status = [
    0 => 'Đã xác nhận',
    1 => 'Đã xử lý - Done',
    2 => 'Đang xử lý - giao hàng',
    3 => 'Đã bị hủy',
];
$navFeedback = 'class="active open"';

require('admin/views/feedback/view.php');
