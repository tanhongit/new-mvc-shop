<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="<?php echo PATH_URL; ?>">Home</a></li>
                <li><a href="category/<?php echo $subcategories['id'] . '-' . $subcategories['slug']; ?>"><?php echo $breadCrumb ?></a></li>
                <li class="active"><?php echo $product['product_name'] ?></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="owl-carousel" data-plugin-options='{"items": 1}'>
                            <div>
                                <div class="thumbnail">
                                    <img alt="" class="img-responsive img-rounded" src="public/upload/products/<?php echo $product['img1'] ?>">
                                </div>
                            </div>
                            <div>
                                <div class="thumbnail">
                                    <img alt="" class="img-responsive img-rounded" src="public/upload/products/<?php echo $product['img2'] ?>">
                                </div>
                            </div>
                            <div>
                                <div class="thumbnail">
                                    <img alt="" class="img-responsive img-rounded" src="public/upload/products/<?php echo $product['img3'] ?>">
                                </div>
                            </div>
                            <div>
                                <div class="thumbnail">
                                    <img alt="" class="img-responsive img-rounded" src="public/upload/products/<?php echo $product['img4'] ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="summary entry-summary">

                            <h1 class="shorter"><strong><?php echo $product['product_name'] ?></strong></h1>

                            <div class="review_num">
                                <span class="count" itemprop="ratingCount">2</span> reviews
                            </div>

                            <div title="Rated 5.00 out of 5" class="star-rating">
                                <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
                            </div>

                            <p class="price">
                                <?php if ($product['saleoff'] != 0) { ?>
                                    <del><span class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?></span></del>
                                    <ins><span class="amount"><?php echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
                                <?php } else { ?>
                                    <ins><span class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
                                <?php } ?>
                            </p>

                            <p class="taller"><?php echo $product['product_description'] ?>. </p>

                            <form enctype="multipart/form-data" method="post" class="cart">
                                <div class="quantity">
                                    <input type="button" class="minus" value="-">
                                    <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    <input type="button" class="plus" value="+">
                                </div>
                                <button href="#" class="btn btn-primary btn-icon">Add to cart</button>
                            </form>

                            <div class="product_meta">
                                <span class="posted_in">Categories: <a rel="tag" href="#">Accessories</a>, <a rel="tag" href="#">Bags</a>.</span>
                            </div>

                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="tabs tabs-product">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#productDescription" data-toggle="tab">Thông tin sản phẩm</a></li>
                                <li><a href="#productInfo" data-toggle="tab">Thông tin khác</a></li>
                                <li><a href="#productReviews" data-toggle="tab">Reviews (2)</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="productDescription">
                                    <p><?php echo $product['product_description'] ?></p>
                                </div>
                                <div class="tab-pane" id="productInfo">
                                    <table class="table table-striped push-top">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    Size:
                                                </th>
                                                <td>
                                                    <?php echo $product['product_size'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Colors
                                                </th>
                                                <td>
                                                    <?php echo $product['product_color'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Material
                                                </th>
                                                <td>
                                                    <?php echo $product['product_material'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="productReviews">
                                    <ul class="comments">
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail">
                                                    <img class="avatar" alt="" src="img/avatar-2.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>John Doe</strong>
                                                        <span class="pull-right">
                                                            <div title="Rated 5.00 out of 5" class="star-rating">
                                                                <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
                                                            </div>
                                                        </span>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr class="tall">
                                    <h4>Add a review</h4>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <form action="" id="submitReview" method="post">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label>Your name *</label>
                                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Your email address *</label>
                                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label>Review *</label>
                                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" value="Submit Review" class="btn btn-primary" data-loading-text="Loading...">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="tall" />

                <div class="row">

                    <div class="col-md-12">
                        <h2>Related <strong>Products</strong></h2>
                    </div>

                    <ul class="products product-thumb-info-list">
                        <li class="col-sm-3 col-xs-12 product">
                            <a href="shop-product-sidebar.html">
                                <span class="onsale">Sale!</span>
                            </a>
                            <span class="product-thumb-info">
                                <a href="shop-cart.html" class="add-to-cart-product">
                                    <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                </a>
                                <a href="shop-product-sidebar.html">
                                    <span class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <span class="product-thumb-info-act-left"><em>View</em></span>
                                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                        </span>
                                        <img alt="" class="img-responsive" src="img/products/product-1.jpg">
                                    </span>
                                </a>
                                <span class="product-thumb-info-content">
                                    <a href="shop-product-sidebar.html">
                                        <h4>Photo Camera</h4>
                                        <span class="price">
                                            <del><span class="amount">$325</span></del>
                                            <ins><span class="amount">$299</span></ins>
                                        </span>
                                    </a>
                                </span>
                            </span>
                        </li>
                        <li class="col-sm-3 col-xs-12 product">
                            <span class="product-thumb-info">
                                <a href="shop-cart.html" class="add-to-cart-product">
                                    <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                </a>
                                <a href="shop-product-sidebar.html">
                                    <span class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <span class="product-thumb-info-act-left"><em>View</em></span>
                                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                        </span>
                                        <img alt="" class="img-responsive" src="img/products/product-2.jpg">
                                    </span>
                                </a>
                                <span class="product-thumb-info-content">
                                    <a href="shop-product-sidebar.html">
                                        <h4>Golf Bag</h4>
                                        <span class="price">
                                            <span class="amount">$72</span>
                                        </span>
                                    </a>
                                </span>
                            </span>
                        </li>
                        <li class="col-sm-3 col-xs-12 product">
                            <span class="product-thumb-info">
                                <a href="shop-cart.html" class="add-to-cart-product">
                                    <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                </a>
                                <a href="shop-product-sidebar.html">
                                    <span class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <span class="product-thumb-info-act-left"><em>View</em></span>
                                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                        </span>
                                        <img alt="" class="img-responsive" src="img/products/product-3.jpg">
                                    </span>
                                </a>
                                <span class="product-thumb-info-content">
                                    <a href="shop-product-sidebar.html">
                                        <h4>Workout</h4>
                                        <span class="price">
                                            <span class="amount">$60</span>
                                        </span>
                                    </a>
                                </span>
                            </span>
                        </li>
                        <li class="col-sm-3 col-xs-12 product">
                            <span class="product-thumb-info">
                                <a href="shop-cart.html" class="add-to-cart-product">
                                    <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                </a>
                                <a href="shop-product-sidebar.html">
                                    <span class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <span class="product-thumb-info-act-left"><em>View</em></span>
                                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                        </span>
                                        <img alt="" class="img-responsive" src="img/products/product-4.jpg">
                                    </span>
                                </a>
                                <span class="product-thumb-info-content">
                                    <a href="shop-product-sidebar.html">
                                        <h4>Luxury bag</h4>
                                        <span class="price">
                                            <span class="amount">$199</span>
                                        </span>
                                    </a>
                                </span>
                            </span>
                        </li>
                    </ul>

                </div>

            </div>
            <div class="col-md-3">
                <?php require('content/views/shared/sidebar.php'); ?>
            </div>
        </div>
    </div>

</div>
<?php
require('content/views/shared/footer.php');
