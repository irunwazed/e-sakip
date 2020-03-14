-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 03:28 PM
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
-- Database: `konkep_planning_rev1`
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
(1, 1, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perjanjian_kinerja_program`
--

CREATE TABLE `perjanjian_kinerja_program` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `perjanjian_kinerja_program_kode` int(11) NOT NULL,
  `perjanjian_kinerja_program_tahun` int(11) NOT NULL,
  `perjanjian_kinerja_program_level` int(11) NOT NULL COMMENT '1. kepala dinas\n2. sekretaris\n3. kepala bidang',
  `perjanjian_kinerja_program_nama` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perjanjian_kinerja_program`
--

INSERT INTO `perjanjian_kinerja_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `perjanjian_kinerja_program_kode`, `perjanjian_kinerja_program_tahun`, `perjanjian_kinerja_program_level`, `perjanjian_kinerja_program_nama`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 3, 1, 'Menyediakan Informasi Administrasi Kependudukan yang Akurat ', NULL, NULL),
(1, 1, 1, 1, 3, 2, 'Meningkatkan Pelayanan Administrasi Perkantoran yang mendukung kelancaran tugas dan fungsi OPD ', NULL, NULL),
(1, 1, 1, 1, 3, 3, 'Meningkatkan pelayanan Administrasi Kependudukan ', NULL, NULL),
(1, 1, 1, 2, 3, 1, 'Meningkatnya Administrasi Pencatatan Sipil', NULL, NULL),
(1, 1, 1, 2, 3, 2, 'Meningkatnya Sarana dan Prasarana Aparatur guna mendukung kelancaran tugas dan fungsi OPD', NULL, NULL),
(1, 1, 1, 3, 3, 2, 'Meningkatnya Displin Aparatur OPD', NULL, NULL),
(1, 1, 1, 4, 3, 2, 'Meningkatnya Kapasitas Sumber Daya Aparatur guna mendukung kelancaran tugas dan fungsi OPD ', NULL, NULL),
(1, 1, 1, 5, 3, 2, 'Meningkatnya Pengembangan Sistem Pelaporan Capaian Kinerja dan Keuangan ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perjanjian_kinerja_program_indikator`
--

CREATE TABLE `perjanjian_kinerja_program_indikator` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `perjanjian_kinerja_program_kode` int(11) NOT NULL,
  `perjanjian_kinerja_program_tahun` int(11) NOT NULL,
  `perjanjian_kinerja_program_level` int(11) NOT NULL,
  `perjanjian_kinerja_program_indikator_kode` int(11) NOT NULL,
  `perjanjian_kinerja_program_indikator_nama` text,
  `perjanjian_kinerja_program_indikator_formula` text,
  `id_satuan` int(11) NOT NULL,
  `perjanjian_kinerja_program_indikator_target_kinerja` varchar(45) DEFAULT NULL,
  `perjanjian_kinerja_program_indikator_target_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perjanjian_kinerja_program_indikator`
--

INSERT INTO `perjanjian_kinerja_program_indikator` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `perjanjian_kinerja_program_kode`, `perjanjian_kinerja_program_tahun`, `perjanjian_kinerja_program_level`, `perjanjian_kinerja_program_indikator_kode`, `perjanjian_kinerja_program_indikator_nama`, `perjanjian_kinerja_program_indikator_formula`, `id_satuan`, `perjanjian_kinerja_program_indikator_target_kinerja`, `perjanjian_kinerja_program_indikator_target_realisasi`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 3, 1, 1, 'Data Informasi Kependudukan', 'Jumlah Buku Profil Kependudukan ', 2, '1', NULL, NULL, NULL),
(1, 1, 1, 1, 3, 1, 2, 'Jumlah Operator yang berkopetensi ', 'Jumlah Operator yang mengikuti BIMTEK SIAK', 3, '17', NULL, NULL, NULL),
(1, 1, 1, 1, 3, 2, 1, 'Persentase cakupan Pelayanan Administrasi Perkantoran ', 'Persentase cakupan Pelayanan Administrasi Perkantoran ', 1, '100', NULL, NULL, NULL),
(1, 1, 1, 1, 3, 3, 1, 'pesentase Jumlah Penduduk yang memiliki E-KTP ', 'Perbandingan jumlah KTP yang terbit dengan penduduk yang merekam', 1, '50', NULL, NULL, NULL),
(1, 1, 1, 1, 3, 3, 2, 'Persentase Jumlah kepala keluarga yang memiliki KK ', 'Persentase Jumlah penduduk yang memiliki KK dengan jumlah Kepala Keluarga yang tercatat ', 1, '50', NULL, NULL, NULL),
(1, 1, 1, 2, 3, 1, 1, 'persentase Jumlah penduduk 0-18 tahun berakte kelahiran ', 'Perbandingan jumlah penduduk 0-18 tahun berakte kelahiran dengan jumlah penduduk 0-18 ', 1, '50', NULL, NULL, NULL),
(1, 1, 1, 2, 3, 1, 2, 'persentase jumlah laporan kematian ', 'Perbandingan Jumlah Akte kematian yang terbit dengan jumlah laporan ', 1, '50', NULL, NULL, NULL),
(1, 1, 1, 2, 3, 1, 3, 'pesentase jumlah pasangan berakte nikah', 'perbandingan jumlah pasangan berakte nikah dengan jumlah pasangan ', 1, '50', NULL, NULL, NULL),
(1, 1, 1, 2, 3, 1, 4, 'persentase jumlah laporan perceraian', 'perbandingan jumlah akte perceraian yang terbit dengan jumlah laporan perceraian', 1, '50', NULL, NULL, NULL),
(1, 1, 1, 2, 3, 2, 1, 'Persentase cakupan sarana dan prasarana pelayanan aparatur ', 'Persentase cakupan sarana dan prasarana pelayanan aparatur ', 1, '100', NULL, NULL, NULL),
(1, 1, 1, 3, 3, 2, 1, 'Persentase cakupan disiplin aparatur ', 'Persentase cakupan disiplin aparatur ', 1, '100', NULL, NULL, NULL),
(1, 1, 1, 4, 3, 2, 1, 'Persentase pemenuhan fasilitas peningkatan kapasitas sumber daya aparatur ', 'Persentase pemenuhan fasilitas peningkatan kapasitas sumber daya aparatur ', 1, '100', NULL, NULL, NULL),
(1, 1, 1, 5, 3, 2, 1, 'Perbandingan Jumlah Laporan yang telah sesuai dengan pedoman penyusunan & penyampaiannya tepat waktu', 'Perbandingan Jumlah Laporan yang telah sesuai dengan pedoman penyusunan & penyampaiannya tepat waktu', 1, '100', NULL, NULL, NULL);

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
  `id_satuan` int(11) NOT NULL,
  `rkpd_penetapan_kegiatan_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_kegiatan_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_kegiatan_target_kinerja_perubahan` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_kegiatan_target_realisasi_perubahan` double DEFAULT NULL,
  `rkpd_penetapan_kegiatan_ket` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rkpd_penetapan_kegiatan`
