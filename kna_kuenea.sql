-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 15 juin 2018 à 08:32
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kna_kuenea`
--

-- --------------------------------------------------------

--
-- Structure de la table `kna_annonceur`
--

CREATE TABLE `kna_annonceur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(16) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image2` text NOT NULL,
  `password` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_annonceur`
--

INSERT INTO `kna_annonceur` (`id`, `pseudo`, `nom`, `adresse`, `description`, `categorie`, `ville`, `image`, `image2`, `password`, `breaked`, `created_at`) VALUES
(1, 'ann1', 'Afrika Numerik', 'Avenue Kasai Numero 123, C/Lubumbashi', 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', 'Super marche', 'Lubumbashi', 'afrikanumerik.jpg', 'afrikanumerik.jpg\r\n', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, '2018-04-25'),
(2, 'Adrienne12', 'Bussness Company', 'Likasi, Avenue DE la Mines', 'Nous SOMMES UNE grANDE ENTREPRISE ET NOUS OEUVRONS DANS LA VENTES DE MATERIAUX', 'Super marche', 'Lubumbashi', 'afrikanumerik.jpg', 'afrikanumerik.jpg\r\n', '1234567', 0, '2018-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `kna_article`
--

CREATE TABLE `kna_article` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `image` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `kna_code`
--

CREATE TABLE `kna_code` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `code` text NOT NULL,
  `link` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_code`
--

INSERT INTO `kna_code` (`id`, `id_membre`, `code`, `link`, `created_at`) VALUES
(1, 9, 'default', '', '2018-05-04'),
(2, 10, '9dePsBUuQwNuBXdL', '', '2018-05-11'),
(3, 11, 'xPvhDiFMDPTgziwp', '', '2018-05-23'),
(4, 13, 'LngLyR4y5zffAjhN', 'http://127.0.0.1/kuenea/index.php?p=request&id=c51ce410c124a10e0db5e4b97fc2af39&pseudo=Maguy1232&tel=243801234567&token=a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '2018-05-23'),
(5, 15, 'nUE88xCxTKrmoiRz', 'http://127.0.0.1/kuenea/index.php?p=request&id=9bf31c7ff062936a96d3c8bd1f8f2ff3&pseudo=AA116&tel=243801234567&token=a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '2018-05-24');

-- --------------------------------------------------------

--
-- Structure de la table `kna_compte`
--

CREATE TABLE `kna_compte` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `somme` int(11) NOT NULL DEFAULT '0',
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_compte`
--

INSERT INTO `kna_compte` (`id`, `id_membre`, `somme`, `breaked`, `created_at`) VALUES
(1, 1, 7, 0, '2018-04-18'),
(2, 3, 28, 0, '2018-04-23'),
(3, 7, 0, 0, '2018-05-04'),
(4, 8, 0, 0, '2018-05-04'),
(5, 9, 0, 0, '2018-05-04'),
(6, 10, 0, 0, '2018-05-11'),
(7, 11, 0, 0, '2018-05-23'),
(8, 12, 0, 0, '2018-05-23'),
(9, 13, 0, 0, '2018-05-23'),
(10, 14, 0, 0, '2018-05-24'),
(11, 15, 0, 0, '2018-05-24');

-- --------------------------------------------------------

--
-- Structure de la table `kna_contact`
--

CREATE TABLE `kna_contact` (
  `id` int(11) NOT NULL,
  `id_annonceur` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_contact`
--

INSERT INTO `kna_contact` (`id`, `id_annonceur`, `contact`, `type`, `breaked`, `created_at`) VALUES
(1, 1, '+234 99 788 33', 'telephone', 0, '2018-04-03'),
(2, 1, '+234 80 438 56', 'telephone', 0, '2018-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `kna_espace`
--

CREATE TABLE `kna_espace` (
  `id` int(11) NOT NULL,
  `id_page` text NOT NULL,
  `id_membre` int(11) NOT NULL,
  `nb_vue` int(11) NOT NULL DEFAULT '0',
  `som_page` double NOT NULL DEFAULT '0',
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_espace`
--

INSERT INTO `kna_espace` (`id`, `id_page`, `id_membre`, `nb_vue`, `som_page`, `breaked`, `created_at`) VALUES
(11, 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 0, 0, '2018-06-04 15:40:12'),
(12, 'c81e728d9d4c2f636f067f89cc14862c', 1, 0, 0, 0, '2018-06-05 11:47:44');

-- --------------------------------------------------------

--
-- Structure de la table `kna_image`
--

CREATE TABLE `kna_image` (
  `id` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `image` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_image`
--

INSERT INTO `kna_image` (`id`, `id_page`, `image`, `breaked`, `created_at`) VALUES
(1, 1, 'afrikanumerik.jpg', 0, '2018-04-27'),
(2, 1, 'afrikanumerik.jpg', 0, '2018-04-27'),
(3, 1, 'afrikanumerik.jpg', 0, '2018-04-27'),
(4, 2, 'afrikanumerik.jpg', 0, '2018-04-30'),
(5, 2, 'afrikanumerik.jpg', 0, '2018-04-30'),
(6, 2, 'afrikanumerik.jpg', 0, '2018-06-01');

-- --------------------------------------------------------

--
-- Structure de la table `kna_image_p`
--

CREATE TABLE `kna_image_p` (
  `id` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `image` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_image_p`
--

INSERT INTO `kna_image_p` (`id`, `id_promotion`, `image`, `breaked`, `created_at`) VALUES
(1, 1, 'afrikanumerik.jpg', 0, '2018-06-02');

-- --------------------------------------------------------

--
-- Structure de la table `kna_membre`
--

CREATE TABLE `kna_membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `activited` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_membre`
--

INSERT INTO `kna_membre` (`id`, `nom`, `pseudo`, `telephone`, `password`, `breaked`, `activited`, `created_at`) VALUES
(1, 'MBUYA', 'admm', '+243974831221', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 1, '2018-04-10'),
(2, 'Alfanumerik', 'admm1', '243974831221', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 1, '2018-04-10'),
(3, 'Adrien', 'admm12', '+243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 1, '2018-04-18'),
(4, 'Adrien', 'admm123', '+243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-04-18'),
(5, 'Adrien', 'admm1234', '+243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-04-18'),
(6, 'dddd', 'adrien', '+243974831221', 'd36da3e6884f6d1e9e7983ff13e99cf5c8f5745a', 0, 0, '2018-04-23'),
(7, 'sd', 'S11111', '+243974831221', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-04'),
(8, 'sd', 'S111115', '+243974831221', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-04'),
(9, 'sd', 'S111119', '+243974831221', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-04'),
(10, 'Mujinga', 'Maguy', '+243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-11'),
(11, 'Mujinga', 'Maguy123', '243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-23'),
(12, 'Mujinga', 'Maguy1233', '243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-23'),
(13, 'Mujinga', 'Maguy1232', '243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 1, '2018-05-23'),
(14, 'a', 'AA111', '243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 0, '2018-05-24'),
(15, 'a', 'AA116', '243801234567', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', 0, 1, '2018-05-24');

-- --------------------------------------------------------

--
-- Structure de la table `kna_owner`
--

CREATE TABLE `kna_owner` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `kna_page`
--

CREATE TABLE `kna_page` (
  `id` int(20) NOT NULL,
  `id_annonceur` int(20) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `prix_page` int(11) NOT NULL,
  `nb_max` int(11) NOT NULL,
  `nb_vues` int(11) NOT NULL,
  `nb_share` int(11) NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_page`
--

INSERT INTO `kna_page` (`id`, `id_annonceur`, `titre`, `description`, `date_debut`, `date_fin`, `prix_page`, `nb_max`, `nb_vues`, `nb_share`, `breaked`, `created_at`) VALUES
(1, 1, 'Afrika Numerik', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', '2018-04-26 15:24:16', '2018-06-21 15:57:16', 7, 455, 97, 0, 0, '2018-04-01 01:28:28'),
(2, 2, 'Bussness Company', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', '2018-04-25 04:12:17', '2018-06-21 11:15:13', 90, 58, 7, 0, 0, '2018-04-26 04:12:15');

-- --------------------------------------------------------

--
-- Structure de la table `kna_promotion`
--

CREATE TABLE `kna_promotion` (
  `id` int(11) NOT NULL,
  `id_annonceur` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `prix_reduit` int(11) NOT NULL,
  `devise` varchar(5) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_vues` int(11) NOT NULL DEFAULT '0',
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_promotion`
--

INSERT INTO `kna_promotion` (`id`, `id_annonceur`, `titre`, `description`, `prix`, `prix_reduit`, `devise`, `date_debut`, `date_fin`, `nb_vues`, `breaked`, `created_at`) VALUES
(1, 1, 'Pains', 'Nous vendons des pains sans levain', 78000, 40000, 'CDF', '2018-06-01', '2018-06-06', 0, 0, '2018-06-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `kna_visite`
--

CREATE TABLE `kna_visite` (
  `id` int(11) NOT NULL,
  `ip_adress` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_visite`
--

INSERT INTO `kna_visite` (`id`, `ip_adress`, `breaked`, `created_at`) VALUES
(2, '127.0.0.1', 0, '2018-04-22 04:51:24'),
(5, '127.0.0.1', 0, '2018-04-25 09:57:05'),
(6, '127.0.0.1', 0, '2018-04-26 10:19:53'),
(7, '127.0.0.1', 0, '2018-04-27 12:33:42'),
(8, '127.0.0.1', 0, '2018-04-29 00:12:37'),
(9, '127.0.0.1', 0, '2018-04-30 11:06:54'),
(10, '127.0.0.1', 0, '2018-05-02 11:08:11'),
(11, '127.0.0.1', 0, '2018-05-03 13:02:40'),
(12, '127.0.0.1', 0, '2018-05-04 13:11:44'),
(13, '127.0.0.1', 0, '2018-05-07 11:39:31'),
(14, '127.0.0.1', 0, '2018-05-09 08:34:35'),
(15, '127.0.0.1', 0, '2018-05-11 12:03:53'),
(16, '127.0.0.1', 0, '2018-05-16 11:42:07'),
(17, '127.0.0.1', 0, '2018-05-18 08:05:38'),
(18, '127.0.0.1', 0, '2018-05-21 13:39:11'),
(19, '127.0.0.1', 0, '2018-05-22 15:46:44'),
(20, '127.0.0.1', 0, '2018-05-23 15:47:27'),
(22, '127.0.0.1', 0, '2018-05-25 09:58:48'),
(23, '127.0.0.1', 0, '2018-05-28 08:09:55'),
(24, '127.0.0.1', 0, '2018-05-29 12:59:05'),
(29, '127.0.0.1', 0, '2018-06-05 13:23:13');

-- --------------------------------------------------------

--
-- Structure de la table `kna_vue`
--

CREATE TABLE `kna_vue` (
  `id` int(11) NOT NULL,
  `id_page` text NOT NULL,
  `ip_adresse` text NOT NULL,
  `breaked` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `kna_vue`
--

INSERT INTO `kna_vue` (`id`, `id_page`, `ip_adresse`, `breaked`, `created_at`) VALUES
(42, 'c4ca4238a0b923820dcc509a6f75849b', '127.0.0.1', 0, '2018-06-04 15:01:04'),
(43, 'c81e728d9d4c2f636f067f89cc14862c', '127.0.0.1', 0, '2018-06-04 15:38:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `kna_annonceur`
--
ALTER TABLE `kna_annonceur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_article`
--
ALTER TABLE `kna_article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_code`
--
ALTER TABLE `kna_code`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_compte`
--
ALTER TABLE `kna_compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_contact`
--
ALTER TABLE `kna_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_espace`
--
ALTER TABLE `kna_espace`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_image`
--
ALTER TABLE `kna_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_image_p`
--
ALTER TABLE `kna_image_p`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_membre`
--
ALTER TABLE `kna_membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_owner`
--
ALTER TABLE `kna_owner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_page`
--
ALTER TABLE `kna_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_promotion`
--
ALTER TABLE `kna_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_visite`
--
ALTER TABLE `kna_visite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kna_vue`
--
ALTER TABLE `kna_vue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `kna_annonceur`
--
ALTER TABLE `kna_annonceur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `kna_article`
--
ALTER TABLE `kna_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `kna_code`
--
ALTER TABLE `kna_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `kna_compte`
--
ALTER TABLE `kna_compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `kna_contact`
--
ALTER TABLE `kna_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `kna_espace`
--
ALTER TABLE `kna_espace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `kna_image`
--
ALTER TABLE `kna_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `kna_image_p`
--
ALTER TABLE `kna_image_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `kna_membre`
--
ALTER TABLE `kna_membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `kna_owner`
--
ALTER TABLE `kna_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `kna_page`
--
ALTER TABLE `kna_page`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `kna_promotion`
--
ALTER TABLE `kna_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `kna_visite`
--
ALTER TABLE `kna_visite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `kna_vue`
--
ALTER TABLE `kna_vue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
