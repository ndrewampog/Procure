-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 02:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
-- Table structure for table `history_carts`
--

CREATE TABLE `history_carts` (
  `historycart_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `historycart_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_delivery` enum('Order Confirmation','Shipped','Delivered') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historycart_total_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historycart_shipping_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historycart_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_carts`
--

INSERT INTO `history_carts` (`historycart_id`, `user_id`, `historycart_discount`, `status_delivery`, `historycart_total_item`, `historycart_shipping_fee`, `historycart_total_price`, `created_at`, `updated_at`) VALUES
(1, 16, '0', NULL, '', '', '', '2019-03-26 18:44:40', '2019-03-26 18:44:40'),
(2, 16, '0', NULL, NULL, NULL, NULL, '2019-03-26 18:47:28', '2019-03-26 18:47:28'),
(3, 16, '0', NULL, NULL, NULL, NULL, '2019-03-26 18:59:17', '2019-03-26 18:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `history_items`
--

CREATE TABLE `history_items` (
  `historyitem_id` int(10) UNSIGNED NOT NULL,
  `historycart_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED DEFAULT NULL,
  `historyitem_quantity` bigint(20) DEFAULT NULL,
  `historyitem_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_items`
--

INSERT INTO `history_items` (`historyitem_id`, `historycart_id`, `medicine_id`, `historyitem_quantity`, `historyitem_price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 6, 5.12, '2019-03-26 18:44:40', '2019-03-26 18:44:40'),
(2, 1, 6, 6, 60.23, '2019-03-26 18:44:40', '2019-03-26 18:44:40'),
(3, 1, 1, 5, 25.38, '2019-03-26 18:44:41', '2019-03-26 18:44:41'),
(4, 2, 1, 5, 25.38, '2019-03-26 18:47:29', '2019-03-26 18:47:29'),
(5, 3, 2, 10, 60.97, '2019-03-26 18:59:17', '2019-03-26 18:59:17'),
(6, 3, 5, 10, 5.12, '2019-03-26 18:59:18', '2019-03-26 18:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `medicine_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_generic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_price` double(8,2) NOT NULL,
  `medicine_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_stocks` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_status` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `user_id`, `medicine_image`, `medicine_generic_name`, `medicine_brand_name`, `medicine_price`, `medicine_quantity`, `medicine_description`, `medicine_volume`, `medicine_category`, `medicine_stocks`, `medicine_status`, `created_at`, `updated_at`) VALUES
(1, 28, 'Medicine/SnKUpn_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '24', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-27 18:33:13'),
(2, 28, 'Medicine/ma7u1Q_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '73', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-27 18:33:25'),
(3, 28, 'Medicine/0xySle_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 02:05:48'),
(4, 28, 'Medicine/OiKLIL_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 02:06:03'),
(5, 28, 'Medicine/zGi2v7_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '166', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-26 18:48:53'),
(6, 28, 'Medicine/WkpoPz_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '306', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-22 21:11:28'),
(7, 28, 'Medicine/1n0Icv_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 02:06:37'),
(8, 28, 'Medicine/UtqSad_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '113', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-22 18:05:49'),
(9, 28, 'Medicine/KMz9Nt_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '575', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-26 18:50:50'),
(10, 28, 'Medicine/x68Ehe_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 02:08:58'),
(11, 29, 'Medicine/mb9S5X_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 05:56:35'),
(12, 29, 'Medicine/2RyJ1p_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 05:56:43'),
(13, 29, 'Medicine/6lvGOX_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:56:49'),
(14, 29, 'Medicine/X3sa0S_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:56:56'),
(15, 29, 'Medicine/Pz7LYI_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:57:04'),
(16, 29, 'Medicine/t8xTGn_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 05:57:12'),
(17, 29, 'Medicine/Wt6CJ1_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:57:22'),
(18, 29, 'Medicine/EVf13B_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 05:57:35'),
(19, 29, 'Medicine/pyfBzT_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:57:45'),
(20, 29, 'Medicine/CmOIuF_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:57:53'),
(21, 30, 'Medicine/lHi0te_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 05:58:39'),
(22, 30, 'Medicine/VpDFho_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 05:58:58'),
(23, 30, 'Medicine/B4nLld_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:59:05'),
(24, 30, 'Medicine/nV8FHh_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:59:13'),
(25, 30, 'Medicine/i6RbwG_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:59:22'),
(26, 30, 'Medicine/z5f5op_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 05:59:32'),
(27, 30, 'Medicine/gFwkxZ_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:59:40'),
(28, 30, 'Medicine/DFq678_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '117', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:50:37'),
(29, 30, 'Medicine/QvaZ8S_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 05:59:58'),
(30, 30, 'Medicine/uxpQQD_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:00:06'),
(31, 31, NULL, 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, NULL),
(32, 31, 'Medicine/iPPgGp_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:00:53'),
(33, 31, 'Medicine/InVaPj_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:00:59'),
(34, 31, 'Medicine/BlcFUQ_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:01:09'),
(35, 31, 'Medicine/CAhS7H_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:01:24'),
(36, 31, 'Medicine/a1Bpon_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:01:32'),
(37, 31, 'Medicine/fhlNHV_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:01:40'),
(38, 31, 'Medicine/mvILXm_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:01:50'),
(39, 31, 'Medicine/G4tHGu_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:01:59'),
(40, 31, 'Medicine/H2obuy_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:02:07'),
(41, 32, 'Medicine/BMiuLH_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:02:49'),
(42, 32, 'Medicine/oIzOto_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:02:56'),
(43, 32, 'Medicine/XY4pal_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:03:03'),
(44, 32, 'Medicine/0E1jUw_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:03:11'),
(45, 32, 'Medicine/799pOi_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:03:18'),
(46, 32, 'Medicine/MRhmbK_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:03:26'),
(47, 32, 'Medicine/8uEEuZ_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:03:40'),
(48, 32, 'Medicine/r85s8B_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:03:50'),
(49, 32, 'Medicine/iHYoUl_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:03:58'),
(50, 32, 'Medicine/oKQoBu_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:04:05'),
(51, 33, 'Medicine/rbL9fA_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:04:57'),
(52, 33, 'Medicine/BJJCyc_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:05:04'),
(53, 33, 'Medicine/yeeKKR_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:05:11'),
(54, 33, 'Medicine/84HJod_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:05:21'),
(55, 33, 'Medicine/Vwnugq_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:05:29'),
(56, 33, 'Medicine/vh2fAx_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:05:39'),
(57, 33, 'Medicine/AesrdP_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:05:55'),
(58, 33, 'Medicine/595vgr_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:06:02'),
(59, 33, 'Medicine/oGR0SJ_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:06:09'),
(60, 33, 'Medicine/VbvggG_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:06:15'),
(61, 34, 'Medicine/gNXpMY_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:06:50'),
(62, 34, 'Medicine/BM9iZu_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:06:57'),
(63, 34, 'Medicine/b8Qv0Z_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:07:07'),
(64, 34, 'Medicine/JJ85ft_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:07:18'),
(65, 34, 'Medicine/QjGlnK_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:07:27'),
(66, 34, 'Medicine/WbFfLN_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:07:34'),
(67, 34, 'Medicine/q0PVIC_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:07:43'),
(68, 34, 'Medicine/4BQxRj_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:07:51'),
(69, 34, 'Medicine/vgGEBa_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:07:59'),
(70, 34, 'Medicine/BHSMcZ_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:08:06'),
(71, 35, 'Medicine/iDRk9v_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:08:48'),
(72, 35, 'Medicine/zQzhnU_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:08:55'),
(73, 35, 'Medicine/Ia8NfN_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:09:04'),
(74, 35, 'Medicine/u2uLBM_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:09:12'),
(75, 35, 'Medicine/0wl1Ha_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:09:20'),
(76, 35, 'Medicine/BBen3l_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:09:28'),
(77, 35, 'Medicine/rUebU3_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:09:36'),
(78, 35, 'Medicine/yRrlUJ_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:09:43'),
(79, 35, 'Medicine/xcyARp_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '568', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:51:48'),
(80, 35, 'Medicine/LUq4rs_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:10:03'),
(81, 37, 'Medicine/5jbned_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:10:41'),
(82, 37, 'Medicine/4sAWDt_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:10:49'),
(83, 37, 'Medicine/mwnToP_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:10:56'),
(84, 37, 'Medicine/VauZV9_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:11:04'),
(85, 37, 'Medicine/UrzTcr_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:11:12'),
(86, 37, 'Medicine/jM8XMm_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:11:25'),
(87, 37, 'Medicine/JxSo1a_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:11:33'),
(88, 37, 'Medicine/zsQlrT_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:11:48'),
(89, 37, 'Medicine/NQVjjz_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:11:57'),
(90, 37, 'Medicine/TTlzPA_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:12:07'),
(91, 38, 'Medicine/oZ7Bfe_allerin.jpg', 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:12:43'),
(92, 38, 'Medicine/JC2NnQ_allerta.jpg', 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:12:50'),
(93, 38, 'Medicine/W8yX2W_alaxan-fr.jpg', 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:13:00'),
(94, 38, 'Medicine/893itU_dolfenal-250.jpg', 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:13:09'),
(95, 38, 'Medicine/5Xzfzw_decolgen-forte.jpg', 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rh', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:13:17'),
(96, 38, 'Medicine/QgNOUA_myracof.jpg', 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic b', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, '2019-03-07 06:13:33'),
(97, 38, 'Medicine/KAP21E_kremil-s.jpg', ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:13:42'),
(98, 38, 'Medicine/JlK3W9_hydrite.jpg', 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, '2019-03-07 06:13:49'),
(99, 38, 'Medicine/Foqe2m_bioflu1.jpg', 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic r', '500mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:13:57'),
(100, 38, 'Medicine/N1p7fK_rexidol-forte.png', 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, '2019-03-07 06:14:05'),
(116, 41, NULL, 'Diphenhydramine HCI', 'Allerin', 25.38, '60', 'This medicine contains diphenhydramine HCl and phenylpropanolamine HCl. Diphenhydramine HCl, a cough suppressant (antitussive), acts centrally by depressing the cough center in the medulla of the brain and therefore elevates the threshold for coughing. Diphenhydramine HCl is also a sedating antihistamine which diminishes allergic symptoms by blocking histamine receptors.', '12.5 mg', 'Syrup', 'Yes', 'Yes', NULL, NULL),
(117, 41, NULL, 'Loratadine', 'Allerta', 60.97, '90', 'These medicines are used for the relief of symptoms associated with:', '10ml', 'Syrup', 'Yes', 'Yes', NULL, NULL),
(118, 41, NULL, 'Ibuprofen + Paracetamol', 'Alaxan, Alaxan FR', 9.12, '199', '0', '500mg', 'Tablet', 'Yes', 'Yes', NULL, NULL),
(119, 41, NULL, 'Mefenamic Acid', 'Dolfenal', 20.83, '289', '0', '250mg', 'Tablet', 'Yes', 'Yes', NULL, NULL),
(120, 41, NULL, 'Phenylpropanolamine HCl ', 'Decolgen Forte', 5.12, '182', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. It also helps decongest sinus openings and passages.', '25mg/2mg/500mg', 'Tablet', 'Yes', 'Yes', NULL, NULL),
(121, 41, NULL, 'Ambroxol', 'Myracof', 60.23, '312', 'This medicine is used for the relief of cough secondary to acute and chronic diseases of the respiratory tract accompanied by excessive lung secretions such as chronic bronchitis, asthmatic bronchitis and bronchial asthma.', '30mg/5ml', 'Syrup', 'Yes', 'Yes', NULL, NULL),
(122, 41, NULL, ' Aluminum Hydroxide ', 'Kremil-S', 6.10, '581', '0', '178mg/233mg/30mg', 'Tablet', 'Yes', 'Yes', NULL, NULL),
(123, 41, NULL, 'Oral Rehydration Salts', 'Hydrite', 16.21, '123', 'This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).', '245mg', 'Powder', 'Yes', 'Yes', NULL, NULL),
(124, 41, NULL, 'Phenylephrine HCl', 'Bio-flu', 10.73, '581', 'This medicine is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with flu, common cold, allergic rhinitis, sinusitis, and other minor respiratory tract infections. They also help decongest sinus openings and passages.', '500mg', 'Tablet', 'Yes', 'Yes', NULL, NULL),
(125, 41, NULL, 'Paracetamol', 'Rexidol Forte', 5.08, '823', 'This product contains Paracetamol, a fever reducer and pain reliever. Caffeine enhances and prolongs the effect of Paracetamol on pain relief.', '565mg', 'Tablet', 'Yes', 'Yes', NULL, NULL);

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
(7, '2019_02_25_014042_create_userinfos_table', 2),
(8, '2019_02_25_014121_create_userinfoimages_table', 3),
(10, '2019_02_26_062845_create_user_image_tabel', 4),
(12, '2019_03_01_101549_create_medicine_images_table', 6),
(27, '2014_10_12_000000_create_users_table', 7),
(28, '2014_10_12_100000_create_password_resets_table', 7),
(29, '2019_02_08_071550_create_medicines_table', 7),
(30, '2019_02_08_134118_create_mycarts_table', 7),
(31, '2019_02_26_062806_create_user_information_tabel', 7),
(32, '2019_02_28_030925_create_user_images_table', 7),
(33, '2019_03_09_080503_create_history_carts_table', 7),
(34, '2019_03_09_081642_create_history_items_table', 7),
(35, '2019_03_17_105048_create_user_locations_table', 8),
(36, '2019_03_23_130248_create_shipping_fees_table', 9);

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

--
-- Dumping data for table `mycarts`
--

INSERT INTO `mycarts` (`mycart_id`, `user_id`, `medicine_id`, `medicine_price`, `medicine_quantity`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 25.38, 6, '2019-03-27 18:33:13', '2019-03-27 18:33:13'),
(2, 16, 2, 60.97, 7, '2019-03-27 18:33:25', '2019-03-27 18:33:25');

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
-- Table structure for table `shipping_fees`
--

CREATE TABLE `shipping_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_fees` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_fees`
--

INSERT INTO `shipping_fees` (`id`, `shipping_fees`, `created_at`, `updated_at`) VALUES
(1, 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Normal User','PWD','Senior Citizen','Admin','Pharmacist') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Waiting','Approved','Declined') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin@gmail.com', '$2y$10$NRiuEuts1W96sbjMXpZDAOrRtRsIw3sIJwcAj4qmbIYEe0DcFEfqu', 'Admin', 'Approved', '9nJqWmk2YIpGr3jcReCLOLPcf57AfaoJIBmJ6feQzd0EXEMaqzJ1aZyBE4ft', '2019-02-04 09:36:01', '2019-02-04 09:36:01'),
(16, 'mgapistikids', 'ndrewampog@gmail.com', '$2y$10$tGPivaqBBaGIjuPoNmKE/ORibgEVApZxOImwuJUpQir5TUJVdSl5C', 'Normal User', 'Approved', 'zmgv0dEMHj6npVBpXhc6obKs8hxuwNxPgA8WkIfngoDGX5Lwg8g08nvu7tyU', '2019-02-28 13:59:22', '2019-02-28 13:59:22'),
(28, '360pharmacy', 'threesixty@gmail.com', '$2y$10$h34MUlicnG2/OMVCGf5Cy.G4IShoSltu98tm8Kx4boHMxTsE/Bcz2', 'Pharmacist', 'Approved', 'sULo2cEfX04dnbwTWNyjgvyCxZOX6vLGnoiYK07lTw1LLs3Gj8knZAK4I1Ch', '2019-03-06 12:50:02', '2019-03-06 12:50:02'),
(29, 'rosepharmacy', 'rosepharmacy@gmail.com', '$2y$10$N5xNG03gErJWs8jBsjf.4usIr15UJHU1udvmpygJaaa82r3A1fq/K', 'Pharmacist', 'Approved', '8ccXdG2DOI5mDyw7G8qrV1cgPBt38oZ2zk4LIrkv0QcgCy6evHjKmQlipqmx', '2019-03-06 12:53:41', '2019-03-06 12:53:41'),
(30, 'fedicebu', 'fedi@gmail.com', '$2y$10$A9tdYfF/21sSESK1qaz7U.l7HoOCbatmEeJsWIhlUBF0nIYvfRuOm', 'Pharmacist', 'Approved', '7nmRRiQKXzMxFV7pbGAZQmWTUIrp0uibRnh4nRRQtFEYqxSFeXrml0McCBIN', '2019-03-06 12:57:21', '2019-03-06 12:57:21'),
(31, 'evercarecebu', 'evercarecebu@gmail.com', '$2y$10$QQs8qmKrK7ONnqhUGKIdo.3fZVo5vkLNXDmSvZ7RL8ZNGzr6kpFtu', 'Pharmacist', 'Approved', 'B8EXAcL06f98lQGF6Q28Ij0tW4Ny8YaFEJHQO1TqV1G4pY4ufJdRhAdIuPny', '2019-03-06 13:00:12', '2019-03-06 13:00:12'),
(32, 'cebuchinesedrug', 'Cebuchinesedrug@gmail.com', '$2y$10$fn7OmMJDXydE/MVFJLDP8uKevk1mxG0D5rt6Clztk3KjCeBq71Pcu', 'Pharmacist', 'Approved', 'ZMHRNxD9yKsCjjBeXSbRkJwOtaH4Gaieau50xSCtNfV9MfkfAHZVNfH1WfJu', '2019-03-06 13:02:26', '2019-03-06 13:02:26'),
(33, 'generikadrugstorecebu', 'generikacebu@gmail.com', '$2y$10$bS1ilNyY4yThE34kezlWvup.tX.4NlkWhn9zOQNFMCIzdagVkgxVu', 'Pharmacist', 'Approved', '9SCYpBbGh8v1jxGTtPtGHT7dRcx75SmlepuT4U7XLEKPHLamT48H4m7QOJ6j', '2019-03-06 13:04:09', '2019-03-06 13:04:09'),
(34, 'vivepharmacy', 'vivepharmacy@gmail.com', '$2y$10$l1FGoGDpOUBhUAJRBRPLb.znaXazl5Og14dPvDwKXIS.TGj/MvCT.', 'Pharmacist', 'Approved', 'YuGhOaplWZ7PoKOfckDZHBX8McSeqD5as9ecXlxHcPrsEuWvZN7QF7pnpMqU', '2019-03-06 13:06:17', '2019-03-06 13:06:17'),
(35, 'pillsandmore', 'pnmcebu@gmail.com', '$2y$10$8TQ.1MYLb7f..g4j69qIxO73FSeKGVkD07vQlPGjfkLCtUDIuERxi', 'Pharmacist', 'Waiting', '0JYX8DYvBgQZV4rtw1aeSVd1WCh4Zpsr6TWpumAfewDJdLOYgMCiX4RNUWTo', '2019-03-06 13:09:20', '2019-03-06 13:09:20'),
(37, 'watsonscebu', 'watsonspharmacy@gmail.com', '$2y$10$3gs/ZF7HdRLhWTAGW4eRYe1mnO7JLWH7RgNfvCN1ELB3m1O4yr2me', 'Pharmacist', 'Waiting', 'fYwARtdQYgMOMhkuieHtREqws3vZ1vNDzojthmD7aysjaeXdjgi2Bjwaiaxk', '2019-03-06 13:12:30', '2019-03-06 13:12:30'),
(38, 'mercurydrugcebu', 'mercurydrugcebu@gmail.com', '$2y$10$98TOf5pz8r0Ch4cNT3uRpup5p42NngXmx9llPBtoG/yXpOhUYQG9m', 'Pharmacist', 'Waiting', NULL, '2019-03-06 13:14:53', '2019-03-06 13:14:53'),
(39, 'jake', 'uy@gmail.com', '$2y$10$Q9YtvTR8ZxXZ/ltLd4iyzuO61WXNxTVfNQWL8I18/7zFAJUmgkxg2', 'Normal User', 'Approved', 'PKfniAuFPhqwmoGUMHExHgw8PzjGTm06HxrFanvjNNlMzL4r2mgeRfv5NMfn', '2019-03-22 16:11:01', '2019-03-22 16:11:01'),
(40, 'jl', 'jl@gmail.com', '$2y$10$sGqaU2E/5US5tiuDCL/aKe1u9t.iIm7WjlAPHoU0shyEdGDdL9X0.', 'Pharmacist', 'Approved', NULL, '2019-03-22 16:14:39', '2019-03-22 16:19:53'),
(41, 'hellopharmacycebu', 'hellopharmacycebu@gmail.com', '$2y$10$.0Y.s9Kqw6b2kC06urH1U.IjXH0lfmEj/IndBRTvkLulONUtNetm2', 'Pharmacist', 'Approved', NULL, '2019-03-22 16:42:02', '2019-03-22 16:42:27');

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
(19, 29, 'Pharmacist_logo/0XJTZN_example.jpg', '2019-03-06 12:53:41', '2019-03-06 12:53:41'),
(20, 30, 'Pharmacist_logo/u7KEsC_example.jpg', '2019-03-06 12:57:21', '2019-03-06 12:57:21'),
(21, 31, 'Pharmacist_logo/oqnwqP_example.jpg', '2019-03-06 13:00:12', '2019-03-06 13:00:12'),
(22, 32, 'Pharmacist_logo/DAb5uM_example.jpg', '2019-03-06 13:02:26', '2019-03-06 13:02:26'),
(23, 33, 'Pharmacist_logo/LwmoR3_example.jpg', '2019-03-06 13:04:10', '2019-03-06 13:04:10'),
(24, 34, 'Pharmacist_logo/oZBWlp_example.jpg', '2019-03-06 13:06:18', '2019-03-06 13:06:18'),
(25, 35, 'Pharmacist_logo/4b7cDM_example.jpg', '2019-03-06 13:09:20', '2019-03-06 13:09:20'),
(26, 37, 'Pharmacist_logo/WpUo96_example.jpg', '2019-03-06 13:12:30', '2019-03-06 13:12:30'),
(27, 38, 'Pharmacist_logo/kJ1tMD_example.jpg', '2019-03-06 13:14:53', '2019-03-06 13:14:53'),
(28, 41, 'Pharmacist_logo/nh2mzx_example.jpg', '2019-03-22 16:42:02', '2019-03-22 16:42:02');

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
(3, 16, 'Andrew', 'cahilog', 'Ampog', '2019-03-15', 'Single', 'Male', 639215303832, '10.3700191', '123.94017389999999', 'Profile/6Ff8Lq_075.jpg', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '2019-02-28 13:59:22', '2019-02-28 13:59:22'),
(10, 28, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2955481', '123.86983310000005', NULL, NULL, NULL, NULL, NULL, 'ThreeSixty Pharmacy', 'Pharmacist_logo/8JA8wB_360pharmacy.jpg', NULL, '2019-03-01', '2019-03-30', '2019-03-06 12:50:02', '2019-03-06 12:50:02'),
(11, 29, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.30071', '123.87413930000002', NULL, NULL, NULL, NULL, NULL, 'Rose Pharmacy', 'Pharmacist_logo/bqdxTi_rosepharmacy.png', NULL, '2019-03-01', '2019-03-31', '2019-03-06 12:53:41', '2019-03-06 12:53:41'),
(12, 30, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.3037', '123.89539579999996', NULL, NULL, NULL, NULL, NULL, 'Far Eastern Drug Incorporated', 'Pharmacist_logo/A6HZmw_cfedi-logo-ed2_1.jpg', NULL, '2019-03-01', '2019-03-31', '2019-03-06 12:57:21', '2019-03-06 12:57:21'),
(13, 31, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2967423', '123.89902890000008', NULL, NULL, NULL, NULL, NULL, 'Evercare Pharmacy', 'Pharmacist_logo/E8t7CM_evercare-pharmacry.jpg', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:00:12', '2019-03-06 13:00:12'),
(14, 32, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2939589', '123.89892110000005', NULL, NULL, NULL, NULL, NULL, 'Cebu Chinese Drug', 'Pharmacist_logo/7Mqp5X_cebuchinesedrug.png', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:02:26', '2019-03-06 13:02:26'),
(15, 33, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2854367', '123.86484960000007', NULL, NULL, NULL, NULL, NULL, 'Generika Drugstore', 'Pharmacist_logo/3aOfol_D6GGNG7DR6WP33DDPQPC-578cb054.jpg', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:04:09', '2019-03-06 13:04:09'),
(16, 34, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.301554', '123.87070879999999', NULL, NULL, NULL, NULL, NULL, 'Vive Pharmacy', 'Pharmacist_logo/G5VWoU_vivepharmacy.png', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:06:18', '2019-03-06 13:06:18'),
(17, 35, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.3114887', '123.9001293', NULL, NULL, NULL, NULL, NULL, 'Pills and More Pharmacy', 'Pharmacist_logo/u7ZIOH_pillsandmore.png', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:09:20', '2019-03-06 13:09:20'),
(18, 37, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2967423', '123.89902890000008', NULL, NULL, NULL, NULL, NULL, 'Watsons Pharmacy', 'Pharmacist_logo/smgLsC_Watsons-logo-2013.png', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:12:30', '2019-03-06 13:12:30'),
(19, 38, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2912471', '123.85647819999997', NULL, NULL, NULL, NULL, NULL, 'Mercury Drug', 'Pharmacist_logo/gVT8LS_mercurydrug.jpg', NULL, '2019-03-01', '2019-03-31', '2019-03-06 13:14:53', '2019-03-06 13:14:53'),
(20, 39, 'jake', 'uy', 'flores', '2019-03-27', NULL, NULL, 630978456213, '10.2955481', '123.86983310000005', 'Profile/TvrzZL_ironman.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-22 16:11:01', '2019-03-22 16:11:01'),
(21, 40, NULL, NULL, NULL, NULL, NULL, NULL, 63, '10.301553', '123.87052700000004', NULL, NULL, NULL, NULL, NULL, 'jl pharmacy', 'Pharmacist_logo/ocBmCI_iron_man_3.jpg', NULL, '2019-02-24', '2019-04-06', '2019-03-22 16:14:39', '2019-03-22 16:14:39'),
(22, 41, NULL, NULL, NULL, NULL, NULL, NULL, 639215303832, '10.2967423', '123.89902890000008', NULL, NULL, NULL, NULL, NULL, 'Hello Pharmacy', 'Pharmacist_logo/KMwDfT_31964213_1928478397176615_2829982650305871872_n.jpg', NULL, '2019-03-25', '2019-03-31', '2019-03-22 16:42:02', '2019-03-22 16:42:02');

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
(1, 16, '1', '10.2955481', '123.86983310000005', '2019-03-19 20:41:23', '2019-03-27 18:27:00'),
(2, 39, '1', '10.2955481', '123.86983310000005', '2019-03-22 16:12:02', '2019-03-22 16:12:02'),
(3, 41, '1', '10.2967423', '123.89902890000008', '2019-03-22 17:27:05', '2019-03-22 17:27:05');

--
-- Indexes for dumped tables
--

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
  ADD KEY `medicines_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `history_carts`
--
ALTER TABLE `history_carts`
  MODIFY `historycart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_items`
--
ALTER TABLE `history_items`
  MODIFY `historyitem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mycarts`
--
ALTER TABLE `mycarts`
  MODIFY `mycart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_fees`
--
ALTER TABLE `shipping_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `medicines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mycarts`
--
ALTER TABLE `mycarts`
  ADD CONSTRAINT `mycarts_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mycarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
