<?php
/**
 * @var $userNav
 */

permission_user();

$userInfoNav = getRecord('users', $userNav);

$options = [
    'order_by' => 'id ASC',
];
$title = 'Image gellery';
$navMedia = 'class="active open"';
$products = getAll('products', $options);

require('admin/views/media/image-gallery.php');
