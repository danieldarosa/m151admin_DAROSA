-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Novembre 2015 à 15:34
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m151_formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE IF NOT EXISTS `choix` (
  `idSport` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL,
  `ordrePref` int(11) NOT NULL,
  PRIMARY KEY (`idSport`,`idEleve`),
  KEY `idSport` (`idSport`),
  KEY `idEleve` (`idEleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `idClasse` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`idClasse`, `label`) VALUES
(1, 'IN-P4A'),
(2, 'IN-P4B');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `idEleve` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `idClasse` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEleve`),
  KEY `idClasse` (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `idSport` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`idSport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sports`
--

INSERT INTO `sports` (`idSport`, `label`) VALUES
(1, 'Football'),
(2, 'Streetball'),
(3, 'Beach Volley'),
(4, 'Frisbee'),
(5, 'Pétanque'),
(6, 'Echecs');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idClasse` (`idClasse`),
  KEY `idClasse_2` (`idClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `pseudo`, `email`, `password`, `dateNaissance`, `description`, `admin`, `idClasse`) VALUES
(8, 'testeuh', 'testeuh', 'testeuh', 'test@tetete.etet', '6005e090c4313d0804280058064a254dec352a22', '1990-01-12', 'testestrtreteterter', 0, 1),
(9, 'DAROSA', 'DAROSA', 'DAROSA', 'DAROSA@DAROSA.DAROSA', '6ad7646a4a35d3819215909cedd6e19387ccf1a6', '2015-10-08', 'yololo', 1, 2),
(10, 'test', 'test', 'test', 'test@test.test', '8338623e2df34c03571ee324b636ac92068cc5bb', '2015-11-02', 'test', 0, 1),
(11, 'DA ROSA', 'Daniel', 'ErzaTheTitania91', 'daniel.darosa97@gmail.com', 'd40dde993c639bb6f07a7b1cc9f88a2cb12f0c45', '2015-11-23', 'Kek', 0, 1),
(12, 'yolo', 'yolo', 'yolo', 'yolo.yolo@yolo.yolo', '08e42f08b7f9fb6e00de1cb6546043b60768450c', '2015-11-02', 'yolo', 0, 2),
(13, 'nyan', 'nyan', 'nyanyanyan', 'nyanyan@cat.com', '92ec96a59bfefcb2dab3dcad97e8fd3ae6ebf7f8', '2015-11-04', 'nyan', 0, 1),
(14, 'je', 'm''appelle', 'Darolol', 'jemappelle.darolol@gmail.com', 'c06d5918f08d4e23334346ed2f96d73182ea8310', '2015-11-09', 'tetreterretrettetertreter', 0, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `choix_ibfk_2` FOREIGN KEY (`idEleve`) REFERENCES `eleves` (`idEleve`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `choix_ibfk_1` FOREIGN KEY (`idSport`) REFERENCES `sports` (`idSport`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `eleves_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classes` (`idClasse`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classes` (`idClasse`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
