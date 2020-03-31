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
