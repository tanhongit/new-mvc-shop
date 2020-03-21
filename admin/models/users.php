<?php
function user_login($email, $password)
{
    global $linkconnectDB;
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 0,1";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($query);
        return true;
    }
    return false;
}
function user_delete($id)
{
    global $linkconnectDB;
    $id = intval($id);
    $sql = "DELETE FROM user WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
