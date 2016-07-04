-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2016 at 10:07 AM
-- Server version: 5.7.12-0ubuntu1.1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `category_id`, `gender`, `description`, `image`, `time_stamp`) VALUES
(1, 'nike', 1, '1', 'Mens nike', '', '2016-06-29 11:35:05'),
(2, 'nike (women)', 1, '2', '', '', '2016-06-29 11:37:48'),
(3, 'second brand', 2, '1', '', '', '2016-06-29 11:39:54'),
(4, 'second brand(womens)', 2, '1', '', '', '2016-06-29 11:40:33'),
(5, 'third brand (mans)', 3, '1', 'Third brands (mans)', '', '2016-06-29 11:42:03'),
(6, 'third brand (womens)', 3, '1', 'third brand (womens)', '', '2016-06-29 11:43:12'),
(7, 'adidas', 4, '1', 'This is adidas', '', '2016-06-29 11:44:44'),
(8, 'reebok', 4, '1', '', '', '2016-06-29 11:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `time_stamp`) VALUES
(1, 'test category', 'this is the test category', '', '2016-06-29 10:39:09'),
(2, 'second test category ', 'this is the second test category', '', '2016-06-29 10:40:43'),
(3, 'third category ', 'this is the third catecory', '', '2016-06-29 10:41:31'),
(4, 'Mens', 'Mens were', '', '2016-06-29 10:42:10'),
(5, 'Сумки', 'Категория сумки.', '', '2016-06-29 11:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `time_stamp`) VALUES
(1, 'Мужской', '2016-06-29 11:18:49'),
(2, 'Женский', '2016-06-29 11:18:50'),
(3, 'Унисекс', '2016-06-29 11:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `description`, `product_id`, `src`, `time_stamp`) VALUES
(1, '0', 1, '/images/products/gallery1.jpg', '2016-07-02 09:51:56'),
(2, '0', 2, '/images/products/product5.jpg', '2016-07-02 09:53:06'),
(3, '0', 3, '/images/products/product4.jpg', '2016-07-02 09:53:50'),
(4, '0', 4, '/images/products/product1.jpg', '2016-07-02 09:54:35'),
(5, '0', 5, '/images/products/product2.jpg', '2016-07-02 09:55:53'),
(6, '0', 6, '/images/products/product5.jpg', '2016-07-02 09:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1466669869),
('m130524_201442_init', 1466669872),
('m160623_061117_tables', 1466669880),
('m160629_110256_gender', 1467199130);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` decimal(19,4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `brand_id`, `price`, `description`, `time_stamp`) VALUES
(1, 'Кросовки', 1, 1, '20.0000', 'Хорошие тестовые кросовки', '2016-06-30 12:18:40'),
(2, 'Майки ', 2, 3, '55.0000', 'Хорошие тестовые майки', '2016-06-30 12:19:21'),
(3, 'Штаны', 4, 7, '99.0000', 'ок штаны', '2016-06-30 12:20:55'),
(4, 'шляпа', 1, 2, '45.0000', 'Ок шляпа', '2016-06-30 12:21:42'),
(5, 'Блузка', 3, 6, '63.0000', 'Ок блузка', '2016-06-30 12:23:16'),
(6, 'продукт', 1, 1, '8.0000', 'Ок продукт', '2016-06-30 12:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_availabilyty`
--

CREATE TABLE `product_availabilyty` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'vXLvYsfc_uYNFfetnuPcwNP5h56JQUF3', '$2y$13$mHfPn/VakGPXYIvYIv/BMOHqY3/AnuyUWCdJ7ZSVGiy7qx2JMjFWS', NULL, 'email@email.com', 10, 1466671883, 1466671883);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_brand_category` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_image_product` (`product_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_category` (`category_id`),
  ADD KEY `FK_product_brand` (`brand_id`);

--
-- Indexes for table `product_availabilyty`
--
ALTER TABLE `product_availabilyty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_availabilyty_product` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_availabilyty`
--
ALTER TABLE `product_availabilyty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `FK_brand_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_availabilyty`
--
ALTER TABLE `product_availabilyty`
  ADD CONSTRAINT `FK_product_availabilyty_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
