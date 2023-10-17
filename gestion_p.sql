-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 oct. 2020 à 07:47
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_p`
--

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(11) NOT NULL,
  `nom_diplome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `diplome`
--

INSERT INTO `diplome` (`id`, `nom_diplome`) VALUES
(3, 'BACC'),
(4, 'BEPC'),
(6, 'Licence'),
(7, 'Maîtrise');

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

CREATE TABLE `direction` (
  `id` int(11) NOT NULL,
  `code_direction` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_direction` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`id`, `code_direction`, `nom_direction`) VALUES
(3, 'SG', 'Secrétaire General'),
(4, 'DAF', 'Direction Administration et Financière'),
(5, 'DID', 'Directeur des Infrastructures et de Développement'),
(6, 'DID', 'Directeur des Infrastructures et de Développement');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `id` int(11) NOT NULL,
  `nom_fonction` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`id`, `nom_fonction`) VALUES
(2, 'Directeur'),
(3, 'Secrétaire'),
(4, 'Femme de Ménage');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `code_grade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_grade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `code_grade`, `nom_grade`) VALUES
(1, 'ECD', 'Employée Court Durée'),
(6, 'EFA', 'Emploi de Fonctionnaire Auxiliaire'),
(10, 'ELD', 'Emploi de Courte Duré');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200808135146', '2020-08-08 13:52:10');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `fonction_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `diplome_id` int(11) DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_matricule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `date_affectation` date NOT NULL,
  `categorie` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `echellon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_effet_dernier` date NOT NULL,
  `date_entre` date NOT NULL,
  `cin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `service_id`, `fonction_id`, `grade_id`, `diplome_id`, `nom`, `prenom`, `sexe`, `num_matricule`, `date_naissance`, `date_affectation`, `categorie`, `indice`, `classe`, `echellon`, `date_effet_dernier`, `date_entre`, `cin`) VALUES
(8, 1, 3, 1, 3, 'RANDRIAFANANTENANTSOA', 'Tahirinirina Nicolas', 'Masculin', 'Néant', '1998-12-29', '2012-10-26', '3', '1', '1', '1', '2019-07-17', '2008-06-07', '50112336545'),
(10, 4, 2, 6, 3, 'DILIMIZONY', 'Berth Stacey', 'Masculin', '432.129', '1987-04-01', '2019-11-04', 'VI', '750', 'Néant', 'Néant', '2019-07-24', '2015-06-02', '501011005184'),
(11, 4, 3, 10, 6, 'RAKOTOARISOA', 'Lucia', 'Féminin', '595216', '1990-01-04', '2011-10-20', '5', '115', '1', '1', '2017-08-08', '2007-07-04', '50112336545');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `direction_id` int(11) DEFAULT NULL,
  `codeservice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomservice` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `direction_id`, `codeservice`, `nomservice`) VALUES
(1, 3, 'S.I', 'Service Informatique'),
(4, 4, 'SAF', 'Service des Affaires Financiers et de Comptabilité');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `roles`) VALUES
(1, 'elnicolas', 'elnicolas787@gmail.com', '123456', '[\"USER_USER\"]');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `email`, `password`, `roles`, `last_login`, `created_at`) VALUES
(1, 'Nicolas', 'elnicolas787@gmail.com', '123456', '', '2020-09-08 09:11:30', '2020-09-22 09:11:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A6BCF3DEED5CA9E6` (`service_id`),
  ADD KEY `IDX_A6BCF3DE57889920` (`fonction_id`),
  ADD KEY `IDX_A6BCF3DEFE19A1A8` (`grade_id`),
  ADD KEY `IDX_A6BCF3DE26F859E2` (`diplome_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E19D9AD2AF73D997` (`direction_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `direction`
--
ALTER TABLE `direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `FK_A6BCF3DE26F859E2` FOREIGN KEY (`diplome_id`) REFERENCES `diplome` (`id`),
  ADD CONSTRAINT `FK_A6BCF3DE57889920` FOREIGN KEY (`fonction_id`) REFERENCES `fonction` (`id`),
  ADD CONSTRAINT `FK_A6BCF3DEED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `FK_A6BCF3DEFE19A1A8` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_E19D9AD2AF73D997` FOREIGN KEY (`direction_id`) REFERENCES `direction` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
