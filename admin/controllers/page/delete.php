<?php
permission_user();
require_once('admin/models/posts.php');
$page_id = intval($_GET['page_id']);
post_delete($page_id);
header('location:admin.php?controller=page');