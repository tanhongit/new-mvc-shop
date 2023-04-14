<?php

permission_user();

require_once('admin/models/comments.php');

$comment_id = intval($_GET['comment_id']);
comment_delete($comment_id);

header('location:admin.php?controller=comment');
