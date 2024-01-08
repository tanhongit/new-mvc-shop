<?php

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (!empty($_POST)) {
    addFeedbackOrder();
    echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Thư phản hồi của bạn đã được gửi đến hệ thống của quán Chị Kòi. Cảm ơn bạn đã gửi lại phản hồi về quán. <br><br>Hãy đến <a href='admin.php'>Dashboard</a></div></div>";
    require('content/views/feedback/result.php');
    exit;
}

if (isset($_GET['order_id'])) {
    $orderId = intval($_GET['order_id']);
} else {
    $orderId = 0;
}

$order = getRecord('orders', $orderId);
$orderDetail = orderDetail($orderId);

if (isset($userNav)) {
    $userAction = getRecord('users', $userNav);
}

$status = [
    0 => 'Đã xác nhận',
    1 => 'Đã xử lý',
    2 => 'Đang xử lý',
    3 => 'Đã bị hủy',
];
$title = 'Gửi phản hồi của bạn đến Chị Kòi Quán';
$navFeedback = 'class="active open"';

require('admin/views/feedback/add.php');
