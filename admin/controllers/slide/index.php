<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/slides.php');
$options = array(
    'order_by' => 'id ASC'
);
$nav_hf = 'class="active open"';
$title = 'Slide Show HomePage';
$slides = get_all('slides', $options);
require('admin/views/slide/index.php');
