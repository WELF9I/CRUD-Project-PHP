-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 05 déc. 2023 à 20:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `CyberRobot`
--

-- --------------------------------------------------------

--
-- Structure de la table `Emprunt`
--

CREATE TABLE `Emprunt` (
  `idE` int(11) NOT NULL,
  `idEmr` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `dateE` date NOT NULL,
  `heureE` time NOT NULL,
  `dateR` date NOT NULL,
  `heureR` time NOT NULL,
  `duree` varchar(4) DEFAULT NULL,
  `qte` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Emprunteur`
--

CREATE TABLE `Emprunteur` (
  `idEmr` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cin` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Emprunteur`
--

INSERT INTO `Emprunteur` (`idEmr`, `first_name`, `last_name`, `tel`, `email`, `cin`) VALUES
(2, 'Ahmed', 'Omry', '25487963', 'ahmed@gmail.com', '14478630'),
(4, 'Dali', 'Abidi', '73222111', 'welfkimedamine@gmail.com', '22224448'),
(5, 'Mohamed Amine', 'Welfeki', '29051482', 'welfkimedamine@gmail.com', '14478630'),
(6, 'Khaled', 'Abidi', '73222111', 'welfkimedamine@gmail.com', '22224444');

-- --------------------------------------------------------

--
-- Structure de la table `Stock`
--

CREATE TABLE `Stock` (
  `idP` int(11) NOT NULL,
  `piece_name` varchar(20) NOT NULL,
  `qte` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Stock`
--

INSERT INTO `Stock` (`idP`, `piece_name`, `qte`) VALUES
(1, 'Carte Arduino', '9'),
(4, 'Capteur Infrarouge', '9'),
(5, 'Camera	', '11');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `idU` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`idU`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  ADD PRIMARY KEY (`idE`),
  ADD KEY `idEmr` (`idEmr`),
  ADD KEY `idP` (`idP`);

--
-- Index pour la table `Emprunteur`
--
ALTER TABLE `Emprunteur`
  ADD PRIMARY KEY (`idEmr`);

--
-- Index pour la table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`idP`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`idU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Emprunteur`
--
ALTER TABLE `Emprunteur`
  MODIFY `idEmr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Emprunt`
--
ALTER TABLE `Emprunt`
  ADD CONSTRAINT `Emprunt_ibfk_1` FOREIGN KEY (`idEmr`) REFERENCES `Emprunteur` (`idEmr`),
  ADD CONSTRAINT `Emprunt_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `Stock` (`idP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
