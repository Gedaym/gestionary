-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.12-log - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de table parking_connecte. customer
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id_type_adhesion` int(11) NOT NULL,
  `customer_immatriculation` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.customer : ~0 rows (environ)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. offer
CREATE TABLE IF NOT EXISTS `offer` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(50) NOT NULL,
  `offer_description` text,
  `offer_state` varchar(50) NOT NULL,
  `offer_reduction` int(11) NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.offer : ~0 rows (environ)
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. offer_parking
CREATE TABLE IF NOT EXISTS `offer_parking` (
  `offer_parking_offer_id` int(11) NOT NULL,
  `offer_parking_parking_id` int(11) NOT NULL,
  KEY `FK_offer_parking_offer` (`offer_parking_offer_id`),
  KEY `FK_offer_parking_parking` (`offer_parking_parking_id`),
  CONSTRAINT `FK_offer_parking_offer` FOREIGN KEY (`offer_parking_offer_id`) REFERENCES `offer` (`offer_id`),
  CONSTRAINT `FK_offer_parking_parking` FOREIGN KEY (`offer_parking_parking_id`) REFERENCES `parking` (`parking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.offer_parking : ~0 rows (environ)
/*!40000 ALTER TABLE `offer_parking` DISABLE KEYS */;
/*!40000 ALTER TABLE `offer_parking` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. parking
CREATE TABLE IF NOT EXISTS `parking` (
  `parking_id` int(11) NOT NULL AUTO_INCREMENT,
  `parking_name` varchar(50) NOT NULL DEFAULT '0',
  `parking_number_street` int(11) NOT NULL DEFAULT '0',
  `parking_street` varchar(50) NOT NULL DEFAULT '0',
  `parking_city` varchar(50) NOT NULL DEFAULT '0',
  `parking_postal_code` int(11) NOT NULL DEFAULT '0',
  `parking_parking_type_id` int(11) NOT NULL DEFAULT '0',
  `parking_description` text,
  PRIMARY KEY (`parking_id`),
  KEY `FK_parking_parking_type_id` (`parking_parking_type_id`),
  CONSTRAINT `FK_parking_parking_type_id` FOREIGN KEY (`parking_parking_type_id`) REFERENCES `parking_type` (`parking_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.parking : ~0 rows (environ)
/*!40000 ALTER TABLE `parking` DISABLE KEYS */;
/*!40000 ALTER TABLE `parking` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. parking_type
CREATE TABLE IF NOT EXISTS `parking_type` (
  `parking_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `parking_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`parking_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.parking_type : ~0 rows (environ)
/*!40000 ALTER TABLE `parking_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `parking_type` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_customer_id` int(11) NOT NULL,
  `reservation_number_reservation` int(11) NOT NULL,
  `reservation_parking_id` int(11) NOT NULL,
  `reservation_date_start` date NOT NULL,
  `reservation_date_end` date NOT NULL,
  `reservation_hour_start` int(11) NOT NULL,
  `reservation_hour_end` int(11) NOT NULL,
  `reservation_price` float NOT NULL,
  `reservation_id_space` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `FK_reservation_parking` (`reservation_parking_id`),
  KEY `FK_reservation_customer` (`reservation_customer_id`),
  CONSTRAINT `FK_reservation_customer` FOREIGN KEY (`reservation_customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `FK_reservation_parking` FOREIGN KEY (`reservation_parking_id`) REFERENCES `parking` (`parking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.reservation : ~0 rows (environ)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.role : ~0 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. space
CREATE TABLE IF NOT EXISTS `space` (
  `space_id` int(11) NOT NULL AUTO_INCREMENT,
  `space_id_parking` int(11) NOT NULL,
  `space_price` float NOT NULL,
  `space_space_type_id` int(11) NOT NULL,
  `space_space_state_id` int(11) NOT NULL,
  PRIMARY KEY (`space_id`),
  KEY `FK_space_space_type` (`space_space_type_id`),
  KEY `FK_space_space_state` (`space_space_state_id`),
  CONSTRAINT `FK_space_space_state` FOREIGN KEY (`space_space_state_id`) REFERENCES `space_state` (`space_state_id`),
  CONSTRAINT `FK_space_space_type` FOREIGN KEY (`space_space_type_id`) REFERENCES `space_type` (`space_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.space : ~0 rows (environ)
/*!40000 ALTER TABLE `space` DISABLE KEYS */;
/*!40000 ALTER TABLE `space` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. space_state
CREATE TABLE IF NOT EXISTS `space_state` (
  `space_state_id` int(11) NOT NULL,
  `space_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`space_state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.space_state : ~0 rows (environ)
/*!40000 ALTER TABLE `space_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `space_state` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. space_type
CREATE TABLE IF NOT EXISTS `space_type` (
  `space_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `space_name` varchar(30) NOT NULL,
  PRIMARY KEY (`space_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.space_type : ~0 rows (environ)
/*!40000 ALTER TABLE `space_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `space_type` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_surname` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_user_status_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_user_user_status` (`user_user_status_id`),
  CONSTRAINT `FK_user_user_status` FOREIGN KEY (`user_user_status_id`) REFERENCES `user_status` (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.user : ~0 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `FK_user_role_user` (`user_id`),
  KEY `FK_user_role_role` (`role_id`),
  CONSTRAINT `FK_user_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  CONSTRAINT `FK_user_role_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.user_role : ~0 rows (environ)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;


-- Export de la structure de table parking_connecte. user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table parking_connecte.user_status : ~0 rows (environ)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
