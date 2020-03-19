<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">

        <hr class="tall">

        <div class="row">
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-6">
                        <h1 class="shorter"><strong>Shop</strong></h1>
                        <p>Showing 1–9 of 25 results.</p>
                    </div>
                </div>

                <div class="row">
                    <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                        <?php
                        foreach ($products as $product) : ?>
                            <li class="col-md-4 col-sm-6 col-xs-12 product">
                                <?php if ($product['saleoff'] != 0) : ?>
                                    <a href="shop-product-sidebar.html">
                                        <span class="onsale">-<?php echo $product['percentoff']; ?>%</span>
                                    </a>
                                <?php endif; ?>
                                <span class="product-thumb-info">
                                    <a href="shop-cart.html" class="add-to-cart-product">
                                        <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                    </a>
                                    <a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>">
                                        <span class="product-thumb-info-image">
                                            <span class="product-thumb-info-act">
                                                <span class="product-thumb-info-act-left"><em>View</em></span>
                                                <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                            </span>
                                            <img alt="" class="img-responsive" src="img/products/product-1.jpg">
                                        </span>
                                    </a>
                                    <span class="product-thumb-info-content">
                                        <a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>">
                                            <h4><?php echo $product['product_name']; ?></h4>
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
                        <?php endforeach; ?>
                    </ul>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <aside class="sidebar">

                    <form>
                        <div class="input-group input-group-lg">
                            <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <hr />

                    <h5>Tags</h5>

                    <a href="#"><span class="label label-dark">Nike</span></a>
                    <a href="#"><span class="label label-dark">Travel</span></a>
                    <a href="#"><span class="label label-dark">Sport</span></a>
                    <a href="#"><span class="label label-dark">TV</span></a>
                    <a href="#"><span class="label label-dark">Books</span></a>
                    <a href="#"><span class="label label-dark">Tech</span></a>
                    <a href="#"><span class="label label-dark">Adidas</span></a>
                    <a href="#"><span class="label label-dark">Promo</span></a>
                    <a href="#"><span class="label label-dark">Reading</span></a>
                    <a href="#"><span class="label label-dark">Social</span></a>
                    <a href="#"><span class="label label-dark">Books</span></a>
                    <a href="#"><span class="label label-dark">Tech</span></a>
                    <a href="#"><span class="label label-dark">New</span></a>

                    <hr />

                    <h5>Top Rated Products</h5>
                    <ul class="simple-post-list">
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="shop-product-sidebar.html">
                                        <img alt="" width="60" height="60" class="img-responsive" src="img/products/product-1.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="shop-product-sidebar.html">Photo Camera</a>
                                <div class="post-meta">
                                    $299
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="shop-product-sidebar.html">
                                        <img alt="" width="60" height="60" class="img-responsive" src="img/products/product-2.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="shop-product-sidebar.html">Golf Bag</a>
                                <div class="post-meta">
                                    $72
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="shop-product-sidebar.html">
                                        <img alt="" width="60" height="60" class="img-responsive" src="img/products/product-3.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="shop-product-sidebar.html">Workout</a>
                                <div class="post-meta">
                                    $60
                                </div>
                            </div>
                        </li>
                    </ul>

                </aside>
            </div>
        </div>
    </div>
</div>
<?php
require('content/views/shared/footer.php');
