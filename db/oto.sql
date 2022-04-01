-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: oto
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advert`
--

DROP TABLE IF EXISTS `advert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advert` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `region_id` int NOT NULL,
  `sub_region` varchar(255) DEFAULT NULL,
  `thumb_img` varchar(255) DEFAULT NULL,
  `price` int DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `created_id` int DEFAULT '0',
  `expire_at` int DEFAULT NULL,
  `company_id` int DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  `views` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `regionAdvertId` (`region_id`),
  CONSTRAINT `regionAdvertId` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advert`
--

LOCK TABLES `advert` WRITE;
/*!40000 ALTER TABLE `advert` DISABLE KEYS */;
/*!40000 ALTER TABLE `advert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advert_cat`
--

DROP TABLE IF EXISTS `advert_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advert_cat` (
  `advert_id` int NOT NULL,
  `cat_id` int NOT NULL,
  KEY `advertAdvertId` (`advert_id`),
  KEY `advertCategoryId` (`cat_id`),
  CONSTRAINT `advertAdvertId` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON DELETE CASCADE,
  CONSTRAINT `advertCategoryId` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advert_cat`
--

LOCK TABLES `advert_cat` WRITE;
/*!40000 ALTER TABLE `advert_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `advert_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `descr` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_tag`
--

DROP TABLE IF EXISTS `category_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(11) DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reqCatTagCat` (`cat_id`),
  CONSTRAINT `reqCatTagCat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_tag`
--

LOCK TABLES `category_tag` WRITE;
/*!40000 ALTER TABLE `category_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_group`
--

DROP TABLE IF EXISTS `chat_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_message` varchar(255) DEFAULT NULL,
  `last_message_time` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` int NOT NULL,
  `created_id` int NOT NULL,
  `deleted_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_group`
--

LOCK TABLES `chat_group` WRITE;
/*!40000 ALTER TABLE `chat_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_group_users`
--

DROP TABLE IF EXISTS `chat_group_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_group_users` (
  `user_id` int NOT NULL,
  `chat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_group_users`
--

LOCK TABLES `chat_group_users` WRITE;
/*!40000 ALTER TABLE `chat_group_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_group_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `type` int DEFAULT '1',
  `created_id` int NOT NULL,
  `created_at` int NOT NULL,
  `deleted_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message`
--

LOCK TABLES `chat_message` WRITE;
/*!40000 ALTER TABLE `chat_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` float DEFAULT NULL,
  `rate_count` int DEFAULT NULL,
  `details` text NOT NULL,
  `region_id` int DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact_id` int DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `lat_lng` varchar(255) DEFAULT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `wall_image` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_id` int DEFAULT '0',
  `created_at` int NOT NULL,
  `updated_id` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `is_material` tinyint(1) DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `followers` int DEFAULT '0',
  `following` int DEFAULT '0',
  `facebook_link` varchar(100) DEFAULT NULL,
  `vk_link` varchar(100) DEFAULT NULL,
  `lat` float(99,15) DEFAULT NULL,
  `lon` float(99,15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `companyCatId` (`cat_id`),
  KEY `regionCompanyId` (`region_id`),
  KEY `createdCompanyId` (`created_id`),
  KEY `updatedCompanyId` (`updated_id`),
  CONSTRAINT `companyCatId` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `createdCompanyId` FOREIGN KEY (`created_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `regionCompanyId` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  CONSTRAINT `updatedCompanyId` FOREIGN KEY (`updated_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=739 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_cat`
--

DROP TABLE IF EXISTS `company_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_cat` (
  `company_id` int NOT NULL,
  `cat_id` int NOT NULL,
  KEY `companyCcatId` (`company_id`),
  KEY `companyCcId` (`cat_id`),
  CONSTRAINT `companyCcatId` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  CONSTRAINT `companyCcId` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_cat`
--

LOCK TABLES `company_cat` WRITE;
/*!40000 ALTER TABLE `company_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_contact`
--

DROP TABLE IF EXISTS `company_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_primary` tinyint(1) DEFAULT '0',
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companyContactId` (`company_id`),
  CONSTRAINT `companyContactId` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=450 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_contact`
--

LOCK TABLES `company_contact` WRITE;
/*!40000 ALTER TABLE `company_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_message`
--

DROP TABLE IF EXISTS `company_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `body` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT '0',
  `created_at` int NOT NULL,
  `open_id` int DEFAULT '0',
  `open_at` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companyMessageId` (`company_id`),
  CONSTRAINT `companyMessageId` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_message`
--

LOCK TABLES `company_message` WRITE;
/*!40000 ALTER TABLE `company_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_product`
--

DROP TABLE IF EXISTS `company_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `articul` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `name_kz` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `details` text,
  `detauls_kz` text,
  `rating` int DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `images` text,
  `country_code` varchar(3) DEFAULT NULL,
  `type` int DEFAULT NULL,
  `section` int DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `collection_name` varchar(255) DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  `company_id` int NOT NULL,
  `views` int DEFAULT '0',
  `created_at` int NOT NULL,
  `created_id` int NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `cat_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `productCompanyId` (`company_id`),
  KEY `productUnitId` (`unit_id`),
  KEY `productCatId` (`cat_id`),
  KEY `productCreatedId` (`created_id`),
  CONSTRAINT `productCatId` FOREIGN KEY (`cat_id`) REFERENCES `mcategory` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productCompanyId` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productCreatedId` FOREIGN KEY (`created_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `productUnitId` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_product`
--

LOCK TABLES `company_product` WRITE;
/*!40000 ALTER TABLE `company_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_product_mcat`
--

DROP TABLE IF EXISTS `company_product_mcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_product_mcat` (
  `product_id` int NOT NULL,
  `mcat_id` int NOT NULL,
  `company_id` int NOT NULL DEFAULT '0',
  KEY `cpmId` (`product_id`),
  KEY `cpmIdd` (`mcat_id`),
  CONSTRAINT `cpmId` FOREIGN KEY (`product_id`) REFERENCES `company_product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cpmIdd` FOREIGN KEY (`mcat_id`) REFERENCES `mcategory` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_product_mcat`
--

LOCK TABLES `company_product_mcat` WRITE;
/*!40000 ALTER TABLE `company_product_mcat` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_product_mcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_project`
--

DROP TABLE IF EXISTS `company_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `details` text,
  `price` int DEFAULT '0',
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `addr` text,
  `main_image` varchar(255) DEFAULT NULL,
  `company_id` int NOT NULL,
  `created_at` int NOT NULL,
  `created_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyProjectCompany` (`company_id`),
  CONSTRAINT `companyProjectCompany` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_project`
--

LOCK TABLES `company_project` WRITE;
/*!40000 ALTER TABLE `company_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_project_image`
--

DROP TABLE IF EXISTS `company_project_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_project_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `details` text,
  PRIMARY KEY (`id`),
  KEY `companyProjectImage` (`project_id`),
  CONSTRAINT `companyProjectImage` FOREIGN KEY (`project_id`) REFERENCES `company_project` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_project_image`
--

LOCK TABLES `company_project_image` WRITE;
/*!40000 ALTER TABLE `company_project_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_project_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_review`
--

DROP TABLE IF EXISTS `company_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `attach` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `rate` int DEFAULT '0',
  `created_id` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `accept_id` int DEFAULT NULL,
  `accept_at` int DEFAULT NULL,
  `answer` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `companyReviewId` (`company_id`),
  CONSTRAINT `companyReviewId` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_review`
--

LOCK TABLES `company_review` WRITE;
/*!40000 ALTER TABLE `company_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` int DEFAULT NULL,
  `created_id` int DEFAULT '0',
  `open_at` int DEFAULT NULL,
  `open_id` int DEFAULT '0',
  `body` text,
  `phone_hide` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=486 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `q` varchar(255) NOT NULL,
  `a` text NOT NULL,
  `cat_id` int DEFAULT NULL,
  `sort` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqCatId` (`cat_id`),
  CONSTRAINT `faqCatId` FOREIGN KEY (`cat_id`) REFERENCES `faq_cat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_cat`
--

DROP TABLE IF EXISTS `faq_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_cat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_cat`
--

LOCK TABLES `faq_cat` WRITE;
/*!40000 ALTER TABLE `faq_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_queue`
--

DROP TABLE IF EXISTS `mail_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail_queue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `attempts` int DEFAULT NULL,
  `last_attempt_time` datetime DEFAULT NULL,
  `sent_time` datetime DEFAULT NULL,
  `time_to_send` datetime NOT NULL,
  `swift_message` longtext,
  PRIMARY KEY (`id`),
  KEY `IX_time_to_send` (`time_to_send`),
  KEY `IX_sent_time` (`sent_time`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_queue`
--

LOCK TABLES `mail_queue` WRITE;
/*!40000 ALTER TABLE `mail_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mcategory`
--

DROP TABLE IF EXISTS `mcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `descr` text,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `parent_lvl` int DEFAULT '0',
  `item_count` int DEFAULT '0',
  `view_count` int DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1758 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mcategory`
--

LOCK TABLES `mcategory` WRITE;
/*!40000 ALTER TABLE `mcategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `mcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mcompany_mcat`
--

DROP TABLE IF EXISTS `mcompany_mcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mcompany_mcat` (
  `mcompany_id` int NOT NULL,
  `mcat_id` int NOT NULL,
  KEY `mcompanyMcatId` (`mcompany_id`),
  KEY `mcompanyMcatCat` (`mcat_id`),
  CONSTRAINT `mcompanyMcatCat` FOREIGN KEY (`mcat_id`) REFERENCES `mcategory` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mcompanyMcatId` FOREIGN KEY (`mcompany_id`) REFERENCES `company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mcompany_mcat`
--

LOCK TABLES `mcompany_mcat` WRITE;
/*!40000 ALTER TABLE `mcompany_mcat` DISABLE KEYS */;
/*!40000 ALTER TABLE `mcompany_mcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(255) DEFAULT NULL,
  `notifiable_type` varchar(255) DEFAULT NULL,
  `notifiable_id` int unsigned DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `notifiable` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_views`
--

DROP TABLE IF EXISTS `page_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_views` (
  `page_id` int NOT NULL,
  `type_id` int NOT NULL,
  `ip_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_views`
--

LOCK TABLES `page_views` WRITE;
/*!40000 ALTER TABLE `page_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req`
--

DROP TABLE IF EXISTS `req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `req` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subcontractor` int DEFAULT '0',
  `team` int DEFAULT '0',
  `master` int DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `region_id` int NOT NULL,
  `subregion` varchar(255) DEFAULT NULL,
  `price` int NOT NULL,
  `req_type` int NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `created_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_id` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `req_pay` smallint DEFAULT '0',
  `due_date` int DEFAULT '0',
  `phone_hide` tinyint(1) DEFAULT '0',
  `type` int DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `regionReqId` (`region_id`),
  KEY `createdReqId` (`created_id`),
  KEY `updatedReqId` (`updated_id`),
  CONSTRAINT `regionReqId` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=349 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req`
--

LOCK TABLES `req` WRITE;
/*!40000 ALTER TABLE `req` DISABLE KEYS */;
/*!40000 ALTER TABLE `req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_cat`
--

DROP TABLE IF EXISTS `req_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `req_cat` (
  `req_id` int NOT NULL,
  `cat_id` int NOT NULL,
  KEY `reqRcId` (`req_id`),
  KEY `catRcId` (`cat_id`),
  CONSTRAINT `catRcId` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reqRcId` FOREIGN KEY (`req_id`) REFERENCES `req` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_cat`
--

LOCK TABLES `req_cat` WRITE;
/*!40000 ALTER TABLE `req_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_company_items`
--

DROP TABLE IF EXISTS `req_company_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `req_company_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `req_id` int NOT NULL,
  `req_item_id` int NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `created_at` int NOT NULL,
  `created_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_company_items`
--

LOCK TABLES `req_company_items` WRITE;
/*!40000 ALTER TABLE `req_company_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_company_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_feed`
--

DROP TABLE IF EXISTS `req_feed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `req_feed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `req_id` int NOT NULL,
  `price` int NOT NULL,
  `comments` text,
  `status` int DEFAULT '0',
  `created_id` int NOT NULL,
  `created_at` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reqFeedId` (`req_id`),
  CONSTRAINT `reqFeedId` FOREIGN KEY (`req_id`) REFERENCES `req` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_feed`
--

LOCK TABLES `req_feed` WRITE;
/*!40000 ALTER TABLE `req_feed` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_feed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_items`
--

DROP TABLE IF EXISTS `req_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `req_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `req_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_type` int DEFAULT '1',
  `qty` decimal(10,2) NOT NULL,
  `created_at` int NOT NULL,
  `created_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_items`
--

LOCK TABLES `req_items` WRITE;
/*!40000 ALTER TABLE `req_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_upload`
--

DROP TABLE IF EXISTS `req_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `req_upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `req_id` int NOT NULL,
  `name_orig` varchar(255) NOT NULL,
  `name_server` varchar(255) NOT NULL,
  `ext` varchar(30) NOT NULL,
  `uploaded_at` int DEFAULT NULL,
  `uploaded_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reqUploadRpId` (`req_id`),
  CONSTRAINT `reqUploadRpId` FOREIGN KEY (`req_id`) REFERENCES `req` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_upload`
--

LOCK TABLES `req_upload` WRITE;
/*!40000 ALTER TABLE `req_upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reqs_forms`
--

DROP TABLE IF EXISTS `reqs_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reqs_forms` (
  `req_id` int NOT NULL,
  `form_id` int NOT NULL,
  KEY `reqFormReqId` (`req_id`),
  KEY `reqFormId` (`form_id`),
  CONSTRAINT `reqFormId` FOREIGN KEY (`form_id`) REFERENCES `contact_form` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reqFormReqId` FOREIGN KEY (`req_id`) REFERENCES `req` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reqs_forms`
--

LOCK TABLES `reqs_forms` WRITE;
/*!40000 ALTER TABLE `reqs_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `reqs_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `koef` float DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `item_type` int NOT NULL,
  `name_orig` varchar(255) NOT NULL,
  `name_server` varchar(255) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `uploaded_at` int NOT NULL,
  `uploaded_id` int NOT NULL,
  `descr` text,
  `dop_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uploadedUId` (`uploaded_id`),
  CONSTRAINT `uploadedUId` FOREIGN KEY (`uploaded_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_type`
--

DROP TABLE IF EXISTS `upload_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_type`
--

LOCK TABLES `upload_type` WRITE;
/*!40000 ALTER TABLE `upload_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cat` int DEFAULT '1',
  `is_req` tinyint(1) DEFAULT '0',
  `company_id` int DEFAULT '0',
  `avatar_image` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '9',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `login_at` int DEFAULT NULL,
  `login_ip` varchar(100) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_prop`
--

DROP TABLE IF EXISTS `user_prop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_prop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `iin` int DEFAULT NULL,
  `bin` int DEFAULT NULL,
  `addr` text,
  `addr2` text,
  `phone` varchar(100) DEFAULT NULL,
  `emails` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `userPropId` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_prop`
--

LOCK TABLES `user_prop` WRITE;
/*!40000 ALTER TABLE `user_prop` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_prop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_statistic`
--

DROP TABLE IF EXISTS `wizard_statistic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wizard_statistic` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `step` smallint DEFAULT '0',
  `created_at` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_statistic`
--

LOCK TABLES `wizard_statistic` WRITE;
/*!40000 ALTER TABLE `wizard_statistic` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_statistic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `word`
--

DROP TABLE IF EXISTS `word`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `word` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int DEFAULT '0',
  `descr` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2900 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `word`
--

LOCK TABLES `word` WRITE;
/*!40000 ALTER TABLE `word` DISABLE KEYS */;
/*!40000 ALTER TABLE `word` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `word_name`
--

DROP TABLE IF EXISTS `word_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `word_name` (
  `word_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_type` int NOT NULL,
  KEY `wordNId` (`word_id`),
  KEY `wordTId` (`item_type`),
  CONSTRAINT `wordNId` FOREIGN KEY (`word_id`) REFERENCES `word` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wordTId` FOREIGN KEY (`item_type`) REFERENCES `word_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `word_name`
--

LOCK TABLES `word_name` WRITE;
/*!40000 ALTER TABLE `word_name` DISABLE KEYS */;
/*!40000 ALTER TABLE `word_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `word_type`
--

DROP TABLE IF EXISTS `word_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `word_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `word_type`
--

LOCK TABLES `word_type` WRITE;
/*!40000 ALTER TABLE `word_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `word_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-23 15:44:31
