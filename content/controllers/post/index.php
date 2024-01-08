<?php

require_once('content/models/posts.php');
if (!isset($_GET['id'])) {
    show404NotFound();
}

$postId = intval($_GET['id']);
$post = getRecord('posts', $postId);
$user = getRecord('users', $post['post_author']);
if (!$post || $post['post_status'] <> 'Published') {
    show404NotFound();
} else {
    updateCountView($postId);
}
$image_post = $post['post_avatar'];
$title = $post['post_title'] . ' - Quán Chị Kòi';
$url_product = 'post/' . $post['id'] . '-' . $post['post_slug'];
$image_product = PATH_URL . 'public/upload/ckeditorimages/' . $post['post_avatar'];
//load view
require('content/views/post/index.php');
