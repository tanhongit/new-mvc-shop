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
                    <h2>Purchase</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php"><i class="zmdi zmdi-home"></i>Purchase</a></li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item">All</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <h2><?= $title ?></h2>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <?php if (empty($order_all)) echo '<h2 style="text-align: center;">Chưa có đơn hàng nào</h2>'; ?>
                    <?php foreach ($order_all as $order) :
                        $order_detail = purchase_order_detail($order['id']); ?>
                        <div class="card">
                            <div class="body">
                                <ul class="comment-reply list-unstyled">
                                    <?php foreach ($order_detail as $product) : ?>
                                        <li>
                                            <div class="icon-box"><a href="product/<?php echo $product['product_id']; ?>-<?php echo $product['slug']; ?>"><img class="img-fluid img-thumbnail" src="public/upload/products/<?= $product['img1'] ?>" style="max-width:80px;" alt="Awesome Image"></a></div>
                                            <div class="text-box">
                                                <h5><a style="color: #000;" href="product/<?php echo $product['product_id']; ?>-<?php echo $product['slug']; ?>"><?= $product['product_name'] ?></a></h5>
                                                <span class="comment-date">Số Lượng: <?= $product['quantity'] ?>.</span>
                                                <a style="padding-left: 20px;" href="product/<?php echo $product['product_id']; ?>-<?php echo $product['slug']; ?>">Giá sản phẩm: <?= $product['product_price'] ?></a>
                                                <span style="float: right;">
                                                    <form enctype="multipart/form-data" action="cart/add/<?= $product['product_id'] ?>" method="post"><input type="hidden" value="1" name="number_cart"><button type="submit" class='replybutton alert alert-success' style="padding-top: 7px; padding-bottom: 7px;">Mua lần nữa</button></form>
                                                </span>
                                                <p><?= substr($product['product_description'], 0, 200) ?></p>
                                            </div>
                                        </li>
                                        <hr>
                                    <?php endforeach; ?>
                                    <?php if ($order['status'] == 3) { ?>
                                        <span style="font-size: 1.2em; float: right; color: red;"><b> Đã hủy đơn</b></span>
                                    <?php } elseif ($order['status'] == 0) { ?>
                                        <span style="font-size: 1.2em; float: right; color: red;"><b> Đã được xác nhận</b></span>
                                    <?php } elseif ($order['status'] == 1) { ?>
                                        <span style="font-size: 1.2em; float: right; color: red;"><b> Đã nhận</b></span>
                                    <?php } elseif ($order['status'] == 2) { ?>
                                        <span style="font-size: 1.2em; float: right; color: red;"><b> Đang chuyển hàng</b></span>
                                    <?php } ?>
                                    <span style="font-size: 1.2em; float: right; padding-left: 25px; padding-right: 25px;"><b><i class="zmdi zmdi-money"></i> Tổng tiền: <?= $order['cart_total'] ?></b></span>
                                    <span>
                                        <form enctype="multipart/form-data" action="admin.php?controller=purchase&action=view&order_id=<?= $order['id'] ?>" method="post"><button type="submit" style="float: right;" class='alert alert-info'>Xem chi tiết đơn hàng này</button></form>
                                    </span>
                                    <?php if ($order['status'] == 3 || $order['status'] == 1) { ?>
                                        <span> <a href="#" style="text-decoration: none;" class='alert alert-success'>Phản hồi đơn hàng này</a></span>
                                    <?php } elseif ($order['status'] == 0) { ?>
                                        <span>
                                            <form enctype="multipart/form-data" action="admin.php?controller=purchase&action=cancell-action&order_id=<?= $order['id'] ?>" method="post">
                                                <button onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')" type="submit" class='alert alert-danger'>Hủy đơn hàng này</button>
                                            </form>
                                        </span>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>