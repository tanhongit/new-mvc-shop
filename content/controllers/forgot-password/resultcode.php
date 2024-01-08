<?php

if (!empty($_GET['code'])) {

    $selectUserOption = [
        'order_by' => 'id',
    ];
    $userVerifyId = 0;
    $needChangePassUsers = getAll('users', $selectUserOption);
    foreach ($needChangePassUsers as $user) {
        if ($user['verificationCode'] == $_GET['code']) {
            $userVerifyId = 1;
            $userId = $user['id'];
        }
    }
    if ($userVerifyId != 1) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>Oh No!</strong> Link xác nhận tài khoản để đổi mật khẩu của bạn không đúng. Vui lòng kiểm tra lại. <br><br>Nếu đây là lỗi của hệ thống, mong bạn có thể gửi phản hổi <a href='index.php?controller=feedback'>Tại đây</a></div></div>";
        require('content/views/forgot-password/result.php');
    } else {
        header('location:' . PATH_URL . 'index.php?controller=forgot-password&action=change-password&id=' . $userId);
    }
}
