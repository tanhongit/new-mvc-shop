<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function subcategories_delete($id)
{
    $id = intval($id);
    require_once('admin/models/products.php');
    $options = array(
        'select' => 'id',
        'where' => 'sub_category_id=' . $id
    );
    $products = get_all('products', $options);
    foreach ($products as $product) {
        products_delete($product['id']);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM subcategory WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function subcategory_update()
{
    $subcategory = array(
        'id' => intval($_POST['subcate_id']),
        'subcategory_name' => escape($_POST['name']),
        'slug' => slug($_POST['name']),
        'category_id' => intval($_POST['category_id'])
    );
    save('subcategory', $subcategory);
    header('location:admin.php?controller=category');
}
