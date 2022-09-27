-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2022 at 09:42 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncst`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloadCount` int NOT NULL DEFAULT '0',
  `journal_id` int DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `month`, `year`, `abstract`, `file`, `type_id`, `downloadCount`, `journal_id`, `verified`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Investigating and Expanding Learning across Activity System Boundaries in Improved Cook Stove Innovation Diffusion and Adoption in Malawi. A presentation at the Cleaner Cooking Camp 5-7 June 2018, Sol-Farm, Lilongwe, Malawi', NULL, '2018', NULL, 'files/articles/Cleaner Cooking Camp 2018.pdf', NULL, 0, NULL, 0, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(2, 'Environmental load of pesticides used in conventional sugarcane production\nin Malawi', NULL, '2018', 'The sugarcane industry is the third largest user of pesticides in Malawi. Our aim with this study was to document pesticide use and handling practices that influence pesticide exposure among sugarcane farmers in Malawi. A semi-structured questionnaire was administered to 55 purposively selected sugarcane farmers and 7 key informants representing 1474 farmers in Nkhata Bay, Nkhotakota and Chikwawa Districts in Malawi. Our results indicate that herbicides and insecticides were widely used. Fifteen moderately and one extremely hazardous pesticide, based on World Health Organization (WHO) classification, were in use. Several of these pesticides: ametryn, acetochlor, monosodium methylarsonate and profenofos are not approved in the European Union because of their toxicity to terrestrial and aquatic life, and/or persistence in water and soil. Farmers (95%) knew that pesticides could enter the human body through the skin, nose (53%) and mouth (42%). They knew that pesticide runoff (80%) and leaching (100%) lead to contamination of water wells. However, this knowledge was not enough to motivate them to take precautionary measures to reduce pesticide exposure. Farmers (78%) had experienced skin irritation, 67% had headache, coughing and running nose during pesticide handling. Measures are in place to reduce pesticide exposure in the large estates and farms operated by farmer associations. Smallholder farmers acting independently do not have the resources and capacity to minimize their exposure to pesticides. There is need to put in place pesticide residue monitoring programs and farmer education on commercial sugarcane production and safe pesticide use as ways of reducing pesticide exposure.', 'files/articles/Donga - Environmental load of pesticides used in conventional sugarcane production in Malawi (2018).pdf', '1', 0, 1, 0, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(3, 'Investigating and Expanding Learning across\nActivity System Boundaries in Improved Cook Stove\nInnovation Diffusion and Adoption in Malawi', NULL, '2018', 'This study investigates and expands learning within and between activity systems working with Improved Cook Stoves (hereafter ICS) in Malawi. The study focuses on how existing learning interactions among ICS actors can be expanded using expansive learning processes, mobilised through Boundary Crossing Change Laboratories (BCCL) to potentially inform more sustained uptake and utilisation of the ICS technology. The ICS, as a socio-technical innovation, seeks to respond to climate change mitigation and adaptation efforts in the country. However, sustained uptake and utilisation has been problematic.', 'files/articles/Experencia Jalasi final thesis.pdf', NULL, 0, NULL, 0, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(4, 'Child Feeding Practices and Factors (Risks) Associated with Provision of Complementary Foods Among Mothers of Children Age 6–23 Months in Dedza District of Central Malawi', NULL, '2017', 'Prevalence of stunting among children in Dedza district of Central Malawi affects 51.1% of underfive children and 47.1% of children aged 6 to 23 months. Evidence shows that appropriate complementary feeding reduces stunting and leads to improved health and growth outcomes. In Dedza district, information on factors contributing to the high prevalence of stunting among children is nonexistent. The study was conducted to investigate infant and young child feeding practices and to identify factors (risks) that might contribute to undernutrition. Findings of the study would assist in identifying strategies for improving child feeding practices and nutritional status in the district. Four community-based focus group discussions (FGDs) with mothers and caregivers were conducted to gain a comprehensive understanding of child feeding practices and the safety of the foods given to the children. We found that the majority of mothers and caregivers had low levels of education and about 80% of mothers prepared complementary foods from maize flour only. Addition of other foods such as beans, soybeans and groundnuts to complementary foods was rare. Timely initiation of complementary feeding was practiced by 77.1% of mothers, 8.6% introduced food earlier and 14.3% introduced later than six months. About 45% of children had diarrhoea which was associated with poor hygiene practices and poor storage of complementary food. Factors leading to poor complementary feeding included lack of food diversity at household level, increased work burden of mothers and caregivers which led to reduced feeding frequency and inadequate knowledge of mothers to process and prepare nutritious complementary food. It is therefore recommended that to reverse the situation, mothers and caregivers should be trained on use of energy and time saving technologies, hygiene practices, food processing, preparation and appropriate child feeding practices.', 'files/articles/Geresomu Factors Affecting child feeding.pdf', '1', 0, 2, 0, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(5, 'RISK FACTORS ASSOCIATED WITH STUNTING AMONG INFANTS AND YOUNG CHILDREN AGED 6 - 23 MONTHS IN DEDZA DISTRICT OF CENTRAL MALAWI', NULL, '2017', 'The prevalence of stunting is high in Malawi, affecting about one third (31.2%) of children aged 6-23 months. Persistent inappropriate feeding practices are some of the major causes of stunting in young children. This study was conducted to determine risk factors associated with stunting among infants and young children aged 6-23 months in Dedza district in Central Malawi. A cross-sectional study was conducted in 12 villages in Mayani Extension Planning Area (EPA), targeting households with children aged 6- 23 months. A structured questionnaire was used to collect data from the primary caregivers on household socioeconomic characteristics, household food availability, dietary diversity, responsive feeding practices among mothers and caregivers, age of introduction of complementary foods, frequency of feeding, types of foods and dietary diversity of children. Anthropometric data (weight and recumbent length) for children were measured using standard procedures. The Multivariate Logistic Regression Analysis was performed to study the independent associations of various determinants on prevalence of stunting with prevalence of stunting as a dependent variable. A total of 303 households were sampled randomly; mothers and caregivers were interviewed and 306 children were assessed for nutritional status. Introduction of complementary food varied among mothers, 9.3% introduced earlier than 6 months, 71.1% at 6 months and 10.2% later than 6 months. Dietary diversity was low but increased significantly with age categories of children, 2.9% for children 6-8 months, 15.5% for 9-11 months and 24.6% for 12-23 months (p<0.01). Minimum meal frequency was significantly (p<0.001) higher in children 6-8 months (58.7%) than in children 12-23 months (1.9%). Overall, out of the 306 children 47.1% [95% CI (41.6-53.1)] were stunted. Stunting was significantly different between male [54.5%; 95% CI (47.0-63.5)] and female (39.5%; 95% CI (31.4-47.6)] children. Age of child when complementary feeding was started [AOR: 0.138; 95% CI (0.22-0.88)], number of young children in the household [AOR: 2.548; 95% CI (1.304-4.981)] and teenage mothers [AOR: 1.265; 95% CI (0.379-1.724)] were significant independent predictors of stunting. It can be concluded that prevalence of stunting is high among infants and young children in Dedza district. Training mothers and caregivers on recommended age of introducing complementary food to a child, composition of such food, dangers of teenage pregnancies and importance of child spacing should form part of nutrition education.', 'files/articles/Geresomu Riskfactors of stunting.pdf', '1', 0, 3, 0, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(6, 'Targeting caregivers with context specific behavior change training increased uptake of recommended hygiene practices during food preparation and complementary feeding in Dedza district of Central Malawi', NULL, '2018', 'The effect of a targeted training intervention on uptake of recommended hygiene practices by caregivers of children 6–23 months was assessed. A sub-sample of 40 mothers from 303 households was used for a detailed study of hygiene practices during preparation of complementary foods after training. Mothers and caregivers were observed for 6 months and evaluated using a questionnaire. Data were analyzed using SPSS and Chi-square test was used to determine the differences in proportions of mothers and caregivers who adopted recommended practices. Results showed significant increase in the proportions of mothers and caregivers who followed recommended hygiene practices after training. There was significant decrease in prevalence of diarrhea among the children (45% to 8.6%). It can be concluded that targeted training on practical hands-on activities such as hand washing, cleaning of cooking and serving utensils, covering of food and water increase adoption of recommended hygiene and sanitation practices.', 'files/articles/Geresomu Targeted Training Paper.pdf', '1', 0, 4, 0, NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(7, 'Productivity and profitability on groundnut (Arachis hypogaea L) and maize (Zea mays L) in a semi-arid area of southern Malawi', NULL, '2018', 'In many parts of Malawi, including Balaka district in Southern Malawi, are prone to erratic rains with poor soil productivity and famer practices. A research and outreach project was initiated in October 2015 to establish learning centres (LCs) of groundnut: maize rotations as an entry point to diversify nutrition and income base of smallholder farmers, while building up on soil fertility for increased resilience to production under climatic variation. Some 132 plots of groundnut were established in 2015/2016 in four sections of Ulongwe Extension Planning Area (EPA) in Balaka district. Of these, 44 fields were sampled for yield, biomass, plant stand and soils data. In the second season of 2016/2017, a maize fertilizer response trial (five rates of NP2O5K2O; 0, 23:21:0+4S, 46:21:0+4S, 69:21:0+4S, and 92:21:0+4S) was super-imposed in plots where farmers incorporated groundnut residues, in comparison with continuous maize from adjacent own field. In the first season, rainfall was below average and erratic, with 10-day dry spells recorded in two of four recording stations. The soils were generally poor, with test values below threshold for many variables including organic matter, nitrogen and phosphorus. Groundnut average yields and standard deviation were 754 (±186) kg/ha, respectively. Plant stands were poor, with up to 24% of the 46 LCs attaining ≤50% of targeted plant stand of 8.88 plants m-2. Poor plant stand is suggested as a major contributor to low yields. Results from the 2016/2017 fertilizer response trials showed linear response of maize to fertilizer application. Yields ranged from an average of 1.47 t/ha without fertilizer application to 4.0 t/ha at 92:21:0+4S. It is concluded that the poor soil fertility, low field plant densities, and dry spells are the main causes of low yields. Gross margins were positive for groundnut yield of 1,000 kg/ha and fertilizer rates on maize of 46:23:0+4S and above', 'files/articles/Kabambe - Productivity and profitability on groundnut and maize.pdf', '1', 0, 5, 0, NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `article_author`
