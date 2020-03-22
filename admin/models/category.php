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
