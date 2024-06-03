-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 11:20 AM
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
-- Database: `app_youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `created_date`, `updated_date`) VALUES
(1, 'Nature', '2024-05-14 14:14:31', '2024-05-14 14:14:31'),
(2, 'Vlog', '2024-05-14 14:14:55', '2024-05-14 14:14:55'),
(3, 'Education', '2024-05-14 14:15:11', '2024-05-14 14:15:11'),
(4, 'Games', '2024-05-14 14:15:19', '2024-05-14 14:15:19'),
(5, 'News', '2024-05-14 14:15:26', '2024-05-14 14:15:26'),
(12, 'Games', '2024-05-20 15:23:19', '2024-05-20 15:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int NOT NULL,
  `author_id` int DEFAULT NULL,
  `channel_name` varchar(255) DEFAULT NULL,
  `age_group` int DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `tags` blob,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `author_id`, `channel_name`, `age_group`, `description`, `image`, `tags`, `created_date`, `updated_date`) VALUES
(1, 19, 'Creative', 1, 'heeee', '1716280068.jpg', 0x613a313a7b693a303b733a353a226a6f6e6e79223b7d, '2024-05-21 13:57:48', '2024-05-21 13:57:48'),
(2, 19, 'DameWhoGames.', 2, 'Enter text here...', '1716280213.jpg', 0x613a313a7b693a303b733a363a226f70706f7633223b7d, '2024-05-21 14:00:13', '2024-05-21 14:00:13'),
(3, 19, 'Thee Social Drip', 1, 'hiiiiiiiiii', '1716280245.jpg', 0x613a313a7b693a303b733a373a226f70706f76336e223b7d, '2024-05-21 14:00:45', '2024-05-21 14:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `video_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `comment` text,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `video_id`, `author_id`, `comment`, `created_date`, `updated_date`) VALUES
(1, 2, 17, 'hii', '2024-05-23 14:33:57', '2024-05-23 14:33:57'),
(4, 2, 17, 'helloo', '2024-05-23 14:34:46', '2024-05-23 14:34:46'),
(5, 3, 17, 'how are you', '2024-05-23 14:36:17', '2024-05-23 14:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int NOT NULL,
  `channel_id` int DEFAULT NULL,
  `playlist_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `channel_id`, `playlist_name`, `description`, `created_date`, `updated_date`) VALUES
(1, 1, 'pink noise', 'heee', '2024-05-21 13:58:08', '2024-05-21 13:58:08'),
(2, 1, 'Soothing music', 'interesting', '2024-05-21 13:59:46', '2024-05-21 13:59:46'),
(3, 3, 'Heart noise', 'brand', '2024-05-21 14:01:08', '2024-05-21 14:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `postal_code`, `image`, `created_date`, `updated_date`) VALUES
(1, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:32:06', '2024-05-09 16:32:06'),
(2, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:33:04', '2024-05-09 16:33:04'),
(3, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:33:52', '2024-05-09 16:33:52'),
(4, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:34:19', '2024-05-09 16:34:19'),
(5, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:34:29', '2024-05-09 16:34:29'),
(6, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:35:09', '2024-05-09 16:35:09'),
(7, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', NULL, '2024-05-09 16:35:22', '2024-05-09 16:35:22'),
(8, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703585154.jpeg', '2024-05-09 16:40:15', '2024-05-09 16:40:15'),
(9, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703585154.jpeg', '2024-05-09 16:42:19', '2024-05-09 16:42:19'),
(10, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703585154.jpeg', '2024-05-09 16:45:44', '2024-05-09 16:45:44'),
(11, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703585154.jpeg', '2024-05-09 16:46:00', '2024-05-09 16:46:00'),
(12, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '', '2024-05-09 16:56:36', '2024-05-09 16:56:36'),
(13, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '', '2024-05-09 16:57:07', '2024-05-09 16:57:07'),
(14, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703586176.jpeg', '2024-05-09 16:57:32', '2024-05-09 16:57:32'),
(15, 'muskaan', 'muskaan', 'k@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703586176.jpeg', '2024-05-09 16:58:01', '2024-05-09 16:58:01'),
(16, 'muskaan', 'muskaan', 'myadav@gmail.com', '01324345455', '01324345455', 'cdfxdfsd', '1234', '1703586232.jpeg', '2024-05-09 16:58:16', '2024-05-09 16:58:16'),
(17, 'muskaan', 'muskaan', 'myadav@gmail.com', '123456789', '123456789', 'new amar nagar', '123456789', 'download (1).jpg', '2024-05-13 13:44:08', '2024-05-13 13:44:08'),
(18, 'kajal', 'kajal', 'kajal@gmail.com', '123456789', '1234567890', 'new amar yadav', 'dxtfhxgj', 'download (1).jpg', '2024-05-13 13:44:42', '2024-05-13 13:44:42'),
(19, 'Preet ', 'Preet ', 'preet@gmail.com', '123456789', '5436554765475', 'new amarr nagar', '54365432', 'download (1).jpg', '2024-05-14 13:10:26', '2024-05-14 13:10:26'),
(20, 'muskaan', 'muskaan', 'myadav9760@gmail.com', '123456789', '1234567890', 'new amar nagar', '1225364', 'download (1).jpg', '2024-05-15 13:10:08', '2024-05-15 13:10:08'),
(21, 'muskaan', 'muskaan', 'myadav@gmail.com', '1233444', '34567890', '23456789', '2345678', '1715928384.mp4', '2024-05-17 12:16:24', '2024-05-17 12:16:24'),
(22, 'harjas', 'harjas', 'harjas@gmail.com', '123456789', '23456789', '3456789p', '5423y57', '1715928617.mp4', '2024-05-17 12:20:17', '2024-05-17 12:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int NOT NULL,
  `channel_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `playlist_id` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `category` int DEFAULT NULL,
  `tags` blob,
  `video_name` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `like` int NOT NULL DEFAULT '0',
  `dislike` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `channel_id`, `author_id`, `playlist_id`, `description`, `video`, `category`, `tags`, `video_name`, `created_date`, `updated_date`, `like`, `dislike`) VALUES
