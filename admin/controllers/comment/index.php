<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/comments.php');
$title = 'Tổng Danh Sách Bình luận';
$nav_comment = 'class="active open"';
$option = array(
    'order_by' => 'id desc',
    'where' => 'status<>3 and status<>2'
);
$comments = get_all('comments', $option);
require('admin/views/comment/index.php');
