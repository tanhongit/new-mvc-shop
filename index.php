<?php
session_start();
require_once('lib/model.php');
require_once('lib/functions.php');
if (isset($_GET['controller'])) $controller = $_GET['controller'];
else $controller = 'home';
if (isset($_GET['action'])) $action = $_GET['action'];
else $action = 'index';
$file = 'content/controllers/' . $controller . '/' . $action . '.php';
if (file_exists($file)) {
    require($file);
} else {
    show_404();
}