<?php

permission_user();

require_once('admin/models/media.php');

$options = [
    'order_by' => 'id ASC',
];
$title = 'Media List';
$navMedia = 'class="active open"';
$listMedia = getAll('media', $options);

require('admin/views/media/index.php');
