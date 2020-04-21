<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('content/models/posts.php');
if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
} else show_404();
$post = get_a_record('posts', $post_id);
$user = get_a_record('users', $post['post_author']);
if (!$post || $post['post_status'] <> 'Publiced') {
    show_404();
} else   updateCountView($post_id);
$image_post = $post['post_avatar'];
$title = $post['post_title'] . ' - Quán Chị Kòi';
$url_product = 'post/' . $post['id'] . '-' . $post['post_slug'];
$image_product = PATH_URL . 'public/upload/ckeditorimages/' . $post['post_avatar'];
//load view
require('content/views/post/index.php');
