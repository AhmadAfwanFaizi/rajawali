-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2020 pada 18.13
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
-- Database: `db_absensi_pro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `status` enum('MASUK','KELUAR','ALPA','IZIN','KOSONG') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `nip`, `status`, `keterangan`, `dibuat`, `diubah`) VALUES
(44, '2005001', 'MASUK', '-', '2020-05-14 22:39:00', NULL),
(46, '2005001', 'KELUAR', '-', '2020-05-14 22:50:54', NULL),
(47, '2005001', 'MASUK', '-', '2020-05-15 22:42:00', NULL),
(48, '2005001', 'KELUAR', '-', '2020-05-15 22:48:18', NULL),
(49, '2005002', 'MASUK', '-', '2020-05-14 22:56:47', NULL),
(50, '2005002', 'KELUAR', '-', '2020-05-14 23:02:09', NULL),
(51, '2005002', 'MASUK', '-', '2020-05-15 23:08:15', NULL),
(52, '2005002', 'KELUAR', '-', '2020-05-15 23:08:35', NULL),
(53, '2005002', 'KELUAR', '-', '2020-05-15 23:08:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`, `dibuat`, `diubah`, `dihapus`) VALUES
(24, 'MARKETING', '2020-03-31 15:50:23', '2020-04-13 14:52:21', NULL),
(25, 'PAJAK', '2020-03-31 15:50:56', '2020-04-13 14:53:01', NULL),
(28, 'IT', '2020-04-03 14:13:33', '2020-04-03 14:43:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
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
  `gambar` varchar(100) NOT NULL DEFAULT 'Default.jpg',
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nip`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `email`, `nomor_telepon`, `jabatan`, `id_divisi`, `gambar`, `dibuat`, `diubah`, `dihapus`) VALUES
(25, '1234', '1234', 'faiz', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'bnz', 'faiz@gmail.com', '08557999800', 'HRD', '1', 'Default.jpg', '2020-05-09 20:02:16', NULL, NULL),
(27, '111', '2005001', 'yazyd', 'L', 'ISLAM', 'tangerang', '2000-03-02', 'spakem', 'yazid@gmail.com', '14045', 'KETUA_DIVISI', '24', 'Default.jpg', '2020-05-09 20:18:18', '2020-05-10 04:39:55', NULL),
(28, '123', '2005002', 'basri', 'L', 'ISLAM', 'tangerang', '2000-02-01', 'bnz', 'barley@gamail.com', '078', 'PEGAWAI', '24', 'Default.jpg', '2020-05-15 19:30:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('GM','SV') NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Kesalahan membaca data untuk tabel db_absensi_pro.tb_user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_absensi_pro`.`tb_user`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
