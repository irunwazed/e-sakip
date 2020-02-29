-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 04:58 PM
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
-- Database: `konkep_planning`
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
(1, 1, 'Dinas Pendidikan dan Kebudayaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_penetapan_kegiatan`
--

CREATE TABLE `rkpd_penetapan_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_penetapan_program_tahun` tinyint(4) NOT NULL,
  `rkpd_penetapan_program_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_kegiatan_nama` text,
  `rkpd_penetapan_kegiatan_indikator` text,
  `rkpd_penetapan_kegiatan_formula` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_penetapan_program`
--

CREATE TABLE `rkpd_penetapan_program` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_penetapan_program_tahun` tinyint(4) NOT NULL,
  `rkpd_penetapan_program_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_program_nama` text,
  `rkpd_penetapan_program_ket` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_penetapan_program_indikator`
--

CREATE TABLE `rkpd_penetapan_program_indikator` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_penetapan_program_tahun` tinyint(4) NOT NULL,
  `rkpd_penetapan_program_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_program_indikator_kode` int(11) NOT NULL,
  `rkpd_penetapan_program_indikator_nama` text,
  `rkpd_penetapan_program_indikator_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rkpd_penetapan_program_indikator_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th0_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th1_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th2_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th3_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th4_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th5_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th6_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th1_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th2_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th3_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th4_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_penetapan_sub_kegiatan`
--

CREATE TABLE `rkpd_penetapan_sub_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_penetapan_program_tahun` tinyint(4) NOT NULL,
  `rkpd_penetapan_program_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_sub_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_sub_kegiatan_nama` text,
  `rkpd_penetapan_sub_kegiatan_indikator` text,
  `rkpd_penetapan_sub_kegiatan_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rkpd_penetapan_sub_kegiatan_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th0_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th1_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th2_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th3_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th4_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th5_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th6_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th1_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th2_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th3_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th4_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_perubahan_kegiatan`
--

CREATE TABLE `rkpd_perubahan_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_perubahan_program_tahun` int(11) NOT NULL,
  `rkpd_perubahan_program_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_kegiatan_nama` text,
  `rkpd_perubahan_kegiatan_indikator` text,
  `rkpd_perubahan_kegiatan_formula` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_perubahan_program`
--

CREATE TABLE `rkpd_perubahan_program` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_perubahan_program_tahun` int(11) NOT NULL,
  `rkpd_perubahan_program_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_program_nama` text,
  `rkpd_perubahan_program_ket` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_perubahan_program_indikator`
--

CREATE TABLE `rkpd_perubahan_program_indikator` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_perubahan_program_tahun` int(11) NOT NULL,
  `rkpd_perubahan_program_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_program_indikator_kode` int(11) NOT NULL,
  `rkpd_perubahan_program_indikator_nama` text,
  `rkpd_perubahan_program_indikator_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rkpd_perubahan_program_indikator_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th0_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th1_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th2_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th3_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th4_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th5_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th6_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th1_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th2_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th3_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th4_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_program_indikator_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_perubahan_sub_kegiatan`
--

CREATE TABLE `rkpd_perubahan_sub_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_perubahan_program_tahun` int(11) NOT NULL,
  `rkpd_perubahan_program_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_sub_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_perubahan_sub_kegiatan_nama` text,
  `rkpd_perubahan_sub_kegiatan_indikator` text,
  `rkpd_perubahan_sub_kegiatan_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rkpd_perubahan_sub_kegiatan_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th0_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th1_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th2_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th3_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th4_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th5_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th6_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th1_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th2_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th3_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th4_capaian_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1, NULL, 2019, 'visi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_kegiatan`
--

CREATE TABLE `rpjmd_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_program_kode` bigint(20) NOT NULL,
  `rpjmd_kegiatan_kode` bigint(20) NOT NULL,
  `rpjmd_kegiatan_nama` text,
  `id_satuan` int(11) NOT NULL,
  `rpjmd_kegiatan_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th0_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th1_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th2_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th3_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th4_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th5_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th6_target_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_kegiatan_th1_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th2_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th3_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th4_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_kegiatan_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1, 'misi 1.1', NULL, NULL),
(1, 1, 2, 'misi 1.2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_opd`
--

CREATE TABLE `rpjmd_opd` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_opd_perjanjian` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_opd_perjanjian`
--

CREATE TABLE `rpjmd_opd_perjanjian` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_opd_perjanjian_kode` int(11) NOT NULL,
  `rpjmd_opd_perjanjian_indikator` text,
  `rpjmd_opd_perjanjian_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rpjmd_opd_perjanjian_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th0_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th1_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th2_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th3_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th4_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th5_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th6_target_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_opd_perjanjian_th1_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th2_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th3_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th4_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_opd_perjanjian_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `opd_kode` int(11) NOT NULL,
  `rpjmd_program_kode` bigint(20) NOT NULL,
  `rpjmd_program_nama` text,
  `rpjmd_program_indikator` text,
  `rpjmd_program_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rpjmd_program_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th0_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th1_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th2_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th3_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th4_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th5_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th6_target_realisasi` double DEFAULT NULL,
  `rpjmd_program_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_program_th1_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_program_th2_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_program_th3_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_program_th4_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_program_th5_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_program_perjanjian` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1, 1, 1, 'sasaran 1.1.1.1', NULL, NULL),
