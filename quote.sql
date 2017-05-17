-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 01:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quote`
--
CREATE DATABASE IF NOT EXISTS `quote` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quote`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alaa', '2016-10-09 07:40:00', '2016-10-09 07:40:00'),
(4, 'Sasuke', '2016-10-09 08:47:30', '2016-10-09 08:47:30'),
(6, 'Moa', '2016-10-09 09:02:55', '2016-10-09 09:02:55'),
(7, 'Alaaa', '2016-10-09 09:03:09', '2016-10-09 09:03:09'),
(8, 'Author', '2016-10-09 09:04:05', '2016-10-09 09:04:05'),
(9, 'Iocac', '2016-10-09 09:04:31', '2016-10-09 09:04:31'),
(10, 'Wawaw', '2016-10-09 09:04:41', '2016-10-09 09:04:41'),
(11, 'Pagination', '2016-10-09 09:04:55', '2016-10-09 09:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_10_09_080714_create_authors_table', 1),
('2016_10_09_080731_create_quotes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `quote` text NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'hey first quote', 1, '2016-10-09 07:40:00', '2016-10-09 07:40:00'),
(2, 'seon quote', 1, '2016-10-09 07:44:39', '2016-10-09 07:44:39'),
(6, 'aaa', 4, '2016-10-09 08:47:30', '2016-10-09 08:47:30'),
(8, 'asasasa', 6, '2016-10-09 09:02:55', '2016-10-09 09:02:55'),
(9, 'pagination yaaaa', 7, '2016-10-09 09:03:09', '2016-10-09 09:03:09'),
(10, 'i love sasuke', 4, '2016-10-09 09:03:28', '2016-10-09 09:03:28'),
(11, 'assa', 8, '2016-10-09 09:04:05', '2016-10-09 09:04:05'),
(12, 'adadda', 9, '2016-10-09 09:04:31', '2016-10-09 09:04:31'),
(13, '\r\nasas', 10, '2016-10-09 09:04:41', '2016-10-09 09:04:41'),
(14, 'kjsksjsj', 11, '2016-10-09 09:04:55', '2016-10-09 09:04:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `author_quote_relation` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
