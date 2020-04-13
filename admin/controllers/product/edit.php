<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
//load model
require_once('admin/models/products.php');
if (!empty($_POST)) {
    product_update();
}

if (isset($_GET['product_id'])) $product_id = intval($_GET['product_id']);
else $product_id = 0;
$title = ($product_id == 0) ? 'Thêm sản phẩm' : 'Sửa sản phẩm: ';
$nav_product  = 'class="active open"';
$product = get_a_record('products', $product_id);
if ($product_id <> 0) $title .= $product['product_name'];
$options = array(
    'order_by' => 'createDate'
);
$products = get_all('products', $options);
$categories = get_all('categories', array(
    'select' => 'id,category_name',
    'order_by' => 'id'
));
$subcategories = get_all('subcategory', array(
    'select' => 'id,subcategory_name',
    'order_by' => 'subcategory_name'
));
$types = get_all('types', array(
    'select' => 'id,type_name',
    'order_by' => 'id'
));
require('admin/views/product/edit.php');
