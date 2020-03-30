<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('admin/models/users.php');
if (!empty($_POST)) {
    $user_edit = array(
        'id' => intval($_POST['user_id']),
        'user_email' => escape($_POST['email']),
        'user_username' => escape($_POST['username']),
        'user_name' => escape($_POST['name']),
        'user_address' => escape($_POST['address']),
        'user_phone' => escape($_POST['phone'])
    );
    $get_currentEmail_user = get_a_record('users', $_POST['user_id']);
    $currentEmail = $get_currentEmail_user['user_email'];
    $user_id =  save('users', $user_edit);
    $avatar_name = 'avatar-user' . $user_id . '-' . slug($_POST['username']);
    $config = array(
        'name' => $avatar_name,
        'upload_path'  => 'public/upload/images/',
        'allowed_exts' => 'jpg|jpeg|png|gif',
    );
    $avatar = upload('imagee', $config);
    //cập nhật ảnh mới
    if ($avatar) {
        $user_edit = array(
            'id' => $user_id,
            'user_avatar' => $avatar
        );
        save('users', $user_edit);
    }
    $user_edited = get_a_record('users', $user_id);
    if ($user_edited['user_email'] != $currentEmail) {
        //send mail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $email = $user_edited['user_email'];
        $mail = new PHPMailer(true);
        try {
            $verificationCode = md5(uniqid("Email của bạn vừa mới đổi đó và chưa active đâu. Nhấn vào đây để active nhé! Yêu bạn 3 nghìn", true)); //https://www.php.net/manual/en/function.uniqid
            $verificationLink = PATH_URL . "index.php?controller=register&action=reactivate&code=" . $verificationCode;
            //content
            $htmlStr = "";
            $htmlStr .= "Xin chào " . $user_edited['user_name'] . " (" . $user_edited['user_username']  . "),<br /><br />";
            $htmlStr .= "Bạn vừa đổi email mới cho tài khoản của bạn? Vui lòng nhấp vào nút bên dưới để xác minh đổi email của bạn và có quyền truy cập vào trang quản trị của Chị Kòi Quán.<br /><br /><br />";
            $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
            $htmlStr .= "Cảm ơn bạn đã tham gia cùng website bán hàng của quán Chị Kòi.<br><br>";
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
            $mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');
            //$mail->addCC('CCemail@gmail.com');
            //$mail->addBCC('BCCemail@gmail.com');
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Verification New Email | Quán Chị Kòi | Change Email | By Tân Hồng IT';
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
            'id' => $user_id,
            'verificationCode' => $verificationCode,
            'verified' => 0
        );
        save('users', $verificationCode_add);
    }
    header('location:admin.php?controller=user&action=info&user_id=' . intval($_POST['user_id']));
}
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/edit.php');
