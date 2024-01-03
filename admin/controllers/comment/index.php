<?php

permission_user();

require_once('admin/models/comments.php');

$title = 'Tổng Danh Sách Bình luận';
$navComment = 'class="active open"';
$option = [
    'order_by' => 'id desc',
    'where' => 'status<>3 and status<>2',
];
$comments = getAll('comments', $option);

require('admin/views/comment/index.php');
