<?php

permission_user();

//load model
require_once 'admin/models/products.php';

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
$product = get_a_record('products', $productId);

if ($productId != 0) {
    $title .= $product['product_name'];
}
$options = [
    'order_by' => 'createDate',
];

$products = get_all('products', $options);
$categories = get_all('categories', [
    'select'   => 'id,category_name',
    'order_by' => 'id',
]);
$subcategories = get_all('subcategory', [
    'select'   => 'id,subcategory_name',
    'order_by' => 'subcategory_name',
]);

$types = get_all('types', [
    'select'   => 'id,type_name',
    'order_by' => 'id',
]);

require 'admin/views/product/edit.php';
