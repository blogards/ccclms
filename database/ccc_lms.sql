-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2022 at 01:41 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio-visual`
--

DROP TABLE IF EXISTS `audio-visual`;
CREATE TABLE IF NOT EXISTS `audio-visual` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `grade_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audio-visual`
--

INSERT INTO `audio-visual` (`id`, `barcode`, `title`, `grade_level`, `subject`, `duration`, `copyright`, `date_received`, `created_at`, `updated_at`) VALUES
(1, 'AVM-1', 'Tests', 'Grade 1', 'Test', '1:32:50', 'Test', '2020-05-03', '2022-02-28 03:23:00', '2022-04-04 06:40:33'),
(7, 'AVM-2', 'Test', 'test', 'test', '1:25:33', 'test', '2022-02-28', '2022-02-28 03:59:15', '2022-04-04 06:40:37'),
(8, 'AVM-3', 'Test', 'Grade 2', 'Test', '1:30:00', 'Test', '2020-07-15', '2022-02-28 05:02:00', '2022-04-04 06:40:40'),
(9, 'AVM-4', 'Test', 'Grade 2', 'Test', '33:00', 'Test', '2022-02-28', '2022-02-28 05:03:34', '2022-04-04 06:40:46'),
(10, 'AVM-5', 'Test', 'Grade 8', 'Test', '26:00', 'Test', '2013-04-18', '2022-02-28 05:04:22', '2022-04-04 06:40:51'),
(11, 'AVM-6', 'The Horn of Victory', 'Grade 1', 'Test', '10:00', 'Test', '2015-12-22', '2022-02-28 05:05:26', '2022-04-04 06:40:54'),
(12, 'AVM-7', 'This Side of Paradise', 'Grade 9', '2', '01:45:00', 'Test', '2019-06-12', '2022-02-28 05:11:03', '2022-04-04 06:40:56'),
(13, 'AVM-8', 'The House of Mirth', 'Grade 10', '1', '01:34:05', 'Test', '2020-11-22', '2022-02-28 05:13:17', '2022-04-04 06:41:02'),
(14, 'AVM-9', 'Pale Fire', 'Grade 7', 'Test', '48:05', 'Test', '2018-10-25', '2022-02-28 05:14:49', '2022-04-04 06:46:43'),
(15, 'AVM-10', 'test', 'testing', 'test', '1:25:33', 'test', '2022-02-28', '2022-02-28 05:24:04', '2022-04-04 06:46:54'),
(16, 'AVM-11', 'test', 'test', 'test', 'test', 'test', '2022-02-28', '2022-02-28 05:24:40', '2022-04-04 06:47:21'),
(17, 'AVM-12', 'A Conversation About Teaching', 'K-5', 'Scienceline', '25 mins', '123', '2021-01-10', '2022-02-28 05:26:57', '2022-02-28 05:26:57'),
(18, 'AVM-13', 'Harry Potter', 'Grade 12', '4', '02:03:54', 'Test', '2018-07-17', '2022-02-28 05:27:44', '2022-04-04 06:46:33'),
(19, 'AVM-14', 'Test', 'Test', 'Test', 'Test', 'Test', '2022-02-28', '2022-02-28 05:33:41', '2022-02-28 05:33:41'),
(20, 'AVM-15', 'Test', 'Grade 1', 'test', '1:25:33', 'test', '2022-03-02', '2022-03-02 06:30:03', '2022-04-04 06:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `edition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `publisher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pages` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cash_price` int DEFAULT NULL,
  `sof` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `barcode`, `title`, `edition`, `volume`, `author`, `publisher`, `class`, `pages`, `remarks`, `date_received`, `year`, `cash_price`, `sof`, `created_at`, `updated_at`) VALUES
(16, 'BKS-5', 'test', 'test', 'test', 'test', 'test', 'test', 12, 'test', '2022-03-02', '2020', 14, 'test', '2022-03-02 06:37:44', '2022-04-04 06:55:10'),
(14, 'BKS-4', 'test', 'test', 'test', 'testing', 'test', 'test', 21, 'test', '2022-02-28', '2020', 10, 'test', '2022-02-28 05:03:39', '2022-04-04 06:55:00'),
(11, 'ZZZ-011', 'tests', 'test', 'test', 'test', 'test', 'test', 1200, 'test', '2021-04-08', '2022', 1900, 'test', '2022-02-22 05:21:23', '2022-04-04 06:54:33'),
(12, 'ZZZ-123', 'tests', 'test', 'test', 'test', 'test', 'test', 700, 'test', '2022-04-08', '2020', 750, 'test', '2022-02-22 08:54:34', '2022-04-04 06:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

DROP TABLE IF EXISTS `borrowers`;
CREATE TABLE IF NOT EXISTS `borrowers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `barangay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `contact`, `street`, `barangay`, `city`, `province`, `postal_code`, `created_at`, `updated_at`) VALUES
(6, 'Paul', 'Meyer', 'Watson', 'BLIS', '1st Year', '123123123123', 'Lopez St.', 'Calero', 'Calapan City', 'Oriental MIndoro', '5200', '2022-02-03', '2022-02-03'),
(10, 'William', 'Clarkson', 'Meyers', 'BSIS', '2nd Year', '123123123123', 'Lopez St.', 'Calero', 'Calapan City', 'Oriental Mindoro', '5200', '2022-02-04', '2022-02-04'),
(11, 'Arnold', 'Williss', 'Williams', 'BSIS', '1st Year', '123123123123', 'Lopez St.', 'Calero', 'Calapan City', 'Oriental Mindoro', '5200', '2022-02-04', '2022-02-04'),
(12, 'Rauls', 'Raul', 'Raul', 'BSIS', '4th Year', '123123123123', 'Lopez St.', 'Calero', 'Calapan City', 'Oriental Mindoro', '5200', '2022-02-04', '2022-02-04'),
(15, 'test', 'test', 'test', '', '2nd Year', 'test', 'Corregidor', 'San Vicente West', 'Calapan', 'Oriental Mindoro', '5200', '2022-02-25', '2022-02-25'),
(16, 'Pauls', 'test', 'test', 'test', '2nd Year', '123123123123', 'Corregidor', 'San Vicente West', 'Calapan City', 'Oriental Mindoro', '5200', '2022-02-25', '2022-02-25'),
(17, 'Paolo', 'Flores', 'Malabanan', 'BSIS', '4th Year', '1234567890', 'Lopez St', 'Libis', 'Calapan City', 'Oriental Mindoro', '5200', '2022-03-02', '2022-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

DROP TABLE IF EXISTS `journals`;
CREATE TABLE IF NOT EXISTS `journals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `copy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `barcode`, `title`, `volume`, `copy`, `date`, `issn`, `subject`, `created_at`, `updated_at`) VALUES
(3, 'JRNL-3', 'Journal test', 'Test', '10', '2020-06-24', 'Test', 'Subject Test', '2022-03-02 06:13:34', '2022-04-04 07:41:34'),
(4, 'JRNL-4', 'Journal 1', 'Volume 5', '12', '2022-04-04', '12346', 'testing', '2022-04-04 07:38:52', '2022-04-04 07:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `library-resources`
--

DROP TABLE IF EXISTS `library-resources`;
CREATE TABLE IF NOT EXISTS `library-resources` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library-resources`
--

