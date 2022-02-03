-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 03 fév. 2022 à 07:44
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prototype`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_affectation_agent` (IN `agent` INT, IN `quartier` INT, IN `debut` DATETIME, IN `fin` DATETIME)  NO SQL
BEGIN
IF NOT EXISTS(SELECT * FROM t_affectation_agent WHERE CodeAgent=agent) THEN
INSERT INTO t_affectation_agent(CodeAgent,CodeQuartier,Debut,Fin) VALUES(agent,quartier,debut,fin);
ELSEIF EXISTS(SELECT * FROM t_affectation_agent WHERE CodeAgent=agent)THEN
UPDATE t_affectation_agent SET CodeQuartier=quartier, Debut=debut, Fin=fin WHERE CodeAgent=agent;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_create_parcelle` (IN `numero` INT, IN `avenue` INT, IN `longueur` FLOAT, IN `largeur` FLOAT, IN `proprietaire` VARCHAR(200), IN `user` INT)  NO SQL
BEGIN
INSERT INTO t_parcelle(CodeAvenue,Numero,Longueur,Largeur,Proprietaire,parcelle_created_by) VALUES(avenue,numero,longueur,largeur,proprietaire,user);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `t_adresse`
--

CREATE TABLE `t_adresse` (
  `CodeAdresse` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `CodeAvenue` int(11) NOT NULL,
  `CodeQuartier` int(11) NOT NULL,
  `CodeCommune` int(11) NOT NULL,
  `CodeVille` int(11) NOT NULL,
  `CodeProvince` int(11) NOT NULL,
  `CodePersonne` int(11) NOT NULL,
  `DateDebut` datetime NOT NULL,
  `DateFin` datetime NOT NULL,
  `Statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_adresse`
--

INSERT INTO `t_adresse` (`CodeAdresse`, `Numero`, `CodeAvenue`, `CodeQuartier`, `CodeCommune`, `CodeVille`, `CodeProvince`, `CodePersonne`, `DateDebut`, `DateFin`, `Statut`) VALUES
(1, 4, 1, 1, 2, 1, 1, 4, '2010-10-10 00:00:00', '2016-11-11 00:00:00', 0),
(2, 13, 3, 3, 2, 1, 1, 4, '2014-12-11 00:00:00', '2020-12-12 00:00:00', 0),
(3, 30, 5, 3, 2, 1, 1, 4, '2021-11-08 00:00:00', '2021-11-26 00:00:00', 0),
(4, 25, 4, 4, 3, 1, 1, 4, '2021-11-15 00:00:00', '2021-11-30 00:00:00', 0),
(5, 12, 3, 3, 2, 1, 1, 4, '2021-12-11 00:00:00', '2021-11-11 00:00:00', 0),
(6, 34, 3, 3, 2, 1, 1, 2, '2021-11-01 00:00:00', '2021-11-24 00:00:00', 1),
(7, 89, 5, 1, 2, 1, 1, 4, '2021-11-20 00:00:00', '2021-11-26 00:00:00', 1),
(8, 0, 3, 3, 2, 1, 1, 3, '2021-12-07 00:00:00', '2021-11-20 00:00:00', 1),
(9, 6, 3, 3, 2, 1, 1, 8, '2021-11-16 00:00:00', '2021-11-20 00:00:00', 1),
(10, 34, 5, 3, 2, 1, 1, 17, '2020-10-11 00:00:00', '2021-11-01 00:00:00', 0),
(11, 52, 1, 4, 3, 1, 1, 17, '2021-11-15 00:00:00', '0000-00-00 00:00:00', 1),
(12, 124, 4, 4, 3, 1, 1, 18, '2016-01-11 00:00:00', '0000-00-00 00:00:00', 1),
(13, 12, 1, 4, 3, 1, 1, 19, '2010-03-22 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_affectation_agent`
--

