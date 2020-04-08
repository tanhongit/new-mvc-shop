<?php
require_once('content/models/posts.php');
if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
} else show_404();
$post = get_a_record('posts', $post_id);
$user = get_a_record('users', $post['post_author']);
if (!$post) {
    show_404();
} else   updateCountView($post_id);
$title = $post['post_title'] . ' - Quán Chị Kòi';
//load view
require('content/views/post/index.php');