(1, 1, 1, 1, 2, 'sasaran 1.1.1.2', NULL, NULL);

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
  `rpjmd_sasaran_indikator_formulasi` text,
  `rpjmd_sasaran_indikator_jenis` tinyint(4) DEFAULT NULL,
  `rpjmd_sasaran_indikator_iku_status` tinyint(4) NOT NULL,
  `rpjmd_sasaran_indikator_alasan` text,
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

INSERT INTO `rpjmd_sasaran_indikator` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `rpjmd_sasaran_indikator_kode`, `rpjmd_sasaran_indikator_nama`, `rpjmd_sasaran_indikator_formulasi`, `rpjmd_sasaran_indikator_jenis`, `rpjmd_sasaran_indikator_iku_status`, `rpjmd_sasaran_indikator_alasan`, `rpjmd_sasaran_indikator_target_th1`, `rpjmd_sasaran_indikator_target_th2`, `rpjmd_sasaran_indikator_target_th3`, `rpjmd_sasaran_indikator_target_th4`, `rpjmd_sasaran_indikator_target_th5`, `rpjmd_sasaran_indikator_realisasi_th1`, `rpjmd_sasaran_indikator_realisasi_th2`, `rpjmd_sasaran_indikator_realisasi_th3`, `rpjmd_sasaran_indikator_realisasi_th4`, `rpjmd_sasaran_indikator_realisasi_th5`, `id_satuan`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 1, 1, 'indikator 1', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(1, 1, 1, 1, 1, 2, 'indikator 2', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_sub_kegiatan`
--

CREATE TABLE `rpjmd_sub_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rpjmd_misi_kode` int(11) NOT NULL,
  `rpjmd_tujuan_kode` int(11) NOT NULL,
  `rpjmd_sasaran_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_program_kode` bigint(20) NOT NULL,
  `rpjmd_kegiatan_kode` bigint(20) NOT NULL,
  `rpjmd_sub_kegiatan_kode` bigint(20) NOT NULL,
  `rpjmd_sub_kegiatan_nama` text,
  `rpjmd_sub_kegiatan_indikator` text,
  `rpjmd_sub_kegiatan_formula` text,
  `id_satuan` int(11) NOT NULL,
  `rpjmd_sub_kegiatan_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th6_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th0_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th1_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th2_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th3_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th4_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th5_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th6_target_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th1_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th2_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th3_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th4_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th5_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sub_kegiatan_th1_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th2_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th3_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th4_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sub_kegiatan_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_triwulan`
--

CREATE TABLE `rpjmd_triwulan` (
  `rpjmd_triwulan_kode` varchar(45) NOT NULL,
  `rpjmd_triwulan_jenis` tinyint(4) NOT NULL COMMENT '1. rkpd awal\n2. rkpd penetapan\n3. rkpd perubahan',
  `rpjmd_triwulan_tahun` int(11) NOT NULL,
  `rpjmd_triwulan_ke` tinyint(4) NOT NULL,
  `rpjmd_triwulan_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_anggaran` double DEFAULT NULL,
  `rpjmd_triwulan_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1, 1, 'tujuan 1.1.1', NULL, NULL),
(1, 1, 1, 2, 'tujuan 1.1.2', NULL, NULL),
(1, 1, 2, 1, 'tujuan 1.2.1', NULL, NULL),
(1, 1, 2, 2, 'tujuan 1.2.2', NULL, NULL);

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
(1, '%', NULL, NULL);

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
(2, 'Admin Konkep', 'tes', '$2y$10$YJzk.zNth5dkuv6ENQ4bmOm4j9SZkneFbya0hK4dYK1VciRGy5xIi', 1, 2, 1, 1, 0, NULL, NULL);

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
-- Indexes for table `rkpd_penetapan_kegiatan`
--
ALTER TABLE `rkpd_penetapan_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`),
  ADD KEY `fk_rkpd_penetapan_kegiatan_rkpd_penetapan_program1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`);

