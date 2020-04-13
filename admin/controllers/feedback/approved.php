<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
if (isset($_GET['feedback_id'])) {
    $feedback_id = intval($_GET['feedback_id']);
    feedback_Approved($feedback_id);
    header('location:admin.php?controller=feedback');
}
