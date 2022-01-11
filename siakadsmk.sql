/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.28-MariaDB : Database - siakadsmk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`siakadsmk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `siakadsmk`;

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `kelamin` varchar(12) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `status_aktif` varchar(3) DEFAULT NULL,
  `ussername` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`id_guru`,`nip`,`nama_guru`,`kelamin`,`alamat`,`no_telp`,`status_aktif`,`ussername`,`password`,`foto`) values 
(1,'NIP001','Purnama','Perempuan','Bali','087762153880','Yes','purnama@gmail.com','202cb962ac59075b964b07152d234b70','flat-faces-icons-circle-3.png'),
(2,'NIP002','Al','Laki-Laki','Yogyakarta','0978675674','Yes','al@gmail.com','202cb962ac59075b964b07152d234b70','flat-faces-icons-circle-3.png'),
(3,'NP003','Fella','Perempuan','Jakarta','087876755645','Yes','fella@gmail.com','202cb962ac59075b964b07152d234b70','guru.png'),
(4,'NIP004','Made Yuli Perastika','Perempuan','Yogyakarta','08755589966','Yes','yuli@gmail.com','202cb962ac59075b964b07152d234b70','guru.png'),
(5,'NIP005','Yuni Karunia','Perempuan','Wonogiri','08976554444','Yes','karunia@gmail.com','202cb962ac59075b964b07152d234b70','teacher-icon.png');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`) values 
(1,'Akutansi dan Keuangan Lembaga'),
(2,'Multimedia'),
(3,'Teknik dan Bisnis Sepeda Motor');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama_kelas`) values 
(1,'X A'),
(2,'X B'),
(3,'XI A'),
(4,'XI B'),
(5,'XII A'),
(6,'XII B');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajar` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `kehadiran` float DEFAULT NULL,
  `uts` float DEFAULT NULL,
  `uas` float DEFAULT NULL,
  `nilai_akhir` float DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_pengajar` (`id_pengajar`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_ajar`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

