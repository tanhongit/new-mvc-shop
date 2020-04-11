<div role="main" class="main shop">
	<div class="container">
		<hr class="tall">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h2><a href="type/3-san-pham-dang-giam-gia">Sản Phẩm Đang <strong>Giảm Giá</strong></a></h2>
					</div>
					<ul class="products product-thumb-info-list">
						<?php if (empty($saleoff_products)) : ?>
							<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
						<?php endif; ?>
						<?php foreach ($saleoff_products as $saleoff_product) : ?>
							<li class="col-sm-3 col-xs-12 product">
								<?php if ($saleoff_product['saleoff'] != 0) : ?>
									<a href="type/3-san-pham-dang-giam-gia">
										<span class="onsale">-<?php echo $saleoff_product['percentoff']; ?>%</span>
									</a>
								<?php endif; ?>
								<span class="product-thumb-info">
									<form style="text-align: center;" action="cart/add/<?php echo $saleoff_product['id']; ?>" method="post">
										<input type="hidden" name="number_cart" value="1">
										<a class="add-to-cart-product"><button type="submit" href="cart/add/<?php echo $saleoff_product['id']; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
									</form>
									<a href="product/<?php echo $saleoff_product['id']; ?>-<?php echo $saleoff_product['slug']; ?>">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span class="product-thumb-info-act-left"><em>Lượt xem</em></span>
												<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Chi tiết</em></span>
											</span>
											<img alt="<?=$saleoff_product['product_name']?>" class="img-responsive" src="public/upload/products/<?php echo $saleoff_product['img1']; ?>">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="product/<?php echo $saleoff_product['id']; ?>-<?php echo $saleoff_product['slug']; ?>/">
										<h4 title="<?php echo $saleoff_product['product_name']; ?>"><?php if (strlen($saleoff_product['product_name']) > 50) echo substr($saleoff_product['product_name'], 0, 57) . '...';
																									else echo $saleoff_product['product_name'];  ?></h4>
											<span class="price">
												<?php if ($saleoff_product['saleoff'] != 0) { ?>
													<del><span class="amount"><?php echo number_format($saleoff_product['product_price'], 0, ',', '.');  ?></span></del>
													<ins><span class="amount"><?php echo number_format(($saleoff_product['product_price']) - (($saleoff_product['product_price'] * $saleoff_product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
												<?php } else { ?>
													<ins><span class="amount"><?php echo number_format($saleoff_product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
												<?php } ?>
											</span>
										</a>
									</span>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
					<div style="text-align: center;" class="col-md-12">
						<a href="type/3-san-pham-dang-giam-gia" class="btn btn-primary">Xem thêm →</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>