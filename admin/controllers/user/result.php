<?php
require_once('admin/models/users.php');
if (isset($_POST['id_change'])) {
    $id = intval($_POST['id_change']);
    $newpassword = md5($_POST['newPassword']);
    $currentpassword = md5($_POST['currentPassword']);
    $confirmPassword = md5($_POST['confirmPassword']);
}
if ($newpassword == $currentpassword) {
    echo "<div class='alert alert-danger'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Mật khẩu mới của bạn không được phép giống mật khẩu hiện tại !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='admin.php'>Đến Dashboard</a></div>";
}
elseif ($newpassword == $confirmPassword) {
    echo changePassword($id, $newpassword, $currentpassword);
} else echo "<div class='alert alert-danger'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Ô nhập xác thực mật khẩu không đúng với mật khẩu mới bạn nhập vào !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='admin.php'>Đến Dashboard</a></div>";
require('admin/views/user/result.php');
