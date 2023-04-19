<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_POST)) {
    $user_add = array(
        'id' => 0,
        'user_username' => escape($_POST['username']),
        'user_password' => md5($_POST['password']),
        'user_email' => escape($_POST['email']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
    );
    global $linkConnectDB;
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $get_user_email_option = array(
        'order_by' => 'id',
    );
    //lấy id người đăng ký để resend
    $user_of_email = get_all('users', $get_user_email_option);
    foreach ($user_of_email as $user) {
        if ($user['user_email'] == $email) {
            $get_userid_of_email = $user['id'];
        }
    }
    $title = 'Kết quả đăng ký thành viên';
    if (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT user_username FROM users WHERE user_username='$username'")) > 0) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif ($_POST['confirmPassword'] != $_POST['password']) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Việc đăng ký thành viên có vấn đề. Bạn đã không xác thực đúng mật khẩu đã nhập !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT user_email FROM users WHERE user_email='$email' and verified = 0")) > 0) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này đã đăng ký nhưng chưa được kích hoạt. nếu bạn đã từng đăng ký với email này vui lòng vào hộp thư đến hoặc kiểm tra trong muc spam sẽ có thư gửi yêu cầu xác nhận. Bạn hãy click vào link, Email sẽ được kích hoạt ngay. <br><br>Bạn có muốn <a href='index.php?controller=register&action=resend&id=" . $get_userid_of_email . "'>gửi lại mã kích hoạt</a> ??<br><br>Hoặc nếu muốn đăng ký thành viên mới hãy <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT user_email FROM users WHERE user_email='$email'")) > 0) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (strlen($_POST['password']) < 8) {
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Việc đăng ký thành viên có vấn đề. Mật khẩu của bạn phải dài từ 8 ký tự trở lên !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } else {
        // Load Composer's autoloader
        $userId = save('users', $user_add);
        //send mail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);
        try {
            $verificationCode = md5(uniqid("Emsel của bạn chưa active. Nhấn vào đây để active nhé!", true)); //https://www.php.net/manual/en/function.uniqid
            $verificationLink = PATH_URL . "index.php?controller=register&action=activate&code=" . $verificationCode;
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
            $mail->addAddress($_POST['email'], $email);     // Add a recipient | name is option tên người nhận
            $mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');
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
        $verificationCode_add = array(
            'id' => $userId,
            'verificationCode' => $verificationCode
        );
        save('users', $verificationCode_add);
        echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done! Mã kích hoạt</strong> đã được gửi đến email: <strong>" . $email . "</strong>. <br><br>Vui lòng mở hộp thư đến email của bạn và nhấp vào liên kết đã cho để bạn có thể đăng nhập. <br><br><br>Email chưa được xác minh này đã được lưu vào Database.</div></div>";
    }
}
require('content/views/register/result.php');
