<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
$title = 'Thông tin phản hồi của khách hàng';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/other.php');
