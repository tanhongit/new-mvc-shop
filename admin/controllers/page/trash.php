<?php

permission_user();
permission_moderator();
require_once('admin/models/posts.php');
if (isset($_GET['post_id'])) {
    $pageId = intval($_GET['post_id']);
    trashPost($pageId);
}
header('location:admin.php?controller=page&action=viewtrash');
