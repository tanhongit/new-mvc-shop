<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/users.php');
if (!empty($_POST)) {
    user_add();
}
if (isset($_GET['user_id'])) $user_id = intval($_GET['user_id']);
else $user_id = 0;
$title = ($user_id == 0) ? 'Thêm thông tin' : 'Cập nhật thông tin tài khoản';
$nav_user = 'class="active open"';
$user_info = get_a_record('users', $user_id);
require('admin/views/user/add.php');
