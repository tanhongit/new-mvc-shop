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
                    <h2>Danh sách đơn hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=order">Đơn hàng</a></li>
                        <li class="breadcrumb-item active">Danh sách tất cả các đơn hàng</li>
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
                        <div class="header">
                            <h2><strong>Truy Xuất Dữ Liệu</strong> "Tất cả các đơn hàng" </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="admin.php?controller=order&action=order-cancell">Đơn bị hủy</a></li>
                                        <li><a href="admin.php?controller=order&action=order-complete">Đơn hoàn thành</a></li>
                                        <li><a href="admin.php?controller=order&action=order-noprocess">Chưa xử lý</a></li>
                                        <li><a href="admin.php?controller=order&action=order-inprocess">Đang xử lý</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>UserName | ID (User)</th>
                                            <th>Ngày đặt đơn</th>
                                            <th>Tổng giá trị đơn hàng</th>
                                            <th>Tình trạng</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>UserName | ID (User)</th>
                                            <th>Ngày đặt đơn</th>
                                            <th>Tổng giá trị đơn hàng</th>
                                            <th>Tình trạng</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($orders as $order) : ?>
                                            <tr>
                                                <td><?php echo $order['id'] ?></td>
                                                <td><a href="admin.php?controller=order&amp;action=view&amp;order_id=<?php echo $order['id']; ?>"><?php echo $order['customer']; ?></a></td>
                                                <?php if ($order['user_id'] <> 0) : $user_order = get_a_record('users', $order['user_id']) ?>
                                                    <td><?= $user_order['user_username'] ?> | <?= $user_order['id'] ?></td>
                                                <?php else : ?>
                                                    <td></td>
                                                <?php endif; ?>
                                                <td><?php echo $order['createtime'] ?></td>
                                                <td><?php echo number_format($order['cart_total'], 0, ',', '.') ?></td>
                                                <td><?php echo $status[$order['status']]; ?></td>
                                                <td><a href="admin.php?controller=order&amp;action=view&amp;order_id=<?php echo $order['id']; ?>" class="btn btn-<?php if ($order['status'] == 0) echo 'warning';
                                                                                                                                                                    elseif ($order['status'] == 1) echo 'success';
                                                                                                                                                                    else echo 'primary' ?> waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-<?php if ($order['status'] == 0) {
                                                                                                                                                                                                                                                                echo 'eyedropper';
                                                                                                                                                                                                                                                            } elseif ($order['status'] == 1) {
                                                                                                                                                                                                                                                                echo 'eye';
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                echo 'assignment-check';
                                                                                                                                                                                                                                                            } ?>"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>