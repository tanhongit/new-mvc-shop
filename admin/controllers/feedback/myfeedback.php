<?php

$title = 'Tất cả phản hồi của bạn';
$navFeedback = $yourFeedback = 'class="active open"';
global $userNav;

$option = [
    'order_by' => 'id desc',
    'where' => 'user_id=' . $userNav,
];
$feedbacks = getAll('feedbacks', $option);

require('admin/views/feedback/myfeedback.php');
