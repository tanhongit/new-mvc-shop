<?php

permission_user();
permission_moderator();

$linkOptions = array(
    'order_by' => 'id ASC',
    'where' => 'parent=0'
);
$title = 'Danh sách link Footer';
$navHF = 'class="active open"';
$menuFooterLinks = get_all('menu_footers', $linkOptions);
$titleOptions = array(
    'order_by' => 'id ASC',
    'where' => 'parent=1'
);
$titleFooterLinks = get_all('menu_footers', $titleOptions);

require('admin/views/header-footer/listMenuFooter.php');
