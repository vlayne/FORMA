-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 10:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_forma`
--

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE IF NOT EXISTS `association` (
  `NUM_ICOM` int(8) NOT NULL,
  `NOM_ASSOCIATION` char(20) DEFAULT NULL,
  `NOM_INTERLO` char(20) DEFAULT NULL,
  `PRENOM_INTERLO` char(20) DEFAULT NULL,
  `COURRIEL_INTERLO` varchar(50) DEFAULT NULL,
  `TEL_INTERLO` int(10) DEFAULT NULL,
  `FAX_INTERLO` int(10) DEFAULT NULL,
  PRIMARY KEY (`NUM_ICOM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `association`
--

INSERT INTO `association` (`NUM_ICOM`, `NOM_ASSOCIATION`, `NOM_INTERLO`, `PRENOM_INTERLO`, `COURRIEL_INTERLO`, `TEL_INTERLO`, `FAX_INTERLO`) VALUES
(48754, 'GUIMALDI', 'CHAMOU', 'Beatrice', 'beacha@gmail.com', 611548759, 785445126),
(98495494, 'VIARIS', 'Duchamps', 'Didier', 'Didu32@yahoo.fr', 788497854, 79875487);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `ID_DOMAINE` smallint(1) NOT NULL,
  `NOM_DOMAINE` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID_DOMAINE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`ID_DOMAINE`, `NOM_DOMAINE`) VALUES
(1, 'GESTION'),
(2, 'INFORMATIQUE'),
(3, 'DEV_DURABLE'),
(4, 'SECOURISME'),
(5, 'COMMUNICATION');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `NUM_FORM` smallint(2) NOT NULL,
  `NOM_FORM` varchar(35) DEFAULT NULL,
  `COUT_FORM` decimal(10,2) DEFAULT NULL,
  `NBPLACE_FORM` int(3) DEFAULT NULL,
  `LIEU_FORM` varchar(80) DEFAULT NULL,
  `INTERVENANT_FORM` varchar(50) DEFAULT NULL,
  `PUBLIC_FORM` varchar(300) DEFAULT NULL,
  `OBJECTIF_FORM` varchar(300) DEFAULT NULL,
  `CONTENU_FORM` varchar(256) DEFAULT NULL,
  `DATELIMITE` date DEFAULT NULL,
  `ID_DOMAINE` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`NUM_FORM`),
  KEY `FK_ID_FORMATION_DOMAINE` (`ID_DOMAINE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`NUM_FORM`, `NOM_FORM`, `COUT_FORM`, `NBPLACE_FORM`, `LIEU_FORM`, `INTERVENANT_FORM`, `PUBLIC_FORM`, `OBJECTIF_FORM`, `CONTENU_FORM`, `DATELIMITE`, `ID_DOMAINE`) VALUES
(1, 'Outlook Niveau 1', '300.00', 25, 'Blagnac , Toulouse', 'Jerome Bae', 'Bertrand Minou', 'Bases de connaissances sur Outlook', '1.Acquisition des contrôles de bases\r\n2. Paramètrage ', '2016-01-25', 2),
(2, 'PowerPoint Niveau 2', '55.00', 300, '13 rue jean moulin 54 510 tomblaine', 'jérome poe', 'bénévoles , et salariés du mouvement sportif', 'Parfaire ses connaissances sur PowerPoint', '1 Amélioration d’une présentation       2 L’affichage\r\n3 Personnalisation des diapositives            4 Les modèles            5 Les animations       \r\n6 Enregistrer une présentation  \r\n7 Ajouter du son \r\n8 PowerPoint et Internet ', '2015-10-31', 2),
(3, 'Photoshop Niveau 1', '110.00', 100, '13 Rue Jean Moulin 54 510 Tomblaine', 'Jérôme Poe RMI informatique', 'Bénévoles, et salariés du mouvement sportif désirant s’ouvrir  aux techniques de traitement informatique de l’image  pratique de la photographie numérique', 'Découvrir le traitement des images numériques couleur ainsi que leur\r\nséparation quadrichromique. Répondre aux besoins des photographes,\r\n\r\nphotograveurs, des créatifs et des inventeurs d’images. Acquérir une\r\nméthode de travail professionnelle', '1 Rappels sur les images numériques\r\n2 Les modes colorimétriques\r\n3 Présentation et personnalisation\r\n\r\n4 Traitement numérique et retouche partielle\r\n\r\n5 Travaux photographiques\r\n7 Principes de base d’impression\r\n8 Mises en pratique et capacités', '2015-11-21', 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE IF NOT EXISTS `inscrire` (
  `ID_UTIL` int(2) NOT NULL,
  `NUM_FORM` smallint(2) NOT NULL,
  `ID_DOMAINE` smallint(1) NOT NULL,
  `ID_SESSION` varchar(10) NOT NULL,
  `Statut` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_UTIL`,`NUM_FORM`,`ID_DOMAINE`,`ID_SESSION`),
  KEY `I_FK_INSCRIRE_SESSION` (`NUM_FORM`,`ID_DOMAINE`,`ID_SESSION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `NUM_FORM` smallint(2) NOT NULL,
  `ID_DOMAINE` smallint(1) NOT NULL,
  `ID_SESSION` varchar(10) NOT NULL,
  `JOUR_SESSION` date DEFAULT NULL,
  `HEUREDEBUT_SESSION` time DEFAULT NULL,
  `HEUREFIN_SESSION` time DEFAULT NULL,
  `NbPlaceRestant` int(3) NOT NULL,
  PRIMARY KEY (`NUM_FORM`,`ID_DOMAINE`,`ID_SESSION`),
  KEY `I_FK_SESSION_DOMAINE` (`ID_DOMAINE`),
  KEY `I_FK_SESSION_FORMATION` (`NUM_FORM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`NUM_FORM`, `ID_DOMAINE`, `ID_SESSION`, `JOUR_SESSION`, `HEUREDEBUT_SESSION`, `HEUREFIN_SESSION`, `NbPlaceRestant`) VALUES
