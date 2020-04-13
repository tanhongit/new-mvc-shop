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
    menu_footer_update();
}
if (isset($_GET['menufooter_id'])) $menufooter_id = intval($_GET['menufooter_id']);
else $menufooter_id = 0;
global $linkconnectDB;
if (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT id FROM menu_footers WHERE id='$menufooter_id'")) == 0) {
    echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Trường này không tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
    require('admin/views/header-footer/result.php');
    exit;
}
$title = 'Sửa menu link footer website';
$nav_hf = 'class="active open"';
$menufooter = get_a_record('menu_footers', $menufooter_id);
require('admin/views/header-footer/editMenuFooter.php');
