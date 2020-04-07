<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Image Gallery</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="admin/themes/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Light Gallery Plugin Css -->
    <link rel="stylesheet" href="admin/themes/plugins/light-gallery/css/lightgallery.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/themes/css/style.min.css">
</head>

<body class="theme-blush">
    <?php require('admin/views/shared/loader.php'); ?>
    <div class="overlay"></div>
    <?php require('admin/views/shared/formsearch.php'); ?>
    <?php require('admin/views/shared/leftnavbar.php'); ?>
    <?php require('admin/views/shared/rightnavbar.php'); ?>
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Image Gallery</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                            <li class="breadcrumb-item active">Media</li>
                            <li class="breadcrumb-item active">Danh sách ảnh - Products</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                    <?php foreach ($products as $product_img) : ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-30"> <a href="public/upload/products/<?= $product_img['img1'] ?>"> <img class="img-fluid img-thumbnail" src="public/upload/products/<?= $product_img['img1'] ?>" alt=""> </a> </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-30"> <a href="public/upload/products/<?= $product_img['img2'] ?>"> <img class="img-fluid img-thumbnail" src="public/upload/products/<?= $product_img['img2'] ?>" alt=""> </a> </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-30"> <a href="public/upload/products/<?= $product_img['img3'] ?>"> <img class="img-fluid img-thumbnail" src="public/upload/products/<?= $product_img['img3'] ?>" alt=""> </a> </div>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-30"> <a href="public/upload/products/<?= $product_img['img4'] ?>"> <img class="img-fluid img-thumbnail" src="public/upload/products/<?= $product_img['img4'] ?>" alt=""> </a> </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Jquery Core Js -->
    <script src="admin/themes/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="admin/themes/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="admin/themes/plugins/light-gallery/js/lightgallery-all.min.js"></script> <!-- Light Gallery Plugin Js -->
    <script src="admin/themes/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="admin/themes/js/pages/medias/image-gallery.js"></script>
</body>

</html>