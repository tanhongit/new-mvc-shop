<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('content/models/posts.php');
$option = array(
    'order_by' => 'id desc'
);
$posts = get_a_record('posts', $option);
if (empty($posts)) show_404();
$title = 'All Posts - Quán Chị Kòi';
//load view
require('content/views/post/all.php');
