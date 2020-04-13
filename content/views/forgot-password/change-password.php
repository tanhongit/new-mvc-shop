<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php
if (isset($_GET['id'])) $id = $_GET['id'];
?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title><?= $title ?></title>
    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/themes/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/themes/css/style.min.css">
</head>

<body class="theme-blush">
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form method="POST" class="card auth_form" action="index.php?controller=forgot-password&action=result-change-password">
                        <div class="header">
                            <img class="logo" src="assets/images/logo.svg" alt="">
                            <h5>Đổi mật khẩu</h5>
                            <span>Thay mật khẩu mới iiii <i class="zmdi zmdi-favorite"></i></span>
                        </div>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="newpassword" placeholder="NEW Password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="confirmNewPassword" placeholder="Xác nhận NEW Password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Xác nhận đổi mật khẩu</button>
                            <div class="signin_with mt-3">
                                <a class="link" href="admin.php">Bạn đã nhớ lại mật khẩu? Đến "Đăng nhập"!</a>
                            </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        <span>Phát triển bởi <a href="https://tanhongit.com" target="_blank">TanHongIT</a></span>
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