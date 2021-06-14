-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Ven 01 Février 2013 à 12:35
-- Version du serveur: 5.5.15
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `porte_feuille`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `id_tache` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  PRIMARY KEY (`id_tache`,`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id_tache`, `id_activite`) VALUES
(1, 7),
(1, 57),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(10, 41),
(10, 43),
(10, 45),
(10, 48),
(10, 55),
(11, 5),
(11, 10),
(12, 1),
(12, 5),
(12, 8),
(12, 9),
(12, 10),
(12, 12),
(12, 13),
(12, 16),
(12, 17),
(12, 19),
(12, 21),
(12, 25),
(12, 45),
(12, 54),
(14, 2),
(14, 6),
(14, 9),
(14, 11),
(14, 12),
(14, 14),
(14, 18),
(14, 19),
(14, 20),
(14, 21),
(14, 26),
(14, 27);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int(11) NOT NULL AUTO_INCREMENT,
  `num_act` int(11) NOT NULL,
  `puce_act` varchar(55) NOT NULL,
  `libelle_act` varchar(255) NOT NULL,
  `SISR` tinyint(1) NOT NULL,
  `SLAM` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `num_act`, `puce_act`, `libelle_act`, `SISR`, `SLAM`) VALUES
(1, 1, 'A1.1.1', 'Analyse du cahier des charges d''un service à produire', 1, 1),
(2, 1, 'A1.1.2', 'Étude de l''impact de l''intégration d''un service sur le système informatique', 1, 1),
(3, 1, 'A1.1.3', 'Étude des exigences liées à la qualité attendue d''un service', 1, 1),
(4, 2, 'A1.2.1', 'Élaboration et présentation d''un dossier de choix de solution technique', 1, 1),
(5, 2, 'A1.2.2', 'Rédaction des spécifications techniques de la solution retenue (adaptation d''une solution existante ou réalisation d''une nouvelle solution', 1, 1),
(6, 2, 'A1.2.3', 'Évaluation des risques liés à l''utilisation d''un service', 1, 1),
(7, 2, 'A1.2.4', 'Détermination des tests nécessaires à la validation d''un service', 1, 1),
(8, 2, 'A1.2.5', 'Définition des niveaux d''habilitation associés à un service', 1, 1),
(9, 3, 'A1.3.1', 'Test d''intégration et d''acceptation d''un service', 1, 1),
(10, 3, 'A1.3.2', 'Définition des éléments nécessaires à la continuité d''un service', 1, 1),
(11, 3, 'A1.3.3', 'Accompagnement de la mise en place d''un nouveau service', 1, 1),
(12, 3, 'A1.3.4', 'Déploiement d''un service', 1, 1),
(13, 4, 'A1.4.1', 'Participation à un projet', 1, 1),
(14, 4, 'A1.4.2', 'Évaluation des indicateurs de suivi d''un projet et justification des écarts', 1, 1),
(15, 4, 'A1.4.3', 'Gestion des ressources', 1, 1),
(16, 5, 'A2.1.1', 'Accompagnement des utilisateurs dans la prise en main d''un service', 1, 1),
(17, 5, 'A2.1.2', 'Évaluation et maintien de la qualité d''un service', 1, 1),
(18, 6, 'A2.2.1', 'Suivi et résolution d''incidents', 1, 1),
(19, 6, 'A2.2.2', 'Suivi et réponse à des demandes d''assistance', 1, 1),
(20, 6, 'A2.2.3', 'Réponse à une interruption de service', 1, 1),
(21, 7, 'A2.3.1', 'Identification, qualification et évaluation d''un problème', 1, 1),
(22, 7, 'A2.3.2', 'Proposition d''amélioration d''un service', 1, 1),
(23, 8, 'A3.1.1', 'Proposition d''une solution d''infrastructure', 1, 0),
(24, 8, 'A3.1.2', 'Maquettage et prototypage d''une solution d''infrastructure', 1, 0),
(25, 8, 'A3.1.3', 'Prise en compte du niveau de sécurité nécessaire à une infrastructure ', 1, 0),
(26, 9, 'A3.2.1', 'Installation et configuration d''éléments d''infrastructure ', 1, 1),
(27, 9, 'A3.2.2', 'Remplacement ou mise à jour d''éléments défectueux ou obsolètes', 1, 1),
(28, 9, 'A3.2.3', 'Mise à jour de la documentation technique d''une solution d''infrastructure', 1, 0),
(29, 10, 'A3.3.1', 'Administration sur site ou à distance des éléments d''un réseau, de serveurs, de services et d''équipements terminaux', 1, 0),
(30, 10, 'A3.3.2', 'Planification des sauvegardes et gestion des restaurations', 1, 0),
(31, 10, 'A3.3.3', 'Gestion des identités et des habilitations', 1, 0),
(32, 10, 'A3.3.4', 'Automatisation des tâches d''administration', 1, 0),
(33, 10, 'A3.3.5', 'Gestion des indicateurs et des fichiers d''activité', 1, 0),
(34, 11, 'A4.1.1', 'Proposition d''une solution applicative', 0, 1),
(35, 11, 'A4.1.2', 'Conception ou adaptation de l''interface utilisateur d''une solution applicative', 1, 1),
(36, 11, 'A4.1.3', 'Conception ou adaptation d''une base de données', 1, 1),
(37, 11, 'A4.1.4', 'Définition des caractéristiques d''une solution applicative', 0, 1),
(38, 11, 'A4.1.5', 'Prototypage de composants logiciels', 0, 1),
(39, 11, 'A4.1.6', 'Gestion d''environnements de développement et de test', 0, 1),
(40, 11, 'A4.1.7', 'Développement, utilisation ou adaptation de composants logiciels', 1, 1),
(41, 11, 'A4.1.8', 'Réalisation des tests nécessaires à la validation d''éléments adaptés ou développés ', 1, 1),
(42, 11, 'A4.1.9', 'Rédaction d''une documentation technique ', 1, 1),
(43, 11, 'A4.1.10', ' Rédaction d''une documentation d''utilisation ', 0, 1),
(44, 12, 'A4.2.1', 'Analyse et correction d''un dysfonctionnement, d''un problème de qualité de service ou de sécurité', 0, 1),
(45, 12, 'A4.2.2', 'Adaptation d''une solution applicative aux évolutions de ses composants', 0, 1),
(46, 12, 'A4.2.3', 'Réalisation des tests nécessaires à la mise en production d''éléments mis à jour', 0, 1),
(47, 12, 'A4.2.4', 'Mise à jour d''une documentation technique', 0, 1),
(48, 13, 'A5.1.1', 'Mise en place d''une gestion de configuration', 1, 1),
(49, 13, 'A5.1.2', 'Recueil d''informations sur une configuration et ses éléments', 1, 1),
(50, 13, 'A5.1.3', 'Suivi d''une configuration et de ses éléments', 1, 1),
(51, 13, 'A5.1.4', 'Étude de propositions de contrat de service (client, fournisseur)', 1, 1),
(52, 13, 'A5.1.5', 'Évaluation d''un élément de configuration ou d''une configuration ', 1, 1),
(53, 13, 'A5.1.6', 'Évaluation d''un investissement informatique', 1, 1),
(54, 14, 'A5.2.1', 'Exploitation des référentiels, normes et standards adoptés par le prestataire informatique', 1, 1),
(55, 14, 'A5.2.2', 'Veille technologique', 1, 1),
(56, 14, 'A5.2.3', 'Repérage des compléments de formation ou d''auto-formation utiles à l''acquisition de nouvelles compétences', 1, 1),
(57, 14, 'A5.2.4', 'Étude d˜une technologie, d''un composant, d''un outil ou d''une méthode', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(55) NOT NULL,
  `parcours` enum('SISR','SLAM') NOT NULL,
  `professeur` tinyint(1) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `mdp`, `parcours`, `professeur`) VALUES
