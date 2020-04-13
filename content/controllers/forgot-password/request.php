<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    global $linkconnectDB;
    if (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
        require('content/views/forgot-password/result.php');
        exit;
    } elseif (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE user_email='$email'")) < 1) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không có người dùng và không tồn tại trong máy chủ. Vui lòng chọn lại Email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
        require('content/views/forgot-password/result.php');
        exit;
    } else {
        $option = array(
            'order' => 'id'
        );
        $users = get_all('users', $option);
        foreach ($users as $user) {
            if ($user['user_email'] == $email) {
                $verification_Code = $user['verificationCode'];
            }
        }
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);
        try {
            $verificationLink = PATH_URL . "index.php?controller=forgot-password&action=resultcode&code=" . $verification_Code;
            //content
            $htmlStr = "";
            $htmlStr .= "Xin chào " . $username . ' (' . $email . "),<br /><br />";
            $htmlStr .= "Chào mừng bạn đến với Chị Kòi Quán.<br /><br /><br />";
            $htmlStr .= "Vui lòng truy cập tại link sau để xác thực tài khoản và bắt đầu đổi mật khẩu mới.<br><br>";
            $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Change New Password</a><br /><br /><br />";
            $htmlStr .= "Cảm ơn bạn đã tham gia và đồng hành cùng quán Chị Kòi.<br><br>";
            $htmlStr .= "Trân trọng,<br />";
            $htmlStr .= "<a href='https://tanhongit.com/' target='_blank'>By Tân Hồng IT</a><br />";
            //Server settings
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0; // Enable verbose debug output (0 : ko hiện debug, 1 hiện)
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = SMTP_UNAME; // SMTP username
            $mail->Password = SMTP_PWORD; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = SMTP_PORT; // TCP port to connect to
            //Recipients
            $mail->setFrom(SMTP_UNAME, "Chị Kòi Quán");
            $mail->addAddress($email, $email);     // Add a recipient | name is option tên người nhận
            $mail->addReplyTo(SMTP_UNAME, 'Tân Hồng IT');
            //$mail->addCC('CCemail@gmail.com');
            //$mail->addBCC('BCCemail@gmail.com');
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Forgot Password | Quán Chị Kòi | Reset your Password | By Tân Hồng IT';
            $mail->Body = $htmlStr;
            $mail->AltBody = $htmlStr; //None HTML
            $result = $mail->send();
            if (!$result) {
                $error = "Có lỗi xảy ra trong quá trình gửi mail";
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Bạn sẽ nhận được tin nhắn Email xác nhận đổi mật khẩu với email mà bạn vừa nhập.<br><br> Vui lòng đến hộp thư và kiểm tra tin nhắn và xác nhận liên kết đổi mật khẩu ở đó!!</div></div>";
        require('content/views/forgot-password/result.php');
    }
}
