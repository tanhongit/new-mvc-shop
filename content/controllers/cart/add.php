<?php
if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
}
$option_slug_product = array(
    'select' => 'slug',
    'where' => 'id=' . $productId
);
$product_slugs = get_all('products', $option_slug_product);
foreach ($product_slugs as $slug) {
    $product_slug = $slug['slug'];
}
if (!empty($_POST)) {
    $product = array(
        'number' => intval($_POST['number_cart'])
    );
    cart_add($productId, $product['number']);
    global $userNav;
    if (isset($userNav)) mergeCartSessionWithDB();
}
echo $productId;
header('location:../../product/' . $productId . '-' . $product_slug);
