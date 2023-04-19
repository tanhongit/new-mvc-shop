<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong>Thủ tục thanh toán và đặt hàng</strong></h2>
                <?php if (!isset($userNav)) echo '<p>Phản hồi của khách hàng? <a href="admin.php">Nhấn vào đây để đăng nhập.</a></p>';
                else echo '<p>Phản hồi của Bạn? <strong><a href="index.php&controller=feedback">Nhấn vào đây để gửi phản hồi.</a></strong></p>' ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <strong>Xem Lại & Thanh Toán</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="panel-body">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">
                                                &nbsp;
                                            </th>
                                            <th class="product-name">
                                                Sản Phẩm
                                            </th>
                                            <th class="product-price">
                                                Giá
                                            </th>
                                            <th class="product-quantity">
                                                Số Lượng
                                            </th>
                                            <th class="product-subtotal">
                                                Tổng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cart as $productId => $product) { ?>
                                            <tr class="cart_table_item">
                                                <td class="product-thumbnail">
                                                    <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>">
                                                        <img width="100" height="100" alt="<?=$product['name']?>" class="img-responsive" src="<?php echo 'public/upload/products/' . $product['image'] ?>">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>"><?php echo $product['name'] ?></a>
                                                </td>
                                                <td class="product-price">
                                                    <?php if ($product["typeid"] == 3) : ?>
                                                        <span class="amount"><?php echo $product ? number_format(($product['price']) - ($product['price']) * ($product['percent_off']) / 100, 0, ',', '.') : 0; ?> VNĐ</span>
                                                    <?php else : ?>
                                                        <span class="amount"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="product-quantity">
                                                    <?php echo $product['number']; ?>
                                                </td>
                                                <td class="product-subtotal">
                                                    <?php if ($product["typeid"] == 3) : ?>
                                                        <span class="amount"><?php echo number_format((($product['price']) - ($product['price']) * ($product['percent_off']) / 100) * $product['number'], 0, ',', '.') ?> VNĐ</span>
                                                    <?php else : ?>
                                                        <span class="amount"><?php echo number_format($product['price'] * $product['number'], 0, ',', '.') ?> VNĐ</span>
                                                    <?php endif ?>
                                                </td>
                                            </tr><?php } ?>
                                    </tbody>
                                </table>
                                <hr class="tall">
                                <h4>Thống kê tổng giỏ hàng</h4>
                                <table cellspacing="0" class="cart-totals">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>
                                                <strong>Tổng số sản phẩm</strong>
                                            </th>
                                            <td>
                                                <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <th>
                                                <strong>Tổng giá trị giỏ hàng</strong>
                                            </th>
                                            <td>
                                                <strong><span class="amount"><?php echo number_format(cart_total(), 0, ',', '.'); ?> VNĐ</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="tall">
                                <h3 style="text-align: center;"><strong>Lưu ý đặt hàng và thanh toán</strong></h3>
                                <p><strong>Quán mình chỉ hỗ trợ khách ăn uống tại quán và Free Shipping nằm trong phạm vi bán kính 5km</strong>, Nếu quý khách có đặt những sản phẩm nằm trong danh mục <strong>Ăn Uống</strong> mà có địa chỉ giao hàng <strong>vượt quá 10km</strong> thì xin quý khách có thể thông cảm và cho phép quán được chân thành xin lỗi vì không thể giao hàng tới được ạ!</p>
                                <p>Đối với các sản phẩm về Làm đẹp và mĩ phẩm,...(Nằm ngoài danh mục <strong>Ăn Uống</strong>) thì Quán mình vẫn hỗ trợ Free Shipping nằm trong phạm vi bán kính 10km và Ship COD Toàn Quốc ạ!</p>
                                <form action="" id="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked">Chuyển tiền khi nhận hàng - Ship COD
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <strong>Địa chỉ giao hàng</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="panel-body">
                                <form action="index.php?controller=cart&amp;action=checkout" role="form" id="" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Quốc gia</label>
                                                <select class="form-control">
                                                    <option value="">Việt Nam</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (!isset($userNav)) : ?>
                                        <input type="hidden" name="user_id" value="0">
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
                                                    <label><strong>Tỉnh/ Thành Phố</strong></label>
                                                    <input type="text" name="province" required="required" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>SĐT để liên lạc</strong></label>
                                                    <input type="text" name="phone" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Địa chỉ</strong> </label>
                                                    <input type="text" name="address" required="required" class="form-control" placeholder="Mong các bạn nhập chi tiết địa chỉ ạ...">
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <input type="hidden" name="user_id" value="<?= $userNav ?>">
                                        <h3>Thông tin dưới đây tự động được thêm từ tài khoản của bạn. Bạn có thể chỉnh sửa nếu thông tin bị sai lệch!</h3>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Họ & Tên</strong></label>
                                                    <input type="text" name="name" value="<?= $user_login['user_name'] ?>" class="form-control" required="required" placeholder="Nhập họ và tên thật ...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label><strong>Tỉnh/ Thành Phố</strong></label>
                                                    <input type="text" name="province" required="required" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>SĐT để liên lạc</strong></label>
                                                    <input type="text" value="<?= $user_login['user_phone'] ?>" name="phone" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Địa chỉ </strong></label>
                                                    <input type="text" name="address" value="<?= $user_login['user_address'] ?>" required="required" class="form-control" placeholder="Mong các bạn nhập chi tiết địa chỉ ạ...">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><strong>Lời nhắn - ghi chú đơn hàng: </strong></label>
                                                <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Ghi lưu ý dành cho người bán...(Bạn có thể thêm thông tin số lượng, kích cỡ,...về các sản phẩm bạn muốn đặt hàng đến cho mình để mình sắp xếp giao hàng cho bạn.)"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input name="cart_total" type="hidden" value="<?php echo cart_total() ? cart_total() : '0'; ?>" />
                                    <div class="form-group" style="text-align: center">
                                        <button type="submit" class="btn btn-primary"><i class="fa  fa-check-square-o"></i> Đặt hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Tổng số giỏ hàng</h4>
                <table cellspacing="0" class="cart-totals">
                    <tbody>
                        <tr class="cart-subtotal">
                            <th>
                                <strong>Tổng số sản phẩm</strong>
                            </th>
                            <td>
                                <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                            </td>
                        </tr>
                        <tr class="total">
                            <th>
                                <strong>Tổng giá trị giỏ hàng</strong>
                            </th>
                            <td>
                                <strong><span class="amount"><?php echo number_format(cart_total(), 0, ',', '.'); ?> VNĐ</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require('content/views/shared/footer.php');
