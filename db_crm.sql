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

/*Table structure for table `tbl_car` */

DROP TABLE IF EXISTS `tbl_car`;

CREATE TABLE `tbl_car` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `category_car` varchar(15) DEFAULT NULL,
  `brand_car` varchar(50) DEFAULT NULL,
  `model_car` varchar(80) DEFAULT NULL,
  `year_car` int(10) DEFAULT NULL,
  `plate_car` varchar(15) DEFAULT NULL,
  `color_car` varchar(30) DEFAULT NULL,
  `color_hex_car` varchar(30) DEFAULT NULL,
  `port_car` varchar(2) DEFAULT NULL,
  `km_car` varchar(80) DEFAULT NULL,
  `value_car` decimal(15,2) DEFAULT NULL,
  `value_promotion` decimal(15,2) DEFAULT NULL,
  `value_transference` decimal(15,2) DEFAULT NULL,
  `note_car` mediumtext DEFAULT NULL,
  `photo_car` mediumtext DEFAULT NULL,
  `name_car` varchar(90) DEFAULT NULL,
  `name_slug_car` varchar(90) DEFAULT NULL,
  `code_car` varchar(30) DEFAULT NULL,
  `code_brand_fipe_car` varchar(20) DEFAULT NULL,
  `code_model_fipe_car` varchar(20) DEFAULT NULL,
  `code_year_fipe_car` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_car` */

insert  into `tbl_car`(`id_car`,`category_car`,`brand_car`,`model_car`,`year_car`,`plate_car`,`color_car`,`color_hex_car`,`port_car`,`km_car`,`value_car`,`value_promotion`,`value_transference`,`note_car`,`photo_car`,`name_car`,`name_slug_car`,`code_car`,`code_brand_fipe_car`,`code_model_fipe_car`,`code_year_fipe_car`) values (1,'carros','ASTON MARTIN','DB9 Coupe 6.0 V12 510cv',2016,'RKY-1192','Vermelho','#ff0000','2','0','1336579.00','1336579.00','1336579.00','Top de linha sem reclamação, e zero bala;','[\"img\\/upload-img-cars\\/622910ab91f71-09-03-22_17-03-11.png\",\"img\\/upload-img-cars\\/622910ab92274-09-03-22_17-03-11.png\",\"img\\/upload-img-cars\\/622910ab924b9-09-03-22_17-03-11.png\"]','ASTON MARTIN DB9 Coupe 6.0 V12 510cv','aston-martin-db9-coupe-6-0-v12-510cv','X3VJJpFQlu','189','6906','2016-1');

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

/*Table structure for table `tbl_img_test` */

DROP TABLE IF EXISTS `tbl_img_test`;

CREATE TABLE `tbl_img_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` tinytext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_img_test` */

/*Table structure for table `tbl_picture` */

DROP TABLE IF EXISTS `tbl_picture`;

