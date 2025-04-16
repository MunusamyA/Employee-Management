-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2025 at 03:13 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalyanamalai`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lML0A205OoyqEo59va3E1Uo7JLd5iNztSlRSVDLR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamZPUlpHNUFmQlNNWVZNUG12TzFsVkp1OEh5ZmVXR0ZXcWxGaGhGVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9FbXBsb3llZS1TYWxhcnktZ2VuYXJhdGUvNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1743589416),
('N4TuBYxGA2IIlz0TXogIScnO7JGWPx7ww9F7Qpbe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmpSTTlwbnRvQldGNkw5dUljUWk5dUl5eVUya0l1OFZ5TWdnbnkyciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9TYWxhcnktR2VuYXJhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742117140);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int UNSIGNED NOT NULL,
  `emp_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_mob_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_gender` tinyint NOT NULL COMMENT '1-Male, 2-Female, 3-Others',
  `emp_dpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_salary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` tinyint NOT NULL,
  `created_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` tinyint DEFAULT NULL,
  `updated_dtm` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rec_del_status` tinyint NOT NULL DEFAULT '0' COMMENT '0-Active, 2-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `emp_name`, `emp_email`, `emp_mob_no`, `emp_dob`, `emp_gender`, `emp_dpt`, `emp_position`, `emp_photo`, `emp_salary`, `created_by`, `created_dtm`, `updated_by`, `updated_dtm`, `rec_del_status`) VALUES
