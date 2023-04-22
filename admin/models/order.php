<?php
function orderDetail($orderId)
{
    global $linkConnectDB;
    $sql = "SELECT products.id, products.product_name,products.img1, products.product_price,products.product_typeid, products.percentoff, products.saleoff, order_detail.quantity, products.slug
			FROM order_detail
			INNER JOIN products ON products.id=order_detail.product_id
			WHERE order_detail.order_id=$orderId";
    $query = mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;
}
function orderDestroy($id)
{
    if (isset($_GET['order_id'])) {
        $id = intval($_GET['order_id']);
    } else show_404();
    global $linkConnectDB;
    $sql = "DELETE FROM orders WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function orderComplete($id)
{
    $id = intval($_POST['order_id']);
    $order = array(
        'id' => $id,
        'status' => 1
    );
    save('orders', $order);
}
function orderInProcess($id)
{
    $id = intval($_POST['order_id']);
    $order = array(
        'id' => $id,
        'status' => 2
    );
    save('orders', $order);
}
