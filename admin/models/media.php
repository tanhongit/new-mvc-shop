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
    global $linkConnectDB;
    $sql = "DELETE FROM media WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function media_add()
{
    $media_add = array(
        'id' => intval($_POST['media_id']),
        'media_name' => escape($_POST['name']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
    );
    $mediaId =  save('media', $media_add);
    $slugg = slug($_POST['name']);
    $config = array(
        'name' => $slugg,
        'upload_path'  => 'public/upload/media/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $images = upload('imggggg', $config);
    if ($images) {
        $media_add = array(
            'id' => $mediaId,
            'slug' => $images
        );
        save('media', $media_add);
    }
    header('location:admin.php?controller=media');
}
function media_update()
{
    $media_edit = array(
        'id' => intval($_POST['media_id']),
        'media_name' => escape($_POST['name']),
    );
    $mediaId =  save('media', $media_edit);
    $slugg = slug($_POST['name']);
    $config = array(
        'name' => $slugg,
        'upload_path'  => 'public/upload/media/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $images = upload('imggggg', $config);
    if ($images) {
        $media_edit = array(
            'id' => $mediaId,
            'slug' => $images
        );
        save('media', $media_edit);
    }
    header('location:admin.php?controller=media');
}
