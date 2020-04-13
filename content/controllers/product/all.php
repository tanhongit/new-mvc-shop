<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

$options = array(
    'order_by' => 'id desc',
    'limit' => $limit,
    'offset' => $offset,
);

$url = 'index.php?controller=product&action=all';
$total_rows = get_total('products', $options);
$total = ceil($total_rows / $limit);
$pagination = pagination($url, $page, $total);

$products_all = get_all('products', $options);
require('content/views/product/all.php');
