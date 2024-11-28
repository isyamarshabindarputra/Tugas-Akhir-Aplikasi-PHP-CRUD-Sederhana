-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2024 pada 05.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_invation`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `acara_id` int(11) NOT NULL,
  `nama_acara` varchar(100) NOT NULL,
  `tgl_acara` date NOT NULL,
  `lokasi_acara` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`acara_id`, `nama_acara`, `tgl_acara`, `lokasi_acara`, `deskripsi`) VALUES
(1, 'gotongroyong', '0000-00-00', 'lapangan', 'bersih-bersih'),
(2, 'kerkom-web', '0000-00-00', 'rmh-farras', 'buat-websejarah'),
(3, 'kerkom-web', '0000-00-00', 'rmh-farras', 'buat-websejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `tamu_id` int(11) NOT NULL,
  `namaTamu` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_kehadiran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`tamu_id`, `namaTamu`, `email`, `status_kehadiran`) VALUES
(1, 'farras', 'farras@gmail', 'hadir'),
(2, 'yuri', 'yuri@gmail', 'hadir'),
(3, 'pasha', 'pasha@gmail', 'ragu-ragu'),
(4, 'mosir', 'mosir@gmail', 'tidak-hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu2`
--

CREATE TABLE `tamu2` (
  `tamu_id` int(11) NOT NULL,
  `namaTamu` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_kehadiran` enum('hadir','tidak_hadir','ragu-ragu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`acara_id`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`tamu_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tamu2`
--
ALTER TABLE `tamu2`
  ADD PRIMARY KEY (`tamu_id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
