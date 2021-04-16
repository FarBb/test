-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2021 pada 14.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_soal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `opsi_jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `id_soal`, `opsi_jawaban`) VALUES
(1, 1, '1954'),
(2, 1, '1945'),
(3, 1, '1965'),
(4, 1, '1935'),
(5, 2, 'Surabaya'),
(6, 2, 'jayapura'),
(7, 2, 'Jakarta'),
(8, 2, 'Balikpapan'),
(9, 3, 'Soekarno'),
(10, 3, 'Soeharto'),
(11, 3, 'Habibi'),
(12, 3, 'Joko Widodo'),
(13, 4, 'Sosilo Bambang Yudhiono'),
(14, 4, 'Habibi'),
(15, 4, 'Megawati Soekarno Putri'),
(16, 4, 'Gusdur'),
(17, 5, 'I Love You'),
(18, 5, 'I Need You'),
(19, 5, 'I Want You'),
(20, 5, 'I Hate You');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_user`
--

CREATE TABLE `tb_jawaban_user` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jawab` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_score`
--

CREATE TABLE `tb_score` (
  `id_users` int(11) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `soal`, `jawaban`) VALUES
(1, 'Indonesia Merdeka Pada Tahun?', '1945'),
(2, 'Ibu Kota Indonesia Adalah?', 'Jakarta'),
(3, 'Presiden Pertama Indonesia?', 'Soekarno'),
(4, 'Presiden Indonesia Yang Ke 5 Adalah?', 'Sosilo Bambang Yudhiono'),
(5, 'Bahasa Inggrisnya \'Aku Cinta Kamu\'?', 'I Love You');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Mochammad Faris', 'faris', '$2y$10$nLV.eRjvnCBlC1lUJIpyse0tvX2V/DNi/FctCfcdIgCznZjEcJPjK'),
(2, 'Faris', 'admin', '$2y$10$nLV.eRjvnCBlC1lUJIpyse0tvX2V/DNi/FctCfcdIgCznZjEcJPjK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jawaban_user`
--
ALTER TABLE `tb_jawaban_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_score`
--
ALTER TABLE `tb_score`
  ADD UNIQUE KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_user`
--
ALTER TABLE `tb_jawaban_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
