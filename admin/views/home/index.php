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
                                                <th>Thống kê</th>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mcard_4">
                    <div class="body">
                        <ul class="header-dropdown list-unstyled">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i> </a>
                                <ul class="dropdown-menu slideUp">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="img">
                            <img src="assets/images/lg/avatar1.jpg" class="rounded-circle" alt="profile-image">
                        </div>
                        <div class="user">
                            <h5 class="mt-3 mb-1">Eliana Smith</h5>
                            <small class="text-muted">UI/UX Desiger</small>
                        </div>
                        <ul class="list-unstyled social-links">
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-dribbble"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                    <div class="body">
                        <div class="w_icon pink"><i class="zmdi zmdi-bug"></i></div>
                        <h4 class="mt-3 mb-0">12.1k</h4>
                        <span class="text-muted">Bugs Fixed</span>
                        <div class="w_description text-success">
                            <i class="zmdi zmdi-trending-up"></i>
                            <span>15.5%</span>
                        </div>
                    </div>
                </div>
                <div class="card w_data_1">
                    <div class="body">
                        <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                        <h4 class="mt-3 mb-1">01.8k</h4>
                        <span class="text-muted">Submitted Tickers</span>
                        <div class="w_description text-success">
                            <i class="zmdi zmdi-trending-up"></i>
                            <span>95.5%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="chat-widget">
                            <ul class="list-unstyled">
                                <li class="left">
                                    <img src="assets/images/xs/avatar3.jpg" class="rounded-circle" alt="">
                                    <ul class="list-unstyled chat_info">
                                        <li><small>Frank 11:00AM</small></li>
                                        <li><span class="message bg-blue">Hello, Michael</span></li>
                                        <li><span class="message bg-blue">How are you!</span></li>
                                    </ul>
                                </li>
                                <li class="right">
                                    <ul class="list-unstyled chat_info">
                                        <li><small>11:10AM</small></li>
                                        <li><span class="message">Hello, Frank</span></li>
                                    </ul>
                                </li>
                                <li class="right">
                                    <ul class="list-unstyled chat_info">
                                        <li><small>11:11AM</small></li>
                                        <li><span class="message">I'm fine what about you?</span></li>
                                    </ul>
                                </li>
                                <li class="left">
                                    <img src="assets/images/xs/avatar2.jpg" class="rounded-circle" alt="">
                                    <ul class="list-unstyled chat_info">
                                        <li><small>Gary 11:13AM</small></li>
                                        <li><span class="message bg-indigo">Hello, Michael and Frank</span></li>
                                    </ul>
                                </li>
                                <li class="left">
                                    <img src="assets/images/xs/avatar5.jpg" class="rounded-circle" alt="">
                                    <ul class="list-unstyled chat_info">
                                        <li><small>Hossein 11:14AM</small></li>
                                        <li><span class="message bg-amber">Hello, team</span></li>
                                        <li><span class="message bg-amber">Please let me know your requirements.</span></li>
                                        <li><span class="message bg-amber">How would like to connect with us?</span></li>
                                    </ul>
                                </li>
                                <li class="right">
                                    <ul class="list-unstyled chat_info">
                                        <li><small>11:15AM</small></li>
                                        <li><span class="message">Hello, Hossein</span></li>
                                        <li><span class="message">Meeting on conference room at 12:00PM</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">Tim Hank</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Hossein Shams</a>
                                    <a class="dropdown-item" href="javascript:void(0);">John Smith</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter text here..." aria-label="Text input with dropdown button">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-mail-send"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Traffic</strong> Source</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <div id="chart-area-step" class="c3_chart d_traffic"></div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <span> More than 30% percent of users come from direct links. Check details page for more information.</span>
                                <div class="progress mt-4">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                </div>
                                <div class="d-flex bd-highlight mt-4">
                                    <div class="flex-fill bd-highlight">
                                        <h5 class="mb-0">21,521 <i class="zmdi zmdi-long-arrow-up"></i></h5>
                                        <small>Today</small>
                                    </div>
                                    <div class="flex-fill bd-highlight">
                                        <h5 class="mb-0">%12.35 <i class="zmdi zmdi-long-arrow-down"></i></h5>
                                        <small>Last month %</small>
                                    </div>
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