<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/media.php');
if (!empty($_POST)) {
    media_update();
}
if (isset($_GET['media_id'])) $media_id = intval($_GET['media_id']);
else $media_id = 0;
$title = ($media_id == 0) ? 'Thêm Ảnh mới' : 'Cập nhật ảnh';
$nav_media = 'class="active open"';
$media_info = get_a_record('media', $media_id);
require('admin/views/media/edit.php');
