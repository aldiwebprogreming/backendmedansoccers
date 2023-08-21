-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 11:17 AM
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
  `status_pembayaran` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `kode_booking`, `jam_booking`, `jam_mulai`, `jam_selesai`, `tgl`, `team`, `lapangan`, `id_lapangan`, `status`, `status_pembayaran`, `date`) VALUES
(44, 'bk-516', '10.00 - 12.00', '10', '12', '2023-08-21', 'ererere', 'Lapangan Sintetis C', 4, 'Mulai', '200', '2023-08-21 03:00:58');

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
(4, 'Lapangan Sintetis C', 'lapangan-sintetis-c', 'Lapangan Sintetis C mempunyai fasilitas tribun penontom, ruang ganti, toilet dan cafe', '350000', '0', 'https://koran-jakarta.com/images/article/lapangan-mini-soccer-pertama-dan-satu-satunya-yang-berkonsep-rooftop-di-jabodetabek-raya-221128104407-4.jpg', '2023-08-09 06:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main`
--

CREATE TABLE `tbl_main` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tgl_main` varchar(30) NOT NULL,
  `jam_main` varchar(30) NOT NULL,
  `team` varchar(50) NOT NULL,
  `status_main` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_main`
--

INSERT INTO `tbl_main` (`id`, `id_user`, `nama`, `email`, `tgl_main`, `jam_main`, `team`, `status_main`, `date`) VALUES
(32, '7GSFOb5QeAayjmpr9NvJRAbppsZ2', 'davin al', 'davinal1956@gmail.com', '2023-08-21', '10:45', 'Merah', 0, '2023-08-21 03:45:12'),
(33, 'p6uDamGkKOVXkjU2m7dcRFZavmp1', 'mediarakyat auditor', 'mediarakyatauditor@gmail.com', '2023-08-21', '13:11', 'Merah', 0, '2023-08-21 06:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_karir`
--

CREATE TABLE `tbl_member_karir` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `waktu_member` varchar(15) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_selesai` varchar(20) NOT NULL,
  `jml_bermain` int(12) NOT NULL,
  `sisa_bermain` varchar(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `pdf_url` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_member_karir`
--

INSERT INTO `tbl_member_karir` (`id`, `id_user`, `nama`, `email`, `waktu_member`, `total_harga`, `tgl_mulai`, `tgl_selesai`, `jml_bermain`, `sisa_bermain`, `status_pembayaran`, `pdf_url`, `date`) VALUES
(54, 'p6uDamGkKOVXkjU2m7dcRFZavmp1', 'mediarakyat auditor', 'mediarakyatauditor@gmail.com', '1', '200000', '2023-08-21', '2023-09-21', 12, '10', '200', 'https://app.sandbox.midtrans.com/snap/v1/transactions/8275113d-0fb7-4abe-aa9b-074208d6bc08/pdf', '2023-08-21 06:11:49'),
(55, '7GSFOb5QeAayjmpr9NvJRAbppsZ2', 'davin al', 'davinal1956@gmail.com', '1', '200000', '2023-08-21', '2023-09-21', 12, '11', '200', 'https://app.sandbox.midtrans.com/snap/v1/transactions/05d50929-e550-4524-b7eb-7a8f4c2c13fc/pdf', '2023-08-21 03:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `kd_booking` varchar(15) NOT NULL,
  `id_lapangan` varchar(11) NOT NULL,
  `kd_user` varchar(15) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `waktu_transaksi` varchar(30) NOT NULL,
  `status_transaksi` varchar(20) NOT NULL,
  `pdf_url` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(15) NOT NULL,
  `id_auth` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `kode_user`, `id_auth`, `nama`, `email`, `alamat`, `jk`, `tgl_lahir`, `nik`, `posisi`, `date`) VALUES
(19, 'user-45', 'YVhDWVByVoQzzdiM7eRqfKaGBOx1', 'nusa digital', 'nusadigital96@gmail.com', 'Medan', 'Laki - Laki', '2023-08-21', '242424242424', 'Penyerang', '2023-08-21 01:30:58'),
(20, 'user-281', 'p6uDamGkKOVXkjU2m7dcRFZavmp1', 'mediarakyat auditor', 'mediarakyatauditor@gmail.com', 'Medan', 'Laki - Laki', '2023-08-28', '343434343', 'Pertahanan', '2023-08-21 01:34:40'),
(21, 'user-966', '7GSFOb5QeAayjmpr9NvJRAbppsZ2', 'davin al', 'davinal1956@gmail.com', 'Medan', 'Laki - Laki', '2023-08-20', '3434345343535353', 'Penjaga Gawang', '2023-08-21 03:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `kode_team` varchar(15) NOT NULL,
  `team` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `kode_team`, `team`, `date`) VALUES
(1, 'tm-001', 'Merah', '2023-08-19 02:14:08'),
(2, 'tm-002', 'Putih', '2023-08-19 02:14:08'),
(3, 'tm-003', 'Biru', '2023-08-19 02:14:44'),
(4, 'tm-004', 'Hitam', '2023-08-19 02:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_auth` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `kode_user`, `nama`, `email`, `nik`, `id_auth`, `date`) VALUES
(12, 'user-966', 'davin al', 'davinal1956@gmail.com', '3434345343535353', '7GSFOb5QeAayjmpr9NvJRAbppsZ2', '2023-08-21 03:44:13');

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
-- Indexes for table `tbl_main`
--
ALTER TABLE `tbl_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member_karir`
--
ALTER TABLE `tbl_member_karir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_main`
--
ALTER TABLE `tbl_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_member_karir`
--
ALTER TABLE `tbl_member_karir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
