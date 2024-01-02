<?php

permission_user();

require_once('admin/models/posts.php');

$pageNav = 'class="active open"';
$title = 'Thùng rác';
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$page = ($page > 0) ? $page : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$options = [
    'where' => 'post_type =2 and post_status="Trash"',
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC',
];
$pages = getAll('posts', $options);

$url = 'admin.php?controller=page&action=viewtrash';
$totalRows = getTotal('posts', $options);
$total = ceil($totalRows / $limit);

$pagination = adminPagination($url, $page, $total);
require('admin/views/page/viewtrash.php');
