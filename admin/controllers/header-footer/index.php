<?php
permission_user();
require_once('admin/models/header-footer.php');
if (!empty($_POST)) {
    header_footer_update();
}
$title = 'Sửa header footer website';
$contact = get_a_record('contacts', 1);
require('admin/views/header-footer/index.php');
