-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobscout`
--
CREATE DATABASE IF NOT EXISTS `jobscout` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jobscout`;

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `initiated_by` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `activity_on` varchar(255) NOT NULL,
  `activity_type` varchar(255) NOT NULL,
  `activity_from_ip` varchar(255) NOT NULL,
  `activity_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `initiator_id` int(11) NOT NULL,
  `initiator_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `initiated_by`, `activity`, `activity_on`, `activity_type`, `activity_from_ip`, `activity_from`, `created_at`, `updated_at`, `initiator_id`, `initiator_type`) VALUES
(1, 'Hamza Naji', 'Applied for a job', '2023-05-01 19:55:05', 'apply', '::1', 'Chrome on Windows', '2023-05-01 14:10:05', '2023-05-01 14:10:05', 1, 'employee'),
(2, 'Hamza Naji', 'Applied for a job', '2023-05-02 09:52:35', 'apply', '::1', 'Chrome on Windows', '2023-05-02 04:07:35', '2023-05-02 04:07:35', 1, 'employee'),
(3, 'Hamza Naji', 'Applied for a job - <a href=\"http://localhost/jobscout/public/job/7\">Data Center Technician I</a>', '2023-05-03 07:29:40', 'apply', '::1', 'Chrome on Windows', '2023-05-03 01:44:40', '2023-05-03 01:44:40', 1, 'employee'),
(4, 'Hamza Naji', 'Applied for a job - <a href=\"http://localhost/jobscout/public/job/1\">Senior Laravel Developer</a>', '2023-05-13 17:43:30', 'apply', '::1', 'Chrome on Windows', '2023-05-13 11:58:30', '2023-05-13 11:58:30', 1, 'employee'),
(5, 'Hamza Naji', 'Applied for a job - <a href=\"http://localhost/jobscout/public/job/1\">Senior Laravel Developer</a>', '2023-05-13 18:44:14', 'apply', '::1', 'Chrome on Windows', '2023-05-13 12:59:14', '2023-05-13 12:59:14', 1, 'employee'),
(6, 'Hamza Naji', 'Applied for a job - <a href=\"http://localhost/jobscout/public/job/6\">Research Intern - Human-AI Experiences (HAX) Team</a>', '2023-05-17 18:07:03', 'apply', '::1', 'Chrome on Windows', '2023-05-17 12:22:03', '2023-05-17 12:22:03', 1, 'employee'),
(7, 'Hamza Naji', 'Applied for a job - <a href=\"http://localhost/jobscout/public/job/1\">Senior Laravel Developer</a>', '2023-05-18 19:13:57', 'apply', '::1', 'Chrome on Windows', '2023-05-18 13:28:57', '2023-05-18 13:28:57', 9, 'employee'),
(8, 'hamza naji', 'Applied for a job - <a href=\"http://127.0.0.1:8000/job/13\">Backend Engineer (Ruby on Rails)</a>', '2025-05-12 15:42:43', 'apply', '127.0.0.1', 'Chrome on Windows', '2025-05-12 14:42:43', '2025-05-12 14:42:43', 14, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` text DEFAULT NULL,
  `phone` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`, `otp`, `phone`) VALUES
(1, 'Naji Hamza', 'hamza.naji4011@gmail.com', '$2y$10$H0/BD7Tq0m0zCSQ6d3ySpOcDSfT2RJ0FziQ.rvk3yT5rndS69GVj6', 'hamzanaji.jpg', '', NULL, '2023-05-04 03:15:52', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boost_orders`
--

DROP TABLE IF EXISTS `boost_orders`;
CREATE TABLE `boost_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_price` varchar(255) NOT NULL,
  `tnxID` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `date_purchased` varchar(255) NOT NULL,
  `date_expired` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `last_message_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `isMarried` varchar(100) DEFAULT NULL,
  `dateOfBirth` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `isverified` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `designation`, `photo`, `website`, `token`, `phone`, `address`, `city`, `state`, `country`, `zip`, `gender`, `isMarried`, `dateOfBirth`, `bio`, `facebook`, `twitter`, `linkedin`, `instagram`, `github`, `isverified`, `created_at`, `updated_at`, `isDeleted`) VALUES