--

INSERT INTO `rkpd_penetapan_kegiatan` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`, `rkpd_penetapan_kegiatan_kode`, `rkpd_penetapan_kegiatan_nama`, `rkpd_penetapan_kegiatan_indikator`, `rkpd_penetapan_kegiatan_formula`, `id_satuan`, `rkpd_penetapan_kegiatan_target_kinerja`, `rkpd_penetapan_kegiatan_target_realisasi`, `rkpd_penetapan_kegiatan_target_kinerja_perubahan`, `rkpd_penetapan_kegiatan_target_realisasi_perubahan`, `rkpd_penetapan_kegiatan_ket`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 3, 1, 1, 'Penyediaan Jasa Surat Menyurat ', NULL, NULL, 1, '0', 500000, '0', 500000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 8, 'Penyediaan Jasa Kebersihan Kantor  ', NULL, NULL, 1, '0', 24000000, '0', 24000000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 10, 'Penyediaan Alat Tulis Kantor ', NULL, NULL, 1, '0', 50000000, '0', 50000000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 11, 'Penyediaan Barang Cetakan Dan Penggandaan ', NULL, NULL, 1, '0', 12700000, '0', 12700000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 15, 'Penyediaan Bahan Bacaan Dan Peraturan PerundangUndangan ', NULL, NULL, 1, '0', 3600000, '0', 3600000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 17, 'Penyediaan Makan Dan Minuman', NULL, NULL, 1, '0', 24000000, '0', 24000000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 18, 'Rapat-Rapat Koordinasi Dan Konsultasi Keluar Daerah', NULL, NULL, 1, '0', 100000000, '0', 100000000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 19, 'Rapat Koordinasi Dan Konsultasi  Dalam Daerah', NULL, NULL, 1, '0', 20000000, '0', 20000000, NULL, NULL, NULL),
(1, 1, 1, 3, 1, 20, 'Penyediaan Jasa Administrasi Kantor ', NULL, NULL, 1, '0', 292800000, '0', 292800000, NULL, NULL, NULL),
(1, 1, 1, 3, 2, 6, 'Pengadaan Perlengkapan Gedung Kantor ', NULL, NULL, 1, '0', 15000000, '0', 15000000, NULL, NULL, NULL),
(1, 1, 1, 3, 15, 2, 'Pelatihan tenaga pengelola SIAK ', 'Jumlah Pegawai Yang Mengikuti Pelatihan ', NULL, 1, '0', 26572000, '0', 26572000, NULL, NULL, NULL),
(1, 1, 1, 3, 15, 6, 'Pengelolaan dan Penyusunan Laporan Informasi kependudukan ', 'Profil Kependudukan ', NULL, 1, '0', 23000000, '0', 23000000, NULL, NULL, NULL),
(1, 1, 1, 3, 17, 6, 'Bimbingan Tekinis Pengelolaan Administrasi Kependudukan ', NULL, NULL, 1, '0', 80000000, '0', 80000000, NULL, NULL, NULL);

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
  `rkpd_penetapan_program_iku` tinyint(4) DEFAULT NULL COMMENT '1. IKU',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rkpd_penetapan_program`
