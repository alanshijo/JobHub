-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2023 at 06:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jobhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('alanshijo06@gmail.com', '$2y$10$cgzfPMjdC7GkNXzTm9w7hui3CRODTL1vt3zJYRtsr3341XZhjWsN6', '2023-08-02 00:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cat_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2023-08-03 15:04:43', '2023-08-03 15:04:43'),
(2, 'Designing', '2023-08-03 15:04:53', '2023-08-03 15:04:53'),
(3, 'Marketing', '2023-08-03 15:05:00', '2023-08-03 15:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobapplications`
--

CREATE TABLE `tbl_jobapplications` (
  `application_id` int NOT NULL,
  `cv_file` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `job_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_jobapplications`
--

INSERT INTO `tbl_jobapplications` (`application_id`, `cv_file`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(4, 'ALAN SHIJO - Resume.pdf', 2, 3, '2023-08-13 13:11:08', '2023-08-13 13:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_region` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  `expericence` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `application_deadline` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `responsibilities` varchar(255) NOT NULL,
  `education_experience` varchar(255) NOT NULL,
  `other_benefits` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `cat_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `job_title`, `job_region`, `company_name`, `job_type`, `vacancy`, `expericence`, `salary`, `gender`, `application_deadline`, `job_description`, `responsibilities`, `education_experience`, `other_benefits`, `company_logo`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer', 'New York', 'ABC Company', 'Full-time	', '3', '2+ years', '$50,000-$60,000	', 'Any', '2023-08-15	', 'We are looking for a skilled web developer...	', 'Developing and maintaining websites...	', 'Bachelor\'s degree in Computer Science...	', 'Flexible work hours, Health insurance, Paid vacation	', 'job_logo_2.jpg', 1, '2023-08-03 09:43:44', '2023-08-03 09:43:44'),
(2, 'Marketing Manager	', 'San Francisco	', 'PQR Tech	', 'Part-time	', '2	', '1+ years	', '$40,000-$50,000	', 'Any	', '2023-08-10	', 'We are hiring a Data Analyst...	', 'Analyzing and interpreting data...	', 'Bachelor\'s degree in Statistics or related field...	', 'Professional development opportunities, Flexible work hours	', 'job_logo_5.jpg', 3, '2023-08-03 09:43:44', '2023-08-03 09:43:44'),
(3, 'PHP Developer	', 'London', 'Acme Corp	', 'Full-time	', '1', '5+ years	', '$90,000-$100,000	', 'Any', '2023-08-20	', 'Acme Corp is seeking an experienced PHP Developer...	', 'Develop and maintain web applications...', 'Bachelor\'s degree in Computer Engineering or related field	', 'Retirement savings plan, Gym membership	', 'job_logo_3.jpg', 1, '2023-08-03 15:33:32', '2023-08-03 15:33:32'),
(4, 'Frontend Developer	', 'San Francisco	', 'XYZ Solutions	', 'Part-time', '2', '3+ years	', '$80,000-$90,000	', 'Any', '2023-09-15	', 'XYZ Solutions is hiring a talented Frontend...	', 'Collaborate with UI/UX designers...', 'Bachelor\'s degree in Web Development or related field	', 'Remote work, Paid time off	', 'job_logo_4.jpg', 1, '2023-08-03 15:35:49', '2023-08-03 15:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_savedjobs`
--

CREATE TABLE `tbl_savedjobs` (
  `saved_id` int NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_savedjobs`
--

INSERT INTO `tbl_savedjobs` (`saved_id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 4, 2, '2023-08-05 02:11:35', '2023-08-05 02:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_img`, `name`, `email`, `email_verified_at`, `password`, `cv_file`, `job_title`, `bio`, `fb`, `twitter`, `linkedin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'default.jpg', 'admin', 'admin@gmail.com', NULL, '$2y$10$mQrnQCqKRSW/X6YoBXCZI.c8gcU5cW61nvVlq8CPa8aPKHooYLcJ.', NULL, NULL, NULL, NULL, NULL, NULL, '25sY1wrPJtqNSZ1jDK2FymvlBaa3UsdnSOudEzjjaOPmhwaIheWetCtoipVz', '2023-07-31 13:01:54', '2023-07-31 13:01:54'),
(2, 'default.jpg', 'Alan Shijo', 'alanshijo06@gmail.com', NULL, '$2y$10$4V1gwXfRkipDuBsOKLavYumE88N5CLvbbvhz3JNJ3FmKPLASF2WoK', 'ALAN SHIJO - Resume.pdf', 'UI/UX Designer', 'I am a passionate UI/UX Designer with a creative and detail-oriented approach to crafting user-centered digital experiences. With a keen eye for aesthetics and a solid foundation in design principles, I strive to bring clarity and elegance to every project I work on. I enjoy blending my artistic skills with a user-focused mindset to create intuitive interfaces that seamlessly guide users through their digital journey. I am constantly inspired by the ever-evolving world of design and technology, and I am dedicated to delivering impactful solutions that resonate with users and elevate brands.', 'shijoatkl', 'AlanShijo2', 'a1an-shijo', NULL, '2023-08-02 00:52:52', '2023-08-02 00:52:52');

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_jobapplications`
--
ALTER TABLE `tbl_jobapplications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_savedjobs`
--
ALTER TABLE `tbl_savedjobs`
  ADD PRIMARY KEY (`saved_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jobapplications`
--
ALTER TABLE `tbl_jobapplications`
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_savedjobs`
--
ALTER TABLE `tbl_savedjobs`
  MODIFY `saved_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
