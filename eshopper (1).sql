-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 02 2016 г., 08:18
-- Версия сервера: 5.7.13-0ubuntu0.16.04.2
-- Версия PHP: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshopper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `image`, `time_stamp`) VALUES
(1, 'Gepure', '', '', '2016-07-19 09:22:11'),
(2, 'Lipsy', '', '', '2016-07-19 09:33:41'),
(3, 'Daminika', '', '', '2016-07-19 09:54:31'),
(4, 'Justor ', '', '', '2016-07-19 10:25:18'),
(5, 'Mohito', '', '', '2016-07-19 06:48:17');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_token`, `product_id`, `size_id`, `quantity`) VALUES
(31, '20160721124907', 4, 7, 1),
(32, '20160721130858', 4, 7, 1),
(33, '20160722060530', 4, 7, 1),
(34, '20160808061025', 4, 7, 1),
(35, '20160808063036', 1, 1, 1),
(36, '20160808063327', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `time_stamp`) VALUES
(1, 'Одежда', '', '', '2016-07-19 05:12:31'),
(2, 'Обувь', '', '', '2016-07-19 05:12:48'),
(3, 'Аксесуары', '', '', '2016-07-19 05:13:11'),
(4, 'Новинки', '', '', '2016-07-19 05:13:22');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `text`, `user_id`, `post_id`, `time_stamp`) VALUES
(1, 'Nme', 'mail@karu.tu', 'KHljunhl;ignv;isugn;rsssbn;hsbrltibgrs;tgbrstsrtgrtsg', 1, 7, '2016-07-29 06:48:24'),
(2, 'bhdfthfdh', 'fshtrfh', 'strhrsthrtsh', 1, 7, '2016-07-29 06:50:11'),
(3, 'l,uiglguilguil', 'gkluiluiluil', 'fkfilkfuluiluiluil', 1, 6, '2016-07-29 06:50:43'),
(4, 'l,uiglguilguil', 'gkluiluiluil', 'fkfilkfuluiluiluil', 1, 6, '2016-07-29 06:50:53'),
(5, 'l,uiglguilguil', 'gkluiluiluil', 'fkfilkfuluiluiluil', 1, 6, '2016-07-29 06:50:56'),
(14, ';l,l,l,;l,;l,', 'lkm;kljnm;jn', 'o[m;m;\'jn\'', 1, 6, '2016-07-29 07:01:12');

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`id`, `name`, `time_stamp`) VALUES
(1, 'Мужской', '2016-07-19 04:46:38'),
(2, 'Женский', '2016-07-19 04:46:38'),
(3, 'Унисекс', '2016-07-19 04:46:38');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `description`, `product_id`, `src`, `time_stamp`) VALUES
(1, '0', 1, '/images/products/futbolka-dlja-zhenshhin0.jpg', '2016-07-19 06:51:53'),
(2, '1', 1, '/images/products/futbolka-dlja-zhenshhin1.jpg', '2016-07-19 06:52:25'),
(3, '1', 1, '/images/products/futbolka-dlja-zhenshhi2.jpg', '2016-07-19 06:55:08'),
(4, '1', 1, '/images/products/futbolka-dlja-zhenshhin3.jpg', '2016-07-19 06:56:18'),
(7, '0', 3, '/images/products/tufli-zmeinyj-print-dlja-zhenshhin-bezhevye0.jpg', '2016-07-19 09:35:15'),
(8, '1', 3, '/images/products/tufli-zmeinyj-print-dlja-zhenshhin-bezhevye1.jpg', '2016-07-19 09:35:41'),
(9, '1', 3, '/images/products/tufli-zmeinyj-print-dlja-zhenshhin-bezhevye-3.jpg', '2016-07-19 09:36:17'),
(10, '1', 3, '/images/products/tufli-zmeinyj-print-dlja-zhenshhin-bezhevye-4.jpg', '2016-07-19 09:37:48'),
(11, '1', 3, '/images/products/tufli-zmeinyj-print-dlja-zhenshhin-bezhevye-s-5.jpg', '2016-07-19 09:38:34'),
(12, '0', 4, '/images/products/bomber-dlja-zhenshhin-bjetti-belyj-daminika-0.jpg', '2016-07-19 09:59:49'),
(13, '1', 4, '/images/products/bomber-dlja-zhenshhin-bjetti-belyj-daminika-2.jpg', '2016-07-19 10:00:21'),
(14, '0', 2, '/images/products/dzhinsy-dlja-zhenshhin-dzhins-justor-0.jpg', '2016-07-19 10:20:54'),
(15, '1', 2, '/images/products/dzhinsy-dlja-zhenshhin-dzhins-justor-1.jpg', '2016-07-19 10:21:20'),
(16, '1', 2, '/images/products/dzhinsy-dlja-zhenshhin-dzhins-justor-2.jpg', '2016-07-19 10:21:45'),
(17, '1', 2, '/images/products/dzhinsy-dlja-zhenshhin-dzhins-justor-3.jpg', '2016-07-19 10:22:21');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1468903585),
('m130524_201442_init', 1468903588),
('m160623_061117_tables', 1468903598),
('m160629_110256_gender', 1468903599),
('m160719_052642_update_section', 1468906270),
('m160720_063725_table_cart', 1468997433),
('m160721_073410_update_order', 1469086642),
('m160722_105706_blog_tables', 1469432371),
('m160727_190856_comments', 1469687685);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `email`, `phone`, `addres`, `status`, `time_stamp`, `order_number`) VALUES
(3, 'fhythtyh', 'thyythtyh', 'tyhtyhtyh@kar.yu', '688616816', 'tyhtyhtyh', 1, '2016-08-29 08:47:37', '20160721131153'),
(4, 'tyhetyjetj', 'etyjetyje', 'jetyjejeyt', 'etyjeytjetyj', 'etyjetyjeyje', 0, '2016-07-21 13:13:37', '20160721131316'),
(5, 'hh', 'ythth', 'jetyjejeyt@grgr.bh', '35635', 'fghfgh', 0, '2016-07-27 07:26:34', '1'),
(6, 'ju', 'yujy', 'y5@gtg.tt', '45645', '45456', 0, '2016-07-27 07:30:08', 'vXLvYsfc_uYNFfetnuPcwNP5h56JQUF3'),
(8, 'fyjkuyjyj', 'yfjyfujyfu', 'yjyu@ftghtrf.ty', '567567', 'hrthrth', 0, '2016-08-29 06:07:25', '20160829060658'),
(9, 'Юрій', 'Папуницкмй', 'lirn@mail.ru', '584641', 'вптппппппуфП', 0, '2016-08-29 06:57:32', '20160829065617');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`product_id`, `size_id`, `order_id`, `count`) VALUES
(2, 3, 3, 1),
(1, 1, 3, 2),
(1, 1, 3, 1),
(1, 1, 3, 1),
(4, 7, 4, 1),
(4, 7, 4, 1),
(4, 7, 4, 1),
(1, 1, 5, 1),
(4, 7, 5, 1),
(4, 7, 5, 1),
(4, 7, 5, 1),
(4, 7, 5, 1),
(4, 7, 5, 1),
(3, 5, 5, 1),
(4, 8, 5, 1),
(1, 1, 8, 1),
(4, 8, 9, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_preview` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `text_preview`, `author_id`, `text`, `image`, `create_at`) VALUES
(4, ':KJNkjngr;skjeragn;aekjrgne;rjn', '"IMJ"olimk\'mn\'eragmn\'lrekang\'agnaerjkgn;eruigaeiurgn;agnael;,\'ergpok[erigmj\'aeljgnae;jgn;', 1, '<p>&nbsp;</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&#39;srtgkom&#39;hin&#39;sr[jorb,]a[pl\\a,.v\\a&#39;l,gb\\p&#39;okmb&#39;amnk</p>\r\n\r\n<p>&nbsp;</p>\r\n', '/images/post-images/blog-one.jpg', '2016-07-25 10:32:25'),
(5, '\\\';/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM\'SRHNRS\'T', '\\\';/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM\'SRHNRS\'T\\\';/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM\'SRHNRS\'T\\\';/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM\'SRHNRS\'T', 1, '<p>\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T\\&#39;;/.ws\\f;.c\\wsV, LB, ]PJGV;UISGRUHPRHKM&#39;SRHNRS&#39;T</p>\r\n', '/images/post-images/blog-two.jpg', '2016-07-25 10:32:57'),
(6, 'lhbLJHNG;LISRBPATGBMA\'RLTKG,M\'APIOBJGMA', 'lhbLJHNG;LISRBPATGBMA\'RLTKG,M\'APIOBJGMAlhbLJHNG;LISRBPATGBMA\'RLTKG,M\'APIOBJGMAlhbLJHNG;LISRBPATGBMA\'RLTKG,M\'APIOBJGMA', 1, '<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMAlhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>lhbLJHNG;LISRBPATGBMA&#39;RLTKG,M&#39;APIOBJGMA</p>\r\n\r\n<p>&nbsp;</p>\r\n', '/images/post-images/blog-three.jpg', '2016-07-25 10:34:55'),
(7, 'SLKMBH\'SP,\\L[;,A\'RJNGAFLSJFKJSBFLSBH', 'JNG;KJENG;SUTNJG[AKEMB\'DLKGMBADFG[EAIOGA;DKJN[', 1, '<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n\r\n<p>SIKMA;DIOB[ADKJMB;ADLKMBJ][AEIJPEJNB;ZDJFNB;ZDBNDJFBN</p>\r\n\r\n<p>ERGJ;EAOI[AEUHGPADG</p>\r\n', '/images/post-images/blog-one.jpg', '2016-07-25 10:35:45');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `price` decimal(19,4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `section_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `brand_id`, `gender_id`, `price`, `description`, `section_id`, `time_stamp`) VALUES
(1, 'Футболка для женщин, персиковая ', 1, 5, 2, '5.0000', '', 1, '2016-07-19 09:23:57'),
(2, 'Джинсы для женщин', 1, 4, 2, '25.0000', '', 3, '2016-07-19 10:19:03'),
(3, 'Туфли "Змеиный принт" для женщин, бежевые с черным', 2, 2, 2, '22.0000', '', 5, '2016-07-19 11:29:52'),
(4, 'Бомбер для женщин "Бэтти", белый', 1, 3, 2, '17.0000', '', 9, '2016-07-19 09:59:19');

-- --------------------------------------------------------

--
-- Структура таблицы `product_availabilyty`
--

CREATE TABLE `product_availabilyty` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `category_id`, `time_stamp`, `gender_id`) VALUES
(1, 'Футболки', 1, '2016-07-19 05:37:03', 2),
(2, 'Юбки', 1, '2016-07-19 05:38:12', 2),
(3, 'Джинсы', 1, '2016-07-19 05:38:28', 2),
(4, 'Брюки', 1, '2016-07-19 05:38:45', 2),
(5, 'Туфли', 2, '2016-07-19 05:38:53', 2),
(6, 'Кросовки', 2, '2016-07-19 05:39:04', 2),
(7, 'Кеды', 2, '2016-07-19 05:39:18', 2),
(8, 'Сумки', 3, '2016-07-19 05:39:29', 2),
(9, 'Свитеры и кофты', 1, '2016-07-19 09:58:13', 2),
(10, 'Ремни', 3, '2016-07-19 05:39:45', 2),
(11, 'Рюкзаки', 3, '2016-07-19 05:39:52', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id`, `product_id`, `size`, `description`) VALUES
(1, 1, '45', '45'),
(2, 1, '42', '42'),
(3, 2, '40', '40'),
(4, 2, '46', '46'),
(5, 3, '44', '44'),
(6, 3, '37', '37'),
(7, 4, '44', '44'),
(8, 4, '46', '46');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'vXLvYsfc_uYNFfetnuPcwNP5h56JQUF3', '$2y$13$mHfPn/VakGPXYIvYIv/BMOHqY3/AnuyUWCdJ7ZSVGiy7qx2JMjFWS', NULL, 'email@email.com', 10, 1466671883, 1466671883);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_product` (`product_id`),
  ADD KEY `FK_cart_size` (`size_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_image_product` (`product_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `FK_orderproduct_product` (`product_id`),
  ADD KEY `FK_orderproduct_order` (`order_id`),
  ADD KEY `FK_size_product_order` (`size_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_user` (`author_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_category` (`category_id`),
  ADD KEY `FK_product_brand` (`brand_id`),
  ADD KEY `FK_product_section` (`section_id`),
  ADD KEY `FK_product_gender` (`gender_id`);

--
-- Индексы таблицы `product_availabilyty`
--
ALTER TABLE `product_availabilyty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_availabilyty_product` (`product_id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_section_category` (`category_id`),
  ADD KEY `FK_section_gender` (`gender_id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_size_product` (`product_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `product_availabilyty`
--
ALTER TABLE `product_availabilyty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_cart_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `FK_orderproduct_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `FK_orderproduct_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_size_product_order` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_user` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_product_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_product_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_availabilyty`
--
ALTER TABLE `product_availabilyty`
  ADD CONSTRAINT `FK_product_availabilyty_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_section_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_section_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`);

--
-- Ограничения внешнего ключа таблицы `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_size_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