INSERT INTO `library-resources` (`id`, `barcode`, `title`, `category`, `status`, `created_at`, `updated_at`) VALUES
(72, 'JRNL-4', 'Journal 1', 'Government Publications', 'Available', '2022-04-04 07:38:52', '2022-04-04 07:40:43'),
(70, 'BKS-5', 'test', 'Books', 'Available', '2022-03-02 06:37:44', '2022-04-04 06:55:10'),
(14, 'AVM-1', 'Tests', 'Audio Visual Material', 'Available', '2022-02-26 15:08:25', '2022-04-04 06:40:33'),
(11, 'ZZZ-011', 'tests', 'Books', 'Available', '2022-02-22 05:21:23', '2022-04-04 06:54:33'),
(12, 'ZZZ-123', 'tests', 'Books', 'Available', '2022-02-22 08:54:34', '2022-04-04 06:54:57'),
(56, 'GVP-4', 'Test', 'Government Publications', 'Available', '2022-03-01 02:05:39', '2022-04-04 06:55:47'),
(20, 'AVM-2', 'Test', 'Audio Visual Material', 'Available', '2022-02-28 03:25:24', '2022-04-04 06:40:37'),
(23, 'AVM-3', 'Test', 'Audio Visual Material', 'Available', '2022-02-28 05:02:00', '2022-04-04 06:40:40'),
(24, 'AVM-4', 'Test', 'Audio Visual Material', 'Available', '2022-02-28 05:03:34', '2022-04-04 06:40:46'),
(25, 'BKS-4', 'test', 'Books', 'Available', '2022-02-28 05:03:39', '2022-04-04 06:55:00'),
(26, 'AVM-5', 'Test', 'Audio Visual Material', 'Available', '2022-02-28 05:04:22', '2022-04-04 06:40:51'),
(27, 'AVM-6', 'The Horn of Victory', 'Audio Visual Material', 'Available', '2022-02-28 05:05:26', '2022-04-04 06:40:54'),
(28, 'AVM-7', 'This Side of Paradise', 'Audio Visual Material', 'Available', '2022-02-28 05:11:03', '2022-04-04 06:40:56'),
(29, 'MNS-3', 'Meol', 'Manuscript/Narrative', 'Available', '2022-02-28 05:13:14', '2022-04-04 07:08:07'),
(30, 'AVM-8', 'The House of Mirth', 'Audio Visual Material', 'Available', '2022-02-28 05:13:17', '2022-04-04 06:41:02'),
(31, 'AVM-9', 'Pale Fire', 'Audio Visual Material', 'Available', '2022-02-28 05:14:49', '2022-04-04 06:46:43'),
(33, 'AVM-10', 'test', 'Audio Visual Material', 'Available', '2022-02-28 05:24:04', '2022-04-04 06:46:54'),
(34, 'AVM-11', 'test', 'Audio Visual Material', 'Available', '2022-02-28 05:24:40', '2022-04-04 06:47:21'),
(69, 'AVM-15', 'Test', 'Audio Visual Material', 'Available', '2022-03-02 06:30:03', '2022-04-04 06:47:26'),
(36, 'AVM-13', 'Harry Potter', 'Audio Visual Material', 'Available', '2022-02-28 05:27:44', '2022-04-04 06:46:33'),
(48, 'MNS-7', 'Student Teaching Program/Manuscript', 'Manuscript/Narrative', 'Available', '2022-02-28 13:43:46', '2022-04-04 07:08:27'),
(40, 'GVP-1', 'Test', 'Government Publications', 'Available', '2022-02-28 06:09:30', '2022-04-04 06:55:40'),
(41, 'MNS-4', 'Student Teaching Program/Manuscript', 'Manuscript/Narrative', 'Available', '2022-02-28 06:21:52', '2022-04-04 07:07:37'),
(46, 'MNS-5', 'Student Teaching Program/Manuscript', 'Manuscript/Narrative', 'Available', '2022-02-28 13:41:25', '2022-04-04 07:08:16'),
(47, 'MNS-6', 'Student Teaching Program/Manuscript', 'Manuscript/Narrative', 'Available', '2022-02-28 13:42:34', '2022-04-04 07:08:19'),
(49, 'MNS-8', 'Student Teaching Program/Manuscript', 'Manuscript/Narrative', 'Available', '2022-02-28 13:45:02', '2022-04-04 07:08:31'),
(50, 'MNS-9', 'Student Teaching Narrative Report', 'Manuscript/Narrative', 'Available', '2022-02-28 13:46:03', '2022-04-04 07:08:46'),
(51, 'MNS-10', 'Student Teaching Narrative Report', 'Manuscript/Narrative', 'Available', '2022-02-28 13:46:54', '2022-04-04 07:08:51'),
(52, 'MNS-11', 'Student Teaching Narrative Report', 'Manuscript/Narrative', 'Available', '2022-02-28 13:47:43', '2022-04-04 07:08:56'),
(53, 'MNS-12', 'Student Teaching Narrative Report', 'Manuscript/Narrative', 'Available', '2022-02-28 13:48:17', '2022-04-04 07:09:00'),
(54, 'MNS-13', 'Student Teaching Narrative Report', 'Manuscript/Narrative', 'Available', '2022-02-28 13:53:21', '2022-04-04 07:09:06'),
(57, 'GVP-3', 'The book of beginning', 'Government Publications', 'Available', '2022-03-01 02:06:56', '2022-04-04 06:56:20'),
(58, 'GVP-5', 'Test', 'Government Publications', 'Available', '2022-03-01 02:08:07', '2022-04-04 06:56:30'),
(59, 'GVP-6', 'Calapan Books', 'Government Publications', 'Available', '2022-03-01 05:43:56', '2022-04-04 06:56:37'),
(60, 'GVP-7', 'test', 'Government Publications', 'Available', '2022-03-01 05:44:56', '2022-04-04 06:56:55'),
(61, 'GVP-8', 'test', 'Government Publications', 'Available', '2022-03-01 05:53:38', '2022-04-04 06:57:03'),
(62, 'GVP-9', 'test', 'Government Publications', 'Available', '2022-03-01 06:00:19', '2022-04-04 06:57:08'),
(63, 'THD-1', 'Test', 'Thesis and Dissertation', 'Available', '2022-03-02 02:58:31', '2022-04-04 07:06:28'),
(71, 'JRNL-3', 'Journal test', 'Government Publications', 'Available', '2022-04-04 07:36:35', '2022-04-04 07:41:34'),
(68, 'MNS-14', 'Student Teaching Narrative Report', 'Manuscript/Narrative', 'Available', '2022-03-02 06:27:12', '2022-04-04 07:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `manuscript`
--

DROP TABLE IF EXISTS `manuscript`;
CREATE TABLE IF NOT EXISTS `manuscript` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manuscript`
--

INSERT INTO `manuscript` (`id`, `barcode`, `title`, `author`, `course`, `year`, `created_at`, `updated_at`) VALUES
(6, 'MNS-3', 'Meol', 'Melon', 'Physics', '2020', '2022-02-28 05:13:14', '2022-04-04 07:08:07'),
(7, 'MNS-4', 'Student Teaching Program/Manuscript', 'Yna Graciela Barcelona', 'BEED', '2014', '2022-02-28 06:21:52', '2022-04-04 07:07:37'),
(9, 'MNS-5', 'Student Teaching Program/Manuscript', 'Hanna Rose Masongsong', 'BSED MATH', '2015', '2022-02-28 13:41:25', '2022-04-04 07:08:16'),
(10, 'MNS-6', 'Student Teaching Program/Manuscript', 'Jarynne Mae Panes', 'BSED MATH', '2015', '2022-02-28 13:42:34', '2022-04-04 07:08:19'),
(11, 'MNS-7', 'Student Teaching Program/Manuscript', 'May Sambile', 'BSED PHYSCI', '2015', '2022-02-28 13:43:46', '2022-04-04 07:08:27'),
(12, 'MNS-8', 'Student Teaching Program/Manuscript', 'Roland Panganiban', 'BSED MATH', '2014', '2022-02-28 13:45:02', '2022-04-04 07:08:31'),
(13, 'MNS-9', 'Student Teaching Narrative Report', 'Jessa Magnaye', 'BSED PHYSCI', '2016', '2022-02-28 13:46:03', '2022-04-04 07:08:46'),
(14, 'MNS-10', 'Student Teaching Narrative Report', 'Alfrank John de Guzman', 'BSED PHYSCI', '2016', '2022-02-28 13:46:54', '2022-04-04 07:08:51'),
(15, 'MNS-11', 'Student Teaching Narrative Report', 'Jethro Madarang', 'BSED MATH', '2016', '2022-02-28 13:47:43', '2022-04-04 07:08:56'),
(16, 'MNS-12', 'Student Teaching Narrative Report', 'Marie Joy Hernandez', 'BSED MATH', '2016', '2022-02-28 13:48:17', '2022-04-04 07:09:00'),
(17, 'MNS-13', 'Student Teaching Narrative Report', 'Danica Joy Cueto', 'BSED PHYSCI', '2016', '2022-02-28 13:53:21', '2022-04-04 07:09:06'),
(18, 'MNS-14', 'Student Teaching Narrative Report', 'test', 'test', '2020', '2022-03-02 06:27:12', '2022-04-04 07:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `copy` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `issn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bacode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `barcode`, `title`, `volume`, `copy`, `date`, `issn`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'GVP-1', 'Test', 'Test', 10, '2020-04-24', 'Test', 'Test', '2022-02-28 06:08:05', '2022-04-04 06:55:40'),
(5, 'GVP-4', 'Test', 'test', 123, '2022-03-01', 'test', 'testing', '2022-03-01 02:05:39', '2022-04-04 06:55:47'),
(6, 'GVP-3', 'The book of beginning', 'Volume 2', 12, '2022-03-01', '12313dsadsaqe123', 'Test', '2022-03-01 02:06:56', '2022-04-04 06:56:20'),
(7, 'GVP-5', 'Test', 'test', 123, '2022-03-01', 'test', 'Test', '2022-03-01 02:08:07', '2022-04-04 06:56:30'),
(8, 'GVP-6', 'Calapan Books', 'Vol. 2', 2, '2022-01-03', '123456789', 'None', '2022-03-01 05:43:56', '2022-04-04 06:56:37'),
(9, 'GVP-7', 'test', 'Vol. 5', 1, '2022-02-07', '12346', 'Test', '2022-03-01 05:44:56', '2022-04-04 06:56:55'),
(10, 'GVP-8', 'test', 'Volume 5', 7, '2028-01-12', '4576fskhf', 'none', '2022-03-01 05:53:38', '2022-04-04 06:57:03'),
(11, 'GVP-9', 'test', 'Volume 3', 4, '2022-01-05', '123456789', 'Test', '2022-03-01 06:00:19', '2022-04-04 06:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

DROP TABLE IF EXISTS `thesis`;
CREATE TABLE IF NOT EXISTS `thesis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `barcode`, `title`, `author`, `year`, `created_at`, `updated_at`) VALUES
(1, 'THD-1', 'Test', 'Arthur Leni', '2009', NULL, '2022-04-04 07:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `profile_img`, `created_at`, `updated_at`) VALUES
(11, 'test3@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Approved', 'default.jpg', '2022-02-04', '2022-03-29'),
(10, 'test2@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Approved', 'default.jpg', '2022-02-04', '2022-03-18'),
(6, 'test@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Approved', 'rayul-_M6gy9oHgII-unsplash.jpg', '2022-02-03', '2022-02-03'),
(12, 'test4@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Approved', 'default.jpg', '2022-02-04', '2022-03-30'),
(15, 'test5@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'User', 'Approved', 'default.jpg', '0000-00-00', '2022-03-18'),
(16, 'test@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Approve', 'default.jpg', '2022-02-25', '2022-02-25'),
(17, 'admin@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Pending', 'default.jpg', '2022-03-02', '2022-03-02'),
(18, 'wenz@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'inactive', 'default.jpg', '2022-03-30', '2022-03-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
