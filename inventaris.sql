-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
(2, 'AKT0002', 'Kendaraan Dinas', '2022-09-09 06:16:39', '2022-09-09 06:16:39'),
(3, 'AKT0003', 'Tanah', '2022-09-09 06:17:23', '2022-09-09 06:17:23'),
(6, 'AKT0004', 'Adya', '2022-09-09 23:33:08', '2022-09-09 23:33:29'),
(8, 'AKT0005', 'test 5', '2022-09-10 02:21:46', '2022-09-10 09:19:51');

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
(1, 'INV0001', 'Mesin Kantor', '2022-09-10 08:23:03', '2022-09-10 08:23:03'),
(2, 'INV0002', 'Perabot Kantor', '2022-09-10 08:23:15', '2022-09-10 08:23:15'),
(5, 'INV0003', 'Perabot Rumah Dinas', '2022-09-10 09:50:10', '2022-09-10 09:50:10'),
(6, 'INV0004', 'Alat Kebersihan', '2022-09-10 10:54:18', '2022-09-10 10:54:18'),
(8, 'INV0005', 'test 123', '2022-09-10 16:18:38', '2022-09-10 16:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_aktiva`
--

CREATE TABLE `laporan_aktiva` (
  `id` int(15) NOT NULL,
  `aktiva_id` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `harga_perolehan` float NOT NULL,
  `umur_teknis` int(5) NOT NULL,
  `penghapusan` int(3) NOT NULL,
  `ak_penyusutan` int(15) NOT NULL,
  `penyusutan_bln` int(15) NOT NULL,
  `jml_penyu_bln` int(15) NOT NULL,
  `nilai_buku` float NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_aktiva`
--

INSERT INTO `laporan_aktiva` (`id`, `aktiva_id`, `nama`, `tgl_perolehan`, `harga_perolehan`, `umur_teknis`, `penghapusan`, `ak_penyusutan`, `penyusutan_bln`, `jml_penyu_bln`, `nilai_buku`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 2, 'Lexus A30', '2022-09-10', 750000000, 1, 0, 0, 0, 0, 750000000, 'Mobil Dinas Baru', '2022-09-10 15:58:19', '2022-09-10 15:58:19'),
(6, 6, 'TEST', '2022-09-10', 100000000, 5, 5, 100000, 0, 0, 1000000, 'TEST', '2022-09-10 16:02:31', '2022-09-10 16:02:31');

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
  `tgl_perolehan` date NOT NULL,
  `banyak` int(5) NOT NULL,
  `harga_satuan` int(35) NOT NULL,
  `jml_hrg_perolehan` int(35) NOT NULL,
  `umur` text NOT NULL,
  `penghapusan` int(10) NOT NULL,
  `akum_penyusutan` int(35) NOT NULL,
  `penyusutan_bln` int(15) NOT NULL,
  `jml_penyusutan` int(35) NOT NULL,
  `nilai_buku` int(35) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_inventaris`
--

INSERT INTO `laporan_inventaris` (`id`, `inventaris_id`, `nama`, `lokasi`, `kelompok`, `tgl_perolehan`, `banyak`, `harga_satuan`, `jml_hrg_perolehan`, `umur`, `penghapusan`, `akum_penyusutan`, `penyusutan_bln`, `jml_penyusutan`, `nilai_buku`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 2, 'Kursi JT', 'Ruang Dirum', 'I', '2008-01-02', 1, 4000000, 4000000, '4 Tahun', 25, 3999999, 0, 3999999, 1, 'Rusak', '2022-09-10 13:52:37', '2022-09-10 14:12:48'),
(3, 2, 'Piring', 'Dapur', '1', '2022-09-10', 50, 13000, 13000, '5', 0, 0, 0, 0, 13000, 'Piring di dapur kantor', '2022-09-10 16:05:41', '2022-09-10 16:05:41');

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
(1, 'admin', 'admin', NULL, '$2y$10$3yh7kAbc6potRsHFVw4eIueNpC2K7qwiy5cjcUNdM.4x2o9EP2LJO', NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan_aktiva`
--
ALTER TABLE `laporan_aktiva`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporan_inventaris`
--
ALTER TABLE `laporan_inventaris`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
