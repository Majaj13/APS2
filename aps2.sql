-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 mars 2023 à 17:36
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aps2`
--

DROP DATABASE IF EXISTS APS2;

CREATE DATABASE IF NOT EXISTS APS2;
USE APS2;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `IDAVIS` smallint(6) NOT NULL AUTO_INCREMENT,
  `TITRE` char(62) NOT NULL,
  `SPE` char(1) DEFAULT '0',
  `PARAG1` varchar(2400) NOT NULL,
  `PARAG2` varchar(2400) NOT NULL,
  `PARAG3` varchar(2400) NOT NULL,
  `BORNEINF` int(11) DEFAULT '0',
  `BORNESUP` int(11) DEFAULT '2000',
  PRIMARY KEY (`IDAVIS`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`IDAVIS`, `TITRE`, `SPE`, `PARAG1`, `PARAG2`, `PARAG3`, `BORNEINF`, `BORNESUP`) VALUES
(1, 'Totally d?v', '1', 'Un.e vrai SLAMiste. \r\nInventez votre petit monde en c#, tout en ?tant, attirer par le Python qui sommeille au fond de votre disque dur. ', 'Vous danseriez tout aussi bien sur un air de Java pour d?velopper votre site web. Vous pourriez passer des nuits ? coder et ne compter pas vos heures pour d?busquer le bug, le moindre indice et le temps glisse sur vous.\r\n En ?quipe, c?est toujours plus agile. ', 'Votre patience est l?gendaire derri?re votre ?cran, difficile de vous en extraire. Bon, quelquefois, votre code est sur un autre domaine que l?informatique : le commerce, la gestion des emplois du temps,? \r\nFace ? des utilisateurs un peu hackers ou pas d?gourdis, vous pouvez ?tre perfectionniste pour ?viter les bugs de saisie. Et avec, tout cela, vous avez encore le temps de voir les nouveaut?s qui pourraient am?liorer votre pratique.\r\n', 20, 69);
(2, 'Full réseau', '2', 'Vous vous penchez non pas vers le côté obscur, mais bien vers l\'option SISR !', 'Ne supportant pas de perdre votre temps et étant plutôt impatient votre désir de compléter tous vos services avec directement les bonnes commandes, c\'est cela votre atout.\r\nÊtre à l\'aise avec différents systèmes d\'exploitation et savoir dépanner vos proches quand ils sont au bout de leurs vies lorsque le WiFi est désactivé.', 'Voulant non pas rester toute votre journée derrière votre écran à taper sur votre clavier, vous divaguer un peu partout et surveiller le bon fonctionnement de vos créations.\r\nVous aimez répondre à des demandes de dépannage et venir les résoudre pour le plaisir de l\'autre.', 20, 66),
(3, 'Mi dev mi réseau', '3', 'Vous bricolez un peu de code pour des bots de jeu ou dépanner la famille.', 'Vous êtes essayée à HTML et CSS parce que c\'est marrant de voir rapidement le résultat de son code mais, pour vos jeux préférés, vous pouvez réfléchir à la meilleure manière d\'exploiter votre PC.', 'Un vrai technophile : vous avalez toutes les innovations techniques. Un peu branleur, try hardeur, vous pouvez vous énerver facilement et vous aimez bien mener votre monde par le bout du nez. Votre idée : c\'est aussi de choisir l\'option où on bosse le moins tout en étant les rois du monde.\r\nLe choix sera dur en décembre !!', 40, 40);
-- --------------------------------------------------------

--
-- Structure de la table `origine`
--

DROP TABLE IF EXISTS `origine`;
CREATE TABLE IF NOT EXISTS `origine` (
  `IDORIGINE` smallint(6) NOT NULL AUTO_INCREMENT,
  `NOM` char(62) NOT NULL,
  PRIMARY KEY (`IDORIGINE`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `origine`
--

INSERT INTO `origine` (`IDORIGINE`, `NOM`) VALUES
(1, 'G NSI'),
(2, 'STI2DSIN'),
(3, 'STI2DNONSIN'),
(4, 'G MATHS'),
(5, 'STMG'),
(6, 'PROSNRISC'),
(7, 'PROSAUTRE'),
(8, 'PROSNNONRISC'),
(9, 'RECURRENTIUT'),
(10, 'RECURRENTAUTRE'),
(11, 'AUTRE');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `IDQUESTION` smallint(6) NOT NULL AUTO_INCREMENT,
  `LIBELLE` varchar(1200) NOT NULL,
  `ENJEU` varchar(1200) NOT NULL,
  `IDTYPEQUESTION` int(11) DEFAULT NULL,
  `IDSCOREFERMEE` int(11) DEFAULT NULL,
  `IDSCORECH` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDQUESTION`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`IDQUESTION`, `LIBELLE`, `ENJEU`, `IDTYPEQUESTION`, `IDSCOREFERMEE`, `IDSCORECH`) VALUES
