<?php
function user_login($email, $password)
{
    global $linkconnectDB;
    $sql = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password' LIMIT 0,1";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($query);
        global $user_nav;
        $user_nav = $_SESSION['user']['id'];
        return true;
    }
    return false;
}
function user_delete($id)
{
    $user = get_a_record('users', $id);
    $image = 'public/upload/images/' . $user['user_avatar'];
    if (is_file($image)) {
        unlink($image);
    }
    global $linkconnectDB;
    $id = intval($id);
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function changePassword($id, $newpassword, $currentPassword)
{
    global $linkconnectDB;
    $sql = "Update users SET user_password='$newpassword' WHERE id='$id' AND user_password = '$currentPassword'";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $rows =  mysqli_affected_rows($linkconnectDB); //Gets the number of affected rows in a previous MySQL operation
    if ($rows <> 1) {
        return  "<div class='alert alert-danger'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Bạn đã nhập mật khẩu hiện tại không đúng !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='admin.php'>Đến Dashboard</a></div>" . mysqli_error($linkconnectDB);
    } else return '<div class="alert alert-success"><strong>Tốt!</strong> Bạn đã thay đổi mật khẩu thành công. Hãy <a href="admin.php?controller=home&action=logout">Đăng xuất</a> và đăng nhập lại.!!</div>';
}
