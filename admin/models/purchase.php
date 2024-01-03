<?php

function orderCancel($id)
{
    if (isset($_GET['order_id'])) {
        $id = intval($_GET['order_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE orders SET status=3,editTime='" . gmdate('Y-m-d H:i:s', time() + 7 * 3600) . "' where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function purchase_order_detail($orderId)
{
    global $linkConnectDB;
    $sql = "SELECT products.id, products.product_name,products.img1, products.product_price,products.product_typeid, products.percentoff, products.saleoff, order_detail.quantity, order_detail.product_id, products.product_description, products.slug
			FROM order_detail
			INNER JOIN products ON products.id=order_detail.product_id
			WHERE order_detail.order_id=$orderId";
    $query = mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
    $data = [];
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }

    return $data;
}
