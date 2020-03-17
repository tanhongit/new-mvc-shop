<?php
$pid = intval($_GET['id']);
$product = get_a_record('products', $pid);
function updateCountView($id){
    global $linkconnectDB;
    $sql = "Update products set totalView = totalView + 1 WHERE id =$id";
    return mysqli_query($linkconnectDB,$sql);
}
if (!$product) {
    show_404();
}else   updateCountView($pid);
$title = $product['product_name'];

$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'id ASC'
));
$subcategories = get_a_record('subcategory', $product['sub_category_id']);
if ($product['sub_category_id'] != 0) {
    $breadCrumb = $subcategories['subcategory_name'];
}
//load view
require('content/views/product/view.php');