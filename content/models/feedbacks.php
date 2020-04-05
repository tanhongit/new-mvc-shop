<?php
function feedback_add()
{
    $feedback_add = array(
        'id' => intval($_POST['feedback_id']),
        'name' => escape($_POST['name']),
        'createTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'email' => escape($_POST['email']),
        'phone' => escape($_POST['phone']),
        'subject' => escape($_POST['message']),
        'user_id' => intval($_POST['user_id']),
        'product_id' => intval($_POST['product_id']),
        'order_id' => 0,
        'status' => 0
    );
    save('feedbacks', $feedback_add);
    echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Thư phản hồi của bạn đã được gửi đến hệ thống của quán Chị Kòi. Cảm ơn bạn đã gửi lại phải hồi về quán. Hãy đến <a href='index.php'>Trang chủ</a></div></div>";
    require('content/views/feedback/result.php');
    exit;
}
