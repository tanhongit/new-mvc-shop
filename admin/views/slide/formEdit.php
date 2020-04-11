<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><? ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=slide">Slide</a></li>
                        <li class="breadcrumb-item active"><?php echo $slide ? 'Cập nhật slide: ' . $slide['slide_name']  : 'Thêm slide mới'; ?></li>
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
                        <strong><?php echo $slide ? 'Cảnh Báo: </strong> Bạn đang trong trang chỉnh sửa của slide "' . $slide['slide_name'] . '", Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>' : 'Cảnh Báo: </strong> Bạn đang trong trang tạo một slide mới, Hãy cẩn trọng!!! <a target="_blank" href="#"> Xem tài liệu hướng dẫn</a>'; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="slide-form" class="form-horizontal" method="post" action="admin.php?controller=slide&amp;action=edit" enctype="multipart/form-data" role="form">
                                <input name="slide_id" type="hidden" value="<?php echo $slide ? $slide['id'] : '0'; ?>" />
                                <h2 class="card-inside-title" style="font-weight:bold;">Tên Slide:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="name" type="text" maxlength="255" value="<?php echo $slide ? $slide['slide_name'] : ''; ?>" class="form-control" id="name" placeholder="Nhập tên slide..." required="" />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Status kích hoạt hiện trên trang chủ:</h2>
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="status" id="male" class="with-gap" value="1" <?php if (isset($slide) && $slide['status'] == "1") echo "checked"; ?>>
                                        <label for="male">Kích hoạt</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="Female" class="with-gap" <?php if (isset($slide) && $slide['status'] == "0") echo "checked"; ?> value="0">
                                        <label for="Female">Không kích hoạt</label>
                                    </div>
                                </div>
                                <?php for ($i = 1; $i < 6; $i++) : ?>
                                    <h2 class="card-inside-title" style="font-weight:bold;">Text <?= $i ?>:</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="slide_text<?= $i ?>"  maxlength="500" type="text" value="<?php echo $slide ? $slide['slide_text' . $i] : ''; ?>" class="form-control" id="name" placeholder="Nhập text <?= $i ?>..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="card col-md-6">
                                            <div class="header">
                                                <h2 style="text-align: center;">Image <?= $i ?></h2>
                                            </div>
                                            <div class="body">
                                                <input name="image<?= $i ?>" type="file" class="form-control dropify">
                                            </div>
                                        </div>
                                        <?php if (isset($slide)) : ?>
                                            <div class="col-sm-6">
                                                <div class="header">
                                                    <h2 style="text-align: center;">Image <?= $i ?> Hiện tại</h2>
                                                </div>
                                                <div style="text-align: center;" class="body">
                                                    <img style="max-width:320px;" src="public/upload/slides/<?php echo $slide['slide_img' . $i]; ?>" alt="<?php echo $slide['slide_img' . $i]; ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endfor; ?>
                                <div class="form-group" style="text-align: center;">
                                    <button class="btn btn-primary waves-effect" type="submit"><?php echo $slide ? 'Cập nhật slide trên' : 'Thêm slide mới'; ?></button>
                                    <a class="btn btn-warning waves-effect" href="admin.php?controller=slide">Trở về</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>