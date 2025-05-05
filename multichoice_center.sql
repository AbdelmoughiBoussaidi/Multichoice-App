-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 avr. 2025 à 21:54
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
-- Base de données : `multichoice_center`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id_absence` int(11) NOT NULL,
  `date_absence` date DEFAULT NULL,
  `remarque_absence` varchar(100) DEFAULT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `archive_paiements`
--

CREATE TABLE `archive_paiements` (
  `id_paiement` int(11) NOT NULL,
  `reference_paiement` varchar(30) DEFAULT NULL,
  `type_paiement` varchar(30) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `montant_paye` float DEFAULT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_utili_changer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom_etudiant` varchar(30) DEFAULT NULL,
  `prenom_etudiant` varchar(30) DEFAULT NULL,
  `type_etudiant` varchar(30) NOT NULL,
  `tel_etudiant` varchar(10) DEFAULT NULL,
  `email_etudiant` varchar(30) DEFAULT NULL,
  `adresse_etudiant` varchar(100) DEFAULT NULL,
  `reference_etudiant` varchar(10) DEFAULT NULL,
  `reference_inscription` varchar(10) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_groupe`
--

CREATE TABLE `etudiant_groupe` (
  `id_etudiant` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `id_formateur` int(11) NOT NULL,
  `nom_formateur` varchar(30) DEFAULT NULL,
  `prenom_formateur` varchar(30) DEFAULT NULL,
  `tel_formateur` varchar(10) DEFAULT NULL,
  `adresse_formateur` varchar(50) DEFAULT NULL,
  `email_formateur` varchar(50) DEFAULT NULL,
  `id_formation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `libelle_formation` varchar(30) DEFAULT NULL,
  `nbr_heure_formation` int(11) DEFAULT NULL,
  `dure_formation` varchar(30) DEFAULT NULL,
  `prix_total_formation` float DEFAULT NULL,
  `description_formation` varchar(500) NOT NULL,
  `type_formation` varchar(30) NOT NULL,
  `image_formation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `libelle_formation`, `nbr_heure_formation`, `dure_formation`, `prix_total_formation`, `description_formation`, `type_formation`, `image_formation`) VALUES
(13, 'Français', 0, 'Formation Continue', 350, 'Parler français contribue d’une façon importante à protéger la diversité linguistique dans le monde et à éviter la généralisation exclusive d’une seule langue dans un monde globalisé .', 'Languistique', 'langue-1.png'),
(14, 'Anglais', 0, 'Formation Continue', 350, 'Pourquoi apprendre l’anglais ? La question devrait plutôt être pourquoi ne pas apprendre l’anglais lorsque la culture anglo-saxonne est si présente dans nos sociétés. Au cinéma et à la télévision, à travers la musique, sur Internet… les occasions d’entendre ou de lire la langue sont nombreuses et à la portée de tous.', 'Languistique', 'langue-3.png'),
(15, 'Allemand', 0, 'Formation Continue', 500, ' Apprendre l’allemand c’est acquérir des aptitudes qui vous permettront d’améliorer a qualité de votre vie professionnelle et privée. Dans le monde du travail : communiquer en allemand avec vos partenaires germanophones génère de meilleures relations de travail, une communication plus efficace et, par conséquent, une plus grande chance de succès.', 'Languistique', 'langue-2.png'),
(16, 'Turquie', 0, 'Formation Continue', 650, 'La Turquie occupe une place géographique unique en tant que passerelle entre l\'Europe et l\'Asie. Cela signifie qu’ étudier le turc en Turquie peut être important pour quiconque s\'intéresse à la politique, aux affaires ou à la culture de cette région.', 'Languistique', 'turquie20.webp'),
(17, 'Espagnol', 0, 'Formation Continue', 550, 'Une des raisons principales qui peut t’amener à apprendre l’espagnol est ta volonté d’étudier en Espagne ou dans n’importe quel autre pays hispanophone. Que ce soit dans de nombreux cours organisés en Espagne dans les universités ou dans les programmes de master, on exige généralement d’avoir au minimum un niveau intermédiaire.', 'Languistique', 'langue-4.png'),
(18, 'Néerlandais', 0, 'Formation Continue', 450, ' Si vous souhaitez partir faire vos études ou travailler de l’autre côté de la frontière en Belgique et plus précisément en région flamande, connaître le néerlandais devrait vous aider à vous intégrer. Les habitants de cette région apprécieront certainement votre effort de parler dans leur langue et non en français. Il sera également pour vous plus facile de réaliser des démarches administratives.', 'Languistique', 'netherlands.png'),
(19, 'Informatique', 90, '6 Mois', 2000, 'L\'informatique est un domaine d\'activité scientifique, technique, et industriel concernant le traitement automatique de l\'information numérique par l\'exécution de programmes informatiques hébergés par des dispositifs électriques-électroniques : des systèmes embarqués, des ordinateurs, des robots...', 'Professionelle', 'Informatique.jpg'),
(20, 'Design Graphique', 45, '4 Mois', 1500, 'Le designer graphique est un spécialiste de l\'information visuelle qui crée et organise des images pour traduire des idées.', 'Professionelle', 'design.jpg'),
(21, 'Digital Marketing', 120, '9 Mois', 3500, ' Le marketing digital couvre l\'ensemble des activités marketing déployées en ligne pour entrer en relation avec des clients ou prospects, telles que par exemple la tenue d\'un site web ou blog, les réseaux sociaux, ou la publicité digitale.', 'Professionelle', 'digital.jpg'),
(23, 'Délégué Medical', 30, '3 Mois', 1000, ' Le délégué médical est l’intermédiaire entre le laboratoire et les praticiens du secteur médical. Sa mission principale consiste à assurer la promotion d’un ou de plusieurs produits fabriqués par le laboratoire pharmaceutique où il travaille.', 'Professionelle', 'medical.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(30) DEFAULT NULL,
  `id_formation` int(11) DEFAULT NULL,
  `id_formateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `reference_paiement` varchar(30) DEFAULT NULL,
  `type_paiement` varchar(30) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `montant_paye` float DEFAULT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(30) DEFAULT NULL,
  `capacite_salle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `jour` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(30) DEFAULT NULL,
  `prenom_utilisateur` varchar(30) DEFAULT NULL,
  `email_utilisateur` varchar(30) DEFAULT NULL,
  `mdp_utilisateur` varchar(300) DEFAULT NULL,
  `role_utilisateur` varchar(30) DEFAULT NULL,
  `image_utilisateur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `email_utilisateur`, `mdp_utilisateur`, `role_utilisateur`, `image_utilisateur`) VALUES
