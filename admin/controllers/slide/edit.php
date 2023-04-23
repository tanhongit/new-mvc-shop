<?php

permission_user();
permission_moderator();
require_once 'admin/models/slides.php';
if (!empty($_POST)) {
    slide_update();
} else {
}
if (isset($_GET['slide_id'])) {
    $slideId = intval($_GET['slide_id']);
} else {
    $slideId = 0;
}
$title = ($slideId == 0) ? 'Thêm slides' : 'Sửa slides';
$navHF = 'class="active open"';
$slide = get_a_record('slides', $slideId);
require 'admin/views/slide/edit.php';
