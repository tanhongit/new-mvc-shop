<?php
permission_user();
require_once('admin/models/shop.php');
$cate_id = intval($_GET['cate_id']);
categories_delete($cate_id);
header('location:admin.php?controller=shop');
