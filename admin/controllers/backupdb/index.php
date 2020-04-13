<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/backupDB.php');
$title = 'Backup Cơ sở dữ liệu Dababase';
$backupdb = 'class="active open"';
if (isset($_POST['back_u_P_Data_base'])) {
    backup_db();
    header('location:admin.php?controller=backupdb&action=result');
}
require('admin/views/backupdb/index.php');
