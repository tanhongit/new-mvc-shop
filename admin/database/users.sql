-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 19, 2020 lúc 06:35 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.4.0

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_password`, `user_name`, `role_id`, `user_avatar`, `user_email`, `user_phone`, `user_address`, `createDate`, `verified`, `verificationCode`, `editTime`) VALUES
(1, 'testna', '25f9e794323b453885f5181f1b624d0b', 'Nguyen Tan', 0, 'avatar-user1-test.png', 'test@gmail.com', '01663220339', 'Xuan Lu1ed9cccthis copy of windows is genurehh', '2020-03-22 00:00:00', 0, '0c2bae3b44c3c49553714688df3dbd05', '2020-04-12 04:57:09'),
(1014, 'Tân', '202cb962ac59075b964b07152d234b70', 'Nguyen Tan', 2, 'avatar-user1014-tan.jpg', 'ph12357tan@gmail.com', '89941576', '3128  Doctors Drive', '2020-03-24 00:00:00', 1, '793f470cada3b6223637ca20dc0cb9d3', NULL),
(2, 'tanhongit', '847265df1ad7102fe1b5d97884e51801', 'Tân Hồng ', 1, 'avatar-user1011-tanhongit.jpg', 'phuongtan12357nguyen@gmail.com', '363220339', 'xuân lộc, đồng nai, việt namm', '2020-03-24 00:00:00', 1, 'dd5bfe95860b785a82126bd40a7fc093', '2020-04-13 11:46:18'),
(4, 'tanhongitii', '25f9e794323b453885f5181f1b624d0b', 'Tân Hồng IT', 0, 'avatar-user1018-tanhongitii.jpg', 'meowwww@gmail.com.com', '363220339', 'xuan lộc, đồng nai, việt nam', '2020-04-11 00:00:00', 0, NULL, NULL),
(3, 'eyteyt', '25d55ad283aa400af464c76d713c07ad', 'Tân Hồng IT', 2, 'author-auto.png', 'moderator@gmail.com', '363220339', 'xuan lộc, đồng nai, việt nammmmmmmm', '2020-04-07 00:00:00', 1, '47986eab669c010f869a7c7f288873e2', '2020-04-11 03:18:25'),
(1038, 'shtshrffgd', 'e807f1fcf82d132f9bb018ca6738a19f', 't4greg', 0, 'author-auto.png', 'phuong12357tan@gmail.com', '+8489941576', '3128  Doctors Drive', '2020-04-02 01:35:31', 0, '3cb8761195802abf0656e670f73b277c', '2020-04-11 01:40:43'),
(1039, 'thtreht', 'e807f1fcf82d132f9bb018ca6738a19f', 'dtrdhtrjy', 2, 'author-auto.png', 'trehytrh@gmail.com', '4089941576', '3128  Doctors Drive', '2020-04-11 02:41:21', 0, '9b20629c075697db8c9c5d3b94a86f8b', NULL),
(1040, 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 'Át min', 1, 'author-auto.png', 'admin@gmail.com', '4089941576', '3128  Doctors Drive', '2020-04-11 02:43:23', 0, 'aca75e03278fa33d61ce42889ea19ed3', NULL),
(1041, 'ưer', 'eba0fd768067afc24806607a4de3f852', 'ỳdtdy', 0, 'author-auto.png', 'ph12rgesgresg@gmail.com', '4089941576', '3128  Doctors Drive', '2020-04-11 02:45:37', 0, '8d9bce9a1dec443a338a00c3e79576f8', '2020-04-11 03:20:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
