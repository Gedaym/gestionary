-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Janvier 2016 à 15:32
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
-- Structure de la table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id_type_adhesion` int(11) NOT NULL,
  `customer_immatriculation` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(50) NOT NULL,
  `offer_description` text,
  `offer_state` varchar(50) NOT NULL,
  `offer_reduction` int(11) NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offer_parking`
--

CREATE TABLE IF NOT EXISTS `offer_parking` (
  `offer_parking_offer_id` int(11) NOT NULL,
  `offer_parking_parking_id` int(11) NOT NULL,
  KEY `FK_offer_parking_offer` (`offer_parking_offer_id`),
  KEY `FK_offer_parking_parking` (`offer_parking_parking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `parking_type`
--

CREATE TABLE IF NOT EXISTS `parking_type` (
  `parking_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `parking_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`parking_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_customer_id` int(11) DEFAULT NULL,
  `reservation_number_reservation` int(11) NOT NULL,
  `reservation_parking_id` int(11) DEFAULT NULL,
  `reservation_date_start` date NOT NULL,
  `reservation_date_end` date NOT NULL,
  `reservation_hour_start` int(11) NOT NULL,
  `reservation_hour_end` int(11) NOT NULL,
  `reservation_price` float NOT NULL,
  `reservation_id_space` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `FK_reservation_parking` (`reservation_parking_id`),
  KEY `FK_reservation_customer` (`reservation_customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `space`
--

CREATE TABLE IF NOT EXISTS `space` (
  `space_id` int(11) NOT NULL AUTO_INCREMENT,
  `space_id_parking` int(11) NOT NULL,
  `space_price` float NOT NULL,
  `space_space_type_id` int(11) DEFAULT NULL,
  `space_space_state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`space_id`),
  KEY `FK_space_space_type` (`space_space_type_id`),
  KEY `FK_space_space_state` (`space_space_state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `space_state`
--

CREATE TABLE IF NOT EXISTS `space_state` (
  `space_state_id` int(11) NOT NULL,
  `space_state_name` varchar(50) NOT NULL,
  PRIMARY KEY (`space_state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `space_type`
--

CREATE TABLE IF NOT EXISTS `space_type` (
  `space_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `space_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`space_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_surname` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_user_status_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_user_user_status` (`user_user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `FK_user_role_user` (`user_id`),
  KEY `FK_user_role_role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `offer_parking`
--
ALTER TABLE `offer_parking`
  ADD CONSTRAINT `FK_offer_parking_offer` FOREIGN KEY (`offer_parking_offer_id`) REFERENCES `offer` (`offer_id`),
  ADD CONSTRAINT `FK_offer_parking_parking` FOREIGN KEY (`offer_parking_parking_id`) REFERENCES `parking` (`parking_id`);

--
-- Contraintes pour la table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `FK_parking_parking_type_id` FOREIGN KEY (`parking_parking_type_id`) REFERENCES `parking_type` (`parking_type_id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_reservation_customer` FOREIGN KEY (`reservation_customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_reservation_parking` FOREIGN KEY (`reservation_parking_id`) REFERENCES `parking` (`parking_id`);

--
-- Contraintes pour la table `space`
--
ALTER TABLE `space`
  ADD CONSTRAINT `FK_space_space_state` FOREIGN KEY (`space_space_state_id`) REFERENCES `space_state` (`space_state_id`),
  ADD CONSTRAINT `FK_space_space_type` FOREIGN KEY (`space_space_type_id`) REFERENCES `space_type` (`space_type_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_user_status` FOREIGN KEY (`user_user_status_id`) REFERENCES `user_status` (`user_status_id`);

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_user_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `FK_user_role_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
