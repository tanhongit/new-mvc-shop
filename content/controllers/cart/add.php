<?php
if (isset($_GET['id'])) $product_id = intval($_GET['id']);
if (!empty($_POST)) {
    $product = array(
        'number' => intval($_POST['number_cart'])
    );
    cart_add($product_id, $product['number']);
}
echo $product_id;
header('location:' . PATH_URL . 'cart');
