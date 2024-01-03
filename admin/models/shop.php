<?php

function categoryDestroy($id)
{
    $id = intval($id);
    require_once('admin/models/products.php');
    $options = [
        'select' => 'id',
        'where' => 'category_id=' . $id,
    ];
    $products = getAll('products', $options);
    foreach ($products as $product) {
        postDestroy($product['id']);
    }
    global $linkConnectDB;
    $sql = "DELETE FROM categories WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function categoryUpdate()
{
    $name = escape($_POST['name']);
    if (strlen($_POST['slug']) >= 5) {
        $slug = slug($_POST['slug']);
    } else {
        $slug = slug($name);
    }

    $category = [
        'id' => intval($_POST['cate_id']),
        'category_name' => escape($_POST['name']),
        'slug' => $slug,
        'category_position' => intval($_POST['position']),
    ];
    save('categories', $category);
    header('location:admin.php?controller=shop');
}