(1, 'haag', 'alexandre', '098f6bcd4621d373cade4e832627b4f6', 'SLAM', 0),
(2, 'Lhelguen', 'Hervé', '332ff0270192e8c875f23b19c747360f', 'SLAM', 1),
(3, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'SLAM', 0),
(4, 'test2', 'test2', '098f6bcd4621d373cade4e832627b4f6', 'SISR', 0),
(5, 'Doe', 'John', '098f6bcd4621d373cade4e832627b4f6', 'SISR', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(150) NOT NULL,
  `date_debut` int(30) NOT NULL,
  `date_fin` int(30) NOT NULL,
  `description` text NOT NULL,
  `modalite` varchar(55) NOT NULL,
  `lieu` varchar(55) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  PRIMARY KEY (`id_tache`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `intitule`, `date_debut`, `date_fin`, `description`, `modalite`, `lieu`, `id_etudiant`, `c1`, `c2`, `c3`, `c4`) VALUES
(1, 'test', 1357772400, 1357858800, 'faire test', 'individuelle', 'test', 1, 0, 0, 0, 0),
(2, 'test', 1357772400, 1357772400, 'test', 'individuelle', 'test', 1, 0, 0, 0, 0),
(3, 'test', 1357772400, 1357772400, 'test', 'individuelle', 'test', 1, 0, 0, 0, 0),
(4, 'test', 1357772400, 1357772400, 'test', 'individuelle', 'test', 1, 0, 0, 0, 0),
(5, 'test', 1357772400, 1357772400, 'test', 'individuelle', 'test', 1, 0, 0, 0, 0),
(6, 'gd', 1357772400, 1357772400, '', 'individuelle', 'dgf', 1, 0, 0, 0, 0),
(7, 'fdgs', 1356994800, 1356994800, 'dfgfg', 'individuelle', 'opj', 1, 0, 0, 0, 0),
(8, 'test2', 1388530800, 1388530800, 'J''ai un probleme:\r\nJ''ai un formulaire avec des champs de texte dont un qui peux contenir des phrases avec des apostrophes.Quand j''envoie le formulaire, pour qu''il enregistre dans la base de donnée le contenu des champs, j''ai l''erreur suivante:\r\nyou have an error in your SQL syntax near''blabla''\r\nEn fait j''en deduit aprés qqes test que c''est', 'equipe', 'test2', 1, 0, 0, 0, 0),
(9, 'sdfsd', 1286661600, 1286661600, 'dsf', 'individuelle', 'sdf', 3, 0, 0, 0, 0),
(10, 'dsg', 1371247200, 1372197600, 'sdfdsf', 'equipe', 'sd', 3, 0, 0, 0, 0),
(11, 'projet lafleur', 1357772400, 1357772400, 'faire un site ....', 'individuelle', 'lycée', 1, 0, 0, 0, 0),
(12, 'Test', 1359068400, 1359068400, 'Test portefeuille', 'individuelle', 'Lycée', 3, 0, 0, 0, 0),
(14, 'fsdf', 1160431200, 1160431200, 'dfgdfg', 'individuelle', 'sdgdfgdf', 1, 1, 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
