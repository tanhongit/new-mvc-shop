<?php
//load model
$pid = intval($_GET['id']);
$product = get_a_record('products', $pid);
if (!$product) {
    show_404();
}else   updateCountView($pid);
function updateCountView($id){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "Update products set totalView = totalView + 1 WHERE id =$id";
    return mysqli_query($link,$sql);
}
$title = $product['Name'];

$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'id ASC'
));
$subcategories = get_a_record('subcategory', $product['sub_category_id']);
if ($product['sub_category_id'] != 0) {
    $breadCrumb = $subcategories['subcategory_name'];
}
//load view
require('website/views/product/view.php');