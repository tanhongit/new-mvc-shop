<?php

$title = 'Tất cả phản hồi của bạn';
$navFeedback = $yourFeedback = 'class="active open"';
global $user_nav;

$option = array(
    'order_by' => 'id desc',
    'where' => 'user_id=' . $user_nav
);
$feedbacks = get_all('feedbacks', $option);

require('admin/views/feedback/myfeedback.php');
