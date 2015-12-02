CREATE DATABASE  IF NOT EXISTS `db_receitas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_receitas`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: db_receitas
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categorias`
--

LOCK TABLES `tb_categorias` WRITE;
/*!40000 ALTER TABLE `tb_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_receitas`
--

DROP TABLE IF EXISTS `tb_receitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `qtd_ing_principais` int(11) NOT NULL,
  `modo_preparo` longtext NOT NULL,
  `qtd_acessos` int(11) DEFAULT '0',
  `moderada` int(11) DEFAULT '0',
  `aprovada` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tb_receitas_tb_usuarios1_idx` (`id_usuario`),
  CONSTRAINT `fk_tb_receitas_tb_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receitas`
--

LOCK TABLES `tb_receitas` WRITE;
/*!40000 ALTER TABLE `tb_receitas` DISABLE KEYS */;
INSERT INTO `tb_receitas` VALUES (1,1,'enroladinho',2,'Testeeeeee!',0,0,0);
/*!40000 ALTER TABLE `tb_receitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_receitas_tem_categorias`
--

DROP TABLE IF EXISTS `tb_receitas_tem_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_receitas_tem_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receita` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_receitas_has_tb_categorias_tb_categorias1_idx` (`id_categoria`),
  KEY `fk_tb_receitas_has_tb_categorias_tb_receitas_idx` (`id_receita`),
  CONSTRAINT `fk_tb_receitas_has_tb_categorias_tb_categorias1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_receitas_has_tb_categorias_tb_receitas` FOREIGN KEY (`id_receita`) REFERENCES `tb_receitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receitas_tem_categorias`
--

LOCK TABLES `tb_receitas_tem_categorias` WRITE;
/*!40000 ALTER TABLE `tb_receitas_tem_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_receitas_tem_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_receitas_tem_ingredientes`
--

DROP TABLE IF EXISTS `tb_receitas_tem_ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_receitas_tem_ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receita` int(11) NOT NULL,
  `ingrediente` varchar(200) NOT NULL,
  `quantidade` varchar(30) NOT NULL,
  `unidade_medida` varchar(45) NOT NULL,
  `principal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_receitas_has_tb_ingredientes_tb_receitas1_idx` (`id_receita`),
  CONSTRAINT `fk_tb_receitas_has_tb_ingredientes_tb_receitas1` FOREIGN KEY (`id_receita`) REFERENCES `tb_receitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_receitas_tem_ingredientes`
--

LOCK TABLES `tb_receitas_tem_ingredientes` WRITE;
/*!40000 ALTER TABLE `tb_receitas_tem_ingredientes` DISABLE KEYS */;
INSERT INTO `tb_receitas_tem_ingredientes` VALUES (1,1,'Salsicha','2','',1),(2,1,'Pastelina','2','',1);
/*!40000 ALTER TABLE `tb_receitas_tem_ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_unidades_medida`
--

DROP TABLE IF EXISTS `tb_unidades_medida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_unidades_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `unidade` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_unidades_medida`
--

LOCK TABLES `tb_unidades_medida` WRITE;
/*!40000 ALTER TABLE `tb_unidades_medida` DISABLE KEYS */;
INSERT INTO `tb_unidades_medida` VALUES (1,'Colher de sopa','Colher de sopa'),(2,'Colher de chá','Colher de chá'),(3,'Quilograma','kg'),(5,'Miligrama','mg'),(6,'Fatia','fatia');
/*!40000 ALTER TABLE `tb_unidades_medida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (1,'Erikson Reppetto','erikson.souza@gmail.com','123');
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-02  1:05:39
