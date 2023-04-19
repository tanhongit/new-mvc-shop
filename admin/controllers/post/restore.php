<?php
permission_user();
permission_moderator();
require_once('admin/models/posts.php');
$postId = intval($_GET['post_id']);
post_restore($postId);
header('location:admin.php?controller=post&action=viewtrash');