-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: lisitea2
-- ------------------------------------------------------
-- Server version	8.0.12

DROP DATABASE IF EXISTS base_de_datos;

CREATE DATABASE base_de_datos;

USE base_de_datos;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_actividad`
--

DROP TABLE IF EXISTS `tbl_actividad`;
SET character_set_client = utf8mb4;
CREATE TABLE `tbl_actividad` (
  `PK_id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_campo_a` varchar(3500) NOT NULL,
  `BLB_campo_b` blob NOT NULL,
  PRIMARY KEY (`PK_id_actividad`)
);


--
-- Dumping data for table `tbl_actividad`
--

LOCK TABLES `tbl_actividad` WRITE;
/*!40000 ALTER TABLE `tbl_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_actividades_aprend`
--

DROP TABLE IF EXISTS `tbl_actividades_aprend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_actividades_aprend` (
  `PK_id_actividades_aprend` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_planeacion` int(11) NOT NULL,
  `FK_id_actividad` int(11) NOT NULL,
  `FK_id_nivel_taxonomico` int(11) NOT NULL,
  `VCH_tipo` int(11) NOT NULL,
  `TINT_posicion` tinyint(1) NOT NULL,
  `VCH_producto` varchar(200) NOT NULL,
  `VCH_tipo_instrumento` varchar(20) NOT NULL,
  `VCH_instrumento` varchar(150) NOT NULL,
  `VCH_indicador` varchar(200) NOT NULL,
  PRIMARY KEY (`PK_id_actividades_aprend`),
  KEY `FK_id_planeacion_idx` (`FK_id_planeacion`),
  KEY `FK_id_actividad_idx` (`FK_id_actividad`),
  KEY `FK_id_nivel_taxonomico_idx` (`FK_id_nivel_taxonomico`),
  CONSTRAINT `FK_id_nivel_taxonomico` FOREIGN KEY (`FK_id_nivel_taxonomico`) REFERENCES `tbl_nivel_taxonomico` (`pk_id_nivel_taxonomico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_actividad` FOREIGN KEY (`FK_id_actividad`) REFERENCES `tbl_actividad` (`pk_id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_planeacion` FOREIGN KEY (`FK_id_planeacion`) REFERENCES `tbl_planeacion` (`PK_id_planeacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_actividades_aprend`
--

LOCK TABLES `tbl_actividades_aprend` WRITE;
/*!40000 ALTER TABLE `tbl_actividades_aprend` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_actividades_aprend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_actividades_competencia`
--

DROP TABLE IF EXISTS `tbl_actividades_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_actividades_competencia` (
  `PFK_id_actividaes_aprend` int(11) NOT NULL,
  `PFK_id_int_comp` int(11) NOT NULL,
  `VCH_seccion` varchar(20) NOT NULL,
  PRIMARY KEY (`PFK_id_actividaes_aprend`,`PFK_id_int_comp`),
  KEY `PFK_id_int_comp_idx` (`PFK_id_int_comp`),
  CONSTRAINT `PFK_id_actividaes_aprend` FOREIGN KEY (`PFK_id_actividaes_aprend`) REFERENCES `tbl_actividades_aprend` (`pk_id_actividades_aprend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_int_comp` FOREIGN KEY (`PFK_id_int_comp`) REFERENCES `tbl_int_comp` (`PK_id_int_comp`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_actividades_competencia`
--

LOCK TABLES `tbl_actividades_competencia` WRITE;
/*!40000 ALTER TABLE `tbl_actividades_competencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_actividades_competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_aprendizaje_esperado`
--

DROP TABLE IF EXISTS `tbl_aprendizaje_esperado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_aprendizaje_esperado` (
  `PK_id_aprendizaje_esperado` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`PK_id_aprendizaje_esperado`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_aprendizaje_esperado`
--

LOCK TABLES `tbl_aprendizaje_esperado` WRITE;
/*!40000 ALTER TABLE `tbl_aprendizaje_esperado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_aprendizaje_esperado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_aprendizaje_producto`
--

DROP TABLE IF EXISTS `tbl_aprendizaje_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_aprendizaje_producto` (
  `PFK_id_aprendizaje_esperado` int(11) NOT NULL,
  `PFK_id_producto_esperado` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_aprendizaje_esperado`,`PFK_id_producto_esperado`),
  KEY `PFK_id_producto_esperado_idx` (`PFK_id_producto_esperado`),
  CONSTRAINT `PFK_id_aprendizaje_esperado2` FOREIGN KEY (`PFK_id_aprendizaje_esperado`) REFERENCES `tbl_aprendizaje_esperado` (`pk_id_aprendizaje_esperado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_producto_esperado2` FOREIGN KEY (`PFK_id_producto_esperado`) REFERENCES `tbl_producto_esperado` (`pk_id_producto_esperado`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_aprendizaje_producto`
--

LOCK TABLES `tbl_aprendizaje_producto` WRITE;
/*!40000 ALTER TABLE `tbl_aprendizaje_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_aprendizaje_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_asignatura`
--

DROP TABLE IF EXISTS `tbl_asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_asignatura` (
  `PK_id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_campo_disciplinar` int(11) NOT NULL,
  `VCH_nombre` varchar(100) NOT NULL,
  `VCH_clave` varchar(20) NOT NULL,
  `TINT_semestre` tinyint(1) NOT NULL,
  PRIMARY KEY (`PK_id_asignatura`),
  KEY `FK_id_campo_disciplinar_idx` (`FK_id_campo_disciplinar`),
  CONSTRAINT `FK_id_campo_disciplinar_1` FOREIGN KEY (`FK_id_campo_disciplinar`) REFERENCES `tbl_campo_disciplinar` (`pk_id_campo_disciplinar`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_asignatura`
--

LOCK TABLES `tbl_asignatura` WRITE;
/*!40000 ALTER TABLE `tbl_asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_asignatura_competencia`
--

DROP TABLE IF EXISTS `tbl_asignatura_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_asignatura_competencia` (
  `PFK_id_asignatura` int(11) NOT NULL,
  `PFK_id_competencia` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_asignatura`,`PFK_id_competencia`),
  KEY `PFK_id_competencia_idx` (`PFK_id_competencia`),
  CONSTRAINT `PFK_id_asignatura` FOREIGN KEY (`PFK_id_asignatura`) REFERENCES `tbl_asignatura` (`pk_id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_competencia` FOREIGN KEY (`PFK_id_competencia`) REFERENCES `tbl_competencia` (`pk_id_competencia`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_asignatura_competencia`
--

LOCK TABLES `tbl_asignatura_competencia` WRITE;
/*!40000 ALTER TABLE `tbl_asignatura_competencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_asignatura_competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_atributo`
--

DROP TABLE IF EXISTS `tbl_atributo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_atributo` (
  `PK_id_atributo` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(250) NOT NULL,
  `FLT_identificador` float DEFAULT NULL,
  `FK_id_competencia` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_atributo`),
  KEY `FK_id_competencia_idx` (`FK_id_competencia`),
  CONSTRAINT `FK_id_competencia` FOREIGN KEY (`FK_id_competencia`) REFERENCES `tbl_competencia` (`pk_id_competencia`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_atributo`
--

LOCK TABLES `tbl_atributo` WRITE;
/*!40000 ALTER TABLE `tbl_atributo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_atributo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_campo_disciplinar`
--

DROP TABLE IF EXISTS `tbl_campo_disciplinar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_campo_disciplinar` (
  `PK_id_campo_disciplinar` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(100) NOT NULL,
  `VCH_clave` varchar(100) NOT NULL,
  PRIMARY KEY (`PK_id_campo_disciplinar`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_campo_disciplinar`
--

LOCK TABLES `tbl_campo_disciplinar` WRITE;
/*!40000 ALTER TABLE `tbl_campo_disciplinar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_campo_disciplinar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cargo_revisor`
--

DROP TABLE IF EXISTS `tbl_cargo_revisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_cargo_revisor` (
  `PK_id_cargo_revisor` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_id_cargo_revisor`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cargo_revisor`
--

LOCK TABLES `tbl_cargo_revisor` WRITE;
/*!40000 ALTER TABLE `tbl_cargo_revisor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cargo_revisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_competencia`
--

DROP TABLE IF EXISTS `tbl_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_competencia` (
  `PK_id_competencia` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_identificador` varchar(20) NOT NULL,
  `VCH_descripcion` varchar(250) NOT NULL,
  `VCH_tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_id_competencia`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_competencia`
--

LOCK TABLES `tbl_competencia` WRITE;
/*!40000 ALTER TABLE `tbl_competencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_componente`
--

DROP TABLE IF EXISTS `tbl_componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_componente` (
  `PK_id_componente` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_eje` int(11) NOT NULL,
  `VCH_descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`PK_id_componente`),
  KEY `FK_id_eje_idx` (`FK_id_eje`),
  CONSTRAINT `FK_id_eje_1` FOREIGN KEY (`FK_id_eje`) REFERENCES `tbl_eje` (`pk_id_eje`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_componente`
--

LOCK TABLES `tbl_componente` WRITE;
/*!40000 ALTER TABLE `tbl_componente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_componente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cont_central`
--

DROP TABLE IF EXISTS `tbl_cont_central`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_cont_central` (
  `PK_id_cont_central` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(250) NOT NULL,
  `FK_id_componente` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_cont_central`),
  KEY `FK_id_componente_idx` (`FK_id_componente`),
  CONSTRAINT `FK_id_componente` FOREIGN KEY (`FK_id_componente`) REFERENCES `tbl_componente` (`PK_id_componente`) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cont_central`
--

LOCK TABLES `tbl_cont_central` WRITE;
/*!40000 ALTER TABLE `tbl_cont_central` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cont_central` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cont_especifico`
--

DROP TABLE IF EXISTS `tbl_cont_especifico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_cont_especifico` (
  `PK_id_cont_especifico` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`PK_id_cont_especifico`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cont_especifico`
--

LOCK TABLES `tbl_cont_especifico` WRITE;
/*!40000 ALTER TABLE `tbl_cont_especifico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cont_especifico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contenido_aprendizaje`
--

DROP TABLE IF EXISTS `tbl_contenido_aprendizaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_contenido_aprendizaje` (
  `PFK_id_cont_especifico` int(11) NOT NULL,
  `PFK_id_aprendizaje_esperado` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_cont_especifico`,`PFK_id_aprendizaje_esperado`),
  KEY `PFK_id_aprendizaje_esperado_idx` (`PFK_id_aprendizaje_esperado`),
  CONSTRAINT `PFK_id_aprendizaje_esperado1` FOREIGN KEY (`PFK_id_aprendizaje_esperado`) REFERENCES `tbl_aprendizaje_esperado` (`pk_id_aprendizaje_esperado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_cont_especifico1` FOREIGN KEY (`PFK_id_cont_especifico`) REFERENCES `tbl_cont_especifico` (`pk_id_cont_especifico`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contenido_aprendizaje`
--

LOCK TABLES `tbl_contenido_aprendizaje` WRITE;
/*!40000 ALTER TABLE `tbl_contenido_aprendizaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contenido_aprendizaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contenido_contenido`
--

DROP TABLE IF EXISTS `tbl_contenido_contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_contenido_contenido` (
  `PFK_id_cont_central` int(11) NOT NULL,
  `PFK_id_cont_especifico` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_cont_central`,`PFK_id_cont_especifico`),
  KEY `PFK_id_cont_especifico_idx` (`PFK_id_cont_especifico`),
  CONSTRAINT `PFK_id_cont_central3` FOREIGN KEY (`PFK_id_cont_central`) REFERENCES `tbl_con_central` (`pk_id_con_central`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_cont_especifico3` FOREIGN KEY (`PFK_id_cont_especifico`) REFERENCES `tbl_cont_especifico` (`pk_id_cont_especifico`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contenido_contenido`
--

LOCK TABLES `tbl_contenido_contenido` WRITE;
/*!40000 ALTER TABLE `tbl_contenido_contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contenido_contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_datos_asignatura`
--

DROP TABLE IF EXISTS `tbl_datos_asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_datos_asignatura` (
  `PFK_id_datos_ident` int(11) NOT NULL,
  `PFK_id_asignatura` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_datos_ident`,`PFK_id_asignatura`),
  KEY `PFK_id_asignatura_idx` (`PFK_id_asignatura`),
  CONSTRAINT `PFK_id_asignatura2` FOREIGN KEY (`PFK_id_asignatura`) REFERENCES `tbl_asignatura` (`pk_id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_datos_ident1` FOREIGN KEY (`PFK_id_datos_ident`) REFERENCES `tbl_datos_ident` (`PK_id_datos_ident`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_datos_asignatura`
--

LOCK TABLES `tbl_datos_asignatura` WRITE;
/*!40000 ALTER TABLE `tbl_datos_asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_datos_asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_datos_ident`
--

DROP TABLE IF EXISTS `tbl_datos_ident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_datos_ident` (
  `PK_id_datos_ident` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_semestre` varchar(30) NOT NULL,
  `VCH_numero_parcial` varchar(30) NOT NULL,
  `VCH_numero_planeacion` varchar(20) NOT NULL,
  `VCH_titulo_planeacion` varchar(50) NOT NULL,
  `TINT_porcentaje` tinyint(1) NOT NULL,
  PRIMARY KEY (`PK_id_datos_ident`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_datos_ident`
--

LOCK TABLES `tbl_datos_ident` WRITE;
/*!40000 ALTER TABLE `tbl_datos_ident` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_datos_ident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_datos_submodulo`
--

DROP TABLE IF EXISTS `tbl_datos_submodulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_datos_submodulo` (
  `PFK_id_datos_ident` int(11) NOT NULL,
  `PFK_id_submodulo` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_datos_ident`,`PFK_id_submodulo`),
  KEY `PFK_id_submodulo_idx` (`PFK_id_submodulo`),
  CONSTRAINT `PFK_id_datos_ident_3` FOREIGN KEY (`PFK_id_datos_ident`) REFERENCES `tbl_datos_ident` (`PK_id_datos_ident`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_submodulo_3` FOREIGN KEY (`PFK_id_submodulo`) REFERENCES `tbl_submodulo` (`pk_id_submodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_datos_submodulo`
--

LOCK TABLES `tbl_datos_submodulo` WRITE;
/*!40000 ALTER TABLE `tbl_datos_submodulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_datos_submodulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_eje`
--

DROP TABLE IF EXISTS `tbl_eje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_eje` (
  `PK_id_eje` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`PK_id_eje`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_eje`
--

LOCK TABLES `tbl_eje` WRITE;
/*!40000 ALTER TABLE `tbl_eje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_eje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_asignatura_eje`
--

DROP TABLE IF EXISTS `tbl_asignatura_eje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_asignatura_eje` (
  `PFK_id_asignatura` int(11) NOT NULL,
  `PFK_id_eje` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_asignatura`,`PFK_id_eje`),
  KEY `PFK_id_eje_idx` (`PFK_id_eje`),
  CONSTRAINT `PFK_id_asignatura_1` FOREIGN KEY (`PFK_id_asignatura`) REFERENCES `tbl_asignatura` (`pk_id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_eje_1` FOREIGN KEY (`PFK_id_eje`) REFERENCES `tbl_eje` (`pk_id_eje`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_asignatura_eje`
--

LOCK TABLES `tbl_asignatura_eje` WRITE;
/*!40000 ALTER TABLE `tbl_asignatura_eje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_asignatura_eje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_submodulo_eje`
--

DROP TABLE IF EXISTS `tbl_submodulo_eje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_submodulo_eje` (
  `PFK_id_submodulo` int(11) NOT NULL,
  `PFK_id_eje` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_submodulo`,`PFK_id_eje`),
  KEY `PFK_id_eje_idx` (`PFK_id_eje`),
  CONSTRAINT `PFK_id_submodulo` FOREIGN KEY (`PFK_id_submodulo`) REFERENCES `tbl_submodulo` (`pk_id_submodulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_eje` FOREIGN KEY (`PFK_id_eje`) REFERENCES `tbl_eje` (`pk_id_eje`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_submodulo_eje`
--

LOCK TABLES `tbl_submodulo_eje` WRITE;
/*!40000 ALTER TABLE `tbl_submodulo_eje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_submodulo_eje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_espacio_fisico`
--

DROP TABLE IF EXISTS `tbl_espacio_fisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_espacio_fisico` (
  `PK_id_espacio_fisico` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(1100) NOT NULL,
  PRIMARY KEY (`PK_id_espacio_fisico`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_espacio_fisico`
--

LOCK TABLES `tbl_espacio_fisico` WRITE;
/*!40000 ALTER TABLE `tbl_espacio_fisico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_espacio_fisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_especialidad`
--

DROP TABLE IF EXISTS `tbl_especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_especialidad` (
  `PK_id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`PK_id_especialidad`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_especialidad`
--

LOCK TABLES `tbl_especialidad` WRITE;
/*!40000 ALTER TABLE `tbl_especialidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_habil_socioemocional`
--

DROP TABLE IF EXISTS `tbl_habil_socioemocional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_habil_socioemocional` (
  `PK_id_habil_socioemocional` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`PK_id_habil_socioemocional`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_habil_socioemocional`
--

LOCK TABLES `tbl_habil_socioemocional` WRITE;
/*!40000 ALTER TABLE `tbl_habil_socioemocional` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_habil_socioemocional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_int_comp`
--

DROP TABLE IF EXISTS `tbl_int_comp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_int_comp` (
  `PK_id_int_comp` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_intenciones_form` int(11) NOT NULL,
  `FK_id_competencia` int(11) NOT NULL,
  `VCH_seccion` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_id_int_comp`),
  KEY `FK_id_intenciones_form3_idx` (`FK_id_intenciones_form`),
  CONSTRAINT `FK_id_intenciones_form3` FOREIGN KEY (`FK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_int_comp`
--

LOCK TABLES `tbl_int_comp` WRITE;
/*!40000 ALTER TABLE `tbl_int_comp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_int_comp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_instrumentos`
--

DROP TABLE IF EXISTS `tbl_instrumentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_instrumentos` (
  `PK_id_instrumentos` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_planeacion` int(11) NOT NULL,
  `TINT_numero` tinyint(1) NOT NULL,
  `VCH_instrumento` varchar(150) NOT NULL,
  `TINT_porcentaje` tinyint(1) NOT NULL,
  `FK_id_titulo` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_instrumentos`),
  KEY `FK_id_planeacion1_idx` (`FK_id_planeacion`),
  KEY `FK_id_titulo1_idx` (`FK_id_titulo`),
  CONSTRAINT `FK_id_planeacion1` FOREIGN KEY (`FK_id_planeacion`) REFERENCES `tbl_planeacion` (`PK_id_planeacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_titulo1` FOREIGN KEY (`FK_id_titulo`) REFERENCES `tbl_titulo` (`pk_id_titulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_instrumentos`
--

LOCK TABLES `tbl_instrumentos` WRITE;
/*!40000 ALTER TABLE `tbl_instrumentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_instrumentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_intenciones_aprendizaje`
--

DROP TABLE IF EXISTS `tbl_intenciones_aprendizaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_intenciones_aprendizaje` (
  `PFK_id_intenciones_form` int(11) NOT NULL,
  `PFK_id_aprendizaje_esperado` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_intenciones_form`,`PFK_id_aprendizaje_esperado`),
  KEY `PFK_id_aprendizaje_esperado_idx` (`PFK_id_aprendizaje_esperado`),
  CONSTRAINT `PFK_id_aprendizaje_esperado4` FOREIGN KEY (`PFK_id_aprendizaje_esperado`) REFERENCES `tbl_aprendizaje_esperado` (`pk_id_aprendizaje_esperado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_intenciones_form4` FOREIGN KEY (`PFK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_intenciones_aprendizaje`
--

LOCK TABLES `tbl_intenciones_aprendizaje` WRITE;
/*!40000 ALTER TABLE `tbl_intenciones_aprendizaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_intenciones_aprendizaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_intenciones_componente`
--

DROP TABLE IF EXISTS `tbl_intenciones_componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_intenciones_componente` (
  `PFK_id_intenciones_form` int(11) NOT NULL,
  `PFK_id_componente` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_intenciones_form`,`PFK_id_componente`),
  KEY `PFK_id_componente3_idx` (`PFK_id_componente`),
  CONSTRAINT `PFK_id_componente3` FOREIGN KEY (`PFK_id_componente`) REFERENCES `tbl_componente` (`pk_id_componente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_intenciones_form3` FOREIGN KEY (`PFK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_intenciones_componente`
--

LOCK TABLES `tbl_intenciones_componente` WRITE;
/*!40000 ALTER TABLE `tbl_intenciones_componente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_intenciones_componente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_intenciones_contenido`
--

DROP TABLE IF EXISTS `tbl_intenciones_contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_intenciones_contenido` (
  `PFK_id_intenciones_form` int(11) NOT NULL,
  `PFK_id_cont_especifico` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_intenciones_form`,`PFK_id_cont_especifico`),
  KEY `PFK_id_cont_especifico_idx` (`PFK_id_cont_especifico`),
  CONSTRAINT `PFK_id_cont_especifico2` FOREIGN KEY (`PFK_id_cont_especifico`) REFERENCES `tbl_cont_especifico` (`pk_id_cont_especifico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_intenciones_form2` FOREIGN KEY (`PFK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_intenciones_contenido`
--

LOCK TABLES `tbl_intenciones_contenido` WRITE;
/*!40000 ALTER TABLE `tbl_intenciones_contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_intenciones_contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_intenciones_form`
--

DROP TABLE IF EXISTS `tbl_intenciones_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_intenciones_form` (
  `PK_id_intenciones_form` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_proposito` varchar(300) NOT NULL,
  `FK_id_eje` int(11) NOT NULL,
  `FK_id_cont_central` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_intenciones_form`),
  KEY `FK_id_eje1_idx` (`FK_id_eje`),
  KEY `FK_id_cont_central1_idx` (`FK_id_cont_central`),
  CONSTRAINT `FK_id_cont_central1` FOREIGN KEY (`FK_id_cont_central`) REFERENCES `tbl_cont_central` (`pk_id_cont_central`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_eje1` FOREIGN KEY (`FK_id_eje`) REFERENCES `tbl_eje` (`pk_id_eje`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_intenciones_formativas`
--

LOCK TABLES `tbl_intenciones_form` WRITE;
/*!40000 ALTER TABLE `tbl_intenciones_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_intenciones_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_intenciones_habilidad`
--

DROP TABLE IF EXISTS `tbl_intenciones_habilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_intenciones_habilidad` (
  `PFK_id_intenciones_form` int(11) NOT NULL,
  `PFK_habilidad_socioemocional` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_intenciones_form`,`PFK_habilidad_socioemocional`),
  KEY `PFK_habilidad_socioemocional6_idx` (`PFK_habilidad_socioemocional`),
  CONSTRAINT `PFK_habilidad_socioemocional6` FOREIGN KEY (`PFK_habilidad_socioemocional`) REFERENCES `tbl_habil_socioemocional` (`PK_id_habil_socioemocional`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_intenciones_form6` FOREIGN KEY (`PFK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_intenciones_habilidad`
--

LOCK TABLES `tbl_intenciones_habilidad` WRITE;
/*!40000 ALTER TABLE `tbl_intenciones_habilidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_intenciones_habilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_intenciones_producto`
--

DROP TABLE IF EXISTS `tbl_intenciones_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_intenciones_producto` (
  `PFK_id_intenciones_form` int(11) NOT NULL,
  `PFK_id_producto_esperado` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_intenciones_form`,`PFK_id_producto_esperado`),
  KEY `PFK_id_producto_esperado4_idx` (`PFK_id_producto_esperado`),
  CONSTRAINT `PFK_id_intenciones_form5` FOREIGN KEY (`PFK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_producto_esperado5` FOREIGN KEY (`PFK_id_producto_esperado`) REFERENCES `tbl_producto_esperado` (`pk_id_producto_esperado`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_intenciones_producto`
--

LOCK TABLES `tbl_intenciones_producto` WRITE;
/*!40000 ALTER TABLE `tbl_intenciones_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_intenciones_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel_taxonomico`
--

DROP TABLE IF EXISTS `tbl_nivel_taxonomico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_nivel_taxonomico` (
  `PK_id_nivel_taxonomico` int(11) NOT NULL AUTO_INCREMENT,
  `TINT_nivel` tinyint(1) NOT NULL,
  `VCH_verbo` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_id_nivel_taxonomico`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_taxonomico`
--

LOCK TABLES `tbl_nivel_taxonomico` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_taxonomico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nivel_taxonomico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_planeacion`
--

DROP TABLE IF EXISTS `tbl_planeacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_planeacion` (
  `PK_id_planeacion` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_planeacion_cont` int(11) NOT NULL,
  `FK_id_plantel` int(11) NOT NULL,
  `FK_datos_ident` int(11) NOT NULL,
  `FK_id_intenciones_form` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_planeacion`),
  KEY `FK_id_planeacion_cont_idx` (`FK_id_planeacion_cont`),
  KEY `FK_id_plantel_idx` (`FK_id_plantel`),
  KEY `FK_datos_ident_idx` (`FK_datos_ident`),
  KEY `FK_id_intenciones_form_idx` (`FK_id_intenciones_form`),
  CONSTRAINT `FK_datos_ident` FOREIGN KEY (`FK_datos_ident`) REFERENCES `tbl_datos_ident` (`PK_id_datos_ident`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_intenciones_form` FOREIGN KEY (`FK_id_intenciones_form`) REFERENCES `tbl_intenciones_form` (`pk_id_intenciones_form`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_planeacion_cont` FOREIGN KEY (`FK_id_planeacion_cont`) REFERENCES `tbl_planeacion_cont` (`pk_id_planeacion_cont`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_plantel` FOREIGN KEY (`FK_id_plantel`) REFERENCES `tbl_plantel` (`pk_id_plantel`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_planeacion`
--

LOCK TABLES `tbl_planeacion` WRITE;
/*!40000 ALTER TABLE `tbl_planeacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_planeacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_planeacion_cont`
--

DROP TABLE IF EXISTS `tbl_planeacion_cont`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_planeacion_cont` (
  `PK_id_planeacion_cont` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`PK_id_planeacion_cont`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_planeacion_cont`
--

LOCK TABLES `tbl_planeacion_cont` WRITE;
/*!40000 ALTER TABLE `tbl_planeacion_cont` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_planeacion_cont` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_planeacion_usuario`
--

DROP TABLE IF EXISTS `tbl_planeacion_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_planeacion_usuario` (
  `PFK_id_planeacion_cont` int(11) NOT NULL,
  `PFK_id_usuario` int(11) NOT NULL,
  `VCH_accion` varchar(20) NOT NULL,
  PRIMARY KEY (`PFK_id_planeacion_cont`,`PFK_id_usuario`),
  KEY `PFK_id_usuario_idx` (`PFK_id_usuario`),
  CONSTRAINT `PFK_id_planeacion_cont3` FOREIGN KEY (`PFK_id_planeacion_cont`) REFERENCES `tbl_planeacion_cont` (`pk_id_planeacion_cont`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_usuario3` FOREIGN KEY (`PFK_id_usuario`) REFERENCES `tbl_usuario` (`pk_id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_planeacion_usuario`
--

LOCK TABLES `tbl_planeacion_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_planeacion_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_planeacion_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_plantel`
--

DROP TABLE IF EXISTS `tbl_plantel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_plantel` (
  `PK_id_Plantel` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_institucion` varchar(20) NOT NULL,
  `VCH_plantel` varchar(20) NOT NULL,
  `VCH_CCT` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_id_Plantel`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_plantel`
--

LOCK TABLES `tbl_plantel` WRITE;
/*!40000 ALTER TABLE `tbl_plantel` DISABLE KEYS */;
INSERT INTO `tbl_plantel` VALUES (0,'Colegio de Estudios Científicos y Tecnológicos del Estado de México','Tequixquiac','15ETC0042H');
/*!40000 ALTER TABLE `tbl_plantel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_producto_esperado`
--

DROP TABLE IF EXISTS `tbl_producto_esperado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_producto_esperado` (
  `PK_id_producto_esperado` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`PK_id_producto_esperado`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_producto_esperado`
--

LOCK TABLES `tbl_producto_esperado` WRITE;
/*!40000 ALTER TABLE `tbl_producto_esperado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_producto_esperado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_recursos`
--

DROP TABLE IF EXISTS `tbl_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_recursos` (
  `PK_id_recursos` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_planeacion` int(11) NOT NULL,
  `VCH_equipo` varchar(1100) DEFAULT NULL,
  `VCH_material` varchar(1100) DEFAULT NULL,
  `VCH_fuentes` varchar(1500) DEFAULT NULL,
  `TINT_nivel` tinyint(1) DEFAULT NULL,
  `FK_id_espacio_fisico` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_recursos`),
  KEY `FK_id_planeacion2_idx` (`FK_id_planeacion`),
  KEY `FK_id_espacio_fisico2_idx` (`FK_id_espacio_fisico`),
  CONSTRAINT `FK_id_espacio_fisico2` FOREIGN KEY (`FK_id_espacio_fisico`) REFERENCES `tbl_espacio_fisico` (`PK_id_espacio_fisico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_planeacion2` FOREIGN KEY (`FK_id_planeacion`) REFERENCES `tbl_planeacion` (`PK_id_planeacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_recursos`
--

LOCK TABLES `tbl_recursos` WRITE;
/*!40000 ALTER TABLE `tbl_recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_modulo`
--

DROP TABLE IF EXISTS `tbl_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_modulo` (
  `PK_id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(100) NOT NULL,
  `VCH_clave` varchar(20) NOT NULL,
  `FK_id_especialidad` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_modulo`),
  KEY `FK_id_especialidad_idx` (`FK_id_especialidad`),
  CONSTRAINT `FK_id_especialidad` FOREIGN KEY (`FK_id_especialidad`) REFERENCES `tbl_especialidad` (`pk_id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_modulo`
--

LOCK TABLES `tbl_modulo` WRITE;
/*!40000 ALTER TABLE `tbl_modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_submodulo`
--

DROP TABLE IF EXISTS `tbl_submodulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_submodulo` (
  `PK_id_submodulo` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(100) NOT NULL,
  `VCH_clave` varchar(20) NOT NULL,
  `FK_id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`PK_id_submodulo`),
  KEY `FK_id_modulo_idx` (`FK_id_modulo`),
  CONSTRAINT `FK_id_modulo` FOREIGN KEY (`FK_id_modulo`) REFERENCES `tbl_modulo` (`pk_id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_submodulo`
--

LOCK TABLES `tbl_submodulo` WRITE;
/*!40000 ALTER TABLE `tbl_submodulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_submodulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_submodulo_competencia`
--

DROP TABLE IF EXISTS `tbl_submodulo_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_submodulo_competencia` (
  `PFK_id_submodulo` int(11) NOT NULL,
  `PFK_id_competencia` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_submodulo`,`PFK_id_competencia`),
  KEY `PFK_id_competencia_idx` (`PFK_id_competencia`),
  CONSTRAINT `PFK_id_competencia_2` FOREIGN KEY (`PFK_id_competencia`) REFERENCES `tbl_competencia` (`pk_id_competencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_submodulo_2` FOREIGN KEY (`PFK_id_submodulo`) REFERENCES `tbl_submodulo` (`pk_id_submodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_submodulo_competencia`
--

LOCK TABLES `tbl_submodulo_competencia` WRITE;
/*!40000 ALTER TABLE `tbl_submodulo_competencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_submodulo_competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_usuario`
--

DROP TABLE IF EXISTS `tbl_tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_tipo_usuario` (
  `PK_id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`PK_id_tipo_usuario`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_usuario`
--

LOCK TABLES `tbl_tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_titulo`
--

DROP TABLE IF EXISTS `tbl_titulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_titulo` (
  `PK_id_titulo` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`PK_id_titulo`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_titulo`
--

LOCK TABLES `tbl_titulo` WRITE;
/*!40000 ALTER TABLE `tbl_titulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_titulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_usuario` (
  `PK_id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `VCH_nombre` varchar(20) NOT NULL,
  `VCH_ap_paterno` varchar(20) NOT NULL,
  `VCH_ap_materno` varchar(20) NOT NULL,
  `VCH_curp` varchar(18) NOT NULL,
  `VCH_contrasenia` varchar(10) NOT NULL,
  `VCH_correo_electronico` varchar(40) NOT NULL,
  PRIMARY KEY (`PK_id_usuario`)
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario_cargo`
--

DROP TABLE IF EXISTS `tbl_usuario_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_usuario_cargo` (
  `PFK_id_usuario` int(11) NOT NULL,
  `PFK_id_cargo_revisor` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_usuario`,`PFK_id_cargo_revisor`),
  KEY `PFK_id_cargo_revisor_idx` (`PFK_id_cargo_revisor`),
  CONSTRAINT `PFK_id_cargo_revisor` FOREIGN KEY (`PFK_id_cargo_revisor`) REFERENCES `tbl_cargo_revisor` (`pk_id_cargo_revisor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_usuario` FOREIGN KEY (`PFK_id_usuario`) REFERENCES `tbl_usuario` (`pk_id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario_cargo`
--

LOCK TABLES `tbl_usuario_cargo` WRITE;
/*!40000 ALTER TABLE `tbl_usuario_cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuario_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario_tipo`
--

DROP TABLE IF EXISTS `tbl_usuario_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_usuario_tipo` (
  `PFK_id_usuario` int(11) NOT NULL,
  `PFK_id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`PFK_id_usuario`,`PFK_id_tipo_usuario`),
  KEY `PFK_id_tipo_usuario_idx` (`PFK_id_tipo_usuario`),
  CONSTRAINT `PFK_id_tipo_usuario1` FOREIGN KEY (`PFK_id_tipo_usuario`) REFERENCES `tbl_tipo_usuario` (`pk_id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PFK_id_usuario1` FOREIGN KEY (`PFK_id_usuario`) REFERENCES `tbl_usuario` (`pk_id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario_tipo`
--

LOCK TABLES `tbl_usuario_tipo` WRITE;
/*!40000 ALTER TABLE `tbl_usuario_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuario_tipo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-01 12:01:17
