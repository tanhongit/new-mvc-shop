<?php

permission_user();
require_once('admin/models/feedbacks.php');

$title = 'Tổng Danh Sách Các Phản Hồi';
$navFeedback = 'class="active open"';

require('admin/views/feedback/index.php');
