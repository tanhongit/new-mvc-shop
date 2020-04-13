<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/comments.php');
$title = 'Thùng rác';
$nav_comment = 'class="active open"';
require('admin/views/comment/trash.php');