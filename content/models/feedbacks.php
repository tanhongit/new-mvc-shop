<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
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
    $phone = addslashes($_POST['phone']);
    $email = addslashes($_POST['email']);
    if (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này không hợp lệ. Vui lòng nhập email khác. <br><br><a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('content/views/feedback/result.php');
        exit;
    } elseif (!preg_replace("[^0-9]", '', $phone)) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> SĐT này không hợp lệ. Vui lòng nhập lại SĐT khác. <br><br><a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('content/views/feedback/result.php');
        exit;
    }
    save('feedbacks', $feedback_add);
    echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Thư phản hồi của bạn đã được gửi đến hệ thống của quán Chị Kòi. Cảm ơn bạn đã gửi lại phải hồi về quán. <br><br>Hãy đến <a href='index.php'>Trang chủ</a></div></div>";
    require('content/views/feedback/result.php');
    exit;
}
