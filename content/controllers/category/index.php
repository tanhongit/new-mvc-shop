<?php

if (!isset($_GET['id'])) {
    show404NotFound();
}

$categoryId = intval($_GET['id']);

$category = getRecord('subcategory', $categoryId);

if (!$category) {
    show404NotFound();
}

$categories = getAll('subcategory', [
    'select' => 'id, subcategory_name',
    'order_by' => 'id ASC',
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
    'where' => 'sub_category_id =' . $categoryId,
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC',
];

$url = 'category/' . $categoryId . '-' . $category['slug'];

$totalRows = getTotal('products', $options);
$total = ceil($totalRows / $limit);

$products = getAll('products', $options);
$pagination = pagination($url, $page, $total);

$subCategoryData = getRecord('subcategory', $_GET["id"]);
if ($subCategoryData['id'] != 0) {
    $breadCrumb = $subCategoryData['subcategory_name'];
}
$title = $category['subcategory_name'] . ' - Quán Chị Kòi';
require('content/views/category/index.php');
