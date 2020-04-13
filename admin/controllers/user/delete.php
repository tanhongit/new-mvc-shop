<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
require_once('admin/models/users.php');
$user_id = intval($_GET['user_id']);
global $user_nav;
$user = get_a_record('users', $user_nav);
if ($_GET['user_id'] == $user_nav || $user['role_id'] <> 1) {
    echo '<div style="padding-top: 200" class="container"><div class="alert alert-danger" style="text-align: center;"><strong>Error!</strong> Bạn không có quyền hoặc không được phép xóa người dùng này.<br><br> Hãy <a href="javascript: history.go(-1)">Quay lại</a> .!!</div></div>';
    require('admin/views/user/result.php');
    exit;
} else {
    user_delete($user_id);
}
header('location:admin.php?controller=user&action=listall');
