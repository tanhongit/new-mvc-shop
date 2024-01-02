<?php

permission_user();

require_once('admin/models/comments.php');

$title = 'Thùng rác';
$navComment = 'class="active open"';

require('admin/views/comment/trash.php');
