<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/media.php');
$media_id = intval($_GET['media_id']);
media_delete($media_id);
header('location:admin.php?controller=media');