<?php
permission_user();
require_once('admin/models/media.php');
if (!empty($_POST)) {
    $media_edit = array(
        'id' => intval($_POST['media_id']),
        'media_name' => escape($_POST['name']),
    );
    $media_id =  save('media', $media_edit);
    $slugg = slug($_POST['name']);
    $config = array(
        'name' => $slugg,
        'upload_path'  => 'public/upload/media/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $images = upload('imggggg', $config);
    if ($images) {
        $media_edit = array(
            'id' => $media_id,
            'slug' => $images
        );
        save('media', $media_edit);
    }
    header('location:admin.php?controller=media');
}
if (isset($_GET['media_id'])) $media_id = intval($_GET['media_id']);
else $media_id = 0;
$title = ($media_id == 0) ? 'Thêm Ảnh mới' : 'Cập nhật ảnh';
$media_info = get_a_record('media', $media_id);
require('admin/views/media/edit.php');