--
-- Indexes for table `rkpd_penetapan_program`
--
ALTER TABLE `rkpd_penetapan_program`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`),
  ADD KEY `fk_rkpd_penetapan_program_opd1_idx` (`kota_kode`,`opd_kode`);

--
-- Indexes for table `rkpd_penetapan_program_indikator`
--
ALTER TABLE `rkpd_penetapan_program_indikator`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_program_indikator_kode`),
  ADD KEY `fk_rkpd_penetapan_program_indikator_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_rkpd_penetapan_program_indikator_rkpd_penetapan_program1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`);

--
-- Indexes for table `rkpd_penetapan_sub_kegiatan`
--
ALTER TABLE `rkpd_penetapan_sub_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`,`rkpd_penetapan_sub_kegiatan_kode`),
  ADD KEY `fk_rkpd_penetapan_sub_kegiatan_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_rkpd_penetapan_sub_kegiatan_rkpd_penetapan_kegiatan1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`);

--
-- Indexes for table `rkpd_perubahan_kegiatan`
--
ALTER TABLE `rkpd_perubahan_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`,`rkpd_perubahan_kegiatan_kode`),
  ADD KEY `fk_rkpd_perubahan_kegiatan_rkpd_perubahan_program1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`);

--
-- Indexes for table `rkpd_perubahan_program`
--
ALTER TABLE `rkpd_perubahan_program`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`),
  ADD KEY `fk_rkpd_perubahan_program_opd1_idx` (`kota_kode`,`opd_kode`);

--
-- Indexes for table `rkpd_perubahan_program_indikator`
--
ALTER TABLE `rkpd_perubahan_program_indikator`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`,`rkpd_perubahan_program_indikator_kode`),
  ADD KEY `fk_rkpd_perubahan_program_indikator_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_rkpd_perubahan_program_indikator_rkpd_perubahan_program1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`);

--
-- Indexes for table `rkpd_perubahan_sub_kegiatan`
--
ALTER TABLE `rkpd_perubahan_sub_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`,`rkpd_perubahan_kegiatan_kode`,`rkpd_perubahan_sub_kegiatan_kode`),
  ADD KEY `fk_rkpd_perubahan_sub_kegiatan_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_rkpd_perubahan_sub_kegiatan_rkpd_perubahan_kegiatan1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`,`rkpd_perubahan_kegiatan_kode`);

--
-- Indexes for table `rpjmd`
--
ALTER TABLE `rpjmd`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`),
  ADD KEY `fk_rpjmd_kota1_idx` (`kota_kode`);

--
-- Indexes for table `rpjmd_kegiatan`
--
ALTER TABLE `rpjmd_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`,`rpjmd_kegiatan_kode`),
  ADD KEY `fk_rpjmd_kegiatan_rpjmd_program1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`),
  ADD KEY `fk_rpjmd_kegiatan_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rpjmd_misi`
--
ALTER TABLE `rpjmd_misi`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`),
  ADD KEY `fk_rpjmd_misi_rpjmd1_idx` (`kota_kode`,`rpjmd_kode`);

--
-- Indexes for table `rpjmd_opd`
--
ALTER TABLE `rpjmd_opd`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`);

--
-- Indexes for table `rpjmd_opd_perjanjian`
--
ALTER TABLE `rpjmd_opd_perjanjian`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_opd_perjanjian_kode`),
  ADD KEY `fk_rpjmd_opd_perjanjian_rpjmd_opd1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`),
  ADD KEY `fk_rpjmd_opd_perjanjian_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rpjmd_program`
--
ALTER TABLE `rpjmd_program`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`),
  ADD KEY `fk_rpjmd_program_rpjmd_opd1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`),
  ADD KEY `fk_rpjmd_program_satuan1_idx` (`id_satuan`);

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
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`rpjmd_sasaran_indikator_kode`),
  ADD KEY `fk_rpjmd_sasaran_indikator_rpjmd_sasaran1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`),
  ADD KEY `fk_rpjmd_sasaran_indikator_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rpjmd_sub_kegiatan`
--
ALTER TABLE `rpjmd_sub_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`,`rpjmd_kegiatan_kode`,`rpjmd_sub_kegiatan_kode`),
  ADD KEY `fk_rpjmd_sub_kegiatan_rpjmd_kegiatan1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`,`rpjmd_kegiatan_kode`),
  ADD KEY `fk_rpjmd_sub_kegiatan_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rpjmd_triwulan`
--
ALTER TABLE `rpjmd_triwulan`
  ADD PRIMARY KEY (`rpjmd_triwulan_tahun`,`rpjmd_triwulan_ke`,`rpjmd_triwulan_kode`,`rpjmd_triwulan_jenis`);

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
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opd`
--
ALTER TABLE `opd`
  ADD CONSTRAINT `fk_opd_kota` FOREIGN KEY (`kota_kode`) REFERENCES `kota` (`kota_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rkpd_penetapan_kegiatan`
--
ALTER TABLE `rkpd_penetapan_kegiatan`
  ADD CONSTRAINT `fk_rkpd_penetapan_kegiatan_rkpd_penetapan_program1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`) REFERENCES `rkpd_penetapan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rkpd_penetapan_program`