CREATE TABLE `tbl_picture` (
  `id_picture` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `name_picture` varchar(50) DEFAULT NULL,
  `date_picture` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_picture` */

insert  into `tbl_picture`(`id_picture`,`fk_user`,`name_picture`,`date_picture`) values (21,2,'Administração','2021-09-17 08:43:47'),(40,2,'Meu novo quadro','2022-02-15 14:04:25'),(41,2,'Quadro admin','2022-02-15 17:46:51'),(44,1,'Meu novo quadro','2022-02-16 09:09:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_status` */

insert  into `tbl_status`(`id_status`,`fk_picture`,`fk_user`,`name_status`,`color_status`,`date_status`) values (1,3,1,'Novo titulo','purple','2021-08-31 15:11:51'),(14,3,1,'a','primary','2021-09-01 09:43:01'),(15,3,1,'meu deus','cyan','2021-09-01 10:11:07'),(16,3,1,'oloko','red','2021-09-01 10:13:00'),(21,21,2,'Status 1','primary','2021-09-17 08:45:36'),(24,21,2,'Status 2','pink','2021-09-17 09:51:55'),(26,21,2,'Status 4','yellow','2021-09-17 09:52:34'),(27,21,2,'Status 5 ','green','2021-09-17 09:52:42'),(28,27,1,'Status 1','primary','2021-09-17 12:01:18'),(29,27,1,'Status 2','orange','2021-09-17 12:01:23'),(30,27,1,'Status 3','cyan','2021-09-17 12:01:29'),(37,44,1,'Etapa - 1','primary','2022-02-16 09:10:12'),(38,44,1,'Etapa - 2','purple','2022-02-16 09:10:18'),(41,44,1,'Etapa - 3','orange','2022-02-16 09:10:40'),(42,44,1,'Etapa - 4','yellow','2022-02-16 09:10:52'),(43,44,1,'Etapa - 5','green','2022-02-16 09:10:57');

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_task` */

insert  into `tbl_task`(`id_task`,`fk_status`,`fk_picture`,`fk_user`,`name_task`,`account_task`,`date_task`,`order_task`,`fk_user_received`) values (37,29,27,1,'Tarefa Nova','Fazer tal coisa.','2022-01-10 10:28:18',1,1),(38,30,27,1,'tarefa 3','testando','2022-02-09 10:08:48',0,1),(39,29,27,1,'teste 4','Editado o texto aaaaa','2022-02-09 10:09:03',0,2),(41,30,27,1,'tarefa 4','dsadsadsa','2022-02-09 14:08:06',1,1),(42,26,21,2,'ata','teste','2022-02-15 16:19:05',0,2),(60,37,44,1,'tarefa 2','dasdsadas','2022-02-18 11:10:56',1,1),(61,37,44,1,'Nova tarefa','teste','2022-02-18 11:10:59',0,1);

/*Table structure for table `tbl_task_history` */

DROP TABLE IF EXISTS `tbl_task_history`;

CREATE TABLE `tbl_task_history` (
  `id_task` int(11) DEFAULT NULL,
  `fk_status` int(11) DEFAULT NULL,
  `fk_picture` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `name_task` varchar(50) DEFAULT NULL,
  `account_task` mediumtext DEFAULT NULL,
  `date_task` timestamp NULL DEFAULT current_timestamp(),
  `order_task` int(11) DEFAULT NULL,
  `fk_user_received` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_task_history` */

insert  into `tbl_task_history`(`id_task`,`fk_status`,`fk_picture`,`fk_user`,`name_task`,`account_task`,`date_task`,`order_task`,`fk_user_received`) values (45,37,44,1,'tarefa 2','teste','2022-02-18 09:56:33',NULL,1),(46,37,44,1,'tarefa 2','sdsad','2022-02-18 09:58:24',NULL,1),(47,37,44,1,'tarefa 1','sdsadsa','2022-02-18 09:59:04',NULL,1),(43,37,44,1,'tarefa 1','Telefonar para','2022-02-16 09:12:00',0,1),(48,37,44,1,'tarefa 1','adasdsa','2022-02-18 10:04:58',NULL,1),(51,37,44,1,'New tarefa','asdasdsadsa','2022-02-18 10:17:34',NULL,1),(50,37,44,1,'tarefa 2dssa','asdasdsa','2022-02-18 10:17:32',NULL,1),(52,37,44,1,'tarefa 1','asdasdas','2022-02-18 10:20:15',NULL,1),(53,37,44,1,'dsadsa','adsdsadsad','2022-02-18 10:20:18',NULL,1),(54,37,44,1,'adsad','asdssadsa','2022-02-18 10:20:21',NULL,1),(49,37,44,1,'tarefa 2','asdsadsa','2022-02-18 10:17:27',NULL,1),(56,37,44,1,'tarefa 2','asdsadsa','2022-02-18 10:22:00',NULL,1),(55,37,44,1,'tarefa 2','asdsadas','2022-02-18 10:21:57',NULL,1),(57,37,44,1,'Nova tarefa','dasdsadsadsad','2022-02-18 10:22:02',NULL,1),(58,37,44,1,'tarefa 2','dasdsadassdasd','2022-02-18 10:22:06',NULL,1),(59,37,44,1,'tarefa 2','dasdasda','2022-02-18 11:10:53',NULL,1);

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
  `code_user` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`name_user`,`email_user`,`password_user`,`accept_user`,`birth_date_user`,`date_register_user`,`code_user`) values (1,'Pedroso','pedrinho_foda@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','true','2000-02-20','2021-08-30 15:19:01','SE7XTkKuvt'),(2,'Tonhão','toinho@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','true','2000-02-20','2021-08-31 10:00:23','YAvMy5TYIt');

/*Table structure for table `tbl_user_workers` */

DROP TABLE IF EXISTS `tbl_user_workers`;

CREATE TABLE `tbl_user_workers` (
  `id_user_workers` int(11) NOT NULL AUTO_INCREMENT,
  `cod_rand_workers` varchar(50) DEFAULT NULL,
  `name_workers` varchar(30) DEFAULT NULL,
  `email_workers` varchar(50) DEFAULT NULL,
  `password_workers` varchar(100) DEFAULT NULL,
  `birth_date_workers` date DEFAULT NULL,
  `date_register_workers` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar_workers` varchar(160) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_picture` int(11) DEFAULT NULL,
  `fk_task` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user_workers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user_workers` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
