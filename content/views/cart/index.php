<?php 
require_once 'content/models/cart.php';
require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">

        <hr class="tall">

        <div class="row">
            <div class="col-md-12">

                <div class="row featured-boxes">
                    <div class="col-md-12">
                    <?php require('content/views/cart/list.php'); ?>
                    </div>
                </div>

                <div class="row featured-boxes cart">
                    <div class="col-md-6">
                        <div class="featured-box featured-box-secundary default">
                            <div class="box-content">
                                <h4>Calculate Shipping</h4>
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
                                                <label>State</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Zip Code</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Update Totals" class="btn btn-default pull-right push-bottom" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="featured-box featured-box-secundary default">
                            <div class="box-content">
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

                <div class="row featured-boxes">
                    <div class="col-md-12">
                        <div class="actions-continue">
                            <input type="submit" value="Proceed to Checkout →" name="proceed" class="btn btn-lg btn-primary">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?php require('content/views/shared/footer.php'); ?>