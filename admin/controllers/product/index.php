<?php
permission_user();
require_once('admin/models/products.php');
$title = 'Tổng Danh Sách Các Sản phẩm';
$nav_product  = 'class="active open"';
require('admin/views/product/index.php');