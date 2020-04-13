<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/category.php');
$options = array(
    'order_by' => 'id'
);
$title = 'Danh mục sản phẩm';
$subcategories = get_all('subcategory', $options);
$nav_category = 'class="active open"';
//load view
require('admin/views/category/index.php');
