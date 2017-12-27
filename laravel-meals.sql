-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2017 at 08:15 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-meals`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `language_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_deleted_at_index` (`deleted_at`),
  KEY `101262_5a4287355c4b1` (`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`, `language_id`) VALUES
(1, 'Hladna predjela', 'hladna-predjela', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(2, 'Topla predjela', 'topla-predjela', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(3, 'Kruh i peciva', 'kruh-i-peciva', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(4, 'Juhe', 'juhe', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(5, 'Salate', 'salate', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(6, 'Id voluptas a aut voluptatem.', 'sequi-quis-cupiditate-molestias-autem-ea-laudantium', NULL, NULL, NULL, 2),
(7, 'Incidunt recusandae vitae quas qui.', 'ullam-voluptatem-fugit-libero-provident-doloremque', NULL, NULL, NULL, 2),
(8, 'Similique expedita dolorum cupiditate non consequatur vel.', 'accusantium-sed-necessitatibus-deleniti-est', NULL, NULL, NULL, 2),
(9, 'Officiis id sit dolore assumenda quia possimus.', 'dolorum-magnam-dignissimos-perspiciatis-labore-voluptas-mollitia-et', NULL, NULL, NULL, 2),
(10, 'Dolorum quibusdam dolor sed et aut voluptas ut ea.', 'quo-ducimus-qui-odit-dignissimos-qui-qui-in', NULL, NULL, NULL, 1),
(11, 'Tempora delectus qui quam officiis enim.', 'velit-occaecati-similique-voluptatem-saepe-est', NULL, NULL, NULL, 1),
(12, 'Saepe temporibus rerum quasi numquam nobis ea eum.', 'ratione-adipisci-officiis-illo-ut-hic-tenetur-quo-rerum', NULL, NULL, NULL, 2),
(13, 'Eius sit animi in reiciendis dignissimos.', 'velit-quis-consequuntur-aperiam-porro-voluptates', NULL, NULL, NULL, 3),
(14, 'Aut cum officiis eaque quod laudantium fugit.', 'velit-qui-incidunt-nihil', NULL, NULL, NULL, 1),
(15, 'Omnis excepturi ipsam nisi dignissimos debitis.', 'et-minima-ratione-et-iste-aut-adipisci-et', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `language_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredients_deleted_at_index` (`deleted_at`),
  KEY `101264_5a4287c0e6606` (`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`, `language_id`) VALUES
(1, 'Krumpir', 'krumpir', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(2, 'Riža', 'riza', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(3, 'Sol', 'sol', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(4, 'Šećer', 'secer', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(5, 'Brašno', 'brasno', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(6, 'esse', 'consequuntur-et-nulla-eos-nesciunt-consequatur', NULL, NULL, NULL, 1),
(7, 'velit', 'eligendi-architecto-iusto-provident-dicta-ullam-et', NULL, NULL, NULL, 1),
(8, 'vel', 'qui-veniam-nam-cumque-voluptates', NULL, NULL, NULL, 2),
(9, 'qui', 'officiis-distinctio-consequatur-doloribus-qui-minima-non', NULL, NULL, NULL, 1),
(10, 'et', 'sit-distinctio-et-veritatis-voluptas-culpa-eum-at', NULL, NULL, NULL, 3),
(11, 'alias', 'praesentium-molestiae-aspernatur-molestias-nihil-aut-aspernatur-dolore', NULL, NULL, NULL, 1),
(12, 'aut', 'voluptates-nemo-ea-aperiam', NULL, NULL, NULL, 2),
(13, 'reprehenderit', 'quibusdam-voluptatum-aspernatur-optio-velit', NULL, NULL, NULL, 3),
(14, 'neque', 'id-iusto-sunt-eius-reprehenderit-iste-consequuntur', NULL, NULL, NULL, 3),
(15, 'quibusdam', 'facere-odio-consequatur-voluptatem-incidunt-ut-tenetur-eum-numquam', NULL, NULL, NULL, 2),
(16, 'dolor', 'totam-aut-ut-dolorem-a-ea', NULL, NULL, NULL, 2),
(17, 'voluptatum', 'laboriosam-deleniti-voluptatum-nam-ipsum-ipsum-labore', NULL, NULL, NULL, 3),
(18, 'ut', 'minima-necessitatibus-magnam-sunt-id-sed-adipisci', NULL, NULL, NULL, 1),
(19, 'iste', 'esse-voluptas-iste-ut-praesentium-ut', NULL, NULL, NULL, 2),
(20, 'iure', 'labore-in-quidem-ab-numquam-sed-aut-placeat-iure', NULL, NULL, NULL, 1),
(21, 'quod', 'voluptatem-mollitia-quam-necessitatibus-non', NULL, NULL, NULL, 2),
(22, 'rem', 'consequatur-quia-pariatur-possimus-voluptatem', NULL, NULL, NULL, 2),
(23, 'praesentium', 'velit-dolores-tenetur-eius-impedit-repellat-doloremque', NULL, NULL, NULL, 2),
(24, 'aliquid', 'sunt-ea-atque-ut-voluptate-ut-rerum-eligendi', NULL, NULL, NULL, 3),
(25, 'impedit', 'pariatur-et-modi-voluptas-quo-esse', NULL, NULL, NULL, 2),
(26, 'nobis', 'sint-eos-et-excepturi-voluptas-aut', NULL, NULL, NULL, 1),
(27, 'porro', 'qui-enim-numquam-blanditiis-error-et', NULL, NULL, NULL, 1),
(28, 'sit', 'quae-ab-quia-saepe', NULL, NULL, NULL, 1),
(29, 'asperiores', 'qui-eum-sed-tempora-accusamus-esse-aut', NULL, NULL, NULL, 2),
(30, 'quidem', 'quam-nulla-nemo-iste-totam-nam', NULL, NULL, NULL, 2),
(31, 'fugiat', 'doloremque-dolor-iste-optio-doloremque-asperiores-possimus-dolores', NULL, NULL, NULL, 1),
(32, 'adipisci', 'rerum-pariatur-at-maxime-nobis-sit-sapiente-veritatis', NULL, NULL, NULL, 1),
(33, 'corporis', 'alias-tempore-nihil-corporis-delectus-est', NULL, NULL, NULL, 1),
(34, 'necessitatibus', 'nam-in-quasi-ratione-consequatur-atque-tempore-cum', NULL, NULL, NULL, 2),
(35, 'a', 'est-temporibus-eius-earum', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `languages_deleted_at_index` (`deleted_at`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `slug`, `iso_label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Engleski jezik', 'engleski-jezik', 'en', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL),
(2, 'Hrvatski jezik', 'hrvatski-jezik', 'hr', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL),
(3, 'Njemački jezik', 'njemacki-jezik', 'de', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `language_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meals_deleted_at_index` (`deleted_at`),
  KEY `101266_5a42895047077` (`category_id`),
  KEY `101266_5a4289504f398` (`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_ingredient`
--

DROP TABLE IF EXISTS `meal_ingredient`;
CREATE TABLE IF NOT EXISTS `meal_ingredient` (
  `meal_id` int(10) UNSIGNED DEFAULT NULL,
  `ingredient_id` int(10) UNSIGNED DEFAULT NULL,
  KEY `fk_p_101266_101263_ingredient_me_5a428951e4bd7` (`meal_id`),
  KEY `fk_p_101263_101266_meal_t_5a428951e4c94` (`ingredient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_tag`
--

DROP TABLE IF EXISTS `meal_tag`;
CREATE TABLE IF NOT EXISTS `meal_tag` (
  `meal_id` int(10) UNSIGNED DEFAULT NULL,
  `tag_id` int(10) UNSIGNED DEFAULT NULL,
  KEY `fk_p_101266_101263_tag_me_5a428951e4bd7` (`meal_id`),
  KEY `fk_p_101263_101266_meal_t_5a428951e4c94` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_12_26_191540_create_1514308540_roles_table', 1),
(3, '2017_12_26_191543_create_1514308542_users_table', 1),
(4, '2017_12_26_191544_add_5a4283c17d4c7_relationships_to_user_table', 1),
(5, '2017_12_26_192828_create_1514309308_languages_table', 1),
(6, '2017_12_26_193028_create_1514309427_categories_table', 1),
(7, '2017_12_26_193029_add_5a428736be60e_relationships_to_category_table', 1),
(8, '2017_12_26_193133_create_1514309492_tags_table', 1),
(9, '2017_12_26_193134_add_5a428777b5901_relationships_to_tag_table', 1),
(10, '2017_12_26_193248_create_1514309567_ingredients_table', 1),
(11, '2017_12_26_193249_add_5a4287c233ec2_relationships_to_ingredient_table', 1),
(12, '2017_12_26_193926_create_1514309965_meals_table', 1),
(13, '2017_12_26_193927_add_5a428951e792c_relationships_to_meal_table', 1),
(14, '2017_12_26_194036_update_1514310036_roles_table', 1),
(15, '2017_12_26_194118_update_1514310078_users_table', 1),
(16, '2017_12_26_194120_add_5a4289c00b27c_relationships_to_user_table', 1),
(17, '2017_12_27_060955_create_5a428951e4a22_meal_tag_table', 1),
(18, '2017_12_27_060956_create_5a428951e4a22_meal_ingredient_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `language_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_deleted_at_index` (`deleted_at`),
  KEY `101263_5a4287765a62a` (`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`, `language_id`) VALUES
(1, 'tag 1 HRV', 'tag-1-hrv', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(2, 'tag 2 HRV', 'tag-2-hrv', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(3, 'tag 3 HRV', 'tag-3-hrv', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(4, 'tag 4 HRV', 'tag-4-hrv', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(5, 'tag 5 HRV', 'tag-5-hrv', '2017-12-27 07:10:25', '2017-12-27 07:10:25', NULL, 2),
(6, 'omnis', 'quasi-sit-dicta-labore-sed-itaque-animi', NULL, NULL, NULL, 3),
(7, 'at', 'totam-exercitationem-dicta-aliquam-officia-quo-mollitia-officia-suscipit', NULL, NULL, NULL, 1),
(8, 'illum', 'quos-necessitatibus-dolores-totam-enim', NULL, NULL, NULL, 2),
(9, 'nulla', 'neque-reiciendis-occaecati-cum-accusamus', NULL, NULL, NULL, 1),
(10, 'rerum', 'doloremque-aut-cupiditate-autem-sint-ut-optio-ex-quia', NULL, NULL, NULL, 1),
(11, 'nam', 'architecto-facere-omnis-vel-doloremque-deleniti', NULL, NULL, NULL, 3),
(12, 'ipsum', 'nam-et-voluptas-commodi', NULL, NULL, NULL, 3),
(13, 'beatae', 'qui-nobis-iste-error', NULL, NULL, NULL, 2),
(14, 'expedita', 'deleniti-maiores-at-rerum-velit', NULL, NULL, NULL, 3),
(15, 'libero', 'praesentium-porro-vel-labore-consequatur', NULL, NULL, NULL, 3),
(16, 'vel', 'nostrum-consequatur-iusto-ut', NULL, NULL, NULL, 3),
(17, 'consequatur', 'consectetur-ut-quia-vero-laboriosam', NULL, NULL, NULL, 2),
(18, 'sed', 'sint-laboriosam-non-sed-fugiat-facilis-voluptatem-alias', NULL, NULL, NULL, 3),
(19, 'blanditiis', 'culpa-quaerat-voluptatem-tempore', NULL, NULL, NULL, 1),
(20, 'dicta', 'ad-ut-dolorum-officia-est', NULL, NULL, NULL, 3),
(21, 'enim', 'cumque-ipsam-ea-eveniet-aut-nulla-quis', NULL, NULL, NULL, 3),
(22, 'voluptatem', 'pariatur-earum-quia-quod-voluptatem-qui-perspiciatis-voluptates-aut', NULL, NULL, NULL, 1),
(23, 'minus', 'harum-libero-voluptas-vitae-corrupti-aspernatur-inventore-aut', NULL, NULL, NULL, 2),
(24, 'facilis', 'molestiae-hic-omnis-reiciendis-quo', NULL, NULL, NULL, 1),
(25, 'itaque', 'voluptas-explicabo-nihil-ut-enim-et', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `101260_5a4283c00b453` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$RddV/3PkYe/qzjylOT4UAuC6tY5zVfVCy9DYx.w5xP1qj0Xso3xmu', 'QUWoYMjMp4PLXSZWXu6wiMwt6HB4ZnNCSyeVT4UAIWMlqU8EE4im8MiVvyjn', '2017-12-27 07:10:25', '2017-12-27 07:10:25', 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
