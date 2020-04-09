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
                    <h2>Trả lời quan email về phản hồi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=feedback">Feedback</a></li>
                        <li class="breadcrumb-item active">Reply Feedback</li>
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
                <h2 style="font-weight: bold;">Gửi Email trả lời phản hồi</h2>
                <div class="col-lg-12">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>Tên người gửi phản hồi</h5>
                                <input name="name" type="text" disabled value="<?php echo $feedback ? $feedback['name'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>Email của người gửi phản hồi</h5>
                                <input name="email" type="text" disabled value="<?php echo $feedback ? $feedback['email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>SĐT của người gửi phản hồi</h5>
                                <input name="phone" type="text" disabled value="<?php echo $feedback ? $feedback['phone'] : ''; ?>" class="form-control" id="totalview" required placeholder="0123456789..." />
                            </div>
                        </div>
                    </div>
                    <h4 class="card-inside-title" style="font-weight:bold;">Nội dung của người đã phản hồi:</h4>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="subject" disabled type="text" class="form-control" id="totalview" required placeholder="Nội dung phản hồi..."><?php echo $feedback ? $feedback['subject'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=feedback&action=reply" enctype="multipart/form-data" role="form">
                        <input name="feedback_email" type="hidden" value="<?php echo $feedback ? $feedback['email'] : ''; ?>" />
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="html-content" id="ckeditor" autofocus type="text" class="form-control" rows="20" required placeholder="Nhập nội dung trả lời phản hồi..."> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <button onclick="return confirm('Bạn có chắc muốn gửi?')" class="btn btn-primary waves-effect" type="submit">Gửi trả lời</button>
                            <a class="btn btn-warning waves-effect" href="admin.php?controller=feedback">Trở về</a>
                            <a class="btn btn-success waves-effect" href="admin.php?controller=feedback&action=view&feedback_id=<?= $feedback['id'] ?>">Xem lại chi tiết phản hồi này</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="admin/themes/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="admin/themes/plugins/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('html-content', {
        height: '200px'
    });
</script>
<?php require('admin/views/shared/footer.php'); ?>