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
  `user_id` int(11) NOT NULL DEFAULT 0,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'author-comment.png',
  `editTime` datetime DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_product` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO comments VALUES("1","0","Trà sữa ngon lắm bạn","2020-03-27 00:00:00","Tân","tan12357@gmail.com","0","author-comment.png","","4","","");
INSERT INTO comments VALUES("4","0","Tr&agrave; sữa ngon lắm ạ, đ&acirc;y l&agrave; vị tr&agrave; mk th&iacute;ch nhất lu&ocirc;n. Mong lần tới vẫn được nhiều thạch trong ly ạ. Cảm ơn chủ qu&aacute;n nh&eacute;!!","2020-03-27 02:18:17","Trung AV","trungtin@gmail.com","1","author-comment.png","2020-04-10 15:55:11","2","","");
INSERT INTO comments VALUES("7","2","régrest","2020-04-01 13:12:20","Tân Hồng IT","phuongtan12357nguyen@gmail.com ?> ","2","avatar-user1011-tanhongit.jpg","","2","","");
INSERT INTO comments VALUES("8","2","régrest","2020-04-01 13:15:09","Tân Hồng IT","phuongtan12357nguyen@gmail.com","3","avatar-user1011-tanhongit.jpg","","2","","");
INSERT INTO comments VALUES("9","2","Cảm ơn shop nhiều ạ","2020-04-10 19:27:57","Tân Hồng ","phuongtan12357nguyen@gmail.com","0","avatar-user1011-tanhongit.jpg","","22","","");


DROP TABLE IF EXISTS contacts;

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_Logo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO contacts VALUES("1","logo-chikoiquan-tan-hong-it.png","Tân Hồng IT","410, đường Hùng Vương, TT GIA RAY, Xuân Lộc, Đồng Nai","Việt Nam","0339908569","0941838069","test@gmail.com","javascript:void(0);","https://www.facebook.com/tanhongit","https://twitter.com/tanhongit","http://www.linkedin.com/in/tan-hong-it/","0363220339","page/1-about","Website bán đồ ăn thức uống cũng như một số các mỹ phẩm tiện dụng. Xây dựng bởi Tân Hồng IT","favicon-chikoiquan-tan-hong-it.png");


DROP TABLE IF EXISTS feedbacks;

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone` int(20) DEFAULT NULL,
  `subject` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `createTime` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `editTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_product_id` (`product_id`),
  KEY `fk_order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO feedbacks VALUES("1","Tân Hồng ","phuongtan12357nguyen@gmail.com","363220339","abc","2020-04-05 16:58:23","2","0","2","1","");
INSERT INTO feedbacks VALUES("2","Tân Hồng ","phuongtan12357nguyen@gmail.com","363220339","abc dè","2020-04-05 16:59:35","2","0","2","0","");
INSERT INTO feedbacks VALUES("3","Tân Hồng ","phuongtan12357nguyen@gmail.com","363220339","abc dè","2020-04-05 17:01:52","2","0","2","1","");
INSERT INTO feedbacks VALUES("4","Nguyen Tan","test@gmail.com","1663220339","srdxtfcghjooi","2020-04-05 17:06:46","1","0","28","1","2020-04-09 16:48:56");
INSERT INTO feedbacks VALUES("5","Nguyen Tan","test@gmail.com","1663220339","Ahihi nớp diu","2020-04-05 17:07:36","1","0","0","1","");
INSERT INTO feedbacks VALUES("6","Alibaba","alibaba@gmail.com","1234567890","aladin","2020-04-05 17:12:32","0","0","0","1","2020-04-10 23:26:58");
INSERT INTO feedbacks VALUES("7","aladin","aladin@gmail","363220339","reywsrewyre","2020-04-05 17:13:23","0","0","8","0","2020-04-10 23:26:49");
INSERT INTO feedbacks VALUES("8","y54wy54wy","ewt43wt54w@gmail.com","432542543","regresg","2020-04-05 17:23:09","0","4","0","0","");
INSERT INTO feedbacks VALUES("9","Tân Hồng ","phuongtan12357nguyen@gmail.com","12345678","Toi hong mún mua đơn hàng này nữa , bạn nàm giề được tôi","2020-04-06 14:48:32","2","3","0","1","2020-04-09 15:53:51");
INSERT INTO feedbacks VALUES("11","url","","339908569","ỷdyr","2020-04-09 00:00:00","0","0","0","1","");


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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO media VALUES("9","Logo Tân Hồng IT","logo-tan-hong-it.jpg","2020-03-24 21:18:30");
INSERT INTO media VALUES("8","Khoá học lập trình php căn bản (Gốc)","lap-trinh-php-can-ban.png","2020-03-24 21:14:02");
INSERT INTO media VALUES("10","logo old youtube","logo-old-youtube.png","2020-03-24 23:19:14");
INSERT INTO media VALUES("11","mùa corona virut ","mua-corona-virut.jpg","2020-03-29 08:38:01");
INSERT INTO media VALUES("13","vị cha đẻ của máy vi tính","cha-de-cua-may-vi-tinh.jpg","2020-04-02 01:48:11");
INSERT INTO media VALUES("14","logo chikoi quan","logo-chikoi-quan.png","2020-04-04 20:53:10");
INSERT INTO media VALUES("15","favicon chi koi quan","favicon-chi-koi-quan.png","2020-04-04 20:53:41");


DROP TABLE IF EXISTS menu_footers;

CREATE TABLE `menu_footers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO menu_footers VALUES("1","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("2","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("3","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("4","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("5","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("6","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("7","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("8","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("9","Not available","javascript:void(0);","","0");
INSERT INTO menu_footers VALUES("10","Sản phẩm nổi bật","type/1-san-pham-hot","Sản phẩm nổi bật","0");
INSERT INTO menu_footers VALUES("11","Sản phẩm mới","type/2-san-pham-moi","Sản phẩm mới","0");
INSERT INTO menu_footers VALUES("12","Đang giảm giá","type/3-san-pham-dang-giam-gia","Sản phẩn đang giảm giá","0");
INSERT INTO menu_footers VALUES("18","Text Link","javascript:void(0);","","1");
INSERT INTO menu_footers VALUES("19","Social","javascript:void(0);","Các liên kết trang mạng xã hội","1");
INSERT INTO menu_footers VALUES("20","Blog","javascript:void(0);","","1");
INSERT INTO menu_footers VALUES("21","Loại sản phẩm","javascript:void(0);","","1");


DROP TABLE IF EXISTS order_detail;

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO order_detail VALUES("1","1","4","1","15000");
INSERT INTO order_detail VALUES("2","1","12","10","15000");
INSERT INTO order_detail VALUES("3","2","14","1","10000");
INSERT INTO order_detail VALUES("4","3","4","1","15000");
INSERT INTO order_detail VALUES("5","3","12","1","15000");
INSERT INTO order_detail VALUES("6","4","6","1","15000");
INSERT INTO order_detail VALUES("7","4","2","4","15000");
INSERT INTO order_detail VALUES("8","4","4","2","15000");
INSERT INTO order_detail VALUES("9","5","14","1","100");
INSERT INTO order_detail VALUES("10","6","28","1","10000");
INSERT INTO order_detail VALUES("11","8","4","1","15000");
INSERT INTO order_detail VALUES("12","8","28","5","10000");
INSERT INTO order_detail VALUES("13","7","5","6","15000");
INSERT INTO order_detail VALUES("14","9","8","1","10000");


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
  `user_id` int(11) NOT NULL DEFAULT 0,
  `editTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO orders VALUES("1","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","165000","2020-03-21 10:19:59","","0","0","");
INSERT INTO orders VALUES("3","Nguyen Tan","Dong Nai","Xuan Lu1ed9c","1663220339","30000","2020-03-21 10:30:22","","3","2","2020-04-10 22:02:29");
INSERT INTO orders VALUES("4","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","105000","2020-03-25 13:29:57","","3","2","2020-04-10 22:07:25");
INSERT INTO orders VALUES("5","drt","-","xuan lộc, đồng nai, việt nam","0363220339","80","2020-03-25 16:21:38","","0","1","");
INSERT INTO orders VALUES("6","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","10000","2020-03-29 20:24:33","fgh","2","1","");
INSERT INTO orders VALUES("7","Nguyen Phuong Tan","Dong Nai","khu 2, thi tran gia ray, xuan loc, dong nai, vn","0363220339","10000","2020-03-29 20:25:46","fgh","2","0","");
INSERT INTO orders VALUES("8","Tân Hồng IT","Đồng Nai","xuân lộc, đồng nai, việt nam","363220339","155000","2020-04-02 10:44:06","ghtrsehts htr yht whtwsht eshtesh té tesh ts hres hsh t","0","1","");
INSERT INTO orders VALUES("9","Tân Hồng ","yth","xuân lộc, đồng nai, việt nam","363220339","10000","2020-04-10 22:06:29","","0","2","2020-04-10 22:08:28");


DROP TABLE IF EXISTS posts;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_author` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_type` int(11) NOT NULL DEFAULT 1,
  `post_modified_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalView` int(11) NOT NULL DEFAULT 0,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_author` (`post_author`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO posts VALUES("1","2","2020-04-08 05:57:42","","About","Publiced","2020-04-08 06:31:51","2","Tân Hồng ","29","about","about-1page.png");
INSERT INTO posts VALUES("7","2","2020-04-08 23:12:50","","Contact Liên hệ","Publiced","0000-00-00 00:00:00","2","","0","contact","");
INSERT INTO posts VALUES("8","2","2020-04-08 23:13:53","","Điều khoản sử dụng","Publiced","0000-00-00 00:00:00","2","","1","terms-of-use-page","");
INSERT INTO posts VALUES("6","2","2020-04-08 11:47:48","","Dmca Luật bản quyền","Trash","2020-04-08 10:25:58","1","Tân Hồng ","5","dmca-luat-ban","");
INSERT INTO posts VALUES("5","2","2020-04-09 14:03:15","Phim việt chất lượng cao<br />\n<img alt=\"\" src=\"/php-mvc-shop/public/upload/ckeditorimages/about-1page.png\" style=\"height:271px; width:482px\" />","Phim việt","Publiced","2020-04-08 10:13:10","1","Tân Hồng ","4","phim-viet","phim-viet-5post.png");
INSERT INTO posts VALUES("4","2","2020-04-08 06:06:12","ouhiuh<br />\naad<br />\n<img alt=\"\" src=\"/php-mvc-shop/public/upload/ckeditorimages/tenor.gif\" style=\"height:498px; width:498px\" /><br />\n<br />\nfhgtfrdhtrd<br />\nỵytrj","Privacy Policy","Draft","2020-04-08 06:05:46","2","Tân Hồng ","7","privacy-policy","privacy-policy-4page.jpg");
INSERT INTO posts VALUES("3","2","2020-04-08 06:17:37","Luật bản quyền dựa tr&ecirc;n luật to&agrave;n cầu<br />\n<img alt=\"\" src=\"/php-mvc-shop/public/upload/ckeditorimages/dmca-luat-ban-quyen-2page.jpg\" style=\"height:304px; width:650px\" />","Dmca Luật bản quyền","Publiced","2020-04-07 23:52:43","2","","1","dmca-luat-ban-quyen","");


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
  `editDate` datetime DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products VALUES("1","Hạt Hướng Dương Chất Lượng Giá Rẻ","2","1","4","1","Hạt hướng dương có hạt to, hàng chất lượng không hôi không có hạt lép, hạt hư.","10000","Đen","Hạt hướng dương","To","Hạt hướng dương c&oacute; hạt to, h&agrave;ng chất lượng kh&ocirc;ng h&ocirc;i kh&ocirc;ng c&oacute; hạt l&eacute;p, hạt hư.<br />\n<img alt=\"\" src=\"/php-mvc-shop/public/upload/ckeditorimages/dmca-luat-ban-quyen-2page.jpg\" style=\"height:304px; width:650px\" /><br />\n&nbsp;","","2020-03-18","Tân Hồng ","2020-04-07 00:00:00","83","0","0","hat-huong-duong-chat-luong-gia-re-1img1.jpg","hat-huong-duong-chat-luong-gia-re-1img2.jpg","","","hat-huong-duong-chat-luong-gia-re");
INSERT INTO products VALUES("2","Trà Sữa Thái Xanh (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok ok","15000","Xanh","ok","Vừa - 15k, Lớn - 20k","ok<br />\n<img alt=\"\" src=\"/php-mvc-shop/public/upload/ckeditorimages/tenor.gif\" style=\"height:498px; width:498px\" />","","2020-03-18","Tân Hồng ","2020-04-07 00:00:00","94","0","0","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img1.jpg","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img2.jpg","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img3.jpg","tra-sua-thai-xanh-chan-chau-pudding-15k-20k-2img4.jpg","tra-sua-thai-xanh-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("3","Trà Sữa Truyền Thống (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok con d&ecirc;","","2020-03-18","Tân Hồng IT","2020-03-27 00:00:00","29","0","0","tra-sua-truyen-thong-chan-chau-pudding-15k-20k-3img1.jpg","tra-sua-truyen-thong-chan-chau-pudding-15k-20k-3img2.jpg","","","tra-sua-truyen-thong-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("4","Trà Sữa Vị Dâu (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng IT","2020-03-27 00:00:00","154","0","0","tra-sua-vi-dau-1.jpg","tra-sua-vi-dau-chan-chau-pudding-15k-20k-4img2.jpg","tra-sua-vi-dau-chan-chau-pudding-15k-20k-4img3.jpg","","tra-sua-vi-dau-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("5","Trà Sữa Vị Socola (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","","","103","0","","project-1.jpg","","","","tra-sua-vi-socola-chan-chau-pudding");
INSERT INTO products VALUES("6","Trà Sữa Vị Đào (Chân Châu, Pudding) 15k, 20k","2","1","3","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng IT","2020-03-27 00:00:00","36","0","0","tra-sua-vi-dao-chan-chau-pudding-15k-20k-6img1.jpg","tra-sua-vi-dao-chan-chau-pudding-15k-20k-6img2.jpg","","","tra-sua-vi-dao-chan-chau-pudding-15k-20k");
INSERT INTO products VALUES("7","Trà bí đao hạt é - Giải khát, thanh lọc","2","1","5","1","ok","10000","ok","ok","ok","ok","","2020-03-19","","","29","0","","project-1.jpg","","","","tra-bi-dao-hat-e");
INSERT INTO products VALUES("8","Sương Sáo nhà tự làm ngon bổ dưỡng","2","1","5","1","ok","10000","ok","ok","kok","ok","","2020-03-19","Tân Hồng IT","2020-03-29 00:00:00","14","0","0","project-1.jpg","","","","suong-sao-nha-tu-lam-ngon-bo-duong");
INSERT INTO products VALUES("9","Cá viên chiên (có thể đặt theo phần tùy chọn giá)","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng ","2020-04-08 00:00:00","12","0","0","ca-vien-chien-9img1.jpg","ca-vien-chien-co-the-dat-theo-phan-tuy-chon-gia-9img2.jpg","","","ca-vien-chien-co-the-dat-theo-phan-tuy-chon-gia");
INSERT INTO products VALUES("10","Tôm viên (có thể đặt theo phần tùy chọn giá)","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng IT","2020-03-30 00:00:00","14","0","0","project-1.jpg","","","","tom-vien-co-the-dat-theo-phan-tuy-chon-gia");
INSERT INTO products VALUES("11","Bò viên (có thể đặt theo phần tùy chọn giá)","2","1","2","1","ok","15000","ok","ok","Vừa - 15k, Lớn - 20k","ok","","2020-03-19","Tân Hồng ","2020-04-08 00:00:00","19","0","0","project-1.jpg","","","","bo-vien-co-the-dat-theo-phan-tuy-chon-gia");
INSERT INTO products VALUES("24","Bánh xèo chảo - To, giòn ngon, kèm rau rừng hấp dẫn (Loại ăn mặn)","1","1","1","","Bánh xèo (Loại ăn mặn) to giòn có ăn kèm rau rừng và nước mắm ngọt nhà tự làm an toàn vệ sinh","20000","Vàng","Bột năng, tôm, giá, thịt heo,","To","bla","","2020-03-27","Tân Hồng ","2020-04-07 00:00:00","60","0","0","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img1.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img2.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img3.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man-24img4.jpg","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-man");
INSERT INTO products VALUES("22","Bánh Plan (có thể đặt theo phần tùy chọn giá)","3","1","2","","ttt","7000","Vàng","ừae","Dạng hộp tròn","ttt","","2020-03-25","Tân Hồng ","2020-04-07 00:00:00","92","1","28","banh-plan-co-the-dat-theo-phan-tuy-chon-gia-22img1.jpg","banh-plan-22img2.jpg","banh-plan-co-the-dat-theo-phan-tuy-chon-gia-22img3.jpg","banh-plan-22img4.jpg","banh-plan-co-the-dat-theo-phan-tuy-chon-gia");
INSERT INTO products VALUES("25","Bánh xèo chảo - To, giòn ngon, kèm rau rừng hấp dẫn (Loại ăn chay)","1","1","1","","ẻtyu","15000","vàngV","Bột năng, đậu hũ, giá, nấm,","To","dfgtjhu","Tân Hồng IT","2020-03-27","","2020-03-27 00:00:00","41","0","0","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-chay-25img1.jpg","","","","banh-xeo-chao-to-gion-ngon-kem-rau-rung-hap-dan-loai-an-chay");
INSERT INTO products VALUES("26","Ly bánh plan 5 cái kết hợp sữa tươi và cafe","1","1","2","","ăD","25000","Vàng","cafe, sữa tươi","To","FWEF","","2020-04-10","Tân Hồng ","2020-04-10 21:04:51","37","0","0","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe-26img1.jpg","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe-26img2.jpg","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe-26img3.jpg","","ly-banh-plan-5-cai-ket-hop-sua-tuoi-va-cafe");
INSERT INTO products VALUES("27","Pudding thạch nhiều loại khác nhau ngon mát","2","1","2","","sdfghj","4000","Nhiều màu lựa chọn","dsfg","Hũ đựng","&aacute;dfgh","","2020-03-27","Tân Hồng IT","2020-03-29 00:00:00","49","0","0","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img1.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img2.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img3.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat-27img4.jpg","pudding-thach-nhieu-loai-khac-nhau-ngon-mat");
INSERT INTO products VALUES("28","Mặt nạ ngủ Bioaqua viên thuốc","2","2","8","","ưertyuio","10000","Xanh lá","lô hội","ẻtyu","<u><strong>C&ocirc;ng dụng:</strong></u>\n<ul>\n	<li>L&ocirc; Hội: Chiết xuất từ l&ocirc; hội c&oacute; t&aacute;c dụng l&agrave;m s&aacute;ng da, dưỡng ẩm, sạch b&atilde; nhờn, đặc biệt c&oacute; khả năng kiềm dầu cao</li>\n	<li>Hoa Anh Đ&agrave;o: C&oacute; t&aacute;c dụng dưỡng ẩm, l&agrave;m mịn da, gi&uacute;p da săn chắc tăng độ đ&agrave;n hồi cho da</li>\n	<li>Việt Quất: C&oacute; t&aacute;c dụng l&agrave;m trắng, dưỡng ẩm s&acirc;u cho da lu&ocirc;n căng mịn v&agrave; tr&agrave;n đầy sức sống</li>\n</ul>\n","Tân Hồng IT","2020-03-27","","2020-03-27 00:00:00","83","0","0","mat-na-ngu-bioaqua-vien-thuoc-28img1.jpg","","","","mat-na-ngu-bioaqua-vien-thuoc");
INSERT INTO products VALUES("29","Nguyen Tan","2","3","8","","rt","0","ret","rty","rty","rtyu","Tân Hồng ","2020-04-10","","2020-04-10 20:07:40","0","0","0","","","","","nguyen-tan");
INSERT INTO products VALUES("30","Trà sữa mới","1","1","3","","trhdt","0","nâu","egsre","to","tdrhtrf","","2020-03-10","Tân Hồng ","2020-04-10 20:24:51","0","0","0","","","","","tra-sua-moi");


DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles VALUES("1","Admin","Quản trị viên quản lý hệ thống website ");
INSERT INTO roles VALUES("2","Moderator","Người phụ trợ quản lý");


DROP TABLE IF EXISTS slides;

CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text3` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text4` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_img5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_text5` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO slides VALUES("1","HomePage 1","image1-1-homepage-1.jpg","Chỉ cần đặt hàng, quán Chị Kòi sẽ lập tức chiên giòn, giao hàng tới và mời thưởng thức ngay.","image2-1-homepage-1.jpg","Nhiều loại trà sữa dành cho bạn lựa chọn thỏa thích","image3-1-homepage-1.jpg","Nhiều món ăn vặt khác nhau cho các bạn thưởng thức","","","","","1");


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
  `user_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `user_avatar` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT 'author-auto.png',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `verificationCode` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_role` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1042 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","testna","25f9e794323b453885f5181f1b624d0b","Nguyen Tan","0","avatar-user1-test.png","test@gmail.com","01663220339","Xuan Lu1ed9cccthis copy of windows is genurehh","2020-03-22 00:00:00","1","7696e44eae7b27a56dd4f0abc3996fa4","2020-04-11 03:16:19");
INSERT INTO users VALUES("1014","Tân","202cb962ac59075b964b07152d234b70","Nguyen Tan","2","avatar-user1014-tan.jpg","ph12357tan@gmail.com","89941576","3128  Doctors Drive","2020-03-24 00:00:00","1","793f470cada3b6223637ca20dc0cb9d3","");
INSERT INTO users VALUES("2","tanhongit","847265df1ad7102fe1b5d97884e51801","Tân Hồng ","1","avatar-user1011-tanhongit.jpg","phuongtan12357nguyen@gmail.com","363220339","xuân lộc, đồng nai, việt namm","2020-03-24 00:00:00","1","dd5bfe95860b785a82126bd40a7fc093","2020-04-11 03:19:09");
INSERT INTO users VALUES("4","tanhongitii","25f9e794323b453885f5181f1b624d0b","Tân Hồng IT","0","avatar-user1018-tanhongitii.jpg","meowwww@gmail.com.com","363220339","xuan lộc, đồng nai, việt nam","2020-04-11 00:00:00","0","","");
INSERT INTO users VALUES("3","eyteyt","25d55ad283aa400af464c76d713c07ad","Tân Hồng IT","2","author-auto.png","moderator@gmail.com","363220339","xuan lộc, đồng nai, việt nammmmmmmm","2020-04-07 00:00:00","1","47986eab669c010f869a7c7f288873e2","2020-04-11 03:18:25");
INSERT INTO users VALUES("1038","shtshrffgd","e807f1fcf82d132f9bb018ca6738a19f","t4greg","0","author-auto.png","phuong12357tan@gmail.com","+8489941576","3128  Doctors Drive","2020-04-11 01:35:31","0","3cb8761195802abf0656e670f73b277c","2020-04-11 01:40:43");
INSERT INTO users VALUES("1039","thtreht","e807f1fcf82d132f9bb018ca6738a19f","dtrdhtrjy","2","author-auto.png","trehytrh@gmail.com","4089941576","3128  Doctors Drive","2020-04-11 02:41:21","0","9b20629c075697db8c9c5d3b94a86f8b","");
INSERT INTO users VALUES("1040","admin","e807f1fcf82d132f9bb018ca6738a19f","Át min","1","author-auto.png","admin@gmail.com","4089941576","3128  Doctors Drive","2020-04-11 02:43:23","0","aca75e03278fa33d61ce42889ea19ed3","");
INSERT INTO users VALUES("1041","ưer","eba0fd768067afc24806607a4de3f852","ỳdtdy","0","author-auto.png","ph12rgesgresg@gmail.com","4089941576","3128  Doctors Drive","2020-04-11 02:45:37","0","8d9bce9a1dec443a338a00c3e79576f8","2020-04-11 03:20:35");


DROP TABLE IF EXISTS users_online;

CREATE TABLE `users_online` (
  `session` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''''',
  `time` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateonline` datetime NOT NULL,
  PRIMARY KEY (`session`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS visiters;

CREATE TABLE `visiters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''''',
  `time` int(11) NOT NULL DEFAULT 0,
  `browser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateonline` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



