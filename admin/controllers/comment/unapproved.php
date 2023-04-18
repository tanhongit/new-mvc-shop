<?php

permission_user();

require_once('admin/models/comments.php');

if (isset($_GET['comment_id'])) {
    $commentId = intval($_GET['comment_id']);
    comment_unApproved($commentId);
    header('location:admin.php?controller=comment&action=pending');
}
