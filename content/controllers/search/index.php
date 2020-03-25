
<?php
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;
$options = array(
    'where' => "product_name LIKE '%" . ($keyword) . "%' or product_price like '%" . ($keyword) . "%'",
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC'
);
$url = 'index.php?controller=search&keyword=' . $keyword;
$total_rows = get_total('products', $options);
$total = ceil($total_rows / $limit);

//data
$products = get_all('products', $options);
$pagination = pagination($url, $page, $total);
//load view
require('content/views/search/index.php');
