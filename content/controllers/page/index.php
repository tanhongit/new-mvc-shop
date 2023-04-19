<?php
require_once('content/models/posts.php');
if (isset($_GET['id'])) {
    $postId = intval($_GET['id']);
} else show_404();
$page = get_a_record('posts', $postId);
$user = get_a_record('users', $page['post_author']);
if (!$page || $page['post_status'] <> 'Publiced') {
    show_404();
} else   updateCountView($postId);
$title = $page['post_title'] . ' - Quán Chị Kòi';
$url_product = 'page/' . $page['id'] . '-' . $page['post_slug'];
$image_product = PATH_URL . 'public/upload/ckeditorimages/' . $page['post_avatar'];
//load view
require('content/views/page/index.php');
