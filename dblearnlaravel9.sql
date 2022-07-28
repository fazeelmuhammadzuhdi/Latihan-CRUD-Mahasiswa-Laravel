-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 15.48
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblearnlaravel9`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mhsnim` char(7) NOT NULL,
  `mhsnama` varchar(100) NOT NULL,
  `mhstelp` char(15) NOT NULL,
  `mhsalamat` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`mhsnim`, `mhsnama`, `mhstelp`, `mhsalamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
('100', 'Udinnn', '0827527', 'Jl.Permataaaa', NULL, '2022-07-13 04:47:22', '2022-07-13 04:47:22'),
('1910021', 'Fazeel Muhammad Zuhdi', '08624264', 'Jl.Permata Harbaindo H13 No 12', NULL, NULL, NULL),
('25', 'sg', '63', 'aa', '2022-07-14 03:50:21', '2022-07-14 03:50:21', NULL),
('35', 'dfgds', 'sgsd', 'gsgds', '2022-07-13 03:26:20', '2022-07-13 03:42:59', NULL),
('52', 'gs', '252', 'sgasg', '2022-07-14 03:50:08', '2022-07-14 03:50:08', NULL),
('572', 'gha', '252', 'hsgas', '2022-07-14 03:49:42', '2022-07-14 03:49:42', NULL),
('621', 'ag', '261', 'agagag', '2022-07-14 03:49:51', '2022-07-14 03:49:51', NULL),
('623', 'ggaaeg', '242', 'sgssg', '2022-07-14 03:51:07', '2022-07-14 03:51:07', NULL),
('63', '236', '25', 'gq', '2022-07-14 03:50:31', '2022-07-14 03:50:31', NULL),
('6326', 'ga', '62623', 'asgagxz', '2022-07-14 03:51:16', '2022-07-14 03:51:16', NULL),
('852', 'aTUK', '295', 'SABFBSA', '2022-07-14 03:49:28', '2022-07-14 03:49:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mhsnim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
