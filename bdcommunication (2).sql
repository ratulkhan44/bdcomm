-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 06:37 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcommunication`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `business_type`, `created_at`, `updated_at`) VALUES
(1, 'Bank', '2019-11-19 10:20:58', '2019-11-19 11:27:52'),
(2, 'Multinational', '2019-11-19 11:31:56', '2019-11-19 11:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_client`
--

CREATE TABLE `campaign_client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `citycorps`
--

CREATE TABLE `citycorps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citycorps`
--

INSERT INTO `citycorps` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka South', 1, '2019-11-19 08:47:32', '2019-11-19 08:50:08'),
(2, 'Dhaka North', 1, '2019-11-19 08:48:38', '2019-11-19 08:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` bigint(20) NOT NULL,
  `alter_contact` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-11-19 03:09:15', '2019-11-19 03:09:15'),
(2, 'Gazipur', 1, '2019-11-19 04:11:03', '2019-11-19 04:11:03'),
(3, 'Munshiganj', 1, '2019-11-19 04:14:42', '2019-11-19 04:14:42'),
(4, 'Comilla', 2, '2019-11-19 04:15:42', '2019-11-19 04:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2019-11-19 01:29:30', '2019-11-19 01:29:30'),
(2, 'Chittagong', '2019-11-19 01:47:55', '2019-11-19 01:47:55'),
(3, 'Khulna', '2019-11-19 01:50:06', '2019-11-19 01:50:06'),
(4, 'Barisal', '2019-11-19 02:19:35', '2019-11-19 02:24:11');

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
(3, '2019_11_12_180846_create_roles_table', 1),
(4, '2019_11_13_105419_create_divisions_table', 1),
(5, '2019_11_13_105457_create_districts_table', 1),
(6, '2019_11_13_105958_create_upazillas_table', 1),
(7, '2019_11_13_120220_create_pourosavas_table', 1),
(8, '2019_11_13_120307_create_citycorps_table', 1),
(9, '2019_11_15_230108_create_clients_table', 1),
(10, '2019_11_18_102424_create_permanent_addresses_table', 1),
(11, '2019_11_18_102657_create_present_addresses_table', 1),
(12, '2019_11_18_102750_create_profession_types_table', 1),
(13, '2019_11_18_102815_create_professionals_table', 1),
(14, '2019_11_18_102905_create_business_types_table', 1),
(15, '2019_11_18_102919_create_professions_table', 1),
(16, '2019_11_18_103000_create_political_views_table', 1),
(17, '2019_11_18_103142_create_wings_table', 1),
(18, '2019_11_18_103203_create_units_table', 1),
(19, '2019_11_18_103225_create_posts_table', 1),
(20, '2019_11_18_103304_create_politicals_table', 1),
(21, '2019_11_18_103328_create_texts_table', 1),
(22, '2019_11_18_103355_create_campaigns_table', 1),
(23, '2019_11_18_104012_create_campaign_client_table', 1);

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
-- Table structure for table `permanent_addresses`
--

CREATE TABLE `permanent_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `upazilla_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pourosava_id` bigint(20) UNSIGNED DEFAULT NULL,
  `citycorp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `politicals`
--

CREATE TABLE `politicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `political_view_id` bigint(20) UNSIGNED DEFAULT NULL,
  `wing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `political_views`
--

