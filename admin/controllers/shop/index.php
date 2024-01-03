<?php

permission_user();
permission_moderator();

require_once('admin/models/shop.php');

$options = [
    'order_by' => 'id',
];
$title = 'Nhóm Danh mục sản phẩm';
$categories = getAll('categories', $options);
$navCategory = 'class="active open"';

//load view
require('admin/views/shop/index.php');
