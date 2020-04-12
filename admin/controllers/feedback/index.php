<?php
permission_user();
require_once('admin/models/feedbacks.php');
$title = 'Tổng Danh Sách Các Phản Hồi';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/index.php');