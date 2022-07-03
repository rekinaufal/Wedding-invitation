-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 03, 2022 at 02:06 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--
CREATE DATABASE IF NOT EXISTS `tes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tes`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Personal', 'personal', '2022-01-13 17:29:42', '2022-01-13 17:37:28'),
(3, 'Programming', 'programming', '2022-01-13 17:39:09', '2022-01-13 17:39:09');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_09_081755_create_posts_table', 1),
(6, '2022_01_14_001300_create_categories_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Judul pertama', 'judul-pertama', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio unde laboriosam, libero maiores error sunt doloremque? Voluptatum, quaerat culpa voluptates totam voluptas earum fuga asperiores quo praesentium, distinctio, dolores non?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima eum sequi eveniet exercitationem obcaecati quibusdam atque impedit ipsum debitis dolore cum quia fugit fuga saepe enim, similique vel nulla distinctio expedita reprehenderit. Voluptatum tenetur perspiciatis mollitia velit. Quaerat explicabo facilis nisi earum odio expedita rerum cum quas et, natus asperiores itaque vero laboriosam placeat? Porro sit accusantium quo doloribus velit excepturi? Laborum, eos error. Eius officiis iusto magni similique explicabo ipsa modi quaerat tempore labore omnis cupiditate, corrupti assumenda, exercitationem repellat obcaecati enim aspernatur maiores rem repellendus provident odio facilis autem consequatur dolore. Nobis quibusdam quidem saepe, vero ducimus accusantium cumque amet blanditiis tenetur enim modi dignissimos perspiciatis libero quasi praesentium, animi sit! Voluptatibus aliquid accusamus, perferendis accusantium tenetur laborum.', '2022-01-13 17:00:00', '2022-01-13 17:00:00', NULL),
(2, 3, 1, 'Judul kedua', 'judul-kedua', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio unde laboriosam, libero maiores error sunt doloremque? Voluptatum, quaerat culpa voluptates totam voluptas earum fuga asperiores quo praesentium, distinctio, dolores non?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima eum sequi eveniet exercitationem obcaecati quibusdam atque impedit ipsum debitis dolore cum quia fugit fuga saepe enim, similique vel nulla distinctio expedita reprehenderit. Voluptatum tenetur perspiciatis mollitia velit. Quaerat explicabo facilis nisi earum odio expedita rerum cum quas et, natus asperiores itaque vero laboriosam placeat? Porro sit accusantium quo doloribus velit excepturi? Laborum, eos error. Eius officiis iusto magni similique explicabo ipsa modi quaerat tempore labore omnis cupiditate, corrupti assumenda, exercitationem repellat obcaecati enim aspernatur maiores rem repellendus provident odio facilis autem consequatur dolore. Nobis quibusdam quidem saepe, vero ducimus accusantium cumque amet blanditiis tenetur enim modi dignissimos perspiciatis libero quasi praesentium, animi sit! Voluptatibus aliquid accusamus, perferendis accusantium tenetur laborum.', '2022-01-13 17:00:00', '2022-01-13 17:00:00', NULL),
(3, 1, 0, 'judul ke dua', 'judul-ke-dua', 'lorem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima eum sequi eveniet exercitationem obcaecati quibusdam atque impedit ipsum debitis dolore cum quia fugit fuga saepe enim, similique vel nulla distinctio expedita reprehenderit. Voluptatum tenetur perspiciatis mollitia velit. Quaerat explicabo facilis nisi earum odio expedita rerum cum quas et, natus asperiores itaque vero laboriosam placeat? Porro sit accusantium quo doloribus velit excepturi? Laborum, eos error. Eius officiis iusto magni similique explicabo ipsa modi quaerat tempore labore omnis cupiditate, corrupti assumenda, exercitationem repellat obcaecati enim aspernatur maiores rem repellendus provident odio facilis autem consequatur dolore. Nobis quibusdam quidem saepe, vero ducimus accusantium cumque amet blanditiis tenetur enim modi dignissimos perspiciatis libero quasi praesentium, animi sit! Voluptatibus aliquid accusamus, perferendis accusantium tenetur laborum.', '2022-01-13 17:00:00', '2022-01-13 17:00:00', NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'M. Recki Naufal L.', 'rekinaufal@gmail.com', NULL, '$2y$10$Y1m3k.XWjmEhvvMkv8ZDQexTZb3FX3iu.cNtsV.9kXGzOyMv5OyNS', NULL, '2022-01-18 18:14:17', '2022-01-18 18:14:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
