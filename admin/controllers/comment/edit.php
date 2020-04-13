<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/comments.php');
if (!empty($_POST)) {
    comment_update();
}
if (isset($_GET['comment_id'])) $comment_id = intval($_GET['comment_id']);
else $comment_id = 0;
$title = ($comment_id == 0) ? '' : 'Sửa phần bình luận của khách hàng';
$comment = get_a_record('comments', $comment_id);
if ($comment['post_id'] <> 0) {
    $post = get_a_record('posts', $comment['post_id']);
}
if ($comment['page_id'] <> 0) {
    $page = get_a_record('posts', $comment['page_id']);
}
if ($comment['product_id'] <> 0) {
    $product = get_a_record('products', $comment['product_id']);
}
$nav_comment = 'class="active open"';
require('admin/views/comment/edit.php');
