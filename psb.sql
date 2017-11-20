# Host: localhost  (Version 5.6.21)
# Date: 2017-11-20 20:19:00
# Generator: MySQL-Front 5.3  (Build 5.39)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "detail_pembayaran"
#

DROP TABLE IF EXISTS `detail_pembayaran`;
CREATE TABLE `detail_pembayaran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cicilan_ke` int(11) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detail_pembayaran"
#


#
# Structure for table "guru"
#

DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "guru"
#

INSERT INTO `guru` VALUES (2,'14111113','Achi','Tangerang','+6285946057839');

#
# Structure for table "pembayaran_spp"
#

DROP TABLE IF EXISTS `pembayaran_spp`;
CREATE TABLE `pembayaran_spp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pembayaran_spp` date DEFAULT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "pembayaran_spp"
#

INSERT INTO `pembayaran_spp` VALUES (1,'2017-11-19',1,'1'),(2,'2017-11-19',1,'1'),(3,'2017-11-19',1,'1');

#
# Structure for table "pendaftaran"
#

DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE `pendaftaran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `di_jakarta_ikut` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `pendidikan_terakhir_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `agama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_terakhir_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `agama_ibu` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `upload_akte` varchar(255) DEFAULT NULL,
  `upload_kartu_keluarga` varchar(255) DEFAULT NULL,
  `foto_anak` varchar(255) DEFAULT NULL,
  `foto_keluarga` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "pendaftaran"
#

INSERT INTO `pendaftaran` VALUES (1,'Anggit Prayogo','Anggit ','Tangerang','2009-01-01','L',3,4,'Orang Tua','Ali','Tangerang','1980-01-01','SMA','Karyawan Swastas','Islam','Ani','Tangerang','1980-01-01','SMA','Ibu Rumah Tangga','Islam','098128128182','07-11-46Mobile Student.pdf','07-11-46Mobile Student.pdf','07-11-5553.jpg','07-11-5553.jpg');

#
# Structure for table "akun"
#

DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `role_user` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "akun"
#

INSERT INTO `akun` VALUES (2,'admin@gmail.com','$2y$10$AIxith3klXwMIMT/t3CpHOasClDF8l1JWV66U1zob78mXT4wksaJq','Riyan','0',NULL),(12,'anggitprayogo@gmail.com','$2y$10$.6WMwaKG37nmJ.ZCkZIFiOLH.0pv7DnIaQhsFkacDHhiHkHVEyxvC','','1',1);

#
# Structure for table "detail_pendaftaran"
#

DROP TABLE IF EXISTS `detail_pendaftaran`;
CREATE TABLE `detail_pendaftaran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `metode_pembayaran_pendaftaran` varchar(255) DEFAULT NULL COMMENT 'metode_pembayaran',
  `kelas` varchar(255) DEFAULT NULL,
  `status_pendaftaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_user` (`id_user`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `detail_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pendaftaran_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "detail_pendaftaran"
#

INSERT INTO `detail_pendaftaran` VALUES (1,1,2,'2017-11-19','C','B','4');

#
# Structure for table "cicilan_pendaftaran"
#

DROP TABLE IF EXISTS `cicilan_pendaftaran`;
CREATE TABLE `cicilan_pendaftaran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `id_detail_pendaftaran` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `tanggal_pembayaran` varchar(255) DEFAULT NULL,
  `status_cicilan` int(11) NOT NULL,
  `cicilan_ke` int(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_detail_pendaftaran` (`id_detail_pendaftaran`),
  CONSTRAINT `cicilan_pendaftaran_ibfk_1` FOREIGN KEY (`id_detail_pendaftaran`) REFERENCES `detail_pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "cicilan_pendaftaran"
#

INSERT INTO `cicilan_pendaftaran` VALUES (5,'01-11-06icon.png',1,500000,'2017-11-19',1,1),(6,'01-11-01icon.JPG',1,395000,'2017-11-19',1,2);

#
# Structure for table "siswa"
#

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nis` int(1) NOT NULL DEFAULT '0',
  `kelas` varchar(255) DEFAULT NULL,
  `id_pendaftaran` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "siswa"
#

