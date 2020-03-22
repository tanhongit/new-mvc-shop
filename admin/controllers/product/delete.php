<?php
//load model
require_once('admin/models/products.php');
$product_id = intval($_GET['product_id']);
products_delete($product_id);
header('location:admin.php?controller=product');