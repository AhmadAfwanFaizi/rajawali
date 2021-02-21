-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2021 pada 14.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajawali`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `remark` text DEFAULT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id`, `brand`, `remark`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'SUNDAY SUNDAY', 'faizi', 'Y', '2021-02-17 09:28:26', '', '2021-02-17 09:33:15', '', NULL),
(2, 'oricio', 'remark oricio update 1', 'Y', '2021-02-21 02:00:57', '1', '2021-02-21 02:02:22', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `contact_person` varchar(225) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `bill_to` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `id_customer`, `customer_name`, `contact_person`, `phone_number`, `address`, `bill_to`, `remark`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '602c7eed2b6f9', 'Ahmad', '@ahmad', '021', 'benyawakan', 'ahmad lah', 'remark', 'Y', '2021-02-17 09:26:53', '', '2021-02-17 09:29:23', '', NULL),
(2, '60315bd25ae7c', 'afwan', '021', '021', 'bnz update 2', 'billto', 'remarks', 'Y', '2021-02-21 01:58:26', '1', '2021-02-21 01:58:59', '1', NULL),
(3, '603208ff3d17c', 'coba 3', '231', '321', 'bnz', 'bill', 'ramrk', 'Y', '2021-02-21 14:17:19', '1', '2021-02-21 14:17:58', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `id_customer`, `email`) VALUES
(1, '602c7eed2b6f9', 'ahmad@yahoo.com'),
(2, '60315bd25ae7c', 'faiz@agmail.,com'),
(3, '603208ff3d17c', 'coba@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iso`
--

CREATE TABLE `iso` (
  `id` int(11) NOT NULL,
  `iso` varchar(225) NOT NULL,
  `category` enum('INCLUDE','BABY_WEAR','BICYCLE','OTHERS','BASED','OTHER') DEFAULT NULL,
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `iso`
--

INSERT INTO `iso` (`id`, `iso`, `category`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'SNI ISO 8124-1 Safety of toys - part 1', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(2, 'SNI ISO 8124-2 Safety of toys - part 2', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(3, 'SNI ISO 8124-3 Safety of toys - Part 3', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(4, 'SNI ISO 8124-4 Safety of toys - Part 4', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(5, 'EN71-5 Safety of toys - Part 5', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(6, 'SNI 8580-3 ISO 8124-3 Safety of toys - Part 3', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(7, 'SNI IEC 62115:2011 Electric toys – Safety', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(8, 'SNI ISO 14184-1 Formaldehyde', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(9, 'SNI 6686 Textile', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(10, 'SNI 7334.1 Azo Dyes', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(11, 'CPSC-CH-C1001-09.04 Phthalates', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(12, 'SNI 8578 Phthalates', 'INCLUDE', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(13, 'SNI 7334 Extractable Heavy Metals', 'BABY_WEAR', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(14, 'SNI 7334.1 Azo Dyes', 'BABY_WEAR', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(17, 'SNI ISO 14184-1 Formaldehyde', 'BABY_WEAR', 'Y', '2021-02-16 16:01:01', '1', NULL, '', NULL),
(18, 'SNI 8224 Children bicycle', 'BICYCLE', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(19, 'SNI 7334 Extractable Heavy Metals', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(20, 'SNI ISO 14184-1 Formaldehyde', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(21, 'SNI ISO 24362-1 Azo Dyes', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(22, 'SNI ISO 24362-3 Azo Dyes', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(23, 'SNI ISO 14389 Phthalates', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(24, 'SNI 8360 PFOS/PFOA', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(25, 'SNI ISO 17881-1 pentaBDE', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(26, 'SNI ISO 8124-3 Migration', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(27, 'ISO/TS 16181 Phthalates', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(28, 'CPSC-CH-C1001-09.03 Phthalates', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(29, 'NMAM-9002 Asbes', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(30, 'EPA 600/R-93/116 Asbes', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(31, 'JIS A 1481 Asbes', 'OTHERS', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(32, 'Based on laboratory quotation no 0757', 'BASED', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(33, 'Other', 'OTHER', 'Y', '2021-02-16 16:01:01', '', NULL, '', NULL),
(34, 'percobaan', 'OTHERS', 'Y', '2021-02-16 16:15:28', '', NULL, '', '2021-02-16 16:19:44'),
(35, 'percobaan', 'BICYCLE', 'N', '2021-02-16 16:19:08', '', '2021-02-16 16:21:18', '', NULL),
(36, 'coba 2', 'OTHERS', 'Y', '2021-02-17 16:10:05', '', '2021-02-17 16:11:21', '', '2021-02-17 16:22:23'),
(37, 'adah coba iso', 'BICYCLE', 'Y', '2021-02-21 02:03:00', '1', '0000-00-00 00:00:00', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `privilege_user`
--

CREATE TABLE `privilege_user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `add_privilege` enum('Y','N') NOT NULL DEFAULT 'Y',
  `edit_privilege` enum('Y','N') NOT NULL DEFAULT 'Y',
  `print_privilege` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `privilege_user`
--

INSERT INTO `privilege_user` (`id`, `id_user`, `add_privilege`, `edit_privilege`, `print_privilege`, `created_at`, `updated_at`) VALUES
(1, 'USR60313b6f580e4', 'N', 'N', 'N', '2021-02-20 23:40:15', '2021-02-21 01:40:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `id_sample` varchar(225) NOT NULL,
  `quotation_no` text NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `id_brand` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sample`
--

INSERT INTO `sample` (`id`, `id_sample`, `quotation_no`, `id_customer`, `id_brand`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'SMPL-H-602c807e93f66', '111', '602c7eed2b6f9', '1', '2021-02-17 09:33:34', '', NULL, NULL, '2021-02-18 19:48:13'),
(2, 'SMPL-H-602cdee58cbef', '222', '602c7eed2b6f9', '1', '2021-02-17 16:16:21', '', NULL, NULL, NULL),
(3, 'SMPL-H-60315ed699474', '333', '602c7eed2b6f9', '2', '2021-02-21 02:11:18', '1', '2021-02-21 02:11:39', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sample_detail`
--

CREATE TABLE `sample_detail` (
  `id` int(11) NOT NULL,
  `id_sample` varchar(225) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `sample_description` text NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `bapc_no` text DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `date_testing` date DEFAULT NULL,
  `age_grading` text DEFAULT NULL,
  `status_sample` enum('PENDING','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sample_detail`
--

INSERT INTO `sample_detail` (`id`, `id_sample`, `sample_code`, `sample_description`, `quantity`, `bapc_no`, `date_received`, `date_testing`, `age_grading`, `status_sample`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'SMPL-H-602c807e93f66', 'RTL-SMPL-02/21/0001', 'description', 12, 'BAPAC2', '2021-02-01', '2021-02-17', '12', 'PROGRESS', '2021-02-17 09:34:14', '', NULL, NULL, NULL),
(3, 'SMPL-H-602cdee58cbef', 'RTL-SMPL-02/21/0003', 'sample desc dua 2', 222, 'bapc 2', '2021-02-01', '2021-02-17', 'age grading dua dua', 'PROGRESS', '2021-02-17 16:18:09', '', NULL, NULL, NULL),
(4, 'SMPL-H-60315ed699474', 'RTL-SMPL-02/21/0004', 'sample 3', 333, 'bapc 3', '2021-02-01', '2021-02-21', '3 update', 'PROGRESS', '2021-02-21 02:12:58', '1', '2021-02-21 02:35:02', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submition`
--

CREATE TABLE `submition` (
  `id` int(11) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `id_term_of_service_1` varchar(10) NOT NULL COMMENT '.TOYS/ BABY WEAR/OTHERS',
  `id_term_of_service_2` varchar(10) NOT NULL COMMENT 'CHILDREN BICYCLE',
  `item_no` varchar(225) NOT NULL,
  `iso_submition` varchar(225) NOT NULL,
  `sni_certification` enum('TRUE','FALSE') DEFAULT NULL,
  `do_not_show_pass` enum('TRUE','FALSE') DEFAULT NULL,
  `retain_sample` enum('TRUE','FALSE') DEFAULT NULL,
  `other_method` text DEFAULT NULL,
  `family_product` text DEFAULT NULL,
  `product_end_use` text DEFAULT NULL,
  `age_group` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `lab_subcont` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `submition`
--

INSERT INTO `submition` (`id`, `sample_code`, `id_term_of_service_1`, `id_term_of_service_2`, `item_no`, `iso_submition`, `sni_certification`, `do_not_show_pass`, `retain_sample`, `other_method`, `family_product`, `product_end_use`, `age_group`, `country`, `lab_subcont`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(2, 'RTL-SMPL-02/21/0002', '1', '1', 'ITEM77 2', 'ISO602cd212f1a97', 'TRUE', 'TRUE', 'TRUE', 'other', 'indodant SNI ISO 8124-1 Safety of toys - SNI ISO 14184-1 Formaldehyde', '2022 sampai akhir tahun lebaran', '12th', 'indonesia raya merdeka merdeka', 'sub lab', '2021-02-17 15:21:38', '2021-02-21 02:36:47', '2021-02-17 15:31:24', NULL, NULL),
(3, 'RTL-SMPL-02/21/0003', '1', '2', 'ITEM77 2', 'ISO602ce0d449391', 'TRUE', 'TRUE', 'TRUE', 'coba 2', 'coba  2 percobaan karakter panjang untuk memnentukan fleksibilitas tabel', 'coba 2', 'coba 2', 'coba 2', 'coba 2', '2021-02-17 16:24:36', '2021-02-21 02:36:47', '2021-02-20 23:03:55', NULL, NULL),
(4, 'RTL-SMPL-02/21/0004', '1', '1', '1', 'ISO6031661b40ceb', 'TRUE', 'TRUE', 'TRUE', '1', '1 update', '1 update', '1', '1', '1', '2021-02-21 02:42:19', '1', '2021-02-21 02:44:52', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submition_detail`
--

CREATE TABLE `submition_detail` (
  `id` int(11) NOT NULL,
  `iso_submition` varchar(225) NOT NULL,
  `id_sni_iso` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `submition_detail`
--

INSERT INTO `submition_detail` (`id`, `iso_submition`, `id_sni_iso`, `created_at`, `updated_at`, `deleted_at`) VALUES
(59, 'ISO602141bb734bf', '3', '2021-02-10 13:57:25', NULL, '2021-02-10 13:57:34'),
(60, 'ISO602141bb734bf', '13', '2021-02-10 13:57:25', NULL, '2021-02-10 13:57:34'),
(61, 'ISO602141bb734bf', '20', '2021-02-10 13:57:25', NULL, '2021-02-10 13:57:34'),
(62, 'ISO602141bb734bf', '21', '2021-02-10 13:57:25', NULL, '2021-02-10 13:57:34'),
(63, 'ISO602141bb734bf', '22', '2021-02-10 13:57:25', NULL, '2021-02-10 13:57:34'),
(64, 'ISO602141bb734bf', '1', '2021-02-10 13:57:34', NULL, NULL),
(65, 'ISO602141bb734bf', '2', '2021-02-10 13:57:34', NULL, NULL),
(66, 'ISO602141bb734bf', '3', '2021-02-10 13:57:34', NULL, NULL),
(67, 'ISO602141bb734bf', '13', '2021-02-10 13:57:34', NULL, NULL),
(68, 'ISO602141bb734bf', '20', '2021-02-10 13:57:34', NULL, NULL),
(69, 'ISO602141bb734bf', '21', '2021-02-10 13:57:34', NULL, NULL),
(70, 'ISO602141bb734bf', '22', '2021-02-10 13:57:34', NULL, NULL),
(71, 'ISO60239ec894f02', '9', '2021-02-10 15:52:24', NULL, '2021-02-10 15:54:21'),
(72, 'ISO60239ec894f02', '13', '2021-02-10 15:52:24', NULL, '2021-02-10 15:54:21'),
(73, 'ISO60239ec894f02', '18', '2021-02-10 15:52:24', NULL, '2021-02-10 15:54:21'),
(74, 'ISO60239ec894f02', '31', '2021-02-10 15:52:24', NULL, '2021-02-10 15:54:21'),
(75, 'ISO60239ec894f02', '33', '2021-02-10 15:52:24', NULL, '2021-02-10 15:54:21'),
(76, 'ISO60239ec894f02', '9', '2021-02-10 15:54:21', NULL, NULL),
(77, 'ISO60239ec894f02', '32', '2021-02-10 15:54:21', NULL, NULL),
(78, 'ISO60239ec894f02', '13', '2021-02-10 15:54:21', NULL, NULL),
(79, 'ISO60239ec894f02', '31', '2021-02-10 15:54:21', NULL, NULL),
(80, 'ISO60239ec894f02', '33', '2021-02-10 15:54:21', NULL, NULL),
(81, 'ISO602c83222fdfa', '12', '2021-02-17 09:44:50', NULL, '2021-02-17 15:19:51'),
(82, 'ISO602c83222fdfa', '32', '2021-02-17 09:44:50', NULL, '2021-02-17 15:19:51'),
(83, 'ISO602c83222fdfa', '17', '2021-02-17 09:44:50', NULL, '2021-02-17 15:19:51'),
(84, 'ISO602c83222fdfa', '35', '2021-02-17 09:44:50', NULL, '2021-02-17 14:12:45'),
(85, 'ISO602c83222fdfa', '31', '2021-02-17 09:44:50', NULL, '2021-02-17 15:19:51'),
(86, 'ISO602c83222fdfa', '34', '2021-02-17 09:44:50', NULL, '2021-02-17 15:19:51'),
(87, 'ISO602c83222fdfa', '33', '2021-02-17 09:44:50', NULL, '2021-02-17 15:19:51'),
(88, 'ISO602c83222fdfa', '12', '2021-02-17 14:12:45', NULL, '2021-02-17 15:19:51'),
(89, 'ISO602c83222fdfa', '32', '2021-02-17 14:12:45', NULL, '2021-02-17 15:19:51'),
(90, 'ISO602c83222fdfa', '17', '2021-02-17 14:12:45', NULL, '2021-02-17 15:19:51'),
(91, 'ISO602c83222fdfa', '31', '2021-02-17 14:12:45', NULL, '2021-02-17 15:19:51'),
(92, 'ISO602c83222fdfa', '34', '2021-02-17 14:12:45', NULL, '2021-02-17 15:19:51'),
(93, 'ISO602c83222fdfa', '33', '2021-02-17 14:12:45', NULL, '2021-02-17 15:19:51'),
(94, 'ISO602c83222fdfa', '12', '2021-02-17 14:12:58', NULL, '2021-02-17 15:19:51'),
(95, 'ISO602c83222fdfa', '32', '2021-02-17 14:12:58', NULL, '2021-02-17 15:19:51'),
(96, 'ISO602c83222fdfa', '17', '2021-02-17 14:12:58', NULL, '2021-02-17 15:19:51'),
(97, 'ISO602c83222fdfa', '31', '2021-02-17 14:12:58', NULL, '2021-02-17 15:19:51'),
(98, 'ISO602c83222fdfa', '34', '2021-02-17 14:12:58', NULL, '2021-02-17 15:19:51'),
(99, 'ISO602c83222fdfa', '33', '2021-02-17 14:12:58', NULL, '2021-02-17 15:19:51'),
(100, 'ISO602c83222fdfa', '12', '2021-02-17 14:21:21', NULL, '2021-02-17 15:19:51'),
(101, 'ISO602c83222fdfa', '32', '2021-02-17 14:21:21', NULL, '2021-02-17 15:19:51'),
(102, 'ISO602c83222fdfa', '17', '2021-02-17 14:21:21', NULL, '2021-02-17 15:19:51'),
(103, 'ISO602c83222fdfa', '31', '2021-02-17 14:21:21', NULL, '2021-02-17 15:19:51'),
(104, 'ISO602c83222fdfa', '34', '2021-02-17 14:21:21', NULL, '2021-02-17 15:19:51'),
(105, 'ISO602c83222fdfa', '33', '2021-02-17 14:21:21', NULL, '2021-02-17 15:19:51'),
(106, 'ISO602c83222fdfa', '12', '2021-02-17 14:23:41', NULL, '2021-02-17 15:19:51'),
(107, 'ISO602c83222fdfa', '32', '2021-02-17 14:23:41', NULL, '2021-02-17 15:19:51'),
(108, 'ISO602c83222fdfa', '17', '2021-02-17 14:23:41', NULL, '2021-02-17 15:19:51'),
(109, 'ISO602c83222fdfa', '31', '2021-02-17 14:23:41', NULL, '2021-02-17 15:19:51'),
(110, 'ISO602c83222fdfa', '34', '2021-02-17 14:23:41', NULL, '2021-02-17 15:19:51'),
(111, 'ISO602c83222fdfa', '33', '2021-02-17 14:23:41', NULL, '2021-02-17 15:19:51'),
(112, 'ISO602c83222fdfa', '12', '2021-02-17 14:23:49', NULL, '2021-02-17 15:19:51'),
(113, 'ISO602c83222fdfa', '32', '2021-02-17 14:23:49', NULL, '2021-02-17 15:19:51'),
(114, 'ISO602c83222fdfa', '17', '2021-02-17 14:23:49', NULL, '2021-02-17 15:19:51'),
(115, 'ISO602c83222fdfa', '31', '2021-02-17 14:23:49', NULL, '2021-02-17 15:19:51'),
(116, 'ISO602c83222fdfa', '34', '2021-02-17 14:23:49', NULL, '2021-02-17 15:19:51'),
(117, 'ISO602c83222fdfa', '33', '2021-02-17 14:23:49', NULL, '2021-02-17 15:19:51'),
(118, 'ISO602c83222fdfa', '12', '2021-02-17 15:14:05', NULL, '2021-02-17 15:19:51'),
(119, 'ISO602c83222fdfa', '32', '2021-02-17 15:14:05', NULL, '2021-02-17 15:19:51'),
(120, 'ISO602c83222fdfa', '17', '2021-02-17 15:14:05', NULL, '2021-02-17 15:19:51'),
(121, 'ISO602c83222fdfa', '31', '2021-02-17 15:14:05', NULL, '2021-02-17 15:19:51'),
(122, 'ISO602c83222fdfa', '34', '2021-02-17 15:14:05', NULL, '2021-02-17 15:19:51'),
(123, 'ISO602c83222fdfa', '33', '2021-02-17 15:14:05', NULL, '2021-02-17 15:19:51'),
(124, 'ISO602c83222fdfa', '12', '2021-02-17 15:15:56', NULL, '2021-02-17 15:19:51'),
(125, 'ISO602c83222fdfa', '32', '2021-02-17 15:15:56', NULL, '2021-02-17 15:19:51'),
(126, 'ISO602c83222fdfa', '17', '2021-02-17 15:15:56', NULL, '2021-02-17 15:19:51'),
(127, 'ISO602c83222fdfa', '31', '2021-02-17 15:15:56', NULL, '2021-02-17 15:19:51'),
(128, 'ISO602c83222fdfa', '34', '2021-02-17 15:15:56', NULL, '2021-02-17 15:19:51'),
(129, 'ISO602c83222fdfa', '33', '2021-02-17 15:15:56', NULL, '2021-02-17 15:19:51'),
(130, 'ISO602c83222fdfa', '12', '2021-02-17 15:16:13', NULL, '2021-02-17 15:19:51'),
(131, 'ISO602c83222fdfa', '32', '2021-02-17 15:16:13', NULL, '2021-02-17 15:19:51'),
(132, 'ISO602c83222fdfa', '17', '2021-02-17 15:16:13', NULL, '2021-02-17 15:19:51'),
(133, 'ISO602c83222fdfa', '31', '2021-02-17 15:16:13', NULL, '2021-02-17 15:19:51'),
(134, 'ISO602c83222fdfa', '34', '2021-02-17 15:16:13', NULL, '2021-02-17 15:19:51'),
(135, 'ISO602c83222fdfa', '33', '2021-02-17 15:16:13', NULL, '2021-02-17 15:19:51'),
(136, 'ISO602c83222fdfa', '12', '2021-02-17 15:16:44', NULL, '2021-02-17 15:19:51'),
(137, 'ISO602c83222fdfa', '32', '2021-02-17 15:16:44', NULL, '2021-02-17 15:19:51'),
(138, 'ISO602c83222fdfa', '17', '2021-02-17 15:16:44', NULL, '2021-02-17 15:19:51'),
(139, 'ISO602c83222fdfa', '31', '2021-02-17 15:16:44', NULL, '2021-02-17 15:19:51'),
(140, 'ISO602c83222fdfa', '34', '2021-02-17 15:16:44', NULL, '2021-02-17 15:19:51'),
(141, 'ISO602c83222fdfa', '33', '2021-02-17 15:16:44', NULL, '2021-02-17 15:19:51'),
(142, 'ISO602c83222fdfa', '12', '2021-02-17 15:19:51', NULL, NULL),
(143, 'ISO602c83222fdfa', '32', '2021-02-17 15:19:51', NULL, NULL),
(144, 'ISO602c83222fdfa', '17', '2021-02-17 15:19:51', NULL, NULL),
(145, 'ISO602c83222fdfa', '31', '2021-02-17 15:19:51', NULL, NULL),
(146, 'ISO602c83222fdfa', '34', '2021-02-17 15:19:51', NULL, NULL),
(147, 'ISO602c83222fdfa', '33', '2021-02-17 15:19:51', NULL, NULL),
(148, 'ISO602cd212f1a97', '12', '2021-02-17 15:21:38', NULL, '2021-02-17 15:31:24'),
(149, 'ISO602cd212f1a97', '32', '2021-02-17 15:21:38', NULL, '2021-02-17 15:31:24'),
(150, 'ISO602cd212f1a97', '17', '2021-02-17 15:21:39', NULL, '2021-02-17 15:31:24'),
(151, 'ISO602cd212f1a97', '35', '2021-02-17 15:21:39', NULL, '2021-02-17 15:30:58'),
(152, 'ISO602cd212f1a97', '34', '2021-02-17 15:21:39', NULL, '2021-02-17 15:31:24'),
(153, 'ISO602cd212f1a97', '33', '2021-02-17 15:21:39', NULL, '2021-02-17 15:31:24'),
(154, 'ISO602cd212f1a97', '12', '2021-02-17 15:30:58', NULL, '2021-02-17 15:31:24'),
(155, 'ISO602cd212f1a97', '32', '2021-02-17 15:30:58', NULL, '2021-02-17 15:31:24'),
(156, 'ISO602cd212f1a97', '17', '2021-02-17 15:30:58', NULL, '2021-02-17 15:31:24'),
(157, 'ISO602cd212f1a97', '34', '2021-02-17 15:30:58', NULL, '2021-02-17 15:31:24'),
(158, 'ISO602cd212f1a97', '33', '2021-02-17 15:30:58', NULL, '2021-02-17 15:31:24'),
(159, 'ISO602cd212f1a97', '12', '2021-02-17 15:31:24', NULL, NULL),
(160, 'ISO602cd212f1a97', '32', '2021-02-17 15:31:24', NULL, NULL),
(161, 'ISO602cd212f1a97', '17', '2021-02-17 15:31:24', NULL, NULL),
(162, 'ISO602cd212f1a97', '34', '2021-02-17 15:31:24', NULL, NULL),
(163, 'ISO602cd212f1a97', '33', '2021-02-17 15:31:24', NULL, NULL),
(164, 'ISO602ce0d449391', '12', '2021-02-17 16:24:36', NULL, '2021-02-20 23:03:55'),
(165, 'ISO602ce0d449391', '32', '2021-02-17 16:24:36', NULL, '2021-02-20 23:03:55'),
(166, 'ISO602ce0d449391', '17', '2021-02-17 16:24:36', NULL, '2021-02-20 23:03:55'),
(167, 'ISO602ce0d449391', '18', '2021-02-17 16:24:36', NULL, '2021-02-18 19:50:20'),
(168, 'ISO602ce0d449391', '31', '2021-02-17 16:24:36', NULL, '2021-02-20 23:03:55'),
(169, 'ISO602ce0d449391', '33', '2021-02-17 16:24:36', NULL, '2021-02-20 23:03:55'),
(170, 'ISO602ce0d449391', '12', '2021-02-18 19:50:20', NULL, '2021-02-20 23:03:55'),
(171, 'ISO602ce0d449391', '32', '2021-02-18 19:50:20', NULL, '2021-02-20 23:03:55'),
(172, 'ISO602ce0d449391', '17', '2021-02-18 19:50:20', NULL, '2021-02-20 23:03:55'),
(173, 'ISO602ce0d449391', '31', '2021-02-18 19:50:20', NULL, '2021-02-20 23:03:55'),
(174, 'ISO602ce0d449391', '33', '2021-02-18 19:50:20', NULL, '2021-02-20 23:03:55'),
(175, 'ISO602ce0d449391', '12', '2021-02-18 19:51:02', NULL, '2021-02-20 23:03:55'),
(176, 'ISO602ce0d449391', '32', '2021-02-18 19:51:02', NULL, '2021-02-20 23:03:55'),
(177, 'ISO602ce0d449391', '17', '2021-02-18 19:51:02', NULL, '2021-02-20 23:03:55'),
(178, 'ISO602ce0d449391', '31', '2021-02-18 19:51:02', NULL, '2021-02-20 23:03:55'),
(179, 'ISO602ce0d449391', '33', '2021-02-18 19:51:02', NULL, '2021-02-20 23:03:55'),
(180, 'ISO602ce0d449391', '12', '2021-02-18 19:51:55', NULL, '2021-02-20 23:03:55'),
(181, 'ISO602ce0d449391', '32', '2021-02-18 19:51:55', NULL, '2021-02-20 23:03:55'),
(182, 'ISO602ce0d449391', '17', '2021-02-18 19:51:55', NULL, '2021-02-20 23:03:55'),
(183, 'ISO602ce0d449391', '31', '2021-02-18 19:51:55', NULL, '2021-02-20 23:03:55'),
(184, 'ISO602ce0d449391', '33', '2021-02-18 19:51:55', NULL, '2021-02-20 23:03:55'),
(185, 'ISO602ce0d449391', '12', '2021-02-20 23:03:35', NULL, '2021-02-20 23:03:55'),
(186, 'ISO602ce0d449391', '32', '2021-02-20 23:03:35', NULL, '2021-02-20 23:03:55'),
(187, 'ISO602ce0d449391', '17', '2021-02-20 23:03:35', NULL, '2021-02-20 23:03:55'),
(188, 'ISO602ce0d449391', '31', '2021-02-20 23:03:35', NULL, '2021-02-20 23:03:55'),
(189, 'ISO602ce0d449391', '33', '2021-02-20 23:03:35', NULL, '2021-02-20 23:03:55'),
(190, 'ISO602ce0d449391', '12', '2021-02-20 23:03:55', NULL, NULL),
(191, 'ISO602ce0d449391', '32', '2021-02-20 23:03:55', NULL, NULL),
(192, 'ISO602ce0d449391', '17', '2021-02-20 23:03:55', NULL, NULL),
(193, 'ISO602ce0d449391', '31', '2021-02-20 23:03:55', NULL, NULL),
(194, 'ISO602ce0d449391', '33', '2021-02-20 23:03:55', NULL, NULL),
(195, 'ISO6031661b40ceb', '1', '2021-02-21 02:42:19', NULL, '2021-02-21 02:44:52'),
(196, 'ISO6031661b40ceb', '32', '2021-02-21 02:42:19', NULL, '2021-02-21 02:44:52'),
(197, 'ISO6031661b40ceb', '13', '2021-02-21 02:42:19', NULL, '2021-02-21 02:44:52'),
(198, 'ISO6031661b40ceb', '18', '2021-02-21 02:42:19', NULL, '2021-02-21 02:43:00'),
(199, 'ISO6031661b40ceb', '19', '2021-02-21 02:42:19', NULL, '2021-02-21 02:44:52'),
(200, 'ISO6031661b40ceb', '33', '2021-02-21 02:42:19', NULL, '2021-02-21 02:44:52'),
(201, 'ISO6031661b40ceb', '1', '2021-02-21 02:43:00', NULL, '2021-02-21 02:44:52'),
(202, 'ISO6031661b40ceb', '32', '2021-02-21 02:43:00', NULL, '2021-02-21 02:44:52'),
(203, 'ISO6031661b40ceb', '13', '2021-02-21 02:43:00', NULL, '2021-02-21 02:44:52'),
(204, 'ISO6031661b40ceb', '19', '2021-02-21 02:43:00', NULL, '2021-02-21 02:44:52'),
(205, 'ISO6031661b40ceb', '33', '2021-02-21 02:43:00', NULL, '2021-02-21 02:44:52'),
(206, 'ISO6031661b40ceb', '1', '2021-02-21 02:44:52', NULL, NULL),
(207, 'ISO6031661b40ceb', '32', '2021-02-21 02:44:52', NULL, NULL),
(208, 'ISO6031661b40ceb', '13', '2021-02-21 02:44:52', NULL, NULL),
(209, 'ISO6031661b40ceb', '19', '2021-02-21 02:44:52', NULL, NULL),
(210, 'ISO6031661b40ceb', '33', '2021-02-21 02:44:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `term_of_service_1`
--

CREATE TABLE `term_of_service_1` (
  `id` int(11) NOT NULL,
  `type` enum('REGULAR','EXPRESS') NOT NULL COMMENT 'TOYS/ BABY WEAR/OTHERS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `term_of_service_1`
--

INSERT INTO `term_of_service_1` (`id`, `type`) VALUES
(1, 'REGULAR'),
(2, 'EXPRESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `term_of_service_2`
--

CREATE TABLE `term_of_service_2` (
  `id` int(11) NOT NULL,
  `type` enum('REGULAR','EXPRESS') NOT NULL COMMENT '.CHILDREN BICYCLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `term_of_service_2`
--

INSERT INTO `term_of_service_2` (`id`, `type`) VALUES
(1, 'REGULAR'),
(2, 'EXPRESS'),
(3, 'REGULAR'),
(4, 'EXPRESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('ADMIN','USER') NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'admin', 'admin', 'ADMIN', 'user_default.png', 'Y', '2021-02-06 22:03:31', '2021-02-21 00:23:23', NULL),
('USR60313b6f580e4', 'ahmad', '123', 'USER', 'user_default.png', 'Y', '2021-02-20 23:40:15', '2021-02-21 01:40:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iso`
--
ALTER TABLE `iso`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `privilege_user`
--
ALTER TABLE `privilege_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sample_detail`
--
ALTER TABLE `sample_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submition`
--
ALTER TABLE `submition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submition_detail`
--
ALTER TABLE `submition_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `term_of_service_1`
--
ALTER TABLE `term_of_service_1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `term_of_service_2`
--
ALTER TABLE `term_of_service_2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `iso`
--
ALTER TABLE `iso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `privilege_user`
--
ALTER TABLE `privilege_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `submition`
--
ALTER TABLE `submition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `submition_detail`
--
ALTER TABLE `submition_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
