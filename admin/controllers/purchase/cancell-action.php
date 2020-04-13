<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('admin/models/purchase.php');
$order_id = intval($_GET['order_id']);
order_cancell($order_id);
header('location:admin.php?controller=purchase&action=cancelled');
