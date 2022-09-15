-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 12:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mokost`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Pengelola tingkat tinggi'),
(2, 'admin', 'Pengelola tingkat rendah'),
(3, 'user', 'Pengguna situs');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 15),
(2, 18),
(2, 19),
(3, 17),
(3, 20),
(3, 21),
(3, 22);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'syidan', 1, '2022-05-15 00:04:51', 0),
(2, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-15 00:06:48', 1),
(3, '::1', 'genta@gmail.com', 6, '2022-05-15 01:02:01', 1),
(4, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-15 05:11:57', 1),
(5, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-15 19:17:31', 1),
(6, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-15 19:28:31', 1),
(7, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-15 20:14:23', 1),
(8, '::1', 'eko@gmail.com', 7, '2022-05-15 23:55:54', 1),
(9, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-15 23:58:09', 1),
(10, '::1', 'eko@gmail.com', 7, '2022-05-15 23:58:31', 1),
(11, '::1', 'genta', NULL, '2022-05-15 23:58:50', 0),
(12, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-16 07:16:44', 1),
(13, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-16 21:21:13', 1),
(14, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-17 01:49:20', 1),
(15, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-17 18:47:01', 1),
(16, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-18 02:20:27', 1),
(17, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-18 21:49:28', 1),
(18, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-20 04:16:08', 1),
(19, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-20 18:01:41', 1),
(20, '::1', 'mursyidan@gmail.com', 11, '2022-05-20 19:19:37', 1),
(21, '::1', 'mursyidan@gmail.com', 11, '2022-05-20 21:43:35', 1),
(22, '::1', 'ahmadmursyidan3@gmail.com', 5, '2022-05-21 07:28:04', 1),
(23, '::1', 'mursyidanb@gmail.com', 11, '2022-05-21 23:49:13', 1),
(24, '::1', 'mursyidanb@gmail.com', 11, '2022-05-22 03:03:15', 1),
(25, '::1', 'mursyidanb@gmail.com', 11, '2022-05-22 06:23:42', 1),
(26, '::1', 'mursyidanb@gmail.com', 11, '2022-05-22 19:15:37', 1),
(27, '::1', 'mursyidanb@gmail.com', 11, '2022-05-22 20:51:31', 1),
(28, '::1', 'mursyidanb@gmail.com', 11, '2022-05-22 23:12:48', 1),
(29, '::1', 'ahmadmursyidan@gmail.com', 1, '2022-05-23 18:29:40', 0),
(30, '::1', 'mursyidanb@gmail.com', 11, '2022-05-23 18:29:50', 1),
(31, '::1', 'mursyidanb@gmail.com', 11, '2022-05-23 22:38:13', 1),
(32, '::1', 'mursyidanb@gmail.com', 11, '2022-05-24 01:45:22', 1),
(33, '::1', 'mursyidanb@gmail.com', 11, '2022-05-29 10:51:53', 1),
(34, '::1', 'mursyidanb@gmail.com', 11, '2022-05-29 18:33:37', 1),
(35, '::1', 'ahmadmursyidan@gmail.com', 1, '2022-05-30 17:46:35', 0),
(36, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-30 17:48:15', 1),
(37, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-30 19:04:10', 1),
(38, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-31 00:49:08', 1),
(39, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-31 01:30:07', 1),
(40, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-31 04:47:46', 1),
(41, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-31 08:51:46', 1),
(42, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-31 18:42:40', 1),
(43, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-05-31 22:37:14', 1),
(44, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-01 05:17:36', 1),
(45, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-01 18:14:53', 1),
(46, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-01 20:49:18', 1),
(47, '::1', 'syidan4', NULL, '2022-06-01 23:29:40', 0),
(48, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-01 23:29:52', 1),
(49, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-02 06:00:05', 1),
(50, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-02 18:51:22', 1),
(51, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-03 01:10:23', 1),
(52, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-03 20:52:34', 1),
(53, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-04 07:07:48', 1),
(54, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-04 17:50:24', 1),
(55, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-05 00:54:29', 1),
(56, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-05 06:44:26', 1),
(57, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-05 09:52:55', 1),
(58, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-05 17:33:17', 1),
(59, '::1', 'ananda', NULL, '2022-06-06 03:09:58', 0),
(60, '::1', 'ananda', NULL, '2022-06-06 03:10:18', 0),
(61, '::1', 'ananda@gmail.com', 13, '2022-06-06 03:25:56', 1),
(62, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-06 08:09:37', 1),
(63, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-06 19:31:44', 1),
(64, '::1', 'syidan4', NULL, '2022-06-07 00:26:21', 0),
(65, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-07 00:26:31', 1),
(66, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-07 06:28:27', 1),
(67, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-07 09:53:54', 1),
(68, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-07 18:01:26', 1),
(69, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-08 03:04:22', 1),
(70, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-08 21:10:35', 1),
(71, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-09 02:04:45', 1),
(72, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-09 05:10:08', 1),
(73, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-09 17:54:10', 1),
(74, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-09 23:52:41', 1),
(75, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-10 03:33:21', 1),
(76, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-10 06:22:23', 1),
(77, '::1', 'syidan4', NULL, '2022-06-10 18:26:26', 0),
(78, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-10 18:26:33', 1),
(79, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-11 00:24:05', 1),
(80, '::1', 'syidan4', NULL, '2022-06-11 10:13:21', 0),
(81, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-11 10:13:28', 1),
(82, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-11 17:37:50', 1),
(83, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-12 02:03:30', 1),
(84, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-12 08:30:12', 1),
(85, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-12 20:45:41', 1),
(86, '::1', 'wp3@gmail.com', 14, '2022-06-13 04:17:36', 1),
(87, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-13 19:42:06', 1),
(88, '::1', 'superadmin@gmail.com', 15, '2022-06-14 01:22:22', 1),
(89, '::1', 'superadmin@gmail.com', 15, '2022-06-14 01:22:36', 1),
(90, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-14 01:30:31', 1),
(91, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-14 04:31:49', 1),
(92, '::1', 'superadmin@gmail.com', 15, '2022-06-14 04:51:35', 1),
(93, '::1', 'ahmadmursyidan4@gmail.com', 10, '2022-06-14 06:33:48', 1),
(94, '::1', 'superadmin@gmail.com', 15, '2022-06-14 06:36:47', 1),
(95, '::1', 'superadmin@gmail.com', 15, '2022-06-14 18:21:20', 1),
(96, '::1', 'gentrrrr@gmail.com', 16, '2022-06-15 05:26:18', 1),
(97, '::1', 'superadmin@gmail.com', 15, '2022-06-15 05:34:39', 1),
(98, '::1', 'gentrrrr@gmail.com', 16, '2022-06-15 06:31:21', 1),
(99, '::1', 'gentrrrr@gmail.com', 16, '2022-06-15 07:26:53', 1),
(100, '::1', 'superadmin@gmail.com', 15, '2022-06-15 07:27:55', 1),
(101, '::1', 'gentrrrr@gmail.com', 16, '2022-06-15 07:28:30', 1),
(102, '::1', 'superadmin@gmail.com', 15, '2022-06-15 08:07:56', 1),
(103, '::1', 'superadmin', NULL, '2022-06-15 23:11:48', 0),
(104, '::1', 'superadmin@gmail.com', 15, '2022-06-15 23:12:01', 1),
(105, '::1', 'superadmin', NULL, '2022-06-16 02:26:27', 0),
(106, '::1', 'superadmin@gmail.com', 15, '2022-06-16 02:26:36', 1),
(107, '::1', 'superadmin', NULL, '2022-06-16 10:24:57', 0),
(108, '::1', 'superadmin@gmail.com', 15, '2022-06-16 10:25:05', 1),
(109, '::1', 'superadmin', NULL, '2022-06-16 17:54:21', 0),
(110, '::1', '123', NULL, '2022-06-16 17:54:28', 0),
(111, '::1', 'mursyidan', NULL, '2022-06-16 17:57:36', 0),
(112, '::1', 'superadmin@gmail.com', 15, '2022-06-16 18:00:26', 1),
(113, '::1', 'ahmadmursyidan@gmail.com', 17, '2022-06-16 18:41:25', 1),
(114, '::1', 'admin@gmail.com', 18, '2022-06-16 18:49:05', 1),
(115, '::1', 'admin@gmail.com', 18, '2022-06-17 01:30:16', 1),
(116, '::1', 'admin', NULL, '2022-06-17 04:59:00', 0),
(117, '::1', 'admin@gmail.com', 18, '2022-06-17 04:59:09', 1),
(118, '::1', 'admin', NULL, '2022-06-17 19:30:01', 0),
(119, '::1', 'admin@gmail.com', 18, '2022-06-17 19:30:08', 1),
(120, '::1', 'sadasdadads', NULL, '2022-06-17 22:32:24', 0),
(121, '::1', 'admin', NULL, '2022-06-17 22:33:02', 0),
(122, '::1', 'admin', NULL, '2022-06-17 22:55:31', 0),
(123, '::1', 'admin', NULL, '2022-06-17 22:55:55', 0),
(124, '::1', 'admin@gmail.com', 18, '2022-06-17 22:56:15', 1),
(125, '::1', 'asemreges@gmail.com', 19, '2022-06-17 23:30:32', 1),
(126, '::1', 'asemreges@gmail.com', 19, '2022-06-17 23:35:10', 1),
(127, '::1', 'eko@gmail.com', 20, '2022-06-17 23:40:24', 1),
(128, '::1', 'admin@gmail.com', 18, '2022-06-17 23:50:16', 1),
(129, '::1', 'admin@gmail.com', 18, '2022-06-18 03:22:19', 1),
(130, '::1', 'ahmadmursyidan@gmail.com', 17, '2022-06-19 00:40:48', 1),
(131, '::1', 'admin', NULL, '2022-06-19 01:04:51', 0),
(132, '::1', 'admin@gmail.com', 18, '2022-06-19 01:05:01', 1),
(133, '::1', 'admin', NULL, '2022-06-19 04:57:06', 0),
(134, '::1', 'admin@gmail.com', 18, '2022-06-19 04:57:14', 1),
(135, '::1', 'admin@gmail.com', 18, '2022-06-19 07:32:40', 1),
(136, '::1', 'admin', NULL, '2022-06-19 07:47:09', 0),
(137, '::1', 'admin@gmail.com', 18, '2022-06-19 07:48:03', 1),
(138, '::1', 'syidan', NULL, '2022-06-19 10:17:28', 0),
(139, '::1', 'ahmadmursyidan@gmail.com', 17, '2022-06-19 10:17:36', 1),
(140, '::1', 'ahmadmursyidan@gmail.com', 17, '2022-06-19 20:07:32', 1),
(141, '::1', 'admin@gmail.com', 18, '2022-06-19 20:11:52', 1),
(142, '::1', 'admin@gmail.com', 18, '2022-06-19 20:13:56', 1),
(143, '::1', 'ahmadmursyidan@gmail.com', 17, '2022-06-19 21:35:56', 1),
(144, '::1', 'admin@gmail.com', 18, '2022-06-19 23:09:39', 1),
(145, '::1', 'aegss98@gmail.com', 21, '2022-06-20 02:15:00', 1),
(146, '::1', 'admin@gmail.com', 18, '2022-06-20 02:26:16', 1),
(147, '::1', 'aegss98@gmail.com', 21, '2022-06-20 02:26:42', 1),
(148, '::1', 'admin@gmail.com', 18, '2022-06-20 02:32:57', 1),
(149, '::1', 'aji@gmail.com', 22, '2022-06-20 03:56:45', 1),
(150, '::1', 'admin@gmail.com', 18, '2022-06-20 04:00:18', 1),
(151, '::1', 'aji@gmail.com', 22, '2022-06-20 04:01:45', 1),
(152, '::1', 'admin@gmail.com', 18, '2022-06-20 04:02:33', 1),
(153, '::1', 'admin@gmail.com', 18, '2022-06-20 04:36:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Mengelola data user'),
(2, 'manage-profile', 'Mengelola data profile'),
(3, 'manage-admin', 'Mengelola data Admin');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '', '2022-05-22 02:22:32'),
(2, 'ahmadmursyidan@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', '', '2022-05-22 02:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(5) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `nomor`, `id_tipe`, `harga`, `status`, `is_deleted`) VALUES
(47, '001', 11, 0, 1, 0),
(48, '002', 11, 0, 2, 0),
(49, '003', 11, 0, 1, 0),
(50, '004', 18, 0, 1, 0),
(51, '005', 18, 0, 1, 0),
(52, '006', 18, 0, 1, 0),
(53, '008', 18, 0, 0, 1),
(54, '010', 19, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kamar_tipe`
--

