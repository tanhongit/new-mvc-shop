<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
function post_trash($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE posts SET post_status='Trash' where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function post_restore($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE posts SET post_status='Draft' where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function post_draft($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = "UPDATE posts SET post_status='Draft' where id=" . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function post_public($id)
{
    if (isset($_GET['post_id'])) {
        $id = intval($_GET['post_id']);
    } else show_404();
    global $linkconnectDB;
    $sql = 'UPDATE posts SET post_status="Publiced", post_date="' . gmdate('Y-m-d H:i:s', time() + 7 * 3600) . '" where id=' . $id;
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function post_delete($id)
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "DELETE FROM posts WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function page_update()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
    else $slug = slug($name);
    $post = array(
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_modified' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'post_modified_user' => escape($_POST['editby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 2
    );
    $post_id = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $post_id . 'page';
    $config1 = array(
        'name' => $image_name1,
        'upload_path'  => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database 
    if ($image1) {
        $post = array(
            'id' => $post_id,
            'post_avatar' => $image1
        );
        save('posts', $post);
    }
    //chuyển hướng nếu có cập nhật
    header('location:admin.php?controller=page');
}
function page_add()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
    else $slug = slug($name);
    $post = array(
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_author' => intval($_POST['createby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 2,
        'post_status' => 'Draft'
    );
    $post_id = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $post_id . 'page';
    $config1 = array(
        'name' => $image_name1,
        'upload_path'  => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database 
    if ($image1) {
        $post = array(
            'id' => $post_id,
            'post_avatar' => $image1
        );
        save('posts', $post);
    }
    //chuyển hướng nếu có thêm mới
    header('location:admin.php?controller=page&action=viewdraft');
}
function post_update()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
    else $slug = slug($name);
    $post = array(
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_modified' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'post_modified_user' => escape($_POST['editby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 1
    );
    $post_id = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $post_id . 'post';
    $config1 = array(
        'name' => $image_name1,
        'upload_path'  => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database 
    if ($image1) {
        $post = array(
            'id' => $post_id,
            'post_avatar' => $image1
        );
        save('posts', $post);
    }
    //chuyển hướng nếu có cập nhật
    header('location:admin.php?controller=post');
}
function post_add()
{
    $name = escape($_POST['title']);
    if (strlen($_POST['slug']) >= 5) $slug = slug($_POST['slug']);
    else $slug = slug($name);
    $post = array(
        'id' => intval($_POST['post_id']),
        'post_title' => $name,
        'post_slug' => $slug,
        'post_content' => ($_POST['detailpost']), //ckeditor
        'post_author' => intval($_POST['createby']),
        'totalview' => intval($_POST['totalview']),
        'post_type' => 1,
        'post_status' => 'Draft'
    );
    $post_id = save('posts', $post);
    //upload ảnh 1 của post
    $image_name1 = slug($name) . '-' . $post_id . 'post';
    $config1 = array(
        'name' => $image_name1,
        'upload_path'  => 'public/upload/ckeditorimages/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $image1 = upload('post_avatar', $config1); //$field = name of input
    //cập nhật ảnh mới lên database 
    if ($image1) {
        $post = array(
            'id' => $post_id,
            'post_avatar' => $image1
        );
        save('posts', $post);
    }
    //chuyển hướng nếu có thêm mới
    header('location:admin.php?controller=post&action=viewdraft');
}
