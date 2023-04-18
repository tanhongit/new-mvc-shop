<?php

permission_user();

require_once('admin/models/feedbacks.php');

$title = 'Thông tin phản hồi của khách hàng về đơn hàng';
$navFeedback = 'class="active open"';

require('admin/views/feedback/order.php');
