-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbms_zabeerdhaka_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_comment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Admin, 2=Manager, 3=Front Desk Officer, 4=Guest',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `gender`, `date_of_birth`, `phone`, `address`, `city`, `state`, `postal_code`, `country`, `admin_comment`, `profile_photo`, `cover_photo`, `role_as`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@gmail.com', NULL, '$2y$10$gnkYXf1/YYANYrtwJEFtjeevxkyADSdRH8ic4IKFquEDG9uxjki0m', NULL, 'Male', '1995-10-03', '01680078100', 'Uttarkhan', 'Dhaka', NULL, '1230', 'Bangladesh', NULL, 'Super-1674131293.jpg', 'Super-1674131293.jpg', 1, 1, 1, NULL, '1', '2022-12-25 10:39:31', '2023-01-29 04:00:27'),
(15, 'Muhammad', 'Raisul', 'rishowmin.seu38@gmail.com', NULL, '$2y$10$luOvslrp/eEdaV3VY7Uy1uwJjrp0kU4YQveaQgx2sFDPwlpM0OUP6', NULL, 'Male', NULL, '01680078100', NULL, NULL, NULL, NULL, 'Bangladesh', NULL, NULL, NULL, 3, 1, 1, '1', '1', '2023-01-30 02:38:50', '2023-01-31 04:32:16');

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
-- Table structure for table `hb_bookings`
--

CREATE TABLE `hb_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `checkin_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_childs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Pending, 1=Booked, 2=Cancel, 3=Payment Pending',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_comment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_bookings`
--

