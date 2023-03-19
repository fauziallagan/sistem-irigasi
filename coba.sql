-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2023 pada 04.37
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensortes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE `coba` (
  `id` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `sensor_kelembaban` int(11) NOT NULL,
  `sensor_n` int(11) NOT NULL,
  `sensor_p` int(11) NOT NULL,
  `sensor_k` int(11) NOT NULL,
  `sensor_ph` int(11) NOT NULL,
  `timestamp` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `coba`
--

INSERT INTO `coba` (`id`, `nama`, `sensor_kelembaban`, `sensor_n`, `sensor_p`, `sensor_k`, `sensor_ph`, `timestamp`) VALUES
(1, 'Lora 0', 94, 74, 215, 126, 6, '22:41:25'),
(2, 'Lora 3', 5, 174, 150, 45, 3, '22:41:31'),
(3, 'Lora 2', 89, 68, 147, 253, 8, '22:41:37'),
(4, 'Lora 1', 6, 120, 212, 124, 0, '22:41:43'),
(5, 'Lora 3', 3, 213, 207, 11, 2, '22:41:49'),
(6, 'Lora 1', 51, 128, 171, 78, 1, '22:41:56'),
(7, 'Lora 1', 99, 89, 173, 187, 1, '22:42:02'),
(8, 'Lora 1', 26, 21, 70, 96, 0, '22:42:08'),
(9, 'Lora 1', 78, 77, 183, 91, 6, '22:42:14'),
(10, 'Lora 2', 55, 118, 40, 85, 4, '22:42:20'),
(11, 'Lora 1', 49, 196, 115, 117, 1, '22:42:27'),
(12, 'Lora 1', 55, 116, 243, 19, 0, '22:42:33'),
(13, 'Lora 2', 59, 203, 244, 11, 3, '22:42:39'),
(14, 'Lora 3', 37, 177, 48, 232, 0, '22:42:45'),
(15, 'Lora 2', 35, 252, 152, 194, 9, '22:42:52'),
(16, 'Lora 2', 79, 166, 221, 116, 4, '22:42:58'),
(17, 'Lora 1', 78, 174, 116, 145, 11, '22:43:04'),
(18, 'Lora 2', 74, 161, 231, 228, 10, '22:43:10'),
(19, 'Lora 1', 20, 196, 101, 168, 1, '22:43:16'),
(20, 'Lora 0', 28, 172, 98, 143, 8, '22:43:23'),
(21, 'Lora 3', 48, 171, 136, 124, 11, '22:43:29'),
(22, 'Lora 2', 64, 201, 202, 55, 10, '22:43:35'),
(23, 'Lora 1', 72, 114, 224, 108, 10, '22:43:41'),
(24, 'Lora 2', 24, 182, 37, 16, 6, '22:43:47'),
(25, 'Lora 0', 31, 40, 150, 8, 6, '22:43:54'),
(26, 'Lora 3', 86, 46, 26, 5, 2, '22:44:00'),
(27, 'Lora 0', 87, 243, 162, 82, 1, '22:44:06'),
(28, 'Lora 0', 35, 173, 185, 120, 11, '22:44:12'),
(29, 'Lora 3', 27, 49, 202, 19, 8, '22:44:18'),
(30, 'Lora 0', 66, 44, 42, 144, 2, '22:44:24'),
(31, 'Lora 2', 5, 104, 181, 60, 6, '22:44:31'),
(32, 'Lora 1', 54, 91, 80, 169, 1, '22:44:37'),
(33, 'Lora 2', 56, 42, 112, 19, 9, '22:44:44'),
(34, 'Lora 2', 11, 15, 1, 173, 0, '22:44:50'),
(35, 'Lora 2', 91, 143, 219, 82, 1, '22:44:56'),
(36, 'Lora 1', 24, 131, 195, 44, 3, '22:45:02'),
(37, 'Lora 2', 23, 114, 115, 200, 0, '22:45:09'),
(38, 'Lora 1', 41, 226, 219, 169, 9, '22:45:15'),
(39, 'Lora 1', 37, 122, 209, 35, 2, '22:45:21'),
(40, 'Lora 1', 87, 167, 20, 213, 10, '22:45:27'),
(41, 'Lora 1', 15, 138, 240, 245, 8, '22:45:33'),
(42, 'Lora 2', 54, 59, 236, 79, 11, '22:45:39'),
(43, 'Lora 1', 42, 31, 203, 1, 8, '22:45:46'),
(44, 'Lora 0', 37, 89, 136, 88, 11, '22:45:52'),
(45, 'Lora 0', 35, 215, 81, 71, 1, '22:45:58'),
(46, 'Lora 3', 26, 75, 243, 20, 3, '22:46:04'),
(47, 'Lora 0', 29, 241, 117, 153, 4, '22:46:10'),
(48, 'Lora 2', 78, 197, 197, 185, 10, '22:46:16'),
(49, 'Lora 2', 35, 232, 9, 162, 2, '22:46:23'),
(50, 'Lora 3', 8, 76, 251, 245, 3, '22:46:29'),
(51, 'Lora 1', 47, 122, 179, 48, 9, '22:46:35'),
(52, 'Lora 0', 23, 189, 108, 49, 8, '22:46:41'),
(53, 'Lora 3', 7, 77, 252, 214, 6, '22:46:47'),
(54, 'Lora 3', 38, 204, 156, 186, 9, '22:46:53'),
(55, 'Lora 3', 51, 34, 47, 219, 3, '22:47:00'),
(56, 'Lora 0', 47, 63, 63, 14, 11, '22:47:06'),
(57, 'Lora 3', 97, 225, 218, 105, 5, '22:47:12'),
(58, 'Lora 1', 80, 104, 191, 13, 5, '22:47:18'),
(59, 'Lora 2', 18, 141, 73, 216, 8, '22:47:24'),
(60, 'Lora 2', 77, 107, 178, 219, 7, '22:47:31'),
(61, 'Lora 1', 11, 10, 56, 217, 11, '22:47:37'),
(62, 'Lora 2', 26, 3, 120, 18, 7, '22:47:43'),
(63, 'Lora 1', 97, 114, 199, 44, 10, '22:47:49'),
(64, 'Lora 1', 13, 156, 92, 201, 11, '22:47:55'),
(65, 'Lora 3', 64, 241, 221, 14, 1, '22:48:02'),
(66, 'Lora 3', 75, 91, 18, 204, 1, '22:48:08'),
(67, 'Lora 1', 39, 104, 90, 64, 10, '22:48:14'),
(68, 'Lora 1', 42, 142, 243, 191, 8, '22:48:20'),
(69, 'Lora 2', 33, 127, 26, 60, 7, '22:48:26'),
(70, 'Lora 0', 28, 90, 234, 50, 10, '22:48:33'),
(71, 'Lora 1', 17, 212, 81, 175, 0, '22:48:39'),
(72, 'Lora 3', 34, 68, 186, 169, 7, '22:48:45'),
(73, 'Lora 2', 27, 19, 70, 53, 9, '22:48:51'),
(74, 'Lora 3', 70, 21, 216, 62, 6, '22:48:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `coba`
--
ALTER TABLE `coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;