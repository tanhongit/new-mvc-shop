<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
$options_link = array(
    'order_by' => 'id ASC',
    'where' => 'parent=0'
);
$title = 'Danh sách link Footer';
$nav_hf = 'class="active open"';
$link_menu_footer = get_all('menu_footers', $options_link);
$option_title = array(
    'order_by' => 'id ASC',
    'where' => 'parent=1'
);
$link_title_footer = get_all('menu_footers', $option_title);
require('admin/views/header-footer/listMenuFooter.php');
