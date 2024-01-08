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
						<?php if (empty($saleoffProducts)) : ?>
							<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
						<?php endif; ?>
						<?php foreach ($saleoffProducts as $saleoffProduct) : ?>
							<li class="col-sm-3 col-xs-12 product">
								<?php if ($saleoffProduct['saleoff'] != 0) : ?>
									<a href="type/3-san-pham-dang-giam-gia">
										<span class="onsale">-<?= $saleoffProduct['percentoff']; ?>%</span>
									</a>
								<?php endif; ?>
								<span class="product-thumb-info">
									<form style="text-align: center;" action="cart/add/<?= $saleoffProduct['id']; ?>" method="post">
										<input type="hidden" name="number_cart" value="1">
										<a class="add-to-cart-product"><button type="submit" href="cart/add/<?= $saleoffProduct['id']; ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
									</form>
									<a href="product/<?= $saleoffProduct['id']; ?>-<?= $saleoffProduct['slug']; ?>">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span class="product-thumb-info-act-left"><em>Lượt xem</em></span>
												<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Chi tiết</em></span>
											</span>
											<img alt="<?=$saleoffProduct['product_name']?>" class="img-responsive" src="public/upload/products/<?= $saleoffProduct['img1']; ?>">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="product/<?= $saleoffProduct['id']; ?>-<?= $saleoffProduct['slug']; ?>/">
										<h4 title="<?= $saleoffProduct['product_name']; ?>"><?php if (strlen($saleoffProduct['product_name']) > 50) {
										    echo substr($saleoffProduct['product_name'], 0, 57) . '...';
										} else {
										    echo $saleoffProduct['product_name'];
										}  ?></h4>
											<span class="price">
												<?php if ($saleoffProduct['saleoff'] != 0) { ?>
													<del><span class="amount"><?= number_format($saleoffProduct['product_price'], 0, ',', '.');  ?></span></del>
													<ins><span class="amount"><?= number_format(($saleoffProduct['product_price']) - (($saleoffProduct['product_price'] * $saleoffProduct['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
												<?php } else { ?>
													<ins><span class="amount"><?= number_format($saleoffProduct['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
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
