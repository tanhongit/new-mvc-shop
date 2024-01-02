<?php

permission_user();
permission_moderator();
require_once('admin/models/slides.php');
$slideId = intval($_GET['slide_id']);
slide_delete($slideId);
header('location:admin.php?controller=slide');
