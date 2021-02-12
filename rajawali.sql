-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2021 at 04:34 PM
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
) ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hotweels', 'remaek hotweels', 'Y', '2021-02-07 20:27:27', NULL, NULL),
(2, 'bear bare', 'remake bear', 'Y', '2021-02-07 20:27:47', NULL, NULL),
(3, 'mcd', 'remark mcd', 'Y', '2021-02-07 20:27:58', NULL, NULL),
(4, 'siomay', 'remark dong ah', 'Y', '2021-02-10 15:42:33', '2021-02-10 15:42:42', '2021-02-10 15:42:44'),
(5, 'coba ', 'yahaha hayulk', 'Y', '2021-02-10 15:43:44', '2021-02-10 15:43:55', '2021-02-10 15:43:58'),
(6, 'lagitek', 'mos', 'Y', '2021-02-10 15:44:47', NULL, NULL);

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
) ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `id_customer`, `customer_name`, `contact_person`, `phone_number`, `address`, `bill_to`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, '60239c09c668a', 'ahmad afwan faiz', '@ahmad', '085', 'bnz', 'ahmad lah', 'remark ahmad', 'Y', '2021-02-10 15:40:41', '2021-02-10 15:43:05', '2021-02-10 15:43:11'),
(9, '60239c2b3ca6e', 'afwan', '@afwan', '087', 'benyawakan', 'afwan lah', 'afwan remarkz', 'Y', '2021-02-10 15:41:15', '2021-02-10 15:42:04', NULL),
(10, '60239c528987b', 'faizi', '@fayzsky', '081', 'benyawakan jaya', 'faiz lah', 'remark faiz', 'Y', '2021-02-10 15:41:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `id_customer`, `email`) VALUES
(7, '60239c09c668a', 'ahmad@yahoo.com'),
(8, '60239c2b3ca6e', 'afwan@gmail.com'),
(9, '60239c528987b', 'faizi@space.com');

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
) ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `item`, `category`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'item holad', 'BICYCLE', 'tunggangan', 'Y', '2021-02-10 15:43:35', NULL, NULL);

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
) ;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `id_sample`, `quotation_no`, `id_customer`, `id_brand`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'SMPL-H-60239d076a562', '111', '60239c528987b', '6', '2021-02-10 15:44:55', NULL, NULL);

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
) ;

--
-- Dumping data for table `sample_detail`
--

INSERT INTO `sample_detail` (`id`, `id_sample`, `sample_code`, `sample_description`, `quantity`, `bapc_no`, `date_received`, `date_testing`, `age_grading`, `status_sample`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'SMPL-H-60239d076a562', 'RTL-SMPL-02/21/0001', 'deskripsi yah', 12, 'bapac kau', '2021-02-01', '2021-02-10', 'grading', 'PROGRESS', '2021-02-10 15:47:14', NULL, NULL),
(8, 'SMPL-H-60239d076a562', 'RTL-SMPL-02/21/0002', 'desc ke 2', 22, 'bapac ke dua', '2021-02-01', '2021-02-10', 'grading 2', 'PENDING', '2021-02-10 15:47:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sni_iso`
--

CREATE TABLE `sni_iso` (
  `id` int NOT NULL,
  `iso` varchar(225) NOT NULL,
  `category` enum('INCLUDE','BABY_WEAR','BICYCLE','OTHERS','BASED','OTHER') NOT NULL
) ;

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
  `sample_code` varchar(225)  NOT NULL,
  `id_term_of_service` varchar(10)  NOT NULL,
  `item_no` varchar(225)  NOT NULL,
  `iso_submition` varchar(225)  NOT NULL,
  `sni_certification` enum('TRUE','FALSE')  DEFAULT NULL,
  `do_not_show_pass` enum('TRUE','FALSE')  DEFAULT NULL,
  `retain_sample` enum('TRUE','FALSE')  DEFAULT NULL,
  `other_method` text ,
  `family_product` text ,
  `product_end_use` text ,
  `age_group` text ,
  `country` text ,
  `lab_subcont` text ,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ;

--
-- Dumping data for table `submition`
--

INSERT INTO `submition` (`id`, `sample_code`, `id_term_of_service`, `item_no`, `iso_submition`, `sni_certification`, `do_not_show_pass`, `retain_sample`, `other_method`, `family_product`, `product_end_use`, `age_group`, `country`, `lab_subcont`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'RTL-SMPL-02/21/0001', '1', '111', 'ISO60239ec894f02', 'TRUE', 'TRUE', 'TRUE', 'other', 'toyes', '1', '1', 'indo', 'subb', '2021-02-10 15:52:24', '2021-02-10 15:54:21', NULL);

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
) ;

--
-- Dumping data for table `submition_detail`
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
(80, 'ISO60239ec894f02', '33', '2021-02-10 15:54:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_of_service`
--

CREATE TABLE `term_of_service` (
  `id` int NOT NULL,
  `category` enum('1','2') NOT NULL COMMENT '1.TOYS/ BABY WEAR/OTHERS 2.CHILDREN BICYCLE',
  `type` enum('REGULAR','EXPRESS') NOT NULL
) ;

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
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'ADMIN', '2021-02-06 22:03:31', NULL),
(2, 'aa', '123', 'A', '2021-02-06 19:07:35', NULL),
(4, 'bb', '123', 'B', '2021-02-10 15:30:10', NULL),
(5, 'cc', '123', 'C', '2021-02-10 15:30:10', NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sni_iso`
--
ALTER TABLE `sni_iso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `submition`
--
ALTER TABLE `submition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submition_detail`
--
ALTER TABLE `submition_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `term_of_service`
--
ALTER TABLE `term_of_service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
