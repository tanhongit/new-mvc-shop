<?php
permission_user();
require_once('admin/models/backupDB.php');
if (isset($_POST['linkFile'])) {
    delete_file_backup($_POST['linkFile']);
    header('location:admin.php?controller=backupdb&action=list');
} else show_404();
