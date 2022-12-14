-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 10:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktiva`
--

CREATE TABLE `aktiva` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktiva`
--

INSERT INTO `aktiva` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'AKT0001', 'Rumah Dinas', '2022-09-09 06:09:41', '2022-09-10 09:01:31'),
(2, 'AKT0002', 'Gedung Kantor', '2022-09-09 06:16:39', '2022-09-12 21:50:51'),
(3, 'AKT0003', 'Tanah', '2022-09-09 06:17:23', '2022-09-09 06:17:23'),
(6, 'AKT0004', 'Adya', '2022-09-09 23:33:08', '2022-09-09 23:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(15) NOT NULL,
  `kode` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'INV0002', 'Perabot Kantor', '2022-09-10 08:23:15', '2022-09-10 08:23:15'),
(5, 'INV0003', 'Perabot Rumah Dinas', '2022-09-10 09:50:10', '2022-09-10 09:50:10'),
(9, 'INV0006', 'Mesin Kantor', '2022-09-12 06:34:15', '2022-09-12 06:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_aktiva`
--

CREATE TABLE `laporan_aktiva` (
  `id` int(15) NOT NULL,
  `aktiva_id` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgl_perolehan` date DEFAULT NULL,
  `harga_perolehan` int(35) NOT NULL,
  `umur_teknis` varchar(15) DEFAULT NULL,
  `penghapusan` int(3) DEFAULT 0,
  `ak_penyusutan` int(15) NOT NULL,
  `penyusutan_bln` int(15) NOT NULL,
  `jml_penyu_bln` int(15) NOT NULL,
  `nilai_buku` float NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_aktiva`
--

INSERT INTO `laporan_aktiva` (`id`, `aktiva_id`, `nama`, `tgl_perolehan`, `harga_perolehan`, `umur_teknis`, `penghapusan`, `ak_penyusutan`, `penyusutan_bln`, `jml_penyu_bln`, `nilai_buku`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, 2, 'BPD Maluku (Jln.Pattimura)', NULL, 2147483647, NULL, 5, 2147483647, 2500000, 2147483647, 1, 'Hapus Buku', '2022-09-13 04:53:37', '2022-09-15 07:45:39'),
(17, 3, 'Tanah Jln.Pattimura', NULL, 2147483647, NULL, NULL, 0, 200000, 0, 6000000000, NULL, '2022-09-13 04:54:34', '2022-09-15 07:45:54'),
(18, 2, 'Penangkal Petir, Lift.', NULL, 190081264, NULL, 5, 190081268, 500000, 191081268, 0, NULL, '2022-09-13 04:55:16', '2022-09-15 08:16:43'),
(19, 3, 'Tanah Jln.Mangga Dua', NULL, 96000000, NULL, NULL, 0, 0, 100000000, 96000000, NULL, '2022-09-13 04:56:24', '2022-09-15 08:21:32'),
(20, 1, 'Revaluasi Rumah Dinas', NULL, 356073568, '20 Tahun', 5, 356073579, 0, 356073579, 0, 'Hapus Buku', '2022-09-13 04:57:35', '2022-09-13 04:57:35'),
(21, 1, 'Rehab Rumah Jln.Karang Panjang', NULL, 80500000, '20 Tahun', 5, 55343779, 335417, 55679196, 24820800, NULL, '2022-09-13 05:49:25', '2022-09-13 05:49:25'),
(22, 1, 'test', '2022-09-13', 1, '1', 1, 1, 1, 1, 1, '1', '2022-09-13 07:10:57', '2022-09-13 07:10:57'),
(23, 2, 'TEST', '2022-09-15', 50000000, '5', 0, 0, 0, 3500000, 50000000, 'test', '2022-09-15 07:36:59', '2022-09-15 08:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_inventaris`
--

CREATE TABLE `laporan_inventaris` (
  `id` int(15) NOT NULL,
  `inventaris_id` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `kelompok` text NOT NULL,
  `tgl_perolehan` date DEFAULT NULL,
  `banyak` int(5) NOT NULL,
  `harga_satuan` int(35) NOT NULL,
  `jml_hrg_perolehan` int(35) NOT NULL,
  `umur` text DEFAULT NULL,
  `penghapusan` int(10) DEFAULT 0,
  `akum_penyusutan` int(35) NOT NULL,
  `penyusutan_bln` int(15) NOT NULL,
  `jml_penyusutan` int(35) NOT NULL,
  `nilai_buku` int(35) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_inventaris`
--

INSERT INTO `laporan_inventaris` (`id`, `inventaris_id`, `nama`, `lokasi`, `kelompok`, `tgl_perolehan`, `banyak`, `harga_satuan`, `jml_hrg_perolehan`, `umur`, `penghapusan`, `akum_penyusutan`, `penyusutan_bln`, `jml_penyusutan`, `nilai_buku`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, 9, 'Printer Cannon M530', 'SKAI', 'I', '2008-01-25', 1, 3000000, 3000000, '4 Tahun', 25, 2999999, 300000, 2999999, 1, 'Rusak', '2022-09-13 05:01:53', '2022-09-15 07:50:10'),
(8, 9, 'Laptop', 'SKK', 'I', '2008-03-24', 1, 15000000, 15000000, '4 Tahun', 25, 14999999, 0, 14999999, 1, 'Rusak', '2022-09-13 05:05:36', '2022-09-13 05:05:36'),
(9, 2, 'Meja Sofa', 'Ruang Dirpem', 'I', '2008-02-04', 1, 20000000, 20000000, '4 Tahun', 25, 19999999, 1000000, 19999999, 1, 'Rusak', '2022-09-13 05:54:26', '2022-09-15 07:49:29'),
(10, 5, 'TV Thosiba LCD 46 Inci', 'Rumah Dirut', 'I', '2008-08-06', 1, 23000000, 23000000, '4 Tahun', 25, 22999999, 0, 22999999, 1, 'rusak', '2022-09-13 05:55:24', '2022-09-13 05:55:24'),
(12, 2, 'TEST DATA', 'test', '1', '2022-09-13', 1, 1, 1, '11', 1, 1, 1, 1, 1, '1', '2022-09-13 07:12:07', '2022-09-13 07:12:07'),
(13, 2, 'TEST', 'TEST', 'TEST', '2022-09-15', 1, 5000000, 5000000, '5 TAHUN', 0, 0, 0, 0, 5000000, 'TEST', '2022-09-15 07:36:18', '2022-09-15 07:36:18'),
(14, 5, 'TEST', 'TEST', 'TEST', '2022-09-15', 3, 5000000, 15000000, '5', 5, 5, 3000000, 5, 15000000, 'test', '2022-09-15 07:38:26', '2022-09-15 07:49:54'),
(15, 9, 'TEST', 'SKAI', '1', '2022-09-15', 1, 3000000, 3000000, '5', 5, 5, 5, 5, 3000000, 'TEST', '2022-09-15 07:38:56', '2022-09-15 07:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_09_000000_create_aktiva_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$10$3yh7kAbc6potRsHFVw4eIueNpC2K7qwiy5cjcUNdM.4x2o9EP2LJO', NULL, NULL, NULL),
(4, 'testing11', 'test', NULL, '', NULL, '2022-09-13 03:52:46', '2022-09-13 03:53:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiva`
--
ALTER TABLE `aktiva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_aktiva`
--
ALTER TABLE `laporan_aktiva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_inventaris`
--
ALTER TABLE `laporan_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiva`
--
ALTER TABLE `aktiva`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laporan_aktiva`
--
ALTER TABLE `laporan_aktiva`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laporan_inventaris`
--
ALTER TABLE `laporan_inventaris`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