(7, 'moughit', 'abd', 'moughit@gmail.com', '2yG9q7O7s42BI', 'Gérant', 'Annie_31.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `fk_groupe_abs` (`id_groupe`);

--
-- Index pour la table `archive_paiements`
--
ALTER TABLE `archive_paiements`
  ADD PRIMARY KEY (`id_paiement`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `reference_etudiant` (`reference_etudiant`),
  ADD UNIQUE KEY `reference_inscription` (`reference_inscription`);

--
-- Index pour la table `etudiant_groupe`
--
ALTER TABLE `etudiant_groupe`
  ADD PRIMARY KEY (`id_etudiant`,`id_groupe`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id_formateur`),
  ADD KEY `fk_formateur_formation` (`id_formation`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD UNIQUE KEY `nom_groupe` (`nom_groupe`),
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD UNIQUE KEY `reference_paiement` (`reference_paiement`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `fkgrp_seance` (`id_groupe`),
  ADD KEY `fksalle_seance` (`id_salle`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `archive_paiements`
--
ALTER TABLE `archive_paiements`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `id_formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `fk_groupe_abs` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`);

--
-- Contraintes pour la table `etudiant_groupe`
--
ALTER TABLE `etudiant_groupe`
  ADD CONSTRAINT `etudiant_groupe_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `etudiant_groupe_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`);

--
-- Contraintes pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD CONSTRAINT `fk_formateur_formation` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id_formateur`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fkgrp_seance` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`),
  ADD CONSTRAINT `fksalle_seance` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
