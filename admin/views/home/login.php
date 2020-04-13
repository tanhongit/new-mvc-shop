<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
$contacts = get_a_record('contacts', 1); ?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title><?php echo $title; ?></title>
    <link rel=icon href="<?= PATH_URL ?>public/img/<?= $contacts['favicon'] ?>" sizes="32x32">
    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/themes/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/themes/css/style.min.css">
</head>

<body class="theme-blush">
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="admin.php?controller=home&action=login" role="form" method="post">
                        <div class="header">
                            <img class="logo" src="admin/themes/images/logo.svg" alt="">
                            <h5>Log in</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="E-mail Or Username..." name="email" type="email" autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" type="password" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="index.php?controller=forgot-password" class="forgot" title="Quên mật khẩu"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">LOG IN</button>
                            <div class="signin_with mt-3">
                                <p class="mb-0"><a href="index.php?controller=forgot-password"><i class="zmdi zmdi-lock"></i> Quên mật khẩu ?</a></a></p>
                                <p class="mb-0">hoặc <a href="register">Đăng ký</a> để sử dụng</p>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        <span>Thiết kế: <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span><span> - Phát triển bởi <a href="https://tanhongit.com" target="_blank">TanHongIT</a></span>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="admin/themes/images/signin.svg" alt="Sign In" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="admin/themes/bundles/libscripts.bundle.js"></script>
    <script src="admin/themes/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>