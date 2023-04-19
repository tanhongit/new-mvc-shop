<?php
function insert_user_online($session, $time, $ip, $browser, $date)
{
    global $linkConnectDB;
    $sql = "INSERT INTO users_online(session, time, ip, browser, dateonline)VALUES('$session', '$time','$ip','$browser', '$date')";
    return mysqli_query($linkConnectDB, $sql);
}
function update_user_online($session, $time, $ip, $browser, $date)
{
    global $linkConnectDB;
    $sql = "UPDATE users_online SET time='$time' ,ip='$ip', browser ='$browser', dateonline ='$date' WHERE session = '$session'";
    return mysqli_query($linkConnectDB, $sql);
}
