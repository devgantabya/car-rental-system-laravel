-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 10:53 AM
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
-- Database: `rental_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_12c6fc06c99a462375eeb3f43dfd832b08ca9e17', 'i:1;', 1747332202),
('laravel_cache_12c6fc06c99a462375eeb3f43dfd832b08ca9e17:timer', 'i:1747332202;', 1747332202),
('laravel_cache_developergantabya@gmail.com|127.0.0.1', 'i:1;', 1747643044),
('laravel_cache_developergantabya@gmail.com|127.0.0.1:timer', 'i:1747643044;', 1747643044);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Chevrolet Tahoe', 'Chevrolet', 'Tahoe', 2010, 'SUV', 93.00, 1, 'car-images/chevrolet_tahoe_chevrolet-tahoe_2020-1636555790702.avif', '2025-05-07 02:26:52', '2025-05-16 05:31:58'),
(2, 'Chevrolet Silverado', 'Chevrolet', 'Silverado', 2020, 'Pickup', 65.00, 1, 'car-images/silverado_2021.jpg', '2025-05-07 02:26:52', '2025-05-16 04:44:12'),
(3, 'Toyota Tacoma', 'Toyota', 'Tacoma', 2016, 'Pickup', 48.00, 1, 'car-images/tacoma_2019.jpg', '2025-05-07 02:26:52', '2025-05-16 04:59:26'),
(4, 'Mercedes-Benz E-Class', 'Mercedes-Benz', 'E-Class', 2020, 'Minivan', 69.00, 1, 'car-images/Mercedes-Benz E-Class.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(5, 'Ford F-150', 'Ford', 'F-150', 2016, 'Pickup', 57.00, 1, 'car-images/f-150_2016.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(6, 'Nissan Altima', 'Nissan', 'Altima', 2020, 'Sedan', 120.00, 1, 'car-images/altima_2020.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(7, 'Chevrolet Impala', 'Chevrolet', 'Impala', 2022, 'Hatchback', 35.00, 1, 'car-images/Chevrolet_Impala.jpg', '2025-05-07 02:26:52', '2025-05-18 06:17:00'),
(8, 'Nissan Frontier', 'Nissan', 'Frontier', 2019, 'Pickup', 114.00, 1, 'car-images/frontier_2019.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(9, 'Hyundai Sonata', 'Hyundai', 'Sonata', 2023, 'Sedan', 93.00, 1, 'car-images/sonata_2023.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(10, 'Kia Optima', 'Kia', 'Optima', 2023, 'Sedan', 98.00, 1, 'car-images/optima_2023.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(11, 'Kia Sorento', 'Kia', 'Sorento', 2019, 'SUV', 67.00, 1, 'car-images/Kia_Sorento.avif', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(12, 'Toyota Highlander', 'Toyota', 'Highlander', 2021, 'Coupe', 70.00, 0, 'car-images/toyota-highlander.avif', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(13, 'Hyundai Elantra', 'Hyundai', 'Elantra', 2018, 'Convertible', 98.00, 1, 'car-images/hyundai-elantra.avif', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(14, 'Honda Pilot', 'Honda', 'Pilot', 2020, 'SUV', 116.00, 0, 'car-images/honda_pilot_honda.avif', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(15, 'Kia Telluride', 'Kia', 'Telluride', 2024, 'SUV', 83.00, 1, 'car-images/telluride_2024.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(16, 'Honda CR-V', 'Honda', 'CR-V', 2024, 'SUV', 68.00, 1, 'car-images/cr-v_2024.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(17, 'Ford Edge', 'Ford', 'Edge', 2024, 'SUV', 110.00, 1, 'car-images/ford_edge_2024.avif', '2025-05-07 02:26:52', '2025-05-18 04:09:16'),
(18, 'Hyundai Santa Fe', 'Hyundai', 'Santa Fe', 2023, 'SUV', 54.00, 1, 'car-images/2023_Hyundai_Santa_Fe_Angular_Front_1.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(19, 'Chevrolet Traverse', 'Chevrolet', 'Traverse', 2016, 'SUV', 111.00, 1, 'car-images/traverse_2016.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(20, 'Audi A6', 'Audi', 'A6', 2017, 'Minivan', 69.00, 1, 'car-images/2024-audi-a6-106-64761a1a30f1d.avif', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(21, 'Ford Fusion', 'Ford', 'Fusion', 2022, 'Coupe', 48.00, 1, 'car-images/Ford_Fusion.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(22, 'Honda Pilot', 'Honda', 'Pilot', 2018, 'Convertible', 56.00, 1, 'car-images/Honda_Pilot.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(23, 'Honda CR-V', 'Honda', 'CR-V', 2022, 'Convertible', 39.00, 1, 'car-images/Honda_CR-V.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(24, ' Nissan Murano', 'Nissan', 'Murano', 2020, 'Minivan', 77.00, 0, 'car-images/Nissan_Murano.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(25, 'Toyota RAV4', 'Toyota', 'RAV4', 2023, 'Coupe', 32.00, 1, 'car-images/toyota_rav4.jpg', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(27, 'Tesla Model X', 'Tesla', 'Model X', 2021, 'SUV', 150.00, 1, 'car-images/tesla_model_x_2021.avif', NULL, NULL),
(28, 'Tesla Roadster', 'Tesla', 'Roadster', 2020, 'Convertible', 180.00, 1, 'car-images/Tesla-Roadster-103.avif', NULL, NULL),
(29, 'Tesla Model S', 'Tesla', 'Model S', 2022, 'Sedan', 120.00, 1, 'car-images/Tesla_Model_S_Japan.jpg', NULL, NULL),
(30, 'Tesla Model 3', 'Tesla', 'Model 3', 2023, 'Sedan', 99.00, 1, 'car-images/tesla_model_3.jpg', NULL, NULL),
(31, 'Tesla Model Y', 'Tesla', 'Model Y', 2023, 'Crossover', 110.00, 1, 'car-images/tesla_model-y.avif', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_04_064243_create_cars_table', 1),
(5, '2025_05_04_064252_create_rentals_table', 1),
(6, '2025_05_07_054403_add_phone_and_address_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('developergantabya@gmail.com', '$2y$12$DDTbTdTITLDwZbWW2KcTr.NheIFe41nngE9rmYfAGa9Xg.XOJZ6Ee', '2025-05-18 22:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 11, '2025-05-10', '2025-05-11', 138.00, 'canceled', '2025-05-08 00:02:50', '2025-05-08 00:42:24'),
(2, 18, 1, '2025-05-12', '2025-05-14', 584.00, 'completed', '2025-05-08 04:33:09', '2025-05-18 06:17:56'),
(3, 18, 6, '2025-05-20', '2025-05-22', 572.00, 'pending', '2025-05-08 04:42:57', '2025-05-15 20:12:36'),
(4, 18, 2, '2025-05-08', '2025-05-12', 1168.00, 'ongoing', '2025-05-08 05:42:09', '2025-05-15 13:06:37'),
(5, 18, 13, '2025-05-17', '2025-05-19', 394.00, 'pending', '2025-05-08 10:40:17', '2025-05-16 03:54:17'),
(7, 22, 1, '2025-05-16', '2025-05-20', 1168.00, 'ongoing', '2025-05-15 12:03:38', '2025-05-16 03:50:28'),
(16, 22, 1, '2025-05-21', '2025-05-23', 584.00, 'ongoing', '2025-05-16 05:29:42', '2025-05-16 05:33:12'),
(18, 18, 17, '2025-05-17', '2025-05-19', 300.00, 'pending', '2025-05-16 06:24:09', '2025-05-18 06:17:42'),
(22, 22, 17, '2025-05-21', '2025-05-23', 300.00, 'ongoing', '2025-05-18 06:15:49', '2025-05-18 06:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VPUCAI4B69Eck3OktM1N2Z7BQKzhReWpnyCDK4YY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWpnQXdSZmFqYW03d2ZkZGxOc0NCT2M5M2h3RXk1Mk9nZUliTEtvNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747644742);

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
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'developergantabya@gmail.com', '2025-05-07 02:26:52', '$2y$12$cSpPi5fpmdAiXOHWMwRcK.GGq2TNuSorJkot3Ia5MFEiQeHcGUd36', 'admin', '1234567890', '123 Street, Barakpur City', NULL, '2025-05-19 02:26:52', '2025-05-19 02:26:52'),
(2, 'Asad Ali', 'asadali@asad.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '1-507-894-4762', '25 baker gang', 'uymLxBKUmE', '2025-05-07 02:26:52', '2025-05-07 02:34:29'),
(3, 'Imtiaz Hossain', 'imtiaz@imtiaz.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '0152463799', 'taltola, west kafrul, 2nd floor, 1207', 'xvTeNk3Dd6', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(4, 'Mark D. Diaz', 'MarkDDiaz@rhyta.com\r\n', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '989-775-9462\r\n', '3933 Ripple Street\r\nMount Pleasant, MI 48858', 'rE1bBLRywN', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(5, 'Kelly J. Simmons\r\n', 'KellyJSimmons@armyspy.com\r\n', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '917-653-8933\r\n', '1866 Hanover Street\r\nNew York, NY 10011', '99nt4w84Nu', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(6, 'Ollie Bosco', 'cschmeler@example.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '+1-682-699-9297', '64216 Schultz Centers Apt. 611\nPort Allanmouth, MA 95384-4871', 'LeCwnkfEyb', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(7, 'Shea Frami', 'klocko.macie@example.org', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '1-469-224-6983', '84199 Nader Pass Suite 887\nPort Abelardo, NE 83997-7950', 'qZtvzcCHEe', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(8, 'Gene Kemmer', 'kuhlman.hazle@example.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '+1-701-675-1410', '1939 Miller Tunnel\nRainashire, UT 89290', 'Y7VpLNloZ7', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(9, 'Mr. Alfredo Reynolds I', 'anderson.amir@example.com', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '+1-325-657-1479', '650 Denesik Village\nMagnoliastad, RI 89013-4003', 'tK6DhG8xyB', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(10, 'Jana Huels', 'grady.sammy@example.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '+1.478.765.5178', '3467 Trudie Lane Suite 629\nBeierfurt, WY 48500-5688', 'Sk6RrAdT9T', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(11, 'Ms. Vida Sporer', 'hand.evelyn@example.com', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '857.366.2267', '639 Consuelo Stream\nWest Henriettestad, SD 34755', 'NPZBs6L4Yy', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(12, 'Dewayne Bailey', 'grant.effertz@example.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '207.486.1617', '9778 Elmer Plaza Apt. 996\nLake Lolita, RI 36744', 'tSJ0wsLYOe', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(13, 'Brent Cruickshank', 'reilly.abbott@example.org', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '443.336.4442', '29751 Seamus Fork Suite 989\nSouth Santiago, CT 08543', 'Yl6fC6wY4u', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(14, 'Cynthia Hegmann Jr.', 'amoen@example.org', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '252.526.3178', '229 Gusikowski Mountain\nWest Destiniside, NE 31837', '6o30g5apDu', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(15, 'Prof. Barbara Parisian V', 'oswaldo.spinka@example.net', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '(251) 934-8351', '3598 Rhiannon Pike\nJessicaburgh, NV 14301-7260', 'n3bmfIVePp', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(16, 'Fannie Hoeger', 'abdul42@example.com', '2025-05-07 02:26:52', '$2y$12$jQBrdIBrfPW8vOWL89I4legsW52Tsq4CK0P3GxVBRLjdDSbbt7hOi', 'customer', '+1 (724) 844-9108', '7256 Homenick Ramp Apt. 410\nKilbackland, AL 31914-0403', 'dgted6pnUz', '2025-05-07 02:26:52', '2025-05-07 02:26:52'),
(18, 'Katharine J. Altamirano\r\n', 'KatharineJAltamirano@jourrapide.com\r\n', '2025-05-07 09:58:24', '$2y$12$e0sGNbjJjqi0XBJDpSCsj.pqhEhmU2WtYaF6fxuRB8AaR1v72Ydaa', 'customer', '603-230-7403\r\n', '1524 Shearwood Forest Drive\r\nConcord, NH 03301', NULL, '2025-05-07 09:27:46', '2025-05-16 05:00:00'),
(22, 'Rebecca M. Walker\r\n', 'RebeccaMWalker@armyspy.com\r\n', '2025-05-15 12:02:22', '$2y$12$O5kUNwQ2hINYknRbmT78COR8l9Is6sGYVJ31NLJM3tQtBHvQDhafm', 'customer', '763-561-9332\r\n', '3287 Hillcrest Circle\r\nBrooklyn Center, MN 55430', NULL, '2025-05-15 12:00:59', '2025-05-18 06:17:16');

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
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
