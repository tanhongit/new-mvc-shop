<?php
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Image gellery';
$user = $_SESSION['user'];
$products = get_all('products', $options);
require('admin/views/media/image-gallery.php');
