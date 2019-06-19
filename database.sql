-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 01, 2019 at 03:01 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revolver`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'mokrani.med@hotmail.com', '$2y$10$8jX1UMgTJ4Ai.KEpgYSUce9N8yeXqSqTl5mMmvbdBQ31k3Q56qhom', NULL, NULL, '2019-04-04 23:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `label`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chien', NULL, '2019-04-17 17:00:10', '2019-04-25 21:52:37', NULL),
(2, 'Chat', NULL, '2019-04-17 17:02:46', '2019-04-25 21:52:41', '2019-04-17 17:02:51'),
(3, 'Oiseau', NULL, '2019-04-17 17:26:45', '2019-04-25 21:53:06', '2019-04-17 17:26:48'),
(4, 'Lapin', NULL, '2019-04-20 16:21:24', '2019-04-25 21:53:13', NULL),
(5, 'Cochon', NULL, '2019-04-23 13:44:37', '2019-04-25 21:54:23', NULL),
(6, 'Hamster', 'http://localhost/Revolvr/public/uploads/cc6YCtGMPGbxFg9UfuuNLlNIMtCaQpmCoKTHrgna.png', '2019-04-23 13:46:15', '2019-04-25 21:54:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `label`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chanel', 'https://i2.wp.com/www.funkyspacemonkey.com/wp-content/uploads/2009/03/chanel1.gif', '2019-04-19 16:27:51', '2019-04-26 22:54:06', NULL),
(2, 'Gucci', 'https://thesunglassshopusa.com/wpsite/wp-content/uploads/2017/11/gucci-san-antonio-sunglasses.jpg', '2019-04-19 16:27:58', '2019-04-26 22:55:56', NULL),
(3, 'Louis Vuitton', 'https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/0010/7612/brand.gif?itok=vCD9J1t8', '2019-04-19 16:27:58', '2019-04-26 22:54:55', NULL),
(4, 'Louboutin', 'https://pbs.twimg.com/profile_images/958107042526441478/9vHoT9Xt_400x400.jpg', '2019-04-19 16:27:58', '2019-04-26 22:55:19', NULL),
(5, 'Burberry', 'https://www.brandingmag.com/wp-content/uploads/2011/08/burberry_logo.jpg', '2019-04-19 16:27:58', '2019-04-26 22:56:18', NULL),
(6, 'Hermes', 'http://www.onecentralmall.com.mo/wordpress/wp-content/uploads/2016/01/hermes-detail-logo.jpg', '2019-04-19 16:27:58', '2019-04-26 22:58:36', NULL),
(7, 'Polo', 'https://www.symbols.com/gi.php?type=1&id=1996', '2019-04-19 16:27:58', '2019-04-26 22:57:05', NULL),
(8, 'Eden Park', 'https://pbs.twimg.com/profile_images/474511055842844672/RBHeJtvB_400x400.jpeg', '2019-04-19 16:27:58', '2019-04-26 22:58:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_influencer`
--

CREATE TABLE `brand_influencer` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_influencer`
--

INSERT INTO `brand_influencer` (`id`, `brand_id`, `influencer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, '2019-04-26 00:49:22', '2019-04-26 00:49:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_project`
--

CREATE TABLE `brand_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_project`
--

