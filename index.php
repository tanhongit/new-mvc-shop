<?php
/**
 * Developed by: TanHongIT
 * Website: https://tanhongit.com - https://tanhongit.net
 * Github: https://github.com/TanHongIT
 */

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

require_once('lib/model.php');
require_once('lib/functions.php');
require_once('content/models/cart.php');
require "lib/statistics.php";
require "lib/counter.php";

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
    show404NotFound();
}
