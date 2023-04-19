<?php
permission_user();
permission_moderator();
require_once('admin/models/posts.php');
if (isset($_GET['post_id'])) {
    $postId = intval($_GET['post_id']);
    post_trash($postId);
}
header('location:admin.php?controller=post&action=viewtrash');