(1, 'Supportez-vous de \"perdre\" du temps ? r?soudre des erreurs', 'mise en jambe', 1, 2, 1),
(2, 'A quel point ?tes-vous ? l\"aise avec les Syst?mes d\"exploitation', 'Approche', 2, 1, 2),
(3, 'D?pannez-vous souvent les probl?mes informatiques de votre famille', 'Approche', 1, 3, 1),
(4, 'Avez-vous d?j? fouin? dans votre PC', 'Approche', 1, 2, NULL),
(5, 'A quel point aimez-vous personnaliser vos projets/r?alisations', 'entamereflexion', 2, 1, 3),
(6, 'A quel point ?tes-vous perfectionniste', 'entamereflexion', 2, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `reponseassociee`
--

DROP TABLE IF EXISTS `reponseassociee`;
CREATE TABLE IF NOT EXISTS `reponseassociee` (
  `IDQUESTION` smallint(6) DEFAULT NULL,
  `IDSONDE` smallint(6) DEFAULT NULL,
  `VALEURRES` smallint(6) DEFAULT '0',
  `VALEURRDEV` smallint(6) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponseassociee`
--

INSERT INTO `reponseassociee` (`IDQUESTION`, `IDSONDE`, `VALEURRES`, `VALEURRDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 1, 1),
(3, 1, 4, 0),
(4, 1, 4, 0),
(5, 1, 0, 1),
(6, 1, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `scorech`
--

DROP TABLE IF EXISTS `scorech`;
CREATE TABLE IF NOT EXISTS `scorech` (
  `IDSCORECH` smallint(6) NOT NULL AUTO_INCREMENT,
  `NBPTMULTRES` int(11) DEFAULT '0',
  `NBPTMULTDEV` int(11) DEFAULT '0',
  PRIMARY KEY (`IDSCORECH`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `scorech`
--

INSERT INTO `scorech` (`IDSCORECH`, `NBPTMULTRES`, `NBPTMULTDEV`) VALUES
(1, 0, 0),
(2, 1, 1),
(3, 0, 1),
(4, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `scorefermee`
--

DROP TABLE IF EXISTS `scorefermee`;
CREATE TABLE IF NOT EXISTS `scorefermee` (
  `IDSCOREF` smallint(6) NOT NULL AUTO_INCREMENT,
  `REP` tinyint(1) DEFAULT NULL,
  `SCOREFRES` int(11) DEFAULT '0',
  `SCOREFDEV` int(11) DEFAULT '0',
  PRIMARY KEY (`IDSCOREF`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `scorefermee`
--

INSERT INTO `scorefermee` (`IDSCOREF`, `REP`, `SCOREFRES`, `SCOREFDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 2, 4),
(3, 1, 4, 0),
(4, 1, 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `sonde`
--

DROP TABLE IF EXISTS `sonde`;
CREATE TABLE IF NOT EXISTS `sonde` (
  `IDSONDE` smallint(6) NOT NULL AUTO_INCREMENT,
  `IDORIGINE` smallint(6) DEFAULT NULL,
  `ANNEE` int(11) DEFAULT '2023',
  `SEXE` char(1) DEFAULT 'M',
  PRIMARY KEY (`IDSONDE`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typequestion`
--

DROP TABLE IF EXISTS `typequestion`;
CREATE TABLE IF NOT EXISTS `typequestion` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `NOMTYPE` char(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typequestion`
--

INSERT INTO `typequestion` (`ID`, `NOMTYPE`) VALUES
(1, 'fermee'),
(2, 'echelle');

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `num_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` text NOT NULL,
  `mdp_admin` text NOT NULL,
  PRIMARY KEY (`num_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admins` (`num_admin`, `id_admin`, `mdp_admin`) VALUES
(1, 'Admin', '$2y$12$n3nDcrK3wCELWt3SFbFoeelr0iomkoIAZq6zJJ.B.XtV0bCXmDGKi');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
