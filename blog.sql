-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 02:13 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `role`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'levanhuy93@gmail.com', '$2y$10$i6O.64qXnQlNEMDKiuxfRepqDWZ5t.A/dmMa7nVmgcV6e/2xFlHzG', 'Huy', 1, NULL, NULL, '2017-10-23 11:39:30', '2017-10-23 11:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Việt Nam', NULL, '2017-10-19 00:00:00', '2017-10-19 00:00:00'),
(2, 'Nhật Bản', NULL, '2017-10-19 00:00:00', '2017-10-19 00:00:00'),
(3, 'Hàn Quốc', NULL, '2017-10-18 00:00:00', '2017-10-18 00:00:00'),
(4, 'Âu Mỹ', NULL, '2017-10-18 00:00:00', '2017-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `tag` text,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `category_id`, `tag`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Lan quế phường', 'Truyện này là truyện 18+, phim hay, xxx', 2, 'Emiri Suzuhara', NULL, '2017-10-20 04:46:32', '2017-10-18 06:47:00'),
(2, 'xxx', 'xxx', 2, NULL, NULL, '2017-10-18 07:28:00', '2017-10-18 07:28:00'),
(3, 'tag cl', 'a', 4, NULL, NULL, '2017-10-20 04:29:03', '2017-10-18 07:28:51'),
(4, 'a', 'a', 2, NULL, '2017-10-19 04:25:29', '2017-10-19 04:25:29', '2017-10-18 07:29:24'),
(5, '3', '1', 1, NULL, NULL, '2017-10-20 09:56:54', '2017-10-20 09:56:54'),
(6, 'Em Không Là Duy Nhất', 'óc Tiên - Em Không Là Duy Nhất | Official Music Video Đăng ký Kênh: http://emvn.co/TocTien_Subscribe', 1, 'Music', NULL, '2017-10-23 06:30:44', '2017-10-23 06:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'levanhuy93@gmail.com', '$2y$10$i6O.64qXnQlNEMDKiuxfRepqDWZ5t.A/dmMa7nVmgcV6e/2xFlHzG', 'Huy', 'DxtNHZmEf8X6AKaRxyBDsScq49V7KlTkcAeZpijm0jQ130YAnIH1c7UATa05', NULL, '2017-10-23 03:17:14', '2017-10-23 03:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
