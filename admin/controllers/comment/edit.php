<?php

permission_user();

require_once('admin/models/comments.php');

if (!empty($_POST)) {
    updateComment();
}

if (isset($_GET['comment_id'])) {
    $commentId = intval($_GET['comment_id']);
} else {
    $commentId = 0;
}

$title = $commentId === 0 ? '' : 'Sửa phần bình luận của khách hàng';
$comment = getRecord('comments', $commentId);

if ($comment['post_id'] <> 0) {
    $post = getRecord('posts', $comment['post_id']);
}

if ($comment['page_id'] <> 0) {
    $page = getRecord('posts', $comment['page_id']);
}

if ($comment['product_id'] <> 0) {
    $product = getRecord('products', $comment['product_id']);
}

$navComment = 'class="active open"';

require('admin/views/comment/edit.php');
