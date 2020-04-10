<?php require('admin/views/shared/header.php'); ?>
<?php require('admin/views/shared/loader.php'); ?>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php require('admin/views/shared/formsearch.php'); ?>
<?php require('admin/views/shared/leftnavbar.php'); ?>
<?php require('admin/views/shared/rightnavbar.php'); ?>
<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>Tổng trang và bài viết</h6>
                        <h2><?= $total_posts ?> <small class="info">Post: <?= $total_post ?> Page: <?= $total_page ?></small></h2>
                        <small>Thống kê tổng số đã bật "Công Khai"</small>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="<?= $posts_ratio ?>" aria-valuemin="0" aria-valuemax="100" <?= 'style="width:' . $posts_ratio . '%;"' ?>></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>Tổng đơn hàng</h6>
                        <h2><?= $total_order ?> <small class="info">Đang XLý <?= $total_order_inprosess ?> | Chưa XLý <?= $total_order_noprosess ?></small></h2>
                        <small>Thông kê đơn hàng xử lý, bị hủy</small>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="<?= $order_ratio ?>" aria-valuemin="0" aria-valuemax="100" <?= 'style="width:' . $order_ratio . '%;"' ?>></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon email">
                    <div class="body">
                        <h6>Tổng phản hồi</h6>
                        <h2><?= $total_feedback ?> <small class="info">Về đơn hàng <?= $total_feedback_order ?> | Về sản phẩm <?= $total_feedback_product ?></small></h2>
                        <small>Thống kê phản hồi đã xem, xử lý</small>
                        <div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="<?= $feedback_ratio ?>" aria-valuemin="0" aria-valuemax="100" <?= 'style="width:' . $feedback_ratio . '%;"' ?>></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon domains">
                    <div class="body">
                        <h6>Tổng Comment</h6>
                        <h2><?= $total_rows_comment ?> <small class="info">Chưa chấp nhận: <?= $total_comment_noaccept ?></small></h2>
                        <small>Thống kê bình luận đã chấp nhận</small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="<?= $comment_ratio ?>" aria-valuemin="0" aria-valuemax="100" <?= 'style="width:' . $comment_ratio . '%;"' ?>></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 col-lg-8">
                <?php require('admin/views/order/tableOrderNoprocess.php'); ?>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Bảng <strong>Thông báo</strong></h2>
                                <ul class="header-dropdown">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="javascript:void(0);">Q/lý bình luận</a></li>
                                            <li><a href="javascript:void(0);">Q/lý phản hồi</a></li>
                                            <li><a href="admin.php?controller=order">Q/lý đơn hàng</a></li>
                                        </ul>
                                    </li>
                                    <li class="remove">
                                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Dữ liệu</th>
                                                <th>Số liệu Thống kê</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Đơn hàng mới</td>
                                                <td><?php echo get_time($order_new['createtime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Đơn chưa xử lý</td>
                                                <td><?= $total_order_noprosess ?></td>
                                            </tr>
                                            <tr>
                                                <td>Đơn bị hủy</td>
                                                <td><?= $total_order_cancell ?></td>
                                            </tr>
                                            <tr>
                                                <td>Đơn đang xử lý</td>
                                                <td><?= $total_order_inprosess ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bình luận mới</td>
                                                <td><?php echo get_time($comment_new['createDate'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                            </tr>
                                            <tr>
                                                <td>BLuận Chưa Xử lý</td>
                                                <td><?= $total_comment_noaccept ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phản hồi mới</td>
                                                <td><?php echo get_time($feedback_new['createTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phản hồi Chưa Xử lý</td>
                                                <td><?= $total_feedback_noaccept ?></td>
                                            </tr>
                                            <tr>
                                                <td>Trang mới</td>
                                                <td><?php echo get_time($page_new['post_date'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Trang nháp</td>
                                                <td><?= $total_page_draft ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bài viết mới</td>
                                                <td><?php echo get_time($post_new['post_date'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bài viết nháp</td>
                                                <td><?= $total_post_draft ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Bảng <strong>Bình luận gần đây</strong></h2>
                                <ul class="header-dropdown">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="javascript:void(0);">Q/lý bình luận</a></li>
                                            <li><a href="javascript:void(0);">Q/lý phản hồi</a></li>
                                            <li><a href="admin.php?controller=order">Q/lý đơn hàng</a></li>
                                        </ul>
                                    </li>
                                    <li class="remove">
                                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nội dung</th>
                                                <th>Người gửi</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($comment_five as $comment) :
                                                if ($comment['status'] == 0) : ?>
                                                    <tr style="background-color: #FFD18E;">
                                                        <td><?php echo substr($comment['content'], 0, 150);
                                                            if (strlen($comment['content']) > 150) echo '...'; ?> </td>
                                                        <td><?= $comment['author'] ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php else : ?>
                                                    <tr>
                                                        <td><?php echo substr($comment['content'], 0, 150);
                                                            if (strlen($comment['content']) > 150) echo '...'; ?> </td>
                                                        <td><?= $comment['author'] ?></td>
                                                        <td></td>
                                                    </tr>
                                            <?php endif;
                                            endforeach; ?>
                                            <tr>
                                                <td><strong>All (<?= $total_rows_comment ?>) | Mine (<?= $total_mine_comment ?>) | Pending (<?= $total_comment_noaccept ?>) | Approved (<?= $total_comment_accept ?>) | Spam (<?= $total_comment_spam ?>) | Trash (<?= $total_comment_trash ?>)</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Bảng <strong>Phản hồi gần đây</strong></h2>
                                <ul class="header-dropdown">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="javascript:void(0);">Q/lý bình luận</a></li>
                                            <li><a href="javascript:void(0);">Q/lý phản hồi</a></li>
                                            <li><a href="admin.php?controller=order">Q/lý đơn hàng</a></li>
                                        </ul>
                                    </li>
                                    <li class="remove">
                                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nội dung</th>
                                                <th>Người gửi</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($feedback_five as $feedback) :
                                                if ($feedback['status'] == 0) : ?>
                                                    <tr style="background-color: #FFD18E;">
                                                        <td><?= substr($feedback['subject'], 0, 150) ?> </td>
                                                        <td><?= $feedback['name'] ?></td>
                                                        <td>
                                                            <a title="Approve" class="btn btn-info btn-icon" href="admin.php?controller=feedback&action=approved&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-check-circle"></i></a>
                                                            <a onclick="return confirm('Are you sure to delete?')" title="Delete" class="btn btn-danger btn-icon" href="admin.php?controller=feedback&action=delete&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                                                            <a title="Edit" class="btn btn-warning btn-icon" href="admin.php?controller=feedback&action=edit&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eyedropper"></i></a><br>
                                                            <a title="View detail" class="btn btn-success btn-icon" href="admin.php?controller=feedback&action=view&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a title="Reply" class="btn btn-primary btn-icon" href="admin.php?controller=feedback&action=reply&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-mail-reply"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php else : ?>
                                                    <tr>
                                                        <td><?= substr($feedback['subject'], 0, 150) ?> </td>
                                                        <td><?= $feedback['name'] ?></td>
                                                        <td>
                                                            <a title="UnApprove" class="btn btn-default btn-icon" href="admin.php?controller=feedback&action=unapproved&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-minus-circle"></i></a>
                                                            <a onclick="return confirm('Are you sure to delete?')" title="Delete" class="btn btn-danger btn-icon" href="admin.php?controller=feedback&action=delete&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                                                            <a title="Edit" class="btn btn-warning btn-icon" href="admin.php?controller=feedback&action=edit&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eyedropper"></i></a>
                                                            <a title="View detail" class="btn btn-success btn-icon" href="admin.php?controller=feedback&action=view&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eye"></i></a>
                                                            <a title="Reply" class="btn btn-primary btn-icon" href="admin.php?controller=feedback&action=reply&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-mail-reply"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php endif;
                                            endforeach; ?>
                                            <tr>
                                                <td><strong>All (<?= $total_feedback ?>) | Mine (<?= $total_feedback_mine ?>) | Pending (<?= $total_feedback_noaccept ?>) | Approved (<?= $total_feedback_status ?>)</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>