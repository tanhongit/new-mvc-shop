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
    $image2 = 'public/upload/products/' . $product['img2'];
    if (is_file($image2)) {
        unlink($image2);
    }
    $image3 = 'public/upload/products/' . $product['img3'];
    if (is_file($image3)) {
        unlink($image3);
    }
    $image4 = 'public/upload/products/' . $product['img4'];
    if (is_file($image4)) {
        unlink($image4);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM products WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