(14, 'hamza', 'naji', 'hamzanaji', 'hamzanaji@gmail.com', '$2y$10$YdWrcm8MXfBTtnpYxAQTa.kJY9YIeGv69PD3px7M4GraMaHsqqF.W', 'Web Developer', 'hamzanaji.png', 'https://www.linkedin.com/in/hamza-naji99/?lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3B1SlC5TxgRTaHC3sPKMp2%2Bw%3D%3D', '', '0612345678', '123', 'Casablanca', 'Casa-Settat', 'Morocco', NULL, NULL, 'Married', '2000-09-09', 'Hi! I\'m 24 years old, and I\'m currently studying to become a network engineer. I have a background in digital development, with a technical specialization in web development. I\'ve gained practical experience through freelancing as an agent and doing an internship at a web agency. Along the way, I\'ve picked up various certifications in programming, software engineering, and personal success.\r\nI\'m passionate about entrepreneurship, and I have a Tiktok channel where I post motivational videos, just for fun! I\'m also working on some exciting projects, like creating a digital holographic book. Recently, I got married, and I’m based in Morocco. I’m always looking to grow my skills and knowledge in both tech and business!', NULL, NULL, NULL, NULL, NULL, 1, '2025-05-12 12:56:01', '2025-05-12 13:22:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_applications`
--

DROP TABLE IF EXISTS `employee_applications`;
CREATE TABLE `employee_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `cover_letter` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `similarityScore` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_applications`
--

INSERT INTO `employee_applications` (`id`, `employee_id`, `job_id`, `cover_letter`, `status`, `created_at`, `updated_at`, `similarityScore`) VALUES
(24, 14, '13', 'dccscsc', 'Rejected', '2025-05-12 14:42:42', '2025-05-12 14:44:28', 60);

-- --------------------------------------------------------

--
-- Table structure for table `employee_bookmarks`
--

DROP TABLE IF EXISTS `employee_bookmarks`;
CREATE TABLE `employee_bookmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

DROP TABLE IF EXISTS `employers`;
CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) NOT NULL DEFAULT 'www..com',
  `token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL DEFAULT '0512345678',
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT 'Morocco',
  `zip` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `industry` int(11) DEFAULT NULL,
  `founded` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `hours_sunday` varchar(255) NOT NULL DEFAULT 'Closed',
  `hours_monday` varchar(255) NOT NULL DEFAULT '9 AM - 5 PM',
  `hours_tuesday` varchar(255) NOT NULL DEFAULT '9 AM - 5 PM',
  `hours_wednesday` varchar(255) NOT NULL DEFAULT '9 AM - 5 PM',
  `hours_thursday` varchar(255) NOT NULL DEFAULT '9 AM - 5 PM',
  `hours_friday` varchar(255) NOT NULL DEFAULT '9 AM - 5 PM',
  `hours_saturday` varchar(255) NOT NULL DEFAULT 'Closed',
  `map` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isverified` tinyint(4) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `employer_type` text DEFAULT NULL,
  `isSuspended` varchar(100) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `employer_name`, `email`, `username`, `password`, `firstname`, `lastname`, `logo`, `website`, `token`, `phone`, `address`, `city`, `state`, `country`, `zip`, `size`, `industry`, `founded`, `about`, `hours_sunday`, `hours_monday`, `hours_tuesday`, `hours_wednesday`, `hours_thursday`, `hours_friday`, `hours_saturday`, `map`, `facebook`, `twitter`, `linkedin`, `instagram`, `github`, `created_at`, `updated_at`, `isverified`, `address_id`, `employer_type`, `isSuspended`) VALUES
(37, 'Amazon Web Services', 'AWS@gmail.com', 'AWS', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'AWS', 'HR', 'AWS.png', 'www.aws.com', '', '0512345678', '7', 'Beni Mellal', 'Béni Mellal-Khénifra', 'Morocco', '40000', '2', 11, 'Seattle', 'Amazon Web Services, Inc. is a subsidiary of Amazon that provides on-demand cloud computing platforms and APIs to individuals, companies, and governments, on a metered, pay-as-you-go basis. Clients will often use this in combination with autoscaling.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 13:11:20', '2025-05-04 13:15:47', 1, 14, NULL, 'no'),
(36, 'Oracle', 'Oracle@gmail.com', 'Oracle', '$2y$10$me9e00jjwPXTELYAxjFc.u6R8hJj1puQbD0vVJV1FiWo8H0l8zgIe', 'Oracle', 'HR', 'Oracle.png', 'www.oracle.com', '', '0512345678', '6', 'Beni Mellal', 'Béni Mellal-Khénifra', 'Morocco', '40000', '2', 11, 'Austin', 'Oracle Corporation is an American multinational computer technology company headquartered in Austin, Texas. Co-founded in 1977 in Santa Clara, California, by Larry Ellison, who remains executive chairman, Oracle was the third-largest software company in the world in 2020 by revenue and market capitalization.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 13:04:51', '2025-05-04 13:08:44', 1, 14, NULL, 'no'),
(35, 'Atlassian', 'Atlassian@gmail.com', 'Atlassian', '$2y$10$H0/BD7Tq0m0zCSQ6d3ySpOcDSfT2RJ0FziQ.rvk3yT5rndS69GVj6', 'Atlassian', 'HR', 'Atlassian.png', 'www.Atlassian.com', '', '0512345678', '7', 'Agadir', 'Souss-Massa', 'Morocco', '30000', '4', 11, 'Sydney', 'Atlassian Corporation is an Australian-American proprietary software company that specializes in collaboration tools designed primarily for software development and project management.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 11:46:50', '2025-05-04 11:55:17', 1, 6, NULL, 'no'),
(34, 'GitHub', 'GitHub@gmail.com', 'GitHub', '$2y$10$H0/BD7Tq0m0zCSQ6d3ySpOcDSfT2RJ0FziQ.rvk3yT5rndS69GVj6', 'GitHub', 'HR', 'GitHub.png', 'www.GitHub.com', '', '0512345678', '2', 'Agadir', 'Souss-Massa', 'Morocco', '30000', '4', 11, 'San Francisco', 'GitHub is a proprietary developer platform that allows developers to create, store, manage, and share their code. It uses Git to provide distributed version control and GitHub itself provides access control, bug tracking, software feature requests, task management, continuous integration, and wikis for every project.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 11:27:36', '2025-05-04 11:33:23', 1, 6, NULL, 'no'),
(32, 'Microsoft', 'Microsoft@gmail.com', 'Microsoft', '$2y$10$H0/BD7Tq0m0zCSQ6d3ySpOcDSfT2RJ0FziQ.rvk3yT5rndS69GVj6', 'Microsoft', 'HR', 'microsoftlogo.png', 'www.Microsoft.com', '', '0512345678', '5', 'Casablanca', 'Casablanca-Settat', 'Morocco', '20000', '4', 11, 'Washington', 'Microsoft Corporation is an American multinational corporation and technology conglomerate headquartered in Redmond, Washington.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 10:25:21', '2025-05-04 11:09:08', 1, 1, NULL, 'no'),
(33, 'Google', 'Google@gmail.com', 'Google', '$2y$10$H0/BD7Tq0m0zCSQ6d3ySpOcDSfT2RJ0FziQ.rvk3yT5rndS69GVj6', 'Google', 'HR', 'google.png', 'www.Google.com', '', '0512345678', '3', 'Casablanca', 'Casablanca-Settat', 'Morocco', '20000', '4', 11, 'Menlo Park', 'Google LLC is an American multinational corporation and technology company focusing on online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, consumer electronics, and artificial intelligence.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 11:17:24', '2025-05-04 11:21:52', 1, 1, NULL, 'no'),
(38, 'IBM Cloud', 'IBMCloud@gmail.com', 'IBM Cloud', '$2y$10$tnGmLqxgkSXrC7l9FCwoo.MT73X5CdEjz0.zpjfvTjOziKFB.nhci', 'IBM Cloud', 'HR', 'IBM.PNG', 'www.ibm.com', '', '0512345678', '11', 'Rabat', 'Rabat-Salé-Kénitra', 'Morocco', '60000', NULL, NULL, 'Dallas', 'IBM Cloud (formerly known as Bluemix) is a set of cloud computing services for business offered by the information technology company IBM.', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 13:31:24', '2025-05-04 13:35:18', 1, NULL, NULL, 'no'),
(39, 'DigitalOcean', 'DigitalOcean@gmail.com', 'DigitalOcean', '$2y$10$jn.EQXyRGnxx20YARpBejuAE90Sn3m0sQWTvQLBP5Q0Ay4THsi2tW', 'DigitalOcean', 'HR', 'DigitalOcean.png', 'www.DigitalOcean.com', '', '0512345678', '11', 'Rabat', 'Rabat-Salé-Kénitra', 'Morocco', '60000', NULL, NULL, NULL, 'DigitalOcean Holdings, Inc. is an American multinational technology company and cloud service provider. The company is headquartered in New York City, New York, US, with 15 globally distributed data centers. DigitalOcean provides developers, startups, and SMBs with cloud infrastructure-as-a-service platforms', 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 13:38:56', '2025-05-04 13:39:19', 1, NULL, NULL, 'no'),
(40, 'Alibaba Cloud', 'Alibabacloud@gmail.com', 'AlibabaCloud', '$2y$10$NnESHoBxSINp.QWXGii2B.E0D.5OKT4BurizJ0NTYYT1cCT3ZEnoq', 'Alibaba Cloud', 'HR', 'Alibaba Cloud.png', 'www.AlibabaCloud.com', '', '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, NULL, 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 21:31:30', '2025-05-04 21:31:47', 1, NULL, NULL, 'no'),
(41, 'DHL', 'DHL@gmail.com', 'DHL', '$2y$10$dBRrsL0oO1EP9hARlYtKauu3iBqtJpBiLFk91ygypTM6HLD9Ts3hO', 'DHL', 'HR', 'DHL.png', 'www..com', '', '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, NULL, 'Closed', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', '9 AM - 5 PM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-04 21:36:54', '2025-05-04 21:37:10', 1, NULL, NULL, 'no'),
(43, 'FedEx', 'FedEx@gmail.com', 'FedEx', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'FedEx', 'HR', 'fedex.png', 'www.FedEx.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'FedEx is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(44, 'Maersk', 'Maersk@gmail.com', 'Maersk', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Maersk', 'HR', 'Maersk.png', 'www.Maersk.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Maersk is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(45, 'UPS', 'UPS@gmail.com', 'UPS', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'UPS', 'HR', 'UPS.png', 'www.UPS.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'UPS is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(46, 'Aramex', 'Aramex@gmail.com', 'Aramex', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Aramex', 'HR', 'Aramex.png', 'www.Aramex.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Aramex is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(47, 'Siemens', 'Siemens@gmail.com', 'Siemens', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Siemens', 'HR', 'Siemens.png', 'www.Siemens.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Siemens is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(48, 'Bosch', 'Bosch@gmail.com', 'Bosch', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Bosch', 'HR', 'Bosch.png', 'www.Bosch.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Bosch is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(49, 'ABB', 'ABB@gmail.com', 'ABB', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'ABB', 'HR', 'ABB.png', 'www.ABB.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'ABB is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(50, 'WSP', 'WSP@gmail.com', 'WSP', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'WSP', 'HR', 'WSP.png', 'www.WSP.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'WSP is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(51, 'Arup', 'Arup@gmail.com', 'Arup', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Arup', 'HR', 'Arup.png', 'www.Arup.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Arup is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(52, 'Orange', 'Orange@gmail.com', 'Orange', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Orange', 'HR', 'Orange.png', 'www.Orange.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Orange is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(53, 'Vodafone', 'Vodafone@gmail.com', 'Vodafone', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Vodafone', 'HR', 'Vodafone.png', 'www.Vodafone.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Vodafone is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(54, 'T-Mobile', 'T-Mobile@gmail.com', 'T-Mobile', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'T-Mobile', 'HR', 'T-Mobile.png', 'www.T-Mobile.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'T-Mobile is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(55, 'MTN', 'MTN@gmail.com', 'MTN', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'MTN', 'HR', 'MTN.png', 'www.MTN.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'MTN is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(56, 'Bouygues Telecom', 'BouyguesTelecom@gmail.com', 'BouyguesTelecom', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Bouygues Telecom', 'HR', 'Bouygues Telecom.png', 'www.BouyguesTelecom.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Bouygues Telecom is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(57, 'Pfizer', 'Pfizer@gmail.com', 'Pfizer', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Pfizer', 'HR', 'Pfizer.png', 'www.Pfizer.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Pfizer is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(58, 'Novartis', 'Novartis@gmail.com', 'Novartis', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Novartis', 'HR', 'Novartis.png', 'www.Novartis.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Novartis is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(59, 'Sanofi', 'Sanofi@gmail.com', 'Sanofi', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Sanofi', 'HR', 'Sanofi.png', 'www.Sanofi.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Sanofi is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(60, 'Roche', 'Roche@gmail.com', 'Roche', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Roche', 'HR', 'Roche.png', 'www.Roche.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Roche is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no'),
(61, 'Merck', 'Merck@gmail.com', 'Merck', '$2y$10$A5vDuw77FDy/2kcJGReKCux1RRN8SUgOqZAOuH2.dbUtbWZFZ6/SG', 'Merck', 'HR', 'Merck.png', 'www.Merck.com', NULL, '0512345678', NULL, NULL, NULL, 'Morocco', NULL, NULL, NULL, NULL, 'Merck is a leading company recognized for excellence in its field and commitment to innovation.', 'Closed', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', '9 PM - 5 AM', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `employer_awards`
--

DROP TABLE IF EXISTS `employer_awards`;
CREATE TABLE `employer_awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `award_name` varchar(255) NOT NULL,
  `award_year` varchar(255) NOT NULL,
  `award_description` text NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_locations`
--

DROP TABLE IF EXISTS `employer_locations`;
CREATE TABLE `employer_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employer_locations`
--

INSERT INTO `employer_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Casablanca, Morocco', NULL, NULL),
(2, 'Rabat, Morocco', NULL, NULL),
(3, 'Marrakesh, Morocco', NULL, NULL),
(4, 'Tangier, Morocco', NULL, NULL),
(5, 'Fes, Morocco', NULL, NULL),
(6, 'Agadir, Morocco', NULL, NULL),
(7, 'Oujda, Morocco', NULL, NULL),
(8, 'Kenitra, Morocco', NULL, NULL),
(9, 'Tetouan, Morocco', NULL, NULL),
(10, 'Safi, Morocco', NULL, NULL),
(11, 'El Jadida, Morocco', NULL, NULL),
(12, 'Nador, Morocco', NULL, NULL),
(13, 'Khouribga, Morocco', NULL, NULL),
(14, 'Beni Mellal, Morocco', NULL, NULL),
(15, 'Taza, Morocco', NULL, NULL),
(16, 'Settat, Morocco', NULL, NULL),
(17, 'Khemisset, Morocco', NULL, NULL),
(18, 'Berkane, Morocco', NULL, NULL),
(19, 'Laayoune, Morocco', NULL, NULL),
(20, 'Dakhla, Morocco', NULL, NULL),
(21, 'Ouarzazate, Morocco', NULL, NULL),
(22, 'Errachidia, Morocco', NULL, NULL),
(23, 'Tiznit, Morocco', NULL, NULL),
(24, 'Taroudant, Morocco', NULL, NULL),
(25, 'Sidi Ifni, Morocco', NULL, NULL),
(26, 'Essaouira, Morocco', NULL, NULL),
(27, 'Ifrane, Morocco', NULL, NULL),
(28, 'Meknes, Morocco', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_sizes`
--

DROP TABLE IF EXISTS `employer_sizes`;
CREATE TABLE `employer_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employer_sizes`
--

INSERT INTO `employer_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '0 - 10 Employees', '2023-04-01 23:03:05', '2023-04-01 23:03:12'),
(2, '10 - 50 Employees', '2023-04-01 23:03:30', '2023-04-01 23:03:57'),
(3, '50 - 100 Employees', '2023-04-01 23:03:43', '2023-04-01 23:04:04'),
(4, '100 < Employees', '2023-04-01 23:04:25', '2023-04-01 23:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `experiances`
--

DROP TABLE IF EXISTS `experiances`;
CREATE TABLE `experiances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1 Year', '2023-03-09 13:17:29', '2023-04-23 11:16:29'),
(4, '2 Years', '2023-04-23 11:16:38', '2023-04-23 11:16:51'),
(5, '5+ Years', '2023-04-23 11:16:47', '2023-04-23 11:17:23'),
(6, '3 Years', '2023-04-23 11:17:05', '2023-04-23 11:17:05'),
(7, '4 Years', '2023-04-23 11:17:13', '2023-04-23 11:17:13'),
(8, 'Freshman', '2025-05-03 18:15:34', '2025-05-03 18:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_contents`
--

DROP TABLE IF EXISTS `footer_contents`;
CREATE TABLE `footer_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `copyright_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `footer_contents`
--

INSERT INTO `footer_contents` (`id`, `address`, `phone`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `copyright_text`, `created_at`, `updated_at`) VALUES
(1, 'ECOLE MAROCCAINE DE SCIENCE DE L INGENIEUR<br> ROUDANI', '+212 512345678', 'support@jobscout.tech', '#', '#', '#', '#', '#', '© 2025 JobScout.', '2023-04-17 17:54:25', '2023-04-17 17:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `hirings`
--

DROP TABLE IF EXISTS `hirings`;
CREATE TABLE `hirings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `vacancies` varchar(100) DEFAULT NULL,
  `deadline` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `experiance` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `map` varchar(255) DEFAULT NULL,
  `isfeatured` varchar(255) NOT NULL DEFAULT 'no',
  `isBoosted` varchar(255) NOT NULL DEFAULT 'no',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hirings`
--

INSERT INTO `hirings` (`id`, `title`, `description`, `location`, `salary`, `company_id`, `tags`, `vacancies`, `deadline`, `category`, `type`, `experiance`, `education`, `gender`, `map`, `isfeatured`, `isBoosted`, `status`, `token`, `created_at`, `updated_at`) VALUES
(29, 'HVAC Design Engineer', 'Design HVAC systems for buildings and infrastructure.', '9', '3', 51, 'HVAC design, energy simulation tools, Mech Engg', NULL, '2025-06-07', '4', '6', '5', 'Doctorat', 'All Gender', NULL, 'no', 'no', 'Published', '681b2864056a9', '2025-05-07 08:32:34', '2025-05-07 08:32:34'),
(30, 'Network Operations Engineer', 'Monitor network health and troubleshoot infrastructure.', '9', '6', 52, 'CCNA, 2+ years network admin, problem-solving skills', NULL, '2025-06-07', '5', '1', '8', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '681b28c584278', '2025-05-07 08:34:39', '2025-05-07 08:34:39'),
(25, 'Electrical Design Engineer', 'Design electrical systems for automation projects.', '7', '6', 47, 'Electrical Engineering, AutoCAD, standards knowledge', NULL, '2025-06-07', '4', '1', '8', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '681b2318b4711', '2025-05-07 08:10:25', '2025-05-07 08:10:25'),
(26, 'Mechanical Engineer', 'Design and test automotive components using CAD.', '8', '2', 48, 'Mechanical Engineering, SolidWorks, R&D experience', NULL, '2025-06-07', '4', '3', '4', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '681b23cbe3050', '2025-05-07 08:13:50', '2025-05-07 08:13:50'),
(27, 'Automation Engineer', 'Design and implement PLC/SCADA automation systems.', '8', '3', 49, 'PLC/SCADA systems, electrical schematics, troubleshooting', NULL, '2025-06-07', '4', '4', '6', 'Master', 'All Gender', NULL, 'no', 'no', 'Published', '681b2510d546a', '2025-05-07 08:17:42', '2025-05-07 08:17:42'),
(28, 'Civil Structural Engineer', 'Develop structural plans for construction projects.', '7', '1', 50, 'STAAD Pro, AutoCAD, Civil Engineering', NULL, '2025-06-07', '4', '5', '7', 'Baccalaureat+2', 'All Gender', NULL, 'no', 'no', 'Published', '681b25abb89f4', '2025-05-07 08:21:03', '2025-05-07 08:21:03'),
(20, 'Technical Support Engineer', 'Support clients using cloud services and troubleshoot issues.', '3', '3', 40, 'Support experience, Linux, communication skills', NULL, '2025-06-04', '2', '6', '6', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '6817eb4861603', '2025-05-04 21:35:45', '2025-05-04 21:35:45'),
(21, 'Operations Supervisor', 'Supervise logistics operations, ensure efficiency and safety.', '3', '2', 43, 'Leadership, supply chain systems, pressure handling', NULL, '2025-06-07', '3', '5', '8', 'Baccalaureat+2', 'All Gender', NULL, 'no', 'no', 'Published', '681b2068c4c94', '2025-05-07 07:58:49', '2025-05-07 07:58:49'),
(22, 'Import Documentation Officer', 'Handle import documentation and customs processes.', '3', '6', 44, 'Import/export knowledge, attention to detail', NULL, '2025-06-07', '3', '1', '4', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '681b213fdece3', '2025-05-07 08:02:14', '2025-05-07 08:02:14'),
(23, 'Route Planner Analyst', 'Optimize delivery routes using data and GIS tools.', '5', '1', 45, 'GIS experience, Excel, logistics background', NULL, '2025-06-07', '3', '3', '4', 'Master', 'All Gender', NULL, 'no', 'no', 'Published', '681b21c0ee9ea', '2025-05-07 08:04:44', '2025-05-07 08:04:44'),
(24, 'Warehouse Coordinator', 'Oversee warehouse operations and inventory accuracy.', '5', '3', 46, 'Warehouse software, stamina, organizational skills', NULL, '2025-06-07', '3', '4', '5', 'Master', 'All Gender', NULL, 'no', 'no', 'Published', '681b2267d0d5f', '2025-05-07 08:07:45', '2025-05-07 08:07:45'),
(17, 'Cloud Security Specialist - Google Cloud', 'Implement cloud security controls and perform audits.', '2', '3', 33, 'IAM, encryption, GCP experience, security certifications', NULL, '2025-06-30', '2', '3', '6', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '681779b0d72b2', '2025-05-04 13:30:20', '2025-05-04 16:54:47'),
(18, 'DevOps Engineer', 'Automate cloud infrastructure and manage CI/CD pipelines.', '2', '6', 38, 'Jenkins, Terraform, Docker, Kubernetes, scripting', NULL, '2025-06-04', '2', '1', '8', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '68177b49f04eb', '2025-05-04 13:36:59', '2025-05-04 13:36:59'),
(19, 'Site Reliability Engineer', 'Maintain scalable cloud hosting services with high uptime.', '2', '3', 39, 'Linux, monitoring tools, scripting experience', NULL, '2025-06-04', '2', '4', '5', 'Master', 'All Gender', NULL, 'no', 'no', 'Published', '68177c5571363', '2025-05-04 13:41:51', '2025-05-04 18:39:35'),
(14, 'QA Automation Engineer', 'Develop automated test suites and maintain product quality.', '6', '4', 35, 'Selenium/Cypress, Java/Python, testing methodologies', NULL, '2025-06-30', '1', '4', '6', 'Doctorat', 'All Gender', NULL, 'no', 'no', 'Published', '6817643a63f2b', '2025-05-04 11:59:42', '2025-05-04 11:59:42'),
(15, 'Full Stack Developer', 'Work on Oracle\'s ERP products, backend and frontend.', '14', '2', 36, 'Java, JavaScript, REST API, SQL, Oracle DB', NULL, '2025-06-30', '1', '5', '4', 'License', 'Male', NULL, 'no', 'no', 'Published', '681774f43ef5c', '2025-05-04 13:10:04', '2025-05-04 16:59:22'),
(16, 'Cloud Solutions Architect', 'Design secure cloud solutions and assist migrations on AWS.', '2', '4', 37, 'AWS Certification, IT architecture, Linux/networking skills', NULL, '2025-06-30', '2', '3', '5', 'Doctorat', 'All Gender', NULL, 'no', 'no', 'Published', '68177831839bc', '2025-05-04 13:27:34', '2025-05-04 13:27:34'),
(11, 'Software Engineer - Azure DevOps', 'Join the Azure team to design and implement scalable, reliable services powering Microsoft\'s cloud platform. You\'ll work closely with product managers and designers to create cloud-native applications.', '1', '4', 32, 'C# , Java, REST APIs, CI/CD pipelines', NULL, '2025-05-30', '1', '3', '4', 'Baccalaureat + 2', 'All Gender', NULL, 'no', 'no', 'Published', '6817517dc009a', '2025-05-04 10:39:27', '2025-05-04 10:39:27'),
(12, 'Frontend Developer', 'Build modern UIs using Angular/React for Google’s platforms.', '1', '1', 33, 'HTML, CSS, JavaScript, experience with modern frameworks', NULL, '2025-06-30', '1', '4', '8', 'Master', 'Male', NULL, 'no', 'no', 'Published', '68175c62a450c', '2025-05-04 11:25:36', '2025-05-04 11:25:36'),
(13, 'Backend Engineer (Ruby on Rails)', 'Design backend logic and maintain APIs for GitHub features.', '6', '1', 34, 'Strong Ruby/Rails, PostgreSQL, Docker/Kubernetes knowledge', NULL, '2025-06-30', '1', '1', '8', 'License', 'All Gender', NULL, 'no', 'no', 'Published', '68175eb96bc44', '2025-05-04 11:36:10', '2025-05-04 11:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', '2023-04-01 13:24:33', '2023-04-02 02:30:41'),
(3, 'Healthcare', '2023-04-02 02:30:49', '2023-04-02 02:30:49'),
(4, 'Aerospace and Defense', '2023-04-02 02:30:57', '2023-04-02 02:30:57'),
(5, 'Automotive', '2023-04-02 02:31:05', '2023-04-02 02:31:05'),
(6, 'Consumer Goods', '2023-04-02 02:31:17', '2023-04-02 02:31:17'),
(7, 'Hospitality and Tourism', '2023-04-02 02:31:24', '2023-04-02 02:31:24'),
(8, 'Banking and Finance', '2023-04-02 02:31:31', '2023-04-02 02:31:31'),
(9, 'Telecommunications', '2023-04-02 02:31:36', '2023-04-02 02:31:36'),
(10, 'Media and Communications', '2023-04-02 02:31:44', '2023-04-02 02:31:44'),
(11, 'Computer Software', '2023-04-02 02:32:03', '2023-04-02 02:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

DROP TABLE IF EXISTS `job_categories`;
CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `icon` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Software Company', 'lni lni-laptop-phone fs-lg theme-cl', '2023-03-04 04:00:49', '2023-03-04 05:54:22'),
(2, 'Cloud Computing', 'lni lni-cloud fs-lg theme-cl', '2023-03-04 04:17:10', '2023-03-04 04:17:10'),
(3, 'Logistics/Shipping', 'lni lni-shopify fs-lg theme-cl', '2023-03-04 04:18:03', '2023-03-04 04:18:03'),
(4, 'Engineering Services', 'lni lni-construction fs-lg theme-cl', '2023-03-04 04:18:34', '2023-03-04 04:18:34'),
(5, 'Telecom/Internet ', 'lni lni-phone-set fs-lg theme-cl', '2023-03-04 04:18:58', '2023-03-04 04:18:58'),
(6, 'Healthcare/Pharma', 'lni lni-sthethoscope fs-lg theme-cl', '2023-03-04 04:19:45', '2023-03-04 04:19:45'),
(7, 'Finance/Insurance', 'lni lni-money-protection fs-lg theme-cl', '2023-03-04 04:20:17', '2023-03-04 04:20:17'),
(8, 'Product Software', 'lni lni-layout fs-lg theme-cl', '2023-03-04 04:20:36', '2023-03-04 05:53:42'),
(9, 'Diversified/Retail', 'lni lni-briefcase fs-lg theme-cl', '2023-03-04 04:20:59', '2023-03-04 04:20:59'),
(10, 'Education', 'lni lni-graduation fs-lg theme-cl', '2023-03-04 04:21:18', '2023-03-04 04:21:18'),
(11, 'Banking/BPO', 'lni lni-mastercard fs-lg theme-cl', '2023-03-04 04:22:02', '2023-03-04 04:22:02'),
(15, 'Printing/Packaging', 'lni lni-gallery', '2023-03-05 03:40:36', '2023-03-05 08:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

DROP TABLE IF EXISTS `job_types`;
CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Internship', '2023-03-09 13:01:47', '2023-03-09 13:02:51'),
(3, 'Full Time', '2023-04-06 14:03:56', '2023-04-06 14:03:56'),
(4, 'Remote', '2023-04-06 14:04:06', '2023-04-06 14:04:06'),
(5, 'Part Time', '2023-04-06 14:04:12', '2023-04-06 14:04:12'),
(6, 'Contract', '2023-04-06 14:04:18', '2023-04-06 14:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Casablanca, Morocco', NULL, NULL),
(2, 'Rabat, Morocco', NULL, NULL),
(3, 'Marrakesh, Morocco', NULL, NULL),
(4, 'Tangier, Morocco', NULL, NULL),
(5, 'Fes, Morocco', NULL, NULL),
(6, 'Agadir, Morocco', NULL, NULL),
(7, 'Oujda, Morocco', NULL, NULL),
(8, 'Kenitra, Morocco', NULL, NULL),
(9, 'Tetouan, Morocco', NULL, NULL),
(10, 'Safi, Morocco', NULL, NULL),
(11, 'El Jadida, Morocco', NULL, NULL),
(12, 'Nador, Morocco', NULL, NULL),
(13, 'Khouribga, Morocco', NULL, NULL),
(14, 'Beni Mellal, Morocco', NULL, NULL),
(15, 'Taza, Morocco', NULL, NULL),
(16, 'Settat, Morocco', NULL, NULL),
(17, 'Khemisset, Morocco', NULL, NULL),
(18, 'Berkane, Morocco', NULL, NULL),
(19, 'Laayoune, Morocco', NULL, NULL),
(20, 'Dakhla, Morocco', NULL, NULL),
(21, 'Ouarzazate, Morocco', NULL, NULL),
(22, 'Errachidia, Morocco', NULL, NULL),
(23, 'Tiznit, Morocco', NULL, NULL),
(24, 'Taroudant, Morocco', NULL, NULL),
(25, 'Sidi Ifni, Morocco', NULL, NULL),
(26, 'Essaouira, Morocco', NULL, NULL),
(27, 'Ifrane, Morocco', NULL, NULL),
(28, 'Meknes, Morocco', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `body` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_25_055937_create_admin_table', 1),
(6, '2023_03_02_170921_create_page_home_items', 2),
(7, '2023_03_04_080134_create_job_category_table', 3),
(8, '2023_03_04_124055_add_new_column_to_existing_table', 4),
(9, '2023_03_04_155930_create_blog_posts_table', 5),
(10, '2023_03_06_102644_create_package_table', 6),
(11, '2023_03_08_102534_create_employers_table', 7),
(12, '2023_03_09_073626_create_employees_table', 8),
(14, '2023_03_09_180846_create_locations_table', 9),
(15, '2023_03_09_183709_create_job_types_table', 10),
(16, '2023_03_09_185520_create_experiances_table', 11),
(17, '2023_03_10_133137_create_salary_range_table', 12),
(18, '2023_04_01_151829_create_boost_orders_table', 13),
(19, '2023_04_01_164941_create_employer_locations_table', 14),
(20, '2023_04_01_175711_create_industries_table', 15),
(21, '2023_04_02_042826_create_employer_sizes_table', 16),
(22, '2023_04_04_175734_create_requirements_table', 17),
(23, '2023_04_04_164949_create_hirings_table', 18),
(24, '2023_04_07_060800_create_employee_applications_table', 19),
(26, '2023_04_10_123418_create_conversations_table', 20),
(27, '2023_04_10_124054_create_messages_table', 20),
(28, '2023_04_14_125125_create_employee_bookmarks_table', 21),
(29, '2023_04_15_155355_create_resume_educations_table', 22),
(30, '2023_04_15_155436_create_resume_experiences_table', 22),
(31, '2023_04_15_171646_create_resume_skills_table', 22),
(32, '2023_05_01_192310_create_activity_logs_table', 23),
(33, '2023_05_06_180534_create_user_testimonials_table', 24),
(34, '2023_05_07_184125_create_employer_awards_table', 25),
(35, '2023_05_17_142229_create_top_bars_table', 26),
(36, '2023_05_17_163925_create_footer_contents_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `duration_type` varchar(255) NOT NULL,
  `jobs_count` int(11) NOT NULL,
  `featured_count` int(11) NOT NULL,
  `photos_count` int(11) NOT NULL,
  `videos_count` int(11) NOT NULL,
  `button` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `duration_type` varchar(255) NOT NULL,
  `jobs_count` int(11) NOT NULL,
  `featured_count` int(11) NOT NULL,
  `photos_count` int(11) NOT NULL,
  `videos_count` int(11) NOT NULL,
  `button` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_home_items`
--

DROP TABLE IF EXISTS `page_home_items`;
CREATE TABLE `page_home_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `heading` text NOT NULL,
  `description` text DEFAULT NULL,
  `image` text NOT NULL,
  `job_placeholder` text NOT NULL,
  `job_button` text NOT NULL,
  `location_placeholder` text NOT NULL,
  `category_placeholder` text NOT NULL,
  `job_category_heading` text NOT NULL,
  `job_category_description` text DEFAULT NULL,
  `job_category_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `page_home_items`
--

INSERT INTO `page_home_items` (`id`, `created_at`, `updated_at`, `heading`, `description`, `image`, `job_placeholder`, `job_button`, `location_placeholder`, `category_placeholder`, `job_category_heading`, `job_category_description`, `job_category_status`) VALUES
(1, NULL, '2023-05-04 04:17:21', 'Your <span class=\"theme-cl\">Amazing Career</span> Starts Here', 'Discover your dream job in Nepal with our extensive database of over thousands of job listings. This could be the start of something great for your career.', 'homepage_1682926346.png', 'Job Title, Keyword or Company', 'Get Started', 'Select Location', 'Select Category', 'Browse Top Categories', 'Popular Categories', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `content` text NOT NULL,
  `status` text DEFAULT NULL,
  `image` text NOT NULL,
  `view_count` text NOT NULL,
  `category` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
CREATE TABLE `requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requirements` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `requirements`, `token`, `created_at`, `updated_at`) VALUES
(177, 'problem-solving skills', '681b28c584278', '2025-05-07 08:34:39', '2025-05-07 08:34:39'),
(178, 'CCNA', '681b28c584278', '2025-05-07 08:34:39', '2025-05-07 08:34:39'),
(173, 'HVAC design', '681b2864056a9', '2025-05-07 08:32:34', '2025-05-07 08:32:34'),
(174, 'energy simulation tools', '681b2864056a9', '2025-05-07 08:32:34', '2025-05-07 08:32:34'),
(175, 'Mech Engg', '681b2864056a9', '2025-05-07 08:32:34', '2025-05-07 08:32:34'),
(176, '2+ years network admin', '681b28c584278', '2025-05-07 08:34:39', '2025-05-07 08:34:39'),
(172, 'Civil Engineering', '681b25abb89f4', '2025-05-07 08:21:03', '2025-05-07 08:21:03'),
(170, 'STAAD Pro', '681b25abb89f4', '2025-05-07 08:21:03', '2025-05-07 08:21:03'),
(171, 'AutoCAD', '681b25abb89f4', '2025-05-07 08:21:03', '2025-05-07 08:21:03'),
(167, 'SolidWorks', '681b23cbe3050', '2025-05-07 08:13:50', '2025-05-07 08:13:50'),
(168, 'R&D experience', '681b23cbe3050', '2025-05-07 08:13:50', '2025-05-07 08:13:50'),
(169, 'PLC/SCADA systems', '681b2510d546a', '2025-05-07 08:17:42', '2025-05-07 08:17:42'),
(159, 'Excel', '681b21c0ee9ea', '2025-05-07 08:04:44', '2025-05-07 08:04:44'),
(160, 'Warehouse software', '681b2267d0d5f', '2025-05-07 08:07:45', '2025-05-07 08:07:45'),
(161, 'stamina', '681b2267d0d5f', '2025-05-07 08:07:45', '2025-05-07 08:07:45'),
(162, 'organizational skills', '681b2267d0d5f', '2025-05-07 08:07:45', '2025-05-07 08:07:45'),
(163, 'Electrical Engineering', '681b2318b4711', '2025-05-07 08:10:25', '2025-05-07 08:10:25'),
(164, 'AutoCAD', '681b2318b4711', '2025-05-07 08:10:25', '2025-05-07 08:10:25'),
(165, 'standards knowledge', '681b2318b4711', '2025-05-07 08:10:25', '2025-05-07 08:10:25'),
(166, 'Mechanical Engineering', '681b23cbe3050', '2025-05-07 08:13:50', '2025-05-07 08:13:50'),
(157, 'GIS experience', '681b21c0ee9ea', '2025-05-07 08:04:44', '2025-05-07 08:04:44'),
(158, 'logistics background', '681b21c0ee9ea', '2025-05-07 08:04:44', '2025-05-07 08:04:44'),
(154, 'pressure handling', '681b2068c4c94', '2025-05-07 07:58:49', '2025-05-07 07:58:49'),
(155, 'Import/export knowledge', '681b213fdece3', '2025-05-07 08:02:14', '2025-05-07 08:02:14'),
(156, 'attention to detail', '681b213fdece3', '2025-05-07 08:02:14', '2025-05-07 08:02:14'),
(151, 'communication skills', '6817eb4861603', '2025-05-04 21:35:45', '2025-05-04 21:35:45'),
(152, 'Leadership', '681b2068c4c94', '2025-05-07 07:58:49', '2025-05-07 07:58:49'),
(153, 'supply chain systems', '681b2068c4c94', '2025-05-07 07:58:49', '2025-05-07 07:58:49'),
(149, 'Support experience', '6817eb4861603', '2025-05-04 21:35:45', '2025-05-04 21:35:45'),
(150, 'Linux', '6817eb4861603', '2025-05-04 21:35:45', '2025-05-04 21:35:45'),
(148, 'scripting experience', '68177c5571363', '2025-05-04 13:41:51', '2025-05-04 13:41:51'),
(146, 'Linux', '68177c5571363', '2025-05-04 13:41:51', '2025-05-04 13:41:51'),
(147, 'monitoring tools', '68177c5571363', '2025-05-04 13:41:51', '2025-05-04 13:41:51'),
(143, 'Docker', '68177b49f04eb', '2025-05-04 13:36:59', '2025-05-04 13:36:59'),
(144, 'Kubernetes', '68177b49f04eb', '2025-05-04 13:36:59', '2025-05-04 13:36:59'),
(145, 'scripting', '68177b49f04eb', '2025-05-04 13:36:59', '2025-05-04 13:36:59'),
(139, 'GCP experience', '681779b0d72b2', '2025-05-04 13:30:20', '2025-05-04 13:30:20'),
(140, 'security certifications', '681779b0d72b2', '2025-05-04 13:30:20', '2025-05-04 13:30:20'),
(141, 'Jenkins', '68177b49f04eb', '2025-05-04 13:36:59', '2025-05-04 13:36:59'),
(142, 'Terraform', '68177b49f04eb', '2025-05-04 13:36:59', '2025-05-04 13:36:59'),
(136, 'Linux/networking skills', '68177831839bc', '2025-05-04 13:27:34', '2025-05-04 13:27:34'),
(137, 'IAM', '681779b0d72b2', '2025-05-04 13:30:20', '2025-05-04 13:30:20'),
(138, 'encryption', '681779b0d72b2', '2025-05-04 13:30:20', '2025-05-04 13:30:20'),
(133, 'Oracle DB', '681774f43ef5c', '2025-05-04 13:10:04', '2025-05-04 13:10:04'),
(134, 'AWS Certification', '68177831839bc', '2025-05-04 13:27:34', '2025-05-04 13:27:34'),
(135, 'IT architecture', '68177831839bc', '2025-05-04 13:27:34', '2025-05-04 13:27:34'),
(130, 'JavaScript', '681774f43ef5c', '2025-05-04 13:10:04', '2025-05-04 13:10:04'),
(131, 'REST API', '681774f43ef5c', '2025-05-04 13:10:04', '2025-05-04 13:10:04'),
(132, 'SQL', '681774f43ef5c', '2025-05-04 13:10:04', '2025-05-04 13:10:04'),
(128, 'Java/Python', '6817643a63f2b', '2025-05-04 11:59:42', '2025-05-04 11:59:42'),
(129, 'Java', '681774f43ef5c', '2025-05-04 13:10:04', '2025-05-04 13:10:04'),
(126, 'Selenium/Cypress', '6817643a63f2b', '2025-05-04 11:59:42', '2025-05-04 11:59:42'),
(127, 'testing methodologies', '6817643a63f2b', '2025-05-04 11:59:42', '2025-05-04 11:59:42'),
(124, 'PostgreSQL', '68175eb96bc44', '2025-05-04 11:36:10', '2025-05-04 11:36:10'),
(125, 'Docker/Kubernetes knowledge', '68175eb96bc44', '2025-05-04 11:36:10', '2025-05-04 11:36:10'),
(122, 'experience with modern frameworks', '68175c62a450c', '2025-05-04 11:25:36', '2025-05-04 11:25:36'),
(123, 'Strong Ruby/Rails', '68175eb96bc44', '2025-05-04 11:36:10', '2025-05-04 11:36:10'),
(120, 'CSS', '68175c62a450c', '2025-05-04 11:25:36', '2025-05-04 11:25:36'),
(121, 'JavaScript', '68175c62a450c', '2025-05-04 11:25:36', '2025-05-04 11:25:36'),
(119, 'HTML', '68175c62a450c', '2025-05-04 11:25:36', '2025-05-04 11:25:36'),
(117, '2+ years of C# or Java experience', '6817517dc009a', '2025-05-04 10:39:27', '2025-05-04 10:39:27'),
(118, 'Knowledge of REST APIs and CI/CD pipelines', '6817517dc009a', '2025-05-04 10:39:27', '2025-05-04 10:39:27'),
(116, 'Bachelor’s in Computer Science or related field', '6817517dc009a', '2025-05-04 10:39:27', '2025-05-04 10:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `resume_education`
--

DROP TABLE IF EXISTS `resume_education`;
CREATE TABLE `resume_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resume_education`
--

INSERT INTO `resume_education` (`id`, `school_name`, `degree`, `details`, `start_date`, `end_date`, `employee_id`, `created_at`, `updated_at`) VALUES
(5, 'EMSI', 'Future Engineer in Network and IT', 'I\'m currently studying IT and Network Engineering at EMSI, where I\'m building strong skills in networking, systems, and technology. I\'m passionate about solving technical problems and preparing for a career as a network engineer.', '2023-09-01', '2026-07-01', 14, '2025-05-12 13:26:25', '2025-05-12 13:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `resume_experiences`
--

DROP TABLE IF EXISTS `resume_experiences`;
CREATE TABLE `resume_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resume_experiences`
--

INSERT INTO `resume_experiences` (`id`, `work_name`, `designation`, `details`, `start_date`, `end_date`, `employee_id`, `created_at`, `updated_at`) VALUES
(2, 'Web agency', 'Internship as a Frontend developer', 'a', '2023-03-01', '2023-04-01', 14, '2025-05-12 13:27:13', '2025-05-12 13:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `resume_skills`
--

DROP TABLE IF EXISTS `resume_skills`;
CREATE TABLE `resume_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_ranges`
--

DROP TABLE IF EXISTS `salary_ranges`;
CREATE TABLE `salary_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salary_ranges`
--

INSERT INTO `salary_ranges` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, '9000 MAD - 15000 MAD', NULL, NULL),
(1, '8000 MAD - 9000 MAD', NULL, NULL),
(3, '15000 MAD - 20000 MAD', NULL, NULL),
(4, '20000 MAD - 30000 MAD', NULL, NULL),
(5, '30000 MAD +', NULL, NULL),
(6, 'Internship', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `top_bars`
--

DROP TABLE IF EXISTS `top_bars`;
CREATE TABLE `top_bars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topbar_contact` varchar(255) NOT NULL,
  `topbar_center_text` varchar(255) NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `top_bars`
--

INSERT INTO `top_bars` (`id`, `topbar_contact`, `topbar_center_text`, `isHidden`, `created_at`, `updated_at`) VALUES
(1, '+212 707090906', 'Get 10% Discount on Boosting', 0, '2023-05-17 15:02:33', '2023-05-17 09:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_testimonials`
--

DROP TABLE IF EXISTS `user_testimonials`;
CREATE TABLE `user_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `testimonial` varchar(255) NOT NULL,
  `isFeatured` varchar(255) NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_testimonials`
--

INSERT INTO `user_testimonials` (`id`, `name`, `designation`, `company`, `image`, `testimonial`, `isFeatured`, `created_at`, `updated_at`) VALUES
(3, 'Elkacimi Ilyass', 'Frontend developper at', 'Google', 'testimonial3.jpg', 'JobScout made my job search surprisingly smooth. I discovered opportunities I wouldn’t have found elsewhere and ended up landing a frontend developer role at Google. The platform is a game changer!', 'yes', '2023-05-06 17:17:12', '2023-05-06 17:17:12'),
(1, 'Hamza Naji', 'Full Stack Developer at', 'Oracle', 'testimonial1.jpg', 'JobScout played a key role in my career growth. I discovered an opportunity at Oracle through the platform, and now I’m working on exciting projects as a Full Stack Developer. It truly opened the right doors for me.', 'yes', '2023-05-06 17:15:00', '0000-00-00 00:00:00'),
(2, 'Layla Ayach', 'Owner of', 'ÖSË Estethic Clinic', 'testimonial2.jpg', 'As the owner of an esthetic clinic, finding skilled staff was always a challenge—until I discovered JobScout. Through the platform, I hired a highly competent professional who fits perfectly with our team and values. I’ll definitely use JobScout again!', 'yes', '2023-05-06 17:18:14', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `boost_orders`
--
ALTER TABLE `boost_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_sender_id_foreign` (`sender_id`),
  ADD KEY `conversations_recipient_id_foreign` (`recipient_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_username_unique` (`username`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employee_applications`
--
ALTER TABLE `employee_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_bookmarks`
--
ALTER TABLE `employee_bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_email_unique` (`email`),
  ADD UNIQUE KEY `employers_username_unique` (`username`);

--
-- Indexes for table `employer_awards`
--
ALTER TABLE `employer_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_locations`
--
ALTER TABLE `employer_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_sizes`
--
ALTER TABLE `employer_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiances`
--
ALTER TABLE `experiances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_contents`
--
ALTER TABLE `footer_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hirings`
--
ALTER TABLE `hirings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_recipient_id_foreign` (`recipient_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_items`
--
ALTER TABLE `page_home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_education`
--
ALTER TABLE `resume_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_experiences`
--
ALTER TABLE `resume_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_skills`
--
ALTER TABLE `resume_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_bars`
--
ALTER TABLE `top_bars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_testimonials`
--
ALTER TABLE `user_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boost_orders`
--
ALTER TABLE `boost_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_applications`
--
ALTER TABLE `employee_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee_bookmarks`
--
ALTER TABLE `employee_bookmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `employer_awards`
--
ALTER TABLE `employer_awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employer_locations`
--
ALTER TABLE `employer_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employer_sizes`
--
ALTER TABLE `employer_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiances`
--
ALTER TABLE `experiances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_contents`
--
ALTER TABLE `footer_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hirings`
--
ALTER TABLE `hirings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_home_items`
--
ALTER TABLE `page_home_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `resume_education`
--
ALTER TABLE `resume_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resume_experiences`
--
ALTER TABLE `resume_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resume_skills`
--
ALTER TABLE `resume_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `top_bars`
--
ALTER TABLE `top_bars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_testimonials`
--
ALTER TABLE `user_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
