-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql4.freemysqlhosting.net
-- Généré le :  lun. 01 nov. 2021 à 14:05
-- Version du serveur :  5.5.54-0ubuntu0.12.04.1
-- Version de PHP :  7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sql4448173`
--

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

CREATE TABLE `attestation` (
  `idAttestation` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idConvention` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `convention`
--

CREATE TABLE `convention` (
  `idConvention` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nbHeur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `convention`
--

INSERT INTO `convention` (`idConvention`, `nom`, `nbHeur`) VALUES
(1, 'Convention numéro  1', 51),
(2, 'Convention numero 2', 60),
(3, 'Convention numéro 3', 65),
(4, 'Convention numéro 4', 62),
(5, 'Convention numéro  5', 66);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int(10) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `idConvention` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `nom`, `prenom`, `mail`, `idConvention`) VALUES
(1, 'Garza', 'Calista ', 'gcalista@gmail.com', 1),
(2, 'Callahan', 'Reggie ', 'creggie@gmail.com', 2),
(3, 'Sybille', 'Léonie', 'Sleonie@gmail.com', 3),
(4, 'Yoan', 'Jocelyn', 'Yjocelyn@gmail.com', 4),
(5, 'Soline', 'Adolphe', 'SAdolphe@gmail.com', 5),
(6, 'Richard', 'Anselme', 'Ranselme@gmail.com', 2),
(7, 'Jonathan', 'Jade', 'Jjade@gmail.com', 4),
(8, 'Jason', 'Thierry', 'Tcoraline@gmail.com', 5),
(9, 'Elsiabeth', 'Céline', 'Eceline@gmail.com', 2),
(10, 'Francois', 'Vicent', 'Fvincent@gmail.com', 5),
(11, 'Solange', 'Candide', 'Scandide@gmail.com', 1),
(12, 'Louis', 'Sylvain', 'Slouis@gmail.com', 2),
(13, 'Sévère', 'Zénaide', 'SZenaide@gmail.com', 3),
(14, 'Elisabeth', 'Simonne', 'ESimonne@gmail.com', 2),
(15, 'Nicolas', 'Flore', 'Nflore@gmail.com', 3),
(16, 'Honorine', 'Alex', 'HAlex@gmail.com', 4),
(17, 'Jourdain', 'Samson', 'JSamson@gmail.com', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`idAttestation`),
  ADD KEY `fk_foreign_key_etudiant` (`idEtudiant`),
  ADD KEY `fk_foreign_key_convention` (`idConvention`);

--
-- Index pour la table `convention`
--
ALTER TABLE `convention`
  ADD PRIMARY KEY (`idConvention`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD KEY `fk_foreign_key_convention` (`idConvention`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `idAttestation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `convention`
--
ALTER TABLE `convention`
  MODIFY `idConvention` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
