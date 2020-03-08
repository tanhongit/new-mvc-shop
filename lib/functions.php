<?php
function show_404(){
    header('HTTP/1.1 Not Found 404', true, 404);
    require('404.php');
    exit();
}
function escape($str) {
    return mysqli::real_escape_string($str);
}