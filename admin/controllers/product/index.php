<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/products.php');
$title = 'Tổng Danh Sách Các Sản phẩm';
$nav_product  = 'class="active open"';
require('admin/views/product/index.php');