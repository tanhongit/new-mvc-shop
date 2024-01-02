<?php

permission_user();

require_once('admin/models/products.php');

$title = 'Tổng Các Sản phẩm Vừa chỉnh sửa';
$productNav = 'class="active open"';

require('admin/views/product/update.php');
