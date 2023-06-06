-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 jan. 2023 à 20:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_chambre_etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_ADMI` int(11) NOT NULL,
  `NOM` char(20) DEFAULT NULL,
  `PRENOM` char(20) DEFAULT NULL,
  `ADRESSE` char(20) DEFAULT NULL,
  `TELEPHONE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_ADMI`, `NOM`, `PRENOM`, `ADRESSE`, `TELEPHONE`) VALUES
(1, 'Camara', 'Fode', 'Pikine', 786543920),
(2, 'Mboup', 'Mouhamadane', 'poute', 789005643),
(3, 'Souare', 'Aliou', 'Zac Mbao', 765490823),
(4, 'Cisse', 'Absatou', 'Thies', 785466309),
(5, 'Sarr', 'Déthié', 'Almadie', 786543820);

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `ID_BAT` int(11) NOT NULL,
  `NOM` char(20) DEFAULT NULL,
  `LOCALITE` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`ID_BAT`, `NOM`, `LOCALITE`) VALUES
(9, 'Pavillon  A', 'Campus'),
(10, 'Pavillon B', 'Campus'),
(11, 'Pavillon z', 'Campus'),
(12, 'Pavillon j', 'Campus'),
(13, 'Pavillon c', 'Campus');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `ID_CHAMBRE` int(11) NOT NULL,
  `ID_BAT` int(11) NOT NULL,
  `NOM` char(20) DEFAULT NULL,
  `DESCRIPTION` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`ID_CHAMBRE`, `ID_BAT`, `NOM`, `DESCRIPTION`) VALUES
(1, 9, 'Ahhh_Weshh', 'Etat nomal'),
(2, 10, 'Jefe_room', 'A refaire'),
(3, 11, 'Gifted_room', 'Etat nomal'),
(4, 12, 'Les scientifiques', 'Etat normal'),
(5, 13, 'Gestionnaire_room', 'Etat normal');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_ETUDIANT` int(11) NOT NULL,
  `ID_CHAMBRE` int(11) NOT NULL,
  `NOM` char(20) DEFAULT NULL,
  `PRENOM` char(20) DEFAULT NULL,
  `ADRESSE` char(20) DEFAULT NULL,
  `E_MAIL` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_ETUDIANT`, `ID_CHAMBRE`, `NOM`, `PRENOM`, `ADRESSE`, `E_MAIL`) VALUES
(219567, 5, 'Sow', 'Rassoul', 'Castore', 'rassoul@gmail.com'),
(219608, 2, 'Diop', 'Caty', 'Zac mbao', 'rokhayacaty@gmail.co'),
(219635, 3, 'Ndiaye', 'Mareme', 'Mariste', 'geni@gmail.com'),
(219849, 1, 'Cissokho', 'Ta Dabel', 'Mermoz', 'beldacisko2000@gmail'),
(219993, 4, 'Senghore', 'Ben cheikh', 'Dior', 'saer@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_ADMI`);

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`ID_BAT`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`ID_CHAMBRE`),
  ADD KEY `FK_CONTENIR` (`ID_BAT`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID_ETUDIANT`),
  ADD KEY `FK_HABITER` (`ID_CHAMBRE`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `FK_CONTENIR` FOREIGN KEY (`ID_BAT`) REFERENCES `batiment` (`ID_BAT`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_HABITER` FOREIGN KEY (`ID_CHAMBRE`) REFERENCES `chambre` (`ID_CHAMBRE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
