-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 07:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkedhill`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `phone`, `email_verified_at`, `password`, `is_active`, `featured_image`, `remember_token`, `verified`, `logo`, `website`, `address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'nectardigit', 'nectardigit@gmail.com', '98022', NULL, NULL, '$2y$10$esaeH6ncKS.32MQlT.YdRe9JvmIezo/CyxPEzFY//UqBSk7sabqeq', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-08-17 03:27:40', '2022-08-17 03:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `section` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'size of advertisement',
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Promotional or advertisement',
  `count` int(11) NOT NULL DEFAULT 0,
  `show_on` enum('mobile','web','both') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'both',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `image`, `title`, `external_url`, `page`, `section`, `size`, `direction`, `type`, `count`, `show_on`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8000/storage/photos/1/1832562768nepal-telecome-aid-top-banner-aid2022-01-24-13-17-56.gif', 'Home ads', 'https://www.youtube.com/', 'home', 'home_header', 0, 'top', NULL, 0, 'web', 1, NULL, '2022-08-17 04:11:48', '2022-08-17 04:11:48'),
(2, 'http://127.0.0.1:8000/storage/photos/1/ads2.jpg', 'Property ads', 'https://www.youtube.com/', 'property', 'property_header', 0, 'top', NULL, 0, 'web', 1, NULL, '2022-08-17 04:12:14', '2022-08-17 04:12:14'),
(3, 'http://127.0.0.1:8000/storage/photos/1/download.jpg', 'news', 'https://www.youtube.com/', 'news', 'news_header', 0, 'top', NULL, 0, 'web', 1, NULL, '2022-08-17 04:12:42', '2022-08-17 04:12:42'),
(4, 'http://127.0.0.1:8000/storage/photos/1/ads1.jpg', 'blog ads', 'https://www.youtube.com/', 'blog', 'blog_header', 0, 'top', NULL, 0, 'web', 1, NULL, '2022-08-17 04:13:25', '2022-08-17 04:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `agency_details`
--

CREATE TABLE `agency_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'individual,company',
  `agency_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'verified,unverified,rejected,blocked',
  `status_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_pan_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `short_intro` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agency_property`
--

CREATE TABLE `agency_property` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gym', 'gym', NULL, NULL, NULL),
(2, 'School', 'school', NULL, NULL, NULL),
(3, 'church', 'church', NULL, NULL, NULL),
(4, 'park', 'park', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_reviews`
--

CREATE TABLE `app_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT 5.0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `city_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'dharahara', 'dharahara', '2022-08-17 03:27:41', '2022-08-17 03:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('blog','news') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blog',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `viewCount` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `type`, `slug`, `title`, `sub_title`, `image`, `description`, `meta_keyword`, `meta_description`, `featured`, `viewCount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'blog', 'new-blog', 'New blog', NULL, 'http://127.0.0.1:8000/storage/photos/1/unnamed.png', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'New blog', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its lay...', 0, 1, NULL, '2022-08-17 03:54:19', '2022-08-17 03:54:19'),
(2, 'blog', 'kathmandu-post', 'Kathmandu post', NULL, 'http://127.0.0.1:8000/storage/photos/1/thumb.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Kathmandu post', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its lay...', 0, 1, NULL, '2022-08-17 03:54:57', '2022-08-17 03:54:57'),
(3, 'blog', 'fastival-blog', 'Fastival blog', NULL, 'http://127.0.0.1:8000/storage/photos/1/bhairavpyakhanachamadhyapurthimibhaktapur03-1782022062640-1000x0.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Fastival blog', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its lay...', 0, 1, NULL, '2022-08-17 03:56:25', '2022-08-17 03:56:25'),
(4, 'news', 'nepses-down-trend-continue', 'nepse\'s down trend continue', NULL, 'http://127.0.0.1:8000/storage/photos/1/STOCK-MARKET.jpg', '<p>today market is going down further to break previous low . lets see how much point loose by nepse today .</p>', 'nepse\'s down trend continue', 'today market is going down further to break previous low . lets see how much point loose by nepse today .', 0, 1, NULL, '2022-08-17 04:00:33', '2022-08-17 04:00:33'),
(5, 'blog', 'ya-hana-sasata-malyama-jagaga-kanana-paina-sahara-unamakha-thau-jaha-jagaga-kanatha-chhata-samayama-hanasakachha-thabbra', 'यी हुँन सस्तो मूल्यमा जग्गा किन्न पाइने सहर उन्मुख ठाउँ, जहाँ जग्गा किन्दा छोटो समयमै हुनसक्छ दोब्बर', NULL, 'http://127.0.0.1:8000/storage/photos/1/untitled.png', '<p>काठमाडौं। पहिले पहिले घरजग्गाको खरिदबिक्रि खेतीपाती र बसोबास गर्ने प्रयोजनका लागि मात्रै हुन्थ्यो। २/३ दशक यता व्यापारिक प्रयोजनका लागि पनि घरजग्गाको किनबेच भइरहेको पाइन्छ।</p><p>तर आजभोलि भने घरजग्गा लगानीको राम्रो क्षेत्र बनिसकेको छ। व्यवसायिहरुले पनि कुनैपनि व्यवसाय गर्दा बढी भन्दा बढी नाफा हुने क्षेत्र हेर्छन्।</p><p>त्यसैले पछिल्लो एक दशक देखि सिमित घरजग्गा व्यवसायिहरुले यो क्षेत्रबाट मनग्गे नाफा पनि कमाइरहेका छन्। त्यसको सिको गर्दै आजभोलि २/४ जना साथिहरु मिलेर एउटा प्लट जग्गा किन्ने र त्यसलाई प्लटिङ गरेर बिक्रि वितरण गर्ने चलन पनि बढ्दो छ।</p><p>तर म एक्लै जग्गा किन्छु र यसबाट नाफा गर्छु भन्ने मानिसहरुका लागि महंगिका कारण सबै ठाउँमा जग्गा किन्न सम्भव छैन। गाउँका दूरदराजका कुना काप्चाको जग्गामा लगानी गर्दा छोटो समयमा कुनैपनि लाभ लिन सकिदैन।</p><p>यहाँ केहि यस्ता ठाउँहरुको वारेमा जानकारी दिदै छौ जहाँ घरजग्गामा लगानी गर्न सके पछाडी फर्केर हेर्नु पर्दैन।</p><p>प्रदेश १</p><p>प्रदेश १ मा झापा, मोरङ र सुनसरी अहिले घरजग्गा कारोबारका लागि हटस्पट बनिरहेका छन्। यहाँ मासिक ३/४ हजार घरजग्गाको किनबेच हुनु सामान्य भइसकेको छ। जुन संख्यातमक हिसाबले देशका कुनै पनि ठाउँको भन्दा सबैभन्दा धेरै हो।</p><p>झापामा भद्रपुर, सुनसरीमा इटहरी र मोरङमा बेलबारी घरजग्गा कारोबारका लागि सम्भावना बोकेका ठाउँ हुन्। इटहरी उपमहानगरपालिका हो भने दमक र बेलबारी नगरपालिका मात्रै हुन्। संघियताको कार्यान्वयनपछि यी ठाउँको सम्भावना झनै बढेको हो। जनसंख्या र सहरी पूर्वाधारको मापदण्ड पुगेको खण्डमा यी ठाउँ उपमहानगर वा महानगरपालिका बन्न सक्ने ठाउँ हुन्।</p><p>यी नगरपालिकामा गाभिएका साबिकका गाविसहरुमा अहिले पनि प्रतिकठ्ठा दुई देखि पाँच लाख रुपैयाँ सम्ममा सहजै जग्गा किन्न सकिन्छ। जहाँ बाटो खोलेर दिने हो भने घडेरी जग्गा तत्कालै प्रति कठ्ठा १० लाख रुपैयाँमा किनबेच गर्न सकिन्छ।</p><p>प्रदेश २</p><p>अहिले प्रदेश २ मा जनकपुर, सप्तरी, महोत्तरी र सिराहा घरजग्गा कारोबारका लागि हटस्पट हुन्। यहाँ मासिक एक हजार देखि दुई हजार सम्म घरजग्गा किनबेच भइरहेका छन्।</p><p>धनुषामा जनकपुर, सप्तरीमा राजविराज, महोत्तरीमा जलेश्वर र सिराहमा लहान शहर उन्मुख बजार घरजग्गा किनबेचका लागि उपयुक्त हुन सक्छन्। जनपुर उपमहानगरपालिका हो भने अरु सबै नगरपालिका मात्रै हुन्। यी ठाउँमा पनि प्रतिकठ्ठा २ देखि ५ लाख रुपैयाँ सम्ममा बजार नजिक खेतहरु पाइन्छन्। जसलाई एक वर्ष राखेर खेतकै रुपमा बेच्दा पनि राम्रो राम्रो प्रतिफल पाउन सकिन्छ। घडेरीको रुपमा बेच्दा थप लाभ पाउन पनि सकिन्छ।</p><p>बागमति प्रदेश&nbsp;</p><p>प्रदेश ३ मा चितवन, मकवानपुर, धादिङ, काठमाडौं र काभ्रेपलाञ्चोक घरजग्गामा लगानी गर्न उपयुक्त ठाउँ हुन्। यहाँ पनि कमासिक रुपमा एक हजार देखि २५ सय सम्म घरजग्गा किनबेच हुन्छन्।</p><p>काठमाडौं उपत्यकामा घरजग्गा जोड्न ठूलै पुँजि चाहिन्छ। यहाँ न्युतम प्रति आना १० लाख रुपैयाँ देखि १० करोड रुपैयाँ सम्मका घरजग्गा किनबेच हुन्छन्।</p><p>तर काठमाडौ बाहेकका यी अन्य ठाउँमा भने प्रति रोपनी ५ देखि १० लाख रुपैयाँमै घरजग्गामा लगानी गर्न सकिन्छ।</p><p>यी ठाउँमा मुख्य मुख्य बजारमा महंगो भएपनि नगरभित्र पर्ने अन्य ठाउँमा सस्तैमा जग्गा किन्न सकिन्छ। जहाँ वर्षेनी जग्गाको मूल्य बढेको बढेई भइरहेकोले तपाइको लागनीले राम्रो प्रतिफल दिने पक्का छ।</p><p>गण्डकी प्रदेश</p><p>गण्डकी प्रदेशमा पोखरा सबै हिसाबले सम्भावना बोकेको ठाउँ हो। पोखरा महानगरपालिकामा जग्गा जोड्न काठमाडौं जतिकै महँगो छ। तर पोखरामा पनि लेखनाथमा भने सस्तैमा जग्गा किन्न सकिन्छ।</p><p>पछिल्लो समय पोखरा पछि तनहुँ घरजग्गा किनबेचको हटस्पट बनिरहेको छ। तनहुँमा प्रति रोपनी ५ देखि १० लाख रुपैयाँ सम्ममा राम्रै जग्गाहरु किन्न सकिन्छ। तनहुँ सदरमुकाम दमौली भने महँगो मध्यकै एक ठाउँ हो। तर दमौली आसपासका ठाउँमा भने सस्तो मूल्यमा पनि घरजग्गा जोड्न सकिन्छ।</p><p>यी ठाउँमा पनि अहिले मासिक एक देखि दुई हजार सम्म घरजग्गा किनबेच भइरहेका छन्।</p><p>लुम्बिनी प्रदेश</p><p>लुम्बिनी प्रदेशमा बुटवल, भैरहवा, दाङ र नेपालगञ्ज घरजग्गा किनबेचका लागि हटस्पट हुन्। बुटवल, दाङ र नेपालगञ्ज उपमहानगरपालिका समेत हुन्।</p><p>यहाँ मासिक एक हजार देखि दुई हजार २५ सय सम्म घरजग्गा किनबेच भइरहेका छन्।</p><p>भैरहवामा अन्तरार्ष्ट्रिय विमानस्थल देखि औद्योगिक हव सम्म बनिसकेकोले भैरहवा र बुटवल वरपर समेत जग्गाको मूल्य तिब्र रुपमा बढिरहेको छ। दाङ र नेपालगञ्ज&nbsp;(कोहलपुर बजार) भने पहाडी जिल्लाबाट बसाई सराई गर्नेको रोजाइमा पर्ने हुँदा यहाँ पनि दिनदिनै मूल्य महंगिदै गएको छ।</p><p>बजार क्षेत्रमा यहाँ पनि मूल्य धेरै बढीसकेकाले बजारबाट १/२ किलोमिटर वरपर घरजग्गा किन्दा तिब्र रुपमा मूल्य बढ्ने सम्भावना हुन्छ। यहाँ २/३ लाख देखि ५/६ लाख रुपैयाँ प्रतिकठ्ठाका दरले घरजग्गा किन्न सकिन्छ।</p><p>कर्णाली प्रदेश</p><p>कर्णाली प्रदेशमा भने सुर्खेत घरजग्गाको मूल्य बृद्धिका हिसाबले उपयुक्त ठाउँ हो। यहाँ जग्गाको किनबेच मिटरका हिसाबले हुन थालेको छ। प्रति मिटर एक लाख रुपैयाँ देखि १० लाख रुपैयाँ सम्मका घरजग्गा किनेबच भइरहेका छन्।</p><p>सुर्खेतमा पनि मासिक एक हजार बढी घरजग्गा किनबेच हुने गरेका छन्।</p><p>सुदूरपश्चिम प्रदेश</p><p>सुदूरपश्चिम प्रदेशमा धनगढी र महेन्द्रनगर घरजग्गा किनबेचका लागि हटस्पट हुन्। धनगढी उपमहानगरपालिका हो भने महेन्द्रनगर नगरपालिका हो। यहाँ पनि मासिक एक हजार देखि १५ सय सम्म घरजग्गा किनबेच हुने गरेका छन्।</p><p>सिंगो सुदूरपश्चिममा तराईमा पर्ने दुई जिल्ला मात्रै भएको र आर्थिक गतिविधिको केन्द्र भएकाले धनगढी र महेन्द्रजगरमा घरजग्गाको मूल्य तिब्र रुपमा बढिरहेको छ।</p><p>यहाँ प्रति कठ्ठा पाँच देखि १० लाख रुपैयाँ सम्ममा बजार वरपर जग्गा किन्न सकिन्छ। जहाँ बाटो विकास गरेर घडेरीको रुपमा विकास गर्न सके छोटो समयमै राम्रो प्रतिफल पाइने पक्का छ।</p>', 'यी हुँन सस्तो मूल्यमा जग्गा किन्न पाइने सहर उन्मुख ठाउँ, जहाँ जग्गा किन्दा छोटो समयमै हुनसक्छ दोब्बर', 'काठमाडौं। पहिले पहिले घरजग्गाको खरिदबिक्रि खेतीपाती र बसोबास गर्ने प्रयोजनका लागि मात्रै हुन्थ्यो। २/३ दशक यता व्यापारिक...', 0, 2, NULL, '2022-08-17 04:02:04', '2022-08-17 04:02:18'),
(6, 'blog', 'aana-bhanara-kanaka-jagaga-faldama-aana-matara-bhataya-ya-hana-napasaga-samabnathhata-janana-parana-kara', '४ आना भनेर किनेको जग्गा फिल्डमा ३ आना मात्रै भेटियो ? यी हुन् नापीसँग सम्बन्धीत जान्नै पर्ने ५ कुरा', NULL, 'http://127.0.0.1:8000/storage/photos/1/poperty.jpg', '<p>बैशाख ८, काठमाडौं । तपाईंले लालपूर्जामा तोकेको क्षेत्रफल अनुसार जग्गा किन्दा फिल्डमा कम जग्गा पाउनु भएको छ&nbsp;?</p><p>लालपूर्जामा लेखे अनुसार फिल्डमा जग्गा भेटिएन भने आफ्नो जग्गा कसरी पुर्‍याउने&nbsp;? सकेसम्म त पूर्जा र फिल्डमा समान क्षेत्रफल एकिन गराएर मात्रै जग्गा किन्नु राम्रो हो ।</p><p>तर तपाईंले जग्गा व्यवसायी वा आफन्तको विश्वासमा फिल्ड ननापेरै जग्गा किनिसक्नु भयो र फिल्डमा थोरै जग्गा पाइयो भने तपाईंले नापी कार्यालयमा निवेदन दिएर पुनः नापजाँच गराउन सक्नु हुन्छ ।</p><p><strong>जग्गा पुनः नाप्नको लागि के गर्नुपर्छ त&nbsp;?&nbsp;</strong></p><p>नापी विभागका निर्देशक दामोदर ढकालका अनुसार फिल्डमा जग्गा कम भएमा नापी कार्यालयमा निवेदन दिनुपर्छ । अहिले जग्गा नापजाँचको लागि दिने निवेदनको ढाँचा विभाग र नापी कार्यालयको वेवसाइटमा पाइन्छ । निवेदनको ढाँचा पाउनु भएन भने हातैले लेखेको निवेदन दर्ता गराएर पनि काम लिन सकिने ढकालको भनाइ छ ।</p><p>तर निवेदनको साथमा सम्बन्धित जग्गा धनीको नागरिकताको फोटोकपी, लालपूर्जाको फोटोकपी र जग्गाको मालपोत तिरेको रसिदको फोटोकपी पनि बुझाउनुपर्ने नापी कार्यालय धनगढिका प्रवक्ता नवराज अधिकारीले बताए ।</p><p>निवेदन दिइसकेपछि नापी कार्यालयले कार्यालयबाट जग्गा रहेको ठाउँ सम्मको दुरीका आधारमा राजस्व निर्धारण गर्छ । उक्त राजस्व तिरेको रसिद नापी कार्यालयमा छोडेपछि तपाईंको निवेदन पाइपलाइनमा बस्छ ।</p><p><strong>रुपैयाँ र समय कति लाग्छ&nbsp;?</strong></p><p>अन्य व्यक्तिको निवेदन नभएमा र नजिकै जग्गा रहेको खण्डमा भोलिपल्टै गएर नापी कार्यालयका कर्मचारीले जग्गा नापजाँच गरिदिन्छन् ।</p><p>तर पाइपलाइनमा धेरै निवेदन भएको खण्डमा भने तपाईंको पालो आउने २/३ हप्तासम्म पनि लाग्न सक्छ ।&nbsp;सामान्यतया निवेदन दिएको एक/डेढ हप्ताभित्रै जग्गा नापजाँच भइसक्ने अधिकारीको भनाइ छ ।</p><p>नापी कार्यालयले नजिकै रहेका जग्गा नाप्न न्यूनतम २ हजार ५०० रुपैयाँ राजस्व लिन्छ । जग्गा रहेको ठाउँ धेरै टाढा भएमा यो रकम बढ्दै जान्छ ।</p><p>&nbsp;</p><p><strong>लालपूर्जामा उल्लेख भएकै जति जग्गा पाइन्छ&nbsp;?</strong></p><p>नापी कार्यालयको अमिनले नापेर छुट्ट्याएको जग्गा नै तपाईंको अन्तिम जग्गा हुन्छ । कहिलेकाँही तपाईंको जग्गा बढ्न पनि सक्छ र कहिलेकाँही जग्गा घट्न पनि सक्छ ।</p><p>&nbsp;</p><p>सकेसम्म लालपूर्जामा उल्लेख भए अनुसार जग्गा किन्नु भन्दा अघि नै फिल्डमा जग्गा नापेर लिनु भयो भने राम्रो हुन्छ । यसरी फिल्डमा नापेर जग्गा किन्दा कम रहेछ भने तपाईंले कम जग्गाकै मूल्य हाल्न सक्नुहुन्छ । तर पछि नाप्दा कम जग्गा देखियो भने तपाईंले पैसा फिर्ता पाउने सम्भावना रहँदैन ।</p><p>&nbsp;</p><p><strong>सँदियारले नमानेमा के गर्ने&nbsp;?</strong></p><p>अमिनले जग्गा नाप्दा तपाईंको जग्गा दाँया बाँया परेको रहेछ भने उनीहरूले जग्गा देखाइ दिन्छन् । तर सँदियारले उपभोग गर्दै आएको जग्गा छोड्दैन भनेर झगडा गर्न थाले भने अमिनले केही पनि गर्न सक्दैनन् ।</p><p>त्यस्तो बेलामा वडा कार्यालय, गाउँ/नगरपालिका र प्रहरी प्रशासन बसेर मिलाउने प्रयास गर्नुपर्छ । त्यति गर्दा पनि तपाईंको सँदियारले नमानेमा भने जिल्ला अदालतमा गएर मुद्दा चलाउनुपर्छ । त्यसपछि अदालतको फैसला अनुसार प्रहरी प्रशासनले तपाईंको जग्गा छुट्ट्याईदिन्छ । सँदियारले फेरीपनि नमानेको खण्डमा उसलाई जरिवाना र कैद हुन सक्छ ।</p>', '४ आना भनेर किनेको जग्गा फिल्डमा ३ आना मात्रै भेटियो ? यी हुन् नापीसँग सम्बन्धीत जान्नै पर्ने ५ कुरा', 'बैशाख ८, काठमाडौं । तपाईंले लालपूर्जामा तोकेको क्षेत्रफल अनुसार जग्गा किन्दा फिल्डमा कम जग्गा पाउनु भएको छ&nbsp;?लालपूर्...', 0, 1, NULL, '2022-08-17 04:03:37', '2022-08-17 04:03:37'),
(7, 'news', 'political-news', 'Political news', NULL, 'http://127.0.0.1:8000/storage/photos/1/gathabandhan-3132022034459-1000x0.jpg', '<p><strong>जग्गा पुनः नाप्नको लागि के गर्नुपर्छ त&nbsp;?&nbsp;</strong></p><p>नापी विभागका निर्देशक दामोदर ढकालका अनुसार फिल्डमा जग्गा कम भएमा नापी कार्यालयमा निवेदन दिनुपर्छ । अहिले जग्गा नापजाँचको लागि दिने निवेदनको ढाँचा विभाग र नापी कार्यालयको वेवसाइटमा पाइन्छ । निवेदनको ढाँचा पाउनु भएन भने हातैले लेखेको निवेदन दर्ता गराएर पनि काम लिन सकिने ढकालको भनाइ छ ।</p><p>तर निवेदनको साथमा सम्बन्धित जग्गा धनीको नागरिकताको फोटोकपी, लालपूर्जाको फोटोकपी र जग्गाको मालपोत तिरेको रसिदको फोटोकपी पनि बुझाउनुपर्ने नापी कार्यालय धनगढिका प्रवक्ता नवराज अधिकारीले बताए ।</p><p>निवेदन दिइसकेपछि नापी कार्यालयले कार्यालयबाट जग्गा रहेको ठाउँ सम्मको दुरीका आधारमा राजस्व निर्धारण गर्छ । उक्त राजस्व तिरेको रसिद नापी कार्यालयमा छोडेपछि तपाईंको निवेदन पाइपलाइनमा बस्छ ।</p><p><strong>रुपैयाँ र समय कति लाग्छ&nbsp;?</strong></p><p>अन्य व्यक्तिको निवेदन नभएमा र नजिकै जग्गा रहेको खण्डमा भोलिपल्टै गएर नापी कार्यालयका कर्मचारीले जग्गा नापजाँच गरिदिन्छन् ।</p><p>तर पाइपलाइनमा धेरै निवेदन भएको खण्डमा भने तपाईंको पालो आउने २/३ हप्तासम्म पनि लाग्न सक्छ ।&nbsp;सामान्यतया निवेदन दिएको एक/डेढ हप्ताभित्रै जग्गा नापजाँच भइसक्ने अधिकारीको भनाइ छ ।</p><p>नापी कार्यालयले नजिकै रहेका जग्गा नाप्न न्यूनतम २ हजार ५०० रुपैयाँ राजस्व लिन्छ । जग्गा रहेको ठाउँ धेरै टाढा भएमा यो रकम बढ्दै जान्छ ।</p><p>&nbsp;</p><p><strong>लालपूर्जामा उल्लेख भएकै जति जग्गा पाइन्छ&nbsp;?</strong></p><p>नापी कार्यालयको अमिनले नापेर छुट्ट्याएको जग्गा नै तपाईंको अन्तिम जग्गा हुन्छ । कहिलेकाँही तपाईंको जग्गा बढ्न पनि सक्छ र कहिलेकाँही जग्गा घट्न पनि सक्छ ।</p><p>&nbsp;</p><p>सकेसम्म लालपूर्जामा उल्लेख भए अनुसार जग्गा किन्नु भन्दा अघि नै फिल्डमा जग्गा नापेर लिनु भयो भने राम्रो हुन्छ । यसरी फिल्डमा नापेर जग्गा किन्दा कम रहेछ भने तपाईंले कम जग्गाकै मूल्य हाल्न सक्नुहुन्छ । तर पछि नाप्दा कम जग्गा देखियो भने तपाईंले पैसा फिर्ता पाउने सम्भावना रहँदैन ।</p><p>&nbsp;</p><p><strong>सँदियारले नमानेमा के गर्ने&nbsp;?</strong></p><p>अमिनले जग्गा नाप्दा तपाईंको जग्गा दाँया बाँया परेको रहेछ भने उनीहरूले जग्गा देखाइ दिन्छन् । तर सँदियारले उपभोग गर्दै आएको जग्गा छोड्दैन भनेर झगडा गर्न थाले भने अमिनले केही पनि गर्न सक्दैनन् ।</p><p>त्यस्तो बेलामा वडा कार्यालय, गाउँ/नगरपालिका र प्रहरी प्रशासन बसेर मिलाउने प्रयास गर्नुपर्छ । त्यति गर्दा पनि तपाईंको सँदियारले नमानेमा भने जिल्ला अदालतमा गएर मुद्दा चलाउनुपर्छ । त्यसपछि अदालतको फैसला अनुसार प्रहरी प्रशासनले तपाईंको जग्गा छुट्ट्याईदिन्छ । सँदियारले फेरीपनि नमानेको खण्डमा उसलाई जरिवाना र कैद हुन सक्छ ।</p>', 'Political news', 'जग्गा पुनः नाप्नको लागि के गर्नुपर्छ त&nbsp;?&nbsp;नापी विभागका निर्देशक दामोदर ढकालका अनुसार फिल्डमा जग्गा कम भएमा नापी...', 0, 1, NULL, '2022-08-17 04:06:31', '2022-08-17 04:06:31'),
(8, 'news', 'kantipur-news', 'Kantipur news', NULL, 'http://127.0.0.1:8000/storage/photos/1/unnamed.png', '<p>बैशाख ८, काठमाडौं । तपाईंले लालपूर्जामा तोकेको क्षेत्रफल अनुसार जग्गा किन्दा फिल्डमा कम जग्गा पाउनु भएको छ&nbsp;?</p><p>लालपूर्जामा लेखे अनुसार फिल्डमा जग्गा भेटिएन भने आफ्नो जग्गा कसरी पुर्‍याउने&nbsp;? सकेसम्म त पूर्जा र फिल्डमा समान क्षेत्रफल एकिन गराएर मात्रै जग्गा किन्नु राम्रो हो ।</p><p>तर तपाईंले जग्गा व्यवसायी वा आफन्तको विश्वासमा फिल्ड ननापेरै जग्गा किनिसक्नु भयो र फिल्डमा थोरै जग्गा पाइयो भने तपाईंले नापी कार्यालयमा निवेदन दिएर पुनः नापजाँच गराउन सक्नु हुन्छ ।</p><p><strong>जग्गा पुनः नाप्नको लागि के गर्नुपर्छ त&nbsp;?&nbsp;</strong></p><p>नापी विभागका निर्देशक दामोदर ढकालका अनुसार फिल्डमा जग्गा कम भएमा नापी कार्यालयमा निवेदन दिनुपर्छ । अहिले जग्गा नापजाँचको लागि दिने निवेदनको ढाँचा विभाग र नापी कार्यालयको वेवसाइटमा पाइन्छ । निवेदनको ढाँचा पाउनु भएन भने हातैले लेखेको निवेदन दर्ता गराएर पनि काम लिन सकिने ढकालको भनाइ छ ।</p><p>तर निवेदनको साथमा सम्बन्धित जग्गा धनीको नागरिकताको फोटोकपी, लालपूर्जाको फोटोकपी र जग्गाको मालपोत तिरेको रसिदको फोटोकपी पनि बुझाउनुपर्ने नापी कार्यालय धनगढिका प्रवक्ता नवराज अधिकारीले बताए ।</p>', 'Kantipur news', 'बैशाख ८, काठमाडौं । तपाईंले लालपूर्जामा तोकेको क्षेत्रफल अनुसार जग्गा किन्दा फिल्डमा कम जग्गा पाउनु भएको छ&nbsp;?लालपूर्...', 0, 1, NULL, '2022-08-17 04:07:15', '2022-08-17 04:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-08-17 03:54:19', '2022-08-17 03:54:19'),
(2, 2, 1, '2022-08-17 03:54:57', '2022-08-17 03:54:57'),
(3, 3, 1, '2022-08-17 03:56:25', '2022-08-17 03:56:25'),
(4, 4, 2, '2022-08-17 04:00:33', '2022-08-17 04:00:33'),
(5, 5, 1, '2022-08-17 04:02:04', '2022-08-17 04:02:04'),
(6, 6, 1, '2022-08-17 04:03:37', '2022-08-17 04:03:37'),
(7, 7, 2, '2022-08-17 04:06:31', '2022-08-17 04:06:31'),
(8, 8, 2, '2022-08-17 04:07:15', '2022-08-17 04:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('blog','news') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blog',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` tinyint(1) NOT NULL DEFAULT 0,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `name`, `slug`, `image`, `feature`, `meta_keyword`, `meta_title`, `meta_description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'blog', 'Blog', 'blog', NULL, 1, NULL, NULL, NULL, NULL, '2022-08-17 03:53:24', '2022-08-17 03:53:24'),
(2, 'news', 'News', 'news', NULL, 1, NULL, NULL, NULL, NULL, '2022-08-17 03:57:39', '2022-08-17 03:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `chat_categories`
--

CREATE TABLE `chat_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isQuery` tinyint(1) NOT NULL DEFAULT 0,
  `publish_status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isMainMenu` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order` mediumint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_category_references`
--

CREATE TABLE `chat_category_references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `references` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `order` mediumint(9) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversationId` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messageFrom` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `message_by` enum('bot','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bot' COMMENT 'if  message by bot condition',
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_seen` enum('seen','unseen') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'seen',
  `receiver_seen` enum('seen','unseen') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unseen',
  `sender_action` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `receiver_action` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `messageIn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'en/np/lang',
  `sender_seen_at` timestamp NULL DEFAULT NULL,
  `receiver_seen_at` timestamp NULL DEFAULT NULL,
  `adminId` bigint(20) UNSIGNED DEFAULT NULL,
  `questionId` bigint(20) UNSIGNED DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_in_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `image`, `feature_in_homepage`, `district`, `meta_keyword`, `meta_title`, `meta_description`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Sundhara', 'sundhara', NULL, 1, '28', NULL, NULL, NULL, 3, '2022-08-17 03:27:40', '2022-08-17 03:27:40'),
(2, 'Bayalpata', 'bayalpata', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:46', '2022-08-17 03:27:46'),
(3, 'Bhatakatiya', 'bhatakatiya', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:46', '2022-08-17 03:27:46'),
(4, 'Chaurpati', 'chaurpati', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(5, 'Dhakari', 'dhakari', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(6, 'Jayagadh', 'jayagadh', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(7, 'Kalagaun', 'kalagaun', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(8, 'Kamal bazar', 'kamal-bazar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(9, 'Kuchikot', 'kuchikot', 'https://source.unsplash.com/6yBAQeeNROU', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(10, 'Mellekh', 'mellekh', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(11, 'Srikot', 'srikot', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(12, 'Thanti', 'thanti', 'https://source.unsplash.com/u3aYUsaHT20', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(13, 'Turmakhad', 'turmakhad', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '71', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(14, 'Dehimandau', 'dehimandau', 'https://source.unsplash.com/xyE1p1rG04U', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(15, 'Dhungad', 'dhungad', 'https://source.unsplash.com/u3aYUsaHT20', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(16, 'Dilasaini', 'dilasaini', 'https://source.unsplash.com/6yBAQeeNROU', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(17, 'Gajari Changgad', 'gajari-changgad', 'https://source.unsplash.com/xyE1p1rG04U', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(18, 'Kesharpur', 'kesharpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(19, 'Khodpe', 'khodpe', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(20, 'Mulkhatali', 'mulkhatali', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(21, 'Patan', 'patan', 'https://source.unsplash.com/xyE1p1rG04U', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(22, 'Purchaudihat', 'purchaudihat', 'https://source.unsplash.com/u3aYUsaHT20', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(23, 'Sharmali', 'sharmali', 'https://source.unsplash.com/u3aYUsaHT20', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(24, 'Sitad', 'sitad', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(25, 'Srikot', 'srikot', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(26, 'Swopana Taladehi', 'swopana-taladehi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '77', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(27, 'Bungal', 'bungal', 'https://source.unsplash.com/u3aYUsaHT20', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(28, 'Chaudhari', 'chaudhari', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(29, 'Chhanna', 'chhanna', 'https://source.unsplash.com/u3aYUsaHT20', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(30, 'Jamatola', 'jamatola', 'https://source.unsplash.com/u3aYUsaHT20', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(31, 'Jaya Prithivi Nagar', 'jaya-prithivi-nagar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(32, 'Rayal', 'rayal', 'https://source.unsplash.com/u3aYUsaHT20', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:47', '2022-08-17 03:27:47'),
(33, 'Shayadi', 'shayadi', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(34, 'Talkot', 'talkot', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(35, 'Thalara', 'thalara', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '73', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(36, 'Chhatara', 'chhatara', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(37, 'Dandakot', 'dandakot', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(38, 'Dogadi', 'dogadi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(39, 'Faiti', 'faiti', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(40, 'Jukot', 'jukot', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(41, 'Kolti', 'kolti', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(42, 'Manakot', 'manakot', 'https://source.unsplash.com/u3aYUsaHT20', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(43, 'Tate', 'tate', 'https://source.unsplash.com/6yBAQeeNROU', 0, '74', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(44, 'Ajayameru', 'ajayameru', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(45, 'Chipur', 'chipur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(46, 'Dandaban', 'dandaban', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(47, 'Gaira Ganesh', 'gaira-ganesh', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(48, 'Ganeshpur', 'ganeshpur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(49, 'Jogbudha', 'jogbudha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(50, 'Lamikande', 'lamikande', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(51, 'Ugratara', 'ugratara', 'https://source.unsplash.com/xyE1p1rG04U', 0, '76', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(52, 'Dandakot', 'dandakot', 'https://source.unsplash.com/xyE1p1rG04U', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(53, 'Duhuti', 'duhuti', 'https://source.unsplash.com/6yBAQeeNROU', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(54, 'Gokule', 'gokule', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(55, 'Joljibi', 'joljibi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:48', '2022-08-17 03:27:48'),
(56, 'Malikarjun', 'malikarjun', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(57, 'Marmalatinath', 'marmalatinath', 'https://source.unsplash.com/xyE1p1rG04U', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(58, 'Rapla', 'rapla', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(59, 'Ritha Chaupata', 'ritha-chaupata', 'https://source.unsplash.com/6yBAQeeNROU', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(60, 'Sipti', 'sipti', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(61, 'Sitola', 'sitola', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '78', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(62, 'Banedungrasen', 'banedungrasen', 'https://source.unsplash.com/u3aYUsaHT20', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(63, 'Boktan', 'boktan', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(64, 'Byal', 'byal', 'https://source.unsplash.com/6yBAQeeNROU', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(65, 'Daund', 'daund', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(66, 'Gadhshera', 'gadhshera', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(67, 'Jorayal', 'jorayal', 'https://source.unsplash.com/xyE1p1rG04U', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(68, 'Lanakedareswor', 'lanakedareswor', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(69, 'Mauwa Nagardaha', 'mauwa-nagardaha', 'https://source.unsplash.com/6yBAQeeNROU', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(70, 'Mudbhara', 'mudbhara', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(71, 'Sanagaun', 'sanagaun', 'https://source.unsplash.com/u3aYUsaHT20', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(72, 'Silgadhi', 'silgadhi', 'https://source.unsplash.com/u3aYUsaHT20', 0, '72', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(73, 'Atariya', 'atariya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(74, 'Bhajani', 'bhajani', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(75, 'Chaumala', 'chaumala', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(76, 'Dododhara', 'dododhara', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(77, 'Hasuliya', 'hasuliya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(78, 'Joshipur', 'joshipur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(79, 'Lamki', 'lamki', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(80, 'Masuriya', 'masuriya', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:49', '2022-08-17 03:27:49'),
(81, 'Pahalmanpur', 'pahalmanpur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(82, 'Phaltude', 'phaltude', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(83, 'Phulbari', 'phulbari', 'https://source.unsplash.com/6yBAQeeNROU', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(84, 'Tikapur', 'tikapur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '70', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(85, 'Airport', 'airport', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(86, 'Beldadi', 'beldadi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(87, 'Chandani', 'chandani', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(88, 'Jhalari', 'jhalari', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(89, 'Kalika', 'kalika', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(90, 'Kanchanpur', 'kanchanpur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(91, 'Krishnapur', 'krishnapur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(92, 'Pipaladi', 'pipaladi', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(93, 'Punarbas', 'punarbas', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(94, 'Suda', 'suda', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '75', NULL, NULL, NULL, 7, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(95, 'Argha', 'argha', 'https://source.unsplash.com/xyE1p1rG04U', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(96, 'Arghatosh', 'arghatosh', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(97, 'Balkot', 'balkot', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(98, 'Dhikura', 'dhikura', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(99, 'Hamshapur', 'hamshapur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:50', '2022-08-17 03:27:50'),
(100, 'Khana', 'khana', 'https://source.unsplash.com/xyE1p1rG04U', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(101, 'Khidim', 'khidim', 'https://source.unsplash.com/xyE1p1rG04U', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(102, 'Khilji', 'khilji', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(103, 'Pali', 'pali', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(104, 'Subarnakhal', 'subarnakhal', 'https://source.unsplash.com/6yBAQeeNROU', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(105, 'Thada', 'thada', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(106, 'Wangla', 'wangla', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '51', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(107, 'Bhojbhagawanpur', 'bhojbhagawanpur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(108, 'Chandranagar', 'chandranagar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(109, 'Chisapani', 'chisapani', 'https://source.unsplash.com/u3aYUsaHT20', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(110, 'Godahana', 'godahana', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(111, 'Jayaspur', 'jayaspur', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(112, 'Khajura', 'khajura', 'https://source.unsplash.com/u3aYUsaHT20', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(113, 'Khaskusma', 'khaskusma', 'https://source.unsplash.com/6yBAQeeNROU', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(114, 'Kohalapur', 'kohalapur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(115, 'Ramjha', 'ramjha', 'https://source.unsplash.com/6yBAQeeNROU', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(116, 'Suiya', 'suiya', 'https://source.unsplash.com/u3aYUsaHT20', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(117, 'Udayapur', 'udayapur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '58', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(118, 'Baganaha', 'baganaha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(119, 'Bhurigaun', 'bhurigaun', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(120, 'Jamuni', 'jamuni', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(121, 'Magaragadi', 'magaragadi', 'https://source.unsplash.com/xyE1p1rG04U', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(122, 'Mainapokhar', 'mainapokhar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(123, 'Motipur', 'motipur', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(124, 'Pashupatinagar', 'pashupatinagar', 'https://source.unsplash.com/6yBAQeeNROU', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(125, 'Rajapur', 'rajapur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(126, 'Sanoshri', 'sanoshri', 'https://source.unsplash.com/6yBAQeeNROU', 0, '59', NULL, NULL, NULL, 5, '2022-08-17 03:27:51', '2022-08-17 03:27:51'),
(127, 'Bhaluwang', 'bhaluwang', 'https://source.unsplash.com/6yBAQeeNROU', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(128, 'Ghoraha', 'ghoraha', 'https://source.unsplash.com/xyE1p1rG04U', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(129, 'Hapur', 'hapur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(130, 'Hekuli', 'hekuli', 'https://source.unsplash.com/u3aYUsaHT20', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(131, 'Jangrahawa', 'jangrahawa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(132, 'Jumlepani', 'jumlepani', 'https://source.unsplash.com/u3aYUsaHT20', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(133, 'Koilabas', 'koilabas', 'https://source.unsplash.com/u3aYUsaHT20', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(134, 'Lamahi', 'lamahi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(135, 'Manpur', 'manpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(136, 'Panchakule', 'panchakule', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(137, 'Rampur', 'rampur', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(138, 'Shantinagar', 'shantinagar', 'https://source.unsplash.com/6yBAQeeNROU', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(139, 'Tulsipur', 'tulsipur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(140, 'Urahari', 'urahari', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '54', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(141, 'Arje', 'arje', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(142, 'Bharse', 'bharse', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(143, 'Birabas', 'birabas', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(144, 'Chandrakot', 'chandrakot', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(145, 'Dhurkot', 'dhurkot', 'https://source.unsplash.com/6yBAQeeNROU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(146, 'Ismadohali', 'ismadohali', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(147, 'Majuwa', 'majuwa', 'https://source.unsplash.com/6yBAQeeNROU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(148, 'Manabhak', 'manabhak', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(149, 'Pipaldanda', 'pipaldanda', 'https://source.unsplash.com/6yBAQeeNROU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(150, 'Purkotadha', 'purkotadha', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(151, 'Purtighat', 'purtighat', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(152, 'Ridi', 'ridi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(153, 'Sringa', 'sringa', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(154, 'Wami', 'wami', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '52', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(155, 'Argali', 'argali', 'https://source.unsplash.com/u3aYUsaHT20', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:52', '2022-08-17 03:27:52'),
(156, 'Aryabhanjyang', 'aryabhanjyang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(157, 'Baldengadi', 'baldengadi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(158, 'Chhahara', 'chhahara', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(159, 'Hungi', 'hungi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(160, 'Jalpa', 'jalpa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(161, 'Jhadewa', 'jhadewa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(162, 'Khasyauli', 'khasyauli', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(163, 'Madanpokhara', 'madanpokhara', 'https://source.unsplash.com/u3aYUsaHT20', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(164, 'Palungmainadi', 'palungmainadi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(165, 'Rampur', 'rampur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(166, 'Sahalkot', 'sahalkot', 'https://source.unsplash.com/xyE1p1rG04U', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(167, 'Tahu', 'tahu', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '53', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(168, 'Baraula', 'baraula', 'https://source.unsplash.com/u3aYUsaHT20', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(169, 'Bhingri', 'bhingri', 'https://source.unsplash.com/xyE1p1rG04U', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(170, 'Bijuwar', 'bijuwar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(171, 'Dakhaquadi', 'dakhaquadi', 'https://source.unsplash.com/u3aYUsaHT20', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(172, 'Lungbahane', 'lungbahane', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(173, 'Machchhi', 'machchhi', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(174, 'Majuwa', 'majuwa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(175, 'Naya Gaun', 'naya-gaun', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(176, 'Thulabesi', 'thulabesi', 'https://source.unsplash.com/u3aYUsaHT20', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(177, 'Wangesal', 'wangesal', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '55', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(178, 'Dahaban', 'dahaban', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(179, 'Ghartigaun', 'ghartigaun', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(180, 'Himtakura', 'himtakura', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(181, 'Jhenam (Holeri)', 'jhenam-holeri', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(182, 'Khungri', 'khungri', 'https://source.unsplash.com/xyE1p1rG04U', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(183, 'Nerpa', 'nerpa', 'https://source.unsplash.com/u3aYUsaHT20', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(184, 'Shulichaur', 'shulichaur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:53', '2022-08-17 03:27:53'),
(185, 'Sirpa', 'sirpa', 'https://source.unsplash.com/6yBAQeeNROU', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(186, 'Thawang', 'thawang', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '56', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(187, 'Amuwa', 'amuwa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(188, 'Betkuiya', 'betkuiya', 'https://source.unsplash.com/6yBAQeeNROU', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(189, 'Butwal', 'butwal', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(190, 'Dhakadhai', 'dhakadhai', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(191, 'Kotihawa', 'kotihawa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(192, 'Lumbini', 'lumbini', 'https://source.unsplash.com/u3aYUsaHT20', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(193, 'Mahadehiya', 'mahadehiya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(194, 'Manigram', 'manigram', 'https://source.unsplash.com/xyE1p1rG04U', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(195, 'Parroha', 'parroha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(196, 'Saljhandi', 'saljhandi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(197, 'Sauraha Pharsa', 'sauraha-pharsa', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(198, 'Siktahan', 'siktahan', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(199, 'Suryapura', 'suryapura', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(200, 'Tenuhawa', 'tenuhawa', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(201, 'Thutipipal', 'thutipipal', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '50', NULL, NULL, NULL, 5, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(202, 'Arnakot', 'arnakot', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(203, 'Balewa Payupata', 'balewa-payupata', 'https://source.unsplash.com/6yBAQeeNROU', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(204, 'Bereng', 'bereng', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(205, 'Bihukot', 'bihukot', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(206, 'Bongadovan', 'bongadovan', 'https://source.unsplash.com/u3aYUsaHT20', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(207, 'Galkot', 'galkot', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(208, 'Harichaur', 'harichaur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(209, 'Jaidi Belbagar', 'jaidi-belbagar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(210, 'Jhimpa', 'jhimpa', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(211, 'Khrwang', 'khrwang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(212, 'Kusmi Shera', 'kusmi-shera', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(213, 'Pala', 'pala', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(214, 'Pandavkhani', 'pandavkhani', 'https://source.unsplash.com/6yBAQeeNROU', 0, '36', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(215, 'Aarughat', 'aarughat', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(216, 'Anapipal', 'anapipal', 'https://source.unsplash.com/6yBAQeeNROU', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(217, 'Batase', 'batase', 'https://source.unsplash.com/u3aYUsaHT20', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(218, 'Bhachchek', 'bhachchek', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(219, 'Bungkot', 'bungkot', 'https://source.unsplash.com/6yBAQeeNROU', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:54', '2022-08-17 03:27:54'),
(220, 'Ghyampesal', 'ghyampesal', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(221, 'Gumda', 'gumda', 'https://source.unsplash.com/u3aYUsaHT20', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(222, 'Jaubari', 'jaubari', 'https://source.unsplash.com/xyE1p1rG04U', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(223, 'Luintel', 'luintel', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(224, 'Manakamana', 'manakamana', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(225, 'Saurpani', 'saurpani', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(226, 'Sirdibash', 'sirdibash', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '37', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(227, 'Bhalam', 'bhalam', 'https://source.unsplash.com/6yBAQeeNROU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(228, 'Birethanti', 'birethanti', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(229, 'Chapakot', 'chapakot', 'https://source.unsplash.com/u3aYUsaHT20', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(230, 'Gagan Gaunda', 'gagan-gaunda', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(231, 'Ghachok', 'ghachok', 'https://source.unsplash.com/6yBAQeeNROU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(232, 'Majhathana', 'majhathana', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(233, 'Makaikhola', 'makaikhola', 'https://source.unsplash.com/6yBAQeeNROU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(234, 'Naudanda', 'naudanda', 'https://source.unsplash.com/6yBAQeeNROU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(235, 'Nirmalpokhari', 'nirmalpokhari', 'https://source.unsplash.com/6yBAQeeNROU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(236, 'Pardibandh', 'pardibandh', 'https://source.unsplash.com/6yBAQeeNROU', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(237, 'Purunchaur', 'purunchaur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(238, 'Rupakot', 'rupakot', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(239, 'Sildujure', 'sildujure', 'https://source.unsplash.com/xyE1p1rG04U', 0, '38', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(240, 'Bharate', 'bharate', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(241, 'Gaunda', 'gaunda', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(242, 'Gilung', 'gilung', 'https://source.unsplash.com/6yBAQeeNROU', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(243, 'Khudi', 'khudi', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(244, 'Kunchha', 'kunchha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(245, 'Maling', 'maling', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(246, 'Phaliyasanghu', 'phaliyasanghu', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:55', '2022-08-17 03:27:55'),
(247, 'Sotipasal', 'sotipasal', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(248, 'Sundar Bazar', 'sundar-bazar', 'https://source.unsplash.com/6yBAQeeNROU', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(249, 'Tarkughat', 'tarkughat', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '39', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(250, 'Bhakra', 'bhakra', 'https://source.unsplash.com/6yBAQeeNROU', 0, '40', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(251, 'Dharapani', 'dharapani', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '40', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(252, 'Mathillo Manang', 'mathillo-manang', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '40', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(253, 'Nar', 'nar', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '40', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(254, 'Pisang', 'pisang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '40', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(255, 'Charang', 'charang', 'https://source.unsplash.com/u3aYUsaHT20', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(256, 'Chhoser', 'chhoser', 'https://source.unsplash.com/u3aYUsaHT20', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(257, 'Kagbeni', 'kagbeni', 'https://source.unsplash.com/u3aYUsaHT20', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(258, 'Lete', 'lete', 'https://source.unsplash.com/xyE1p1rG04U', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(259, 'Marpha', 'marpha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(260, 'Muktinath', 'muktinath', 'https://source.unsplash.com/6yBAQeeNROU', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(261, 'Mustang', 'mustang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(262, 'Thak Tukuche', 'thak-tukuche', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '41', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(263, 'Babiyachaur', 'babiyachaur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(264, 'Dana', 'dana', 'https://source.unsplash.com/6yBAQeeNROU', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(265, 'Darbang', 'darbang', 'https://source.unsplash.com/6yBAQeeNROU', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(266, 'Galeswor', 'galeswor', 'https://source.unsplash.com/6yBAQeeNROU', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(267, 'Lulang', 'lulang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(268, 'Pakhapani', 'pakhapani', 'https://source.unsplash.com/6yBAQeeNROU', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(269, 'Rakhu Bhagawati', 'rakhu-bhagawati', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(270, 'Sikha', 'sikha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(271, 'Takam', 'takam', 'https://source.unsplash.com/u3aYUsaHT20', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(272, 'Xyamarukot', 'xyamarukot', 'https://source.unsplash.com/u3aYUsaHT20', 0, '42', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(273, 'Bachchha', 'bachchha', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:56', '2022-08-17 03:27:56'),
(274, 'Deurali', 'deurali', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(275, 'Devisthan', 'devisthan', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(276, 'Hubas', 'hubas', 'https://source.unsplash.com/xyE1p1rG04U', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(277, 'Karkineta', 'karkineta', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(278, 'Khor Pokhara', 'khor-pokhara', 'https://source.unsplash.com/u3aYUsaHT20', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(279, 'Khurkot', 'khurkot', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(280, 'Lankhudeurali', 'lankhudeurali', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(281, 'Salija', 'salija', 'https://source.unsplash.com/u3aYUsaHT20', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(282, 'Setibeni', 'setibeni', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(283, 'Thulipokhari', 'thulipokhari', 'https://source.unsplash.com/xyE1p1rG04U', 0, '45', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(284, 'Aanbu Khaireni', 'aanbu-khaireni', 'https://source.unsplash.com/xyE1p1rG04U', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(285, 'Baidi', 'baidi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(286, 'Bandipur', 'bandipur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(287, 'Bhimad', 'bhimad', 'https://source.unsplash.com/6yBAQeeNROU', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(288, 'Devaghat', 'devaghat', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(289, 'Dumre', 'dumre', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(290, 'Ghiring Sundhara', 'ghiring-sundhara', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(291, 'Kahunshivapur', 'kahunshivapur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(292, 'Khairenitar', 'khairenitar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(293, 'Lamagaun', 'lamagaun', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(294, 'Manechauka', 'manechauka', 'https://source.unsplash.com/u3aYUsaHT20', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:57', '2022-08-17 03:27:57'),
(295, 'Rising Ranipokhari', 'rising-ranipokhari', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(296, 'Shisha Ghat', 'shisha-ghat', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(297, 'Tuhure Pasal', 'tuhure-pasal', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '47', NULL, NULL, NULL, 4, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(298, 'Amalekhgunj', 'amalekhgunj', 'https://source.unsplash.com/6yBAQeeNROU', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(299, 'Bariyarpur', 'bariyarpur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(300, 'Basantapur', 'basantapur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(301, 'Dumarwana', 'dumarwana', 'https://source.unsplash.com/6yBAQeeNROU', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(302, 'Jeetpur (Bhavanipur)', 'jeetpur-bhavanipur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(303, 'Kabahigoth', 'kabahigoth', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(304, 'Mahendra Adarsha', 'mahendra-adarsha', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(305, 'Nijgadh', 'nijgadh', 'https://source.unsplash.com/6yBAQeeNROU', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(306, 'Parsoni', 'parsoni', 'https://source.unsplash.com/6yBAQeeNROU', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(307, 'Pipradhigoth', 'pipradhigoth', 'https://source.unsplash.com/u3aYUsaHT20', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(308, 'Simara', 'simara', 'https://source.unsplash.com/u3aYUsaHT20', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(309, 'Simraungadh', 'simraungadh', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(310, 'Umjan', 'umjan', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '20', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(311, 'Bagachauda', 'bagachauda', 'https://source.unsplash.com/6yBAQeeNROU', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(312, 'Chakkar', 'chakkar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(313, 'Dhalkebar', 'dhalkebar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(314, 'Dhanushadham', 'dhanushadham', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(315, 'Duhabi', 'duhabi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(316, 'Godar Chisapani', 'godar-chisapani', 'https://source.unsplash.com/u3aYUsaHT20', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(317, 'Jatahi', 'jatahi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(318, 'Khajuri', 'khajuri', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(319, 'Phulgama', 'phulgama', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(320, 'Raghunathpur', 'raghunathpur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(321, 'Sankhuwa Mahendranagar', 'sankhuwa-mahendranagar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(322, 'Tinkoriya', 'tinkoriya', 'https://source.unsplash.com/u3aYUsaHT20', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:58', '2022-08-17 03:27:58'),
(323, 'Yadukuha', 'yadukuha', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '17', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(324, 'Balawa', 'balawa', 'https://source.unsplash.com/xyE1p1rG04U', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(325, 'Bardibash', 'bardibash', 'https://source.unsplash.com/6yBAQeeNROU', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(326, 'Bhangaha', 'bhangaha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(327, 'Gaushala', 'gaushala', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(328, 'Laxminiya', 'laxminiya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(329, 'Loharpatti', 'loharpatti', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(330, 'Manara', 'manara', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(331, 'Matihani', 'matihani', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(332, 'Pipara', 'pipara', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(333, 'Ramgopalpur', 'ramgopalpur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:27:59', '2022-08-17 03:27:59'),
(334, 'Samsi', 'samsi', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(335, 'Shreepur', 'shreepur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '18', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00');
INSERT INTO `cities` (`id`, `name`, `slug`, `image`, `feature_in_homepage`, `district`, `meta_keyword`, `meta_title`, `meta_description`, `province_id`, `created_at`, `updated_at`) VALUES
(336, 'Aadarshanagar', 'aadarshanagar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(337, 'Bahuari Pidari', 'bahuari-pidari', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(338, 'Bindabasini', 'bindabasini', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(339, 'Biruwaguthi', 'biruwaguthi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(340, 'Janakitol', 'janakitol', 'https://source.unsplash.com/6yBAQeeNROU', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(341, 'Jeetpur', 'jeetpur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(342, 'Pakahamainpur', 'pakahamainpur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(343, 'Parbanipur', 'parbanipur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(344, 'Paterwa Sugauli', 'paterwa-sugauli', 'https://source.unsplash.com/xyE1p1rG04U', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(345, 'Phokhariya', 'phokhariya', 'https://source.unsplash.com/6yBAQeeNROU', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(346, 'Ranigunj', 'ranigunj', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(347, 'Shirsiya Khalwatola', 'shirsiya-khalwatola', 'https://source.unsplash.com/6yBAQeeNROU', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(348, 'Thori', 'thori', 'https://source.unsplash.com/6yBAQeeNROU', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:00', '2022-08-17 03:28:00'),
(349, 'Viswa', 'viswa', 'https://source.unsplash.com/6yBAQeeNROU', 0, '21', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(350, 'Chandra Nigahapur', 'chandra-nigahapur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(351, 'Katahariya', 'katahariya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(352, 'Laxminiya', 'laxminiya', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(353, 'Madhopur', 'madhopur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(354, 'Patharabudhram', 'patharabudhram', 'https://source.unsplash.com/xyE1p1rG04U', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(355, 'Pipra bazar', 'pipra-bazar', 'https://source.unsplash.com/u3aYUsaHT20', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(356, 'Rajpurpharahadawa', 'rajpurpharahadawa', 'https://source.unsplash.com/u3aYUsaHT20', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(357, 'Samanpur', 'samanpur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(358, 'Saruatha', 'saruatha', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(359, 'Shivanagar', 'shivanagar', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(360, 'Sitalpur', 'sitalpur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '22', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(361, 'Arnaha', 'arnaha', 'https://source.unsplash.com/xyE1p1rG04U', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(362, 'Bairaba', 'bairaba', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(363, 'Bhagawatpur', 'bhagawatpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(364, 'Bhardaha', 'bhardaha', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(365, 'Bishnupur', 'bishnupur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(366, 'Bodebarsain', 'bodebarsain', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(367, 'Chhinnamasta', 'chhinnamasta', 'https://source.unsplash.com/xyE1p1rG04U', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(368, 'Hanuman Nagar', 'hanuman-nagar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(369, 'Kadarwona', 'kadarwona', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(370, 'Kalyanpur', 'kalyanpur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(371, 'Kanchanpur', 'kanchanpur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(372, 'Koiladi', 'koiladi', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(373, 'Pato', 'pato', 'https://source.unsplash.com/6yBAQeeNROU', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(374, 'Phattepur', 'phattepur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(375, 'Praswani', 'praswani', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(376, 'Rupani', 'rupani', 'https://source.unsplash.com/u3aYUsaHT20', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(377, 'Sisawa', 'sisawa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '15', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(378, 'Barahathawa', 'barahathawa', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:01', '2022-08-17 03:28:01'),
(379, 'Bayalbas', 'bayalbas', 'https://source.unsplash.com/xyE1p1rG04U', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(380, 'Brahmapuri', 'brahmapuri', 'https://source.unsplash.com/xyE1p1rG04U', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(381, 'Chhatauna', 'chhatauna', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(382, 'Dumariya', 'dumariya', 'https://source.unsplash.com/u3aYUsaHT20', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(383, 'Hariaun', 'hariaun', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(384, 'Haripur', 'haripur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(385, 'Haripurwa', 'haripurwa', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(386, 'Harkathawa', 'harkathawa', 'https://source.unsplash.com/6yBAQeeNROU', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(387, 'Karmaiya', 'karmaiya', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(388, 'Kaudena', 'kaudena', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(389, 'Lalbandi', 'lalbandi', 'https://source.unsplash.com/xyE1p1rG04U', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(390, 'Ramnagar(Bahuarwa)', 'ramnagarbahuarwa', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(391, 'Sundarpur', 'sundarpur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '19', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(392, 'Bandipur', 'bandipur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(393, 'Bariyarpatti', 'bariyarpatti', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(394, 'Bastipur', 'bastipur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(395, 'Belha', 'belha', 'https://source.unsplash.com/xyE1p1rG04U', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(396, 'Bhagawanpur', 'bhagawanpur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(397, 'Bishnupur', 'bishnupur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(398, 'Dhanagadhi', 'dhanagadhi', 'https://source.unsplash.com/u3aYUsaHT20', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(399, 'Golbazar (Asanpur)', 'golbazar-asanpur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(400, 'Kalyanpur', 'kalyanpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(401, 'Lahan', 'lahan', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(402, 'Madar', 'madar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(403, 'Maheshpur patari', 'maheshpur-patari', 'https://source.unsplash.com/6yBAQeeNROU', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(404, 'Mirchaiya', 'mirchaiya', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(405, 'Sukhipur', 'sukhipur', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '16', NULL, NULL, NULL, 2, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(406, 'Dibyashwori', 'dibyashwori', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(407, 'Dubakot', 'dubakot', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:02', '2022-08-17 03:28:02'),
(408, 'Gamcha', 'gamcha', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(409, 'Jorpati', 'jorpati', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(410, 'Kharipati', 'kharipati', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(411, 'Nagarkot', 'nagarkot', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(412, 'Tathali', 'tathali', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(413, 'Thimi', 'thimi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '26', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(414, 'Jutpani', 'jutpani', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '34', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(415, 'Khairahani', 'khairahani', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '34', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(416, 'Meghauli', 'meghauli', 'https://source.unsplash.com/u3aYUsaHT20', 0, '34', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(417, 'Patihani', 'patihani', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '34', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(418, 'Phulbari', 'phulbari', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '34', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(419, 'Bhumisthan', 'bhumisthan', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(420, 'Gajuri', 'gajuri', 'https://source.unsplash.com/u3aYUsaHT20', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(421, 'Katunje', 'katunje', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(422, 'Khanikhola', 'khanikhola', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(423, 'Lapa', 'lapa', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(424, 'Maidi', 'maidi', 'https://source.unsplash.com/xyE1p1rG04U', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(425, 'Malekhu', 'malekhu', 'https://source.unsplash.com/u3aYUsaHT20', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(426, 'Phulkharka', 'phulkharka', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(427, 'Sertung', 'sertung', 'https://source.unsplash.com/u3aYUsaHT20', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(428, 'Sunaulabazar', 'sunaulabazar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(429, 'Sunkhani', 'sunkhani', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(430, 'Tripureshwor', 'tripureshwor', 'https://source.unsplash.com/xyE1p1rG04U', 0, '27', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(431, 'Bhusapheda', 'bhusapheda', 'https://source.unsplash.com/6yBAQeeNROU', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:03', '2022-08-17 03:28:03'),
(432, 'Chitre', 'chitre', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(433, 'Japhekalapani', 'japhekalapani', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(434, 'Jiri', 'jiri', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(435, 'Khahare', 'khahare', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(436, 'Khopachangu', 'khopachangu', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(437, 'Lamabagar', 'lamabagar', 'https://source.unsplash.com/6yBAQeeNROU', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(438, 'Melung', 'melung', 'https://source.unsplash.com/u3aYUsaHT20', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(439, 'Namdu', 'namdu', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(440, 'Sunkhani', 'sunkhani', 'https://source.unsplash.com/xyE1p1rG04U', 0, '25', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(441, 'Balaju', 'balaju', 'https://source.unsplash.com/u3aYUsaHT20', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(442, 'Baluwatar', 'baluwatar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(443, 'Bansbari', 'bansbari', 'https://source.unsplash.com/6yBAQeeNROU', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(444, 'Budhanilkantha', 'budhanilkantha', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:04', '2022-08-17 03:28:04'),
(445, 'Chabahil', 'chabahil', 'https://source.unsplash.com/u3aYUsaHT20', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(446, 'Dillibazar', 'dillibazar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(447, 'Gauchar', 'gauchar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(448, 'Kalimati', 'kalimati', 'https://source.unsplash.com/xyE1p1rG04U', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(449, 'Kirtipur', 'kirtipur', 'https://source.unsplash.com/u3aYUsaHT20', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(450, 'Manmaiju', 'manmaiju', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(451, 'Pashupati', 'pashupati', 'https://source.unsplash.com/u3aYUsaHT20', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(452, 'Pharping', 'pharping', 'https://source.unsplash.com/xyE1p1rG04U', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(453, 'Sachibalaya', 'sachibalaya', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(454, 'Sankhu', 'sankhu', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(455, 'Sarbochcha Adalat', 'sarbochcha-adalat', 'https://source.unsplash.com/xyE1p1rG04U', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(456, 'Sundarijal', 'sundarijal', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(457, 'Swayambhu', 'swayambhu', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(458, 'Thankot', 'thankot', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(459, 'Tokha Saraswati', 'tokha-saraswati', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(460, 'Tribhuvan University', 'tribhuvan-university', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '28', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(461, 'Banepa', 'banepa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(462, 'Dapcha', 'dapcha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(463, 'Dolal Ghat', 'dolal-ghat', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(464, 'Ghartichhap', 'ghartichhap', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(465, 'Mangaltar', 'mangaltar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(466, 'Panauti', 'panauti', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(467, 'Panchkhal', 'panchkhal', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(468, 'Phalante', 'phalante', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '29', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(469, 'Bhattedanda', 'bhattedanda', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(470, 'Chapagaun', 'chapagaun', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(471, 'Darabartole', 'darabartole', 'https://source.unsplash.com/6yBAQeeNROU', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(472, 'Dhapakhel', 'dhapakhel', 'https://source.unsplash.com/u3aYUsaHT20', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(473, 'Godawari', 'godawari', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(474, 'Gotikhel', 'gotikhel', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(475, 'Imadol', 'imadol', 'https://source.unsplash.com/6yBAQeeNROU', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:05', '2022-08-17 03:28:05'),
(476, 'Lubhu', 'lubhu', 'https://source.unsplash.com/xyE1p1rG04U', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(477, 'Pyutar', 'pyutar', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '30', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(478, 'Bhadratar', 'bhadratar', 'https://source.unsplash.com/u3aYUsaHT20', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(479, 'Chokade', 'chokade', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(480, 'Deurali', 'deurali', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(481, 'Devighat', 'devighat', 'https://source.unsplash.com/xyE1p1rG04U', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(482, 'Kahule', 'kahule', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(483, 'Kharanitar', 'kharanitar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(484, 'Nuwakot', 'nuwakot', 'https://source.unsplash.com/xyE1p1rG04U', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(485, 'Pokharichapadanda', 'pokharichapadanda', 'https://source.unsplash.com/u3aYUsaHT20', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(486, 'Ramabati', 'ramabati', 'https://source.unsplash.com/xyE1p1rG04U', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(487, 'Ranipauwa', 'ranipauwa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(488, 'Rautbesi', 'rautbesi', 'https://source.unsplash.com/6yBAQeeNROU', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(489, 'Taruka', 'taruka', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(490, 'Thansingh', 'thansingh', 'https://source.unsplash.com/u3aYUsaHT20', 0, '31', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(491, 'Betali', 'betali', 'https://source.unsplash.com/6yBAQeeNROU', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(492, 'Bhirpani', 'bhirpani', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(493, 'Doramba', 'doramba', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(494, 'Duragaun', 'duragaun', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(495, 'Hiledevi', 'hiledevi', 'https://source.unsplash.com/6yBAQeeNROU', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(496, 'Kathjor', 'kathjor', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(497, 'Khimti', 'khimti', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(498, 'Puranagaun', 'puranagaun', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(499, 'Saghutar', 'saghutar', 'https://source.unsplash.com/6yBAQeeNROU', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(500, 'Those', 'those', 'https://source.unsplash.com/u3aYUsaHT20', 0, '24', NULL, NULL, NULL, 3, '2022-08-17 03:28:06', '2022-08-17 03:28:06'),
(501, 'Dhaibung', 'dhaibung', 'https://source.unsplash.com/xyE1p1rG04U', 0, '32', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(502, 'Ramkali', 'ramkali', 'https://source.unsplash.com/6yBAQeeNROU', 0, '32', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(503, 'Rasuwa', 'rasuwa', 'https://source.unsplash.com/xyE1p1rG04U', 0, '32', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(504, 'Syaphru Besi', 'syaphru-besi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '32', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(505, 'Bahun Tilpung', 'bahun-tilpung', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(506, 'Belghari', 'belghari', 'https://source.unsplash.com/u3aYUsaHT20', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(507, 'Bhiman', 'bhiman', 'https://source.unsplash.com/u3aYUsaHT20', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(508, 'Dakaha', 'dakaha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(509, 'Dudhauli', 'dudhauli', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(510, 'Gwaltar', 'gwaltar', 'https://source.unsplash.com/u3aYUsaHT20', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(511, 'Jhanga Jholi', 'jhanga-jholi', 'https://source.unsplash.com/6yBAQeeNROU', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(512, 'Kapilakot', 'kapilakot', 'https://source.unsplash.com/u3aYUsaHT20', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(513, 'Khurkot', 'khurkot', 'https://source.unsplash.com/6yBAQeeNROU', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(514, 'Netrakali', 'netrakali', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(515, 'Pipalmadhiratanpur', 'pipalmadhiratanpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(516, 'Solpa', 'solpa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '23', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(517, 'Atarpur', 'atarpur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(518, 'Balephi', 'balephi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(519, 'Barabise', 'barabise', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(520, 'Bhotsipa', 'bhotsipa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(521, 'Dubachaur', 'dubachaur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(522, 'Gyalthum', 'gyalthum', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(523, 'Jalbire', 'jalbire', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(524, 'Kodari', 'kodari', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(525, 'Lamosanghu', 'lamosanghu', 'https://source.unsplash.com/6yBAQeeNROU', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(526, 'Melamchi Bahunepati', 'melamchi-bahunepati', 'https://source.unsplash.com/xyE1p1rG04U', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:07', '2022-08-17 03:28:07'),
(527, 'Nawalpur', 'nawalpur', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(528, 'Pangtang', 'pangtang', 'https://source.unsplash.com/6yBAQeeNROU', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(529, 'Thangapaldhap', 'thangapaldhap', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '33', NULL, NULL, NULL, 3, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(530, 'Baikunthe', 'baikunthe', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(531, 'Bastim', 'bastim', 'https://source.unsplash.com/u3aYUsaHT20', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(532, 'Bhulke', 'bhulke', 'https://source.unsplash.com/6yBAQeeNROU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(533, 'Deurali', 'deurali', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(534, 'Dilpa Annapurna', 'dilpa-annapurna', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(535, 'Dingla', 'dingla', 'https://source.unsplash.com/6yBAQeeNROU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(536, 'Dobhane', 'dobhane', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(537, 'Kulung Agrakhe', 'kulung-agrakhe', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(538, 'Pyauli', 'pyauli', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(539, 'Ranibas', 'ranibas', 'https://source.unsplash.com/u3aYUsaHT20', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(540, 'Timma', 'timma', 'https://source.unsplash.com/u3aYUsaHT20', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(541, 'Tiwari Bhanjyang', 'tiwari-bhanjyang', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(542, 'Walangkha', 'walangkha', 'https://source.unsplash.com/6yBAQeeNROU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(543, 'Yaku', 'yaku', 'https://source.unsplash.com/6yBAQeeNROU', 0, '1', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(544, 'Ankhisalla', 'ankhisalla', 'https://source.unsplash.com/6yBAQeeNROU', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(545, 'Arknaule', 'arknaule', 'https://source.unsplash.com/6yBAQeeNROU', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(546, 'Bhedetar', 'bhedetar', 'https://source.unsplash.com/u3aYUsaHT20', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(547, 'Chungmang', 'chungmang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(548, 'Dandabazar', 'dandabazar', 'https://source.unsplash.com/xyE1p1rG04U', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:08', '2022-08-17 03:28:08'),
(549, 'Dhankuta', 'dhankuta', 'https://source.unsplash.com/xyE1p1rG04U', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(550, 'Hile', 'hile', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(551, 'Leguwa', 'leguwa', 'https://source.unsplash.com/xyE1p1rG04U', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(552, 'Mare Katahare', 'mare-katahare', 'https://source.unsplash.com/xyE1p1rG04U', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(553, 'Mudhebash', 'mudhebash', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(554, 'Muga', 'muga', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(555, 'Pakhribash', 'pakhribash', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(556, 'Rajarani', 'rajarani', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(557, 'Teliya', 'teliya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '2', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(558, 'Aaitabare', 'aaitabare', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(559, 'Cheesa Pani Panchami', 'cheesa-pani-panchami', 'https://source.unsplash.com/u3aYUsaHT20', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(560, 'Gajurmukhi', 'gajurmukhi', 'https://source.unsplash.com/u3aYUsaHT20', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(561, 'Gitpur', 'gitpur', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(562, 'Harkatebazar', 'harkatebazar', 'https://source.unsplash.com/u3aYUsaHT20', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(563, 'Jamuna', 'jamuna', 'https://source.unsplash.com/6yBAQeeNROU', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(564, 'Mangal Bare', 'mangal-bare', 'https://source.unsplash.com/xyE1p1rG04U', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(565, 'Nayabazar', 'nayabazar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(566, 'Nepaltar', 'nepaltar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(567, 'Pashupatinagar', 'pashupatinagar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(568, 'Phikal', 'phikal', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '3', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(569, 'Baniyani', 'baniyani', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(570, 'Birtamod', 'birtamod', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(571, 'Budhabare', 'budhabare', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:09', '2022-08-17 03:28:09'),
(572, 'Chandragadhi', 'chandragadhi', 'https://source.unsplash.com/6yBAQeeNROU', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(573, 'Damak', 'damak', 'https://source.unsplash.com/u3aYUsaHT20', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(574, 'Dhulabari', 'dhulabari', 'https://source.unsplash.com/u3aYUsaHT20', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(575, 'Dudhe', 'dudhe', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(576, 'Durgapur', 'durgapur', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(577, 'Gauradaha', 'gauradaha', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(578, 'Gaurigunj', 'gaurigunj', 'https://source.unsplash.com/xyE1p1rG04U', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(579, 'Goldhap', 'goldhap', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(580, 'Jhapa', 'jhapa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(581, 'Kankarbhitta', 'kankarbhitta', 'https://source.unsplash.com/6yBAQeeNROU', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(582, 'Rajgadh', 'rajgadh', 'https://source.unsplash.com/6yBAQeeNROU', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(583, 'Sanishchare', 'sanishchare', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(584, 'Shivagunj', 'shivagunj', 'https://source.unsplash.com/u3aYUsaHT20', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(585, 'Topagachhi', 'topagachhi', 'https://source.unsplash.com/6yBAQeeNROU', 0, '4', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(586, 'Aiselukharka', 'aiselukharka', 'https://source.unsplash.com/6yBAQeeNROU', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(587, 'Buipa', 'buipa', 'https://source.unsplash.com/u3aYUsaHT20', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(588, 'Chisapani', 'chisapani', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(589, 'Halesi mahadevasthan', 'halesi-mahadevasthan', 'https://source.unsplash.com/xyE1p1rG04U', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(590, 'Jalpa', 'jalpa', 'https://source.unsplash.com/6yBAQeeNROU', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(591, 'Khotang', 'khotang', 'https://source.unsplash.com/u3aYUsaHT20', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(592, 'Lamidanda', 'lamidanda', 'https://source.unsplash.com/6yBAQeeNROU', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(593, 'Manebhanjyang', 'manebhanjyang', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(594, 'Sapteshworichhitapokhari', 'sapteshworichhitapokhari', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(595, 'Simpani', 'simpani', 'https://source.unsplash.com/6yBAQeeNROU', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(596, 'Wakshila', 'wakshila', 'https://source.unsplash.com/6yBAQeeNROU', 0, '5', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(597, 'Banigama', 'banigama', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(598, 'Bansbari', 'bansbari', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(599, 'Bayarban', 'bayarban', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(600, 'Bhaudaha', 'bhaudaha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(601, 'Biratnagar Bazar', 'biratnagar-bazar', 'https://source.unsplash.com/u3aYUsaHT20', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(602, 'Chunimari', 'chunimari', 'https://source.unsplash.com/xyE1p1rG04U', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(603, 'Dadarberiya', 'dadarberiya', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(604, 'Haraincha', 'haraincha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(605, 'Jhorahat', 'jhorahat', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:10', '2022-08-17 03:28:10'),
(606, 'Kerabari', 'kerabari', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(607, 'Letang', 'letang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(608, 'Madhumalla', 'madhumalla', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(609, 'Rangeli', 'rangeli', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(610, 'Rani Sikiyahi', 'rani-sikiyahi', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(611, 'Sanischare', 'sanischare', 'https://source.unsplash.com/u3aYUsaHT20', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(612, 'Sorabhag', 'sorabhag', 'https://source.unsplash.com/6yBAQeeNROU', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(613, 'Urlabari', 'urlabari', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '6', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(614, 'Bigutar', 'bigutar', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(615, 'Chyanam', 'chyanam', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(616, 'Gamanangtar', 'gamanangtar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(617, 'Ghorakhori', 'ghorakhori', 'https://source.unsplash.com/xyE1p1rG04U', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(618, 'Khani Bhanjyang', 'khani-bhanjyang', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(619, 'Khiji Phalate', 'khiji-phalate', 'https://source.unsplash.com/6yBAQeeNROU', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(620, 'Mane Bhanjyang', 'mane-bhanjyang', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(621, 'Moli', 'moli', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(622, 'Ragani', 'ragani', 'https://source.unsplash.com/u3aYUsaHT20', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(623, 'Rampur', 'rampur', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(624, 'Rumjatar', 'rumjatar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '7', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(625, 'Ambarpur', 'ambarpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(626, 'Chyangthapu', 'chyangthapu', 'https://source.unsplash.com/6yBAQeeNROU', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(627, 'Limba', 'limba', 'https://source.unsplash.com/u3aYUsaHT20', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(628, 'Mauwa', 'mauwa', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(629, 'Medibung', 'medibung', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(630, 'Mehelbote', 'mehelbote', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(631, 'Namluwa', 'namluwa', 'https://source.unsplash.com/6yBAQeeNROU', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(632, 'Nawamidanda', 'nawamidanda', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(633, 'Rabi', 'rabi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(634, 'Yangnam', 'yangnam', 'https://source.unsplash.com/u3aYUsaHT20', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(635, 'Yasok', 'yasok', 'https://source.unsplash.com/xyE1p1rG04U', 0, '8', NULL, NULL, NULL, 1, '2022-08-17 03:28:11', '2022-08-17 03:28:11'),
(636, 'Ankhibhui', 'ankhibhui', 'https://source.unsplash.com/xyE1p1rG04U', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(637, 'Bahrabishe', 'bahrabishe', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(638, 'Chainpur', 'chainpur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(639, 'Chandanpur', 'chandanpur', 'https://source.unsplash.com/xyE1p1rG04U', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(640, 'Hatiya', 'hatiya', 'https://source.unsplash.com/6yBAQeeNROU', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(641, 'Hedangana', 'hedangana', 'https://source.unsplash.com/u3aYUsaHT20', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(642, 'Madi', 'madi', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(643, 'Mamling', 'mamling', 'https://source.unsplash.com/u3aYUsaHT20', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(644, 'Manebhanjyang', 'manebhanjyang', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(645, 'Shidhakali', 'shidhakali', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(646, 'Tamku', 'tamku', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(647, 'Tumlingtar', 'tumlingtar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(648, 'Wana', 'wana', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '9', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(649, 'Himaganga', 'himaganga', 'https://source.unsplash.com/6yBAQeeNROU', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(650, 'Jubu', 'jubu', 'https://source.unsplash.com/u3aYUsaHT20', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(651, 'Lukla', 'lukla', 'https://source.unsplash.com/6yBAQeeNROU', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:12', '2022-08-17 03:28:12'),
(652, 'Namche Bazar', 'namche-bazar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(653, 'Necha', 'necha', 'https://source.unsplash.com/xyE1p1rG04U', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(654, 'Nele', 'nele', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(655, 'Shishakhola', 'shishakhola', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(656, 'Sotang', 'sotang', 'https://source.unsplash.com/xyE1p1rG04U', 0, '10', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(657, 'Aurabari', 'aurabari', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(658, 'Bakalauri', 'bakalauri', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(659, 'Bhutaha', 'bhutaha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(660, 'Chatara', 'chatara', 'https://source.unsplash.com/6yBAQeeNROU', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(661, 'Chhitaha', 'chhitaha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(662, 'Chimadi', 'chimadi', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(663, 'Dewangunj', 'dewangunj', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(664, 'Dharan', 'dharan', 'https://source.unsplash.com/xyE1p1rG04U', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(665, 'Duhabi', 'duhabi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(666, 'Inarauwa', 'inarauwa', 'https://source.unsplash.com/xyE1p1rG04U', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(667, 'Itahari', 'itahari', 'https://source.unsplash.com/u3aYUsaHT20', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(668, 'Jhumka', 'jhumka', 'https://source.unsplash.com/xyE1p1rG04U', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13');
INSERT INTO `cities` (`id`, `name`, `slug`, `image`, `feature_in_homepage`, `district`, `meta_keyword`, `meta_title`, `meta_description`, `province_id`, `created_at`, `updated_at`) VALUES
(669, 'Laukahee', 'laukahee', 'https://source.unsplash.com/xyE1p1rG04U', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(670, 'Madhuvan', 'madhuvan', 'https://source.unsplash.com/6yBAQeeNROU', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(671, 'Mahendra Nagar', 'mahendra-nagar', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(672, 'Mangalbare', 'mangalbare', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(673, 'Simariya', 'simariya', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '11', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(674, 'Change', 'change', 'https://source.unsplash.com/6yBAQeeNROU', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(675, 'Dobhan', 'dobhan', 'https://source.unsplash.com/u3aYUsaHT20', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(676, 'Hangpang', 'hangpang', 'https://source.unsplash.com/6yBAQeeNROU', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:13', '2022-08-17 03:28:13'),
(677, 'Khokling', 'khokling', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(678, 'Olangchunggola', 'olangchunggola', 'https://source.unsplash.com/xyE1p1rG04U', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(679, 'Pedang', 'pedang', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(680, 'Sadeba', 'sadeba', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(681, 'Sinam', 'sinam', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(682, 'Siwang', 'siwang', 'https://source.unsplash.com/6yBAQeeNROU', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(683, 'Taplejung', 'taplejung', 'https://source.unsplash.com/6yBAQeeNROU', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(684, 'Thechambu', 'thechambu', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(685, 'Thokimba', 'thokimba', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '12', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(686, 'Basantapur', 'basantapur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(687, 'Hamarjung', 'hamarjung', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(688, 'Iwa', 'iwa', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(689, 'Jirikhimti', 'jirikhimti', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(690, 'Morahang', 'morahang', 'https://source.unsplash.com/xyE1p1rG04U', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(691, 'Mulpani', 'mulpani', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(692, 'Pokalawang', 'pokalawang', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(693, 'Sudap', 'sudap', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(694, 'Tinjure', 'tinjure', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '13', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(695, 'Baraha', 'baraha', 'https://source.unsplash.com/u3aYUsaHT20', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(696, 'Beltar', 'beltar', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(697, 'Bhutar', 'bhutar', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(698, 'Hadiya', 'hadiya', 'https://source.unsplash.com/xyE1p1rG04U', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(699, 'Katari', 'katari', 'https://source.unsplash.com/6yBAQeeNROU', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(700, 'Pokhari', 'pokhari', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(701, 'Rampur Jhilke', 'rampur-jhilke', 'https://source.unsplash.com/u3aYUsaHT20', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(702, 'Ratapani (Thoksila)', 'ratapani-thoksila', 'https://source.unsplash.com/6yBAQeeNROU', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:14', '2022-08-17 03:28:14'),
(703, 'Rauta Murkuchi', 'rauta-murkuchi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(704, 'Sorung Chhabise', 'sorung-chhabise', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(705, 'Udayapur Gadhi', 'udayapur-gadhi', 'https://source.unsplash.com/6yBAQeeNROU', 0, '14', NULL, NULL, NULL, 1, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(706, 'Byastada', 'byastada', 'https://source.unsplash.com/6yBAQeeNROU', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(707, 'Dhungeshwor', 'dhungeshwor', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(708, 'Dullu', 'dullu', 'https://source.unsplash.com/xyE1p1rG04U', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(709, 'Gaidabaj', 'gaidabaj', 'https://source.unsplash.com/6yBAQeeNROU', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(710, 'Jambu Kandha', 'jambu-kandha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(711, 'Malika', 'malika', 'https://source.unsplash.com/u3aYUsaHT20', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(712, 'Naumule', 'naumule', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(713, 'Rakam Karnali', 'rakam-karnali', 'https://source.unsplash.com/xyE1p1rG04U', 0, '68', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(714, 'Foksundo', 'foksundo', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(715, 'Juphal', 'juphal', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(716, 'Kaigaun', 'kaigaun', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(717, 'Liku', 'liku', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(718, 'Namdo', 'namdo', 'https://source.unsplash.com/u3aYUsaHT20', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(719, 'Sarmi', 'sarmi', 'https://source.unsplash.com/xyE1p1rG04U', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(720, 'Tripurakot', 'tripurakot', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '62', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(721, 'Darma', 'darma', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '63', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(722, 'Lali', 'lali', 'https://source.unsplash.com/u3aYUsaHT20', 0, '63', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(723, 'Muchu', 'muchu', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '63', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(724, 'Sarkegadh', 'sarkegadh', 'https://source.unsplash.com/6yBAQeeNROU', 0, '63', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(725, 'Srinagar', 'srinagar', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '63', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(726, 'Dalli', 'dalli', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(727, 'Dashera', 'dashera', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(728, 'Dhime', 'dhime', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(729, 'Garkhakot', 'garkhakot', 'https://source.unsplash.com/u3aYUsaHT20', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(730, 'Karkigaun', 'karkigaun', 'https://source.unsplash.com/u3aYUsaHT20', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:15', '2022-08-17 03:28:15'),
(731, 'Ragda', 'ragda', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(732, 'Rokaya gaun (Limsa)', 'rokaya-gaun-limsa', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(733, 'Thalaraikar', 'thalaraikar', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '69', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(734, 'Chautha', 'chautha', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(735, 'Dillichaur', 'dillichaur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(736, 'Hatsinja', 'hatsinja', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(737, 'Kalikakhetu', 'kalikakhetu', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(738, 'Malikathata', 'malikathata', 'https://source.unsplash.com/u3aYUsaHT20', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(739, 'Narakot', 'narakot', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(740, 'Tatopani', 'tatopani', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '64', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(741, 'Jubitha', 'jubitha', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(742, 'Kalikot', 'kalikot', 'https://source.unsplash.com/xyE1p1rG04U', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(743, 'Kotbada', 'kotbada', 'https://source.unsplash.com/xyE1p1rG04U', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(744, 'Mehalmudi', 'mehalmudi', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(745, 'Padamghat', 'padamghat', 'https://source.unsplash.com/u3aYUsaHT20', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(746, 'Sanniraskot', 'sanniraskot', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(747, 'Thirpu', 'thirpu', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '65', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(748, 'Dhainkot', 'dhainkot', 'https://source.unsplash.com/xyE1p1rG04U', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:16', '2022-08-17 03:28:16'),
(749, 'Gumtha', 'gumtha', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(750, 'Pulu', 'pulu', 'https://source.unsplash.com/Wj9ELwGXa6c', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(751, 'Rara', 'rara', 'https://source.unsplash.com/xyE1p1rG04U', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(752, 'Rowa', 'rowa', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(753, 'Sorubarma', 'sorubarma', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(754, 'Sukhadhik', 'sukhadhik', 'https://source.unsplash.com/u3aYUsaHT20', 0, '66', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(755, 'Bhalchaur', 'bhalchaur', 'https://source.unsplash.com/6yBAQeeNROU', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(756, 'Dhanbang', 'dhanbang', 'https://source.unsplash.com/u3aYUsaHT20', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(757, 'Kalimati Kalche', 'kalimati-kalche', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(758, 'Luham', 'luham', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(759, 'Mahaneta', 'mahaneta', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(760, 'Maidu', 'maidu', 'https://source.unsplash.com/6yBAQeeNROU', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(761, 'Malneta', 'malneta', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(762, 'Ragechour', 'ragechour', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(763, 'Tharmare', 'tharmare', 'https://source.unsplash.com/u3aYUsaHT20', 0, '61', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(764, 'Babiyachaur', 'babiyachaur', 'https://source.unsplash.com/L4NA2qRqK0s', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(765, 'Bheriganga', 'bheriganga', 'https://source.unsplash.com/2Q2dpVPY6XU', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(766, 'Chhinchu', 'chhinchu', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(767, 'Garpan', 'garpan', 'https://source.unsplash.com/6yBAQeeNROU', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(768, 'Gumi', 'gumi', 'https://source.unsplash.com/u3aYUsaHT20', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(769, 'Gutu', 'gutu', 'https://source.unsplash.com/KKm1ua7MSf0', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(770, 'Kunathari', 'kunathari', 'https://source.unsplash.com/u3aYUsaHT20', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:17', '2022-08-17 03:28:17'),
(771, 'Matela', 'matela', 'https://source.unsplash.com/u3aYUsaHT20', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:18', '2022-08-17 03:28:18'),
(772, 'Ramghat', 'ramghat', 'https://source.unsplash.com/u3aYUsaHT20', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:18', '2022-08-17 03:28:18'),
(773, 'Sahare', 'sahare', 'https://source.unsplash.com/u3aYUsaHT20', 0, '67', NULL, NULL, NULL, 6, '2022-08-17 03:28:18', '2022-08-17 03:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_lists`
--

CREATE TABLE `conversation_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conversation_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` date DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_from` enum('facebook','google','normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_credentials`
--

CREATE TABLE `device_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'browser that users logged in with',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regionName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `as` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `np_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_slug` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `np_slug` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `np_name`, `en_name`, `en_slug`, `np_slug`, `province`, `created_at`, `updated_at`) VALUES
(1, 'भोजपुर', 'Bhojpur', 'bhojpur', 'भोजपुर', 1, NULL, NULL),
(2, 'धनकुटा', 'Dhankuta', 'dhankuta', 'धनकुटा', 1, NULL, NULL),
(3, 'इलाम', 'Ilam', 'ilam', 'इलाम', 1, NULL, NULL),
(4, 'झापा', 'Jhapa', 'jhapa', 'झापा', 1, NULL, NULL),
(5, 'खोटाँग', 'Khotang', 'khotang', 'खोटाँग', 1, NULL, NULL),
(6, 'मोरंग', 'Morang', 'morang', 'मोरंग', 1, NULL, NULL),
(7, 'ओखलढुंगा', 'Okhaldhunga', 'okhaldhunga', 'ओखलढुंगा', 1, NULL, NULL),
(8, 'पांचथर', 'Panchthar', 'panchthar', 'पांचथर', 1, NULL, NULL),
(9, 'संखुवासभा', 'Sankhuwasabha', 'sankhuwasabha', 'संखुवासभा', 1, NULL, NULL),
(10, 'सोलुखुम्बू', 'Solukhumbu', 'solukhumbu', 'सोलुखुम्बू', 1, NULL, NULL),
(11, 'सुनसरी', 'Sunsari', 'sunsari', 'सुनसरी', 1, NULL, NULL),
(12, 'ताप्लेजुंग', 'Taplejung', 'taplejung', 'ताप्लेजुंग', 1, NULL, NULL),
(13, 'तेह्रथुम', 'Terhathum', 'terhathum', 'तेह्रथुम', 1, NULL, NULL),
(14, 'उदयपुर', 'Udayapur', 'udayapur', 'उदयपुर', 1, NULL, NULL),
(15, 'सप्तरी', 'Saptari', 'saptari', 'सप्तरी', 2, NULL, NULL),
(16, 'सिराहा', 'Siraha', 'siraha', 'सिराहा', 2, NULL, NULL),
(17, 'धनुषा', 'Dhanusha', 'dhanusha', 'धनुषा', 2, NULL, NULL),
(18, 'महोत्तरी', 'Mahottari', 'mahottari', 'महोत्तरी', 2, NULL, NULL),
(19, 'सर्लाही', 'Sarlahi', 'sarlahi', 'सर्लाही', 2, NULL, NULL),
(20, 'बारा', 'Bara', 'bara', 'बारा', 2, NULL, NULL),
(21, 'पर्सा', 'Parsa', 'parsa', 'पर्सा', 2, NULL, NULL),
(22, 'रौतहट', 'Rautahat', 'rautahat', 'रौतहट', 2, NULL, NULL),
(23, 'सिन्धुली', 'Sindhuli', 'sindhuli', 'सिन्धुली', 3, NULL, NULL),
(24, 'रामेछाप', 'Ramechhap', 'ramechhap', 'रामेछाप', 3, NULL, NULL),
(25, 'दोलखा', 'Dolakha', 'dolakha', 'दोलखा', 3, NULL, NULL),
(26, 'भक्तपुर', 'Bhaktapur', 'bhaktapur', 'भक्तपुर', 3, NULL, NULL),
(27, 'धादिङ', 'Dhading', 'dhading', 'धादिङ', 3, NULL, NULL),
(28, 'काठमाडौँ', 'Kathmandu', 'kathmandu', 'काठमाडौँ', 3, NULL, NULL),
(29, 'काभ्रेपलान्चोक', 'Kavrepalanchok', 'kavrepalanchok', 'काभ्रेपलान्चोक', 3, NULL, NULL),
(30, 'ललितपुर', 'Lalitpur', 'lalitpur', 'ललितपुर', 3, NULL, NULL),
(31, 'नुवाकोट', 'Nuwakot', 'nuwakot', 'नुवाकोट', 3, NULL, NULL),
(32, 'रसुवा', 'Rasuwa', 'rasuwa', 'रसुवा', 3, NULL, NULL),
(33, 'सिन्धुपाल्चोक', 'Sindhupalchok', 'Sindhupalchok', 'सिन्धुपाल्चोक', 3, NULL, NULL),
(34, 'चितवन', 'Chitwan', 'chitwan', 'चितवन', 3, NULL, NULL),
(35, 'मकवानपुर', 'Makwanpur', 'makwanpur', 'मकवानपुर', 3, NULL, NULL),
(36, 'बागलुङ', 'Baglung', 'baglung', 'बागलुङ', 4, NULL, NULL),
(37, 'गोरखा', 'Gorkha', 'gorkha', 'गोरखा', 4, NULL, NULL),
(38, 'कास्की', 'Kaski', 'kaski', 'कास्की', 4, NULL, NULL),
(39, 'लमजुङ', 'Lamjung', 'lamjung', 'लमजुङ', 4, NULL, NULL),
(40, 'मनाङ', 'Manang', 'manang', 'मनाङ', 4, NULL, NULL),
(41, 'मुस्ताङ', 'Mustang', 'mustang', 'मुस्ताङ', 4, NULL, NULL),
(42, 'म्याग्दी', 'Myagdi', 'myagdi', 'म्याग्दी', 4, NULL, NULL),
(43, 'नवलपुर', 'Nawalpur', 'nawalpur', 'नवलपुर', 4, NULL, NULL),
(45, 'पर्वत', 'Parbat', 'parbat', 'पर्वत', 4, NULL, NULL),
(46, 'स्याङग्जा', 'Syangja', 'syangja', 'स्याङग्जा', 4, NULL, NULL),
(47, 'तनहुँ', 'Tanahun', 'tanahun', 'तनहुँ', 4, NULL, NULL),
(48, 'कपिलवस्तु', 'Kapilvastu', 'kapilvastu', 'कपिलवस्तु', 5, NULL, NULL),
(49, 'परासी', 'Parasi', 'parasi', 'परासी', 5, NULL, NULL),
(50, 'रुपन्देही', 'Rupandehi', 'rupandehi', 'रुपन्देही', 5, NULL, NULL),
(51, 'अर्घाखाँची', 'Arghakhanchi', 'arghakhanchi', 'अर्घाखाँची', 5, NULL, NULL),
(52, 'गुल्मी', 'Gulmi', 'gulmi', 'गुल्मी', 5, NULL, NULL),
(53, 'पाल्पा', 'Palpa', 'palpa', 'पाल्पा', 5, NULL, NULL),
(54, 'दाङ', 'Dang', 'dang', 'दाङ', 5, NULL, NULL),
(55, 'प्युठान', 'Pyuthan', 'pyuthan', 'प्युठान', 5, NULL, NULL),
(56, 'रोल्पा', 'Rolpa', 'rolpa', 'रोल्पा', 5, NULL, NULL),
(57, 'पूर्वी रूकुम', 'Eastern Rukum', 'eastern-rukum', 'पूर्वी-रूकुम', 5, NULL, NULL),
(58, 'बाँके', 'Banke', 'banke', 'बाँके', 5, NULL, NULL),
(59, 'बर्दिया', 'Bardiya', 'bardiya', 'बर्दिया', 5, NULL, NULL),
(60, 'पश्चिमी रूकुम', 'Western Rukum', 'western-rukum', 'पश्चिमी-रूकुम', 6, NULL, NULL),
(61, 'सल्यान', 'Salyan', 'salyan', 'सल्यान', 6, NULL, NULL),
(62, 'डोल्पा', 'Dolpa', 'dolpa', 'डोल्पा', 6, NULL, NULL),
(63, 'हुम्ला', 'Humla', 'humla', 'हुम्ला', 6, NULL, NULL),
(64, 'जुम्ला', 'Jumla', 'jumla', 'जुम्ला', 6, NULL, NULL),
(65, 'कालिकोट', 'Kalikot', 'kalikot', 'कालिकोट', 6, NULL, NULL),
(66, 'मुगु', 'Mugu', 'mugu', 'मुगु', 6, NULL, NULL),
(67, 'सुर्खेत', 'Surkhet', 'surkhet', 'सुर्खेत', 6, NULL, NULL),
(68, 'दैलेख', 'Dailekh', 'dailekh', 'दैलेख', 6, NULL, NULL),
(69, 'जाजरकोट', 'Jajarkot', 'jajarkot', 'जाजरकोट', 6, NULL, NULL),
(70, 'कैलाली', 'Kailali', 'kailali', 'कैलाली', 7, NULL, NULL),
(71, 'अछाम', 'Achham', 'achham', 'अछाम', 7, NULL, NULL),
(72, 'डोटी', 'Doti', 'doti', 'डोटी', 7, NULL, NULL),
(73, 'बझाङ', 'Bajhang', 'bajhang', 'बझाङ', 7, NULL, NULL),
(74, 'बाजुरा', 'Bajura', 'bajura', 'बाजुरा', 7, NULL, NULL),
(75, 'कंचनपुर', 'Kanchanpur', 'kanchanpur', 'कंचनपुर', 7, NULL, NULL),
(76, 'डडेलधुरा', 'Dadeldhura', 'dadeldhura', 'डडेलधुरा', 7, NULL, NULL),
(77, 'बैतडी', 'Baitadi', 'baitadi', 'बैतडी', 7, NULL, NULL),
(78, 'दार्चुला', 'Darchula', 'darchula', 'दार्चुला', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `contact_info`, `subject`, `message`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'Stacy Knowles', 'guxizyjel@mailinator.com', '23', 'Aspernatur sed conse', 'Esse iste omnis null', NULL, '2022-08-17 04:10:05', '2022-08-17 04:10:05'),
(2, 'Gloria Marks', 'wunyvezuly@mailinator.com', '878', 'Enim quis eu ipsum', 'Inventore id quidem', NULL, '2022-08-17 04:22:02', '2022-08-17 04:22:02'),
(3, 'Candice Curry', 'dikalalov@mailinator.com', '680', 'Saepe esse adipisici', 'Est sint consequat', NULL, '2022-08-17 04:25:51', '2022-08-17 04:25:51'),
(4, 'Grace Porter', 'pinyzijyr@mailinator.com', '927', 'Dolore cumque laudan', 'Aliquip dolores ex q', NULL, '2022-08-17 06:05:03', '2022-08-17 06:05:03'),
(5, 'beticuwov@mailinator.com', 'dujifuwyz@mailinator.com', 'lujaf@mailinator.com', 'fumoloc@mailinator.com', 'Adipisci repellendus', NULL, '2022-08-17 23:12:24', '2022-08-17 23:12:24'),
(6, 'Dara Dalton', 'siniseteb@mailinator.com', '393', 'Nam eligendi odio qu', 'Iusto quis corporis', NULL, '2022-08-17 23:41:01', '2022-08-17 23:41:01'),
(7, 'Brendan Merritt', 'tavodepeme@mailinator.com', '310', 'Irure eveniet qui v', 'Dolor laudantium eu', NULL, '2022-08-17 23:42:24', '2022-08-17 23:42:24'),
(8, 'Price Turner', 'dinyrika@mailinator.com', '209', 'Ex rem odit iste min', 'Optio autem enim vo', NULL, '2022-08-17 23:44:26', '2022-08-17 23:44:26'),
(9, 'Yuli Joyce', 'papy@mailinator.com', '225', 'Et temporibus eos am', 'Est fugit assumend', NULL, '2022-08-17 23:44:57', '2022-08-17 23:44:57'),
(10, 'Kadeem Pearson', 'rope@mailinator.com', '664', 'Quaerat sit rem rep', 'Provident dolor sim', NULL, '2022-08-17 23:45:42', '2022-08-17 23:45:42'),
(11, 'Ross Bowen', 'kudi@mailinator.com', '487', 'Porro fugiat aute mo', 'Consectetur quis qui', NULL, '2022-08-17 23:46:15', '2022-08-17 23:46:15'),
(12, 'Thomas Bowen', 'muzagut@mailinator.com', '144', 'In velit sint labor', 'Cumque magni eu dolo', NULL, '2022-08-17 23:46:37', '2022-08-17 23:46:37'),
(13, 'Zenaida Crawford', 'zucyzekog@mailinator.com', '290', 'Provident lorem omn', 'Dolore suscipit aut', NULL, '2022-08-17 23:47:01', '2022-08-17 23:47:01'),
(14, 'Trevor Hines', 'cibolehibi@mailinator.com', '164', 'Iure ea fuga Et vit', 'Quaerat cum enim con', NULL, '2022-08-17 23:47:15', '2022-08-17 23:47:15'),
(15, 'Azalia Owen', 'xamojol@mailinator.com', '739', 'Lorem ut fugit ut s', 'Ipsam magna tempore', NULL, '2022-08-17 23:47:58', '2022-08-17 23:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `meta_keyword`, `meta_description`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'How do I cancel my account?', '<p>If you would like to cancel your account, please contact us at linkedhill@gmail.com please let us know your first and last name and the email address associated with your account. Once the account has been cancelled we will confirm with you via email.</p>', NULL, NULL, 1, NULL, '2022-08-17 23:53:42', '2022-08-17 23:53:42'),
(2, 'How do I contact if I need to speak with someone about enquiries, complaints, advertisement and other general information?', '<p>We have categorised customer service into three ways. The best possible ways are:<br>(i) Email us directly at: &nbsp;linkedhill@gmail.com&nbsp;<br>(ii) Live Chat which is located at the bottom right side of the website or app.<br>(iii) We have a section as ‘Contact us’ in Homepage where you can send a quick message with your personal details.&nbsp;<br>Note: Please address us the subject and our team will contact you through various ways of communication with prior notification.</p>', NULL, NULL, 1, NULL, '2022-08-17 23:54:38', '2022-08-17 23:54:38'),
(3, 'How do I become an Agent?', '<p>We have a section called &nbsp;‘Become an Agent’ where you can fill all your details and security questions. We will then Verify your details as an individual agent or businesses and register you in our system which will take from 2-3 days in order to maintain a valid portfolio.&nbsp;</p>', NULL, NULL, 1, NULL, '2022-08-17 23:55:28', '2022-08-17 23:55:28'),
(4, 'Do you get involve in Property Sales?', '<p>We are completely an advertising and marketing agency and we do not have any connections with the sales. We highly encourage everyone to contact directly to the relevant business or individuals. The contact details are provided underneath the property details.</p>', NULL, NULL, 1, NULL, '2022-08-17 23:56:52', '2022-08-17 23:56:52'),
(5, 'Do I have to pay commission after the property sold from Linkedhill site?', '<p>Absolutely not. With clarity, we only onetime charge as an Administration fee before listing any property once you signup with the business. But at the moment, we are running it with free of cost and if you want to upgrade for pricing plans, please feel free to navigate our site.</p>', NULL, NULL, 1, NULL, '2022-08-17 23:57:38', '2022-08-17 23:57:38'),
(6, 'What are the Charges for advertising in Linkedhill?', '<p>At this moment, we are running business on Promotion phase. We are listing all types of rental properties or properties on sale with free of cost. But we have various plans with better feature and more sales target which is more suitable for the businesses or even an individuals once you are logged in to our website/mobile apps.</p>', NULL, NULL, 1, NULL, '2022-08-17 23:58:29', '2022-08-17 23:58:29'),
(7, 'How much time it will take to appear my ad in the website?', '<p>Once you’ve submitted your details, we will verify it for security reasons and its authenticity. Once verified, it will be appear within 1-2 business days.</p>', NULL, NULL, 1, NULL, '2022-08-17 23:59:19', '2022-08-17 23:59:19'),
(8, 'How to post an advertisement to sell/rent my property?', '<p>We have an option ‘Post Property Free’ in Top right side of Homepage. Simply, click the link and fill all your property details as an individual or business.</p>', NULL, NULL, 1, NULL, '2022-08-18 00:00:01', '2022-08-18 00:00:01'),
(9, 'How to create an account in Linkedhill?', '<p>You can select the option ‘Signup’ in Website or in mobile application. You will then have to &nbsp;fill your details as an individual or business with some security information in order to protect your account.</p>', NULL, NULL, 1, NULL, '2022-08-18 00:00:37', '2022-08-18 00:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_lists`
--

CREATE TABLE `favourite_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Type of Feature maybe [text,Booelan,Image]=>[1,2,3]',
  `position` int(11) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `description`, `image`, `type`, `position`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'benchmark B2B systems', NULL, '0', 2, 2, NULL, '2022-08-17 03:27:43', '2022-08-17 03:27:43'),
(2, 'revolutionize collaborative vortals', NULL, '0', 1, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(3, 'streamline seamless markets', NULL, '0', 2, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(4, 'scale ubiquitous ROI', NULL, '0', 1, 1, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(5, 'reinvent bricks-and-clicks systems', NULL, '0', 1, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(6, 'engage dynamic eyeballs', NULL, '0', 2, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(7, 'monetize back-end technologies', NULL, '0', 2, 1, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(8, 'architect 24/7 web-readiness', NULL, '0', 2, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(9, 'aggregate extensible applications', NULL, '0', 2, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44'),
(10, 'facilitate extensible webservices', NULL, '0', 2, 2, NULL, '2022-08-17 03:27:44', '2022-08-17 03:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `feature_property`
--

CREATE TABLE `feature_property` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature_property_category`
--

CREATE TABLE `feature_property_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `property_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_property_category`
--

INSERT INTO `feature_property_category` (`id`, `feature_id`, `property_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 2, 2, NULL, NULL),
(10, 2, 3, NULL, NULL),
(11, 2, 4, NULL, NULL),
(12, 2, 5, NULL, NULL),
(13, 2, 6, NULL, NULL),
(14, 2, 7, NULL, NULL),
(15, 2, 8, NULL, NULL),
(16, 3, 1, NULL, NULL),
(17, 3, 2, NULL, NULL),
(18, 3, 3, NULL, NULL),
(19, 3, 4, NULL, NULL),
(20, 3, 5, NULL, NULL),
(21, 3, 6, NULL, NULL),
(22, 3, 7, NULL, NULL),
(23, 3, 8, NULL, NULL),
(24, 4, 5, NULL, NULL),
(25, 4, 6, NULL, NULL),
(26, 4, 7, NULL, NULL),
(27, 4, 8, NULL, NULL),
(28, 5, 1, NULL, NULL),
(29, 5, 2, NULL, NULL),
(30, 5, 3, NULL, NULL),
(31, 5, 4, NULL, NULL),
(32, 5, 5, NULL, NULL),
(33, 5, 6, NULL, NULL),
(34, 5, 7, NULL, NULL),
(35, 5, 8, NULL, NULL),
(36, 6, 5, NULL, NULL),
(37, 6, 6, NULL, NULL),
(38, 6, 7, NULL, NULL),
(39, 6, 8, NULL, NULL),
(40, 7, 1, NULL, NULL),
(41, 7, 2, NULL, NULL),
(42, 7, 3, NULL, NULL),
(43, 7, 4, NULL, NULL),
(44, 7, 5, NULL, NULL),
(45, 7, 6, NULL, NULL),
(46, 7, 7, NULL, NULL),
(47, 7, 8, NULL, NULL),
(48, 8, 8, NULL, NULL),
(49, 9, 7, NULL, NULL),
(50, 9, 8, NULL, NULL),
(51, 10, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `slug`, `url`, `type`, `show`, `description`, `order`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Home', '', '', 'home', '[\"header\"]', NULL, 1, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, NULL),
(2, NULL, 'About Us', 'about-us', NULL, 'about', '[\"header\"]', '<p><strong>Who we are</strong><br>Linkedhill is a digital marketing &amp; advertising company which focuses on delivering results to our customers, clients and people covering multiple property searches. Linkedhill has grown to become Nepal’s leading real estate &amp; property online portal featuring largest range of residential, commercial &amp; agricultural property networks.<br>Established in 2021, Linkedhill has transformed the experience of looking for a property for hundreds of thousands of property hunters and has also provided estate agents with an efficient and effective marketing tool.</p><p><strong>What we do</strong><br>For all properties listed in our online platform, we combine strong marketing campaigns, product knowledge to the related parties and skilful customer service skills to deliver outstanding results and achieving successful record. We also have an extensive Services section which allows users to search a comprehensive directory of Service Providers or just browse our many articles on Home Improvement tips and advice.<br>With our extensive property listings and our wide property search options the Linkedhill.com.np site has created a significantly more convenient and effective way for property hunters to find their next property whatever the criteria; buying or renting.<br>With our various mobile apps and mobile site growing in popularity, Linkedhill attracts tremendous page impressions per month, with high number of visitors. These figures continue to rise year-on-year making Linkedhill one of the fastest growing property sites around.</p><p><strong>Our Commitment</strong><br>Our business relationship has been built on proven results, honesty, integrity, professionalism, ethics and good hard work within a short period of time.<br>Our team’s dedication and commitment to establish individual relationships with all our valued clients, whether an investor, a landlord, a property owner looking to sell, a tenant or a first home buyer looking to enter the property market for the very first time, every person whatever their circumstances are is super important to us all.</p>', 2, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, '2022-08-17 03:48:48'),
(3, NULL, 'Property', 'properties', '', 'property', '[\"header\"]', NULL, 3, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, NULL),
(4, NULL, 'Blogs', 'blogs', '', 'blog', '[\"header\"]', NULL, 4, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, NULL),
(5, NULL, 'News', 'news', '', 'news', '[\"header\"]', NULL, 5, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, NULL),
(6, NULL, 'Contact Us', 'contact-us', '', 'contact', '[\"header\"]', NULL, 6, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, NULL),
(7, NULL, 'Our Services', 'our-services', NULL, 'service', '[\"header\"]', '<p><strong>Real estate &amp; Property</strong><br>Linkedhill assist all individuals, businesses, and investors in buying, renting and selling properties through our online marketing &amp; advertising platform. We provide services regarding areas which are typically described and divided up into :</p><p><br><strong>Residential:&nbsp;</strong><br>Residential real estate consists of housing for individuals, families, or groups of people used for residential purposes. Examples include both new construction and resale homes, cooperatives, duplexes, townhouses and other types of living arrangements.</p><p><br><strong>Commercial:&nbsp;</strong><br>Commercial property refers to land and buildings that are used by businesses to carry out their operations. Examples include shopping malls, individual stores, office buildings, parking lots, medical centres, hotels etc.</p><p><br><strong>Industrial:&nbsp;</strong><br>Industrial real estate refers to land and buildings that are used by industrial businesses for activities such as factories, mechanical productions, research and development, construction, transportation, logistics, and warehousing.</p><p><br><strong>Land:&nbsp;</strong><br>Includes undeveloped property, vacant land, and agricultural land</p>', 7, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, '2022-08-17 03:48:01'),
(8, NULL, 'Privacy & Policy', 'privacy-policy', NULL, 'basic', '[\"footer\"]', '<p><strong>Introduction</strong></p><p>Linkedhill understands that your personal information is important to you and you are concerned with its collection, use and disclosure. To deliver our commitment to privacy, Linkedhill is committed in handling the personal information we collect in an open and transparent manner complying with the legislation and regulations of &nbsp;Nepalese government.</p><p>This privacy policy has been created to explain how and why we collect and use information about our users, and how we manage your privacy protection. It also sets out your rights in relation to accessing the personal information we collect and hold about you. We recommend that you read this statement in full, so that you understand how we will use your personal data.</p><p><strong>&nbsp;</strong></p><p><strong>How do we Collect your Personal Information ?</strong></p><p>You may provide personal information to us to receive information about products or services offered through this website, to purchase such products and services, to receive newsletters or become involved in promotions or other initiatives commenced by us.</p><p>Generally, we collect your information directly from you where possible. We may collect and update your information over the phone, by email, or over the internet or social media&nbsp; when you:</p><p>• Visit our website and complete an online enquiry or a form for the purpose of requesting and/or accessing certain services on our website;</p><p>• Making any requests or transactions through the Sites or from other sources;</p><p>•&nbsp;Tell us about your preferences when making an enquiry or using our products and services;</p><p>•&nbsp;Contact us to provide feedback, comments or suggestions on our functions and activities or complete one of our surveys;</p><p>•&nbsp;Interact or engage with us through our websites or social media platforms;</p><p>•&nbsp;Register, attend or present at one of our conferences, training sessions and events;</p><p>•&nbsp;Attend property inspections or visit our offices, including via manual sign-in and security surveillance of our offices;</p><p>•&nbsp;Subscribe to communications from us such as updates, publications or newsletters;</p><p>•&nbsp;Apply for a job with us or become an employee, or become a supplier or contractor that provide a product or service to Linkedhill;</p><p>•&nbsp;Otherwise interact with us or disclose your personal information to us.</p><p>If we collect personal information about you from a third party and it is unclear that you have consented to the disclosure of your personal information to us, we will take reasonable steps to contact you and ensure that you are aware of the circumstances surrounding the collection and purposes for which we collected your personal information.</p><p>&nbsp;</p><p><strong>What Personal Information does Linkedhill collect?</strong></p><p>Personal information is any information about you, from which you can be identified. When you use our Services, we may ask you to register and/or provide information that personally identifies you for purposes of interacting with our Services. We may collect additional personal information from you from time to time. On any page that collects personal information, we will specifically describe what information is required in order to provide you with the product or service or enter you in the promotion you have requested, as well as to respond to your inquiry or comment.</p><p>The kinds of personal information we collect or which we may hold about you may include:</p><p>•&nbsp;Name, username, email address, telephone number, Birth date and gender, home, business, and billing addressees (including street and postal code);</p><p>•&nbsp;Government issued Identification required for identity verification, such as passport, driver’s license, government redress numbers, and country of residence (for travel insurance purposes), tax identification number;</p><p>•&nbsp;Payment information such as payment card number, expiration date, billing address, and financial account number;</p><p>•&nbsp;Geolocation;</p><p>•&nbsp;Images (including facial photographs), videos, and other recordings;</p><p>•&nbsp;Social media account ID and other publicly available information;</p><p>•&nbsp;Communications with us (such as recordings of calls with customer service representatives for quality assurance and training purposes);</p><p>•&nbsp;Searches you conduct, transactions, and other interactions with you on our online services and Apps;</p><p>•&nbsp;The searches and transactions conducted through the platform;</p><p>•&nbsp;Details about your earnings (e.g. home loan calculator);</p><p>•&nbsp;Information on how you use our products and services;</p><p>•&nbsp;Personal preferences or views regarding products and services;&nbsp;</p><p>•&nbsp;Your Internet Protocol (“IP”) address, server address, domain name and information on your browsing activity when visiting one of our websites;</p><p>•&nbsp;Your user name for social networking sites that you use, to refer to, or in conjunction with, our goods and services;</p><p>&nbsp;</p><p><strong>Why do we collect, hold, use and disclose your personal information ?</strong></p><p>There are various reasons why we might need to collect, hold, use or disclose your personal information and this will depend upon the specific services that we are providing to you. Usually, the main reason that we will need to collect your personal information will be relating to a service that we are providing to you or are about to provide to you and for contacting you in relation to those services.</p><p>We may collect, hold, use and disclose your personal information for the following&nbsp;purposes:</p><p>•&nbsp;To provide customer support including conducting, investigating and responding to requests, enquiries, surveys, feedback, comment, complaints and other customer care or brand protection related activities;</p><p>•&nbsp;To facilitate your access to the Site and the functionality provided by the Site in order to provide you with access to all or part of the Site or functionality offered through the Site;</p><p>•&nbsp;To provide the products or services you have requested from us and keep a record of them;</p><p>• To assist us to run our business and to improve our services and performance, including staff training, accounting, risk management, record keeping, archiving, systems development, developing new products and services and undertaking planning, research and statistical analysis;</p><p>&nbsp;•&nbsp;To assess the performance of our websites and improve the operation of the websites;</p><p>•&nbsp;Sales and delivery of our products - including preparing sales documentation, obtaining credit/debit card information to complete a sale and arranging delivery;</p><p>&nbsp;•&nbsp;To plan, market, host and facilitate our conferences, training sessions and events;</p><p>&nbsp;•&nbsp;To inform and conduct marketing activities including to promote our products and services;</p><p>•&nbsp;To contact you in relation to an event, special offer or product that you might be interested in;</p><p>• Providing financial advice and services;</p><p>• Payment processing;</p><p>• Processing a refund or exchange of a product/services;</p><p>• Carrying out any activity in connection with a legal, governmental or regulatory requirement that we have to comply with, or in connection with legal proceedings, crime or fraud prevention, detection or prosecution</p><p>There is no obligation for you to provide us with any of your personal information but if you choose not to provide us with your personal information, we may not be able to provide the information, goods or services that you require.</p><p>&nbsp;</p><p><strong>How do we use your Personal Information?</strong></p><p>Any Personal Information that we collect will be used by us to enable us to provide you with the services that you have requested for the following purposes:</p><p>•&nbsp;To provide products and services to you</p><p>•&nbsp;To provide you with information, newsletters or other communications</p><p>•&nbsp;To involve you in promotions and other initiatives undertaken by us&nbsp;</p><p>•&nbsp;To fulfill your&nbsp;order or requests for services and provide customer service</p><p>•&nbsp;To create and maintain your account</p><p>•&nbsp;To conduct auditing and monitoring of transactions and engagement</p><p>•&nbsp;To conduct marketing, personalization, and third-party advertising</p><p>•&nbsp;To protect the security and integrity of our websites, mobile services and our business, and help prevent fraud</p><p>•&nbsp;To update our operational and technical functionality</p><p>•&nbsp;To conduct business analysis, such as analytics, projections, identifying areas for operational improvement</p><p>•&nbsp;To conduct research and development</p><p>•&nbsp;To fulfill our legal function or obligations</p><p>•&nbsp;To use your data to generate statistics about our site that do not identify you using third-party assets such as cookies. Please see our Cookie Policy for more details.</p><p>Some of the uses of the information described above may be provided by third parties, who are authorised to use this personal information for these purposes.</p><p>We may use your personal information for direct marketing or promotional activities., However, if we do undertake such activities, you will be provided with an opportunity when first contacted to decline to receive any further communications from us.</p><p>Other than for the purposes described above, we will not use your personal information without your prior consent. The only exception to this rule is where disclosure is necessary to prevent injury to life or health, to investigate any suspected unlawful activity or where it may be required by law such as in a response to a warrant, or other legal process.</p><p>&nbsp;</p><p><strong>Storage &amp; Security of Personal Information</strong></p><p>We will take reasonable steps to ensure that the personal information that we hold is stored in a secure environment protected from misuse, interference and loss and any unauthorised access, modification or disclosure.</p><p>In order to ensure the security of your personal data, we apply necessary legal, organizational and technical measures aimed at protecting Personal data from unauthorized or accidental access, destruction, change, blocking, copying, provision, disclosure, as well as from other illegal actions in relation to Visitors Personal data. We will usually keep your information for as long as you have an account with us and as long as you access and use our Services. Whenever you request it, we will erase your information as soon as practically practicable, depending on your account behaviour and in accordance with relevant laws. However, for legal reasons, we may archive and/or preserve some information.</p><p>Whilst we take all reasonable steps to ensure the security of all information we collect, we cannot provide any guarantee with respect to the security of your personal information and will not be liable for any breach of security or unintended loss or disclosure of information due to data transmission over the internet or information stored on serves accessible through the internet.</p><p>&nbsp;</p><p><strong>Disclosure of Personal Information</strong></p><p><br>Personal information collected through this website is not disclosed or passed on to third parties unless it is in accordance with this privacy statement. We will disclose personal information we have about you only in certain specific circumstances, when:</p><p>• You agree to the disclosure; or</p><p>• We use it for the purposes we collected it; or</p><p>• Disclosure is required or authorised by law.</p><p>To the extent permitted by law, we may also disclose information about you as follows:</p><p>•&nbsp;To the other parties in any real estate transaction including developers, builders, vendors, landlords, purchasers and tenants, and their authorised representative;</p><p>&nbsp;•&nbsp;To our suppliers and service providers that provide products and services to assist us to perform our functions and activities such as marketing, events, recruitment, HR and share registry management;&nbsp;</p><p>•&nbsp;Other third parties who provide services to Linkedhill from time to time;</p><p>•&nbsp;To guarantors, other mortgage intermediaries, lenders, financial institutions, insurers, valuers and credit reporting bodies and providers;</p><p>•&nbsp;To your authorised representatives (lawyers, mortgage brokers, accountants and financial advisors);</p><p>&nbsp;•&nbsp;To debt collectors and utility companies;</p><p>• To regulatory bodies, government agencies and law enforcement bodies in any jurisdiction</p><p>We and our third-party service providers take all necessary steps to destroy or permanently de-identify your personal information where it is no longer required and to protect your personal information from loss, misuse and interference and from unauthorised access, modification or disclosure.</p><p>We will not disclose your personal information in circumstances other than those described above without your prior consent. The only exception to this rule is where disclosure is necessary to prevent injury to life or health, to investigate any suspected unlawful activity or where it may be required by law such as in a response to a warrant or other legal process.</p><p>Your personal information will not be shared, sold, rented or disclosed other than as described in this Privacy Policy.</p><p>&nbsp;</p><p><strong>Access and correction of personal information</strong></p><p><strong>&nbsp;</strong></p><p>It is important to us that the information we hold about you is up-to-date, accurate and complete, and we will try to confirm your details through our communications with you and promptly add updated or new personal information to existing records when we are advised.&nbsp;Site users can change information in their profiles at any time by logging into their account through the Site. Site users have the right to request that their information be modified or deleted from our files.</p><p>Under the Privacy Act,&nbsp;if you believe we are holding information about you that is inaccurate, incomplete, irrelevant or misleading, you can ask us to correct it, or delete it altogether.<strong>&nbsp;</strong>To request access to the personal information that Linkedhill holds about you, or to update or correct that personal information, please send a written request at&nbsp;<a href=\"mailto:linkedhill@gmail.com\">linkedhill@gmail.com</a></p><p>&nbsp;</p><p><strong>Direct Marketing</strong></p><p>We will only send you marketing information where you have opted in to receive these communications.Marketing may be received via email, SMS, social media, or regular mail. You can change your marketing preferences at any time, by logging into your account and changing this on your account dashboard. You can also opt out of receiving marketing and&nbsp;third-party targeted advertising at any time using the unsubscribe link that can be found at the end of each email that we send.</p><p>&nbsp;</p><p><strong>Use of cookies &amp; other technologies</strong></p><p><strong>&nbsp;</strong></p><p>A cookie is an element of data that a website can send to your browser, which may then be stored on your system.&nbsp;Cookies are small files stored on your device that allow our websites to recognise a particular device or browser. Cookies may record information about your visit, including the type of browser and operating system you use, the previous site you visited, your server’s IP address, the pages you access, and the information downloaded by you.&nbsp;</p><p>&nbsp;</p><p>First-Party Cookies</p><p>First-party cookies are directly stored by the website (or domain) you visit. These cookies allow website owners to collect analytics data, remember language settings, and perform other useful functions that provide a good user experience.</p><p>&nbsp;</p><p>Third-Party Cookies</p><p>Third-party cookies are created by domains that are not the website (or domain) that you are visiting, hence the name third-party. They are typically used for cross-site tracking, retargeting and the personalised advertising.</p><p>&nbsp;</p><p>We and our Third-Party Service Providers use cookies and other similar technologies to track information about your use of our Sites to create an improved, more personalised shopping experience for you. We will always collect your personal information directly from you unless it is impracticable to do so. This would usually be done through the Website when you elect to disclose your personal information to us for a particular purpose.</p><p>The information we collect through tracking cookies on our website and social media accounts may also be used to determine demographic and usage patterns. We use this information to help us understand your interests, needs and preferences so that we can personalise your experience when engaging with us. We also collect this information to enable us to promote our products and services to you online and on social media.</p><p>Most browsers can be set to detect cookies and you can control how your browser deals with cookies by changing your browser settings (for example by rejecting cookies). However, in doing so, even if you delete cookies from your computer you can still use our Sites, but your user experience may be affected, and some features of the Sites may not function.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Links to other Websites</strong></p><p><br>Our Sites may contain links to third party websites, platforms or applications. We are not responsible for content or the privacy practices of those websites, platforms, or applications that are linked to our Sites. We recommend that you read the privacy policy and terms and conditions of any third-party website, platform or application that you intend to use.</p><p>&nbsp;</p><p><strong>How to unsubscribe</strong></p><p><strong>&nbsp;</strong></p><p>To opt-out of receiving Linkedhill marketing materials, you will need to unsubscribe from our marketing database.</p><ul><li><strong>Emails:</strong>&nbsp;Select the \'unsubscribe\' option in one of the emails that you\'ve received from us to unsubscribe from email marketing, this option can usually be found at the top right or bottom of the email.&nbsp;Please note that if you have an account with Linkedhill, we may still need to send you essential information about your account.</li><li><strong>SMS:</strong>&nbsp;When we send you marketing communications by SMS you will be able to opt-out from SMS marketing by texting STOP to the number in the SMS we sent you.</li></ul><p>&nbsp;</p><p><strong>Disclaimer</strong></p><p>Linkedhill endeavours to ensure that the information provided on this website is correct at the time of publication. However, Linkedhill does not warrant, guarantee or make representations regarding the currency, correctness, accuracy or suitability for a particular purpose of the information contained on this website.</p><p>&nbsp;The user accepts sole and full responsibility and risk associated with the use of this website and use of or reliance on any information contained within this website. Linkedhill does not accept any responsibility or liability for any direct or consequential loss, damage or inconvenience suffered or incurred as a result of use of this website, or use of or reliance on information contained within this website.</p><p>&nbsp;While the copyright of the information appearing on the website belongs to Linkedhill, you are welcome to use the information for non-commercial purposes. Any use of the information for commercial purposes and without the permission of Linkedhill may result in an action for breach of copyright.</p><p>&nbsp;</p><p><strong>How to contact us</strong></p><p>Complaints and Questions</p><p>We take your complaints seriously and will attempt to resolve your issue quickly and fairly.</p><p>If you feel your privacy has been breached, please contact us using the contact information setting out the circumstances and reasons for your complaint.</p><p>Our team members will acknowledge receipt of your complaint promptly and will normally respond to your request within 5 business days. If your complaint or query is complicated or requires further investigation our response may take additional time to finalise.</p><p>We will respond to you by your preferred contact method if you have indicated one.</p><p>If you are not satisfied with the result of your complaint to us, you can refer your complaint to Nepal government Authorities.</p><p>General Queries &amp; Complaints::</p><p>Email: linkedhill@gmail.com</p><p>&nbsp;</p><p><strong>Changes to this Privacy Statement</strong></p><p><br>This privacy policy may change from time to time particularly as new rules, regulations and industry codes are introduced.&nbsp;We may revise this Privacy Policy from time to time by updating this page. Changes to this Privacy Policy will be displayed as an updated version on our Sites.&nbsp;The revised Privacy Policy will take effect when it is posted on&nbsp;our website.</p><p>&nbsp;</p><p>We encourage you to periodically review this Privacy Policy, so you remain informed about how we handle your personal information.&nbsp; &nbsp;</p><p>This Privacy Policy is current at 07/04/2022</p><p>Thank you for taking the time to read our Privacy Statement.</p><p>With Sincerely</p><p>Linkedhill Management</p>', 8, 'https://source.unsplash.com/XbwHrt87mQ0', 1, NULL, '2022-08-17 03:49:40'),
(9, NULL, 'Terms and Condition', 'terms-and-condition', NULL, 'basic', '[\"footer\"]', '<p><strong>Acknowledgement and Acceptance</strong></p><p>Welcome to our website. Please read these Terms of Service (“Terms”) carefully as they contain important information about your legal rights, remedies and obligations. By using the Site, you acknowledge that you have read, understood and agree to be bound by the following terms and conditions. The information contained on the Websites is subject to change without notice.&nbsp;If you are a regular Linkedhill visitor and/or member please check these Terms regularly.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Access to this Website</strong></p><p>In these terms and conditions, the Site refers collectively to all digital products and services offered by us, including any mobile applications regardless of how you choose to access them. Uses of the Site include accessing, browsing or registering to use our Site.<strong>&nbsp;</strong></p><p>We do not warrant that the Site, or any content on it, will operate error-free or that the Site and its server are free of computer viruses and other harmful elements We may suspend, withdraw, discontinue or change all or any part of our Site without notice. We will not be liable to you if for any reason our Site is unavailable at any time or for any period.</p><p>On this website we provide an interactive environment in which users who are interested in learning about our property services or registering interest in our property services may find such information and, if they choose to do so, register their interest.</p><p>If you register with us, we will issue you with a confidential user name and password to access the information and services contained on this website. You should ensure that you do not divulge your user name and password to any other person.</p><p>In addition, you agree to review the Agreement periodically to be aware of such modifications, and your continued use of the Site shall be deemed your conclusive acceptance of the modified Agreement.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Your Obligations and acceptable use&nbsp;</strong></p><p>You accept that you are solely responsible for ensuring that your computer system meets all relevant technical specification necessary to use this Site and that your computer system is compatible with this Site.</p><p>You must not:</p><p>(i) use any other person’s name, user identification or password when accessing or using this website, unless it is with our consent;</p><p>(ii) use the website to harm, abuse, harass, stalk, threaten, or otherwise offend others;&nbsp;</p><p>(iii) frame or mirror any part of the website without our written authorization;</p><p>(iv) interfere with, disrupt, or create an undue burden on the website;</p><p>(v) provide any information to us which is the confidential information or proprietary information of any other person;</p><p>(vi) use this website in any way which may be in breach of any laws, rules or regulations or may infringe any third-party rights;</p><p>(vii) knowingly transmit any virus or take any action which may interfere with the operation of this website.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>&nbsp;Your relationship with other users of the website</strong></p><p>• You are solely responsible for your interactions with other users through the website, including (but not limited to):</p><p>(i) Any material or information that is shared between you and any other user;</p><p>(ii) Any material or information that is posted to the website; and</p><p>(iii) Any transactions that are conducted or arranged through the website.</p><p>• You acknowledge that we have no obligation to monitor your (or any other user’s) use of the website, but we have the right to do so at any time for our own business purposes (including as necessary to assess your (or any other user’s) compliance with these Terms of Use, to protect the security and integrity of the website and the Linkedhill platform, or to comply with any law or government authority request).</p><p>• While we reserve the right to become involved in resolving disputes between you and other users where (and to the extent) we choose to do so, we are under no obligation to do so.</p><p>• We may, at our discretion, choose to share information about users (including you) with other users where we think this may assist with resolving a dispute between the users. You agree that:</p><p>(i) We may use and share your information with other users for this purpose; and</p><p>(ii) If we provide you with any such information of other users, you must only use that information for the purpose of resolving the dispute and for no other purposes.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Registration&nbsp;</strong></p><p>• You are not required to register to use the Site. However certain features on the Site may only be available if you do register. You must keep any user name and password that are allocated to you private, and not disclose them to any other person. If you have lost or forgotten your password, you can request that we reset your password which will send a prompt to your registered email address.</p><p>• When registering to use the Site, you may be requested to provide personal information such as your name, email address and date of birth. We will deal with your personal information in accordance with our privacy practices (Privacy policy).</p><p>• You may cancel your registration by notifying us at&nbsp;linkedhill@gmail.com&nbsp;and providing your user name.</p><p>• We may, without notice to you, review, modify or remove any material which you provide in our absolute discretion including where we believe it violates these Terms of Use.</p><p><br>• We may suspend or cancel your use of the Site and/or its Services, either temporarily or permanently, if you breach, or we reasonably believe you to have breached, any of these Terms of Use.</p><p>&nbsp;</p><p>• The material provided, and views expressed by users are the materials of those users and are not ours.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>&nbsp;Accounts and Membership&nbsp;</strong></p><p>&nbsp;</p><p>• Before you can access certain services available through the website, you must follow the prompts on the website to create an account and become registered as a member of the website.</p><p>The following types of accounts are available:</p><p>&nbsp;</p><p>1. User Account:</p><p>&nbsp;If you are a prospective purchaser or renter, you can join the platform by directly registering through the website or by accepting an invitation from a real estate agent or referral partner (which may come in the form of an SMS or e-mail). Once you set up a user account, you can specify your unique match preferences for properties through your personal dashboard. You will be alerted when properties matching your preferences are listed on the platform.</p><p>&nbsp;</p><p>2. Agent:</p><p>&nbsp;If you are a registered real estate agent, you can register on the platform by signing up through the website.</p><p>(i) All agents who are registered on the platform can act as Agent Assists for registered Buyers or Renters.</p><p>(ii) Agents will have the option to select additional services that they can provide to Buyers and Renters, such as Buyer Assist or Seller Assist.</p><p>(iii) Agents may only list properties on the platform and act as the Selling Agent for those properties:</p><p>&nbsp; &nbsp; &nbsp; (a) With the approval of their Agency Principal and the authority of the sellers; and</p><p>&nbsp; &nbsp; &nbsp; (b) If their agency has entered into a master agreement (and any other applicable terms required by Linkedhill) with Linkedhill (the Direct Agreements).</p><p>&nbsp;</p><p>3. Agency Principal:</p><p>If you are the principal of a real estate agency, you may register as an Agency Principal and your account will have additional functionality that can be used to:</p><p>(i) Manage your agency’s presence on the platform (such as branding, agency logos, and business contact information); and</p><p>(ii) Track and manage the activities of Agents from your agency who are acting as Selling Agents for properties on the platform. This includes the right to withdraw properties that have been listed on the platform by Selling Agents from your agency. Agency Principals can also act as Agent Assists and Selling Agents in the same way as other Agents.</p><p>&nbsp;</p><p>• Depending on the type of account that you register for, you may be required to enter into additional terms and conditions in order to use the Linkedhill platform (or certain features within the platform). We will make these available to you as part of the registration process, or at the time when you use the relevant feature.</p><p>&nbsp;</p><p>• Without limiting clause, we may suspend or terminate any user’s account at any time at our sole discretion without liability to the user.</p><p>&nbsp;</p><p>• If we need to send you any notices in writing, we may send these notices to you by e-mail or post using the contact details you have provided in your membership information.</p><p>&nbsp;</p><p>• Users, Agents, and Agency Principals can terminate their membership on the platform whenever they like by sending an e-mail to at&nbsp;<a href=\"mailto:linkedhill@gmail.com\">linkedhill@gmail.com</a></p><p>&nbsp;</p><p>• If an Agent or Agency Principal terminates their account on the platform, this does not affect any accrued rights or obligations under the Direct Agreements between the agency and Linkedhill.</p><p>&nbsp;</p><p>• If you use the platform to invite or contact any person to join the website, you warrant that you have all consents required by law to send such communications and that the sending of such messages will not infringe any laws.</p><p>&nbsp;</p><p>• When creating an account, you will be asked to choose a password. You must keep your account password confidential and secure, and you acknowledge and agree that you will be solely responsible for any activities engaged in using your account, whether or not access is authorized by you.</p><p>&nbsp;</p><p>• Your account is personal to you, and you may not transfer or assign your account to any other person. You agree not to use the account, username, or password of another member of the website at any time and must not disclose your account password to any third party.</p><p>&nbsp;</p><p>• You must notify us immediately if you suspect any unauthorized use of your account or access to your password.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Third Party Content, Products and Services</strong></p><p>Third Party Content</p><p>You acknowledge that, despite the prohibitions above, Content posted on the Site by other end users, may contain inaccurate, inappropriate, offensive or sexually explicit material, products or services and links to other web sites. We do not have control over Content provided by third parties and assume no responsibility or liability for it. Content you access or transmit using the Site is accessed and transmitted at your own risk.&nbsp;</p><p>Third Party Web sites</p><p>Web sites accessed via links or other means from the Site have, unless otherwise indicated, been independently developed by third parties. The inclusion of any Content or links on the Site should not be construed as an express nor an implied endorsement of any third-party products or services by us. We are not responsible for the Content or opinions expressed on any linked web sites, and such web sites are in no way investigated, monitored or checked by us.<br>The User agrees that we shall not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings or as the result of the presence of such advertisers or third parties on the Site.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Change of Information, Products and Services</strong></p><p>Information, products and services published on this website are subject to change without notice.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Accuracy of information</strong></p><p>(a) All Services are provided in good faith. We derive our information from sources which we believe to be accurate and up-to-date. We nevertheless:</p><p>(i) Some of the information on the Site may be provided by third parties, including, for example, sales information, price guides, descriptions and photographs of properties. While we believe that these third parties are reliable sources of this information, we cannot guarantee that this information is always accurate, up-to-date or complete, or that your access to that information will be uninterrupted, timely or secure;</p><p>(iii) do not give you any assurances that any information contained in the Services will meet your requirements or be suitable for your purposes;</p><p>(iv) reserve the right to update any information contained in the Services at any time; and</p><p>(v) do not accept responsibility for loss suffered as a result of your reliance on the accuracy of information contained in the Services.</p><p>(b) Some of the information on our Website or associated applications may be provided by third parties. While we believe that these third parties are reliable sources of this information, we cannot guarantee that this information is always accurate, up-to-date or complete.</p><p>© Third Party Data is provided to You without taking into account the objectives, financial situation or needs of any individual. You are advised not to rely on the Third-Party Data in any way as the basis for entering into any commercial, financial or other transaction. Before making any investment decision, an individual should consider the appropriateness of the advice to their circumstances, and obtain specific financial, legal and taxation advice.</p><p>(d) The material provided, and views expressed by other users of the Services are the materials of those users and are not ours.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Information provided to us</strong></p><p>You may at your discretion provide information to us in order to receive information about us, the products or services displayed on this website, to receive information relating to our property services and listings or to be involved in promotions or other activities undertaken by us. If you do so, you agree that any such information becomes our property and may be used by us or others, reproduced, published, transmitted, displayed modified or distributed at our discretion, subject to our obligations under our Privacy Statement.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Copyright</strong></p><p>All contents of this website, including the software, design, text and graphics are owned by or licensed to us and are protected by copyright under the laws of Nepal and other countries. Apart from fair dealing for the purpose of personal use, private study, research, criticism or review as permitted under copyright legislation, you may not reproduce, transmit, adapt, distribute, sell, modify or publish or otherwise use any of the material on this website without our prior written consent.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Trademarks</strong></p><p>This web site includes trademarks which are registered, are the subject of pending applications or which are otherwise protected by law. You may not use these trademarks with out our consent.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Disclaimer</strong></p><p>• The information provided on this Site is for general interest only and does not constitute specific advice. Although we make reasonable efforts to update the information on our Site, we make no representations, warranties or guarantees, whether express or implied, that the content on our Site is accurate, complete or up to date.</p><p>• The material on this website and other Linkedhill Sites is not and should not be regarded as legal, financial or real estate advice. Users should seek their own legal, financial or real estate advice where appropriate. Every effort is made to ensure that the material is accurate and up to date. However, we do not guarantee or warrant the accuracy, completeness, or currency of the information provided.</p><p>• You should make your own inquiries and obtain independent professional advice tailored to your specific circumstances before making any legal, financial or real estate decisions.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Limitation of liability</strong></p><p>To the extent that the law allows:</p><p>(i) We (including our officers, employees, agents and members) are not liable for any loss or damage including loss of data and/or profits, however caused (including by negligence), which you may directly or indirectly suffer in connection with your use of the Linkedhill Sites or your reliance on any information contained on them;&nbsp;</p><p>(ii) Any condition or warranty which would otherwise be implied into these terms and conditions is hereby excluded.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Indemnity</strong></p><p>You agree to indemnify us and our partners, agents, officers, employees and other authorised representatives against all claims, suits, demands, damages, liabilities, costs or expenses connected due to or arising out of:&nbsp;</p><p>(i) use of the Site;&nbsp;</p><p>(ii) breach of these Terms of Use;&nbsp;</p><p>(iii) any breach of your representations and warranties set forth in these Terms of Use;&nbsp;</p><p>(iv) your violation of the rights of a third party, including but not limited to intellectual property rights; or&nbsp;</p><p>(v) any overt harmful act toward any other user of the Site with whom you connected via the Site.<br><br>&nbsp;</p><p>&nbsp;</p><p><strong>Electronic Communications, Transactions and Signatures&nbsp;</strong></p><p>Visiting the Site, sending us emails, and completing online forms constitute electronic communications. You consent to receive electronic communications, and you agree that all agreements, notices, disclosures, and other communications we provide to you electronically, via email and on the Site, satisfy any legal requirement that such communication be in writing. &nbsp;</p><p>You hereby agree to the use of electronic signatures, contracts, orders, and records of transactions initiated or completed by us or via the site. You hereby waive any rights or requirements under any statutes, regulations, rules, ordinances, or other laws in any jurisdiction which require an original signature or delivery or retention of non-electronic records, or to payments or the granting of credits by any means other than electronic means.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Resolving Disputes</strong></p><p>If there a dispute arise between you and&nbsp;<strong>Linkedhill</strong>, we want to provide you with a resolution that is efficient and cost effective by using our customer service team. Almost all customer service disputes can be resolved to the customer’s satisfaction by using our customer service, reachable by emailing at linkedhill@gmail.com or by sending an email through the “Contact Us” section of our website.</p><p>If your dispute cannot be resolved using our customer service team, the top management team will take initiative role in order to resolve the disputes and if the issues are still not solved, we will find you the alternative ways for resolution in your favour if applicable.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Termination</strong></p><p>If in our reasonable opinion you fail to comply with any of these terms and conditions of use of this website, we may terminate or limit your access to this website.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Governing Law</strong></p><p>Any legal issues arising out of the use of this website will be governed by the laws of the Government of Nepal and by using this website you submit to the jurisdiction of the courts of that state.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Entire Terms</strong></p><p>The provisions and conditions of these Terms, and each obligation referenced here, represent the entire Terms and Agreement between&nbsp;Linkedhill, its affiliated or related entities, and you, and supersede any prior agreements or understandings not contained &nbsp;here. In the event that any inconsistencies exist between these Terms and any future published terms of use or understanding, the terms of the most recently published Terms shall govern.</p>', 9, NULL, 1, '2022-08-17 03:50:56', '2022-08-17 03:50:56'),
(10, NULL, 'Faq', 'faq', NULL, 'faq', '[\"footer\"]', NULL, 11, 'http://127.0.0.1:8000/storage/photos/1/istockphoto-1211174464-612x612.jpg', 1, '2022-08-17 03:52:03', '2022-08-17 23:51:59');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_02_11_061544_create_admins_table', 1),
(11, '2021_02_14_092142_create_provinces_table', 1),
(12, '2021_02_15_054938_create_property_categories_table', 1),
(13, '2021_02_15_060949_create_cities_table', 1),
(14, '2021_02_15_061238_create_areas_table', 1),
(15, '2021_02_15_065925_create_amenities_table', 1),
(16, '2021_02_21_093335_create_purposes_table', 1),
(17, '2021_02_21_100313_create_types_table', 1),
(18, '2021_02_22_054155_create_road_types_table', 1),
(19, '2021_02_22_062903_create_units_table', 1),
(20, '2021_02_22_103548_create_categories_table', 1),
(21, '2021_02_22_104001_create_blogs_table', 1),
(22, '2021_02_22_104834_create_blog_categories_table', 1),
(23, '2021_03_14_100101_create_properties_table', 1),
(24, '2021_03_15_053053_create_property_images_table', 1),
(25, '2021_03_15_063933_create_property_amenities_table', 1),
(26, '2021_04_02_095735_create_websites_table', 1),
(27, '2021_04_04_080021_create_sliders_table', 1),
(28, '2021_04_12_111154_create_agency_details_table', 1),
(29, '2021_04_19_095822_create_user_agent_table', 1),
(30, '2021_04_20_062838_create_agency_properties_table', 1),
(31, '2021_04_22_060046_create_pages_table', 1),
(32, '2021_04_22_115046_create_favourite_lists_table', 1),
(33, '2021_04_24_170954_create_subscribers_table', 1),
(34, '2021_04_28_064542_create_service_categories_table', 1),
(35, '2021_04_28_064632_create_services_table', 1),
(36, '2021_04_28_065503_create_tradelink_admins_table', 1),
(37, '2021_04_28_071108_create_vendor_services_table', 1),
(38, '2021_06_18_060411_create_tradelink_sliders_table', 1),
(39, '2022_01_03_194139_create_tradelink_websites_table', 1),
(40, '2022_01_03_202825_create_tradelink_subscribers_table', 1),
(41, '2022_01_05_105348_create_testimonials_table', 1),
(42, '2022_01_10_075545_create_faqs_table', 1),
(43, '2022_01_17_020122_create_notifications_table', 1),
(44, '2022_01_17_192230_create_menus_table', 1),
(45, '2022_01_19_103914_create_teams_table', 1),
(46, '2022_01_21_063154_create_advertisements_table', 1),
(47, '2022_01_30_082147_create_permission_tables', 1),
(48, '2022_01_30_230220_create_enquiries_table', 1),
(49, '2022_02_03_100739_create_districts_table', 1),
(50, '2022_02_08_051304_create_chat_categories_table', 1),
(51, '2022_02_08_051402_create_questions_table', 1),
(52, '2022_02_08_051425_create_conversation_lists_table', 1),
(53, '2022_02_08_051712_create_chat_messages_table', 1),
(54, '2022_02_08_051941_create_chat_category_references_table', 1),
(55, '2022_02_11_075051_create_property_faqs_table', 1),
(56, '2022_02_11_093645_create_customers_table', 1),
(57, '2022_02_14_073133_create_features_table', 1),
(58, '2022_02_14_101719_create_feature_property_table', 1),
(59, '2022_02_14_104957_create_feature_property_category_table', 1),
(60, '2022_02_24_045247_create_pricings_table', 1),
(61, '2022_02_27_053611_create_property_reviews_table', 1),
(62, '2022_02_28_120447_create_app_reviews_table', 1),
(63, '2022_03_03_093016_create_tradelink_categories_table', 1),
(64, '2022_03_03_093128_create_tradelinks_table', 1),
(65, '2022_03_11_113108_create_device_credentials_table', 1),
(66, '2022_03_15_110932_create_tradelink_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('82da900d10dbbfff804cbb4fd4bb407d77dcf41b4983061ab654b3e0ce9fb816d1c9496279d37e36', 1, 1, 'authToken', '[]', 0, '2022-08-17 06:10:18', '2022-08-17 06:10:18', '2023-08-17 11:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mystore Personal Access Client', 'Uv84SyH5AJgUMs96NoKzyra1FDFgP5EV6Wjcx4OM', NULL, 'http://localhost', 1, 0, 0, '2022-08-17 06:10:11', '2022-08-17 06:10:11'),
(2, NULL, 'mystore Password Grant Client', 'pqio7zDg9EQ0mJM8bmXZRZRr5HfLvABYwW2Q23On', 'users', 'http://localhost', 0, 1, 0, '2022-08-17 06:10:11', '2022-08-17 06:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-17 06:10:11', '2022-08-17 06:10:11');

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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `description`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Our Company', 'our-company', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 'keyword', 'description', NULL, NULL),
(2, 'Policies', 'policies', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 'keyword', 'description', NULL, NULL),
(3, 'Terms & Conditions', 'terms-and-conditions', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 'keyword', 'description', NULL, NULL),
(4, 'About Us', 'about-us', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ', 'keyword', 'description', NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', NULL, NULL),
(2, 'user-create', 'web', NULL, NULL),
(3, 'user-edit', 'web', NULL, NULL),
(4, 'user-delete', 'web', NULL, NULL),
(5, 'permission-list', 'web', NULL, NULL),
(6, 'permission-create', 'web', NULL, NULL),
(7, 'permission-edit', 'web', NULL, NULL),
(8, 'permission-delete', 'web', NULL, NULL),
(9, 'role-list', 'web', NULL, NULL),
(10, 'role-create', 'web', NULL, NULL),
(11, 'role-edit', 'web', NULL, NULL),
(12, 'role-delete', 'web', NULL, NULL),
(13, 'amenity-list', 'web', NULL, NULL),
(14, 'amenity-create', 'web', NULL, NULL),
(15, 'amenity-edit', 'web', NULL, NULL),
(16, 'amenity-delete', 'web', NULL, NULL),
(17, 'area-list', 'web', NULL, NULL),
(18, 'area-create', 'web', NULL, NULL),
(19, 'area-edit', 'web', NULL, NULL),
(20, 'area-delete', 'web', NULL, NULL),
(21, 'blog-category-list', 'web', NULL, NULL),
(22, 'blog-category-create', 'web', NULL, NULL),
(23, 'blog-category-edit', 'web', NULL, NULL),
(24, 'blog-category-delete', 'web', NULL, NULL),
(25, 'blog-list', 'web', NULL, NULL),
(26, 'blog-create', 'web', NULL, NULL),
(27, 'blog-edit', 'web', NULL, NULL),
(28, 'blog-delete', 'web', NULL, NULL),
(29, 'news-list', 'web', NULL, NULL),
(30, 'news-create', 'web', NULL, NULL),
(31, 'news-edit', 'web', NULL, NULL),
(32, 'news-delete', 'web', NULL, NULL),
(33, 'category-list', 'web', NULL, NULL),
(34, 'category-create', 'web', NULL, NULL),
(35, 'category-edit', 'web', NULL, NULL),
(36, 'category-delete', 'web', NULL, NULL),
(37, 'city-list', 'web', NULL, NULL),
(38, 'city-create', 'web', NULL, NULL),
(39, 'city-edit', 'web', NULL, NULL),
(40, 'city-delete', 'web', NULL, NULL),
(41, 'faq-list', 'web', NULL, NULL),
(42, 'faq-create', 'web', NULL, NULL),
(43, 'faq-edit', 'web', NULL, NULL),
(44, 'faq-delete', 'web', NULL, NULL),
(45, 'page-list', 'web', NULL, NULL),
(46, 'page-create', 'web', NULL, NULL),
(47, 'page-edit', 'web', NULL, NULL),
(48, 'page-delete', 'web', NULL, NULL),
(49, 'property-list', 'web', NULL, NULL),
(50, 'property-create', 'web', NULL, NULL),
(51, 'property-edit', 'web', NULL, NULL),
(52, 'property-delete', 'web', NULL, NULL),
(53, 'province-list', 'web', NULL, NULL),
(54, 'province-create', 'web', NULL, NULL),
(55, 'province-edit', 'web', NULL, NULL),
(56, 'province-delete', 'web', NULL, NULL),
(57, 'purpose-list', 'web', NULL, NULL),
(58, 'purpose-create', 'web', NULL, NULL),
(59, 'purpose-edit', 'web', NULL, NULL),
(60, 'purpose-delete', 'web', NULL, NULL),
(61, 'road-type-list', 'web', NULL, NULL),
(62, 'road-type-create', 'web', NULL, NULL),
(63, 'road-type-edit', 'web', NULL, NULL),
(64, 'road-type-delete', 'web', NULL, NULL),
(65, 'service-category-list', 'web', NULL, NULL),
(66, 'service-category-create', 'web', NULL, NULL),
(67, 'service-category-edit', 'web', NULL, NULL),
(68, 'service-category-delete', 'web', NULL, NULL),
(69, 'service-list', 'web', NULL, NULL),
(70, 'service-create', 'web', NULL, NULL),
(71, 'service-edit', 'web', NULL, NULL),
(72, 'service-delete', 'web', NULL, NULL),
(73, 'slider-list', 'web', NULL, NULL),
(74, 'slider-create', 'web', NULL, NULL),
(75, 'slider-edit', 'web', NULL, NULL),
(76, 'slider-delete', 'web', NULL, NULL),
(77, 'testimonial-list', 'web', NULL, NULL),
(78, 'testimonial-create', 'web', NULL, NULL),
(79, 'testimonial-edit', 'web', NULL, NULL),
(80, 'testimonial-delete', 'web', NULL, NULL),
(81, 'type-list', 'web', NULL, NULL),
(82, 'type-create', 'web', NULL, NULL),
(83, 'type-edit', 'web', NULL, NULL),
(84, 'type-delete', 'web', NULL, NULL),
(85, 'unit-list', 'web', NULL, NULL),
(86, 'unit-create', 'web', NULL, NULL),
(87, 'unit-edit', 'web', NULL, NULL),
(88, 'unit-delete', 'web', NULL, NULL),
(89, 'vendor-list', 'web', NULL, NULL),
(90, 'vendor-create', 'web', NULL, NULL),
(91, 'vendor-edit', 'web', NULL, NULL),
(92, 'vendor-delete', 'web', NULL, NULL),
(93, 'website-list', 'web', NULL, NULL),
(94, 'website-create', 'web', NULL, NULL),
(95, 'website-edit', 'web', NULL, NULL),
(96, 'website-delete', 'web', NULL, NULL),
(97, 'feature-list', 'web', NULL, NULL),
(98, 'feature-create', 'web', NULL, NULL),
(99, 'feature-edit', 'web', NULL, NULL),
(100, 'feature-delete', 'web', NULL, NULL),
(101, 'agency-list', 'web', NULL, NULL),
(102, 'agency-create', 'web', NULL, NULL),
(103, 'agency-edit', 'web', NULL, NULL),
(104, 'agency-delete', 'web', NULL, NULL),
(105, 'tradelink-category-list', 'web', NULL, NULL),
(106, 'tradelink-category-create', 'web', NULL, NULL),
(107, 'tradelink-category-edit', 'web', NULL, NULL),
(108, 'tradelink-category-delete', 'web', NULL, NULL),
(109, 'tradelink-list', 'web', NULL, NULL),
(110, 'tradelink-create', 'web', NULL, NULL),
(111, 'tradelink-edit', 'web', NULL, NULL),
(112, 'tradelink-delete', 'web', NULL, NULL),
(113, 'advertisement-list', 'web', NULL, NULL),
(114, 'advertisement-create', 'web', NULL, NULL),
(115, 'advertisement-edit', 'web', NULL, NULL),
(116, 'advertisement-delete', 'web', NULL, NULL),
(117, 'team-list', 'web', NULL, NULL),
(118, 'team-create', 'web', NULL, NULL),
(119, 'team-edit', 'web', NULL, NULL),
(120, 'team-delete', 'web', NULL, NULL),
(121, 'menu-list', 'web', NULL, NULL),
(122, 'menu-create', 'web', NULL, NULL),
(123, 'menu-edit', 'web', NULL, NULL),
(124, 'menu-delete', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `property_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `bed` bigint(20) UNSIGNED NOT NULL,
  `bath` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_area_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `built_up_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `built_up_area_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_facing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_access` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_access_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `end_price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `price_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` tinyint(1) NOT NULL DEFAULT 0,
  `insurance` tinyint(1) NOT NULL DEFAULT 0,
  `negotiable` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `view_count` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `premium_property` tinyint(1) NOT NULL DEFAULT 0,
  `hasAgent` tinyint(1) NOT NULL DEFAULT 0,
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `status`, `property_status`, `type`, `title`, `slug`, `property_detail`, `property_address`, `map_location`, `city_id`, `bed`, `bath`, `area_id`, `zipcode`, `total_area`, `total_area_unit`, `built_up_area`, `built_up_area_unit`, `property_facing`, `road_access`, `road_access_unit`, `road_type`, `start_price`, `end_price`, `price_label`, `owner_name`, `owner_address`, `owner_phone`, `youtube_video_id`, `feature`, `insurance`, `negotiable`, `user_id`, `admin_id`, `category_id`, `view_count`, `premium_property`, `hasAgent`, `verified_by`, `verified_at`, `deleted_at`, `created_at`, `updated_at`, `meta_keyword`, `meta_description`) VALUES
(1, 1, 'Sell', 'Residential', 'New House on sale', 'new-house-on-sale', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'maitidevi', NULL, 1, 5, 6, 1, '48687', '22', '1', '44', '1', 'South', '42', '1', '1', '45000000.00', '0.00', 'Per Month', 'roshan shresth', 'tinkune', '9812345678', NULL, 1, 1, 1, 1, NULL, 1, 1, 0, 0, 1, '2022-08-17 03:38:06', NULL, '2022-08-17 03:34:15', '2022-08-17 03:38:15', NULL, NULL),
(2, 1, 'Sell', 'Residential', 'kathmandu valley house on sell', 'kathmandu-valley-house-on-sell', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'baneswor', NULL, 1, 1, 1, 1, '48687', '11', '1', NULL, '1', 'South', '24', '1', '1', '7200000.00', '0.00', 'Per Month', 'Noelle Landry', 'Barbara', '9812345678', NULL, 1, 1, 1, 1, NULL, 1, 1, 0, 0, 1, '2022-08-17 03:37:57', NULL, '2022-08-17 03:36:54', '2022-08-17 03:37:57', NULL, NULL),
(3, 1, 'Sell', 'Agriculture', 'Land sell on out of kathmandu valley', 'land-sell-on-out-of-kathmandu-valley', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Lalitpur', NULL, 1, 0, 0, 1, '48687', '11', '1', '44', '1', 'South', '24', '1', '1', '75000000.00', '0.00', 'Per Month', 'Noelle Landry', 'Barbara', '9812345678', NULL, 1, 0, 1, 1, NULL, 2, 2, 0, 0, 1, '2022-08-17 04:08:58', NULL, '2022-08-17 03:40:03', '2022-08-17 06:10:18', NULL, NULL),
(4, 1, 'Rent', 'Residential', 'New apartment on rent', 'new-apartment-on-rent', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Lalitpur', NULL, 1, 5, 6, 1, '48687', '22', '1', '44', '1', 'South', '24', '1', '1', '4200000.00', '0.00', 'Per Month', 'Noelle Landry', 'Barbara', '9812345678', NULL, 1, 1, 1, 1, NULL, 3, 1, 0, 0, 1, '2022-08-17 04:05:00', NULL, '2022-08-17 03:42:11', '2022-08-17 04:05:00', NULL, NULL),
(5, 1, 'Buy', 'Agriculture', 'buy on Land property', 'buy-on-land-property', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Lalitpur', NULL, 1, 0, 0, 1, '48687', '22', '1', '44', '1', 'South', '24', '1', '1', '55000000.00', '0.00', 'Per Month', 'Noelle Landry', 'Barbara', '9812345678', NULL, 1, 1, 1, 1, NULL, 2, 1, 0, 0, 1, '2022-08-17 04:08:49', NULL, '2022-08-17 03:44:41', '2022-08-17 04:08:49', NULL, NULL),
(6, 1, 'Sell', 'Commercial', 'Sangreela Hotel on sale', 'sangreela-hotel-on-sale', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Lalitpur', NULL, 1, 10, 10, 1, '48687', '22', '1', '44', '1', 'South', '24', '1', '1', '72000000.00', '0.00', 'Per Month', 'Noelle Landry', 'Barbara', '9812345678', NULL, 1, 1, 1, 1, NULL, 7, 3, 0, 0, 1, '2022-08-17 04:44:20', NULL, '2022-08-17 03:46:40', '2022-08-17 23:40:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `amenity_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `user_id`, `property_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, NULL, NULL),
(2, NULL, 1, 2, NULL, NULL),
(3, NULL, 1, 3, NULL, NULL),
(4, NULL, 1, 4, NULL, NULL),
(5, NULL, 2, 1, NULL, NULL),
(6, NULL, 2, 2, NULL, NULL),
(7, NULL, 2, 3, NULL, NULL),
(8, NULL, 2, 4, NULL, NULL),
(9, NULL, 3, 1, NULL, NULL),
(10, NULL, 3, 4, NULL, NULL),
(11, NULL, 4, 1, NULL, NULL),
(12, NULL, 4, 2, NULL, NULL),
(13, NULL, 4, 3, NULL, NULL),
(14, NULL, 4, 4, NULL, NULL),
(15, NULL, 5, 1, NULL, NULL),
(16, NULL, 5, 4, NULL, NULL),
(17, NULL, 6, 1, NULL, NULL),
(18, NULL, 6, 2, NULL, NULL),
(19, NULL, 6, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`id`, `name`, `icon`, `image`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'House', NULL, 'https://source.unsplash.com/178j8tJrNlc', NULL, 'house', NULL, NULL),
(2, 'Land', NULL, 'https://source.unsplash.com/sYffw0LNr7s', NULL, 'land', NULL, NULL),
(3, 'Apartment', NULL, 'https://source.unsplash.com/3wylDrjxH-E', NULL, 'apartment', NULL, NULL),
(4, 'Flat', NULL, 'https://source.unsplash.com/3wylDrjxH-E', NULL, 'flat', NULL, NULL),
(5, 'Business', NULL, 'https://source.unsplash.com/PhYq704ffdA', NULL, 'business', NULL, NULL),
(6, 'Shop Space', NULL, 'https://source.unsplash.com/c9FQyqIECds', NULL, 'shop-space', NULL, NULL),
(7, 'Hostel', NULL, 'https://source.unsplash.com/8TrcnRMap90', NULL, 'hostel', NULL, NULL),
(8, 'Office Space', NULL, 'https://source.unsplash.com/VWcPlbHglYc', NULL, 'office_space', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_faqs`
--

CREATE TABLE `property_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `name`, `user_id`, `property_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'http://127.0.0.1:8000/images/property/1660727955hotel-temple-villa.jpg', 1, 1, '2022-08-17 03:34:15', '2022-08-17 03:34:15', NULL),
(2, 'http://127.0.0.1:8000/images/property/1660728114Civilhomes.jpg', 1, 2, '2022-08-17 03:36:54', '2022-08-17 03:36:54', NULL),
(3, 'http://127.0.0.1:8000/images/property/166072830312221-nourishing-fields-nepal.jpg', 1, 3, '2022-08-17 03:40:03', '2022-08-17 03:40:03', NULL),
(4, 'http://127.0.0.1:8000/images/property/1660728431a1c710b599e8b83e74fef1371653987b.png', 1, 4, '2022-08-17 03:42:11', '2022-08-17 03:42:11', NULL),
(5, 'http://127.0.0.1:8000/images/property/166072858152fb5febbd2baffs-participants-taking-observations-in-rice-field.jpg', 1, 5, '2022-08-17 03:44:41', '2022-08-17 03:44:41', NULL),
(6, 'http://127.0.0.1:8000/images/property/166072870026c22e1a82a615ffeae9b08b17f10be8.jpg', 1, 6, '2022-08-17 03:46:40', '2022-08-17 03:46:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT 5.0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `np_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eng_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `np_name`, `eng_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'रदेश नं १', 'Province No. 1', NULL, NULL, NULL),
(2, ' प्रदेश नं २', 'Province No. 2', NULL, NULL, NULL),
(3, 'बाग्मती प्रदेश', 'Bagmati', NULL, NULL, NULL),
(4, 'गण्डकी प्रदेश', 'Gandaki', NULL, NULL, NULL),
(5, ' प्रदेश नं ५', 'Province No. 5', NULL, NULL, NULL),
(6, 'कर्णाली प्रदेश', 'Karnali', NULL, NULL, NULL),
(7, ' सुदूरपश्चिम प्रदेश', 'SudurPaschim', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purposes`
--

CREATE TABLE `purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purposes`
--

INSERT INTO `purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rent', NULL, NULL),
(2, 'Sell', NULL, '2022-08-17 03:37:19'),
(3, 'Buy', NULL, '2022-08-17 03:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `search_key` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `parentId` bigint(20) UNSIGNED DEFAULT NULL,
  `isParent` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `road_types`
--

CREATE TABLE `road_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_types`
--

INSERT INTO `road_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Paved', NULL, NULL),
(2, 'Black Topped', NULL, NULL),
(3, 'Alley', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', NULL, NULL),
(2, 'Admin', 'web', NULL, NULL),
(3, 'Agent', 'web', NULL, NULL),
(4, 'Builder', 'web', NULL, NULL),
(5, 'Customer', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` tinyint(1) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'service  Category', 'service-category', 'https://source.unsplash.com/VWcPlbHglYc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 50,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `url`, `hide`, `type`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Slider First', 'http://127.0.0.1:8000/storage/photos/1/pexels-eva-bronzini-6074129.jpg', 'https://linkedhill.com/', 1, 1, 50, NULL, NULL, '2022-08-17 06:16:51'),
(2, 'Slider Second', 'https://source.unsplash.com/Bkp3gLygyeA', 'https://linkedhill.com/', 1, 1, 50, NULL, NULL, NULL),
(3, 'Slider Third', 'https://source.unsplash.com/xQWLtlQb7L0', 'https://linkedhill.com/', 1, 1, 50, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'arbaz.khanmansoor@nectardigit.com', '2022-08-17 23:12:06', '2022-08-17 23:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team.png',
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelinks`
--

CREATE TABLE `tradelinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelink_admins`
--

CREATE TABLE `tradelink_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` enum('admin','vendor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vendor',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelink_books`
--

CREATE TABLE `tradelink_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tradelink_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('completed','cancelled','pending','progress') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelink_categories`
--

CREATE TABLE `tradelink_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelink_sliders`
--

CREATE TABLE `tradelink_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelink_subscribers`
--

CREATE TABLE `tradelink_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tradelink_websites`
--

CREATE TABLE `tradelink_websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright_message` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Residential', 'residential', NULL, NULL),
(2, 'Commercial', 'commercial', NULL, NULL),
(3, 'Agriculture', 'agriculture', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aana', NULL, NULL),
(2, 'Paisa', NULL, NULL),
(3, 'Ropani', NULL, NULL),
(4, 'Sq. Feet', NULL, NULL),
(5, 'Sq. Meter', NULL, NULL),
(6, 'Ropani', NULL, NULL),
(7, 'Acres', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` date DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_from` enum('facebook','google','normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward_point` decimal(8,2) DEFAULT 0.00,
  `referred_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone`, `mobile`, `testP`, `dob`, `full_address`, `access_token`, `is_blocked`, `is_active`, `social_id`, `social_from`, `email_verified_at`, `otp`, `referral_code`, `reward_point`, `referred_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nectardigit', NULL, 'nectardigit@gmail.com', '$2y$10$9dYjcWTJVmluzFG/bXq4KeOqa5k4ZDov4ELqE1JDO9nbgFCYftNfK', NULL, NULL, '98022', NULL, NULL, NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODJkYTkwMGQxMGRiYmZmZjgwNGNiYjRmZDRiYjQwN2Q3N2RjZjQxYjQ5ODMwNjFhYjY1NGIzZTBjZTlmYjgxNmQxYzk0OTYyNzlkMzdlMzYiLCJpYXQiOjE2NjA3MzczMTguNDk3MDIxLCJuYmYiOjE2NjA3MzczMTguNDk3MDI4LCJleHAiOjE2OTIyNzMzMTguMjU1NDExLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.VUTXFhwLWZDlhDVwssPi7g58a5UX0Dht3AIoVczmk_E9OdNdW6DGsmawnHH8Pw4BKqEtZe8x29sn0bkAui7uhnpTJUNABAxPWSgumXRC8cJj6HnI8XYmfmLdXvO2QOpl78liDCHH7BVgRkjYiudV0gW0uXPncOg1JrIDX45RswtuqqQKwUno8BG5E8O5gphaWsXoOk3m_6wpEQkznrZR-D9N3oYdESWR6g-X4hjA2J9BgT12V6j_dPp4FPhgLLHX7liwmyXs9Rko3_vrVM9H9if2Akq7g0pk_eqBaiNR4ZNnQ4CE_nKbI7uREWG93---F7TpN9lMPDp_P4zhN76afgkdg_ALaROoyJr5_vmEaoCi88hmyPQ7vaBSJaXywMCo9qBXwAdnTvFhHYMDHjqb0GWQrd33DJHkdS-T4rTEGWgqzHIVDYmp3Hiv5ZNNJMvEOz_O5ccShbZee_uWKJQak7GEe4bqt97Ig56lsNhP1Ee5nDyNjRZgjqLEc-qT5mwLQ6dfYvKdmv7Hur15iyAOq8nDmhOxv0aBAazyWNwiuoOKkae7ld-_h8ui8uBA8hxGXLFVn3C0UiVYD6xbULqXl62E3DH8BaUwjhbFmGcFsW1fuBIWr4uuYHVKf1FlIk589i3rFsM_PIu1WRqYptDPgwvWN5P1N9FGzuR6pnDl4ko', 0, 1, NULL, 'normal', NULL, NULL, 'oTJcPG3m', '0.00', NULL, NULL, '2022-08-17 03:27:39', '2022-08-17 06:10:18', NULL),
(2, 'Linkedhill', NULL, 'linkedhillcom@gmail.com', '$2y$10$KwTYWpXL55RWN90f5lffQeu3PcptMMgxFRTE9gH5IQc9RKvzBKK/2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'normal', NULL, NULL, 'F35nl1tI', '0.00', NULL, NULL, '2022-08-17 03:27:40', '2022-08-17 03:27:40', NULL),
(3, 'Linkedhill Agent', NULL, 'linkedhillagent@gmail.com', '$2y$10$hIVYv3dCottpsPHtoxOnVOC2jTAKXU2Cn1jZ5ti7LNToNkXpz80fa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'normal', NULL, NULL, 'KNs31kCo', '0.00', NULL, NULL, '2022-08-17 03:27:40', '2022-08-17 03:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_agent`
--

CREATE TABLE `user_agent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_service`
--

CREATE TABLE `vendor_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_footer` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playstore_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appstore_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_intro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_pro_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_pro_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_login_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_login_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `four_login_sub_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `logo`, `logo_footer`, `favicon`, `email`, `alternate_email`, `phone`, `currency`, `fb_url`, `twitter_url`, `instagram_url`, `youtube_url`, `playstore_url`, `appstore_url`, `short_intro`, `map_url`, `short_description`, `meta_title`, `meta_keyword`, `meta_description`, `address`, `og_image`, `pro_title`, `pro_sub_title`, `second_pro_title`, `second_pro_sub_title`, `blog_title`, `blog_sub_title`, `login_title`, `login_sub_title`, `second_login_sub_title`, `third_login_sub_title`, `four_login_sub_title`, `created_at`, `updated_at`) VALUES
(1, 'linkedHill', 'http://127.0.0.1:8000/images/rsz_logo.png', 'http://127.0.0.1:8000/images/rsz_logo.png', 'http://127.0.0.1:8000/images/rsz_logo.png', 'linkedHill@gmail.com', 'linkedHill@gmail.com', '123456', '123', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://www.playstore.com', 'https://www.appstore.com', 'linkedHill', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.570224491399!2d85.31021321453818!3d27.69967513243707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1918e77a958d%3A0x8adb3649babf6b7e!2sNectar%20Digit!5e0!3m2!1sne!2snp!4v1660727788190!5m2!1sne!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'linkedHill', 'linkedHill', 'linkedHill', 'linkedHill', 'linkedHill', 'https://www.facebook.com', 'Feature property list', 'We offers a wide variety of properties in Kathmandu and in Nepal.', 'Recent property list', 'We offers a wide variety of properties in Kathmandu and in Nepal.2', 'Our Blogs', 'Stay up to date with news, reports, and insights from our teams in Asia and Australia.', 'Why Real State', 'Here we share 3 major points to let you know what makes us stand out among the crowded online real estate portals.', 'Trusted multi-channel property marketing platform developed by experienced digital marketers and real estate domain experts', 'User-friendly portal for thousands of property sellers to advertise their valuable properties and convert to sales', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2022-08-17 03:27:38', '2022-08-17 03:31:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_mobile_unique` (`mobile`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency_details`
--
ALTER TABLE `agency_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `agency_property`
--
ALTER TABLE `agency_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_property_owner_id_foreign` (`owner_id`),
  ADD KEY `agency_property_agency_id_foreign` (`agency_id`),
  ADD KEY `agency_property_property_id_foreign` (`property_id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_reviews`
--
ALTER TABLE `app_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `chat_categories`
--
ALTER TABLE `chat_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `chat_category_references`
--
ALTER TABLE `chat_category_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_category_references_created_by_foreign` (`created_by`),
  ADD KEY `chat_category_references_categoryid_foreign` (`categoryId`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_adminid_foreign` (`adminId`),
  ADD KEY `chat_messages_questionid_foreign` (`questionId`),
  ADD KEY `chat_messages_categoryid_foreign` (`categoryId`),
  ADD KEY `chat_messages_conversationid_foreign` (`conversationId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `conversation_lists`
--
ALTER TABLE `conversation_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `device_credentials`
--
ALTER TABLE `device_credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_credentials_userid_foreign` (`userId`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_foreign` (`province`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_lists`
--
ALTER TABLE `favourite_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_lists_property_id_foreign` (`property_id`),
  ADD KEY `favourite_lists_user_id_foreign` (`user_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `feature_property`
--
ALTER TABLE `feature_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_property_property_id_foreign` (`property_id`),
  ADD KEY `feature_property_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `feature_property_category`
--
ALTER TABLE `feature_property_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_property_category_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_property_category_property_category_id_foreign` (`property_category_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pricings_slug_unique` (`slug`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_category_id_foreign` (`category_id`),
  ADD KEY `properties_city_id_foreign` (`city_id`),
  ADD KEY `properties_area_id_foreign` (`area_id`),
  ADD KEY `properties_user_id_foreign` (`user_id`),
  ADD KEY `properties_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_amenities_user_id_foreign` (`user_id`),
  ADD KEY `property_amenities_property_id_foreign` (`property_id`),
  ADD KEY `property_amenities_amenity_id_foreign` (`amenity_id`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_faqs`
--
ALTER TABLE `property_faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_faqs_property_id_foreign` (`property_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_images_user_id_foreign` (`user_id`),
  ADD KEY `property_images_property_id_foreign` (`property_id`);

--
-- Indexes for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_reviews_property_id_foreign` (`property_id`),
  ADD KEY `property_reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purposes`
--
ALTER TABLE `purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_created_by_foreign` (`created_by`),
  ADD KEY `questions_categoryid_foreign` (`categoryId`),
  ADD KEY `questions_parentid_foreign` (`parentId`);

--
-- Indexes for table `road_types`
--
ALTER TABLE `road_types`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_categories_slug_unique` (`slug`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tradelinks`
--
ALTER TABLE `tradelinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tradelinks_category_id_foreign` (`category_id`),
  ADD KEY `tradelinks_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `tradelink_admins`
--
ALTER TABLE `tradelink_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tradelink_admins_email_unique` (`email`);

--
-- Indexes for table `tradelink_books`
--
ALTER TABLE `tradelink_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tradelink_books_tradelink_id_foreign` (`tradelink_id`),
  ADD KEY `tradelink_books_user_id_foreign` (`user_id`);

--
-- Indexes for table `tradelink_categories`
--
ALTER TABLE `tradelink_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tradelink_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `tradelink_sliders`
--
ALTER TABLE `tradelink_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tradelink_subscribers`
--
ALTER TABLE `tradelink_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tradelink_websites`
--
ALTER TABLE `tradelink_websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_referred_by_foreign` (`referred_by`);

--
-- Indexes for table `user_agent`
--
ALTER TABLE `user_agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_agent_user_id_foreign` (`user_id`),
  ADD KEY `user_agent_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `vendor_service`
--
ALTER TABLE `vendor_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_service_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agency_details`
--
ALTER TABLE `agency_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agency_property`
--
ALTER TABLE `agency_property`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_reviews`
--
ALTER TABLE `app_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat_categories`
--
ALTER TABLE `chat_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_category_references`
--
ALTER TABLE `chat_category_references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;

--
-- AUTO_INCREMENT for table `conversation_lists`
--
ALTER TABLE `conversation_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_credentials`
--
ALTER TABLE `device_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favourite_lists`
--
ALTER TABLE `favourite_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feature_property`
--
ALTER TABLE `feature_property`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_property_category`
--
ALTER TABLE `feature_property_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_faqs`
--
ALTER TABLE `property_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purposes`
--
ALTER TABLE `purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `road_types`
--
ALTER TABLE `road_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelinks`
--
ALTER TABLE `tradelinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelink_admins`
--
ALTER TABLE `tradelink_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelink_books`
--
ALTER TABLE `tradelink_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelink_categories`
--
ALTER TABLE `tradelink_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelink_sliders`
--
ALTER TABLE `tradelink_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelink_subscribers`
--
ALTER TABLE `tradelink_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tradelink_websites`
--
ALTER TABLE `tradelink_websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_agent`
--
ALTER TABLE `user_agent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_service`
--
ALTER TABLE `vendor_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agency_details`
--
ALTER TABLE `agency_details`
  ADD CONSTRAINT `agency_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agency_property`
--
ALTER TABLE `agency_property`
  ADD CONSTRAINT `agency_property_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agency_property_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agency_property_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_reviews`
--
ALTER TABLE `app_reviews`
  ADD CONSTRAINT `app_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD CONSTRAINT `blog_category_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_categories`
--
ALTER TABLE `chat_categories`
  ADD CONSTRAINT `chat_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `chat_category_references`
--
ALTER TABLE `chat_category_references`
  ADD CONSTRAINT `chat_category_references_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `chat_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_category_references_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_adminid_foreign` FOREIGN KEY (`adminId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_messages_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `chat_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_messages_conversationid_foreign` FOREIGN KEY (`conversationId`) REFERENCES `conversation_lists` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_messages_questionid_foreign` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `device_credentials`
--
ALTER TABLE `device_credentials`
  ADD CONSTRAINT `device_credentials_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_foreign` FOREIGN KEY (`province`) REFERENCES `provinces` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `favourite_lists`
--
ALTER TABLE `favourite_lists`
  ADD CONSTRAINT `favourite_lists_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourite_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `features` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `feature_property`
--
ALTER TABLE `feature_property`
  ADD CONSTRAINT `feature_property_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
  ADD CONSTRAINT `feature_property_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `feature_property_category`
--
ALTER TABLE `feature_property_category`
  ADD CONSTRAINT `feature_property_category_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
  ADD CONSTRAINT `feature_property_category_property_category_id_foreign` FOREIGN KEY (`property_category_id`) REFERENCES `property_categories` (`id`);

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
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `property_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD CONSTRAINT `property_amenities_amenity_id_foreign` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_amenities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_amenities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_faqs`
--
ALTER TABLE `property_faqs`
  ADD CONSTRAINT `property_faqs_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD CONSTRAINT `property_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `property_reviews_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `chat_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_parentid_foreign` FOREIGN KEY (`parentId`) REFERENCES `questions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tradelinks`
--
ALTER TABLE `tradelinks`
  ADD CONSTRAINT `tradelinks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tradelink_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tradelinks_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tradelink_books`
--
ALTER TABLE `tradelink_books`
  ADD CONSTRAINT `tradelink_books_tradelink_id_foreign` FOREIGN KEY (`tradelink_id`) REFERENCES `tradelinks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tradelink_books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tradelink_categories`
--
ALTER TABLE `tradelink_categories`
  ADD CONSTRAINT `tradelink_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `tradelink_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_referred_by_foreign` FOREIGN KEY (`referred_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_agent`
--
ALTER TABLE `user_agent`
  ADD CONSTRAINT `user_agent_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_agent_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_service`
--
ALTER TABLE `vendor_service`
  ADD CONSTRAINT `vendor_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_service_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `tradelink_admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
