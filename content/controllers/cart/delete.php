<?php
if (isset($_GET['id'])) $product_id = intval($_GET['id']);
cart_delete($product_id);
header('location:' . PATH_URL . 'cart');
