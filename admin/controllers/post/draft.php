<?php
permission_user();
require_once('admin/models/posts.php');
$post_id = intval($_GET['post_id']);
post_draft($post_id);
header('location:admin.php?controller=post&action=viewdraft');