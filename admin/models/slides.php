<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function slide_delete($id)
{
    $id = intval($id);
    $slide = get_a_record('slides', $id);
    $image1 = 'public/upload/slides/' . $slide['slide_img1'];
    if (is_file($image1)) {
        unlink($image1);
    }
    $image2 = 'public/upload/slides/' . $slide['slide_img2'];
    if (is_file($image2)) {
        unlink($image2);
    }
    $image3 = 'public/upload/slides/' . $slide['slide_img3'];
    if (is_file($image3)) {
        unlink($image3);
    }
    $image4 = 'public/upload/slides/' . $slide['slide_img4'];
    if (is_file($image4)) {
        unlink($image4);
    }
    $image5 = 'public/upload/slides/' . $slide['slide_img5'];
    if (is_file($image5)) {
        unlink($image5);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM slides WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function slide_update()
{
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
    $image1 = upload('image1', $config); //$field = name of input
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
}
