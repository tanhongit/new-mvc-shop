<?php

if (isset($_GET['id'])) {
    $type_id = intval($_GET['id']);
} else {
    show404NotFound();
}
$type = getRecord('types', $type_id);
if (!$type) {
    show404NotFound();
}

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}
$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$options = [
    'where' => 'product_typeid=' . $type_id,
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC',
];
$url = 'type/' . $type_id . '-' . $type['slug'];
$totalRows = getTotal('products', $options);
$total = ceil($totalRows / $limit);
$products = getAll('products', $options);
$pagination = pagination($url, $page, $total);

if ($type['id'] != 0) {
    $breadCrumb = $type['type_name'];
}
$title = $type['type_name'] . ' - Quán Chị Kòi';
//load view
require('content/views/type/index.php');
