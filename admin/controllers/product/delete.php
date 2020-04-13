<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_moderator();
//load model
require_once('admin/models/products.php');
$product_id = intval($_GET['product_id']);
products_delete($product_id);
header('location:admin.php?controller=product');