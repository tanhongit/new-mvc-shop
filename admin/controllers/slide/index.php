<?php
permission_user();
require_once('admin/models/slides.php');
$url = 'admin.php?controller=slide';
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Slide Show HomePage';
$slides = get_all('slides', $options);
require('admin/views/slide/index.php');
