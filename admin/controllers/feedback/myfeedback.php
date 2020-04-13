<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
$title = 'Tất cả phản hồi của bạn';
$nav_feedback = $your_feedback = 'class="active open"';
global $user_nav;
$option = array(
    'order_by' => 'id desc',
    'where' => 'user_id=' . $user_nav
);
$feedbacks = get_all('feedbacks', $option);
require('admin/views/feedback/myfeedback.php');
