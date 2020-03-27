DROP TABLE IF EXISTS categories;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `category_position` int(4) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_supply_id` (`supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=557 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categories VALUES("1","Ăn Uống","1","1","an-uong");
INSERT INTO categories VALUES("2","Làm Đẹp","1","2","lam-dep");
INSERT INTO categories VALUES("3","Mỹ Phẩm","1","3","my-pham");


DROP TABLE IF EXISTS comments;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_id_product` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO comments VALUES("1","4","Trà sữa ngon lắm bạn","2020-03-27 00:00:00","Tân","tan12357@gmail.com","0");
INSERT INTO comments VALUES("4","2","Trà sữa ngon lắm ạ, đây là vị trà mk thích nhất luôn. Mong lần tới vẫn được nhiều thạch trong ly ạ. Cảm ơn chủ quán nhé!!","2020-03-27 02:18:17","Trung","trungtin@gmail.com","0");


DROP TABLE IF EXISTS contacts;

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_Contact` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_Facebook` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_Twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zalo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_footer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO contacts VALUES("1","Quán Chị Kòi","410, đường Hùng Vương, TT Gia Ray, Xuân Lộc, Đồng Nai","Việt Nam","0339908569","0941838069","chaudinhnguyen92@gmail.com","","https://www.facebook.com/dung.huynh.1865","https://twitter.com/tanhongit","http://www.linkedin.com/in/tan-hong-it/","","","");


DROP TABLE IF EXISTS introduce;

CREATE TABLE `introduce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_footer` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS media;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO media VALUES("9","Logo Tân Hồng IT","logo-tan-hong-it.jpg","2020-03-24 21:18:30");
INSERT INTO media VALUES("8","Khoá học lập trình php căn bản (Gốc)","lap-trinh-php-can-ban.png","2020-03-24 21:14:02");
INSERT INTO media VALUES("10","logo old youtube","logo-old-youtube.png","2020-03-24 23:19:14");


DROP TABLE IF EXISTS menu_footers;

CREATE TABLE `menu_footers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO menu_footers VALUES("1","Not available","/home","");
INSERT INTO menu_footers VALUES("2","Not available","/home","");
INSERT INTO menu_footers VALUES("3","Not available","/home","");
INSERT INTO menu_footers VALUES("4","Not available","/home","");
INSERT INTO menu_footers VALUES("5","Not available","/home","");
INSERT INTO menu_footers VALUES("6","Not available","/home","");
INSERT INTO menu_footers VALUES("7","Not available","/home","");
INSERT INTO menu_footers VALUES("8","Not available","/home","");
INSERT INTO menu_footers VALUES("9","Not available","/home","");
INSERT INTO menu_footers VALUES("10","Not available","/home","");
INSERT INTO menu_footers VALUES("11","Not available","/home","");
INSERT INTO menu_footers VALUES("12","Not available","/home","");


DROP TABLE IF EXISTS order_detail;

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO order_detail VALUES("1","1","4","1","15000");
INSERT INTO order_detail VALUES("2","1","12","10","15000");
INSERT INTO order_detail VALUES("3","2","14","1","10000");
INSERT INTO order_detail VALUES("4","3","4","1","15000");
INSERT INTO order_detail VALUES("5","3","12","1","15000");
INSERT INTO order_detail VALUES("6","4","6","1","15000");
INSERT INTO order_detail VALUES("7","4","2","4","15000");
INSERT INTO order_detail VALUES("8","4","4","2","15000");
INSERT INTO order_detail VALUES("9","5","14","1","100");


DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_total` double NOT NULL,
  `createtime` datetime NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO orders VALUES("1","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","165000","2020-03-21 10:19:59","","1");
INSERT INTO orders VALUES("3","Nguyen Tan","Dong Nai","Xuan Lu1ed9c","1663220339","30000","2020-03-21 10:30:22","","0");
INSERT INTO orders VALUES("4","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","105000","2020-03-25 13:29:57","","0");
INSERT INTO orders VALUES("5","drt","-","xuan lộc, đồng nai, việt nam","0363220339","80","2020-03-25 16:21:38","","2");


DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products VALUES("1","Hạt Hướng Dương Chất Lượng","2","1","4","1","Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.","10000","Đen","Hạt hướng dương","To","Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.","","2020-03-18","","2020-03-23","62","0","0","hat-huong-duong-1.png","hat-huong-duong-2.png","","","hat-huong-duong-chat-luong");
INSERT INTO products VALUES("2","Trà Sữa Thái Xanh (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok ok","15000","Xanh","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-18","Tân Hồng IT","2020-03-27","42","0","0","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img1.jpg","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img2.jpg","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img3.jpg","","tra-sua-thai-xanh-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("3","Trà Sữa Truyền Thống (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok con d&ecirc;","","2020-03-18","Tân Hồng IT","2020-03-27","7","0","0","tra-sua-truyen-thong-chan-chau-pudding-15k-20k-3img1.jpg","tra-sua-truyen-thong-chan-chau-pudding-15k-20k-3img2.jpg","","","tra-sua-truyen-thong-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("4","Trà Sữa Vị Dâu (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng IT","2020-03-27","90","0","0","tra-sua-vi-dau-1.jpg","tra-sua-vi-dau-chan-chau-pudding-15k-20k-4img2.jpg","tra-sua-vi-dau-chan-chau-pudding-15k-20k-4img3.jpg","","tra-sua-vi-dau-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("5","Trà Sữa Vị Socola (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","78","0","","project-1.jpg","","","","tra-sua-vi-socola-chan-chau-pudding");
INSERT INTO products VALUES("6","Trà Sữa Vị Đào (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng IT","2020-03-27","20","0","0","tra-sua-vi-dao-chan-chau-pudding-15k-20k-6img1.jpg","tra-sua-vi-dao-chan-chau-pudding-15k-20k-6img2.jpg","","","tra-sua-vi-dao-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("7","Trà bí đao hạt é - Giải khát, thanh lọc","2","1","5","1","ok","10000","ok","ok","ok","ok","","2020-03-19","","","25","0","","project-1.jpg","","","","tra-bi-dao-hat-e");
INSERT INTO products VALUES("8","Sương Sáo","2","1","5","1","ok","10000","ok","ok","kok","ok","","2020-03-19","","","6","0","","project-1.jpg","","","","suong-sao");
INSERT INTO products VALUES("9","Cá viên chiên","2","1","2","1","ok","15","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng IT","2020-03-27","5","0","0","ca-vien-chien-9img1.jpg","","","","ca-vien-chien");
INSERT INTO products VALUES("10","Tôm viên","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","6","0","","project-1.jpg","","","","tom-vien");
INSERT INTO products VALUES("11","Bò viên","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","15","0","","project-1.jpg","","","","bo-vien");
INSERT INTO products VALUES("12","Đậu hủ","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","14","0","","banh-plan-1.jpg","","","","dau-hu");
INSERT INTO products VALUES("24","Bánh xèo chảo - To, giòn ngon, kèm rau rừng hấp dẫn (Loại ăn mặn)","1","1","1","","Bánh xèo (Loại ăn mặn) to giòn có ăn kèm rau rừng và nước mắm ngọt nhà tự làm an toàn vệ sinh","20000","Vàng","Bột năng, tôm, giá, thịt heo,","To","bla","","2020-03-27","Tân Hồng IT","2020-03-27","48","0","0","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img1.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img2.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img3.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img4.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man");
INSERT INTO products VALUES("22","Bánh Plan","3","1","2","","ttt","7000","Vàng","ừae","Dạng hộp tròn","ttt","","2020-03-25","Tân Hồng IT","2020-03-27","15","1","28","banh-plan-22img1.jpg","banh-plan-22img2.jpg","banh-plan-22img3.jpg","banh-plan-22img4.jpg","banh-plan");
INSERT INTO products VALUES("23","êts","1","1","5","","ok","0","vàng","fraf","to","ok","Tân Hồng IT","2020-03-25","","2020-03-25","0","0","0","","","","","ets");
INSERT INTO products VALUES("25","Bánh xèo chảo - To, giòn ngon, kèm rau rừng hấp dẫn (Loại ăn chay)","1","1","1","","ẻtyu","15000","vàngV","Bột năng, đậu hũ, giá, nấm,","To","dfgtjhu","Tân Hồng IT","2020-03-27","","2020-03-27","27","0","0","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-chay-25img1.jpg","","","","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-chay");
INSERT INTO products VALUES("26","Ly bánh plan 5 cái kết hợp sữa tươi và cafe","1","1","2","","ăD","25000","Vàng","cafe, sữa tươi","To","FWEF","Tân Hồng IT","2020-03-27","","2020-03-27","8","0","0","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe-26img1.jpg","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe-26img2.jpg","","","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe");
INSERT INTO products VALUES("27","Pudding thạch nhiều loại khác nhau ngon mát","1","1","2","","sdfghj","4000","Nhiều màu lựa chọn","dsfg","Hũ đựng","&aacute;dfgh","Tân Hồng IT","2020-03-27","","2020-03-27","4","0","0","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img1.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img2.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img3.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img4.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat");
INSERT INTO products VALUES("28","Mặt nạ ngủ Bioaqua viên thuốc","2","2","8","","ưertyuio","10000","Xanh lá","lô hội","ẻtyu","<u><strong>C&ocirc;ng dụng:</strong></u>\n<ul>\n	<li>L&ocirc; Hội: Chiết xuất từ l&ocirc; hội c&oacute; t&aacute;c dụng l&agrave;m s&aacute;ng da, dưỡng ẩm, sạch b&atilde; nhờn, đặc biệt c&oacute; khả năng kiềm dầu cao</li>\n	<li>Hoa Anh Đ&agrave;o: C&oacute; t&aacute;c dụng dưỡng ẩm, l&agrave;m mịn da, gi&uacute;p da săn chắc tăng độ đ&agrave;n hồi cho da</li>\n	<li>Việt Quất: C&oacute; t&aacute;c dụng l&agrave;m trắng, dưỡng ẩm s&acirc;u cho da lu&ocirc;n căng mịn v&agrave; tr&agrave;n đầy sức sống</li>\n</ul>\n","Tân Hồng IT","2020-03-27","","2020-03-27","2","0","0","mat-na-ngu-bioaqua-vien-thuoc-28img1.jpg","","","","mat-na-ngu-bioaqua-vien-thuoc");


DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles VALUES("1","Admin","Quản trị viên quản lý hệ thống website ");
INSERT INTO roles VALUES("2","Moderator","Người phụ trợ quản lý");


DROP TABLE IF EXISTS slide;

CREATE TABLE `slide` (
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



DROP TABLE IF EXISTS subcategory;

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_id` int(11) DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  KEY `fk_supply_id` (`supply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subcategory VALUES("1","Bánh Xèo","1","1","banh-xeo");
INSERT INTO subcategory VALUES("2","Đồ Ăn Vặt","1","1","do-an-vat");
INSERT INTO subcategory VALUES("3","Trà Sữa","1","1","tra-sua");
INSERT INTO subcategory VALUES("4","Đậu & Hạt","1","1","dau-va-hat");
INSERT INTO subcategory VALUES("5","Ăn Uống & Giải Khát","1","1","an-uong-giai-khat");
INSERT INTO subcategory VALUES("8","Mặt nạ dưỡng da","1","2","mat-na-duong-da");


DROP TABLE IF EXISTS supplies;

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO supplies VALUES("1","Việt Nam","");


DROP TABLE IF EXISTS types;

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO types VALUES("1","SẢN PHẨM NỔI BẬT (HOT)","","san-pham-noi-bat");
INSERT INTO types VALUES("2","SẢN PHẨM MỚI","","san-pham-moi");
INSERT INTO types VALUES("3","SẢN PHẨM GIẢM GIÁ","","san-pham-giam-gia");


DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
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
) ENGINE=MyISAM AUTO_INCREMENT=1019 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","test","c81e728d9d4c2f636f067f89cc14862c","Sieu Share","1","avatar-user1-test.png","test@gmail.com","363220339","ttgr, xuân lộc, đồng nai, việt nam","2020-03-22");
INSERT INTO users VALUES("1012","18211TT2680","806ad1e1a4aa6498a4b7adaed7639293","User tan nguyen","0","avatar-user1012-18211tt2680.png","phuongtan12357nguyen@gmail.com","363220339","xuan lộc, đồng nai, việt nam","2020-03-24");
INSERT INTO users VALUES("1014","Tân","202cb962ac59075b964b07152d234b70","Nguyen Tan","2","avatar-user1014-tan.jpg","test2@gmail.com","363220339","Xuân Lộc","2020-03-24");
INSERT INTO users VALUES("2","tanhongit","c0fb14c1843804fa722bdc4b5ec0583b","Tân Hồng IT","1","avatar-user1011-tanhongit.jpg","phuongtan12357nguyen@gmail.com","363220339","xuân lộc, đồng nai, việt nam","2020-03-24");
INSERT INTO users VALUES("1018","tanhongitii","202cb962ac59075b964b07152d234b70","Tân Hồng IT","0","avatar-user1018-tanhongitii.jpg","phuongtan12357nguvyen@gmail.com.com","363220339","xuan lộc, đồng nai, việt nam","2020-03-26");


