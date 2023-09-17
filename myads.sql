-- Adminer 4.8.1 MySQL 10.4.27-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `category_id` int(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `published_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `blogs_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blogs_ibfk_8` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`) VALUES
(40,	2,	7,	'Bebek goreng',	'bebek-goreng',	'Screenshot (1873).png',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti voluptate hic earum quia labore quam illum cumque asperiores, voluptatum facilis doloremque dicta nemo exercitationem voluptates,...',	'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti voluptate hic earum quia labore quam illum cumque asperiores, voluptatum facilis doloremque dicta nemo exercitationem voluptates, iste iure sapiente incidunt odit itaque amet placeat quisquam. Officiis rerum laboriosam molestias corporis iusto perferendis, consectetur dolorem, incidunt, veniam dolores fuga sint inventore rem placeat. Consectetur eligendi, voluptatum voluptas, voluptates quam dolore numquam, obcaecati minus eveniet porro soluta dolor debitis cumque blanditiis a. Deleniti, voluptatibus. Autem nihil error doloribus doloremque! Ab dolor assumenda quibusdam amet nisi atque quaerat mollitia ipsum praesentium minima? Voluptates provident perferendis voluptatum odit molestias velit accusantium ut illo impedit blanditiis. Adipisci, ducimus. Vel consectetur ducimus error amet, accusantium ea quidem impedit quo obcaecati vero vitae asperiores magni incidunt facilis molestiae iusto fugit illum sint autem nostrum officiis? Facere beatae odio nisi expedita quod unde mollitia impedit provident, saepe neque magni repellat, nam laboriosam tempora, ea quo molestiae? Blanditiis fugit, in debitis deserunt sunt facilis reprehenderit iure eaque nihil minus qui accusamus maxime. Laborum iste asperiores sapiente magnam at nesciunt ipsam sunt ab officiis amet neque qui, voluptatum necessitatibus odit alias, suscipit eius obcaecati quasi. Iure obcaecati unde ab ducimus architecto repellendus, voluptatum a deserunt aliquid earum nisi est quos velit facilis. Quae, hic! Dicta autem totam fuga ullam voluptatem soluta alias, unde nesciunt debitis magnam amet non hic libero laborum cupiditate quo! Officiis, totam nostrum, voluptates dicta doloremque eaque ipsa quia temporibus architecto dolorum mollitia accusamus? Deleniti veniam temporibus ut quidem, ea saepe iure exercitationem eveniet, delectus pariatur aperiam, recusandae inventore quis aliquid nobis! Aspernatur quam natus id dolor modi, autem sint, vitae corrupti iusto sed unde velit mollitia, totam temporibus officia commodi quis. Nostrum quae qui quis ut nobis ab temporibus aliquid ea possimus? Sunt quas in id odit eos sequi commodi unde amet distinctio perferendis voluptatibus nostrum totam ab facere, sapiente excepturi soluta beatae enim, eum pariatur provident similique non atque sit? Qui totam nesciunt accusamus neque molestias ad exercitationem sapiente illum obcaecati, quis iure repellendus perferendis nam facere doloremque quas nisi, impedit quam earum quae suscipit, eveniet error. Mollitia eligendi tempora a molestiae tenetur, facere, similique id sapiente dolores doloremque architecto quo voluptates aut inventore consequuntur velit quasi corporis vel nisi possimus praesentium optio? Distinctio consectetur, quaerat maiores tenetur deserunt eum aspernatur sit, quos facere, quidem ut magnam sint expedita? Nesciunt dolore laudantium quam dolorum, quibusdam molestiae fuga magnam nulla vitae ea quia quo quas voluptatibus natus excepturi optio. Quasi eum libero dolor atque sint quo facere ipsum animi ipsam rerum accusantium amet, eius officiis aspernatur omnis dolorem et molestias cupiditate totam culpa nihil qui debitis neque? Similique inventore exercitationem accusamus molestiae maxime sapiente autem nulla quibusdam corrupti. Maxime maiores assumenda earum similique fuga architecto quo rem animi, deserunt praesentium, tempora, nisi impedit fugiat sit ad labore iusto aspernatur. Assumenda amet nostrum itaque odio natus accusamus corporis qui eum suscipit sit cum vero, doloribus optio fugit ipsam aliquid at fuga consequuntur quas placeat molestiae non necessitatibus? Perferendis optio quae id asperiores magnam officiis iste esse facere vitae ut excepturi, explicabo impedit nihil minima veritatis quia, debitis aut dolorem facilis architecto reprehenderit eos voluptatibus consequatur! Nostrum assumenda dolore earum corrupti repellendus natus ullam iusto sequi consectetur veritatis numquam fugit eaque laboriosam, perspiciatis quidem odit ducimus libero a! Sequi odit laboriosam consequatur. Expedita quia at error quibusdam ipsa ipsam, aliquam iure neque non numquam quis, consequuntur optio corrupti ex aut quisquam animi ea nesciunt molestiae laborum aspernatur rem eveniet eum quidem. Reprehenderit sequi dolores nulla est molestias minima cumque, architecto in adipisci voluptas. Aut laudantium praesentium ut doloribus maxime ad pariatur quaerat a quidem repellat, non quas qui dolorem rem asperiores, esse inventore, cum sint tempore maiores facilis officiis. Illum saepe modi molestiae mollitia ducimus. Eius aliquid ea magni accusamus nesciunt temporibus ducimus? Eaque atque quidem quo ratione animi optio vero cupiditate obcaecati natus? Repellat consequuntur sit ratione minima officia rem cupiditate vel dignissimos nobis. Omnis cumque vero modi commodi deleniti natus voluptas eveniet ipsa, nostrum placeat quidem fugiat nesciunt autem amet labore blanditiis quasi nulla unde voluptate saepe, tenetur molestiae. Distinctio soluta repudiandae hic eveniet ut quibusdam voluptatem fugit! Provident itaque aliquid illum impedit harum ducimus reprehenderit nam eligendi recusandae cupiditate aut earum mollitia sed incidunt repellendus vero, alias tenetur dicta corrupti asperiores autem qui iure repellat placeat. Deserunt assumenda perferendis nam quisquam maiores iure sit, officia dolorem cumque esse culpa quia inventore voluptas. Autem perspiciatis voluptatibus dolor amet eligendi inventore quaerat doloremque aliquam fugit atque beatae exercitationem eaque vero molestias nam praesentium placeat, minima recusandae odio. Deserunt praesentium delectus ex optio! Commodi eveniet dolorem qui voluptas, fuga quas veritatis distinctio. Doloremque illo ad possimus porro pariatur a, dignissimos perspiciatis excepturi vero voluptatem incidunt repudiandae consequatur asperiores quibusdam quidem consectetur, debitis aliquam inventore voluptatum sint. Quo commodi harum perferendis, suscipit laborum a iure eum perspiciatis ad at voluptatum.</p><p><br></p>',	'2023-09-17 09:39:04');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(7,	'Teknologi',	'teknologi'),
(8,	'Fashion',	'fashion'),
(9,	'Nature',	'nature');

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

-- 2023-09-17 09:39:47
