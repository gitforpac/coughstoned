-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2017 at 06:51 AM
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
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL,
  `notification_title` text NOT NULL,
  `notification_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `client` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `guest` int(11) NOT NULL,
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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `package_id`, `comment`, `created_at`, `updated_at`) VALUES
(39, 1, 1, 'hehe', '2017-12-22 12:47:28', '2017-12-22 12:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `crews`
--

CREATE TABLE `crews` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `profile_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` enum('manager','','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manager'
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
(15, '2017_12_30_184749_add_deleteattable', 10);

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
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `location`, `longitude`, `latitude`, `difficulty`, `price`, `description`, `thumb_img`, `itinerary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(57, 'Osmena Peak Trekking', 'Dalaguete, Osmena Peak, Cebu', 2342.512, 213.12, 'easy', 3333, 'This will be fun as fuck u guys', 'bg_1514654042.jpg', '', '2017-12-25 06:10:20', '2017-12-30 10:59:54', '2017-12-30 10:59:54'),
(59, 'qwewqe', 'qwewqe', 123.9174, 10.3671, 'medium', 123123, 'qweqwewq', 'falls_1514657679.jpg', '', '2017-12-30 10:14:39', '2017-12-30 15:11:38', '2017-12-30 15:11:38'),
(60, 'qweqwewq', 'eqweqweq', 123.9174, 10.3671, 'medium', 12312312, 'qweqweqwe', 'trekking_1514657862.jpg', '', '2017-12-30 10:17:42', '2017-12-30 15:21:38', '2017-12-30 15:21:38'),
(61, 'qweqwewq', 'eqweqweq', 123.9174, 10.3671, 'medium', 12312312, 'qweqweqwe', 'trekking_1514657879.jpg', '', '2017-12-30 10:17:59', '2017-12-30 10:57:59', '2017-12-30 10:57:59'),
(62, 'Oslob Whale Shark Watching', 'Oslob, Cebu', 2342.512, 213.12, 'easy', 6000, '<p>Get up close with the world&rsquo;s largest fish the whale sharks, the gentle giants in Oslob Cebu Philippines. Swimming with a whale shark is a unique wildlife interaction that will last forever. Whale shark watching is one of the most popular Cebu tour package we offer along with Sumilon island day tour package that maximize your time enjoying Oslob&rsquo;s top tourist spots.</p>', 'Whale-Shark-flipped-1500x1000_1514664496.jpg', '', '2017-12-30 11:17:39', '2017-12-30 14:57:19', NULL),
(63, 'Kawasan Falls Day Tour', 'Badian, 6031 Cebu', 2342.512, 213.12, 'easy', 2500, '<p>Kawasan Falls in Badian, Cebu<br />\nkawasan falls Cebu is a peaceful natural place where you can enjoy many waterfalls of natural spring water located near the southern tip of Cebu Philippines..<br />\nA gentle hush of rushing ice cool water.. All this and more in Badian&rsquo;s Kawasan Falls!</p>', 'IMG_3688-1_1514670322.jpg', '<ul>\n	<li>5:00 AM &ndash; Pick up Hotel</li>\n	<li>8:00 AM &ndash; Arrival in Oslob /&nbsp;Light Breakfast</li>\n	<li>8:30 AM &ndash; Whale Shark Watching / Snorkeling</li>\n	<li>9:30 AM &ndash; Cool Down at Tumalog Falls</li>\n	<li>11:00 AM &ndash; Set Lunch</li>\n	<li>12:00 PM &ndash; Departure to Kawasan Falls</li>\n	<li>2:00 PM &ndash; Swimming at Kawasan Falls</li>\n	<li>4:00 PM &ndash; Depart back to hotel</li>\n	<li>7:00 PM &ndash; Estimated arrival in Hotel</li>\n</ul>', '2017-12-30 13:45:22', '2017-12-30 14:22:50', NULL),
(64, 'qweqweqw', 'eqweqwe', 123.9174, 10.3671, 'easy', 12312, '<p>qeqweqweqwe</p>', 'IMG_3688-1_1514674147.jpg', NULL, '2017-12-30 14:49:08', '2017-12-30 14:49:20', '2017-12-30 14:49:20'),
(65, 'qweqweqw', 'eqweqwe', 123.9174, 10.3671, 'easy', 12312, '<p>qeqweqweqwe</p>', 'IMG_3688-1_1514674436.jpg', NULL, '2017-12-30 14:53:56', '2017-12-30 14:57:30', '2017-12-30 14:57:30');

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

