-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2022 at 02:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_shortner`
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
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2022_06_02_044638_create_url_shorts_table', 1),
(20, '2014_10_12_000000_create_users_table', 2),
(21, '2022_06_04_100416_create_user_agent_infos_table', 3),
(22, '2022_06_05_131234_create_sessions_table', 4);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `url_shorts`
--

CREATE TABLE `url_shorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `main_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visites` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '30',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `url_shorts`
--

INSERT INTO `url_shorts` (`id`, `user_id`, `main_url`, `short_url`, `visites`, `time`, `created_at`, `updated_at`) VALUES
(26, 1, 'https://codepen.io/kobuxz/pen/mdVpVoj', '5', '0', '30', '2022-06-02 21:09:22', '2022-06-02 21:09:22'),
(27, 4, 'https://codepen.io/kobuxz/pen/mdVpVoj', '5', '0', '30', '2022-06-02 21:10:13', '2022-06-02 21:10:13'),
(28, 4, 'https://github.com/spatie/laravel-analytics', '5', '0', '30', '2022-06-04 11:15:07', '2022-06-04 11:15:07'),
(29, NULL, 'https://www.facebook.com/?stype=lo&jlou=AfdjEHd4O--cMu4W-XqAMMDBJOAqDEL3xQRsHH6aLM-ADJQijAWuHzAcy-It9N4rOzqGm5cJBnvXOcAKdPjWbq-TfZBnIlwpqzxHa59TKmbqfw&smuh=37797&lh=Ac8vTdeKdIM3Vz6rTfM', 'v91ire', '0', '30', '2022-06-05 11:09:19', '2022-06-05 11:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sujan', 'sujan@sujan.com', NULL, '$2y$10$Gs61Xf9La6TsBxi76ICGcuE/xSlGCA3N4.7ZltihHzQSFnwCbfK62', 'admin', NULL, NULL, NULL),
(4, 'rajon', 'bpc@gmail.com', NULL, '$2y$10$B7vy2X3p2hG5pRHq2XnjKeCdHzeI6pzzagWxAit8WZ92n3gACjZa6', 'user', NULL, '2022-06-03 11:34:40', '2022-06-03 11:34:40'),
(5, 'RuinSain', 'ruinSain@gmail.com', NULL, '$2y$10$z.8L2Au4kb/XWmZAfNA9Le5U5sHayNh/AcCRiOLqLrNWOGw4CqdhS', 'user', NULL, '2022-06-04 09:38:42', '2022-06-04 09:38:42'),
(6, 'Rajon', 'rajon@gmail.com', NULL, '$2y$10$TMzfm1.9KjjZFdiXUO2M/eVLtzU1PW668vMIoOUt6OCc7Xp0qfili', 'user', NULL, '2022-06-04 10:30:48', '2022-06-04 10:30:48'),
(7, 'fake', 'fake@gmail.com', NULL, '$2y$10$S/gTC53scoU17c/UFLRqduPBneIwTJ39SHEODknP82CMpHZXa2xsC', 'user', NULL, '2022-06-04 10:56:29', '2022-06-04 10:56:29'),
(8, 'test', 'test@gmail.com', NULL, '$2y$10$Eh97mzyIL7aDJibiNbZg1Ou/KGZv.tenfOuWML2niCBBG8fwO.0U2', 'user', NULL, '2022-06-04 11:06:05', '2022-06-04 11:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_agent_infos`
--

CREATE TABLE `user_agent_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_agent_infos`
--

INSERT INTO `user_agent_infos` (`id`, `ip_address`, `location`, `user_id`, `latitude`, `longitude`, `browser`, `os_name`, `device`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Bangladesh', '4', '23.7272', '90.4093', 'Chrome', 'Linux', 'WebKit', '2022-06-04 10:33:33', '2022-06-04 10:33:33'),
(2, '127.0.0.1', 'Bangladesh', '4', '23.7272', '90.4093', 'Chrome', 'Linux', 'WebKit', '2022-06-04 10:44:48', '2022-06-04 10:44:48'),
(3, '127.0.0.1', 'Bangladesh', '4', '23.7272', '90.4093', 'Chrome', 'Linux', 'WebKit', '2022-06-04 11:12:01', '2022-06-04 11:12:01');

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `url_shorts`
--
ALTER TABLE `url_shorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_agent_infos`
--
ALTER TABLE `user_agent_infos`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `url_shorts`
--
ALTER TABLE `url_shorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_agent_infos`
--
ALTER TABLE `user_agent_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
