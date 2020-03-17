<?php
$options_hotproduct = array(
    'where' => 'product_typeid = 1',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$hot_products = get_all('products',$options_hotproduct);
$options_newproduct = array(
    'where' => 'product_typeid = 2',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$new_products = get_all('products',$options_newproduct);
$options_saleproduct = array(
    'where' => 'product_typeid = 3',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$saleoff_products = get_all('products',$options_saleproduct);
$title = 'Trang chủ - Chị Kòi Shop';
require('content/views/home/index.php');