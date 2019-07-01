-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 02:20 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` enum('Approved','Pending','Declined') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_message`, `category_status`) VALUES
(1, 'Allergy', NULL, 'Approved'),
(2, 'Body & Muscle Pain', NULL, 'Approved'),
(3, 'Children\'s Health', NULL, 'Approved'),
(4, 'Cough & Colds', NULL, 'Approved'),
(5, 'Gut / Stomach Health', NULL, 'Approved'),
(6, 'Headache,Fever & Flu', NULL, 'Approved'),
(7, 'Healthy Aging / Seniors', NULL, 'Approved'),
(8, 'Men\'s Health', NULL, 'Approved'),
(9, 'Oral Care', NULL, 'Approved'),
(10, 'Prescription Drugs', NULL, 'Approved'),
(11, 'Skin Care', NULL, 'Approved'),
(12, 'Sports Nutrition', NULL, 'Pending'),
(13, 'Vitamins & Supplements', NULL, 'Pending'),
(14, 'Women\'s Health & Beauty', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `history_carts`
--

CREATE TABLE `history_carts` (
  `historycart_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `historycart_discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_delivery` enum('Order Confirmation','Shipped','Delivered','Cancel Order') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historycart_total_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historycart_shipping_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historycart_total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_items`
--

CREATE TABLE `history_items` (
  `historyitem_id` int(10) UNSIGNED NOT NULL,
  `historycart_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `historyitem_quantity` bigint(20) NOT NULL,
  `historyitem_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `medicine_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_generic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_classification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_price` double(8,2) NOT NULL,
  `medicine_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_stocks` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `user_id`, `category_id`, `medicine_image`, `medicine_generic_name`, `medicine_brand_name`, `medicine_classification`, `medicine_price`, `medicine_quantity`, `medicine_description`, `medicine_volume`, `medicine_type`, `medicine_stocks`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Medicine/jHdnjZ_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 'OTC', 25.38, '61', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of the brain and therefore elevates the threshold for coughing. Diphenhydramine HCl is also a sedating antihistamine which diminishes allergic symptoms by blocking histamine receptors.', '12.5 mg', 'Syrup', 'Yes', NULL, '2019-07-01 01:06:00'),
(2, 3, 5, NULL, 'Loratadine', 'Allerta', 'OTC', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', NULL, '2019-07-01 01:30:27'),
(3, 3, 2, NULL, 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 'OTC', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', NULL, '2019-07-01 00:59:38'),
(4, 3, NULL, NULL, 'Mefenamic Acid', 'Dolfenal', 'OTC', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', NULL, NULL),
(5, 3, NULL, NULL, 'Phenylpropanolamine HCl ', 'Decolgen Forte', 'OTC', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. It also helps decongest sinus openings and passages.', '25mg/2mg/500mg', 'Tablet', 'Yes', NULL, NULL),
(6, 3, NULL, NULL, 'Ambroxol', 'Myracof', 'OTC', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic bronchitis and bronchial asthma.', '30mg/5ml', 'Syrup', 'Yes', NULL, NULL),
(7, 3, NULL, NULL, ' Aluminum Hydroxide ', 'Kremil-S', 'OTC', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', NULL, NULL),
(8, 3, NULL, NULL, 'Oral Rehydration Salts', 'Hydrite', 'OTC', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', NULL, NULL),
(9, 3, NULL, NULL, 'Phenylephrine HCl', 'Bio-flu', 'OTC', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic rhinitis, sinusitis, and other minor respiratory tract infections. They also help decongest sinus openings and passages.', '500mg', 'Tablet', 'Yes', NULL, NULL),
(10, 3, NULL, NULL, 'Paracetamol', 'Rexidol Forte', 'OTC', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_06_24_123652_create_categories_table', 2),
(3, '2019_06_24_124251_create_medicines_table', 3),
(4, '2019_02_26_062806_create_user_information_tabel', 4),
(5, '2019_02_08_134118_create_mycarts_table', 5),
(6, '2019_02_28_030925_create_user_images_table', 6),
(7, '2019_03_09_080503_create_history_carts_table', 7),
(8, '2019_03_09_081642_create_history_items_table', 7),
(9, '2019_03_17_105048_create_user_locations_table', 7),
(10, '2019_03_23_130248_create_shipping_fees_table', 7),
(11, '2019_05_09_080420_create_penaltizes_table', 7),
(12, '2019_05_09_084525_create_notifications_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mycarts`
--

CREATE TABLE `mycarts` (
  `mycart_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `medicine_price` double(8,2) NOT NULL,
  `medicine_quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receive_id` int(10) UNSIGNED NOT NULL,
  `notification_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penaltizes`
--

CREATE TABLE `penaltizes` (
  `penalty_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `penalty_count` bigint(20) NOT NULL,
  `penalty_duration` date NOT NULL,
  `penalty_status` enum('Normal','Suspended','Permanent Suspension') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_fees`
--

CREATE TABLE `shipping_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_fees` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Normal User','PWD','Senior Citizen','Admin','Pharmacist','Courier') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Waiting','Approved','Declined') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$FNlnYuqfZ47xXTwqBi9MdeWEPEamNM/gVd.uNekSmWCP0xEEHoCIu', 'Admin', 'Approved', 'MZ71pbKBppzBTr8WiTfm5fKKv0990Hfw0qp9KVm3MNEFPQmKIj0AjShHFVYX', '2019-06-29 04:58:19', '2019-06-29 04:58:19'),
(2, 'ndrewampog', 'ndrewampog@gmail.com', '$2y$10$I2R.UDjaXKKFgLhIQQDkTudRGxZVahLmoQzENb82IwLamJuzSb202', 'Normal User', 'Approved', 'QYObCXnjD1nViQmKpHo4sKpJFt6UIFgm0THvY0dO1yO6893dyFpbbG6uuKlZ', '2019-06-29 05:00:27', '2019-06-29 05:00:27'),
(3, '360pharmacy', '360pharmacy@gmail.com', '$2y$10$HoZVnLIR4zHH4qzyBmqG4OUfCRzh9clonc6D2N5XVT.vHZmNylp9O', 'Pharmacist', 'Approved', 'dTqO3t0IcPiRvVkwm0Y8RN2dyARq0qBT6K875ysVCO349rLjjTHirBC03om0', '2019-06-29 05:05:41', '2019-06-30 23:27:23'),
(4, 'oliverbajala', 'oliverbajala@gmail.com', '$2y$10$OONiMjbMglgq111bQGXEEec2PZ8UuKmovthM0kICuvLq8z7RkaIJ6', 'Normal User', 'Waiting', NULL, '2019-06-29 23:05:11', '2019-06-29 23:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pharma_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `user_id`, `pharma_certificate`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pharmacist_logo/n3N5Mo_birthcertificate.jpg', '2019-06-29 05:05:41', '2019-06-29 05:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE `user_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `civil_status` enum('Single','Married','Divorced','Widowed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd_id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd_image_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senior_id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senior_image_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pharma_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pharma_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pharma_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_certified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_expiration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_informations`
--

INSERT INTO `user_informations` (`id`, `user_id`, `fname`, `mname`, `lname`, `birthday`, `civil_status`, `gender`, `contact`, `lat`, `lng`, `profile_image`, `pwd_id_number`, `pwd_image_id`, `senior_id_number`, `senior_image_id`, `pharma_name`, `pharma_logo`, `pharma_website`, `date_certified`, `date_expiration`, `created_at`, `updated_at`) VALUES
(1, 2, 'Drew', 'Cahilog', 'Ampog', '1995-05-14', 'Single', 'Male', 639361413023, '10.301553', '123.87052700000004', 'Profile/RQ0azZ_32072603_1928478900509898_3749030090290233344_n.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-29 05:00:27', '2019-06-29 05:00:27'),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 639361413023, '10.2955481', '123.86983310000005', NULL, NULL, NULL, NULL, NULL, '360 Pharmacy', 'Pharmacist_logo/8qyS1l_29573199_2086092021638737_8372366769576079536_n.jpg', NULL, '2019-06-01', '2019-06-28', '2019-06-29 05:05:41', '2019-06-29 05:05:41'),
(3, 4, 'Oliver', 'Solitario', 'Bajala', '2019-06-04', 'Single', 'Male', 639361413023, '10.2989677', '123.88131810000004', 'Profile/TFwqQS_32089415_1928478390509949_6596424503654350848_n.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-29 23:05:12', '2019-06-29 23:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visit` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `visit`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '10.301553', '123.87052700000004', '2019-07-01 01:47:36', '2019-07-01 01:47:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `history_carts`
--
ALTER TABLE `history_carts`
  ADD PRIMARY KEY (`historycart_id`),
  ADD KEY `history_carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_items`
--
ALTER TABLE `history_items`
  ADD PRIMARY KEY (`historyitem_id`),
  ADD KEY `history_items_medicine_id_foreign` (`medicine_id`),
  ADD KEY `history_items_historycart_id_foreign` (`historycart_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `medicines_user_id_foreign` (`user_id`),
  ADD KEY `medicines_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycarts`
--
ALTER TABLE `mycarts`
  ADD PRIMARY KEY (`mycart_id`),
  ADD KEY `mycarts_user_id_foreign` (`user_id`),
  ADD KEY `mycarts_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`),
  ADD KEY `notifications_receive_id_foreign` (`receive_id`);

--
-- Indexes for table `penaltizes`
--
ALTER TABLE `penaltizes`
  ADD PRIMARY KEY (`penalty_id`),
  ADD KEY `penaltizes_user_id_foreign` (`user_id`);

--
-- Indexes for table `shipping_fees`
--
ALTER TABLE `shipping_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_images_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_informations_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_locations_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `history_carts`
--
ALTER TABLE `history_carts`
  MODIFY `historycart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_items`
--
ALTER TABLE `history_items`
  MODIFY `historyitem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mycarts`
--
ALTER TABLE `mycarts`
  MODIFY `mycart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penaltizes`
--
ALTER TABLE `penaltizes`
  MODIFY `penalty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_fees`
--
ALTER TABLE `shipping_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_carts`
--
ALTER TABLE `history_carts`
  ADD CONSTRAINT `history_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_items`
--
ALTER TABLE `history_items`
  ADD CONSTRAINT `history_items_historycart_id_foreign` FOREIGN KEY (`historycart_id`) REFERENCES `history_carts` (`historycart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_items_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE;

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mycarts`
--
ALTER TABLE `mycarts`
  ADD CONSTRAINT `mycarts_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mycarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_receive_id_foreign` FOREIGN KEY (`receive_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penaltizes`
--
ALTER TABLE `penaltizes`
  ADD CONSTRAINT `penaltizes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_images`
--
ALTER TABLE `user_images`
  ADD CONSTRAINT `user_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD CONSTRAINT `user_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `user_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
