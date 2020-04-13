<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (isset($_GET['id'])) {
    $type_id = intval($_GET['id']);
} else show_404();
$type = get_a_record('types', $type_id);
if (!$type) show_404();

if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;
$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$options = array(
    'where' => 'product_typeid=' . $type_id,
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC'
);
$url = 'type/' . $type_id . '-' . $type['slug'];
$total_rows = get_total('products', $options);
$total = ceil($total_rows / $limit);
$products = get_all('products', $options);
$pagination = pagination($url, $page, $total);

if ($type['id'] != 0) {
    $breadCrumb = $type['type_name'];
}
$title = $type['type_name'] . ' - Quán Chị Kòi';
//load view
require('content/views/type/index.php');
