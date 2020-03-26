<?php
require_once('admin/models/users.php');
if (isset($_POST['id_change'])) {
    $id = intval($_POST['id_change']);
    $newpassword = md5($_POST['newPassword']);
    $currentpassword = md5($_POST['currentPassword']);
    $confirmPassword = md5($_POST['confirmPassword']);
}
if ($newpassword == $currentpassword) {
    echo '<div class="alert alert-danger"><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. "Mật khẩu mới của bạn không được phép giống mật khẩu hiện tại" !! <br>Quay lại hoặc <a href="admin.php">Đến Dashboard</a></div>';;
}
elseif ($newpassword == $confirmPassword) {
    echo changePassword($id, $newpassword, $currentpassword);
} else echo '<div class="alert alert-danger"><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. "Xác thực mật khẩu mới" của bạn không đúng!<br>Quay lại hoặc <a href="admin.php">Đến Dashboard</a></div>';
require('admin/views/user/result.php');
