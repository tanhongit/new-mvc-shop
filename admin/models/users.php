<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function user_login($email, $password)
{
    global $linkconnectDB;
    $sql = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password' LIMIT 0,1";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($query);
        global $user_nav;
        $user_nav = $_SESSION['user']['id'];
        return true;
    }
    return false;
}
function user_delete($id)
{
    $user = get_a_record('users', $id);
    $image = 'public/upload/images/' . $user['user_avatar'];
    if (is_file($image)) {
        unlink($image);
    }
    global $linkconnectDB;
    $id = intval($id);
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function changePassword($id, $newpassword, $currentPassword)
{
    global $linkconnectDB;
    $sql = "Update users SET user_password='$newpassword' WHERE id='$id' AND user_password = '$currentPassword'";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $rows =  mysqli_affected_rows($linkconnectDB); //Gets the number of affected rows in a previous MySQL operation
    if ($rows <> 1) {
        return  "<div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Bạn đã nhập mật khẩu hiện tại không đúng !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='admin.php'>Đến Dashboard</a></div>" . mysqli_error($linkconnectDB);
    } else {
        $options = array(
            'id' => $id,
            'user_password' => $newpassword
        );
        save('users', $options);
        //sendmail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);
        $user = get_a_record('users', $id);
        $email = $user['user_email'];
        try {
            //content
            $htmlStr = "";
            $htmlStr .= "Xin chào " . $user['user_username'] . ' (' . $email . "),<br /><br />";
            $htmlStr .= "Mật khẩu của bạn hiện đã được thay đổi cách đây không lâu...<br /><br />";
            $htmlStr .= "Vui lòng kiểm tra và <a href='".PATH_URL."admin.php'>Đăng nhập</a></div> lại với mật khẩu mới của bạn.<br><br>";
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
        return '<div class="alert alert-success" style="text-align: center;"><strong>Tốt!</strong> Bạn đã thay đổi mật khẩu thành công. Và một tin nhắn thông báo đã được gửi đến Email của người dùng này. Hãy <a href="admin.php?controller=home&action=logout">Đăng xuất</a> và đăng nhập lại.!!</div>';
    }
}
