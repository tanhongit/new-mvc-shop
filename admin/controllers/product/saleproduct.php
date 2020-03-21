<?php
//load model
require_once('admin/models/products.php');
if (isset($_POST['producct_id'])) {
    foreach ($_POST['producct_id'] as $producct_id) {
        $producct_id = intval($producct_id);
        products_delete($producct_id);
    }
}
$title = 'Sản phẩm khuyến mại';
$user = $_SESSION['user'];
require('admin/views/product/saleproduct.php');