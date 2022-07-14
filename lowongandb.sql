/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.20-MariaDB : Database - lowongandb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lowongandb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `lowongandb`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alalamt` varchar(128) DEFAULT NULL,
  `notelp` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`nama`,`alalamt`,`notelp`) values 
(1,'admin','$2y$10$cEhaajPFEqZF460ftSc9VOpuPQq6UIh6UeWgh879GFMwRvJx8LEse','Fatharoni','GKB','6289612123838');

/*Table structure for table `lowongan` */

DROP TABLE IF EXISTS `lowongan`;

CREATE TABLE `lowongan` (
  `id` int(128) NOT NULL,
  `id_admin` int(128) DEFAULT NULL,
  `nama_posisi` varchar(256) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lowongan` */

insert  into `lowongan`(`id`,`id_admin`,`nama_posisi`,`keterangan`) values 
(1001,NULL,'HRD','Memiliki standar sebagai seorang HR seperti kompetensi dalam bidang HR Planning, Recruitment & Selection, bidang Performance Management System, bidang Compensation & Benefit, bidang Training & Development.'),
(1002,NULL,'Admin Enterprise','Bertanggung jawab dengan hal kegiatan service kantor, penyediaan sarana serta service administrasi perkantoran, sesuai sama ketetapan yang berlaku untuk mendukung kelancaran operasional perusahaan.'),
(1003,NULL,'Staff IT Governance','Membangun Tata Kelola IT perusahaan skala menengah dengan standart operasi departemen TI yang efektif, terkontrol dengan mengoptimalkan TI sedemikian rupa sehingga mendukung perusahaan untuk mencapai tujuannya.'),
(1004,NULL,'Security IT','Merancang dan menerapkan strategi terbaik untuk melindungi jaringan.'),
(1005,NULL,'Web Developer','Membangun sebuah website yang responsif dan dinamis.'),
(1006,NULL,'Mobile Programmer','Membangun aplikasi android dengan teknologi terbaru dan terupdate.');

/*Table structure for table `lowongan_detail` */

DROP TABLE IF EXISTS `lowongan_detail`;

