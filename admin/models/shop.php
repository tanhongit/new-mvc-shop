<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function categories_delete($id)
{
    $id = intval($id);
    require_once('admin/models/products.php');
    $options = array(
        'select' => 'id',
        'where' => 'category_id=' . $id
    );
    $products = get_all('products', $options);
    foreach ($products as $product) {
        products_delete($product['id']);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM categories WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function category_uodate()
{
    $name = escape($_POST['name']);
    if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
    else $slug = slug($name);

    $category = array(
        'id' => intval($_POST['cate_id']),
        'category_name' => escape($_POST['name']),
        'slug' =>  $slug,
        'category_position' => intval($_POST['position'])
    );
    save('categories', $category);
    header('location:admin.php?controller=shop');
}
