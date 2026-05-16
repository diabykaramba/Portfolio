-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 14 avr. 2026 à 12:42
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
-- Base de données : `zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int NOT NULL,
  `id_espece` int NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_animal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `id_espece`, `date_de_naissance`, `sexe`, `nom_animal`, `commentaire`, `photo`) VALUES
(1, 1, '2006-12-07', 'M', 'Fabrice', 'Férocement féroce', 'fabrice.webp'),
(2, 3, '2019-10-01', 'F', 'Phillipine', 'Son état est à surveiller.', 'phillipine.jpg'),
(3, 5, '2020-07-05', 'M', 'Polaire', 'Ne jamais le laisser tout seul avec un phoque. ', 'polaire.jpg'),
(4, 4, '2013-03-03', 'M', 'Julian', 'Il faut le traiter comme un roi. ', 'julian.jpg'),
(5, 2, '2025-11-09', 'F', 'Olga', 'Nouvelle invitée, veillez à la nourrir au moins 3 fois par jour !', 'olga.jpg'),
(10, 1, '2026-04-07', 'M', 'test', 'Son état est à surveiller.', 'frank.webp');

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE `enclos` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_enclos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `capacite_max` int NOT NULL,
  `taille` float NOT NULL,
  `eau` tinyint(1) NOT NULL,
  `id_responsable` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`id`, `nom_enclos`, `capacite_max`, `taille`, `eau`, `id_responsable`) VALUES
('1', 'Plaine de la Savane', 30, 1500.5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE `especes` (
  `id` int NOT NULL,
  `nom_espece` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_nourriture` int NOT NULL,
  `duree_vie_moyenne` int NOT NULL,
  `aquatique` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `especes`
--

INSERT INTO `especes` (`id`, `nom_espece`, `id_nourriture`, `duree_vie_moyenne`, `aquatique`) VALUES
(1, 'Lion d\'Afrique', 1, 15, 0),
(2, 'Manchot Empereur', 2, 20, 1),
(3, 'Girafe', 3, 25, 0),
(4, 'Lémurien Catta', 4, 18, 0),
(5, 'Ours polaire', 2, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `loc_animaux`
--

CREATE TABLE `loc_animaux` (
  `id` int NOT NULL,
  `id_animaux` int NOT NULL,
  `id_enclos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_arrivee` date NOT NULL,
  `date_sortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fonction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `salaire` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `nom`, `prenom`, `login`, `password`, `date_de_naissance`, `sexe`, `fonction`, `salaire`, `photo`) VALUES
(2, 'Diaby', 'Karamba', 'kdiaby', 'diaby', '2006-12-07', 'M', 'Directeur', NULL, ''),
(3, 'Pintus', 'Vanessa', 'v.pintus', 'vanessa', '1983-02-28', 'F', 'Employe', '2300.79', 'vanessa.jpg'),
(4, 'Webbs', 'Frank', 'f.webbs', 'frank', '1977-11-06', 'M', 'Employe', '1900.01', 'frank.webp');

-- --------------------------------------------------------

--
-- Structure de la table `types_nourriture`
--

CREATE TABLE `types_nourriture` (
  `id_nourriture` int NOT NULL,
  `type_nourriture` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types_nourriture`
--

INSERT INTO `types_nourriture` (`id_nourriture`, `type_nourriture`) VALUES
(1, 'Viande crue'),
(2, 'Poisson frais'),
(3, 'Foin et herbe'),
(4, 'Fruits et insectes');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_race` (`id_espece`),
  ADD KEY `id_espece` (`id_espece`);

--
-- Index pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsable_enclos` (`id_responsable`);

--
-- Index pour la table `especes`
--
ALTER TABLE `especes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nourriture` (`id_nourriture`);

--
-- Index pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_animal` (`id_animaux`),
  ADD KEY `reference_enclos` (`id_enclos`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types_nourriture`
--
ALTER TABLE `types_nourriture`
  ADD PRIMARY KEY (`id_nourriture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `especes`
--
ALTER TABLE `especes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `animaux_ibfk_1` FOREIGN KEY (`id_espece`) REFERENCES `especes` (`id`);

--
-- Contraintes pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD CONSTRAINT `enclos_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `personnel` (`id`);

--
-- Contraintes pour la table `especes`
--
ALTER TABLE `especes`
  ADD CONSTRAINT `especes_ibfk_1` FOREIGN KEY (`id_nourriture`) REFERENCES `types_nourriture` (`id_nourriture`);

--
-- Contraintes pour la table `loc_animaux`
--
ALTER TABLE `loc_animaux`
  ADD CONSTRAINT `loc_animaux_ibfk_1` FOREIGN KEY (`id_animaux`) REFERENCES `animaux` (`id`),
  ADD CONSTRAINT `loc_animaux_ibfk_2` FOREIGN KEY (`id_enclos`) REFERENCES `enclos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
