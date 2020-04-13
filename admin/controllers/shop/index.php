<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/shop.php');
$options = array(
    'order_by' => 'id'
);
$title = 'Nhóm Danh mục sản phẩm';
$categories = get_all('categories', $options);
$nav_category = 'class="active open"';
//load view
require('admin/views/shop/index.php');