--

INSERT INTO `rkpd_penetapan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`, `rkpd_penetapan_program_nama`, `rkpd_penetapan_program_ket`, `rkpd_penetapan_program_iku`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 3, 1, 'Program Pelayanan Administrasi Perkantoran ', NULL, 0, NULL, NULL),
(1, 1, 1, 3, 2, 'Program Peningktan Sarana dan Prasarana Aparatur', NULL, 0, NULL, NULL),
(1, 1, 1, 3, 3, 'Program Peningkatan Disiplin Aparatur', NULL, 0, NULL, NULL),
(1, 1, 1, 3, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur ', NULL, 0, NULL, NULL),
(1, 1, 1, 3, 6, 'Program Peningkatan Pengembangan Sistem Pelaporan Capaian Kinerja dan Keuangan', NULL, 0, NULL, NULL),
(1, 1, 1, 3, 15, 'Program Penataan Administrasi Kependudukan', NULL, 1, NULL, NULL),
(1, 1, 1, 3, 17, 'Program Penataan Adminitrasi Kependukan dan Pencatatan Sipil ', NULL, 0, NULL, NULL);

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
  `rkpd_penetapan_program_indikator_target_kinerja_perubahan` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_program_indikator_target_realisasi_perubahan` double DEFAULT NULL,
  `rkpd_penetapan_program_indikator_sumber_dana` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rkpd_penetapan_program_indikator`
--

INSERT INTO `rkpd_penetapan_program_indikator` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`, `rkpd_penetapan_program_indikator_kode`, `rkpd_penetapan_program_indikator_nama`, `rkpd_penetapan_program_indikator_formula`, `id_satuan`, `rkpd_penetapan_program_indikator_target_kinerja`, `rkpd_penetapan_program_indikator_target_realisasi`, `rkpd_penetapan_program_indikator_target_kinerja_perubahan`, `rkpd_penetapan_program_indikator_target_realisasi_perubahan`, `rkpd_penetapan_program_indikator_sumber_dana`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 3, 1, 1, NULL, NULL, 1, '100', 607600000, '100', 607600000, 'APBD', NULL, NULL),
(1, 1, 1, 3, 2, 1, NULL, NULL, 1, '100', 325350000, '100', 325350000, 'APBD', NULL, NULL),
(1, 1, 1, 3, 3, 1, NULL, NULL, 1, '100', 11200000, '100', 11200000, 'APBD', NULL, NULL),
(1, 1, 1, 3, 5, 1, NULL, NULL, 1, '100', 70000000, '100', 70000000, 'APBD', NULL, NULL),
(1, 1, 1, 3, 6, 1, NULL, NULL, 1, '100', 16300000, '100', 16300000, 'APBD', NULL, NULL),
(1, 1, 1, 3, 15, 1, NULL, NULL, 1, '100', 891422000, '100', 891422000, 'APBD, DAK', NULL, NULL),
(1, 1, 1, 3, 17, 1, NULL, NULL, 1, '100', 0, '100', 0, NULL, NULL, NULL);

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
  `rkpd_penetapan_sub_kegiatan_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_sub_kegiatan_ket` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rkpd_penetapan_triwulan`
--

CREATE TABLE `rkpd_penetapan_triwulan` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `rkpd_penetapan_program_tahun` tinyint(4) NOT NULL,
  `rkpd_penetapan_program_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_kegiatan_kode` bigint(20) NOT NULL,
  `rkpd_penetapan_triwulan_ke` int(11) NOT NULL,
  `rkpd_penetapan_triwulan_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_target_kinerja_perubahan` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_target_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_triwulan_target_realisasi_perubahan` double DEFAULT NULL,
  `rkpd_penetapan_triwulan_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_capaian_kinerja_perubahan` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_capaian_realisasi` double DEFAULT NULL,
  `rkpd_penetapan_triwulan_capaian_realisasi_perubahan` double DEFAULT NULL,
  `rkpd_penetapan_triwulan_fisik` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_pelaksana` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_lokasi` varchar(45) DEFAULT NULL,
  `rkpd_penetapan_triwulan_sumber_dana` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rkpd_penetapan_triwulan`
--

INSERT INTO `rkpd_penetapan_triwulan` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`, `rkpd_penetapan_kegiatan_kode`, `rkpd_penetapan_triwulan_ke`, `rkpd_penetapan_triwulan_target_kinerja`, `rkpd_penetapan_triwulan_target_kinerja_perubahan`, `rkpd_penetapan_triwulan_target_realisasi`, `rkpd_penetapan_triwulan_target_realisasi_perubahan`, `rkpd_penetapan_triwulan_capaian_kinerja`, `rkpd_penetapan_triwulan_capaian_kinerja_perubahan`, `rkpd_penetapan_triwulan_capaian_realisasi`, `rkpd_penetapan_triwulan_capaian_realisasi_perubahan`, `rkpd_penetapan_triwulan_fisik`, `rkpd_penetapan_triwulan_pelaksana`, `rkpd_penetapan_triwulan_lokasi`, `rkpd_penetapan_triwulan_sumber_dana`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 3, 1, 1, 1, NULL, NULL, NULL, NULL, '100', NULL, 1000000, NULL, '-', '-', '-', 'APBD', NULL, '2020-03-12 21:53:57'),
(1, 1, 1, 3, 1, 1, 2, NULL, NULL, NULL, NULL, '100', NULL, 2000, NULL, '-', '-', '-', 'APBD', NULL, '2020-03-12 21:56:23');

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
  `id_satuan` int(11) NOT NULL,
  `rkpd_perubahan_kegiatan_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_kegiatan_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_kegiatan_ket` text,
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
  `rkpd_perubahan_sub_kegiatan_target_kinerja` varchar(45) DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_target_realisasi` double DEFAULT NULL,
  `rkpd_perubahan_sub_kegiatan_ket` text,
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
(1, 1, 1, NULL, 2016, 'Terwujudnya Tata Peradaban Masyarakat Wawonii yang bebas dari belenggu Keterbelakangan Sosial-Ekonomi dan Sosial Budaya pada tahun 2021', NULL, NULL);

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
  `rpjmd_kegiatan_indikator` text,
  `rpjmd_kegiatan_formula` text,
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

--
-- Dumping data for table `rpjmd_kegiatan`
--

INSERT INTO `rpjmd_kegiatan` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`, `rpjmd_program_kode`, `rpjmd_kegiatan_kode`, `rpjmd_kegiatan_nama`, `rpjmd_kegiatan_indikator`, `rpjmd_kegiatan_formula`, `id_satuan`, `rpjmd_kegiatan_th0_target_kinerja`, `rpjmd_kegiatan_th1_target_kinerja`, `rpjmd_kegiatan_th2_target_kinerja`, `rpjmd_kegiatan_th3_target_kinerja`, `rpjmd_kegiatan_th4_target_kinerja`, `rpjmd_kegiatan_th5_target_kinerja`, `rpjmd_kegiatan_th6_target_kinerja`, `rpjmd_kegiatan_th0_target_realisasi`, `rpjmd_kegiatan_th1_target_realisasi`, `rpjmd_kegiatan_th2_target_realisasi`, `rpjmd_kegiatan_th3_target_realisasi`, `rpjmd_kegiatan_th4_target_realisasi`, `rpjmd_kegiatan_th5_target_realisasi`, `rpjmd_kegiatan_th6_target_realisasi`, `rpjmd_kegiatan_th1_capaian_kinerja`, `rpjmd_kegiatan_th2_capaian_kinerja`, `rpjmd_kegiatan_th3_capaian_kinerja`, `rpjmd_kegiatan_th4_capaian_kinerja`, `rpjmd_kegiatan_th5_capaian_kinerja`, `rpjmd_kegiatan_th1_capaian_realisasi`, `rpjmd_kegiatan_th2_capaian_realisasi`, `rpjmd_kegiatan_th3_capaian_realisasi`, `rpjmd_kegiatan_th4_capaian_realisasi`, `rpjmd_kegiatan_th5_capaian_realisasi`, `updated_at`, `created_at`) VALUES
(1, 1, 4, 1, 1, 1, 1, 1, 'Penyediaan Jasa Surat Menyurat ', 'Jumlah Surat Menyurat selama 5 tahun yg terkirim ', NULL, 4, '12', '12', '12', '12', '12', '12', '12', 500000, 500000, 500000, 500000, 500000, 500000, 3000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 1, 2, 'Penyediaan jasa komunikasi, sumber daya air dan listrik ', 'Volume Air dan Daya Listrik yang digunakan ', NULL, 4, '12', '12', '12', '12', '12', '12', '12', 0, 0, 0, 14000000, 20000000, 20000000, 54000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 1, 7, 'Penyediaan Laporan Aset Triwulan dan Semester SKPD', 'Tersediannya Data aset  SKPD', NULL, 5, '1', '1', NULL, NULL, NULL, '', '1', 15000000, 15000000, 0, 0, 0, 0, 30000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 1, 4, 'Mendorong gerakan sosial dan kebudayaan kearah terciptanya tata kehidupan sosial-politik dan perkembangan peradaban masyarakat Wawonii yang mampu menjawab tantangan trend nasionalisasi ekonomi dan tata nilai kehidupan nasional lainnya dengan tetap mempertahankan nilai-nilai agama dan budaya luhur masyarakat WawoniiMendorong gerakan sosial dan kebudayaan kearah terciptanya tata kehidupan sosial-politik dan perkembangan peradaban masyarakat Wawonii yang mampu menjawab tantangan trend nasionalisasi ekonomi dan tata nilai kehidupan nasional lainnya dengan tetap mempertahankan nilai-nilai agama dan budaya luhur masyarakat Wawonii', NULL, NULL);

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

