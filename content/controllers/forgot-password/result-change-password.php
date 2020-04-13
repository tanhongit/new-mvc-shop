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

require_once('admin/models/users.php');
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $newpassword = md5($_POST['newpassword']);
    $confirmNewPassword = md5($_POST['confirmNewPassword']);

    $user = get_a_record('users', $id);
    $email = $user['user_email'];
    if ($newpassword == $user['user_password']) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Mật khẩu mới của bạn vừa nhập là mật khẩu của bạn hiện tại đó. <br><br>Bạn đã nhớ lại mật khẩu của mình chưa <i class='zmdi zmdi-favorite'></i> !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến trang chủ</a></div></div>";
    } elseif (strlen($_POST['newpassword']) < 8) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Việc thay đổi mật khẩu thất bại. Mật khẩu bạn nhập phải dài từ 8 ký tự trở lên !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif ($newpassword == $confirmNewPassword) {
        $options = array(
            'id' => $id,
            'user_password' => $newpassword
        );
        save('users', $options);

        //send mail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);
        try {
            //content
            $htmlStr = "";
            $htmlStr .= "Xin chào " . $user['user_username'] . ' (' . $email . "),<br /><br />";
            $htmlStr .= "Mật khẩu của bạn hiện đã được thay đổi cách đây không lâu...<br /><br />";
            $htmlStr .= "Vui lòng kiểm tra và <a href='" . PATH_URL . "admin.php'>Đăng nhập</a></div> lại với mật khẩu mới của bạn.<br><br>";
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
            $mail->Subject = 'You have Change your Password | Quán Chị Kòi | By Tân Hồng IT';
            $mail->Body = $htmlStr;
            $mail->AltBody = $htmlStr; //None HTML
            $result = $mail->send();
            if (!$result) {
                $error = "Có lỗi xảy ra trong quá trình gửi mail";
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        echo '<div style="padding-top: 200" class="container"><div class="alert alert-success" style="text-align: center;"><strong>Tốt!</strong> Bạn đã thay đổi mật khẩu thành công. Và một tin nhắn thông báo đã được gửi đến Email của người dùng này. Hãy đến trang <a href="admin.php?controller=home&action=login">Đăng nhập</a> và đăng nhập lại.!!</div></div>';
    } else echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Ô nhập xác thực mật khẩu không đúng với mật khẩu mới mà bạn nhập vào !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến trang chủ</a></div></div>";
}
require('content/views/forgot-password/result.php');