CREATE TABLE `lowongan_detail` (
  `id_detail` int(128) NOT NULL AUTO_INCREMENT,
  `id_lowongan` int(128) DEFAULT NULL,
  `tempat` varchar(64) DEFAULT NULL,
  `gambar` varchar(256) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('tersedia','tidak tersedia') DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_lowongan` (`id_lowongan`),
  CONSTRAINT `lowongan_detail_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lowongan_detail` */

insert  into `lowongan_detail`(`id_detail`,`id_lowongan`,`tempat`,`gambar`,`deskripsi`,`status`) values 
(15,1001,'Surabaya','default.jpg','<p>HUMAN RESOURCES DEVELOPMENT</p>\r\n\r\n<p>Penempatan : Surabaya, Jawa Timur</p>\r\n\r\n<p>Tugas &amp; Tanggung Jawab:</p>\r\n\r\n<ul>\r\n	<li>Memastikan semua kebijakan, ketentuan &amp; peraturan yang berlaku di perusahaan dijalankan dengan baik oleh karyawan</li>\r\n	<li>Mengelola dan mengembangkan program kepegawaian, evaluasi kinerja/ jabatan, kompensasi &amp; benefit, promosi, training dan program pengembangan lainnya</li>\r\n	<li>Melakukan proses rekrutmen, employee relation, industrial relation</li>\r\n	<li>Mengelola data BPJS Kesehatan &amp; Ketenagakerjaan karyawan</li>\r\n	<li>Memonitor dan memastikan ijin operasional yang diperlukan perusahaan sudah lengkap</li>\r\n	<li>Membantu General Manager dalam hal kesekretariatan</li>\r\n</ul>\r\n\r\n<p>Kualifikasi:</p>\r\n\r\n<ul>\r\n	<li>Pendidikan minimal S1 diutamakan dari Psikologi, Manajemen atau Hukum</li>\r\n	<li>Pengalaman 5 tahun untuk posisi yang sama di industri Hotel</li>\r\n	<li>Memahami UU Ketenagakerjaan &amp; BPJS</li>\r\n	<li>Memiliki kemampuan leadership, analisa dan negosiasi yang baik</li>\r\n	<li>Tegas, inisiatif &amp; kreatif</li>\r\n	<li>Domisili di Jawa Timur lebih disukai</li>\r\n</ul>\r\n','tersedia'),
(16,1002,'Surabaya','default.jpg','<p><strong>Keterangan Umum:</strong></p>\r\n\r\n<p>Bersedia untuk ditempatkan Kerja di Kota Surabaya, Jawa Timur</p>\r\n\r\n<p><strong>Kualifikasi Pekerjaan:</strong></p>\r\n\r\n<ul>\r\n	<li>Usia maksimal 27 tahun</li>\r\n	<li>Jujur, tekun dan teliti</li>\r\n	<li>Lulusan minimal D3 jurusan Akuntansi (IPK min 3,3)</li>\r\n	<li>Terbuka untuk fresh graduate</li>\r\n	<li>Memahami dasar-dasar akuntansi&nbsp;</li>\r\n	<li>Menguasai aplikasi&nbsp;Microsoft Office</li>\r\n	<li>Bersedia di swab test antigen oleh perusahaan selama pandemic</li>\r\n	<li><strong>Bersedia bekerja Senin s/d Sabtu (jam kerja 10:00 &ndash; 18:00)</strong></li>\r\n</ul>\r\n\r\n<p><strong>Deskripsi Pekerjaan:</strong></p>\r\n\r\n<ul>\r\n	<li>Menangani pembukuan secara umum</li>\r\n	<li>Menangani biaya operasional</li>\r\n	<li>Menerima dan membuat pembukuan hasil penjualan tunai dan hasil tagihan</li>\r\n	<li>Membuat laporan biaya/laporan pembukuan</li>\r\n	<li>Menerbitkan faktur penjualan</li>\r\n	<li>Entry data penjualan ke system</li>\r\n	<li>Melakukan pemeriksaan kebenaran aturan / dokumen penjualan</li>\r\n	<li>Melakukan pengarsipan dokumen (copy faktur, nota, dll)</li>\r\n	<li>Menerima order via telepon. Fax, email, pesan singkat</li>\r\n	<li>Membuat laporan penjualan harian, mingguan, dan bulanan</li>\r\n	<li>Menerbitkan laporan kinerja penjualan (pencapaian penjualan, sales call, hasil penagihan, dll)</li>\r\n</ul>\r\n','tersedia'),
(17,1005,'Surabaya','default.jpg','<p>anu</p>\r\n','tidak tersedia'),
(18,1006,'Surabaya','default.jpg','<p>trs</p>\r\n','tidak tersedia');

/*Table structure for table `pendaftar` */

DROP TABLE IF EXISTS `pendaftar`;

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(128) NOT NULL AUTO_INCREMENT,
  `id_user_detail` int(128) DEFAULT NULL,
  `id_lowongan_detail` int(128) DEFAULT NULL,
  `status_pelamar` enum('sedang proses','diterima','ditolak') DEFAULT NULL,
  PRIMARY KEY (`id_pendaftar`),
  KEY `id_user_detail` (`id_user_detail`),
  KEY `id_lowongan_detail` (`id_lowongan_detail`),
  CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`id_user_detail`) REFERENCES `user_detail` (`id_user_detail`),
  CONSTRAINT `pendaftar_ibfk_2` FOREIGN KEY (`id_lowongan_detail`) REFERENCES `lowongan_detail` (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pendaftar` */

insert  into `pendaftar`(`id_pendaftar`,`id_user_detail`,`id_lowongan_detail`,`status_pelamar`) values 
(1,8,15,'diterima'),
(11,9,15,'ditolak');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `notelp` varchar(128) DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pendidikan` varchar(128) DEFAULT NULL,
  `jenis_kelamin` varchar(128) DEFAULT NULL,
  `agama` varchar(32) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`alamat`,`notelp`,`tempat_lahir`,`tgl_lahir`,`pendidikan`,`jenis_kelamin`,`agama`,`email`,`password`) values 
(1,'Fikky Alvian','JL Mirah V/6 PPS','62895395401081','Gresik','2000-03-30','SMA/SMK/Sederajat','Laki-laki','Islam','falvier@gmail.com','$2y$10$OvQPZK3DFUBG.l9W.5eRSOJAoIYXoJYMC2qTMAmSgATJFk8EXB16O'),
(2,'Fatharoni','Gresik','6289534231982','Surabaya','1998-11-24','S1/D4','Laki-laki','Islam','fata4351@gmail.com','$2y$10$kXbbDBGvOUO0NVXgrfZOl.Er3u0a9jNsS8e3aDgVF7MT5hm/QKmYm');

/*Table structure for table `user_detail` */

DROP TABLE IF EXISTS `user_detail`;

CREATE TABLE `user_detail` (
  `id_user_detail` int(128) NOT NULL AUTO_INCREMENT,
  `id_user` int(128) DEFAULT NULL,
  `file_cv` varchar(256) DEFAULT NULL,
  `file_skck` varchar(256) DEFAULT NULL,
  `file_lamaran` varbinary(256) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_user_detail`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_detail` */

insert  into `user_detail`(`id_user_detail`,`id_user`,`file_cv`,`file_skck`,`file_lamaran`,`foto`) values 
(8,1,'flow-Page-1 ADMIN.png','flow-Page-2 USER.png','Fatharoni Adillah Rachman_170441100135_Form Kesepakatan KP.pdf','DSC_9813.jpg'),
(9,2,NULL,NULL,NULL,'default.jpg');

/* Trigger structure for table `user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `t_insert_user_detail` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `t_insert_user_detail` AFTER INSERT ON `user` FOR EACH ROW 
BEGIN
INSERT INTO user_detail SET
id_user=new.id,
file_cv=NULL,
file_skck=NULL,
file_lamaran=NULL,
foto = 'default.jpg';
end */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
