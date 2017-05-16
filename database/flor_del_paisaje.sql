-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: flor_del_paisaje
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `auditoria o bitacora`
--

DROP TABLE IF EXISTS `auditoria o bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria o bitacora` (
  `codigo_bitacora` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tabla` varchar(20) DEFAULT NULL,
  `valor_original` varchar(30) DEFAULT NULL,
  `valor_nuevo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria o bitacora`
--

LOCK TABLES `auditoria o bitacora` WRITE;
/*!40000 ALTER TABLE `auditoria o bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditoria o bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `codigo_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `nit_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `codigo_mun` int(11) NOT NULL,
  PRIMARY KEY (`nit_cliente`),
  KEY `fk_cliente_municipio1_idx` (`codigo_mun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `nofactura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `iva` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`nofactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_empresa`
--

DROP TABLE IF EXISTS `datos_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_empresa` (
  `nit` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`nit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_empresa`
--

LOCK TABLES `datos_empresa` WRITE;
/*!40000 ALTER TABLE `datos_empresa` DISABLE KEYS */;
INSERT INTO `datos_empresa` VALUES ('3859853-1','Distribuidora Flor del Paisaje','8a. Avenida 8-02 Zona 2 Solola','42162533','fejuchi@hotmail.com');
/*!40000 ALTER TABLE `datos_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `codigo_dep` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compras`
--

DROP TABLE IF EXISTS `detalle_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_compras` (
  `codigo_detalle_co` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `nit_proveedor` int(11) NOT NULL,
  `nofactura` int(11) NOT NULL,
  PRIMARY KEY (`codigo_detalle_co`),
  KEY `fk_detalle_compras_proveedor1_idx` (`nit_proveedor`),
  KEY `fk_detalle_compras_compras1_idx` (`nofactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compras`
--

LOCK TABLES `detalle_compras` WRITE;
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_factura` (
  `codigo_detalle_fac` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `no_factura` int(11) NOT NULL,
  PRIMARY KEY (`codigo_detalle_fac`),
  KEY `fk_detalle_factura_producto1_idx` (`codigo_producto`),
  KEY `fk_detalle_factura_factura1_idx` (`no_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_factura`
--

LOCK TABLES `detalle_factura` WRITE;
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devolucion`
--

DROP TABLE IF EXISTS `devolucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devolucion` (
  `codigo_devolucion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `codigo_detalle_fac` int(11) NOT NULL,
  PRIMARY KEY (`codigo_devolucion`),
  KEY `fk_devolucion_detalle_factura1_idx` (`codigo_detalle_fac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devolucion`
--

LOCK TABLES `devolucion` WRITE;
/*!40000 ALTER TABLE `devolucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `devolucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `no_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `iva` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `nit_cliente` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `pago_idpago` int(11) NOT NULL,
  PRIMARY KEY (`no_factura`),
  KEY `fk_factura_cliente1_idx` (`nit_cliente`),
  KEY `fk_factura_usuario1_idx` (`codigo_usuario`),
  KEY `fk_factura_tipo_pago1_idx` (`pago_idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `codigo_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `existencia` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `maximo` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  PRIMARY KEY (`codigo_inventario`),
  KEY `fk_inventario_producto1_idx` (`codigo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `codigo_mun` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `codigo_dep` int(11) NOT NULL,
  PRIMARY KEY (`codigo_mun`),
  KEY `fk_municipio_departamento1_idx` (`codigo_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `codigo_producto` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `tamaño` varchar(15) DEFAULT NULL,
  `precio_costo` decimal(10,0) NOT NULL,
  `precio_venta` decimal(10,0) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `nit_proveedor` int(11) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `fk_producto_categoria1_idx` (`codigo_categoria`),
  KEY `fk_producto_proveedor1_idx` (`nit_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `nit_proveedor` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  PRIMARY KEY (`nit_proveedor`),
  UNIQUE KEY `nit_proveedor_UNIQUE` (`nit_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago`
--

DROP TABLE IF EXISTS `tipo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_pago` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago`
--

LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `tipousuario` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Fernando','Julajuj Chiroy','Gerente','2017-05-13','fejuchi','123','Administrador');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-15 22:52:31
