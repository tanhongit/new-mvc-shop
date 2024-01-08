<?php

require_once('content/models/posts.php');

if (!isset($_GET['id'])) {
    show404NotFound();
}

$postId = intval($_GET['id']);
$page = getRecord('posts', $postId);
$user = getRecord('users', $page['post_author']);
if (!$page || $page['post_status'] <> 'Published') {
    show404NotFound();
} else {
    updateCountView($postId);
}
$title = $page['post_title'] . ' - Quán Chị Kòi';
$url_product = 'page/' . $page['id'] . '-' . $page['post_slug'];
$image_product = PATH_URL . 'public/upload/ckeditorimages/' . $page['post_avatar'];
//load view
require('content/views/page/index.php');
