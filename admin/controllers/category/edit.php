<?php

permission_user();
permission_moderator();

require_once('admin/models/category.php');

if (!empty($_POST)) {
    subcategory_update();
}

$categories = get_all('categories', array(
    'select' => 'id,category_name',
    'order_by' => 'id'
));

if (isset($_GET['subcate_id'])) {
    $subCateId = intval($_GET['subcate_id']);
} else {
    $subCateId = 0;
}

$title = $subCateId === 0 ? 'Thêm danh mục con' : 'Sửa danh mục con';
$navCategory = 'class="active open"';
$subcategory = get_a_record('subcategory', $subCateId);

require('admin/views/category/edit.php');
