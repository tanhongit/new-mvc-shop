<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/posts.php');
$page_id = intval($_GET['page_id']);
post_delete($page_id);
header('location:admin.php?controller=page');