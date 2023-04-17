<?php

permission_user();
permission_moderator();

require_once('admin/models/category.php');

$options = array(
    'order_by' => 'id'
);
$title = 'Danh mục sản phẩm';
$subcategories = get_all('subcategory', $options);
$navCategory = 'class="active open"';

require('admin/views/category/index.php');
