<?php

permission_user();

require_once('admin/models/feedbacks.php');

$title = 'Phản hồi chưa phê duyệt';
$navFeedback = 'class="active open"';

require('admin/views/feedback/pending.php');
