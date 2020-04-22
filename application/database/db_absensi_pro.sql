-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2020 at 03:52 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.1.32-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `status` enum('MASUK','ALPA','IZIN','KOSONG') DEFAULT NULL,
  `keterangan` text,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `nip`, `status`, `keterangan`, `dibuat`, `diubah`) VALUES
(12, '111', 'MASUK', NULL, '2020-04-13 15:15:59', NULL),
(13, '222', 'MASUK', NULL, '2020-04-13 15:19:00', NULL),
(14, '333', 'MASUK', NULL, '2020-04-13 15:19:09', NULL),
(15, '111', 'MASUK', NULL, '2020-04-16 14:07:34', NULL),
(16, '222', 'MASUK', NULL, '2020-04-16 14:07:47', NULL),
(17, '333', 'MASUK', NULL, '2020-04-16 14:07:50', NULL),
(18, '444', 'MASUK', NULL, '2020-04-16 14:29:55', NULL),
(19, '111', 'MASUK', NULL, '2020-04-22 10:20:58', NULL),
(20, '222', 'MASUK', NULL, '2020-04-22 10:21:01', NULL),
(21, '333', 'MASUK', NULL, '2020-04-22 10:21:04', NULL),
(22, '444', 'MASUK', NULL, '2020-04-22 10:21:07', NULL),
(23, '666', NULL, NULL, '2020-04-22 10:56:59', NULL),
(25, '234', NULL, NULL, '2020-04-22 10:59:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`, `dibuat`, `diubah`, `dihapus`) VALUES
(24, 'MARKETING', '2020-03-31 15:50:23', '2020-04-13 14:52:21', NULL),
(25, 'PAJAK', '2020-03-31 15:50:56', '2020-04-13 14:53:01', NULL),
(28, 'IT', '2020-04-03 14:13:33', '2020-04-03 14:43:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('ISLAM','KSTOLIK','PROTESTAN','BUDHA','KONGHUCU','LAIN-LAIN') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `jabatan` enum('PEGAWAI','KETUA_DIVISI','HRD') NOT NULL,
  `id_divisi` varchar(30) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nip`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `email`, `nomor_telepon`, `jabatan`, `id_divisi`, `gambar`, `dibuat`, `diubah`, `dihapus`) VALUES
(2, '123', '234', 'kadrun', 'L', 'ISLAM', 'tangerang', '2020-04-03', 'alamat', 'email@gm.com', '098', 'PEGAWAI', '24', '', '2020-03-31 22:22:39', '2020-04-03 14:23:24', '2020-04-06 00:00:00'),
(3, '333', '333', 'aisyah wanita solekah', 'P', 'ISLAM', 'borneo', '2020-04-03', 'alamat', 'email@gm.com', 'nomorTelepon', 'PEGAWAI', '24', '', '2020-03-31 22:22:45', '2020-04-06 16:28:56', NULL),
(4, '111', '111', 'ali', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'bnz              \r\n              ', 'faiz@gmial.com', '098', 'KETUA_DIVISI', '25', '', '2020-03-31 22:29:02', NULL, NULL),
(5, '222', '222', 'faiz', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'banze              \r\n              ', 'ahmadafwanfaizi@gmail.com', '078', 'KETUA_DIVISI', '25', '', '2020-03-31 22:30:00', NULL, NULL),
(6, 'aa', 'aa', 'aauu', 'L', 'ISLAM', 'asd', '2020-04-03', 'aa              \r\n              ', 'email@gm.com', '098', 'PEGAWAI', '25', '', '2020-04-02 08:29:05', '2020-04-02 09:17:45', NULL),
(12, '360', '1234', 'yazid', 'L', 'ISLAM', 'tangerang', '1998-23-11', 'rajwg', 'yazid@gmail.com', '021', 'PEGAWAI', '26', '', '2020-03-31 18:41:46', NULL, NULL),
(13, '444', '444', 'olay', 'L', 'ISLAM', 'tangerang', '2020-04-01', '              \r\n              bnz', 'olay@gamil.com', '09889', 'PEGAWAI', '28', '', '2020-04-03 16:14:31', NULL, NULL),
(14, '666', '666', 'muhaAnjir', 'L', 'ISLAM', 'tangerang raya', '2020-12-31', 'bnz raya', 'muhajir@gmail.com', '098', 'PEGAWAI', '24', '', '2020-04-16 13:55:40', '2020-04-16 14:05:36', NULL),
(15, '777', '777', 'alung', 'L', 'ISLAM', 'tangerang', '2020-12-31', 'bnz              \r\n              ', 'alung@gmail.com', '078', 'PEGAWAI', '24', '', '2020-04-16 13:57:48', NULL, '2020-04-16 13:58:35'),
(16, '888', '888', 'basri', 'L', 'ISLAM', 'tangerang', '2020-12-31', 'ireng', 'barley@gamail.com', '078', 'PEGAWAI', '24', '', '2020-04-22 15:45:02', NULL, NULL),
(17, '999', '999', 'muhajir', 'L', 'ISLAM', 'tangerang', '2020-12-31', 'asfd', 'barley@gamail.com', '078', 'PEGAWAI', '24', 'Default.jpg', '2020-04-22 15:47:17', NULL, NULL),
(18, '1010', '1010', 'jelani', 'L', 'ISLAM', 'tangerang', '2019-12-31', 'bnz\r\n              ', 'jelani@mgail.com', '078', 'PEGAWAI', '24', '1010.jpg', '2020-04-22 15:50:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('GM','SV') NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `password`, `role`, `dibuat`, `diubah`) VALUES
(1, '1234', '1234', 'GM', '2020-04-13 15:46:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
