<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
permission_user();
permission_moderator();
$title = 'Kết quả Backup Cơ sở dữ liệu Dababase';
$backupdb = 'class="active open"';
require('admin/views/backupdb/resultBackupdb.php');
