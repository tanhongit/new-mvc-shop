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


DROP TABLE IF EXISTS menu;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orther` int(11) DEFAULT NULL,
  `isVisible` tinyint(1) DEFAULT NULL,
  `menu_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS order_detail;

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO order_detail VALUES("1","1","4","1","15000");
INSERT INTO order_detail VALUES("2","1","12","10","15000");
INSERT INTO order_detail VALUES("3","2","14","1","10000");
INSERT INTO order_detail VALUES("4","3","4","1","15000");
INSERT INTO order_detail VALUES("5","3","12","1","15000");


DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
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

INSERT INTO orders VALUES("1","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","165000","2020-03-21 10:19:59","1");
INSERT INTO orders VALUES("3","Nguyen Tan","Dong Nai","Xuan Lu1ed9c","1663220339","30000","2020-03-21 10:30:22","0");


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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products VALUES("1","Hạt Hướng Dương Chất Lượng","2","1","4","1","Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.","10000","Đen","Hạt hướng dương","To","Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.","","2020-03-18","","2020-03-23","47","0","0","hat-huong-duong-1.png","hat-huong-duong-2.png","","","hat-huong-duong-chat-luong");
INSERT INTO products VALUES("2","Trà Sữa Thái Xanh (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok ok","15000","Xanh","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-18","Tân Hồng IT","2020-03-25","18","0","15","project-1.jpg","","","","tra-sua-thai-xanh-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("3","Trà Sữa Truyền Thống (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-18","","","6","0","","project-1.jpg","","","","tra-sua-truyen-thong");
INSERT INTO products VALUES("4","Trà Sữa Vị Dâu (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","33","0","","tra-sua-vi-dau-1.jpg","","","","tra-sua-vi-dau-chan-chau-pudding");
INSERT INTO products VALUES("5","Trà Sữa Vị Socola (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","33","0","","project-1.jpg","","","","tra-sua-vi-socola-chan-chau-pudding");
INSERT INTO products VALUES("6","Trà Sữa Vị Đào (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","5","0","","project-1.jpg","","","","tra-sua-vi-dao");
INSERT INTO products VALUES("7","Trà bí đao hạt é - Giải khát, thanh lọc","2","1","5","1","ok","10000","ok","ok","ok","ok","","2020-03-19","","","5","0","","project-1.jpg","","","","tra-bi-dao-hat-e");
INSERT INTO products VALUES("8","Sương Sáo","2","1","5","1","ok","10000","ok","ok","kok","ok","","2020-03-19","","","0","0","","project-1.jpg","","","","suong-sao");
INSERT INTO products VALUES("9","Cá viên chiên","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","1","0","","project-1.jpg","","","","ca-vien-chien");
INSERT INTO products VALUES("10","Tôm viên","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","0","0","","project-1.jpg","","","","tom-vien");
INSERT INTO products VALUES("11","Bò viên","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","1","0","","project-1.jpg","","","","bo-vien");
INSERT INTO products VALUES("12","Đậu hủ","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","6","0","","banh-plan-1.jpg","","","","dau-hu");
INSERT INTO products VALUES("14","Bánh Plan","3","1","2","1","<h2>Hello</h2>\n<strong><span style=\"color:#0000FF\">ửaewafes<br />\n<s>rứatewrat</s></span></strong><br />\n<br />\n<input checked=\"checked\" name=\"trsgtr\" type=\"checkbox\" value=\"1\" />eiaurhe<br />\n<input name=\"ewafe\" type=\"button\" value=\"ưeafewafewafe\" />","100","Vàng","ok","","<h2>Hello</h2>\n<strong><span style=\"color:#0000FF\">ửaewafes<br />\n<s>rứatewrat</s></span></strong><br />\n<br />\n<input checked=\"checked\" name=\"trsgtr\" type=\"checkbox\" value=\"1\" />eiaurhe<br />\n<input name=\"ewafe\" type=\"button\" value=\"ưeafewafewafe\" />","","2020-03-20","","","94","1","20","banh-plan-1.jpg","banh-plan-2.jpg","banh-plan-3.jpg","banh-plan-4.jpg","banh-plan");
INSERT INTO products VALUES("22","test","1","1","5","","ttt","0","t","t","t","ttt","Tân Hồng IT","2020-03-25","Tân Hồng IT","","0","0","0","","","","","test");
INSERT INTO products VALUES("23","êts","1","1","5","","ok","0","vàng","fraf","to","ok","Tân Hồng IT","2020-03-25","","2020-03-25","0","0","0","","","","","ets");


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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO subcategory VALUES("1","Bánh Xèo","1","1","banh-xeo");
INSERT INTO subcategory VALUES("2","Đồ Ăn Vặt","1","1","do-an-vat");
INSERT INTO subcategory VALUES("3","Trà Sữa","1","1","tra-sua");
INSERT INTO subcategory VALUES("4","Đậu & Hạt","1","1","dau-va-hat");
INSERT INTO subcategory VALUES("5","Ăn Uống & Giải Khát","1","1","an-uong-giai-khat");


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
) ENGINE=MyISAM AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","test","c4ca4238a0b923820dcc509a6f75849b","Sieu Share","1","avatar-user1-test.png","test@gmail.com","363220339","ttgr, xuân lộc, đồng nai, việt nam","2020-03-22");
INSERT INTO users VALUES("1012","18211TT2680","806ad1e1a4aa6498a4b7adaed7639293","Tân Hồng IT","0","","phuongtan12357nguyen@gmail.com","363220339","xuan lộc, đồng nai, việt nam","2020-03-24");
INSERT INTO users VALUES("1014","tan","202cb962ac59075b964b07152d234b70","Nguyen Tan","2","avatar-user1014-tan.jpg","test2@gmail.com","363220339","Xuan Lu1ed9c","2020-03-24");
INSERT INTO users VALUES("2","tanhongit","c0fb14c1843804fa722bdc4b5ec0583b","Tân Hồng IT","1","avatar-user1011-tanhongit.jpg","phuongtan12357nguyen@gmail.com","363220339","xuân lộc, đồng nai, việt nam","2020-03-24");


