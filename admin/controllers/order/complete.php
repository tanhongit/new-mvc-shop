<?php
permission_user();
require_once('admin/models/order.php');
//submit form click
if (!empty($_POST)) {
    order_complete($_POST['order_id']);
}
header('location:admin.php?controller=order');