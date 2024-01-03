<?php

/**
 * @param  int  $id
 *
 * @return void
 */
function mediaDestroy(int $id): void
{
    $media = getRecord('media', $id);
    $image = 'public/upload/media/' . $media['slug'];
    if (is_file($image)) {
        unlink($image);
    }

    $sql = "DELETE FROM media WHERE id = ?";

    try {
        $stmt = executeQuery($sql, [$id]);
        $stmt->close();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @return void
 */
function mediaStore(): void
{
    $data = [
        'id' => intval($_POST['media_id']),
        'media_name' => escape($_POST['name']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
    ];
    mediaSave($data);
}

/**
 * @return void
 */
function mediaUpdate(): void
{
    $data = [
        'id' => intval($_POST['media_id']),
        'media_name' => escape($_POST['name']),
    ];
    mediaSave($data);
}

function mediaSave(array $data): void
{
    $mediaId = save('media', $data);
    $slug = slug($_POST['name']);
    $config = [
        'name' => $slug,
        'upload_path' => '../public/upload/media/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $images = upload('imggggg', $config);
    if ($images) {
        $mediaData = [
            'id' => $mediaId,
            'slug' => $images,
        ];
        save('media', $mediaData);
    }
    header('location:admin.php?controller=media');
}
