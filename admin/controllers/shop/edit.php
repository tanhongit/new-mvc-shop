<?php

permission_user();
permission_moderator();

require_once('admin/models/shop.php');

if (!empty($_POST)) {
    categoryUpdate();
}

if (isset($_GET['cate_id'])) {
    $categoryId = intval($_GET['cate_id']);
} else {
    $categoryId = 0;
}

$title = ($categoryId == 0) ? 'Thêm danh mục' : 'Sửa danh mục';
$category = getRecord('categories', $categoryId);
$navCategory = 'class="active open"';

require('admin/views/shop/edit.php');
