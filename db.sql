-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: jo_ta
-- ------------------------------------------------------
-- Server version 	5.5.5-10.3.17-MariaDB-0ubuntu0.19.04.1
-- Date: Mon, 02 Sep 2019 09:15:35 +0700

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
-- Table structure for table `tracking`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usulan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aksi` enum('a','d') NOT NULL,
  `waktu` datetime NOT NULL,
  `user_level` enum('opkab','opopd','opkec') NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usulan` (`id_usulan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`),
  CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracking`
--

LOCK TABLES `tracking` WRITE;
/*!40000 ALTER TABLE `tracking` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `tracking` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tracking` with 0 row(s)
--

--
-- Table structure for table `usulan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_kecamatan` varchar(7) NOT NULL,
  `id_opd` int(11) NOT NULL,
  `kegiatan` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `lokasi` varchar(191) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sumber_dana` varchar(191) DEFAULT NULL,
  `id_user_verifikasi` int(11) DEFAULT NULL,
  `aksi_verifikasi` enum('a','d') DEFAULT NULL,
  `waktu_verifikasi` datetime DEFAULT NULL,
  `keterangan_verifikasi` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_opd` (`id_opd`),
  KEY `id_kecamatan` (`id_kecamatan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id`),
  CONSTRAINT `usulan_ibfk_5` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`),
  CONSTRAINT `usulan_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usulan`
--

LOCK TABLES `usulan` WRITE;
/*!40000 ALTER TABLE `usulan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usulan` VALUES (15,4,'2019-09-02','2019','1810020',3,'Medkit','Pkaet','Disitu loh',1000000,20,'aa',3,'d','2019-09-02 08:18:52','qq'),(16,4,'2019-09-21','2011','1810020',3,'Ntahlah aku juga gak tau','Piringan','Neng ndi yoo',20000,3400,'',3,'a','2019-09-02 08:20:19',''),(17,4,'2019-09-02','2011','1810020',3,'sadfsadfasdf','Piringan','asdfasdf',123414,124124,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usulan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usulan` with 3 row(s)
--

--
-- Table structure for table `desa`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desa` (
  `id` varchar(10) NOT NULL,
  `kecamatan_id` varchar(7) DEFAULT NULL,
  `nama_desa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`),
  CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desa`
--