INSERT INTO `brand_project` (`id`, `project_id`, `brand_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(33, 19, 1, '2019-04-26 15:33:36', NULL, NULL),
(34, 19, 2, '2019-04-26 15:33:36', NULL, NULL),
(35, 19, 3, '2019-04-26 15:33:36', NULL, NULL),
(36, 19, 4, '2019-04-26 15:33:36', NULL, NULL),
(37, 19, 5, '2019-04-26 15:33:36', NULL, NULL),
(38, 19, 6, '2019-04-26 15:33:36', NULL, NULL),
(39, 19, 7, '2019-04-26 15:33:36', NULL, NULL),
(40, 19, 8, '2019-04-26 15:33:36', NULL, NULL),
(76, 20, 1, '2019-04-28 17:39:23', NULL, NULL),
(77, 20, 2, '2019-04-28 17:39:23', NULL, NULL),
(78, 20, 3, '2019-04-28 17:39:23', NULL, NULL),
(79, 20, 4, '2019-04-28 17:39:23', NULL, NULL),
(80, 20, 5, '2019-04-28 17:39:23', NULL, NULL),
(81, 20, 6, '2019-04-28 17:39:23', NULL, NULL),
(82, 20, 7, '2019-04-28 17:39:23', NULL, NULL),
(83, 20, 8, '2019-04-28 17:39:23', NULL, NULL),
(84, 21, 1, '2019-04-28 19:12:07', NULL, NULL),
(85, 21, 2, '2019-04-28 19:12:07', NULL, NULL),
(86, 21, 3, '2019-04-28 19:12:07', NULL, NULL),
(87, 21, 4, '2019-04-28 19:12:07', NULL, NULL),
(88, 21, 5, '2019-04-28 19:12:07', NULL, NULL),
(89, 21, 6, '2019-04-28 19:12:07', NULL, NULL),
(90, 21, 7, '2019-04-28 19:12:07', NULL, NULL),
(91, 21, 8, '2019-04-28 19:12:07', NULL, NULL),
(92, 22, 1, '2019-04-28 19:21:56', NULL, NULL),
(93, 22, 2, '2019-04-28 19:21:56', NULL, NULL),
(94, 22, 3, '2019-04-28 19:21:56', NULL, NULL),
(95, 22, 4, '2019-04-28 19:21:56', NULL, NULL),
(96, 22, 5, '2019-04-28 19:21:56', NULL, NULL),
(97, 22, 6, '2019-04-28 19:21:56', NULL, NULL),
(98, 22, 7, '2019-04-28 19:21:56', NULL, NULL),
(99, 22, 8, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carnations`
--

CREATE TABLE `carnations` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `color` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carnations`
--

INSERT INTO `carnations` (`id`, `label`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BLANCHE\r\n', '#FFFFFF', NULL, '2019-04-28 22:15:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carnation_influencer`
--

CREATE TABLE `carnation_influencer` (
  `id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `carnation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carnation_influencer`
--

INSERT INTO `carnation_influencer` (`id`, `influencer_id`, `carnation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 1, '2019-04-28 22:15:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT '1',
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `departement_code`, `departement_nom`, `departement_nom_uppercase`, `departement_slug`, `departement_nom_soundex`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '01', 'Ain', 'AIN', 'ain', 'A500', '2019-04-24 00:43:11', NULL, NULL),
(2, 1, '02', 'Aisne', 'AISNE', 'aisne', 'A250', '2019-04-24 00:43:11', NULL, NULL),
(3, 1, '03', 'Allier', 'ALLIER', 'allier', 'A460', '2019-04-24 00:43:11', NULL, NULL),
(5, 1, '05', 'Hautes-Alpes', 'HAUTES-ALPES', 'hautes-alpes', 'H32412', '2019-04-24 00:43:11', NULL, NULL),
(4, 1, '04', 'Alpes-de-Haute-Provence', 'ALPES-DE-HAUTE-PROVENCE', 'alpes-de-haute-provence', 'A412316152', '2019-04-24 00:43:11', NULL, NULL),
(6, 1, '06', 'Alpes-Maritimes', 'ALPES-MARITIMES', 'alpes-maritimes', 'A41256352', '2019-04-24 00:43:11', NULL, NULL),
(7, 1, '07', 'Ardèche', 'ARDÈCHE', 'ardeche', 'A632', '2019-04-24 00:43:11', NULL, NULL),
(8, 1, '08', 'Ardennes', 'ARDENNES', 'ardennes', 'A6352', '2019-04-24 00:43:11', NULL, NULL),
(9, 1, '09', 'Ariège', 'ARIÈGE', 'ariege', 'A620', '2019-04-24 00:43:11', NULL, NULL),
(10, 1, '10', 'Aube', 'AUBE', 'aube', 'A100', '2019-04-24 00:43:11', NULL, NULL),
(11, 1, '11', 'Aude', 'AUDE', 'aude', 'A300', '2019-04-24 00:43:11', NULL, NULL),
(12, 1, '12', 'Aveyron', 'AVEYRON', 'aveyron', 'A165', '2019-04-24 00:43:11', NULL, NULL),
(13, 1, '13', 'Bouches-du-Rhône', 'BOUCHES-DU-RHÔNE', 'bouches-du-rhone', 'B2365', '2019-04-24 00:43:11', NULL, NULL),
(14, 1, '14', 'Calvados', 'CALVADOS', 'calvados', 'C4132', '2019-04-24 00:43:11', NULL, NULL),
(15, 1, '15', 'Cantal', 'CANTAL', 'cantal', 'C534', '2019-04-24 00:43:11', NULL, NULL),
(16, 1, '16', 'Charente', 'CHARENTE', 'charente', 'C653', '2019-04-24 00:43:11', NULL, NULL),
(17, 1, '17', 'Charente-Maritime', 'CHARENTE-MARITIME', 'charente-maritime', 'C6535635', '2019-04-24 00:43:11', NULL, NULL),
(18, 1, '18', 'Cher', 'CHER', 'cher', 'C600', '2019-04-24 00:43:11', NULL, NULL),
(19, 1, '19', 'Corrèze', 'CORRÈZE', 'correze', 'C620', '2019-04-24 00:43:11', NULL, NULL),
(20, 1, '2a', 'Corse-du-sud', 'CORSE-DU-SUD', 'corse-du-sud', 'C62323', '2019-04-24 00:43:11', NULL, NULL),
(21, 1, '2b', 'Haute-corse', 'HAUTE-CORSE', 'haute-corse', 'H3262', '2019-04-24 00:43:11', NULL, NULL),
(22, 1, '21', 'Côte-d\'or', 'CÔTE-D\'OR', 'cote-dor', 'C360', '2019-04-24 00:43:11', NULL, NULL),
(23, 1, '22', 'Côtes-d\'armor', 'CÔTES-D\'ARMOR', 'cotes-darmor', 'C323656', '2019-04-24 00:43:11', NULL, NULL),
(24, 1, '23', 'Creuse', 'CREUSE', 'creuse', 'C620', '2019-04-24 00:43:11', NULL, NULL),
(25, 1, '24', 'Dordogne', 'DORDOGNE', 'dordogne', 'D6325', '2019-04-24 00:43:11', NULL, NULL),
(26, 1, '25', 'Doubs', 'DOUBS', 'doubs', 'D120', '2019-04-24 00:43:11', NULL, NULL),
(27, 1, '26', 'Drôme', 'DRÔME', 'drome', 'D650', '2019-04-24 00:43:11', NULL, NULL),
(28, 1, '27', 'Eure', 'EURE', 'eure', 'E600', '2019-04-24 00:43:11', NULL, NULL),
(29, 1, '28', 'Eure-et-Loir', 'EURE-ET-LOIR', 'eure-et-loir', 'E6346', '2019-04-24 00:43:11', NULL, NULL),
(30, 1, '29', 'Finistère', 'FINISTÈRE', 'finistere', 'F5236', '2019-04-24 00:43:11', NULL, NULL),
(31, 1, '30', 'Gard', 'GARD', 'gard', 'G630', '2019-04-24 00:43:11', NULL, NULL),
(32, 1, '31', 'Haute-Garonne', 'HAUTE-GARONNE', 'haute-garonne', 'H3265', '2019-04-24 00:43:11', NULL, NULL),
(33, 1, '32', 'Gers', 'GERS', 'gers', 'G620', '2019-04-24 00:43:11', NULL, NULL),
(34, 1, '33', 'Gironde', 'GIRONDE', 'gironde', 'G653', '2019-04-24 00:43:11', NULL, NULL),
(35, 1, '34', 'Hérault', 'HÉRAULT', 'herault', 'H643', '2019-04-24 00:43:11', NULL, NULL),
(36, 1, '35', 'Ile-et-Vilaine', 'ILE-ET-VILAINE', 'ile-et-vilaine', 'I43145', '2019-04-24 00:43:11', NULL, NULL),
(37, 1, '36', 'Indre', 'INDRE', 'indre', 'I536', '2019-04-24 00:43:11', NULL, NULL),
(38, 1, '37', 'Indre-et-Loire', 'INDRE-ET-LOIRE', 'indre-et-loire', 'I536346', '2019-04-24 00:43:11', NULL, NULL),
(39, 1, '38', 'Isère', 'ISÈRE', 'isere', 'I260', '2019-04-24 00:43:11', NULL, NULL),
(40, 1, '39', 'Jura', 'JURA', 'jura', 'J600', '2019-04-24 00:43:11', NULL, NULL),
(41, 1, '40', 'Landes', 'LANDES', 'landes', 'L532', '2019-04-24 00:43:11', NULL, NULL),
(42, 1, '41', 'Loir-et-Cher', 'LOIR-ET-CHER', 'loir-et-cher', 'L6326', '2019-04-24 00:43:11', NULL, NULL),
(43, 1, '42', 'Loire', 'LOIRE', 'loire', 'L600', '2019-04-24 00:43:11', NULL, NULL),
(44, 1, '43', 'Haute-Loire', 'HAUTE-LOIRE', 'haute-loire', 'H346', '2019-04-24 00:43:11', NULL, NULL),
(45, 1, '44', 'Loire-Atlantique', 'LOIRE-ATLANTIQUE', 'loire-atlantique', 'L634532', '2019-04-24 00:43:11', NULL, NULL),
(46, 1, '45', 'Loiret', 'LOIRET', 'loiret', 'L630', '2019-04-24 00:43:11', NULL, NULL),
(47, 1, '46', 'Lot', 'LOT', 'lot', 'L300', '2019-04-24 00:43:11', NULL, NULL),
(48, 1, '47', 'Lot-et-Garonne', 'LOT-ET-GARONNE', 'lot-et-garonne', 'L3265', '2019-04-24 00:43:11', NULL, NULL),
(49, 1, '48', 'Lozère', 'LOZÈRE', 'lozere', 'L260', '2019-04-24 00:43:11', NULL, NULL),
(50, 1, '49', 'Maine-et-Loire', 'MAINE-ET-LOIRE', 'maine-et-loire', 'M346', '2019-04-24 00:43:11', NULL, NULL),
(51, 1, '50', 'Manche', 'MANCHE', 'manche', 'M200', '2019-04-24 00:43:11', NULL, NULL),
(52, 1, '51', 'Marne', 'MARNE', 'marne', 'M650', '2019-04-24 00:43:11', NULL, NULL),
(53, 1, '52', 'Haute-Marne', 'HAUTE-MARNE', 'haute-marne', 'H3565', '2019-04-24 00:43:11', NULL, NULL),
(54, 1, '53', 'Mayenne', 'MAYENNE', 'mayenne', 'M000', '2019-04-24 00:43:11', NULL, NULL),
(55, 1, '54', 'Meurthe-et-Moselle', 'MEURTHE-ET-MOSELLE', 'meurthe-et-moselle', 'M63524', '2019-04-24 00:43:11', NULL, NULL),
(56, 1, '55', 'Meuse', 'MEUSE', 'meuse', 'M200', '2019-04-24 00:43:11', NULL, NULL),
(57, 1, '56', 'Morbihan', 'MORBIHAN', 'morbihan', 'M615', '2019-04-24 00:43:11', NULL, NULL),
(58, 1, '57', 'Moselle', 'MOSELLE', 'moselle', 'M240', '2019-04-24 00:43:11', NULL, NULL),
(59, 1, '58', 'Nièvre', 'NIÈVRE', 'nievre', 'N160', '2019-04-24 00:43:11', NULL, NULL),
(60, 1, '59', 'Nord', 'NORD', 'nord', 'N630', '2019-04-24 00:43:11', NULL, NULL),
(61, 1, '60', 'Oise', 'OISE', 'oise', 'O200', '2019-04-24 00:43:11', NULL, NULL),
(62, 1, '61', 'Orne', 'ORNE', 'orne', 'O650', '2019-04-24 00:43:11', NULL, NULL),
(63, 1, '62', 'Pas-de-Calais', 'PAS-DE-CALAIS', 'pas-de-calais', 'P23242', '2019-04-24 00:43:11', NULL, NULL),
(64, 1, '63', 'Puy-de-Dôme', 'PUY-DE-DÔME', 'puy-de-dome', 'P350', '2019-04-24 00:43:11', NULL, NULL),
(65, 1, '64', 'Pyrénées-Atlantiques', 'PYRÉNÉES-ATLANTIQUES', 'pyrenees-atlantiques', 'P65234532', '2019-04-24 00:43:11', NULL, NULL),
(66, 1, '65', 'Hautes-Pyrénées', 'HAUTES-PYRÉNÉES', 'hautes-pyrenees', 'H321652', '2019-04-24 00:43:11', NULL, NULL),
(67, 1, '66', 'Pyrénées-Orientales', 'PYRÉNÉES-ORIENTALES', 'pyrenees-orientales', 'P65265342', '2019-04-24 00:43:11', NULL, NULL),
(68, 1, '67', 'Bas-Rhin', 'BAS-RHIN', 'bas-rhin', 'B265', '2019-04-24 00:43:11', NULL, NULL),
(69, 1, '68', 'Haut-Rhin', 'HAUT-RHIN', 'haut-rhin', 'H365', '2019-04-24 00:43:11', NULL, NULL),
(70, 1, '69', 'Rhône', 'RHÔNE', 'rhone', 'R500', '2019-04-24 00:43:11', NULL, NULL),
(71, 1, '70', 'Haute-Saône', 'HAUTE-SAÔNE', 'haute-saone', 'H325', '2019-04-24 00:43:11', NULL, NULL),
(72, 1, '71', 'Saône-et-Loire', 'SAÔNE-ET-LOIRE', 'saone-et-loire', 'S5346', '2019-04-24 00:43:11', NULL, NULL),
(73, 1, '72', 'Sarthe', 'SARTHE', 'sarthe', 'S630', '2019-04-24 00:43:11', NULL, NULL),
(74, 1, '73', 'Savoie', 'SAVOIE', 'savoie', 'S100', '2019-04-24 00:43:11', NULL, NULL),
(75, 1, '74', 'Haute-Savoie', 'HAUTE-SAVOIE', 'haute-savoie', 'H321', '2019-04-24 00:43:11', NULL, NULL),
(76, 1, '75', 'Paris', 'PARIS', 'paris', 'P620', '2019-04-24 00:43:11', NULL, NULL),
(77, 1, '76', 'Seine-Maritime', 'SEINE-MARITIME', 'seine-maritime', 'S5635', '2019-04-24 00:43:11', NULL, NULL),
(78, 1, '77', 'Seine-et-Marne', 'SEINE-ET-MARNE', 'seine-et-marne', 'S53565', '2019-04-24 00:43:11', NULL, NULL),
(79, 1, '78', 'Yvelines', 'YVELINES', 'yvelines', 'Y1452', '2019-04-24 00:43:11', NULL, NULL),
(80, 1, '79', 'Deux-Sèvres', 'DEUX-SÈVRES', 'deux-sevres', 'D2162', '2019-04-24 00:43:11', NULL, NULL),
(81, 1, '80', 'Somme', 'SOMME', 'somme', 'S500', '2019-04-24 00:43:11', NULL, NULL),
(82, 1, '81', 'Tarn', 'TARN', 'tarn', 'T650', '2019-04-24 00:43:11', NULL, NULL),
(83, 1, '82', 'Tarn-et-Garonne', 'TARN-ET-GARONNE', 'tarn-et-garonne', 'T653265', '2019-04-24 00:43:11', NULL, NULL),
(84, 1, '83', 'Var', 'VAR', 'var', 'V600', '2019-04-24 00:43:11', NULL, NULL),
(85, 1, '84', 'Vaucluse', 'VAUCLUSE', 'vaucluse', 'V242', '2019-04-24 00:43:11', NULL, NULL),
(86, 1, '85', 'Vendée', 'VENDÉE', 'vendee', 'V530', '2019-04-24 00:43:11', NULL, NULL),
(87, 1, '86', 'Vienne', 'VIENNE', 'vienne', 'V500', '2019-04-24 00:43:11', NULL, NULL),
(88, 1, '87', 'Haute-Vienne', 'HAUTE-VIENNE', 'haute-vienne', 'H315', '2019-04-24 00:43:11', NULL, NULL),
(89, 1, '88', 'Vosges', 'VOSGES', 'vosges', 'V200', '2019-04-24 00:43:11', NULL, NULL),
(90, 1, '89', 'Yonne', 'YONNE', 'yonne', 'Y500', '2019-04-24 00:43:11', NULL, NULL),
(91, 1, '90', 'Territoire de Belfort', 'TERRITOIRE DE BELFORT', 'territoire-de-belfort', 'T636314163', '2019-04-24 00:43:11', NULL, NULL),
(92, 1, '91', 'Essonne', 'ESSONNE', 'essonne', 'E250', '2019-04-24 00:43:11', NULL, NULL),
(93, 1, '92', 'Hauts-de-Seine', 'HAUTS-DE-SEINE', 'hauts-de-seine', 'H32325', '2019-04-24 00:43:11', NULL, NULL),
(94, 1, '93', 'Seine-Saint-Denis', 'SEINE-SAINT-DENIS', 'seine-saint-denis', 'S525352', '2019-04-24 00:43:11', NULL, NULL),
(95, 1, '94', 'Val-de-Marne', 'VAL-DE-MARNE', 'val-de-marne', 'V43565', '2019-04-24 00:43:11', NULL, NULL),
(96, 1, '95', 'Val-d\'oise', 'VAL-D\'OISE', 'val-doise', 'V432', '2019-04-24 00:43:11', NULL, NULL),
(97, 1, '976', 'Mayotte', 'MAYOTTE', 'mayotte', 'M300', '2019-04-24 00:43:11', NULL, NULL),
(98, 1, '971', 'Guadeloupe', 'GUADELOUPE', 'guadeloupe', 'G341', '2019-04-24 00:43:11', NULL, NULL),
(99, 1, '973', 'Guyane', 'GUYANE', 'guyane', 'G500', '2019-04-24 00:43:11', NULL, NULL),
(100, 1, '972', 'Martinique', 'MARTINIQUE', 'martinique', 'M6352', '2019-04-24 00:43:11', NULL, NULL),
(101, 1, '974', 'Réunion', 'RÉUNION', 'reunion', 'R500', '2019-04-24 00:43:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'France', '2019-04-25 21:59:41', '2019-04-25 21:59:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eyecolors`
--

CREATE TABLE `eyecolors` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `color` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eyecolors`
--

INSERT INTO `eyecolors` (`id`, `label`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Marron', '#945200', '2019-04-19 18:54:19', '2019-04-25 05:31:41', NULL),
(5, 'Noir', '#000000', '2019-04-25 05:32:00', '2019-04-25 05:32:00', NULL),
(6, 'Vert', '#009051', '2019-04-25 05:32:11', '2019-04-25 05:32:11', NULL),
(7, 'Bleu', '#0433ff', '2019-04-25 05:32:27', '2019-04-25 05:32:27', NULL),
(8, 'Bleu ciel', '#00fdff', '2019-04-25 05:32:39', '2019-04-25 05:32:39', NULL),
(9, 'Jaune', '#fffb00', '2019-04-25 05:32:52', '2019-04-25 05:32:52', NULL),
(10, 'Gris', '#c0c0c0', '2019-04-25 05:33:12', '2019-04-25 05:33:12', NULL),
(11, 'Pistache', '#00f900', '2019-04-25 05:33:58', '2019-04-25 05:33:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eye_color_project`
--

CREATE TABLE `eye_color_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `eye_color_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eye_color_project`
--

INSERT INTO `eye_color_project` (`id`, `project_id`, `eye_color_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(33, 19, 4, '2019-04-26 15:33:36', NULL, NULL),
(34, 19, 5, '2019-04-26 15:33:36', NULL, NULL),
(35, 19, 6, '2019-04-26 15:33:36', NULL, NULL),
(36, 19, 7, '2019-04-26 15:33:36', NULL, NULL),
(37, 19, 8, '2019-04-26 15:33:36', NULL, NULL),
(38, 19, 9, '2019-04-26 15:33:36', NULL, NULL),
(39, 19, 10, '2019-04-26 15:33:36', NULL, NULL),
(40, 19, 11, '2019-04-26 15:33:36', NULL, NULL),
(79, 20, 4, '2019-04-28 17:39:23', NULL, NULL),
(80, 20, 5, '2019-04-28 17:39:23', NULL, NULL),
(81, 20, 6, '2019-04-28 17:39:23', NULL, NULL),
(82, 20, 7, '2019-04-28 17:39:23', NULL, NULL),
(83, 20, 8, '2019-04-28 17:39:23', NULL, NULL),
(84, 20, 9, '2019-04-28 17:39:23', NULL, NULL),
(85, 20, 10, '2019-04-28 17:39:23', NULL, NULL),
(86, 20, 11, '2019-04-28 17:39:23', NULL, NULL),
(87, 21, 4, '2019-04-28 19:12:07', NULL, NULL),
(88, 21, 5, '2019-04-28 19:12:07', NULL, NULL),
(89, 21, 6, '2019-04-28 19:12:07', NULL, NULL),
(90, 21, 7, '2019-04-28 19:12:07', NULL, NULL),
(91, 21, 8, '2019-04-28 19:12:07', NULL, NULL),
(92, 21, 9, '2019-04-28 19:12:07', NULL, NULL),
(93, 21, 10, '2019-04-28 19:12:07', NULL, NULL),
(94, 21, 11, '2019-04-28 19:12:07', NULL, NULL),
(95, 22, 4, '2019-04-28 19:21:56', NULL, NULL),
(96, 22, 5, '2019-04-28 19:21:56', NULL, NULL),
(97, 22, 6, '2019-04-28 19:21:56', NULL, NULL),
(98, 22, 7, '2019-04-28 19:21:56', NULL, NULL),
(99, 22, 8, '2019-04-28 19:21:56', NULL, NULL),
(100, 22, 9, '2019-04-28 19:21:56', NULL, NULL),
(101, 22, 10, '2019-04-28 19:21:56', NULL, NULL),
(102, 22, 11, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Burgers', '2019-04-17 17:42:06', '2019-04-26 22:59:45', NULL),
(2, 'Pizza', '2019-04-19 19:53:57', '2019-04-26 22:59:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_influencer`
--

CREATE TABLE `food_influencer` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_influencer`
--

INSERT INTO `food_influencer` (`id`, `food_id`, `influencer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, '2019-04-26 00:49:33', '2019-04-26 00:49:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_project`
--

CREATE TABLE `food_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_project`
--

INSERT INTO `food_project` (`id`, `project_id`, `food_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 19, 1, '2019-04-26 15:33:36', NULL, NULL),
(6, 19, 2, '2019-04-26 15:33:36', NULL, NULL),
(14, 20, 1, '2019-04-28 17:39:23', NULL, NULL),
(15, 20, 2, '2019-04-28 17:39:23', NULL, NULL),
(16, 21, 1, '2019-04-28 19:12:07', NULL, NULL),
(17, 21, 2, '2019-04-28 19:12:07', NULL, NULL),
(18, 22, 1, '2019-04-28 19:21:56', NULL, NULL),
(19, 22, 2, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `haircolors`
--

CREATE TABLE `haircolors` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `color` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `haircolors`
--

INSERT INTO `haircolors` (`id`, `label`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Brun', '#aa7942', '2019-04-19 16:10:26', '2019-04-25 05:27:56', NULL),
(2, 'rouge', '#ff0000', '2019-04-19 16:10:56', '2019-04-19 16:21:56', '2019-04-19 16:21:56'),
(3, 'Jaune', '#ffff00', '2019-04-19 16:37:58', '2019-04-19 16:38:09', '2019-04-19 16:38:09'),
(4, 'Blond', '#f7ee00', '2019-04-25 05:28:37', '2019-04-25 05:28:37', NULL),
(5, 'Noir', '#131808', '2019-04-25 05:28:50', '2019-04-25 05:28:50', NULL),
(6, 'Rouge', '#f20814', '2019-04-25 05:29:03', '2019-04-25 05:29:03', NULL),
(7, 'Rose', '#ff2f92', '2019-04-25 05:29:15', '2019-04-25 05:29:15', NULL),
(8, 'Bleu', '#0433ff', '2019-04-25 05:29:29', '2019-04-25 05:29:29', NULL),
(9, 'Bleu ciel', '#73fdff', '2019-04-25 05:29:46', '2019-04-25 05:29:46', NULL),
(10, 'Vert', '#009051', '2019-04-25 05:30:03', '2019-04-25 05:30:03', NULL),
(11, 'Blanc', '#ffffff', '2019-04-25 05:30:13', '2019-04-25 05:30:13', NULL),
(12, 'Gris', '#d6d6d6', '2019-04-25 05:30:23', '2019-04-25 05:30:23', NULL),
(13, 'Violet', '#9437ff', '2019-04-25 05:31:03', '2019-04-25 05:31:03', NULL),
(14, 'Orange', '#ff9300', '2019-04-25 05:31:16', '2019-04-25 05:31:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hairstyles`
--

CREATE TABLE `hairstyles` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hairstyles`
--

INSERT INTO `hairstyles` (`id`, `label`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Long', 'https://image.flaticon.com/icons/png/512/42/42116.png', '2019-04-19 18:54:10', '2019-04-25 07:36:03', NULL),
(3, 'Court', 'https://static.thenounproject.com/png/189285-200.png', '2019-04-25 05:34:41', '2019-04-25 07:36:56', NULL),
(4, 'Bouclé', 'https://sitejerk.com/images/black-hair-transparent-background-7.png', '2019-04-25 05:34:59', '2019-04-25 07:38:42', NULL),
(5, 'Degradé', 'https://image.flaticon.com/icons/png/512/40/40776.png', '2019-04-25 05:35:21', '2019-04-25 07:36:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hair_color_project`
--

CREATE TABLE `hair_color_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `hair_color_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hair_color_project`
--

INSERT INTO `hair_color_project` (`id`, `project_id`, `hair_color_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 1, '2019-04-25 22:44:01', NULL, NULL),
(2, 17, 4, '2019-04-25 22:44:01', NULL, NULL),
(3, 17, 5, '2019-04-25 22:44:01', NULL, NULL),
(4, 17, 6, '2019-04-25 22:44:01', NULL, NULL),
(5, 17, 7, '2019-04-25 22:44:01', NULL, NULL),
(6, 17, 8, '2019-04-25 22:44:01', NULL, NULL),
(7, 17, 9, '2019-04-25 22:44:01', NULL, NULL),
(8, 17, 10, '2019-04-25 22:44:01', NULL, NULL),
(9, 17, 11, '2019-04-25 22:44:01', NULL, NULL),
(10, 17, 12, '2019-04-25 22:44:01', NULL, NULL),
(11, 17, 13, '2019-04-25 22:44:01', NULL, NULL),
(12, 17, 14, '2019-04-25 22:44:01', NULL, NULL),
(61, 19, 1, '2019-04-26 15:33:36', NULL, NULL),
(62, 19, 4, '2019-04-26 15:33:36', NULL, NULL),
(63, 19, 5, '2019-04-26 15:33:36', NULL, NULL),
(64, 19, 6, '2019-04-26 15:33:36', NULL, NULL),
(65, 19, 7, '2019-04-26 15:33:36', NULL, NULL),
(66, 19, 8, '2019-04-26 15:33:36', NULL, NULL),
(67, 19, 9, '2019-04-26 15:33:36', NULL, NULL),
(68, 19, 10, '2019-04-26 15:33:36', NULL, NULL),
(69, 19, 11, '2019-04-26 15:33:36', NULL, NULL),
(70, 19, 12, '2019-04-26 15:33:36', NULL, NULL),
(71, 19, 13, '2019-04-26 15:33:36', NULL, NULL),
(72, 19, 14, '2019-04-26 15:33:36', NULL, NULL),
(127, 20, 1, '2019-04-28 17:39:23', NULL, NULL),
(128, 20, 4, '2019-04-28 17:39:23', NULL, NULL),
(129, 20, 5, '2019-04-28 17:39:23', NULL, NULL),
(130, 20, 6, '2019-04-28 17:39:23', NULL, NULL),
(131, 20, 7, '2019-04-28 17:39:23', NULL, NULL),
(132, 20, 8, '2019-04-28 17:39:23', NULL, NULL),
(133, 20, 9, '2019-04-28 17:39:23', NULL, NULL),
(134, 20, 10, '2019-04-28 17:39:23', NULL, NULL),
(135, 20, 11, '2019-04-28 17:39:23', NULL, NULL),
(136, 20, 12, '2019-04-28 17:39:23', NULL, NULL),
(137, 20, 13, '2019-04-28 17:39:23', NULL, NULL),
(138, 20, 14, '2019-04-28 17:39:23', NULL, NULL),
(139, 21, 1, '2019-04-28 19:12:07', NULL, NULL),
(140, 21, 4, '2019-04-28 19:12:07', NULL, NULL),
(141, 21, 5, '2019-04-28 19:12:07', NULL, NULL),
(142, 21, 6, '2019-04-28 19:12:07', NULL, NULL),
(143, 21, 7, '2019-04-28 19:12:07', NULL, NULL),
(144, 21, 8, '2019-04-28 19:12:07', NULL, NULL),
(145, 21, 9, '2019-04-28 19:12:07', NULL, NULL),
(146, 21, 10, '2019-04-28 19:12:07', NULL, NULL),
(147, 21, 11, '2019-04-28 19:12:07', NULL, NULL),
(148, 21, 12, '2019-04-28 19:12:07', NULL, NULL),
(149, 21, 13, '2019-04-28 19:12:07', NULL, NULL),
(150, 21, 14, '2019-04-28 19:12:07', NULL, NULL),
(151, 22, 1, '2019-04-28 19:21:56', NULL, NULL),
(152, 22, 4, '2019-04-28 19:21:56', NULL, NULL),
(153, 22, 5, '2019-04-28 19:21:56', NULL, NULL),
(154, 22, 6, '2019-04-28 19:21:56', NULL, NULL),
(155, 22, 7, '2019-04-28 19:21:56', NULL, NULL),
(156, 22, 8, '2019-04-28 19:21:56', NULL, NULL),
(157, 22, 9, '2019-04-28 19:21:56', NULL, NULL),
(158, 22, 10, '2019-04-28 19:21:56', NULL, NULL),
(159, 22, 11, '2019-04-28 19:21:56', NULL, NULL),
(160, 22, 12, '2019-04-28 19:21:56', NULL, NULL),
(161, 22, 13, '2019-04-28 19:21:56', NULL, NULL),
(162, 22, 14, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hair_style_project`
--

CREATE TABLE `hair_style_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `hair_style_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hair_style_project`
--

INSERT INTO `hair_style_project` (`id`, `project_id`, `hair_style_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 19, 2, '2019-04-26 15:33:36', NULL, NULL),
(18, 19, 3, '2019-04-26 15:33:36', NULL, NULL),
(19, 19, 4, '2019-04-26 15:33:36', NULL, NULL),
(20, 19, 5, '2019-04-26 15:33:36', NULL, NULL),
(43, 20, 2, '2019-04-28 17:39:23', NULL, NULL),
(44, 20, 3, '2019-04-28 17:39:23', NULL, NULL),
(45, 20, 4, '2019-04-28 17:39:23', NULL, NULL),
(46, 20, 5, '2019-04-28 17:39:23', NULL, NULL),
(47, 21, 2, '2019-04-28 19:12:07', NULL, NULL),
(48, 21, 3, '2019-04-28 19:12:07', NULL, NULL),
(49, 21, 4, '2019-04-28 19:12:07', NULL, NULL),
(50, 21, 5, '2019-04-28 19:12:07', NULL, NULL),
(51, 22, 2, '2019-04-28 19:21:56', NULL, NULL),
(52, 22, 3, '2019-04-28 19:21:56', NULL, NULL),
(53, 22, 4, '2019-04-28 19:21:56', NULL, NULL),
(54, 22, 5, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `profile_picture` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `influencer_id`, `path`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'https://vignette.wikia.nocookie.net/theperksofbeingawallflower/images/4/42/018.jpghttps://i.ytimg.com/vi/mSnMTMlJzME/maxresdefault.jpg', 1, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(2, 10, 'https://gl-images.condecdn.net/image/byb8PQQpLpK/crop/405/f/emma-watson-2_glamour_3mar17_getty_p.jpg', 0, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(3, 11, 'https://i.pinimg.com/236x/df/09/3a/df093a7f397af7167a06c99eb11a0622.jpg', 1, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(4, 11, 'https://media.brides.com/photos/580e6810cf602c7a3153f8e3/1:1/w_767/blogs-aisle-say-angelina-jolie-weddings-main.jpg', 0, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(5, 12, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Scarlett_Johansson_in_Kuwait_01b-tweaked.jpg/220px-Scarlett_Johansson_in_Kuwait_01b-tweaked.jpg', 1, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(6, 12, 'https://cdn.newsapi.com.au/image/v1/95ee25902685c44cac44669e1c8fb180', 0, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(7, 13, 'https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTE4MDAzNDEwMzkxNjMxMzc0/megan-fox-483434-1-402.jpg', 1, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL),
(8, 13, 'https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BBSfx6W.img?h=857&w=624&m=6&q=60&o=f&l=f&x=1039&y=1240', 0, '2019-04-26 00:47:09', '2019-04-26 00:47:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_influencer`
--

CREATE TABLE `image_influencer` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `influencers`
--

CREATE TABLE `influencers` (
  `id` int(11) NOT NULL,
  `lname` text NOT NULL,
  `fname` text NOT NULL,
  `email` text NOT NULL,
  `remember_token` text,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `number_of_subscribers` int(11) NOT NULL,
  `commitement_rate` text NOT NULL,
  `views_number_per_story` int(11) NOT NULL,
  `hair_color_id` int(11) DEFAULT NULL,
  `hair_style_id` int(11) DEFAULT NULL,
  `eye_color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `banned` int(11) DEFAULT NULL,
  `phone` text NOT NULL,
  `vip` int(11) DEFAULT NULL,
  `price_one` text NOT NULL,
  `price_two` text NOT NULL,
  `carnation_id` int(11) DEFAULT NULL,
  `instagram_id` text,
  `shoe_size` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `influencers`
--

INSERT INTO `influencers` (`id`, `lname`, `fname`, `email`, `remember_token`, `email_verified_at`, `password`, `age`, `sexe`, `country_id`, `city_id`, `number_of_subscribers`, `commitement_rate`, `views_number_per_story`, `hair_color_id`, `hair_style_id`, `eye_color_id`, `created_at`, `updated_at`, `deleted_at`, `banned`, `phone`, `vip`, `price_one`, `price_two`, `carnation_id`, `instagram_id`, `shoe_size`, `size_id`) VALUES
(10, 'Watson', 'Emma', 'medmokrani29@gmail.com', NULL, NULL, 'lll', 24, 1, 1, 4, 3000, '50', 100, 4, 4, 4, '2019-04-25 23:13:54', '2019-04-28 22:13:54', NULL, 0, '20014384', 1, '100', '1000', 1, 'TT', 38, 1),
(11, 'Joli', 'Angelina', 'medmokrani29@gmail.com', NULL, NULL, 'lll', 24, 1, 1, 4, 3000, '50', 100, 4, 4, 4, '2019-04-25 23:13:54', '2019-04-28 22:13:43', NULL, 0, '20014384', 0, '100', '1000', 1, 'TT', NULL, 1),
(12, 'Johansson', 'Scarlett', 'medmokrani29@gmail.com', NULL, NULL, 'lll', 24, 1, 1, 4, 3000, '50', 100, 4, 4, 4, '2019-04-25 23:13:54', '2019-04-28 22:13:46', NULL, 0, '20014384', 1, '100', '1000', 1, 'TT', NULL, 1),
(13, 'Fox', 'Megan', 'medmokrani29@gmail.com', NULL, NULL, 'lll', 24, 1, 1, 4, 3000, '50', 100, 4, 4, 4, '2019-04-25 23:13:54', '2019-04-28 22:13:50', NULL, 0, '20014384', 0, '100', '1000', 1, 'TT', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `influencer_media`
--

CREATE TABLE `influencer_media` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `influencer_media`
--

INSERT INTO `influencer_media` (`id`, `media_id`, `influencer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, '2019-04-26 00:43:51', '2019-04-26 00:43:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `influencer_project`
--

CREATE TABLE `influencer_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `influencer_skill`
--

CREATE TABLE `influencer_skill` (
  `id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `influencer_skill`
--

INSERT INTO `influencer_skill` (`id`, `skill_id`, `influencer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 10, '2019-04-26 00:44:26', '2019-04-26 00:44:26', NULL),
(2, 5, 10, '2019-04-26 00:44:26', '2019-04-26 00:44:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `influencer_tag`
--

CREATE TABLE `influencer_tag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `influencer_tag`
--

INSERT INTO `influencer_tag` (`id`, `tag_id`, `influencer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 10, '2019-04-26 00:44:47', '2019-04-26 00:44:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `label`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Facebook', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAaVBMVEU6VZ////81Up0yT5xgc61+jbsvTZyXo8hFXaOirM0nSJmlrs7O1OUkRpkfQ5doerLr7fTHzeE9WKHV2umHlcDy9Pnd4eyut9O1vtdZbat5ibmWoceGk7/M0eSrs9G/xtxMY6ZvgLVIYaWJ8OFBAAAC40lEQVR4nO3c63KqMBRAYU9iqaLg/d7W2vd/yE5nzt/ihjTsvTNrPQDDNxIDJDqZEBERERERERERERERERFZL4QYqydF7ZMcXKyadju97m/zzhZ7n8SqCY/T8Z+kXa19sv2LdbztRLqflu6EsXm8i3kOhbF9WffxeROG9tHT50xYbTd9fb6E7Vt/nydhqO9DgH6EcdZ7BPoSVpdhPjfCajUU6EQYhwN9COPncKALYdgeChe2socIv8LmnAJ0IIzXJKADYZMyCD0IE69R+8Iw+F7Gi7CVv67wKQzTVKB1YbMsXBhSbtdcCOtT6cLUudC8MD7SgbaFdepsb17YDHw140YYZn8ANC2M+78QWl57qvoMw8PuvHC3fljL70k3q7qu/a0Bt9LZ8HhpgvbJDioKgffWp28SvqRA7TMdmvDJ6egWKBV+Ob1EJ1LhyfB09yyZ0PFHKBMeG+3TTEgkPFXap5mQSGj5nuxpIuELQsshRGg/hAjthxCh/RAitB9ChPZDiNB+CBHarwxh6PiJci3ZWnptnv3SWRm4ev2920IgPN86jvDTfKsqrD4EiMR0V98qyceU1kF3iXgEofLy2wjCe/FX6Yful+kIwn3xwpXuOv8Iws/ihcr3NPmFa+UdU/mFS+XdKPmFZ+UtU/mFr8WPQ+3nx/zCi/K2t/xC7VcA2YUH7b2Z2YXqWxezCzfFf4bqmzOzC2/Ff9M8ihdqT4f5hdrDMLtQ+VXiCEL93x7mFiq/ShxBOC9+HL5pTxbZhVPtySK7UNuXXXhQH4a5hWvtZ6fswnf1ySL3GvBZ/yqdbGcdSf4O8q3rCLpL+P8LvxdFu02qjiNo455Vxn6arhAitB9ChPZDiNB+CBHaDyFC+yFEaD+ECO2HEKH9ECK0H0KE9kOI0H4IEdoPIUL7IURoP4QI7YcQof0QIrQfQoT2Q4jQfggR2g8hQvshRGg/hAjthxCh/RAitB9ChPZDiNB+CBH26BsaQkVVLImVewAAAABJRU5ErkJggg==', '2019-04-17 15:43:02', '2019-04-26 22:51:02', NULL),
(2, 'Instagram', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQx8tbQLOTAL66I71AKB4dc-frlQOKUonqMMJNowlQWBtraQoY', '2019-04-17 16:07:27', '2019-04-26 22:52:03', NULL),
(3, 'Youtube', 'https://cdn2.iconfinder.com/data/icons/micon-social-pack/512/youtube-512.png', '2019-04-17 16:07:35', '2019-04-26 22:52:25', NULL),
(4, 'Snapchat', 'https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/snapchat-512.png', '2019-04-19 19:45:35', '2019-04-26 22:52:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_project`
--

CREATE TABLE `media_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_project`
--

INSERT INTO `media_project` (`id`, `project_id`, `media_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 19, 1, '2019-04-26 15:33:36', NULL, NULL),
(22, 19, 2, '2019-04-26 15:33:36', NULL, NULL),
(23, 19, 3, '2019-04-26 15:33:36', NULL, NULL),
(24, 19, 4, '2019-04-26 15:33:36', NULL, NULL),
(25, 19, 5, '2019-04-26 15:33:36', NULL, NULL),
(48, 20, 1, '2019-04-28 17:39:23', NULL, NULL),
(49, 20, 2, '2019-04-28 17:39:23', NULL, NULL),
(50, 20, 3, '2019-04-28 17:39:23', NULL, NULL),
(51, 20, 4, '2019-04-28 17:39:23', NULL, NULL),
(52, 21, 1, '2019-04-28 19:12:07', NULL, NULL),
(53, 21, 2, '2019-04-28 19:12:07', NULL, NULL),
(54, 21, 3, '2019-04-28 19:12:07', NULL, NULL),
(55, 21, 4, '2019-04-28 19:12:07', NULL, NULL),
(56, 22, 1, '2019-04-28 19:21:56', NULL, NULL),
(57, 22, 2, '2019-04-28 19:21:56', NULL, NULL),
(58, 22, 3, '2019-04-28 19:21:56', NULL, NULL),
(59, 22, 4, '2019-04-28 19:21:56', NULL, NULL);

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(6, '2016_06_01_000004_create_oauth_clients_table', 2),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('007ec1381b1a37387321eca1d4ac5c7b1e4a7c2969f098b368102223b26356e159052008389629fc', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:24:54', '2019-04-21 23:24:54', '2020-04-22 01:24:54'),
('0142e66ccbc9ad2460e633a03aefb86a68b7c2b76adcac95aa1d96ff52bb628bcda6b0cc6a6a6557', 4, 1, 'revolver', '[]', 0, '2019-04-26 13:16:00', '2019-04-26 13:16:00', '2020-04-26 15:16:00'),
('05e55fbcd2c2d30858ebcf988c60ddbfa15b60560be942c8c1f7136feee13d79d029a0db7ecdc2a7', 1, 1, 'revolver', '[]', 0, '2019-04-22 11:45:38', '2019-04-22 11:45:38', '2020-04-22 13:45:38'),
('0c3136f2358522cdebf52253f30382acc55a95e2fee7d84ca07d75576584a13a57dcd849835ca700', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:08:41', '2019-04-21 16:08:41', '2020-04-21 18:08:41'),
('0dbbfcec08be8a9cd30ff96c080b38fa27510c185a4842d72ed94f8066cc7a7080b03cda03ec82f0', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:45:38', '2019-04-22 14:45:38', '2020-04-22 16:45:38'),
('10bbbbf59b35d0d76c178b65a54f1a2fe0355f4cd8c13440a96cc8d90401d07aec7dd8f26904f177', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:00:56', '2019-04-22 14:00:56', '2020-04-22 16:00:56'),
('182b5855455b76d3b99a7620773ade16549bdd8066e4bdd63dd57b3700cc1763a7afaafd024fb326', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:17:36', '2019-04-21 23:17:36', '2020-04-22 01:17:36'),
('194f5eb9fad976f92f6041f2e141a0131cb1813c4f3eb408383314d8d0af10e1f788c907a2cb5cfa', 4, 1, 'revolver', '[]', 0, '2019-04-23 00:48:08', '2019-04-23 00:48:08', '2020-04-23 02:48:08'),
('1b3ea4daa626b1f6280ed033a893032699334962451210892d14696d7caa5f12444da238d91bf19d', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:20:22', '2019-04-22 14:20:22', '2020-04-22 16:20:22'),
('1bf849cc329916427122b9c6062e227141032a04a491be4f0b16fcd50b26aa7719dd444f8c30621f', 1, 1, 'revolver', '[]', 0, '2019-04-03 13:32:18', '2019-04-03 13:32:18', '2020-04-03 14:32:18'),
('1ece92c29990f4233d857638ba457ef1efa8ba1cab8e49dd1ca8066504cf6bfc80ce8c2c4cf9b854', 4, 1, 'revolver', '[]', 0, '2019-04-22 15:41:35', '2019-04-22 15:41:35', '2020-04-22 17:41:35'),
('2368810b8c2506ebb2ece2356868d88aeee6b817906d0521d15949af6c3ea89e39aa787b1d20a8e2', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:41:10', '2019-04-21 23:41:10', '2020-04-22 01:41:10'),
('2fc5268adcc6a2796c91f4f7dea75fc11fd9c4477a61a443c098929babb9c277970c86eb879f8af0', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:43:08', '2019-04-22 00:43:08', '2020-04-22 02:43:08'),
('2fe64cbf49b1ca64b4db6ff644a26ddadadc5c0b095eb07482e0b1f744a152211c2f7987e22bf334', 1, 1, 'revolver', '[]', 0, '2019-04-22 12:13:37', '2019-04-22 12:13:37', '2020-04-22 14:13:37'),
('36ef83a7c35872afdacf2d5b5bb032f466ba15e09ba839eb47c5bd20d3eb399db92d2f3a8a1ac2af', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:10:54', '2019-04-21 23:10:54', '2020-04-22 01:10:54'),
('390921b42cf3a3b720135016a61a12f33f1f20c173c294b54a18c39e842189e77da25073b7342cd5', 1, 1, 'revolver', '[]', 0, '2019-04-22 13:01:13', '2019-04-22 13:01:13', '2020-04-22 15:01:13'),
('396c76216b59a34b840a6766df142321210c8da423c6fa8d59a9b5b09d1bfc0bb5a193a742e50a1a', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:27:27', '2019-04-22 00:27:27', '2020-04-22 02:27:27'),
('3cdea19b3e075fd264c7698c0c0957e95897d8b15cb7840ea4a5fb64174f694616975b461fd029d6', 4, 1, 'revolver', '[]', 0, '2019-04-22 15:33:17', '2019-04-22 15:33:17', '2020-04-22 17:33:17'),
('3d77de5bc8d18868c5f21501c8f61f88b50ceb24ebc2fb69797c238e336e9b96ff1e3e2b3d41e884', 1, 1, 'revolver', '[]', 0, '2019-04-22 11:43:38', '2019-04-22 11:43:38', '2020-04-22 13:43:38'),
('43f23cf3aa5de16a9b96265d11a9c8a9651ede83bfe22623e7d12b2cc73c0275ca4cde8042fcc0a4', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:13:04', '2019-04-22 00:13:04', '2020-04-22 02:13:04'),
('44e94b78289ee2191251ff0f7ad66e649a0d75401bffa0e4e3f9dbc91b16e4c157e97b97a167f21e', 4, 1, 'revolver', '[]', 0, '2019-04-22 15:37:35', '2019-04-22 15:37:35', '2020-04-22 17:37:35'),
('46095b65d9a1b7a1a6bc200bbbe1faaf6c18929f6c2eb2838f52d38e537f96a1b075d1688bded328', 1, 1, 'revolver', '[]', 0, '2019-04-22 15:35:59', '2019-04-22 15:35:59', '2020-04-22 17:35:59'),
('4f6a6b55147fcaf78d224b5dd0eb703de810b700a72c90ede4db823206dbcfe657eca5c8ae72f88b', 1, 1, 'revolver', '[]', 0, '2019-04-22 11:54:56', '2019-04-22 11:54:56', '2020-04-22 13:54:56'),
('5000372be152b6119d2b33caa592ce060d5ade15fee8e57a70128b2de0a58d705127bcaa48c4e2cd', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:43:30', '2019-04-21 23:43:30', '2020-04-22 01:43:30'),
('55241d00ab08d93c512260bc7560c7bb7c41380ad5d395ac97d0b95482f396813d24953e1f4c814b', 1, 1, 'revolver', '[]', 0, '2019-04-22 12:55:41', '2019-04-22 12:55:41', '2020-04-22 14:55:41'),
('59def4958d4a4fcae694b484d45d4877bb8f595b1b4625eec9ad053985a3264da6208d5677bbf5e6', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:59:54', '2019-04-21 23:59:54', '2020-04-22 01:59:54'),
('5e6bbbedc477f63b78a21f6f27cbd3d055586a6e6a4327e94856b8645295233c59dce3655f727b79', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:15:33', '2019-04-22 00:15:33', '2020-04-22 02:15:33'),
('5f80988dc62ea8165c26ed92d2ed78e9a7d6962f57c8efe83f4b6f8c565fc02961c9a4af97554421', 1, 1, 'revolver', '[]', 0, '2019-04-22 13:54:59', '2019-04-22 13:54:59', '2020-04-22 15:54:59'),
('6979620590d7beca17632f146080050d8f04eacaad36d37862c9e862bc8bf9e91932e797bba1ccc5', 4, 1, 'revolver', '[]', 0, '2019-04-26 13:17:22', '2019-04-26 13:17:22', '2020-04-26 15:17:22'),
('6a2221cf80739265eb1b7a45ea60df3f490a9329544a26bbda6c15a51fd802e70fea860bafef49ed', 1, 1, 'revolver', '[]', 0, '2019-04-22 11:49:21', '2019-04-22 11:49:21', '2020-04-22 13:49:21'),
('6f5c46125eaf5bfbe5dff25d3cbe81808c7643e3c2bbf6b8721c58eb3c110d08baf034e3dd98e5be', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:28:19', '2019-04-21 23:28:19', '2020-04-22 01:28:19'),
('77716d4a0b5c5b4c574b5de9ccfb0b1d9c603c71c96a661de377e3de8229372041f389fb02f43567', 1, 1, 'revolver', '[]', 0, '2019-04-22 13:59:12', '2019-04-22 13:59:12', '2020-04-22 15:59:12'),
('78f869cdce244263a6b36930db7b27eb0264e79c85ae96da9bd2777925c3240536479f2176688c15', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:29:46', '2019-04-21 16:29:46', '2020-04-21 18:29:46'),
('799c3684b0bed8359d422e1276e4b3fc19d9715d8557fb80218e14852d8e0ca64fdc4327dd936005', 4, 1, 'revolver', '[]', 0, '2019-04-21 16:11:04', '2019-04-21 16:11:04', '2020-04-21 18:11:04'),
('7a90ec6df6820e68018d8d5cb65d8ecc733048de1c861b33ecc3407c5f30c393328c54da091a5432', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:15:56', '2019-04-21 23:15:56', '2020-04-22 01:15:56'),
('7ce8b09c17e20a6a5b824e9221a5e64381b7f6de3689fdfbfca0948fccd2090c8d2b3033783367d0', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:50:45', '2019-04-21 23:50:45', '2020-04-22 01:50:45'),
('7f3e62950d246dcabbc2009adc2fae4709a1ebe2d0b9132482b3c413ec95070315f423208b218f10', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:02:26', '2019-04-22 00:02:26', '2020-04-22 02:02:26'),
('828dfb039bca733b03f5083d181841c3fae66c8cc3a8b9994706f384f483c0a1305d1b1d4e8a8173', 6, 1, 'revolver', '[]', 0, '2019-04-21 15:01:03', '2019-04-21 15:01:03', '2020-04-21 16:01:03'),
('87fa89117772d4ce040a2ebd2f5a7afcb4919571b5aab3324c2514b0d5d72ef7c466e3b6e86563b8', 4, 1, 'revolver', '[]', 0, '2019-04-28 15:38:21', '2019-04-28 15:38:21', '2020-04-28 17:38:21'),
('88604acabe409d15810fcff74cdd441a6dfc85f81edda7b2eefca2a98d6fadea5f3f13f98ec2f69b', 4, 1, 'revolver', '[]', 0, '2019-04-22 18:25:05', '2019-04-22 18:25:05', '2020-04-22 20:25:05'),
('89ff6a99a07c115e4bf559229510124ff88616e609b5fc17041535862b145fe1b39ff865de45dfe2', 1, 1, 'revolver', '[]', 0, '2019-04-22 13:53:02', '2019-04-22 13:53:02', '2020-04-22 15:53:02'),
('8dce1686acf93f10f81cae896d0f19d00d196b2ac675973e364c5720582b06de2d78a90c4472db5a', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:05:53', '2019-04-21 23:05:53', '2020-04-22 01:05:53'),
('8e6cb104bb2c28537adc966b7828878f23786804289e8ea3105dd45b04827a4b512f0b9a35ce8c3d', 4, 1, 'revolver', '[]', 0, '2019-04-21 16:18:09', '2019-04-21 16:18:09', '2020-04-21 18:18:09'),
('9a2ec410f6742d7c1f2c473d58c2aab6da9b9f0a030b90c32f82c568e287f4c69eee0793fbe393b0', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:16:57', '2019-04-22 14:16:57', '2020-04-22 16:16:57'),
('9a78f0014452248fc7516354b5cfc3a6a7523d03fc36738a7e3842988524ba51f5d6987e89fd2e75', 4, 1, 'revolver', '[]', 0, '2019-04-28 14:38:05', '2019-04-28 14:38:05', '2020-04-28 16:38:05'),
('9d4edbdebbeb1a0764c9e2d580a2667c0afec76fd176cc21365b799ea3cf26fdb192ab25c63fc8fa', 1, 1, 'revolver', '[]', 0, '2019-04-03 13:27:04', '2019-04-03 13:27:04', '2020-04-03 14:27:04'),
('a15478c6b1357a9b681d8f6ab35432427f3a79ec2e64fd7b59a802f32e9bb9496fb175225e33f499', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:40:18', '2019-04-22 00:40:18', '2020-04-22 02:40:18'),
('a7de91ae086b20156418149b3ea1fb4100bfde6f44b3ce41390e167f611ae920711f1733329cd49c', 1, 1, 'revolver', '[]', 0, '2019-04-22 11:44:41', '2019-04-22 11:44:41', '2020-04-22 13:44:41'),
('a940801539fd3deb2b8909be021699c34742f5b057f8502403ff1efbc65c190be8d55872b18eab47', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:06:25', '2019-04-22 14:06:25', '2020-04-22 16:06:25'),
('aa7da2470362d15fe51cf7158466dcc1ad6523794f29c5e2eda973353e36d7f273c8a63117aba49e', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:34:38', '2019-04-21 16:34:38', '2020-04-21 18:34:38'),
('ad4f5627d75d52b87b8db2c436250ecddc6343cdf61947fb1d03c4b7c8aa5f2f948a1d5d55ed7504', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:10:05', '2019-04-22 00:10:05', '2020-04-22 02:10:05'),
('b04d4fcf87b357fd1da38739f865cbcca8e454436c05db7db29205a64bf6595a1deec08dd408edb3', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:18:19', '2019-04-21 16:18:19', '2020-04-21 18:18:19'),
('b18303cde32484d1b4c9b39b2e13b29f8cbe2cbd0c2df9a550e8e916f50005a6f97685ffa6fb7f1e', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:26:15', '2019-04-21 23:26:15', '2020-04-22 01:26:15'),
('b30d88ea9158ba02a86fb946d9b2f11e8f0494ee8d590cbf95a0f1692d7a3aad0303b5a76d54fb5e', 4, 1, 'revolver', '[]', 0, '2019-04-28 14:34:55', '2019-04-28 14:34:55', '2020-04-28 16:34:55'),
('b580051a600d22e4c812bc4fb9fa46653b8ad9ab211b25daa3767b7aeba7f79f8818ed39a875e23d', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:02:07', '2019-04-22 14:02:07', '2020-04-22 16:02:07'),
('b7b804fcf53968e1783305ed2ca67d1a5688f34477034f03f9b194a64b49a7a83da0b37b3c07bb55', 1, 1, 'revolver', '[]', 0, '2019-04-22 12:01:31', '2019-04-22 12:01:31', '2020-04-22 14:01:31'),
('bad6f8ae2a8fd8de883cf1c2db6122af212a1dd6df2a00271003acaae9eb5a3749f8eb97ff8a03f1', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:48:32', '2019-04-22 00:48:32', '2020-04-22 02:48:32'),
('be15619ef70d1616788b234cd086ca1a37b1f5161deb53370d0e224d82bbc2b62f920b2e034af8ab', 2, 1, 'revolver', '[]', 0, '2019-04-03 14:02:51', '2019-04-03 14:02:51', '2020-04-03 15:02:51'),
('c1853d1f0a45484f43986af2a46af48dfb40d64403a324a1d190863a0f39ddb1e7868cfb930a48ac', 2, 1, 'revolver', '[]', 0, '2019-04-03 14:05:12', '2019-04-03 14:05:12', '2020-04-03 15:05:12'),
('c1d19bdf71cda70976ba6e5e4b16be02d20620a3a3df81c90bd4d6180cb7b47d5e8f26a959da1b83', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:53:31', '2019-04-21 23:53:31', '2020-04-22 01:53:31'),
('c328666817211b39c4bcdbed02b5d9459b5bcae85d1115c1a07e92dd71e20a05c622786c0e71f899', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:44:52', '2019-04-22 00:44:52', '2020-04-22 02:44:52'),
('c4c12adae0a00efb439ba0e28170e3a69e54daf7dffcade99bc55ea5ac8ee356b8dc485e251527a5', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:26:53', '2019-04-21 16:26:53', '2020-04-21 18:26:53'),
('c574fd65bf1f7a959dc9d23b8b605d8af9c0f3f433cd3788100693c7f2ba56f4e1f20f9b232211f9', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:16:54', '2019-04-22 00:16:54', '2020-04-22 02:16:54'),
('c92d822e45b5bdd14ca8cd72744b3dac67ce4be880c39740ae71e11294e998f88e429cb7eb131ded', 8, 1, 'revolver', '[]', 0, '2019-04-21 15:27:27', '2019-04-21 15:27:27', '2020-04-21 16:27:27'),
('cb40de8430a026842974cf79d99067dd494a3369bb56cc615b794416b38d9e1b9ee4cbc58ab0dd17', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:11:45', '2019-04-22 00:11:45', '2020-04-22 02:11:45'),
('cde404b22fcf7790fc5efcedf0c21ae35c4392af17ddc3adcede89b1652d75f0b85ff987abee3d4a', 4, 1, 'revolver', '[]', 0, '2019-04-26 13:14:18', '2019-04-26 13:14:18', '2020-04-26 15:14:18'),
('d3d1a0c0e2f7105165c623c6242b848de77e1df1bb6a7ac248ad6320e806ca24fa97c99d32091592', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:23:48', '2019-04-22 00:23:48', '2020-04-22 02:23:48'),
('d52b73875eb34b927624f613704c0216f65dfc4de61929e5af8c78cf4f15863ee11fa59c2f1f19b4', 1, 1, 'revolver', '[]', 0, '2019-04-22 00:30:21', '2019-04-22 00:30:21', '2020-04-22 02:30:21'),
('d9907e304ec5e10a367dba6e5be6da7bce877aa937d514741925601a0d5bc189aeff229c2d273507', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:18:40', '2019-04-21 23:18:40', '2020-04-22 01:18:40'),
('db5c48c6304a5c16049a02c2f3cea8e0aa58fda44390b240c5887b74f2e4190e4d2eb7540b95b93f', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:28:31', '2019-04-21 16:28:31', '2020-04-21 18:28:31'),
('dc81bf5f9e790a34250a459075eb3fa17c59f0fda744cc1c62b903d78a9af5db5710deccd4769ff3', 4, 1, 'revolver', '[]', 0, '2019-04-28 14:39:21', '2019-04-28 14:39:21', '2020-04-28 16:39:21'),
('e934fd241c432b2f55b08c412b1eca9892ceff0bad684a01de77afe067d4402c30aa6da1db4583de', 5, 1, 'revolver', '[]', 0, '2019-04-21 13:57:27', '2019-04-21 13:57:27', '2020-04-21 14:57:27'),
('e9e620d3c3b4d1e0e45e023194cc398218867d8087e29486a05a2014392c6bdfaf69ad2cdaacf29e', 4, 1, 'revolver', '[]', 0, '2019-04-22 15:18:13', '2019-04-22 15:18:13', '2020-04-22 17:18:13'),
('ed0edc294da664559859e2e29b637bbd46775d7dc7e89a862fa83e220abe1b6318f31f00f8043812', 4, 1, 'revolver', '[]', 0, '2019-04-22 15:34:34', '2019-04-22 15:34:34', '2020-04-22 17:34:34'),
('ed83308be413a0b64ec9b0012bac676186dfb2378b62ee93f0773e046392c22fcd93071a2c134c9a', 1, 1, 'revolver', '[]', 0, '2019-04-21 16:24:17', '2019-04-21 16:24:17', '2020-04-21 18:24:17'),
('f1112557e6cf769c983e89a9e22ea4357448b4a963c0706912ac77c3e54db950d9f000b11bd6c4cf', 1, 1, 'revolver', '[]', 0, '2019-04-22 14:13:39', '2019-04-22 14:13:39', '2020-04-22 16:13:39'),
('f530f1add51bf50b84b1280d8e8156ccde62741af652015da88551c9033bc2670f5d572600544616', 1, 1, 'revolver', '[]', 0, '2019-04-21 23:45:53', '2019-04-21 23:45:53', '2020-04-22 01:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'LGHJhqHrf5AlaQzkPPhcAF8lifNmaFDzy6JA2oea', 'http://localhost', 1, 0, 0, '2019-04-03 13:09:27', '2019-04-03 13:09:27'),
(2, NULL, 'Laravel Password Grant Client', 'a0oRNYOrrLSgjSnbV4TJmnimDr5AHfqkgjpholkm', 'http://localhost', 0, 1, 0, '2019-04-03 13:09:27', '2019-04-03 13:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-03 13:09:27', '2019-04-03 13:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `influencer_id` int(11) DEFAULT NULL,
  `path` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `influencer_id`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'https://pbs.twimg.com/media/DYRoe4wW4AEljSu.jpg\r\n', '2019-04-28 22:14:20', '2019-04-28 22:14:20', NULL),
(2, 10, 'https://pbs.twimg.com/media/DYRoe4wW4AEljSu.jpg\r\n', '2019-04-28 22:14:20', '2019-04-28 22:14:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `nbr_folowers` int(11) NOT NULL,
  `engagement` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `age`, `height`, `country_id`, `city_id`, `nbr_folowers`, `engagement`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Lancement de parfum', 'Gucci parfum pour homme', 55, 106, 1, 5, 10000, '100', 4, '2019-04-25 21:45:57', '2019-04-28 12:45:54', NULL),
(19, 'hhhh', 'Description', 34, 160, 1, 32, 5412, '56', 4, '2019-04-26 13:33:36', '2019-04-26 13:33:36', NULL),
(20, 'Lancement d’application ', 'Description', 33, 160, 1, 7, 5136, '68', 4, '2019-04-28 15:39:23', '2019-04-28 15:39:23', NULL),
(21, 'bla bla bla', 'haaaaa', 22, 160, 1, 2, 1500, '20', 4, '2019-04-28 17:12:07', '2019-04-28 17:12:07', NULL),
(22, 'vxbdbbdjf', 'Description', 34, 160, 1, 2, 3880, '50', 4, '2019-04-28 17:21:56', '2019-04-28 17:21:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_skill`
--

CREATE TABLE `project_skill` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_skill`
--

INSERT INTO `project_skill` (`id`, `project_id`, `skill_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(65, 19, 18, '2019-04-26 15:33:36', NULL, NULL),
(66, 19, 17, '2019-04-26 15:33:36', NULL, NULL),
(67, 19, 16, '2019-04-26 15:33:36', NULL, NULL),
(68, 19, 12, '2019-04-26 15:33:36', NULL, NULL),
(69, 19, 13, '2019-04-26 15:33:36', NULL, NULL),
(70, 19, 14, '2019-04-26 15:33:36', NULL, NULL),
(71, 19, 15, '2019-04-26 15:33:36', NULL, NULL),
(72, 19, 19, '2019-04-26 15:33:36', NULL, NULL),
(249, 18, 19, '2019-04-28 14:46:05', NULL, NULL),
(250, 18, 18, '2019-04-28 14:46:05', NULL, NULL),
(251, 18, 17, '2019-04-28 14:46:05', NULL, NULL),
(252, 18, 16, '2019-04-28 14:46:05', NULL, NULL),
(253, 18, 15, '2019-04-28 14:46:05', NULL, NULL),
(254, 18, 14, '2019-04-28 14:46:05', NULL, NULL),
(255, 18, 13, '2019-04-28 14:46:05', NULL, NULL),
(256, 18, 12, '2019-04-28 14:46:05', NULL, NULL),
(257, 18, 11, '2019-04-28 14:46:05', NULL, NULL),
(258, 18, 10, '2019-04-28 14:46:05', NULL, NULL),
(259, 18, 9, '2019-04-28 14:46:05', NULL, NULL),
(260, 18, 8, '2019-04-28 14:46:05', NULL, NULL),
(261, 18, 7, '2019-04-28 14:46:05', NULL, NULL),
(262, 18, 6, '2019-04-28 14:46:05', NULL, NULL),
(263, 18, 5, '2019-04-28 14:46:05', NULL, NULL),
(264, 18, 4, '2019-04-28 14:46:05', NULL, NULL),
(265, 20, 4, '2019-04-28 17:39:23', NULL, NULL),
(266, 20, 5, '2019-04-28 17:39:23', NULL, NULL),
(267, 20, 6, '2019-04-28 17:39:23', NULL, NULL),
(268, 20, 7, '2019-04-28 17:39:23', NULL, NULL),
(269, 21, 4, '2019-04-28 19:12:07', NULL, NULL),
(270, 21, 5, '2019-04-28 19:12:07', NULL, NULL),
(271, 21, 6, '2019-04-28 19:12:07', NULL, NULL),
(272, 21, 7, '2019-04-28 19:12:07', NULL, NULL),
(273, 21, 11, '2019-04-28 19:12:07', NULL, NULL),
(274, 21, 10, '2019-04-28 19:12:07', NULL, NULL),
(275, 21, 9, '2019-04-28 19:12:07', NULL, NULL),
(276, 21, 8, '2019-04-28 19:12:07', NULL, NULL),
(277, 21, 12, '2019-04-28 19:12:07', NULL, NULL),
(278, 21, 13, '2019-04-28 19:12:07', NULL, NULL),
(279, 21, 14, '2019-04-28 19:12:07', NULL, NULL),
(280, 21, 15, '2019-04-28 19:12:07', NULL, NULL),
(281, 22, 4, '2019-04-28 19:21:56', NULL, NULL),
(282, 22, 5, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_tag`
--

CREATE TABLE `project_tag` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_tag`
--

INSERT INTO `project_tag` (`id`, `project_id`, `tag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 22, 2, '2019-04-28 19:21:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'XS', '2019-04-28 22:16:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Health', '2019-04-24 17:13:55', '2019-04-24 17:13:55', NULL),
(5, 'Fashion', '2019-04-24 17:14:04', '2019-04-24 17:14:04', NULL),
(6, 'Fitness', '2019-04-24 17:14:11', '2019-04-24 17:14:11', NULL),
(7, 'Makeup', '2019-04-24 17:14:18', '2019-04-24 17:14:18', NULL),
(8, 'Food', '2019-04-24 17:14:23', '2019-04-24 17:14:23', NULL),
(9, 'Lifestyle', '2019-04-24 17:15:03', '2019-04-24 17:15:03', NULL),
(10, 'Love', '2019-04-24 17:15:09', '2019-04-24 17:15:09', NULL),
(11, 'Outfit', '2019-04-24 17:15:17', '2019-04-24 17:15:17', NULL),
(12, 'Sport', '2019-04-24 17:15:46', '2019-04-24 17:15:46', NULL),
(13, 'Night', '2019-04-24 17:16:02', '2019-04-24 17:16:02', NULL),
(14, 'Gaming', '2019-04-24 17:16:15', '2019-04-24 17:16:15', NULL),
(15, 'Geek', '2019-04-24 17:16:21', '2019-04-24 17:16:21', NULL),
(16, 'Style', '2019-04-24 17:16:31', '2019-04-24 17:16:31', NULL),
(17, 'Design', '2019-04-24 17:16:40', '2019-04-24 17:16:40', NULL),
(18, 'Technology', '2019-04-24 17:16:47', '2019-04-24 17:16:47', NULL),
(19, 'Travel', '2019-04-24 17:17:01', '2019-04-24 17:17:01', NULL),
(20, 'Black', '2019-04-24 17:17:12', '2019-04-24 17:17:12', NULL),
(21, 'White', '2019-04-24 17:17:18', '2019-04-24 17:17:18', NULL),
(22, 'Sexy', '2019-04-24 17:17:24', '2019-04-24 17:17:24', NULL),
(23, 'Brand', '2019-04-24 17:17:48', '2019-04-24 17:17:48', NULL),
(24, 'Ad', '2019-04-24 17:17:52', '2019-04-24 17:17:52', NULL),
(25, 'Cook', '2019-04-24 17:18:20', '2019-04-24 17:18:20', NULL),
(26, 'Kids', '2019-04-24 17:18:32', '2019-04-24 17:18:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `label` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test 2', '2019-04-17 16:31:50', '2019-04-17 16:32:16', '2019-04-17 16:32:16'),
(2, 'aaaa', '2019-04-17 16:32:10', '2019-04-17 16:32:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tva` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `banned` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `image`, `email`, `email_verified_at`, `password`, `phone`, `position`, `societe`, `tva`, `type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `banned`) VALUES
(4, 'Mokrani', 'Med', 'https://scontent.ftun12-1.fna.fbcdn.net/v/t1.0-9/46445881_10214384094220068_6563209661833543680_n.jpg?_nc_cat=104&_nc_ht=scontent.ftun12-1.fna&oh=e11d70697203590e08dc98e59c501124&oe=5D3AD947', 'adv@iii.com', NULL, '$2y$10$8jX1UMgTJ4Ai.KEpgYSUce9N8yeXqSqTl5mMmvbdBQ31k3Q56qhom', '20014384', 'a', 'ab', '12', NULL, NULL, '2019-04-09 17:08:58', '2019-04-09 17:10:29', NULL, NULL),
(5, 'test', 'test', NULL, 'aaeeeaa@hotmail.com', NULL, '$2y$10$H.hKYF9n9HzWi752IeQV6unaTIRL59YLPUGztIQNtV.rTx/6OM9xy', 'hhah', '72zq3', 'hah', 'test', NULL, NULL, '2019-04-21 13:57:24', '2019-04-21 13:57:24', NULL, NULL),
(6, 'test', 'test', NULL, 'aaeeerrrrrrrraa@hotmail.com', NULL, '$2y$10$6bLminO4DCPmpjw4h/FeT.nRVsMWdk05FFK2ZvC8EK35penQu997u', 'hhah', '72zq3', 'hah', 'test', NULL, NULL, '2019-04-21 15:01:03', '2019-04-21 15:01:03', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_influencer`
--
ALTER TABLE `brand_influencer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_project`
--
ALTER TABLE `brand_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carnations`
--
ALTER TABLE `carnations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carnation_influencer`
--
ALTER TABLE `carnation_influencer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departement_slug` (`departement_slug`),
  ADD KEY `departement_code` (`departement_code`),
  ADD KEY `departement_nom_soundex` (`departement_nom_soundex`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eyecolors`
--
ALTER TABLE `eyecolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eye_color_project`
--
ALTER TABLE `eye_color_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_influencer`
--
ALTER TABLE `food_influencer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_project`
--
ALTER TABLE `food_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `haircolors`
--
ALTER TABLE `haircolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hairstyles`
--
ALTER TABLE `hairstyles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hair_color_project`
--
ALTER TABLE `hair_color_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hair_style_project`
--
ALTER TABLE `hair_style_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_influencer`
--
ALTER TABLE `image_influencer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `influencers`
--
ALTER TABLE `influencers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `influencer_media`
--
ALTER TABLE `influencer_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `influencer_project`
--
ALTER TABLE `influencer_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `influencer_skill`
--
ALTER TABLE `influencer_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `influencer_tag`
--
ALTER TABLE `influencer_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_project`
--
ALTER TABLE `media_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_skill`
--
ALTER TABLE `project_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tag`
--
ALTER TABLE `project_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand_influencer`
--
ALTER TABLE `brand_influencer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_project`
--
ALTER TABLE `brand_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `carnations`
--
ALTER TABLE `carnations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carnation_influencer`
--
ALTER TABLE `carnation_influencer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eyecolors`
--
ALTER TABLE `eyecolors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eye_color_project`
--
ALTER TABLE `eye_color_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_influencer`
--
ALTER TABLE `food_influencer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_project`
--
ALTER TABLE `food_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `haircolors`
--
ALTER TABLE `haircolors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hairstyles`
--
ALTER TABLE `hairstyles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hair_color_project`
--
ALTER TABLE `hair_color_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `hair_style_project`
--
ALTER TABLE `hair_style_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image_influencer`
--
ALTER TABLE `image_influencer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `influencers`
--
ALTER TABLE `influencers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `influencer_media`
--
ALTER TABLE `influencer_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `influencer_project`
--
ALTER TABLE `influencer_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `influencer_skill`
--
ALTER TABLE `influencer_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `influencer_tag`
--
ALTER TABLE `influencer_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media_project`
--
ALTER TABLE `media_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `project_skill`
--
ALTER TABLE `project_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `project_tag`
--
ALTER TABLE `project_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
