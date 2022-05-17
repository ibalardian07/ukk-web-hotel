-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2022 pada 16.25
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `id_kamar`, `nama_fasilitas`) VALUES
(1, 1, 'Kamar berukuran luas 32 m2'),
(2, 1, 'Kamar mandi shower'),
(3, 1, 'Coffe maker'),
(4, 1, 'AC'),
(5, 1, 'LED TV 32 inch'),
(6, 2, 'Kamar berukuran luas 46 m2'),
(7, 2, 'Kamar mandi shower dan Bath Tub'),
(8, 2, 'Coffe maker'),
(9, 2, 'Sofa'),
(10, 2, 'AC'),
(11, 2, 'LED TV 40 unch'),
(12, 2, 'Netflix Private'),
(13, 1, 'Netflix Sharing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fasilitas_hotel`
--

CREATE TABLE `tb_fasilitas_hotel` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(25) NOT NULL,
  `stok_kamar` int(6) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `tipe_kamar`, `stok_kamar`, `foto_kamar`) VALUES
(1, 'Superior', 50, 'IMG_UKK_HOTEL2022-02-241242610836.jpg'),
(2, 'Deluxe', 50, 'IMG_UKK_HOTEL2022-02-24405044546.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tgl_cekin` date NOT NULL,
  `tgl_cekout` date NOT NULL,
  `jumlah_kamar` varchar(6) NOT NULL,
  `nama_pemesan` char(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `nomor_ponsel` varchar(13) NOT NULL,
  `nama_tamu` char(35) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `status` enum('booking','check-in','check-out') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` char(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `email` varchar(35) NOT NULL,
  `nomor_ponsel` varchar(13) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `pin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'resepsionis', '$2y$10$CtTqRqloEZj1ixwL.doS3uKuUbTvZMCgUzsyeImJeNqJY04BTKXfy', 'Resepsionis', 'resepsionis'),
(2, 'admin', '$2y$10$CtTqRqloEZj1ixwL.doS3uKuUbTvZMCgUzsyeImJeNqJY04BTKXfy', 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_tipekamar` (`id_kamar`);

--
-- Indeks untuk tabel `tb_fasilitas_hotel`
--
ALTER TABLE `tb_fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_penguna` (`id_pengguna`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_fasilitas_hotel`
--
ALTER TABLE `tb_fasilitas_hotel`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97529;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
