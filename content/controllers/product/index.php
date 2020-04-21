<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('content/models/products.php');
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
} else show_404();
$product = get_a_record('products', $product_id);

if (!$product) {
    show_404();
} else   updateCountView($product_id);
$title = $product['product_name'] . ' - Quán Chị Kòi';
$image_product = PATH_URL . 'public/upload/products/' . $product['img1'];
$url_product = 'product/' . $product['id'] . '-' . $product['slug'];
$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'id ASC'
));
$subcategories = get_a_record('subcategory', $product['sub_category_id']);
if ($product['sub_category_id'] != 0) {
    $breadCrumb = $subcategories['subcategory_name'];
}
$comment_option = array(
    'where' => 'product_id=' . $product['id'],
    'limit' => 10,
    'offset' => 0,
    'order_by' => 'id desc'
);
$comment_total_option = array(
    'where' => 'product_id=' . $product['id']
);
$comments = get_all('comments', $comment_option);
$comments_total = get_total('comments', $comment_total_option);
//load view
require('content/views/product/index.php');
