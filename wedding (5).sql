-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 04:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `kategori_id` int(55) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_by` bigint(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `kategori_id`, `gambar`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, NULL, '/assets/gambar/62d1719c0bca6_Screenshot (53).png', 9, '2022-07-15 06:54:37', NULL, '2022-07-15 06:54:37'),
(5, 2, '/assets/gambar/62d176325e7b2_Screenshot (10).png', 7, '2022-07-15 07:14:13', NULL, '2022-07-15 07:14:13'),
(6, 2, '/assets/gambar/62d17632b416f_Screenshot (11).png', 7, '2022-07-15 07:14:13', NULL, '2022-07-15 07:14:13'),
(7, 2, '/assets/gambar/62d2376301e4d_Screenshot (28).png', 7, '2022-07-15 20:58:36', NULL, '2022-07-15 20:58:36'),
(8, 2, '/assets/gambar/62d2376355cea_Screenshot (29).png', 7, '2022-07-15 20:58:36', NULL, '2022-07-15 20:58:36'),
(9, 2, '/assets/gambar/62d23763aa6fd_Screenshot (30).png', 7, '2022-07-15 20:58:36', NULL, '2022-07-15 20:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) DEFAULT NULL,
  `created_by` bigint(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 'wedding', 7, '2022-07-13 19:45:18', NULL, '2022-07-13 19:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\Galeri', 10, '974fc950-8ce4-4f9c-aaee-d9c0d7dfae64', 'gambar', '62d0ecbcb6f4e_Screenshot (10)', '62d0ecbcb6f4e_Screenshot-(10).png', 'image/png', 'public', 'public', 215824, '[]', '[]', '[]', '[]', 1, '2022-07-14 21:27:41', '2022-07-14 21:27:41'),
(8, 'App\\Models\\Galeri', 11, '82467c4c-da72-4778-b60f-b83f43a374bc', 'gambar', '62d0ecda3ea41_Screenshot (11)', '62d0ecda3ea41_Screenshot-(11).png', 'image/png', 'public', 'public', 419447, '[]', '[]', '[]', '[]', 2, '2022-07-14 21:28:11', '2022-07-14 21:28:11'),
(9, 'App\\Models\\Galeri', 12, '5d938ae1-9579-48b1-b70d-94abd3238afd', 'gambar', '62d0ed34c7fca_Screenshot (10)', '62d0ed34c7fca_Screenshot-(10).png', 'image/png', 'public', 'public', 215824, '[]', '[]', '[]', '[]', 3, '2022-07-14 21:30:12', '2022-07-14 21:30:12'),
(10, 'App\\Models\\Galeri', 13, '3171d556-f99a-463f-a539-c24dbfbe07d3', 'gambar', '62d0ed5a218bd_Screenshot (26)', '62d0ed5a218bd_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 4, '2022-07-14 21:30:19', '2022-07-14 21:30:19'),
(11, 'App\\Models\\Galeri', 17, 'c02c692a-db27-4ff9-86bd-6132a8285166', 'gambar', '62d0ee12a86db_Screenshot (26)', '62d0ee12a86db_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 5, '2022-07-14 21:35:07', '2022-07-14 21:35:07'),
(12, 'App\\Models\\Galeri', 18, '66d925ac-819c-48e0-994a-fdfc79d306a7', 'gambar', '62d0eed8884be_Screenshot (30)', '62d0eed8884be_Screenshot-(30).png', 'image/png', 'public', 'public', 237839, '[]', '[]', '[]', '[]', 6, '2022-07-14 21:36:41', '2022-07-14 21:36:41'),
(13, 'App\\Models\\Galeri', 22, '7a451e7e-fafd-4809-bd75-e7e3071e917d', 'gambar', '62d0ef32ec586_Screenshot (10)', '62d0ef32ec586_Screenshot-(10).png', 'image/png', 'public', 'public', 215824, '[]', '[]', '[]', '[]', 7, '2022-07-14 21:43:57', '2022-07-14 21:43:57'),
(14, 'App\\Models\\Galeri', 23, '740901c1-1454-4d43-a6c4-49a732c092af', 'gambar', '62d0f093cc1f3_Screenshot (26)', '62d0f093cc1f3_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 8, '2022-07-14 21:44:05', '2022-07-14 21:44:05'),
(15, 'App\\Models\\Galeri', 24, '4bc7753f-7913-4cf0-8147-80fefe8462bb', 'gambar', '62d102711b7c6_Screenshot (10)', '62d102711b7c6_Screenshot-(10).png', 'image/png', 'public', 'public', 215824, '[]', '[]', '[]', '[]', 9, '2022-07-14 23:00:18', '2022-07-14 23:00:18'),
(16, 'App\\Models\\Galeri', 25, '3c54510e-3090-4ccd-ba10-3c76ec25b6e3', 'gambar', '62d10293528b5_Screenshot (11)', '62d10293528b5_Screenshot-(11).png', 'image/png', 'public', 'public', 419447, '[]', '[]', '[]', '[]', 10, '2022-07-14 23:00:52', '2022-07-14 23:00:52'),
(17, 'App\\Models\\Galeri', 26, '0207958d-50f4-41df-8661-0d91df2b63ff', 'gambar', '62d103392312a_wonderful-wedding', '62d103392312a_wonderful-wedding.png', 'image/png', 'public', 'public', 2065513, '[]', '[]', '[]', '[]', 11, '2022-07-14 23:03:38', '2022-07-14 23:03:38'),
(18, 'App\\Models\\Galeri', 27, '9da26973-8564-41c7-ae4c-55eced1e24ed', 'gambar', '62d104c46538f_Screenshot (10)', '62d104c46538f_Screenshot-(10).png', 'image/png', 'public', 'public', 215824, '[]', '[]', '[]', '[]', 12, '2022-07-14 23:10:13', '2022-07-14 23:10:13'),
(19, 'App\\Models\\Galeri', 29, 'b39b6362-06f7-4d6c-afda-adcd791d118e', 'gambar', '62d11120472e3_Screenshot (30)', '62d11120472e3_Screenshot-(30).png', 'image/png', 'public', 'public', 237839, '[]', '[]', '[]', '[]', 13, '2022-07-15 00:02:57', '2022-07-15 00:02:57'),
(20, 'App\\Models\\Galeri', 30, 'eb91e165-b009-407e-9824-d675ed33455b', 'gambar', '62d1113b06157_Screenshot (26)', '62d1113b06157_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 14, '2022-07-15 00:03:24', '2022-07-15 00:03:24'),
(21, 'App\\Models\\Galeri', 33, '42bf0561-54a8-4f4f-b646-668d050857ff', 'gambar', '62d1115192da6_Screenshot (26)', '62d1115192da6_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 15, '2022-07-15 00:06:30', '2022-07-15 00:06:30'),
(22, 'App\\Models\\Galeri', 34, '58cead51-ffce-469e-b30a-dd9991ebee37', 'gambar', '62d111feec7da_Screenshot (26)', '62d111feec7da_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 16, '2022-07-15 00:06:40', '2022-07-15 00:06:40'),
(23, 'App\\Models\\Galeri', 35, 'ea09f6e2-71a7-4ddb-87e5-9fdd4980b093', 'gambar', '62d1121e98c7a_Screenshot (26)', '62d1121e98c7a_Screenshot-(26).png', 'image/png', 'public', 'public', 1161588, '[]', '[]', '[]', '[]', 17, '2022-07-15 00:07:11', '2022-07-15 00:07:11'),
(24, 'App\\Models\\Galeri', 36, '277d4286-1e50-4d2c-95ad-726736cbe028', 'gambar', '62d113fa0081f_Screenshot (11)', '62d113fa0081f_Screenshot-(11).png', 'image/png', 'public', 'public', 419447, '[]', '[]', '[]', '[]', 18, '2022-07-15 00:15:06', '2022-07-15 00:15:06'),
(25, 'App\\Models\\Galeri', 37, '8f051c65-9b75-438f-9dc2-97fdd3ff7a57', 'gambar', '62d1148c3e073_Screenshot (27)', '62d1148c3e073_Screenshot-(27).png', 'image/png', 'public', 'public', 1405437, '[]', '[]', '[]', '[]', 19, '2022-07-15 00:17:33', '2022-07-15 00:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `mempelai`
--

CREATE TABLE `mempelai` (
  `id` int(11) NOT NULL,
  `pria_id` int(55) DEFAULT NULL,
  `wanita_id` int(55) DEFAULT NULL,
  `tempatacara_id` int(55) DEFAULT NULL,
  `galeri_id` int(55) DEFAULT NULL,
  `maps_id` int(55) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mempelai`
