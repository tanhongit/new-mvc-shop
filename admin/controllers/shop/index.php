<?php
require_once('admin/models/shop.php');
if (isset($_POST['cate_id'])) {
    foreach ($_POST['cate_id'] as $cate_id) {
        $cate_id = intval($cate_id);
        categories_delete($cate_id);
    }
}
$options = array(
    'order_by' => 'id'
);
$title = 'Danh mục sản phẩm';
$user = $_SESSION['user'];
$categories = get_all('categories', $options);
//load view
require('admin/views/shop/index.php');