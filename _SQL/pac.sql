-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 02:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pac`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'manager1', 'manager1@mail.com', 'asdas', NULL, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', '$2y$10$L/Jgr/TofVbY7oGM53TCTuShtkYt5YMyODJ3Tz7tJ0xAYClXIR4CK', 't9xVOEcYl58kOBjqgWdb2Cn7HQsbYtk4HPbmC1WatQUC4TiJGymbubDIOKel', '2018-01-04 10:54:37', '2018-01-04 10:54:37', NULL),
(3, 'adminsample', 'testadmin@admin.dev', '$2y$10$3LkHRI.SDcqAq8LVCeW9J.mnMDUdT0fiS42w7dosFTOj.MLZ93Vf.', 'tHClcK7KKEY2nHiiyWHsMA78bE2G9j3lwUjccyaNX4QhWf4gr1DEUYPZCMLp', '2018-01-16 05:47:27', '2018-01-16 05:47:27', NULL),
(4, 'myname', 'admin@test.dev', '$2y$10$EpWEN2ZdbZYuffkyBUyb5.pV6QAhDTLqjYj8V/9SfMqaYg74vUKtu', NULL, '2018-01-18 21:51:16', '2018-01-18 21:51:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adventure_type`
--

CREATE TABLE `adventure_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adventure_type`
--

