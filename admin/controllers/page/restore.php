<?php
permission_user();
require_once('admin/models/posts.php');
$page_id = intval($_GET['post_id']);
post_restore($page_id);
header('location:admin.php?controller=page&action=viewtrash');