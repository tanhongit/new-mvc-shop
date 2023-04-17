<?php

permission_user();
permission_moderator();

$title = 'Danh sách file Backup Cơ sở dữ liệu Dababase';
$backupDbClass = 'class="active open"';

require('admin/views/backupdb/list.php');
