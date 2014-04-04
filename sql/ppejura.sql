-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 04 Avril 2014 à 09:57
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ppejura`
--
CREATE DATABASE IF NOT EXISTS `ppejura` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ppejura`;

-- --------------------------------------------------------

--
-- Structure de la table `ppe_article`
--

CREATE TABLE IF NOT EXISTS `ppe_article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_article` text NOT NULL,
  `auteur_article` varchar(30) NOT NULL,
  `date_article` date NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ppe_article`
--

INSERT INTO `ppe_article` (`id_article`, `contenu_article`, `auteur_article`, `date_article`) VALUES
(1, '<p>Modification de la page d''accueil </p>', 'hbdeveloppeur', '2013-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `ppe_dispo`
--

CREATE TABLE IF NOT EXISTS `ppe_dispo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `dispo_debut` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ppe_dispo`
--

INSERT INTO `ppe_dispo` (`id`, `id_client`, `dispo_debut`) VALUES
(2, 12, '2013-01-05'),
(1, 1, '2013-11-16');

-- --------------------------------------------------------

--
-- Structure de la table `ppe_logement`
--

CREATE TABLE IF NOT EXISTS `ppe_logement` (
  `id_logement` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `nbre_logement` int(11) NOT NULL,
  PRIMARY KEY (`id_logement`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ppe_logement`
--

INSERT INTO `ppe_logement` (`id_logement`, `categorie`, `description`, `nbre_logement`) VALUES
(1, '1', 'Logements', 40),
(2, '2', 'Chambres de 3 lits.', 8),
(3, '3', 'Chambres de 4 lits.', 0),
(4, '4', 'Logement avec option pour personnes à faible mobilité.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ppe_reservation`
--

CREATE TABLE IF NOT EXISTS `ppe_reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `forfait` varchar(255) NOT NULL,
  `menage` varchar(10) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `date_reservation` date NOT NULL,
  `date` date NOT NULL,
  `categorie_logement` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `ppe_reservation`
--

INSERT INTO `ppe_reservation` (`id_reservation`, `forfait`, `menage`, `id_utilisateur`, `nom_utilisateur`, `email_client`, `date_reservation`, `date`, `categorie_logement`, `valide`) VALUES
(27, 'Pension complÃ¨te', 'Avec', 21, '', 'test@gmail.com', '2014-01-04', '2014-01-01', 2, 1),
(28, 'Demi-pension', 'Avec', 1, '', '', '2014-01-04', '2014-01-02', 3, 0),
(29, 'Pension complÃ¨te', 'Avec', 1, 'Belbouab Hocine', 'hbdeveloppeur@gmail.com', '2014-01-04', '2014-03-31', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ppe_utilisateur`
--

CREATE TABLE IF NOT EXISTS `ppe_utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `pouvoir` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nb_reservation` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `ppe_utilisateur`
--

INSERT INTO `ppe_utilisateur` (`id_utilisateur`, `login`, `mdp`, `date_inscription`, `pouvoir`, `email`, `nom`, `nb_reservation`) VALUES
(1, 'hbdeveloppeur', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220 ', '2013-11-09', 1, 'hbdeveloppeur@gmail.com', 'Belbouab Hocine', 2),
(21, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2014-01-01', 1, 'test@gmail.com', 'Test test', 0),
(22, 'aud04', '00f36866326da3b8dde0d960226dcd6afb5af127', '2014-04-04', 1, 'aud.stephan@gmail.com', 'Stephan Audrey', 0),
(23, 'beri62', '271a77093bf07cdb81c0e82ce12c41dfa0a4d6ab', '2014-04-04', 1, 'berivan.kilavuz62@gmail.com', 'Kilavuz Berivan', 0),
(24, 'Kendrick02', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2014-04-04', 0, 'Kendrickl@gtmail.com', 'Kendrick Lamar', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ppe_vacances_scolaires`
--

CREATE TABLE IF NOT EXISTS `ppe_vacances_scolaires` (
  `id_vacances` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(30) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_vacances`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ppe_vacances_scolaires`
--

INSERT INTO `ppe_vacances_scolaires` (`id_vacances`, `designation`, `date_debut`, `date_fin`) VALUES
(1, 'Vacances de la Toussaint', '2013-10-19', '2013-11-04'),
(2, 'Vacances de Noël', '2013-12-21', '2014-01-06'),
(3, 'grande vacances scolaires', '2013-07-05', '2013-09-05'),
(4, 'Vacances d''hiver', '2013-02-15', '2013-03-03'),
(5, 'Vacances de printemps', '2013-04-12', '2013-04-28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
