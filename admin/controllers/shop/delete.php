<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/shop.php');
$cate_id = intval($_GET['cate_id']);
categories_delete($cate_id);
header('location:admin.php?controller=shop');
