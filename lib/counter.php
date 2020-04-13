<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
require_once('lib/statistics.php');
$session = session_id();
$time = time();
//$time_check = $time - 30; //Ấn định thời gian là 10 phút

// function get_client_ip_env()
// {
// if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//     $ip = $_SERVER['HTTP_CLIENT_IP'];
// } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
// } else {
//     $ip = $_SERVER['REMOTE_ADDR'];
// }
//     return $ip;
// }

//https://www.virendrachandak.com/techtalk/getting-real-client-ip-address-in-php-2/  http://tanvietblog.com/2013/09/15/php-lay-dia-chi-ip-cua-khach-vieng-tham
// Function to get the client ip address
function get_client_ip_env()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
// // Function to get the client ip address
// function get_client_ip_server() {
//     $ipaddress = '';
//     if ($_SERVER['HTTP_CLIENT_IP'])
//         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
//         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     else if($_SERVER['HTTP_X_FORWARDED'])
//         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//     else if($_SERVER['HTTP_FORWARDED_FOR'])
//         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//     else if($_SERVER['HTTP_FORWARDED'])
//         $ipaddress = $_SERVER['HTTP_FORWARDED'];
//     else if($_SERVER['REMOTE_ADDR'])
//         $ipaddress = $_SERVER['REMOTE_ADDR'];
//     else
//         $ipaddress = 'UNKNOWN';

//     return $ipaddress;
// }
$ip = get_client_ip_env();
$browser = $_SERVER['HTTP_USER_AGENT'];

global $linkconnectDB;
$date =  gmdate('Y-m-d H:i:s', time() + 7 * 3600);
$sql = "SELECT * FROM users_online WHERE session='$session'";
$result = mysqli_query($linkconnectDB, $sql);
$count = mysqli_num_rows($result);
if ($count == "0") { //Truy cập lần đầu
    // //sql2
    insert_user_online($session, $time, $ip, $browser, $date);
} else { //Truy cập lần 2
    update_user_online($session, $time, $ip, $browser, $date);
}
// $sql3 = "SELECT * FROM users_online";
// $result3 = mysqli_query($linkconnectDB, $sql3);
// $count_user_online = mysqli_num_rows($result3);
//echo "Số người đang online : $count_user_online ";
// Nếu quá 10 phút, xóa bỏ session
// $sql4 = "DELETE FROM users_online WHERE time<$time_check";
// $result4 = mysqli_query($linkconnectDB, $sql4);
// Đóng kết nối
