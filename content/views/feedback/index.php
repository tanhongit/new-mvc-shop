<!--
    Developed by: TanHongIT
    Website: https://tanhongit.com - https://tanhongit.net
    Github: https://github.com/TanHongIT
-->
<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong>Gửi phản hồi của bạn đến Chị Kòi Quán</strong></h2>
                <?php if (isset($user_nav)) echo '<p>Bạn đang đăng nhập với người dùng: <a href="admin.php?controller=user&action=info&user_id=' . $user_nav . '"><b>' . $user_action['user_name'] . '</b></a></p>';
                else echo '<p>Bạn đã có tài khoản người dùng? <a href="admin.php">Nhấn vào đây đăng nhập.</a></p>' ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <strong>Thông tin phản hồi</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="panel-body">
                                <form action="index.php?controller=feedback" role="form" id="" method="post">
                                    <input type="hidden" name="feedback_id" value="0">
                                    <?php if ($product <> 0) { ?>
                                        <input type="hidden" class="form-control" name="product_id" value="<?= $product['id'] ?>">
                                    <?php } else echo '<input type="hidden" class="form-control" name="product_id" value="0">' ?>
                                    <?php if (!isset($user_nav)) : ?>
                                        <input type="hidden" class="form-control" name="user_id" value="0">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Họ & Tên</strong></label>
                                                    <input type="text" name="name" class="form-control" required="required" placeholder="Nhập họ và tên thật ...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label><strong>Email</strong></label>
                                                    <input type="text" name="email" required="required" class="form-control" placeholder="Nhập email của bạn..">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>SĐT để liên lạc</strong></label>
                                                    <input type="text" name="phone" class="form-control" placeholder="nhập SĐT của bạn..">
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <h3>Bạn sẽ gửi phản hồi với tư cách là người dùng: <a href="admin.php?controller=user&action=info&user_id=<?= $user_nav ?>"><b><?= $user_action['user_name'] ?></b></a></h3>
                                        <input type="hidden" class="form-control" name="user_id" value="<?= $user_nav ?>">
                                        <input type="hidden" name="name" value="<?= $user_login['user_name'] ?>" class="form-control">
                                        <input type="hidden" name="email" value="<?= $user_login['user_email'] ?>" class="form-control">
                                        <input type="hidden" value="<?= $user_login['user_phone'] ?>" name="phone" class="form-control">
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><strong>Lời nhắn - chi tiết phản hồi: </strong></label>
                                                <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Bạn hãy nhập thông tin về phản hồi của bạn vào ô này..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                        <button type="submit" class="btn btn-primary"><i class="fa  fa-check-square-o"></i> Xác nhận gửi phản hồi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php if ($product <> 0) : ?>
                    <h3>Sản phẩm bạn đã chọn để phản hồi</h3>
                    <div class="row">
                        <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                            <li class="product">
                                <?php if ($product['saleoff'] != 0) : ?>
                                    <a href="type/3-san-pham-dang-giam-gia">
                                        <span class="onsale">-<?php echo $product['percentoff']; ?>%</span>
                                    </a>
                                <?php endif; ?>
                                <span class="product-thumb-info">
                                    <form action="cart/add/<?php echo $product['id']; ?>" method="post">
                                        <input type="hidden" name="number_cart" value="1">
                                        <a class="add-to-cart-product"><button type="submit" href="cart/add/<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
                                    </form>
                                    <a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>">
                                        <span class="product-thumb-info-image">
                                            <span class="product-thumb-info-act">
                                                <span class="product-thumb-info-act-left"><em>Lượt xem</em></span>
                                                <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Chi tiết</em></span>
                                            </span>
                                            <img alt="" class="img-responsive" src="public/upload/products/<?php echo $product['img1']; ?>">
                                        </span>
                                    </a>
                                    <span class="product-thumb-info-content">
                                        <a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>">
                                            <h4 title="<?php echo $product['product_name']; ?>"><?php if (strlen($product['product_name']) > 50) echo substr($product['product_name'], 0, 57) . '...';
                                                                                                else echo $product['product_name'];  ?></h4>
                                            <span class="price">
                                                <?php if ($product['saleoff'] != 0) { ?>
                                                    <del><span class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?></span></del>
                                                    <ins><span class="amount"><?php echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
                                                <?php } else { ?>
                                                    <ins><span class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
                                                <?php } ?>
                                            </span>
                                        </a>
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
require('content/views/shared/footer.php');
