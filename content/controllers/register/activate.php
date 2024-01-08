<?php

if (!empty($_GET['code'])) {
    $selectUserOption = [
        'order_by' => 'id',
    ];
    $user_need_activate = getAll('users', $selectUserOption);
    foreach ($user_need_activate as $user) {
        if ($user['verificationCode'] == $_GET['code']) {
            $userVerifyId = $user['id'];
        }
    }
    if (!isset($userVerifyId)) {
        show404NotFound();
    }
    $user_edit = [
        'id' => $userVerifyId,
        'verified' => 1,
    ];
    save('users', $user_edit);
    echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Bạn đã kích hoạt tài khoản thành công, giờ bạn đã có thể đăng nhập vào website của quán Chị Kòi. Hãy đến <a href='admin.php'>Đăng nhập</a></div></div>";
    require('content/views/register/result.php');
}
