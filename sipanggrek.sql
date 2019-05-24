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

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nik_anggota` varchar(32) DEFAULT NULL,
  `id_petugas` varchar(32) DEFAULT NULL,
  `peran_pengguna` varchar(32) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `akun_idfk_1` (`nik_anggota`),
  KEY `akun_idfk_2` (`id_petugas`),
  KEY `akun_idfk_3` (`peran_pengguna`),
  CONSTRAINT `akun_idfk_1` FOREIGN KEY (`nik_anggota`) REFERENCES `anggota_posyandu` (`nik`),
  CONSTRAINT `akun_idfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_posyandu` (`nik_petugas`),
  CONSTRAINT `akun_idfk_3` FOREIGN KEY (`peran_pengguna`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

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
('1202092006980005','Sinta Simanjuntak','sipanggota01','Sosor Tolong','0000-00-00','Perempuan','Parsoburan','','','Adiputra Sinaga','PNS','123654789','','0000-00-00'),
('121204310317000','Pangeran Pardosi','sipanggota02','Gotting','0000-00-00','Laki-laki','Gotting','Nurdin Pardosi','','','','','081245612378','0000-00-00'),
('1212045402170001','Charissa Hutajulu','sipanggota02','Gotting','0000-00-00','Perempuan','Gotting','Marulitua Hutajulu','','','','','085354232759','0000-00-00'),
('1217094106980004','Rusminah Siahaan','sipanggota02','Sosor Tolong','0000-00-00','Perempuan','Lumban Simarmata','Ayah Siahaan','Ibu Nadeak','','','','08126571229','0000-00-00');

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

insert  into `berita_posyandu`(`id_berita`,`judul`,`isi_berita`,`tgl_unggah`) values 
('BKP001','Cacar Monyet: Gejala, Penyebab, dan Pengobatan','Cacar monyet adalah penyakit zoonosis virus langka yang terjadi terutama di bagian terpencil Afrika tengah dan barat. Bagaimana gejala penyakit ini?  Dari situs Kemenkes, masa inkubasi atau interval dari infeksi sampai timbulnya gejala cacar monyet biasanya 6-16 hari, tetapi dapat berkisar dari 5-21 hari. Gejala yang timbul berupa demam, sakit kepala hebat, limfadenopati (pembesaran kelenjar getah bening), nyeri punggung, nyeri otot, dan lemas. Masyarakat diimbau untuk waspada.','2019-05-23');

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
  `id_perkembangan` varchar(16) NOT NULL,
  `identitas_anggota` varchar(32) NOT NULL,
  `lingkar_perut` int(11) DEFAULT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `keluhan` varchar(64) DEFAULT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `pemeriksa` varchar(32) NOT NULL,
  PRIMARY KEY (`id_perkembangan`),
  KEY `perkembangan_kesehatan_idfk_1` (`identitas_anggota`),
  KEY `perkembangan_kesehatan_idfk_2` (`pemeriksa`),
  CONSTRAINT `perkembangan_kesehatan_idfk_1` FOREIGN KEY (`identitas_anggota`) REFERENCES `anggota_posyandu` (`nik`),
  CONSTRAINT `perkembangan_kesehatan_idfk_2` FOREIGN KEY (`pemeriksa`) REFERENCES `petugas_posyandu` (`nik_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perkembangan_kesehatan` */

insert  into `perkembangan_kesehatan`(`id_perkembangan`,`identitas_anggota`,`lingkar_perut`,`berat_badan`,`tinggi_badan`,`keluhan`,`tgl_pemeriksaan`,`pemeriksa`) values 
('PK001','1217094106980004',NULL,12,89,'Demam naik turun','0000-00-00','1202015106990001');

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
('1202015106990001','Tessa Maretta','sippetugas','082212345678','0000-00-00');

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
('sipanggota02','Anggota - Orang Tua Anak'),
('sippetugas','Petugas Posyandu');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

/*Table structure for table `vaksin` */

DROP TABLE IF EXISTS `vaksin`;

CREATE TABLE `vaksin` (
  `id_vaksin` varchar(16) NOT NULL,
  `nama_vaksin` varchar(16) NOT NULL,
  PRIMARY KEY (`id_vaksin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vaksin` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
