<?php

$title = 'Tất cả phản hồi của bạn';
$navFeedback = $yourFeedback = 'class="active open"';
global $userNav;

$option = array(
    'order_by' => 'id desc',
    'where' => 'user_id=' . $userNav
);
$feedbacks = get_all('feedbacks', $option);

require('admin/views/feedback/myfeedback.php');
