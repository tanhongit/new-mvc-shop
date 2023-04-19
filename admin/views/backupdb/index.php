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
                        <li class="breadcrumb-item"><a href="admin.php?controller=backupdb">BackUp</a></li>
                        <li class="breadcrumb-item active">Backup Database</li>
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
                        <strong>Bạn đang trong trang "Backup Database CSDL", Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=backupdb" enctype="multipart/form-data" role="form">
                                <h1 style="text-align: center; font-weight:bold;">Hiện tại bạn đang ở trong trang thực hiện backup lại cơ sở dữ liệu của website này</h1>
                                <hr>
                                <h1 style="text-align: center; font-weight:bold;">Bạn có chắc rằng bạn muốn lưu lại bản backup DataBase? Hãy lựa chọn !!!</h1>
                                <div class="form-group" style="text-align: center;">
                                <input type="text" hidden name="backup_database">
                                    <button class="btn btn-primary waves-effect" type="submit">Có! Bắt đầu tạo bản Backup</button>
                                    <a class="btn btn-warning waves-effect" href="admin.php">Không! Trở về</a>
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