<?php
require_once('admin/models/products.php');
permission_user();
if (isset($_POST['search'])) {
    header('location:admin.php?controller=product&search='.$_POST['search']);
}
if (isset($_POST['product_id'])) {
    foreach ($_POST['product_id'] as $product_id) {
        $product_id = intval($product_id);
        products_delete($product_id);
    }
}
$url = 'admin.php?controller=product';
if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "product_name LIKE '%$search%'";
    $url = 'admin.php?controller=product&search='.$_GET['search'];
}
$title = 'Tổng Danh Sách Các Sản phẩm';
require('admin/views/product/index.php');