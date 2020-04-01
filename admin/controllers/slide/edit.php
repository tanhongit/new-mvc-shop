<?php
permission_user();
require_once('admin/models/slides.php');
if (!empty($_POST)) {
    slide_update();
} else {
}
if (isset($_GET['slide_id'])) $slide_id = intval($_GET['slide_id']);
else $slide_id = 0;
$title = ($slide_id == 0) ? 'Thêm slides' : 'Sửa slides';
$slide = get_a_record('slides', $slide_id);
require('admin/views/slide/edit.php');
