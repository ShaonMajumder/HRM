-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 08:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `award_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `user_id`, `award_name`, `award_description`, `gift_item`, `award_by`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 5, 'Monthly Hero', 'Top worker of this month', 'Apple Iphone X', 'IT Manager', '2021-03-03', 'March', '2021', NULL, NULL),
(2, 4, 'Monthly Hero', 'Top worker of this month', 'Apple Iphone X', 'IT Manager', '2021-03-03', 'March', '2021', NULL, NULL),
(3, 3, 'Monthly Hero', 'Top worker of this month', '24\" Smart Television', 'HR Manager', '2021-03-03', 'March', '2021', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Security Department', '2021-02-28 10:01:17', NULL),
(2, 'Marketing Department', NULL, NULL),
(3, 'IT Department', NULL, NULL),
(10, 'Administration Department', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `department_id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apartment', NULL, NULL),
(2, 3, 'R&D', NULL, NULL),
(3, 3, 'Support', NULL, NULL),
(4, 1, 'Gate', NULL, NULL),
(5, 10, 'Accounts', NULL, NULL);

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
(4, '2021_02_28_095252_create_departments_table', 2),
(5, '2021_02_28_095504_create_divisions_table', 2),
(6, '2021_02_28_095852_create_divisions_table', 3),
(7, '2021_03_01_081944_create_positions_table', 4),
(8, '2021_03_02_114036_create_awards_table', 5),
(9, '2021_03_03_055937_create_awards_table', 6);

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
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `position_details`, `created_at`, `updated_at`) VALUES
(1, 'Worker', 'Who work on company', NULL, NULL),
(2, 'Manager', 'Who maintain the worker', NULL, NULL),
(3, 'IT head', 'Maintain the all IT person', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` int(2) DEFAULT 0,
  `is_admin` tinyint(1) DEFAULT 0,
  `user_type` int(3) DEFAULT 2,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `duty_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_reason` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voluntary_termination` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_frequency` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_frequency_text` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit_class_code` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit_accural_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_accural_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_id` int(5) DEFAULT NULL,
  `is_supervisor` int(2) DEFAULT 0,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soft_delete` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `is_super`, `is_admin`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `zipcode`, `department_id`, `division_id`, `position_id`, `duty_type`, `hire_date`, `joining_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_text`, `benefit_class_code`, `benefit_details`, `benefit_accural_date`, `benefit_status`, `class_code`, `class_details`, `class_accural_date`, `class_status`, `supervisor_id`, `is_supervisor`, `reference_name`, `reference_phone`, `reference_address`, `dob`, `gender`, `marital_status`, `ssn`, `present_address`, `permanent_address`, `nid`, `photo`, `home_phone`, `emergency_contact_person`, `emergency_contact`, `emergency_contact_relation`, `employee_id`, `full_name`, `country`, `city`, `phone`, `alternative_phone`, `soft_delete`) VALUES
(1, 'Super Admin', 1, 1, 1, 'admin@gmail.com', '2021-02-23 04:45:12', '$2y$10$5cI9FaOkPKsF7vka..nbCeu9v7C7qreeFSU1Fzc9eEzjXWL588XdW', 'KRCeY3imKGpfzPYr6AbYitVa9C3zADmI2Gr00PqevRNkjm3y1aa1g06FSq4Z', '2021-02-17 00:52:42', '2021-02-17 00:52:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/backend/images/dummy.jpg', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Alamgir Hossain', 0, 0, 2, 'manager@gmail.com', '2021-02-23 04:44:38', '$2y$10$5cI9FaOkPKsF7vka..nbCeu9v7C7qreeFSU1Fzc9eEzjXWL588XdW', NULL, NULL, NULL, NULL, NULL, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jatrabari Dhaka ', NULL, NULL, 'public/backend/images/dummy.jpg', NULL, NULL, NULL, NULL, '2', 'Alamgr Hossen', 'Bangladesh', NULL, '01853654252', '01684525622', 0),
(3, 'Khorshed Alam', 0, 0, 2, 'speeddigitinfo@gmail.com', NULL, '$2y$10$WP7z.oLRrVw2rTUiuENZne9y6g6OIOh/EFI0JMNTzeltTWw8MR7PW', NULL, NULL, NULL, '1000', NULL, 2, 2, 'Full Time', '2021-03-02', '2021-03-02', NULL, NULL, NULL, 'Salary', '30000', 'Monthly', NULL, NULL, NULL, NULL, 'Inactive', NULL, NULL, NULL, 'Inactive', 3, 1, 'Sadek Khan', '+8801556149456', 'Dhaka arambag', '1985-03-02', 'Male', 'Married', '1451516', 'Dhaka arambag', 'Chadpur Noakhali', '8694365416630', 'public/backend/images/dummy.jpg', '+8801556149456', NULL, '01983215812', NULL, '3', 'Khorshed Alam', 'Bangladesh', 'Dhaka', '+8801556149456', '01556149456', 0),
(4, 'Jahangir Alam', 0, 0, 2, 'jahangiralam@gmail.com', NULL, '$2y$10$6mhH.mDXaMJxb3L19UwoKORAyR/h5etDF3h5S683BQjagCXJNW4cC', NULL, NULL, NULL, '1000', NULL, 5, 1, 'Full Time', '2021-03-02', '2021-03-05', NULL, NULL, NULL, 'Salary', '25000', 'Monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 'Sadek Khan', '+8801556149456', 'Dhaka arambag', '1995-03-09', 'Male', 'Single', '195326', 'Dhaka arambag', 'Feni Noakhali', '8694365416631', 'public/backend/images/employee/4.jpg', '+8801556149456', 'Abdul halim', '0197464156', 'Cousin', '4', 'Jahangir Alam', 'Bangladesh', 'Dhaka', '01963542623', '01963542624', 0),
(5, 'Mahabubur Rahman', 0, 0, 2, 'mahabubur@gmail.com', NULL, '$2y$10$ppqWTBPmTziqs4Zn18kj9uy01MDXSlYhDvii6q8/T.Xeh6G1PwuCq', NULL, NULL, NULL, '1000', NULL, 4, 1, 'Full Time', '2021-03-02', '2021-03-04', NULL, NULL, NULL, 'Salary', '10000', 'Monthly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 'Sadek Khan', '+8801556149456', 'Dhaka arambag', '1980-03-09', 'Male', 'Married', '14515163', 'Dhaka arambag', 'Feni Noakhali', '8694365416333', 'public/backend/images/employee/5.jpg', '+8801556149456', 'Abdul halim', '01983215810', 'Son', '5', 'Mahabubur Rahman', 'Bangladesh', 'Dhaka', '01965874525', '0165365211', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_department_id_foreign` (`department_id`);

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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
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
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `divisions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
