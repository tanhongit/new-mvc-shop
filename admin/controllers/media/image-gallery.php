<?php
/**
 * @var $userNav
 */

permission_user();

$userInfoNav = get_a_record('users', $userNav);

$options = array(
    'order_by' => 'id ASC'
);
$title = 'Image gellery';
$navMedia = 'class="active open"';
$products = get_all('products', $options);

require('admin/views/media/image-gallery.php');
