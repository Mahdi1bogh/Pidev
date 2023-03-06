-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 fév. 2023 à 08:06
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionreclamation`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `detailAvisService` varchar(255) NOT NULL,
  `noteService` int(11) NOT NULL,
  `idReclamation` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `detailAvisService`, `noteService`, `idReclamation`, `idUser`) VALUES
(2, 'qsccccccccccccccc', 4, 2, 1),
(3, 'azfffffffffffffffffffffffvqswxv<', 1, 1, 1),
(4, 'qsssssss', 2, 1, 1),
(5, 'aaa', 2, 1, 1),
(6, 'fafe', 11, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221213235239', '2022-12-14 00:52:43', 61),
('DoctrineMigrations\\Version20221213235505', '2022-12-14 00:55:09', 29),
('DoctrineMigrations\\Version20221214000338', '2022-12-14 01:03:41', 31),
('DoctrineMigrations\\Version20221214000514', '2022-12-14 01:05:23', 29);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `idReclamation` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `numero_mobile` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_traitement` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `nomServcie` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'images-639917367e9cf460600526.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`idReclamation`, `nom`, `prenom`, `email`, `screenshot`, `numero_mobile`, `date_creation`, `date_traitement`, `description`, `status`, `nomServcie`, `image`) VALUES
(5, 'aaaa', 'erty', 'yyy@email.com', 'zertyuiop', '94464323', '2021-03-07', '2021-02-07', 'ghnbghjhjnbh', 'hj', 'fgh', 'ds-639914f3a9803275195715.png'),
(6, 'sd', 'fdxc', 'fdv', 'fxv', 'FXV', '2017-01-01', '2025-12-28', 'sddddd', 'sddddd', 'ds', 'ds-639914f3a9803275195715.png'),
(7, 's', 'fs', 'fs@email.com', 'sf', 'vxcxvvvx', '2017-01-01', '2027-12-19', 'sf', 'Traitée', 'Service Article', 'images-639917367e9cf460600526.png'),
(10, 'sd', 'ssssssssss', 'yyy@email.com', 'https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg', '94464323', '2017-01-01', '2026-11-18', 'sddddddddddddd', 'Traitée', 'Service Article', 'images-639917367e9cf460600526.png'),
(12, 'Yahia', 'Achref', 'belhadjyahiaayoub2@gmail.com', NULL, 'sdv', '2017-11-19', '2020-05-04', 'sdv', 'Traitée', 'Service de Vente', 'ds-639918ab1f96d258238548.png'),
(13, 'test', 'egesgw', 'll@email.com', 'file:/C:/Users/dell/Desktop/ds.PNG', 'a', '2022-02-14', '3899-02-01', 'ae', 'Tariteé', 'Service de vente', 'images-639917367e9cf460600526.png'),
(14, 'ghdbh', 'bhx', 'sabri.krima@esprit.tn', NULL, 'sqqsqs', '2018-03-01', NULL, 'azazaz', NULL, 'Service de Vente', NULL),
(15, 'aaaa', 'adzzaza', 'zadadz@esprit.tn', NULL, '94464323', '2018-04-01', '2027-11-17', 'aaaaaaaaaaaaaaaa', 'Traitée', 'Service Article', 'capture-d-ecran-20230222-152540-63fd1a4e251a4344489474.png'),
(16, NULL, NULL, NULL, NULL, NULL, '2018-01-01', NULL, NULL, NULL, 'Service Article', NULL),
(17, NULL, NULL, NULL, NULL, NULL, '2018-01-01', NULL, NULL, NULL, 'Service Article', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `Text` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `idReclamation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `Text`, `status`, `idReclamation`) VALUES
(1, 'zaaz', 'Tariteé', 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`idReclamation`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `idReclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