--

DROP TABLE IF EXISTS `article_author`;
CREATE TABLE IF NOT EXISTS `article_author` (
  `article_id` int NOT NULL,
  `author_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_author`
--

INSERT INTO `article_author` (`article_id`, `author_id`) VALUES
(1, 8),
(2, 3),
(2, 4),
(3, 8),
(4, 6),
(4, 11),
(4, 12),
(4, 13),
(5, 6),
(5, 11),
(5, 12),
(5, 13),
(6, 6),
(6, 11),
(6, 12),
(6, 13),
(7, 1),
(7, 2),
(7, 9),
(7, 14),
(7, 16);

-- --------------------------------------------------------

--
-- Table structure for table `article_keyword`
--

DROP TABLE IF EXISTS `article_keyword`;
CREATE TABLE IF NOT EXISTS `article_keyword` (
  `article_id` int NOT NULL,
  `keyword_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_keyword`
--

INSERT INTO `article_keyword` (`article_id`, `keyword_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 7),
(5, 13),
(6, 14),
(6, 8),
(6, 12),
(6, 15),
(6, 16),
(7, 17),
(7, 18),
(7, 19);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campus_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `avatar`, `title`, `firstName`, `middleName`, `lastName`, `biography`, `campus_id`, `department_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'images/avatar.png', NULL, 'Jens', 'B', 'Aune', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(2, 'images/avatar.png', NULL, 'Thabbie', NULL, 'Chilongo', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(3, 'images/avatar.png', NULL, 'Trust', 'Kasambala', 'Donga', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(4, 'images/avatar.png', NULL, 'Ole', 'Martin', 'Eklo', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(5, 'images/avatar.png', NULL, 'Musandji', NULL, 'Fuamba', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(6, 'files/avatars/gerosomo.jpg', NULL, 'Numeri', 'C.', 'Geresomo', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(7, 'images/avatar.png', NULL, 'Heinz', 'Erasmus', 'Jacobs', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(8, 'images/avatar.png', NULL, 'Experencia', 'Madalitso', 'Jalasi', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(9, 'images/avatar.png', NULL, 'Vernom', 'H', 'Kabambe', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(10, 'images/avatar.png', NULL, 'Chikondi', NULL, 'Makwiza', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(11, 'images/avatar.png', NULL, 'Joseph', 'W.', 'Matofari', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(12, 'images/avatar.png', NULL, 'Elizabeth', 'Kamau', 'Mbuthia', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(13, 'images/avatar.png', NULL, 'Agnes', 'M.', 'Mwangwela', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(14, 'images/avatar.png', NULL, 'Amos', 'R', 'Ngwira', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(15, 'images/avatar.png', NULL, 'Friday', NULL, 'Njaya', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(16, 'images/avatar.png', NULL, 'Bishal', 'Kumar', 'Sitaula', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(17, 'images/avatar.png', NULL, 'G', NULL, 'Synnevag', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(18, 'files/avatars/limuwa.jpg', NULL, 'Moses', 'Majid', 'Limuwa', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(19, 'images/avatar.png', 'Assoc Prof', 'Samson', NULL, 'Katengeza', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(20, 'images/avatar.png', 'Dr', 'Joseph', NULL, 'Dzanja', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(21, 'images/avatar.png', 'Prof', 'Moses', NULL, 'Maliro', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(22, 'images/avatar.png', 'Dr', 'Alexander', NULL, 'Kalimbira', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(23, 'images/avatar.png', 'Prof', 'D', NULL, 'Kasamu', NULL, NULL, NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `datasets`
--

DROP TABLE IF EXISTS `datasets`;
CREATE TABLE IF NOT EXISTS `datasets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloadCount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `journal_id` int DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataset_author`
--

DROP TABLE IF EXISTS `dataset_author`;
CREATE TABLE IF NOT EXISTS `dataset_author` (
  `dataset_id` int NOT NULL,
  `author_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataset_keyword`
--

DROP TABLE IF EXISTS `dataset_keyword`;
CREATE TABLE IF NOT EXISTS `dataset_keyword` (
  `dataset_id` int NOT NULL,
  `keyword_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NORAD', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(2, 'World Bank', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(3, 'AAP', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(4, 'CGIAR', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(5, 'BMEL', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(6, 'McKnight', '2022-09-27 19:41:49', '2022-09-27 19:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

DROP TABLE IF EXISTS `journals`;
CREATE TABLE IF NOT EXISTS `journals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `title`, `volume`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Crop Protection', NULL, NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(2, 'Journal of Nutritional Ecology and Food Research', '4', NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(3, 'African Journal of Food, Agriculture, Nutrition and Development', '17', NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(4, 'Ecology of Food and Nutrition', '57', NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(5, 'African Journal of Agricultural Research', '13', NULL, '2022-09-27 19:41:48', '2022-09-27 19:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pesticides Exposure', 'pesticides-exposure', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(2, 'Sugarcane', 'sugarcane', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(3, 'Environment Load', 'environment-load', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(4, 'EIQ', 'eiq', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(5, 'Complementary Food', 'complementary-food', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(6, 'Malnutrition', 'malnutrition', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(7, 'Meal Frequency', 'meal-frequency', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(8, 'Hygiene Practices', 'hygiene-practices', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(9, 'Diarrhoea', 'diarrhoea', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(10, 'Nutritional Status', 'nutritional-status', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(11, 'Dietary Diversity', 'dietary-diversity', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(12, 'Complementary Feeding', 'complementary-feeding', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(13, 'Responsive Feeding', 'responsive-feeding', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(14, 'Adoption', 'adoption', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(15, 'Sanitation', 'sanitation', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(16, 'Targeted Training', 'targeted-training', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(17, 'Groundnut-maize Rotation', 'groundnut-maize-rotation', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(18, 'Nitrogen Response', 'nitrogen-response', '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(19, 'Drought Spells', 'drought-spells', '2022-09-27 19:41:49', '2022-09-27 19:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_20_141522_create_articles_table', 1),
(6, '2022_05_20_141549_create_datasets_table', 1),
(7, '2022_05_20_141619_create_journals_table', 1),
(8, '2022_05_20_141648_create_authors_table', 1),
(9, '2022_05_20_143123_create_article_author_table', 1),
(10, '2022_05_20_143151_create_dataset_author_table', 1),
(11, '2022_05_21_073134_create_keywords_table', 1),
(12, '2022_05_21_073655_create_article_keyword_table', 1),
(13, '2022_05_21_073720_create_dataset_keyword_table', 1),
(14, '2022_08_06_212725_create_types_table', 1),
(15, '2022_08_18_203216_create_projects_table', 1),
(16, '2022_08_18_205207_create_donors_table', 1),
(17, '2022_08_19_150129_create_project_author_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` double NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `author_id` int NOT NULL,
  `donor_id` int NOT NULL,
  `deliverables` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `photo`, `name`, `description`, `duration`, `startDate`, `endDate`, `currency`, `budget`, `verified`, `author_id`, `donor_id`, `deliverables`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'files/projects/smartex.jpg', 'SMARTEX', 'Collaborative project between Norwegian University of Life Sciences (NMBU) and Lilongwe University of Agriculture and Natural Resources (LUANAR).', '2 Years', '2021', '2023', '$', 3400, 0, 19, 1, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(2, 'files/projects/ace.jpg', 'ACE II', 'Collaborative project with Governments of Malawi and Mozambique, the World Bank, IUCEA and RUFORUM.', '', '', '', '$', 6000000, 0, 23, 2, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(3, 'files/projects/mwasip.jpg', 'MWASIP', 'Collaborative project of The World Bank, Malawi Government and Lilongwe University of Agriculture and Natural Resources (LUANAR).', '5 Years', '2019', '2024', '$', 157000000, 0, 19, 2, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(4, 'files/projects/foodma.jpg', 'FOODMA', 'Collaborative project with the Norwegian University of Life Sciences (NMBU) through the Sustainable Food Systems in Malawi (FoodMa).', '5 Years', '2019', '2024', '$', 50000000, 0, 18, 1, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(5, 'files/projects/pira.jpg', 'PIRA', 'Collaborative project between Alliance for African Partnership (AAP),Michigan State University and LUANAR.', '2 Years', '2021', '2023', '$', 200000, 0, 19, 3, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(6, 'files/projects/nutrition.jpg', 'Nutrition 4 Health', 'Collaborative project with United States Agency for International Development (USAID), Civil Society Organization Nutrition Alliance (CSONA) and LUANAR.', '', '', '', '$', 15000000, 0, 22, 1, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(7, 'files/projects/cip.jpg', 'CIP', 'Collaborative project with International Potato Center (CIP) and Lilongwe University of Agriculture and Natural Resources.', '2 Years', '2021', '2023', '$', 14000, 0, 19, 4, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(8, 'files/projects/baobab.jpg', 'BAOBAB Project', 'Collaborative project with German Federal Ministry of Food and Agriculture (BMEL), Humboldt University of Berlin, Jomo Kenyatta University of Agriculture and Technology.', '2 Years', '2019', '2022', '$', 14000, 0, 20, 5, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49'),
(9, 'files/projects/seed.jpg', 'Seed System Project', 'Collaborative project with McKnight foundation, Michigan State University, Malawi Government and self help Africa. ', '2 Years', '2019', '2022', '$', 345000, 0, 21, 6, '[]', NULL, '2022-09-27 19:41:49', '2022-09-27 19:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_author`
--

DROP TABLE IF EXISTS `project_author`;
CREATE TABLE IF NOT EXISTS `project_author` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `author_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_author`
--

INSERT INTO `project_author` (`id`, `project_id`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL),
(2, 1, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Journal Article', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(2, 'Book Chapter', '2022-09-27 19:41:48', '2022-09-27 19:41:48'),
(3, 'Proceedings', '2022-09-27 19:41:48', '2022-09-27 19:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
