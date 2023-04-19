<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (isset($_GET['id'])) $product_id = intval($_GET['id']);
cart_delete($product_id);
global $userNav;
if (isset($userNav)) delete_cart_user_db($product_id);
header('location:' . PATH_URL . 'cart');
