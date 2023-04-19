<?php
cart_destroy();
if (isset($userNav)) detroy_cart_user_db();
header('location:' . PATH_URL . 'cart');
