<?php
require_once('admin/models/purchase.php');
$orderId = intval($_GET['order_id']);
order_cancell($orderId);
header('location:admin.php?controller=purchase&action=cancelled');
