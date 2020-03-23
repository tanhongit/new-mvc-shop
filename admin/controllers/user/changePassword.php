<?php
require "../../../lib/model.php";
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $newpassword = md5($_POST['newPassword']);
    $currentpassword = md5($_POST['currentPassword']);
    echo '<b><h4>'.changePassword($id, $newpassword, $currentpassword).'</h4></b>';
}
function changePassword($id, $newpassword,$currentPassword ) {
    global $linkconnectDB;
    $sql = "Update users SET user_password='$newpassword' WHERE id='$id' AND user_password = '$currentPassword'";
    $query = mysqli_query($linkconnectDB,$sql) or die(mysqli_error($linkconnectDB));
    $rows =  mysqli_affected_rows($linkconnectDB);
    if($rows<>1){
        return "Thay đổi mật khẩu không thành công. Mật khẩu hiện tại của bạn không đúng." . mysqli_error($linkconnectDB);
    }
    else return "Bạn đã đổi mật khẩu thành công. Bạn có thể reset lại trình duyệt và đăng nhập lại hệ thống !";
}
