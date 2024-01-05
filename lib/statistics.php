<?php

/**
 * @param $session
 * @param $time
 * @param $ip
 * @param $browser
 * @param $date
 *
 * @return void
 * @throws Exception
 */
function insert_user_online($session, $time, $ip, $browser, $date): void
{
    $sql = "INSERT INTO users_online(session, time, ip, browser, dateonline) VALUES ('$session', '$time', '$ip', '$browser', '$date')";
    $query = executeQuery($sql);
    $query->close();
}

/**
 * @param $session
 * @param $time
 * @param $ip
 * @param $browser
 * @param $date
 *
 * @return void
 * @throws Exception
 */
function update_user_online($session, $time, $ip, $browser, $date): void
{
    $sql = "UPDATE users_online SET time='$time' , ip='$ip', browser ='$browser', dateonline ='$date' WHERE session = '$session'";
    $query = executeQuery($sql);
    $query->close();
}
