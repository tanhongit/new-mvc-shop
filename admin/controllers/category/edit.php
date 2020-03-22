<?php
if (!empty($_POST)) {
    $subcategory = array(
        'id' => intval($_POST['subcate_id']),
        'subcategory_name' => escape($_POST['name']),
        'slug' => slug($_POST['name']),
        'category_id' => intval($_POST['category_id'])
    );
    save('subcategory', $subcategory);
    header('location:admin.php?controller=category');
}
$categories = get_all('categories', array(
    'select' => 'id,category_name',
    'order_by' => 'id'
));
if (isset($_GET['subcate_id'])) $subcate_id = intval($_GET['subcate_id']);
else $subcate_id = 0;
$title = ($subcate_id == 0) ? 'Thêm danh mục con' : 'Sửa danh mục con';
$user = $_SESSION['user'];
$subcategory = get_a_record('subcategory', $subcate_id);
require('admin/views/category/edit.php');
