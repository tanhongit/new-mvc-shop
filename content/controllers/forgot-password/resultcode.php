<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (!empty($_GET['code'])) {

    $select_user_option = array(
        'order_by' => 'id'
    );
    $verifi_id_user = 0;
    $user_need_change_pass = get_all('users', $select_user_option);
    foreach ($user_need_change_pass as $user) {
        if ($user['verificationCode'] == $_GET['code']) {
            $verifi_id_user = 1;
            $user_id = $user['id'];
        }
    }
    if ($verifi_id_user != 1) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>Oh No!</strong> Link xác nhận tài khoản để đổi mật khẩu của bạn không đúng. Vui lòng kiểm tra lại. <br><br>Nếu đây là lỗi của hệ thống, mong bạn có thể gửi phản hổi <a href='index.php?controller=feedback'>Tại đây</a></div></div>";
        require('content/views/forgot-password/result.php');
    } else {
        header('location:' . PATH_URL . 'index.php?controller=forgot-password&action=change-password&id=' . $user_id);
    }
}