(1, 2, '1', '2015-10-22', '00:00:00', '17:00:00', 25),
(2, 2, '2', '2015-11-18', '09:00:00', '12:00:00', 300),
(2, 2, '3', '2015-11-18', '13:30:00', '17:00:00', 300),
(3, 2, '4', '2015-12-04', '09:00:00', '17:00:00', 100),
(3, 2, '5', '2015-12-11', '09:00:00', '17:00:00', 100);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE IF NOT EXISTS `stagiaire` (
  `ID_UTIL` int(2) NOT NULL AUTO_INCREMENT,
  `NUM_ICOM` int(8) NOT NULL,
  `LOGIN` char(25) NOT NULL DEFAULT '',
  `PRENOM_UTIL` char(25) DEFAULT NULL,
  `STATUT` varchar(128) DEFAULT NULL,
  `FONCTION` varchar(30) DEFAULT NULL,
  `grade` varchar(1) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `NOM` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_UTIL`),
  KEY `I_FK_STAGIAIRE_ASSOCIATION` (`ID_UTIL`),
  KEY `stagiaire_ibfk_1` (`NUM_ICOM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `stagiaire`
--

INSERT INTO `stagiaire` (`ID_UTIL`, `NUM_ICOM`, `LOGIN`, `PRENOM_UTIL`, `STATUT`, `FONCTION`, `grade`, `mdp`, `email`, `dateNaissance`, `adresse`, `tel`, `NOM`) VALUES
(1, 98495494, 'Pradines', 'Gautier', 'Bénévole', NULL, 'a', '0000', NULL, NULL, NULL, NULL, NULL),
(2, 98495494, 'Nady', 'Youness', 'Salarié', NULL, 'b', '0000', NULL, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_ID_FORMATION_DOMAINE` FOREIGN KEY (`ID_DOMAINE`) REFERENCES `domaine` (`ID_DOMAINE`);

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `inscrire_ibfk_1` FOREIGN KEY (`ID_UTIL`) REFERENCES `stagiaire` (`ID_UTIL`),
  ADD CONSTRAINT `inscrire_ibfk_2` FOREIGN KEY (`NUM_FORM`, `ID_DOMAINE`, `ID_SESSION`) REFERENCES `session` (`NUM_FORM`, `ID_DOMAINE`, `ID_SESSION`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`ID_DOMAINE`) REFERENCES `domaine` (`ID_DOMAINE`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`NUM_FORM`) REFERENCES `formation` (`NUM_FORM`);

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_1` FOREIGN KEY (`NUM_ICOM`) REFERENCES `association` (`NUM_ICOM`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
