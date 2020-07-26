-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2018 at 03:31 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoolov`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `visitor` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrongpasscount` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `company_id`, `role`, `name`, `email`, `password`, `lastlogin`, `visitor`, `wrongpasscount`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 1, 'Admin', 'Abc Company', 'admin@gmail.com', 'VPMXQVP3mYzLk', NULL, NULL, 0, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_languages`
--

CREATE TABLE `app_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` char(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `locale_short` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'English US',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_languages`
--

INSERT INTO `app_languages` (`id`, `locale`, `locale_short`, `name`, `created_at`, `updated_at`, `deleted`, `deleted_at`) VALUES
(1, 'en-US', 'en', 'English US', '2018-02-02 15:29:50', '2018-02-02 15:29:50', 0, NULL),
(2, 'bn-BD', 'en', 'Bengali', '2018-02-02 15:29:50', '2018-02-02 15:29:50', 0, NULL),
(3, 'fr-FR', 'en', 'French', '2018-02-02 15:29:50', '2018-02-02 15:29:50', 0, NULL),
(4, 'hi-IN', 'en', 'Indian', '2018-02-02 15:29:50', '2018-02-02 15:29:50', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagePath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accno` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `inventory_amt` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Current balance * avg unit price',
  `acc_balance` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'General Ledger Balance',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `copy_alias` BEFORE INSERT ON `categories` FOR EACH ROW IF NEW.alias IS NULL OR LENGTH(NEW.alias) < 1 THEN
                SET NEW.alias := NEW.name;
                END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_comp_id` int(11) NOT NULL,
  `comp_code` int(11) NOT NULL,
  `rooturl` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://localhost:8000',
  `comp_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BDT',
  `fpstartdate` date NOT NULL,
  `inventory` tinyint(1) NOT NULL DEFAULT '0',
  `project` tinyint(1) NOT NULL DEFAULT '1',
  `accounts` tinyint(1) NOT NULL DEFAULT '1',
  `ecom` tinyint(1) NOT NULL DEFAULT '1',
  `cash` int(11) NOT NULL DEFAULT '101',
  `bank` int(11) NOT NULL DEFAULT '102',
  `sales` int(11) NOT NULL DEFAULT '301',
  `purchase` int(11) NOT NULL DEFAULT '401',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `posted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `group_comp_id`, `comp_code`, `rooturl`, `comp_name`, `address`, `city`, `state`, `post_code`, `country`, `phone_no`, `email`, `website`, `currency`, `fpstartdate`, `inventory`, `project`, `accounts`, `ecom`, `cash`, `bank`, `sales`, `purchase`, `locale`, `posted`, `status`, `created_at`, `updated_at`, `remember_token`, `deleted_at`) VALUES
