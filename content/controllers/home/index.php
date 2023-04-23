<?php

$options_hotproduct = [
    'where'    => 'product_typeid = 1',
    'limit'    => '12',
    'offset'   => '0',
    'order_by' => 'createDate DESC',
];
$hot_products = get_all('products', $options_hotproduct);
$options_newproduct = [
    'where'    => 'product_typeid = 2',
    'limit'    => '12',
    'offset'   => '0',
    'order_by' => 'createDate DESC',
];
$new_products = get_all('products', $options_newproduct);
$options_saleproduct = [
    'where'    => 'product_typeid = 3',
    'limit'    => '12',
    'offset'   => '0',
    'order_by' => 'createDate DESC',
];
$saleoff_products = get_all('products', $options_saleproduct);
$title = 'Trang chủ - Quán Chị Kòi';
$option_slide = [
    'order_by' => 'id asc',
];
$slides = get_all('slides', $option_slide);
foreach ($slides as $action) {
    if ($action['status'] == 1) {
        $idslide = $action['id'];
    }
}
if (isset($idslide)) {
    $slide = get_a_record('slides', $idslide);
}
require 'content/views/home/index.php';
