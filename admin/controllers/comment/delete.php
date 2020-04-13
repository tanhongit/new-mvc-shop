<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/comments.php');
$comment_id = intval($_GET['comment_id']);
comment_delete($comment_id);
header('location:admin.php?controller=comment');
