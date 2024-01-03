<?php

function deleteSubCategory($id)
{
    $id = intval($id);
    require_once('admin/models/products.php');
    $options = [
        'select' => 'id',
        'where' => 'sub_category_id=' . $id,
    ];
    $products = getAll('products', $options);
    foreach ($products as $product) {
        postDestroy($product['id']);
    }
    global $linkConnectDB;
    $sql = "DELETE FROM subcategory WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function updateSubCategory()
{
    $subcategory = [
        'id' => intval($_POST['sub_cate_id']),
        'subcategory_name' => escape($_POST['name']),
        'slug' => slug($_POST['name']),
        'category_id' => intval($_POST['category_id']),
    ];
    save('subcategory', $subcategory);
    header('location:admin.php?controller=category');
}
