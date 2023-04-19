<?php
permission_user();
permission_moderator();
//load model
require_once('admin/models/order.php');
$orderId = intval($_GET['order_id']);
order_delete($orderId);
header('location:admin.php?controller=order');