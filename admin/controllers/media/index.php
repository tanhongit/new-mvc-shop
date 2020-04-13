<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/media.php');
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Media List';
$nav_media = 'class="active open"';
$list_media = get_all('media', $options);
require('admin/views/media/index.php');