<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php 
require_once('lib/model.php');
$contacts = get_a_record('contacts', 1); ?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Đăng ký thành viên</title>
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
                    <form method="POST" class="card auth_form" action="index.php?controller=register">
                        <div class="header">
                            <img class="logo" src="assets/images/logo.svg" alt="">
                            <h5>Sign Up</h5>
                            <span>Đăng ký thành viên mới</span>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="email" placeholder="Nhập Email" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="confirmPassword" placeholder="Xác nhận Password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <div class="checkbox">
                                <input id="remember_me" type="checkbox" required>
                                <label for="remember_me">Tôi đọc và đồng ý với <a href="javascript:void(0);">các điều khoản sử dụng</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN UP</button>
                            <div class="signin_with mt-3">
                                <a class="link" href="admin.php">Bạn đã có tài khoản? Đến "Đăng nhập"!</a>
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
                        <img src="admin/themes/images/signup.svg" alt="Sign Up" />
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