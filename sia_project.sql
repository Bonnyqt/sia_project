-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 06:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`, `media`) VALUES
(8, 'test', 'test', 4, '2025-05-05 08:12:32', '2025-05-05 08:12:32', NULL),
(9, 'xzxzxz', 'xzxzxz', 4, '2025-05-05 08:14:48', '2025-05-05 08:14:48', NULL),
(10, 'vv', 'vv', 4, '2025-05-05 08:19:34', '2025-05-05 08:19:34', NULL),
(11, 's', 's', 4, '2025-05-05 08:20:52', '2025-05-05 08:20:52', NULL),
(12, 'test', 'test', 4, '2025-05-06 06:40:44', '2025-05-06 06:40:44', NULL),
(13, 'test', 'test', 4, '2025-05-06 07:12:26', '2025-05-06 07:12:26', NULL),
(14, 'ss', 'ss', 4, '2025-05-06 07:16:45', '2025-05-06 07:16:45', NULL),
(15, 'test', 'test', 4, '2025-05-06 07:18:37', '2025-05-06 07:18:37', NULL),
(16, 'tt', 'test', 4, '2025-05-06 07:25:29', '2025-05-06 07:25:29', NULL),
(17, 'te', 'te', 4, '2025-05-06 08:50:48', '2025-05-06 08:50:48', NULL),
(18, 'z', 'z', 4, '2025-05-06 08:52:39', '2025-05-06 08:52:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `api_key` varchar(255) NOT NULL,
  `first_login` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `api_key`, `first_login`) VALUES
(4, 'Bonnyqt', 'mjblmarquez@tip.edu.ph', '$2y$10$UKziBi8DBYEt8cZItwqmTOIC4bmjphiAV.U0LcPkDmAyOnIVMCKSm', '2025-05-05 07:51:48', '2025-05-06 08:44:58', '54431fc9d7402eec6f1901d4b243be2ba29847b1c097169b363716b72ad40088', 0),
(13, 'xTojixxx', 'mjblmarquez.it@tip.edu.ph', '$2y$10$skQCgfbYdVhVcpePL6dwbuBH/IILPjKItSW2OsYpNbB.n7ji9V5KW', '2025-05-06 08:26:08', '2025-05-06 08:31:20', '0e8a3074e99fbfb21cf80c78fe46c49408e6de85dacd31d7bfe9f95ae2b2ad81', 0),
(14, 'cyberclash', 'asd@gmail.com', '$2y$10$1dYwCHcLcPgoE7G5tBI1oeJgFR5zkP8E2sWOzK1vYk8bzile7pKEm', '2025-05-06 08:31:36', '2025-05-06 08:31:44', '39044e7866ecf3123bdd33f93128e85a1db1affc2952ce99df4a05be4c0ed45d', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `api_key` (`api_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
