-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 jan. 2025 à 16:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamevaultproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`) VALUES
(50);

-- --------------------------------------------------------

--
-- Structure de la table `bannes`
--

CREATE TABLE `bannes` (
  `banne_id` int(11) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `banne_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

CREATE TABLE `bibliotheque` (
  `bib_id` int(11) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `jeu_id` int(11) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`bib_id`, `joueur_id`, `jeu_id`, `add_at`, `image_path`) VALUES
(24, 103, 33, '2025-01-10 15:47:02', 'https://tse3.mm.bing.net/th?id=OIP.ndT6SObDECJ2GF-n6kopFgHaEK');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `jeu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`message_id`, `jeu_id`, `user_id`, `message_content`) VALUES
(1, 35, 103, 'i like this gaos'),
(2, 35, 103, 'i hate this game'),
(3, 34, 103, 'hjhgfds'),
(4, 34, 103, 'xvxc'),
(6, 35, 103, 'cc'),
(7, 34, 103, 'i like this game'),
(8, 34, 103, 'nice');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jeu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `user_id`, `jeu_id`) VALUES
(11, 103, 33),
(12, 103, 34),
(13, 103, 35);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `historique_id` int(11) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `jeu_id` int(11) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`historique_id`, `joueur_id`, `jeu_id`, `add_at`, `image_path`) VALUES
(2, 103, 35, '2025-01-08 20:47:41', 'https://gaming-cdn.com/images/products/8598/orig/graveyard-keeper-game-of-crone-pc-mac-spel-steam-cover.jpg?v=1705327160'),
(3, 103, 34, '2025-01-08 21:00:24', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR099zZbBV8MlQZ1pET96DOEf4HmqYQsNrDlw'),
(4, 103, 33, '2025-01-09 10:13:38', 'https://tse3.mm.bing.net/th?id=OIP.ndT6SObDECJ2GF-n6kopFgHaEK');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `jeu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `nb_joueur` int(11) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `temps_jeu` int(11) DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`jeu_id`, `title`, `description`, `type`, `nb_joueur`, `rating`, `statut`, `temps_jeu`, `date_sortie`, `create_at`) VALUES
(33, 'Free Fire', 'Voluptatem libero se', 'Dolor dolor necessit', 5, 2.00, 'inactif', 24, '1989-11-20', '2025-01-06 10:10:36'),
(34, 'PUPG', 'Vero vero adipisicin', 'Dolore accusantium q', 65, 5.00, 'inactif', 72, '1983-11-08', '2025-01-06 13:40:26'),
(35, 'Graveyard Keeper', 'Corporis et vitae qu', 'Fugit recusandae O', 95, 1.00, 'inactif', 74, '2007-10-12', '2025-01-06 22:17:00');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `joueur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`joueur_id`) VALUES
(103),
(178);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `notation_id` int(11) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `jeu_id` int(11) NOT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notation`
--

INSERT INTO `notation` (`notation_id`, `joueur_id`, `jeu_id`, `rating`, `content`, `create_at`) VALUES
(9, 178, 34, 1.00, '11111111111111111', '2025-01-10 12:18:25'),
(10, 178, 34, 2.00, 'test', '2025-01-10 12:18:33');

-- --------------------------------------------------------

--
-- Structure de la table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` int(11) NOT NULL,
  `jeu_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `screenshots`
--

INSERT INTO `screenshots` (`id`, `jeu_id`, `image_path`) VALUES
(10, 33, 'https://tse3.mm.bing.net/th?id=OIP.ndT6SObDECJ2GF-n6kopFgHaEK&w=266&h=266&c=7'),
(11, 33, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABBVBMVEX///8AAADv7+/8/PyOjo709PQODg4aGhp+fn4mJibr6+sFBQUPDw/j4+MJCQkSEhJwcHAhISGrq6szMzNFRUUqKiqXl5eHh4cWFhZ5eXkdHR1LS0v///u9vb0+Pj40NDTU1NTxnwCdnZ1TU1NeXl5paWlaWlrQ0ND///X5mgD3ngDywnP0x'),
(12, 33, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABBVBMVEX///8AAADv7+/8/PyOjo709PQODg4aGhp+fn4mJibr6+sFBQUPDw/j4+MJCQkSEhJwcHAhISGrq6szMzNFRUUqKiqXl5eHh4cWFhZ5eXkdHR1LS0v///u9vb0+Pj40NDTU1NTxnwCdnZ1TU1NeXl5paWlaWlrQ0ND///X5mgD3ngDywnP0x'),
(13, 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR099zZbBV8MlQZ1pET96DOEf4HmqYQsNrDlw&s'),
(14, 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR099zZbBV8MlQZ1pET96DOEf4HmqYQsNrDlw&s'),
(15, 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR099zZbBV8MlQZ1pET96DOEf4HmqYQsNrDlw&s'),
(16, 35, 'https://gaming-cdn.com/images/products/8598/orig/graveyard-keeper-game-of-crone-pc-mac-spel-steam-cover.jpg?v=1705327160'),
(17, 35, 'https://hb.imgix.net/2ac9164ddc2c9c7ed477d1a4cbc29d1e13521219.jpeg?auto=compress,format&fit=crop&h=353&w=616&s=ac01446758be80ebfb96db0d154d383f'),
(18, 35, 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/08/stardew-vallery-graveyard-keeper.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` enum('admin','joueur') DEFAULT NULL,
  `User_Status` enum('banned','NotBanned') DEFAULT 'NotBanned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `Role`, `User_Status`) VALUES
(50, 'admin                                      ', 'admin@gmail.com', '$2y$10$RIx7TZaVqAnMKmKucCmWB.wPKgFlCd74eTmGJ2IvuZrZMnq0ibw8S', 'admin', 'NotBanned'),
(103, 'adil', 'adil.ait.2003@gmail.com', '$2y$10$QffnU2R/RcU0vKGsY4h8mO3jJGgfM22EhAg5OVczlON0Oq0y0HfBO', 'joueur', 'NotBanned'),
(178, 'ismail', 'ismail@gmail.com', '$2y$10$66/pL10uae8o8AgZFgfx3.XdzELxw8v.XMSvTR79QnUvf80eNE5kG', 'joueur', 'NotBanned');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `bannes`
--
ALTER TABLE `bannes`
  ADD PRIMARY KEY (`banne_id`),
  ADD KEY `joueur_id` (`joueur_id`);

--
-- Index pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD PRIMARY KEY (`bib_id`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `jeu_id` (`jeu_id`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `jeu_id` (`jeu_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jeu_id` (`jeu_id`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`historique_id`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `jeu_id` (`jeu_id`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`jeu_id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`joueur_id`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`notation_id`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `jeu_id` (`jeu_id`);

--
-- Index pour la table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeu_id` (`jeu_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bannes`
--
ALTER TABLE `bannes`
  MODIFY `banne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  MODIFY `bib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `historique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `jeu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `notation`
--
ALTER TABLE `notation`
  MODIFY `notation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bannes`
--
ALTER TABLE `bannes`
  ADD CONSTRAINT `bannes_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`joueur_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD CONSTRAINT `bibliotheque_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`joueur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bibliotheque_ibfk_2` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`jeu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`jeu_id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`jeu_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`joueur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historique_ibfk_2` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`jeu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `notation_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`joueur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notation_ibfk_2` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`jeu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `screenshots`
--
ALTER TABLE `screenshots`
  ADD CONSTRAINT `screenshots_ibfk_1` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`jeu_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
