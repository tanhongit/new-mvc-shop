<?php

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$page = ($page > 0) ? $page : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

$options = [
    'order_by' => 'id desc',
    'limit' => $limit,
    'offset' => $offset,
];

$url = 'index.php?controller=product&action=all';
$totalRows = getTotal('products', $options);
$total = ceil($totalRows / $limit);
$pagination = pagination($url, $page, $total);

$products = getAll('products', $options);
require('content/views/product/all.php');
