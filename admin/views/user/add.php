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
                        <li class="breadcrumb-item"><a href="admin.php?controller=user&action=listall">List User</a></li>
                        <li class="breadcrumb-item active">Thêm người dùng mới</li>
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
                        <strong>Bạn đang trong trang tạo một người dùng mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=user&action=add" enctype="multipart/form-data" role="form">
                                <input name="user_id" type="hidden" value="<?php echo $user_info ? $user_info['id'] : '0'; ?>" />
                                <h2 class="card-inside-title" style="font-weight:bold;">Tên đăng nhập:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="username" type="text" maxlength="50" value="<?php echo $user_info ? $user_info['user_username'] : ''; ?>" class="form-control" id="name" placeholder="VD: tanhongit" required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Mật khẩu:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="password" type="text" maxlength="50" value="<?php echo $user_info ? $user_info['user_password'] : ''; ?>" class="form-control" id="name" placeholder="Nhap mat khau..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Họ và tên User:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" type="text" maxlength="255" value="<?php echo $user_info ? $user_info['user_name'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Email:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="email" type="email" maxlength="255" value="<?php echo $user_info ? $user_info['user_email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chọn mức quyền quản trị (Role):</h2>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mb-3 form-group">
                                            <select name="roleid" required class="form-control show-tick">
                                                <option value="0">User</option>
                                                <option value="2">Moderator</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="roleid" type="text" required value="<?php echo $user_info ? $user_info['role_id'] : ''; ?>" class="form-control" id="size" placeholder="( 0=User , 1=Admin, 2=Mod)" />
                                        </div>
                                    </div>
                                </div> -->
                                <h2 class="card-inside-title" style="font-weight:bold;">Nhập địa chỉ:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="address" type="text" maxlength="200" value="<?php echo $user_info ? $user_info['user_address'] : ''; ?>" class="form-control" id="material" placeholder="Địa chỉ người dùng ..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Nhập số điện thoại:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="phone" type="text" pattern="[0-9\.]+" maxlength="20" value="<?php echo $user_info ? $user_info['user_phone'] : ''; ?>" class="form-control" id="totalview" placeholder="0123456789..." />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chọn ngày tạo mới thành viên (bắt buộc):</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input name="createDate" id="createDate" type="date" value="<?php echo $user_info ? $user_info['createDate'] : date('d/m/Y'); ?>" class="form-control" placeholder="Please choose date & time...">
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chọn ảnh Avatar:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input name="imagee" type="file" class="form-control dropify">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit">Thêm người dùng mới</button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=user&action=listall">Trở về</a>
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