<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');
if (!empty($_POST)) {
    feedback_reply_email($_POST['html-content'], $_POST['feedback_email']);
}
if (isset($_GET['feedback_id'])) $feedback_id = intval($_GET['feedback_id']);
else $feedback_id = 0;
$title = ($feedback_id == 0) ? '' : 'Trả lời cho phản hồi của khách hàng';
$feedback = get_a_record('feedbacks', $feedback_id);
$nav_feedback = 'class="active open"';
require('admin/views/feedback/reply.php');