INSERT INTO `adventure_type` (`id`, `type`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `client` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `num_guest` int(11) DEFAULT NULL,
  `payment` float NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` enum('pending.paid','cancelled','done','pending.unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending.unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creditcardz`
--

CREATE TABLE `creditcardz` (
  `id` int(11) NOT NULL,
  `cardnumber` varchar(100) NOT NULL,
  `expiration` varchar(45) NOT NULL,
  `cvv` varchar(5) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcardz`
--

INSERT INTO `creditcardz` (`id`, `cardnumber`, `expiration`, `cvv`, `fname`, `lname`, `balance`) VALUES
(1, '4900000000000086', '12/18', '521', 'Jerwin', 'Espina', 12200),
(2, '5404000000000001', '12/18', '245', 'John', 'Doh', 1634500),
(3, '1200000000000034', '12/18', '036', 'Cesar', 'Guizo', 692500),
(4, '5600000000000078', '12/20', '911', 'Bell', 'Gitz', 21634500);

-- --------------------------------------------------------

--
-- Table structure for table `crews`
--

CREATE TABLE `crews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` enum('manager','','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manager',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2017_12_01_111435_packages', 3),
(9, '2017_12_06_151044_bookings_table', 4),
(10, '2017_12_09_090912_create_comments_table', 5),
(11, '2017_12_09_091429_create_managers_table', 6),
(12, '2017_12_21_112533_create_images_table', 7),
(13, '2017_12_21_180613_package_inclusions_table', 8),
(14, '2017_12_21_194447_create_package_videos_table', 9),
(15, '2017_12_30_184749_add_deleteattable', 10),
(16, '2017_12_31_031721_usermessagestable', 11),
(17, '2018_01_04_175452_create_admins_table', 11),
(18, '2018_01_04_175453_create_admin_password_resets_table', 11),
(19, '2018_01_04_195154_create_adventurers_table', 12),
(20, '2018_01_04_195155_create_adventurer_password_resets_table', 12),
(21, '2018_01_12_093131_create_adminnotifstable', 13),
(22, '2018_01_14_135354_create_superadmins_table', 14),
(23, '2018_01_14_135355_create_superadmin_password_resets_table', 14),
(24, '2018_01_16_111424_create_notifications_table', 14),
(25, '2018_01_19_230805_adt', 15),
(26, '2018_01_17_063920_atat', 16),
(27, '2018_01_17_064243_atat2', 16),
(28, '2018_01_21_204927_create_tt_prices', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `difficulty` enum('easy','medium','hard','hardcore') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adventure_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adventurer_limit` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_content`
--

CREATE TABLE `package_content` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_images`
--

CREATE TABLE `package_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `imagename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_inclusions`
--

CREATE TABLE `package_inclusions` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `included_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_reviews`
--

CREATE TABLE `package_reviews` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_videos`
--

CREATE TABLE `package_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_thumbimg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) UNSIGNED NOT NULL,
  `price_per` float NOT NULL,
  `person_count` int(10) NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `is_display` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('superadmin','','','') NOT NULL DEFAULT 'superadmin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin_password_resets`
--

CREATE TABLE `superadmin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userabout` text COLLATE utf8mb4_unicode_ci,
  `latagawpoints` float NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` enum('client','','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_fullname`, `email`, `password`, `birthdate`, `gender`, `address`, `phone`, `userabout`, `latagawpoints`, `avatar`, `usertype`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(47, 'Mang Sabongay', 'paclatagaw@gmail.com', '$2y$10$I5tbzG3lBKob78e7hPnA5.UXgqyrbdvl70NYFv105PGT2Bdv/OKlu', NULL, NULL, NULL, NULL, NULL, 0, '153492068732698.jpg', 'client', 'ep5YMsG0Koi8ulLrhnaLT89Bzc8uJEQ8TG5PAbDOvxgLYi7a1w442Iw87aT3', '2018-01-16 07:23:44', '2018-01-16 07:23:44', NULL),
(48, 'adv adv2', 'adv@test.com', '$2y$10$4MFMrbAiMXn1uNEQHKIv.uWIXxQv5w/0yWqpYlm5xw68RWIYmapHe', 'February 18 1981', NULL, NULL, NULL, NULL, 0, NULL, 'client', NULL, '2018-01-19 04:01:13', '2018-01-19 04:01:13', NULL),
(49, '', 'adv@test.dev', '$2y$10$YS2BWYA9wxRKeUbLY1b.T.nn9CsKZTD.xFAxVvLGWTdR4Ggj2eW3G', 'January 17 1972', NULL, NULL, NULL, NULL, 0, NULL, 'client', 'iM4ZpGCadl65WSOOTWrJykmIlQg5YK4cZqtMuy42x7s1YnHNHpZo5VFo3yFC', '2018-01-20 05:00:42', '2018-01-20 05:00:42', NULL),
(50, '', 'adv2@test.dev', '$2y$10$d6UoY49BRj1n13TaqtOgz.mIU5fqQg4DlNZOBG6nQMCZFPB5zVQO.', 'January 3 1987', NULL, NULL, NULL, NULL, 0, NULL, 'client', NULL, '2018-01-20 10:28:16', '2018-01-20 10:28:16', NULL),
(51, '', 'adv3@test.dev', '$2y$10$bWlQvMtzgnpD7R22bK3wOOyjxlh4PEU5mLtSw0Ta3XU1y/cAxzseu', 'January 3 1987', NULL, NULL, NULL, NULL, 0, NULL, 'client', NULL, '2018-01-20 10:29:44', '2018-01-20 10:29:44', NULL),
(52, '', 'adv4@test.dev', '$2y$10$.Pj.AVWu3EeMMz6LcrhBQ.tihLEdLfqhvXGDBiep2gX8yqraI.FIS', 'January 3 1987', NULL, NULL, NULL, NULL, 0, NULL, 'client', 'D4435XNBushLznh0SySR205FIglxcPPgAsEAJo2U0D775EzkQsVp7Tkj5d12', '2018-01-20 10:32:21', '2018-01-20 10:32:21', NULL),
(53, '', 'aws@dev.test', '$2y$10$kZ0cWLeK/YyJsUT/NRhX/uuudyDP0T/mPDVgwE9H751tlcMWLk9Wu', 'February 2 1978', NULL, NULL, NULL, NULL, 0, NULL, 'client', NULL, '2018-01-20 10:34:09', '2018-01-20 10:34:09', NULL),
(54, '', 'aws2@dev.test', '$2y$10$sKN5plFXh5lvXNt0rE/Sh.4yF0XpHA2N0vDYCT4qKC3HZqsx5HnfS', 'February 2 1978', NULL, NULL, NULL, NULL, 0, NULL, 'client', 'UyqLUhsbG4UPmrv3R7yETZxpIFfTGo6lWpoavIZvco9z9OYUORoUuccdZqKH', '2018-01-20 10:36:20', '2018-01-20 10:36:20', NULL),
(55, '', 'qwewq@mail.com', '$2y$10$yoewLr.X2agC693NxSU57u77opn9m3FoSq1CBCQOgRZHdXM0bDiX2', 'February 2 1989', NULL, NULL, NULL, NULL, 0, NULL, 'client', NULL, '2018-01-20 10:37:10', '2018-01-20 10:37:10', NULL),
(56, '', 'wew@test.dev', '$2y$10$wdU9MP0EjWwy7valT6gJoeYTESL4Wzcj/EBnTWjTYVxALx.P4MMgS', 'February 12 1989', NULL, NULL, NULL, NULL, 0, NULL, 'client', 'jnzRCak0RRGGbjdtnD2DrJe3fXDQvXJrrBA3NOqecACqgEIkljxeLYEXOIfl', '2018-01-22 11:24:29', '2018-01-22 11:24:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `adventure_type`
--
ALTER TABLE `adventure_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditcardz`
--
ALTER TABLE `creditcardz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crews`
--
ALTER TABLE `crews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_content`
--
ALTER TABLE `package_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_images`
--
ALTER TABLE `package_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_inclusions`
--
ALTER TABLE `package_inclusions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_reviews`
--
ALTER TABLE `package_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_videos`
--
ALTER TABLE `package_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `superadmins_email_unique` (`email`);

--
-- Indexes for table `superadmin_password_resets`
--
ALTER TABLE `superadmin_password_resets`
  ADD KEY `superadmin_password_resets_email_index` (`email`),
  ADD KEY `superadmin_password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adventure_type`
--
ALTER TABLE `adventure_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `creditcardz`
--
ALTER TABLE `creditcardz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `crews`
--
ALTER TABLE `crews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `package_content`
--
ALTER TABLE `package_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `package_images`
--
ALTER TABLE `package_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `package_inclusions`
--
ALTER TABLE `package_inclusions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `package_reviews`
--
ALTER TABLE `package_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package_videos`
--
ALTER TABLE `package_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
