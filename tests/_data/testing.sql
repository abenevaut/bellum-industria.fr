-- MySQL dump 10.13  Distrib 5.5.42, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: cvepdb_cms
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `organization` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `street_extra` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state_a2` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `state_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `country_a2` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `country_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `is_billing` tinyint(1) NOT NULL DEFAULT '0',
  `is_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_index` (`user_id`),
  KEY `addresses_is_primary_index` (`is_primary`),
  KEY `addresses_is_billing_index` (`is_billing`),
  KEY `addresses_is_shipping_index` (`is_shipping`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_keys`
--

DROP TABLE IF EXISTS `api_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_keys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `key` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` smallint(6) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_keys_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_keys`
--

LOCK TABLES `api_keys` WRITE;
/*!40000 ALTER TABLE `api_keys` DISABLE KEYS */;
INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,1,'e2963477db70035b6c6609cea38c56e63c0b0520',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(2,2,'70de269b53ee3707c4d9ff2331441f3c4cc38b52',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(3,3,'d6188be347a8650328b5a27b7b1f8bd30dbc7b14',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(4,4,'6bce1a0947067e20056319699fb777dbc6928ca2',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(5,5,'407f97df3f454bbe8c3c26eac06fa0b2427c9841',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(6,6,'80696b62fdcdfb34aa7bdd7a7b439fd47015a0f5',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(7,7,'7780b8ff81aa8a092bd13da138c987c8d886ed61',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(8,8,'5adc96c626320220beae8e743d15608b92f02a52',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(9,9,'ec83473ec3cf0fee51311c6619f22688f5fe95a1',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(10,10,'dfe50da79ec5a3f83d3f28e0f05e7bbcee3a7402',10,0,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(11,11,'a06ac15b7bd376e8018a05c80e836b4ef96c6e9a',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(12,12,'f7a21d901d5811fd1bdb4c2cf9198cd49597a836',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(13,13,'468a68884e51bdabcd19645ddae9c025bea71670',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(14,14,'97a58e1c91298ad26d13237161e88fd3e4f32355',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(15,15,'24fe028344bccc9ff0b8087f87edbabf035f2511',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(16,16,'2fee699bd103c9783655233d5f993b6dcdf7b45a',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(17,17,'c237711e1d100ba53356f13e594dc10285054696',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(18,18,'1938a37ed2b950f9c03d842cb9c87501fbaf3abc',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(19,19,'8ea493942b94651ed07dd93c320f74dcbb80b47b',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(20,20,'c8ef1dd4250707d736e40b3f9d7d8deb402523b4',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(21,21,'0f9b76815fe74bf6e50e80c03419c5ce77ca802a',10,0,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL);
/*!40000 ALTER TABLE `api_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_logs`
--

DROP TABLE IF EXISTS `api_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `api_key_id` int(10) unsigned DEFAULT NULL,
  `route` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `api_logs_route_index` (`route`),
  KEY `api_logs_method_index` (`method`),
  KEY `api_logs_api_key_id_foreign` (`api_key_id`),
  CONSTRAINT `api_logs_api_key_id_foreign` FOREIGN KEY (`api_key_id`) REFERENCES `api_keys` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_logs`
--

LOCK TABLES `api_logs` WRITE;
/*!40000 ALTER TABLE `api_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `a2` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `a3` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `name`, `a2`, `a3`) VALUES (1,'Afghanistan','AF','AFG'),(2,'Albania','AL','ALB'),(3,'Algeria','DZ','DZA'),(4,'American Samoa','AS','ASM'),(5,'Andorra','AD','AND'),(6,'Angola','AO','AGO'),(7,'Anguilla','AI','AIA'),(8,'Antarctica','AQ','ATA'),(9,'Antigua and Barbuda','AG','ATG'),(10,'Argentina','AR','ARG'),(11,'Armenia','AM','ARM'),(12,'Aruba','AW','ABW'),(13,'Australia','AU','AUS'),(14,'Austria','AT','AUT'),(15,'Azerbaijan','AZ','AZE'),(16,'Bahamas','BS','BHS'),(17,'Bahrain','BH','BHR'),(18,'Bangladesh','BD','BGD'),(19,'Barbados','BB','BRB'),(20,'Belarus','BY','BLR'),(21,'Belgium','BE','BEL'),(22,'Belize','BZ','BLZ'),(23,'Benin','BJ','BEN'),(24,'Bermuda','BM','BMU'),(25,'Bhutan','BT','BTN'),(26,'Bolivia','BO','BOL'),(27,'Bosnia-Herzegovina','BA','BIH'),(28,'Botswana','BW','BWA'),(29,'Bouvet Island','BV','BVT'),(30,'Brazil','BR','BRA'),(31,'British Indian Ocean Territory','IO','IOT'),(32,'Brunei Darussalam','BN','BRN'),(33,'Bulgaria','BG','BGR'),(34,'Burkina Faso','BF','BFA'),(35,'Burundi','BI','BDI'),(36,'Cambodia','KH','KHM'),(37,'Cameroon','CM','CMR'),(38,'Canada','CA','CAN'),(39,'Cape Verde','CV','CPV'),(40,'Cayman Islands','KY','CYM'),(41,'Central African Republic','CF','CAF'),(42,'Chad','TD','TCD'),(43,'Chile','CL','CHL'),(44,'China','CN','CHN'),(45,'Christmas Island','CX','CXR'),(46,'Cocos (Keeling) Islands','CC','CCK'),(47,'Colombia','CO','COL'),(48,'Comoros','KM','COM'),(49,'Congo','CG','COG'),(50,'Congo, Democratic Republic of','CD','COD'),(51,'Cook Islands','CK','COK'),(52,'Costa Rica','CR','CRI'),(53,'Cote D\'Ivoire','CI','CIV'),(54,'Croatia (Hrvatska)','HR','HRV'),(55,'Cuba','CU','CUB'),(56,'Cyprus','CY','CYP'),(57,'Czech Republic','CZ','CZE'),(58,'Denmark','DK','DNK'),(59,'Djibouti','DJ','DJI'),(60,'Dominica','DM','DMA'),(61,'Dominican Republic','DO','DOM'),(62,'East Timor','TP','TMP'),(63,'Ecuador','EC','ECU'),(64,'Egypt','EG','EGY'),(65,'El Salvador','SV','SLV'),(66,'Equatorial Guinea','GQ','GNQ'),(67,'Eritrea','ER','ERI'),(68,'Estonia','EE','EST'),(69,'Ethiopia','ET','ETH'),(70,'Falkland Islands (Malvinas)','FK','FLK'),(71,'Faroe Islands','FO','FRO'),(72,'Fiji','FJ','FJI'),(73,'Finland','FI','FIN'),(74,'France','FR','FRA'),(75,'French Guiana','GF','GUF'),(76,'French Polynesia','PF','PYF'),(77,'French Southern Territories','TF','ATF'),(78,'Gabon','GA','GAB'),(79,'Gambia','GM','GMB'),(80,'Georgia','GE','GEO'),(81,'Germany','DE','DEU'),(82,'Ghana','GH','GHA'),(83,'Gibraltar','GI','GIB'),(84,'Great Britain (England, Scotland, Wales)','GB','GBR'),(85,'Greece','GR','GRC'),(86,'Greenland','GL','GRL'),(87,'Grenada','GD','GRD'),(88,'Guadeloupe','GP','GLP'),(89,'Guam','GU','GUM'),(90,'Guatemala','GT','GTM'),(91,'Guinea','GN','GIN'),(92,'Guinea-Bissau','GW','GNB'),(93,'Guyana','GY','GUY'),(94,'Haiti','HT','HTI'),(95,'Heard Island and McDonald Islands','HM','HMD'),(96,'Honduras','HN','HND'),(97,'Hong Kong SAR of PRC','HK','HKG'),(98,'Hungary','HU','HUN'),(99,'Iceland','IS','ISL'),(100,'India','IN','IND'),(101,'Indonesia','ID','IDN'),(102,'Iran','IR','IRN'),(103,'Iraq','IQ','IRQ'),(104,'Ireland','IE','IRL'),(105,'Israel','IL','ISR'),(106,'Italy','IT','ITA'),(107,'Jamaica','JM','JAM'),(108,'Japan','JP','JPN'),(109,'Jordan','JO','JOR'),(110,'Kazakhstan','KZ','KAZ'),(111,'Kenya','KE','KEN'),(112,'Kiribati','KI','KIR'),(113,'Republic of Korea (South Korea)','KR','KOR'),(114,'Korea, Democratic People\'s Republic (North Korea)','KP','PRK'),(115,'Kosovo','XK','UNK'),(116,'Kuwait','KW','KWT'),(117,'Kyrgyzstan','KG','KGZ'),(118,'Lao People\'s Democratic Republic','LA','LAO'),(119,'Latvia','LV','LVA'),(120,'Lebanon','LB','LBN'),(121,'Lesotho','LS','LSO'),(122,'Liberia','LR','LBR'),(123,'Libyan Arab Jamahiriya','LY','LBY'),(124,'Liechtenstein','LI','LIE'),(125,'Lithuania','LT','LTU'),(126,'Luxembourg','LU','LUX'),(127,'Macao SAR of PRC (Macau)','MO','MAC'),(128,'Macedonia','MK','MKD'),(129,'Madagascar','MG','MDG'),(130,'Malawi','MW','MWI'),(131,'Malaysia','MY','MYS'),(132,'Maldives','MV','MDV'),(133,'Mali','ML','MLI'),(134,'Malta','MT','MLT'),(135,'Marshall Islands','MH','MHL'),(136,'Martinique','MQ','MTQ'),(137,'Mauritania','MR','MRT'),(138,'Mauritius','MU','MUS'),(139,'Mayotte','YT','MYT'),(140,'Mexico','MX','MEX'),(141,'Micronesia, Federated States of','FM','FSM'),(142,'Monaco','MC','MCO'),(143,'Mongolia','MN','MNG'),(144,'Montenegro','ME','MNE'),(145,'Montserrat','MS','MSR'),(146,'Morocco','MA','MAR'),(147,'Mozambique','MZ','MOZ'),(148,'Myanmar','MM','MMR'),(149,'Namibia','NA','NAM'),(150,'Nauru','NR','NRU'),(151,'Nepal','NP','NPL'),(152,'Netherlands','NL','NLD'),(153,'Netherlands Antilles','AN','ANT'),(154,'New Caledonia','NC','NCL'),(155,'New Zealand','NZ','NZL'),(156,'Nicaragua','NI','NIC'),(157,'Niger','NE','NER'),(158,'Nigeria','NG','NGA'),(159,'Niue','NU','NIU'),(160,'Norfolk Island','NF','NFK'),(161,'Northern Mariana Islands','MP','MNP'),(162,'Norway','NO','NOR'),(163,'Oman','OM','OMN'),(164,'Pakistan','PK','PAK'),(165,'Palau','PW','PLW'),(166,'Panama','PA','PAN'),(167,'Papua New Guinea','PG','PNG'),(168,'Paraguay','PY','PRY'),(169,'Peru','PE','PER'),(170,'Philippines','PH','PHL'),(171,'Pitcairn','PN','PCN'),(172,'Poland','PL','POL'),(173,'Portugal','PT','PRT'),(174,'Puerto Rico','PR','PRI'),(175,'Qatar','QA','QAT'),(176,'Republic of Moldova','MD','MDA'),(177,'Reunion','RE','REU'),(178,'Romania','RO','ROM'),(179,'Russia','RU','RUS'),(180,'Rwanda','RW','RWA'),(181,'Saint Helena','SH','SHN'),(182,'Saint Kitts and Nevis','KN','KNA'),(183,'Saint Lucia','LC','LCA'),(184,'Saint Pierre and Miquelon','PM','SPM'),(185,'Saint Vincent and the Grenadines','VC','VCT'),(186,'Samoa','WS','WSM'),(187,'San Marino','SM','SMR'),(188,'Sao Tome and Principe','ST','STP'),(189,'Saudi Arabia','SA','SAU'),(190,'Senegal','SN','SEN'),(191,'Serbia','RS','SRB'),(192,'Seychelles','SC','SYC'),(193,'Sierra Leone','SL','SLE'),(194,'Singapore','SG','SGP'),(195,'Slovakia','SK','SVK'),(196,'Slovenia','SI','SVN'),(197,'Solomon Islands','SB','SLB'),(198,'Somalia','SO','SOM'),(199,'South Africa','ZA','ZAF'),(200,'South Georgia and South Sandwich Islands','GS','SGS'),(201,'Spain','ES','ESP'),(202,'Sri Lanka','LK','LKA'),(203,'Sudan','SD','SDN'),(204,'Suriname','SR','SUR'),(205,'Svalbard and Jan Mayen','SJ','SJM'),(206,'Swaziland','SZ','SWZ'),(207,'Sweden','SE','SWE'),(208,'Switzerland','CH','CHE'),(209,'Syria','SY','SYR'),(210,'Taiwan','TW','TWN'),(211,'Tajikistan','TJ','TJK'),(212,'Tanzania, United Republic of','TZ','TZA'),(213,'Thailand','TH','THA'),(214,'Togo','TG','TGO'),(215,'Tokelau','TK','TKL'),(216,'Tonga','TO','TON'),(217,'Trinidad and Tobago','TT','TTE'),(218,'Tunisia','TN','TUN'),(219,'Turkey','TR','TUR'),(220,'Turkmenistan','TM','TKM'),(221,'Turks and Caicos Islands','TC','TCA'),(222,'Tuvalu','TV','TUV'),(223,'Uganda','UG','UGA'),(224,'Ukraine','UA','UKR'),(225,'United Arab Emirates','AE','ARE'),(226,'United States','US','USA'),(227,'United States Minor Outlying Islands','UM','UMI'),(228,'Uruguay','UY','URY'),(229,'Uzbekistan','UZ','UZB'),(230,'Vanuatu','VU','VUT'),(231,'Vatican City State','VA','VAT'),(232,'Venezuela','VE','VEN'),(233,'Vietnam','VN','VNM'),(234,'Virgin Islands (UK)','VG','VGB'),(235,'Virgin Islands (US)','VI','VIR'),(236,'Wallis and Futuna','WF','WLF'),(237,'Western Sahara','EH','ESH'),(238,'Yemen','YE','YEM'),(239,'Zambia','ZM','ZMB'),(240,'Zimbabwe','ZW','ZWE');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dashboard_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard`
--

LOCK TABLES `dashboard` WRITE;
/*!40000 ALTER TABLE `dashboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` text COLLATE utf8_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8_unicode_ci NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta`
--

