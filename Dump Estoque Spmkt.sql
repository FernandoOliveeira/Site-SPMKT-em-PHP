-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ESTOQUE
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `PRODUTOS`
--

DROP TABLE IF EXISTS `PRODUTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUTOS` (
  `ID_PRODUTOS` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) NOT NULL,
  `COD_PRODUTO` int(11) NOT NULL,
  `DESCRICAO` text NOT NULL,
  `PRECO` decimal(10,2) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `COD_BARRAS` varchar(100) NOT NULL,
  `DATA_CADASTRO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATA_VALIDADE` date DEFAULT NULL,
  `LOCAL_ARMAZENADO` varchar(50) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRODUTOS`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `PRODUTOS_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `USUARIOS` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUTOS`
--

LOCK TABLES `PRODUTOS` WRITE;
/*!40000 ALTER TABLE `PRODUTOS` DISABLE KEYS */;
INSERT INTO `PRODUTOS` VALUES (1,'Banana Nanica',101,'Amanhã estraga',6.67,9,'32154569843223','2019-10-08 22:08:48','2019-10-12','Gôndola 08','Fernando',2),(2,'Picanha',102,'Da terceira veia pra frente é coxão duro',28.90,128,'987456123','2019-10-09 14:52:22','2019-11-30','Freezer Frigorífico','Fernando',2),(3,'Maçã Verde',103,'Não, essa maçã não é do amor',9.90,20,'654789123','2019-10-09 14:54:41','2019-10-30','Gôndola 10','Fernando',2),(4,'Sorvete Napolitano Kibon',104,'Tem que beber água depois de tomar sorvete - Mães de todas as idades',10.50,10,'56478138798','2019-10-09 14:56:43','2019-11-28','Freezer ','Fernando',2),(5,'Pão Francês',105,'Pão francês que veio da Itália',0.75,30,'321456321','2019-10-10 18:08:00','2019-10-10','Gôndola 01','Fernando',2),(6,'Marshmallow FINI',106,'Marshmallow que não da pra por na fogueira igual americano safado',7.00,60,'986547213','2019-10-11 18:20:16','2020-01-01','Gôndola 05','Fernando',2),(7,'Alface Americana',107,'Americana é só o nome mesmo, não veio dos USA não (eu acho)',3.84,20,'54732135866','2019-10-11 18:34:26','2019-10-18','Gôndola 07','Fernando',2),(8,'Bisteca Suína',108,'Suínos não vem da Suíça',8.90,35,'325887469','2019-10-12 03:06:15','2019-10-31','Freezer Frigorífico','Fernando',2),(11,'Feijão Camil',109,'Feijão Carioca Tipo 1. Feijão não, é bixxcoito!',5.49,100,'12387656548','2019-10-12 13:43:38','2019-12-31','Gôndola 03','Vinícius',3),(12,'Salmão',110,'Salmão que vai ser usado para sushi',25.90,100,'321452315788','2019-10-12 21:32:38','2019-10-26','Freezer Frigorífico','Fernando',2),(13,'Leite Colaso',111,'Leite',5.50,100,'321542315','2019-10-22 20:18:43','2019-10-31','Gôndola 02','Fernando',2),(14,'Sorvete do Gabriel',321,'Meus Deus ',5.50,20,'12312','2019-10-30 18:21:11','2020-06-26','Gôndola 08','Fernando',2);
/*!40000 ALTER TABLE `PRODUTOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TIPO_USUARIO`
--

DROP TABLE IF EXISTS `TIPO_USUARIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TIPO_USUARIO` (
  `ID_TIPO_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_TIPO` varchar(10) DEFAULT NULL,
  `DESCRICAO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TIPO_USUARIO`
--

LOCK TABLES `TIPO_USUARIO` WRITE;
/*!40000 ALTER TABLE `TIPO_USUARIO` DISABLE KEYS */;
INSERT INTO `TIPO_USUARIO` VALUES (1,'ADM','ADMINISTRADOR'),(2,'USR','USUARIO 1'),(3,'USR2','USUARIO 2 ');
/*!40000 ALTER TABLE `TIPO_USUARIO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIOS` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(50) NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `ID_TIPO_USUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `ID_TIPO_USUARIO` (`ID_TIPO_USUARIO`),
  CONSTRAINT `USUARIOS_ibfk_1` FOREIGN KEY (`ID_TIPO_USUARIO`) REFERENCES `TIPO_USUARIO` (`ID_TIPO_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (2,'Fernando','e10adc3949ba59abbe56e057f20f883e',1),(3,'Vinicius','e10adc3949ba59abbe56e057f20f883e',2),(4,'Luciana','e10adc3949ba59abbe56e057f20f883e',3);
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VENDAS`
--

DROP TABLE IF EXISTS `VENDAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VENDAS` (
  `ID_VENDAS` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUTO` varchar(100) NOT NULL,
  `VALOR_UNITARIO` double(10,2) NOT NULL,
  `QUANTIDADE_VENDIDA` int(11) NOT NULL,
  `VALOR_TOTAL_VENDA` double(10,2) NOT NULL,
  `DATA_VENDA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USUARIO` varchar(50) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUTOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_VENDAS`),
  KEY `ID_PRODUTOS` (`ID_PRODUTOS`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `VENDAS_ibfk_1` FOREIGN KEY (`ID_PRODUTOS`) REFERENCES `PRODUTOS` (`ID_PRODUTOS`),
  CONSTRAINT `VENDAS_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `USUARIOS` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VENDAS`
--

LOCK TABLES `VENDAS` WRITE;
/*!40000 ALTER TABLE `VENDAS` DISABLE KEYS */;
INSERT INTO `VENDAS` VALUES (1,'Alface Americana',3.85,3,11.85,'2019-09-15 15:16:14','Fernando',2,7),(2,'Banana Nanica',6.67,10,66.70,'2019-09-15 15:19:25','Vinicius',3,1),(3,'Bisteca Suína',8.90,12,106.80,'2019-09-16 11:01:33','Vinicius',3,8),(4,'Feijão Camil',8.90,7,62.30,'2019-09-16 12:45:22','Vinicius',3,11),(5,'Maçã Verde',9.90,6,59.40,'2019-09-17 09:11:01','Fernando',2,3),(6,'Marshmallow FINI',7.00,10,70.00,'2019-09-17 12:59:10','Vinicius',3,6),(7,'Pão Francês',0.75,9,6.75,'2019-09-18 09:59:59','Fernando',2,5),(8,'Picanha',28.90,12,346.80,'2019-09-18 12:32:55','Vinicius',3,2),(9,'Salmão',25.90,21,543.90,'2019-09-19 10:12:15','Fernando',2,12),(10,'Sorvete Napolitano Kibon',10.50,7,73.50,'2019-09-19 13:12:18','Vinicius',3,4),(11,'Alface Americana',3.85,8,30.80,'2019-09-20 14:09:01','Fernando',2,7),(12,'Banana Nanica',6.67,6,40.02,'2019-09-20 18:25:47','Vinicius',3,1),(13,'Bisteca Suína',8.90,18,160.20,'2019-09-21 10:55:27','Vinicius',3,8),(14,'Feijão Camil',5.49,28,153.72,'2019-09-21 14:28:24','Fernando',2,11),(15,'Maçã Verde',9.90,28,277.20,'2019-09-22 09:18:54','Fernando',2,3),(16,'Marshmallow FINI',7.00,8,56.00,'2019-09-22 14:27:22','Vinicius',3,6),(17,'Pão Francês',0.75,33,24.75,'2019-09-23 10:58:42','Fernando',2,5),(18,'Picanha',28.90,18,520.20,'2019-09-23 19:45:57','Fernando',2,2),(19,'Salmão',25.90,39,1010.10,'2019-09-23 19:45:57','Vinicius',3,12),(20,'Sorvete Napolitano Kibon',10.50,26,273.00,'2019-09-24 19:45:57','Vinicius',3,4),(21,'Alface Americana',3.85,26,100.10,'2019-09-26 19:45:57','Vinicius',3,7),(22,'Banana Nanica',6.67,29,193.43,'2019-09-27 19:45:57','Vinicius',3,1),(23,'Bisteca Suína',8.90,29,258.10,'2019-09-28 19:45:57','Fernando',2,8),(24,'Feijão Camil',5.49,24,131.76,'2019-09-29 19:45:57','Vinicius',3,11),(25,'Maçã Verde',9.90,19,188.10,'2019-09-30 19:45:57','Vinicius',3,3),(26,'Marshmallow FINI',7.00,28,196.00,'2019-10-01 19:45:57','Fernando',2,6),(27,'Pão Francês',0.75,29,21.75,'2019-10-02 19:45:57','Fernando',2,5),(28,'Picanha',28.90,36,1040.40,'2019-10-03 19:45:57','Fernando',2,2),(29,'Salmão',25.90,27,699.30,'2019-10-04 19:45:57','Vinicius',3,12),(30,'Sorvete Napolitano Kibon',10.50,17,178.50,'2019-10-05 19:45:57','Vinicius',3,4),(31,'Alface Americana',3.85,19,73.15,'2019-10-06 19:45:57','Vinicius',3,7),(32,'Banana Nanica',6.67,29,193.43,'2019-10-07 19:45:57','Fernando',2,1),(33,'Bisteca Suína',8.90,19,169.10,'2019-10-08 19:45:57','Fernando',2,8),(34,'Feijão Camil',5.49,47,258.03,'2019-10-09 19:45:57','Vinicius',3,11),(35,'Maçã Verde',9.90,49,485.10,'2019-10-10 19:45:57','Vinicius',3,3),(36,'Marshmallow FINI',7.00,54,378.00,'2019-10-11 19:45:57','Vinicius',3,6),(37,'Pão Francês',0.75,49,36.75,'2019-10-12 19:45:57','Fernando',2,5),(38,'Picanha',28.90,29,838.10,'2019-10-13 19:45:57','Fernando',2,2),(39,'Salmão',25.90,32,828.80,'2019-10-14 19:45:57','Vinicius',3,12),(40,'Sorvete Napolitano Kibon',10.50,28,294.00,'2019-10-15 19:45:57','Vinicius',3,4),(41,'Maçã Verde',9.90,1,9.90,'2019-10-15 22:04:54','Fernando',2,3),(42,'Alface Americana',3.84,10,38.40,'2019-10-16 18:01:20','Vinicius',3,7),(43,'Banana Nanica',6.67,23,153.41,'2019-10-17 08:11:54','Vinicius',3,1),(44,'Bisteca Suína',8.90,33,293.70,'2019-10-18 08:11:54','Vinicius',3,8),(45,'Feijão Camil',5.49,45,247.05,'2019-10-19 08:11:54','Fernando',2,11),(46,'Maçã Verde',9.90,87,861.30,'2019-10-20 08:11:54','Fernando',2,3),(47,'Marshmallow FINI',7.00,63,441.00,'2019-10-21 08:11:54','Vinicius',3,6),(48,'Pão Francês',0.75,106,79.50,'2019-10-22 08:11:54','Fernando',2,5);
/*!40000 ALTER TABLE `VENDAS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-25  1:00:36
