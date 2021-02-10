-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2021 at 04:16 PM
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
  `remark` text NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hotweels', 'remaek hotweels', 'Y', '2021-02-07 20:27:27', NULL, NULL),
(2, 'bear bare', 'remake bear', 'Y', '2021-02-07 20:27:47', NULL, NULL),
(3, 'mcd', 'remark mcd', 'Y', '2021-02-07 20:27:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `contact_person` varchar(225) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `bill_to` text NOT NULL,
  `remark` text NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `id_customer`, `customer_name`, `contact_person`, `phone_number`, `address`, `bill_to`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '6020b4c8adb2a', 'ahmad', '@ahmad', '021', 'bnz', 'bill elish', 'remark ahmad', 'Y', '2021-02-08 10:49:28', NULL, NULL),
(5, '6020b4ea151f0', 'afwan', '@afwan', '032', 'nibunk', 'billie', 'remark afwan', 'Y', '2021-02-08 10:50:02', NULL, NULL),
(6, '6020b511045be', 'faiz', '096', '007', 'benyawak', 'bill angsaja', 'remark faiz', 'Y', '2021-02-08 10:50:41', NULL, NULL),
(7, '601fea5960e39', 'basri', '@basri', '0899', 'bnz kulon', 'basri', 'bas remark', 'Y', '2021-02-09 15:33:31', NULL, NULL);

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
(1, '601fea5960e39', 'ahmad@gmail.com'),
(2, '601fea7844905', 'afwan@roket.com'),
(3, '601feaa09fcd5', 'faizi@space.com'),
(4, '6020b4c8adb2a', 'ahmad@yahoo.com'),
(5, '6020b4ea151f0', 'afwan@gmail.com'),
(6, '6020b511045be', 'faiz@spaceX.com');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int NOT NULL,
  `item` varchar(225) NOT NULL,
  `category` enum('TOYS','BABY_WEAR','BICYCLE','OTHERS') NOT NULL,
  `remark` text NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `item`, `category`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a', 'OTHERS', 'coba others', 'Y', '2021-02-07 02:05:28', '2021-02-07 02:26:53', NULL),