LOCK TABLES `desa` WRITE;
/*!40000 ALTER TABLE `desa` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `desa` VALUES ('1810010004','1810010','SELAPAN'),('1810010005','1810010','KEDAUNG'),('1810010006','1810010','SUKA NEGERI'),('1810010007','1810010','RANTAU TIJANG'),('1810010008','1810010','PARDASUKA'),('1810010009','1810010','TANJUNG RUSIA'),('1810010013','1810010','WARGO MULYO'),('1810010014','1810010','PUJODADI'),('1810010015','1810010','SUKOREJO'),('1810010018','1810010','SIDODADI'),('1810010019','1810010','PARDASUKA TIMUR'),('1810010020','1810010','TANJUNG RUSIA TIMUR'),('1810010021','1810010','PARDASUKA SELATAN'),('1810020001','1810020','KRESNOMULYO'),('1810020002','1810020','SUMBER AGUNG'),('1810020003','1810020','AMBARAWA'),('1810020004','1810020','AMBARAWA BARAT'),('1810020005','1810020','TANJUNG ANOM'),('1810020006','1810020','JATI AGUNG'),('1810020007','1810020','MARGODADI'),('1810020008','1810020','AMBARAWA TIMUR'),('1810030001','1810030','CANDI RETNO'),('1810030002','1810030','TANJUNG DALAM'),('1810030003','1810030','WAY NGISOM'),('1810030004','1810030','KARANGSARI'),('1810030005','1810030','GUMUK MAS'),('1810030006','1810030','PATOMAN'),('1810030007','1810030','PAGELARAN'),('1810030008','1810030','SUKARATU'),('1810030009','1810030','SUKAWANGI'),('1810030010','1810030','LUGUSARI'),('1810030011','1810030','PANUTAN'),('1810030012','1810030','BUMI RATU'),('1810030019','1810030','GEMAH RIPAH'),('1810030020','1810030','PAMENANG'),('1810030023','1810030','PASIR UKIR'),('1810030024','1810030','GUMUK REJO'),('1810030027','1810030','PUJI HARJO'),('1810030028','1810030','PADANG REJO'),('1810030029','1810030','SIDODADI'),('1810030030','1810030','SUMBER REJO'),('1810030031','1810030','GANJARAN'),('1810030032','1810030','BUMI REJO'),('1810031013','1810031','FAJAR BARU'),('1810031014','1810031','KEMILIN'),('1810031015','1810031','NEGLASARI'),('1810031016','1810031','SUMBER BANDUNG'),('1810031017','1810031','GIRI TUNGGAL'),('1810031018','1810031','MARGOSARI'),('1810031021','1810031','FAJAR MULIA'),('1810031022','1810031','MADARAYA'),('1810031025','1810031','GUNUNG RAYA'),('1810031026','1810031','WAY KUNIR'),('1810040007','1810040','MARGAKAYA'),('1810040008','1810040','WALUYOJATI'),('1810040009','1810040','PAJAR ESUK'),('1810040011','1810040','SIDOHARJO'),('1810040012','1810040','PODOMORO'),('1810040013','1810040','BUMI ARUM'),('1810040015','1810040','PAJAR AGUNG'),('1810040016','1810040','PRINGSEWU UTARA'),('1810040017','1810040','PRINGSEWU SELATAN'),('1810040018','1810040','PRINGSEWU BARAT'),('1810040019','1810040','PRINGSEWU TIMUR'),('1810040020','1810040','REJOSARI'),('1810040021','1810040','BUMI AYU'),('1810040022','1810040','PODOSARI'),('1810040023','1810040','FAJAR AGUNG BARAT'),('1810050001','1810050','PAREREJO'),('1810050002','1810050','BLITAREJO'),('1810050003','1810050','PANJEREJO'),('1810050004','1810050','BULUKARTO'),('1810050005','1810050','WATES'),('1810050006','1810050','BULUREJO'),('1810050007','1810050','TAMBAK REJO'),('1810050008','1810050','WONODADI'),('1810050009','1810050','GADING REJO'),('1810050010','1810050','TEGALSARI'),('1810050011','1810050','TULUNG AGUNG'),('1810050012','1810050','JOGYAKARTA'),('1810050013','1810050','KEDIRI'),('1810050014','1810050','MATARAM'),('1810050015','1810050','WONOSARI'),('1810050016','1810050','KLATEN'),('1810050017','1810050','WATES TIMUR'),('1810050018','1810050','WATES SELATAN'),('1810050019','1810050','GADING REJO TIMUR'),('1810050020','1810050','GADING REJO UTARA'),('1810050021','1810050','TAMBAH REJO BARAT'),('1810050022','1810050','YOGYAKARTA SELATAN'),('1810050023','1810050','WONODADI UTARA'),('1810060002','1810060','SINAR BARU'),('1810060003','1810060','SUKOHARJO I'),('1810060004','1810060','SUKOHARJO II'),('1810060005','1810060','SUKOHARJO IV'),('1810060006','1810060','PANGGUNG REJO'),('1810060007','1810060','PANDANSARI'),('1810060008','1810060','PANDAN SURAT'),('1810060009','1810060','SUKOHARJO III'),('1810060010','1810060','KEPUTRAN'),('1810060011','1810060','SUKOYOSO'),('1810060012','1810060','SILIWANGI'),('1810060022','1810060','WARINGINSARI BARAT'),('1810060023','1810060','PANDANSARI SELATAN'),('1810060024','1810060','SINAR BARU TIMUR'),('1810060025','1810060','PANGGUNG REJO UTARA'),('1810060026','1810060','SUKOHARJO III BARAT'),('1810070001','1810070','WAYA KRUI'),('1810070002','1810070','SRI RAHAYU'),('1810070003','1810070','NUSA WUNGU'),('1810070004','1810070','SUKAMULYA'),('1810070005','1810070','BANJAREJO'),('1810070006','1810070','SRIWUNGU'),('1810070007','1810070','BANYUWANGI'),('1810070008','1810070','BANYUMAS'),('1810070009','1810070','SINAR MULIA'),('1810070010','1810070','MULYOREJO'),('1810070011','1810070','BANYU URIP'),('1810080004','1810080','SINAR WAYA'),('1810080005','1810080','BANDUNG BARU'),('1810080006','1810080','WARINGINSARI TIMUR'),('1810080007','1810080','TRITUNGGAL MULYA'),('1810080008','1810080','ENGGAL REJO'),('1810080009','1810080','SUKOHARUM'),('1810080010','1810080','ADI LUWIH'),('1810080011','1810080','PURWODADI'),('1810080012','1810080','SRIKATON'),('1810080013','1810080','TUNGGUL PAWENANG'),('1810080014','1810080','BANDUNG BARU BARAT'),('1810080015','1810080','TOTO KARTO'),('1810080016','1810080','KUTA WARINGIN');
/*!40000 ALTER TABLE `desa` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `desa` with 131 row(s)
--

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` enum('opkab','opopd','opkec') NOT NULL,
  `nama` varchar(191) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_kecamatan` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id_opd` (`id_opd`),
  KEY `id_kecamatan` (`id_kecamatan`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (2,'opkab','$2y$10$Fcuk6eH24UXPkXD172QSqO5cnTUHWwY5XURPmvqaPpuFHp.lONaJi','opkab','Nama OP KAB',NULL,NULL),(3,'opdinkes','$2y$10$9ymCEthdi73IcwWoy6e4reU0JW3jk0dW.2YRMPbjgYMyFgI0qXySy','opopd','Nama OP OPD DINKES',3,NULL),(4,'opambarawa','$2y$10$fUpss95f1nrM94b1.RtE7ORtpWT1kuIOTFbWIbMLXJb8SZ6spKXMq','opkec','Nama OP Kec Ambarawa',NULL,'1810020'),(7,'oppardasuka','$2y$10$g5igL7uYI/ZKWOH5bEdU.e4XXSTRf0i05YJ1BsLDEV.4wrXzvo7x6','opkec','Nama oppardasuka',NULL,'1810010'),(8,'ophutan','$2y$10$wWC3swzhvhuwinmifGOMjuUKO/U2H9eEW8GXJ8WCmS8QL7UKQrRVe','opopd','Nama ophutan',4,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `user` with 5 row(s)
--

--
-- Table structure for table `provinsi`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinsi` (
  `id` varchar(2) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinsi`
--

LOCK TABLES `provinsi` WRITE;
/*!40000 ALTER TABLE `provinsi` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `provinsi` VALUES ('18','LAMPUNG');
/*!40000 ALTER TABLE `provinsi` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `provinsi` with 1 row(s)
--

--
-- Table structure for table `kabupaten`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kabupaten` (
  `id` varchar(4) NOT NULL,
  `provinsi_id` varchar(2) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provinsi_id` (`provinsi_id`),
  CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kabupaten`
--

LOCK TABLES `kabupaten` WRITE;
/*!40000 ALTER TABLE `kabupaten` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `kabupaten` VALUES ('1810','18','KABUPATEN PRINGSEWU');
/*!40000 ALTER TABLE `kabupaten` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `kabupaten` with 1 row(s)
--

--
-- Table structure for table `kecamatan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kecamatan` (
  `id` varchar(7) NOT NULL,
  `kabupaten_id` varchar(4) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kabupaten_id` (`kabupaten_id`),
  CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatan`
--

LOCK TABLES `kecamatan` WRITE;
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `kecamatan` VALUES ('1810010','1810','PARDASUKA'),('1810020','1810','AMBARAWA'),('1810030','1810','PAGELARAN'),('1810031','1810','PAGELARAN UTARA'),('1810040','1810','PRINGSEWU'),('1810050','1810','GADING REJO'),('1810060','1810','SUKOHARJO'),('1810070','1810','BANYUMAS'),('1810080','1810','ADI LUWIH');
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `kecamatan` with 9 row(s)
--

--
-- Table structure for table `opd`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opd` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opd`
--

LOCK TABLES `opd` WRITE;
/*!40000 ALTER TABLE `opd` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `opd` VALUES (3,'DINAS KESEHATAN'),(4,'DINAS KEHUTANAN');
/*!40000 ALTER TABLE `opd` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `opd` with 2 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Mon, 02 Sep 2019 09:15:35 +0700
