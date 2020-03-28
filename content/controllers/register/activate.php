<?php
if (!empty($_GET['id'])) {
    $select_user_option = array(
        'select' => 'id',
        'where' => 'verificationCode=' . $_GET['id']
    );
    $user_need_activate = get_all('user', $select_user_option);
    $user_edit = array(
        'id' => $user_need_activate['id'],
        'verified' => 1
    );
    save('users', $user_edit);
    echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Bạn đã kích hoạt tài khoản thành công, giờ bạn đã có thể đăng nhập. </div></div>";
}
require('content/views/register/result.php');
