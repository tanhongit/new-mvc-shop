<?php
function show_404(){
    header('HTTP/1.1 404 Not Found', true, 404);
    require('404.php');
    exit();
}
function escape($str) {
    global $linkconnectDB;
    return mysqli_real_escape_string($linkconnectDB,$str);
}