--
-- Dumping data for table `package_content`
--

INSERT INTO `package_content` (`id`, `package_id`, `title`, `content`) VALUES
(5, 57, 'Age', 'This Adventure is for ages 12-65'),
(6, 58, 'Age', 'This Adventure is for ages 12-65 hehe');

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

--
-- Dumping data for table `package_images`
--

INSERT INTO `package_images` (`id`, `package_id`, `imagename`, `created_at`, `updated_at`) VALUES
(20, 58, '17155597_579126658959965_2379386275546084839_n_1514477768.jpg', '2017-12-28 08:16:08', '2017-12-28 08:16:08'),
(21, 58, 'alegria_cebu-001_1514477768.jpg', '2017-12-28 08:16:08', '2017-12-28 08:16:08'),
(22, 58, 'Canyoneering1_1514477768.jpg', '2017-12-28 08:16:08', '2017-12-28 08:16:08'),
(23, 58, 'Canyoneering-featured-image_1514477768.jpg', '2017-12-28 08:16:08', '2017-12-28 08:16:08'),
(24, 58, 'news3---canyoneering-1_ting_1514477768.jpg', '2017-12-28 08:16:08', '2017-12-28 08:16:08'),
(25, 57, 'bg_1514655474.jpg', '2017-12-30 09:37:54', '2017-12-30 09:37:54'),
(26, 57, 'can_1514655474.jpg', '2017-12-30 09:37:54', '2017-12-30 09:37:54'),
(27, 57, 'falls_1514655474.jpg', '2017-12-30 09:37:54', '2017-12-30 09:37:54'),
(78, 62, '2_1514664829.jpg', '2017-12-30 12:13:49', '2017-12-30 12:13:49'),
(79, 62, 'lamave_1514664829.jpg', '2017-12-30 12:13:49', '2017-12-30 12:13:49'),
(80, 62, 'maxresdefault_1514664829.jpg', '2017-12-30 12:13:49', '2017-12-30 12:13:49'),
(81, 62, 'oslob_whaleshark_watching_1514664829.jpg', '2017-12-30 12:13:49', '2017-12-30 12:13:49'),
(82, 62, 'oslob-whale-shark-watching_1514664829.jpg', '2017-12-30 12:13:49', '2017-12-30 12:13:49'),
(83, 62, 'whale-shark-watching-in-oslob-package_1514664829.png', '2017-12-30 12:13:49', '2017-12-30 12:13:49');

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

--
-- Dumping data for table `package_inclusions`
--

