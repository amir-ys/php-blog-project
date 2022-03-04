-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2022 at 02:46 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `updated_at`, `created_at`) VALUES
(1, 'sport', 0, '2022-03-04 18:11:59', '2021-01-13 21:48:29'),
(2, 'technolozhyb', 1, '2022-03-04 18:12:05', '2021-08-17 18:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `category_id`, `image`, `status`, `updated_at`, `created_at`) VALUES
(5, 'goodo', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias architecto beatae deserunt dignissimos doloribus explicabo illo inventore laborum maiores minima nisi numquam odio quaerat, quis repellendus voluptate voluptatum? Fugit!\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias architecto beatae deserunt dignissimos doloribus explicabo illo inventore laborum maiores minima nisi numquam odio quaerat, quis repellendus voluptate voluptatum? Fugit!\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias architecto beatae deserunt dignissimos doloribus explicabo illo inventore laborum maiores minima nisi numquam odio quaerat, quis repellendus voluptate voluptatum? Fugit!\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias architecto beatae deserunt dignissimos doloribus explicabo illo inventore laborum maiores minima nisi numquam odio quaerat, quis repellendus voluptate voluptatum? Fugit!\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias architecto beatae deserunt dignissimos doloribus explicabo illo inventore laborum maiores minima nisi numquam odio quaerat, quis repellendus voluptate voluptatum? Fugit!\r\n', 2, '/assets/images/6222132487421.jpg', 1, '2022-03-04 17:51:00', '2022-03-04 16:52:12'),
(6, 'nff ', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias architecto beatae deserunt dignissimos doloribus explicabo illo inventore laborum maiores minima nisi numquam odio quaerat, quis repellendus voluptate voluptatum? Fugit!\r\n', 1, '/assets/images/6222131a502b2.jpg', 1, '2022-03-04 17:49:34', '2022-03-04 16:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `created_at`) VALUES
(1, 'amir.ypu74@gmail.com', 'amir', 'youse', '$2y$10$9Nfvlnt81THuc.R5usV5POtzgZFVj67TP2mwoIOPKt.lL9iUJ9f4e', '2022-03-04 15:07:27'),
(2, 'user1@gmail.com', 'user', 'one', '$2y$10$/tJFsK2TDlDqIligpqz2w.BOQNkfW59GTS783TAXCwjECv8klezwa', '2022-03-04 16:10:16');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
