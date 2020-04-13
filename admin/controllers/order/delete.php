<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
//load model
require_once('admin/models/order.php');
$order_id = intval($_GET['order_id']);
order_delete($order_id);
header('location:admin.php?controller=order');