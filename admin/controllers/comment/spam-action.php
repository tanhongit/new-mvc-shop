<?php

permission_user();

require_once('admin/models/comments.php');

if (isset($_GET['comment_id'])) {
    $comment_id = intval($_GET['comment_id']);
    comment_Spam($comment_id);
    header('location:admin.php?controller=comment&action=spam');
}
