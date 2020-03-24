<?php
require_once('admin/models/users.php');
if (!empty($_POST)) {
    $user_edit = array(
        'id' => intval($_POST['user_id']),
        'user_email' => escape($_POST['email']),
        'user_username' => escape($_POST['username']),
        'user_name' => escape($_POST['name']),
        'user_address' => escape($_POST['address']),
        'user_phone' => escape($_POST['phone'])
    );
    $user_id =  save('users', $user_edit);
    $avatar_name = 'avatar-user' . $user_id . '-' . slug($_POST['username']);
    $config = array(
        'name' => $avatar_name,
        'upload_path'  => 'public/upload/images/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $avatar = upload('imagee', $config);
    //cập nhật ảnh mới
    if ($avatar) {
        $user_edit = array(
            'id' => $user_id,
            'user_avatar' => $avatar
        );
        save('users', $user_edit);
    }
    header('location:admin.php?controller=user&action=info&user_id=' . intval($_POST['user_id']));
}
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/edit.php');
