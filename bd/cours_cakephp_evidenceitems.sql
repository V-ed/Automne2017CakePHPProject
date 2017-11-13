-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 11:11 PM
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
-- Database: `cours_cakephp_evidenceitems`
--
CREATE DATABASE IF NOT EXISTS `cours_cakephp_evidenceitems` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cours_cakephp_evidenceitems`;

-- --------------------------------------------------------

--
-- Table structure for table `evidence_items`
--

DROP TABLE IF EXISTS `evidence_items`;
CREATE TABLE `evidence_items` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_sealed` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `officer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evidence_items`
--

INSERT INTO `evidence_items` (`id`, `description`, `origin`, `is_sealed`, `is_deleted`, `officer_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Hammer', 'Tool', 1, 0, 1, 1, '2017-10-01 09:52:44', '2017-10-03 03:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evidence_item_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `detail`, `evidence_item_id`, `created`, `modified`) VALUES
(1, 'hammer.jpg', 'files', 'Hammer Image', 1, '2017-10-01 10:20:13', '2017-10-03 21:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `officer_rank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `email`, `officer_rank_id`, `user_id`) VALUES
(1, 'guillaumemarcoux@gmail.com', 1, 1),
(2, 'officer@gmail.com', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `officer_ranks`
--

DROP TABLE IF EXISTS `officer_ranks`;
CREATE TABLE `officer_ranks` (
  `id` int(11) NOT NULL,
  `rank_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rank_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rank_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `officer_ranks`
--

INSERT INTO `officer_ranks` (`id`, `rank_code`, `rank_name`, `rank_description`) VALUES
(1, 'sgt', 'Sergeant', 'Sergeant of the US Police Department'),
(2, 'of', 'Officer', 'The most basic rank available to officers.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : FALSE | 1 : TRUE',
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `firstName`, `lastName`, `username`, `password`, `created`, `modified`) VALUES
(1, 1, 'Hacker', 'Man', 'V-ed', '$2y$10$Jm375SURCwRBd5sM1iafK.N5fAjSdzALuwDiLfiBR4ME09G/PeD/6', '2017-09-30 01:23:50', '2017-10-01 00:08:07'),
(2, 0, 'Regular', 'Dude', 'user', '$2y$10$CAgT/v11TgyxNx0QBF6krOqKmK8y31c3nH9SoIp5l/ISyyzLqt9eO', '2017-10-01 21:22:47', '2017-10-01 21:24:00'),
(3, 0, 'John', 'McGregor', 'officer', '$2y$10$gg2kyIOeO7dbVekhqb7spOQAzPQKHDmqgLN23Tm9X9GdYJR2snKLi', '2017-10-03 20:48:23', '2017-10-03 20:48:23'),
(4, 1, 'Ronald', 'Bonchemin', 'admin', '$2y$10$G6pCoN8oGSWn92D/kccl/.H1sunuAHTMz8W79B9.sMmIMtKWgI/GO', '2017-10-03 20:52:17', '2017-10-03 20:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evidence_items`
--
ALTER TABLE `evidence_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officer_id` (`officer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidence_item_id` (`evidence_item_id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officer_rank_id` (`officer_rank_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `officer_ranks`
--
ALTER TABLE `officer_ranks`
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
-- AUTO_INCREMENT for table `evidence_items`
--
ALTER TABLE `evidence_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officer_ranks`
--
ALTER TABLE `officer_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidence_items`
--
ALTER TABLE `evidence_items`
  ADD CONSTRAINT `evidence_items_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evidence_items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`evidence_item_id`) REFERENCES `evidence_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_ibfk_1` FOREIGN KEY (`officer_rank_id`) REFERENCES `officer_ranks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `officers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
