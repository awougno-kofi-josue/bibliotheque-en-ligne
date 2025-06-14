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
-- Structure de la table `liste_lecture`
--

CREATE TABLE `liste_lecture` (
  `id_livre` int(11) NOT NULL COMMENT 'identifiant du livre lié à cette entrée',
  `id_lecteur` int(11) NOT NULL COMMENT 'identifiant du lecteur lié à cette entrée',
  `date_emprunt` date NOT NULL COMMENT 'date d''emprunt du livre',
  `date_retour` date NOT NULL COMMENT 'date de retour du livre', 
  FOREIGN KEY (id_livre) REFERENCES livres(id),
  FOREIGN KEY (id_lecteur) REFERENCES lecteurs(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liste_lecture`
--

INSERT INTO `liste_lecture` (`id_livre`, `id_lecteur`, `date_emprunt`, `date_retour`) VALUES
(0, 1, '2025-06-14', '0000-00-00'),
(1011, 1, '2025-06-14', '0000-00-00'),
(1012, 1, '2025-06-14', '0000-00-00'),
(1015, 1, '2025-06-14', '0000-00-00'),
(1022, 1, '2025-06-10', '2025-06-20'),
(1023, 1, '2025-06-11', '2025-06-21'),
(1024, 1, '2025-06-12', '2025-06-22'),
(1025, 1, '2025-06-13', '2025-06-23'),
(1026, 1, '2025-06-14', '2025-06-24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `liste_lecture`
--
ALTER TABLE `liste_lecture`
  ADD PRIMARY KEY (`id_livre`,`id_lecteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
