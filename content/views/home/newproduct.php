<section class="top">
	<div class="container">
		<div class="row push-top" id="projects">
			<div class="col-md-12">
				<div id="popupProject" class="popup-inline-content">
					<h2>Lorem Ipsum Dolor</h2>
					<div class="row">
						<div class="col-md-6">
							<img class="img-thumbnail img-responsive" alt="" src="img/projects/project.jpg">
						</div>
						<div class="col-md-6">
							<h4>Project <strong>Description</strong></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elit mattis adipiscing. Fusce in hendrerit purus. Suspendisse potenti. Proin quis eros odio, dapibus dictum mauris. Donec nisi libero, adipiscing id pretium eget, consectetur sit amet leo. Nam at eros quis mi egestas fringilla non nec purus.</p>

							<a href="#" class="btn btn-primary">Live Preview</a> <span class="arrow hlb"></span>

							<h4 class="push-top">Services</h4>

							<ul class="list icons list-unstyled">
								<li><i class="fa fa-check"></i> Design</li>
								<li><i class="fa fa-check"></i> HTML/CSS</li>
								<li><i class="fa fa-check"></i> Javascript</li>
								<li><i class="fa fa-check"></i> Backend</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="owl-carousel owl-carousel-spaced" data-plugin-options='{"items": 4}'>
					<?php if (empty($new_products)) : ?>
						<h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
					<?php endif; ?>
					<?php foreach ($new_products as $new_product): ?>
					<div>
						<div class="portfolio-item img-thumbnail">
							<a class="thumb-info lightbox" href="#popupProject" data-plugin-options='{"type":"inline", preloader: false}'>
								<img alt="" class="img-responsive" src="img/projects/project.jpg">
								<span class="thumb-info-title">
									<span class="thumb-info-inner">SEO</span>
									<span class="thumb-info-type">Website</span>
								</span>
								<span class="thumb-info-action">
									<span title="Universal" class="thumb-info-action-icon"><i class="fa fa-eye"></i></span>
								</span>
							</a>
							<span class="product-thumb-info">
								<span class="product-thumb-info-content">
									<a href="product/<?php echo $new_product['id']; ?>-<?php echo $new_product['slug']; ?>/">
										<h4><?php echo $new_product['product_name']; ?></h4>
										<span class="price">
											<ins><span class="amount"><?php echo $new_product['product_price']; ?>VNĐ</span></ins>
										</span>
									</a>
								</span></span>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<hr class="tall" />
	</div>
</section>