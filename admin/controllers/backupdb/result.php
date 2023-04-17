<?php

permission_user();
permission_moderator();

$title = 'Kết quả Backup Cơ sở dữ liệu Dababase';
$backupDbClass = 'class="active open"';

require('admin/views/backupdb/resultBackupdb.php');
