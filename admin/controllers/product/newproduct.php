<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
//load model
permission_user();
require_once('admin/models/products.php');
if (isset($_POST['product_id'])) {
    foreach ($_POST['product_id'] as $product_id) {
        $product_id = intval($product_id);
        products_delete($product_id);
    }
}
$title = 'Sản phẩm mới - Quản trị Quán Chị Kòi';
$nav_product  = 'class="active open"';
require('admin/views/product/newproduct.php');