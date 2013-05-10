# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : cybercrime


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

#
# Structure for the `artikel` table : 
#

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(50) NOT NULL,
  `tgl_posting` date NOT NULL,
  `content` mediumtext NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `login` table : 
#

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for the `artikel` table  (LIMIT 0,500)
#

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `tgl_posting`, `content`, `gambar`) VALUES 
  (1,'test','2013-05-10','aaa','868great-billboard1.jpeg'),
  (2,'aaa','2013-05-10','aaaa','964great-billboard1.jpeg');
COMMIT;

#
# Data for the `login` table  (LIMIT 0,500)
#

INSERT INTO `login` (`username`, `password`) VALUES 
  ('andri','admin');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;