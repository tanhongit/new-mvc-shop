<?php
permission_user();
$options_link = array(
    'order_by' => 'id ASC',
    'where' => 'parent=0'
);
$title = 'Danh sách link Footer';
$link_menu_footer = get_all('menu_footers', $options_link);
$option_title = array(
    'order_by' => 'id ASC',
    'where' => 'parent=1'
);
$link_title_footer = get_all('menu_footers', $option_title);
require('admin/views/header-footer/listMenuFooter.php');