insert  into `nilai`(`id_nilai`,`id_pengajar`,`id_siswa`,`kehadiran`,`uts`,`uas`,`nilai_akhir`,`keterangan`) values 
(6,1,9,93,90,89,0,'Sangat Kurang'),
(7,5,1,8,8,0,90,'Baik'),
(8,5,8,8,9,0,0,''),
(10,8,8,90,0,0,0,NULL),
(11,3,9,75,85,100,98,'Baik'),
(13,3,8,78,95,50,NULL,NULL),
(15,1,13,0,90,70,0,'Sangat Kurang'),
(16,1,14,0,90,0,20,'Kurang'),
(17,1,15,0,80,0,70,'Cukup'),
(18,1,16,0,80,0,78,'Cukup'),
(19,1,17,0,80,0,80,'Baik'),
(20,1,18,0,90,0,90,'Baik'),
(21,1,19,0,98,0,60,'Cukup'),
(22,1,20,0,88,0,65,'Cukup'),
(23,1,21,0,78,0,0,'Sangat Kurang'),
(24,1,22,0,87,0,90,'Baik'),
(25,1,23,0,85,0,70,'Cukup'),
(26,1,24,0,90,0,60,'Cukup'),
(27,1,25,0,94,0,90,'Baik'),
(28,1,26,0,93,0,90,'Baik'),
(29,1,27,0,91,0,80,'Baik'),
(30,1,28,0,99,0,70,'Cukup'),
(31,1,29,0,78,0,90,'Baik'),
(32,1,30,0,75,0,90,'Baik'),
(33,1,31,0,80,0,80,'Baik'),
(34,1,32,0,87,0,88,'Baik'),
(35,1,33,0,85,0,90,'Baik'),
(36,1,34,0,83,0,78,'Cukup'),
(37,1,35,0,98,0,98,'Baik'),
(38,1,36,0,99,0,90,'Baik'),
(39,1,37,0,100,0,0,'Sangat Kurang'),
(40,7,9,90,0,0,0,NULL),
(41,7,13,NULL,NULL,NULL,NULL,NULL),
(42,7,14,NULL,NULL,NULL,NULL,NULL),
(43,7,15,NULL,NULL,NULL,NULL,NULL),
(44,7,16,NULL,NULL,NULL,NULL,NULL),
(45,7,17,NULL,NULL,NULL,NULL,NULL),
(46,7,18,NULL,NULL,NULL,NULL,NULL),
(47,7,19,NULL,NULL,NULL,NULL,NULL),
(48,7,20,NULL,NULL,NULL,NULL,NULL),
(49,7,21,NULL,NULL,NULL,NULL,NULL),
(50,7,22,NULL,NULL,NULL,NULL,NULL),
(51,7,23,NULL,NULL,NULL,NULL,NULL),
(52,7,24,NULL,NULL,NULL,NULL,NULL),
(53,7,25,NULL,NULL,NULL,NULL,NULL),
(54,7,26,NULL,NULL,NULL,NULL,NULL),
(55,7,27,NULL,NULL,NULL,NULL,NULL),
(56,7,28,NULL,NULL,NULL,NULL,NULL),
(57,7,29,NULL,NULL,NULL,NULL,NULL),
(58,7,30,NULL,NULL,NULL,NULL,NULL),
(59,7,31,NULL,NULL,NULL,NULL,NULL),
(60,7,32,NULL,NULL,NULL,NULL,NULL),
(61,7,33,NULL,NULL,NULL,NULL,NULL),
(62,7,34,NULL,NULL,NULL,NULL,NULL),
(63,7,35,NULL,NULL,NULL,NULL,NULL),
(64,7,36,NULL,NULL,NULL,NULL,NULL),
(65,7,37,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `orangtua` */

DROP TABLE IF EXISTS `orangtua`;

CREATE TABLE `orangtua` (
  `id_ortu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  PRIMARY KEY (`id_ortu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `orangtua` */

insert  into `orangtua`(`id_ortu`,`nama_ortu`,`alamat`,`pekerjaan`,`no_telp`) values 
(1,'Krisna','Yogyakarta','Guru','087762153882'),
(2,'Swarnaya','Yogyakarta','Buruh','0786776755'),
(3,'Pratama','Wonogiri','Dosen','08765544467'),
(4,'Astini','Wonogiri','Buruh','07555577777'),
(5,'Darmika','Wonogiri','Pedagang','08765556777');

/*Table structure for table `pelajaran` */

DROP TABLE IF EXISTS `pelajaran`;

CREATE TABLE `pelajaran` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_semester` int(11) DEFAULT NULL,
  `nama_mapel` varchar(50) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `id_semester` (`id_semester`),
  CONSTRAINT `pelajaran_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pelajaran` */

insert  into `pelajaran`(`id_mapel`,`id_semester`,`nama_mapel`,`ket`) values 
(1,1,'Matematika','-'),
(2,1,'Bahasa Indonesia','-'),
(3,2,'Bahasa Inggris','-'),
(4,1,'Pendidikan Agama dan Budi Pekerti','-'),
(5,1,'Pendidikan Pancasila dan Kewarganegaraan','-'),
(6,1,'Bahasa Inggris','-');

/*Table structure for table `pengajar` */

DROP TABLE IF EXISTS `pengajar`;

CREATE TABLE `pengajar` (
  `id_ajar` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id_ajar`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_guru` (`id_guru`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `pengajar_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `pelajaran` (`id_mapel`),
  CONSTRAINT `pengajar_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  CONSTRAINT `pengajar_ibfk_4` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `pengajar` */

insert  into `pengajar`(`id_ajar`,`id_guru`,`id_jurusan`,`id_kelas`,`id_mapel`) values 
(1,1,1,1,1),
(3,2,2,1,3),
(5,1,2,1,1),
(7,3,1,1,2),
(8,3,2,1,2),
(9,1,1,2,1);

/*Table structure for table `semester` */

DROP TABLE IF EXISTS `semester`;

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `semester` */

insert  into `semester`(`id_semester`,`tahun_ajaran`,`semester`) values 
(1,'2018/2019',1),
(2,'2018/2019',2);

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_ortu` int(11) DEFAULT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `ussername` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_ortu` (`id_ortu`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_ortu`) REFERENCES `orangtua` (`id_ortu`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`id_jurusan`,`id_kelas`,`id_ortu`,`nis`,`nama_siswa`,`jenis_kelamin`,`agama`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`no_telp`,`foto`,`ussername`,`password`) values 
(1,2,2,1,'NIS001','Sari','Perempuan','Hindu','Bali','2018-12-12','Yogyakarta','087762153882','icon-guru-png-6.png','sari@gmail.com','202cb962ac59075b964b07152d234b70'),
(8,2,1,2,'NIS002','Nanda','Perempuan','Islam','Wonogiri','2019-01-09','Wonogiri','0886666888','icon-guru-png-6.png','nanda@gmail.com','202cb962ac59075b964b07152d234b70'),
(9,1,1,3,'NIS003','Fitri','Perempuan','Islam','Wonogiri','2000-01-09','Wonogiri','08765544467','guru.png','wahyu@gmail.com','202cb962ac59075b964b07152d234b70'),
(12,3,1,5,'NIS004','Ana Alia Ulfa','Perempuan','Islam','Yogyakarta','2019-01-22','Yogyakarta','0876544333','icon-guru-png-6.png','ana@gmail.com','202cb962ac59075b964b07152d234b70'),
(13,1,1,1,'10895','Anggita Nur Fritria','Perempuan','Islam','Wonogiri','2019-01-29','','','icon-guru-png-6.png','fitri@gmail.com','202cb962ac59075b964b07152d234b70'),
(14,1,1,1,'10896','Annisa Nurul Firdausy','Perempuan','Islam','Wonogiri','2019-01-29','','','icon-guru-png-6.png','nurul@gmail.com','202cb962ac59075b964b07152d234b70'),
(15,1,1,1,'10897','Brelyan Pamungkas','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','brelyan@gmail.com','202cb962ac59075b964b07152d234b70'),
(16,1,1,1,'10898','Della Noviana R','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','della@gmail.com','202cb962ac59075b964b07152d234b70'),
(17,1,1,1,'10899','Devi Annisa Nur','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','devi@gmail.com','202cb962ac59075b964b07152d234b70'),
(18,1,1,1,'10901','Dhea Devi Astuti','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','dhea@gmail.com','202cb962ac59075b964b07152d234b70'),
(19,1,1,1,'10902','Dini Nur Fatimah','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','dini@gmail.com','202cb962ac59075b964b07152d234b70'),
(20,1,1,1,'10903','Dwi Puspita Galuh P','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','dwi@gmail.com','202cb962ac59075b964b07152d234b70'),
(21,1,1,1,'10904','Eka Aprilia','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','ekaaprilia@gmail.com','202cb962ac59075b964b07152d234b70'),
(22,1,1,1,'10905','Febri Ageng Pangestu','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','febriageng@gmail.com','202cb962ac59075b964b07152d234b70'),
(23,1,1,1,'10900','Devi Azizah Permata','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','azizah@gmail.com','202cb962ac59075b964b07152d234b70'),
(24,1,1,1,'10906','Frisca Ananda Putri','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','frisca@gmail.com','202cb962ac59075b964b07152d234b70'),
(25,1,1,2,'10907','Putri Rahmawati','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','putri@gmail.com','202cb962ac59075b964b07152d234b70'),
(26,1,1,2,'10908','Rahmah Aprillia','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','rahmah@gmail.com','202cb962ac59075b964b07152d234b70'),
(27,1,1,3,'10909','Romadhoni Novita sari','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','romadhoni@gmail.com','202cb962ac59075b964b07152d234b70'),
(28,1,1,3,'10910','Ruqiyyah Indi Saputri','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','ruqiyyah@gmail.com','202cb962ac59075b964b07152d234b70'),
(29,1,1,3,'10911','Sekar Ayu Seviana','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','sekar@gmail.com','202cb962ac59075b964b07152d234b70'),
(30,1,1,4,'10912','Selfi Milani','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','selfi@gmail.com','202cb962ac59075b964b07152d234b70'),
(31,1,1,4,'10913','Selvana Dewa Arum','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','selvana@gmail.com','202cb962ac59075b964b07152d234b70'),
(32,1,1,4,'10914','Septi Novi Handayani','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','septi@gmail.com','202cb962ac59075b964b07152d234b70'),
(33,1,1,4,'10915','Sinta Sofiyana','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','sinta@gmail.com','202cb962ac59075b964b07152d234b70'),
(34,1,1,4,'10916','Siska Saputri','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','siska@gmail.com','202cb962ac59075b964b07152d234b70'),
(35,1,1,5,'10917','Siska Setyo Ningrum','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','siskasetyo@gmail.com','202cb962ac59075b964b07152d234b70'),
(36,1,1,5,'10918','Tabina Asriliananda','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','tabina@gmail.com','202cb962ac59075b964b07152d234b70'),
(37,1,1,2,'10919','Wahyuni Ambarwati','Perempuan','Islam','Wonogiri','0000-00-00','','','icon-guru-png-6.png','wahyuni@gmail.com','202cb962ac59075b964b07152d234b70'),
(42,NULL,NULL,NULL,'','','','','','0000-00-00','','','','','');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `ussername` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`kode_user`,`nama_user`,`ussername`,`password`,`foto`) values 
(1,'putu','putu@gmail.com','202cb962ac59075b964b07152d234b70','avatar-2.png'),
(2,'Eka','eka@gmail.com','202cb962ac59075b964b07152d234b70','avatar-3.png'),
(3,'admin','admin@gmail.com','202cb962ac59075b964b07152d234b70','avatar-3.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
