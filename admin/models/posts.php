<?php

function trashPost($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE posts SET post_status='Trash' where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function restorePost($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE posts SET post_status='Draft' where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function postDraft($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = "UPDATE posts SET post_status='Draft' where id=" . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function publicPost($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else {
        show404NotFound();
    }
    global $linkConnectDB;
    $sql = 'UPDATE posts SET post_status="Published", post_date="' . gmdate('Y-m-d H:i:s', time() + 7 * 3600) . '" where id=' . $id;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function postDelete($id)
{
    $id = intval($id);
    global $linkConnectDB;
    $sql = "DELETE FROM posts WHERE id=$id";
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
function page_update()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) {
        $slug = slug($_POST['slug']);
    } else {
        $slug = slug($name);
    }
    $post = [
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_modified' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'post_modified_user' => escape($_POST['editby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 2,
    ];
    $postId = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $postId . 'page';
    $config1 = [
        'name' => $image_name1,
        'upload_path' => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database
    if ($image1) {
        $post = [
            'id' => $postId,
            'post_avatar' => $image1,
        ];
        save('posts', $post);
    }
    //chuyển hướng nếu có cập nhật
    header('location:admin.php?controller=page');
}
function page_add()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) {
        $slug = slug($_POST['slug']);
    } else {
        $slug = slug($name);
    }
    $post = [
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_author' => intval($_POST['createby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 2,
        'post_status' => 'Draft',
    ];
    $postId = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $postId . 'page';
    $config1 = [
        'name' => $image_name1,
        'upload_path' => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database
    if ($image1) {
        $post = [
            'id' => $postId,
            'post_avatar' => $image1,
        ];
        save('posts', $post);
    }
    //chuyển hướng nếu có thêm mới
    header('location:admin.php?controller=page&action=viewdraft');
}
function post_update()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) {
        $slug = slug($_POST['slug']);
    } else {
        $slug = slug($name);
    }
    $post = [
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_modified' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'post_modified_user' => escape($_POST['editby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 1,
    ];
    $postId = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $postId . 'post';
    $config1 = [
        'name' => $image_name1,
        'upload_path' => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database
    if ($image1) {
        $post = [
            'id' => $postId,
            'post_avatar' => $image1,
        ];
        save('posts', $post);
    }
    //chuyển hướng nếu có cập nhật
    header('location:admin.php?controller=post');
}
function addPost()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) {
        $slug = slug($_POST['slug']);
    } else {
        $slug = slug($name);
    }
    $post = [
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_author' => intval($_POST['createby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 1,
        'post_status' => 'Draft',
    ];
    $postId = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $postId . 'post';
    $config1 = [
        'name' => $image_name1,
        'upload_path' => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    ];
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database
    if ($image1) {
        $post = [
            'id' => $postId,
            'post_avatar' => $image1,
        ];
        save('posts', $post);
    }
    //chuyển hướng nếu có thêm mới
    header('location:admin.php?controller=post&action=viewdraft');
}
