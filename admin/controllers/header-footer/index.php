<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/header-footer.php');
if (!empty($_POST)) {
    header_footer_update();
}
$title = 'Sửa header footer website';
$nav_hf = 'class="active open"';
$contact = get_a_record('contacts', 1);
require('admin/views/header-footer/index.php');
