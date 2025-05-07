-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 11:10 AM
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
  `username` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `media` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `isAnonymous` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `user_id`, `username`, `created_at`, `updated_at`, `media`, `category`, `isAnonymous`) VALUES
(46, 'test', 'test', 13, 'Anonymous', '2025-05-06 23:48:15', '2025-05-06 23:48:15', 'uploads/1746604095_581cc66353b4219fdf04.gif', 'General', 1),
(47, 'My life ', 'Welcome to Lost & Vocal, a community-driven blogging platform where personal experiences come to life. Here, individuals are invited to share their stories, thoughts, and reflections in an open space that encourages honesty, growth, and connection. At Lost & Vocal, we believe that everyone has a voice, and that voice deserves to be heard. Whether you\'re sharing your triumphs, struggles, or everything in between, our platform offers a space for self-expression and discovery. We provide a welcoming environment where people from all walks of life can explore, learn, and empathize with others\' journeys. Our mission is to create a place where your experiences matter—where you are encouraged to speak up, share your thoughts, and find support from a community of like-minded individuals. Life isn\'t always linear, and sometimes the most powerful moments come from the most vulnerable places. Join us in making Lost & Vocal a space where stories can be heard, voices can be raised, and personal experiences can inspire others.', 13, 'xTojixxx', '2025-05-06 23:53:33', '2025-05-06 23:53:33', 'uploads/1746604413_5e4196a86a30a06199ff.gif', 'Lifestyle', 0),
(51, 'vcvvcv', 'vcvcv', 15, 'wewe', '2025-05-07 00:08:07', '2025-05-07 00:08:07', 'uploads/1746605287_50ee5780ea8a8138ab34.gif', 'Health', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_interactions`
--

CREATE TABLE `post_interactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('like','comment') NOT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Bonnyqt', 'mjblmarquez@tip.edu.ph', '$2y$10$UKziBi8DBYEt8cZItwqmTOIC4bmjphiAV.U0LcPkDmAyOnIVMCKSm', '2025-05-05 07:51:48', '2025-05-06 18:20:01', '54431fc9d7402eec6f1901d4b243be2ba29847b1c097169b363716b72ad40088', 0),
(13, 'xTojixxx', 'mjblmarquez.it@tip.edu.ph', '$2y$10$skQCgfbYdVhVcpePL6dwbuBH/IILPjKItSW2OsYpNbB.n7ji9V5KW', '2025-05-06 08:26:08', '2025-05-06 21:50:15', '0e8a3074e99fbfb21cf80c78fe46c49408e6de85dacd31d7bfe9f95ae2b2ad81', 0),
(14, 'cyberclash', 'asd@gmail.com', '$2y$10$1dYwCHcLcPgoE7G5tBI1oeJgFR5zkP8E2sWOzK1vYk8bzile7pKEm', '2025-05-06 08:31:36', '2025-05-06 08:31:44', '39044e7866ecf3123bdd33f93128e85a1db1affc2952ce99df4a05be4c0ed45d', 0),
(15, 'wewe', 'bon@ticket.com', '$2y$10$AsNVd8FgOcsSxmmQmu.XTetcJNPbmZ8fWSyInI0x0bZPmzGx0/iq6', '2025-05-07 00:05:42', '2025-05-07 00:05:47', '53612b2c48fdad720d1f5478f48089eb3c8c9f5f35ff5c8f72eae45bd529318d', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_interactions`
--
ALTER TABLE `post_interactions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `post_interactions`
--
ALTER TABLE `post_interactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
