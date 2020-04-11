<?php require('admin/views/shared/header.php'); ?>
<?php require('admin/views/shared/loader.php'); ?>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php require('admin/views/shared/formsearch.php'); ?>
<?php require('admin/views/shared/rightnavbar.php'); ?>
<?php require('admin/views/shared/leftnavbar.php'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><? ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=user&action=listall">User</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <strong>Bạn đang thực hiện đổi mật khẩu, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=user&action=result" enctype="multipart/form-data" role="form">
                                <input name="id_change" type="hidden" value="<?php echo $user_info ? $user_info['id'] : '0'; ?>" />
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h2 class="card-inside-title" style="font-weight:bold;">Mật khẩu hiện tại:</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="currentPassword" type="password" maxlength="50" value="" class="form-control" placeholder="VD: tanhongit" required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title" style="font-weight:bold;">Mật khẩu mới:</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="newPassword" type="password" value="" maxlength="50" class="form-control" placeholder="Nhap mat khau..." required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title" style="font-weight:bold;">Xác nhận mật khẩu mới:</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="confirmPassword" type="password" value="" maxlength="50" class="form-control" placeholder="Xác nhận mật khẩu..." required="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit">Xác nhận đổi mật khẩu mới</button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=user&action=info&amp;user_id=<?php echo $user_info['id']; ?>">Trở về</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>