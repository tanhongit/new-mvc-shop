<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (isset($_GET['id'])) {
    $shop_id = intval($_GET['id']);
} else show_404();
$category = get_a_record('categories', $shop_id);
if (!$category) show_404();
$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'category_position ASC'
));

if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$options = array(
    'where' => 'category_id=' . $shop_id,
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC'
);

$url = 'shop/' . $shop_id . '-' . $category['slug'];
$total_rows = get_total('products', $options);
$total = ceil($total_rows / $limit);

$products = get_all('products', $options);
$pagination = pagination($url, $page, $total);

if ($category['id'] != 0) {
    $breadCrumb = $category['category_name'];
}
$title = $category['category_name'] . ' - Quán Chị Kòi';
//load view
require('content/views/shop/index.php');
