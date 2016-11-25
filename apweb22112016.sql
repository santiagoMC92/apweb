-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: apweb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_empleado1_idx` (`idempleado`),
  CONSTRAINT `fk_Usuario_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (11,'santiagoMC92','a6f30815a43f38ec6de95b9a9d74da37',1,1,13),(12,'jose.manzur','f851e9336c42556ab67f7f6e7d9b9e0e',1,2,14);
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agente`
--

DROP TABLE IF EXISTS `agente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agente` (
  `idagente` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idagente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agente`
--

LOCK TABLES `agente` WRITE;
/*!40000 ALTER TABLE `agente` DISABLE KEYS */;
/*!40000 ALTER TABLE `agente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_pat` varchar(50) DEFAULT NULL,
  `apellido_mat` varchar(45) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `curp` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `teloficina` varchar(10) DEFAULT NULL,
  `extencion` char(6) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `otro` varchar(50) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `gestor` int(11) DEFAULT NULL,
  `filiacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_cliente_1_idx` (`gestor`),
  CONSTRAINT `fk_cliente_1` FOREIGN KEY (`gestor`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'FRANCISCO JULIAN','CAMPOS ','PARRA','CAPF560712','CAPF560712HYNMRR13','C. 91 No. 487 x 44 y 44 A','9994183166','','9994183166','','jmanzur_26@hotmail.com','',1,'TIENDA','DUEÑO',13,NULL),(2,'INOCENCIO','AMAYA','CHALE','AACI730824','AACI730824HYNMHN01','C. 31 SN KOMCHEN','9997472368','','9997472368','','jmanzur_26@hotmail.com','',1,'combi komchen','chofer',14,NULL),(3,'EMMA ROSA ','AMBROSIO','CETINA','AOCE720723','AOCE720723MYNMTM00','C. 46 A No. 577 A POR 93 Y 95 COL. SANTA ROSA','9991217551','','9991217551','','jmanzur_26@hotmail.com','',1,'ZAPATERIA','DUEÑA',14,NULL),(4,'NAZARIA','ARTEAGA','GARCIA','AEGN610612','AEGN610612MOCRRZ07','C. 62 B No. 517 x C. 67 D COL. MULCHECHEN','9994101919','','9994101919','','jmanzur_26@hotmail.com','',1,'TIANGUISTA','DUEÑA',13,NULL),(5,'JOSE DANIEL','AYALA','CHULIM','AACD770823','AACD770823HYNYHN08','79 A LOTE 2 58 C MULCHECHEN ','9999090487','','9999090487','','jmanzur_26@hotmail.com','',1,'PIÑATERO','DUEÑO',13,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision`
--

DROP TABLE IF EXISTS `comision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision` (
  `idcomision` int(11) NOT NULL AUTO_INCREMENT,
  `montoComision` decimal(18,4) DEFAULT NULL,
  `porcentaje` decimal(18,4) DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  `nocredito` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idcomision`),
  KEY `fk_comision_credito1_idx` (`nocredito`),
  KEY `fk_comision_empleado1_idx` (`idempleado`),
  CONSTRAINT `fk_comision_credito1` FOREIGN KEY (`nocredito`) REFERENCES `credito` (`nocredito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comision_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision`
--

LOCK TABLES `comision` WRITE;
/*!40000 ALTER TABLE `comision` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito`
--

DROP TABLE IF EXISTS `credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credito` (
  `nocredito` int(11) NOT NULL AUTO_INCREMENT,
  `fapertura` datetime DEFAULT CURRENT_TIMESTAMP,
  `ftermino` date DEFAULT NULL,
  `fprimerpago` date DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `monto` decimal(18,4) DEFAULT '0.0000',
  `tipoPagos` int(11) DEFAULT NULL,
  `idsubcuenta` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `porcentaje_interes` decimal(18,4) DEFAULT '0.0000',
  `comision` decimal(18,4) DEFAULT '0.0000',
  `comisionEstatus` int(11) DEFAULT '0',
  `tiempoPago` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `IVA` int(11) DEFAULT NULL,
  `acesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`nocredito`),
  KEY `fk_credito_1_idx` (`idsubcuenta`),
  KEY `fk_credito_3_idx` (`idcliente`),
  KEY `idusurio_idx` (`idusuario`),
  CONSTRAINT `fk_credito_1` FOREIGN KEY (`idsubcuenta`) REFERENCES `subcuenta` (`idsubcuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_credito_3` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idusurio` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito`
--

LOCK TABLES `credito` WRITE;
/*!40000 ALTER TABLE `credito` DISABLE KEYS */;
INSERT INTO `credito` VALUES (4,'2016-11-16 23:04:46','2017-01-10','2016-11-16',1,5000.0000,1,1,1,10.0000,1.0000,0,40,11,1,NULL),(7,'2016-11-16 23:08:47','2017-01-10','2016-11-16',1,5000.0000,1,1,1,10.0000,1.0000,0,40,11,1,NULL),(11,'2016-11-16 23:20:12','2017-01-10','2016-11-16',1,5000.0000,1,1,1,10.0000,1.0000,0,40,11,1,NULL),(12,'2016-11-16 23:20:23','2017-01-10','2016-11-16',1,5000.0000,1,1,1,10.0000,1.0000,0,40,11,1,NULL),(14,'2016-11-16 23:20:39','2017-01-10','2016-11-16',1,5000.0000,1,1,1,10.0000,1.0000,0,40,11,1,NULL),(17,'2016-11-17 22:46:39','2017-01-03','2016-11-17',1,44444.0000,1,1,2,10.0000,888.8800,0,33,12,1,11),(18,'2016-11-21 20:20:13','2017-01-30','2016-11-22',1,5000.0000,1,2,3,5.0000,100.0000,0,50,11,1,NULL);
/*!40000 ALTER TABLE `credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_pat` varchar(50) DEFAULT NULL,
  `apellido_mat` varchar(50) DEFAULT NULL,
  `direccion` varchar(75) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(75) DEFAULT NULL,
  `otro` varchar(75) DEFAULT NULL,
  `porcentaje_comision` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (13,'Jose Alejandro','Lara','Lopez','Calle 61 numero 477 por 54 y 56','9993314367','9231060','alexllz@hotmail.com','alejandro.lara@creditoglobal.mx',20.00),(14,'jose alberto','manzur ','castillo','calle 37 numero 744 a por 90 y 92 boulevares de caucel','9992665422','9231060','jose.manzur@creditoglobal.mx','',20.00);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondeador`
--

DROP TABLE IF EXISTS `fondeador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondeador` (
  `idfondeador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `cantinvert` decimal(18,2) DEFAULT '0.00',
  `comision` decimal(18,2) DEFAULT '0.00',
  `porcentaje_ganancia` decimal(18,2) DEFAULT NULL,
  `tiempo_ganancia` decimal(18,2) DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  PRIMARY KEY (`idfondeador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondeador`
--

LOCK TABLES `fondeador` WRITE;
/*!40000 ALTER TABLE `fondeador` DISABLE KEYS */;
INSERT INTO `fondeador` VALUES (1,'PD','PD',100000.00,0.00,NULL,NULL,NULL),(2,'PD1','PD1',50000.00,0.00,NULL,NULL,NULL),(3,'santiago','sds',1000.00,0.00,100.00,12.00,NULL),(4,'qqqqqq','wwwwwww',2222.00,0.00,222.00,22.00,'2016-11-24');
/*!40000 ALTER TABLE `fondeador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `idimagenes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ruta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idimagenes`),
  KEY `idcliente_idx` (`idcliente`),
  CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `idpagos` int(11) NOT NULL AUTO_INCREMENT,
  `NumPago` int(11) DEFAULT NULL,
  `fechaDePago` date DEFAULT NULL,
  `montoSinInteres` decimal(18,2) DEFAULT NULL,
  `montoInteres` decimal(18,2) DEFAULT NULL,
  `montoTotal` decimal(18,2) DEFAULT NULL,
  `estatus` int(11) DEFAULT '0',
  `fechaPagado` date DEFAULT NULL,
  `idcredito` int(11) DEFAULT NULL,
  `IVA` int(11) DEFAULT NULL,
  `montoIVA` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`idpagos`),
  KEY `idcredito_idx` (`idcredito`),
  CONSTRAINT `idcredito` FOREIGN KEY (`idcredito`) REFERENCES `credito` (`nocredito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (427,1,'2016-11-18',1346.79,222.22,1604.56,0,'2016-11-21',17,36,NULL),(428,2,'2016-11-21',1346.79,222.22,1604.56,0,'2016-11-22',17,36,NULL),(429,3,'2016-11-22',1346.79,222.22,1604.56,0,'2016-11-23',17,36,NULL),(430,4,'2016-11-23',1346.79,222.22,1604.56,0,'2016-11-24',17,36,NULL),(431,5,'2016-11-24',1346.79,222.22,1604.56,0,'2016-11-25',17,36,NULL),(432,6,'2016-11-25',1346.79,222.22,1604.56,0,'2016-11-26',17,36,NULL),(433,7,'2016-11-28',1346.79,222.22,1604.56,0,'2016-11-27',17,36,NULL),(434,8,'2016-11-29',1346.79,222.22,1604.56,0,'2016-11-28',17,36,NULL),(435,9,'2016-11-30',1346.79,222.22,1604.56,0,'2016-11-29',17,36,NULL),(436,10,'2016-12-01',1346.79,222.22,1604.56,0,'2016-11-30',17,36,NULL),(437,11,'2016-12-02',1346.79,222.22,1604.56,0,'2016-12-01',17,36,NULL),(438,12,'2016-12-05',1346.79,222.22,1604.56,0,'2016-12-02',17,36,NULL),(439,13,'2016-12-06',1346.79,222.22,1604.56,0,'2016-12-03',17,36,NULL),(440,14,'2016-12-07',1346.79,222.22,1604.56,0,'2016-12-04',17,36,NULL),(441,15,'2016-12-08',1346.79,222.22,1604.56,0,'2016-12-05',17,36,NULL),(442,16,'2016-12-09',1346.79,222.22,1604.56,0,'2016-12-06',17,36,NULL),(443,17,'2016-12-12',1346.79,222.22,1604.56,0,'2016-12-07',17,36,NULL),(444,18,'2016-12-13',1346.79,222.22,1604.56,0,'2016-12-08',17,36,NULL),(445,19,'2016-12-14',1346.79,222.22,1604.56,0,'2016-12-09',17,36,NULL),(446,20,'2016-12-15',1346.79,222.22,1604.56,0,'2016-12-10',17,36,NULL),(447,21,'2016-12-16',1346.79,222.22,1604.56,0,'2016-12-11',17,36,NULL),(448,22,'2016-12-19',1346.79,222.22,1604.56,0,'2016-12-12',17,36,NULL),(449,23,'2016-12-20',1346.79,222.22,1604.56,0,'2016-12-13',17,36,NULL),(450,24,'2016-12-21',1346.79,222.22,1604.56,0,'2016-12-14',17,36,NULL),(451,25,'2016-12-22',1346.79,222.22,1604.56,0,'2016-12-15',17,36,NULL),(452,26,'2016-12-23',1346.79,222.22,1604.56,0,'2016-12-16',17,36,NULL),(453,27,'2016-12-26',1346.79,222.22,1604.56,0,'2016-12-17',17,36,NULL),(454,28,'2016-12-27',1346.79,222.22,1604.56,0,'2016-12-18',17,36,NULL),(455,29,'2016-12-28',1346.79,222.22,1604.56,0,'2016-12-19',17,36,NULL),(456,30,'2016-12-29',1346.79,222.22,1604.56,0,'2016-12-20',17,36,NULL),(457,31,'2016-12-30',1346.79,222.22,1604.56,0,'2016-12-21',17,36,NULL),(458,32,'2017-01-02',1346.79,222.22,1604.56,0,'2016-12-22',17,36,NULL),(459,33,'2017-01-03',1346.79,222.22,1604.56,0,'2016-12-23',17,36,NULL),(510,1,'2016-11-22',100.00,12.50,112.50,0,NULL,18,0,NULL),(511,2,'2016-11-23',100.00,12.50,112.50,0,NULL,18,0,NULL),(512,3,'2016-11-24',100.00,12.50,112.50,0,NULL,18,0,NULL),(513,4,'2016-11-25',100.00,12.50,112.50,0,NULL,18,0,NULL),(514,5,'2016-11-28',100.00,12.50,112.50,0,NULL,18,0,NULL),(515,6,'2016-11-29',100.00,12.50,112.50,0,NULL,18,0,NULL),(516,7,'2016-11-30',100.00,12.50,112.50,0,NULL,18,0,NULL),(517,8,'2016-12-01',100.00,12.50,112.50,0,NULL,18,0,NULL),(518,9,'2016-12-02',100.00,12.50,112.50,0,NULL,18,0,NULL),(519,10,'2016-12-05',100.00,12.50,112.50,0,NULL,18,0,NULL),(520,11,'2016-12-06',100.00,12.50,112.50,0,NULL,18,0,NULL),(521,12,'2016-12-07',100.00,12.50,112.50,0,NULL,18,0,NULL),(522,13,'2016-12-08',100.00,12.50,112.50,0,NULL,18,0,NULL),(523,14,'2016-12-09',100.00,12.50,112.50,0,NULL,18,0,NULL),(524,15,'2016-12-12',100.00,12.50,112.50,0,NULL,18,0,NULL),(525,16,'2016-12-13',100.00,12.50,112.50,0,NULL,18,0,NULL),(526,17,'2016-12-14',100.00,12.50,112.50,0,NULL,18,0,NULL),(527,18,'2016-12-15',100.00,12.50,112.50,0,NULL,18,0,NULL),(528,19,'2016-12-16',100.00,12.50,112.50,0,NULL,18,0,NULL),(529,20,'2016-12-19',100.00,12.50,112.50,0,NULL,18,0,NULL),(530,21,'2016-12-20',100.00,12.50,112.50,0,NULL,18,0,NULL),(531,22,'2016-12-21',100.00,12.50,112.50,0,NULL,18,0,NULL),(532,23,'2016-12-22',100.00,12.50,112.50,0,NULL,18,0,NULL),(533,24,'2016-12-23',100.00,12.50,112.50,0,NULL,18,0,NULL),(534,25,'2016-12-26',100.00,12.50,112.50,0,NULL,18,0,NULL),(535,26,'2016-12-27',100.00,12.50,112.50,0,NULL,18,0,NULL),(536,27,'2016-12-28',100.00,12.50,112.50,0,NULL,18,0,NULL),(537,28,'2016-12-29',100.00,12.50,112.50,0,NULL,18,0,NULL),(538,29,'2016-12-30',100.00,12.50,112.50,0,NULL,18,0,NULL),(539,30,'2017-01-02',100.00,12.50,112.50,0,NULL,18,0,NULL),(540,31,'2017-01-03',100.00,12.50,112.50,0,NULL,18,0,NULL),(541,32,'2017-01-04',100.00,12.50,112.50,0,NULL,18,0,NULL),(542,33,'2017-01-05',100.00,12.50,112.50,0,NULL,18,0,NULL),(543,34,'2017-01-06',100.00,12.50,112.50,0,NULL,18,0,NULL),(544,35,'2017-01-09',100.00,12.50,112.50,0,NULL,18,0,NULL),(545,36,'2017-01-10',100.00,12.50,112.50,0,NULL,18,0,NULL),(546,37,'2017-01-11',100.00,12.50,112.50,0,NULL,18,0,NULL),(547,38,'2017-01-12',100.00,12.50,112.50,0,NULL,18,0,NULL),(548,39,'2017-01-13',100.00,12.50,112.50,0,NULL,18,0,NULL),(549,40,'2017-01-16',100.00,12.50,112.50,0,NULL,18,0,NULL),(550,41,'2017-01-17',100.00,12.50,112.50,0,NULL,18,0,NULL),(551,42,'2017-01-18',100.00,12.50,112.50,0,NULL,18,0,NULL),(552,43,'2017-01-19',100.00,12.50,112.50,0,NULL,18,0,NULL),(553,44,'2017-01-20',100.00,12.50,112.50,0,NULL,18,0,NULL),(554,45,'2017-01-23',100.00,12.50,112.50,0,NULL,18,0,NULL),(555,46,'2017-01-24',100.00,12.50,112.50,0,NULL,18,0,NULL),(556,47,'2017-01-25',100.00,12.50,112.50,0,NULL,18,0,NULL),(557,48,'2017-01-26',100.00,12.50,112.50,0,NULL,18,0,NULL),(558,49,'2017-01-27',100.00,12.50,112.50,0,NULL,18,0,NULL),(559,50,'2017-01-30',100.00,12.50,112.50,0,NULL,18,0,NULL);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `idrol_idx` (`idrol`),
  CONSTRAINT `idrol` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,'user','user',0,1),(2,'user','propio',1,1),(3,'user','add',1,1),(4,'clientes','clientes',0,1),(5,'clientes','propio',1,1),(6,'user','update',1,1),(7,'credito','credito',0,1),(8,'credito','add',1,1),(9,'rol','rol',0,1),(10,'rol','add',1,1),(11,'rol','update',1,1),(12,'user','propio',1,6),(13,'user','user',0,6),(14,'user','add',1,6),(15,'user','update',1,6),(16,'clientes','propio',1,6),(17,'clientes','clientes',0,6),(18,'clientes','add',1,6),(19,'clientes','update',1,6),(20,'credito','credito',0,6),(21,'credito','propio',1,1),(22,'credito','add',1,6),(23,'credito','update',1,1),(24,'fondeador','fondeador',0,6),(25,'fondeador','add',1,6),(26,'fondeador','update',1,6),(27,'subcuenta','subcuenta',0,6),(28,'subcuenta','add',1,6),(29,'subcuenta','update',1,6),(30,'reporte','reporte',0,6),(31,'reporte','propio',1,6),(32,'reporte','add',1,6),(33,'reporte','update',1,6);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(55) DEFAULT NULL,
  `descripcion` text,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador',' qqqqqqq',1),(2,'Admin',' El rol de administrador fue creado',1),(3,'Admin',' El rol de administrador fue creado',1),(4,'PPPPP',' PPPP',1),(5,'PPPPP',' PPPP',1),(6,'Editar',' Edit',1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcuenta`
--

DROP TABLE IF EXISTS `subcuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcuenta` (
  `idsubcuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `porcentajeint` varchar(45) DEFAULT NULL,
  `idfondeador` int(11) NOT NULL,
  PRIMARY KEY (`idsubcuenta`),
  KEY `fk_subcuenta_fondeador1_idx` (`idfondeador`),
  CONSTRAINT `fk_subcuenta_fondeador1` FOREIGN KEY (`idfondeador`) REFERENCES `fondeador` (`idfondeador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcuenta`
--

LOCK TABLES `subcuenta` WRITE;
/*!40000 ALTER TABLE `subcuenta` DISABLE KEYS */;
INSERT INTO `subcuenta` VALUES (1,'PD','10',1),(2,'PD1','5',2);
/*!40000 ALTER TABLE `subcuenta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-22 15:15:04