(1, 1, 101001, 'http://localhost:8000', 'Abc Company', '22/10 Tajmahal Road, Mohammodpur', 'Dhaka', NULL, NULL, 'Bangladesh', NULL, 'admin@gmail.com', NULL, 'BDT', '2018-01-01', 0, 1, 1, 1, 101, 102, 301, 401, 'en-US', 0, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29', NULL, NULL);

--
-- Triggers `companies`
--
DELIMITER $$
CREATE TRIGGER `new_comp_properties` AFTER INSERT ON `companies` FOR EACH ROW BEGIN
                   
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'CP','Cash Payment','100000');

                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'CR','Cash Receipt','200000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'BP','Bank Payment','300000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'BR','Bank Receipt','400000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'JV','Journal','500000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'SI','Sales Invoice','600000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'PR','Purchase','700000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'DC','Delivery Challan','800000');
                    
                    INSERT INTO trans_codes(company_id,trans_code, trans_name, lastid) VALUES(NEW.id, 'RQ','Requisition','900000');
                                                                                
                    INSERT INTO admins(company_id,name,email,password,role) VALUES(NEW.id,NEW.comp_name,NEW.email, ENCRYPT('pass123'),'Admin');

                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `countrycode_a` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countrycode_n` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencycode_n` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencycode_a` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencysymble` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `challan_no` int(10) UNSIGNED NOT NULL,
  `cdate` date NOT NULL,
  `contra` int(10) UNSIGNED NOT NULL,
  `relationship_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `delivery_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `locale` char(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `desc_type` smallint(6) NOT NULL DEFAULT '1',
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_periods`
--

CREATE TABLE `fiscal_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `fiscal_year` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `fp_no` int(11) NOT NULL,
  `month_sl` int(11) NOT NULL,
  `month_name` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `depriciation` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `godowns`
--

CREATE TABLE `godowns` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_companies`
--

CREATE TABLE `group_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `gcomp_code` int(11) NOT NULL,
  `gcomp_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_companies`
--

INSERT INTO `group_companies` (`id`, `gcomp_code`, `gcomp_name`, `city`, `state`, `post_code`, `country`, `phone_no`, `email`, `website`, `currency`, `status`, `created_at`, `updated_at`, `remember_token`, `deleted_at`) VALUES
(1, 101, 'Abc Group.', 'Dhaka', NULL, NULL, 'Bangladesh', NULL, 'ancgroup@gmail.com', NULL, NULL, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_order`
--

CREATE TABLE `guest_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(3, '2017_11_06_190536_create_group_companies_table', 1),
(4, '2017_11_07_185557_create_companies_table', 1),
(5, '2017_11_08_125115_create_admins_table', 1),
(6, '2017_11_08_182544_create_categories_table', 1),
(7, '2017_11_08_182613_create_sub_categories_table', 1),
(8, '2017_11_08_182712_create_brands_table', 1),
(9, '2017_11_08_183458_create_sizes_table', 1),
(10, '2017_11_08_183751_create_colors_table', 1),
(11, '2017_11_08_183804_create_models_table', 1),
(12, '2017_11_08_183950_create_taxes_table', 1),
(13, '2017_11_08_192522_create_relationships_table', 1),
(14, '2017_11_08_192801_create_units_table', 1),
(15, '2017_11_08_193245_create_godowns_table', 1),
(16, '2017_11_08_193257_create_racks_table', 1),
(17, '2017_11_08_231158_create_products_table', 1),
(18, '2017_11_09_142054_create_use_cases_table', 1),
(19, '2017_11_09_142348_create_privileges_table', 1),
(20, '2017_11_10_141836_create_descriptions_table', 1),
(21, '2017_11_12_145244_create_reviews_table', 1),
(22, '2017_11_18_165838_create_countries_table', 1),
(23, '2017_11_18_211844_create_requisitions_table', 1),
(24, '2017_11_18_212758_create_trans_products_table', 1),
(25, '2017_11_18_222500_create_trans_codes_table', 1),
(26, '2017_11_18_224349_create_trigger_company_table', 1),
(27, '2017_11_21_124438_create_purchases_table', 1),
(28, '2017_11_24_143440_create_product_movements_table', 1),
(29, '2017_11_24_153221_create_receives_table', 1),
(30, '2017_11_24_154453_create_returns_table', 1),
(31, '2017_11_25_174540_create_sales_table', 1),
(32, '2017_11_26_180937_create_deliveries_table', 1),
(33, '2017_11_28_002355_create_app_languages_table', 1),
(34, '2017_11_28_003503_create_name_translations_table', 1),
(35, '2017_12_28_133901_create_fiscal_periods_table', 1),
(36, '2018_01_15_180348_create_carts_table', 1),
(37, '2018_01_15_180901_create_cart_product_table', 1),
(38, '2018_01_19_215020_create_guests_table', 1),
(39, '2018_01_19_215127_create_orders_table', 1),
(40, '2018_01_19_215401_create_guest_order_table', 1),
(41, '2018_01_19_215615_create_order_user_table', 1),
(42, '2018_01_19_215852_create_order_product_table', 1),
(43, '2018_01_19_215936_create_invoices_table', 1),
(44, '2018_01_19_220003_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `name_translations`
--

CREATE TABLE `name_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` char(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `data_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delivered_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usecase_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `privilege` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `unit_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varient` tinyint(1) NOT NULL DEFAULT '0',
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_model_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL,
  `godown_id` int(10) UNSIGNED DEFAULT NULL,
  `rack_id` int(10) UNSIGNED DEFAULT NULL,
  `initial_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `buy_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `wholesale_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `retail_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `reorder_point` decimal(15,2) NOT NULL DEFAULT '0.00',
  `opening_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `opening_value` decimal(15,2) NOT NULL DEFAULT '0.00',
  `onhand` decimal(15,2) NOT NULL DEFAULT '0.00',
  `committed` decimal(15,2) NOT NULL DEFAULT '0.00',
  `incomming` decimal(15,2) NOT NULL DEFAULT '0.00',
  `maxonlinestock` decimal(15,2) NOT NULL DEFAULT '0.00',
  `minonlineorder` decimal(15,2) NOT NULL DEFAULT '0.00',
  `purchase_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `sell_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `salvage_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `received_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `return_qty` decimal(15,2) NOT NULL DEFAULT '0.00',
  `shipping` int(10) UNSIGNED DEFAULT '0',
  `discount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description_short` text COLLATE utf8mb4_unicode_ci,
  `description_long` text COLLATE utf8mb4_unicode_ci,
  `stuff_included` text COLLATE utf8mb4_unicode_ci,
  `warranty_period` double UNSIGNED DEFAULT NULL,
  `image` varchar(195) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_large` varchar(195) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellable` tinyint(1) NOT NULL DEFAULT '1',
  `purchasable` tinyint(1) NOT NULL DEFAULT '1',
  `b2bpublish` tinyint(1) NOT NULL DEFAULT '0',
  `free` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `taxable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_models`
--

CREATE TABLE `product_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_movements`
--

CREATE TABLE `product_movements` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `refno` int(10) UNSIGNED NOT NULL,
  `tr_date` date NOT NULL,
  `barcode` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `contra` int(10) UNSIGNED NOT NULL,
  `reftype` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '0.00',
  `received` decimal(15,2) NOT NULL DEFAULT '0.00',
  `returned` decimal(15,2) NOT NULL DEFAULT '0.00',
  `delevered` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tax_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tax_total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `refno` int(10) UNSIGNED NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdate` date NOT NULL,
  `relationship_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `paid_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `due_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `approver` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godown_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `refno` int(10) UNSIGNED NOT NULL,
  `rdate` date NOT NULL,
  `contra` int(10) UNSIGNED NOT NULL,
  `relationship_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `receive_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_number` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `glcode` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asigned` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_price` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Whole Sale / Retail',
  `default_discount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `default_payment_term` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_payment_method` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_order_value` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `refno` int(10) UNSIGNED NOT NULL,
  `reqtype` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqdate` date NOT NULL,
  `approver` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `refno` int(10) UNSIGNED NOT NULL,
  `rdate` date NOT NULL,
  `contra` int(10) UNSIGNED NOT NULL,
  `relationship_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `return_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `invoiceno` int(10) UNSIGNED NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoicedate` date NOT NULL,
  `relationship_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `paid_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `due_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
  `approver` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `sub_categories`
--
DELIMITER $$
CREATE TRIGGER `copy_alias_sub` BEFORE INSERT ON `sub_categories` FOR EACH ROW IF NEW.alias IS NULL OR LENGTH(NEW.alias) < 1 THEN
            SET NEW.alias := NEW.name;
            END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicable_on` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S' COMMENT 'P=Purchase ; S= Sales ;',
  `rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `calculating_mode` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P' COMMENT 'P=Percentage ; F= Fixed Amount ;',
  `description` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trans_codes`
--

CREATE TABLE `trans_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `trans_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trans_codes`
--

INSERT INTO `trans_codes` (`id`, `company_id`, `trans_code`, `trans_name`, `lastid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'CP', 'Cash Payment', 100000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(2, 1, 'CR', 'Cash Receipt', 200000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(3, 1, 'BP', 'Bank Payment', 300000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(4, 1, 'BR', 'Bank Receipt', 400000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(5, 1, 'JV', 'Journal', 500000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(6, 1, 'SI', 'Sales Invoice', 600000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(7, 1, 'PR', 'Purchase', 700000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(8, 1, 'DC', 'Delivery Challan', 800000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29'),
(9, 1, 'RQ', 'Requisition', 900000, 1, '2018-02-02 15:27:29', '2018-02-02 15:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `trans_products`
--

CREATE TABLE `trans_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `refno` int(10) UNSIGNED NOT NULL,
  `tr_date` date NOT NULL,
  `contra` int(10) UNSIGNED NOT NULL,
  `reftype` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `towhome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tax_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `approved` decimal(15,2) NOT NULL DEFAULT '0.00',
  `purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `sold` decimal(15,2) NOT NULL DEFAULT '0.00',
  `received` decimal(15,2) NOT NULL DEFAULT '0.00',
  `returned` decimal(15,2) NOT NULL DEFAULT '0.00',
  `delevered` decimal(15,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formal_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_decimal_places` int(11) NOT NULL DEFAULT '2',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en-US',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` blob,
  `phone` bigint(20) NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Female','Male') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `visitor` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrongpasscount` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `use_cases`
--

CREATE TABLE `use_cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `menu_id` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usecase_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_company_id_foreign` (`company_id`);

--
-- Indexes for table `app_languages`
--
ALTER TABLE `app_languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_languages_locale_unique` (`locale`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `brands_admin_id_foreign` (`admin_id`),
  ADD KEY `brands_company_id_foreign` (`company_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_ibfk_1` (`user_id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_contains_many_products` (`cart_id`),
  ADD KEY `FK_cart_product_products` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_company_id_name_unique` (`company_id`,`name`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_admin_id_foreign` (`admin_id`),
  ADD KEY `colors_company_id_foreign` (`company_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_group_comp_id_unique` (`group_comp_id`),
  ADD UNIQUE KEY `companies_comp_code_unique` (`comp_code`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_countrycode_a_unique` (`countrycode_a`),
  ADD UNIQUE KEY `countries_countrycode_n_unique` (`countrycode_n`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_company_id_foreign` (`company_id`),
  ADD KEY `deliveries_approver_foreign` (`approver`),
  ADD KEY `deliveries_user_id_foreign` (`user_id`),
  ADD KEY `FK_purchase_relationships` (`relationship_id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descriptions_company_id_foreign` (`company_id`),
  ADD KEY `descriptions_product_id_foreign` (`product_id`),
  ADD KEY `descriptions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `fiscal_periods`
--
ALTER TABLE `fiscal_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiscal_periods_company_id_foreign` (`company_id`);

--
-- Indexes for table `godowns`
--
ALTER TABLE `godowns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `godowns_company_id_foreign` (`company_id`),
  ADD KEY `godowns_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `group_companies`
--
ALTER TABLE `group_companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_companies_gcomp_code_unique` (`gcomp_code`),
  ADD UNIQUE KEY `group_companies_email_unique` (`email`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_order`
--
ALTER TABLE `guest_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_order_ibfk_1` (`order_id`),
  ADD KEY `guest_order_ibfk_2` (`guest_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `name_translations`
--
ALTER TABLE `name_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_translations_company_id_foreign` (`company_id`),
  ADD KEY `name_translations_locale_foreign` (`locale`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_ibfk_1` (`order_id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_ibfk_1` (`order_id`),
  ADD KEY `order_user_ibfk_2` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privileges_company_id_foreign` (`company_id`),
  ADD KEY `privileges_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_company_id_product_code_unique` (`company_id`,`product_code`),
  ADD UNIQUE KEY `products_company_id_sku_unique` (`company_id`,`sku`),
  ADD KEY `products_size_id_foreign` (`size_id`),
  ADD KEY `products_color_id_foreign` (`color_id`),
  ADD KEY `products_admin_id_foreign` (`admin_id`),
  ADD KEY `FK_products_relationships` (`relationship_id`),
  ADD KEY `FK_products_brands` (`brand_id`),
  ADD KEY `FK_products_categories` (`category_id`),
  ADD KEY `FK_products_sub_categories` (`subcategory_id`),
  ADD KEY `FK_products_units` (`unit_name`),
  ADD KEY `FK_products_models` (`product_model_id`),
  ADD KEY `FK_products_tax` (`tax_id`),
  ADD KEY `FK_products_godowns` (`godown_id`),
  ADD KEY `FK_products_racks` (`rack_id`);

--
-- Indexes for table `product_models`
--
ALTER TABLE `product_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_models_admin_id_foreign` (`admin_id`),
  ADD KEY `product_models_company_id_foreign` (`company_id`);

--
-- Indexes for table `product_movements`
--
ALTER TABLE `product_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_movements_company_id_foreign` (`company_id`),
  ADD KEY `product_movements_product_id_foreign` (`product_id`),
  ADD KEY `product_movements_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_company_id_foreign` (`company_id`),
  ADD KEY `purchases_approver_foreign` (`approver`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `FK_purchase_relationships` (`relationship_id`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `racks_company_id_foreign` (`company_id`),
  ADD KEY `racks_godown_id_foreign` (`godown_id`),
  ADD KEY `racks_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receives_company_id_foreign` (`company_id`),
  ADD KEY `receives_user_id_foreign` (`user_id`),
  ADD KEY `FK_purchase_relationships` (`relationship_id`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `relationships_company_id_name_unique` (`company_id`,`name`),
  ADD KEY `relationships_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisitions_company_id_foreign` (`company_id`),
  ADD KEY `requisitions_approver_foreign` (`approver`),
  ADD KEY `requisitions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returns_company_id_foreign` (`company_id`),
  ADD KEY `returns_user_id_foreign` (`user_id`),
  ADD KEY `FK_purchase_relationships` (`relationship_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_company_id_foreign` (`company_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_company_id_foreign` (`company_id`),
  ADD KEY `sales_approver_foreign` (`approver`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `FK_sales_relationships` (`relationship_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_company_id_size_unique` (`company_id`,`size`),
  ADD KEY `sizes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_company_id_category_id_alias_name_unique` (`company_id`,`category_id`,`alias`,`name`),
  ADD KEY `sub_categories_admin_id_foreign` (`admin_id`),
  ADD KEY `FK_sub_categories_categories` (`category_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taxes_admin_id_foreign` (`admin_id`),
  ADD KEY `taxes_company_id_foreign` (`company_id`);

--
-- Indexes for table `trans_codes`
--
ALTER TABLE `trans_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_codes_company_id_foreign` (`company_id`);

--
-- Indexes for table `trans_products`
--
ALTER TABLE `trans_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_products_company_id_foreign` (`company_id`),
  ADD KEY `trans_products_product_id_foreign` (`product_id`),
  ADD KEY `FK_products_tax` (`tax_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`),
  ADD KEY `units_company_id_foreign` (`company_id`),
  ADD KEY `units_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `use_cases`
--
ALTER TABLE `use_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `use_cases_company_id_foreign` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_languages`
--
ALTER TABLE `app_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fiscal_periods`
--
ALTER TABLE `fiscal_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `godowns`
--
ALTER TABLE `godowns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_companies`
--
ALTER TABLE `group_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guest_order`
--
ALTER TABLE `guest_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `name_translations`
--
ALTER TABLE `name_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_movements`
--
ALTER TABLE `product_movements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_codes`
--
ALTER TABLE `trans_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trans_products`
--
ALTER TABLE `trans_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `use_cases`
--
ALTER TABLE `use_cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `brands_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `FK_cart_contains_many_products` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_product_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `colors_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_approver_foreign` FOREIGN KEY (`approver`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `deliveries_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `deliveries_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`),
  ADD CONSTRAINT `deliveries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD CONSTRAINT `descriptions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `descriptions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `descriptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fiscal_periods`
--
ALTER TABLE `fiscal_periods`
  ADD CONSTRAINT `fiscal_periods_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `godowns`
--
ALTER TABLE `godowns`
  ADD CONSTRAINT `godowns_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `godowns_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `guest_order`
--
ALTER TABLE `guest_order`
  ADD CONSTRAINT `guest_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guest_order_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `name_translations`
--
ALTER TABLE `name_translations`
  ADD CONSTRAINT `name_translations_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `name_translations_locale_foreign` FOREIGN KEY (`locale`) REFERENCES `app_languages` (`locale`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `privileges_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `products_godown_id_foreign` FOREIGN KEY (`godown_id`) REFERENCES `godowns` (`id`),
  ADD CONSTRAINT `products_product_model_id_foreign` FOREIGN KEY (`product_model_id`) REFERENCES `product_models` (`id`),
  ADD CONSTRAINT `products_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `racks` (`id`),
  ADD CONSTRAINT `products_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`),
  ADD CONSTRAINT `products_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`),
  ADD CONSTRAINT `products_unit_name_foreign` FOREIGN KEY (`unit_name`) REFERENCES `units` (`name`) ON UPDATE CASCADE;

--
-- Constraints for table `product_models`
--
ALTER TABLE `product_models`
  ADD CONSTRAINT `product_models_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `product_models_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `product_movements`
--
ALTER TABLE `product_movements`
  ADD CONSTRAINT `product_movements_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `product_movements_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_movements_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_approver_foreign` FOREIGN KEY (`approver`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `purchases_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `purchases_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `racks`
--
ALTER TABLE `racks`
  ADD CONSTRAINT `racks_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `racks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `racks_godown_id_foreign` FOREIGN KEY (`godown_id`) REFERENCES `godowns` (`id`);

--
-- Constraints for table `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `receives_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`),
  ADD CONSTRAINT `receives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `relationships`
--
ALTER TABLE `relationships`
  ADD CONSTRAINT `relationships_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `relationships_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD CONSTRAINT `requisitions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `requisitions_approver_foreign` FOREIGN KEY (`approver`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `requisitions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `returns_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`),
  ADD CONSTRAINT `returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_approver_foreign` FOREIGN KEY (`approver`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `sales_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `sales_relationship_id_foreign` FOREIGN KEY (`relationship_id`) REFERENCES `relationships` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `sizes_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `FK_sub_categories_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `sub_categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `taxes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `taxes_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `trans_codes`
--
ALTER TABLE `trans_codes`
  ADD CONSTRAINT `trans_codes_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `trans_products`
--
ALTER TABLE `trans_products`
  ADD CONSTRAINT `trans_products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `trans_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `trans_products_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `units_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `use_cases`
--
ALTER TABLE `use_cases`
  ADD CONSTRAINT `use_cases_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
