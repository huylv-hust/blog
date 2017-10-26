-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 11:44 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2',
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Việt Nam', 0, 2, NULL, '2017-10-19 00:00:00', '2017-10-19 00:00:00'),
(2, 'Nhật Bản', 0, 2, NULL, '2017-10-19 00:00:00', '2017-10-19 00:00:00'),
(3, 'Hàn Quốc', 0, 2, NULL, '2017-10-18 00:00:00', '2017-10-18 00:00:00'),
(4, 'Âu Mỹ', 0, 2, NULL, '2017-10-18 00:00:00', '2017-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('levanhuy93@gmail.com', '$2y$10$/ea4IPX3p5SH6eqrQbgFkuX9yF72k5BE4AbzPq8.khhh17MDNsLh2', '2017-10-24 04:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag` text,
  `status` int(11) NOT NULL DEFAULT '2',
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `category_id`, `user_id`, `tag`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'Lan quế phường', '<p><img alt=\"\" src=\"/img/images/%5E%5E.jpg\" style=\"height:85px; width:100px\" />Chỉ l&agrave; test th&ocirc;i m&agrave;</p>', '2', 0, 'Emiri Suzuhara', 2, NULL, '2017-10-26 06:47:02', '2017-10-18 06:47:00'),
(2, 'xxx', 'xxx', '2', 0, NULL, 2, NULL, '2017-10-18 07:28:00', '2017-10-18 07:28:00'),
(3, 'tag cl', 'a', '4', 0, NULL, 2, NULL, '2017-10-20 04:29:03', '2017-10-18 07:28:51'),
(4, 'a', 'a', '2', 0, NULL, 2, '2017-10-19 04:25:29', '2017-10-19 04:25:29', '2017-10-18 07:29:24'),
(5, '3', '1', '1', 0, NULL, 2, NULL, '2017-10-20 09:56:54', '2017-10-20 09:56:54'),
(6, 'Em Không Là Duy Nhất', 'óc Tiên - Em Không Là Duy Nhất | Official Music Video Đăng ký Kênh: http://emvn.co/TocTien_Subscribe', '1', 0, 'Music', 2, NULL, '2017-10-23 06:30:44', '2017-10-23 06:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'levanhuy93@gmail.com', '$2y$10$i6O.64qXnQlNEMDKiuxfRepqDWZ5t.A/dmMa7nVmgcV6e/2xFlHzG', 'Huy', 1, 'vRcszueex6yelwFkuJaHlbA8f9oJTGgkLXcSBfdDs7DEDDvEYmVQ4DH96DSl', NULL, '2017-10-23 03:17:14', '2017-10-23 03:17:14'),
(2, 'ngocnguyen@gmail.com', '$2y$10$3ZHZjD03SJyyHkAyhl9R3e8DiWoK8pKjy/oKD.y/AnzQpV2xYQ4ym', 'Ngọc', 2, 'bKnrkMlKjxx9fYmcHAtMsOhhbHt3ybOrz19eQeNIwWgvRCmXpqXuJ93J1AL0', NULL, '2017-10-25 02:53:20', '2017-10-25 02:53:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
