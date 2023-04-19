<?php

permission_user();
permission_moderator();

require_once('admin/models/media.php');

if (!empty($_POST)) {
    media_update();
}

if (isset($_GET['media_id'])) {
    $mediaId = intval($_GET['media_id']);
} else {
    $mediaId = 0;
}

$title = ($mediaId == 0) ? 'Thêm Ảnh mới' : 'Cập nhật ảnh';
$navMedia = 'class="active open"';
$media_info = get_a_record('media', $mediaId);

require('admin/views/media/edit.php');
