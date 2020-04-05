<?php
$session = session_id();
$time = time();
$time_check = $time - 600; //Ấn định thời gian là 10 phút
$browser = $_SERVER['HTTP_USER_AGENT'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
global $linkconnectDB;
$date =  date("Y-m-d h:m:s");
$sql = "SELECT * FROM users_online WHERE session='$session'";
$result = mysqli_query($linkconnectDB, $sql);
$count = mysqli_num_rows($result);
if ($count == "0") {
    //sql2
    insert_user_online($session, $time, $ip, $browser, $date);
    insert_visiter($session, $time, $ip, $browser, $date);
} else {
    update_user_online($session, $time, $ip, $browser, $date);
}
$sql3 = "SELECT * FROM users_online";
$result3 = mysqli_query($linkconnectDB, $sql3);
$count_user_online = mysqli_num_rows($result3);
//echo "Số người đang online : $count_user_online ";
// Nếu quá 10 phút, xóa bỏ session
$sql4 = "DELETE FROM users_online WHERE time<$time_check";
$result4 = mysqli_query($linkconnectDB, $sql4);
// Đóng kết nối
