-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 01:22 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konkep_plaining`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `kota_kode` int(11) NOT NULL,
  `kota_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kota_kode`, `kota_nama`, `updated_at`, `created_at`) VALUES
(1, 'Konawe Kepulauan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `opd_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`kota_kode`, `opd_kode`, `opd_nama`, `updated_at`, `created_at`) VALUES
(1, 1, 'Dinas Pendidikan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd`
--

CREATE TABLE `rpjmd` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_jenis` tinyint(4) NOT NULL COMMENT '1. rpjmd\n2. renstra',
  `opd_kode` int(11) DEFAULT NULL,
  `rpjmd_tahun` int(11) DEFAULT NULL,
  `rpjmd_visi` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd`
--

INSERT INTO `rpjmd` (`kota_kode`, `rpjmd_kode`, `rpjmd_jenis`, `opd_kode`, `rpjmd_tahun`, `rpjmd_visi`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, 2019, 'Visi', NULL, '2019-12-26 00:28:10'),
(1, 2, 2, 1, 2019, 'pendidikan2', '2019-12-26 23:41:09', '2019-12-26 23:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_misi`
--

CREATE TABLE `rpjmd_misi` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_misi_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_misi`
--

INSERT INTO `rpjmd_misi` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_misi_nama`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'misi 1', NULL, '2019-12-26 00:28:45'),
(1, 1, 2, 'misi 2', NULL, '2019-12-26 00:28:49'),
(1, 2, 1, 'misi 1', NULL, '2019-12-26 23:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_program`
--

CREATE TABLE `rpjmd_program` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `rpjmd_program_kode` int(11) NOT NULL,
  `rpjmd_program_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_program`
--

INSERT INTO `rpjmd_program` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `rpjmd_program_kode`, `rpjmd_program_nama`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 1, 1, 'program 1.1.1.1', NULL, '2019-12-26 00:29:37'),
(1, 1, 1, 1, 1, 2, 'program 1.1.1.2', NULL, '2019-12-26 00:29:42'),
(1, 2, 1, 1, 1, 1, 'program 1.1.1.1', NULL, '2019-12-26 23:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_sasaran`
--

CREATE TABLE `rpjmd_sasaran` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `rpjmd_sasaran_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_sasaran`
--

INSERT INTO `rpjmd_sasaran` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `rpjmd_sasaran_nama`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 1, 'sasaran 1.1.1', NULL, '2019-12-26 00:29:26'),
(1, 2, 1, 1, 1, 'sasaran 1.1.1', NULL, '2019-12-26 23:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_sasaran_indikator`
--

CREATE TABLE `rpjmd_sasaran_indikator` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `rpjmd_sasaran_indikator_kode` int(11) NOT NULL,
  `rpjmd_sasaran_indikator_nama` text,
  `rpjmd_sasaran_indikator_iku_status` tinyint(4) NOT NULL,
  `rpjmd_sasaran_indikator_alasan` text,
  `rpjmd_sasaran_indikator_formulasi` text,
  `rpjmd_sasaran_indikator_target_th1` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_target_th2` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_target_th3` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_target_th4` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_target_th5` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_realisasi_th1` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_realisasi_th2` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_realisasi_th3` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_realisasi_th4` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_realisasi_th5` varchar(45) DEFAULT NULL,
  `id_satuan` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_sasaran_indikator`
--

INSERT INTO `rpjmd_sasaran_indikator` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `rpjmd_sasaran_indikator_kode`, `rpjmd_sasaran_indikator_nama`, `rpjmd_sasaran_indikator_iku_status`, `rpjmd_sasaran_indikator_alasan`, `rpjmd_sasaran_indikator_formulasi`, `rpjmd_sasaran_indikator_target_th1`, `rpjmd_sasaran_indikator_target_th2`, `rpjmd_sasaran_indikator_target_th3`, `rpjmd_sasaran_indikator_target_th4`, `rpjmd_sasaran_indikator_target_th5`, `rpjmd_sasaran_indikator_realisasi_th1`, `rpjmd_sasaran_indikator_realisasi_th2`, `rpjmd_sasaran_indikator_realisasi_th3`, `rpjmd_sasaran_indikator_realisasi_th4`, `rpjmd_sasaran_indikator_realisasi_th5`, `id_satuan`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 1, 1, 'sasaran indikator', 1, NULL, NULL, '100', '100', '100', '100', '100', '90', '90', '90', '90', '90', 1, NULL, '2019-12-26 00:32:24'),
(1, 2, 1, 1, 1, 1, 'tes', 1, NULL, NULL, '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', 1, NULL, '2019-12-26 23:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_tujuan`
--

CREATE TABLE `rpjmd_tujuan` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_tujuan_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_tujuan`
--

INSERT INTO `rpjmd_tujuan` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_tujuan_nama`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 'tujuan 1.1', NULL, '2019-12-26 00:28:59'),
(1, 1, 1, 2, 'tujuan 1.2', NULL, '2019-12-26 00:29:09'),
(1, 2, 1, 1, 'tujuan 1.1', NULL, '2019-12-26 23:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_tujuan_indikator`
--

CREATE TABLE `rpjmd_tujuan_indikator` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_tujuan_indikator_kode` int(11) NOT NULL,
  `rpjmd_tujuan_indikator_nama` text,
  `rpjmd_tujuan_indikator_target` varchar(45) DEFAULT NULL,
  `id_satuan` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_tujuan_indikator`
--

INSERT INTO `rpjmd_tujuan_indikator` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_tujuan_indikator_kode`, `rpjmd_tujuan_indikator_nama`, `rpjmd_tujuan_indikator_target`, `id_satuan`, `updated_at`, `created_at`) VALUES
(1, 2, 1, 1, 1, 'tes', 'tes', 1, NULL, '2019-12-26 23:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_visi_jabaran`
--

CREATE TABLE `rpjmd_visi_jabaran` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_visi_jabaran_kode` int(11) NOT NULL,
  `rpjmd_visi_jabaran_jenis` varchar(45) DEFAULT NULL,
  `rpjmd_visi_jabaran_isi` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_visi_jabaran`
--

INSERT INTO `rpjmd_visi_jabaran` (`kota_kode`, `rpjmd_kode`, `rpjmd_visi_jabaran_kode`, `rpjmd_visi_jabaran_jenis`, `rpjmd_visi_jabaran_isi`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'agama', 'agama', NULL, '2019-12-26 00:28:28'),
(1, 2, 1, 'agama', 'tes2', '2019-12-26 23:44:57', '2019-12-26 23:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan_nama` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan_nama`, `updated_at`, `created_at`) VALUES
(1, '%', NULL, NULL),
(2, 'Unit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` text,
  `akun` tinyint(4) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `akun`, `level`, `status`, `kota_kode`, `opd_kode`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin', '$2y$10$YJzk.zNth5dkuv6ENQ4bmOm4j9SZkneFbya0hK4dYK1VciRGy5xIi', 1, 1, 1, 1, 0, NULL, NULL),
(2, 'Admin Konkep', 'tes', '$2y$10$YJzk.zNth5dkuv6ENQ4bmOm4j9SZkneFbya0hK4dYK1VciRGy5xIi', 1, 2, 1, 1, 0, NULL, NULL),
(4, 'pendidikan', 'pendidikan', '$2y$10$tQHKFS//dvrHbZ0Y/J1wpemoYxWVP6ohwuieBw.pDtHFMd3KMD7OW', 1, 3, 1, 1, 1, '2019-12-26 23:35:30', '2019-12-26 23:35:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_kode`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`),
  ADD KEY `fk_opd_kota_idx` (`kota_kode`);

--
-- Indexes for table `rpjmd`
--
ALTER TABLE `rpjmd`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`),
  ADD KEY `fk_rpjmd_kota1_idx` (`kota_kode`);

--
-- Indexes for table `rpjmd_misi`
--
ALTER TABLE `rpjmd_misi`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`),
  ADD KEY `fk_rpjmd_misi_rpjmd1_idx` (`kota_kode`,`rpjmd_kode`);

--
-- Indexes for table `rpjmd_program`
--
ALTER TABLE `rpjmd_program`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`rpjmd_program_kode`),
  ADD KEY `fk_rpjmd_program_rpjmd_sasaran1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`);

--
-- Indexes for table `rpjmd_sasaran`
--
ALTER TABLE `rpjmd_sasaran`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`),
  ADD KEY `fk_rpjmd_sasaran_rpjmd_tujuan1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`);

--
-- Indexes for table `rpjmd_sasaran_indikator`
--
ALTER TABLE `rpjmd_sasaran_indikator`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`rpjmd_sasaran_indikator_kode`,`id_satuan`),
  ADD KEY `fk_rpjmd_sasaran_indikator_rpjmd_sasaran1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`),
  ADD KEY `fk_rpjmd_sasaran_indikator_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rpjmd_tujuan`
--
ALTER TABLE `rpjmd_tujuan`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`),
  ADD KEY `fk_rpjmd_tujuan_rpjmd_misi1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`);

