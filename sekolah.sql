-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 10:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

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
(4, '2021_05_15_100629_create_permission_tables', 1),
(5, '2021_05_15_100717_create_nilai_table', 1),
(6, '2021_05_15_100744_create_sekolah_table', 1),
(7, '2021_05_15_100800_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_nama_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_agama` int(11) NOT NULL,
  `n_pkn` int(11) NOT NULL,
  `n_bindo` int(11) NOT NULL,
  `n_bing` int(11) NOT NULL,
  `n_ipa` int(11) NOT NULL,
  `n_ips` int(11) NOT NULL,
  `n_mtk` int(11) NOT NULL,
  `n_sbk` int(11) NOT NULL,
  `n_penjas` int(11) NOT NULL,
  `kkm` int(11) NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `n_nama`, `n_nama_ortu`, `n_nis`, `n_agama`, `n_pkn`, `n_bindo`, `n_bing`, `n_ipa`, `n_ips`, `n_mtk`, `n_sbk`, `n_penjas`, `kkm`, `id_users`, `created_at`, `updated_at`) VALUES
(14, 'Agustina Watijaya', 'Feronika Simanjuntak', '00545', 90, 91, 92, 90, 89, 93, 89, 88, 87, 75, 1, '2021-06-10 13:35:06', '2021-06-10 13:35:06'),
(15, 'Yoyo Agus', 'Yanti Hutasoit', '00547', 89, 90, 91, 89, 87, 88, 88, 89, 90, 75, 1, '2021-06-10 13:35:27', '2021-06-10 13:35:27'),
(16, 'Bunga Mentari', 'Feronika Simanjuntak', '11110', 89, 90, 98, 87, 89, 98, 88, 89, 90, 75, 1, '2021-06-10 13:35:47', '2021-06-10 13:35:47'),
(17, 'Lala Yoyada', 'Scintya Tobing', '11111', 89, 98, 88, 89, 89, 89, 89, 90, 90, 75, 1, '2021-06-10 13:36:12', '2021-06-10 13:36:12');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(2, 'role-create', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(3, 'role-edit', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(4, 'role-delete', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(5, 'Nilai-list', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(6, 'Nilai-create', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(7, 'Nilai-edit', 'web', '2021-06-10 10:33:11', '2021-06-10 10:33:11'),
(8, 'Nilai-delete', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(9, 'Sekolah-list', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(10, 'Sekolah-create', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(11, 'Sekolah-edit', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(12, 'Sekolah-delete', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(13, 'Siswa-list', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(14, 'Siswa-create', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(15, 'Siswa-edit', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12'),
(16, 'Siswa-delete', 'web', '2021-06-10 10:33:12', '2021-06-10 10:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-06-10 10:33:22', '2021-06-10 10:33:22'),
(2, 'Orang tua', 'web', '2021-06-10 10:34:48', '2021-06-10 10:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `i_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `i_nama`, `i_alamat`, `i_email`, `i_notelp`, `i_foto`, `id_users`, `created_at`, `updated_at`) VALUES
(1, 'Sekolah Dasar Negeri 1 Ambarita', 'Ambarita, Kec. Simanindo, Kab. Samosir', 'sekolahdasarnegeri1ambarita@sch.id', '(+62) 8816334', 'landing1.jpg', 1, '2021-06-10 12:29:11', '2021-06-10 12:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_nama_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_tgl_lahir` date NOT NULL,
  `s_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `s_nis`, `s_nama`, `s_nama_ortu`, `s_tempat_lahir`, `s_tgl_lahir`, `s_alamat`, `s_gender`, `s_kelas`, `s_semester`, `created_at`, `updated_at`) VALUES
(1, '00545', 'Agustina Watijaya', 'Feronika Simanjuntak', 'Balige', '2010-08-28', 'Balige', 'Wanita', 'enam', 'dua', '2021-06-10 10:36:37', '2021-06-10 13:34:39'),
(2, '11110', 'Bunga Mentari', 'Feronika Simanjuntak', 'Balige', '2012-08-28', 'Balige', 'Wanita', 'enam', 'dua', '2021-06-10 10:37:22', '2021-06-10 13:34:29'),
(14, '00547', 'Yoyo Agus', 'Yanti Hutasoit', 'Balige', '2010-08-28', 'Balige', 'Pria', 'satu', 'satu', '2021-06-10 11:42:23', '2021-06-10 12:07:57'),
(23, '11111', 'Lala Yoyada', 'Scintya Tobing', 'Balige', '2010-05-09', 'Balige', 'Wanita', 'lima', 'dua', '2021-06-10 13:34:13', '2021-06-10 13:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nama_siswa`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Guru', '-', 'guru@gmail.com', NULL, '$2y$10$LhOcWVaUaBvJL90frtCkZe3SI4BG6XESulu3uIkg.O/dUzSB93dYq', NULL, '2021-06-10 10:33:22', '2021-06-10 11:13:06'),
(2, 'Feronika Simanjuntak', 'Agustina Watijaya', 'feronikasimanjuntak1410@gmail.com', NULL, '$2y$10$Dl8z.DMQ33wEs1Vp.DMXS.itgJFyY/EB3Q1blt5lthltSF8c05Fhi', NULL, '2021-06-10 10:35:23', '2021-06-10 12:05:26'),
(3, 'Feronika Simanjuntak', 'Bunga Mentari', 'feronikasimanjuntak1410@gmail.com', NULL, '$2y$10$lhGDA0o.2QiH.D0H6nKHx.Lwx7jUZPOsSYcEqnHn3UUkMtIg/5ZTq', NULL, '2021-06-10 10:35:42', '2021-06-10 12:05:46'),
(6, 'Scintya Tobing', 'Lala Yoyada', 'scintyaleony25@gmail.com', NULL, '$2y$10$fVA3H.ocdgEYzhLA341r1O0M2Xw1KCH8j.3AVyDQFVv82UVUAaCum', NULL, '2021-06-10 11:20:52', '2021-06-10 12:05:55'),
(7, 'Yanti Hutasoit', 'Yoyo Agus', 'yantihutasoit040@gmail.com', NULL, '$2y$10$h9iMuYWHZ4AuxS2DSe2P8O18GsvgHB1Z230jTyNXhx0Tw8FE/IxUW', NULL, '2021-06-10 11:20:52', '2021-06-10 12:19:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nilai_n_nis_unique` (`n_nis`),
  ADD KEY `nilai_id_users_foreign` (`id_users`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id_users_foreign` (`id_users`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_s_nis_unique` (`s_nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
