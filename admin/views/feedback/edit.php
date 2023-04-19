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
                    <h2>Chỉnh sửa Thông tin về phiếu phản hồi </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=feedback">Feedback</a></li>
                        <li class="breadcrumb-item active">Edit Feedback Detail</li>
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
                    <?php if ($feedback['order_id'] <> 0) : ?>
                        <div class="card">
                            <div class="header">
                                <h2><strong>Truy Xuất Dữ Liệu</strong> "Tất cả các sản phẩm trong đơn hàng" </h2>
                                <ul class="header-dropdown">
                                    <li class="dropdown"> <a href="javascript:vorder_id(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                                            <li><a href="admin.php?controller=feedback&action=product">Phản hồi về sản phẩm</a></li>
                                            <li><a href="admin.php?controller=feedback&action=order">Phản hồi về đơn hàng</a></li>
                                            <li><a href="admin.php?controller=feedback&action=other">Phản hồi khác</a></li>
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
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh đại diện</th>
                                                <th>Giá gốc</th>
                                                <th>Giá khuyến mãi</th>
                                                <th>Số lượng</th>
                                                <th>Giá Tổng SL</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh đại diện</th>
                                                <th>Giá gốc</th>
                                                <th>Giá khuyến mãi</th>
                                                <th>Số lượng</th>
                                                <th>Giá Tổng SL</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $stt = 0;
                                            $order_total = 0;
                                            foreach ($orderDetail as $product) :
                                                $stt++;
                                                if ($product["product_typeid"] == 3) {
                                                    $order_total += ($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)) * $product['quantity'];
                                                } else
                                                    $order_total += $product['product_price'] * $product['quantity'];
                                            ?>
                                                <tr>
                                                    <td><?= $stt; ?></td>
                                                    <td><a href="product/<?php echo $product['id']; ?>-<?= $product['slug'] ?>"><?php echo $product['product_name']; ?></a></td>
                                                    <td><?php if (is_file("public/upload/products/" . $product['img1'])) echo '<image src="public/upload/products/' . $product['img1'] . '?time=' . time() . '" style="max-width:50px;" />'; ?></td>
                                                    <td><?= number_format($product['product_price'], 0, ',', '.') ?></td>
                                                    <td><? if ($product['saleoff'] == 1) echo ($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)); ?></td>
                                                    <td><?= $product['quantity'] ?></td>
                                                    <td><?php if ($product["product_typeid"] == 3) {
                                                            echo number_format((($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)) * $product['quantity']), 0, ',', '.');
                                                        } else
                                                            echo number_format($product['product_price'] * $product['quantity'], 0, ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <h3 style="font-weight: bold;text-align: center;">Thành tổng tiền : <?php echo number_format($order_total, 0, ',', '.'); ?> VNĐ</h3>
                                    <h3 style="font-weight: bold; color: red; text-align: center;"><b> <?= $status[$order['status']] ?></b></h3>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($feedback['product_id'] <> 0) :  ?>
                        <div class="card">
                            <div class="header">
                                <h2><strong>Sản phẩm đã được chọn để phản hồi</strong></h2>
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
                                                <th>ID</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Giá</th>
                                                <th>Giá khuyến mãi</th>
                                                <th>Ngày tạo</th>
                                                <th>Ảnh</th>
                                                <th>Lượt xem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $product['id'] ?></td>
                                                <td><a href="admin.php?controller=product&amp;action=edit&amp;product_id=<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></a></td>
                                                <td><?php echo $product ? number_format($product['product_price'], 0, ',', '.') : 0; ?></td>
                                                <td><?php if ($product["saleoff"] == 1) echo number_format(($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)), 0, ',', '.'); ?></td>
                                                <td><?php echo $product['createDate'] ?></td>
                                                <td><?php echo '<image src="public/upload/products/' . $product['img1'] . '?time=' . time() . '" style="max-width:50px;" />'; ?></td>
                                                <td><?php echo $product['totalView'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <hr>
                <h2 style="font-weight: bold;">Phần chỉnh sửa</h2>
                <div class="col-lg-12">
                    <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=feedback&action=edit" enctype="multipart/form-data" role="form">
                        <input name="feedback_id" type="hidden" value="<?php echo $feedback ? $feedback['id'] : '0'; ?>" />
                        <h4 class="card-inside-title" style="font-weight:bold;">Họ và tên:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="name" type="text" maxlength="250" value="<?php echo $feedback ? $feedback['name'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Email:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="email" type="email" maxlength="250" value="<?php echo $feedback ? $feedback['email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nhập số điện thoại:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="phone" pattern="[0-9\.]+" type="text" maxlength="20" value="<?php echo $feedback ? $feedback['phone'] : ''; ?>" class="form-control" id="totalview" required placeholder="0123456789..." />
                                </div>
                            </div>
                        </div>
                        <h4 class="card-inside-title" style="font-weight:bold;">Nội dung:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="subject" type="text" class="form-control" id="totalview" required placeholder="Nội dung phản hồi..."><?php echo $feedback ? $feedback['subject'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <h4>Status:</h4>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="status" id="male" class="with-gap" value="1" <?php if ($feedback['status'] == "1") echo "checked"; ?>>
                                        <label for="male">Approve</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="Female" class="with-gap" <?php if ($feedback['status'] == "0") echo "checked"; ?> value="0">
                                        <label for="Female">Pending</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-primary waves-effect" type="submit">Update lại thông tin phản hồi</button>
                            <a class="btn btn-warning waves-effect" href="admin.php?controller=feedback">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>