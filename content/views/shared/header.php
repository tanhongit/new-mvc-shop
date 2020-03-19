<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo PATH_URL;?>"/>
	<meta charset="utf-8">
	<title><?php echo isset($title) ? $title : 'Chị Kòi Shop'; ?></title>
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Chị Kòi ShopOnline">
	<meta name="author" content="chikoi.com">
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
					<form id="searchForm" action="<?php echo PATH_URL;?>search/" method="get">
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
								<a class="dropdown-toggle" href="index.html">
									Home
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
							<li>
								<a href="#">Ex</a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#">
									About Us
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">About Us</a></li>
									<li><a href="#">About Us - Basic</a></li>
									<li><a href="#">About Me</a></li>
								</ul>
							</li>
							<li class="dropdown mega-menu-item mega-menu-fullwidth">
								<a class="dropdown-toggle" href="#">
									Ex
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="mega-menu-content">
											<div class="row">
												<div class="col-md-3">
													<ul class="sub-menu">
														<li>
															<span class="mega-menu-sub-title">Main Features</span>
															<ul class="sub-menu">
																<li><a href="#">Pricing Tables</a></li>
																<li><a href="#">Icons</a></li>
																<li><a href="#">Animations</a></li>
															</ul>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="sub-menu">
														<li>
															<span class="mega-menu-sub-title">Ex</span>
															<ul class="sub-menu">
																<li><a href="headers-overview.html">Overview</a></li>
																<li><a href="#">Header 2</a></li>
																<li><a href="#">Header 3</a></li>
																<li><a href="#">Header 4</a></li>
																<li><a href="#">Header 5</a></li>
															</ul>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="sub-menu">
														<li>
															<span class="mega-menu-sub-title">Ex</span>
															<ul class="sub-menu">
																<li><a href="index-header-signin.html">Header - Sign In / Sign Up</a></li>
																<li><a href="index-header-logged.html">Header - Logged</a></li>
															</ul>
															<span class="mega-menu-sub-title">Footers</span>
															<ul class="sub-menu">
																<li><a href="#">Footer 1</a></li>
																<li><a href="#">Footer 2</a></li>
																<li><a href="#">Footer 3</a></li>
																<li><a href="#">Footer 4</a></li>
																<li><a href="#">Footer 5 </a></li>
															</ul>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="sub-menu">
														<li>
															<span class="mega-menu-sub-title">Admin Extension <em class="not-included">(Not Included)</em></span>
															<ul class="sub-menu">
																<li><a href="#">Forms Basic</a></li>
															</ul>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#">
									Ex
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">4 Columns</a></li>
									<li><a href="#">3 Columns</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#">
									Ex
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li class="dropdown-submenu">
										<a href="#">Shop</a>
										<ul class="dropdown-menu">
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#">Blog</a>
										<ul class="dropdown-menu">
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#">Layouts</a>
										<ul class="dropdown-menu">
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#">Extra</a>
										<ul class="dropdown-menu">
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
											<li><a href="#">Shop</a></li>
										</ul>
									</li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Shop</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#">
									Contact Us
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Shop</a></li>
									<li><a href="#">Shop</a></li>
								</ul>
							</li>
							<li class="dropdown mega-menu-item mega-menu-shop">
								<a class="dropdown-toggle mobile-redirect" href="shop-cart.html">
									<i class="fa fa-shopping-cart"></i> Cart (1) - $299
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="mega-menu-content">
											<div class="row">
												<div class="col-md-12">
													<table cellspacing="0" class="cart">
														<tbody>
															<tr>
																<td class="product-thumbnail">
																	<a href="shop-product-sidebar.html">
																		<img width="100" height="100" alt="" class="img-responsive" src="img/products/product-1.jpg">
																	</a>
																</td>
																<td class="product-name">
																	<a href="shop-product-sidebar.html">Hế Camera<br><span class="amount"><strong>$299</strong></span></a>
																</td>
																<td class="product-actions">
																	<a title="Remove this item" class="remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="actions" colspan="6">
																	<div class="actions-continue">
																		<input type="submit" value="View All" class="btn btn-default">
																		<input type="submit" value="Proceed to Checkout →" name="proceed" class="btn pull-right btn-primary">
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