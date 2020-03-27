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
}
echo $product_id;
$result_add = "<div class='alert alert-susscess'><strong>Dome!</strong> Bạn đã thêm thành công sản phẩm này vào giỏ hàng. Bạn có thể tiếp tục mua hàng hoặc chọn Giỏ hảng tại thanh menu để thanh toán. <a href='cart'>Đến giỏ hàng</a></div>";
header('location:../../product/' . $product_id . '-' . $product_slug);
