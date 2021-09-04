-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 04 sep. 2021 à 22:21
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `holdingcafao`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

DROP TABLE IF EXISTS `appartement`;
CREATE TABLE IF NOT EXISTS `appartement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `chambres` int(11) NOT NULL,
  `salles_de_bain` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `cuisines` int(11) NOT NULL,
  `salons` int(11) NOT NULL,
  `update_at` datetime NOT NULL,
  `nbre_type_appartement` int(11) NOT NULL,
  `nbre_appart_alouer` int(11) NOT NULL,
  `nbre_appart_avendre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appartement`
--

INSERT INTO `appartement` (`id`, `type`, `description`, `surface`, `chambres`, `salles_de_bain`, `prix`, `cuisines`, `salons`, `update_at`, `nbre_type_appartement`, `nbre_appart_alouer`, `nbre_appart_avendre`) VALUES
(1, 'ghcvbhjn', 'jnkl:;', 5, 55, 556, 22, 45, 4, '1900-05-10 10:00:13', 60, 40, 20),
(2, 'ghcvbhjnbbn', 'jnkl:;lmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnlmkjhgjklbsdbfvbfx,v,fd,nnvvlmkjhgjklbsdb', 5, 55, 556, 22, 45, 4, '1900-05-10 10:00:13', 60, 40, 20),
(3, 'a4', 'a4', 10, 20, 12, 521366, 21, 12, '1900-05-10 10:00:13', 60, 40, 20),
(10, 'ghcvbhjn', 'fgghjn,', 41, 4, 4, 2, 2, 2, '1900-05-10 10:00:13', 60, 40, 20),
(11, 'ghcvbhjn', '45222 vg', 4, 4, 4, 4, 4, 4, '1900-05-10 10:00:13', 60, 40, 20),
(16, 'ghcvbhjn', 'qSDFGBNCBVC', 2, 2, 2, 2, 1, 1, '1900-05-10 10:00:13', 60, 40, 20),
(17, 'xfcgvhbn,;', 'xbvn,;', 22, 2, 2, 2, 2, 2, '1900-05-10 10:00:13', 60, 40, 20),
(18, 'xfcgvhbn,;', 'xbvn,;', 22, 2, 2, 2, 2, 2, '1900-05-10 10:00:13', 60, 40, 20),
(19, 'ghcvbhjn', 'fcghjk', 22, 22, 22, 2, 11, 44, '1900-05-10 10:00:13', 60, 40, 20),
(20, '52', '25', 2, 2, 2, 2, 5, 2, '1900-05-10 10:00:13', 60, 40, 20),
(23, 'f5', 'jnn', 2, 2, 2, 2, 2, 2, '1900-05-10 10:00:13', 60, 40, 20),
(24, '5', '5', 5, 5, 5, 5, 5, 5, '1900-05-10 10:00:13', 60, 40, 20),
(25, 'F1', '2', 2, 2, 2, 3, 2, 1, '1900-05-10 10:00:13', 60, 40, 20),
(26, 'deuxieme', 'mm', 6, 6, 6, 6, 4, 14, '1900-05-10 10:00:13', 60, 40, 20),
(27, 'jkl', 'm', 2, 2, 2, 2, 22, 2, '1900-05-10 10:00:13', 60, 40, 20),
(29, 'dernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbb', 'dernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essa', 2, 2, 2, 2, 2, 2, '1900-05-10 10:00:13', 60, 40, 20),
(30, 'dernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbb', 'dernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essa', 2, 2, 2, 2, 2, 2, '1900-05-10 10:00:13', 60, 40, 20),
(31, 'Appartement A', 'Appartement A est composé de :\r\nUn spacieux salon de 26 m² avec balcon\r\nUn espace de dégagement\r\nTrois chambres dont 1 avec salle de bain\r\nUne cuisine meublée\r\nUne buanderie\r\nUne salle d\'eau\r\nDes toilettes visiteur', 5, 63, 4122, 20111, 21, 10, '2020-01-14 22:05:47', 60, 40, 20),
(33, 'Appartement B5', 'Residence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouvvvvvvvvResidence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouvvResidence Al FoutiyouResidence Al FoutiyouResidence Al', 122, 25, 22, 22, 422, 41, '2019-10-24 13:49:55', 60, 40, 20),
(34, 'Appartement B5', 'imeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yoliimeuble yolili', 5, 5, 5, 5, 4, 5, '2019-10-24 15:13:29', 60, 40, 20),
(35, 'Appartement A', 'Ķķķkkkkkkkkkklllllllllkhhgggfgggggggggvhhhh vvvvhhb kkkkkkkkkkķkkkkkkkkkhjiihhhvvccccbbjdjjdbwbb,bbxjfnxjxnnxkkfnxkfkxlclnxn.    Xbnxnnxnxkjxn,kixnxnrikxnx', 63, 52, 58, 58, 58, 52, '2019-10-25 20:23:59', 60, 40, 20);

-- --------------------------------------------------------

--
-- Structure de la table `avancement`
--

DROP TABLE IF EXISTS `avancement`;
CREATE TABLE IF NOT EXISTS `avancement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avancement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `immobilier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6D2A7A2A5C7B99A9` (`immobilier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avancement`
--

INSERT INTO `avancement` (`id`, `avancement`, `pourcentage`, `immobilier_id`) VALUES
(1, 'terrassement', 20, 21),
(4, 'nnn', 14, 24),
(5, 'vwgff', 21, 25),
(7, '55', 55, 29),
(8, 'gg', 1, 30),
(9, '1', 1, 31),
(10, 'vwgff', 22, 32),
(14, 'mon avanv 1014', 2, 34),
(15, 'mon avanv 1014', 2, 35),
(16, 'avmaison1', 20, 36),
(17, 'avanmaison23', 41, 36),
(18, 'terrassement', 100, 37),
(19, 'élevation des murs', 50, 37),
(20, 'peinture', 58, 37),
(21, '2ccccccccccccc', 25, 38),
(22, '3ccccccccvvvvvvvvvv', 25, 38),
(23, '2ccccccccccccc', 25, 39),
(24, '3ccccccccvvvvvvvvvv', 25, 39),
(25, 'terrassement', 100, 1),
(26, 'terrassement', 12, 40),
(27, 'terrassement', 69, 5),
(29, 'terrassement', 56, 41);

-- --------------------------------------------------------

--
-- Structure de la table `cantine`
--

DROP TABLE IF EXISTS `cantine`;
CREATE TABLE IF NOT EXISTS `cantine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `update_at` datetime NOT NULL,
  `nbre_type_cantine` int(11) NOT NULL,
  `nbre_cantine_avendre` int(11) NOT NULL,
  `nbre_cantine_alouer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cantine`
--

INSERT INTO `cantine` (`id`, `type`, `prix`, `description`, `surface`, `update_at`, `nbre_type_cantine`, `nbre_cantine_avendre`, `nbre_cantine_alouer`) VALUES
(2, 'Cantine vip Bip VIP', 1000000, 'descvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 150, '1900-05-10 10:00:13', 90, 40, 50),
(3, 'c1111111111111111111111111', 100000, 'descvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 54444, '1900-05-10 10:00:13', 90, 40, 50),
(4, 'c1111111111111111111111111', 100000, 'descvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 54444, '1900-05-10 10:00:13', 90, 40, 50);

-- --------------------------------------------------------

--
-- Structure de la table `centre_commercial`
--

DROP TABLE IF EXISTS `centre_commercial`;
CREATE TABLE IF NOT EXISTS `centre_commercial` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `centre_commercial`
--

INSERT INTO `centre_commercial` (`id`) VALUES
(37),
(38),
(39);

-- --------------------------------------------------------

--
-- Structure de la table `centre_commercial_cantine`
--

DROP TABLE IF EXISTS `centre_commercial_cantine`;
CREATE TABLE IF NOT EXISTS `centre_commercial_cantine` (
  `centre_commercial_id` int(11) NOT NULL,
  `cantine_id` int(11) NOT NULL,
  PRIMARY KEY (`centre_commercial_id`,`cantine_id`),
  KEY `IDX_CD6ED81A1CE4515E` (`centre_commercial_id`),
  KEY `IDX_CD6ED81AD30588FE` (`cantine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `centre_commercial_cantine`
--

INSERT INTO `centre_commercial_cantine` (`centre_commercial_id`, `cantine_id`) VALUES
(37, 2),
(38, 3),
(39, 4);

-- --------------------------------------------------------

--
-- Structure de la table `cite`
--

DROP TABLE IF EXISTS `cite`;
CREATE TABLE IF NOT EXISTS `cite` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cite`
--

INSERT INTO `cite` (`id`) VALUES
(36),
(41);

-- --------------------------------------------------------

--
-- Structure de la table `cite_maison`
--

DROP TABLE IF EXISTS `cite_maison`;
CREATE TABLE IF NOT EXISTS `cite_maison` (
  `cite_id` int(11) NOT NULL,
  `maison_id` int(11) NOT NULL,
  PRIMARY KEY (`cite_id`,`maison_id`),
  KEY `IDX_2754DCF991638A88` (`cite_id`),
  KEY `IDX_2754DCF99D67D8AF` (`maison_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cite_maison`
--

INSERT INTO `cite_maison` (`cite_id`, `maison_id`) VALUES
(36, 1),
(36, 2),
(41, 4);

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalite`
--

DROP TABLE IF EXISTS `fonctionnalite`;
CREATE TABLE IF NOT EXISTS `fonctionnalite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fonctionnalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonctionnalite`
--

INSERT INTO `fonctionnalite` (`id`, `fonctionnalite`) VALUES
(1, 'piscine'),
(2, 'Garage'),
(4, 'Complexe sportif'),
(6, 'banque'),
(7, 'Shoping'),
(8, 'marché'),
(9, 'securité'),
(10, 'mosquee'),
(11, 'église'),
(12, 'ascenseur');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `immobilier_id` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appartement_id` int(11) DEFAULT NULL,
  `maison_id` int(11) DEFAULT NULL,
  `cantine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045F5C7B99A9` (`immobilier_id`),
  KEY `IDX_C53D045FE1729BBA` (`appartement_id`),
  KEY `IDX_C53D045F9D67D8AF` (`maison_id`),
  KEY `IDX_C53D045FD30588FE` (`cantine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `immobilier_id`, `filename`, `appartement_id`, `maison_id`, `cantine_id`) VALUES
