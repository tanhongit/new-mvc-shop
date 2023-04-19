<?php
permission_user();
permission_moderator();
require_once('admin/models/slides.php');
$options = array(
    'order_by' => 'id ASC'
);
$navHF = 'class="active open"';
$title = 'Slide Show HomePage';
$slides = get_all('slides', $options);
require('admin/views/slide/index.php');
