<?php
session_start();
require_once('lib/model.php');
require_once('lib/functions.php');
if (isset($_GET['controllers'])) $controller = $_GET['controllers'];
else $controllers = 'home';

if (isset($_GET['action'])) $action = $_GET['action'];
else $action = 'index';
$file = 'content/controllers/' . $controllers . '/' . $action . '.php';
if (file_exists($file)) {
    require($file);
} else {
    show_404();
}
