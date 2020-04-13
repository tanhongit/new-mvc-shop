<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<link rel=icon href="<?=PATH_URL?>public/img/favicon-chikoi-quan.png" sizes="32x32">
<title>:: Quên mật khẩu ::</title>
<!-- Custom Css -->
<link rel="stylesheet" href="admin/themes/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="admin/themes/css/style.min.css">    
</head>
<body class="theme-blush">
<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" method="POST" role="form" action="index.php?controller=forgot-password&amp;action=request">
                    <div class="header">
                        <img class="logo" src="admin/themes/images/logo.svg" alt="">
                        <h5>Quên mật khẩu ?</h5>
                        <span>Nhập địa chỉ email của bạn dưới đây để đặt lại mật khẩu của bạn..</span>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="email" placeholder="Nhập Email" autofocus> 
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Xác nhận</button>                        
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Thiết kế: <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span><span> - Phát triển bởi <a href="https://tanhongit.com" target="_blank">TanHongIT</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="admin/themes/images/signin.svg" alt="Forgot Password"/>
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