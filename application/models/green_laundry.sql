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
  `min_laundry` float NOT NULL,
  `persentase_diskon` float NOT NULL,
  `tier_kupon` int(11) NOT NULL,
  `jumlah_klaim` int(11) DEFAULT NULL,
  `id_member` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_kupon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupon`
--

LOCK TABLES `kupon` WRITE;
/*!40000 ALTER TABLE `kupon` DISABLE KEYS */;
INSERT INTO `kupon` VALUES ('6278b70d96c75','DSC 10%-3kg','Diskon Khusus Member Baru','2022-05-16','Khusus untuk Member Baru',3,10,0,0,'6278b70d704ce'),('6279ba9760f37','DSC 10%-3kg','Diskon Khusus Member Baru','2022-05-17','Khusus untuk Member Baru',3,10,0,1,'6279ba9745766'),('627a2d6f3a778','DSC 15%-2kg','Ulang Tahun Green Laundry ','2022-05-25','Diskon Spesial Ulang Tahun Green Laundry Express ke-3',2,15,4,30,NULL);
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
  `judul_kupon` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `persentase_diskon` int(11) DEFAULT NULL,
  `min_laundry` float DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `terpakai` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_kupon_member`),
  KEY `id_member_kupon` (`id_member`),
  CONSTRAINT `id_member_kupon` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupon_member`
--

LOCK TABLES `kupon_member` WRITE;
/*!40000 ALTER TABLE `kupon_member` DISABLE KEYS */;
INSERT INTO `kupon_member` VALUES ('627c53c33abd3','6278b70d704ce','6278b70d96c75','DSC 10%-3kg','Diskon Khusus Member Baru',10,3,'2022-05-16',1);
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
  `waktu_join` date NOT NULL,
  `no_hp` varchar(13) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `nama` mediumtext COLLATE utf8_bin NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` mediumtext COLLATE utf8_bin NOT NULL,
  `foto` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `tier_member` int(11) NOT NULL,
  `total_laundry` float DEFAULT NULL,
  `total_harga` int(64) DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `no_hp_UNIQUE` (`no_hp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('6278b70d704ce','2022-05-09','0895604395176','$2y$10$MDcd8l8thrID52cH6FpN0Og4pZrDMlZtJskedmoMt7DMHlVKtrszu','Ahmad Syafarudin','2001-04-30','Jl. Kesehatan Pringsewu Selatan','foto-profil-Ahmad_Syafarudin_6278b70d704ce.png',1,0,0),('6279ba9745766','2022-05-10','0895604395177','$2y$10$G3Od9ARzoLuoK6FmZtx3p.Ln/O4R9EthvzB22z.pIFIqcPk1KTCfu','Samlo Berutu','2000-01-15','Jl. Kapiten Pattimura Blok. 7 Pringsewu Barat','foto-profil-Samlo_Berutu_Ganteng_6279ba9745766.png',1,0,0);
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
  `id_kupon_member` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `kupon` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `judul_kupon` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `berat` float DEFAULT NULL,
  `harga` int(12) DEFAULT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_member_order` (`id_member`),
  CONSTRAINT `id_member_order` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES ('627a79aac1e3a','6278b70d704ce','0895604395176','Ahmad Syafarudin','Jl. Kesehatan Pringsewu Selatan','Baju dan Seprai','Anterin ke Rumah Besok jam 8','2022-05-11 07:00:00',NULL,'',NULL,NULL,NULL,2),('627c545a7e721','6278b70d704ce','0895604395176','Ahmad Syafarudin','Masjid Al-Fajar Pringsewu Selatan','Karpet Masjid','Anterin ke Masjid kalok dah selesai ','2022-05-12 09:00:00','627c53c33abd3','DSC 10%-3kg','Diskon Khusus Member Baru',NULL,NULL,2);
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
  CONSTRAINT `id_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presensi`
--

LOCK TABLES `presensi` WRITE;
/*!40000 ALTER TABLE `presensi` DISABLE KEYS */;
INSERT INTO `presensi` VALUES ('6257b886aefb3','GLE001','Ahmad','Izin','2022-04-14 13:01:17','Pening Oy'),('6257b886bd605','GLE002','Syafar','Tidak Hadir','2022-04-14 00:00:00',NULL),('6257b886cbb5d','GLE003','Udin','Hadir','2022-04-14 13:00:57',NULL),('6257cd5da0a35','GLE001','Ahmad','Izin','2022-04-14 16:48:57','Pening Oy'),('6257cd5da4d5a','GLE002','Syafar','Hadir','2022-04-14 16:46:52',NULL),('6257cd5da53bd','GLE003','Udin','Hadir','2022-04-14 16:30:53',NULL),('6259a49279fea','GLE001','Ahmad','Tidak Hadir','2022-04-16 00:00:00',NULL),('6259a4927e45f','GLE002','Syafar','Tidak Hadir','2022-04-16 00:00:00',NULL),('6259a4927ef98','GLE003','Udin','Tidak Hadir','2022-04-16 00:00:00',NULL),('6259f16f2868a','GLE001','Ahmad','Tidak Hadir','2022-04-16 00:00:00',NULL),('6259f16f2c844','GLE002','Syafar','Tidak Hadir','2022-04-16 00:00:00',NULL),('6259f16f2cc0e','GLE003','Udin','Tidak Hadir','2022-04-16 00:00:00',NULL),('625af6125fb79','GLE001','Ahmad','Tidak Hadir','2022-04-17 00:00:00',NULL),('625af6127d2a2','GLE002','Syafar','Tidak Hadir','2022-04-17 00:00:00',NULL),('625af6127e272','GLE003','Udin','Tidak Hadir','2022-04-17 00:00:00',NULL),('625b26d49bd5c','GLE001','Ahmad','Tidak Hadir','2022-04-17 00:00:00',NULL),('625b26d49d9a0','GLE002','Syafar','Tidak Hadir','2022-04-17 00:00:00',NULL),('625b26d49fd88','GLE003','Udin','Tidak Hadir','2022-04-17 00:00:00',NULL),('625b8bd93b6ca','GLE001','Ahmad','Tidak Hadir','2022-04-17 00:00:00',NULL),('625b8bd942258','GLE002','Syafar','Tidak Hadir','2022-04-17 00:00:00',NULL),('625b8bd944205','GLE003','Udin','Tidak Hadir','2022-04-17 00:00:00',NULL),('625cada82cf9b','GLE001','Ahmad','Tidak Hadir','2022-04-18 00:00:00',NULL),('625cada8309d6','GLE002','Syafar','Tidak Hadir','2022-04-18 00:00:00',NULL),('625cada830dab','GLE003','Udin','Tidak Hadir','2022-04-18 00:00:00',NULL),('625cadaf1119d','GLE001','Ahmad','Hadir','2022-04-18 14:30:48',NULL),('625cadaf1245c','GLE002','Syafar','Tidak Hadir','2022-04-18 00:00:00',NULL),('625cadaf1478a','GLE003','Udin','Tidak Hadir','2022-04-18 00:00:00',NULL),('625d997e2a1d8','GLE001','Ahmad','Hadir','2022-04-22 14:06:29',NULL),('625d997e5b0ed','GLE002','Syafar','Tidak Hadir','2022-04-19 00:00:00',NULL),('625d997e5bf88','GLE003','Udin','Tidak Hadir','2022-04-19 00:00:00',NULL),('626c19925bdf0','GLE001','Ahmad','Hadir','2022-05-10 05:57:25',NULL),('626c19925d213','GLE002','Syafar','Tidak Hadir','2022-04-30 00:00:00',NULL),('626c19925ded4','GLE003','Udin','Hadir','2022-05-10 05:58:36',NULL),('6279a10da69cf','GLE001','Ahmad','Hadir','2022-05-10 06:37:49',NULL),('6279a10da865e','GLE002','Syafar','Izin','2022-05-10 06:19:34','sakit'),('6279a10da8f6a','GLE003','Udin','Hadir','2022-05-10 06:19:19',NULL),('627a9a126adaa','GLE001','Ahmad','Tidak Hadir','2022-05-11 00:00:00',NULL),('627a9a126db36','GLE002','Syafar','Tidak Hadir','2022-05-11 00:00:00',NULL),('627a9a12711bf','GLE003','Udin','Tidak Hadir','2022-05-11 00:00:00',NULL),('627beb9a03aa7','GLE001','Ahmad','Tidak Hadir','2022-05-12 00:00:00',NULL),('627beb9a4d322','GLE002','Syafar','Tidak Hadir','2022-05-12 00:00:00',NULL),('627beb9a81289','GLE003','Udin','Tidak Hadir','2022-05-12 00:00:00',NULL);
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

-- Dump completed on 2022-05-12  7:29:50
