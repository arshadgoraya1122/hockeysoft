-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 06:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hockysoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `title`, `heading`, `detail`, `image`, `created_at`, `updated_at`) VALUES
(1, 'About HockeySoft Technologies', 'Your Internet Partner & Hockey Solutions Experts', '<p>⦿ We provide the most comprehensive custom solutions for everything hockey!</p>\r\n<p>⦿ We listen carefully to your technical requirements.</p>\r\n<p>⦿ We tailor-make all projects based on your specific brand.</p>\r\n<p>⦿ We use the most modern technologies available.</p>\r\n<p>⦿ We provide quality training and outstanding technical support.</p>\r\n<p>⦿ We assure your 100% satisfaction.</p>\r\n<p>&nbsp;</p>\r\n<p>We love what we do, and we do it well. My team and I look forward to working with you, and becoming an integral part of your organizational promotion.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>John Sarantidis</strong>, President &amp; General Manager</em></p>', 'images/front/202306032214about.jpg', '2023-06-03 16:48:37', '2023-06-06 16:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `banner_sections`
--

CREATE TABLE `banner_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_sections`
--

INSERT INTO `banner_sections` (`id`, `heading`, `image`, `created_at`, `updated_at`) VALUES
(1, '<h2>At HockeySoft Technologies, we provide you with the tools to succeed!<br />We are the solution that you have been looking for.</h2>', 'images/front/202306040449logo.png', '2023-06-03 23:49:00', '2023-06-03 23:49:00');

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
-- Table structure for table `footer_services`
--

CREATE TABLE `footer_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_services`
--

INSERT INTO `footer_services` (`id`, `name`, `link`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '#', '1', '2023-06-04 06:07:09', '2023-06-04 06:07:09'),
(2, 'Our Services', '#', '1', '2023-06-04 06:17:49', '2023-06-04 06:17:49'),
(3, 'Projects', '#', '1', '2023-06-04 06:18:16', '2023-06-04 06:18:16'),
(4, 'News', '#', '1', '2023-06-04 06:18:31', '2023-06-04 06:18:31'),
(5, 'Technical Support', '#', '1', '2023-06-04 06:18:48', '2023-06-04 06:18:48'),
(6, 'Contact', '#', '1', '2023-06-04 06:19:06', '2023-06-04 06:19:06'),
(7, 'League Websites', '#', '2', '2023-06-04 06:23:05', '2023-06-04 06:23:05'),
(8, 'Tournament Websites', '#', '2', '2023-06-04 06:23:30', '2023-06-04 06:23:30'),
(9, 'Listing Performance Insights', '#', '2', '2023-06-04 14:57:18', '2023-06-04 14:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `footer_service_categories`
--

CREATE TABLE `footer_service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_service_categories`
--

INSERT INTO `footer_service_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Useful Links', '2023-06-04 05:43:40', '2023-06-04 05:43:40'),
(2, 'Our Niche', '2023-06-04 06:17:23', '2023-06-04 06:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ogimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_rights` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `heading`, `phone`, `email`, `logo`, `ogimage`, `meta_name`, `meta_title`, `meta_description`, `facebook`, `twitter`, `pinterest`, `linkedin`, `footer_text`, `copy_rights`, `meta_tags`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Contact HockeySoft Technologies', '+1 (431) 877-8361', 'info@hockeysoft.tech', 'images/front/202306041626logo.png', 'images/front/202306041626logo-2.png', 'hocky team', 'hocky site', 'hocky site discription', 'https://facebook.com', 'https://twitter.com', 'https://pinterest.com/feed', 'https://linkedin.com/feed', '<ul>\r\n<li>HockeySoft Technologies -&nbsp;<em>Above all, we love hockey!</em></li>\r\n</ul>', '<p>&nbsp;2023 HockeySoft.Tech - All Rights Reserved</p>', 'hocky, game,', '<p>27 Antoine Avenue<br />Winnipeg, MB - Canada<br />R2Y 0A7</p>', '<p>HockeySoft Technologies was created by hockey people, for hockey people. We know the intricacies of hockey, and recognize the importance of your correct promotion and professional online presence. Call us today to get started!</p>', '2023-06-04 11:26:58', '2023-06-04 11:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `hire_sections`
--

CREATE TABLE `hire_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hire_sections`
--

INSERT INTO `hire_sections` (`id`, `title`, `heading`, `link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Want to work with us?', 'Let’s Talk About Your Needs!', '#', '<p>Our team of experts will provide you with solutions, and guide you through the processes required to successfully build your project. Our prices are logical, our quality is superior, our support is impecable, and we hope to begin a long-lasting relationship with you, starting today! Please fill out the questioneer to get the ball rolling, or puck sliding, in our case.</p>', '2023-06-04 04:53:44', '2023-06-04 04:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2023_02_07_142215_create_permission_tables', 1),
(6, '2023_02_07_142619_create_products_table', 2),
(8, '2023_06_03_210035_create_about_sections_table', 4),
(9, '2023_06_03_221823_create_service_headings_table', 5),
(10, '2023_06_03_222129_create_services_table', 5),
(11, '2023_06_03_222716_create_service_items_table', 5),
(12, '2023_06_04_043642_create_banner_sections_table', 6),
(13, '2023_06_04_045947_create_portfolio_sections_table', 7),
(14, '2023_06_04_050036_create_portfolio_headings_table', 7),
(15, '2023_06_04_064933_create_testimonial_sections_table', 8),
(16, '2023_06_04_065235_create_testimonial_headings_table', 8),
(18, '2023_06_04_093339_create_hire_sections_table', 9),
(19, '2023_06_04_100651_create_newsletters_table', 10),
(20, '2023_06_04_102339_create_footer_services_table', 11),
(21, '2023_06_04_102906_create_footer_service_categories_table', 11),
(25, '2023_06_04_115606_create_generals_table', 12),
(26, '2023_06_04_173349_create_menus_table', 13),
(29, '2023_06_03_191247_create_slider_sections_table', 14),
(30, '2023_06_04_173718_create_submenus_table', 14),
(31, '2023_06_06_220030_create_options_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sign Up For Our Newsletter', 'We Offer An Informative Monthly Newsletter - Check It Out', '2023-06-04 05:14:25', '2023-06-04 05:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'service', '[\"4\",\"3\",\"1\",\"2\",\"5\",\"6\"]', '2023-06-07 05:30:37', '2023-06-07 05:50:52');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(2, 'role-create', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(3, 'role-edit', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(4, 'role-delete', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(5, 'product-list', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(6, 'product-create', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(7, 'product-edit', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(8, 'product-delete', 'web', '2023-02-07 10:56:38', '2023-02-07 10:56:38'),
(9, 'add-users', 'web', '2023-02-07 11:16:37', '2023-02-07 11:16:37'),
(10, 'admin-edit', 'web', '2023-06-03 15:22:54', '2023-06-03 15:22:54'),
(11, 'admin-delete', 'web', '2023-06-03 15:23:09', '2023-06-03 15:23:09');

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
-- Table structure for table `portfolio_headings`
--

CREATE TABLE `portfolio_headings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_headings`
--

INSERT INTO `portfolio_headings` (`id`, `title`, `heading`, `created_at`, `updated_at`) VALUES
(1, 'Featured Projects', 'Our Portfolio', '2023-06-04 01:38:30', '2023-06-04 01:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_sections`
--

CREATE TABLE `portfolio_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_sections`
--

INSERT INTO `portfolio_sections` (`id`, `title`, `domain`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Manitoba Major Junior Hockey League', 'MMa.ca', '<p>The Manitoba Major Junior Hockey League (MMJHL) is sanctioned by Hockey Canada. The MMJHL is a ten-team league operating in and around the city of Winnipeg for players aged 17-21.</p>', 'images/front/202306040629portfolio-4.jpg', '2023-06-04 01:29:42', '2023-06-04 01:29:42'),
(2, 'Manitoba Major Junior Hockey League', 'WHSHL.com', '<p>The Winnipeg High School Hockey League (WHSHL) is the largest high school hockey league in Canada. The WHSHL is comprised of 3 divisions, 38 teams, and over 700 players.</p>', 'images/front/202306040640portfolio-5.jpg', '2023-06-04 01:40:26', '2023-06-04 01:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Lorem, ipsum.', 'this is first product to use by us', '2023-02-07 11:35:36', '2023-02-07 11:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-02-07 10:57:49', '2023-02-07 10:57:49'),
(2, 'Manager', 'web', '2023-02-07 11:01:33', '2023-02-07 11:01:33'),
(3, 'Customer', 'web', '2023-02-08 11:00:46', '2023-02-08 11:00:46');

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
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 3),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `created_at`, `updated_at`) VALUES
(2, 'Hockey League Software & Websites', '2023-06-03 17:56:15', '2023-06-03 17:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `service_headings`
--

CREATE TABLE `service_headings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_headings`
--

INSERT INTO `service_headings` (`id`, `title`, `heading`, `created_at`, `updated_at`) VALUES
(1, 'Tailor Made Products for Your Organization', 'Our Products & Services', '2023-06-03 17:42:04', '2023-06-03 17:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `icon`, `title`, `category_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'icon-tools-2', 'Hockey League Management Software', '2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua</p>', '2023-06-03 18:21:57', '2023-06-03 18:27:57'),
(2, 'icon-expand', 'Hockey Tournament Management Software', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua', '2023-06-03 18:31:43', '2023-06-03 18:31:43'),
(3, 'icon-briefcase', 'Hockey Team Management Software', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua', '2023-06-03 18:32:20', '2023-06-03 18:32:20'),
(4, 'icon-presentation', 'Hockey Associations Management Software', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua', '2023-06-03 18:33:00', '2023-06-03 18:33:00'),
(5, 'icon-mobile', 'Professional & Modern Website Design Services', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua', '2023-06-03 18:33:44', '2023-06-03 18:33:44'),
(6, 'icon-layers', 'Hockey eShops for Leagues, Teams, Associations & Businesses', 'http://www.google.com', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua</p>', '2023-06-03 18:34:18', '2023-06-06 16:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `slider_sections`
--

CREATE TABLE `slider_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_sections`
--

INSERT INTO `slider_sections` (`id`, `url`, `meta_title`, `meta_description`, `button_text`, `button_url`, `logo1`, `logo2`, `background_image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '/about-us', 'hocky site', '<p>this is meta description&nbsp;</p>', 'Get A Quote', 'mailto:demo@example.com', 'images/front/202306071626logo.png', 'images/front/202306071626logo-black.png', 'images/front/202306071626slider-2.jpg', 'Complete Internet Hockey Solutions Made Easy!', '<p>HockeySoft Technologies provides you with an easy-to-use, customizeable league management software that is second-to-none. We offer real-time scoring systems, and modern, synchronous, user friendly, and aesthetically appealing web designs, customized, to correctly promote your league.</p>', '2023-06-07 11:26:17', '2023-06-07 11:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_headings`
--

CREATE TABLE `testimonial_headings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_headings`
--

INSERT INTO `testimonial_headings` (`id`, `title`, `heading`, `created_at`, `updated_at`) VALUES
(1, 'Testamonials', 'This is what people using our services are saying...', '2023-06-04 02:10:13', '2023-06-04 02:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_sections`
--

CREATE TABLE `testimonial_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_sections`
--

INSERT INTO `testimonial_sections` (`id`, `name`, `designation`, `rating`, `detail`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Susan Boggard', 'President HTJHL', '5', '<p>We couldn\'t be more pleased! HockeySoft provides quality services, and their prices are reasonable considering their products are the best in the industry.</p>', 'images/front/202306040703testimonial-1.jpg', '2023-06-04 02:03:45', '2023-06-04 02:03:45'),
(2, 'Kerry Lines', 'President MMJHL', '3', '<p>We are continuously being complimented on our website. The team at HockeySoft Technologies seamlessly implemented our real-time scoring this past season.</p>', 'images/front/202306040720testimonial-2.jpg', '2023-06-04 02:20:32', '2023-06-04 02:20:32');

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
(1, 'Hardik Savani', 'admin@gmail.com', NULL, '$2y$10$j5InbaGYnzlYzFU00MhzheQB39mejeoDnpYNiQxXkesCfUGlLU4oS', NULL, '2023-02-07 10:57:49', '2023-02-07 10:57:49'),
(2, 'Lorem, ipsum.', 'admin@admin.com', NULL, '$2y$10$YokkCDDLkyIh8PKRFfz3eu2gyZsuXdA/ymSlhfbh99gzIjCDNDmaS', NULL, '2023-02-07 11:00:58', '2023-02-07 11:00:58'),
(3, 'Arshad Ali', 'user@gmail.com', NULL, '$2y$10$tZw33LiKuv202t4KC2kW7uShStQvtSL19OPccS5PQ2lkmb3jMyxBu', NULL, '2023-02-08 10:54:45', '2023-02-08 10:54:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_sections`
--
ALTER TABLE `banner_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_services`
--
ALTER TABLE `footer_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_service_categories`
--
ALTER TABLE `footer_service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire_sections`
--
ALTER TABLE `hire_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `portfolio_headings`
--
ALTER TABLE `portfolio_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_headings`
--
ALTER TABLE `service_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_sections`
--
ALTER TABLE `slider_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `testimonial_headings`
--
ALTER TABLE `testimonial_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_sections`
--
ALTER TABLE `testimonial_sections`
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
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_sections`
--
ALTER TABLE `banner_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_services`
--
ALTER TABLE `footer_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `footer_service_categories`
--
ALTER TABLE `footer_service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hire_sections`
--
ALTER TABLE `hire_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_headings`
--
ALTER TABLE `portfolio_headings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_headings`
--
ALTER TABLE `service_headings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_sections`
--
ALTER TABLE `slider_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial_headings`
--
ALTER TABLE `testimonial_headings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial_sections`
--
ALTER TABLE `testimonial_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
