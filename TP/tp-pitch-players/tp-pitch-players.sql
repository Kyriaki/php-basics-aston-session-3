-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 07 Décembre 2016 à 12:21
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `tp-pitch-players`
--

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

CREATE TABLE `match` (
`id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
`id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `player`
--

INSERT INTO `player` (`id`, `lastname`, `firstname`, `number`) VALUES
(1, 'Kautzmann', 'Jean-Etienne', 5),
(2, 'Bartos', 'Jean-Sébastien', 2),
(3, 'Matschinsky', 'Stephan', 3),
(4, 'Troadec', 'Yannick', 6),
(5, 'Jacesky', 'Milos', 4),
(6, 'Sopoo', 'Jimmy', 1),
(7, 'Seger', 'Alexander', 1),
(8, 'Dufour', 'Christophe', 10),
(9, 'Campos', 'Abel', 7),
(10, 'Quesada', 'Santiage', 9),
(11, 'Chetwynd', 'Hugh', 2),
(12, 'Sayde', 'Nicolas', 4),
(13, 'Akca', 'Gokhan', 11),
(14, 'Dolidze', 'David', 9),
(15, 'Frunza', 'Alexandru', 9),
(16, 'Pascot', 'Gilbert', 8),
(17, 'Pascot', 'Matteo', 11),
(18, 'Mutaf', 'Hassan', 3),
(19, 'Berciaud', 'Stéphane', 7),
(20, 'Bissoni', 'Toni', 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `match`
--
ALTER TABLE `match`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `match`
--
ALTER TABLE `match`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;