<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * @return void
 */
function addFeedbackOrder(): void
{
    $feedback_add = [
        'id' => intval($_POST['feedback_id']),
        'name' => escape($_POST['name']),
        'createTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'email' => escape($_POST['email']),
        'phone' => escape($_POST['phone']),
        'subject' => escape($_POST['message']),
        'user_id' => intval($_POST['user_id']),
        'product_id' => 0,
        'order_id' => intval($_POST['order_id']),
        'status' => 0,
    ];
    save('feedbacks', $feedback_add);
}

/**
 * @param  int  $id
 *
 * @return void
 */
function deleteFeedback(int $id): void
{
    $sql = "DELETE FROM feedbacks WHERE id = ?";

    try {
        $stmt = executeQuery($sql, [$id]);
        $stmt->close();
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @return void
 */
function updateFeedback(): void
{
    $feedback = [
        'id' => intval($_POST['feedback_id']),
        'name' => escape($_POST['name']),
        'email' => escape($_POST['email']),
        'phone' => escape($_POST['phone']),
        'subject' => escape($_POST['subject']),
        'editTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'status' => intval($_POST['status']),
    ];
    save('feedbacks', $feedback);
    header('location:admin.php?controller=feedback');
}
function feedbackReplyMail($html, $email)
{
    //sendmail
    include 'lib/config/sendmail.php';
    $mail = new PHPMailer(true);

    try {
        //content
        $htmlStr = $html;
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
        $mail->Subject = 'Trả lời phản hồi của bạn | Quán Chị Kòi | By Tân Hồng IT';
        $mail->Body = $htmlStr;
        $mail->AltBody = $htmlStr; //None HTML
        $result = $mail->send();
        if (!$result) {
            $error = "Có lỗi xảy ra trong quá trình gửi mail";
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

/**
 * @param  int  $id
 *
 * @return void
 */
function approveFeedback(int $id): void
{
    $sql = "UPDATE feedbacks SET status=1 where id= ?";

    try {
        $stmt = executeQuery($sql, [$id]);
        $stmt->close();
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}

/**
 * @param  int  $id
 *
 * @return void
 */
function unApproveFeedback(int $id): void
{
    $sql = "UPDATE feedbacks SET status=0 where id= ?";

    try {
        $stmt = executeQuery($sql, [$id]);
        $stmt->close();
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}
