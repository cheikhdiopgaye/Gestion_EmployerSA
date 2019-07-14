-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 14 Juillet 2019 à 21:06
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.3.6-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `EmployersSA`
--

-- --------------------------------------------------------

--
-- Structure de la table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naissance` date NOT NULL,
  `salaire` int(11) NOT NULL,
  `services_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `employers`
--

INSERT INTO `employers` (`id`, `photo`, `matricule`, `nom`, `naissance`, `salaire`, `services_id`) VALUES
(6, 'https://edito.regionsjob.com/observatoire-metier/wp-content/uploads/sites/4/2018/09/Directeur-du-contr%C3%B4le-de-gestion.jpg', 'D400', 'cheikh dio', '2018-02-16', 400000, 1),
(8, 'http://une-autre-histoire.org/wp-content/uploads/2013/07/Cheikh-Anta-Diop.jpg', 'A100', 'Cheikh Gay', '1991-11-22', 800000, 6);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190710153843', '2019-07-10 15:48:08'),
('20190710184804', '2019-07-10 18:53:20'),
('20190714192113', '2019-07-14 19:23:32');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id`, `libelle`) VALUES
(1, 'Directeur'),
(2, 'Secrétaire'),
(3, 'Gestionnaire'),
(4, 'Comptable'),
(5, 'Mécanicien'),
(6, 'Électricien'),
(7, 'Surveillant'),
(8, 'Gardien'),
(9, 'Jardinier'),
(10, 'Chauffeur'),
(11, 'Développeur'),
(12, 'Courtier');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BF014796AEF5A6C1` (`services_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `FK_BF014796AEF5A6C1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
