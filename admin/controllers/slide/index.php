<?php
permission_user();
require_once('admin/models/slides.php');
if (isset($_POST['slide_id'])) {
    foreach ($_POST['slide_id'] as $slide_id) {
        $slide_id = intval($slide_id);
        slide_delete($slide_id);
    }
}
$url = 'admin.php?controller=slide';
$options = array(
    'order_by' => 'id ASC'
);
$title = 'Slide Show HomePage';
$slides = get_all('slides', $options);
require('admin/views/slide/index.php');
