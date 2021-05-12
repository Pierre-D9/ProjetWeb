-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 mai 2021 à 07:15
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

CREATE DATABASE projetweb;

USE projetweb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `idChapitre` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `contennue` datetime NOT NULL,
  `idCours` int(10) NOT NULL,
  PRIMARY KEY (`idChapitre`),
  KEY `fk_Chapitre_Cours` (`idCours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int(10) NOT NULL AUTO_INCREMENT,
  `nomCours` varchar(255) NOT NULL,
  `dateC` datetime NOT NULL,
  `typeCours` int(10) NOT NULL,
  `diapo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `nbrVue` int(20) NOT NULL,
  `auteur` varchar(12) NOT NULL,
  PRIMARY KEY (`idCours`),
  KEY `fk_Cours_TypeCours` (`typeCours`),
  KEY `fk_Cours_Utilisateur` (`auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `idForum` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `questionPose` varchar(500) NOT NULL,
  `dateF` date NOT NULL,
  `nbrVue` int(20) DEFAULT NULL,
  `createur` varchar(12) NOT NULL,
  `idTypeCours` int(10) NOT NULL,
  PRIMARY KEY (`idForum`),
  KEY `fk_Forum_Utilisateur` (`createur`),
  KEY `fk_Forum_TypeCours` (`idTypeCours`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`idForum`, `nom`, `questionPose`, `dateF`, `nbrVue`, `createur`, `idTypeCours`) VALUES
(1, 'nom', 'une question', '2021-04-17', 5, 'Cheick-SekoB', 13),
(3, 'Impossible d\'insérer un forum la il y a des reponses', 'Bonjour, je n\'arrive pas à insérer un forum. Pouvez vous m\'aider?', '2021-04-17', 16, 'Cheick-SekoB', 3),
(4, 'Impossible d\'insérer un forum', 'Bonjour, je n\'arrive pas à insérer un forum. Pouvez vous m\'aider?', '2021-04-17', 0, 'Cheick-SekoB', 3),
(5, 'Impossible d\'insérer un forum', 'Bonjour, je n\'arrive pas à insérer un forum. Pouvez vous m\'aider?', '2021-04-17', 0, 'Cheick-SekoB', 3),
(6, 'Impossible d\'insérer un forum', 'Bonjour, je n\'arrive pas à insérer un forum. Pouvez vous m\'aider?', '2021-04-17', 0, 'Cheick-SekoB', 3),
(7, 'Impossible d\'insérer un forum', 'Bonjour, je n\'arrive pas à insérer un forum. Pouvez vous m\'aider?', '2021-04-17', 0, 'Cheick-SekoB', 3),
(8, 'Impossible d\'insérer un forum', 'Bonjour, je n\'arrive pas à insérer un forum. Pouvez vous m\'aider?', '2021-04-18', 0, 'Cheick-SekoB', 3),
(9, 'yfggfdf', 'gdfgd', '2021-04-17', 0, 'Cheick-SekoB', 6),
(10, 'Je crois que ça fonctionne', 'Testons pour vois i ça fonctionne', '2021-04-20', 0, 'Cheick-SekoB', 4),
(11, 'test autoload', 'fsdfrefgf gfgd', '2021-04-20', 0, 'Cheick-SekoB', 10),
(12, 'fsdfd', 'fdssfdfs', '2021-04-20', 2, 'Cheick-SekoB', 2),
(13, 'La partie forum est finie !! ', 'Ouiiiiiiiiiiiiiiiiiiiiiiiiiii', '2021-04-23', 0, 'Cheick-SekoB', 13),
(14, 'test pour le nombre de vue', 'Est-ce que ça marche ?', '2021-04-23', 0, 'Cheick-SekoB', 11),
(15, 'Test de la redirection', 'Est-ce que ça fonctionne?', '2021-04-23', 1, 'Cheick-SekoB', 7),
(16, 'un forum', 'j\'ai une question', '2021-04-28', 1, 'Cheick-SekoB', 7),
(17, 'Je n\'arrive pas à créer un cube', 'Aidez moi s\'il vous plait', '2021-05-12', 2, 'Cheick-SekoB', 10);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `idReponse` int(10) NOT NULL AUTO_INCREMENT,
  `dateR` datetime NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `pseudoUtil` varchar(12) NOT NULL,
  `idForum` int(10) NOT NULL,
  PRIMARY KEY (`idReponse`),
  KEY `fk_Reponse_Utilisateur` (`pseudoUtil`),
  KEY `fk_Reponse_Forum` (`idForum`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `dateR`, `reponse`, `pseudoUtil`, `idForum`) VALUES
(1, '2021-04-22 14:00:54', 'Voici une réponse', 'DiawoyeM', 3),
(2, '2021-04-22 14:30:54', 'Voici une autre réponse', 'FarahB', 3),
(3, '2021-04-22 19:08:57', 'Merci de vos réponses', 'Cheick-SekoB', 3),
(4, '2021-04-22 19:09:01', 'Avec plaisir', 'FarahB', 3),
(5, '2021-04-22 19:09:01', 'Ceci est un test qui devrait marcher =)', 'FarahB', 3),
(6, '2021-04-22 19:41:01', 'Bien sur que ça marche =)', 'FarahB', 3),
(7, '2021-04-22 19:41:01', 'test encore', 'FarahB', 3),
(8, '2021-04-23 08:00:39', 'Test de l\'heure', 'FarahB', 3),
(9, '2021-04-23 08:02:34', 'Autre réponse', 'FarahB', 3),
(10, '2021-04-23 10:05:19', 'la réponse', 'FarahB', 3),
(11, '2021-04-23 10:09:13', 'Dernier Essai', 'FarahB', 3),
(12, '2021-04-23 11:00:59', 'Coucou\n', 'FarahB', 3),
(13, '2021-04-23 11:01:19', 'recoucou', 'FarahB', 3),
(14, '2021-04-23 20:56:09', 'Mon message\n', 'FarahB', 15),
(15, '2021-04-28 14:24:56', 'J\'ai une autre question', 'FarahB', 16),
(16, '2021-04-28 14:25:22', 'message', 'FarahB', 3),
(17, '2021-05-08 00:48:40', 'test\n', 'FarahB', 12),
(18, '2021-05-11 16:35:22', 'T\'es nul la', 'FarahB', 3),
(19, '2021-05-11 23:14:28', 'Test', 'Cheick-SekoB', 3),
(20, '2021-05-11 23:21:31', 'Mon message', 'NicolasM', 3),
(21, '2021-05-12 04:37:34', 'Une réponse', 'Cheick-SekoB', 3),
(22, '2021-05-12 08:17:20', 'Je n\'arrive toujours pas', 'clement', 17),
(23, '2021-05-12 08:18:00', 'Il faut shift A', 'NicolasM', 17);

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `idStatistique` int(10) NOT NULL AUTO_INCREMENT,
  `pseudoUtil` varchar(12) NOT NULL,
  `typeCours` int(10) NOT NULL,
  `pourcentage` int(2) DEFAULT NULL,
  PRIMARY KEY (`idStatistique`,`pseudoUtil`,`typeCours`),
  KEY `fk_Statistique_Utilisateur` (`pseudoUtil`),
  KEY `fk_Statistique_TypeCours` (`typeCours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typecours`
--

DROP TABLE IF EXISTS `typecours`;
CREATE TABLE IF NOT EXISTS `typecours` (
  `idType` int(10) NOT NULL AUTO_INCREMENT,
  `typeC` varchar(255) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecours`
--

INSERT INTO `typecours` (`idType`, `typeC`) VALUES
(1, 'Base de données'),
(2, 'CDAA'),
(3, 'Math'),
(4, 'Modélisation'),
(5, 'Synthèse d\'image'),
(6, 'Système et réseaux'),
(7, 'Anglais'),
(8, 'Environnement pro'),
(9, 'Graphe'),
(10, 'Image pour le web'),
(11, 'LFC'),
(12, 'PLF'),
(13, 'Techno web');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `typeUtil` int(1) DEFAULT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `password`, `nom`, `prenom`, `mail`, `typeUtil`) VALUES
('Cheick-SekoB', 'Cheick-SekoB', 'BAKAYOKO', 'Cheick-seko', 'Cheick-Seko_Bakayoko@etu.u-bourgogne.fr', 0),
('clement', 'clement', 'HADJ', 'Clément', 'clement.hadj@outlook.fr', 0),
('ClementH', 'ClementH', 'HADJ', 'Clément', 'Clement_Hadj@etu.u-bourgogne.fr', 1),
('clementui', 'clementui', 'HADJ', 'Clément', 'clement.hadj@outlook.fr', 0),
('DiawoyeM', 'DiawoyeM', 'MAGASSA', 'Diawoye', 'Diawoye_Magassa@etu.u-bourgogne.fr', 0),
('FarahB', 'FarahB', 'BARADI', 'Farah', 'Farah_Baradi@etu.u-bourgogne.fr', 0),
('LilyaA', 'LilyaA', 'ABROUK', 'Lilya', 'lylia.abrouk@etu.u-bourgogne.fr', 1),
('NicolasM', 'NicolasM', 'MARTEAU', 'Nicolas', 'Nicolas_Marteau@etu.u-bourgogne.fr', 0),
('PierreD', 'PierreD', 'DE ALMEIDA', 'Pierre', 'Pierre_De-Almeida@etu.u-bourgogne.fr', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `fk_Chapitre_Cours` FOREIGN KEY (`idCours`) REFERENCES `cours` (`idCours`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_Cours_TypeCours` FOREIGN KEY (`typeCours`) REFERENCES `typecours` (`idType`),
  ADD CONSTRAINT `fk_Cours_Utilisateur` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`pseudo`);

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_Forum_TypeCours` FOREIGN KEY (`idTypeCours`) REFERENCES `typecours` (`idType`),
  ADD CONSTRAINT `fk_Forum_Utilisateur` FOREIGN KEY (`createur`) REFERENCES `utilisateur` (`pseudo`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_Reponse_Forum` FOREIGN KEY (`idForum`) REFERENCES `forum` (`idForum`),
  ADD CONSTRAINT `fk_Reponse_Utilisateur` FOREIGN KEY (`pseudoUtil`) REFERENCES `utilisateur` (`pseudo`);

--
-- Contraintes pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD CONSTRAINT `fk_Statistique_TypeCours` FOREIGN KEY (`typeCours`) REFERENCES `typecours` (`idType`),
  ADD CONSTRAINT `fk_Statistique_Utilisateur` FOREIGN KEY (`pseudoUtil`) REFERENCES `utilisateur` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
