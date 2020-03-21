<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo isset($title) ? $title : 'Quản trị hệ thống'; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="admin/themes/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="admin/themes/css/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="admin/themes/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="admin/themes/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="admin/themes/css/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="admin/themes/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="admin/themes/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="admin/themes/css/dataTables.responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="admin/themes/js/jquery.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <?php require('admin/views/shared/navbar.php'); ?>