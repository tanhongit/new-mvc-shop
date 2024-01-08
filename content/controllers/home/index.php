<?php

$options_hotproduct = [
    'where' => 'product_typeid = 1',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC',
];
$hotProducts = getAll('products', $options_hotproduct);
$options_newproduct = [
    'where' => 'product_typeid = 2',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC',
];
$newProducts = getAll('products', $options_newproduct);
$options_saleproduct = [
    'where' => 'product_typeid = 3',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC',
];
$saleoffProducts = getAll('products', $options_saleproduct);
$title = 'Trang chủ - Quán Chị Kòi';
$option_slide = [
    'order_by' => 'id asc',
];
$slides = getAll('slides', $option_slide);
foreach ($slides as $action) {
    if ($action['status'] == 1) {
        $idslide = $action['id'];
    }
}
if (isset($idslide)) {
    $slide = getRecord('slides', $idslide);
}
require('content/views/home/index.php');