--
-- Dumping data for table `rpjmd_opd`
--

INSERT INTO `rpjmd_opd` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`, `rpjmd_opd_perjanjian`, `updated_at`, `created_at`) VALUES
(1, 1, 4, 1, 1, 1, NULL, NULL, NULL);

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
  `rpjmd_program_th1_target_sumber_data` varchar(45) DEFAULT NULL,
  `rpjmd_program_th2_target_sumber_data` varchar(45) DEFAULT NULL,
  `rpjmd_program_th3_target_sumber_data` varchar(45) DEFAULT NULL,
  `rpjmd_program_th4_target_sumber_data` varchar(45) DEFAULT NULL,
  `rpjmd_program_th5_target_sumber_data` varchar(45) DEFAULT NULL,
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

--
-- Dumping data for table `rpjmd_program`
--

INSERT INTO `rpjmd_program` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`, `rpjmd_program_kode`, `rpjmd_program_nama`, `rpjmd_program_indikator`, `rpjmd_program_formula`, `id_satuan`, `rpjmd_program_th0_target_kinerja`, `rpjmd_program_th1_target_kinerja`, `rpjmd_program_th2_target_kinerja`, `rpjmd_program_th3_target_kinerja`, `rpjmd_program_th4_target_kinerja`, `rpjmd_program_th5_target_kinerja`, `rpjmd_program_th6_target_kinerja`, `rpjmd_program_th0_target_realisasi`, `rpjmd_program_th1_target_realisasi`, `rpjmd_program_th2_target_realisasi`, `rpjmd_program_th3_target_realisasi`, `rpjmd_program_th4_target_realisasi`, `rpjmd_program_th5_target_realisasi`, `rpjmd_program_th6_target_realisasi`, `rpjmd_program_th1_target_sumber_data`, `rpjmd_program_th2_target_sumber_data`, `rpjmd_program_th3_target_sumber_data`, `rpjmd_program_th4_target_sumber_data`, `rpjmd_program_th5_target_sumber_data`, `rpjmd_program_th1_capaian_kinerja`, `rpjmd_program_th2_capaian_kinerja`, `rpjmd_program_th3_capaian_kinerja`, `rpjmd_program_th4_capaian_kinerja`, `rpjmd_program_th5_capaian_kinerja`, `rpjmd_program_th1_capaian_realisasi`, `rpjmd_program_th2_capaian_realisasi`, `rpjmd_program_th3_capaian_realisasi`, `rpjmd_program_th4_capaian_realisasi`, `rpjmd_program_th5_capaian_realisasi`, `rpjmd_program_perjanjian`, `updated_at`, `created_at`) VALUES
(1, 1, 4, 1, 1, 1, 1, 'Program Pelayanan Administrasi Perkantoran', '', NULL, 1, '100', '100', '100', '100', '100', '100', '100', 470100000, 250000000, 527600000, 571500000, 578000000, 570000000, 2975200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 2, 'Program Peningkatan Sarana Dan Prasarana Aparatur ', NULL, NULL, 1, '100', '100', '100', '100', '100', '100', '100', 422250000, 77500000, 405350000, 322000000, 190000000, 190000000, 1607100000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 3, 'Program Peningkatan Disiplin Aparatur ', NULL, NULL, 1, '100', '100', '100', '100', '100', '100', '100', 0, 7500000, 11200000, 7500000, 11200000, 11200000, 48600000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur', NULL, NULL, 1, '100', '100', '100', '100', '100', '100', '100', 0, 70000000, 70000000, 71500000, 71500000, 71500000, 354500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 6, 'Program Peningkatan Pengembangan Sistim Pelaporan Realisasi Kinerja Dan Keuangan ', NULL, NULL, 1, '100', '100', '100', '100', '100', '100', '100', 0, 17000000, 16300000, 18000000, 19500000, 27500000, 98300000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 15, 'Program Penataan Administrasi Kependudukan ', NULL, NULL, 1, '100', '100', '100', '100', '100', '100', '100', 284450000, 250000000, 158000000, 365000000, 368900000, 463900000, 1890250000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 1, 4, 1, 1, 1, 17, 'Program Penataan Adminitrasi Kependukan dan Pencatatan Sipil ', NULL, NULL, 1, '0', '100', '100', '100', '100', '100', '100', 0, 637300000, 726522000, 0, 726522000, 726522000, 2816866000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 1, 4, 1, 1, 'Meningkatnya Masyarakat yang Terlayani Adminduk dan Catatan Sipil', NULL, NULL);

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
  `opd_kode` int(11) NOT NULL,
  `rpjmd_sasaran_indikator_kode` int(11) NOT NULL,
  `rpjmd_sasaran_indikator_nama` text,
  `rpjmd_sasaran_indikator_formula` text,
  `rpjmd_sasaran_indikator_jenis` tinyint(4) DEFAULT NULL,
  `rpjmd_sasaran_indikator_iku_status` tinyint(4) NOT NULL,
  `rpjmd_sasaran_indikator_alasan` text,
  `id_satuan` int(11) NOT NULL,
  `rpjmd_sasaran_indikator_th0_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th1_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th2_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th3_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th4_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th5_target_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th0_target_realisasi` double DEFAULT NULL,
  `rpjmd_sasaran_indikator_th1_target_realisasi` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th2_target_realisasi` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th3_target_realisasi` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th4_target_realisasi` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th5_target_realisasi` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th1_capaian_kineja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th2_capaian_kineja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th3_capaian_kineja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th4_capaian_kineja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th5_capaian_kineja` varchar(45) DEFAULT NULL,
  `rpjmd_sasaran_indikator_th1_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sasaran_indikator_th2_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sasaran_indikator_th3_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sasaran_indikator_th4_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_sasaran_indikator_th5_capaian_realisasi` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd_sasaran_indikator`
--

INSERT INTO `rpjmd_sasaran_indikator` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`, `rpjmd_sasaran_indikator_kode`, `rpjmd_sasaran_indikator_nama`, `rpjmd_sasaran_indikator_formula`, `rpjmd_sasaran_indikator_jenis`, `rpjmd_sasaran_indikator_iku_status`, `rpjmd_sasaran_indikator_alasan`, `id_satuan`, `rpjmd_sasaran_indikator_th0_target_kinerja`, `rpjmd_sasaran_indikator_th1_target_kinerja`, `rpjmd_sasaran_indikator_th2_target_kinerja`, `rpjmd_sasaran_indikator_th3_target_kinerja`, `rpjmd_sasaran_indikator_th4_target_kinerja`, `rpjmd_sasaran_indikator_th5_target_kinerja`, `rpjmd_sasaran_indikator_th0_target_realisasi`, `rpjmd_sasaran_indikator_th1_target_realisasi`, `rpjmd_sasaran_indikator_th2_target_realisasi`, `rpjmd_sasaran_indikator_th3_target_realisasi`, `rpjmd_sasaran_indikator_th4_target_realisasi`, `rpjmd_sasaran_indikator_th5_target_realisasi`, `rpjmd_sasaran_indikator_th1_capaian_kineja`, `rpjmd_sasaran_indikator_th2_capaian_kineja`, `rpjmd_sasaran_indikator_th3_capaian_kineja`, `rpjmd_sasaran_indikator_th4_capaian_kineja`, `rpjmd_sasaran_indikator_th5_capaian_kineja`, `rpjmd_sasaran_indikator_th1_capaian_realisasi`, `rpjmd_sasaran_indikator_th2_capaian_realisasi`, `rpjmd_sasaran_indikator_th3_capaian_realisasi`, `rpjmd_sasaran_indikator_th4_capaian_realisasi`, `rpjmd_sasaran_indikator_th5_capaian_realisasi`, `updated_at`, `created_at`) VALUES
(1, 1, 4, 1, 1, 1, 1, 'Rasio penduduk ber-KTP per satuan penduduk ', 'Perbandingan jumlah penduduk ber-KTP  dengan Jumlah wajib KTP', NULL, 0, NULL, 1, '0', '5', '10', '50', '75', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `program_kode` bigint(20) NOT NULL,
  `kegiatan_kode` bigint(20) NOT NULL,
  `sub_kegiatan_kode` bigint(20) NOT NULL,
  `rpjmd_triwulan_jenis` tinyint(4) NOT NULL COMMENT '1. rkpd awal\n2. rkpd penetapan\n3. rkpd perubahan',
  `rpjmd_triwulan_tahun` int(11) NOT NULL,
  `rpjmd_triwulan_ke` tinyint(4) NOT NULL,
  `rpjmd_triwulan_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_anggaran` double DEFAULT NULL,
  `rpjmd_triwulan_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_triwulan_fisik` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_pelaksana` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_lokasi` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_sumber_dana` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd_triwulan_kegiatan`
--

CREATE TABLE `rpjmd_triwulan_kegiatan` (
  `kota_kode` int(11) NOT NULL,
  `opd_kode` int(11) NOT NULL,
  `rpjmd_kode` int(11) NOT NULL,
  `program_kode` bigint(20) NOT NULL,
  `kegiatan_kode` bigint(20) NOT NULL,
  `rpjmd_triwulan_jenis` tinyint(4) NOT NULL COMMENT '1. rkpd awal\n2. rkpd penetapan\n3. rkpd perubahan',
  `rpjmd_triwulan_tahun` int(11) NOT NULL,
  `rpjmd_triwulan_ke` tinyint(4) NOT NULL,
  `rpjmd_triwulan_capaian_kinerja` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_anggaran` double DEFAULT NULL,
  `rpjmd_triwulan_capaian_realisasi` double DEFAULT NULL,
  `rpjmd_triwulan_fisik` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_pelaksana` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_lokasi` varchar(45) DEFAULT NULL,
  `rpjmd_triwulan_sumber_dana` varchar(45) DEFAULT NULL,
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
(1, 1, 4, 1, 'Mewujudkan tata kelola pemerintah yang  transparan dan akuntabel melalui peningkatan pelayanan administrasi kependudukan yang profesional, cepat, mudah dan tertib', NULL, NULL);

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
(1, '%', NULL, NULL),
(2, 'Buku', NULL, NULL),
(3, 'Orang', NULL, NULL),
(4, 'bln', NULL, NULL),
(5, 'Thn', NULL, NULL),
(6, 'Jenis', NULL, NULL),
(7, 'Keg', NULL, NULL),
(8, 'Dok', NULL, NULL),
(9, 'Org', NULL, NULL),
(10, 'Lap', NULL, NULL),
(11, 'Kec', NULL, NULL),
(12, 'Peserta', NULL, NULL);

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
-- Indexes for table `perjanjian_kinerja_program`
--
ALTER TABLE `perjanjian_kinerja_program`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`perjanjian_kinerja_program_kode`,`perjanjian_kinerja_program_tahun`,`perjanjian_kinerja_program_level`),
  ADD KEY `fk_perjanjian_kinerja_program_opd1_idx` (`kota_kode`,`opd_kode`);

