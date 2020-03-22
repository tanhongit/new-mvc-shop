<?php
function products_delete($id)
{
    if (isset($_GET['product_id'])) {
        $id = intval($_GET['product_id']);
    } else show_404();
    $product = get_a_record('products', $id);
    $image = 'public/upload/products/' . $product['img1'];
    if (is_file($image)) {
        unlink($image);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM products WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
