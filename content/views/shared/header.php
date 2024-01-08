<?php
include_once('content/models/cart.php');
$cart = cart_list();
$options = [
    'order_by' => 'id',
];
$ccategories = getAll('categories', $options);
$contact_option = [
    'where' => 'id=1',
];
$contacts = getAll('contacts', $contact_option);
foreach ($contacts as $contact) {
    $phone = preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $contact['phone']);
    $phone2 = preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $contact['phone_2']);
    $contactUrl = $contact['link_Contact'];
    $contactEmail = $contact['email'];
    $contactFacebook = $contact['link_Facebook'];
    $contactTwitter = $contact['link_Twitter'];
    $contactAddress = $contact['address'];
    $contactZalo = $contact['zalo'];
    $contactLinkedin = $contact['link_linkedin'];
    $aboutUrl = $contact['link_about'];
    $aboutFooter = $contact['about_footer'];
    $linkLogo = $contact['link_Logo'];
    $favicon = $contact['favicon'];
}
$menuFooterOptions = [
    'order_by' => 'id',
    'offset' => 15,
];
$footerMenu = getAll('menu_footers', $menuFooterOptions);
global $userNav;
$userLogin = getRecord('users', $userNav);

$link_image = $image_product ?? PATH_URL.'public/img/bang-hieu-chikoishop.jpg';

if (isset($url_product)) {
    $url_site = PATH_URL . $url_product . '/';
} else {
    $url_site = PATH_URL . 'home';
}
?>
<!DOCTYPE html>
<html>

<head>
	<base href="<?= PATH_URL; ?>" />
	<meta charset="utf-8">
	<title><?= isset($title) ? $title : 'Quán Chị Kòi'; ?></title>
	<meta name="keywords" content="Quán Chị Kòi - Phát Triển Bởi TanHongIT" />
	<meta name="description" content="Quán Chị Kòi">
	<meta name="author" content="chikoiquan.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel=icon href="<?= PATH_URL ?>public/img/<?= $favicon ?>" sizes="32x32">
	<link rel="shortcut icon" href="<?= PATH_URL ?>public/img/<?= $favicon ?>" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?= PATH_URL ?>public/img/<?= $favicon ?>">
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
	<link rel="stylesheet" href="public/vendor/rs-plugin/css/settings.min.css" media="screen">
	<link rel="stylesheet" href="public/vendor/circle-flip-slideshow/css/component.css" media="screen">
	<link rel="stylesheet" href="public/css/skins/default.css">
	<link rel="stylesheet" href="public/css/custom.css">
	<!--[if IE]>
			<link rel="stylesheet" href="public/css/ie.css">
		<![endif]-->

	<!--[if lte IE 8]>
			<script src="public/vendor/respond/respond.js"></script>
			<script src="public/vendor/excanvas/excanvas.js"></script>
		<![endif]-->
	<script src="public/vendor/modernizr/modernizr.js"></script>
	<script src="public/js/jquery-3.2.1.min.js"></script>
	<meta property="og:site_name" content="Quán Chị Kòi" />
	<meta property="og:title" content="<?= isset($title) ? $title : 'Quán Chị Kòi'; ?>" />
	<meta property="article:tag" content="<?= isset($title) ? $title : 'Quán Chị Kòi'; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= $url_site; ?>" />
	<link rel="canonical" href="<?= $url_site; ?>" />
	<meta property="article:publisher" content="https://www.facebook.com/110895717060461" />
	<meta property="og:description" content="Buôn bán các loại đồ ăn thức uống, hàng mỹ phẩm, làm đẹp,..." />
	<meta property="og:image" content="<?= $link_image; ?>" />
	<meta property="og:image:secure_url" content="<?= $link_image; ?>" />
	<meta property="og:image:width" content="700" />
	<meta property="og:image:height" content="345" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="fb:app_id" content="517386205818335" />
	<meta name="twitter:description" content="Buôn bán các loại đồ ăn thức uống, hàng mỹ phẩm, làm đẹp,..." />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?= isset($title) ? $title : 'Quán Chị Kòi'; ?>" />
	<meta name="twitter:image" content="<?= $link_image; ?>" />
</head>

