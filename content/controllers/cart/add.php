<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
}
$option_slug_product = array(
    'select' => 'slug',
    'where' => 'id=' . $product_id
);
$product_slugs = get_all('products', $option_slug_product);
foreach ($product_slugs as $slug) {
    $product_slug = $slug['slug'];
}
if (!empty($_POST)) {
    $product = array(
        'number' => intval($_POST['number_cart'])
    );
    cart_add($product_id, $product['number']);
    global $user_nav;
    if (isset($user_nav)) update_cart_user_db();
}
echo $product_id;
header('location:../../product/' . $product_id . '-' . $product_slug);
