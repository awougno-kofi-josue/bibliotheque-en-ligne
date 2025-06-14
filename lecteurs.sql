-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 juin 2025 à 16:31
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio_en_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `lecteurs`
--

CREATE TABLE `lecteurs` (
  `Id` int(11) NOT NULL COMMENT 'identifiant du lecteur',
  `nom` varchar(100) NOT NULL COMMENT 'nom du lecteur',
  `prenom` varchar(100) NOT NULL COMMENT 'prenom du lecteur',
  `email` varchar(100) NOT NULL COMMENT 'adresse email du lecteur',
  `mot_de_passe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lecteurs`
--

INSERT INTO `lecteurs` (`Id`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'Kofi', 'Dupont', 'kofidupont@gmail.com', 'Kofi'),


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `lecteurs`
--
ALTER TABLE `lecteurs`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `lecteurs`
--
ALTER TABLE `lecteurs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du lecteur', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