CREATE TABLE `t_affectation_agent` (
  `CodeAffectation` int(11) NOT NULL,
  `CodeAgent` int(11) NOT NULL,
  `CodeQuartier` int(11) NOT NULL,
  `Debut` datetime NOT NULL,
  `Fin` datetime NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_affectation_agent`
--

INSERT INTO `t_affectation_agent` (`CodeAffectation`, `CodeAgent`, `CodeQuartier`, `Debut`, `Fin`, `Created_on`) VALUES
(1, 13, 3, '2022-01-09 00:00:00', '2022-01-23 00:00:00', '2022-01-09 05:37:11'),
(2, 12, 3, '2022-01-09 00:00:00', '2022-01-23 00:00:00', '2022-01-09 05:37:11'),
(4, 14, 4, '2022-01-10 00:00:00', '2022-01-19 00:00:00', '2022-01-10 07:17:59'),
(5, 15, 3, '2022-01-10 00:00:00', '2022-01-16 00:00:00', '2022-01-09 21:11:24');

-- --------------------------------------------------------

--
-- Structure de la table `t_agent`
--

CREATE TABLE `t_agent` (
  `CodeAgent` int(11) NOT NULL,
  `NomAgent` varchar(50) NOT NULL,
  `PostnomAgent` varchar(50) NOT NULL,
  `PrenomAgent` varchar(50) NOT NULL,
  `Matricule` varchar(20) DEFAULT NULL,
  `Photo` text NOT NULL,
  `TelephoneAgent` varchar(15) NOT NULL,
  `EmailAgent` varchar(50) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `CodeFonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_agent`
--

INSERT INTO `t_agent` (`CodeAgent`, `NomAgent`, `PostnomAgent`, `PrenomAgent`, `Matricule`, `Photo`, `TelephoneAgent`, `EmailAgent`, `Created_on`, `CodeFonction`) VALUES
(12, 'Baraka', 'Bigega', 'Espoir', '22BAR56', 'IMG-20211206-WA0015.jpg', '+2439977553723', 'esbarakabigega@gmail.com', '2022-01-08 18:54:40', 1),
(14, 'Akilimali', 'Baraka', 'Michael', '22AKI45', 'IMG-20211010-WA0024.jpg', '+243966775534', 'mich@gmail.com', '2022-01-08 19:54:45', 2),
(15, 'Ismael', 'Baraka', 'Isma', '22ISM32', '_MG_8998.JPG', '+243966775534', 'isma@gmail.com', '2022-01-09 17:43:32', 2);

--
-- Déclencheurs `t_agent`
--
DELIMITER $$
CREATE TRIGGER `tr_before_insert_agent` BEFORE INSERT ON `t_agent` FOR EACH ROW BEGIN
SET NEW.Matricule=CONCAT(UCASE(SUBSTRING(NEW.Created_on,3,2)), UCASE(SUBSTRING(NEW.NomAgent,1,3)), SUBSTRING(CAST(NOW() AS CHAR),18,2));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `t_avenue`
--

CREATE TABLE `t_avenue` (
  `CodeAvenue` int(11) NOT NULL,
  `Avenue` varchar(50) NOT NULL,
  `CodeQuartier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_avenue`
--

INSERT INTO `t_avenue` (`CodeAvenue`, `Avenue`, `CodeQuartier`) VALUES
(1, 'Du lac', 1),
(3, 'Hewa-bora', 3),
(4, 'Presidentielle', 4),
(5, 'Du marche', 3),
(6, 'Du lac', 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_commune`
--

CREATE TABLE `t_commune` (
  `CodeCommune` int(11) NOT NULL,
  `Commune` varchar(50) NOT NULL,
  `CodeVille` int(11) NOT NULL,
  `CodeStatut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_commune`
--

INSERT INTO `t_commune` (`CodeCommune`, `Commune`, `CodeVille`, `CodeStatut`) VALUES
(2, 'Karisimbi', 1, 1),
(3, 'Goma', 1, 1),
(4, 'Kiwanja', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_fonction`
--

CREATE TABLE `t_fonction` (
  `CodeFonction` int(11) NOT NULL,
  `Fonction` varchar(50) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_fonction`
--

INSERT INTO `t_fonction` (`CodeFonction`, `Fonction`, `Created_on`) VALUES
(1, 'Admin', '2022-01-03 19:00:01'),
(2, 'Recenseur', '2022-01-03 19:00:01');

-- --------------------------------------------------------

--
-- Structure de la table `t_menage`
--

CREATE TABLE `t_menage` (
  `CodeMenage` int(11) NOT NULL,
  `CodeParcelle` int(11) NOT NULL,
  `Designation` varchar(150) NOT NULL,
  `menage_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `menage_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_menage`
--

INSERT INTO `t_menage` (`CodeMenage`, `CodeParcelle`, `Designation`, `menage_created_on`, `menage_created_by`) VALUES
(1, 1, 'Famille Siwa', '2022-01-09 19:02:38', 12),
(2, 1, 'Famille Espoir', '2022-01-09 19:03:42', 12),
(4, 6, 'Hotel 2 paysages', '2022-01-10 06:03:15', 11),
(5, 2, 'Famille Baraka', '2022-01-10 07:19:09', 11);

-- --------------------------------------------------------

--
-- Structure de la table `t_parcelle`
--

CREATE TABLE `t_parcelle` (
  `CodeParcelle` int(11) NOT NULL,
  `CodeAvenue` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Longueur` float NOT NULL,
  `Largeur` float NOT NULL,
  `Proprietaire` varchar(200) NOT NULL,
  `parcelle_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `parcelle_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_parcelle`
--

INSERT INTO `t_parcelle` (`CodeParcelle`, `CodeAvenue`, `Numero`, `Longueur`, `Largeur`, `Proprietaire`, `parcelle_created_on`, `parcelle_created_by`) VALUES
(1, 6, 1, 50, 30, 'Siwa Mumbere', '2022-01-09 17:38:03', 11),
(2, 4, 1, 20, 20, 'Akili Maguru Prince', '2022-01-09 19:27:02', 12),
(6, 4, 5, 100, 100, 'Vanny', '2022-01-10 06:02:56', 11);

-- --------------------------------------------------------

--
-- Structure de la table `t_personne`
--

CREATE TABLE `t_personne` (
  `CodePersonne` int(11) NOT NULL,
  `NomPersonne` varchar(50) NOT NULL,
  `PostnomPersonne` varchar(50) NOT NULL,
  `PrenomPersonne` varchar(50) NOT NULL,
  `TelephonePersonne` varchar(15) NOT NULL,
  `EmailPersonne` varchar(50) NOT NULL,
  `NomPere` varchar(200) NOT NULL,
  `NomMere` varchar(200) NOT NULL,
  `SexePersonne` varchar(10) NOT NULL,
  `Image` text NOT NULL,
  `DateNaiss` datetime NOT NULL,
  `LieuNaiss` varchar(200) NOT NULL,
  `ProfessionPersonne` varchar(200) NOT NULL,
  `DomaineEtude` text NOT NULL,
  `CodeAdresse` int(11) NOT NULL,
  `CodeQuartier` int(11) NOT NULL,
  `Created_by` int(11) NOT NULL,
  `CodeMenage` int(11) NOT NULL,
  `EstCongolais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_personne`
--

INSERT INTO `t_personne` (`CodePersonne`, `NomPersonne`, `PostnomPersonne`, `PrenomPersonne`, `TelephonePersonne`, `EmailPersonne`, `NomPere`, `NomMere`, `SexePersonne`, `Image`, `DateNaiss`, `LieuNaiss`, `ProfessionPersonne`, `DomaineEtude`, `CodeAdresse`, `CodeQuartier`, `Created_by`, `CodeMenage`, `EstCongolais`) VALUES
(21, 'Baraka', 'Bigega', 'Espoir', '0977553723', 'esbarakabigega@gmail.com', 'Baraka', 'Zawadi', 'Masculin', 'IMG_20211221_144832_096.jpg', '1999-11-04 00:00:00', 'Goma', 'Étudiant', 'Informatique de gestion ', 0, 0, 0, 2, 1),
(22, 'Akilimali', 'Baraka', 'Michael', '098877654', 'micha@gmail.com', 'Baraka', 'Zawadi', 'Masculin', 'FB_IMG_16403662118348865.jpg', '2005-01-09 00:00:00', 'Goma', 'Macon', 'Construction ', 0, 0, 0, 2, 1),
(23, 'Elizabeth ', 'Kahindo', 'Hadassa', '0977665432', 'elize@gmail.com', 'Baraka', 'Zawadi', 'Feminin', '20211225_124223.jpg', '2008-03-09 00:00:00', 'Goma', 'Élève ', '', 0, 0, 0, 2, 1),
(24, 'Baraka', 'Bigega', 'François ', '', '', 'Baraka', 'Zawadi', 'Masculin', '20211225_124527.jpg', '2001-01-10 00:00:00', 'Goma', '', '', 0, 0, 0, 2, 1),
(25, 'Salem', 'Baraka', '', '0999778', '', 'Baraka ', 'Zawadi', 'Feminin', '20211225_124527.jpg', '1993-01-10 00:00:00', 'Goma ', '', '', 0, 0, 0, 2, 0),
(26, 'Fadhili', 'Bigega ', '', '', '', 'Baraka', 'Zawadi', 'Feminin', '20211225_124537.jpg', '2000-01-10 00:00:00', 'Goma', '', '', 0, 0, 0, 2, 0),
(27, 'Ismael', 'Baraka', 'Joseph', '', '', 'Baraka', 'Zawadi', 'Masculin', '20211225_124142.jpg', '2000-01-10 00:00:00', 'Goma', 'Chauffeu', '', 0, 0, 0, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_province`
--

CREATE TABLE `t_province` (
  `CodeProvince` int(11) NOT NULL,
  `Province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_province`
--

INSERT INTO `t_province` (`CodeProvince`, `Province`) VALUES
(1, 'NORD-KIVU'),
(3, 'SUD-KIVU'),
(4, 'MANIEMA'),
(5, 'ITURI'),
(6, 'KINSHASA');

-- --------------------------------------------------------

--
-- Structure de la table `t_quartier`
--

CREATE TABLE `t_quartier` (
  `CodeQuartier` int(11) NOT NULL,
  `Quartier` varchar(50) NOT NULL,
  `CodeCommune` int(11) NOT NULL,
  `CodeStatut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_quartier`
--

INSERT INTO `t_quartier` (`CodeQuartier`, `Quartier`, `CodeCommune`, `CodeStatut`) VALUES
(1, 'ndosho', 2, 1),
(3, 'mugunga', 2, 1),
(4, 'Himbi', 3, 1),
(5, 'Kiwanja groupement', 4, 2),
(6, 'Kasika', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_statut_commune`
--

CREATE TABLE `t_statut_commune` (
  `CodeStatut` int(11) NOT NULL,
  `Statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_statut_commune`
--

INSERT INTO `t_statut_commune` (`CodeStatut`, `Statut`) VALUES
(1, 'Commune'),
(2, 'Secteur'),
(3, 'Chefferie');

-- --------------------------------------------------------

--
-- Structure de la table `t_statut_quartier`
--

CREATE TABLE `t_statut_quartier` (
  `CodeStatut` int(11) NOT NULL,
  `Statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_statut_quartier`
--

INSERT INTO `t_statut_quartier` (`CodeStatut`, `Statut`) VALUES
(1, 'Quartier'),
(2, 'Groupement');

-- --------------------------------------------------------

--
-- Structure de la table `t_statut_ville`
--

CREATE TABLE `t_statut_ville` (
  `CodeStatut` int(11) NOT NULL,
  `Statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_statut_ville`
--

INSERT INTO `t_statut_ville` (`CodeStatut`, `Statut`) VALUES
(1, 'Ville'),
(2, 'Territoire');

-- --------------------------------------------------------

--
-- Structure de la table `t_type_compte`
--

CREATE TABLE `t_type_compte` (
  `CodeType` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_type_compte`
--

INSERT INTO `t_type_compte` (`CodeType`, `Type`) VALUES
(1, 'Compte admin'),
(2, 'Compte recenseur');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `CodeUser` int(11) NOT NULL,
  `Matricule` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `user_created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `CodeType` int(11) NOT NULL,
  `CodeAgent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`CodeUser`, `Matricule`, `Password`, `user_created_on`, `CodeType`, `CodeAgent`) VALUES
(10, '22BAR56', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2022-01-08 19:18:55', 0, 12),
(11, '22AKI45', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2022-01-08 19:55:15', 0, 14),
(12, '22ISM32', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2022-01-09 17:44:06', 0, 15);

-- --------------------------------------------------------

--
-- Structure de la table `t_ville`
--

CREATE TABLE `t_ville` (
  `CodeVille` int(11) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `CodeProvince` int(11) NOT NULL,
  `CodeStatut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_ville`
--

INSERT INTO `t_ville` (`CodeVille`, `Ville`, `CodeProvince`, `CodeStatut`) VALUES
(1, 'Goma', 1, 1),
(2, 'Masisi', 1, 2),
(4, 'Rutshuru', 1, 2),
(5, 'Beni', 1, 1),
(6, 'Beni', 1, 2),
(7, 'Beni', 1, 1),
(8, 'Walikale', 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_adresse`
--
ALTER TABLE `t_adresse`
  ADD PRIMARY KEY (`CodeAdresse`);

--
-- Index pour la table `t_affectation_agent`
--
ALTER TABLE `t_affectation_agent`
  ADD PRIMARY KEY (`CodeAffectation`);

--
-- Index pour la table `t_agent`
--
ALTER TABLE `t_agent`
  ADD PRIMARY KEY (`CodeAgent`),
  ADD UNIQUE KEY `un_email_agent` (`EmailAgent`),
  ADD UNIQUE KEY `un_matricule` (`Matricule`);

--
-- Index pour la table `t_avenue`
--
ALTER TABLE `t_avenue`
  ADD PRIMARY KEY (`CodeAvenue`);

--
-- Index pour la table `t_commune`
--
ALTER TABLE `t_commune`
  ADD PRIMARY KEY (`CodeCommune`);

--
-- Index pour la table `t_fonction`
--
ALTER TABLE `t_fonction`
  ADD PRIMARY KEY (`CodeFonction`);

--
-- Index pour la table `t_menage`
--
ALTER TABLE `t_menage`
  ADD PRIMARY KEY (`CodeMenage`);

--
-- Index pour la table `t_parcelle`
--
ALTER TABLE `t_parcelle`
  ADD PRIMARY KEY (`CodeParcelle`),
  ADD UNIQUE KEY `un_parcelle` (`Numero`,`CodeAvenue`);

--
-- Index pour la table `t_personne`
--
ALTER TABLE `t_personne`
  ADD PRIMARY KEY (`CodePersonne`),
  ADD UNIQUE KEY `un_personne` (`NomPersonne`,`PostnomPersonne`,`PrenomPersonne`);

--
-- Index pour la table `t_province`
--
ALTER TABLE `t_province`
  ADD PRIMARY KEY (`CodeProvince`);

--
-- Index pour la table `t_quartier`
--
ALTER TABLE `t_quartier`
  ADD PRIMARY KEY (`CodeQuartier`);

--
-- Index pour la table `t_statut_commune`
--
ALTER TABLE `t_statut_commune`
  ADD PRIMARY KEY (`CodeStatut`);

--
-- Index pour la table `t_statut_quartier`
--
ALTER TABLE `t_statut_quartier`
  ADD PRIMARY KEY (`CodeStatut`);

--
-- Index pour la table `t_statut_ville`
--
ALTER TABLE `t_statut_ville`
  ADD PRIMARY KEY (`CodeStatut`);

--
-- Index pour la table `t_type_compte`
--
ALTER TABLE `t_type_compte`
  ADD PRIMARY KEY (`CodeType`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`CodeUser`),
  ADD UNIQUE KEY `un_matricule_user` (`Matricule`);

--
-- Index pour la table `t_ville`
--
ALTER TABLE `t_ville`
  ADD PRIMARY KEY (`CodeVille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_adresse`
--
ALTER TABLE `t_adresse`
  MODIFY `CodeAdresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_affectation_agent`
--
ALTER TABLE `t_affectation_agent`
  MODIFY `CodeAffectation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_agent`
--
ALTER TABLE `t_agent`
  MODIFY `CodeAgent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_avenue`
--
ALTER TABLE `t_avenue`
  MODIFY `CodeAvenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_commune`
--
ALTER TABLE `t_commune`
  MODIFY `CodeCommune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_fonction`
--
ALTER TABLE `t_fonction`
  MODIFY `CodeFonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_menage`
--
ALTER TABLE `t_menage`
  MODIFY `CodeMenage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_parcelle`
--
ALTER TABLE `t_parcelle`
  MODIFY `CodeParcelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_personne`
--
ALTER TABLE `t_personne`
  MODIFY `CodePersonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `t_province`
--
ALTER TABLE `t_province`
  MODIFY `CodeProvince` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_quartier`
--
ALTER TABLE `t_quartier`
  MODIFY `CodeQuartier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_statut_commune`
--
ALTER TABLE `t_statut_commune`
  MODIFY `CodeStatut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_statut_quartier`
--
ALTER TABLE `t_statut_quartier`
  MODIFY `CodeStatut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_statut_ville`
--
ALTER TABLE `t_statut_ville`
  MODIFY `CodeStatut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_type_compte`
--
ALTER TABLE `t_type_compte`
  MODIFY `CodeType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `CodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `t_ville`
--
ALTER TABLE `t_ville`
  MODIFY `CodeVille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
