<?php
$contacts = get_a_record('contacts', 1);
global $userNav;
$userInfoNav = get_a_record('users', $userNav) ?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title><?php echo isset($title) ? $title : 'Quản Trị - Quán Chị Kòi'; ?></title>
    <link rel=icon href="<?= PATH_URL ?>public/img/<?= $contacts['favicon'] ?>" sizes="32x32">
    <link rel="stylesheet" href="admin/themes/plugins/bootstrap/css/bootstrap.min.css">
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="admin/themes/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="admin/themes/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="admin/themes/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="admin/themes/plugins/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="admin/themes/css/style.min.css">
</head>

<body class="theme-blush">