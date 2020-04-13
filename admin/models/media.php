<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
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
function media_add()
{
    $media_add = array(
        'id' => intval($_POST['media_id']),
        'media_name' => escape($_POST['name']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
    );
    $media_id =  save('media', $media_add);
    $slugg = slug($_POST['name']);
    $config = array(
        'name' => $slugg,
        'upload_path'  => 'public/upload/media/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $images = upload('imggggg', $config);
    if ($images) {
        $media_add = array(
            'id' => $media_id,
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
    $media_id =  save('media', $media_edit);
    $slugg = slug($_POST['name']);
    $config = array(
        'name' => $slugg,
        'upload_path'  => 'public/upload/media/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $images = upload('imggggg', $config);
    if ($images) {
        $media_edit = array(
            'id' => $media_id,
            'slug' => $images
        );
        save('media', $media_edit);
    }
    header('location:admin.php?controller=media');
}
