/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.10-MariaDB : Database - db_crm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_crm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_crm`;

/*Table structure for table `tbl_history_protect` */

DROP TABLE IF EXISTS `tbl_history_protect`;

CREATE TABLE `tbl_history_protect` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `ip_machine` varchar(60) DEFAULT NULL,
  `browser` varchar(60) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `operating_system` varchar(50) DEFAULT NULL,
  `device` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_history_protect` */

/*Table structure for table `tbl_picture` */

DROP TABLE IF EXISTS `tbl_picture`;

CREATE TABLE `tbl_picture` (
  `id_picture` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `name_picture` varchar(50) DEFAULT NULL,
  `date_picture` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_picture` */

/*Table structure for table `tbl_status` */

DROP TABLE IF EXISTS `tbl_status`;

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `fk_picture` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `name_status` varchar(30) DEFAULT NULL,
  `color_status` varchar(50) DEFAULT NULL,
  `date_status` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_status` */

/*Table structure for table `tbl_task` */

DROP TABLE IF EXISTS `tbl_task`;

CREATE TABLE `tbl_task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `fk_status` int(11) DEFAULT NULL,
  `fk_picture` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `name_task` varchar(50) DEFAULT NULL,
  `account_task` mediumtext DEFAULT NULL,
  `color_task` varchar(50) DEFAULT NULL,
  `date_task` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_task` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(50) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `accept_user` varchar(10) NOT NULL,
  `date_register_user` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
