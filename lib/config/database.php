<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'chikoi');
$linkconnectDB = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
or die("Can not connect database");
mysqli_set_charset($linkconnectDB, 'UTF8');