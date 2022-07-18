<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
session_start();
require_once('lib/model.php');
require_once('lib/functions.php');
require_once('content/models/cart.php');
require "lib/statistics.php";
require "lib/counter.php";
// $count_file = 'logs/counter.txt';
// $ip_file = 'logs/ip.txt';
// function counting_ip()
// {
//     $ip = $_SERVER['REMOTE_ADDR'];
//     global $count_file, $ip_file;

//     if (!in_array($ip, file($ip_file, FILE_IGNORE_NEW_LINES))) {
//         $current_val = (file_exists($count_file)) ? file_get_contents($count_file) : 0;
//         file_put_contents($ip_file, $ip . "\n", FILE_APPEND);
//         file_put_contents($count_file, ++$current_val);
//     }
// }
// counting_ip();
if (isset($_GET['controller']) && '' != $_GET['controller']) {
    $controller = $_GET['controller'];
} else {
    $controller = 'home';
}

if (isset($_GET['action']) && '' != $_GET['action']) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$file = 'content/controllers/' . $controller . '/' . $action . '.php';
if (file_exists($file)) {
    require($file);
} else {
    show_404();
}
