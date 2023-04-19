<?php
permission_moderator();
//load model
require_once('admin/models/products.php');
$productId = intval($_GET['product_id']);
products_delete($productId);
header('location:admin.php?controller=product');