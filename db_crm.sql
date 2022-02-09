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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_picture` */

insert  into `tbl_picture`(`id_picture`,`fk_user`,`name_picture`,`date_picture`) values (21,2,'Administração','2021-09-17 08:43:47'),(27,1,'Novo Quadro','2021-09-17 12:01:08'),(36,1,'Meu novo quadro','2022-02-09 16:52:14'),(37,1,'Quadro admin','2022-02-09 16:57:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_status` */

insert  into `tbl_status`(`id_status`,`fk_picture`,`fk_user`,`name_status`,`color_status`,`date_status`) values (1,3,1,'Novo titulo','purple','2021-08-31 15:11:51'),(14,3,1,'a','primary','2021-09-01 09:43:01'),(15,3,1,'meu deus','cyan','2021-09-01 10:11:07'),(16,3,1,'oloko','red','2021-09-01 10:13:00'),(21,21,2,'Status 1','primary','2021-09-17 08:45:36'),(24,21,2,'Status 2','pink','2021-09-17 09:51:55'),(26,21,2,'Status 4','yellow','2021-09-17 09:52:34'),(27,21,2,'Status 5 ','green','2021-09-17 09:52:42'),(28,27,1,'Status 1','primary','2021-09-17 12:01:18'),(29,27,1,'Status 2','orange','2021-09-17 12:01:23'),(30,27,1,'Status 3','cyan','2021-09-17 12:01:29');

/*Table structure for table `tbl_task` */

DROP TABLE IF EXISTS `tbl_task`;

CREATE TABLE `tbl_task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `fk_status` int(11) DEFAULT NULL,
  `fk_picture` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `name_task` varchar(50) DEFAULT NULL,
  `account_task` mediumtext DEFAULT NULL,
  `date_task` timestamp NULL DEFAULT current_timestamp(),
  `order_task` int(11) DEFAULT NULL,
  `fk_user_received` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_task` */

insert  into `tbl_task`(`id_task`,`fk_status`,`fk_picture`,`fk_user`,`name_task`,`account_task`,`date_task`,`order_task`,`fk_user_received`) values (37,30,27,1,'Tarefa Nova','Fazer tal coisa.','2022-01-10 10:28:18',0,1),(38,28,27,1,'tarefa 3','testando','2022-02-09 10:08:48',1,1),(39,29,27,1,'teste 4','Editado o texto aaaaa','2022-02-09 10:09:03',0,2),(41,28,27,1,'tarefa 4','dsadsadsa','2022-02-09 14:08:06',0,1);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(50) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `accept_user` varchar(10) NOT NULL,
  `birth_date_user` date DEFAULT NULL,
  `date_register_user` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`name_user`,`email_user`,`password_user`,`accept_user`,`birth_date_user`,`date_register_user`) values (1,'Pedroso','pedrinho_foda@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','true','2000-02-20','2021-08-30 15:19:01'),(2,'Tonhão','toinho@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','true','2000-02-20','2021-08-31 10:00:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
