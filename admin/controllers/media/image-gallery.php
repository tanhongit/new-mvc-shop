<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
$user_info_nav = get_a_record('users', $user_nav);
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Image gellery';
$nav_media = 'class="active open"';
$products = get_all('products', $options);
require('admin/views/media/image-gallery.php');
