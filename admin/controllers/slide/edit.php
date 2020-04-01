<?php
permission_user();
require_once('admin/models/slides.php');
if (!empty($_POST)) {
    $name = escape($_POST['name']);
    $slides = array(
        'id' => intval($_POST['slide_id']),
        'slide_name' => escape($_POST['name']),
        'slide_text1' => escape($_POST['slide_text1']),
        'slide_text2' => escape($_POST['slide_text2']),
        'slide_text3' => escape($_POST['slide_text3']),
        'slide_text4' => escape($_POST['slide_text4']),
        'slide_text5' => escape($_POST['slide_text5']),
        'status' => intval($_POST['status'])
    );
    $slide_id = save('slides', $slides);
    $image_name1 = 'image1' . '-' . $slide_id . '-' . slug($name);
    $config = array(
        'name' => $image_name1,
        'upload_path' => 'public/upload/slides/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('image1', $config);//$field = name of input
    if ($image1) {
        $slides = array(
            'id' => $slide_id,
            'slide_img1' => $image1
        );
        save('slides', $slides);
    }
    $image_name2 = 'image2' . '-' . $slide_id . '-' . slug($name);
    $config = array(
        'name' => $image_name2,
        'upload_path' => 'public/upload/slides/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image2 = upload('image2', $config);
    if ($image2) {
        $slides = array(
            'id' => $slide_id,
            'slide_img2' => $image2
        );
        save('slides', $slides);
    }
    $image_name3 = 'image3' . '-' . $slide_id . '-' . slug($name);
    $config = array(
        'name' => $image_name3,
        'upload_path' => 'public/upload/slides/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image3 = upload('image3', $config);
    if ($image3) {
        $slides = array(
            'id' => $slide_id,
            'slide_img3' => $image3
        );
        save('slides', $slides);
    }
    $image_name4 = 'image4' . '-' . $slide_id . '-' . slug($name);
    $config = array(
        'name' => $image_name4,
        'upload_path' => 'public/upload/slides/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image4 = upload('image4', $config);
    if ($image4) {
        $slides = array(
            'id' => $slide_id,
            'slide_img4' => $image4
        );
        save('slides', $slides);
    }
    $image_name5 = 'image5' . '-' . $slide_id . '-' . slug($name);
    $config = array(
        'name' => $image_name5,
        'upload_path' => 'public/upload/slides/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image5 = upload('image5', $config);
    if ($image5) {
        $slides = array(
            'id' => $slide_id,
            'slide_img5' => $image5
        );
        save('slides', $slides);
    }
    header('location:admin.php?controller=slide');
} else {
}
if (isset($_GET['slide_id'])) $slide_id = intval($_GET['slide_id']);
else $slide_id = 0;
$title = ($slide_id == 0) ? 'Thêm slides' : 'Sửa slides';
$slide = get_a_record('slides', $slide_id);
require('admin/views/slide/edit.php');
