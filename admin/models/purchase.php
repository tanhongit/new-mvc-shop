<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function order_cancell($id)
{
    if (isset($_GET['order_id'])) {
        $id = intval($_GET['order_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE orders SET status=3,editTime='" . gmdate('Y-m-d H:i:s', time() + 7 * 3600) . "' where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function purchase_order_detail($order_id)
{
    global $linkconnectDB;
    $sql = "SELECT products.id, products.product_name,products.img1, products.product_price,products.product_typeid, products.percentoff, products.saleoff, order_detail.quantity, order_detail.product_id, products.product_description, products.slug
			FROM order_detail
			INNER JOIN products ON products.id=order_detail.product_id
			WHERE order_detail.order_id=$order_id";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;
}
