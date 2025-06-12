-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 juin 2025 à 20:04
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
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `Id` int(11) NOT NULL COMMENT 'identifiant du livre',
  `titre` varchar(100) NOT NULL COMMENT 'Titre du livre',
  `auteur` varchar(100) NOT NULL COMMENT 'Auteur du livre',
  `description` text NOT NULL COMMENT 'description du livre',
  `maison_edition` varchar(100) NOT NULL COMMENT 'Maison d''edition du livre',
  `nombre_exemplaire` int(11) NOT NULL COMMENT 'Nombre d''exemplaire disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`Id`, `titre`, `auteur`, `description`, `maison_edition`, `nombre_exemplaire`) VALUES
(1010, 'Le monde s\'effondre', 'Chinua Achebe', 'Dans le village igbo d\'Umuofia, Okonkwo est un homme respecté pour sa force et son courage. Cependant, l\'arrivée des colons européens et des missionnaires bouleverse l\'ordre établi. Ce roman poignant explore la collision entre tradition africaine et modernité imposée par l\'Occident.', 'Présence Africaine', 10),
(1011, 'La Flèche de Dieu', 'Chinua Achebe', 'Ezeulu, prêtre suprême d\'une divinité igbo, se retrouve tiraillé entre son rôle sacré et l\'arrivée de nouvelles croyances religieuses et politiques. Achebe explore ici les tensions entre autorité spirituelle et colonialisme dans une société en mutation.', 'Présence Africaine', 7),
(1012, 'L\'Enfant noir', 'Camara Laye', 'Récit autobiographique d\'un jeune garçon guinéen, ce roman évoque avec émotion les souvenirs d\'enfance, les rites traditionnels, et le passage à l\'âge adulte, entre valeurs africaines et éducation occidentale.', 'Plon', 12),
(1013, 'Le Regard du roi', 'Camara Laye', 'Conte symbolique et mystique, ce roman interroge l\'identité africaine à travers un voyage initiatique. Le héros, un jeune homme sans nom, traverse une série d\'épreuves dans un royaume mystérieux sous le regard énigmatique du roi.', 'Plon', 8),
(1014, 'Sous l\'orage', 'Seidou Badian', 'Dans une Afrique en mutation, Fama, un jeune homme instruit, doit choisir entre la tradition et les valeurs modernes. À travers ce conflit générationnel, Badian dresse un portrait vibrant de la société malienne d\'avant l’indépendance.', 'Nouvelles Éditions Africaines', 6),
(1015, 'Les Dirigeants africains face à leur peuple', 'Seidou Badian', 'Essai politique critique, ce livre analyse les responsabilités des élites africaines après les indépendances. Badian y dénonce les dérives du pouvoir et appelle à une gouvernance éclairée et responsable.', 'NEA', 5),
(1016, 'La Saison des pièges', 'Seidou Badian', 'Roman engagé où se mêlent trahison, ambition et quête de justice dans un contexte africain marqué par la lutte pour la démocratie. L\'auteur y explore les pièges du pouvoir et les luttes internes des sociétés postcoloniales.', 'NEA', 4),
(1017, 'Les Misérables', 'Victor Hugo', 'Fresque monumentale du XIXe siècle, ce roman suit la rédemption de Jean Valjean, ancien forçat, à travers un monde injuste. À travers les destins croisés de nombreux personnages, Hugo explore la misère, la justice, et la révolte.', 'Gallimard', 9),
(1018, 'Notre-Dame de Paris', 'Victor Hugo', 'Plongé dans le Paris médiéval, ce roman tragique met en scène Quasimodo, Esméralda et le juge Frollo autour de la cathédrale Notre-Dame. À travers leur drame, Hugo critique la société et exalte le génie architectural gothique.', 'Gallimard', 6),
(1019, 'Germinal', 'Emile Zola', 'Chef-d’œuvre du naturalisme, ce roman dépeint avec intensité la vie des mineurs du nord de la France et leur lutte contre l\'injustice sociale. Étienne Lantier incarne la révolte ouvrière face à la misère et à l\'exploitation.', 'Le Livre de Poche', 10),
(1020, 'L\'Assommoir', 'Emile Zola', 'À travers le destin tragique de Gervaise, blanchisseuse à Paris, Zola montre les ravages de l\'alcoolisme, de la pauvreté et de l\'exclusion dans les milieux populaires. Un roman dur, mais profondément humain.', 'Flammarion', 7),
(1021, 'La Bête humaine', 'Emile Zola', 'Dans un univers ferroviaire troublé, Zola explore les instincts violents, les passions destructrices et les hérédités criminelles. Ce thriller psychologique interroge la nature humaine dans sa part la plus obscure.', 'Flammarion', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant du livre', AUTO_INCREMENT=1022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
