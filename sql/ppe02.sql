-- phpMyAdmin SQL Dump
-- version OVH
-- http://www.phpmyadmin.net
--
-- Client: mysql51-96.perso
-- Généré le : Sun 01 Décembre 2013 à 15:56
-- Version du serveur: 5.1.66
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `hbdeveloppeur1`
--

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
(1, '<p style="text-align: center;"><span style="color: #999999; font-size: 14pt;"><strong>Faire une r&eacute;servation</strong></span></p>\r\n<p>Pour faire une r&eacute;servation, veuillez cliquer sur la semaine souhait&eacute;e. Seules les semaines faisant parties des vacances scolaires sont disponibles. Les semaines de r&eacute;servations commencent tout les samedis.</p>\r\n<p>&nbsp;TEST</p>\r\n<p><span style="text-decoration: underline;">L&eacute;gende :</span></p>\r\n<p><span style="background-color: #ffe7d5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> : Semaine remplie</p>\r\n<p><span style="background-color: #dcdcdc;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> : P&eacute;riode disponibles (vacances scolaires)</p>\r\n<p><span style="background-color: #ffffff;">Cases non color&eacute;es</span> : p&eacute;riode indisponible (hors vacances scolaires)</p>', 'hbdeveloppeur', '2013-11-18');

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
  PRIMARY KEY (`id_reservation`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `ppe_reservation`
--

INSERT INTO `ppe_reservation` (`id_reservation`, `forfait`, `menage`, `id_utilisateur`, `nom_utilisateur`, `email_client`, `date_reservation`, `date`, `categorie_logement`) VALUES
(2, '', 'Avec', 1, '', '', '2013-01-05', '2013-11-16', 1),
(3, '', 'Sans', 1, '', '', '2013-08-17', '2013-11-16', 4),
(5, 'Pension complÃ¨te', 'Avec', 1, '', '', '2013-01-05', '2013-11-16', 1),
(6, 'Pension complÃ¨te', 'Avec', 1, '', '', '2013-08-03', '2013-11-16', 1),
(7, 'Pension complÃ¨te', 'Sans', 1, '', '', '2013-01-05', '2013-11-16', 3),
(8, 'Demi-pension', 'Avec', 1, '', '', '2013-03-02', '2013-11-17', 4),
(9, 'Pension complÃ¨te', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 1),
(10, 'Pension complÃ¨te', 'Avec', 1, '', '', '2013-01-05', '2013-11-17', 3),
(11, 'Pension complÃ¨te', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 1),
(12, 'Demi-pension', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(13, 'Demi-pension', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(14, 'Pension complÃ¨te', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(15, 'Demi-pension', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(16, 'Demi-pension', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(17, 'Demi-pension', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(18, 'Pension complÃ¨te', 'Sans', 1, '', '', '2013-01-05', '2013-11-17', 3),
(19, 'Demi-pension', 'Sans', 1, '', '', '2013-07-13', '2013-11-17', 3),
(20, 'Pension complÃ¨te', 'Avec', 1, '', '', '2013-12-21', '2013-11-17', 3),
(21, 'Pension complÃ¨te', 'Avec', 1, '', '', '2013-01-05', '2013-11-18', 1),
(22, 'Demi-pension', 'Avec', 1, '', '', '2013-01-05', '2013-11-18', 4),
(23, 'Pension complÃ¨te', 'Avec', 1, '', '', '2013-03-02', '2013-11-30', 3);

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
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `ppe_utilisateur`
--

INSERT INTO `ppe_utilisateur` (`id_utilisateur`, `login`, `mdp`, `date_inscription`, `pouvoir`, `email`) VALUES
(1, 'hbdeveloppeur', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220 ', '2013-11-09', 1, ''),
(13, 'Dooxe77', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2013-11-18', 0, 'anthony@ruelle.fr'),
(3, 'KraiZ', '4fd9e43d18901218ee29ca281b100cec31cc1a31 ', '2013-11-10', 0, ''),
(4, 'phpPope', '403926033d001b5279df37cbbe5287b7c7c267fa ', '2013-11-15', 0, ''),
(5, 'hbdeveloppeur1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2013-11-16', 0, ''),
(15, 'compton', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2013-11-30', 0, 'marcusdupuis.eco@gmail.com'),
(14, 'toto5', '6a5c0baee27fcce9ff4b45cf913a31cba217059e', '2013-11-18', 0, 'toto@gmail.com'),
(12, 'toto1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2013-11-17', 0, 'firstmockingbird@gmail.com');

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
