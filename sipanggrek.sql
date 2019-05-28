/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.19-MariaDB : Database - sipanggrek
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sipanggrek` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sipanggrek`;

/*Table structure for table `anggota_posyandu` */

DROP TABLE IF EXISTS `anggota_posyandu`;

CREATE TABLE `anggota_posyandu` (
  `nik` varchar(32) NOT NULL,
  `nama_anggota` varchar(32) NOT NULL,
  `peran` varchar(32) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(16) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `nama_ayah` varchar(32) DEFAULT NULL,
  `nama_ibu` varchar(32) DEFAULT NULL,
  `nama_suami` varchar(32) DEFAULT NULL,
  `pekerjaan` varchar(32) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `no_hp_orangtua` varchar(16) DEFAULT NULL,
  `tgl_pendaftaran` date NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `anggota_posyandu_idfk_1` (`peran`),
  CONSTRAINT `anggota_posyandu_idfk_1` FOREIGN KEY (`peran`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggota_posyandu` */

insert  into `anggota_posyandu`(`nik`,`nama_anggota`,`peran`,`tempat_lahir`,`tgl_lahir`,`gender`,`alamat`,`nama_ayah`,`nama_ibu`,`nama_suami`,`pekerjaan`,`no_hp`,`no_hp_orangtua`,`tgl_pendaftaran`) values 
('1102026308950001','Irmawati','sipanggota01','Lumban Matio','1995-08-23','Perempuan','Lumban Matio','','','Anto Pardosi','','','','2019-05-15'),
('1206094809850001','Yanti Nababan','sipanggota01','Gotting','1985-09-08','Perempuan','Gotting','','','Jekson Situmorang','','','','2019-05-14'),
('1212043103170001','Pangeran Pardosi','sipanggota02','Gotting','2017-03-31','Laki-laki','Gotting','Nurdin Pardosi','','','','','','2019-05-16'),
('1212045402170001','Charissa Hutajulu','sipanggota02','Gotting','2017-02-24','Perempuan','Gotting','Marulitua Hutajulu','','','','','085354232759','2019-05-15'),
('1212046112170001','Felicia Pardosi','sipanggota02','Gotting','2017-12-21','Perempuan','Gotting','Robinhot Pardosi','','','','','','2019-05-15');

/*Table structure for table `berita_posyandu` */

DROP TABLE IF EXISTS `berita_posyandu`;

CREATE TABLE `berita_posyandu` (
  `id_berita` varchar(8) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `tgl_unggah` date NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `berita_posyandu` */

/*Table structure for table `imunisasi_anak` */

DROP TABLE IF EXISTS `imunisasi_anak`;

CREATE TABLE `imunisasi_anak` (
  `id_imunisasi` varchar(16) NOT NULL,
  `nama_penerima` varchar(32) NOT NULL,
  `usia` int(11) NOT NULL,
  `vaksin` varchar(16) NOT NULL,
  `tgl_pemberian` date NOT NULL,
  `petugas` varchar(32) NOT NULL,
  PRIMARY KEY (`id_imunisasi`),
  KEY `imunisasi_anak_idfk_1` (`nama_penerima`),
  KEY `imunisasi_anak_idfk_2` (`vaksin`),
  KEY `imunisasi_anak_idfk_3` (`petugas`),
  CONSTRAINT `imunisasi_anak_idfk_1` FOREIGN KEY (`nama_penerima`) REFERENCES `anggota_posyandu` (`nik`),
  CONSTRAINT `imunisasi_anak_idfk_2` FOREIGN KEY (`vaksin`) REFERENCES `vaksin` (`id_vaksin`),
  CONSTRAINT `imunisasi_anak_idfk_3` FOREIGN KEY (`petugas`) REFERENCES `petugas_posyandu` (`nik_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `imunisasi_anak` */

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1557484298),
('m130524_201442_init',1557484334),
('m190124_110200_add_verification_token_column_to_user_table',1557484335);

/*Table structure for table `perkembangan_kesehatan` */

DROP TABLE IF EXISTS `perkembangan_kesehatan`;

CREATE TABLE `perkembangan_kesehatan` (
  `id_perkembangan` int(11) NOT NULL AUTO_INCREMENT,
  `identitas_anggota` varchar(32) NOT NULL,
  `lingkar_perut` int(11) DEFAULT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `keluhan` varchar(64) DEFAULT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  PRIMARY KEY (`id_perkembangan`),
  KEY `perkembangan_kesehatan_idfk_1` (`identitas_anggota`),
  CONSTRAINT `perkembangan_kesehatan_idfk_1` FOREIGN KEY (`identitas_anggota`) REFERENCES `anggota_posyandu` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `perkembangan_kesehatan` */

insert  into `perkembangan_kesehatan`(`id_perkembangan`,`identitas_anggota`,`lingkar_perut`,`berat_badan`,`tinggi_badan`,`keluhan`,`tgl_pemeriksaan`) values 
(6,'1206094809850001',30,10,75,'Demam naik turun','2019-05-16'),
(7,'1206094809850001',55,65,122,'flu','2019-06-07'),
(8,'1206094809850001',95,74,170,'step','2019-05-28'),
(9,'1102026308950001',95,70,165,'Pusing-pusing','2019-05-25'),
(10,'1102026308950001',102,72,165,'Diare','2019-05-18'),
(11,'1102026308950001',104,74,165,'','2019-05-20'),
(12,'1102026308950001',105,74,166,'','2019-05-22');

/*Table structure for table `petugas_posyandu` */

DROP TABLE IF EXISTS `petugas_posyandu`;

CREATE TABLE `petugas_posyandu` (
  `nik_petugas` varchar(32) NOT NULL,
  `nama_petugas` varchar(32) NOT NULL,
  `peran_petugas` varchar(32) NOT NULL,
  `no_hp_petugas` varchar(16) NOT NULL,
  `tgl_daftar` date NOT NULL,
  PRIMARY KEY (`nik_petugas`),
  KEY `petugas_posyandu_idfk_1` (`peran_petugas`),
  CONSTRAINT `petugas_posyandu_idfk_1` FOREIGN KEY (`peran_petugas`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `petugas_posyandu` */

insert  into `petugas_posyandu`(`nik_petugas`,`nama_petugas`,`peran_petugas`,`no_hp_petugas`,`tgl_daftar`) values 
('1202015106990027','Sartika Aritonang','sippetugas','081296321785','2019-03-21');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id_role` varchar(32) NOT NULL,
  `nama_role` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id_role`,`nama_role`) values 
('sipadmin','Admin SIP Anggrek'),
('sipanggota01','Anggota - Ibu Hamil'),
('sipanggota02','Anggota - Anak'),
('sippetugas','Petugas Posyandu');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT '10',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`role`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`verification_token`) values 
(1,'Irmawati',2,'2x5grgWQ7qVM0DvFMOiiiDb6sDuL-ors','$2y$13$sgEEJY3hm2RZC8JL163yNenJuHGMIEsnvqWa1BSlLWrL2ElmT6YFq',NULL,NULL,10,NULL,NULL,NULL),
(2,'Admin',1,'rfcd3dptPVkf2HCf_Cs2J7ciA-yjct-u','$2y$13$MmZ7SisI2NHbQQkdRB6/OO22DLScxAY0eJZTecepgGPq3S2yWi.da',NULL,NULL,10,NULL,NULL,NULL);

/*Table structure for table `vaksin` */

DROP TABLE IF EXISTS `vaksin`;

CREATE TABLE `vaksin` (
  `id_vaksin` varchar(16) NOT NULL,
  `nama_vaksin` varchar(16) NOT NULL,
  PRIMARY KEY (`id_vaksin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vaksin` */

insert  into `vaksin`(`id_vaksin`,`nama_vaksin`) values 
('VIA001','Hepatitis B (HB)'),
('VIA002','Polio'),
('VIA003','BCG'),
('VIA004','DTP'),
('VIA005','Pneumokokus(PCV)'),
('VIA006','Rotavirus'),
('VIA007','Influenza'),
('VIA008','Campak'),
('VIA009','MMR/MR'),
('VIA010','Varisela'),
('VIA011','HPV'),
('VIA012','JE'),
('VIA013','Dengue');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
