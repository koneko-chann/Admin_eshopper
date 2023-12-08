-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2023 at 10:54 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(15, 9, 10, 2, '2023-12-06 12:46:40', '2023-12-06 12:46:48'),
(20, 1, 19, 14, '2023-12-07 12:35:03', '2023-12-07 12:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `parent_id`, `deleted_at`) VALUES
(12, '2023-10-29 11:01:13', '2023-10-29 12:00:35', 'Koneko', '0', '2023-10-29 12:00:35'),
(13, '2023-10-29 11:40:19', '2023-10-29 12:11:33', 'huy156456', '12', '2023-10-29 12:11:33'),
(14, '2023-10-29 12:11:39', '2023-12-07 10:14:53', 'Earpod', '0', NULL),
(15, '2023-10-29 12:11:47', '2023-10-31 13:26:29', 'huy22', '14', '2023-10-31 13:26:29'),
(16, '2023-10-31 13:26:15', '2023-11-24 12:53:50', 'DM2', '14', '2023-11-24 12:53:50'),
(17, '2023-10-31 13:26:23', '2023-11-20 12:44:21', 'DM1', '16', '2023-11-20 12:44:21'),
(18, '2023-11-24 12:46:21', '2023-11-24 12:53:48', 'asasas', '16', '2023-11-24 12:53:48'),
(19, '2023-11-24 13:20:13', '2023-11-29 03:57:06', 'huy', '14', '2023-11-29 03:57:06'),
(20, '2023-12-06 05:46:18', '2023-12-07 10:18:31', 'DM 3.1', '14', '2023-12-07 10:18:31'),
(21, '2023-12-06 05:46:28', '2023-12-06 05:46:51', 'DM3.1.1', '20', '2023-12-06 05:46:51'),
(22, '2023-12-07 10:18:43', '2023-12-07 10:18:43', 'True Wireless', '0', NULL),
(23, '2023-12-07 10:21:07', '2023-12-07 10:21:07', 'Loa', '0', NULL),
(24, '2023-12-07 10:21:19', '2023-12-07 10:21:19', 'Tai nghe có dây', '0', NULL),
(25, '2023-12-07 10:21:32', '2023-12-07 10:21:32', 'Headphones', '0', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_23_192010_create_categories_table', 1),
(6, '2023_10_25_215919_add_column', 2),
(7, '2023_10_25_220433_drop_column', 3),
(8, '2023_10_25_220609_drop_column', 4),
(9, '2023_10_26_190123_drop_table', 5),
(10, '2023_10_29_185341_delete_model', 6),
(11, '2023_10_31_183001_create_menus_table', 7),
(12, '2023_10_31_194011_add_slig', 8),
(13, '2023_10_31_201636_soft_delete_menus', 9),
(14, '2023_11_01_202804_create_products_table', 10),
(15, '2023_11_01_203039_create_product_images_table', 10),
(16, '2023_11_01_203204_create_tags_table', 10),
(17, '2023_11_01_203244_create_product_tags_table', 10),
(18, '2023_11_03_105418_add_column_feature_image_name', 11),
(19, '2023_11_03_181457_add_feature_name', 12),
(20, '2023_11_03_190256_add_column_image_name_to_table_product_image', 13),
(21, '2023_11_06_194901_add_soft_delete_to_product', 14),
(22, '2023_11_06_194915_add_soft_delete_to_product', 14),
(23, '2023_11_09_191600_create_sliders_table', 15),
(24, '2023_11_09_202951_soft_delte_slider', 16),
(25, '2023_11_10_191923_create_settings_table', 17),
(26, '2023_11_11_201106_add_comlumn_type_settings_table', 18),
(27, '2023_11_11_201744_add_comlumn_type_settings_table', 19),
(28, '2014_10_12_100000_create_password_resets_table', 20),
(29, '2023_11_12_204506_create_roles_table', 21),
(30, '2023_11_12_204526_create_permissions_table', 21),
(31, '2023_11_12_204646_create_table_user_role', 21),
(32, '2023_11_12_204726_create_table_permission_rol', 21),
(33, '2023_11_13_163802_add_soft_dele_settings', 22),
(34, '2023_11_13_183955_soft_del_user', 23),
(35, '2023_11_13_192922_add_column_parent_id_permission', 24),
(36, '2023_11_14_170713_add_column_key_code_permission_table', 25),
(37, '2023_11_24_191847_add_active', 26),
(38, '2023_11_24_201852_hello', 27),
(39, '2023_11_26_191508_add_view_count', 28),
(40, '2023_11_29_111234_create_carts_table', 29),
(41, '2023_11_29_160650_add_slug_to_products_table', 30),
(42, '2023_11_30_102319_add_constraint_product_tags', 31),
(43, '2023_11_30_102437_add_constraint_product_tags', 32),
(44, '2023_11_30_103922_add_constraint_product_tags', 33),
(45, '2023_11_30_103942_add_constraint_product_tags', 33),
(46, '2023_11_30_104017_add_constraint_product_tags', 33),
(47, '2023_11_30_104225_add_constraint_product_tags', 34),
(48, '2023_11_30_104653_add_constraint_image', 35),
(49, '2023_11_30_105243_add_constraint_image', 35),
(50, '2023_11_30_105355_add_constraint_role_user', 36),
(51, '2023_11_30_105757_add_constraint_image', 37),
(52, '2023_12_01_190427_add_constraint', 38),
(53, '2023_12_06_130406_create_orders_table', 39),
(54, '2023_12_06_131347_create_order_items_table', 40),
(55, '2023_12_06_182055_add_address_column', 41),
(56, '2023_12_06_183734_add_more_column', 42),
(57, '2023_12_06_185505_add_phone', 43),
(58, '2023_12_06_192418_add_name', 44),
(59, '2023_12_06_192510_add_address', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_price` double(16,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `payment_method`, `created_at`, `updated_at`, `shipping_address`, `phone_number`, `first_name`, `last_name`, `address`) VALUES
(3, 1, 2188086864126.00, 1, 'cash', '2023-12-06 12:28:42', '2023-12-06 12:28:42', NULL, '0386239871', 'trần', 'huy', 'Tỉnh Cao Bằng/Huyện Hà Quảng/Xã Sóc Hà/viet nam'),
(4, 10, 6672988063397.00, 1, 'cash', '2023-12-06 13:00:07', '2023-12-06 13:00:07', NULL, '0386239871', 'trần', 'huy', 'Tỉnh Bắc Giang/Huyện Yên Thế/Xã An Thượng/viet nam');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 30, 109393.00, '2023-12-06 12:28:42', '2023-12-06 12:28:42'),
(3, 3, 4, 2, 109393678.00, '2023-12-06 12:28:42', '2023-12-06 12:28:42'),
(4, 3, 8, 1, 1093932397490.00, '2023-12-06 12:28:42', '2023-12-06 12:28:42'),
(5, 3, 10, 1, 1093932397490.00, '2023-12-06 12:28:42', '2023-12-06 12:28:42'),
(6, 4, 10, 1, 1093932397490.00, '2023-12-06 13:00:07', '2023-12-06 13:00:07'),
(7, 4, 8, 1, 1093932397490.00, '2023-12-06 13:00:07', '2023-12-06 13:00:07'),
(8, 4, 7, 4, 1093932397490.00, '2023-12-06 13:00:07', '2023-12-06 13:00:07'),
(9, 4, 5, 1, 109393678457.00, '2023-12-06 13:00:07', '2023-12-06 13:00:07');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `key_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(66, 'category', 'category', '2023-11-16 12:22:59', '2023-11-16 12:22:59', 0, NULL),
(67, 'list', 'list', '2023-11-16 12:22:59', '2023-11-16 12:22:59', 66, 'list_category'),
(68, 'add', 'add', '2023-11-16 12:22:59', '2023-11-16 12:22:59', 66, 'add_category'),
(69, 'edit', 'edit', '2023-11-16 12:22:59', '2023-11-16 12:22:59', 66, 'edit_category'),
(70, 'delete', 'delete', '2023-11-16 12:22:59', '2023-11-16 12:22:59', 66, 'delete_category'),
(71, 'menu', 'menu', '2023-11-16 12:23:04', '2023-11-16 12:23:04', 0, NULL),
(72, 'list', 'list', '2023-11-16 12:23:04', '2023-11-16 12:23:04', 71, 'list_menu'),
(73, 'add', 'add', '2023-11-16 12:23:04', '2023-11-16 12:23:04', 71, 'add_menu'),
(74, 'edit', 'edit', '2023-11-16 12:23:04', '2023-11-16 12:23:04', 71, 'edit_menu'),
(75, 'delete', 'delete', '2023-11-16 12:23:04', '2023-11-16 12:23:04', 71, 'delete_menu'),
(76, 'slider', 'slider', '2023-11-16 12:23:08', '2023-11-16 12:23:08', 0, NULL),
(77, 'list', 'list', '2023-11-16 12:23:08', '2023-11-16 12:23:08', 76, 'list_slider'),
(78, 'add', 'add', '2023-11-16 12:23:08', '2023-11-16 12:23:08', 76, 'add_slider'),
(79, 'edit', 'edit', '2023-11-16 12:23:08', '2023-11-16 12:23:08', 76, 'edit_slider'),
(80, 'delete', 'delete', '2023-11-16 12:23:08', '2023-11-16 12:23:08', 76, 'delete_slider'),
(81, 'product', 'product', '2023-11-16 12:23:12', '2023-11-16 12:23:12', 0, NULL),
(82, 'list', 'list', '2023-11-16 12:23:12', '2023-11-16 12:23:12', 81, 'list_product'),
(83, 'add', 'add', '2023-11-16 12:23:12', '2023-11-16 12:23:12', 81, 'add_product'),
(84, 'edit', 'edit', '2023-11-16 12:23:12', '2023-11-16 12:23:12', 81, 'edit_product'),
(85, 'delete', 'delete', '2023-11-16 12:23:12', '2023-11-16 12:23:12', 81, 'delete_product'),
(86, 'setting', 'setting', '2023-11-16 12:23:15', '2023-11-16 12:23:15', 0, NULL),
(87, 'list', 'list', '2023-11-16 12:23:15', '2023-11-16 12:23:15', 86, 'list_setting'),
(88, 'add', 'add', '2023-11-16 12:23:15', '2023-11-16 12:23:15', 86, 'add_setting'),
(89, 'edit', 'edit', '2023-11-16 12:23:15', '2023-11-16 12:23:15', 86, 'edit_setting'),
(90, 'delete', 'delete', '2023-11-16 12:23:15', '2023-11-16 12:23:15', 86, 'delete_setting'),
(91, 'role', 'role', '2023-11-16 12:23:19', '2023-11-16 12:23:19', 0, NULL),
(92, 'list', 'list', '2023-11-16 12:23:19', '2023-11-16 12:23:19', 91, 'list_role'),
(93, 'add', 'add', '2023-11-16 12:23:19', '2023-11-16 12:23:19', 91, 'add_role'),
(94, 'edit', 'edit', '2023-11-16 12:23:19', '2023-11-16 12:23:19', 91, 'edit_role'),
(95, 'delete', 'delete', '2023-11-16 12:23:19', '2023-11-16 12:23:19', 91, 'delete_role'),
(96, 'user', 'user', '2023-11-16 12:40:13', '2023-11-16 12:40:13', 0, NULL),
(97, 'list', 'list', '2023-11-16 12:40:13', '2023-11-16 12:40:13', 96, 'list_user'),
(98, 'add', 'add', '2023-11-16 12:40:13', '2023-11-16 12:40:13', 96, 'add_user'),
(99, 'edit', 'edit', '2023-11-16 12:40:13', '2023-11-16 12:40:13', 96, 'edit_user'),
(100, 'delete', 'delete', '2023-11-16 12:40:13', '2023-11-16 12:40:13', 96, 'delete_user');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(25, 1, 92, NULL, NULL),
(39, 1, 72, NULL, NULL),
(40, 1, 73, NULL, NULL),
(41, 1, 74, NULL, NULL),
(42, 1, 75, NULL, NULL),
(43, 1, 77, NULL, NULL),
(44, 1, 78, NULL, NULL),
(45, 1, 79, NULL, NULL),
(46, 1, 80, NULL, NULL),
(47, 1, 82, NULL, NULL),
(48, 1, 83, NULL, NULL),
(49, 1, 84, NULL, NULL),
(50, 1, 85, NULL, NULL),
(51, 1, 87, NULL, NULL),
(52, 1, 88, NULL, NULL),
(53, 1, 89, NULL, NULL),
(54, 1, 90, NULL, NULL),
(55, 1, 93, NULL, NULL),
(56, 1, 94, NULL, NULL),
(57, 1, 95, NULL, NULL),
(58, 1, 97, NULL, NULL),
(59, 1, 98, NULL, NULL),
(60, 1, 99, NULL, NULL),
(61, 1, 100, NULL, NULL),
(65, 1, 70, NULL, NULL),
(66, 1, 67, NULL, NULL),
(69, 2, 67, NULL, NULL),
(70, 2, 72, NULL, NULL),
(71, 2, 77, NULL, NULL),
(72, 2, 82, NULL, NULL),
(73, 2, 87, NULL, NULL),
(74, 2, 92, NULL, NULL),
(75, 2, 97, NULL, NULL),
(76, 1, 68, NULL, NULL),
(77, 1, 69, NULL, NULL),
(78, 2, 68, NULL, NULL),
(79, 2, 69, NULL, NULL),
(80, 2, 70, NULL, NULL),
(81, 2, 73, NULL, NULL),
(82, 2, 74, NULL, NULL),
(83, 2, 75, NULL, NULL),
(84, 2, 78, NULL, NULL),
(85, 2, 79, NULL, NULL),
(86, 2, 80, NULL, NULL),
(87, 2, 83, NULL, NULL),
(88, 2, 84, NULL, NULL),
(89, 2, 85, NULL, NULL),
(90, 2, 88, NULL, NULL),
(91, 2, 89, NULL, NULL),
(92, 2, 90, NULL, NULL),
(93, 2, 93, NULL, NULL),
(94, 2, 94, NULL, NULL),
(95, 2, 95, NULL, NULL),
(96, 2, 98, NULL, NULL),
(97, 2, 99, NULL, NULL),
(98, 2, 100, NULL, NULL),
(99, 3, 67, NULL, NULL),
(100, 3, 68, NULL, NULL),
(101, 3, 69, NULL, NULL),
(102, 3, 70, NULL, NULL),
(103, 3, 72, NULL, NULL),
(104, 3, 73, NULL, NULL),
(105, 3, 74, NULL, NULL),
(106, 3, 75, NULL, NULL),
(107, 3, 77, NULL, NULL),
(108, 3, 78, NULL, NULL),
(109, 3, 79, NULL, NULL),
(110, 3, 80, NULL, NULL),
(111, 3, 82, NULL, NULL),
(112, 3, 83, NULL, NULL),
(113, 3, 84, NULL, NULL),
(114, 3, 85, NULL, NULL),
(115, 3, 87, NULL, NULL),
(116, 3, 88, NULL, NULL),
(117, 3, 89, NULL, NULL),
(118, 3, 90, NULL, NULL),
(119, 3, 92, NULL, NULL),
(120, 3, 93, NULL, NULL),
(121, 3, 94, NULL, NULL),
(122, 3, 95, NULL, NULL),
(123, 3, 97, NULL, NULL),
(124, 3, 98, NULL, NULL),
(125, 3, 99, NULL, NULL),
(126, 3, 100, NULL, NULL),
(127, 4, 67, NULL, NULL),
(128, 4, 68, NULL, NULL),
(129, 4, 69, NULL, NULL),
(130, 4, 70, NULL, NULL),
(131, 4, 72, NULL, NULL),
(132, 4, 73, NULL, NULL),
(133, 4, 74, NULL, NULL),
(134, 4, 75, NULL, NULL),
(135, 4, 77, NULL, NULL),
(136, 4, 78, NULL, NULL),
(137, 4, 79, NULL, NULL),
(138, 4, 80, NULL, NULL),
(139, 4, 82, NULL, NULL),
(140, 4, 83, NULL, NULL),
(141, 4, 84, NULL, NULL),
(142, 4, 85, NULL, NULL),
(143, 4, 87, NULL, NULL),
(144, 4, 88, NULL, NULL),
(145, 4, 89, NULL, NULL),
(146, 4, 90, NULL, NULL),
(147, 4, 92, NULL, NULL),
(148, 4, 93, NULL, NULL),
(149, 4, 94, NULL, NULL),
(150, 4, 95, NULL, NULL),
(151, 4, 97, NULL, NULL),
(152, 4, 98, NULL, NULL),
(153, 4, 99, NULL, NULL),
(154, 4, 100, NULL, NULL),
(155, 5, 67, NULL, NULL),
(156, 5, 68, NULL, NULL),
(157, 5, 69, NULL, NULL),
(158, 5, 70, NULL, NULL),
(159, 5, 72, NULL, NULL),
(160, 5, 73, NULL, NULL),
(161, 5, 74, NULL, NULL),
(162, 5, 75, NULL, NULL),
(163, 5, 77, NULL, NULL),
(164, 5, 78, NULL, NULL),
(165, 5, 79, NULL, NULL),
(166, 5, 80, NULL, NULL),
(167, 5, 82, NULL, NULL),
(168, 5, 83, NULL, NULL),
(169, 5, 84, NULL, NULL),
(170, 5, 85, NULL, NULL),
(171, 5, 87, NULL, NULL),
(172, 5, 88, NULL, NULL),
(173, 5, 89, NULL, NULL),
(174, 5, 90, NULL, NULL),
(175, 5, 92, NULL, NULL),
(176, 5, 93, NULL, NULL),
(177, 5, 94, NULL, NULL),
(178, 5, 95, NULL, NULL),
(179, 5, 97, NULL, NULL),
(180, 5, 98, NULL, NULL),
(181, 5, 99, NULL, NULL),
(182, 5, 100, NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(16,0) NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `view_count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `feature_image_name`, `deleted_at`, `view_count`) VALUES
(1, 'Koneko', 'koneko', '109393', '/storage/product/1/2GfhY6yt869SxJIFmWot.jpg', '<p>asdasd</p>', 1, 14, '2023-11-03 11:29:16', '2023-11-29 09:08:46', '85797661_p0_master1200.jpg', NULL, 0),
(2, 'Koneko', NULL, '109393', '/storage/product/1/lEleOCjB5H8gkMb4b9n5.jpg', '<p>asdasd</p>', 1, 14, '2023-11-03 11:29:32', '2023-11-03 11:29:32', '85797661_p0_master1200.jpg', NULL, 1),
(3, 'Koneko', NULL, '109393678', '/storage/product/1/E1SQk16j8jZ82Bv8wr3r.jpg', '<p>gdfgdfg</p>', 1, 14, '2023-11-03 12:18:36', '2023-11-03 12:18:36', 'En_nGkuVgAI1JrE.jpg', NULL, 0),
(4, 'Koneko', NULL, '109393678', '/storage/product/1/cby5K7PHkBQiCCVyGVww.jpg', '<p>gdfgdfg</p>', 1, 14, '2023-11-03 12:21:08', '2023-11-03 12:21:08', 'En_nGkuVgAI1JrE.jpg', NULL, 0),
(5, 'Koneko56', NULL, '109393678457', '/storage/product/1/psOzInVrgdZsWBXUX6ZK.jpg', '<p>gdfgdfg</p>', 1, 14, '2023-11-03 12:21:32', '2023-11-03 12:21:32', 'En_nGkuVgAI1JrE.jpg', NULL, 0),
(6, 'Koneko21424', NULL, '1093932397490', '/storage/product/1/ZD6CWd6ZcvbCFD3TsRrl.jpg', '<p>Hello</p>', 1, 14, '2023-11-03 12:28:54', '2023-11-03 12:28:54', '85797661_p0_master1200.jpg', NULL, 2),
(7, 'Koneko21424', NULL, '1093932397490', '/storage/product/1/bkMv9F4tB2nku9G2RQx1.jpg', '<p>Hello</p>', 1, 14, '2023-11-03 12:29:36', '2023-11-03 12:29:36', '85797661_p0_master1200.jpg', NULL, 3),
(8, 'Koneko21424', NULL, '1093932397490', '/storage/product/1/iPZFrG9t16G26G1dldCR.jpg', '<p>Hello</p>', 1, 14, '2023-11-03 12:30:02', '2023-11-03 12:30:02', '85797661_p0_master1200.jpg', NULL, 0),
(10, 'Koneko21424', NULL, '1093932397490', '/storage/product/1/yTWGlYUFJCCwXw9xmCkG.jpg', '<p>Hello</p>', 1, 14, '2023-11-03 12:30:34', '2023-11-03 12:30:34', '85797661_p0_master1200.jpg', NULL, 0),
(15, 'huy', NULL, '109393', '/storage/product/1/e0Y9fpVRUfvgK1cjTdzA.jpg', '<p>heklki</p>', 1, 14, '2023-11-05 11:35:52', '2023-11-29 03:57:37', '85797661_p0_master1200.jpg', '2023-11-29 03:57:37', 0),
(16, 'ffff', NULL, '456546', NULL, '456456456', 7, 17, NULL, NULL, NULL, NULL, 0),
(17, 'Tai nghe Bluetooth Apple AirPods Pro 2023 Magsafe', NULL, '120000', '/storage/product/1/zDX3vzZZpue6OmDJqLvs.png', '<p>Tai nghe AirPods Pro Magsafe 2021 - Trải nghi&ecirc;̣m &acirc;m thanh đ&acirc;̀y m&ecirc; hoặc<br />Thi&ecirc;́t k&ecirc;́ cải ti&ecirc;́n tăng đ&ocirc;̣ &ecirc;m nhẹ khi đeo<br />AirPods Pro 2021 được Apple tái thi&ecirc;́t k&ecirc;́ nhằm mang đ&ecirc;́n trải nghi&ecirc;̣m nghe nhạc &ecirc;m ái, kh&ocirc;ng g&acirc;y đau tai cho bạn. M&ocirc;̃i b&ecirc;n củ tai AirPods Pro 2021 có thi&ecirc;́t k&ecirc;́ nhét trong, với ba kích thước đ&ecirc;̣m tai silicone khác nhau cho bạn tự chọn kích thước vừa nh&acirc;́t. Ph&acirc;̀n đ&ecirc;̣m tai cũng được Apple thi&ecirc;́t k&ecirc;́ đ&ecirc;̉ ngăn tạp &acirc;m lọt vào trong, cho bạn m&ocirc;̣t trải nghi&ecirc;̣m nghe nhạc trọn vẹn.</p>\r\n<p>AirPods Pro Magsafe còn đạt chu&acirc;̉n ch&ocirc;́ng nước và ch&ocirc;́ng th&acirc;́m m&ocirc;̀ h&ocirc;i cho các hoạt đ&ocirc;̣ng t&acirc;̣p luy&ecirc;̣n cường đ&ocirc;̣ nặng. Tai nghe còn tích hợp c&ocirc;̉ng microphone mở r&ocirc;̣ng giúp tăng cường ch&acirc;́t lượng nghe gọi trong m&ocirc;i trường có gió mạnh.<br />&Acirc;m thanh đẳng c&acirc;́p, cách &acirc;m ưu vi&ecirc;̣t<br />AirPods Pro 2021 mang đ&ecirc;́n ch&acirc;́t lượng &acirc;m thanh đặc sắc và đẳng c&acirc;́p. B&ecirc;n trong tai nghe cũng trang bị các ph&acirc;̀n cứng giúp tăng cường đ&ocirc;̣ mạnh &acirc;m bass, c&acirc;n bằng các dải &acirc;m th&acirc;́p và trung, cũng như lọc ti&ecirc;́ng &ocirc;̀n khi thu &acirc;m giọng nói cho ch&acirc;́t lượng cu&ocirc;̣c gọi t&ocirc;́t hơn.<br />Sạc pin ti&ecirc;̣n lợi qua cổng USB-C, dùng kh&ocirc;ng ngừng nghỉ<br />Tai nghe AirPods Pro 2021 Magsafe được lưu giữ trong h&ocirc;̣p đựng màu trắng sang trọng - và cũng là h&ocirc;̣p sạc kh&ocirc;ng d&acirc;y MagSafe. H&ocirc;̣p sạc được Apple ch&ecirc;́ tạo giúp tương thích với kh&ocirc;ng chỉ sạc MagSafe, mà còn với nhi&ecirc;̀u loại đ&ecirc;́ sạc kh&ocirc;ng d&acirc;y khác. Và m&ocirc;̃i khi AirPods Pro 2021 đạt trạng thái pin th&acirc;́p, tai nghe sẽ tự đ&ocirc;̣ng gửi th&ocirc;ng báo đ&ecirc;́n iPhone cho vi&ecirc;̣c sạc pin kịp thời.</p>', 1, 14, '2023-12-07 10:14:33', '2023-12-07 10:14:33', '1655224993.png', NULL, 0),
(18, 'Tai nghe không dây JBL Live Pro+', NULL, '2290000', '/storage/product/1/Rd2WB8vrj2Cy294wvXev.webp', '<p>Tai nghe JBL Live Pro+ &ndash; &Acirc;m thanh chất lượng<br />JBL l&agrave; một thương hiệu &acirc;m thanh nổi tiếng v&agrave; được nhiều người biết đến tr&ecirc;n thế giới. mới đ&acirc;y h&atilde;ng vừa cho ra mắt sản phẩm tai nghe kh&ocirc;ng d&acirc;y mang t&ecirc;n JBL Live Pro Plus. Mẫu tai nghe với &acirc;m thanh chất lượng c&ugrave;ng dung lượng pin lớn.<br />Thiết kế nhỏ gọn, hỗ trợ chống nước IPX4<br />Live Pro Plus sở hữu một thiết kế v&ocirc; c&ugrave;ng nhỏ gọn với trọng lượng chỉ 10g. Đặc biệt với bộ 5 n&uacute;t silicone k&egrave;m theo gi&uacute;p tai nghe dễ d&agrave;ng sử dụng cho nhiều k&iacute;ch thước tai kh&aacute;c nhau.<br />JBL Live Pro Plus với dung lượng pin lớn với 28 giờ sử dụng<br />Tai nghe kh&ocirc;ng d&acirc;y JBL Live Pro Plus được trang bị dung lượng pin lớn cho 7 giờ sử dụng mỗi lần sạc c&ugrave;ng 21 giờ trọng hộp, tổng lại người d&ugrave;ng c&oacute; tới 28 giờ. Đặc biệt c&ograve;n hỗ trợ t&iacute;nh năng sạc kh&ocirc;ng d&acirc;y Qi.</p>', 1, 14, '2023-12-07 10:18:14', '2023-12-07 10:18:14', 'jbl_live_pro_11.webp', NULL, 0),
(19, 'Tai nghe có dây Nokia WB-101', NULL, '200000', '/storage/product/1/XhKeVRZeGKi8bwTeuyvP.webp', '<p>Thiết kế nhỏ gọn, chất lượng &acirc;m thanh tuyệt vời<br />Tai nghe Nokia WB-101 được thiết kế với phong c&aacute;ch đơn giản tối thiểu, kết hợp với c&aacute;c gam m&agrave;u phổ biến dễ sử dụng. Với m&uacute;t nh&eacute;t tai l&agrave;m bằng chất liệu Silicon mềm dẻo tạo n&ecirc;n cảm gi&aacute;c thoải m&aacute;i khi đeo chứ kh&ocirc;ng bị đau nhức tai khi nghe qu&aacute; l&acirc;u.&nbsp;<br />Tai nghe được thiết kế nhỏ gọn c&oacute; thể dễ d&agrave;ng bỏ trong t&uacute;i hay balo mang theo bất cứ đ&acirc;u. Lớp vỏ b&ecirc;n ngo&agrave;i được l&agrave;m bằng nguy&ecirc;n liệu hợp kim nh&ocirc;m, được bao phủ 1 lớp nhựa b&ecirc;n ngo&agrave;i để bảo vệ, chống bị xước trầy.<br />Ph&iacute;m tăng giảm &acirc;m lượng v&agrave; nghe cuộc gọi được để ở ch&iacute;nh giữa d&acirc;y tai nghe.<br />Điều khiển tai nghe th&iacute;ch hợp để mang lại &acirc;m nhạc &ecirc;m &aacute;i, dễ chịu<br />Tai nghe c&oacute; d&acirc;y Nokia WB-101 ph&aacute;t ra chất lượng &acirc;m thanh t&ocirc;ng trầm v&agrave; t&ocirc;ng trung vừa phải. Tai nghe n&agrave;y sử dụng một m&agrave;ng k&eacute;p graphene để gi&uacute;p giữ lại c&aacute;c chất &acirc;m chi tiết nhỏ. Graphene được nhiều nh&agrave; sản xuất tin d&ugrave;ng v&igrave; vật liệu mỏng v&agrave; th&acirc;n thiện với m&ocirc;i trường, gi&uacute;p cho tạo ra &acirc;m thanh phong ph&uacute; v&agrave; r&otilde; r&agrave;ng hơn.</p>', 1, 24, '2023-12-07 10:20:53', '2023-12-07 10:21:50', 'group_194_2.webp', NULL, 0),
(20, 'Loa Bluetooth Soundpeats Halo', NULL, '500000', '/storage/product/1/96gidRF1gX5p2AxFePID.webp', '<p style=\"font-weight: 400;\">Những chiếc loa &acirc;m thanh giờ đ&acirc;y đ&atilde; trở th&agrave;nh một phần kh&ocirc;ng thể thiếu trong mọi bữa tiệc, l&agrave; một thiết bị &acirc;m thanh y&ecirc;u th&iacute;ch của c&aacute;c bạn trẻ khi đi du lịch hoặc đi chơi xa. Nếu bạn đang t&igrave;m kiếm một thiết bị loa Bluetooth với thiết kế nhỏ gọn, thời trang c&ugrave;ng &acirc;m thanh chất lượng v&agrave; pin tr&acirc;u th&igrave; đừng vội bỏ qua loa Bluetooth SoundPEATS Halo hội tụ đầy đủ c&aacute;c yếu tố tr&ecirc;n c&ugrave;ng với gi&aacute; th&agrave;nh cực kỳ hợp l&yacute;!</p>\r\n<h2><strong>K&iacute;ch thước nhỏ gọn dễ d&agrave;ng mang đi trong mọi h&agrave;nh tr&igrave;nh</strong></h2>\r\n<p style=\"font-weight: 400;\">Sản phẩm loa Bluetooth SoundPEATS Halo đi c&ugrave;ng với m&agrave;u đen v&agrave; k&iacute;ch thước lần lượt l&agrave; 98 x 98 x 47.3mm v&agrave; trọng lượng 256,2g để bạn c&oacute; thể dễ d&agrave;ng mang đi mu&ocirc;n nơi. Thương hiệu đ&atilde; chiều l&ograve;ng tất cả c&aacute;c fan h&acirc;m mộ với thế hệ loa mới n&agrave;y với sự ho&agrave;n hảo ở hệ suất &acirc;m thanh vượt trội v&agrave; thiết kế vỏ bện tinh tế c&ugrave;ng vật liệu chắc chắn.</p>\r\n<p style=\"font-weight: 400;\">Thiết bị loa c&oacute; khả năng kh&aacute;ng nước chuẩn IPX5 để bạn c&oacute; thể v&ocirc; tư sử dụng trong mọi điều kiện thời tiết như mưa nhẹ ngo&agrave;i trời. Loa Bluetooth c&oacute; đi k&egrave;m với một dải gắn k&egrave;m theo cho ph&eacute;p bạn tiện lợi mang loa ngo&agrave;i trời cho c&aacute;c hoạt động nghệ thuật của m&igrave;nh.</p>\r\n<p style=\"font-weight: 400;\">&nbsp;</p>\r\n<p style=\"font-weight: 400;\">Loa Bluetooth c&oacute; chứa &aacute;nh s&aacute;ng RGB 3 m&agrave;u c&oacute; thể được điều khiển bằng n&uacute;t bấm ở ph&iacute;a dưới để khiến cho kh&ocirc;ng gian bữa tiệc nh&agrave; bạn trở n&ecirc;n sống động hơn bao giờ hết. Sự ho&agrave;n mỹ trong thiết kế cho ph&eacute;p loa kh&ocirc;ng d&acirc;y hoạt động trơn tru phục vụ cho mọi nhu&nbsp;cầu giải tr&iacute; v&agrave; c&ocirc;ng việc của bạn m&agrave; kh&ocirc;ng g&acirc;y ảnh hưởng đến m&ocirc;i trường xung quanh.</p>\r\n<h2><strong>Trải nghiệm sống động với Driver 40mm cực chất</strong></h2>\r\n<p style=\"font-weight: 400;\">&Acirc;m thanh c&oacute; tr&ecirc;n sản phẩm loa Bluetooth SoundPEATS Halo được tinh chỉnh bởi thuật to&aacute;n hiệu ứng &acirc;m thanh hiện đại v&agrave; chuẩn x&aacute;c qua đa tần số với &acirc;m bass mạnh mẽ. Hơn nữa, thiết bị loa c&ograve;n được trang bị Driver 40mm c&ugrave;ng tần số 20Hz-20kHz c&oacute; thể t&aacute;i tạo &acirc;m thanh chi tiết phục vụ tốt cho cả việc giải tr&iacute; cũng như đ&agrave;m thoại cực kỳ sống động.</p>\r\n<p style=\"font-weight: 400;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2022/10/17/11_638016212445070351.jpg\" alt=\"\" width=\"800\" height=\"495\" /></p>\r\n<p style=\"font-weight: 400;\">Loa Bluetooth SoundPEATS Halo c&oacute; chứa micr&ocirc; b&ecirc;n trong để bạn c&oacute; thể thỏa th&iacute;ch tr&ograve; chuyện trong c&aacute;c cuộc hội nghị của m&igrave;nh.</p>\r\n<h2><strong>Kết nối Bluetooth 5.0 nhanh hơn bao giờ hết</strong></h2>\r\n<p style=\"font-weight: 400;\">Loa Bluetooth SoundPEATS Halo c&oacute; khả năng tương th&iacute;ch rộng v&agrave; kết nối khả dụng với hầu hết c&aacute;c thiết bị hỗ trợ Bluetooth như điện thoại th&ocirc;ng minh, m&aacute;y t&iacute;nh bảng hay m&aacute;y t&iacute;nh x&aacute;ch tay. Ngo&agrave;i ra, c&ocirc;ng nghệ Bluetooth 5.0 c&oacute; tr&ecirc;n sản phẩm sẽ đảm bảo truyền tải nhanh v&agrave; ổn định trong phạm vi 10m.</p>\r\n<p style=\"font-weight: 400;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2022/10/17/11_638016212445070351.jpg\" alt=\"\" width=\"800\" height=\"495\" /></p>\r\n<p style=\"font-weight: 400;\">Bạn c&oacute; thể thử trải nghiệm chế độ &acirc;m thanh nổi tr&ecirc;n thiết bị sẽ hỗ trợ kết nối hai loa c&ugrave;ng l&uacute;c để đem lại &acirc;m lượng đ&atilde; nhất. Sản phẩm loa đi k&egrave;m với dung lượng pin 1800mAh c&oacute; thời gian sạc 3 tiếng đồng hồ hỗ trợ sạc USB Type C đầu v&agrave;o 5V / 1A. Loa Bluetooth SoundPEATS Halo c&oacute; tổng thời gian ph&aacute;t nhạc (60% &acirc;m lượng) khi bật đ&egrave;n l&agrave; 14h trong khi kh&ocirc;ng tắt đ&egrave;n c&oacute; thể trụ được 28 giờ.</p>\r\n<p style=\"font-weight: 400;\">Dưới đ&acirc;y l&agrave; một số thao t&aacute;c điều khiển loa m&agrave; bạn n&ecirc;n lưu &yacute;:</p>\r\n<ul>\r\n<li style=\"font-weight: 400;\">Bật nguồn: Nhấn giữ n&uacute;t nguồn 1.5s</li>\r\n<li style=\"font-weight: 400;\">Tắt nguồn: Nhấn giữ n&uacute;t nguồn 3s</li>\r\n<li style=\"font-weight: 400;\">Nghe/ Dừng nhạc: Nhấn n&uacute;t nguồn 1 lần</li>\r\n<li style=\"font-weight: 400;\">Tăng &acirc;m lượng: Nhấn n&uacute;t (+)</li>\r\n<li style=\"font-weight: 400;\">Giảm &acirc;m lượng: Nhấn n&uacute;t (-)</li>\r\n<li style=\"font-weight: 400;\">Qua b&agrave;i: Nhấn giữ n&uacute;t (+) trong 1.5s</li>\r\n<li style=\"font-weight: 400;\">Quay lại b&agrave;i trước: Nhấn giữ n&uacute;t (-) trong 1.5s</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Đ&acirc;y l&agrave; thời điểm th&iacute;ch hợp để bạn c&oacute; thể sắm ngay thiết bị loa Bluetooth SoundPEATS Halo tại Ho&agrave;ng H&agrave; Mobile - một địa chỉ b&aacute;n h&agrave;ng uy t&iacute;n, tin cậy v&agrave; đem lại gi&aacute; tốt nhất cho người ti&ecirc;u d&ugrave;ng!&nbsp;</p>', 1, 23, '2023-12-07 10:26:35', '2023-12-07 10:30:05', 'soundpeats.webp', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL DEFAULT '13'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `created_at`, `updated_at`, `image_name`, `product_id`) VALUES
(1, '/storage/product/1/wuCxOKkhFePXUMznzDsM.jpg', '2023-11-03 12:39:08', '2023-11-03 12:39:08', '85797661_p0_master1200.jpg', 1),
(2, '/storage/product/1/Sv2lDKTk8dGDHcxbC8BK.jpg', '2023-11-03 12:39:08', '2023-11-03 12:39:08', 'En_nGkuVgAI1JrE.jpg', 1),
(3, '/storage/product/1/LLXUh3TvVUmJNyzfI7lp.jpg', '2023-11-03 12:46:32', '2023-11-03 12:46:32', '85797661_p0_master1200.jpg', 1),
(4, '/storage/product/1/tlqILzWwGxTxg8nWZUKB.jpg', '2023-11-03 12:46:32', '2023-11-03 12:46:32', 'En_nGkuVgAI1JrE.jpg', 1),
(5, '/storage/product/1/Y4w9ncKOfCG8m2smFO6w.jpg', '2023-11-05 11:35:52', '2023-11-05 11:35:52', '85797661_p0_master1200.jpg', 1),
(6, '/storage/product/1/y1FozHIqeT04HeKMHojo.jpg', '2023-11-05 11:35:52', '2023-11-05 11:35:52', 'En_nGkuVgAI1JrE.jpg', 1),
(7, '/storage/product/1/zPnoNqn5GfT14gGRw3y6.jfif', '2023-12-01 10:18:32', '2023-12-01 10:18:32', 'EzuCKU8WUAcyqxe.jfif', 1),
(8, '/storage/product/1/YUm72JAzMoi2gcoxu2GY.jpg', '2023-12-07 10:14:33', '2023-12-07 10:14:33', 'ap.jpg', 17),
(9, '/storage/product/1/r9k7kKq8tGAbyiGHSimO.jpg', '2023-12-07 10:14:33', '2023-12-07 10:14:33', 'ap2.jpg', 17),
(10, '/storage/product/1/ouYLJNDyaYgF7p3tOJE9.jpg', '2023-12-07 10:14:33', '2023-12-07 10:14:33', 'ap3.jpg', 17),
(11, '/storage/product/1/sKrsSLK4FUAwPvCeYEn7.webp', '2023-12-07 10:18:14', '2023-12-07 10:18:14', 'jbl_live_pro_1.webp', 18),
(12, '/storage/product/1/EWIzHRIXTIjbXtwrYAHS.webp', '2023-12-07 10:18:14', '2023-12-07 10:18:14', 'jbl_live_pro_4.webp', 18),
(13, '/storage/product/1/MtQ2412pkWQypmTmfHfs.webp', '2023-12-07 10:20:53', '2023-12-07 10:20:53', 'nokia_wb-101_1.webp', 19),
(14, '/storage/product/1/Vmx9t6iyuAJr6SCOiJT6.webp', '2023-12-07 10:20:53', '2023-12-07 10:20:53', 'nokia_wb-101_4.webp', 19),
(15, '/storage/product/1/0A2dl14uV2FThOlZqjVA.webp', '2023-12-07 10:20:53', '2023-12-07 10:20:53', 'nokia_wb-101_5.webp', 19),
(16, '/storage/product/1/4K1giHqgx5N9QCYWVmLi.webp', '2023-12-07 10:20:53', '2023-12-07 10:20:53', 'group_194_2.webp', 19),
(17, '/storage/product/1/ASAEPztvEPpaV4g1N4cb.webp', '2023-12-07 10:26:35', '2023-12-07 10:26:35', 'halo-09.webp', 20),
(18, '/storage/product/1/b81t6Ooea1g4rNLFEABC.webp', '2023-12-07 10:26:35', '2023-12-07 10:26:35', 'halo-07.webp', 20),
(19, '/storage/product/1/OmFWyzZAg5yrN3PibbrR.webp', '2023-12-07 10:26:35', '2023-12-07 10:26:35', 'halo-08.webp', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(6, 17, 6, '2023-12-07 10:14:33', '2023-12-07 10:14:33'),
(7, 18, 7, '2023-12-07 10:18:14', '2023-12-07 10:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản tri hệ thống', NULL, '2023-11-14 13:05:23'),
(2, 'guest', 'Khách hàng', NULL, '2023-11-14 13:04:59'),
(3, 'developer', 'Phat trien he thong', NULL, NULL),
(4, 'content', 'Chinh sua content', NULL, NULL),
(5, 'Koneko', '234234', '2023-11-14 10:22:52', '2023-11-14 10:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 6, 2, NULL, NULL),
(7, 1, 3, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 2, NULL, NULL),
(10, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Text',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `config_key`, `config_value`, `type`, `deleted_at`) VALUES
(3, '2023-11-11 13:18:00', '2023-11-11 13:27:30', '3', 'Hi1', NULL, NULL),
(4, '2023-11-11 13:18:37', '2023-11-12 12:51:08', '4', 'Test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `name`, `description`, `image_path`, `image_name`, `deleted_at`, `active`) VALUES
(3, '2023-11-12 12:53:57', '2023-11-12 12:53:57', 'huy', '234234', '/storage/slider/1/t5353giWrzkIl8LV2eYO.jpg', '8fae6ff523cf0eb911df33e08fbb3f81_6839218126942510885.jpg', NULL, 1),
(4, '2023-11-24 12:22:17', '2023-11-24 12:22:17', 'Hehe', 'Nothing', '/storage/slider/1/LQKAcFoAVgf1VUMDDFSp.png', '355208159_159342703701936_6418997979330630676_n.png', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'vhbd', '2023-11-05 11:35:52', '2023-11-05 11:35:52'),
(2, 'nhvios', '2023-11-05 11:35:52', '2023-11-05 11:35:52'),
(3, '2', '2023-11-06 12:12:26', '2023-11-06 12:12:26'),
(4, '123', '2023-11-06 12:12:26', '2023-11-06 12:12:26'),
(5, '12312', '2023-11-06 12:12:44', '2023-11-06 12:12:44'),
(6, 'airpod', '2023-12-07 10:14:33', '2023-12-07 10:14:33'),
(7, 'jbl', '2023-12-07 10:18:14', '2023-12-07 10:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `phone`, `address`, `first_name`, `last_name`) VALUES
(1, 'trần ngọc huy', 'huycoixvb@gmail.com', NULL, '$2y$10$Qu4JOwo5M3wd.N92IdFB3Ow55PkryLmF0bMHQTGobLhhBacpYcbVG', NULL, NULL, '2023-12-07 12:37:15', NULL, '0386239871', 'Thành phố Hà Nội/Huyện Mê Linh/Xã Tiền Phong/', NULL, NULL),
(3, 'huy', 'huy', NULL, '$2y$10$YWXnZejZMMQAwRG4HYVGE./WhMVQfO2ixReu7XOmVtY9A5pjgmsdq', NULL, '2023-11-14 14:00:18', '2023-11-16 13:13:10', NULL, NULL, NULL, NULL, NULL),
(4, 'Koneko', '2@gmail.com', NULL, '$2y$10$X7QnwWFTxOPVuDus6KeDaOhv.U7jL8nmav.RH8xHxJy9q.Ik.EmR6', NULL, '2023-11-16 13:13:41', '2023-11-16 13:13:41', NULL, NULL, NULL, NULL, NULL),
(5, 'Koneko111', 'huycoix22332vb@gmail.com', NULL, '$2y$12$mtEk77oerRlhgvRtXKYt3uISEG778wM6QRz1/BNT3gZaTXKzRz3oG', NULL, '2023-11-28 13:44:20', '2023-11-28 13:44:20', NULL, NULL, NULL, NULL, NULL),
(6, 'HUy111', 'duongthan2222h58441@gmail.com', NULL, '$2y$12$Ec7Uu9/xNJJX.8YUV.2neOJx9sp4W/e/j9v64pOkPsJ04JvcL.oBC', NULL, '2023-11-29 03:59:18', '2023-11-29 03:59:18', NULL, NULL, NULL, NULL, NULL),
(7, 'Vũ Hải Hà', '11@gmail.com', NULL, '$2y$12$vTGDjQSwwC0Cg0wv3x3hjeLy83/Z6fNpcWBT.lv5WP2eNrHGpGRN2', NULL, '2023-11-30 04:28:24', '2023-11-30 04:28:24', NULL, NULL, NULL, NULL, NULL),
(8, 'trần ngọc huy', 'hu2222ycoixvb@gmail.com', NULL, '$2y$12$OVN5zGfyY/sny/C5jk6SCu446jcmhBbUJ2EU7HrbmSvbsnEWzAqli', NULL, '2023-11-30 04:39:44', '2023-11-30 04:39:44', NULL, NULL, NULL, NULL, NULL),
(9, 'trần ngọc', 'admin12@gmail.com', NULL, '$2y$12$PT/nQxE3YtI/IITT67j67.TnbNnFU3kp8ZtOnuYeFxR3DVfrlcqfC', NULL, '2023-12-06 12:46:32', '2023-12-06 12:46:32', NULL, NULL, NULL, NULL, NULL),
(10, 'huy', '1222222@gmail.com', NULL, '$2y$12$hHWfPIw.puGtkagcxShsbO1.rjx5jT1pQmP341hZEweferas6VIqG', NULL, '2023-12-06 12:59:02', '2023-12-06 12:59:02', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_product_id_foreign` (`product_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
