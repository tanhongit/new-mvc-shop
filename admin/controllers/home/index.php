<?php
$user = $_SESSION['user'];
global $user_nav;
require_once('admin/controllers/shared/statistics.php');
$title = 'Quản trị hệ thống - Quán Chị Kòi';
$home_nav = 'class="active open"';
require('admin/views/home/index.php');
