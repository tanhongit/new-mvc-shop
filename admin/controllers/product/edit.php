<?php

permission_user();

//load model
require_once('admin/models/products.php');

if (!empty($_POST)) {
    product_update();
}

if (isset($_GET['product_id'])) {
    $productId = intval($_GET['product_id']);
} else {
    $productId = 0;
}

$title = ($productId == 0) ? 'Thêm sản phẩm' : 'Sửa sản phẩm: ';
$productNav = 'class="active open"';
$product = getRecord('products', $productId);

if ($productId <> 0) {
    $title .= $product['product_name'];
}
$options = [
    'order_by' => 'createDate',
];

$products = getAll('products', $options);
$categories = getAll('categories', [
    'select' => 'id,category_name',
    'order_by' => 'id',
]);
$subCategoryData = getAll('subcategory', [
    'select' => 'id,subcategory_name',
    'order_by' => 'subcategory_name',
]);

$types = getAll('types', [
    'select' => 'id,type_name',
    'order_by' => 'id',
]);

require('admin/views/product/edit.php');
