<?php

if (isset($_GET['id'])) {
    $shop_id = intval($_GET['id']);
} else {
    show_404();
}
$category = get_a_record('categories', $shop_id);
if (!$category) {
    show_404();
}
$categories = get_all('categories', [
    'select'   => 'id, category_name',
    'order_by' => 'category_position ASC',
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
    'where'    => 'category_id='.$shop_id,
    'limit'    => $limit,
    'offset'   => $offset,
    'order_by' => 'id DESC',
];

$url = 'shop/'.$shop_id.'-'.$category['slug'];
$totalRows = get_total('products', $options);
$total = ceil($totalRows / $limit);

$products = get_all('products', $options);
$pagination = pagination($url, $page, $total);

if ($category['id'] != 0) {
    $breadCrumb = $category['category_name'];
}
$title = $category['category_name'].' - Quán Chị Kòi';
//load view
require 'content/views/shop/index.php';
