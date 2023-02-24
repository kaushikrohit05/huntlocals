/*
SQLyog Enterprise - MySQL GUI v5.29
Host - 5.5.5-10.4.21-MariaDB : Database - huntdir
*********************************************************************
Server version : 5.5.5-10.4.21-MariaDB
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `huntdir`;

USE `huntdir`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `tbladsgallery` */

DROP TABLE IF EXISTS `tbladsgallery`;

CREATE TABLE `tbladsgallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adid` int(11) DEFAULT NULL,
  `ad_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_tbladsgallery` (`adid`),
  CONSTRAINT `FK_tbladsgallery` FOREIGN KEY (`adid`) REFERENCES `tbluserads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbladsgallery` */

insert  into `tbladsgallery`(`id`,`adid`,`ad_image`,`created_at`,`updated_at`) values (1,1,'1_DAZZLE-LINEN-COTTON-BLEND-F.jpg','2022-02-20 11:22:25','2022-02-20 11:22:25'),(2,1,'1_EDITION-WOODSMOKE.jpg','2022-02-20 11:22:25','2022-02-20 11:22:25'),(3,1,'1_Nautical-Denim-Linen-Cotton.jpg','2022-02-20 11:22:25','2022-02-20 11:22:25'),(4,1,'1_Pearl-Brick-Linen-Cotton-Bl.jpg','2022-02-20 11:22:25','2022-02-20 11:22:25'),(5,1,'1_Pearl-Denim-Linen-Cotton-Bl.jpg','2022-02-20 11:22:25','2022-02-20 11:22:25'),(6,1,'1_RHYTHM-WHEATISH.jpg','2022-02-20 11:22:26','2022-02-20 11:22:26'),(7,1,'1_SUNCREST-JUTE-WHEATISH.jpg','2022-02-20 11:22:26','2022-02-20 11:22:26'),(8,1,'1_Vibrant-Provencial-Blue.jpg','2022-02-20 11:22:26','2022-02-20 11:22:26'),(9,2,'2_AXIOM-SILK-IVORY.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(10,2,'2_Bloom-Linen-Cotton-Fog-Gree.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(11,2,'2_Enlace_Mist.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(12,2,'2_Harmony-Charlotte-Blue-100%.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(13,2,'2_Harmony-Ivory-(Multi).jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(14,2,'2_HARMONY-LINEN-BOULDER.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(15,2,'2_Linear---Fog-Green.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(16,2,'2_Portia-Fog-Green-Rayon-Velv.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(17,2,'2_Vibrant_Natural.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36'),(18,2,'2_Vibrant_White.jpg','2022-02-20 11:34:36','2022-02-20 11:34:36');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
