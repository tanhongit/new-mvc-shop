<?php

if (isset($_GET['id'])) {
    $cateid = intval($_GET['id']);
} else {
    show_404();
}
$category = get_a_record('subcategory', $cateid);
if (!$category) {
    show_404();
}
$categories = get_all('subcategory', [
    'select'   => 'id, subcategory_name',
    'order_by' => 'id ASC',
]);
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$options = [
    'where'    => 'sub_category_id ='.$cateid,
    'limit'    => $limit,
    'offset'   => $offset,
    'order_by' => 'id DESC',
];

$url = 'category/'.$cateid.'-'.$category['slug'];

$totalRows = get_total('products', $options);
$total = ceil($totalRows / $limit);

$products = get_all('products', $options);
$pagination = pagination($url, $page, $total);

$subcategories = get_a_record('subcategory', $_GET['id']);
if ($subcategories['id'] != 0) {
    $breadCrumb = $subcategories['subcategory_name'];
}
$title = $category['subcategory_name'].' - Quán Chị Kòi';
require 'content/views/category/index.php';
