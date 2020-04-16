-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2020 pada 18.12
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
  `status` enum('MASUK','ALPA','IZIN','KOSONG') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `nip`, `status`, `keterangan`, `dibuat`, `diubah`) VALUES
(45, '1', NULL, NULL, '2020-04-16 23:11:19', NULL);

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
(24, 'MARKETING', '2020-03-31 15:50:23', '2020-03-31 20:26:27', NULL),
(25, 'PAJAK', '2020-03-31 15:50:56', '2020-03-31 20:26:30', NULL),
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
  `jabatan` enum('PEGAWAI','SV','GM') NOT NULL,
  `id_divisi` varchar(30) DEFAULT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL,
  `dihapus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nip`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `email`, `nomor_telepon`, `jabatan`, `id_divisi`, `dibuat`, `diubah`, `dihapus`) VALUES
(27, '2', '2', 'fadil', 'L', 'ISLAM', 'tangerang', '2020-12-31', 'pakem              \r\n              ', 'barley@gamail.com', '078', 'SV', '24', '2020-04-16 20:14:48', NULL, NULL),
(28, '1', '1', 'root', 'L', 'ISLAM', 'tangerang', '2020-01-01', 'bnz', 'root@gmail.com', '098', 'GM', '28', '2020-04-16 20:19:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `role` enum('GM','SV') NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `password`, `gambar`, `role`, `dibuat`, `diubah`) VALUES
(3, '2', '31232020', 'default.jpg', 'SV', '2020-04-16 20:14:48', NULL),
(4, '1', '01012020', 'default.jpg', 'GM', '2020-04-16 20:21:42', NULL);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