DROP TABLE IF EXISTS `meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metable_id` int(10) unsigned NOT NULL,
  `metable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_metable_id_index` (`metable_id`),
  KEY `meta_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta`
--

LOCK TABLES `meta` WRITE;
/*!40000 ALTER TABLE `meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES ('2014_01_15_090136_create_states',1),('2014_01_15_090147_create_countries',1),('2014_01_15_105422_create_addresses',1),('2014_08_15_180252_create_meta_table',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_03_02_031822_create_api_keys_table',1),('2015_04_13_020453_create_settings_table',1),('2015_12_15_020453_alter_settings_table',1),('2016_03_10_153304_entrust_setup_tables',1),('2016_03_14_122839_alter_users_table_remove_name_add_first_name_and_last_name',1),('2016_03_16_102646_create_dashboard_tables',1),('2016_03_22_122054_create_media_table',1),('2016_03_23_150432_alter_users_table_to_add_soft_delete',1),('2016_03_30_203434_alter_roles_table_add_unchangeable_bool',1),('2016_04_04_174738_create_table_pages',1),('2016_04_09_132047_create_logs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_home` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(1,2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unchangeable` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `unchangeable`) VALUES (1,'user','roles.user:display_name','roles.user:description','2016-05-11 11:44:00','2016-05-11 11:44:00',1),(2,'admin','roles.admin:display_name','roles.admin:description','2016-05-11 11:44:00','2016-05-11 11:44:00',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `setting_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci,
  UNIQUE KEY `key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_a2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `a2` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` (`id`, `country_a2`, `name`, `a2`) VALUES (1,'US','Alabama','AL'),(2,'US','Alaska','AK'),(3,'US','Arizona','AZ'),(4,'US','Arkansas','AR'),(5,'US','California','CA'),(6,'US','Colorado','CO'),(7,'US','Connecticut','CT'),(8,'US','Delaware','DE'),(9,'US','District of Columbia','DC'),(10,'US','Florida','FL'),(11,'US','Georgia','GA'),(12,'US','Hawaii','HI'),(13,'US','Idaho','ID'),(14,'US','Illinois','IL'),(15,'US','Indiana','IN'),(16,'US','Iowa','IA'),(17,'US','Kansas','KS'),(18,'US','Kentucky','KY'),(19,'US','Louisiana','LA'),(20,'US','Maine','ME'),(21,'US','Maryland','MD'),(22,'US','Massachusetts','MA'),(23,'US','Michigan','MI'),(24,'US','Minnesota','MN'),(25,'US','Mississippi','MS'),(26,'US','Missouri','MO'),(27,'US','Montana','MT'),(28,'US','Nebraska','NE'),(29,'US','Nevada','NV'),(30,'US','New Hampshire','NH'),(31,'US','New Jersey','NJ'),(32,'US','New Mexico','NM'),(33,'US','New York','NY'),(34,'US','North Carolina','NC'),(35,'US','North Dakota','ND'),(36,'US','Ohio','OH'),(37,'US','Oklahoma','OK'),(38,'US','Oregon','OR'),(39,'US','Pennsylvania','PA'),(40,'US','Puerto Rico','PR'),(41,'US','Rhode Island','RI'),(42,'US','South Carolina','SC'),(43,'US','South Dakota','SD'),(44,'US','Tennessee','TN'),(45,'US','Texas','TX'),(46,'US','Utah','UT'),(47,'US','Vermont','VT'),(48,'US','Virginia','VA'),(49,'US','Washington','WA'),(50,'US','West Virginia','WV'),(51,'US','Wisconsin','WI'),(52,'US','Wyoming','WY'),(53,'CA','Alberta','AB'),(54,'CA','British Columbia','BC'),(55,'CA','Manitoba','MB'),(56,'CA','New Brunswick','NB'),(57,'CA','Newfoundland','NF'),(58,'CA','Northwest Territories','NT'),(59,'CA','Nova Scotia','NS'),(60,'CA','Nunavut','NU'),(61,'CA','Ontario','ON'),(62,'CA','Prince Edward Island','PE'),(63,'CA','Quebec','PQ'),(64,'CA','Saskatchewan','SK'),(65,'CA','Yukon','YT'),(66,'MX','Aguascalientes','AG'),(67,'MX','Baja California','BJ'),(68,'MX','Baja California Sur','BS'),(69,'MX','Campeche','CP'),(70,'MX','Chiapas','CH'),(71,'MX','Chihuahua','CI'),(72,'MX','Coahuila de Zaragoza','CU'),(73,'MX','Colima','CL'),(74,'MX','Distrito Federal','DF'),(75,'MX','Durango','DG'),(76,'MX','Estado Mexico','EM'),(77,'MX','Guanajuato','GJ'),(78,'MX','Guerrero','GR'),(79,'MX','Hidalgo','HG'),(80,'MX','Jalisco','JA'),(81,'MX','Mexico','MX'),(82,'MX','Michoacan','MH'),(83,'MX','Morelos','MR'),(84,'MX','Nayarit','NA'),(85,'MX','Nuevo Leon','NL'),(86,'MX','Oaxaca','OA'),(87,'MX','Puebla','PU'),(88,'MX','Queretaro','QA'),(89,'MX','Quintana Roo','QR'),(90,'MX','San Luis Potosi','SL'),(91,'MX','Sinaloa','SI'),(92,'MX','Sonora','SO'),(93,'MX','Tabasco','TA'),(94,'MX','Tamaulipas','TM'),(95,'MX','Tlaxcala','TL'),(96,'MX','Veracruz Llave','VL'),(97,'MX','Yucatan','YC'),(98,'MX','Zacatecas','ZT'),(99,'FR','Alsace','H0'),(100,'FR','Aquitaine','H1'),(101,'FR','Auvergne','H2'),(102,'FR','Basse-Normandie','H3'),(103,'FR','Bourgogne','H4'),(104,'FR','Bretagne','H5'),(105,'FR','Centre','H6'),(106,'FR','Champagne-Ardenne','H7'),(107,'FR','Corse (Corsica)','H8'),(108,'FR','Franche-Comte','H9'),(109,'FR','Haute-Normandie','HA'),(110,'FR','Ile-de-France','HB'),(111,'FR','Languedoc-Roussillon','AG'),(112,'FR','Limousin','HC'),(113,'FR','Lorraine','HE'),(114,'FR','Midi-Pyrenees','HF'),(115,'FR','Nord-Pas-de-Calais','HG'),(116,'FR','Pays de la Loire','HH'),(117,'FR','Picardie','HJ'),(118,'FR','Poitou-Charentes','HK'),(119,'FR','Provence-Alpes-Cote-d\'Azur','HL'),(120,'FR','Rhone-Alpes','HM');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES (1,'Benevaut','Antoine','antoine@cvepdb.fr','$2y$10$nGiPR5wFJID33dlbhmtj6.hy39MK4luBURI9l6WHEYUO/Qo3aFqcS',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(2,'Florian','Lebsack','Bria16@Leuschke.com','$2y$10$XrQg6rL5e8BWXqpmDoIvqeT5ms6hUwx9g./1YLCdj54VsvSb4ptyy',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(3,'Olen','Rogahn','qBotsford@gmail.com','$2y$10$s6oWrg.ZJa.Jt74zVbFOEuKSxqK1SCFaNov6bvAnLgf5XjQOrIlBq',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(4,'Oma','Bogisich','Johnston.Rodger@hotmail.com','$2y$10$7p/bjC3VvvNdc1qpVWmSeevqiucywT8kAFG/ZCDuAbKNbLsgHyUwa',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(5,'Danielle','Morar','Marcelino21@yahoo.com','$2y$10$kEPtfJ32.ZNAQ7uY8e3m1eRwRyuYpBVMynnn.TmwwegrXMBVJi.wq',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(6,'Myrtle','Okuneva','nCasper@hotmail.com','$2y$10$rJH9Wkz2oHh67HTr9nA9BOTxJAodquqnyo4YGzwmgwKf.oZTbSvNm',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(7,'Milton','Cummings','Alexandro.Price@Quigley.com','$2y$10$MwuiaN.GN12zytziCivxc.HGCg2qTG8q4g38S5OyQe7w.uyTYgqXi',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(8,'Reginald','Gutmann','Senger.Magali@Gorczany.info','$2y$10$JHiUC29Xfg6mtKGKsWx1sOc5XHt4HK0j8N10Qxqi3lrFChxSlDBFa',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(9,'Leilani','Powlowski','Hagenes.Marina@Koss.biz','$2y$10$uwO1kL/gQrAaVArj2EVsyOx8/JSCLnd/ESGz74eupgkktpgPm/eNC',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(10,'Haylie','Gulgowski','Goldner.Marlene@yahoo.com','$2y$10$S7RrSXcqcL5bCB0ADeMHJe.Un9Vu7uQI9wVHjiOCyZ9r.FfiZqZQu',NULL,'2016-05-11 11:44:00','2016-05-11 11:44:00',NULL),(11,'Emilio','Corkery','Lavern90@hotmail.com','$2y$10$8xS91vF7hcZTwUkf2UnHr.qMsYW1iSZ0DXOOGREJzSSqWNqCoDcxG',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(12,'Kavon','Conroy','Joanne18@gmail.com','$2y$10$fFPHx96o.Yi55yg1THMcgeycDf1vaWxXJZwJAcSjpsWzgY8/wQaie',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(13,'Tristian','Marks','Daphney.Hyatt@gmail.com','$2y$10$4AhDv1imBhlmSQvLA5ZJWuR1372JfDiyKEE0sH1vjxUZ.Bh7uYFfO',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(14,'Macie','Von','dOsinski@Renner.com','$2y$10$fq8i2zBHVnrqVKozihoYROqSYwhCQE1Fzf7OJJuVGtMvANewL3vdm',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(15,'Audrey','Jerde','qDurgan@Cole.com','$2y$10$UkbPzC1pzvhfu2oGj1SwReIYUFCGrX1mZvAQW9xmnKw1Ff8OQWtWu',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(16,'Lauriane','Kuhn','Brooke.Johnson@hotmail.com','$2y$10$6o2RyaLhuRpB3fA3QJ5ld.uwZY4rp//Vlr59RpynqNgnxOSUC59du',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(17,'Kristofer','Kuhn','Leuschke.Rodger@Lind.net','$2y$10$MppVPphSRC1C7AC8zJCrdenX2CbyYThzLMq0dBd0xXosms9lE42RW',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(18,'Maximus','Ondricka','Audra89@yahoo.com','$2y$10$Xq3iZtd4whywcS/5oNIYXuvR4GgtWh7q2OXtWR4Eaw8JQArmlst.u',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(19,'Krista','Bashirian','kYundt@Strosin.biz','$2y$10$d/qrlKoZZweN4RL1be6xk.sm2xiePq3V6gwFcZHv43g6rESJOZA/2',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(20,'Ericka','Stanton','Grant.Jasper@yahoo.com','$2y$10$jEoOJl64P3v2DYTCbR3SH.rU4SAeyxjEylOSg94dGJlosRZPpVZ9i',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL),(21,'Marian','Mitchell','Barrows.Hope@Wolff.org','$2y$10$jIALBGFpekQxpWyw/prqWuHYGRc3ojz3qcEcvMG6DWcOOWTDLAoty',NULL,'2016-05-11 11:44:01','2016-05-11 11:44:01',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-11 15:44:01
