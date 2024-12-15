-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 15 déc. 2024 à 18:16
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
-- Base de données : `bd_hk`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `montant` float NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `numero_facture` varchar(255) NOT NULL,
  `code_facture` int(11) NOT NULL,
  `portable` varchar(255) NOT NULL,
  `date_paye` date NOT NULL,
  `etat` int(11) NOT NULL,
  `etat_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`id`, `id_produit`, `agent`, `produit`, `second_name`, `prix`, `montant`, `quantite`, `categorie`, `client`, `numero_facture`, `code_facture`, `portable`, `date_paye`, `etat`, `etat_f`) VALUES
(32, 6, 'ycee', 'Blackooo', 'pondu vert', 150, 1500, '10', 'Burger', 'Blacko lil', 'Hkc/20241215/010', 10, '+243811235211', '2024-12-15', 1, 1),
(33, 5, 'ycee', 'pondu', 'pondu vert', 150, 1500, '10', 'Sandwich', 'Blacko lil', 'Hkc/20241215/010', 10, '+243811235211', '2024-12-15', 1, 1),
(34, 5, 'ycee', 'pondu', 'pondu vert', 150, 1500, '10', 'Sandwich', 'Gigi', 'Hkc/20241215/011', 11, '243831103120', '2024-12-15', 1, 1),
(35, 5, 'ycee', 'pondu', 'pondu vert', 150, 300, '2', 'Sandwich', 'Ycee', 'Hkc/20241215/012', 12, '+243811235211', '2024-12-15', 1, 1),
(36, 4, 'ycee', 'Saucisse', 'real bad maan', 400, 3600, '9', 'Sandwich', 'iman', 'Hkc/20241215/013', 13, '0900000000', '2024-12-15', 1, 2),
(37, 8, 'ycee', 'tacos poulet', 'real bad maan', 400, 3600, '9', 'Burger', 'iman', 'Hkc/20241215/013', 13, '0900000000', '2024-12-15', 1, 2),
(38, 6, 'Admin', 'Blackooo', 'pondu vert', 150, 1500, '10', 'Burger', 'GAd', 'Hkc/20241215/014', 14, '0831103120', '2024-12-15', 1, 1),
(39, 5, 'Admin', 'pondu', 'pondu vert', 150, 1500, '10', 'Sandwich', 'GAd', 'Hkc/20241215/014', 14, '0831103120', '2024-12-15', 1, 1),
(40, 5, 'Admin', 'pondu', 'pondu vert', 150, 1500, '10', 'Sandwich', 'GAd', 'Hkc/20241215/015', 15, '0831103120', '2024-12-15', 1, 2),
(41, 5, 'Admin', 'pondu', 'pondu vert', 150, 2850, '19', 'Sandwich', 'ny', 'Hkc/20241215/016', 16, '08122222220', '2024-12-15', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `code_facture`
--

CREATE TABLE `code_facture` (
  `id` int(11) NOT NULL,
  `code_facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `code_facture`
--

INSERT INTO `code_facture` (`id`, `code_facture`) VALUES
(1, 16);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `date_ajout` date NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `produit`, `second_name`, `prix`, `categorie`, `date_ajout`, `etat`) VALUES
(4, 'Saucisse', 'real bad maan', 400, 'Sandwich', '2024-12-12', 0),
(5, 'pondu', 'pondu vert', 150, 'Sandwich', '2024-12-12', 0),
(6, 'Blackooo', 'pondu vert', 150, 'Burger', '2024-12-12', 0),
(8, 'tacos poulet', 'real bad maan', 400, 'Burger', '2024-12-15', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `date_ajout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fonction`, `tel`, `date_ajout`) VALUES
(2, 'Guerchom', '243831103120', 'Caissiere', '0831103120', '2024-12-12'),
(3, 'Dixneuf', '667667', 'Caissiere', '0810015922', '2024-12-12'),
(4, 'Admin', '667667', 'Administrateur', '0831103120', '2024-12-12'),
(5, 'ycee', '151515', 'Comptable', '0810015922', '2024-12-12'),
(6, 'Blacko18', '12345', 'Administrateur', '0824322343', '2024-12-15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code_facture`
--
ALTER TABLE `code_facture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `code_facture`
--
ALTER TABLE `code_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
