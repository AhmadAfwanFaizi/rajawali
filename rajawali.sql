-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2021 pada 18.36
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

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id`, `brand`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hotweels', 'remaek hotweels', 'Y', '2021-02-07 20:27:27', NULL, NULL),
(2, 'bear bare', 'remake bear', 'Y', '2021-02-07 20:27:47', NULL, NULL),
(3, 'mcd', 'remark mcd', 'Y', '2021-02-07 20:27:58', NULL, NULL);

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
-- Kesalahan membaca data untuk tabel rajawali.customer: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `rajawali`.`customer`' at line 1

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
(1, '601fea5960e39', 'ahmad@gmail.com'),
(2, '601fea7844905', 'afwan@roket.com'),
(3, '601feaa09fcd5', 'faizi@space.com');

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

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id`, `item`, `category`, `remark`, `enable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a', 'OTHERS', 'coba others', 'Y', '2021-02-07 02:05:28', '2021-02-07 02:26:53', NULL),
(2, 's', 'TOYS', 'coba toys', 'Y', '2021-02-07 02:10:44', NULL, NULL),
(3, 'q', 'BABY_WEAR', 'coba baby wear', 'Y', '2021-02-07 02:14:11', NULL, '2021-02-07 02:27:11'),
(4, 'e', 'BICYCLE', 'coba bicycle', 'Y', '2021-02-07 02:19:32', '2021-02-07 02:27:08', NULL);

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

--
-- Dumping data untuk tabel `sample`
--

INSERT INTO `sample` (`id`, `id_sample`, `quotation_no`, `id_customer`, `id_brand`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SMPL-H-601fefe9c068e', '111', '601fea5960e39', '3', '2021-02-07 20:49:29', '2021-02-07 23:48:40', NULL);

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sample_detail`
--

INSERT INTO `sample_detail` (`id`, `id_sample`, `sample_code`, `sample_description`, `quantity`, `bapc_no`, `date_received`, `date_testing`, `age_grading`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'SMPL-H-601fefe9c068e', 'RTL-SMPL-02/21/0002', 'sample', 12, 'bapc', '2021-02-01', '2021-02-07', '12', '2021-02-07 21:19:31', NULL, NULL),
(4, 'SMPL-H-601fefe9c068e', 'SMPL-H-601fefe9c068e', 'sample 2', 13, 'percobaan update 2', '2021-02-01', '2021-02-07', '12', '2021-02-07 23:40:21', '2021-02-08 00:08:02', NULL),
(5, 'SMPL-H-601fefe9c068e', 'SMPL-H-601fefe9c068e', 'sample perubahan', 12, 'bapc', '2021-02-01', '2021-02-07', '12', '2021-02-08 00:05:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('A','B','C','ADMIN') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ahmad', '123', 'A', '2021-02-06 19:07:35', NULL),
(2, 'admin', 'admin', 'ADMIN', '2021-02-06 22:03:31', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sample_detail`
--
ALTER TABLE `sample_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
