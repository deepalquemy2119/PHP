-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: prueba_php
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `busca_servicio` varchar(255) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_company`),
  CONSTRAINT `CONSTRAINT_1` CHECK (char_length(`nombre`) > 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (char_length(`busca_servicio`) >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'buho-13','buho-13@gmail.com','$2y$10$0yt8EIW2.RVIqZAmgkjTfuqq38YElasslHoUzhhR9ARGZbyvYEJtS','se juntan aves de tipo buho. ','cazadores de buhos.','2024-10-28 18:19:20'),(2,'up-72','up-72@gmail.com','$2y$10$m7PH0AMghoUKqPjKjCN/uurt4PqEV5aOl0sau7Ds/rLKgpRKQtOtq','queremos mas ups, para diferentes numeros','gente conn ganas  de emprender, soñar y crear','2024-10-28 19:54:18'),(3,'myC2B-001','myC2B001@gmail.com','$2y$10$eDC38iOlsrMQ0Keo2sNZYeB3/Vcng4rCzchY5etgLdJSsD2vWeh8O','somos un futuro CRM','Desarrollador de base de datos relacional.','2024-10-29 17:05:17'),(4,'chusma-03','chusma-03@gmail.com','$2y$10$iWY0BQeBf2y844v65CmHwuIroB41i8gZbqI2aLScoHNi5m7MHEVce','puro chusmeo. muchas historias. nada serio, todo bromas...!!!','mas chismosos','2024-10-29 19:36:38');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_rubros`
--

DROP TABLE IF EXISTS `company_rubros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_rubros` (
  `id_company` int(11) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  PRIMARY KEY (`id_company`,`id_rubro`),
  KEY `id_rubro` (`id_rubro`),
  CONSTRAINT `company_rubros_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_rubros_ibfk_2` FOREIGN KEY (`id_rubro`) REFERENCES `rubros` (`id_rubro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_rubros`
--

LOCK TABLES `company_rubros` WRITE;
/*!40000 ALTER TABLE `company_rubros` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_rubros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_applications`
--

DROP TABLE IF EXISTS `job_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_applications` (
  `id_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_offer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha_solicitud` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_application`),
  KEY `id_offer` (`id_offer`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `job_offers` (`id_offer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `job_applications_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_applications`
--

LOCK TABLES `job_applications` WRITE;
/*!40000 ALTER TABLE `job_applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_offers`
--

DROP TABLE IF EXISTS `job_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_offers` (
  `id_offer` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_publicacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_offer`),
  KEY `id_company` (`id_company`),
  CONSTRAINT `job_offers_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CONSTRAINT_1` CHECK (char_length(`titulo`) > 0)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_offers`
--

LOCK TABLES `job_offers` WRITE;
/*!40000 ALTER TABLE `job_offers` DISABLE KEYS */;
INSERT INTO `job_offers` VALUES (1,1,'se busca cazadores de buhos. expertos, nivel DIOS...!!!','que sepan sobre buhos y se caza de manera efectiva, y sin riesgo para elanimal. Para devolverlo a la naturaleza.','2024-10-29 17:38:06'),(2,1,'talabarteria en vestimenta de buhos','busco, piezas para vestir buhos','2024-10-29 17:43:31'),(3,4,'se buscan chismosos','que no sepan nada de nada. pero  que hablen por dos pesos.','2024-10-29 19:37:53');
/*!40000 ALTER TABLE `job_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubros`
--

DROP TABLE IF EXISTS `rubros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubros` (
  `id_rubro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rubro` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rubro`),
  UNIQUE KEY `nombre_rubro` (`nombre_rubro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubros`
--

LOCK TABLES `rubros` WRITE;
/*!40000 ALTER TABLE `rubros` DISABLE KEYS */;
/*!40000 ALTER TABLE `rubros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre_servicio` varchar(100) NOT NULL,
  `descripcion_servicio` text NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_service`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CONSTRAINT_1` CHECK (char_length(`nombre_servicio`) > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_skill` varchar(100) NOT NULL,
  PRIMARY KEY (`id_skill`),
  UNIQUE KEY `nombre_skill` (`nombre_skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_skills`
--

DROP TABLE IF EXISTS `user_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_skills` (
  `id_user` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_skill`),
  KEY `id_skill` (`id_skill`),
  CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_skills`
--

LOCK TABLES `user_skills` WRITE;
/*!40000 ALTER TABLE `user_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `CONSTRAINT_1` CHECK (char_length(`username`) > 0),
  CONSTRAINT `CONSTRAINT_2` CHECK (char_length(`email`) > 0),
  CONSTRAINT `CONSTRAINT_3` CHECK (char_length(`password`) >= 8)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'gonza','gonza@gmail.com','$2y$10$n9Pm5i7SBC.11QoCBF8a9OO3EMX/Zxtwcw67l8Wh7mLlBC1oBvqKu','2024-10-28 18:20:27'),(2,'mariana-72','mariana-72@gmail.com','$2y$10$3DH5KZfz6VOU2c7KIKvozu6tFkOjglFaesD3jqzEvmkKjXBAF/NRG','2024-10-28 19:51:03'),(3,'pupi-32','pupi-32@gmail.com','$2y$10$.heA2vaznU6E6/7mp0vAzuxIigHeXjxRJ6QD4u3.dWs5xLKfNq/wW','2024-10-28 20:26:17'),(4,'pupi-109','pupi-109@gmail.com','$2y$10$7KqexqOmm5AHe7U5cotg5e67UbvxDX1DtZb0xawsqM7KFP8lN6Q9q','2024-10-28 20:28:35'),(5,'pupi-10','pupi-10@gmail.com','$2y$10$JzOS.f6VQrIR86KqJ5FrqOFAMR0d5s3q8ViDOFatuESESsGDF6yGu','2024-10-28 20:29:21'),(6,'max-91','max-91@gmail.com','$2y$10$B79R9ViKXfQoJwv43Ze7V.wfghnWylqa0QnnW9J2kVMFmtJHK77jC','2024-10-28 20:31:30'),(7,'horace-203','horace-203@gmail.com','$2y$10$1XjtVBOpSEMPtLU.uKCPKuWDkeM946vil503XotyyeBCdWXYCbTGS','2024-10-29 17:03:44');
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

-- Dump completed on 2024-10-30 17:53:08
