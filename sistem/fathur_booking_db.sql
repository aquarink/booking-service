/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.16-MariaDB : Database - fathur_booking_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fathur_booking_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fathur_booking_db`;

/*Table structure for table `booking_tb` */

DROP TABLE IF EXISTS `booking_tb`;

CREATE TABLE `booking_tb` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tgl_booking` varchar(20) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `masalah` text,
  `no_polisi` varchar(20) DEFAULT NULL,
  `no_rangka` varchar(20) DEFAULT NULL,
  `alamat` text,
  `id_mekanik` int(11) DEFAULT NULL,
  `jam_booking` varchar(20) DEFAULT NULL,
  `status_booking` enum('1','2','3') DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `booking_tb` */

insert  into `booking_tb`(`id_booking`,`nama`,`no_hp`,`tgl_booking`,`id_jenis`,`masalah`,`no_polisi`,`no_rangka`,`alamat`,`id_mekanik`,`jam_booking`,`status_booking`,`create_at`) values (25,'Andri 1','081510193960','01/29/2017',10,'sdsdsd','2323','2323','asas',1,'14','3','2017-01-27 02:47:07'),(26,'Andri 2','081510193960','01/29/2017',3,'asas','2323','2323','asas',1,'16','3','2017-01-27 02:47:45'),(27,'Andri 3','081510193960','01/29/2017',9,'asas','2323','2323','jhfdsj',1,'8','3','2017-01-27 03:03:17');

/*Table structure for table `jenis_kendaraan_tb` */

DROP TABLE IF EXISTS `jenis_kendaraan_tb`;

CREATE TABLE `jenis_kendaraan_tb` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_kendaraan_tb` */

insert  into `jenis_kendaraan_tb`(`id_jenis`,`nama_jenis`) values (1,'Avanza'),(2,'Kijang Innova Bensin'),(3,'Kijang Innova Diesel'),(4,'Fortuner Bensin'),(5,'Fortuner Diesel'),(6,'Agya'),(7,'Calya'),(8,'Vios'),(9,'Yaris'),(10,'Rush'),(11,'Sienta'),(12,'Etios'),(13,'Alphard'),(14,'Camry'),(15,'FT86');

/*Table structure for table `mekanik_tb` */

DROP TABLE IF EXISTS `mekanik_tb`;

CREATE TABLE `mekanik_tb` (
  `id_mekanik` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_mekanik` varchar(100) DEFAULT NULL,
  `status_mekanik` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id_mekanik`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mekanik_tb` */

insert  into `mekanik_tb`(`id_mekanik`,`username`,`password`,`nama_mekanik`,`status_mekanik`) values (1,'fathur1','fathur1','Fathur 1','1'),(2,'fathur2','fathur2','Fathur 2','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
