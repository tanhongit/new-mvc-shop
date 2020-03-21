<?php
//load model
require_once('admin/models/products.php');
if (isset($_POST['producct_id'])) {
    foreach ($_POST['producct_id'] as $producct_id) {
        $producct_id = intval($producct_id);
        products_delete($producct_id);
    }
}
$title = 'Sản phẩm mới order';
$user = $_SESSION['user'];
$options = array(
    'where' => 'product_typeid = 1',
    'order_by' => 'createDate'
);
$products = get_all('products', $options);
require('admin/views/product/hotproduct.php');