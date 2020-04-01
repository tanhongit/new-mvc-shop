<?php
permission_user();
require_once('admin/models/users.php');
if (!empty($_POST)) {
    $user_add = array(
        'id' => intval($_POST['user_id']),
        'user_username' => escape($_POST['username']),
        'user_password' => md5($_POST['password']),
        'user_email' => escape($_POST['email']),
        'role_id' => escape($_POST['roleid']),
        'user_name' => escape($_POST['name']),
        'user_address' => escape($_POST['address']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'user_phone' => escape($_POST['phone'])
    );
    global $linkconnectDB;
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    //https://freetuts.net/xay-dung-chuc-nang-dang-nhap-va-dang-ky-voi-php-va-mysql-85.html
    if (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_username FROM users WHERE user_username='$username'")) > 0) {
        echo "";
        "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/addresult.php');
        exit;
    } elseif (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/addresult.php');
        exit;
    } elseif (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE user_email='$email'")) > 0) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/addresult.php');
        exit;
    } else {
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
                'user_avatar' => $avatar
            );
            save('users', $user_add);
        }
        header('location:admin.php?controller=user&action=info&user_id=' . $user_id);
    }
}
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/add.php');
