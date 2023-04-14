<?php

permission_user();

require_once('admin/models/comments.php');

$title = 'Bình luận Spam';
$nav_comment = 'class="active open"';

require('admin/views/comment/spam.php');