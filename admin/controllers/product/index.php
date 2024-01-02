<?php

permission_user();

require_once('admin/models/products.php');

$title = 'Tổng Danh Sách Các Sản phẩm';
$productNav = 'class="active open"';

require('admin/views/product/index.php');