CREATE TABLE `political_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `political_view` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `political_views`
--

INSERT INTO `political_views` (`id`, `political_view`, `created_at`, `updated_at`) VALUES
(1, 'AL', '2019-11-19 10:36:38', '2019-11-19 11:29:00'),
(2, 'BNP', '2019-11-19 11:32:22', '2019-11-19 11:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `created_at`, `updated_at`) VALUES
(1, 'President', '2019-11-19 11:14:10', '2019-11-19 11:30:12'),
(2, 'Member', '2019-11-19 11:33:23', '2019-11-19 11:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `pourosavas`
--

CREATE TABLE `pourosavas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pourosavas`
--

INSERT INTO `pourosavas` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Savar Municipality', 1, '2019-11-19 07:38:20', '2019-11-19 07:38:20'),
(2, 'Dohar Municipality', 1, '2019-11-19 07:40:44', '2019-11-19 07:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `present_addresses`
--

CREATE TABLE `present_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `upazilla_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pourosava_id` bigint(20) UNSIGNED DEFAULT NULL,
  `citycorp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `professional`, `created_at`, `updated_at`) VALUES
(1, 'Engineer', '2019-11-19 09:56:02', '2019-11-19 11:28:15'),
(2, 'Doctor', '2019-11-19 11:31:10', '2019-11-19 11:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profession_type_id` bigint(20) UNSIGNED NOT NULL,
  `professional_id` bigint(20) UNSIGNED NOT NULL,
  `business_type_id` bigint(20) UNSIGNED NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profession_types`
--

CREATE TABLE `profession_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profession_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profession_types`
--

INSERT INTO `profession_types` (`id`, `profession_type`, `created_at`, `updated_at`) VALUES
(1, 'Business', '2019-11-19 09:41:42', '2019-11-19 11:28:39'),
(2, 'Service', '2019-11-19 11:30:43', '2019-11-19 11:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Officestaff', 'officestaff', NULL, NULL),
(3, 'Dataentry', 'dataentry', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Thana Committee', '2019-11-19 11:00:22', '2019-11-19 11:29:55'),
(2, 'Zilla Committee', '2019-11-19 11:32:58', '2019-11-19 11:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazillas`
--

