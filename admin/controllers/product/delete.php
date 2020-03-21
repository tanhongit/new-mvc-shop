<?php
//load model
require_once('admin/models/products.php');
$producct_id = intval($_GET['producct_id']);
products_delete($producct_id);
header('location:admin.php?controller=product');