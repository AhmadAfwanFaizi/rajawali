-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2020 at 04:46 PM
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
  `nomor_karyawan` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `status` enum('MASUK','ALPHA','IZIN') NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`, `dibuat`, `diubah`) VALUES
(23, 'IT', '2020-03-31 15:49:50', '2020-03-31 15:54:45'),
(24, 'MARKETING', '2020-03-31 15:50:23', '2020-03-31 20:26:27'),
(25, 'PAJAK', '2020-03-31 15:50:56', '2020-03-31 20:26:30');

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
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nip`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `email`, `nomor_telepon`, `jabatan`, `id_divisi`, `dibuat`, `diubah`, `dihapus`) VALUES
(1, '360', '270', 'yazid', 'L', 'ISLAM', 'tangerang', '1998-23-11', 'rajwg', 'yazid@gmail.com', '021', 'PEGAWAI', '25', '2020-03-31 18:41:46', NULL, NULL),
(2, 'nik', 'nip', 'nama', 'P', 'ISLAM', 'tempatLahir', 'tanggalLah', 'alamat', 'email', 'nomorTelepon', '', '24', '2020-03-31 22:22:39', NULL, '2020-04-01 14:46:07'),
(3, 'nik', 'nip', 'nama', 'P', 'ISLAM', 'tempatLahir', 'tanggalLah', 'alamat', 'email', 'nomorTelepon', '', '24', '2020-03-31 22:22:45', NULL, NULL),
(4, '111', '111', 'ali', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'bnz              \r\n              ', 'faiz@gmial.com', '098', 'KETUA_DIVISI', '23', '2020-03-31 22:29:02', NULL, NULL),
(5, '222', '222', 'faiz', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'banze              \r\n              ', 'ahmadafwanfaizi@gmail.com', '078', 'KETUA_DIVISI', '23', '2020-03-31 22:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nomor_karyawan` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