(2, 1, 19, 1, 'heee', '1716280303.mp4', 2, 0x613a313a7b693a303b733a343a227669766f223b7d, '1716280303.mp4', '2024-05-21 14:01:43', '2024-05-21 14:01:43', 0, 0),
(3, 1, 19, 1, 'heee', '1716281139.mp4', 1, 0x613a313a7b693a303b733a363a226f70706f7633223b7d, '1716281139.mp4', '2024-05-21 14:15:39', '2024-05-21 14:15:39', 0, 0),
(4, 1, 19, 1, 'brand', '1716281165.mp4', 3, 0x613a313a7b693a303b733a343a226f70706f223b7d, '1716281165.mp4', '2024-05-21 14:16:05', '2024-05-21 14:16:05', 0, 0),
(5, 1, 19, 1, 'heeee', '1716281208.mp4', 4, 0x613a313a7b693a303b733a343a226f70706f223b7d, '1716281208.mp4', '2024-05-21 14:16:48', '2024-05-21 14:16:48', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `video_dislike`
--

CREATE TABLE `video_dislike` (
  `id` int NOT NULL,
  `author_id` int DEFAULT NULL,
  `video_id` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_dislike`
--

INSERT INTO `video_dislike` (`id`, `author_id`, `video_id`, `created_date`, `updated_date`) VALUES
(1, 19, 5, '2024-05-27 15:07:46', '2024-05-27 15:07:46'),
(2, 19, 5, '2024-05-27 15:08:07', '2024-05-27 15:08:07'),
(3, 19, 2, '2024-05-28 13:37:59', '2024-05-28 13:37:59'),
(4, 19, 2, '2024-05-28 13:38:00', '2024-05-28 13:38:00'),
(5, 19, 2, '2024-05-28 13:40:57', '2024-05-28 13:40:57'),
(6, 19, 2, '2024-05-28 13:42:00', '2024-05-28 13:42:00'),
(7, 19, 2, '2024-05-28 13:42:08', '2024-05-28 13:42:08'),
(8, 19, 2, '2024-05-28 13:43:42', '2024-05-28 13:43:42'),
(9, 19, 2, '2024-05-28 13:43:46', '2024-05-28 13:43:46'),
(10, 19, 2, '2024-05-28 13:44:26', '2024-05-28 13:44:26'),
(11, 19, 2, '2024-05-28 13:44:50', '2024-05-28 13:44:50'),
(12, 19, 2, '2024-05-28 13:46:03', '2024-05-28 13:46:03'),
(13, 19, 2, '2024-05-28 13:47:15', '2024-05-28 13:47:15'),
(14, 19, 2, '2024-05-28 13:47:32', '2024-05-28 13:47:32'),
(15, 19, 2, '2024-05-28 13:47:50', '2024-05-28 13:47:50'),
(16, 19, 2, '2024-05-28 13:48:29', '2024-05-28 13:48:29'),
(17, 19, 2, '2024-05-28 13:49:55', '2024-05-28 13:49:55'),
(18, 19, 2, '2024-05-28 13:49:55', '2024-05-28 13:49:55'),
(19, 19, 2, '2024-05-28 13:49:56', '2024-05-28 13:49:56'),
(20, 19, 2, '2024-05-28 13:49:56', '2024-05-28 13:49:56'),
(21, 19, 2, '2024-05-28 13:49:56', '2024-05-28 13:49:56'),
(22, 19, 2, '2024-05-28 13:49:56', '2024-05-28 13:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `video_like`
--

CREATE TABLE `video_like` (
  `id` int NOT NULL,
  `video_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video_like`
--

INSERT INTO `video_like` (`id`, `video_id`, `author_id`, `created_date`, `updated_date`) VALUES
(1, 2, 19, '2024-05-28 13:28:51', '2024-05-28 13:28:51'),
(2, 4, 19, '2024-05-28 16:17:23', '2024-05-28 16:17:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_dislike`
--
ALTER TABLE `video_dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_like`
--
ALTER TABLE `video_like`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video_dislike`
--
ALTER TABLE `video_dislike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `video_like`
--
ALTER TABLE `video_like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
