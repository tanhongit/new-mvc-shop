<?php
require_once('content/models/feedbacks.php');
if (!empty($_POST)) {
    feedback_add();
}
if (isset($_GET['product_id'])) $productId = intval($_GET['product_id']);
else $productId = 0;
$product = get_a_record('products', $productId);
if (isset($userNav)) {
    $user_action = get_a_record('users', $userNav);
}
$title = 'Gửi phản hồi của bạn đến Chị Kòi Quán';
require('content/views/feedback/index.php');
