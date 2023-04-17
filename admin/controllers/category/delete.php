<?php

permission_user();
permission_moderator();

require_once('admin/models/category.php');

$subCateId = intval($_GET['subcate_id']);
subcategories_delete($subCateId);

header('location:admin.php?controller=category');
