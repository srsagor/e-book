/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.26 : Database - ebook
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ebook` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ebook`;

/*Table structure for table `e_books` */

DROP TABLE IF EXISTS `e_books`;

CREATE TABLE `e_books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `subjec_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporate_autor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_page` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `e_books` */

insert  into `e_books`(`id`,`title`,`volume`,`subtitle`,`series`,`item_type_id`,`subjec_heading`,`author`,`publisher`,`issn`,`isbn`,`corporate_autor`,`total_page`,`price`,`language`,`pdf`,`cover_image`,`created_at`,`updated_at`) values (27,'Highcharts Demo','12910','bangla book','121',1,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',875,250,'bangla','/books/pdf/Project-Proposal-Quotation_1622430633.pdf','/books/image/citro_1622430633.jpg','2021-05-31 03:10:33','2021-05-31 03:10:33'),(26,'Highcharts Demo','12910','bangla book','121',1,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',875,250,'bangla','/books/pdf/Project-Proposal-Quotation_1622430613.pdf','/books/image/citro_1622430613.jpg','2021-05-31 03:10:13','2021-05-31 03:10:13'),(25,'Highcharts Demo','12910','bangla book','121',1,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',875,250,'bangla','/books/pdf/Project-Proposal-Quotation_1622430561.pdf','/books/image/citro_1622430561.jpg','2021-05-31 03:09:21','2021-05-31 03:09:21'),(24,'this is test news 2','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344384.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344384.png','2021-05-30 03:13:04','2021-05-30 03:13:04'),(23,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344381.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344381.png','2021-05-30 03:13:01','2021-05-30 03:13:01'),(22,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344378.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344378.png','2021-05-30 03:12:58','2021-05-30 03:12:58'),(21,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344365.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344365.png','2021-05-30 03:12:45','2021-05-30 03:12:45'),(20,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344362.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344362.png','2021-05-30 03:12:42','2021-05-30 03:12:42'),(19,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344357.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344357.png','2021-05-30 03:12:37','2021-05-30 03:12:37'),(18,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344354.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344354.png','2021-05-30 03:12:34','2021-05-30 03:12:34'),(17,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344350.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344350.png','2021-05-30 03:12:30','2021-05-30 03:12:30'),(16,'this is test news','12910','bangla book','121',3,'ok good','Sr Sagor','srs','122121','21212`','sr sagor',123,12,'bangla','/books/pdf/Project-Proposal-Quotation_1622344285.pdf','/books/image/1-Pop-up-banner-Zakat-1_1622344285.png','2021-05-30 03:11:25','2021-05-30 03:11:25');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `item_types` */

DROP TABLE IF EXISTS `item_types`;

CREATE TABLE `item_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `item_types` */

insert  into `item_types`(`id`,`type_name`,`created_at`,`updated_at`) values (1,'Save item type change try','2021-05-29 14:42:37','2021-05-29 15:10:30'),(2,'Save','2021-05-29 14:49:56','2021-05-29 14:49:56'),(4,'test item','2021-05-30 15:35:29','2021-05-30 15:35:29'),(5,'test item 2','2021-05-30 15:36:51','2021-05-30 15:37:08');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_05_29_133115_create_item_types_table',2),(5,'2021_05_29_152909_create_e_books_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Test Emp 1','employee1@employee.com',NULL,'$2y$10$xrDMKj.hZjA5EJIKsCqXmuErtHyppNrymWXmYMVvEwT5MPCsmWiuS','rQP97K5Nj14PldZrSsPEZjbTNeab0oMHpef3S1DdQEms0QQZuMXywPaSN3Gi','2021-05-23 05:14:54','2021-05-23 05:15:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