INSERT INTO `hb_bookings` (`id`, `guest_id`, `room_id`, `staff_id`, `checkin_date`, `checkout_date`, `checkin_time`, `checkout_time`, `total_adults`, `total_childs`, `booking_status`, `is_delete`, `payment_mode`, `booking_comment`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-12-30', '2022-12-31', '14:00', '12:00', '2', '0', 1, 1, '', 'Super Admin', '1', NULL, '2022-12-26 18:17:07', '2022-12-26 18:17:07'),
(2, 1, 2, 1, '2023-01-03', '2023-01-04', '14:00', '12:00', '2', '1', 0, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-01 21:20:58', '2023-01-01 21:20:58'),
(3, 1, 1, 1, '2023-01-09', '2023-01-10', '14:00', '12:00', '1', '0', 3, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-08 20:53:13', '2023-01-08 20:53:13'),
(4, 5, 2, 1, '2023-01-10', '2023-01-10', '14:00', '12:00', '2', '1', 0, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-08 21:00:56', '2023-01-08 21:00:56'),
(5, 5, 3, 1, '2023-01-10', '2023-01-10', '14:00', '12:00', '2', '1', 0, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-08 21:05:52', '2023-01-08 21:05:52'),
(6, 5, 2, 1, '2023-01-10', '2023-01-11', '14:00', '12:00', '6', '5', 0, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-08 21:18:36', '2023-01-08 21:18:36'),
(7, 5, 4, 1, '2023-01-10', '2023-01-11', '14:00', '12:00', '2', '1', 1, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-08 23:28:29', '2023-01-11 19:28:59'),
(8, 5, 1, 1, '2023-01-11', '2023-01-12', '14:00', '12:00', '2', '1', 3, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-08 23:51:49', '2023-01-08 23:51:49'),
(9, 1, 4, 1, '2023-01-30', '2023-01-31', '14:00', '12:00', '2', '1', 0, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-09 00:09:07', '2023-01-09 00:09:07'),
(10, 1, 1, 1, '2023-01-28', '2023-01-29', '14:00', '12:00', '2', '0', 2, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-09 00:12:58', '2023-01-09 01:08:26'),
(11, 1, 1, 1, '2023-01-30', '2023-01-31', '14:00', '12:00', '1', '0', 1, 1, '', 'Super Admin', '1', NULL, '2023-01-09 01:08:04', '2023-01-09 01:08:04'),
(12, 6, 3, 1, '2023-01-11', '2023-01-12', '14:00', '12:00', '2', '0', 1, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-10 18:38:15', '2023-01-10 18:42:28'),
(13, 6, 2, 1, '2023-01-18', '2023-01-19', '14:00', '12:00', '1', '0', 3, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-10 19:10:30', '2023-01-10 19:10:30'),
(14, 6, 4, 1, '2023-01-28', '2023-01-29', '14:00', '12:00', '1', '0', 3, 1, '', 'Super Admin', '1', '0', '2023-01-10 19:51:28', '2023-01-10 19:52:01'),
(15, 4, 2, 1, '2023-01-12', '2023-01-14', '14:00', '12:00', '1', '0', 1, 1, '', 'Booking created by Guest', '6', NULL, '2023-01-10 20:30:57', '2023-01-11 19:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `hb_country`
--

CREATE TABLE `hb_country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_country`
--

INSERT INTO `hb_country` (`id`, `country_code`, `country_name`, `code`, `currency`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'AFG', 'Afghanistan', 'AF', '', 1, '0', '0', NULL, NULL),
(2, 'ALA', 'Åland', 'AX', '', 1, '0', '0', NULL, NULL),
(3, 'ALB', 'Albania', 'AL', '', 1, '0', '0', NULL, NULL),
(4, 'DZA', 'Algeria', 'DZ', '', 1, '0', '0', NULL, NULL),
(5, 'ASM', 'American Samoa', 'AS', '', 1, '0', '0', NULL, NULL),
(6, 'AND', 'Andorra', 'AD', '', 1, '0', '0', NULL, NULL),
(7, 'AGO', 'Angola', 'AO', '', 1, '0', '0', NULL, NULL),
(8, 'AIA', 'Anguilla', 'AI', '', 1, '0', '0', NULL, NULL),
(9, 'ATA', 'Antarctica', 'AQ', '', 1, '0', '0', NULL, NULL),
(10, 'ATG', 'Antigua and Barbuda', 'AG', '', 1, '0', '0', NULL, NULL),
(11, 'ARG', 'Argentina', 'AR', '', 1, '0', '0', NULL, NULL),
(12, 'ARM', 'Armenia', 'AM', '', 1, '0', '0', NULL, NULL),
(13, 'ABW', 'Aruba', 'AW', '', 1, '0', '0', NULL, NULL),
(14, 'AUS', 'Australia', 'AU', '', 1, '0', '0', NULL, NULL),
(15, 'AUT', 'Austria', 'AT', '', 1, '0', '0', NULL, NULL),
(16, 'AZE', 'Azerbaijan', 'AZ', '', 1, '0', '0', NULL, NULL),
(17, 'BHS', 'Bahamas', 'BS', '', 1, '0', '0', NULL, NULL),
(18, 'BHR', 'Bahrain', 'BH', '', 1, '0', '0', NULL, NULL),
(19, 'BGD', 'Bangladesh', 'BD', '', 1, '0', '0', NULL, NULL),
(20, 'BRB', 'Barbados', 'BB', '', 1, '0', '0', NULL, NULL),
(21, 'BLR', 'Belarus', 'BY', '', 1, '0', '0', NULL, NULL),
(22, 'BEL', 'Belgium', 'BE', '', 1, '0', '0', NULL, NULL),
(23, 'BLZ', 'Belize', 'BZ', '', 1, '0', '0', NULL, NULL),
(24, 'BEN', 'Benin', 'BJ', '', 1, '0', '0', NULL, NULL),
(25, 'BMU', 'Bermuda', 'BM', '', 1, '0', '0', NULL, NULL),
(26, 'BTN', 'Bhutan', 'BT', '', 1, '0', '0', NULL, NULL),
(27, 'BOL', 'Bolivia', 'BO', '', 1, '0', '0', NULL, NULL),
(28, 'BES', 'Bonaire', 'BQ', '', 1, '0', '0', NULL, NULL),
(29, 'BIH', 'Bosnia and Herzegovina', 'BA', '', 1, '0', '0', NULL, NULL),
(30, 'BWA', 'Botswana', 'BW', '', 1, '0', '0', NULL, NULL),
(31, 'BVT', 'Bouvet Island', 'BV', '', 1, '0', '0', NULL, NULL),
(32, 'BRA', 'Brazil', 'BR', '', 1, '0', '0', NULL, NULL),
(33, 'IOT', 'British Indian Ocean Territory', 'IO', '', 1, '0', '0', NULL, NULL),
(34, 'VGB', 'British Virgin Islands', 'VG', '', 1, '0', '0', NULL, NULL),
(35, 'BRN', 'Brunei', 'BN', '', 1, '0', '0', NULL, NULL),
(36, 'BGR', 'Bulgaria', 'BG', '', 1, '0', '0', NULL, NULL),
(37, 'BFA', 'Burkina Faso', 'BF', '', 1, '0', '0', NULL, NULL),
(38, 'BDI', 'Burundi', 'BI', '', 1, '0', '0', NULL, NULL),
(39, 'KHM', 'Cambodia', 'KH', '', 1, '0', '0', NULL, NULL),
(40, 'CMR', 'Cameroon', 'CM', '', 1, '0', '0', NULL, NULL),
(41, 'CAN', 'Canada', 'CA', '', 1, '0', '0', NULL, NULL),
(42, 'CPV', 'Cape Verde', 'CV', '', 1, '0', '0', NULL, NULL),
(43, 'CYM', 'Cayman Islands', 'KY', '', 1, '0', '0', NULL, NULL),
(44, 'CAF', 'Central African Republic', 'CF', '', 1, '0', '0', NULL, NULL),
(45, 'TCD', 'Chad', 'TD', '', 1, '0', '0', NULL, NULL),
(46, 'CHL', 'Chile', 'CL', '', 1, '0', '0', NULL, NULL),
(47, 'CHN', 'China', 'CN', '', 1, '0', '0', NULL, NULL),
(48, 'CXR', 'Christmas Island', 'CX', '', 1, '0', '0', NULL, NULL),
(49, 'CCK', 'Cocos [Keeling] Islands', 'CC', '', 1, '0', '0', NULL, NULL),
(50, 'COL', 'Colombia', 'CO', '', 1, '0', '0', NULL, NULL),
(51, 'COM', 'Comoros', 'KM', '', 1, '0', '0', NULL, NULL),
(52, 'COK', 'Cook Islands', 'CK', '', 1, '0', '0', NULL, NULL),
(53, 'CRI', 'Costa Rica', 'CR', '', 1, '0', '0', NULL, NULL),
(54, 'HRV', 'Croatia', 'HR', '', 1, '0', '0', NULL, NULL),
(55, 'CUB', 'Cuba', 'CU', '', 1, '0', '0', NULL, NULL),
(56, 'CUW', 'Curacao', 'CW', '', 1, '0', '0', NULL, NULL),
(57, 'CYP', 'Cyprus', 'CY', '', 1, '0', '0', NULL, NULL),
(58, 'CZE', 'Czech Republic', 'CZ', '', 1, '0', '0', NULL, NULL),
(59, 'COD', 'Democratic Republic of the Congo', 'CD', '', 1, '0', '0', NULL, NULL),
(60, 'DNK', 'Denmark', 'DK', '', 1, '0', '0', NULL, NULL),
(61, 'DJI', 'Djibouti', 'DJ', '', 1, '0', '0', NULL, NULL),
(62, 'DMA', 'Dominica', 'DM', '', 1, '0', '0', NULL, NULL),
(63, 'DOM', 'Dominican Republic', 'DO', '', 1, '0', '0', NULL, NULL),
(64, 'TLS', 'East Timor', 'TL', '', 1, '0', '0', NULL, NULL),
(65, 'ECU', 'Ecuador', 'EC', '', 1, '0', '0', NULL, NULL),
(66, 'EGY', 'Egypt', 'EG', '', 1, '0', '0', NULL, NULL),
(67, 'SLV', 'El Salvador', 'SV', '', 1, '0', '0', NULL, NULL),
(68, 'GNQ', 'Equatorial Guinea', 'GQ', '', 1, '0', '0', NULL, NULL),
(69, 'ERI', 'Eritrea', 'ER', '', 1, '0', '0', NULL, NULL),
(70, 'EST', 'Estonia', 'EE', '', 1, '0', '0', NULL, NULL),
(71, 'ETH', 'Ethiopia', 'ET', '', 1, '0', '0', NULL, NULL),
(72, 'FLK', 'Falkland Islands', 'FK', '', 1, '0', '0', NULL, NULL),
(73, 'FRO', 'Faroe Islands', 'FO', '', 1, '0', '0', NULL, NULL),
(74, 'FJI', 'Fiji', 'FJ', '', 1, '0', '0', NULL, NULL),
(75, 'FIN', 'Finland', 'FI', '', 1, '0', '0', NULL, NULL),
(76, 'FRA', 'France', 'FR', '', 1, '0', '0', NULL, NULL),
(77, 'GUF', 'French Guiana', 'GF', '', 1, '0', '0', NULL, NULL),
(78, 'PYF', 'French Polynesia', 'PF', '', 1, '0', '0', NULL, NULL),
(79, 'ATF', 'French Southern Territories', 'TF', '', 1, '0', '0', NULL, NULL),
(80, 'GAB', 'Gabon', 'GA', '', 1, '0', '0', NULL, NULL),
(81, 'GMB', 'Gambia', 'GM', '', 1, '0', '0', NULL, NULL),
(82, 'GEO', 'Georgia', 'GE', '', 1, '0', '0', NULL, NULL),
(83, 'DEU', 'Germany', 'DE', '', 1, '0', '0', NULL, NULL),
(84, 'GHA', 'Ghana', 'GH', '', 1, '0', '0', NULL, NULL),
(85, 'GIB', 'Gibraltar', 'GI', '', 1, '0', '0', NULL, NULL),
(86, 'GRC', 'Greece', 'GR', '', 1, '0', '0', NULL, NULL),
(87, 'GRL', 'Greenland', 'GL', '', 1, '0', '0', NULL, NULL),
(88, 'GRD', 'Grenada', 'GD', '', 1, '0', '0', NULL, NULL),
(89, 'GLP', 'Guadeloupe', 'GP', '', 1, '0', '0', NULL, NULL),
(90, 'GUM', 'Guam', 'GU', '', 1, '0', '0', NULL, NULL),
(91, 'GTM', 'Guatemala', 'GT', '', 1, '0', '0', NULL, NULL),
(92, 'GGY', 'Guernsey', 'GG', '', 1, '0', '0', NULL, NULL),
(93, 'GIN', 'Guinea', 'GN', '', 1, '0', '0', NULL, NULL),
(94, 'GNB', 'Guinea-Bissau', 'GW', '', 1, '0', '0', NULL, NULL),
(95, 'GUY', 'Guyana', 'GY', '', 1, '0', '0', NULL, NULL),
(96, 'HTI', 'Haiti', 'HT', '', 1, '0', '0', NULL, NULL),
(97, 'HMD', 'Heard Island and McDonald Islands', 'HM', '', 1, '0', '0', NULL, NULL),
(98, 'HND', 'Honduras', 'HN', '', 1, '0', '0', NULL, NULL),
(99, 'HKG', 'Hong Kong', 'HK', '', 1, '0', '0', NULL, NULL),
(100, 'HUN', 'Hungary', 'HU', '', 1, '0', '0', NULL, NULL),
(101, 'ISL', 'Iceland', 'IS', '', 1, '0', '0', NULL, NULL),
(102, 'IND', 'India', 'IN', '', 1, '0', '0', NULL, NULL),
(103, 'IDN', 'Indonesia', 'ID', '', 1, '0', '0', NULL, NULL),
(104, 'IRN', 'Iran', 'IR', '', 1, '0', '0', NULL, NULL),
(105, 'IRQ', 'Iraq', 'IQ', '', 1, '0', '0', NULL, NULL),
(106, 'IRL', 'Ireland', 'IE', '', 1, '0', '0', NULL, NULL),
(107, 'IMN', 'Isle of Man', 'IM', '', 1, '0', '0', NULL, NULL),
(108, 'ISR', 'Israel', 'IL', '', 1, '0', '0', NULL, NULL),
(109, 'ITA', 'Italy', 'IT', '', 1, '0', '0', NULL, NULL),
(110, 'CIV', 'Ivory Coast', 'CI', '', 1, '0', '0', NULL, NULL),
(111, 'JAM', 'Jamaica', 'JM', '', 1, '0', '0', NULL, NULL),
(112, 'JPN', 'Japan', 'JP', '', 1, '0', '0', NULL, NULL),
(113, 'JEY', 'Jersey', 'JE', '', 1, '0', '0', NULL, NULL),
(114, 'JOR', 'Jordan', 'JO', '', 1, '0', '0', NULL, NULL),
(115, 'KAZ', 'Kazakhstan', 'KZ', '', 1, '0', '0', NULL, NULL),
(116, 'KEN', 'Kenya', 'KE', '', 1, '0', '0', NULL, NULL),
(117, 'KIR', 'Kiribati', 'KI', '', 1, '0', '0', NULL, NULL),
(118, 'XKX', 'Kosovo', 'XK', '', 1, '0', '0', NULL, NULL),
(119, 'KWT', 'Kuwait', 'KW', '', 1, '0', '0', NULL, NULL),
(120, 'KGZ', 'Kyrgyzstan', 'KG', '', 1, '0', '0', NULL, NULL),
(121, 'LAO', 'Laos', 'LA', '', 1, '0', '0', NULL, NULL),
(122, 'LVA', 'Latvia', 'LV', '', 1, '0', '0', NULL, NULL),
(123, 'LBN', 'Lebanon', 'LB', '', 1, '0', '0', NULL, NULL),
(124, 'LSO', 'Lesotho', 'LS', '', 1, '0', '0', NULL, NULL),
(125, 'LBR', 'Liberia', 'LR', '', 1, '0', '0', NULL, NULL),
(126, 'LBY', 'Libya', 'LY', '', 1, '0', '0', NULL, NULL),
(127, 'LIE', 'Liechtenstein', 'LI', '', 1, '0', '0', NULL, NULL),
(128, 'LTU', 'Lithuania', 'LT', '', 1, '0', '0', NULL, NULL),
(129, 'LUX', 'Luxembourg', 'LU', '', 1, '0', '0', NULL, NULL),
(130, 'MAC', 'Macao', 'MO', '', 1, '0', '0', NULL, NULL),
(131, 'MKD', 'Macedonia', 'MK', '', 1, '0', '0', NULL, NULL),
(132, 'MDG', 'Madagascar', 'MG', '', 1, '0', '0', NULL, NULL),
(133, 'MWI', 'Malawi', 'MW', '', 1, '0', '0', NULL, NULL),
(134, 'MYS', 'Malaysia', 'MY', '', 1, '0', '0', NULL, NULL),
(135, 'MDV', 'Maldives', 'MV', '', 1, '0', '0', NULL, NULL),
(136, 'MLI', 'Mali', 'ML', '', 1, '0', '0', NULL, NULL),
(137, 'MLT', 'Malta', 'MT', '', 1, '0', '0', NULL, NULL),
(138, 'MHL', 'Marshall Islands', 'MH', '', 1, '0', '0', NULL, NULL),
(139, 'MTQ', 'Martinique', 'MQ', '', 1, '0', '0', NULL, NULL),
(140, 'MRT', 'Mauritania', 'MR', '', 1, '0', '0', NULL, NULL),
(141, 'MUS', 'Mauritius', 'MU', '', 1, '0', '0', NULL, NULL),
(142, 'MYT', 'Mayotte', 'YT', '', 1, '0', '0', NULL, NULL),
(143, 'MEX', 'Mexico', 'MX', '', 1, '0', '0', NULL, NULL),
(144, 'FSM', 'Micronesia', 'FM', '', 1, '0', '0', NULL, NULL),
(145, 'MDA', 'Moldova', 'MD', '', 1, '0', '0', NULL, NULL),
(146, 'MCO', 'Monaco', 'MC', '', 1, '0', '0', NULL, NULL),
(147, 'MNG', 'Mongolia', 'MN', '', 1, '0', '0', NULL, NULL),
(148, 'MNE', 'Montenegro', 'ME', '', 1, '0', '0', NULL, NULL),
(149, 'MSR', 'Montserrat', 'MS', '', 1, '0', '0', NULL, NULL),
(150, 'MAR', 'Morocco', 'MA', '', 1, '0', '0', NULL, NULL),
(151, 'MOZ', 'Mozambique', 'MZ', '', 1, '0', '0', NULL, NULL),
(152, 'MMR', 'Myanmar [Burma]', 'MM', '', 1, '0', '0', NULL, NULL),
(153, 'NAM', 'Namibia', 'NA', '', 1, '0', '0', NULL, NULL),
(154, 'NRU', 'Nauru', 'NR', '', 1, '0', '0', NULL, NULL),
(155, 'NPL', 'Nepal', 'NP', '', 1, '0', '0', NULL, NULL),
(156, 'NLD', 'Netherlands', 'NL', '', 1, '0', '0', NULL, NULL),
(157, 'NCL', 'New Caledonia', 'NC', '', 1, '0', '0', NULL, NULL),
(158, 'NZL', 'New Zealand', 'NZ', '', 1, '0', '0', NULL, NULL),
(159, 'NIC', 'Nicaragua', 'NI', '', 1, '0', '0', NULL, NULL),
(160, 'NER', 'Niger', 'NE', '', 1, '0', '0', NULL, NULL),
(161, 'NGA', 'Nigeria', 'NG', '', 1, '0', '0', NULL, NULL),
(162, 'NIU', 'Niue', 'NU', '', 1, '0', '0', NULL, NULL),
(163, 'NFK', 'Norfolk Island', 'NF', '', 1, '0', '0', NULL, NULL),
(164, 'PRK', 'North Korea', 'KP', '', 1, '0', '0', NULL, NULL),
(165, 'MNP', 'Northern Mariana Islands', 'MP', '', 1, '0', '0', NULL, NULL),
(166, 'NOR', 'Norway', 'NO', '', 1, '0', '0', NULL, NULL),
(167, 'OMN', 'Oman', 'OM', '', 1, '0', '0', NULL, NULL),
(168, 'PAK', 'Pakistan', 'PK', '', 1, '0', '0', NULL, NULL),
(169, 'PLW', 'Palau', 'PW', '', 1, '0', '0', NULL, NULL),
(170, 'PSE', 'Palestine', 'PS', '', 1, '0', '0', NULL, NULL),
(171, 'PAN', 'Panama', 'PA', '', 1, '0', '0', NULL, NULL),
(172, 'PNG', 'Papua New Guinea', 'PG', '', 1, '0', '0', NULL, NULL),
(173, 'PRY', 'Paraguay', 'PY', '', 1, '0', '0', NULL, NULL),
(174, 'PER', 'Peru', 'PE', '', 1, '0', '0', NULL, NULL),
(175, 'PHL', 'Philippines', 'PH', '', 1, '0', '0', NULL, NULL),
(176, 'PCN', 'Pitcairn Islands', 'PN', '', 1, '0', '0', NULL, NULL),
(177, 'POL', 'Poland', 'PL', '', 1, '0', '0', NULL, NULL),
(178, 'PRT', 'Portugal', 'PT', '', 1, '0', '0', NULL, NULL),
(179, 'PRI', 'Puerto Rico', 'PR', '', 1, '0', '0', NULL, NULL),
(180, 'QAT', 'Qatar', 'QA', '', 1, '0', '0', NULL, NULL),
(181, 'COG', 'Republic of the Congo', 'CG', '', 1, '0', '0', NULL, NULL),
(182, 'REU', 'Réunion', 'RE', '', 1, '0', '0', NULL, NULL),
(183, 'ROU', 'Romania', 'RO', '', 1, '0', '0', NULL, NULL),
(184, 'RUS', 'Russia', 'RU', '', 1, '0', '0', NULL, NULL),
(185, 'RWA', 'Rwanda', 'RW', '', 1, '0', '0', NULL, NULL),
(186, 'BLM', 'Saint Barthélemy', 'BL', '', 1, '0', '0', NULL, NULL),
(187, 'SHN', 'Saint Helena', 'SH', '', 1, '0', '0', NULL, NULL),
(188, 'KNA', 'Saint Kitts and Nevis', 'KN', '', 1, '0', '0', NULL, NULL),
(189, 'LCA', 'Saint Lucia', 'LC', '', 1, '0', '0', NULL, NULL),
(190, 'MAF', 'Saint Martin', 'MF', '', 1, '0', '0', NULL, NULL),
(191, 'SPM', 'Saint Pierre and Miquelon', 'PM', '', 1, '0', '0', NULL, NULL),
(192, 'VCT', 'Saint Vincent and the Grenadines', 'VC', '', 1, '0', '0', NULL, NULL),
(193, 'WSM', 'Samoa', 'WS', '', 1, '0', '0', NULL, NULL),
(194, 'SMR', 'San Marino', 'SM', '', 1, '0', '0', NULL, NULL),
(195, 'STP', 'São Tomé and Príncipe', 'ST', '', 1, '0', '0', NULL, NULL),
(196, 'SAU', 'Saudi Arabia', 'SA', '', 1, '0', '0', NULL, NULL),
(197, 'SEN', 'Senegal', 'SN', '', 1, '0', '0', NULL, NULL),
(198, 'SRB', 'Serbia', 'RS', '', 1, '0', '0', NULL, NULL),
(199, 'SYC', 'Seychelles', 'SC', '', 1, '0', '0', NULL, NULL),
(200, 'SLE', 'Sierra Leone', 'SL', '', 1, '0', '0', NULL, NULL),
(201, 'SGP', 'Singapore', 'SG', '', 1, '0', '0', NULL, NULL),
(202, 'SXM', 'Sint Maarten', 'SX', '', 1, '0', '0', NULL, NULL),
(203, 'SVK', 'Slovakia', 'SK', '', 1, '0', '0', NULL, NULL),
(204, 'SVN', 'Slovenia', 'SI', '', 1, '0', '0', NULL, NULL),
(205, 'SLB', 'Solomon Islands', 'SB', '', 1, '0', '0', NULL, NULL),
(206, 'SOM', 'Somalia', 'SO', '', 1, '0', '0', NULL, NULL),
(207, 'ZAF', 'South Africa', 'ZA', '', 1, '0', '0', NULL, NULL),
(208, 'SGS', 'South Georgia and the South Sandwich Islands', 'GS', '', 1, '0', '0', NULL, NULL),
(209, 'KOR', 'South Korea', 'KR', '', 1, '0', '0', NULL, NULL),
(210, 'SSD', 'South Sudan', 'SS', '', 1, '0', '0', NULL, NULL),
(211, 'ESP', 'Spain', 'ES', '', 1, '0', '0', NULL, NULL),
(212, 'LKA', 'Sri Lanka', 'LK', '', 1, '0', '0', NULL, NULL),
(213, 'SDN', 'Sudan', 'SD', '', 1, '0', '0', NULL, NULL),
(214, 'SUR', 'Suriname', 'SR', '', 1, '0', '0', NULL, NULL),
(215, 'SJM', 'Svalbard and Jan Mayen', 'SJ', '', 1, '0', '0', NULL, NULL),
(216, 'SWZ', 'Swaziland', 'SZ', '', 1, '0', '0', NULL, NULL),
(217, 'SWE', 'Sweden', 'SE', '', 1, '0', '0', NULL, NULL),
(218, 'CHE', 'Switzerland', 'CH', '', 1, '0', '0', NULL, NULL),
(219, 'SYR', 'Syria', 'SY', '', 1, '0', '0', NULL, NULL),
(220, 'TWN', 'Taiwan', 'TW', '', 1, '0', '0', NULL, NULL),
(221, 'TJK', 'Tajikistan', 'TJ', '', 1, '0', '0', NULL, NULL),
(222, 'TZA', 'Tanzania', 'TZ', '', 1, '0', '0', NULL, NULL),
(223, 'THA', 'Thailand', 'TH', '', 1, '0', '0', NULL, NULL),
(224, 'TGO', 'Togo', 'TG', '', 1, '0', '0', NULL, NULL),
(225, 'TKL', 'Tokelau', 'TK', '', 1, '0', '0', NULL, NULL),
(226, 'TON', 'Tonga', 'TO', '', 1, '0', '0', NULL, NULL),
(227, 'TTO', 'Trinidad and Tobago', 'TT', '', 1, '0', '0', NULL, NULL),
(228, 'TUN', 'Tunisia', 'TN', '', 1, '0', '0', NULL, NULL),
(229, 'TUR', 'Turkey', 'TR', '', 1, '0', '0', NULL, NULL),
(230, 'TKM', 'Turkmenistan', 'TM', '', 1, '0', '0', NULL, NULL),
(231, 'TCA', 'Turks and Caicos Islands', 'TC', '', 1, '0', '0', NULL, NULL),
(232, 'TUV', 'Tuvalu', 'TV', '', 1, '0', '0', NULL, NULL),
(233, 'UMI', 'U.S. Minor Outlying Islands', 'UM', '', 1, '0', '0', NULL, NULL),
(234, 'VIR', 'U.S. Virgin Islands', 'VI', '', 1, '0', '0', NULL, NULL),
(235, 'UGA', 'Uganda', 'UG', '', 1, '0', '0', NULL, NULL),
(236, 'UKR', 'Ukraine', 'UA', '', 1, '0', '0', NULL, NULL),
(237, 'ARE', 'United Arab Emirates', 'AE', '', 1, '0', '0', NULL, NULL),
(238, 'GBR', 'United Kingdom', 'GB', '', 1, '0', '0', NULL, NULL),
(239, 'USA', 'United States', 'US', '$', 1, '0', '0', NULL, NULL),
(240, 'URY', 'Uruguay', 'UY', '', 1, '0', '0', NULL, NULL),
(241, 'UZB', 'Uzbekistan', 'UZ', '', 1, '0', '0', NULL, NULL),
(242, 'VUT', 'Vanuatu', 'VU', '', 1, '0', '0', NULL, NULL),
(243, 'VAT', 'Vatican City', 'VA', '', 1, '0', '0', NULL, NULL),
(244, 'VEN', 'Venezuela', 'VE', '', 1, '0', '0', NULL, NULL),
(245, 'VNM', 'Vietnam', 'VN', '', 1, '0', '0', NULL, NULL),
(246, 'WLF', 'Wallis and Futuna', 'WF', '', 1, '0', '0', NULL, NULL),
(247, 'ESH', 'Western Sahara', 'EH', '', 1, '0', '0', NULL, NULL),
(248, 'YEM', 'Yemen', 'YE', '', 1, '0', '0', NULL, NULL),
(249, 'ZMB', 'Zambia', 'ZM', '', 1, '0', '0', NULL, NULL),
(250, 'ZWE', 'Zimbabwe', 'ZW', '', 1, '0', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hb_facilities`
--

CREATE TABLE `hb_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_facilities`
--

INSERT INTO `hb_facilities` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Room Service', 'room-service', 'Room Service', 'room-service.png', 'Room Service', 'Room Service', 'Room Service', 1, 1, '0', '1', '2022-11-20 21:18:46', '2022-12-26 05:37:55'),
(2, 'Breakfast', 'breakfast', 'Breakfast', 'breakfast.png', 'Breakfast', 'Breakfast', 'Breakfast', 1, 1, '0', '1', '2022-11-20 21:19:07', '2022-12-26 05:38:11'),
(3, 'Double Bed', 'double-bed', 'Double Bed', 'double-bed.png', 'Double Bed', 'Double Bed', 'Double Bed', 1, 1, '0', '1', '2022-11-20 21:19:31', '2022-12-26 05:38:25'),
(4, 'Single Bed', 'single-bed', 'Single Bed', 'single-bed.png', 'Single Bed', 'Single Bed', 'Single Bed', 1, 1, '0', '1', '2022-11-20 21:25:54', '2022-12-26 05:38:42'),
(5, 'TV', 'tv', 'TV', 'tv.png', 'TV', 'TV', 'TV', 1, 1, '0', '1', '2022-11-20 21:26:22', '2022-12-26 05:38:58'),
(6, 'Fridge', 'fridge', 'Fridge', 'fridge.png', 'Fridge', 'Fridge', 'Fridge', 1, 1, '0', '1', '2022-11-20 21:26:45', '2022-12-26 05:39:14'),
(7, 'Geyser', 'geyser', 'Geyser', 'geyser.png', 'Geyser', 'Geyser', 'Geyser', 1, 1, '0', '1', '2022-11-20 21:27:15', '2022-12-26 05:39:32'),
(8, 'WiFi', 'wifi', 'WiFi', 'wifi.png', 'WiFi', 'WiFi', 'WiFi', 1, 1, '0', '1', '2022-11-20 21:27:58', '2022-12-26 05:39:48'),
(9, 'Intercom', 'intercom', 'Intercom', 'intercom.png', 'Intercom', 'Intercom', 'Intercom', 1, 1, '0', '1', '2022-11-20 21:28:24', '2022-12-26 05:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `hb_faqs`
--

CREATE TABLE `hb_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_faqs`
--

INSERT INTO `hb_faqs` (`id`, `question`, `answer`, `faq_type`, `slug`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'How do I request an early check-in or late check-out with the hotel?', 'Since hotel policies regarding early check-in (generally before 2:00 pm) or late checkout (generally after 12:00 pm) vary by location and by hotel, please call the hotel directly prior to your arrival to make any necessary arrangements. Direct hotel phone numbers can be found on your confirmation email or on the hotel information page.', 'General Information', 'how-do-i-request-an-early-check-in-or-late-check-out-with-the-hotel', 'How do I request an early check-in or late check-out with the hotel?', 'How do I request an early check-in or late check-out with the hotel?', 'How do I request an early check-in or late check-out with the hotel?', 1, 1, '1', '1', '2023-01-08 23:19:03', '2023-01-09 00:11:37'),
(2, 'What is your policy regarding cancellations?', 'If your travel plans change, you can cancel or modify your reservation in accordance with the hotel\'s cancellation policy as stated during the reservation process.', 'General Information', 'what-is-your-policy-regarding-cancellations', 'What is your policy regarding cancellations?', 'What is your policy regarding cancellations?', 'What is your policy regarding cancellations?', 1, 1, '1', '1', '2023-01-08 23:27:16', '2023-01-09 00:11:55'),
(3, 'Will I be charged for extra guests occupying my room?', 'Hotel room rates vary by date and by the number of adults occupying a single room. To accommodate more guests, you need to change your reservation. You will be notified of any additional charges prior to confirming your updated reservation.', 'General Information', 'will-i-be-charged-for-extra-guests-occupying-my-room', 'Will I be charged for extra guests occupying my room?', 'Will I be charged for extra guests occupying my room?', 'Will I be charged for extra guests occupying my room?', 1, 1, '1', '1', '2023-01-08 23:28:09', '2023-01-09 00:12:06'),
(4, 'I\'m having trouble making an online reservation. Is there a toll-free number I can call for help?', 'In case any issues arise during the reservation process, please call the regional help desk.', 'Reservations', 'im-having-trouble-making-an-online-reservation-is-there-a-toll-free-number-i-can-call-for-help', 'I\'m having trouble making an online reservation. Is there a toll-free number I can call for help?', 'I\'m having trouble making an online reservation. Is there a toll-free number I can call for help?', 'I\'m having trouble making an online reservation. Is there a toll-free number I can call for help?', 1, 1, '1', '1', '2023-01-08 23:32:42', '2023-01-09 00:12:17'),
(5, 'Can I reserve more than one room at a time when I book online?', 'Yes, you can book up to nine rooms at a time. Please see the list of toll-free numbers to contact in your country if you wish to order ten or more rooms.', 'Reservations', 'can-i-reserve-more-than-one-room-at-a-time-when-i-book-online', 'Can I reserve more than one room at a time when I book online?', 'Can I reserve more than one room at a time when I book online?', 'Can I reserve more than one room at a time when I book online?', 1, 1, '1', '1', '2023-01-08 23:33:38', '2023-01-09 00:12:29'),
(6, 'Am I required to enter my credit card number online to book a reservation? Is your reservation process secure?', 'Yes. A credit card number is required to book a reservation online for those hotels that accept credit cards. For your security, any personal information such as your credit card number or phone number will be encrypted before being transmitted over the internet.', 'Reservations', 'am-i-required-to-enter-my-credit-card-number-online-to-book-a-reservation-is-your-reservation-process-secure', 'Am I required to enter my credit card number online to book a reservation? Is your reservation process secure?', 'Am I required to enter my credit card number online to book a reservation? Is your reservation process secure?', 'Am I required to enter my credit card number online to book a reservation? Is your reservation process secure?', 1, 1, '1', '1', '2023-01-08 23:34:11', '2023-01-09 00:12:44'),
(7, 'How do I submit a claim if I see a lower rate on another website?', 'Within 24 hours of making your reservation on Radissonhotels.com, visit the Contact us section of Radissonhotels.com and select “Online” contact method and “BORG claim” for topic.', 'Best Rate Guarantee', 'how-do-i-submit-a-claim-if-i-see-a-lower-rate-on-another-website', 'How do I submit a claim if I see a lower rate on another website?', 'How do I submit a claim if I see a lower rate on another website?', 'How do I submit a claim if I see a lower rate on another website?', 1, 1, '1', '1', '2023-01-08 23:35:28', '2023-01-09 00:12:56'),
(8, 'What do I need to submit a claim?', 'You will need the information related to your thezabeerdhaka.com reservation as well as the specific information related to the lower rate you found (rate, website address, date found).', 'Best Rate Guarantee', 'what-do-i-need-to-submit-a-claim', 'What do I need to submit a claim?', 'What do I need to submit a claim?', 'What do I need to submit a claim?', 1, 1, '1', '1', '2023-01-08 23:36:37', '2023-01-09 00:13:07'),
(9, 'Is there a time window that I need to submit a claim for the Best Rates Guarantee?', 'Yes. You must submit a claim within 24 hours of the original booking, and at least 48 hours prior to midnight local time of your arrival date at the hotel.', 'Best Rate Guarantee', 'is-there-a-time-window-that-i-need-to-submit-a-claim-for-the-best-rates-guarantee', 'Is there a time window that I need to submit a claim for the Best Rates Guarantee?', 'Is there a time window that I need to submit a claim for the Best Rates Guarantee?', 'Is there a time window that I need to submit a claim for the Best Rates Guarantee?', 1, 1, '1', '1', '2023-01-08 23:37:24', '2023-01-09 00:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `hb_halls`
--

CREATE TABLE `hb_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_halls`
--

INSERT INTO `hb_halls` (`id`, `name`, `slug`, `short_description`, `long_description`, `logo_image`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Board Room', 'board-room', 'The Hotel Has 3 Dedicated Conference And Event Venues Has The Capacity For Board Room 30 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.', '<p style=\"text-align: left;\">The Hotel Has 3 Dedicated Conference And Event Venues Has The Capacity For Board Room 30 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.<br></p>', NULL, 'Board Room', 'Board Room', 'Board Room', 0, 1, '0', '0', '2022-12-13 20:54:56', '2023-01-15 00:23:13'),
(2, 'Olive Hall', 'olive-hall', 'The Hotel Has 3 Dedicated Conference And Event Venues Has The Capacity For 80 Delegates. Each Equipped With The Very Latest Audio-VisuThe Hotel Has 3 Dedicated Conference And Event Venues Has The Olive Hall Capacity For 200 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.', '<p>The Hotel Has 3 Dedicated Conference And Event Venues Has The Capacity For 80 Delegates. Each Equipped With The Very Latest Audio-VisuThe Hotel Has 3 Dedicated Conference And Event Venues Has The Olive Hall Capacity For 200 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.<br></p>', NULL, 'Olive Hall', 'Olive Hall', 'Olive Hall', 0, 1, '0', '1', '2022-12-13 22:58:33', '2022-12-29 10:07:39'),
(3, 'Tulip Hall', 'tulip-hall', 'The Hotel Has 3 The Hotel Has 3 Dedicated Conference And Event Venues Has The Tulip Hall Capacity For 80 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.', '<p>The Hotel Has 3 The Hotel Has 3 Dedicated Conference And Event Venues Has The Tulip Hall Capacity For 80 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.<br></p>', NULL, 'Tulip Hall', 'Tulip Hall', 'Tulip Hall', 0, 1, '0', '1', '2022-12-13 22:59:14', '2022-12-29 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `hb_hall_images`
--

CREATE TABLE `hb_hall_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hb_offers`
--

CREATE TABLE `hb_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_offers`
--

INSERT INTO `hb_offers` (`id`, `name`, `slug`, `offer_category`, `short_description`, `long_description`, `start_date`, `end_date`, `thumb`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'New Year Celebration 2023', 'new-year-celebration-2023', 'Others', 'New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.', '<h4><span style=\"font-weight: bolder;\">New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.</span></h4><h4><span style=\"font-weight: bolder;\"><br></span></h4><p>New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.&nbsp;<span style=\"font-size: 0.875rem;\">New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">New Year Celebration 2023. New Year Celebration 2023. New Year Celebration 2023.</span></p>', '2022-12-31 00:00:02', '2023-01-10 00:00:02', 'new-year-celebration-2023.jpg', 'New Year Celebration 2023', 'New Year Celebration 2023', 'New Year Celebration 2023', 1, 1, '1', '0', '2022-12-26 04:54:14', '2023-01-16 01:46:47'),
(2, 'Valentine\'s Day Celebration 2023', 'valentines-day-celebration-2023', 'Others', 'Valentine\'s Day Celebration 2023. Valentine\'s Day Celebration 2023. Valentine\'s Day Celebration 2023.', '<h4>Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.</h4><p>Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;<span style=\"font-size: 0.875rem;\">Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;</span><span style=\"font-size: 0.875rem;\">Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;Valentine\'s Day Celebration 2023.&nbsp;</span></p>', '2023-02-13 11:59:17', '2023-02-14 23:59:17', 'valentines-day-celebration-2023.png', 'Valentine\'s Day Celebration 2023', 'Valentine\'s Day Celebration 2023', 'Valentine\'s Day Celebration 2023', 1, 1, '1', '0', '2022-12-26 05:02:19', '2023-01-16 01:47:02'),
(3, 'Grand Opening', 'grand-opening', 'Others', 'Grand Opening', '<p>Grand Opening<br></p>', '2023-01-02 00:00:30', '2023-01-02 23:59:30', 'grand-opening.jpg', 'Grand Opening', 'Grand Opening', 'Grand Opening', 1, 1, '1', '0', '2023-01-01 01:56:32', '2023-01-16 01:47:17'),
(4, 'Buffet Dinner', 'buffet-dinner', 'Restaurant', 'Buffet Dinner', '<p>Buffet Dinner<br></p>', '2023-01-09 09:00:42', '2023-01-31 09:00:42', 'buffet-dinner.jpeg', 'Buffet Dinner', 'Buffet Dinner', 'Buffet Dinner', 1, 1, '1', '0', '2023-01-09 03:01:49', '2023-01-16 01:44:20'),
(5, 'Coffee Time', 'coffee-time', 'Restaurant', 'Coffee Time', '<p>Coffee Time<br></p>', '2023-01-09 09:05:52', '2023-01-31 09:05:52', 'coffee-time.jpeg', 'Coffee Time', 'Coffee Time', 'Coffee Time', 1, 1, '1', '0', '2023-01-09 03:06:23', '2023-01-16 01:47:30'),
(6, 'Deluxe 50% Discount', 'deluxe-50-discount', 'Room', 'Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount.', '<p>Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount.&nbsp;Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount.&nbsp;Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount.&nbsp;Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount. Deluxe 50% Discount.&nbsp;<br></p>', '2023-01-16 09:37:10', '2023-02-14 09:37:10', 'deluxe-50-discount.png', 'Deluxe 50% Discount', 'Deluxe 50% Discount', 'Deluxe 50% Discount', 0, 1, '0', '0', '2023-01-16 03:39:12', '2023-01-17 03:10:38'),
(7, 'Premium Delux Twin 50% Discount', 'premium-delux-twin-50-discount', 'Room', 'Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount.', '<p>Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount.&nbsp;Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount.&nbsp;Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount.&nbsp;Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount. Premium Delux Twin 50% Discount.&nbsp;<br></p>', '2023-01-16 09:39:25', '2023-01-31 09:39:25', 'premium-delux-twin-50-discount.png', 'Premium Delux Twin 50% Discount', 'Premium Delux Twin 50% Discount', 'Premium Delux Twin 50% Discount', 0, 1, '0', '0', '2023-01-16 03:40:23', '2023-01-17 03:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `hb_offer_categories`
--

CREATE TABLE `hb_offer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_offer_categories`
--

INSERT INTO `hb_offer_categories` (`id`, `name`, `slug`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Room', 'room', 'Room', 'Room', 'Room', 1, 1, '0', '0', '2023-01-16 01:27:01', '2023-01-16 01:27:37'),
(2, 'Restaurant', 'restaurant', 'Restaurant', 'Restaurant', 'Restaurant', 1, 1, '0', '0', '2023-01-16 01:40:25', '2023-01-16 01:40:49'),
(3, 'Hall', 'hall', 'Hall', 'Hall', 'Hall', 1, 1, '0', '0', '2023-01-16 01:41:19', '2023-01-16 01:42:31'),
(4, 'Wellness', 'wellness', 'Wellness', 'Wellness', 'Wellness', 1, 1, '0', NULL, '2023-01-16 01:42:58', '2023-01-16 01:42:58'),
(5, 'Others', 'others', 'Others', 'Others', 'Others', 1, 1, '0', NULL, '2023-01-16 01:43:15', '2023-01-16 01:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `hb_restaurents`
--

CREATE TABLE `hb_restaurents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_restaurents`
--

INSERT INTO `hb_restaurents` (`id`, `name`, `slug`, `short_description`, `long_description`, `logo_image`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Cafe 24', 'cafe-24', 'Located on the ground level, it is a modern delight. Enjoy lively chit chat in a Comfortable gathering place.', '<p>Located on the ground level, it is a modern delight .Enjoy lively chit chat in a Comfortable gathering place .A wide selection of premium coffees, teas and freshly squeezed juices is served throughout the day and our varieties of smoothie is a healthy way to Satisfy your sweet tooth.</p><h3 style=\"text-align: center; \"><b>Opening hours: 24 hrs open</b></h3>', 'cafe-24.png', 'Cafe 24', 'Cafe 24', 'Cafe 24', 1, 1, '0', '1', '2022-12-13 19:03:04', '2022-12-29 09:48:34'),
(2, 'Taste Of Heaven', 'taste-of-heaven', 'Taste of Heaven is a contemporary all day dining restaurant where modern design innovative cuisine. Round the clock dining destination showcases an array of international delights.', '<p>Taste of Heaven is a contemporary all day dining restaurant where modern design innovative cuisine. Round the clock dining destination showcases an array of international delights.</p><h3 style=\"text-align: center; \"><b>Opening hours: 06.30 hrs to 22.30 hrs</b></h3>', 'taste-of-heaven.png', 'Taste Of Heaven', 'Taste Of Heaven', 'Taste Of Heaven', 1, 1, '0', '1', '2022-12-13 19:04:00', '2022-12-29 09:49:10'),
(3, 'Sky Line', 'sky-line', 'A Casual dining 60 seater barbeque and gril specialty dining at the pool side overlooking amazing natural green view of Dhaka.', '<p>A Casual dining 60 seater barbeque and gril specialty dining at the pool side overlooking amazing natural green view of Dhaka.</p><h3 style=\"text-align: center; \"><b>OPENING HOURS: 17.00 hrs to 23.00 hrs</b></h3>', 'sky-line.png', 'Sky Line', 'Sky Line', 'Sky Line', 1, 1, '0', '1', '2022-12-13 19:05:01', '2022-12-29 09:49:43'),
(4, 'Noxx Bar', 'noxx-bar', 'Noxx Bar', '<p>Noxx Bar<br></p>', 'noxx-bar.png', 'Noxx Bar', 'Noxx Bar', 'Noxx Bar', 1, 1, '0', '1', '2022-12-13 19:05:28', '2022-12-29 09:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `hb_restaurent_images`
--

CREATE TABLE `hb_restaurent_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurent_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hb_rooms`
--

CREATE TABLE `hb_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_adults` int(11) DEFAULT NULL,
  `max_childs` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(8,2) NOT NULL DEFAULT 0.00,
  `discount_rate` int(11) NOT NULL DEFAULT 0,
  `discount_price` float(8,2) NOT NULL DEFAULT 0.00,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_discount` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_rooms`
--

INSERT INTO `hb_rooms` (`id`, `name`, `slug`, `short_description`, `long_description`, `max_adults`, `max_childs`, `quantity`, `price`, `discount_rate`, `discount_price`, `meta_title`, `meta_keyword`, `meta_decription`, `has_discount`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe', 'deluxe', 'Approximate room size:320 Sqft premium Rooms are larger than Deluxe Rooms and offer one king size or two twin size beds to suit your needs .Sink into one of two sofa chairs, and enjoy air conditioning plush bathrobes and free high speed wireless internet .', '<p>Experience the ultimate in luxury and comfort in our Delux Rooms. Our spacious and stylish guest rooms feature a range of top-of-the-line amenities to help you relax and unwind during your stay. Each room features a comfortable king-sized bed with plush bedding, a flat-screen TV with cable channels, and a private bathroom with a shower and bathtub. Book now and indulge in the ultimate in comfort and style in our Delux Rooms.<br></p>', 2, 0, 7, 220.00, 0, 0.00, 'Deluxe', 'Deluxe', 'Deluxe', 0, 1, 1, '1', '1', '2022-12-26 05:16:35', '2023-02-01 02:13:44'),
(2, 'Premium Delux', 'premium-delux', 'Approximate room size: 320 Sqft premium Rooms are larger than Premium Deluxe Rooms and offer one king size or two twin size beds to suit your needs .Sink into one of two sofa chairs, and enjoy air conditioning plush bathrobes and free high speed wireless internet .', '<p>Step up to the ultimate in luxury and indulgence in our Premium Deluxe Rooms. Our spacious and elegantly appointed guest rooms offer the ultimate in comfort and style. Each room features a plush king-sized bed with high-quality bedding, a flat-screen TV with premium cable channels, and a private bathroom with a spa-like shower and bathtub. In addition, guests in our Premium Deluxe Rooms have access to exclusive amenities. Book now and experience the ultimate in luxury in our Premium Deluxe Rooms&nbsp;<br></p>', 2, 0, 21, 260.00, 0, 0.00, 'Premium Delux', 'Premium Delux', 'Premium Delux', 0, 1, 1, '0', '1', '2022-12-14 18:45:59', '2023-02-01 02:12:05'),
(3, 'Premium Delux Twin', 'premium-delux-twin', 'Approximate room size:320 Sqft Premium Delux Twin Rooms are larger than Premium Delux Twin Rooms and offer one king size or two twin size beds to suit your needs .Sink into one of two sofa chairs, and enjoy air conditioning plush bathrobes and free high speed wireless internet .', '<p>Experience the ultimate in luxury and comfort in our Premium Delux Twin Rooms. Our spacious and elegantly appointed guest rooms offer a range of top-of-the-line amenities to help you relax and unwind during your stay. Each room features a plush king-sized bed with high-quality bedding, a flat-screen TV with premium cable channels, and a private bathroom with a spa-like shower and bathtub. In addition, guests in our Premium Delux Twin Rooms have access to exclusive amenities and a private balcony or terrace with stunning views of the surrounding area. Book now and indulge in the ultimate in luxury and comfort in our Premium Delux Twin Rooms&nbsp;<br></p>', 2, 0, 7, 280.00, 0, 0.00, 'Premium Delux Twin', 'Premium Delux Twin', 'Premium Delux Twin', 0, 1, 1, '0', '1', '2022-12-14 18:47:55', '2023-02-01 02:14:27'),
(4, 'Zabeer Suite', 'zabeer-suite', 'Approximate room size:320 Sqft Zabeer Suite Rooms are larger than Zabeer Suite Rooms and offer one king size or two twin size beds to suit your needs .Sink into one of two sofa chairs, and enjoy air conditioning plush bathrobes and free high speed wireless internet .', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Nunito Sans&quot;, sans-serif;\">Experience the ultimate in luxury and comfort in our Zabeer Suite Rooms. Our spacious and elegantly appointed guest rooms offer a range of top-of-the-line amenities to help you relax and unwind during your stay. Each room features two comfortable twin-sized beds with high-quality bedding, a flat-screen TV with premium cable channels, and a private bathroom with a spa-like shower and bathtub. In addition, guests in our Zabeer Suite&nbsp;Rooms have access to exclusive amenities and a private balcony or terrace with stunning views of the surrounding area. Book now and indulge in the ultimate in luxury and comfort in our Zabeer Suite&nbsp;Rooms</span><br></p>', 2, 0, 7, 300.00, 10, 252.00, 'Zabeer Suite', 'Zabeer Suite', 'Zabeer Suite', 0, 1, 1, '0', '1', '2022-12-14 18:49:23', '2023-02-01 02:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `hb_roomtype`
--

CREATE TABLE `hb_roomtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_roomtype`
--

INSERT INTO `hb_roomtype` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'City View', 'city-view', 'City View', 'city-view.png', 'City View', 'City View', NULL, 1, 1, '0', '1', '2022-11-20 21:16:45', '2022-12-26 05:40:26'),
(2, 'Balcony', 'balcony', 'Balcony', 'balcony.png', 'Balcony', 'Balcony', NULL, 1, 1, '0', '1', '2022-11-20 21:25:24', '2022-12-26 05:40:44'),
(3, 'Sea View', 'sea-view', 'Sea View', 'sea-view.png', 'Sea View', 'Sea View', NULL, 0, 1, '0', '1', '2022-12-19 17:58:02', '2023-02-01 02:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `hb_roomtype_view`
--

CREATE TABLE `hb_roomtype_view` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `roomtype_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_roomtype_view`
--

INSERT INTO `hb_roomtype_view` (`id`, `room_id`, `roomtype_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 2, NULL, NULL),
(6, 4, 1, NULL, NULL),
(7, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hb_room_facilities`
--

CREATE TABLE `hb_room_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_room_facilities`
--

INSERT INTO `hb_room_facilities` (`id`, `room_id`, `facility_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 9, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 2, 3, NULL, NULL),
(8, 2, 4, NULL, NULL),
(9, 2, 5, NULL, NULL),
(10, 2, 8, NULL, NULL),
(11, 3, 1, NULL, NULL),
(12, 3, 2, NULL, NULL),
(13, 3, 3, NULL, NULL),
(14, 3, 4, NULL, NULL),
(15, 3, 5, NULL, NULL),
(16, 3, 7, NULL, NULL),
(17, 3, 8, NULL, NULL),
(18, 4, 1, NULL, NULL),
(19, 4, 2, NULL, NULL),
(20, 4, 3, NULL, NULL),
(21, 4, 4, NULL, NULL),
(22, 4, 5, NULL, NULL),
(23, 4, 6, NULL, NULL),
(24, 4, 7, NULL, NULL),
(25, 4, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hb_room_images`
--

CREATE TABLE `hb_room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_room_images`
--

INSERT INTO `hb_room_images` (`id`, `room_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/rooms/deluxe-1675238126-1.jpeg', '2023-02-01 01:55:26', '2023-02-01 01:55:26'),
(2, 2, 'uploads/rooms/premium-delux-1675238913-1.jpeg', '2023-02-01 02:08:33', '2023-02-01 02:08:33'),
(3, 3, 'uploads/rooms/premium-delux-twin-1675238977-1.jpeg', '2023-02-01 02:09:37', '2023-02-01 02:09:37'),
(4, 4, 'uploads/rooms/zabeer-suite-1675239035-1.jpeg', '2023-02-01 02:10:35', '2023-02-01 02:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `hb_settings`
--

CREATE TABLE `hb_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_tw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_settings`
--

INSERT INTO `hb_settings` (`id`, `name`, `phone`, `email`, `address`, `logo`, `icon`, `social_fb`, `social_tw`, `social_insta`, `social_yt`, `display_order`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'The Zabeer Dhaka', '(+88) 02224470771-73', 'info@thezabeerdhaka.com', 'House-1, Road-2, Sector-1, Uttara Model Town, Dhaka-1230', 'logo-the-zabeer-dhaka.png', 'icon-the-zabeer-dhaka.png', 'https://www.facebook.com/thezabeerdhaka', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/@thezabeerdhaka', '1', 'The Zabeer Dhaka', 'The Zabeer Dhaka', 'The Zabeer Dhaka', 1, 1, '1', '1', '2022-12-26 00:35:03', '2023-02-01 06:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `hb_webcontactinfos`
--

CREATE TABLE `hb_webcontactinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_reservation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_reservation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_webcontactinfos`
--

INSERT INTO `hb_webcontactinfos` (`id`, `hotel_name`, `phone`, `email`, `address`, `google_map`, `phone_sales`, `phone_reservation`, `email_sales`, `email_reservation`, `display_order`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'The Zabber Dhaka', '(+88) 02224470771-73', 'info@thezabeerdhaka.com', 'House-1, Road-2, Sector-1, Uttara Model Town, Dhaka-1230', '!1m18!1m12!1m3!1d3648.956907774987!2d90.4037768!3d23.855663900000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c72f9daef9c5%3A0xe3bc6c9dcb0ba750!2sThe%20Zabeer%20Dhaka!5e0!3m2!1sen!2sbd!4v1670046986535!5m2!1sen!2sbd', NULL, '(+88) 01711 408 969', NULL, 'reservation@thezabeerdhaka.com', '1', 'The Zabber Dhaka', 'The Zabber Dhaka', 'The Zabber Dhaka', 1, 1, '1', '1', '2022-12-26 02:27:19', '2022-12-26 02:32:03'),
(2, 'The Zabber Jashore', '(+88) 01885 000 555', 'sm@zabeerhotel.com', '1256, M M Ali Road, Jashore', '!1m14!1m8!1m3!1d14672.513200846855!2d89.2109886!3d23.165517!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x67b464b45fab99ac!2sThe%20Zabeer%20Jashore!5e0!3m2!1sen!2sbd!4v1670742032127!5m2!1sen!2sbd', NULL, NULL, NULL, NULL, '2', 'The Zabber Jashore', 'The Zabber Jashore', 'The Zabber Jashore', 1, 1, '1', NULL, '2022-12-26 03:51:35', '2022-12-26 03:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `hb_webfacilities`
--

CREATE TABLE `hb_webfacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_webfacilities`
--

INSERT INTO `hb_webfacilities` (`id`, `name`, `slug`, `description`, `image`, `display_order`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', 'breakfast', 'Complementary Breakfast', 'breakfast.png', '1', 'Complementary Breakfast', 'Complementary Breakfast', 'Complementary Breakfast', 1, 1, '0', '1', '2022-12-12 19:41:42', '2022-12-26 01:30:03'),
(2, 'Bottle of Water', 'bottle-of-water', 'Complimentary Bottle of Water', 'bottle-of-water.png', '2', 'Complimentary Bottle of Water', 'Complimentary Bottle of Water', 'Complimentary Bottle of Water', 1, 1, '0', '1', NULL, '2022-12-26 01:30:29'),
(3, 'Free Wi-fi', 'free-wi-fi', 'Free Wi-fi Access', 'free-wi-fi.png', '3', 'Free Wi-fi Access', 'Free Wi-fi Access', 'Free Wi-fi Access', 1, 1, '0', '1', NULL, '2022-12-26 01:30:57'),
(4, 'Laundry Service', 'laundry-service', 'Express Laundry Service', 'laundry-service.png', '4', 'Express Laundry Service', 'Express Laundry Service', 'Express Laundry Service', 1, 1, '0', '1', NULL, '2022-12-26 01:32:10'),
(5, 'Access of Gym', 'access-of-gym', 'Complimentary Access of Gym', 'access-of-gym.png', '5', 'Complimentary Access of Gym', 'Complimentary Access of Gym', 'Complimentary Access of Gym', 1, 1, '0', '1', NULL, '2022-12-26 01:32:35'),
(6, 'Free Parking', 'free-parking', 'Free Parking', 'free-parking.png', '6', 'Free Parking', 'Free Parking', 'Free Parking', 1, 1, '0', '1', NULL, '2022-12-26 01:33:03'),
(7, 'Airport Pick-up & Drop', 'airport-pick-up-drop', 'Airport Pick-up & Drop', 'airport-pick-up-drop.png', '7', 'Airport Pick-up & Drop', 'Airport Pick-up & Drop', 'Airport Pick-up & Drop', 1, 1, '0', '1', NULL, '2022-12-26 01:34:06'),
(8, 'Daily News Papers', 'daily-news-papers', 'Daily News Papers', 'daily-news-papers.png', '8', 'Daily News Papers', 'Daily News Papers', 'Daily News Papers', 1, 1, '0', '1', NULL, '2022-12-26 01:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `hb_webnavs`
--

CREATE TABLE `hb_webnavs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_webnavs`
--

INSERT INTO `hb_webnavs` (`id`, `name`, `slug`, `display_order`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Home', '', '1', 'Home', 'Home', 'Home', 1, 1, '0', '0', '2022-12-12 17:24:20', '2022-12-16 18:25:51'),
(2, 'Rooms', 'rooms', '2', 'Rooms', 'Rooms', 'Rooms', 1, 1, '0', '0', '2022-12-12 21:43:09', '2022-12-13 23:02:28'),
(3, 'Restaurants', 'restaurants', '3', 'Restaurants', 'Restaurants', 'Restaurants', 1, 1, '0', '0', '2022-12-13 19:07:41', '2022-12-19 18:25:02'),
(4, 'Halls', 'halls', '4', 'Halls', 'Halls', 'Halls', 0, 1, '0', '0', '2022-12-13 23:03:01', '2022-12-13 23:04:11'),
(5, 'Wellness', 'wellnesses', '5', 'Wellness', 'Wellness', 'Wellness', 1, 1, '0', '0', '2022-12-13 23:42:36', '2022-12-19 19:41:32'),
(6, 'About Us', 'about-us', '6', 'About Us', 'About Us', 'About Us', 1, 1, '0', NULL, '2022-12-13 23:42:56', '2022-12-13 23:42:56'),
(7, 'Contact Us', 'contact-us', '7', 'Contact Us', 'Contact Us', 'Contact Us', 1, 1, '0', NULL, '2022-12-13 23:43:18', '2022-12-13 23:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `hb_webpages`
--

CREATE TABLE `hb_webpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_item` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_webpages`
--

INSERT INTO `hb_webpages` (`id`, `name`, `title`, `sub_title`, `short_description`, `long_description`, `slug`, `display_order`, `image`, `meta_title`, `meta_keyword`, `meta_decription`, `footer_item`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'A place that sparks creativity, fuels the imagination and welcomes reflection and relaxation.', 'The Zabeer Dhaka', 'We Offer 5-Star Banquet Spaces, Complete With Catering And Event Management Facilities. Discover The International Favorites Grilled To Perfection In The Live Kitchen. Experiment With Choicest Of Accompaniments And Sauces.The Hotel Has 3 Dedicated Conference And Event Venues Has The Capacity For 200 Delegates.', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 16px; text-align: justify;\">We Offer 5-Star Banquet Spaces, Complete With Catering And Event Management Facilities. Discover The International Favorites Grilled To Perfection In The Live Kitchen. Experiment With Choicest Of Accompaniments And Sauces.The Hotel Has 3 Dedicated Conference And Event Venues Has The Capacity For 200 Delegates. Each Equipped With The Very Latest Audio-Visual And Lighting Technology.The Ambience And Therapies At Our International Spa Offered By Experienced Professionals Ensure That You Are Rejuvenated.State Of The Art Gymnasium And With An Exercise Studio.Haircare And Beauty Treatments By Trained Stylists.The Elegant Att-Day Three Restaurant Provides A Stunning Atmosphere In Which To Sample Europian,Asian,Thai, Chinese Arabic And Our Own Local Cuisine.</span><br></p>', 'about-us', '1', 'about-us.png', 'About Us', 'About Us', 'About Us', 1, 1, 1, '1', '1', '2022-12-26 00:47:16', '2023-02-01 01:52:23'),
(2, 'Contact Us', 'Contact Us', 'Contact Us', 'Contact Us', '<p>Contact Us<br></p>', 'contact-us', '2', NULL, 'Contact Us', 'Contact Us', 'Contact Us', 1, 1, 1, '1', '0', '2022-12-26 00:49:07', '2023-01-15 23:52:02'),
(3, 'Offers', 'Offers', 'Offers', 'Offers', '<p>Offers<br></p>', 'offers', '3', NULL, 'Offers', 'Offers', 'Offers', 1, 1, 1, '0', '0', NULL, '2022-12-16 18:39:55'),
(4, 'FAQ', 'FAQ', 'FAQ', 'FAQ', '<p>FAQ<br></p>', 'faq', '4', NULL, 'FAQ', 'FAQ', 'FAQ', 1, 1, 1, '0', '1', NULL, '2023-01-08 14:40:23'),
(5, 'Rooms', 'Rooms', 'Rooms', 'Rooms', '<p>Rooms<br></p>', 'rooms', '5', NULL, 'Rooms', 'Rooms', 'Rooms', 1, 1, 1, '0', '0', NULL, '2022-12-16 18:41:12'),
(6, 'Restaurants', 'Restaurants', 'Restaurants', 'Restaurants', '<p>Restaurants<br></p>', 'restaurants', '6', NULL, 'Restaurants', 'Restaurants', 'Restaurants', 1, 1, 1, '0', '0', NULL, '2022-12-16 18:41:27'),
(7, 'Halls', 'Halls', 'Halls', 'Meeting & Events', '<p>Meeting &amp; Events<br></p>', 'halls', '7', NULL, 'Halls', 'Halls', 'Halls', 0, 0, 1, '0', '0', NULL, '2023-01-15 00:35:00'),
(8, 'Wellness', 'Wellness', 'Wellness', 'Wellness', '<p>Wellness<br></p>', 'wellness', '8', NULL, 'Wellness', 'Wellness', 'Wellness', 1, 1, 1, '0', '0', NULL, '2022-12-21 01:50:27'),
(9, 'Certificates & Awards', 'Certificates & Awards', 'Certificates & Awards', 'Certificates & Awards', '<p>Certificates &amp; Awards<br></p>', 'certificates-awards', '9', NULL, 'Certificates & Awards', 'Certificates & Awards', 'Certificates & Awards', 1, 1, 1, '0', '0', NULL, '2022-12-16 18:42:54'),
(10, 'Booking Cancelation Policy', 'Booking Cancelation Policy', 'Booking Cancelation Policy', 'Booking Cancelation Policy', '<p>Booking Cancelation Policy<br></p>', 'booking-cancelation-policy', '10', NULL, 'Booking Cancelation Policy', 'Booking Cancelation Policy', 'Booking Cancelation Policy', 1, 1, 1, '0', '0', NULL, '2022-12-16 18:43:20'),
(11, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '<p><br></p>', 'privacy-policy', '11', NULL, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 1, 1, 1, '0', '0', NULL, '2023-01-10 14:13:12'),
(12, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', '<p class=\"Default\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">Check-in / Check-out </span></b><span style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;color:windowtext\">Standard Check-in: 14:00 hours,\r\nCheck-Out: 12:00 hours <o:p></o:p></span></p><p class=\"Default\" style=\"text-align:justify\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">All guests would be required to produce photo identification\r\nat the time of check-in, in accordance with local law and for security\r\npurposes. Passports for foreign travelers are mandated.</span></p><p class=\"Default\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">Early Check-in: </span></b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">For guests that arrive prior to 14:00 hours, the hotel will\r\nmake all endeavors to provide complementary early arrival. However, in order to\r\nhave guaranteed room availability for Check-In prior to 1400 hours, the room\r\nmust be pre-booked from the previous night. In this case, one night’s\r\nadditional room charge will apply.</span></p><p class=\"Default\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">Early Departure: </span></b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">In case of early departure additional one-night charge will\r\nbe posted on your billing.</span><span style=\"color: windowtext; font-family: &quot;Times New Roman&quot;, serif; font-size: 0.875rem;\">&nbsp;</span></p><p class=\"Default\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">Late Check-out: </span></b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">Guests Checking-Out between 1200 hours – 1800 hours, will be\r\ncharged 50% of the room rate (Subject to availability). For guests Checking-Out\r\nafter 1800 hours, a full room charge will be applicable (Subject to\r\navailability).</span><span style=\"color: windowtext; font-family: &quot;Times New Roman&quot;, serif; font-size: 0.875rem;\">&nbsp;</span></p><p class=\"Default\" style=\"margin-bottom:2.9pt\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">No Show: </span></b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">In the eventuality that a guest with a confirmed reservation\r\ndoes not arrive at the date specified, “No-show” charges will be automatically\r\ncharged to the guest’s master account or credit card, towards the retention of\r\none night.</span><span style=\"color: windowtext; font-family: &quot;Times New Roman&quot;, serif; font-size: 0.875rem;\">&nbsp;</span></p><p class=\"Default\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;color:windowtext\">&nbsp;</span></p><p class=\"Default\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;color:windowtext\">These\r\nspecial rates are applicable for all reservations made directly with the hotel\r\nrepresentative, through telephone or email.</span><span style=\"color: windowtext; font-family: &quot;Times New Roman&quot;, serif; font-size: 0.875rem;\">&nbsp;</span></p><p class=\"Default\" style=\"margin-top:0in;margin-right:0in;margin-bottom:2.9pt;\r\nmargin-left:.5in;text-indent:-.25in;line-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;line-height:150%;font-family:\r\nWingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;\r\ncolor:windowtext\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">All rooms are subject to availability at the time of\r\nguaranteeing the same by Credit Card/Company Guarantee/ Cash payment. <o:p></o:p></span></p><p class=\"Default\" style=\"margin-top:0in;margin-right:0in;margin-bottom:2.9pt;\r\nmargin-left:.5in;text-indent:-.25in;line-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;line-height:150%;font-family:\r\nWingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;\r\ncolor:windowtext\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">Payments shall be settled directly by cash or credit card. <o:p></o:p></span></p><p class=\"Default\" style=\"margin-top:0in;margin-right:0in;margin-bottom:2.9pt;\r\nmargin-left:.5in;text-indent:-.25in;line-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;line-height:150%;font-family:\r\nWingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;\r\ncolor:windowtext\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">All the booking requests must be communicated to the hotel\r\nrepresentative in writing <o:p></o:p></span></p><p class=\"Default\" style=\"margin-top:0in;margin-right:0in;margin-bottom:2.9pt;\r\nmargin-left:.5in;line-height:150%\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">(Either by letter, facsimile, or email). <o:p></o:p></span></p><p class=\"Default\" style=\"margin-top:0in;margin-right:0in;margin-bottom:2.9pt;\r\nmargin-left:.5in;text-indent:-.25in;line-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;line-height:150%;font-family:\r\nWingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;\r\ncolor:windowtext\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:windowtext\">The Corporate Client will make an advance reservation with\r\nthe hotel and the hotel will confirm the reservation subject to availability.\r\nThe hotel will send reservation confirmation to the client upon receipt of the reservation\r\nrequest in writing. <o:p></o:p></span></p><p class=\"Default\" style=\"margin-top:0in;margin-right:0in;margin-bottom:2.9pt;\r\nmargin-left:.5in;text-indent:-.25in;line-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;line-height:150%;font-family:\r\nWingdings;mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><span style=\"mso-bidi-font-size:14.0pt;line-height:150%\">During Check-In time, credit\r\ncard pre-authorization will be taken by the Front Office of the respective\r\nguest. All the guests will settle the bill by cash or rearwards during the time\r\nof Check-Out unless we have a credit arrangement with the client. <o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">POLICIES:&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">The guests have to abide\r\nby all the rules of the hotel. the guests cannot do anything which will be\r\nagainst the hotel policy. The guests must have valid documents with them during\r\nthe time of check-in.&nbsp;</span><span style=\"font-size:10.5pt;font-family:\r\n&quot;Arial&quot;,sans-serif;color:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">PAYMENTS:&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">The guests can pay at the\r\nhotel by cash or credit card. The hotel may ask for advance during the time of\r\ncheck-in.</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">VAT &amp;&nbsp;SERVICE\r\nCHARGE:&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">&nbsp;The\r\nguests have to pay vat and service charges according to the hotel policy or\r\nrule.</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">CANCELLATION\r\nPOLICY:&nbsp;&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\">If the guests want to cancel the booking then the guests have to\r\ninform the hotel 72 hours before otherwise 1 night will be charged.</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">CHECK-IN &amp; CHECK-OUT\r\nTIME:&nbsp;&nbsp;&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\">12 noon.</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><strong><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">REQUIRED AT CHECK-IN TIME:</span></strong><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">&nbsp; A copy of the\r\npassport or NID</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">PARKING:&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">Available</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">PETS:&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">Pets are not allowed.</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">CHILDREN:&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">Children are allowed</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; text-indent: -0.25in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if !supportLists]--><span style=\"font-size:14.0pt;mso-bidi-font-size:16.0pt;font-family:Wingdings;\r\nmso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings;color:#333333\">§<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp; </span></span><!--[endif]--><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">EXTRA BEDS:&nbsp;&nbsp;</span></b><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:#333333\">Extra beds are available.</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#333333\"><o:p></o:p></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#333333\">Privacy Policy<o:p></o:p></span></b></p><p style=\"margin: 0in 0in 7.5pt 0.5in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">1.To obtain and confirm your\r\nbooking of accommodations and other services, and to provide such services as\r\nrequested. Since this processing is required to define our contractual\r\nrelationship and to perform under our contract with you, your consent is not\r\nrequired, unless certain “sensitive” information is submitted. Should you\r\nrefuse to submit your personal information, we will not be able to confirm your\r\nbooking or provide you with the requested services. Processing shall cease once\r\nyou check out, although some of your personal information may (or in some\r\ninstances, has to) continue to be processed for the purposes and in the manner\r\ndescribed below;</span><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\"><br>\r\n<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">2.To comply with our “Public Safety Law” which\r\nrequires that we provide identification data of our guests to the police, for\r\npurposes of public safety. Data submission is mandatory and does not require\r\nyour consent. Should you refuse to provide such information, we will not be\r\nable to host you in our hotel.</span></span></p><p style=\"margin: 0in 0in 7.5pt 0.5in; line-height: 18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 10.5pt; line-height: 107%; font-family: Arial, sans-serif;\">\r\n<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">3. To comply with applicable administrative,\r\naccounting, and tax regulations. For these purposes, your consent is not\r\nrequired. Personal information is processed by us and our persons in charge of\r\ndata processing and is disclosed outside the company only when and if required\r\nby law. Should you refuse to submit the required data for the above purposes,\r\nwe will not be able to provide you with the requested services.</span><br>\r\n<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">4. To speed up check-in on your next visit to\r\nour hotel. For such purposes, upon obtaining your consent (which can be revoked\r\nat any moment), your information will be retained for a maximum of 5 years, and\r\nwill be used the next time you are our guest, for the reasons listed supra.</span><br>\r\n<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">5. To allow you to receive messages and\r\ntelephone calls during your stay. Your consent is required for such purposes.\r\nYou can revoke your consent at any time. Such processing, where consent is\r\ngranted, shall end when you check out;</span><br>\r\n<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">6.To send you advertising messages and updates\r\non special rates and promotions. For this purpose, upon obtaining your consent,\r\nyour information shall be retained for a maximum of 5 years, and will not be\r\ndisclosed to third parties. You may revoke your consent at any moment;</span></span><span style=\"font-size: 10.5pt; font-family: Arial, sans-serif;\"><br></span></p>', 'terms-conditions', '12', NULL, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', 1, 1, 1, '0', '1', NULL, '2023-02-01 01:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `hb_websliders`
--

CREATE TABLE `hb_websliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desktop_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_websliders`
--

INSERT INTO `hb_websliders` (`id`, `name`, `slug`, `desktop_image`, `mobile_image`, `content_1`, `content_2`, `content_3`, `content_4`, `content_5`, `display_order`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Slider 1', 'slider-1', 'desk-slider-1.png', 'mobl-slider-1.png', 'Welcome to', 'The Zabeer Dhaka', 'A place that sparks creativity, fuels the imagination andwelcomes reflection and relaxation.', NULL, NULL, '1', 'Slider 1', 'Slider 1', 'Slider 1', 1, 1, '1', '1', '2022-12-26 00:44:04', '2023-02-01 01:48:05'),
(2, 'Slider 2', 'slider-2', 'desk-slider-2.png', 'mobl-slider-2.png', 'Welcome to', 'The Zabeer Dhaka', 'A place that sparks creativity, fuels the imagination andwelcomes reflection and relaxation.', NULL, NULL, '2', 'Slider 2', 'Slider 2', 'Slider 2', 1, 1, '1', NULL, '2023-02-01 01:49:23', '2023-02-01 01:49:23'),
(3, 'Slider 3', 'slider-3', 'desk-slider-3.png', 'mobl-slider-3.png', 'Welcome to', 'The Zabeer Dhaka', 'A place that sparks creativity, fuels the imagination andwelcomes reflection and relaxation.', NULL, NULL, '3', 'Slider 3', 'Slider 3', 'Slider 3', 1, 1, '1', NULL, '2023-02-01 01:50:09', '2023-02-01 01:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `hb_webtestimonials`
--

CREATE TABLE `hb_webtestimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_webtestimonials`
--

INSERT INTO `hb_webtestimonials` (`id`, `name`, `designation`, `company`, `message`, `image`, `slug`, `display_order`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Matiur Rahman', 'Owner', 'Sarothi Enterprise', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', 'mr-matiur-rahman.jpg', '', '1', 'Mr. Matiur Rahman', 'Mr. Matiur Rahman', 'Mr. Matiur Rahman', 1, 1, '1', NULL, '2022-12-26 01:23:24', '2022-12-26 01:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `hb_wellness`
--

CREATE TABLE `hb_wellness` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_decription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hb_wellness`
--

INSERT INTO `hb_wellness` (`id`, `name`, `slug`, `short_description`, `long_description`, `logo_image`, `meta_title`, `meta_keyword`, `meta_decription`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Spa', 'spa', 'Spa', '<p>Spa<br></p>', 'spa.png', 'Spa', 'Spa', 'Spa', 1, 1, '0', '0', '2022-12-13 23:35:12', '2023-01-10 13:44:44'),
(2, 'Gym', 'gym', 'Gym', '<p>Gym<br></p>', 'gym.png', 'Gym', 'Gym', 'Gym', 1, 1, '0', '0', '2022-12-13 23:35:51', '2023-01-10 13:44:59'),
(3, 'Saloon', 'saloon', 'Saloon', '<p>Saloon<br></p>', 'saloon.png', 'Saloon', 'Saloon', 'Saloon', 0, 1, '0', '0', '2022-12-13 23:36:38', '2023-01-15 01:15:31'),
(4, 'Swimming Pool', 'swimming-pool', 'Swimming Pool', '<p>Swimming Pool<br></p>', 'swimming-pool.png', 'Swimming Pool', 'Swimming Pool', 'Swimming Pool', 0, 1, '0', '1', '2022-12-13 23:37:31', '2023-02-01 02:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `hb_wellness_images`
--

CREATE TABLE `hb_wellness_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wellness_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_11_21_063014_create_admins_table', 1),
(6, '2022_11_21_074902_create_hb_facilities_table', 1),
(7, '2022_11_21_074949_create_hb_roomtype_table', 1),
(8, '2022_11_21_075227_create_hb_country_table', 1),
(9, '2022_12_12_104328_create_hb_rooms_table', 2),
(10, '2022_12_12_105015_create_hb_room_facilities_table', 2),
(11, '2022_12_12_105124_create_hb_roomtype_view_table', 2),
(12, '2022_12_12_105230_create_hb_room_images_table', 2),
(13, '2022_12_13_051525_create_hb_webnavs_table', 2),
(14, '2022_12_13_054447_create_hb_websliders_table', 2),
(15, '2022_12_13_065343_create_hb_webtestimonials_table', 2),
(16, '2022_12_13_071449_create_hb_webfacilities_table', 2),
(17, '2022_12_13_075253_create_hb_webpages_table', 2),
(18, '2022_12_14_062937_create_hb_restaurents_table', 2),
(19, '2022_12_14_063009_create_hb_restaurent_images_table', 2),
(20, '2022_12_14_080240_create_hb_halls_table', 2),
(21, '2022_12_14_080410_create_hb_hall_images_table', 2),
(22, '2022_12_14_111120_create_hb_wellness_table', 2),
(23, '2022_12_14_113257_create_hb_wellness_images_table', 2),
(24, '2022_12_15_093650_create_hb_settings_table', 2),
(25, '2022_12_25_162738_create_hb_bookings_table', 3),
(26, '2022_12_26_074144_create_hb_webcontactinfos_table', 4),
(27, '2022_12_26_095654_create_hb_offers_table', 5),
(28, '2023_01_09_044559_create_hb_faqs_table', 6),
(29, '2023_01_16_053227_create_hb_offer_categories_table', 7),
(30, '2023_01_24_065013_create_permission_tables', 8);

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
(1, 'App\\Models\\Admin', 1),
(3, 'App\\Models\\Admin', 15);

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
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard.Index', 'admin', 'Dashboard', 1, 1, '0', '1', '2023-01-24 23:59:14', '2023-01-29 00:58:17'),
(2, 'Role.Index', 'admin', 'Role', 1, 1, '0', '0', '2023-01-25 00:19:48', '2023-01-25 01:05:46'),
(3, 'Role.Create', 'admin', 'Role', 1, 1, '0', '1', '2023-01-25 00:20:03', '2023-01-30 01:12:45'),
(4, 'Role.Edit', 'admin', 'Role', 1, 1, '0', '0', '2023-01-25 00:20:19', '2023-01-25 01:06:12'),
(5, 'Role.Delete', 'admin', 'Role', 1, 1, '0', '0', '2023-01-25 00:20:33', '2023-01-25 01:06:23'),
(6, 'Permission.Index', 'admin', 'Permission', 1, 1, '0', NULL, '2023-01-25 00:20:52', '2023-01-25 00:20:52'),
(7, 'Permission.Create', 'admin', 'Permission', 1, 1, '0', NULL, '2023-01-25 00:21:11', '2023-01-25 00:21:11'),
(8, 'Permission.Edit', 'admin', 'Permission', 1, 1, '0', NULL, '2023-01-25 00:21:27', '2023-01-25 00:21:27'),
(9, 'Permission.Delete', 'admin', 'Permission', 1, 1, '0', NULL, '2023-01-25 00:21:40', '2023-01-25 00:21:40'),
(10, 'RoomType.Index', 'admin', 'Room Type', 1, 1, '0', NULL, '2023-01-25 00:22:05', '2023-01-25 00:22:05'),
(11, 'RoomType.Create', 'admin', 'Room Type', 1, 1, '0', NULL, '2023-01-25 00:22:17', '2023-01-25 00:22:17'),
(12, 'RoomType.Edit', 'admin', 'Room Type', 1, 1, '0', NULL, '2023-01-25 00:22:31', '2023-01-25 00:22:31'),
(13, 'RoomType.Delete', 'admin', 'Room Type', 1, 1, '0', '1', '2023-01-25 00:22:43', '2023-01-29 00:59:03'),
(14, 'Facilities.Index', 'admin', 'Facilities', 1, 1, '1', NULL, '2023-01-29 00:54:47', '2023-01-29 00:54:47'),
(15, 'Facilities.Create', 'admin', 'Facilities', 1, 1, '1', NULL, '2023-01-29 00:55:10', '2023-01-29 00:55:10'),
(16, 'Facilities.Edit', 'admin', 'Facilities', 1, 1, '1', NULL, '2023-01-29 00:55:25', '2023-01-29 00:55:25'),
(17, 'Facilities.Delete', 'admin', 'Facilities', 1, 1, '1', NULL, '2023-01-29 00:55:40', '2023-01-29 00:55:40'),
(18, 'Rooms.Index', 'admin', 'Rooms', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(19, 'Rooms.Create', 'admin', 'Rooms', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(20, 'Rooms.Edit', 'admin', 'Rooms', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(21, 'Rooms.Delete', 'admin', 'Rooms', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(22, 'Restaurants.Index', 'admin', 'Restaurants', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(23, 'Restaurants.Create', 'admin', 'Restaurants', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(24, 'Restaurants.Edit', 'admin', 'Restaurants', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(25, 'Restaurants.Delete', 'admin', 'Restaurants', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(26, 'Halls.Index', 'admin', 'Halls', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(27, 'Halls.Create', 'admin', 'Halls', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(28, 'Halls.Edit', 'admin', 'Halls', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(29, 'Halls.Delete', 'admin', 'Halls', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(30, 'Wellness.Index', 'admin', 'Wellness', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(31, 'Wellness.Create', 'admin', 'Wellness', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(32, 'Wellness.Edit', 'admin', 'Wellness', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(33, 'Wellness.Delete', 'admin', 'Wellness', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(34, 'Offers.Index', 'admin', 'Offers', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(35, 'Offers.Create', 'admin', 'Offers', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(36, 'Offers.Edit', 'admin', 'Offers', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(37, 'Offers.Delete', 'admin', 'Offers', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(38, 'FAQ.Index', 'admin', 'FAQ', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(39, 'FAQ.Create', 'admin', 'FAQ', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(40, 'FAQ.Edit', 'admin', 'FAQ', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(41, 'FAQ.Delete', 'admin', 'FAQ', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(42, 'Bookings.Index', 'admin', 'Bookings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(43, 'Bookings.Create', 'admin', 'Bookings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(44, 'Bookings.Edit', 'admin', 'Bookings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(45, 'Bookings.Delete', 'admin', 'Bookings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(46, 'Guests.Index', 'admin', 'Guests', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(47, 'Guests.Create', 'admin', 'Guests', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(48, 'Guests.Edit', 'admin', 'Guests', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(49, 'Guests.Delete', 'admin', 'Guests', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(50, 'Users.Index', 'admin', 'Users', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(51, 'Users.Create', 'admin', 'Users', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(52, 'Users.Edit', 'admin', 'Users', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(53, 'Users.Delete', 'admin', 'Users', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(54, 'Website.Menu.Index', 'admin', 'Website > Menu', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(55, 'Website.Menu.Create', 'admin', 'Website > Menu', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(56, 'Website.Menu.Edit', 'admin', 'Website > Menu', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(57, 'Website.Menu.Delete', 'admin', 'Website > Menu', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(58, 'Website.Pages.Index', 'admin', 'Website > Pages', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(59, 'Website.Pages.Create', 'admin', 'Website > Pages', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(60, 'Website.Pages.Edit', 'admin', 'Website > Pages', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(61, 'Website.Pages.Delete', 'admin', 'Website > Pages', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(62, 'Website.Sliders.Index', 'admin', 'Website > Sliders', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(63, 'Website.Sliders.Create', 'admin', 'Website > Sliders', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(64, 'Website.Sliders.Edit', 'admin', 'Website > Sliders', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(65, 'Website.Sliders.Delete', 'admin', 'Website > Sliders', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(66, 'Website.Testimonials.Index', 'admin', 'Website > Testimonials', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(67, 'Website.Testimonials.Create', 'admin', 'Website > Testimonials', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(68, 'Website.Testimonials.Edit', 'admin', 'Website > Testimonials', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(69, 'Website.Testimonials.Delete', 'admin', 'Website > Testimonials', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(70, 'Website.Facilities.Index', 'admin', 'Website > Facilities', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(71, 'Website.Facilities.Create', 'admin', 'Website > Facilities', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(72, 'Website.Facilities.Edit', 'admin', 'Website > Facilities', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(73, 'Website.Facilities.Delete', 'admin', 'Website > Facilities', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(74, 'Website.ContactInfos.Index', 'admin', 'Website > Contact Infos', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(75, 'Website.ContactInfos.Create', 'admin', 'Website > Contact Infos', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(76, 'Website.ContactInfos.Edit', 'admin', 'Website > Contact Infos', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(77, 'Website.ContactInfos.Delete', 'admin', 'Website > Contact Infos', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(78, 'Settings.Index', 'admin', 'Settings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(79, 'Settings.Create', 'admin', 'Settings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(80, 'Settings.Edit', 'admin', 'Settings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40'),
(81, 'Settings.Delete', 'admin', 'Settings', 1, 1, '1', '1', '2023-01-28 18:55:40', '2023-01-28 18:55:40');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 1, 1, '1', '1', '2023-01-30 02:29:12', '2023-01-31 00:50:20'),
(2, 'Admin', 'admin', 1, 1, '1', '1', '2023-01-30 02:32:29', '2023-01-30 05:59:11'),
(3, 'Manager', 'admin', 1, 1, '1', '1', '2023-01-30 02:34:43', '2023-01-31 04:22:46'),
(4, 'Front Desk Officer', 'admin', 1, 1, '1', NULL, '2023-01-30 02:35:45', '2023-01-30 02:35:45');

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
(1, 3),
(1, 4),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 2),
(39, 3),
(40, 1),
(40, 2),
(40, 3),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(54, 2),
(54, 3),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(58, 3),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(62, 3),
(63, 1),
(63, 2),
(63, 3),
(64, 1),
(64, 2),
(64, 3),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(66, 3),
(67, 1),
(67, 2),
(67, 3),
(68, 1),
(68, 2),
(68, 3),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(70, 3),
(71, 1),
(71, 2),
(71, 3),
(72, 1),
(72, 2),
(72, 3),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(74, 3),
(75, 1),
(75, 2),
(75, 3),
(76, 1),
(76, 2),
(76, 3),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_comment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Deactive, 1=Active',
  `is_delete` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Delete, 1=Not Delete',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `gender`, `date_of_birth`, `phone`, `address`, `city`, `state`, `postal_code`, `country`, `admin_comment`, `profile_photo`, `cover_photo`, `is_active`, `is_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Raisul', 'Showmin', 'raisul.syp@gmail.com', NULL, '$2y$10$MFNbhH4PhJDnHO2/9jTWrOhw2o7QtgLycJ9C5HltaXRrcVQLJwg16', 'UjMU4oOSzQvRABdcyYimSHFVxyvILjTDO8UkP18BXtHxiiK9495dEgoGxrjc', 'Male', '1995-10-03', '01680078100', 'House-2445/1, Uttarkhan Mazar Para', 'Dhaka', NULL, '1230', 'Bangladesh', NULL, 'Raisul-1672639586.jpg', 'Raisul-1672658442.jpg', 1, 1, NULL, '5', '2022-12-25 21:59:03', '2023-01-16 22:20:30'),
(2, 'Sharif', 'Bhuiyan', 'mahmudpharma01@gmail.com', NULL, '$2y$10$fdchtOvwSTXS6Krqg66/SO7uVQV/HD432ienaLQea1ifUfHGEydXi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-06 06:58:42', '2023-01-06 06:58:42'),
(3, 'Ariful islam', 'Pranto', 'arifulislampranto4@gmail.com', NULL, '$2y$10$twtSgZCu9a9/TWkiYtL5bugQkZB0B/UGWEYM54t7mJPqNBjWNf96.', NULL, 'Male', '1997-04-07', '01521318489', 'Mirpur Dohs', 'Dhaka', NULL, NULL, 'Bangladesh', NULL, 'Ariful islam-1673035275.jpeg', NULL, 1, 1, NULL, '5', '2023-01-06 07:53:21', '2023-01-06 08:01:15'),
(4, 'Sajidur', 'Rahman', 'sajid@startechbd.com', NULL, '$2y$10$7.Tg9Qqak2EPbnZQujEh0uFkAowzRl1y2gqq7jIBxFxjz0/yvtiUq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-06 22:56:47', '2023-01-06 22:56:47'),
(5, 'Sajeeb', 'Debnath', 'sajeebdebnath.cse@gmail.com', NULL, '$2y$10$A6R4v5vpguz3ZccSTZKU9OvQTX4Ksxp8Br3n3MI2WeOKSSOvh.f9K', NULL, 'Male', '1998-05-24', '01610916343', 'adad', 'aad', 'Dhaka', '2323', 'Bangladesh', NULL, 'Sajeeb-1673769521.png', 'Sajeeb-1673769521.jpg', 1, 1, NULL, '5', '2023-01-07 05:19:14', '2023-01-14 19:58:41'),
(6, 'Raisul', 'Islam', 'rishowmin.seu38@gmail.com', NULL, '$2y$10$USCWF9n01ZlozBkf/ejKUebkNXYN8CwEWoZWjcMBRUAinYPBga00e', NULL, 'Male', '2022-11-15', '01680078100', 'Uttara', 'Dhaka', NULL, '1230', 'Bangladesh', NULL, NULL, NULL, 1, 1, NULL, '5', '2023-01-10 18:23:07', '2023-01-10 18:27:46'),
(7, 'Raihan', 'Sadaat', 'raihansadaat@gmail.com', NULL, '$2y$10$nJ9eFEHtWAOsFpkvUUs.GO8c1XN9CH65btghx5wGJBfG1BAbwEWtu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-11 01:32:26', '2023-01-11 01:32:26'),
(8, 'Sajeeb', 'Debnath', 'sajeebdebnath336@gmail.com', NULL, '$2y$10$3rDY4qjSc8pVyB91R3Wa4uaB8f0Jd83t0WM4.VO0lKsrSqrOys6cC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-18 23:41:37', '2023-01-18 23:41:37'),
(9, 'MD RASEL BABU', 'ROCKY', 'raselhrocky@gmail.com', NULL, '$2y$10$9w5J2t3eBzdK/Z0tiPdXtup/2YwvQ38mAqNx2uxbFJQvqime8lyTi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-20 23:43:06', '2023-01-20 23:43:06'),
(10, 'Fidah', 'Hossain', 'fida.tahrim.hossain@gmail.com', NULL, '$2y$10$3zQWaZHrdwyokI.SAtEpyu7QiwZgYrzhaD8DkUgkoqJ9LuAfTRglG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-25 08:54:59', '2023-01-25 08:54:59'),
(11, 'Shiblee', 'Azam', 'shiblee.azam@gmail.com', NULL, '$2y$10$dCPWSNOA4i99YEiBPsXiY.gUbvsoDh2l7Z7.XA2HPJNHUaiqMnlAm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-01-27 17:31:25', '2023-01-27 17:31:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hb_bookings`
--
ALTER TABLE `hb_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_bookings_guest_id_foreign` (`guest_id`),
  ADD KEY `hb_bookings_room_id_foreign` (`room_id`),
  ADD KEY `hb_bookings_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `hb_country`
--
ALTER TABLE `hb_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_facilities`
--
ALTER TABLE `hb_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_faqs`
--
ALTER TABLE `hb_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_halls`
--
ALTER TABLE `hb_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_hall_images`
--
ALTER TABLE `hb_hall_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_hall_images_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `hb_offers`
--
ALTER TABLE `hb_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_offer_categories`
--
ALTER TABLE `hb_offer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_restaurents`
--
ALTER TABLE `hb_restaurents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_restaurent_images`
--
ALTER TABLE `hb_restaurent_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_restaurent_images_restaurent_id_foreign` (`restaurent_id`);

--
-- Indexes for table `hb_rooms`
--
ALTER TABLE `hb_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_roomtype`
--
ALTER TABLE `hb_roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_roomtype_view`
--
ALTER TABLE `hb_roomtype_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_roomtype_view_room_id_foreign` (`room_id`),
  ADD KEY `hb_roomtype_view_roomtype_id_foreign` (`roomtype_id`);

--
-- Indexes for table `hb_room_facilities`
--
ALTER TABLE `hb_room_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_room_facilities_room_id_foreign` (`room_id`),
  ADD KEY `hb_room_facilities_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `hb_room_images`
--
ALTER TABLE `hb_room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_room_images_room_id_foreign` (`room_id`);

--
-- Indexes for table `hb_settings`
--
ALTER TABLE `hb_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_webcontactinfos`
--
ALTER TABLE `hb_webcontactinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_webfacilities`
--
ALTER TABLE `hb_webfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_webnavs`
--
ALTER TABLE `hb_webnavs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_webpages`
--
ALTER TABLE `hb_webpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_websliders`
--
ALTER TABLE `hb_websliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_webtestimonials`
--
ALTER TABLE `hb_webtestimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_wellness`
--
ALTER TABLE `hb_wellness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hb_wellness_images`
--
ALTER TABLE `hb_wellness_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_wellness_images_wellness_id_foreign` (`wellness_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hb_bookings`
--
ALTER TABLE `hb_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hb_country`
--
ALTER TABLE `hb_country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `hb_facilities`
--
ALTER TABLE `hb_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hb_faqs`
--
ALTER TABLE `hb_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hb_halls`
--
ALTER TABLE `hb_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hb_hall_images`
--
ALTER TABLE `hb_hall_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hb_offers`
--
ALTER TABLE `hb_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hb_offer_categories`
--
ALTER TABLE `hb_offer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hb_restaurents`
--
ALTER TABLE `hb_restaurents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hb_restaurent_images`
--
ALTER TABLE `hb_restaurent_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hb_rooms`
--
ALTER TABLE `hb_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hb_roomtype`
--
ALTER TABLE `hb_roomtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hb_roomtype_view`
--
ALTER TABLE `hb_roomtype_view`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hb_room_facilities`
--
ALTER TABLE `hb_room_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hb_room_images`
--
ALTER TABLE `hb_room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hb_settings`
--
ALTER TABLE `hb_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hb_webcontactinfos`
--
ALTER TABLE `hb_webcontactinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hb_webfacilities`
--
ALTER TABLE `hb_webfacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hb_webnavs`
--
ALTER TABLE `hb_webnavs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hb_webpages`
--
ALTER TABLE `hb_webpages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hb_websliders`
--
ALTER TABLE `hb_websliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hb_webtestimonials`
--
ALTER TABLE `hb_webtestimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hb_wellness`
--
ALTER TABLE `hb_wellness`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hb_wellness_images`
--
ALTER TABLE `hb_wellness_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hb_bookings`
--
ALTER TABLE `hb_bookings`
  ADD CONSTRAINT `hb_bookings_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hb_bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `hb_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hb_bookings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hb_hall_images`
--
ALTER TABLE `hb_hall_images`
  ADD CONSTRAINT `hb_hall_images_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `hb_halls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hb_restaurent_images`
--
ALTER TABLE `hb_restaurent_images`
  ADD CONSTRAINT `hb_restaurent_images_restaurent_id_foreign` FOREIGN KEY (`restaurent_id`) REFERENCES `hb_restaurents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hb_roomtype_view`
--
ALTER TABLE `hb_roomtype_view`
  ADD CONSTRAINT `hb_roomtype_view_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `hb_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hb_roomtype_view_roomtype_id_foreign` FOREIGN KEY (`roomtype_id`) REFERENCES `hb_roomtype` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hb_room_facilities`
--
ALTER TABLE `hb_room_facilities`
  ADD CONSTRAINT `hb_room_facilities_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `hb_facilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hb_room_facilities_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `hb_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hb_room_images`
--
ALTER TABLE `hb_room_images`
  ADD CONSTRAINT `hb_room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `hb_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hb_wellness_images`
--
ALTER TABLE `hb_wellness_images`
  ADD CONSTRAINT `hb_wellness_images_wellness_id_foreign` FOREIGN KEY (`wellness_id`) REFERENCES `hb_wellness` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
