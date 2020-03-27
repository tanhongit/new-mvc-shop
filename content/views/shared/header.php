<?php
include_once('content/models/cart.php');
$cart = cart_list();
$options = array(
	'order_by' => 'id'
);
$ccategories = get_all('categories', $options);
?>
<!DOCTYPE html>
<html>

<head>
	<base href="<?php echo PATH_URL; ?>" />
	<meta charset="utf-8">
	<title><?php echo isset($title) ? $title : 'Quán Chị Kòi'; ?></title>
	<meta name="keywords" content="Quán Chị Kòi - Phát Triển Bởi TanHongIT" />
	<meta name="description" content="Quán Chị Kòi">
	<meta name="author" content="chikoiquan.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="public/vendor/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="public/vendor/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="public/vendor/owlcarousel/owl.carousel.min.css" media="screen">
	<link rel="stylesheet" href="public/vendor/owlcarousel/owl.theme.default.min.css" media="screen">
	<link rel="stylesheet" href="public/vendor/magnific-popup/magnific-popup.css" media="screen">
	<link rel="stylesheet" href="public/css/theme.css">
	<link rel="stylesheet" href="public/css/theme-elements.css">
	<link rel="stylesheet" href="public/css/theme-blog.css">
	<link rel="stylesheet" href="public/css/theme-shop.css">
	<link rel="stylesheet" href="public/css/theme-animate.css">
	<link rel="stylesheet" href="public/vendor/rs-plugin/css/settings.css" media="screen">
	<link rel="stylesheet" href="public/vendor/circle-flip-slideshow/css/component.css" media="screen">
	<link rel="stylesheet" href="public/css/skins/default.css">
	<link rel="stylesheet" href="public/css/custom.css">
	<script src="public/vendor/modernizr/modernizr.js"></script>
</head>

<body>
	<div class="body">
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="/">
						<!-- <img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="img/logo.png"> -->
					</a>
				</div>
				<div class="search">
					<form id="searchForm" action="<?php echo PATH_URL; ?>search/" method="get">
						<div class="input-group">
							<input type="text" class="form-control search" name="keyword" id="q" placeholder="Search..." required>
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
				</div>
				<nav>
					<ul class="nav nav-pills nav-top">
						<li>
							<a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
						</li>
						<li>
							<a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
						</li>
						<li class="phone">
							<span><i class="fa fa-phone"></i>123-456-7890</span>
						</li>
					</ul>
				</nav>
				<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<div class="navbar-collapse nav-main-collapse collapse">
				<div class="container">
					<ul class="social-icons">
						<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
						<li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
						<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
					</ul>
					<nav class="nav-main mega-menu">
						<ul class="nav nav-pills nav-main" id="mainMenu">
							<li class="dropdown active">
								<a class="dropdown-toggle" href="index.php">
									Trang Chủ
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Home - Default</a></li>
									<li><a href="#">Home - Corporate <span class="tip">hot</span></a></li>
									<li><a href="#">Home - Color</a></li>
									<li><a href="#">Home - Light</a></li>
									<li><a href="#">Home - Video</a></li>
									<li><a href="#">Home - Video - Light</a></li>
									<li><a href="#">One Page Website</a></li>
									<li class="dropdown-submenu">
										<a href="#">Sliders</a>
										<ul class="dropdown-menu">
											<li><a href="#">Revolution Slider</a></li>
											<li><a href="#">Nivo Slider</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<?php foreach ($ccategories as $ccategory) : ?>
								<li class="dropdown">
									<a class="dropdown-toggle" href="shop/<?php echo $ccategory['id'] ?>-<?php echo $ccategory['slug'] ?>">
										<?= $ccategory['category_name'] ?>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<?php
										$options2 = array(
											'where' => $ccategory['id'] . '=category_id'
										);
										$ssubcategory = get_all('subcategory', $options2);
										foreach ($ssubcategory as $subcate) : ?>
											<li><a href="category/<?php echo $subcate['id'] ?>-<?php echo $subcate['slug'] ?>"><?= $subcate['subcategory_name'] ?></a></li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endforeach; ?>
							<li class="dropdown mega-menu-item mega-menu-shop">
								<a class="dropdown-toggle mobile-redirect" href="cart">
									<i class="fa fa-shopping-cart" style="font-size: 2em;"></i> Giỏ Hàng (<?php echo cart_number(); ?>)
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="mega-menu-content">
											<div class="row">
												<div class="col-md-12">
													<table cellspacing="0" class="cart">
														<tbody>
															<?php foreach ($cart as $product_id => $product_cart) { ?>
																<tr>
																	<td class="product-thumbnail">
																		<a href="product/<?php echo $product_cart['id'] . '-' . slug($product_cart['name']); ?>">
																			<img width="100" height="100" alt="" class="img-responsive" src="public/upload/products/<?php echo $product_cart['image'] ?>">
																		</a>
																	</td>
																	<td class="product-name">
																		<a href="product/<?php echo $product_cart['id'] . '-' . slug($product_cart['name']); ?>"><?php echo $product_cart['name'] ?><br><span class="amount"><strong><?php echo $product_cart['price'] ?> VNĐ</strong> - SLượng: <?php echo $product_cart['number'] ?> </span></a>
																	</td>
																	<td class="product-actions">
																		<a title="Remove this item" class="remove" href="cart/delete/<?php echo $product_cart['id']; ?>">
																			<i class="fa fa-times"></i>
																		</a>
																	</td>
																</tr>
															<?php } ?>
															<tr>
																<td class="actions" colspan="6">
																	<div class="actions-continue">
																		<form action="cart"><input type="submit" value="Xem tất cả" class="btn pull-right btn-primary"></form>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>