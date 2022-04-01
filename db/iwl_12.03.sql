-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: iwl
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
INSERT INTO `lang` VALUES ('ae','ar-AE','AE',10),('en','en-EN','EN',10),('ru','ru-RU','RU',10);
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,NULL,NULL,'_BLYiaSP_2.svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,1),(2,NULL,NULL,'oVJJLLwcEz.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(3,NULL,NULL,'MWev9Ijpld.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(4,NULL,NULL,'hEm3R8qqWz.svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(5,NULL,NULL,'yN5p384yjx.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(6,NULL,NULL,'liA3ZZ1QfI.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(7,NULL,NULL,'3pGIqOq1Zm.jfif',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(8,NULL,NULL,'bnMQXG_yL6.jfif',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(10,NULL,NULL,'Ne_JmoNuWX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(11,NULL,NULL,'zqmSK6bpZz.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(12,NULL,NULL,'peX9rF8Ik0.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(13,NULL,NULL,'l1hhkJItN0.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(14,NULL,NULL,'hT4pzWzoEi.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(15,NULL,NULL,'-A1UB9ALRb.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(16,NULL,NULL,'LI60o5Ezdq.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(17,NULL,NULL,'CgeFpxlBmj.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(18,NULL,NULL,'NSDVAK-KwS.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(19,NULL,NULL,'8QGVPjyRF7.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(20,NULL,NULL,'wDuElBAotK.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(21,NULL,NULL,'VaZz-ilgrX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(22,NULL,NULL,'t86JtmMtxf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(23,NULL,NULL,'fob9JdT3IL.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(24,NULL,NULL,'vX7owuLClu.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(25,NULL,NULL,'LRIvsDsYno.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(26,NULL,NULL,'5tJRvtSQCN.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(27,NULL,NULL,'djLOqX00hX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(28,NULL,NULL,'ykGh3g5Pqu.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(29,NULL,NULL,'3gHiBtkPe9.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(30,NULL,NULL,'pT0IZB69sf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(31,NULL,NULL,'-GJgROOiL7.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(32,NULL,NULL,'Rs7peAkrqj.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(33,NULL,NULL,'L1yHvVWwPf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(34,NULL,NULL,'Bs3t-Wd4Ck.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(35,NULL,NULL,'E8q8uLEgcv.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(36,NULL,NULL,'huenFOyzyS.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(37,NULL,NULL,'tuu87wwSxt.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(38,NULL,NULL,'Q1Jllex1ZE.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(39,NULL,NULL,'KuVJt8uvkd.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(40,NULL,NULL,'OmvbbsUZ3p.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(41,NULL,NULL,'YoOz9KytK-.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_lang`
--

LOCK TABLES `product_lang` WRITE;
/*!40000 ALTER TABLE `product_lang` DISABLE KEYS */;
INSERT INTO `product_lang` VALUES (1,'Битрикс24','«Простой бизнес» – идеальный инструмент для организации удалённой работы офиса. Одна программа для управления всей Вашей компанией.','<p>Крупнейший интранет: CRM и соцсеть компании одновременно. Универсальна: можно организовать службу поддержки, автоматизировать все бизнес-процессы или использовать как личный органайзер. Есть полноценная бесплатная версия.</p>',1,'ru'),(2,'amoCRM','Онлайн-система учета клиентов и сделок для отдела продаж, представляющая собой базу данных клиентов, компаний и сделок, в которой собрана вся информация по активным переговорам, текущим контрактам и будущим продажам.','<p>Онлайн-система учета клиентов и сделок для отдела продаж, представляющая собой базу данных клиентов, компаний и сделок, в которой собрана вся информация по активным переговорам, текущим контрактам и будущим продажам.</p><p>Воронку продаж можно выстраивать по количеству сделок или в деньгах, по всему отделу или отдельным менеджерам, по собственным признакам. Система строит прогнозы продаж, основываясь на ранее собранной статистике и текущем положении. С amoCRM можно работать с мобильных устройств, систему можно интегрировать с сайтом и телефоном компании. Продукт распространяется по модели SaaS.</p><br>Владелец - amoCRM,Qsoft<br>Ключевые слова - CRM, SaaS',2,'ru'),(3,'1С:CRM','1С:CRM КОРП 3.0 — аналитическая CRM-система, в которой реализован ряд функций, учитывающих потребности компаний крупного бизнеса: инструменты управления проектами и процессами проходящими в компании; интеграция с корпоративными системами; работа из единог','<p>1С:CRM КОРП 3.0 — аналитическая CRM-система, в которой реализован ряд функций, учитывающих потребности компаний крупного бизнеса: инструменты управления проектами и процессами проходящими в компании; интеграция с корпоративными системами; работа из единого интерфейса и другая функциональность.<br></p><p>Класс программного обеспечения: Системы управления процессами организации, Информационные системы для решения специфических отраслевых задач<br>Добавлен в единого реестра российских программ 6 Сентября 2016 Приказ Минкомсвязи России от 06.09.2016 №426<br>Владелец - российская коммерческая организация ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ \"1С\", Права были переданы из ЗАО \"1С\" в ООО \"1С\" в качестве дополнительного вклада в уставный капитал ООО \"1С\" по Договору об отчуждении исключительного права на программы для ЭВМ от 09 декабря 2010 года.</p>',3,'ru'),(4,'mmm','','',1,'en'),(5,'MindSales CRM','CRM предлагает комплексное решение, поэтому нет необходимости закупать модули у разных поставщиков ','MindSales CRM – система, которая идеально\r\nподходит для отдела продаж. Позволяет анализировать пользователя на все 100% и строить\r\nпрогноз, аналитика внутри CRM системы позволяет отслеживать как активных пользователей, так и\r\nброшенные корзины, историю заказов. Данная система достаточно гибкая, что бы\r\nадаптироваться именно под определенный бизнес. ',4,'ru'),(6,'Битрикс24','Битрикс24.CRM — это полный набор инструментов для управления продажами','<p>Битрикс24 не оставит шанса упустить клиента, более\r\nтого, система сама проведет клиента по воронке и поможет прийти к лучшему\r\nрезультату. Для наиболее вероятного успеха, система так же располагает искусственным\r\nинтеллектом, который может анализировать данные и предугадывать итог. </p>',5,'ru'),(7,'Zadarma','CRM-система — многофункциональная система управления взаимоотношениями с клиентами.','<p>Облачная CRM от Zadarma поможет автоматизировать все основные процессы без лишних затрат. Система полностью интегрирована с телефонией и АТС Zadarma, подходит бизнесу любого масштаба и главное — полностью бесплатная, вне зависимости от численности вашего штата сотрудников.</p>',6,'ru'),(8,'AmoCRM','Система управления продажами. Инструмент для коммуникации с клиентами','<p>Мы - официальные партнёры AmoCRM - входим в ТОП 3 интеграторов в Алматы, успешно внедрили систему в более чем 85 отделов продаж, и сегодня готовы помочь увеличить прибыль вам.</p>',7,'ru'),(9,'S2','CRM, задачи и проекты, документооборот, финансы, кассы и склад','<p>S2 — это набор бизнес-приложений, собранных в единый комплекс: CRM, трекер задач и проектов, документооборот, учет финансов, склад, кассы, система аналитики, управление кадрами и многое другое. Вы получаете персонализированное решение, которое мы адаптируем под ваши требования и процессы. Ваше видение — наша реализация.</p>',8,'ru'),(11,'Creatio CRM','Единая система CRM Creatio для максимальных результатов в сфере продаж, маркетинга и обслуживания клиентов','<p>CRM система Creatio - это продукт позволяющий добиться автономности сразу по нескольким направлениям: продажи, маркетинг и обслуживание клиентов. Главный показатель Creatio это low-code платформа, она дает возможность полностью адаптировать интерфейс под ваши запросы и автоматизировать процессы, значительно ускоряя гибкость и скорость изменений под растущие объемы. Сложные и трудоемкие задачи можно решить с помощью искусственного интеллекта, который возьмет на себя глубокий анализ и прогнозирование. </p>',10,'ru'),(12,'INTRUM','Гибкая и адаптивная CRM, позволяющая работать с каждый клиентом по четкой схеме, что бы ничего не упустить. ','<p>Intrum это созданная CRM для риелторов и агентств недвижимости, юридических компаний, автомобильных салонов и торговли, которая имеет инструменты для\r\nсоздания своего сайта или удачно интегрируется в уже существующий. Для\r\nповышения конверсии на платформе есть возможность вести учет и контроль\r\nрасходов на рекламу, отслеживание публикаций, настроить получение отчета о прочтении\r\nписьма или презентации. Так же Intrum позволяет создавать отчеты по собственной метрике эффективности, с последующей настройкой вывода отчетов на рабочие столы сотрудников, в зависимости от их задач и должностей.</p>',11,'ru'),(13,'retailCRM','retailCRM позволяет упростить работу и не упустить клиента открывая перед вами единое окно для обработки заказов, консультаций и коммуникаций ','<p>Выбирая retailCRM вероятность упустить\r\nзапрос от клиента сводится к нулю, потому что буквально все запросы, как онлайн,\r\nтак и офлайн стекают в одно окно. Платформа позволяет отслеживать остатки на\r\nскладах, управлять перемещениями, всегда иметь доступы к аналогам товаров. retailCRM\r\nдает возможность управлять курьерской доставкой, добавлять собственных курьеров\r\nи отслеживать статус доставки, мгновенно рассчитывая стоимость. Оплаты так же\r\nподлежат полному контролю, с возможностью частичной оплаты разными этапами, зафиксировав\r\nчеки оплаты в карточках заказов.</p>',12,'ru'),(14,'Мегаплан','Надежная CRM система для командной работы, с автоматизированной рутиной','Мегаплан это надежная система, название которой\r\nговорит само за себя. Помимо стандартного набора полезных инструментов, платформа\r\nидеально подходит для командной работы, от постановки задачи и распределения между\r\nсотрудниками, до учета времени и конечной отчетности. Вся рутина\r\nавтоматизирована, что значительно экономит время и повышает эффективность. ',13,'ru'),(15,'CRM SalesMax','CRM, которая в разы увеличит качество и скорость работы','<p>CRM SalesMax - это система, которая содержит в себе возможно коммуникаций с клиентом, историю общения, отчеты и документооборот. Идеальна для работы в команде, значительно увеличивает скорость и качество работы совместно с интеграцией ЭДО Аналитика. </p>',14,'ru'),(16,'Microsoft Dynamics CRM','CRM, интегрированная со всеми сервисами и приложениями Microsoft','<p>CRM, интегрированная со всеми сервисами и приложениями Microsoft, содержит в себе разделы работы с маркетингом, продажами и поддержки клиентов. Интуитивный интерфейс и надежность компании проверенной временем.  <span></span></p>',15,'ru'),(17,'YCLIENTS','Автоматизированная CRM в сфере услуг с функцией онлайн-записи ','<p>YCLIENTS - автоматизированная система коммуникаций с клиентом, позволяющая вести онлайн запись клиентов и не расходовать их время. Данная система включает в себя лучший опыт лидеров рынка и легкость в использовании.  </p>',16,'ru'),(18,'Клиентикс','Простая в использовании CRM система, созданная специально для любого бизнеса, где нужно вести запись клентов','<p>Программа отвечает всем запросам современного пользователя, в том числе наличием интеграций с различными сервисами. Понятный и удобный Журнал записи, который можно настроить под себя с помощью инженеров внедрения, обширный раздел аналитики, где можно получить большую часть информации, значительно повышающий результативность. </p>',17,'ru'),(19,'Tallanto','CRM-система Tallanto - программное обеспечение для учебных центров, рекламы и маркетинга','<p>Tallanto это обширная платформа для небольших и крупных учебных центров. Интеграция с большим количеством сервисов делает программу оптимизированной и комфортной в пользовании. Отчеты о поступлении и списании финансов, расчет заработной платы, отчеты о поступлении новых учеников, доходы за определенный период и аналитика активности пользователей значительно упростят прогнозирование, заметно повысив показатели. </p>',18,'ru'),(20,'Brizo','Brizo CRM предоставляет финансовый анализ сделок, позволяет планировать и оценивать сделки по прибыли. CRM система плюс управленческий учет','<p>Brizo — это CRM с полноценным управленческим учетом, индикаторы карточки сделки визуально акцентируют ваше внимание на тех карточках, которые требуют вашего внимания именно сейчас. Благодаря тесной интеграции функций CRM c сервисом управленческого учета, вы получаете расширенный функционал для оценки эффективности бизнеса по прибыли, а не по обороту.</p>',19,'ru'),(21,'FrontPad','FrontPad система для оптимизации работы ресторанов, кафе, службы доставки ','<p>Программа для автоматизации службы доставки, розницы, кафе или бара. Удобный интерфейс для создания заказов и ведения складского учета, автоматическая привязка клиента по номеру телефона или скидочной карте. Система автоматического распределения заказов по зонам доставки и курьерам. Возможность создания каталога товаров, сырья и выгрузкой с помощью Excel файла. Автоматические SMS уведомления о статусе заказа для клиента. </p>',20,'ru'),(22,'LP-CRM','CRM-система для продаж физических товаров через одностраничные сайты и интернет-магазины','<p>Весь ваш бизнес в одном окне. Избавьтесь от ежедневной рутины и обрабатывайте заказы в пару кликов. Контролируйте отправки и проводите массовые действия с заказами за считанные секунды. Выставляйте автосмену статусов и в зависимости от статуса ТТН, заказ автоматически перемещается по CRM. Вы всегда будете понимать, на каком этапе находится обработка заказа, допустить ошибку и упустить заказ попросту невозможно.<span class=\"redactor-invisible-space\"> При необходимости посчитать зарплату сотруднику, узнать средний чек клиента или посчитать маржу достаточно нажатия пары кнопок. При построении статистики отображается удобный график, по которому легко ориентироваться. К тому же, статистика считает допродажи и их сумму.<span class=\"redactor-invisible-space\"></span></span></p>',21,'ru'),(23,'HOLLIHOP schoolmaster','CRM для профессионального управления образовательного центра любого типа ','<p>HOLLIHOP schoolmaster – это удобная CRM-система для профессионального управления учебным центром любого типа. Платформа подходит для учебных и образовательных центров, центров подготовки к экзаменам, языковым курсам, учебным и образовательным центрам дополнительных навыков. Осуществлять продажи становится легко, опираясь на расписание, как это удобно учебным центрам. Продажи – это набор в группы. Hollihop вдвое сократит время, которые вы тратил на управление школой, ведение групп и оплаты. Для учеников дополнительно создано мобильное приложение</p>',22,'ru'),(24,'U-ON Travel','U-ON Travel профессиональная CRM для туристических фирм','<p>Профессиональная платформа для туристических\r\nкомпаний, с полным спектром необходимых смс-рассылок, начиная от напоминания обновить\r\nпаспорт до поздравления с днем рождения. Программы лояльности и личный кабинет\r\nтуриста помогут рабочим отношениям выйти на новый уровень доверия. Система\r\nпомогает менеджерам не выполнять однотипные операции и не позволяет забыть\r\nсовершить какое-либо действие, а руководителю - иметь контроль над ошибками\r\nменеджеров. Необходимо настроить процесс лишь раз и больше не переживать за качество работы.</p>',23,'ru'),(25,'Salesforce CRM','Salesforce — CRM-платформа, которая помогает автоматизировать и упростить выполнение задач по продаже, обслуживанию, маркетингу, анализу и связям с клиентами','<p>Автоматизация процесса продаж помогает ускорить рутинные операции, определить нерентабельные каналы и снизить затраты на привлечение клиентов.CRM-система помогает отслеживать показатели эффективности работы менеджеров отдела продаж, например, сумма контрактов, количество сделок, качество контактов с клиентами.<span class=\"redactor-invisible-space\"></span></p>',24,'ru'),(26,'FreshOffice','CRM FreshOffice поможет собрать детальную информацию, эффективно управлять продажами и контролировать работу каждого сотрудника, фокусируясь на самом важном','<p>FreshOffice дает очень широкие возможности управления компанией, а так же для ее продвижения. Рекламные компании можно запускать сразу после регистрации, разные рекламные объявления для каждой аудитории, в зависимости от типа компании в базе данных CRM, стадии сделки, статуса документа, проекта или даже задачи. </p>',25,'ru'),(27,'ELMA365 CRM','ELMA365 отлично подходит для организации процессов продаж. Стандартный для CRM механизм  воронок продаж дополнен бизнес-процессами продаж, что дает большую прогнозируемость  действий и надежный механизм связи отдела продаж с другими департаментами компани','<p>ELMA365 CRM которая идеально подходит для выстраивания длительных, а далее наиболее доверительных отношений с клиентом. Процессы ведут менеджера по всем этапам воронки, гарантируя своевременное выполнение каждого шага: от первого контакта до получения оплаты и закрывающих документов. Конструктор бизнес-процессов позволяет быстро настроить и отредактировать цепочку действий для каждого процесса продаж. Для быстрой реакции на возникновение узких мест система отслеживает движение сделок и в любой момент может показать динамику продаж за выбранный период.</p>',26,'ru'),(28,'Pipedrive','Pipedrive CRM система, которая показывает что оптимизировать рабочий процесс внутри организации – реально и доступно, особенно в digital-маркетинге','<p>Система для управления продажами малого и среднего бизнеса. Можно планировать и отслеживать сделки, управлять воронками продаж, анализировать заказы. Pipedrive легко настроить под свой бизнес, добавляя и убирая модули в окне. Инструмент, который создан не только для управления продажами, но и для маркетологов, имеющих важное значение в развитии компании. Современный диджитал невозможен без аналитики, а CRM-системы дают возможность анализировать каждый шаг в работе, плюс интегрировать работу – с сайтом и телефонией. </p>',27,'ru'),(29,'Zoho CRM','Автоматизируйте ежедневные бизнес-задачи и сконцентрируйтесь на развитии предварительных контактов, заключении сделок и увеличении прибыли.','<p>Zoho CRM — это многофункциональная система, которая даёт управление в продажах, маркетинге, поддержке клиентов. Благодаря учетной записи Zoho CRM вы получаете доступ к целому набору продуктов и служб Zoho - от онлайн-хранилища данных и средства проведения веб-конференций до других бизнес-продуктов, включая приложения для управления проектами, проведения маркетинговых кампаний по электронной почте и многих других. </p>',28,'ru'),(30,'StreamCRM ','StreamCRM это свыше 100 готовых решений оптимизирования работы сотрудников и повышения показателей','<p>Основная цель StreamCRM заставить работать слажено большой механизм компании, в который входит маркетинговый отдел, своевременная отчетность, этапы продаж и построений взаимоотношений с клиентами. Используя StreamCRM вы оптимизируете ряд процессов, которые значительно повысят ваши показатели: индивидуальные карточки клиентов, поддающиеся редактированию, автообзвон с проигрыванием записей голосовых сообщений для клиентов, но главный приоритет StreamCRM заключается в телефонии, широчайший функционал ответит любому запросу в области IP телефонии. Вся программа построена так, чтобы вы могли снизить нагрузку менеджеров, каждый день улучшая клиентский опыт. </p>',29,'ru'),(31,'Альфа CRM','Альфа CRM - простой интерфейс программы предоставляет обширные возможности в сфере образования','<p>Альфа CRM – создана с целью облегчить работу в области предоставления знаний и новых навыков. Систему можно использовать для онлайн школ и преподавания физически. Весь функционал адаптирован под специфику в сфере обучения, не теряя легкость и удобность интерфейса. Программа предоставляет полное сопровождение клиента, в том числе заметки в журнале посещаемости. Система так же позволит вам рассчитывать стоимость занятий и просматривать остаток на балансе учащегося, Альфа CRM так же может учитывать скидки и бонусные системы. Эта программа значительно облегчит рутинные задачи и менеджерам, и преподавателям, и руководителям частных школ, образовательных центров, спортивных секций и музыкальных школ. </p>',30,'ru'),(32,'ListOk','ListOk - CRM система с большим опытом в сфере фитнес индустрии ','<p>ListOk – CRM система с многолетним опытом по оптимизации работы в сфере фитнес индустрии, предоставляет возможность проводить занятия дома, через онлайн-трансляцию в приложении, иметь удобное приложение для пользователей, отслеживать посещения в журнале и срок абонемента</p>',31,'ru'),(33,'WireCRM','​WireCRM - гибкий конструктор, с возможностью добавления необходимых модулей, расширяя функционал ','<p>WireCRM – это буквально конструктор CRM, в который можно внедрить более 100 модулей и соответственно, создать систему которая будет подходить именно специфике вашей компании. Основное направление программы – продажи и работа с клиентами. Настолько широкий спектр функций позволяет выбрать несколько самых нужных и использовать только их</p>',32,'ru'),(34,'Hubspot CRM','Hubspot CRM - автоматизирует все рутинные задачи и обладает своей маркетинговой площадкой','<p>HubSpot (NYSE: HUBS) - это передовая платформа управления взаимоотношениями с клиентами (CRM), которая включает современное программное обеспечение и поддержку, помогает компаниям развивать бизнес, быть успешными и эффективными.Платформа включает в себя продукты для маркетинга, продаж, обслуживания и управления веб-сайтами, которые масштабируются для удовлетворения потребностей клиентов на любой стадии роста.</p>',33,'ru'),(35,'Smarty CRM','Smarty CRM—это инструмент общения команд, которые понимают, что работа требует большего, чем следить за сообщениями в групповом чате.','<p>Создавайте напоминания и задачи, не выходя из чата. Добавляйте в избранное важные сообщения и диалоги. Загружайте документы, картинки, файлы и всё, что необходимо для продуктивного взаимодействия. Больше нет необходимости использовать сторонние приложения для общения. Пригласите своих сотрудников. Обсуждайте проблемы. Делитесь идеями. Получайте обратную связь. Подробно обсуждайте вопросы, которые по-настоящему двигают дело вперед.<span class=\"redactor-invisible-space\"></span></p>',34,'ru'),(36,'CLOFF CRM','CLOFF CRM — это система управления взаимоотношениями с клиентами. Ее главная задача — сокращение производственных затрат при одновременном увеличении дохода компании и повышении лояльности целевых потребителей.','<p>Облачные сервисы для бизнеса CLOFF закрывают все ИТ-потребности предприятий разного профиля и не требуют больших финансовых затрат.</p><p>Облачное рабочее место полностью готово к использованию, его функционал позволяет эффективно работать из любой точки мира и всегда оставаться на связи с клиентами.</p><p>Подключение, настройка и техническое сопровождение облачных решений для малого бизнеса — забота нашей компании. <br><br>Доступны с любого устройства. Главное условие — интернет-связь. Вся необходимая информация у вас под рукой, когда вы в офисе, дома, в командировке, в отпуске.</p>',35,'ru'),(37,'JokerCRM','Функциональная CRM система для агентства недвижимости с готовым сайтом, специально разработанные в сотрудничестве со специалистами сферы недвижимости.','<p>Вам будет доступна широкая возможность настройки CRM системы под свои задачи. Подключаемые модули и множество интеграций реализуют все потребности в работе всего агентства недвижимости и каждого сотрудника. CRM система содержит множество интеграций: телефония, мессенджеры и социальные сети, квизы и онлайн-консультанты, электронная почта и конструкторы сайтов. Также реализован собственный API с широкой функциональностью. Подключайте необходимые модули самостоятельно. CRM система уже настроена на автоматическое обновление, поэтому все новые модули будут доступны в вашей CRM системе - вам останется только их активировать.<span class=\"redactor-invisible-space\"></span></p>',36,'ru'),(38,'HomeCRM','HomeCRM - мультилистинговая CRM-система для автоматизации бизнеса риэлторского агентства.','<p>В CRM реализован весь функционал, который потребуется для успешной работы: от поиска клиента до заключения сделки. Интуитивно понятный интерфейс поможет за считанные минуты выполнить действия, которые без CRM заняли бы достаточно много времени. Составляйте оперативные подборки недвижимости в зависимости от пожеланий клиента прямо на карте! Найдите необходимый район, оцените инфраструктуру (на карте для удобства выведены аптеки, школы, больницы, детские сады, магазины и др.), нажмите на значок объекта и тут же посмотрите фотографии объекта вместе с краткой информацией по объекту.</p>',37,'ru'),(39,'Vtiger CRM','CRM-система Vtiger all-in-one дает вам возможность согласовать ваши команды маркетинга, продаж и поддержки с едиными данными о клиентах на базе One View.','<p>Фрагментированные данные о клиентах приводят к потерянным сделкам и оттоку клиентов. Это не ваша команда, это разрозненные инструменты, которые они используют. Vtiger объединяет все ваши команды на одной странице на каждом этапе пути к покупке. Управляйте маркетинговой деятельностью по всем каналам, чтобы привлекать идеальных клиентов. С One View вы согласовываете маркетинг и продажи с учетом общего взгляда на клиента. Увеличьте рентабельность инвестиций в свои кампании по привлечению потенциальных клиентов. Используйте мощные возможности социального и электронного маркетинга для привлечения потенциальных клиентов.</p>',38,'ru'),(40,'Контур.CRM','Главная цель Контур.CRM - автоматизация и контроль продаж. Интуитивно понятная CRM-система для отделов продаж.','<p>Контур.CRM — это технологичный инструмент для работы с продажами. В отличие от некоторых других CRM, сервис работает сразу после внедрения. Назначайте задачи, отслеживайте выполнение плана, анализируйте конверсию, прослушивайте звонки и ведите базы. Благодаря простому интерфейсу работать в системе сможет каждый сотрудник. Заказы со всех источников попадают в единый список и автоматически распределяются между менеджерами. Лиды не потеряются.<span class=\"redactor-invisible-space\"> CRM создает сделки при входящем вызове, назначает перезвон после пропущенного звонка и напоминает менеджерам о ближайших задачах.<span class=\"redactor-invisible-space\"></span></span></p>',39,'ru'),(41,'OTC-CRM ','OTC-CRM - не просто способ связи с клиентами, а полный набор инструментов, которые автоматизируют поиск клиентов и контроль над сроками, приводят в порядок тендерные продажи и повышают шансы на победу в тендерах.','<p>OTC-CRM подберет тендеры исходя из ваших настроек и истории продаж, сообщит обо всех этапах выбранных вами тендеров. OTC-CRM содержит полную базу заказчиков, осуществляющих закупки в соответствии законами. Вся контактная информация заказчиков в вашем распоряжении. Заказчики составляют планы закупок на год и размещают их Единой информационной системе. Эта информация доступна всем, но за ней трудно уследить. OTC-CRM будет уведомлять вас о тендерах в вашей отрасли.<span class=\"redactor-invisible-space\"></span></p>',40,'ru'),(42,'EnvyCRM','EnvyCRM - система созданная на основе многолетнего опыта, с учетом всех проб и ошибок. ','<p>EnvyCRM - помимо основных функций CRM системы, обладает рядом деталей, которые значительно упрощают работу. Например, больше не нужно гуглить часовой пояс клиента, если он находится в другой стране. Задачи выставляются теперь автоматически, в том числе на каждый час и по каждому клиенту. С помощью управления процессом продаж кнопками ваш менеджер тратит меньше времени на рутиные операции и успевает сделать больше продаж и денег.<span class=\"redactor-invisible-space\"></span></p>',41,'ru');
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
INSERT INTO `products_props` VALUES (1,2,1),(3,2,2),(9,2,2),(11,2,3),(14,2,4),(6,2,5),(7,2,5),(8,2,5),(16,2,6),(17,2,6),(20,2,6),(21,2,6),(38,2,7),(39,2,7),(40,2,7),(41,2,7),(42,2,7),(43,2,7),(44,2,7),(1,3,1),(11,3,3),(6,3,5),(8,3,5),(16,3,6),(17,3,6),(18,3,6),(38,3,7),(39,3,7),(41,3,7),(45,3,7),(63,1,9),(65,1,9),(66,1,9),(244,12,39),(251,12,40),(252,12,40),(254,12,41),(255,12,41),(257,12,42),(258,12,42),(259,12,43),(260,12,43),(261,12,43),(262,12,44),(263,12,44),(264,12,44),(265,12,44),(266,12,44),(267,12,44),(268,12,44),(269,12,44),(273,12,44),(274,12,44),(275,12,44),(277,12,44),(279,12,44),(280,12,44),(282,12,44),(283,12,44),(284,12,45),(285,12,45),(303,12,45),(306,12,45),(308,12,45),(244,11,39),(246,11,39),(247,11,39),(251,11,40),(252,11,40),(253,11,40),(254,11,41),(257,11,42),(260,11,43),(261,11,43),(262,11,44),(263,11,44),(264,11,44),(265,11,44),(266,11,44),(267,11,44),(269,11,44),(270,11,44),(271,11,44),(273,11,44),(274,11,44),(275,11,44),(276,11,44),(277,11,44),(279,11,44),(280,11,44),(282,11,44),(283,11,44),(284,11,45),(285,11,45),(288,11,45),(289,11,45),(290,11,45),(292,11,45),(293,11,45),(301,11,45),(302,11,45),(303,11,45),(305,11,45),(244,10,39),(245,10,39),(246,10,39),(247,10,39),(249,10,39),(251,10,40),(252,10,40),(253,10,40),(254,10,41),(255,10,41),(257,10,42),(260,10,43),(261,10,43),(262,10,44),(263,10,44),(264,10,44),(265,10,44),(266,10,44),(267,10,44),(268,10,44),(269,10,44),(270,10,44),(273,10,44),(274,10,44),(277,10,44),(278,10,44),(279,10,44),(280,10,44),(282,10,44),(283,10,44),(284,10,45),(285,10,45),(286,10,45),(289,10,45),(290,10,45),(291,10,45),(292,10,45),(293,10,45),(294,10,45),(295,10,45),(296,10,45),(297,10,45),(298,10,45),(299,10,45),(300,10,45),(301,10,45),(302,10,45),(303,10,45),(304,10,45),(307,10,45),(310,10,45),(313,10,45),(244,13,39),(245,13,39),(246,13,39),(247,13,39),(248,13,39),(251,13,40),(252,13,40),(253,13,40),(254,13,41),(255,13,41),(257,13,42),(259,13,43),(260,13,43),(261,13,43),(262,13,44),(263,13,44),(264,13,44),(265,13,44),(266,13,44),(267,13,44),(269,13,44),(270,13,44),(271,13,44),(273,13,44),(274,13,44),(275,13,44),(276,13,44),(277,13,44),(278,13,44),(279,13,44),(280,13,44),(282,13,44),(283,13,44),(284,13,45),(285,13,45),(286,13,45),(287,13,45),(288,13,45),(289,13,45),(290,13,45),(291,13,45),(292,13,45),(293,13,45),(294,13,45),(295,13,45),(296,13,45),(297,13,45),(303,13,45),(304,13,45),(305,13,45),(307,13,45),(308,13,45),(310,13,45),(313,13,45),(244,8,39),(246,8,39),(251,8,40),(252,8,40),(254,8,41),(255,8,41),(256,8,41),(257,8,42),(259,8,43),(260,8,43),(261,8,43),(262,8,44),(263,8,44),(264,8,44),(265,8,44),(266,8,44),(267,8,44),(269,8,44),(270,8,44),(271,8,44),(273,8,44),(274,8,44),(275,8,44),(276,8,44),(277,8,44),(279,8,44),(280,8,44),(281,8,44),(282,8,44),(283,8,44),(285,8,45),(286,8,45),(287,8,45),(288,8,45),(289,8,45),(290,8,45),(292,8,45),(293,8,45),(294,8,45),(296,8,45),(297,8,45),(298,8,45),(303,8,45),(304,8,45),(310,8,45),(312,8,45),(313,8,45),(244,7,39),(246,7,39),(247,7,39),(251,7,40),(252,7,40),(254,7,41),(257,7,42),(260,7,43),(261,7,43),(262,7,44),(263,7,44),(264,7,44),(266,7,44),(267,7,44),(273,7,44),(274,7,44),(275,7,44),(277,7,44),(280,7,44),(282,7,44),(283,7,44),(285,7,45),(286,7,45),(290,7,45),(303,7,45),(307,7,45),(308,7,45),(312,7,45),(313,7,45),(316,7,45),(319,7,45),(244,6,39),(246,6,39),(247,6,39),(251,6,40),(252,6,40),(254,6,41),(257,6,42),(259,6,43),(261,6,43),(312,6,45),(244,4,39),(246,4,39),(247,4,39),(251,4,40),(254,4,41),(257,4,42),(258,4,42),(261,4,43),(262,4,44),(263,4,44),(264,4,44),(266,4,44),(267,4,44),(273,4,44),(282,4,44),(284,4,45),(285,4,45),(287,4,45),(291,4,45),(297,4,45),(298,4,45),(301,4,45),(302,4,45),(304,4,45),(306,4,45),(313,4,45),(317,4,45),(318,4,45),(244,5,39),(245,5,39),(246,5,39),(247,5,39),(251,5,40),(252,5,40),(253,5,40),(254,5,41),(255,5,41),(257,5,42),(258,5,42),(259,5,43),(260,5,43),(261,5,43),(262,5,44),(263,5,44),(264,5,44),(265,5,44),(266,5,44),(267,5,44),(269,5,44),(270,5,44),(271,5,44),(273,5,44),(274,5,44),(275,5,44),(276,5,44),(277,5,44),(278,5,44),(279,5,44),(280,5,44),(282,5,44),(283,5,44),(284,5,45),(285,5,45),(286,5,45),(290,5,45),(296,5,45),(303,5,45),(304,5,45),(305,5,45),(306,5,45),(307,5,45),(308,5,45),(310,5,45),(311,5,45),(313,5,45),(318,5,45),(319,5,45),(244,14,39),(245,14,39),(246,14,39),(247,14,39),(249,14,39),(250,14,39),(251,14,40),(252,14,40),(254,14,41),(255,14,41),(256,14,41),(257,14,42),(260,14,43),(261,14,43),(262,14,44),(263,14,44),(264,14,44),(265,14,44),(266,14,44),(267,14,44),(269,14,44),(270,14,44),(273,14,44),(274,14,44),(275,14,44),(277,14,44),(278,14,44),(279,14,44),(280,14,44),(282,14,44),(285,14,45),(290,14,45),(303,14,45),(318,14,45),(244,15,39),(251,15,40),(252,15,40),(255,15,41),(257,15,42),(259,15,43),(260,15,43),(261,15,43),(262,15,44),(263,15,44),(264,15,44),(265,15,44),(273,15,44),(274,15,44),(277,15,44),(278,15,44),(279,15,44),(280,15,44),(282,15,44),(283,15,44),(305,15,45),(311,15,45),(244,16,39),(246,16,39),(247,16,39),(251,16,40),(252,16,40),(254,16,41),(257,16,42),(260,16,43),(261,16,43),(262,16,44),(263,16,44),(264,16,44),(265,16,44),(266,16,44),(267,16,44),(268,16,44),(269,16,44),(270,16,44),(273,16,44),(275,16,44),(277,16,44),(280,16,44),(281,16,44),(282,16,44),(283,16,44),(286,16,45),(287,16,45),(288,16,45),(289,16,45),(295,16,45),(297,16,45),(319,16,45),(321,16,45),(244,17,39),(246,17,39),(247,17,39),(251,17,40),(252,17,40),(253,17,40),(254,17,41),(257,17,42),(260,17,43),(261,17,43),(263,17,44),(264,17,44),(265,17,44),(266,17,44),(267,17,44),(268,17,44),(269,17,44),(270,17,44),(271,17,44),(273,17,44),(274,17,44),(275,17,44),(276,17,44),(277,17,44),(279,17,44),(280,17,44),(281,17,44),(282,17,44),(283,17,44),(286,17,45),(287,17,45),(288,17,45),(295,17,45),(297,17,45),(298,17,45),(327,17,45),(328,17,45),(244,18,39),(246,18,39),(247,18,39),(251,18,40),(252,18,40),(254,18,41),(257,18,42),(259,18,43),(260,18,43),(261,18,43),(262,18,44),(263,18,44),(264,18,44),(266,18,44),(267,18,44),(269,18,44),(270,18,44),(271,18,44),(273,18,44),(274,18,44),(275,18,44),(276,18,44),(277,18,44),(279,18,44),(280,18,44),(281,18,44),(283,18,44),(286,18,45),(287,18,45),(319,18,45),(322,18,45),(244,19,39),(245,19,39),(246,19,39),(247,19,39),(249,19,39),(250,19,39),(251,19,40),(252,19,40),(254,19,41),(257,19,42),(260,19,43),(261,19,43),(262,19,44),(263,19,44),(264,19,44),(266,19,44),(267,19,44),(268,19,44),(269,19,44),(270,19,44),(271,19,44),(273,19,44),(274,19,44),(277,19,44),(278,19,44),(279,19,44),(280,19,44),(282,19,44),(283,19,44),(284,19,45),(286,19,45),(290,19,45),(296,19,45),(303,19,45),(311,19,45),(326,19,45),(244,20,39),(246,20,39),(251,20,40),(252,20,40),(254,20,41),(260,20,43),(261,20,43),(263,20,44),(264,20,44),(265,20,44),(266,20,44),(267,20,44),(268,20,44),(269,20,44),(270,20,44),(271,20,44),(273,20,44),(274,20,44),(275,20,44),(279,20,44),(280,20,44),(281,20,44),(282,20,44),(283,20,44),(284,20,45),(285,20,45),(286,20,45),(300,20,45),(330,20,45),(331,20,45),(244,21,39),(251,21,40),(252,21,40),(253,21,40),(254,21,41),(256,21,41),(260,21,43),(261,21,43),(263,21,44),(264,21,44),(265,21,44),(266,21,44),(267,21,44),(269,21,44),(270,21,44),(271,21,44),(273,21,44),(274,21,44),(280,21,44),(282,21,44),(283,21,44),(284,21,45),(285,21,45),(306,21,45),(244,22,39),(246,22,39),(247,22,39),(251,22,40),(252,22,40),(253,22,40),(254,22,41),(255,22,41),(257,22,42),(260,22,43),(261,22,43),(262,22,44),(263,22,44),(264,22,44),(265,22,44),(266,22,44),(267,22,44),(268,22,44),(269,22,44),(270,22,44),(271,22,44),(273,22,44),(274,22,44),(275,22,44),(276,22,44),(277,22,44),(279,22,44),(280,22,44),(281,22,44),(282,22,44),(283,22,44),(322,22,45),(244,23,39),(246,23,39),(247,23,39),(251,23,40),(252,23,40),(253,23,40),(254,23,41),(257,23,42),(259,23,43),(260,23,43),(261,23,43),(262,23,44),(263,23,44),(264,23,44),(265,23,44),(266,23,44),(267,23,44),(268,23,44),(269,23,44),(270,23,44),(271,23,44),(273,23,44),(274,23,44),(275,23,44),(276,23,44),(277,23,44),(279,23,44),(280,23,44),(281,23,44),(282,23,44),(283,23,44),(286,23,45),(291,23,45),(244,24,39),(246,24,39),(247,24,39),(251,24,40),(252,24,40),(254,24,41),(255,24,41),(257,24,42),(260,24,43),(261,24,43),(263,24,44),(264,24,44),(273,24,44),(274,24,44),(276,24,44),(277,24,44),(278,24,44),(279,24,44),(280,24,44),(282,24,44),(283,24,44),(311,24,45),(321,24,45),(244,25,39),(245,25,39),(246,25,39),(247,25,39),(249,25,39),(254,25,41),(255,25,41),(257,25,42),(259,25,43),(260,25,43),(261,25,43),(262,25,44),(263,25,44),(264,25,44),(265,25,44),(266,25,44),(267,25,44),(268,25,44),(269,25,44),(273,25,44),(274,25,44),(275,25,44),(276,25,44),(277,25,44),(279,25,44),(280,25,44),(282,25,44),(283,25,44),(244,26,39),(245,26,39),(246,26,39),(247,26,39),(251,26,40),(252,26,40),(253,26,40),(254,26,41),(255,26,41),(256,26,41),(258,26,42),(260,26,43),(261,26,43),(262,26,44),(263,26,44),(264,26,44),(265,26,44),(266,26,44),(267,26,44),(268,26,44),(269,26,44),(270,26,44),(271,26,44),(273,26,44),(274,26,44),(276,26,44),(277,26,44),(279,26,44),(280,26,44),(282,26,44),(283,26,44),(286,26,45),(288,26,45),(303,26,45),(312,26,45),(244,27,39),(246,27,39),(247,27,39),(251,27,40),(252,27,40),(254,27,41),(257,27,42),(260,27,43),(261,27,43),(262,27,44),(263,27,44),(264,27,44),(267,27,44),(273,27,44),(274,27,44),(275,27,44),(276,27,44),(277,27,44),(279,27,44),(280,27,44),(282,27,44),(283,27,44),(290,27,45),(305,27,45),(312,27,45),(314,27,45),(319,27,45),(321,27,45),(244,28,39),(245,28,39),(246,28,39),(247,28,39),(249,28,39),(250,28,39),(251,28,40),(252,28,40),(253,28,40),(254,28,41),(257,28,42),(259,28,43),(260,28,43),(261,28,43),(263,28,44),(265,28,44),(266,28,44),(267,28,44),(269,28,44),(271,28,44),(273,28,44),(274,28,44),(275,28,44),(276,28,44),(277,28,44),(280,28,44),(282,28,44),(283,28,44),(284,28,45),(296,28,45),(303,28,45),(308,28,45),(311,28,45),(321,28,45),(323,28,45),(244,30,39),(251,30,40),(252,30,40),(253,30,40),(254,30,41),(257,30,42),(260,30,43),(261,30,43),(262,30,44),(263,30,44),(264,30,44),(265,30,44),(266,30,44),(267,30,44),(268,30,44),(269,30,44),(270,30,44),(271,30,44),(273,30,44),(274,30,44),(275,30,44),(276,30,44),(277,30,44),(278,30,44),(279,30,44),(280,30,44),(281,30,44),(282,30,44),(283,30,44),(286,30,45),(319,30,45),(322,30,45),(244,31,39),(245,31,39),(246,31,39),(247,31,39),(248,31,39),(249,31,39),(250,31,39),(251,31,40),(252,31,40),(254,31,41),(257,31,42),(260,31,43),(261,31,43),(262,31,44),(263,31,44),(264,31,44),(265,31,44),(266,31,44),(267,31,44),(271,31,44),(273,31,44),(275,31,44),(276,31,44),(277,31,44),(280,31,44),(281,31,44),(282,31,44),(283,31,44),(287,31,45),(319,31,45),(322,31,45),(332,31,45),(333,31,45),(334,31,45),(244,29,39),(251,29,40),(252,29,40),(253,29,40),(254,29,41),(257,29,42),(258,29,42),(260,29,43),(261,29,43),(262,29,44),(263,29,44),(266,29,44),(267,29,44),(269,29,44),(273,29,44),(274,29,44),(275,29,44),(279,29,44),(280,29,44),(283,29,44),(285,29,45),(286,29,45),(301,29,45),(308,29,45),(322,29,45),(244,32,39),(246,32,39),(247,32,39),(251,32,40),(252,32,40),(253,32,40),(254,32,41),(257,32,42),(260,32,43),(261,32,43),(262,32,44),(263,32,44),(264,32,44),(265,32,44),(266,32,44),(267,32,44),(268,32,44),(269,32,44),(270,32,44),(271,32,44),(273,32,44),(274,32,44),(275,32,44),(276,32,44),(277,32,44),(278,32,44),(279,32,44),(280,32,44),(282,32,44),(283,32,44),(284,32,45),(286,32,45),(288,32,45),(303,32,45),(304,32,45),(306,32,45),(308,32,45),(312,32,45),(313,32,45),(314,32,45),(316,32,45),(317,32,45),(319,32,45),(321,32,45),(326,32,45),(328,32,45),(244,33,39),(251,33,40),(254,33,41),(257,33,42),(259,33,43),(260,33,43),(261,33,43),(263,33,44),(264,33,44),(266,33,44),(267,33,44),(268,33,44),(270,33,44),(273,33,44),(275,33,44),(277,33,44),(280,33,44),(283,33,44),(284,33,45),(294,33,45),(312,33,45),(320,33,45),(322,33,45),(325,33,45),(244,34,39),(245,34,39),(246,34,39),(247,34,39),(251,34,40),(252,34,40),(254,34,41),(257,34,42),(259,34,43),(260,34,43),(261,34,43),(303,34,45),(312,34,45),(314,34,45),(244,35,39),(246,35,39),(251,35,40),(252,35,40),(254,35,41),(257,35,42),(260,35,43),(261,35,43),(263,35,44),(264,35,44),(265,35,44),(266,35,44),(267,35,44),(269,35,44),(273,35,44),(274,35,44),(275,35,44),(276,35,44),(277,35,44),(279,35,44),(280,35,44),(282,35,44),(283,35,44),(284,35,45),(285,35,45),(287,35,45),(293,35,45),(300,35,45),(310,35,45),(312,35,45),(320,35,45),(323,35,45),(325,35,45),(327,35,45),(244,36,39),(251,36,40),(253,36,40),(254,36,41),(255,36,41),(257,36,42),(261,36,43),(262,36,44),(263,36,44),(264,36,44),(265,36,44),(266,36,44),(267,36,44),(268,36,44),(269,36,44),(270,36,44),(271,36,44),(273,36,44),(274,36,44),(275,36,44),(276,36,44),(277,36,44),(278,36,44),(279,36,44),(280,36,44),(282,36,44),(283,36,44),(290,36,45),(292,36,45),(293,36,45),(244,37,39),(245,37,39),(246,37,39),(247,37,39),(248,37,39),(249,37,39),(250,37,39),(251,37,40),(252,37,40),(253,37,40),(254,37,41),(257,37,42),(260,37,43),(261,37,43),(263,37,44),(265,37,44),(266,37,44),(267,37,44),(268,37,44),(269,37,44),(270,37,44),(271,37,44),(273,37,44),(274,37,44),(276,37,44),(277,37,44),(279,37,44),(280,37,44),(282,37,44),(283,37,44),(286,37,45),(290,37,45),(292,37,45),(293,37,45),(302,37,45),(244,38,39),(246,38,39),(247,38,39),(251,38,40),(252,38,40),(254,38,41),(255,38,41),(257,38,42),(259,38,43),(260,38,43),(261,38,43),(263,38,44),(264,38,44),(265,38,44),(267,38,44),(270,38,44),(273,38,44),(274,38,44),(275,38,44),(276,38,44),(277,38,44),(279,38,44),(280,38,44),(282,38,44),(283,38,44),(284,38,45),(285,38,45),(292,38,45),(312,38,45),(321,38,45),(244,39,39),(251,39,40),(254,39,41),(257,39,42),(260,39,43),(261,39,43),(262,39,44),(263,39,44),(264,39,44),(265,39,44),(271,39,44),(273,39,44),(274,39,44),(275,39,44),(276,39,44),(277,39,44),(279,39,44),(280,39,44),(282,39,44),(283,39,44),(284,39,45),(285,39,45),(286,39,45),(304,39,45),(338,39,45),(244,40,39),(251,40,40),(252,40,40),(253,40,40),(254,40,41),(257,40,42),(260,40,43),(261,40,43),(264,40,44),(267,40,44),(269,40,44),(271,40,44),(273,40,44),(274,40,44),(276,40,44),(279,40,44),(280,40,44),(282,40,44),(283,40,44),(284,40,45),(338,40,45),(339,40,45),(340,40,45),(244,41,39),(246,41,39),(247,41,39),(251,41,40),(252,41,40),(254,41,41),(257,41,42),(260,41,43),(261,41,43),(262,41,44),(263,41,44),(264,41,44),(267,41,44),(269,41,44),(270,41,44),(271,41,44),(273,41,44),(274,41,44),(276,41,44),(277,41,44),(279,41,44),(280,41,44),(282,41,44),(283,41,44),(284,41,45),(285,41,45),(312,41,45);
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
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop`
--

LOCK TABLES `prop` WRITE;
/*!40000 ALTER TABLE `prop` DISABLE KEYS */;
INSERT INTO `prop` VALUES (1,'sdf',1,10,'kTGbrr6yK4.svg'),(2,'gfhfgh',1,9,'pzMT7sL2AG.svg'),(3,NULL,2,10,'ho0TFzZBWU.svg'),(4,NULL,1,9,'kX21iV2nQk.svg'),(5,NULL,1,10,'clpon7aIeR.svg'),(6,NULL,5,10,'gNYe59kTtR.svg'),(7,NULL,5,10,'BFhpZbRo7h.svg'),(8,NULL,5,10,'lajCSSIoAx.svg'),(9,NULL,2,9,'flOLJmazLr.svg'),(10,NULL,2,10,'NVfWsyh_Ae.svg'),(11,NULL,3,9,'voy2bB80It.svg'),(12,NULL,3,9,'3NRJ1wOm-6.svg'),(13,NULL,3,10,'PjD8xyhIOS.svg'),(14,NULL,4,9,'WgT2QTxWJp.svg'),(15,NULL,4,9,'cRoPQdXP1A.svg'),(16,NULL,6,10,NULL),(17,NULL,6,9,NULL),(18,NULL,6,9,NULL),(19,NULL,6,9,NULL),(20,NULL,6,9,NULL),(21,NULL,6,9,NULL),(22,NULL,6,9,NULL),(23,NULL,6,9,NULL),(24,NULL,6,9,NULL),(25,NULL,6,9,NULL),(26,NULL,6,9,NULL),(27,NULL,6,9,NULL),(28,NULL,6,9,NULL),(29,NULL,6,9,NULL),(30,NULL,6,9,NULL),(31,NULL,6,9,NULL),(32,NULL,6,9,NULL),(33,NULL,6,9,NULL),(34,NULL,6,9,NULL),(35,NULL,6,9,NULL),(36,NULL,6,9,NULL),(37,NULL,6,9,NULL),(38,NULL,7,9,NULL),(39,NULL,7,9,NULL),(40,NULL,7,9,NULL),(41,NULL,7,9,NULL),(42,NULL,7,9,NULL),(43,NULL,7,9,NULL),(44,NULL,7,9,NULL),(45,NULL,7,9,NULL),(46,NULL,7,9,NULL),(47,NULL,7,9,NULL),(48,NULL,7,9,NULL),(49,NULL,7,9,NULL),(50,NULL,7,9,NULL),(51,NULL,7,9,NULL),(52,NULL,7,9,NULL),(53,NULL,7,9,NULL),(54,NULL,7,9,NULL),(55,NULL,7,9,NULL),(56,NULL,7,9,NULL),(57,NULL,7,9,NULL),(58,NULL,7,9,NULL),(59,NULL,7,9,NULL),(60,NULL,7,9,NULL),(61,NULL,7,9,NULL),(62,NULL,7,9,NULL),(63,NULL,9,10,'6pHPiOXOh3.svg'),(64,NULL,10,10,'K67gc3fKHZ.svg'),(65,NULL,9,10,'oJhcdiEH9S.svg'),(66,NULL,9,10,'1aSud6QMDV.svg'),(67,NULL,9,10,'ICcmCZpeIf.svg'),(68,NULL,9,9,'KdNfD788hy.svg'),(69,NULL,1,9,'jxAveRfLBi.svg'),(70,NULL,1,9,'t11uho5Q2X.svg'),(71,NULL,1,9,'1_MAA0k8CB.svg'),(72,NULL,11,10,'kTGbrr6yK4.svg'),(73,NULL,11,9,'pzMT7sL2AG.svg'),(74,NULL,11,9,'kX21iV2nQk.svg'),(75,NULL,11,10,'clpon7aIeR.svg'),(76,NULL,11,9,'jxAveRfLBi.svg'),(77,NULL,11,9,'t11uho5Q2X.svg'),(78,NULL,11,9,'1_MAA0k8CB.svg'),(79,NULL,12,10,'ho0TFzZBWU.svg'),(80,NULL,12,9,'flOLJmazLr.svg'),(81,NULL,12,10,'NVfWsyh_Ae.svg'),(82,NULL,13,9,'voy2bB80It.svg'),(83,NULL,13,9,'3NRJ1wOm-6.svg'),(84,NULL,13,10,'PjD8xyhIOS.svg'),(85,NULL,14,9,'WgT2QTxWJp.svg'),(86,NULL,14,9,'cRoPQdXP1A.svg'),(87,NULL,15,10,'gNYe59kTtR.svg'),(88,NULL,15,10,'BFhpZbRo7h.svg'),(89,NULL,15,10,'lajCSSIoAx.svg'),(90,NULL,16,10,NULL),(91,NULL,16,9,NULL),(92,NULL,16,9,NULL),(93,NULL,16,9,NULL),(94,NULL,16,9,NULL),(95,NULL,16,9,NULL),(96,NULL,16,9,NULL),(97,NULL,16,9,NULL),(98,NULL,16,9,NULL),(99,NULL,16,9,NULL),(100,NULL,16,9,NULL),(101,NULL,16,9,NULL),(102,NULL,16,9,NULL),(103,NULL,16,9,NULL),(104,NULL,16,9,NULL),(105,NULL,16,9,NULL),(106,NULL,16,9,NULL),(107,NULL,16,9,NULL),(108,NULL,16,9,NULL),(109,NULL,16,9,NULL),(110,NULL,16,9,NULL),(111,NULL,16,9,NULL),(112,NULL,17,9,NULL),(113,NULL,17,9,NULL),(114,NULL,17,9,NULL),(115,NULL,17,9,NULL),(116,NULL,17,9,NULL),(117,NULL,17,9,NULL),(118,NULL,17,9,NULL),(119,NULL,17,9,NULL),(120,NULL,17,9,NULL),(121,NULL,17,9,NULL),(122,NULL,17,9,NULL),(123,NULL,17,9,NULL),(124,NULL,17,9,NULL),(125,NULL,17,9,NULL),(126,NULL,17,9,NULL),(127,NULL,17,9,NULL),(128,NULL,17,9,NULL),(129,NULL,17,9,NULL),(130,NULL,17,9,NULL),(131,NULL,17,9,NULL),(132,NULL,17,9,NULL),(133,NULL,17,9,NULL),(134,NULL,17,9,NULL),(135,NULL,17,9,NULL),(136,NULL,17,9,NULL),(137,NULL,18,10,'6pHPiOXOh3.svg'),(138,NULL,18,10,'oJhcdiEH9S.svg'),(139,NULL,18,10,'1aSud6QMDV.svg'),(140,NULL,18,10,'ICcmCZpeIf.svg'),(141,NULL,18,9,'KdNfD788hy.svg'),(142,NULL,19,10,'kTGbrr6yK4.svg'),(143,NULL,19,9,'pzMT7sL2AG.svg'),(144,NULL,19,9,'kX21iV2nQk.svg'),(145,NULL,19,10,'clpon7aIeR.svg'),(146,NULL,19,9,'jxAveRfLBi.svg'),(147,NULL,19,9,'t11uho5Q2X.svg'),(148,NULL,19,9,'1_MAA0k8CB.svg'),(149,NULL,20,10,'kTGbrr6yK4.svg'),(150,NULL,20,9,'pzMT7sL2AG.svg'),(151,NULL,20,9,'kX21iV2nQk.svg'),(152,NULL,20,10,'clpon7aIeR.svg'),(153,NULL,20,9,'jxAveRfLBi.svg'),(154,NULL,20,9,'t11uho5Q2X.svg'),(155,NULL,20,9,'1_MAA0k8CB.svg'),(156,NULL,21,10,'kTGbrr6yK4.svg'),(157,NULL,21,9,'pzMT7sL2AG.svg'),(158,NULL,21,9,'kX21iV2nQk.svg'),(159,NULL,21,10,'clpon7aIeR.svg'),(160,NULL,21,9,'jxAveRfLBi.svg'),(161,NULL,21,9,'t11uho5Q2X.svg'),(162,NULL,21,9,'1_MAA0k8CB.svg'),(163,NULL,22,10,'ho0TFzZBWU.svg'),(164,NULL,22,9,'flOLJmazLr.svg'),(165,NULL,22,10,'NVfWsyh_Ae.svg'),(166,NULL,23,10,'kTGbrr6yK4.svg'),(167,NULL,23,9,'pzMT7sL2AG.svg'),(168,NULL,23,9,'kX21iV2nQk.svg'),(169,NULL,23,10,'clpon7aIeR.svg'),(170,NULL,23,9,'jxAveRfLBi.svg'),(171,NULL,23,9,'t11uho5Q2X.svg'),(172,NULL,23,9,'1_MAA0k8CB.svg'),(173,NULL,24,10,'ho0TFzZBWU.svg'),(174,NULL,24,9,'flOLJmazLr.svg'),(175,NULL,24,10,'NVfWsyh_Ae.svg'),(176,NULL,25,10,'kTGbrr6yK4.svg'),(177,NULL,25,9,'pzMT7sL2AG.svg'),(178,NULL,25,9,'kX21iV2nQk.svg'),(179,NULL,25,10,'clpon7aIeR.svg'),(180,NULL,25,9,'jxAveRfLBi.svg'),(181,NULL,25,9,'t11uho5Q2X.svg'),(182,NULL,25,9,'1_MAA0k8CB.svg'),(183,NULL,26,10,'ho0TFzZBWU.svg'),(184,NULL,26,9,'flOLJmazLr.svg'),(185,NULL,26,10,'NVfWsyh_Ae.svg'),(186,NULL,27,10,'kTGbrr6yK4.svg'),(187,NULL,27,9,'pzMT7sL2AG.svg'),(188,NULL,27,9,'kX21iV2nQk.svg'),(189,NULL,27,10,'clpon7aIeR.svg'),(190,NULL,27,9,'jxAveRfLBi.svg'),(191,NULL,27,9,'t11uho5Q2X.svg'),(192,NULL,27,9,'1_MAA0k8CB.svg'),(193,NULL,28,10,'ho0TFzZBWU.svg'),(194,NULL,28,9,'flOLJmazLr.svg'),(195,NULL,28,10,'NVfWsyh_Ae.svg'),(196,NULL,29,10,'kTGbrr6yK4.svg'),(197,NULL,29,9,'pzMT7sL2AG.svg'),(198,NULL,29,9,'kX21iV2nQk.svg'),(199,NULL,29,10,'clpon7aIeR.svg'),(200,NULL,29,9,'jxAveRfLBi.svg'),(201,NULL,29,9,'t11uho5Q2X.svg'),(202,NULL,29,9,'1_MAA0k8CB.svg'),(203,NULL,30,10,'ho0TFzZBWU.svg'),(204,NULL,30,9,'flOLJmazLr.svg'),(205,NULL,30,10,'NVfWsyh_Ae.svg'),(206,NULL,31,10,'kTGbrr6yK4.svg'),(207,NULL,31,9,'pzMT7sL2AG.svg'),(208,NULL,31,9,'kX21iV2nQk.svg'),(209,NULL,31,10,'clpon7aIeR.svg'),(210,NULL,31,9,'jxAveRfLBi.svg'),(211,NULL,31,9,'t11uho5Q2X.svg'),(212,NULL,31,9,'1_MAA0k8CB.svg'),(213,NULL,32,10,'ho0TFzZBWU.svg'),(214,NULL,32,9,'flOLJmazLr.svg'),(215,NULL,32,10,'NVfWsyh_Ae.svg'),(216,NULL,33,10,'kTGbrr6yK4.svg'),(217,NULL,33,9,'pzMT7sL2AG.svg'),(218,NULL,33,9,'kX21iV2nQk.svg'),(219,NULL,33,10,'clpon7aIeR.svg'),(220,NULL,33,9,'jxAveRfLBi.svg'),(221,NULL,33,9,'t11uho5Q2X.svg'),(222,NULL,33,9,'1_MAA0k8CB.svg'),(223,NULL,34,10,'ho0TFzZBWU.svg'),(224,NULL,34,9,'flOLJmazLr.svg'),(225,NULL,34,10,'NVfWsyh_Ae.svg'),(226,NULL,35,10,'6pHPiOXOh3.svg'),(227,NULL,35,10,'oJhcdiEH9S.svg'),(228,NULL,35,10,'1aSud6QMDV.svg'),(229,NULL,35,10,'ICcmCZpeIf.svg'),(230,NULL,35,9,'KdNfD788hy.svg'),(231,NULL,36,10,'kTGbrr6yK4.svg'),(232,NULL,36,9,'pzMT7sL2AG.svg'),(233,NULL,36,9,'kX21iV2nQk.svg'),(234,NULL,36,10,'clpon7aIeR.svg'),(235,NULL,36,9,'jxAveRfLBi.svg'),(236,NULL,36,9,'t11uho5Q2X.svg'),(237,NULL,36,9,'1_MAA0k8CB.svg'),(238,NULL,37,10,'ho0TFzZBWU.svg'),(239,NULL,37,9,'flOLJmazLr.svg'),(240,NULL,37,10,'NVfWsyh_Ae.svg'),(241,NULL,38,9,'voy2bB80It.svg'),(242,NULL,38,9,'3NRJ1wOm-6.svg'),(243,NULL,38,10,'PjD8xyhIOS.svg'),(244,NULL,39,10,'kTGbrr6yK4.svg'),(245,NULL,39,9,'pzMT7sL2AG.svg'),(246,NULL,39,9,'kX21iV2nQk.svg'),(247,NULL,39,10,'clpon7aIeR.svg'),(248,NULL,39,9,'jxAveRfLBi.svg'),(249,NULL,39,9,'t11uho5Q2X.svg'),(250,NULL,39,9,'1_MAA0k8CB.svg'),(251,NULL,40,10,'ho0TFzZBWU.svg'),(252,NULL,40,9,'flOLJmazLr.svg'),(253,NULL,40,10,'NVfWsyh_Ae.svg'),(254,NULL,41,9,'voy2bB80It.svg'),(255,NULL,41,9,'3NRJ1wOm-6.svg'),(256,NULL,41,10,'PjD8xyhIOS.svg'),(257,NULL,42,9,'WgT2QTxWJp.svg'),(258,NULL,42,9,'cRoPQdXP1A.svg'),(259,NULL,43,10,'gNYe59kTtR.svg'),(260,NULL,43,10,'BFhpZbRo7h.svg'),(261,NULL,43,10,'lajCSSIoAx.svg'),(262,NULL,44,10,NULL),(263,NULL,44,9,NULL),(264,NULL,44,9,NULL),(265,NULL,44,9,NULL),(266,NULL,44,9,NULL),(267,NULL,44,9,NULL),(268,NULL,44,9,NULL),(269,NULL,44,9,NULL),(270,NULL,44,9,NULL),(271,NULL,44,9,NULL),(272,NULL,44,9,NULL),(273,NULL,44,9,NULL),(274,NULL,44,9,NULL),(275,NULL,44,9,NULL),(276,NULL,44,9,NULL),(277,NULL,44,9,NULL),(278,NULL,44,9,NULL),(279,NULL,44,9,NULL),(280,NULL,44,9,NULL),(281,NULL,44,9,NULL),(282,NULL,44,9,NULL),(283,NULL,44,9,NULL),(284,NULL,45,9,NULL),(285,NULL,45,9,NULL),(286,NULL,45,9,NULL),(287,NULL,45,9,NULL),(288,NULL,45,9,NULL),(289,NULL,45,9,NULL),(290,NULL,45,9,NULL),(291,NULL,45,9,NULL),(292,NULL,45,9,NULL),(293,NULL,45,9,NULL),(294,NULL,45,9,NULL),(295,NULL,45,9,NULL),(296,NULL,45,9,NULL),(297,NULL,45,9,NULL),(298,NULL,45,9,NULL),(299,NULL,45,9,NULL),(300,NULL,45,9,NULL),(301,NULL,45,9,NULL),(302,NULL,45,9,NULL),(303,NULL,45,9,NULL),(304,NULL,45,9,NULL),(305,NULL,45,9,NULL),(306,NULL,45,9,NULL),(307,NULL,45,9,NULL),(308,NULL,45,9,NULL),(309,NULL,45,9,NULL),(310,NULL,45,9,NULL),(311,NULL,45,9,NULL),(312,NULL,45,9,NULL),(313,NULL,45,9,NULL),(314,NULL,45,9,NULL),(315,NULL,45,9,NULL),(316,NULL,45,9,NULL),(317,NULL,45,9,NULL),(318,NULL,45,9,NULL),(319,NULL,45,9,NULL),(320,NULL,45,9,NULL),(321,NULL,45,9,NULL),(322,NULL,45,9,NULL),(323,NULL,45,9,NULL),(324,NULL,45,9,NULL),(325,NULL,45,9,NULL),(326,NULL,45,9,NULL),(327,NULL,45,9,NULL),(328,NULL,45,9,NULL),(329,NULL,45,9,NULL),(330,NULL,45,9,NULL),(331,NULL,45,9,NULL),(332,NULL,45,9,NULL),(333,NULL,45,9,NULL),(334,NULL,45,9,NULL),(335,NULL,45,9,NULL),(336,NULL,45,9,NULL),(337,NULL,45,9,NULL),(338,NULL,45,9,NULL),(339,NULL,45,9,NULL),(340,NULL,45,9,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_lang`
--

LOCK TABLES `prop_lang` WRITE;
/*!40000 ALTER TABLE `prop_lang` DISABLE KEYS */;
INSERT INTO `prop_lang` VALUES (1,1,'Веб - приложение','ru'),(2,2,'Windows','ru'),(3,3,'Малый бизнес','ru'),(4,4,'Андройд','ru'),(5,5,'iOS','ru'),(6,6,'Бесплатный период','ru'),(7,7,'Подробный период','ru'),(8,8,'Подписка','ru'),(9,9,'Средний бизнес','ru'),(10,10,'Большой бизнес','ru'),(11,11,'В облаке','ru'),(12,12,'На сервере','ru'),(13,13,'На компьютере','ru'),(14,14,'По подписке','ru'),(15,15,'Разовая оплата','ru'),(16,16,'Воронка продаж','ru'),(17,17,'База клиентов','ru'),(18,18,'Управление заказами','ru'),(19,19,'Продуктовый каталог','ru'),(20,20,'Колл-центр и телефония','ru'),(21,21,'История взаимодействия с клиентом','ru'),(22,22,'Системы лояльности','ru'),(23,23,'Мониторинг эффективности персонала','ru'),(24,24,'Тайм-менеджмент','ru'),(25,25,'Управление поддержкой','ru'),(26,26,'Открытый исходный код','ru'),(27,27,'Отчёты','ru'),(28,28,'Интеграция с почтой','ru'),(29,29,'Email-рассылки','ru'),(30,30,'Шаблоны проектов','ru'),(31,31,'Хранилище файлов','ru'),(32,32,'Диаграмма Ганта','ru'),(33,33,'Биллинг и счета','ru'),(34,34,'Экспорт/импорт данных','ru'),(35,35,'Подключение Фис.регистратора','ru'),(36,36,'API для интеграции','ru'),(37,37,'Веб-формы','ru'),(38,38,'Ритейл','ru'),(39,39,'Интернет-магазин','ru'),(40,40,'Сфера услуг','ru'),(41,41,'Фитнес клубы','ru'),(42,42,'Автосервисы','ru'),(43,43,'Юридические компании','ru'),(44,44,'Агентства','ru'),(45,45,'Турагентство','ru'),(46,46,'Недвижимость','ru'),(47,47,'Агентство недвижимости','ru'),(48,48,'Логистика и транспорт','ru'),(49,49,'Медицина','ru'),(50,50,'IT-технологии','ru'),(51,51,'Клиники','ru'),(52,52,'Врачи','ru'),(53,53,'Склад','ru'),(54,54,'Курьерские службы','ru'),(55,55,'Колл-центр','ru'),(56,56,'Риэлторы','ru'),(57,57,'B2B-компании','ru'),(58,58,'Строительный бизнес','ru'),(59,59,'Полиграфии','ru'),(60,60,'Товарный бизнес','ru'),(61,61,'Франшиза','ru'),(62,62,'Маркетплейсы','ru'),(63,63,'Веб приложение','ru'),(64,64,'prop1','ru'),(65,65,'Приложение','ru'),(66,66,'Андройд','ru'),(67,67,'IOS','ru'),(68,68,'Линукс','ru'),(69,69,'Windows Phone','ru'),(70,70,'Mac','ru'),(71,71,'Linux','ru'),(72,72,'Веб - приложение','ru'),(73,73,'Windows','ru'),(74,74,'Андройд','ru'),(75,75,'iOS','ru'),(76,76,'Windows Phone','ru'),(77,77,'Mac','ru'),(78,78,'Linux','ru'),(79,79,'Малый бизнес','ru'),(80,80,'Средний бизнес','ru'),(81,81,'Большой бизнес','ru'),(82,82,'В облаке','ru'),(83,83,'На сервере','ru'),(84,84,'На компьютере','ru'),(85,85,'По подписке','ru'),(86,86,'Разовая оплата','ru'),(87,87,'Бесплатный период','ru'),(88,88,'Подробный период','ru'),(89,89,'Подписка','ru'),(90,90,'Воронка продаж','ru'),(91,91,'База клиентов','ru'),(92,92,'Управление заказами','ru'),(93,93,'Продуктовый каталог','ru'),(94,94,'Колл-центр и телефония','ru'),(95,95,'История взаимодействия с клиентом','ru'),(96,96,'Системы лояльности','ru'),(97,97,'Мониторинг эффективности персонала','ru'),(98,98,'Тайм-менеджмент','ru'),(99,99,'Управление поддержкой','ru'),(100,100,'Открытый исходный код','ru'),(101,101,'Отчёты','ru'),(102,102,'Интеграция с почтой','ru'),(103,103,'Email-рассылки','ru'),(104,104,'Шаблоны проектов','ru'),(105,105,'Хранилище файлов','ru'),(106,106,'Диаграмма Ганта','ru'),(107,107,'Биллинг и счета','ru'),(108,108,'Экспорт/импорт данных','ru'),(109,109,'Подключение Фис.регистратора','ru'),(110,110,'API для интеграции','ru'),(111,111,'Веб-формы','ru'),(112,112,'Ритейл','ru'),(113,113,'Интернет-магазин','ru'),(114,114,'Сфера услуг','ru'),(115,115,'Фитнес клубы','ru'),(116,116,'Автосервисы','ru'),(117,117,'Юридические компании','ru'),(118,118,'Агентства','ru'),(119,119,'Турагентство','ru'),(120,120,'Недвижимость','ru'),(121,121,'Агентство недвижимости','ru'),(122,122,'Логистика и транспорт','ru'),(123,123,'Медицина','ru'),(124,124,'IT-технологии','ru'),(125,125,'Клиники','ru'),(126,126,'Врачи','ru'),(127,127,'Склад','ru'),(128,128,'Курьерские службы','ru'),(129,129,'Колл-центр','ru'),(130,130,'Риэлторы','ru'),(131,131,'B2B-компании','ru'),(132,132,'Строительный бизнес','ru'),(133,133,'Полиграфии','ru'),(134,134,'Товарный бизнес','ru'),(135,135,'Франшиза','ru'),(136,136,'Маркетплейсы','ru'),(137,137,'Веб приложение','ru'),(138,138,'Приложение','ru'),(139,139,'Андройд','ru'),(140,140,'IOS','ru'),(141,141,'Линукс','ru'),(142,142,'Веб - приложение','ru'),(143,143,'Windows','ru'),(144,144,'Андройд','ru'),(145,145,'iOS','ru'),(146,146,'Windows Phone','ru'),(147,147,'Mac','ru'),(148,148,'Linux','ru'),(149,149,'Веб - приложение','ru'),(150,150,'Windows','ru'),(151,151,'Андройд','ru'),(152,152,'iOS','ru'),(153,153,'Windows Phone','ru'),(154,154,'Mac','ru'),(155,155,'Linux','ru'),(156,156,'Веб - приложение','ru'),(157,157,'Windows','ru'),(158,158,'Андройд','ru'),(159,159,'iOS','ru'),(160,160,'Windows Phone','ru'),(161,161,'Mac','ru'),(162,162,'Linux','ru'),(163,163,'Малый бизнес','ru'),(164,164,'Средний бизнес','ru'),(165,165,'Большой бизнес','ru'),(166,166,'Веб - приложение','ru'),(167,167,'Windows','ru'),(168,168,'Андройд','ru'),(169,169,'iOS','ru'),(170,170,'Windows Phone','ru'),(171,171,'Mac','ru'),(172,172,'Linux','ru'),(173,173,'Малый бизнес','ru'),(174,174,'Средний бизнес','ru'),(175,175,'Большой бизнес','ru'),(176,176,'Веб - приложение','ru'),(177,177,'Windows','ru'),(178,178,'Андройд','ru'),(179,179,'iOS','ru'),(180,180,'Windows Phone','ru'),(181,181,'Mac','ru'),(182,182,'Linux','ru'),(183,183,'Малый бизнес','ru'),(184,184,'Средний бизнес','ru'),(185,185,'Большой бизнес','ru'),(186,186,'Веб - приложение','ru'),(187,187,'Windows','ru'),(188,188,'Андройд','ru'),(189,189,'iOS','ru'),(190,190,'Windows Phone','ru'),(191,191,'Mac','ru'),(192,192,'Linux','ru'),(193,193,'Малый бизнес','ru'),(194,194,'Средний бизнес','ru'),(195,195,'Большой бизнес','ru'),(196,196,'Веб - приложение','ru'),(197,197,'Windows','ru'),(198,198,'Андройд','ru'),(199,199,'iOS','ru'),(200,200,'Windows Phone','ru'),(201,201,'Mac','ru'),(202,202,'Linux','ru'),(203,203,'Малый бизнес','ru'),(204,204,'Средний бизнес','ru'),(205,205,'Большой бизнес','ru'),(206,206,'Веб - приложение','ru'),(207,207,'Windows','ru'),(208,208,'Андройд','ru'),(209,209,'iOS','ru'),(210,210,'Windows Phone','ru'),(211,211,'Mac','ru'),(212,212,'Linux','ru'),(213,213,'Малый бизнес','ru'),(214,214,'Средний бизнес','ru'),(215,215,'Большой бизнес','ru'),(216,216,'Веб - приложение','ru'),(217,217,'Windows','ru'),(218,218,'Андройд','ru'),(219,219,'iOS','ru'),(220,220,'Windows Phone','ru'),(221,221,'Mac','ru'),(222,222,'Linux','ru'),(223,223,'Малый бизнес','ru'),(224,224,'Средний бизнес','ru'),(225,225,'Большой бизнес','ru'),(226,226,'Веб приложение','ru'),(227,227,'Приложение','ru'),(228,228,'Андройд','ru'),(229,229,'IOS','ru'),(230,230,'Линукс','ru'),(231,231,'Веб - приложение','ru'),(232,232,'Windows','ru'),(233,233,'Андройд','ru'),(234,234,'iOS','ru'),(235,235,'Windows Phone','ru'),(236,236,'Mac','ru'),(237,237,'Linux','ru'),(238,238,'Малый бизнес','ru'),(239,239,'Средний бизнес','ru'),(240,240,'Большой бизнес','ru'),(241,241,'В облаке','ru'),(242,242,'На сервере','ru'),(243,243,'На компьютере','ru'),(244,244,'Веб - приложение','ru'),(245,245,'Windows','ru'),(246,246,'Андройд','ru'),(247,247,'iOS','ru'),(248,248,'Windows Phone','ru'),(249,249,'Mac','ru'),(250,250,'Linux','ru'),(251,251,'Малый бизнес','ru'),(252,252,'Средний бизнес','ru'),(253,253,'Большой бизнес','ru'),(254,254,'В облаке','ru'),(255,255,'На сервере','ru'),(256,256,'На компьютере','ru'),(257,257,'По подписке','ru'),(258,258,'Разовая оплата','ru'),(259,259,'Бесплатный период','ru'),(260,260,'Подробный период','ru'),(261,261,'Подписка','ru'),(262,262,'Воронка продаж','ru'),(263,263,'База клиентов','ru'),(264,264,'Управление заказами','ru'),(265,265,'Продуктовый каталог','ru'),(266,266,'Колл-центр и телефония','ru'),(267,267,'История взаимодействия с клиентом','ru'),(268,268,'Системы лояльности','ru'),(269,269,'Мониторинг эффективности персонала','ru'),(270,270,'Тайм-менеджмент','ru'),(271,271,'Управление поддержкой','ru'),(272,272,'Открытый исходный код','ru'),(273,273,'Отчёты','ru'),(274,274,'Интеграция с почтой','ru'),(275,275,'Email-рассылки','ru'),(276,276,'Шаблоны проектов','ru'),(277,277,'Хранилище файлов','ru'),(278,278,'Диаграмма Ганта','ru'),(279,279,'Биллинг и счета','ru'),(280,280,'Экспорт/импорт данных','ru'),(281,281,'Подключение Фис.регистратора','ru'),(282,282,'API для интеграции','ru'),(283,283,'Веб-формы','ru'),(284,284,'Ритейл','ru'),(285,285,'Интернет-магазин','ru'),(286,286,'Сфера услуг','ru'),(287,287,'Фитнес клубы','ru'),(288,288,'Автосервисы','ru'),(289,289,'Юридические компании','ru'),(290,290,'Агентства','ru'),(291,291,'Турагентство','ru'),(292,292,'Недвижимость','ru'),(293,293,'Агентство недвижимости','ru'),(294,294,'Логистика и транспорт','ru'),(295,295,'Медицина','ru'),(296,296,'IT-технологии','ru'),(297,297,'Клиники','ru'),(298,298,'Врачи','ru'),(299,299,'Склад','ru'),(300,300,'Курьерские службы','ru'),(301,301,'Колл-центр','ru'),(302,302,'Риэлторы','ru'),(303,303,'B2B-компании','ru'),(304,304,'Строительный бизнес','ru'),(305,305,'Полиграфии','ru'),(306,306,'Товарный бизнес','ru'),(307,307,'Франшиза','ru'),(308,308,'Маркетплейсы','ru'),(309,309,'арара','ru'),(310,310,'Салон красоты','ru'),(311,311,'Универсальная','ru'),(312,312,'Универсальная','ru'),(313,313,'Оконный бизнес','ru'),(314,314,'Рекламное агентство','ru'),(315,315,'Гостиницы ','ru'),(316,316,'Консалтинг','ru'),(317,317,'Мебельный бизнес','ru'),(318,318,'Клининговые компании','ru'),(319,319,'Автошколы','ru'),(320,320,'МФО','ru'),(321,321,'Аренда и прокат','ru'),(322,322,'Языковые школы','ru'),(323,323,'Коллекторское агентство','ru'),(324,324,'Кадровые агентства ','ru'),(325,325,'Финансы','ru'),(326,326,'Цветочный магазин','ru'),(327,327,'Стоматология','ru'),(328,328,'Ветеринарная клиника','ru'),(329,329,'Доставка еды','ru'),(330,330,'Доставка еды','ru'),(331,331,'Рестораны','ru'),(332,332,'Музыкальные школы','ru'),(333,333,'Школы танцев','ru'),(334,334,'Тренинги','ru'),(335,335,'Поставщики тендеров','ru'),(336,336,'ЖКХ','ru'),(337,337,'Сервис центры','ru'),(338,338,'Оптовые продажи','ru'),(339,339,'Тендеры','ru'),(340,340,'Закупки','ru');
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_type`
--

LOCK TABLES `prop_type` WRITE;
/*!40000 ALTER TABLE `prop_type` DISABLE KEYS */;
INSERT INTO `prop_type` VALUES (1,'platforms',0),(2,'company_type',0),(3,'deploy',0),(4,'pay_type',0),(5,'product_info',0),(6,'func',0),(7,'apply_in',0),(8,'',0),(9,'platforms',1),(10,'func',7),(11,'platforms',0),(12,'company_type',0),(13,'deploy',0),(14,'pay_type',0),(15,'product_info',0),(16,'func',0),(17,'apply_in',0),(18,'platforms',0),(19,'platforms',0),(20,'platforms',0),(21,'platforms',0),(22,'company_type',0),(23,'platforms',0),(24,'company_type',0),(25,'platforms',0),(26,'company_type',0),(27,'platforms',0),(28,'company_type',0),(29,'platforms',0),(30,'company_type',0),(31,'platforms',0),(32,'company_type',0),(33,'platforms',0),(34,'company_type',0),(35,'platforms',0),(36,'platforms',0),(37,'company_type',0),(38,'deploy',0),(39,'platforms',2),(40,'company_type',2),(41,'deploy',2),(42,'pay_type',2),(43,'product_info',2),(44,'func',2),(45,'apply_in',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_type_lang`
--

LOCK TABLES `prop_type_lang` WRITE;
/*!40000 ALTER TABLE `prop_type_lang` DISABLE KEYS */;
INSERT INTO `prop_type_lang` VALUES (1,1,'Платформы','ru'),(2,2,'Тип компании','ru'),(3,3,'Развёртывание','ru'),(4,4,'Модель оплаты','ru'),(5,5,'Информация о продукте','ru'),(6,6,'Функционал','ru'),(7,7,'Отрасли применения','ru'),(8,8,'test','ru'),(9,9,'Платформы','ru'),(10,10,'test','ru'),(11,11,'Платформы','ru'),(12,12,'Тип компании','ru'),(13,13,'Развёртывание','ru'),(14,14,'Модель оплаты','ru'),(15,15,'Информация о продукте','ru'),(16,16,'Функционал','ru'),(17,17,'Отрасли применения','ru'),(18,18,'Платформы','ru'),(19,19,'Платформы','ru'),(20,20,'Платформы','ru'),(21,21,'Платформы','ru'),(22,22,'Тип компании','ru'),(23,23,'Платформы','ru'),(24,24,'Тип компании','ru'),(25,25,'Платформы','ru'),(26,26,'Тип компании','ru'),(27,27,'Платформы','ru'),(28,28,'Тип компании','ru'),(29,29,'Платформы','ru'),(30,30,'Тип компании','ru'),(31,31,'Платформы','ru'),(32,32,'Тип компании','ru'),(33,33,'Платформы','ru'),(34,34,'Тип компании','ru'),(35,35,'Платформы','ru'),(36,36,'Платформы','ru'),(37,37,'Тип компании','ru'),(38,38,'Развёртывание','ru'),(39,39,'Платформы','ru'),(40,40,'Тип компании','ru'),(41,41,'Развёртывание','ru'),(42,42,'Модель оплаты','ru'),(43,43,'Информация о продукте','ru'),(44,44,'Функционал','ru'),(45,45,'Отрасли применения','ru');
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

-- Dump completed on 2022-03-12  6:50:48
