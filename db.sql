-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: aji_ta
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.38-MariaDB
-- Date: Thu, 27 Jun 2019 06:46:34 +0200

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
-- Table structure for table `agen`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `no_hp` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `agen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agen`
--

LOCK TABLES `agen` WRITE;
/*!40000 ALTER TABLE `agen` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `agen` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `agen` with 0 row(s)
--

--
-- Table structure for table `berita`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(191) NOT NULL,
  `berita` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `berita` with 0 row(s)
--

--
-- Table structure for table `produk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `produk` varchar(191) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` enum('i','k') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `produk` VALUES (1,1,'Eka waktu Ideal (rupiah)','Asuransi yang dirancang untuk membantu keluarga indonesia mempersiapkan dana tabungan hari tua sekaligus untuk mempersiapkan perlindungan ekonomi bagi ahli waris jika anda sebagai tertanggung meninggal dunia.','i'),(2,1,'Mitra Abadi','Program asuransi yang dirancang untuk memberikan perlindungan seumur hidup bagi anda.','i'),(3,1,'Mitra Beasiswa','Asuransi ini dirancang untuk memberikan perlindungan dan pembiayaan pendidikan buah hati anda dibangku Taman kanak-kanak hingga perguruan tinggi, baik orang tua hidup atau meninggal.','i'),(4,1,'Mitra Cerdas','Merupakan program asuransi pendidikan yang dikaitkan dengan program investasi, sehingga dana yang disiapkan untuk pembiayaan pendidikan berkembang sesuai dengan hasil investasi.','i'),(5,1,'Mitra Melati','Merupakan program asuransi yang menawarkan perolehan manfaat pasti dalam bentuk proteksi dan tabungan sekaligus memberikan jaminan hasil investasi yang berkesinambungan dari waktu ke waktu.','i'),(6,1,'Mitra Oetama','Program asuransi yang menyiapkan dana ketika anda menjalani rawat inap di rumah sakit dan sekaligus memberikan kesempatan memperoleh hasil investasi yang kompetitif dari pengembangan dana premi asuransi yang anda bayar.','i'),(7,1,'Mitra Pelangi','Merupakan program asuransi yang menawarkan dua manfaat utama, proteksi dan tabungan, satu manfaat bonus dan empat manfaat tambahan yang bisa diadaptasi sesuai kebutuhan anda.','i'),(8,1,'Mitra Permata','Dirancang untuk memberikan perlindungan manfaat tabungan (permata) dengan nilai investasi. Program ini menawarkan fleksibilitas dalam membayar premi, memilih besar uang pertanggungan asuransi dan mengambil nilai tabungan.','i'),(9,1,'Mitra Poesaka','Program asuransi yang menawarkan perlindungan dan tabungan masa depan dengan fleksibilitas dalam hal pembayaran premi, penarikan nilai dengan program investasi.','i'),(10,1,'Mitra Prima','Merupakan program asuransi dwiguna murni dengan manfaat optimal, karena selain tabungan dan santunan pasti ketika tertanggung hidup atau meninggal, program ini juga memberikan akumulasi dengan program investasi','i'),(11,1,'Mitra Sehat','Program asuransi yang menyiapkan dana ketika anda menjalani rawat inap di rumah sakit, sekaligus member kesempatan memperoleh hasil investasi yang kompetitif dari pengembangan dana premi asuransi yang anda bayar.','i'),(12,1,'Mitra Sejati','Dirancang untuk memenuhi anda yang paling mendasar dari sebuah program asuransi untuk mendapatkan proteksi jika sewaktu-waktu anda tidak lagi sanggup untuk menhasilkan nilai ekonomi','i'),(13,1,'BP Smart','Asuransi yang memberikan perlindungan sekaligus investasi anda dimasa depan dengan nilai premi yang sangat terjangkau.','i'),(14,1,'Kredit','Dirancang untuk memberikan perlindungan bagi para debitur suatu lembaga keuangan, terdiri atas asuransi kredit ekawaktu, kredit cicilan/tahunan dan kredit anuitas','k'),(15,1,'Eka waktu','Merupakan perlindungan asuransi murni (non tabungan)untuk jangka waktu tertentu.','k'),(16,1,'Kecelakaan','Merupakan program perlindungan asuransi yang memberikan benefit atau manfaat kepada peserta jika terjadi risiko kecelakaan dalam masa asuransi','k'),(17,1,'Rawat Inap dan Pembedahan','Dirancang untuk memberikan perlindungan bagi peserta yang menjalani rawat inap dan pembedahan dalam bentuk penggantian biaya perawatan dan pembedahan','k'),(18,1,'Program Kesejahteraan karyawan','Dirancang untuk memberikan perlindungan asuransi bagi peserta/karyawan pada usia tertentu yang mengalami cacat/fungsinya atau untuk peserta/karyawan yang meninggal dunia.','k'),(19,1,'Idaman','\"Iuran Dana Mantap\". Merupakan program asuransi dengan\r\n unsure tabungan. Dalam program ini, jika resiko meninggal dunia dibayar sebesar uang pertanggungan yang disepakati, dan jika berhenti dari kepesertaan asuransi dibayar nilai tunai.','k'),(20,1,'Asri','\"Asuransi rakyat Indonesia\". Dirancang untuk memberikan perlindungan asuransi bagi keluarga Indonesia yang menjadi peserta, tanpa kecuali, termasuk rakyat kecil dengan benefit dalam bentuk santunan kecelakaan cacat atau meninggal dunia Agen blok dalam menjual produk perusahaan telah tersebar sampai ke beberapa daerah sekitar Kec. Wlingi. Setiap agen blok memiliki supervisor yang mengawasinya.','k');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `produk` with 20 row(s)
--

--
-- Table structure for table `tanya_jawab`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanya_jawab` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_konsumen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text,
  KEY `id_user` (`id_user`),
  KEY `id_user_konsumen` (`id_user_konsumen`),
  CONSTRAINT `tanya_jawab_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `tanya_jawab_ibfk_2` FOREIGN KEY (`id_user_konsumen`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanya_jawab`
--

LOCK TABLES `tanya_jawab` WRITE;
/*!40000 ALTER TABLE `tanya_jawab` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `tanya_jawab` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tanya_jawab` with 0 row(s)
--

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` enum('u','a') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (1,'Administrator','admin','$2y$12$0uBugMReeBm0Q0K.v8N6nea.DOin3/TMSV2Qds8NIp1KB6XGnBCrG','a');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `user` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 27 Jun 2019 06:46:34 +0200
