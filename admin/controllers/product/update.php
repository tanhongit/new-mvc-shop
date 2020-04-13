<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/products.php');
$title = 'Tổng Các Sản phẩm Vừa chỉnh sửa';
$nav_product  = 'class="active open"';
require('admin/views/product/update.php');