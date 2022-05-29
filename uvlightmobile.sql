-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 avr. 2022 à 14:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uvlightmobile`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `nomclient` varchar(256) NOT NULL,
  `mdp` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `nomclient`, `mdp`, `created_at`, `updated_at`) VALUES
(1, 'Geraud', 'test', '2019-06-01 00:32:07', '2019-08-30 15:34:33'),
(2, 'Géraud', 'test2', '2018-06-03 02:34:11', '2019-01-30 16:34:33'),
(6, 'null', 'null', '2018-06-01 10:33:07', '2019-01-08 12:27:47');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idcom` int(11) NOT NULL,
  `nomcom` varchar(32) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `idclient` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idcom`, `nomcom`, `prix`, `idclient`, `commentaire`, `created_at`, `updated_at`) VALUES
(1, 'commanden°1', '899', 1, 'commentaire', '2019-09-07 21:19:09', '2019-09-07 19:19:09'),
(2, 'commande 2', '899', 2, 'commentaire', '2019-09-07 21:21:11', '2019-09-07 19:21:11'),
(67, 'c la commande 4', '65', 6, 'kjsdbcbfcsubgcgbucqe', '2019-09-07 21:21:11', '2019-09-07 19:21:11'),
(68, 'c la commande 5', '65', 6, 'aaaaaaaaaaaaaaaaahhhhhhhhhhhhhhh', '2019-09-07 21:21:11', '2019-09-07 19:21:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `client_id` (`idclient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
