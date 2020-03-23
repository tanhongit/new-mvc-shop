<?php
require_once('admin/models/category.php');
if (isset($_POST['subcate_id'])) {
    foreach ($_POST['subcate_id'] as $subcate_id) {
        $subcate_id = intval($subcate_id);
        subcategories_delete($subcate_id);
    }
}
$options = array(
    'order_by' => 'id'
);
$title = 'Danh mục sản phẩm';
$user = $_SESSION['user'];
$subcategories = get_all('subcategory', $options);
//load view
require('admin/views/category/index.php');
