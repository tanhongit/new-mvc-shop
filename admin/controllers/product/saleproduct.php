<?php
//load model
require_once('admin/models/products.php');
if (isset($_POST['product_id'])) {
    foreach ($_POST['product_id'] as $product_id) {
        $product_id = intval($product_id);
        products_delete($product_id);
    }
}
$title = 'Sản phẩm khuyến mại';
$user = $_SESSION['user'];
require('admin/views/product/saleproduct.php');