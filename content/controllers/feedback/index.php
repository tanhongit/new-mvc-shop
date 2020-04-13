<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('content/models/feedbacks.php');
if (!empty($_POST)) {
    feedback_add();
}
if (isset($_GET['product_id'])) $product_id = intval($_GET['product_id']);
else $product_id = 0;
$product = get_a_record('products', $product_id);
if (isset($user_nav)) {
    $user_action = get_a_record('users', $user_nav);
}
$title = 'Gửi phản hồi của bạn đến Chị Kòi Quán';
require('content/views/feedback/index.php');
