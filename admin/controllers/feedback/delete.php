<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/feedbacks.php');
$feedback_id = intval($_GET['feedback_id']);
feedback_delete($feedback_id);
header('location:admin.php?controller=feedback');
