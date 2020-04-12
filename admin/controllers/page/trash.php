<?php
permission_user();
permission_moderator();
require_once('admin/models/posts.php');
if (isset($_GET['post_id'])) {
    $page_id = intval($_GET['post_id']);
    post_trash($page_id);
}
header('location:admin.php?controller=page&action=viewtrash');
