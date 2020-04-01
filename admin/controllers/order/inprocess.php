<?php 
permission_user();
//submit form click
if (!empty($_POST)) {
    $order = array(
        'id' => intval($_POST['order_id']),
        'status' => 2
    );
    save('orders', $order);
}
header('location:admin.php?controller=order');