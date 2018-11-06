-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for test2
CREATE DATABASE IF NOT EXISTS `test2` /*!40100 DEFAULT CHARACTER SET utf16 */;
USE `test2`;

-- Dumping data for table test2.mbs_choice: ~5 rows (approximately)
/*!40000 ALTER TABLE `mbs_choice` DISABLE KEYS */;
INSERT INTO `mbs_choice` (`id`, `name`, `type`, `value`, `other`, `created_at`, `updated_at`) VALUES
	(80, 'er', '01', '01080', NULL, '2018-11-02 07:02:17', '2018-11-02 07:02:17'),
	(82, 'Activity', '82', NULL, NULL, '2018-11-02 07:03:26', '2018-11-02 07:03:26'),
	(84, 'UserPermission', '09', NULL, NULL, '2018-11-02 07:05:10', '2018-11-02 07:05:10'),
	(85, 'user', '09', '09041', NULL, '2018-11-02 07:05:45', '2018-11-02 07:05:45'),
	(86, 'Pann', '82', '82086', NULL, '2018-11-02 07:11:43', '2018-11-02 07:11:43'),
	(114, 'Admin', '09', '090114', NULL, '2018-11-02 07:56:24', '2018-11-02 07:56:24'),
	(115, 'Party', '09', '090115', NULL, '2018-11-04 21:03:44', '2018-11-04 21:03:44');
/*!40000 ALTER TABLE `mbs_choice` ENABLE KEYS */;

-- Dumping data for table test2.mbs_setting: ~9 rows (approximately)
/*!40000 ALTER TABLE `mbs_setting` DISABLE KEYS */;
INSERT INTO `mbs_setting` (`id`, `name`, `value`, `description`, `other`, `permission`, `created_at`, `updated_at`) VALUES
	(1, 'company', 'mulberrysoft', NULL, 'fg', '0', NULL, NULL),
	(2, 'tittle', 'Veritrans', NULL, 'dfg', '0', NULL, '2018-11-06 04:32:59'),
	(6, 'box-blue', 'lnav-deep', 'ตัวแปรเสริม', NULL, '1', '2018-10-16 09:22:28', '2018-11-01 06:25:22'),
	(7, 'blue', 'box-blue', 'กำหนดค่าสี', NULL, '1', '2018-10-17 06:12:13', '2018-10-17 06:12:13'),
	(9, 'bgBackground', 'box-transparent', 'แบล็กกราว', NULL, '1', '2018-10-17 09:17:44', '2018-10-17 09:17:44'),
	(12, 'bg_login', 'box-transparent', 'แบล็กกราวหน้า login', 'css', '1', '2018-10-18 05:15:37', '2018-10-18 05:15:37'),
	(13, 'login_name', 'Login', 'ชื่อปุ่ม login', 'text', '0', '2018-10-18 05:16:36', '2018-10-18 05:16:36'),
	(16, 'navbar', 'lnot', 'navabr และ theme', NULL, '0', '2018-10-26 03:41:59', '2018-11-06 05:04:48'),
	(17, 'register_lock', '1', NULL, 'dfg', '0', NULL, '2018-11-06 04:33:04'),
	(18, 'navbar_collapse', 'llaymond', NULL, NULL, '1', '2018-11-06 03:37:25', '2018-11-06 05:02:58');
/*!40000 ALTER TABLE `mbs_setting` ENABLE KEYS */;

-- Dumping data for table test2.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_11_10_035655_create_notes_table', 1),
	(5, '2018_10_12_083929_mbs_setting_table', 2),
	(6, '2018_10_18_032739_mbs_choice_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table test2.notes: ~0 rows (approximately)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `title`, `is_favourite`, `created_at`, `updated_at`) VALUES
	(1, 'asdsd', 0, '2018-11-06 09:55:32', NULL),
	(2, 'qwe', 0, '2018-11-06 09:55:35', NULL),
	(3, 'qwesfdfd', 0, '2018-11-06 09:55:33', NULL);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

-- Dumping data for table test2.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table test2.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
	(21, 'as', 'as', '$2y$10$3326J4RxBPY/vuqZkOp5uO9xHsw48eruISldeU3vEHRuezRc3VBj6', '09041', NULL, '2018-10-31 09:44:58', '2018-10-31 10:01:16'),
	(22, 'Pongvarid', 'pongvarid', '$2y$10$A0DUdfRXtelnzHkfzgGzK.YECGG6q3QqsWIokbQUPtk0Mak6xAX2a', '09041', NULL, '2018-10-31 09:59:49', '2018-10-31 09:59:49'),
	(23, 'xs', 'dsd', '$2y$10$lklB3U43M.vFJvaVGa8Gq.8UmH2MJvMV7V4A8dp.IJ3alndJ/18ny', '09041', NULL, '2018-10-31 17:29:12', '2018-10-31 17:29:12'),
	(24, 'pongvarid', 'pongvarid@gmail.com', '$2y$10$0D8AWt4jaCuSeRsh6QWFBeGHn/5eJKQDRDA6ioLfD5uHHldiTCx3u', '09041', NULL, '2018-11-04 17:26:35', '2018-11-04 17:26:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
