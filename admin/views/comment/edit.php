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
                    <h2>Chỉnh sửa Thông tin về bình luận </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=comment">Comment</a></li>
                        <li class="breadcrumb-item active">Edit comment Detail</li>
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
                <h2 style="font-weight: bold;">Phần chỉnh sửa</h2>
                <div class="col-lg-12">
                    Link:
                    <?php if ($comment['product_id'] <> 0) { ?>
                        <a target="_blank" href="<?= PATH_URL . 'product/' . $product['id'] . '-' . $product['slug'] ?>"><?= PATH_URL . 'product/' . $product['id'] . '-' . $product['slug'] ?></a>
                    <?php } elseif ($comment['post_id'] <> 0) { ?>
                        <a target="_blank" href="<?= PATH_URL . 'post/' . $post['id'] . '-' . $post['post_slug'] ?>"><?= PATH_URL . 'post/' . $post['id'] . '-' . $post['post_slug'] ?></a>
                    <?php } elseif ($comment['page_id'] <> 0) { ?>
                        <a target="_blank" href="<?= PATH_URL . 'page/' . $page['id'] . '-' . $page['post_slug'] ?>"><?= PATH_URL . 'page/' . $page['id'] . '-' . $page['post_slug'] ?></a>
                    <?php } ?>
                    <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=comment&action=edit" enctype="multipart/form-data" role="form">
                        <input name="comment_id" type="hidden" value="<?php echo $comment ? $comment['id'] : '0'; ?>" />
                        <h4 class="card-inside-title" style="font-weight:bold;">Họ và tên:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="name" type="text" value="<?php echo $comment ? $comment['author'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Email:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="email" type="email" maxlength="100" value="<?php echo $comment ? $comment['email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nội dung:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="subject" type="text" class="form-control" id="ckeditor" required placeholder="Nội dung phản hồi..."><?php echo $comment ? $comment['content'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <h4>Status:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="status" id="male" class="with-gap" value="1" <?php if ($comment['status'] == "1") echo "checked"; ?>>
                                        <label for="male">Approve</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="Female" class="with-gap" <?php if ($comment['status'] == "0") echo "checked"; ?> value="0">
                                        <label for="Female">Pending</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="Female" class="with-gap" <?php if ($comment['status'] == "3") echo "checked"; ?> value="3">
                                        <label for="Female">Spam</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-primary waves-effect" type="submit">Update lại thông tin phản hồi</button>
                            <a class="btn btn-warning waves-effect" href="admin.php?controller=comment">Trở về</a>
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
    CKEDITOR.replace('subject', {
        height: '200px'
    });
</script>
<?php require('admin/views/shared/footer.php'); ?>