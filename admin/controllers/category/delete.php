<?php

permission_user();
permission_moderator();

require_once('admin/models/category.php');

$subCateId = intval($_GET['sub_cate_id']);
deleteSubCategory($subCateId);

header('location:admin.php?controller=category');
