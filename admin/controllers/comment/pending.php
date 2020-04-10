<?php
permission_user();
require_once('admin/models/comments.php');
$title = 'Bình luận chưa phê duyệt';
require('admin/views/comment/pending.php');
