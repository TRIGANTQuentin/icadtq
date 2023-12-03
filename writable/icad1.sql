-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 déc. 2023 à 21:07
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `icad1`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `ID_ICAD` int(11) NOT NULL,
  `ID_UTILISATEUR` int(2) NOT NULL,
  `ID_PROPRIO` int(11) NOT NULL,
  `NOM_ANIMAL` varchar(50) NOT NULL,
  `DATE_NAISSANCE_ANIMAL` date NOT NULL,
  `RACE_ANIMAL` varchar(50) NOT NULL,
  `ESPECE_ANIMAL` int(50) NOT NULL,
  `SEXE_ANIMAL` int(50) NOT NULL,
  `INFO_ANIMAL` varchar(150) NOT NULL,
  `IS_PERDU_ANIMAL` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`ID_ICAD`, `ID_UTILISATEUR`, `ID_PROPRIO`, `NOM_ANIMAL`, `DATE_NAISSANCE_ANIMAL`, `RACE_ANIMAL`, `ESPECE_ANIMAL`, `SEXE_ANIMAL`, `INFO_ANIMAL`, `IS_PERDU_ANIMAL`) VALUES
(10, 3, 3, 'John', '2023-12-01', 'Mastiff', 2, 1, ' Tâches rousses sur le dos. ', 1),
(11, 3, 3, 'Jack', '2023-12-01', 'Pixie-bob', 1, 1, 'Je me calme...', 0),
(12, 3, 8, 'Bug', '2023-11-01', 'Zibeline', 3, 1, 'Il court vite !', 0);

--
-- Déclencheurs `animal`
--
DELIMITER $$
CREATE TRIGGER `after_insert_animal` AFTER INSERT ON `animal` FOR EACH ROW BEGIN
INSERT INTO log_animal(ID_ICAD, NOM_ANIMAL, DATE_NAISSANCE_ANIMAL, ESPECE_ANIMAL, SEXE_ANIMAL, RACE_ANIMAL, INFO_ANIMAL, ID_PROPRIO, ID_UTILISATEUR, TYPE_ACTION) 
VALUES ( NEW.ID_ICAD, NEW.NOM_ANIMAL, NEW.DATE_NAISSANCE_ANIMAL, NEW.ESPECE_ANIMAL, NEW.SEXE_ANIMAL, NEW.RACE_ANIMAL, NEW.INFO_ANIMAL, NEW.ID_PROPRIO, NEW.ID_UTILISATEUR, "Ajout");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_animal` AFTER UPDATE ON `animal` FOR EACH ROW BEGIN
INSERT INTO log_animal(ID_ICAD, NOM_ANIMAL, DATE_NAISSANCE_ANIMAL, ESPECE_ANIMAL, SEXE_ANIMAL, RACE_ANIMAL, INFO_ANIMAL, ID_PROPRIO, ID_UTILISATEUR, TYPE_ACTION, IS_PERDU_ANIMAL) 
VALUES ( NEW.ID_ICAD, NEW.NOM_ANIMAL, NEW.DATE_NAISSANCE_ANIMAL, NEW.ESPECE_ANIMAL, NEW.SEXE_ANIMAL, NEW.RACE_ANIMAL, NEW.INFO_ANIMAL, NEW.ID_PROPRIO, NEW.ID_UTILISATEUR, "Modification", NEW.IS_PERDU_ANIMAL);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `declarer_retrouve_animal`
--

CREATE TABLE `declarer_retrouve_animal` (
  `ID_RETROUVE` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL,
  `EMAIL_DEMANDE` varchar(100) NOT NULL,
  `TELEPHONE_DEMANDE` int(10) NOT NULL,
  `DATE_RETROUVE` datetime NOT NULL DEFAULT current_timestamp(),
  `INFORMATIONS_SUPPLEMENTAIRES` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `declarer_retrouve_animal`
--

INSERT INTO `declarer_retrouve_animal` (`ID_RETROUVE`, `ID_ANIMAL`, `EMAIL_DEMANDE`, `TELEPHONE_DEMANDE`, `DATE_RETROUVE`, `INFORMATIONS_SUPPLEMENTAIRES`, `IMAGE`) VALUES
(2, 12, 'animal@retrouve.com', 987678789, '2023-12-03 20:59:39', 'C\'est un chat avec un numéro ICAD 12 sur son collier.', '');

-- --------------------------------------------------------

--
-- Structure de la table `espece_animal`
--

CREATE TABLE `espece_animal` (
  `ID_ESPECE` int(11) NOT NULL,
  `NOM_ESPECE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `espece_animal`
