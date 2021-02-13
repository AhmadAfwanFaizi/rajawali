-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2021 pada 15.56
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
  `remark` text NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `customer_name` varchar(225) NOT NULL,
  `contact_person` varchar(225) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `bill_to` text NOT NULL,
  `remark` text NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `item` varchar(225) NOT NULL,
  `category` enum('TOYS','BABY_WEAR','BICYCLE','OTHERS') NOT NULL,
  `remark` text NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sample_detail`
--

CREATE TABLE `sample_detail` (
  `id` int(11) NOT NULL,
  `id_sample` varchar(225) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `sample_description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `bapc_no` text NOT NULL,
  `date_received` date NOT NULL,
  `date_testing` date NOT NULL,
  `age_grading` text NOT NULL,
  `status_sample` enum('PENDING','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sni_iso`
--

CREATE TABLE `sni_iso` (
  `id` int(11) NOT NULL,
  `iso` varchar(225) NOT NULL,
  `category` enum('INCLUDE','BABY_WEAR','BICYCLE','OTHERS','BASED','OTHER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sni_iso`
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
-- Struktur dari tabel `submition`
--

CREATE TABLE `submition` (
  `id` int(11) NOT NULL,
  `sample_code` varchar(225) NOT NULL,
  `id_term_of_service` varchar(10) NOT NULL,
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
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(80, 'ISO60239ec894f02', '33', '2021-02-10 15:54:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `term_of_service`
--

CREATE TABLE `term_of_service` (
  `id` int(11) NOT NULL,
  `category` enum('1','2') NOT NULL COMMENT '1.TOYS/ BABY WEAR/OTHERS 2.CHILDREN BICYCLE',
  `type` enum('REGULAR','EXPRESS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `term_of_service`
--

INSERT INTO `term_of_service` (`id`, `category`, `type`) VALUES
(1, '1', 'REGULAR'),
(2, '1', 'EXPRESS'),
(3, '2', 'REGULAR'),
(4, '2', 'EXPRESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('A','B','C','ADMIN') NOT NULL,
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
(1, 'admin', 'admin', 'ADMIN', 'user_default.png', 'Y', '2021-02-06 22:03:31', NULL, NULL),
(2, 'aa', '123', 'A', 'user_default.png', 'Y', '2021-02-06 19:07:35', NULL, NULL),
(4, 'bb', '123', 'B', 'user_default.png', 'Y', '2021-02-10 15:30:10', NULL, NULL),
(5, 'cc', '123', 'C', 'user_default.png', 'Y', '2021-02-10 15:30:10', NULL, NULL);

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
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
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
-- Indeks untuk tabel `sni_iso`
--
ALTER TABLE `sni_iso`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sni_iso`
--
ALTER TABLE `sni_iso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `submition`
--
ALTER TABLE `submition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `submition_detail`
--
ALTER TABLE `submition_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `term_of_service`
--
ALTER TABLE `term_of_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
