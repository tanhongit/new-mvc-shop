<?php
require_once('admin/models/users.php');
if (!empty($_POST)) {
    $user_add = array(
        'id' => intval($_POST['id']),
        'user_username' => escape($_POST['username']),
        'user_password' => md5($_POST['password']),
        'user_email' => escape($_POST['email']),
        'role_id' => escape($_POST['roleid']),
        'user_name' => escape($_POST['name']),
        'user_address' => escape($_POST['address']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'user_phone' => escape($_POST['phone'])
    );
    $user_id =  save('users', $user_add);
    $avatar_name = 'avatar-user' . $user_id . '-' . slug($_POST['username']);
    $config = array(
        'name' => $avatar_name,
        'upload_path'  => 'public/upload/images/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $avatar = upload('imagee', $config);
    if ($avatar) {
        $user_add = array(
            'id' => $user_id,
            'user_avartar' => $avatar
        );
        save('users', $user_add);
    }
    header('location:admin.php?controller=user&action=info&user_id=' . $user_id);
}
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$user = $_SESSION['user'];
$user_info = get_a_record('users', $user_id);
require('admin/views/user/add.php');
