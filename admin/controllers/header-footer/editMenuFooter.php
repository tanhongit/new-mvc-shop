<?php

permission_user();
permission_moderator();

require_once('admin/models/header-footer.php');

if (!empty($_POST)) {
    updateMenuFooter();
}

if (isset($_GET['menu_footer_id'])) {
    $menuFooterId = intval($_GET['menu_footer_id']);
} else {
    $menuFooterId = 0;
}

global $linkConnectDB;

if (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT id FROM menu_footers WHERE id='$menuFooterId'")) == 0) {
    echo "<div style='padding-top: 200px' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Trường này không tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
    require('admin/views/header-footer/result.php');
    exit;
}

$title = 'Sửa menu link footer website';
$navHF = 'class="active open"';
$menuFooter = getRecord('menu_footers', $menuFooterId);

require('admin/views/header-footer/editMenuFooter.php');
