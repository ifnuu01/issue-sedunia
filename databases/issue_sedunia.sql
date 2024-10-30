-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2024 at 03:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issue_sedunia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE DATABASE IF NOT EXISTS `issue_sedunia`;

USE `issue_sedunia`;

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'front-end'),
(2, 'back-end'),
(3, 'full-stack');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `post_id` int DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`) VALUES
(11, 1, 1, 'Great introduction to HTML!', '2024-10-27 00:55:11'),
(12, 1, 2, 'CSS basics are a must for any front-end developer.', '2024-10-27 00:55:11'),
(13, 1, 3, 'JavaScript really brings webpages to life!', '2024-10-27 00:55:11'),
(14, 1, 4, 'Node.js is powerful for backend work!', '2024-10-27 00:55:11'),
(15, 1, 5, 'Express makes API development simpler.', '2024-10-27 00:55:11'),
(16, 2, 1, 'HTML is indeed the foundation. Thanks for sharing!', '2024-10-27 00:55:11'),
(17, 2, 6, 'Databases are an integral part of full-stack development.', '2024-10-27 00:55:11'),
(20, 2, 3, 'JavaScript is versatile and essential for web development.', '2024-10-27 00:55:11'),
(21, 1, 2, 'Aku lho jago', '2024-10-27 02:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(255) DEFAULT NULL,
  `watching_counter` int DEFAULT '0',
  `share_counter` int DEFAULT '0',
  `isSolve` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `content`, `created_at`, `photo`, `watching_counter`, `share_counter`, `isSolve`) VALUES
(1, 1, 1, 'Introduction to HTML', 'HTML is the foundation of the web...', '2024-10-27 00:54:56', 'img/posts/html.jpg', 20, 0, 0),
(2, 1, 1, 'CSS Basics', 'Styling with CSS is essential for front-end...', '2024-10-27 00:54:56', 'img/posts/css.jpg', 0, 0, 0),
(3, 1, 2, 'JavaScript Essentials', 'Learn JavaScript to add interactivity...', '2024-10-27 00:54:56', 'img/posts/javascript.jpg', 0, 0, 0),
(4, 2, 2, 'Backend with Node.js', 'Node.js allows you to run JavaScript on the server...', '2024-10-27 00:54:56', 'img/posts/node.jpg', 0, 0, 0),
(5, 2, 2, 'Express.js for REST APIs', 'Express is a minimalistic web framework...', '2024-10-27 00:54:56', 'img/posts/express.jpg', 0, 0, 0),
(6, 2, 3, 'Database Basics', 'Understanding databases is crucial...', '2024-10-27 00:54:56', 'img/posts/database.jpg', 0, 0, 0),
(13, 1, 1, 'malas', 'coba coba aja', '2024-10-27 02:30:40', 'img/posts/post_671da5d0b25c41.58708372.jpeg', 0, 0, 0),
(14, 1, 2, 'Aku lho back-end', 'apa aja', '2024-10-27 02:34:59', NULL, 0, 0, 0),
(15, 1, 1, 'aku', 'coba deh', '2024-10-27 03:13:38', 'img/posts/post_671dafe2182ed2.46440354.jpeg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT 'Hai selamat datang',
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'img/profiles/profile.jpg',
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `bio`, `email`, `password`, `photo`, `role`, `created_at`) VALUES
(1, 'johndoe', 'John Doe', 'Hai selamat datang', 'johndoe@example.com', 'password123', 'img/profiles/profile.jpg', 'user', '2024-10-27 00:54:56'),
(2, 'janedoe', 'Jane Doe', 'Hai selamat datang', 'janedoe@example.com', 'password123', 'img/profiles/profile.jpg', 'user', '2024-10-27 00:54:56'),
(3, 'adminuser', 'Admin User', 'Hai selamat datang', 'admin@example.com', 'adminpassword', 'img/profiles/profile.jpg', 'admin', '2024-10-27 00:54:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
