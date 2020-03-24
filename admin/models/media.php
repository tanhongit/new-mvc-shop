<?php
function media_delete($id)
{
    if (isset($_GET['media_id'])) {
        $id = intval($_GET['media_id']);
    } else show_404();
    $media = get_a_record('media', $id);
    $image = 'public/upload/media/' . $media['slug'];
    if (is_file($image)) {
        unlink($image);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM media WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
