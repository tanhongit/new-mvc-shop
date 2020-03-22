<?php
require_once('admin/models/shop.php');
if (!empty($_POST)) {
    $category = array(
        'id' => intval($_POST['cate_id']),
        'category_name' => escape($_POST['name']),
        'slug' => slug($_POST['name']),
        'category_position' => intval($_POST['position'])
    );
    save('categories', $category);
    header('location:admin.php?controller=shop');
} else {
}
if (isset($_GET['cate_id'])) $cate_id = intval($_GET['cate_id']);
else $cate_id = 0;
$title = ($cate_id == 0) ? 'Thêm danh mục' : 'Sửa danh mục';
$user = $_SESSION['user'];
$category = get_a_record('categories', $cate_id);
require('admin/views/shop/edit.php');
