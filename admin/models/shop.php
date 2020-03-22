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
