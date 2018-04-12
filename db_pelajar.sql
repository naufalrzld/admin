/*
SQLyog Ultimate v10.42 
MySQL - 5.6.24 : Database - db_pelajar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pelajar` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_pelajar`;

/*Table structure for table `t_kelas` */

DROP TABLE IF EXISTS `t_kelas`;

CREATE TABLE `t_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `t_kelas` */

insert  into `t_kelas`(`id_kelas`,`nama_kelas`,`jurusan`) values (1,'B1','RPL'),(2,'TKJ','Teknik Komputer Jaringan'),(3,'E2.1','Rekayasa Perangkat Lunak'),(4,'B3','Multimedia'),(5,'F1','Teknik Otomasi Industri'),(7,'E2.2','Teknik Komputer Jaringan'),(8,'D1','Audio Video'),(9,'E2.3','Multimedia');

/*Table structure for table `t_login` */

DROP TABLE IF EXISTS `t_login`;

CREATE TABLE `t_login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_login` */

insert  into `t_login`(`username`,`password`,`level`) values ('admin','21232f297a57a5a743894a0e4a801fc3',1),('user','ee11cbb19052e40b07aac0ca060c23ee',0);

/*Table structure for table `t_siswa` */

DROP TABLE IF EXISTS `t_siswa`;

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(15) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa`,`nis`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `t_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_siswa` */

insert  into `t_siswa`(`id_siswa`,`nis`,`nama`,`jk`,`alamat`,`notelp`,`agama`,`id_kelas`) values (9,1314115320,'Julian Hendrawan','L','GBI','087722390425','Islam',1),(10,1314115321,'Maulana Ahsan','L','Cigondewah','087722390425','Islam',1),(11,1314115324,'M. Naufal RIzaldi','L','GBI','087722390424','Islam',3),(12,1314115322,'Mega Bangkit P','L','-','089927364827','Islam',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
