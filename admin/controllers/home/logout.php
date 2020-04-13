<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
global $user_nav;
$user_login = get_a_record('users', $user_nav);
if ($user_login['role_id'] == 0) {
    unset($_SESSION['user']);
    header('location:index.php');
} else {
    unset($_SESSION['user']);
    header('location:admin.php');
}
