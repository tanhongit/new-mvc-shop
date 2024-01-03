<?php

permission_user();
permission_moderator();

require_once('admin/models/backupDB.php');

if (isset($_POST['linkFile'])) {
    delete_file_backup($_POST['linkFile']);
    header('location:admin.php?controller=backupdb&action=list');
} else {
    show404NotFound();
}
