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
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,NULL,NULL,'_BLYiaSP_2.svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,1),(2,NULL,NULL,'oVJJLLwcEz.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(3,NULL,NULL,'MWev9Ijpld.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(4,NULL,NULL,'hEm3R8qqWz.svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(5,NULL,NULL,'yN5p384yjx.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(6,NULL,NULL,'liA3ZZ1QfI.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(7,NULL,NULL,'3pGIqOq1Zm.jfif',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(8,NULL,NULL,'bnMQXG_yL6.jfif',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(10,NULL,NULL,'Ne_JmoNuWX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(11,NULL,NULL,'zqmSK6bpZz.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(12,NULL,NULL,'peX9rF8Ik0.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(13,NULL,NULL,'l1hhkJItN0.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(14,NULL,NULL,'hT4pzWzoEi.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(15,NULL,NULL,'-A1UB9ALRb.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(16,NULL,NULL,'LI60o5Ezdq.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(17,NULL,NULL,'CgeFpxlBmj.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(18,NULL,NULL,'NSDVAK-KwS.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(19,NULL,NULL,'8QGVPjyRF7.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(20,NULL,NULL,'wDuElBAotK.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(21,NULL,NULL,'VaZz-ilgrX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(22,NULL,NULL,'t86JtmMtxf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(23,NULL,NULL,'fob9JdT3IL.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(24,NULL,NULL,'vX7owuLClu.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(25,NULL,NULL,'LRIvsDsYno.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(26,NULL,NULL,'5tJRvtSQCN.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(27,NULL,NULL,'djLOqX00hX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(28,NULL,NULL,'ykGh3g5Pqu.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(29,NULL,NULL,'3gHiBtkPe9.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(30,NULL,NULL,'pT0IZB69sf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(31,NULL,NULL,'-GJgROOiL7.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(32,NULL,NULL,'Rs7peAkrqj.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(33,NULL,NULL,'L1yHvVWwPf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(34,NULL,NULL,'Bs3t-Wd4Ck.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(35,NULL,NULL,'E8q8uLEgcv.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(36,NULL,NULL,'huenFOyzyS.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(37,NULL,NULL,'tuu87wwSxt.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(38,NULL,NULL,'Q1Jllex1ZE.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(39,NULL,NULL,'KuVJt8uvkd.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(40,NULL,NULL,'OmvbbsUZ3p.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(41,NULL,NULL,'YoOz9KytK-.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(42,NULL,NULL,'kgwJ1saOs9.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(43,NULL,NULL,'tp-baeImoj.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(44,NULL,NULL,'BOcHOpd4G3.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(45,NULL,NULL,'RkxapwuPIj.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(46,NULL,NULL,'yS1dotND8v.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(47,NULL,NULL,'i9qJXIEzO6.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(48,NULL,NULL,'n88nfTeJid.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(49,NULL,NULL,'cTBD1s1XRm.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(51,NULL,NULL,'jI1I3Aofeb.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(52,NULL,NULL,'uN5bEfgzW_.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(53,NULL,NULL,'njnvyg8jda.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(55,NULL,NULL,'483tiZH21E.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(56,NULL,NULL,'WLvNFEUcdC.webp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(57,NULL,NULL,'pmjgK063xL.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(58,NULL,NULL,'rPL0ft3ct1.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(59,NULL,NULL,'65yhMGmmu2.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(60,NULL,NULL,'MAD43tnIrR.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(61,NULL,NULL,'D-IPipK7Kn.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(62,NULL,NULL,'retZoh-rfW.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(63,NULL,NULL,'adZTTnd7N0.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(64,NULL,NULL,'FQZ7Lt0F-K.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(65,NULL,NULL,'NqGdkiGSCA.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(66,NULL,NULL,'JfxVmMYqC5.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(67,NULL,NULL,'qeIwNYzJB2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(68,NULL,NULL,'NbLelBPYlr.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(69,NULL,NULL,'vk9Ts5zeaP.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(70,NULL,NULL,'-Sp6kz8zpf.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(71,NULL,NULL,'YidGW5CWz9.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(72,NULL,NULL,'ybFZI8bVK_.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(73,NULL,NULL,'g3YqWHquAK.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(74,NULL,NULL,'QILb5pUnvT.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,5),(75,NULL,NULL,'7g-zeD8mqe.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(76,NULL,NULL,'RsuYVoBwjy.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(77,NULL,NULL,'Mxm4Pj5e6h.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(78,NULL,NULL,'9RiAIoCPji.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(79,NULL,NULL,'7UBXQ9ZGEe.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(80,NULL,NULL,'cGMTg4fz-0.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(81,NULL,NULL,'2JBeUzxm4G.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(82,NULL,NULL,'k09oLEQVWW.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(83,NULL,NULL,'zB1rawZiEr.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(84,NULL,NULL,'dVnNY3134u.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(85,NULL,NULL,'kp0K20iKhO.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(86,NULL,NULL,'cTyyFY2mQt.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(87,NULL,NULL,'YyHwx3Lr3n.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(88,NULL,NULL,'ZkvLz2-g9l.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(89,NULL,NULL,'UTAuVrGDy_.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(90,NULL,NULL,'f15DRynFYp.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(91,NULL,NULL,'t_RHfl34Kl.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(93,NULL,NULL,'no-ehgkaBC.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(95,NULL,NULL,'SqF8kcQt_T.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(96,NULL,NULL,'sQpQ1HTybU.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(97,NULL,NULL,'d4jZsZTp0c.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(98,NULL,NULL,'QIE52SufWe.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(99,NULL,NULL,'TowDYPbQvQ.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(100,NULL,NULL,'dNtD9ldZ59.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(101,NULL,NULL,'8nWG3pGEG2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(102,NULL,NULL,'3wzjsi4SLx.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(103,NULL,NULL,'sPml6WnzDh.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(104,NULL,NULL,'o1NYptf2wR.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(105,NULL,NULL,'0g67qH-0WZ.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(106,NULL,NULL,'18XKZzPW-i.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(107,NULL,NULL,'rgSY3KQcxq.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,3),(108,NULL,NULL,'AACrSKP_AG.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(109,NULL,NULL,'0RjrFtfBuL.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(110,NULL,NULL,'FKrVXbJse6.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(111,NULL,NULL,'ZT2y74EZ7u.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(112,NULL,NULL,'z5eDV6-Qxu.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,4),(113,NULL,NULL,'gGjAZVRku7.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(114,NULL,NULL,'DINJqV3I2H.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(115,NULL,NULL,'gIpn3yogY9.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(116,NULL,NULL,'QPtWpRBkWa.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(117,NULL,NULL,'U-jAf-ZYQG.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(118,NULL,NULL,'wWr9sUm11O.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(119,NULL,NULL,'KH3scWt5jt.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(120,NULL,NULL,'sA08ML_8vu.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(121,NULL,NULL,'CBmK712C4U.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(122,NULL,NULL,'QqcfxNGGCb.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(123,NULL,NULL,'9L2d80NrwC.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(124,NULL,NULL,'_NSYpMpJLv.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(125,NULL,NULL,'pg1r478dLX.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(126,NULL,NULL,'HdeccXrhcY.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(127,NULL,NULL,'O-wEmupv5U.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(128,NULL,NULL,'1yENfEzBot.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(129,NULL,NULL,'OiNUU7PMjl.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(130,NULL,NULL,'etHglEKE0u.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(131,NULL,NULL,'1-korNAZfN.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(132,NULL,NULL,'Oa8ovU9gIQ.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(133,NULL,NULL,'2rWDrPmEby.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(134,NULL,NULL,'NHmojT1Jgy.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(135,NULL,NULL,'WUOHyBhc1t.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(136,NULL,NULL,'PjJSZNfRyG.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(137,NULL,NULL,'4DgcfnvlPl.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(138,NULL,NULL,'XughhFKb2k.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(139,NULL,NULL,'d9T1QNz68S.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(140,NULL,NULL,'Kye4pSxfrH.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(141,NULL,NULL,'syq3LYmpLx.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(142,NULL,NULL,'ZmO9EdI3g3.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(143,NULL,NULL,'uuLQfyTCRB.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(144,NULL,NULL,'jDH-iQIHWr.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(145,NULL,NULL,'yWS1Fpf4ni.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(146,NULL,NULL,'qVwsgWthMK.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(147,NULL,NULL,'3pWTwrS38-.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(148,NULL,NULL,'tmfAqfbWUX.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(149,NULL,NULL,'28ksw5rQTR.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(150,NULL,NULL,'n-CLc4odWp.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(151,NULL,NULL,'3W8TPv4GG7.webp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(152,NULL,NULL,'da4SY4n7bs.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(153,NULL,NULL,'PyK2gH9FZ7.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(154,NULL,NULL,'l8Myi5AvuW.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(155,NULL,NULL,'4Bsjgbnn8V.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(156,NULL,NULL,'ZhkY4iqU7L.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(157,NULL,NULL,'MpafEkF_w3.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(158,NULL,NULL,'o3iNO7jWed.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(159,NULL,NULL,'OwTUr5t5GA.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(160,NULL,NULL,'nhcl46SDLS.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(161,NULL,NULL,'Da6Z6UJQ2l.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(162,NULL,NULL,'erTEHsh5YH.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(163,NULL,NULL,'lMO0IMHELq.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(164,NULL,NULL,'gTYCqkuO1A.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(165,NULL,NULL,'xwitlrEV3y.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(166,NULL,NULL,'Alk_llx-RW.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(167,NULL,NULL,'AifoZGEDz5.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(168,NULL,NULL,'7K0jo-p2-9.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(169,NULL,NULL,'hFzUyhi8aR.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(170,NULL,NULL,'WNuJPi-29W.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2),(171,NULL,NULL,'57HpuN7X-g.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(172,NULL,NULL,'4TyJr2hncn.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(173,NULL,NULL,'qqRNaj7_ui.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(174,NULL,NULL,'okZ-DRvQTV.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,7),(175,NULL,NULL,'ksUc1KKeRn.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(176,NULL,NULL,'PFGO44tUjc.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(177,NULL,NULL,'Kge64uyjUm.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,6),(178,NULL,NULL,'nUO0Xe7S2q.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_lang`
--

LOCK TABLES `product_lang` WRITE;
/*!40000 ALTER TABLE `product_lang` DISABLE KEYS */;
INSERT INTO `product_lang` VALUES (1,'Битрикс24','«Простой бизнес» – идеальный инструмент для организации удалённой работы офиса. Одна программа для управления всей Вашей компанией.','<p>Крупнейший интранет: CRM и соцсеть компании одновременно. Универсальна: можно организовать службу поддержки, автоматизировать все бизнес-процессы или использовать как личный органайзер. Есть полноценная бесплатная версия.</p>',1,'ru'),(2,'amoCRM','Онлайн-система учета клиентов и сделок для отдела продаж, представляющая собой базу данных клиентов, компаний и сделок, в которой собрана вся информация по активным переговорам, текущим контрактам и будущим продажам.','<p>Онлайн-система учета клиентов и сделок для отдела продаж, представляющая собой базу данных клиентов, компаний и сделок, в которой собрана вся информация по активным переговорам, текущим контрактам и будущим продажам.</p><p>Воронку продаж можно выстраивать по количеству сделок или в деньгах, по всему отделу или отдельным менеджерам, по собственным признакам. Система строит прогнозы продаж, основываясь на ранее собранной статистике и текущем положении. С amoCRM можно работать с мобильных устройств, систему можно интегрировать с сайтом и телефоном компании. Продукт распространяется по модели SaaS.</p><br>Владелец - amoCRM,Qsoft<br>Ключевые слова - CRM, SaaS',2,'ru'),(3,'1С:CRM','1С:CRM КОРП 3.0 — аналитическая CRM-система, в которой реализован ряд функций, учитывающих потребности компаний крупного бизнеса: инструменты управления проектами и процессами проходящими в компании; интеграция с корпоративными системами; работа из единог','<p>1С:CRM КОРП 3.0 — аналитическая CRM-система, в которой реализован ряд функций, учитывающих потребности компаний крупного бизнеса: инструменты управления проектами и процессами проходящими в компании; интеграция с корпоративными системами; работа из единого интерфейса и другая функциональность.<br></p><p>Класс программного обеспечения: Системы управления процессами организации, Информационные системы для решения специфических отраслевых задач<br>Добавлен в единого реестра российских программ 6 Сентября 2016 Приказ Минкомсвязи России от 06.09.2016 №426<br>Владелец - российская коммерческая организация ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ \"1С\", Права были переданы из ЗАО \"1С\" в ООО \"1С\" в качестве дополнительного вклада в уставный капитал ООО \"1С\" по Договору об отчуждении исключительного права на программы для ЭВМ от 09 декабря 2010 года.</p>',3,'ru'),(4,'mmm','','',1,'en'),(5,'MindSales CRM','CRM предлагает комплексное решение, поэтому нет необходимости закупать модули у разных поставщиков ','MindSales CRM – система, которая идеально\r\nподходит для отдела продаж. Позволяет анализировать пользователя на все 100% и строить\r\nпрогноз, аналитика внутри CRM системы позволяет отслеживать как активных пользователей, так и\r\nброшенные корзины, историю заказов. Данная система достаточно гибкая, что бы\r\nадаптироваться именно под определенный бизнес. ',4,'ru'),(6,'Битрикс24','Битрикс24.CRM — это полный набор инструментов для управления продажами','<p>Битрикс24 не оставит шанса упустить клиента, более\r\nтого, система сама проведет клиента по воронке и поможет прийти к лучшему\r\nрезультату. Для наиболее вероятного успеха, система так же располагает искусственным\r\nинтеллектом, который может анализировать данные и предугадывать итог. </p>',5,'ru'),(7,'Zadarma','CRM-система — многофункциональная система управления взаимоотношениями с клиентами.','<p>Облачная CRM от Zadarma поможет автоматизировать все основные процессы без лишних затрат. Система полностью интегрирована с телефонией и АТС Zadarma, подходит бизнесу любого масштаба и главное — полностью бесплатная, вне зависимости от численности вашего штата сотрудников.</p>',6,'ru'),(8,'AmoCRM','Система управления продажами. Инструмент для коммуникации с клиентами','<p>Мы - официальные партнёры AmoCRM - входим в ТОП 3 интеграторов в Алматы, успешно внедрили систему в более чем 85 отделов продаж, и сегодня готовы помочь увеличить прибыль вам.</p>',7,'ru'),(9,'S2','CRM, задачи и проекты, документооборот, финансы, кассы и склад','<p>S2 — это набор бизнес-приложений, собранных в единый комплекс: CRM, трекер задач и проектов, документооборот, учет финансов, склад, кассы, система аналитики, управление кадрами и многое другое. Вы получаете персонализированное решение, которое мы адаптируем под ваши требования и процессы. Ваше видение — наша реализация.</p>',8,'ru'),(11,'Creatio CRM','Единая система CRM Creatio для максимальных результатов в сфере продаж, маркетинга и обслуживания клиентов','<p>CRM система Creatio - это продукт позволяющий добиться автономности сразу по нескольким направлениям: продажи, маркетинг и обслуживание клиентов. Главный показатель Creatio это low-code платформа, она дает возможность полностью адаптировать интерфейс под ваши запросы и автоматизировать процессы, значительно ускоряя гибкость и скорость изменений под растущие объемы. Сложные и трудоемкие задачи можно решить с помощью искусственного интеллекта, который возьмет на себя глубокий анализ и прогнозирование. </p>',10,'ru'),(12,'INTRUM','Гибкая и адаптивная CRM, позволяющая работать с каждый клиентом по четкой схеме, что бы ничего не упустить. ','<p>Intrum это созданная CRM для риелторов и агентств недвижимости, юридических компаний, автомобильных салонов и торговли, которая имеет инструменты для\r\nсоздания своего сайта или удачно интегрируется в уже существующий. Для\r\nповышения конверсии на платформе есть возможность вести учет и контроль\r\nрасходов на рекламу, отслеживание публикаций, настроить получение отчета о прочтении\r\nписьма или презентации. Так же Intrum позволяет создавать отчеты по собственной метрике эффективности, с последующей настройкой вывода отчетов на рабочие столы сотрудников, в зависимости от их задач и должностей.</p>',11,'ru'),(13,'retailCRM','retailCRM позволяет упростить работу и не упустить клиента открывая перед вами единое окно для обработки заказов, консультаций и коммуникаций ','<p>Выбирая retailCRM вероятность упустить\r\nзапрос от клиента сводится к нулю, потому что буквально все запросы, как онлайн,\r\nтак и офлайн стекают в одно окно. Платформа позволяет отслеживать остатки на\r\nскладах, управлять перемещениями, всегда иметь доступы к аналогам товаров. retailCRM\r\nдает возможность управлять курьерской доставкой, добавлять собственных курьеров\r\nи отслеживать статус доставки, мгновенно рассчитывая стоимость. Оплаты так же\r\nподлежат полному контролю, с возможностью частичной оплаты разными этапами, зафиксировав\r\nчеки оплаты в карточках заказов.</p>',12,'ru'),(14,'Мегаплан','Надежная CRM система для командной работы, с автоматизированной рутиной','Мегаплан это надежная система, название которой\r\nговорит само за себя. Помимо стандартного набора полезных инструментов, платформа\r\nидеально подходит для командной работы, от постановки задачи и распределения между\r\nсотрудниками, до учета времени и конечной отчетности. Вся рутина\r\nавтоматизирована, что значительно экономит время и повышает эффективность. ',13,'ru'),(15,'CRM SalesMax','CRM, которая в разы увеличит качество и скорость работы','<p>CRM SalesMax - это система, которая содержит в себе возможно коммуникаций с клиентом, историю общения, отчеты и документооборот. Идеальна для работы в команде, значительно увеличивает скорость и качество работы совместно с интеграцией ЭДО Аналитика. </p>',14,'ru'),(16,'Microsoft Dynamics CRM','CRM, интегрированная со всеми сервисами и приложениями Microsoft','<p>CRM, интегрированная со всеми сервисами и приложениями Microsoft, содержит в себе разделы работы с маркетингом, продажами и поддержки клиентов. Интуитивный интерфейс и надежность компании проверенной временем.  <span></span></p>',15,'ru'),(17,'YCLIENTS','Автоматизированная CRM в сфере услуг с функцией онлайн-записи ','<p>YCLIENTS - автоматизированная система коммуникаций с клиентом, позволяющая вести онлайн запись клиентов и не расходовать их время. Данная система включает в себя лучший опыт лидеров рынка и легкость в использовании.  </p>',16,'ru'),(18,'Клиентикс','Простая в использовании CRM система, созданная специально для любого бизнеса, где нужно вести запись клентов','<p>Программа отвечает всем запросам современного пользователя, в том числе наличием интеграций с различными сервисами. Понятный и удобный Журнал записи, который можно настроить под себя с помощью инженеров внедрения, обширный раздел аналитики, где можно получить большую часть информации, значительно повышающий результативность. </p>',17,'ru'),(19,'Tallanto','CRM-система Tallanto - программное обеспечение для учебных центров, рекламы и маркетинга','<p>Tallanto это обширная платформа для небольших и крупных учебных центров. Интеграция с большим количеством сервисов делает программу оптимизированной и комфортной в пользовании. Отчеты о поступлении и списании финансов, расчет заработной платы, отчеты о поступлении новых учеников, доходы за определенный период и аналитика активности пользователей значительно упростят прогнозирование, заметно повысив показатели. </p>',18,'ru'),(20,'Brizo','Brizo CRM предоставляет финансовый анализ сделок, позволяет планировать и оценивать сделки по прибыли. CRM система плюс управленческий учет','<p>Brizo — это CRM с полноценным управленческим учетом, индикаторы карточки сделки визуально акцентируют ваше внимание на тех карточках, которые требуют вашего внимания именно сейчас. Благодаря тесной интеграции функций CRM c сервисом управленческого учета, вы получаете расширенный функционал для оценки эффективности бизнеса по прибыли, а не по обороту.</p>',19,'ru'),(21,'FrontPad','FrontPad система для оптимизации работы ресторанов, кафе, службы доставки ','<p>Программа для автоматизации службы доставки, розницы, кафе или бара. Удобный интерфейс для создания заказов и ведения складского учета, автоматическая привязка клиента по номеру телефона или скидочной карте. Система автоматического распределения заказов по зонам доставки и курьерам. Возможность создания каталога товаров, сырья и выгрузкой с помощью Excel файла. Автоматические SMS уведомления о статусе заказа для клиента. </p>',20,'ru'),(22,'LP-CRM','CRM-система для продаж физических товаров через одностраничные сайты и интернет-магазины','<p>Весь ваш бизнес в одном окне. Избавьтесь от ежедневной рутины и обрабатывайте заказы в пару кликов. Контролируйте отправки и проводите массовые действия с заказами за считанные секунды. Выставляйте автосмену статусов и в зависимости от статуса ТТН, заказ автоматически перемещается по CRM. Вы всегда будете понимать, на каком этапе находится обработка заказа, допустить ошибку и упустить заказ попросту невозможно.<span class=\"redactor-invisible-space\"> При необходимости посчитать зарплату сотруднику, узнать средний чек клиента или посчитать маржу достаточно нажатия пары кнопок. При построении статистики отображается удобный график, по которому легко ориентироваться. К тому же, статистика считает допродажи и их сумму.<span class=\"redactor-invisible-space\"></span></span></p>',21,'ru'),(23,'HOLLIHOP schoolmaster','CRM для профессионального управления образовательного центра любого типа ','<p>HOLLIHOP schoolmaster – это удобная CRM-система для профессионального управления учебным центром любого типа. Платформа подходит для учебных и образовательных центров, центров подготовки к экзаменам, языковым курсам, учебным и образовательным центрам дополнительных навыков. Осуществлять продажи становится легко, опираясь на расписание, как это удобно учебным центрам. Продажи – это набор в группы. Hollihop вдвое сократит время, которые вы тратил на управление школой, ведение групп и оплаты. Для учеников дополнительно создано мобильное приложение</p>',22,'ru'),(24,'U-ON Travel','U-ON Travel профессиональная CRM для туристических фирм','<p>Профессиональная платформа для туристических\r\nкомпаний, с полным спектром необходимых смс-рассылок, начиная от напоминания обновить\r\nпаспорт до поздравления с днем рождения. Программы лояльности и личный кабинет\r\nтуриста помогут рабочим отношениям выйти на новый уровень доверия. Система\r\nпомогает менеджерам не выполнять однотипные операции и не позволяет забыть\r\nсовершить какое-либо действие, а руководителю - иметь контроль над ошибками\r\nменеджеров. Необходимо настроить процесс лишь раз и больше не переживать за качество работы.</p>',23,'ru'),(25,'Salesforce CRM','Salesforce — CRM-платформа, которая помогает автоматизировать и упростить выполнение задач по продаже, обслуживанию, маркетингу, анализу и связям с клиентами','<p>Автоматизация процесса продаж помогает ускорить рутинные операции, определить нерентабельные каналы и снизить затраты на привлечение клиентов.CRM-система помогает отслеживать показатели эффективности работы менеджеров отдела продаж, например, сумма контрактов, количество сделок, качество контактов с клиентами.<span class=\"redactor-invisible-space\"></span></p>',24,'ru'),(26,'FreshOffice','CRM FreshOffice поможет собрать детальную информацию, эффективно управлять продажами и контролировать работу каждого сотрудника, фокусируясь на самом важном','<p>FreshOffice дает очень широкие возможности управления компанией, а так же для ее продвижения. Рекламные компании можно запускать сразу после регистрации, разные рекламные объявления для каждой аудитории, в зависимости от типа компании в базе данных CRM, стадии сделки, статуса документа, проекта или даже задачи. </p>',25,'ru'),(27,'ELMA365 CRM','ELMA365 отлично подходит для организации процессов продаж. Стандартный для CRM механизм  воронок продаж дополнен бизнес-процессами продаж, что дает большую прогнозируемость  действий и надежный механизм связи отдела продаж с другими департаментами компани','<p>ELMA365 CRM которая идеально подходит для выстраивания длительных, а далее наиболее доверительных отношений с клиентом. Процессы ведут менеджера по всем этапам воронки, гарантируя своевременное выполнение каждого шага: от первого контакта до получения оплаты и закрывающих документов. Конструктор бизнес-процессов позволяет быстро настроить и отредактировать цепочку действий для каждого процесса продаж. Для быстрой реакции на возникновение узких мест система отслеживает движение сделок и в любой момент может показать динамику продаж за выбранный период.</p>',26,'ru'),(28,'Pipedrive','Pipedrive CRM система, которая показывает что оптимизировать рабочий процесс внутри организации – реально и доступно, особенно в digital-маркетинге','<p>Система для управления продажами малого и среднего бизнеса. Можно планировать и отслеживать сделки, управлять воронками продаж, анализировать заказы. Pipedrive легко настроить под свой бизнес, добавляя и убирая модули в окне. Инструмент, который создан не только для управления продажами, но и для маркетологов, имеющих важное значение в развитии компании. Современный диджитал невозможен без аналитики, а CRM-системы дают возможность анализировать каждый шаг в работе, плюс интегрировать работу – с сайтом и телефонией. </p>',27,'ru'),(29,'Zoho CRM','Автоматизируйте ежедневные бизнес-задачи и сконцентрируйтесь на развитии предварительных контактов, заключении сделок и увеличении прибыли.','<p>Zoho CRM — это многофункциональная система, которая даёт управление в продажах, маркетинге, поддержке клиентов. Благодаря учетной записи Zoho CRM вы получаете доступ к целому набору продуктов и служб Zoho - от онлайн-хранилища данных и средства проведения веб-конференций до других бизнес-продуктов, включая приложения для управления проектами, проведения маркетинговых кампаний по электронной почте и многих других. </p>',28,'ru'),(30,'StreamCRM ','StreamCRM это свыше 100 готовых решений оптимизирования работы сотрудников и повышения показателей','<p>Основная цель StreamCRM заставить работать слажено большой механизм компании, в который входит маркетинговый отдел, своевременная отчетность, этапы продаж и построений взаимоотношений с клиентами. Используя StreamCRM вы оптимизируете ряд процессов, которые значительно повысят ваши показатели: индивидуальные карточки клиентов, поддающиеся редактированию, автообзвон с проигрыванием записей голосовых сообщений для клиентов, но главный приоритет StreamCRM заключается в телефонии, широчайший функционал ответит любому запросу в области IP телефонии. Вся программа построена так, чтобы вы могли снизить нагрузку менеджеров, каждый день улучшая клиентский опыт. </p>',29,'ru'),(31,'Альфа CRM','Альфа CRM - простой интерфейс программы предоставляет обширные возможности в сфере образования','<p>Альфа CRM – создана с целью облегчить работу в области предоставления знаний и новых навыков. Систему можно использовать для онлайн школ и преподавания физически. Весь функционал адаптирован под специфику в сфере обучения, не теряя легкость и удобность интерфейса. Программа предоставляет полное сопровождение клиента, в том числе заметки в журнале посещаемости. Система так же позволит вам рассчитывать стоимость занятий и просматривать остаток на балансе учащегося, Альфа CRM так же может учитывать скидки и бонусные системы. Эта программа значительно облегчит рутинные задачи и менеджерам, и преподавателям, и руководителям частных школ, образовательных центров, спортивных секций и музыкальных школ. </p>',30,'ru'),(32,'ListOk','ListOk - CRM система с большим опытом в сфере фитнес индустрии ','<p>ListOk – CRM система с многолетним опытом по оптимизации работы в сфере фитнес индустрии, предоставляет возможность проводить занятия дома, через онлайн-трансляцию в приложении, иметь удобное приложение для пользователей, отслеживать посещения в журнале и срок абонемента</p>',31,'ru'),(33,'WireCRM','​WireCRM - гибкий конструктор, с возможностью добавления необходимых модулей, расширяя функционал ','<p>WireCRM – это буквально конструктор CRM, в который можно внедрить более 100 модулей и соответственно, создать систему которая будет подходить именно специфике вашей компании. Основное направление программы – продажи и работа с клиентами. Настолько широкий спектр функций позволяет выбрать несколько самых нужных и использовать только их</p>',32,'ru'),(34,'Hubspot CRM','Hubspot CRM - автоматизирует все рутинные задачи и обладает своей маркетинговой площадкой','<p>HubSpot - это передовая платформа управления взаимоотношениями с клиентами (CRM), которая включает современное программное обеспечение и поддержку, помогает компаниям развивать бизнес, быть успешными и эффективными.Платформа включает в себя продукты для маркетинга, продаж, обслуживания и управления веб-сайтами, которые масштабируются для удовлетворения потребностей клиентов на любой стадии роста.</p>',33,'ru'),(35,'Smarty CRM','Smarty CRM—это инструмент общения команд, которые понимают, что работа требует большего, чем следить за сообщениями в групповом чате.','<p>Создавайте напоминания и задачи, не выходя из чата. Добавляйте в избранное важные сообщения и диалоги. Загружайте документы, картинки, файлы и всё, что необходимо для продуктивного взаимодействия. Больше нет необходимости использовать сторонние приложения для общения. Пригласите своих сотрудников. Обсуждайте проблемы. Делитесь идеями. Получайте обратную связь. Подробно обсуждайте вопросы, которые по-настоящему двигают дело вперед.<span class=\"redactor-invisible-space\"></span></p>',34,'ru'),(36,'CLOFF CRM','CLOFF CRM — это система управления взаимоотношениями с клиентами. Ее главная задача — сокращение производственных затрат при одновременном увеличении дохода компании и повышении лояльности целевых потребителей.','<p>Облачные сервисы для бизнеса CLOFF закрывают все ИТ-потребности предприятий разного профиля и не требуют больших финансовых затрат.</p><p>Облачное рабочее место полностью готово к использованию, его функционал позволяет эффективно работать из любой точки мира и всегда оставаться на связи с клиентами.</p><p>Подключение, настройка и техническое сопровождение облачных решений для малого бизнеса — забота нашей компании. <br><br>Доступны с любого устройства. Главное условие — интернет-связь. Вся необходимая информация у вас под рукой, когда вы в офисе, дома, в командировке, в отпуске.</p>',35,'ru'),(37,'JokerCRM','Функциональная CRM система для агентства недвижимости с готовым сайтом, специально разработанные в сотрудничестве со специалистами сферы недвижимости.','<p>Вам будет доступна широкая возможность настройки CRM системы под свои задачи. Подключаемые модули и множество интеграций реализуют все потребности в работе всего агентства недвижимости и каждого сотрудника. CRM система содержит множество интеграций: телефония, мессенджеры и социальные сети, квизы и онлайн-консультанты, электронная почта и конструкторы сайтов. Также реализован собственный API с широкой функциональностью. Подключайте необходимые модули самостоятельно. CRM система уже настроена на автоматическое обновление, поэтому все новые модули будут доступны в вашей CRM системе - вам останется только их активировать.<span class=\"redactor-invisible-space\"></span></p>',36,'ru'),(38,'HomeCRM','HomeCRM - мультилистинговая CRM-система для автоматизации бизнеса риэлторского агентства.','<p>В CRM реализован весь функционал, который потребуется для успешной работы: от поиска клиента до заключения сделки. Интуитивно понятный интерфейс поможет за считанные минуты выполнить действия, которые без CRM заняли бы достаточно много времени. Составляйте оперативные подборки недвижимости в зависимости от пожеланий клиента прямо на карте! Найдите необходимый район, оцените инфраструктуру (на карте для удобства выведены аптеки, школы, больницы, детские сады, магазины и др.), нажмите на значок объекта и тут же посмотрите фотографии объекта вместе с краткой информацией по объекту.</p>',37,'ru'),(39,'Vtiger CRM','CRM-система Vtiger all-in-one дает вам возможность согласовать ваши команды маркетинга, продаж и поддержки с едиными данными о клиентах на базе One View.','<p>Фрагментированные данные о клиентах приводят к потерянным сделкам и оттоку клиентов. Это не ваша команда, это разрозненные инструменты, которые они используют. Vtiger объединяет все ваши команды на одной странице на каждом этапе пути к покупке. Управляйте маркетинговой деятельностью по всем каналам, чтобы привлекать идеальных клиентов. С One View вы согласовываете маркетинг и продажи с учетом общего взгляда на клиента. Увеличьте рентабельность инвестиций в свои кампании по привлечению потенциальных клиентов. Используйте мощные возможности социального и электронного маркетинга для привлечения потенциальных клиентов.</p>',38,'ru'),(40,'Контур.CRM','Главная цель Контур.CRM - автоматизация и контроль продаж. Интуитивно понятная CRM-система для отделов продаж.','<p>Контур.CRM — это технологичный инструмент для работы с продажами. В отличие от некоторых других CRM, сервис работает сразу после внедрения. Назначайте задачи, отслеживайте выполнение плана, анализируйте конверсию, прослушивайте звонки и ведите базы. Благодаря простому интерфейсу работать в системе сможет каждый сотрудник. Заказы со всех источников попадают в единый список и автоматически распределяются между менеджерами. Лиды не потеряются.<span class=\"redactor-invisible-space\"> CRM создает сделки при входящем вызове, назначает перезвон после пропущенного звонка и напоминает менеджерам о ближайших задачах.<span class=\"redactor-invisible-space\"></span></span></p>',39,'ru'),(41,'OTC-CRM ','OTC-CRM - не просто способ связи с клиентами, а полный набор инструментов, которые автоматизируют поиск клиентов и контроль над сроками, приводят в порядок тендерные продажи и повышают шансы на победу в тендерах.','<p>OTC-CRM подберет тендеры исходя из ваших настроек и истории продаж, сообщит обо всех этапах выбранных вами тендеров. OTC-CRM содержит полную базу заказчиков, осуществляющих закупки в соответствии законами. Вся контактная информация заказчиков в вашем распоряжении. Заказчики составляют планы закупок на год и размещают их Единой информационной системе. Эта информация доступна всем, но за ней трудно уследить. OTC-CRM будет уведомлять вас о тендерах в вашей отрасли.<span class=\"redactor-invisible-space\"></span></p>',40,'ru'),(42,'EnvyCRM','EnvyCRM - система созданная на основе многолетнего опыта, с учетом всех проб и ошибок. ','<p>EnvyCRM - помимо основных функций CRM системы, обладает рядом деталей, которые значительно упрощают работу. Например, больше не нужно гуглить часовой пояс клиента, если он находится в другой стране. Задачи выставляются теперь автоматически, в том числе на каждый час и по каждому клиенту. С помощью управления процессом продаж кнопками ваш менеджер тратит меньше времени на рутиные операции и успевает сделать больше продаж и денег.<span class=\"redactor-invisible-space\"></span></p>',41,'ru'),(43,'Binotel','Binotel - ведущий оператор бизнес-коммуникаций в Украине. Продукты Binotel используют 20 тыс. компаний в ежедневной работе, 1.6 млн. человек каждый день общаются через сервисы Binotel,  100 млн звонков проходит через АТС Binotel ежемесячно.','<p>Продукты Binotel покрывают все основные каналы коммуникаций с клиентами, автоматизируют процессы и повышают эффективность работы сотрудников. <br><br>Виртуальная АТС - для эффективной работы со звонками в отделе продаж <br>Binotel GetCall - для повышения количества обращений с сайта <br>Binotel Call Center - для грамотной обработки большого потока звонков <br>Binotel Call Tracking - для повышения эффективности вашей рекламы <br>Binotel Smart CRM - для учета лидов и клиентов <br>Binotel Wire - для работы с умной телефонией на мобильном <br><br>Каждый продукт уникален и сам по себе является готовым самостоятельным решением для реализации поставленных задач. <br>При объединении и использовании всех сервисов Binotel в работе Вы получаете мощную платформу для коммуникаций с клиентами. <br><br>Вся линейка продуктов Binotel создана для того, чтобы компании, которые используют ее в своей работе, получали больше продаж, больше довольных клиентов и максимум выгоды. </p>',42,'ru'),(44,'Ringostat','Ringostat, в отличие от аналогичных платформ, получает ту же информацию, что и Google Analytics. За счет этого данные нашей платформы максимально близки к информации из системы, которой доверяют digital-маркетологи всей планеты.  Помимо этого Ringostat пр','<p>В Ringostat вы видите данные о переходах на основе статистики Google Analytics, которой доверяют маркетологи всего мира. Вы сможете анализировать в Google Analytics более 10 разновидностей событий, которые передает Ringostat. С Ringostat вы также сможете передавать в эту систему и просмотры страниц</p>',43,'ru'),(45,'Zadarma','Zadarma — это международная группа компаний, работающая в сегменте телекоммуникаций с 2006 года. Наши знания, накопленный опыт и созданная инфраструктура лежат в основе премиум-решения облачных услуг связи. Сервис Zadarma сегодня — это десятки тысяч актив','<p>Мы выставляем максимальные требования качества и надежности к нашей инфраструктуре:</p><ul><li>7 основных дата-центров в 7 странах на трех континентах (Европа, Америка, Азия) и множество меньших площадок.</li><li>Все основные дата-центры подключены минимум к двум внешним каналам и точкам обмена трафиком (IX)</li><li>Внутри каждого дата-центра используется полное резервирование (сервисов, серверов, питания, сетевой инфраструктуры). Также резервирование происходит между дата-центрами.</li><li>Для максимального качества работы трафик идет через ближайший дата-центр</li></ul>',44,'ru'),(46,'Казтехносвязь ','Для Вашего успеха мы создали наш продукт - надежный, эффективный и недорогой. Мы станем Вашим партнером и поможем Вам на пути к успеху! Вы - предприниматель, а это значит, что Вы смелый человек, который понимает свой риск, разрабатывая свой продукт или се','<p>Наш опыт помог нам осуществить идею доступного и простого сервиса для предпринимателей. В итоге он успешно выполняет работу для Вашего бизнеса!Мы создали продукт, который не требует от пользователя глубоких знаний в области телекоммуникаций. Он имеет доступную цену и прост в настройке. А наши отзывчивые специалисты всегда готовы прийти на помощь.<span class=\"redactor-invisible-space\">Технологии не стоят на месте, и наши специалисты постоянно развивают наш продукт, внедряя самые последние, эффективные и востребованные технологии.<span class=\"redactor-invisible-space\"></span></span></p>',45,'ru'),(47,'Voip.kz','Наша компания поможет:  Подключить городские номера Казахстана Возможность экономии на все звонки Подсоединять SIP услугу Установить и использовать программу абсолютно бесплатно','<p>Наша платформа VOIP.KZ позволяет Вам бесплатно совершать звонки внутри сети, внутри Ваших филиалов как по внешним так и по внутренним номерам.</p><p>Вам всего лишь необходимо связаться с менеджером и заполнить заявку на подключение. Подключение городской связи всего за один день. Наш сервис даёт возможность подключения по четырём разным способам: IP телефон, IP шлюз (SoftPhone),установить программу на свой планшет или на свой мобильный телефон. Вы сможете подключить <strong>IP телефонию</strong> в городах: <strong>Нур-Султан</strong><strong>, Семей, Алматы, Актау, Петропавловск, Актобе, Тараз, Уральск, Усть-Каменогорск, Атырау, Шымкент, Караганда и Павлодар. </strong>Наша компания предоставит вам связь, используя новейшие технологии VOIP, мы решим любые поставленные технологические задачи, сэкономим ваше время, внедряя новые технологии, для решения сложных задач кликом одной клавиши.</p>',46,'ru'),(48,'TILDA CRM','Tilda CRM помогает небольшим компаниям увеличивать количество проектов и вести их без спешки ','<p>Tilda CRM можно использовать без обучения. Подключите систему к сайту и добавьте этапы воронки. Заявки из форм автоматически попадут в CRM со статистикой: откуда пришел клиент, что он делал на вашем сайте, как попал к вам впервые. Подойдет небольшим компаниям и частным предпринимателям, которым не нужен сложный набор функций классической CRM-системы.</p>',47,'ru'),(49,'KazNetCom','Для любого предприятия важно наладить качественную коммуникацию между сотрудниками, различными отделами и регионами компании, деловыми партнерами и клиентами. Компания «KazNetCom» предлагает простое, доступное по цене и эффективное решение — IP-телефония','<p>IP-телефония — выгодное и быстро окупаемое вложение, она позволяет быстро построить корпоративную телефонную сеть между офисами организации, включая географически отдаленные. В зависимости от потребностей компании вы можете так же приобрести услуги: <span class=\"redactor-invisible-space\">SIP номер — отличит ваш бизнес, запомниться в памяти и обеспечит удобство клиента,SIP транк — дает возможность подключить телефонные номера всех областей РК в одном SIP транке, как корпоративным клиентам, так и операторам связи.<span class=\"redactor-invisible-space\"></span></span></p>',48,'ru'),(50,'NLS Kazakhstan','NLS Kazakhstan единый оператор связи, предоставляющий полный спектр решений в области телекоммуникаций и информационных технологий, которые способны покрыть любые потребности как малого и среднего бизнеса, так и крупной корпорации.','<p>NLS Kazakhstan единый оператор связи, предоставляющий полный спектр решений в области телекоммуникаций и информационных технологий, которые способны покрыть любые потребности как малого и среднего бизнеса, так и крупной корпорации.</p><p>Все наши предложения строятся на принципе клиенториентированности и нацелены на снижение ваших затрат на телекоммуникации при увеличении качества потребляемых услуг и отсутствии сложных технических работ.</p>',49,'ru'),(52,'ИНФОРМСВЯЗЬ','ТОО «ИНФОРМСВЯЗЬ КАЗАХСТАН» основана в 2008 году. Компания имеет статус филиала крупнейшей инжиниринговой компании и ведущего системного интегратора России АО «ИНФОРМСВЯЗЬ ХОЛДИНГ».','<p>Основным направлением деятельности ТОО «ИНФОРМСВЯЗЬ КАЗАХСТАН», является дистрибуция продуктов и решений ведущих производителей телекоммуникационной отрасли. </p><ul><strong>Партнеры компании:</strong><br><li><em>Операторы мобильной и фиксированной связи;</em></li><li><em>Системные интеграторы; </em></li><li><em>Крупные корпоративные заказчики.</em></li></ul><p>Сегодня ТОО «ИНФОРМСВЯЗЬ КАЗАХСТАН» – компания, реализующая ИТ-проекты полного цикла от подключения удаленных объектов до построения полномасштабных инфокоммуникационных сетей корпоративного уровня. </p><p>Компетенции ТОО «ИНФОРМСВЯЗЬ КАЗАХСТАН» охватывают большую часть сегментов телекоммуникационного рынка и закрывают потребности заказчиков по созданию и модернизации ИТ-инфраструктуры, не ограничиваясь рамками одного производителя.</p>',51,'ru'),(53,'MINDSALES','Наша компания предлагает комплексное решение для внедрения CRM, поэтому нет необходимости закупать модули у разных поставщиков.Главная ценность от единого продукта - это точность данных для принятия управленческих решений.','',52,'ru'),(54,'KeyCRM','KeyCRM идеальна для продаж ','<p>KeyCRM идеальна для интернет-торговли за рубеж, подключайте все свои магазины в KeyCRM или смело открывайте их на новых платформах, потому что теперь они все будут доступны в одном окне. в программе уже есть интеграции с популярнейшими маркетплейсами. Отслеживать и отправлять посылки можно прямо в CRM - каждое отправление под вашим контролем. </p>',53,'ru'),(56,'Webasyst CRM','Поможет организовать работу с клиентами интернет-магазина на принципиально новом уровне, вести сделки, выставлять счета на оплату онлайн, общаться по телефону и через мессенджеры. ','<p>Мы переосмыслили работу с контактами и клиентами в экосистеме Webasyst и объединили всё, что необходимо в современной CRM-системе, в едином приложении. Сегментация клиентов, сделки, выставление счетов, портрет клиента, аналитика и многое другое — новые функции позволят видеть базу клиентов компании в разных плоскостях, контролировать отток клиентов и следить за ростом количества новых клиентов, заявок и продаж.</p>',55,'ru'),(57,'EURASIAN TELECOM ','Информация правит миром. Сегодня она не знает территориальных границ. Даже самые отдаленные уголки Земли могут быстро узнать, что происходит на другом конце планеты. Все это стало возможным благодаря активному развитию телекоммуникационных технологий. Инт','<p>Информация правит миром. Сегодня она не знает территориальных границ. Даже самые отдаленные уголки Земли могут быстро узнать, что происходит на другом конце планеты. Все это стало возможным благодаря активному развитию телекоммуникационных технологий. Интернет, телефон, телевидение приближают события, происходящие за сотни миль от вашего дома. Отказаться от научных достижений – значит изолировать себя от окружающей действительности. Этого современный человек не может допустить. Оператор связи EURASIAN TELECOM – ваш проводник в мир телекоммуникаций. Используя последние разработки в области телекоммуникаций, мы поднимаем качество телефонных и интернет сетей на совершенно новый уровень.<br></p><p>Услуги оператора связи EURASIAN TELECOM включают в себя все передовые достижения телекоммуникации:<br></p><p>- все виды телефонии (в том числе SIP и IP);<br>- выделенные каналы связи;<br>- создание корпоративных сетей;<br>- установка оборудования;<br>- видеонаблюдение;<br>- высокоскоростной Интернет;<br>- цифровое телевидение;<br>- организация VPN (виртуальной частной сети).</p>',56,'ru'),(58,'GEN CRM','GEN CRM идеальна для повышения качества и количества продаж ','<p>Эта CRM заточена под отдел продаж: есть клиентская база, можно анализировать до 36 показателей и интегрировать CRM с чем угодно, включая 1С и телефонию. Особенно удобна для проектных компаний в сфере услуг и интернет-магазинов.</p>',57,'ru'),(59,'LPTracker ','LPTracker - CRM система с сильной аналитической поддержкой','<p>CRM с расширенными возможностями аналитики: анализирует эффективность интернет-рекламы, звонков и сотрудников. Есть функции Callback, захвата посетителей, телефонии и т.д. Подходит для стартапов, фрилансеров и малого бизнеса.</p>',58,'ru'),(60,'Go-CRM','Go-CRM - это финансы, расписание, контроль сотрудников, клиентов, чаты, мессенджеры и нужная аналитика','<p>Go-CRM - простая и понятная автоматизация в сфере услуг. Удобный инструмент для сотрудников. Простой инструмент для директора - для управления центрами (сквозная аналитика по рекламе, предупреждение о кассовом разрыве, расчет зарплаты, чаты, телефония и многое другое). </p>',59,'ru'),(61,'Отеликс','Отеликс - CRM система для курортных и городских гостиниц','<p>Отеликс - упрощает и систематизирует работу, освобождая Ваше время. А также помогает ПРИВЛЕКАТЬ гостей. Максимальная автоматизация исключает большинство ошибок. Мы БЕСПЛАТНО настроим Отеликс под ваш отель / гостевой дом / пансионат или хостел.</p>',60,'ru'),(62,'Perfect CRM','Система автоматизации типографии, клиентская база, полиграфический калькулятор, калькуляция стоимости нанесения и брендирования, сувенирной продукции, технологические карты для офсета, планировщик задач и производства, бонусов от маржи, логистика','<p>Perfect CRM дает возможность крупным и малым компаниям объединить свои бизнес-процессы в едином информационном пространстве. В системе есть калькулятор, который рассчитывает и отображает стоимость печати всеми технологиями типографии и предлагает оптимальный вариант. </p>',61,'ru'),(63,'БИТ.BPM','BPM-система для автоматизации и управления процессами прямо в 1С. БИТ.BPM – решение для создания комплексных бизнес-процессов. Внедрение BPM-системы от 5 дней','<p><strong>Управление процессами прямо в вашей 1С</strong><br>Вам не нужно переключаться между окнами дополнительных программ. </p><p><strong>Готовые шаблоны процессов</strong><br>Готовы внедрить существующие процессы или разработать по вашему регламенту. Если регламента нет, мы поможем разработать.<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\"><strong>Автоматический запуск процессов по любым событиям вашей учетной системы</strong><br>В БИТ.BPM используется триггер-модуль, который автоматически отлавливает события и запускает бизнес-процессы.<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><strong>Открытый исходный код</strong><br>Если вдруг вам потребуется изменить исходный код БИТ.BPM, то вы сможете это сделать силами штатного программиста. Вы не зависите от решения разработчика.<span class=\"redactor-invisible-space\"><br></span></span></span></p><p><strong>Настройка процессов без навыков программирования (LOW CODE)</strong><br>Настройка бизнес-процессов реализуется в интуитивно понятном редакторе.<br></p><p><strong>KPI по настроенным процессам и автоматический контроль отклонений</strong><span class=\"redactor-invisible-space\"><br></span></p>',62,'ru'),(64,'Real Estate CRM','Система полного цикла для автоматизации рабочих процессов в сфере недвижимости с облачным размещением. В составе CRM предлагается готовый сайт для оставления заявок и нахождения объектов клиентами и прочих задач.','Real Estate CRM - это CRM система нового поколения, созданная в тесном сотрудничестве с риэлторским сообществом, пригодная для использования в разных странах мира, на различным языках, с возможностью настройки на любые бизнес-процессы. Система работает очень оперативно, оптимизируя все основные процессы. <span></span>',63,'ru'),(65,'Prime Source','Внедряем автоматизированную систему управления бизнес-процессами на базах IBM BPM и FICO BPM, чтобы банки и финансовые организации эффективнее управляли и улучшали процессы, добивались стратегических целей через моделирование, исполнение и контроль.','<p>Это платформа единого комплексного управления бизнес-процессами с эффективным набором инструментов для создания, тестирования и развертывания бизнес-процессов.</p><p>Prime Source — единственная казахстанская компания со статусом платинового партнёра IBM. Это позволяет нам предоставлять лучшие цены на рынке и обеспечивать клиентов качественными услугами и компетенциями.</p><p>Благодаря сформированной команде лучших специалистов мы добились минимальных сроков внедрения и максимальной скорости изменений time-to-market.</p>',64,'ru'),(66,'Voxlink','Более 800 станций и ни одной успешной попытки взлома. Миллионы обработанных вызовов, и тысячи дней бесперебойной работы сервера','<p>Дорогостоящие тарифы на связь</p><p>Снизим Ваши расходы на связь на 60 и более %: Стоимость звонков для Вас станет на мобильные по всему Казахстану - от 7 тенге, Межгород - от 15 тенге </p><p>Одноканальная связь</p><p>Поможем перевести Ваш текущий номер в SIP или предоставим Вам многоканальный номер в коде любого города.</p><p>Теряются звонки</p><p>Настроим грамотную маршрутизацию вызовов согласно схеме работы Вашей компании. А так же переадресацию на мобильный, уведомления о пропущенных вызовах на почту и по sms.</p>Не ведется статистика вызовов<p>Установим оптимальную систему статистики для расчета качества работы ваших менеджеров<span class=\"redactor-invisible-space\"></span></p>Отсутствует запись звонков<p>Организуем ведение записи и хранение всех телефонных звонков компании.<span class=\"redactor-invisible-space\"></span></p>Низкий уровень обслуживания<p>Ваша клиентская база вырастет за счет повышения качества связи и обслуживания.<span class=\"redactor-invisible-space\"></span></p>Не окупается реклама<p>С установкой системы статистики и CRM системы Вы будете в курсе какая реклама действительно приносит прибыль и клиентов<span class=\"redactor-invisible-space\"></span></p>Нет современных функций телефонии<p>Облегчим и упростим работу Ваших сотрудников с такими функциями как: перевод/перехват и удержание вызова, прослушивание вызовов в реальном времени, суфлирование и т.д.<span class=\"redactor-invisible-space\"></span></p><p><br></p>',65,'ru'),(67,'CrystalSpring','Управление бизнес‐процессами является ключевой задачей автоматизации в любой крупной организации, однако большинство автоматизированных систем фокусируются лишь на части бизнес‐процессов, например бухгалтерском учёте или управлении отношениями с клиентами','<p>Сильные стороны решения Crystal Spring SpringDoc:</p><ul><li>Базируется на промышленном решении Oracle, однако значительно доработано с учетом длительного опыта внедрения решения на казахстанском рынке.</li><li>Ориентировано на быструю разработку, внедрение и последующее поддержание бизнес‐процессов.</li><li>Умеренные требования к уровню обслуживающей команды.</li><li>Имеет локализованный интерфейс.</li><li>Команда разработчиков находится в Казахстане.</li><li>Конкурентная стоимость владения системой и гибкие варианты финансирования проектов.</li></ul><p>BPM SpringDoc является  системой управления бизнес‐процессами промышленного уровня, позволяющей одновременно автоматизировать сотни бизнес‐процессов с участием несколько тысяч пользователей.</p>',66,'ru'),(68,'BusinessProcess','- Современный инструмент для управления бизнес процессам. - Рекомендации по дальнейшему развитию BPM в компании. - Настроенная система, автоматически отправляющая задания ответственным сотрудникам в точном соответствии с порядком выполнения операций, указ','<h5>Описание услуги</h5><p>- Глубоко погружаемся в основные бизнес-процессы клиента.<br>- Выявляем проблемные места и предлагаем современные решения.<br>- Анализируем рабочую модель процессов \"как есть\". После анализа задач клиента, подбираем оптимальную BPM-систему (СЭД) для автоматизации.<br>- Подключаем дополнительные сервисы.<br>- На основании описанной блок-схемы наши специалисты перенесут логику вашего бизнес-процесса в рабочую систему.<br>- Презентуем настроенный бизнес-процесс, запускаем совместно с клиентом, проводим тестирование, при необходимости «докручиваем». Доводим работу с процессом до полной адаптации и принятия сотрудниками Заказчика.</p>',67,'ru'),(69,'2Курс CRM','2Курс CRM - система для управления и учета в сфере образования и спорта','<p>2Курс - CRM для школ, учебных и детских центров. Очень понятная и простая система управления: ученики, расписание, записи, учет посещений и оплат, журнал, финансы, расчет зарплаты, рассылки смс и емейл и многое другое. Кабинет ученика и преподавателя, онлайн-уроки.</p>',68,'ru'),(70,'ELMA365','BPMS (business process management system) — это класс корпоративных информационных систем для оцифровки бизнес-процессов. Они позволяют компании быть гибкой и быстро реагировать на изменения рынка. С помощью BPM-системы можно моделировать бизнес-процессы,','<p>Для моделирования используется современная международная нотация BPMN 2.0. Она позволяет составлять схемы даже очень сложных бизнес-процессов в понятной форме. Законченная схема демонстрирует логику процесса, его участников и последовательность их работы.</p><p>Как только схема будет готова, определяются данные, с которыми будут работать участники процесса. Указывается, откуда и как эти данные попадут в процесс. Эта информация потребуется исполнителям для выполнения задач и принятия мотивированных решений.</p>',69,'ru'),(71,'docsvision','Платформа Docsvision представляет класс CSP (Content Service Platform) решений, который включает в себя BPM-подсистему для управления сквозными бизнес-процессами. Cовместно с партнёром-интегратором Digital Design Docsvision входит в ТОП крупнейших поставщ','<p>Этап выполняется силами бизнес-аналитиков при помощи штатного <a href=\"https://docsvision.com/ecm-bpm/functional/tools/konstruktor-biznes-protsessov/\"><strong>конструктора BPM-системы</strong></a> с дизайн-элементами. Проектирование с помощью блок-схем считается наиболее популярным вариантом, который можно быстро проанализировать и скорректировать. На модели выстраивается бизнес-логика и последовательность шагов. Также определяются необходимые входные данные для старта процесса, пользователи или другие процессы, которые их передают. Результат моделирования – готовый процесс, который сразу можно запустить. Важно отметить, что бизнес-аналитикам не нужно прибегать к помощи программистов, так как все работы выполняются стандартными инструментами BPM-системы.</p>',70,'ru'),(72,' LokonCRM','LokonCRM - автоматизация работы салона красоты и барбершопа.','<p>Онлайн сервис для управления салоном красоты ведет клиентскую базу, запись клиентов, детальную статистику по разным направлениям. Доступен SMS центр и другие модули. Для повышения лояльности клиентов, вы можете установить \"Кэшбэк\" на ваши услуги. Система автоматически произведет расчет посещений, покажет в карточке записи размер накопленного кешбэка и предложит списать данную сумму в зачет оплаты услуг. Размер кэшбэка, дату начала программы и применимость к конкретному салону, вы определяете самостоятельно.</p><p><a href=\"https://lokoncrm.ru/news/programma-loyalnosti-dlya-salona-krasoty/\"></a></p>',71,'ru'),(73,'YurCRM','YurCRM -система разработанная совместно с несколькими юридическими компаниями специально для юридической деятельности.','С определением – что такое CRM, часто возникают проблемы: его описывают сложными техническими терминами, в то время как по своей сути это программа для управления бизнесом, а если еще проще то управление клиентской базой и взаимодействием с ней. Конечно, это вовсе не так просто, ведь CRM настолько совершенны, что способствуют увеличению прибыли на 20-30% и снижению издержек. Благодаря привлечению к разработке практикующих юристов, программа учитывает все тонкости специфики и успешно оптимизирует рабочий процесс.',72,'ru'),(74,'MegaCRM','CRM-система для бизнеса, призванная упорядочить все элементы организации в одном окне.','<p>MegaCRM — инструмент, призванный собрать и упорядочить все элементы бизнеса в цельную картину, упростить, оптимизировать работу компании и повысить продажи. Система в которой все сохраняется, а не распределяется по разным программам.</p>',73,'ru'),(75,'ПЛЮСОФОН','Проект «Плюсофон» предоставляет услуги IP-телефонии для бизнеса и частных лиц с 2012 года.','<p>Мы обслуживаем 80 000 активных номеров и обрабатываем 90 миллионов минут голосового трафика в месяц. Собственные узлы связи в 55 крупных городах России позволяют обеспечить наших клиентов надежной междугородной и международной связью. Свободная номерная емкость — 500 000 номеров. Все номера доступны для подключения онлайн.</p><p>Понимая, что надежная и экономичная телефонная связь жизненно важна для любой компании, вместе с IP-телефонией мы предлагаем доступ к полезным сервисам. Облачная АТС, виртуальные номера, сервис СМС-ответ, SIP-trunk, сделают бизнес более эффективным.</p><p>Наши сервисы легко интегрировать с внутрикорпоративными SaaS-проектами, ориентированными на маркетинг и продажи. Открытый API, позволит быстро настроить взаимодействие стороннего ПО с интеллектуальной коммуникационной платформой «Плюсофон».</p><p>Хотите, чтобы офисная телефония «просто работала» независимо от размера компании, отрасли или предъявляемых требований? Наши специалисты помогут организовать современную телефонную связь в офисе за один рабочий день.</p><p>«Плюсофон» предоставляет услуги по конкурентоспособным ценам, обеспечивая все коммуникационные потребности предприятия. Наши тарифы подойдут и индивидуальному предпринимателю, и большой корпорации, требующей нестандартных решений.</p><p>Знания, опыт, развитая технологическая инфраструктура делают «Плюсофон» надежным партнером для компаний, которые хотят вывести коммуникацию с клиентами и партнерами на новый уровень и расширить возможности бизнеса, используя современные цифровые технологии.</p>',74,'ru'),(76,'JoyWork','В каждый период времени благодаря CRM удается заключить больше сделок, что повышает общую прибыльность бизнеса. Это актуально для любой сферы рынка, но особенно — для недвижимости и других областей, где регулярно приходится работать с большими объемами то','<p>CRM-система упрощает процессы: достаточно кликнуть на имя клиента, чтобы открылась карточка с полной информацией по работе с ним. Можно прослушать записи звонков, посмотреть переписку, оформить документы по шаблону (тратя меньше времени), связаться с клиентом (собственником недвижимости или покупателем) удобным способом: по телефону, по смс, по электронной почте и так далее. Удобство CRM в том, что агентам по недвижимости не нужно вручную пересылать друг другу информацию о клиентах. Все данные, от имени и фамилии до хронологии выполненных запросов, сразу отображается в карточке. Базу по недвижимости и по клиентам CRM автоматически поддерживает в упорядоченном виде, так что можно не бояться запутаться в новой информации.<span class=\"redactor-invisible-space\"> </span></p>',75,'ru'),(77,'ТЕЗИС ','BPM-система для автоматизации и управления процессами прямо в 1С. БИТ.BPM – решение для создания комплексных бизнес-процессов. Внедрение BPM-системы от 5 дней','<p>Команда СЭД ТЕЗИС готова подключиться на любом этапе и выполнить любой объем работ. Проведем обследование бизнес-процессов, реализуем функциональность по запросу, установим систему электронного документооборота, обучим пользователей, предоставим техническую поддержку, займемся развитием проекта после запуска.Система управления документами и задачами ТЕЗИС представляет собой готовое решение для организации электронного документооборота, а также автоматизации делопроизводства и управления бизнес-процессами, включая контроль исполнения поручений.</p>',76,'ru'),(78,'Comindware Business Application Platform','Современная low-code платформа для максимально быстрого построения цифровых решений для основных функций организации. Цифровая эпоха меняет требования к корпоративным приложениям. Скорость изменения бизнес-среды многократно превосходит скорость изменения ','<p>Comindware Business Application Platform — цифровая платформа для широкого спектра бизнес-приложений, полностью соответствующая требованиям цифровой эпохи и концепции Low-code. Благодаря гибкости графовой архитектуры, рекордной скорости создания приложений, непосредственному вовлечению в разработку бизнес-аналитиков и людей бизнеса, пользовательскому интерфейсу на уровне лучших онлайновых сервисов и развитым средствам интеграции Comindware Business Application Platform является идеальным фундаментом для цифровой трансформации предприятия.</p>',77,'ru'),(79,'EOS of SharePoint','EOS for SharePoint – продукт, созданный на базе платформы Microsoft SharePoint. Система включена в Реестр отечественного ПО ( Приказ Минкомсвязи России от 09.03.2017 №103). Полная поддержка бесплатной версии Microsoft SharePoint Foundation.','<p>Система отображает все статусы по задачам и документам — таким образом исчезает необходимость в дополнительных встречах и многочисленных электронных письмах. EOS for SharePoint интегрирует движение документов в сквозные бизнес-процессы и избавляет сотрудников от рутинных операций. Работая в EOS for SharePoint, каждый член команды знает, что делать и как его работа связана с задачами коллег. Новые участники могут сразу же получить доступ к необходимой информации — файлы, история обсуждений, взаимодействия сотрудников хранится в системе.</p>',78,'ru'),(80,'Pyrus','Pyrus — это коммуникационная low‑code платформа для управления задачами и бизнес‑процессами.Pyrus Service Desk обеспечивает работу 24/7 омниканального контакт-центра ivi Онлайн-кинотеатр № 1 выбрал Pyrus для работы со своими клиентами.','<p>Моментальная постановка задачи</p><p>Появилась идея? Создайте задачу, поставьте цель, добавьте заинтересованных сотрудников, определите ответственного.</p><p>Как только вы нажимаете Отправить, задача попадает ко всем участникам. Команда сразу приступает к работе.</p><p>Структурированное общение</p><p>Общаться в Pyrus просто и удобно. Обсуждайте детали, обменивайтесь файлами внутри конкретной задачи.</p><p>Создайте задачу для нового проекта и добавляйте связанные задачи для обсуждения каждого этапа.Структурированное общение</p><p>Общаться в Pyrus просто и удобно. Обсуждайте детали, обменивайтесь файлами внутри конкретной задачи.</p><p>Создайте задачу для нового проекта и добавляйте связанные задачи для обсуждения каждого этапа.</p>',79,'ru'),(81,'Инталев: корпоративный менеджмент ','«ИНТАЛЕВ: Корпоративный менеджмент» — это инновационный продукт для автоматизации управления, объединяющий Стратегию, Финансы, Продажи и Персонал в единую систему.','<p>Для достижения целей компании необходимо иметь сильные продажи, эффективно управлять финансовыми ресурсами и внутренними бизнес-процессами, а также обладать результативным персоналом, реализующим вышесказанное.<span class=\"redactor-invisible-space\"></span>ИНТАЛЕВ: Корпоративный менеджмент» стоит методология бюджетирования, ориентированного на результат — БОР, что позволяет продукту автоматизировать и связать в единую вертикаль управления:</p>  <ul><li>Цели и ключевые показатели.</li><li>Реализуемые проекты и бизнес-процессы, которые ведут к достижению целей.</li><li>Имеющиеся и необходимые ресурсы (бюджетные и человеческие). </li></ul>      <p> «ИНТАЛЕВ: Корпоративный менеджмент» предназначен для автоматизации системы управления бизнесом или некоммерческой организацией.</p>  <p>Продукт подходит как для холдингов со сложной структурой управления, так и для монокомпаний. Систему можно очень гибко настроить под специфику бизнеса, поэтому она подходит для организаций независимо от их отраслевой или региональной специфики.</p>',80,'ru'),(82,'Microsoft Power Automate','Power Automate позволяет быстро типовые процедуры обмена информацией между приложениями и WEB-службами, ее синхронизацию на локальных и облачных ресурсах, перевод и сохранение в нужном формате и на нужных ресурсах. Эти процессы можно использовать для сбор','<p><strong>Microsoft Power Automate (ранее Microsoft Flow</strong><strong>)</strong> – облачный сервис автоматизации рутинных и повторяющихся действий и рабочих процессов, позволяющий создавать быстрые и эффективные инструменты сбора и обработки данных из различных источников. Microsoft Power Automate сервис разработан на основе Microsoft Power Platform и входит в линейку Power сервисов, включающих также <strong><a href=\"https://www.allware.ru/index.php?id=723\">Power Apps</a></strong>, <strong><a href=\"https://www.allware.ru/index.php?id=711\">Power BI</a></strong> и Power Virtual Agents.Power Automate позволяет быстро типовые процедуры обмена информацией между приложениями и WEB-службами, ее синхронизацию на локальных и облачных ресурсах, перевод и сохранение в нужном формате и на нужных ресурсах. Эти процессы можно использовать для сбора данных, синхронизации файлов, получения уведомлений и других целей. <span class=\"redactor-invisible-space\"></span></p>',81,'ru'),(83,'Neaktor','Neaktor — система для управления бизнес-процессами и работой компании. Neaktor создан для того, чтобы закрыть задачи любого отдела компании. Neaktor создан для того, чтобы закрыть задачи любого отдела компании','<p>В Neaktor заложен принцип low-code. То есть любую часть системы вы можете настроить самостоятельно, без привлечения дорогостоящих программистов, консультантов и интеграторов</p><h5>Понятная логика работы</h5><p>Neaktor логичен и прост в освоении, вы сможете легко строить даже самые сложные схемы работы.</p><h5>Быстрое внедрение</h5><p>Достаточно 15 минут, чтобы зарегистрироваться, добавить коллег и начать работать в Neaktor. Мы постарались избавить вас от лишних настроек и технических нюансов. Хотя для профессиональной настройки вы найдете все необходимые инструменты.</p><h5>Хорошая справка и приветливая поддержка</h5><p>Вы сможете найти всю возможную информацию по продукту в нашем справочном портале и коротких, но очень емких обучающих видеороликах.</p>',82,'ru'),(84,'WorkFlowSoft','Понятная визуализация и отчетность Больше не надо гадать, как реализуются ваши поручения. Используйте инструменты визуализации и создавайте отчеты, чтобы видеть общее состояние рабочих процессов, просматривать сведения об отдельных задачах и отслеживать п','<h2>Корпоративная рабочая система, доступная в облаке</h2><p>Workflowsoft — это единое защищённое пространство для совместной работы. Любые данные по задачам всегда под рукой с любого устройства как для удалённых, так и для штатных сотрудников.</p><p>С нами работают более 350 заказчиков, среди которых крупнейшие российские финансовые организации, страховые, логистические, авиа, e-commerce, промышленные, технологические и другие компании. Workflowsoft — это надёжно и безопасно.Workflowsoft доступен везде и всегда. Это значит, что вы можете запускать процессы, просматривать выполнение поручений в любое время, с любого устройства в приложении iOS и Android. Добавляйте любое число пользователей благодаря гибким тарифным планам.</p>',83,'ru'),(85,'IBM ','Лучший технологический партнер, ресурсы и поддержка для развития вашего бизнеса и достижения поставленных целей.','<p>Успешная конкуренция невозможна без инноваций, ускорения и взаимовыгодного партнерства. Став партнером IBM, вы получите в свое распоряжение бесценные экспертные знания, новейшие решения и выгодные преимущества партнерской программы. IBM PartnerWorld — это программа, предназначенная для любой организации, желающей стать партнером IBM. Наши бизнес-партнеры самые разные: это небольшие компании и огромные корпорации; те, кто продает решения IBM и те, кто пользуется ими; традиционные реселлеры и современные облачные компании, архитекторы решений и эксперты по внедрению.</p><p><br></p>',84,'ru'),(86,'ESCOM.BPM','Система ESCOM.BPM - это автоматизированная универсальная программная платформа, соответствующая мировым стандартам управления (BPMI , MoReq , WfMC, OMG) и предназначенная для комплексной автоматизации бизнес-процессов, решения задач управления электронным','<p>ESCOM.BPM обеспечивает комплексную автоматизацию документационных бизнес-процессов, позволяют управлять электронным документооборотом, автоматизируют контроль исполнения поручений в компаниях любого масштаба. ESCOM.BPM обеспечивает регламентное выполнение бизнес-процессов за счёт автоматической маршрутизации, динамического управления правами доступа, рассылки мгновенных уведомлений и напоминаний, автоматизированных процедур контроля сроков.Графические инструменты ESCOM.BPM позволяют в простой и удобной форме «нарисовать» (смоделировать) бизнес-процесс и сделать его исполняемым, то есть автоматизированным.</p>',85,'ru'),(87,'Tessa','TESSA — быстрая и универсальная платформа управления документами и бизнес-процессами.TESSA — быстрая и универсальная платформа управления документами и бизнес-процессами.Современный внешний вид и удобство работы','<p>TESSA — универсальная и гибкая платформа с современным интерфейсом для создания высокопроизводительных решений по автоматизации документооборота и бизнес-процессов компаний в различных сферах бизнеса. СЭД нового поколения. Платформа TESSA разработана на основе практического опыта реализации более 150 проектов внедрения СЭД в организациях различного масштаба и различной сферы деятельности.Платформа TESSA разработана на основе практического опыта реализации более 150 проектов внедрения СЭД в организациях различного масштаба и различной сферы деятельности.</p>',86,'ru'),(88,'Citek EcoS','УПРАВЛЯЙТЕ БИЗНЕС-ПРОЦЕССАМИ ЭФФЕКТИВНО С ЦИФРОВОЙ ПЛАТФОРМОЙ CITECK ECOS Цифровая бизнес-платформа Citeck ECOS сочетает в себе технологии управления процессами, сотрудниками и документами организации.','<h1><br></h1><p>Citeck ECOS — это ПО, разработанное российскими специалистами. Продукты Citeck уже используются государственными учреждениями и компаниями в различных сферах экономики на территории РФ и СНГ.</p><p>Платформа по цифровизации и автоматизации процессов любого бизнеса, которая объединяет в себе:</p><ul><li>Исполнение и контроль бизнес-процессов (BPM)</li><li>Электронный документооборот (СЭД)</li><li>Хранилище документов в электронном виде (ECM)</li><li>Портальные решения</li><li>Управление взаимоотношениями с клиентами (CRM / XRM)</li></ul>',87,'ru'),(89,'1С:WMS Логистика. Управление складом','Функционал системы \"1С:WMS Логистика. Управление складом\" позволяет оптимизировать процессы и решить основные проблемы, актуальные для складских комплексов','<ul><li>оптимизация использования складских площадей при размещении и хранении товара;</li><li>сокращение затрат на складское хранение;</li><li>сокращение времени и количества ошибок на обработку складских операций;</li><li>повышение точности и оперативности учета товара;</li><li>исключение потерь, связанных с критичностью сроков реализации товаров;</li><li>получения актуальной информации об остатках товара на складе в \"онлайн\" режиме;</li><li>оптимизации товарных потоков на складе;</li><li>управления и оптимизации приемки, размещения, перемещения, отбора, отгрузки и прочих складских операций;</li><li>контроля работы складского персонала.</li><li>уменьшение затрат на заработную плату складских работников. </li></ul>',88,'ru'),(90,'EME.WMS ','EME.WMS доступна в нескольких версиях. На основе профессиональной версии EME.WMS созданы отраслевые решения. Они позволяют учесть особенности различных предприятий и отразить в системе все характерные для них бизнес-процессы.','<p>EME.WMS - гибкая логистическая система,\r\nкоторая поддерживает распределенные сети складов, интегрируется с различными ERP-системами\r\nи постоянно развивается. Применение EME.WMS позволяет оптимизировать\r\nработу склада, скорость и точность подборки заказов, актуализировать информацию\r\nоб остатках на складе в ERP -системе, контролировать операции всех\r\nсотрудников и мотивировать их на эффективную работу.</p>',89,'ru'),(91,'Lement Pro','Lement Pro — платформа достижения целей Управляйте бизнес-процессами и ресурсами, контролируйте объекты и финансы, работайте в команде удалённо или в офисе на единой удобной в использовании платформе.Lement Pro — инструмент управления № 1 для строительной','<p>Настройте электронный документооборот и начните эффективную и удобную работу с электронной проектной документацией. Моделируйте процессы её подготовки и сократите время выпуска. Минимизируйте ошибки. Lement Pro объединяет в одной системе территориально распределённые проектные группы, подрядчиков и поставщиков. Установите права доступа и контролируйте процесс выполнения проекта.Автоматизируйте процессы и обеспечьте команду на стройплощадке и в офисе надёжным инструментом оперативного доступа к актуальной информации, документации и BIM-модели. Где объект строительства и его элементы связаны с графиком работ, документами, поручениями, задачами, материалами и подрядчиками. С Lement Pro специалисты на стройплощадке и в офисе работают в единой системе: планируют, контролируют, исполня</p>',90,'ru'),(92,'GESTORI Pro','Комплексная автоматизация ритейла, аналитические программы, кассовые решения и оборудование для сетевых торговых предприятий','<p>GESTORI Pro – специализированный программный комплекс управления товародвижением в сетях супер- и гипермаркетов, включая подсистему управления логистикой склада класса WMS, учитывающую и определяющую местоположение товаров на распределительных и дистрибьюторских центрах. Отличительные особенности: масштабируемость, использование платформ разработки промышленного класса, удаленный доступ к базе данных с использованием низкоскоростных каналов.</p>',91,'ru'),(94,'Tengri BPM','Используйте профессиональный инструмент для моделирования процессов и взаимодействия с другими системами. Простой интерфейс и инструменты валидации позволяют строить и отлаживать процессы наиболее эффективно.','<p>B ходе развития компании возникает потребность изменять процессы, правила и регламенты. Классический подход предполагает подробное документирование и далее попытки перестроения работы сотрудников под новый лад. Применение BPM-решения дает новый стратегический инструмент для руководства компании. Для организации слаженной работы подразделений в течение 1–2 дней вводится новый процесс, который полностью регулирует входы, выходы и правила взаимодействия. Сотрудникам нет нужды изучать инструкции и регламенты – система сама управляет взаимодействием между сотрудниками и контролирует сроки.</p>',93,'ru'),(96,'TopLog WMS ','TopLog WMS — это лучшее предложение по модернизации складских помещений любых масштабов ','<p>Используя систему TopLog WMS, владельцы смогут использовать технологии голосовых команд, кодировки по штрих коду, а также находить нужный товар с помощью радиочастотной идентификации. Это значительно повысит производительность складских работ и снизит возможность совершения ошибки.</p>',95,'ru'),(97,'Camunda','Новое изобретение автоматизации процессов для цифрового предприятия. Тысячи разработчиков используют нашу платформу автоматизации процессов для проектирования, автоматизации и улучшения процессов и повышения качества обслуживания клиентов, более быстрой р','<p>Полный стек технологий автоматизации процессов с мощными механизмами выполнения для рабочих процессов BPMN и решений DMN в сочетании с основными приложениями для моделирования, операций и аналитики. Обеспечьте эффективное сотрудничество между бизнесом и ИТ для проектирования, автоматизации и управления критически важными процессами.</p><p>Оркестрируйте сложные бизнес-процессы в различных системах и конечных точках, таких как API, микросервисы, роботы RPA и т. д.</p><p>Используйте данные в режиме реального времени для выявления и устранения технических проблем, нарушающих бизнес-процессы.</p><p>Постоянно улучшайте свои процессы с помощью комплексной аналитики производительности</p>',96,'ru'),(98,'Pega','Программное обеспечение Pega помогает предприятиям принимать более обоснованные решения и выполнять работу. Благодаря нашей масштабируемой архитектуре и платформе с низким кодом даже самые крупные организации могут оставаться оптимизированными, гибкими и ','<p>Pega предлагает инновационное программное обеспечение, которое упрощает бизнес. Мы помогаем ведущим мировым брендам быстро решать проблемы и трансформироваться для завтрашнего дня, от максимизации ценности жизни клиента до оптимизации обслуживания и повышения эффективности. Клиенты Pega принимают более обоснованные решения и выполняют работу с помощью искусственного интеллекта в реальном времени и интеллектуальной автоматизации. А с 1983 года мы разрабатываем масштабируемую архитектуру и платформу с минимальным кодом, чтобы опережать быстрые изменения. Наши решения экономят время людей, поэтому сотрудники и клиенты наших клиентов могут вернуться к самому важному.</p>',97,'ru'),(99,'LEAD WMS','Профессиональная адаптируемая система управления складом для среднего и крупного бизнеса','<p>Профессиональная система управления складом от Supply Chain Winner 2021. Внедрение по системной методологии с понятным результатом. Больше 300 проектов автоматизации и модернизации логистики. Прочный фундамент для дальнейшего системного развития бизнеса и реализации идей собственника. Готовый инструментарий для организации процесса внедрения изменений.<span class=\"redactor-invisible-space\"></span></p>',98,'ru'),(100,'Sensei ','BPM-платформа, которая ускоряет процессы продажют.Создайте эталонный бизнес-процесс, по которому будут работать все sales-менеджеры, это повысит производительность и качество sales-процесса в среднем на 30%','<p>Комплекс решений для автоматизации продаж. Создайте фундамент в виде наглядной блок-схемы макропроцесса, подключите нужные вам инструменты и получайте максимум эффективности на каждом шаге продаж. Для построения процессов любой сложности и под любые бизнес-задачи. Для эффективной работы сотрудников внутри CRM-системы. Готовые бизнес-процессы, собранные на основе успешных кейсов. Клиенты часто не берут трубку с первого раза.</p><p>Что делать менеджеру в этом случае?</p><p>Как быстро и сколько раз нужно перезвонить?</p><p>Когда отправить сообщение?</p><p>Использовать мессенджер, СМС или письмо на электронную почту?</p><p>Какое содержание будет в этом сообщении?</p>',99,'ru'),(101,'Solvo.WMS','WMS от \"СОЛВО\" относится к классу конфигурируемых систем управления для складов любого типа и назначения; максимальная производительность - более 500 000 строк заказов в сутки.','<p>Отраслевые решения данного типа предназначены для эффективного управления технологическими процессами на складах любого типа, независимо от номенклатуры и объёма оборота. Каждое решение – это специализированный программно-аппаратный комплекс, который строится из наборов различных компонентов – функций, модулей, оборудования - на основе лучших практик внедрения, наработанных командой «СОЛВО» за более чем 20 лет. Ядром каждого решения для склада является система Solvo.WMS, которая настраивается для работы на складе определённого типа.</p>',100,'ru'),(102,'Sevco WMS','Компания «СЕВКО» на сегодняшний день ведет 4 важнейших направления: продажа складского оборудования; сервисное обслуживание и продажа запчастей; внедрение системы управления складом «SEVCO WMS»; управление собственным высокотехнологичным складским комплек','<p> В настоящее время, компания \"СЕВКО\" - это единственная компания, предлагающая самое эффективное и гибкое решение в области автоматизации складской логистики. Технологии, предлагаемые специалистами компании \"СЕВКО\" - это результат изучения работы крупных складов и распределительных центров Европы, собственного многолетнего практического опыта. По своим функциональным характеристикам и соотношению цена - качество эта технология является одной из самых лучших в своем классе.</p>',101,'ru'),(103,'ELMA BPM','ELMA BPM — основная технология и система управления бизнес-процессами, которая позволяет решить любые прикладные задачи компании. На базе системы ELMA реализованы дополнительные приложения, которые сконцентрированы на автоматизации работы в определенных п','<p>Скорость внесения изменений</p><p>Возможность быстро реагировать на новые условия работы и проверять гипотезы оптимизации, просто перестраивая логику бизнес-процессов.Управление бизнес-процессами bpm основывается на объективных данных. Система позволяет в реальном времени анализировать эффективность исполнения процессов и каждого внесенного изменения.Моделирование, запуск и доработка исполняемых процессов не требуют от сотрудников навыков программирования.Возможность работы в любом браузере и мобильное приложение ELMA обеспечивают удобный доступ к системе.</p>',102,'ru'),(104,'ConsID WMS','Сonsid.WMS – адаптируемая система нового поколения, которая оптимизирует на операционном уровне работу склада и существенно повышает эффективность управления складскими процессами.','<p>Высокий уровень адаптируемости Consid.WMS – результат инновационного подхода к разработке системы. Это позволяет быстро автоматизировать как стандартные, так и сложные специфические бизнес-процессы, а в случае их изменений – в короткие сроки перенастроить под новые особенности и обеспечить непрерывность вашего бизнеса.</p><p>Открытость функциональной реализации системы и возможность быстрого внесения изменений в настройки позволяют масштабировать и развивать систему вместе с развитием вашего бизнеса даже без привлечения разработчика, что обеспечивает низкую совокупную стоимость владения.</p>',103,'ru'),(105,'Oracle Warehouse Management Cloud','​Oracle WMS — это ведущая облачная система управления складом. Благодаря инновационным возможностям, мобильным решениям и удобному интерфейсу облачная WMS-система Oracle объединяет в себе скорость и экономичность облака с лучшими в своем классе средствами','<p>Облачная WMS-система Oracle представляет собой новую парадигму программного обеспечения SCM: складское решение нового поколения с беспрецедентным соотношением цена/возможности. Новая функциональность для управления цепочками поставок включает в себя инновационные функции продукта, мобильные решения и удобный интерфейс.<br></p><p>Компании вкладывают средства в ПО для управления складом, чтобы рационализировать и автоматизировать процессы управления запасами и фулфилмента, а также контролировать затраты. Реализованная на базе облака динамичная и легко настраиваемая WMS-система обеспечивает быстрое, экономичное внедрение и следующие преимущества.</p><ul><li>Повышение операционной эффективности: управление заказами в облаке дает участникам цепочек поставок возможность контролировать запасы и операции в реальном времени, независимо от того, какими технологическими решениями пользуются для совершения покупок их заказчики.</li><li>Снижение общей стоимости владения—за счет внедрения облачной системы управления помогает оптимизировать затраты, поскольку предприятиям больше не приходится оплачивать дорогостоящее обслуживание и модернизацию.</li><li>Улучшение сопровождения заказчиков и сокращение сроков обработки и выполнения заказов создает положительные впечатления у покупателей и способствует успеху бизнеса. Заказчики могут делать покупки когда угодно и откуда угодно. Системы Warehouse Management на базе облака помогают предприятиям соответствовать требованиям, которые диктуют реалии рынка.</li></ul>',104,'ru'),(106,'Naumen BPM',' Эффективное управление организацией через автоматизацию бизнес-процессов Программный продукт Naumen BPM предназначен для автоматизации и управления бизнес-процессами предприятий (Business Process Management, BPM).','<p>Naumen BPM помогает:</p><ul><li>структурировать и формализовать процессы компании;</li><li>отслеживать исполняемость автоматизируемых процессов на любом из этапов (переходы, статусы, метрики и пр.);</li><li>решать сложные, нетиповые задачи автоматизации процессов, которые невозможно реализовать с помощью коробочных продуктов;</li></ul> <ul><li>использовать инструменты для мониторинга хода выполнения процессов и контроля исполнения задач в рамках запущенных бизнес-процессов и на их основе вносить изменения в процессную деятельность компании;</li><li>при наличии разрозненных ИТ-систем объединить их сквозными бизнес-процессами, выявить дублирование процессов, их «узкие» места и т.п.</li></ul>',105,'ru'),(107,'SAP WMS','SAP - известное имя в индустрии планирования ресурсов предприятия, которое поддерживает многие крупные корпорации США. SAP WMS представляет собой современное и очень гибкое приложение, предназначенное для упрощения сложных складских процессов.','<ul><li>Многогранное управление цепочкой поставок</li><li>Отчетность в реальном времени</li><li>Полная возможность управления складом</li><li>Хранение и внутренний контроль процессов</li><li>Поддержка кросс-функциональной аналитики</li></ul>          <p>Система объединяет несколько аспектов управления цепочкой поставок, чтобы обеспечить больший контроль и прозрачность складских процессов.</p>  <p>Он также улучшает прозрачность и функциональность процессов с помощью множества функций, таких как отслеживание запасов, кросс-докинг и отчеты в реальном времени.</p>  <p>Системные модули могут даже выполнять сложные операции по управлению складом, такие как управление рабочей силой, управление двором, комплектование и многое другое. Программное обеспечение SAP для управления складом позволяет вам полностью контролировать свои складские операции.</p>',106,'ru'),(108,'Digital Design','Digital Design более четверти века разрабатывает и внедряет системы, занимающие лидирующие позиции в различных сегментах управления бизнес-процессами: электронный документооборот, корпоративные мобильные приложения, информационная безопасность, ИТ-инфраст','<p>Имеем опыт автоматизации бизнес-процессов компаний из всех ключевых отраслей российской экономики, включая машиностроение, топливно-энергетический комплекс, финансовую и банковскую сферу, телекоммуникации, торговлю, транспорт, металлургию и др.Всю разработку ведем на современных фреймворках и с использованием актуальных подходов к UX и проектированию интерфейсов, работаем со всеми основными десктопными и мобильными операционными системами и СУБД, как международными, так и отечественными. разработку ведем на современных фреймворках и с использованием актуальных подходов к UX и проектированию интерфейсов, работаем со всеми основными десктопными и мобильными операционными системами и СУБД, как международными, так и отечественными.<span class=\"redactor-invisible-space\"></span></p>',107,'ru'),(109,'InStock WMS','Система InStock WMS это адаптируемая система  управления складской логистикой для среднего и крупного бизнеса','<p>Внедрение WMS для автоматизации процессов склада  снижает до 100 %  потери продукции с ограниченными сроками годности. Программа для склада точно отслеживает  дату истечения срока годности продукции,  артикулы, партии, серии, дату производства и другие атрибуты товара. Все это учитывается при формировании заказа на отбор. <br></p><p>InStock WMS– система управления складом. InStock WMS является центральным продуктом, позволяющим полностью автоматизировать все складские процессы.</p><p>InStock WMS заслуживает особого внимания среди других систем управления складом за свою уникальную архитектуру и самый богатый функционал из представленных на рынке систем и имеет значительные преимущества.</p>',108,'ru'),(110,'БИТ.WMS','Программа для комплексной автоматизации складской логистики. Решение гибко настраивается под специфику любого предприятия','<p>Функционал системы БИТ.WMS позволяет оптимизировать процессы и решить основные проблемы, актуальные для складских комплексов:</p><ul><li>оптимизация использования складских площадей при размещении и хранении товара;</li><li>сокращение затрат на складское хранение;</li><li>сокращение времени и количества ошибок на обработку складских операций;</li><li>повышение точности и оперативности учета товара;</li><li>исключение потерь, связанных с критичностью сроков реализации товаров;</li><li>уменьшение затрат на заработную плату складских работников;</li><li>контроль выполнения операций и действий сотрудников в режиме реального времени;</li><li>частичное или полное исключение простоя склада при инвентаризации;</li><li>уменьшение риска возникновения пересортицы вплоть до нуля;</li><li>исключение зависимости от знаний сотрудников о местонахождении товара.</li></ul>',109,'ru'),(111,'LISS','Профессиональное программное обеспечение WMS для управления складом прекрасно интегрируется с продуктами 1С Бухгалтерии и обладает широким и гибким функционалом для удобства использования на предприятии.','<p>WMS система которая легко интегрируется с 1С. Синхронизация обмена данными между 1С Бухгалтерией и складом решает множество вопросов по быстрому получению точной и актуальной информации по наличию и остаткам на складе. Система WMS полностью адаптирована для интеграции с 1С и дает множество важных преимуществ ее использования на предприятии.</p>',110,'ru'),(112,'RS.WMS','Специализированная программная платформа, разработанная для автоматизации различных типов складов, в том числе территориально разделенных.','<p>Управление процессами склада и транспортного парка. Автоматизация приемки, перемещения и отгрузки товара. Планирование доставки в магазины, и контроль состояния транспортных средств. Биллинг ресурсов и мотивация персонала логистического подразделения ритейлера.</p>',111,'ru'),(113,'SNRG WMS','Компания SNRG специализируется на автоматизации и повышении эффективности бизнеса любых масштабов','<p>SNRG - зарекомендовала себя как надежный партнер, выполняющий свои обязанности на высоком уровне с сохранением конфиденциальности в работе со своими клиентами. В своей деятельности сотрудники компании придерживаются общепризнанных принципов делового партнерства, профессиональной этики и взаимных договоренностей. Современный склад — это сложное техническое сооружение, состоящее из многих взаимосвязанных элементов, имеющее определенную структуру и выполняющее ряд важных функций. Автоматическая система управления складом призвана существенно сократить затраты времени, финансов и количество персонала, участвующего в процессе учета, транспортировки и сортировки материалов и изделий.</p>',112,'ru'),(114,'IT-Enterprise','Единственная отечественная система, ориентированная на комплексную автоматизацию предприятий или группы предприятий','<p>Оптимизация деятельности предприятия и реинжиниринг бизнес-процессов с целью решения задач, направленных на достижение стратегических бизнес-целей предприятия. Повышение пропускной способности производства, повышение уровня обслуживания клиентов, сокращение издержек производства, эффективное управление ресурсами предприятия за счет внедрения современных стандартов управления производством MRPII, MES, APS<span class=\"redactor-invisible-space\"></span></p>',113,'ru'),(115,'Anaplan','Формализация и контроль всех бизнес-процессов предприятия, повышение степени координации и оперативности деятельности служб и подразделений предприятия','<p>Anaplan PlanIQ™ помогает пользователям принимать точные решения с помощью прогнозирования, использующего мощный интегрированный искусственный интеллект (ИИ) и машинное обучение (МО). Сотрудничайте в рамках всего предприятия, работая с единым источником достоверных данных, обновляемым и рассчитываемым в режиме реального времени. Тестируйте несколько сценариев и быстро применяйте лучшие варианты.</p>',114,'ru'),(116,'1С:ERP Управление предприятием','Инновационное решение для построения комплексных информационных систем управления деятельностью многопрофильных предприятий с учетом лучших мировых и отечественных практик автоматизации крупного и среднего бизнеса.','<p>Решение «1С:ERP Управление предприятием» разработано на новой современной версии платформы «1С:Предприятие» проектной командой специалистов фирмы «1С» при участии специально созданного экспертного совета, в который вошли специалисты ведущих партнеров «1С» и руководители профильных подразделений крупных промышленных предприятий. До выпуска финальной версии более года производилось изучение и тестирование данного продукта сотнями партнеров и десятками клиентов на пилотных внедрениях.</p>',115,'ru'),(117,'ERP Монолит','ERP Монолит® — комплексное, интегрированное масштабируемое решение, позволяющее управлять ресурсами и моделировать реальные бизнес-процессы практически любой сложности.','<p>ERP Монолит содержит в себе семь модулей, которые кардинально изменят будущее компании и обеспечат стабильное развитие. Ключевая разработка компании — ERP Монолит, комплексное и масштабируемое решение, позволяющее реализовать проекты для компаний национального масштаба. Функциональные модули ERP Монолит, относимые к контуру «Управление финансами и контроллинг», обеспечивают решение задач автоматизации финансового, налогового и управленческого учёта, подготовки финансовой отчётности (в том числе – согласно требованиям МСФО и US GAAP), финансового планирования и бюджетирования, анализа прибыльности.<span class=\"redactor-invisible-space\"></span></p>',116,'ru'),(118,'РосБизнесСофт ERP','РосБизнесСофт ERP позволяет автоматизировать большую часть производственных процессов, а также выстроить прозрачные взаимоотношения с поставщиками и клиентами','<p>Предоставление руководству предприятия и пользователям системы возможности получения полной и достоверной информации о состоянии производственного процесса и финансовой деятельности предприятия для проведения углубленного анализа и оценки деятельности предприятия и принятия решений</p>',117,'ru'),(119,'Цех=Успех','ERP-система «Цех-успех» имеет невысокие технические требования, легко разворачивается в организации, без проблем адаптируется под все сферы работы компании и показывает свою эффективность с первого месяца использования.','<p>Система управления производством «Цех-успех» гарантированно повышает эффективность в следующих бизнес-процессах:</p><ol><li>Производство. Использование на изделиях наклейки с QR-кодом с полной информацией обо всех этапах обработки, включая информацию о персонале, делает производственный процесс прозрачным, ритмичным и легко контролируемым. Ответственность и мотивация персонала кратно возрастает, а разбор причин брака становится открытым, быстрым и разделяемым всеми членами коллектива.</li><li>Использование оборудования. Автоматизация управления производством открывает возможность полностью использовать потенциал оборудования, с успехом лавируя его загрузкой, минимизируя простои и своевременно проводя сервисное обслуживание, что продлит срок службы.</li><li>Стандартизация ключевых процедур и операций. ERP позволит навести порядок в технологической части производства, предоставляя информацию для разработки и совершенствования технологических карт. Стандартизация процессов за счет ERP-системы позволяет поднять качество продукции на новый уровень.</li><li>Система оплаты труда, мотивация персонала и производственная дисциплина. С ERP все производственные процессы станут прозрачны, руководитель сможет разрабатывать и настраивать систему оплаты труда нужным образом, управляя премиальной частью. Для рабочих система оплаты становится понятной, а использование сдельных схем мотивации повышает самоотдачу персонала. Для мастера это возможность сместить фокус внимания с контрольных процедур на совершенствование производства, эффективнее управлять ключевыми процессами.</li><li>Расчёт заработной платы. Автоматизированный ERP-учет открывает возможность расчёта зарплаты в течение минуты. Система начислений премий и штрафов позволяет увеличить отдачу от каждого работника.</li><li>Управление складом. Снабжение предприятия благодаря ERP-системе может быть доведено до автоматизма по большинству позиций – «Цех-успех» проконтролирует расход материалов и сделает заказ нужного количества в соответствии с планами производства.</li><li>Дилерская сеть. Партнеры и дилеры, подключенные к ERP, всегда будут в курсе объемов готовых и производимых товаров, смогут за пару кликов отправлять заказы от клиентов и ускорят работу системы сбыта в целом.</li></ol>',118,'ru'),(120,'WS. ERP','Главное преимущество полученное от программы - это полная автоматизация учета и уход от ручных подсчетов. ','<p>Внедрение программы позволяет максимально контролировать документооборот и исключить потерю документов. Отдельный инструмент контроля производства и заказов позволит максимально уменьшить издержки. Возможность создания этапов производства под предприятие значительно сокращает время работы с контрагентами и складом.</p>',119,'ru'),(121,'SAP ERP','Интеллектуальные ERP-решения SAP — это цифровое ядро, которое позволяет компаниям интегрировать комплексные межфункциональные бизнес-процессы нового поколения, чтобы превратить компанию в «умное» предприятие.','Наши облачные и локальные ERP-решения помогают руководить всеми аспектами деятельности — от бухгалтерского учета и CRM до управления логистической цепочкой и закупками.',120,'ru'),(122,'Договор24','Наш конструктор позволит Вам создать юридический документ, максимально адаптируя его для Вашей ситуации.  Готовый документ на вашей почте за 15 минут Каждый документ создан и проверен группой высокопрофессиональных юристов Стоимость документов ниже, чем н','<p>Команда \"Договор24\" состоит из высокопрофессиональных юристов, имеющих за своими плечами значительный опыт работы с бизнесом по договорным, трудовым и корпоративным правоотношениям. Необходимый Вам юридический документ здесь</p><p>Более чем 10 миллионов вариантов юридических документов для малого и среднего бизнеса в Казахстане. Все самые актуальные юридические процедуры и документы по теме Документы для открытия интернет сервиса / магазина, защиты интеллектуальной собственности и созданию ПО,</p><p>которые используются в Республике Казахстан</p>',121,'ru'),(123,'ПАРУС','Решения, с помощью которых можно автоматизировать любые процессы в области финансово-хозяйственной деятельности, управления НИОКР и производством.','Повышение эффективности управления контрактами по ГОЗ, за счет автоматизации контроля исполнения контрактов, управления обеспечением контрактов материалами и ПКИ, контроля соответствия фактических и плановых затрат контрактов по ГОЗ. <span></span>',122,'ru'),(124,'almexecm ','Список документов можно фильтровать по различным признакам. Например, можно выбрать документы, которые требуют вашего участия, находятся на согласовании, подписании, отмененные либо исполненные документы, поручены мне или мои поручения, документы на контр','<p>Для эффективной организации доступа к документам компании система позволяет группировать документы по стандартам делопроизводства. Можно фильтровать список по группе и по конкретному типу документа, например, группа “ОРД” и тип “Приказы по личному составу”. Для холдингов и корпораций предусмотрена специальная возможность управления документами: через вкладку “Подразделения” пользователь получает список компаний или филиалов, либо же главного офиса, если ему предоставлен доступ к документам соответствующих структурных подразделений</p>',123,'ru'),(125,'Directum','Интеллектуальные цифровые процессы и документы. Электронный документооборот и цифровизация бизнес-процессов с применением искусственного интеллекта. Российская импортонезависимая разработка.1 место в рейтинге ECM-систем по количеству проектов','<p>Экосистема решений Directum</p><p>Решения Directum разработаны на общей ECM/BPM-платформе и включают возможности для управления бизнес-процессами и документами с полной поддержкой юридической значимости. Включают no-code и low-code инструменты для гибкой адаптации.Интеллектуальные сервисы Directum Ario:</p><p>распознают и извлекают из документов структурированную и неструктурированную информацию;</p><p>выполняют за человека трудоемкую однообразную работу: классифицируют документы, заполняют реквизиты, выявляют изменения и расхождения, проводят оценку рисков, вычисляют ответственных;</p><p>при дополнительной верификации обеспечивают 100%-ную точность распознавания;</p>',124,'ru'),(126,'Дело','СЭД «ДЕЛО» – автоматизация работы с документами, задачами и процессами Проверенное решение, актуальные технологии, простота обслуживания.  «ДЕЛО» - система с полным набором инструментов для управления документооборотом и делопроизводством, рассчитанная на','<p>Реализован полный цикл договорной работы – подготовка проекта, маршрутизация, согласование, совместное редактирование, утверждение, контроль исполнения договорных обязательств. Возможность синхронизации с учетными бухгалтерскими системами.Полнофункциональный веб-клиент с персонифицированным интерфейсом. Мобильные приложения для платформ iOS, Android, Windows. Обеспечение юридической значимости при работе с мобильных устройств.Обмен документами с другими СЭД (на основе ГОСТ Р 53898-2013), интеграция с операторами ЭДО, предусмотрена возможность работы с несколькими операторами.</p>',125,'ru'),(127,'Галактика','«Галактика ERP» — это гибкий и современный инструмент для решения текущих и стратегических управленческих задач современного предприятия в условиях цифровой экономики.','<p>Система обладает высокой производительностью, широкими функциональными возможностями, отличными интеграционными свойствами и обеспечивает сотрудников предприятия достоверной информацией для принятия эффективных решений.</p>',126,'ru'),(128,'Microsoft Sharepoint','SharePoint Интеллектуальная мобильная интрасеть Управляйте и делитесь контентом, данными и приложениями. Предоставьте сотрудникам вашей организации возможность легко взаимодействовать друг с другом и быстро находить нужную информацию.','<p>Удобное взаимодействие и совместная работа без проблем. С помощью SharePoint проектная группа, отдел или подразделение может создать и настроить свой сайт для эффективной и динамичной совместной работы. Делитесь файлами, данными, новостями и ресурсами. Настройте свой сайт и сделайте работу команды проще. Используйте ПК с Windows, компьютеры Mac и мобильные устройства, чтобы свободно взаимодействовать со своими коллегами и сотрудниками из других организаций в защищенной среде. Пользуйтесь интрасетью, чтобы сплотить свой коллектив и наладить корпоративную систему оповещения. Повышайте эффективность, предоставляя сотрудникам доступ к ресурсам и приложениям через домашние страницы и порталы. </p>',127,'ru'),(129,'naudoc','NauDoc - простая при внедрении и использовании система электронного документооборота для предприятий среднего бизнеса и органов государственной власти. СЭД NauDoc предназначена для автоматизации отправки и получения корреспонденции, внутренних документов ','<p>Система поставляется с открытыми исходными кодами. Все компоненты системы включены в поставку и не требуют закупки дополнительных лицензий (таких как СУБД, операционная система и другие программные продукты сторонних разработчиков). СЭД NauDoc является кроссплатформенной системой, что позволяет использовать как UNIX, так и Windows инфраструктуру для работы. Интерфейс NauDoc построен на веб технологиях и не требуется установки программного обеспечения на рабочие станции, работает на планшетах, имеет мобильное приложение для смартфонов.</p>',128,'ru'),(130,'LanDocs','LanDocs — российская платформа для управления корпоративным контентом, 20 лет платформа LanDocs обеспечивает эффективное управление электронными документами в крупнейших организациях России и стран СНГ.','<p>Система электронного документооборота LanDocs</p><p>Разработка компании ЛАНИТ, программная платформа для построения корпоративной системы электронного документооборота (СЭД). Высокая степень готовности базового ПО к работе. Быстрая обработка документов за счет интерфейсных и технологических решений. Гибкие средства организации учета документов и контроля исполнения. Широкие возможности настройки по требованиям конкретного заказчика. Современные средства информационной безопасности, масштабируемости и отказоустойчивости</p>',129,'ru'),(131,'DeloPro','Система предназначена для управления продажами, закупками и производством, финансами, маркетингом, проектами, запасами, автотранспортом и доставкой грузов, персоналом и взаимоотношениями с контрагентами, бизнес-процессами и документооборотом','<p>Система DeloPro 5.0 (в дальнейшем Система) представляет собой комплексное ERP-решение, в основу которого положены современные концепции ведения бизнеса – CRM (управление взаимоотношениями с контрагентами), SCM (управление цепочками поставок), DCM (управление цепочками спроса), HRM (управление персоналом), BPM (управление бизнес-процессами) и электронная коммерция (B2B).</p><p>Система предназначена для управления продажами, закупками и производством, финансами, маркетингом, проектами, запасами, автотранспортом и доставкой грузов, персоналом и взаимоотношениями с контрагентами, бизнес-процессами и документооборотом. Система содержит электронную почту и органайзер, корпоративный информационный портал, а также средства BI – программируемые дэшборды, карты показателей, многомерные отчеты. С ее помощью можно вести товароведческий учет и ценообразование, налоговый и управленческий учет, бюджетирование и финансовый анализ.</p>',130,'ru'),(132,'1С:Документооборот','«1С:Документооборот государственного учреждения 8» — это программа, позволяющая в комплексе решать широкий спектр задач автоматизации учета документов, взаимодействия сотрудников, контроля и анализа исполнительской дисциплины в государственных и муниципал','<p>1С:Документооборот государственного учреждения 8» позволяет работать с документами любых типов. Каждый документ сопровождается учетно-регистрационной карточкой, набор реквизитов которой соответствует ГОСТ Р 7.0.97-2016, требованиям ГСДОУ, рекомендациям Росархива и традициям делопроизводства, сложившимся в отечественной практике. Поддерживается учет входящих и исходящих документов, обращений граждан, организационно-распорядительных, информационно-справочных и прочих внутренних документов.</p>',131,'ru'),(133,'ТЕЗИС ','Система электронного документооборота Автоматизируйте с помощью СЭД ТЕЗИС всю работу с документами и цифровизируйте широкий круг бизнес-процессов. Удобство, прозрачность и эффективность для любых компаний.','<p>После быстрой установки доступны типовые функции СЭД: документооборот, канцелярия, управление поручениями, организация совещаний. При желании можно автоматизировать финансовые, кадровые или любые другие процессы, провести интеграцию с учетной системой, создать электронный архив и т.д.Оперативно решайте вопросы и будьте в курсе дел в любой точке мира с быстрым, безопасным и функциональным мобильным приложением системы документооборота. Команда СЭД ТЕЗИС готова подключиться на любом этапе и выполнить любой объем работ. Проведем обследование бизнес-процессов, реализуем функциональность по запросу, установим систему электронного документооборота.</p>',132,'ru'),(134,'Elma ECM','ELMA ECM+ больше, чем система электронного документооборота Делопроизводство и документооборот — это неотъемлемые элементы работы компании. ELMA ECM+ справляется с ними лучше классических СЭД, интегрирует движение документов в сквозные бизнес-процессы и и','<p>ELMA ECM+ — это решение для построения электронного документооборота в организации на BPM-платформе. Сочетая процессный подход и технологии управления контентом (ECM), решение дает возможность полноценно управлять движением информации в компании, не привязываясь к документу в классическом понимании.</p><p>Это отличает ELMA ECM+ от классической СЭД, которая фиксируется на жизненном цикле документа и ограничивается традиционными процессами делопроизводства. В программе для документооборота ELMA ECM+ в виде готовых функций реализованы задачи канцелярии и организационно-распорядительной документации (ОРД). </p>',133,'ru'),(135,'FinancialForce','Онлайн бухгалтерия/ERP от Salesforce, работает на платформе Force.com и тесно интегрирована с CRM сервисами Salesforce.','<p>FinancialForce дает вам полное, ориентированное на клиента представление о вашем бизнесе на облачной платформе № 1 в мире от Salesforce. Имея единую запись учетной записи клиента, вы получаете надежный источник достоверной информации, который поможет оптимизировать ваши операции и поставить клиентов в центр всего, что вы делаете.</p>',134,'ru'),(136,'Е1 Ефврат ','В Е1 Евфрат все продумано, чтобы сделать вашу работу максимально продуктивной. умажные и электронные документы могут быть автоматически импортированы в систему. Технология «понимания» документов — поиск ','<p>\"Е1 Евфрат\" – система электронного документооборота. Хранение документов. Единый электронный архив практически неограниченного объема с эффективным управлением. Версионность позволяет вести всю историю изменений. Оперативный поиск позволят найти документ за секунды, а система автоматического резервного копирования сохранит целостность базы. Применение методики внедрения Draw&Run позволяет ввести систему автоматизации бизнес-процессов и документооборота Е1 в опытную эксплуатацию в срок до 5 рабочих дней</p>',135,'ru'),(137,'InDocs','КУЛЬТИВИРОВАНИЕ КУЛЬТУРЫ ОТКРЫТОСТИ С ПОМОЩЬЮ ДОКУМЕНТАЛЬНЫХ ФИЛЬМОВ. Мы хотим создать аудиторию, открытую для многих перспектив и открытую для перемен. Мы разрабатываем лучшие документальные проекты, связываем их с потенциальными партнерами и помогаем им','<p><strong>Внедрение системы электронного документооборота.</strong></p><p> Система электронного документооброта СЭД \"InDocs\" позволит в короткие сроки автоматизировать все процессы делопроизводства в компании. Снизить затраты как по времени,  так и по средствам на ведение внутреннего документооборота. По сравнению с бумажным документооборотом, позволяет полностью исключить факты потери документов, долгие ожидание подписи руководителей, не понятные для исполнителей резолюции, снизить затраты на бумагу, привязать эффективность в систем к KPI каждого сотрудника и руководителя. </p><p><ins><ins></ins></ins></p>',136,'ru'),(138,'IFS Applications','IFS Applications – единое, адаптируемое к изменениям программное обеспечение для эффективного бизнеса, обеспечивающее управление основными фондами (EAM), управление ресурсами предприятия (ERP), управление проектами и цепочками поставок.','<p>IFS — это другой тип программного обеспечения для планирования ресурсов предприятия. Он не такой сложный и жесткий, как некоторые другие пакеты ERP. Наоборот, он предназначен для того, чтобы помочь вам быстро воспользоваться преимуществами новых технологий и меняющейся рыночной конъюнктуры, максимально увеличив гибкость вашего бизнеса.</p><p>Решение включает функции для управления корпоративными проектами, управления активами предприятия и управления услугами. Приложение может быть настроено для различных отраслей промышленности и превосходно подходит для сложных настроек, которые сочетают в себе элементы управления производством, проектами, услугами и активами.</p>',137,'ru'),(139,'Documentolog','Documentolog обеспечивает полный жизненный цикл всей электронной документации в рамках текущих бизнес-процессов компании. Автоматизация бизнес-процессов любой организации в соответствии с внутренними регламентами организации и утвержденными нормами Респуб','<p>Только Documentolog предоставляет возможность вести обмен легитимными документами с госорганами в электронном виде. С СЭД Documentolog Вы платите только за то, что используете! Если система была не доступна - подайте заявку, и стоимость простоя автоматически вычтется из стоимости аренды. С Documentolog Вы ощутите эффект автоматизации в кратчайшие сроки благодаря автоматизированному процессу заключения договора и внедрению. Решениям Documentolog доверяют более 9 000 компаний по всему Казахстану. Каждый клиент - это новый опыт и компетенции, которые мы собрали, проанализировали и предлагаем Вам.</p>',138,'ru'),(140,'Тенгридок','ТЕНГРИДОК® позволяет управлять созданием, исполнением, согласованием документов. Система адаптируема для любого типа предприятия, поддерживает обмен документами с территориально-распределенными офисами и автоматизирует как работу отдельных департаментов (','<p>ТЕНГРИДОК позволяет реализовать:</p><p>«Классический» документооборот;</p><p>Контроль и мониторинг исполнения поручений и документов;</p><p>Подготовка проектов документов, согласование и утверждение;</p><p>Ведение производственного календаря и учет праздничных дней;</p><p>Ведение табеля времени и автоматическая подстановка контрольных сроков;</p><p>Автоматический перевод документов с русского на казахский язык и обратно;</p><p>Юридически значимый документооборот</p><p>Aвтоматизирует все формализованные виды бизнес-процессов:</p><p>Последовательные</p><p>Параллельные</p><p>Сложные</p>',139,'ru'),(141,'Arta Synergy','Эффективность наших решений ежедневно проверяют более 150 корпоративных клиентов по всему миру Обеспечьте высокий уровень исполнительской дисциплины Ускорьте в три раза документооборот и сократите канцелярские расходы, полностью отказавшись от бумажного в','<p>Описание функций</p><p>Контроль поручений</p><p>Организационно-распорядительный документооборот</p><p>Кадровый учёт и делопроизводство</p><p>Отчет об исполнительской дисциплине</p><p>Что нужно для старта?</p><p>Определите перечень журналов регистрации и номенклатуры дел</p><p>Перечень типов документов и маршрутов их движения (журналы, дела)</p><p>Определите электронные и печатные формы документов</p><p>Определите формы отчетности об исполнительской дисциплине</p><p>Synergy Customers - это своевременное исполнение плана продаж компании за счет набора инструментов для его контроля</p><p>Увеличьте объем продаж, контролируя исполнение каждого этапа сделки командой продаж. Выявляйте проблемные участки в продажах за счет анализа отказов на различных этапах.</p>',140,'ru'),(142,'Docsvision','Электронный архив документов организации на платформе Docsvision Хранение электронных документов и любого контента компании в одной системе. Быстрое комплектование архива, удобный поиск, загрузка и выгрузка файлов, организация использования архива с разгр','<p>Хранит «первичку» и иные документы финансового блока, созданные в учётной системе предприятия или поступившие от контрагентов в электронном/бумажном виде. Быстрый поиск и выгрузка документов по запросам ФНС. Снижает риски «опережающей» уплаты НДС. Многократно снижает затраты на хранение документов. Хранит все документы по личному составу и кадровому резерву в защищённой базе данных. Автоматизирует кадровые процессы (подбор, приём на работу, увольнение) и консолидирует информацию о сотрудниках в личных делах. Учёт и хранение социально значимых документов в безопасной системе, защищённой согласно требованиями ФЗ-152.</p>',141,'ru'),(143,'Эвридок','Система электронного документооборота «ЭВРИДОК»  СЭД предназначена для организации безбумажной технологии делопроизводства и корпоративного документооборота, которая обеспечивает движение документов у Заказчика с момента их создания или получения, до заве','<p>ТОО «Dynamics Business Technologies» является интегратором в сфере информационных технологий, динамично развивающаяся на отечественном рынке на протяжении 10 лет. Компания всегда нацелена на долгосрочные доверительные партнерские отношения, ориентированные на достижение максимального взаимопонимания с заказчиками. ТОО «Dynamics Business Technologies» имеет богатый положительный опыт работы с предприятиями среднего и крупного бизнеса в сфере логистики, транспорта, финансов, инвестиций, нефтегазовой сфере и др. Наша компания включена в список добросовестных поставщиков АО «ФНБ Самрук-Казына».</p>',142,'ru'),(144,'А2b','А2Б Система управления бизнесом Планируйте, организуйте и контролируйте работу компании в единой программе  Идеальное решение для дистанционной работы Лучшее соотношение цены и возможностей СЭДПереведите внутренний документооборот в электронный вид','<p>А2Б – помогает достигать цели от стратегического до исполнительского уровня организации. Развивать бизнес, повышать продажи, контролировать исполнение задач и получать нужные результаты теперь можно в едином информационном пространстве, доступном и понятном даже начинающему бизнесу.</p><p>А2Б не просто автоматизирует бизнес-процессы в производстве. А2Б предлагает использовать готовые и проверенные решения на практике.А2Б позволяет организовать работу компании просто и удобно.</p><p>Вы получите актуальные показатели работы персонала</p>',143,'ru'),(145,'Tessa','TESSA — быстрая и универсальная платформа управления документами и бизнес-процессами. Решение на базе TESSA — красивое, быстрое и современное. Безупречная внутренняя архитектура обеспечивает комфортную работу пользователя даже при ограниченном канале связ','<p>Платформа TESSA разработана на основе практического опыта реализации более 150 проектов внедрения СЭД в организациях различного масштаба и различной сферы деятельности.</p><p>Решение на базе TESSA — красивое, быстрое, современное и интерактивное. Безупречная внутренняя архитектура, гибкие возможности настройки и современные технологии WPF обеспечивают плавную и безупречную работу рабочего места пользователя и минимальное время отклика приложения даже в условиях ограничений каналов передачи данных.</p>',144,'ru'),(146,'Tend ERP','Tend ERP — это автоматизированная система по улучшению показателей продаж, проведению многоэтапных маркетинговых кампаний, разработки и контроля жизненного цикла продукта.','<p>Система по улучшению показателей продаж, проведению многоэтапных маркетинговых кампаний, разработки и контроля жизненного цикла продукта. Позволяет формировать и улучшать последовательность взаимодействия с потребителем, и тем самым улучшать обслуживание клиентов.</p>',145,'ru'),(147,'Контур.Диадок ','Электронный документооборот Обменивайтесь с контрагентами электронными документами. Для крупных клиентов настраиваем схему электронного документооборота и вносим индивидуальные доработки. Система для обмена между компаниями юридически значимыми электронны','<p>Интеграция с 1С, SAP, Oracle и др.</p><p>Работа с электронными документами в привычной учетной системе с помощью интеграционных решений. Хранение документов</p><p>Бесплатное и бессрочное хранение документов на защищенных серверах Контура. Роуминг с операторами</p><p>Обмен документами с пользователями других систем ЭДО через роуминг. Сокращение времени</p><p>Автоматическое заполнение данных в ВСД и массовая отправка документов. Проверка на ошибки</p><p>Поиск ошибок в документах и рекомендации по их исправлению. Бесплатная техподдержка</p><p>Эксперты на связи 24/7, чтобы ваша работа не прерывалась.</p>',146,'ru'),(148,'Atlas','Современная система документооборота. Готовое решение для автоматизации документооборота, делопроизводства и управления рабочими процессами. Электронный документооборот «Этлас» Удобная и простая в использовании система электронного документооборота и упра','<p>СЭД ЭТЛАС полностью включает в себя другой продукт линейки ЭТЛАС — <a title=\"Электронный архив\" href=\"https://atlas-soft.ru/products/atlas-archive/\" target=\"_blank\" rel=\"noopener noreferrer\">Электронный архив</a>. Наличие в системе документооборота полноценного электронного архива позволяет создать в организации единое информационное пространство, обеспечить простой поиск и оперативный доступ к любым данным организации.</p><p>Электронный документооборот ЭТЛАС позволит полностью автоматизировать работу с документами в организации, существенно повысить производительность её сотрудников, оптимизировать их взаимодействие, упростить выполнение решаемых ими задач.</p>',147,'ru'),(149,'DocSpace','Система электронного документооборота/ЕСМ на платформе Microsoft SharePoint. Коробочная СЭД/ECM система на платформе Microsoft SharePoint Веб-ориентированное пространство для ежедневной работы сотрудников, управления документами и задачами через корпорати','<p>Полноценный электронный документооборот</p><p>Обработка всех видов электронных документов:</p><p>входящих и исходящих; </p><p>организационного-распорядительных (ОРД);</p><p>внутренних документов и служебных записок;</p><p>договорных документов. Отчетность</p><p>Онлайн-индикаторы, статичные и динамические отчеты, справки, расчет показателей и выгрузка данных в DWH и OLAP. </p><p>Электронный архив</p><p>Архив документов предприятия с удобной системой атрибутивного и полнотекстового поиска по различным типам контента.  Электронный офис: заявки на оплату счетов</p><p>Заявки на оплату счетов — это удобный инструмент для автоматизации процесса согласования заявок и планирования платежей. </p>',148,'ru'),(150,'Alfresco','Хаос содержимого возникает, когда документы хранятся в нескольких местах — на бумаге, на ноутбуках и USB-накопителях, в электронной почте и на сетевых дисках, а также в различных хранилищах и на сайтах обмена файлами. Эти хранилища контента снижают произв','<p>Alfresco предлагает инновационные решения для управления контентом, которые позволяют подключать, управлять и защищать наиболее важную информацию вашего предприятия, где бы оно ни находилось.</p><p>С помощью открытого облачного ECM Alfresco вы можете управлять контентом из любого места, передавать информацию пользователям из любого места и доставлять приложения на любое устройство. Alfresco позволяет предприятиям повышать производительность труда работников, предоставлять ценную информацию и предоставлять исключительный опыт работы с клиентами.</p>',149,'ru'),(151,'WSS Docs','Платформа разработана на базе Microsoft SharePoint с учетом российской специфики документооборота и входит в реестр отечественного ПО. Система имеет несколько редакций и большой каталог дополнительных модулей, что позволяет выполнить внедрение в компаниях','<p>ECM-платформа WSS Docs предназначена для автоматизации документооборота разных направлений деятельности: кадровый учет, делопроизводство, бухгалтерия и других. Внедрение коробочного решения позволяет оптимизировать типовые процессы делопроизводства и канцелярии, актуальные для большинства компаний:</p><ul><li>Управление потоками документов, регистрация, согласование входящей и исходящей корреспонденции</li><li>Исполнение и контроль поручений</li><li>Регистрация и согласование приказов, распоряжений</li><li>Работа с протоколами совещаний, служебными записками и другими внутренними документами</li><li>Договорной процесс</li><li>Учет и хранение документации</li><li>Обеспечение нормативно-справочной базы</li></ul>',150,'ru'),(152,'Verdox','Электронный документооборот (ЭДО) Verdox — что это такое? Система электронного документооборота Verdox — это эффективная система ЭДО, которая автоматизирует документооборот Вашей организации в электронном виде, каких бы размеров она ни была, и каким бы ви','<h2>Cистема электронного документооборота Verdox для Вашего предприятия</h2><hr><p>Позволяет централизованно отслеживать ход каждого процесса при максимальной децентрализации работы с документами</p> <p>Повышает сохранность документов и удобство их поиска</p> <p>Повышает уровень контроля исполнения распорядительной документации по всем структурным подразделениям</p> <p>Обеспечивает оперативное взаимодействие сотрудников, организаций, государственных учреждений</p> <p>Позволяет отправлять и принимать юридически значимые документы непосредственно из системы, подписывать их электронной цифровой подписью</p>',151,'ru'),(153,'Standard ERP','В своей основе Стандарт ERP предлагает типичные модули в Планировании ресурсов предприятия для счетов, обработки заказов, склада, производства и рабочих затрат.','<p>Standard ERP — это система планирования ресурсов предприятия, предназначенная для управления предприятиями любого размера практически в любой отрасли. Управление учетными записями, обработка заказов, инвентаризация, производство и расчет стоимости работ являются одними из основных компонентов Standard ERP. Выберите один из множества комплексных отраслевых модулей, полностью интегрированных со всеми другими функциональными возможностями системы.</p>',152,'ru'),(154,'Doculite','Весь функционал облачной системы документооборота Documentolog Lite доступен бесплатно! Мы предоставляем Вашей компании бесплатно 100 Мб пространства для документов или 5 документов для отправки контрагентам, чтобы Вы смогли ощутить выгоду и оценить эффек','<p>Посредством Doculite Вы можете обмениваться документами с любыми контрагентами в юридически-значимом виде.</p><p>Какими документами можно обмениваться?<br>Акты, счета-фактуры, договора, официальные письма и любые другие электронные документы.</p><p>Это позволит Вам:</p><ul><li>исключить потери документов, а также ошибки, связанные с человеческим фактором;</li><li>отказаться от многочисленных бумажных копий документов;</li><li>сократить время доставки документов до 5 минут вне зависимости от расстояния;</li><li>существенно снизить расходы, затрачиваемые при применении бумажных документов.</li></ul>',153,'ru'),(155,'Intalev','ОПТИМИЗАЦИЯ БИЗНЕС-ПРОЦЕССОВ И ЭЛЕКТРОННЫЙ ДОКУМЕНТООБОРОТ Гарантия длительных партнерских отношений с вашими клиентами. Программно-методический комплекс «ИНТАЛЕВ: Корпоративный менеджмент» является системой класса new ERP и предназначен для эффективного ','<p>Руководство получает эффективный инструмент контроля деятельности подчиненных с возможностью своевременного принятия важных управленческих решений</p><p>Компания получает полноценный электронный архив всех документов. Процесс согласования, рассмотрения, утверждения ускоряется в разы</p><p>Автоматизация электронного документооборота на базе «ИНТАЛЕВ: Корпоративный менеджмент» объединяет в единой системе документооборот, управление бизнес-процессами и систему управления финансами.</p><p>Повышение исполнительской дисциплины, процессы становятся прозрачными для персонала и руководства.</p>',154,'ru'),(156,'СБИС','ЭЛЕКТРОННЫЙ ДОКУМЕНТООБОРОТ Электронная подпись и обмен документами между компаниями, внутри компании и c  обыкновенными людьми. В СБИС подписывайте за один клик весь пакет закрывающих документов. При расхождениях отправьте контрагенту акт и быстро исправ','<p>Накладные, счета-фактуры создавайте как обычно или прямо в СБИС. Один клик, и они у клиента. Он подписывает их электронной подписью и отправляет вам. В итоге у вас и у него полный комплект подписанных юридически значимых документов. Аналогично можно отправлять документы не только компаниям, но и сотрудникам и даже обыкновенным людям, независимо от того, зарегистрированы они в СБИС или нет. Встроенные в СБИС средства позволяют вам создавать и редактировать офисные (Word, Excel) файлы и учетные документы (накладные, счета-фактуры, авансовые отчеты ...) на любом устройстве: телефоне, планшете или компьютере. Со СБИС вы можете их просматривать и подписывать даже без подключения к интернету.</p>',155,'ru'),(157,'Docs Creatio','Больше, чем документооборот Docs Creatio – умная система управления корпоративным контентом. Единое хранилище документов Ведите в Docs документооборот вашей компании. Быстро находите документы по их содержимому или значениям атрибутов. Группируйте докумен','<p>Гибкое согласование документов</p><p>Запускайте и контролируйте процесс согласования документов онлайн. Гибкая настройка списка согласующих, возможность согласования по e-mail для внешних контрагентов. Быстрая постановка задач сотруднику или группе. Контроль выполнения задач: фиксация ожидаемого результата, проверка контролером, возврат на доработку. Представление информации в виде диаграммы Гантта для успешного планирования рабочего времени и ресурсов. Используйте готовые процессы ECM-системы Docs и возможности отечественной платформы Creatio, признанной во всем мире. Лучшие практики и мировые стандарты позволят обеспечить максимальную эффективность в управлении процессами вашей компании.</p>',156,'ru'),(158,'idocs','Верните контроль над документами в свои руки! idocs - это первая в Казахстане система электронного документооборота. Электронный документооборот, сокращенно ЭДО – это способ организации работы с документами в электронном виде через интернет без использова','<p>Кому подходит idocs?</p><p>-малому бизнесу с небольшим документооборотом</p><p>-для тех, у кого обширная география контрагентов по Казахстану</p><p>-среднему и крупному бизнесу с большим количеством трафика документов в месяц и значительным объемом контрагентов</p><p>-всем компаниям, желающим отказаться от устаревшей бумажной документации и перейти на ЭДО. </p><p>idocs оптимизирует бизнес и упрощает документооборот, используя современные технологии. В 2014 году наша команда задумала изменить работу компаний с бумагами. Мы приступили к созданию облачной платформы по обмену документами и в 2016 году запустили сервис электронного документооборота – idocs.</p>',157,'ru'),(159,' Sage X3','Программное обеспечение для устоявшихся предприятий, которым требуется повышенная эффективность, гибкость и понимание. ','<p>Sage X3 ускоряет весь ваш бизнес — от закупок до производства, складирования, продаж, обслуживания клиентов и управления финансами — и обеспечивает более быстрое понимание затрат и производительности на каждом этапе в глобальном масштабе. Sage X3 адаптируется к уникальной роли, предпочтениям и рабочему процессу пользователей, обеспечивает безопасный облачный и мобильный доступ к необходимым им данным, упрощая при этом управление программной инфраструктурой вашей компании с помощью единого набора приложений.<span class=\"redactor-invisible-space\"> Sage X3 предлагает гибкие варианты конфигурации и приложения для поддержки ваших отраслевых процессов и может работать в облаке под управлением Sage или в центре обработки данных вашей компании, что дает вам полный контроль над вашей ИТ-стратегией.<span class=\"redactor-invisible-space\"></span></span></p>',158,'ru'),(160,'Cominware','Comindware Tracker - это первый выбор для тех, кто находится на пути от отслеживания активности на основе Excel или Outlook к более системно ориентированному подходу. Это программное обеспечение для управления рабочими процессами с низким уровнем кода пре','<p>Актуальные Решения для рабочих Процессов</p><p>Программное обеспечение для управления рабочими процессами для каждой бизнес-функции и отдела</p><p>Одобрение капитальных вложений — защита инвестиций и сокращение цикла капитальных вложений</p><p>Управление закупками — обеспечение соблюдения надлежащей политики закупок</p><p>Управление претензиями — позвольте агентам сосредоточиться на людях, а не на претензиях</p><p>Управление запросами на обслуживание — эффективная обработка запросов</p><p>Соответствие требованиям и управление политикой — простой аудит соответствия требованиям</p><p>Платформа разработки с низким уровнем кода позволяет создавать корпоративные приложения и решения для всех видов бизнес-потребностей.</p>',159,'ru'),(161,'Opentext Documentum','ECM система для крупных компаний. Содержит полный набор инструментов для управления любым контентом, документооборотом, бизнес-процессами. Предоставляет веб-интерфейс с широкими возможностями для совместной работы и социального взаимодействия.','<p>Documentum – мировой лидер рынка ECM (Enterprise Content Management) систем. Это – полнофункциональная платформа, предназначенная для управления неструктурированной информацией предприятия (различные типы документов, цифровые медиаданные, содержание Интернет-сайтов). Платформа Documentum позволяет не только управлять документами предприятия на всех этапах жизненного цикла, но и решать задачи комплексной автоматизации различных бизнес-процессов, обеспечивая процесс-ориентированную связь различных информационных систем между собой.</p>',160,'ru'),(162,'КОМПАС-CLOUD','Многолетний опыт компании позволил создать масштабную систему, которая состоит из множества подсистем и мелких модулей','<p>КОМПАС-CLOUD – это выгодная альтернатива приобретению программного обеспечения. Теперь не надо приобретать программные продукты и устанавливать их на собственные компьютеры, Вы берете ПО в аренду с повременной оплатой.<br><br>На Ваши компьютеры устанавливается только небольшая клиентская часть, а серверная часть программ со всеми Вашими данными хранится в DATA-центре и обслуживается высококвалифицированными специалистами.</p>',161,'ru'),(163,'Мотив','DOCFLOW «МОТИВ»: Электронный документооборот Поддерживает полный жизненный цикл документа: от регистрации до отправки в архив. Ускоряет согласование документов в 20 раз. Удобная маршрутизация и быстрый интерфейс. Все документы попадут по назначению и в ср','<p>Делопроизводство</p><p>СЭД «Мотив» упорядочивает работу с любыми видами документов.</p><p>Автоматически формирует документ из сообщения электронной почты для работы с внешними пользователями.</p><p>Сохраняет все действия по документу.</p><p>Имеет развернутый механизм отчетов и аналитики для принятия верных управленческих решений.</p><p>Гарантирует защищённость документооборота с помощью электронной подписи</p><p>Согласование</p><p>Настройте в несколько кликов перенаправление требуемому специалисту в зависимости от параметров входящего документа.</p><p>Делегируйте помощникам подготовку проектов резолюций. При утверждении проекта резолюции задача по исполнению документа создается автоматически.</p>',162,'ru'),(164,'Epicor','Epicor обладают масштабируемостью и гибкостью, обеспечивают долгосрочный рост и дополняются полным спектром услуг, что способствует быстрой окупаемости инвестиций','<p>Epicor предлагает отраслевые решения для розничной торговли, машиностроения, дистрибуции, гостиничного бизнеса, фармацевтики, сферы профессиональных услуг, которые позволяют компаниям управлять эффективностью всех бизнес-процессов и создают конкурентные преимущества.</p>',163,'ru'),(165,'FossDoc','ЭЛЕКТРОННЫЙ ДОКУМЕНТООБОРОТ FossDoc - ваш надежный инструмент для решения сложных задач управления документопотоками. Наглядность процессов обработки документов, повышение эффективности работы сотрудников, оптимизация затрат предприятия.','<p>Система электронного документооборота <strong>FossDoc</strong> — решение на платформе <a class=\"article-link\" href=\"https://fosslook.ru/\" target=\"_blank\" title=\"Перейти на сайт\">FossLook</a>, предназначенное для создания электронного архива документов, организации корпоративного документооборота (workflow) и автоматизации бизнес-процессов на предприятиях, в учреждениях и организациях любого рода деятельности. Программа позволяет решить большое количество задач, реализация которых возложена на соответствующие <a class=\"article-link\" href=\"https://fossdoc.com/ru/descriptionmodule\" title=\"Описание модулей\">модули</a>. Система может быть легко перенастроена с учетом специфики работы каждого конкретного предприятия.</p>',164,'ru'),(166,'Optima-Workflow','«OPTIMA-WorkFlow» является комплексной прикладной платформой для создания решений в области управления документами, интегрирующей в себя информационные технологии ведущих российских и зарубежных производителей, в том числе средства криптографической защит','<p>Заложенный в основу разработки продукта интеграционный подход, основанный на применении готовых к использованию и проверенных в ходе длительной эксплуатации программных компонентов, позволяет в ходе эксплуатации «OPTIMA-WorkFlow» применять возможности программных решений и информационных технологий, снискавших себе репутацию лидирующих в своем классе.</p><p>Применение в качестве серверного компонента «OPTIMA-WorkFlow» современных систем управления базами данных (Microsoft SQL Server или Oracle Database) обеспечивает все преимущества использования «клиент-серверной» архитектуры, надежное и устойчивое взаимодействие с ресурсами вычислительных сетей и операционных систем, способность к масштабированию решения и к функционированию в распределенных корпоративных вычислительных сетях.</p>',165,'ru'),(167,'CompanyMedia','В CompanyMedia отражен двадцатипятилетний опыт  компании \"ИнтерТраст\" в деле создания систем для управления документами. Электронный документооборот полного цикла, работа с обращениями граждан, контроль исполнительской дисциплин, автоматизация заседаний —','<p>CompanyMedia – корпоративная система управления документами, задачами и личной продуктивностью. В основе CompanyMedia лежат принципы сквозного электронного документооборота, что позволяет сохранять свидетельства деятельности организации в интересах внешнего и внутреннего регулирования, анализа и принятия управленческих решений, оценки эффективности персонала, формирования лучших управленческих практик. Наибольшие преимущества от внедрения системы получают территориально распределенные организации.</p>',166,'ru'),(168,'Босс-референт','Система БОСС-Референт разработана для автоматизации управленческого документооборота и делопроизводства. Созданная в 1996 году, на сегодняшний день СЭД БОСС-Референт является одним из лидеров на российском рынке решений класса ЕСМ (Enterprise Content Mana','<p>Пользователями системы электронного документооборота БОСС-Референт являются органы федеральной и региональной власти, государственные унитарные предприятия, коммерческие компании, среди которых как холдинги с большой филиальной структурой, так и небольшие организации. Автоматизация управления документами с помощью БОСС-Референт приводит к росту продуктивности работы сотрудников, облегчению доступа к информации для принятия управленческих решений, улучшению исполнительской дисциплины, и, следовательно, к общему повышению качества управления.</p>',167,'ru'),(169,'Docuware','Программное обеспечение для документооборота и автоматизации документооборота. Для бизнеса везде. Бизнес происходит везде: в офисе, в дороге, дома. DocuWare оцифровывает и защищает вашу информацию для беспрепятственного обмена между лицами, принимающими р','<p>DocuWare предоставляет решения для управления облачными документами и программное обеспечение для автоматизации рабочих процессов, которое позволяет вам оцифровывать, защищать и работать с бизнес-документами, а затем оптимизировать процессы, лежащие в основе вашего бизнеса.</p><p>Избавившись от потерянного времени и неопределенности в ваших процессах, ваша команда сможет сосредоточиться на работе, которая повышает производительность и прибыль. DocuWare идеально подходит для распределенных и удаленных команд, которым необходимо работать с максимальной производительностью.</p>',168,'ru'),(170,'DocLogix','«DocLogix» – это система электронного документооборота, предназначенная для управления корреспонденцией, контрактами, заседаниями, закупками и другими документами или задачами, а также для автоматизации соответствующих процессов. Решения, созданные на осн','<p>«DocLogix» используют около <strong>35 000 пользователей</strong>. Нашими клиентами являются <strong>300 организаций</strong> в государственном, банковском, страховом, энергетическом, производственном и других секторах. Продукт доступен в <strong>11 странах</strong>.<br><br><strong>Функциональность платформы СЭД «DocLogix» </strong>Шаблоны документов Контроль версий документов Хранение и архивирование документов Поддержка различных стандартов электронных документов Сканирование с OCR Предварительный просмотр документов Цифровая и мобильная подпись Управление задачами Автоматизация процессов Управление пользователями Мощная поисковая система Отчеты Адаптация без программирования Многоязычный интерфейс Доступ через веб-браузерами Интеграция с «Microsoft Office» Мобильный доступ (Мобильное приложение позволяет работать с «DocLogix» через мобильные устройства iOS и Android.)</p>',169,'ru'),(171,'AVIRENT CRM','Полный комплекc инструментов для работы автопроката','<p>Больше не нужно беспокоиться о платежах. Ежедневное использование AVIRENT CRM позволяет сократить расходы на телефонные звонки по вопросам оплаты и контроля водителей, а так же значительно снизить риск неплатежей и накопления долга.</p>',170,'ru'),(172,'PayDox',' Система электронного документооборота и поддержки совместной работы PayDox обеспечивает комплексное управление бизнес-процессами и документами предприятия и обладает неограниченными возможностями адаптации под требования заказчиков.','<p>Электронный документооборот PayDox СЭД и управление взаимоотношениями с клиентами и контрагентами PayDox CRM выбирают организации, которым нужен гарантированный успешный результат в сжатые сроки. Мы за свой счет осуществляем обследование бизнес-процессов вашего предприятия, не требуем авансирования работ по внедрению PayDox и используем принцип оплаты за готовую работающую систему, что позволяет заказчику на 100% исключить любые проектные риски.   У вас нет ничего срочного, когда ваши документы в порядке, а PayDox вовремя уведомляет вас о наступлении сроков исполнения приказов, распоряжений, договоров и платежных документов и информирует в реальном времени о ситуации с продажами.</p>',171,'ru'),(173,'Go-RFID','Программно-аппаратный комплекс для бесконтактного поиска и автоматизированной идентификации, учета и контроля промышленных и производственных объектов.','<p>Автоматизированные идентификация и поиск</p><ul><li>Быстрый поиск и бесконтактная идентификация</li><li>Автоматизированная регистрация и учет объекта</li><li>Проверка подлинности оборудования</li><li>Паспортизация экземпляров с фиксацией данных</li><li>Отслеживание инспекционной истории и спецификации</li></ul>',172,'ru'),(174,'eDocLib','eDocLib позволяет собрать информацию в единой базе и предоставить каждому из сотрудников быстрый и наглядный доступ в соответствии с обязанностями.    Среди распространённых примеров использования eDocLib архивы первичной бухгалтерской документации, финан','<p>Структурирование и систематизация данных eDocLib предоставляет набор инструментов для наведения порядка в файлах и документах. Файлы классифицируются по различным рубрикам (например, «Договоры», «Счета», и т.п.), сопровождаются дополнительными характеристиками (например, сумма договора, контрагент, поставщик, дата). Между файлами устанавливаются взаимосвязи-гиперссылки для быстрого перехода ко всем сопутствующим материалам. Также сохраняется привычная возможность группировать файлы по папкам и предоставлять к ним совместный доступ.</p>',173,'ru'),(175,'dia$par','Интегрированная операционная система предприятия, централизованно управляющая всеми бизнес-процессами компании в режиме реального времени','<p>Кибернетический позвоночник компании, соединяющий и структурирующий разрозненные бизнес-объекты (сотрудников, промышленное и торговое оборудование, покупателей, поставщиков, внешние ИТ-платформы...), где бы они ни находились, в целостный бизнес-организм. Функционирующий в режиме реального времени — с точностью атомных часов, надежностью швейцарского хронометра, и предсказуемостью реакций смартфона.</p>',174,'ru'),(176,'ISIDA','Развитая многофункциональная система организационно-распорядительного электронного документооборота, делопроизводства и контроля исполнения. Регистрация входящих, исходящих и внутренних документов. ','<p>Управление заданиями и сквозной контроль исполнения. Взаимодействие структурных подразделений. Электронное согласование проектов документов (докладных и служебных записок, приказов, распоряжений, постановлений, заявок и др.). Семейство продуктов ISIDA DMS в своем полном варианте состоит из двух частей. Первая часть - ISIDA DMS SE - является комплексной системой электронного делопроизводства и контроля исполнения. Вторая часть - ISIDA eDoc - предоставляет развитый набор функций по созданию, обращению, хранению и использованию корпоративных электронных документов, снабженных цифровыми подписями.</p>',175,'ru'),(177,'iTs-Office','iTs-Office - программный комплекс, разработанный компанией «Интерсофт» на базе Lotus Domino/Notes для автоматизации делопроизводства и документооборота. iTs-Offiсe позволяет построить полноценную систему управления деловыми процессами обработки документов','<p>Система охватывает все процессы создания, обработки, хранения документов, а также автоматизирует основные процедуры современного делопроизводства. iTs-Оffiсe позволяет обрабатывать и хранить информацию любого типа, в том числе текстовые файлы, сканированные образы бумажных документов, графические изображения, электронные таблицы и др.Система электронного документооборота iTs- Office может использоваться во всех областях, где коллективная деятельность направлена на достижение конкретных целей.Особенностью системы iTs-Office является ее гибкость и простота настройки. Одновременно с готовыми решениями предлагается полный набор инструментов для успешной адаптации к особенностям любой компании</p>',176,'ru'),(178,'Naumen DMS','СЭД, которая позволяет перевести делопроизводство в электронную форму, ускорить движение документов внутри предприятия и между компаниями в составе холдинга, повысить исполнительскую дисциплину, сделать прозрачным исполнение важных бизнес-процессов.','<p>Система управления документооборотом Naumen DMS обладает широким перечнем возможностей в таких областях, как управление документами и бизнес-процессами.</p><p>Хранение документов и разграничение прав доступа к ним</p><p>Функции хранения структурированных и неструктурированных данных в электронном виде являются основными в Naumen DMS. Подсистема прав доступа разграничивает доступ к данным, которые содержатся в отдельных объектах системы (документы, папки, справочники, журналы). </p><p>Система обладает эффективной и гибкой подсистемой поиска. Поиск может проводиться по названию и содержанию документа, в том числе по содержанию приложенного файла, а также по различным критериям поиска. </p>',177,'ru'),(179,'ПРОСТОЙ БИЗНЕС','«Простой бизнес» – идеальный инструмент для организации удалённой работы офиса. Одна программа для управления всей Вашей компанией.','<p>CRM-система «Простой бизнес» поможет вывести управление взаимоотношениями с клиентами и процессом продаж ваших товаров или услуг на новый уровень.</p>  <p>- ведение клиентской базы (учет клиентов);</p>  <p>- напоминания о звонках;</p>  <p>- звонки клиентам по IP-телефонии;</p>  <p>- SMS и e-mail рассылки;</p>  <p>- добавление клиента по входящему письму или звонку;</p>  <p>- автоматические шаблоны документов;</p>  <p>- работа со сканером штрихкода;</p>  <p>- воронка продаж, отчеты по продажам;</p>  <p>- подключение заявок с сайта к CRM-системе;</p>  <p>- сквозная аналитика бизнеса для оценки эффективности рекламы.</p>',178,'ru');
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
INSERT INTO `products_categories` VALUES (1,9),(1,7),(1,9),(1,10),(1,7),(1,9),(1,10),(1,7),(1,9),(1,10),(2,5),(42,2),(43,2),(44,2),(45,2),(52,2),(56,2),(1,5),(1,7),(1,9),(65,2),(1,7),(1,9),(1,10);
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
INSERT INTO `products_props` VALUES (1,2,1),(3,2,2),(9,2,2),(11,2,3),(14,2,4),(6,2,5),(7,2,5),(8,2,5),(16,2,6),(17,2,6),(20,2,6),(21,2,6),(38,2,7),(39,2,7),(40,2,7),(41,2,7),(42,2,7),(43,2,7),(44,2,7),(1,3,1),(11,3,3),(6,3,5),(8,3,5),(16,3,6),(17,3,6),(18,3,6),(38,3,7),(39,3,7),(41,3,7),(45,3,7),(63,1,9),(65,1,9),(66,1,9),(244,12,39),(251,12,40),(252,12,40),(254,12,41),(255,12,41),(257,12,42),(258,12,42),(259,12,43),(260,12,43),(261,12,43),(262,12,44),(263,12,44),(264,12,44),(265,12,44),(266,12,44),(267,12,44),(268,12,44),(269,12,44),(273,12,44),(274,12,44),(275,12,44),(277,12,44),(279,12,44),(280,12,44),(282,12,44),(283,12,44),(284,12,45),(285,12,45),(303,12,45),(306,12,45),(308,12,45),(244,11,39),(246,11,39),(247,11,39),(251,11,40),(252,11,40),(253,11,40),(254,11,41),(257,11,42),(260,11,43),(261,11,43),(262,11,44),(263,11,44),(264,11,44),(265,11,44),(266,11,44),(267,11,44),(269,11,44),(270,11,44),(271,11,44),(273,11,44),(274,11,44),(275,11,44),(276,11,44),(277,11,44),(279,11,44),(280,11,44),(282,11,44),(283,11,44),(284,11,45),(285,11,45),(288,11,45),(289,11,45),(290,11,45),(292,11,45),(293,11,45),(301,11,45),(302,11,45),(303,11,45),(305,11,45),(244,10,39),(245,10,39),(246,10,39),(247,10,39),(249,10,39),(251,10,40),(252,10,40),(253,10,40),(254,10,41),(255,10,41),(257,10,42),(260,10,43),(261,10,43),(262,10,44),(263,10,44),(264,10,44),(265,10,44),(266,10,44),(267,10,44),(268,10,44),(269,10,44),(270,10,44),(273,10,44),(274,10,44),(277,10,44),(278,10,44),(279,10,44),(280,10,44),(282,10,44),(283,10,44),(284,10,45),(285,10,45),(286,10,45),(289,10,45),(290,10,45),(291,10,45),(292,10,45),(293,10,45),(294,10,45),(295,10,45),(296,10,45),(297,10,45),(298,10,45),(299,10,45),(300,10,45),(301,10,45),(302,10,45),(303,10,45),(304,10,45),(307,10,45),(310,10,45),(313,10,45),(244,13,39),(245,13,39),(246,13,39),(247,13,39),(248,13,39),(251,13,40),(252,13,40),(253,13,40),(254,13,41),(255,13,41),(257,13,42),(259,13,43),(260,13,43),(261,13,43),(262,13,44),(263,13,44),(264,13,44),(265,13,44),(266,13,44),(267,13,44),(269,13,44),(270,13,44),(271,13,44),(273,13,44),(274,13,44),(275,13,44),(276,13,44),(277,13,44),(278,13,44),(279,13,44),(280,13,44),(282,13,44),(283,13,44),(284,13,45),(285,13,45),(286,13,45),(287,13,45),(288,13,45),(289,13,45),(290,13,45),(291,13,45),(292,13,45),(293,13,45),(294,13,45),(295,13,45),(296,13,45),(297,13,45),(303,13,45),(304,13,45),(305,13,45),(307,13,45),(308,13,45),(310,13,45),(313,13,45),(244,8,39),(246,8,39),(251,8,40),(252,8,40),(254,8,41),(255,8,41),(256,8,41),(257,8,42),(259,8,43),(260,8,43),(261,8,43),(262,8,44),(263,8,44),(264,8,44),(265,8,44),(266,8,44),(267,8,44),(269,8,44),(270,8,44),(271,8,44),(273,8,44),(274,8,44),(275,8,44),(276,8,44),(277,8,44),(279,8,44),(280,8,44),(281,8,44),(282,8,44),(283,8,44),(285,8,45),(286,8,45),(287,8,45),(288,8,45),(289,8,45),(290,8,45),(292,8,45),(293,8,45),(294,8,45),(296,8,45),(297,8,45),(298,8,45),(303,8,45),(304,8,45),(310,8,45),(312,8,45),(313,8,45),(244,7,39),(246,7,39),(247,7,39),(251,7,40),(252,7,40),(254,7,41),(257,7,42),(260,7,43),(261,7,43),(262,7,44),(263,7,44),(264,7,44),(266,7,44),(267,7,44),(273,7,44),(274,7,44),(275,7,44),(277,7,44),(280,7,44),(282,7,44),(283,7,44),(285,7,45),(286,7,45),(290,7,45),(303,7,45),(307,7,45),(308,7,45),(312,7,45),(313,7,45),(316,7,45),(319,7,45),(244,6,39),(246,6,39),(247,6,39),(251,6,40),(252,6,40),(254,6,41),(257,6,42),(259,6,43),(261,6,43),(312,6,45),(244,4,39),(246,4,39),(247,4,39),(251,4,40),(254,4,41),(257,4,42),(258,4,42),(261,4,43),(262,4,44),(263,4,44),(264,4,44),(266,4,44),(267,4,44),(273,4,44),(282,4,44),(284,4,45),(285,4,45),(287,4,45),(291,4,45),(297,4,45),(298,4,45),(301,4,45),(302,4,45),(304,4,45),(306,4,45),(313,4,45),(317,4,45),(318,4,45),(244,5,39),(245,5,39),(246,5,39),(247,5,39),(251,5,40),(252,5,40),(253,5,40),(254,5,41),(255,5,41),(257,5,42),(258,5,42),(259,5,43),(260,5,43),(261,5,43),(262,5,44),(263,5,44),(264,5,44),(265,5,44),(266,5,44),(267,5,44),(269,5,44),(270,5,44),(271,5,44),(273,5,44),(274,5,44),(275,5,44),(276,5,44),(277,5,44),(278,5,44),(279,5,44),(280,5,44),(282,5,44),(283,5,44),(284,5,45),(285,5,45),(286,5,45),(290,5,45),(296,5,45),(303,5,45),(304,5,45),(305,5,45),(306,5,45),(307,5,45),(308,5,45),(310,5,45),(311,5,45),(313,5,45),(318,5,45),(319,5,45),(244,14,39),(245,14,39),(246,14,39),(247,14,39),(249,14,39),(250,14,39),(251,14,40),(252,14,40),(254,14,41),(255,14,41),(256,14,41),(257,14,42),(260,14,43),(261,14,43),(262,14,44),(263,14,44),(264,14,44),(265,14,44),(266,14,44),(267,14,44),(269,14,44),(270,14,44),(273,14,44),(274,14,44),(275,14,44),(277,14,44),(278,14,44),(279,14,44),(280,14,44),(282,14,44),(285,14,45),(290,14,45),(303,14,45),(318,14,45),(244,15,39),(251,15,40),(252,15,40),(255,15,41),(257,15,42),(259,15,43),(260,15,43),(261,15,43),(262,15,44),(263,15,44),(264,15,44),(265,15,44),(273,15,44),(274,15,44),(277,15,44),(278,15,44),(279,15,44),(280,15,44),(282,15,44),(283,15,44),(305,15,45),(311,15,45),(244,16,39),(246,16,39),(247,16,39),(251,16,40),(252,16,40),(254,16,41),(257,16,42),(260,16,43),(261,16,43),(262,16,44),(263,16,44),(264,16,44),(265,16,44),(266,16,44),(267,16,44),(268,16,44),(269,16,44),(270,16,44),(273,16,44),(275,16,44),(277,16,44),(280,16,44),(281,16,44),(282,16,44),(283,16,44),(286,16,45),(287,16,45),(288,16,45),(289,16,45),(295,16,45),(297,16,45),(319,16,45),(321,16,45),(244,17,39),(246,17,39),(247,17,39),(251,17,40),(252,17,40),(253,17,40),(254,17,41),(257,17,42),(260,17,43),(261,17,43),(263,17,44),(264,17,44),(265,17,44),(266,17,44),(267,17,44),(268,17,44),(269,17,44),(270,17,44),(271,17,44),(273,17,44),(274,17,44),(275,17,44),(276,17,44),(277,17,44),(279,17,44),(280,17,44),(281,17,44),(282,17,44),(283,17,44),(286,17,45),(287,17,45),(288,17,45),(295,17,45),(297,17,45),(298,17,45),(327,17,45),(328,17,45),(244,18,39),(246,18,39),(247,18,39),(251,18,40),(252,18,40),(254,18,41),(257,18,42),(259,18,43),(260,18,43),(261,18,43),(262,18,44),(263,18,44),(264,18,44),(266,18,44),(267,18,44),(269,18,44),(270,18,44),(271,18,44),(273,18,44),(274,18,44),(275,18,44),(276,18,44),(277,18,44),(279,18,44),(280,18,44),(281,18,44),(283,18,44),(286,18,45),(287,18,45),(319,18,45),(322,18,45),(244,19,39),(245,19,39),(246,19,39),(247,19,39),(249,19,39),(250,19,39),(251,19,40),(252,19,40),(254,19,41),(257,19,42),(260,19,43),(261,19,43),(262,19,44),(263,19,44),(264,19,44),(266,19,44),(267,19,44),(268,19,44),(269,19,44),(270,19,44),(271,19,44),(273,19,44),(274,19,44),(277,19,44),(278,19,44),(279,19,44),(280,19,44),(282,19,44),(283,19,44),(284,19,45),(286,19,45),(290,19,45),(296,19,45),(303,19,45),(311,19,45),(326,19,45),(244,20,39),(246,20,39),(251,20,40),(252,20,40),(254,20,41),(260,20,43),(261,20,43),(263,20,44),(264,20,44),(265,20,44),(266,20,44),(267,20,44),(268,20,44),(269,20,44),(270,20,44),(271,20,44),(273,20,44),(274,20,44),(275,20,44),(279,20,44),(280,20,44),(281,20,44),(282,20,44),(283,20,44),(284,20,45),(285,20,45),(286,20,45),(300,20,45),(330,20,45),(331,20,45),(244,21,39),(251,21,40),(252,21,40),(253,21,40),(254,21,41),(256,21,41),(260,21,43),(261,21,43),(263,21,44),(264,21,44),(265,21,44),(266,21,44),(267,21,44),(269,21,44),(270,21,44),(271,21,44),(273,21,44),(274,21,44),(280,21,44),(282,21,44),(283,21,44),(284,21,45),(285,21,45),(306,21,45),(244,22,39),(246,22,39),(247,22,39),(251,22,40),(252,22,40),(253,22,40),(254,22,41),(255,22,41),(257,22,42),(260,22,43),(261,22,43),(262,22,44),(263,22,44),(264,22,44),(265,22,44),(266,22,44),(267,22,44),(268,22,44),(269,22,44),(270,22,44),(271,22,44),(273,22,44),(274,22,44),(275,22,44),(276,22,44),(277,22,44),(279,22,44),(280,22,44),(281,22,44),(282,22,44),(283,22,44),(322,22,45),(244,23,39),(246,23,39),(247,23,39),(251,23,40),(252,23,40),(253,23,40),(254,23,41),(257,23,42),(259,23,43),(260,23,43),(261,23,43),(262,23,44),(263,23,44),(264,23,44),(265,23,44),(266,23,44),(267,23,44),(268,23,44),(269,23,44),(270,23,44),(271,23,44),(273,23,44),(274,23,44),(275,23,44),(276,23,44),(277,23,44),(279,23,44),(280,23,44),(281,23,44),(282,23,44),(283,23,44),(286,23,45),(291,23,45),(244,24,39),(246,24,39),(247,24,39),(251,24,40),(252,24,40),(254,24,41),(255,24,41),(257,24,42),(260,24,43),(261,24,43),(263,24,44),(264,24,44),(273,24,44),(274,24,44),(276,24,44),(277,24,44),(278,24,44),(279,24,44),(280,24,44),(282,24,44),(283,24,44),(311,24,45),(321,24,45),(244,25,39),(245,25,39),(246,25,39),(247,25,39),(249,25,39),(254,25,41),(255,25,41),(257,25,42),(259,25,43),(260,25,43),(261,25,43),(262,25,44),(263,25,44),(264,25,44),(265,25,44),(266,25,44),(267,25,44),(268,25,44),(269,25,44),(273,25,44),(274,25,44),(275,25,44),(276,25,44),(277,25,44),(279,25,44),(280,25,44),(282,25,44),(283,25,44),(244,26,39),(245,26,39),(246,26,39),(247,26,39),(251,26,40),(252,26,40),(253,26,40),(254,26,41),(255,26,41),(256,26,41),(258,26,42),(260,26,43),(261,26,43),(262,26,44),(263,26,44),(264,26,44),(265,26,44),(266,26,44),(267,26,44),(268,26,44),(269,26,44),(270,26,44),(271,26,44),(273,26,44),(274,26,44),(276,26,44),(277,26,44),(279,26,44),(280,26,44),(282,26,44),(283,26,44),(286,26,45),(288,26,45),(303,26,45),(312,26,45),(244,27,39),(246,27,39),(247,27,39),(251,27,40),(252,27,40),(254,27,41),(257,27,42),(260,27,43),(261,27,43),(262,27,44),(263,27,44),(264,27,44),(267,27,44),(273,27,44),(274,27,44),(275,27,44),(276,27,44),(277,27,44),(279,27,44),(280,27,44),(282,27,44),(283,27,44),(290,27,45),(305,27,45),(312,27,45),(314,27,45),(319,27,45),(321,27,45),(244,28,39),(245,28,39),(246,28,39),(247,28,39),(249,28,39),(250,28,39),(251,28,40),(252,28,40),(253,28,40),(254,28,41),(257,28,42),(259,28,43),(260,28,43),(261,28,43),(263,28,44),(265,28,44),(266,28,44),(267,28,44),(269,28,44),(271,28,44),(273,28,44),(274,28,44),(275,28,44),(276,28,44),(277,28,44),(280,28,44),(282,28,44),(283,28,44),(284,28,45),(296,28,45),(303,28,45),(308,28,45),(311,28,45),(321,28,45),(323,28,45),(244,30,39),(251,30,40),(252,30,40),(253,30,40),(254,30,41),(257,30,42),(260,30,43),(261,30,43),(262,30,44),(263,30,44),(264,30,44),(265,30,44),(266,30,44),(267,30,44),(268,30,44),(269,30,44),(270,30,44),(271,30,44),(273,30,44),(274,30,44),(275,30,44),(276,30,44),(277,30,44),(278,30,44),(279,30,44),(280,30,44),(281,30,44),(282,30,44),(283,30,44),(286,30,45),(319,30,45),(322,30,45),(244,31,39),(245,31,39),(246,31,39),(247,31,39),(248,31,39),(249,31,39),(250,31,39),(251,31,40),(252,31,40),(254,31,41),(257,31,42),(260,31,43),(261,31,43),(262,31,44),(263,31,44),(264,31,44),(265,31,44),(266,31,44),(267,31,44),(271,31,44),(273,31,44),(275,31,44),(276,31,44),(277,31,44),(280,31,44),(281,31,44),(282,31,44),(283,31,44),(287,31,45),(319,31,45),(322,31,45),(332,31,45),(333,31,45),(334,31,45),(244,29,39),(251,29,40),(252,29,40),(253,29,40),(254,29,41),(257,29,42),(258,29,42),(260,29,43),(261,29,43),(262,29,44),(263,29,44),(266,29,44),(267,29,44),(269,29,44),(273,29,44),(274,29,44),(275,29,44),(279,29,44),(280,29,44),(283,29,44),(285,29,45),(286,29,45),(301,29,45),(308,29,45),(322,29,45),(244,32,39),(246,32,39),(247,32,39),(251,32,40),(252,32,40),(253,32,40),(254,32,41),(257,32,42),(260,32,43),(261,32,43),(262,32,44),(263,32,44),(264,32,44),(265,32,44),(266,32,44),(267,32,44),(268,32,44),(269,32,44),(270,32,44),(271,32,44),(273,32,44),(274,32,44),(275,32,44),(276,32,44),(277,32,44),(278,32,44),(279,32,44),(280,32,44),(282,32,44),(283,32,44),(284,32,45),(286,32,45),(288,32,45),(303,32,45),(304,32,45),(306,32,45),(308,32,45),(312,32,45),(313,32,45),(314,32,45),(316,32,45),(317,32,45),(319,32,45),(321,32,45),(326,32,45),(328,32,45),(244,33,39),(251,33,40),(254,33,41),(257,33,42),(259,33,43),(260,33,43),(261,33,43),(263,33,44),(264,33,44),(266,33,44),(267,33,44),(268,33,44),(270,33,44),(273,33,44),(275,33,44),(277,33,44),(280,33,44),(283,33,44),(284,33,45),(294,33,45),(312,33,45),(320,33,45),(322,33,45),(325,33,45),(244,34,39),(245,34,39),(246,34,39),(247,34,39),(251,34,40),(252,34,40),(254,34,41),(257,34,42),(259,34,43),(260,34,43),(261,34,43),(303,34,45),(312,34,45),(314,34,45),(244,35,39),(246,35,39),(251,35,40),(252,35,40),(254,35,41),(257,35,42),(260,35,43),(261,35,43),(263,35,44),(264,35,44),(265,35,44),(266,35,44),(267,35,44),(269,35,44),(273,35,44),(274,35,44),(275,35,44),(276,35,44),(277,35,44),(279,35,44),(280,35,44),(282,35,44),(283,35,44),(284,35,45),(285,35,45),(287,35,45),(293,35,45),(300,35,45),(310,35,45),(312,35,45),(320,35,45),(323,35,45),(325,35,45),(327,35,45),(244,36,39),(251,36,40),(253,36,40),(254,36,41),(255,36,41),(257,36,42),(261,36,43),(262,36,44),(263,36,44),(264,36,44),(265,36,44),(266,36,44),(267,36,44),(268,36,44),(269,36,44),(270,36,44),(271,36,44),(273,36,44),(274,36,44),(275,36,44),(276,36,44),(277,36,44),(278,36,44),(279,36,44),(280,36,44),(282,36,44),(283,36,44),(290,36,45),(292,36,45),(293,36,45),(244,37,39),(245,37,39),(246,37,39),(247,37,39),(248,37,39),(249,37,39),(250,37,39),(251,37,40),(252,37,40),(253,37,40),(254,37,41),(257,37,42),(260,37,43),(261,37,43),(263,37,44),(265,37,44),(266,37,44),(267,37,44),(268,37,44),(269,37,44),(270,37,44),(271,37,44),(273,37,44),(274,37,44),(276,37,44),(277,37,44),(279,37,44),(280,37,44),(282,37,44),(283,37,44),(286,37,45),(290,37,45),(292,37,45),(293,37,45),(302,37,45),(244,38,39),(246,38,39),(247,38,39),(251,38,40),(252,38,40),(254,38,41),(255,38,41),(257,38,42),(259,38,43),(260,38,43),(261,38,43),(263,38,44),(264,38,44),(265,38,44),(267,38,44),(270,38,44),(273,38,44),(274,38,44),(275,38,44),(276,38,44),(277,38,44),(279,38,44),(280,38,44),(282,38,44),(283,38,44),(284,38,45),(285,38,45),(292,38,45),(312,38,45),(321,38,45),(244,39,39),(251,39,40),(254,39,41),(257,39,42),(260,39,43),(261,39,43),(262,39,44),(263,39,44),(264,39,44),(265,39,44),(271,39,44),(273,39,44),(274,39,44),(275,39,44),(276,39,44),(277,39,44),(279,39,44),(280,39,44),(282,39,44),(283,39,44),(284,39,45),(285,39,45),(286,39,45),(304,39,45),(338,39,45),(244,40,39),(251,40,40),(252,40,40),(253,40,40),(254,40,41),(257,40,42),(260,40,43),(261,40,43),(264,40,44),(267,40,44),(269,40,44),(271,40,44),(273,40,44),(274,40,44),(276,40,44),(279,40,44),(280,40,44),(282,40,44),(283,40,44),(284,40,45),(338,40,45),(339,40,45),(340,40,45),(244,41,39),(246,41,39),(247,41,39),(251,41,40),(252,41,40),(254,41,41),(257,41,42),(260,41,43),(261,41,43),(262,41,44),(263,41,44),(264,41,44),(267,41,44),(269,41,44),(270,41,44),(271,41,44),(273,41,44),(274,41,44),(276,41,44),(277,41,44),(279,41,44),(280,41,44),(282,41,44),(283,41,44),(284,41,45),(285,41,45),(312,41,45),(244,47,39),(251,47,40),(254,47,41),(257,47,42),(259,47,43),(260,47,43),(261,47,43),(262,47,44),(263,47,44),(264,47,44),(265,47,44),(267,47,44),(273,47,44),(275,47,44),(276,47,44),(277,47,44),(279,47,44),(282,47,44),(283,47,44),(284,47,45),(285,47,45),(286,47,45),(244,53,39),(251,53,40),(252,53,40),(254,53,41),(257,53,42),(260,53,43),(261,53,43),(262,53,44),(263,53,44),(264,53,44),(265,53,44),(266,53,44),(267,53,44),(269,53,44),(273,53,44),(274,53,44),(277,53,44),(280,53,44),(282,53,44),(284,53,45),(285,53,45),(299,53,45),(300,53,45),(303,53,45),(308,53,45),(244,55,39),(251,55,40),(252,55,40),(254,55,41),(255,55,41),(256,55,41),(257,55,42),(260,55,43),(261,55,43),(262,55,44),(263,55,44),(264,55,44),(266,55,44),(267,55,44),(270,55,44),(273,55,44),(274,55,44),(275,55,44),(277,55,44),(279,55,44),(280,55,44),(282,55,44),(285,55,45),(244,57,39),(251,57,40),(252,57,40),(254,57,41),(257,57,42),(259,57,43),(260,57,43),(261,57,43),(262,57,44),(263,57,44),(264,57,44),(266,57,44),(267,57,44),(271,57,44),(273,57,44),(274,57,44),(277,57,44),(280,57,44),(282,57,44),(283,57,44),(284,57,45),(285,57,45),(303,57,45),(244,58,39),(251,58,40),(254,58,41),(257,58,42),(260,58,43),(261,58,43),(262,58,44),(263,58,44),(266,58,44),(267,58,44),(271,58,44),(273,58,44),(274,58,44),(277,58,44),(280,58,44),(282,58,44),(283,58,44),(285,58,45),(286,58,45),(289,58,45),(290,58,45),(303,58,45),(312,58,45),(314,58,45),(324,58,45),(244,59,39),(246,59,39),(247,59,39),(251,59,40),(252,59,40),(254,59,41),(257,59,42),(260,59,43),(261,59,43),(262,59,44),(263,59,44),(264,59,44),(265,59,44),(266,59,44),(267,59,44),(268,59,44),(269,59,44),(270,59,44),(271,59,44),(273,59,44),(274,59,44),(275,59,44),(277,59,44),(279,59,44),(280,59,44),(281,59,44),(282,59,44),(283,59,44),(286,59,45),(287,59,45),(310,59,45),(319,59,45),(322,59,45),(332,59,45),(333,59,45),(334,59,45),(244,60,39),(251,60,40),(252,60,40),(254,60,41),(258,60,42),(259,60,43),(261,60,43),(263,60,44),(264,60,44),(265,60,44),(267,60,44),(268,60,44),(271,60,44),(273,60,44),(274,60,44),(275,60,44),(276,60,44),(277,60,44),(279,60,44),(280,60,44),(282,60,44),(283,60,44),(286,60,45),(315,60,45),(244,61,39),(245,61,39),(251,61,40),(252,61,40),(254,61,41),(255,61,41),(256,61,41),(258,61,42),(262,61,44),(263,61,44),(264,61,44),(265,61,44),(267,61,44),(269,61,44),(271,61,44),(273,61,44),(274,61,44),(275,61,44),(276,61,44),(277,61,44),(280,61,44),(281,61,44),(282,61,44),(283,61,44),(286,61,45),(305,61,45),(312,61,45),(314,61,45),(244,63,39),(251,63,40),(252,63,40),(254,63,41),(257,63,42),(258,63,42),(260,63,43),(261,63,43),(262,63,44),(263,63,44),(264,63,44),(266,63,44),(267,63,44),(269,63,44),(270,63,44),(271,63,44),(273,63,44),(274,63,44),(276,63,44),(279,63,44),(280,63,44),(282,63,44),(283,63,44),(286,63,45),(290,63,45),(292,63,45),(293,63,45),(304,63,45),(244,68,39),(251,68,40),(252,68,40),(254,68,41),(257,68,42),(259,68,43),(260,68,43),(261,68,43),(262,68,44),(263,68,44),(264,68,44),(265,68,44),(267,68,44),(268,68,44),(270,68,44),(271,68,44),(273,68,44),(274,68,44),(275,68,44),(276,68,44),(277,68,44),(279,68,44),(280,68,44),(282,68,44),(283,68,44),(286,68,45),(287,68,45),(319,68,45),(322,68,45),(332,68,45),(333,68,45),(334,68,45),(244,71,39),(251,71,40),(252,71,40),(254,71,41),(257,71,42),(261,71,43),(263,71,44),(264,71,44),(265,71,44),(267,71,44),(269,71,44),(270,71,44),(271,71,44),(273,71,44),(274,71,44),(275,71,44),(280,71,44),(283,71,44),(286,71,45),(310,71,45),(341,71,45),(244,72,39),(251,72,40),(252,72,40),(254,72,41),(257,72,42),(259,72,43),(260,72,43),(261,72,43),(263,72,44),(264,72,44),(267,72,44),(270,72,44),(271,72,44),(273,72,44),(274,72,44),(275,72,44),(276,72,44),(277,72,44),(280,72,44),(283,72,44),(289,72,45),(244,73,39),(247,73,39),(251,73,40),(252,73,40),(254,73,41),(257,73,42),(259,73,43),(260,73,43),(261,73,43),(262,73,44),(263,73,44),(265,73,44),(267,73,44),(269,73,44),(271,73,44),(273,73,44),(274,73,44),(275,73,44),(276,73,44),(277,73,44),(279,73,44),(280,73,44),(282,73,44),(283,73,44),(287,73,45),(289,73,45),(292,73,45),(293,73,45),(312,73,45),(320,73,45),(326,73,45),(244,75,39),(251,75,40),(252,75,40),(253,75,40),(254,75,41),(255,75,41),(257,75,42),(259,75,43),(260,75,43),(261,75,43),(262,75,44),(263,75,44),(264,75,44),(265,75,44),(266,75,44),(267,75,44),(268,75,44),(269,75,44),(270,75,44),(271,75,44),(273,75,44),(274,75,44),(275,75,44),(277,75,44),(278,75,44),(280,75,44),(282,75,44),(283,75,44),(290,75,45),(292,75,45),(293,75,45),(302,75,45),(304,75,45),(244,170,39),(246,170,39),(251,170,40),(252,170,40),(254,170,41),(257,170,42),(260,170,43),(261,170,43),(263,170,44),(264,170,44),(265,170,44),(269,170,44),(270,170,44),(273,170,44),(274,170,44),(275,170,44),(276,170,44),(277,170,44),(279,170,44),(280,170,44),(282,170,44),(283,170,44),(321,170,45),(342,170,45);
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
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop`
--

LOCK TABLES `prop` WRITE;
/*!40000 ALTER TABLE `prop` DISABLE KEYS */;
INSERT INTO `prop` VALUES (1,'sdf',1,10,'kTGbrr6yK4.svg'),(2,'gfhfgh',1,9,'pzMT7sL2AG.svg'),(3,NULL,2,10,'ho0TFzZBWU.svg'),(4,NULL,1,9,'kX21iV2nQk.svg'),(5,NULL,1,10,'clpon7aIeR.svg'),(6,NULL,5,10,'gNYe59kTtR.svg'),(7,NULL,5,10,'BFhpZbRo7h.svg'),(8,NULL,5,10,'lajCSSIoAx.svg'),(9,NULL,2,9,'flOLJmazLr.svg'),(10,NULL,2,10,'NVfWsyh_Ae.svg'),(11,NULL,3,9,'voy2bB80It.svg'),(12,NULL,3,9,'3NRJ1wOm-6.svg'),(13,NULL,3,10,'PjD8xyhIOS.svg'),(14,NULL,4,9,'WgT2QTxWJp.svg'),(15,NULL,4,9,'cRoPQdXP1A.svg'),(16,NULL,6,10,NULL),(17,NULL,6,9,NULL),(18,NULL,6,9,NULL),(19,NULL,6,9,NULL),(20,NULL,6,9,NULL),(21,NULL,6,9,NULL),(22,NULL,6,9,NULL),(23,NULL,6,9,NULL),(24,NULL,6,9,NULL),(25,NULL,6,9,NULL),(26,NULL,6,9,NULL),(27,NULL,6,9,NULL),(28,NULL,6,9,NULL),(29,NULL,6,9,NULL),(30,NULL,6,9,NULL),(31,NULL,6,9,NULL),(32,NULL,6,9,NULL),(33,NULL,6,9,NULL),(34,NULL,6,9,NULL),(35,NULL,6,9,NULL),(36,NULL,6,9,NULL),(37,NULL,6,9,NULL),(38,NULL,7,9,NULL),(39,NULL,7,9,NULL),(40,NULL,7,9,NULL),(41,NULL,7,9,NULL),(42,NULL,7,9,NULL),(43,NULL,7,9,NULL),(44,NULL,7,9,NULL),(45,NULL,7,9,NULL),(46,NULL,7,9,NULL),(47,NULL,7,9,NULL),(48,NULL,7,9,NULL),(49,NULL,7,9,NULL),(50,NULL,7,9,NULL),(51,NULL,7,9,NULL),(52,NULL,7,9,NULL),(53,NULL,7,9,NULL),(54,NULL,7,9,NULL),(55,NULL,7,9,NULL),(56,NULL,7,9,NULL),(57,NULL,7,9,NULL),(58,NULL,7,9,NULL),(59,NULL,7,9,NULL),(60,NULL,7,9,NULL),(61,NULL,7,9,NULL),(62,NULL,7,9,NULL),(63,NULL,9,10,'6pHPiOXOh3.svg'),(64,NULL,10,10,'K67gc3fKHZ.svg'),(65,NULL,9,10,'oJhcdiEH9S.svg'),(66,NULL,9,10,'1aSud6QMDV.svg'),(67,NULL,9,10,'ICcmCZpeIf.svg'),(68,NULL,9,9,'KdNfD788hy.svg'),(69,NULL,1,9,'jxAveRfLBi.svg'),(70,NULL,1,9,'t11uho5Q2X.svg'),(71,NULL,1,9,'1_MAA0k8CB.svg'),(72,NULL,11,10,'kTGbrr6yK4.svg'),(73,NULL,11,9,'pzMT7sL2AG.svg'),(74,NULL,11,9,'kX21iV2nQk.svg'),(75,NULL,11,10,'clpon7aIeR.svg'),(76,NULL,11,9,'jxAveRfLBi.svg'),(77,NULL,11,9,'t11uho5Q2X.svg'),(78,NULL,11,9,'1_MAA0k8CB.svg'),(79,NULL,12,10,'ho0TFzZBWU.svg'),(80,NULL,12,9,'flOLJmazLr.svg'),(81,NULL,12,10,'NVfWsyh_Ae.svg'),(82,NULL,13,9,'voy2bB80It.svg'),(83,NULL,13,9,'3NRJ1wOm-6.svg'),(84,NULL,13,10,'PjD8xyhIOS.svg'),(85,NULL,14,9,'WgT2QTxWJp.svg'),(86,NULL,14,9,'cRoPQdXP1A.svg'),(87,NULL,15,10,'gNYe59kTtR.svg'),(88,NULL,15,10,'BFhpZbRo7h.svg'),(89,NULL,15,10,'lajCSSIoAx.svg'),(90,NULL,16,10,NULL),(91,NULL,16,9,NULL),(92,NULL,16,9,NULL),(93,NULL,16,9,NULL),(94,NULL,16,9,NULL),(95,NULL,16,9,NULL),(96,NULL,16,9,NULL),(97,NULL,16,9,NULL),(98,NULL,16,9,NULL),(99,NULL,16,9,NULL),(100,NULL,16,9,NULL),(101,NULL,16,9,NULL),(102,NULL,16,9,NULL),(103,NULL,16,9,NULL),(104,NULL,16,9,NULL),(105,NULL,16,9,NULL),(106,NULL,16,9,NULL),(107,NULL,16,9,NULL),(108,NULL,16,9,NULL),(109,NULL,16,9,NULL),(110,NULL,16,9,NULL),(111,NULL,16,9,NULL),(112,NULL,17,9,NULL),(113,NULL,17,9,NULL),(114,NULL,17,9,NULL),(115,NULL,17,9,NULL),(116,NULL,17,9,NULL),(117,NULL,17,9,NULL),(118,NULL,17,9,NULL),(119,NULL,17,9,NULL),(120,NULL,17,9,NULL),(121,NULL,17,9,NULL),(122,NULL,17,9,NULL),(123,NULL,17,9,NULL),(124,NULL,17,9,NULL),(125,NULL,17,9,NULL),(126,NULL,17,9,NULL),(127,NULL,17,9,NULL),(128,NULL,17,9,NULL),(129,NULL,17,9,NULL),(130,NULL,17,9,NULL),(131,NULL,17,9,NULL),(132,NULL,17,9,NULL),(133,NULL,17,9,NULL),(134,NULL,17,9,NULL),(135,NULL,17,9,NULL),(136,NULL,17,9,NULL),(137,NULL,18,10,'6pHPiOXOh3.svg'),(138,NULL,18,10,'oJhcdiEH9S.svg'),(139,NULL,18,10,'1aSud6QMDV.svg'),(140,NULL,18,10,'ICcmCZpeIf.svg'),(141,NULL,18,9,'KdNfD788hy.svg'),(142,NULL,19,10,'kTGbrr6yK4.svg'),(143,NULL,19,9,'pzMT7sL2AG.svg'),(144,NULL,19,9,'kX21iV2nQk.svg'),(145,NULL,19,10,'clpon7aIeR.svg'),(146,NULL,19,9,'jxAveRfLBi.svg'),(147,NULL,19,9,'t11uho5Q2X.svg'),(148,NULL,19,9,'1_MAA0k8CB.svg'),(149,NULL,20,10,'kTGbrr6yK4.svg'),(150,NULL,20,9,'pzMT7sL2AG.svg'),(151,NULL,20,9,'kX21iV2nQk.svg'),(152,NULL,20,10,'clpon7aIeR.svg'),(153,NULL,20,9,'jxAveRfLBi.svg'),(154,NULL,20,9,'t11uho5Q2X.svg'),(155,NULL,20,9,'1_MAA0k8CB.svg'),(156,NULL,21,10,'kTGbrr6yK4.svg'),(157,NULL,21,9,'pzMT7sL2AG.svg'),(158,NULL,21,9,'kX21iV2nQk.svg'),(159,NULL,21,10,'clpon7aIeR.svg'),(160,NULL,21,9,'jxAveRfLBi.svg'),(161,NULL,21,9,'t11uho5Q2X.svg'),(162,NULL,21,9,'1_MAA0k8CB.svg'),(163,NULL,22,10,'ho0TFzZBWU.svg'),(164,NULL,22,9,'flOLJmazLr.svg'),(165,NULL,22,10,'NVfWsyh_Ae.svg'),(166,NULL,23,10,'kTGbrr6yK4.svg'),(167,NULL,23,9,'pzMT7sL2AG.svg'),(168,NULL,23,9,'kX21iV2nQk.svg'),(169,NULL,23,10,'clpon7aIeR.svg'),(170,NULL,23,9,'jxAveRfLBi.svg'),(171,NULL,23,9,'t11uho5Q2X.svg'),(172,NULL,23,9,'1_MAA0k8CB.svg'),(173,NULL,24,10,'ho0TFzZBWU.svg'),(174,NULL,24,9,'flOLJmazLr.svg'),(175,NULL,24,10,'NVfWsyh_Ae.svg'),(176,NULL,25,10,'kTGbrr6yK4.svg'),(177,NULL,25,9,'pzMT7sL2AG.svg'),(178,NULL,25,9,'kX21iV2nQk.svg'),(179,NULL,25,10,'clpon7aIeR.svg'),(180,NULL,25,9,'jxAveRfLBi.svg'),(181,NULL,25,9,'t11uho5Q2X.svg'),(182,NULL,25,9,'1_MAA0k8CB.svg'),(183,NULL,26,10,'ho0TFzZBWU.svg'),(184,NULL,26,9,'flOLJmazLr.svg'),(185,NULL,26,10,'NVfWsyh_Ae.svg'),(186,NULL,27,10,'kTGbrr6yK4.svg'),(187,NULL,27,9,'pzMT7sL2AG.svg'),(188,NULL,27,9,'kX21iV2nQk.svg'),(189,NULL,27,10,'clpon7aIeR.svg'),(190,NULL,27,9,'jxAveRfLBi.svg'),(191,NULL,27,9,'t11uho5Q2X.svg'),(192,NULL,27,9,'1_MAA0k8CB.svg'),(193,NULL,28,10,'ho0TFzZBWU.svg'),(194,NULL,28,9,'flOLJmazLr.svg'),(195,NULL,28,10,'NVfWsyh_Ae.svg'),(196,NULL,29,10,'kTGbrr6yK4.svg'),(197,NULL,29,9,'pzMT7sL2AG.svg'),(198,NULL,29,9,'kX21iV2nQk.svg'),(199,NULL,29,10,'clpon7aIeR.svg'),(200,NULL,29,9,'jxAveRfLBi.svg'),(201,NULL,29,9,'t11uho5Q2X.svg'),(202,NULL,29,9,'1_MAA0k8CB.svg'),(203,NULL,30,10,'ho0TFzZBWU.svg'),(204,NULL,30,9,'flOLJmazLr.svg'),(205,NULL,30,10,'NVfWsyh_Ae.svg'),(206,NULL,31,10,'kTGbrr6yK4.svg'),(207,NULL,31,9,'pzMT7sL2AG.svg'),(208,NULL,31,9,'kX21iV2nQk.svg'),(209,NULL,31,10,'clpon7aIeR.svg'),(210,NULL,31,9,'jxAveRfLBi.svg'),(211,NULL,31,9,'t11uho5Q2X.svg'),(212,NULL,31,9,'1_MAA0k8CB.svg'),(213,NULL,32,10,'ho0TFzZBWU.svg'),(214,NULL,32,9,'flOLJmazLr.svg'),(215,NULL,32,10,'NVfWsyh_Ae.svg'),(216,NULL,33,10,'kTGbrr6yK4.svg'),(217,NULL,33,9,'pzMT7sL2AG.svg'),(218,NULL,33,9,'kX21iV2nQk.svg'),(219,NULL,33,10,'clpon7aIeR.svg'),(220,NULL,33,9,'jxAveRfLBi.svg'),(221,NULL,33,9,'t11uho5Q2X.svg'),(222,NULL,33,9,'1_MAA0k8CB.svg'),(223,NULL,34,10,'ho0TFzZBWU.svg'),(224,NULL,34,9,'flOLJmazLr.svg'),(225,NULL,34,10,'NVfWsyh_Ae.svg'),(226,NULL,35,10,'6pHPiOXOh3.svg'),(227,NULL,35,10,'oJhcdiEH9S.svg'),(228,NULL,35,10,'1aSud6QMDV.svg'),(229,NULL,35,10,'ICcmCZpeIf.svg'),(230,NULL,35,9,'KdNfD788hy.svg'),(231,NULL,36,10,'kTGbrr6yK4.svg'),(232,NULL,36,9,'pzMT7sL2AG.svg'),(233,NULL,36,9,'kX21iV2nQk.svg'),(234,NULL,36,10,'clpon7aIeR.svg'),(235,NULL,36,9,'jxAveRfLBi.svg'),(236,NULL,36,9,'t11uho5Q2X.svg'),(237,NULL,36,9,'1_MAA0k8CB.svg'),(238,NULL,37,10,'ho0TFzZBWU.svg'),(239,NULL,37,9,'flOLJmazLr.svg'),(240,NULL,37,10,'NVfWsyh_Ae.svg'),(241,NULL,38,9,'voy2bB80It.svg'),(242,NULL,38,9,'3NRJ1wOm-6.svg'),(243,NULL,38,10,'PjD8xyhIOS.svg'),(244,NULL,39,10,'kTGbrr6yK4.svg'),(245,NULL,39,9,'pzMT7sL2AG.svg'),(246,NULL,39,9,'kX21iV2nQk.svg'),(247,NULL,39,10,'clpon7aIeR.svg'),(248,NULL,39,9,'jxAveRfLBi.svg'),(249,NULL,39,9,'t11uho5Q2X.svg'),(250,NULL,39,9,'1_MAA0k8CB.svg'),(251,NULL,40,10,'ho0TFzZBWU.svg'),(252,NULL,40,9,'flOLJmazLr.svg'),(253,NULL,40,10,'NVfWsyh_Ae.svg'),(254,NULL,41,9,'voy2bB80It.svg'),(255,NULL,41,9,'3NRJ1wOm-6.svg'),(256,NULL,41,10,'PjD8xyhIOS.svg'),(257,NULL,42,9,'WgT2QTxWJp.svg'),(258,NULL,42,9,'cRoPQdXP1A.svg'),(259,NULL,43,10,'gNYe59kTtR.svg'),(260,NULL,43,10,'BFhpZbRo7h.svg'),(261,NULL,43,10,'lajCSSIoAx.svg'),(262,NULL,44,10,NULL),(263,NULL,44,9,NULL),(264,NULL,44,9,NULL),(265,NULL,44,9,NULL),(266,NULL,44,9,NULL),(267,NULL,44,9,NULL),(268,NULL,44,9,NULL),(269,NULL,44,9,NULL),(270,NULL,44,9,NULL),(271,NULL,44,9,NULL),(272,NULL,44,9,NULL),(273,NULL,44,9,NULL),(274,NULL,44,9,NULL),(275,NULL,44,9,NULL),(276,NULL,44,9,NULL),(277,NULL,44,9,NULL),(278,NULL,44,9,NULL),(279,NULL,44,9,NULL),(280,NULL,44,9,NULL),(281,NULL,44,9,NULL),(282,NULL,44,9,NULL),(283,NULL,44,9,NULL),(284,NULL,45,9,NULL),(285,NULL,45,9,NULL),(286,NULL,45,9,NULL),(287,NULL,45,9,NULL),(288,NULL,45,9,NULL),(289,NULL,45,9,NULL),(290,NULL,45,9,NULL),(291,NULL,45,9,NULL),(292,NULL,45,9,NULL),(293,NULL,45,9,NULL),(294,NULL,45,9,NULL),(295,NULL,45,9,NULL),(296,NULL,45,9,NULL),(297,NULL,45,9,NULL),(298,NULL,45,9,NULL),(299,NULL,45,9,NULL),(300,NULL,45,9,NULL),(301,NULL,45,9,NULL),(302,NULL,45,9,NULL),(303,NULL,45,9,NULL),(304,NULL,45,9,NULL),(305,NULL,45,9,NULL),(306,NULL,45,9,NULL),(307,NULL,45,9,NULL),(308,NULL,45,9,NULL),(309,NULL,45,9,NULL),(310,NULL,45,9,NULL),(311,NULL,45,9,NULL),(312,NULL,45,9,NULL),(313,NULL,45,9,NULL),(314,NULL,45,9,NULL),(315,NULL,45,9,NULL),(316,NULL,45,9,NULL),(317,NULL,45,9,NULL),(318,NULL,45,9,NULL),(319,NULL,45,9,NULL),(320,NULL,45,9,NULL),(321,NULL,45,9,NULL),(322,NULL,45,9,NULL),(323,NULL,45,9,NULL),(324,NULL,45,9,NULL),(325,NULL,45,9,NULL),(326,NULL,45,9,NULL),(327,NULL,45,9,NULL),(328,NULL,45,9,NULL),(329,NULL,45,9,NULL),(330,NULL,45,9,NULL),(331,NULL,45,9,NULL),(332,NULL,45,9,NULL),(333,NULL,45,9,NULL),(334,NULL,45,9,NULL),(335,NULL,45,9,NULL),(336,NULL,45,9,NULL),(337,NULL,45,9,NULL),(338,NULL,45,9,NULL),(339,NULL,45,9,NULL),(340,NULL,45,9,NULL),(341,NULL,45,9,NULL),(342,NULL,45,9,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_lang`
--

LOCK TABLES `prop_lang` WRITE;
/*!40000 ALTER TABLE `prop_lang` DISABLE KEYS */;
INSERT INTO `prop_lang` VALUES (1,1,'Веб - приложение','ru'),(2,2,'Windows','ru'),(3,3,'Малый бизнес','ru'),(4,4,'Андройд','ru'),(5,5,'iOS','ru'),(6,6,'Бесплатный период','ru'),(7,7,'Подробный период','ru'),(8,8,'Подписка','ru'),(9,9,'Средний бизнес','ru'),(10,10,'Большой бизнес','ru'),(11,11,'В облаке','ru'),(12,12,'На сервере','ru'),(13,13,'На компьютере','ru'),(14,14,'По подписке','ru'),(15,15,'Разовая оплата','ru'),(16,16,'Воронка продаж','ru'),(17,17,'База клиентов','ru'),(18,18,'Управление заказами','ru'),(19,19,'Продуктовый каталог','ru'),(20,20,'Колл-центр и телефония','ru'),(21,21,'История взаимодействия с клиентом','ru'),(22,22,'Системы лояльности','ru'),(23,23,'Мониторинг эффективности персонала','ru'),(24,24,'Тайм-менеджмент','ru'),(25,25,'Управление поддержкой','ru'),(26,26,'Открытый исходный код','ru'),(27,27,'Отчёты','ru'),(28,28,'Интеграция с почтой','ru'),(29,29,'Email-рассылки','ru'),(30,30,'Шаблоны проектов','ru'),(31,31,'Хранилище файлов','ru'),(32,32,'Диаграмма Ганта','ru'),(33,33,'Биллинг и счета','ru'),(34,34,'Экспорт/импорт данных','ru'),(35,35,'Подключение Фис.регистратора','ru'),(36,36,'API для интеграции','ru'),(37,37,'Веб-формы','ru'),(38,38,'Ритейл','ru'),(39,39,'Интернет-магазин','ru'),(40,40,'Сфера услуг','ru'),(41,41,'Фитнес клубы','ru'),(42,42,'Автосервисы','ru'),(43,43,'Юридические компании','ru'),(44,44,'Агентства','ru'),(45,45,'Турагентство','ru'),(46,46,'Недвижимость','ru'),(47,47,'Агентство недвижимости','ru'),(48,48,'Логистика и транспорт','ru'),(49,49,'Медицина','ru'),(50,50,'IT-технологии','ru'),(51,51,'Клиники','ru'),(52,52,'Врачи','ru'),(53,53,'Склад','ru'),(54,54,'Курьерские службы','ru'),(55,55,'Колл-центр','ru'),(56,56,'Риэлторы','ru'),(57,57,'B2B-компании','ru'),(58,58,'Строительный бизнес','ru'),(59,59,'Полиграфии','ru'),(60,60,'Товарный бизнес','ru'),(61,61,'Франшиза','ru'),(62,62,'Маркетплейсы','ru'),(63,63,'Веб приложение','ru'),(64,64,'prop1','ru'),(65,65,'Приложение','ru'),(66,66,'Андройд','ru'),(67,67,'IOS','ru'),(68,68,'Линукс','ru'),(69,69,'Windows Phone','ru'),(70,70,'Mac','ru'),(71,71,'Linux','ru'),(72,72,'Веб - приложение','ru'),(73,73,'Windows','ru'),(74,74,'Андройд','ru'),(75,75,'iOS','ru'),(76,76,'Windows Phone','ru'),(77,77,'Mac','ru'),(78,78,'Linux','ru'),(79,79,'Малый бизнес','ru'),(80,80,'Средний бизнес','ru'),(81,81,'Большой бизнес','ru'),(82,82,'В облаке','ru'),(83,83,'На сервере','ru'),(84,84,'На компьютере','ru'),(85,85,'По подписке','ru'),(86,86,'Разовая оплата','ru'),(87,87,'Бесплатный период','ru'),(88,88,'Подробный период','ru'),(89,89,'Подписка','ru'),(90,90,'Воронка продаж','ru'),(91,91,'База клиентов','ru'),(92,92,'Управление заказами','ru'),(93,93,'Продуктовый каталог','ru'),(94,94,'Колл-центр и телефония','ru'),(95,95,'История взаимодействия с клиентом','ru'),(96,96,'Системы лояльности','ru'),(97,97,'Мониторинг эффективности персонала','ru'),(98,98,'Тайм-менеджмент','ru'),(99,99,'Управление поддержкой','ru'),(100,100,'Открытый исходный код','ru'),(101,101,'Отчёты','ru'),(102,102,'Интеграция с почтой','ru'),(103,103,'Email-рассылки','ru'),(104,104,'Шаблоны проектов','ru'),(105,105,'Хранилище файлов','ru'),(106,106,'Диаграмма Ганта','ru'),(107,107,'Биллинг и счета','ru'),(108,108,'Экспорт/импорт данных','ru'),(109,109,'Подключение Фис.регистратора','ru'),(110,110,'API для интеграции','ru'),(111,111,'Веб-формы','ru'),(112,112,'Ритейл','ru'),(113,113,'Интернет-магазин','ru'),(114,114,'Сфера услуг','ru'),(115,115,'Фитнес клубы','ru'),(116,116,'Автосервисы','ru'),(117,117,'Юридические компании','ru'),(118,118,'Агентства','ru'),(119,119,'Турагентство','ru'),(120,120,'Недвижимость','ru'),(121,121,'Агентство недвижимости','ru'),(122,122,'Логистика и транспорт','ru'),(123,123,'Медицина','ru'),(124,124,'IT-технологии','ru'),(125,125,'Клиники','ru'),(126,126,'Врачи','ru'),(127,127,'Склад','ru'),(128,128,'Курьерские службы','ru'),(129,129,'Колл-центр','ru'),(130,130,'Риэлторы','ru'),(131,131,'B2B-компании','ru'),(132,132,'Строительный бизнес','ru'),(133,133,'Полиграфии','ru'),(134,134,'Товарный бизнес','ru'),(135,135,'Франшиза','ru'),(136,136,'Маркетплейсы','ru'),(137,137,'Веб приложение','ru'),(138,138,'Приложение','ru'),(139,139,'Андройд','ru'),(140,140,'IOS','ru'),(141,141,'Линукс','ru'),(142,142,'Веб - приложение','ru'),(143,143,'Windows','ru'),(144,144,'Андройд','ru'),(145,145,'iOS','ru'),(146,146,'Windows Phone','ru'),(147,147,'Mac','ru'),(148,148,'Linux','ru'),(149,149,'Веб - приложение','ru'),(150,150,'Windows','ru'),(151,151,'Андройд','ru'),(152,152,'iOS','ru'),(153,153,'Windows Phone','ru'),(154,154,'Mac','ru'),(155,155,'Linux','ru'),(156,156,'Веб - приложение','ru'),(157,157,'Windows','ru'),(158,158,'Андройд','ru'),(159,159,'iOS','ru'),(160,160,'Windows Phone','ru'),(161,161,'Mac','ru'),(162,162,'Linux','ru'),(163,163,'Малый бизнес','ru'),(164,164,'Средний бизнес','ru'),(165,165,'Большой бизнес','ru'),(166,166,'Веб - приложение','ru'),(167,167,'Windows','ru'),(168,168,'Андройд','ru'),(169,169,'iOS','ru'),(170,170,'Windows Phone','ru'),(171,171,'Mac','ru'),(172,172,'Linux','ru'),(173,173,'Малый бизнес','ru'),(174,174,'Средний бизнес','ru'),(175,175,'Большой бизнес','ru'),(176,176,'Веб - приложение','ru'),(177,177,'Windows','ru'),(178,178,'Андройд','ru'),(179,179,'iOS','ru'),(180,180,'Windows Phone','ru'),(181,181,'Mac','ru'),(182,182,'Linux','ru'),(183,183,'Малый бизнес','ru'),(184,184,'Средний бизнес','ru'),(185,185,'Большой бизнес','ru'),(186,186,'Веб - приложение','ru'),(187,187,'Windows','ru'),(188,188,'Андройд','ru'),(189,189,'iOS','ru'),(190,190,'Windows Phone','ru'),(191,191,'Mac','ru'),(192,192,'Linux','ru'),(193,193,'Малый бизнес','ru'),(194,194,'Средний бизнес','ru'),(195,195,'Большой бизнес','ru'),(196,196,'Веб - приложение','ru'),(197,197,'Windows','ru'),(198,198,'Андройд','ru'),(199,199,'iOS','ru'),(200,200,'Windows Phone','ru'),(201,201,'Mac','ru'),(202,202,'Linux','ru'),(203,203,'Малый бизнес','ru'),(204,204,'Средний бизнес','ru'),(205,205,'Большой бизнес','ru'),(206,206,'Веб - приложение','ru'),(207,207,'Windows','ru'),(208,208,'Андройд','ru'),(209,209,'iOS','ru'),(210,210,'Windows Phone','ru'),(211,211,'Mac','ru'),(212,212,'Linux','ru'),(213,213,'Малый бизнес','ru'),(214,214,'Средний бизнес','ru'),(215,215,'Большой бизнес','ru'),(216,216,'Веб - приложение','ru'),(217,217,'Windows','ru'),(218,218,'Андройд','ru'),(219,219,'iOS','ru'),(220,220,'Windows Phone','ru'),(221,221,'Mac','ru'),(222,222,'Linux','ru'),(223,223,'Малый бизнес','ru'),(224,224,'Средний бизнес','ru'),(225,225,'Большой бизнес','ru'),(226,226,'Веб приложение','ru'),(227,227,'Приложение','ru'),(228,228,'Андройд','ru'),(229,229,'IOS','ru'),(230,230,'Линукс','ru'),(231,231,'Веб - приложение','ru'),(232,232,'Windows','ru'),(233,233,'Андройд','ru'),(234,234,'iOS','ru'),(235,235,'Windows Phone','ru'),(236,236,'Mac','ru'),(237,237,'Linux','ru'),(238,238,'Малый бизнес','ru'),(239,239,'Средний бизнес','ru'),(240,240,'Большой бизнес','ru'),(241,241,'В облаке','ru'),(242,242,'На сервере','ru'),(243,243,'На компьютере','ru'),(244,244,'Веб - приложение','ru'),(245,245,'Windows','ru'),(246,246,'Андройд','ru'),(247,247,'iOS','ru'),(248,248,'Windows Phone','ru'),(249,249,'Mac','ru'),(250,250,'Linux','ru'),(251,251,'Малый бизнес','ru'),(252,252,'Средний бизнес','ru'),(253,253,'Большой бизнес','ru'),(254,254,'В облаке','ru'),(255,255,'На сервере','ru'),(256,256,'На компьютере','ru'),(257,257,'По подписке','ru'),(258,258,'Разовая оплата','ru'),(259,259,'Бесплатный период','ru'),(260,260,'Подробный период','ru'),(261,261,'Подписка','ru'),(262,262,'Воронка продаж','ru'),(263,263,'База клиентов','ru'),(264,264,'Управление заказами','ru'),(265,265,'Продуктовый каталог','ru'),(266,266,'Колл-центр и телефония','ru'),(267,267,'История взаимодействия с клиентом','ru'),(268,268,'Системы лояльности','ru'),(269,269,'Мониторинг эффективности персонала','ru'),(270,270,'Тайм-менеджмент','ru'),(271,271,'Управление поддержкой','ru'),(272,272,'Открытый исходный код','ru'),(273,273,'Отчёты','ru'),(274,274,'Интеграция с почтой','ru'),(275,275,'Email-рассылки','ru'),(276,276,'Шаблоны проектов','ru'),(277,277,'Хранилище файлов','ru'),(278,278,'Диаграмма Ганта','ru'),(279,279,'Биллинг и счета','ru'),(280,280,'Экспорт/импорт данных','ru'),(281,281,'Подключение Фис.регистратора','ru'),(282,282,'API для интеграции','ru'),(283,283,'Веб-формы','ru'),(284,284,'Ритейл','ru'),(285,285,'Интернет-магазин','ru'),(286,286,'Сфера услуг','ru'),(287,287,'Фитнес клубы','ru'),(288,288,'Автосервисы','ru'),(289,289,'Юридические компании','ru'),(290,290,'Агентства','ru'),(291,291,'Турагентство','ru'),(292,292,'Недвижимость','ru'),(293,293,'Агентство недвижимости','ru'),(294,294,'Логистика и транспорт','ru'),(295,295,'Медицина','ru'),(296,296,'IT-технологии','ru'),(297,297,'Клиники','ru'),(298,298,'Врачи','ru'),(299,299,'Склад','ru'),(300,300,'Курьерские службы','ru'),(301,301,'Колл-центр','ru'),(302,302,'Риэлторы','ru'),(303,303,'B2B-компании','ru'),(304,304,'Строительный бизнес','ru'),(305,305,'Полиграфии','ru'),(306,306,'Товарный бизнес','ru'),(307,307,'Франшиза','ru'),(308,308,'Маркетплейсы','ru'),(309,309,'арара','ru'),(310,310,'Салон красоты','ru'),(311,311,'Универсальная','ru'),(312,312,'Универсальная','ru'),(313,313,'Оконный бизнес','ru'),(314,314,'Рекламное агентство','ru'),(315,315,'Гостиницы ','ru'),(316,316,'Консалтинг','ru'),(317,317,'Мебельный бизнес','ru'),(318,318,'Клининговые компании','ru'),(319,319,'Автошколы','ru'),(320,320,'МФО','ru'),(321,321,'Аренда и прокат','ru'),(322,322,'Языковые школы','ru'),(323,323,'Коллекторское агентство','ru'),(324,324,'Кадровые агентства ','ru'),(325,325,'Финансы','ru'),(326,326,'Цветочный магазин','ru'),(327,327,'Стоматология','ru'),(328,328,'Ветеринарная клиника','ru'),(329,329,'Доставка еды','ru'),(330,330,'Доставка еды','ru'),(331,331,'Рестораны','ru'),(332,332,'Музыкальные школы','ru'),(333,333,'Школы танцев','ru'),(334,334,'Тренинги','ru'),(335,335,'Поставщики тендеров','ru'),(336,336,'ЖКХ','ru'),(337,337,'Сервис центры','ru'),(338,338,'Оптовые продажи','ru'),(339,339,'Тендеры','ru'),(340,340,'Закупки','ru'),(341,341,'Барбершоп','ru'),(342,342,'Автопрокат','ru');
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

-- Dump completed on 2022-03-16 12:08:16
