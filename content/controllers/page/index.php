<?php
require_once('content/models/posts.php');
if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
} else show_404();
$page = get_a_record('posts', $post_id);
$user = get_a_record('users', $page['post_author']);
if (!$page) {
    show_404();
} else   updateCountView($post_id);
$title = $page['post_title'] . ' - Quán Chị Kòi';
//load view
require('content/views/page/index.php');
