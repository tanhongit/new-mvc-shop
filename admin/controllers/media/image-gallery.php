<?php
permission_user();
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Image gellery';
$products = get_all('products', $options);
require('admin/views/media/image-gallery.php');
