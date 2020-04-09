<?php
function feedback_order_add()
{
    $feedback_add = array(
        'id' => intval($_POST['feedback_id']),
        'name' => escape($_POST['name']),
        'createTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'email' => escape($_POST['email']),
        'phone' => escape($_POST['phone']),
        'subject' => escape($_POST['message']),
        'user_id' => intval($_POST['user_id']),
        'product_id' => 0,
        'order_id' => intval($_POST['order_id']),
        'status' => 0
    );
    save('feedbacks', $feedback_add);
    echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Thư phản hồi của bạn đã được gửi đến hệ thống của quán Chị Kòi. Cảm ơn bạn đã gửi lại phải hồi về quán. <br><br>Hãy đến <a href='admin.php'>Dashboard</a></div></div>";
    require('content/views/feedback/result.php');
    exit;
}
function feedback_delete($id)
{
    global $linkconnectDB;
    $id = intval($id);
    $sql = "DELETE FROM feedbacks WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function feedback_update()
{
    $feedback = array(
        'id' => intval($_POST['feedback_id']),
        'name' => escape($_POST['name']),
        'email' => escape($_POST['email']),
        'phone' => escape($_POST['phone']),
        'subject' => escape($_POST['subject']),
        'editTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
    );
    save('feedbacks', $feedback);
    header('location:admin.php?controller=feedback');
}
