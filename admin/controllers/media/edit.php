<?php

permission_user();
permission_moderator();

require_once('admin/models/media.php');

if (!empty($_POST)) {
    mediaUpdate();
}

if (isset($_GET['media_id'])) {
    $mediaId = intval($_GET['media_id']);
} else {
    $mediaId = 0;
}

$title = ($mediaId == 0) ? 'Thêm Ảnh mới' : 'Cập nhật ảnh';
$navMedia = 'class="active open"';
$mediaInfo = getRecord('media', $mediaId);

require('admin/views/media/edit.php');
