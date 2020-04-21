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
$page = get_a_record('posts', $post_id);
$user = get_a_record('users', $page['post_author']);
if (!$page || $page['post_status'] <> 'Publiced') {
    show_404();
} else   updateCountView($post_id);
$title = $page['post_title'] . ' - Quán Chị Kòi';
$url_product = 'page/' . $page['id'] . '-' . $page['post_slug'];
$image_product = PATH_URL . 'public/upload/ckeditorimages/' . $page['post_avatar'];
//load view
require('content/views/page/index.php');
