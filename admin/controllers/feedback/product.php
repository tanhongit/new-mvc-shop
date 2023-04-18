<?php

permission_user();

require_once('admin/models/feedbacks.php');

$title = 'Thông tin phản hồi của khách hàng về sản phẩm';
$navFeedback = 'class="active open"';

require('admin/views/feedback/product.php');
