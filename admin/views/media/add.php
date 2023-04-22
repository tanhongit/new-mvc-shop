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
                        <li class="breadcrumb-item"><a href="admin.php?controller=media">Media</a></li>
                        <li class="breadcrumb-item active">Thêm ảnh mới</li>
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
                        <strong>Bạn đang trong trang upload một hình ảnh mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=media&action=add" enctype="multipart/form-data" role="form">
                                <input name="media_id" type="hidden" value="<?php echo $mediaInfo ? $mediaInfo['id'] : '0'; ?>" />
                                <h2 class="card-inside-title" style="font-weight:bold;">Tên ảnh:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" type="text" value="<?php echo $mediaInfo ? $mediaInfo['media_name'] : ''; ?>" class="form-control" id="name" placeholder="VD: tanhongit" required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chọn ngày tạo mới sản phẩm (bắt buộc):</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input name="createDate" id="createDate" type="date" value="<?php echo $mediaInfo ? $mediaInfo['createDate'] : date('d/m/Y'); ?>" class="form-control" placeholder="Please choose date & time...">
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Chọn ảnh bạn muốn upload:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <input name="imggggg" type="file" class="form-control dropify">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit">Xác nhận upload ảnh</button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=media">Trở về</a>
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