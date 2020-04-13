<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('admin/models/users.php');
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
global $user_nav;
$login_user = get_a_record('users', $user_nav);
if ($user_id != $user_nav && $login_user['role_id'] == 0) {
    header('location:index.php');
    exit;
}
$user_info = get_a_record('users', $user_id);
$nav_user = $nav_profile = 'class="active open"';
require('admin/views/user/change-password.php');