(2, 's', 'TOYS', 'coba toys', 'Y', '2021-02-07 02:10:44', NULL, NULL),
(3, 'q', 'BABY_WEAR', 'coba baby wear', 'Y', '2021-02-07 02:14:11', NULL, '2021-02-07 02:27:11'),
(4, 'e', 'BICYCLE', 'coba bicycle', 'Y', '2021-02-07 02:19:32', '2021-02-07 02:27:08', NULL);

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `id_sample`, `quotation_no`, `id_customer`, `id_brand`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SMPL-H-601fefe9c068e', '111', '601fea5960e39', '3', '2021-02-07 20:49:29', '2021-02-07 23:48:40', NULL),
(3, 'SMPL-H-6020b5aa797f1', '1', '6020b4c8adb2a', '3', '2021-02-08 10:53:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sample_detail`
--

CREATE TABLE `sample_detail` (
  `id` int NOT NULL,
  `id_sample` varchar(225) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `sample_description` text NOT NULL,
  `quantity` int NOT NULL,
  `bapc_no` text NOT NULL,
  `date_received` date NOT NULL,
  `date_testing` date NOT NULL,
  `age_grading` text NOT NULL,
  `status_sample` enum('PENDING','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sample_detail`
--

INSERT INTO `sample_detail` (`id`, `id_sample`, `sample_code`, `sample_description`, `quantity`, `bapc_no`, `date_received`, `date_testing`, `age_grading`, `status_sample`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'SMPL-H-601fefe9c068e', 'RTL-SMPL-02/21/0002', 'sample', 12, 'bapc', '2021-02-01', '2021-02-07', '12', 'PROGRESS', '2021-02-07 21:19:31', NULL, NULL),
(6, 'SMPL-H-6020b5aa797f1', 'RTL-SMPL-02/21/0069', 'desc', 12, 'bapcist', '2021-02-01', '2021-02-08', 'grad', 'PROGRESS', '2021-02-08 10:53:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sni_iso`
--

CREATE TABLE `sni_iso` (
  `id` int NOT NULL,
  `iso` varchar(225) NOT NULL,
  `category` enum('INCLUDE','BABY_WEAR','BICYCLE','OTHERS','BASED','OTHER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sni_iso`
--

INSERT INTO `sni_iso` (`id`, `iso`, `category`) VALUES
(1, 'SNI ISO 8124-1 Safety of toys - part 1', 'INCLUDE'),
(2, 'SNI ISO 8124-2 Safety of toys - part 2', 'INCLUDE'),
(3, 'SNI ISO 8124-3 Safety of toys - Part 3', 'INCLUDE'),
(4, 'SNI ISO 8124-4 Safety of toys - Part 4', 'INCLUDE'),
(5, 'EN71-5 Safety of toys - Part 5', 'INCLUDE'),
(6, 'SNI 8580-3 ISO 8124-3 Safety of toys - Part 3', 'INCLUDE'),
(7, 'SNI IEC 62115:2011 Electric toys – Safety', 'INCLUDE'),
(8, 'SNI ISO 14184-1 Formaldehyde', 'INCLUDE'),
(9, 'SNI 6686 Textile', 'INCLUDE'),
(10, 'SNI 7334.1 Azo Dyes', 'INCLUDE'),
(11, 'CPSC-CH-C1001-09.04 Phthalates', 'INCLUDE'),
(12, 'SNI 8578 Phthalates', 'INCLUDE'),
(13, 'SNI 7334 Extractable Heavy Metals', 'BABY_WEAR'),
(14, 'SNI 7334.1 Azo Dyes', 'BABY_WEAR'),
(17, 'SNI ISO 14184-1 Formaldehyde', 'BABY_WEAR'),
(18, 'SNI 8224 Children bicycle', 'BICYCLE'),
(19, 'SNI 7334 Extractable Heavy Metals', 'OTHERS'),
(20, 'SNI ISO 14184-1 Formaldehyde', 'OTHERS'),
(21, 'SNI ISO 24362-1 Azo Dyes', 'OTHERS'),
(22, 'SNI ISO 24362-3 Azo Dyes', 'OTHERS'),
(23, 'SNI ISO 14389 Phthalates', 'OTHERS'),
(24, 'SNI 8360 PFOS/PFOA', 'OTHERS'),
(25, 'SNI ISO 17881-1 pentaBDE', 'OTHERS'),
(26, 'SNI ISO 8124-3 Migration', 'OTHERS'),
(27, 'ISO/TS 16181 Phthalates', 'OTHERS'),
(28, 'CPSC-CH-C1001-09.03 Phthalates', 'OTHERS'),
(29, 'NMAM-9002 Asbes', 'OTHERS'),
(30, 'EPA 600/R-93/116 Asbes', 'OTHERS'),
(31, 'JIS A 1481 Asbes', 'OTHERS'),
(32, 'Based on laboratory quotation no 0757', 'BASED'),
(33, 'Other', 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `submition`
--

CREATE TABLE `submition` (
  `id` int NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `id_term_of_service` varchar(10) NOT NULL,
  `item_no` varchar(225) NOT NULL,
  `iso_submition` varchar(225) NOT NULL,
  `sni_certification` enum('TRUE','FALSE') DEFAULT NULL,
  `do_not_show_pass` enum('TRUE','FALSE') DEFAULT NULL,
  `retain_sample` enum('TRUE','FALSE') DEFAULT NULL,
  `other_method` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `submition`
--

INSERT INTO `submition` (`id`, `sample_code`, `id_term_of_service`, `item_no`, `iso_submition`, `sni_certification`, `do_not_show_pass`, `retain_sample`, `other_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RTL-SMPL-02/21/0002', '1', 'ITEM77', 'ISO602141bb734bf', 'TRUE', NULL, NULL, 'coba other method 2', '2021-02-08 20:50:51', '2021-02-09 00:10:47', NULL),
(3, 'RTL-SMPL-02/21/0069', '1', '222', 'ISO602227c9225c1', 'TRUE', 'TRUE', 'TRUE', 'metode baru', '2021-02-09 13:12:25', NULL, NULL);

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
(34, 'ISO602141bb734bf', '1', '2021-02-09 00:09:48', NULL, '2021-02-09 00:10:47'),
(35, 'ISO602141bb734bf', '13', '2021-02-09 00:09:48', NULL, '2021-02-09 00:10:47'),
(36, 'ISO602141bb734bf', '19', '2021-02-09 00:09:48', NULL, '2021-02-09 00:09:57'),
(37, 'ISO602141bb734bf', '1', '2021-02-09 00:09:57', NULL, '2021-02-09 00:10:47'),
(38, 'ISO602141bb734bf', '2', '2021-02-09 00:09:57', NULL, '2021-02-09 00:10:47'),
(39, 'ISO602141bb734bf', '3', '2021-02-09 00:09:57', NULL, '2021-02-09 00:10:47'),
(40, 'ISO602141bb734bf', '1', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(41, 'ISO602141bb734bf', '2', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(42, 'ISO602141bb734bf', '3', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(43, 'ISO602141bb734bf', '13', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(44, 'ISO602141bb734bf', '20', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(45, 'ISO602141bb734bf', '21', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(46, 'ISO602141bb734bf', '22', '2021-02-09 00:10:30', NULL, '2021-02-09 00:10:47'),
(47, 'ISO602141bb734bf', '1', '2021-02-09 00:10:47', NULL, NULL),
(48, 'ISO602141bb734bf', '2', '2021-02-09 00:10:47', NULL, NULL),
(49, 'ISO602141bb734bf', '3', '2021-02-09 00:10:47', NULL, NULL),
(50, 'ISO602141bb734bf', '13', '2021-02-09 00:10:47', NULL, NULL),
(51, 'ISO602141bb734bf', '20', '2021-02-09 00:10:47', NULL, NULL),
(52, 'ISO602141bb734bf', '21', '2021-02-09 00:10:47', NULL, NULL),
(53, 'ISO602141bb734bf', '22', '2021-02-09 00:10:47', NULL, NULL),
(54, 'ISO602227c9225c1', '32', '2021-02-09 13:12:25', NULL, NULL),
(55, 'ISO602227c9225c1', '18', '2021-02-09 13:12:25', NULL, NULL),
(56, 'ISO602227c9225c1', '33', '2021-02-09 13:12:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_of_service`
--

CREATE TABLE `term_of_service` (
  `id` int NOT NULL,
  `category` enum('1','2') NOT NULL COMMENT '1.TOYS/ BABY WEAR/OTHERS 2.CHILDREN BICYCLE',
  `type` enum('REGULAR','EXPRESS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `term_of_service`
--

INSERT INTO `term_of_service` (`id`, `category`, `type`) VALUES
(1, '1', 'REGULAR'),
(2, '1', 'EXPRESS'),
(3, '2', 'REGULAR'),
(4, '2', 'EXPRESS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('A','B','C','ADMIN') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ahmad', '123', 'A', '2021-02-06 19:07:35', NULL),
(2, 'admin', 'admin', 'ADMIN', '2021-02-06 22:03:31', NULL);

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
-- Indexes for table `request`
--
ALTER TABLE `request`
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
-- Indexes for table `sni_iso`
--
ALTER TABLE `sni_iso`
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
-- Indexes for table `term_of_service`
--
ALTER TABLE `term_of_service`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sni_iso`
--
ALTER TABLE `sni_iso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `submition`
--
ALTER TABLE `submition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submition_detail`
--
ALTER TABLE `submition_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `term_of_service`
--
ALTER TABLE `term_of_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
