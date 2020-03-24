-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 24, 2020 lúc 07:00 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chikoi`
--
CREATE DATABASE IF NOT EXISTS `chikoi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `chikoi`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `category_position` int(4) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_supply_id` (`supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=557 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `supply_id`, `category_position`, `slug`) VALUES
(1, 'Ăn Uống', 1, 1, 'an-uong'),
(2, 'Làm Đẹp', 1, 2, 'lam-dep'),
(3, 'Mỹ Phẩm', 1, 3, 'my-pham');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media`
--

INSERT INTO `media` (`id`, `media_name`, `slug`, `createDate`) VALUES
(9, 'Logo Tân Hồng IT', 'logo-tan-hong-it.jpg', '2020-03-24 21:18:30'),
(8, 'Khoá học lập trình php căn bản (Gốc)', 'lap-trinh-php-can-ban.png', '2020-03-24 21:14:02'),
(10, 'logo old youtube', 'logo-old-youtube.png', '2020-03-24 23:19:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orther` int(11) DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT NULL,
  `menu_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_total` double NOT NULL,
  `createtime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer`, `province`, `address`, `phone`, `cart_total`, `createtime`, `status`) VALUES
(1, 'Nguyen Phuong Tan', 'Dong Nai', 'khu 2, thi tran gia ray, xuan loc, dong nai, vn', '0363220339', 165000, '2020-03-21 10:19:59', 1),
(3, 'Nguyen Tan', 'Dong Nai', 'Xuan Lu1ed9c', '1663220339', 30000, '2020-03-21 10:30:22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 4, 1, 15000),
(2, 1, 12, 10, 15000),
(3, 2, 14, 1, 10000),
(4, 3, 4, 1, 15000),
(5, 3, 12, 1, 15000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_typeid` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createBy` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `editBy` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editDate` date DEFAULT NULL,
  `totalView` int(11) DEFAULT 0,
  `saleoff` tinyint(11) DEFAULT 0,
  `percentoff` int(11) DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  KEY `fk_supply_id` (`supply_id`),
  KEY `fk_type_id` (`product_typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_typeid`, `category_id`, `sub_category_id`, `supply_id`, `product_description`, `product_price`, `product_color`, `product_material`, `product_size`, `product_detail`, `createBy`, `createDate`, `editBy`, `editDate`, `totalView`, `saleoff`, `percentoff`, `img1`, `img2`, `img3`, `img4`, `slug`) VALUES
(1, 'Hạt Hướng Dương Chất Lượng', 2, 1, 4, 1, 'Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.', 10000, 'Đen', 'Hạt hướng dương', 'To', 'Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.', NULL, '2020-03-18', NULL, '2020-03-23', 47, 0, 0, 'hat-huong-duong-1.png', 'hat-huong-duong-2.png', '', '', 'hat-huong-duong-chat-luong'),
(2, 'Trà Sữa Thái Xanh (Chân Châu, Pudding) 15k, 20k', 2, 1, 3, 1, 'ok ok', 15000, 'Xanh', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', '', '2020-03-18', 'Tân Hồng IT', '2020-03-25', 18, 0, 15, 'project-1.jpg', NULL, '', '', 'tra-sua-thai-xanh-chan-chau-pudding-15k-20k'),
(3, 'Trà Sữa Truyền Thống (Chân Châu, Pudding) 15k, 20k', 2, 1, 3, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-18', NULL, NULL, 6, 0, NULL, 'project-1.jpg', NULL, '', '', 'tra-sua-truyen-thong'),
(4, 'Trà Sữa Vị Dâu (Chân Châu, Pudding) 15k, 20k', 2, 1, 3, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 33, 0, NULL, 'tra-sua-vi-dau-1.jpg', NULL, '', '', 'tra-sua-vi-dau-chan-chau-pudding'),
(5, 'Trà Sữa Vị Socola (Chân Châu, Pudding) 15k, 20k', 2, 1, 3, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 33, 0, NULL, 'project-1.jpg', NULL, '', '', 'tra-sua-vi-socola-chan-chau-pudding'),
(6, 'Trà Sữa Vị Đào (Chân Châu, Pudding) 15k, 20k', 2, 1, 3, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 5, 0, NULL, 'project-1.jpg', NULL, '', '', 'tra-sua-vi-dao'),
(7, 'Trà bí đao hạt é - Giải khát, thanh lọc', 2, 1, 5, 1, 'ok', 10000, 'ok', 'ok', 'ok', 'ok', NULL, '2020-03-19', NULL, NULL, 5, 0, NULL, 'project-1.jpg', NULL, '', '', 'tra-bi-dao-hat-e'),
(8, 'Sương Sáo', 2, 1, 5, 1, 'ok', 10000, 'ok', 'ok', 'kok', 'ok', NULL, '2020-03-19', NULL, NULL, 0, 0, NULL, 'project-1.jpg', NULL, '', '', 'suong-sao'),
(9, 'Cá viên chiên', 2, 1, 2, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 1, 0, NULL, 'project-1.jpg', NULL, '', '', 'ca-vien-chien'),
(10, 'Tôm viên', 2, 1, 2, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 0, 0, NULL, 'project-1.jpg', NULL, '', '', 'tom-vien'),
(11, 'Bò viên', 2, 1, 2, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 1, 0, NULL, 'project-1.jpg', NULL, '', '', 'bo-vien'),
(12, 'Đậu hủ', 2, 1, 2, 1, 'ok', 15000, 'ok', 'ok', 'Vừa - 15k, Lớn - 20k', 'ok', NULL, '2020-03-19', NULL, NULL, 6, 0, NULL, 'banh-plan-1.jpg', NULL, '', '', 'dau-hu'),
(14, 'Bánh Plan', 3, 1, 2, 1, '<h2>Hello</h2>\r\n<strong><span style=\"color:#0000FF\">ửaewafes<br />\r\n<s>rứatewrat</s></span></strong><br />\r\n<br />\r\n<input checked=\"checked\" name=\"trsgtr\" type=\"checkbox\" value=\"1\" />eiaurhe<br />\r\n<input name=\"ewafe\" type=\"button\" value=\"ưeafewafewafe\" />', 100, 'Vàng', 'ok', '', '<h2>Hello</h2>\r\n<strong><span style=\"color:#0000FF\">ửaewafes<br />\r\n<s>rứatewrat</s></span></strong><br />\r\n<br />\r\n<input checked=\"checked\" name=\"trsgtr\" type=\"checkbox\" value=\"1\" />eiaurhe<br />\r\n<input name=\"ewafe\" type=\"button\" value=\"ưeafewafewafe\" />', NULL, '2020-03-20', NULL, NULL, 94, 1, 20, 'banh-plan-1.jpg', 'banh-plan-2.jpg', 'banh-plan-3.jpg', 'banh-plan-4.jpg', 'banh-plan'),
(22, 'test', 1, 1, 5, NULL, 'ttt', 0, 't', 't', 't', 'ttt', 'Tân Hồng IT', '2020-03-25', 'Tân Hồng IT', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 'test'),
(23, 'êts', 1, 1, 5, NULL, 'ok', 0, 'vàng', 'fraf', 'to', 'ok', 'Tân Hồng IT', '2020-03-25', '', '2020-03-25', 0, 0, 0, NULL, NULL, NULL, NULL, 'ets');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_desc`) VALUES
(1, 'Admin', 'Quản trị viên quản lý hệ thống website '),
(2, 'Moderator', 'Người phụ trợ quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_img4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text4` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_img5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_text5` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  KEY `fk_supply_id` (`supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `supply_id`, `category_id`, `slug`) VALUES
(1, 'Bánh Xèo', 1, 1, 'banh-xeo'),
(2, 'Đồ Ăn Vặt', 1, 1, 'do-an-vat'),
(3, 'Trà Sữa', 1, 1, 'tra-sua'),
(4, 'Đậu & Hạt', 1, 1, 'dau-va-hat'),
(5, 'Ăn Uống & Giải Khát', 1, 1, 'an-uong-giai-khat');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplies`
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE IF NOT EXISTS `supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplies`
--

INSERT INTO `supplies` (`id`, `supply_name`, `logo`) VALUES
(1, 'Việt Nam', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `type_name`, `type_description`, `slug`) VALUES
(1, 'SẢN PHẨM NỔI BẬT (HOT)', NULL, 'san-pham-noi-bat'),
(2, 'SẢN PHẨM MỚI', NULL, 'san-pham-moi'),
(3, 'SẢN PHẨM GIẢM GIÁ', NULL, 'san-pham-giam-gia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT 0,
  `user_avatar` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` int(20) DEFAULT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_role` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_password`, `user_name`, `role_id`, `user_avatar`, `user_email`, `user_phone`, `user_address`, `createDate`) VALUES
(1, 'test', 'c4ca4238a0b923820dcc509a6f75849b', 'Sieu Share', 1, 'avatar-user1-test.png', 'test@gmail.com', 363220339, 'ttgr, xuân lộc, đồng nai, việt nam', '2020-03-22'),
(1012, '18211TT2680', '806ad1e1a4aa6498a4b7adaed7639293', 'Tân Hồng IT', 0, NULL, 'phuongtan12357nguyen@gmail.com', 363220339, 'xuan lộc, đồng nai, việt nam', '2020-03-24'),
(1014, 'tan', '202cb962ac59075b964b07152d234b70', 'Nguyen Tan', 2, 'avatar-user1014-tan.jpg', 'test2@gmail.com', 363220339, 'Xuan Lu1ed9c', '2020-03-24'),
(2, 'tanhongit', 'c0fb14c1843804fa722bdc4b5ec0583b', 'Tân Hồng IT', 1, 'avatar-user1011-tanhongit.jpg', 'phuongtan12357nguyen@gmail.com', 363220339, 'xuân lộc, đồng nai, việt nam', '2020-03-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
