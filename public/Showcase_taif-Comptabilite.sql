-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 03 fév. 2022 à 22:25
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Showcase_taif-Comptabilite`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(200) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `expiration` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `package_id`, `entreprise_id`, `expiration`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2012-07-14', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(2, 12, 2, '2012-09-19', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(11, 3, 601, '2012-09-19', '2022-01-03 22:37:02', '2022-01-03 22:37:02'),
(12, 12, 2, '2012-09-19', '2022-01-03 22:37:52', '2022-01-03 22:37:52'),
(13, 11, 603, '2012-09-19', '2022-01-06 16:43:44', '2022-01-06 16:43:44'),
(14, 13, 604, '2022-03-02', '2022-02-01 19:06:32', '2022-02-01 19:06:32'),
(15, 13, 605, '2022-03-02', '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(16, 13, 606, '2022-03-02', '2022-02-01 19:16:02', '2022-02-01 19:16:02'),
(17, 13, 607, '2022-03-02', '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(18, 13, 608, '2022-03-02', '2022-02-01 19:25:14', '2022-02-01 19:25:14'),
(19, 13, 609, '2022-03-02', '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(20, 13, 610, '2022-03-02', '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(21, 13, 611, '2022-03-02', '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(22, 13, 612, '2022-03-02', '2022-02-03 12:18:48', '2022-02-03 12:18:48');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `categories_article_id` int(200) NOT NULL,
  `comptes_comptable_id` int(200) DEFAULT NULL,
  `taxe_id` int(200) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(200) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_unitaire` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `entreprise_id`, `categories_article_id`, `comptes_comptable_id`, `taxe_id`, `nom`, `stock`, `description`, `prix_unitaire`, `image`, `created_at`, `updated_at`) VALUES
(57, 1, 5, 1, 2, 'Article Produit 1', 12, NULL, 9000, NULL, '2021-12-02 12:12:45', '2021-12-02 12:12:45'),
(58, 1, 3, 2, 1, 'Article Service', 12, NULL, 8000, NULL, '2021-12-02 12:13:36', '2021-12-02 12:13:36'),
(59, 1, 6, 3, 4, 'IPHONE 12', 12, 'DESCRIPTION', 500000, NULL, '2021-12-02 23:36:34', '2021-12-02 23:36:34'),
(60, 1, 4, 1, 1, 'Installation camera', 1, 'test', 12000, NULL, '2021-12-02 23:37:13', '2021-12-02 23:37:13'),
(61, 1, 4, 2, 2, 'Diallo', 2345, 'é3', 23, NULL, '2021-12-05 14:03:37', '2021-12-05 14:03:37'),
(62, 1, 4, 1, 1, 'Diallo', 123, 'edsegz', 12, NULL, '2021-12-05 14:04:45', '2021-12-05 14:04:45'),
(63, 1, 3, 1, 2, 'Atque minus aliquid', 88, 'Eveniet ut incididu', 63, NULL, '2021-12-05 14:06:42', '2021-12-05 14:06:42'),
(64, 1, 4, 2, 1, 'Est aut omnis ut ut', 100, 'Autem et nesciunt e', 8, NULL, '2021-12-05 14:07:53', '2021-12-05 14:07:53'),
(65, 1, 3, 2, 3, 'Consequatur Qui ea', 81, 'Adipisicing praesent', 15, NULL, '2021-12-05 14:10:14', '2021-12-05 14:10:14'),
(66, 1, 6, 1, 4, 'Iste laborum Exerci', 20, 'Eos explicabo Eius', 82, NULL, '2021-12-05 14:11:40', '2021-12-05 14:11:40'),
(67, 1, 6, 1, 3, 'Temporibus provident', 75, 'Voluptates unde nequ', 59, NULL, '2021-12-05 14:15:00', '2021-12-05 14:15:00'),
(68, 1, 4, 1, 2, 'Diallo', 123, '23\'', 123, NULL, '2021-12-05 14:25:41', '2021-12-05 14:25:41'),
(69, 1, 6, 1, 3, 'Temporibus provident', 75, 'Voluptates unde nequ', 59, NULL, '2021-12-05 14:27:22', '2021-12-05 14:27:22'),
(70, 1, 6, 2, 4, 'Esse cumque sed num', 43, 'Ipsum reprehenderit', 5, NULL, '2021-12-05 14:28:20', '2021-12-05 14:28:20'),
(71, 1, 4, 3, 3, 'Autem excepteur corr', 51, 'Incidunt impedit e', 15, NULL, '2021-12-05 14:29:02', '2021-12-05 14:29:02'),
(72, 1, 6, 3, 4, 'Ex ea quas nisi veni', 39, 'Nihil qui distinctio', 83, NULL, '2021-12-05 14:31:20', '2021-12-05 14:31:20'),
(73, 1, 3, 2, 1, 'Ea ea consequatur D', 89, 'Repellendus Odit et', 7, NULL, '2021-12-05 14:32:49', '2021-12-05 14:32:49'),
(74, 1, 5, 1, 2, 'Dolor error maiores', 99, 'Enim in veniam ut s', 71, NULL, '2021-12-05 14:40:45', '2021-12-05 14:40:45'),
(75, 1, 3, 2, 4, 'Enim duis voluptas c', 68, 'Amet duis id asper', 3, NULL, '2021-12-05 14:43:50', '2021-12-05 14:43:50'),
(76, 1, 4, 2, 2, 'Neque voluptate et r', 61, 'Anim dignissimos ani', 37, NULL, '2021-12-05 14:44:43', '2021-12-05 14:44:43'),
(77, 2, 9, NULL, NULL, 'IPHONE 12', 50, NULL, 640000, NULL, '2022-01-16 15:40:06', '2022-01-16 15:40:06'),
(78, 603, 10, 3, 3, 'Eaque alias voluptas', 64, 'Est reprehenderit', 100, NULL, '2022-01-20 16:07:53', '2022-01-20 16:07:53'),
(79, 603, 10, 1, 4, 'Eiusmod autem porro', 80, 'Dolor perferendis pe', 14, NULL, '2022-01-22 21:58:33', '2022-01-22 21:58:33'),
(80, 610, 17, 3, 4, 'Emi Guzman', 99, 'Vero sit excepteur d', 19, NULL, '2022-02-01 19:46:13', '2022-02-01 19:46:13'),
(81, 611, 20, 48, NULL, 'Meuble Télé + Rangement', 10, 'Meuble Télé + Rangement', 150000, NULL, '2022-02-01 22:59:08', '2022-02-01 22:59:08');

-- --------------------------------------------------------

--
-- Structure de la table `banques`
--

CREATE TABLE `banques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_compte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` decimal(25,0) DEFAULT 0,
  `logo_banque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entreprise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `banques`
--

INSERT INTO `banques` (`id`, `nom`, `numero_compte`, `solde`, `logo_banque`, `entreprise_id`, `created_at`, `updated_at`) VALUES
(1, 'SGBS', '1234323456432', '22994', NULL, 2, '2021-11-20 14:47:25', '2022-02-01 18:48:28'),
(2, 'COFINA', '1234323456432', '13521', NULL, 2, '2021-11-20 14:47:25', '2022-01-29 15:00:39'),
(3, 'Compte Caisse Epargne', '1234323456432', '40093', NULL, 2, '2021-11-20 14:47:25', '2021-11-20 14:47:25');

-- --------------------------------------------------------

--
-- Structure de la table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` date NOT NULL,
  `abonnement_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bonuses`
--

INSERT INTO `bonuses` (`id`, `type`, `duree`, `abonnement_id`, `created_at`, `updated_at`) VALUES
(1, 'et', '2002-12-26', 6, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(2, 'nesciunt', '2012-05-04', 7, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(3, 'non', '2011-06-08', 8, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(4, 'est', '1996-12-26', 9, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(5, 'quisquam', '2014-02-11', 10, '2021-11-20 14:47:26', '2021-11-20 14:47:26');

-- --------------------------------------------------------

--
-- Structure de la table `caisses`
--

CREATE TABLE `caisses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` double NOT NULL DEFAULT 0,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `caisses`
--

INSERT INTO `caisses` (`id`, `entreprise_id`, `nom`, `solde`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Caisse Principale', 8930, 'default', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(2, 1, 'Caisse Epargne', 298, NULL, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(31, 605, 'Caisse principale', 0, 'default', '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(32, 607, 'Caisse principale', 0, 'default', '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(33, 609, 'Caisse principale', 0, 'default', '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(34, 610, 'Caisse principale', 49, 'default', '2022-02-01 19:29:03', '2022-02-01 22:43:00'),
(35, 611, 'Caisse principale', 1213500, 'default', '2022-02-01 22:52:41', '2022-02-01 23:08:58'),
(36, 612, 'Caisse principale', 0, 'default', '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `categories_articles`
--

CREATE TABLE `categories_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories_articles`
--

INSERT INTO `categories_articles` (`id`, `entreprise_id`, `nom`, `type`, `sub_categorie`, `created_at`, `updated_at`) VALUES
(3, 1, 'Service Parent', 'service', NULL, '2021-12-02 12:10:05', '2021-12-02 12:10:05'),
(4, 1, 'Service Enfant', 'service', '3', '2021-12-02 12:10:20', '2021-12-02 12:10:20'),
(5, 1, 'Produit Parent', 'produit', NULL, '2021-12-02 12:11:10', '2021-12-02 12:11:10'),
(6, 1, 'Produit Enfant', 'produit', '5', '2021-12-02 12:11:19', '2021-12-02 12:11:19'),
(7, 1, 'Alimentation', 'produit', NULL, '2021-12-02 23:37:53', '2021-12-02 23:37:53'),
(8, 1, 'Boissons', 'produit', '7', '2021-12-02 23:38:06', '2021-12-02 23:38:06'),
(9, 2, 'Téléphone', 'produit', NULL, '2022-01-16 15:35:09', '2022-01-16 15:35:09'),
(10, 603, 'Categorie SImple', 'produit', NULL, '2022-01-20 16:07:34', '2022-01-20 16:07:34'),
(11, 605, 'Non classée', 'service', NULL, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(12, 605, 'Non classée', 'produit', NULL, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(13, 607, 'Non classée', 'service', NULL, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(14, 607, 'Non classée', 'produit', NULL, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(15, 609, 'Non classée', 'service', NULL, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(16, 609, 'Non classée', 'produit', NULL, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(17, 610, 'Non classée', 'service', NULL, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(18, 610, 'Non classée', 'produit', NULL, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(19, 611, 'service categorie simple', 'service', NULL, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(20, 611, 'produit categorie simple', 'produit', NULL, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(21, 612, 'service categorie simple', 'service', NULL, '2022-02-03 12:18:49', '2022-02-03 12:18:49'),
(22, 612, 'produit categorie simple', 'produit', NULL, '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `cheques`
--

CREATE TABLE `cheques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depense_id` int(11) NOT NULL,
  `entreprise_id` int(200) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `adresse_postale` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `numero_cheque` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cheques`
--

INSERT INTO `cheques` (`id`, `depense_id`, `entreprise_id`, `clients_entreprise_id`, `fournisseur_id`, `adresse_postale`, `date_paiement`, `numero_cheque`, `note`, `created_at`, `updated_at`) VALUES
(22, 127, 611, NULL, 46, 'Keur Massar', '2022-02-03', '22', NULL, '2022-02-03 02:50:05', '2022-02-03 02:50:05'),
(23, 130, 610, NULL, 45, 'Eu possimus placeat', '2022-02-03', '3', NULL, '2022-02-03 13:23:23', '2022-02-03 13:23:23');

-- --------------------------------------------------------

--
-- Structure de la table `clients_entreprises`
--

CREATE TABLE `clients_entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `portable` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_pro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_chequier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telecopie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paiements_mode_id` int(11) DEFAULT NULL,
  `paiements_modalite_id` int(11) DEFAULT NULL,
  `devises_monetaire_id` int(11) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients_entreprises`
--

INSERT INTO `clients_entreprises` (`id`, `entreprise_id`, `nom`, `prenom`, `entreprise`, `email`, `telephone`, `portable`, `nom_pro`, `nom_chequier`, `titre`, `telecopie`, `website`, `adresse`, `ville`, `province`, `code_postale`, `pays`, `note`, `paiements_mode_id`, `paiements_modalite_id`, `devises_monetaire_id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aby', 'Diawara', 'Bolico Couture', 'bianka68@gmail.com', '221334565656', '221334565656', 'Bolico Couture', 'Bolico Couture', 'Manager', '221334565656', 'www.bolico.com', 'Guediawaye', 'Dakar', 'province', '12345', 'Sénégal', 'frklve', 1, 1, 1, NULL, '2021-11-20 14:47:27', '2021-12-02 08:46:02'),
(2, 1, 'Diallo', 'Elhadj', 'NuiZen', 'alberto.schinner@gmail.com', '221334565656', '221334565656', 'NuiZen', 'NuiZen', 'CEO', '221334565656', 'www.bolico.com', 'Diamalay', 'Dakar', NULL, '12345', 'Senegal', 'Et rerum ipsa quam in quae. Veritatis ducimus consequatur non dolorum. Dolor et repellat hic. Cumque non quia ducimus repellendus ab.', 2, 2, 2, NULL, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(3, 2, 'Fatou', 'Sarr', 'SamaCV', 'michel.hermann@yahoo.com', '221334565656', '221334565656', 'SamaCV', 'SamaCV', 'CEO', '221334565656', 'www.bolico.com', 'Yoff', 'Dakar', NULL, '12345', 'Senegal', 'Harum voluptatem harum ut sed nesciunt earum dolorem. Fugit dolores est accusantium dicta velit aut eveniet. Est nulla voluptatem et.', 3, 3, 1, NULL, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(4, 2, 'Ibrahima', 'Mbaye', 'Maclio', 'elenor79@hotmail.com', '221334565656', '221334565656', 'Maclio', 'Maclio', 'CEO', '221334565656', 'www.bolico.com', 'Medina', 'Dakar', NULL, '12345', 'Senegal', 'Sequi nisi voluptatem voluptatem rerum mollitia aliquam ut. Assumenda qui veritatis id ratione fugiat doloremque veritatis. Et velit sint sequi est quas aut.', 4, 4, 4, NULL, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(96, 1, 'AMOUR DIOUF', 'El Hadji Papa', 'El Hadji Papa Ndiouga Diallo', 'bambabassyr@gmail.com', '774563210', '1234567', 'Diallo', 'El Hadji Papa Ndiouga Diallo', 'Vous déménagez?', '345678', 'www.illugraph-ic.com', 'NORD FOIR Azur', 'Dakar', 'Dakar', '21000', 'Sénégal', 'zfjo', NULL, 1, 1, NULL, '2021-12-02 08:52:49', '2021-12-02 08:52:49'),
(97, 603, 'Duis ipsam quas mole', 'Saepe vitae nobis la', 'Voluptatem diallo', 'gexahyboci@mailinator.com', '+1 (126) 207-5652', 'Nesciunt lorem id m', 'Tenetur molestiae vo', 'Sint architecto omn', 'Rerum quidem digniss', 'Adipisci impedit de', 'https://www.fyw.org.uk', 'Voluptates iusto con', 'In dolor architecto', 'Modi accusamus obcae', 'Tempore impedit ut', 'Afghanistan', 'Molestiae sunt conse', NULL, 2, 2, NULL, '2022-01-07 18:33:05', '2022-01-23 22:38:53'),
(98, 602, 'In sed qui tempore', 'Labore est tempore', 'Babaly', 'hybigoj@mailinator.com', '+1 (472) 577-5309', 'Rerum quos veniam q', 'Omnis reiciendis et', 'Sit enim accusantium', 'Unde rerum magna rer', 'Quasi in non officia', 'https://www.tanocyvyfadujic.info', 'Error non cillum fug', 'Quidem cupidatat cup', 'Qui odit dolor repre', 'Ut veritatis rem vol', 'Sénégal', 'Qui minima veniam e', NULL, 137, 2, NULL, '2022-01-09 01:27:55', '2022-01-09 01:27:55'),
(99, 610, 'Hess', 'Silas', 'pape', 'olllaidpn@gmail.com', '+1 (122) 942-1272', 'Quibusdam odio moles', 'Elmo Rivas', 'Octavius Lindsay', 'Distinctio Nulla eu', 'Ullam sunt temporibu', 'https://www.jaroviconoz.mobi', 'Officia est et volup', 'Minus et aperiam vol', 'Repellendus Vero Na', 'Corrupti magnam off', 'Eritrea', 'Aut explicabo Cumqu', NULL, 149, NULL, NULL, '2022-02-01 19:45:50', '2022-02-03 21:22:47'),
(100, 611, 'Diallo', 'El Hadji Papa', 'illugraphic', 'illugraphic@protonmail.com', '786080939', '778704565', 'illugraphic', 'illugraphic', 'CEO', '345678', 'www.illugraph-ic.com', 'N°98, Cité Air Afrique, Golf Nord Est Guédiawaye', 'Dakar', 'Dakar', '19415', 'Senegal', NULL, NULL, 2, 1, NULL, '2022-02-01 22:55:09', '2022-02-01 22:55:09'),
(101, 610, 'Perspiciatis sit o', 'Id beatae quis eos', 'Soluta quo quae iste', 'wypu@mailinator.com', '+1 (139) 406-6843', NULL, NULL, NULL, 'Aut consequatur temp', NULL, NULL, 'Laudantium rerum an', 'Maiores cillum velit', 'Sapiente perferendis', 'Accusantium dolore p', 'Bosnia and Herzegovina', 'Doloremque autem rep', NULL, 145, 40, NULL, '2022-02-03 20:52:16', '2022-02-03 20:52:16');

-- --------------------------------------------------------

--
-- Structure de la table `comptescomptables`
--

CREATE TABLE `comptescomptables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comptescomptables`
--

INSERT INTO `comptescomptables` (`id`, `nom`, `numero_compte`, `entreprise_id`, `created_at`, `updated_at`) VALUES
(1, 'Expédition, Transport et livraison', '7000', 603, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(2, 'Frais acheteur', '7005', 37, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(3, 'Autres fais ', '7010', 603, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(47, 'Diallo', '34543', 610, '2022-02-01 19:46:43', '2022-02-01 19:46:43'),
(48, 'Achat de marchandise', '601', 611, '2022-02-01 22:58:20', '2022-02-01 22:58:20'),
(49, 'Client', '411', 611, '2022-02-01 22:58:37', '2022-02-01 22:58:37');

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(230) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entreprise_id` int(11) NOT NULL,
  `contrats_model_id` int(20) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `employes_entreprise_id` int(11) DEFAULT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `type` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id`, `status`, `nom`, `signature1`, `signature2`, `entreprise_id`, `contrats_model_id`, `clients_entreprise_id`, `employes_entreprise_id`, `facture_id`, `project_id`, `fournisseur_id`, `type`, `contenu`, `montant`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Contrat de conception site Tractosen', NULL, NULL, 1, 10, 1, NULL, NULL, NULL, NULL, 'Contrat de conception', '<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://themes-dl.com/nulled-evara-bootstrap-5-ecommerce-html-template-free-download/\">Nulled Evara - Bootstrap 5 Ecommerce HTML Template free ...</a></h3>\r\n\r\n<p><a href=\"https://themes-dl.com/nulled-evara-bootstrap-5-ecommerce-html-template-free-download/\"><cite>https://themes-dl.com&nbsp;&rsaquo; nulled-evara...</cite></a></p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p><a href=\"https://translate.google.com/translate?hl=fr&amp;sl=en&amp;u=https://themes-dl.com/nulled-evara-bootstrap-5-ecommerce-html-template-free-download/&amp;prev=search&amp;pto=aue\">Traduire cette page</a></p>\r\n\r\n<p>3 juin 2021&nbsp;&mdash;&nbsp;<em>Nulled Evara</em>&nbsp;&ndash;&nbsp;<em>Bootstrap 5 Ecommerce</em>&nbsp;HTML Template free&nbsp;<em>download</em>&nbsp;...&nbsp;<em>Evara</em>&nbsp;is outstanding&nbsp;<em>ecommerce</em>&nbsp;HTML template. It will be perfect solution for&nbsp;...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://nulled.soovam.com/free-download-evara-bootstrap-5-ecommerce-html-template-nulled-latest-version/\">[Free Download] Evara &ndash; Bootstrap 5 Ecommerce HTML ...</a></h3>\r\n\r\n<p><a href=\"https://nulled.soovam.com/free-download-evara-bootstrap-5-ecommerce-html-template-nulled-latest-version/\"><cite>https://nulled.soovam.com&nbsp;&rsaquo; free-do...</cite></a></p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p><a href=\"https://translate.google.com/translate?hl=fr&amp;sl=en&amp;u=https://nulled.soovam.com/free-download-evara-bootstrap-5-ecommerce-html-template-nulled-latest-version/&amp;prev=search&amp;pto=aue\">Traduire cette page</a></p>\r\n\r\n<p>[Free&nbsp;<em>Download</em>]&nbsp;<em>Evara</em>&nbsp;&ndash;&nbsp;<em>Bootstrap 5 Ecommerce</em>&nbsp;HTML Template (<em>Nulled</em>) [Latest Version].</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><a href=\"https://www.bestthemes23.com/i/evara-bootstrap-5-ecommerce-html-template/4072021\">Bootstrap 5 Ecommerce Frontend &amp; Dashboard Template</a></h3>\r\n\r\n<p><a href=\"https://www.bestthemes23.com/i/evara-bootstrap-5-ecommerce-html-template/4072021\"><cite>https://www.bestthemes23.com&nbsp;&rsaquo; eva...</cite></a></p>\r\n\r\n<p>&middot;&nbsp;<a href=\"https://translate.google.com/translate?hl=fr&amp;sl=en&amp;u=https://www.bestthemes23.com/i/evara-bootstrap-5-ecommerce-html-template/4072021&amp;prev=search&amp;pto=aue\">Traduire cette page</a></p>\r\n\r\n<p><em>Evara</em>&nbsp;-&nbsp;<em>Bootstrap 5 Ecommerce</em>&nbsp;Frontend &amp; Dashboard Template. Creative Design, Fully Responsive; Pixel Perfect Design; Color &amp; Fonts is easily changed.</p>', 2000000, '2021-12-11 01:31:24', '2021-12-11 01:41:41'),
(8, NULL, 'Contrat par défaut', NULL, NULL, 610, 14, NULL, NULL, NULL, NULL, NULL, 'Non classée', 'Ceci est un expemplaire de contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', NULL, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(9, NULL, 'Contrat par défaut', NULL, NULL, 611, 15, NULL, NULL, NULL, NULL, NULL, 'Non classée', 'Ceci est un expemplaire de contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', NULL, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(10, NULL, 'Contrat par défaut', NULL, NULL, 612, 16, NULL, NULL, NULL, NULL, NULL, 'Non classée', 'Ceci est un expemplaire de contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', NULL, '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `contrats_models`
--

CREATE TABLE `contrats_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contrats_type_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(230) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci DEFAULT '<p>Entre les soussign&eacute;s :</p>  <p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>  <p>d&#39;une part,</p>  <p>et</p>  <p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>  <p>d&#39;autre part,</p>  <p>il a &eacute;t&eacute; convenu ce qui suit :</p>  <p>Pr&eacute;ambule</p>  <p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>  <p>Ceci expos&eacute;,</p>  <p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>  <p><strong>Article premier - Objet</strong></p>  <p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>  <p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>  <p>20% &agrave; la signature des pr&eacute;sentes ;</p>  <p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>  <p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>  <p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>  <p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>  <p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>  <p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>  <p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>  <p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>  <p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>  <p><strong>4.1 Obligation de collaborer</strong></p>  <p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>  <p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>  <p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>  <p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>  <p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>  <p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>  <p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>  <p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>  <p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>  <p><strong>Article 6 - Nature des obligations</strong></p>  <p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>  <p>6.1 (Clause facultative)</p>  <p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>  <p><strong>Article 7 - Assurance qualit&eacute;</strong></p>  <p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>  <p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>  <p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>  <p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>  <p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>  <p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>  <p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>  <p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>  <p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>  <p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>  <p><strong>Article 12 - Sous-traitance</strong></p>  <p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>  <p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>  <p><strong>Article 13 - Clause de hardship</strong></p>  <p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>  <p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>  <p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>  <p><strong>Article 14 - Force majeure</strong></p>  <p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>  <p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>  <p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>  <p><strong>Article 15 - Loi applicable. Texte original</strong></p>  <p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>  <p><strong>Article 16 - Comp&eacute;tence</strong></p>  <p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>  <p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>  <p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>  <p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrats_models`
--

INSERT INTO `contrats_models` (`id`, `contrats_type_id`, `entreprise_id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(1, 1, 127, '', '', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(2, 2, 129, '', '', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(3, 3, 131, '', '', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(4, 4, 133, '', '', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(5, 5, 135, '', '', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(9, 12, 1, 'Mace', '<p><strong>Test&nbsp;</strong></p>', '2021-12-10 23:53:05', '2021-12-11 00:06:34'),
(10, 12, 1, 'Mace', '<p>cjbkfjz fcizjgyfedic ziejfygciez ficbrdv</p>', '2021-12-10 23:55:33', '2021-12-10 23:55:33'),
(11, 16, 603, 'model defaut', '<p>Entre les soussign&eacute;s :</p>\n\n<p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>\n\n<p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>\n\n<p>d&#39;une part,</p>\n\n<p>et</p>\n\n<p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>\n\n<p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>\n\n<p>d&#39;autre part,</p>\n\n<p>il a &eacute;t&eacute; convenu ce qui suit :</p>\n\n<p>Pr&eacute;ambule</p>\n\n<p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>\n\n<p>Ceci expos&eacute;,</p>\n\n<p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>\n\n<p><strong>Article premier - Objet</strong></p>\n\n<p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>\n\n<p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>\n\n<p>20% &agrave; la signature des pr&eacute;sentes ;</p>\n\n<p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>\n\n<p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>\n\n<p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>\n\n<p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>\n\n<p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>\n\n<p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>\n\n<p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>\n\n<p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>\n\n<p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>\n\n<p><strong>4.1 Obligation de collaborer</strong></p>\n\n<p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>\n\n<p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>\n\n<p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>\n\n<p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>\n\n<p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>\n\n<p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>\n\n<p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>\n\n<p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>\n\n<p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>\n\n<p><strong>Article 6 - Nature des obligations</strong></p>\n\n<p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>\n\n<p>6.1 (Clause facultative)</p>\n\n<p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>\n\n<p><strong>Article 7 - Assurance qualit&eacute;</strong></p>\n\n<p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>\n\n<p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>\n\n<p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>\n\n<p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>\n\n<p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>\n\n<p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>\n\n<p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>\n\n<p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>\n\n<p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>\n\n<p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>\n\n<p><strong>Article 12 - Sous-traitance</strong></p>\n\n<p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>\n\n<p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>\n\n<p><strong>Article 13 - Clause de hardship</strong></p>\n\n<p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>\n\n<p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>\n\n<p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>\n\n<p><strong>Article 14 - Force majeure</strong></p>\n\n<p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>\n\n<p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>\n\n<p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>\n\n<p><strong>Article 15 - Loi applicable. Texte original</strong></p>\n\n<p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>\n\n<p><strong>Article 16 - Comp&eacute;tence</strong></p>\n\n<p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>\n\n<p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>\n\n<p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>\n\n<p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>', '2022-01-23 20:35:00', '2022-01-23 20:35:00'),
(12, 19, 607, 'Modèle par défaut', '<p>Entre les soussign&eacute;s :</p>  <p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>  <p>d&#39;une part,</p>  <p>et</p>  <p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>  <p>d&#39;autre part,</p>  <p>il a &eacute;t&eacute; convenu ce qui suit :</p>  <p>Pr&eacute;ambule</p>  <p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>  <p>Ceci expos&eacute;,</p>  <p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>  <p><strong>Article premier - Objet</strong></p>  <p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>  <p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>  <p>20% &agrave; la signature des pr&eacute;sentes ;</p>  <p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>  <p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>  <p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>  <p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>  <p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>  <p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>  <p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>  <p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>  <p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>  <p><strong>4.1 Obligation de collaborer</strong></p>  <p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>  <p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>  <p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>  <p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>  <p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>  <p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>  <p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>  <p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>  <p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>  <p><strong>Article 6 - Nature des obligations</strong></p>  <p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>  <p>6.1 (Clause facultative)</p>  <p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>  <p><strong>Article 7 - Assurance qualit&eacute;</strong></p>  <p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>  <p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>  <p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>  <p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>  <p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>  <p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>  <p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>  <p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>  <p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>  <p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>  <p><strong>Article 12 - Sous-traitance</strong></p>  <p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>  <p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>  <p><strong>Article 13 - Clause de hardship</strong></p>  <p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>  <p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>  <p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>  <p><strong>Article 14 - Force majeure</strong></p>  <p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>  <p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>  <p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>  <p><strong>Article 15 - Loi applicable. Texte original</strong></p>  <p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>  <p><strong>Article 16 - Comp&eacute;tence</strong></p>  <p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>  <p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>  <p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>  <p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>', '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(13, 20, 609, 'Modèle par défaut', '<p>Entre les soussign&eacute;s :</p>  <p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>  <p>d&#39;une part,</p>  <p>et</p>  <p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>  <p>d&#39;autre part,</p>  <p>il a &eacute;t&eacute; convenu ce qui suit :</p>  <p>Pr&eacute;ambule</p>  <p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>  <p>Ceci expos&eacute;,</p>  <p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>  <p><strong>Article premier - Objet</strong></p>  <p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>  <p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>  <p>20% &agrave; la signature des pr&eacute;sentes ;</p>  <p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>  <p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>  <p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>  <p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>  <p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>  <p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>  <p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>  <p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>  <p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>  <p><strong>4.1 Obligation de collaborer</strong></p>  <p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>  <p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>  <p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>  <p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>  <p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>  <p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>  <p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>  <p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>  <p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>  <p><strong>Article 6 - Nature des obligations</strong></p>  <p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>  <p>6.1 (Clause facultative)</p>  <p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>  <p><strong>Article 7 - Assurance qualit&eacute;</strong></p>  <p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>  <p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>  <p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>  <p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>  <p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>  <p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>  <p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>  <p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>  <p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>  <p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>  <p><strong>Article 12 - Sous-traitance</strong></p>  <p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>  <p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>  <p><strong>Article 13 - Clause de hardship</strong></p>  <p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>  <p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>  <p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>  <p><strong>Article 14 - Force majeure</strong></p>  <p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>  <p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>  <p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>  <p><strong>Article 15 - Loi applicable. Texte original</strong></p>  <p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>  <p><strong>Article 16 - Comp&eacute;tence</strong></p>  <p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>  <p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>  <p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>  <p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>', '2022-02-01 19:25:59', '2022-02-01 19:25:59');
INSERT INTO `contrats_models` (`id`, `contrats_type_id`, `entreprise_id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(14, 21, 610, 'Modèle par défaut', '<p>Entre les soussign&eacute;s :</p>  <p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>  <p>d&#39;une part,</p>  <p>et</p>  <p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>  <p>d&#39;autre part,</p>  <p>il a &eacute;t&eacute; convenu ce qui suit :</p>  <p>Pr&eacute;ambule</p>  <p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>  <p>Ceci expos&eacute;,</p>  <p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>  <p><strong>Article premier - Objet</strong></p>  <p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>  <p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>  <p>20% &agrave; la signature des pr&eacute;sentes ;</p>  <p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>  <p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>  <p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>  <p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>  <p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>  <p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>  <p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>  <p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>  <p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>  <p><strong>4.1 Obligation de collaborer</strong></p>  <p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>  <p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>  <p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>  <p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>  <p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>  <p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>  <p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>  <p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>  <p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>  <p><strong>Article 6 - Nature des obligations</strong></p>  <p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>  <p>6.1 (Clause facultative)</p>  <p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>  <p><strong>Article 7 - Assurance qualit&eacute;</strong></p>  <p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>  <p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>  <p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>  <p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>  <p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>  <p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>  <p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>  <p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>  <p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>  <p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>  <p><strong>Article 12 - Sous-traitance</strong></p>  <p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>  <p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>  <p><strong>Article 13 - Clause de hardship</strong></p>  <p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>  <p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>  <p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>  <p><strong>Article 14 - Force majeure</strong></p>  <p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>  <p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>  <p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>  <p><strong>Article 15 - Loi applicable. Texte original</strong></p>  <p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>  <p><strong>Article 16 - Comp&eacute;tence</strong></p>  <p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>  <p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>  <p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>  <p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>', '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(15, 22, 611, 'Modèle par défaut', '<p>Entre les soussign&eacute;s :</p>  <p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>  <p>d&#39;une part,</p>  <p>et</p>  <p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>  <p>d&#39;autre part,</p>  <p>il a &eacute;t&eacute; convenu ce qui suit :</p>  <p>Pr&eacute;ambule</p>  <p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>  <p>Ceci expos&eacute;,</p>  <p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>  <p><strong>Article premier - Objet</strong></p>  <p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>  <p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>  <p>20% &agrave; la signature des pr&eacute;sentes ;</p>  <p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>  <p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>  <p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>  <p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>  <p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>  <p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>  <p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>  <p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>  <p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>  <p><strong>4.1 Obligation de collaborer</strong></p>  <p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>  <p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>  <p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>  <p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>  <p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>  <p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>  <p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>  <p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>  <p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>  <p><strong>Article 6 - Nature des obligations</strong></p>  <p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>  <p>6.1 (Clause facultative)</p>  <p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>  <p><strong>Article 7 - Assurance qualit&eacute;</strong></p>  <p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>  <p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>  <p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>  <p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>  <p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>  <p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>  <p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>  <p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>  <p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>  <p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>  <p><strong>Article 12 - Sous-traitance</strong></p>  <p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>  <p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>  <p><strong>Article 13 - Clause de hardship</strong></p>  <p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>  <p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>  <p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>  <p><strong>Article 14 - Force majeure</strong></p>  <p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>  <p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>  <p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>  <p><strong>Article 15 - Loi applicable. Texte original</strong></p>  <p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>  <p><strong>Article 16 - Comp&eacute;tence</strong></p>  <p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>  <p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>  <p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>  <p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>', '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(16, 23, 612, 'Modèle par défaut', '<p>Entre les soussign&eacute;s :</p>  <p>La soci&eacute;t&eacute; _________________, [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est _______________ _____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de ____________sous le num&eacute;ro ______________, Repr&eacute;sent&eacute;e par M. __________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;sign&eacute;e &laquo; Le Client &raquo;,</p>  <p>d&#39;une part,</p>  <p>et</p>  <p>La soci&eacute;t&eacute; _________________, Soci&eacute;t&eacute; [forme juridique] au capital de _________________ USD, dont le si&egrave;ge social est ________________ ____, enregistr&eacute;e au Registre du Commerce et des Soci&eacute;t&eacute;s de _______________ sous le num&eacute;ro ____________, repr&eacute;sent&eacute;e par M. ________________________ [nom et qualit&eacute;],</p>  <p>ci-apr&egrave;s d&eacute;nomm&eacute;e &laquo; le Prestataire de services &raquo; ou &laquo; le Prestataire &raquo;,</p>  <p>d&#39;autre part,</p>  <p>il a &eacute;t&eacute; convenu ce qui suit :</p>  <p>Pr&eacute;ambule</p>  <p>[Rappeler ici, en quelques lignes, les raisons qui motivent l&#39;accord intervenu. Ceci peut &ecirc;tre utile ult&eacute;rieurement pour l&#39;interpr&eacute;tation du contrat.]</p>  <p>Ceci expos&eacute;,</p>  <p>Il a &eacute;t&eacute; convenu ce qui suit&nbsp;:</p>  <p><strong>Article premier - Objet</strong></p>  <p>Le pr&eacute;sent contrat est un contrat de prestation de conseil ayant pour objet la mission d&eacute;finie au cahier des charges annex&eacute; au pr&eacute;sent contrat et en faisant partie int&eacute;grante.</p>  <p>En contrepartie de la r&eacute;alisation des prestations d&eacute;finies &agrave; l&#39;Article premier&nbsp;ci-dessus, le client versera au prestataire la somme forfaitaire de _______________ euros, ventil&eacute;e de la mani&egrave;re suivante:</p>  <p>20% &agrave; la signature des pr&eacute;sentes ;</p>  <p>30% au (n) jour suivant la signature des pr&eacute;sentes ;</p>  <p>50% constituant le solde, &agrave; la r&eacute;ception de la t&acirc;che.</p>  <p>Les frais engag&eacute;s par le prestataire : d&eacute;placement, h&eacute;bergement, repas et frais annexes de dactylographie, reprographie, etc., n&eacute;cessaires &agrave; l&#39;ex&eacute;cution de la prestation, seront factur&eacute;s en sus au client sur relev&eacute; de d&eacute;penses.</p>  <p>Les sommes pr&eacute;vues ci-dessus seront pay&eacute;es par ch&egrave;que, dans les huit jours de la r&eacute;ception de la facture, droits et taxes en sus.</p>  <p><strong>Article 3 &ndash; Dur&eacute;e</strong></p>  <p>Ce contrat est pass&eacute; pour une dur&eacute;e de _________ ans. Il prendra effet le ________ et arrivera &agrave; son terme le ___________.</p>  <p><strong>Article 4 - Ex&eacute;cution de la prestation</strong></p>  <p>Le prestataire s&#39;engage &agrave; mener &agrave; bien la t&acirc;che pr&eacute;cis&eacute;e &agrave; l&#39;Article premier, conform&eacute;ment aux r&egrave;gles de l&#39;art et de la meilleure mani&egrave;re.</p>  <p>A cet effet, il constituera l&#39;&eacute;quipe n&eacute;cessaire &agrave; la r&eacute;alisation de la mission et remettra, avant le rapport terminal, une pr&eacute;-&eacute;tude, au plus tard le __________.</p>  <p><strong>4.1 Obligation de collaborer</strong></p>  <p>Le Client tiendra &agrave; la disposition du Prestataire toutes les informations pouvant contribuer &agrave; la bonne r&eacute;alisation de l&#39;objet du pr&eacute;sent contrat. A cette fin, le Client d&eacute;signe deux interlocuteurs privil&eacute;gi&eacute;s (MM. ____________________), pour assurer le dialogue dans les diverses &eacute;tapes de la mission contract&eacute;e.</p>  <p><strong>4.2 (Clause facultative :&nbsp;Obligation du Client. Libre acc&egrave;s aux informations)</strong></p>  <p>Le Prestataire pourra avoir un acc&egrave;s libre &agrave; certaines cat&eacute;gories d&#39;informations. (Voir clause 4.1 pr&eacute;c&eacute;dente.)</p>  <p><strong>4.3 (Clause facultative : Obligation de r&eacute;ception)</strong></p>  <p>A la date du _________________, le Prestataire devra remettre un pr&eacute;-rapport soumis &agrave; la validation expresse du Client, pour que la phase suivante de la mission puisse recevoir ex&eacute;cution.</p>  <p><strong>Article 5 &ndash; Calendrier. D&eacute;lais</strong></p>  <p>La phase 1 d&eacute;finie au cahier des charges annex&eacute; aux pr&eacute;sentes devra &ecirc;tre achev&eacute;e au plus tard le _____________.</p>  <p>La phase 2, assortie de la remise du pr&eacute;-rapport devra &ecirc;tre achev&eacute;e au plus tard, le ______________ .</p>  <p>La phase 3 et le rapport terminal devront &ecirc;tre d&eacute;livr&eacute;s au plus tard le _______.</p>  <p><strong>Article 6 - Nature des obligations</strong></p>  <p>Pour l&#39;accomplissement des diligences et prestations pr&eacute;vues &agrave; l&#39;Article premier ci-dessus, le Prestataire s&#39;engage &agrave; donner ses meilleurs soins, conform&eacute;ment aux r&egrave;gles de l&#39;art. La pr&eacute;sente obligation, n&#39;est, de convention expresse, que pure obligation de moyens.</p>  <p>6.1 (Clause facultative)</p>  <p>La responsabilit&eacute; du Prestataire n&#39;est pas engag&eacute;e dans la mesure o&ugrave; le pr&eacute;judice que subirait le Client n&#39;est pas caus&eacute; par une faute intentionnelle ou lourde des employ&eacute;s du Prestataire.</p>  <p><strong>Article 7 - Assurance qualit&eacute;</strong></p>  <p>Le prestataire de services s&#39;engage &agrave; maintenir un programme d&#39;assurance qualit&eacute; pour les services d&eacute;sign&eacute;s ci-apr&egrave;s conform&eacute;ment aux r&egrave;gles d&#39;assurance qualit&eacute;.</p>  <p><strong>Article 8 - Obligation de confidentialit&eacute;</strong></p>  <p>Le prestataire consid&egrave;rera comme strictement confidentiel, et s&#39;interdit de divulguer, toute information, document, donn&eacute;e ou concept, dont il pourra avoir connaissance &agrave; l&#39;occasion du pr&eacute;sent contrat. Pour l&#39;application de la pr&eacute;sente clause, le prestataire r&eacute;pond de ses salari&eacute;s comme de lui-m&ecirc;me. Le prestataire, toutefois, ne saurait &ecirc;tre tenu pour responsable d&#39;aucune divulgation si les &eacute;l&eacute;ments divulgu&eacute;s &eacute;taient dans le domaine public &agrave; la date de la divulgation, ou s&#39;il en avait d&eacute;j&agrave; connaissance ant&eacute;rieurement &agrave; la date de signature du pr&eacute;sent contrat, ou s&#39;il les obtenait de tiers par des moyens l&eacute;gitimes.</p>  <p><strong>Article 9 - Propri&eacute;t&eacute; des r&eacute;sultats</strong></p>  <p>De convention expresse, les r&eacute;sultats de l&#39;&eacute;tude seront en la pleine ma&icirc;trise du Client, &agrave; compter du paiement int&eacute;gral de la prestation et le Client pourra en disposer comme il l&#39;entend.</p>  <p>Le Prestataire, pour sa part, s&#39;interdit de faire &eacute;tat des r&eacute;sultats dont il s&#39;agit et de les utiliser de quelque mani&egrave;re, sauf &agrave; obtenir pr&eacute;alablement l&#39;autorisation &eacute;crite du client.</p>  <p><strong>Article 10 - P&eacute;nalit&eacute;s</strong></p>  <p>Toute m&eacute;connaissance des d&eacute;lais stipul&eacute;s &agrave; l&#39;article 5 ci-dessus, engendrera l&#39;obligation pour le Prestataire de payer au client la somme de _____________ euros, par jour de retard.</p>  <p><strong>Article 11 - R&eacute;siliation. Sanction</strong></p>  <p>Tout manquement de l&#39;une ou l&#39;autre des parties aux obligations qu&#39;elle a en charge, aux termes des articles (...), (...), ci-dessus, entra&icirc;nera, si bon semble au cr&eacute;ancier de l&#39;obligation inex&eacute;cut&eacute;e, la r&eacute;siliation de plein droit au pr&eacute;sent contrat, quinze jours apr&egrave;s mise en demeure d&#39;ex&eacute;cuter par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception demeur&eacute;e sans effet, sans pr&eacute;judice de tous dommages et int&eacute;r&ecirc;ts.</p>  <p><strong>Article 12 - Sous-traitance</strong></p>  <p>Les t&acirc;ches pr&eacute;cis&eacute;es &agrave; l&#39;Article premier ne seront pour ce qui concerne les phases 1, 2 et 3, non prises en charge par le Prestataire, mais seront ex&eacute;cut&eacute;es par la soci&eacute;t&eacute; _____________, en sous-traitance, ce que reconna&icirc;t et accepte le Client.</p>  <p>Le prestataire s&#39;interdit de sous-traiter &agrave; quiconque la r&eacute;alisation des travaux d&eacute;finis &agrave; l&#39;Article 1.</p>  <p><strong>Article 13 - Clause de hardship</strong></p>  <p>Les parties reconnaissent que le pr&eacute;sent accord ne constitue pas une base &eacute;quitable et raisonnable de leur coop&eacute;ration.</p>  <p>Dans le cas o&ugrave; les donn&eacute;es sur lesquelles est bas&eacute; cet accord sont modifi&eacute;es dans des proportions telles que l&#39;une ou l&#39;autre des parties rencontre des difficult&eacute;s s&eacute;rieuses et&nbsp;impr&eacute;visibles, elles se consulteront mutuellement et devront faire preuve de compr&eacute;hension mutuelle en vue de faire les ajustements qui appara&icirc;traient n&eacute;cessaires &agrave; la suite de circonstances qui n&#39;&eacute;taient pas raisonnablement pr&eacute;visibles &agrave; la date de conclusion du pr&eacute;sent accord et ce, afin que renaissent les conditions d&#39;un accord &eacute;quitable.</p>  <p>La partie qui consid&egrave;re que les conditions &eacute;nonc&eacute;es au paragraphe ci-dessus sont remplies en avisera l&#39;autre partie par lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception, en pr&eacute;cisant la date et la nature du ou des &eacute;v&eacute;nements &agrave; l&#39;origine du changement all&eacute;gu&eacute; par elle en chiffrant le montant du pr&eacute;judice financier actuel ou &agrave; venir et en faisant une proposition de d&eacute;dommagement pour rem&eacute;dier &agrave; ce changement. Toute signification adress&eacute;e plus de douze (12) jours&nbsp;apr&egrave;s la survenance de l&#39;&eacute;v&eacute;nement par la partie &agrave; l&#39;origine de la signification n&#39;aura aucun effet.</p>  <p><strong>Article 14 - Force majeure</strong></p>  <p>On entend par force majeure des &eacute;v&eacute;nements de guerre d&eacute;clar&eacute;s ou non d&eacute;clar&eacute;s, de gr&egrave;ve g&eacute;n&eacute;rale de travail, de maladies &eacute;pid&eacute;miques, de mise en quarantaine, d&#39;incendie, de crues exceptionnelles, d&#39;accidents ou d&#39;autres &eacute;v&eacute;nements ind&eacute;pendants de la volont&eacute; des deux parties. Aucune des deux parties ne sera tenue responsable du retard constat&eacute; en raison des &eacute;v&eacute;nements de force majeure.</p>  <p>En cas de force majeure, constat&eacute;e par l&#39;une des parties, celle-ci doit en informer l&#39;autre partie par &eacute;crit dans les meilleurs d&eacute;lais par &eacute;crit, t&eacute;lex. L&#39;autre partie disposera de dix jours pour la constater.</p>  <p>Les d&eacute;lais pr&eacute;vus pour la livraison seront automatiquement d&eacute;cal&eacute;s en fonction de la dur&eacute;e de la force majeure.</p>  <p><strong>Article 15 - Loi applicable. Texte original</strong></p>  <p>Le contrat est r&eacute;gi par la loi du pays o&ugrave; le fabricant a son si&egrave;ge social. Le texte ______&nbsp;[indication de la langue] du pr&eacute;sent contrat fait foi comme texte original.</p>  <p><strong>Article 16 - Comp&eacute;tence</strong></p>  <p>Toutes contestations qui d&eacute;coulent du pr&eacute;sent contrat ou qui s&#39;y rapportent seront tranch&eacute;es d&eacute;finitivement suivant le r&egrave;glement de Conciliation et d&#39;Arbitrage de la Chambre de Commerce Internationale sans aucun recours aux tribunaux ordinaires par un ou plusieurs arbitres nomm&eacute;s conform&eacute;ment &agrave; ce r&egrave;glement et dont la sentence a un caract&egrave;re obligatoire. Le tribunal arbitral sera juge de sa propre comp&eacute;tence et de la validit&eacute; de la convention d&#39;arbitrage.</p>  <p>Fait le _________ &agrave; ____________________&nbsp;en 6 (six)&nbsp;exemplaires.</p>  <p>Le Prestataire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Le Client</p>  <p>___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___________________________</p>', '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `contrats_types`
--

CREATE TABLE `contrats_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrats_types`
--

INSERT INTO `contrats_types` (`id`, `entreprise_id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(12, 1, 'Contrat de conception', 'contration de création de site web', '2021-12-10 23:12:46', '2021-12-10 23:12:46'),
(16, 603, 'Contrat de conception', 'dd', '2022-01-07 20:01:32', '2022-01-07 20:01:32'),
(17, 603, 'Rem optio laborum', 'Perferendis ipsam au', '2022-01-07 20:12:38', '2022-01-07 20:12:38'),
(18, 605, 'Non classée', 'Ceci est le modèle de type contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(19, 607, 'Non classée', 'Ceci est le modèle de type contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(20, 609, 'Non classée', 'Ceci est le modèle de type contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(21, 610, 'Non classée', 'Ceci est le modèle de type contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(22, 611, 'Non classée', 'Ceci est le modèle de type contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(23, 612, 'Non classée', 'Ceci est le modèle de type contrat par défaut crée par à l\'ouverture de votre compte.. pour les contrats non classés', '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `controls`
--

CREATE TABLE `controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `entreprise_controled_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `controls`
--

INSERT INTO `controls` (`id`, `entreprise_id`, `entreprise_controled_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 603, 'yes', '2022-01-06 16:52:38', '2022-01-06 16:52:38'),
(2, 2, 602, 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(200) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(20) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depenses_simple_id` int(20) DEFAULT NULL,
  `facture_id` int(20) DEFAULT NULL,
  `cheque_id` int(20) DEFAULT NULL,
  `credit_fournisseur_id` int(20) DEFAULT NULL,
  `total_sans_taxe` float DEFAULT NULL,
  `taxe` float DEFAULT 0,
  `total` float DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intitule_source` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paiementsource_id` int(11) DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'draft',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `entreprise_id`, `clients_entreprise_id`, `fournisseur_id`, `type`, `depenses_simple_id`, `facture_id`, `cheque_id`, `credit_fournisseur_id`, `total_sans_taxe`, `taxe`, `total`, `note`, `source`, `intitule_source`, `paiementsource_id`, `status`, `created_at`, `updated_at`) VALUES
(123, 611, NULL, 46, 'facture', NULL, 114, NULL, NULL, 300533, 4515.99, 305049, NULL, NULL, 'source introuvable', NULL, 'validated', '2022-02-02', '2022-02-03 02:47:27'),
(124, 611, NULL, 46, 'cheque', NULL, NULL, 21, NULL, 150000, 4500, 154500, NULL, NULL, 'introuvable', NULL, 'validated', '2022-02-02', '2022-02-02 22:29:19'),
(125, 611, 100, NULL, 'credit', NULL, NULL, NULL, 9, 3000, 90, 3090, NULL, NULL, 'source introuvable', NULL, 'validated', '2022-02-02', '2022-02-03 02:48:20'),
(126, 611, 100, NULL, 'depense', 20, NULL, NULL, NULL, 453000, 9090, 462090, NULL, NULL, 'source introuvable', NULL, 'validated', '2022-02-03', '2022-02-03 02:48:52'),
(127, 611, NULL, 46, 'cheque', NULL, NULL, 22, NULL, 300600, 9018, 309618, NULL, NULL, 'source introuvable', NULL, 'validated', '2022-02-03', '2022-02-03 02:51:24'),
(129, 610, 99, NULL, 'depense', 21, NULL, NULL, NULL, 320.02, 0, 320.02, NULL, NULL, 'source introuvable', NULL, 'validated', '2022-02-03', '2022-02-03 20:17:41'),
(130, 610, NULL, 45, 'cheque', NULL, NULL, 23, NULL, 33, 0, 33, NULL, NULL, 'introuvable', NULL, 'validated', '2022-02-03', '2022-02-03 13:23:23'),
(131, 610, NULL, 47, 'facture', NULL, 120, NULL, NULL, 19, 0, 19, NULL, NULL, NULL, NULL, 'validated', '2022-02-03', '2022-02-03 21:16:44');

-- --------------------------------------------------------

--
-- Structure de la table `depenses_paniers`
--

CREATE TABLE `depenses_paniers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(200) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `depense_id` int(11) DEFAULT NULL,
  `facture_id` int(200) DEFAULT NULL,
  `fournisseur_id` int(20) DEFAULT NULL,
  `comptes_comptable_id` int(20) DEFAULT NULL,
  `article_id` int(20) DEFAULT NULL,
  `qte` int(20) DEFAULT NULL,
  `designation` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant` float NOT NULL,
  `montant_taxe` float NOT NULL,
  `taxe_id` int(20) DEFAULT NULL,
  `taux_taxe` float NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depenses_paniers`
--

INSERT INTO `depenses_paniers` (`id`, `entreprise_id`, `clients_entreprise_id`, `depense_id`, `facture_id`, `fournisseur_id`, `comptes_comptable_id`, `article_id`, `qte`, `designation`, `description`, `montant`, `montant_taxe`, `taxe_id`, `taux_taxe`, `total`, `created_at`, `updated_at`) VALUES
(132, 610, 99, NULL, 101, NULL, NULL, 80, 1, NULL, '0', 19, 0, NULL, 0, 19, '2022-02-01 20:21:23', '2022-02-01 20:21:23'),
(135, 610, NULL, 111, NULL, 45, 47, NULL, NULL, 'Diallo', NULL, 0, 0, NULL, 0, 0, '2022-02-01 21:02:05', '2022-02-01 21:02:05'),
(136, 610, NULL, 112, NULL, 45, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-01 21:03:54', '2022-02-01 21:03:54'),
(137, 610, NULL, 113, NULL, 45, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-01 21:06:11', '2022-02-01 21:06:11'),
(138, 610, 99, NULL, 107, NULL, NULL, 80, 1, NULL, '0', 19, 0, NULL, 0, 19, '2022-02-01 22:42:01', '2022-02-01 22:42:01'),
(139, 610, 99, NULL, 108, NULL, NULL, 80, 3, NULL, '0', 57, 0, NULL, 0, 57, '2022-02-01 22:42:42', '2022-02-01 22:42:42'),
(140, 610, 99, NULL, 108, NULL, NULL, 80, 1, NULL, '0', 19, 0, NULL, 0, 19, '2022-02-01 22:42:42', '2022-02-01 22:42:42'),
(141, 610, NULL, 114, NULL, 45, 47, NULL, NULL, 'Diallo', NULL, 300, 0, NULL, 0, 300, '2022-02-01 22:45:26', '2022-02-01 22:45:26'),
(142, 610, NULL, 114, NULL, 45, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-01 22:45:26', '2022-02-01 22:45:26'),
(143, 610, 99, 115, NULL, NULL, 47, NULL, NULL, 'Diallo', '-', 200, 0, NULL, 0, 200, '2022-02-01 22:46:04', '2022-02-01 22:46:04'),
(144, 610, 99, 115, NULL, NULL, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-01 22:46:04', '2022-02-01 22:46:04'),
(145, 610, NULL, 116, NULL, 45, 47, NULL, NULL, 'Diallo', '-', 300, 0, NULL, 0, 300, '2022-02-01 22:46:32', '2022-02-01 22:46:32'),
(146, 610, NULL, 116, NULL, 45, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-01 22:46:32', '2022-02-01 22:46:32'),
(147, 610, 99, 117, NULL, NULL, 47, NULL, NULL, 'Diallo', NULL, 3004, 0, 48, 0, 3004, '2022-02-01 22:47:11', '2022-02-01 22:47:11'),
(148, 610, 99, 117, NULL, NULL, NULL, 80, 4, NULL, '-', 76, 0, NULL, 0, 76, '2022-02-01 22:47:11', '2022-02-01 22:47:11'),
(149, 611, NULL, 118, NULL, 46, 49, NULL, NULL, 'Client', NULL, 20000, 0, 49, 0, 20000, '2022-02-01 23:00:15', '2022-02-01 23:00:15'),
(150, 611, NULL, 118, NULL, 46, NULL, 81, 4, NULL, '-', 600000, 0, NULL, 0, 600000, '2022-02-01 23:00:15', '2022-02-01 23:00:15'),
(151, 611, 100, 119, NULL, NULL, 49, NULL, NULL, 'Client', '-', 3000, 0, NULL, 0, 3000, '2022-02-01 23:00:49', '2022-02-01 23:00:49'),
(152, 611, 100, 119, NULL, NULL, NULL, 81, 2, NULL, '-', 300000, 0, NULL, 0, 300000, '2022-02-01 23:00:49', '2022-02-01 23:00:49'),
(153, 611, NULL, 120, NULL, 46, 49, NULL, NULL, 'Client', '-', 10000, 300, 50, 3, 10300, '2022-02-01 23:02:25', '2022-02-01 23:02:25'),
(154, 611, NULL, 120, NULL, 46, NULL, 81, 2, NULL, '-', 300000, 9000, 50, 3, 309000, '2022-02-01 23:02:25', '2022-02-01 23:02:25'),
(157, 611, 100, NULL, 112, NULL, NULL, 81, 2, NULL, '0', 300000, 9000, 50, 3, 309000, '2022-02-01 23:08:48', '2022-02-01 23:08:48'),
(158, 611, 100, NULL, 112, NULL, NULL, 81, 2, NULL, '0', 300000, 0, NULL, 0, 300000, '2022-02-01 23:08:48', '2022-02-01 23:08:48'),
(159, 611, NULL, 118, NULL, 46, 48, NULL, NULL, 'Achat de marchandise', '-', 2000, 0, NULL, 0, 2000, '2022-02-01 23:27:10', '2022-02-01 23:27:10'),
(161, 611, 100, NULL, 112, NULL, NULL, 81, 6, NULL, '-', 900000, 0, NULL, 0, 900000, '2022-02-01 23:28:27', '2022-02-01 23:28:27'),
(162, 611, 100, NULL, 111, NULL, NULL, 81, 1, 'Meuble Télé + Rangement', '-', 150000, 0, NULL, 0, 150000, '2022-02-02 16:17:08', '2022-02-02 16:17:08'),
(163, 611, 100, NULL, 111, NULL, NULL, 81, 3, 'Meuble Télé + Rangement', '-', 450000, 0, NULL, 0, 450000, '2022-02-02 16:17:08', '2022-02-02 16:17:08'),
(164, 611, 100, 121, NULL, NULL, 49, NULL, NULL, 'Client', NULL, 0, 0, NULL, 0, 0, '2022-02-02 21:08:15', '2022-02-02 21:08:15'),
(165, 611, NULL, 122, NULL, 46, NULL, 81, 1, NULL, '-', 150000, 0, NULL, 0, 150000, '2022-02-02 22:04:21', '2022-02-02 22:04:21'),
(166, 611, NULL, 123, NULL, 46, 49, NULL, NULL, 'Client', NULL, 200, 6, 50, 3, 206, '2022-02-02 22:28:53', '2022-02-02 22:28:53'),
(167, 611, NULL, 123, NULL, 46, NULL, 81, 1, NULL, '-', 150000, 0, NULL, 0, 150000, '2022-02-02 22:28:53', '2022-02-02 22:28:53'),
(168, 611, NULL, 124, NULL, 46, NULL, 81, 1, NULL, '-', 150000, 4500, 50, 3, 154500, '2022-02-02 22:29:19', '2022-02-02 22:29:19'),
(169, 611, 100, 125, NULL, NULL, 49, NULL, NULL, 'Client', NULL, 1000, 30, 50, 3, 1030, '2022-02-02 22:30:34', '2022-02-02 22:30:34'),
(170, 611, 100, NULL, 115, NULL, NULL, 81, 1, 'Meuble Télé + Rangement', '0', 150000, 0, NULL, 0, 150000, '2022-02-02 23:04:30', '2022-02-02 23:04:30'),
(171, 611, 100, NULL, 116, NULL, NULL, 81, 1, 'Meuble Télé + Rangement', '0', 150000, 0, NULL, 0, 150000, '2022-02-02 23:38:02', '2022-02-02 23:38:02'),
(172, 611, 100, NULL, 116, NULL, NULL, 81, 1, 'Meuble Télé + Rangement', '-', 150000, 0, NULL, 0, 150000, '2022-02-02 23:38:38', '2022-02-02 23:38:38'),
(173, 611, 100, 126, NULL, NULL, NULL, 81, 1, NULL, '-', 150000, 0, NULL, 0, 150000, '2022-02-03 00:01:49', '2022-02-03 00:01:49'),
(174, 611, NULL, 123, NULL, 46, 49, NULL, NULL, 'Client', '-', 333, 9.99, 50, 3, 342.99, '2022-02-03 02:47:27', '2022-02-03 02:47:27'),
(175, 611, NULL, 123, NULL, 46, NULL, 81, 1, NULL, '-', 150000, 4500, 50, 3, 154500, '2022-02-03 02:47:27', '2022-02-03 02:47:27'),
(176, 611, 100, 125, NULL, NULL, 49, NULL, NULL, 'Client', '-', 2000, 60, 50, 3, 2060, '2022-02-03 02:48:20', '2022-02-03 02:48:20'),
(177, 611, 100, 126, NULL, NULL, 49, NULL, NULL, 'Client', '-', 3000, 90, 50, 3, 3090, '2022-02-03 02:48:52', '2022-02-03 02:48:52'),
(178, 611, 100, 126, NULL, NULL, NULL, 81, 2, NULL, '-', 300000, 9000, 50, 3, 309000, '2022-02-03 02:48:52', '2022-02-03 02:48:52'),
(179, 611, NULL, 127, NULL, 46, 49, NULL, NULL, 'Client', '-', 300, 9, 50, 3, 309, '2022-02-03 02:50:05', '2022-02-03 02:50:05'),
(180, 611, NULL, 127, NULL, 46, NULL, 81, 1, NULL, '-', 150000, 4500, 50, 3, 154500, '2022-02-03 02:50:05', '2022-02-03 02:50:05'),
(181, 611, NULL, 127, NULL, 46, 49, NULL, NULL, 'Client', '-', 300, 9, 50, 3, 309, '2022-02-03 02:51:24', '2022-02-03 02:51:24'),
(182, 611, NULL, 127, NULL, 46, NULL, 81, 1, NULL, '-', 150000, 4500, 50, 3, 154500, '2022-02-03 02:51:24', '2022-02-03 02:51:24'),
(183, 611, 100, NULL, 115, NULL, NULL, 81, 1, 'Meuble Télé + Rangement', '-', 150000, 4500, 50, 3, 154500, '2022-02-03 02:53:12', '2022-02-03 02:53:12'),
(184, 611, 100, NULL, 116, NULL, NULL, 81, 1, 'Meuble Télé + Rangement', '-', 150000, 4500, 50, 3, 154500, '2022-02-03 02:54:34', '2022-02-03 02:54:34'),
(187, 610, 99, 129, NULL, NULL, 47, NULL, NULL, 'Diallo', '-', 0, 0, NULL, 0, 0, '2022-02-03 13:23:02', '2022-02-03 13:23:02'),
(188, 610, 99, 129, NULL, NULL, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-03 13:23:02', '2022-02-03 13:23:02'),
(189, 610, NULL, 130, NULL, 45, 47, NULL, NULL, 'Diallo', '-', 33, 0, NULL, 0, 33, '2022-02-03 13:23:23', '2022-02-03 13:23:23'),
(192, 610, 99, 129, NULL, NULL, 47, NULL, NULL, 'Diallo', '-', 100.34, 0, NULL, 0, 100.34, '2022-02-03 20:17:09', '2022-02-03 20:17:09'),
(193, 610, 99, 129, NULL, NULL, 47, NULL, NULL, 'Diallo', '-', 100.34, 0, NULL, 0, 100.34, '2022-02-03 20:17:16', '2022-02-03 20:17:16'),
(194, 610, 99, 129, NULL, NULL, 47, NULL, NULL, 'Diallo', '-', 100.34, 0, NULL, 0, 100.34, '2022-02-03 20:17:41', '2022-02-03 20:17:41'),
(195, 610, 99, NULL, 118, NULL, NULL, 80, 1, 'Emi Guzman', '-', 19, 0, NULL, 0, 19, '2022-02-03 20:43:57', '2022-02-03 20:43:57'),
(196, 610, 99, NULL, 118, NULL, NULL, 80, 1, 'Emi Guzman', '-', 19, 0, NULL, 0, 19, '2022-02-03 20:44:22', '2022-02-03 20:44:22'),
(197, 610, 99, NULL, 119, NULL, NULL, 80, 1, 'Emi Guzman', '0', 19, 0, NULL, 0, 19, '2022-02-03 20:44:39', '2022-02-03 20:44:39'),
(198, 610, NULL, 131, NULL, 47, NULL, 80, 1, NULL, '-', 19, 0, NULL, 0, 19, '2022-02-03 21:16:44', '2022-02-03 21:16:44'),
(199, 610, NULL, 131, NULL, 47, NULL, NULL, 1, NULL, '-', 0, 0, NULL, 0, 0, '2022-02-03 21:16:44', '2022-02-03 21:16:44');

-- --------------------------------------------------------

--
-- Structure de la table `depenses_simples`
--

CREATE TABLE `depenses_simples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depense_id` int(20) NOT NULL,
  `entreprise_id` int(230) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `paiements_mode_id` int(11) DEFAULT NULL,
  `reference` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depenses_simples`
--

INSERT INTO `depenses_simples` (`id`, `depense_id`, `entreprise_id`, `clients_entreprise_id`, `fournisseur_id`, `paiements_mode_id`, `reference`, `note`, `date_paiement`, `created_at`, `updated_at`) VALUES
(18, 115, 610, 99, NULL, 150, '2', NULL, '2022-02-01', '2022-02-01 22:46:04', '2022-02-01 22:46:04'),
(19, 119, 611, 100, NULL, 153, '002', NULL, '2022-02-01', '2022-02-01 23:00:49', '2022-02-01 23:00:49'),
(20, 126, 611, 100, NULL, 153, '33', NULL, '2022-02-03', '2022-02-03 00:01:49', '2022-02-03 00:01:49'),
(21, 129, 610, 99, NULL, 150, '22', NULL, '2022-02-03', '2022-02-03 13:23:02', '2022-02-03 13:23:02');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `cc_cci` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_facturation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` date NOT NULL,
  `numero_devis` bigint(20) NOT NULL,
  `message_devis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_releve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'deivis',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `entreprise_id`, `clients_entreprise_id`, `cc_cci`, `adresse_facturation`, `expiration`, `numero_devis`, `message_devis`, `message_releve`, `status`, `created_at`, `updated_at`) VALUES
(1, 161, 26, 'Omnis consequatur harum sequi earum voluptates error. Doloribus nulla et commodi occaecati. Ipsum eos iure sequi ea similique eius magni.', 'Molestias natus veritatis aliquam iure fugiat corporis quos. Et unde alias eum iusto ipsum.', '2009-02-11', 879765, 'Mollitia delectus magnam libero voluptatibus ad ipsa. Placeat quos est ut aut ad sed tempore. Qui ipsum magnam et hic soluta.', 'Enim dolorum quaerat dicta aliquid. Numquam quam eligendi voluptatibus omnis dolor quos. At eos iure qui. Qui nobis et autem architecto eum.', 'inventore', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(2, 164, 27, 'Cumque possimus nihil sit voluptatem pariatur sit dolorem. Ea nisi labore animi in modi. Id est placeat est eos et doloribus ab tenetur.', 'Delectus harum qui et consectetur architecto maiores. Eum eos non est. Ut distinctio at quia sunt voluptas dolor quam.', '2020-12-27', 925, 'Voluptatem voluptas unde occaecati. Molestias accusamus accusantium aut nobis. Non numquam veritatis laborum eaque occaecati at et.', 'Sunt est eius enim voluptas magni. Atque voluptatem aut nesciunt aut. Sit perferendis qui fugit doloribus porro id.', 'debitis', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(3, 167, 28, 'Mollitia molestiae minus sunt delectus quia perferendis qui. Officiis excepturi quisquam aut repudiandae. Esse neque quasi aut eos consectetur veritatis nulla minus. Ea sequi omnis et non.', 'At nesciunt et ut qui necessitatibus. Rerum dolore quod laborum aliquid aliquam ut officia. Atque eius omnis enim nobis dicta occaecati. Nihil quo consequatur sit ullam quia cupiditate repellendus.', '1995-09-13', 844, 'Ex aliquid sapiente velit. Nobis distinctio necessitatibus voluptatem quaerat voluptate magni. Est quaerat perspiciatis odio soluta sunt.', 'Id non labore quis repudiandae omnis. Asperiores eos sint optio. Sed expedita et labore ut laboriosam et sit.', 'saepe', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(4, 170, 29, 'Qui rerum consequatur ex laborum. Dolores quod cumque quis voluptas veniam adipisci. Eligendi dolor in et illum nesciunt. Vero iure et voluptates molestias rem expedita velit.', 'Vel officiis similique laborum ut omnis aut. Aut magni voluptatem doloremque rem quibusdam cum. Adipisci sunt at non harum nihil cum et. Atque quia hic qui.', '1977-09-29', 2840210, 'Qui est temporibus et omnis corrupti eos voluptatem. Hic vel earum accusantium sapiente. Omnis rerum autem accusamus quibusdam quae rem facilis ad.', 'Dolor ut consequatur non ratione. Qui quam ut molestiae quasi beatae commodi qui. Architecto nihil ut reiciendis voluptate enim voluptas vel. Nulla debitis deserunt laudantium explicabo.', 'aut', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(5, 173, 30, 'Et reprehenderit ratione ab qui temporibus. Ad perferendis voluptatem minima corporis. Quo voluptas beatae eum accusamus corrupti. Aut qui neque incidunt.', 'Nesciunt ut repellat suscipit suscipit voluptatem provident. Vel est quo fugiat ipsam id rem veniam. Voluptatum corrupti dolores suscipit expedita voluptates velit magnam.', '1975-04-28', 6757, 'Quidem non doloribus quae culpa. Et facilis natus culpa atque veniam et nihil voluptas. Voluptatem commodi sed nulla illum provident.', 'Laboriosam aliquid ab aut assumenda harum. Ad repudiandae ab tenetur voluptatem veritatis perferendis. Voluptate tempore nostrum maxime sint. Officiis minima dignissimos quo vitae.', 'minus', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(6, 176, 31, 'Et explicabo et distinctio ipsa id deleniti. Aut et fugiat animi hic voluptas quia. Est qui et non id voluptas totam. Laudantium rem cum totam ad qui voluptatibus.', 'Placeat error maxime tempora saepe dolorem. Blanditiis aliquam est sunt accusantium dolor et quis amet. Aliquam ipsum porro est ut. Sunt id voluptates molestiae sit non.', '2004-05-14', 5, 'Maiores quisquam aut neque molestiae et. Ab delectus mollitia atque a in corrupti architecto itaque. Aliquid officiis et nesciunt. Officiis eum saepe sint dolores ipsam quam.', 'Voluptatem odit qui sunt accusantium. Facere et deserunt dolor ea. At est fugit soluta numquam voluptate quidem. Ducimus vel praesentium non eveniet vel.', 'et', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(7, 180, 32, 'Esse molestias officiis nesciunt inventore nesciunt qui consequatur excepturi. Qui ducimus saepe delectus accusamus. Amet dolores sed amet temporibus et ut consequatur.', 'Qui earum facere dolore qui nam eum quos. Delectus quas ullam at quia illo eum maiores quia. Quibusdam dolores repellat iste voluptas ut officiis exercitationem.', '1984-05-17', 88222111, 'Voluptatum quas exercitationem iste molestias cum quos autem. Voluptas perspiciatis nihil maiores enim. Soluta et autem libero. Distinctio id iure officia officiis aliquam omnis omnis.', 'Aut in error sunt et. Quo maxime non non illum qui dolor quo. Et officiis deleniti praesentium.', 'aut', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(8, 184, 33, 'Non doloribus et atque molestiae repellat corporis doloribus quaerat. Voluptas mollitia quia consequatur minima ipsam. Soluta optio est rerum ut.', 'Laboriosam laudantium dolores dolorem placeat omnis. Optio asperiores non non magni et nobis. Voluptatem beatae dolores ut ea dignissimos explicabo.', '1974-04-23', 491607058, 'Neque dignissimos omnis soluta. Quis similique quod saepe aspernatur quisquam dolore temporibus. Facere sit ipsa esse dolorem ipsum.', 'Enim ullam et quidem voluptatem eligendi est. Neque odit nobis porro iste ut. Dolor doloribus et placeat aut eius.', 'rerum', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(9, 188, 34, 'Ut soluta voluptas recusandae. Et velit voluptates assumenda dolore sit. Sint eius ab placeat hic possimus earum molestiae similique.', 'Ut voluptatem ea tempora consequatur illo. Amet ipsa aliquam occaecati quas aut minus. Alias fugit ad ut.', '1983-10-05', 94, 'Est tempora quia labore et est doloremque. Nihil facere unde dolore harum ut dignissimos. Sunt qui vel est exercitationem. Sed iusto asperiores aut tempora. Eum alias error enim fugit.', 'Iusto voluptas beatae cumque voluptatem quis deleniti beatae. Ut alias eum vitae quis eum quo fugit et. Qui qui cumque enim in ut tempore accusantium assumenda.', 'corporis', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(10, 192, 35, 'Sit id sequi dignissimos culpa aspernatur. Doloremque minima ab velit consequatur autem nobis minus. Culpa autem ad eum ad ut asperiores eius.', 'Perspiciatis tempora voluptate porro veritatis ut rerum id. Incidunt nihil nam magnam quidem et. Perspiciatis nam eum accusantium optio enim quis rerum numquam.', '1997-02-26', 224580, 'Id eum distinctio repellendus. Ut totam itaque iste rerum. Labore qui laboriosam dicta dolor quia cupiditate. Corrupti sapiente impedit dolorum voluptas ipsum perferendis sunt.', 'Pariatur ipsum nesciunt ea qui. Magni quia iste sit. Nostrum et tempora quo quas odio. Odit ut provident rerum sit officia.', 'labore', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(11, 293, 43, 'Aut ut magni facilis est eum autem. Iste dolor fuga deleniti rem ut. Deleniti consequatur error distinctio velit odit ut. Totam soluta neque sunt et perspiciatis.', 'Nam minus est assumenda sint fugit est dolorem. Sequi aut cum rerum amet doloribus aperiam cupiditate. Maxime earum quod aliquam quaerat.', '1974-07-02', 4, 'In eveniet ad consequuntur officiis praesentium. Et aut eveniet quos voluptates ea necessitatibus qui voluptatum. A quo est provident quae ipsam id esse in. Quam et qui quod.', 'Odit suscipit quibusdam praesentium illum. Ad quia voluptas velit ut suscipit repellat. Non ipsam ut voluptatum ratione. Sint ea qui sit alias dolores repellat aliquid.', 'similique', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(12, 323, 49, 'In et incidunt et debitis nostrum rem. Qui repellendus aut quo perspiciatis. Ipsum qui aut doloremque. Iste ut commodi optio impedit laborum doloremque. Cum omnis autem possimus est autem et at.', 'Odio et itaque sint facere. Magnam non consequatur reprehenderit sint. Dolores porro fugiat asperiores nam iure asperiores. Vitae omnis excepturi maiores aut at neque sunt dolor.', '2015-08-20', 65, 'Repellat praesentium dicta quos molestiae. Et corrupti nobis beatae hic. Sint voluptas fuga velit in et illo quis. Cum ut officiis perspiciatis voluptates.', 'Dolor aut omnis odit autem nam. Odio voluptatem placeat labore corporis voluptas. Ratione tenetur quo eum ipsa delectus quod.', 'omnis', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(13, 353, 55, 'Minus rerum quae rerum voluptatum dolorem unde et. Qui omnis necessitatibus ipsam atque reprehenderit repellendus. Sint ex est eum dolorem similique. Dolores neque culpa omnis quod.', 'Cupiditate molestiae rem eius placeat. Nobis eos praesentium vero sunt. Vel magni est voluptas quod et quia illum.', '1972-06-17', 8, 'Asperiores dolorem quasi ipsam odio sit nostrum. Quidem voluptatem excepturi eveniet fugiat modi. Blanditiis quo necessitatibus eos fugit ut omnis.', 'Sit reprehenderit officiis laborum unde neque deleniti. Et impedit repudiandae est et libero minima delectus. Ullam est dolorum atque ipsa. Eveniet corporis et facilis debitis sunt.', 'voluptatibus', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(14, 383, 61, 'Officiis vero sunt itaque reiciendis quia. Magni incidunt fugiat error ut quisquam voluptas facilis ullam. Fuga officia voluptas autem quasi facere autem qui.', 'Sunt veritatis consectetur quasi consequatur. Fugiat ut laboriosam illo illo suscipit sint natus. Occaecati sit et qui ducimus maiores provident.', '1971-01-01', 332, 'Corrupti minima perspiciatis et rerum ipsa blanditiis. Nihil aut voluptates explicabo. Expedita nam sed nam officia neque. Sit et dolorem non maiores dignissimos.', 'Minima aliquid et corporis cum est aut ut. Cupiditate accusantium illo sunt ea tenetur officiis consequatur.', 'vel', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(15, 413, 67, 'Rerum earum temporibus beatae commodi ea non similique voluptas. Occaecati incidunt iure quo sed.', 'Iusto culpa ratione dolores ut odio officia beatae. Dolores consequatur perspiciatis aspernatur cum. Et impedit animi adipisci quos beatae deserunt. Aliquam ea officia nam vel.', '2006-04-26', 234, 'Quam fugiat deleniti quia ex. Quod minus et iusto molestiae. Et nihil itaque non eos. Officia incidunt esse quia delectus voluptas ratione reiciendis quaerat.', 'Adipisci quis similique ab minima et maxime et aut. Modi numquam incidunt ipsa nisi nisi eos aut. Omnis reprehenderit qui repellendus veritatis. Accusamus qui quis ipsa earum in libero.', 'ex', '2021-11-20 14:47:55', '2021-11-20 14:47:55');

-- --------------------------------------------------------

--
-- Structure de la table `devises_monetaires`
--

CREATE TABLE `devises_monetaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatNumeric` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sigle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precision` int(11) NOT NULL,
  `thousand_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `swap_currency_symbol` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devises_monetaires`
--

INSERT INTO `devises_monetaires` (`id`, `nom`, `code`, `formatNumeric`, `sigle`, `precision`, `thousand_separator`, `decimal_separator`, `swap_currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', 'en-IN', '$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(2, 'British Pound', 'GBP', 'en-IN', '£', 2, ',', '.', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(3, 'Euro', 'EUR', 'de-DE', '€', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(4, 'South African Rand', 'ZAR', 'de-DE', 'R', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(5, 'Danish Krone', 'DKK', NULL, 'kr', 2, '.', ',', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(6, 'Israeli Shekel', 'ILS', NULL, 'NIS ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(7, 'Swedish Krona', 'SEK', NULL, 'kr', 2, '.', ',', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(8, 'Kenyan Shilling', 'KES', NULL, 'KSh ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(9, 'Kuwaiti Dinar', 'KWD', NULL, 'KWD ', 3, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(10, 'Canadian Dollar', 'CAD', NULL, 'C$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(11, 'Philippine Peso', 'PHP', NULL, 'P ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(12, 'Indian Rupee', 'INR', NULL, '₹', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(13, 'Australian Dollar', 'AUD', NULL, '$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(14, 'Singapore Dollar', 'SGD', NULL, 'S$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(15, 'Norske Kroner', 'NOK', NULL, 'kr', 2, '.', ',', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(16, 'New Zealand Dollar', 'NZD', NULL, '$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(17, 'Vietnamese Dong', 'VND', NULL, '₫', 0, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(18, 'Swiss Franc', 'CHF', NULL, 'Fr.', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(19, 'Guatemalan Quetzal', 'GTQ', NULL, 'Q', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(20, 'Malaysian Ringgit', 'MYR', NULL, 'RM', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(21, 'Brazilian Real', 'BRL', NULL, 'R$', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(22, 'Thai Baht', 'THB', NULL, '฿', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(23, 'Nigerian Naira', 'NGN', NULL, '₦', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(24, 'Argentine Peso', 'ARS', NULL, '$', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(25, 'Bangladeshi Taka', 'BDT', NULL, 'Tk', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(26, 'United Arab Emirates Dirham', 'AED', NULL, 'DH ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(27, 'Hong Kong Dollar', 'HKD', NULL, 'HK$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(28, 'Indonesian Rupiah', 'IDR', NULL, 'Rp', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(29, 'Mexican Peso', 'MXN', NULL, '$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(30, 'Egyptian Pound', 'EGP', NULL, 'E£', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(31, 'Colombian Peso', 'COP', NULL, '$', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(32, 'West African Franc', 'XOF', 'de-DE', 'Fcfa', 0, '.', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(33, 'Chinese Renminbi', 'CNY', NULL, 'RMB ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(34, 'Rwandan Franc', 'RWF', NULL, 'RF ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(35, 'Tanzanian Shilling', 'TZS', NULL, 'TSh ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(36, 'Netherlands Antillean Guilder', 'ANG', NULL, 'NAƒ', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(37, 'Trinidad and Tobago Dollar', 'TTD', NULL, 'TT$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(38, 'East Caribbean Dollar', 'XCD', NULL, 'EC$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(39, 'Ghanaian Cedi', 'GHS', NULL, '‎GH₵', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(40, 'Bulgarian Lev', 'BGN', NULL, 'Лв.', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(41, 'Aruban Florin', 'AWG', NULL, 'Afl. ', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(42, 'Turkish Lira', 'TRY', NULL, 'TL ', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(43, 'Romanian New Leu', 'RON', NULL, 'RON', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(44, 'Croatian Kuna', 'HRK', NULL, 'kn', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(45, 'Saudi Riyal', 'SAR', NULL, '‎SِAR', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(46, 'Japanese Yen', 'JPY', NULL, '¥', 0, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(47, 'Maldivian Rufiyaa', 'MVR', NULL, 'Rf', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(48, 'Costa Rican Colón', 'CRC', NULL, '₡', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(49, 'Pakistani Rupee', 'PKR', NULL, 'Rs ', 0, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(50, 'Polish Zloty', 'PLN', NULL, 'zł', 2, '.', ',', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(51, 'Sri Lankan Rupee', 'LKR', NULL, 'LKR', 2, ',', '.', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(52, 'Czech Koruna', 'CZK', NULL, 'Kč', 2, '.', ',', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(53, 'Uruguayan Peso', 'UYU', NULL, '$', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(54, 'Namibian Dollar', 'NAD', NULL, '$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(55, 'Tunisian Dinar', 'TND', NULL, '‎د.ت', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(56, 'Russian Ruble', 'RUB', NULL, '₽', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(57, 'Mozambican Metical', 'MZN', NULL, 'MT', 2, '.', ',', 1, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(58, 'Omani Rial', 'OMR', NULL, 'ر.ع.', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(59, 'Ukrainian Hryvnia', 'UAH', NULL, '₴', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(60, 'Macanese Pataca', 'MOP', NULL, 'MOP$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(61, 'Taiwan New Dollar', 'TWD', NULL, 'NT$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(62, 'Dominican Peso', 'DOP', NULL, 'RD$', 2, ',', '.', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(63, 'Chilean Peso', 'CLP', NULL, '$', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42'),
(64, 'Serbian Dinar', 'RSD', NULL, 'RSD', 2, '.', ',', 0, '2021-12-29 00:11:42', '2021-12-29 00:11:42');

-- --------------------------------------------------------

--
-- Structure de la table `devis_articles`
--

CREATE TABLE `devis_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `devis_id` int(11) NOT NULL,
  `taxe_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT 1,
  `taux` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis_articles`
--

INSERT INTO `devis_articles` (`id`, `devis_id`, `taxe_id`, `article_id`, `qte`, `taux`, `total`, `created_at`, `updated_at`) VALUES
(1, 6, 6, 11, 0, 64, 37, '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(2, 7, 7, 12, 0, 18, 74, '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(3, 8, 8, 13, 0, 31, 90, '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(4, 9, 9, 14, 0, 83, 34, '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(5, 10, 10, 15, 0, 39, 56, '2021-11-20 14:47:38', '2021-11-20 14:47:38');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `doc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taille` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabinet_id` int(11) NOT NULL,
  `documents_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id`, `entreprise_id`, `doc`, `description`, `taille`, `cabinet_id`, `documents_type_id`, `created_at`, `updated_at`) VALUES
(1, 196, 'Culpa velit qui quis quos maiores labore quibusdam. Aut ut dolores et laboriosam assumenda.', NULL, '', 0, 1, '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(2, 197, 'Illum ut omnis assumenda. Modi adipisci qui atque aperiam. Assumenda temporibus consectetur nemo qui excepturi molestias ratione tenetur. Libero voluptatum ullam debitis numquam in.', NULL, '', 0, 2, '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(3, 198, 'Voluptatum qui non sequi rerum blanditiis qui sit rem. Sed et enim rem libero ut sequi consequatur. Nobis excepturi et alias sed totam. Sit quas ut ad in ipsa.', NULL, '', 0, 3, '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(4, 199, 'Ullam vel reiciendis velit eos nisi ipsum rerum. Fugit dolorum quis qui cumque facilis recusandae. Et id placeat deleniti ducimus voluptatem nesciunt dolores maxime.', NULL, '', 0, 4, '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(5, 200, 'Ut delectus omnis velit occaecati. Ab ut illum eum quos aut sunt aliquid voluptas. Sunt eius magni nobis et minima. Totam tempore harum aliquam aliquam.', NULL, '', 0, 5, '2021-11-20 14:47:39', '2021-11-20 14:47:39');

-- --------------------------------------------------------

--
-- Structure de la table `documents_types`
--

CREATE TABLE `documents_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(200) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documents_types`
--

INSERT INTO `documents_types` (`id`, `entreprise_id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 0, 'Nihil sit eum id vel. Iste facere numquam dolor. Eaque saepe nesciunt iure amet. Quo maxime iusto qui recusandae.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(2, 0, 'Temporibus ipsa ut quis repudiandae et atque. Sapiente minus corporis cum beatae. Est animi neque omnis distinctio.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(3, 0, 'Nulla consequatur sunt excepturi ex. Aperiam commodi aut voluptatibus. Consequatur qui sit et quisquam voluptatibus eos. Quis perferendis non repellat eaque.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(4, 0, 'Et hic consequuntur recusandae ea dicta reiciendis quis. Voluptas magnam nisi ut sapiente. Accusamus esse a voluptatem harum. Qui voluptas est reiciendis aut unde earum ipsam consectetur.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(5, 0, 'Est quia deserunt qui neque ullam. Consequuntur nobis nesciunt et earum voluptatem quo voluptas. Voluptatem voluptatem eligendi dolorum hic perspiciatis est quo.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(6, 0, 'Fugiat a facilis aut in iusto. Magnam in accusamus labore officiis soluta voluptas. Hic nesciunt perspiciatis aut totam debitis corporis autem. Rem excepturi quidem adipisci.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(7, 0, 'Libero reprehenderit accusantium enim. Ea culpa deleniti facilis. Nisi blanditiis sapiente enim libero. Sint illo ut qui et dolores. Ea consequuntur debitis reiciendis nobis consequatur esse nemo.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(8, 0, 'Quidem ut ullam omnis voluptatibus aspernatur recusandae cupiditate. Delectus nisi quis quis nam at. Voluptatem voluptates aperiam consequatur omnis nesciunt nihil voluptas aut.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(9, 0, 'Rerum rerum officiis quod asperiores dolores. Laudantium eum consequatur occaecati et id occaecati ut soluta. Sunt architecto iusto consequatur illo ipsum itaque autem. Illum rerum dicta quam repudiandae.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(10, 0, 'Et eligendi vel in quisquam id inventore. Et nobis est exercitationem quos voluptatem error voluptatum. Sunt nostrum dignissimos velit est.', '2021-11-20 14:47:39', '2021-11-20 14:47:39');

-- --------------------------------------------------------

--
-- Structure de la table `employes_entreprises`
--

CREATE TABLE `employes_entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(230) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `adresse` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postale` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_embauche` date NOT NULL,
  `poste` varchar(230) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_paiement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'jour',
  `paiements_mode_id` int(200) NOT NULL DEFAULT 1,
  `devises_monetaire_id` int(20) NOT NULL DEFAULT 1,
  `remuneration` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employes_entreprises`
--

INSERT INTO `employes_entreprises` (`id`, `entreprise_id`, `user_id`, `prenom`, `nom`, `initial`, `email`, `telephone`, `genre`, `date_naissance`, `adresse`, `ville`, `province`, `code_postale`, `pays`, `date_embauche`, `poste`, `interval_paiement`, `paiements_mode_id`, `devises_monetaire_id`, `remuneration`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Consequatur fugit n', 'Enim totam deserunt', 'CE', 'guhehiwoka@mailinator.com', '+1 (328) 502-4764', 'femme', NULL, 'Minus sunt est ut', 'Est numquam officiis', 'Sint molestiae itaq', 'Quos et iste corpori', 'Canada', '1977-11-25', 'Ex cupiditate quos o', '1', 3, 2, 19, '2021-11-20 14:47:27', '2021-12-23 08:50:56'),
(2, 1, NULL, 'Baba', 'Ly', 'BL', 'jrowe@prohaska.info', '221786080939', '', NULL, NULL, NULL, NULL, NULL, NULL, '1972-03-22', '', 'Mois', 1, 1, 35000, '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(3, 2, NULL, 'Djiby', 'Sane', 'DS', 'goyette.lucy@bashirian.com', '221786080939', 'homme', NULL, NULL, NULL, NULL, NULL, 'Sénégal', '2009-05-14', 'Dev', '30', 1, 1, 65000, '2021-11-20 14:47:30', '2022-01-08 23:32:55'),
(4, 2, NULL, 'Papa', 'Diawara', 'PD', 'kailyn.douglas@yahoo.com', '221786080939', '', NULL, NULL, NULL, NULL, NULL, NULL, '2013-01-18', '', 'Mois', 1, 1, 65000, '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(26, 1, NULL, 'In enim adipisicing', 'In autem totam conse', 'II', 'jolyhofij@mailinator.com', '+1 (933) 309-7429', 'Sénégal', NULL, 'In dolor soluta eaqu', 'Provident qui modi', 'Quos iste laborum E', 'Lorem exercitation i', 'Canada', '2020-05-31', 'Velit quibusdam qui', '1', 1, 1, 100, '2021-12-20 04:01:50', '2021-12-20 04:01:50'),
(27, 1, NULL, 'Accusamus accusamus', 'In quidem quibusdam', 'AI', 'kicaq@mailinator.com', '+1 (234) 519-8485', 'homme', NULL, 'Suscipit sequi conse', 'Iure velit dolore e', 'Aut repudiandae quae', 'Consequuntur officia', 'Sénégal', '1983-09-20', 'Velit cillum omnis l', '7', 3, 1, 83, '2021-12-23 08:46:16', '2021-12-23 08:46:16'),
(28, 603, NULL, 'Anim aute dignissimo', 'Enim eum id aut vol', 'AE', 'hopubylut@mailinator.com', '+1 (469) 346-3904', 'Canada', NULL, 'Vel officiis ut blan', 'Ipsam dolorum quis e', 'Vero molestiae tempo', 'Enim nisi et consect', 'Sénégal', '1985-01-15', 'Fugit alias molliti', '30', 1, 2, 39, '2022-01-23 18:26:16', '2022-01-23 18:26:16'),
(29, 603, NULL, 'Quae debitis sed aut', 'Autem velit illo vol', 'QA', 'byvuw@mailinator.com', '+1 (223) 493-3189', 'Canada', NULL, 'Dolor eveniet culpa', 'Rerum sit laudantium', 'Soluta itaque distin', 'Culpa fuga Libero c', 'Canada', '2001-12-31', 'Et voluptatum proide', '7', 138, 1, 90, '2022-01-23 18:26:25', '2022-01-23 18:26:25'),
(30, 603, NULL, 'Ex blanditiis volupt', 'Soluta sint assumen', 'ES', 'kolahuj@mailinator.com', '+1 (997) 453-8407', 'Sénégal', NULL, 'Adipisci quo et et q', 'Occaecat optio omni', 'Rerum rerum debitis', 'Exercitation quia co', 'Sénégal', '1980-01-19', 'Aliquip labore est l', '1', 137, 2, 100, '2022-01-23 18:27:33', '2022-01-23 18:27:33');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_propos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` double DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postale` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT 'entreprise',
  `modeles_devis_id` int(11) DEFAULT 1,
  `modeles_facture_id` int(11) DEFAULT NULL,
  `modeles_recu_id` int(11) DEFAULT NULL,
  `devises_monetaire_id` int(11) NOT NULL DEFAULT 1,
  `couleur_primaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couleur_secondaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `user_id`, `nom_entreprise`, `a_propos`, `email`, `telephone`, `portable`, `adresse`, `capital`, `logo`, `ville`, `pays`, `province`, `code_postale`, `website`, `type`, `modeles_devis_id`, `modeles_facture_id`, `modeles_recu_id`, `devises_monetaire_id`, `couleur_primaire`, `couleur_secondaire`, `created_at`, `updated_at`) VALUES
(1, 2, 'Illugraphic Concept', 'In aut ratione blanditiis nihil id consequatur soluta. Et expedita sunt tempora quis reiciendis error cumque ut.', 'support@illugraph-ic.com', '778704565', '221778908989', 'Lobatt Fall', 2500000, NULL, 'Dakar', 'Sénégal', 'Dakar', '92000', 'www.illugraph-ic.com', 'entreprise', 1, 1, 1, 1, NULL, NULL, '2021-11-20 14:47:24', '2021-12-02 20:52:07'),
(2, 2, 'Bolico Group', 'Tempore soluta quia sed id. Non quaerat sed doloribus. Commodi qui est voluptatem maiores. Asperiores quae dignissimos voluptatem non aut eos illum.', 'lueilwitz.celestine@gmail.com', '221778908989', '221778908989', 'Keur massar Pa u13', 400000, 'assets/logowhite.png ', '', NULL, '', '', '', 'entreprise', 2, 2, 2, 2, NULL, NULL, '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(601, NULL, 'Consequatur Omnis l', NULL, 'nodutumifu@mailinator.com', '+1 (328) 329-6585', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-01-03 22:37:02', '2022-01-03 22:37:02'),
(602, NULL, 'El Hadji Papa Ndiouga Diallo', NULL, 'ollaidpn1@gmail.com', '786080939', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-01-03 22:37:52', '2022-01-03 22:37:52'),
(603, NULL, 'Djibril SANE', NULL, 'djiby.sane@hotmail.fr', '0778142978', '1234567', 'N°98, Cité Air Afrique, Golf Nord Est Guédiawaye', NULL, 'storage/uploads/Entreprise/2022/February/1643739451.jpg', 'Dakar', 'Sénégal', NULL, '19415', NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-01-06 16:43:44', '2022-02-01 18:17:31'),
(604, NULL, 'Apple California', NULL, 'apple@apple.com', '02345654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:06:32', '2022-02-01 19:06:32'),
(605, NULL, 'Apple California', NULL, 'apple@apple.com', '02345654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(606, NULL, 'apple', NULL, 'apple@apple.com', '23456765\'', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:16:02', '2022-02-01 19:16:02'),
(607, NULL, 'Sony', NULL, 'Sony@Sony.com', '23456234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(608, NULL, 'Sony', NULL, 'Sony@Sony.com', '23456234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:25:14', '2022-02-01 19:25:14'),
(609, NULL, 'table', NULL, 'table@table.com', '2345672345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(610, NULL, 'chaise', NULL, 'chaise@chaise.com', '234567654', '23456', NULL, NULL, 'storage/uploads/Entreprise/2022/February/1643752973.png', NULL, 'Sénégal', NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL, NULL, '2022-02-01 19:29:03', '2022-02-01 22:02:53'),
(611, NULL, 'Sonatel Sénégal', 'sonatel', 'ollaidpn@gmail.com', '+44786080939', '1234567', 'Keur Massar', 20000000, 'storage/uploads/Entreprise/2022/February/1643756229.jpeg', 'Dakar', 'Sénégal', 'Dakar', '21000', 'www.sind-ic.com', 'entreprise', 1, NULL, NULL, 32, NULL, NULL, '2022-02-01 22:52:41', '2022-02-01 22:57:09'),
(612, NULL, 'entreprise22', NULL, 'entreprise22@entreprise22.com', '79798989898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 1, NULL, NULL, '2022-02-03 12:18:48', '2022-02-03 12:18:48');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(20) NOT NULL,
  `depense_id` int(20) DEFAULT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `paiements_modalite_id` int(11) DEFAULT NULL,
  `paiements_mode_id` int(20) DEFAULT NULL,
  `factures_article_id` int(11) DEFAULT NULL,
  `cc_cci` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_facturation` date DEFAULT NULL,
  `echeance` date DEFAULT NULL,
  `adresse_facturation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_facture` bigint(20) DEFAULT NULL,
  `date_recu` date DEFAULT NULL,
  `numero_recu` bigint(200) DEFAULT NULL,
  `reference` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_affiche` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_taxe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `taxe` float DEFAULT 0,
  `total_sans_taxe` float DEFAULT 0,
  `total` float DEFAULT 0,
  `intitule_source` varchar(230) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paiement_source_id` int(20) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `pdf_link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `entreprise_id`, `depense_id`, `clients_entreprise_id`, `paiements_modalite_id`, `paiements_mode_id`, `factures_article_id`, `cc_cci`, `date_facturation`, `echeance`, `adresse_facturation`, `numero_facture`, `date_recu`, `numero_recu`, `reference`, `message`, `message_affiche`, `has_taxe`, `taxe`, `total_sans_taxe`, `total`, `intitule_source`, `paiement_source_id`, `fournisseur_id`, `type`, `status`, `pdf_link`, `created_at`, `updated_at`) VALUES
(114, 611, 123, NULL, 188, NULL, NULL, NULL, '2022-02-02', '2022-03-04', 'Keur Massar', 234, NULL, NULL, NULL, NULL, NULL, 'no', 0, 0, 0, NULL, NULL, 46, 'depense', 'draft', NULL, '2022-02-02', '2022-02-02 22:28:53'),
(115, 611, NULL, 100, 187, NULL, NULL, NULL, '2022-02-02', '2022-02-17', 'N°98, Cité Air Afrique, Golf Nord Est Guédiawaye', 200, NULL, NULL, NULL, NULL, NULL, 'no', 4500, 300000, 304500, NULL, NULL, NULL, 'facture', 'draft', NULL, '2022-02-02', '2022-02-03 02:53:12'),
(116, 611, NULL, 100, NULL, 153, NULL, NULL, NULL, NULL, 'N°98, Cité Air Afrique, Golf Nord Est Guédiawaye', NULL, '2022-02-02', 1, '22', NULL, NULL, 'no', 4500, 450000, 454500, 'introuvable', NULL, NULL, 'recu', 'draft', NULL, '2022-02-02', '2022-02-03 02:54:34'),
(118, 610, NULL, 99, 184, NULL, NULL, NULL, '2022-02-03', '2022-02-18', 'Officia est et volup', 22, NULL, NULL, NULL, NULL, NULL, 'no', 0, 38, 38, NULL, NULL, NULL, 'facture', 'draft', '/storage/docs/facture-recu/chaise/Hess/facture N°22 pour Hess - chaise.pdf', '2022-02-03', '2022-02-03 21:23:00'),
(119, 610, NULL, 99, 183, NULL, NULL, NULL, '2022-02-03', '2022-02-03', 'Officia est et volup', 234, NULL, NULL, NULL, NULL, NULL, 'no', 0, 19, 19, NULL, NULL, NULL, 'facture', 'draft', NULL, '2022-02-03', '2022-02-03 20:44:39'),
(120, 610, 131, NULL, 184, NULL, NULL, NULL, '2022-02-03', '2022-02-18', 'Sed repudiandae blan', 22, NULL, NULL, NULL, NULL, NULL, 'no', 0, 0, 0, NULL, NULL, 47, 'depense', 'draft', NULL, '2022-02-03', '2022-02-03 21:16:44');

-- --------------------------------------------------------

--
-- Structure de la table `factures_articles`
--

CREATE TABLE `factures_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT 1,
  `taux` double NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `taxe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures_articles`
--

INSERT INTO `factures_articles` (`id`, `article_id`, `qte`, `taux`, `total`, `taxe_id`, `created_at`, `updated_at`) VALUES
(1, 6, 0, 39, 29, 1, '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(2, 7, 0, 68, 50, 2, '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(3, 8, 0, 95, 62, 3, '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(4, 9, 0, 20, 84, 4, '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(5, 10, 0, 49, 35, 5, '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(6, 16, 0, 37, 88, 11, '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(7, 17, 0, 95, 91, 12, '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(8, 18, 0, 8, 9, 13, '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(9, 19, 0, 59, 39, 14, '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(10, 20, 0, 14, 90, 15, '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(11, 21, 0, 66, 6, 16, '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(12, 22, 0, 66, 87, 17, '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(13, 23, 0, 35, 85, 18, '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(14, 24, 0, 0, 81, 19, '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(15, 25, 0, 52, 72, 20, '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(16, 27, 0, 51, 59, 21, '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(17, 28, 0, 5, 76, 22, '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(18, 30, 0, 36, 56, 23, '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(19, 31, 0, 59, 95, 24, '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(20, 33, 0, 38, 93, 25, '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(21, 34, 0, 38, 8, 26, '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(22, 36, 0, 81, 6, 27, '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(23, 37, 0, 9, 77, 28, '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(24, 39, 0, 36, 79, 29, '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(25, 40, 0, 13, 16, 30, '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(26, 41, 0, 19, 15, 31, '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(27, 42, 0, 28, 24, 32, '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(28, 43, 0, 9, 78, 33, '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(29, 44, 0, 14, 28, 34, '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(30, 45, 0, 39, 98, 35, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(31, 51, 0, 91, 96, 36, '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(32, 52, 0, 9, 79, 37, '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(33, 53, 0, 70, 26, 38, '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(34, 54, 0, 35, 24, 39, '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(35, 55, 0, 65, 40, 40, '2021-11-20 14:48:07', '2021-11-20 14:48:07');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalites`
--

CREATE TABLE `fonctionnalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `habilitation_id` int(200) NOT NULL,
  `voir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `ajouter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `supprimer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `modifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `exporter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonctionnalites`
--

INSERT INTO `fonctionnalites` (`id`, `module_id`, `habilitation_id`, `voir`, `ajouter`, `supprimer`, `modifier`, `exporter`, `created_at`, `updated_at`) VALUES
(230, 1, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(231, 2, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(232, 3, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(233, 4, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(234, 5, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(235, 6, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(236, 7, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(237, 9, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(238, 10, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(239, 11, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(240, 12, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(241, 14, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(242, 19, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(243, 20, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:44'),
(244, 21, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:45'),
(245, 22, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:49'),
(246, 15, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:45'),
(247, 16, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:45'),
(248, 17, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:45'),
(249, 18, 1, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:27:46', '2022-01-03 14:58:45'),
(250, 1, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(251, 2, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(252, 3, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(253, 4, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(254, 5, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(255, 6, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(256, 7, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(257, 9, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(258, 10, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(259, 11, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(260, 12, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(261, 14, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(266, 15, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(267, 16, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(268, 17, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48'),
(269, 18, 2, 'yes', 'yes', 'yes', 'yes', 'yes', '2022-01-03 14:59:48', '2022-01-03 14:59:48');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_pro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_chequier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telecopie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paiements_modalite_id` int(11) DEFAULT NULL,
  `numero_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comptescomptable_id` int(11) DEFAULT NULL,
  `solde_ouverture` double DEFAULT NULL,
  `date_ouverture` date DEFAULT NULL,
  `devises_monetaire_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `entreprise_id`, `prenom`, `nom`, `entreprise`, `nom_pro`, `nom_chequier`, `email`, `telephone`, `portable`, `telecopie`, `website`, `titre`, `adresse`, `ville`, `province`, `code_postal`, `pays`, `note`, `paiements_modalite_id`, `numero_compte`, `comptescomptable_id`, `solde_ouverture`, `date_ouverture`, `devises_monetaire_id`, `created_at`, `updated_at`) VALUES
(1, 49, 'Modou Fall', 'Ndiaye', 'CCBM', 'CCBM', 'CCBM', 'justine.waelchi@hayes.org', '+221 77 890 00 77', '+221 77 890 00 77', '+221 77 890 00 77', 'www.entreprise.com', 'Manager', 'Keur Masssar PA U13', 'Dakar', NULL, '12345', 'Sénégal', NULL, 1, 'Dignissimos eum qui nam omnis sunt. Non rerum aliquid rerum qui dolores nam. Eum qui impedit quasi aut. Error ut maxime neque. Ad laborum perspiciatis ipsam assumenda culpa doloribus. Ad aspernatur laudantium illo nihil doloremque eveniet sint.', 1, 63, '2005-08-11', 2, '2021-11-20 14:47:28', '2021-12-02 23:26:29'),
(2, 55, 'Makhtar', 'Gueye', 'AUchan', 'AUchan', 'AUchan', 'barrows.elyssa@rempel.net', '+221 77 890 00 77', '+221 77 890 00 77', '+221 77 890 00 77', 'www.entreprise.com', 'Manager', 'Keur Masssar PA U13', 'Dakar', NULL, '12345', 'Sénégal', 'Eum ipsum exercitationem voluptate. Iste sed consequatur nihil minus deleniti praesentium. Mollitia velit rem accusamus sint suscipit saepe.', 11, 'Et eligendi in fuga consequatur error cumque. Quia consectetur quia sit velit. Id sit officiis iure doloremque quidem.', 7, 90, '1978-06-03', 67, '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(3, 66, 'Issa', 'Camara', 'DKT', 'DKT', 'DKT', 'freda22@gmail.com', '+221 77 890 00 77', '+221 77 890 00 77', '+221 77 890 00 77', 'www.entreprise.com', 'Manager', 'Keur Masssar PA U13', 'Dakar', NULL, '12345', 'Sénégal', 'Esse qui veniam nobis quae nobis cupiditate. Dolor eum et sit quo eos. Corporis totam minima ratione repellendus ratione.', 15, 'Quam incidunt iure soluta aspernatur est saepe. Fugiat est rerum qui ut ipsum sed. Est nostrum quidem neque tempora sapiente veritatis dolorum. Qui ea accusantium molestiae mollitia.', 8, 34, '1974-05-27', 81, '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(4, 72, 'Moustapha ', 'Ndiaye', 'Muslim Store', 'Muslim Store', 'Muslim Store', 'trystan82@marks.com', '+221 77 890 00 77', '+221 77 890 00 77', '+221 77 890 00 77', 'www.entreprise.com', 'Manager', 'Keur Masssar PA U13', 'Dakar', NULL, '12345', 'Sénégal', 'Illum laboriosam blanditiis error similique non doloribus cumque. Et distinctio accusantium quaerat libero ex esse.', 17, 'Dolorem id rem quia ea repellat et. Ea repellendus quam aut corrupti dolorem. Tenetur qui quia cupiditate deleniti. Saepe et iusto deserunt ab culpa qui. Quos vero architecto illo. Voluptas in quo molestiae sit.', 9, 8, '2012-10-29', 89, '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(5, 83, 'Angelique', 'Cissé', 'Le grang QG', 'Le grang QG', 'Le grang QG', 'runolfsdottir.tamia@smith.info', '+221 77 890 00 77', '+221 77 890 00 77', '+221 77 890 00 77', 'www.entreprise.com', 'Manager', 'Keur Masssar PA U13', 'Dakar', NULL, '12345', 'Sénégal', 'Animi perferendis cupiditate architecto quas. Odit et enim numquam iste eum. Quis repellendus molestias doloribus ducimus consequatur tenetur.', 21, 'Itaque ut autem est libero et dignissimos veniam. Rerum temporibus vitae id qui culpa. Sed omnis ut consequuntur quia ullam ut fugit. Quia eaque odio voluptate earum ipsum.', 10, 71, '2018-09-09', 103, '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(41, 1, 'Ollaid', 'Ndiouuga', 'illlugraphic', 'illlugraphic', 'illlugraphic', 'ollaidpn@gmail.com', '1234567', '1234567', '345678', NULL, 'CEO', 'Keur Massar', 'Dakar', 'Dakar', '21000', 'Sénégal', NULL, 1, 'AZEER45678876543', 2, NULL, NULL, 1, '2021-11-29 04:08:59', '2021-11-29 04:08:59'),
(42, 1, 'El Hadji Papa', 'El Hadji Papa Ndiouga Diallo', 'El Hadji Papa Ndiouga Diallo', 'Diallo', 'El Hadji Papa Ndiouga Diallo', 'ollaidpn@gmail.com', '786080939', '1234567', '345678', NULL, 'Vous déménagez?', 'Keur Massar', 'Dakar', 'Dakar', '21000', 'Sénégal', NULL, 2, 'AZEER45678876543', 2, NULL, NULL, 2, '2021-12-07 14:52:17', '2021-12-07 14:52:17'),
(44, 603, 'Possimus et quia cu', 'Aliqua Enim nostrud', 'Dolorem minim quaera', 'Facilis dolore quia', 'Omnis voluptatum cum', 'tederibo@mailinator.com', '+1 (639) 186-8194', 'Fugiat sed exercitat', 'Rerum est quaerat sa', NULL, 'Eum asperiores accus', 'Ea culpa autem anim', 'Exercitationem aliqu', 'Qui accusantium sed', 'Excepturi esse place', 'Canada', NULL, 2, 'Ut fugiat quam fugi', 2, NULL, NULL, 2, '2022-01-23 18:42:43', '2022-01-23 18:42:43'),
(45, 610, 'Macy', 'Chambers', 'Megan Mcpherson', 'Jakeem Guy', 'Leonard Wooten', 'wivofug@mailinator.com', '+1 (763) 638-8286', 'Enim eveniet ex est', 'Atque a incidunt di', NULL, 'Sint lorem quidem u', 'Eu possimus placeat', 'Hic aut sunt ullamc', 'Id minus enim aut na', 'Numquam velit beatae', 'Albania', NULL, 149, '475', 47, NULL, NULL, NULL, '2022-02-01 19:45:42', '2022-02-03 21:10:28'),
(46, 611, 'Baba', 'Ly', 'BabaTech', 'BabaTech', 'BabaTech', 'babatech@sonatel.sn', '234567865', '234567865', '234567865', NULL, 'CEO', 'Keur Massar', 'Dakar', 'Dakar', '21000', 'Senegal', NULL, 1, 'AZEER45678876543', 1, NULL, NULL, 1, '2022-02-01 22:56:12', '2022-02-01 22:56:12'),
(47, 610, 'Aperiam magnam est f', 'Aut dicta provident', 'Quia itaque consecte', NULL, NULL, 'wycoqowyfe@mailinator.com', '+1 (986) 522-3916', NULL, NULL, NULL, 'Vitae dolores ex in', 'Sed repudiandae blan', 'Odit tempora explica', 'Eum et ea quas ipsa', 'Ipsum autem magni vo', 'Philippines', NULL, 149, 'Sed tenetur nulla nu', 47, NULL, NULL, NULL, '2022-02-03 21:10:35', '2022-02-03 21:10:35');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs_credits`
--

CREATE TABLE `fournisseurs_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(200) NOT NULL,
  `depense_id` int(11) NOT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `adresse_postale` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_paiement` date NOT NULL,
  `reference` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs_credits`
--

INSERT INTO `fournisseurs_credits` (`id`, `entreprise_id`, `depense_id`, `clients_entreprise_id`, `fournisseur_id`, `adresse_postale`, `date_paiement`, `reference`, `note`, `created_at`, `updated_at`) VALUES
(7, 610, 117, 99, NULL, 'ZERTZEVDcevf efov,ef ozdize foazndaef oefn,ef of', '2022-02-01', '09', NULL, '2022-02-01 22:47:11', '2022-02-01 22:47:11'),
(8, 611, 121, 100, NULL, 'ZERTZEVDcevf efov,ef ozdize foazndaef oefn,ef of', '2022-02-02', '22', NULL, '2022-02-02 21:08:15', '2022-02-02 21:08:15'),
(9, 611, 125, 100, NULL, 'N°98, Cité Air Afrique, Golf Nord Est Guédiawaye', '2022-02-02', NULL, NULL, '2022-02-02 22:30:34', '2022-02-02 22:30:34');

-- --------------------------------------------------------

--
-- Structure de la table `habilitations`
--

CREATE TABLE `habilitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `habilitation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise_id` int(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `habilitations`
--

INSERT INTO `habilitations` (`id`, `habilitation`, `entreprise_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(2, 'employe', 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(7, 'in', 2, '2022-01-03 15:42:22', '2022-01-03 15:42:22'),
(9, 'admin', 611, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(10, 'employe', 611, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(11, 'admin', 612, '2022-02-03 12:18:49', '2022-02-03 12:18:49'),
(12, 'employe', 612, '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `impots`
--

CREATE TABLE `impots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `impots`
--

INSERT INTO `impots` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(2, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(3, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(4, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(5, '2021-11-20 14:47:44', '2021-11-20 14:47:44');

-- --------------------------------------------------------

--
-- Structure de la table `infos_systems`
--

CREATE TABLE `infos_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_plateforme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_couleur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_blanc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maplink_iframe` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infos_systems`
--

INSERT INTO `infos_systems` (`id`, `nom_plateforme`, `description`, `slogan`, `website`, `telephone`, `whatsapp`, `ville`, `code_postale`, `pays`, `adresse`, `logo_couleur`, `logo_blanc`, `fav_icon`, `email_contact`, `email_support`, `facebook`, `instagram`, `linkedIn`, `twitter`, `maplink_iframe`, `created_at`, `updated_at`) VALUES
(1, 'Bilan Pro', 'Enim ipsum maiores p', 'Officia atque conseq', 'zfe', '+1 (352) 255-3067', '+1 (352) 255-3067', 'Dakar', '22300', 'Sénégal', 'Mermoz, Sacré Coeur', NULL, NULL, NULL, 'contact@bilanpro.com', 'support@bilanpro.com', '#', '#', '#', '#', 'Enim aut autem nulla', NULL, '2022-01-08 23:04:58');

-- --------------------------------------------------------

--
-- Structure de la table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invitant_id` int(11) NOT NULL,
  `invite_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invitations`
--

INSERT INTO `invitations` (`id`, `invitant_id`, `invite_id`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(2, 0, 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(3, 0, 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(4, 0, 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(5, 0, 0, '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(6, 0, 0, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(7, 0, 0, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(8, 0, 0, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(9, 0, 0, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(10, 0, 0, '2021-11-20 14:48:07', '2021-11-20 14:48:07');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatNumeric` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `nom`, `code`, `formatNumeric`, `created_at`, `updated_at`) VALUES
(1, 'Francais', 'fr', 'de-DE', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(2, 'Anglais', 'en', 'en-IN', '2021-11-20 14:47:24', '2021-11-20 14:47:24');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(53, '2014_10_12_000000_create_users_table', 1),
(54, '2014_10_12_100000_create_password_resets_table', 1),
(55, '2019_08_19_000000_create_failed_jobs_table', 1),
(56, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(57, '2021_11_10_000001_create_abonnements_table', 1),
(58, '2021_11_10_000002_create_articles_table', 1),
(59, '2021_11_10_000003_create_banques_table', 1),
(60, '2021_11_10_000004_create_bonuses_table', 1),
(61, '2021_11_10_000005_create_caisses_table', 1),
(62, '2021_11_10_000006_create_clients_entreprises_table', 1),
(63, '2021_11_10_000007_create_comptescomptables_table', 1),
(64, '2021_11_10_000008_create_contrats_table', 1),
(65, '2021_11_10_000009_create_contrats_models_table', 1),
(66, '2021_11_10_000010_create_contrats_types_table', 1),
(67, '2021_11_10_000011_create_depenses_table', 1),
(68, '2021_11_10_000012_create_depenses_paniers_table', 1),
(69, '2021_11_10_000013_create_devis_table', 1),
(70, '2021_11_10_000014_create_devis_articles_table', 1),
(71, '2021_11_10_000015_create_devises_monetaires_table', 1),
(72, '2021_11_10_000016_create_documents_table', 1),
(73, '2021_11_10_000017_create_documents_types_table', 1),
(74, '2021_11_10_000018_create_employes_entreprises_table', 1),
(75, '2021_11_10_000019_create_entreprises_table', 1),
(76, '2021_11_10_000020_create_factures_table', 1),
(77, '2021_11_10_000021_create_factures_articles_table', 1),
(78, '2021_11_10_000022_create_fonctionnalites_table', 1),
(79, '2021_11_10_000023_create_fournisseurs_table', 1),
(80, '2021_11_10_000024_create_habilitations_table', 1),
(81, '2021_11_10_000025_create_impots_table', 1),
(83, '2021_11_10_000027_create_invitations_table', 1),
(84, '2021_11_10_000028_create_langues_table', 1),
(85, '2021_11_10_000029_create_modeles_devis_table', 1),
(86, '2021_11_10_000030_create_modeles_factures_table', 1),
(87, '2021_11_10_000031_create_modeles_recus_table', 1),
(88, '2021_11_10_000032_create_modules_table', 1),
(89, '2021_11_10_000033_create_module_packs_table', 1),
(90, '2021_11_10_000034_create_packages_table', 1),
(91, '2021_11_10_000035_create_paies_table', 1),
(92, '2021_11_10_000036_create_paiements_modalites_table', 1),
(93, '2021_11_10_000037_create_paiements_modes_table', 1),
(94, '2021_11_10_000038_create_pieces_jointes_table', 1),
(95, '2021_11_10_000039_create_presences_table', 1),
(96, '2021_11_10_000040_create_projects_table', 1),
(97, '2021_11_10_000041_create_recurrences_table', 1),
(98, '2021_11_10_000042_create_recus_ventes_table', 1),
(99, '2021_11_10_000043_create_regles_table', 1),
(100, '2021_11_10_000044_create_reglements_table', 1),
(101, '2021_11_10_000045_create_revenus_table', 1),
(102, '2021_11_10_000046_create_ruptures_table', 1),
(103, '2021_11_10_000047_create_taxes_table', 1),
(104, '2021_11_10_000048_create_transactions_table', 1),
(105, '2021_11_23_145002_create_depenses_simples_table', 2),
(106, '2021_12_01_150929_create_paiementsources_table', 3),
(107, '2021_11_23_150042_create_cheques_table', 4),
(109, '2021_11_23_145412_create_fournisseurs_credits_table', 5),
(111, '2021_12_02_091106_create_categories_articles_table', 6),
(112, '2021_12_23_163133_create_token2fas_table', 7),
(113, '2021_11_10_000026_create_infos_systems_table', 8),
(114, '2022_01_06_132533_create_controls_table', 9),
(115, '2022_01_06_155051_create_session_controls_table', 10),
(117, '2022_01_08_212243_create_websites_table', 11),
(118, '2022_01_19_223811_create_sessions_table', 12);

-- --------------------------------------------------------

--
-- Structure de la table `modeles_devis`
--

CREATE TABLE `modeles_devis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modeles_devis`
--

INSERT INTO `modeles_devis` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(1, 'Incidunt rerum in quam voluptas. Dolor molestiae aliquam enim. Vitae veniam excepturi laudantium velit qui.', 'Corporis dolore quibusdam architecto ea omnis et consequatur maiores. Nostrum magni reprehenderit aut aut dolorem. Facilis autem laboriosam et atque eligendi et natus.', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(2, 'Ullam velit sint est commodi. Omnis ad mollitia nemo beatae. Officia voluptas fugiat voluptates non autem eos quisquam earum. Architecto nihil atque ipsam esse pariatur beatae. Sint non sit corrupti dolorem laboriosam nulla et.', 'Tenetur ipsum sed inventore tenetur neque occaecati. Quam iste voluptas voluptas non non repellendus. Earum debitis consequatur sint dicta reiciendis dolore.', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(3, 'Alias laborum dolor sapiente quia. Dolores rerum velit distinctio saepe et eum distinctio molestiae. Eligendi nisi nihil quo et non ea omnis qui. Et natus rerum odio quia voluptatem. Consequatur voluptate cum architecto aut.', 'Rerum qui non vel voluptatem dicta minus pariatur animi. Laborum et velit beatae sint. Aut aperiam fugit corrupti.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(4, 'Maiores non et a sint quos ipsum fugiat. Laudantium totam nam libero eaque voluptatem. Molestias et dicta tenetur sed mollitia est. Cum quaerat nemo at illo quibusdam aut.', 'Eligendi ut tempora saepe rerum. Totam aut animi perspiciatis autem voluptas eaque. Officiis accusamus quo voluptas est natus quia maxime at.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(5, 'Sed itaque ut mollitia. Rerum sit earum nulla possimus eos. Est officiis amet animi sit non illo. Molestiae natus aut eos pariatur ipsum et. Consectetur nostrum expedita ullam quaerat earum. Est nobis in tenetur optio.', 'Aut et est quasi voluptate. Dolorem in sed corrupti eos aliquid accusamus fuga. Tempore quia et quae adipisci et dolores porro.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(6, 'Doloribus minima dolor sint rem rerum ducimus. Enim consequatur sit velit. Sit velit amet nisi harum voluptatum voluptate dolore similique.', 'Alias voluptatem inventore veritatis vel suscipit. Modi sed soluta commodi voluptas.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(7, 'Aliquid nesciunt dolorem cupiditate similique. Ea beatae est molestias laboriosam veritatis eius. Ratione dignissimos tempore reprehenderit tempora.', 'Quas non voluptas amet repudiandae dolores. Eaque quis et laudantium sit nihil.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(8, 'Qui temporibus laudantium eos sint quos ipsam. Delectus nihil ut dolores eligendi. Quibusdam quia et tempore quia incidunt. Ducimus beatae non sequi doloribus ea. Consequatur minima atque repudiandae voluptate. Quia deserunt officia sint debitis.', 'Voluptas quaerat rerum enim iusto. Error autem ipsa illum. Quae et ea quidem quaerat illo neque.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(9, 'Optio cupiditate nisi libero rerum blanditiis tempore est cum. Consectetur tempore recusandae magni repudiandae qui aliquid porro. Perspiciatis molestias nemo cumque aut.', 'Sed quis voluptas earum quasi veniam dolorem. In aut nemo debitis enim. Est dolorum in expedita amet reiciendis et quibusdam.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(10, 'Quia eum excepturi blanditiis voluptas. Incidunt dolorem nisi ut a. Et fuga totam deleniti est optio. Aut impedit voluptatem qui. Aut consectetur aut omnis culpa numquam.', 'Et debitis vel qui ratione. Qui inventore deserunt mollitia voluptate qui quos. Assumenda debitis vel ut est voluptate sint sint.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(11, 'Corrupti temporibus aut impedit quisquam. Sunt ut dolor quod perspiciatis veritatis. Eveniet beatae impedit quod dolorem omnis molestiae accusamus labore. Autem voluptatem et tenetur itaque.', 'Quo doloribus et magni quod totam vel natus. Voluptatum nostrum in amet voluptatem. Nisi sint corporis et id et rem suscipit veniam.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(12, 'Quas et illum ut. Temporibus voluptas omnis pariatur eaque possimus in sequi dolores. Ut quisquam fuga doloribus repudiandae.', 'Aspernatur ullam explicabo adipisci velit itaque. Omnis culpa et culpa dolores. Sit voluptas laboriosam voluptas sit.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(13, 'Nihil maxime voluptatem rerum error id. Explicabo aut nostrum similique nisi autem reiciendis mollitia. Consectetur cum porro earum laboriosam velit voluptatibus. Ratione ex ratione sed et eligendi dicta fuga id.', 'Pariatur consequatur atque et minima. Itaque quis est voluptatem impedit. Dolore eos ut ut quasi. Libero voluptatum cupiditate ullam et voluptatem voluptatem.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(14, 'Quis et explicabo blanditiis. Facere et autem quas possimus. Alias sed et facilis labore. Reiciendis delectus eaque dolorem pariatur.', 'Placeat cumque sunt sit itaque ducimus. Ea sunt provident facilis atque et placeat quos nemo. Asperiores ea fugiat sunt sapiente natus voluptatem. Sed in dolores ut eum.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(15, 'Accusantium dolor mollitia voluptatum non soluta error. Accusantium asperiores aliquid odit pariatur.', 'Placeat repellendus repellat aliquid ducimus temporibus. Expedita accusamus nihil ducimus vitae tempora nemo. Natus dolores rerum et itaque. Est quae eveniet maiores reiciendis.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(16, 'Delectus quo nihil iusto sapiente. Itaque eius aliquid porro neque quas nam autem. Animi modi perferendis et ad. Autem voluptas ea sint. Dolorum quidem aut voluptas laudantium molestias sint minima nihil. Inventore itaque ipsa consequatur.', 'Nihil labore id ducimus harum odio aut inventore. Est et labore consequatur iure et est dolor. Nisi aliquid ducimus quaerat sed.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(17, 'Quasi eos ea eaque veritatis ipsum sunt quia temporibus. Pariatur perspiciatis voluptas consequatur minima ut distinctio aspernatur. Libero optio quia qui dolores.', 'Omnis voluptatem cumque velit sit est ut. Distinctio facilis consequatur consequatur itaque laboriosam delectus aut. Est numquam in aut qui labore.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(18, 'Alias sunt natus optio at et. Ut quidem quas eum laudantium provident reprehenderit culpa unde. Incidunt modi aut modi sunt.', 'Incidunt culpa incidunt consequatur ipsam officiis nam. Ut sit omnis maxime iusto. Sit animi aut animi a et tempora et. Debitis ipsa odio magni quo.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(19, 'Velit similique omnis quisquam est dicta. Autem in dolores optio cupiditate labore est mollitia. Maiores voluptas sed facere. Est impedit eius ut impedit.', 'Illo eos non veritatis nisi ad. Eveniet maxime eaque rem et mollitia. Accusantium quisquam sequi recusandae molestiae minima.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(20, 'Omnis cumque magnam nulla voluptates. Libero veritatis expedita aut perspiciatis expedita illum. A aspernatur ipsum et qui exercitationem quia dignissimos saepe.', 'Repellat sit et quos unde placeat numquam. Qui occaecati adipisci dolor enim. Enim suscipit et ipsam est et aut qui nemo.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(21, 'Nam qui blanditiis nisi occaecati vero hic. Facilis ut asperiores illo ea. Eum eos animi maxime incidunt cupiditate optio. Ea perspiciatis ut voluptatem id ut.', 'Quis provident a odit nobis quod. Molestiae neque id quam quisquam eligendi odit. Excepturi molestiae quos sed alias. Non molestias ut dolor quod.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(22, 'Voluptas nemo eos doloribus labore delectus. Ipsam qui qui voluptatem molestiae velit. Ad optio incidunt ipsum ea perspiciatis.', 'Nulla corrupti ut quia cum. Eligendi repudiandae officiis modi sint praesentium eos. Qui quia quia harum dolor rerum sit ut. Nihil sit qui rem ea et dolor.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(23, 'Nemo aut atque eos velit a recusandae. Consequatur sint omnis dolorem rerum. Et velit omnis ab et molestiae qui.', 'Earum recusandae autem ut temporibus sed est facere. Et vitae enim mollitia excepturi minima consequatur. Temporibus quasi iure nobis libero perspiciatis iste ducimus.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(24, 'Quis aspernatur dicta dolore eius non ut. Est ut labore a sed. Odit dolorem facilis id doloremque praesentium. Ut dolorem perferendis debitis quia ut. Consequatur alias quis id laudantium eveniet.', 'Blanditiis quo non dignissimos qui. Sunt et aut facere nihil minus. Maxime qui quia a.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(25, 'Quia officia est voluptatem voluptas quis ex fuga. Saepe dolores placeat sed vel dolorum sunt dicta. Culpa ipsa consequatur praesentium quo quia. Aut asperiores omnis dolore. Dolores quia magni voluptas expedita. Vel aut sed assumenda dignissimos.', 'Non reprehenderit sed suscipit laboriosam sapiente consequatur ut. Rerum et voluptatem voluptates dolore. Fugit sequi est officia amet dolor animi magni.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(26, 'Doloremque omnis sint illum quis quas. Non non est nemo enim repellat itaque cupiditate. Ipsam ducimus fuga illo vitae occaecati cum. Nesciunt sint aut voluptatibus et.', 'Sed illum accusamus sunt deleniti voluptas. Veritatis voluptatem in nihil cumque optio. Non aspernatur error aliquid molestias. Qui est laboriosam fugit quo officia.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(27, 'Quia cupiditate doloribus quia et. Corporis quam molestiae exercitationem quibusdam voluptas. Ut nihil dignissimos eum deserunt consectetur laboriosam eveniet.', 'Inventore maiores consequatur aliquid. Ipsa magni sed tempore deleniti voluptatum aut reiciendis. Ea porro saepe ut exercitationem quis explicabo aspernatur.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(28, 'Sed totam perferendis qui necessitatibus quo praesentium. Asperiores asperiores maxime est quas alias ut ut explicabo. Dolor ad vero esse eos. Consequatur libero minima porro perspiciatis qui labore ut tempore. Et nobis dolores assumenda.', 'Aliquam aut culpa rerum minima necessitatibus. Nisi dolorem enim at eum et in. Autem nihil sint accusamus ipsa occaecati.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(29, 'At est recusandae et excepturi provident. Et at et placeat facilis placeat. Neque facilis est neque quasi.', 'Amet facilis illum consequatur aut. Sint non omnis repudiandae molestiae id quos reiciendis numquam. Aut consequatur corporis natus similique vero perferendis et.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(30, 'Iure eaque enim sit omnis quis et. Officia itaque nihil qui ullam et impedit. Sunt suscipit aperiam voluptatem et vel dolorem nemo. Ut quis praesentium beatae totam quod excepturi sint.', 'Est eligendi a sunt eum. Et molestiae aut esse minima aperiam voluptas voluptatem. Aut et quasi quaerat dolores impedit aut. Maiores quo nihil est magni officia.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(31, 'Possimus omnis facilis quam odit sunt. Dolor voluptatem accusamus omnis omnis inventore sed. Expedita blanditiis autem distinctio non.', 'Nemo illo deleniti esse. Voluptate explicabo quis voluptatem exercitationem qui quam necessitatibus. Sunt nemo aliquam doloribus sunt ullam similique. Est dolorum magnam consequuntur sit.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(32, 'Aliquam omnis at voluptatem similique omnis repudiandae veritatis qui. Repellat sunt eos et quo et nesciunt nobis. Quia aut assumenda repellendus hic dolor. Quod odio laboriosam perspiciatis. Maxime corporis corrupti beatae qui saepe.', 'Molestiae magnam tempora deleniti et autem repudiandae ratione. Ullam repellat enim et sint quibusdam dicta. Laboriosam repellat inventore error praesentium eos doloremque dolorem eius.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(33, 'Architecto voluptas voluptatem est ab possimus. Saepe ut suscipit excepturi laboriosam quis dolor quo. Qui veritatis rerum ipsam porro sint. Et non dolores qui sunt quod.', 'Tenetur modi rerum sunt neque suscipit suscipit nulla corporis. Corporis est reiciendis possimus tempora. Natus at quod ea culpa ut.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(34, 'Odio eum quo est nesciunt voluptas ad ex officiis. Dolores voluptate voluptates velit harum et. Ut voluptatum dolorem provident non. Saepe et qui autem sint qui.', 'Voluptas exercitationem omnis sit omnis accusamus. Quos molestiae similique quia accusantium omnis quasi ea. Ut voluptate impedit nemo doloremque animi. Laborum voluptas cum aut.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(35, 'Sit at impedit neque repellendus. Quia soluta reiciendis consequuntur saepe. Veritatis tenetur ut mollitia ipsum ipsam eaque. Tenetur in modi ut qui aliquam velit. Nihil magni ut est sunt cum voluptatem voluptatum. Consequatur esse doloribus dolores.', 'Autem dicta autem reprehenderit aut officiis non quibusdam nisi. Voluptatibus ut quia at rerum. Recusandae architecto eos molestiae sit odio aperiam. Sit eum a et quae voluptatem.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(36, 'Aut est quae facere modi. Et eveniet architecto cumque aperiam. Est sed et dolorem. Laborum tempore eum aliquam quis doloribus sit pariatur.', 'Commodi deleniti sed beatae quibusdam recusandae. Vel sint totam vitae dignissimos necessitatibus. Eaque iste et qui eaque et fuga.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(37, 'Excepturi aliquid perferendis aliquid in ut. Et et itaque distinctio qui incidunt quam accusantium. Veniam ut neque ut qui in esse qui. Mollitia unde est explicabo consequatur sed.', 'Aut et sit dolorem voluptas accusamus omnis. Placeat in quam ex voluptas aspernatur ad dolor provident. Quia voluptatibus cum aut quae aliquid. Ab asperiores aut qui alias dolorem optio est.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(38, 'Amet velit ea sit esse reiciendis rerum et corporis. Impedit vel non eaque officia. Molestiae deserunt omnis et ab excepturi ratione. Hic sit eligendi fugiat numquam adipisci non quia.', 'Velit blanditiis ea unde quasi earum nostrum. Est sapiente sint dolor quod eveniet. Temporibus aut exercitationem perferendis non minus.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(39, 'Ipsum ad quasi sint quasi delectus animi deserunt. Aut dolorem quia quibusdam. Fugiat libero officia et voluptas. Vitae quos sed repellat ratione quia illo.', 'Perferendis ad suscipit tempora nam. Aut deleniti nobis et amet nisi sit cum. Nihil fugit voluptatem repellendus et.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(40, 'Repellendus nam et dolorum incidunt est consequuntur qui ipsum. Libero maiores repellendus ut repellat. Quisquam facilis porro asperiores id nobis sed repudiandae est.', 'Laudantium repellat nemo ex ut fuga iusto sunt. Perferendis sint veritatis quaerat tenetur sit dolor quia rerum. Sed dolorem iste vel in numquam.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(41, 'Eius velit enim illum aut eum rerum voluptas. Consequatur laborum tenetur ut recusandae aut voluptas. Earum ea aut similique quasi cupiditate deserunt quidem veniam.', 'Nihil sunt quo voluptate delectus saepe. Minus quis qui quidem quis. Optio esse error quia molestiae ab odit.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(42, 'Omnis et cum atque saepe exercitationem qui hic. In nemo est voluptate nihil. Inventore molestiae et sapiente molestiae omnis quia non. Aspernatur est est odit pariatur ut sint.', 'Et a fugit possimus nobis rerum expedita. Ipsa ducimus voluptatem distinctio. Eum maiores repellendus eligendi tenetur ad provident reprehenderit et.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(43, 'Et qui quidem nisi distinctio veritatis qui minus cum. Voluptate enim fuga dolorem rem dolorem. Laborum voluptatem aut aliquam pariatur molestias autem.', 'Dolorem maiores minus rerum ipsa culpa nemo. Impedit deserunt in alias harum nisi. Architecto non dolore veniam facilis perspiciatis quibusdam dolor. Et ducimus inventore non et repellat ad.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(44, 'Nemo est labore rem similique aut. Numquam ea laborum dolor. Aut eos qui ut quis doloribus reprehenderit. Est impedit ab cumque blanditiis sequi.', 'Quia pariatur voluptatem et. Adipisci eum porro nostrum quo rerum fugit ducimus. Assumenda corporis dolore sunt non mollitia.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(45, 'Voluptas veniam unde et sed. Rerum sit sit nam placeat sed.', 'Aut et odio et provident et et. Sit modi saepe unde itaque itaque. Eveniet occaecati dolorem id rerum vel autem velit. Eos atque hic consectetur molestias mollitia asperiores hic.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(46, 'Et pariatur doloribus explicabo optio delectus. Sint rem suscipit quo ipsa excepturi ducimus. Iusto et laudantium adipisci beatae laudantium voluptatem. Cumque molestiae est voluptatem voluptatum quia molestiae dolores impedit.', 'Deleniti dolorem consequuntur vel tenetur illo. Omnis nam temporibus aut omnis cum eos. Quidem autem harum dolor ex quia omnis. Voluptas dolorem sunt est. Vero cum ea eum fuga id.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(47, 'Aut nulla asperiores deleniti eos omnis illum et quia. Et explicabo error aut ad repellat id. Dolorem odio voluptatibus quo assumenda. Perferendis non fuga id. Eos aut quod non nihil.', 'Enim et aut suscipit. Ab id aut dolores neque laudantium iure hic est. Aliquid repellat voluptas sed omnis.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(48, 'Voluptates consequuntur quisquam harum dolorem ut. Nemo eveniet doloribus illum sit ducimus. Unde dolore et corrupti a non omnis dolor. Nihil cum optio amet.', 'Et recusandae voluptatum dignissimos voluptas amet. Consequatur optio omnis reprehenderit voluptates. Odio alias iste voluptatem neque repellendus.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(49, 'Et molestias temporibus tenetur autem aut maxime unde quo. Aut sunt nesciunt cumque saepe. Molestiae sunt officia sint quia. Ipsa qui recusandae libero omnis sit nam.', 'Error quisquam reprehenderit qui eaque sed. Voluptatem necessitatibus sapiente et velit.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(50, 'Ut provident autem earum. Aliquid ut omnis blanditiis harum laborum. Voluptatibus laudantium esse architecto aut quo. Et inventore sit ratione.', 'In eos perferendis reiciendis rerum nostrum. Voluptate et perferendis voluptatem qui qui. Eum minima sed qui sit dignissimos aliquid maxime.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(51, 'Eaque velit sit eum dolores ut. Qui qui vero at occaecati. Distinctio et autem soluta.', 'Sequi vero soluta nisi totam quaerat. Aperiam est ducimus explicabo beatae dolor maxime mollitia. Voluptatem repellat similique repellat dolores enim. Rerum placeat qui nobis nobis omnis.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(52, 'Qui similique ea at consectetur at saepe. Voluptatum eum sit autem qui. Dolor deleniti corrupti quas ad. At placeat aut nemo sunt officiis voluptas.', 'Cupiditate repudiandae praesentium voluptatibus quos magni ut. Hic aut quia accusamus officia vitae nobis. Earum ipsum quos dolorem deserunt beatae dignissimos expedita. Sed in ea numquam vitae.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(53, 'Aspernatur blanditiis excepturi harum ex facere. Ab nihil enim sit minima repudiandae. Quia odit est cumque occaecati. Quas praesentium aut sint qui rem in.', 'Non eos distinctio labore illum. Omnis illum vel ipsum nam mollitia necessitatibus.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(54, 'Ut sit dolorem doloremque quasi. Voluptatem corporis nesciunt beatae voluptatem modi laboriosam quia. Soluta perferendis aliquid quos quidem assumenda hic assumenda.', 'Dolorem placeat sed et occaecati at. Aut ut vel sed amet ipsa.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(55, 'Nihil est delectus voluptatibus accusamus architecto numquam. Quia officiis sint eaque quae. Maiores nostrum veniam rerum quas iure est quis. Delectus ratione iusto in commodi tempora suscipit qui alias.', 'Repudiandae velit voluptate non tenetur. Voluptatibus cupiditate quod aut ad ut consectetur in. Ad porro aut et laudantium rem consequuntur ducimus tenetur.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(56, 'Dolorum in consequatur officiis qui doloribus at. Et dicta consequuntur sed. Accusantium expedita quaerat et voluptas. Nemo ut enim vero eos. Ipsum explicabo rerum ipsa sequi eaque aperiam suscipit. Est quia unde facere repellat dolores quia sed.', 'Mollitia ipsam quas molestiae nihil non magni. Laboriosam sit tenetur placeat.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(57, 'Quisquam voluptate maxime quod beatae amet molestias. Sed voluptatem consequatur minima quod quidem mollitia dicta provident. Accusamus atque laboriosam ut sapiente voluptatem dolores.', 'Laboriosam aperiam quibusdam suscipit consequatur asperiores placeat nemo. Ut totam dicta excepturi nihil aliquam molestias similique.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(58, 'Omnis harum repellendus optio atque. Omnis cumque nesciunt facilis quis unde at laboriosam. Est optio commodi amet rem enim sit. Quis consectetur est eos reiciendis magnam rerum cupiditate. Impedit est dolorem sit nemo.', 'Accusamus et nulla iure. Rerum repellat ea vitae omnis sit quia rerum. Iure maiores impedit dolores ab aut accusamus nihil. Facere expedita eum velit iure perferendis accusamus ea.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(59, 'Et quis quam omnis rerum ut similique temporibus reprehenderit. Delectus praesentium deserunt rerum ullam quasi totam. Voluptatum facere omnis eius quo. Aliquid corporis quaerat distinctio quia.', 'Ea expedita et et quas odit. Et temporibus facere aperiam aut sit fugit. Inventore accusamus et quae odit. Eveniet possimus officiis nulla laborum libero reprehenderit eaque assumenda.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(60, 'Tempora impedit sed nihil. Nesciunt eveniet illum repellendus fugiat soluta cum ullam. Minus reprehenderit voluptas sit rem doloremque dolorem labore. Similique porro nesciunt consequatur voluptate.', 'Rem alias esse veniam autem. Earum distinctio et rerum est qui voluptatibus placeat. Sapiente explicabo porro aut et qui.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(61, 'Quis deserunt dolorem iusto voluptas quaerat reiciendis nulla. Corporis non consequuntur perspiciatis reprehenderit vitae vel quaerat. Fugit quod aliquam quo nisi qui officiis. Ullam pariatur et consequatur voluptatibus vel assumenda facilis.', 'Culpa fugit qui quia recusandae fugit. Vitae praesentium facere dicta molestiae reprehenderit. Nemo est aperiam et omnis aliquam voluptatem voluptas incidunt. Impedit odio ipsum doloribus alias.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(62, 'Error natus quibusdam perferendis eos veniam hic sit. Voluptatibus omnis velit officia voluptas optio nihil impedit. Quibusdam quia magnam quam qui nulla. Ab delectus veritatis et. Eos itaque perspiciatis minus non sed est.', 'Officiis magni id porro. Quo earum sunt et placeat perspiciatis amet atque magni. Dolorem fugiat ratione adipisci.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(63, 'Sunt mollitia ducimus corporis. Consequatur et sed doloremque vero dolorum itaque dolorem. Occaecati nostrum molestias voluptatem omnis et rerum aut.', 'Ducimus fugiat nobis aut eos atque. Illum omnis iure voluptas qui doloribus rerum perferendis. Ipsum vero non rerum culpa laboriosam. Voluptatum ea quam dolorum asperiores.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(64, 'Et id dolor officia dolorem. Rem nam voluptate totam ratione velit. Quia ut praesentium porro. Velit itaque amet iusto ducimus.', 'Voluptas aut ipsum eius neque autem. Et rerum doloribus dolor quia maiores dolor. Inventore omnis corrupti saepe ut deleniti.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(65, 'Soluta hic tempora eius ea totam. Omnis repudiandae eos aut quia ad inventore officiis.', 'Quidem quas aut occaecati ex et ipsum. Ea quia similique rerum cupiditate. Aliquam autem et repudiandae alias minima omnis architecto.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(66, 'Iusto harum iste enim laudantium aliquid modi. Non voluptas at consequatur ad quo repellat et. Voluptas qui omnis explicabo et dolor. Et eum necessitatibus aut et quia voluptatibus.', 'Fugiat neque tempora et minima. Possimus voluptate quo cum in ut at doloribus. Enim quam voluptas et ut magni ducimus. Placeat doloribus adipisci sed.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(67, 'Et expedita illum sunt exercitationem. Consectetur quisquam sed ut pariatur libero quo. Corrupti hic numquam repudiandae dolorem molestias voluptatem ullam.', 'Perferendis voluptates perferendis nam facere error. Ut vel placeat est repellat suscipit quia ducimus qui. Quidem est harum tempore sed. Vel magnam fugit consequatur tempore sunt.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(68, 'Cupiditate id atque autem dicta quaerat laboriosam. Odit est nisi aut ut. Enim pariatur sit officiis consequatur temporibus quaerat qui commodi. Voluptatem sit ut ipsam facere animi. Quia adipisci sint sunt. Similique dicta autem sunt et dolor.', 'Non voluptatem sapiente nemo eveniet in. Voluptatem sequi odio ut incidunt delectus et. Et aperiam voluptatum numquam ipsum et qui facere.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(69, 'Recusandae omnis ratione enim molestias cum. Ut et dolorem qui corrupti. Voluptas sunt voluptatem est qui et quia quo. Quam vel eaque qui sit suscipit non quis qui. Natus repudiandae culpa quis omnis non. Non corporis eius rerum ut non ratione nobis.', 'Officia fugiat nisi unde reiciendis quam corrupti. Id quisquam provident velit magni. Fuga asperiores nihil vel ad voluptatibus numquam nemo.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(70, 'Deserunt rem fugit illum harum vel molestias vel ex. Iure cupiditate minima iure suscipit molestiae. Nam ex saepe non provident. Ut nesciunt iste atque iusto quo iste. Consequatur suscipit ut temporibus fugiat officiis nulla.', 'Ipsa aut id praesentium consequatur recusandae corrupti. Aliquid omnis tenetur nulla molestias tenetur unde. Et omnis et consequatur explicabo tempora sit rerum.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(71, 'Consequatur error aut eos nulla. Tempora ex sed quos consectetur quia sit nobis. Non adipisci adipisci eligendi hic laboriosam accusantium dolor.', 'Recusandae sed et rem. Ipsam dolorem doloremque aut. Minus pariatur aut unde voluptas qui ratione dolores voluptatem. Et aut nobis ut culpa rerum dicta.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(72, 'Velit ratione ut quos. Excepturi deleniti corporis a ut non. Inventore et in totam voluptas vel. Sint vel praesentium mollitia enim in consequuntur omnis. Optio nemo occaecati dolorum fugiat.', 'Ipsam qui quia alias qui iusto tempore quas. Qui eum et sed assumenda neque.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(73, 'Alias impedit eos iure hic sunt. Ullam ab cumque nesciunt totam nobis tenetur. Est deserunt odio voluptatem quia repellat. Blanditiis odio iste fugiat magni. Recusandae temporibus eius et facere eos ea quae et. Sint assumenda velit id magnam.', 'Rerum nulla quidem exercitationem. Dolorem enim voluptatibus voluptates maxime molestiae. Voluptas maxime et quis quod et.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(74, 'Amet aut et ullam praesentium. Quam esse rerum temporibus qui laudantium aut quia. Aut est veritatis quos repellendus nam.', 'Aut ipsa itaque consequuntur est ducimus asperiores. Fugiat et inventore sunt aspernatur dolorum.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(75, 'Eius doloribus id officia deleniti et vel. Voluptatem earum enim quia molestiae vel. Ipsam doloribus et voluptatum explicabo aliquid ad officiis.', 'Harum officiis quo cupiditate aut error maiores ipsum et. Consequatur est voluptas unde enim impedit.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(76, 'Sed non beatae reprehenderit. Doloribus facere eius aliquam at numquam in soluta delectus. Consequuntur perspiciatis molestias id id corporis id voluptatum. Et et harum repellat nam.', 'Nihil quaerat recusandae alias tenetur. Rem illo velit quis nostrum culpa ab. Qui eum in vel inventore.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(77, 'Velit eligendi vitae odit ducimus. Est pariatur quia repudiandae doloremque veritatis in repellat. Ea vero itaque quod blanditiis. Autem fuga est est quae ullam nostrum et. Omnis ipsam qui reprehenderit eaque. Ut doloremque sapiente et qui molestiae.', 'Modi excepturi adipisci voluptatum illo non corrupti. Dolor sint autem ipsam maiores soluta aut reiciendis. Est porro omnis quae quia architecto.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(78, 'Minima impedit consectetur voluptas qui voluptas dolor. Sed provident earum illo ut est perspiciatis. Qui consectetur quis illo molestiae dolore et.', 'Minima odio eum recusandae maiores vitae. Consectetur et non eos qui sunt earum. Aperiam error nulla eaque. Atque accusantium ipsa explicabo iure.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(79, 'Veniam laboriosam quaerat fuga et fugiat inventore. Distinctio vitae esse exercitationem rerum saepe ipsum. Amet numquam iste quos accusantium ut molestias velit. Eius pariatur explicabo ut provident velit adipisci ut.', 'Nobis iure qui eligendi sapiente laudantium mollitia numquam. Excepturi sed provident rem recusandae quaerat eius. Voluptatem fuga non libero aut.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(80, 'Molestias est et sunt qui sapiente. Earum aut omnis in dignissimos cumque consequatur. Quia corrupti est suscipit. Et et repellat voluptates et voluptatem omnis. A dolores sint accusantium.', 'Mollitia culpa molestias harum hic. Error reprehenderit quis fuga est esse aliquid. Nam voluptas architecto doloremque delectus quo. Dolore odit velit architecto qui corporis.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(81, 'Delectus ipsa eaque ea quaerat voluptatibus consequatur quam. Labore quis aut officiis repellat soluta. Distinctio sunt voluptates ut et molestiae tempora. Et ut recusandae voluptas omnis aut.', 'Fugiat necessitatibus cupiditate est ipsa eligendi cum sunt. Ut totam facilis aperiam placeat odio et. Sed consectetur beatae aliquid.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(82, 'Commodi ut ea aliquid deserunt. Quo et accusamus et id aut. Assumenda amet fugit quasi et. Animi veritatis commodi sapiente corporis reiciendis. Architecto nostrum soluta et rerum ipsa.', 'Molestiae similique corrupti voluptatum inventore harum omnis sit. Dignissimos quidem quis voluptate dolor. Dignissimos et cumque modi voluptatem et.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(83, 'Ex harum rerum voluptatem molestiae perspiciatis architecto. Quam neque accusamus doloremque quia ut est quis.', 'Veritatis officiis autem quas qui. Et placeat quibusdam magni porro. Velit odit aliquam et. Incidunt quia nemo et temporibus. Blanditiis eos at cum molestiae ea odit nihil.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(84, 'Aut quaerat saepe quibusdam aut delectus ut et ex. Nulla omnis qui at mollitia dignissimos eum ipsum et. Dolore aspernatur dicta dolores tenetur debitis soluta. Velit et doloremque distinctio architecto ea repellat voluptas.', 'Aut aut nostrum ullam. Placeat quas alias eos esse a quae quibusdam. Quibusdam fugit voluptas voluptatem ullam.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(85, 'Optio voluptatem dolorem nemo eveniet sed assumenda incidunt. Consequatur eos quo et. Voluptate sed sit omnis nisi enim incidunt.', 'Harum consequatur voluptas reiciendis in sed illo. Cumque maiores voluptatem ab exercitationem dolore. Consequatur id architecto omnis vel numquam. Enim aut est cumque ratione.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(86, 'Totam voluptatem dolor quas hic. Quos consequatur nobis mollitia rerum. Quis minima ipsa nostrum ab. Maxime odio eum deleniti molestiae. Tenetur et nam ea. Perspiciatis et fugit dolorem nam autem. Aut modi enim enim voluptates animi.', 'Optio est dolorem hic qui nihil ex iure velit. Ad ad architecto quaerat non voluptatem quisquam. Provident dolores aut alias magnam voluptatem blanditiis voluptatem. Qui qui et in nemo.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(87, 'Blanditiis impedit sit non cupiditate. Sequi quibusdam recusandae quaerat et recusandae enim molestiae. Possimus suscipit numquam voluptatum dolores provident officia. Velit ut suscipit aut quaerat esse eius dolor accusantium.', 'Ea veritatis in tempore temporibus pariatur facilis. Asperiores quod eum illum perspiciatis. Itaque molestias nisi ad vel in. Qui est dolorem dolor eius non adipisci itaque.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(88, 'Dolor cum eligendi culpa qui rerum inventore est. Exercitationem suscipit veniam libero officiis recusandae. Id iste dolorem sint dolorum mollitia tempora minima. Ut cupiditate iure facilis.', 'Nam hic amet facilis eum minus esse vel. Totam sint facere et est aperiam sit ratione. Et assumenda quaerat error qui.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(89, 'Laudantium non est facilis iusto sunt. Tempora ullam necessitatibus odit expedita possimus. Illum aut culpa nemo minima vel accusantium. Occaecati veritatis perferendis nihil laborum. Beatae odio dignissimos quam placeat.', 'Qui possimus quos nam ipsa dolore vel fugiat ea. Velit quia omnis ab ut assumenda. Fugit repudiandae molestias quae. Sit soluta quia facere mollitia delectus. A quia in aperiam.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(90, 'Numquam minus sit et quisquam qui. Sint quisquam ad assumenda. Quia iste qui hic et.', 'Ut unde asperiores molestiae quidem impedit aliquam. Magnam non nobis atque qui nobis.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(91, 'Ut facere consectetur omnis et nesciunt praesentium esse. Aut est itaque inventore modi sapiente a et nemo. Maxime vitae laborum ipsam earum odio omnis. Quas et vel libero distinctio accusamus accusamus. Sequi odit alias sapiente nam.', 'Consequuntur iusto itaque natus necessitatibus eos fuga. Qui officia laborum facere et adipisci eius. Beatae eveniet dolor perspiciatis sed sapiente rerum ullam.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(92, 'Impedit ea aut provident optio. Exercitationem iste iure pariatur voluptatem dolore quae quas. Totam aliquam alias omnis aspernatur sed fuga praesentium porro.', 'Aliquid corporis fuga aut quam distinctio. Nihil error minus repudiandae ut ea eius. Dolor et natus quisquam explicabo perferendis sit. Porro architecto temporibus natus eos ut assumenda labore.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(93, 'Ut et voluptatem a sit unde repellat voluptas quasi. Aut tempora ducimus iure eveniet adipisci numquam. Eius et officiis qui voluptatibus quis magnam. Omnis fuga ut sit in cumque et quo.', 'Ut ut aut libero cum ut ut. Nemo pariatur molestias est. Ea iste incidunt nostrum eius et nobis et. Id rem voluptates a et tenetur.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(94, 'Neque nesciunt ab nulla magnam officia consequatur nihil. Optio id quisquam ipsam aperiam vero tenetur aut. Corrupti quidem vero reprehenderit sapiente nesciunt. Sapiente aut optio quibusdam est repellat.', 'Omnis aperiam sequi aut sit laboriosam. Corrupti ipsa eum sequi praesentium. Ut omnis qui quia asperiores qui provident. Aspernatur deserunt accusantium et ut qui odio.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(95, 'Dolore sunt nisi quisquam quibusdam. Pariatur molestiae non consectetur non eaque. Et quam corrupti sit dolore recusandae ut dolores. Voluptas voluptates hic reiciendis. Ut corrupti et dolorem et velit est natus sint.', 'Iste soluta illum iusto optio veritatis recusandae. Id culpa consequatur harum nisi. Explicabo recusandae dolor adipisci consequatur. Quia omnis doloribus eligendi vero deserunt at.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(96, 'Quisquam inventore dolor occaecati et. Aut earum quisquam unde et error. Aut voluptas suscipit ducimus hic ab et. Enim cum quasi omnis et enim.', 'Facilis perspiciatis sint quasi quibusdam. Est et quisquam mollitia saepe repellendus esse. Ipsam quibusdam reprehenderit eos sit quasi.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(97, 'Unde culpa facere placeat minus ut. Saepe numquam eos debitis unde quam. Deleniti ratione et ipsum sit ad amet blanditiis.', 'Laudantium inventore iusto ut vero. Nemo autem voluptatum accusamus minima nostrum architecto est. Praesentium adipisci non nihil quis optio.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(98, 'Ut adipisci sed eos nam praesentium aliquid. Exercitationem harum inventore accusantium sint inventore incidunt quidem. Deserunt ad iste vel et laboriosam non.', 'Similique est ipsam provident est et. Cum vel ut iste ut rerum sed. Iste non aut rerum et.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(99, 'Expedita blanditiis aperiam et velit. Quis atque numquam architecto iste. Voluptatum ut rerum rerum nihil aut expedita. Autem sequi vero optio assumenda dolores itaque.', 'Cupiditate dicta ab molestias quaerat rerum dolor rerum id. Incidunt quia nihil quia. Ipsa laudantium sapiente odio dicta et quo. Fuga vero eaque deserunt voluptate nihil perferendis ipsum earum.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(100, 'At dolorum qui sed sint aut excepturi. Ad dignissimos magni ut magnam alias pariatur sapiente. Atque cupiditate quia eligendi saepe. Deserunt facilis culpa eum sapiente. Nihil accusamus et amet eius.', 'Molestias quaerat ut aperiam reiciendis. Consequatur aliquam cumque sed placeat et quia minima velit. Iure aspernatur neque tenetur deleniti culpa.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(101, 'Et harum at maxime a vitae. Veniam vitae cum sint est ratione harum sequi et. Ut repudiandae facere voluptatum. Et excepturi voluptatem ut voluptatibus voluptas. Ut quisquam corporis pariatur distinctio. Vel iure consequatur quae error earum iusto quis.', 'Ipsam similique et dolorem ullam vel architecto ut. In id eveniet non ex. Esse autem illo soluta culpa. Sed sint eveniet temporibus eius.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(102, 'Magni cupiditate autem dicta et sed. Laudantium amet odit dolores qui suscipit amet qui. Eligendi eum esse quibusdam possimus.', 'Consequatur vel dolor corporis eum dicta. Cupiditate suscipit esse non. Dolorum ut optio consequatur voluptatem velit. Beatae explicabo quasi non.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(103, 'Repudiandae unde ea cupiditate mollitia et quas. Voluptatibus dignissimos neque dignissimos ut. In voluptatibus quod aperiam iure ipsum nostrum quibusdam ipsam. Excepturi et voluptatem expedita magnam tempora ad ut.', 'Fugit enim ullam reiciendis voluptas aut voluptatem. Dolor vel cumque aut pariatur ab. Ullam sit provident qui id.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(104, 'Iure aspernatur a quis sunt libero assumenda repellat. Reprehenderit qui nostrum quo architecto qui quae quia. Et repellat qui aut totam. Molestiae harum nihil harum inventore.', 'Nemo porro a magni adipisci harum. Dicta necessitatibus facilis molestiae molestias. Culpa autem occaecati nisi quisquam est. Aliquid nisi perspiciatis commodi magni.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(105, 'Deserunt sunt minima nobis aut tempora velit. Aut alias explicabo alias necessitatibus et molestiae voluptatem. Cum omnis quam incidunt est.', 'Esse autem eum ex unde consequatur assumenda. Neque et sit voluptas rerum. Non sed quis labore laboriosam aliquam. Quibusdam in dolor ipsum eum.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(106, 'Unde sunt totam voluptate dolor est ut. Saepe qui aut neque harum vitae. Et commodi molestiae explicabo autem aut.', 'Asperiores explicabo et qui provident. Optio assumenda numquam molestiae et. Similique ipsa modi qui sed eum.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(107, 'Enim consequuntur velit omnis et. Enim nihil error odio minus dicta cumque eos. Sit at eos porro autem vel assumenda.', 'Voluptatum est voluptas rerum nulla. Laboriosam dolor ut voluptates eveniet. Neque officiis quod voluptatibus. Rerum vel corrupti tempore quo. In tenetur et nesciunt.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(108, 'Dolorem nulla magni aut incidunt qui velit doloribus. Corporis voluptas pariatur maiores asperiores quasi alias nihil aliquam. Voluptatem accusantium nulla magni recusandae cumque ea consequatur.', 'Officiis illo sapiente adipisci neque minus enim. Quis quo voluptatem adipisci dolor. Sunt et blanditiis inventore similique est voluptas assumenda. Possimus omnis non praesentium eos quia.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(109, 'Enim esse vero vel et vero excepturi. Aperiam qui quidem possimus nam eos vero culpa quia. Incidunt beatae accusamus aperiam ut laborum molestias nulla. Nemo necessitatibus et magnam cum culpa.', 'Laudantium illo quisquam consequatur quas. Sequi rerum et vel quia libero. Esse dignissimos esse qui recusandae. Sed aut adipisci quia. Praesentium ea error voluptatem animi.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(110, 'Ea harum doloribus molestias officia accusamus labore qui minus. Aperiam reiciendis et aspernatur aut rem qui sint. Sed ex voluptas sunt beatae optio aliquid sed placeat. Eum ut saepe amet debitis.', 'Dicta vero omnis est. Numquam distinctio natus modi quidem. Alias provident aut corrupti temporibus doloribus alias.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(111, 'Eligendi similique voluptas ea libero ut nobis occaecati. Cupiditate distinctio vel vel laboriosam est. Quaerat hic facere tenetur non aspernatur.', 'Accusamus ut aut deleniti enim. Atque eveniet ut sunt aperiam. Reiciendis voluptatem sed saepe quisquam magnam quia nesciunt.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(112, 'Molestiae rerum sequi sed sit sint et rerum. Accusantium aspernatur et molestias consequatur sunt ex. Sunt quo porro sit deleniti unde et sit. Sed ipsam aut itaque maxime odio aliquam corrupti vel.', 'Placeat quisquam et beatae soluta et aut eius. Voluptas dolor nam neque magnam corrupti. Nemo quia doloremque rerum rem laudantium labore sed. Quis in eum omnis dolore.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(113, 'Praesentium et molestiae dolor rerum. Similique voluptatem sit sint ad ea tempore. Rem ut earum quia voluptas et mollitia.', 'Quas omnis in ipsum. Dolores aut neque eligendi adipisci. Quaerat cum quia ut provident quidem ut fuga.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(114, 'Et quidem voluptas ut dolorum dolor. Veritatis soluta et voluptatem velit. Voluptas qui accusamus dolorem sint libero.', 'Alias fuga quia qui non omnis quis mollitia. Necessitatibus perspiciatis non qui dicta. Doloribus qui qui sint ut voluptates et et. Odit cupiditate qui odit.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(115, 'Quis dolorem rerum eum porro reprehenderit. Dignissimos cupiditate vitae numquam assumenda consequatur enim. Assumenda vel sunt quia iste non. Nulla quidem fugiat quia dolorum. Omnis voluptatem inventore sapiente enim aut. Ducimus ratione est enim qui.', 'Excepturi adipisci asperiores consequatur praesentium. Vel illo provident sed voluptatem. Qui nostrum dolor provident nostrum sint. Iusto fugit quaerat dolores laudantium omnis illum est.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(116, 'Harum quibusdam temporibus nesciunt excepturi molestiae. Odio ea ratione fugiat atque. Quibusdam fugiat ea quasi minima commodi et ut.', 'Quo perferendis eos fuga minus fugiat. Eligendi sequi quidem voluptas. Inventore voluptas error repellat dicta eos esse. Nisi quidem est magnam aut cum.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(117, 'Dolores est rerum non. Sint rerum perspiciatis nemo aut et. Enim ut recusandae provident quisquam et sit quas iste. Laborum sint cupiditate dolor.', 'Nam sint odit expedita nihil eos voluptatum. Alias facilis voluptas neque ea distinctio omnis. Ut unde dolore doloribus quia eos sunt sit. Hic itaque illum veritatis officia magni rerum repellat.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(118, 'Enim enim inventore inventore eligendi natus qui nulla et. Minus in et laudantium itaque fuga nam. Quibusdam et quasi vel in impedit. Aspernatur rerum eius dolores voluptate. Consectetur est ullam animi et error sit.', 'Aut optio ea quaerat ad. Dignissimos magnam possimus molestiae qui eos. Veniam sapiente repellat et provident. Optio neque molestiae corrupti fugit quibusdam. Quae nam sunt repellat dolorem.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(119, 'Labore ea ipsum a dolor. Laboriosam est totam excepturi et cum. Quisquam non earum omnis consequatur asperiores tenetur.', 'Nesciunt corrupti voluptatum culpa eveniet qui porro. Consectetur consequatur earum corrupti ea sapiente iusto vitae. Repellat aut aut magnam id reprehenderit ea.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(120, 'Mollitia possimus occaecati fugiat est voluptatibus molestiae. Impedit incidunt eligendi sed id quo. Culpa dolor dicta soluta dolorem et. Velit mollitia tempore porro consectetur temporibus.', 'Qui officiis sint minus rerum iusto voluptate. Asperiores excepturi quam officia nemo. Aut minima incidunt quasi qui. Earum id nihil non. Qui dignissimos velit ut eius.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(121, 'Est non officiis id distinctio nobis doloremque doloremque in. Sapiente qui tempora earum quis est totam. Est nostrum sed perferendis quisquam voluptas. Pariatur aspernatur et quas enim sequi temporibus pariatur sit.', 'Tempora vitae unde et sit aut voluptas. Laboriosam ex sapiente repellendus aut quia deleniti. Ut et culpa odit ut doloremque et rerum. Nisi laboriosam voluptas sequi.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(122, 'Numquam voluptas magni nulla. Corrupti quis alias odit saepe consequatur magni. Sed et nihil ut eos. Incidunt laudantium sed autem excepturi quia.', 'Quaerat suscipit vel amet voluptatem saepe sed eligendi. Qui rerum at explicabo sapiente laudantium. Ut qui quo eaque deserunt eos iste. Quae vero amet enim et.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(123, 'Velit officia distinctio laudantium ipsa cum. Sed aut error in aut consequuntur aut. Veniam doloremque dolorem sed nihil animi tempora.', 'Numquam molestias aliquam doloribus optio totam ut. Enim vel quo corrupti omnis qui in. Placeat temporibus quidem neque velit explicabo.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(124, 'Aperiam est libero aut occaecati. Est voluptas qui sapiente dolores at doloribus perspiciatis. Ex quis quis qui quo. Labore odit alias eaque dignissimos aperiam quia eius.', 'Nisi eum quae mollitia blanditiis eius consectetur consequatur. Inventore ab enim nostrum aliquid non.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(125, 'Ut sunt omnis ab voluptatem quia consequatur facere sequi. Alias facere enim animi nihil modi cum occaecati. Dolorem id error totam quis earum. Numquam quaerat ipsam minima sed dolores. Magnam quam fugit quo nisi.', 'Asperiores deleniti voluptatem ex velit eveniet id consectetur. Ullam sunt culpa esse modi beatae harum.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(126, 'Fuga similique omnis et quo quidem nostrum ducimus. Quibusdam nisi qui provident asperiores aut optio. Cum corrupti non a eum aut. Qui nisi rerum eos ducimus aliquid corporis. Enim qui pariatur hic et qui illo quia.', 'Laborum nostrum aliquid harum ipsa. Ea soluta ad eum cupiditate voluptas maxime et. Sit explicabo mollitia ipsum commodi quasi et eius.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(127, 'Excepturi qui et quidem voluptatem. Et cupiditate facilis iure. Saepe ut ea voluptatem et qui laboriosam. Autem sint et eaque corrupti consequuntur.', 'Doloremque a molestiae et facere laudantium numquam voluptatem. Corrupti quam sapiente a error voluptas atque atque natus. Delectus at rem animi ut qui dolor.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(128, 'Doloremque est vitae velit tempore officia illum qui quod. Rerum omnis impedit sunt ad. Fugit sit totam aspernatur reiciendis fugit. Adipisci quae facilis dolores praesentium vero.', 'Maiores dolor sed temporibus autem eius suscipit. Officia sed qui praesentium velit. Aut dolore asperiores tenetur ea sit. Nostrum sit exercitationem ipsam amet.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(129, 'Nisi harum laborum quia vel magnam ratione. Quisquam dolor eveniet voluptatibus quae quibusdam. Est libero eum eum cum dolorum. Temporibus id reprehenderit esse necessitatibus odit tenetur ut.', 'Eos corporis ut labore dolorum. Quae sint qui quis quisquam culpa voluptatibus. Dignissimos nulla aut laborum ipsa quasi.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(130, 'Maiores distinctio commodi dolores culpa sit enim provident architecto. Et dolorum sint aut quis eos commodi. Enim omnis dolorum in quis magnam error. Modi praesentium provident sapiente.', 'Accusamus veritatis debitis est. Voluptatem et eum eum. Rerum temporibus error ea non rerum ad in. Qui id et quod delectus nisi eos. Optio non autem eum voluptatum dignissimos quam porro sint.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(131, 'Assumenda ut enim qui dignissimos. Enim numquam dolore maxime eos deserunt error et atque. Ex aliquam quia natus totam quos provident. Soluta minima dolor quisquam.', 'Culpa non doloribus optio distinctio maiores cum. Eaque explicabo quo vel saepe. Aut voluptates dolorem eius molestias sint tenetur saepe.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(132, 'Ex itaque atque molestias eos neque consequatur. Explicabo rem molestias qui qui.', 'Consequatur est officiis et porro enim ea. Vitae dolore nihil ea vel. Error adipisci veritatis debitis omnis dolor omnis. Consequatur nihil est at est qui quod.', '2021-11-20 14:47:34', '2021-11-20 14:47:34');
INSERT INTO `modeles_devis` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(133, 'Ipsum aut veniam mollitia. Vel cum quas cum inventore sequi velit quia. Et eius et beatae qui minima. Animi recusandae non consectetur atque molestiae.', 'Autem repellat deserunt voluptate et beatae quo est. Consequatur molestias cumque aspernatur ut iure. Ab alias molestiae pariatur pariatur reiciendis qui. Sed unde dolorem recusandae at dolorem.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(134, 'Omnis et et non sed ipsum. Quo ut voluptatem aut aut nostrum minus ea dolor. Vel dolor eum eos voluptatum saepe labore. Voluptatem in iste saepe enim dolores unde voluptate.', 'Voluptatem voluptatum deleniti qui officia quos. Non tenetur dolores praesentium et iste accusantium. Eum fuga facilis minus temporibus et non.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(135, 'Voluptas et assumenda facere atque. Neque est tenetur et aut ex illum qui eaque. Eum porro voluptates vel illo. Tenetur ipsa quia sed perspiciatis atque repellendus.', 'Nihil est eaque est. Iste libero iure est illo sit. Facilis minima voluptatibus impedit magnam praesentium eveniet. Praesentium reiciendis voluptas quia. Expedita sequi dolore eos quam et fugit.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(136, 'Consequatur possimus asperiores aut aliquid officia quam et. Animi consequatur debitis exercitationem soluta sed eos quod.', 'Cum ullam optio quam explicabo natus officia explicabo. Tenetur nesciunt cum dolores autem itaque vel temporibus.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(137, 'Tempore est et vel. Vero harum exercitationem tempore aut. Dolor deserunt quos deleniti id ad quis.', 'Exercitationem ad magnam facilis autem vel. Incidunt autem numquam ducimus aut consequuntur quia rerum. Libero minima esse mollitia explicabo repellat numquam. Non qui libero quis repudiandae quia.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(138, 'Voluptatum quas et consequatur et et odio sit. Dignissimos non est reprehenderit aut molestias. Excepturi repellendus delectus sed natus cupiditate temporibus.', 'Amet consequatur fugiat et quia. Dignissimos sunt at quo amet eligendi repudiandae. Ullam nihil blanditiis consequatur repellendus occaecati sed quod. Deleniti possimus quia ex qui illum.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(139, 'Quam aut velit dolorum consequatur iusto voluptas. Est ut sed cum accusantium blanditiis asperiores et.', 'Optio eligendi omnis et autem voluptas itaque. Eum omnis provident praesentium debitis. Quia et hic voluptatibus deleniti dolor fugit.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(140, 'Et porro aut recusandae esse. Quod ipsa qui molestiae neque voluptatibus. Voluptatem in laboriosam id neque a neque eos.', 'Et debitis eius consequatur maxime dolore maxime. Cumque sit est in earum optio vero. Repudiandae odit maxime enim. Voluptates commodi excepturi iste. Incidunt illo voluptatem consectetur dolorum.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(141, 'Quas repudiandae pariatur eos ad sed. Perspiciatis harum nihil eos. Et sed atque eos facilis quo eos. Eaque est et pariatur sed harum non. Vitae qui voluptatem libero ea pariatur. Exercitationem soluta corrupti praesentium voluptates odio.', 'Natus qui iure cupiditate sint exercitationem quas. Qui veritatis debitis eaque vel. Quia nesciunt dolorem earum illum sit.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(142, 'Eaque voluptas est non explicabo voluptatem. Velit velit blanditiis dolor incidunt ut voluptatem soluta. Cumque aut reprehenderit nulla consequatur.', 'Exercitationem excepturi facilis vel repellat velit qui. Dolores rerum reiciendis earum. Voluptatem nam autem et sit dicta. Voluptatem et voluptate quidem qui doloribus labore sit.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(143, 'Consequatur nemo magnam possimus sit deleniti aspernatur et. In eum expedita est provident soluta nobis. Harum iste voluptatum asperiores dignissimos ab earum.', 'Et molestiae nam at accusantium sint similique. Possimus repellat ipsam doloribus. Dolor fugiat harum consequuntur est asperiores voluptatibus. Enim quia voluptatum nihil distinctio quo ab quam.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(144, 'Sed odit molestiae voluptates delectus. Repellendus enim nemo iure optio consectetur quia. Saepe voluptatem laborum necessitatibus et hic sed fuga. Qui quo dicta temporibus ullam sint.', 'Nisi rem suscipit qui id qui iure. Sed eveniet aut et illum saepe. Quibusdam ullam cumque sequi eos.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(145, 'Non commodi delectus unde ut totam. A neque sint nam sunt. Temporibus ipsa et consequatur enim.', 'Et perspiciatis vitae eos saepe ipsa illo incidunt. Enim eum corrupti quod rerum qui. Tenetur magnam itaque cumque. Autem perferendis possimus eos culpa quia voluptatem sapiente sint.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(146, 'Quae ut consequatur consectetur vero assumenda exercitationem. Iusto nemo sint voluptatum cupiditate est impedit asperiores impedit. Architecto ea natus et ipsum assumenda quia accusantium. Omnis numquam et culpa sint a et quia.', 'Repudiandae est excepturi praesentium. Fugiat error temporibus sit tempore. Debitis id qui architecto et eos cupiditate. Rerum beatae excepturi nesciunt inventore et.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(147, 'Nihil porro delectus omnis necessitatibus eum. Culpa id aut occaecati voluptate. Eos sed ut ipsum. Numquam minus omnis molestiae debitis temporibus ullam saepe.', 'Voluptas libero commodi dolorum facilis. Excepturi iste qui rerum necessitatibus soluta placeat. Quo accusamus sed temporibus aspernatur hic doloribus saepe necessitatibus.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(148, 'Blanditiis nemo qui ullam ea quisquam repellendus. Quis et ea consequatur. Et occaecati suscipit temporibus animi ea nulla placeat. Quia non maiores et dolores quidem laborum quisquam et. Corrupti minima laboriosam deleniti distinctio velit quis.', 'Esse eum qui sit cupiditate non et. Illo soluta commodi quam quidem qui nesciunt. Praesentium molestiae et ut officiis quia.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(149, 'Explicabo eos vel qui voluptas animi qui pariatur. Doloremque quidem nisi quas placeat laudantium voluptate. Harum quo dolorem eligendi.', 'Aut commodi rerum ut voluptatem et voluptate. Deserunt corporis libero suscipit id perferendis quis. Et et aut magni eligendi voluptas nihil aliquid. Assumenda atque atque et quia rem.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(150, 'Atque qui praesentium consequatur eligendi consectetur quasi sit perspiciatis. Ipsum minus minus incidunt porro et illum temporibus. Et asperiores perferendis reiciendis quis laboriosam et perspiciatis.', 'Distinctio voluptatem sint temporibus molestiae consectetur quo aut. Ducimus suscipit soluta ipsum velit. Sint rerum et sit dolor. Maxime ea ipsa facere alias. Ut neque unde incidunt.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(151, 'Consequatur blanditiis et ut dolorem ipsa vel sed. Amet eius tempora sit magni. Sit veritatis eos tempore illum et saepe.', 'Adipisci odit illum dicta. Inventore exercitationem suscipit aut officiis dolorem enim. Ut animi dolorum est eum delectus qui.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(152, 'Quos eveniet aliquid tenetur. Dolor possimus pariatur est fuga eligendi repellendus. Quia voluptatem illo recusandae sunt. Non velit enim enim et nesciunt deserunt. Deserunt et soluta magnam. Sit suscipit aut saepe dolor atque ratione.', 'Quis officiis sit quis doloremque. Eveniet quos exercitationem nesciunt nihil impedit occaecati et. Architecto est natus veniam qui sequi debitis.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(153, 'Atque dolores eos necessitatibus deserunt dignissimos voluptatem. Sed aut omnis autem quaerat. Perspiciatis amet sapiente rerum commodi voluptate ea consequatur. Est quia laborum a vitae.', 'Qui quia vel porro voluptatum ad. Recusandae dicta et cupiditate aspernatur blanditiis dolorem. Suscipit aperiam amet doloribus occaecati quia.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(154, 'Sapiente voluptatem sapiente omnis rerum officiis quia illum. Odit in modi dolorem aut. Aut consequatur odio rem vero unde accusamus. Illum et dolores exercitationem quo unde voluptas. Doloribus quam ut quia harum laborum.', 'Animi ut eius optio odit. Tempora quia nobis est vitae eius reprehenderit.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(155, 'Quia aut et tenetur dolor nesciunt omnis quas laudantium. Distinctio quam facere consequuntur reprehenderit ipsa. Rerum placeat possimus tenetur tempora dignissimos deserunt et. Optio porro et totam eveniet perferendis cum.', 'Excepturi consequatur voluptas error et qui corrupti ut voluptate. Accusantium pariatur vel eveniet minima voluptatem et. Eaque adipisci porro incidunt tempore et.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(156, 'Eos cupiditate ut quia enim sapiente repellendus et omnis. Qui esse velit esse enim dolorem earum ut. Voluptatem eius sunt ullam perferendis laboriosam facilis reprehenderit.', 'Aperiam doloribus ipsam velit eveniet aperiam. Ducimus possimus corporis pariatur quia qui asperiores dolorem aut. Nihil impedit tempore numquam vel.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(157, 'Incidunt repellat ut dolore qui et. Rerum cupiditate iure id dolore sit. Sit fugit animi beatae omnis est facere. Sed et unde qui. Provident in debitis maiores sit odio sed. Necessitatibus cupiditate impedit fugiat adipisci id.', 'Amet et dolorum eum earum. Non deleniti sunt omnis similique in adipisci assumenda quasi. Ipsa quia temporibus iusto qui perspiciatis qui rerum illo. Sint qui non id eos.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(158, 'Quia voluptas dolorem exercitationem et cumque molestiae quia. Quidem porro et nobis quam in aut velit. Molestiae in optio a odit. Labore ut perferendis aut dignissimos laboriosam.', 'Nemo distinctio ea unde perferendis sed in quae. Dolorem maxime et aut vitae. Dicta consequatur vitae eum consequuntur.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(159, 'Ut alias quo quisquam ea autem cupiditate est cupiditate. Excepturi sequi rem ea sed. Quam in sunt quidem suscipit vitae quis ipsum hic. Quos doloribus dignissimos temporibus exercitationem.', 'Accusantium tenetur fuga quibusdam aperiam fuga. Ex molestiae reprehenderit qui tempore quia. Aperiam sunt pariatur iusto ullam inventore eius temporibus.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(160, 'Molestias deserunt quasi molestias libero deserunt id. Magni omnis ex mollitia. Nulla impedit vel non et voluptatem sint. Ullam ratione similique ut sequi consectetur.', 'Est quaerat sit vel cum omnis blanditiis. Libero harum ea sint nihil. Ipsam quidem optio eveniet earum odit molestiae commodi. Sit quod velit veritatis consequuntur possimus expedita asperiores.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(161, 'Voluptatem voluptatum et harum nihil consequatur est ipsum. Dolorem id qui ab quod assumenda possimus eaque. Voluptatem nulla impedit numquam sapiente rerum nisi. Distinctio voluptas voluptatem earum dicta pariatur qui quisquam.', 'Dolor molestiae omnis doloribus rem dolorem et. Nulla voluptate ea excepturi autem velit. Et dolor voluptas expedita mollitia ratione saepe. Delectus sapiente et voluptas ea sed harum harum deleniti.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(162, 'Quidem illum nostrum et eos esse voluptates nihil. Non delectus nam ipsam aut et. Non voluptate excepturi voluptatem est. Recusandae non aut nihil.', 'Cumque ut ipsa et ratione. Exercitationem in labore qui sed necessitatibus in sunt. Ut quibusdam nesciunt aliquam amet enim. Corporis alias itaque autem exercitationem odio quibusdam corporis est.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(163, 'Aperiam et autem non nihil totam sapiente possimus nisi. Corporis quia ea sed quis. Amet saepe dolorem qui hic quos sed ex. Aperiam ad ex nobis eligendi.', 'Consequatur non repudiandae molestiae. Est quisquam quia voluptas sed. Aut ut dolorum rerum quis et. Minus numquam voluptas quas provident. Voluptas sint eos est.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(164, 'Qui non velit mollitia magnam. Recusandae nobis voluptates amet voluptas ab nostrum quia. Temporibus nihil vel quod quae qui mollitia molestiae repellendus.', 'Laudantium corrupti recusandae inventore sit dolores quas id. Ipsam ut cupiditate voluptas ea voluptate. Sed delectus architecto sapiente quis dolores debitis.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(165, 'Voluptate aliquid voluptatem aut dolores est eos dolorem. Itaque quo quasi iure est asperiores et.', 'Laborum et quasi totam molestiae aspernatur. Sed eligendi eum eos voluptas libero qui accusantium. Praesentium magni dolorem et in. Enim cupiditate modi adipisci.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(166, 'Aperiam quisquam voluptatem tempore fugiat. Laboriosam laborum omnis facilis dolore qui eius eum. At sapiente enim omnis fugit dignissimos voluptas sed. Et cumque nihil qui et perferendis earum velit commodi.', 'Ullam nihil possimus nulla voluptas eum sit. Sit fugit sapiente distinctio ratione dolores. Voluptas molestiae et sequi culpa delectus perspiciatis temporibus.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(167, 'Odit ratione et aliquid nam. Velit voluptatem laudantium deserunt quas harum amet ut. Quod corrupti qui possimus laborum occaecati. Odio assumenda magni sunt possimus esse earum. Soluta provident distinctio debitis est doloribus.', 'Ullam nesciunt quidem laudantium voluptatem et. Nihil magnam pariatur et tempora vel est ipsum. Quasi quidem placeat maiores nostrum. Laudantium non qui aperiam ad iste.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(168, 'Voluptas aliquam tempore minus et vel deleniti aut. Non cumque exercitationem reiciendis explicabo fugit. Delectus doloribus magnam error laborum fugiat esse dignissimos impedit.', 'Quia maxime ut sint porro. Officiis ut vel mollitia laborum et. Iusto quia architecto quis incidunt dicta sed.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(169, 'Corporis alias velit recusandae deleniti velit autem accusamus. Et et perspiciatis qui. Harum minus delectus necessitatibus quia expedita corrupti reprehenderit. A est consequuntur enim.', 'Quis necessitatibus dicta nemo vero adipisci commodi. Aliquam corporis aut amet quo. Cumque nihil ea amet facere eaque cum. Et aut est odio nemo a tempore numquam inventore.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(170, 'Distinctio officiis eum quae laudantium quas sint. Et delectus odit repudiandae quasi. Ut dolores facilis sed et repudiandae magnam.', 'Aut libero aut minima nam molestiae dignissimos. Voluptatum aspernatur nisi nihil sunt molestias aut. Quasi excepturi vel ea perferendis cupiditate sed.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(171, 'Aut id dolorem nisi magnam sint. Autem vitae quo architecto. Quos consectetur placeat esse. Blanditiis et adipisci aperiam ea doloribus in ratione.', 'A omnis tempora a et necessitatibus molestiae distinctio. Dicta animi quaerat iste rerum ipsum aut. Assumenda ea non sed voluptatem voluptas suscipit.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(172, 'Quia quos maxime quod officia sed eligendi rerum dignissimos. Autem voluptatem dolores alias et neque eaque nam. Esse eum voluptatum omnis rerum doloremque. Et soluta commodi adipisci eum inventore.', 'Quibusdam quo placeat voluptatem quia. Dolores dolores quidem qui vel tenetur iusto. Rerum mollitia facilis dolor nulla deserunt.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(173, 'Quo suscipit accusantium et ratione velit. Incidunt doloribus facere corrupti veritatis. Harum quia laudantium molestiae alias nam voluptatem recusandae assumenda.', 'Labore autem ut sint magnam eum exercitationem eos consequatur. Eum provident sit enim suscipit itaque. Fugiat eum in illo nisi sunt. Qui et maxime ab repellat qui quo.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(174, 'Aut est et atque laudantium. Vel illum et similique fuga soluta rem. Hic odio veniam architecto provident ea.', 'Et sapiente quo autem dolores. Qui sunt voluptas aut et. Ullam aliquid ipsam veritatis nihil aut et voluptas. Placeat maiores autem nesciunt cupiditate beatae omnis.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(175, 'Facilis consequatur aliquam consequatur ea dicta cum. Hic odio officiis ea numquam. Ut molestiae laudantium velit iusto voluptatem sint fugiat repellendus.', 'Voluptatibus sit id est cupiditate. Et sed eos voluptatibus. Corrupti molestiae enim tempore maxime cumque.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(176, 'Ratione et quod qui nesciunt qui. Qui sint tenetur nobis non. Unde autem iste ipsum ea distinctio. Quia laborum est esse illum molestiae quos. Unde sit excepturi saepe modi doloribus. Voluptatem natus atque accusamus sed.', 'Illum excepturi velit laboriosam. Voluptatibus et tempora laudantium debitis velit eveniet. Voluptatem vero ducimus quisquam quia quod ipsam et. Voluptatum commodi rerum hic. A similique sint ipsa.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(177, 'Perferendis laborum quia aut veniam dolorem hic omnis cumque. Alias fuga amet quis corporis id dolore adipisci. In eum est quae quod.', 'Nemo suscipit harum officia ab. Id explicabo eligendi dolorem quia minus corporis explicabo blanditiis. Velit explicabo dolores aperiam repellendus quia cumque. Nemo dolore enim ab libero.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(178, 'Et soluta sit doloribus minus veniam occaecati. Nemo recusandae dicta est cupiditate at dicta temporibus. Commodi qui nisi ea placeat odio dicta. Quasi ipsum omnis nostrum.', 'Aspernatur doloremque nihil beatae explicabo. Sed porro aut qui nobis eum architecto assumenda. Nostrum quas maiores rem commodi. Qui sequi eius voluptatum quis in laboriosam.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(179, 'Possimus doloremque sunt a nisi fugit ad ut dignissimos. Vel sit id adipisci est. Sint a modi architecto quam quod. At dolores in id beatae ipsum. Neque id et inventore odit aliquid dignissimos quasi unde.', 'Perferendis itaque culpa possimus vel soluta. Cupiditate et earum et quo necessitatibus. Dolorem adipisci eaque placeat.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(180, 'Voluptates quo aut at cumque nulla ipsam. Aut quod pariatur natus qui quia aut. Sequi qui eveniet ad fugit voluptas sit culpa. Non sit eius dolor non. Aut labore architecto sed nesciunt. Ducimus quis vel cupiditate ut.', 'Nobis temporibus inventore dolor nam officiis. Est fugit totam maiores dolores. In non occaecati debitis debitis iure dolorum.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(181, 'Laboriosam omnis est a ut maxime libero deleniti. Necessitatibus quidem unde commodi atque est. Possimus tempora quis dolor sunt pariatur.', 'Illo corporis distinctio quo accusamus non id mollitia. Mollitia quos quia sed aut perspiciatis. Laudantium sed sit sit minus sit.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(182, 'Ducimus similique debitis ut voluptatum. Fuga ex voluptas recusandae voluptatem minus optio fugit. Libero blanditiis at et est quo voluptatum. Et atque debitis exercitationem nulla ut voluptas fugit.', 'Facilis maxime placeat quia. Et odio beatae non molestiae quisquam amet. Rerum nihil impedit hic.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(183, 'Et qui minus provident ipsa vel animi. Ipsam ut ab ratione facilis voluptatum sint vel.', 'Vitae ipsum rerum illo explicabo quos voluptas esse cupiditate. Cumque magni enim et nobis quia et quae. Neque non voluptate dolorem beatae.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(184, 'Non nostrum distinctio vel libero. Ab laboriosam ut corrupti quae quo. Iste enim molestias et. Consectetur corporis officia et. Reiciendis nulla et corporis maxime. Aut et vero et. Est cum quidem eaque harum.', 'Sed eaque reprehenderit voluptatum omnis iste deleniti sint. Iste vel impedit sed. Voluptatibus maxime dolorem reprehenderit rerum doloremque ipsa. Ut et architecto possimus dicta quae.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(185, 'Alias doloremque et at sed corrupti quis qui. Et aut non cumque deleniti eos. Omnis sint omnis odit blanditiis et maxime.', 'Ratione alias et totam. At quis quo officia at commodi consequatur. Laboriosam ea aut necessitatibus fugit dolores.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(186, 'Est consectetur exercitationem saepe qui tempora saepe voluptatibus. Qui tempora expedita aut animi. Neque voluptatem quasi omnis quod totam dolores labore fuga.', 'Qui aut cupiditate aperiam eum. Est fugiat sunt alias et. Praesentium distinctio voluptatem laboriosam corporis dolores repudiandae.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(187, 'Ut occaecati quis molestias. Delectus et porro sint fugit. Culpa perspiciatis vel sapiente tenetur sit perferendis. Sequi distinctio amet aliquam non.', 'Molestiae nihil libero temporibus eos illo doloribus est. Eius beatae saepe id. Ad rerum eius dolor sunt.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(188, 'Possimus eveniet hic ut reprehenderit. Rerum accusantium deleniti placeat porro quibusdam porro qui. Quos et corporis dolorum in deserunt deleniti. Similique natus dolores at a. Omnis fugit unde fuga temporibus vero fugit non.', 'Reprehenderit optio delectus aut. Quod ea et molestiae tempore eligendi. Et quos amet fuga amet natus fugit autem. Ducimus ipsum voluptas similique expedita. Quas sit amet minima accusantium itaque.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(189, 'Accusantium nobis rerum consectetur molestiae quaerat dolor distinctio. Ad minus dolorem voluptates aliquid cumque error qui. Ducimus in non assumenda enim distinctio.', 'Autem cupiditate eos quia veritatis. Et neque ex reiciendis accusamus vel. In perspiciatis possimus in velit sed.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(190, 'Placeat commodi animi aperiam expedita autem nostrum. Inventore totam pariatur corrupti nihil.', 'Perspiciatis aut voluptate tempora architecto minus ut praesentium. Quia et molestias doloribus dolores porro non illo. Reprehenderit praesentium adipisci eius consequatur est non aut ad.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(191, 'Sit molestiae quam et magni. Atque modi nam ut autem. In quam totam harum vel. Natus blanditiis et consequatur rerum.', 'Ducimus amet nemo in in sit. Tempora ipsa maiores recusandae culpa omnis. Ut eum ut dolor. Dignissimos sit quia amet qui.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(192, 'Assumenda officiis earum rerum vero exercitationem fugiat iure. Ratione vitae consequatur rem provident id libero. Ducimus minus soluta et quo ad voluptas.', 'Unde facere dolorem sed dolores aliquam assumenda. Aut quos incidunt reprehenderit explicabo iure aut. Ipsam reprehenderit et qui velit incidunt totam.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(193, 'Magnam et praesentium aperiam laudantium cum laboriosam. Qui vel officia itaque odio consequatur quod libero. Et quia alias eos velit voluptatum impedit distinctio perferendis. Voluptate est illum ipsam.', 'Facere debitis iusto cumque in. Corrupti ad enim quidem rem accusantium. Quis fuga rerum ducimus alias sapiente sunt quos. Quis molestias voluptatibus vitae nemo ut dolore ea ea.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(194, 'Est voluptatem vel eveniet mollitia. Eum quia rerum voluptatem laboriosam. Et mollitia tempore voluptas ducimus accusantium iste. Ut repellat et odio et eum saepe impedit. Illo ad dolorem culpa quasi vitae officiis.', 'Eum natus libero sed ut odio quasi. Recusandae fuga et qui. Voluptatibus optio est incidunt veniam. Velit repellat aut cum nostrum repellat enim aliquid iste.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(195, 'Ipsam nostrum enim atque ducimus et porro. Ducimus neque consequuntur velit eligendi numquam quod. Et consectetur a libero in sed. Blanditiis quo numquam saepe est.', 'Nihil quia officia at. Et voluptates odio aut. Dolores aut quis sit neque sed. Quis et suscipit quod aut laborum vel nostrum consequatur.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(196, 'Natus est ea doloremque consequatur optio qui. Aut nihil autem et sunt qui quia amet. Quia quae culpa explicabo illo rerum. Dicta pariatur ut pariatur.', 'Et molestiae inventore tempora nam. Delectus quod voluptatem corrupti sit. Magnam blanditiis beatae molestiae. Voluptas velit autem aut illum et voluptates est provident.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(197, 'Nihil iste non facilis dolorem incidunt. Molestiae corrupti explicabo recusandae. Hic veritatis eaque accusantium et odit unde perferendis ratione. Labore ad molestiae voluptatem id saepe.', 'Aut molestiae corporis doloribus quos. Ut natus voluptatum praesentium. Omnis molestiae atque cum ab distinctio nostrum omnis ut.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(198, 'Suscipit tempore rerum dignissimos pariatur ullam eum. Consequatur animi amet quasi voluptas magni sed quas dolor. Consequatur soluta nemo saepe magnam natus temporibus commodi praesentium.', 'Totam id ut non error. Nemo aut eum omnis autem esse. Sit sint repellendus aut doloremque nemo. Et sit qui saepe fugiat similique eaque voluptatem et.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(199, 'Quidem et magnam autem quaerat aspernatur corporis ipsam ut. Eum dolor praesentium quas fugiat odit. Nemo error modi veniam mollitia. Iure aperiam cum consequatur ad ducimus.', 'Omnis officia saepe sunt repudiandae. Eaque qui cumque sit eum. Doloribus delectus ipsum dolorem est. Rem unde beatae velit eius.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(200, 'Sequi pariatur et est qui rerum libero itaque id. Quisquam fugiat quia sunt aut. Veritatis doloribus aut laboriosam rem.', 'Sunt aut quos ipsa officiis. Excepturi officia voluptatum recusandae sunt molestiae. Odit nihil blanditiis ducimus in aut. Eos consequatur autem est praesentium sequi nam.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(201, 'Eum maiores aut id nihil omnis quo. Voluptatem aspernatur aliquid consequatur ut et ea sint. Omnis cum maxime ullam vitae illo saepe. Aspernatur quia voluptate eum saepe sunt numquam suscipit.', 'Adipisci itaque ad consequatur dignissimos magni quia itaque. Earum autem veniam saepe cumque facilis quidem nemo et. Ipsa optio ut animi sit. Totam aut sed quasi quo sit molestiae sunt sunt.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(202, 'Consequatur est vel molestias aut earum. Occaecati doloribus exercitationem qui modi nesciunt dolor quos. Voluptate odit occaecati ut aliquam quisquam repudiandae.', 'Earum accusamus aut quo accusamus dolores. Autem commodi molestiae excepturi velit dolorem ut odit. Dolores facere laudantium et cum ducimus cum.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(203, 'Doloribus iste eligendi et dolores explicabo architecto autem. Hic sequi est minima omnis at at. Sequi qui laboriosam aut. Sint autem quis ullam placeat molestiae quo debitis.', 'Perspiciatis vel est ut sint veritatis nostrum. Atque sit consectetur quaerat quo sed a iste. Non quo et ullam aut.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(204, 'Quis consectetur at ut voluptatem quia dolor aut. Temporibus rerum dignissimos est et impedit. Est aliquid consequatur quae debitis at ea et.', 'Maxime dolorum hic ea aut beatae quam praesentium. Quam cum rerum voluptatem neque. Aspernatur autem iure quia. Vero qui commodi vitae sapiente nesciunt.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(205, 'Enim cum et est officiis rerum et. Libero magni harum sit molestiae dolores odit iure. Ex et laboriosam est eum et debitis quis.', 'Soluta aut a sunt iure. Inventore rerum et doloribus odio autem quia. Deserunt error aliquam voluptas. Odio est et tempora. Officia eius quos beatae aut consequuntur necessitatibus.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(206, 'Voluptatem ex sunt unde eveniet. Qui explicabo blanditiis inventore neque aut iste itaque consequatur. Sapiente explicabo at est magnam dolorum. Omnis ut labore dolores voluptatem ad rerum iure.', 'Saepe laudantium ullam iusto corporis. Architecto ex quia placeat tempora temporibus.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(207, 'Nemo molestiae eos sint corrupti odio in doloribus. Totam asperiores nihil sapiente dicta quia est vitae. Repellendus quo magnam ut et maiores. Quidem cum quibusdam et voluptas facilis id ipsum. Quisquam sit qui id consequatur.', 'Fugit nulla laborum ut nisi est fuga fugiat. Aspernatur et incidunt similique qui sint. Corporis modi quas quisquam voluptate sunt odio iste.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(208, 'Aliquid aut voluptatem voluptas neque quia exercitationem. Id ex et at saepe. Officiis aut repellendus occaecati non eum. Dolores quo tenetur eveniet sunt natus non aspernatur molestiae.', 'Enim quod neque est illum. Sit molestiae voluptatem modi sed quia. Quisquam dolore quasi dignissimos saepe earum voluptatem necessitatibus. Eos at autem similique vel et quia a.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(209, 'Temporibus asperiores provident unde accusantium itaque nostrum non earum. Neque vero consequatur autem harum cumque rem et unde. Ea maiores temporibus placeat itaque ea quos error.', 'Autem sit hic accusamus dolorum quo sed eveniet. Corrupti quo accusantium dignissimos sed vel. Consequatur qui consectetur eos non sed.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(210, 'Qui animi ea eius facilis velit aperiam. Iste velit minima quo nesciunt molestias. Et voluptate molestias et eveniet voluptatem in. Non tenetur placeat non quas aut id iusto reprehenderit.', 'Cupiditate dolorem facilis ad quia earum. Et voluptas beatae commodi dolores laborum. Quo laboriosam ullam tempora quas cum quia.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(211, 'Qui libero neque et fuga voluptatum eos. Facere dolor est iusto beatae. Nostrum illo vitae cumque porro eum. Molestias harum voluptatem repellat ipsum suscipit laudantium tenetur. Maxime harum sit qui ab. Nesciunt aut necessitatibus quis pariatur dolor.', 'Numquam voluptas architecto laboriosam. Explicabo inventore sunt in cumque placeat excepturi. Est ut debitis quia sunt beatae dolorem ut. Adipisci molestiae eaque assumenda voluptas aut.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(212, 'Expedita sit fugiat quo assumenda. Ut repellendus excepturi blanditiis odit accusantium atque. Officia possimus vel soluta voluptatibus temporibus non. Dolor ex omnis qui ducimus est corporis velit.', 'Cumque qui impedit velit totam qui nemo omnis. Dignissimos quia qui voluptatem exercitationem omnis enim. Natus porro eos laboriosam praesentium quas. Quos est officiis minus vel vero.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(213, 'Est architecto iure autem voluptatem et. Mollitia possimus et at non commodi et eius. Excepturi sequi nulla fugit id minus. Totam quidem ut aliquam id. Laboriosam sapiente non velit vel eligendi neque. Non vel occaecati totam dolor ducimus mollitia.', 'Asperiores tenetur maiores et. In suscipit omnis ipsum velit aspernatur. Est adipisci qui vitae soluta. Eum et nihil qui amet reprehenderit.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(214, 'Rerum facere dolor omnis ducimus. Fuga et quis omnis mollitia in est voluptatem. Consectetur aut hic est blanditiis sint. Perferendis eius aut quas ut voluptas.', 'Excepturi molestiae modi ipsum voluptate recusandae illum. Aliquam ullam qui non qui neque cumque architecto. Omnis sit quo nisi aliquid voluptatibus saepe. Quidem voluptate et accusamus iure hic.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(215, 'Quam quia consectetur et eos et sit. Nostrum laboriosam perferendis deserunt. Quaerat eos culpa et laborum libero. Quisquam ipsum similique sunt maiores omnis ipsam voluptate.', 'Rerum non voluptatem quasi reprehenderit ut quia magnam. Voluptas voluptatum quasi omnis. Et fugiat totam accusamus aspernatur. Qui eaque et sequi vitae eum.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(216, 'Blanditiis labore occaecati et nihil aut tenetur. Accusamus ut et quas enim beatae. Et aliquid rerum beatae omnis. Dignissimos autem ut molestias nemo voluptatem eos deserunt.', 'Dicta quod exercitationem aspernatur ut. Laborum sint ratione ut cumque voluptatem dolor a. Magni doloremque qui sit iure. Mollitia est nihil iure temporibus quo aperiam omnis.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(217, 'Quo repellat labore eos. Placeat distinctio est ut ut magni id aut expedita. Harum molestias occaecati qui facilis delectus iure. Natus aut nostrum similique soluta magni tenetur.', 'Autem reprehenderit distinctio enim. Natus aspernatur voluptatem nulla ut et a. Iure omnis ipsum nisi. Animi laboriosam assumenda eaque alias tempora doloremque.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(218, 'Est ut et eaque. Deleniti eos sit sed delectus expedita doloremque quos. Officiis et sed ipsa et. Magni consequatur et iusto. Autem reprehenderit quia inventore aut quo. Commodi omnis eos labore.', 'Ut similique natus ducimus quod. Cupiditate et rerum amet eaque explicabo in harum. Enim officia ut culpa provident et.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(219, 'Rerum vel molestiae unde sit ut. Est nulla quo dolorem est inventore blanditiis et. Eaque at tempora molestiae beatae rerum magnam.', 'Natus commodi ut quae voluptatem atque. Veniam quam rerum dolorem qui repudiandae cupiditate. Qui tenetur minus quis aliquam est voluptatum ut.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(220, 'Dolores aut molestiae ut molestiae minus voluptatem. Et illum placeat provident sed saepe. Repellat est sint voluptatum consequuntur autem fugiat odit.', 'Quaerat itaque qui iure sunt. Voluptate omnis repellat quam qui quod aspernatur. Id eligendi ullam aut eligendi.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(221, 'Doloremque praesentium consequatur cupiditate qui dolor autem vitae quia. Harum quam est et nemo sunt. Qui eius est possimus autem. Ipsum suscipit qui et maiores et dolorem accusantium.', 'Illum consectetur qui sint officiis aspernatur. Autem provident labore itaque et suscipit. Ea labore in deserunt optio magni placeat.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(222, 'Quo ea nemo enim at incidunt fuga. Nobis quis earum ex. Hic aut molestiae molestias. Provident corrupti enim eaque excepturi placeat pariatur excepturi reiciendis.', 'Ut adipisci sunt id dicta in maiores temporibus. Architecto ex voluptatum dolorem id omnis. Ipsa quis qui odio quis laudantium facere est repellendus.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(223, 'Quas sequi et quia. Sed pariatur earum ad odio. Quis ab voluptate rerum rerum qui et. Reiciendis rerum similique error consequatur. Voluptatem nostrum consequuntur soluta.', 'Fugit amet laborum rem vel. Officiis quia est rerum. Accusantium qui in et magni voluptatem impedit magnam. Accusamus culpa expedita fugiat et.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(224, 'Non voluptas a ab consectetur sequi rerum. Aut distinctio nulla aut quibusdam. Ex repellat omnis magni recusandae. Asperiores officia est rem quasi consequatur. Quos soluta id quam.', 'Voluptas vitae nisi temporibus mollitia sunt. Quod odio aut sit aut quasi sed. Ut quis eos vero voluptatem accusamus.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(225, 'Ut quia voluptas quasi eligendi aperiam totam ratione nobis. Autem deleniti laboriosam cupiditate cumque. Assumenda nesciunt aut debitis. Laborum nobis autem in sed est.', 'Magnam laborum aut nulla. Et aut sed et. Sit omnis voluptatem repellendus corporis. Non officiis ut tenetur ipsum eaque. Nam nam sunt veritatis consectetur. Sunt earum eum molestiae aut porro enim.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(226, 'Earum qui ut unde ut. Nisi exercitationem eveniet incidunt sint dolor repellendus labore eum. Voluptates deserunt beatae qui quis quia quasi. Odit quod deleniti est repudiandae unde atque velit. Animi ex accusamus aut voluptatem consequatur.', 'Perferendis qui enim ea consequatur quisquam qui. Iure sunt dolorem quis sapiente. Laborum consequuntur fugiat earum aut sed quia et debitis.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(227, 'In vel ex natus molestiae ullam sit molestiae odit. Sed culpa iste quam at. Omnis et eos in illum. Et est voluptatibus est molestiae quia sit fuga eligendi.', 'Asperiores tempora et consequatur enim et dolorem. Iste ullam eum illum aut. Deleniti adipisci ut dignissimos ut. Repellendus voluptatem dolore in quas nisi velit.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(228, 'Laudantium est ea repellat illo modi. Rerum exercitationem commodi laborum nemo. Rerum maxime deserunt aut laborum porro et qui.', 'Voluptatem quisquam aperiam est ratione excepturi vitae qui. Dolor et dolores a mollitia dolorum nostrum ducimus. Et voluptatem ipsam assumenda.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(229, 'Sed totam ut aliquam iusto aut officia. Tempore asperiores et omnis a sed. Voluptate nemo at odit.', 'Rerum atque aut quia et asperiores harum enim. Et nemo consectetur est dolores debitis sit eum non. Error nostrum facere tenetur cupiditate.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(230, 'Dolore non beatae non quasi. Voluptas nam nostrum aut quo ut aut voluptatem laudantium. Pariatur nobis necessitatibus rerum dolor rerum repellat. Esse numquam atque laborum praesentium eos.', 'Reiciendis incidunt consequuntur quaerat earum quasi. Adipisci rem magnam iste qui tempore iste. Eum officiis magnam dolorem dicta ut natus.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(231, 'Dignissimos magnam recusandae quasi eius cum deserunt. Voluptatem exercitationem nisi veniam ad ex consequuntur tenetur. Ut harum tenetur aut placeat ut temporibus. Id dolorum exercitationem corrupti cupiditate sit voluptatem.', 'Sed tenetur reiciendis et est. Sint sed reprehenderit qui rerum saepe. Rem ipsum soluta occaecati delectus repellat temporibus.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(232, 'Voluptatem eaque aut neque consequatur aut itaque. Id dolores est necessitatibus quia praesentium quia aut. Quia alias in numquam possimus nihil. Ratione rerum eos qui nam cupiditate dolor alias. Ducimus repellat quia vel et laboriosam magnam.', 'Vel totam quia vero blanditiis sunt reiciendis. Eveniet qui eum laudantium ut perspiciatis soluta facere inventore. Provident odio tempora sed. Placeat aut cum quibusdam dolor ipsam molestiae.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(233, 'Eaque fugit commodi ea magni molestiae distinctio. Totam perspiciatis omnis maiores. Perspiciatis repellendus itaque ut soluta. Esse esse nisi fuga sapiente dolores veniam.', 'Ut modi possimus doloribus impedit cupiditate. Voluptas aut nesciunt ea aut. In culpa sed omnis iste nemo ut. Enim ut praesentium molestiae deleniti amet.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(234, 'Cum rerum aut sint qui ab debitis. Modi accusantium sint vel est velit sint eum. Et hic ut magnam officiis sit beatae repudiandae.', 'Ex qui est temporibus at. Nemo quisquam sint aut ullam. Sapiente voluptatem accusamus aut laudantium ratione.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(235, 'Ab fugit saepe alias maiores molestiae. Dolor ab aut dolore aperiam. Quae inventore rerum facilis quaerat. Consequuntur dolorem error quas.', 'Totam et et ullam. Aut itaque iure facere provident. Dicta voluptatem sed impedit commodi. Qui nesciunt a laboriosam odio.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(236, 'Numquam ab voluptates quam consequatur architecto. Quod ad voluptas natus ipsum. Voluptas facilis quis ut illo sed autem maiores. Soluta deleniti culpa ea nisi quis perferendis.', 'Adipisci vel et veritatis unde molestiae. Esse distinctio sit rerum aut. Qui est aut saepe harum voluptatem. Sint similique qui perspiciatis odio. Voluptatem omnis et earum eum omnis id incidunt.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(237, 'Recusandae dolorem voluptas laborum minima. Dolores sequi tenetur nesciunt. Deserunt repellendus perspiciatis tenetur.', 'Repellendus consequuntur dolorem natus impedit minus. Eos adipisci dolor voluptate ad. In similique nam perferendis et.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(238, 'Asperiores eum autem et. Veniam quae saepe expedita. Molestias reiciendis veniam dolores doloribus.', 'Sequi adipisci laborum debitis. Animi enim nesciunt amet ab. Blanditiis et optio dolore. Nihil laudantium ut tempora dolorem modi consequatur tenetur.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(239, 'Neque ea voluptate est reprehenderit culpa eaque magni ipsam. Tenetur praesentium nisi aliquid. Saepe itaque et molestias odio unde. Nesciunt ullam omnis nostrum sed quia. Consequatur et eaque qui non exercitationem suscipit ipsum vel.', 'Reprehenderit natus deleniti est vel amet qui. Quasi rerum excepturi provident natus. Vel aut explicabo eos dignissimos odit quae.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(240, 'Qui asperiores esse illum error perspiciatis est qui ut. Consequuntur dolor quibusdam mollitia. Non et voluptatum nemo eos voluptas ut non. Dicta accusamus et sequi consequuntur omnis.', 'Natus non earum modi voluptatem facere. Ad autem aut maxime nam veniam accusamus similique. Placeat ea sunt exercitationem consequatur et dolores. Ipsum voluptas reiciendis aut delectus eius in quia.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(241, 'Harum consectetur enim et illum vero. Et autem alias sint libero. Rem minima quis blanditiis dolor molestiae asperiores. Assumenda deleniti temporibus debitis labore maiores hic quis optio.', 'Consectetur quasi totam necessitatibus harum autem laudantium. Consequatur debitis qui exercitationem. Voluptatem laborum culpa eveniet ratione facere dignissimos recusandae.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(242, 'Sed id nihil quisquam totam occaecati. Ut porro blanditiis cupiditate illum eius mollitia delectus. Aliquid voluptatem ipsam deleniti natus suscipit. Voluptates maxime consequuntur cumque minima dolorem mollitia laborum.', 'Nihil numquam deserunt maxime non error eum asperiores odit. Qui rerum nulla sequi. Consequatur explicabo sint quis quia ut voluptas.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(243, 'A suscipit cumque et neque et recusandae dolor. Sed pariatur debitis fuga. Dicta ipsam vel sit rem. Quam autem quia et rerum. Voluptatibus voluptatem similique sit nisi in at consequatur. Autem rerum quae qui cumque et magni. Tenetur omnis est veritatis.', 'Quidem mollitia assumenda eveniet et. Rerum eos natus magnam facilis dolores. Corporis ut ex quibusdam cumque. Nesciunt vel vel officia expedita.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(244, 'Soluta molestiae ratione ipsum mollitia officia. Molestiae aut laborum et. Culpa quos voluptatum amet vitae. Id quia debitis doloribus sed aut iure provident.', 'Et quia sapiente sint magnam impedit eum. Et nobis ipsa dolorem alias et unde aut. Nesciunt qui corporis exercitationem omnis culpa at expedita blanditiis. Quis facere rerum ut.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(245, 'Itaque cumque nam fuga beatae ut aut tenetur occaecati. Ut eum libero voluptatem non nihil officiis est iusto. Perspiciatis accusantium omnis ex suscipit et officiis eos.', 'Cupiditate eligendi sunt sapiente explicabo. Est aut et et aut et ex. Veniam perspiciatis sequi ut.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(246, 'Expedita facere non omnis qui enim tempore distinctio. Perspiciatis ut et voluptates in. Dolores repellat magni nam explicabo autem eum magnam. Nulla non rerum sed.', 'Eos quam enim expedita excepturi qui. Dolores sint et distinctio non dolor ratione excepturi harum. Omnis qui ad consequuntur consequatur praesentium et necessitatibus.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(247, 'Adipisci eos nobis est hic alias eius. Harum omnis dolores nemo nihil. Occaecati natus eaque ut quia nihil quas quo consectetur. Quae quisquam qui eaque tempore fugit odio.', 'Sint quam voluptatem voluptatem voluptatem tenetur nihil ex exercitationem. Sed exercitationem rerum quo id sunt omnis. Itaque suscipit qui non.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(248, 'Explicabo laborum consequatur quo consequatur aut consectetur. Enim sit autem dolores quibusdam. Qui id omnis veritatis voluptatem impedit eum. Explicabo dicta totam nihil et dolores.', 'Repudiandae hic ut sit autem. Possimus nostrum perspiciatis est rerum. Nihil odit quo minus rerum sint minima. Voluptas sit architecto ea occaecati minus.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(249, 'Aliquam minus nemo id nostrum. Natus et labore mollitia qui. Ratione aut tenetur dolor aperiam dolor. Eos sunt neque hic molestiae deserunt qui repellendus.', 'Sint dignissimos est similique et et. Ut cupiditate necessitatibus id fugiat tenetur. Non ea ullam qui blanditiis tempore. Unde ducimus et quia. Neque cum aut possimus non impedit.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(250, 'Autem asperiores autem corrupti cumque sint aut cum. Neque voluptas qui soluta dolores sint. Iusto praesentium distinctio recusandae omnis ut et.', 'Et voluptatibus autem architecto occaecati velit quisquam. Quisquam saepe quam laudantium rem in accusantium sunt cumque. Quia explicabo rerum veritatis rerum quo delectus sit.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(251, 'Temporibus nulla labore beatae dolorum at. Quam facilis quod aut tempora nostrum. Iusto sunt rerum ipsum aut. Facere deserunt quasi facere nihil sapiente eum. Et nam provident reprehenderit voluptatem sunt. Ut ea mollitia eaque quis eos libero.', 'Quam odio et officia eius sed placeat dicta. Alias aut ullam corrupti amet non. Aperiam molestiae laborum et nobis et nihil placeat sit.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(252, 'Dicta accusamus ea consequatur rerum inventore recusandae esse. Enim labore blanditiis ratione a perferendis odio officia et. Soluta tempore perspiciatis qui aliquid et. Magni dolore suscipit recusandae voluptatum.', 'Est consequuntur est voluptatem sunt. Fugit rerum eveniet maiores consectetur ad accusamus cum. Necessitatibus aspernatur voluptatem nobis dignissimos et.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(253, 'Eum quaerat reprehenderit veritatis nulla dolorem. Earum quia nisi reiciendis harum consectetur ad. Consequatur quaerat ea quaerat animi ut sunt magni iusto.', 'Vitae vel tempora in nulla ab. Non perferendis sequi qui veniam unde voluptatem ut. Rem aperiam aut distinctio. Modi autem consequatur sed ut.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(254, 'Molestiae sit et ut a. Et nihil vero laudantium voluptas ipsam. Consequatur culpa sit neque tempora veritatis. Officiis voluptas odit ipsa et similique possimus consequuntur.', 'Modi eos sapiente est sint qui ex est rem. Animi maiores aut sint beatae. Dolores autem qui et doloremque quasi quaerat. Eius similique sapiente sit amet rerum. Recusandae qui id mollitia enim.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(255, 'Quas quis numquam rerum voluptatem a. Sit error velit ut sed et eligendi in. Ea non sequi soluta dolores et perferendis.', 'Cumque neque perspiciatis iste. Expedita eos fugit dolore ipsum quo laudantium. Nulla illum sit aliquam repellendus quo et.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(256, 'Id qui voluptates delectus ipsam enim rerum in. Assumenda eum dolor ea in. Minima excepturi reiciendis minima non sunt ut laborum. Illo ullam soluta et quia sed voluptatum.', 'Ducimus repellat similique modi aperiam at similique. Dolor nihil ipsum consequuntur sit ducimus. Harum beatae voluptatibus consequatur ab perspiciatis.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(257, 'Consequatur impedit reiciendis esse. Omnis nulla quia impedit tempora vitae ex earum. Perspiciatis unde error illo ut blanditiis odio adipisci.', 'Eos ducimus ad delectus minus adipisci dolor. Reprehenderit aperiam quo autem ipsam. Vel officiis omnis cupiditate in sed nihil ut. Autem reprehenderit culpa nostrum sequi aut ipsam est totam.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(258, 'Animi assumenda quia et. Voluptatem similique sint magnam at est voluptates. Perferendis et unde accusamus consectetur. Iste qui sit ut nobis voluptas est quas.', 'Veniam et quos facere dolore autem impedit corporis accusantium. Nobis saepe ex voluptatem dolorem commodi.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(259, 'Rerum soluta aliquid sapiente. Assumenda ullam voluptatum eius nihil voluptas ut. Soluta non hic et aut qui.', 'Commodi voluptatem temporibus perspiciatis totam. Odit officiis dolorem voluptates cupiditate deleniti est. Deserunt est qui est ad odio omnis ab. Id laboriosam quas expedita et velit est quia.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(260, 'Officiis et aliquam rerum est eos dignissimos consequatur. Quisquam quia necessitatibus qui in a. Quo et voluptatibus quae qui cumque qui. Ut laboriosam enim nam facere consequatur.', 'Est quisquam voluptatum voluptatum velit. Non minima accusamus illo in ratione unde laudantium. Aut similique consequuntur voluptates id. Vel voluptas minus non culpa velit aut.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(261, 'A labore rem minus tempora velit. Inventore eos vel nihil explicabo. Aut quis voluptate aliquam sint pariatur. Natus sapiente veritatis saepe asperiores accusantium sit assumenda.', 'Officia qui dolorem quis est itaque quam qui. Rem hic sit ipsa illo et nisi. Asperiores iusto et quibusdam cum. Adipisci id fugit qui labore quis sed rerum.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(262, 'Dolorem labore itaque suscipit atque modi accusantium. Velit est voluptas eum ut dolor. Nobis amet corporis et recusandae at quod assumenda. Sunt enim ut tenetur est praesentium vel fugit.', 'Nisi adipisci expedita vero vero ipsam. Ut ut iste et eligendi doloremque quia.', '2021-11-20 14:47:43', '2021-11-20 14:47:43');
INSERT INTO `modeles_devis` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(263, 'Aliquid soluta laborum qui libero fuga provident ullam. Sit et itaque quasi quia. Eum et in sed laboriosam voluptatem incidunt. Eaque qui voluptas sit possimus.', 'Esse doloribus ratione illo cupiditate ullam. Consectetur eveniet omnis qui sint minus. Voluptatum ut repellendus sed alias.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(264, 'Recusandae dolorum illum voluptatem. Est cupiditate aspernatur possimus quisquam. Quibusdam numquam ducimus deserunt suscipit. Aut rerum aut aut officiis earum.', 'Laboriosam ut quos voluptate ut. Voluptatibus aspernatur ab tenetur vel.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(265, 'Consequuntur sit autem praesentium facilis quis rerum dolores ducimus. Quis commodi a vel ut vel quisquam voluptatem. Ut quo quas nostrum voluptatum. Suscipit velit necessitatibus saepe saepe occaecati.', 'Aut molestias sapiente sint vel adipisci cumque harum tempora. Odio ratione laudantium eius ut pariatur odio. At soluta et sed. Optio vel tenetur sint impedit sed.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(266, 'Est quo recusandae quis dolor nulla suscipit. Ut aliquid provident ducimus reiciendis qui optio natus. Suscipit quis doloremque ut. Distinctio quasi voluptatem vel iure qui consequuntur.', 'Nihil voluptas neque officiis fugiat quod. Enim temporibus quam est doloremque enim. Nulla aut rem dolorem aut.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(267, 'Expedita corporis doloremque autem sint praesentium quam quia. Et beatae libero ex animi nostrum itaque quo. Omnis at qui maxime animi assumenda quibusdam. Dolorem culpa qui itaque odit nihil et.', 'Eos qui sunt voluptatem. Recusandae mollitia ut repellat placeat aut. Sunt numquam iusto nemo iure et commodi mollitia.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(268, 'Aut distinctio vitae et accusamus inventore doloremque. Quae quidem ea sint sit pariatur officiis sit consequatur. Debitis qui quo repellendus non officiis dolorem. Voluptas quo libero neque temporibus doloribus autem.', 'Repellendus placeat eum aspernatur. Et eligendi est blanditiis illo earum. Natus ipsam ullam doloribus velit alias placeat saepe eum.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(269, 'Quasi asperiores dolore aut minus. Ab omnis et perspiciatis qui perferendis. Suscipit voluptatem quis voluptas ullam. Ut itaque eum tempora doloribus sunt aut dolorem omnis. Ex consectetur et ullam a distinctio ut illo.', 'Quo minus unde voluptatem. Commodi veniam et velit et laborum. Debitis accusantium perspiciatis odio ipsum non aut. Sit nihil pariatur sit ea dolorem blanditiis quaerat.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(270, 'Culpa nisi dicta expedita laborum laudantium in voluptas. Culpa odit repellat nihil. Illo quibusdam ut quaerat quidem.', 'Blanditiis in maiores suscipit corporis. Architecto et illum officiis consectetur provident hic odio aut. Vel doloribus enim qui delectus. Ipsam est sunt architecto nemo unde.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(271, 'Optio hic nemo cum quia. Distinctio molestias qui error saepe. Aperiam repudiandae quae nam voluptas maxime ad. Aliquid distinctio omnis atque molestiae.', 'Et accusamus ratione eos nemo animi. Quis quia cupiditate molestiae fuga quia. Porro quia nostrum unde quidem ea nesciunt.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(272, 'Nihil nobis doloribus vitae voluptatibus quisquam iusto et mollitia. Perferendis ratione in sit officiis aspernatur nesciunt unde. Cupiditate earum qui est veniam accusamus quia dicta quam. Consequuntur qui illo eligendi saepe.', 'Et eius ea necessitatibus placeat atque. Ut rem maiores et quibusdam. Officiis sunt est dicta voluptatem itaque.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(273, 'Voluptate iste deserunt optio dignissimos maxime quis eius. Et est laudantium architecto non. A perferendis id at alias enim ut. Sed voluptatibus ut magni. Ut temporibus sunt in officiis accusantium. Fugiat ea officia aut autem dolores sint.', 'Temporibus voluptates quidem velit sapiente qui. Eius optio laborum voluptas voluptatem enim. Dolorem et repellendus doloremque quo. Nihil est cupiditate in maxime.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(274, 'Et autem doloremque sequi quasi. Repudiandae omnis dolorem sint et sint sint libero. Nesciunt illum animi iste ullam odit. Est sit ab dolor sapiente vitae.', 'Similique ut ut quia illo. Dolor omnis maiores maxime vitae nemo aut consequatur. Fuga saepe non vero eum quia veniam aut.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(275, 'In ullam aut blanditiis adipisci necessitatibus. Corporis est tempora eos eius ipsam reiciendis ipsa enim. Rerum suscipit sit et omnis et.', 'Sit laboriosam consequatur omnis. Blanditiis perspiciatis qui molestiae facilis. Id qui et aut et itaque. Sed reprehenderit recusandae enim inventore. Laboriosam magni odio eligendi reiciendis.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(276, 'Dicta laborum amet voluptas quidem officia quos et. Delectus debitis unde aut. Aut possimus animi dolor ipsam. Aut quod omnis aliquid hic quis modi ullam.', 'Aut nulla provident iste voluptatem cupiditate veritatis qui. Aut dolorem non placeat eligendi voluptatem. Et veritatis libero aliquam laudantium omnis molestias ea.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(277, 'Modi est in soluta non aut. Maiores eaque eos facilis sint qui qui aut. Qui sit vel atque perferendis nihil. Dolor aut libero mollitia libero exercitationem excepturi officiis dolor.', 'Sed soluta cupiditate eligendi magni et. Minima facere distinctio et eveniet sed sunt. Labore et itaque placeat maxime consectetur similique praesentium non. Est aut est non veniam.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(278, 'Cupiditate consequatur ea et dolore esse. Non praesentium error harum laboriosam. Quaerat saepe mollitia dignissimos delectus impedit nihil et.', 'Et possimus iste inventore et asperiores fuga ut. Modi tempora aut veniam cupiditate est cumque autem. Sunt ut ex odio aliquam distinctio quis. Odio eligendi vel ullam explicabo omnis aperiam quia.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(279, 'Modi labore dolorem et totam tempora occaecati dolores. Eum et nihil consequatur quibusdam. Repellat eos alias reiciendis voluptas voluptas perspiciatis. Officia id commodi maxime iusto veniam eum quia. Quo eaque iusto nihil magnam ea officiis.', 'Ea odio officiis reiciendis rerum ipsum veniam voluptas. Provident aut id ea nisi enim laboriosam harum repellendus. Ipsa inventore minus ratione nostrum et molestiae rerum.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(280, 'Aut doloremque qui qui harum et cum. Itaque cum ullam sapiente voluptatum. Et quaerat voluptatem repellendus non sapiente optio quo. Aut reiciendis fuga quia dolor magni.', 'Et aliquam molestias aut ab quos dolorum ut. Est corrupti quia sit dolores voluptatum autem voluptatem. Est cumque quo rem aut illum cupiditate ad possimus.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(281, 'Et iusto recusandae officia pariatur itaque sed. Illum est possimus et deleniti fugiat fugiat. Similique explicabo similique debitis quis ea corporis.', 'Et molestias aut blanditiis perspiciatis aut. Et debitis eius itaque corporis itaque. Ut quia nisi quidem eum eveniet sit eum eligendi.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(282, 'Expedita et sed hic quaerat hic ullam voluptas. Dolorum est eius possimus explicabo. Magni rerum qui aut est voluptates est ipsum.', 'Harum iusto quod aut beatae velit ratione qui. Enim voluptatem nulla aut similique et.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(283, 'Placeat sit ut sed et eum cupiditate cum. Aut adipisci fugiat fugiat corporis dicta consequatur. Quo quod dolorem consequatur commodi aliquam molestiae. Debitis eligendi voluptatem porro aliquam et.', 'Inventore fugiat fugiat porro rerum. Velit ut et sit quidem assumenda molestiae aut omnis. Accusamus in eligendi et mollitia autem accusamus laborum esse.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(284, 'Et incidunt ut consequatur aut. Culpa aut iure et quisquam minima. Nisi veritatis totam quis laboriosam eius. Eum et soluta nihil ut debitis rerum doloribus et.', 'Consectetur magni voluptas placeat dolores odio labore aspernatur. Illum quo debitis molestias quia rem sit molestiae. Quia rerum accusantium in.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(285, 'Dolor quia dolorem esse dicta ullam accusamus. Qui ut laboriosam dolorum odio. Eos enim quod neque. Consequuntur dignissimos quia aut aut neque maiores.', 'Aut rerum mollitia odio a. Est sint mollitia est. Autem sed quia eum soluta aperiam repudiandae.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(286, 'Quia deserunt vero sunt. Et voluptatum incidunt iure reprehenderit. Ex non est nemo ab. Eveniet et eum dolores ut voluptatem quia provident et. Magni asperiores perspiciatis vero quaerat optio explicabo.', 'Sint iste maiores nam placeat. Et quidem consectetur non quas asperiores id labore atque. Maxime nobis odit eligendi id dolor voluptatem dolores. Eius laboriosam amet tempora mollitia cupiditate.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(287, 'Sed labore debitis illum totam. Sunt nostrum esse sint. Minima in ut distinctio facere odit. Perferendis necessitatibus possimus quis hic iste. Rerum sapiente et et dolores eaque pariatur ipsa.', 'Libero expedita est dolorem sit quia. Aut placeat reprehenderit nam ipsa. Officia rerum dolorem sit.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(288, 'Numquam quam sint cum voluptas qui necessitatibus aut. Aut atque corporis earum ut eos fuga rem. Iste eius ut asperiores deserunt alias odit officiis. Assumenda a esse ullam sint voluptas commodi. Est maxime quo est maiores voluptas.', 'Est et voluptas architecto consequuntur molestias quam aut. Sint dignissimos doloremque non.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(289, 'Id sit quasi alias ut tenetur excepturi. Voluptas repellat laudantium qui blanditiis quia hic. Explicabo aperiam et quo.', 'Corrupti veniam ad non sit autem minus. Ab itaque ipsum odit assumenda quo. Repellendus sequi laborum recusandae consequuntur.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(290, 'Hic est repellat iusto quam ipsam. Accusamus praesentium sit dolores velit sit laborum quo exercitationem. Aut temporibus non vel eos tempora dolorem.', 'Minus esse nostrum quidem non veritatis sint dolore. Ut quis nisi commodi quidem et error. Illum laudantium architecto ab dolor hic quae ullam. Vero quidem iusto inventore qui.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(291, 'Vitae reprehenderit aut inventore possimus iste id velit. Et est totam illo voluptas nisi et. Molestiae ut officiis eligendi vel aut necessitatibus nam.', 'Dolorum minus sapiente quia incidunt quia enim ut magni. Ut non aut autem est. Quaerat rerum at voluptatibus dolorum amet ab. Vel ut enim qui iure.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(292, 'Voluptas illum cumque et et quasi quia nisi ad. Aut eos reiciendis adipisci culpa tenetur nam. Quia deleniti deleniti consectetur.', 'Temporibus vero unde doloribus a. Ab rem corrupti quos vel minima. Quis aperiam voluptatem necessitatibus quia ducimus est eveniet. Maiores voluptatem mollitia enim eveniet autem.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(293, 'Excepturi repudiandae et et possimus et. Molestiae accusantium et aut aspernatur ea. Tenetur a et sunt placeat veniam. Corrupti qui aliquid quia.', 'Qui debitis saepe sequi et. Rerum vero id accusantium quod ut eaque. Deleniti dolor nostrum omnis possimus officiis perspiciatis et. Quisquam tenetur perspiciatis non facere magni voluptatem.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(294, 'Praesentium tempora nihil a aperiam ut libero fugiat. Et porro est praesentium qui iure aut eaque. Dolores possimus nisi ab dolore rerum et facere qui. Neque atque earum quia sequi officia.', 'Facilis quis dolorum voluptas ut. Ex est sed ea ex perspiciatis id et incidunt. Odit ratione modi dolor eum.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(295, 'Dolorem voluptatem voluptatibus vitae repellendus totam. Doloribus nihil tempore eaque qui accusamus est inventore.', 'Distinctio repellendus ratione voluptatibus reprehenderit eos. Soluta et porro quia. Aut voluptatum nihil iusto quasi quo vel. Quo blanditiis voluptatem aut in esse aut.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(296, 'Dolorem aut sapiente consequatur qui exercitationem earum cum commodi. Unde aut id sequi. Adipisci nam libero assumenda. Dolores mollitia autem est ut neque fugiat qui impedit.', 'Labore et consequuntur consequatur autem. Cum dolore nihil est aut reprehenderit. Perspiciatis aut quaerat voluptatibus minima culpa. Culpa omnis mollitia molestias dicta.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(297, 'Ut dolorem vero aut ipsum esse perferendis. Minus et voluptatem enim aliquam. Deleniti provident placeat enim distinctio.', 'Nulla ullam quia illum. Sunt voluptates debitis libero tempora molestias quam est.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(298, 'Eligendi inventore sed est ut ea. Eaque occaecati tempore soluta veritatis in quia voluptatibus. Vitae dolores repellendus libero dolorem reiciendis.', 'Sed ut impedit non labore earum et rerum. Illum labore dolorum dolore tempore enim voluptatem quo. Voluptatem deserunt et perspiciatis distinctio amet.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(299, 'Minima officia excepturi fugiat ea. Laudantium quod enim atque cum. Laborum voluptas dignissimos quos nihil molestias. Ea ullam accusantium praesentium ducimus nihil. Ut explicabo minima voluptas. Tempore provident voluptatem ab expedita.', 'Ut hic porro voluptatem et corporis et modi. Tenetur quidem magnam in est nobis et. Similique eaque eos voluptatem ad.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(300, 'Odio eaque voluptas eius officia odit occaecati. Nemo molestiae labore blanditiis voluptas eaque ipsa. Ab qui ea nostrum voluptas aut qui. Magnam cupiditate officiis reiciendis in vitae. Consequatur cumque quidem cumque accusantium tempore fuga.', 'Quod excepturi qui libero repudiandae ea. Veniam corporis cupiditate ut explicabo.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(301, 'Possimus blanditiis ratione modi inventore et eos natus. Ipsum sit laborum et impedit adipisci modi. Unde labore sunt quae hic ea aut dolor.', 'Impedit quae fugit rerum ex. Totam exercitationem corrupti excepturi ut. Velit officia inventore aut eaque libero odit id.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(302, 'Ut voluptate ullam omnis facilis hic. Nobis voluptatum voluptate cum nisi consequatur. Quisquam qui sint non corporis sit consectetur omnis deleniti. Sed omnis impedit eos et quam laboriosam.', 'Quia delectus ab atque asperiores. A ut libero saepe eos voluptates et quia et. Est totam voluptatibus et error nulla. Non adipisci quos animi ut incidunt maxime assumenda.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(303, 'Nemo minus rem nihil maxime. Vero rerum sapiente nihil dolor. Aut doloribus at hic. Nisi maiores delectus minus culpa error quod.', 'Sit eos esse nesciunt deleniti qui minima natus. Qui et sed pariatur et non sapiente iure. Eaque culpa ex reiciendis aut et quia. Recusandae excepturi dolores similique ut veritatis rerum rerum.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(304, 'Ratione tenetur eligendi non. Voluptatibus et aut aliquid similique et. Nobis consequuntur corrupti corrupti esse.', 'Harum illo deleniti quasi. Ut nulla deserunt ut quis officiis. Quidem perferendis totam eligendi ut nemo. Est accusamus ipsam harum voluptas quo expedita.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(305, 'Omnis ullam alias error qui earum. Dolorem quis maxime dolores accusamus tempore fuga. Eum ullam tempora voluptatum magnam. Quibusdam nostrum nisi accusantium sint odio. Temporibus vitae quod iste perferendis autem est error.', 'Non magnam quia nostrum quia voluptatum. Hic est qui dolores harum vitae aut odio. Nesciunt qui laborum vero magni quia. Deserunt quis dolore magnam et. Ut et consequatur ut.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(306, 'Dignissimos hic illo itaque veniam. Maiores veniam ab delectus voluptas. Dolores provident velit nesciunt nisi. Reiciendis quis non ratione repellendus iusto.', 'Maxime sed nihil eum non ut. Repellendus quia veniam velit ut esse totam ut. Non debitis aut eius voluptatem. Quo voluptas incidunt ea rem rem.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(307, 'Perferendis in et odio odit fugit iste nihil. Explicabo est officia eos consequatur nesciunt est deleniti aut. Assumenda officia impedit iure possimus est occaecati.', 'Necessitatibus ducimus dicta est et provident fugiat facere aut. Dicta sit at eaque hic. Non unde voluptatibus qui sit corrupti quis.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(308, 'Inventore aperiam voluptas et id ut repellendus reprehenderit. Aliquam qui atque dolorem expedita consequatur ut ipsa. Ipsam nemo rerum minus est debitis accusamus. Tenetur dolorem natus tempore possimus. Non nulla maiores et vitae dolores in.', 'Modi fuga adipisci beatae dolorum quis ad. Est vel nihil et quos deleniti. Quo sed nihil incidunt quaerat doloribus.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(309, 'Reprehenderit voluptas voluptas qui ut est velit sunt. Ratione ex qui dolorem delectus nihil dicta nam. Quam fugit omnis at. Sint occaecati non non dolor.', 'Voluptatem animi non unde numquam hic adipisci. Molestias est assumenda vitae modi. Quisquam architecto non aut doloremque ut.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(310, 'Tempora animi dolorum alias distinctio consequatur omnis quis. Earum omnis neque recusandae facere eum voluptatem eligendi. Consectetur facilis porro vel occaecati quia enim tenetur. Accusantium dolorem modi et.', 'Eveniet voluptas optio perspiciatis et. Omnis minima rerum eum repellendus consequuntur. Dicta architecto voluptas fugiat. Laborum eveniet itaque id cupiditate omnis ullam.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(311, 'Culpa dicta et earum. Beatae velit sunt esse necessitatibus excepturi beatae atque. Impedit assumenda ut deserunt.', 'Voluptas nihil sit vero natus porro. Sint repellendus nobis numquam cupiditate nesciunt vel aut. Fuga magni id praesentium ipsum enim.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(312, 'Non tempora nesciunt id reprehenderit quia. Eum quaerat illo iusto reiciendis neque. Distinctio iure iste ut praesentium porro sed eligendi.', 'Sed laboriosam facere sint vel totam modi. Recusandae fugiat ut molestiae blanditiis rem in. Voluptatem mollitia deleniti vel perspiciatis ut quis. Maxime est et mollitia in quia maxime vitae sed.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(313, 'Recusandae reiciendis non fuga ab facere magni et. Cum minus vel placeat reiciendis officia id quia. Aut eos voluptatem qui vero consequatur magnam. Iure pariatur necessitatibus amet est minus saepe et.', 'Quam voluptate et illo temporibus earum voluptatem voluptates. Qui aut ut perspiciatis animi aperiam. Non aut doloremque perspiciatis voluptas porro sint.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(314, 'Non eos nostrum sit voluptas. Dolorem et ut consequatur. Exercitationem suscipit aut sit odio rerum. Sint et dolorum nobis reprehenderit consequatur.', 'Nulla minima dolores tempora dolores. Illo voluptate dignissimos quo impedit dolores. Vero et dolor dicta pariatur rerum. Autem ea perferendis et ut.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(315, 'Iusto ipsam consequuntur inventore. Harum voluptatem dolor ipsam reiciendis veniam porro. Dolorum dolore iusto pariatur commodi quos explicabo qui. Eos sit ea soluta dolorem quia odit libero. Adipisci exercitationem quia at dolore harum quis asperiores.', 'Blanditiis beatae neque ut facilis ut quaerat alias. Molestiae rerum neque expedita ut. Quos dolorum aut culpa. Fuga est molestiae laborum. Corrupti tempore dicta magni in eos consectetur.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(316, 'Eos quas doloribus qui aut et nostrum. Iure dolor sapiente architecto hic ut. Distinctio ratione expedita illum enim animi.', 'Adipisci hic ab aliquam non et non. Rem consequatur vel sit. Voluptas et sint perferendis non qui consequatur ratione. Ut voluptates labore voluptate nihil reprehenderit.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(317, 'Cumque ipsam et sit magnam. Accusantium sequi voluptatem porro aut. Aliquid ipsam qui aliquid rerum velit ipsa qui. Ratione qui quis animi.', 'Incidunt mollitia soluta incidunt voluptas incidunt sit dolor. Autem dolorum ipsum temporibus aut et possimus temporibus. Dolorum sit quam reiciendis atque. Qui sunt architecto libero iusto odio.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(318, 'Dolor praesentium molestiae porro eaque distinctio quisquam nihil qui. Ut ratione corporis molestiae. Aut iusto minus aut porro cupiditate et.', 'Aut laudantium voluptas ut reprehenderit quo. Harum officiis omnis accusantium eos omnis. Fugiat eveniet aut est totam assumenda sapiente ut eos. Fugit dignissimos vel a autem asperiores.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(319, 'Corrupti aliquid quis numquam incidunt molestiae. Incidunt inventore at sit voluptatem. Dolore ut id eligendi et sit.', 'Placeat error aut totam animi. Eos officia et commodi dignissimos distinctio. Inventore dicta in eos rerum consequatur excepturi.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(320, 'Deleniti vitae cumque ut perspiciatis. Adipisci dolor consequatur laborum debitis sint praesentium. Quis eius voluptatum atque ut quam quas perspiciatis.', 'Quasi voluptatem nihil et quas sapiente. Officia qui inventore asperiores. A voluptates exercitationem autem sed. Minus quasi occaecati rerum optio.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(321, 'Aut nemo vel eaque harum vitae. Mollitia maiores molestias ipsum quia aut fugit consequatur. Non quaerat et quia voluptatum.', 'Inventore libero ea eum. Recusandae esse non distinctio. Ipsam facilis id voluptate ut. Sequi excepturi non ratione illo sit corporis.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(322, 'Quia iusto voluptate similique et qui voluptas. Quas quas voluptatem et est deleniti qui expedita. Veniam perspiciatis ullam non. Aut ut aliquam possimus reiciendis sapiente optio quasi est.', 'Officiis quisquam soluta hic nam. Consequuntur dolorem dolores et ut minima quos deleniti. Dolorum ut corrupti molestiae eum non.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(323, 'Dignissimos unde quia rerum voluptatibus vel. Molestiae ipsum ad quasi qui. Aut quis recusandae doloremque et repellendus quam assumenda.', 'Molestiae dolores quis maxime voluptatem. Nam sunt quibusdam aut. Eum vero aliquid doloremque facilis. Laudantium quis blanditiis voluptatem aut.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(324, 'Neque sunt ipsum dolorem reprehenderit laboriosam impedit. Tempore quidem molestias et nam ipsa explicabo. Et suscipit rem iure numquam optio ex.', 'Excepturi omnis quia veritatis ratione ut quo. Dolores ullam harum qui est. Eaque magni et aperiam vero eum quis est omnis. Minus aspernatur earum eum omnis aperiam.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(325, 'Magnam quia doloremque sunt numquam dolor consectetur voluptatem ratione. Non reiciendis rerum repellendus repellendus est omnis. Aut non quidem tenetur amet.', 'Eos qui libero hic ipsum rerum. Ut pariatur minima excepturi exercitationem ab aut.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(326, 'Quas quasi aut error aperiam eum omnis non. Autem debitis doloribus libero voluptatibus. Enim nostrum est illum consequatur qui asperiores. Reiciendis repellendus ad aut voluptatem quis.', 'Sed velit dolorem dolor dolor. Officiis veniam pariatur qui ipsa est ad.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(327, 'Soluta repellat voluptas quia blanditiis. Eos voluptatum voluptas quia et omnis quia illo totam. Consectetur rerum facilis inventore laboriosam quae et. Rerum eius aut et quia fugit sit. Quo sit velit itaque qui qui laboriosam.', 'Mollitia veritatis dolor enim tempore suscipit architecto in. Veniam sit sapiente esse et id.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(328, 'At aspernatur eos assumenda enim quasi voluptas. Eum dolores minus culpa. Ut nihil libero voluptates voluptas quia eos corporis voluptatem.', 'Et sit quo sunt sed dolor est minus dolores. Eveniet quod vitae eius quos aspernatur aliquam tenetur. Non nihil placeat nulla. Illum quis alias sed consequuntur.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(329, 'Ut assumenda eos quia qui deserunt. Ut odit numquam dolorem ipsam omnis. Cumque quos modi sapiente ab officiis temporibus ad. Fugiat et optio cupiditate.', 'Ut voluptatem ut provident distinctio excepturi quaerat qui expedita. Suscipit temporibus ea quos quos. Cumque nobis ut distinctio minima. Rerum aut occaecati consequatur.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(330, 'Et aliquid sit dolores illum omnis nesciunt. Est rerum aut eius sed aperiam labore distinctio facere. Ut saepe iste nobis rem necessitatibus.', 'Voluptas ut aspernatur molestiae est molestiae et mollitia beatae. Beatae velit omnis repellendus natus omnis est omnis. Aliquid distinctio recusandae eius commodi est consequatur.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(331, 'Veniam dicta ut accusamus ipsum assumenda qui quia. Eveniet consequatur tempore consectetur doloribus ullam mollitia occaecati. Cupiditate alias cupiditate veniam nesciunt ipsam ratione ratione. Aliquam voluptas blanditiis rem harum ipsam voluptatibus.', 'Assumenda tenetur necessitatibus quo delectus. Consequatur impedit eveniet dolor soluta cupiditate. At velit sunt voluptatem est. Voluptatum id occaecati enim et.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(332, 'Cumque rerum odio porro cum totam voluptates. Vel optio facere at consequatur officia. Sapiente cupiditate iure veritatis est. Dolor et modi aut.', 'Fugit cupiditate incidunt accusantium iusto ut sint. Quisquam et dolorem et. Perspiciatis quod voluptatem aut et natus ducimus.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(333, 'Modi voluptatem ullam delectus qui dolorem occaecati saepe. Optio ut ipsum quos id quas est. Ducimus quas exercitationem architecto distinctio fuga delectus repudiandae quae.', 'Qui dolorem voluptatibus sit et libero quae ut nostrum. Est temporibus sunt consequatur ab. Voluptates facere ex qui ea.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(334, 'Aliquam aut quos aliquid qui aut nihil aut. Consequatur non cupiditate ipsa culpa. Animi aut et porro eum.', 'Aut explicabo nesciunt inventore. Nulla qui laboriosam eveniet et fugiat soluta corrupti autem. Molestiae distinctio aut eveniet iusto numquam qui ex.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(335, 'Sed esse aliquam a exercitationem sit sed. Tempore dolorem exercitationem delectus quo. Voluptatibus numquam natus quas ut quia rerum. Nulla molestiae debitis ullam quis quis accusantium ut.', 'Pariatur velit consequuntur consequatur et numquam ut ut. Similique quis alias possimus quis voluptates. A qui excepturi odio quidem quam. Autem fugit sequi nulla et.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(336, 'Ut incidunt provident autem fugit in. Cumque omnis consectetur quam reiciendis eos et. In et nesciunt est tempora est consequuntur aut est. Aut vero ea est occaecati voluptatibus minus et.', 'Quod autem aut ipsum. Molestias cumque sint consequatur dolor consequatur.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(337, 'Ut sed soluta ut mollitia similique architecto veritatis reiciendis. Asperiores nesciunt velit ut ut. Illo voluptas consequatur consequuntur explicabo temporibus. Fuga et et qui.', 'Dolorem pariatur aliquam expedita amet eaque laudantium consequuntur et. Necessitatibus ad magnam aut quia.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(338, 'Enim fuga et consectetur aspernatur voluptas. Eos quis quasi et itaque aut. Quaerat nemo modi quia dolorem assumenda. Earum et dolore enim. Explicabo mollitia deleniti id nam. Omnis enim libero a et fugiat atque.', 'Maiores tenetur est voluptates perferendis. Magni suscipit qui error sunt. Facere tempore repellat aut ex at quae.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(339, 'Asperiores nostrum quas provident distinctio et explicabo. Voluptas sed aut ut quia excepturi fugiat. Aut qui eos a quia. Fugiat incidunt eum vel sequi harum. Et aut rerum molestiae culpa. Sunt cupiditate enim quasi eaque quae maxime nesciunt.', 'Sit perferendis et vitae voluptas vero assumenda. Neque repudiandae ab quae perspiciatis minima aut. Deleniti perferendis ex autem repellendus quam qui.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(340, 'Praesentium ut nihil ut voluptas. Sit sunt libero magni tenetur debitis. Maxime dignissimos est consectetur cumque. Magni veritatis sint ut quasi.', 'Mollitia fugiat velit aliquid sunt labore necessitatibus ratione optio. Odio quia in laborum facilis. Id qui quod architecto. Laudantium reprehenderit iste in.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(341, 'Omnis ut dolorum ratione quia magnam ratione. Doloribus architecto reprehenderit sint aut quas cum qui voluptas. Rerum inventore et quia voluptatum quo. Omnis est at similique omnis.', 'Asperiores eveniet et molestias dolores sit et nihil sit. Unde ut aut odio eos. Et voluptatem amet sint quia ipsa.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(342, 'Quasi perferendis doloremque et libero eius odio. Ut omnis mollitia quisquam non eum. Aspernatur ad ea officia ut dicta sequi ducimus.', 'Quo ut qui consequuntur explicabo nisi praesentium qui. Quo omnis itaque temporibus quaerat libero est molestiae quis.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(343, 'Id velit molestiae et id facere et. Minima esse et repellendus sequi. Et odit asperiores velit adipisci enim doloremque. Sit ut necessitatibus hic et incidunt.', 'Ab magni id consequatur iure ipsum. Atque non sed repellat fuga totam sapiente dolores. Voluptates nihil architecto nobis iusto animi provident eum. Deleniti minus nihil culpa unde reprehenderit sit.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(344, 'Necessitatibus enim dignissimos ullam iste. Architecto magni sed facilis ipsam. Et in aut corporis nihil.', 'Harum rerum quis minima porro quo laudantium impedit et. Quia doloribus voluptas non aut at. Voluptatem incidunt dolor veniam enim laudantium ullam. Qui voluptas eius voluptas.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(345, 'Non vitae mollitia voluptatem vero. Et facilis optio voluptatem dolor qui sunt. Animi officiis quo ipsa sunt. Perferendis quia tempore aspernatur et saepe et eveniet. Quae esse ex itaque quo consequatur illo cumque.', 'Cupiditate ratione nisi error autem animi est maiores. Voluptatibus laudantium qui asperiores odit. Inventore non et dolorem quas eum. A nulla recusandae modi sunt.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(346, 'Iusto temporibus in est non sed doloribus reiciendis. Rem ut ipsa earum suscipit atque quis. Fugit ut accusantium neque earum. Aut tempore in pariatur quasi cupiditate velit.', 'Porro necessitatibus aut distinctio repudiandae. Et enim libero hic aperiam eligendi fugiat. Porro aut quidem laboriosam tempora. Maiores incidunt aut soluta voluptatem quia.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(347, 'Quisquam earum repellendus vel nobis et laboriosam commodi. Excepturi quia dolore aut. Qui laborum rerum rerum facere voluptatem.', 'Id nulla architecto rerum illo dolore qui debitis. Qui qui aut pariatur animi. Aspernatur sed reprehenderit aliquid voluptates iusto. Optio dicta omnis eum exercitationem explicabo quasi totam.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(348, 'Illum quis facere accusantium. Voluptatem facilis et dicta provident rerum laudantium est. Qui veritatis accusamus eaque ab cumque. Nulla aut rem quae fuga.', 'Tempore ratione aliquam ut natus laboriosam consequatur iste. Neque ipsa sunt et aliquid doloribus aliquid. Non omnis tempore et rerum quae voluptas.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(349, 'Nulla vitae voluptatibus minus aut eius qui. Aut delectus ex magni quam et rerum recusandae. Quasi enim ut molestiae earum. Aspernatur explicabo est libero.', 'Cum ratione voluptatibus vel. Nobis impedit tempora eligendi nisi molestias. Et sed quos sint nostrum quo laborum libero.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(350, 'Sint quaerat ut rerum qui qui atque incidunt. Natus dolorem labore veniam doloremque facilis modi eaque tempore. Ut qui vero fugit molestiae porro odio.', 'Aut dolorum omnis atque facere amet. Corrupti magni ea quidem similique quaerat minima possimus. Doloribus nisi ducimus non tempore. Aliquam aut quo sapiente ullam.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(351, 'Mollitia aliquam quia omnis sit. Facere fugit doloribus molestiae officia sequi ipsa. Eligendi quaerat quibusdam et et. Voluptatibus minus quia aut quaerat.', 'Aut dolorem quo et eligendi et. Et illo repellendus quia illo quaerat. Vero rerum quos accusamus beatae fugiat repellendus non. Quis eaque ex sint alias.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(352, 'Ex non fugit vero temporibus ut. Ut voluptatibus dolores error asperiores sed sunt exercitationem. Eaque cum recusandae magnam qui dignissimos expedita.', 'Hic in quis vel eum a esse. Commodi aperiam officia molestiae harum alias suscipit. Neque et incidunt laboriosam autem perspiciatis dolor quos.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(353, 'Labore laudantium soluta dolorem sunt voluptas unde natus. Beatae aspernatur dolores incidunt aut laboriosam. Dignissimos atque voluptate culpa consequuntur ullam non. Quia delectus mollitia laborum vero earum.', 'Dolore quasi sint ut odit. Delectus molestiae dolor id omnis quos. Velit rerum corrupti consectetur non doloremque laudantium.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(354, 'Maxime quo iure et culpa velit. Expedita porro ea iure voluptatem. Qui alias nihil et deserunt facere eum ut.', 'Cum quam consequatur sit aliquam. Non assumenda vel rem enim ducimus. Voluptas doloribus similique voluptas et. Deleniti maxime excepturi corporis laboriosam ad ipsam a.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(355, 'Iure repellat facere minus. Fuga magnam praesentium repudiandae qui. Officiis necessitatibus odit et voluptas exercitationem molestiae optio. Nisi quia deleniti laboriosam dolorum voluptates.', 'Vitae quibusdam possimus aut consequatur sit. Animi repudiandae sunt voluptatem sequi recusandae nihil. Hic in libero ut quaerat facere necessitatibus.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(356, 'Et occaecati corporis et quo. Dicta nesciunt excepturi assumenda. Consectetur veniam aut consectetur dolores quod ut nam. Tenetur nemo et fuga et beatae. Dolorem facilis omnis debitis tempora exercitationem.', 'Vel consequatur recusandae cum vel vel. Et dignissimos assumenda sint praesentium culpa et vero. Voluptatibus recusandae est ut odit. Est ea voluptates omnis totam aut.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(357, 'Voluptatem itaque ea nam voluptate in ipsum deleniti. Rerum et sint culpa dolores laborum voluptatem. Ipsam accusantium nihil et asperiores omnis aut hic.', 'Omnis quia et impedit adipisci perspiciatis. Magni numquam sed ullam consequuntur odit explicabo. Harum sit consequatur ut tempore voluptatibus quibusdam quo quisquam.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(358, 'Eos delectus illo laboriosam corporis ut. Aut hic quia voluptate necessitatibus molestiae quis. Neque quia perferendis temporibus dolorum labore voluptatibus.', 'Est quia error ut nesciunt est eos sunt ut. Eum eum quis ipsam facilis. Dolor suscipit totam velit reprehenderit sit voluptatum quod.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(359, 'Minima unde quaerat dolore aut et voluptatem. Iste molestiae magni modi et reprehenderit rerum. Consequatur quia ratione corporis dolor et quae. Inventore atque fugit sint aut.', 'Nisi tempora adipisci odio id consectetur quo totam excepturi. Et excepturi quas possimus quas sit qui. Rerum in necessitatibus repellendus at porro ut voluptas.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(360, 'Culpa totam et nihil facilis. At nihil vel est repellendus temporibus recusandae. Sunt consequuntur modi quod aut.', 'Tenetur voluptatem velit aut quia iste. Magni deleniti voluptatibus in maxime quo. Illum error laborum culpa error nihil.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(361, 'Assumenda et itaque et quasi id et. Quis ipsam aspernatur libero. Ullam dolore voluptas consequuntur. Quos recusandae nobis corrupti qui.', 'Facere sit adipisci nesciunt quibusdam doloribus. Laudantium eaque esse quidem ut ducimus beatae ab atque. Illo vel est enim enim fuga. Nesciunt minima accusantium ipsa corrupti.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(362, 'Sit et dolores maxime ut iure. Voluptatem vitae sit autem et. Aut et perferendis ab sint sint qui ab rem. Vel assumenda voluptas sed non at qui sed. Ea accusantium quam amet molestias eos. Voluptatum ea ratione ut molestiae omnis.', 'Dolorum tempora quisquam dolorem iusto pariatur. Fuga a harum ut laudantium inventore illo. Excepturi cum temporibus porro praesentium veniam minus. Consequatur qui aut neque in voluptatem sit.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(363, 'Maxime ipsam harum velit officia est ab. Hic eos qui autem accusamus voluptatibus. Vel suscipit sunt aperiam sunt.', 'Et qui odit aliquam non odio. Praesentium beatae aut consequatur consequatur vel. Animi ea voluptas sunt aut laudantium.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(364, 'Est est magni consequuntur qui omnis necessitatibus. Quaerat natus impedit rerum error ad recusandae officiis. Repellat qui omnis voluptas aperiam voluptate placeat laudantium. Veniam dolorem praesentium numquam ea perspiciatis maxime et.', 'Animi distinctio mollitia explicabo veniam in exercitationem. Dicta modi omnis optio itaque consectetur. Magni ducimus quo soluta est. Vitae similique blanditiis non nemo autem.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(365, 'Officia veritatis id nemo sapiente placeat ipsum sapiente est. Vel et iure fuga iusto nulla aut omnis. Ea sint sit fugiat doloremque saepe qui minus.', 'Sit qui deleniti illum ex occaecati maiores. Nesciunt occaecati sunt illum qui sed eveniet. Excepturi qui est nisi omnis minus voluptas odit. Iste dignissimos qui et dolorum tenetur.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(366, 'Nostrum dolores dolore dolor deserunt reprehenderit quos veritatis. Doloribus omnis error fugiat eos est atque vel quae. Aliquam iure itaque omnis enim hic qui pariatur.', 'Sed officiis deserunt ducimus deserunt. Dolorem est veritatis excepturi earum doloribus adipisci fugit. Molestiae illo veniam explicabo.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(367, 'Et numquam ea voluptatem omnis. Rerum cupiditate autem numquam modi autem exercitationem aliquam. Occaecati rerum tenetur omnis quo omnis enim hic. A aspernatur vitae et corrupti laudantium consequatur odio.', 'Quaerat architecto voluptatem commodi optio hic facere. Eos aut et in voluptas accusantium officia. Illum quis corrupti autem fugit officia commodi.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(368, 'Repellendus qui ut minima molestias. Quas sunt quia quidem. Omnis sed eos velit error minus eligendi.', 'Occaecati quis dolor molestiae saepe ut. Est ut dolores nobis non voluptas omnis quos sit. Quam inventore expedita reprehenderit facere. Sed quia odio odit aut consectetur.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(369, 'Officiis accusamus voluptatibus distinctio. Vitae omnis vel saepe quam quia. Omnis molestiae est aut qui enim.', 'Rerum temporibus qui dicta praesentium. Non omnis est ut aut ut fugit laborum. Quos a et quis itaque suscipit. Quis illo veniam alias possimus inventore assumenda facilis.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(370, 'Rerum perferendis et non dolorum sit sint. Ex cupiditate quis rerum architecto. Qui expedita sed ad ratione autem. Velit reprehenderit nisi quam inventore.', 'Quo tenetur eum sed cupiditate earum et. Blanditiis excepturi laborum quos asperiores. Veniam quaerat consequuntur officiis aut alias aut sit velit.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(371, 'Quidem tenetur et ea. Voluptatem odio dolor sit rem. Aut sed in eaque sit eum culpa dignissimos. Debitis numquam nostrum dolorem soluta.', 'Quibusdam voluptates dolor consequatur sunt facilis pariatur. Qui repudiandae et reiciendis. Qui numquam minus enim perspiciatis.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(372, 'Asperiores ad asperiores omnis magnam sit. Amet molestias est perferendis quia enim sint. Magnam facilis similique perferendis totam eos non. Nemo aut placeat mollitia quod odit.', 'Quis molestiae voluptates ex ut quasi. Omnis consequatur sit natus et aut nulla consequuntur. Ipsa esse et praesentium in est aliquam.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(373, 'Numquam laborum consequatur asperiores nostrum. Libero est aperiam consequatur repudiandae minus consequatur.', 'Harum dolor vel adipisci fugit quaerat minus. Quo rem sequi laudantium adipisci ea temporibus in. Eveniet cum alias dolore quibusdam in laborum.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(374, 'Beatae maxime et maiores occaecati. Similique eveniet in aut quibusdam delectus tempore. Eum aut sunt voluptatem voluptatem. Consequatur alias ab nobis impedit nostrum labore amet sit. Voluptas voluptas soluta et quam illum maxime asperiores.', 'Consectetur amet molestias repudiandae. Error aspernatur corrupti ipsam eveniet aut velit ipsa. Debitis saepe provident quia aut. Autem sequi commodi dolore nemo facere praesentium beatae.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(375, 'Nobis ut voluptas necessitatibus. Aut cum dolores harum voluptate. Nesciunt hic quas sapiente sequi suscipit ipsam non. Tempora rerum rerum pariatur omnis nulla enim eum enim. Quia molestiae voluptates eum aliquam.', 'Natus atque deleniti perspiciatis eos excepturi et. Sed architecto corporis exercitationem maxime et. Et et incidunt commodi consectetur nihil pariatur atque est.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(376, 'Aut laboriosam aut similique est porro sed dicta. A saepe ut fugiat repudiandae aliquid sit. Iure quia blanditiis quisquam culpa.', 'Incidunt fuga cupiditate ea et et. Doloribus ut maiores unde vero voluptatum.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(377, 'Eius dolore repellendus distinctio qui. Deserunt qui ut doloribus sunt enim eum.', 'Ducimus voluptatum qui est non quia possimus. Praesentium culpa non velit nulla.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(378, 'Autem porro consectetur assumenda non velit. Earum quae distinctio soluta aliquid. Corporis et dolor dolor suscipit nulla in et error. Dolor eum ex voluptatum eius delectus reiciendis.', 'Quis dolores eos et totam sint. Dolores exercitationem saepe facilis nihil tenetur. Autem perferendis quo expedita omnis ut.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(379, 'Sed fuga animi dolores. Distinctio optio ut perferendis voluptas quod optio. Autem voluptas non voluptates voluptas quia. Quia adipisci non impedit error explicabo. Neque eaque quia possimus molestiae non. Repudiandae voluptas molestias quae et.', 'Magni et consequatur molestiae dicta hic. Excepturi laudantium voluptatibus corrupti laudantium. Aut est quia fugit reiciendis in blanditiis suscipit.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(380, 'Aspernatur occaecati asperiores qui aut dolorem perferendis inventore. Sapiente est enim quas expedita eos est neque est. Sapiente suscipit fugit sed magni quam necessitatibus.', 'Ullam consequatur assumenda quod nobis ea. Exercitationem deleniti placeat repudiandae sapiente. Eveniet nisi et sunt porro.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(381, 'Adipisci ipsum dolor eius velit. At aut facere sunt odio. Praesentium totam non et et eos cupiditate aliquam. Dolores tempora sunt fuga assumenda.', 'Omnis doloribus fuga delectus neque aut voluptatibus. Quia non eum laboriosam possimus quas et.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(382, 'Cumque soluta illum minima animi consequatur ut et. Ab non facere sit culpa molestias maxime. Vel iure delectus dolorem sunt. Facere laudantium nulla rem aut ratione.', 'Numquam unde corporis saepe. Qui odio sit quidem perspiciatis non ut possimus eos. Voluptatem reprehenderit harum sit vel ipsa.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(383, 'Est eum dolor blanditiis. Ut a dolor animi autem omnis occaecati non. Voluptas ducimus maxime natus nulla nulla rem. Ipsa ut nobis id quaerat sapiente ut quasi nesciunt. Eum beatae quidem eos qui et eum.', 'Mollitia dolorem quasi aspernatur quia adipisci ea est. Et omnis laborum blanditiis est similique ab.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(384, 'Sed magni molestiae vel odio dicta eveniet. Consequatur a amet eligendi voluptatum consectetur autem magnam. Est ut voluptates eligendi a repellat autem nobis. Sit earum aut aspernatur asperiores autem rerum.', 'Autem tempora doloremque quia et. Ex est quibusdam quis hic consequuntur et nulla. Et rerum eos error voluptatem tempora architecto magni. Aut fugit esse ea molestiae suscipit velit eligendi.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(385, 'Labore nihil nobis sint quae rerum magni. Cumque neque itaque quia id dolorum. Assumenda provident itaque qui in nesciunt quos repellendus. Quidem blanditiis voluptatem cum fugiat unde maxime.', 'Quasi et qui non. Facere voluptatem ut quia laborum ipsum aliquam sunt. Eaque nisi earum est odit animi veritatis recusandae molestiae.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(386, 'Nesciunt aut ut autem minima doloribus molestiae. Ut et quia sint non. Et qui ea blanditiis incidunt. Expedita consequatur blanditiis dolorem id asperiores. Et non nemo et quia non eveniet. Sit ad sed aut cupiditate facere enim.', 'Quis itaque molestiae tenetur reiciendis excepturi est sint voluptas. Rem sint reprehenderit occaecati ea. Saepe doloribus aut sequi porro. Quia aut vel ut alias ratione libero.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(387, 'Dolores minus hic ex autem nam culpa. Veritatis quae voluptatem ut dolorem nobis quia voluptas. Nihil velit ut perferendis pariatur nemo velit sit. Rerum eos nemo odit voluptates quis vel aliquid. Aut magnam aut commodi.', 'Et aut totam corrupti sed sint. At at nobis veniam delectus dolores incidunt. Possimus error dolorem voluptas voluptate.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(388, 'Molestias sint alias harum commodi perferendis. Eum ipsam aut praesentium iure ratione et eius. Qui soluta voluptas non corporis nisi aut. Eius a iure omnis velit quo aut tempore.', 'Velit eveniet quidem ipsam quo atque voluptas atque. Necessitatibus est rerum aspernatur et ullam explicabo incidunt. Itaque aut doloremque cumque impedit. Quam sit expedita delectus.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(389, 'Rerum voluptas qui itaque ut. Provident earum omnis eaque excepturi non non. Odit atque doloremque laudantium odio quia consequatur aut. Delectus dolorem dolor cum dolorem iure inventore. Atque voluptatum voluptas autem sit inventore.', 'Placeat doloribus qui ut magnam. Cumque rerum eaque qui. Voluptatem qui quae reiciendis.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(390, 'Ratione enim unde a sint quibusdam sunt eaque. Et sit id quo dolore tempora animi. Voluptas qui dolorem tenetur voluptas sit vel dolore. Voluptates ut ut blanditiis itaque.', 'Voluptatem non possimus cupiditate ducimus expedita dignissimos quidem. Corrupti odio et id asperiores et. Suscipit officia temporibus ut. Soluta quo cumque qui. Aut qui ipsum quo.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(391, 'Velit ut optio et et accusantium. A accusantium omnis temporibus non perspiciatis. Rem eos quis quo quibusdam. Ipsum quidem dolores quia autem inventore culpa.', 'Voluptatibus accusantium dolor exercitationem et quia. Fugiat voluptas aut natus quibusdam. A cupiditate accusantium amet hic.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(392, 'Rerum qui distinctio eligendi dolorum dolores soluta. Unde provident laborum nemo omnis. Et consequatur sed totam sunt rem magni quae.', 'Et minima omnis et tenetur placeat. Aut perspiciatis enim ut aliquid possimus porro. Vel suscipit iste quia animi. Velit repellat consequatur earum.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(393, 'Ea quis labore voluptatem beatae saepe harum sit. Architecto voluptatem alias deserunt. Voluptatem est voluptatem rerum voluptas iure libero. Iste asperiores nesciunt tenetur itaque mollitia.', 'Animi magni id officiis. Impedit non nulla sed quis. Commodi expedita ut sed adipisci assumenda quis.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(394, 'Exercitationem veniam in et quia. Omnis aut quia impedit fugiat est enim. Sit quos dolorum magni error quas. Dolores non aperiam doloremque sit sapiente quia.', 'Nobis perspiciatis qui repudiandae unde. Ad qui in et distinctio laborum vitae tenetur. Sapiente sit perspiciatis quo porro earum.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(395, 'Aut similique eligendi est id nesciunt facere illo. Atque rem sed molestiae. Cumque beatae explicabo eveniet nihil delectus. Reprehenderit mollitia mollitia quia est itaque amet sint.', 'Vitae iusto quibusdam facere dolor quaerat. Voluptas nostrum aspernatur vero dolores magni saepe cum. Et quam quis qui qui. Voluptatem eum incidunt unde.', '2021-11-20 14:47:53', '2021-11-20 14:47:53');
INSERT INTO `modeles_devis` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(396, 'Numquam consequatur quod nemo omnis illo et consectetur. Maxime ut recusandae maiores dignissimos assumenda aut. Ea vitae enim laboriosam quod in.', 'Rerum velit natus dignissimos ut. Perspiciatis sed nihil enim dolor. Ut cupiditate est corrupti quia aut commodi. Aperiam nisi debitis sit eum repellendus sint odio.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(397, 'Assumenda qui provident omnis nostrum rerum accusamus culpa. Nostrum tempora magni minima harum et corporis sit architecto. Dolor dolorem nostrum sit quos architecto. Rerum voluptas vero aut qui aut odit.', 'Sint quos voluptatem tempora sint porro ut. Voluptas non in nam facere et ipsa laboriosam. Eius beatae molestias id soluta quos asperiores dignissimos.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(398, 'Recusandae minus necessitatibus quasi voluptates dolorum aut eos. Vitae fugiat blanditiis sit. Ad assumenda recusandae vel illo commodi dolor.', 'Omnis tempore et explicabo vitae autem nam possimus. Fugit necessitatibus fuga qui ut aut. Deleniti assumenda neque distinctio vitae dolorem.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(399, 'Ut animi quisquam enim quam sapiente sunt deserunt sit. Id reiciendis repudiandae molestiae libero in porro et cum. Sunt ut non soluta voluptates at ipsam. Assumenda quibusdam asperiores qui.', 'Eius et sed deserunt iste qui. Non hic est delectus vel et doloremque autem. Aliquam molestiae laboriosam id voluptatem aspernatur quos perspiciatis.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(400, 'Quia at rerum qui aut sit. Modi dolores numquam vel rerum voluptate facilis placeat. Quas quaerat vel vel ducimus. Ullam iusto reprehenderit optio voluptates consequatur. Unde voluptas harum doloribus velit amet ducimus. In cum asperiores qui iusto.', 'Reiciendis praesentium earum beatae. Consectetur doloremque vero nesciunt iste fugiat doloribus. Distinctio reiciendis non nesciunt tempora aut.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(401, 'Quod explicabo sed reiciendis cupiditate molestias. Nemo qui non omnis ipsa sed architecto. Error quibusdam qui rerum adipisci consequatur. Laborum consequuntur corporis reprehenderit expedita ut ullam.', 'Omnis reiciendis rerum sed voluptatem autem non culpa. Tenetur vel voluptas aut molestiae est facere id voluptatem. Qui dolor aut ad. Et voluptatem neque distinctio quia unde repellat vero.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(402, 'Et aliquam quo molestiae qui eos. Praesentium soluta et suscipit et officiis harum molestias. Omnis a distinctio vel nostrum nulla enim dignissimos. Vel illo in nemo odit laboriosam voluptate. Voluptatem atque sit quae. Eius rerum odio officiis aut.', 'Doloremque dolore vero sed consequatur delectus. Numquam neque commodi vero occaecati voluptatem soluta omnis.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(403, 'Atque iste quo excepturi reprehenderit aut. Dignissimos dolore nobis aut et quo. Dolore sit vitae fuga autem voluptate. Fugit nam dolorum quo sunt.', 'Omnis alias dolores ducimus inventore. Reiciendis voluptas sapiente soluta. Facere aspernatur eius libero eligendi quod sunt harum. Dolore quo omnis officiis necessitatibus sit aut commodi.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(404, 'Alias reiciendis ipsam molestiae possimus laudantium ullam voluptates cum. Eveniet quaerat ad totam sed dignissimos aut incidunt dolorem. Illum laboriosam aliquid soluta corrupti doloribus.', 'Quidem laudantium asperiores unde nulla et non sunt ut. Quas amet assumenda non cumque aut temporibus. Debitis rem eum est qui eos modi non. Nihil eum voluptatem ratione tempore.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(405, 'Iure et consequatur incidunt quia. Iste accusantium nam dignissimos ut laboriosam tempore nobis. Vel est omnis voluptatum et cumque expedita molestias id. Saepe illo ut qui reiciendis libero repellat.', 'Ratione sed non qui. Asperiores et porro accusantium. Quia veritatis suscipit deserunt similique.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(406, 'Officiis nostrum nostrum quos cum molestiae facere aut. Sint rem accusamus saepe et voluptas placeat eligendi assumenda. Voluptates harum voluptatem autem nihil non quia. Molestias quia aliquam et aperiam veritatis saepe.', 'Voluptatem et rerum qui consequatur quam dolore natus sequi. Qui aliquam id occaecati pariatur tenetur. Debitis at et voluptas architecto facilis minima.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(407, 'Nulla voluptatibus dolor minus porro et quam non. Repudiandae corporis libero repellendus nihil et recusandae illo minus. Sunt alias perferendis veritatis quia. Non eos non enim expedita eos.', 'Labore qui qui velit exercitationem non molestiae quaerat. Est labore aliquam modi est omnis qui eius. Maiores atque doloribus ab numquam. Molestiae unde illo consequatur aut.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(408, 'Similique expedita animi asperiores aut iure veritatis vitae. Id voluptas cupiditate in harum recusandae ea quisquam. Veniam culpa atque quam delectus. Perferendis incidunt in quibusdam omnis.', 'Pariatur voluptatibus sint eos ut ut ex aspernatur exercitationem. Aliquam quos nostrum exercitationem repellat sed nihil labore. Expedita voluptatem sunt ut dolor occaecati sint commodi.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(409, 'Harum amet porro fugit ut. Quia beatae et in nulla in qui. Dolorum iure vel ut. Possimus soluta illo odio modi non. Et ex commodi ullam et magni. Quae veniam quia similique.', 'Ab dolore molestias tempora nulla suscipit. Quibusdam in est deserunt inventore debitis dolor ut. Officia ut nihil cumque quas maiores autem aut quas. Mollitia qui dolorem nesciunt.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(410, 'Accusantium quis vitae aut esse eveniet sed. Neque consequatur labore ut voluptatem. Adipisci molestiae non dolorem iusto minus aut placeat.', 'Voluptas molestiae a voluptatem qui. Totam ipsum voluptatibus magnam. Corporis et nulla ab laboriosam autem.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(411, 'Quia quaerat voluptatibus asperiores optio velit iste. Praesentium non et illo pariatur fugit. Sed laboriosam quia vero. Ut mollitia odit omnis quaerat non debitis ut.', 'Sapiente itaque quasi esse minima reiciendis in commodi. In earum molestiae beatae illo ducimus delectus blanditiis. Eos doloribus qui quisquam consequatur.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(412, 'At ab illum quasi suscipit. Soluta incidunt est aut perferendis inventore iusto. Deserunt officia eius consequatur et consequatur. Maxime impedit non voluptatibus sequi odio autem cupiditate. Ullam enim enim itaque.', 'Non ducimus sint eveniet at nam qui sunt. Nulla excepturi velit iste aperiam quia praesentium expedita nulla. Voluptas quo numquam eos molestiae nesciunt repellat totam iste.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(413, 'Aut vero eos maxime autem facere explicabo facilis. Autem libero facere vel vero. Atque officia repellat nobis nulla sint. At temporibus qui id est porro.', 'Quis delectus qui nihil recusandae. Soluta provident qui adipisci vero quia voluptas tempore. Sequi sed qui nam qui aut quo.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(414, 'Repellendus dolor corrupti enim vel nihil. Non repudiandae ut autem laborum voluptas amet sed. Voluptatibus earum corrupti porro ipsa consequatur est ut. Eos in voluptatem molestiae et ea. Inventore architecto omnis aut.', 'Dolorum quo et nobis et dolores nihil. Adipisci delectus dicta minus aut est.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(415, 'Qui dolor tempora ut ipsum ducimus et facilis. Rerum est eaque atque illo. Harum provident qui temporibus est in exercitationem.', 'Ut quisquam nam amet eum nemo voluptatum autem. Aperiam perspiciatis sint veniam neque qui. Voluptatibus est ea repellendus autem autem.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(416, 'Assumenda inventore eius odit pariatur voluptatem. Cumque explicabo consequatur nobis sed aut architecto unde. Mollitia beatae eveniet alias qui dolores totam et.', 'Omnis rerum nobis et. Est officia exercitationem quod necessitatibus. Quae animi explicabo quia dignissimos rerum molestiae tempore.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(417, 'Assumenda enim vel autem et qui autem expedita. Repudiandae exercitationem aperiam quos est occaecati nam. Aut blanditiis voluptate sunt ad perspiciatis earum ipsa. Minus qui distinctio eos eum.', 'Voluptas dolor ut saepe quae repellat. Et quia animi aliquid voluptatibus ab. Similique magnam aliquam sit quos.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(418, 'Exercitationem maiores atque vel laborum. Dolor consequatur eum sunt fugiat laboriosam dolores voluptas. Corporis et recusandae dicta.', 'Saepe repudiandae eius dolores voluptas laborum. Pariatur soluta iure et aut velit alias. Eaque voluptatibus consequatur dolore eum quo.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(419, 'Iste tempora nisi et iste consequatur nobis fuga possimus. Neque vitae qui deserunt laboriosam voluptatem.', 'Aut eveniet autem qui et quia eveniet nihil. Cum distinctio reiciendis distinctio qui molestiae repellendus minima cumque. Voluptatem aperiam odit sit et est amet eum a.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(420, 'Aut rem veritatis nihil omnis. Necessitatibus perspiciatis occaecati quam quia qui consequatur ipsum quia. Et consequatur dolor voluptates qui dignissimos. Nam debitis non est debitis aliquam magni nostrum.', 'Unde quis et ipsum id modi ut accusantium. Est quo veniam dolorum rerum. Eveniet nemo quis cum et.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(421, 'Voluptate vitae est commodi debitis corporis provident. Optio quibusdam et repellendus id. Provident fuga a rem sit. Aut est sunt eos.', 'Dicta ab quia deserunt laborum. Non ad pariatur error tenetur reprehenderit veniam eveniet. Corrupti blanditiis et saepe molestiae. Aut ipsum culpa commodi aut.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(422, 'Maxime modi nihil eveniet quaerat aliquid ut. Vel rerum est beatae. Amet odio labore autem qui vel sed.', 'Rerum dolor molestias at placeat qui. Debitis et molestiae iure placeat voluptas. Quia ut harum suscipit. Nihil deserunt laborum ducimus dolorem enim accusantium.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(423, 'Voluptatibus quod officiis placeat ipsum. Fuga aut expedita dicta mollitia sunt iure. Veritatis ab modi officiis debitis praesentium et impedit. Fugiat eveniet velit aut voluptatem ratione rerum distinctio.', 'Velit quaerat error autem nobis. Velit quae excepturi saepe laborum quia ut autem. Facere impedit nemo voluptatem eum maxime. Nihil dolor fuga similique maiores voluptatibus.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(424, 'Saepe dolorem aperiam repellendus maiores. Provident excepturi possimus saepe et omnis aperiam. Et voluptas odio est. Deleniti beatae sequi ea autem. Dolores nihil aut aut et sunt. Ipsam quaerat odit alias aut et eveniet distinctio et.', 'Dolorum cupiditate esse exercitationem corrupti quis est ratione. Vel est repellendus in. Enim eos consequatur nostrum explicabo. Eum minus ea cupiditate. Et id et modi.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(425, 'Quos qui saepe ad voluptatum culpa culpa. Earum sit et quia sunt omnis ad qui. Voluptate dolorem architecto eaque et ad a.', 'Maiores porro corporis eum et. Veritatis repellat qui natus pariatur. Doloremque praesentium doloremque exercitationem. Sint ea odio aut excepturi sunt.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(426, 'Dignissimos quibusdam mollitia laboriosam laborum ut voluptas impedit vero. Omnis aut at aliquid saepe asperiores quam repudiandae. Labore incidunt vitae occaecati illo. Est ducimus quos suscipit ut sit.', 'Esse sit ducimus possimus. Cumque consequatur ea dolores. Atque eum aliquam sed architecto provident cumque nam.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(427, 'Autem sint laboriosam molestiae quod possimus. Ab autem id aut consequuntur autem expedita. Distinctio nobis est illum animi nemo et. Quod autem voluptas fugiat voluptas dolor nihil sit.', 'Dignissimos perferendis maiores quidem. Ad totam et voluptas cupiditate mollitia et ut consequatur. Est fuga recusandae ipsum deleniti omnis. Sed voluptas unde at et.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(428, 'Odit fugit ipsam qui voluptatem dignissimos. Non perspiciatis repellat perspiciatis quasi tempora esse. Vitae qui possimus eum quod enim. Esse non et magni rem sit mollitia est et.', 'Consequatur maxime quis et eos ut. Tempora nam suscipit et eius minima. Quaerat id tempora repellat repellat exercitationem.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(429, 'Voluptatem quis est dolorem ullam. Vitae qui debitis sapiente aperiam aut. Eius et numquam voluptas est asperiores temporibus fugit animi. Velit qui esse placeat deserunt unde. Magnam quos quae corrupti minima.', 'Officia ducimus et mollitia qui ut nemo incidunt perspiciatis. Autem in quam suscipit. Minus repellat sunt autem laudantium. At corrupti praesentium corrupti et. Est at aliquid nulla eum.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(430, 'Voluptatem pariatur aspernatur dolorum sequi. Nam ratione consequatur et voluptate expedita recusandae. Perspiciatis id vel velit et. Dignissimos nisi iure voluptatibus.', 'Voluptas tempore ut et. Recusandae doloremque aut minus voluptatibus optio. Voluptatem est officia tenetur corporis.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(431, 'In sint aut ut blanditiis eius sapiente omnis. Nesciunt aut ipsum autem iusto. Dolor veritatis consequuntur at ducimus animi maiores. Quae unde sed a minima et vel. Vel praesentium occaecati vel et. Totam voluptas nulla et voluptatibus est.', 'Eos vel nesciunt exercitationem magni. Dolorem nisi optio aut quis rerum. Laudantium mollitia non consequatur illo voluptatem corporis qui. Sed ipsam qui voluptatem eum error culpa.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(432, 'Cum omnis perspiciatis ut repellendus ab voluptate. Est repudiandae earum aut omnis. Voluptatem eum ullam est consequatur voluptas.', 'Omnis debitis quidem esse magni ea ex praesentium. Ut harum necessitatibus est aut enim eum. Dolor vel voluptas nulla esse corporis. Id voluptas ipsam cum consectetur.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(433, 'Suscipit omnis eum rem. Facere vel rerum incidunt corporis. Et ex et voluptatibus ea ea maxime. Assumenda odio suscipit aut voluptate neque. Adipisci vel consequuntur a quo vero ea. Aperiam recusandae est placeat ad accusantium nobis alias incidunt.', 'Ex unde vel tempore amet sit ad et. Maiores sit unde accusamus veniam dolores aut. Quae dolores tenetur consequatur illum.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(434, 'Amet aperiam eum facilis tenetur. Enim laborum sit sequi in qui sit et. In incidunt laborum eveniet voluptatum voluptatem. Vel reprehenderit consequatur error similique laborum consequatur.', 'Tempore enim cum repellendus fuga dignissimos est amet. Repellendus dolorem neque et sed eos. Dolorum ut mollitia quos facere.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(435, 'Sit libero consequatur aperiam vero. Esse veritatis rem consequuntur doloremque. Necessitatibus quibusdam eaque ut eum eos qui sit.', 'Facilis omnis ut dolores tempore. Doloremque iure dolore dignissimos vitae. Repellat delectus est et. Unde aut voluptatem vitae eligendi amet rerum. Voluptatem maiores ut dolore nemo tenetur.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(436, 'Voluptatem ipsa veritatis officia officiis. Facilis praesentium maxime quo. Voluptas similique tempore quas minima omnis unde perferendis. Quia officia est quia ratione natus consectetur fugiat. Sequi rerum eum odit nulla.', 'Et ut ad mollitia ipsam est quia. Ex iste quidem dolore deserunt est modi vitae. Assumenda voluptatem quas est odio est. Aliquam vitae eos error temporibus. Aut voluptatem voluptas animi quia non.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(437, 'Vel autem veritatis dignissimos omnis. Reiciendis nostrum molestiae ut nihil a. Fuga voluptas sequi itaque est quis commodi. Aut et occaecati non est eos dolor.', 'Qui culpa debitis in suscipit. Aut eveniet placeat ipsa omnis voluptatibus voluptatem sunt ab. Quas dolore saepe sed qui.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(438, 'Cupiditate optio debitis quae ut odit. Et quod accusamus eligendi autem laborum est molestias. Dolores incidunt aspernatur sed asperiores voluptatem saepe facilis.', 'Ut nostrum veniam quisquam quia. Ullam vitae impedit est qui deleniti. Et et voluptatem natus autem velit. Officia pariatur id commodi quia aliquid est accusamus.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(439, 'Harum non id inventore aliquid dolor. Occaecati iusto sed mollitia praesentium. Nihil dolor eum id eum in. Beatae et ullam et. Quis soluta est eligendi quis ipsum nobis. Ut ut velit ipsam occaecati illo.', 'Reprehenderit quas commodi omnis pariatur rerum. Quaerat quaerat eos dolores soluta hic quibusdam. Enim quam modi quia laudantium sit facere voluptatem. Aliquid et eum asperiores officiis sed ut.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(440, 'Ducimus similique amet aliquam nulla nam. Voluptatem architecto aperiam ea necessitatibus. Officiis beatae natus perferendis magni vero non. Architecto velit eveniet eum.', 'Odit illo ab ullam numquam eligendi. Nemo sit quia libero et nihil natus repudiandae. Sed aliquid odit temporibus a laborum et quas labore. Hic sit eligendi et in dolores excepturi.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(441, 'Consequatur sunt ut modi placeat amet. Iusto quidem sapiente praesentium et officiis cumque omnis. Excepturi odio est nam eaque. Doloremque enim quis vel eos aut ut.', 'Qui nesciunt magni doloribus voluptas quis. Officiis earum ullam eligendi ut. A reiciendis in et quisquam rerum. Praesentium non tenetur assumenda ea harum voluptates.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(442, 'Ab numquam autem et a. Sint nisi ullam ipsa est quisquam et velit. Et et maiores voluptate est odio omnis.', 'Minus ratione voluptas minus excepturi illum tempore. Hic non sit iure. Aut est eaque voluptatum perspiciatis. Ut rerum omnis occaecati dolores rem.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(443, 'Aut ad inventore veniam voluptates beatae et quasi. Et officia delectus iste. Inventore ea est qui maiores. Dolores eum et hic laborum nobis. Vel qui nihil at sint rerum nobis et. Porro nisi quis voluptas.', 'Nostrum consequatur sed suscipit rerum quae saepe aspernatur accusamus. Et aut fugit iusto eum cumque commodi. Sed aut consequatur dignissimos tempora vitae.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(444, 'Sed repellendus ea minima omnis et sed. Nam praesentium alias repudiandae aperiam molestias. Labore labore voluptatibus id enim aut sit illo. Enim cupiditate ut voluptatem aliquid. Amet incidunt similique neque provident commodi sint.', 'Ut sint qui corrupti neque quos delectus corrupti. Molestiae quam vel et harum alias vitae. Id quibusdam temporibus enim doloribus. Molestias unde recusandae sit aut.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(445, 'Sed eos ex provident quis facilis et voluptates. Dolor qui reiciendis dolores sit suscipit. Exercitationem ut quia voluptatibus dolores ratione vitae.', 'Blanditiis velit numquam odio. Odit eum dolor ipsum deleniti doloremque velit velit. Soluta magnam est repellat pariatur neque qui iusto.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(446, 'Eaque quas qui sed occaecati rerum minima neque. Possimus ex praesentium fuga est consequatur at. Earum vel expedita voluptas iste voluptas.', 'Rem sunt et et qui. Tempora ut culpa ut eos. Odit eos nihil quidem voluptatibus nemo itaque nobis. Dolorem aut qui quod dolor qui iure.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(447, 'Dolorum dolor iure odit. Corrupti illo fugiat vitae voluptatem minima culpa in. Ipsam alias culpa qui. Sequi omnis et ut in atque. Enim qui dolores cum.', 'Laborum veritatis incidunt rerum debitis quibusdam. Corporis itaque minus in cum exercitationem delectus.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(448, 'Voluptatem excepturi optio dolor unde doloribus enim. Voluptates unde explicabo aperiam et. Aspernatur reiciendis non nemo consequuntur qui non blanditiis voluptatem. Laudantium nesciunt praesentium reiciendis aut et nihil corporis libero.', 'Vel recusandae vel iste non. Vel voluptatem omnis quos necessitatibus tenetur saepe. Sed quis magni at quisquam eos recusandae aliquam. Quam ut et velit quae aut veniam at.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(449, 'Deleniti ex quae doloribus culpa veritatis illum eum possimus. Sed officiis laboriosam vel dolores.', 'Ut esse odit quis quod numquam quidem rem. Eaque quo iusto non voluptatem ut voluptas totam. Cum veniam rerum quam nam quaerat est libero nihil. Facilis doloremque dolores ad quis enim nostrum.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(450, 'Nihil molestias soluta qui est voluptates eos molestiae quos. Voluptatum perspiciatis dolor ipsam. Tempore id placeat eaque tempore. Qui eum perspiciatis laboriosam qui.', 'Saepe sed officiis hic molestiae vero. Ea pariatur illum sunt hic. Asperiores exercitationem et rem reiciendis nobis vel architecto. Nihil dolores doloribus delectus enim.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(451, 'Itaque sit aut nostrum fugit molestias atque. Nostrum velit sed blanditiis non. Provident eligendi consectetur unde accusamus. Aliquam fuga possimus ipsam iusto non. Est et corporis quisquam consequatur beatae.', 'Odio voluptate et non dolorem. Quia numquam vitae error est sint ut qui. Quae tenetur aliquid voluptas vel.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(452, 'Animi consectetur quam nam animi. Dolorem velit animi ipsa repellendus sint. Unde fugiat excepturi corrupti corrupti molestiae reiciendis. Facilis esse fuga laudantium modi amet est.', 'Nihil omnis sed occaecati dolorum consequatur. Cumque ut nihil et natus expedita libero maxime odio. Ea delectus vel a officiis rerum.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(453, 'Consequatur rem ipsam nobis quis quo sunt. Et rem porro maiores et. Ipsam voluptas aperiam cupiditate alias. Veritatis fugit voluptatem provident nulla ab omnis autem.', 'Sint quo corporis praesentium nemo similique ab cupiditate. Ut esse magnam sed dolor culpa excepturi eius quibusdam. Non distinctio id sed dolor sequi aut et eius.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(454, 'Quia sed sunt consequatur magnam non. Quasi quia quam qui quia. Optio laudantium in ab consectetur nemo.', 'Minima sequi consectetur nisi. Dolores et quae et rem. Quia totam excepturi id. Dolorem eos culpa nam alias voluptatem ex. Esse eos tenetur beatae tempore. Qui illo consequatur quas.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(455, 'Et occaecati qui facilis voluptates in et quibusdam eos. Voluptas odit animi atque dignissimos repudiandae consequatur amet. Doloremque illo blanditiis maxime ut ipsum officiis.', 'Accusamus sunt ipsa asperiores provident deserunt nam. Culpa repellat sit explicabo velit. Consequatur ut culpa aliquam ex odit autem aut. Incidunt eligendi velit ad soluta incidunt pariatur qui.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(456, 'Eaque non corrupti culpa perferendis quis cupiditate at. Alias et velit porro. Ratione rem quas consequatur molestias.', 'Doloremque voluptate rerum incidunt neque. Fugiat vel ullam eligendi distinctio. Odit consequatur neque quasi est voluptas quibusdam deserunt.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(457, 'Hic eius architecto aspernatur omnis. Doloremque sed adipisci id dolores sit. Sunt qui illum neque aut ex et quas. Sunt quo placeat ut consequatur est possimus animi.', 'Sunt ad minima fugit. Iste adipisci sunt quo provident modi harum aperiam. Vel et delectus animi nisi impedit accusamus quam.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(458, 'Molestias veritatis facere dolore qui optio quo. Voluptatum repellat voluptate cumque culpa nemo aut eos. Nesciunt earum repellendus beatae culpa minus facere magni est.', 'Eveniet earum eum occaecati dolorum. Ipsam animi repudiandae incidunt sunt quidem qui qui. Et aut fugit dolorem repudiandae sit. Amet et nulla amet omnis doloremque dolores suscipit.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(459, 'Ut fugit laudantium eligendi. Exercitationem amet eius quaerat nihil. Autem ex laudantium cumque rerum delectus itaque eveniet.', 'Sit consequatur eos recusandae fuga praesentium. Nam nobis id eius. Voluptate odit recusandae corporis sit qui ea voluptatum. Beatae quis porro quia error sapiente nemo.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(460, 'Quia sequi aut velit natus. A doloribus sint eum occaecati deleniti voluptatem eaque laborum. Repellendus fugiat non iure voluptatem architecto eius reiciendis. Odit maiores explicabo expedita.', 'Expedita necessitatibus ullam voluptas optio. Aut totam a quidem error rerum reprehenderit placeat. Est a optio alias consectetur sint.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(461, 'Dolor officia laborum earum omnis at qui quae illum. Ipsam itaque aut est eaque quia accusantium. Quasi repellendus fuga id sit quis qui enim. Possimus et est omnis.', 'Aut assumenda non quidem dignissimos atque soluta. Rerum dolores non voluptatem expedita dignissimos qui et qui. Beatae qui ut totam nisi nostrum distinctio fugit. Ex quaerat asperiores neque.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(462, 'Hic tempora possimus sapiente quos voluptatem iusto et eum. Provident iure vero aut optio voluptatem. Temporibus reiciendis reiciendis vel natus rerum consequatur. Unde animi laboriosam et et sequi ipsa.', 'Aut explicabo facere id ea vel dolorum. Et vitae maxime magnam. Voluptatibus repudiandae quos omnis aliquam ut quam.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(463, 'Sit architecto qui blanditiis. Atque aut molestias commodi nemo et rem. Dolore esse minus et tempore libero ea. Eos pariatur cupiditate quis optio quos dolorem quia.', 'Et aspernatur ipsa sunt fuga est. Omnis sit minima deserunt cumque. Et distinctio ipsa suscipit temporibus ad eum et.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(464, 'Omnis non sed natus aut iusto praesentium laborum. Consequatur in est impedit occaecati similique quae in. Architecto ipsum et magnam ipsam. Consectetur odio tenetur nemo. Nostrum ut sapiente ut numquam.', 'Error eum soluta et atque omnis. Vero sunt ad non voluptates possimus culpa et. Libero quia error iure dicta iste qui qui. Sit aperiam placeat aliquid nobis doloremque qui. Et beatae quia quos.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(465, 'Et non distinctio velit enim. Maxime quo consequatur deserunt voluptate pariatur. Debitis eos tempora natus. Quibusdam corporis modi consequatur ad cumque voluptatem totam. Voluptatem nisi ea quo assumenda.', 'Id voluptatem natus libero autem illo sint fugit officia. Sequi cum expedita blanditiis quia. Consectetur excepturi et voluptas dolorum voluptatum quas.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(466, 'Expedita veniam fugiat id culpa aspernatur. Dolor minima quia molestias dolores est. Voluptatem distinctio dolore dolorum et molestias fugiat maxime.', 'Nemo quae totam quidem quaerat architecto. Harum dolorem corrupti culpa earum aut. Soluta commodi accusamus velit adipisci. Dolores aut maiores adipisci hic. Dolores sapiente iste voluptatem numquam.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(467, 'Quia alias et sunt blanditiis eius. Qui quos voluptatem sit fuga repudiandae. Officiis ut sapiente accusamus expedita nihil fugit non. Nemo enim numquam culpa occaecati deserunt.', 'Sapiente vero praesentium ipsam sapiente dicta natus. Accusantium ea vero quia sit officia. Fugiat adipisci blanditiis fuga voluptatum.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(468, 'Quasi sint qui mollitia. Laborum est veritatis mollitia quia ratione odio eos. Optio quibusdam excepturi dolores soluta hic suscipit. Nihil sit consequatur similique sequi. Molestiae nihil earum accusamus vero corrupti alias expedita asperiores.', 'Et voluptatibus et dolor officiis. Eius eos a enim. Blanditiis est inventore cum sed maiores est. Quo voluptas adipisci voluptatem dolor.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(469, 'Cupiditate omnis ut vitae praesentium qui ex recusandae numquam. Alias unde voluptatum incidunt et corrupti beatae temporibus. Qui incidunt eveniet dolorem atque. Saepe provident quia ratione nostrum eius beatae.', 'Debitis nesciunt iste pariatur enim rem voluptatem accusamus vel. Aut dolor sit enim autem autem. Eius dolorem modi autem temporibus accusamus doloribus asperiores.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(470, 'Soluta esse voluptatem ducimus provident. Aut sed temporibus labore est nisi. Est cum alias neque dolor. Iusto vel laborum autem reprehenderit consequatur. Ratione et sed quis ea optio ullam sequi.', 'Vel iste vitae quia est. Voluptatum enim ab labore consequatur explicabo nemo nostrum omnis. Repudiandae minus consequatur rerum ut. Alias et labore quo dolorem deleniti.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(471, 'Possimus impedit reprehenderit quisquam dolorem autem. Quibusdam aut et quidem aut. Quo animi similique numquam enim. Amet veritatis dolorem vitae veniam eligendi error aut ut.', 'Facilis repellat eaque et nihil neque praesentium quo qui. Dolorem eos tenetur harum soluta. Porro ratione eaque et earum aliquid est nisi quia. Sed aut rerum in et eos et.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(472, 'Rerum quis odit perferendis cupiditate. Iusto voluptatem praesentium excepturi quo rerum sed dolorum qui. Repudiandae placeat voluptatem ut deserunt quia.', 'Autem voluptatem dolores quas eligendi eligendi. Omnis ut debitis aperiam quisquam. Harum sint sit magni aut ut. Commodi ullam maxime deserunt magnam et.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(473, 'Saepe numquam rerum excepturi vel. Nemo molestiae eum libero soluta quis minus. Doloremque quibusdam unde sunt deleniti in id maiores maxime.', 'Et quia et ex aliquam eveniet neque. Et sed eveniet in molestiae quibusdam. Exercitationem voluptatem a maiores eveniet iure a.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(474, 'Voluptatem est quo accusantium ut quidem quam error. Suscipit fugiat necessitatibus maiores non repudiandae. Fuga nemo voluptatem maiores.', 'Ea accusantium debitis voluptas esse. Ratione voluptates sit inventore inventore. Placeat ea enim omnis dolores aut vel.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(475, 'Sed at ratione aspernatur maiores hic qui odit. Et illo doloribus animi laboriosam sunt quibusdam. Pariatur voluptatem est est aut asperiores ullam. Rerum veritatis aliquam quis totam repellat cupiditate aut.', 'Animi ut facilis illo et id. Assumenda eos sit quia ratione laborum aut mollitia. Quisquam sed natus veniam officia.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(476, 'Quas aut dolorem harum rem. Labore et et eius impedit sed. Et recusandae vel omnis veritatis suscipit. Odit accusamus numquam qui.', 'Aperiam debitis exercitationem inventore quia accusantium. Molestias tenetur eos recusandae perspiciatis sed.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(477, 'Recusandae omnis est quisquam voluptas doloremque. Commodi illum et facere voluptate eligendi quia minima. Consequuntur atque quia qui iusto assumenda et.', 'Vitae est non esse et repellat omnis ut quam. Reiciendis quae ut deleniti vel rerum sint omnis. Consequatur dolorem molestiae accusantium quo consequatur.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(478, 'Odio repellat reiciendis ut quo voluptatum soluta est. Animi error minus est itaque qui. Ea veritatis et aliquam ut vel repellendus. Eligendi sed dolore sed nemo et repudiandae nam et.', 'Exercitationem voluptas earum culpa veniam libero. Aut voluptas rerum qui magni ea et cum. Praesentium sunt quia molestias.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(479, 'Nesciunt at esse ipsa aut. Repudiandae omnis sed sit iure impedit dolore. Quibusdam alias culpa modi hic nisi. Aut molestiae consectetur ut voluptatem occaecati. Iure sint maiores dolorum eos eligendi expedita quo qui.', 'Sequi suscipit enim tempora architecto provident. Nihil nulla minus rerum fugiat totam nisi et ipsam. Et quos molestias nam est voluptatem cum saepe. Ullam dolorem vel qui aut molestiae.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(480, 'Aut saepe nisi voluptas cupiditate occaecati voluptatibus. Aperiam mollitia ad iusto soluta consectetur porro a vel. Fuga voluptatem eius corrupti consequatur non sunt cupiditate voluptatem.', 'Magnam voluptate velit explicabo rem nesciunt delectus. Delectus repudiandae rerum culpa sit natus. Dignissimos tenetur aspernatur similique provident consectetur.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(481, 'Est quam tenetur ducimus ab. Optio rerum eum et numquam dolorem id et. Autem deleniti voluptate reprehenderit ea odio. Dicta debitis dignissimos ex quasi at necessitatibus esse. Magni officia at deserunt dolor in. Nemo qui voluptatum esse vel voluptatem.', 'Minus ipsam necessitatibus omnis et itaque ullam. Voluptates et ut qui eius quidem a eligendi. Natus repudiandae odit vero placeat. Necessitatibus explicabo autem mollitia omnis odio ad.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(482, 'Nobis inventore illo quia eos. Et omnis voluptatem quis dolorem dolor. Voluptatem dignissimos hic necessitatibus consequatur rerum dolore. Magnam ipsum explicabo aliquam molestiae asperiores. Sequi aut et eaque consequuntur distinctio iste et.', 'Iste eveniet maxime voluptatibus aut modi. Unde quibusdam asperiores ut repellat. Sed dolor consectetur soluta velit deleniti velit.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(483, 'Asperiores ea eos qui et doloremque modi excepturi. Occaecati vel iure quasi expedita. Labore non quisquam repellendus perspiciatis vel quas sed. Aut esse nobis iste tenetur laboriosam qui et error.', 'Et sunt fugiat ea ducimus. Molestiae quia et consequuntur. Doloremque enim magnam odio ipsam dolore explicabo totam aut. Dicta voluptatem ex ipsam.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(484, 'Consectetur odit eaque sit voluptatem ratione. Voluptas autem dolorum numquam aperiam alias quo fugiat. Autem architecto fugit consequuntur consequatur aut. Inventore sunt dolore minima ea. Itaque eum et nesciunt odit.', 'Vel commodi ea aperiam asperiores. Odit ex a itaque veniam sit sint.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(485, 'Aut eum vitae magnam officia est perspiciatis fugit. Dolor ut nisi magni autem veritatis dolor esse illo. Ullam ab omnis explicabo. Qui consequatur hic atque aliquam et doloremque voluptas.', 'Placeat consectetur velit id hic odio. A ut laboriosam praesentium ex facere numquam dolore. Est alias optio eos velit dicta non nihil aliquid. Expedita temporibus alias quia velit praesentium sit.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(486, 'Mollitia maxime delectus sunt laudantium provident delectus doloremque. Perspiciatis aliquam et fugiat quo. Tempora occaecati consequuntur porro. Magni molestias sed quod.', 'Sint blanditiis quam sed libero eos rerum dolor rem. Est eius deleniti nobis hic quasi. Et quia est ut vero doloribus dolores repudiandae eligendi.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(487, 'Voluptatibus quasi distinctio qui omnis nihil eos. Sed doloremque et enim quia rerum. Aut voluptatum debitis sunt. Quos saepe explicabo adipisci eius velit quo voluptatum reiciendis.', 'Ad eum eos eos quae sapiente voluptatem ut. Dignissimos hic ab voluptates ducimus iure ratione. Aliquam sit sint ea cum repudiandae minima. Est nihil veniam ut et nulla cupiditate.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(488, 'Autem iusto ea et sint reprehenderit perspiciatis. Tenetur ut totam sapiente. Ut est omnis ex. Voluptas saepe dolorem autem nobis ut nostrum. Ipsum magnam earum non et voluptas sapiente ut. Occaecati et temporibus omnis et soluta.', 'Quo laboriosam fugit in libero similique saepe fugiat. Dolore ut ipsam veniam id saepe est consectetur exercitationem. Ut praesentium eum aut. Reiciendis ipsam eos ut est ea.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(489, 'Quia velit praesentium asperiores voluptas sapiente et qui. Delectus nulla magni distinctio ut veniam sed tenetur dolores. Deleniti hic et qui veniam.', 'Aut reiciendis quis deleniti vitae. Ex autem dolore eum et. Exercitationem et quod ullam blanditiis.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(490, 'Quae molestiae occaecati est et vitae voluptates saepe. Accusantium porro id occaecati illo facilis ea culpa modi. Tenetur cupiditate blanditiis mollitia qui in rem. Ad accusantium voluptatibus tempore eius ea quia dolor sed.', 'Facilis aut voluptatem nulla fugit aliquam. Eum sunt quos ut. Dolor libero optio aut iusto. Quia quam alias amet alias ea.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(491, 'Dolor quia fuga voluptatem ducimus tempora. Pariatur est ea aut quis repellat eligendi nostrum. Eveniet facilis et sequi est vitae enim aliquid.', 'Quaerat sequi ab odit iusto repudiandae voluptate. Id tempora unde necessitatibus omnis ea. Saepe enim ipsa ex non id.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(492, 'Voluptatem et quidem magni numquam ipsum ut veritatis. Voluptatem tempore et neque harum commodi consequatur assumenda. Voluptatem est quis suscipit laboriosam consequatur expedita fugiat. Enim veritatis ut et.', 'Ab ut officiis veniam minima quisquam. Veniam inventore optio quia cupiditate eos ipsum. Ad iure doloremque officiis nam. Ea sunt eveniet facere repudiandae.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(493, 'Omnis ullam qui rerum iusto non. Aut debitis quia et quo porro et. Qui nostrum quam voluptates repellat repudiandae cumque omnis. Excepturi deleniti hic veniam doloribus non labore placeat.', 'Non dignissimos molestiae expedita labore eveniet culpa qui. Laudantium ducimus assumenda voluptas eum. Magni nobis tempore cumque fuga omnis nisi.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(494, 'Incidunt pariatur voluptatibus autem. Similique quaerat consequatur temporibus pariatur eos deleniti sed. Quaerat voluptatem et est odio cupiditate non aut. Maxime consectetur pariatur enim tenetur est deleniti.', 'Dolore non assumenda rem officia eum accusantium quis animi. Est voluptates aut voluptas hic deserunt. Sit itaque voluptatem dolorum et ea. Nostrum exercitationem sunt quis atque.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(495, 'Laborum qui cupiditate nostrum quibusdam odio nam voluptatibus. Deleniti quibusdam nam corporis vel eos ipsam. Reiciendis saepe quod consectetur.', 'Qui est ut repellendus quibusdam provident. Sequi omnis sit tempora quisquam laboriosam. Omnis vero dicta ut.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(496, 'Fugiat libero esse quia repudiandae consequatur. Est est velit exercitationem laudantium aliquid possimus. Sed sequi optio explicabo voluptate.', 'Corrupti est et ipsum quisquam dolor. Repudiandae mollitia a qui amet sunt. Sunt corporis sit aliquam laborum quos molestiae qui. Earum qui quo cumque at cupiditate odit.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(497, 'Temporibus sequi quia quia sed voluptatibus nobis. Voluptas consequatur quos accusantium. Non enim velit officiis aspernatur earum labore.', 'Cum qui animi quo voluptas ut. Voluptatem sequi eligendi ipsam aut sequi maxime in. Voluptatem et beatae eos veniam.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(498, 'Enim saepe id odit aut. Iusto occaecati perferendis laudantium delectus molestiae quia saepe. Deserunt repudiandae ipsa nam libero.', 'Aliquid modi dolores ab iste est est molestiae. Expedita qui dolor vel facere quia nobis quasi. Et aut nihil culpa vel illum est. Temporibus iusto explicabo consequatur aut neque laudantium.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(499, 'Animi saepe velit velit dicta molestiae. Quia dolores repellat necessitatibus dolore qui ut. Culpa magnam aliquid voluptatem eveniet est aut. Qui tenetur magni voluptatem nesciunt debitis et enim sequi. Eos est ut recusandae voluptatem et maiores.', 'Dolores id excepturi quo amet ea. Numquam repellendus quisquam voluptate tempora voluptatem sed et.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(500, 'Atque ut sed fugit eum pariatur. Ea aut aperiam voluptatibus. Magnam enim aut repellat. Voluptas aut deserunt excepturi.', 'Accusantium reprehenderit ad et nobis quo fugit sit. Voluptatibus adipisci ut ab. Velit id quis aut iste labore. Laboriosam accusamus natus aut doloribus.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(501, 'Minima aspernatur voluptas est dolor et non sed. Consequatur voluptates libero ipsa adipisci cum et.', 'Ut explicabo temporibus velit ea illo dicta sint. Veniam in necessitatibus qui in. Rerum architecto ullam impedit at. Vero et dolorum voluptates ut.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(502, 'Qui ea sit quia recusandae et cumque eum. Et labore aut dolorum qui aut autem dolorum. Similique nobis animi vitae et sed. Aut fuga id quia omnis illum vel. Sit dicta nisi eum ut perferendis.', 'Aut qui dolorum unde. Hic quibusdam quod ut soluta nemo officiis. Necessitatibus mollitia quae quia quaerat aut quis rerum.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(503, 'Pariatur minima totam debitis quod perspiciatis ut natus sed. Eveniet voluptate ut minima molestiae. Qui quia possimus asperiores natus accusamus in.', 'Est rem id beatae excepturi. Iste velit est suscipit ut ea ipsa. Ducimus excepturi perferendis eveniet vel. Autem incidunt ut voluptas nobis sunt. Est architecto similique velit et cumque error.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(504, 'Ut atque qui et suscipit consequatur. Ipsa rem eius itaque inventore rerum debitis est. Qui quas iure reprehenderit sequi consequuntur.', 'Necessitatibus reiciendis tempora veritatis quas est sunt culpa. Architecto dolore quod amet itaque quo.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(505, 'Dolorum vero deserunt veritatis eum. Vitae illo esse qui error. Minima maiores ut rerum officia voluptas occaecati id.', 'Sit nihil sit aut et labore et iusto eum. Aut quia sapiente est ut. Quo ab perspiciatis aut veritatis. Labore fugit et maxime eos praesentium facilis.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(506, 'Fugit ut dolores sint. Temporibus sit eos sint itaque sunt velit. Consequatur vitae et est accusamus dignissimos repudiandae.', 'Omnis repudiandae ipsum et sunt maxime. Et iure in quae ut qui perspiciatis totam. Nostrum in maiores amet nihil enim. Molestias itaque rerum sit provident similique impedit id.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(507, 'Omnis dolorem sunt minus veritatis nihil commodi. Alias iusto officiis laboriosam sed odio velit ipsum. Et non consequuntur quidem dolorem eaque fugit molestiae. Recusandae suscipit eos soluta commodi aut tempore. Labore aperiam quia molestias.', 'Rerum corporis porro distinctio et dicta rem eum. Incidunt sint numquam exercitationem. Rerum commodi aut vitae quia aut sunt nostrum. Omnis fugiat vero dolorem doloribus.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(508, 'Quia voluptatem consequatur velit suscipit. Commodi voluptatem sed quidem voluptatem. Voluptates adipisci omnis dolorum omnis modi eius vitae nostrum.', 'Perspiciatis veritatis corrupti ipsam quis officiis rerum eos. Consequatur sit dolore modi velit iure voluptatem. Unde autem ea eveniet eos eligendi nemo quia. Dignissimos quod occaecati minus.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(509, 'Eos doloribus odit quia commodi quisquam. Ducimus sit placeat asperiores nihil. Voluptas rem commodi voluptatem velit. Voluptatem id porro porro culpa ut.', 'Velit quia repudiandae odit maxime quia enim. Sunt sit eveniet quasi et sed inventore. Saepe laudantium praesentium voluptas dolorum consequatur.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(510, 'Ut consectetur eius consectetur dolorem. Aliquam reprehenderit ut eum iusto minus. Enim quis eligendi tenetur soluta hic est et. Ab quia qui necessitatibus magnam.', 'Quis enim mollitia culpa quibusdam aut quis similique. Eaque necessitatibus tempore illo quia numquam odit. Cumque adipisci aliquam quaerat.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(511, 'Iste voluptatem pariatur aut error aut. Suscipit est repudiandae architecto laboriosam est a. Molestiae fuga autem optio et ut et.', 'Sequi quis iure in. Omnis adipisci et dolorem neque qui. Pariatur et est voluptas aut amet est aliquam laboriosam. Reprehenderit ex sapiente voluptatem corporis unde.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(512, 'Veniam doloribus voluptatem temporibus dolor est mollitia. Laudantium occaecati optio est.', 'Non reprehenderit deserunt quis. Blanditiis sit et distinctio quaerat vel. Voluptatum laudantium aut nisi aperiam maiores pariatur doloremque. Dolorum nihil omnis et maiores natus aliquid dolorum.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(513, 'Quae nihil eum velit eligendi aut quis ipsa. Vitae nostrum provident non at debitis doloremque voluptatem. Magni omnis porro minima magnam.', 'Non ab et repellat sed. Harum nam quia perspiciatis quia quidem dolorem.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(514, 'Et exercitationem quos eius aliquid. Atque eius et vitae inventore molestiae est aperiam. Enim aut facere adipisci soluta eum iste est. Veritatis impedit aliquam possimus et. Quia quia quo quis et.', 'Qui dolores aliquam velit corporis quidem ipsa officiis atque. Ut minima aliquam quo saepe voluptas aut magni.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(515, 'Aut molestias praesentium error id deleniti rerum. Quia nihil adipisci consequatur magnam quo. Eveniet quis iusto doloremque reiciendis culpa a earum. Id placeat et ipsa deleniti modi vero totam.', 'Cupiditate illo laboriosam iste. Consequatur veniam velit error doloremque. Ea alias modi est mollitia. Alias qui hic architecto.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(516, 'Quia reiciendis quasi repellat adipisci. Tempora maxime dolorem ab.', 'Expedita illo recusandae nesciunt quis. Accusantium molestias sed ipsum unde distinctio rem ipsam placeat. Accusamus dolor quis quia maxime culpa voluptas odit.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(517, 'Id voluptatum placeat atque ea voluptatem. Laudantium nulla magni nihil culpa ipsa. Iusto id nihil voluptas autem. Non totam voluptatibus perspiciatis quasi esse. Id qui voluptas et. Error ut quisquam sed. Consequatur molestiae et sunt sed.', 'Facilis et possimus eum nesciunt atque eligendi officia. Occaecati eos nulla voluptatem cum.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(518, 'Dolorem asperiores id est et aut eos. Omnis officiis rerum at expedita. Odit incidunt autem impedit deserunt.', 'Dolor quod excepturi ut. Exercitationem sapiente rerum corrupti aut quis voluptatem distinctio nihil. Neque corrupti minima et nesciunt aliquam repellat expedita tempora.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(519, 'Ratione eum deleniti aut doloremque. Sunt est et tenetur eveniet. Rerum blanditiis rerum consequatur possimus voluptas nihil.', 'Et ut aspernatur tempore cum voluptatibus quae. Soluta omnis minus qui maiores. Tempora aut et vero. Sit a vel explicabo. Libero qui amet occaecati voluptatem.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(520, 'Ad et quod similique reiciendis. Velit mollitia sit eos amet est in perspiciatis. Voluptatem beatae ut et blanditiis impedit cupiditate dolore.', 'Ipsam et adipisci ut quia quo. Dignissimos esse eaque id nihil. Quod dolorem voluptas itaque expedita. Soluta corrupti dolorem ipsa est voluptatem.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(521, 'Ut eius hic ut cumque provident. Maiores ea quas a enim voluptatum sint sint. Doloremque quaerat minus repudiandae officia consequatur eius.', 'Et vitae numquam et tenetur. Eum sed impedit sequi labore voluptatum. Tempore cupiditate veniam facilis accusantium modi aut illo error. Aut porro voluptatem et sequi ex corporis.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(522, 'Cupiditate ipsum molestiae modi esse et. Quam totam voluptas ad neque reprehenderit. Ut repellendus et et quas quidem dolores et.', 'Expedita consequatur pariatur excepturi praesentium. Autem unde sunt ducimus quis recusandae. Veniam magnam ad ut quod. Eos earum placeat velit dolor.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(523, 'Ut qui voluptatem aliquam saepe id molestiae. Quia quisquam consectetur expedita repellat occaecati laborum soluta placeat. Non omnis perferendis reiciendis dolor non necessitatibus cumque.', 'Aut quia quidem consectetur neque sunt. Explicabo fugit nulla recusandae et. Quia facilis nam repudiandae in ad magni et.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(524, 'Hic sunt ipsa sunt id fugiat. Quia amet consequuntur ut ratione dolorum quo. Ut natus laborum iste velit temporibus asperiores. Esse nesciunt necessitatibus illo ducimus itaque optio consectetur.', 'Suscipit aut laudantium quia ab quo est quis. Temporibus provident quo ut pariatur labore enim dicta. Molestiae sapiente temporibus sunt enim sapiente et doloribus.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(525, 'Dolorum maxime est illum cumque voluptatem at quaerat. A in dolorum alias et. Quia voluptatum rerum eos omnis. Esse nisi sed eaque qui. Pariatur et delectus ut. Ratione recusandae et laborum voluptates. Voluptate dolores sit sit iusto quo sunt illum.', 'Sed nisi non ut non commodi dolore. Asperiores rem voluptate est maiores non quidem. Autem officiis repellat aut recusandae quo.', '2021-11-20 14:48:03', '2021-11-20 14:48:03');
INSERT INTO `modeles_devis` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(526, 'Exercitationem tempora maiores sit voluptatibus quia. Quod ipsum neque ut nulla. Voluptatibus commodi deserunt ipsa animi iure incidunt. Sapiente ad autem asperiores consequatur odit.', 'Omnis voluptate quisquam perferendis voluptatem commodi. Aspernatur vel aut dolor vel vel dolore nesciunt. Voluptatem consectetur molestiae qui.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(527, 'Veniam nisi voluptas est eius. Esse veniam id optio dignissimos.', 'Possimus iusto harum quos officiis voluptatem officia culpa aut. Dolore eligendi inventore possimus inventore. Nemo delectus ipsum et. Officia nostrum qui velit. Ea earum eum nihil quo odit enim.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(528, 'Veniam aut assumenda alias illum fugiat in eveniet. Repellat libero consequatur voluptatem rerum blanditiis id perferendis accusantium. Non rerum temporibus suscipit. Vero voluptatem cum ex tempora.', 'Et et eveniet ea. Officiis saepe rerum officia odit hic. Dolore incidunt dolores iste ex sed molestiae. Iure quia tenetur expedita ut vitae.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(529, 'Maiores sit et facilis omnis. Est id a sint excepturi id. Est ipsam pariatur aut quaerat. Hic iste excepturi adipisci non fugiat doloribus. Iusto suscipit voluptatem cum est.', 'Explicabo veritatis velit perferendis. Temporibus vitae quia provident non voluptas dignissimos dolores. Inventore ut et est aliquam.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(530, 'Perferendis aspernatur sequi nihil cum. Optio qui pariatur numquam eveniet ratione voluptate quisquam. Aut eos harum asperiores voluptatem consequatur laborum est. Veritatis deserunt ut officiis placeat.', 'Aut distinctio velit sapiente ea. Ea eius enim voluptas. Libero tenetur eius aut sed cumque quam. Veniam laudantium excepturi rerum occaecati voluptate necessitatibus.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(531, 'Velit officia non voluptatem et laborum veniam. Omnis vitae qui voluptatibus autem. Sit dicta tempore aut repellat sed.', 'Ex rerum accusantium nostrum distinctio laudantium enim. Repudiandae voluptatem impedit provident quae.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(532, 'Aliquam vitae non aut qui. Dolorum sit omnis laboriosam voluptatem aliquid ipsum. Ullam in aut possimus vero perferendis. Aspernatur et aperiam nihil fugit officia.', 'Quia ipsum ipsam eum. Fugit possimus est et cum impedit. Eius veniam ut iusto.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(533, 'Aut magnam at qui labore adipisci doloribus eligendi. Ullam eaque id aut et consequatur dolor omnis. Et et sit id veniam explicabo.', 'Quisquam reprehenderit qui aut. Illo officia nisi quia deleniti dolorem occaecati ut. Placeat at corrupti maiores repellendus ut commodi aspernatur. Eligendi harum velit quam sed qui sit.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(534, 'Rerum id eos nemo error. Numquam rerum reprehenderit ducimus iure corrupti. Vero voluptatem magnam non sed eum. Eos velit reprehenderit dolor dolores. Ea tempore illo et corrupti.', 'Aperiam voluptates provident officiis voluptas autem vero. Ex ducimus tempore soluta ex. Aliquid consequatur ad inventore aut in repellendus nihil.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(535, 'Omnis consequatur quia consectetur quos necessitatibus et. Ut suscipit sunt voluptatem. Unde velit ea quia amet. Molestiae cumque eos maxime adipisci distinctio vitae sint.', 'In laboriosam velit sequi ut iure aperiam reiciendis alias. Provident voluptas blanditiis consequuntur ut fugit ipsa. Enim omnis amet facilis itaque voluptatem consequatur.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(536, 'Laborum aliquid sint nesciunt. Reprehenderit quia ut magni. Laudantium error voluptatem aliquid quo illum et nesciunt.', 'Fuga nostrum sunt incidunt libero atque non voluptates ut. Optio et suscipit excepturi. Sunt dolor autem animi neque aut. Iusto quibusdam eum sunt error quia.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(537, 'Dicta suscipit eum molestiae maxime mollitia voluptate distinctio. Sint officiis atque deleniti illo provident. Temporibus saepe beatae velit numquam ipsum ut.', 'Et voluptate cupiditate ipsum tempora. Veritatis sit qui non adipisci architecto praesentium.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(538, 'Aperiam quasi qui optio est. Nisi et tenetur odio aut. Eligendi eum ullam quae vel aut saepe eveniet. Optio pariatur qui totam ut nostrum voluptatem.', 'Dolore modi vel quod et ut vel exercitationem. Perferendis quia non soluta et necessitatibus et eveniet. Ea quia aut aliquam autem vel. Ipsa quaerat illo laudantium optio voluptas.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(539, 'Sequi laborum maiores eaque aut aut. Expedita occaecati illo repudiandae qui officiis. Et sed minus in voluptas ipsa vel modi. Consequatur a eos ex molestiae. Est dolore sapiente qui voluptatem et et corrupti eligendi.', 'Et iusto porro consectetur voluptas animi numquam. Est totam molestiae consequatur quisquam reiciendis ipsam amet. Alias consequatur explicabo ut repellat ipsam aut voluptatum.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(540, 'Magni totam dolores minima mollitia vitae quo sint. Hic in quia delectus quis magnam et. Necessitatibus occaecati numquam nisi. Dolores fugiat excepturi numquam enim repellendus eligendi.', 'Possimus modi magnam et est quia et. Velit enim et tempora exercitationem molestiae voluptas nulla. Culpa vitae culpa dolorem et. Iure exercitationem ullam sunt quo labore eius.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(541, 'Illo suscipit eligendi ut voluptatibus iusto. Explicabo incidunt repellendus consectetur cupiditate sequi adipisci. Corrupti dolore eum fugiat aut aliquam.', 'Laboriosam omnis dignissimos enim qui voluptate est. Soluta est distinctio voluptatem assumenda ut. Quae voluptas quia dolor et voluptatibus dolorem occaecati.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(542, 'Sint hic sunt tempora dolore consectetur tempora eius accusamus. Illo voluptas similique qui occaecati. Culpa odit et odio eveniet laborum iusto. Quia necessitatibus sit accusantium est quo.', 'Illo nostrum laudantium quia. Voluptas et reiciendis explicabo ut animi necessitatibus suscipit. Omnis quasi eveniet autem nam. Velit ipsum at fugit possimus numquam quis quam.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(543, 'Et sequi commodi ea culpa et dolor. Nesciunt quis non et. Natus deserunt architecto quaerat magni vel voluptatem dolorem. Laborum sit et qui velit.', 'Totam pariatur iure occaecati corporis illo ut aut. Atque placeat incidunt nisi distinctio tenetur. Ut odio ratione ullam officia recusandae iure eum sunt.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(544, 'Accusantium corrupti vel rerum aut et. Assumenda error et exercitationem molestiae. Ipsum sit recusandae aut dolorem velit rerum.', 'Voluptas harum et architecto quod quia recusandae voluptatem. Ut in soluta placeat maiores nesciunt ut fugit.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(545, 'Sed numquam dolores ipsum fugit. Nisi harum omnis et quam neque velit. Itaque perferendis in qui maiores et. Sint quos ea est optio blanditiis. In et provident in earum similique assumenda. At placeat non fuga in doloribus animi reiciendis neque.', 'Sed aliquid labore fugit sequi quo aliquam tempore. Sunt iusto doloribus ut accusamus ea itaque. Ipsam optio ab nostrum occaecati quidem dolores provident.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(546, 'Eveniet saepe aperiam quidem cumque rerum in optio. Qui odit non sit nesciunt voluptatem beatae et. Quae numquam non occaecati optio et odio provident.', 'Aliquam molestiae facere harum debitis. Odit sed perferendis aut animi.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(547, 'Reprehenderit quis ipsum animi. Accusamus ducimus id reiciendis iusto. Alias accusamus non ullam nulla possimus. Facere iste dolorem nihil. Hic autem rerum est similique non ipsa et.', 'Reiciendis deleniti dolores similique expedita voluptate. Aut officia aut sunt beatae totam reiciendis. Quia dolores aut omnis iure.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(548, 'Non doloribus ut nihil ea id optio ullam. Expedita quia inventore qui ullam ipsam. Error ad dignissimos molestias similique. Et tempora sapiente at sunt hic.', 'Incidunt et doloremque voluptates consectetur occaecati hic saepe. Aperiam adipisci dolores quia praesentium. Pariatur assumenda at consectetur eaque sit in officia.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(549, 'Voluptatem aut non inventore quas distinctio aspernatur vel. Voluptatum deserunt ipsa tenetur hic voluptas perferendis non. Ad sed consequatur facilis dolorum. Pariatur quis deleniti neque voluptates autem soluta ut. Et ut fugit illo et magnam vitae ut.', 'Velit nulla fugiat dolore in voluptatem eum. Eum voluptatem sapiente distinctio corrupti.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(550, 'Recusandae sit quasi quia sed necessitatibus. Maxime illo dolor libero ullam dignissimos mollitia enim dolorum. Id tempore natus alias sit laboriosam illo aut eum.', 'Eos eaque et ab quo non quam facilis. Ex velit dolores quo id. Error voluptates molestias voluptatem magnam est possimus qui.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(551, 'Officia minima unde ducimus qui. Quis expedita et maiores autem sapiente incidunt. Praesentium repellendus alias eum libero. Odit atque labore sit veritatis quis est ea.', 'Accusantium blanditiis laborum qui consequatur blanditiis voluptatem eos voluptatum. Non enim accusantium sed accusamus. Veritatis dolor consequatur consectetur vitae.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(552, 'Quaerat ut iste est et id sunt est culpa. In et quisquam nisi dolorem ipsa aut. Porro ab a ratione non non. Dolor ad similique numquam est.', 'Vel porro tempora at odit et velit quidem. Incidunt est nam accusantium sed itaque. Vitae ea voluptatem exercitationem. Est totam tempore nam non perferendis et.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(553, 'Ut explicabo dolore voluptatem eius. Dolor eos minus nulla maxime similique in. Ut possimus aut ipsam cum. Beatae laboriosam maiores assumenda qui debitis hic.', 'Repellendus et hic dolor est omnis quas odit et. Molestias quisquam nesciunt error harum sit nisi. Consequuntur sit beatae deserunt et laudantium assumenda quod.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(554, 'Nobis sint sapiente odit eum impedit saepe. Voluptatem ad explicabo nam cumque. Qui iusto quia impedit dolor. Voluptatem illum quis quaerat id autem vel molestiae. Cumque blanditiis quibusdam voluptas. Maiores magnam dolorem unde occaecati quis ullam.', 'Occaecati tempore officiis soluta ab eos. Doloribus sed eius non totam et eius nulla. Ea aut sit nihil explicabo qui et. Nesciunt iusto adipisci eius qui. A non neque ab unde sapiente.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(555, 'Vero aliquam dolor est totam. Est molestiae ea veniam. Dolor ullam assumenda neque et dolores saepe ea. Architecto eum animi quia repellat ea sit aliquid ipsum. Totam iste quidem voluptas veritatis dolorem consequatur rerum ut.', 'Consequatur quia sint cum voluptas quos fugiat et. Illum ex sunt nemo blanditiis expedita autem minus. Qui libero qui ducimus nulla iusto.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(556, 'Voluptas non aut in. Et rem enim sint rem esse magni. Sunt mollitia tenetur voluptatem aut placeat minima aut. Voluptas placeat quam dolor itaque quod ut rerum. Iure qui odit doloribus ad.', 'Ex voluptas aut quo facilis et. Distinctio repellendus quis rerum occaecati ex minima atque. Quos quasi delectus atque occaecati repellat. Eos sed ut dolorem aliquam sed eaque aliquam.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(557, 'Quia non earum sequi minus ullam. Veritatis sed ea minus sit et aut maxime. Voluptas debitis ea et pariatur quo dolor dolore. Voluptatibus enim voluptatem voluptas quibusdam.', 'Doloribus a quas dolores in aut. Voluptatibus eos ipsa expedita natus eum maxime. Voluptas est ipsam sit explicabo. Quaerat laudantium ducimus fugiat.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(558, 'Optio velit mollitia aspernatur in. Ullam dolores provident cupiditate mollitia. Aspernatur aperiam aut omnis quidem corrupti.', 'Magnam reiciendis vel dolor eaque temporibus architecto ab. Dicta numquam eos repudiandae blanditiis qui. Et dolorem fugit explicabo quis.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(559, 'Sint quod similique quis. Pariatur aliquam optio amet nesciunt qui eum vitae alias. Dolore eos sit consequatur voluptas. Praesentium et nulla laborum aut sit consequatur sunt. Quae vitae tempora deleniti pariatur temporibus sit.', 'Accusantium qui autem eum accusamus. Dignissimos eum omnis et officiis. Doloribus qui facere assumenda eligendi. Omnis et reiciendis exercitationem et.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(560, 'Quam blanditiis aut rerum. Dolore aut dolor alias perspiciatis. Assumenda est pariatur tempore modi. Velit omnis expedita qui sed dolorem autem est. Illo veritatis vel velit quas. Incidunt consequatur temporibus et est.', 'Qui deserunt cum necessitatibus dicta. Optio nam cumque reiciendis aut aut et. Provident dolor perferendis iure omnis.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(561, 'Repellat earum blanditiis et quis est quas. Omnis expedita aut eligendi aliquam earum distinctio. Veniam architecto totam quia suscipit nisi velit ad. Ex et corrupti accusamus expedita deleniti.', 'Atque maiores voluptas repellat modi. Sequi esse quo est sequi non. Quis quae velit perspiciatis cum. Molestias beatae at voluptatem ullam qui quibusdam.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(562, 'Sit quae architecto deleniti. Saepe ut accusantium molestiae dignissimos fugit consequatur nostrum. Expedita et repellat dolorem in perferendis aut.', 'Qui harum qui qui repudiandae. Quia quia quasi doloremque nihil consequatur nemo. Voluptatum animi dolorem facilis saepe est minus et culpa.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(563, 'Omnis ut iusto eum iure reprehenderit pariatur possimus. Ullam ipsa commodi amet exercitationem. Minima assumenda consectetur aut voluptate alias quia. Ea non dolorem architecto quos earum incidunt molestias.', 'Culpa distinctio voluptatem molestiae vel velit vel labore. Rerum laboriosam repudiandae quia illum a id doloremque. Suscipit soluta sunt nostrum in aut. Velit fugit numquam ipsa laudantium est.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(564, 'Omnis veniam aut dolor repudiandae in. Voluptates molestiae tempora consequuntur esse iste amet. Numquam exercitationem occaecati cum aperiam omnis amet. Eos error harum facilis. Consequatur aut quasi cum sed. Deserunt quidem neque sit ab voluptatem ut.', 'Eveniet ullam accusamus sit assumenda laboriosam est qui temporibus. Vel at eaque ea ducimus natus facere alias. Officia omnis voluptatem cupiditate quae eius ea quae.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(565, 'Error occaecati dolores aliquam et quo. Non sapiente error aut accusantium. Et numquam inventore deserunt dolor atque maiores accusantium.', 'Dolores ipsum voluptatem vero eos consequuntur. Nisi dolores quae ex sunt error minus sit. Laudantium non quidem maxime illo est. Iusto odit officiis voluptatem dicta eaque.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(566, 'Dicta repellendus impedit porro nesciunt. Sapiente dolorum eius enim quia et ut. Impedit autem dolor a aperiam neque magnam inventore praesentium.', 'Maiores aut magni quisquam minus aut recusandae a numquam. Vel autem non enim corrupti hic beatae.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(567, 'Nisi dolore et et tenetur itaque delectus vitae. Possimus quo occaecati nihil sunt magnam. Magnam dolores nostrum aliquid ut harum sint.', 'Qui porro cupiditate qui eum. Incidunt nesciunt sequi expedita quod. Et quia expedita consectetur officia omnis explicabo id. Sed repellendus enim hic eaque aliquam.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(568, 'Non architecto et explicabo. Blanditiis minus error eos fugit. Id et dolor neque accusamus. Qui accusantium soluta at consequatur ad adipisci nisi.', 'Quae voluptatem deserunt quia hic perspiciatis est fugit. Vero possimus fugit voluptas architecto. Perspiciatis aut cum molestiae consequatur.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(569, 'Laudantium in est veniam ea eius. Quos consequatur cupiditate cumque debitis quaerat maxime aut. Dolore reprehenderit fugiat natus neque dicta voluptatem. Quia et recusandae quis quam quia voluptas dolor ipsam.', 'Beatae et qui eum et natus dolor quo maxime. Aliquam sit laudantium ipsam et temporibus debitis. Saepe ullam consectetur corporis ratione.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(570, 'Exercitationem adipisci et tempore iste. Consequuntur eveniet molestiae ut libero et. Ex cupiditate provident dolorem ipsam ut ex. Omnis similique rerum eum sequi. Necessitatibus beatae incidunt dolores dicta rerum et.', 'Deserunt quidem totam impedit alias distinctio. Reprehenderit aperiam debitis sit dolor tempore id.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(571, 'Laudantium velit velit placeat voluptatem sit similique nisi molestias. Enim sit consequatur minima. Minus veritatis aliquid rerum iste et. Sint dolor in optio. Nihil quod architecto delectus autem. Dolorum quae labore asperiores iste ut.', 'Corrupti id nulla nobis consequatur praesentium repellat laboriosam. Ex veniam ea maiores quia. Expedita ratione ipsam quod dolores. Molestias illo quae quos itaque non dolores.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(572, 'Cumque aut perspiciatis maiores perspiciatis sunt reiciendis qui. Iste ut eum in quis quis odit dolorum. Doloremque aut impedit eos et quia modi. Labore autem qui voluptatum aut nihil facilis voluptas nemo.', 'Rerum voluptas cum voluptatem distinctio optio aut sint qui. Occaecati est tenetur qui id non.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(573, 'Quia eum enim consequatur voluptate nihil. Perspiciatis et consequatur aut sit odit saepe necessitatibus. Alias in voluptas eius ducimus consectetur iste asperiores.', 'Ullam iusto ex nihil ut dolores. Nemo et repellendus expedita illum. Labore excepturi voluptate eveniet molestiae adipisci laudantium illum eos. Qui provident neque est magni.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(574, 'Voluptas et sit sit iusto optio rem. Sunt sequi tempore sint deserunt libero ab quaerat. Mollitia molestias iure quia velit culpa pariatur est. Dolores eius iste laudantium est. Velit et quia adipisci ullam corrupti reprehenderit.', 'Deleniti odit a quia et et soluta. Minima dolorem omnis perspiciatis at sit id perspiciatis. Est ut aut et culpa consectetur.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(575, 'Aut illo saepe voluptate eum laboriosam ea. Illum eveniet quidem ipsa quia aut. Omnis corporis veritatis placeat vel repellat vitae aut.', 'Sint sit fugiat quo sed at. Ea vitae maxime iusto optio omnis eaque et. Saepe dolorem earum doloremque necessitatibus assumenda dolor saepe. Voluptatibus praesentium aut et et aut natus voluptas.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(576, 'Unde odit at maiores nihil. Quae consequatur et in eius officia. Blanditiis ad sed recusandae et quaerat doloremque dolores.', 'Nisi aut quis tempora quos nisi. Placeat ut quis eaque cumque hic. Molestias eveniet voluptatem ratione ipsum nobis in quos voluptatem. Id vel aperiam facilis ratione fugiat.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(577, 'Sapiente unde aut quis qui. Qui fuga beatae fuga qui ut officiis sed. Soluta est aliquid explicabo neque ullam accusantium eos fuga.', 'Quo praesentium voluptas et non optio atque. Dolor eos blanditiis iusto rerum voluptas. Nulla possimus maxime architecto sit qui ut magnam. Perspiciatis tempora nulla et unde aliquid.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(578, 'Ut cupiditate ipsa rerum. Nihil consectetur id ad sint iste expedita. Est maxime impedit quidem ipsum optio voluptate.', 'Rem eveniet minus fugiat deserunt. Voluptatem quod autem quia sit architecto reiciendis aliquam. Provident et quia est veritatis suscipit voluptatum.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(579, 'Dolorum quidem nihil dolores a eum. Tenetur voluptatem itaque enim ex. Molestiae ad natus dolorum voluptates fugit pariatur nisi.', 'Sequi quo expedita quia velit at ex. Quis vero numquam sunt facere qui aspernatur. Optio cum fugiat et quis quam. Dolor eum maiores inventore.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(580, 'Cumque consectetur ut magni culpa. Quia dolor odio est numquam libero. Id similique rerum ex quod. Quod sequi non vel illo. Doloremque sapiente nesciunt voluptates voluptatum quia consequatur eos.', 'Nisi libero non sit porro voluptas aut. Labore deserunt qui deserunt sapiente. Qui qui rerum odio eos laborum incidunt pariatur ad.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(581, 'Optio est laudantium culpa sit qui aut. Voluptas vero enim nesciunt laudantium ipsam. Harum amet culpa ducimus qui vel.', 'Voluptates impedit laborum deserunt est reprehenderit enim. Voluptates praesentium eveniet ipsam et sed corporis. Odio quaerat voluptatem sed nihil ipsum dicta reiciendis.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(582, 'Esse eos quod ducimus eveniet quod perspiciatis. Ratione aut quo voluptas deleniti animi commodi quam. Error nihil quis dignissimos rerum. Est ut ab voluptas est. Sint et aperiam ut rerum sunt. Eveniet voluptas aut quisquam labore qui dolorum.', 'Laudantium hic sint laborum perferendis. Ea omnis autem natus commodi. Expedita et eius ea cumque id. Laborum consequatur ut dolorem.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(583, 'Nisi sunt magnam sed error et. Expedita autem magnam debitis voluptatem eum ut perferendis molestiae. Voluptatem ut ab exercitationem quidem deserunt. Odit corporis similique eaque recusandae.', 'Sint tempore molestiae doloribus enim est sapiente et. Vitae deserunt explicabo praesentium dolor. Maiores quia sit sit rerum nisi. Molestiae et labore sed culpa.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(584, 'Odit commodi nulla mollitia provident odit. Ratione omnis et eligendi hic unde et fuga ut. Mollitia necessitatibus repellendus quia.', 'Voluptas sed omnis nobis voluptatum porro officiis. Quasi dignissimos aut odio consectetur voluptas aperiam non. Enim incidunt temporibus vel cumque.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(585, 'Ut consequatur modi fugiat dolores placeat vero. Quia quibusdam dolorum facilis excepturi harum voluptate ipsam. Doloremque occaecati et dolorem dolor soluta odio.', 'Earum tempora odit non excepturi et est. Maxime commodi rem nostrum officia quam. Blanditiis dolores quae consectetur quo illo reprehenderit soluta.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(586, 'Reprehenderit voluptatibus architecto quam repellendus ducimus nisi. Voluptates sequi numquam blanditiis aut odit ut et. Est et excepturi dolores ea sint repudiandae vero.', 'Non ut et fugiat officia enim. Sit atque nostrum tempora mollitia ab autem. Ea cupiditate sit repellendus delectus. Et esse non magni eum rerum adipisci.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(587, 'Cumque itaque pariatur nulla voluptatem fugiat. Fugit vel maiores voluptatem dolor et quo. Enim neque dicta et a totam fuga sed. Nulla aut maiores eum est quia.', 'Nemo rerum dolores tempora rerum consectetur dolor. Assumenda vero et omnis ut provident. Quod nulla qui accusamus incidunt.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(588, 'Et atque laboriosam cumque reprehenderit ut fugit. Quia ad molestiae magnam aut. Recusandae non doloribus odit dolor dolorem. Quam est non qui aliquid aut. In aut aut amet sed sint. Suscipit numquam architecto voluptatem voluptatem.', 'Aut ad excepturi ab tempore est odio. Quo omnis nulla nihil id omnis dolorem cumque. Est totam perspiciatis eveniet ipsa rerum voluptas.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(589, 'Voluptas tempora excepturi consequatur soluta quia possimus voluptas. Voluptates dolorem beatae ducimus omnis vel. Iste velit voluptates odio officiis quisquam. Ea cumque aut sit aut et esse.', 'Molestiae sapiente ad harum cupiditate accusamus. Unde sunt velit dicta.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(590, 'Voluptas quod et fuga aut. Similique qui illo occaecati consequuntur in quia. Velit fugit nihil autem necessitatibus. Dolorem dolorem maxime aspernatur eaque natus quia. Quia in autem fugiat rem facilis quaerat officia ipsa.', 'Asperiores quasi inventore similique laborum quidem. Quod quos minus quibusdam corrupti aut. Officia ut repellendus rem tempora dolorem dignissimos dolores. Alias esse tenetur modi eius aut.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(591, 'Molestias eos quia dolorum est eius consectetur. Nihil dolorem porro neque aut voluptates. Exercitationem atque et consectetur et ipsa voluptatum.', 'Cum beatae ea porro repellat. Unde quia eveniet magnam harum consequatur. Et impedit omnis quisquam magnam. Recusandae et harum iste quidem.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(592, 'Velit fugiat exercitationem vero. Quia aliquid consequatur ut quia. At officiis consequatur sequi consequatur. Corrupti est et minus itaque aut.', 'Atque molestiae dolores est aut sit. Eos architecto dolor itaque.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(593, 'Cumque porro suscipit magnam non ullam odio non eos. Fugit architecto modi reiciendis. Optio quam totam occaecati aliquam et ut ratione.', 'Aliquid aliquid doloribus et in eum praesentium voluptatem. Quos cumque quidem minima quaerat autem optio sunt. Voluptatem velit fuga fugiat. Iure ipsam fugiat veritatis porro debitis.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(594, 'Vel quis voluptates itaque quidem vitae libero veniam. Tempore est dicta impedit dolorem alias maxime non sit. Ut laudantium porro quo aspernatur distinctio quia eaque. Distinctio rerum iusto quis ut et.', 'Eos possimus aut consequatur molestiae deserunt dolor. Omnis quidem quo dolores aspernatur voluptatem sunt. Possimus accusantium sint dolor aperiam ex expedita rerum.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(595, 'Incidunt voluptas dolores voluptatibus ut. Nesciunt voluptatum aut molestias qui neque deleniti. Quae nam cum culpa maiores sit qui necessitatibus. Eveniet quis ut id fugiat error eos distinctio quia.', 'Vel qui adipisci illo ut. Nobis et ut quo voluptatum. Facilis non distinctio quidem similique provident officiis hic voluptatum.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(596, 'Minus quia quidem alias veritatis. Placeat dolores libero sint laudantium. Quam voluptatem eum quos nemo illo. Quos repellendus commodi expedita aliquam ad aspernatur.', 'Atque ut sed quia nobis. Sunt et quos maxime fugit distinctio nam. Quis nesciunt tempora error aspernatur quaerat. Sed non in beatae rerum.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(597, 'Est qui nam nihil qui tempora. Et voluptatem voluptates qui velit. Temporibus sed est expedita ut.', 'Ad qui harum explicabo cupiditate et corporis facilis ipsum. Doloremque qui itaque consequatur id dolor voluptatem dignissimos. Velit voluptatibus qui autem.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(598, 'Occaecati doloribus eveniet sint quia. Est voluptatum earum velit debitis dolor voluptatem molestias. Unde commodi quos minus. Recusandae dolores voluptas officia mollitia. Omnis quis ipsum ipsa quia.', 'Ullam corporis sapiente eos ut id ut. Eum laudantium eaque facilis recusandae id. Sint fugit ipsa nihil. Praesentium sunt voluptatum id hic. Et praesentium delectus voluptatibus in consequatur enim.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(599, 'Architecto vero quod et omnis quis quis. Fugiat fugiat error harum aut est odit. Ut quia molestias cumque explicabo cum explicabo.', 'Ducimus possimus sunt et consequatur. Iure non in tenetur qui. Occaecati tempore similique ducimus reprehenderit qui.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(600, 'Placeat quidem placeat aliquam sunt deleniti aut. Consectetur veniam in reiciendis sed. Dolores dicta esse rerum ex sapiente.', 'Rerum iure aliquid voluptatibus in. Et sunt mollitia consequatur dolores. Possimus neque quasi et id excepturi odio ratione. Dicta fugiat culpa culpa omnis cumque.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(601, 'Quos quis sed quis accusantium sed ratione. Hic accusamus quia reiciendis neque quibusdam exercitationem asperiores sit. Voluptatem quas quis fugiat ut aspernatur numquam mollitia.', 'Recusandae sit et animi at est aliquid debitis saepe. Expedita odio et ducimus qui velit eius. Non incidunt sed ratione sapiente sequi. Optio ea ea est blanditiis.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(602, 'Et non dolores exercitationem officia. Est neque fuga voluptas quos. Et aut ducimus et rerum doloribus numquam voluptatem nostrum. Quo illo a nesciunt voluptate consequuntur non. In sed ducimus nihil quo illo. Dolores dolor enim quis temporibus.', 'Id nam sint non autem repellat officia fugiat eligendi. Suscipit nihil repellat beatae itaque laborum. Impedit fuga harum perspiciatis non. Aut et numquam quaerat aut.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(603, 'Illo eius deleniti assumenda. Magnam beatae eos porro aut animi commodi. Officia odio ut in iste.', 'Velit saepe itaque error non debitis officia. Placeat autem odit corrupti. Maiores voluptatem itaque dolorum.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(604, 'Minus id porro illum eveniet eveniet modi ex. Tempora eum recusandae quaerat asperiores. Aut cumque molestiae ut dolores nemo omnis. Inventore molestias ad qui.', 'Quo quia aut dolores qui eveniet eos a. Ea illum et dolores voluptas. Quas rerum tempore voluptate placeat nam quo et.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(605, 'Laudantium vel quibusdam molestiae et aut quo eligendi enim. Sunt nemo et officia saepe soluta. Qui rerum et non. Et minus necessitatibus quas cupiditate est.', 'Eveniet sapiente fugit accusantium officiis aut nam ut. Consequatur quo eaque voluptatem exercitationem excepturi alias. Voluptatem iste qui expedita odit animi.', '2021-11-20 14:48:08', '2021-11-20 14:48:08');

-- --------------------------------------------------------

--
-- Structure de la table `modeles_factures`
--

CREATE TABLE `modeles_factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modeles_factures`
--

INSERT INTO `modeles_factures` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(1, 'Voluptatem dolores dolorum incidunt quo iure provident quia. Mollitia consequatur nam nulla sit est at odio. Quia beatae et asperiores voluptatem molestiae non magni.', 'Quia ut qui eum et aut corrupti. Occaecati sint modi reiciendis deleniti. Molestias dolor et qui in nisi voluptas.', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(2, 'Alias eos accusamus perferendis cupiditate ut nihil quo. Voluptates veritatis adipisci exercitationem eum tenetur deleniti et. Error ex excepturi officia. Magni culpa dolor et sit nihil numquam.', 'Aperiam porro laborum eligendi dolor. Non quas et sunt fugit expedita quia. Illo fugit sit tempore beatae rerum labore sint sunt.', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(3, 'Illum omnis consequuntur occaecati non voluptatem modi a. Quia doloribus a architecto sequi vel velit. Nihil nostrum quam molestiae. Voluptatem placeat velit hic. Natus excepturi dolorem voluptatem voluptatem qui maiores.', 'Voluptatem nulla quod officia. Aut qui similique cum quia. Optio sequi perferendis repudiandae iste in ut. Non illum enim doloribus sint.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(4, 'Maiores dolores magni quo repellendus eum quas dolorem aliquam. Aut earum libero voluptatem qui culpa labore iusto tempore. Quam laudantium ipsa porro eligendi dicta. Dolorem officiis molestiae aperiam ipsum et.', 'Autem est et praesentium omnis. Animi et error id. Et dolores sit enim necessitatibus. Est incidunt cum accusamus hic.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(5, 'Facilis ut et a consequatur modi recusandae. Cum et ut rerum asperiores at eum molestiae. Quidem corrupti aut ipsum molestiae omnis. Reiciendis sint porro aliquam enim adipisci.', 'Modi est natus officiis voluptas amet dolor. Quia tempora odit dolorem eveniet. Nam placeat aperiam maxime eveniet tempore eligendi.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(6, 'Molestias earum incidunt sint eaque error et. Quidem molestias beatae omnis totam similique praesentium error. Ab laborum et officiis.', 'Ut quasi nobis reprehenderit aspernatur. Ab beatae quam illum voluptas exercitationem amet.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(7, 'Suscipit numquam consequatur ipsam laborum aut nam. Numquam id vitae sapiente voluptas esse aut. Rerum esse tenetur quisquam aut enim omnis aut. Esse qui voluptas et eum quasi cupiditate.', 'Recusandae quibusdam perferendis esse. Officia rerum exercitationem dolores aut. Temporibus animi iure corrupti fuga ipsa sit.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(8, 'Ipsa qui molestiae vel dolor sunt. Provident et sit sint velit. Illum eligendi et autem enim qui. Nemo nisi ipsam dicta sed quis maiores qui vitae. Aperiam aut porro voluptatibus ea laboriosam. Excepturi porro et dignissimos consequatur.', 'Et nemo reiciendis quas explicabo molestias. Quisquam cumque placeat esse qui dolorum dolor optio.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(9, 'Laborum molestiae sequi vel maiores quia quasi quasi. Est similique qui suscipit maiores vel. Similique et corrupti saepe sed non. Ullam explicabo in et aut et. Culpa odit culpa ut neque soluta. Qui enim quia sed. Qui sit inventore nemo rerum est.', 'Velit odit inventore eum hic. Minus at at est odit libero modi fuga.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(10, 'Sed autem ipsam sint qui. Expedita ducimus et tempore maiores aut ex est. Dolorem debitis tempora sunt laboriosam. Aut non tempore sapiente delectus sint voluptatem. Ullam nam aliquid voluptatum possimus a eum quisquam.', 'Excepturi et ad aut voluptas enim suscipit. Voluptas sunt placeat ipsum aut accusantium aliquam. Et ipsam est sed inventore doloremque sit quo. Quia iusto nihil at non.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(11, 'Vitae modi illo praesentium autem. Et quam facere a veniam repudiandae omnis eius. Aut voluptatem dolorum voluptatem dolorum sed amet. Velit quaerat qui voluptatem omnis sit esse.', 'Sed eum rerum beatae at quis aut. Veritatis sed et iste aliquid ut magnam dolores. Consectetur facilis hic molestiae quis. Quo voluptatibus optio laudantium iure earum non accusantium.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(12, 'Necessitatibus nemo et perferendis unde qui cum adipisci. Et corporis at voluptas sed facere iusto facere. Molestiae nihil vero nostrum occaecati. In dolores sit impedit eum.', 'Non repellendus dolor provident enim vel possimus. Similique tenetur praesentium est qui quia rem. Eos omnis quasi tempore molestiae ut nisi. Voluptatem quia soluta vel est dignissimos.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(13, 'Error et aliquid dolor et velit exercitationem distinctio. Eum odio autem porro. Enim eos id numquam distinctio est ducimus. Omnis est recusandae nam tempora cupiditate velit sapiente qui. Eligendi labore voluptatem fugit rerum.', 'Voluptas impedit aliquid voluptatem quisquam debitis delectus. Consequatur ab vero voluptatem dolores. Nobis aperiam quo consequatur facere enim impedit. Dicta iste ullam aut a autem ullam.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(14, 'Sed aut et a ipsum necessitatibus. Illum ratione repellendus et dolore consequuntur sunt illo.', 'Temporibus dicta quo vero aut. Exercitationem et eum ipsam quia molestias. Quia non expedita tempora sit molestiae aut quo in. Accusamus quisquam odit doloremque quo fugit.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(15, 'Odit expedita illo sed omnis minus. Libero sed et id quia enim et. Atque doloribus in quia quasi. Unde est ratione vel. Fugit impedit sunt magni qui. Qui laborum reiciendis nostrum omnis nemo earum. Voluptatum pariatur cum expedita ex.', 'Vero iste quae alias enim aut qui. Maxime qui quo est et debitis quia.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(16, 'Error ad rerum exercitationem sit excepturi voluptatem. Veritatis vel dolorum quisquam non. Ut alias ipsum et culpa et magni sed.', 'Rerum maxime atque expedita alias. Debitis saepe qui vitae. Occaecati doloribus quae laborum incidunt velit sint et.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(17, 'Similique tempora animi reprehenderit culpa. Et ratione eligendi commodi. Doloribus praesentium libero neque similique quia est. Commodi alias ut illo hic qui. Ut in qui iure vel sit.', 'Dolorum omnis beatae voluptatem repudiandae ut doloribus. Recusandae a optio temporibus molestiae. A qui commodi sed. Sit incidunt quas similique dicta quod.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(18, 'Aspernatur porro aut fugiat ipsum asperiores quam corrupti. Veritatis quasi nobis ea vel quis perferendis molestiae. Est excepturi et non hic.', 'Optio numquam amet est. Fugit et modi est omnis tenetur sequi. Ut accusamus autem consequuntur beatae vel magni. Fugit totam sed et nam ab officiis itaque.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(19, 'Molestiae ipsa vel et voluptatibus repudiandae quibusdam maiores ex. Cum nihil quisquam velit omnis. Aliquam eum laboriosam unde reprehenderit ut et.', 'Consequatur expedita provident non soluta. Labore consequuntur fugit qui est voluptas et. Est rem provident quidem in expedita ut.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(20, 'Vel quod accusamus blanditiis sed nesciunt et harum. Modi maxime ut eos culpa soluta et velit enim. Nemo pariatur omnis odit fugiat voluptas ullam at incidunt. Nesciunt temporibus quia facilis dignissimos.', 'Est in voluptas et molestiae. Tempore ipsa quasi atque voluptate ipsam. A hic necessitatibus sapiente quasi qui magni ullam.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(21, 'Et non exercitationem repudiandae minus in eos. Hic corrupti possimus maxime dicta dolor voluptas. Eos eos distinctio et enim sunt quia debitis.', 'Porro et excepturi quasi pariatur enim totam cupiditate voluptatem. Est voluptatem non sequi laboriosam. Ut soluta ad fuga voluptatem.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(22, 'Eius quo eligendi reprehenderit nam similique omnis. Magni quis vel aut labore quasi culpa. Qui debitis voluptate nesciunt minus quo quia. Odio nisi blanditiis sed inventore architecto.', 'Voluptatem sint quis voluptas voluptas et voluptatibus consequatur et. Nemo architecto unde aperiam.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(23, 'Doloremque dicta et ut consequatur in. Ut molestias tempora sed error voluptatibus. Officiis impedit rem ipsum laborum velit molestias. Aspernatur mollitia architecto error delectus.', 'Neque et libero et fugiat cumque repellat reiciendis. In dolores quibusdam impedit modi est est. Qui quis iusto molestiae corrupti culpa culpa sed et.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(24, 'Numquam laboriosam amet voluptatem odio est enim. Molestiae est ipsa occaecati amet. Quaerat rerum et ut fugit animi. Et laborum quo natus deleniti.', 'Iure voluptas est recusandae nostrum vero. Itaque non eius libero voluptatem. Qui aut esse ut delectus sed.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(25, 'Consequatur reiciendis velit harum error vitae. Consequuntur non in atque nisi. Tempora dolore rem quo quia tempore ducimus est.', 'Qui est asperiores accusantium eaque deleniti exercitationem amet. Qui omnis ab nisi quaerat harum. Pariatur ut corporis incidunt velit maxime. Saepe autem hic aut incidunt molestias.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(26, 'Ut vel necessitatibus excepturi consectetur et assumenda. Aliquam libero maiores accusantium et quidem delectus. Voluptatem neque eaque magnam beatae et unde.', 'Eveniet maiores nemo delectus repudiandae veritatis. Eligendi velit ducimus voluptatem. Repellat quod libero nostrum dolore eveniet. Molestiae omnis rerum eveniet repellat.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(27, 'Sint est a inventore et aut. Qui excepturi voluptatem numquam a delectus illo. Ut laudantium et adipisci.', 'Vero esse eveniet est ea qui omnis. Repudiandae consequatur molestiae deleniti nostrum sit.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(28, 'Recusandae iusto doloribus est est. Exercitationem et nemo facilis unde sit odit cum. Aut deleniti cupiditate quis modi.', 'Laborum voluptates culpa consectetur dolore qui ipsam. Magnam laudantium totam quibusdam non enim. Maiores qui nihil tempore in eum voluptatem nemo eveniet.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(29, 'Sit voluptatibus ullam magni. Qui asperiores nisi sed sit assumenda quas. Voluptatem ipsa dolores voluptates aut. Et molestiae reiciendis in. Est aut labore velit consequuntur exercitationem veniam eveniet.', 'Quod nostrum repellendus laudantium. Et inventore laudantium perferendis repellendus laudantium quo. Id sint esse recusandae accusamus molestiae dolor rerum.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(30, 'Quia ea quia fuga laborum. Tempora impedit quos dolorum sunt. Commodi soluta aliquid hic. Culpa quod assumenda dolorum voluptatem dicta nobis. Fuga rerum qui magnam recusandae cum. Voluptas alias esse eveniet. Omnis velit consequatur sint voluptates.', 'Dolore enim sit perferendis voluptate consequatur. Sed ad doloribus harum ducimus dolores harum unde. Rerum dicta minima accusamus tenetur rem nobis. Voluptatem atque aliquid saepe quas ipsum rerum.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(31, 'Quidem asperiores vel aliquam aut consequuntur. Qui voluptatem delectus debitis incidunt voluptas quis est odit. Nostrum hic possimus esse qui architecto fugit. Quia eaque ea sunt nam deserunt aut.', 'Autem minima quam repudiandae sed ipsa et dolor. Atque reprehenderit voluptatem commodi sit aliquam aperiam. Sit exercitationem fuga voluptatem. Omnis facilis vel tenetur consequuntur.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(32, 'Incidunt minima cumque ut ad facere voluptatum alias. Quidem nihil ut accusamus eos vitae quis quo eos. Vero voluptatem est non sit sunt perferendis incidunt. Aut ipsum et possimus asperiores.', 'Aut dicta et nisi consequuntur aspernatur eos. Deleniti corrupti accusantium sunt et minima non. Et molestiae sunt eos magni. Aliquam voluptates doloribus aperiam aut nesciunt ducimus deleniti.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(33, 'Cum nihil minima qui et mollitia modi laudantium accusantium. Cum nesciunt fugit eius dolor et. Cumque et sit maiores laborum. Ut animi unde asperiores est.', 'Aperiam tenetur distinctio vel quos saepe. Dolorum voluptate dicta nesciunt. Hic quisquam natus et explicabo temporibus expedita omnis recusandae.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(34, 'Perferendis rerum similique nemo sunt temporibus et dolores. Quam ut consectetur excepturi maxime a magni. Reiciendis dolore rerum possimus animi sunt harum eum quo. Rem fugiat et molestias ut quas fuga animi.', 'Similique aut placeat quaerat reiciendis. Expedita voluptatibus quisquam et pariatur ut. Debitis et voluptates nisi facilis voluptatem vero.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(35, 'Aut ullam aperiam necessitatibus sit. Voluptate autem tempore accusantium doloribus enim minima natus. Architecto culpa aut repudiandae qui maxime. Unde et cumque ratione.', 'Esse sed sed laudantium maxime suscipit itaque. Sit tenetur expedita provident eligendi tempore. Eum debitis officiis recusandae veritatis autem a.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(36, 'Magnam est quae modi deleniti hic. Laborum saepe distinctio et atque nisi ut nesciunt. Temporibus sed ipsa asperiores doloribus.', 'Error facilis in excepturi saepe ut. Quo et et ea corrupti et. Nemo culpa ut sint libero libero et quae autem. Est enim et eaque optio itaque qui quis.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(37, 'Nihil porro tempore vel doloremque in. Et numquam aut est ipsam a placeat. Sit dolores commodi voluptatum temporibus et itaque molestiae totam. Cumque velit alias qui quos asperiores quasi. Quia quis eaque blanditiis.', 'Sint et reprehenderit ut consequuntur. Labore soluta sunt odio quidem id tenetur voluptatum. Qui sunt et sint eum culpa in voluptatem.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(38, 'Esse dignissimos quis sed sapiente qui. Maxime ut fugit corrupti repudiandae. Et placeat placeat sed quo. Praesentium id saepe harum quae.', 'Porro quisquam laboriosam ullam necessitatibus omnis saepe eum. Dolores et modi harum eius et iure. Alias et maiores sed illum. Reprehenderit consequatur ad ad ea qui possimus.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(39, 'Quidem consequatur esse voluptatum aut autem. Nemo quas consequatur tempora cumque voluptatem. Maiores reiciendis exercitationem cumque asperiores ipsa. Rerum consectetur provident ut. Ea accusamus non cum enim pariatur.', 'Voluptatem quidem consequatur nulla iure asperiores quibusdam. Atque earum deleniti dignissimos quasi. Nostrum dolores eos cumque non repellendus sed et id.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(40, 'Reiciendis corrupti quaerat eius at est pariatur. Voluptates ut et et reprehenderit vero enim voluptas. Non explicabo at et ex quisquam. Harum repudiandae quis at non laboriosam commodi repudiandae.', 'Dolores dignissimos tempore ut quo natus. Tempora harum et vel. Nulla earum quis voluptate ratione. Dicta neque aliquid rerum eos iusto.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(41, 'Laborum mollitia voluptatem aliquam earum animi. Sequi et recusandae ipsam sapiente. Odit quisquam repellat neque. Nesciunt ut quo asperiores quibusdam.', 'Nihil beatae eos ut tenetur et dicta. Alias fugit voluptatibus rem recusandae ipsa voluptas quia. Ut praesentium nobis facilis ipsa inventore id. Laboriosam a voluptas exercitationem sunt amet nihil.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(42, 'Sit laudantium inventore eaque consectetur excepturi. Voluptatem ut dolore qui molestiae dicta sapiente saepe. Tenetur tempora ducimus et similique sed aut.', 'Debitis quasi sint delectus qui. Error sapiente labore sit molestiae nemo. Molestias magni nisi dolor dolorem ullam omnis.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(43, 'Nobis non culpa consequatur. Officia voluptatem sunt animi ut dolorem consequuntur voluptas animi. Quia eaque velit quisquam architecto voluptatum itaque.', 'Ipsam voluptatem vel mollitia ipsam libero nemo possimus. Commodi neque qui laboriosam fuga natus.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(44, 'Ea et consequatur pariatur commodi illo ipsam. Pariatur rem velit quia quos qui. Laudantium omnis consequatur blanditiis ipsum et.', 'Eius vitae quia commodi voluptatem non sed. Sed id minus ut perspiciatis alias qui suscipit expedita. Odit maxime corrupti et sunt. Quia numquam blanditiis itaque saepe. Ut pariatur odio et quo est.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(45, 'Aut quia incidunt dicta neque dolorum omnis tempora. Delectus quaerat voluptatem quos. Voluptatem voluptatem mollitia non aut velit ut sed veritatis. Quidem quo tenetur id accusantium eius in sint ullam.', 'Optio iure minus et quisquam quo eius dolorum est. Provident animi veritatis maiores eum. Quae incidunt cum quam rerum cum ipsum. Fuga sequi dolorem itaque delectus.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(46, 'Deserunt expedita consequatur atque in ut velit. Accusamus vel illo iusto non eos enim. Alias autem eos velit animi dolor. Eos omnis doloribus ab ut voluptatem.', 'Vel omnis nam eum magnam debitis et voluptatem. Aut itaque sint natus suscipit similique. Itaque sequi molestiae veritatis voluptates aut consequatur omnis.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(47, 'Atque cum voluptatem sunt consequuntur reprehenderit molestiae officia illo. Vitae explicabo modi aspernatur cupiditate modi veritatis suscipit velit. Rem et quidem impedit molestiae consequatur maxime.', 'Enim error id magnam mollitia voluptatem eos. Iste eos qui non qui vel dolor sed. Aut ut aperiam reiciendis totam ullam.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(48, 'Nisi laboriosam aliquam aut est qui. Delectus ipsum maxime ea quae dolor. Iusto explicabo officiis soluta omnis cumque. Id cum fugiat non dolore. Ut qui autem atque natus aut sint accusamus. Ut totam voluptas reiciendis iste velit sit ut.', 'Fugit nihil qui accusantium tenetur. Sit magni quasi unde autem optio rerum architecto. Sit dolor hic ut.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(49, 'Iusto quia qui autem quis dolor commodi. Quasi similique odio incidunt consequatur sit dicta et inventore.', 'Voluptatum modi asperiores itaque et incidunt. Sit et iste vel.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(50, 'Iusto ut qui vel. Placeat tempore veritatis ea. Eligendi dolorem veritatis totam perferendis quis ut neque. Rerum nesciunt quas enim consectetur dolorem minus.', 'Repellat et facilis quis ut omnis voluptatem aperiam. Vel alias sunt quo et. Necessitatibus voluptates nobis provident rerum voluptates et sint magni.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(51, 'In et labore ratione in et omnis. Rem et qui numquam fugit. Soluta sed sequi molestias ea nemo aut asperiores. Similique eos laborum hic beatae ea velit neque reiciendis. Non ab quasi laborum dignissimos. In quas et aperiam.', 'Molestiae est fuga nesciunt sunt. Sit autem voluptas libero a.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(52, 'Aut et corporis fuga est voluptate est. Aut voluptatem ducimus quis vero. Ut at aut modi dolor aut dolor necessitatibus velit. Totam est sequi sed dolor et ea. Distinctio et expedita consectetur. Quibusdam esse libero voluptatem sit nemo accusamus.', 'Illo eveniet id officia totam. Soluta molestiae et accusamus maxime dicta tempora voluptate. Illo quia laborum aliquam illo. Culpa nam laborum et.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(53, 'Libero eos ea tempora et consectetur aut voluptatem. Excepturi eum molestiae quo aut et.', 'Ut nostrum enim modi. Deleniti exercitationem aut quos quo exercitationem qui. Aut quibusdam sed maiores qui vero facere.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(54, 'Sequi quidem consequatur ipsum sit ut expedita ratione. Dolores ut repellat consequatur deserunt quidem totam ut vel. Magni qui qui optio ut. Quidem ad culpa quia velit illum maiores.', 'Et accusantium qui corporis. Laborum ab id impedit odio. Ex animi laudantium et aut optio.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(55, 'Voluptatum fuga ex labore porro quia. Iste dolores similique nesciunt omnis saepe possimus. Autem dicta magni quaerat eligendi exercitationem iusto minima.', 'Sed nemo libero enim aut reiciendis nemo est. Sit placeat ut unde eos corrupti tenetur. Ducimus omnis quo quo repellendus dolore cum.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(56, 'Quis odit voluptate et laborum rem minima. Magni aut reiciendis voluptatem optio odio. Consequuntur id eum molestiae. Provident ut voluptas in non et quas.', 'Placeat vitae accusamus praesentium autem. Id voluptatem velit fugit eligendi rerum aut sint. Sunt aperiam eos quidem aut aspernatur.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(57, 'Veritatis ut tempore ducimus. Ut nemo error impedit excepturi id ea. Ab ut inventore quo blanditiis. Dolorem sapiente aut rerum et.', 'Natus perspiciatis quod vitae esse. Fugit quod consequatur ut velit id. Atque accusamus quae est necessitatibus unde. Soluta sit laborum amet soluta repellat magnam. Dolor molestiae ut perspiciatis.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(58, 'Sed ratione tenetur rerum possimus. Quis cupiditate et placeat aperiam aut unde.', 'Qui ut et est aperiam. Similique repellendus ipsum ratione quis vitae. Accusantium tenetur est aperiam eum quos sapiente.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(59, 'Ut doloribus omnis qui nihil vitae iusto qui. Eum aliquid placeat sed nihil voluptatem. Possimus et ut consequatur veniam.', 'Aut quia maxime natus ducimus at ex id. Eligendi tempore aut placeat quae rerum aut culpa. Aut iusto dolorem cupiditate sit occaecati voluptatem laborum.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(60, 'Ut quo ut beatae repudiandae minus modi omnis. Et possimus officia enim qui soluta voluptate odio. Et debitis ipsam eos alias. Pariatur cum dolor assumenda asperiores. Voluptate ea autem temporibus. Sunt earum qui cum.', 'Est est voluptatem consequatur culpa excepturi non. Expedita nulla dolore nemo reprehenderit ratione sed eos. Ea ipsam et est doloremque vel ut autem. Laudantium rerum earum est provident libero.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(61, 'Et minima delectus eos et rerum ipsa. Eius repudiandae in laborum sunt aut atque. Corrupti magni nisi temporibus dolor voluptas.', 'Et ut eos et praesentium quo. Eos magnam sequi ullam reiciendis.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(62, 'Error alias soluta debitis aut et. Voluptatem natus eius incidunt sed aut quis. Voluptatum nihil dignissimos nam amet voluptas.', 'Ut id libero illum sit quisquam. Autem magni eum consequatur ratione consequuntur quae facilis suscipit. Et perspiciatis et perferendis consequatur fugiat ullam accusamus perferendis.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(63, 'Quia et dolor qui dolor repellendus rerum commodi. Aspernatur praesentium eius provident et sed est. Vitae aut velit voluptatem sed et similique. Voluptas rem non et nam sint vero tempora debitis.', 'Debitis optio nihil consectetur ipsum molestias. Non quis rem dolorem voluptatem eligendi culpa. Eius distinctio dolor repellendus enim assumenda.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(64, 'Possimus hic earum impedit non sapiente delectus tenetur. Praesentium ipsum provident et vero quia aspernatur asperiores. Mollitia inventore nobis alias enim. Ullam voluptatem placeat qui ex ullam qui porro.', 'Consequatur in omnis hic a magni dolor. Labore voluptatem hic similique consequatur aut quam. Iure deleniti voluptatem saepe omnis nihil et necessitatibus.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(65, 'Architecto nihil incidunt praesentium dolore officiis atque. Animi voluptates et quisquam quis sunt error officiis. Ipsa voluptatem ullam qui dolorem ducimus voluptatem.', 'Itaque hic voluptas asperiores fuga dicta sed molestias. At exercitationem est veritatis deleniti dolorem debitis. Cum ut maiores molestiae ut neque dicta.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(66, 'Reprehenderit est et et expedita. Quia ipsum sequi aut eos occaecati voluptas. Possimus labore eveniet cum ea. Beatae ea in qui mollitia ratione temporibus dignissimos. Libero perspiciatis amet magni dolorum.', 'Ipsum placeat quo aliquid alias corporis nesciunt facere. Voluptatibus veritatis cumque dolores sit commodi omnis. Nemo ullam veritatis quia facere labore et et.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(67, 'Sit error repellendus ut aut cum consequatur eius. Maxime ipsum consequatur dicta. Delectus voluptates voluptatum repellendus dolor iste quis et. Praesentium ipsum et et non qui.', 'Et dolore quaerat aut et occaecati quia. Soluta adipisci voluptatem iure iusto officia. Placeat et eos rem. Voluptatum et rem id est perferendis.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(68, 'Ratione ab qui eos aliquam dolorem dolore unde. Expedita magni quia et eos et commodi officia. Nostrum omnis aut ea. Quos rerum quo suscipit est eum suscipit.', 'Dicta ratione cumque et unde tenetur quaerat. Libero iste reprehenderit eius facilis. Ut itaque voluptatem veritatis nesciunt neque quis quos. Repellendus debitis optio ullam ut.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(69, 'Et dolorem animi architecto corrupti. Et et inventore eveniet fuga voluptatem. Quaerat iste ea minus libero. Fugit laboriosam corrupti ut qui. Est voluptatibus ut quas optio in neque hic ut.', 'Ut placeat cum libero id. Vel ut nemo repudiandae cumque dolor modi. Nobis aut deserunt eos est pariatur iusto.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(70, 'Et beatae et et. Tempore inventore possimus et necessitatibus sequi ipsam. Quam ipsum ipsam et aut officia placeat. Est dolorem incidunt doloremque nobis. Voluptatum et earum provident voluptas aut aut ex. Quasi rerum molestiae eum dolor.', 'Similique asperiores est tenetur enim qui et nobis ut. Ut sunt quis voluptas voluptates accusantium dicta laborum. Rem modi atque dolores esse id explicabo.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(71, 'Et expedita qui ut quod ea. Numquam libero perferendis aut suscipit. Ut illo quibusdam quisquam qui quo distinctio. Delectus aspernatur possimus qui voluptas natus.', 'In at earum sunt quo. Officiis laboriosam ipsa facilis occaecati fugiat placeat enim. Reprehenderit voluptas eaque sit maxime rerum. Velit eaque et illum harum soluta dicta nihil.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(72, 'Repellat et ea alias aut neque. Similique aut et fugit voluptatum. Minus quisquam facilis et molestiae ea ex. Omnis harum ipsam vitae ut sit voluptas minus quisquam.', 'Facilis itaque cumque et laborum voluptas esse sed enim. Aspernatur blanditiis voluptates autem cupiditate. Corporis laboriosam aliquid sit velit consequuntur officia.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(73, 'Consequatur reprehenderit corrupti nam asperiores ut hic. Tenetur quia in ipsum sapiente est. Nemo quibusdam ipsam sapiente impedit veritatis asperiores fugit. Amet qui quae doloribus voluptatem ratione.', 'Autem quia numquam id eum. In voluptatem eum labore beatae et fuga minus. Aut quod est voluptas pariatur quaerat nulla. Quia et quidem nostrum asperiores. Fugit voluptas esse temporibus doloribus.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(74, 'Eos neque similique iusto. Mollitia necessitatibus iusto deleniti distinctio. Voluptas at voluptatem deserunt quo velit consequuntur quos.', 'Ut velit qui dolor aut eum voluptatum. Vel neque veritatis deleniti porro est. Autem architecto dolores eaque. Ut eos mollitia dolorum quia est laboriosam qui provident.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(75, 'Eos non voluptas accusamus eius. Ut at perferendis eos rerum sint amet in. Qui culpa ut odit sit autem et molestiae.', 'Ut tenetur vitae dolorum id. Suscipit quasi cumque impedit omnis ea. Eaque doloremque aspernatur repudiandae. Eligendi assumenda et ut in et illo saepe.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(76, 'Voluptas qui nam eum consequatur tenetur quod. Fugiat molestias et quidem atque quia ut. Ex adipisci animi dolorem repudiandae. Culpa corrupti nostrum illo aspernatur numquam optio.', 'Sed ut optio est ipsa ea fugit asperiores. Eum nulla blanditiis laboriosam voluptatum voluptatem architecto.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(77, 'Omnis expedita dicta magnam quidem corrupti quas et. Ipsam est quas molestiae et quasi. Aut reprehenderit quaerat aut et. Ut vel nam fugit dolor dolor id.', 'Repellendus placeat fugit eius sed. Molestias quasi sed harum. Cupiditate ipsam reprehenderit tenetur asperiores.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(78, 'Iure mollitia adipisci sed. Provident omnis blanditiis fugiat magni temporibus. Ut praesentium optio iure quibusdam inventore quos. Ipsam exercitationem qui nihil minus. Aliquam illo ex fuga.', 'Earum reprehenderit sunt molestiae maiores. Porro sed facilis non quod laboriosam voluptate iste laborum. Sed adipisci commodi expedita.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(79, 'Natus et voluptatem eligendi omnis sed corrupti et. Consequatur error sed quibusdam iure quia consequuntur et.', 'Molestiae id sit dolor. Est quisquam eos reprehenderit adipisci. Natus doloribus magnam eaque. Quis ipsa minima repellendus ut amet quas temporibus. Asperiores soluta nisi tenetur ratione.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(80, 'Officiis non sunt ut sint. Labore enim et non. Earum voluptatibus quod vitae nihil deserunt.', 'Minima eum vero repellendus natus qui ut nihil. Magnam dolores quidem officiis cumque magni architecto atque. Qui esse ut modi ea fugit quos.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(81, 'Odit est sed voluptates rem magnam sint. Voluptas numquam quam est fugiat. Iure amet quisquam aut tempora fugit. Beatae recusandae quaerat tenetur qui ducimus. Officiis harum consectetur veritatis dolorem sapiente. Illum consequuntur autem nemo eos.', 'Ratione quae eligendi eum beatae sit nulla voluptas nobis. Velit omnis et iusto nihil a quod nam. Doloribus qui eos ullam ut accusantium. Enim natus fugit laborum. Aut nam eos qui nobis.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(82, 'Assumenda voluptates explicabo quidem accusantium. Impedit magni occaecati qui ducimus ab nihil nobis. Velit et sit corrupti voluptatem. Et non iure quia enim nostrum a qui. Animi iusto eum perspiciatis quibusdam laborum placeat.', 'Soluta voluptatem quod architecto eos nulla illum at. Et eos possimus cumque vel sed. Magni nostrum vitae qui enim est nihil adipisci.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(83, 'Est est aut recusandae et laboriosam iste. Nesciunt vero repudiandae at sint iure fugiat ut. Provident velit et possimus distinctio quae. Ducimus dolore maxime at autem laudantium aut natus.', 'Fugiat alias qui culpa. Assumenda sit quidem impedit. Ut aut rerum ducimus. Quia nulla omnis illum est dolorum rem sint.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(84, 'Architecto aut quisquam dolorum eum aut. Quidem a quibusdam molestiae quas recusandae quos. Sunt neque sit sapiente est maxime nesciunt excepturi.', 'Ut suscipit nesciunt odit minus. Dolorem est ipsa aspernatur repellendus. Quo necessitatibus unde magnam voluptatem dolorem.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(85, 'Delectus ad molestias est inventore. Sed praesentium molestias quam est. Sed deleniti ea ut quam illo. Recusandae ab voluptatum tempora quasi non. Aut quisquam tenetur inventore perspiciatis atque explicabo nisi. Necessitatibus aut aut ut facere nostrum.', 'Ipsum distinctio fugit nobis neque debitis nam dolore. Omnis non blanditiis excepturi cupiditate neque atque provident. Voluptatum ut accusantium et inventore.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(86, 'Nemo illum inventore cumque harum est. Molestiae quas deserunt ut eos. Est sint et odit qui necessitatibus recusandae.', 'Id eos temporibus amet architecto sunt. Dolor totam omnis eum ipsa aliquam sit. Velit nisi eum distinctio.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(87, 'Nisi dolore enim quis consequatur aut rerum cumque. Eligendi aut minima tenetur perspiciatis ducimus reiciendis. Iusto nesciunt in quis. Nesciunt natus officia ut iure porro.', 'Iusto sed cum aut a voluptates eos ut. Ut et commodi quae ut qui debitis perferendis. Et velit voluptatibus ipsum repellat sed et sunt. Commodi explicabo atque exercitationem qui.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(88, 'Voluptatem iste est maxime tempora. Ut ex eum aut. Ad nam cupiditate sed. Blanditiis accusantium nemo iure suscipit fuga sunt.', 'Et magnam voluptatum nobis dolor quibusdam. Et laborum distinctio earum incidunt dolores quod. Et earum ut laudantium dolorem fuga. Ea in incidunt necessitatibus incidunt facilis nostrum rerum.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(89, 'Odit unde consequatur quas quis eum inventore distinctio accusamus. Fugiat ullam ut sequi ipsam. Et voluptate est ut in hic ut aut.', 'Placeat quam eius architecto perferendis ad. Voluptatibus saepe commodi quo cum optio. Possimus consequatur porro earum reprehenderit molestiae.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(90, 'Et rem esse at provident aperiam temporibus sed. Quo autem at dolor id labore rerum.', 'Quia hic nam nemo accusamus. Dolore sed veniam autem recusandae.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(91, 'Dolores minima ut sequi rerum. Aut illum sunt ut nobis est ut recusandae. Illo non omnis recusandae.', 'Esse quidem omnis corrupti voluptatibus quo aut. Ducimus ut sint repellendus. Sunt repudiandae sint eos et dolor.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(92, 'Aut maxime ad impedit nobis quaerat placeat culpa. Quas ducimus beatae qui atque molestias quis optio. Aut est ea et veniam cumque earum nemo.', 'Facilis modi deserunt beatae debitis aut quaerat. Optio quia iure accusamus iusto aut et. Occaecati molestias voluptatum voluptas dolorem qui in. Voluptas et ut ducimus et.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(93, 'Ea et earum rerum dolorem dicta excepturi ut. Ratione officiis accusantium quibusdam qui eligendi sed est. Quidem corrupti cumque quas vel ullam sed aliquid. Quod a non repellat. Quod et molestias in. Consequuntur aut aut dolor.', 'Minus magni quisquam dolore quo. Nisi mollitia perspiciatis sequi magni. Temporibus maiores voluptatem nobis. In voluptatum libero quis natus.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(94, 'Facilis enim et cum voluptates non velit id. Sed aliquam quam et debitis accusamus. Id aperiam debitis eum non sequi. Occaecati numquam quas dolorem delectus eum et. Mollitia error quo vel qui eos.', 'Aperiam repellendus sunt quo enim ea quia. Repudiandae exercitationem qui ducimus sequi. Voluptate ducimus quia quo dolores qui. Vitae enim et voluptas tempore deleniti eum et ut.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(95, 'Voluptatibus et ut illo fugit eum non illo. Dolore dolores voluptatem quidem assumenda qui necessitatibus illum. Ex et velit impedit quae. Qui magni enim harum exercitationem eos saepe.', 'Aut possimus dolorum rerum perferendis sunt omnis. Recusandae aut id atque qui. A et amet velit et quia.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(96, 'Ducimus mollitia qui aut omnis totam explicabo. Et sed et tempora laboriosam vel. Autem id et expedita et cupiditate incidunt.', 'Ipsa qui quaerat veniam veritatis. Quod sint harum et similique. Molestiae debitis similique voluptatem sunt adipisci quo veniam. Ut in eaque distinctio debitis molestias vero reprehenderit.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(97, 'At adipisci excepturi mollitia quasi dicta neque. Autem molestias vitae minus amet. Cum consequuntur deserunt minima veritatis voluptates nesciunt. Qui eum doloribus consequatur doloremque et nemo est qui.', 'Dignissimos ut vero omnis labore quod soluta. Magni atque non vero sint aut modi velit. Et eligendi officiis aperiam ab quaerat laudantium fugit. Quo tempore labore eum illum.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(98, 'Officia reiciendis provident et officiis commodi id et. Fugit laudantium nemo numquam est. Et aliquid quis voluptas sed. Sunt reprehenderit deleniti occaecati.', 'Animi voluptatum distinctio impedit est vitae molestiae doloribus nulla. Quia autem asperiores fuga quod doloribus. Ut fuga iure qui blanditiis at. Soluta tempora accusamus sint quia atque quas hic.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(99, 'Minima ullam qui qui. Possimus dolores dignissimos ipsa laboriosam perferendis. Aut illo et mollitia ut. Sit et et ex vero nulla rem nam. Molestiae adipisci nostrum nihil. Alias vitae minima ut sed vero. Ad odio eos est.', 'Fugit qui sed et harum numquam voluptas. Dolor numquam sit enim vel. Et aut voluptate earum repellat voluptatibus velit ipsum. Labore aut quos illum reiciendis.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(100, 'Eum sunt eligendi et itaque est. Natus soluta voluptatibus blanditiis vero. Ipsa corporis molestiae tempore. Beatae porro impedit qui occaecati mollitia.', 'Sunt consectetur aut ut id excepturi labore aut. Aut quam molestias ab non nulla magni et sit. Aut quaerat voluptas rerum odio labore expedita dignissimos. Est quae dolore velit provident.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(101, 'Harum voluptatem ea voluptates aut aut quo. Cum placeat laboriosam vel et rerum aut similique debitis. Corrupti beatae eveniet fugiat accusamus.', 'Excepturi voluptatem excepturi earum autem quo voluptas odio. Repudiandae cum ea qui explicabo deleniti beatae maxime. Vero eos rerum ut in.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(102, 'Esse voluptatem et quod rerum pariatur. Autem ea deleniti eligendi. Id sit aut sapiente eum. Quod nobis provident ullam omnis explicabo. Modi voluptatem consequuntur ab facilis.', 'Aut veniam fuga commodi eaque est cumque libero repudiandae. Inventore doloremque molestias quisquam quibusdam id. Officiis blanditiis est consequuntur.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(103, 'Qui aut aliquam maxime temporibus amet expedita. Soluta minima natus necessitatibus aut necessitatibus et accusantium. Quas possimus aspernatur culpa autem libero iure. Odit sint sit fuga veritatis voluptatibus quam.', 'Et nostrum nisi tempore voluptate magnam numquam. Et tenetur sed ex unde vero beatae. Inventore ratione veniam est.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(104, 'Sit quo quae aliquid qui iste eum et. Iure delectus consectetur voluptas dolore sed possimus. In ex quis sit modi minus.', 'Et porro aut ut quia omnis placeat officiis ex. Eveniet ut consequuntur sint nulla sit hic. Eveniet consequatur quidem totam.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(105, 'Eligendi voluptatem laborum expedita non qui optio. A fuga non qui possimus autem optio dolorem. Dolorem reiciendis officiis accusantium illo.', 'Optio dignissimos ut iste. Dolores nihil officiis reiciendis quis nobis saepe.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(106, 'Quaerat cum dicta placeat sapiente eum nostrum sit quis. In suscipit veritatis tempora. Molestiae cupiditate delectus omnis voluptas.', 'Et quod sed neque. Quaerat sed voluptas autem et. Quibusdam alias dolor praesentium. Odit mollitia qui qui cupiditate reprehenderit.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(107, 'Accusamus et aut odio facere voluptate. Qui qui eligendi nihil quo consequatur. Alias qui consequatur reprehenderit.', 'Neque ipsum officia tenetur ut nisi dolor est. Praesentium maiores soluta dolor dolorum qui facere qui. Recusandae fugiat sint voluptas sit. Distinctio dicta ea rerum in incidunt.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(108, 'Ratione sit dolore voluptate soluta enim accusamus. Voluptatem cupiditate facere repellendus iure dolor. Sit nihil nulla delectus nisi.', 'Odio illo voluptatem sed. Magnam qui magni repudiandae illo sequi illo eaque. Necessitatibus consequatur quam ut qui fugiat consequatur sapiente. Ab sit voluptas error cum sit autem odit minima.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(109, 'Dolorum quidem maxime aut quia eius laboriosam dolores voluptatem. Consequatur voluptas consequuntur tempora voluptatum. Doloribus quae sequi qui exercitationem cumque.', 'Accusamus sint nesciunt et voluptates. Facere exercitationem ad dolorem architecto in eius incidunt. Aut perspiciatis rerum consequatur non nostrum.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(110, 'Dicta sequi rem officiis aut qui. Dolor ea numquam doloremque commodi sed saepe aliquid odit. Perspiciatis enim tenetur et recusandae velit cumque libero. Nesciunt et et ut voluptates qui.', 'Natus qui deserunt ex. Mollitia eum rerum debitis neque nostrum. Eveniet et ipsa debitis sit illum laborum amet.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(111, 'Dolores animi esse vel omnis accusamus. Rerum ut fugiat qui omnis quis. Eos dicta voluptas omnis voluptatem laudantium quae et quos. Debitis eos officia numquam in unde et.', 'Odio amet necessitatibus nemo consequuntur ullam corrupti sed. Ex sed in reiciendis.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(112, 'Ea quidem minus molestiae. Vero odit aut nam hic consectetur est enim sunt. Illum eum voluptas ut quidem deserunt.', 'Molestias sit expedita ipsam ut. Sit ullam velit repellat at. Explicabo corrupti fugit consequatur cumque velit.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(113, 'Vero error in distinctio eos. Repudiandae nihil rem quibusdam. Doloremque occaecati ea fuga quidem adipisci explicabo. Et pariatur dolores vero et aut esse et quis. Accusamus ea eius quibusdam eius non qui recusandae.', 'Voluptatem cum quis aut quia. Sapiente hic est non et animi alias provident aut. Quasi qui voluptatem non aperiam suscipit. Rerum dolores et odio aut. Fuga cumque excepturi sit.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(114, 'Nihil qui et tempora. Blanditiis quis et suscipit ut et nobis. Dolore rem dolor nam sit distinctio. Molestiae eos excepturi aut cum assumenda sit nemo.', 'Adipisci molestiae aut soluta fugiat enim culpa recusandae. Qui ut facilis eveniet qui. Voluptatem placeat ducimus consequatur voluptas et enim illo.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(115, 'Voluptas dicta repudiandae occaecati adipisci iste ipsum. Voluptas unde temporibus deserunt corporis. Vel molestiae voluptatem ad non beatae. Architecto velit aut voluptate dolorem deserunt.', 'Repellendus cupiditate enim voluptas consectetur. Molestiae id impedit debitis voluptate nesciunt sint. Aliquam inventore doloribus autem. Laudantium eligendi rerum sequi officia.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(116, 'Atque sunt eum nostrum officiis aliquam eum sed dolorem. Quas rerum doloribus unde suscipit officiis ipsum. A ex magnam nam velit modi iste.', 'Doloremque reprehenderit voluptate harum. Consequatur illo dolores aut et eaque. Culpa ea maxime molestiae laudantium. Corrupti molestias quibusdam cupiditate sunt fuga consectetur dolorem.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(117, 'Suscipit earum labore voluptatum iusto consequatur explicabo voluptate reiciendis. Modi cum ipsum esse saepe nostrum voluptatem ad aut. Aut officia corporis consectetur voluptatem quis quod nemo.', 'Corrupti amet et ratione dolorem sed ut. Libero est reiciendis nobis blanditiis.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(118, 'Dolorem aut aspernatur sequi distinctio rem fugiat magni praesentium. Officia amet minima omnis est. Dolorum natus vero explicabo inventore ratione perferendis. Et repudiandae et unde nostrum et dignissimos.', 'Facilis inventore accusamus laudantium velit qui. Aspernatur sit sit sunt non repudiandae molestias. Voluptatum ea blanditiis veritatis nemo.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(119, 'Porro optio molestiae rerum sit voluptatum iusto tempore voluptates. Quia sint aut sit vel facilis est blanditiis. Nihil eligendi commodi quas quo fuga. Eum modi vitae maiores eligendi perspiciatis dolor minima.', 'Ab quia incidunt est explicabo officia provident. Aut cumque vel delectus quis nisi. Facere explicabo dolor quibusdam rerum.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(120, 'Temporibus saepe hic doloribus autem et et reiciendis. Non voluptatem veritatis atque qui perferendis adipisci. Quia explicabo consequatur fuga voluptatem. Modi magni dolorem nesciunt dolorum omnis.', 'Ratione culpa omnis enim tenetur ipsam rerum assumenda. Quibusdam ipsum qui dolore consequatur pariatur. Facilis et ab voluptas iure commodi repellat consectetur.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(121, 'Ut deleniti iure ullam id. Et aut ipsum doloribus omnis corrupti quibusdam culpa. Aut qui nihil consectetur molestiae perspiciatis.', 'Tempora et ad nisi consequatur. Aut sit ratione voluptatem commodi dolorum qui suscipit. Qui aut molestiae eos ab.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(122, 'Id earum iusto dolorum. Id delectus est incidunt sint non eum saepe eos. Voluptatem voluptates ut sed quo non totam numquam.', 'Odio expedita illo tempore deleniti qui incidunt nesciunt. Culpa consequatur facere qui distinctio laboriosam. Quisquam velit in quam et est et et. Ullam voluptatem animi voluptatem officia nemo.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(123, 'Molestiae facere itaque est aut libero. Expedita iusto quasi ut voluptate. Eum sit omnis ea occaecati.', 'Voluptate similique ut delectus sed sequi. Non blanditiis harum blanditiis voluptate error. Perspiciatis nesciunt voluptas cupiditate iusto odit veritatis rem.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(124, 'Porro id ab similique corporis maxime dicta et praesentium. Officia excepturi aut sed nisi quidem rerum pariatur et. Autem alias aut eveniet ratione delectus quod cumque necessitatibus.', 'Adipisci id molestiae et modi. Aut praesentium sit ab est atque minus qui. Quam eaque rerum quasi non illum enim iusto.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(125, 'Et accusantium consequuntur et nemo. Voluptas officiis sunt porro ab et. Nesciunt voluptas temporibus fugiat ut rerum quibusdam est.', 'Enim unde velit nemo. Qui pariatur temporibus nesciunt doloremque aut cum ab. Dolorem commodi maxime quia necessitatibus libero nihil occaecati. Impedit id quia inventore.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(126, 'Ad ad voluptatem libero et distinctio occaecati quos non. Earum mollitia dignissimos exercitationem libero dolor velit animi. Dolor est dolores qui tempore qui.', 'Et ut expedita repudiandae recusandae eum labore eum deserunt. Dolorem minima sit optio culpa. Omnis et veritatis laboriosam aspernatur consequatur et incidunt. Qui quaerat sed quibusdam quis.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(127, 'Eum magnam tempora dolorem et. Est sit tempore in sapiente rerum et blanditiis. Velit consequatur vel magni esse vero quos. Ea natus facilis molestiae aut est dolorum ipsa.', 'Officia et ut et omnis fugiat. Occaecati sunt debitis beatae voluptatem veniam accusamus. Sint blanditiis saepe saepe aliquam id pariatur.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(128, 'Et earum quod consequatur. Dolor natus sed aut. Voluptates aspernatur in sunt nam.', 'Et repudiandae rem ut. Quia sapiente temporibus voluptas ut et doloribus. Laudantium quia sit aliquam qui natus beatae temporibus dignissimos. Consectetur unde explicabo fugit qui voluptas labore.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(129, 'Ut sint at tempora debitis accusantium nemo. Repellat perspiciatis voluptas excepturi earum rerum. Sunt libero ipsa iusto voluptatem.', 'Aliquam qui occaecati ut et modi suscipit voluptatem. Consequatur non aliquam quia eligendi qui corporis. Qui cumque quidem aperiam iusto labore veritatis.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(130, 'Et quia consequatur consequatur eveniet. Nihil est facilis aut id perspiciatis. Exercitationem vero vero vel quos autem consectetur consequatur. Corporis beatae eveniet natus consectetur.', 'Est placeat beatae dolor sint ratione magni. Nisi fuga soluta fugit pariatur. Aut cupiditate est ullam exercitationem ex. Qui qui explicabo iusto quia qui autem.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(131, 'Repellat laborum nisi corporis nostrum aut magnam. Non illo quas fugit voluptatem error vel cum. Dolore cupiditate assumenda omnis mollitia quibusdam exercitationem. Provident voluptate mollitia ut illo quia est exercitationem.', 'Ut aperiam libero nobis reiciendis qui et. Quis qui ut architecto minus nihil. Placeat voluptatibus delectus iure dolores blanditiis autem earum.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(132, 'Laudantium laudantium aut et suscipit qui ullam omnis. Dolor dicta est quis reprehenderit quam. Quas distinctio cupiditate culpa inventore laborum corporis eius voluptatem.', 'Esse sed occaecati laborum hic ut debitis ipsum. Aut aspernatur voluptatem sint praesentium ut nisi hic. Iusto est aspernatur enim eius. Nesciunt vel nisi dolorem dolor cupiditate qui.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(133, 'Provident rerum quis animi velit. Voluptas quaerat fugiat eius repellendus qui. Autem laudantium quia impedit omnis.', 'Ut nihil aliquam vel inventore sit consequatur. Autem necessitatibus ad dignissimos suscipit qui et repudiandae consequuntur. Beatae esse eum quia qui. Commodi sint aut vel aut et illo quos.', '2021-11-20 14:47:34', '2021-11-20 14:47:34');
INSERT INTO `modeles_factures` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(134, 'Voluptas saepe odit et autem tempora. Amet nobis cumque illo. Quis esse et quae molestias quaerat et. Architecto optio omnis vel. Nemo necessitatibus asperiores illum consequuntur non. Tenetur voluptatem natus voluptates blanditiis quia dolorum.', 'Atque omnis sequi at perferendis atque. Quis repudiandae sed iure praesentium sint. Dolorem aut ut itaque veritatis. Repellat neque maxime itaque tempore enim quos.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(135, 'Quae rerum dignissimos et voluptatem quisquam. Nobis debitis in qui repellat qui maxime. Reprehenderit vel quos nihil dignissimos quisquam. Dolores velit aut inventore eaque vel in.', 'Corporis quasi ratione dolore porro excepturi. Iste qui et sunt aut officia.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(136, 'Dolorem eveniet nam et asperiores cum minus nihil. Est porro et qui occaecati at fugit veritatis. Tenetur ipsam illo iste error itaque beatae corrupti. Eum voluptatem hic accusamus dolor qui quis facilis.', 'Dolor distinctio et occaecati at id est. Enim voluptas tempore totam sapiente facilis amet voluptatum. In laborum repudiandae odit natus itaque dolorem hic. Et ipsa id aut a cumque sunt.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(137, 'Excepturi et modi neque impedit. Odit minima sed dolor. Rerum corporis tenetur velit exercitationem quo ab. Quod molestias et harum occaecati tempora.', 'Ut illo perspiciatis velit harum molestias vero dolore. Molestias adipisci consectetur dolore dignissimos error. Accusamus voluptatem dicta quia ex tenetur. Officia necessitatibus possimus ut nihil.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(138, 'Eos eos quos omnis. Consectetur praesentium hic sed expedita dolorem autem. Tenetur sed corrupti itaque voluptas. Qui nihil odit animi libero.', 'Nulla qui vitae nesciunt rerum dolor quaerat necessitatibus. Animi dignissimos ad labore nam non. Sequi praesentium voluptates voluptatem facilis. Quia aliquid beatae tempore deserunt id amet.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(139, 'Ratione quidem aut veniam porro non. Voluptas rerum qui dolor in blanditiis consectetur. Et culpa dicta doloribus. Totam autem ut eum ut perspiciatis. Dolorem dolorum est ratione. Vel qui eligendi atque quis vitae.', 'Fuga repellat et velit recusandae vel sit. In magnam non eum hic repudiandae possimus sint. At eum dolore eveniet mollitia explicabo iste. Tempore aut aliquam voluptatum voluptatem quos dolore.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(140, 'Reprehenderit delectus minus impedit ea autem. Et in sed nesciunt nisi harum corporis aspernatur. Doloremque rerum officia quam sit.', 'Recusandae ut inventore quia laborum vel. Dolorem quae accusamus dolorem libero. Excepturi et dolor autem consequatur autem maiores. Ratione eum est rerum adipisci molestiae a enim.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(141, 'Consectetur ut quia voluptatem consequuntur qui modi. Error et est omnis. Dolor tempore asperiores qui fuga occaecati aliquam vel. Veritatis voluptatibus aut at magnam et. Rerum veritatis nobis dolores aut ducimus accusantium et.', 'Sunt nesciunt omnis voluptas eaque. Enim mollitia aut ea explicabo neque libero nulla. Accusantium sunt molestiae maxime fugit eum.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(142, 'Qui nisi et repellendus. Laudantium porro iste cupiditate. Nam ex necessitatibus accusamus voluptas. Officiis eum excepturi possimus in optio ut illum. Aut dolor quos natus eos.', 'Dolorem et voluptas non sunt est est voluptatem. Doloremque optio qui et sit totam. Dicta voluptate et sed fugiat tenetur voluptatum fugit. Voluptatem eveniet vero quod dolores iste vero.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(143, 'Reiciendis rem consequatur nemo voluptas. Maiores qui blanditiis et eos rerum. Vel amet quas illo est. Quia consequatur repudiandae repellat ut et magni eius.', 'Porro iusto inventore sapiente a aliquam quis quo labore. Ipsa delectus libero enim cum aut voluptatem. Iusto eaque possimus consequatur molestiae doloremque sed.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(144, 'Vitae deserunt ullam qui nesciunt est labore. Quis dolores harum ducimus inventore. Odit occaecati deserunt quia omnis.', 'Aliquam et modi id quas. Rem dolores omnis cum. Quos quam adipisci ullam reiciendis aut. Accusamus sit magni impedit et.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(145, 'Beatae nam nostrum velit autem ipsam eligendi. Quia eos et esse atque hic voluptatem dolorum recusandae. Dolorem corrupti asperiores unde tempore molestias.', 'Repellendus esse iste vero recusandae. Doloribus corrupti molestiae in itaque eum earum cum. Harum officia nihil incidunt.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(146, 'Dolorem eos dolore harum dolores fugiat sed molestiae architecto. Est ad distinctio numquam hic ratione nihil. Sint tenetur esse nostrum aliquid. Et cum fuga quis maiores.', 'Iusto numquam magni rerum cupiditate cum ex quia. Quia sunt vel sit eaque aut. Officia quia nostrum id. Omnis dolores voluptas earum eius unde eaque laborum.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(147, 'Repudiandae quisquam earum asperiores fugit natus unde debitis temporibus. Ducimus necessitatibus iure consequatur laborum velit quisquam ut. Nam officiis corporis dolorum mollitia.', 'Incidunt cumque rem consequatur et. Qui ab ea minus accusamus deserunt culpa. Consectetur sint beatae aut qui. Fugit velit unde dolor voluptatem laborum.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(148, 'Non quo officia quo minima hic reprehenderit. Itaque hic quam molestias vel accusantium quas sapiente. Voluptatem quis ea molestiae ex. Qui repellat facilis quo eos. Voluptate ut enim dolores. Ducimus maxime et harum labore est.', 'Non in voluptatem modi dolores fugit sit sint. Accusantium voluptas quis quo atque et architecto. Ipsa ex excepturi et dolorum. Ea voluptatum quis quia.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(149, 'Nesciunt voluptatem non velit ullam voluptates fugiat aperiam. Enim alias repudiandae consequatur sit enim praesentium.', 'Harum omnis ea qui quam voluptatem tenetur non. Et exercitationem sunt aut voluptatibus fugit iusto eum. Eveniet ad voluptatem ipsum nemo.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(150, 'Dicta cum placeat autem assumenda similique rerum consequatur rerum. Doloremque aut porro repellat itaque dignissimos sed et aut. Est totam similique architecto aut reprehenderit.', 'Autem minus non culpa fuga consequatur quidem. Nobis possimus mollitia earum animi ea aliquam. Sit doloribus repudiandae occaecati soluta rerum quis ut.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(151, 'Commodi in rerum necessitatibus voluptas laboriosam commodi. Dolore maxime quo amet rerum. Doloribus tenetur deleniti voluptate saepe maxime quisquam minima. Aperiam dolores alias tenetur tempore alias. Autem alias ipsum libero nobis vitae.', 'Deserunt temporibus nesciunt est praesentium eveniet. Perspiciatis dolor et nesciunt mollitia magnam aperiam veniam. Qui cum eligendi sint tempore voluptatem eos occaecati.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(152, 'Eos eveniet iure ut nisi. Odit est dolor autem rerum commodi. Eligendi id tempore ut nisi veritatis aut consequatur.', 'Ut expedita corporis eos voluptatibus aspernatur. Occaecati pariatur asperiores odio et deleniti itaque eos. A iste itaque illum dolor hic fuga temporibus.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(153, 'Omnis harum dolorem rerum. Qui ipsa aut exercitationem ratione rerum libero eveniet. Beatae molestiae ut accusantium nihil iusto.', 'Iusto delectus nihil voluptas tempore ut. Dolorem quas magnam consequatur ipsam aperiam excepturi.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(154, 'Quasi recusandae est ullam rerum sunt. Sint quas vero ut tempore. At mollitia corporis officiis temporibus atque ut voluptatem. Rem ut et aut at. Et accusantium et qui non atque laboriosam. Quod eius voluptatem sed. Autem ullam velit et repellat.', 'Ut enim est alias. Sunt vel officia voluptate voluptate doloribus aut molestias. Voluptas nam earum nisi fuga illum illo. Sit aliquam nisi quia numquam nihil aut.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(155, 'Aspernatur labore qui unde quaerat saepe. Ab rem est rerum blanditiis voluptatem omnis nihil. Fuga rerum at perspiciatis iusto.', 'Dolore et ullam ut asperiores est saepe. Ut ullam quisquam reiciendis ipsa. Ut autem consequatur quibusdam saepe modi.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(156, 'Ab dignissimos consequatur commodi natus dolor molestiae quia. Ut quia omnis quia eligendi rem. Suscipit illum commodi quasi totam et quia voluptatem quo. Dicta ea iste aut labore perferendis et maxime eaque. Quidem illo impedit et qui.', 'Occaecati qui praesentium temporibus iure consequatur quo. Eveniet asperiores qui dolorem optio et. Sunt suscipit eligendi alias eaque rerum non.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(157, 'Illo repellat quas voluptatum voluptas molestiae sequi nesciunt. Sapiente maiores reiciendis quibusdam et. Ut ut optio nostrum eos optio incidunt sit ipsam.', 'Nostrum eos dolor aut quod. Quaerat dicta excepturi minima a. Velit illum aut maxime consectetur accusantium voluptatibus minima asperiores.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(158, 'Similique autem harum ullam harum sunt repellendus dicta. Magnam quas dignissimos voluptates minima. Dolorum numquam amet placeat. Sint recusandae illo consequuntur commodi magni dolor. Culpa quasi natus iure. Voluptas cumque maxime nihil provident quo.', 'Temporibus iure pariatur eum. Ad amet debitis exercitationem maiores. Numquam vel architecto quibusdam sunt iste ea.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(159, 'Exercitationem odio odio sit deleniti incidunt maxime ab voluptatem. Sunt et ipsum dolores totam voluptatem. Autem officiis et corrupti enim adipisci et numquam.', 'Aliquam veniam maxime est atque officiis. Asperiores provident quas aut. Delectus dolorum animi non ut tenetur. Ut sit perspiciatis voluptate similique voluptatem.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(160, 'At reprehenderit et fugit eaque aliquid. Vitae voluptas quia ex nesciunt laboriosam ipsum. Dicta neque est optio error quae.', 'Facilis id quos fugiat non. Sint et dicta dolores nobis autem pariatur fuga. Accusamus aliquid ut quo nostrum et at. Eius qui eligendi debitis alias a non iusto.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(161, 'Facere vero itaque dolorem accusamus accusantium. Beatae in aliquid reiciendis dolorem laudantium. Mollitia voluptas ea perspiciatis est.', 'Vel cupiditate et labore velit fuga id iste. Blanditiis eum sed commodi sit est iste facilis. Et et ratione consequatur.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(162, 'Officia odit sint quis dolor et facilis labore. Autem qui ducimus maiores culpa. Minus iste dolores commodi. Sunt et sed autem blanditiis esse nemo quos.', 'Qui velit aspernatur hic et temporibus sunt et aperiam. Laudantium sint numquam et error in error aut dolore.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(163, 'In rerum maiores hic quis in omnis. Ea laborum facere neque. Voluptatum minima et est. Alias numquam consequatur sed sed ipsum esse sapiente ex. Est porro blanditiis blanditiis non harum.', 'A repellendus facilis totam voluptas laudantium. Repellat consectetur consequuntur quia eum officiis laudantium. Ut expedita eaque aut animi.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(164, 'Aut aut rerum aut culpa recusandae. Hic odio voluptatem ea tempore tempore numquam corporis. Ipsam tempora explicabo repudiandae deleniti architecto voluptas eos.', 'Quibusdam sit nam tempora fugiat. Totam ut ut odio praesentium. Ut et sunt iusto. Cupiditate quos et quam fugiat.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(165, 'Id non omnis neque. Ut nam enim corrupti esse deserunt beatae. Veniam ea numquam quisquam ducimus tempore ut accusantium. Dignissimos id ex voluptatem eum voluptatum.', 'Ipsa veritatis aut aperiam corrupti quos asperiores ut. Ut eos in voluptas sequi. Quaerat laudantium qui rerum eveniet nihil.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(166, 'Laboriosam nesciunt nemo exercitationem dolorum. Vitae quibusdam incidunt dolorem sit mollitia similique. Praesentium dolores pariatur perferendis aliquam natus sequi.', 'Nostrum delectus aut voluptatem nemo qui. Dolor itaque sunt a autem at atque. In sed ex vel autem unde itaque est. Aut sit ea illo fugit est.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(167, 'Quia et minus sit voluptas autem unde officiis. Ipsam quis velit eaque. Ea dolorum dolor occaecati et repellendus sapiente quasi.', 'Molestiae quisquam non assumenda qui excepturi placeat et. Pariatur sapiente praesentium nam illo.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(168, 'Optio quidem fuga laborum assumenda maxime. Quia quae in quaerat a ex qui. Delectus quia ad molestiae ut. Nemo voluptates autem ipsa neque. Rerum mollitia sunt aut aut vel omnis velit. Molestias quia commodi nihil eum assumenda velit.', 'Reprehenderit consequatur eos impedit eum maxime magni perspiciatis. Error dicta deleniti ut est deleniti ad sed. Omnis voluptas et quas eum ut ducimus.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(169, 'Eum neque aspernatur quo laborum distinctio et. Sint corporis inventore ea dolor voluptate natus. Sit deserunt eius ea non expedita necessitatibus ab sapiente. Illum voluptatem est quis perferendis eos ea.', 'Molestiae aspernatur perferendis ab aut. Vel quis qui qui odit. Eveniet et est voluptatibus labore veritatis maiores.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(170, 'Voluptatem commodi officiis dignissimos sequi tempore repudiandae. Quod esse quas eaque non voluptatem fugiat aspernatur. Commodi atque molestias fugit quo.', 'Sed est autem numquam. Maiores repudiandae aut aliquam sed. Atque est et eos excepturi corporis quidem beatae vero. Perferendis et maxime est accusantium.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(171, 'Animi ex ut quasi delectus. Reprehenderit sit accusantium est totam qui quos alias. Dicta et est amet incidunt ex sunt numquam. Et tempora rem voluptas neque. Suscipit laboriosam sed cumque odio et sit dignissimos. Corporis et sit aliquam beatae et.', 'Harum temporibus praesentium odio sequi aut et. Sint sed aut voluptatem est sed enim. Sit vel voluptatem et et.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(172, 'Nesciunt debitis laudantium aut dolores voluptatem. Omnis velit ad ad commodi. Quas magni reiciendis facilis quo voluptatum. Ipsum vitae repudiandae voluptatem deleniti nemo facere beatae dolorum.', 'Rem adipisci est voluptate cum hic architecto. Quaerat veritatis magnam voluptatem ipsum sequi. Sapiente et assumenda error est molestiae. Itaque fugit qui soluta deserunt.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(173, 'Qui et quia magni dolor ut. Sed architecto fugit sed vel cumque. Ut sit esse architecto in.', 'Dolor est earum nihil tenetur. Est deleniti laborum nemo laborum consequuntur et et. Accusamus impedit eaque ab. Sapiente vel quidem omnis dolorem.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(174, 'Eum qui consequatur porro. Omnis quibusdam aspernatur possimus ad quia odit. Repudiandae id voluptates nisi ullam. A reiciendis voluptatem nemo soluta magnam illum. Fugiat minus voluptate eum repellat non facere.', 'Facilis qui sed id sint. Et velit possimus facere quibusdam. Officia voluptatum cum ad. Similique aut iure sed quo voluptatem rem nemo.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(175, 'Quia cupiditate quis harum quo qui laboriosam. Odio non maxime dolor. Dolor sint recusandae qui nam dolor necessitatibus fugit. Voluptas in deserunt quae dolorem blanditiis amet.', 'Vero perspiciatis dolorem sit molestias distinctio iusto. Natus omnis voluptates animi molestiae. Aut aperiam est rerum et. Ipsa doloremque et porro.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(176, 'Voluptatibus praesentium nihil veniam hic. In amet animi adipisci repellendus. Exercitationem ipsum consequatur dolores quo corrupti quidem.', 'Sit sed magni suscipit alias soluta accusantium rerum. Qui quia beatae quis occaecati accusamus commodi ipsum deserunt. Est omnis et consequatur enim harum nihil.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(177, 'Enim occaecati autem blanditiis consequatur ex sed sint. Voluptatem perferendis doloribus ea exercitationem accusantium cumque asperiores.', 'Praesentium illo est excepturi aliquam quod ea excepturi neque. Nisi commodi quaerat sed ipsum repellat ea non. Libero esse necessitatibus eaque voluptates ab velit.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(178, 'Rem id magni reiciendis nostrum facilis. Et culpa ipsum eos consequuntur. Dolor doloremque blanditiis illum facere quae atque libero. Quos quae inventore assumenda qui et nisi maiores. Nihil rerum quia dolor illo ullam.', 'Dolores sed amet aut explicabo repellendus aut cupiditate. Molestiae quia consequatur ut voluptatem et consequuntur aut. Fuga quo eaque itaque et beatae repellat beatae.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(179, 'Optio harum tenetur voluptas. Laborum quae ratione est fuga eaque non perspiciatis. Est hic et exercitationem consequatur aliquid ullam beatae. Quae eum sit tenetur exercitationem distinctio ad modi qui.', 'Hic sed omnis tempore tenetur repudiandae repellendus. Quidem accusantium quam quam beatae molestiae et et. Voluptas architecto nobis nihil sed a. Pariatur provident eum cumque necessitatibus sed.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(180, 'Facilis quasi nemo ducimus similique animi molestiae aperiam tenetur. Labore quidem provident possimus et quaerat ut et. Praesentium nobis laborum dolores enim suscipit quod sed. Esse beatae nostrum deleniti corporis asperiores.', 'Quis sapiente quam illum consequatur et possimus occaecati. Ut cupiditate tenetur nostrum eum natus. Sint consequatur dolore est aut.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(181, 'Dolores magnam pariatur hic quam molestiae possimus tempora. Illum maiores dolorum nam sed. Quo voluptatum iure quasi iure omnis. Expedita minima molestias soluta. Repudiandae necessitatibus quaerat ducimus et.', 'Eveniet omnis temporibus et ut reiciendis dolore officiis. Recusandae velit cupiditate dolores et delectus ducimus eum. Facilis quo error ad aut sint vel.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(182, 'Pariatur quasi voluptates excepturi provident modi animi et. Cupiditate dolor quis ea quod. Ut quisquam minima assumenda ut aut. Qui voluptates illo odio fugit. Rem earum necessitatibus rerum.', 'Molestiae velit itaque et corporis aut sint. Cupiditate nemo aspernatur quia tenetur aliquam alias quibusdam. Et et quia iure quaerat commodi.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(183, 'Saepe dolorum neque corrupti facere. Esse voluptatem repudiandae aut sint et at et. Et illum ipsum labore est reprehenderit adipisci laborum. Ex atque rem incidunt quas.', 'Est qui iusto aut ut deserunt. Dolorum est et adipisci. Illo eum commodi reiciendis occaecati minima ullam similique.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(184, 'Laboriosam nobis quia quisquam omnis accusamus. Accusantium ut quaerat dolorem voluptatem. Eius cum alias pariatur. Eaque reprehenderit eos nihil nemo quae facilis.', 'Debitis officia dicta sunt quidem nulla omnis. Molestiae voluptatem ea reiciendis eum.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(185, 'Aut hic nemo odio maxime error. Illo distinctio temporibus hic quia consequuntur. Ipsam qui id aut qui. Quia nostrum deserunt rerum non aliquid. Id odit qui aspernatur laborum cumque corporis.', 'Quam qui suscipit mollitia aut laborum fuga nulla. Quos quia ipsum culpa quia ut nesciunt. Enim ea ullam ab voluptatum. Error rerum earum sit sequi cumque.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(186, 'Sit in dolorem rerum. Autem ut nam optio totam veniam inventore iure. Et et reiciendis iure ea et.', 'Aut nam modi voluptates consequatur. Ducimus voluptate tenetur et unde.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(187, 'Vel recusandae vel ducimus aperiam dolor. Sequi iure velit culpa ut facilis at. Necessitatibus ad optio earum eveniet. Laboriosam fugit est autem ut laboriosam sapiente dignissimos. In aliquam autem ab autem eveniet et.', 'Illum sit dicta quo magni. Aliquam aut similique esse aut rem qui accusamus cupiditate. Veniam et fuga sequi modi recusandae aperiam. Et ut accusamus reiciendis.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(188, 'Labore omnis doloribus qui incidunt. Et aliquam cumque esse numquam inventore modi. Ut excepturi similique adipisci voluptatem.', 'A aut eveniet exercitationem vel eos. Id aliquam sint id quod quasi. Et tempore est inventore consequuntur. Fugit accusantium voluptatem nihil dicta velit non voluptatem.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(189, 'Praesentium sed quasi amet amet magnam deserunt est. Eveniet reiciendis enim ut. Voluptas aspernatur ut ea explicabo incidunt magni. Tempore dignissimos reprehenderit nobis dignissimos debitis et.', 'Sed rerum qui atque velit doloribus ipsam. Possimus et aperiam eius. Illum dolor tenetur modi deserunt.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(190, 'Sunt id eum eaque consequatur earum est. Dignissimos quo et dolorum voluptatem sit voluptates. Ut molestiae qui quas qui dolorum. Et totam dolorem nobis dolorum et quis.', 'Enim qui ut eius et nisi veniam beatae. Veritatis dolore esse culpa aut magni corporis exercitationem. Optio eos ad nobis magni adipisci inventore. Neque sed quasi placeat doloremque.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(191, 'Ut aut voluptatem doloremque. Dolorem facilis vel dignissimos est sequi. Sunt recusandae consequatur odio eveniet quaerat. Nesciunt consectetur aut eos. Fugiat est iusto itaque at. Quia at et commodi est enim. Sint et vitae facere iusto.', 'Amet quia eius eveniet cumque nisi omnis. Harum voluptatem tenetur maiores commodi. Deleniti et quae corrupti aut aut voluptatum occaecati.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(192, 'Harum nemo distinctio qui minima. Hic fuga odio earum quia corporis vero. Possimus voluptas quos voluptates non in asperiores nobis. Ut sed ipsam voluptatem voluptatem fugiat quia. Nam expedita placeat facilis iure officia sit.', 'Libero quas dolores et quod enim. Voluptas et suscipit voluptas aperiam quis laborum. Minima maxime suscipit nisi incidunt quis dignissimos.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(193, 'Et non qui quis qui. Ea expedita omnis veniam magnam facilis amet et. Eos sit pariatur voluptas odit quod aut delectus exercitationem. Neque non aperiam eum quidem numquam eaque eos.', 'Eum omnis et molestiae dolore. Sed quibusdam quasi ea consequatur. Praesentium voluptatibus quas voluptas veritatis tenetur rerum.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(194, 'Voluptatem voluptatem numquam perspiciatis molestiae. Nesciunt aut temporibus hic nemo architecto mollitia. Ab soluta aut in nam voluptates ipsam.', 'Quibusdam reprehenderit rem reprehenderit animi molestias voluptas. Quas cum excepturi voluptas non. Laborum ratione enim et sed et sunt hic. Iste fuga consectetur omnis totam officia eligendi.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(195, 'Soluta consectetur harum ut praesentium nisi. Rerum reiciendis optio vero. Quod aut iure et excepturi. Sequi id rerum molestiae quia optio ut.', 'Amet rerum dolorum labore sequi esse. At cupiditate maiores occaecati eius molestiae occaecati. Corporis illum ex dolorum culpa deleniti quo.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(196, 'Eum sed perspiciatis voluptas eaque. Non et sed distinctio sunt. Deserunt expedita sint qui sit est non. Et voluptatem sint sit quae ea sunt quo. Eligendi at sint aut magni.', 'Molestiae soluta perspiciatis quia cupiditate modi. Eos non eos aut vel est perferendis. Quas quas rerum rem suscipit eveniet sint corporis. Accusantium voluptas tempore aliquid qui impedit non.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(197, 'Reprehenderit reprehenderit officiis sit inventore omnis quia rerum. Tempora non beatae id distinctio facere nisi. Provident ea rerum autem magni aut aperiam iure molestiae.', 'Ipsum tempore quo tempore tempore. Vel beatae sapiente et optio quam et perferendis. Illo delectus laborum vitae aspernatur quos quia. Et molestiae ut qui officiis eveniet necessitatibus.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(198, 'Sint sit est ipsa explicabo. Doloremque possimus laboriosam a quasi. Voluptas dolor sed est blanditiis. Doloremque ad dignissimos quasi assumenda alias.', 'Id quidem in necessitatibus magnam laudantium omnis. Eum autem sed adipisci veniam rem. Amet sed mollitia excepturi expedita non. Vel at error doloremque doloremque accusantium adipisci dolorem.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(199, 'Et quibusdam exercitationem ut eaque voluptatem numquam numquam. Id libero dolores quasi tenetur vitae. Ea et minus et illum sunt. Praesentium et voluptatibus ut nostrum rerum.', 'Eum velit eum error aut. Sit eveniet reprehenderit ipsam impedit atque inventore aut sed. Itaque sint hic itaque aspernatur facere ab. Voluptatem repellendus atque itaque iusto possimus omnis.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(200, 'Omnis dolorem dicta accusantium et in delectus voluptas. Ratione atque molestiae provident eaque ipsam exercitationem repellat. Odit velit ea alias sint maiores nemo et. Hic iusto enim quod cupiditate nihil voluptatibus et labore.', 'Quis nulla exercitationem sed voluptate sapiente et unde. Est tenetur iure possimus et beatae deserunt. Molestias maiores veniam temporibus sapiente quisquam eius ullam.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(201, 'Nobis enim dolores labore modi. Aut consequatur dolor in praesentium id similique. Quia quo voluptas est ullam deserunt iusto. Aut accusantium earum eum aut. Sunt et et rem ut. Enim non sit ea velit beatae. Aliquam rerum aut et rerum minus numquam dicta.', 'Consequuntur qui porro rerum ut id quia. Tempora dolor quam quas omnis beatae quia. Iure maxime aut rerum sit ullam ea. Sed accusamus deleniti iusto nemo. Deserunt optio veritatis quam.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(202, 'Qui ut sed eveniet maxime et voluptatem nam aut. Aperiam odit placeat quam sint accusamus qui sit. Ratione eligendi possimus et est quia enim excepturi. Nisi qui minima veniam vel. Fugiat et vel itaque ut et nulla cum exercitationem.', 'Deleniti sapiente et libero quod sed laborum. Nisi sed accusantium est.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(203, 'Tempora corrupti et dolorem et aut. Maxime officiis consequatur non molestiae. Rerum dolor quia quaerat asperiores explicabo.', 'Accusantium quos impedit impedit explicabo. Quis rerum molestiae corporis a ut. Et reiciendis eaque quis aliquam modi exercitationem.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(204, 'Vitae in ab repellendus non optio exercitationem. Est qui qui dolorum perferendis et. Delectus cum non inventore iste consequatur impedit praesentium. Tempora recusandae excepturi tenetur placeat maxime doloremque tempore.', 'Occaecati libero non deleniti et sunt. Rerum reiciendis consequatur et aliquid repellendus debitis. Et saepe blanditiis quisquam qui quam quisquam numquam. Et corrupti expedita impedit omnis facere.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(205, 'Consequatur quia odio aspernatur sit porro aut vero. Dicta fugiat sed non ad ex omnis amet. Ex sunt rerum nulla. Dolore excepturi unde a rerum nihil.', 'Qui hic quis laborum ex fuga et cupiditate. Aut similique aliquid delectus aliquam quia nemo harum. Saepe quia incidunt rerum iure. Dolorem et et dicta autem et.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(206, 'Qui sint magnam itaque adipisci nam quasi at. Impedit ab voluptas aut sed repellat nam et. Enim distinctio perspiciatis quia sint ut tempore qui. Minus officia enim odio quis dolore consequuntur sint.', 'Ratione laudantium maiores recusandae harum ut est enim. Quia sed corporis quaerat voluptatibus qui. Qui alias sunt harum sunt dolorem.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(207, 'Tenetur voluptatem asperiores fuga. Nulla qui et incidunt sint id. Aut harum quasi qui quas odio. Sint exercitationem nulla aliquid.', 'Dicta facilis impedit ducimus quia placeat sit. Debitis deleniti occaecati velit qui. Consequatur ut voluptatem nihil corporis ducimus.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(208, 'Non similique vitae rem et quos quis. Quasi et non nihil omnis. Corporis itaque iusto in maiores repellat accusantium. Recusandae fugiat non qui alias.', 'Recusandae vero recusandae nihil deleniti. Quos soluta fuga quis voluptatem ea fugiat. Ex minus voluptate cumque quis.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(209, 'Autem unde at exercitationem. Atque quae quo sed voluptatem quia consequatur velit. Nobis ut sed non rerum. Qui sit natus ad. Facere et repudiandae numquam dolores ea incidunt repellendus numquam.', 'Est error adipisci blanditiis aliquam dicta deserunt. Consectetur laborum magni quia veritatis. Aut sit et voluptates et.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(210, 'Qui recusandae sequi quis quam itaque omnis. Ut deserunt ex sunt ratione. Tempore ut labore ab non. Maiores at mollitia suscipit facere.', 'Neque ad debitis recusandae deserunt incidunt sapiente. Exercitationem aliquam dolor repellat amet facilis quia. Praesentium reiciendis amet voluptates sed corrupti esse.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(211, 'Aliquam eligendi id rerum consequatur. Deleniti et iure iusto sint saepe ex perspiciatis. Laboriosam sed qui dolores et in vero quisquam. Cupiditate consectetur nesciunt minus eum rerum.', 'Quisquam et quo eaque ut. Ipsa sequi possimus autem iusto quae. Ea vel iste non ipsa consequatur quasi quisquam. Ut voluptatibus explicabo nobis.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(212, 'Est molestiae praesentium alias hic nam consequuntur consequatur. Quo nihil ut animi voluptatibus cumque eius excepturi. Veritatis tempore non cupiditate quidem facere qui.', 'Ut pariatur qui rerum et dignissimos. Est veritatis eveniet voluptas veritatis eos a non. Esse est dolorem in quia.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(213, 'Sed qui voluptatibus velit molestiae. Id omnis aut possimus tempore debitis soluta repellat dolor.', 'Sit est dolorem molestiae ea. Dolores qui eaque dolorum perspiciatis laudantium. Sint molestiae amet quas maxime. Porro animi aliquam odit aut facilis.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(214, 'Et qui neque nihil quaerat perspiciatis. Dolor sed voluptatem cupiditate omnis ipsam dolorem vero. Quia sit repellendus qui rem. Itaque et numquam quasi non.', 'Rerum soluta dicta sed ab. Aut dolores ipsa voluptas illo voluptas autem. Occaecati aliquam omnis harum placeat minima. Qui eos explicabo qui nihil et.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(215, 'Sit et error officiis eos ipsum dignissimos maiores et. Porro et sit voluptas consequuntur beatae qui esse. Cupiditate omnis dolorum odit similique omnis.', 'Similique deserunt dignissimos harum velit. Voluptatem alias rerum incidunt ipsum sit dolorem ut. Rem sit voluptas velit eveniet id architecto ex. Est quo non libero non.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(216, 'Rerum vel exercitationem molestiae quos eum fuga id. Illum distinctio autem ullam debitis ipsam. Ut possimus voluptate totam et sed sequi.', 'Qui ad beatae nobis corrupti. Laudantium ut nam illum est voluptatem incidunt. Et ex sed modi rerum. Saepe eaque vero debitis.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(217, 'Est eos fugit perferendis rerum odit. Aliquam est dolor quia aliquam. Dolor maiores repellendus quos qui.', 'Perspiciatis sapiente facere ab ea. Accusantium quia eveniet veritatis minus unde eaque eum. Tempore et aperiam voluptatem assumenda beatae quis ut.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(218, 'Sed error unde molestiae similique nam. Illum nihil provident molestiae laudantium aspernatur ut dignissimos veritatis. Ullam ut eos voluptatem.', 'Error velit ut nostrum a voluptatibus nam. Sint dolorem enim ratione praesentium sunt. Ex ipsa est ea eum.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(219, 'Quo qui et culpa rerum. Eaque aut dolorum iste architecto fugiat. Tempore cupiditate aperiam porro. Aut aut fuga quis voluptates nesciunt. Mollitia provident dolor asperiores assumenda ut similique culpa sed. Alias qui velit et consectetur.', 'Doloribus occaecati itaque voluptates praesentium aut sed consequuntur. Et sed odio cupiditate dignissimos fugiat impedit enim. Praesentium atque ut vel dolorem repudiandae aperiam ipsum.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(220, 'Aut ut architecto consequatur necessitatibus quasi. Et aut eos unde aspernatur commodi culpa. Debitis et et molestiae enim porro officiis culpa ullam. Porro reiciendis unde maxime sed dolore neque dicta sit.', 'Aspernatur saepe sint totam facilis qui consequatur et. Quaerat adipisci recusandae accusantium iste ullam enim. Reprehenderit odit similique hic corporis aut.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(221, 'Harum ea provident molestiae sed. Eaque illum eaque reprehenderit suscipit alias aperiam minus magni. Et accusantium qui aliquam est cum delectus et. Quam sed voluptatem asperiores rem tempore excepturi ex. Et non alias odio consequuntur.', 'Ad eos et quia blanditiis magnam repellendus tempora. Enim est qui aut quis. Repudiandae dolores odit tempora est.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(222, 'Ex ducimus nihil tempora qui optio ad aut. Vel hic quo libero maxime perferendis nostrum quibusdam. Voluptas sit in repellat et at. Animi occaecati consequatur cupiditate eligendi similique cumque.', 'Culpa sequi excepturi praesentium neque. Qui ullam laboriosam accusamus cum. Cupiditate ut velit adipisci sit blanditiis ea sint. Praesentium aut temporibus sed.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(223, 'Odit tempora est consequatur quod fugit rerum ut. Necessitatibus sunt exercitationem velit possimus accusantium. Est libero consequuntur quidem voluptatem consequatur laboriosam voluptas id.', 'Autem dicta eos architecto distinctio. Mollitia molestiae repellendus blanditiis eos consequatur. Ducimus minima quibusdam aut. Quidem nihil earum aut corrupti.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(224, 'Saepe et debitis distinctio fuga quo fugiat. Autem molestias aliquid quis sed. Ratione rerum atque perspiciatis placeat provident.', 'Voluptatem reiciendis sed aut. Quia iure temporibus mollitia similique. Accusantium porro modi non sequi quo. Reiciendis debitis excepturi autem fuga labore deserunt numquam.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(225, 'Natus ducimus qui sint veritatis est non sunt. Ut modi debitis debitis. Quas aut asperiores voluptatem commodi optio vitae eaque. Molestiae harum est ipsam et incidunt nihil.', 'In amet dicta est soluta odit tempora deserunt. Consectetur voluptatem est molestiae veniam. Est soluta placeat et rerum vitae nesciunt corporis velit.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(226, 'Et tempora labore eos consequatur sint voluptas suscipit. Assumenda et rerum quod natus. Quasi qui eos placeat et tempore consequatur. Architecto consequatur et nostrum.', 'Maiores omnis quia consectetur. Quaerat placeat assumenda et minima est deleniti nulla. Est esse sequi id ipsa. Nostrum reprehenderit eum accusamus quasi consequatur.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(227, 'Repellendus rem et veritatis animi non. Molestiae qui dolorum omnis non et. Iure blanditiis delectus et labore quisquam fugiat. Quasi qui dolore sed quas officiis iste necessitatibus.', 'Odit velit quam odit saepe non nesciunt sit. Ipsa ut rerum at placeat reprehenderit. Earum error explicabo ea repellendus et.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(228, 'Sed et perspiciatis magni minima nulla reprehenderit ratione. Aperiam voluptas dolorem illo quisquam iusto cum accusamus.', 'Itaque voluptatum tenetur molestiae minus est vitae voluptas dolorem. Aliquid quam nobis mollitia quis. Ab est ipsam adipisci et beatae quod.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(229, 'Consectetur inventore doloribus odio illum eaque iusto. Dolorem molestias porro quis sed aut molestiae. Repellendus non quis dolore praesentium vitae aut ut. Velit similique ipsum placeat veniam non voluptatem.', 'Omnis aspernatur in qui hic aut dolores praesentium. Dicta et perspiciatis recusandae velit. Illo qui nisi nesciunt voluptatem.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(230, 'Voluptas eius hic quia vero iure. Sed eos facere tenetur provident. Necessitatibus est tenetur praesentium et quaerat consequatur distinctio. Et amet maiores doloribus perferendis minus et perspiciatis.', 'Et non rerum sint rerum mollitia. Asperiores ut in quibusdam voluptatum in nisi tempore neque. Error dolorem delectus eos aut sit maiores officiis.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(231, 'Explicabo similique debitis unde. In cupiditate unde neque. Dignissimos sed enim ullam facere sed eum eum.', 'Eligendi et et sed ab. Quidem quia dolorem consectetur est ea. Non explicabo cumque aut nobis rerum corrupti. Corrupti officiis aspernatur sed non. Velit consequatur in sed. Ut odio tempore hic quae.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(232, 'Eius rerum deleniti magnam rerum veritatis unde. Quisquam repellendus ea dolores maxime ex nihil animi. Dolor molestias at et.', 'Eum omnis necessitatibus quod debitis sed. Esse quas dolores aliquam. Porro sed error et nemo accusamus ipsa vel quia. Sunt rerum odio non a dolores minima.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(233, 'Optio mollitia repudiandae necessitatibus vel dicta. Quam quidem consectetur distinctio quas deserunt placeat a. Fugit asperiores tenetur laboriosam et nulla doloribus et. Et libero maiores quae quam in.', 'Earum sed consectetur soluta aut. Nihil eius qui nesciunt beatae et sunt. Sit quia aut sed vitae aliquam. Eligendi omnis rerum reprehenderit fuga quasi hic.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(234, 'Quaerat dolores dignissimos enim vero repellendus et nostrum. Nihil deleniti omnis magnam ut qui aperiam dignissimos accusamus. Porro aut necessitatibus necessitatibus aspernatur ea.', 'Excepturi dolorum quis quo inventore. Est libero nesciunt veritatis modi quibusdam. Dolorem sed ullam cumque nihil. Autem reiciendis sed fugiat nobis.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(235, 'Totam quasi voluptatem ab voluptatem cupiditate possimus repellat. Facilis qui omnis voluptate error. Sed omnis ut perferendis repudiandae eius tempora voluptates.', 'Sit neque facilis veritatis reiciendis. Accusantium autem labore facilis necessitatibus error. Harum nobis doloribus et. Enim enim velit aspernatur deserunt tenetur.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(236, 'Est non sunt et pariatur voluptas voluptatem. Ut quis odit rerum modi. Ex pariatur et est voluptatem ipsum. Mollitia ad animi ipsa ut ut distinctio alias aperiam.', 'Dolorem quis sit non distinctio. Aperiam aspernatur saepe distinctio porro aliquam facere.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(237, 'Atque repudiandae consequuntur magni veritatis fuga et. Ut alias hic hic aut explicabo. Omnis quibusdam saepe consequatur reiciendis delectus et nam corporis.', 'Nihil consequatur et sit sed. Nostrum aliquam laudantium occaecati. Nam possimus sed consequatur libero quos. Repudiandae id voluptatem repellendus ullam nihil a.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(238, 'Vero repellendus fuga rerum aut. Accusamus consequatur et autem atque. Voluptatem perspiciatis esse ullam tempora quod.', 'Exercitationem quia voluptatem non quis. Dolores ut omnis libero. Sit repellat tenetur cupiditate ipsa. Est dolorem similique necessitatibus et.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(239, 'Expedita qui rem magnam qui. Assumenda enim inventore quidem sunt. Dicta omnis et minima asperiores amet. Voluptas fugit eveniet aliquam id eaque perferendis architecto.', 'Voluptas atque eos qui laborum beatae. Et temporibus ab quisquam omnis ex dignissimos omnis. Autem voluptatem cum qui iste. Voluptatum aut cupiditate nobis beatae sit autem saepe.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(240, 'Reiciendis cumque facere eos repellat. Tenetur odio consequatur aliquam quos aut non. Molestiae eum sint tempore molestiae quo.', 'Aperiam nostrum eos repellendus. Consectetur minus atque deleniti officiis molestiae recusandae.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(241, 'Culpa voluptatum sunt quo ipsum ut expedita laboriosam. In voluptas saepe incidunt deserunt. Occaecati ut adipisci accusantium nam sapiente. Deleniti iure unde nulla rem sint.', 'Non vel distinctio possimus. Quisquam dolores voluptas id consectetur natus consequatur. Omnis quia ratione et nobis nihil ex qui quod.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(242, 'Laboriosam error praesentium quaerat. Ea hic autem dicta voluptatum atque exercitationem corrupti. Praesentium eum non et sit.', 'Possimus molestias voluptas aut corporis. Quia autem ea omnis dolorem quidem et autem repellat. Aut error autem voluptas velit quod animi. Neque nisi consectetur ut.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(243, 'Hic ex dolores cupiditate consequatur minus ut. Magnam minima et consequatur quia dolor excepturi. Voluptates sit culpa deleniti illum. At odit quod est laboriosam libero enim.', 'Autem sed in ut occaecati sit blanditiis sit. Veniam blanditiis sapiente omnis odit. Et voluptatem accusantium itaque est at quidem velit unde.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(244, 'Pariatur voluptate aut quia ipsa minima vel. Eum enim autem et ipsa consequatur ullam. Qui quidem perferendis dolor dicta non corporis provident. Est ipsum adipisci necessitatibus aut corrupti exercitationem consequuntur molestiae.', 'Atque quidem et occaecati maiores exercitationem. Accusantium aspernatur impedit sed doloribus autem optio. In voluptatem omnis aut illo.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(245, 'Facilis illo corrupti perspiciatis id quia. Sequi aperiam fuga totam tempora. Dolorum nam eos soluta reprehenderit libero perferendis. Animi eos animi quasi beatae ut nulla laudantium.', 'Reprehenderit quos aut est. Velit amet fugiat dolore ut ipsa. Quos omnis aliquam quasi. Illo neque vero nostrum iure suscipit.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(246, 'Velit labore laudantium possimus sequi. Eum ad aut nulla unde. Illum ea corporis autem a. Odio fugiat quo fugit.', 'Non ad ab nostrum. Molestiae atque eligendi et rerum magni. Voluptas delectus laudantium vel quia suscipit autem praesentium.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(247, 'Quo earum repellendus maiores beatae occaecati molestiae quia non. Cum exercitationem aut qui aliquam ipsa asperiores repellat perferendis. Dolores voluptatem quaerat eum dolor animi. At nihil optio neque tempore animi autem non.', 'Quidem non quibusdam optio neque. Autem in et quo a sit laudantium eaque consequatur. Sint quo numquam harum eaque optio. Assumenda ratione ut commodi consequatur expedita culpa.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(248, 'Molestiae non et odit accusamus. Delectus consequuntur et velit asperiores. Velit error adipisci ab ut sit occaecati atque.', 'Atque illo voluptatem quas dicta iure nostrum ea tempora. Quaerat nemo aut odio quos dolores quisquam. Ea ea exercitationem ut iusto et quibusdam ut. Eum ut illum autem dolor aspernatur.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(249, 'Ullam esse quia voluptate asperiores excepturi. Quaerat dignissimos temporibus tempora quis dolor aut. Maxime saepe ab hic rem.', 'Quod doloribus error distinctio explicabo consequatur. Aut perspiciatis architecto ab omnis fugit dolorum impedit iusto. Optio laborum corrupti explicabo perspiciatis dolores ullam nisi.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(250, 'Accusantium saepe modi doloribus aliquam quo dignissimos provident. Ut quaerat sit rem minus beatae. Id et eaque delectus tempora soluta esse aut.', 'Porro aliquid hic voluptatem. Et tenetur totam id optio qui omnis. Explicabo consequuntur neque porro commodi eligendi rerum. Nobis vero quod eum accusantium.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(251, 'Eligendi a tempore rerum cum quisquam sunt rerum. Ut eveniet doloribus vero. Molestiae magnam dolorum et unde ducimus itaque quia ut. Veniam eum vel at repellat debitis tempora.', 'Est ut rerum quos sit alias et. Natus delectus labore aut omnis. Illum unde voluptatem nobis delectus debitis eligendi qui. Quam veniam aut quaerat aut omnis.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(252, 'Voluptas ratione molestiae eos suscipit exercitationem. Veritatis praesentium ut qui voluptas facere earum similique vero. Recusandae sed quia a. Reprehenderit libero dolor et asperiores distinctio velit.', 'Nostrum cum vero molestias esse. Doloremque quos dolorem et adipisci hic. Exercitationem quo quod nam reprehenderit illum debitis delectus. Repudiandae provident accusantium eaque modi.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(253, 'Assumenda suscipit est temporibus. Iste vitae omnis laboriosam quod. Alias quia quasi quo consectetur doloremque. Accusantium ullam consequuntur velit debitis. Ut et corporis adipisci voluptatum enim.', 'Iure architecto rerum natus itaque quisquam dignissimos porro et. Nemo sit et culpa dolorem id. Unde consequatur blanditiis suscipit repellat modi. In blanditiis dolorem voluptas earum sunt dolorem.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(254, 'Tenetur facere voluptates necessitatibus rerum qui natus. Et aliquam itaque quibusdam totam repudiandae quasi. Eius impedit delectus vel quidem nemo voluptatibus.', 'Ipsam recusandae et alias laboriosam eius. Totam optio atque dolorem amet qui sunt accusantium. Veniam ut autem ut dolores repellat. Quia quis omnis quisquam quis cumque vero.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(255, 'Minima quis sint dolores voluptatem assumenda necessitatibus praesentium. Nesciunt consequuntur aut aut tempora eius ducimus vel. Illo rerum impedit officia sunt. Qui sed non quia quo dignissimos sit nesciunt suscipit.', 'Mollitia unde ipsa tempore delectus. Et voluptate voluptatem ut minima illo. Optio iste quis magni cupiditate magni quaerat aut.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(256, 'Sunt cupiditate asperiores est voluptates recusandae. Assumenda est eos maxime et iusto aut. Reprehenderit adipisci quibusdam necessitatibus enim officiis dolor.', 'Itaque esse hic eum qui. Esse vel facilis enim assumenda voluptatem. Iusto quod nisi eligendi sit. Et et expedita et et nisi.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(257, 'Voluptatem sunt quisquam optio sequi fugiat illum. Laboriosam voluptatem consequatur nobis mollitia perferendis dolor. Ea eos est atque esse. Accusamus omnis et consequatur laborum ducimus totam quo.', 'Incidunt quis quo quia atque. Dolor ipsum illum et quidem. Quae autem modi fuga occaecati provident dolorem. Fugit et soluta saepe numquam.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(258, 'Rerum ad quod necessitatibus omnis vel corporis. Et quas ut laborum libero. Non exercitationem totam vero doloremque. Vel id ad reiciendis aut modi et temporibus. Iste quod sed nihil sed explicabo quisquam. Facilis ut eaque cupiditate ut nisi.', 'Unde laborum ipsa labore officiis. Modi voluptas doloremque omnis voluptates. Natus est placeat iusto quod optio et nostrum. Molestiae enim non dolores assumenda.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(259, 'Aliquid ducimus dicta ducimus fugit et. Aperiam nobis nihil fugit unde quasi dolores. Necessitatibus porro sit quisquam unde est atque. Recusandae assumenda impedit tempore illum minima.', 'Laudantium ullam quas et vitae sit aspernatur. Nemo quo vitae tempora sed sit. Minus aut dolor et vel sed quaerat. Deleniti molestiae ut in consequatur maiores impedit voluptas.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(260, 'Sunt magnam et commodi aut dignissimos dolore. Debitis non et natus et quod accusantium. Beatae dolorum quam voluptatem repudiandae delectus deserunt.', 'Quia soluta animi corrupti nemo rerum. Quasi vero adipisci provident ad explicabo dolor. Repellendus adipisci est perferendis placeat.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(261, 'Accusantium vel minus molestiae velit est. Qui consequuntur enim natus voluptas perferendis. Voluptate ducimus dicta soluta et. Vel natus et quisquam odio veniam. Sed et enim veniam quibusdam totam quidem. Asperiores sint a fuga dolores.', 'Quo nisi ipsa ut omnis qui eos. Aliquam eos et enim rem. Quae maxime ipsa ut atque in.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(262, 'Beatae perferendis consequatur magnam officiis tenetur omnis et. Omnis officia omnis non itaque accusantium vel rerum.', 'Ea exercitationem eius velit alias ad tempora architecto natus. Deserunt laboriosam temporibus eos sunt. Aut ab temporibus quas architecto et.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(263, 'Accusamus excepturi doloremque nulla beatae dolores. Et voluptas assumenda cupiditate assumenda suscipit possimus repudiandae. Necessitatibus distinctio officia quia natus quasi amet nostrum dolores.', 'Reiciendis et fuga in voluptas. Sint libero est laudantium ex. Qui quo distinctio minus. Sunt qui quam ipsum.', '2021-11-20 14:47:43', '2021-11-20 14:47:43');
INSERT INTO `modeles_factures` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(264, 'Et et placeat rem esse qui. Et hic ut atque quo. Nulla et voluptas possimus fugit animi quam est. Veritatis corrupti rem officiis dolor in.', 'Minima tempora velit alias fuga. Odit placeat aut delectus voluptatum qui. Perspiciatis sunt molestiae veniam enim. Mollitia perferendis enim dolorem cumque quia inventore.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(265, 'Rerum facere nobis consequatur. Non illum ut et quia omnis soluta. Quam eum ratione sed vero nihil at. Ipsa facere quia dolorum dolore minima.', 'Voluptatibus velit nisi et hic. Pariatur officiis id voluptate quos atque. Fuga non et qui quod doloremque voluptatum explicabo. Modi quae ullam enim qui nostrum omnis.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(266, 'Deserunt ipsam officia perspiciatis molestias. Ea et in nostrum a. Qui delectus qui ut sunt vero sint. Neque cupiditate eligendi et. Dicta explicabo quibusdam repellendus. Quae omnis minima excepturi deserunt.', 'Ut fugit dolorem suscipit ut ut ratione. Molestiae dolor ad minima non neque. In ducimus repellat suscipit autem.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(267, 'Ut voluptas consequatur perferendis fugit qui illo deleniti. Voluptatem aut beatae at saepe. Adipisci enim eaque accusamus odit corporis consequatur blanditiis molestiae.', 'Rerum illo in aspernatur amet dolorem qui iste. Quisquam quod facilis maxime dolorem eum facere. Magni iure aliquam magni tempora ea. Corrupti ipsam eum in. Et nemo tenetur nulla neque quis in esse.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(268, 'Quos rem id architecto ex iste quam aliquam adipisci. Possimus hic ullam nihil iusto sit consequatur iste. Dolores nisi enim inventore aut suscipit voluptatibus non similique.', 'Voluptatem quo laudantium odio consequatur. Velit quia consequatur soluta perspiciatis quo mollitia eveniet.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(269, 'Quod occaecati perspiciatis sed ullam. Et accusamus laboriosam omnis deleniti dolorum repudiandae nostrum. Odio alias saepe distinctio non et et. Saepe odit est voluptas. Adipisci ut voluptatem at.', 'Corporis inventore laboriosam recusandae nisi aut. Minima nihil eius maxime aut suscipit. Id pariatur repellat est sunt qui magnam et similique. Ipsa nobis voluptatem deserunt est qui facilis minus.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(270, 'Aut sunt reprehenderit eligendi quo et ducimus. Occaecati quis ut animi doloribus aliquid veniam. Veniam molestiae qui mollitia quia quos voluptatem. Illum at aliquid sint odio beatae et. Molestiae vel quasi tenetur.', 'Atque incidunt est culpa reiciendis quidem. Ut sint et qui fugit autem blanditiis nostrum. Recusandae iure rerum et sit repudiandae et accusamus qui.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(271, 'Deserunt quia et qui blanditiis optio repellendus non. Quisquam dolorum enim officia explicabo. Fugiat deleniti accusamus enim excepturi sed quidem.', 'Ipsum quas consectetur assumenda adipisci tempore in ducimus. Hic perspiciatis odit dignissimos tempore sed et molestiae quisquam. Voluptas quaerat ut qui qui quae sit. Qui quo soluta dolores ad.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(272, 'Tempore minima iste harum rerum ut assumenda. Dolor impedit dolorum omnis quam ullam velit reprehenderit. Repellat quae veniam voluptatem aut voluptas vel aspernatur. Hic officia enim ut molestiae. Modi ad et neque voluptas dolor corporis aliquid.', 'Sapiente placeat aliquam dolorem nisi qui quibusdam. Possimus quia aliquid ipsam nulla minima. Voluptas facilis omnis minima est.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(273, 'Ipsa voluptas nobis voluptatem consequatur est. Non nihil laudantium expedita quaerat amet et. Exercitationem perferendis cupiditate ea sunt dicta.', 'Quia voluptates cum qui repellat. Dicta laudantium autem tempora reprehenderit. Culpa dolor id voluptatem tenetur. Tempora quia magnam aperiam soluta voluptatibus quisquam.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(274, 'Est laboriosam repudiandae sunt in et ab. Tempore nemo iusto non natus. Qui temporibus ut ipsum et. Et accusamus nihil eos laborum iusto et ratione.', 'Et ut quas molestias quo ipsum. Iure occaecati nemo nemo modi. Enim et voluptatem optio molestiae quas repudiandae. Accusantium minus aut nulla ut voluptates porro.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(275, 'Illo quam ut ut consequatur placeat. Et tenetur laboriosam velit natus modi dicta. Explicabo magni omnis minus nulla non autem.', 'Saepe a ea aut dolorem. Ut dolor commodi qui autem. Est maiores maiores aut quo ea qui facere.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(276, 'Ipsum fugit id libero ducimus. Commodi dolores labore est. Ducimus tempore iure voluptate sint. Ab vitae animi debitis libero consequatur quos dolorem. Esse impedit tempora aperiam provident incidunt. Minima molestiae iusto aut.', 'Cupiditate magnam quos officiis maxime. Sequi ipsam quo sunt itaque labore impedit ducimus. Neque ipsum vero sunt. Fugit mollitia quae assumenda. Non ducimus eius aperiam aut earum.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(277, 'Quam sit temporibus ut quisquam totam. Iure enim omnis quis consequatur delectus ab. Nobis vel ut ut eaque ut corrupti. Dolorem ut sit excepturi enim.', 'Ratione atque odio voluptatum est. Aut deleniti eum nisi ratione temporibus. Et laborum rem officia doloribus perferendis aut.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(278, 'Et nostrum enim est dignissimos dolorem et. Officia officiis architecto alias ducimus inventore et. Nihil unde id in modi voluptate sit. Veritatis ex ducimus voluptatem et suscipit quisquam nulla rem. Itaque ex fugiat culpa labore iusto.', 'Illum est modi nihil ipsam officia animi corporis suscipit. Consectetur fugit qui odio nihil sed. Et incidunt sit eos magnam possimus.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(279, 'Id aliquam omnis voluptatibus voluptate corporis. Unde sint facilis est harum adipisci. At cupiditate perspiciatis eos aut.', 'Corporis quasi similique deserunt est nesciunt ab ea. Veritatis id distinctio commodi iure voluptate id ipsam. Reprehenderit et voluptas et ab veniam dolorem. Temporibus ut qui libero vel.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(280, 'Illum minus eos et et recusandae. Qui amet incidunt magnam pariatur architecto reiciendis. Molestias consequatur aut ullam autem veritatis maxime ipsum minus. Dolores rem dicta illo sit.', 'Sunt quo quo illum eum aut deleniti ab. Consequatur officiis aliquam optio officiis sit aliquid saepe fuga. Dolorem nesciunt quo amet pariatur sunt.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(281, 'Libero perspiciatis similique consequatur excepturi. Omnis molestiae dolores excepturi rerum labore aut placeat. Ad et qui aliquid veritatis voluptas rerum. Vitae libero consequuntur fugit maxime. Commodi voluptatem enim nisi ut ducimus magni mollitia.', 'Non consectetur pariatur perferendis. Eveniet sequi autem ut aliquid voluptas quia unde. Est nostrum velit natus quisquam non.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(282, 'Nemo quae totam accusamus molestiae laboriosam facere doloribus. Quae exercitationem quia eos placeat omnis sint architecto. Nulla cum laboriosam aut consectetur quis. Rerum nemo rerum aliquam commodi nesciunt. Magni amet fugit temporibus dolor corrupti.', 'Magni vitae maiores rerum et eum. Culpa distinctio enim nihil. Aut quo ut et exercitationem deleniti dolor.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(283, 'Nihil dolor necessitatibus dicta et ea id nesciunt. Nulla non eius similique aliquam quaerat maiores. Minus doloremque magnam repellendus.', 'Nihil laboriosam quas voluptatem. Architecto nobis architecto incidunt vel veritatis unde odio. Et laborum enim voluptatem. Error et ea cupiditate velit natus animi.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(284, 'Unde placeat error nihil aperiam. Veritatis quis similique rerum earum qui sint id itaque. Nemo est maiores in incidunt commodi repellendus molestias.', 'Repellat iure sed dicta. Et voluptas debitis est ipsa ea repellat soluta non. Itaque iure nobis perferendis sit ab repudiandae fuga eum.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(285, 'Commodi magnam eos tempore totam veritatis. Quia et cumque ut dolor quidem facilis. Doloremque quasi dolor iure.', 'Qui quis delectus magni dolor. Qui earum aut ut incidunt officiis. Asperiores porro debitis temporibus nulla ea error necessitatibus.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(286, 'Consectetur quasi nihil blanditiis hic. Laborum nihil occaecati a qui. Modi culpa eius ut. Facilis nobis et nulla dolores qui est perferendis.', 'Laborum odit corrupti aspernatur non sint. Amet incidunt quos nihil sit fugiat. Est facere quia qui aliquam. Ut commodi atque soluta eos adipisci at.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(287, 'Iure nemo rem vitae saepe nemo ut nemo. Non rerum quia nulla natus voluptatem ratione voluptas dolores. Nostrum quisquam earum distinctio aut. Facilis nulla optio labore doloribus.', 'Consectetur voluptates tenetur iste omnis. Assumenda consequatur vero vitae. Blanditiis ipsa sed quis ut cumque.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(288, 'Est et animi quia dolorem voluptatem. Quam quidem non suscipit laudantium quibusdam quo. Saepe sed impedit itaque sint doloribus qui autem. Sit facilis voluptate veniam suscipit laboriosam unde. Odit enim explicabo tempora eos et sed voluptate labore.', 'Quia expedita culpa exercitationem unde rem. Minima pariatur qui vitae suscipit et voluptatem explicabo. Placeat saepe quae consequatur. Aut ratione aut nemo.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(289, 'Accusantium autem et magni enim voluptas. Voluptate sequi molestias et vel ea amet. Eligendi quaerat nobis cumque reprehenderit similique qui expedita.', 'Sit quidem est non error ea rerum. Et molestiae delectus perferendis sapiente et perspiciatis fugiat. Cum dolores voluptas excepturi veritatis ad a. Similique voluptate est optio illo et.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(290, 'Quis et omnis iusto harum illum repellat maiores. Earum ut quae et eaque sit. Quo animi fuga eaque ut alias voluptatem recusandae ad.', 'Tenetur laboriosam aut molestiae autem. Atque et quaerat vel tempore fuga dignissimos sit quam. Nobis quia aut nihil cum recusandae facere. Cum magnam non laborum voluptate.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(291, 'Et culpa autem iste enim cupiditate. Qui rerum est expedita dicta ut. Quam sit ut unde quia nemo nostrum. Occaecati rerum fugiat est laborum occaecati velit.', 'Magnam facere qui consequatur et. Quis fugiat iste et voluptatem vero molestias quas. Et labore dolor tenetur iste quo quod sint.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(292, 'Aliquam aspernatur similique ipsum autem ipsum rem quo. Sint explicabo et architecto qui et fugit. Cum omnis debitis ea optio error exercitationem. Quidem libero ut iste odit fugiat dolores.', 'Repellendus eum quis est. Occaecati corrupti sint dolores autem corrupti iste fugit. Et omnis ut et facilis.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(293, 'Dicta nihil debitis corrupti beatae repudiandae sit fuga. Voluptate quibusdam dolor et provident harum et. Magni odit incidunt sit quia molestias quia.', 'Esse dolores dolores sequi soluta labore qui. Atque suscipit sunt officia quia ea consectetur. Ut aut sit iusto repellendus sed in. Officiis nemo ut et ipsam sit. Atque repellat quis placeat aut.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(294, 'Nobis libero molestias aut perspiciatis possimus. Suscipit dolorem sunt id deleniti. Doloribus qui est ullam rerum sunt. Quo facere consectetur alias sint incidunt dicta recusandae. Qui omnis totam sed maxime et sequi.', 'Qui repellat aspernatur consequatur ad. Eligendi quam dolore eius quibusdam hic. Qui non aperiam doloribus quia. Deleniti omnis rem sed est eius deserunt odio. Pariatur eos est modi.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(295, 'Cumque ut est nostrum quos libero repellendus quam. Temporibus explicabo ea quia quidem. Dolore amet sequi quasi optio ducimus. Cum placeat quia reprehenderit nihil sed explicabo dolor. Blanditiis aut dolor modi omnis dolores nemo nesciunt.', 'Voluptate error consequatur quod. Repudiandae modi nesciunt quod repellendus quos. Iusto consequatur cupiditate possimus voluptas praesentium delectus.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(296, 'Ullam animi laboriosam dolore facere repudiandae non. Molestiae nulla numquam recusandae blanditiis fuga vero non. Qui delectus nam quos quia eius.', 'Necessitatibus optio cum et dolores labore sapiente modi. Ullam dolorem est tempora non amet dicta nihil. Eaque est laborum et inventore et. Quia laboriosam ipsam facilis vero dolorem.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(297, 'Nostrum sed aut vero numquam. Dolor voluptate est est amet corporis. Sequi accusantium sit eos cum eos magni.', 'Et assumenda voluptatem vel tempora deleniti id eum. Veniam quo omnis id enim et. Veritatis ipsa assumenda blanditiis et unde ut cum dolorem.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(298, 'Et saepe debitis officiis ut ut sint. Qui qui voluptatem laboriosam. Deserunt dignissimos et et exercitationem quia aperiam delectus earum. Vel aperiam dignissimos ex excepturi eius cupiditate.', 'Sit ut numquam sequi. Consequuntur illum vitae est vitae voluptatibus expedita et illum. Commodi commodi sint aliquid quidem sint culpa dolore accusantium.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(299, 'Molestiae necessitatibus rerum dignissimos quia. Ratione sed ea officia veritatis eius saepe omnis. Et nesciunt aut voluptates et aut explicabo. Ut magnam consequuntur tempora qui.', 'Dicta et laudantium a et fugit minus. Quia ipsam consectetur voluptate itaque.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(300, 'Voluptatem minima expedita dolorum voluptatem. Et in ut voluptas quis. Doloremque quibusdam fugit porro iusto fuga rerum incidunt. Commodi similique non modi eligendi cum vel et.', 'Dignissimos tempora dolor vitae assumenda minima. Nihil ut asperiores maiores sed eligendi. In natus id eveniet maxime dolore inventore totam maiores.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(301, 'Consequatur dolore quaerat animi sed qui harum eveniet. Hic tempore deleniti qui quidem doloribus est. Quod quasi ex consequatur aut non et. Beatae et sint voluptas quis modi dolor.', 'Quidem iste quas quia corrupti unde. Recusandae reiciendis et sed.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(302, 'Ipsam sit necessitatibus et omnis. Quos dolorum asperiores sit est repudiandae.', 'Velit ut hic qui minus. Maiores amet dolorem id. Adipisci nihil officiis laborum sint id et ut. Doloremque reiciendis aperiam aut aut temporibus. Similique vel repellendus eos.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(303, 'Rerum itaque deleniti voluptatem rerum. Qui quaerat eos dolor tempore. Velit temporibus neque culpa.', 'Tempora rem dolores incidunt iste quaerat dignissimos perspiciatis autem. Esse corporis quis placeat dolores dolores soluta nisi. Recusandae blanditiis quis sunt dolorem deserunt omnis laudantium.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(304, 'Reprehenderit facere voluptatem vel hic excepturi suscipit. Fugiat molestiae harum dolor a aut veniam. Deserunt praesentium tenetur ad cumque.', 'Et vero quidem officia et aliquid quia vero totam. Ad placeat perferendis ipsam cum occaecati dolores perferendis. Dolore suscipit dolorum rerum ipsa. Vel iusto odit sint voluptatem.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(305, 'Non temporibus soluta iure. Maxime qui itaque molestias incidunt. Soluta laborum omnis enim est itaque omnis perspiciatis.', 'Dolores qui dolor et quis. Sit recusandae voluptas eaque consequatur rerum dolores qui. Ut fugit sint deserunt molestias aut rem.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(306, 'Perspiciatis eos iusto qui veritatis sit. Ipsam aut commodi illo et. Magni ut sequi sequi quia sunt sit eveniet quae. In minima dolor sunt accusamus.', 'Blanditiis quae quae voluptatem est magnam quidem. Voluptate sunt beatae recusandae quia modi aliquid numquam. In ea sit odio ratione asperiores nobis dolores. Omnis quo voluptatem nihil quisquam.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(307, 'Perspiciatis ratione deleniti placeat qui sit. Soluta eos ratione inventore rerum eum quia necessitatibus sed. Debitis rem adipisci odit dolorum id repellendus.', 'Omnis consectetur porro modi eveniet aut at. Molestias nesciunt voluptates fugiat omnis ut. Dolor est facilis quis distinctio ipsa iste.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(308, 'Ipsum nobis consectetur quaerat. Praesentium assumenda minima quaerat dolor. Occaecati natus atque repellat earum odit.', 'Suscipit unde est voluptate blanditiis veniam asperiores. Officiis eum distinctio et ullam. Nemo ut et id vero laudantium cupiditate. Eius autem doloribus delectus atque voluptatem facilis.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(309, 'Excepturi voluptatem consectetur vel accusantium laboriosam ut. Quas nisi voluptate voluptatibus harum tempore odio. Sed quae ex iusto qui. Qui sapiente et tenetur delectus enim sint molestiae.', 'Et odit non natus. Minima omnis aut repellat. Deserunt ad expedita et in officiis. Ratione repellendus nostrum accusamus in id et et. Est nihil sit est debitis et error.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(310, 'Sit velit id ducimus incidunt sit quaerat rem ipsa. Rerum esse id in accusantium debitis quo. Quia officia at recusandae facilis excepturi.', 'Quibusdam ea amet possimus eum tenetur autem. Perspiciatis autem qui totam saepe sed consequatur atque. Magnam incidunt ea minus corrupti molestiae.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(311, 'Natus saepe earum tenetur magni. Sint dignissimos adipisci animi occaecati dolores. Consequatur dolores saepe cupiditate in reiciendis cumque.', 'Doloribus rerum quos asperiores. Est in corporis amet eos sint veritatis hic.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(312, 'Nisi aut voluptas qui et ea debitis ex. Iste rem consequatur ea et ipsam. Accusamus nemo architecto et vero. Aut quo sed ea explicabo eos.', 'Et est dolor eum dolorem dignissimos excepturi. Fuga earum excepturi reprehenderit omnis quis ea aliquid. Est eius et nulla suscipit error nisi eligendi.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(313, 'Quos ad aut qui in numquam. Sed ut quisquam molestiae deserunt aperiam. Expedita voluptatum inventore suscipit ea officia a.', 'Est consequatur qui odit illo eveniet ut ea. Odio numquam harum blanditiis non. Cupiditate accusantium nisi quasi et. Blanditiis aliquid vel ut eaque.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(314, 'Quisquam ea dolor similique repellendus enim soluta. Laborum rem error vel est itaque voluptates et voluptas. Est laudantium quaerat nulla rerum qui adipisci ab.', 'Ut impedit id omnis maiores consequuntur qui laborum. Aut quibusdam deleniti dignissimos sit unde. Sunt architecto aperiam mollitia. Rerum fugit repellendus commodi.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(315, 'Et doloribus ratione velit nihil quam. Totam voluptate praesentium et corrupti doloremque ab. Non tenetur magnam quaerat.', 'Voluptatem dolore temporibus architecto incidunt. Quos impedit voluptas maiores dolores nobis. Totam quia minima repudiandae eum.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(316, 'Ipsum qui dolores enim quae. Natus quis ipsam magnam dolorum voluptatem ut. Qui tempora non voluptatem dolores.', 'Sint quaerat eaque enim vitae quia unde. A ipsam facilis et facilis molestiae sapiente quidem rerum. Corrupti culpa pariatur et voluptatem eos omnis. Quis temporibus amet aut adipisci.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(317, 'Sint et officiis est omnis inventore similique itaque. Reprehenderit dolorem officiis ut quasi qui. At asperiores est consequuntur provident.', 'Atque suscipit alias sed. Excepturi nisi quis rem sed atque voluptates. Ut maxime eos nam sint iste eum odio voluptas. Nobis et sapiente ipsa totam magni quam.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(318, 'Voluptatibus soluta voluptatem voluptate vel. Sint et maxime nesciunt in quisquam nesciunt modi. Ut laudantium fugit totam et accusamus. Eum dolore ab voluptas.', 'Consequuntur nesciunt assumenda at quos quia. Aut omnis dolorum et perferendis minima aperiam. Nisi molestias facilis at similique voluptatem molestiae nostrum. Iusto enim rerum nam veniam.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(319, 'Quisquam et omnis voluptatem. Voluptas eum quod rerum molestiae exercitationem magni. Ut perspiciatis dolore natus quam voluptates. Quas voluptas quos aut officia.', 'Aut optio sed amet nihil voluptatem voluptatem. Quis eum esse perspiciatis. Et et veritatis id minima facere tenetur. Mollitia qui repudiandae ut eum debitis rem sunt.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(320, 'Provident aut labore quis et repellendus expedita aperiam repudiandae. Corrupti perspiciatis autem dolore eos maxime ipsam delectus. Unde eveniet sapiente labore qui dolores eius.', 'Sint deleniti animi cupiditate possimus in. Quaerat velit neque sed saepe nostrum soluta non quidem. Doloribus et in similique sint libero ad id. Inventore ea laboriosam et in.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(321, 'Itaque expedita facere iste porro. Est occaecati porro incidunt dicta doloremque ea qui. Repellat laborum quia eveniet maiores qui eaque praesentium.', 'Magnam voluptatem est cumque ut commodi ipsum. Est officiis aut et occaecati.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(322, 'Sint aliquam sed reprehenderit deleniti molestiae natus assumenda. Aut ratione id modi ut. Iure ipsum et officia velit qui ut.', 'Facere aut consectetur modi voluptas. Repellendus est iste adipisci aut dolor. Quaerat voluptatibus dicta et non possimus.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(323, 'Voluptatem quia architecto quia. Sed est provident labore sunt modi ad a. Et doloremque assumenda quam sed cum inventore velit. Dignissimos labore nisi quo et ratione. Quae et et iure repudiandae. Sapiente accusamus quisquam sunt sed nihil cum.', 'Consectetur illo id necessitatibus earum ut voluptate eum aut. Possimus delectus sed assumenda impedit eaque optio. Et modi reiciendis provident ad aut magni.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(324, 'Ad ut at quibusdam aliquid ut sed. Quos eveniet dolorem ut voluptas quis qui et. Sed est perspiciatis mollitia architecto ea eos.', 'Aperiam quod aut a tempora aut. Eum quo minima libero. Vero in ipsam voluptate necessitatibus. Iure eos nostrum molestiae impedit itaque earum.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(325, 'Molestiae ullam voluptatibus necessitatibus inventore sit consequatur laborum. Laudantium provident consequuntur ex aut voluptatum at impedit ex. Beatae occaecati aliquam eum eius.', 'Veritatis nobis voluptas ut qui repellendus aut sed. Reiciendis fugit culpa doloremque deserunt. Et ut voluptatum quod distinctio et et.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(326, 'Velit recusandae et mollitia quae reprehenderit. Atque enim fuga neque nobis aut error. Enim est enim quis.', 'Harum reprehenderit ea et dolorem qui. Suscipit quae voluptas enim et esse. Quaerat voluptas optio beatae aliquid mollitia ratione.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(327, 'Sit rerum enim rerum vel. Voluptatem amet quaerat corrupti natus quos ducimus amet sunt. Accusamus veritatis adipisci atque et harum illum. Voluptas nisi est saepe consequatur repudiandae eius. Quis provident numquam saepe ut voluptatem sed aut.', 'Sit labore asperiores et. Qui sed quos velit natus autem pariatur.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(328, 'Molestiae quibusdam voluptatem officiis ut eligendi et esse. Error numquam voluptas necessitatibus quia sit. Aliquid aut fugit et. Eaque tenetur quisquam et.', 'Sint totam ab et aut rerum ut molestiae. Aut molestiae eligendi minus quod ad quisquam. Officiis non sit aut aliquid vel. Maxime ipsam deserunt et non dolores.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(329, 'Et laudantium laborum aut ab ipsa enim natus et. Omnis optio nisi dolores optio et nulla. Quia ducimus dolore repellendus commodi laudantium vitae omnis. Est voluptatem dicta quas omnis asperiores nesciunt.', 'Et error ducimus minus. Earum illo laboriosam quod commodi. Rem dolor omnis vel voluptatem iure et soluta.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(330, 'Debitis voluptatum facere sint molestiae autem ex autem. Consequatur soluta praesentium sequi est nisi. Nisi officia qui facilis dolorem.', 'Sunt delectus mollitia aut ratione sit omnis. Adipisci et at provident. Quisquam sed consequatur eum ut. Sunt incidunt distinctio nobis dolores saepe veniam.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(331, 'Ut nemo fuga autem enim. Aut rem accusamus animi debitis. Voluptatem ea totam assumenda exercitationem quasi et. Quidem soluta aut consequatur excepturi commodi est sit sint. Quam nihil sit qui. Quis minus asperiores veniam sequi.', 'Dolor sapiente et fuga. Placeat voluptatum consequuntur corrupti. Repellendus veritatis ut dolores atque.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(332, 'Inventore molestiae accusantium praesentium ea itaque soluta sit. Ea rem et accusamus ut exercitationem. Beatae consequatur et consectetur quaerat iure. Explicabo omnis ipsa et et rerum.', 'Qui quibusdam earum laborum aspernatur explicabo. Iste voluptas dicta mollitia molestiae aliquam voluptas. Reiciendis sint commodi dolores expedita placeat at ut velit.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(333, 'Libero animi molestias id. Non et enim maxime est fugiat molestiae. Ratione unde inventore qui vel et minus impedit ad. Repellat et neque officiis praesentium et.', 'Sunt voluptatum placeat iste laborum. Tempore et nam corrupti optio temporibus reprehenderit. Non vel nihil vel rerum consequatur. Modi vel adipisci aperiam inventore repellendus velit.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(334, 'Rem natus aspernatur enim in est aut. Tempore est illum cupiditate dolores sit quia exercitationem necessitatibus. Eaque numquam et error quas quibusdam. Voluptatem illo perspiciatis placeat sint dolore perferendis aut.', 'Dignissimos quasi expedita magni sit harum numquam. Cupiditate in voluptatum itaque quia. Tenetur perferendis quibusdam rem autem reiciendis autem.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(335, 'Explicabo accusantium voluptatem perspiciatis voluptate quis. Atque et pariatur quis in. Repellendus impedit nobis aut in autem et et voluptate. Aut quia deserunt quis reprehenderit non.', 'Magni quia placeat nihil cumque deserunt placeat. Quae tempora facilis voluptate ipsam dolorem accusantium. Neque consequatur culpa labore aliquam amet.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(336, 'Placeat quis cum voluptatibus dolor. Molestiae eos dolorem atque reprehenderit deleniti et omnis dolor.', 'Est eos inventore reprehenderit. Sit et aperiam est quibusdam. Consequatur ipsum impedit non accusantium. Asperiores ut vero molestiae. Et enim iure et modi consequuntur.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(337, 'Aut facere nisi amet iste voluptatem quia excepturi. Sequi ad eveniet velit. Reprehenderit veniam harum rerum amet. Saepe nemo officiis perspiciatis sequi. Eaque officiis adipisci id omnis et officiis. Veniam sunt eveniet unde eligendi eligendi impedit.', 'Similique sit cupiditate minus suscipit neque exercitationem ut. Fugit facere nulla in modi commodi accusamus ipsam. Eaque autem enim corporis temporibus beatae.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(338, 'Ea ut omnis impedit sed nam ullam et consectetur. Aut ut dicta quibusdam laborum non maxime non. Voluptatem doloremque eos voluptatem vero molestiae inventore. Dicta rem earum rem ut vel.', 'Culpa recusandae cum consequatur et aliquam facere. Minus qui autem ut aliquid. Dolorem est inventore exercitationem consequuntur tempore omnis. Natus et sed explicabo sunt optio.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(339, 'Autem dolorum debitis ratione provident. Omnis alias molestiae placeat et aliquam.', 'Eaque voluptates ducimus autem incidunt nihil. Libero sint et ea consequatur suscipit aspernatur. Assumenda ea omnis quae.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(340, 'Dolorem numquam voluptate maiores ipsum beatae. Qui animi asperiores enim occaecati et. Vel sit ipsam rerum ut voluptates est alias. Sed ipsa vel reiciendis voluptatum magni cumque eum sunt.', 'Aperiam dicta reiciendis nulla enim. Facilis unde officia sit ut. Et earum autem minus harum ducimus non. Vel nobis distinctio quo at perspiciatis autem numquam.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(341, 'Id quia beatae et aut. Nulla totam culpa ullam cumque commodi. Ut in quam at. Quis dolores aperiam eos. Temporibus eligendi nostrum cum. Et omnis consequatur dolor distinctio pariatur. Consectetur dignissimos possimus eos quo dolore.', 'Quam sunt corporis natus mollitia. Ipsa possimus qui tenetur repudiandae. Repellat tempora exercitationem debitis voluptatem non dolorem porro. Neque maxime velit ut accusantium consequatur rem.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(342, 'Pariatur rerum non voluptas. Et deserunt reiciendis dolor et a placeat. Facere nihil delectus repellat et.', 'Quibusdam ut blanditiis vitae consequatur qui dolor nam voluptate. Est quia perferendis officiis eaque. Libero nam ullam consequatur.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(343, 'Minima tempore tempora sequi maiores ducimus. Excepturi quis asperiores exercitationem eos corporis quia assumenda. Quidem corporis et voluptatem ut eum. Aut sed nihil aut.', 'Aut possimus molestias veritatis eum expedita repudiandae. Enim voluptatum perspiciatis ut tempore repudiandae.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(344, 'Est placeat ut consequatur quia. Est in qui numquam earum ipsa. Explicabo est dolores ab inventore odio. Minima voluptates illo soluta perspiciatis.', 'Est quaerat qui facilis asperiores quis aut ut. Vero architecto totam necessitatibus eaque in. Aliquam excepturi sequi ut repudiandae. Vel tempora aut voluptatem earum.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(345, 'Molestiae expedita voluptate laudantium nemo. Architecto nam quisquam cupiditate voluptatem aut. Nobis eaque ducimus numquam aut.', 'Non aperiam quia debitis et reprehenderit tempore temporibus nam. Officia error ea molestiae omnis voluptatem. Eos architecto nihil nostrum maxime. Alias at et maxime voluptate dolorem.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(346, 'Ut vitae impedit quisquam a exercitationem. Soluta illo in unde magnam. Consequatur perferendis impedit doloribus illum. Iste voluptate nam quidem sunt et nostrum. Minima impedit sed mollitia minima illo sunt occaecati.', 'Aliquam necessitatibus voluptates sunt dolores nihil. Hic nisi voluptatum sapiente sed esse. Dolor enim vitae optio magni iusto. Iure odit labore molestiae nihil.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(347, 'In esse qui ullam dolor ad veritatis. Magnam recusandae aut minus cupiditate voluptatum odio nihil. Quisquam saepe accusantium aliquid ipsam id aut omnis.', 'Qui placeat illo ut voluptates tempore. Veniam voluptas consequatur aut libero deserunt esse voluptatem perspiciatis.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(348, 'Totam magnam odit eos dolores id. Tempora velit id ut velit repudiandae rerum aut. Nisi voluptatem repellat non unde perspiciatis reprehenderit aperiam.', 'Corporis blanditiis voluptas et quo voluptate maiores officiis. Doloribus adipisci asperiores eos voluptas est voluptates eveniet. Modi qui in sunt quisquam.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(349, 'Voluptatum ipsa voluptatem quia ut ducimus. Placeat beatae unde enim dolor vel in. Sit reprehenderit corrupti possimus vel. Consequatur magnam adipisci perferendis suscipit dicta eius.', 'Tempore ab ducimus ad reiciendis eum ab. Praesentium dolores quidem enim quae repellat debitis. Vero repellendus odit non aut et in eligendi.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(350, 'Perspiciatis adipisci non officiis accusamus ullam rerum itaque tempore. Quis dolorem et sed reprehenderit totam. Voluptas molestiae molestias at veritatis et est.', 'Et distinctio inventore cumque et consequatur autem. Non voluptas modi assumenda unde nam nemo rerum. Et in sapiente illo provident voluptates et. Minus consequatur pariatur rerum maxime occaecati.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(351, 'Beatae dolores autem at. Assumenda ullam eligendi eos aspernatur ullam libero. Doloribus sapiente consequatur iusto quos inventore ut.', 'Nihil quaerat sunt iste consequuntur. Facilis aut explicabo eligendi perspiciatis odio. Officia corporis voluptatum non quae vel eius vel. Quis officia est nobis et labore natus quo.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(352, 'Et hic aperiam ea perferendis. Aut quia cupiditate facere quia. Mollitia itaque dolor culpa numquam. Tenetur officiis sint assumenda enim est deserunt. Illum dolor nesciunt sed doloremque et asperiores impedit. Et vero aut consequatur atque dolore ut.', 'Eum suscipit et minima beatae iusto. Occaecati non quis dolorem commodi eligendi ut distinctio. Sed dicta ratione omnis officia.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(353, 'Sed eum voluptas numquam. Ut et vel rerum dolorem minus fuga harum. Dignissimos voluptatibus sunt consequuntur. Expedita similique eos aliquid libero.', 'Quia error cum occaecati quasi nam nemo nemo. Praesentium architecto voluptatem nihil illo mollitia. Natus reiciendis perferendis cupiditate optio sit.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(354, 'Ut blanditiis reprehenderit sed harum suscipit similique. Dolores ut esse qui. Sed aliquam dolores nemo beatae. Itaque est dolores a perferendis tempora. Ipsa quibusdam non minus non at quidem ex. Eum deleniti facilis rerum cumque ab qui molestiae.', 'Illum explicabo aut eum numquam alias exercitationem saepe molestias. Omnis nobis aut dicta.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(355, 'Eum rerum labore est delectus commodi ut molestias. Exercitationem exercitationem temporibus at quas atque provident nobis reprehenderit. Iure voluptatem qui vel odio distinctio. Aut eos doloribus hic porro.', 'Accusamus est maxime sapiente eaque in. Et natus qui eligendi quia. Qui ut aperiam illum sed iure. Deserunt alias recusandae ipsam culpa omnis.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(356, 'Corporis eos consequatur beatae consequatur magni quisquam rerum. Dicta sint laborum sapiente velit. Asperiores numquam aut eos cupiditate ea sint enim. Ab reiciendis iusto vero velit ab maxime.', 'Inventore fugiat quis debitis est facere sint expedita. Ab repellat est impedit quas iure voluptas. Ducimus quia dolor assumenda nesciunt.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(357, 'Nemo quia mollitia est deserunt at ea magnam cumque. Perferendis id rerum excepturi sit nam. Voluptas saepe id commodi consequatur fugiat iusto. Ea at blanditiis aliquid. Optio ipsa sit at at omnis. Tempora nostrum ratione delectus excepturi corporis ab.', 'Rerum magnam eum doloribus. Totam non recusandae recusandae qui eveniet repellat.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(358, 'Quam accusamus cupiditate in ratione velit aut nesciunt. Cum aut asperiores fugit et vel aut doloremque. Ut voluptas suscipit fuga blanditiis architecto.', 'Dolor sed totam quia enim dolor ut. Et consequuntur quos voluptatum delectus cumque itaque sit. Odio eum quo sit sit molestias rerum. Rerum dolor enim dolorum qui.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(359, 'Quod possimus dolor illum est doloremque. Numquam maiores vel quidem. Et vitae et blanditiis aut. Mollitia est expedita voluptatem perferendis nihil. Perferendis voluptas ea cumque aliquam. Tempore officia cupiditate corrupti earum suscipit commodi.', 'Et vel rerum accusamus est praesentium aut. Vero consequuntur aliquam cumque consequatur sit. Molestiae aut saepe quis nobis. Perspiciatis sequi sint odio voluptas inventore.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(360, 'Aut ratione nobis facere. Consequatur dolor ullam voluptas. Qui in tempora sapiente. Non tempore natus assumenda voluptate.', 'Odit hic consequuntur natus aut. Quis quia aperiam blanditiis fuga ut voluptatem. Optio est fugiat saepe eum aspernatur ut.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(361, 'Ab odio cupiditate excepturi ducimus. Dolorem voluptas et quia non exercitationem sint. Quia atque aut ut minus nobis consequatur qui. Quasi odio et magnam ut nostrum eum.', 'Et omnis sed ipsum. Ducimus aut blanditiis quidem omnis maxime. Eligendi et quos et rem. Cupiditate impedit voluptas reiciendis voluptate magni.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(362, 'Sit quidem facere sapiente recusandae est delectus. Tenetur dolores qui et. A nostrum et corrupti cum iure dolor aliquid. A nihil architecto sint rerum quia quidem voluptatum magnam.', 'Perferendis qui molestiae labore aut provident. Minus est minus autem quae sint debitis. Dolorum eaque odio quas inventore mollitia sit voluptas. Voluptas nemo voluptas quia ut beatae veniam.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(363, 'Repellendus quo voluptas repellendus quia est perspiciatis iusto. Quos corporis molestiae qui magni amet natus earum. Quo est earum odio quasi consequuntur. In necessitatibus quia rerum.', 'Nobis modi sunt ut omnis nobis rerum magni optio. In nulla aut ex. Est omnis et accusantium expedita. Quo et debitis doloribus ut.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(364, 'Fugiat qui fugit enim porro fuga. Et aspernatur dolorem aliquid facere cumque repellendus. Eum vel sit pariatur iure tempora tempore et ea.', 'Delectus officiis dolores accusantium quasi. Minus culpa repellat aperiam. Atque necessitatibus animi sed esse veniam molestiae.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(365, 'Omnis quae sunt ut. Est amet id porro optio. Minima aut sit et totam et dolores quod. Ipsum ut et impedit rerum amet non tempora.', 'Aspernatur illum quod mollitia ut est atque consequatur aperiam. Quas voluptatum nihil magni reprehenderit incidunt libero. Ut aliquam odio occaecati qui.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(366, 'Quia dolor aut similique. Vitae veritatis quia ab rem qui. Dicta culpa dolorum facere fugiat id nemo. Dolores nam ut velit unde.', 'Esse sint amet laudantium aut assumenda quia illo. Deserunt soluta velit nisi in sit eum perspiciatis ut. Qui dolorem eaque qui. Magnam unde qui aut enim unde.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(367, 'Temporibus rerum aut aut voluptatem nemo eum nam laborum. Eaque enim consequatur veritatis et sed veritatis consectetur. Eaque praesentium atque consequatur optio neque eius.', 'Tempore aperiam facere qui hic eos. Sit doloremque vel et est consequatur esse. Nostrum neque sed ipsum.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(368, 'In fuga id saepe cumque in necessitatibus. Quia ad labore unde minus possimus quaerat quam. Id minus voluptatem animi harum quas quia molestiae. Blanditiis ea sequi asperiores velit.', 'Maiores nesciunt labore maxime accusamus voluptas. Alias esse voluptatum at non. Deleniti sit rem natus molestiae et quae soluta. Eaque hic ullam in rerum.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(369, 'Dolorem omnis porro est aut quas quia similique ut. Optio quasi distinctio exercitationem aliquid. Architecto et amet nemo sit nam et doloribus. Corrupti et ad ea voluptatibus ut beatae. Repellendus qui facere quam et numquam quia odit quos.', 'Aspernatur non fuga dolorem quo nobis. Occaecati saepe facilis assumenda. Ipsa eos eos sint voluptatum in. Adipisci a iure aliquid est.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(370, 'Qui id non excepturi labore. Perferendis deleniti quia ullam eum illum commodi quia iste. Exercitationem quia est perspiciatis qui temporibus est aliquam odio.', 'Qui eum facere inventore sint modi incidunt. Nihil voluptatem voluptas officiis odit nostrum voluptate. Dolorum a cum qui odit sint qui numquam.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(371, 'Quidem similique minima suscipit omnis aut et. Autem velit expedita quam fugit aut minima. Vitae tempora omnis repellendus voluptas et et. Mollitia explicabo facere itaque fuga dolores recusandae aspernatur.', 'Dolor omnis corrupti sequi. Soluta voluptatem neque est illum optio inventore. Eos eos nobis ex itaque animi libero rem suscipit.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(372, 'Doloremque ipsa incidunt aperiam. Magnam quibusdam repudiandae temporibus quasi perferendis. Quasi voluptatibus eos in labore qui nisi.', 'Amet ea nulla culpa similique nesciunt autem. Atque iusto expedita provident exercitationem. Vitae ipsa provident soluta voluptatem sit rerum.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(373, 'Est ad molestiae molestiae. Aperiam aut numquam vel voluptatem blanditiis nobis. Cum sunt tempora dolorem fugit officia et. Voluptatem et deleniti ea aperiam.', 'Est deleniti dolorem labore laborum aliquam excepturi. Consequuntur beatae rem dicta ipsa et. Qui voluptatem inventore in laudantium aut ipsum quod. Laudantium doloribus illum ea repudiandae totam.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(374, 'Est est quia aut nisi. At est ut necessitatibus quod. Adipisci saepe quae ipsum eaque totam enim quasi. Velit consequatur quam quia est quia omnis.', 'Eius est sit rerum et. Sunt quas repudiandae inventore aliquam. Harum debitis ipsum corrupti reiciendis eum qui rem. Nesciunt est nostrum quisquam aut repudiandae ea recusandae sed.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(375, 'Dolor dolorem architecto fugiat sequi. Cumque consequatur perferendis provident et. Est sed quo ut. Ipsum ex sit reiciendis commodi dolores nihil delectus.', 'Aut mollitia illum voluptas qui vero corrupti sit. Laboriosam sint a ex deserunt ducimus. Recusandae velit qui nostrum autem aut et exercitationem.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(376, 'Molestiae maxime unde voluptatem esse voluptatem sint voluptatibus. Modi sapiente aliquid atque quis voluptas repellendus.', 'In aut corporis tempora. Placeat sapiente illum nesciunt repudiandae architecto consequatur laborum. Facilis ea illo numquam totam maiores ut. Iste voluptatum ut non aut et non explicabo.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(377, 'Quaerat quis error quibusdam error. Eos et tempora aliquid maiores. Ea voluptate quis et sint et. Repudiandae labore neque alias velit animi eos.', 'Velit quis deleniti harum nihil et ut placeat. Quidem qui et quia perferendis ut. Accusamus ab natus illo autem rem ut voluptatem. Iste aut numquam facilis optio ex dolorem dolores.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(378, 'Magnam blanditiis nemo ipsam est exercitationem eaque. Et qui soluta molestiae omnis. Quam dolorem consequatur natus voluptate. Aut incidunt ipsum ut et voluptas cupiditate.', 'Nisi rem ad quis sapiente ducimus. Sed exercitationem sint sint maiores. Deserunt rem maiores molestias hic eius sit.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(379, 'Odio cum expedita veniam at suscipit odio. Quia debitis similique veritatis natus dolor est quos. Tenetur et aut et consectetur rem deserunt.', 'Recusandae neque velit consequatur provident qui saepe quas. Provident natus sit modi dolor. Autem vitae incidunt sint illum. Nostrum maxime occaecati eum veritatis.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(380, 'Non et sunt in ut. Facere velit quo repellendus placeat ea harum. Qui sapiente consequuntur praesentium cum. Aut quis qui aut nesciunt harum sed.', 'Unde modi est molestias similique voluptas qui. Iusto doloremque hic omnis et iusto itaque odit maxime. Facilis nemo ullam corporis architecto et.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(381, 'Voluptatibus quis sunt velit quibusdam ad. Ipsum voluptatem voluptatem ab quo vero et eos velit. Est id repudiandae sit qui et rem. Maiores nobis perferendis corrupti dolorum. Facilis qui neque minus ullam consequatur eum.', 'Atque sed voluptatem labore iste. Tenetur quis omnis autem aut id at totam.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(382, 'Eum perspiciatis aliquam qui voluptates ea qui tenetur. Itaque voluptatum magnam sunt excepturi laudantium sint. Placeat perspiciatis earum qui. Omnis minima modi ad excepturi. Tempore ut est eaque in tempora laudantium.', 'Ad ipsum quis aut ab. Voluptatem laudantium ab sint laudantium sunt magni. Dicta quam quam omnis id.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(383, 'Voluptatem explicabo ipsa voluptas esse. Esse excepturi ut veritatis a magnam. Rerum voluptate saepe nisi.', 'Et perferendis aut aut est maxime. Minus quis dolore ex quis. Culpa nobis cum excepturi iste nostrum voluptas sed.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(384, 'Voluptatum sed pariatur et quae alias temporibus neque. Laborum quas omnis voluptatem natus et consequuntur corporis. Non itaque delectus voluptatem et rerum expedita.', 'Et eum ut non molestiae incidunt commodi voluptatum. Labore asperiores perspiciatis reiciendis quod architecto dolorem. Molestiae reiciendis illum et est.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(385, 'Consequatur maxime inventore aut suscipit rem. Aspernatur non maxime labore mollitia nulla et. Perspiciatis quia voluptatum est sit incidunt reprehenderit. Ut facere architecto voluptate sed est.', 'Aut molestiae incidunt veniam eligendi et. Repellendus est molestias voluptas cupiditate nemo perferendis.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(386, 'Minima facilis commodi praesentium illo ipsum qui quia. Et ut modi et dolores iusto. Sapiente doloribus est ratione exercitationem qui. Qui fugit voluptate distinctio quaerat.', 'A voluptatem quia architecto blanditiis et. Sed at soluta ipsa. Similique voluptas et voluptas fuga ex possimus perspiciatis. Vel occaecati unde omnis cupiditate deserunt officia aliquid optio.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(387, 'Fuga earum corporis qui tempora quo. Fuga eaque omnis quam suscipit dolor sed. Molestiae porro voluptatem vero et vero architecto quam ipsa. Sed soluta enim nihil nisi in.', 'Voluptas omnis laudantium vel molestiae quis corrupti porro. Laborum quasi placeat rerum consequatur. Molestiae corporis id illum cupiditate architecto qui aut incidunt.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(388, 'Nam natus eligendi corporis omnis eveniet rerum. Modi ipsam eveniet asperiores sint est eveniet. Cum explicabo autem odio hic sunt maxime. Adipisci et voluptas nostrum maxime iure nesciunt voluptatem praesentium.', 'Qui nostrum fuga quam nemo. Voluptatem et qui impedit ut nihil. Eum necessitatibus veniam praesentium amet nihil aut.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(389, 'Eveniet et atque fugiat rerum officiis quo. Voluptatem aliquid quasi voluptatum culpa. Tempora in nesciunt doloremque. Quis possimus dolores possimus consequatur eum omnis officia. Sed dolore enim minima qui.', 'Et dolore aliquam rerum facilis ut. Non magni inventore rerum eligendi ad.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(390, 'Et quas nesciunt maiores magni dolores sint. Earum eaque sed eum at quam. Ad at dolores beatae praesentium rem omnis. Rerum molestiae soluta quo cupiditate deleniti a.', 'Quidem tenetur sequi sint voluptatem sequi ut. Atque est unde voluptatem repellat enim ratione. Iusto non facere ab voluptas perferendis qui nam. Aliquid eum optio occaecati eligendi dolore alias.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(391, 'Aliquid fugiat et qui aut aperiam. Officia eum accusantium asperiores dicta. Consequuntur molestias omnis ipsa laboriosam ut architecto. Fugit harum cumque fuga maxime ipsam. Doloremque impedit voluptatem voluptatibus ullam.', 'Non laudantium molestiae necessitatibus et deleniti tempora. Consequatur et assumenda ad beatae. Totam nihil maiores est quod dolor.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(392, 'Ad sit similique soluta excepturi et. Officiis a consequuntur consequatur est qui mollitia. Est qui eligendi exercitationem aut quis fugit in.', 'Dicta ad expedita est possimus aliquid a animi officiis. Magni sunt id reiciendis aut. Dolorem magnam optio provident eius autem dignissimos.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(393, 'Qui ipsum est suscipit non. Nostrum animi dolorem autem reprehenderit incidunt beatae ut temporibus. Labore pariatur corporis molestiae expedita quia similique.', 'Libero esse mollitia consequatur eaque. Voluptas aliquam porro exercitationem veniam aliquam quae est. Eius iste non sit et id. Mollitia illum ex omnis sint. Suscipit quo sint quia omnis culpa.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(394, 'Harum odit et vitae quis suscipit esse. Doloribus autem autem mollitia perspiciatis cumque beatae. Et sed ab et sed saepe omnis. Commodi cumque facilis harum eligendi molestiae.', 'Ipsam officia accusamus excepturi voluptas repellendus autem. Assumenda ut autem eveniet et dolor amet explicabo. Commodi ut minima libero tempore. Enim qui ut consectetur non necessitatibus.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(395, 'Est ea officiis sint commodi porro. Qui et nihil nesciunt in ipsam corporis molestias. Quia perspiciatis officiis saepe eum eos ut enim voluptates.', 'Quod maxime deserunt eveniet eaque vel illo. Officia vel ullam ea. Adipisci cum repellendus non. Debitis amet repellat hic est.', '2021-11-20 14:47:53', '2021-11-20 14:47:53');
INSERT INTO `modeles_factures` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(396, 'Optio magnam tempore et non impedit. Omnis mollitia molestiae sint pariatur sed dolorem praesentium dolores. Est assumenda assumenda sed fugiat itaque magni sapiente vel.', 'Autem sed nihil recusandae tenetur. Quo et maxime esse dolores deserunt. Quam sit ut at quo eius illum. Minima pariatur consectetur voluptatem reprehenderit rem voluptate.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(397, 'Voluptatum perspiciatis inventore aut id sed magni consequuntur. Facilis in iure itaque rerum commodi quis. Sequi tenetur itaque hic velit mollitia pariatur sit. Exercitationem cupiditate quia eum consequatur.', 'In dolores voluptatum rerum. Omnis maxime ut distinctio culpa consequatur est vero. Consequatur dolores cupiditate eligendi.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(398, 'Pariatur placeat et nisi. Distinctio fuga vitae at magnam hic enim. Nisi iure esse tenetur aut. Est unde est beatae eos. Inventore quia rerum fugiat necessitatibus est quis facilis. Voluptate aut sint quam omnis. Illo architecto id commodi accusantium.', 'Id beatae praesentium laboriosam quasi. Qui et alias magnam similique aut. Dignissimos numquam laudantium sit in quos.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(399, 'Iure omnis voluptate esse dolores. Et earum tempora molestiae deleniti ut. Sit accusamus molestiae in possimus. Non fugit dolorem quas aperiam consectetur qui vero.', 'Ipsa totam officia ea consequuntur enim dolores. Excepturi et nobis ab vero repellat repudiandae aut. Omnis consequatur autem qui numquam optio facilis.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(400, 'Voluptas cupiditate et magnam nulla porro doloremque. Placeat nesciunt sit architecto odio. Quia expedita cupiditate voluptas sequi ea.', 'Qui minus unde molestiae. Quia praesentium laudantium est eius repudiandae. Molestiae ab consequatur repellat distinctio saepe. A sed quia at veritatis.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(401, 'Quis nesciunt illo optio maxime similique. Et voluptatem quam facere unde. Porro est ipsum quia pariatur qui. Eius qui autem earum veritatis.', 'Voluptas natus maxime omnis pariatur sapiente qui quas. Consequuntur ipsam consequatur cumque recusandae rem vel. Error eum iusto libero officia.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(402, 'Voluptatum veritatis beatae nesciunt perspiciatis qui ut aperiam. Quia delectus dolorem eos placeat. Ut non culpa accusantium est.', 'Enim ea sint vero quos et natus tempore. Sapiente est deserunt adipisci modi eos beatae est. Molestiae laudantium voluptatem repellat quam eos. Qui fugiat aliquam quia dolorem recusandae.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(403, 'Dolore perferendis accusantium incidunt consequatur natus. Officia cupiditate consequatur harum dicta quia id. Impedit qui ut corporis architecto numquam rerum at. A minima amet ratione est. Laborum distinctio est et molestiae minima enim atque.', 'Ea est ea tempora est dolorem. Possimus et provident rerum. Minus in fugiat magnam quia praesentium sit ut.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(404, 'Officia nam ut quibusdam sunt explicabo. Itaque quidem voluptas laborum sapiente voluptatem error. Vel esse dicta ea saepe. Eaque possimus neque accusantium unde ullam ducimus.', 'Sed magnam temporibus et nihil magnam quisquam. Dicta eaque aut voluptatem omnis facere corrupti tempore.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(405, 'Sequi ut tempore optio dolor sapiente eius. Ut quia expedita perspiciatis laudantium soluta similique occaecati. Excepturi eum dolores velit deserunt fuga optio ipsa. Est voluptatem quibusdam quis.', 'Ut nostrum voluptatem vel dolorem inventore. Dicta iste et modi tenetur saepe architecto sunt. Unde quia at quaerat. Repellendus atque ut ut repellendus tempore numquam rem.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(406, 'Quos tempore praesentium voluptas quia. Qui aspernatur velit quis perspiciatis asperiores possimus. A non saepe distinctio placeat officiis quis qui. Ut quam occaecati labore occaecati alias et.', 'Ullam quo dicta deleniti quam. Dolores ut sit iure aliquam quibusdam. Consequatur placeat quis doloribus minima quo.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(407, 'Consequatur quod magni et sed et et. Voluptatem magnam quas nostrum ut deserunt mollitia nihil. Est temporibus sequi doloremque expedita porro. Eum autem temporibus optio.', 'Et qui magnam eos soluta tempore. Veniam molestias doloribus voluptas adipisci. Nostrum dolorum et possimus consectetur molestias rerum voluptatibus.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(408, 'Dolore et perferendis culpa sint. Eum id quo dolorum perspiciatis beatae. Molestiae pariatur quia sed commodi quia. Nobis rerum non tempore recusandae omnis excepturi. Nisi dolorem consequuntur vel natus.', 'Magnam natus non perferendis qui. Iusto placeat sit quis repellat. Dolorem quidem sunt voluptates reiciendis temporibus nihil architecto.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(409, 'Quo in vero dolor quo. Dicta et fuga qui molestiae corporis perspiciatis qui esse. Qui repellendus ut blanditiis accusamus vero. Repellat ad non qui consequuntur.', 'Enim tenetur unde perferendis qui pariatur vitae facilis. Velit est sit et nobis maxime. Veritatis quisquam animi quia facere. Porro aut cupiditate sed consequatur sit et.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(410, 'Nulla ut unde voluptates ut dolores in et. Esse dolores alias ratione cumque modi dolore. Quis et quae inventore culpa nesciunt in modi qui. Corporis nulla necessitatibus aut nesciunt rerum sed.', 'Omnis quidem delectus iusto ut et. Est magni accusantium ut deserunt delectus nulla eius sit. Voluptatem esse deleniti magni commodi molestias.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(411, 'Velit porro qui et iusto est est esse. Praesentium repudiandae possimus sapiente ea. Laborum libero aperiam ut minus libero quo.', 'Aut incidunt quasi dolore ut reprehenderit voluptates autem. Commodi commodi et velit sit id. Magnam placeat officiis possimus tenetur velit explicabo aut.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(412, 'Quisquam natus quam eum nam. Autem id esse praesentium sunt. Odio officia tempore sit. Et perspiciatis voluptas dolores illo totam. Occaecati enim accusamus fugiat odit iure. Vel tenetur sit quo vero et qui.', 'Et sapiente sit dolor dolores perferendis. Nobis aut nobis est alias. Et voluptas excepturi voluptatem accusantium et.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(413, 'Ea quia corporis corporis voluptates facere. Quibusdam quia ipsum dolorem delectus tempora et nostrum est. Labore at ut amet nihil quidem natus temporibus. Dolor molestiae beatae dignissimos. Libero voluptatibus nulla magni ipsum.', 'Iusto placeat dignissimos voluptas voluptatum est praesentium et. Amet maiores voluptatum perspiciatis eum perferendis qui nesciunt. Itaque quibusdam consequatur molestiae officiis.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(414, 'Consequuntur reprehenderit atque voluptatem debitis est nobis. Dolores magni pariatur est saepe nostrum sunt saepe. Placeat saepe optio sint neque ea iusto. Et adipisci atque placeat.', 'Sit in magni rerum ut. Et non placeat distinctio deleniti enim. Tempora voluptatem qui iste quibusdam expedita quam nemo aut. Et ratione sint odio.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(415, 'Molestiae assumenda ut voluptatem sunt at. Voluptas quae pariatur corrupti perferendis dolorem aut ipsum. Non in aperiam tempora iure voluptatem. A sit voluptatibus nulla quis repellat. Minima quae pariatur est id eum similique et.', 'Mollitia error corporis commodi ut omnis maiores et. Non ratione veniam ipsa veritatis maxime. Ex odio dolorem quia ut dolorum veritatis veniam.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(416, 'Rerum qui saepe reprehenderit aspernatur vel sunt ut magni. Ducimus aspernatur doloribus ut qui est et in. Quia et aperiam aut voluptates qui. Rerum qui quod repellendus voluptates alias aut. Sunt pariatur magnam expedita amet repellendus et.', 'Repudiandae iusto fugit molestiae et impedit tempora omnis. Impedit reiciendis voluptatum autem dolorum adipisci est asperiores. Quidem vel numquam quia et.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(417, 'Facere non non fuga. Molestiae ut necessitatibus inventore omnis quia recusandae necessitatibus sunt. Ducimus fuga rem autem. Sequi quia quaerat aperiam dignissimos at error.', 'Voluptatibus eaque consequuntur aspernatur architecto aut ad et. Ea eum debitis consequatur. Assumenda recusandae nisi molestiae vero.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(418, 'Possimus iure fuga quas ut. Est eum delectus placeat sit et fuga minus. Dicta voluptatem et iure illum nesciunt.', 'Et aut animi dolorum. Adipisci perspiciatis amet voluptates excepturi est distinctio. Odit et blanditiis quasi enim.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(419, 'Distinctio asperiores perferendis ducimus. In debitis modi nesciunt recusandae. Recusandae omnis et quae. Sit maxime dolor aut. Odio in recusandae culpa nesciunt nihil dolorum beatae. Quis ex omnis illo consequatur.', 'Ut illum sunt et doloremque. Itaque ullam velit rerum saepe cumque. Quod ratione sint dolorum est.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(420, 'Dolorem natus quis distinctio eius aperiam fugit. Architecto assumenda eveniet voluptates quam reiciendis nihil. Porro consequatur quis excepturi vero incidunt dolorem. Est eum voluptas neque adipisci eaque. Ab perspiciatis sunt quia laborum sunt.', 'Recusandae cupiditate qui iure possimus. Facilis aut sed a nam repudiandae voluptatem.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(421, 'Id in magnam facere dignissimos distinctio culpa ipsa. Molestias beatae dolor asperiores natus autem ipsam dolor. Qui corrupti quidem rerum enim. Doloribus nulla sunt delectus quaerat.', 'Vel soluta voluptas libero voluptate quia. Aut fuga omnis minus minima. Tenetur ad est harum et. Vel sapiente dolores et autem atque sed. Eius animi praesentium ut qui qui.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(422, 'Dolorem quia est omnis pariatur dolorem omnis porro. Repellendus est nobis voluptatem nobis eligendi et quia. Dolorem error aut beatae ipsa soluta eum. Veritatis dolor qui alias iusto.', 'Officia dolores enim velit sunt omnis. Voluptatem voluptas et molestias ducimus voluptatibus voluptate. Tempore accusamus corporis commodi dolor voluptate. Delectus qui ad non sit.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(423, 'Voluptas voluptas nemo non corrupti laudantium dolorem rerum. Esse enim aut unde quia. Et nulla non dolores. Atque ut distinctio architecto sunt. Quia magni odit harum aliquid impedit.', 'Non omnis esse voluptatem eum consequatur rerum autem. Voluptatem rerum quam quo delectus quam neque nostrum natus. Doloribus laborum voluptatem omnis nesciunt quibusdam sit.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(424, 'Placeat quis delectus eum dolore. Voluptates sit tempora eaque in dolorum iusto. Illum quidem inventore culpa ipsa illo quia delectus. Dolorum officia itaque inventore.', 'Eos laudantium eius doloremque quo vero quo. Aliquam totam molestias minima. Quae vel earum repellat fugit eaque earum.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(425, 'Similique asperiores deserunt quo rerum quo et qui. Atque quae quia consequatur quae est. Unde aliquam provident dolorum non aspernatur ut.', 'Est ducimus qui dolores porro impedit. Dolor dolorum debitis rem expedita accusamus maxime. Sed harum ab neque et. Quae veniam sed odio sint architecto aut aut.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(426, 'Doloremque et odio debitis aut aut ut. Facere aut odit id voluptatem. Aperiam eveniet enim delectus eaque. Sunt non sit ea quas hic.', 'Dolores quis fugiat labore quae illo voluptates. Laboriosam dolores ut suscipit rerum sint rem.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(427, 'Quo aliquid id maxime vero. Cum eius animi commodi hic voluptatem. Ut inventore recusandae voluptate minima omnis. Sint ab et rerum blanditiis quis aut maxime. Eligendi facilis sit officia ut. A voluptas neque et aperiam.', 'Ea qui porro odio ut temporibus quisquam. Nobis et perspiciatis recusandae molestias. Autem consequatur itaque beatae.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(428, 'Nostrum officiis aut ut fugiat nihil. Exercitationem excepturi necessitatibus autem temporibus ipsum aut. Voluptas et impedit qui reiciendis aut distinctio ducimus. Praesentium aspernatur officia error et eum adipisci voluptatem.', 'Omnis nisi nesciunt sed odit ab sit nemo. Laborum tempora blanditiis nesciunt sit autem consequatur tempora. Ut vel harum esse reiciendis et id. Sit ab similique facere aut soluta.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(429, 'Nobis minus ex fuga quia. Sed nemo alias odit sunt odit placeat sint optio. Ut voluptatem rerum itaque. Possimus incidunt molestiae molestiae reprehenderit ullam. Minus velit odio tenetur culpa.', 'Maiores sunt dicta dolores et aut molestiae nemo reprehenderit. Nobis accusantium perferendis quas dolorum voluptate repellendus. Iste magni impedit magni ab possimus laudantium.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(430, 'Aperiam occaecati minima assumenda nostrum. Enim totam et consequatur omnis tenetur deleniti esse. Qui id voluptatem natus. Ex molestiae ipsa consequuntur natus.', 'Eum saepe ipsa fuga repellat. Earum omnis architecto numquam dolore in suscipit. Provident accusantium ab quidem aut quibusdam suscipit totam sint.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(431, 'Earum sint eligendi nihil cum. Rerum et commodi ut voluptas. Asperiores cupiditate nihil nihil autem ut est voluptates molestiae.', 'Consequatur sit praesentium repudiandae commodi. Ullam quibusdam rem similique incidunt. Suscipit cupiditate sit enim itaque rerum optio ut consequuntur. Voluptas dicta nesciunt laboriosam unde qui.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(432, 'Eos molestiae non voluptatibus rem consequatur. Rerum sint similique nihil repudiandae dolorem quibusdam. Eum sint ad reiciendis.', 'Dolorem quos sint enim corrupti ducimus quo alias. Est atque omnis natus ad nam reiciendis. Consequatur culpa vel aut enim voluptatum.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(433, 'Omnis suscipit voluptates eum cupiditate. A id eos molestias dolorem fugiat nihil nam. Hic tempore labore velit totam. Iusto culpa harum minima excepturi nisi.', 'Reprehenderit est eum qui dolore eaque voluptates. Necessitatibus et corporis excepturi quibusdam. Ipsam recusandae iusto nulla deleniti. Expedita nihil nobis ea quis corporis veritatis.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(434, 'Enim a laborum sapiente voluptas suscipit omnis cupiditate quasi. Velit tempora enim nam qui quia. Repellendus hic iusto est ipsam in qui error. Natus autem quia veritatis molestias tenetur quis quisquam.', 'Provident est quia dignissimos quibusdam sit beatae. Facere earum vel qui velit. Et aspernatur quis ducimus eum dolorum vel soluta.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(435, 'Tenetur sit nesciunt omnis quidem nisi. Ea possimus molestiae eaque eum maxime nisi tempora. Eum voluptas aliquam est reprehenderit sed dolores expedita. Repudiandae qui deleniti aliquid.', 'Consequatur in praesentium officiis. Distinctio eaque neque sint officiis et qui. Aperiam hic corporis quasi. Aut et alias quis aperiam nostrum cumque. Cumque ut quidem libero eum.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(436, 'Debitis asperiores perspiciatis necessitatibus quia quibusdam qui. Amet est labore sunt et. Maiores consequuntur quae eaque quia qui. Velit rerum quia consectetur velit molestiae rem expedita.', 'Beatae beatae voluptas temporibus aut illum est. Est dolorum esse aut vero eaque. Quo sit quis fugit et tempora.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(437, 'Libero ad neque id explicabo consectetur consequuntur. Quis architecto consectetur ut numquam mollitia quidem. Est est qui eius illo. Beatae et quae aut molestias eos nesciunt eveniet aperiam.', 'A provident exercitationem qui aut. Odio at cum quo consequatur blanditiis enim quos. Impedit sit pariatur fuga veniam. Vel tempore tempore et. Minima et animi cupiditate quasi voluptas non sit.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(438, 'Consequuntur ducimus suscipit delectus et tenetur sit. Et labore harum quo quae maiores sit odio explicabo. Sapiente sunt aut omnis. Nesciunt quia porro ipsum.', 'Officia possimus rerum beatae tenetur necessitatibus veniam cumque quia. Voluptas nihil eaque ducimus et at sint minima. Provident vel accusamus voluptatem.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(439, 'Delectus repellendus recusandae voluptatem ut accusamus non consequuntur nihil. Quam nulla odio sed voluptatem.', 'Quaerat animi odit illo qui itaque. Et incidunt corporis neque. Autem enim labore pariatur voluptate at. Necessitatibus ad consequatur reiciendis consectetur totam eos nihil corporis.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(440, 'Rerum a et enim omnis vitae debitis et dolorem. Earum impedit sint illum nihil. Sit voluptatem et ut dicta reiciendis nesciunt libero quae.', 'Accusamus iusto minus quibusdam fugiat quia. Debitis doloribus voluptatem sed distinctio dolore. Quo eum minima laboriosam consequatur maiores id.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(441, 'Id ut est nulla et. Voluptatum qui culpa exercitationem autem. Pariatur reprehenderit corporis velit iusto quos voluptatibus qui.', 'Modi et reprehenderit et necessitatibus dolores possimus. Laborum sed consequatur esse est quas pariatur. Quaerat corporis molestiae harum magni accusamus reiciendis nihil perferendis.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(442, 'Harum consequatur praesentium dolor eos aut. Fugit molestiae et aspernatur distinctio ea non rem. Sed excepturi ex excepturi.', 'Esse consectetur non molestiae facilis. Error eum facilis sed. Voluptatem sunt sapiente eius quo. Qui sit dolor consequatur aspernatur velit facilis.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(443, 'Facere totam sit voluptatem nam. Amet dolore omnis quasi alias aut. Inventore labore eveniet sunt nobis error non ut cupiditate.', 'Qui nostrum explicabo nisi sed. Hic quod exercitationem veritatis temporibus et ut sequi. Facilis quas ullam laboriosam sed impedit ab atque molestiae. Voluptatem perspiciatis quos ea.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(444, 'Cupiditate rerum fuga id eligendi illo quae aut. Voluptatem ut architecto et magni sed quis. Dolorum vel laborum illum blanditiis omnis aut.', 'Illum voluptatem est dolores rerum. Quidem quos delectus laborum inventore sed quia. Est beatae optio eum fugit fugit.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(445, 'Nihil sint quam rerum vel voluptate distinctio. Debitis est et sed quaerat voluptatibus. Reiciendis quidem dolorem esse fugiat quia sit aspernatur. Commodi saepe distinctio quasi porro molestiae.', 'Optio facilis qui sunt corporis. Sunt praesentium aut maxime minus asperiores aut inventore corporis. Molestias doloremque minima et libero molestiae et. Delectus cum at suscipit aliquid.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(446, 'Consequuntur voluptatem itaque cum explicabo fugiat. Ab excepturi nemo minus reprehenderit nihil laudantium. Aut molestias qui ab dolor.', 'In excepturi aut earum asperiores vel voluptatem. Ipsum quod similique labore omnis. Fugiat rem cumque quia.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(447, 'Error consectetur explicabo doloribus nihil at nemo. Amet porro fuga quis velit sit. Enim repudiandae sunt et possimus velit qui. Excepturi voluptate ut soluta voluptas. Quibusdam temporibus magni aut qui accusantium.', 'Commodi aut dicta adipisci non qui omnis. Sunt accusamus ipsa nulla quo nesciunt. Necessitatibus cumque porro ipsam.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(448, 'Inventore unde non velit ad et delectus et aut. Voluptatem ea unde laudantium. Et aliquid ipsum est in.', 'Quos et minus et voluptatem. Eum labore in sed est repudiandae rerum ut. Veritatis at molestiae autem totam. Ratione explicabo aut dolorem est rerum perferendis eius.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(449, 'Ex voluptas accusamus veritatis aut. Est occaecati odit provident reprehenderit et asperiores qui. Voluptas aspernatur repellat earum aut.', 'Eum eum accusantium nisi magni. In ipsum magni eos quia. Culpa eius officia et.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(450, 'Delectus optio dolorem aut quis. Dolorem laboriosam amet mollitia aut. Consequatur porro aut hic. Vel aut velit eaque libero provident sequi. Libero ex ea consequuntur doloremque placeat. Magnam dicta est illum unde quia cupiditate laborum.', 'Id minus sed rem qui aut vel omnis. In quia veritatis vitae ut nisi explicabo. Quo eum ducimus perspiciatis rem ut magni accusantium.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(451, 'Quo ut aut nemo veniam est sit. Ratione ut dolorem aliquid eum omnis. Dolores quae eius vel accusamus saepe et qui.', 'Assumenda voluptatum nihil repudiandae facere rerum non quisquam. Quia architecto enim corporis. Placeat vero est et sed. Deleniti praesentium accusantium iste consectetur vel maxime explicabo minus.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(452, 'Magni expedita adipisci qui recusandae omnis placeat quidem. Veniam voluptatibus quod dicta velit quis. Est pariatur ea eum sint vitae odio. Nihil est quos doloribus quisquam natus sed non eos.', 'Eos eos aut a et minima ut. Ullam deleniti facilis eaque odit. Vitae porro ut voluptatibus dolores. Dicta fuga quo veniam velit et.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(453, 'Ipsam hic et voluptatum eligendi ex fuga quam. Beatae autem quia accusamus. Sint alias commodi beatae hic et vel tenetur. Sint quo nesciunt ea ducimus.', 'Dolores omnis reprehenderit iste error eos qui voluptatem. Possimus et quas ipsum aliquam commodi perspiciatis laudantium quidem. Perspiciatis aut reprehenderit neque velit iste ipsum.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(454, 'Consequatur eligendi sed voluptates voluptatem sed consequatur in reprehenderit. Vitae suscipit eaque ut voluptates. Id ipsa nihil et esse ipsam recusandae placeat.', 'Voluptas vel voluptas in fugiat ut. Delectus nam ipsam rerum. Ad consequuntur omnis aut enim. A deleniti voluptates modi animi. Dignissimos ipsam est eos eligendi.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(455, 'Inventore sed aspernatur assumenda optio inventore. In rerum velit odio. Voluptatum nostrum reprehenderit omnis fugiat et molestias. Tenetur accusantium ut voluptatem in cupiditate corrupti aut.', 'Voluptas quidem quos ipsum quidem veniam. Eos quis vitae sit quia sapiente odio. Doloremque libero quas impedit.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(456, 'Aut a quos eos distinctio. Ducimus qui unde harum et et. Iure recusandae rerum cupiditate vitae ut. Doloribus pariatur omnis amet nam.', 'Repellat vitae quo aliquam. Beatae eius natus dolore nobis eaque. Occaecati quo et ipsum ducimus tempore ipsa.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(457, 'Quis adipisci voluptatum voluptas aspernatur sit. Sunt rerum est eaque eveniet.', 'Deserunt necessitatibus laborum omnis eligendi. Repellendus ut enim doloribus autem voluptatem. Cumque accusantium reprehenderit officia facilis corporis provident.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(458, 'Est ipsam delectus eligendi soluta itaque. Amet id quia error qui odio nihil. A esse tempora itaque architecto voluptatibus corrupti. Quis ad libero iste id. Accusamus numquam quos numquam doloremque possimus.', 'Facere eum libero ut laborum rerum asperiores exercitationem. Maiores quis nostrum qui corporis ut expedita quia. Officiis vel id quidem nesciunt quaerat enim.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(459, 'Corporis accusantium sunt et porro illum. Tempora eaque et ut eveniet itaque dignissimos facilis deserunt. Repellat dolorum iusto ad eos fuga rerum.', 'Ullam ut totam enim quia natus culpa iste in. Architecto veritatis in quia rerum atque illum. Nam molestiae dolores enim consectetur recusandae sapiente reprehenderit.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(460, 'Tempore in maxime omnis hic est fuga officia. Sapiente dolores quo reprehenderit incidunt voluptatem. Reiciendis sed libero qui sit. Porro fugiat nobis porro voluptatem reiciendis. Tempore nulla eos sint aut in. Facilis voluptas sit consequatur illum.', 'Repellendus iste veritatis aut beatae voluptatum. Sunt consequatur ad nostrum necessitatibus quia pariatur. Dicta asperiores quia deserunt eos eos.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(461, 'Qui eius eos itaque qui. Repellat nihil nihil non provident facilis quisquam voluptas quae. Perspiciatis voluptatibus voluptatem dolorum omnis facilis eos mollitia.', 'Aut debitis aut quo. Distinctio aut et sint. Laborum autem expedita praesentium eos laboriosam culpa. Fuga iure quo id aut sit ad. Voluptatem quasi porro in repellat neque quia asperiores.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(462, 'Corporis quia enim cupiditate reprehenderit. Repellendus veniam quis voluptate vitae dolorum dolores. Inventore delectus dolores fugit expedita neque natus quaerat. Ipsum sed ab dicta illum eum sit excepturi.', 'Nihil aut culpa a fugiat accusamus quo consequuntur. Consectetur enim consequatur illum. Dolore rerum sint accusantium eum quia temporibus deleniti minus.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(463, 'Quia omnis voluptas omnis adipisci quam. Tempore reprehenderit unde possimus quas neque aperiam nam. Consequuntur vel sint ipsa voluptas magni ab deserunt.', 'Omnis est repellat voluptatem hic magni. Sed qui ea quo ipsum. Aut ratione vel distinctio architecto totam.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(464, 'Ut beatae illum deserunt necessitatibus. Saepe quia enim molestias consequuntur aut quia mollitia et. Optio dolorem maiores consequatur magnam odio. Qui ducimus voluptatem qui voluptates voluptas voluptatum consequatur.', 'Voluptatum possimus assumenda et ut. Distinctio nihil aut vitae iusto aspernatur consectetur non enim. Repudiandae sed est molestiae.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(465, 'Et nihil velit quia ipsam dolores omnis. Temporibus doloremque totam et aspernatur excepturi quia. Aut iusto ut molestiae dicta ex eius voluptas.', 'Qui nesciunt magnam iure. Non beatae a possimus ducimus. Soluta ipsam eveniet repellat aut veniam. Amet dolor et est adipisci neque quod.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(466, 'Et quas doloribus ut ut quisquam illum. Rem harum animi beatae quo rerum deserunt harum. Sed quisquam commodi nobis sint vitae.', 'Minima magnam sit blanditiis vero. Animi atque qui maiores accusamus ullam. Eligendi est perferendis quisquam placeat quibusdam alias distinctio molestias. Eum saepe et quam quasi voluptatem officia.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(467, 'Odit eius qui voluptatem vero maxime modi qui rerum. Rerum ipsum ad illo molestiae qui molestiae molestias. At libero deserunt dolores. Qui velit sint officiis consectetur quam.', 'Earum velit assumenda autem doloribus rerum recusandae. Reprehenderit non animi est magni fugiat ut qui. Aspernatur quia modi quo nemo eligendi sint dolor qui. Hic magnam sapiente dolor libero.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(468, 'Nihil id doloribus perspiciatis ab alias. Voluptate quo vel ut dolor. Accusamus maxime quas voluptas ipsum repellat. Aut nulla veniam non nihil enim magni. Voluptas asperiores eligendi rerum et eaque ut magnam.', 'Aperiam a blanditiis est et delectus architecto ex non. Sint accusantium et dolores nam hic est praesentium laboriosam. Consequatur sint beatae aut ab rerum et.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(469, 'Iure velit corporis mollitia dolores nesciunt reprehenderit mollitia. Et nulla facilis et omnis et. Rem reiciendis deserunt qui repellat est est repellat.', 'Soluta harum sed minima quam. Laborum itaque perspiciatis beatae nemo omnis labore velit. Ex est quia voluptatem ut. Non quia impedit maiores iusto est fugit.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(470, 'Qui praesentium similique est quaerat cum repudiandae voluptatem autem. Sapiente quas qui harum et. Quibusdam quod eveniet expedita modi quo quaerat. Deserunt alias itaque sit laboriosam.', 'Consequuntur repellendus eveniet consequatur molestias nemo qui a. Eum sit quo sunt hic eos. Aspernatur veniam quod recusandae ducimus sit.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(471, 'Tenetur non atque ad aliquid explicabo. Vero nisi non ut quidem. Optio veritatis non quae sit et sapiente ipsum assumenda. Iure eaque officia id voluptatem ullam voluptatem maxime.', 'Sequi vel dolore ipsa voluptatem. Dignissimos cum fugiat eligendi nesciunt quae delectus nobis. Aut totam itaque optio sunt. Voluptates amet a aperiam.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(472, 'Accusamus enim sequi tempora fuga. Saepe ea non quis quidem. Harum excepturi distinctio minima delectus.', 'Dolorum iusto a doloribus accusamus eos exercitationem. Rerum harum et voluptatum autem ea.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(473, 'Sit nostrum quam est. Dolorem ducimus suscipit voluptatem nisi iste ipsa harum. Suscipit qui sint mollitia atque doloremque rerum labore omnis. Labore fugit mollitia distinctio.', 'Reprehenderit sunt aperiam asperiores assumenda repudiandae voluptatibus. Sit nemo ut laudantium dolorem magnam est nesciunt. Deleniti sed ea nemo illum ex est vel soluta.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(474, 'Voluptas molestiae omnis explicabo. Eos ab voluptas delectus quis. Illo harum hic magni doloremque voluptatem ratione voluptas.', 'Quis hic rerum mollitia suscipit id. Id cumque aut quia voluptatem natus occaecati veritatis rerum. Facere fugiat sed dignissimos totam et dolores odit.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(475, 'Vero sapiente quisquam adipisci. Et ad iste laborum vero iste sed id ut. Quia quo repellat aut commodi sint rerum. Quo laborum modi sint quae harum. Accusantium veritatis ducimus ut. Ut nulla quo minus nisi.', 'Cumque autem maiores omnis pariatur est deserunt ipsam. Explicabo enim unde iure eum voluptatibus molestiae veritatis.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(476, 'Aut eligendi et est corrupti nobis. Fugiat impedit fugit qui doloribus enim. Quidem alias architecto reiciendis quod.', 'Dolores molestiae magnam ea tempore. Nesciunt iusto iste aspernatur. Et quo ducimus facilis quasi ad omnis tenetur porro.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(477, 'Architecto repudiandae maiores ipsum et error. Harum voluptatibus quia debitis aut dolore at odio quod. Repellat est deleniti adipisci corrupti aut odio. Est voluptas eligendi culpa voluptatibus tenetur sint et cum.', 'Et placeat illo iure sapiente voluptatibus. Explicabo architecto voluptatibus totam doloribus ut ratione. Eum fugit et doloribus molestias enim omnis voluptates.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(478, 'Et ut eaque rerum eum. Repudiandae esse expedita ipsum culpa. Laudantium neque aut minus sed provident architecto placeat.', 'Deserunt nihil dolorem officiis unde quam tempore beatae qui. Adipisci temporibus labore sed et iste. Quam quia error dignissimos rerum consequatur. In aspernatur qui deserunt vero.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(479, 'Nam quo dolorem quo similique. Et repellat repudiandae sit laudantium id soluta veritatis. Dicta sint impedit rerum sit sed. Minus sunt doloribus nemo qui accusamus necessitatibus. Et laborum maxime fuga dolores consequatur.', 'Recusandae est quas nostrum dicta totam eum. Et dolore quibusdam eum sed consequatur dolor inventore.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(480, 'Dicta veniam est aspernatur repudiandae. Itaque natus est et alias tenetur deserunt. Autem mollitia sunt in autem maiores voluptatem voluptatum. In et enim a consequatur aspernatur veritatis. Pariatur laudantium fuga iusto aut quod.', 'Consequatur id et asperiores. Quae excepturi excepturi quia. Cupiditate enim eos ipsa nemo. Quia quo maxime et dolor velit. Dolorem nam adipisci provident aspernatur aperiam.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(481, 'Rerum molestiae quam non doloribus dolor quia. In molestiae et adipisci commodi. Unde est alias quasi dolorem. Numquam et quidem quam ea.', 'Asperiores sunt possimus dolorem eligendi. Fuga enim consequuntur aut tenetur aut non. Quis dolores dolorum non veniam voluptas repellat.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(482, 'Dolor iste eveniet sed ratione. Quas quis autem consequuntur omnis commodi saepe. Ipsam dolores aut perspiciatis sed ab unde non.', 'Omnis sequi eligendi adipisci aut. Quia illo adipisci quasi voluptatem voluptatem soluta quis beatae. Molestiae sit dignissimos quia amet. Temporibus quibusdam corrupti sed labore consequatur.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(483, 'Dolores enim autem labore temporibus. Qui animi dolorum aut quisquam magni. Debitis adipisci et repellendus. Quam et est quidem. Illo ea magni excepturi voluptates possimus. Eaque soluta voluptate at cupiditate. Quia quo aspernatur pariatur omnis.', 'Qui ducimus quo laudantium laboriosam quod in amet blanditiis. Eveniet quia aut voluptatem repellendus doloribus aut. Explicabo eveniet nobis dolor non aut neque hic doloremque.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(484, 'Porro voluptas sit qui aperiam perferendis. Reiciendis quia qui sunt porro. Autem harum distinctio voluptatem iure corrupti eos ipsum. Cumque ex et voluptates sunt et quia omnis aut.', 'Veniam assumenda eaque quam rem odio veniam facilis et. Sunt rerum ipsam odit dignissimos nobis dolorum. Quod earum magnam non. Autem excepturi totam dicta voluptatem consectetur ea cum.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(485, 'Architecto magnam iusto in cupiditate dolores cum. Nihil odio nesciunt est alias et aut. Et maiores expedita velit vel.', 'Itaque sed provident commodi ipsam sit a. Aut nam molestiae aut quaerat expedita quas. Blanditiis sint autem fugit porro fugiat quo praesentium sed.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(486, 'Non veritatis minima sapiente ab quae sapiente fuga. Aut accusamus ipsa autem assumenda voluptate amet minus. Aut architecto unde non necessitatibus vel. Voluptatem ipsum molestiae exercitationem rerum placeat non aut.', 'Alias enim eius fugiat doloribus consequatur itaque omnis sit. Quisquam itaque aut voluptas. Aut ipsa distinctio velit et hic a.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(487, 'Libero qui repellendus quaerat. Voluptas nesciunt consequatur sed vel aperiam. Voluptas libero reprehenderit voluptatum accusamus voluptas at. Deserunt labore sint rerum quo harum eos temporibus. Tempora excepturi necessitatibus sint pariatur maxime.', 'Est dolor dolore aut. Quia harum aut voluptatem cum atque delectus. Itaque totam aspernatur facilis libero.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(488, 'Quos temporibus amet qui magni id facilis culpa. Ut rerum eum dolores qui explicabo. Eos libero similique voluptas.', 'Officia laboriosam et ipsum sed eaque laboriosam. Cumque sunt magni at et magni delectus sunt. Et est eos voluptatem et sunt officia dolorum.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(489, 'Quod perspiciatis et est aut sint quia eum placeat. Maxime maiores qui quae est repudiandae atque. Et quia quia ut reiciendis laboriosam et. Velit voluptas suscipit in harum quod.', 'Et quis quae et iste. Dolorem consequatur eos veniam eos. Magnam illo eos quo. Iste doloribus et cum maiores.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(490, 'Et ut beatae non suscipit. Quo velit ut debitis odio assumenda accusantium nihil. Officiis est similique autem autem consequatur cum aspernatur. Beatae deleniti voluptatem corporis amet quae est rerum.', 'Qui id magni aperiam cumque asperiores reprehenderit vel. Vel earum sequi nihil repudiandae et placeat asperiores. Eligendi temporibus doloribus iusto.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(491, 'Pariatur doloremque consequuntur minima nostrum cum doloribus pariatur magni. Minus rem quibusdam cupiditate illo. Rem sed sunt minus dolores excepturi pariatur.', 'Dolor quis velit eligendi tenetur nihil. Magnam cumque cumque ut omnis vero deleniti enim perferendis. Deleniti amet sed quia veniam. Id repellendus quasi enim consequuntur aut sunt sit.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(492, 'Tenetur laborum et aliquam accusantium libero porro architecto. Ipsum quo magnam sed velit est veniam. Qui qui illo nostrum corrupti voluptate quia corrupti. Illo reiciendis perferendis a rerum odio.', 'Nihil dolorem consequuntur amet. Et placeat aut quaerat delectus nulla pariatur est. Explicabo fuga velit laborum et omnis laborum nam. Quidem quia omnis assumenda quis omnis harum.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(493, 'Saepe deserunt inventore a illum et dolore. Accusantium ad aspernatur ducimus facilis. Molestiae perspiciatis eius quasi cum tempora blanditiis. Saepe blanditiis repellendus laborum sit. Quod enim esse suscipit est. Vel sunt labore voluptatibus sed eos.', 'Necessitatibus dolores error laborum enim a. Qui itaque enim aut. Voluptas natus numquam consequatur quibusdam accusamus. Veniam quia aut aliquam nihil asperiores voluptatem officiis.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(494, 'Aperiam in et aut maxime voluptatem facere. Iure aut nostrum ea. Assumenda est et quia voluptates hic voluptatem aliquam. Minima a ipsum porro aut quia porro iusto.', 'Facere ratione suscipit dicta architecto. Autem iusto aut saepe. Asperiores et nisi aliquam doloribus. Dignissimos id et molestiae.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(495, 'Sint similique omnis illo aut soluta et id. Et aut aspernatur totam sunt aut maxime. Ut vel dolor laudantium soluta sed qui.', 'Rem praesentium corrupti porro ut quo sit. Id nesciunt facilis et minima ducimus porro. Quis beatae alias et vel.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(496, 'Nesciunt atque temporibus tempore non rerum accusamus sit. Est molestiae neque cum neque. Harum hic illum earum veniam aut quia eos. Optio repellat occaecati et reprehenderit et possimus et.', 'Nihil maxime qui aspernatur molestiae voluptatibus voluptatem harum hic. Quae commodi ab voluptas et. Mollitia odit unde ipsum repudiandae. Non quibusdam rerum et. Id iste sit ut aut.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(497, 'Et et ut est voluptatem aut et quis. Et maiores ducimus eaque non. Facilis explicabo voluptas et ab deleniti qui architecto. Tenetur similique rerum sequi at iusto. Est molestiae aut vero omnis aut.', 'Et blanditiis culpa eligendi dolor laborum cupiditate laudantium rerum. Molestiae deleniti amet non nam. Placeat libero aliquam corporis velit ut. Quo libero sequi magni possimus voluptatem sed qui.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(498, 'Aliquid nemo animi harum eligendi sit. Omnis dolores a aut laudantium qui et at. Sunt maxime beatae quaerat dolore iusto et.', 'Error ab molestiae velit ab earum. Illum reprehenderit vel voluptas veniam. Vitae id incidunt saepe molestias.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(499, 'Ea sed et et facere omnis omnis. Molestias enim provident id. Animi sit sapiente occaecati aut neque. Quis libero et modi ipsam nisi ad sint ab. Nostrum soluta corrupti excepturi esse. Id non dolorem et.', 'Natus blanditiis harum assumenda doloribus. Est sequi dolores optio laboriosam dicta illo nesciunt.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(500, 'Consequatur qui placeat mollitia vel odit. Minima optio qui reprehenderit temporibus autem quod.', 'Provident consequatur quibusdam aut voluptas qui ut. Quia labore ut velit veniam. Ex quis rem commodi. Et laboriosam repudiandae in illo. Occaecati iusto totam tempora repudiandae.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(501, 'Enim quibusdam facere dolores iste sit voluptatem. Expedita in sunt error dolor. Tenetur vel nesciunt temporibus accusamus. Sint magni aut sit. Eos voluptatem non quasi. Quia velit vitae dolorem vel itaque rerum.', 'Quo corporis sit maxime dicta possimus omnis voluptatem unde. Cumque veniam cupiditate optio vitae aliquid suscipit impedit. Quis aliquid ut provident atque cupiditate consectetur.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(502, 'Illo quibusdam enim sit natus accusantium eum minima. Cum veniam et nesciunt sed. Error ratione esse et voluptas. Vero qui quo et.', 'Quia ducimus illo aut hic corrupti hic. Sunt sequi similique laudantium explicabo accusamus. Harum ex occaecati cum voluptatem impedit magni exercitationem.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(503, 'Repellat id autem non sapiente hic minus possimus. Eligendi nihil sit ducimus omnis dolorum ab. Quos laborum molestiae iusto eum veniam blanditiis. Sed amet a molestias sapiente excepturi aut est.', 'Atque non nihil cupiditate quibusdam numquam. Temporibus est enim id facilis. Quod aut a eum iste eos aut eos. Unde non ea laudantium ullam dolore odio nobis.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(504, 'Provident necessitatibus excepturi veritatis facilis optio. Incidunt dolores illum sint. Qui voluptatum neque cum pariatur molestiae aut est. Tenetur et reiciendis eveniet neque incidunt aperiam ut. Optio libero dolorem et iste quam.', 'Beatae consequatur dolore culpa natus assumenda sit. Enim doloremque error et quibusdam ut. Omnis dolor sed omnis voluptatem perspiciatis quia.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(505, 'Ut voluptatem in qui qui error. Ea rem aspernatur aperiam at. Illum qui qui sed illum autem natus. Totam aut velit quas quo quis ullam consequatur. Voluptates qui et hic qui. Vero ex nulla assumenda unde dolore. Qui nam nihil nulla esse doloremque.', 'Temporibus possimus cum nulla et repellat totam. Voluptas accusantium voluptas veniam ab dolor illum saepe. Voluptatem eum qui ea voluptas eum.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(506, 'Quia facilis aut laborum. Aliquid et quibusdam ut quasi dicta. Quia voluptate rerum vel qui sit dolore unde. Eveniet sed dolorum culpa.', 'Eum totam fugit aut qui. Enim aut quas laborum consequatur saepe ex beatae blanditiis. Et sed totam deserunt perferendis dignissimos dolores iusto deserunt.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(507, 'Eaque officia quibusdam est at voluptas provident nihil. In officiis perferendis ipsam alias magni quas ut. Inventore repudiandae dicta provident temporibus commodi. Dolores error porro aut.', 'Consequatur et unde quibusdam enim. Ad quam qui earum assumenda impedit eum odit. Consequatur est laudantium debitis veritatis dolorem eum dicta culpa.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(508, 'Quibusdam eos omnis veritatis iste. Tempore dolores omnis saepe dolores fugit aut. Reiciendis totam voluptatem eos delectus dolor qui.', 'Nisi blanditiis optio quae omnis molestias saepe. Sed pariatur cumque est praesentium delectus quo reiciendis enim. Quo sequi doloribus perferendis itaque.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(509, 'Alias eligendi labore dolorem repudiandae aspernatur. Sunt iusto voluptatibus saepe et id soluta hic et. Non quisquam sint explicabo molestiae. Deserunt fuga eos ea consequatur quod consequatur autem.', 'Non sint cupiditate et facere. Sunt repellat voluptatem necessitatibus qui voluptatibus assumenda. Qui perspiciatis commodi vitae.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(510, 'Repellendus quasi culpa eos non mollitia repudiandae aperiam. Quis aut cum et qui occaecati. Consectetur consequatur rerum eos quaerat iste ut.', 'Fugiat autem delectus porro eum perspiciatis. Aliquid odit quam omnis est id. Sit earum non sit eum. Eos facilis sed sequi.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(511, 'Est ratione provident in et magnam velit. Ut est odio soluta sunt velit repudiandae. Dolores dolorem dolores ut. Harum ex quo vel eos aliquam explicabo pariatur sed.', 'Quia quis vel molestiae aspernatur quos earum. Maiores qui id voluptatibus non qui nesciunt. Optio temporibus magni animi. Officiis culpa quidem deleniti deserunt amet.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(512, 'Et voluptatem autem sint corrupti necessitatibus. Nobis iure qui assumenda reiciendis. Quasi ea eum non beatae ut. Et animi dolores modi.', 'Vitae sit doloribus rerum perferendis autem aut. Voluptas deserunt pariatur sapiente rem accusamus velit sequi aliquid. Sint repellendus ea facere est rerum molestiae.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(513, 'Velit laudantium quis autem rerum. Voluptate aut et labore eum fugit. Est iusto neque voluptatem dolores ut rerum. Aut culpa vel repellat dignissimos est nam.', 'Numquam accusantium id nostrum consequuntur fugiat. Reprehenderit qui sit quis assumenda possimus eius. A aperiam libero nostrum.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(514, 'Quae sed consequatur enim numquam ipsa consequatur dolor assumenda. Ut animi eveniet voluptas molestiae sit sed atque. Nemo unde earum est voluptatem in.', 'Doloremque sunt voluptas magnam perspiciatis et quod omnis. Suscipit impedit aut illo.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(515, 'Adipisci tenetur est tempore ea nemo non adipisci. Quia est placeat doloribus et voluptatibus dolorem inventore provident. Provident non qui soluta et sit et.', 'Labore qui necessitatibus et aliquam quisquam reiciendis. Animi rerum quia provident voluptas quae voluptas. Quia hic ut eaque unde neque qui.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(516, 'Enim sed debitis delectus consequatur assumenda placeat aliquam. Quos porro eius voluptates aut fugit deleniti aut optio. Quam culpa odit aliquam esse.', 'Et blanditiis iste sit molestiae cumque. Et assumenda autem sed quae accusantium fugit. Sint deserunt dignissimos libero ipsum nemo.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(517, 'Voluptas sapiente et voluptatem et excepturi maxime eos fugiat. Vero dolores quaerat exercitationem illum officia officia autem. Exercitationem ut cumque deserunt distinctio. Sunt ut nesciunt voluptatem temporibus excepturi molestiae.', 'Repudiandae tempore ut voluptate suscipit. Incidunt excepturi eum mollitia illo omnis ea neque consequatur. Ut eveniet aspernatur dolor voluptatem.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(518, 'Fugit et animi vel consequuntur illum totam sit. Magnam quis facilis recusandae harum deserunt dignissimos tenetur. Et eum deserunt temporibus perspiciatis enim. At earum qui ut mollitia delectus. Ex vitae eum eum impedit. Ipsum explicabo qui omnis eum.', 'Consequatur consequatur ullam qui quaerat libero. Eum possimus esse sed soluta corporis fugit vitae odit. Labore voluptatem voluptatem quis.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(519, 'Quia est cum quia et tenetur inventore. Voluptas molestiae dolorum alias qui. Ullam sint nihil hic. Et nihil odio cum qui ipsam. Minus asperiores adipisci et sint. Consequuntur eum fugiat et laudantium non et. Omnis fugit recusandae corporis ut qui.', 'Eum in praesentium debitis in illum aliquam. Debitis distinctio in voluptatem consequuntur id dignissimos ullam. Et ad officiis aut deleniti debitis laudantium doloremque.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(520, 'Laboriosam odio laudantium provident non exercitationem tempora vitae nihil. Voluptatem et et ut at minus. Itaque eum nulla amet iusto molestiae eveniet.', 'Nihil voluptate laborum officia omnis aliquam. Omnis occaecati inventore exercitationem id. Rem vel maxime tenetur ab velit et.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(521, 'Itaque qui pariatur nesciunt quas consequatur et reiciendis molestiae. Praesentium quo eum inventore enim molestiae. Minima rerum illo odit at recusandae ea ipsa. Quae est tempora placeat consectetur animi quae.', 'Explicabo facere aut iste quisquam delectus. Alias nesciunt voluptatem autem explicabo nostrum atque. Similique explicabo praesentium facere assumenda occaecati.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(522, 'Sint enim veniam qui rerum cumque rerum qui. Maiores cupiditate repellendus aut porro vel ad porro. Et quidem sed cupiditate quo.', 'Aut fuga eum ea. Ea repudiandae aspernatur illum quam at quam. Molestias sit sint quo doloribus at aut quaerat repellendus. Pariatur aut laudantium et debitis veniam non.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(523, 'Culpa earum laudantium iste pariatur vero iste. Voluptatem repudiandae et ab ea odit. Nulla ad aut dolor est.', 'Eum voluptatum sequi laborum cumque voluptates voluptas dignissimos et. Dolor commodi molestiae illo. Quaerat voluptatem qui quia omnis distinctio vitae quia.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(524, 'Consectetur ut alias est architecto dolore. Enim rem asperiores quisquam occaecati. Inventore consequatur dolores suscipit quasi veniam. Et sapiente ut voluptatem ipsam. Ut et nisi illo corporis deleniti. Sed ut in nam et eum. Qui iure illum aut.', 'Voluptas magnam doloremque exercitationem sed inventore. Fugiat quo labore mollitia dolor. Quo nulla vel corporis eveniet sed rerum dolores. Et libero itaque et vel placeat ut.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(525, 'Inventore autem quae soluta odio est. Illum nostrum hic sunt aut neque odit. Et ut dolores cumque possimus sint reprehenderit porro. Laborum temporibus a ut tempora eveniet doloribus. Reiciendis quia dolorem provident ipsa.', 'Laborum quasi cupiditate modi delectus vel labore ipsum libero. Et ipsam nihil veniam libero et. Rerum cumque nesciunt sunt quia.', '2021-11-20 14:48:03', '2021-11-20 14:48:03');
INSERT INTO `modeles_factures` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(526, 'Et ut beatae ipsa et voluptate. Unde iure fugit sit quisquam. Ducimus eos sapiente aperiam. Ut aliquam quod voluptatum et saepe.', 'Dolores deserunt aspernatur ad voluptate dignissimos temporibus sed. Veniam commodi laboriosam sit aperiam omnis eum. Sed omnis accusamus quia aut sit eveniet quibusdam minima.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(527, 'Rerum aliquid officiis ea est. Voluptas atque repellat quibusdam sed qui vel voluptatem dolore. Non dicta cum fuga adipisci harum rem ea. Officiis quo quasi at similique sunt dicta. Vero laboriosam est expedita doloribus.', 'Et vel dolor veniam accusantium similique. Commodi veritatis reiciendis blanditiis sit repudiandae illo sint cupiditate. Aliquam nostrum animi voluptatem velit ab. Sit at neque aut minima cupiditate.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(528, 'Reprehenderit nulla fugiat ipsa sit dignissimos voluptates blanditiis. Earum voluptas eveniet et aperiam velit et. Ut at adipisci dolorem et. Libero sunt dolorum nam ad sapiente impedit. Nulla et ut fuga. Ex natus incidunt maiores id atque animi.', 'Vero occaecati provident quia odit illo. Quis rerum ut debitis repudiandae illo molestiae amet.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(529, 'Ipsa mollitia sequi molestiae doloremque ipsum rerum ipsum id. Nesciunt id et quis voluptas. Architecto dolor qui sunt voluptas consequatur ipsam pariatur. Exercitationem et est aliquam molestiae.', 'Vitae nesciunt reiciendis voluptate. Velit neque omnis sed est delectus quo itaque. Qui quisquam cumque aut excepturi. Est non ab nihil ut qui.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(530, 'Velit sapiente velit aut sint et et et. Aut adipisci distinctio dolorem iusto sunt fugit. Temporibus aut ut quia et animi tempora non. Sapiente at dolorem quasi quia dolores.', 'Id distinctio quae similique voluptas. Eius qui explicabo porro doloribus fugit a ullam. Porro in officiis quia eius.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(531, 'Dicta est nihil sit. Nemo dolorem molestiae quia natus. Ipsum quia iusto rerum sed. Est praesentium magni aperiam placeat.', 'Explicabo deserunt aut esse ipsa neque unde. Maxime quis deleniti amet maiores quaerat tempora. Cumque error officiis ipsa id. Quod animi natus aut voluptas.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(532, 'In maxime voluptatem perferendis et corrupti minima quo. Consequuntur itaque odio excepturi reprehenderit est dignissimos. Aperiam explicabo dolores enim impedit at omnis perspiciatis.', 'Vitae dicta consequatur omnis perspiciatis pariatur. Iusto aut vel quia saepe. Aut incidunt sed incidunt. Maiores aliquam quis debitis itaque alias. Ut deserunt eveniet consequuntur ex expedita.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(533, 'Suscipit omnis dolores perferendis laudantium cupiditate dolor. Voluptate quis placeat rem facere aut nisi occaecati. Excepturi veniam qui eaque aut provident nesciunt qui. Cumque quis voluptates voluptates quam inventore.', 'Reprehenderit et cumque adipisci fugit id alias tempora. Aut possimus quisquam rem eveniet. Eos eveniet nulla quia tempora modi. Perferendis excepturi deleniti sit id dolorum et.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(534, 'Repellat sed accusantium nihil laborum magnam aspernatur. Facilis consequuntur ut ut. Atque commodi ratione sint omnis. Voluptas nulla cum placeat occaecati laboriosam modi.', 'Qui enim quia quia iusto aperiam et. Rem consequuntur voluptas totam rerum. Ipsa tempore id quis occaecati non sunt. Dolor qui enim cum numquam reiciendis maxime ipsum quod.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(535, 'Maiores laborum ipsam eos et neque iure voluptates facilis. Autem qui omnis sequi dolores consequuntur cupiditate a. Nemo et cumque ut et accusamus.', 'Voluptatem ut aliquid voluptas et eum ratione eos. Neque eum eaque et et. Quae ab itaque et impedit dolorem et nobis. Voluptas sit fuga minus nostrum dolore quibusdam possimus.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(536, 'In iure similique id doloremque aliquid. Facere reprehenderit tenetur assumenda minus voluptas. Odit qui ipsam eum nihil doloribus repellendus et. Placeat consequuntur impedit voluptas aut sed culpa.', 'Quis assumenda dolor quia quibusdam autem aliquid cumque. Omnis aut et et nihil sint. Nobis impedit rem sed vel eos. Facere deleniti amet velit sit autem et.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(537, 'Quam aliquam magni aut eum. Explicabo et voluptates labore nihil reprehenderit natus sint est. Magnam aut similique rerum omnis sint. Et quibusdam quibusdam veniam id.', 'Ab quisquam aut et et. Aut quis molestiae voluptatibus ipsum fugiat quaerat. Error suscipit ratione doloribus voluptatibus.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(538, 'Delectus sit nam cupiditate ullam quasi sed. Veritatis culpa doloribus facilis voluptatem hic autem. Voluptas doloribus eum cupiditate beatae. Iusto rerum et sint quis. Tempora perspiciatis nulla sit error omnis velit dolor. Suscipit eum rerum est fuga.', 'Culpa mollitia sunt eius et corrupti fugit. Ea nemo quam est culpa. Fugit enim hic explicabo magni praesentium. Omnis commodi voluptatem fugiat possimus.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(539, 'Deserunt maiores natus aliquid quia quidem libero. Nostrum exercitationem ab animi ut placeat. Aut voluptas eos excepturi molestiae exercitationem sapiente dolores quis. Quis exercitationem itaque impedit harum nostrum.', 'Odio enim sunt tenetur temporibus. Et aliquid ipsam autem corrupti optio consequuntur. Eaque ab animi ut rerum voluptatem. Vel dolores harum minus nesciunt est ex expedita.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(540, 'Quia hic aut excepturi molestiae ducimus sed. Earum necessitatibus iure maiores ipsum. Consequatur suscipit quo quisquam amet necessitatibus.', 'Facere reprehenderit expedita dicta suscipit. Voluptatem quam in minima culpa magni eaque. Numquam nisi qui eum nostrum.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(541, 'Eum consequatur corrupti molestiae voluptas est. Sint temporibus officia distinctio aliquid quisquam. Non tempore enim consequatur est maxime. Qui voluptatem amet fugit illum. Doloremque debitis ut voluptatem repudiandae.', 'Iusto provident veniam et dolores velit ipsum nihil rerum. Est eveniet omnis expedita aut minima dolores. Ad et impedit doloremque repellat molestias dolorem eaque maxime.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(542, 'Dolores ea voluptas debitis officia et. Et minus aut laborum ratione. Ullam veniam tempora a soluta occaecati et est. Ut debitis illo aut et pariatur sed aut.', 'Eveniet non aut ut adipisci ea dolores ipsam vel. Non voluptatem est est aut quo. Impedit officiis omnis officiis.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(543, 'Modi vel eum consectetur quia. Molestias soluta sit repudiandae voluptates enim tempore ipsa dicta. Magnam est quia accusantium. Maiores quo occaecati perferendis vel. Sit alias omnis qui aut reprehenderit odio. Beatae architecto tempora voluptatem.', 'Deleniti ipsam facere corrupti quae porro dolor occaecati. Quo cupiditate laborum architecto ut quod ut. Maiores qui consequatur animi. Perspiciatis veniam iusto dicta quasi necessitatibus qui.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(544, 'Quia similique alias reiciendis quam exercitationem ut. Corrupti exercitationem placeat nam vitae. Voluptas tenetur sequi aut harum distinctio iure voluptas. Dolorum est quisquam mollitia quo et.', 'Rerum vel quis velit quia rem sit vero. Dolores aut magni doloribus fugiat id at. Facilis velit maxime culpa quia aut et et. Nemo veritatis officia esse fugiat nulla esse.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(545, 'Omnis qui ut totam quia quis provident harum. Quo eos ut sapiente cupiditate id. Nesciunt ut vel quo doloribus voluptatem voluptatem. Odio ipsa libero in laboriosam totam quo.', 'Nam tempora velit qui autem dolor exercitationem dolorem atque. Suscipit nam et ratione dolor.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(546, 'Illo odio omnis placeat dolorem aut. Voluptate officiis alias excepturi expedita deserunt veniam. Officia deleniti ad odio aut molestiae quaerat. Aut reprehenderit eius tempore.', 'Nisi et eum veritatis saepe. Nostrum nobis nostrum et dolor ipsum. Aut quidem assumenda eum et dolorem. Consequuntur laudantium consequatur neque ut autem.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(547, 'Qui recusandae fugit distinctio non aut. Dolor voluptatem ad ut ut deserunt. In id quo et. Laudantium dignissimos omnis error animi amet velit. Non quasi doloremque alias nemo.', 'Necessitatibus at in sed qui sapiente praesentium et. Perferendis nobis mollitia nostrum nobis et voluptatibus ullam. Iure veniam dolorum et.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(548, 'Nemo dolor id illo rerum. Est et aut ut sed eos. Ab quo rerum et. Amet ab est omnis quasi. Tenetur voluptate culpa quod et consequuntur. Qui odit molestiae ea minima laudantium illo. Modi ipsum impedit impedit ut.', 'Voluptates quaerat deleniti quo dolorum autem. Ut minima corporis nobis praesentium. Qui ratione qui tenetur accusamus distinctio qui asperiores.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(549, 'Sit qui qui aut id doloremque inventore. Quisquam iste neque ut quis molestiae adipisci. Delectus ut nesciunt fugit aut ex et. Accusamus exercitationem quas voluptas esse cum error sunt.', 'Vero fuga necessitatibus iure. Animi molestiae earum libero et. Consectetur molestiae voluptatem et qui itaque. Aliquam modi voluptas corporis.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(550, 'Et dolorem enim quas officiis quia. Ea nihil minus quo earum et illum. Numquam molestiae iusto dolorem consequuntur nihil. Maxime quod qui consequatur dignissimos.', 'Nam sint esse reiciendis minus possimus vero. Reprehenderit cumque non aut et. Suscipit eaque et magni ea omnis.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(551, 'Voluptas ipsa velit expedita accusamus voluptatem qui alias. Illum nemo doloribus voluptatem aut omnis. Ut accusantium beatae blanditiis. Sequi alias officia modi magni. Alias quis voluptatem rerum maiores distinctio quidem.', 'Vitae numquam fuga aliquam voluptas. Itaque adipisci voluptas voluptatem repellendus est vero. Dolor molestiae ut voluptatem perspiciatis quo.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(552, 'Ut eum non animi dolorem. Deserunt harum veritatis nulla et ratione vero. Recusandae rerum nam rerum optio magni ut. Illo expedita odit neque consectetur.', 'Qui vitae est nisi saepe. Et blanditiis sed voluptatem. At vel illum dolor odit mollitia voluptas nesciunt dolorum. Est earum ut delectus eos nulla.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(553, 'Ut libero voluptatum nihil. A voluptates natus et qui est enim. Beatae voluptatem distinctio qui officiis ut ut. Quisquam voluptatem tempore illum et facilis quasi. Inventore dicta rerum voluptas nostrum est fuga.', 'Voluptatem nihil non quia earum omnis aut eaque. Recusandae est a quia omnis. Eos et qui ullam consequatur eum.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(554, 'Explicabo expedita et autem quo maxime dolor. Beatae eum quae dolores eaque provident provident ut et. Dolor qui culpa esse ex consectetur. Magnam officia vero illum ullam aspernatur consequatur beatae.', 'Est nulla et repellat. Veniam ex rerum enim laborum. Sed deserunt accusamus ea nulla corrupti voluptatem inventore.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(555, 'At necessitatibus exercitationem voluptatem ipsam. Quaerat assumenda id porro. Quos rem ut delectus facere et ut. Nihil velit minima fugit accusantium.', 'Ea cumque autem maiores voluptate accusamus. Voluptatem voluptas eos magnam consequatur expedita et. Perferendis ea non suscipit sed adipisci necessitatibus. Explicabo molestias quo magnam enim.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(556, 'Maxime consectetur mollitia quibusdam. Placeat quae officiis qui inventore quia modi possimus. Aut amet et omnis aut soluta quisquam. Nobis corporis ex ad modi.', 'Qui culpa sit ullam quia. Consectetur ex nesciunt sunt blanditiis nisi. Nam deleniti rem placeat sed.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(557, 'Soluta vitae perferendis est minus velit. Tempora ex voluptatibus aut quaerat quis impedit. Voluptas sequi ratione voluptatem ipsum culpa deleniti enim perferendis. Et iusto quisquam ipsum optio nam molestias.', 'Est aut sit enim. Ea sunt at quae ullam sapiente excepturi et iure. Et praesentium neque ut quas perspiciatis.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(558, 'Esse consectetur iure accusantium illum iusto sint ea architecto. Placeat consequatur maiores est tempora occaecati. Et in accusamus dolorem eaque ad nemo totam. Et ut modi corporis vel eligendi. Aliquam nisi sequi est velit unde repellat tempore.', 'Harum ea sit sit sit atque nam sit. Labore dolor molestias omnis magnam eaque et at. Quia et et aut et consectetur rerum excepturi. Sint voluptatem qui similique deserunt sed.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(559, 'Iusto et dolores sit nihil alias ratione similique. Laudantium dolorem et excepturi laudantium voluptas et aut rerum. Temporibus voluptatum sequi qui nemo. Quos itaque quia dolor.', 'Ullam voluptates est fugit consectetur. Non dolorum iure rerum perferendis quasi voluptatum. Sunt at officia possimus quo voluptatum.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(560, 'Nisi quia excepturi atque necessitatibus sapiente eaque facilis. Nihil quis ea et et sed sequi totam. Dolores omnis magnam hic sit.', 'Culpa sequi voluptas vel similique minus. Culpa corporis veniam et dolores. Quis incidunt repudiandae et inventore atque omnis et.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(561, 'Error quidem aut et quia enim nisi. Nisi ut aliquam debitis. Porro iure nobis incidunt autem quia minus minus.', 'Voluptate ab cupiditate id minus esse. Incidunt corrupti quia pariatur ipsum aut nihil illum. Magnam provident neque omnis quibusdam ut sed sunt assumenda. Dolorem omnis et dicta tenetur.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(562, 'Veritatis natus et possimus quia consectetur sit. Non dolor delectus dolores laudantium esse. Nobis perferendis dicta non nisi.', 'Id quia est architecto ea eligendi ea quaerat. Sint eligendi laudantium ab. Quasi omnis voluptas enim saepe et commodi.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(563, 'Maiores doloribus voluptatibus inventore recusandae. Qui tempore dolores ea voluptate aut. Rerum dolor sit vel blanditiis praesentium illo.', 'Rerum optio sed optio sapiente. Qui ducimus fuga nesciunt. Facilis dolorem quam qui repellendus enim quo. Ipsa ut dolores fugit possimus.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(564, 'Et repellendus nemo dolores nihil eligendi. Voluptas consequuntur laudantium sit voluptate quasi cumque rerum. Aut odit tempora ab blanditiis eveniet. Reprehenderit ducimus animi architecto facilis. Rerum neque eius labore asperiores nemo veniam.', 'Eos est aut voluptatum placeat reprehenderit. Sunt placeat maxime recusandae est tenetur dolor. Sint blanditiis voluptas doloremque sit perspiciatis est. Eius magni ea excepturi laudantium ab.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(565, 'Quos excepturi ut possimus nostrum qui laudantium aut. Corrupti quisquam asperiores hic. Cupiditate est velit quaerat sed atque est et et.', 'Tempore ex alias quisquam aut occaecati veniam ut. Qui blanditiis tempore consequuntur. Natus reiciendis laudantium ex dignissimos. Non mollitia atque animi ut architecto fugit praesentium.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(566, 'Et eaque nemo consequatur aspernatur repudiandae. Consectetur minus mollitia aut. Vitae fugiat veniam at facere fugit.', 'Culpa et eos aliquam veniam et. Ab expedita ipsa illum quod veniam a. Rerum reprehenderit quas et consequuntur. In aspernatur aliquid quis ipsa quam voluptatem.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(567, 'Aut provident dolorum magnam iure et vitae eaque. Doloremque sapiente ipsum dolore dolores est voluptatem illum. Nemo ea cupiditate sequi voluptatem alias. Quia ut quas est voluptas reiciendis enim. Nobis a distinctio suscipit consectetur et.', 'Deserunt odio aut illum ut tenetur nam. Impedit molestiae consequatur nemo dolores. Pariatur sapiente et accusamus quidem nihil perferendis voluptatem. Accusantium ipsa dolorum aut.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(568, 'Atque deleniti quia omnis id illo molestias nobis. Ea dolor vero magnam ullam. Quas ratione deserunt animi ex odit repellat. Qui amet sed excepturi omnis excepturi veniam.', 'Sit et facere maxime. Libero dolore quod et aut magni vel eum. Laudantium aut culpa tenetur veritatis est quam cupiditate. Aut voluptas neque sint quis perspiciatis.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(569, 'Architecto sint repellendus dolorem vitae. Occaecati aliquid reiciendis et accusamus voluptatum alias aperiam fuga. Et fugiat qui voluptatibus maxime ea. Enim beatae nemo non impedit nostrum similique modi.', 'Praesentium voluptates ut accusamus necessitatibus a. Minus earum molestiae provident iste. Dolor quo dolores neque mollitia magni et porro.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(570, 'Odio rem dignissimos sint soluta et quo et. Dicta itaque accusantium architecto. Nihil temporibus qui ex ex eius. Repellat nobis ullam molestiae quia.', 'Repellat corporis voluptas aut et. Nihil ut nam aut non praesentium facere eius. Aperiam ut quae fugit eaque laudantium.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(571, 'Enim et tempore ut reprehenderit nesciunt. Eaque est at officia veritatis et. Molestiae sit hic qui officia natus omnis deserunt. Porro aut nam eos molestiae consequatur fuga dolores. Sint voluptatibus enim saepe sint quod rem qui.', 'Id dolore facilis vero ab dolore. Non dolore laudantium sint et sint. Laborum molestias nihil neque sint. Molestiae reprehenderit voluptas ut eligendi assumenda.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(572, 'Perspiciatis consequatur consequatur assumenda nemo minima nihil. Distinctio aut laborum dolor expedita odit. Cum distinctio qui facere qui voluptates debitis ullam. Velit aut fugit sapiente accusantium tempore omnis.', 'Eos tempore aspernatur cum id. Dolor et consequatur animi. Ab nemo sequi qui ut nihil non expedita illo. Officiis ipsam autem perferendis mollitia animi vero.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(573, 'Et occaecati minus dolor ut ut. Eos et odio minima iure. Ab quidem expedita est assumenda ipsa aliquid perspiciatis. Necessitatibus ad id ad odio. Assumenda sint non accusantium. Velit quia fugiat eveniet autem quae.', 'Autem adipisci est rem ut ut harum. Porro voluptatem earum tempora possimus ipsum nihil optio. Consequuntur et esse ut enim animi sint.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(574, 'Doloremque et dicta in asperiores debitis ut. Maiores voluptas aut voluptatibus aliquam blanditiis itaque dolores. Nihil sit aut qui facere qui repellendus.', 'Ut et aut omnis architecto. Facere nulla alias voluptatibus illo. Voluptates incidunt vel ratione minus velit aut.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(575, 'A non voluptatem et quas nostrum vel qui. Omnis asperiores non natus numquam alias nobis libero est. Ut fuga ut aut sed. Molestiae voluptatem nisi omnis quam voluptates magni consequatur voluptatem.', 'Soluta eum incidunt dolores sed. Aut est corrupti ab similique. Aut ut ut reiciendis molestiae et veniam.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(576, 'Dolor pariatur dolorem distinctio vel dolorem dolores. Qui ea aliquam et architecto temporibus quam sit. Eos delectus voluptatem tenetur velit quaerat porro.', 'Vel totam commodi aut maiores blanditiis. Qui minima assumenda labore eos velit animi. Et consequatur sed mollitia amet.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(577, 'Omnis quis voluptas ratione quia et facilis. Earum ex assumenda eveniet fuga. Vel iusto quia et corporis deleniti culpa facilis. Repellat qui aliquam aperiam voluptas exercitationem autem.', 'Praesentium quasi tenetur nihil exercitationem dolor. Maxime voluptatum optio est sunt. Cupiditate modi aut nihil amet sunt eum ut.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(578, 'Assumenda incidunt et aperiam excepturi. Impedit non harum odio quae aut. Neque autem assumenda illo iusto odio eligendi corrupti. Et et dolorem exercitationem dolor.', 'Tempore commodi quibusdam perspiciatis officia qui esse laborum maxime. Magni fuga ut ad quod. Deleniti velit omnis sequi suscipit. Sunt et aspernatur omnis ipsa tempora doloribus.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(579, 'Et velit animi necessitatibus et aut omnis quam ut. Harum aliquam modi eos ullam. Velit sint suscipit natus veniam veritatis dolorem omnis. Est iste a facilis voluptatem ut repellat sit. Velit rerum molestias rerum minus incidunt dolores quis.', 'Voluptatum id ut ex quam. Modi occaecati exercitationem et excepturi quia.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(580, 'Expedita voluptas laboriosam enim dolores laborum et. Velit qui esse molestias vitae animi aut. Unde non velit ut nemo et dolor.', 'Occaecati reiciendis quos sed aut animi non quos possimus. Suscipit qui accusamus deserunt molestiae inventore.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(581, 'Laborum recusandae qui voluptatem. Sequi sit rerum neque fuga et dolorum. Iste id quae aut corporis dolor eum. Consequatur alias aut qui commodi maxime autem possimus.', 'Nemo eos quibusdam fugit molestias. Rerum natus consequatur aspernatur maxime perspiciatis. Commodi optio sit nam error eaque voluptatem blanditiis.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(582, 'Dolore officiis dolores ipsum nemo sed perferendis veritatis. Consequatur dolorum sed quod. Unde labore quo officia perspiciatis ea. Sapiente fugit qui culpa molestiae qui.', 'Possimus in ducimus facere ducimus quia ut deleniti. Magnam quibusdam nemo non animi. Ad sunt velit dolores est. In eligendi nihil eos. Doloribus veritatis aperiam odio inventore est.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(583, 'Ea nihil magni officia laboriosam earum. Quam magni ea quibusdam illo quam occaecati. Molestias porro nemo veniam esse laborum ab molestiae dolorum. Pariatur commodi soluta natus minus ad dolores.', 'Atque culpa omnis eius error repellat. Ut et error expedita quia iste voluptatum non. Sequi quod vero iusto qui autem. Cum veniam facere doloremque nostrum vitae.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(584, 'Dignissimos a et non rerum dolorum. Vero iste ipsa quo ex laborum nam. Neque dolorum animi recusandae fuga dolorem sed. Possimus rerum qui corporis quis earum quia porro.', 'Quos asperiores ut nobis magni. Maiores qui qui sint odio. Est vel eveniet at et quis.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(585, 'Vel est quae corporis aut asperiores. Ut inventore itaque sint neque qui natus. Accusantium qui ab aut blanditiis dolore explicabo.', 'Quia vero placeat inventore veritatis esse unde. Doloribus illo incidunt in. Tempora rerum voluptate et totam nihil sed.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(586, 'Cum in fuga minus id quas ipsam consequatur. Aut soluta culpa harum et corporis est et ea. Dicta illum ea nisi porro qui. Pariatur adipisci sit aut sint nihil.', 'Eos ex odit soluta voluptatum neque ratione. Hic tenetur rem omnis quia praesentium quasi praesentium iste. Ipsa ab temporibus quidem sapiente quia.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(587, 'Quo consequuntur modi rem vitae. Provident recusandae animi consequatur laborum. Omnis voluptatem ut fugit ut. Iure qui tenetur autem totam doloremque.', 'Sint libero dolor impedit voluptatibus illum. Itaque voluptatem facilis possimus ratione tempore quia. Voluptatem velit ea ut. Quas non eos facere aut.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(588, 'Consequatur quia quam ut nam et eum. Culpa quam sint a dolorum accusamus maiores omnis. Animi vel reprehenderit deserunt nisi eaque eum illo commodi.', 'Minus tempore ab vel et expedita sit quo. Sed laborum nulla nihil repudiandae labore. Culpa porro rerum eos culpa odio ad. Aut perferendis aliquam voluptatem ducimus ullam.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(589, 'Nihil quos sunt ipsum error error est. Delectus omnis eum tenetur qui. Cupiditate dolor sed iusto dolor. Aliquam ex iusto nam.', 'Id sit ea harum quis. At cupiditate nemo sapiente optio. At et fugit et iste optio esse. Eligendi et nesciunt voluptatem sed delectus ducimus dolor nihil.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(590, 'Pariatur fugit libero ut nihil. Dolorem eaque totam a officia. Aut velit voluptatem unde perferendis eum. Esse quis eaque dolorem neque sit consequuntur nobis. Sequi consequatur vel et.', 'Aut officiis sint facilis incidunt illum. Ipsa ut id vel qui minus reiciendis excepturi. Rerum deserunt sit minus ab neque.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(591, 'Iusto iure quod aut voluptates cupiditate in facere. Repellendus eum ab ut quis veniam minima saepe. Qui esse sit fuga rem. Quibusdam qui voluptatem aut.', 'Omnis sit cumque dolores at id et. Ipsam libero enim quis ullam et. Possimus ullam unde iure natus.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(592, 'Minima est hic officia soluta voluptas quia. Cumque reprehenderit autem earum sunt. Omnis autem mollitia nisi dolorum.', 'Fugiat ipsam ut temporibus ducimus ut. Qui facilis aut itaque incidunt in. Necessitatibus facere aperiam iusto tempore possimus laborum.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(593, 'Aut unde voluptas architecto aut fuga. Aut sed ad voluptas quaerat pariatur eos consequatur. Numquam est sunt sed corporis et perspiciatis neque amet.', 'Modi molestias deleniti totam asperiores sit. Et perspiciatis similique commodi. Et nulla sequi odit sequi. Delectus unde praesentium sed aut aperiam.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(594, 'Reiciendis sapiente doloribus nostrum sint eveniet. Rerum ad velit in distinctio ut. Reiciendis ratione eos qui officia et sit odit et.', 'Atque et vitae vel numquam et autem quis. Nobis velit dolor ut. Voluptatum facere aut iure consequatur repellendus in accusantium. Quaerat explicabo magnam temporibus eum esse facere.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(595, 'Qui voluptates molestiae expedita id. Neque ratione aut quibusdam et. Enim neque aliquam eaque ipsa corporis ducimus cumque esse.', 'Deleniti id magnam est ea. Sunt culpa qui distinctio ipsum dolor dolorem. Dignissimos aspernatur numquam libero rem amet soluta aut consequatur. Corporis eos est voluptates qui optio sit nihil.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(596, 'Quibusdam tempora et nostrum ducimus explicabo. Ex expedita qui cum enim distinctio et. Sint est quam dolorum. Aut et in iure quod accusantium. Occaecati qui qui est iure. Minima labore ut quisquam nostrum quis aliquam.', 'Necessitatibus quis neque doloribus. Quia quod consequatur ipsum rerum facilis.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(597, 'Repellat provident esse quibusdam aut voluptatem. Asperiores neque delectus voluptas occaecati qui. Repellat odit est asperiores neque et qui pariatur. Aliquid voluptatibus in temporibus eos labore qui doloribus.', 'Quia consequatur nesciunt voluptatem est consequatur laudantium numquam. Et ea adipisci voluptate maxime quaerat. Temporibus occaecati enim praesentium fugiat.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(598, 'Atque necessitatibus dicta ex accusamus quia ad. Magnam et voluptas doloremque tempora illo iure in. Sint totam laudantium suscipit illo aperiam natus aut.', 'Exercitationem vitae blanditiis aspernatur hic. Quia omnis sed a omnis et occaecati. Dicta eligendi corrupti quam numquam accusantium asperiores non.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(599, 'Et temporibus doloremque dolores fugiat. Recusandae magnam alias ut et illo rerum alias. Eos quisquam ea ut veritatis quibusdam ad molestias error. Labore dicta voluptates aut maxime accusamus.', 'Et tenetur et distinctio ad sint. Quis blanditiis omnis omnis sit assumenda adipisci veniam ut. Et earum qui rerum accusantium cupiditate.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(600, 'Natus vel et sit cupiditate sint veritatis voluptas. Saepe aut commodi sapiente quis est consequatur. Voluptatem velit dicta id laudantium dignissimos.', 'Molestias aliquid eos itaque. Non sed ut alias quos. Nisi autem voluptas facere praesentium nihil ipsa. Vero aliquid quo est repellat.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(601, 'Non placeat eligendi ullam debitis reprehenderit dolorum. Est voluptates nihil rem quia. Dicta architecto qui voluptas voluptas veniam. Est officia harum praesentium ipsa neque ullam nihil.', 'Et ut laudantium autem neque temporibus eum ut maiores. Est alias eum libero et sit fuga voluptates.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(602, 'Et inventore quo neque. Est dolores fugit laboriosam nam. At natus eligendi autem quisquam veniam. At tenetur enim totam. Veniam iste non est voluptatem voluptas doloremque assumenda. Quia tenetur aperiam saepe. Autem voluptatem qui maiores magni vel.', 'Excepturi fuga et consequatur exercitationem velit. Sint aut et amet eum eum eos labore.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(603, 'Et fugit autem deserunt hic. Excepturi est nam et voluptatibus iure corporis et. Totam molestias in illum laudantium ut enim autem. Incidunt sed at aliquam.', 'Quae quasi nemo repudiandae. Voluptatum et ea ea dolores. Nisi nostrum quidem quos eum commodi consequatur. Blanditiis quis non enim ullam ducimus id provident eos.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(604, 'Illum aut sint delectus dolor. Dolorem beatae magni consequatur beatae id hic ipsam ea. Dolorum ea accusantium aut soluta qui aperiam. Et quis temporibus aut. Enim ut nostrum rerum et voluptatem. Quia et culpa laborum.', 'At ab quas itaque quidem officiis totam. Et et dolor quas eum ex natus. Sed quidem rerum sed deleniti omnis non facere.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(605, 'Veniam reiciendis dolores pariatur enim non eius voluptates. Iste consequatur exercitationem et excepturi eaque cum consequuntur. Adipisci minus assumenda voluptatem excepturi ut commodi.', 'Aut inventore sunt quia amet aut nemo assumenda. Sed veniam ipsam occaecati cumque. Repellat ad sequi eveniet sed omnis omnis dolorem.', '2021-11-20 14:48:08', '2021-11-20 14:48:08');

-- --------------------------------------------------------

--
-- Structure de la table `modeles_recus`
--

CREATE TABLE `modeles_recus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modeles_recus`
--

INSERT INTO `modeles_recus` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(1, 'Quaerat molestiae non aut voluptates et voluptas qui. Pariatur labore aut vel velit. Illum iusto aliquam explicabo delectus veniam optio praesentium. Ut molestiae velit est autem illum.', 'Natus inventore atque odit illo. Occaecati iure numquam quis laudantium praesentium. Et neque consequatur ea nam.', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(2, 'Aspernatur repudiandae inventore commodi accusantium qui fuga voluptatibus. Est enim iure mollitia provident quibusdam.', 'Alias aliquam est vel quibusdam. Necessitatibus voluptas quas quae quam. Similique et eum tenetur.', '2021-11-20 14:47:24', '2021-11-20 14:47:24'),
(3, 'Similique possimus necessitatibus eum autem illo iusto nobis. Voluptatem animi quod qui et. Qui ut voluptatem et id.', 'Maxime iure reiciendis odit qui similique. Ut iure maxime veritatis animi. Suscipit fugiat eum consectetur non quos deserunt.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(4, 'Vel velit cum ipsa aliquam. Ea voluptas hic quia nobis expedita commodi. Labore est voluptas repudiandae aut voluptas. Aliquid neque quam deleniti qui quas incidunt. Natus maxime sed quo eligendi nihil nemo. Voluptas temporibus eius molestiae autem odit.', 'Velit odit repellat et nesciunt vel. Porro sint qui non ut quaerat. Ut enim saepe facere tempore soluta.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(5, 'Et eos similique quasi in voluptate vitae dolores. Et totam sed odit nesciunt sint est. Debitis quisquam natus eos dolores accusantium. Sunt inventore in repellat beatae ullam maiores accusantium.', 'Sed sapiente sed sunt reprehenderit rerum est. Harum voluptatem sint non culpa ab. Culpa necessitatibus eaque ut adipisci sapiente. Soluta facere sed culpa architecto iure tempore dolores et.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(6, 'Iusto sed veniam voluptatibus ipsam et nisi molestiae. Sint eveniet quis laboriosam beatae et accusantium vel dolores. Id corrupti est porro aperiam debitis iusto.', 'Et qui quis quae ipsa id. Fugit aut repudiandae rem qui sunt occaecati vitae. Est sit eligendi impedit tempore quasi.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(7, 'Aperiam quaerat minus vel qui odio qui. Dolorum quis necessitatibus aliquam. Et nisi distinctio totam tempore molestiae libero minus. Minus odio sint quasi saepe sunt sed.', 'Eum amet fugiat deleniti. Reprehenderit numquam molestias qui dolores. Sed assumenda mollitia et at neque exercitationem enim. Eveniet nulla est deleniti eius.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(8, 'Voluptatem sequi pariatur eos quidem. Debitis voluptatem quam qui minus repellendus. Laboriosam inventore quis ad fugit molestiae.', 'Sed asperiores accusamus autem ut. Quidem modi rerum ut similique. Ipsum similique earum qui voluptatem ad. Quo officiis at est ut.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(9, 'Ut voluptatem nesciunt est est repellat aspernatur enim debitis. Aliquam cumque numquam sed aperiam omnis aut. Iste blanditiis cum in.', 'Blanditiis dolore natus omnis sequi eaque adipisci. Voluptates ab nam minima magnam aspernatur voluptatum.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(10, 'Quia eligendi facilis assumenda veniam cumque omnis consequatur. Nihil maiores voluptatem iste pariatur. Voluptatibus sed sit repudiandae sit. Cumque aut sunt est.', 'Libero provident modi et vel. Minus numquam soluta sit ratione ipsum sit. Quia dolorum et quo provident voluptatibus qui neque eos. Voluptas necessitatibus magnam perspiciatis aut officia dicta.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(11, 'Et est quia ea sunt nam recusandae. Ipsum maxime ducimus voluptatem et assumenda labore. Fugit quisquam quas error ab. Mollitia esse et perspiciatis neque id expedita. Quis omnis vel provident. Neque dolorem laudantium voluptatem minus.', 'Quo nulla placeat enim magnam. Reprehenderit est et doloribus est quae. Aut natus et quis qui nemo. Est itaque enim inventore accusantium consectetur commodi repudiandae.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(12, 'Consequatur cumque hic maiores deserunt cumque voluptatem quis. Eum ut ipsa rem nobis. Non qui at exercitationem porro et. Est aut iusto maiores omnis autem. Ipsam cum reiciendis qui sunt et. Non tenetur ea maiores et voluptas architecto distinctio.', 'Quia officia ipsam molestiae beatae et nostrum. In eos ut accusamus ex. Quibusdam et sint enim vel corporis quia. Eaque neque debitis nihil ut deleniti tempora et.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(13, 'Magnam ratione repellendus harum et earum ducimus unde. Asperiores laudantium ad laborum vitae optio corporis odio et. Autem deserunt corporis assumenda a est ut at.', 'Et sunt qui est omnis. Aut atque incidunt nam ad. Blanditiis et aspernatur quis earum ut consequatur laudantium laudantium. Laudantium voluptates rerum qui autem quo.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(14, 'Aliquid dolorum maiores explicabo repellat autem voluptas aut. Enim tenetur dignissimos eveniet alias in officia. Tenetur quod dolorum porro harum iste dolorem. Qui sunt quibusdam iure officiis.', 'Rem cupiditate numquam ut est aut. Iste sunt quae ipsam sint ullam sit. Aut necessitatibus quam esse.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(15, 'Sapiente adipisci facilis voluptatem rerum nisi accusamus ut. Consequatur sed iste magnam explicabo eveniet odio qui. Voluptates nam optio harum tempore id pariatur fuga.', 'Magnam similique aut maxime illo debitis sapiente distinctio culpa. Labore itaque enim voluptas fuga nesciunt et. Non beatae ut aut ut. Odit voluptatum dolore sint sapiente aut.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(16, 'Officia porro culpa voluptate ut. Perspiciatis quae minus ullam accusantium impedit. Facilis officiis veniam aliquam et animi. Eius temporibus possimus omnis sed sunt quisquam occaecati. Eos cum iure culpa eos dolorem ut minima. Quia id fugit fugit cum.', 'Voluptatem sint omnis maxime dolores debitis minima amet aspernatur. Omnis est tempora aliquid quia mollitia non. Et quae ad doloremque et natus.', '2021-11-20 14:47:25', '2021-11-20 14:47:25'),
(17, 'Qui harum ipsum illo culpa eos ullam quas. Molestias dicta occaecati et qui facilis ut quo. Veritatis voluptatibus quia aut quia voluptatem eum est. Voluptate dolorem iure tempore.', 'Mollitia explicabo dolorum ratione commodi. Dolor consequatur unde quis quisquam ut. Ex consequuntur quo iure nobis. Similique harum vel officia rem.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(18, 'Facere veritatis rerum magnam blanditiis voluptas. Tempore minus perferendis qui quasi. Asperiores rerum quod earum eveniet in soluta.', 'Quasi voluptatibus ut ut voluptatibus dolorem. Quis aut dolores eius accusamus. Nostrum qui esse sint repellendus ratione rem rerum. Corporis ab ut quam qui nesciunt.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(19, 'Ratione autem accusamus molestiae a enim molestiae. Molestiae officia est sit esse amet autem. Quam officiis magni atque sit dicta aut. Voluptatem animi voluptatem sit nisi.', 'Necessitatibus unde iste in. Maxime error architecto fugit aut praesentium. Nihil earum quaerat expedita. Harum quia sit aspernatur molestias.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(20, 'Pariatur eaque sit laudantium quis. Molestias et id omnis veritatis qui vitae nobis. Vel a reprehenderit ut hic aut dignissimos est ut.', 'Repudiandae corrupti corporis sit cum quae amet et. Rerum voluptates ullam consectetur ex. Enim dolores enim ea. Nesciunt et ut dolore quis nobis vitae accusamus.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(21, 'Molestias odio sed sapiente velit ut et. Ipsam in ducimus iure dolores dicta. Enim iusto eum corrupti ab.', 'Debitis ea fugit error nobis. Repellat quo culpa pariatur ea. Et quod aperiam voluptate aut. Ut accusantium magni numquam enim laudantium qui ipsum.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(22, 'Voluptates neque deserunt a porro. Sed quaerat voluptas omnis asperiores dicta atque doloremque. Natus cumque aliquam exercitationem dolores et veniam.', 'Voluptate dolores nisi ut quo ex nam voluptatem. Qui non nobis quia. Rerum omnis earum eum.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(23, 'Quos necessitatibus laudantium voluptatem voluptate eligendi quidem quasi. Ad eaque dolore ut et quam. Hic iusto provident sit odit et adipisci. Delectus nisi expedita eveniet aliquid.', 'Ipsa sed quia autem velit minus. Ad sed delectus a quod libero iure. Cupiditate et vitae necessitatibus.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(24, 'In qui quod molestias alias doloribus nobis numquam iure. Itaque et accusamus labore. Delectus numquam eaque necessitatibus nobis perspiciatis est.', 'Optio totam in omnis velit consectetur velit. Numquam accusantium et ipsam officiis autem voluptas id.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(25, 'Est velit omnis aut sint est odit. Ut eligendi iusto velit inventore. Sint dolor quia deserunt aliquam suscipit illum dolor. Quos aspernatur illum quo quia sint rerum doloremque. Praesentium temporibus deleniti alias voluptatum voluptate.', 'Aut laboriosam magni aut autem enim repellendus dicta. Et aut ut sint odio amet est repellendus. Culpa illum occaecati et sed praesentium harum enim.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(26, 'Quam nulla laboriosam illo. Consequuntur soluta cum natus et facilis. Sint fugiat et suscipit qui dicta.', 'Laudantium ad praesentium illo perspiciatis quibusdam ipsum. Et est nisi corrupti ut et. Vero ipsum qui accusamus optio.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(27, 'Voluptatem consequuntur nostrum ut architecto. Atque nostrum illo sunt dolores cupiditate voluptate. Sed vitae rerum tempore illo molestiae.', 'Cumque velit nesciunt ex veritatis iusto et. Exercitationem omnis nemo libero. Sed voluptatem qui repellat rerum. Qui omnis doloremque et ex officia sed consequatur.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(28, 'Quasi dolor eum voluptatem. Ut modi beatae nemo cum numquam veritatis quidem. Iure quae quo aliquid ab quas saepe error. Atque nobis expedita molestiae explicabo cupiditate temporibus itaque sit.', 'Voluptas et quod est amet. Repellendus esse sit aut animi. Et eaque ducimus est beatae omnis mollitia est et. Aut velit alias ut eius.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(29, 'Illo culpa adipisci iure magni odio numquam. Quia nisi rem non molestiae non cupiditate in vel. Aspernatur ipsam dignissimos amet pariatur dolor.', 'Ipsam saepe quia qui. Omnis enim quidem excepturi architecto nam consequatur. Fuga labore sed non minus reprehenderit. Sed sed quod rerum nulla adipisci optio voluptatem.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(30, 'Nam velit pariatur non. Dolores dolorum rerum eos molestias. Saepe quo modi deserunt perspiciatis accusamus voluptatum. Harum quia consequuntur numquam sed.', 'Amet mollitia optio atque id. Harum dignissimos natus fuga repellendus molestiae aut.', '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(31, 'Repellendus exercitationem quas consequatur consectetur itaque eum. Delectus et harum eos illum. In quo qui ut ut vitae omnis nihil. Distinctio neque quidem sed dolores.', 'Fuga ad quis iusto sit. Rerum saepe reiciendis ullam et impedit voluptatem ipsum ea. Nihil culpa quas quidem. Nemo earum quidem ipsum voluptatum earum.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(32, 'Dicta eligendi sit nihil aut porro. Voluptatem non aliquid ipsam rerum cumque dolor ad. Hic aut error velit aliquid et mollitia.', 'Consectetur eum odio impedit voluptatibus odio quisquam tempore fugit. Iste reiciendis voluptas quos illum eveniet laborum aliquam ullam. Itaque aut harum quasi quisquam.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(33, 'Omnis tempore inventore minima. Sequi velit commodi illo maiores cupiditate repellendus distinctio. Culpa excepturi veniam cumque ipsam quia dolorum. Non accusamus nihil nam.', 'Consectetur suscipit fuga nobis consectetur non qui expedita. Qui amet expedita velit quas distinctio repellendus quis. Consequatur nihil est ut sed exercitationem odio voluptatem.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(34, 'Molestiae tempore ut cum qui quod incidunt culpa aut. Fuga nesciunt perferendis sapiente alias. Consectetur dolorem amet sunt maiores laborum vitae.', 'Ipsum tempore nihil perferendis maiores eveniet esse excepturi. Minus non in velit consequatur. Eos magni enim saepe quis assumenda libero tempora. Velit asperiores autem fugit.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(35, 'Excepturi voluptas autem aliquam dolor. Magni aliquam non velit. Saepe tenetur itaque omnis occaecati facilis est rerum. Maiores ipsa possimus omnis asperiores dolores dignissimos.', 'Atque laudantium totam ipsam ab quaerat beatae. Omnis velit reprehenderit aut. Amet sequi rerum est blanditiis aut. Maxime asperiores nemo harum ratione.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(36, 'At temporibus commodi nobis recusandae nemo consequuntur quia dolor. Quidem ipsum cupiditate aut iste est eius rerum ratione. Laudantium corrupti aut quaerat aperiam aliquam.', 'Corporis asperiores rerum et dolore et porro ullam. Sed voluptas ipsum et voluptas dolores. At quod fugiat et eligendi qui sit. Rerum a quaerat laudantium libero voluptatem quam asperiores quod.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(37, 'Ab officiis sed aut ab omnis odio quod. Reiciendis laboriosam nobis quas voluptas ab. Doloribus iste eius in a rerum.', 'Et repellendus est numquam culpa mollitia earum. Qui deserunt aut impedit.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(38, 'Sit adipisci aperiam aspernatur nesciunt dolorum magnam aperiam. Ut iusto ex quos autem dolorem. Nihil vel ipsa aliquid officiis eos sed.', 'Laboriosam aut corporis repudiandae quibusdam. Suscipit saepe asperiores ut. Consectetur autem nihil enim et quos quia placeat est.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(39, 'Doloribus ut temporibus magni voluptatum repellendus et dolore. Nostrum harum esse repudiandae incidunt qui. Aut architecto aut et ducimus eos. Earum ut rem iure et quo dolorem vel laboriosam.', 'Ducimus corporis est in molestias rerum quasi velit. Aliquam aut ut magnam dolores. Quidem amet asperiores vel officiis quo rerum. Ullam blanditiis quidem sequi et quasi mollitia rerum.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(40, 'Modi rerum explicabo incidunt. Et voluptas asperiores ut voluptas. Id laboriosam occaecati alias ipsa. Architecto laudantium ut sit debitis id explicabo et. Sunt optio est nisi error reprehenderit adipisci.', 'Asperiores voluptatibus et et perferendis at. Sed quia modi facere et ea voluptas. Aut illo iure similique magni et harum vero assumenda.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(41, 'Eveniet in facere quod magni maiores sapiente sint dolor. Et rem porro dolores fugiat nihil. Veniam modi esse beatae repudiandae odit est. Soluta aut molestiae voluptas.', 'Aspernatur nulla qui odio vero. Iste consequatur fugit quibusdam perferendis tempore. Deserunt rerum laborum et dolor. Nostrum voluptatem voluptatem nihil sunt nihil iure.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(42, 'Numquam quia saepe et rem iusto ipsa. Quis rerum excepturi quia harum fugiat ipsa voluptatem natus. Blanditiis placeat ut ducimus nihil quibusdam provident.', 'Ullam assumenda omnis labore ad. Quis repellat qui qui enim nam a dolores. Ducimus magnam dolorem voluptas eum enim voluptatem inventore. Sequi cum et et rem nobis earum incidunt.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(43, 'Quo et possimus iusto vel voluptatem asperiores. Consequuntur et aut magnam. In enim qui quia quasi deleniti doloremque et.', 'Est sapiente hic eum ut animi. Consequatur quia quis incidunt id dolores. Magnam nam suscipit ullam temporibus. Illo aliquid impedit accusantium optio.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(44, 'Veniam quidem dignissimos porro saepe. Quasi ab est quis iste dolor molestias est. Sed impedit vel cum sed omnis. Omnis sint et tempore rerum ipsa voluptatem.', 'Nostrum quidem id rem et aut ducimus nam. Mollitia iste quaerat maiores temporibus aut distinctio vero voluptatum. Maiores in quia vitae magnam. Voluptatem quia cum ut enim asperiores dolor aliquid.', '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(45, 'Repudiandae optio et est ipsum veritatis ipsa modi tempora. Nisi animi quos cupiditate nisi vel quos. Aut expedita molestias rerum. Ipsam tempora qui numquam officiis est odio nostrum soluta.', 'Est ipsam modi ut aperiam nobis unde eaque. Labore impedit harum ut hic. Eos facere qui vel ipsa.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(46, 'Et repellat sint adipisci ipsum nesciunt. Veniam ut adipisci et neque facilis voluptatibus neque. Quia occaecati quo esse labore. Sunt voluptatem animi officiis error non unde.', 'Qui officiis incidunt animi quia saepe tempora quo. Dolor omnis rerum sit. Voluptates soluta dolores deleniti nihil quia.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(47, 'Quas similique maxime mollitia doloribus culpa reprehenderit qui. Explicabo quibusdam nihil enim facere totam unde corrupti. Dolorum fuga ipsam et et.', 'Neque asperiores occaecati magnam est incidunt. Eos iure qui ea maxime sed magnam tenetur velit. Enim sed harum sit aut.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(48, 'Hic et corporis ut libero illo. Ut voluptates dicta sunt molestiae vero sint. Qui ut itaque in perferendis culpa.', 'Dolor possimus natus soluta sit voluptates. Sint rerum eum doloremque ut quia asperiores culpa. Quis non quasi labore omnis aut et beatae.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(49, 'Aut voluptatibus molestiae placeat eligendi voluptatem voluptate. Placeat dolores ea quam. Ut dolorum qui numquam similique sed delectus ullam. Commodi recusandae omnis veritatis dolores necessitatibus ipsa doloribus aut.', 'Dicta odio esse ratione et aut magnam. Asperiores delectus non est dolor dolorem. Ut consequatur aliquam laudantium doloremque. Recusandae non reprehenderit provident modi.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(50, 'Aut esse ratione quidem ducimus nisi natus pariatur. Alias ipsa aut commodi voluptatem a. Officiis nulla odio quam quam.', 'Dignissimos iste maxime facere aperiam quia inventore iste aut. Consequuntur aut totam numquam. Magni laudantium in occaecati accusantium ipsam ab.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(51, 'Porro cum repellendus maiores sit et porro vitae. Qui recusandae animi aut doloribus nemo ab. Tenetur tenetur ut repellendus voluptatibus quia est ut. Est voluptas et sed exercitationem ut optio sed.', 'Et accusantium rem et fugiat eaque aut qui. Dolores eveniet quia atque odio hic impedit eligendi. Soluta ipsam accusantium sapiente et perferendis. Omnis ut eum doloribus libero omnis quis.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(52, 'Qui recusandae dolorum atque sunt vel vel maiores veniam. Sed eum et non sed labore id enim et.', 'Iusto non recusandae quas ipsa vero. Sapiente laudantium est nostrum voluptas et. Vero facere qui mollitia consequatur. Aut voluptatibus maiores cumque rerum quo expedita harum.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(53, 'Ullam itaque sit esse nulla. Sit officia quisquam aut fugiat. Autem sint sit numquam enim consectetur consequuntur. Rerum dolorum amet ullam eos qui.', 'Blanditiis nulla pariatur tempore non possimus debitis quaerat. Eos explicabo pariatur aspernatur veniam nostrum ea. Et accusamus et fuga blanditiis magnam.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(54, 'Incidunt temporibus distinctio beatae iusto iure velit. Repellat ut eius dolore quibusdam. Explicabo vero rerum placeat repudiandae veritatis.', 'Corporis omnis similique iusto adipisci. Dolore porro qui enim unde et officia est non. At repudiandae non distinctio aspernatur labore. Ipsam culpa officia perspiciatis error aut soluta praesentium.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(55, 'Quas rerum officiis aliquid maiores. Explicabo natus numquam distinctio sed eligendi nobis. Adipisci ut libero dolore facere veniam.', 'Ut cumque perferendis aut autem deserunt voluptatum aut. Qui ipsam repellat inventore voluptatem ea sed vero. Aliquid quo quis in ducimus et in totam.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(56, 'Nostrum sunt necessitatibus quae velit. Autem dolores aspernatur unde quo. Molestiae repellendus omnis quibusdam pariatur officiis.', 'Laborum similique et suscipit reprehenderit esse vitae. Exercitationem consectetur ipsum tempore ipsam. Aut quis et dignissimos repudiandae natus temporibus.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(57, 'Asperiores voluptate ipsum ut ipsa molestiae earum nobis dicta. Sint autem consequatur odit dolorum neque quia qui. Aut consectetur quis consequatur voluptas officiis consequatur nihil.', 'Quia illum reprehenderit hic est cum. Quo ab voluptate rerum et sunt omnis neque. Incidunt alias aut ratione excepturi blanditiis ut.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(58, 'Et placeat sit facilis sed officia. Voluptatem ut unde earum libero. Iste reiciendis voluptas magni enim. Molestiae enim voluptates error cupiditate et. Totam consequatur eum aperiam ea consectetur dolor et.', 'Quisquam eos incidunt eaque atque doloribus consequuntur et. Enim quae eligendi voluptates unde magni. Nam doloribus odit ut qui iure praesentium velit. Tenetur deserunt porro quos.', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(59, 'Qui voluptatibus et fuga ipsam ullam nihil error. Accusantium eum dignissimos recusandae. Quod at aliquam consequatur sequi vero autem. Numquam perferendis aliquam perferendis velit perferendis quo non qui.', 'Ut cum dignissimos rem vel. Modi impedit et nihil nisi. Rerum qui vero et a aut.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(60, 'Sunt quibusdam adipisci officia non reprehenderit qui aut. Dolor pariatur ratione dicta impedit accusamus. Et magnam corporis quibusdam quaerat. Sunt vitae itaque perferendis eum deserunt tempora.', 'Quae exercitationem nobis maiores facilis modi velit. Blanditiis aliquid maxime ut cum non expedita. Et enim quaerat vitae repudiandae. Voluptate odit modi qui voluptatibus.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(61, 'Ut totam odit accusamus placeat. Velit est omnis non. Et illum vel eos sed temporibus rem.', 'Aut molestiae exercitationem autem ipsa placeat corporis. Illo dolores est minima rerum. Est voluptatibus cumque accusantium ipsam. Natus quo ab sequi et.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(62, 'Tenetur eum nihil voluptatibus. Atque a tempora ullam voluptas aut. Est repellat possimus nihil voluptate. Id porro sequi quas omnis dignissimos aut.', 'Nisi veniam exercitationem et quam odio quod quia. Molestias et aut similique nemo. Dolorem asperiores rerum excepturi voluptates sed sed. Vel vero amet in.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(63, 'Expedita quaerat quidem accusantium porro atque ullam perferendis. Ut ipsa a amet aut quis at aut. Ut ab officiis qui et cupiditate eos.', 'Saepe delectus ut magni commodi. Rerum vel qui autem pariatur fugit. Ad debitis maiores molestiae quis blanditiis. Eligendi voluptatibus voluptas nihil qui.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(64, 'Tempora necessitatibus tempore ea sequi voluptates et. Aperiam eligendi sed ipsam aut. Ullam non vitae nihil optio placeat dolore voluptas officia. Quia totam quidem nihil dolorum velit pariatur hic voluptates.', 'Quos ipsum sunt voluptates eius et cupiditate est et. Nemo error et doloribus autem sequi ipsum commodi minus. Maiores quia laboriosam aliquam atque laboriosam distinctio vero.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(65, 'Quis ut praesentium excepturi voluptates et. Amet numquam et voluptatum voluptas. Aut temporibus accusantium voluptatem adipisci. Dicta voluptas enim exercitationem. Aut iste qui ullam nostrum et nobis velit. Quo et adipisci nihil deserunt.', 'Non sint iure in esse ducimus aut. Ad sapiente omnis suscipit fuga. Labore doloribus qui a.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(66, 'Necessitatibus quam laboriosam nisi sit autem et et. Culpa et et iste blanditiis dicta. Ut laboriosam ea libero in doloribus nihil distinctio.', 'Dolorum perferendis sit maxime omnis. Adipisci esse placeat ullam ea. Debitis nihil sed rem adipisci. Facilis necessitatibus culpa quos aut. Sapiente corporis sed ipsum et voluptatem quibusdam.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(67, 'Cum error sed et voluptatibus consequuntur earum. Ut alias nisi nisi esse fuga blanditiis voluptatem. Consectetur beatae nam voluptatibus ad vero aperiam consequatur ratione. Vel illo quam aut reprehenderit rerum.', 'Ipsam quis molestiae pariatur in amet consequatur. Similique eaque eum ut. Aut minus quia consequatur magnam hic voluptas.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(68, 'Ut nobis quidem sed porro nihil excepturi. Voluptas sint laudantium consequatur eum sapiente quia neque. Eum molestiae sapiente recusandae sit inventore aliquam. Vel consequatur nisi ea adipisci.', 'Eum eum laborum impedit et. Molestiae aut at ipsa voluptate rerum sed aut. Omnis iusto numquam sint officia. Deleniti porro dolore est labore laboriosam pariatur commodi fuga.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(69, 'Quos saepe omnis placeat error quam. Et corporis quo quis labore non. Nemo sit ut iste. Ratione qui tempore provident tempora ut aut. Deleniti omnis modi rerum dicta temporibus. Vero provident aut aut sequi et aut.', 'Ipsa nihil beatae ut laboriosam quisquam voluptates. Et officiis veritatis eum. Delectus aperiam voluptate modi vel nihil tenetur.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(70, 'Minima fuga aut architecto rem perspiciatis non nostrum. Qui et omnis omnis amet excepturi eaque quaerat autem. Non id sit quae culpa. Id non placeat non.', 'Architecto nulla et quos velit aut delectus consectetur. Asperiores quidem fugiat aut fuga ut. Doloribus voluptas explicabo sequi enim nisi. Aut non ut incidunt quisquam laborum id.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(71, 'Eligendi officia maxime molestiae assumenda ut labore expedita minus. Itaque et nam nemo et aperiam. Fugit repellat cumque sit distinctio. Autem ex cumque facilis quia explicabo id in praesentium.', 'Error porro commodi et sint iusto laboriosam. Est aut repudiandae debitis numquam minima et. Sed harum ex itaque inventore. Provident quia non blanditiis reiciendis.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(72, 'Mollitia provident et delectus consectetur voluptatem error quae. Rem cupiditate sint sapiente consequuntur voluptates possimus. Dolorem molestias autem alias quos ab. Eligendi quam autem quas quia iste cumque.', 'Dolorem mollitia numquam eos libero in et quae. Excepturi sint amet enim veniam sit vel. Ut vitae et reiciendis molestiae temporibus.', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(73, 'Adipisci facere itaque eum temporibus facilis. Quo saepe quas sapiente error illo neque nam quo. Totam rerum vitae ut. Eaque iusto quisquam qui laboriosam recusandae voluptatem consequuntur. Unde et et qui.', 'Quia sint incidunt voluptatem eveniet omnis voluptatum nihil. Sunt necessitatibus inventore dolores vel tempore assumenda. Id eum aspernatur qui veniam quia dolor est eos.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(74, 'Voluptatem deleniti consequuntur eveniet omnis alias non omnis. Corrupti vel placeat saepe est. Quo sed tempora mollitia minus illum.', 'Nihil suscipit et corporis. Dolor incidunt ut voluptate quos ut. Illum aut est hic dolorum nisi. Perferendis et dignissimos est est soluta incidunt vel.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(75, 'Eos nam architecto odio ipsam aut. Est et repudiandae repellendus ut nobis. Cumque dolor vel suscipit unde veniam est debitis consequuntur. Expedita in earum suscipit minima. Consequatur temporibus fugiat quo repellat itaque temporibus architecto.', 'Provident maxime tempora adipisci voluptatum libero autem. Eligendi explicabo itaque consequatur accusamus similique.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(76, 'Consequatur consequatur maiores est et inventore repellat doloribus. Fuga enim quis at eligendi. Omnis dolor iste explicabo error sed. Laudantium a ducimus eos dolor temporibus autem.', 'Unde quis est error laboriosam beatae. Neque commodi quam mollitia architecto velit pariatur. Velit amet ut doloremque. Sint nulla fugiat ea repudiandae sint molestiae numquam.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(77, 'Aliquam et aut quae aut corrupti enim. Voluptatem quibusdam aperiam maxime labore quaerat molestiae eos commodi. A quia quis aut et quo unde reprehenderit. Eum tenetur sunt voluptas est omnis architecto ipsa.', 'Rem eum maiores molestiae voluptatem tempora qui. Aspernatur adipisci et eos nisi provident alias. Alias quae sint ipsam incidunt quia doloremque totam. Temporibus incidunt dicta voluptatum vel.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(78, 'Dolorem optio tenetur autem et delectus atque quia inventore. Quisquam laborum sapiente earum architecto. Amet illo labore perferendis et nostrum accusamus iusto libero. Soluta architecto sit blanditiis iure nostrum totam dolor.', 'Vero porro odio ipsa quos dolores et voluptatem. Quia ut ea laudantium dolor rerum. Numquam facilis et magnam doloremque. Voluptate quia ut fuga aut nisi quidem.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(79, 'Voluptatem nobis eaque enim rerum voluptas culpa natus. Atque nihil ut incidunt aut. At doloremque necessitatibus saepe voluptatem veniam itaque quia. Tempore ullam nostrum tenetur perspiciatis numquam.', 'Doloremque aliquam odio dolorum eveniet qui. Id facilis non exercitationem et a accusantium. Blanditiis et deserunt sed dolore facere accusantium.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(80, 'Voluptatum est voluptatibus in aliquid necessitatibus illo ut. Culpa sit rerum reprehenderit. Rerum quis dicta ipsa exercitationem.', 'Cum voluptatem quia quibusdam architecto. Aut id voluptate autem corporis sint ipsa et. Voluptas ullam illum nihil unde.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(81, 'Perspiciatis quo at similique quam et quisquam perspiciatis. Vero doloremque fuga eos reprehenderit rerum libero. Odit dolor expedita quo omnis. Sapiente voluptatem nesciunt ea magnam.', 'Qui quis dolorem aspernatur sed magni dolores praesentium. Qui amet voluptatem iure quaerat nobis. Sequi veritatis et sed alias. Velit id necessitatibus qui enim.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(82, 'Ut aut consequuntur amet rerum sed ea. Et hic atque possimus ut molestiae voluptatum recusandae. Consequatur maiores non ipsa aliquam. Eum odio nam aut placeat. Dolor a magnam temporibus voluptas omnis aut veritatis. Laboriosam in est vitae vitae ullam.', 'Veritatis voluptates sunt veniam et. Sapiente veniam occaecati beatae vero ipsum nisi ut. Ipsum sunt aut illum rerum quia et voluptates. Blanditiis qui ea voluptatem inventore pariatur.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(83, 'Ducimus dicta perspiciatis qui quia voluptates. In repudiandae rem odio qui expedita laboriosam porro. Vitae quod doloribus ut aut cumque ratione dolores voluptatem.', 'Qui dolorem qui accusantium quas. Suscipit autem corporis assumenda culpa unde. Sit amet quia sequi quae sint sapiente atque. Blanditiis nobis quos omnis et.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(84, 'Voluptas quo ut cumque eum minima fugit. Et distinctio vel aperiam laboriosam accusamus. Atque nostrum est est cum quidem facilis quia. Mollitia et consequatur culpa et iste aliquid.', 'Illo quibusdam vel nostrum tenetur minima adipisci inventore sit. Harum id sed ut quia et aspernatur animi. Perspiciatis odio explicabo rerum quia aliquid nemo laborum nesciunt.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(85, 'Molestias labore aut aut dignissimos sint non non numquam. Quia aliquam dolorem dolorem qui accusamus. Facere vero enim minima aut dolorum ut laboriosam corrupti. Ratione nihil ratione amet aut.', 'Sit numquam rerum autem sed et. Ut eum et et dicta sit iste odit. Temporibus aut hic natus ratione.', '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(86, 'Blanditiis praesentium necessitatibus rerum error. Voluptas doloremque est esse dolor. Illum et vel voluptatibus explicabo. Velit ea sed eum quia. Qui eos facere velit iusto sit aut.', 'Enim architecto laudantium magni molestiae facilis iusto ullam. Aspernatur itaque nulla fugit hic qui. Ut enim tenetur est rerum laudantium libero.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(87, 'Est officia dolor et doloribus dignissimos molestiae. Autem dicta voluptas est labore aliquam. Ducimus voluptas debitis ut temporibus qui ex dolorem sint. Quia et in eaque animi sed odit.', 'Voluptate nesciunt praesentium est magni ducimus earum et. Et recusandae eligendi nemo distinctio. Quae est minima natus.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(88, 'Minus mollitia numquam dolorem voluptatem magni. Et qui dolorum porro enim excepturi. Totam aliquid laborum possimus maiores corrupti et asperiores excepturi. Quia atque expedita beatae ea at sequi sunt consequatur.', 'Consequatur error rerum blanditiis sed minima explicabo laboriosam dolor. Tempora incidunt quos in ea ipsum sit sint facilis. Dolorum illum ullam qui eius sint. Eius velit esse eos est repellat sed.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(89, 'Est aut molestiae aliquam architecto vel aperiam quidem. Aut eius placeat quo libero praesentium pariatur. Et in qui dolores sapiente sit eaque blanditiis.', 'Qui maxime unde qui nesciunt consectetur tempore. Et est et accusantium voluptas. Voluptates fugit blanditiis repellendus. Consequatur quis perferendis voluptas dolorem sint voluptatem enim.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(90, 'Minus aut repellat est ipsam. Excepturi non et aspernatur voluptate. Eveniet suscipit sapiente aut reiciendis repudiandae. Quisquam repellat aut earum.', 'Eum numquam corporis magni est in minus facilis. Optio alias ut ullam quia enim ut. Voluptatibus repellendus id possimus ea quasi.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(91, 'Officia sunt quis sapiente possimus. Explicabo vero nesciunt rerum quam. Voluptate placeat incidunt et sit.', 'Dolorem consectetur quibusdam ipsum consectetur quas ut beatae. Ut rerum ea culpa. Aut est sed non quo dolorum sit sit.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(92, 'Tempora consectetur quia consequatur id. Ut dolor temporibus at doloribus rerum molestiae. Perspiciatis totam repudiandae vel aut dolorem repudiandae est blanditiis.', 'Corrupti sunt sed occaecati consequuntur iste. Dolor sit incidunt praesentium perferendis consectetur. Rem praesentium dolorem occaecati aut. Possimus qui saepe sunt quo omnis.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(93, 'Nobis eius eum vel eveniet laborum quidem. Voluptas qui vel qui molestiae atque reprehenderit. Hic tempore reprehenderit corrupti aut. Aut voluptatem sit qui eaque.', 'Iste voluptatem ut et et. Provident aut quia aut omnis nihil sit qui. Facere eaque praesentium dolorem ut. Perspiciatis aliquam explicabo omnis et. Omnis ad qui sit adipisci fugit voluptas.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(94, 'Nihil aliquid dolorem rem libero deserunt debitis. Eaque ratione eius corporis voluptatum. Et ullam ea repudiandae. Molestiae et et perspiciatis quae eveniet. Quibusdam amet iste sed nostrum occaecati.', 'Earum neque velit id maiores aut ea. Similique aperiam dolorem praesentium eum. Tenetur est magni maiores dolor.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(95, 'Sit quis accusantium veritatis aliquid incidunt ut. Cumque nam quisquam iste libero. Ut iste omnis ut occaecati autem eaque. Debitis nihil ut error atque doloribus vel.', 'Esse molestias et pariatur magni sit molestias quod. Rem est ut possimus vel magnam et. Sit quibusdam illum consequatur molestiae aliquam similique.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(96, 'Totam voluptas officia omnis. Distinctio aperiam necessitatibus repellendus ipsa pariatur non. Doloribus dignissimos et ut eaque itaque earum. Quasi rerum corporis ullam illum. Illum repellat rerum natus qui nemo.', 'Consequatur velit nulla nihil quidem. Vel doloremque dolorem optio est qui et rerum. Cum porro sequi quis architecto aut. Iure est aut aut reprehenderit pariatur.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(97, 'Et ut iure sint porro et deserunt et. Occaecati corrupti rerum est et. Doloremque expedita doloremque perspiciatis nihil.', 'Sint explicabo incidunt recusandae esse quos voluptatem. Corporis autem voluptatibus velit quisquam ea eos. Aut aliquid quia nihil exercitationem blanditiis.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(98, 'Eum repellendus nihil ea corporis. Rem ab consequatur unde est deleniti saepe. Dolorem adipisci nihil facilis rerum. Minus provident sed officia aut magni.', 'Odio labore aut quia et molestiae id. Eum eum quo voluptatibus natus sequi reiciendis omnis. Animi doloribus veniam omnis cum consequatur porro. Error fuga aspernatur cum fuga.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(99, 'Et commodi a praesentium voluptatem molestiae. Sit et voluptatem atque excepturi quos quis. Architecto ut illum numquam dolores voluptatibus dicta sed.', 'Ut cum vel aut eos tenetur eligendi velit veritatis. Rerum cumque tempora id deserunt enim et repellendus. Minima et quo quas sed enim. Aut quasi voluptatem eos praesentium.', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(100, 'Dolorem deleniti qui voluptas est culpa. Amet reiciendis omnis temporibus asperiores qui. Voluptate porro est quis porro. Dolorem architecto voluptatum autem.', 'Explicabo qui tempora accusamus maiores. Illum fugit ut vel totam eligendi. Dignissimos enim quae doloribus odio maxime. Nihil odio vitae vitae reprehenderit minima eos unde.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(101, 'Qui accusantium quos maiores nihil officiis tenetur et. Dolor ut non ullam labore ipsam ab aut quae. Repudiandae sunt eveniet eum cupiditate ut rem.', 'Sit mollitia et esse consequatur ipsam facere dolor. Distinctio possimus dolor qui. Alias unde voluptas ex consequatur et quas quisquam mollitia.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(102, 'Ratione sed commodi deleniti. Repudiandae necessitatibus hic omnis inventore cum. Nobis autem vel recusandae blanditiis omnis magnam rem. Cupiditate magnam facilis culpa et quo.', 'Quas dolore nam dolor vel ullam molestiae non facere. Omnis nobis voluptatum eligendi quia est hic. Aut eos laborum qui explicabo animi culpa neque velit.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(103, 'Deserunt consequatur minus omnis eum. Quisquam a blanditiis non placeat quia dolores quae. Quaerat voluptatem et neque recusandae sunt eos sed.', 'Repellat aspernatur sed alias sed quod. Et dolorem cupiditate praesentium rem assumenda. Provident voluptatum consequatur beatae et. Sed aliquam illo dolores ab.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(104, 'Rerum ut consequatur vitae dolores voluptatem. Et beatae unde cupiditate aut ratione. Dolores non saepe aut distinctio.', 'Ut laboriosam non asperiores est. Minima quod itaque ipsam quam. Tempora vel quaerat culpa quia voluptate voluptatem.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(105, 'Itaque magnam dicta id quia facere. Corrupti earum molestias possimus tempore minus. Asperiores vel omnis fugiat cum eligendi quia. Maiores aliquam distinctio veniam blanditiis iusto est.', 'Quas tenetur rem tempore ipsa saepe sit explicabo culpa. Eaque rem qui aut recusandae facere minus id. Totam harum culpa nam officiis et dolores. Voluptatum deleniti ullam omnis dolor a magnam.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(106, 'Quia animi dolores omnis dolores non. Eos soluta reprehenderit sit tempora rerum. Qui eum consequatur voluptatem qui accusantium. Aut quos facere id impedit consequuntur. Tenetur placeat nulla inventore aliquid aut nulla.', 'Itaque quo vel officia eius quaerat qui fuga. Dignissimos et magnam eveniet sapiente. Ut ab iure quam quibusdam. Quidem iusto inventore error rem.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(107, 'Dolorem laboriosam facere et at maxime. Occaecati architecto doloribus voluptas veritatis. Necessitatibus aut iure quod non rerum consequatur soluta. Eos nam fuga excepturi saepe hic nihil culpa.', 'Autem amet dolor velit. Quo ab quia placeat aut commodi id sit. Nihil et qui sapiente. Nemo architecto et vel sint vitae consectetur.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(108, 'Aperiam explicabo ducimus ad molestiae tenetur et sint. Fugit at excepturi consequatur ab quasi assumenda et. Exercitationem sequi modi sequi mollitia sunt.', 'Molestiae inventore vero rerum culpa aut eum. Reprehenderit eum delectus laudantium. Sed ut ut quae libero quia quo. Et omnis velit molestias id optio itaque.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(109, 'Aperiam quisquam similique dignissimos aut vel sint deleniti. Consequatur est et adipisci modi. Repudiandae in minus quos laudantium.', 'Qui cum quia et nisi accusamus. Praesentium non ut ipsa in. Et voluptatem laudantium et et.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(110, 'Minus amet consequatur sed. Id et impedit commodi id. Dolor accusantium quia placeat voluptatibus omnis officiis qui. Corrupti vel omnis libero reprehenderit consequuntur.', 'Asperiores laboriosam nihil cumque repudiandae quibusdam quos minus. Possimus facere molestiae aut earum itaque accusamus laboriosam. Eligendi laudantium tempora sint sit adipisci nam eum.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(111, 'Doloremque exercitationem vel perferendis hic aperiam. Doloribus sit cupiditate nam explicabo sed. Ab veniam provident sit quos.', 'Fugiat dolor atque velit numquam cumque doloremque. Magni velit dolor asperiores maiores ea consequuntur. Consequuntur officia pariatur error.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(112, 'Quisquam dolor beatae autem iusto. Ut veritatis voluptatibus delectus voluptas. Quas modi aut animi et. Aliquam harum eum magnam est sed quaerat aperiam.', 'Expedita qui quas est maiores illum totam quis. Ut dolorem aut qui saepe qui veritatis. Nesciunt consequatur qui sequi est aut. Maxime recusandae nulla quia et.', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(113, 'Ipsum accusantium et unde omnis. Aspernatur et dolorem voluptatum voluptatum cumque architecto fugit sint. Cupiditate accusamus et commodi magni nam quia est quia. Impedit eos aliquid asperiores mollitia adipisci minus.', 'Ullam sed omnis consequuntur consequatur rem. Iusto repudiandae quis maxime odio aspernatur eum deserunt. Corporis at voluptatem autem autem ut labore. Quasi culpa deleniti ullam accusantium labore.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(114, 'Excepturi consequatur ab facilis dolorem sed similique. Id rerum excepturi veritatis ut dolor ea. Sed non placeat voluptatem amet reiciendis in consequatur.', 'Eum quibusdam consequatur sed iste. Dolores quidem dicta odit aut assumenda tempora. Nesciunt eaque asperiores reiciendis voluptas iste necessitatibus quia.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(115, 'Soluta et quos ratione laborum totam numquam sunt. Veritatis dignissimos velit debitis tempora ut itaque delectus. Reiciendis nihil consequatur corrupti voluptatem maxime saepe. Est et et eveniet numquam voluptatem quisquam delectus.', 'Aut architecto tempore nesciunt in optio eos non. Et temporibus reiciendis eos repellat. Sed at perferendis qui in nisi. Provident ducimus inventore sed omnis.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(116, 'Similique minima nesciunt error dolorem dolorem. Omnis quis nemo ratione nihil. Facere dolorem modi dignissimos vel et error. Molestiae non est fuga in in. Ipsa qui optio consectetur necessitatibus corporis quia debitis animi. Et sint fugiat dolore odio.', 'Porro ducimus hic voluptatem quisquam provident. Et harum labore rem voluptas. Praesentium necessitatibus iure et provident aut possimus.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(117, 'Id repellat quia non molestiae qui eum. Autem voluptas et voluptate laborum consequatur distinctio commodi vel. Recusandae cumque optio qui aut.', 'Mollitia consequatur sunt veritatis eius maiores. Saepe non iure dolore accusamus sit. Amet totam inventore architecto vitae harum sapiente.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(118, 'Est cupiditate repudiandae accusamus soluta eius aut neque. Facere ullam omnis consectetur ullam necessitatibus error nam.', 'Aperiam voluptatem voluptas praesentium sit est provident dolor blanditiis. Harum dolore excepturi magni minima eos quibusdam aliquam accusamus. Enim minima neque deleniti quasi.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(119, 'Non vel ducimus qui consequatur tempora. Voluptas fugiat voluptates similique ea ratione. Et ea amet qui qui. Ratione quo incidunt rerum est ut impedit iusto. Nisi eum officia voluptatem sapiente autem eveniet.', 'Qui quos voluptate at nam facilis nihil vel. Praesentium repellendus aut dolorem quam dicta et voluptatem quidem. Magni accusantium aliquid ipsa.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(120, 'Reprehenderit laboriosam voluptas magni aspernatur aliquid. Soluta iste laboriosam optio maxime facere. Quo animi officia architecto saepe. Quia asperiores voluptas est voluptatum voluptatum.', 'Velit iusto voluptatem sapiente aut hic dignissimos aut. Laudantium doloribus tempora temporibus doloremque quam temporibus delectus. Corrupti veniam velit quo porro.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(121, 'Praesentium placeat iste in maxime qui qui similique. Et sapiente praesentium animi mollitia dolor. Tempore enim repudiandae quo quidem totam sapiente illum non. Et id repellendus officiis.', 'Velit et voluptatem debitis dolorem. Expedita non consequatur sunt molestiae voluptatem beatae. Illo vel necessitatibus aut. Ea facere harum sed.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(122, 'Libero consequatur natus qui est ducimus quia. In cupiditate dicta neque numquam. Qui laborum perferendis animi beatae itaque est suscipit. Qui error dolor vero molestias.', 'Quisquam qui voluptas qui voluptas quis sed reiciendis velit. Porro laudantium cum rem nisi saepe rem sed. Ipsum ipsum qui nobis.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(123, 'Ut minima autem harum placeat dolore et. Quaerat assumenda sint dolores. Assumenda fuga inventore voluptatem ut perferendis modi ipsam. Et temporibus harum fuga voluptas rerum rerum.', 'Sed voluptas cupiditate sunt omnis doloribus dolores. Quasi veniam molestias facilis sed dolore ipsa. Ut nostrum sed nemo rerum in.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(124, 'Amet et nihil sint ipsa. Modi ut porro quas est sint ut sit. Aliquid aut quo at cum eius. Ad eveniet velit facere libero magnam. Asperiores dolor quia quod. Vel odit exercitationem adipisci sequi. Eligendi sint nemo eius autem. Nulla harum similique non.', 'Modi est et voluptatibus et animi est nostrum. Enim sapiente id rerum fugiat. Et ducimus nemo quod harum neque facilis laboriosam.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(125, 'Assumenda voluptatem velit nihil velit. Dolorem et accusamus dignissimos ea voluptate voluptas corrupti doloremque. Ad eius illum libero voluptate enim minima reprehenderit.', 'Vero est deleniti enim est. Nobis assumenda sed quo voluptatem dolorem cumque eius. Nobis eos ullam qui veritatis hic.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(126, 'Quis repellat sed et asperiores eaque. Cumque occaecati eaque sit quas eos. Voluptas est sit optio ipsam dicta omnis officia. Minus eum officiis sapiente est odit nihil dolores ab. Cum aspernatur eos quo.', 'Culpa sunt fugit impedit aut porro nam voluptas. Magni qui illo numquam aut laudantium suscipit rerum. Quasi neque ea aspernatur.', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(127, 'Vitae tempora et autem commodi veniam suscipit deleniti. Dolorum vel vero aliquam dignissimos voluptas quo provident. Hic voluptatibus occaecati ut tempora quaerat. Et debitis et amet dolor eligendi quis explicabo.', 'Et quis eligendi sunt delectus quis eos doloremque. Cupiditate voluptatum vitae iure laudantium quia. Debitis amet a sint quis labore. Dolorem necessitatibus consectetur autem molestiae.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(128, 'Quae assumenda officiis dolore. Soluta adipisci ad qui ut. Qui voluptatem earum fugit aut ut architecto ut animi. Aut deserunt placeat natus cupiditate nam sed qui.', 'Tempore et vel accusantium magnam. Aut id tenetur aliquam consequatur et ut. Ratione facere quisquam similique natus. Enim similique et molestiae ea dolorem et debitis.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(129, 'Et velit rem corporis maiores deserunt placeat. Fugiat enim autem occaecati iure.', 'Enim quae dolores eveniet cupiditate. Rerum voluptates in recusandae beatae sapiente non. Rerum numquam non consequatur fuga.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(130, 'Similique ipsa maxime dolorum. Et perspiciatis et quasi in ullam error odit quo. Sed facilis labore sed quaerat. Dolor enim necessitatibus quam repellendus nulla inventore omnis.', 'Quidem veritatis veniam corrupti dolor nobis illo. Quas totam tenetur molestiae sunt. Laborum voluptas veritatis quo dolorum ea ad. Sed quia officiis officia.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(131, 'Distinctio nemo doloremque enim itaque et exercitationem dolor. Voluptas assumenda nihil ducimus voluptate molestiae facilis vitae non. Provident et ad numquam.', 'Ipsa exercitationem cupiditate cum consequatur vero non. Quia porro libero suscipit dolor aperiam corporis. Sapiente dolor quia adipisci occaecati quisquam. Iure molestiae reiciendis et accusamus.', '2021-11-20 14:47:34', '2021-11-20 14:47:34');
INSERT INTO `modeles_recus` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(132, 'Perferendis quia eveniet repellat placeat vero. Enim corrupti ea quae cupiditate excepturi ut iusto. Dicta iste quos eius assumenda rem commodi. Voluptatem consequatur perferendis minus et minus.', 'Ipsum et ut est dolorem non magnam. Assumenda officiis suscipit blanditiis itaque ab inventore aut. Earum assumenda quos autem omnis qui molestiae nostrum et. Minima quia asperiores ad expedita.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(133, 'Voluptas consequatur possimus est iusto voluptatem quo eum. Dolorem fugit voluptatem aut quisquam. Impedit dicta quisquam veritatis optio vitae sit eum minus. Officia minus dolor aut et.', 'Quia distinctio quod nesciunt fugit expedita. Laborum ab et aut. Dolore nisi quia ipsa ducimus reiciendis. Dignissimos deleniti soluta quia pariatur culpa est.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(134, 'In quisquam eos quaerat labore quam aut. Alias blanditiis expedita id velit. Perferendis id ex est laboriosam et. Veniam impedit deserunt eos iste.', 'Commodi laudantium vitae dolores error vero. In molestiae iure in eius a magnam numquam vel. Et et nisi iure sed in nulla sed laudantium.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(135, 'Architecto quis aspernatur autem ut perspiciatis esse ad. Ut voluptas eius optio. Minus et occaecati eveniet rerum voluptatum ab.', 'Incidunt quidem accusantium ipsa labore ut saepe perspiciatis ex. Corrupti nostrum aut iure unde qui sed. Dolorum rerum voluptas eius itaque expedita.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(136, 'Suscipit modi eligendi impedit labore. Et autem minima quis est nesciunt cum. Nostrum saepe ut beatae blanditiis. Eum non nisi a dolor quis.', 'Fugit eos a enim nemo et. Autem vero et quia sint facilis sed nam. Et natus consequatur soluta cupiditate non optio iure.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(137, 'Est eum quas unde sit repellat. Accusantium ad odio delectus. Animi id iure minus placeat consequuntur optio.', 'Aut qui a dignissimos. Non optio delectus molestiae repellendus quia architecto doloremque. Itaque qui facere aspernatur inventore.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(138, 'Aliquid doloremque alias alias porro et quis aperiam. Praesentium voluptatem excepturi minima et dicta. Praesentium laboriosam voluptatem autem enim rem.', 'Sit magni at non vero aut a error. Nulla quo veniam doloribus provident voluptatem nihil. Ea nulla aut dolor nisi.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(139, 'Ut odio qui vitae inventore ipsum sed ad. Sit sint odio fugit aut ea unde. Ullam eos officia qui a. Similique recusandae aliquid quia id ut dolorum. Inventore quo autem facere. Praesentium ut qui atque nemo commodi quis veritatis.', 'Esse quis consequatur nulla. Fuga laudantium consequatur nemo voluptatum et quia. Asperiores excepturi dolore quidem deserunt odit non. Amet ratione voluptas deleniti dolorem.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(140, 'Omnis et incidunt voluptatum ducimus et voluptas ipsa. Et omnis aut et magni. Nulla dolorem blanditiis nostrum voluptatem ut doloremque tenetur. Sunt accusantium quae velit libero labore ab.', 'Vitae est mollitia aut sapiente doloremque est. Pariatur et ab vel aliquid. Nobis molestiae fugiat quos dolorem ipsum. Qui et sunt sapiente voluptatem officia.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(141, 'At nobis aperiam libero dolor. Aut est consequuntur animi et labore optio ab. Nihil et et porro. Est possimus et sunt rem accusamus qui. A delectus quia mollitia et. Assumenda odio eum architecto consequuntur hic. Deleniti ullam dolorum enim velit aut.', 'Id doloremque ut quo voluptate. Distinctio dolorem et in et suscipit et. Impedit neque ut dolore cum ut.', '2021-11-20 14:47:34', '2021-11-20 14:47:34'),
(142, 'Quidem asperiores voluptatem officiis ex et esse culpa. Soluta accusamus numquam veniam aut. Vel commodi recusandae id sunt ut odio excepturi nemo. Aut voluptate quia omnis eligendi ut.', 'Consequatur id et minus harum consequatur quod. Repellendus autem nihil dolore et qui maiores fugiat. Veniam nesciunt molestiae ipsam atque.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(143, 'Consequuntur consectetur sint consectetur delectus animi. Qui saepe aut commodi. Praesentium sunt molestiae et non.', 'Consequuntur ab laudantium id voluptatem tenetur. Qui nihil earum tenetur omnis qui ut. Natus vel ut vitae sequi quod. Quo non rem pariatur recusandae voluptate.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(144, 'Qui id omnis aut consectetur itaque. Optio ea totam nihil eum rem.', 'Illo laborum perspiciatis vel officia omnis quia. Qui voluptates in officiis possimus voluptas praesentium expedita. Cum perferendis aut saepe ipsam.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(145, 'Tempora labore ea amet fugiat est. Laudantium fuga doloremque animi quasi quis suscipit. Repudiandae temporibus laboriosam harum et molestias quod quaerat.', 'Qui et excepturi nisi laborum. Porro dolores non officiis provident. Praesentium omnis sint facilis temporibus delectus rerum.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(146, 'Saepe tempora nulla impedit rem. Ad ut ratione tempore animi vel voluptatem quas.', 'Incidunt est quasi voluptas quos libero. Laboriosam possimus nihil dicta tempore. Vitae placeat tenetur sed.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(147, 'Possimus ut ut sunt porro itaque totam. Dolorum magni molestiae error nesciunt qui aut. Rem maxime atque eos cupiditate harum.', 'Atque omnis saepe officiis enim. Eaque minima aut quia impedit dolorum et odio. Illo qui qui ipsam veniam laudantium quo. Laborum consequatur rerum dolores quae aspernatur.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(148, 'Non repellendus occaecati adipisci iure. Ad voluptates qui sed veniam amet placeat enim eos. Adipisci culpa repellendus aliquam quia. Voluptatem assumenda non sunt.', 'Quo in saepe at. Modi vel inventore aut eveniet voluptate non perspiciatis. Sunt perferendis qui et aut et enim. Corrupti reprehenderit placeat qui sunt.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(149, 'Porro esse vitae nihil ut assumenda voluptate totam. Voluptatem pariatur quibusdam ut rerum odio sit. Consequatur reiciendis labore quasi cupiditate laudantium quia est fugit. Laudantium placeat aut harum et vitae expedita. Est ut et nesciunt et ea ut.', 'Eos id quia quas aliquid consequatur suscipit non aut. Ut nobis voluptatem quia fuga nisi. Doloremque vero quis aliquid consequatur cum commodi.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(150, 'Provident voluptates repellat qui aut qui mollitia numquam neque. Architecto sed sed occaecati perferendis libero occaecati placeat aut. Ullam dolor saepe eius minus laudantium neque.', 'Consectetur sapiente ipsum cumque repellendus et libero. Asperiores perferendis sunt earum impedit.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(151, 'Quia ut eum omnis deserunt rerum. Et eligendi earum sed qui possimus repellendus aspernatur. Architecto nihil accusamus vitae.', 'Repudiandae quisquam impedit aut. Ut totam mollitia sequi in magni debitis. Molestiae quas sint dolore distinctio expedita. Tempora quo omnis illo ab.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(152, 'Et et vel error. Sint consequatur quis quia ut voluptas voluptatem aspernatur. Cum sed magni incidunt nemo possimus cum architecto.', 'Est facere maxime delectus et nemo est sed. Officia omnis et ut quidem in dolor facilis. Ad commodi et ab aut.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(153, 'Omnis expedita sed eum dolores quibusdam. Inventore est rem modi nostrum. Dolorum quia odit magni dolor. Quisquam nihil sit aut dolor adipisci. Ex qui eos velit sequi. Maiores et recusandae sit est.', 'Facilis voluptatem voluptatibus suscipit molestiae. Voluptate recusandae aut tenetur quia omnis. Omnis voluptatum voluptas beatae culpa eveniet deserunt.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(154, 'Veritatis sunt velit rem. Est est dignissimos consequatur tenetur asperiores deserunt. Dolorem sapiente omnis sit est facilis modi iusto eius. Non excepturi recusandae occaecati ut sed.', 'Hic voluptatem sit quam et. Nesciunt vero nobis vitae. Quasi iste ea qui incidunt voluptas. Ea et velit quidem ex doloribus est.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(155, 'Officiis est et tenetur fugit pariatur dolores. Voluptas voluptas quis mollitia omnis consequuntur. Numquam in quam nostrum aperiam. Qui sed maiores possimus officiis aut qui.', 'Amet magni ea maiores maxime perspiciatis. Provident accusantium voluptatem eveniet sunt reiciendis eaque. Eum excepturi est maxime dolores ducimus labore. Omnis eaque tempora nisi eum impedit ipsum.', '2021-11-20 14:47:35', '2021-11-20 14:47:35'),
(156, 'Molestiae quia qui doloremque rerum. Voluptate ad temporibus exercitationem quae eveniet error. Nam aut qui qui ipsa deleniti. Numquam aut est dignissimos hic.', 'Aut nostrum repellat architecto voluptatem dolor sit odio. Ab doloremque deserunt labore ut molestias nisi quo. Corrupti in voluptatum blanditiis necessitatibus animi.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(157, 'Autem tenetur quam architecto exercitationem. Est sed quibusdam tempore aut minus. Quo quasi molestiae harum qui et cum. Dolorem aut sed et.', 'Et debitis in sint aut nam provident fugit. Blanditiis eum voluptates cupiditate ad minima ut cumque. Voluptas aut excepturi eos at officia.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(158, 'Eum quod et dolor praesentium. Perferendis inventore id repudiandae nam. Ducimus quibusdam voluptatem atque rerum tempora quibusdam laudantium. Error in id voluptas.', 'Natus officia et quam sunt. Id sint consequatur et placeat. Nostrum ullam iste eum eius labore quia. Quo voluptas repellendus aut earum impedit et ullam. Vel amet eos in ratione et.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(159, 'Culpa enim non ut velit quis fuga. Debitis voluptates tempora vitae. Similique cumque soluta natus qui. Perspiciatis et nostrum in. Et quos cum voluptatibus omnis esse. Velit nulla quam consequuntur sequi eos quos.', 'Recusandae dolores odio illum quod natus. Ut quidem iusto amet est laboriosam dignissimos modi nihil. Quia rerum quia minus neque.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(160, 'Magni sit asperiores adipisci voluptatem non sit. Dicta rerum quas est ratione. Incidunt officia consequatur quia recusandae cum. Quisquam molestiae quod fugit aliquid vero provident quod.', 'Quia animi est sed possimus ea praesentium quia ipsum. Aperiam et nam quo suscipit voluptates suscipit sint voluptate. Blanditiis vel porro nihil quos nostrum. Quia numquam quas velit.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(161, 'Laboriosam sed quia perspiciatis ullam dolorem maiores nulla. Blanditiis voluptas excepturi qui non eveniet possimus ad. Vel neque laborum alias earum saepe sint. Qui aliquam est commodi occaecati.', 'Dignissimos et ut et molestias est. Quaerat sit saepe dignissimos veritatis. Esse voluptatibus fugiat ex deserunt temporibus. Doloribus illum accusamus reprehenderit minima doloribus impedit.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(162, 'Eveniet ducimus odio sint saepe illum. Ut aut adipisci maiores incidunt quia rem praesentium. Debitis quae aut recusandae asperiores odit placeat nostrum. Est odio alias sed. Quod maxime reiciendis debitis quas. Repellat sint molestiae alias id vitae.', 'Sed qui placeat rerum aut nesciunt. Impedit dolor eaque rerum suscipit a rerum culpa. Dolorum odit autem illum ea sed. Officiis perferendis iste fugit ducimus dolores.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(163, 'Quia aut ipsam qui voluptates. Dicta aut ut ut consequatur nesciunt. Aut beatae quis sunt consectetur ratione optio dolorem et.', 'Consequatur iure sed rerum autem corporis. Ratione illum odio perspiciatis nihil dolores quod. Officia sapiente quasi veniam et fuga et.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(164, 'Ut amet quisquam corrupti est. Doloremque dicta et quis aliquid autem. Quia delectus sunt quia dolorum.', 'Quis voluptatem dolor voluptatibus blanditiis. Voluptas ipsa quis nihil consequatur consequatur vel. Voluptatem non possimus et dolor. Excepturi et tempore porro quia ipsum rerum.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(165, 'Quas beatae molestiae nam alias. Quia fugit aliquid veritatis. Et qui repudiandae enim sapiente. Facilis est quis quis eius id necessitatibus neque.', 'Odit earum temporibus est explicabo quia. Maxime nobis ipsa consequatur et voluptas voluptatem. Exercitationem similique cupiditate nam labore dolorem. Aut rerum sit sit consectetur.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(166, 'Minima sint corporis sit. Dolorem quasi accusantium ut unde ex quo. Quos voluptas aperiam excepturi maiores repudiandae nisi aut. Et culpa et enim et.', 'Cum voluptas ea impedit ut perspiciatis. Rerum voluptas tempora eligendi inventore maiores. Voluptates necessitatibus aperiam dolorem iure sunt.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(167, 'Reiciendis eos consequuntur ut molestias rem mollitia delectus. Cupiditate quia quod id eum at assumenda aut. Enim nulla sapiente sequi earum eius.', 'Ducimus praesentium autem deleniti consectetur atque laboriosam totam. Officia aut ut autem inventore ullam omnis.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(168, 'Saepe facere quia labore. Id quis qui commodi excepturi aliquid. Quis natus soluta eum officia. Vitae error molestiae libero maiores.', 'Molestiae sit deserunt provident consequuntur. Molestiae architecto quae repellendus dolor odio ea. Quibusdam omnis dolores eligendi illo inventore.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(169, 'Beatae magni atque tempore id. Itaque velit modi voluptatibus dolorem ullam. Hic cum beatae eaque id porro. Excepturi quasi occaecati velit enim vel ad ex. Sint libero dolorem natus dolorem.', 'Quia recusandae est incidunt et. Odio veritatis sed ab a. Eligendi minima ab eum quia aperiam omnis.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(170, 'Consequatur voluptatibus doloribus vel. Qui debitis quam optio voluptatem fuga. Rerum dolore deserunt voluptate recusandae quod veniam.', 'Doloremque corporis aut assumenda. Nobis vel expedita nihil cum. Cumque nobis numquam qui. Corrupti aspernatur totam nulla veritatis quam reprehenderit rem.', '2021-11-20 14:47:36', '2021-11-20 14:47:36'),
(171, 'Aliquid earum eum adipisci eum voluptate. Animi tempora qui fugit et. Sit neque accusantium consequatur temporibus voluptas. Sint repudiandae sequi est quisquam ut porro magnam.', 'Tempora ut qui aut aut. Esse ipsum nemo accusantium ea amet. Omnis non in ullam est dignissimos ab corporis.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(172, 'Qui explicabo deleniti nihil sed reprehenderit. Ut praesentium iure iusto reiciendis nobis sint voluptatem. Est ad iusto nisi maxime qui sint ullam. Placeat voluptas vitae quod iste aliquid ea aut.', 'Aperiam rerum velit consequatur et reprehenderit. Nesciunt unde et repellendus accusamus nam delectus. Velit eum minus eaque totam laudantium nostrum. Alias laborum et enim dolorem quod et eius.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(173, 'Tenetur ipsam sequi vel maxime voluptatem. Vel amet corporis est in ut. Porro cum in voluptatem culpa vel similique quae.', 'Corporis ex ad repellendus quibusdam aut qui doloremque. Eveniet reprehenderit tempora blanditiis. Placeat dolor et possimus pariatur.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(174, 'Explicabo illo qui praesentium ea. Fugit nostrum id adipisci aperiam id. Fugiat enim laborum consequatur saepe. Totam cupiditate omnis est ut debitis.', 'Architecto porro quia et aut. Officia id debitis optio. Placeat culpa labore sint mollitia aut voluptatem.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(175, 'Pariatur labore a aliquam aliquam non incidunt ipsa non. Omnis corrupti voluptatum eaque eveniet sit ea. Rem laudantium praesentium voluptas laudantium ut. Quis voluptates officia est.', 'Excepturi ab omnis odio aspernatur. Quidem amet harum quae quo omnis maiores. Vel omnis quos facilis et pariatur unde qui. Doloremque nihil consequuntur sed saepe est.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(176, 'Maiores animi expedita libero voluptatem sed tempore. Magni libero aut quia ratione assumenda. Atque quod asperiores cumque perferendis debitis pariatur repellendus. Minus vel qui quis accusamus aliquam ut.', 'Officiis veniam magni optio impedit temporibus voluptatem aliquid. Eligendi aperiam nemo reprehenderit vel deleniti repudiandae. Provident rerum molestiae nobis tempora officia minus.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(177, 'Ut sapiente incidunt blanditiis ut aut labore nihil sapiente. Voluptatem quia labore laborum aliquid et in qui. Commodi fugit odio vero odio. Perferendis et est dolorem et ut.', 'Quae omnis nulla et ipsa est commodi. Corrupti voluptatem veritatis eos necessitatibus. Quis aut ut occaecati nobis sed. Rerum deleniti et autem nihil. Officiis unde laboriosam est quae.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(178, 'Quaerat corrupti labore deserunt et est. Blanditiis quia consequuntur ut illo quia error. Veritatis placeat ad dolores exercitationem. Sit et praesentium dolorem facere maiores illo doloribus.', 'Nam at rerum quis eos. Similique minima ipsum necessitatibus voluptatem magni ipsa. Sunt incidunt pariatur et tempore id unde. Et qui ab maxime inventore praesentium aut illo.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(179, 'Mollitia atque nostrum maxime vel et non. Ad qui debitis delectus alias odio. Illo sit fugiat tempora nostrum. Reprehenderit placeat voluptatum sint voluptas repellat. Eius ex et omnis tenetur totam. Earum dignissimos itaque delectus et totam.', 'Rerum aut harum ut vel. In animi labore non et tempore aut harum.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(180, 'Sit eum sunt dolorem. Iusto voluptatum laudantium dolores molestiae quis enim. Et esse exercitationem itaque quia.', 'Neque iure rem est qui quia itaque. Nobis quod voluptas voluptatem sequi. Rem dolor exercitationem ad perspiciatis quia qui officia.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(181, 'Aut accusantium minus quia impedit qui. Officiis sunt quia soluta. Quod natus pariatur eligendi earum debitis fugit laborum voluptatibus. Sit velit non similique numquam doloribus asperiores ut reprehenderit.', 'Nam voluptas fuga minima. Dolores ipsa consequuntur ad aspernatur eum. Voluptatibus veniam molestiae nesciunt fuga laborum est. Ullam non vel hic repellendus fuga rerum.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(182, 'Nesciunt recusandae et laboriosam sed expedita nihil occaecati ut. Et dolorem et consequatur eum quia. Aspernatur aperiam quia laudantium possimus porro.', 'Ex ut ducimus voluptatibus ut et in. Aut sunt ut dolores facere. Fugit veniam id sapiente in dignissimos ad velit alias. Numquam illo et ratione.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(183, 'Accusantium quis rem ratione optio fuga. Enim illo molestias sit nulla est explicabo. Ducimus provident iusto nemo minus odit. Non architecto in et id molestiae. Omnis veritatis totam aliquid explicabo nesciunt illum ipsum.', 'Ullam eveniet in temporibus ut laudantium. Eveniet sint similique ducimus perferendis et. Quidem odio aut perspiciatis odio velit aliquid. Autem quis autem voluptate.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(184, 'Sunt voluptas vel consequuntur pariatur est unde et. Soluta qui in quisquam eveniet optio est. Quia facere vel tempora aliquid quaerat est iusto. Ullam in omnis sint eveniet est vel.', 'Modi sed doloremque sequi consequatur nulla animi ab laborum. Ea delectus optio aut qui repudiandae delectus. Temporibus cupiditate expedita quia provident officia rerum est.', '2021-11-20 14:47:37', '2021-11-20 14:47:37'),
(185, 'Libero molestiae dolore commodi. Asperiores velit qui quo rerum consequatur. Sint minima quo qui dolor natus nam.', 'Velit rerum qui laudantium nisi voluptas minus nemo. Facere quo quia ut suscipit possimus quia fuga. Ut ratione voluptate dolore placeat dolore cupiditate. Qui id officia vero sed iste quis.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(186, 'Animi possimus non est eligendi perferendis quidem. Ut animi quia nemo eligendi dignissimos dolorum. Atque maiores et blanditiis autem quod cum.', 'Aperiam iste ex cumque. Et accusamus occaecati enim tempora. Ut repellat dicta excepturi dolorum.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(187, 'Sunt id porro nobis laborum libero. Officiis vitae ut et. Aliquam alias error et id delectus. Omnis aspernatur magni voluptas soluta.', 'Amet qui quia debitis quasi quis. Voluptatem eos dicta temporibus voluptatem. In ut et corporis ad ea aut expedita. Neque aut amet nemo rerum.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(188, 'Aperiam veniam doloribus omnis qui et voluptatem commodi. Non quam veritatis est aspernatur hic et. Blanditiis aut animi quo qui dolorem in id eligendi.', 'Voluptates sit sequi non similique ea. Necessitatibus illum eum omnis eveniet. Quibusdam laboriosam commodi debitis et. Eum id ipsa nemo accusamus debitis est est aspernatur.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(189, 'Itaque assumenda facere impedit voluptate velit consequatur ut. Voluptate eum sunt vero aut est. Ad voluptatem est placeat suscipit iste illo dolor.', 'Non et natus enim dolorem sequi. Autem ipsam dolorum ipsum. Optio deleniti odio nihil eos excepturi ipsa ut. Nam fuga possimus consequatur facere sed ea ex.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(190, 'Ab atque quam est voluptatem ducimus occaecati. Aut quis optio deleniti eum consequatur. Magnam et incidunt et qui itaque laudantium nam. Error minima recusandae culpa ab.', 'Suscipit autem totam voluptate est. Dolor recusandae tempore nostrum nam ullam soluta dolorem consectetur. Beatae nisi impedit laborum hic voluptatibus modi. Ullam dignissimos quibusdam consequuntur.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(191, 'Sunt aperiam accusamus aut quam neque architecto doloribus explicabo. Distinctio sunt voluptas suscipit est vel est. At expedita quia vel et rerum perferendis ut. Est veniam fugit eum consequatur dolorum doloribus.', 'Laboriosam aut voluptates reiciendis facere error tempora. Quia aspernatur culpa consequatur.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(192, 'Similique aperiam id adipisci voluptatum quis voluptas eos. Quia ea dolorem architecto totam. Reiciendis sequi nam molestiae autem esse. Minima voluptatem dicta odio sunt suscipit quis sequi.', 'Nostrum quas est placeat alias itaque similique voluptatem. Dolorem nam nostrum sed labore. Et quo quia necessitatibus. Dolorum deleniti soluta voluptate quia velit deserunt.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(193, 'Odio debitis voluptates libero molestiae. Dignissimos pariatur quisquam reprehenderit adipisci iusto iure. Quia rerum sed laudantium corrupti. Esse ullam eaque voluptates fugit.', 'Consequatur et ipsa illum aliquam sint dicta voluptate. Totam nesciunt molestiae ex et illo quos.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(194, 'Pariatur dolore aut atque minus. Ullam voluptas aut ipsam laudantium. Perferendis ad deserunt quia nihil quae et consequatur. Voluptate suscipit fuga doloremque perferendis.', 'Qui est nostrum in. Dolores non odio ipsum placeat. Exercitationem aut eveniet perferendis veritatis velit aliquam. Occaecati quos eos eos alias.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(195, 'Adipisci nesciunt facilis eum. Ex error aperiam fugit. Assumenda ratione architecto sequi provident non. Incidunt dignissimos est nihil magni sapiente ducimus. Voluptates officia qui necessitatibus quam veniam.', 'Suscipit sint repellendus nisi eligendi ipsum. Deserunt est pariatur dolorem sunt. Assumenda doloremque nihil omnis rerum dolorem sit nihil. Aut sed ab nam suscipit itaque exercitationem et.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(196, 'Et sunt expedita voluptatem sed quae delectus. Et est dolores consequatur fuga. Et ab mollitia omnis molestiae minus tempora.', 'Consectetur in qui nesciunt quae. Tempore et nulla labore commodi corrupti voluptatem ut aut. Nihil iure eius ut voluptas sunt repellat nostrum.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(197, 'Tenetur iusto commodi illo et perspiciatis quibusdam adipisci ut. Ea dignissimos quo atque. Animi id porro et deserunt modi accusamus aliquam.', 'Praesentium eius dolores sint qui optio illo explicabo. Totam aut beatae debitis ipsam sed.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(198, 'Et saepe commodi consequatur non nulla sapiente. Incidunt voluptas officia natus dolor assumenda aut est. Voluptatem eos quasi quis voluptatem enim. Omnis ipsum nihil voluptate sed. Beatae sunt eaque et cupiditate velit aut adipisci.', 'Dolorem velit earum delectus et distinctio ad. Assumenda veniam minus omnis velit delectus quo eligendi hic. Quisquam ea qui sapiente et voluptatem. Ab ducimus et consequuntur omnis quo.', '2021-11-20 14:47:38', '2021-11-20 14:47:38'),
(199, 'Saepe quis voluptatem inventore odit deserunt qui. Consequuntur asperiores velit molestiae laudantium. Rerum rerum in vel enim quaerat. Aliquam at occaecati consequatur autem sequi quasi adipisci.', 'Nihil deleniti dolore saepe. Delectus quia qui ad esse. Consectetur qui aut et culpa. Vero quibusdam praesentium dolorem rerum tenetur fugit.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(200, 'Facilis eos aut distinctio modi. Tempore eveniet atque voluptatibus qui et. Dolorum placeat voluptas quis dolorem quidem exercitationem nobis. Et harum cumque iste et commodi non numquam autem. Voluptas voluptatem reiciendis consectetur perspiciatis qui.', 'Nobis facilis commodi omnis. Qui voluptates a aut repellendus et doloremque aperiam. Aspernatur consequatur aut possimus fugiat magni error aut.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(201, 'Dolorum illum aut qui unde rerum nostrum est praesentium. Reiciendis blanditiis totam sed dolores. Quaerat autem quis voluptatem tempora. Nemo unde sunt esse in sed.', 'Nisi quas laboriosam qui voluptas. Quo labore incidunt earum dolores sint. Itaque aut rem optio culpa. Suscipit eaque sed quibusdam.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(202, 'Illum nulla neque nihil voluptatem. Nam et qui minima iusto nulla ipsam. Ea ratione adipisci deleniti aliquid necessitatibus molestiae quia.', 'Voluptas vel aut velit mollitia ut sed necessitatibus. Et rerum et omnis impedit pariatur quaerat. Fugiat atque eum qui et architecto nemo. Dolores aut magnam aut doloribus nobis voluptatem unde.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(203, 'Qui ut ullam magni quasi id. Quidem mollitia quam aspernatur. Recusandae consequatur et beatae enim quas dolorem. Excepturi earum eos tenetur fugit non. Similique in molestiae aut beatae.', 'Et veritatis laboriosam quibusdam labore quia et et. Autem et maxime dolorum possimus possimus velit dolorem. Qui libero non nulla.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(204, 'Totam dolorem cum quidem rerum. Iste dolor omnis sint quia dolor. Fugit officia sequi id quia deserunt quaerat ipsum. Non dolorem unde et. Et modi quis fuga aut. Voluptatibus eum repellat eius id et non.', 'Modi vero et aut vel tenetur eaque repellendus. Aut voluptate et explicabo commodi perferendis ex minus. Quisquam occaecati vitae dolorum dolorum maiores. Nemo laudantium quos ut porro adipisci.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(205, 'Quod eius velit deserunt sit excepturi ipsum sint. Quis suscipit voluptatem accusamus aut esse et. Laboriosam ratione sint suscipit distinctio. Ut dolor voluptas est ducimus unde in.', 'Ea assumenda aut molestiae saepe dolorem facilis animi voluptas. Culpa qui ullam assumenda facere dolore. Ab rerum porro eos vitae facilis. Enim mollitia sed quae perspiciatis nam rerum eos.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(206, 'Numquam molestiae excepturi quod. Repellat tenetur eos qui rerum ad dolorem vero. Qui quisquam ad placeat similique facilis est est. Distinctio et dolores omnis doloribus delectus quos.', 'Saepe omnis qui voluptas corporis. A quia qui vel. Temporibus est minus est unde et dolores.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(207, 'Doloremque ex qui dolores est ipsam. Soluta at eveniet rerum voluptatibus. Et itaque eius dolorem porro autem iure officia est.', 'Deserunt qui vitae quam facere. Dolores in vel ut in et. Ut voluptas consectetur saepe.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(208, 'Sunt odit ea et recusandae. Expedita ut unde asperiores ab. Dolore ut voluptatem et error tempore.', 'Qui exercitationem sit eius non aut facere. Nesciunt tenetur rerum eum dolore. Sit eum laboriosam veritatis harum.', '2021-11-20 14:47:39', '2021-11-20 14:47:39'),
(209, 'Dolor veritatis et voluptatem quis hic. Repudiandae iste minus qui et quia omnis nisi deserunt. Similique voluptas et assumenda fugit nisi dolorum.', 'Aliquam sunt rem est nemo amet a. Nesciunt esse eum omnis. Error ipsa quaerat velit.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(210, 'Quos dolorem quibusdam qui ab animi. Ab quam dolores modi autem excepturi. Est est at quos porro officia dicta et molestias. Maiores illo corporis quos accusamus sint non totam.', 'Voluptate exercitationem consequatur molestias commodi consequatur ipsam. Facilis aliquam velit incidunt iure iste deleniti. Praesentium nisi officiis itaque quia officiis.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(211, 'Temporibus nostrum commodi autem quaerat accusamus quo. Voluptatem est quod omnis optio repellendus est tempore ipsa. Fugit a consequuntur nam laudantium ex. Distinctio in a et nostrum enim. Enim explicabo veritatis est sit totam sit.', 'Rem numquam a accusantium placeat. Rerum beatae earum velit eum et. Ut amet explicabo commodi.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(212, 'Nam facere quis vitae. Eaque minima assumenda natus porro. In sit magnam vero rerum et sunt. Ut enim magnam tempora modi non maiores. Aut aliquam excepturi incidunt.', 'Aut similique et explicabo voluptatem error quia ut illo. Voluptatem ex et et et. Sunt nobis qui optio qui voluptates numquam. Ullam officiis veniam consequatur quia quia ipsam quidem.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(213, 'Doloremque eaque et nisi omnis dignissimos iste iusto id. Nihil ut suscipit eligendi suscipit aut possimus. Nesciunt aut hic occaecati molestiae aliquam molestiae sunt.', 'Dolor non velit laboriosam minima ipsam. Explicabo illum animi inventore et. Eos ad nam et expedita commodi sunt ratione dolores. Quia quia aut enim illo molestiae quo qui corrupti.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(214, 'Nesciunt quo nobis magnam. Velit quas nobis maxime aut sed quasi sit cumque. Deserunt velit praesentium rem velit quasi sed aspernatur.', 'Sint corrupti animi ex suscipit aut. Iure mollitia vitae hic natus. Et ratione vero voluptas harum.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(215, 'Ut sit qui tempore omnis sunt sed. Dolore ullam error nostrum fuga atque qui nemo quia.', 'Id ipsum quaerat architecto fugit sit quia. Voluptates dolorem ad dolorum autem quasi reprehenderit. Est incidunt voluptas at molestiae veniam cupiditate consequatur quia.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(216, 'Iusto repellendus itaque cupiditate sint. Illum voluptas magni veritatis ab. Laudantium ipsam repellendus non dignissimos iusto.', 'Voluptatem temporibus aut molestiae dolor eos ipsum placeat. Hic voluptas ut itaque soluta distinctio temporibus. Consectetur similique aut quia aut aut.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(217, 'Accusantium voluptas facilis ut quas possimus. Tempora corporis delectus voluptas. Consequuntur facere reiciendis mollitia qui tempora rerum quibusdam deserunt. Ex animi explicabo iusto pariatur ullam.', 'Quod illo cum nulla culpa ad deleniti. Nemo voluptate voluptatem impedit soluta. Optio nisi officiis ut dolorem.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(218, 'Pariatur illum alias debitis a nemo et deleniti mollitia. Aliquid dolor magnam deserunt omnis consequatur molestiae. Eveniet quos quis est unde distinctio iure vel.', 'Non magnam quod necessitatibus odio ipsum. Pariatur non nam sit eos delectus quo quo.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(219, 'Nesciunt non perferendis eum. Ipsum nesciunt et omnis modi eum vel. Vitae doloremque quo sint est at vitae. Explicabo et rerum officiis voluptatem dicta asperiores eos.', 'Nulla sint eos similique possimus labore. Illum ullam veniam magni quos architecto repellendus. Id dolor voluptatem sunt sunt. Vel non illum alias distinctio blanditiis provident.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(220, 'Suscipit ea cumque unde molestiae. Quo sapiente animi voluptates enim. Non voluptatem quia sit quis cumque. Incidunt quia minus aut occaecati.', 'Aut aut hic mollitia animi architecto. Et cumque tempora quisquam fugit. Et dolorum quo nostrum. Corrupti ipsa ut rerum beatae qui molestiae.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(221, 'Nesciunt rerum est voluptatem quas. Expedita dolor quisquam ipsam quisquam harum et culpa. Vero et laborum et labore sint quam. Doloremque sed nobis delectus tenetur ex quidem. Quo necessitatibus fugit ducimus et dicta rerum libero sint.', 'Veniam et est quaerat mollitia aut reprehenderit nobis qui. Et sed eveniet est aliquam. Inventore magnam id quasi asperiores laboriosam voluptatem.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(222, 'Quae voluptas totam tempora architecto. Exercitationem velit rem et in sequi adipisci blanditiis. Dolore nulla rerum nobis ratione assumenda. Omnis omnis tenetur voluptatem aut. Rerum minima repudiandae ipsa aliquam eius ut.', 'Necessitatibus rerum officia id voluptas hic voluptatum tenetur impedit. Rem sequi asperiores dolores maiores minima itaque.', '2021-11-20 14:47:40', '2021-11-20 14:47:40'),
(223, 'Rerum sint doloribus voluptatibus. Nihil mollitia id tempore ducimus dolorum minima aut. Accusantium inventore ut alias dolor sit consequuntur nihil. Sunt corporis ipsa assumenda quia nostrum.', 'Est illo facere in laboriosam rerum et. Similique velit nisi voluptas asperiores ex. Dolorem vitae consequatur voluptate pariatur molestias libero non distinctio. Itaque cupiditate et nobis ea.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(224, 'Praesentium eligendi rem temporibus expedita. Itaque aspernatur dolor voluptas est facilis. Non sed sunt magnam velit. Possimus illum dolorem explicabo id quae commodi necessitatibus et.', 'Corrupti expedita necessitatibus optio. Aut reiciendis laboriosam autem omnis quae et sed explicabo. Sapiente dolore distinctio sed aut magnam iure officia.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(225, 'Omnis optio tempora aut distinctio in rerum et saepe. Quisquam similique adipisci rem consequatur qui. Rerum quibusdam in vel nisi aut.', 'Dolor et placeat voluptatem eos in quis. Reprehenderit consequuntur molestias mollitia dolorem occaecati voluptates. Nobis est eos iusto ut provident quas excepturi.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(226, 'Voluptas quae qui porro voluptate quis fugit voluptatibus. Aut consequatur est dolore similique. Quia eius cupiditate voluptate labore inventore. Et id optio cupiditate atque voluptas ut temporibus.', 'Doloremque fugiat deserunt recusandae harum tenetur corrupti assumenda enim. Molestiae omnis sint aut provident est. Sed iste eaque modi ut ipsum sequi sint.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(227, 'Qui nisi voluptatem ea laborum. Qui sed ducimus possimus facilis quam et. Et similique unde neque laborum. Maxime voluptatem maxime sint odit beatae qui culpa.', 'Iure eligendi voluptatum et porro harum minima. Odio optio saepe repudiandae culpa repellat quae.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(228, 'Omnis tempore est accusamus illum inventore ipsam veritatis. Voluptas mollitia et beatae ducimus eum. Provident temporibus aut a amet occaecati. Blanditiis quaerat quos nihil atque. Soluta deleniti quia molestiae fugit reprehenderit ullam.', 'Repellendus qui consequatur perspiciatis sequi reprehenderit quas. Incidunt deleniti in fugiat omnis. Natus quae occaecati culpa veniam blanditiis.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(229, 'Repellendus error adipisci beatae quis sunt quia. Exercitationem temporibus et quidem totam. Accusantium est ut eum reprehenderit dolores totam.', 'Ut repellendus mollitia voluptate aspernatur voluptatem similique quod. Aperiam illum excepturi et molestiae et id nostrum rem. Corrupti nihil assumenda ut.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(230, 'Voluptatibus et dolores est sequi possimus. Distinctio quasi quam doloribus sunt voluptates voluptatem. Iusto non temporibus labore exercitationem eum qui animi quibusdam. Molestias dolorem labore ullam sunt corporis rem ipsam.', 'Quisquam omnis quas id et. Asperiores consequatur eligendi sunt voluptas eveniet. Inventore impedit aperiam beatae officia. Sed est fuga sed omnis saepe id porro.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(231, 'Aperiam inventore nulla et exercitationem et. Et illo quasi iste eaque laboriosam eius. Totam molestiae placeat libero iste molestiae minima deleniti. Laudantium voluptas et sunt suscipit sit soluta sed. Ut sapiente quia harum eum.', 'Qui doloribus necessitatibus optio et id harum nulla. Illo quasi facere fugiat ipsam dolores voluptatem numquam cupiditate. Tempora error aperiam possimus mollitia.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(232, 'Deleniti tenetur mollitia necessitatibus asperiores mollitia in ut. Non accusamus enim eum eos reprehenderit. Quis et placeat vel quia.', 'Eius voluptas vel minus cum voluptatibus corrupti quia beatae. Consequatur nemo natus sunt a minus ut. Ullam vitae dolor doloremque saepe debitis.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(233, 'Ea et minima quo fugit accusantium deserunt. Doloremque eos asperiores enim. In aperiam et saepe non reiciendis ex. Est quia dolore recusandae corrupti.', 'Dolorum voluptatem nemo quia exercitationem. Et non ad neque id illum quasi repudiandae. Ut ut consequatur porro sunt alias temporibus nemo. Qui iure iure sunt et natus voluptate illum.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(234, 'Minus et tempora saepe. Distinctio consequatur accusantium ut voluptas et. Sed repellat perferendis incidunt placeat eius eveniet impedit. Ut reprehenderit velit reprehenderit eaque dolor eos. Ducimus at quaerat est nihil animi occaecati.', 'Quo magni iure nostrum eveniet repellendus hic eos. Minus adipisci totam iure. Sequi dolores ut sit qui ut et a nam.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(235, 'Autem amet explicabo minima. Velit aperiam minima in est incidunt aut. Labore veniam excepturi laboriosam eos.', 'Beatae perferendis qui dolorem expedita. Pariatur tempora fugit qui ut adipisci fugiat quidem. Delectus in voluptatem perferendis laboriosam voluptatum est quo.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(236, 'Quis blanditiis alias voluptatem id. Esse nulla ad ut alias ea rerum. Eum qui eos ipsam voluptatem. Libero consequuntur aut consequatur unde recusandae illum. Quis quibusdam necessitatibus est adipisci a nam.', 'Sapiente ipsa eligendi qui nemo et sed voluptates adipisci. Accusantium quia sequi nobis itaque minima et laborum. Molestiae ut est rerum et. Itaque hic velit est modi harum nulla.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(237, 'Voluptas magnam et necessitatibus. Est ducimus culpa voluptas qui odit voluptas. Nam debitis voluptas et.', 'Vitae quisquam perspiciatis id a quisquam debitis eum. Alias perferendis quis assumenda quisquam repudiandae. Nam voluptas dolor culpa.', '2021-11-20 14:47:41', '2021-11-20 14:47:41'),
(238, 'Harum qui ipsa aut aut consequatur quam natus. Possimus quam dolor molestias consequuntur.', 'Iusto nobis laborum corporis repellendus eum nihil autem. Rerum cumque quia id expedita est a. Ut quis rem non error architecto.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(239, 'Consequatur quo consequatur dolor ad rerum eligendi. Labore fuga voluptates temporibus consequatur et. Perferendis autem deleniti est qui ut. Est aut inventore aut rerum quibusdam odio.', 'Consequatur ipsum aspernatur autem deleniti rerum nemo facere. Inventore magnam voluptas qui error. Natus ea maxime et nostrum.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(240, 'Dolor laborum eum sed dolorem nihil suscipit. Et maiores accusamus quo. Aliquid libero sit pariatur sit voluptates dolore quibusdam officiis. Excepturi commodi dolore eveniet quo odit reprehenderit deserunt.', 'Error non explicabo sunt mollitia alias. Asperiores dolorem quae voluptas sit. Nulla eligendi ipsa praesentium minima enim distinctio.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(241, 'Odio saepe sint reiciendis in illum est. Ad aut commodi voluptas qui nam ad. Sed fugiat quos quia autem amet impedit.', 'Omnis neque et tempore laboriosam amet. Ducimus non tenetur consequatur neque. Labore eius enim eligendi id non repellat.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(242, 'Ab quae qui hic in numquam qui aliquid. Consequatur et qui quia adipisci in. Ea libero aut tempora quia vel odio molestias quia.', 'Dolorem eveniet aut deleniti. Aut est et unde doloremque ut ipsam. Magni id commodi autem nesciunt.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(243, 'Repellendus aut et vero. Eos error quo autem quia aut enim at. Rerum occaecati vel voluptas dolorum blanditiis sint praesentium.', 'Ea voluptatibus a quia. Consequatur ab nisi esse voluptas quisquam dolor. Doloribus illo voluptas soluta laboriosam sunt quo.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(244, 'Rerum et quia dolorum ut unde molestiae blanditiis. Assumenda consequatur quis omnis similique et. Repellat voluptate pariatur inventore qui eligendi.', 'Corporis accusamus quo fuga laborum vero. Vel rerum et et vel qui. Voluptatem ab alias adipisci expedita explicabo magnam aut qui.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(245, 'Molestiae porro voluptatibus voluptatibus sequi. Voluptatem sunt sed fugit aut voluptas et. Blanditiis doloribus et id cum iure beatae. Eligendi tenetur veritatis et itaque autem voluptate voluptas eum.', 'Autem tenetur et asperiores nemo est. Dolores quasi saepe nulla velit nostrum. Non omnis perspiciatis et dolorum dolores. Enim sequi rerum dolorum recusandae. Sapiente quae modi et sed.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(246, 'Minima ut sunt qui. Voluptate similique nam perspiciatis cupiditate nostrum. Maiores adipisci optio animi est aut nobis.', 'Rem modi iusto deleniti laudantium. Tempore qui cum maiores. Quisquam eius sint molestias ratione. Necessitatibus officia vel dolores qui quibusdam quam molestias.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(247, 'Facere enim culpa reiciendis. Consectetur et expedita aut. Aut error culpa porro nobis necessitatibus doloribus optio. Perferendis ut voluptas aut quisquam cumque incidunt adipisci doloremque. Velit et est quo qui in voluptates aut sunt.', 'Illum earum aut impedit temporibus voluptas blanditiis. Ullam ut laudantium culpa tempore delectus modi placeat. Est debitis est qui impedit ea voluptates.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(248, 'Nostrum qui dicta placeat et rerum. Est fugiat placeat deserunt quia illo excepturi maiores. Qui et quia aut necessitatibus et. Voluptate doloribus enim est modi.', 'Reprehenderit rem deleniti ut libero fugiat. Laudantium rerum officia quos repellendus. Nam eveniet earum eaque velit. Commodi asperiores pariatur aperiam illo.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(249, 'Minima molestias commodi tempora ipsam debitis autem et. Qui ratione occaecati nisi. Iusto quis aut veritatis eos sunt ullam nostrum. Dolore sapiente et voluptas laborum et. Officia sed exercitationem id. Et suscipit vel dolorem fugit.', 'Quia voluptatem consequatur quibusdam et facilis atque commodi hic. Et praesentium rerum animi ut et. Repellat atque illo itaque. Quidem fugiat omnis magnam.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(250, 'Totam sint ut harum voluptas. Dolorem rem dolor dolorem quo saepe. Incidunt facere aut consequatur culpa exercitationem.', 'Et tempore dicta ex consequatur. Fugit est dolores autem necessitatibus. Minus ut nulla est consequatur perspiciatis consequuntur. Nesciunt vel adipisci assumenda illo qui rerum.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(251, 'Amet sit in non accusantium iure. Ea magni culpa enim. Veritatis ut ut vel veniam ipsam quasi. Quibusdam fugiat dolorem aliquam mollitia quam laboriosam corporis. Architecto alias dolor voluptatem rerum eius tenetur quidem.', 'Aperiam id aut dolor repellendus totam. Et repudiandae alias pariatur inventore fugiat tempore. Aliquid expedita architecto consectetur aut illum quod nam. In iste culpa aut deleniti aspernatur.', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(252, 'A temporibus minima quam rerum sit quia qui ut. Aut fugit et ab cumque libero necessitatibus. Quo vero in eligendi quibusdam eos dolor voluptatem.', 'Qui ut ad et officia ducimus esse aspernatur. Quasi praesentium facilis quidem aut laudantium sed.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(253, 'Facere ut esse consequatur. Mollitia blanditiis aliquid blanditiis quo enim. Molestiae enim sit aliquid inventore eum rerum veritatis.', 'Ut tempora voluptatem sint est. Molestias debitis aspernatur veniam vel unde quis. Provident optio ratione soluta reprehenderit. Enim qui ea dolore culpa ut voluptatum.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(254, 'Cumque dignissimos optio tempore tempore odit. Eos reiciendis odit dignissimos. Quos illum qui vero esse. Eos qui consectetur consequatur explicabo et. Dolores sit sequi repudiandae vel. Enim sed cum voluptatem veniam voluptate.', 'Rerum velit quam quod recusandae. Dolorem sit neque enim quaerat et voluptates. Dolorem aut veniam dolore quis et ullam ut cum. Qui corporis voluptatem itaque reprehenderit ex.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(255, 'Quos dolorem asperiores et placeat alias. Architecto minima reiciendis quia tenetur magni. Quia non quo numquam. Non corrupti praesentium eveniet saepe neque culpa aut.', 'Sed nihil et accusamus cupiditate et. Voluptatem consectetur laudantium sint rerum. Facere nihil voluptatem modi dolor adipisci.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(256, 'Sint perspiciatis et sunt cum. Ut architecto iste dolore. Nostrum officia non et ut ea consequatur. Rerum nihil est maiores enim alias et nulla. Corporis totam repellendus accusamus. Aliquam illo quasi et tempore.', 'A accusantium rem autem quo ut corporis suscipit iusto. Molestiae est culpa inventore est. Eos est dolor ut.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(257, 'Omnis aut soluta voluptas aliquid. Culpa velit velit rerum. Et id illo enim quaerat exercitationem quis est enim. Minus sit blanditiis id sit quia. Et ut ea dolorum omnis sint modi eligendi. Vitae ut et vitae impedit. Voluptatem possimus ullam ut.', 'Et molestias quis esse animi aut. Laboriosam suscipit accusamus voluptatem consequatur consectetur. Aspernatur quibusdam soluta voluptates odio cupiditate quisquam voluptatem dolore.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(258, 'Quas est nam consequatur quas odit et facere. Blanditiis voluptatem nisi minima quis adipisci. Ut recusandae voluptas sit eos voluptatem commodi quo.', 'Odio tenetur rerum consequatur ad non suscipit. Ad pariatur totam qui neque tempora sequi sit omnis. Quod ducimus dicta doloribus nam et.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(259, 'Eos illo sequi quos voluptate. Minus cum ipsa adipisci enim suscipit sunt ea voluptatibus. Nulla qui quia in quae soluta saepe. Non enim quo tempora dolorem qui at.', 'Quis necessitatibus reiciendis ut voluptatibus qui rerum. Et nihil et non quo sed. Atque illum eligendi tenetur sapiente. In quis architecto consequatur modi.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(260, 'Illum repudiandae voluptate qui modi esse a et sit. Excepturi repudiandae ut officiis labore. Molestias aut architecto a dolor.', 'Repellat deserunt dolorum itaque. Cum eum id ut non labore fugiat ut magni. Deserunt quidem et quos fugit quidem. Nobis eos libero eius aut corrupti. Molestiae minima iure qui sed dicta dolorem.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(261, 'Repudiandae possimus voluptatum voluptas quia aliquam molestiae voluptates in. Accusamus ducimus provident at eum minima aut. Totam et ut eos delectus incidunt id magnam.', 'Nisi et nostrum distinctio et sed. Dolore sapiente voluptatem minima et autem ex et. Consequatur eligendi quos omnis harum eos provident.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(262, 'Quibusdam atque amet est et aut laudantium quas odio. Aut praesentium sunt rerum voluptatem provident culpa. Quia hic neque eius suscipit sit perferendis.', 'Voluptas officiis eligendi est quia. Tempore esse architecto minima sunt et. Enim accusantium fugit quidem aliquam sed et.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(263, 'Dolor nisi reiciendis enim consequatur. Similique maiores ipsam suscipit dolor. Illum corrupti quidem totam ut qui exercitationem beatae. Sed ducimus dolore corporis qui omnis ut non.', 'Excepturi omnis dolorem veritatis ipsam possimus et. Rerum qui quia odio quia molestiae nemo ullam.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(264, 'Vel consequatur at beatae ut. Culpa illum vero officia omnis repellat et. Sunt numquam ducimus culpa consectetur.', 'Ut tempora sed nemo ut. Omnis quo sint unde perspiciatis. Facere assumenda laborum ex totam alias nostrum. Eos et pariatur aut quaerat amet ipsum.', '2021-11-20 14:47:43', '2021-11-20 14:47:43');
INSERT INTO `modeles_recus` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(265, 'Ut id id ut autem totam quia qui. Totam sequi in vel voluptas. Consequuntur recusandae necessitatibus soluta aut rerum. Eum consequatur ea qui.', 'Maxime nisi corrupti nam. Repudiandae laboriosam repellat vel vel aperiam. Qui labore a vitae vel aliquid. Accusantium ad explicabo voluptatibus vero aut inventore quas.', '2021-11-20 14:47:43', '2021-11-20 14:47:43'),
(266, 'Ut unde nulla tempora doloremque recusandae error rerum. Quisquam commodi esse nesciunt et. Et eos asperiores aut labore expedita voluptate minima.', 'Cumque laborum beatae qui. Iusto nisi aliquam amet itaque tempora pariatur. Est voluptate hic a delectus adipisci hic. Et delectus vel quas in rem voluptatum dolorum.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(267, 'Aperiam harum necessitatibus provident dolorem modi. Aperiam sed consequatur facere dolores voluptatibus similique quas non. Provident natus aperiam eum blanditiis optio aperiam. Quo quo enim at. Minima optio in harum qui asperiores non quod.', 'Necessitatibus et nobis unde quia. Quia et est voluptatibus consequatur. Eaque cum ut voluptas autem excepturi sit.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(268, 'Laudantium ut consequatur beatae quaerat ex. Est temporibus temporibus cum. Ut aut similique quaerat molestiae cum ut. Minima perspiciatis veritatis officiis optio aut. Voluptatem rerum omnis quod fugiat. Qui atque qui nisi ut beatae ducimus.', 'Fuga et eum nulla nobis. Corporis voluptas quo omnis labore quo. Alias magnam corporis voluptatum nam qui. Qui cupiditate esse magni ut qui.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(269, 'Ducimus deleniti sit animi ut. Inventore qui est et quia magnam. Vero autem sed voluptas laboriosam. Eaque consequatur corrupti velit sapiente.', 'Aspernatur et omnis aut et quod. Saepe doloribus ut officiis. Quo corrupti explicabo omnis exercitationem.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(270, 'In nam natus veniam eos qui debitis. Nisi delectus atque ab perspiciatis labore. Incidunt accusamus et adipisci molestiae porro cupiditate vitae repudiandae. Vero velit rerum neque quidem libero possimus soluta.', 'Fugit deserunt rerum ipsum dolor minus. Voluptatem repellendus laudantium excepturi quia. Quis vitae eos culpa est. Vel nam voluptas enim repudiandae repellat.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(271, 'Reprehenderit omnis quia sunt pariatur rerum voluptatem. Est est dolorem accusantium provident animi et. Voluptatem error et ratione est aut. Aspernatur molestiae et voluptatem. Et fugiat qui aut eaque non.', 'Sed repudiandae perspiciatis pariatur est amet dolorem minus sint. Reiciendis tempora fugit quidem qui officiis magni est totam. Exercitationem cumque ea et dolor quam quis.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(272, 'Omnis consectetur explicabo numquam illo libero. Sit eos facilis animi dignissimos sunt eos. Distinctio eaque maiores rerum unde ut ex.', 'Unde aut ad sint natus. Reprehenderit et dolorum earum quia. Est esse vero tempora consequatur sit aliquid iusto.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(273, 'Sit eveniet recusandae laborum explicabo voluptatem. Fugit consequatur omnis perspiciatis mollitia unde. Ut iste omnis sapiente optio sunt iusto.', 'Qui et quaerat eum quia eaque porro modi. Quia quisquam omnis voluptatem. Sed itaque alias et architecto delectus corrupti. Qui corrupti perferendis unde. Odit voluptatibus ullam facere.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(274, 'Et saepe porro saepe qui praesentium debitis esse tenetur. Sint et est quos saepe accusantium alias. Consequuntur consequatur id vitae ullam tempora.', 'Blanditiis quis aliquid voluptates ut. Mollitia dolorem qui veniam possimus natus quidem. Nostrum voluptas ut vitae.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(275, 'Et aut magni error laudantium nisi fugiat. Qui ut ipsam ipsa. Nesciunt quidem ipsum alias reprehenderit nulla beatae aspernatur. Harum adipisci accusamus dolores ullam vero. Qui velit atque dolorem quia voluptas dolore sapiente.', 'Harum et et necessitatibus deserunt ea. Reiciendis ad dolores est accusantium eum. Laboriosam earum repellendus quis voluptate minima ut veniam.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(276, 'Dignissimos et sit aut. Velit labore sequi beatae molestiae provident. Voluptates porro itaque tenetur et non eos laboriosam. Aut officia molestiae ex voluptatibus vitae adipisci.', 'Officiis impedit quod cumque eveniet maxime quis. Vitae fugiat in repellendus vel voluptates qui rerum. Quam ipsam qui id qui. Minima mollitia nam ullam occaecati.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(277, 'Numquam vero fugit hic maxime laborum non cum enim. Accusantium sunt ipsum ut in qui. Nulla facere adipisci nihil cum aut dolore. Magnam dolorum et quod ea placeat.', 'Consequatur dolorem aut quis animi officiis a. Quas et pariatur nemo. Vel rerum voluptatem non quia beatae minus.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(278, 'Iusto optio qui nulla placeat eius et. Qui consectetur nam cupiditate vel officia corporis. Esse odit eaque veritatis harum omnis harum. Soluta quod sunt quibusdam autem veniam. Quia hic et omnis nihil delectus ducimus at beatae.', 'Deserunt inventore in ut voluptatem. Hic dolor velit ut laborum. Ut aut sapiente est quis occaecati nulla labore non. Nam corporis et molestiae omnis.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(279, 'Amet doloremque fugiat quia ut. Porro quod quia enim placeat. Autem quod quia sed sed officia asperiores.', 'Sed cupiditate et sed placeat delectus error. Sed consequatur laboriosam similique enim ducimus. Aut sapiente totam modi incidunt.', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(280, 'Sequi dolorem dignissimos eum alias. Ea debitis vel laborum in sequi facere. Assumenda quia cum nihil officiis qui.', 'Aut assumenda excepturi inventore vitae exercitationem qui necessitatibus. Quae voluptatem id beatae quia. Cum sit autem facilis libero eos commodi.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(281, 'Rerum earum velit aspernatur qui. Necessitatibus voluptate ex voluptas et ipsum est et. Qui reprehenderit quidem perspiciatis.', 'Voluptate provident dignissimos praesentium nihil molestiae sed. Itaque totam cupiditate ea velit perferendis nihil dignissimos tempora. Vel quibusdam est vitae.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(282, 'Modi voluptates eaque harum ipsa. Voluptatem natus in fugiat minima harum dolor corporis delectus. Odit culpa eveniet repellat sint magnam. Vel dolorem est sint officia omnis.', 'Nobis voluptas vitae reiciendis voluptatem placeat nulla. Molestiae esse culpa perferendis enim a tenetur. Quis provident sit et amet porro.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(283, 'Ut quam vitae nam occaecati sunt. Ut eos voluptatem libero necessitatibus. Ut aliquam eius maiores. Hic sequi ea cupiditate. Doloremque quia eum repellendus omnis aliquid. Quia repudiandae voluptas quia.', 'Harum quaerat consequatur architecto odio facilis ullam eaque. In voluptates necessitatibus expedita occaecati dolor. Suscipit ut quis in et nihil.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(284, 'Nostrum dolor et non odit. Eum modi eius sapiente consequatur molestiae. Consequatur ullam vel ut minima iste. Qui maiores dolorem sapiente doloremque distinctio eos ut necessitatibus.', 'Eaque ex incidunt dignissimos ipsam ea id. Illo at quod repellendus aut et enim. Aut porro saepe vero similique aut vel assumenda ab. Corrupti perspiciatis facere iusto omnis.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(285, 'Maxime illo dolorem omnis deserunt et quo quia libero. Est quasi odit enim cupiditate corporis. Voluptatem magni asperiores dolor consequatur est. Voluptatem sapiente fuga voluptatem impedit quas. Facere earum tempore neque.', 'Dolor accusamus alias ullam pariatur. Quidem voluptatem vero sed velit deserunt vitae. Deleniti rerum ducimus ab natus odit nesciunt rem. Veniam odit sequi non veritatis.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(286, 'Officiis ab aut quibusdam officia. Ut officia odit aspernatur sed aut qui. Consequatur dicta magnam fuga odit hic quo. Hic et velit amet consectetur aut.', 'Rem eaque quas ab. Distinctio in et sed sunt et quis. Numquam et ut eligendi reprehenderit commodi. Ea distinctio perspiciatis sunt ducimus voluptatem et voluptas.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(287, 'Distinctio nostrum quo consequuntur doloremque. Odio odio est dolores consectetur. Tempore voluptatem et aut qui et id. Vitae velit nemo beatae sapiente.', 'Quidem soluta blanditiis debitis voluptas. Accusantium quia dolorum ut animi et. Autem qui sequi incidunt ratione autem velit et.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(288, 'Consectetur animi nobis blanditiis iste ducimus voluptates. Nam dolore autem harum dolorem ad voluptatem. Velit rerum autem praesentium velit sunt assumenda exercitationem architecto. Et odio porro repellendus.', 'Quo deserunt laborum omnis doloribus dolorem consequuntur qui. Sed odit repellendus reiciendis explicabo architecto. Aperiam vel odio suscipit occaecati est et sequi. Eos ipsum perspiciatis quia.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(289, 'Aliquid a alias voluptatem saepe officia. Est explicabo et temporibus sed officiis eaque nostrum. Dolores praesentium omnis voluptates quo. Deserunt qui voluptas enim natus dignissimos. Iusto et voluptas excepturi voluptate sit.', 'Sit distinctio et dolores. Maiores exercitationem velit qui autem. Numquam et alias molestiae vero voluptatem. Sed sunt itaque id ipsum. Aliquid sequi ducimus porro nam dolorem quasi consequatur.', '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(290, 'Aperiam sint nulla libero ad deleniti nostrum itaque. Et cumque sit quos occaecati. Quam nostrum commodi tempore officia. Veniam quam distinctio quidem est.', 'Recusandae qui in libero. Veritatis dolor quasi quia id possimus.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(291, 'Laborum et maiores reiciendis. Est neque non id quasi. Quam voluptatum esse reiciendis sint. Amet voluptatem illo sit laboriosam nulla ea.', 'Voluptate natus illo voluptates hic ut quam. Sit facilis similique aut sequi est laboriosam dolores. Illo ut corporis harum aut provident nesciunt nisi. Iste vel facere vero quaerat.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(292, 'Molestiae reiciendis placeat mollitia. Dignissimos non eaque praesentium est. Quos architecto quos debitis adipisci. Assumenda velit officia vitae ipsum libero odio et. Molestias non error nesciunt quis et. In iure distinctio quis facilis.', 'Id est ut quae porro voluptatibus delectus quo nostrum. Porro nemo id expedita tenetur optio nisi modi ipsa. Ea ut magni omnis dolorem tempora. Facere aut hic aut quo.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(293, 'Amet eos asperiores sed reiciendis. Aut et unde pariatur odio nisi illo. Aspernatur alias qui facilis sed laudantium nesciunt ab fugiat.', 'Et deleniti officiis temporibus debitis. Nemo excepturi sunt modi id. Rerum delectus dolorem consequuntur. Sequi quibusdam dolorem exercitationem itaque.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(294, 'Nostrum est dolorum repudiandae quia. Pariatur necessitatibus sed reprehenderit laboriosam non enim. Quia quae harum odio ab qui illo.', 'Alias incidunt culpa accusantium sit vero. Ut dolorem totam rerum. Officiis voluptatem aliquid necessitatibus sapiente. Autem quas qui unde.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(295, 'Rerum laudantium dolorem cumque ipsum. Voluptas ipsum dolores eos quae et commodi quam. Nostrum tempora animi illo molestias neque a. Fugit quia iste autem reprehenderit quo.', 'Aperiam animi molestiae accusantium omnis. Ut beatae veritatis magni facilis sapiente expedita. Cupiditate saepe neque illo inventore omnis.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(296, 'Voluptas sit pariatur aut tenetur quas dolor nesciunt quia. Voluptatem qui blanditiis blanditiis. Soluta et laudantium dolorem atque tenetur.', 'Accusamus est quis rerum sit. Nihil omnis architecto consequatur porro. In officia architecto dolorem aut. Qui eaque veniam neque tenetur eaque sapiente ipsam.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(297, 'Molestiae numquam ducimus cupiditate. Beatae harum qui voluptatem eius et unde. Fuga velit sit iste eos id voluptate iure.', 'Accusantium cum aliquam quam sunt. Perspiciatis voluptatibus quibusdam voluptatibus quas sed iusto. Perferendis minus hic et sit repudiandae. Reprehenderit necessitatibus tempore ut.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(298, 'Unde velit ex eos illum ut qui distinctio saepe. Reiciendis et quia necessitatibus molestiae. Corporis aut harum et vero. Similique occaecati est iusto et et.', 'Asperiores impedit quos magnam vel. Eum eius eligendi autem laborum quia. Distinctio qui voluptate sunt id ab autem aut. Similique eius rerum velit debitis corporis qui.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(299, 'Similique vel libero et commodi est assumenda incidunt. Voluptatem et dolorem consequatur a. Explicabo voluptatibus minus doloremque ipsa necessitatibus repellendus. Dolores commodi dolorum ut deleniti.', 'Nostrum et distinctio magnam voluptatem corporis aspernatur omnis ut. Praesentium itaque unde optio ab quia adipisci voluptatem provident.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(300, 'Optio voluptatibus eum in. Maxime non et autem suscipit culpa odit omnis. Voluptatem quos blanditiis totam id qui. Velit ducimus qui est.', 'In voluptatibus quibusdam et voluptatem est voluptas quod. Ab nulla hic quisquam dolores. Itaque minima quia est voluptatem labore voluptatem nihil. Aut cupiditate dolorum et.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(301, 'Consectetur quis est sunt voluptas dolorem qui. Dolorem veniam quisquam fugit et unde. Saepe dolorum dolores fugit quis eos architecto et. Quidem sit accusantium harum earum molestiae.', 'Consectetur assumenda ea et quia commodi. Aperiam aut repellat repudiandae autem accusantium est. Aut porro doloremque non et doloribus amet deserunt.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(302, 'Possimus et minus dolor ea. Voluptas nam id fugiat perferendis quis accusamus. Expedita quia at rerum. Atque unde culpa ab voluptatem.', 'Sit ea nostrum non. Accusamus natus vero perferendis numquam illo.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(303, 'Quia odio earum iste excepturi. Dolores fuga optio incidunt vel voluptates qui iusto. In dolorem ut nobis voluptas inventore. Non et corrupti blanditiis et.', 'Eos suscipit ratione vitae reiciendis tempora. Ullam reprehenderit libero aut aut dolores et maxime. Velit nihil asperiores accusantium laboriosam quia quia.', '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(304, 'Tempore voluptatem est suscipit vitae qui eum. At incidunt delectus assumenda blanditiis magni quas qui et. Hic perferendis quas cupiditate neque. Incidunt ea rerum sed quia. Possimus magni porro possimus aliquid.', 'Nam hic nobis quae praesentium aut reprehenderit officia. Cum amet aliquid molestias qui vero dolores. Quidem maiores id quae.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(305, 'Veniam eos officia aut quas. Aut excepturi sequi pariatur animi. Voluptatem nisi sed ut impedit eum at. Id labore sint est quis doloremque ea. Sequi sunt amet perferendis voluptatum aliquid.', 'Ex eligendi quas at numquam. Blanditiis aspernatur atque eligendi ipsa excepturi id et. Laudantium porro explicabo quo nostrum.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(306, 'Debitis debitis dignissimos facilis aut. Nisi aut ipsam in suscipit. Sint omnis harum rerum. Rerum minima qui minus sed. Aut architecto id sapiente exercitationem eum. Iure rem ipsam numquam sunt pariatur quisquam voluptas.', 'Eos neque dicta eum repellat. Sapiente exercitationem similique et omnis. Repellendus tempore eius deleniti quo dolorum tenetur.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(307, 'Consequatur distinctio omnis repudiandae voluptatem. Nemo consequatur omnis itaque beatae. Ipsa veritatis cum corporis occaecati. Impedit sapiente magnam beatae in rerum. Nisi minima eum et omnis.', 'Nesciunt et voluptatem qui laborum cum sunt. Nemo et esse quidem autem voluptatem. Voluptas doloremque non occaecati similique unde veritatis.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(308, 'Voluptas sunt voluptatem aut. Sed dolor a distinctio adipisci hic. Ipsa sit corporis excepturi dolor voluptatem. Saepe aliquam delectus et pariatur non et earum. Soluta quo labore molestias placeat omnis molestias.', 'Nisi praesentium placeat rerum numquam. Eos odio sit sed suscipit nemo quisquam facilis. Nam deserunt praesentium rerum ipsum velit. Porro ab alias magnam eveniet officia ab sed soluta.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(309, 'Rem officiis ut quasi eos eveniet esse placeat occaecati. Quo atque et qui qui architecto nemo qui. Corrupti fuga atque fugit cumque modi voluptate.', 'Non quo accusantium accusantium corrupti facere similique. Quia aut accusamus voluptates. Qui facilis maxime qui. Enim suscipit explicabo porro et.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(310, 'Eum et est eum alias illum facere. Odit ducimus ea laborum et commodi ut eum. Dolores enim rem unde qui sit nostrum distinctio qui. Est nesciunt adipisci expedita aliquid.', 'Qui fugiat molestiae voluptate magnam sapiente. Sit excepturi praesentium totam ea. Quam unde facilis cum sit neque eos ut. Aspernatur temporibus sed quae reprehenderit aut saepe beatae soluta.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(311, 'Rerum sapiente excepturi omnis fugit ut in repellendus aliquam. Iusto autem dignissimos aperiam sequi. Dolore hic dolor quisquam sed voluptatem placeat. Sapiente dignissimos ea vero modi magnam consequatur.', 'Porro id iure provident eaque quaerat. Ipsam consequatur cum blanditiis est. Omnis odio ex accusantium harum culpa.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(312, 'Repudiandae asperiores molestiae quo debitis. Non repellat hic a. Consequatur velit nesciunt nulla hic. Molestiae ut mollitia qui deserunt ipsum iusto. Voluptates et modi repellat velit ut.', 'A earum at quis expedita neque ducimus sed necessitatibus. Voluptatem blanditiis tempore voluptas quis nam in. Ipsum aut nihil et facere omnis et. Autem eveniet et magni.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(313, 'Non occaecati amet aut sit sit nihil. Sed ducimus repellat veniam ipsa aut. Rerum recusandae aspernatur debitis omnis possimus qui. Ut molestiae laborum et.', 'Quis iure quo asperiores molestiae accusantium. Autem ad beatae quia iste id consequuntur. Enim non ea quos tempore possimus. Esse voluptatibus aut quos quia voluptatem odit.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(314, 'Impedit dolorum iure alias impedit dolorum quia excepturi. Dolor sed omnis accusantium sapiente magni consequatur sit saepe. Inventore consequuntur eius in quos laudantium ut eaque asperiores.', 'Voluptatibus recusandae quia dignissimos rerum. Suscipit voluptatem at neque. Perspiciatis qui tempora ab in quia. Quidem tempore doloremque enim dignissimos maiores dolores.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(315, 'Architecto et tempore dignissimos. Eum commodi eum qui quam et fugiat.', 'Animi quisquam quidem dicta aliquam quae ut. Eos nam dignissimos id omnis est laborum. Odio ut ipsa id suscipit ipsa corrupti ex. Accusantium rem assumenda non.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(316, 'Voluptas dolorem perspiciatis est veritatis dicta debitis. Minus inventore reiciendis porro omnis ipsa et numquam.', 'Architecto ut harum ut fugit. Qui minima eos odio repellat facilis nam iure. Nihil non id est quas aut nostrum. Voluptates dolore est perferendis eos perferendis sunt ut eligendi.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(317, 'Omnis molestiae ut porro minima nam. Ut consequatur id minima soluta provident est. In velit explicabo voluptatem expedita molestiae tenetur dolorem.', 'Dicta sunt qui unde eos et. Aperiam velit possimus est quibusdam aut ea debitis blanditiis. Iure expedita sapiente sunt est sit pariatur.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(318, 'Ratione aut laborum cumque ex hic. Ab quis autem eum quis. Similique a autem sint aut iure aut. Quia est sed provident sunt quidem non laudantium.', 'Ut consectetur inventore dolorem qui voluptas. Accusamus a natus laudantium ut. Ipsa eum mollitia maxime porro pariatur.', '2021-11-20 14:47:47', '2021-11-20 14:47:47'),
(319, 'A earum autem ipsum illo. Quo vero ad consequuntur est molestias. Aut et consequatur et iure omnis totam qui. Tenetur rem sit inventore error. Perspiciatis nihil ut repellendus dolorem.', 'Laborum ullam enim non necessitatibus consectetur sequi. Temporibus consequatur tenetur temporibus vitae ea qui magni. Alias voluptas ipsam eos.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(320, 'Dolor hic et labore quae harum aut ut. Eum suscipit quis laudantium nihil enim officiis atque iure. Optio sed animi illo ut dolores facere explicabo quibusdam.', 'Voluptate non est amet tenetur rerum. Iure voluptatem aut sit blanditiis veniam distinctio. Eveniet ut laborum iure cum eius dolor iusto.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(321, 'Tenetur quae adipisci est non voluptatem. Omnis recusandae exercitationem rerum odit tempora similique. Consequatur nostrum sed est eaque quia. Deserunt voluptatum eligendi sint perspiciatis laudantium velit fugit quis.', 'Doloribus enim mollitia sit molestiae enim quia doloremque. Distinctio molestiae sed et eos nostrum. Voluptate nostrum laborum consequuntur quas unde voluptas dolores.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(322, 'Molestiae odio saepe aut atque sunt aliquam. Sapiente iste beatae sed excepturi pariatur ut. In est qui sed ea dolorem laudantium suscipit fugit.', 'Quis eius sit dolorem numquam aliquid nulla architecto omnis. Voluptatibus illo quis nostrum. Iusto dolor similique aperiam dolor quae. Dolor et saepe dicta natus recusandae voluptatum.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(323, 'Suscipit similique rerum quo non. Accusantium architecto et corporis dolores molestiae et laudantium. Aut maxime veritatis praesentium dolorum quis aperiam. Eveniet quaerat repellendus officiis.', 'Recusandae facere quaerat fuga nam sit quis aperiam. Minima nobis eum eum rerum repudiandae voluptatibus. Quia reiciendis incidunt sed dolorem rerum.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(324, 'Eveniet veniam nobis a ipsam. Similique consequatur numquam iste enim animi totam qui. Itaque sint exercitationem voluptatem et tenetur. Animi ea animi nihil id consectetur nesciunt sit sint.', 'Odio deserunt et rerum nemo qui cumque. Hic odio facere sit exercitationem. Enim commodi voluptatem exercitationem omnis velit vel nam. Eos accusamus doloremque voluptatem animi velit quidem.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(325, 'Quod eveniet autem fuga quo et voluptatem. Accusamus corporis id commodi deleniti laboriosam quia. Minus dolores eveniet omnis delectus delectus hic. Est numquam explicabo omnis quia maiores quia.', 'Debitis quos aut ipsa qui. Provident in dolore et. Deleniti nam eos ratione quia inventore in minus. Minima quia ab eaque corporis doloremque neque.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(326, 'Sed ea rerum dolore nihil dolor minus. At voluptatum rerum et numquam. Facilis consequatur deserunt eligendi at sit adipisci non. Optio aut praesentium asperiores dolor. Maxime dolorem aspernatur tempore dolorum quae.', 'Ipsam laborum non voluptate iusto enim occaecati. Sapiente modi aut dolor quos quia. Temporibus fuga id perspiciatis vel veniam sapiente. Aut in in ut suscipit.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(327, 'Unde aliquid necessitatibus et voluptas animi. Explicabo est dicta et consequatur aliquam recusandae. Quod non esse quidem maxime fugit eius. Error iure delectus nisi et modi temporibus qui.', 'Molestias aut et modi dolore harum non laborum sequi. Et dolorem ratione fugit consectetur facere explicabo aliquid. Ea error minus amet eos nam. Aliquam sunt sapiente dolor.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(328, 'Aut nemo id et error qui eaque debitis eum. Voluptatum illum praesentium dolore quaerat aut temporibus consequuntur. Eveniet culpa unde ad necessitatibus. Nisi laboriosam quidem occaecati delectus hic.', 'Quam illum dolor corporis earum. Adipisci quod itaque neque totam et optio sit. Qui molestias fuga non necessitatibus numquam nihil in consequatur.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(329, 'Ea rerum impedit dolorem quam. Asperiores nihil ut perspiciatis voluptas. Voluptate sapiente ipsum qui nemo et. Alias corporis omnis eos necessitatibus illum consequatur.', 'Vel ut enim et. Quasi voluptas qui id rerum eius quas. Culpa deleniti eos et et.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(330, 'Dolores quae exercitationem quo fuga tenetur. Ratione explicabo rerum hic illo. Veritatis dolor nobis modi autem illum et.', 'Sit minus libero dolor eligendi in quo. Ipsum harum incidunt nam maiores beatae autem in. Et commodi ea ipsum ea veritatis perspiciatis cum esse.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(331, 'Harum necessitatibus consequatur eius beatae. Nulla ea consequatur repudiandae. Dolorum excepturi et suscipit et totam aliquam. Doloremque dolores quidem omnis est hic perspiciatis.', 'Velit animi exercitationem aut rerum saepe fugit et. Ut sit ad nihil qui quibusdam quos. Id error harum possimus eligendi molestiae ratione numquam.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(332, 'Nostrum doloribus aliquid voluptatem numquam. Voluptas aliquid maxime eum iste nostrum et iusto. Eaque quibusdam dignissimos omnis officiis.', 'Beatae est aut eum est rem eligendi id. Laboriosam quo soluta dolores culpa maiores ipsa ea nam. Quis aut architecto omnis dolores illum quo nam.', '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(333, 'Assumenda ipsam cumque nisi eaque aut dicta laborum. Error ad tenetur voluptatibus cupiditate similique. Sit non sit quo et est aliquam. Ab aliquam nihil omnis ut ipsum iste.', 'Molestiae tempore ad quaerat eum natus laboriosam sit reprehenderit. Nam tenetur quas eaque eveniet temporibus quos. Excepturi dolorem aut ea quibusdam vitae ad distinctio cum.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(334, 'Voluptatem praesentium officia cumque laboriosam ratione eos harum. Nostrum enim aliquam est et error aspernatur iure. Reprehenderit error reiciendis dolores voluptatibus sed temporibus. Eveniet repudiandae voluptas aspernatur architecto tempora omnis.', 'Qui numquam sed aut culpa nisi. Non eveniet molestiae facilis vero ut. Rerum qui ratione exercitationem harum amet dolores alias. Dolor repellendus est ipsa alias.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(335, 'Illum dolorem voluptas in fugiat fugit unde exercitationem. Maiores architecto commodi enim maiores. Praesentium et laboriosam et ut est sint ea. Id quo architecto aut perferendis. Asperiores laborum consequuntur odit et et. Eum et nam aut.', 'Doloremque qui pariatur eum fugiat saepe doloribus. Cumque labore temporibus sit animi. Aut perferendis ex ex est temporibus facere.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(336, 'Similique quis officiis voluptate saepe alias aperiam magni voluptatem. Ex consequuntur ut magni occaecati. Exercitationem pariatur magni sit porro quod non. Aspernatur excepturi qui velit vel nihil.', 'Quisquam nobis consequuntur odio qui. Eum fugiat molestiae ut architecto. Nulla et et aut veritatis inventore. Qui repellendus qui saepe sunt ut consequuntur sunt dolorem.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(337, 'Inventore voluptas dolore voluptas et placeat et. Vero laborum nisi quo voluptate. Nesciunt unde unde modi animi reiciendis nulla. Illo iste corrupti totam pariatur est totam corrupti ut.', 'Rerum nihil facilis et quaerat id labore. Doloribus dicta ex ipsum. Minima quae dolorem ut aliquam natus totam excepturi voluptate. Et qui aspernatur laudantium neque dolorem deserunt iste.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(338, 'Quo molestiae porro aut velit labore quidem nam. Accusantium quis quam odit quis ut. Quia commodi ex aliquam corrupti. Eligendi numquam suscipit quia vero nisi.', 'Et aut quam accusantium libero sed inventore. Et ad dolores quasi ullam autem. Ullam quidem ad velit explicabo.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(339, 'Dolorum commodi laudantium laboriosam reiciendis. Consequatur molestiae perspiciatis est vel velit consequatur veniam. Neque ipsam accusantium et cumque accusamus magni magnam.', 'Quae perspiciatis autem excepturi quis. Et eveniet ad perspiciatis. Ut quas hic voluptatum eaque blanditiis hic sit.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(340, 'Et optio dolores cupiditate repellat. Et minima unde expedita maxime ducimus quia eos. Nisi laboriosam sunt quod dolorem qui occaecati officiis ut. Debitis debitis velit ut necessitatibus ut placeat delectus qui.', 'Earum illo quae corporis accusantium voluptas impedit minus. Aut odio quisquam esse inventore corporis ut molestias.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(341, 'Temporibus eaque nostrum esse animi qui alias. Excepturi error nihil cum ut laboriosam. Velit ratione voluptatum magni at deleniti incidunt. Est qui et minima consequatur modi.', 'Eum illum asperiores et iste eius. Iure dolores et rerum blanditiis aperiam quis aliquid. Vitae omnis quo voluptates assumenda.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(342, 'Ipsum quos impedit eligendi qui laboriosam architecto. Ipsa quis quod consequuntur officiis expedita sequi quibusdam. Nostrum quidem dolorem laborum distinctio enim. Earum sit porro unde molestiae quisquam delectus.', 'Provident consequatur a dolores est sapiente et. Aperiam cumque provident doloribus quibusdam aliquam. Mollitia libero qui quisquam nostrum consequatur et quia.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(343, 'Qui possimus maxime ducimus quasi sapiente non quae quod. Quam itaque fugit earum et ipsum voluptatum quis. Nobis est ut neque. Inventore deserunt voluptatem itaque quam quam enim adipisci.', 'Reiciendis est error quas soluta. Tenetur similique veritatis vel ipsa. Repudiandae corrupti aspernatur eveniet debitis facilis maiores dicta.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(344, 'Suscipit dicta fugiat dolorum maxime ut incidunt. Est voluptas sit corrupti assumenda mollitia. Vero rerum neque excepturi incidunt ea vel quam est. Quia ipsa eligendi et voluptate.', 'Odit et totam ad cum illo reiciendis magnam nobis. Rerum eos sed qui rerum provident. Quisquam est est minima. Accusamus quis velit veniam aliquid voluptas sit.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(345, 'Voluptatem ullam error qui natus. Qui laudantium qui totam veritatis eum odit maxime nostrum. Suscipit commodi repudiandae minus voluptas et officia molestiae.', 'Est deleniti explicabo ut consequatur omnis illum. Qui enim eveniet praesentium. Quibusdam et quisquam ad enim at est quia. Odit neque adipisci neque fugit.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(346, 'Deserunt eius ut et. Officiis iusto non maiores et. Sapiente totam omnis eligendi quidem. Fuga architecto deleniti earum cupiditate doloribus. Veritatis omnis sit et autem minus nostrum. Dignissimos magnam aut dolores est aspernatur aspernatur.', 'Quisquam modi perferendis architecto cumque cum et sed. Blanditiis necessitatibus qui atque est recusandae aut enim. Quasi et voluptatem est in maxime qui recusandae eum.', '2021-11-20 14:47:49', '2021-11-20 14:47:49'),
(347, 'Fugiat amet odit labore. Ut aut necessitatibus omnis molestiae distinctio. Consequatur ad expedita nostrum ipsa ut.', 'Et ea consectetur consectetur quis. Esse id vel mollitia unde. Commodi repellendus ducimus fugiat aut.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(348, 'Animi et facilis labore numquam quo nihil. Vel doloribus odit accusantium officiis nam suscipit. Numquam unde quam dolores tenetur dolore quasi aspernatur. Ipsam voluptates vel mollitia quibusdam dicta quo veritatis.', 'Cupiditate unde nulla provident exercitationem. Quae aut necessitatibus qui iure molestias. Explicabo nesciunt facilis accusantium quia eius explicabo.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(349, 'Quo possimus nulla nisi voluptatem explicabo. Commodi omnis vitae at corrupti laboriosam itaque. Illum rerum et quo asperiores quia. Architecto necessitatibus non excepturi deleniti cumque. Hic non et voluptates ut.', 'Qui omnis sequi in qui aspernatur quaerat. Id sed dignissimos id nulla ad. Consectetur dolorum nemo repudiandae ut possimus dolorem laborum.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(350, 'Ea quas quia in vitae. Sit ea nulla repellat reprehenderit accusamus. Et sapiente officia enim et eos quo. Iste officia nihil tempore quia molestiae ut velit inventore. Deleniti vero ducimus dolorem libero quis maxime saepe.', 'Necessitatibus quia voluptatibus molestias provident. Accusamus occaecati et quia. Sit necessitatibus maiores consequatur quo iste praesentium. Est optio impedit rerum magni minima.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(351, 'Et dolorem consequuntur molestias culpa exercitationem rerum quas aut. Nam quo et aut at error ullam. Nobis aut dolorem numquam deleniti.', 'Aut voluptatem et voluptate consequatur consequatur. Voluptates dolorum accusantium nihil est dolores fugiat consequatur sit. Dolores error cum quo et.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(352, 'Quibusdam porro tempora facilis sequi. Asperiores illum quidem tenetur dolor veritatis laborum ipsam. Distinctio qui ullam et ab.', 'Excepturi temporibus ab incidunt fugit voluptas repellendus. Recusandae voluptatem velit quasi quaerat qui est. Aut sed dolor molestiae quas.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(353, 'Quo aut iure omnis veritatis odio ipsum. Eius voluptas animi temporibus. Dolores et tempora nulla sunt quia.', 'Omnis laborum sed natus aut numquam. Quibusdam omnis ut magnam. Vel earum commodi qui id quod. Nobis eos quas modi fugit quasi. Qui illo animi consequatur atque perferendis consequatur.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(354, 'Soluta debitis dignissimos est ducimus ducimus inventore. Suscipit eos sunt velit voluptates. Iusto tenetur est molestiae ut vero.', 'Et nisi repellendus asperiores et. Laboriosam omnis eveniet aut in autem. Ab et repellat sunt deserunt. Dignissimos facilis sunt vitae suscipit quod.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(355, 'Consequuntur temporibus et hic nulla. Et laboriosam harum nihil deserunt nisi. Nulla tempore quasi voluptatem harum. Possimus adipisci officia nesciunt aut quidem quidem quis.', 'Quia consequatur voluptatem quis voluptatem vitae magnam et. Eos est voluptatem nihil id sit aliquid. Necessitatibus quia repellat labore et.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(356, 'Iste eum et perferendis voluptas. Dolorum ratione ea perspiciatis quisquam eum qui blanditiis et. Non et quasi error in facilis deserunt. Esse est sunt et occaecati laborum.', 'Eum est omnis facere. Non ratione perspiciatis et sint non sint. Iusto enim veritatis sequi impedit nemo velit exercitationem.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(357, 'Expedita provident dicta consequatur quis nihil aut. Eos et est incidunt mollitia omnis et. Officia illum minus aut vero doloribus quis quod. Debitis culpa tempore temporibus.', 'Sit autem eos amet doloremque deleniti repellendus labore. Qui impedit eos dignissimos odit. Aut quas et voluptatem adipisci consequatur et similique.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(358, 'Porro et magnam numquam vel veniam quibusdam. Qui dignissimos esse et rerum. Eligendi et numquam et nemo. Quod eum magnam et quia. Suscipit est nobis ut numquam. Quidem corporis est vitae dolorem vitae. Aut quos inventore vero tempora vel cupiditate.', 'Quibusdam accusantium assumenda reprehenderit omnis. Eligendi autem officiis ea sunt. Aliquam ut quisquam modi.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(359, 'Facilis maiores corporis delectus eveniet aspernatur. Consectetur sed est autem error numquam praesentium. Porro dolor et magnam non quo possimus ad. Adipisci et dolorem tempora veniam et.', 'Cupiditate placeat qui ea. Ad ex et ut. Asperiores ex pariatur quis incidunt. Quasi possimus esse et et perferendis eius quidem facilis.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(360, 'Rerum sapiente ut est eum et dolores similique at. Dolor officiis placeat explicabo et possimus accusamus.', 'Sed explicabo assumenda quas asperiores tempore. Tempore non exercitationem non et voluptatum ea. Ut commodi vitae enim est.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(361, 'Est voluptatem dolores rerum laudantium. Ex delectus excepturi ducimus ratione possimus doloribus adipisci a. Aut aspernatur maxime quibusdam et excepturi recusandae voluptatibus. Facere porro vero ut ipsum occaecati amet rerum.', 'Repudiandae doloribus ut quis sint quo fuga corrupti rerum. Et et modi deserunt nihil. Eaque autem earum neque reiciendis delectus ut. Deserunt dolores atque tempore vitae.', '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(362, 'Nemo dolores officiis natus sapiente occaecati. Eligendi placeat ea ipsam possimus quo. Nemo impedit vitae consequatur rerum et aliquam numquam totam. Perspiciatis velit omnis impedit id quisquam voluptatem harum.', 'Delectus repellendus soluta fugit qui delectus. Beatae facere autem ut consequatur amet perferendis. Omnis nemo qui et.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(363, 'Soluta numquam recusandae rem ipsam libero dicta. Sit repellendus voluptate explicabo nisi hic. Enim harum totam nihil animi quam veritatis expedita fugit. Aspernatur hic asperiores molestiae voluptates quos iure est.', 'Ea voluptas fugiat quis ducimus quae. Sequi iure rerum animi omnis tempora vel. Nesciunt incidunt voluptatem et tempore rem rerum deserunt.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(364, 'Incidunt sint illo nobis maxime consequuntur vero saepe sunt. Tenetur et alias in est qui nisi. Voluptatem nemo voluptate architecto quia earum ut.', 'Aut et aliquam quas saepe natus. Blanditiis quidem officiis minima fuga. Expedita nobis aut omnis et architecto cumque dolorum.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(365, 'Placeat optio consequatur voluptatem et. Veritatis et numquam numquam eligendi. Voluptas omnis iure consectetur quasi dicta quo rerum. Consequatur accusantium occaecati id et officiis voluptas.', 'Aliquam odit repellendus labore assumenda. Possimus fugit totam eos ipsum et ullam. Iure neque rerum at voluptatem modi cumque non.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(366, 'Voluptatem similique adipisci perspiciatis aut aliquid eos. Itaque libero ut eligendi voluptatem tenetur a. Consequatur ipsam quos animi iure qui aperiam.', 'Voluptates error culpa quisquam ex qui assumenda. Consectetur dolores quae fugit quod quia sapiente. Praesentium aut magnam qui cum animi laudantium.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(367, 'Beatae qui eos et explicabo labore voluptas unde. Itaque facere maiores labore magnam omnis et. Possimus exercitationem quia repellendus magni. Beatae voluptates quisquam recusandae mollitia. Quod alias sed omnis optio soluta et dolorum.', 'Voluptas dicta voluptatem exercitationem. Ab excepturi voluptatum esse doloribus distinctio sed ut. Officiis aut sunt officiis repellendus neque blanditiis magni expedita. Debitis iste minima ut.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(368, 'Et at animi voluptatibus saepe. Labore et adipisci qui temporibus. Ut ut est nemo. Eum perferendis rerum harum reiciendis aut. Nihil maxime similique et ipsam asperiores. A cupiditate eligendi alias labore sunt.', 'Explicabo aspernatur enim hic. Quibusdam ipsam culpa nihil iure reiciendis maxime aspernatur. Perferendis harum blanditiis aliquid cumque. Et unde voluptatibus fugit impedit et voluptatum ut.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(369, 'Odio vitae quia ab quaerat qui est. Ea amet nobis unde quasi.', 'Provident sunt incidunt molestias sunt quidem. Aut et maiores commodi omnis quo est dicta beatae. Sequi deserunt repudiandae qui qui consequuntur id.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(370, 'Illum neque aut tempore a. Quaerat dolorem numquam culpa corporis consequatur sequi omnis. Tempore sit numquam asperiores aspernatur quia reiciendis eum. Rem animi quo sit voluptas soluta.', 'Ipsum fuga aut expedita voluptatem. Molestiae dolor harum dolorem sequi. Consequuntur culpa doloribus saepe quia. Et ut sint reiciendis qui veritatis.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(371, 'Labore facere quia quod minus. Quidem quod dolorem aspernatur recusandae. Molestiae et ratione aut perspiciatis quia neque voluptatem.', 'Aspernatur quod perspiciatis omnis sit est quas. Voluptatem libero molestiae rerum sapiente blanditiis. Nihil ea nihil distinctio sint et ratione error earum. Deleniti sequi beatae tempora.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(372, 'Omnis totam consequuntur eos repellendus eveniet ab. Et exercitationem nihil in. Et quidem nam dicta quis et esse qui unde.', 'Facilis error enim ut sint necessitatibus omnis laboriosam. Sint rem vero ullam ut pariatur unde. Corporis earum adipisci qui aliquam molestiae tenetur.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(373, 'Enim rem placeat a. Quod culpa aliquam modi magni blanditiis aut. Cumque nemo dolor et laudantium cupiditate.', 'Aut magni dicta dolores ipsam odio. Ducimus nostrum ut qui fugit quod eos. Reiciendis quae ducimus velit. Maxime quae dolor aut voluptatem quos perferendis velit.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(374, 'Tenetur est repellat esse molestiae sunt. Autem minima nihil inventore quia impedit. Assumenda dolores et repellendus quis. Neque tenetur veniam ab exercitationem omnis nobis.', 'Blanditiis ratione repudiandae autem ipsum optio velit aliquam. Excepturi eaque quae qui asperiores. Dolores aut neque ab minima. Maiores occaecati iusto et non eum.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(375, 'Hic explicabo et qui doloremque sint ut excepturi. Non ipsam mollitia nisi amet qui tempore. Assumenda eaque rerum blanditiis placeat qui doloremque deleniti.', 'Voluptatem ut velit ea ad perspiciatis neque cumque. Deserunt odio et aut ut. Numquam quibusdam libero cum praesentium. Sint ut animi repellendus animi quod aspernatur quibusdam id.', '2021-11-20 14:47:51', '2021-11-20 14:47:51'),
(376, 'Voluptatem molestiae eius voluptatem sunt unde voluptas enim tempore. Ea vel est in quam tempore et. Blanditiis quam ipsa deserunt et quo id.', 'Sit perferendis dolor voluptatem totam natus. Dolorem voluptas rerum neque. Iusto dolor est neque ipsam. Aut eum exercitationem expedita.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(377, 'Ut animi voluptatem qui aperiam. Unde et laborum fugiat sed numquam. Nisi vero nemo aliquid sunt non rerum. Molestias dolores aut pariatur suscipit et qui. Et at possimus voluptas et eum eum. Quis adipisci sit nihil nobis aut doloremque et.', 'Consequatur aut laboriosam beatae eos officiis. Ut commodi quia qui non. Expedita nisi reiciendis aspernatur ea voluptatem. Libero iste est culpa.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(378, 'Est velit accusantium autem quae dignissimos molestiae. Facilis sit velit ut sed nam iure. Et modi reprehenderit voluptatem dolorem et accusamus placeat. Et quia et illo inventore.', 'Sint expedita id praesentium. Deleniti dolorem harum voluptas laboriosam mollitia. Inventore minus magnam voluptatem ut eum vel hic. Est voluptatem ut omnis ducimus minus voluptatem totam.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(379, 'Voluptas ut ullam ut eum qui sit cum. Et dignissimos odit ab suscipit necessitatibus sit. Ea autem ab in aut earum.', 'Sint deleniti sit vel. Corporis quia saepe tenetur velit deleniti quaerat.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(380, 'Deserunt rerum qui eum rerum in minima et. Minus aut sed repellendus ea voluptatem fuga. Corporis praesentium quis eos non corporis. Id ea sed voluptatem eum amet.', 'Rerum alias sint tempora rerum. Autem est ut adipisci consequuntur perferendis eveniet quia. Et rem sed sed omnis. Ut eum beatae error et id deserunt harum.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(381, 'Et atque cumque officiis veniam ea expedita. Consequuntur ducimus voluptas suscipit voluptatem distinctio maiores. Et itaque dicta non eaque aut. Dolor facilis laboriosam illo corporis rerum laudantium.', 'Ut dolorum nulla fugiat reprehenderit maiores quidem accusantium. Blanditiis hic et totam dolores.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(382, 'Vero quidem quia ut aliquid. Quis unde exercitationem enim. Quia officia reprehenderit tenetur ullam. In nihil enim est magnam odit magnam. Nobis ut eveniet voluptatem incidunt. Velit ad sunt doloribus aut exercitationem et aliquid.', 'Enim tempora velit explicabo aut adipisci. Fugiat cumque et omnis harum dolorem animi. Neque reiciendis sunt ut dolores molestias natus aut maxime. Officiis laborum quas nostrum explicabo.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(383, 'Numquam inventore ipsum similique aut. Illo dolor omnis labore molestiae minus rerum corrupti. Labore quidem est non.', 'Id placeat quidem sit ullam dolor. Et consequatur soluta et omnis ea dolor et. Et est vitae aliquam harum qui.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(384, 'Hic voluptatem repellendus at voluptas est nesciunt sint. Voluptate pariatur alias a sit eligendi laborum. Quis quam qui neque aut rerum ut sit. Molestiae nesciunt doloremque alias facere maxime.', 'Eaque nam et optio. Suscipit odit sapiente ipsam neque laudantium quod. Quia voluptatum et voluptatem.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(385, 'Qui aut saepe asperiores earum quia voluptatem. Qui nihil et quaerat et mollitia. Corrupti consectetur praesentium cupiditate. Ea itaque ad repellat.', 'Consequatur et minima quidem asperiores quibusdam sed minus. Rerum sed voluptatem beatae ipsam aperiam expedita animi. Est esse incidunt ea animi nihil ut.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(386, 'Qui sit praesentium id architecto aperiam quia. Voluptas fugiat eaque et minus eaque. Adipisci repellendus laborum voluptas non. Laudantium quasi et hic et expedita. Est ea ut eum rem aut asperiores qui dolore.', 'Tenetur rerum autem quis officia. Esse non repellendus consequatur laboriosam ipsum occaecati id. Dolores sit veritatis qui animi expedita nemo.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(387, 'Sapiente iusto voluptas at rerum. Error magnam porro quia nulla cum blanditiis. Et ratione aut quisquam dolorem aut dolore qui. Ullam consequatur sed quos.', 'Est enim eos incidunt ex. Ut qui earum velit aliquam. Minus explicabo hic ratione dolore accusantium voluptatum sit.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(388, 'Similique consequatur qui velit asperiores quasi placeat sed. Quis non labore molestiae corrupti voluptatibus dignissimos. Id nam natus aut.', 'Eius quos eaque voluptas vel accusamus soluta. Dolorem quas accusantium voluptas. Consequatur laudantium et quis beatae quibusdam consequuntur iure.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(389, 'Voluptas nihil asperiores nihil amet tenetur totam. Quo eos ullam veritatis cupiditate eveniet et aut. Suscipit quod quia optio necessitatibus velit nihil ratione. Accusantium voluptatem voluptatem dolorem odit nemo.', 'Ullam laudantium debitis quos atque non occaecati. Voluptatem assumenda molestias reprehenderit placeat. Officia nostrum est est corrupti nesciunt aut.', '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(390, 'Quam quod non officiis repellendus. Ut non debitis placeat corporis hic ut qui aliquam. Voluptatem debitis voluptatibus at. Et molestias explicabo velit enim alias.', 'Et et in rem quaerat. Quos ea minus est omnis vero qui. Voluptatem sed cupiditate eaque qui aliquid recusandae quia.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(391, 'Quo magni consectetur deleniti deserunt eligendi inventore voluptatibus. Reprehenderit molestiae et at quod quibusdam molestiae.', 'Repellat aperiam aliquid et sed. Est deserunt modi fuga molestias qui amet est.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(392, 'Sunt fuga facere repudiandae reprehenderit ipsum et quia. Animi itaque sequi unde et ut. Aut soluta aspernatur eum corporis maiores dolores. Harum qui ipsum omnis sint.', 'Consectetur iure sapiente ut illo dolor. Commodi consequatur magni autem aut. Illo aut beatae soluta veritatis voluptates consectetur.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(393, 'Id vel ex dolore autem debitis consequatur doloremque aperiam. Beatae architecto sint aperiam quos fugiat numquam quas. Perferendis ea earum excepturi.', 'Sed maiores et itaque in natus. Nihil et quasi enim. Rerum nesciunt consectetur voluptatem harum et libero.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(394, 'Non sunt harum ut nulla est. Nihil alias architecto eaque repudiandae magni. Autem quia unde quia sint. Corporis esse omnis eos velit. Ea laudantium quia earum suscipit ut. Sint quisquam voluptatem incidunt adipisci. Amet dolores ut aliquid.', 'Eligendi provident possimus corrupti doloribus nihil. Laborum error facere occaecati perferendis rerum doloremque voluptatem. Sit ut assumenda sit quo eum officia animi.', '2021-11-20 14:47:53', '2021-11-20 14:47:53');
INSERT INTO `modeles_recus` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(395, 'Aliquam nihil nostrum perferendis sed occaecati ut earum. Placeat fuga quisquam aut provident culpa impedit commodi. Amet est ad omnis optio adipisci dolorem tenetur. Totam maiores corporis eos quam.', 'Vel eaque ut eligendi debitis. Porro animi laborum ex eos. Placeat sit saepe laboriosam ullam alias eius et repellat. Nihil et et deleniti ut dolores adipisci.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(396, 'Tenetur ut dolorum perspiciatis dolorem laboriosam dolores est quibusdam. Quos voluptatem illum quisquam molestiae. Recusandae est est qui quisquam. Sit quo rerum et totam. Quis vel et et laboriosam.', 'Excepturi iure et fugiat. Aut nobis nam enim suscipit. Ipsam nulla ab voluptate quo sit quia natus. Et omnis quis voluptatibus tempore sapiente provident fuga.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(397, 'Exercitationem eaque quia inventore expedita. Maiores molestias similique reiciendis eaque ab sequi sunt.', 'Adipisci consequatur repellendus rem unde qui. Ut aliquid autem vel. Minus soluta non quia iste corrupti quia. Cumque sapiente voluptas debitis itaque odio.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(398, 'Odit saepe consequuntur velit provident soluta laboriosam aut. Quae adipisci dolores non. Est molestiae qui dolores repudiandae nisi fugiat. Fuga quam nesciunt maiores est occaecati.', 'Modi est sit est quia assumenda illo iusto. Impedit dolor quam eligendi. Cum explicabo ratione hic sunt sed.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(399, 'Molestiae illum rerum iure eos. Debitis nam qui molestiae nihil. Voluptatibus eos ea ipsum ad aperiam quod. Blanditiis similique ipsum et dolorem voluptas sunt.', 'In mollitia id non pariatur provident. Iusto voluptate alias voluptatum. Modi dolore facere laudantium quod aut dolore placeat.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(400, 'Sapiente ipsam expedita iste. Recusandae exercitationem sequi enim corporis consectetur. Est molestias quaerat atque a accusantium totam ut possimus. A non architecto eos quia quo molestias necessitatibus. Eos sit nobis fugit id laudantium.', 'Perferendis quia commodi ipsa praesentium molestiae. Commodi est harum autem recusandae. Nihil placeat non quibusdam illo at temporibus omnis.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(401, 'Rem atque in aut quia ipsa. Adipisci cumque ab distinctio aperiam rerum reiciendis. Facilis ad quam sit.', 'Culpa vel ut distinctio nostrum est. Eius tempora ullam atque quo sunt assumenda tempora. Sint nemo ipsam nemo at quis. Molestiae eum reprehenderit suscipit itaque qui.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(402, 'Sint autem possimus quos est. Dicta ut quas perspiciatis voluptates reiciendis voluptate. Deleniti asperiores ad quis fugiat minus. Odit veniam non quia laboriosam voluptas.', 'Dolorem reprehenderit suscipit aut at et suscipit sunt. Voluptates sed dicta ipsum non. Porro eius quas necessitatibus placeat.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(403, 'Ipsa qui numquam repellendus sapiente debitis magnam porro. Eveniet in provident quaerat fugit. Iusto odit in non aliquam non dolores sunt.', 'Natus eum deserunt non rerum ad quia fuga ut. Nemo dolorem odit vel esse. Laudantium in sunt dicta aspernatur.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(404, 'Et ab aut est mollitia. Dolore est omnis voluptas numquam totam nisi temporibus. Omnis cumque ut dolorem veritatis odio perferendis nobis. Vitae error ratione aperiam laboriosam.', 'Ducimus voluptas dignissimos illum minus ipsum modi sint ratione. Est ipsa repellat et sed sit sed. Tempore quis minus facere dicta. Maxime et aliquam corrupti dolorem ad quis eum.', '2021-11-20 14:47:53', '2021-11-20 14:47:53'),
(405, 'Atque est explicabo cum velit sed qui. Non ipsum voluptates aliquam illum exercitationem et omnis. Maxime cumque error consequatur libero itaque. Quis quia voluptas officiis nam pariatur dolores nam odit.', 'Dolores non est dolor ex esse earum rerum. Suscipit illum natus deserunt consectetur ducimus error. Quo et consequatur architecto consectetur fuga.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(406, 'Quis laborum maiores non. Ut autem et aut veritatis sed. Ab qui nemo aut illum sunt voluptates. Et eum repellat suscipit quo qui sunt facere deserunt. Pariatur nam dolor laboriosam.', 'Sint delectus ut consequatur aut quibusdam. Necessitatibus dolorum modi iusto tempore quas et porro. Et aut ut dolores sed hic ut ab.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(407, 'Quam aut eaque nihil quia voluptatum nostrum. Necessitatibus dolores officia ipsum ut. Nulla nostrum optio sed iste animi. Tempora ratione qui distinctio rerum.', 'Nihil dolor magnam corporis magni voluptatum quia. Debitis et id est illum eaque. Dolores quasi sequi aut quisquam. Eum et amet eos accusamus. Exercitationem praesentium ullam tempora.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(408, 'Quis esse libero maxime tempora. Quidem suscipit perspiciatis recusandae velit.', 'Corporis quibusdam officiis voluptatum. Modi a animi ex fuga ad quo omnis. Aliquam quo sint sint. Quibusdam facilis distinctio aliquam maiores ut.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(409, 'Et rerum quas quas in. Qui qui voluptatem quae quas voluptatibus corporis. Mollitia aliquid rerum sit eaque pariatur accusantium odit molestias. Magni officia reiciendis magni necessitatibus quam accusamus. Aut sint cupiditate magni quis minima quis.', 'Dignissimos ut qui ex minima labore rerum similique. Aut accusantium quidem voluptas excepturi assumenda vitae. Vitae eum et delectus ut.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(410, 'Sit ipsum aut quibusdam nobis qui facilis non et. Rerum consequatur repellat vel. Pariatur voluptatum quam ut sunt.', 'Libero neque distinctio ex aperiam vel mollitia. Aut enim debitis voluptatem doloribus natus. Est voluptatem recusandae nobis veritatis.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(411, 'Explicabo voluptate odio ut quaerat mollitia. Ipsum eos vel suscipit consequuntur temporibus autem. Et fuga suscipit voluptatum voluptates et sunt esse.', 'Quam qui aut odit fugiat. Voluptatem odit quisquam eaque ex reiciendis. Et laudantium autem harum dolor dicta.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(412, 'Blanditiis ea deleniti in unde aliquam est pariatur. Deserunt rem in optio aliquam quo. Natus occaecati soluta esse sunt nesciunt qui.', 'Magni dolor voluptatum vel. Similique sint omnis aut et omnis voluptates sint. Dolore impedit culpa velit aut fugiat voluptas.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(413, 'Aliquam ut architecto qui voluptatem eum aliquid nihil culpa. Dolorum accusantium tempora aut. Dolor culpa et exercitationem laudantium quia.', 'Et quo consectetur suscipit hic voluptatem voluptatem. Blanditiis hic nisi numquam iure maiores facere pariatur autem. Id libero voluptas ad provident ut molestias. Dolor ut repellat atque eos eaque.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(414, 'Numquam aut ratione quia vel aperiam quae rerum modi. Recusandae non deleniti veritatis. Atque rerum ab quo et aperiam ipsa neque perspiciatis. Unde quo dolores at facere et omnis ad.', 'Nisi modi eveniet velit officia animi exercitationem. Voluptatem neque voluptas sed. Quo quaerat ad accusamus omnis fuga quo minus.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(415, 'Dolor quia ipsum et et est repudiandae adipisci. Harum reiciendis aut vel culpa id. Eos amet vel eos sit quos unde dolore. Nulla quam harum et eaque est.', 'Cupiditate blanditiis eveniet placeat neque. Et facilis labore iusto porro veritatis debitis. Quasi perspiciatis non doloribus voluptatibus sed.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(416, 'Esse consequatur explicabo harum et maxime fuga vel. In et repellendus error aliquid voluptatum voluptatem sed. Tempore et maxime possimus corporis est expedita ex. Nesciunt praesentium ipsum est quasi praesentium quia voluptas. Omnis quod vitae et aut.', 'Ad delectus consequatur deserunt. Sed quis nesciunt temporibus. Omnis cum cupiditate sit ab a vero id.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(417, 'Sed facilis dolor perspiciatis ut et. Aut laudantium ullam dicta aliquid occaecati.', 'Ut inventore qui nisi aspernatur. Maiores consequatur corrupti aut earum harum illo eius. Accusantium voluptatem quaerat saepe aspernatur dolor repudiandae iusto.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(418, 'Modi quia nobis nihil aspernatur ipsum. Molestiae sequi ut molestiae sapiente quaerat. Temporibus dolorem voluptatem laudantium quasi aliquid voluptatem doloribus quis.', 'Ea explicabo ipsam ut eius itaque. Voluptatum sed fuga ipsum voluptates sit.', '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(419, 'Quae aut magnam corporis sequi quibusdam eos. Vero sed et qui quia. Velit porro provident id earum.', 'Nobis consequatur nisi vel in ducimus. Vel ducimus cumque aliquam. Voluptates facere et natus exercitationem reiciendis. Animi commodi recusandae minima nostrum non ad.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(420, 'Omnis iure nisi nemo. Expedita sint voluptas sequi error amet aut. Reprehenderit qui velit maxime id et assumenda adipisci.', 'Dolores recusandae assumenda suscipit unde et eius dolorem sequi. Nihil quisquam qui aliquid et. Unde culpa et doloribus voluptatem consequatur pariatur. Qui voluptatum libero ex.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(421, 'Iure eligendi rerum quia et sunt accusamus placeat. Facere consequatur veritatis voluptas ad eveniet. Accusantium dolorem consequatur totam aut et a rerum. Porro et voluptatem ducimus. Labore occaecati enim molestiae optio.', 'Cupiditate qui omnis eos. Eos velit eos corrupti ut debitis maxime. Error voluptatem necessitatibus magni dolor enim officiis.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(422, 'Possimus distinctio aperiam labore. Nobis ut rerum deleniti assumenda eaque esse ut. Incidunt et id sapiente accusantium. Natus veritatis deserunt architecto debitis. Voluptatum dolor ab ipsum minus voluptatem eligendi.', 'A aut quia alias neque qui. Non ea iusto ex est molestiae quidem laudantium. Eligendi et rerum cum ipsam laudantium quisquam ut.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(423, 'Exercitationem nisi expedita et iure error dolore cum quia. Ratione doloribus molestiae nulla quia aut. Dolore quam dolor quidem natus qui. Voluptas consectetur qui a ea est molestiae.', 'Tempore quod id aliquid iusto eos exercitationem facere. Voluptates perspiciatis qui saepe ut. Dolore sit officia est.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(424, 'Iste ab vero qui et. Soluta dolores ea hic ab cupiditate totam optio. Consequuntur deleniti odio autem. Voluptatem itaque expedita vel perspiciatis asperiores ut. Corporis alias iure aut id. Dolorem est quia vel voluptas ratione.', 'Nobis sed tenetur sed vitae. Deleniti expedita quia dignissimos quasi vel. Iure quae non deserunt unde dicta architecto. Non natus sit aut in iste modi sed reiciendis.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(425, 'Temporibus recusandae numquam quisquam nulla omnis non dolorum. Odit blanditiis ea ex ex est ut. In consectetur porro et placeat sed optio dolores. Quis voluptas nihil quae est sed.', 'Quo qui ut quisquam sint nihil quis. Qui ipsam sed maiores quis. Doloribus provident ut quos inventore autem harum ut.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(426, 'Voluptatibus vel iusto voluptatum. Similique officiis cumque qui tempora. Dolorem voluptatem perspiciatis est dolores.', 'Ipsa quia sapiente quo recusandae vero aliquid. Expedita tempore quam dolores minima libero. Doloremque veritatis voluptatum tenetur possimus inventore reiciendis. Ut natus et aut tenetur et tenetur.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(427, 'Amet libero occaecati eum et quasi occaecati. Aut voluptatem repellendus numquam autem sed aut. Neque quia ipsa et harum ea vel. Eaque fugiat repudiandae facilis atque consequatur unde.', 'Ipsam omnis dolore modi quidem eum repellat optio. Aut voluptatum et quam eaque aliquam maiores. At qui quos ut. Consequuntur ut incidunt veniam sint.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(428, 'Quisquam temporibus asperiores libero omnis qui et. Tempore voluptate dignissimos voluptatem rem. Velit eos enim officiis. Blanditiis dolorem quae qui et provident eveniet.', 'Voluptatem qui quos eum et quia molestiae eveniet. Aut qui maxime libero harum deleniti debitis. Voluptatibus non quae soluta rerum harum.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(429, 'Quia qui nulla vero vel expedita. Aut voluptas maxime quia dolor dignissimos sed voluptas quod. Nulla sint rerum ut impedit veritatis et excepturi. Dicta necessitatibus et voluptatem est earum. Velit possimus est ea id.', 'Voluptas nesciunt assumenda laboriosam. Accusamus laudantium animi possimus veritatis repellat. Ad dolores accusantium expedita deleniti necessitatibus autem et sequi.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(430, 'Beatae doloribus consequuntur et similique. Voluptas eos consequuntur nihil qui harum natus. Amet aspernatur harum repudiandae ut aspernatur.', 'Iste consequatur aperiam veritatis autem voluptatem et. Veniam amet id saepe. Ducimus saepe reiciendis sunt. Voluptas repellat molestiae nihil omnis molestiae eveniet.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(431, 'Ut neque cupiditate eum enim provident. Beatae explicabo vel atque nam. Veniam sint impedit quibusdam voluptatibus possimus doloremque provident consequatur.', 'Eos in dolores tempore officia. Sed dolore harum enim ipsam aut quo aliquid dolores. Quia ut nihil sint ut aut quo eum.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(432, 'Est maiores autem quisquam odio dolorem deserunt quae. Perferendis voluptas aut ut quia. Ut alias omnis et recusandae quia similique.', 'Sunt perferendis eius commodi impedit aperiam voluptate. Atque quam quod ex animi quam.', '2021-11-20 14:47:55', '2021-11-20 14:47:55'),
(433, 'Tenetur doloribus qui tenetur recusandae. Eaque et ipsa molestiae enim culpa quia ducimus. Suscipit numquam saepe aut velit ut. Mollitia ipsa consequatur qui eum.', 'Culpa blanditiis error ratione corrupti. Soluta velit est corporis in. Vel commodi assumenda tenetur qui quidem velit.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(434, 'Ipsa distinctio enim ratione architecto reprehenderit eos similique. Sunt quam optio consectetur. Quis dolores sed at. Sint rerum placeat deserunt praesentium. Laborum culpa quia autem.', 'Aut repellat earum sunt et. Porro sunt sed dolorem dolorem reprehenderit assumenda molestiae. Et possimus consequatur quia omnis ea ut. Dolor consequatur nobis molestias.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(435, 'Modi rerum consequatur voluptatem exercitationem accusamus impedit impedit. Excepturi qui nihil deserunt qui earum nulla. Magnam dicta est excepturi ut sed minima maxime. Doloremque sunt cumque error maiores laboriosam perferendis.', 'Quasi iusto est explicabo ducimus optio animi. A hic et inventore sunt. Officia unde et error fugit officia.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(436, 'Sunt aut inventore commodi pariatur. Doloribus ea rerum unde.', 'Quam odio hic eius amet laborum repudiandae et. Rerum provident est impedit. Est voluptatum ex dolorum repellat est quae et.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(437, 'Nisi facere quasi assumenda ducimus qui saepe. Velit distinctio non consequatur. Ea omnis qui eum. Libero accusamus rem id exercitationem molestiae fuga facere quaerat. Eius mollitia dignissimos sit et.', 'Ut ex sint molestiae animi corporis occaecati. Veniam earum ut eius maiores quia. Modi provident voluptatibus est et ad tempora cupiditate. Rerum non laborum dicta soluta.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(438, 'Consequatur et excepturi nemo quibusdam voluptatem. Aut autem ipsa sed est. Ut animi quibusdam quis unde quasi ipsa natus.', 'Ea voluptas quidem est consectetur minus non iste odio. Praesentium dolorum consequatur necessitatibus nemo explicabo ut quo. Qui in omnis molestiae.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(439, 'Incidunt exercitationem voluptatem reiciendis quia. Asperiores sint qui aut sequi. Illo ad dolores ducimus ab velit quidem. Est iure dolore quas et officiis est.', 'Et maxime sunt qui ea dolores molestiae. Nam est voluptate dicta velit excepturi veniam libero. Veniam vero maxime corporis sit. Ducimus sit impedit et dolorem voluptatem odio.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(440, 'Accusamus illo et labore impedit qui in inventore. Assumenda assumenda repellat minima impedit et id. Iste molestiae laudantium dignissimos aut.', 'Ex ut qui consectetur et sunt quo corporis magnam. Impedit odio omnis error libero ullam at. Ab quibusdam ab eos aut omnis sint quo. Veniam natus aut quam facilis omnis.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(441, 'Accusamus voluptatem et impedit et. Dolore ab in veniam. Id illo voluptas culpa deserunt voluptatem consequuntur. Est voluptatem dolor dolore vel. Et in officia illum qui nisi ad magnam. Porro blanditiis quas repudiandae non quia beatae aspernatur.', 'Perferendis a consectetur consectetur sed consequatur blanditiis. Ut rerum explicabo a sapiente aliquid quis enim enim. Et eum voluptas illum. Cum corporis rerum voluptas officiis voluptas eius est.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(442, 'Dolores qui voluptatem ut quod. Sit explicabo fuga et adipisci. Quia veritatis commodi est nihil eaque. Fugiat molestiae quasi dolore iste natus quod consequatur.', 'Debitis consectetur similique odit dolor necessitatibus atque dolor et. Nobis maxime est est porro porro.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(443, 'Culpa ratione pariatur laudantium voluptate aut et assumenda. Tenetur adipisci velit veritatis enim corrupti sit et. Provident dolores sapiente corrupti sit nihil.', 'Officiis ut quibusdam aut omnis. Veritatis consequuntur voluptatem sit. Sunt libero et laudantium iure dolores. Temporibus esse et cum laudantium eius quis ut.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(444, 'Et culpa odio consequatur minus minus veniam. Qui enim vel voluptatem quis. Et corporis tenetur eaque cumque voluptas deleniti. Porro asperiores beatae commodi aliquid sit velit quia quas.', 'Animi ut in quibusdam. Id similique libero ut perspiciatis eos fuga. Distinctio cum omnis vel eum.', '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(445, 'Omnis qui laborum quia quod pariatur enim accusantium sunt. Et in nihil facilis incidunt. Soluta eos qui vitae nobis.', 'Culpa reprehenderit aperiam provident sapiente aut quaerat sint. Animi non id necessitatibus rerum quis iure.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(446, 'Quod numquam et tempore qui veniam magnam. Quia recusandae dolorem minus doloremque. Omnis illo maxime optio nulla fugiat voluptates. Sunt minus ea quaerat occaecati quibusdam quae.', 'Porro dolor corrupti sed quia rerum et fuga. Perspiciatis nam ut nam nesciunt. Placeat quis quod aperiam. Quae voluptas ut unde quibusdam voluptatem iure doloribus.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(447, 'Ipsam magni culpa dolores maxime reiciendis molestias. Quasi veritatis illum ratione rerum quas vel in.', 'Quidem cum corrupti suscipit repellendus est. Atque omnis quae molestias possimus a consequuntur. Deserunt eaque harum vitae dolore iste qui voluptatum minima. Sit voluptatem fuga quae perferendis.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(448, 'In eos officia repellat. Minus quod magni hic id culpa voluptate alias aut. Ut adipisci voluptatem tempore amet. Consequatur neque aut aut.', 'Ut deserunt corrupti rem non enim illum nobis. Ea dolorem beatae harum aliquam et et eum nam. Nisi praesentium molestiae labore. Corporis velit in saepe. Pariatur aut enim doloribus sed.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(449, 'Aut deserunt et nisi et. Sunt sit quasi reiciendis eius est. Eius enim optio velit quia. Fugit id necessitatibus nostrum illo rerum sint sunt ipsam. In optio cupiditate et ea quia repudiandae et. Qui reiciendis eos eum a et doloribus distinctio dolorum.', 'Rerum architecto sunt ut quo dicta. Consequatur ducimus est totam commodi eius aut. Optio eius ratione labore repudiandae.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(450, 'Aliquid illum consectetur sunt velit vel modi non. Maiores est sit repellat veniam amet enim. Enim optio aperiam minima alias. Tenetur eos odit similique. Possimus accusantium autem quos ut dolorem magni doloribus fugiat.', 'Repudiandae qui ut et voluptatibus architecto et sunt. Qui numquam rerum minus adipisci. Nobis a excepturi pariatur culpa. Qui et reiciendis et illo odio a quia.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(451, 'Eum rerum nobis aut molestiae saepe. Aut voluptatem quia rerum ut. Sunt eius voluptas laboriosam qui. Aut laborum officia saepe beatae nulla placeat. Voluptatem ut unde deleniti nihil quasi voluptas aliquid. Eligendi non est cum quisquam nisi.', 'Ut numquam voluptates impedit rerum. Perspiciatis eum ab vero facere nobis necessitatibus quisquam. Dolor molestiae iure voluptas dolores qui numquam veniam quos.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(452, 'Doloribus natus excepturi facere natus. Voluptas officiis blanditiis neque vitae delectus natus.', 'Dolore voluptatem libero sed unde. Et occaecati velit ut laboriosam. Id sit voluptatem sapiente.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(453, 'Voluptates velit nostrum cum beatae ut quo modi. Praesentium dicta eligendi atque alias vero est. Ipsam ut et ut sequi aliquam deserunt ea.', 'Et voluptas blanditiis molestias laudantium. Sunt incidunt qui magni quo velit. Ea alias impedit vel officiis et qui quis. Adipisci quo illo necessitatibus qui sapiente quas et ullam.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(454, 'Sequi fugit quia iste error. Odit excepturi dicta quia ut odio. Maiores doloremque laboriosam consequatur incidunt ab. Quisquam ipsum ex dolor et esse in.', 'Enim nemo animi quia voluptatem ea. Natus nihil laborum voluptas blanditiis quia iure quo. Non ea est voluptatem magni eveniet. Sint libero cumque hic ut ratione.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(455, 'Ea odit ducimus voluptatibus rem vitae ea. Vel omnis sed qui rerum nihil ea. Qui ut ut sit qui omnis numquam aliquid. Quisquam aut quasi fuga possimus molestias. Sapiente et voluptate expedita consequatur aliquam. Adipisci tempora aut et assumenda.', 'Et dolor asperiores iste praesentium officia maxime. Non non veritatis eveniet fuga necessitatibus sint quia animi. Beatae expedita quam perspiciatis natus. Qui facere esse iure voluptatum aut.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(456, 'Aut explicabo provident ex cumque harum illo cupiditate enim. Adipisci corporis fuga repellat eligendi aliquid voluptatum nihil. Hic unde fuga aliquam consequuntur dolorem cupiditate. Ratione molestias aut quisquam quia est quam adipisci.', 'Sunt odio velit repellendus. Pariatur porro distinctio nemo molestias placeat iusto. Perspiciatis consequatur consequatur nihil est.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(457, 'Vero et cumque molestias ratione quaerat quam. Alias repudiandae a libero perspiciatis. Eligendi laudantium commodi officiis et. Quasi qui accusamus tenetur non.', 'Quis magni temporibus tenetur ipsam facere voluptatem quia deleniti. Aliquam tempora voluptas repellat assumenda non qui aut. Illo quibusdam accusamus provident est aspernatur voluptatum.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(458, 'Quisquam iure officiis est accusamus explicabo. Nisi nisi totam aut autem et quo. Ea laboriosam alias quia nobis.', 'Voluptate debitis ad consectetur nam. Autem provident officia qui. Ad iure omnis dolores et. Voluptatem quo enim qui molestiae tenetur nihil sapiente rem.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(459, 'Velit quae maiores reiciendis consectetur velit. Qui nisi fugiat nam sed nobis est aut. Dolor cum dolorem et commodi perspiciatis. Suscipit ducimus deleniti velit et ut et. Dolores rerum soluta est animi quo eligendi. Dolores ut minima earum.', 'Dolor aliquam sunt dolore consequuntur. Sunt ipsum enim enim et quidem vitae. Deleniti aut et aut reiciendis officia aut. Omnis nisi nesciunt vel provident. Ut provident deserunt magnam alias.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(460, 'Labore ea rerum sint nisi. Sit quia quas sunt autem et. Error omnis rerum repellat eum itaque repudiandae ex. Adipisci officia autem quo dolorem voluptas quis.', 'Et soluta est cum nesciunt non. Illum temporibus fuga et accusamus occaecati eum non. Dicta omnis veniam reprehenderit reprehenderit in enim rerum.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(461, 'Molestiae at mollitia adipisci suscipit quasi. Voluptatibus magni facere sapiente. Eos quis aliquid pariatur quia tenetur provident.', 'In itaque nostrum praesentium autem in fugiat. Quia a molestiae veniam asperiores. Velit dolor non voluptate omnis adipisci aut.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(462, 'Dolore sint sit ut numquam harum. Veritatis animi aut voluptatem beatae eaque ut explicabo. Enim vel maxime placeat quidem sit. Facere sit corporis amet autem incidunt occaecati accusamus et.', 'Et amet quibusdam accusamus. Id aut ipsam iusto qui cupiditate. Similique sed dolorum sit quibusdam maxime quos.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(463, 'Sint labore aut reprehenderit sed similique omnis saepe. Doloribus laudantium numquam aliquam quam reprehenderit incidunt. Error vero itaque omnis numquam dolores consequatur optio.', 'Dicta suscipit corporis odio ut similique. Incidunt velit voluptas blanditiis rerum. Hic velit deserunt velit nisi et perspiciatis.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(464, 'Accusamus accusantium quos debitis omnis aspernatur. Dolores id dolorem reiciendis nulla vitae suscipit. Qui a aspernatur ex est. Sed expedita repudiandae atque perferendis. Veritatis quod asperiores quis.', 'Nulla illo quaerat omnis. Culpa placeat aut voluptas quas fuga autem at.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(465, 'Consequatur labore voluptatem deleniti. Facilis velit perspiciatis sapiente voluptatem fuga et. Voluptatem sequi et soluta adipisci. Quo rerum nostrum aut. Qui saepe magnam omnis mollitia nostrum. Tempore quo quia distinctio vitae.', 'Est ea repellendus aliquam dolorem nisi. Velit dolor pariatur fugit rerum. Nemo vel voluptatem illo cupiditate aut.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(466, 'Repudiandae veniam aperiam animi aut asperiores. Doloribus quaerat officia accusamus et. Provident qui aperiam illo et ut illum. Reprehenderit quo inventore dolorum.', 'Omnis distinctio voluptatem quis aliquid sed. Occaecati fugiat tempore rerum consequatur velit. Tenetur minima quas debitis sint enim totam.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(467, 'Dignissimos et enim voluptatibus. Labore aspernatur qui voluptatum sed. Qui quas laudantium sequi repellendus voluptate.', 'Natus labore dolorem asperiores consequatur quia ratione. Molestiae blanditiis perferendis sed alias ratione suscipit.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(468, 'Repudiandae perspiciatis consequatur soluta quo et alias dolore. Quas eius molestiae repudiandae doloribus. Non accusantium et sit vitae. Porro incidunt quia sunt omnis ipsum magnam eum laboriosam.', 'Mollitia vitae sed beatae est quos nesciunt. Ea voluptatem velit in voluptas sunt.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(469, 'Quasi quas deserunt tempora blanditiis et. Eum sunt sed vitae et recusandae. Voluptatum blanditiis nam veritatis ad quia sequi.', 'Perspiciatis recusandae recusandae cum et eos. Vel voluptas magnam et porro qui ad iure.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(470, 'Culpa neque corrupti omnis quia. Impedit voluptas asperiores a magni et qui praesentium. Earum et rerum sed culpa perspiciatis.', 'Et placeat veritatis voluptate consectetur incidunt ut sint. Eveniet magni quisquam labore velit itaque velit nesciunt. Ut ullam et molestiae est asperiores asperiores soluta at.', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(471, 'Vero sint ullam occaecati sint. Qui animi vel aliquam id nisi ea. Reiciendis sit voluptatibus distinctio quam. Dolorem dolorem delectus excepturi rerum. Soluta consequatur mollitia autem rerum. Est quia sapiente molestiae.', 'Deleniti est consectetur mollitia. Ea accusamus dicta minus harum et est. Eveniet ipsum ut velit voluptas nobis illum itaque id.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(472, 'Rem accusantium et provident facilis voluptas autem qui. Modi suscipit voluptatem iure non et. Sint laboriosam modi expedita deserunt qui. Ut totam consequuntur iusto occaecati sunt.', 'Omnis voluptas iure perferendis et dolorem esse. Tempore et molestiae consequatur. Iusto quod id aliquid adipisci ut. Voluptate sint dolore qui necessitatibus soluta doloribus.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(473, 'Quas pariatur quia reiciendis ipsum quis itaque. Quisquam quaerat animi cumque a dolore molestiae. Eaque fugit totam dicta est consequatur.', 'Odit qui veritatis rerum vero autem quisquam. Quisquam a quisquam voluptas est. Molestiae repellat blanditiis rem necessitatibus. Voluptas sequi dolor aut aliquam ullam quia consequatur.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(474, 'Nihil dicta ut accusamus velit qui tenetur officia mollitia. Ullam molestias qui mollitia doloribus maiores distinctio et. Et dolor perspiciatis aut doloribus quam ex sint quibusdam. Odit aut amet deserunt sed nemo aut.', 'Ab nulla natus quaerat deleniti. In qui eaque ducimus in vero corporis. Ut esse eaque aut unde.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(475, 'Ipsam est quasi qui nihil voluptatem asperiores ut quia. Velit quidem asperiores et magni sint nesciunt voluptatum. Temporibus et ut voluptatem et explicabo aut omnis. Possimus occaecati est ea.', 'Dolorum expedita amet dolores sed eos dolor et laudantium. Adipisci rem repudiandae aut provident. Sunt et ad consequatur. Quidem optio eveniet error earum. Suscipit ea autem odio nostrum.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(476, 'Aperiam magni expedita voluptas. Voluptas quaerat exercitationem et possimus hic. Voluptate dolor voluptatibus atque provident ea et.', 'Dolores autem tempora nesciunt earum. Id eum molestiae earum blanditiis et deserunt. Maxime optio consectetur repudiandae molestiae. Modi corporis et iure atque. Mollitia non sed et aliquam quae.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(477, 'Nemo quis cumque quam asperiores commodi natus dolores. Quo et numquam culpa veritatis temporibus delectus qui. Odio iusto quis nihil facere asperiores voluptatem error. Eum quaerat perspiciatis dolor et odio ut.', 'Dicta ut ut iure quo nesciunt perspiciatis. Recusandae dignissimos explicabo et quidem id sapiente. Illum iure quod ea.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(478, 'Illo error quo eius consequatur. Eum voluptates recusandae saepe et quos sunt minus. Velit qui voluptatem et expedita placeat. Ut in rerum facilis perferendis.', 'Culpa accusamus tempora debitis. Iste minima aut et occaecati maiores odit non. Molestias minima voluptas eius totam. Neque modi iusto molestiae accusantium quisquam.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(479, 'Unde molestiae et autem ad quae. Unde dignissimos nobis omnis dolore ea. Quia commodi sed aut vel molestiae corrupti et. Quas minima et in facere ullam. Possimus harum aut aut repellat beatae. Magnam aspernatur eum et est qui.', 'Architecto in dolor voluptatem nemo sint sed. Omnis maxime aut sint et officia. Aut sed quisquam aut voluptatem voluptatem laborum. Velit nobis maxime doloribus ut impedit.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(480, 'Repellendus optio praesentium veniam architecto id voluptas. Et cum suscipit quia in mollitia consequatur sequi. Maxime eos ullam omnis eius. Dolorem dignissimos voluptatem occaecati harum eos.', 'Dolores minima explicabo hic est quod doloribus. Dolorum dolores inventore sit ex reiciendis rerum. Ut aut unde aut.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(481, 'Ducimus deleniti iste ipsa recusandae eius vitae nihil. Placeat rem enim velit veritatis. Odit accusantium sunt excepturi facilis nemo. Reprehenderit a sunt sint est quos qui.', 'Distinctio voluptatem non accusantium cum vel aut quae et. Omnis qui ullam aut dolor. Illum et esse cum reiciendis. Ipsum optio culpa voluptas ex odit voluptas.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(482, 'Et nihil modi ut quia unde. Eius ut dolores eveniet corrupti maxime vel consequatur. Hic excepturi nemo aspernatur et voluptatem hic quos. Quaerat et illum earum ab vel. Saepe explicabo cum tenetur qui aut eum. Rerum cumque quos quibusdam qui labore ut.', 'Error tempora aut eum. Necessitatibus impedit nam qui aliquam non in. Eligendi suscipit asperiores officiis voluptatem culpa soluta et.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(483, 'Quod commodi exercitationem et illum. Nostrum quisquam est sint eligendi ab enim. Aliquid voluptate doloremque iure quam qui velit repudiandae ut. Ut asperiores laborum rem similique vel repudiandae incidunt.', 'Sit laboriosam officiis porro eum architecto qui. Quam odio architecto repellendus eveniet accusantium perspiciatis. Nobis numquam et odit culpa. Et omnis sed esse consequatur deleniti.', '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(484, 'Explicabo accusamus rerum omnis est. Sit temporibus unde possimus aspernatur ducimus dolor. Ullam cum nihil veritatis illum laboriosam. Aperiam corrupti at delectus dolor voluptatum at reprehenderit. Molestiae rerum distinctio debitis eum facilis.', 'Voluptate nostrum id reiciendis aliquid maiores. Perspiciatis quo et aliquam. Repellendus ducimus necessitatibus quisquam voluptatem ipsam dicta rerum laborum.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(485, 'Eum doloremque officia excepturi alias voluptatem qui. Alias praesentium praesentium eum debitis exercitationem esse placeat quia. Odio tenetur facilis et et voluptatum odio consequuntur. Eum animi voluptas sed ratione culpa error labore.', 'Nihil et a temporibus deserunt voluptatem molestias libero. Ut consequatur possimus rem ea aut est. Id necessitatibus ipsam dolorem facilis.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(486, 'Quod odio facilis voluptatem suscipit. Sint tempora ut deserunt iure explicabo facere cupiditate. Quisquam sit ipsa molestiae.', 'Natus id corporis aliquam veniam officia. Et harum eum eius. Aliquam voluptate quis ducimus ex.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(487, 'Qui provident ab ea quam. Quis aut ut unde saepe quis. Possimus animi ut distinctio sit velit. Est velit sed tenetur sint laboriosam nihil.', 'Excepturi a quia aut porro accusamus. Et quisquam nihil dolore commodi mollitia. Quia quam consequuntur error pariatur nobis est. Praesentium non quia delectus et at.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(488, 'Delectus quia excepturi voluptate consequatur maiores voluptatem nobis. Vel est corrupti dolor qui odio qui est.', 'Vitae et dolorem eveniet nesciunt pariatur odio. Quia vitae rerum minima laborum quas illum. Maxime sit aspernatur deserunt ut nihil aut consectetur deserunt.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(489, 'Voluptas et quis ex impedit nostrum autem. Exercitationem quos error quam quis. Amet aperiam qui rerum omnis autem dolores. Dolores laudantium labore et veritatis sequi. Cum dolor sunt velit odit unde.', 'Qui omnis minima voluptas officiis ut sunt et. Tenetur voluptatem occaecati et eius sint consequuntur optio. Eum ipsum modi corporis dolore et et harum.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(490, 'Officiis eum possimus et iusto distinctio quam doloremque. Occaecati quia esse sed. Vel molestiae ut porro eos.', 'Omnis voluptatem quod perspiciatis delectus. Et est earum quia distinctio iusto molestiae qui aut. Magni rerum id hic.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(491, 'Aut quis tempore dolores adipisci. Ut nemo incidunt quae voluptatibus consequatur temporibus aut. Aliquam et adipisci dolore et qui praesentium cupiditate. Temporibus perferendis hic quam architecto quis et voluptas.', 'Modi quia deleniti aliquam eveniet nesciunt sed omnis ut. Animi et at omnis voluptas dolorem ratione blanditiis iusto. Veritatis nisi sapiente ea corporis est quibusdam.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(492, 'Dolores voluptate eaque necessitatibus repellat. Dolorum ab rem nulla nobis quia iste harum. Sit necessitatibus voluptatibus magnam est sed nobis. Accusantium et sint qui magnam odio rem.', 'Exercitationem qui aliquid autem suscipit. Doloremque ex provident rerum enim velit corporis repellendus. Velit qui amet sed perferendis.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(493, 'Earum minus mollitia in dolorem. Perspiciatis sapiente ut asperiores. Sunt et ea quia sit rerum eum nisi neque. Aut est laudantium dignissimos qui non ea omnis dolorum.', 'Iste aut commodi aliquid dolor. Deserunt esse quidem sunt et. At nisi ut esse delectus enim. Est culpa molestiae quasi sunt est. Cum nobis rerum sapiente. Autem libero rerum temporibus deserunt.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(494, 'Pariatur nemo dolores quod asperiores. Sed illum ut qui nihil. Voluptas eligendi sit nostrum facilis minima. Quos aut et sapiente error sequi consequatur.', 'Dicta earum et unde omnis impedit est. Qui esse sit aperiam. Reprehenderit aut commodi enim qui inventore laudantium magnam iste.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(495, 'Atque debitis sed dolores itaque. Praesentium sunt qui inventore est autem deserunt. Atque sunt sequi at et expedita quia accusamus corrupti.', 'Animi repellat quia dolore qui. Dolorem dolor doloremque eos ad quo velit. Cumque voluptas sapiente unde quae quidem qui reprehenderit repudiandae. Sit nemo et et ipsa pariatur veniam.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(496, 'Ut similique minus sit dicta odio quia eum hic. Officiis et quasi odit dolorem illum qui velit. Nesciunt at et cum. Ipsa exercitationem eos culpa exercitationem. Laboriosam repellendus neque molestias aut nisi non et. Dolorem explicabo quam illo quia.', 'Iste illum corporis et consequatur nihil nam deleniti dicta. Voluptatum perferendis corrupti deleniti. Voluptatibus soluta ipsum enim iste cumque voluptatum qui.', '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(497, 'Qui officia animi qui modi doloribus quis. Voluptatum quidem quidem illo. Omnis a voluptatum sed quis hic vel et.', 'Suscipit adipisci porro sed sunt rerum assumenda expedita. Quo placeat maiores fugit quia ad et sit. Voluptatem quis sit sed ex id aut. Ullam qui dicta laboriosam sint non.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(498, 'Suscipit aut itaque modi ut. Sed cumque voluptatum quis voluptates saepe id.', 'Aut provident velit commodi beatae officia sapiente earum. Est iste officiis corrupti et quis assumenda. Distinctio quia consectetur aut repudiandae.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(499, 'Quidem voluptatem ut sit voluptas eaque eum odio. Vero reprehenderit quae quo. Accusantium consectetur culpa totam officia. Recusandae voluptates nihil quo non fuga. Ea ipsum amet praesentium ab rerum est molestiae. Ut dolores repellendus est rerum.', 'Quis occaecati inventore enim ullam ex optio rem nemo. Quo at reiciendis odio id magni. Exercitationem qui maiores ducimus facilis recusandae dolor. Asperiores qui aliquam quos.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(500, 'Aut ex deserunt libero ut sit. Alias eius quos voluptatibus maiores quisquam libero. Et cumque sint est autem aut qui explicabo.', 'Corrupti exercitationem itaque tempore. Officia fugiat est consequatur qui eaque. Dolores rem maiores praesentium ducimus nostrum. Labore sit optio dolorem perferendis nulla provident.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(501, 'At aspernatur tempore doloribus ipsam. Modi et deleniti ipsa quos autem aspernatur.', 'Hic omnis sapiente aut unde ratione voluptatem. Aut voluptas reiciendis placeat quas. Suscipit magnam quia sit et aut suscipit. Incidunt aut et tempora repudiandae eos dignissimos et.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(502, 'Excepturi velit non et optio dolor quam. Eaque pariatur molestiae commodi ad debitis. Sunt neque ut facere omnis animi ea. Animi odio officia sit dolorum veritatis qui mollitia.', 'Ea ea modi sit veniam. Earum autem quis reiciendis. Qui eum esse nihil. Repellat in ullam ut et.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(503, 'Officiis minus optio quis. In sit blanditiis atque qui alias. Repellat ratione delectus voluptatibus cum nam eius voluptate aut. Non velit voluptatem nihil placeat vitae reprehenderit.', 'Nam et ipsum libero rerum totam maxime. Necessitatibus cupiditate dolores et quidem et quia iste repudiandae. Impedit voluptates vel molestiae cum possimus nemo.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(504, 'Et molestiae non dicta blanditiis ab ipsam. Asperiores nulla itaque fugit ratione totam. Dicta labore odio aspernatur rerum accusantium. Beatae quo dolores aperiam quia. Illum sapiente architecto non. Atque laudantium tenetur aut autem sed.', 'Perferendis ratione eos nesciunt qui esse sapiente enim. In impedit placeat est pariatur quia doloremque et. Laborum similique maiores ea sint quam fuga nobis.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(505, 'Omnis excepturi ipsum laborum ut. Animi eius officia nesciunt quod eligendi ipsam. Et pariatur et qui dolores beatae cum laborum.', 'Quaerat in omnis sint delectus cumque. Nostrum sapiente molestiae in ut sequi placeat. Unde a sunt hic consequatur molestiae. Labore eos deleniti reprehenderit dolores et.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(506, 'Atque iure amet cum deleniti rerum autem. Porro iusto esse ratione. Tempore dolore consectetur earum. Nesciunt cumque veniam mollitia nam illo iste.', 'Sint repellat quas qui minima. Id assumenda natus quam iusto id.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(507, 'Voluptas magni assumenda eos. Voluptas excepturi veritatis aliquam est aut alias. Corporis maiores sunt commodi. Laudantium quidem voluptatum quas facere voluptate minus. Sunt aliquid incidunt aut.', 'Ab deleniti quaerat voluptatum. Cum fugiat omnis et non perspiciatis minus. Sint explicabo et aut aut. Voluptate blanditiis voluptatem et et voluptas.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(508, 'Iste consequatur eum eius maiores odit. Quos magni corrupti adipisci quas veniam. Sunt hic excepturi odit exercitationem sunt odit sequi sint. Eligendi sit consequuntur hic veniam accusantium doloribus. Adipisci nam exercitationem quae.', 'Delectus ut ratione sit amet quia et. Id repellendus et ut rerum ut consectetur dolores cumque. Ut et odit explicabo tempora quia a quis. Totam earum fugit cupiditate.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(509, 'Omnis rerum doloremque amet et. Tempore fugiat et delectus maxime voluptatem id autem. Recusandae expedita fuga aut aliquam et amet corporis. Occaecati reprehenderit voluptas occaecati.', 'Et sunt iusto fugiat nulla. Nemo est maxime rerum consequuntur fugiat ipsa. Exercitationem est veritatis et omnis placeat quasi neque. Dolor fuga adipisci provident.', '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(510, 'Dolorum harum molestiae non inventore labore fugiat aut. Atque totam omnis esse quo est voluptas eius. Nihil dicta soluta sit. Sit est quos non rerum expedita quia.', 'Rerum non velit eveniet cupiditate maxime. Fugiat quos quia quam dolore enim. Voluptatem delectus officia quidem necessitatibus explicabo voluptatem. Aut quod dolor qui.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(511, 'Iure aut dolores voluptas impedit. Sed ut unde mollitia numquam recusandae qui et enim. Itaque dolores possimus ad iusto optio quia nisi. Fugit distinctio est adipisci velit ea cum fugiat. Est voluptates dicta id cum quibusdam omnis.', 'Fugit et velit voluptatem blanditiis corporis consequuntur. Odit aut veniam esse iure.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(512, 'Dicta optio dignissimos ut eum veritatis. Aliquid nemo hic nihil ducimus sit pariatur voluptatem. Vitae fugit vel quia quis similique sit. Explicabo assumenda repellendus quo quidem et voluptatem.', 'Iusto officia quaerat nobis labore explicabo id. Adipisci repudiandae pariatur quos veritatis. Omnis id molestiae commodi.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(513, 'Molestiae quaerat labore est ratione et. Eum maiores nesciunt maxime veritatis fugit veritatis doloremque. Sed nihil sunt iste. Quidem tempora eligendi in. Aperiam minus harum optio modi. Sed quaerat voluptatem cumque corporis.', 'Excepturi ex perspiciatis id voluptatum fuga omnis corporis quo. Assumenda eius quia est. Maiores iste qui minima sint quos cupiditate porro dolores. At voluptatum voluptas distinctio ullam.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(514, 'Quam iusto vel quidem sed. Dignissimos necessitatibus voluptatum laborum veniam omnis et. Minima sit voluptatem et perferendis error. Incidunt dignissimos nihil repudiandae voluptatibus.', 'Ut molestias quaerat iure eveniet provident. Doloremque expedita qui ut. Sequi sint et minima maxime ut aliquid rerum asperiores. Nesciunt rerum sint est.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(515, 'Dolor eos inventore minima tenetur et. Eveniet ipsam praesentium tempora est debitis qui eos. Totam accusantium omnis voluptates et eius consequatur. Eum ratione voluptatibus iste ratione quos dolore.', 'Non nemo temporibus est aut tenetur. Quibusdam et eum est enim qui totam. Aut optio reprehenderit inventore ex.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(516, 'Assumenda rerum incidunt autem quisquam vel. Fuga porro voluptatem et aut. Quia illo ducimus rerum blanditiis consectetur est quis.', 'Ut et sint quibusdam sequi explicabo. Aut omnis tempore nam et in dolor aut. Blanditiis totam commodi officiis aut.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(517, 'Aut necessitatibus eius animi deserunt est voluptates. Hic illo voluptatem corrupti quas. Fugiat voluptatem ut vel et est maxime iure. Nostrum delectus alias impedit aspernatur.', 'Et deserunt eaque provident ut. Atque magnam vero aut qui molestiae similique necessitatibus. Aut est impedit id. Rem sunt rerum ad voluptate molestias.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(518, 'Facilis voluptatem sed voluptatem excepturi id et. Nulla reprehenderit vitae et non repellat ullam velit. Sit consectetur atque est blanditiis. Minima sit sed quis deleniti laboriosam maiores inventore.', 'Vero dolor odit aspernatur non. Illum impedit blanditiis aut et. Fugit rerum quia maiores et et omnis. Provident facilis quos rerum assumenda aut sunt quia.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(519, 'Provident aliquam ut dolor in vel est reprehenderit. Labore rerum nobis illum itaque similique qui. Officiis at recusandae possimus fugit ut fugit tenetur.', 'Omnis optio tempora sint accusantium ipsa. At nisi nesciunt itaque repellat est eaque itaque. Voluptates aspernatur quia non at.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(520, 'Natus facilis nulla et reprehenderit ut et est. Et et aut molestiae aperiam vitae provident ut.', 'Quis ipsum recusandae alias quod quas. Pariatur odio nihil a et distinctio mollitia nemo. Ea perspiciatis reprehenderit accusamus. Quo labore quo sint mollitia corrupti.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(521, 'Incidunt quasi recusandae provident voluptate doloremque illo. Atque vitae facilis molestias deleniti. Delectus sed sed ducimus iste. Possimus qui aspernatur qui qui.', 'Et dolorem atque iure enim ut. Sint ut voluptatem quaerat modi quisquam quod. Incidunt quia et debitis sed dolore. Earum molestiae facilis quo distinctio.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(522, 'Quis in ut inventore eligendi qui doloribus. Tempore et ut pariatur numquam libero eveniet corrupti.', 'Odit beatae odit non rem nesciunt blanditiis qui. Voluptatem velit cupiditate nostrum laborum. Sint aut ut provident unde dolorum temporibus sed.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(523, 'Facilis aut est optio est aut nihil. Laudantium ut aspernatur velit odit blanditiis soluta. Dolores corporis quia voluptatem omnis esse officiis. Eius dicta quo aliquid aut temporibus. Minus iusto numquam et ullam. Asperiores vitae perferendis et.', 'Quis et rerum cupiditate omnis id quas et. At facilis qui earum fugiat voluptas reiciendis. Provident provident accusantium suscipit pariatur. Quas eveniet omnis quasi voluptatem omnis.', '2021-11-20 14:48:02', '2021-11-20 14:48:02'),
(524, 'Quaerat excepturi consequatur consequuntur vel laudantium natus. Ratione non sint pariatur velit. Mollitia totam aut provident ea fugiat voluptatem voluptas consectetur.', 'Excepturi qui accusamus quo repellendus sed commodi consequuntur. Aliquam aut qui illum repudiandae mollitia. Quidem veniam eos aliquam error.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(525, 'Ex in molestias provident sunt voluptas. Reprehenderit inventore non consequatur voluptatum quo iure qui. Sit sit corporis omnis nam aliquid beatae necessitatibus. Sed dolore sit qui a voluptatem.', 'Enim voluptatibus natus quod dicta. Deleniti sunt eum temporibus voluptate. Facilis ad modi et quibusdam accusantium sint.', '2021-11-20 14:48:03', '2021-11-20 14:48:03');
INSERT INTO `modeles_recus` (`id`, `nom`, `contenu`, `created_at`, `updated_at`) VALUES
(526, 'Rerum quis ut voluptas libero maiores non odio. Nostrum quia nulla vitae. Ut eius placeat laboriosam mollitia consequuntur molestiae. Non magni maxime exercitationem sunt quia facilis aut. Autem asperiores molestiae qui animi illum eius cupiditate.', 'In ducimus ab exercitationem repudiandae qui et facilis. Quidem ab quia minima facilis numquam. Debitis magnam nobis nemo.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(527, 'Nihil perspiciatis consequatur magnam et non ut consequatur. Voluptatibus excepturi neque iure vel. Necessitatibus numquam eum reprehenderit ipsum.', 'Tempora non fugit et nulla. Alias natus deleniti corporis eos hic. Commodi ut similique hic ut.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(528, 'Incidunt a dolorem possimus reiciendis tenetur nihil accusantium placeat. Dignissimos et maiores magni dolorum. Sunt quasi quis dolores saepe in ipsa occaecati est.', 'Eius sed quasi voluptatem. Qui delectus asperiores et quis quasi. Fuga repudiandae facilis qui itaque libero.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(529, 'Iure minus culpa aspernatur voluptates quod quis. Ipsam omnis unde nulla soluta quod. Impedit culpa quia ratione enim accusantium.', 'Debitis autem est sed ducimus. Et culpa architecto sit sunt labore omnis. Velit quia saepe numquam maxime ea aut et. Maiores deleniti eum excepturi sed illo neque.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(530, 'Qui eaque officiis praesentium cupiditate. Minus quaerat beatae iusto molestiae odio necessitatibus ut. Facilis non totam ducimus odit dolor ipsam optio. Blanditiis reiciendis et vel fugit.', 'Qui explicabo quia minima quia molestiae blanditiis aperiam. Nostrum tempora quam sed ea quam. Unde non esse esse rem qui laborum est. Quidem sed sed quisquam.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(531, 'Ratione nam asperiores ad ad dolor fugit enim. Nostrum velit fugiat enim ut saepe. Sit fugit quis corrupti cumque atque est. Dolore quo cum doloribus accusantium culpa sed eum et.', 'Eaque modi ut dolor nostrum molestiae architecto. Aut natus perferendis aut quos excepturi maiores numquam. Eum omnis hic tenetur.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(532, 'Id fugiat saepe quidem. Quaerat officia maxime voluptates in. Repellendus consequatur et nobis nihil vel dolores officiis.', 'Expedita quia magni id sint sed. Sunt ducimus quam sunt blanditiis aspernatur quos. Aperiam vitae ut dicta enim quo dolor magni. Dolorem qui sit nostrum.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(533, 'Porro recusandae cupiditate autem voluptatem iure. Minus ut similique cupiditate ipsa. Voluptates provident provident enim quod natus dolores consectetur illo.', 'Ipsum aperiam quia maiores. Maxime et sit hic sed sunt vel blanditiis. Natus excepturi eveniet voluptatem dolor. Ut voluptas ad consequatur iusto est nobis quod.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(534, 'Inventore ea sint culpa ipsum temporibus architecto. Ut id vitae numquam dolorem temporibus ab sint. Autem iste optio molestias consequuntur. Quo magnam aspernatur iste aliquid.', 'Qui sit voluptatem assumenda sint libero. Tempora est doloremque delectus voluptas.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(535, 'Nemo nulla debitis hic maxime sit sit tempora voluptatum. Quos doloribus voluptate animi modi dicta exercitationem quidem. Deserunt rem aliquid mollitia laboriosam dolores.', 'Nostrum quae quo ea illum amet. Et aspernatur cum voluptates qui quis. Facere possimus quia ullam nam sint.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(536, 'Perspiciatis quis beatae incidunt facere non qui ut. Quo vel et doloremque et. Error reprehenderit facilis voluptas aperiam. Dolor cupiditate voluptatum inventore voluptatem impedit perferendis. Aspernatur nobis nemo quia assumenda.', 'Iusto ut fugit quo eum saepe perspiciatis. Quos autem voluptatibus temporibus veritatis vitae pariatur. Aliquam vero dolor vero aliquid aut eos pariatur. Error fugit consequatur sequi incidunt.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(537, 'Beatae quo quod et quo et fugit. Est voluptates explicabo corrupti consectetur molestias eaque asperiores. Earum et amet consequatur nihil repudiandae perferendis.', 'Est et ipsam voluptatem eaque. Et blanditiis repudiandae culpa consequuntur iste cupiditate a unde. Quos veniam velit et veniam maiores non reprehenderit qui.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(538, 'Odio totam qui veniam sint illum architecto. Maiores repellat cumque accusantium eaque exercitationem molestiae qui est. Reprehenderit voluptatem voluptates alias nostrum sint et a accusamus. Eos id eos sunt qui qui laborum.', 'Voluptatem accusantium libero hic error. Dolor qui dolorem autem velit eveniet possimus a.', '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(539, 'Rerum aliquid eligendi magni placeat. Sunt ab saepe aut sed sed. Voluptatem et accusantium aspernatur omnis natus nostrum suscipit sed. Fuga tenetur in fuga accusantium est.', 'Et voluptatem illum sapiente aliquam aut et. Perferendis quaerat fuga aut culpa consequatur. Iure quae nihil esse autem laborum quo deserunt facilis.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(540, 'Nesciunt veritatis ab fuga numquam voluptatum. Temporibus asperiores quae deserunt qui ut. Debitis odio ut occaecati fugiat. Modi autem delectus aperiam consequatur velit accusantium saepe.', 'Tenetur quae id in architecto dolorum. Blanditiis distinctio debitis ut odit sed voluptatem.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(541, 'Dolores nobis quia corporis assumenda itaque hic similique earum. Eveniet aliquid qui qui accusamus. Ut deleniti laborum tempore provident et. Vel cum quasi ut iste enim.', 'Quisquam et voluptatem dolores soluta. Aperiam totam pariatur quis ad nihil et. Ipsum et impedit deleniti incidunt aliquam et molestiae. Voluptatem labore esse consequatur dolores assumenda a.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(542, 'Sit rem et quaerat rerum facilis quia assumenda. Voluptas et aut consequuntur et neque atque officia nobis. Quis suscipit quo ducimus eveniet. Maxime reiciendis distinctio rem quibusdam est sed. Architecto eligendi vel consequuntur laboriosam.', 'Delectus sint nostrum eum sit vitae illo. Excepturi inventore mollitia est rerum ipsa aut labore eius. Eos enim perferendis quisquam sequi. Voluptas quia ut in sint voluptas eum.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(543, 'Aut perferendis reiciendis nihil numquam iusto. Voluptatem a aut mollitia voluptas nostrum exercitationem. Reiciendis et error qui tenetur. Nihil voluptatem ipsum aliquam deleniti optio.', 'Rerum eveniet rerum sequi ipsam nemo. Quasi ducimus accusantium ut. Odio qui ipsam deserunt dolorem et deserunt. Quo omnis minus sint placeat.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(544, 'Et sapiente ea impedit molestiae. Autem praesentium et nemo. Vel et magni incidunt nisi natus dolorem dicta. Enim quae et dolorem ea earum.', 'Maiores praesentium repellat eum harum sed odio maxime consequatur. Minima illum illum cupiditate ut neque dolores suscipit. Ea consequuntur officia tempore id. Architecto qui unde ipsa qui aut.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(545, 'Consequatur iusto unde non ex rerum numquam. Suscipit error est odio nihil aspernatur. Sunt aut nemo aut recusandae voluptatem enim ipsam. Omnis ex sit totam eos culpa dignissimos labore unde.', 'Fuga cupiditate sequi repudiandae temporibus cum. Nulla omnis ducimus eligendi. Sequi rerum iste libero tempore saepe aspernatur. Voluptatem modi sit minus cum quia.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(546, 'Ut ut eligendi quis ullam. Ea debitis cum laboriosam velit sit. Saepe deserunt tempore quia architecto. Fuga qui dolor voluptatem culpa. Possimus sit cumque eius asperiores id. Voluptas ea quis ut et voluptatem quaerat. Ut cumque voluptas sunt ipsam.', 'Reprehenderit alias laboriosam iste. Consequatur quia nostrum debitis culpa.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(547, 'Architecto sint ut vitae ut. Architecto et praesentium consequatur illo facilis nihil. Nisi est similique expedita et. Voluptates et odit est. Nostrum deserunt laboriosam quo eveniet. Eos omnis eligendi voluptas ipsum veniam.', 'Corporis enim quae quae velit error ea. Temporibus dolorem facilis magnam non. Sed architecto totam inventore ea.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(548, 'Debitis aperiam autem consequuntur doloribus eligendi. Ea debitis deserunt numquam. Incidunt officia alias sint officia eveniet expedita assumenda inventore.', 'Quidem eum quam quo omnis voluptas et earum. Explicabo quas qui maxime et sint sint. Vitae voluptatem non aut eos nihil. Qui et saepe doloribus esse explicabo.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(549, 'Debitis tenetur distinctio tempore facere ea at quia. Harum in repudiandae repellendus enim. Et officiis eveniet totam est similique. Non provident nulla repellendus asperiores itaque laboriosam.', 'Sit soluta quo maiores temporibus est quaerat voluptatibus. Aperiam beatae commodi quia ea magni tempora et. Adipisci qui est sequi occaecati. Sed qui quidem dolorem error. Unde qui eius animi odit.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(550, 'Molestiae rem quibusdam id magni deleniti laborum velit. Consequatur aut debitis doloremque consequatur non. Saepe consequuntur et maiores nam.', 'Sunt nihil non ut est quia distinctio in. Vel autem numquam voluptatem delectus asperiores provident ut voluptatibus. Explicabo veniam quia quos molestias. Amet recusandae hic laborum saepe.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(551, 'Consequatur exercitationem suscipit aut. Voluptas quos suscipit molestiae accusamus aspernatur. Minima et voluptates quis cum quae.', 'Recusandae debitis et sint repudiandae. Temporibus inventore ut dolore necessitatibus veniam. Et qui aliquid cumque voluptate odio iste.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(552, 'Quod laudantium expedita dolorum dolorem rerum quia maiores. Ut nisi enim aliquam nam. Mollitia enim ut est esse voluptates dolorem voluptatem earum. Beatae voluptates dolorem magnam.', 'Rerum aspernatur facere at delectus et. Provident ad eos ut vel cum atque. Sint ipsam consequatur sit corporis. Unde dolorem nemo nulla quia voluptatem consequatur non et.', '2021-11-20 14:48:04', '2021-11-20 14:48:04'),
(553, 'Ut accusamus et inventore animi. Odit repellendus nam quibusdam ipsa.', 'Omnis provident aliquid molestiae aut nulla voluptatem. Blanditiis itaque excepturi repudiandae dolorem totam porro maiores.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(554, 'Nostrum consequatur sint reiciendis repudiandae voluptas sunt praesentium ipsam. Aut iusto quos voluptatem id quod autem. Omnis perferendis ut qui.', 'Maiores rerum nam animi aut quia est sunt. Aut fuga dolores non. Facilis magni ut in numquam libero quo nihil eveniet.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(555, 'Iure sequi ratione magni voluptas. Tempore sed atque ut temporibus. Eos ea rerum unde molestiae corporis.', 'Et eum assumenda animi quia mollitia. Aut asperiores id nihil. Error voluptate eveniet ut vel et veniam est. Consequatur id quia cum laborum eum voluptas.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(556, 'Similique labore recusandae dolor qui. Nemo beatae aliquam iusto porro voluptatem. Voluptas fugit tenetur laboriosam aut. Omnis qui assumenda quod laboriosam.', 'Sunt velit natus veniam quis est et. Fugit veniam fugit eos rerum aut. Quaerat sed quisquam doloribus voluptatum dolores amet. Veniam omnis consequatur dolores itaque natus.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(557, 'Asperiores blanditiis qui vel illo. Praesentium corporis totam alias facilis ut. Molestiae enim cumque adipisci. Eum quos exercitationem adipisci quibusdam eveniet quas qui. Perferendis quo repellendus sint nihil et.', 'Corrupti veniam deserunt magni in accusantium molestias quia. Perferendis quis ad nulla unde consequuntur sed. Et error velit voluptatem atque reiciendis voluptatem.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(558, 'Veritatis et libero quos quisquam nisi fugit. Mollitia corporis sapiente maiores distinctio beatae necessitatibus quia. Quia autem aperiam et accusantium ratione labore.', 'Error quia magni consequatur facilis. Aut ipsam autem non corrupti. Vero amet voluptate possimus nam sed. Ipsum sunt quas ut pariatur laborum ipsum.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(559, 'Quidem consectetur consequatur autem quibusdam. Et debitis aut dolore enim explicabo sunt. Ea voluptas pariatur quia eligendi accusamus.', 'Ea voluptate non totam dolorem excepturi atque sed quas. Ipsam dolores incidunt sunt quia rerum. Consequatur sunt magni et repellendus earum. Aut nam ea quasi ipsum amet nihil fugiat vel.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(560, 'Ea culpa in molestiae officia voluptatem. Esse aut et nesciunt alias soluta ut. Debitis nostrum reprehenderit libero aperiam molestias ab.', 'Similique illo non quis quod consequatur modi. Dolore rem at reprehenderit consectetur sapiente dolore. Aut quos nobis ex sequi. Ut facilis tempore culpa quas quo ipsa accusantium.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(561, 'Assumenda beatae sit consequatur aperiam sed omnis ratione. Quo quae hic voluptatem dolores sunt nihil. Accusantium nesciunt omnis aperiam corrupti.', 'Eum autem eum vitae dolorem laudantium possimus. Ea odio qui nam fugiat dolor molestias. Dolorem voluptas dolores dolores eligendi. Temporibus culpa unde iste numquam beatae distinctio quod ex.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(562, 'Ipsa dolorem voluptates iure laboriosam non. Fuga quos cumque dolorem odio sed. Ut sequi tempora sequi. Architecto fuga repellat inventore esse quaerat. Sit quo voluptate corrupti. Odit vel deserunt est et.', 'Sit qui sint amet qui eius. Illum cum rerum quia unde hic cupiditate. Quas neque qui voluptatem quia.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(563, 'Tempore voluptas facere debitis quo. Dolores et delectus beatae et ea. Soluta nostrum debitis eum occaecati.', 'Qui excepturi cumque eveniet qui. Non sunt blanditiis recusandae ratione eligendi ratione. Voluptatem similique sit dignissimos magnam veritatis vel.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(564, 'Aut cum mollitia dolores nemo in hic. Qui ab voluptatem perspiciatis ea. Adipisci cupiditate fuga nobis.', 'Adipisci qui nihil voluptatem sed harum mollitia ipsam. Est sed consequatur sint.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(565, 'Dolor laudantium sapiente quasi laborum nam. Quo aperiam vel sit et et eum voluptas. Qui unde eos repudiandae rerum nihil. Labore dolorum corporis praesentium inventore. Atque maiores ad sit sit. Ut eos omnis autem quae rem. Eos illum nihil dolor et ea.', 'Commodi suscipit harum natus fugiat velit illo aut. Architecto vitae provident libero consequatur earum et voluptates. Minus vel velit tempore dignissimos.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(566, 'Quia tempora alias saepe enim ut repellendus inventore ipsa. Ut libero ut laudantium ut. Incidunt vero aut est. Expedita atque ut non autem.', 'Velit qui minus libero nulla. Sit officia hic et magnam ea. Labore ipsum quas eos maiores hic. Autem facere dolor assumenda ipsa tenetur et. Qui ipsa qui ut aut.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(567, 'Ut sit iusto quo et necessitatibus est. Aliquid ipsa et soluta quisquam mollitia totam consequatur. Id nulla pariatur et debitis. Corrupti vero qui sit excepturi deleniti impedit quibusdam.', 'Eos repellendus in laudantium distinctio enim. Natus placeat fugit consequuntur voluptas aperiam non sed a. Quasi blanditiis ab molestiae dolorem recusandae. Corrupti quia perspiciatis ipsam soluta.', '2021-11-20 14:48:05', '2021-11-20 14:48:05'),
(568, 'Doloremque quas nisi voluptas temporibus blanditiis iste delectus. Distinctio ducimus est perspiciatis excepturi facere aliquid est. Vel dignissimos possimus et atque voluptas deserunt quam. Error ut sit quo ut soluta sit quasi.', 'Natus facilis illum eos ut ea eum repellat. Placeat repellendus dicta et. Saepe quia rerum sint animi est est.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(569, 'Natus consectetur labore repudiandae culpa adipisci ut fugit. Soluta ad consectetur ea suscipit eos. Magnam repellat eaque magnam quae. Ipsum consequatur rerum rerum qui sequi tempora.', 'Quo et ipsam inventore. Nostrum provident recusandae voluptas et et et. Facilis culpa fugit harum iste. Et maiores ut corrupti ratione autem.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(570, 'Officiis id ut suscipit veniam deserunt similique. Est reprehenderit velit quis earum doloremque. A voluptas pariatur expedita blanditiis. Qui quam quia enim est at odio voluptas.', 'Tempora assumenda quia et. Vitae et vel aut voluptas temporibus. Incidunt provident voluptatem qui veniam.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(571, 'Non pariatur laboriosam veritatis corrupti. Voluptas nemo nihil maxime. Nobis minus numquam in recusandae. Aut error rem fugit ad aut exercitationem similique voluptate. Necessitatibus laudantium cumque deserunt veritatis.', 'Consequuntur accusamus deleniti rerum libero eos. Ratione et aut qui dolorum numquam doloremque. Ex corporis fugit cumque et. Quo recusandae necessitatibus rerum et expedita.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(572, 'Ratione perspiciatis aliquam officiis maiores eaque iste dignissimos. Modi qui non quas facilis. Error esse laboriosam necessitatibus et. Fugit veniam ea exercitationem.', 'Ut aspernatur omnis quod. Nihil et qui cupiditate reiciendis quaerat cumque. Et soluta soluta qui autem. Incidunt nulla nihil beatae ad nulla deleniti.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(573, 'Tempore dolorem nisi non autem. Vel cumque corrupti et animi nostrum blanditiis. Dicta odio maxime porro molestiae nam unde quo aspernatur. Aut non voluptatem sed id.', 'Et excepturi tempora dolorem id minima. Recusandae soluta molestiae occaecati quo laboriosam in. Qui aut autem a est consequuntur cum necessitatibus.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(574, 'Accusamus itaque enim consequatur molestiae. Sed vitae ratione aut quia necessitatibus qui minus. In voluptas quisquam distinctio qui sit. Facere quas maxime enim modi.', 'Dicta commodi corporis officia ab est cupiditate nostrum. Tempora aspernatur sunt eveniet reprehenderit quaerat dicta. Quo quae recusandae omnis voluptatem amet.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(575, 'Temporibus dolorem id ducimus dolorem in molestias consequatur. Magni sed sit quam sed. Id amet soluta est qui.', 'Illo dicta velit facere voluptates. Asperiores perferendis fugiat vitae omnis totam ducimus est. Libero suscipit nemo et enim. Inventore quos aliquam dolorem id itaque tempore.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(576, 'Ad sed aliquam doloremque sint. Nostrum voluptates illum quia animi. Rem soluta assumenda est eligendi enim ullam. Perspiciatis accusamus quisquam provident. Laborum atque eos rerum sed quia. Voluptatem et dicta sit odio qui atque.', 'Laudantium voluptas aut enim odit autem. Vero possimus animi ut necessitatibus sed voluptatem autem vel. Deleniti ad eaque animi deleniti occaecati saepe.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(577, 'Blanditiis perferendis rerum molestiae nisi fuga. Eaque in fugiat quaerat beatae veniam et recusandae. Omnis laudantium possimus qui enim debitis quis qui. Asperiores sit mollitia quia cupiditate iure.', 'Est quasi id dolorem et asperiores ex veritatis. Mollitia alias numquam omnis quis quo. Magnam velit impedit enim et. Et voluptatem voluptas et dolor.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(578, 'Temporibus enim maxime repudiandae incidunt rerum totam. Cumque voluptas corporis velit quae ut. Voluptatem libero architecto ab facere. Ipsum et perferendis omnis voluptatem sed.', 'Harum quam eaque veritatis nesciunt dicta quidem ex nesciunt. Amet libero corporis non odio nam. Veritatis atque voluptas sed fuga quae itaque.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(579, 'Et quaerat eum aperiam quo consequatur itaque. Beatae aut temporibus natus asperiores fugiat ipsa. Temporibus sed nemo quia corrupti. Aut ea vel a qui velit. Fugiat cumque repudiandae non.', 'Ipsam est ullam ut qui veritatis non. Quia odio animi odit doloremque recusandae et labore. Velit odio et deserunt illo voluptatem dolore suscipit.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(580, 'Deleniti dicta praesentium dicta id. Ea nobis sapiente sunt deleniti totam vel. Sunt non quidem et ullam hic nulla. Harum sint ut sed ut nobis et qui atque.', 'Veniam architecto veritatis vel iusto est dolorum eum. Doloribus et et consectetur sed. Labore neque reiciendis nihil vel.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(581, 'Rerum necessitatibus nemo ipsam temporibus eligendi et. Officiis architecto quo molestiae culpa omnis. Impedit quidem soluta atque facere aut corrupti numquam. Voluptas sed assumenda qui molestiae consequuntur quis.', 'Ut exercitationem natus ut est dolor ex totam velit. A enim et mollitia eum cum voluptatum est. Dolore sit voluptatem nulla ut doloremque velit sed.', '2021-11-20 14:48:06', '2021-11-20 14:48:06'),
(582, 'Velit nulla nihil sint exercitationem commodi similique. Perferendis officia repellendus harum ratione enim ea sapiente. Sit consectetur odio inventore sequi non nesciunt est. Consequatur consequatur laboriosam et id.', 'Quia quia dolor rerum hic expedita. Natus ab sed voluptas velit. Sit ab magni at aperiam consequatur sed non.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(583, 'Et ut ut rerum asperiores modi fugit maxime. Iusto sint doloremque velit culpa aperiam architecto. Provident assumenda aut ut fugit nihil cumque. Aut rem qui harum necessitatibus sequi molestiae. Minima eaque libero officiis illum iusto et.', 'Ut sit qui magnam quisquam adipisci. Eos alias amet est sunt dignissimos quia sequi impedit. Cupiditate animi vel consectetur quos culpa aut omnis voluptatum.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(584, 'Omnis deleniti vel dolores dicta. Est non eum optio et. Aut quam et error aut ut facilis ratione. Vel deleniti dicta suscipit rem esse aut temporibus.', 'Rerum repellendus sapiente quae quas. Ea quod neque dolore saepe. Expedita enim et et animi laboriosam exercitationem rerum et. Nihil labore commodi deserunt rerum.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(585, 'Explicabo sit quos dolor earum voluptatem. Blanditiis nisi facilis accusamus quo voluptatem nesciunt rerum. Provident veniam veritatis similique ratione velit. Incidunt suscipit quia qui voluptatem necessitatibus.', 'Et doloremque et autem. Magni quisquam vitae beatae cum sit adipisci sunt in. Recusandae id nihil maxime et dolores.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(586, 'Ea est enim ipsam qui error rem. Et id consequatur quibusdam natus recusandae a odit. Reprehenderit quia quasi harum sit minima est.', 'Veniam provident et totam et velit ullam nemo. Dicta et consequuntur qui voluptas atque omnis. Quis recusandae eaque magnam.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(587, 'Placeat provident adipisci et velit delectus illum est sit. Et aut eum iure omnis praesentium in. Natus vitae necessitatibus est autem perferendis rerum consequatur.', 'Ut quidem perspiciatis est est non quasi rem. Corrupti illum ipsa aut distinctio et. Fugit quia minus explicabo amet maxime facere omnis mollitia. Nulla sequi temporibus adipisci eligendi itaque.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(588, 'Similique assumenda odio eos quo libero. Et incidunt eligendi corrupti et repudiandae ut id. Ab nostrum enim blanditiis. Atque quia quo qui voluptatum unde. Est quae ut deleniti. Nulla sit blanditiis est at natus. Exercitationem eum nisi rerum ipsa.', 'Quas molestias ipsum aspernatur excepturi eligendi suscipit corrupti. Omnis sit aut sed. Ab ex omnis nemo aut. Odio dignissimos beatae omnis molestias molestiae.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(589, 'Autem hic sint qui sapiente corporis ab cupiditate. Nulla qui voluptatem quasi. Nisi ullam nihil voluptas maxime dolorem facilis quod. Qui quibusdam eligendi aut incidunt vel voluptatum.', 'Culpa itaque quibusdam corrupti non occaecati. Reprehenderit saepe modi minus iure. Consequatur et nesciunt quam asperiores. Sit unde incidunt perspiciatis consequuntur.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(590, 'Perspiciatis non necessitatibus vitae molestiae esse asperiores unde quo. Velit quia asperiores sapiente nihil vel voluptatibus et. Sed aut doloribus rerum laboriosam sit id est. Possimus deserunt excepturi sit est numquam exercitationem.', 'Reprehenderit sapiente vero aut et. Et voluptate facilis quo est amet. Doloribus quibusdam dolores expedita ut. Quaerat saepe sit quia est ipsa id sapiente.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(591, 'Necessitatibus eum voluptatibus ad at quidem. Et omnis culpa sapiente sed. Consequuntur facilis ea fugiat cumque. Velit odio officiis et eum eveniet et ratione.', 'Qui perferendis non necessitatibus quis. Voluptatem illo omnis dolores quos qui enim et. Aliquid excepturi quae voluptas velit nihil aliquid commodi.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(592, 'Voluptatem consequuntur dolor temporibus provident quod. Eos id labore fugiat quo laudantium expedita in. Illo sint vero modi sint quia.', 'Sed maiores quibusdam et ea cum. Vero suscipit alias commodi molestiae. Praesentium earum ducimus ad quos temporibus. Blanditiis culpa est minima architecto esse.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(593, 'Eos rerum laboriosam et fuga similique consequatur nam. Ab aut officia est id. Et id aut et dicta animi minima repellendus. Aut corporis ut odio itaque rerum.', 'Quo iste quasi quasi voluptatibus nisi illum eveniet. Est dolor aliquam nisi et. Mollitia et nulla enim possimus amet iure porro. Est vel non laborum fugiat et.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(594, 'Facere soluta repellat praesentium. Sit pariatur ipsa aut. Aut libero officia sint soluta ex magnam harum. Harum eaque voluptates et quae. Vel sint hic aliquid sit blanditiis consequatur.', 'Consectetur quidem quia sunt modi quo. Nesciunt ipsum voluptas eius autem. Itaque est qui eligendi hic non. Placeat ipsam numquam suscipit aut totam reiciendis.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(595, 'Voluptatem ipsum rerum sint vel voluptates voluptas exercitationem omnis. Libero consectetur in porro. Pariatur sint quis mollitia quisquam atque veritatis corrupti. Ut aut voluptas enim aut architecto aliquam odit.', 'Voluptas accusantium impedit ut ad ut quaerat. Reprehenderit nostrum qui minus expedita enim reiciendis. Ipsam dolorum veritatis dolores perferendis inventore atque fugiat.', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(596, 'Qui vel sed blanditiis id maxime qui dolorem. Id exercitationem facilis fugit quis consequatur voluptatem. Qui distinctio quia temporibus laudantium dolores nesciunt. Sunt facilis voluptas optio animi libero veritatis et facere.', 'Distinctio provident vel officia aut. Deserunt ipsum et similique et sapiente. Mollitia soluta optio aut non repudiandae. Adipisci optio odit numquam earum eius illo autem.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(597, 'Quia voluptatem qui eos adipisci numquam officiis eum. Fuga possimus cupiditate animi ea. Unde enim quisquam vel corporis. Consequatur officia saepe ut nulla fuga ut enim.', 'Et occaecati eum quo excepturi ea dolor. Soluta non quo iste enim.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(598, 'Ab quidem ducimus delectus reprehenderit nobis consequatur. Quam voluptatum corporis reprehenderit voluptas. Pariatur quae labore sapiente commodi enim dolor in. Non modi exercitationem maiores saepe et minima.', 'Earum est facilis quia in nihil in et. Non dolorum iure est reiciendis aut. Et deleniti laborum fugit et quos. Sint nesciunt officia ut unde libero.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(599, 'Ipsa accusamus aspernatur ullam fuga harum. Enim perferendis voluptatem beatae. Id sequi corrupti sit nihil.', 'Doloribus similique rerum ex nesciunt. Exercitationem natus quam beatae est earum quia. Molestiae laboriosam id ut et quis alias sint omnis.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(600, 'Id praesentium dolorem esse quia facilis vel corporis. Quibusdam nam corporis voluptas iste. Quas ratione nobis eos non voluptatum maxime. Ullam ut ut dolor eum aut aspernatur rerum.', 'Asperiores inventore consequatur repellendus aliquid et. Fuga explicabo id est ut. Voluptas pariatur excepturi in ut molestiae. Maiores sit aut sed nostrum doloribus eligendi.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(601, 'Amet ipsum distinctio minus ad. Et expedita enim pariatur consequatur nesciunt distinctio. Et repellendus quaerat necessitatibus velit.', 'Optio quod culpa qui est voluptates. Cumque dolor quia laborum unde rem. Ullam ut eum rerum veritatis suscipit.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(602, 'Omnis excepturi rerum cupiditate dignissimos omnis excepturi et earum. Non iusto voluptatem aliquid dolorem rem ab occaecati maxime. Repellendus iure assumenda libero non quae qui molestias.', 'Ut non odio omnis ex. Voluptatem hic totam magnam quia. Veniam quia officia possimus error.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(603, 'Excepturi quo aliquam tempora. Magni ipsa id facilis. Sunt et at placeat consequuntur nihil saepe ex ea. Ab rerum rerum dolor quia ut corporis eos.', 'Quod non delectus est eum. Beatae quod repellendus quidem nisi omnis occaecati nulla. Consectetur earum ullam mollitia molestiae.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(604, 'Praesentium ut sit libero ut sed. Ratione consequuntur dolores eos quasi quis quisquam pariatur. Qui commodi unde et placeat delectus.', 'Quia nisi commodi dolorum ducimus ea rerum in. Tenetur cumque dolorem velit consequatur hic iusto. Labore expedita earum veniam molestiae sint. Numquam voluptatum sit velit cumque.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(605, 'Omnis perspiciatis est assumenda ut harum et porro adipisci. Earum sunt ad voluptas laboriosam. Modi vitae nulla corrupti sapiente est. Sunt rem accusamus voluptates magnam.', 'Modi et eius laboriosam consequatur est. Ad facilis dolorem commodi maiores nemo. Ea qui enim voluptatem maxime. Dolorem soluta sit atque ut nostrum. Itaque sed sapiente minus tempora.', '2021-11-20 14:48:08', '2021-11-20 14:48:08');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Clients', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(2, 'Fournisseurs', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(3, 'Produits & Services', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(4, 'Factures', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(5, 'Devis', '2021-11-20 14:47:42', '2021-11-20 14:47:42'),
(6, 'Dépenses', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(7, 'Employes', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(8, 'Paie', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(9, 'Banques & Caisses', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(10, 'Contrats', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(11, 'Rapports', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(12, 'Journal Activités', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(13, 'Gestion Multi-Entreprise (Cabinet)', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(14, 'Mon Comptable', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(15, 'Règlements', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(16, 'Acceptation paiement enligne', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(17, 'Régles', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(18, 'Récurence (Factures, Devis, Paie)', '2021-11-20 14:47:44', '2021-11-20 14:47:44'),
(19, 'Utilisateurs', NULL, NULL),
(20, 'Abonnement', NULL, NULL),
(21, 'Infos entreprise', NULL, NULL),
(22, 'Habilitations', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module_packs`
--

CREATE TABLE `module_packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_packs`
--

INSERT INTO `module_packs` (`id`, `package_id`, `module_id`, `created_at`, `updated_at`) VALUES
(61, 12, 2, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(62, 12, 3, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(63, 12, 4, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(64, 12, 5, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(65, 12, 6, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(66, 12, 7, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(67, 12, 8, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(68, 12, 9, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(69, 12, 10, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(70, 12, 11, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(71, 12, 13, '2021-12-29 17:52:34', '2021-12-29 17:52:34'),
(72, 12, 15, '2021-12-29 17:52:41', '2021-12-29 17:52:41'),
(73, 12, 18, '2021-12-29 17:52:41', '2021-12-29 17:52:41'),
(75, 11, 1, '2022-01-03 00:33:06', '2022-01-03 00:33:06'),
(76, 11, 2, '2022-01-03 00:33:11', '2022-01-03 00:33:11'),
(77, 11, 3, '2022-01-03 00:33:15', '2022-01-03 00:33:15'),
(78, 11, 4, '2022-01-03 00:33:24', '2022-01-03 00:33:24'),
(79, 11, 5, '2022-01-03 00:33:28', '2022-01-03 00:33:28'),
(80, 11, 6, '2022-01-03 00:33:31', '2022-01-03 00:33:31'),
(81, 11, 7, '2022-01-03 00:33:35', '2022-01-03 00:33:35'),
(83, 11, 9, '2022-01-03 00:33:45', '2022-01-03 00:33:45'),
(84, 11, 10, '2022-01-03 00:33:49', '2022-01-03 00:33:49'),
(85, 11, 11, '2022-01-03 00:33:52', '2022-01-03 00:33:52'),
(86, 11, 12, '2022-01-03 00:34:02', '2022-01-03 00:34:02'),
(87, 11, 14, '2022-01-03 00:34:02', '2022-01-03 00:34:02'),
(88, 11, 19, NULL, NULL),
(89, 11, 20, NULL, NULL),
(90, 11, 21, NULL, NULL),
(91, 11, 22, NULL, NULL),
(92, 11, 15, '2022-01-03 02:34:45', '2022-01-03 02:34:45'),
(93, 11, 16, '2022-01-03 02:34:45', '2022-01-03 02:34:45'),
(94, 11, 17, '2022-01-03 02:34:45', '2022-01-03 02:34:45'),
(95, 11, 18, '2022-01-03 02:34:45', '2022-01-03 02:34:45'),
(96, 12, 12, '2022-01-08 18:38:05', '2022-01-08 18:38:05'),
(97, 12, 14, '2022-01-08 18:38:05', '2022-01-08 18:38:05'),
(98, 12, 16, '2022-01-08 18:38:05', '2022-01-08 18:38:05'),
(99, 12, 17, '2022-01-08 18:38:05', '2022-01-08 18:38:05'),
(100, 12, 1, '2022-01-08 19:12:08', '2022-01-08 19:12:08'),
(101, 12, 19, '2022-01-08 19:21:11', '2022-01-08 19:21:11'),
(102, 12, 22, '2022-01-08 19:21:11', '2022-01-08 19:21:11'),
(103, 12, 20, '2022-01-08 19:21:15', '2022-01-08 19:21:15'),
(104, 12, 21, '2022-01-08 19:21:15', '2022-01-08 19:21:15'),
(105, 13, 1, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(106, 13, 2, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(107, 13, 3, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(108, 13, 4, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(109, 13, 5, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(110, 13, 6, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(111, 13, 7, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(112, 13, 8, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(113, 13, 9, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(114, 13, 10, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(115, 13, 11, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(116, 13, 12, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(117, 13, 13, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(118, 13, 14, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(119, 13, 15, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(120, 13, 16, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(121, 13, 17, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(122, 13, 18, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(123, 13, 19, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(124, 13, 20, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(125, 13, 21, '2022-02-01 19:35:37', '2022-02-01 19:35:37'),
(126, 13, 22, '2022-02-01 19:35:37', '2022-02-01 19:35:37');

-- --------------------------------------------------------

--
-- Structure de la table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` double NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packages`
--

INSERT INTO `packages` (`id`, `nom`, `description`, `prix`, `type`, `stripe_id`, `created_at`, `updated_at`) VALUES
(11, 'Entreprise', 'r\"', 999, 'entreprise', 'price_1KFIgMCqfjPSAnLhsP5pcDOr', '2021-12-29 13:13:46', '2021-12-29 17:49:15'),
(12, 'Expert Comptable', 'Maxime ut sunt a as', 1900, 'cabinet', 'price_1KFPrPCqfjPSAnLh6uxyMYTA', '2021-12-29 13:14:30', '2021-12-29 17:48:49'),
(13, 'Gratuit', 'Profiter d\'une période d\'essai avant de payer', 0, 'entreprise', 'price_1KFPsnCqfjPSAnLhKihYjg58', '2022-01-03 20:14:16', '2022-01-03 20:14:16');

-- --------------------------------------------------------

--
-- Structure de la table `package_payments`
--

CREATE TABLE `package_payments` (
  `id` bigint(200) NOT NULL,
  `abonnement_id` int(200) NOT NULL,
  `montant` int(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `package_payments`
--

INSERT INTO `package_payments` (`id`, `abonnement_id`, `montant`, `updated_at`, `created_at`) VALUES
(1, 15, 0, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(2, 16, 0, '2022-02-01 19:16:02', '2022-02-01 19:16:02'),
(3, 17, 0, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(4, 18, 0, '2022-02-01 19:25:14', '2022-02-01 19:25:14'),
(5, 19, 0, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(6, 20, 0, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(7, 21, 0, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(8, 22, 0, '2022-02-03 12:18:48', '2022-02-03 12:18:48');

-- --------------------------------------------------------

--
-- Structure de la table `paiementsources`
--

CREATE TABLE `paiementsources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` double(8,2) NOT NULL DEFAULT 0.00,
  `numero_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiementsources`
--

INSERT INTO `paiementsources` (`id`, `entreprise_id`, `type`, `nom`, `solde`, `numero_compte`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 1, 'caisse', 'Caisse Principale', 0.00, NULL, 'default', NULL, NULL),
(2, 1, 'banque', 'Compte Caisse Epargne', 0.00, '123654323456', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paiements_modalites`
--

CREATE TABLE `paiements_modalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `nom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` int(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiements_modalites`
--

INSERT INTO `paiements_modalites` (`id`, `entreprise_id`, `nom`, `duree`, `created_at`, `updated_at`) VALUES
(1, 0, 'Immediatement', NULL, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(2, 2, 'NET 7', 7, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(3, 31, 'NET 15', 15, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(4, 33, 'NET 30', 30, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(5, 35, 'NET 60', 60, '2021-11-20 14:47:27', '2021-11-20 14:47:27'),
(171, 2, 'Net 3', 3, '2022-01-08 20:37:53', '2022-01-08 20:40:30'),
(173, 603, 'Net3', 3, '2022-01-20 16:05:40', '2022-01-20 16:05:49'),
(174, 605, 'Immediatement', 0, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(175, 605, 'Net15', 15, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(176, 605, 'Net30', 30, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(177, 607, 'Immediatement', 0, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(178, 607, 'Net15', 15, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(179, 607, 'Net30', 30, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(180, 609, 'Immediatement', 0, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(181, 609, 'Net15', 15, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(182, 609, 'Net30', 30, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(183, 610, 'Immediatement', 0, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(184, 610, 'Net15', 15, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(185, 610, 'Net30', 30, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(186, 611, 'Immediatement', 0, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(187, 611, 'Net15', 15, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(188, 611, 'Net30', 30, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(189, 612, 'Immediatement', 0, '2022-02-03 12:18:49', '2022-02-03 12:18:49'),
(190, 612, 'Net15', 15, '2022-02-03 12:18:49', '2022-02-03 12:18:49'),
(191, 612, 'Net30', 30, '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `paiements_modes`
--

CREATE TABLE `paiements_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise_id` int(20) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiements_modes`
--

INSERT INTO `paiements_modes` (`id`, `nom`, `entreprise_id`, `created_at`, `updated_at`) VALUES
(1, 'Cheque', 0, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(2, 'Virement', 1, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(3, 'Cash', 1, '2021-11-20 14:47:26', '2021-11-20 14:47:26'),
(136, 'Cash', 2, '2022-01-08 20:25:21', '2022-01-08 20:37:28'),
(137, 'ddd', 2, '2022-01-08 20:27:04', '2022-01-08 20:27:04'),
(138, 'SendWave', 2, '2022-01-09 01:49:25', '2022-01-09 01:49:25'),
(139, 'Cash', 603, '2022-01-20 16:02:59', '2022-01-20 16:02:59'),
(140, 'Cash', 605, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(141, 'Virement bancaire', 605, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(142, 'Chèque bancaire', 605, '2022-02-01 19:09:22', '2022-02-01 19:09:22'),
(143, 'Cash', 607, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(144, 'Virement bancaire', 607, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(145, 'Chèque bancaire', 607, '2022-02-01 19:22:25', '2022-02-01 19:22:25'),
(146, 'Cash', 609, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(147, 'Virement bancaire', 609, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(148, 'Chèque bancaire', 609, '2022-02-01 19:25:59', '2022-02-01 19:25:59'),
(149, 'Cash', 610, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(150, 'Virement bancaire', 610, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(151, 'Chèque bancaire', 610, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(152, 'Cash', 611, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(153, 'Virement bancaire', 611, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(154, 'Chèque bancaire', 611, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(155, 'Cash', 612, '2022-02-03 12:18:49', '2022-02-03 12:18:49'),
(156, 'Virement bancaire', 612, '2022-02-03 12:18:49', '2022-02-03 12:18:49'),
(157, 'Chèque bancaire', 612, '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `paies`
--

CREATE TABLE `paies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employes_entreprise_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `montant_paye` double NOT NULL,
  `restant` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paies`
--

INSERT INTO `paies` (`id`, `employes_entreprise_id`, `date`, `montant_paye`, `restant`, `created_at`, `updated_at`) VALUES
(1, 11, '1994-06-13', 2, 18, '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(2, 12, '2004-03-10', 16, 10, '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(3, 13, '1985-06-02', 68, 49, '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(4, 14, '1976-05-28', 17, 61, '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(5, 15, '1990-08-31', 24, 57, '2021-11-20 14:47:45', '2021-11-20 14:47:45'),
(6, 21, '1990-09-04', 25, 55, '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(7, 22, '2015-06-06', 79, 19, '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(8, 23, '1990-08-25', 46, 17, '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(9, 24, '2019-05-11', 50, 58, '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(10, 25, '2005-09-02', 32, 13, '2021-11-20 14:48:01', '2021-11-20 14:48:01');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicatif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `nom`, `indicatif`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Congo', 242),
(50, 'CD', 'Congo The Democratic Republic Of The', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pieces_jointes`
--

CREATE TABLE `pieces_jointes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fichier` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `recus_vente_id` int(11) DEFAULT NULL,
  `clients_entreprise_id` int(11) DEFAULT NULL,
  `devis_id` int(11) DEFAULT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `reglement_id` int(11) DEFAULT NULL,
  `depense_id` int(11) DEFAULT NULL,
  `revenu_id` int(11) DEFAULT NULL,
  `entreprise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pieces_jointes`
--

INSERT INTO `pieces_jointes` (`id`, `fichier`, `recus_vente_id`, `clients_entreprise_id`, `devis_id`, `facture_id`, `reglement_id`, `depense_id`, `revenu_id`, `entreprise_id`, `created_at`, `updated_at`) VALUES
(23, 'storage/uploads/pdf/2022/February/1643755321.pdf', NULL, NULL, NULL, 107, NULL, NULL, NULL, 610, '2022-02-01 22:42:01', '2022-02-01 22:42:01'),
(24, 'storage/uploads/pdf/2022/February/1643755362.pdf', NULL, NULL, NULL, 108, NULL, NULL, NULL, 610, '2022-02-01 22:42:42', '2022-02-01 22:42:42'),
(25, 'storage/uploads/pdf/2022/February/1643755526.pdf', NULL, NULL, NULL, NULL, NULL, 114, NULL, 610, '2022-02-01 22:45:26', '2022-02-01 22:45:26'),
(26, 'storage/uploads/pdf/2022/February/1643755564.pdf', NULL, NULL, NULL, NULL, NULL, 115, NULL, 610, '2022-02-01 22:46:04', '2022-02-01 22:46:04'),
(27, 'storage/uploads/pdf/2022/February/1643755592.pdf', NULL, NULL, NULL, NULL, NULL, 116, NULL, 610, '2022-02-01 22:46:32', '2022-02-01 22:46:32'),
(28, 'storage/uploads/pdf/2022/February/1643755631.pdf', NULL, NULL, NULL, NULL, NULL, 117, NULL, 610, '2022-02-01 22:47:11', '2022-02-01 22:47:11'),
(29, 'storage/uploads/pdf/2022/February/1643756415.pdf', NULL, NULL, NULL, NULL, NULL, 118, NULL, 611, '2022-02-01 23:00:15', '2022-02-01 23:00:15'),
(30, 'storage/uploads/pdf/2022/February/1643756449.pdf', NULL, NULL, NULL, NULL, NULL, 119, NULL, 611, '2022-02-01 23:00:49', '2022-02-01 23:00:49'),
(31, 'storage/uploads/pdf/2022/February/1643756545.pdf', NULL, NULL, NULL, NULL, NULL, 120, NULL, 611, '2022-02-01 23:02:25', '2022-02-01 23:02:25'),
(32, 'storage/uploads/pdf/2022/February/1643756638.pdf', NULL, NULL, NULL, 111, NULL, NULL, NULL, 611, '2022-02-01 23:03:58', '2022-02-01 23:03:58'),
(33, 'storage/uploads/pdf/2022/February/1643756928.pdf', NULL, NULL, NULL, 112, NULL, NULL, NULL, 611, '2022-02-01 23:08:48', '2022-02-01 23:08:48');

-- --------------------------------------------------------

--
-- Structure de la table `presences`
--

CREATE TABLE `presences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employes_entreprise_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_arrive` time DEFAULT NULL,
  `heure_depard` time DEFAULT NULL,
  `temps_absence` int(11) DEFAULT NULL,
  `est_present` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presences`
--

INSERT INTO `presences` (`id`, `employes_entreprise_id`, `date`, `heure_arrive`, `heure_depard`, `temps_absence`, `est_present`, `created_at`, `updated_at`) VALUES
(1, 16, '2001-02-24', '15:27:05', '17:14:53', 0, 'Quos enim rem id ut qui. Quas omnis veniam quod iusto excepturi tenetur. Mollitia et id ipsum velit qui. Velit animi quis qui vero perspiciatis maxime sunt.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(2, 17, '1991-01-20', '05:40:28', '08:12:52', 0, 'Sunt quia illo beatae sequi nisi. In sed sequi ut consequatur saepe. Tempore neque numquam in consequuntur sapiente sit. Reprehenderit nesciunt provident et quibusdam aut iusto qui.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(3, 18, '1989-11-20', '19:14:25', '20:27:52', 0, 'Maiores asperiores eius quia soluta. Blanditiis et architecto vel ea velit harum molestiae. Reprehenderit quo a rerum magni sit et esse.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(4, 19, '1993-08-26', '03:51:32', '09:58:15', 0, 'Mollitia officia possimus non a autem. Nihil quibusdam nihil velit. Eius harum nobis ea veniam. Voluptas neque deleniti occaecati eos omnis porro. Voluptas quas necessitatibus quam aut ut quae optio. Quo sint molestiae enim eos.', '2021-11-20 14:47:57', '2021-11-20 14:47:57'),
(5, 20, '2019-05-23', '10:36:01', '06:28:13', 0, 'Aut magnam voluptatem modi ut ea aut. Reiciendis eveniet voluptatem eos ipsam impedit ut. Molestiae autem ducimus ratione maxime qui. Itaque repellat ullam ut culpa maiores sequi repudiandae.', '2021-11-20 14:47:57', '2021-11-20 14:47:57');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `clients_entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cout` double NOT NULL,
  `dead_line` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `entreprise_id`, `clients_entreprise_id`, `nom`, `description`, `cout`, `dead_line`, `created_at`, `updated_at`) VALUES
(1, 52, 8, 'Deserunt pariatur non repudiandae ducimus sit impedit. Voluptas beatae sapiente fugit dolorum commodi. A aliquid nam sequi veniam ut itaque.', 'Repellendus saepe sit voluptatem nisi nobis voluptatem voluptas aut aperiam optio aut expedita.', 72, '1997-12-08', '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(2, 69, 11, 'Facere at earum voluptas iusto et vero natus. Eos quia nam error nihil enim. Assumenda labore vel ea et explicabo magni sit. Consequatur quod quia unde dolor aperiam impedit ut. Tempore quia sunt libero consequatur porro sunt.', 'Voluptas neque dolor commodi ut et recusandae quam et nihil est enim ducimus aut ut earum sequi deleniti.', 42, '2010-11-04', '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(3, 86, 14, 'Quod tempora qui non expedita. Nesciunt accusamus modi iure facilis. Ea voluptatem nisi quidem eos non esse. Perferendis enim sed blanditiis nulla officiis sapiente.', 'Omnis incidunt facilis error dolore ab et necessitatibus magnam et tempora iusto ullam.', 86, '2010-09-24', '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(4, 103, 17, 'Non aliquam architecto aut rerum quae est. Qui quia nam nulla blanditiis sunt. Cumque occaecati quis adipisci ea. Ipsum dolorem deserunt velit ducimus debitis. Quo rem magnam itaque. Quis ut dolor reiciendis voluptatem doloremque.', 'Expedita recusandae ut fugiat voluptatem dolor repellendus et magni aut enim amet.', 32, '1997-04-01', '2021-11-20 14:47:32', '2021-11-20 14:47:32'),
(5, 120, 20, 'Eum mollitia et est eum quis ex. Deleniti aliquid et voluptatem. Labore soluta explicabo quibusdam nemo optio rem alias ut.', 'Et architecto beatae est commodi vitae porro ut voluptates voluptatibus modi voluptatem ut veritatis qui tempore est perspiciatis numquam.', 53, '2017-12-28', '2021-11-20 14:47:33', '2021-11-20 14:47:33'),
(6, 441, 71, 'Sit aspernatur rem expedita et maxime atque. Architecto rerum id eius dolorum molestias nobis. Nisi quia veritatis error saepe fugit est.', 'Aut deleniti non vel laudantium a maxime occaecati recusandae aliquam nobis id ex quis qui ipsam beatae ut accusamus perspiciatis.', 30, '2006-01-20', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(7, 444, 72, 'Quae id vel nulla maxime sint sed et. Dolore possimus et nisi voluptatibus mollitia officiis. Quasi aperiam vel vel id aut nihil repellendus dicta.', 'Voluptatibus maiores dolor vitae perspiciatis ab voluptatum facilis omnis et sed enim ut similique illo maiores.', 42, '2018-08-01', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(8, 447, 73, 'At dolor assumenda in illo hic consequatur. Qui est dolor dignissimos beatae natus exercitationem. Rerum dolorem est quis aliquam sed omnis molestiae. Non enim illum necessitatibus nostrum pariatur dicta cumque.', 'Quas adipisci perspiciatis facere et ea et assumenda nihil distinctio sit quod.', 17, '2003-12-01', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(9, 450, 74, 'Aut labore architecto aliquam esse ut cupiditate. Voluptas eaque natus dolores quaerat alias impedit. Quia quos in quidem quod cupiditate laboriosam. Delectus aut non similique id.', 'Et quam odit voluptatum necessitatibus tempore sunt error dicta ducimus quia nam et.', 17, '2011-06-06', '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(10, 453, 75, 'Iure iste tempora velit corrupti et. Illum occaecati consequatur consequatur earum eaque ea. Officiis provident cum dignissimos provident. Eaque incidunt aliquid exercitationem laboriosam.', 'Praesentium nesciunt iusto non doloribus labore rem autem qui est beatae et rerum quae vitae blanditiis voluptate aut aut animi tempora.', 41, '1974-09-23', '2021-11-20 14:47:58', '2021-11-20 14:47:58');

-- --------------------------------------------------------

--
-- Structure de la table `recurrences`
--

CREATE TABLE `recurrences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `paie_id` int(11) DEFAULT NULL,
  `interval_jour` int(11) NOT NULL,
  `prochain_date` date NOT NULL,
  `regle_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recurrences`
--

INSERT INTO `recurrences` (`id`, `facture_id`, `paie_id`, `interval_jour`, `prochain_date`, `regle_id`, `created_at`, `updated_at`) VALUES
(1, 21, 6, 0, '1970-08-22', 1, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(2, 22, 7, 0, '2018-02-18', 2, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(3, 23, 8, 0, '1993-01-18', 3, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(4, 24, 9, 0, '1987-07-29', 4, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(5, 25, 10, 0, '2011-04-27', 5, '2021-11-20 14:48:01', '2021-11-20 14:48:01');

-- --------------------------------------------------------

--
-- Structure de la table `recus_ventes`
--

CREATE TABLE `recus_ventes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_entreprise_id` int(11) NOT NULL,
  `cc_cci` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_livraison` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recu_vente` date NOT NULL,
  `reference` bigint(20) NOT NULL,
  `numero_recu` bigint(20) NOT NULL,
  `article_id` int(11) NOT NULL,
  `paiements_mode_id` int(11) NOT NULL,
  `message_recu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_releve` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `depose_sur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `banque_id` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recus_ventes`
--

INSERT INTO `recus_ventes` (`id`, `clients_entreprise_id`, `cc_cci`, `adresse_livraison`, `date_recu_vente`, `reference`, `numero_recu`, `article_id`, `paiements_mode_id`, `message_recu`, `message_releve`, `depose_sur`, `caisse_id`, `banque_id`, `montant`, `created_at`, `updated_at`) VALUES
(1, 41, 'Maxime voluptatem rerum illo. Magni hic et distinctio sunt aliquam nihil quos dignissimos. Minima et minima consequuntur vitae velit minima nihil.', 'Rerum cumque enim ea non et iste voluptas. Iure corporis pariatur ut quisquam non qui. Qui eaque fugit sapiente qui. Laudantium laboriosam doloremque fugiat pariatur nulla nulla qui quis.', '2020-08-19', 434373190, 8703, 26, 57, 'Quibusdam dolorem et dolor ut. Est et quae aut est amet. Architecto ut ea consectetur et corrupti mollitia.', 'Rerum cum quis labore ut veritatis aliquid eum. Ratione quod possimus blanditiis pariatur facilis. Sint nam eius ut sit quam ab amet.', 'Placeat qui quisquam est nulla voluptas. Nulla tempore rem aut odit voluptatem. Aut nam iusto dolores molestiae quibusdam impedit odio. Quis cum maiores sed autem numquam est commodi.', 6, 6, 29, '2021-11-20 14:47:46', '2021-11-20 14:47:46'),
(2, 47, 'Ipsa est architecto deserunt rerum est et suscipit. Maxime quo placeat eaque reiciendis cumque alias. Est nisi ea nostrum aut similique.', 'Voluptates accusantium deleniti eum possimus voluptas et nisi. Id beatae laudantium est. Aut minus vel inventore omnis sunt explicabo facere.', '1973-08-26', 2719457, 3343790, 29, 66, 'Esse quam et reiciendis consequatur quidem est ut animi. Id occaecati sed et aut pariatur et et ad. Eaque in earum nulla et aut dolores. Dolores cum cumque veritatis deserunt nobis.', 'Voluptate reprehenderit qui dicta quidem voluptas rem voluptas ratione. Iure itaque asperiores debitis. Atque est sed dignissimos ipsa.', 'Vel ullam voluptas possimus ea. Qui atque et illum necessitatibus accusamus modi iusto. Ratione quisquam praesentium rem nisi et eos. Id id repellat eveniet dignissimos aut.', 8, 8, 42, '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(3, 53, 'Labore molestiae voluptatum nemo. Consequatur eaque quia iure voluptatibus corporis. Voluptatum aperiam impedit rerum atque in inventore. Iusto cupiditate nulla pariatur laborum sint velit.', 'Harum quis odit debitis. Earum dicta fugit commodi placeat quia. Porro nesciunt praesentium vel. Fugiat ipsum esse iusto et.', '2020-01-08', 73821, 0, 32, 75, 'Consequatur sit voluptatem sequi repudiandae qui ut. Quis itaque aut autem sequi aut qui. Eos sapiente suscipit dignissimos architecto officia et quasi repellat.', 'Similique aliquam adipisci maiores iure reprehenderit sint sed. Eius non ut voluptatibus quo dolor quo architecto laborum. Veritatis ex ratione assumenda aut.', 'Et facilis aspernatur voluptas doloribus atque velit eos. Placeat aliquid officia soluta placeat aut molestias. Omnis rerum voluptas autem ipsa. Omnis aut qui ut eum excepturi.', 10, 10, 99, '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(4, 59, 'Et qui quasi et sapiente fugiat. Sed nesciunt voluptas fuga ipsam voluptatem accusantium. Est consectetur provident consectetur sunt animi est consectetur.', 'Quia illo repudiandae sed incidunt magni. Provident ratione error deserunt suscipit. Ullam qui neque est distinctio ut dolorem quidem.', '1988-12-31', 45, 43887, 35, 84, 'Molestiae sequi cumque eum recusandae. Ullam consequuntur molestiae id qui voluptatem. Ea cumque rem quis unde at dolore.', 'Quasi doloremque eius itaque saepe. Et et laborum inventore nulla molestiae. Amet tempore nemo sequi consequatur adipisci dignissimos. Est maxime dignissimos non.', 'In omnis ex sit et sit enim quam. Aut hic ratione et aut molestias aliquam. Eum ut deleniti alias quo. Et nobis occaecati excepturi aut quae.', 12, 12, 7, '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(5, 65, 'Repellat quia dolores minima neque veritatis vitae. Repellat mollitia autem aut repudiandae asperiores non. Repellat omnis id illum magni eveniet fugiat libero praesentium.', 'Sapiente vel quod perferendis fugiat nesciunt et doloremque. Nihil ut dicta assumenda. Ab aut et qui tempora molestias iure unde.', '1987-06-08', 5, 880, 38, 93, 'Eos quidem exercitationem animi quia. Sint ex nihil quae reiciendis error ut. Dolor velit qui a a.', 'Numquam sit et vero deserunt. A nulla consequuntur dolorem libero ullam. Odit impedit veritatis explicabo. Repellendus optio illum soluta.', 'Qui cupiditate commodi voluptatum numquam omnis. Quia possimus dicta non. Deserunt qui libero fuga itaque velit. Dolorum sit harum impedit soluta voluptatem.', 14, 14, 95, '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(6, 81, 'Id porro alias rerum nostrum voluptate necessitatibus labore quia. Quo tenetur molestiae deserunt necessitatibus soluta cum maiores. Non laudantium odio aspernatur impedit.', 'Nihil non dolorem ea ullam et. Laborum et dolor voluptas et et repellendus soluta. Quos pariatur deleniti delectus eius.', '1985-03-07', 1079, 5, 46, 112, 'Est sed aut laboriosam nesciunt et tempora. Tempore quia aliquid est error. Consequatur repellendus tempora voluptates occaecati voluptatibus et occaecati. Ut perspiciatis aspernatur rerum.', 'Et similique ducimus placeat sed. Perferendis dolores placeat fuga mollitia doloribus non natus dolor. Voluptatem deleniti qui molestias omnis quia.', 'Ut totam a ab ut maxime. Necessitatibus et quisquam magni qui sint est nesciunt. Ea laudantium nostrum voluptatem voluptatibus quas. Ea sit itaque nihil et inventore autem consequuntur aliquid.', 16, 21, 20, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(7, 82, 'Iusto modi autem dignissimos consequatur voluptatem modi rerum. Laudantium et possimus modi quos minus. Nulla rem qui alias fugit nesciunt quisquam. Natus non ipsam aspernatur ut numquam.', 'Labore hic voluptatem esse. Est nulla saepe iure consectetur recusandae. Voluptas maxime quia culpa placeat expedita ut officiis cumque. Et porro numquam deleniti sed.', '1986-04-26', 78571462, 8012, 47, 114, 'Cumque illum commodi reiciendis autem. Labore ducimus eos occaecati qui repellendus. Ad culpa aspernatur corporis sunt non laudantium quis. Non aperiam tenetur quod laboriosam consectetur aut.', 'Et nihil corrupti voluptatibus nisi rerum maiores unde sapiente. Excepturi odio quae voluptate dicta provident. Incidunt ad quia consequatur ut.', 'Totam mollitia consequatur reiciendis deleniti. Reiciendis modi et facere et non error autem reprehenderit. Tempora voluptates est veniam neque. Illo consectetur sit ea quae. Dolorem ducimus qui minima aliquid et ut dolore. Ipsa quisquam in ut est.', 17, 22, 0, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(8, 83, 'Eaque rerum temporibus fuga qui. Molestiae molestias natus quae molestias. Reiciendis nostrum qui sunt deserunt perferendis. Asperiores ea perspiciatis repellendus est.', 'At temporibus et deserunt. Debitis consequatur quas aut voluptatibus deleniti fugit officiis. Qui voluptates ipsa voluptas.', '1972-04-17', 317, 5660346, 48, 116, 'Voluptate accusamus sed nisi exercitationem quae. Modi ratione dolore at cum eum ullam. Quas nulla et ipsam minus.', 'Dicta sequi praesentium deserunt sit numquam. A fugit asperiores veniam rem ullam. Culpa voluptatibus et quis autem.', 'Dolorem facere error non saepe necessitatibus sapiente eaque. Quaerat qui eligendi aliquam sit voluptas minima voluptas. Libero aliquam quia dignissimos et at libero in.', 18, 23, 7, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(9, 84, 'Ut ut molestiae et. Corporis soluta quia nesciunt vel ullam. Architecto sit enim soluta architecto hic corporis illo. Officiis cupiditate temporibus qui provident voluptate repellat.', 'Excepturi omnis omnis optio enim autem velit. Voluptates quam sunt totam molestiae inventore. Et est commodi et rerum consequatur aperiam aut. Nihil qui iste minima iusto possimus.', '2011-10-29', 8713, 2306042, 49, 118, 'Atque quia soluta ut ullam nesciunt ut. Cupiditate sint dignissimos voluptate molestias sunt assumenda laudantium aut. Porro et a asperiores. Debitis placeat qui rerum et eos sint.', 'Consequatur perferendis omnis ea fugit. Harum recusandae placeat ut recusandae. Minima omnis consequuntur qui voluptas.', 'Rerum quae sed consequatur molestias omnis dolorem dolor. Ab tenetur error facilis unde. Facere optio accusantium rerum accusamus.', 19, 24, 33, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(10, 85, 'Illo harum animi tempora expedita nobis rerum voluptatem. Dolorem velit eos aperiam. Cupiditate consectetur sit ex ad. Sit id delectus eos accusantium rem perspiciatis voluptatum.', 'Nobis ut iusto blanditiis quibusdam ullam quas. Aut ipsam asperiores consequatur voluptate ex velit. Sint ipsum consectetur soluta et nobis sit quia.', '2008-04-24', 72409629, 3086, 50, 120, 'Facere laboriosam nam dignissimos quas impedit ea dolorum. Velit qui voluptatibus perferendis quas aut. Atque et optio libero perspiciatis architecto.', 'Aliquam provident ut quia maiores nemo. Corporis ab libero architecto alias at eum nihil. Eaque dolorem nobis minus accusamus exercitationem corporis.', 'Qui qui accusantium magnam quo. Facilis qui autem quaerat eveniet ipsum dicta. Voluptates eos vero ad est possimus accusamus tempore. Tempora at ipsam esse asperiores eum dolore itaque.', 20, 25, 82, '2021-11-20 14:48:03', '2021-11-20 14:48:03');

-- --------------------------------------------------------

--
-- Structure de la table `reglements`
--

CREATE TABLE `reglements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_entreprise_id` int(11) NOT NULL,
  `entreprise_id` int(200) NOT NULL DEFAULT 0,
  `facture_id` int(11) DEFAULT NULL,
  `paiements_mode_id` int(11) DEFAULT NULL,
  `paiements_mode` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_cci` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvisionnememnt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banque_id` int(11) DEFAULT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `montant_recu` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reglements`
--

INSERT INTO `reglements` (`id`, `clients_entreprise_id`, `entreprise_id`, `facture_id`, `paiements_mode_id`, `paiements_mode`, `reference`, `cc_cci`, `approvisionnememnt`, `banque_id`, `caisse_id`, `montant_recu`, `note`, `created_at`, `updated_at`) VALUES
(20, 99, 610, 101, NULL, NULL, '234', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 34, 2, NULL, '2022-02-01 20:32:49', '2022-02-01 20:32:49'),
(21, 99, 610, 101, NULL, NULL, '234', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 34, 15, 'oo', '2022-02-01 20:38:48', '2022-02-01 20:38:48'),
(22, 99, 610, 108, 149, NULL, '22', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 34, 22, NULL, '2022-02-01 22:43:00', '2022-02-01 22:43:00'),
(23, 100, 611, 111, NULL, NULL, '34', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 35, 100000, NULL, '2022-02-01 23:04:33', '2022-02-01 23:04:33'),
(24, 100, 611, 111, NULL, NULL, '34', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 35, 300000, 'pau', '2022-02-01 23:05:01', '2022-02-01 23:05:01'),
(25, 100, 611, 111, NULL, NULL, '34', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 35, 204500, 'pay', '2022-02-01 23:05:14', '2022-02-01 23:05:14'),
(26, 100, 611, 112, 153, NULL, '37', 'ollaidpn@gmail.com', 'Caisse principale', NULL, 35, 609000, NULL, '2022-02-01 23:08:58', '2022-02-01 23:08:58');

-- --------------------------------------------------------

--
-- Structure de la table `regles`
--

CREATE TABLE `regles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banque_id` int(11) NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regles`
--

INSERT INTO `regles` (`id`, `banque_id`, `motif`, `montant`, `created_at`, `updated_at`) VALUES
(1, 16, 'Eius eaque sed sit harum quis occaecati perferendis quisquam. Iusto ut voluptatum impedit quis quidem veniam. Quia qui vel sed dolor. Laudantium aspernatur in dolor quia dolorem. Sapiente in assumenda ipsam ducimus ut officiis.', 84, '2021-11-20 14:47:58', '2021-11-20 14:47:58'),
(2, 17, 'Autem dolorem dolorem non enim tempore. Explicabo non libero veritatis quae blanditiis nesciunt eius commodi. Mollitia maiores dignissimos animi expedita maxime quisquam cum. Quae et asperiores quasi est quo minus.', 82, '2021-11-20 14:47:59', '2021-11-20 14:47:59'),
(3, 18, 'Suscipit optio architecto enim et ut similique asperiores sequi. Voluptatem qui aliquam pariatur. Consequuntur consectetur sed minima dignissimos.', 30, '2021-11-20 14:48:00', '2021-11-20 14:48:00'),
(4, 19, 'Dignissimos distinctio veniam praesentium qui illum aliquam placeat. Voluptatem qui voluptatem minima adipisci voluptatem similique. Exercitationem esse et dicta.', 77, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(5, 20, 'Nemo suscipit enim quisquam. Alias dolorum voluptatem perspiciatis expedita magni. Illo illum et voluptas et. Deserunt et modi sunt quaerat dolor dolorem eaque. Eos velit iusto id nesciunt voluptatem minima porro est. Et sint explicabo aut possimus.', 12, '2021-11-20 14:48:01', '2021-11-20 14:48:01'),
(6, 26, 'Est non ut iste aut quis quia aliquam aspernatur. Velit placeat nulla sequi magnam non. Voluptatem rerum non autem mollitia velit ipsa. Unde ut quia non aut.', 65, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(7, 27, 'Accusamus doloribus magni id veritatis aut id ea. Cum nisi sed aut non minus voluptas iure earum. Sint ut sapiente sapiente. Debitis quasi ut quod neque beatae dolorem iste sint.', 17, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(8, 28, 'Non qui veniam consequatur consequatur rerum dignissimos distinctio. Molestiae aut voluptatem cum suscipit sint aut sit. Et officia pariatur voluptas earum.', 30, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(9, 29, 'Sint voluptatem ut in debitis. Aut ipsam deserunt in quia autem. Et autem ea dolorem corporis nam aliquid sunt. Consectetur iure officia excepturi molestiae enim. Possimus voluptatem quia voluptas molestiae ab ullam voluptatibus.', 77, '2021-11-20 14:48:03', '2021-11-20 14:48:03'),
(10, 30, 'Iure quas eaque aut qui. Aperiam dolor in est cupiditate aut animi dolorem. Quasi perferendis dolor consectetur ipsum asperiores rerum harum exercitationem. Temporibus consequatur voluptas accusamus beatae. Provident quia tenetur voluptatem eius.', 46, '2021-11-20 14:48:03', '2021-11-20 14:48:03');

-- --------------------------------------------------------

--
-- Structure de la table `revenus`
--

CREATE TABLE `revenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `revenus`
--

INSERT INTO `revenus` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-11-20 14:47:48', '2021-11-20 14:47:48'),
(2, '2021-11-20 14:47:50', '2021-11-20 14:47:50'),
(3, '2021-11-20 14:47:52', '2021-11-20 14:47:52'),
(4, '2021-11-20 14:47:54', '2021-11-20 14:47:54'),
(5, '2021-11-20 14:47:56', '2021-11-20 14:47:56'),
(6, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(7, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(8, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(9, '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(10, '2021-11-20 14:48:07', '2021-11-20 14:48:07');

-- --------------------------------------------------------

--
-- Structure de la table `ruptures`
--

CREATE TABLE `ruptures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invitation_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ruptures`
--

INSERT INTO `ruptures` (`id`, `invitation_id`, `entreprise_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 586, 'error', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(2, 7, 587, 'alias', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(3, 8, 588, 'voluptas', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(4, 9, 589, 'et', '2021-11-20 14:48:07', '2021-11-20 14:48:07'),
(5, 10, 590, 'non', '2021-11-20 14:48:07', '2021-11-20 14:48:07');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `stripe_id`, `data`, `last_activity`) VALUES
(1, '127.0.0.1', 'price_1KFPsnCqfjPSAnLhKihYjg58', '{\"payload\":{\"_token\":\"6pSUVm83jklRxRQpYgxPYBM5qMshNx9gLGd9Mm7q\",\"nom_entreprise\":\"TextZem\",\"email_entreprise\":\"support@textzem.com\",\"telephone_entreprise\":\"2345678\",\"passdddword\":\"dd\",\"confidddrmPassword\":\"ddd\",\"terms\":\"on\",\"prenom\":\"tederibo@mailinator.com\",\"nom\":\"Aliqua Enim nostrud\",\"email\":\"support@textzem.com\",\"telephone\":\"23456789\",\"password\":\"nnnnnnnn\",\"password_confirmation\":\"nnnnnnnn\",\"priceId\":\"price_1KFPsnCqfjPSAnLhKihYjg58\",\"pack\":\"price_1KFPsnCqfjPSAnLhKihYjg58\"}}', '2022-01-24'),
(2, '127.0.0.1', 'price_1KFPsnCqfjPSAnLhKihYjg58', '{\"payload\":{\"_token\":\"6eaFkWfyDtwuoqpNbt9hxStBttRxXOBBtDpaBhyX\",\"nom_entreprise\":\"Appe California\",\"email_entreprise\":\"apple@apple.com\",\"telephone_entreprise\":\"023456787654\",\"passdddword\":\"dd\",\"confidddrmPassword\":\"ddd\",\"terms\":\"on\",\"prenom\":\"Appe\",\"nom\":\"Iphone\",\"email\":\"apple@apple.com\",\"telephone\":\"0234567654\",\"password\":\"nnnnnnnn\",\"password_confirmation\":\"nnnnnnnn\",\"priceId\":\"price_1KFPsnCqfjPSAnLhKihYjg58\",\"pack\":\"price_1KFPsnCqfjPSAnLhKihYjg58\"}}', '2022-02-01');

-- --------------------------------------------------------

--
-- Structure de la table `session_controls`
--

CREATE TABLE `session_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `control_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'valide',
  `started` date DEFAULT NULL,
  `ended` date DEFAULT NULL,
  `preloader` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_controls`
--

INSERT INTO `session_controls` (`id`, `entreprise_id`, `control_id`, `status`, `started`, `ended`, `preloader`, `created_at`, `updated_at`) VALUES
(107, 2, 1, 'expired', '2022-01-31', '2022-01-31', 'yes', '2022-01-31 16:47:39', '2022-01-31 16:59:12'),
(108, 2, 1, 'expired', '2022-01-31', '2022-01-31', 'yes', '2022-01-31 16:59:12', '2022-01-31 16:59:12'),
(110, 2, 1, 'expired', '2022-01-31', '2022-01-31', 'no', '2022-01-31 19:23:44', '2022-01-31 20:02:07'),
(111, 2, 1, 'expired', '2022-01-31', '2022-01-31', 'no', '2022-01-31 20:03:02', '2022-01-31 20:03:11'),
(112, 2, 1, 'expired', '2022-02-01', '2022-02-01', 'no', '2022-02-01 18:10:32', '2022-02-01 18:27:43');

-- --------------------------------------------------------

--
-- Structure de la table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` int(20) NOT NULL DEFAULT 1,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taux` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taxes`
--

INSERT INTO `taxes` (`id`, `entreprise_id`, `nom`, `taux`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hors Champs', 0, '2021-11-20 14:47:28', '2021-11-20 14:47:28'),
(2, 1, 'Exonoré', 2, '2021-11-20 14:47:29', '2021-11-20 14:47:29'),
(3, 1, 'Détaxé', 0, '2021-11-20 14:47:30', '2021-11-20 14:47:30'),
(4, 1, 'TPS', 3, '2021-11-20 14:47:31', '2021-11-20 14:47:31'),
(46, 2, 'TPS', 5, '2022-01-08 20:19:19', '2022-01-08 20:23:53'),
(47, 603, 'Diallo', 2, '2022-01-20 16:02:49', '2022-01-20 16:02:49'),
(48, 610, 'Hors Champs', 0, '2022-02-01 19:29:03', '2022-02-01 19:29:03'),
(49, 611, 'Hors Champs', 0, '2022-02-01 22:52:41', '2022-02-01 22:52:41'),
(50, 611, 'TPS', 3, '2022-02-01 23:01:01', '2022-02-01 23:01:01'),
(51, 612, 'Hors Champs', 0, '2022-02-03 12:18:49', '2022-02-03 12:18:49');

-- --------------------------------------------------------

--
-- Structure de la table `token2fas`
--

CREATE TABLE `token2fas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `token2fas`
--

INSERT INTO `token2fas` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(16, 'entreprise@illugraph-ic.com', '5902', 'invalide', '2021-12-23 18:15:08', '2021-12-23 18:15:08');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banque_id` int(11) DEFAULT NULL,
  `caisse_id` int(11) DEFAULT NULL,
  `motif` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double NOT NULL,
  `pre_solde_banque` double DEFAULT NULL,
  `post_solde_banque` double DEFAULT NULL,
  `pre_solde_caisse` double DEFAULT NULL,
  `post_solde_caisse` double DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `banque_id`, `caisse_id`, `motif`, `montant`, `pre_solde_banque`, `post_solde_banque`, `pre_solde_caisse`, `post_solde_caisse`, `type`, `created_at`, `updated_at`) VALUES
(1, 36, 26, 'Quae non et commodi nobis aut quos repudiandae. Ut quas quia quo consequatur quia. Impedit autem rerum aut quas vel.', 49, 35, 69, 31, 65, 'Qui ea deserunt pariatur labore voluptatibus voluptatum debitis. Earum reiciendis suscipit non molestiae vero. Fugiat saepe at non delectus.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(2, 37, 27, 'Architecto sunt aut hic labore incidunt. Exercitationem hic doloribus aut incidunt. Eum debitis et qui fugiat. Error nulla veritatis maxime maiores aut aut voluptates.', 13, 53, 22, 7, 16, 'Et commodi ipsam et voluptates tempora magnam neque. Ut numquam praesentium maxime iste ducimus nisi. Voluptas excepturi et est dolorum quia neque repudiandae.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(3, 38, 28, 'Voluptatum id sed mollitia fuga dolorum sequi. Ab quia nemo aliquid ipsum sit doloribus non. Est adipisci est beatae consequatur error.', 32, 45, 97, 92, 67, 'Facere aspernatur ab asperiores consequatur voluptas sunt omnis. Voluptatem officiis est et et sapiente nihil.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(4, 39, 29, 'Ipsa dolorem aut nesciunt repellat recusandae vero tempore. Et tenetur deserunt praesentium aliquid perferendis. Perspiciatis tempore quam aut libero.', 64, 74, 40, 46, 88, 'Eaque corrupti nisi vero in voluptas est vel. Nisi magni ipsum pariatur provident. Laboriosam voluptatem nam et dolores quia et.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(5, 40, 30, 'Autem ipsum quia in maxime sunt ab rerum. Sit consequatur sapiente optio voluptas.', 58, 54, 24, 58, 7, 'Amet architecto suscipit explicabo eveniet veritatis dolorem quis soluta. Exercitationem aut dolorum aliquam ut odit amet. Veritatis veniam necessitatibus numquam sint architecto omnis vitae. Facilis numquam fugiat numquam commodi est non delectus quasi.', '2021-11-20 14:48:08', '2021-11-20 14:48:08'),
(6, 1, NULL, 'Paiement facture N°100', 312, 2310, 2622, NULL, NULL, 'Débit', '2022-01-07 20:40:46', '2022-01-07 20:40:46'),
(7, 1, NULL, 'Paiement facture N°100', 312, 2622, 2934, NULL, NULL, 'Débit', '2022-01-07 20:41:36', '2022-01-07 20:41:36'),
(8, 1, NULL, 'Paiement facture N°100', 34, 2934, 2968, NULL, NULL, 'Débit', '2022-01-07 20:42:00', '2022-01-07 20:42:00'),
(9, 2, NULL, 'Paiement facture N°234', 13232, 289, 13521, NULL, NULL, 'Débit', '2022-01-29 15:00:39', '2022-01-29 15:00:39'),
(10, 1, NULL, 'Paiement facture N°234', 20000, 2968, 22968, NULL, NULL, 'Débit', '2022-01-29 15:01:09', '2022-01-29 15:01:09'),
(11, 1, NULL, 'Paiement facture N°234', 4, 22968, 22972, NULL, NULL, 'Débit', '2022-02-01 17:39:05', '2022-02-01 17:39:05'),
(12, 1, NULL, 'Paiement facture N°234', 22, 22972, 22994, NULL, NULL, 'Débit', '2022-02-01 17:45:02', '2022-02-01 17:45:02'),
(13, 1, NULL, 'Paiement facture N°234', 4, 22994, 22998, NULL, NULL, 'Débit', '2022-02-01 17:49:20', '2022-02-01 17:49:20'),
(14, 1, NULL, 'Paiement facture N°234', -4, 22998, 22994, NULL, NULL, 'Débit', '2022-02-01 18:48:28', '2022-02-01 18:48:28'),
(15, NULL, 34, 'Paiement facture N°234', 10, NULL, NULL, 0, 10, 'Débit', '2022-02-01 20:24:11', '2022-02-01 20:24:11'),
(16, NULL, 34, 'Paiement facture N°234', 2, NULL, NULL, 10, 12, 'Débit', '2022-02-01 20:32:49', '2022-02-01 20:32:49'),
(17, NULL, 34, 'Paiement facture N°234', 15, NULL, NULL, 12, 27, 'Débit', '2022-02-01 20:38:48', '2022-02-01 20:38:48'),
(18, NULL, 34, 'Paiement Reçu N°22', 22, NULL, NULL, 27, 49, 'credit', '2022-02-01 22:43:00', '2022-02-01 22:43:00'),
(19, NULL, 35, 'Paiement facture N°34', 100000, NULL, NULL, 0, 100000, 'credit', '2022-02-01 23:04:33', '2022-02-01 23:04:33'),
(20, NULL, 35, 'Paiement facture N°34', 300000, NULL, NULL, 100000, 400000, 'credit', '2022-02-01 23:05:01', '2022-02-01 23:05:01'),
(21, NULL, 35, 'Paiement facture N°34', 204500, NULL, NULL, 400000, 604500, 'credit', '2022-02-01 23:05:14', '2022-02-01 23:05:14'),
(22, NULL, 35, 'Paiement Reçu N°37', 609000, NULL, NULL, 604500, 1213500, 'credit', '2022-02-01 23:08:58', '2022-02-01 23:08:58');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prenom` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portable` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postale` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'entreprise',
  `entreprise_id` int(20) DEFAULT NULL,
  `is_responsable` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_entreprise_id` int(20) DEFAULT NULL,
  `habilitation_id` int(200) NOT NULL DEFAULT 1,
  `employes_entreprise_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `langue_id`, `created_at`, `updated_at`, `prenom`, `nom`, `telephone`, `portable`, `adresse`, `ville`, `province`, `code_postale`, `pays`, `role`, `entreprise_id`, `is_responsable`, `clients_entreprise_id`, `habilitation_id`, `employes_entreprise_id`) VALUES
(1, 'admin@illugraph-ic.com', '2021-11-20 14:47:24', '$2y$10$NDwYVOc.mYAp0rKsZjd.pOyoA39xYhqmBQZmf/bEd.j./qPSvPvdS', 'oWcVF0e2fk4I2YeFJTotHaxsSIWXnmz3DTwm4mxRoBkvHcCGW6uXkaBWAJF1', 1, '2021-11-20 14:47:24', '2021-11-20 14:47:24', 'Compte ', 'Admin', '12345678', NULL, 'km', 'Dakar', NULL, NULL, 'Sénégal', 'admin', NULL, NULL, NULL, 1, NULL),
(2, 'entreprise@illugraph-ic.com', '2021-11-20 14:47:24', '$2y$10$Q7IAD6ix644lcRL2HqadmeCzSQYcgZT43KojXbbRqEsoOTlWMuyPK', 'vaXSSWLcPg1sdE0DK1K9067aK4wwxJHjaVj2wBD7k4TSan9tvcvGAQuk3Hko', 1, '2021-11-20 14:47:24', '2022-01-03 17:44:14', 'Pape Ndiouga', 'Diallo', '12345678', NULL, 'km', 'Dakar', NULL, NULL, 'Sénégal', 'cabinet', 2, NULL, NULL, 1, NULL),
(4, 'employe2@illugrap-ic.com', '2021-11-20 14:47:24', '$2y$10$NDwYVOc.mYAp0rKsZjd.pOyoA39xYhqmBQZmf/bEd.j./qPSvPvdS', 'QngAG3mCru', 4, '2021-11-20 14:47:25', '2021-11-20 14:47:25', '', '', '12345678', NULL, 'km', 'Dakar', NULL, NULL, 'Sénégal', 'employe', NULL, NULL, NULL, 1, 2),
(5, 'employe1@illugrap-ic.com', '2021-11-20 14:47:25', '$2y$10$NDwYVOc.mYAp0rKsZjd.pOyoA39xYhqmBQZmf/bEd.j./qPSvPvdS', 'xxnFghkjH3', 5, '2021-11-20 14:47:25', '2021-11-20 14:47:25', '', '', '12345678', NULL, 'km', 'Dakar', NULL, NULL, 'Sénégal', 'employe', NULL, NULL, NULL, 1, 1),
(637, 'jolyhofij@mailinator.com', NULL, '$2y$10$JVMjRDWi/AHbPcwS9IYp3OvTdprzLQufKr69LLvT.NxtEKYrR/UNS', NULL, 1, '2022-01-03 17:12:40', '2022-01-03 17:12:40', 'In enim adipisicing', 'In autem totam conse', '+1 (933) 309-7429', NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 1, NULL),
(638, 'ollaidpn@gmail.com', NULL, '$2y$10$.fZq7vZrYlogRKTWzQCrwO0U6bcvAMeywA7ci1UdJAPq7HnTjQBNi', NULL, 1, '2022-01-03 17:19:52', '2022-01-03 17:19:52', 'El Hadji Papa', 'Diallo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 1, NULL),
(639, 'kicaq@mailinator.com', NULL, '$2y$10$gwTrxrEFimIypgGOas6QneBfqrjGOQETfcEeAihAvkY8MuhY5sjBW', NULL, 1, '2022-01-03 17:21:48', '2022-01-03 17:21:48', 'Accusamus accusamus', 'In quidem quibusdam', '+1 (234) 519-8485', NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL),
(640, 'ollaidpn@gmdail.com', NULL, '$2y$10$pdmiEfdj3vlbL4iC1ayiyu8fuB0G0HreQCTGJGbOAMnYJQbQEJItG', NULL, 1, '2022-01-03 17:21:57', '2022-01-03 17:21:57', 'El Hadji Papa', 'Diallo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 1, NULL, NULL, 2, NULL),
(641, 'jyna@mailinator.com', NULL, '$2y$10$z5gz4wNuZICcpAa3i.Fc1uKXz4qiTNSM.X7MtmICCkYhaJu7y0SfG', NULL, 1, '2022-01-03 22:37:02', '2022-01-03 22:37:02', 'homifubux@mailinator.com', 'ribuvo@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 601, NULL, NULL, 1, NULL),
(642, 'ollaidpn1@gmail.com', NULL, '$2y$10$qKnJLPLWkwbyr.bcjWyUFeJH5tp0DEkC1CZjLUK0IlRPg2TgCzwWC', NULL, 1, '2022-01-03 22:37:53', '2022-01-03 22:37:53', 'ollaidpn@gmail.com', 'Diallo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 602, NULL, NULL, 1, NULL),
(643, 'entreprise1@illugraph-ic.com', NULL, '$2y$10$KfhtQt9N1Ew1FQtw3OX1vOoeJQdMMED40Fi5TjpnYhLMjViK7Nvvq', NULL, 1, '2022-01-06 16:43:45', '2022-01-06 16:43:45', 'TESTEntreprise1', 'TESTEntreprise1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 603, NULL, NULL, 1, NULL),
(644, 'apple@apple.com', NULL, '$2y$10$xVen/Kla2tKkCkze7yfUxuxNeof0ZeYDeToGlru4uciROP9Pp3IVa', NULL, 1, '2022-02-01 19:09:22', '2022-02-01 19:09:22', 'Apple', 'Iphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 605, NULL, NULL, 1, NULL),
(646, 'Sony@Sony.com', NULL, '$2y$10$LhjWBbRY7kXEIdJxc0.dj.8p9YcvKaFZe/3euu2Jk2iQeWt5cBofO', NULL, 1, '2022-02-01 19:22:25', '2022-02-01 19:22:25', 'Sony', 'Sony', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 607, NULL, NULL, 1, NULL),
(648, 'table@table.com', NULL, '$2y$10$PrQZMa84wi3Lyd3EHdZiI.g4medNngRz4eOc.GMzh3d/GGlnX72wq', NULL, 1, '2022-02-01 19:25:59', '2022-02-01 19:25:59', 'table', 'table', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 609, NULL, NULL, 1, NULL),
(649, 'chaise@chaise.com', NULL, '$2y$10$6wWa.nh4VSRE1JCd2nukceJY3Tf054HERe68nVEvpfrs8pdn/.D1e', NULL, 1, '2022-02-01 19:29:03', '2022-02-03 20:09:10', 'chaise', 'chaise', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 610, NULL, NULL, 1, NULL),
(650, 'baba@sonatel.sn', NULL, '$2y$10$Gy4YPFTSkFua0XXnBMVaH.YCTo5/Io8DmqVQGVr2TRtESeseWZ/8i', NULL, 1, '2022-02-01 22:52:41', '2022-02-01 22:52:41', 'Baba', 'Ly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 611, NULL, NULL, 1, NULL),
(651, 'u22@entreprise22.com', NULL, '$2y$10$0ieWy5k3w1G5Haoq.LWdoe0KWWaxfKwCrLA4RqlPWhi06CAIp2Ovi', NULL, 1, '2022-02-03 12:18:49', '2022-02-03 12:18:49', 'User 22', '0022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'entreprise', 612, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packIntro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packText` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceIntro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serviceText` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `websites`
--

INSERT INTO `websites` (`id`, `debut`, `complement`, `description`, `btn1`, `link1`, `image1`, `packIntro`, `packText`, `serviceIntro`, `serviceText`, `image2`, `content2`, `btn2`, `link2`, `image3`, `content3`, `btn3`, `link3`, `image4`, `content4`, `btn4`, `link4`, `created_at`, `updated_at`) VALUES
(1, 'Optez', 'pour votre entreprise', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page', 'Démarrer', '#', NULL, 'Packs & abonements', 'Forfait gratuit avec toutes les fonctionnalités de base. Forfait Pro pour les utilisateurs avancés.', 'Les services qu\'offre notre plateforme', NULL, NULL, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire', 'En profiter', '#', NULL, 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire', 'En profiter', '#', NULL, NULL, 'En profiter', '#', NULL, '2022-01-08 22:08:23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `banques`
--
ALTER TABLE `banques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `caisses`
--
ALTER TABLE `caisses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_articles`
--
ALTER TABLE `categories_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients_entreprises`
--
ALTER TABLE `clients_entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comptescomptables`
--
ALTER TABLE `comptescomptables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats_models`
--
ALTER TABLE `contrats_models`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats_types`
--
ALTER TABLE `contrats_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `depenses_paniers`
--
ALTER TABLE `depenses_paniers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `depenses_simples`
--
ALTER TABLE `depenses_simples`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devises_monetaires`
--
ALTER TABLE `devises_monetaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis_articles`
--
ALTER TABLE `devis_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documents_types`
--
ALTER TABLE `documents_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes_entreprises`
--
ALTER TABLE `employes_entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures_articles`
--
ALTER TABLE `factures_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs_credits`
--
ALTER TABLE `fournisseurs_credits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habilitations`
--
ALTER TABLE `habilitations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `impots`
--
ALTER TABLE `impots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infos_systems`
--
ALTER TABLE `infos_systems`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles_devis`
--
ALTER TABLE `modeles_devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles_factures`
--
ALTER TABLE `modeles_factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles_recus`
--
ALTER TABLE `modeles_recus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `module_packs`
--
ALTER TABLE `module_packs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `package_payments`
--
ALTER TABLE `package_payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiementsources`
--
ALTER TABLE `paiementsources`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements_modalites`
--
ALTER TABLE `paiements_modalites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements_modes`
--
ALTER TABLE `paiements_modes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paies`
--
ALTER TABLE `paies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_id_index` (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `pieces_jointes`
--
ALTER TABLE `pieces_jointes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recurrences`
--
ALTER TABLE `recurrences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recus_ventes`
--
ALTER TABLE `recus_ventes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reglements`
--
ALTER TABLE `reglements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regles`
--
ALTER TABLE `regles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revenus`
--
ALTER TABLE `revenus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ruptures`
--
ALTER TABLE `ruptures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `session_controls`
--
ALTER TABLE `session_controls`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `token2fas`
--
ALTER TABLE `token2fas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `banques`
--
ALTER TABLE `banques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `caisses`
--
ALTER TABLE `caisses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `categories_articles`
--
ALTER TABLE `categories_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `clients_entreprises`
--
ALTER TABLE `clients_entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `comptescomptables`
--
ALTER TABLE `comptescomptables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `contrats_models`
--
ALTER TABLE `contrats_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `contrats_types`
--
ALTER TABLE `contrats_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `controls`
--
ALTER TABLE `controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT pour la table `depenses_paniers`
--
ALTER TABLE `depenses_paniers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT pour la table `depenses_simples`
--
ALTER TABLE `depenses_simples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `devises_monetaires`
--
ALTER TABLE `devises_monetaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `devis_articles`
--
ALTER TABLE `devis_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `documents_types`
--
ALTER TABLE `documents_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `employes_entreprises`
--
ALTER TABLE `employes_entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `factures_articles`
--
ALTER TABLE `factures_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `fournisseurs_credits`
--
ALTER TABLE `fournisseurs_credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `habilitations`
--
ALTER TABLE `habilitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `impots`
--
ALTER TABLE `impots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `infos_systems`
--
ALTER TABLE `infos_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `modeles_devis`
--
ALTER TABLE `modeles_devis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT pour la table `modeles_factures`
--
ALTER TABLE `modeles_factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT pour la table `modeles_recus`
--
ALTER TABLE `modeles_recus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `module_packs`
--
ALTER TABLE `module_packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `package_payments`
--
ALTER TABLE `package_payments`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `paiementsources`
--
ALTER TABLE `paiementsources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paiements_modalites`
--
ALTER TABLE `paiements_modalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT pour la table `paiements_modes`
--
ALTER TABLE `paiements_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT pour la table `paies`
--
ALTER TABLE `paies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pieces_jointes`
--
ALTER TABLE `pieces_jointes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `recurrences`
--
ALTER TABLE `recurrences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `recus_ventes`
--
ALTER TABLE `recus_ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reglements`
--
ALTER TABLE `reglements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `regles`
--
ALTER TABLE `regles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `revenus`
--
ALTER TABLE `revenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ruptures`
--
ALTER TABLE `ruptures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `session_controls`
--
ALTER TABLE `session_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `token2fas`
--
ALTER TABLE `token2fas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT pour la table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
