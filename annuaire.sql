-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 déc. 2018 à 13:42
-- Version du serveur :  8.0.13
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `annuaire`
--
CREATE DATABASE IF NOT EXISTS `annuaire` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `annuaire`;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_nom` varchar(40) NOT NULL,
  `contact_prenom` varchar(40) NOT NULL,
  `contact_tel` int(10) NOT NULL,
  `contact_email` varchar(60) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_nom`, `contact_prenom`, `contact_tel`, `contact_email`) VALUES
(1, 'Dutot', 'Geoffroy le dev', 785931283, 'dutotgeof@gmail.com'),
(2, 'Libouton', 'Nathan', 623853160, 'libouton.nathan@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur_id`, `email`, `password`) VALUES
(1, 'test2@fleme.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(2, 'test@fleme.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
