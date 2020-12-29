-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 12:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paidleavy`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'D3757', 'IT', '2020-12-09 06:37:24', '2020-12-11 00:56:33'),
(2, 'D1589', 'Management', '2020-12-09 06:37:31', '2020-12-09 06:37:31'),
(3, 'D1067', 'Accounting', '2020-12-09 06:37:37', '2020-12-09 06:37:37'),
(4, 'D3993', 'Marketing', '2020-12-09 06:37:44', '2020-12-09 06:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `date_of_entry` date NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_balance` int(11) NOT NULL DEFAULT 12,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `employee_id`, `date_of_entry`, `department`, `position`, `status`, `leave_balance`, `path`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ellwan Edy Wei', 1931035, '2001-08-16', 'Management', 'Admin', 'Regular Worker', 12, '5fd342fa71b89.jpg', NULL, NULL, '2020-12-08 17:00:00', '2020-12-11 02:59:22'),
(2, 'Hosse Fernando', 1931035, '2001-09-18', 'Marketing', 'Supervisor', 'Regular Worker', 12, '5fd342db8246a.jpeg', NULL, NULL, '2020-12-09 06:45:26', '2020-12-11 02:58:51'),
(3, 'Evan Charles', 1931137, '2001-09-16', 'IT', 'Leader', 'Regular Worker', 9, '5fd342cdd3a4f.jpeg', NULL, NULL, '2020-12-09 06:50:09', '2020-12-17 10:04:45'),
(4, 'Dayton', 1931165, '2001-09-05', 'IT', 'Manager', 'Regular Worker', 6, '5fd342c09ba0f.jpeg', NULL, NULL, '2020-12-09 06:51:37', '2020-12-14 01:27:09'),
(5, 'Donny', 1931125, '2001-05-05', 'Accounting', 'Manager', 'Daily Worker', 12, '5fd368424b1f2.jpeg', NULL, NULL, '2020-12-09 06:52:35', '2020-12-11 22:48:24'),
(8, 'Edy', 1931036, '2020-12-14', 'IT', 'Leader', 'Regular Worker', 12, '5fd724534cf75.jpg', NULL, NULL, '2020-12-14 01:37:39', '2020-12-14 01:37:39');

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
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `submit_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_amount` int(10) UNSIGNED NOT NULL,
  `type_of_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `softdelete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_code`, `employee_id`, `submit_date`, `start_date`, `end_date`, `leave_amount`, `type_of_leave`, `description`, `phone`, `approver`, `approved_date`, `status`, `softdelete`, `created_at`, `updated_at`) VALUES
(23, 'CT4691', 4, '2020-12-14', '2020-12-14', '2020-12-16', 3, 'Sick Leave', 'Pusing', '081267889933', 'Ellwan', '2020-12-14', 1, 1, '2020-12-14 01:23:42', '2020-12-17 10:00:35'),
(24, 'CT8739', 3, '2020-12-17', '2020-12-18', '2020-12-20', 3, 'Sick Leave', 'DBD', '081278785554', 'Ellwan', '2020-12-17', 1, 0, '2020-12-17 10:04:28', '2020-12-17 10:04:45'),
(25, 'CT7481', 4, '2020-12-22', '2020-12-22', '2020-12-23', 2, 'Business Trip', 'Lamar Kerja Tigernix', '081267778343', NULL, NULL, 0, 0, '2020-12-21 23:16:50', '2020-12-21 23:16:50');

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
(4, '2020_11_22_093932_create_employees_table', 1),
(5, '2020_11_22_094119_create_departments_table', 1),
(6, '2020_11_22_153742_create_positions_table', 1),
(7, '2020_11_22_153824_create_leaves_table', 1);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'P5240', 'Leader', '2020-12-09 06:38:08', '2020-12-09 06:38:08'),
(2, 'P1436', 'Supervisor', '2020-12-09 06:38:13', '2020-12-09 06:38:13'),
(3, 'P4477', 'Manager', '2020-12-09 06:38:19', '2020-12-09 06:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `employee_id`, `username`, `password`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ellwan edy wei', 1, 'ellwan', '$2y$10$hnVR7zAf5vg4UizIqlbEoepGwNGnnYGHnXXcairac4qn.Th0gS02m', 1, NULL, NULL, '2020-12-09 06:36:22', '2020-12-09 06:36:22'),
(4, 'dayton', 4, 'dayton', '$2y$10$ciVlQOLrJPYbOCnQm1qJX.cMy4n.6Dc3RJRqWWSywhD/01E/jpQXW', 0, NULL, NULL, '2020-12-14 01:22:45', '2020-12-14 01:22:45'),
(5, 'evan charles', 3, 'evan', '$2y$10$.C4cedwnblXXSAWWDVjIEeN/VlqeQ5rUXFzQgYx1QpeYfoCYVxilO', 0, NULL, NULL, '2020-12-17 10:02:21', '2020-12-17 10:02:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
