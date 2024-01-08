<?php

if (!isset($_GET['id'])) {
    show404NotFound();
}

$shopId = intval($_GET['id']);

$category = getRecord('categories', $shopId);
if (!$category) {
    show404NotFound();
}
$categories = getAll('categories', [
    'select' => 'id, category_name',
    'order_by' => 'category_position ASC',
]);

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$options = [
    'where' => 'category_id=' . $shopId,
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC',
];

$url = 'shop/' . $shopId . '-' . $category['slug'];
$totalRows = getTotal('products', $options);
$total = ceil($totalRows / $limit);

$products = getAll('products', $options);
$pagination = pagination($url, $page, $total);

if ($category['id'] != 0) {
    $breadCrumb = $category['category_name'];
}
$title = $category['category_name'] . ' - Quán Chị Kòi';
//load view
require('content/views/shop/index.php');
