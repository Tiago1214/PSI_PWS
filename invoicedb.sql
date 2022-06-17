-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: invoicedb
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(150) NOT NULL,
  `codpostal` varchar(8) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `capitalsocial` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (2,'PcLoja','pcloja@outlook.com','245639850',850149347,'Rua Cidade de Leiria, n10','2490-427','Leiria',250000);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faturas`
--

DROP TABLE IF EXISTS `faturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valortotal` float NOT NULL,
  `ivatotal` float NOT NULL,
  `estado` varchar(15) NOT NULL,
  `cliente_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_faturas_users1_idx` (`cliente_id`),
  KEY `fk_faturas_users2_idx` (`user_id`),
  CONSTRAINT `fk_faturas_users1` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_faturas_users2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faturas`
--

LOCK TABLES `faturas` WRITE;
/*!40000 ALTER TABLE `faturas` DISABLE KEYS */;
INSERT INTO `faturas` VALUES (44,'2022-06-17 03:13:37',8121.49,1258.49,'emitida',28,1),(45,'2022-06-17 03:14:43',2339.27,208.27,'emitida',29,1),(46,'2022-06-17 03:16:03',18160.6,1971.57,'emitida',30,1),(47,'2022-06-17 03:17:23',103464,12138.8,'emitida',30,1);
/*!40000 ALTER TABLE `faturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ivas`
--

DROP TABLE IF EXISTS `ivas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percentagem` decimal(10,0) unsigned NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `emvigor` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ivas`
--

LOCK TABLES `ivas` WRITE;
/*!40000 ALTER TABLE `ivas` DISABLE KEYS */;
INSERT INTO `ivas` VALUES (1,23,'Taxa Normal',1),(3,13,'Taxa Intermedia',1),(4,6,'Taxa Reduzida',1),(5,21,'Nao Esta em Vigor',0);
/*!40000 ALTER TABLE `ivas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linhafaturas`
--

DROP TABLE IF EXISTS `linhafaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `linhafaturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` int NOT NULL,
  `valorunitario` float NOT NULL,
  `valoriva` float NOT NULL,
  `fatura_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `taxaiva` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fatura_id` (`fatura_id`),
  KEY `fk_linhafaturas_produtos1_idx` (`produto_id`),
  CONSTRAINT `fk_linhafaturas_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  CONSTRAINT `linhafaturas_ibfk_1` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linhafaturas`
--

LOCK TABLES `linhafaturas` WRITE;
/*!40000 ALTER TABLE `linhafaturas` DISABLE KEYS */;
INSERT INTO `linhafaturas` VALUES (45,8,450,103.5,44,15,23),(46,1,1139,148.07,44,11,13),(47,7,9,2.07,44,17,23),(48,1,801,104.13,44,8,13),(49,2,630,81.9,44,13,13),(50,4,1,0.23,45,10,23),(51,1,1139,148.07,45,11,13),(52,6,18,1.08,45,14,6),(53,5,100,6,45,16,6),(54,1,380,22.8,45,12,6),(55,3,1139,148.07,46,11,13),(56,100,18,1.08,46,14,6),(57,2,50,3,46,9,6),(58,2,630,81.9,46,13,13),(59,12,801,104.13,46,8,13),(60,45,1139,148.07,47,11,13),(61,6,450,103.5,47,15,23),(62,5,630,81.9,47,13,13),(63,30,1139,148.07,47,11,13),(64,1,50,3,47,9,6);
/*!40000 ALTER TABLE `linhafaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(15) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `stock` int NOT NULL,
  `iva_id` int NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia_UNIQUE` (`referencia`),
  KEY `fk_produtos_ivas1_idx` (`iva_id`),
  CONSTRAINT `fk_produtos_ivas1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (8,'2123312122','portatil lenovo',801,0,3,1),(9,'564652344','Coluna Bluetooth JBL Xtreme GM (40W - Autonomia 15 horas)',50,42,4,1),(10,'12334121111','Televisão LG Série QNED82 SmartTV 65\" QNED 4K UHD',1,1,1,1),(11,'1231231234442','Computador Desktop PCDIGA Gaming GML-NR55ME2',1139,-10,3,1),(12,'12342112444','Cadeira Gaming Alpha Gamer Phenix PU Leather Preta/Cinza',380,12,4,1),(13,'2117656555','Frigorífico Combinado AEG RCB632E4MX 330 Litros E Cinzento',630,6,3,1),(14,'32131233321','Balança Xiaomi Mi Body Composition Scale 2 Branca Bluetooth 5.0',18,14,4,1),(15,'345522323333','Headphones Sony WH-1000XM5 Bluetooth ANC NFC Prateados',450,20,1,1),(16,'2343532653636','Corta-relvas Elétrico Bosch ARM 32 32cm 1200W',100,7,4,1),(17,'234141241244','Coluna Bluetooth Portátil NewOne BS 20 5W Branca',9,6,1,1);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(200) NOT NULL,
  `codpostal` varchar(8) NOT NULL,
  `localidade` varchar(80) NOT NULL,
  `role` varchar(20) NOT NULL,
  `estado` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `telefone_UNIQUE` (`telefone`),
  UNIQUE KEY `nif_UNIQUE` (`nif`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','12345678','admin@sapo.br','919191919',222333444,'rua abc123','2121-212','Lisboaa','administrador',1),(25,'Tiago','tiago1234','2211862@my.ipleiria.pt','912343210',244321234,'rua cidade de franÃ§a, lisboa','1150-210','Lisboa','funcionario',1),(27,'Bernardo','12345678','bernardocustodiocosta@gmail.com','914692060',252322282,'rua cidade de Ourém nº48 -Lourinha','2490-427','Ourém','funcionario',1),(28,'Fábio','12345678','fabio@gmail.com','912345213',213543765,'rua da ruge água','3456-234','Freixianda','cliente',1),(29,'Hugo','12345678','hugo@gmail.com','912673132',321421432,'rua cidade de Ourém','2490-427','Ourém','cliente',1),(30,'Cristian','12345678','cristian@gmail.com','912783928',231513428,'rua do porto alto','2341-245','Porto Alto','cliente',1);
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

-- Dump completed on 2022-06-17  3:23:32
