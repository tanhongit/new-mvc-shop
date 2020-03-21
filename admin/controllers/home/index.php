<?php
$title = 'Quản trị hệ thống - Quán Chị Kòi';
$user = $_SESSION['user'];
//table order
$options_order_complete = array(
    'where' => 'status = 1',
    'order_by' => 'createtime DESC'
);
$order_completes = get_all('orders', $options_order_complete);

$options_order = array(
    'order_by' => 'id DESC'
);
$total_order = get_total('orders', $options_order);

$options_process = array(
    'where' => 'status = 1',
    'order_by' => 'id DESC'
);
$total_order_prosess = get_total('orders', $options_process);

$options_order_new = array(
    'limit' => 1,
    'offset' => 0,
    'order_by' => 'id DESC'
);
$order_new = select_a_record('orders', $options_order_new);

$options_inprocess = array(
    'where' => 'status = 0',
    'order_by' => 'id DESC'
);
$total_order_inprosess = get_total('orders', $options_inprocess);
require('admin/views/home/index.php');
