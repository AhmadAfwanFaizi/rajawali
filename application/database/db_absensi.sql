-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2020 pada 19.20
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
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `nomor_karyawan` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `status` enum('MASUK','ALPHA','IZIN') NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_divisi`
--

INSERT INTO `tb_divisi` (`id`, `nama_divisi`, `dibuat`, `diubah`) VALUES
(23, 'IT', '2020-03-31 15:49:50', '2020-03-31 15:54:45'),
(24, 'MARKETING', '2020-03-31 15:50:23', '2020-03-31 20:26:27'),
(25, 'PAJAK', '2020-03-31 15:50:56', '2020-03-31 20:26:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL,
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
  `divisi` varchar(30) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nik`, `nip`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `email`, `nomor_telepon`, `jabatan`, `divisi`, `dibuat`, `diubah`, `dihapus`) VALUES
(1, '360', '270', 'yazid', 'L', 'ISLAM', 'tangerang', '1998-23-11', 'rajwg', 'yazid@gmail.com', '021', 'PEGAWAI', 'DAPUR', '2020-03-31 18:41:46', NULL, '2020-03-31 22:42:19'),
(2, 'nik', 'nip', 'nama', '', '', 'tempatLahir', 'tanggalLah', 'alamat', 'email', 'nomorTelepon', '', 'divisi', '2020-03-31 22:22:39', NULL, '2020-03-31 22:50:45'),
(3, 'nik', 'nip', 'nama', '', '', 'tempatLahir', 'tanggalLah', 'alamat', 'email', 'nomorTelepon', '', 'divisi', '2020-03-31 22:22:45', NULL, NULL),
(4, '111', '111', 'ali', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'bnz              \r\n              ', 'faiz@gmial.com', '098', 'KETUA_DIVISI', 'IT', '2020-03-31 22:29:02', NULL, NULL),
(5, '222', '222', 'faiz', 'L', 'ISLAM', 'tangerang', '1997-11-23', 'banze              \r\n              ', 'ahmadafwanfaizi@gmail.com', '078', 'KETUA_DIVISI', 'IT', '2020-03-31 22:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nomor_karyawan` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
