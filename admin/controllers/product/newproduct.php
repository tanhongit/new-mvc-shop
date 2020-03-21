<?php
//load model
require_once('admin/models/products.php');
if (isset($_POST['pid'])) {
    foreach ($_POST['pid'] as $pid) {
        $pid = intval($pid);
        products_delete($pid);
    }
}
$title = 'Sản phẩm mới - Quản trị Quán Chị Kòi';
$user = $_SESSION['user'];
$options = array(
    'where' => 'product_typeid = 2',
    'order_by' => 'createDate'
);
$products = get_all('products', $options);
//load view
require('admin/views/product/newproduct.php');