INSERT INTO `package_inclusions` (`id`, `package_id`, `included_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 57, 'Lunch', '2017-12-25 06:10:20', '2017-12-25 06:10:20', NULL),
(22, 58, 'Lunch', '2017-12-25 06:15:52', '2017-12-25 06:15:52', NULL),
(23, 58, 'Dinner', '2017-12-25 06:15:52', '2017-12-25 06:15:52', NULL),
(24, 58, 'Transportation', '2017-12-25 06:15:52', '2017-12-25 06:15:52', NULL),
(25, 58, 'Equipments', '2017-12-25 06:15:52', '2017-12-25 06:15:52', NULL),
(54, 57, 'w1', '2017-12-30 11:00:41', '2017-12-30 11:00:41', NULL),
(55, 57, 'd2', '2017-12-30 11:00:48', '2017-12-30 11:00:48', NULL),
(63, 62, 'One Day Tour (see Tour Duration above based on pick up location)', '2017-12-30 12:11:21', '2017-12-30 12:11:21', NULL),
(64, 62, 'Local facilitator and Guide', '2017-12-30 12:11:33', '2017-12-30 12:11:33', NULL),
(65, 62, 'Light breakfast upon arrival in Oslob', '2017-12-30 12:11:39', '2017-12-30 12:11:39', NULL),
(66, 62, 'Lunch with one round of drinks (Soft drinks or bottled mineral water)', '2017-12-30 12:11:47', '2017-12-30 12:11:47', NULL),
(67, 63, 'Private Tour (14 hours Duration)', '2017-12-30 13:46:42', '2017-12-30 13:46:42', NULL),
(68, 63, 'Local Facilitator and Guide', '2017-12-30 13:46:50', '2017-12-30 13:46:50', NULL),
(69, 63, 'Native Light Breakfast', '2017-12-30 13:46:56', '2017-12-30 13:46:56', NULL),
(70, 63, 'Lunch with one round of drinks (Soft drinks or bottled mineral water)', '2017-12-30 13:47:06', '2017-12-30 13:47:06', NULL),
(71, 63, 'Entrance and watching fees', '2017-12-30 13:47:07', '2017-12-30 13:47:07', NULL);

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

--
-- Dumping data for table `package_videos`
--

INSERT INTO `package_videos` (`id`, `package_id`, `video_link`, `video_thumbimg`, `created_at`, `updated_at`) VALUES
(1, 57, 'https://vimeo.com/247746169', 'v1.webp', NULL, NULL),
(2, 58, 'https://vimeo.com/248067419', 'AnkaZhuvleva_1514472375.jpg', '2017-12-28 06:46:15', '2017-12-28 06:46:15'),
(3, 57, 'https://vimeo.com/239929490', '516141dbbfed58.98017247_1514472389.jpg', '2017-12-28 06:46:29', '2017-12-28 06:46:29'),
(4, 57, 'https://vimeo.com/210459179', 'jill_by_koyorin-dalp45p_1514472401.jpg', '2017-12-28 06:46:41', '2017-12-28 06:46:41');

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
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user` int(11) NOT NULL,
  `role` enum('client','manager','superadmin','') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user`, `role`) VALUES
(18, 'client');

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

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `package_id`, `date`, `created_at`, `updated_at`) VALUES
(17, 58, '2017-12-29', '2017-12-25 06:15:52', '2017-12-25 06:15:52'),
(41, 62, '2017-12-31', '2017-12-30 11:20:07', '2017-12-30 11:20:07'),
(42, 62, '2018-01-29', '2017-12-30 11:20:12', '2017-12-30 11:20:12'),
(44, 63, '2018-01-03', '2017-12-30 13:47:18', '2017-12-30 13:47:18'),
(45, 63, '2018-01-02', '2017-12-30 13:58:10', '2017-12-30 13:58:10');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userabout` text COLLATE utf8mb4_unicode_ci,
  `latagawpoints` float NOT NULL DEFAULT '0',
  `usertype` enum('client','','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthdate`, `gender`, `address`, `phone`, `userabout`, `latagawpoints`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Mang Sabongay', 'paclatagaw@gmail.com', '$2y$10$7v52ZNWeKzYx.Xq.hfHuJ..ZqnkZ2xMwNDVHRWKgD.CWWIIQLxfpq', 'Month', 'male', NULL, NULL, NULL, 0, 'client', 'ULx0tRk5BZtQtxXmcAFUNciekNnNmvNLYVOMzQGG7LGD2Z2s5Wu2h5kzaGkA', '2017-12-09 05:34:12', '2017-12-22 11:14:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `package_content`
--
ALTER TABLE `package_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `package_images`
--
ALTER TABLE `package_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `package_inclusions`
--
ALTER TABLE `package_inclusions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `package_reviews`
--
ALTER TABLE `package_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package_videos`
--
ALTER TABLE `package_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
