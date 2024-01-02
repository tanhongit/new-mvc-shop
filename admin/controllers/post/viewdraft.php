<?php

permission_user();

require_once('admin/models/posts.php');

$title = 'Các bản nháp';
$postNav = 'class="active open"';

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$page = ($page > 0) ? $page : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$options = [
    'where' => 'post_type =1 and post_status="Draft"',
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC',
];
$posts = getAll('posts', $options);

$url = 'admin.php?controller=post&action=viewdraft';
$totalRows = getTotal('posts', $options);
$total = ceil($totalRows / $limit);

$pagination = adminPagination($url, $page, $total);
require('admin/views/post/viewdraft.php');
