-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 24 mai 2022 à 09:31
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hiolle_stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse_mac_hiolle_tech`
--

CREATE TABLE `adresse_mac_hiolle_tech` (
  `id` int(11) NOT NULL,
  `ip_adr_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_cetam_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_adr_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_adr_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiolle_adr_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cetam_adr_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adresse_mac_hiolle_tech`
--

INSERT INTO `adresse_mac_hiolle_tech` (`id`, `ip_adr_h_tech`, `ip_cetam_h_tech`, `mac_adr_h_tech`, `utilisateur_adr_h_tech`, `hiolle_adr_h_tech`, `cetam_adr_h_tech`) VALUES
(1, '', '33', '20:4E:7F:EC:E1:35', '', '', ''),
(2, '', '1', '00:11:F5:FD:53:D2', '', '', ''),
(3, '', '2', '00:12:F0:AC:08:E2', '', '', ''),
(4, '', '3', '00:13:02:05:AB:63', '', '', ''),
(5, NULL, '4', '00:13:02:54:89:AE\r\n', NULL, NULL, NULL),
(6, NULL, '5', '00:13:CE:E7:71:93\r\n', NULL, NULL, NULL),
(7, NULL, '6', '00:15:E9:2B:D4:E5\r\n', NULL, NULL, NULL),
(8, '15', '7', '00:16:44:83:13:B2\r\n', NULL, NULL, NULL),
(9, NULL, '8', '00:16:6F:65:C7:11\r\n', NULL, NULL, NULL),
(10, NULL, '9', '00:16:6F:71:43:14\r\n', NULL, NULL, NULL),
(11, NULL, '77', '00:17:23:FC:76:D6\r\n', 'Pistolet nexans', NULL, NULL),
(12, NULL, '10', '00:17:C4:9F:52:9A\r\n', NULL, NULL, 'Oui'),
(13, '40', NULL, '00:17:C4:A5:3A:AE\r\n', NULL, NULL, NULL),
(14, '45', '11', '00:18:DE:C2:AB:F4\r\n', NULL, NULL, NULL),
(15, NULL, '12', '00:19:D2:03:01:A1\r\n', NULL, NULL, NULL),
(16, NULL, '13', '00:1C:26:1A:05:8B\r\n', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220502084520', '2022-05-02 08:45:30', 226),
('DoctrineMigrations\\Version20220503081656', '2022-05-03 08:17:07', 210),
('DoctrineMigrations\\Version20220505133208', '2022-05-05 13:32:26', 264),
('DoctrineMigrations\\Version20220505135141', '2022-05-05 13:51:48', 229),
('DoctrineMigrations\\Version20220505140508', '2022-05-05 14:05:12', 189),
('DoctrineMigrations\\Version20220505140904', '2022-05-05 14:09:12', 217),
('DoctrineMigrations\\Version20220511085711', '2022-05-11 08:57:19', 460),
('DoctrineMigrations\\Version20220511123313', '2022-05-11 12:36:04', 492),
('DoctrineMigrations\\Version20220512090710', '2022-05-12 09:07:17', 96),
('DoctrineMigrations\\Version20220516132216', '2022-05-16 13:22:25', 1342),
('DoctrineMigrations\\Version20220516134337', '2022-05-16 13:43:42', 196),
('DoctrineMigrations\\Version20220517091204', '2022-05-17 09:12:11', 1391),
('DoctrineMigrations\\Version20220518121036', '2022-05-18 12:10:45', 289),
('DoctrineMigrations\\Version20220519073139', '2022-05-19 07:35:15', 182),
('DoctrineMigrations\\Version20220519073251', '2022-05-19 07:38:53', 133),
('DoctrineMigrations\\Version20220519073609', '2022-05-19 07:38:53', 173),
('DoctrineMigrations\\Version20220519074050', '2022-05-19 07:41:50', 141),
('DoctrineMigrations\\Version20220519084700', '2022-05-19 08:49:04', 220),
('DoctrineMigrations\\Version20220519090719', '2022-05-19 09:07:37', 156),
('DoctrineMigrations\\Version20220519091137', '2022-05-19 09:11:43', 153),
('DoctrineMigrations\\Version20220519131726', '2022-05-19 13:17:44', 336),
('DoctrineMigrations\\Version20220520120819', '2022-05-20 12:08:28', 595);

-- --------------------------------------------------------

--
-- Structure de la table `les_ordinateurs`
--

CREATE TABLE `les_ordinateurs` (
  `id` int(11) NOT NULL,
  `nom_de_la_station` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_habituel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque_de_la_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microsoft_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_acceuil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moniteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clavier_souris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `les_ordinateurs`
--

INSERT INTO `les_ordinateurs` (`id`, `nom_de_la_station`, `utilisateur_habituel`, `marque_de_la_station`, `adresse_mac`, `tag`, `microsoft_office`, `station_acceuil`, `moniteur`, `clavier_souris`) VALUES
(1, 'AMODIAG-ST-001', 'Guillaume JACQUIN', 'DELL PRECISION 7710', '18DBF248346C', 'HNKMQF2D', 'N87K7-QQBJF-G2PKD-24X8C-TMTJQ', '4448203600723', 'CN-029K46742616-71U-07UL', '0065811903964'),
(3, 'AMODIAG-ST-002', 'David PINTENAT', 'DELL PRECISION 7710', '18DBF24833EE', '3BNNQF2D', 'WDNRK-XX7HT-TYRRT-8MK3T-6F3R3', '4448203600715', 'CN-0292K4-74261-71U-07TL', '0065811904075'),
(4, 'AMODIAG-ST-003', 'Siham ANDRE', 'DELL PRECISION 7710', '18DBF251E7C0', 'GMKVQF2D', 'DNF68-THMFB-7CQCF-8P8CB-DPDR3', '4448203600631', 'CN-0292K4-74261-71U-0LML', '0065811904077'),
(7, 'AMODIAG-ST-004', 'Moussa KEBE', 'EliteBook x360 1030 G2', '', '5CG7093VWV', 'M4TPN-8CWPM-8VPT9-X49YM-B4GJQ', '7CB715B642', 'CN-0292K4-74261-71T-226L', ''),
(8, 'AMODIAG-ST-006', 'Laetita DESREUMAUX', 'DELI optilex 3040', '484D7EF0679A', 'G2HKXJ2', 'NW4YT-JXD4R-VDXY8-64MFW-PKB2D', 'NON', 'CN-0292K4-74261-71T-10RL', ''),
(9, 'AMODIAG-ST-007', 'Jerome DOCHY', 'EliteBook x360 1030 G2', 'F8633F218F54', '5CG7093RH3', 'JJNJT-94KR4-KVPFH-P6KW2-KW2WQ', '7CB715B861', 'CN-0292K4-74261-71U-OLKL', '0065811904079'),
(10, 'AMODIAG-ST-008', 'Adrien', 'HP ProBook 470 S', '001FB53269AA', '5CD826335Q', '', '', 'IIYAMA 1154981600146', 'NON'),
(11, 'AMODIAG-ST-009', 'CAROLINE', 'DELL VOSTRO', '34E12D9AA4AC', '99WDKR2', 'FGDMT-WNGK4-P2BT7VT822-27JCD', 'NON', 'IIYAMA 115638041712', '1836MR26C9D9'),
(12, 'AMODIAG-ST-010', 'GAILLON (1)', 'LENOVO', '8C16459B7EE7', 'PF-19BFLT 18/06', 'VD7WV-NJXJT-6FPPM-YKCC2J-82PWQ', 'OUI', 'NON', 'NON'),
(14, 'AMODIAG-ST-011', 'GAILLON (2)', 'LENOVO', '8C1645973C37', 'PF-19BXRZ', 'GFBNK-2789G-GQT92-KDDH3-YBHF3', 'OUI', 'NON', 'NON'),
(16, 'AMODIAG-ST-012', 'GAILLON (3)', 'LENOVO', '8C16457F2DEA', 'PF619BFMV', 'XCGKN-MMPK4-DWXY2-39F87-7QWCD', 'OUI', 'NON', 'NON'),
(17, 'AMODIAG-ST-013', 'Alexandra PAPET', 'LENOVO', '8C1645FCAD1B', 'PF-15KM3E', 'GNW9D-TDP4M-KDRX6-XKMR7-3J4PV', 'OUI', 'OUI', 'NON'),
(18, 'AMODIAG-ST-014', 'GABRIEL', 'LENOVO V330-15IKB', '181DEA6EA811', 'R90S33E8', 'M4T6D-NG7PJ-B87QM-YW6GR-6Q887', 'OUI', 'NON', 'NON'),
(19, 'AMODIAG-ST-015', 'Colline VILLALONGA', 'HP PROBOOK 650 G4', 'DC8B28928263', '5CG850455K', 'RXNFH-GCKK2-TKHWW-XYBCP-6JGFP', '8CJ841B54L', 'NON', 'NON'),
(20, 'AMODIAG-ST-016', 'Jonathan LEO', 'DELL VOSTRO 15', '3C2C30CF124D', '6WDGXS2', '46G4N-DDYW3-DHYQM-R9T6F-4X96H', 'NON', 'NON', 'NON'),
(21, 'AMODIAG-ST-017', 'VIVIEN MALICET', 'HP ZOOK', '', '', '', '', '', ''),
(22, 'AMODIAG-ST-018', 'LEA HESSE', '', '', '', '', '', '', ''),
(23, 'AMODIAG-ST-019', 'Laureen', '', '', '', '', '', '', ''),
(24, 'AMODIAG-ST-020', 'Cyrille GUICHOUX', 'HP 450 G7', 'BCE92F84BFA6', '5CD024HXC', '99GG-RHPTQ-TKG7T-D4KFW-P6QTZ', 'NON', 'NON', 'NON'),
(25, 'AMODIAG-ST-021', 'Alex BREVIERE', 'Dell Vostro15', 'C03EBA1C1B35', '9Z8VT43', 'TF2G2-MVWHP-WHYD6-9JYX9-G7THZ', 'NON', 'NON', 'NON'),
(27, 'AMODIAG-ST-022', 'Pierre LEBEAU', 'Dell Vostro 15 3591', '', '3011S53', 'X9HRQ-FDDDG-HH9CQ-VT7C7-7DMTZ', '', '', ''),
(28, 'AMODIAG-ST-023', 'Frederic BOUCHART', 'Dell Vostro 15 5502', '', '7CL7763', '', '', '', ''),
(29, 'AMODIAG-ST-024', 'DUPONT Thibaut', 'Dell Vostro 3591', 'C03EBA3029F0', 'FDD1S53', '', '', '', ''),
(30, 'AMODIAG-ST-025', 'Benjamin', 'Dell Vostro 15 3501', '30D04214589C', 'FCDFL73', '', '', '', ''),
(31, 'AMODIAG-ST-026', 'GOELOU Nevena', ' HP ProBook 450 G7', '3024A996DB1F', '5CD105GT1H', '663KQ-4VGHY-JXPH9-R6M4Q-CG7DG', 'NON', 'NON', 'NON'),
(32, 'AMODIAG-ST-027', 'Veronique DELSART', 'Dell VOSTRO 3500', '60189512706B', '3Y3W1D3', 'XY4MW-HGHRJ-MDXXY-H33RH-KYGPZ', '', '', ''),
(33, 'AMODIAG-ST-028', 'Maxime TOUZEAU', 'Dell VOSTRO 5502', '7412B3C8A643', '8ZLZZ93', 'VJKV2-3XC7Q-64FFV-6TG3V-MP2TZ', '', '', ''),
(34, 'AMODIAG-ST-031', 'Gerard PAYEN ', 'FUJITSU LIFEBOOK', 'EC7949ED28A4', 'EQAB163772', 'YR7KD-QTVH4-MD9XK-X44JM-FHRFZ', 'NON', 'NON', ''),
(35, 'AMODIAG-ST-032', 'Stephan MAILLET ', 'FUJITSU LIFEBOOK', 'EC7949ED2DAF', 'EQAB163661', '73YC6-4M3TK-P9V6R-TFMT9-C9D6Z', '', 'OUI', 'OUI'),
(36, 'AMODIAG-ST-033', 'Marine NORROY ', 'FUJITSU LIFEBOOK', 'EC7949EC25F9', 'EQAB122427', 'XPF2Y-TM44C-W9KQ3-VHF34-77TCZ', 'NON', 'NON', 'NON'),
(37, 'AMODIAG-ST-035', 'FOUCART François', 'FUJITSU LIFEBOOK', 'EC7949ED5FE6', 'EQAB163294', '24MYX-QX477-Q4C4M-32J6V-MXYMZ', '', 'OUI', 'OUI'),
(38, 'AMODIAG-ST-036', 'Stéphane KACZMAREK', 'HP STATION Z4 G4', '6C02E065AE98', 'CZC210BGYL', 'K272R-VXK33-VWD4H-H26HK-WPDFZ', '', '', ''),
(39, 'AMODIAG-ST-029', '', '', '', '', '', '', '', ''),
(40, 'AMODIAG-ST-030', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `les_ordi_graff`
--

CREATE TABLE `les_ordi_graff` (
  `id` int(11) NOT NULL,
  `nom_station_graff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque_station_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mac_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microsoft_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_acceuil_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moniteur_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clavier_souris_graff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `les_ordi_graff`
