<?php
if (isset($_GET['id'])) $product_id = intval($_GET['id']);
cart_add($product_id);
echo $product_id;
header('location:' . PATH_URL . 'cart');
