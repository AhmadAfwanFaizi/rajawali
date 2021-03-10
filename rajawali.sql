-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2021 at 01:00 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `brand` varchar(225) NOT NULL,
  `remark` text,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `remark`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(5, 'Uniqlo', 'asdsad', 'Y', '2021-02-26 14:46:33', '1', NULL, NULL, NULL),
(6, 'brandon', 'brnd', 'Y', '2021-02-27 18:21:31', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `contact_person` varchar(225) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` text,
  `bill_to` text,
  `remark` text,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `id_customer`, `customer_name`, `contact_person`, `phone_number`, `address`, `bill_to`, `remark`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(6, '6038a60a4efab', 'Ahmad', '08564545', '08565435', 'Tangerang', 'asdasdsa', 'adsad', 'Y', '2021-02-26 14:40:58', '1', NULL, NULL, NULL),
(7, '604503db7c05b', 'anwan', '021', '021', 'bnz', 'afanw21', 'remark', 'N', '2021-03-07 23:48:27', '1', '2021-03-07 23:48:51', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `id_customer`, `email`) VALUES
(6, '6038a60a4efab', 'ahmad@gmail.com'),
(7, '604503db7c05b', 'afwan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `iso`
--

CREATE TABLE `iso` (
  `id` int NOT NULL,
  `iso` varchar(225) NOT NULL,
  `category` enum('TOYS','BABY_WEAR','BICYCLE','OTHERS','BASED','OTHER') DEFAULT NULL COMMENT '''TOYS'',''BABY_WEAR'',''BICYCLE'',''OTHERS'',''BASED'',''OTHER''',
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `iso`
--

INSERT INTO `iso` (`id`, `iso`, `category`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(39, 'SNI Certification Part 1', 'TOYS', 'Y', '2021-02-26 14:46:56', '1', NULL, NULL, NULL),
(40, 'Baby Wear', 'BABY_WEAR', 'Y', '2021-02-26 14:47:06', '1', NULL, NULL, NULL),
(41, 'Bicycle', 'BICYCLE', 'Y', '2021-02-26 14:47:16', '1', NULL, NULL, NULL),
(42, 'Others', 'OTHERS', 'N', '2021-02-26 14:47:25', '1', '2021-03-07 23:37:15', '1', NULL),
(44, 'Based on laboratory quotation no 0757', 'BASED', 'N', '2021-03-08 00:34:31', '1', '2021-03-08 00:37:17', '1', NULL),
(46, 'toys add test', 'TOYS', 'Y', '2021-03-09 20:30:01', '1', '2021-03-09 20:34:04', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `menu_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`) VALUES
(1, 'MASTER DATA'),
(2, 'SAMPLE'),
(3, 'SUBMITION');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_user`
--

CREATE TABLE `privilege_user` (
  `id` int NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `master_menu` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sample_menu` enum('Y','N') NOT NULL DEFAULT 'Y',
  `submition_menu` enum('Y','N') NOT NULL DEFAULT 'Y',
  `add_privilege` enum('Y','N') NOT NULL DEFAULT 'Y',
  `edit_privilege` enum('Y','N') NOT NULL DEFAULT 'Y',
  `print_privilege` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `privilege_user`
--

INSERT INTO `privilege_user` (`id`, `id_user`, `master_menu`, `sample_menu`, `submition_menu`, `add_privilege`, `edit_privilege`, `print_privilege`, `created_at`, `updated_at`) VALUES
(1, 'USR60313b6f580e4', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '2021-02-20 23:40:15', '2021-03-07 23:47:29'),
(2, 'USR603611bc1f335', 'Y', 'Y', 'Y', 'N', 'N', 'N', '2021-02-24 15:43:40', '2021-03-07 02:04:29'),
(3, '1', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '2021-03-08 21:32:02', NULL),
(4, 'USR60482c02bf546', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '2021-03-10 09:16:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int NOT NULL,
  `id_sample` varchar(225) NOT NULL,
  `quotation_no` text NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `id_brand` varchar(225) NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `id_sample`, `quotation_no`, `id_customer`, `id_brand`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(10, 'SMPL-H-6038c35bcfbda', '1234', '6038a60a4efab', '5', 'Y', '2021-02-26 16:46:03', '1', NULL, NULL, NULL),
(11, 'SMPL-H-603a2b49d04cb', '222', '6038a60a4efab', '6', 'Y', '2021-02-27 18:21:45', '1', NULL, NULL, NULL),
(12, 'SMPL-H-6043cc37832fe', '333', '6038a60a4efab', '6', 'N', '2021-03-07 01:38:47', '1', '2021-03-07 23:35:14', '1', NULL),
(13, 'SMPL-H-60450117af189', '555', '6038a60a4efab', '5', 'N', '2021-03-07 23:36:39', '1', '2021-03-07 23:36:49', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sample_detail`
--

CREATE TABLE `sample_detail` (
  `id` int NOT NULL,
  `id_sample` varchar(225) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `sample_description` text NOT NULL,
  `quantity` int DEFAULT NULL,
  `bapc_no` text,
  `date_received` date DEFAULT NULL,
  `date_testing` date DEFAULT NULL,
  `age_grading` text,
  `remark` text,
  `enable` enum('Y','N') NOT NULL,
  `status_sample` enum('PENDING','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sample_detail`
--

INSERT INTO `sample_detail` (`id`, `id_sample`, `sample_code`, `sample_description`, `quantity`, `bapc_no`, `date_received`, `date_testing`, `age_grading`, `remark`, `enable`, `status_sample`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(10, 'SMPL-H-6038c35bcfbda', 'RTL-SMPL-02/21/0001', 'Edt', 12, 'adasd', '2021-02-26', '2021-02-27', '1', 'Edit', 'Y', 'PROGRESS', '2021-02-26 16:46:26', '1', '2021-02-26 16:46:54', '1', NULL),
(11, 'SMPL-H-603a2b49d04cb', 'RTL-SMPL-02/21/0002', 'desc', 123, 'bapc', '2021-02-01', '2021-02-27', '123', 'remark', 'N', 'PROGRESS', '2021-02-27 18:22:15', '1', '2021-03-08 00:21:01', '1', NULL),
(12, 'SMPL-H-60450117af189', 'RTL-SMPL-03/21/0003', 'sample', 512, 'bapc 512', '2021-03-01', '2021-03-07', '5', 'remark update', 'N', 'PROGRESS', '2021-03-07 23:43:01', '1', '2021-03-08 00:07:14', '1', NULL),
(13, 'SMPL-H-6038c35bcfbda', 'RTL-SMPL-03/21/0004', 'sampl', 123, 'bapc123', '2021-03-01', '2021-03-08', '2022', 'rmek', 'Y', 'PROGRESS', '2021-03-08 00:22:12', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submition`
--

CREATE TABLE `submition` (
  `id` int NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `id_submition_tos` varchar(225) NOT NULL,
  `item_no` varchar(225) DEFAULT NULL,
  `iso_submition` varchar(225) DEFAULT NULL,
  `sni_certification` enum('TRUE','FALSE') DEFAULT NULL,
  `do_not_show_pass` enum('TRUE','FALSE') DEFAULT NULL,
  `retain_sample` enum('TRUE','FALSE') DEFAULT NULL,
  `other_method` text,
  `family_product` text,
  `product_end_use` text,
  `age_group` text,
  `country` text,
  `lab_subcont` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `submition`
--

INSERT INTO `submition` (`id`, `sample_code`, `id_submition_tos`, `item_no`, `iso_submition`, `sni_certification`, `do_not_show_pass`, `retain_sample`, `other_method`, `family_product`, `product_end_use`, `age_group`, `country`, `lab_subcont`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(10, 'RTL-SMPL-02/21/0001', '2', 'item no', 'ISO603a29b876b85', 'TRUE', 'TRUE', 'TRUE', 'other sample', 'family proudk', '12', '12', '12', '12', '2021-02-27 18:15:04', '1', '2021-02-27 18:20:41', '1', NULL),
(11, 'RTL-SMPL-02/21/0002', '2', '2', 'ISO603a2b9847237', 'TRUE', 'TRUE', 'TRUE', '2', 'produk brnadon', '2', '2', '2', '2', '2021-02-27 18:23:04', '1', '2021-02-27 18:23:33', '1', NULL),
(12, 'RTL-SMPL-03/21/0003', '4', '2', 'ISO60450ac914254', 'TRUE', 'TRUE', 'TRUE', 'opth', '123', '2022', '3', 'idn', 'rjwl', '2021-03-08 00:18:01', '1', NULL, NULL, NULL),
(13, 'RTL-SMPL-03/21/0004', '4', '123', 'ISO604779b47a1b2', 'TRUE', 'TRUE', 'TRUE', 'q', 'q', 'q', 'q', 'q', 'q', '2021-03-09 20:35:48', '1', '2021-03-09 20:36:25', '1', NULL),
(14, 'RTL-SMPL-02/21/0001', '1', '123', 'ISO60477a684c2d9', 'TRUE', 'TRUE', 'TRUE', 'w', 'w', 'w', 'w', 'w', 'w', '2021-03-09 20:38:48', '1', NULL, NULL, NULL),
(15, 'RTL-SMPL-03/21/0003', 'STOS604783fac524c', '123', 'ISO604783fac5246', 'TRUE', 'TRUE', 'TRUE', 'r', 'r', 'rr', 'r', 'r', 'r', '2021-03-09 21:19:38', '1', '2021-03-09 22:11:37', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submition_detail`
--

CREATE TABLE `submition_detail` (
  `id` int NOT NULL,
  `iso_submition` varchar(225) NOT NULL,
  `id_sni_iso` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `submition_detail`
--

INSERT INTO `submition_detail` (`id`, `iso_submition`, `id_sni_iso`, `created_at`, `updated_at`, `deleted_at`) VALUES
(233, 'ISO6038c3dbccf49', '39', '2021-02-26 16:48:11', NULL, '2021-02-26 16:48:52'),
(234, 'ISO6038c3dbccf49', '40', '2021-02-26 16:48:11', NULL, '2021-02-26 16:48:52'),
(235, 'ISO6038c3dbccf49', '41', '2021-02-26 16:48:11', NULL, '2021-02-26 16:48:52'),
(236, 'ISO6038c3dbccf49', '42', '2021-02-26 16:48:11', NULL, '2021-02-26 16:48:52'),
(237, 'ISO6038c3dbccf49', '39', '2021-02-26 16:48:52', NULL, NULL),
(238, 'ISO6038c3dbccf49', '40', '2021-02-26 16:48:52', NULL, NULL),
(239, 'ISO6038c3dbccf49', '41', '2021-02-26 16:48:52', NULL, NULL),
(240, 'ISO6038c3dbccf49', '42', '2021-02-26 16:48:52', NULL, NULL),
(241, 'ISO603a29b876b85', '39', '2021-02-27 18:15:04', NULL, '2021-02-27 18:20:41'),
(242, 'ISO603a29b876b85', '40', '2021-02-27 18:15:04', NULL, '2021-02-27 18:20:41'),
(243, 'ISO603a29b876b85', '41', '2021-02-27 18:15:04', NULL, '2021-02-27 18:20:41'),
(244, 'ISO603a29b876b85', '42', '2021-02-27 18:15:04', NULL, '2021-02-27 18:20:41'),
(245, 'ISO603a29b876b85', '39', '2021-02-27 18:15:31', NULL, '2021-02-27 18:20:41'),
(246, 'ISO603a29b876b85', '40', '2021-02-27 18:15:31', NULL, '2021-02-27 18:20:41'),
(247, 'ISO603a29b876b85', '41', '2021-02-27 18:15:31', NULL, '2021-02-27 18:20:41'),
(248, 'ISO603a29b876b85', '42', '2021-02-27 18:15:31', NULL, '2021-02-27 18:20:41'),
(249, 'ISO603a29b876b85', '39', '2021-02-27 18:15:58', NULL, '2021-02-27 18:20:41'),
(250, 'ISO603a29b876b85', '40', '2021-02-27 18:15:58', NULL, '2021-02-27 18:20:41'),
(251, 'ISO603a29b876b85', '41', '2021-02-27 18:15:58', NULL, '2021-02-27 18:20:41'),
(252, 'ISO603a29b876b85', '42', '2021-02-27 18:15:58', NULL, '2021-02-27 18:20:41'),
(253, 'ISO603a29b876b85', '39', '2021-02-27 18:20:41', NULL, NULL),
(254, 'ISO603a29b876b85', '40', '2021-02-27 18:20:41', NULL, NULL),
(255, 'ISO603a29b876b85', '41', '2021-02-27 18:20:41', NULL, NULL),
(256, 'ISO603a29b876b85', '42', '2021-02-27 18:20:41', NULL, NULL),
(257, 'ISO603a2b9847237', '39', '2021-02-27 18:23:04', NULL, '2021-02-27 18:23:33'),
(258, 'ISO603a2b9847237', '40', '2021-02-27 18:23:04', NULL, '2021-02-27 18:23:33'),
(259, 'ISO603a2b9847237', '41', '2021-02-27 18:23:04', NULL, '2021-02-27 18:23:33'),
(260, 'ISO603a2b9847237', '42', '2021-02-27 18:23:04', NULL, '2021-02-27 18:23:33'),
(261, 'ISO603a2b9847237', '39', '2021-02-27 18:23:33', NULL, NULL),
(262, 'ISO603a2b9847237', '40', '2021-02-27 18:23:33', NULL, NULL),
(263, 'ISO603a2b9847237', '41', '2021-02-27 18:23:33', NULL, NULL),
(264, 'ISO603a2b9847237', '42', '2021-02-27 18:23:33', NULL, NULL),
(265, 'ISO60450ac914254', '39', '2021-03-08 00:18:01', NULL, NULL),
(266, 'ISO60450ac914254', '40', '2021-03-08 00:18:01', NULL, NULL),
(267, 'ISO60450ac914254', '41', '2021-03-08 00:18:01', NULL, NULL),
(268, 'ISO604779b47a1b2', '39', '2021-03-09 20:35:48', NULL, '2021-03-09 20:36:25'),
(269, 'ISO604779b47a1b2', '46', '2021-03-09 20:35:48', NULL, '2021-03-09 20:36:25'),
(270, 'ISO604779b47a1b2', '39', '2021-03-09 20:36:25', NULL, NULL),
(271, 'ISO604779b47a1b2', '46', '2021-03-09 20:36:25', NULL, NULL),
(272, 'ISO604779b47a1b2', '44', '2021-03-09 20:36:25', NULL, NULL),
(273, 'ISO604779b47a1b2', '40', '2021-03-09 20:36:25', NULL, NULL),
(274, 'ISO604779b47a1b2', '42', '2021-03-09 20:36:25', NULL, NULL),
(275, 'ISO60477a684c2d9', '39', '2021-03-09 20:38:48', NULL, NULL),
(276, 'ISO60477a684c2d9', '46', '2021-03-09 20:38:48', NULL, NULL),
(277, 'ISO60477a684c2d9', '40', '2021-03-09 20:38:48', NULL, NULL),
(278, 'ISO60477a684c2d9', '41', '2021-03-09 20:38:48', NULL, NULL),
(279, 'ISO604783fac5246', '39', '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:37'),
(280, 'ISO604783fac5246', '46', '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:37'),
(281, 'ISO604783fac5246', '40', '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:37'),
(282, 'ISO604783fac5246', '41', '2021-03-09 21:19:38', NULL, '2021-03-09 22:05:28'),
(283, 'ISO604783fac5246', '39', '2021-03-09 22:05:28', NULL, '2021-03-09 22:11:37'),
(284, 'ISO604783fac5246', '46', '2021-03-09 22:05:28', NULL, '2021-03-09 22:11:37'),
(285, 'ISO604783fac5246', '40', '2021-03-09 22:05:28', NULL, '2021-03-09 22:11:37'),
(286, 'ISO604783fac5246', '39', '2021-03-09 22:05:37', NULL, '2021-03-09 22:11:37'),
(287, 'ISO604783fac5246', '46', '2021-03-09 22:05:37', NULL, '2021-03-09 22:11:37'),
(288, 'ISO604783fac5246', '40', '2021-03-09 22:05:37', NULL, '2021-03-09 22:11:37'),
(289, 'ISO604783fac5246', '39', '2021-03-09 22:05:54', NULL, '2021-03-09 22:11:37'),
(290, 'ISO604783fac5246', '46', '2021-03-09 22:05:54', NULL, '2021-03-09 22:11:37'),
(291, 'ISO604783fac5246', '40', '2021-03-09 22:05:54', NULL, '2021-03-09 22:11:37'),
(292, 'ISO604783fac5246', '39', '2021-03-09 22:08:18', NULL, '2021-03-09 22:11:37'),
(293, 'ISO604783fac5246', '46', '2021-03-09 22:08:18', NULL, '2021-03-09 22:11:37'),
(294, 'ISO604783fac5246', '40', '2021-03-09 22:08:18', NULL, '2021-03-09 22:11:37'),
(295, 'ISO604783fac5246', '39', '2021-03-09 22:08:25', NULL, '2021-03-09 22:11:37'),
(296, 'ISO604783fac5246', '46', '2021-03-09 22:08:25', NULL, '2021-03-09 22:11:37'),
(297, 'ISO604783fac5246', '40', '2021-03-09 22:08:25', NULL, '2021-03-09 22:11:37'),
(298, 'ISO604783fac5246', '39', '2021-03-09 22:09:41', NULL, '2021-03-09 22:11:37'),
(299, 'ISO604783fac5246', '46', '2021-03-09 22:09:41', NULL, '2021-03-09 22:11:37'),
(300, 'ISO604783fac5246', '40', '2021-03-09 22:09:41', NULL, '2021-03-09 22:11:37'),
(301, 'ISO604783fac5246', '39', '2021-03-09 22:09:48', NULL, '2021-03-09 22:11:37'),
(302, 'ISO604783fac5246', '46', '2021-03-09 22:09:48', NULL, '2021-03-09 22:11:37'),
(303, 'ISO604783fac5246', '40', '2021-03-09 22:09:48', NULL, '2021-03-09 22:11:37'),
(304, 'ISO604783fac5246', '39', '2021-03-09 22:10:00', NULL, '2021-03-09 22:11:37'),
(305, 'ISO604783fac5246', '46', '2021-03-09 22:10:00', NULL, '2021-03-09 22:11:37'),
(306, 'ISO604783fac5246', '40', '2021-03-09 22:10:00', NULL, '2021-03-09 22:11:37'),
(307, 'ISO604783fac5246', '39', '2021-03-09 22:10:34', NULL, '2021-03-09 22:11:37'),
(308, 'ISO604783fac5246', '46', '2021-03-09 22:10:34', NULL, '2021-03-09 22:11:37'),
(309, 'ISO604783fac5246', '40', '2021-03-09 22:10:34', NULL, '2021-03-09 22:11:37'),
(310, 'ISO604783fac5246', '39', '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:37'),
(311, 'ISO604783fac5246', '46', '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:37'),
(312, 'ISO604783fac5246', '40', '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:37'),
(313, 'ISO604783fac5246', '39', '2021-03-09 22:11:31', NULL, '2021-03-09 22:11:37'),
(314, 'ISO604783fac5246', '46', '2021-03-09 22:11:31', NULL, '2021-03-09 22:11:37'),
(315, 'ISO604783fac5246', '40', '2021-03-09 22:11:31', NULL, '2021-03-09 22:11:37'),
(316, 'ISO604783fac5246', '39', '2021-03-09 22:11:37', NULL, NULL),
(317, 'ISO604783fac5246', '46', '2021-03-09 22:11:37', NULL, NULL),
(318, 'ISO604783fac5246', '40', '2021-03-09 22:11:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submition_tos`
--

CREATE TABLE `submition_tos` (
  `id` int NOT NULL,
  `id_submition_tos` varchar(225) NOT NULL,
  `id_term_of_service_detail` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `submition_tos`
--

INSERT INTO `submition_tos` (`id`, `id_submition_tos`, `id_term_of_service_detail`, `created_at`, `created_by`, `deleted_at`) VALUES
(1, 'STOS604783fac524c', 1, '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:37'),
(2, 'STOS604783fac524c', 3, '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:31'),
(3, 'STOS604783fac524c', 2, '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:31'),
(4, 'STOS604783fac524c', 4, '2021-03-09 21:19:38', NULL, '2021-03-09 22:11:37'),
(5, 'STOS604783fac524c', 2, '2021-03-09 22:05:28', NULL, '2021-03-09 22:11:31'),
(6, 'STOS604783fac524c', 1, '2021-03-09 22:05:37', NULL, '2021-03-09 22:11:37'),
(7, 'STOS604783fac524c', 1, '2021-03-09 22:09:41', NULL, '2021-03-09 22:11:37'),
(8, 'STOS604783fac524c', 1, '2021-03-09 22:09:48', NULL, '2021-03-09 22:11:37'),
(9, 'STOS604783fac524c', 1, '2021-03-09 22:10:00', NULL, '2021-03-09 22:11:37'),
(10, 'STOS604783fac524c', 1, '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:37'),
(11, 'STOS604783fac524c', 3, '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:31'),
(12, 'STOS604783fac524c', 2, '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:31'),
(13, 'STOS604783fac524c', 4, '2021-03-09 22:11:21', NULL, '2021-03-09 22:11:37'),
(14, 'STOS604783fac524c', 1, '2021-03-09 22:11:31', NULL, '2021-03-09 22:11:37'),
(15, 'STOS604783fac524c', 4, '2021-03-09 22:11:31', NULL, '2021-03-09 22:11:37'),
(16, 'STOS604783fac524c', 4, '2021-03-09 22:11:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_of_service`
--

CREATE TABLE `term_of_service` (
  `id` int NOT NULL,
  `category` varchar(225) NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `term_of_service`
--

INSERT INTO `term_of_service` (`id`, `category`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'TOYS/ BABY WEAR/OTHERS ', 'Y', '2021-03-06 18:50:56', 1, '2021-03-06 20:01:14', 1),
(2, 'CHILDREN BICYCLE UPDATE', 'Y', '2021-03-06 19:49:09', 1, '2021-03-06 22:23:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `term_of_service_detail`
--

CREATE TABLE `term_of_service_detail` (
  `id` int NOT NULL,
  `id_term_of_service` int NOT NULL,
  `type` enum('REGULAR','EXPRESS') NOT NULL,
  `information` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `term_of_service_detail`
--

INSERT INTO `term_of_service_detail` (`id`, `id_term_of_service`, `type`, `information`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'REGULAR', '(8 working days)', '2021-03-07 01:20:50', 1, NULL, NULL),
(2, 2, 'REGULAR', '(15 working days)', '2021-03-07 01:21:46', 1, NULL, NULL),
(3, 1, 'EXPRESS', '(3 working days)\r\n(40% surcharge)', '2021-03-07 01:22:44', 1, NULL, NULL),
(4, 2, 'EXPRESS', '(7 working days)\r\n(40% surcharge)', '2021-03-07 01:22:57', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('ADMIN','USER') NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'admin', 'admin', 'ADMIN', 'user_default.png', 'Y', '2021-02-06 22:03:31', '2021-02-21 00:23:23', NULL),
('USR60313b6f580e4', 'ahmad', '123', 'USER', 'user_default.png', 'Y', '2021-02-20 23:40:15', '2021-03-07 23:47:29', NULL),
('USR603611bc1f335', 'coba', '123', 'USER', 'USR6043d23d0f400.jpg', 'Y', '2021-02-24 15:43:40', '2021-03-07 02:04:29', NULL),
('USR60482c02bf546', 'coba', 'coba', 'USER', 'user_default.png', 'Y', '2021-03-10 09:16:34', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iso`
--
ALTER TABLE `iso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_user`
--
ALTER TABLE `privilege_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_detail`
--
ALTER TABLE `sample_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submition`
--
ALTER TABLE `submition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submition_detail`
--
ALTER TABLE `submition_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submition_tos`
--
ALTER TABLE `submition_tos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_of_service`
--
ALTER TABLE `term_of_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_of_service_detail`
--
ALTER TABLE `term_of_service_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iso`
--
ALTER TABLE `iso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privilege_user`
--
ALTER TABLE `privilege_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `submition`
--
ALTER TABLE `submition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submition_detail`
--
ALTER TABLE `submition_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `submition_tos`
--
ALTER TABLE `submition_tos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `term_of_service`
--
ALTER TABLE `term_of_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `term_of_service_detail`
--
ALTER TABLE `term_of_service_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
