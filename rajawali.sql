-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2021 pada 18.42
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
(5, 'Uniqlo', 'asdsad', 'Y', '2021-02-26 14:46:33', '1', NULL, NULL, NULL),
(6, 'brandon', 'brnd', 'Y', '2021-02-27 18:21:31', '1', NULL, NULL, NULL);

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
(6, '6038a60a4efab', 'Ahmad', '08564545', '08565435', 'Tangerang', 'asdasdsa', 'adsad', 'Y', '2021-02-26 14:40:58', '1', NULL, NULL, NULL),
(7, '604503db7c05b', 'anwan', '021', '021', 'bnz', 'afanw21', 'remark', 'N', '2021-03-07 23:48:27', '1', '2021-03-07 23:48:51', '1', NULL);

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
(6, '6038a60a4efab', 'ahmad@gmail.com'),
(7, '604503db7c05b', 'afwan@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iso`
--

CREATE TABLE `iso` (
  `id` int(11) NOT NULL,
  `iso` varchar(225) NOT NULL,
  `category` enum('INCLUDE','BABY_WEAR','BICYCLE','OTHERS','BASED','OTHER') DEFAULT NULL COMMENT '''INCLUDE'',''BABY_WEAR'',''BICYCLE'',''OTHERS'',''BASED'',''OTHER''',
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
(39, 'SNI Certification Part 1', 'INCLUDE', 'Y', '2021-02-26 14:46:56', '1', NULL, NULL, NULL),
(40, 'Baby Wear', 'BABY_WEAR', 'Y', '2021-02-26 14:47:06', '1', NULL, NULL, NULL),
(41, 'Bicycle', 'BICYCLE', 'Y', '2021-02-26 14:47:16', '1', NULL, NULL, NULL),
(42, 'Others', 'OTHERS', 'N', '2021-02-26 14:47:25', '1', '2021-03-07 23:37:15', '1', NULL),
(44, 'Based on laboratory quotation no 0757', 'BASED', 'N', '2021-03-08 00:34:31', '1', '2021-03-08 00:37:17', '1', NULL);

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
(1, 'USR60313b6f580e4', 'Y', 'Y', 'Y', '2021-02-20 23:40:15', '2021-03-07 23:47:29'),
(2, 'USR603611bc1f335', 'N', 'N', 'N', '2021-02-24 15:43:40', '2021-03-07 02:04:29');
(2, '1', 'Y', 'Y', 'Y', NULL, NULL);

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
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sample`
--

INSERT INTO `sample` (`id`, `id_sample`, `quotation_no`, `id_customer`, `id_brand`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(10, 'SMPL-H-6038c35bcfbda', '1234', '6038a60a4efab', '5', 'Y', '2021-02-26 16:46:03', '1', NULL, NULL, NULL),
(11, 'SMPL-H-603a2b49d04cb', '222', '6038a60a4efab', '6', 'Y', '2021-02-27 18:21:45', '1', NULL, NULL, NULL),
(12, 'SMPL-H-6043cc37832fe', '333', '6038a60a4efab', '6', 'N', '2021-03-07 01:38:47', '1', '2021-03-07 23:35:14', '1', NULL),
(13, 'SMPL-H-60450117af189', '555', '6038a60a4efab', '5', 'N', '2021-03-07 23:36:39', '1', '2021-03-07 23:36:49', '1', NULL);

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
  `remark` text DEFAULT NULL,
  `enable` enum('Y','N') NOT NULL,
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

INSERT INTO `sample_detail` (`id`, `id_sample`, `sample_code`, `sample_description`, `quantity`, `bapc_no`, `date_received`, `date_testing`, `age_grading`, `remark`, `enable`, `status_sample`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(10, 'SMPL-H-6038c35bcfbda', 'RTL-SMPL-02/21/0001', 'Edt', 12, 'adasd', '2021-02-26', '2021-02-27', '1', 'Edit', 'Y', 'PROGRESS', '2021-02-26 16:46:26', '1', '2021-02-26 16:46:54', '1', NULL),
(11, 'SMPL-H-603a2b49d04cb', 'RTL-SMPL-02/21/0002', 'desc', 123, 'bapc', '2021-02-01', '2021-02-27', '123', 'remark', 'N', 'PROGRESS', '2021-02-27 18:22:15', '1', '2021-03-08 00:21:01', '1', NULL),
(12, 'SMPL-H-60450117af189', 'RTL-SMPL-03/21/0003', 'sample', 512, 'bapc 512', '2021-03-01', '2021-03-07', '5', 'remark update', 'N', 'PROGRESS', '2021-03-07 23:43:01', '1', '2021-03-08 00:07:14', '1', NULL),
(13, 'SMPL-H-6038c35bcfbda', 'RTL-SMPL-03/21/0004', 'sampl', 123, 'bapc123', '2021-03-01', '2021-03-08', '2022', 'rmek', 'Y', 'PENDING', '2021-03-08 00:22:12', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submition`
--

CREATE TABLE `submition` (
  `id` int(11) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `id_term_of_service_detail` varchar(10) NOT NULL,
  `item_no` varchar(225) DEFAULT NULL,
  `iso_submition` varchar(225) DEFAULT NULL,
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

INSERT INTO `submition` (`id`, `sample_code`, `id_term_of_service_detail`, `item_no`, `iso_submition`, `sni_certification`, `do_not_show_pass`, `retain_sample`, `other_method`, `family_product`, `product_end_use`, `age_group`, `country`, `lab_subcont`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(10, 'RTL-SMPL-02/21/0001', '2', 'item no', 'ISO603a29b876b85', 'TRUE', 'TRUE', 'TRUE', 'other sample', 'family proudk', '12', '12', '12', '12', '2021-02-27 18:15:04', '1', '2021-02-27 18:20:41', '1', NULL),
(11, 'RTL-SMPL-02/21/0002', '2', '2', 'ISO603a2b9847237', 'TRUE', 'TRUE', 'TRUE', '2', 'produk brnadon', '2', '2', '2', '2', '2021-02-27 18:23:04', '1', '2021-02-27 18:23:33', '1', NULL),
(12, 'RTL-SMPL-03/21/0003', '4', '2', 'ISO60450ac914254', 'TRUE', 'TRUE', 'TRUE', 'opth', '123', '2022', '3', 'idn', 'rjwl', '2021-03-08 00:18:01', '1', NULL, NULL, NULL);

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
(267, 'ISO60450ac914254', '41', '2021-03-08 00:18:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `term_of_service`
--

CREATE TABLE `term_of_service` (
  `id` int(11) NOT NULL,
  `category` varchar(225) NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `term_of_service`
--

INSERT INTO `term_of_service` (`id`, `category`, `enable`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'TOYS/ BABY WEAR/OTHERS ', 'Y', '2021-03-06 18:50:56', 1, '2021-03-06 20:01:14', 1),
(2, 'CHILDREN BICYCLE UPDATE', 'Y', '2021-03-06 19:49:09', 1, '2021-03-06 22:23:14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `term_of_service_detail`
--

CREATE TABLE `term_of_service_detail` (
  `id` int(11) NOT NULL,
  `id_term_of_service` int(11) NOT NULL,
  `type` enum('REGULAR','EXPRESS') NOT NULL,
  `information` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `term_of_service_detail`
--

INSERT INTO `term_of_service_detail` (`id`, `id_term_of_service`, `type`, `information`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'REGULAR', '(8 working days)', '2021-03-07 01:20:50', 1, NULL, NULL),
(2, 2, 'REGULAR', '(15 working days)', '2021-03-07 01:21:46', 1, NULL, NULL),
(3, 1, 'EXPRESS', '(3 working days)\r\n(40% surcharge)', '2021-03-07 01:22:44', 1, NULL, NULL),
(4, 2, 'EXPRESS', '(7 working days)\r\n(40% surcharge)', '2021-03-07 01:22:57', 1, NULL, NULL);

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
('USR60313b6f580e4', 'ahmad', '123', 'USER', 'user_default.png', 'Y', '2021-02-20 23:40:15', '2021-03-07 23:47:29', NULL),
('USR603611bc1f335', 'coba', '123', 'USER', 'USR6043d23d0f400.jpg', 'Y', '2021-02-24 15:43:40', '2021-03-07 02:04:29', NULL);

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
-- Indeks untuk tabel `term_of_service`
--
ALTER TABLE `term_of_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `term_of_service_detail`
--
ALTER TABLE `term_of_service_detail`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `iso`
--
ALTER TABLE `iso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `privilege_user`
--
ALTER TABLE `privilege_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `submition`
--
ALTER TABLE `submition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `submition_detail`
--
ALTER TABLE `submition_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT untuk tabel `term_of_service`
--
ALTER TABLE `term_of_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `term_of_service_detail`
--
ALTER TABLE `term_of_service_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