--

INSERT INTO `espece_animal` (`ID_ESPECE`, `NOM_ESPECE`) VALUES
(1, 'Chat'),
(2, 'Chien'),
(3, 'Furet');

-- --------------------------------------------------------

--
-- Structure de la table `log_animal`
--

CREATE TABLE `log_animal` (
  `id` int(11) NOT NULL,
  `DATE_NAISSANCE_ANIMAL` date NOT NULL,
  `ESPECE_ANIMAL` int(11) NOT NULL,
  `ID_PROPRIO` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `ID_ICAD` int(11) NOT NULL,
  `INFO_ANIMAL` varchar(100) NOT NULL,
  `NOM_ANIMAL` varchar(100) NOT NULL,
  `SEXE_ANIMAL` int(11) NOT NULL,
  `RACE_ANIMAL` varchar(100) NOT NULL,
  `DATE_ACTION` datetime NOT NULL DEFAULT current_timestamp(),
  `TYPE_ACTION` varchar(100) NOT NULL,
  `IS_PERDU_ANIMAL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `log_animal`
--

INSERT INTO `log_animal` (`id`, `DATE_NAISSANCE_ANIMAL`, `ESPECE_ANIMAL`, `ID_PROPRIO`, `ID_UTILISATEUR`, `ID_ICAD`, `INFO_ANIMAL`, `NOM_ANIMAL`, `SEXE_ANIMAL`, `RACE_ANIMAL`, `DATE_ACTION`, `TYPE_ACTION`, `IS_PERDU_ANIMAL`) VALUES
(15, '2023-12-01', 2, 3, 3, 10, 'Tâches rousses sur le dos.', 'John', 1, 'Mastiff', '2023-12-03 12:28:40', 'Ajout', 0),
(16, '2023-12-01', 2, 3, 3, 10, 'Tâches rousses sur le dos.', 'John', 1, 'Mastiff', '2023-12-03 12:31:05', 'Modification', 0),
(17, '2023-12-01', 1, 3, 3, 11, 'Se fâche très fréquemment !', 'Jack', 1, 'Pixie-bob', '2023-12-03 12:33:49', 'Ajout', 0),
(18, '2023-12-01', 1, 3, 3, 11, 'Se fâche très fréquemment !', 'Jack', 1, 'Pixie-bob', '2023-12-03 12:35:42', 'Modification', 0),
(19, '2023-12-01', 1, 3, 3, 11, ' Se fâche très fréquemment ! ', 'Jack', 1, 'Pixie-bob', '2023-12-03 12:44:28', 'Modification', 0),
(20, '2023-12-01', 2, 3, 3, 11, 'Se fâche très fréquemment ! Mais je l\'adore ! ', 'Jack', 1, 'Pixie-bob', '2023-12-03 12:45:58', 'Modification', 0),
(21, '2023-12-01', 1, 3, 3, 10, ' Tâches rousses sur le dos. ', 'John', 1, 'Mastiff', '2023-12-03 14:37:04', 'Modification', 1),
(22, '2023-11-01', 3, 8, 3, 12, 'Il court vite !', 'Bug', 1, 'Zibeline', '2023-12-03 18:05:10', 'Ajout', 0),
(23, '2023-11-01', 1, 8, 3, 12, 'Il court vite !', 'Bug', 1, 'Zibeline', '2023-12-03 18:06:04', 'Modification', 0),
(24, '2023-12-01', 1, 3, 3, 11, 'Je me calme...', 'Jack', 1, 'Pixie-bob', '2023-12-03 18:33:45', 'Modification', 0),
(25, '2023-11-01', 3, 8, 3, 12, 'Il court vite !', 'Bug', 1, 'Zibeline', '2023-12-03 18:33:51', 'Modification', 0),
(26, '2023-12-01', 2, 3, 3, 10, ' Tâches rousses sur le dos. ', 'John', 1, 'Mastiff', '2023-12-03 18:33:58', 'Modification', 1);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `ID_PROPRIO` int(2) NOT NULL,
  `EMAIL_PROPRIO` varchar(100) NOT NULL,
  `NO_TELEPHONE_PROPRIO` int(100) NOT NULL,
  `NOM_PROPRIO` varchar(100) NOT NULL,
  `PRENOM_PROPRIO` varchar(100) NOT NULL,
  `VILLE_PROPRIO` varchar(100) NOT NULL,
  `ADRESSE_PROPRIO` varchar(100) NOT NULL,
  `CP_PROPRIO` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`ID_PROPRIO`, `EMAIL_PROPRIO`, `NO_TELEPHONE_PROPRIO`, `NOM_PROPRIO`, `PRENOM_PROPRIO`, `VILLE_PROPRIO`, `ADRESSE_PROPRIO`, `CP_PROPRIO`) VALUES
(3, 'propri@gmail.com', 987654321, 'Prop', 'Rio', 'Paris', '', 75000),
(6, 'validation@mail.com', 789908990, 'Jack', 'Kcaj', 'Paris', '', 75000),
(7, 'yoyo@gmail.com', 115218037, 'oyoy', 'yoyo', 'Vigneux-sur-seine', '24 Place du Jeu de Paum', 91270),
(8, 'robertmiaou@gmail.com', 776671234, 'Miaou', 'Robert', 'Thionville', ' 24 rue du Faubourg National', 57100);

-- --------------------------------------------------------

--
-- Structure de la table `sexe_animal`
--

CREATE TABLE `sexe_animal` (
  `NOM_SEXE` varchar(50) NOT NULL,
  `ID_SEXE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sexe_animal`
--

INSERT INTO `sexe_animal` (`NOM_SEXE`, `ID_SEXE`) VALUES
('Masculin', 1),
('Feminin', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTILISATEUR` int(2) NOT NULL,
  `EMAIL_UTILISATEUR` varchar(200) NOT NULL,
  `NO_TELEPHONE_UTILISATEUR` int(100) NOT NULL,
  `NOM_UTILISATEUR` varchar(100) NOT NULL,
  `PRENOM_UTILISATEUR` varchar(100) NOT NULL,
  `VILLE_UTILISATEUR` varchar(100) NOT NULL,
  `ADRESSE_UTILISATEUR` varchar(100) NOT NULL,
  `CP_UTILISATEUR` int(100) NOT NULL,
  `FONCTION_UTILISATEUR` varchar(100) NOT NULL,
  `MDP_HASH_UTILISATEUR` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `EMAIL_UTILISATEUR`, `NO_TELEPHONE_UTILISATEUR`, `NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`, `VILLE_UTILISATEUR`, `ADRESSE_UTILISATEUR`, `CP_UTILISATEUR`, `FONCTION_UTILISATEUR`, `MDP_HASH_UTILISATEUR`) VALUES
