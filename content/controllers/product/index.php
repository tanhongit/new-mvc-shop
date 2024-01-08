<?php

require_once('content/models/products.php');

if (!isset($_GET['id'])) {
    show404NotFound();
}

$productId = intval($_GET['id']);
$product = getRecord('products', $productId);

if (!$product) {
    show404NotFound();
} else {
    updateCountView($productId);
}
$title = $product['product_name'] . ' - Quán Chị Kòi';
$image_product = PATH_URL . 'public/upload/products/' . $product['img1'];
$url_product = 'product/' . $product['id'] . '-' . $product['slug'];
$categories = getAll('categories', [
    'select' => 'id, category_name',
    'order_by' => 'id ASC',
]);
$subCategoryData = getRecord('subcategory', $product['sub_category_id']);
if ($product['sub_category_id'] != 0) {
    $breadCrumb = $subCategoryData['subcategory_name'];
}
$comment_option = [
    'where' => 'product_id=' . $product['id'],
    'limit' => 10,
    'offset' => 0,
    'order_by' => 'id desc',
];
$comment_total_option = [
    'where' => 'product_id=' . $product['id'],
];
$comments = getAll('comments', $comment_option);
$comments_total = getTotal('comments', $comment_total_option);
//load view
require('content/views/product/index.php');
