# Host: localhost  (Version 5.6.21)
# Date: 2017-11-27 15:32:23
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
  `nip` char(7) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "guru"
#

INSERT INTO `guru` VALUES (2,'1170002','Achi','Tangerang','+6285946057839'),(3,'1170003','Test Guru','Alamat Guru','000');

#
# Structure for table "hari"
#

DROP TABLE IF EXISTS `hari`;
CREATE TABLE `hari` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hari` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "hari"
#

INSERT INTO `hari` VALUES (1,'Senin'),(2,'Selasa'),(3,'Rabu'),(4,'Kamis'),(5,'Jumat'),(6,'PR');

#
# Structure for table "mapel"
#

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel` (
  `kode_mapel_kegiatan` char(5) NOT NULL DEFAULT '',
  `nama_mapel_kegiatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode_mapel_kegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "mapel"
#

INSERT INTO `mapel` VALUES ('P0001','Matematika'),('P0002','Upacara'),('P0003','Membaca'),('P0004','Bahasa'),('P0005','Seni'),('P0006','Istirahat'),('P0007','Doa'),('P0008','Pulang'),('P0009','Iqro'),('P0010','Hijaiyah'),('P0011','Angka'),('P0012','Olah Raga'),('P0013','Bhs Inggris'),('P0014','Melukis'),('P0015','Menari'),('P0016','Sholat Dhuha'),('P0017','Evaluasi'),('P0018','Majalah');

#
# Structure for table "jadwal"
#

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_hari` int(11) DEFAULT NULL,
  `id_mapel` varchar(255) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_hari` (`id_hari`),
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`kode_mapel_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

#
# Data for table "jadwal"
#

INSERT INTO `jadwal` VALUES (1,1,'P0002','A'),(2,1,'P0003','A'),(3,1,'P0004','A'),(4,1,'P0005','A'),(5,1,'P0006','A'),(6,1,'P0017','A'),(7,1,'P0008','A'),(8,1,'P0002','B'),(9,1,'P0003','B'),(10,1,'P0004','B'),(11,1,'P0005','B'),(12,1,'P0006','B'),(13,1,'P0017','B'),(14,1,'P0007','B'),(15,2,'P0009','B'),(16,2,'P0005','B'),(17,2,'P0010','B'),(18,2,'P0011','B'),(19,2,'P0006','B'),(20,2,'P0017','B'),(21,2,'P0007','B'),(22,1,'P0008','B'),(23,2,'P0008','B'),(24,3,'P0012','B'),(25,3,'P0013','B'),(26,3,'P0014','B'),(27,3,'P0015','B'),(28,3,'P0006','B'),(29,3,'P0017','B'),(30,3,'P0007','B'),(31,3,'P0008','B'),(32,4,'P0003','B'),(33,4,'P0005','B'),(34,4,'P0011','B'),(35,4,'P0004','B'),(36,4,'P0006','B'),(37,4,'P0017','B'),(38,4,'P0007','B'),(39,4,'P0008','B'),(40,5,'P0009','B'),(41,5,'P0010','B'),(42,5,'P0016','B'),(43,5,'P0006','B'),(44,5,'P0007','B'),(45,5,'P0008','B'),(47,6,'P0004','B'),(48,6,'P0018','B'),(49,6,'P0011','B'),(50,6,'P0018','B'),(51,6,'P0010','B');

#
# Structure for table "pembayaran_spp"
#

DROP TABLE IF EXISTS `pembayaran_spp`;
CREATE TABLE `pembayaran_spp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pembayaran_spp` date DEFAULT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `status_spp` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "pembayaran_spp"
#

INSERT INTO `pembayaran_spp` VALUES (1,'2017-11-25',1,1,'3'),(5,'2017-11-26',1,1,'4'),(6,'2017-11-27',2,0,'3');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "pendaftaran"
#

INSERT INTO `pendaftaran` VALUES (3,'Anggit Prayogo','Anggit','Tangerang','2009-01-01','L',2,2,'Orang tua','Sokhibun Wahid','Tangerang','1980-01-01','SMA','Karyawan Swasta','Islam','Sugiyati','Tangerang','1980-01-01','S1','Ibu Rumah Tangga','Islam','+6287812035533','01-11-10Home.png','01-11-10drawerBackground.jpg','01-11-21JuraganSeminar 2.pdf','01-11-21Home.png'),(4,'Ayah User','User','Tangerang','2014-01-01','L',2,2,'Orang tua','Ayag','Tangerang','1980-01-01','SMA','Karyawan Swasta','Islam','Ibu','Tangerang','1980-01-01','SMA','Ibu Rumah Tangga','Islam','+6287812035533','12-11-26drawerBackground.jpg','12-11-26JuraganSeminar 2.pdf','12-11-34Home.png','12-11-34man.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "akun"
#

INSERT INTO `akun` VALUES (2,'admin@gmail.com','$2y$10$AIxith3klXwMIMT/t3CpHOasClDF8l1JWV66U1zob78mXT4wksaJq','Riyan','0',NULL),(14,'anggitprayogo@gmail.com','$2y$10$eAq9DcArI4NGXe.fdm.HBujEha8Ui3.HqQObO5MlaAlqGKtFMU9PS','','1',3),(15,'user@gmail.com','$2y$10$OaYWI48pkw8MwXcj4yz5AOj9OweYOZrh3/jMeXLjoTWdiR6SWSKdq','','1',4);

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
  `usia` varchar(255) DEFAULT NULL,
  `status_pendaftaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_user` (`id_user`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `detail_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pendaftaran_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "detail_pendaftaran"
#

INSERT INTO `detail_pendaftaran` VALUES (2,3,2,'2017-11-25','L','B','8 tahun 10 bulan','4'),(3,4,2,'2017-11-26','C','A','3 tahun 10 bulan','3');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "cicilan_pendaftaran"
#

INSERT INTO `cicilan_pendaftaran` VALUES (1,'01-11-25Home.png',2,895000,'2017-11-25',1,1),(7,'01-11-58drawerBackground.jpg',3,440000,'2017-11-26',1,1);

#
# Structure for table "siswa"
#

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nis` char(6) NOT NULL DEFAULT '0',
  `kelas` varchar(255) DEFAULT NULL,
  `id_detail_pendaftaran` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "siswa"
#

INSERT INTO `siswa` VALUES ('170001','B',2,'Anggit Prayogo'),('170002','A',3,'Ayah User');
