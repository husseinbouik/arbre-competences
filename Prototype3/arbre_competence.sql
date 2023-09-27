-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 sep. 2023 à 17:50
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
-- Base de données : `arbre_competence`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `CNE` varchar(11) NOT NULL,
  `Ville_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`Id`, `Nom`, `CNE`, `Ville_Id`) VALUES
(1, 'nickie minaj', 'G627353', 1),
(2, 'hussein bouik', 'G6734', 1),
(3, 'ariana grande', 'G23823', 1),
(4, 'selena gomez', 'G23823', 1),
(5, 'hussein bouik', 'G9587', 1),
(6, 'nickie minaj', 'G9850', 1),
(7, 'selena gomez', 'G984545', 1),
(8, 'Yassmine Daifane', 'G8945', 3),
(9, 'Hussein Bouik', 'G45321', 3),
(10, 'ice spice', 'G56324', 3),
(11, 'olivia rodrigo', 'G456376', 3),
(12, 'nickie minaj', 'G54356', 6),
(13, 'ariana grande', 'GA76Z76', 6),
(14, 'nickie minaj', 'G765376', 5),
(15, 'yasmina seminaa', '', 11),
(16, 'olivia rodrigo', '', 11),
(17, 'yasmina seminaa', '', 11),
(18, 'hussein bouik', '', 11),
(19, 'doja cat', '', 1),
(22, 'ice spice', '', 19),
(23, 'doja cati', '', 12),
(24, 'ice spice', 'P634774', 13),
(25, 'olivia rodrigo', 'P634755', 5),
(26, 'doja cat', 'P634755', 12);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`Id`, `Nom`) VALUES
(1, 'Tetouan'),
(2, 'Tanger'),
(3, 'Casablanca'),
(4, 'Rabat'),
(5, 'Larache'),
(6, 'Khouribga'),
(7, 'El Kelaa des Sraghna'),
(8, 'Khenifra'),
(9, 'Beni Mellal'),
(10, 'Tiznit'),
(11, 'Errachidia'),
(12, 'Taroudant'),
(13, 'Ouarzazate'),
(14, 'Safi'),
(15, 'Lahraouyine'),
(16, 'Berrechid'),
(17, 'Fkih Ben Salah'),
(18, 'Taourirt'),
(19, 'Sefrou'),
(20, 'Youssoufia');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
