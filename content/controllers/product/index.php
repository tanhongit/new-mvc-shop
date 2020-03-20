<?php
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
} else show_404();
$product = get_a_record('products', $product_id);
function updateCountView($id)
{
    global $linkconnectDB;
    $sql = "Update products set totalView = totalView + 1 WHERE id =$id";
    return mysqli_query($linkconnectDB, $sql);
}
if (!$product) {
    show_404();
} else   updateCountView($product_id);
$title = $product['product_name'] . ' - Quán Chị Kòi';

$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'id ASC'
));
$subcategories = get_a_record('subcategory', $product['sub_category_id']);
if ($product['sub_category_id'] != 0) {
    $breadCrumb = $subcategories['subcategory_name'];
}
//load view
require('content/views/product/index.php');
