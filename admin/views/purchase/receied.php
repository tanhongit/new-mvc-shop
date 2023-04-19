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
                        <li class="breadcrumb-item"><a href="admin.php"><i class="zmdi zmdi-home"></i>ChiKoi</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=purchase">Purchase</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=purchase&action=Receied">Receied</a></li>
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
                    <?php if (empty($receiedOrders)) echo '<h2 style="text-align: center;">Chưa có đơn hàng nào</h2>'; ?>
                    <?php foreach ($receiedOrders as $order) :
                        $orderDetail = purchase_order_detail($order['id']); ?>
                        <div class="card">
                            <div class="body">
                                <ul class="comment-reply list-unstyled">
                                    <?php foreach ($orderDetail as $product) : ?>
                                        <li>
                                            <div class="icon-box"><a href="product/<?php echo $product['product_id']; ?>-<?php echo $product['slug']; ?>"><img class="img-fluid img-thumbnail" src="public/upload/products/<?= $product['img1'] ?>" style="max-width:80px;" alt="Awesome Image"></a></div>
                                            <div class="text-box">
                                                <h5><a style="color: #000;" href="product/<?php echo $product['product_id']; ?>-<?php echo $product['slug']; ?>"><?= number_format($product['product_price'], 0, ',', '.') ?>đ</a><span style="float: right;"><?= $status[$order['status']] ?></span></h5>
                                                <span class="comment-date">Số Lượng: <?= $product['quantity'] ?>.</span>
                                                <a style="padding-left: 20px;" href="product/<?php echo $product['product_id']; ?>-<?php echo $product['slug']; ?>">Giá sản phẩm: <?= $product['product_price'] ?></a>
                                                <span style="float: right;">
                                                    <form enctype="multipart/form-data" action="cart/add/<?= $product['product_id'] ?>" method="post"><input type="hidden" value="1" name="number_cart"><button type="submit" class='replybutton btn btn-success waves-effect' style="padding-top: 7px; padding-bottom: 7px;">Mua lần nữa</button></form>
                                                </span>
                                                <p><?= substr($product['product_description'], 0, 200) ?></p>
                                            </div>
                                        </li>
                                        <hr>
                                    <?php endforeach; ?>
                                    <span style="font-size: 1.2em; float: right; padding-left: 20px;"><b><a style="color: #fff" title="Tổng tiền" class="btn btn-primary btn-round"><i class="zmdi zmdi-money"></i> Tổng tiền: <?= number_format($order['cart_total'], 0, ',', '.') ?>đ</a></b></span>
                                    <span>
                                        <form enctype="multipart/form-data" action="admin.php?controller=purchase&action=view&order_id=<?= $order['id'] ?>" method="post"><button type="submit" style="float: right;" class='btn btn-info waves-effect'>Xem chi tiết đơn hàng này</button></form>
                                    </span>
                                    <span> <a href="admin.php?controller=feedback&action=add&order_id=<?= $order['id'] ?>" style="text-decoration: none;" class='btn btn-success waves-effect'>Phản hồi về đơn hàng này</a>
                                    </span>
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