<?php

permission_user();

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (!empty($_POST)) {
    feedbackReplyMail($_POST['html-content'], $_POST['feedback_email']);
}

if (isset($_GET['feedback_id'])) {
    $feedbackId = intval($_GET['feedback_id']);
} else {
    $feedbackId = 0;
}

$title = $feedbackId === 0 ? '' : 'Trả lời cho phản hồi của khách hàng';
$feedback = getRecord('feedbacks', $feedbackId);
$navFeedback = 'class="active open"';

require('admin/views/feedback/reply.php');
