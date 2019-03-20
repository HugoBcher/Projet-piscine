-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mars 2019 à 09:57
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dischoolvery`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

DROP TABLE IF EXISTS `aime`;
CREATE TABLE IF NOT EXISTS `aime` (
  `idpost` int(8) NOT NULL,
  `idutilisateur` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`idpost`, `idutilisateur`) VALUES
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `ID_A` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Place` varchar(255) DEFAULT NULL,
  `Verif` int(11) DEFAULT NULL,
  `Member1` varchar(255) NOT NULL,
  `Member2` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_A`),
  KEY `Member1` (`Member1`),
  KEY `Member2` (`Member2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(8) NOT NULL,
  `imagefond` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imagefond` (`imagefond`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `ID_C` int(11) NOT NULL,
  `Member1_C` varchar(255) NOT NULL,
  `Member2_C` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_C`),
  KEY `Member1_C` (`Member1_C`),
  KEY `Member2_C` (`Member2_C`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `idpost` int(8) NOT NULL,
  `idutilisateur` int(8) NOT NULL,
  `texte` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `idutilisateur` int(8) NOT NULL,
  `formation` text,
  `experience` text,
  `interets` text,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`idutilisateur`, `formation`, `experience`, `interets`) VALUES
(1, 'ECE Paris', 'Stage - Alten ', 'Peinture / Musique'),
(2, 'ECE Paris', 'Stage - Microsoft\r\nCDD - LECLERC', 'Sport / Voyage'),
(3, 'ECE Paris', 'Stage 1 mois\r\nCDD 6 mois', 'Sport \r\nMusique\r\nDanse'),
(5, NULL, NULL, NULL),
(6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `poste` varchar(24) NOT NULL,
  `texte` text NOT NULL,
  `contrat` varchar(24) NOT NULL,
  `date` date NOT NULL,
  `id` int(8) NOT NULL,
  `entreprise` text NOT NULL,
  `contact` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`poste`, `texte`, `contrat`, `date`, `id`, `entreprise`, `contact`) VALUES
('Assistant de Tp', 'Nous recherchons une personne volontaire pour devenir assistant de Tp pour des ING1 et ING2', 'Stage', '2018-05-01', 1, 'ECE Paris', 'service_stage@ece.fr'),
('INGENIEUR ROBOTIQUE', 'Poste dans le domaine de la robotique. Conception d\'un robot dans le but de participer a la coupe du monde de robotique.', 'CDD / CDI', '2018-05-03', 2, 'ECE Paris', 'service_emploi@ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_M` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Text` text,
  `Chat` int(11) NOT NULL,
  PRIMARY KEY (`ID_M`),
  KEY `Chat` (`Chat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notificationaime`
--

DROP TABLE IF EXISTS `notificationaime`;
CREATE TABLE IF NOT EXISTS `notificationaime` (
  `id` int(11) NOT NULL,
  `idlikeur` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notificationaime`
--

INSERT INTO `notificationaime` (`id`, `idlikeur`, `idpost`, `date`) VALUES
(2, 3, 6, '2018-05-24 16:54:30');

-- --------------------------------------------------------

--
-- Structure de la table `notificationamitie`
--

DROP TABLE IF EXISTS `notificationamitie`;
CREATE TABLE IF NOT EXISTS `notificationamitie` (
  `iddemandeur` int(8) NOT NULL,
  `id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notificationcommentaire`
--

DROP TABLE IF EXISTS `notificationcommentaire`;
CREATE TABLE IF NOT EXISTS `notificationcommentaire` (
  `id` int(8) NOT NULL,
  `idcommentateur` int(8) NOT NULL,
  `idpost` int(8) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notificationcommentaire`
--

INSERT INTO `notificationcommentaire` (`id`, `idcommentateur`, `idpost`, `date`) VALUES
(2, 3, 6, '2018-05-24 16:54:52');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(8) NOT NULL,
  `chemin` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `chemin`) VALUES
(6, 'images/bg/bg3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `idutilisateur` int(8) NOT NULL,
  `date` date NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `idutilisateur`, `date`, `texte`) VALUES
(6, 2, '2018-05-24', 'Bonjour Ã  tous !');

-- --------------------------------------------------------

--
-- Structure de la table `reseau`
--

DROP TABLE IF EXISTS `reseau`;
CREATE TABLE IF NOT EXISTS `reseau` (
  `id1` int(8) NOT NULL,
  `id2` int(8) NOT NULL,
  PRIMARY KEY (`id1`,`id2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `LoginS` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Sector` varchar(255) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Tag1` varchar(255) DEFAULT NULL,
  `Tag2` varchar(255) DEFAULT NULL,
  `Tag3` varchar(255) DEFAULT NULL,
  `Tag4` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LoginS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `LoginT` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `School` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Sector` varchar(255) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Tag1` varchar(255) DEFAULT NULL,
  `Tag2` varchar(255) DEFAULT NULL,
  `Tag3` varchar(255) DEFAULT NULL,
  `Tag4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LoginT`),
  KEY `School` (`School`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(12) NOT NULL,
  `prenom` varchar(12) NOT NULL,
  `pseudo` varchar(12) NOT NULL,
  `email` varchar(32) NOT NULL,
  `chemin_profil` text NOT NULL,
  `chemin_fond` text NOT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `nom` (`nom`),
  KEY `prenom` (`prenom`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `email`, `chemin_profil`, `chemin_fond`, `type`) VALUES
(1, 'Gandchi', 'Julien', 'juju', 'julien.gandchi@edu.ece.fr', 'images/profil/photo_profil_1.jpg', 'images/bg/bg1.jpg', 0),
(2, 'Fontaine', 'Maxime', 'demonew', 'maxime.fontaine@edu.ece.fr', 'images/avatar.png', 'images/bg/bg3.jpg', 1),
(3, 'Bouzemame', 'Dany', 'dany_bzm', 'dany.bouzemame@edu.ece.fr', 'images/profil/photo_profil_dany.jpg', 'images/bg/bg5.jpg', 1),
(5, 'lenief', 'lucas', 'lulu', 'lucas.lenief@gmail.com', 'images/avatar.png', 'images/bg/bg3.jpg', NULL),
(6, '', '', '', 'dany.bouzemame@edu.ece.fr', 'images/avatar.png', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(8) NOT NULL,
  `chemin` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
