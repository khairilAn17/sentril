-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 02:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentrilpomed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggaran_all`
--

CREATE TABLE `tbl_anggaran_all` (
  `id_anggaran` int(100) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `anggaran` int(20) NOT NULL,
  `target` int(10) NOT NULL,
  `realisasi` int(10) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `sisa_target` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `target` int(10) NOT NULL,
  `anggaran` bigint(20) NOT NULL,
  `realisasi` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `sisa_target` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_infokom`
--

CREATE TABLE `tbl_kegiatan_infokom` (
  `id_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `target` int(10) NOT NULL,
  `anggaran` bigint(20) NOT NULL,
  `realisasi` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `sisa_target` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_pengujian`
--

CREATE TABLE `tbl_kegiatan_pengujian` (
  `id_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `target` int(10) NOT NULL,
  `anggaran` bigint(20) NOT NULL,
  `realisasi` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `sisa_target` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_penindakan`
--

CREATE TABLE `tbl_kegiatan_penindakan` (
  `id_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `target` int(10) NOT NULL,
  `anggaran` bigint(20) NOT NULL,
  `realisasi` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `sisa_target` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_tu`
--

CREATE TABLE `tbl_kegiatan_tu` (
  `id_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `target` int(10) NOT NULL,
  `anggaran` bigint(20) NOT NULL,
  `realisasi` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `sisa_target` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subangaran_all`
--

CREATE TABLE `tbl_subangaran_all` (
  `id_subanggaran` int(100) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `id_subkegiatan` int(10) NOT NULL,
  `tanggal` varchar(5) NOT NULL,
  `status` enum('terverifikasi','belum verifikasi') NOT NULL,
  `anggaran` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkegiatan`
--

CREATE TABLE `tbl_subkegiatan` (
  `id_subkegiatan` int(9) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `anggaran` bigint(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pj_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('terverifikasi','belum verifikasi') NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkegiatan_infokom`
--

CREATE TABLE `tbl_subkegiatan_infokom` (
  `id_subkegiatan` int(9) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `anggaran` bigint(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pj_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('terverifikasi','belum verifikasi') NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subkegiatan_infokom`
--

INSERT INTO `tbl_subkegiatan_infokom` (`id_subkegiatan`, `id_kegiatan`, `tanggal_kegiatan`, `tanggal_input`, `jam`, `anggaran`, `lokasi`, `pj_kegiatan`, `keterangan`, `file`, `status`, `tahun`) VALUES
(1, 'Infokom1', '11-Jan-2019', '20-Jan-2019', '06:00 PM', 1000, 'Medan', 'Khairil', 'tes', 'Infokom1-3.jpg', 'terverifikasi', ''),
(3, 'fdl', 'ytfjyf', '20-Jan-2019', '09:08 PM', 3000000, 'hfhg', 'fdly', 'tfhhtf', '', 'belum verifikasi', ''),
(4, 'fdl', '11-Jan-2019', '20-Jan-2019', '09:11 PM', 1000000, 'tftf', 'fdly', 'ghj', '', 'terverifikasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkegiatan_pengujian`
--

CREATE TABLE `tbl_subkegiatan_pengujian` (
  `id_subkegiatan` int(9) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `anggaran` bigint(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pj_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('terverifikasi','belum verifikasi') NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkegiatan_penindakan`
--

CREATE TABLE `tbl_subkegiatan_penindakan` (
  `id_subkegiatan` int(9) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `anggaran` bigint(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pj_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('terverifikasi','belum verifikasi') NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkegiatan_tu`
--

CREATE TABLE `tbl_subkegiatan_tu` (
  `id_subkegiatan` int(9) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `anggaran` bigint(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pj_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('terverifikasi','belum verifikasi') NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(9) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('superuser','admin','petugas') NOT NULL,
  `unit` enum('pemeriksaan','infokom','tu','penindakan','pengujian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `unit`) VALUES
(11, 'evi', '$2y$10$cWk6mq.BYBxAYtrGFNMdrez8xX23t1xhkmscQfH6xk9vFhQ9c2srW', 'admin', 'pemeriksaan'),
(12, 'Wilda', '$2y$10$v2pkdfrrWp5KVopU6My0QeiLBR5lEcJcH76dZn/Jv4Ab1Xclrvoiy', 'admin', 'pemeriksaan'),
(14, 'Aminah', '$2y$10$zq7axKpr6ecGrp6QvYW56.WRkSkROVxVU00JqMVOu6awfpsmwYiD2', 'admin', 'pemeriksaan'),
(15, 'admin', '$2y$10$nAX27N6H0sth.aE3GizCQOHGhik6PfPVIsV6twGQ9v4mgWogvLWz.', 'superuser', 'pemeriksaan'),
(16, 'tes', '$2y$10$VIE2QDQz6ACdvrkW6F23x.E433wQw/c/QvJQp16uS7CWnZHx5qRr6', 'superuser', 'pemeriksaan'),
(17, 'petugas', '$2y$10$2yeRtQ/mj6vYY7zJfj501.rOQrVXJqWnfIh3Xg6uARQCZPxQ51SnW', 'petugas', 'pemeriksaan'),
(18, 'demo', '$2y$10$s.xlCsJrtiZNZ21iU32d2uZNbR//Ps3pTRwpA8vD8X.jHXlMhwaPu', 'superuser', 'pemeriksaan'),
(19, 'Ita', '$2y$10$DHyNZypE8dzbiKagJjnQDOnJuJ6zlvdmxfEICyoEXb5wdwLwkBZlq', 'admin', 'pemeriksaan'),
(20, 'Sidik', '$2y$10$VTyQ8J9TXqe43NvqztZike5V6lnwAQeS0zfu1Rhopif1gcaw0XN4m', 'admin', 'pemeriksaan'),
(124, 'khairil1', '$2y$10$wOD0yOD9cfNPUvS3liFRoeco2kZarJu8o2BCIhkPe9ts7zRjpNieq', 'admin', 'pemeriksaan'),
(128, 'tes', '$2y$10$4Tt4bDJdHmSRgdf/sG3EoO2Ls.YPjfZ/ZcBIb.ds3slYb/AXN7v5W', 'admin', 'pemeriksaan'),
(129, 'tes', '$2y$10$Kij/LgYYhqdH/d7ZZT54JefzjIk6XaleFRmFmZaJGxKogCBypLaDu', 'admin', 'pemeriksaan'),
(130, 'aku', '$2y$10$kKBDhN0zp5SCeLCtJWm.8erK6YHceJng0hZ7pSHM8xVMFXt.iNjrG', 'admin', 'pemeriksaan'),
(132, 'infokom', '$2y$10$7J0RA6mRqoqnyKoSXQPKc.BjrDnP1PaxpKIAd9IRS0yEqfyogRYOe', 'superuser', 'infokom'),
(133, 'pemeriksaan', '$2y$10$6MHq6udBmzekrl9yISC91.avcaqkkFxOf8qiUY8ZnhUt55iXoBWAa', 'superuser', 'pemeriksaan'),
(134, 'pemeriksaanadm1', '$2y$10$zqgs18nqEg/J/sBwhVcidOwH3ECnO.UJDNJOLdWvLlznNXPRMM7Du', 'admin', 'pemeriksaan'),
(135, 'tu', '$2y$10$48ZTcKMoU4lZww/pWAkFRO8lr/WSVyiUiJi5DufeCq2nnktE5DySW', 'superuser', 'tu'),
(136, 'infokomadm', '$2y$10$vuukLx7hnHCczWlriOJuU.g5ICzN8mXbmzZkzHJ1h6Zg0HZjEZO2e', 'admin', 'infokom'),
(137, 'infokomptgs', '$2y$10$ghKDrgBSjO53vweUt0bfKOzCwa/PAE5e37e2uGn8RMJ.aot3YeWia', 'petugas', 'infokom'),
(138, 'tuadmin', '$2y$10$2PVKiQEeBqg6QvNRZPINLOFScW4PkYdnnTGyqVHOUVysDfzRvjZI.', 'admin', 'tu'),
(139, 'pengujian', '$2y$10$ZsKh/9ZN.lC5FHFVjrileeXSMUFMtXv5v0mb7RM6Ad5bLiqAEj4JW', 'superuser', 'pengujian'),
(140, 'pengujianadm', '$2y$10$4GcB75Is75boVyevtAu6qOXB84m3e/2UvHo0.eX5N75We/OgI3Lyq', 'admin', 'pengujian'),
(141, 'pemeriksaanadm', '$2y$10$mzkurbvKBIzVVPWBMTNeZeFTbmmZPaUOFOb19TrxrEF1erX46VHJW', 'admin', 'pemeriksaan'),
(142, 'penindakan', '$2y$10$A18.ogPQ5l5OdFhXw0be0Owo.Ug.WMfx/WEJ5Z3nxB.dA60A6SclC', 'superuser', 'penindakan'),
(143, 'pemeriksaanptgs', '$2y$10$GXLcIjogGRLwkht2ttvV1.22PWpjFwHqcpPnJc9YggH.m5c9Lpxyy', 'petugas', 'pemeriksaan'),
(144, 'penindakanadm', '$2y$10$2BcML63iMahEZIt1lq4ScOY3qOj3zYmy/nghEpA2MlRljEAkCxk0m', 'admin', 'penindakan'),
(145, 'penindakanptgs', '$2y$10$UboYe8cloupEyRkhoQXhLemos2ho6uW4haBdeuw0/EiezI42IdACS', 'petugas', 'penindakan'),
(146, 'penindakantes', '$2y$10$VXX6lkfSWrCEyIm/bMICguK1Pwq.pkXZZiPEqtpiscN1GcZVim7ZC', 'admin', 'penindakan'),
(147, 'tuptgs', '$2y$10$eEVSXmuGHvl7CCQW5dZqnOoVvy8hoT9NDmG0mH8jffmh4MPRIRj8G', 'petugas', 'tu'),
(148, 'pengujianptgs', '$2y$10$FXFvcWdsO/SM5wiUVIYXX.fiSZG/6lQ2yoCsSWZfDoY8dvKTXePU2', 'petugas', 'pengujian'),
(149, 'fadly', '$2y$10$iLO80W3V4ZxcJIfDuhYaw.By0zMla3Gug4KyxznIvjl8DUGKsd6o2', 'superuser', 'infokom'),
(150, 'fadlyadmin', '$2y$10$xz29Xy1qWLQc/RxAFkZENel9s6c.S5jT/RHQRU1KqiK/3fNvltmeS', 'admin', 'infokom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggaran_all`
--
ALTER TABLE `tbl_anggaran_all`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_kegiatan_infokom`
--
ALTER TABLE `tbl_kegiatan_infokom`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_kegiatan_pengujian`
--
ALTER TABLE `tbl_kegiatan_pengujian`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_kegiatan_penindakan`
--
ALTER TABLE `tbl_kegiatan_penindakan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_kegiatan_tu`
--
ALTER TABLE `tbl_kegiatan_tu`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_subangaran_all`
--
ALTER TABLE `tbl_subangaran_all`
  ADD PRIMARY KEY (`id_subanggaran`);

--
-- Indexes for table `tbl_subkegiatan`
--
ALTER TABLE `tbl_subkegiatan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tbl_subkegiatan_infokom`
--
ALTER TABLE `tbl_subkegiatan_infokom`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tbl_subkegiatan_pengujian`
--
ALTER TABLE `tbl_subkegiatan_pengujian`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tbl_subkegiatan_penindakan`
--
ALTER TABLE `tbl_subkegiatan_penindakan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tbl_subkegiatan_tu`
--
ALTER TABLE `tbl_subkegiatan_tu`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggaran_all`
--
ALTER TABLE `tbl_anggaran_all`
  MODIFY `id_anggaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subangaran_all`
--
ALTER TABLE `tbl_subangaran_all`
  MODIFY `id_subanggaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subkegiatan`
--
ALTER TABLE `tbl_subkegiatan`
  MODIFY `id_subkegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `tbl_subkegiatan_infokom`
--
ALTER TABLE `tbl_subkegiatan_infokom`
  MODIFY `id_subkegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subkegiatan_pengujian`
--
ALTER TABLE `tbl_subkegiatan_pengujian`
  MODIFY `id_subkegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subkegiatan_penindakan`
--
ALTER TABLE `tbl_subkegiatan_penindakan`
  MODIFY `id_subkegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subkegiatan_tu`
--
ALTER TABLE `tbl_subkegiatan_tu`
  MODIFY `id_subkegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
