<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
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
if (isset($_GET['subcate_id'])) $subcate_id = intval($_GET['subcate_id']);
else $subcate_id = 0;
$title = ($subcate_id == 0) ? 'Thêm danh mục con' : 'Sửa danh mục con';
$nav_category = 'class="active open"';
$subcategory = get_a_record('subcategory', $subcate_id);
require('admin/views/category/edit.php');
