<?php
permission_user();
permission_moderator();
require_once('admin/models/posts.php');
$post_id = intval($_GET['post_id']);
post_delete($post_id);
header('location:admin.php?controller=post');