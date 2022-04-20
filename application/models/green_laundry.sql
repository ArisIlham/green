CREATE DATABASE  IF NOT EXISTS `green_laundry` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `green_laundry`;
-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: green_laundry
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) COLLATE utf8_bin NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `nama` mediumtext COLLATE utf8_bin NOT NULL,
  `no_hp` varchar(13) COLLATE utf8_bin NOT NULL,
  `alamat` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_karyawan`),
  UNIQUE KEY `no_hp_UNIQUE` (`no_hp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyawan`
--

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` VALUES ('GLE001','2022-04-14','Ahmad','0895604395176','Pringsewu'),('GLE002','2022-04-14','Syafar','0895604395177','Pringsewu'),('GLE003','2022-04-14','Udin','0895604395178','Pringsewu');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kupon`
--

DROP TABLE IF EXISTS `kupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kupon` (
  `id_kupon` varchar(64) COLLATE utf8_bin NOT NULL,
  `kode_kupon` varchar(64) COLLATE utf8_bin NOT NULL,
  `judul_kupon` mediumtext COLLATE utf8_bin NOT NULL,
  `masa_berlaku` date NOT NULL,
  `keterangan` mediumtext COLLATE utf8_bin NOT NULL,
  `min_laundry` int(11) NOT NULL,
  `persentase_diskon` int(11) NOT NULL,
  `tier_kupon` int(11) NOT NULL,
  `jumlah_klaim` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kupon`),
  UNIQUE KEY `kode_kupon_UNIQUE` (`kode_kupon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupon`
--

LOCK TABLES `kupon` WRITE;
/*!40000 ALTER TABLE `kupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `kupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kupon_member`
--

DROP TABLE IF EXISTS `kupon_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kupon_member` (
  `id_kupon_member` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_member` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_kupon` varchar(64) COLLATE utf8_bin NOT NULL,
  `kode_kupon` varchar(64) COLLATE utf8_bin NOT NULL,
  `persentase_diskon` int(11) DEFAULT NULL,
  `min_laundry` int(11) DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `terpakai` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_kupon_member`),
  KEY `id_member_kupon` (`id_member`),
  KEY `id_kupon_idx` (`id_kupon`),
  CONSTRAINT `id_kupon` FOREIGN KEY (`id_kupon`) REFERENCES `kupon` (`id_kupon`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_member_kupon` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupon_member`
--

LOCK TABLES `kupon_member` WRITE;
/*!40000 ALTER TABLE `kupon_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `kupon_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id_member` varchar(64) COLLATE utf8_bin NOT NULL,
  `no_hp` varchar(13) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(16) COLLATE utf8_bin NOT NULL,
  `nama` mediumtext COLLATE utf8_bin NOT NULL,
  `alamat` mediumtext COLLATE utf8_bin NOT NULL,
  `foto` longblob DEFAULT NULL,
  `tier_member` int(11) NOT NULL,
  `total_laundry` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `no_hp_UNIQUE` (`no_hp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('6246592098554','0895604395176','ad','Ahmad Syafarudin','Pringsewu',NULL,1,NULL,NULL),('624e62ec53afe','0895604395177','asdasdasd','Ahmad Syafarudin','Pringsewu',NULL,1,NULL,NULL),('624e633a09a05','0895604395178','asdasdasd','Ahmad Syafarudin','Pringsewu',NULL,1,NULL,NULL),('624e63a7731e2','0895604395179','asdasdasdasd','Ahmad Syafarudin','Pringsewu',NULL,1,NULL,NULL),('624e6405d8255','0895604395190','12345678','Ahmad Syafarudin','Pringsewu',NULL,1,NULL,NULL),('625250c98fad1','089560439517','asdasdasd','Ahmad Syafarudin','Pringsewu',NULL,1,NULL,NULL),('625397da94d43','0895604395180','asdasdasd','adaa','Pringsewu',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id_order` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_member` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `no_hp` varchar(13) COLLATE utf8_bin NOT NULL,
  `nama` mediumtext COLLATE utf8_bin NOT NULL,
  `alamat` mediumtext COLLATE utf8_bin NOT NULL,
  `jenis_barang` mediumtext COLLATE utf8_bin NOT NULL,
  `note` longtext COLLATE utf8_bin DEFAULT NULL,
  `waktu_jemput` datetime NOT NULL,
  `kupon` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_member_order` (`id_member`),
  CONSTRAINT `id_member_order` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presensi`
--

DROP TABLE IF EXISTS `presensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presensi` (
  `id_presensi` varchar(64) COLLATE utf8_bin NOT NULL,
  `id_karyawan` varchar(10) COLLATE utf8_bin NOT NULL,
  `nama` mediumtext COLLATE utf8_bin NOT NULL,
  `status` mediumtext COLLATE utf8_bin NOT NULL,
  `waktu_hadir` datetime DEFAULT NULL,
  `keterangan` mediumtext COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_presensi`),
  KEY `id_karyawan` (`id_karyawan`),
  CONSTRAINT `id_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presensi`
--

LOCK TABLES `presensi` WRITE;
/*!40000 ALTER TABLE `presensi` DISABLE KEYS */;
INSERT INTO `presensi` VALUES ('6257b886aefb3','GLE001','Ahmad','Izin','2022-04-14 13:01:17','Pening Oy'),('6257b886bd605','GLE002','Syafar','Tidak Hadir','2022-04-14 00:00:00',NULL),('6257b886cbb5d','GLE003','Udin','Hadir','2022-04-14 13:00:57',NULL);
/*!40000 ALTER TABLE `presensi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-14 13:23:43
