-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table sisurat_c030320113.surat_keluar
CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `unit_penerbit` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `nama_pengesah` varchar(100) NOT NULL,
  `nama_tembusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_surat` (`no_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table sisurat_c030320113.surat_masuk
CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `unit_penerbit` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `nama_pengesah` varchar(100) NOT NULL,
  `nama_tembusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_surat` (`no_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table sisurat_c030320113.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