(1, 'sdfdfdfdfdfdffddffdfddf', 'sfs@gmail.com', '1234518911', '2001-09-04', 1, 'df', 'd', 'assets/emp_photos/dqzjfiXLe5VKs1BXeTpToSYecjE9q7d46Luws9QK.jpg', '24543', 1, '2025-02-23 00:43:31', 1, '2025-02-27 20:39:32', 1),
(2, 'Munusamy', 'munus940455@gmail.com', '7019601623', '2001-09-04', 1, 'IT', 'Develope', 'assets/emp_photos/hhrDGewbjbfz14ALrakkOxBivdSuEfyvqVAFULpc.jpg', '50000', 1, '2025-02-24 02:52:25', 1, '2025-03-10 10:30:50', 1),
(3, 'Krishnamoothy M', 'kicha@7019', '6379936937', '2000-01-01', 1, 'Parma', 'M.Form', 'assets/emp_photos/HDADjV15KnSQSqeh50IF33rkQJKmw2o9aoNRakbO.jpg', '70000', 1, '2025-02-28 07:16:23', 1, '2025-03-10 08:32:49', 1),
(4, 'vinish', 'vinishpikachu025@gmail.com', '8531052380', '2003-02-02', 1, 'IT sector', 'UI/UX designer', 'assets/emp_photos/y9Gm05YgswM0aIdKrcUrrk0dhZKi1Bt9jFjpMIyJ.jpg', '60000', 1, '2025-03-10 08:31:43', 1, '2025-03-10 08:32:36', 0),
(5, 'saied', 'muhqyhwheb33443ds@gmail.com', '8794354897', '2001-09-20', 1, 'uifdf', 'kjgfgvm', 'assets/emp_photos/P3QtKuZAtWrO1E4Ny2WIABIJmcKzkM58zJEVSwrX.jpg', '1111111111', 1, '2025-03-10 10:29:55', 1, '2025-03-10 10:30:38', 0),
(6, 'keerthi', 'mufwasdf@gmail.com', '6758234676', '2002-05-16', 2, 'IT', 'Java Developer', 'assets/emp_photos/TZBj0cfFX2WcJzT5JvxbJduzUVJakyfZTQADrtIR.jpg', '1200000', 1, '2025-04-02 04:49:39', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_salary`
--

CREATE TABLE `tbl_employee_salary` (
  `id` int NOT NULL,
  `emp_id` tinyint NOT NULL,
  `work_days` text NOT NULL,
  `presant_days` text NOT NULL,
  `tot_wor_hrs` text NOT NULL,
  `emp_wor_hrs` text NOT NULL,
  `emp_salary` double(12,2) NOT NULL,
  `tot_Salary` double(12,2) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 - Not Genarated , 1 - Genarated',
  `created_by` tinyint NOT NULL,
  `created_dtm` datetime NOT NULL,
  `rec_del_status` tinyint NOT NULL DEFAULT '0' COMMENT '0 - active,1 - inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_employee_salary`
--

INSERT INTO `tbl_employee_salary` (`id`, `emp_id`, `work_days`, `presant_days`, `tot_wor_hrs`, `emp_wor_hrs`, `emp_salary`, `tot_Salary`, `status`, `created_by`, `created_dtm`, `rec_del_status`) VALUES
(1, 1, '28', '3', '224', '24', 24543.00, 2629.61, 1, 1, '2025-02-25 04:14:50', 0),
(4, 2, '23', '0', '184', '0', 50000.00, 0.00, 1, 1, '2025-03-05 16:08:55', 0),
(5, 5, '22', '0', '176', '0', 1111111111.00, 0.00, 1, 1, '2025-03-10 16:05:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_tasks`
--

CREATE TABLE `tbl_employee_tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` tinyint NOT NULL,
  `task_title` varchar(250) NOT NULL,
  `task_due_date` date NOT NULL,
  `task_description` text NOT NULL,
  `task_priority` tinyint NOT NULL COMMENT '1-high,2-Medium,3-low',
  `task_status` tinyint NOT NULL COMMENT '1-assigned,2-completed',
  `created_by` int UNSIGNED NOT NULL,
  `created_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_dtm` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rec_del_status` tinyint NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_employee_tasks`
--

INSERT INTO `tbl_employee_tasks` (`id`, `employee_id`, `task_title`, `task_due_date`, `task_description`, `task_priority`, `task_status`, `created_by`, `created_dtm`, `updated_by`, `updated_dtm`, `rec_del_status`) VALUES
(1, 1, 'munu', '2025-02-24', 'noth', 1, 1, 1, '2025-02-24 02:54:00', 1, '2025-02-25 01:31:26', 1),
(2, 1, 'samy', '2025-02-25', 'ing', 2, 1, 1, '2025-02-24 02:54:01', NULL, '2025-02-24 11:17:03', 0),
(3, 2, 'karthi', '2025-02-26', 'mani', 3, 1, 1, '2025-02-24 02:55:38', NULL, '2025-02-24 11:17:07', 0),
(4, 2, 'nanbadd11', '2025-02-27', 'rathnam', 1, 1, 1, '2025-02-24 02:55:38', 1, '2025-02-24 11:17:11', 1),
(5, 2, 'nanba', '2025-02-27', 'rathnam', 2, 1, 1, '2025-02-24 03:23:04', 1, '2025-02-24 11:17:15', 1),
(6, 2, 'edfdddddddd', '2025-02-17', 'fdf', 2, 1, 1, '2025-02-24 04:13:59', 1, '2025-02-24 11:17:17', 1),
(7, 1, 'done assigned', '2025-02-25', 'ewsfdf', 1, 1, 1, '2025-02-24 05:51:31', 1, '2025-02-24 05:51:53', 0),
(8, 4, 'gewhjfs', '2025-03-13', 'yjehf', 2, 1, 1, '2025-03-10 08:33:51', 1, '2025-03-10 08:34:22', 0),
(9, 4, 'rttjhb', '2025-03-15', '4rtg', 2, 1, 1, '2025-03-10 08:33:51', 1, '2025-03-10 08:34:26', 1),
(10, 5, 'hef', '2025-04-06', 'md', 1, 1, 1, '2025-03-10 10:33:28', NULL, NULL, 0),
(11, 5, 'bhdxs', '2025-03-14', 'regdtg', 3, 1, 1, '2025-03-10 10:33:28', 1, '2025-03-10 10:34:06', 1),
(12, 6, 'find more consultation', '2025-04-05', 'for Our Job', 1, 1, 1, '2025-04-02 04:51:41', NULL, NULL, 0),
(13, 6, 'qqqq', '2025-04-03', '12253tryyt', 2, 1, 1, '2025-04-02 04:51:41', 1, '2025-04-02 04:52:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_logout`
--

CREATE TABLE `tbl_login_logout` (
  `id` int NOT NULL,
  `emp_id` tinyint NOT NULL,
  `login_time` time NOT NULL,
  `login_date` date NOT NULL,
  `logout_time` time NOT NULL,
  `logout_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_login_logout`
--

INSERT INTO `tbl_login_logout` (`id`, `emp_id`, `login_time`, `login_date`, `logout_time`, `logout_date`) VALUES
(1, 1, '09:03:49', '2025-01-01', '10:03:49', '2025-01-01'),
(2, 1, '14:30:49', '2025-01-01', '18:03:49', '2025-01-01'),
(3, 1, '09:03:49', '2025-01-02', '13:03:49', '2025-01-02'),
(4, 1, '14:30:49', '2025-01-02', '18:03:49', '2025-01-02'),
(5, 1, '09:03:49', '2025-01-03', '18:03:49', '2025-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month_masters`
--

CREATE TABLE `tbl_month_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `sal_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sal_year` int NOT NULL,
  `sal_tot_days` int DEFAULT NULL,
  `sal_holy_days` int NOT NULL,
  `sal_work_days` int NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_dtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint DEFAULT NULL,
  `updated_dtm` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rec_del_status` tinyint NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_month_masters`
--

INSERT INTO `tbl_month_masters` (`id`, `sal_month`, `sal_year`, `sal_tot_days`, `sal_holy_days`, `sal_work_days`, `created_by`, `created_dtm`, `updated_by`, `updated_dtm`, `rec_del_status`) VALUES
(1, 'January', 2025, 31, 7, 24, 1, '2025-02-27 20:30:12', 1, '2025-02-28 02:00:12', 0),
(2, 'February', 2025, 28, 5, 23, 1, '2025-03-05 18:50:48', 1, '2025-03-10 08:35:06', 1),
(3, 'February', 2025, 28, 6, 22, 1, '2025-03-10 08:37:35', 1, '2025-03-10 10:31:01', 1),
(4, 'February', 2025, 28, 6, 22, 1, '2025-03-10 10:32:32', NULL, '2025-03-10 16:02:33', 0),
(5, 'March', 2025, 31, 4, 27, 1, '2025-04-02 04:53:24', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'admin@gmail.com', '2025-02-23 02:21:28', '$2y$12$7vYWG0zuBpU4N8qForfB9Oq0MAiVJQTryibshzd/Vv/Plj.H8z9ky', NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_employees_emp_mob_no_unique` (`emp_mob_no`);

--
-- Indexes for table `tbl_employee_salary`
--
ALTER TABLE `tbl_employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee_tasks`
--
ALTER TABLE `tbl_employee_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_logout`
--
ALTER TABLE `tbl_login_logout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_month_masters`
--
ALTER TABLE `tbl_month_masters`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee_salary`
--
ALTER TABLE `tbl_employee_salary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employee_tasks`
--
ALTER TABLE `tbl_employee_tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_login_logout`
--
ALTER TABLE `tbl_login_logout`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_month_masters`
--
ALTER TABLE `tbl_month_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
