<?php
require_once('admin/models/products.php');
if (isset($_POST['search'])) {
    header('location:admin.php?controller=product&search='.$_POST['search']);
}
if (isset($_POST['producct_id'])) {
    foreach ($_POST['producct_id'] as $producct_id) {
        $producct_id = intval($producct_id);
        products_delete($producct_id);
    }
}
$url = 'admin.php?controller=product';
if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "name LIKE '%$search%'";
    $url = 'admin.php?controller=product&search='.$_GET['search'];
}
$title = 'Tổng Danh Sách Các Sản phẩm';
$user = $_SESSION['user'];
//load view
require('admin/views/product/index.php');