--
ALTER TABLE `rkpd_penetapan_program`
  ADD CONSTRAINT `fk_rkpd_penetapan_program_opd1` FOREIGN KEY (`kota_kode`,`opd_kode`) REFERENCES `opd` (`kota_kode`, `opd_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rkpd_penetapan_program_indikator`
--
ALTER TABLE `rkpd_penetapan_program_indikator`
  ADD CONSTRAINT `fk_rkpd_penetapan_program_indikator_rkpd_penetapan_program1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`) REFERENCES `rkpd_penetapan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rkpd_penetapan_program_indikator_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rkpd_penetapan_sub_kegiatan`
--
ALTER TABLE `rkpd_penetapan_sub_kegiatan`
  ADD CONSTRAINT `fk_rkpd_penetapan_sub_kegiatan_rkpd_penetapan_kegiatan1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`) REFERENCES `rkpd_penetapan_kegiatan` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`, `rkpd_penetapan_kegiatan_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rkpd_penetapan_sub_kegiatan_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rkpd_perubahan_kegiatan`
--
ALTER TABLE `rkpd_perubahan_kegiatan`
  ADD CONSTRAINT `fk_rkpd_perubahan_kegiatan_rkpd_perubahan_program1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`) REFERENCES `rkpd_perubahan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_perubahan_program_tahun`, `rkpd_perubahan_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rkpd_perubahan_program`
--
ALTER TABLE `rkpd_perubahan_program`
  ADD CONSTRAINT `fk_rkpd_perubahan_program_opd1` FOREIGN KEY (`kota_kode`,`opd_kode`) REFERENCES `opd` (`kota_kode`, `opd_kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rkpd_perubahan_program_indikator`
--
ALTER TABLE `rkpd_perubahan_program_indikator`
  ADD CONSTRAINT `fk_rkpd_perubahan_program_indikator_rkpd_perubahan_program1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`) REFERENCES `rkpd_perubahan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_perubahan_program_tahun`, `rkpd_perubahan_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rkpd_perubahan_program_indikator_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rkpd_perubahan_sub_kegiatan`
--
ALTER TABLE `rkpd_perubahan_sub_kegiatan`
  ADD CONSTRAINT `fk_rkpd_perubahan_sub_kegiatan_rkpd_perubahan_kegiatan1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`,`rkpd_perubahan_kegiatan_kode`) REFERENCES `rkpd_perubahan_kegiatan` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_perubahan_program_tahun`, `rkpd_perubahan_program_kode`, `rkpd_perubahan_kegiatan_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rkpd_perubahan_sub_kegiatan_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rpjmd`
--
ALTER TABLE `rpjmd`
  ADD CONSTRAINT `fk_rpjmd_kota1` FOREIGN KEY (`kota_kode`) REFERENCES `kota` (`kota_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_kegiatan`
--
ALTER TABLE `rpjmd_kegiatan`
  ADD CONSTRAINT `fk_rpjmd_kegiatan_rpjmd_program1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`) REFERENCES `rpjmd_program` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`, `rpjmd_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpjmd_kegiatan_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rpjmd_misi`
--
ALTER TABLE `rpjmd_misi`
  ADD CONSTRAINT `fk_rpjmd_misi_rpjmd1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`) REFERENCES `rpjmd` (`kota_kode`, `rpjmd_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_opd`
--
ALTER TABLE `rpjmd_opd`
  ADD CONSTRAINT `fk_rpjmd_opd_rpjmd_sasaran1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`) REFERENCES `rpjmd_sasaran` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rpjmd_opd_perjanjian`
--
ALTER TABLE `rpjmd_opd_perjanjian`
  ADD CONSTRAINT `fk_rpjmd_opd_perjanjian_rpjmd_opd1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`) REFERENCES `rpjmd_opd` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpjmd_opd_perjanjian_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rpjmd_program`
--
ALTER TABLE `rpjmd_program`
  ADD CONSTRAINT `fk_rpjmd_program_rpjmd_opd1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`) REFERENCES `rpjmd_opd` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpjmd_program_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `rpjmd_sub_kegiatan`
--
ALTER TABLE `rpjmd_sub_kegiatan`
  ADD CONSTRAINT `fk_rpjmd_sub_kegiatan_rpjmd_kegiatan1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_program_kode`,`rpjmd_kegiatan_kode`) REFERENCES `rpjmd_kegiatan` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`, `rpjmd_program_kode`, `rpjmd_kegiatan_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpjmd_sub_kegiatan_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
