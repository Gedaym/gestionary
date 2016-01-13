-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Janvier 2016 à 15:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony_parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

CREATE TABLE IF NOT EXISTS `parking` (
  `parking_id` int(11) NOT NULL AUTO_INCREMENT,
  `parking_name` varchar(50) NOT NULL DEFAULT '0',
  `parking_number_street` int(11) NOT NULL DEFAULT '0',
  `parking_street` varchar(50) NOT NULL DEFAULT '0',
  `parking_city` varchar(50) NOT NULL DEFAULT '0',
  `parking_postal_code` int(11) NOT NULL DEFAULT '0',
  `parking_parking_type_id` int(11) DEFAULT NULL,
  `parking_description` text,
  PRIMARY KEY (`parking_id`),
  KEY `FK_parking_parking_type_id` (`parking_parking_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `FK_parking_parking_type_id` FOREIGN KEY (`parking_parking_type_id`) REFERENCES `parking_type` (`parking_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
