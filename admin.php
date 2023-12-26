<?php

session_start();

require_once('lib/model.php');
require_once('lib/functions.php');

$controller = $_GET['controller'] ?? 'home';

$action = $_GET['action'] ?? 'index';

if (!isset($_SESSION['user'])) {
    $controller = 'home';
    $action = 'login';
}

$file = 'admin/controllers/' . $controller . '/' . $action . '.php';
if (file_exists($file)) {
    require($file);
} else {
    show_404();
}



