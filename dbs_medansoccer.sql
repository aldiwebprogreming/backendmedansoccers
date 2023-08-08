-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 11:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_medansoccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(15) NOT NULL,
  `jam_booking` varchar(15) NOT NULL,
  `jam_mulai` varchar(15) NOT NULL,
  `jam_selesai` varchar(15) NOT NULL,
  `tgl` varchar(13) NOT NULL,
  `team` varchar(50) NOT NULL,
  `lapangan` varchar(50) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `kode_booking`, `jam_booking`, `jam_mulai`, `jam_selesai`, `tgl`, `team`, `lapangan`, `id_lapangan`, `status`, `date`) VALUES
(19, 'bk-729', '10.00 - 12.00', '10', '12', '2023-08-08', 'Melayu Fc', 'Lapangan Sintetis C', 4, 'Selesai', '2023-08-08 08:48:53'),
(20, 'bk-58', '12.00 - 14.00', '12', '14', '2023-08-08', 'Galean FC', 'Lapangan Sintetis A', 1, 'Selesai', '2023-08-08 08:50:36'),
(21, 'bk-257', '16.00 - 18.00', '16', '18', '2023-08-08', 'Supere Team', 'Lapangan Sintetis C', 4, 'Menunggu', '2023-08-08 08:51:12'),
(22, 'bk-169', '10.00 - 12.00', '10', '12', '2023-08-08', 'Medan timur Fc', 'Lapangan Sintetis A', 1, 'menunggu', '2023-08-08 08:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lapangan`
--

CREATE TABLE `tbl_lapangan` (
  `id` int(11) NOT NULL,
  `lapangan` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `pasilitas` text NOT NULL,
  `harga_perjam` varchar(30) NOT NULL,
  `status_booking` varchar(15) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lapangan`
--

INSERT INTO `tbl_lapangan` (`id`, `lapangan`, `slug`, `pasilitas`, `harga_perjam`, `status_booking`, `gambar`, `date`) VALUES
(1, 'Lapangan Sintetis A', 'lapangan-sintetis-a', 'Lapangan Sintetis A mempunyai fasilitas tribun penontom, ruang ganti, toilet dan cafe', '300000', '0', 'https://cdn-2.tstatic.net/banjarmasin/foto/bank/images/pertandingan-di-lapangan-upik-mini-soccer-2-banjarmasin-provinsi-kalsel-senin-30112020-33.jpg', '2023-08-08 08:41:59'),
(2, 'Lapangan Sintetis B', 'lapangan-sintetis-b', 'Lapangan Sintetis B mempunyai fasilitas tribun penontom, ruang ganti, toilet dan cafe', '300000', '0', 'https://www.karpetbadminton.id/wp-content/uploads/2021/01/204.-biaya-pembuatan-lapangan-mini-soccer.jpg', '2023-08-08 08:49:43'),
(4, 'Lapangan Sintetis C', 'lapangan-sintetis-c', 'Lapangan Sintetis C mempunyai fasilitas tribun penontom, ruang ganti, toilet dan cafe', '300000', '0', 'https://koran-jakarta.com/images/article/lapangan-mini-soccer-pertama-dan-satu-satunya-yang-berkonsep-rooftop-di-jabodetabek-raya-221128104407-4.jpg', '2023-08-08 08:49:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
