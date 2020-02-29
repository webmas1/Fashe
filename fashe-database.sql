-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 04:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'coats', 'coats', 'cat-coats.jpg', '2019-02-03 13:10:01', '2019-04-12 18:14:38'),
(2, 'shirts', 'shirts', 'cat-shirts.jpg', '2019-02-03 13:11:40', '2019-02-03 13:11:40'),
(3, 'jeans', 'jeans', 'cat-jeans.jpg', '2019-02-03 13:10:01', '2019-02-03 13:10:01'),
(4, 'shoes', 'shoes', 'cat-shoes.jpg', '2019-02-03 13:11:40', '2019-04-12 17:52:20'),
(5, 'accessories', 'accessories', 'cat-accessories.jpg', '2019-02-03 13:12:00', '2019-02-03 13:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `payment` int(1) NOT NULL DEFAULT '2',
  `sent` int(1) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `data`, `total`, `payment`, `sent`, `created_at`, `updated_at`) VALUES
(1, 1, 'a:1:{i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:10:\"Black coat\";s:5:\"price\";d:210;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:11:\"coats_3.jpg\";}s:10:\"conditions\";a:0:{}}}', 210, 1, 1, '2019-03-18 19:01:37', '2019-04-03 05:18:11'),
(3, 1, 'a:1:{i:15;a:6:{s:2:\"id\";i:15;s:4:\"name\";s:13:\"A loose shirt\";s:5:\"price\";d:45;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:12:\"shirts_2.jpg\";}s:10:\"conditions\";a:0:{}}}', 45, 1, 1, '2019-03-18 19:22:26', '2019-04-07 14:54:34'),
(5, 1, 'a:1:{i:12;a:6:{s:2:\"id\";i:12;s:4:\"name\";s:17:\"Bright torn jeans\";s:5:\"price\";d:175;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:11:\"jeans_2.jpg\";}s:10:\"conditions\";a:0:{}}}', 175, 1, 1, '2019-03-18 19:23:52', '2019-04-12 15:03:49'),
(7, 2, 'a:2:{i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:9:\"Army coat\";s:5:\"price\";d:200;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:11:\"coats_1.jpg\";}s:10:\"conditions\";a:0:{}}i:9;a:6:{s:2:\"id\";i:9;s:4:\"name\";s:8:\"Red coat\";s:5:\"price\";d:175;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:11:\"coats_2.jpg\";}s:10:\"conditions\";a:0:{}}}', 375, 1, 1, '2019-04-01 05:15:18', '2019-04-20 17:32:36'),
(11, 2, 'a:1:{i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:18:\"Classic torn jeans\";s:5:\"price\";i:145;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:11:\"jeans_3.jpg\";}s:10:\"conditions\";a:0:{}}}', 145, 1, 1, '2019-04-21 07:58:07', '2019-04-21 08:28:30'),
(12, 2, 'a:2:{i:15;a:6:{s:2:\"id\";i:15;s:4:\"name\";s:13:\"A loose shirt\";s:5:\"price\";i:45;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:12:\"shirts_2.jpg\";}s:10:\"conditions\";a:0:{}}i:16;a:6:{s:2:\"id\";i:16;s:4:\"name\";s:11:\"Belly shirt\";s:5:\"price\";i:52;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:12:\"shirts_3.jpg\";}s:10:\"conditions\";a:0:{}}}', 97, 2, 2, '2019-04-21 07:58:37', '2019-04-21 07:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headline` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `url_name`, `headline`, `content`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Stores', 'stores', 'Find a store here', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td><b>Store Name</b></td><td><b>Location</b></td><td><b>Phone Number</b></td></tr><tr><td>Evnat Mall</td><td>Jabutinsky 58, Petach Tiqva</td><td>03-7479297</td></tr><tr><td>Ayalon Mall</td><td>Aba-Hillel 32, Ramat-Gan</td><td>03-7678292</td></tr><tr><td>Azrieli TLV</td><td>Derech Hashalom 97, Tel-Aviv</td><td>03-7369289</td></tr></tbody></table><p><br></p>', 'page-stores.jpg', '2019-04-14 14:50:56', '2019-04-14 14:50:56'),
(4, 'Contact Us', 'contact', 'Stay in touch', '<h3>Email:</h3><p><a href=\"mailto:help@fashe.com\">help@fashe.com</a></p><h3>Phone:</h3><p>&nbsp;<a href=\"tel:03-9671668\" style=\"margin: 0px; padding: 0px; line-height: 1.7; transition: all 0.4s ease 0s;\">03-9671668</a></p><p></p><h3>Our Office:</h3><p>1st David Ben-Gurion St, Bnei-Brak<br></p><br><p></p>', 'cat-contact.jpg', '2019-04-14 14:56:46', '2019-04-14 15:00:04'),
(5, 'About', 'about', 'Let us tell you about our self', '<p style=\"margin-bottom: 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vehicula nibh ut massa tempor, ut varius erat pretium. Ut eget est at nibh scelerisque hendrerit. Nunc nec enim nisi. Suspendisse id enim dolor. Sed interdum id ante sodales tincidunt. Maecenas pretium id enim eu porttitor. Vivamus lobortis lectus tortor, vel ornare diam rutrum a. In vitae facilisis ante. Aliquam vehicula et ex et egestas. Aliquam porttitor non sem et molestie. Vestibulum ut dolor ligula.</p><p style=\"margin-bottom: 15px; padding: 0px;\">Donec euismod vel orci et efficitur. Fusce at orci nec nunc consequat pulvinar. Morbi tincidunt elit libero, quis mattis tellus facilisis et. Maecenas id suscipit elit, non vehicula diam. Nulla ut ante eu tortor tincidunt ornare. Vestibulum in posuere arcu. Morbi convallis eleifend posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc malesuada enim quis ultrices iaculis. Integer sollicitudin tellus at lorem maximus, id sodales elit faucibus. Aenean sed erat diam. Proin pellentesque molestie laoreet. Proin elementum lacinia turpis, eu faucibus est fringilla id. Aenean libero mi, aliquet sed ornare in, tincidunt sed est. Vivamus maximus ultricies felis, a ultrices est eleifend in. Donec commodo elit mi, sit amet aliquam risus aliquet et.</p><p style=\"margin-bottom: 15px; padding: 0px;\">Cras egestas diam vitae ante consequat, at laoreet libero ultrices. Duis aliquam, turpis non consequat tincidunt, elit augue porttitor purus, sed condimentum metus velit a turpis. Proin metus augue, elementum accumsan orci vitae, ultrices convallis tellus. Nam porta vitae justo finibus aliquam. Sed eget sollicitudin est, vel efficitur urna. Curabitur non interdum justo, quis rhoncus mauris. Vestibulum efficitur, nulla ut vehicula dapibus, ante turpis congue leo, ut sodales felis lacus ut lorem. Praesent eu maximus urna. Mauris laoreet nisi ut dolor placerat feugiat. Vivamus interdum tincidunt libero, eu gravida ipsum placerat eu.</p>', '', '2019-04-14 15:02:01', '2019-04-14 15:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `name`, `url_name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(5, 5, 'Beach hat', 'beach_hat', 'Nice hat for daily walking and for stylish beach day', 'accessories_1.jpg', 120, '2019-02-06 18:49:35', '2019-02-06 18:50:29'),
(6, 5, 'Round sunglasses', 'round_sunglasses', 'Great vintage round glasses that will make you look and feel awasome', 'accessories_2.jpg', 240, '2019-02-06 18:49:35', '2019-02-06 18:50:29'),
(7, 5, 'Modern sunglasses', 'modern_sunglasses', 'Great modern glasses that will make you look and feel awasome', 'accessories_3.jpg', 255, '2019-02-06 18:49:35', '2019-02-06 18:50:29'),
(8, 1, 'Army coat', 'Army_coat', 'Nice and warm army coat', 'coats_1.jpg', 199, '2019-02-09 09:14:30', '2019-04-12 17:24:47'),
(9, 1, 'Red coat', 'red_coat', 'Nice and warm red coat', 'coats_2.jpg', 175, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(10, 1, 'Black coat', 'black_coat', 'Nice and warm black coat', 'coats_3.jpg', 210, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(11, 3, 'Blue torn jeans', 'blue_torn_jeans', 'Classic blue jeans with modern torns', 'jeans_1.jpg', 150, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(12, 3, 'Bright torn jeans', 'bright_torn_jeans', 'Bright jeans with modern big torns', 'jeans_2.jpg', 175, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(13, 3, 'Classic torn jeans', 'classic_torn_jeans', 'Classic jeans with modern big torns', 'jeans_3.jpg', 145, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(14, 2, 'Floral shirt', 'floral_shirt', 'Light and flowery shirt', 'shirts_1.jpg', 65, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(15, 2, 'A loose shirt', 'A_loose_shirt', 'Daily loose shirt', 'shirts_2.jpg', 45, '2019-02-09 09:14:30', '2019-04-12 17:52:13'),
(16, 2, 'Belly shirt', 'belly_shirt', 'Belly shirt for those who want to show off', 'shirts_3.jpg', 52, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(17, 4, 'Floral boots', 'floral_boots', 'Floral rainy boots', 'shoes_1.jpg', 86, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(18, 4, 'Pointed boots', 'pointed_boots', 'Pointed cool boots', 'shoes_2.jpg', 79, '2019-02-09 09:14:30', '2019-02-09 09:14:30'),
(19, 4, 'Open heels', 'open_heels', 'Special open heels', 'shoes_3.jpg', 47, '2019-02-09 09:14:30', '2019-02-09 09:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `subscribe` int(1) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `subscribe`, `created_at`, `updated_at`) VALUES
(1, 'Asi', 'Kapner', 'webmas1@gmail.com', '$2y$10$maRv.ehQKCM3GRzrsLLsgO2eysxV6nkc/QxEkN0d3kBcP0zPCr4Be', 1, 2, '2019-03-16 19:56:45', '2019-04-12 17:27:58'),
(2, 'Admin', 'Manager', 'admin@gmail.com', '$2y$10$maRv.ehQKCM3GRzrsLLsgO2eysxV6nkc/QxEkN0d3kBcP0zPCr4Be', 6, 2, '2019-03-18 16:10:06', '2019-04-01 10:16:26'),
(4, 'Asi', 'Hvr', 'asik@hvr.co.il', '$2y$10$PHG6JG1T0jZBAHeyLUJPfua1dypFIwm7XySHSF/mTBZlmYXmUuJEe', 1, 2, '2019-03-20 06:27:40', '2019-04-01 10:18:07'),
(6, 'New', 'User', 'newuser@gmail.com', '$2y$10$MSnh3bR7Me5gjil8I07xKerjyyNgoDWRBnhM9yrZjqGfU26a8VfzG', 1, 2, '2019-04-21 08:09:36', '2019-04-21 08:09:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_name` (`url_name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
