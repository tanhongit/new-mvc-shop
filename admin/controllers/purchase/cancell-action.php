<?php

require_once('admin/models/purchase.php');

$orderId = intval($_GET['order_id']);
orderCancel($orderId);

header('location:admin.php?controller=purchase&action=cancelled');
