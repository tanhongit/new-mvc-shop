<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
$user = $_SESSION['user'];
global $user_nav;
require_once('admin/controllers/shared/statistics.php');
$title = 'Quản trị hệ thống - Quán Chị Kòi';
$home_nav = 'class="active open"';
require('admin/views/home/index.php');
