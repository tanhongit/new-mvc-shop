<?php

permission_user();
permission_moderator();

require_once('admin/models/shop.php');

$categoryId = intval($_GET['cate_id']);
categoryDestroy($categoryId);

header('location:admin.php?controller=shop');
