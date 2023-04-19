<?php
permission_user();
permission_moderator();
require_once('admin/models/posts.php');
$page_id = intval($_GET['post_id']);
post_restore($page_id);
header('location:admin.php?controller=page&action=viewtrash');