<body>
	<div class="body">
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="home">
						<?php if (isset($linkLogo)) : ?>
							<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="public/img/<?= $linkLogo ?>"><?php endif; ?>
					</a>
				</div>
				<nav>
					<ul class="nav nav-pills nav-top">
						<li>
							<a href="<?= $aboutUrl ?>"><i class="fa fa-angle-right"></i>Thông tin</a>
						</li>
						<li>
							<a href="<?= $contactUrl ?>"><i class="fa fa-headphones"></i>Liên hệ</a>
						</li>
						<?php if (!isset($userLogin)) : ?>
							<li>
								<a href="register.php"><strong><i class="fa fa-sign-in"></i>Đăng ký</strong></a>
							</li>
							<li>
								<a href="admin.php"><strong><i class="fa fa-user"></i>Đăng nhập</strong></a>
							</li>
						<?php else : ?>
							<li>
								<a onclick="return confirm('Bạn có chắc muốn đăng xuất?')" href="admin.php?controller=home&action=logout"><strong><i class="fa fa-sign-out"></i>Đăng xuất</strong></a>
							</li>
						<?php endif; ?>
						<li class="phone">
							<span><i class="fa fa-phone"></i><?= $phone ?></span>
						</li>
					</ul>
				</nav>
				<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<div class="navbar-collapse nav-main-collapse collapse">
				<div class="container">
					<nav class="nav-main mega-menu">
						<ul class="nav nav-pills nav-main" id="mainMenu">
							<li class="dropdown active">
								<a class="dropdown-toggle" href="index.php">
									Trang Chủ
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="index.php?controller=product&action=all">Xem tất cả sản phẩm</a></li>
									<li><a href="feedback">Gửi phản hồi <span class="tip">Send</span></a></li>
									<li class="dropdown-submenu">
										<a href="javascript:void(0);">Về Chị Kòi Quán</a>
										<ul class="dropdown-menu">
											<li><a href="<?= $contactUrl ?>">Liên hệ</a></li>
											<li><a href="<?= $aboutUrl ?>">Thông tin về quán</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<?php foreach ($ccategories as $ccategory) : ?>
								<li class="dropdown">
									<a class="dropdown-toggle" href="shop/<?= $ccategory['id'] ?>-<?= $ccategory['slug'] ?>">
										<?= $ccategory['category_name'] ?>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<?php
                                        $options2 = [
                                            'where' => $ccategory['id'] . '=category_id',
                                        ];
							    $ssubcategory = getAll('subcategory', $options2);
							    foreach ($ssubcategory as $subcate) : ?>
											<li><a href="category/<?= $subcate['id'] ?>-<?= $subcate['slug'] ?>"><?= $subcate['subcategory_name'] ?></a></li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endforeach; ?>
							<?php if (!isset($userNav)) : ?>
								<li class="dropdown mega-menu-item mega-menu-signin signin" id="headerAccount">
									<a class="dropdown-toggle" href="admin.php">
										<i class="fa fa-user"></i> Đăng nhập
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li>
											<div class="mega-menu-content">
												<div class="row">
													<div class="col-md-12">
														<div class="signin-form">
															<span class="mega-menu-sub-title">Đăng nhập tài khoản</span>
															<form action="admin.php?controller=home&action=login" id="" role="form" method="post">
																<div class="row">
																	<div class="form-group">
																		<div class="col-md-12">
																			<label>Nhập Email của bạn</label>
																			<input autofocus type="text" name="email" value="" class="form-control input-lg" required placeholder="Nhập email hoặc username...">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-md-12">
																			<a class="pull-right" id="headerRecover" href="index.php?controller=forgot-password">(Quên mật khẩu?)</a>
																			<label>Mật khẩu</label>
																			<input type="password" name="password" value="" class="form-control input-lg" placeholder="Nhập pass...">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<button type="submit" class="btn btn-primary pull-right push-bottom">Đăng nhập</button>
																</div>
															</form>
															<p class="sign-up-info">Bạn chưa có tài khoản? <a href="#" id="headerSignUp">Đăng ký</a></p>
														</div>
														<div class="signup-form">
															<span class="mega-menu-sub-title">Tạo tài khoản mới</span>
															<form action="index.php?controller=register" id="" method="post">
																<div class="row">
																	<div class="form-group">
																		<div class="col-md-12">
																			<label>User Name</label>
																			<input type="text" required placeholder="Username" autofocus name="username" value="" class="form-control input-lg">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-md-12">
																			<label>Địa chỉ E-mail</label>
																			<input name="email" required placeholder="Nhập Email" type="text" value="" class="form-control input-lg">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="form-group">
																		<div class="col-md-6">
																			<label>Mật khẩu</label>
																			<input name="password" placeholder="Password" required type="password" value="" class="form-control input-lg">
																		</div>
																		<div class="col-md-6">
																			<label>Nhập lại mật khẩu</label>
																			<input name="confirmPassword" placeholder="Xác nhận Password" required type="password" value="" class="form-control input-lg">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<input type="submit" value="Tạo tài khoản" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
																	</div>
																</div>
															</form>
															<p class="log-in-info">Bạn đã có tài khoản? <a href="#" id="headerSignIn">Đăng nhập</a></p>
														</div>
														<div class="recover-form">
															<span class="mega-menu-sub-title">Đặt lại mật khẩu</span>
															<p>Hoàn thành mẫu dưới đây để nhận email với mã ủy quyền cần thiết để đặt lại mật khẩu của bạn.</p>
															<form action="index.php?controller=forgot-password&amp;action=request" id="" method="post">
																<div class="row">
																	<div class="form-group">
																		<div class="col-md-12">
																			<label>Địa chỉ E-mail</label>
																			<input type="text" name="email" placeholder="Nhập Email" autofocus value="" class="form-control input-lg">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<input type="submit" value="Xác nhận" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
																	</div>
																</div>
															</form>

															<p class="log-in-info">Bạn đã có tài khoản? <a href="#" id="headerRecoverCancel">Đăng nhập</a></p>
														</div>

													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
							<?php else : ?>
								<li class="dropdown mega-menu-item mega-menu-signin signin logged" id="headerAccount">
									<a class="dropdown-toggle" href="admin.php">
										<?php if (!isset($userLogin['user_avatar'])) {
										    echo '<i class="fa fa-user"></i>';
										} else {
										    echo '<img style="max-width: 25px;  border-radius: 15px 15px 15px 15px;" src="public/upload/images/' . $userLogin['user_avatar'] . '" alt="' . $userLogin['user_name'] . '">';
										} ?> <?= $userLogin['user_username'] ?>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li>
											<div class="mega-menu-content">
												<div class="row">
													<div class="col-md-6">
														<div class="user-avatar">
															<div class="img-thumbnail">
																<img src="public/upload/images/<?= $userLogin['user_avatar'] ?>" alt="<?= $userLogin['user_name'] ?>">
															</div>
															<p><strong><?= $userLogin['user_name'] ?></strong><span><?php if ($userLogin['role_id'] == 0) {
															    echo 'Khách hàng';
															} elseif ($userLogin['role_id'] == 1) {
															    echo 'Admin';
															} else {
															    echo 'Moderator';
															} ?></span></p>
														</div>
													</div>
													<div class="col-md-6">
														<ul class="list-account-options">
															<li><a href="admin.php?controller=user&action=info&user_id=<?= $userNav ?>">Tài khoản của tôi</a></li>
															<li><a href="admin.php?controller=purchase">Đơn mua của tôi</a></li>
															<li><a href="admin.php?controller=home&action=logout">Đăng xuất</a></li>
														</ul>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
							<?php endif; ?>
							<li class="dropdown mega-menu-item mega-menu-shop">
								<a class="dropdown-toggle mobile-redirect" href="cart">
									<i class="fa fa-shopping-cart"></i> Giỏ Hàng (<?= cart_number(); ?>)
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="mega-menu-content">
											<div class="row">
												<div class="col-md-12">
													<table cellspacing="0" class="cart">
														<tbody>
															<?php foreach ($cart as $productId => $product_cart) { ?>
																<tr>
																	<td class="product-thumbnail">
																		<a href="product/<?= $product_cart['id'] . '-' . slug($product_cart['name']); ?>">
																			<img width="100" height="100" alt="<?= $product_cart['name'] ?>" class="img-responsive" src="public/upload/products/<?= $product_cart['image'] ?>">
																		</a>
																	</td>
																	<td class="product-name">
																		<a href="product/<?= $product_cart['id'] . '-' . slug($product_cart['name']); ?>"><?= $product_cart['name'] ?><br><span class="amount"><strong>
																					<?php if ($product_cart['saleoff'] != 0) {
																					    echo number_format(($product_cart['price']) - (($product_cart['price'] * $product_cart['percent_off']) / 100), 0, ',', '.');
																					} else {
																					    echo number_format($product_cart['price'], 0, ',', '.');
																					} ?>
																					VNĐ</strong> - SLượng: <?= $product_cart['number'] ?> </span></a>
																	</td>
																	<td class="product-actions">
																		<a title="Remove this item" class="remove" href="cart/delete/<?= $product_cart['id']; ?>">
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
							<div class="search">
								<form id="searchForm" action="<?= PATH_URL; ?>search/" method="get">
									<div class="input-group">
										<input type="text" class="form-control search" name="keyword" id="q" placeholder="Search..." required>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>
							</div>
						</ul>
					</nav>
				</div>
			</div>
		</header>