INSERT INTO `upazillas` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Dohar', 1, '2019-11-19 05:33:10', '2019-11-19 05:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `user_id`, `email`, `user_type`, `contact`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 11111, 'admin@admin.com', 'Admin', 99999, NULL, '$2y$10$YpxM02UffsnFqhdH59yIP.yN/OhjubmwkuyDeXYKTeQVapHIUqmHC', NULL, NULL, NULL),
(2, 'Office Staff', 2, 22222, 'staff@staff.com', 'Office Staff', 66666, NULL, '$2y$10$s4DXRqRPUhHpuVNUkCb0ZOOP4kX4kc5CctVV.ZB6cZh6nn5bEUyOm', NULL, NULL, NULL),
(3, 'Data Entry', 3, 33333, 'entry@entry.com', 'Data Entry', 44444, NULL, '$2y$10$UIb2sgydhv9B3e4VAuqjeeXXQW9Q.w0lE3JIUa7tfMC8p.I1G456O', NULL, NULL, NULL),
(4, 'ratul khan', 2, 12222, 'ratul.khan@gmail.com', 'Data Entry', 322244, NULL, '$2y$10$xLTp7tm88iw.epR9oqjHz.YcWWB7GXLkPiajaGn2zq6XA02U6nY36', NULL, '2019-11-19 05:01:15', '2019-11-19 05:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `wings`
--

CREATE TABLE `wings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wings`
--

INSERT INTO `wings` (`id`, `wing`, `created_at`, `updated_at`) VALUES
(1, 'Chatro League', '2019-11-19 10:47:29', '2019-11-19 11:29:16'),
(2, 'Chatrodol', '2019-11-19 11:32:40', '2019-11-19 11:32:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaigns_text_id_foreign` (`text_id`),
  ADD KEY `campaigns_user_id_foreign` (`user_id`);

--
-- Indexes for table `campaign_client`
--
ALTER TABLE `campaign_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_client_campaign_id_foreign` (`campaign_id`),
  ADD KEY `campaign_client_client_id_foreign` (`client_id`);

--
-- Indexes for table `citycorps`
--
ALTER TABLE `citycorps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citycorps_name_unique` (`name`),
  ADD KEY `citycorps_division_id_foreign` (`division_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_contact_unique` (`contact`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_alter_contact_unique` (`alter_contact`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_name_unique` (`name`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
-- Indexes for table `permanent_addresses`
--
ALTER TABLE `permanent_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permanent_addresses_division_id_foreign` (`division_id`),
  ADD KEY `permanent_addresses_district_id_foreign` (`district_id`),
  ADD KEY `permanent_addresses_upazilla_id_foreign` (`upazilla_id`),
  ADD KEY `permanent_addresses_pourosava_id_foreign` (`pourosava_id`),
  ADD KEY `permanent_addresses_citycorp_id_foreign` (`citycorp_id`),
  ADD KEY `permanent_addresses_client_id_foreign` (`client_id`);

--
-- Indexes for table `politicals`
--
ALTER TABLE `politicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `politicals_political_view_id_foreign` (`political_view_id`),
  ADD KEY `politicals_wing_id_foreign` (`wing_id`),
  ADD KEY `politicals_unit_id_foreign` (`unit_id`),
  ADD KEY `politicals_post_id_foreign` (`post_id`);

--
-- Indexes for table `political_views`
--
ALTER TABLE `political_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pourosavas`
--
ALTER TABLE `pourosavas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pourosavas_district_id_foreign` (`district_id`);

--
-- Indexes for table `present_addresses`
--
ALTER TABLE `present_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `present_addresses_division_id_foreign` (`division_id`),
  ADD KEY `present_addresses_district_id_foreign` (`district_id`),
  ADD KEY `present_addresses_upazilla_id_foreign` (`upazilla_id`),
  ADD KEY `present_addresses_pourosava_id_foreign` (`pourosava_id`),
  ADD KEY `present_addresses_citycorp_id_foreign` (`citycorp_id`),
  ADD KEY `present_addresses_client_id_foreign` (`client_id`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professions_profession_type_id_foreign` (`profession_type_id`),
  ADD KEY `professions_professional_id_foreign` (`professional_id`),
  ADD KEY `professions_business_type_id_foreign` (`business_type_id`);

--
-- Indexes for table `profession_types`
--
ALTER TABLE `profession_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazillas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_unique` (`contact`);

--
-- Indexes for table `wings`
--
ALTER TABLE `wings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaign_client`
--
ALTER TABLE `campaign_client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `citycorps`
--
ALTER TABLE `citycorps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permanent_addresses`
--
ALTER TABLE `permanent_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `politicals`
--
ALTER TABLE `politicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `political_views`
--
ALTER TABLE `political_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pourosavas`
--
ALTER TABLE `pourosavas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `present_addresses`
--
ALTER TABLE `present_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profession_types`
--
ALTER TABLE `profession_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wings`
--
ALTER TABLE `wings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_text_id_foreign` FOREIGN KEY (`text_id`) REFERENCES `texts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `campaigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `campaign_client`
--
ALTER TABLE `campaign_client`
  ADD CONSTRAINT `campaign_client_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `campaign_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `citycorps`
--
ALTER TABLE `citycorps`
  ADD CONSTRAINT `citycorps_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permanent_addresses`
--
ALTER TABLE `permanent_addresses`
  ADD CONSTRAINT `permanent_addresses_citycorp_id_foreign` FOREIGN KEY (`citycorp_id`) REFERENCES `citycorps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permanent_addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permanent_addresses_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permanent_addresses_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permanent_addresses_pourosava_id_foreign` FOREIGN KEY (`pourosava_id`) REFERENCES `pourosavas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permanent_addresses_upazilla_id_foreign` FOREIGN KEY (`upazilla_id`) REFERENCES `upazillas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `politicals`
--
ALTER TABLE `politicals`
  ADD CONSTRAINT `politicals_political_view_id_foreign` FOREIGN KEY (`political_view_id`) REFERENCES `political_views` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `politicals_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `politicals_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `politicals_wing_id_foreign` FOREIGN KEY (`wing_id`) REFERENCES `wings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pourosavas`
--
ALTER TABLE `pourosavas`
  ADD CONSTRAINT `pourosavas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `present_addresses`
--
ALTER TABLE `present_addresses`
  ADD CONSTRAINT `present_addresses_citycorp_id_foreign` FOREIGN KEY (`citycorp_id`) REFERENCES `citycorps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `present_addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `present_addresses_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `present_addresses_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `present_addresses_pourosava_id_foreign` FOREIGN KEY (`pourosava_id`) REFERENCES `pourosavas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `present_addresses_upazilla_id_foreign` FOREIGN KEY (`upazilla_id`) REFERENCES `upazillas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `professions`
--
ALTER TABLE `professions`
  ADD CONSTRAINT `professions_business_type_id_foreign` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `professions_profession_type_id_foreign` FOREIGN KEY (`profession_type_id`) REFERENCES `profession_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `professions_professional_id_foreign` FOREIGN KEY (`professional_id`) REFERENCES `professionals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD CONSTRAINT `upazillas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
