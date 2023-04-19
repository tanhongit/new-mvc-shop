<?php

permission_user();

require_once('admin/models/media.php');

$options = array(
    'order_by' => 'id ASC'
);
$title = 'Media List';
$navMedia = 'class="active open"';
$listMedia = get_all('media', $options);

require('admin/views/media/index.php');