<?php
permission_user();
require_once('admin/models/posts.php');
$post_id = intval($_GET['post_id']);
post_restore($post_id);
header('location:admin.php?controller=post&action=viewtrash');