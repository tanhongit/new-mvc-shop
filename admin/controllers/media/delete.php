<?php

permission_user();
permission_moderator();

require_once('admin/models/media.php');

$mediaId = intval($_GET['media_id']);
mediaDestroy($mediaId);

header('location:admin.php?controller=media');
