-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2018 at 12:01 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastpod`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_22_005856_create_school_year_table', 1),
(4, '2017_10_22_010027_create_contacts_table', 1),
(5, '2017_10_22_010027_create_offenses_table', 1),
(6, '2017_10_22_010027_create_sections_table', 1),
(7, '2017_10_22_010150_create_students_table', 1),
(8, '2017_10_22_010354_create_violations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE `offenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commit` datetime NOT NULL,
  `violation_id` int(11) NOT NULL,
  `student_offense` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolyear_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offenses`
--

INSERT INTO `offenses` (`id`, `student_id`, `date_commit`, `violation_id`, `student_offense`, `sanction`, `description`, `schoolyear_id`, `semester_id`, `class_id`, `created_at`, `updated_at`) VALUES
(1, '11111', '2018-02-04 11:14:00', 1, 'Cuttings', 'asvdasd', 'avsdas', '1', '2', '1', '2018-02-03 11:13:25', '2018-02-03 11:13:25'),
(2, '11111', '2018-02-04 17:00:00', 1, 'Cuttings', 'avsdasd', 'wavdasd', '1', '2', '2', '2018-02-03 11:14:22', '2018-02-03 11:14:22'),
(3, '11111', '2018-02-05 11:45:00', 1, 'Cuttings', 'avsdasd', 'asdvasd', '1', '1', '2', '2018-02-03 11:15:48', '2018-02-03 11:15:48'),
(4, '70', '2018-02-04 12:00:00', 2, 'Smokings', 'asvdasd', 'asdvas', 'Jack', NULL, NULL, '2018-02-03 11:31:44', '2018-02-03 11:31:44'),
(5, '70', '2018-02-04 11:59:00', 2, 'Smokings', 'asvdasd', 'asdvas', 'Jack', NULL, NULL, '2018-02-03 11:32:41', '2018-02-03 11:32:41'),
(6, '9', '2018-02-05 10:00:00', 2, 'Smokings', 'dasvdasd', 'asdvasd', 'Jin', NULL, NULL, '2018-02-03 11:33:48', '2018-02-03 11:33:48'),
(7, '6', '2018-02-04 11:44:00', 3, 'Cutting Classes', 'asvdasd', 'avsdsa', '3', NULL, NULL, '2018-02-03 11:45:39', '2018-02-03 11:45:39');

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
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `school_year`, `group_id`, `created_at`, `updated_at`) VALUES
(1, '2017-2018', '1', '2018-02-03 11:12:05', '2018-02-03 11:12:05'),
(2, '2017-2018', '2', '2018-02-03 11:30:37', '2018-02-03 11:30:37'),
(3, '2017-2018', '3', '2018-02-03 11:43:24', '2018-02-03 11:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `grade`, `section`, `group_id`, `created_at`, `updated_at`) VALUES
(1, '11', 'Borguss', '1', '2018-02-03 10:39:21', '2018-02-03 10:39:21'),
(2, '7', 'Makata', '2', '2018-02-03 11:30:25', '2018-02-03 11:30:25'),
(3, '9', 'MANILA', '2', '2018-02-03 11:32:19', '2018-02-03 11:32:19'),
(4, '3', 'Duriane', '3', '2018-02-03 11:43:11', '2018-02-03 11:43:11'),
(5, '4', 'Atis', '3', '2018-02-03 11:44:53', '2018-02-03 11:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sy_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adviser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `sy_id`, `first_name`, `middle_name`, `last_name`, `adviser`, `section_id`, `semester`, `class`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '11111', '1', 'waesd', 'avsda', 'asvd', 'asdasd', '1', '1', '2', '1', NULL, '2018-02-03 11:12:27', '2018-02-03 11:14:50'),
(2, '70', '2', 'Jack', 'The', 'Slayer', 'avdsdas', '2', NULL, NULL, '2', NULL, '2018-02-03 11:31:14', '2018-02-03 11:31:14'),
(3, '9', '2', 'Jin', 'K.', 'Kazama', 'David', '3', NULL, NULL, '2', NULL, '2018-02-03 11:33:25', '2018-02-03 11:33:25'),
(4, '6', '3', 'Shar', 'Sha', 'Shaq', 'asdvasd', '4', NULL, NULL, '3', NULL, '2018-02-03 11:44:16', '2018-02-03 11:44:16'),
(5, '7', '3', 'adsa', 'dasvda', 'asdd', 'asdasd', '5', NULL, NULL, '3', NULL, '2018-02-03 11:45:08', '2018-02-03 11:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('administrator','staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `group_id`, `role`, `upload`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'senioradmin', 'prefect@gmail.com', '$2y$10$DEXz3Vp7f1LB12O4cH01SOUuodDHpWf.QyoymvNFpAi6ZnosSPsbW', '1', 'administrator', NULL, 'ZV4j2lwxBJJDiN8Yc9lOrGwXL7zy5eSntaJR5e8tCswp9fV3jQBWMwEFsvgx', '2018-02-03 10:34:48', '2018-02-03 10:34:48'),
(2, 'junioradmin', 'prefect2@gmail.com', '$2y$10$EadzgpWB/zGnwJIN3rAZ..Or7Zr1nDaYdQB.O.r3j8DZExA50zkFS', '2', 'administrator', NULL, 'R9EGiVAWIAf1mF3HCR17rUh7IDbh38YlD6F5e0bqJlOqF67Tx6VvDWviPbJj', '2018-02-03 10:34:48', '2018-02-03 10:34:48'),
(3, 'elemadmin', 'prefect3@gmail.com', '$2y$10$lXvgAXpR5yfkbD8wPLR7FugZmv/xL4lA1Fhpg1cm./ns9xrurxpMS', '3', 'administrator', NULL, 'jwVtKIHwiN', '2018-02-03 10:34:48', '2018-02-03 10:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` int(10) UNSIGNED NOT NULL,
  `violation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourth_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fifth_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sixth_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seventh_sanction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`id`, `violation`, `category`, `first_sanction`, `second_sanction`, `third_sanction`, `fourth_sanction`, `fifth_sanction`, `sixth_sanction`, `seventh_sanction`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Cuttings', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2018-02-03 10:38:28', '2018-02-03 10:43:56'),
(2, 'Smokings', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2018-02-03 11:29:56', '2018-02-03 11:30:02'),
(3, 'Cutting Classes', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '2018-02-03 11:42:54', '2018-02-03 11:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offenses`
--
ALTER TABLE `offenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `offenses`
--
ALTER TABLE `offenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
