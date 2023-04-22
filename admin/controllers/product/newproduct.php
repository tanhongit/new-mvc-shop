<?php

permission_user();

require_once('admin/models/products.php');

if (isset($_POST['product_id'])) {
    foreach ($_POST['product_id'] as $productId) {
        $productId = intval($productId);
        postDestroy($productId);
    }
}
$title = 'Sản phẩm mới - Quản trị Quán Chị Kòi';
$productNav = 'class="active open"';

require('admin/views/product/newproduct.php');