--

INSERT INTO `les_ordi_graff` (`id`, `nom_station_graff`, `utilisateur_graff`, `marque_station_graff`, `adresse_mac_graff`, `tag_graff`, `microsoft_graff`, `station_acceuil_graff`, `moniteur_graff`, `clavier_souris_graff`) VALUES
(3, 'ted', 'ess', 'dddd', 'aq', 'xx', 'fc', 'fss', 'f', 'df'),
(4, 'rrrrrrrrrrrrrrrrrrrrrr', 't', 'w', '', '', '', '', '', ''),
(5, 'ttttttttt', '', '', '', '', '', '', '', ''),
(6, 'm', '', '', '', '', 'fc', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `les_ordi_hiolle_industries`
--

CREATE TABLE `les_ordi_hiolle_industries` (
  `id` int(11) NOT NULL,
  `nom_station_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque_station_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mac_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microsoft_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_acceuil_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moniteur_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clavier_souris_h_indu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `les_ordi_hiolle_industries`
--

INSERT INTO `les_ordi_hiolle_industries` (`id`, `nom_station_h_indu`, `utilisateur_h_indu`, `marque_station_h_indu`, `adresse_mac_h_indu`, `tag_h_indu`, `microsoft_h_indu`, `station_acceuil_h_indu`, `moniteur_h_indu`, `clavier_souris_h_indu`) VALUES
(1, 'test', 'test test w', '', '', '', '', '', '', ''),
(3, 'tes', 'test', '', '', '', '', '', '', '6766');

-- --------------------------------------------------------

--
-- Structure de la table `les_ordi_hiolle_technologies`
--

CREATE TABLE `les_ordi_hiolle_technologies` (
  `id` int(11) NOT NULL,
  `nom_station_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque_station_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mac_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_acceuil_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clavier_souris_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iplan_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipwlan_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produit_sn_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_mac_2_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clipper_local_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clipper_tse_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cle_clip_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp_admin_local_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_achat_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_bureau_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processeur_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memoire_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disque_dur_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_achat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garantie_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fo_p_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecran_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `syst_exploi_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `express_service_code_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carepack_hp_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carepack_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_serie_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imprimante_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sacoche_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pack_office_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `antivirus_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silog_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autocad_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autres_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msproject_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifie_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_demar_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `les_ordi_hiolle_technologies`
--

INSERT INTO `les_ordi_hiolle_technologies` (`id`, `nom_station_h_tech`, `utilisateur_h_tech`, `marque_station_h_tech`, `adresse_mac_h_tech`, `tag_h_tech`, `station_acceuil_h_tech`, `clavier_souris_h_tech`, `iplan_h_tech`, `ipwlan_h_tech`, `produit_sn_h_tech`, `adresse_mac_2_h_tech`, `clipper_local_h_tech`, `clipper_tse_h_tech`, `cle_clip_h_tech`, `observation_h_tech`, `mdp_admin_local_h_tech`, `service_h_tech`, `prix_achat_h_tech`, `silog`, `num_bureau_h_tech`, `ref_h_tech`, `processeur_h_tech`, `memoire_h_tech`, `disque_dur_h_tech`, `date_achat`, `garantie_h_tech`, `fo_p_h_tech`, `ecran_h_tech`, `syst_exploi_h_tech`, `express_service_code_h_tech`, `carepack_hp_h_tech`, `carepack_date`, `product_h_tech`, `num_serie_h_tech`, `iso_h_tech`, `imprimante_h_tech`, `reference_h_tech`, `sacoche_h_tech`, `pack_office_h_tech`, `antivirus_h_tech`, `scan_h_tech`, `silog_h_tech`, `autocad_h_tech`, `autres_h_tech`, `msproject_h_tech`, `identifie_h_tech`, `script_demar_h_tech`, `robot`) VALUES
(5, 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),

-- --------------------------------------------------------

--
-- Structure de la table `licence_online_hiolle_tech`
--

CREATE TABLE `licence_online_hiolle_tech` (
  `id` int(11) NOT NULL,
  `produit_licence_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste_licence_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utilisateur_licence_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_licence_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_licence_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `licence_online_hiolle_tech`
--

INSERT INTO `licence_online_hiolle_tech` (`id`, `produit_licence_h_tech`, `poste_licence_h_tech`, `utilisateur_licence_h_tech`, `code_licence_h_tech`, `date_licence_h_tech`) VALUES
(2, 'test', '', '', '', ''),

-- --------------------------------------------------------

--
-- Structure de la table `nouveau_entrant`
--

CREATE TABLE `nouveau_entrant` (
  `id` int(11) NOT NULL,
  `nom_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societe_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materiel_pc_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logiciel_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sacoche_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autre_demande_nouv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acces_reseau_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_nouv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_arrivee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `nouveau_entrant`
--

INSERT INTO `nouveau_entrant` (`id`, `nom_nouv`, `prenom_nouv`, `societe_nouv`, `service_nouv`, `materiel_pc_nouv`, `logiciel_nouv`, `sacoche_nouv`, `autre_demande_nouv`, `acces_reseau_nouv`, `adresse_nouv`, `date_arrivee`) VALUES
(2, 'Wicke', 'Julian', 'Hiolle Technologie', 'Informatique', 'Non', 'Non', 'Oui', 'Plus de frites à la cantine', 'non', 'non', '2022-05-02'),
(4, 'test2', 'test2', 'Hiolle Technologie', 'acceuil', 'Oui', 'Oui', 'Oui', '', 'oui', 'non', '2022-05-28'),
(5, 'test3', 'test', 'Amodiag', 'RH', 'Oui', 'Non', 'Oui', 'Avoir une machine à café', 'non', 'test3.test@hiolle-industries.fr', '2022-06-02'),
(6, 'toto', 'titi', 'Graff', 'acceuil', 'Non', 'Oui', 'Non', '', 'non', 'non', '2022-05-04');

-- --------------------------------------------------------

--
-- Structure de la table `office_licence_htech`
--

CREATE TABLE `office_licence_htech` (
  `id` int(11) NOT NULL,
  `poste_o_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_o_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_o_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_o_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `office_licence_htech`
--

INSERT INTO `office_licence_htech` (`id`, `poste_o_l_h_tech`, `utilisateur_o_l_h_tech`, `type_o_l_h_tech`, `licence_o_l_h_tech`) VALUES
(1, 'test', '', '', ''),

-- --------------------------------------------------------

--
-- Structure de la table `project_licence_htech`
--

CREATE TABLE `project_licence_htech` (
  `id` int(11) NOT NULL,
  `poste_p_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_p_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_p_l_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project_licence_htech`
--

INSERT INTO `project_licence_htech` (`id`, `poste_p_l_h_tech`, `utilisateur_p_l_h_tech`, `licence_p_l_h_tech`) VALUES
(1, 'test', '', ''),

-- --------------------------------------------------------

--
-- Structure de la table `serveurs_hiolle_tech`
--

CREATE TABLE `serveurs_hiolle_tech` (
  `id` int(11) NOT NULL,
  `nom_serv_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salle_serv_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_serv_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dc_serv_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_serv_h_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `serveurs_hiolle_tech`
--

INSERT INTO `serveurs_hiolle_tech` (`id`, `nom_serv_h_tech`, `salle_serv_h_tech`, `ip_serv_h_tech`, `dc_serv_h_tech`, `role_serv_h_tech`) VALUES
(1, 'test', '', '', '', ''),
-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'Julian', '[\"ROLE_ADMIN\"]', '$2y$13$7NDUrUOX7h2JNOGBDe6kbejbN637eEdE/UFEwh7lFkvJdEhZxU6dW'),
(3, 'Enzo', '[]', '$2y$13$xX.wIMg6db3beGsIbhrZLeugUpR7dYjP2aEe2OUzuuv6CYEJFAe9u'),
(4, 'JulianW', '[\"ROLE_ADMIN\"]', '$2y$13$N5Lk1uROaB6qsanCIfZdPuWp/uqEGQqNYJtjXudzSjKA4LoUKxYEO'),
(5, 'AdminTest', '[\"ROLE_ADMIN\"]', '$2y$13$CjKhbHjiMc/EtBj3ykFC7.HzUtG6/PvFSEtYh76Ju/rCC3S6l4A9C'),
(6, 'Kevin', '[]', '$2y$13$UDSOcu2IpvM9nBe.R7gTeeZeFKXVy98GcWzUBksZnoZ1cnmX3BhGu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse_mac_hiolle_tech`
--
ALTER TABLE `adresse_mac_hiolle_tech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `les_ordinateurs`
--
ALTER TABLE `les_ordinateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `les_ordi_graff`
--
ALTER TABLE `les_ordi_graff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `les_ordi_hiolle_industries`
--
ALTER TABLE `les_ordi_hiolle_industries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `les_ordi_hiolle_technologies`
--
ALTER TABLE `les_ordi_hiolle_technologies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `licence_online_hiolle_tech`
--
ALTER TABLE `licence_online_hiolle_tech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nouveau_entrant`
--
ALTER TABLE `nouveau_entrant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `office_licence_htech`
--
ALTER TABLE `office_licence_htech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_licence_htech`
--
ALTER TABLE `project_licence_htech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `serveurs_hiolle_tech`
--
ALTER TABLE `serveurs_hiolle_tech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse_mac_hiolle_tech`
--
ALTER TABLE `adresse_mac_hiolle_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `les_ordinateurs`
--
ALTER TABLE `les_ordinateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `les_ordi_graff`
--
ALTER TABLE `les_ordi_graff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `les_ordi_hiolle_industries`
--
ALTER TABLE `les_ordi_hiolle_industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `les_ordi_hiolle_technologies`
--
ALTER TABLE `les_ordi_hiolle_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `licence_online_hiolle_tech`
--
ALTER TABLE `licence_online_hiolle_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `nouveau_entrant`
--
ALTER TABLE `nouveau_entrant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `office_licence_htech`
--
ALTER TABLE `office_licence_htech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `project_licence_htech`
--
ALTER TABLE `project_licence_htech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `serveurs_hiolle_tech`
--
ALTER TABLE `serveurs_hiolle_tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
