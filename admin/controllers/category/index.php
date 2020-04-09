<?php
permission_user();
require_once('admin/models/category.php');
$options = array(
    'order_by' => 'id'
);
$title = 'Danh mục sản phẩm';
$subcategories = get_all('subcategory', $options);
//load view
require('admin/views/category/index.php');
