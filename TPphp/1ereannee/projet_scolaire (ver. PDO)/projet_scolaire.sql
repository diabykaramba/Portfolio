-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 16 mars 2026 à 14:10
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
-- Base de données : `projet_scolaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `num_eleve` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_eleve` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `num_telephone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`num_eleve`, `nom_eleve`, `adresse`, `num_telephone`, `photo`) VALUES
('2', 'Tariq St-Patrick', '2 Avenue de la Gloire', '0699856212', 'tariq-st-patrick.jpg'),
('3', 'Zaire Emery', '5 Rue des Pourparlers', '0788321257', 'warren-zaire-emery-2223.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `num_enseignant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_enseignant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_telephone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`num_enseignant`, `nom_enseignant`, `adresse`, `num_telephone`, `photo`) VALUES
('1', 'Stringer Bell', '3 Rue Oklahoma', '0758632251', 'stinger_bell.jpg'),
('2', 'Karamba Diaby', '30 Rue Abraham Lincoln', '0658912761', 'silhouette.avif'),
('3', 'Benoit Frey', '22 Avenue Ziguenki', '0622121456', 'benoit.webp');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profil` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`login`, `profil`, `mdp`) VALUES
('dby', 'Responsable', 'dby'),
('diabyk', 'Responsable', 'diaby'),
('kdiaby', 'Responsable', 'diaby'),
('mouk', 'Enseignant', 'kizengui');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`num_eleve`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`num_enseignant`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