(3, 5, '20190319_185830.jpg', NULL, NULL, NULL),
(5, 6, '20181122_222747.jpg', NULL, NULL, NULL),
(9, NULL, '20181206_175904.jpg', NULL, NULL, NULL),
(10, NULL, '20190103_221300.jpg', NULL, NULL, NULL),
(12, NULL, '20181215_230151.jpg', 10, NULL, NULL),
(17, NULL, '20190312_150208.jpg', 11, NULL, NULL),
(18, NULL, '20190312_150213.jpg', 11, NULL, NULL),
(19, NULL, '20190312_150218.jpg', 11, NULL, NULL),
(20, NULL, '20190312_150236.jpg', 11, NULL, NULL),
(21, 21, '20190106-145248-5da4cd454f1e0680394496.jpg', NULL, NULL, NULL),
(22, 21, '20190106-145257-5da4cd45558fa750020913.jpg', NULL, NULL, NULL),
(23, 21, '20190108-120854-5da4cd455e5bf162990284.jpg', NULL, NULL, NULL),
(24, 21, '20190112-114101-5da4cd45647c8276770784.jpg', NULL, NULL, NULL),
(25, NULL, '20190114-194248-5da4cd456a885462604844.jpg', 16, NULL, NULL),
(26, NULL, '20190114-194308-5da4cd45737cd371646164.jpg', 16, NULL, NULL),
(27, NULL, '20190120-152847-5da4cd457a93c903971733.jpg', 16, NULL, NULL),
(28, NULL, '20190120-152859-5da4cd457e3b6509710877.jpg', 16, NULL, NULL),
(41, 25, '20181215-230151-5da4d070c0386425182838.jpg', NULL, NULL, NULL),
(42, 25, '20181215-230202-5da4d070c7930408069570.jpg', NULL, NULL, NULL),
(43, NULL, '20181215-230151-5da4d070cd8ce163270413.jpg', 20, NULL, NULL),
(44, NULL, '20181215-230202-5da4d070d3de7958498600.jpg', 20, NULL, NULL),
(47, NULL, '20170107-183703-5da5e0b08bf0a611872181.jpg', 23, NULL, NULL),
(48, NULL, '1262315666760-5da5e0b093b4b797749512.jpg', 23, NULL, NULL),
(49, NULL, 'beautyplus-20170814105603-fast-5da5e0b0977ee816584493.jpg', 23, NULL, NULL),
(50, NULL, 'beautyplus-20170919125334-fast-5da5e0b09d0c9932278441.jpg', 23, NULL, NULL),
(51, 29, '221-77-190-95-05-20171011-181700-1-5da5e1fb82940169447786.jpg', NULL, NULL, NULL),
(52, 29, '221-78-294-58-22-20171022-215259-5da5e1fb85f21463588301.jpg', NULL, NULL, NULL),
(53, NULL, '221-77-190-95-05-20171011-181700-1-5da5e1fb89968370899050.jpg', 24, NULL, NULL),
(54, 30, '221-77-190-95-05-20171011-181700-5da73f0317745273924409.jpg', NULL, NULL, NULL),
(55, NULL, 'screenshot-20191011-235554-whatsapp-5da754cecbc7a939107631.jpg', 25, NULL, NULL),
(56, 32, '20180209-075247-5da75868a9b9a556510611.jpg', NULL, NULL, NULL),
(57, NULL, '20180209-075247-5da75868b59d5000275832.jpg', 26, NULL, NULL),
(58, NULL, '20170107-183703-5da75868b7db6665145174.jpg', 26, NULL, NULL),
(60, NULL, 'beautyplus-20170919125334-fast-5da8799402b3a574378814.jpg', 27, NULL, NULL),
(61, 34, '20181215-230202-5da9d7a94f0e6403058877.jpg', NULL, NULL, NULL),
(62, NULL, '20181206-175904-5da9d7a9556a1232141081.jpg', 29, NULL, NULL),
(63, NULL, '20181122-222755-5da9d7a95b7c0480519168.jpg', 29, NULL, NULL),
(64, 35, '20181215-230202-5da9d8b24adca245431152.jpg', NULL, NULL, NULL),
(65, NULL, '20181206-175904-5da9d8b261f49959233195.jpg', 30, NULL, NULL),
(66, NULL, '20181122-222755-5da9d8b269ce0446472107.jpg', 30, NULL, NULL),
(67, 37, '20181206-175904-5daa3435bcb6e519740646.jpg', NULL, NULL, NULL),
(68, 37, '20181215-230151-5daa3435c3fa1508510044.jpg', NULL, NULL, NULL),
(69, NULL, '20181122-222747-5daa3435cac0c348671181.jpg', NULL, NULL, 2),
(70, 38, '20181206-175904-5daa4dcd13394088372455.jpg', NULL, NULL, NULL),
(72, NULL, '20181122-222747-5daa4dcd2c21f203442767.jpg', NULL, NULL, 3),
(73, 39, '20181206-175904-5daa4f4b5cc28330310525.jpg', NULL, NULL, NULL),
(74, 39, '20181215-230151-5daa4f4b6a3fd920250680.jpg', NULL, NULL, NULL),
(75, NULL, '20181122-222747-5daa4f4b70b55838489101.jpg', NULL, NULL, 4),
(77, 1, '11-5db0e5c168d6d252748476.jpg', NULL, NULL, NULL),
(80, NULL, '115echauffement-5db1baccf3e66946771316.PNG', 34, NULL, NULL),
(83, NULL, 'img-20190913-wa0002-5db359df0f5fc424237906.jpg', 35, NULL, NULL),
(85, 41, 'car-img1-5e1e63648a944696937520.jpg', NULL, NULL, NULL),
(86, 41, 'car-img4-5e1e636492357196918579.jpg', NULL, NULL, NULL),
(87, NULL, 'sel-img6-5e1e63649941f958276347.jpg', NULL, 4, NULL),
(88, NULL, 'sel-img9-5e1e63649fbd6443814415.jpg', NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

DROP TABLE IF EXISTS `immeuble`;
CREATE TABLE IF NOT EXISTS `immeuble` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immeuble`
--

INSERT INTO `immeuble` (`id`) VALUES
(1),
(5),
(6),
(21),
(24),
(25),
(29),
(30),
(31),
(32),
(34),
(35),
(40);

-- --------------------------------------------------------

--
-- Structure de la table `immeuble_appartement`
--

DROP TABLE IF EXISTS `immeuble_appartement`;
CREATE TABLE IF NOT EXISTS `immeuble_appartement` (
  `immeuble_id` int(11) NOT NULL,
  `appartement_id` int(11) NOT NULL,
  PRIMARY KEY (`immeuble_id`,`appartement_id`),
  KEY `IDX_B95C147663768E3F` (`immeuble_id`),
  KEY `IDX_B95C1476E1729BBA` (`appartement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immeuble_appartement`
--

INSERT INTO `immeuble_appartement` (`immeuble_id`, `appartement_id`) VALUES
(1, 31),
(5, 35),
(6, 1),
(21, 16),
(24, 19),
(25, 20),
(29, 24),
(31, 25),
(32, 26),
(34, 29),
(35, 30),
(40, 33);

-- --------------------------------------------------------

--
-- Structure de la table `immobilier`
--

DROP TABLE IF EXISTS `immobilier`;
CREATE TABLE IF NOT EXISTS `immobilier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut_travaux` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `livraison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_at` datetime NOT NULL DEFAULT '1900-05-10 10:00:13',
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_cours',
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbre_locals` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immobilier`
--

INSERT INTO `immobilier` (`id`, `description`, `titre`, `debut_travaux`, `livraison`, `discr`, `update_at`, `etat`, `adresse`, `nbre_locals`) VALUES
(1, 'Situé à la foire, en retrait par rapport à la vdn, L\'immeuble Mouhamadou Moustapha Boly est un immeuble R+4, composé de16 appartements qui se déclinent en 4 modèles.\r\n\r\nLes appartements seront répartis sur deux paliers car desservant chacun deux appartements par niveau d’étage.\r\n\r\nLe choix architectural est basé sur la luminosité optimale et la valorisation de l’espace de vie dans chaque appartement.\r\n\r\nL’accès aux différents étages se fera par deux ascenseurs ou par deux cages d’escaliers distincts.\r\n\r\nLa terrasse supérieure sera accessible de tous par les cages d’escaliers.\r\n\r\nDes places de parking seront aménagées au niveau RDC de l’immeuble .', 'Immeuble Mouhamadou Moustapha Boly', 'dsf', 'QSD', 'immeuble', '1900-05-10 10:00:13', 'termine', 'Mon adresse', 1),
(5, 'qXSCbn,;:bbjjkkkwkdkkdjjbfnkfkkfkkkfnfkffkkkklllkksjdbxhxjfufbjjbdbbf bbdjdjfbxndudnnwuenwnbwudbbdjujw dbkdjkdbdf\r\nDbbdkixnf\r\nFnfbkfkkxĺfkkfli', 'qASZDF ghjklm', 'DC', 'XCD', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(6, 'lmkjhgjkl', 'qASZDF ghjklm', 'janbbv', 'QSD', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(21, 'description complet', 'test complet', 'Janvier', 'Fevrier', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(24, 'description complet', 'test complet', 'Janvier', 'Fevrier', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(25, 'ok', 'ok', 'ok', 'ok', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(29, 'cvxb,;', 'mon titre', 'Janvier', 'En cours', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(30, 'ddddddd', 'qASZDF ghjklm', 'dd', 'ddd', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(31, 'Tata', 'Toto', '1', '1', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(32, 'xscv nb', 'qASZDF ghjklm', 'bnh', 'j', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(34, 'dernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbvdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbv', 'dernier essai completbbbbbb', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'nnnnnnnnnnnnnnnnnnnnnnnnn', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(35, 'dernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbvdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbdernier essai completbbbbbbv', 'dernier essai completbbbbbb', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'nnnnnnnnnnnnnnnnnnnnnnnnn', 'immeuble', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(36, 'Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre\r\nIl fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre', 'Cite Fatou niang', '1111111hgfcx', 'vcbn,;', 'cite', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 2),
(37, 'Uneesescvbnvnqsn,sdvb,;;  merci kkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'centre commercial n°1', 'Janvier 2019', 'Mars 2019', 'centrecommerciale', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 1),
(38, 'descvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'mon centre commercial', '22', '44552', 'centrecommerciale', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(39, 'descvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdescvbnvnqsn,sdvb,;;,:,,,,,,,,,,,,kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'mon centre commercial', '22', '44552', 'centrecommerciale', '1900-05-10 10:00:13', 'en_cours', 'Mon adresse', 0),
(40, 'Residence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouvvvvvvvvResidence Al FoutiyouResidence Al FoutiyouResidence Al FoutiyouvvResidence Al FoutiyouResidence Al FoutiyouResidence Al', 'Residence Al Foutiyou', 'bbbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbbbb', 'immeuble', '2019-10-24 13:46:18', 'a_venir', 'Mon adresse', 0),
(41, 'fermentum et sollicitudin. Tempor nec feugiat nisl pretium fusce. Arcu non sodales neque sodales ut etiam. Tristique magna sit amet purus. Rhoncus mattis rhoncus urna neque. Senectus et netus et malesuada fames ac turpis. Ornare arcu odio ut sem nulla. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et. Mi sit a.', 'Cite Al Foutiyou Tall', 'Janvier 2020', 'Avril 2021', 'cite', '2020-01-15 00:57:07', 'en_cours', 'Ouest Foire', 1);

-- --------------------------------------------------------

--
-- Structure de la table `immobilier_fonctionnalite`
--

DROP TABLE IF EXISTS `immobilier_fonctionnalite`;
CREATE TABLE IF NOT EXISTS `immobilier_fonctionnalite` (
  `immobilier_id` int(11) NOT NULL,
  `fonctionnalite_id` int(11) NOT NULL,
  PRIMARY KEY (`immobilier_id`,`fonctionnalite_id`),
  KEY `IDX_14E639145C7B99A9` (`immobilier_id`),
  KEY `IDX_14E639144477C5D8` (`fonctionnalite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immobilier_fonctionnalite`
--

INSERT INTO `immobilier_fonctionnalite` (`immobilier_id`, `fonctionnalite_id`) VALUES
(1, 1),
(1, 4),
(5, 7),
(5, 8),
(21, 2),
(24, 2),
(25, 2),
(25, 4),
(29, 4),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(36, 4),
(37, 2),
(37, 4),
(38, 4),
(39, 4),
(40, 6),
(41, 2),
(41, 6);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `chambres` int(11) NOT NULL,
  `salles_de_bain` int(11) NOT NULL,
  `etages` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `cuisines` int(11) NOT NULL,
  `salons` int(11) NOT NULL,
  `garages` int(11) NOT NULL,
  `piscines` int(11) NOT NULL,
  `jardins` int(11) NOT NULL,
  `update_at` datetime NOT NULL,
  `nbre_type_maison` int(11) NOT NULL,
  `nbre_maison_alouer` int(11) NOT NULL,
  `nbre_maison_avendre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id`, `type`, `description`, `surface`, `chambres`, `salles_de_bain`, `etages`, `prix`, `cuisines`, `salons`, `garages`, `piscines`, `jardins`, `update_at`, `nbre_type_maison`, `nbre_maison_alouer`, `nbre_maison_avendre`) VALUES
(1, 'maison tres grande', 'Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il', 125, 210, 12, 36, 3333333, 1, 2, 2, 2, 2, '1900-05-10 10:00:13', 70, 30, 40),
(2, 'maison 2111111111111', 'Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre Il fait bon vivre', 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, '1900-05-10 10:00:13', 70, 30, 40),
(4, 'F4 maison 4 etages', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor aliquam nulla facilisi cras fermentum odio eu feugiat pretium. Et sollicitudin ac orci phasellus. Enim', 500, 20, 15, 4, 20000000, 5, 4, 2, 2, 1, '2020-01-15 00:57:07', 20, 15, 5);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190902161814', '2019-09-02 16:18:31'),
('20190902162205', '2019-09-02 16:22:21'),
('20190904155809', '2019-09-04 15:59:35'),
('20190904160552', '2019-09-04 16:06:01'),
('20191014143357', '2019-10-14 14:34:35'),
('20191014160250', '2019-10-14 16:03:53'),
('20191018134539', '2019-10-18 13:46:04'),
('20191018151738', '2019-10-18 15:17:53'),
('20191018213553', '2019-10-18 21:36:26'),
('20191019165437', '2019-10-19 16:55:46'),
('20191019170316', '2019-10-19 17:03:32'),
('20191023223851', '2019-10-23 22:39:36'),
('20191024150052', '2019-10-24 15:01:11'),
('20191024151257', '2019-10-24 15:13:19'),
('20191024203036', '2019-10-24 20:32:19'),
('20191130201529', '2019-12-07 21:37:42'),
('20191130234040', '2019-12-07 21:37:43'),
('20191208123437', '2019-12-08 12:35:32'),
('20200112161647', '2020-01-12 16:19:14'),
('20200112161840', '2020-01-12 16:19:16');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `prenom`, `nom`) VALUES
(1, 'test@gmail.com', '[\"ROLE_SUPER_ADMIN\"]', '$argon2i$v=19$m=65536,t=6,p=1$dGk3RXppS1doSUxvbldlMQ$GA9KG0rGce8KdjwpXUkA2Yp82mHdCmB9Kh9zx47j8DQ', 'layemm', 'boly'),
(2, 'tuaa@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2i$v=19$m=65536,t=6,p=1$VGd2SGxidGRDRWhYSVlyYg$b5kBXsI5N9sDzF48JfRX4LtzAOlKTdsFda++rKrmYug', 'Tua', 'Barry');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avancement`
--
ALTER TABLE `avancement`
  ADD CONSTRAINT `FK_6D2A7A2A5C7B99A9` FOREIGN KEY (`immobilier_id`) REFERENCES `immobilier` (`id`);

--
-- Contraintes pour la table `centre_commercial`
--
ALTER TABLE `centre_commercial`
  ADD CONSTRAINT `FK_E2C0AC83BF396750` FOREIGN KEY (`id`) REFERENCES `immobilier` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `centre_commercial_cantine`
--
ALTER TABLE `centre_commercial_cantine`
  ADD CONSTRAINT `FK_CD6ED81A1CE4515E` FOREIGN KEY (`centre_commercial_id`) REFERENCES `centre_commercial` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CD6ED81AD30588FE` FOREIGN KEY (`cantine_id`) REFERENCES `cantine` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cite`
--
ALTER TABLE `cite`
  ADD CONSTRAINT `FK_395A5E7BBF396750` FOREIGN KEY (`id`) REFERENCES `immobilier` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cite_maison`
--
ALTER TABLE `cite_maison`
  ADD CONSTRAINT `FK_2754DCF991638A88` FOREIGN KEY (`cite_id`) REFERENCES `cite` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2754DCF99D67D8AF` FOREIGN KEY (`maison_id`) REFERENCES `maison` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F5C7B99A9` FOREIGN KEY (`immobilier_id`) REFERENCES `immobilier` (`id`),
  ADD CONSTRAINT `FK_C53D045F9D67D8AF` FOREIGN KEY (`maison_id`) REFERENCES `maison` (`id`),
  ADD CONSTRAINT `FK_C53D045FD30588FE` FOREIGN KEY (`cantine_id`) REFERENCES `cantine` (`id`),
  ADD CONSTRAINT `FK_C53D045FE1729BBA` FOREIGN KEY (`appartement_id`) REFERENCES `appartement` (`id`);

--
-- Contraintes pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD CONSTRAINT `FK_467D53F9BF396750` FOREIGN KEY (`id`) REFERENCES `immobilier` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `immeuble_appartement`
--
ALTER TABLE `immeuble_appartement`
  ADD CONSTRAINT `FK_B95C147663768E3F` FOREIGN KEY (`immeuble_id`) REFERENCES `immeuble` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B95C1476E1729BBA` FOREIGN KEY (`appartement_id`) REFERENCES `appartement` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `immobilier_fonctionnalite`
--
ALTER TABLE `immobilier_fonctionnalite`
  ADD CONSTRAINT `FK_14E639144477C5D8` FOREIGN KEY (`fonctionnalite_id`) REFERENCES `fonctionnalite` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_14E639145C7B99A9` FOREIGN KEY (`immobilier_id`) REFERENCES `immobilier` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
