<div role="main" class="main shop">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h2><a href="type/2-san-pham-moi">Sản Phẩm <strong>Mới</strong></a></h2>
					</div>
					<ul class="products product-thumb-info-list">
						<?php if (empty($new_products)) : ?>
							<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
						<?php endif; ?>
						<?php foreach ($new_products as $new_product) : ?>
							<li class="col-sm-3 col-xs-12 product">
								<?php if ($new_product['saleoff'] != 0) : ?>
									<a href="type/3-san-pham-dang-giam-gia">
										<span class="onsale">-<?php echo $new_product['percentoff']; ?>%</span>
									</a>
								<?php endif; ?>
								<span class="product-thumb-info">
									<form action="cart/add/<?php echo $new_product['id']; ?>" method="post">
										<input type="hidden" name="number_cart" value="1">
										<a class="add-to-cart-product"><button type="submit" href="cart/add/<?php echo $new_product['id']; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
									</form>
									<a href="product/<?php echo $new_product['id']; ?>-<?php echo $new_product['slug']; ?>">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span class="product-thumb-info-act-left"><em>Lượt xem</em></span>
												<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Chi tiết</em></span>
											</span>
											<img alt="<?=$new_product['product_name']?>" class="img-responsive" src="public/upload/products/<?php echo $new_product['img1']; ?>">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="product/<?php echo $new_product['id']; ?>-<?php echo $new_product['slug']; ?>/">
											<h4 title="<?php echo $new_product['product_name']; ?>"><?php if (strlen($new_product['product_name']) > 50) echo substr($new_product['product_name'], 0, 57) . '...';
																									else echo $new_product['product_name'];  ?></h4>
											<span class="price">
												<?php if ($new_product['saleoff'] != 0) { ?>
													<del title="<?php echo $new_product['product_name']; ?>"><span class="amount"><?php echo number_format($new_product['product_price'], 0, ',', '.');  ?></span></del>
													<ins title="<?php echo $new_product['product_name']; ?>"><span class="amount"><?php echo number_format(($new_product['product_price']) - (($new_product['product_price'] * $new_product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
												<?php } else { ?>
													<ins><span class="amount"><?php echo number_format($new_product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
												<?php } ?>
											</span>
										</a>
									</span>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
					<div style="text-align: center;" class="col-md-12">
						<a href="type/2-san-pham-moi" class="btn btn-primary">Xem thêm →</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>