-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 03:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `interest_area` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `content`, `created_at`, `updated_at`) VALUES
(4, '<h2>Sejarah TSTH2</h2><ol><li>lsacmlsacmalda</li><li>samclksacmsad</li><li>acnxcjanzcma</li><li>xz nsijkxcxq</li><li>saxnsca</li></ol><p>&nbsp;</p><p>askcoisadjaqsdmcijxkjcpsnJF WEKGLJ SFVODKGFJWFAKFDMEW D;SODLKGJMDSGIRFV FDOBKFDKWPFIKFDVFDF ODKJVSJDMOEITGOFDKGRUTEU8TRISKFDVDS FLAKE lekfjwo ikfjmdf wflkdsfwefwdsfds.fdsf sdofkdsfdsf sfsddsf. sdokfjdskfdsnfdsf. kjfsmlkfmsdsa sdkfjsda ckdndmf oijermfvm ds9vdsjfkjwngudnsfmwdv&nbsp;</p>', '2025-04-11 07:14:02', '2025-04-11 07:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_18_141722_create_permission_tables', 2),
(6, '2025_03_18_153036_create_researchers_table', 3),
(7, '2025_04_09_081447_create_publications_table', 4),
(8, '2025_04_10_064415_create_projects_table', 5),
(9, '2025_04_10_065231_create_project_collaborators_table', 6),
(10, '2025_04_11_013739_create_collaborators_table', 7),
(11, '2025_04_11_015903_add_is_approved_to_researchers_table', 8),
(12, '2025_04_11_041635_add_type_to_publications_table', 9),
(15, '2025_04_11_042933_create_structure__organizations_table', 10),
(16, '2025_04_11_132906_create_histories_table', 11),
(17, '2025_04_11_132937_create_vision_missions_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `organization_structures`
--

CREATE TABLE `organization_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_structures`
--

INSERT INTO `organization_structures` (`id`, `name`, `position_title`, `parent_id`, `photo`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Fredy Hasudungan Lumbantobing', 'jansdk', NULL, 'organization_photos/YX14eqTKN4N7YIpbA9cf3Y2BWilkImJy8b1Wwvq7.jpg', ';s,m;lsamd', NULL, '2025-04-11 01:10:32', '2025-04-11 01:10:32'),
(2, 'Richard', 'saczsadsv', NULL, 'organization_photos/tqDSwqr7wjfjp0OTK9ymAz5lj1r6dwhZOoa2RBiC.jpg', 'sclkx,da', NULL, '2025-04-11 01:10:59', '2025-04-11 01:10:59'),
(3, 'Carlos Matondang', 'jansdk', NULL, 'organization_photos/og9JNslBb8gbNZMyvtqxA8nGtPJdRbzNSgGT8AVy.png', 'kadjADa', NULL, '2025-04-11 02:08:57', '2025-04-11 02:08:57'),
(4, 'paulusaritonang002', 'lksfnda', NULL, 'organization_photos/VHM0vWRftUJWuQgmrxm6pGPYo3vmCASwIvcVShVM.jpg', 'lskfslkd', NULL, '2025-04-11 02:25:15', '2025-04-11 02:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create researcher', 'web', '2025-03-18 07:41:02', '2025-03-18 07:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '1955109c741d2a652e0dd9242365debbf5361ec3dd3625fd572aa3c89536b6d4', '[\"*\"]', NULL, NULL, '2025-03-18 07:19:13', '2025-03-18 07:19:13'),
(2, 'App\\Models\\User', 1, 'auth_token', '46d77b83d4259563a98809dd7ef02b8c1dee0411edd31ca7210c5fb3b11f6643', '[\"*\"]', '2025-03-18 07:29:14', NULL, '2025-03-18 07:23:42', '2025-03-18 07:29:14'),
(3, 'App\\Models\\User', 1, 'auth_token', '3b03fc99e5a5b955a51b4204aa1870ac7088deafec9111992326325b65814242', '[\"*\"]', '2025-03-18 08:10:36', NULL, '2025-03-18 08:09:54', '2025-03-18 08:10:36'),
(4, 'App\\Models\\User', 2, 'auth_token', '13746c2dcea2d5776a996248ba4004c2528051fc28c292811ff3fb95ed1335c3', '[\"*\"]', NULL, NULL, '2025-03-18 08:22:37', '2025-03-18 08:22:37'),
(5, 'App\\Models\\User', 2, 'auth_token', 'd82c3b75831eb03912f8e768d49450a2eb84444fa735a89aff9e896ece1ea5c5', '[\"*\"]', '2025-03-18 18:05:16', NULL, '2025-03-18 08:25:09', '2025-03-18 18:05:16'),
(6, 'App\\Models\\User', 2, 'auth_token', '0d3f0e464976d31afda367e18f9c35aa600fb52a3fb6a788004712cc8887ae7c', '[\"*\"]', '2025-03-18 18:33:11', NULL, '2025-03-18 18:05:35', '2025-03-18 18:33:11'),
(7, 'App\\Models\\User', 3, 'buyer-token', 'a96a86a80a21bc7c7560bb9dbc51323443cb500452d3ba118d546c653f1d86c6', '[\"*\"]', NULL, NULL, '2025-03-18 18:43:34', '2025-03-18 18:43:34'),
(8, 'App\\Models\\User', 1, 'auth_token', 'ba2c91882ffc65c4f422cbda88b38344ff5b2a4bac4559d9eb6df88fc08b226b', '[\"*\"]', NULL, NULL, '2025-03-20 00:07:29', '2025-03-20 00:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `researcher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `status` enum('pending','active','completed') NOT NULL DEFAULT 'pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_collaborators`
--

CREATE TABLE `project_collaborators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `researcher_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `researcher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` text DEFAULT NULL,
  `journal` varchar(255) DEFAULT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `publication_date` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `authors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`authors`)),
  `raw_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `academic_position` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `orcid_id` varchar(255) DEFAULT NULL,
  `scopus_id` varchar(255) DEFAULT NULL,
  `garuda_id` varchar(255) DEFAULT NULL,
  `googlescholar_id` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`id`, `user_id`, `institution`, `academic_position`, `expertise`, `orcid_id`, `scopus_id`, `garuda_id`, `googlescholar_id`, `bio`, `phone`, `photo`, `created_at`, `updated_at`, `is_approved`) VALUES
(1, 2, 'Universitas Teknologi Keluarga Saya', 'Professor', 'Artificial Intelligencee', '0009-0006-3026-7496', '57208577533', NULL, NULL, 'Saya seorang peneliti di bidang AI dan ML.', '085261591160', 'photos/RBnOm7Ff0fm1v17vqdsjfNcCD1ZSdt6ic4YvYE3n.jpg', '2025-03-18 18:32:45', '2025-04-10 20:12:32', 1),
(2, 4, 'Universitas Teknologi Apa', 'Proffesor', 'Artificial Intelligencee', '0009-0006-3026-7496', '57208577533', NULL, 'tQuMxrgAAAAJ', 'sdsvfzdkfnmsakjsvsfasjfsnalkdzc', '(+62) 852 6159 1160', 'photos/PqrcFyMaHMSOWQeYVqhECfS7hZMhOS8GRmV0zGGT.jpg', '2025-04-08 07:11:27', '2025-04-10 20:38:33', 1),
(9, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdsgby', NULL, 'photos/H1wdh4k2PkeKRadxxqibTX3AXpNbMmkKw3P3a428.jpg', '2025-04-14 07:59:07', '2025-04-14 08:01:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-03-18 07:31:04', '2025-03-18 07:31:04'),
(4, 'researcher', 'web', '2025-03-18 08:06:58', '2025-03-18 08:06:58'),
(5, 'buyer', 'web', '2025-03-18 18:38:53', '2025-03-18 18:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe@example.com', NULL, '$2y$12$ENyrl04tJ1Gy0f75bvRv0OVdr4aXyvzX536KtUUmuZ3SSElmq4KGO', NULL, '2025-03-18 07:19:13', '2025-03-18 07:19:13'),
(2, 'Siapa?', 'researcher@example.com', NULL, '$2y$12$X8mxZWGfdSHdN//1zx7JWevM9ZxGLC2iPe4zxwJtGq4UTh6O2J89m', NULL, '2025-03-18 08:10:36', '2025-04-10 20:12:32'),
(3, 'Pembeli Baru', 'buyer@example.com', NULL, '$2y$12$zTz1U.CiobTWMwgNdqhmXurBc7Oe0SpHs/8UpIabmvhYPAam.POgC', NULL, '2025-03-18 18:42:38', '2025-03-18 18:42:38'),
(4, 'Niko Simanjuntak', 'powl@gmail.com', NULL, '$2y$12$9ugRfa6xO0iXFFkY2CwH4OuB/4EGS4s2aTF7fOceKdi7MIoiDxgym', NULL, '2025-04-08 07:11:27', '2025-04-10 20:09:47'),
(11, 'Noris Sihombing', 'noris@gmail.com', NULL, '$2y$12$TCsQdEpGOZORxKb3ADgnPO9H2poN//QN9tV4E6CWMcgHCEx7qVCju', NULL, '2025-04-13 21:12:39', '2025-04-13 21:12:39'),
(12, 'Richard', 'chard@gmail.com', NULL, '$2y$12$G4uCX6sQS3durMY2N7J/SusL76Gc8S.0ZOtne1SToxeeX6bMhMgtK', NULL, '2025-04-14 07:59:07', '2025-04-14 07:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `vision_missions`
--

CREATE TABLE `vision_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('visi','misi') NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vision_missions`
--

INSERT INTO `vision_missions` (`id`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, 'visi', '<p>scsafsvfms,jsfnnzmnclsanfs</p>\r\n\r\n<h2 style=\"font-style:italic\"><tt>kjnxknsxlknSx</tt></h2>', '2025-04-12 00:05:08', '2025-04-12 00:27:36'),
(2, 'misi', '<p>xdlfsksfsc</p>\r\n\r\n<ol>\r\n	<li>sksackascs</li>\r\n	<li>sakcvmzxca</li>\r\n	<li>ssfsclzcs</li>\r\n	<li>sacsmczlfsa</li>\r\n	<li>dasmsacsa</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>safsalfklsa;fsafsa</p>\r\n\r\n<p>fsa,mfsa&#39;sa</p>\r\n\r\n<p>fsa</p>', '2025-04-12 00:05:08', '2025-04-12 00:26:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborators_user_id_foreign` (`user_id`),
  ADD KEY `collaborators_project_id_foreign` (`project_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `organization_structures`
--
ALTER TABLE `organization_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_structures_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_researcher_id_foreign` (`researcher_id`);

--
-- Indexes for table `project_collaborators`
--
ALTER TABLE `project_collaborators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_collaborators_project_id_researcher_id_unique` (`project_id`,`researcher_id`),
  ADD KEY `project_collaborators_researcher_id_foreign` (`researcher_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_researcher_id_foreign` (`researcher_id`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `researchers_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vision_missions`
--
ALTER TABLE `vision_missions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `organization_structures`
--
ALTER TABLE `organization_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_collaborators`
--
ALTER TABLE `project_collaborators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vision_missions`
--
ALTER TABLE `vision_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD CONSTRAINT `collaborators_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `collaborators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organization_structures`
--
ALTER TABLE `organization_structures`
  ADD CONSTRAINT `organization_structures_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `organization_structures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_researcher_id_foreign` FOREIGN KEY (`researcher_id`) REFERENCES `researchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_collaborators`
--
ALTER TABLE `project_collaborators`
  ADD CONSTRAINT `project_collaborators_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_collaborators_researcher_id_foreign` FOREIGN KEY (`researcher_id`) REFERENCES `researchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_researcher_id_foreign` FOREIGN KEY (`researcher_id`) REFERENCES `researchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `researchers`
--
ALTER TABLE `researchers`
  ADD CONSTRAINT `researchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
