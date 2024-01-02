<?php

permission_user();

require_once('admin/models/media.php');

if (!empty($_POST)) {
    mediaStore();
}

if (isset($_GET['media_id'])) {
    $mediaId = intval($_GET['media_id']);
} else {
    $mediaId = 0;
}

$title = ($mediaId == 0) ? '' : 'Cập nhật ảnh';
$navMedia = 'class="active open"';
$mediaInfo = getRecord('media', $mediaId);

require('admin/views/media/add.php');
