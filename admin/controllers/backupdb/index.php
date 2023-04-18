<?php

permission_user();
permission_moderator();

require_once('admin/models/backupDB.php');

$title = 'Backup Cơ sở dữ liệu Dababase';
$backupDbClass = 'class="active open"';

if (isset($_POST['backup_database'])) {
    backup_db();
    header('location:admin.php?controller=backupdb&action=result');
}

require('admin/views/backupdb/index.php');