--
-- Indexes for table `rpjmd_tujuan_indikator`
--
ALTER TABLE `rpjmd_tujuan_indikator`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_tujuan_indikator_kode`,`id_satuan`),
  ADD KEY `fk_rpjmd_tujuan_indikator_rpjmd_tujuan1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`),
  ADD KEY `fk_rpjmd_tujuan_indikator_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rpjmd_visi_jabaran`
--
ALTER TABLE `rpjmd_visi_jabaran`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_visi_jabaran_kode`),
  ADD KEY `fk_rpjmd_visi_jabaran_rpjmd1_idx` (`kota_kode`,`rpjmd_kode`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opd`
--
ALTER TABLE `opd`
  ADD CONSTRAINT `fk_opd_kota` FOREIGN KEY (`kota_kode`) REFERENCES `kota` (`kota_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd`
--
ALTER TABLE `rpjmd`
  ADD CONSTRAINT `fk_rpjmd_kota1` FOREIGN KEY (`kota_kode`) REFERENCES `kota` (`kota_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_misi`
--
ALTER TABLE `rpjmd_misi`
  ADD CONSTRAINT `fk_rpjmd_misi_rpjmd1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`) REFERENCES `rpjmd` (`kota_kode`, `rpjmd_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_program`
--
ALTER TABLE `rpjmd_program`
  ADD CONSTRAINT `fk_rpjmd_program_rpjmd_sasaran1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`) REFERENCES `rpjmd_sasaran` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_sasaran`
--
ALTER TABLE `rpjmd_sasaran`
  ADD CONSTRAINT `fk_rpjmd_sasaran_rpjmd_tujuan1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`) REFERENCES `rpjmd_tujuan` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_sasaran_indikator`
--
ALTER TABLE `rpjmd_sasaran_indikator`
  ADD CONSTRAINT `fk_rpjmd_sasaran_indikator_rpjmd_sasaran1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`) REFERENCES `rpjmd_sasaran` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpjmd_sasaran_indikator_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rpjmd_tujuan`
--
ALTER TABLE `rpjmd_tujuan`
  ADD CONSTRAINT `fk_rpjmd_tujuan_rpjmd_misi1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`) REFERENCES `rpjmd_misi` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_tujuan_indikator`
--
ALTER TABLE `rpjmd_tujuan_indikator`
  ADD CONSTRAINT `fk_rpjmd_tujuan_indikator_rpjmd_tujuan1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`) REFERENCES `rpjmd_tujuan` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpjmd_tujuan_indikator_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rpjmd_visi_jabaran`
--
ALTER TABLE `rpjmd_visi_jabaran`
  ADD CONSTRAINT `fk_rpjmd_visi_jabaran_rpjmd1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`) REFERENCES `rpjmd` (`kota_kode`, `rpjmd_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