--

INSERT INTO `mempelai` (`id`, `pria_id`, `wanita_id`, `tempatacara_id`, `galeri_id`, `maps_id`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 2, 4, 3, 7, NULL, 1, NULL, '2022-07-19 05:06:18', NULL, '2022-07-19 20:59:15'),
(3, 1, 4, 3, 7, NULL, NULL, 7, '2022-07-19 21:40:49', NULL, '2022-07-19 21:40:49');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `pria`
--

CREATE TABLE `pria` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_by` bigint(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pria`
--

INSERT INTO `pria` (`id`, `nama`, `gambar`, `pesan`, `facebook`, `instagram`, `twitter`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'reki', '/assets/gambar/bx2GypfBa8oSthYy3IVlvcMFnFJGzK_Screenshot (27).png', 'qwe', 'rekiqwe', 'rekiqwe', 'rekiqwe', NULL, '2022-07-10 02:15:39', NULL, '2022-07-10 02:15:39'),
(2, 'ferra', '/assets/gambar/rYZCKd8pTgVASjhKR5jba6WqwMzzxp_Screenshot (10).png', 'fer', 'fer1', 'fer', 'fer', NULL, '2022-07-12 00:36:31', 7, '2022-07-12 00:36:31'),
(3, NULL, '/assets/gambar/islyYkW1n5YBkiuBsMI6RscYyftxdO_Screenshot (11).png', NULL, NULL, NULL, NULL, 7, '2022-07-12 19:20:38', 7, '2022-07-12 19:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `tempatacara`
--

CREATE TABLE `tempatacara` (
  `id` int(11) NOT NULL,
  `tempat` varchar(55) DEFAULT NULL,
  `tanggal` varchar(55) DEFAULT NULL,
  `waktu` varchar(55) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_by` bigint(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempatacara`
--

INSERT INTO `tempatacara` (`id`, `tempat`, `tanggal`, `waktu`, `pesan`, `gambar`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, '1', '2022-07-06', 'w', '1', '/assets/gambar/gUcJY1gWFUwfx2xmLr6SwSj5yPoz3c_Screenshot (28).png', 7, '2022-07-13 00:49:29', 7, '2022-07-13 00:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(7, 'rekinaufal123', 'rekinaufal@gmail.com', NULL, '$2y$10$amivns33z0xar9b05ZmZ6.R1LKZpywGgtbp0xpaLe4/EHndpzTPdq', 'Admin', NULL, NULL, '2022-07-05 02:51:23', NULL, '2022-07-05 07:29:41'),
(9, 'nia1', 'nia@gmail.com', NULL, '$2y$10$tyy.SpKJEn.MSwyxs3iWMONEfUgZU4Ikg/4IGKyKLos3GZ0DJNgDS', 'User', NULL, NULL, '2022-07-06 07:49:58', NULL, '2022-07-10 02:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `wanita`
--

CREATE TABLE `wanita` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_by` bigint(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(55) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wanita`
--

INSERT INTO `wanita` (`id`, `nama`, `gambar`, `pesan`, `facebook`, `instagram`, `twitter`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, 'reki1', '/assets/gambar/QRhaQucGaCrUcTffCrk4zyPGGURsum_Screenshot (11).png', 'reki', 'reki', 'reki', 'reki', NULL, '2022-07-12 06:17:31', NULL, '2022-07-12 06:17:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `mempelai`
--
ALTER TABLE `mempelai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pria`
--
ALTER TABLE `pria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempatacara`
--
ALTER TABLE `tempatacara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wanita`
--
ALTER TABLE `wanita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mempelai`
--
ALTER TABLE `mempelai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pria`
--
ALTER TABLE `pria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempatacara`
--
ALTER TABLE `tempatacara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wanita`
--
ALTER TABLE `wanita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
