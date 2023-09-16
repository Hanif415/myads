-- Adminer 4.8.1 MySQL 10.4.27-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `published_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blogs_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`) VALUES
(32,	2,	2,	'ads update again',	'ads-update-again',	'pia.jpg',	'adas',	'<p>adas</p>',	'2023-09-16 09:47:38');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1,	'Technology',	'technology'),
(2,	'Fashion',	'fashion');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `name`, `username`, `password`, `profile_photo`) VALUES
(2,	'Hanif Amrullah A',	'hanif',	'$2y$10$336khRYwzZGQKpEWbXXjV.pmgEcm7GBG0rCW3Bqg5NboMBUB1VZU2',	'https://picsum.photos/200/300'),
(3,	'Hanif Amrullah A',	'hanif2',	'$2y$10$cNFp2JKPpsWSX.PE1US8quNrDFmglxkBDjfiuLBcBFTbzbeKAdNgK',	'https://picsum.photos/200/300'),
(4,	'Hanif Amrullah Almuas',	'hanif3',	'$2y$10$nUDumXYiDTP0B8Fw9sw1fejmTNlomTE5nQgS0djtFR6mNnJPNiAyi',	'https://picsum.photos/200/300'),
(5,	'Hanif Amrullah Almuas',	'hanif4',	'$2y$10$Xzv.uVkxCZCgubFU3mTq0.KZybOuPKts2V.0kMSU24rBFvoIGv4aC',	'https://picsum.photos/200/300'),
(6,	'Hanif aMRULLAH almuharam',	'Hanma0',	'$2y$10$tRqJ2WNdYLzX7ZG8it38J.gcmS.ct6PecW.ndBikKyoo./ioGTsqK',	'https://picsum.photos/200/300'),
(7,	'Hanif Amrullah',	'233',	'$2y$10$SnaK09m04kjTRsDGy.o/UegWvU1LJU8ODVQtlPS23Y5ghjkdrbcqu',	'https://picsum.photos/200/300'),
(8,	'Hanif aMRULLAH almuharam',	'333',	'$2y$10$ig6OVJkI4NVdSlEGvdIT3eWsVP6TOp37yliKR0pmj2aGMKAkpa.vG',	'https://picsum.photos/200/300');

-- 2023-09-16 10:13:45