--
-- Indexes for table `perjanjian_kinerja_program_indikator`
--
ALTER TABLE `perjanjian_kinerja_program_indikator`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`perjanjian_kinerja_program_kode`,`perjanjian_kinerja_program_tahun`,`perjanjian_kinerja_program_level`,`perjanjian_kinerja_program_indikator_kode`,`id_satuan`),
  ADD KEY `fk_perjanjian_kinerja_program_indikator_perjanjian_kinerja__idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`perjanjian_kinerja_program_kode`,`perjanjian_kinerja_program_tahun`,`perjanjian_kinerja_program_level`),
  ADD KEY `fk_perjanjian_kinerja_program_indikator_satuan1_idx` (`id_satuan`);

--
-- Indexes for table `rkpd_penetapan_kegiatan`
--
ALTER TABLE `rkpd_penetapan_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`),
  ADD KEY `fk_rkpd_penetapan_kegiatan_rkpd_penetapan_program1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`),
  ADD KEY `fk_rkpd_penetapan_kegiatan_satuan1_idx` (`id_satuan`);

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
-- Indexes for table `rkpd_penetapan_triwulan`
--
ALTER TABLE `rkpd_penetapan_triwulan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`,`rkpd_penetapan_triwulan_ke`),
  ADD KEY `fk_rkpd_penetapan_triwulan_rkpd_penetapan_kegiatan1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`);

--
-- Indexes for table `rkpd_perubahan_kegiatan`
--
ALTER TABLE `rkpd_perubahan_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`,`rkpd_perubahan_kegiatan_kode`),
  ADD KEY `fk_rkpd_perubahan_kegiatan_rkpd_perubahan_program1_idx` (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`),
  ADD KEY `fk_rkpd_perubahan_kegiatan_satuan1_idx` (`id_satuan`);

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
  ADD PRIMARY KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`,`rpjmd_sasaran_indikator_kode`),
  ADD KEY `fk_rpjmd_sasaran_indikator_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_rpjmd_sasaran_indikator_rpjmd_opd1_idx` (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`);

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
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`program_kode`,`kegiatan_kode`,`sub_kegiatan_kode`,`rpjmd_triwulan_jenis`,`rpjmd_triwulan_tahun`,`rpjmd_triwulan_ke`);

