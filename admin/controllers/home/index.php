<?php

$user = $_SESSION['user'];
global $userNav;

require_once('admin/controllers/shared/statistics.php');

$title = 'Quản trị hệ thống - Quán Chị Kòi';
$homeNav = 'class="active open"';

require('admin/views/home/index.php');
