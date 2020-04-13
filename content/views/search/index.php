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
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="shorter"><strong>Search</strong></h1>
                        <p>Hiển thị <?php if ($total_rows >= 9) echo '1–9 trong '; ?><?php echo $total_rows; ?> kết quả.</p>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <form action="<?php echo PATH_URL; ?>search/" method="get">
                            <div class="input-group input-group-lg">
                                <input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div><?php if (empty($products)) { ?>
                            <h3 class="col-sm-12">Không tìm thấy kết quả phù hợp cho từ khoá trên.</h3>
                        <?php } else { ?><h3 class="col-sm-12">Có tổng cộng <?php echo $total_rows ?> kết quả phù hợp với từ
                                khóa "<?php echo $keyword ?>".</h3><?php } ?></div>
                    <hr class="tall">
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
                                            <img alt="<?=$product['product_name']?>" class="img-responsive" src="public/upload/products/<?php echo $product['img1']; ?>">
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
                <?php require('content/views/shared/sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<?php
require('content/views/shared/footer.php');
