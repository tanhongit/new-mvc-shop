<?php

permission_user();
permission_moderator();

require_once('admin/models/order.php');

$orderId = intval($_GET['order_id']);

orderDestroy($orderId);

header('location:admin.php?controller=order');
