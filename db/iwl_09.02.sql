-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: iwl
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cat` int DEFAULT '1',
  `avatar_image` varchar(255) DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `blocked_at` int DEFAULT NULL,
  `blocked_id` int DEFAULT NULL,
  `login_at` int DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `created_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','Администратор','','$2y$13$IH6EYjmRCACh.7QYAWGf0.o9TsBnY7HLkkDs.fFsSPQTOdBgnGpKS',NULL,'admin@iwl.com',NULL,NULL,1,NULL,10,1640627705,NULL,NULL,NULL,NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` smallint DEFAULT '9',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industry`
--

LOCK TABLES `industry` WRITE;
/*!40000 ALTER TABLE `industry` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industry_lang`
--

DROP TABLE IF EXISTS `industry_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industry_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `industry_id` int NOT NULL,
  `lang_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`industry_id`,`lang_id`),
  KEY `fk_industry_lang_industry1` (`industry_id`),
  CONSTRAINT `fk_industry_lang_industry1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industry_lang`
--

LOCK TABLES `industry_lang` WRITE;
/*!40000 ALTER TABLE `industry_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `industry_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrator`
--

DROP TABLE IF EXISTS `integrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `projects_count` int DEFAULT NULL COMMENT 'Кол-во готовых проектов',
  `average_rate` int DEFAULT NULL COMMENT 'Средняя оценка',
  `open_date` smallint DEFAULT NULL COMMENT 'Дата открытия компании',
  `created_at` int DEFAULT NULL COMMENT 'Дата регистрации',
  `created_id` int DEFAULT NULL COMMENT 'Зарегистрировал',
  `updated_at` int DEFAULT NULL COMMENT 'Дата обновления',
  `updated_id` int DEFAULT NULL COMMENT 'Обновил',
  `blocked_at` int DEFAULT NULL COMMENT 'Дата блокировки',
  `blocked_id` int DEFAULT NULL COMMENT 'Заблокировал',
  `last_activity` int DEFAULT NULL COMMENT 'Последняя активность',
  `logo_image` varchar(255) DEFAULT NULL COMMENT 'Лого|img_crop',
  `region_id` int NOT NULL,
  `status` smallint DEFAULT '9',
  PRIMARY KEY (`id`,`region_id`),
  KEY `fk_integrator_country1_idx` (`region_id`),
  CONSTRAINT `fk_integrator_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrator`
--

LOCK TABLES `integrator` WRITE;
/*!40000 ALTER TABLE `integrator` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrator_contacts`
--

DROP TABLE IF EXISTS `integrator_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrator_contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `integrator_id` int NOT NULL,
  `type` int DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_integrator_contacts_integrator1_idx` (`integrator_id`),
  CONSTRAINT `fk_integrator_contacts_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrator_contacts`
--

LOCK TABLES `integrator_contacts` WRITE;
/*!40000 ALTER TABLE `integrator_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrator_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrator_lang`
--

DROP TABLE IF EXISTS `integrator_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrator_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `integrator_id` int NOT NULL,
  `lang_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_descr` varchar(255) DEFAULT NULL,
  `descr` text,
  `addr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`integrator_id`,`lang_id`),
  KEY `fk_integrator_lang_integrator1` (`integrator_id`),
  CONSTRAINT `fk_integrator_lang_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrator_lang`
--

LOCK TABLES `integrator_lang` WRITE;
/*!40000 ALTER TABLE `integrator_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrator_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrator_prop`
--

DROP TABLE IF EXISTS `integrator_prop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrator_prop` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrator_prop`
--

LOCK TABLES `integrator_prop` WRITE;
/*!40000 ALTER TABLE `integrator_prop` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrator_prop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrator_prop_lang`
--

DROP TABLE IF EXISTS `integrator_prop_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrator_prop_lang` (
  `int(11)` int NOT NULL AUTO_INCREMENT,
  `integrator_prop_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL,
  PRIMARY KEY (`int(11)`),
  KEY `fk_integrator_prop_lang_integrator_prop1_idx` (`integrator_prop_id`),
  KEY `fk_integrator_prop_lang_lang1_idx` (`lang_id`),
  CONSTRAINT `fk_integrator_prop_lang_integrator_prop1` FOREIGN KEY (`integrator_prop_id`) REFERENCES `integrator_prop` (`id`),
  CONSTRAINT `fk_integrator_prop_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrator_prop_lang`
--

LOCK TABLES `integrator_prop_lang` WRITE;
/*!40000 ALTER TABLE `integrator_prop_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrator_prop_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrators_products`
--

DROP TABLE IF EXISTS `integrators_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrators_products` (
  `integrator_id` int NOT NULL,
  `product_id` int NOT NULL,
  `props` text,
  `min_price` int DEFAULT NULL,
  PRIMARY KEY (`integrator_id`,`product_id`),
  KEY `fk_integrators_products_product1_idx` (`product_id`),
  CONSTRAINT `fk_integrators_products_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`),
  CONSTRAINT `fk_integrators_products_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrators_products`
--

LOCK TABLES `integrators_products` WRITE;
/*!40000 ALTER TABLE `integrators_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrators_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrators_props`
--

DROP TABLE IF EXISTS `integrators_props`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrators_props` (
  `integrator_id` int NOT NULL,
  `integrator_prop_id` int NOT NULL,
  KEY `fk_integrators_props_integrator1_idx` (`integrator_id`),
  KEY `fk_integrators_props_integrator_prop1_idx` (`integrator_prop_id`),
  CONSTRAINT `fk_integrators_props_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`),
  CONSTRAINT `fk_integrators_props_integrator_prop1` FOREIGN KEY (`integrator_prop_id`) REFERENCES `integrator_prop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrators_props`
--

LOCK TABLES `integrators_props` WRITE;
/*!40000 ALTER TABLE `integrators_props` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrators_props` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lang`
--

DROP TABLE IF EXISTS `lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lang` (
  `id` varchar(2) NOT NULL,
  `locale` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `status` smallint DEFAULT '9',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lang`
--

LOCK TABLES `lang` WRITE;
/*!40000 ALTER TABLE `lang` DISABLE KEYS */;
INSERT INTO `lang` VALUES ('en','en-EN','EN',10),('ru','ru-RU','RU',10);
/*!40000 ALTER TABLE `lang` ENABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1642627422),('m130524_201442_init',1642627423);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `views` int DEFAULT '0',
  `created_at` int DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `image` varchar(255) DEFAULT NULL,
  `post_category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_post_category1_idx` (`post_category_id`),
  CONSTRAINT `fk_post_post_category1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_category`
--

LOCK TABLES `post_category` WRITE;
/*!40000 ALTER TABLE `post_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_category_lang`
--

DROP TABLE IF EXISTS `post_category_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_category_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_category_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_category_lang_post_category1_idx` (`post_category_id`),
  KEY `fk_post_category_lang_lang1_idx` (`lang_id`),
  CONSTRAINT `fk_post_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_post_category_lang_post_category1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_category_lang`
--

LOCK TABLES `post_category_lang` WRITE;
/*!40000 ALTER TABLE `post_category_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_category_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_lang`
--

DROP TABLE IF EXISTS `post_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descr` text,
  PRIMARY KEY (`id`),
  KEY `fk_post_lang_post1_idx` (`post_id`),
  KEY `fk_post_lang_lang1_idx` (`lang_id`),
  CONSTRAINT `fk_post_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_post_lang_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_lang`
--

LOCK TABLES `post_lang` WRITE;
/*!40000 ALTER TABLE `post_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_tag_post1_idx` (`post_id`),
  CONSTRAINT `fk_post_tag_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag_lang`
--

DROP TABLE IF EXISTS `post_tag_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag_lang` (
  `post_tag_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lang_id`),
  KEY `fk_post_tag_lang_post_tag1_idx` (`post_tag_id`),
  CONSTRAINT `fk_post_tag_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_post_tag_lang_post_tag1` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag_lang`
--

LOCK TABLES `post_tag_lang` WRITE;
/*!40000 ALTER TABLE `post_tag_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_tag_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` decimal(10,2) DEFAULT NULL COMMENT 'Рейтинг',
  `install_count` int DEFAULT NULL COMMENT 'Кол-во использований',
  `logo` varchar(100) NOT NULL COMMENT 'Лого продукта|img_crop',
  `rate_average` decimal(10,2) DEFAULT NULL,
  `rate_boon` decimal(10,2) DEFAULT NULL,
  `rate_func` decimal(10,2) DEFAULT NULL,
  `rate_support` decimal(10,2) DEFAULT NULL,
  `rate_price` decimal(10,2) DEFAULT NULL,
  `rate_count` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,NULL,NULL,'_BLYiaSP_2.svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,1),(2,NULL,NULL,'oVJJLLwcEz.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(3,NULL,NULL,'MWev9Ijpld.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `parent_lvl` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `sort` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'4Glbdjpslp.svg',NULL,NULL,10,0),(2,'ltx3XzkMV4.svg',NULL,NULL,10,0),(3,'AmmCvI-dDO.svg',NULL,NULL,9,0),(4,'Zsi-09Q9Nh.svg',NULL,NULL,9,0),(5,'IklnvDDII-.svg',NULL,NULL,9,0),(6,'FM93DSj6o-.svg',NULL,NULL,9,0),(7,'Y5ta0DEJEz.svg',NULL,NULL,9,0),(8,'jABW9B6ZTZ.svg',NULL,NULL,9,0),(9,'KoZfO5Kn7d.svg',NULL,NULL,9,0),(10,'HJhxD2dh1W.svg',NULL,NULL,10,0);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category_lang`
--

DROP TABLE IF EXISTS `product_category_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_category_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category_lang_product_category1_idx` (`product_category_id`),
  KEY `fk_product_category_lang_lang1_idx` (`lang_id`),
  CONSTRAINT `fk_product_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_product_category_lang_product_category1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category_lang`
--

LOCK TABLES `product_category_lang` WRITE;
/*!40000 ALTER TABLE `product_category_lang` DISABLE KEYS */;
INSERT INTO `product_category_lang` VALUES (1,1,'IT Безопасность','ru'),(2,2,'CRM','ru'),(3,3,'BPM','ru'),(4,4,'WMS','ru'),(5,5,'IP Телефония','ru'),(6,6,'СЭД','ru'),(7,7,'ERP','ru'),(8,8,'Офисные приложения','ru'),(9,9,'Онлайн бухгалтерия','ru'),(10,10,'IaaS','ru');
/*!40000 ALTER TABLE `product_category_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_compatibility`
--

DROP TABLE IF EXISTS `product_compatibility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_compatibility` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `comp_product_id` int DEFAULT NULL,
  PRIMARY KEY (`id`,`product_id`),
  KEY `fk_product_compatibility_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_compatibility_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_compatibility`
--

LOCK TABLES `product_compatibility` WRITE;
/*!40000 ALTER TABLE `product_compatibility` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_compatibility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_lang`
--

DROP TABLE IF EXISTS `product_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `short_descr` varchar(255) DEFAULT NULL,
  `descr` text,
  `product_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  PRIMARY KEY (`id`,`product_id`,`lang_id`),
  KEY `fk_product_lang_product1_idx` (`product_id`),
  KEY `fk_product_lang_lang1_idx` (`lang_id`),
  CONSTRAINT `fk_product_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_product_lang_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_lang`
--

LOCK TABLES `product_lang` WRITE;
/*!40000 ALTER TABLE `product_lang` DISABLE KEYS */;
INSERT INTO `product_lang` VALUES (1,'Битрикс24','«Простой бизнес» – идеальный инструмент для организации удалённой работы офиса. Одна программа для управления всей Вашей компанией.','<p>Крупнейший интранет: CRM и соцсеть компании одновременно. Универсальна: можно организовать службу поддержки, автоматизировать все бизнес-процессы или использовать как личный органайзер. Есть полноценная бесплатная версия.</p>',1,'ru'),(2,'amoCRM','Онлайн-система учета клиентов и сделок для отдела продаж, представляющая собой базу данных клиентов, компаний и сделок, в которой собрана вся информация по активным переговорам, текущим контрактам и будущим продажам.','<p>Онлайн-система учета клиентов и сделок для отдела продаж, представляющая собой базу данных клиентов, компаний и сделок, в которой собрана вся информация по активным переговорам, текущим контрактам и будущим продажам.</p><p>Воронку продаж можно выстраивать по количеству сделок или в деньгах, по всему отделу или отдельным менеджерам, по собственным признакам. Система строит прогнозы продаж, основываясь на ранее собранной статистике и текущем положении. С amoCRM можно работать с мобильных устройств, систему можно интегрировать с сайтом и телефоном компании. Продукт распространяется по модели SaaS.</p><br>Владелец - amoCRM,Qsoft<br>Ключевые слова - CRM, SaaS',2,'ru'),(3,'1С:CRM','1С:CRM КОРП 3.0 — аналитическая CRM-система, в которой реализован ряд функций, учитывающих потребности компаний крупного бизнеса: инструменты управления проектами и процессами проходящими в компании; интеграция с корпоративными системами; работа из единог','<p>1С:CRM КОРП 3.0 — аналитическая CRM-система, в которой реализован ряд функций, учитывающих потребности компаний крупного бизнеса: инструменты управления проектами и процессами проходящими в компании; интеграция с корпоративными системами; работа из единого интерфейса и другая функциональность.<br></p><p>Класс программного обеспечения: Системы управления процессами организации, Информационные системы для решения специфических отраслевых задач<br>Добавлен в единого реестра российских программ 6 Сентября 2016 Приказ Минкомсвязи России от 06.09.2016 №426<br>Владелец - российская коммерческая организация ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ \"1С\", Права были переданы из ЗАО \"1С\" в ООО \"1С\" в качестве дополнительного вклада в уставный капитал ООО \"1С\" по Договору об отчуждении исключительного права на программы для ЭВМ от 09 декабря 2010 года.</p>',3,'ru'),(4,'mmm','','',1,'en');
/*!40000 ALTER TABLE `product_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tarif`
--

DROP TABLE IF EXISTS `product_tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tarif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `users_count` varchar(100) DEFAULT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`product_id`),
  KEY `fk_product_tarifs_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_tarifs_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tarif`
--

LOCK TABLES `product_tarif` WRITE;
/*!40000 ALTER TABLE `product_tarif` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_tarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tarif_items`
--

DROP TABLE IF EXISTS `product_tarif_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tarif_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_tarifs_id` int NOT NULL,
  `product_tarifs_product_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`product_tarifs_id`,`product_tarifs_product_id`),
  KEY `fk_product_tarif_items_product_tarifs1_idx` (`product_tarifs_id`,`product_tarifs_product_id`),
  CONSTRAINT `fk_product_tarif_items_product_tarifs1` FOREIGN KEY (`product_tarifs_id`, `product_tarifs_product_id`) REFERENCES `product_tarif` (`id`, `product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tarif_items`
--

LOCK TABLES `product_tarif_items` WRITE;
/*!40000 ALTER TABLE `product_tarif_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_tarif_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tarif_lang`
--

DROP TABLE IF EXISTS `product_tarif_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tarif_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_tarif_id` int NOT NULL,
  `lang_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `price_descr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`product_tarif_id`,`lang_id`),
  KEY `fk_product_tarif_lang_product_tarif1` (`product_tarif_id`),
  CONSTRAINT `fk_product_tarif_lang_product_tarif1` FOREIGN KEY (`product_tarif_id`) REFERENCES `product_tarif` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tarif_lang`
--

LOCK TABLES `product_tarif_lang` WRITE;
/*!40000 ALTER TABLE `product_tarif_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_tarif_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_categories` (
  `product_id` int NOT NULL,
  `product_category_id` int NOT NULL,
  KEY `fk_products_categories_product1_idx` (`product_id`),
  KEY `fk_products_categories_product_category1_idx` (`product_category_id`),
  CONSTRAINT `fk_products_categories_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_products_categories_product_category1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_categories`
--

LOCK TABLES `products_categories` WRITE;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` VALUES (1,9),(1,7),(1,9),(1,10),(1,7),(1,9),(1,10),(1,7),(1,9),(1,10);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_industries`
--

DROP TABLE IF EXISTS `products_industries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_industries` (
  `industry_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`industry_id`,`product_id`),
  KEY `fk_products_industries_product1_idx` (`product_id`),
  CONSTRAINT `fk_products_industries_industry1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`),
  CONSTRAINT `fk_products_industries_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_industries`
--

LOCK TABLES `products_industries` WRITE;
/*!40000 ALTER TABLE `products_industries` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_industries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_props`
--

DROP TABLE IF EXISTS `products_props`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_props` (
  `prop_id` int NOT NULL,
  `product_id` int NOT NULL,
  `prop_type_id` int DEFAULT NULL,
  KEY `fk_products_props_product1_idx` (`product_id`),
  KEY `fk_products_props_prop` (`prop_id`),
  CONSTRAINT `fk_products_props_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_products_props_prop` FOREIGN KEY (`prop_id`) REFERENCES `prop` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_props`
--

LOCK TABLES `products_props` WRITE;
/*!40000 ALTER TABLE `products_props` DISABLE KEYS */;
INSERT INTO `products_props` VALUES (1,2,1),(3,2,2),(9,2,2),(11,2,3),(14,2,4),(6,2,5),(7,2,5),(8,2,5),(16,2,6),(17,2,6),(20,2,6),(21,2,6),(38,2,7),(39,2,7),(40,2,7),(41,2,7),(42,2,7),(43,2,7),(44,2,7),(1,3,1),(11,3,3),(6,3,5),(8,3,5),(16,3,6),(17,3,6),(18,3,6),(38,3,7),(39,3,7),(41,3,7),(45,3,7),(63,1,9),(65,1,9),(66,1,9);
/*!40000 ALTER TABLE `products_props` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_regions`
--

DROP TABLE IF EXISTS `products_regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_regions` (
  `product_id` int NOT NULL,
  `region_id` int NOT NULL,
  PRIMARY KEY (`product_id`,`region_id`),
  KEY `fk_products_countries_country1_idx` (`region_id`),
  CONSTRAINT `fk_products_countries_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  CONSTRAINT `fk_products_countries_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_regions`
--

LOCK TABLES `products_regions` WRITE;
/*!40000 ALTER TABLE `products_regions` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prop`
--

DROP TABLE IF EXISTS `prop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `prop_type_id` int NOT NULL,
  `status` smallint DEFAULT '9',
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prop_prop_type1_idx` (`prop_type_id`),
  CONSTRAINT `fk_prop_prop_type1` FOREIGN KEY (`prop_type_id`) REFERENCES `prop_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop`
--

LOCK TABLES `prop` WRITE;
/*!40000 ALTER TABLE `prop` DISABLE KEYS */;
INSERT INTO `prop` VALUES (1,'sdf',1,10,'kTGbrr6yK4.svg'),(2,'gfhfgh',1,9,'pzMT7sL2AG.svg'),(3,NULL,2,10,'ho0TFzZBWU.svg'),(4,NULL,1,9,'kX21iV2nQk.svg'),(5,NULL,1,10,'clpon7aIeR.svg'),(6,NULL,5,10,'gNYe59kTtR.svg'),(7,NULL,5,10,'BFhpZbRo7h.svg'),(8,NULL,5,10,'lajCSSIoAx.svg'),(9,NULL,2,9,'flOLJmazLr.svg'),(10,NULL,2,10,'NVfWsyh_Ae.svg'),(11,NULL,3,9,'voy2bB80It.svg'),(12,NULL,3,9,'3NRJ1wOm-6.svg'),(13,NULL,3,10,'PjD8xyhIOS.svg'),(14,NULL,4,9,'WgT2QTxWJp.svg'),(15,NULL,4,9,'cRoPQdXP1A.svg'),(16,NULL,6,10,NULL),(17,NULL,6,9,NULL),(18,NULL,6,9,NULL),(19,NULL,6,9,NULL),(20,NULL,6,9,NULL),(21,NULL,6,9,NULL),(22,NULL,6,9,NULL),(23,NULL,6,9,NULL),(24,NULL,6,9,NULL),(25,NULL,6,9,NULL),(26,NULL,6,9,NULL),(27,NULL,6,9,NULL),(28,NULL,6,9,NULL),(29,NULL,6,9,NULL),(30,NULL,6,9,NULL),(31,NULL,6,9,NULL),(32,NULL,6,9,NULL),(33,NULL,6,9,NULL),(34,NULL,6,9,NULL),(35,NULL,6,9,NULL),(36,NULL,6,9,NULL),(37,NULL,6,9,NULL),(38,NULL,7,9,NULL),(39,NULL,7,9,NULL),(40,NULL,7,9,NULL),(41,NULL,7,9,NULL),(42,NULL,7,9,NULL),(43,NULL,7,9,NULL),(44,NULL,7,9,NULL),(45,NULL,7,9,NULL),(46,NULL,7,9,NULL),(47,NULL,7,9,NULL),(48,NULL,7,9,NULL),(49,NULL,7,9,NULL),(50,NULL,7,9,NULL),(51,NULL,7,9,NULL),(52,NULL,7,9,NULL),(53,NULL,7,9,NULL),(54,NULL,7,9,NULL),(55,NULL,7,9,NULL),(56,NULL,7,9,NULL),(57,NULL,7,9,NULL),(58,NULL,7,9,NULL),(59,NULL,7,9,NULL),(60,NULL,7,9,NULL),(61,NULL,7,9,NULL),(62,NULL,7,9,NULL),(63,NULL,9,10,'6pHPiOXOh3.svg'),(64,NULL,10,10,'K67gc3fKHZ.svg'),(65,NULL,9,10,'oJhcdiEH9S.svg'),(66,NULL,9,10,'1aSud6QMDV.svg'),(67,NULL,9,10,'ICcmCZpeIf.svg'),(68,NULL,9,9,'KdNfD788hy.svg'),(69,NULL,1,9,'jxAveRfLBi.svg'),(70,NULL,1,9,'t11uho5Q2X.svg'),(71,NULL,1,9,'1_MAA0k8CB.svg');
/*!40000 ALTER TABLE `prop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prop_lang`
--

DROP TABLE IF EXISTS `prop_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prop_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prop_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL,
  PRIMARY KEY (`id`,`prop_id`),
  KEY `fk_prop_lang_lang1_idx` (`lang_id`),
  KEY `fk_prop_lang_prop1` (`prop_id`),
  CONSTRAINT `fk_prop_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_prop_lang_prop1` FOREIGN KEY (`prop_id`) REFERENCES `prop` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_lang`
--

LOCK TABLES `prop_lang` WRITE;
/*!40000 ALTER TABLE `prop_lang` DISABLE KEYS */;
INSERT INTO `prop_lang` VALUES (1,1,'Веб - приложение','ru'),(2,2,'Windows','ru'),(3,3,'Малый бизнес','ru'),(4,4,'Андройд','ru'),(5,5,'iOS','ru'),(6,6,'Бесплатный период','ru'),(7,7,'Подробный период','ru'),(8,8,'Подписка','ru'),(9,9,'Средний бизнес','ru'),(10,10,'Большой бизнес','ru'),(11,11,'В облаке','ru'),(12,12,'На сервере','ru'),(13,13,'На компьютере','ru'),(14,14,'По подписке','ru'),(15,15,'Разовая оплата','ru'),(16,16,'Воронка продаж','ru'),(17,17,'База клиентов','ru'),(18,18,'Управление заказами','ru'),(19,19,'Продуктовый каталог','ru'),(20,20,'Колл-центр и телефония','ru'),(21,21,'История взаимодействия с клиентом','ru'),(22,22,'Системы лояльности','ru'),(23,23,'Мониторинг эффективности персонала','ru'),(24,24,'Тайм-менеджмент','ru'),(25,25,'Управление поддержкой','ru'),(26,26,'Открытый исходный код','ru'),(27,27,'Отчёты','ru'),(28,28,'Интеграция с почтой','ru'),(29,29,'Email-рассылки','ru'),(30,30,'Шаблоны проектов','ru'),(31,31,'Хранилище файлов','ru'),(32,32,'Диаграмма Ганта','ru'),(33,33,'Биллинг и счета','ru'),(34,34,'Экспорт/импорт данных','ru'),(35,35,'Подключение Фис.регистратора','ru'),(36,36,'API для интеграции','ru'),(37,37,'Веб-формы','ru'),(38,38,'Ритейл','ru'),(39,39,'Интернет-магазин','ru'),(40,40,'Сфера услуг','ru'),(41,41,'Фитнес клубы','ru'),(42,42,'Автосервисы','ru'),(43,43,'Юридические компании','ru'),(44,44,'Агентства','ru'),(45,45,'Турагентство','ru'),(46,46,'Недвижимость','ru'),(47,47,'Агентство недвижимости','ru'),(48,48,'Логистика и транспорт','ru'),(49,49,'Медицина','ru'),(50,50,'IT-технологии','ru'),(51,51,'Клиники','ru'),(52,52,'Врачи','ru'),(53,53,'Склад','ru'),(54,54,'Курьерские службы','ru'),(55,55,'Колл-центр','ru'),(56,56,'Риэлторы','ru'),(57,57,'B2B-компании','ru'),(58,58,'Строительный бизнес','ru'),(59,59,'Полиграфии','ru'),(60,60,'Товарный бизнес','ru'),(61,61,'Франшиза','ru'),(62,62,'Маркетплейсы','ru'),(63,63,'Веб приложение','ru'),(64,64,'prop1','ru'),(65,65,'Приложение','ru'),(66,66,'Андройд','ru'),(67,67,'IOS','ru'),(68,68,'Линукс','ru'),(69,69,'Windows Phone','ru'),(70,70,'Mac','ru'),(71,71,'Linux','ru');
/*!40000 ALTER TABLE `prop_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prop_type`
--

DROP TABLE IF EXISTS `prop_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prop_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_type`
--

LOCK TABLES `prop_type` WRITE;
/*!40000 ALTER TABLE `prop_type` DISABLE KEYS */;
INSERT INTO `prop_type` VALUES (1,'platforms',0),(2,'company_type',0),(3,'deploy',0),(4,'pay_type',0),(5,'product_info',0),(6,'func',0),(7,'apply_in',0),(8,'',0),(9,'platforms',1),(10,'func',7);
/*!40000 ALTER TABLE `prop_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prop_type_lang`
--

DROP TABLE IF EXISTS `prop_type_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prop_type_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prop_type_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  PRIMARY KEY (`id`,`prop_type_id`),
  KEY `fk_prop_type_lang_prop_type1_idx` (`prop_type_id`),
  KEY `fk_prop_type_lang_lang1_idx` (`lang_id`),
  CONSTRAINT `fk_prop_type_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  CONSTRAINT `fk_prop_type_lang_prop_type1` FOREIGN KEY (`prop_type_id`) REFERENCES `prop_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_type_lang`
--

LOCK TABLES `prop_type_lang` WRITE;
/*!40000 ALTER TABLE `prop_type_lang` DISABLE KEYS */;
INSERT INTO `prop_type_lang` VALUES (1,1,'Платформы','ru'),(2,2,'Тип компании','ru'),(3,3,'Развёртывание','ru'),(4,4,'Модель оплаты','ru'),(5,5,'Информация о продукте','ru'),(6,6,'Функционал','ru'),(7,7,'Отрасли применения','ru'),(8,8,'test','ru'),(9,9,'Платформы','ru'),(10,10,'test','ru');
/*!40000 ALTER TABLE `prop_type_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `props_questions`
--

DROP TABLE IF EXISTS `props_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `props_questions` (
  `question_id` int NOT NULL,
  `product_id` int NOT NULL,
  `prop_id` int NOT NULL,
  `step` int DEFAULT NULL,
  PRIMARY KEY (`question_id`,`product_id`,`prop_id`),
  KEY `fk_props_questions_product1_idx` (`product_id`),
  KEY `fk_props_questions_prop1_idx` (`prop_id`),
  CONSTRAINT `fk_props_questions_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_props_questions_prop1` FOREIGN KEY (`prop_id`) REFERENCES `prop` (`id`),
  CONSTRAINT `fk_props_questions_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `props_questions`
--

LOCK TABLES `props_questions` WRITE;
/*!40000 ALTER TABLE `props_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `props_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `step` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `parent_lvl` smallint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,NULL,NULL),(2,NULL,NULL);
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region_lang`
--

DROP TABLE IF EXISTS `region_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region_lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `region_id` int NOT NULL,
  `lang_id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `parent_lvl` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`,`region_id`,`lang_id`),
  KEY `fk_country_lang_country1` (`region_id`),
  CONSTRAINT `fk_country_lang_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_lang`
--

LOCK TABLES `region_lang` WRITE;
/*!40000 ALTER TABLE `region_lang` DISABLE KEYS */;
INSERT INTO `region_lang` VALUES (1,1,0,NULL,NULL,NULL,NULL),(2,1,0,NULL,NULL,NULL,NULL),(3,1,0,NULL,NULL,NULL,NULL),(4,1,0,'sdfsdf',NULL,NULL,NULL),(5,2,0,'mkk',NULL,NULL,NULL);
/*!40000 ALTER TABLE `region_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` int DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `plus` varchar(255) DEFAULT NULL,
  `minus` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `rate_average` decimal(10,2) DEFAULT NULL,
  `rate_boon` decimal(10,2) DEFAULT NULL,
  `rate_func` decimal(10,2) DEFAULT NULL,
  `rate_support` decimal(10,2) DEFAULT NULL,
  `rate_price` decimal(10,2) DEFAULT NULL,
  `user_id` int NOT NULL,
  `status` smallint DEFAULT '9',
  `product_id` int DEFAULT NULL,
  `integrator_id` int DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_review_user1_idx` (`user_id`),
  CONSTRAINT `fk_review_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
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
  `name` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cat` int DEFAULT '1',
  `avatar_image` varchar(255) DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `blocked_at` int DEFAULT NULL,
  `blocked_id` int DEFAULT NULL,
  `login_at` int DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `created_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-08 21:40:07
