<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong>Checkout</strong></h2>
                <p>Returning customer? <a href="shop-login.html">Click here to login.</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Xem Lại & Thanh Toán
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
                                        <?php foreach ($cart as $product_id => $product) { ?>
                                            <tr class="cart_table_item">
                                                <td class="product-thumbnail">
                                                    <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>">
                                                        <img width="100" height="100" alt="" class="img-responsive" src="<?php echo 'public/upload/products/' . $product['image'] ?>">
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

                                <h4>Cart Totals</h4>
                                <table cellspacing="0" class="cart-totals">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>
                                                <strong>Cart Subtotal</strong>
                                            </th>
                                            <td>
                                                <strong><span class="amount">$431</span></strong>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>
                                                Shipping
                                            </th>
                                            <td>
                                                Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <th>
                                                <strong>Order Total</strong>
                                            </th>
                                            <td>
                                                <strong><span class="amount">$431</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <hr class="tall">

                                <h4>Payment</h4>

                                <form action="" id="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked">Direct Bank Transfer
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox">Cheque Payment
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox">Paypal
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
                                    Billing Address
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="panel-body">
                                <form action="" id="" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Country</label>
                                                <select class="form-control">
                                                    <option value="">Select a country</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>First Name</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last Name</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Company Name</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Address </label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>City </label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Continue" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Shipping Address
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="panel-body">
                                <form action="" id="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked">Ship to billing address?
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Country</label>
                                                <select class="form-control">
                                                    <option value="">Select a country</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>First Name</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last Name</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Company Name</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Address </label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>City </label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Continue" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="actions-continue">
                    <input type="submit" value="Place Order" name="proceed" class="btn btn-lg btn-primary push-top">
                </div>

            </div>
            <div class="col-md-3">
                <h4>Cart Totals</h4>
                <table cellspacing="0" class="cart-totals">
                    <tbody>
                        <tr class="cart-subtotal">
                            <th>
                                <strong>Cart Subtotal</strong>
                            </th>
                            <td>
                                <strong><span class="amount">$431</span></strong>
                            </td>
                        </tr>
                        <tr class="shipping">
                            <th>
                                Shipping
                            </th>
                            <td>
                                Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
                            </td>
                        </tr>
                        <tr class="total">
                            <th>
                                <strong>Order Total</strong>
                            </th>
                            <td>
                                <strong><span class="amount">$431</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
<?php require('content/views/shared/footer.php');
