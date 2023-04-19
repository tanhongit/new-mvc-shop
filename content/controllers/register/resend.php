<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_GET['id'])) {
    $option = array(
        'order_by' => 'id'
    );
    $get_user_notActive = get_all('users', $option);
    foreach ($get_user_notActive as $user) {
        if ($user['id'] == $_GET['id']) {
            $email = $user['user_email'];
            $username = $user['user_username'];
            $verification_Code = $user['verificationCode'];
        }
    }
    //send mail
    require 'vendor/autoload.php';
    include 'lib/config/sendmail.php';
    $mail = new PHPMailer(true);
    try {
        $verificationLink = PATH_URL . "index.php?controller=register&action=activate&code=" . $verification_Code;
        //content
        $htmlStr = "";
        $htmlStr .= "Xin chào " . $username . ' (' . $email . "),<br /><br />";
        $htmlStr .= "Vui lòng nhấp vào nút bên dưới để xác minh đăng ký của bạn và có quyền truy cập vào trang quản trị của Chị Kòi Quán.<br /><br /><br />";
        $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
        $htmlStr .= "Cảm ơn bạn đã tham gia thành một thành viên mới trong website bán hàng của quán Chị Kòi.<br><br>";
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
        $mail->Subject = 'Verification Users | Quán Chị Kòi | Subscription | By Tân Hồng IT';
        $mail->Body = $htmlStr;
        $mail->AltBody = $htmlStr; //None HTML
        $result = $mail->send();
        if (!$result) {
            $error = "Có lỗi xảy ra trong quá trình gửi mail";
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done! Mã kích hoạt</strong> đã được gửi đến email: <strong>" . $email . "</strong>. <br><br>Vui lòng mở hộp thư đến email của bạn và nhấp vào liên kết đã cho để bạn có thể đăng nhập.</div></div>";
    require('content/views/register/result.php');
}