CREATE TABLE `kamar_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fasilitas` text NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar_tipe`
--

INSERT INTO `kamar_tipe` (`id`, `nama`, `fasilitas`, `gambar`, `harga`, `status`, `is_deleted`) VALUES
(11, 'AAAA', 'Dua kasur, Televisi, Lemari, Kamar Mandi, Parkir, OK', 'default.jpg', 16000000, 1, 0),
(18, 'B', 'Dua kasur, AC, Lemari, Kamar mandi', '1655632859_92775db32d40b1a8e1e5.jpg', 2500000, 1, 0),
(19, 'X', 'koplit', '1655715846_cbcdd8f0ac369bd2e417.jpg', 3000000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png',
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `nama_metode`, `nama_bank`, `atas_nama`, `nomor_rekening`, `gambar`, `status`, `is_deleted`) VALUES
(1, 'Cash', '', '', '', '', 1, 0),
(2, 'Transfer', 'BCA', 'Hatake Kakashi', '8693789092', 'bca.png', 1, 0),
(3, 'Transfer', 'Mandiri', 'Madara Uchiha', '8603846853', 'mandiri.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1652585657, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pembayaran` text NOT NULL,
  `id_penyewaan` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pembayaran`, `id_penyewaan`, `id_metode`, `total`, `bukti_pembayaran`, `created_at`, `updated_at`, `status`, `is_deleted`) VALUES
(32, 'BRLSJ1T6', 69, 2, 3000000, NULL, '2022-06-20 02:48:25', '2022-06-20 02:53:01', 2, 0),
(33, 'F4P1E76W', 70, 2, 3000000, NULL, '2022-06-20 02:48:25', '2022-06-20 02:48:25', 2, 0),
(34, '0F4A29KE', 71, 2, 6000000, NULL, '2022-06-20 02:49:42', '2022-06-20 02:53:27', 2, 0),
(35, 'LGH59ONK', 72, 2, 1500000, NULL, '2022-06-20 02:56:07', '2022-06-20 02:56:07', 2, 0),
(36, '8W5XT2DV', 73, 2, 15000000, '1655715576_2d427083e171242efb46.png', '2022-06-20 03:59:05', '2022-06-20 04:01:13', 1, 0),
(37, 'TXOPSGI8', 74, 1, 6000000, NULL, '2022-06-20 04:06:08', '2022-06-20 04:06:27', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `buku_nikah` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id`, `nama`, `ktp`, `kk`, `buku_nikah`, `status`, `is_deleted`) VALUES
(37, 'Ahmad Mursyidan', '1655633460_6394ba149975b66c5ae0.png', '1655633460_c321d7ecad4fe56eca29.png', '1655633460_4c9fa95bd44f933f40d9.png', 3, 0),
(45, 'Ananda Eko Purwanto', '1655711044_ac9c0a7623da8a101c4b.jpg', '1655711044_d21443c8bd569080a871.png', '1655711044_d77fbb892d5c49ccffc5.png', 2, 0),
(46, 'Genta Firmansyah Safudin Alfuroq', '1655711070_a1587a88b4e4d1df7205.jpg', '1655711070_a13695b4781c8b297337.png', '1655711070_08b784375f8a5252862e.png', 2, 0),
(47, 'Aji Giatama', NULL, NULL, NULL, 2, 0),
(48, 'Dustin', '1655715925_2ec42f544360a6d173a2.jpg', '1655715925_bc78eb9b1869405f971f.png', '1655715925_57e55a4e46650eb91bf1.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `jumlah_penghuni` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `biaya_sewa` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `id_kamar`, `id_penghuni`, `id_user`, `jumlah_penghuni`, `tanggal_masuk`, `tanggal_keluar`, `durasi`, `biaya_sewa`, `status`, `is_deleted`) VALUES
(69, 47, 37, 18, 1, '2022-06-20', '2022-08-19', 2, '3000000', 1, 0),
(70, 47, 37, 18, 1, '2022-06-20', '2022-08-19', 2, '3000000', 1, 1),
(71, 47, 45, 18, 1, '2022-06-20', '2022-10-18', 4, '6000000', 1, 1),
(72, 48, 46, 18, 1, '2022-06-20', '2022-07-20', 1, '1500000', 1, 0),
(73, 47, 47, 22, 1, '2022-06-23', '2023-04-19', 10, '15000000', 3, 0),
(74, 54, 45, 18, 1, '2022-06-20', '2022-08-19', 2, '6000000', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama`, `alamat`, `telepon`, `kelamin`, `gambar`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'superadmin@gmail.com', 'superadmin', 'SuperAdmin', 'Jalan Kramat 98', '812345678', 'Laki-laki', '1655216988_e8b44035325f1534dda1.jpg', '$2y$10$UNrMKBd7/CtXdlGbIbNGpu2aBStaYpF/E8BnIanVJV1LY8CemweEe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-14 01:22:13', '2022-06-14 09:29:48', NULL),
(17, 'ahmadmursyidan@gmail.com', 'mursyidan', 'Ahmad Mursyidan', 'Jalan Ketapang Utara 1', '87777707921', 'Laki-laki', '1655617684_babdb41a035d93600654.jpg', '$2y$10$El2PwnZamOutfEM4uJurV.3KdD6ZBF3SSFaOv/NhC5qN2ArgPvG4W', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-16 18:41:07', '2022-06-19 00:48:04', NULL),
(18, 'admin@gmail.com', 'admin', 'admin', 'pasarbaru', '823232323', 'Laki-laki', '1655710443_ff23ecfb85d29fc9fe8f.jpg', '$2y$10$zY4A8S6WAC4PCOHR4bWaBu7SVomaDbcjN400HY8jRodeaGF4bklVK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-16 18:48:54', '2022-06-20 02:34:03', NULL),
(19, 'asemreges@gmail.com', 'asemreges', NULL, NULL, NULL, NULL, 'default.png', '$2y$10$JJxUoVyvrQUahYwmXYrcCeecqMZHuivqwOGFI5K69fAIUMuhkZ9.q', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-17 23:30:16', '2022-06-17 23:30:16', NULL),
(20, 'eko@gmail.com', 'eko', NULL, NULL, NULL, NULL, 'default.png', '$2y$10$xihrH8292Hod6mGEgOAJE.vibF5npDYbUWcyiLfwOVrG.0V44/uve', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-17 23:40:16', '2022-06-17 23:40:16', NULL),
(21, 'aegss98@gmail.com', 'aegss', 'halilintar', 'kramat98', '812345678', 'Laki-laki', '1655709485_cd613d9d27d8ee51c17d.jpg', '$2y$10$7im5316Rz0hODkzJJeRlVuo22vPpPBNv70jnVBsUVRaDAYi7wLFnW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-20 02:14:43', '2022-06-20 02:18:05', NULL),
(22, 'aji@gmail.com', 'aji', 'Aji Giatama', 'Jalan Ketapa', '8123456789', 'Perempuan', '1655715472_160610c3094d38867a5e.jpg', '$2y$10$LukWnnwZu6P49qpiablelOzEcL.ux49j6vOmcjxDv4kGu6G5Y8.vi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-20 03:56:10', '2022-06-20 03:57:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `kamar_tipe`
--
ALTER TABLE `kamar_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_metode` (`id_metode`),
  ADD KEY `id_penyewaan` (`id_penyewaan`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kamar` (`id_kamar`,`id_penghuni`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_penyewaan_penghuni` (`id_penghuni`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kamar_tipe`
--
ALTER TABLE `kamar_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `fk_kamar_tipe` FOREIGN KEY (`id_tipe`) REFERENCES `kamar_tipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_metode` FOREIGN KEY (`id_metode`) REFERENCES `metode_pembayaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembayaran_penyewaan` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `fk_penyewaan_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penyewaan_penghuni` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penyewaan_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