(3, 'test@test.fr', 123456789, 'Testeur', 'Test', 'Paris', 'Musée du Louvre', 75000, 'Fourrière', '$2y$10$WHNcm0cFoNu8CvUXgPICTeEGWGwGKT3ZW4vw4tnpx1J4TUww9L.ru');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ID_ICAD`),
  ADD KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`),
  ADD KEY `ID_PROPRIO` (`ID_PROPRIO`),
  ADD KEY `SEXE_ANIMAL` (`SEXE_ANIMAL`),
  ADD KEY `ESPECE_ANIMAL` (`ESPECE_ANIMAL`);

--
-- Index pour la table `declarer_retrouve_animal`
--
ALTER TABLE `declarer_retrouve_animal`
  ADD PRIMARY KEY (`ID_RETROUVE`);

--
-- Index pour la table `espece_animal`
--
ALTER TABLE `espece_animal`
  ADD PRIMARY KEY (`ID_ESPECE`);

--
-- Index pour la table `log_animal`
--
ALTER TABLE `log_animal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`ID_PROPRIO`);

--
-- Index pour la table `sexe_animal`
--
ALTER TABLE `sexe_animal`
  ADD PRIMARY KEY (`ID_SEXE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTILISATEUR`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `ID_ICAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `declarer_retrouve_animal`
--
ALTER TABLE `declarer_retrouve_animal`
  MODIFY `ID_RETROUVE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `espece_animal`
--
ALTER TABLE `espece_animal`
  MODIFY `ID_ESPECE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `log_animal`
--
ALTER TABLE `log_animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `ID_PROPRIO` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sexe_animal`
--
ALTER TABLE `sexe_animal`
  MODIFY `ID_SEXE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTILISATEUR` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`ID_PROPRIO`) REFERENCES `proprietaire` (`ID_PROPRIO`),
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`SEXE_ANIMAL`) REFERENCES `sexe_animal` (`ID_SEXE`),
  ADD CONSTRAINT `animal_ibfk_4` FOREIGN KEY (`ESPECE_ANIMAL`) REFERENCES `espece_animal` (`ID_ESPECE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
