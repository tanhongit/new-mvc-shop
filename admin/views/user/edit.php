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
                    <h2>Thông tin tài khoản cá nhân của bạn</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=user&action=listall">User</a></li>
                        <li class="breadcrumb-item active">Edit Your Profile Info</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <h3>Thông tin tải khoản các nhân</h3>
                        <table id="info" class="table">
                            <tr>
                                <td><strong>Họ và tên</strong></td>
                                <td><?php echo $user_info['user_name']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tên Đăng nhập</strong> </td>
                                <td><?php echo $user_info['user_username']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Quyền lực</strong> </td>
                                <td><strong><?php if ($user_info['role_id'] == 0) {
                                                echo 'Người đăng ký';
                                            } elseif ($user_info['role_id'] == 1) {
                                                echo 'Admin - Quản trị viên';
                                            } else echo 'Moderator'; ?></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong> </td>
                                <td><?php echo $user_info['user_email']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ</strong> </td>
                                <td><?php echo $user_info['user_address']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Di động</strong> </td>
                                <td><?php echo $user_info['user_phone']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ngày đăng ký tài khoản</strong> </td>
                                <td><?php echo $user_info['createDate']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Avatar</strong> </td>
                                <td><img style="max-width:200px;" src="public/upload/images/<?php echo $user_info['user_avatar']; ?>" alt="<?php echo $user_info['user_name']; ?>"> </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                <h2 style="font-weight: bold;">Phần chỉnh sửa thông tin cá nhân trên</h2>
                <div class="col-lg-12">
                    <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=user&action=edit" enctype="multipart/form-data" role="form">
                        <input name="user_id" type="hidden" value="<?php echo $user_info ? $user_info['id'] : '0'; ?>" />
                        <?php if ($loginUser['role_id'] == 1) : ?>
                            <h4 class="card-inside-title" style="font-weight:bold;">Tên đăng nhập:</h4>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input name="username" type="text" maxlength="50" value="<?php echo $user_info ? $user_info['user_username'] : ''; ?>" class="form-control" id="name" placeholder="VD: tanhongit" required="" />
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
                        <?php else : ?>
                            <h4 class="card-inside-title" style="font-weight:bold;">Tên đăng nhập: "<?= $user_info['user_username'] ?>"</h4>
                            <input name="username" type="hidden" value="<?php echo $user_info ? $user_info['user_username'] : ''; ?>" class="form-control" />
                        <?php endif; ?>
                        <h4 class="card-inside-title" style="font-weight:bold;">Họ và tên User:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="name" type="text" maxlength="250" value="<?php echo $user_info ? $user_info['user_name'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Email:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="email" type="email" maxlength="250" value="<?php echo $user_info ? $user_info['user_email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nhập địa chỉ:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="address" type="text" maxlength="250" value="<?php echo $user_info ? $user_info['user_address'] : ''; ?>" class="form-control" id="material" placeholder="Địa chỉ người dùng ..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nhập số điện thoại:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="phone" type="text" pattern="[0-9\.]+" maxlength="20" value="<?php echo $user_info ? $user_info['user_phone'] : ''; ?>" class="form-control" id="totalview" required placeholder="0123456789..." />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Chọn ảnh Avatar Mới:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <input name="imagee" type="file" class="form-control dropify">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-primary waves-effect" type="submit">Update lại thông tin User</button>
                            <a class="btn btn-primary waves-effect" href="admin.php?controller=user&action=change-password&amp;user_id=<?php echo $user_info['id']; ?>">Đổi mật khẩu</a>
                            <a class="btn btn-warning waves-effect" href="admin.php?controller=user&action=listall">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>