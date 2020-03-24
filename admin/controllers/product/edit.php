<?php
//load model
require_once('admin/models/products.php');
if (!empty($_POST)) {
    $name = escape($_POST['name']);
    $product = array(
        'id' => intval($_POST['product_id']),
        'category_id' => intval($_POST['category_id']),
        'sub_category_id' => intval($_POST['subcategory_id']),
        'product_name' => $name,
        'slug' => slug($name),
        'product_size' => escape($_POST['size']),
        'product_typeid' => intval($_POST['type_id']),
        'product_price' => intval($_POST['price']),
        'product_color' => escape($_POST['color']),
        'product_material' => escape($_POST['material']),
        'createDate' => escape($_POST['createdate']),
        'saleoff' => intval($_POST['status']),
        'percentoff' => intval($_POST['percent_off']),
        'totalView' => intval($_POST['totalview']),
        'product_description' => ($_POST['description']),
        'product_detail' => ($_POST['detail']),
        'createBy' => escape($_POST['createby']),
        'editBy' => escape($_POST['editby']),
        'editDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
    );
    $product_id = save('products', $product);
    //upload ảnh 1 của product
    $image_name1 = slug($name) . '-' . $product_id . 'img1';
    $config1 = array(
        'name' => $image_name1,
        'upload_path'  => 'public/upload/products/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('img1', $config1);
    //cập nhật ảnh mới lên database 
    if ($image1) {
        $product = array(
            'id' => $product_id,
            'img1' => $image1
        );
        save('products', $product);
    }
    //upload ảnh 2 của product
    $image_name2 = slug($name) . '-' . $product_id . 'img2';
    $config2 = array(
        'name' => $image_name2,
        'upload_path'  => 'public/upload/products/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image2 = upload('img2', $config2);
    //cập nhật ảnh mới lên database
    if ($image2) {
        $product = array(
            'id' => $product_id,
            'img2' => $image2
        );
        save('products', $product);
    }
    //upload ảnh 3 của product
    $image_name3 = slug($name) . '-' . $product_id . 'img3';
    $config3 = array(
        'name' => $image_name3,
        'upload_path'  => 'public/upload/products/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image3 = upload('img3', $config3);
    //cập nhật ảnh mới lên database 
    if ($image3) {
        $product = array(
            'id' => $product_id,
            'img3' => $image3
        );
        save('products', $product);
    }
    //upload ảnh 4 của product
    $image_name4 = slug($name) . '-' . $product_id . 'img4';
    $config4 = array(
        'name' => $image_name4,
        'upload_path'  => 'public/upload/products/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image4 = upload('img4', $config4);
    //cập nhật ảnh mới lên database 
    if ($image4) {
        $product = array(
            'id' => $product_id,
            'img4' => $image4
        );
        save('products', $product);
    }
    //chuyển hướng nếu có cập nhật
    header('location:admin.php?controller=product');
}

if (isset($_GET['product_id'])) $product_id = intval($_GET['product_id']);
else $product_id = 0;
$title = ($product_id == 0) ? 'Thêm sản phẩm' : 'Sửa sản phẩm';
$user = $_SESSION['user'];
$product = get_a_record('products', $product_id);
$options = array(
    'order_by' => 'createDate'
);
$products = get_all('products', $options);
$categories = get_all('categories', array(
    'select' => 'id,category_name',
    'order_by' => 'id'
));
$subcategories = get_all('subcategory', array(
    'select' => 'id,subcategory_name',
    'order_by' => 'subcategory_name'
));
$types = get_all('types', array(
    'select' => 'id,type_name',
    'order_by' => 'id'
));
require('admin/views/product/edit.php');
