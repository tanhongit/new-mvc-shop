<?php

permission_user();

require_once('admin/models/comments.php');

$commentId = intval($_GET['comment_id']);
comment_delete($commentId);

header('location:admin.php?controller=comment');
