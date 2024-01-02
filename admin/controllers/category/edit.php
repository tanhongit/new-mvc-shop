<?php

permission_user();
permission_moderator();

require_once('admin/models/category.php');

if (!empty($_POST)) {
    updateSubCategory();
}

$categories = getAll('categories', [
    'select' => 'id,category_name',
    'order_by' => 'id',
]);

if (isset($_GET['sub_cate_id'])) {
    $subCateId = intval($_GET['sub_cate_id']);
} else {
    $subCateId = 0;
}

$title = $subCateId === 0 ? 'Thêm danh mục con' : 'Sửa danh mục con';
$navCategory = 'class="active open"';
$subcategory = getRecord('subcategory', $subCateId);

require('admin/views/category/edit.php');
