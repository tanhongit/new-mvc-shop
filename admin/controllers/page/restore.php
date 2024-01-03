<?php

permission_user();
permission_moderator();

require_once('admin/models/posts.php');

$pageId = intval($_GET['post_id']);
restorePost($pageId);

header('location:admin.php?controller=page&action=viewtrash');