--
-- Indexes for table `rpjmd_triwulan_kegiatan`
--
ALTER TABLE `rpjmd_triwulan_kegiatan`
  ADD PRIMARY KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`program_kode`,`kegiatan_kode`,`rpjmd_triwulan_jenis`,`rpjmd_triwulan_tahun`,`rpjmd_triwulan_ke`);

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
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
-- Constraints for table `perjanjian_kinerja_program`
--
ALTER TABLE `perjanjian_kinerja_program`
  ADD CONSTRAINT `fk_perjanjian_kinerja_program_opd1` FOREIGN KEY (`kota_kode`,`opd_kode`) REFERENCES `opd` (`kota_kode`, `opd_kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perjanjian_kinerja_program_indikator`
--
ALTER TABLE `perjanjian_kinerja_program_indikator`
  ADD CONSTRAINT `fk_perjanjian_kinerja_program_indikator_perjanjian_kinerja_pr1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`perjanjian_kinerja_program_kode`,`perjanjian_kinerja_program_tahun`,`perjanjian_kinerja_program_level`) REFERENCES `perjanjian_kinerja_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `perjanjian_kinerja_program_kode`, `perjanjian_kinerja_program_tahun`, `perjanjian_kinerja_program_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perjanjian_kinerja_program_indikator_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rkpd_penetapan_kegiatan`
--
ALTER TABLE `rkpd_penetapan_kegiatan`
  ADD CONSTRAINT `fk_rkpd_penetapan_kegiatan_rkpd_penetapan_program1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`) REFERENCES `rkpd_penetapan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rkpd_penetapan_kegiatan_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `rkpd_penetapan_triwulan`
--
ALTER TABLE `rkpd_penetapan_triwulan`
  ADD CONSTRAINT `fk_rkpd_penetapan_triwulan_rkpd_penetapan_kegiatan1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_penetapan_program_tahun`,`rkpd_penetapan_program_kode`,`rkpd_penetapan_kegiatan_kode`) REFERENCES `rkpd_penetapan_kegiatan` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_penetapan_program_tahun`, `rkpd_penetapan_program_kode`, `rkpd_penetapan_kegiatan_kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rkpd_perubahan_kegiatan`
--
ALTER TABLE `rkpd_perubahan_kegiatan`
  ADD CONSTRAINT `fk_rkpd_perubahan_kegiatan_rkpd_perubahan_program1` FOREIGN KEY (`kota_kode`,`opd_kode`,`rpjmd_kode`,`rkpd_perubahan_program_tahun`,`rkpd_perubahan_program_kode`) REFERENCES `rkpd_perubahan_program` (`kota_kode`, `opd_kode`, `rpjmd_kode`, `rkpd_perubahan_program_tahun`, `rkpd_perubahan_program_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rkpd_perubahan_kegiatan_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_rpjmd_sasaran_indikator_rpjmd_opd1` FOREIGN KEY (`kota_kode`,`rpjmd_kode`,`rpjmd_misi_kode`,`rpjmd_tujuan_kode`,`rpjmd_sasaran_kode`,`opd_kode`) REFERENCES `rpjmd_opd` (`kota_kode`, `rpjmd_kode`, `rpjmd_misi_kode`, `rpjmd_tujuan_kode`, `rpjmd_sasaran_kode`, `opd_kode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
