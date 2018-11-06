-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 08:12 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mbs_choice`
--

CREATE TABLE `mbs_choice` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mbs_choice`
--

INSERT INTO `mbs_choice` (`id`, `name`, `type`, `value`, `other`, `created_at`, `updated_at`) VALUES
(80, 'er', '01', '01080', NULL, '2018-11-02 00:02:17', '2018-11-02 00:02:17'),
(82, 'Activity', '82', NULL, NULL, '2018-11-02 00:03:26', '2018-11-02 00:03:26'),
(84, 'UserPermission', '09', NULL, NULL, '2018-11-02 00:05:10', '2018-11-02 00:05:10'),
(85, 'user', '09', '09041', NULL, '2018-11-02 00:05:45', '2018-11-02 00:05:45'),
(86, 'Pann', '82', '82086', NULL, '2018-11-02 00:11:43', '2018-11-02 00:11:43'),
(114, 'Admin', '09', '090114', NULL, '2018-11-02 00:56:24', '2018-11-02 00:56:24'),
(115, 'Party', '09', '090115', NULL, '2018-11-04 14:03:44', '2018-11-04 14:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `mbs_setting`
--

CREATE TABLE `mbs_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mbs_setting`
--

INSERT INTO `mbs_setting` (`id`, `name`, `value`, `description`, `other`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'company', 'mulberrysoft', NULL, 'fg', '0', NULL, NULL),
(2, 'tittle', 'Veritrans', NULL, 'dfg', '0', NULL, '2018-11-05 21:32:59'),
(6, 'box-blue', 'lnav-deep', 'ตัวแปรเสริม', NULL, '1', '2018-10-16 02:22:28', '2018-10-31 23:25:22'),
(7, 'blue', 'box-blue', 'กำหนดค่าสี', NULL, '1', '2018-10-16 23:12:13', '2018-10-16 23:12:13'),
(9, 'bgBackground', 'box-transparent', 'แบล็กกราว', NULL, '1', '2018-10-17 02:17:44', '2018-10-17 02:17:44'),
(12, 'bg_login', 'box-transparent', 'แบล็กกราวหน้า login', 'css', '1', '2018-10-17 22:15:37', '2018-10-17 22:15:37'),
(13, 'login_name', 'Login', 'ชื่อปุ่ม login', 'text', '0', '2018-10-17 22:16:36', '2018-10-17 22:16:36'),
(16, 'navbar', 'lnot', 'navabr และ theme', NULL, '0', '2018-10-25 20:41:59', '2018-11-05 23:44:48'),
(17, 'register_lock', '1', NULL, 'dfg', '0', NULL, '2018-11-05 21:33:04'),
(18, 'navbar_collapse', 'llaymond', NULL, NULL, '1', '2018-11-05 20:37:25', '2018-11-05 22:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_10_035655_create_notes_table', 1),
(5, '2018_10_12_083929_mbs_setting_table', 2),
(6, '2018_10_18_032739_mbs_choice_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_favourite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `is_favourite`, `created_at`, `updated_at`) VALUES
(1, 'asdsd', 0, '2018-11-06 02:55:32', NULL),
(2, 'qwe', 0, '2018-11-06 02:55:35', NULL),
(3, 'qwesfdfd', 0, '2018-11-06 02:55:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'as', 'as', '$2y$10$3326J4RxBPY/vuqZkOp5uO9xHsw48eruISldeU3vEHRuezRc3VBj6', '09041', NULL, '2018-10-31 02:44:58', '2018-10-31 03:01:16'),
(22, 'Pongvarid', 'pongvarid', '$2y$10$A0DUdfRXtelnzHkfzgGzK.YECGG6q3QqsWIokbQUPtk0Mak6xAX2a', '09041', NULL, '2018-10-31 02:59:49', '2018-10-31 02:59:49'),
(23, 'xs', 'dsd', '$2y$10$lklB3U43M.vFJvaVGa8Gq.8UmH2MJvMV7V4A8dp.IJ3alndJ/18ny', '09041', NULL, '2018-10-31 10:29:12', '2018-10-31 10:29:12'),
(24, 'pongvarid', 'pongvarid@gmail.com', '$2y$10$0D8AWt4jaCuSeRsh6QWFBeGHn/5eJKQDRDA6ioLfD5uHHldiTCx3u', '09041', NULL, '2018-11-04 10:26:35', '2018-11-04 10:26:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mbs_choice`
--
ALTER TABLE `mbs_choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mbs_setting`
--
ALTER TABLE `mbs_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- AUTO_INCREMENT for table `mbs_choice`
--
ALTER TABLE `mbs_choice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `mbs_setting`
--
ALTER TABLE `mbs_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
