<?php

permission_user();
permission_moderator();

$linkOptions = [
    'order_by' => 'id ASC',
    'where' => 'parent=0',
];
$title = 'Danh sách link Footer';
$navHF = 'class="active open"';
$menuFooterLinks = getAll('menu_footers', $linkOptions);
$titleOptions = [
    'order_by' => 'id ASC',
    'where' => 'parent=1',
];
$titleFooterLinks = getAll('menu_footers', $titleOptions);

require('admin/views/header-footer/listMenuFooter.php');
