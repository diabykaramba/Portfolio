-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 09 déc. 2025 à 22:30
-- Version du serveur : 8.0.44
-- Version de PHP : 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `IDENT_ACTEUR` int NOT NULL,
  `NOM` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `PRENOM` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `NB_FILM` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`IDENT_ACTEUR`, `NOM`, `PRENOM`, `DATE_NAISSANCE`, `NB_FILM`) VALUES
(1, 'DURIS', 'Romain', '1974-05-28', 60),
(2, 'EXARCHOPOULOS', 'ADELE', '1993-11-22', 23),
(3, 'BORHINGER', 'RICHARD', '1942-06-16', 132),
(4, 'GALABRU', 'MICHEL', '1922-10-27', 277),
(5, 'PARILLAUD', 'ANNE', '1960-05-06', 35),
(6, 'FORD', 'HARRISON', '1942-06-13', 64),
(7, 'FISHER', 'CARRIE', '1956-10-21', 74),
(8, 'SALDANA', 'ZOE', '1978-06-19', 31),
(9, 'WEAVER', 'SIGOURNEY', '1949-10-08', 66),
(10, 'RENO', 'JEAN', '1948-06-30', 75);

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

CREATE TABLE `casting` (
  `IDENT_FILM` int NOT NULL,
  `IDENT_ACTEUR` int NOT NULL,
  `ROLE` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `casting`
--

INSERT INTO `casting` (`IDENT_FILM`, `IDENT_ACTEUR`, `ROLE`) VALUES
(1, 1, 'François'),
(1, 2, 'Julia'),
(2, 5, 'NIKITA'),
(2, 10, 'VICTOR LE NETTOYEUR'),
(3, 6, 'HAN SOLO'),
(3, 7, 'PRINCESSE LEIA'),
(4, 8, 'NEYTIRI'),
(4, 9, 'Dr. Grace Auguste');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `IDENT_FILM` int NOT NULL,
  `TITRE` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `GENRE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `PAYS` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IDENT_REALISATEUR` int NOT NULL,
  `DISTRIBUTEUR` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `DUREE` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`IDENT_FILM`, `TITRE`, `GENRE`, `DATE_SORTIE`, `PAYS`, `IDENT_REALISATEUR`, `DISTRIBUTEUR`, `DUREE`) VALUES
(1, 'SUBWAY', 'DRAME', '1985-04-10', 'FRANCE', 1, 'GAUUMONT', 104),
(2, 'NIKITA', 'DRAME', '1990-02-21', 'FRANCE', 1, 'GAUMONT', 118),
(3, 'STAR WARS 6: LE RETOUR DU JEDI', 'SF', '1983-10-19', 'ETATS-UNIS', 2, '20th Century Fox', 133),
(4, 'AVATAR', 'SF', '2009-10-16', 'ETATS-UNIS', 3, '20th Century Fox', 170),
(5, 'Bienvenue chez les Chti\'s', 'Comédie', '2008-02-27', 'FRANCE', 4, 'Gaumont', 100);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `IDENT_PAYS` int NOT NULL,
  `LIBELLE` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`IDENT_PAYS`, `LIBELLE`) VALUES
(2, 'ETATS-UNIS'),
(1, 'FRANCE');

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `IDENT_REALISATEUR` int NOT NULL,
  `NOM` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `PRENOM` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `NB_FILM_ECRIT` int DEFAULT NULL,
  `NB_FILM_PRODUIT` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`IDENT_REALISATEUR`, `NOM`, `PRENOM`, `DATE_NAISSANCE`, `NB_FILM_ECRIT`, `NB_FILM_PRODUIT`) VALUES
(1, 'BESSON', 'LUC', '1959-03-18', 40, 99),
(2, 'LUCAS', 'GEORGES', '1944-05-14', 79, 64),
(3, 'CAMERON', 'JAMES', '1954-08-16', 22, 23),
(4, 'Boon', 'Dany', '1966-06-26', 8, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`IDENT_ACTEUR`);

--
-- Index pour la table `casting`
--
ALTER TABLE `casting`
  ADD KEY `IDENT_ACTEUR` (`IDENT_ACTEUR`),
  ADD KEY `IDENT_FILM` (`IDENT_FILM`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IDENT_FILM`),
  ADD KEY `IDENT_REALISATEUR` (`IDENT_REALISATEUR`),
  ADD KEY `PAYS` (`PAYS`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`LIBELLE`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`IDENT_REALISATEUR`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`IDENT_ACTEUR`) REFERENCES `acteur` (`IDENT_ACTEUR`),
  ADD CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`IDENT_FILM`) REFERENCES `film` (`IDENT_FILM`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`IDENT_REALISATEUR`) REFERENCES `realisateur` (`IDENT_REALISATEUR`),
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`PAYS`) REFERENCES `pays` (`LIBELLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
