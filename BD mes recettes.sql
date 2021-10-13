-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : dim. 02 mai 2021 à 17:49
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `baptistecor_mes recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `directions`
--

CREATE TABLE `directions` (
  `step_order` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `step` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `directions`
--

INSERT INTO `directions` (`step_order`, `recipe_id`, `step`) VALUES
(121, 61, 'Mélanger le sucre et les oeufs, puis ajouter la farine'),
(122, 61, 'Ajouter enfin les amandes effilées et mélanger doucement afin de ne pas les briser'),
(123, 61, 'Faites cuire à 200°C pendant quelques minutes (ca va très vite), une fois sorti du four disposer les rapidement sur un objet arrondi afin de leur donner leur forme (rouleau a pâtisserie, bouteille en verre ...)'),
(124, 62, 'Mettre au four un dizaine de minutes les noisettes et amandes'),
(125, 62, 'Retirer grossièrement la peau de celle ci (frotter les dans vos mains)'),
(126, 62, 'Réaliser un caramel avec le sucre et l\'eau (environ 160°C)'),
(127, 62, 'Verser le caramel sur les noisettes et amandes disposer sur une plaque et laisser refroidir'),
(128, 62, 'Une fois froid casser en morceau et passer les au robot mixeur afin d\'obtenir une pate'),
(129, 63, 'Faire un caramel avec le sucre et l\'eau (160°C environ)'),
(130, 63, 'Ajouter les amandes puis étaler sur une plaque cuisson à l\'aide d\'un rouleau a pâtisserie huilé, n\'hésiter pas a la passer au four si la nougatine refroidi et devient trop dur a étaler'),
(131, 63, 'Une fois l\'épaisseur souhaité obtenu, il ne vous reste plus qu\'à la casser en morceaux'),
(132, 64, 'Faire fondre le beurre'),
(133, 64, 'Mélanger les oeufs avec le sucre, puis ajouter la farine avec la levure, puis enfin le reste (miel, beurre fondu, lait et vanille)'),
(134, 64, 'Cuire au four 200°C pendant environ 15 minutes'),
(135, 65, 'Faire fondre le beurre'),
(136, 65, 'Mélanger toutes les poudre avec les blancs d\'oeufs, puis ajouter doucement le beurre fondu'),
(137, 65, 'Faire cuire a 200°C pendant 15-20 minutes'),
(138, 66, 'Mettre a bouillir le lait avec la moitié du sucre'),
(139, 66, 'Mélanger l\'autre moitié du sucre avec les oeufs, puis ajouter la poudre a flan'),
(140, 66, 'Une fois que le lait bout, rassembler les deux mélange et faites bouillir'),
(141, 66, 'Débarrasser et faites refroidir'),
(142, 67, 'Faites bouillir le lait, la crème avec la vanille'),
(143, 67, 'Blanchir les jaunes d\'oeufs avec le sucre'),
(144, 67, 'Verser le contenu de la casserole sur le mélange'),
(145, 67, 'Repartir la crème dans des ramequins puis cuire au four au bain marie (1 heure, 100°C)'),
(146, 67, 'Laisser refroidir complètement'),
(147, 67, 'Disposer un peu de sucre sur la surface de la crème et bruler avec un chalumeau'),
(148, 68, 'Faites bouillir le lait avec la vanille'),
(149, 68, 'Mélanger le sucre avec les jaunes et faites blanchir'),
(150, 68, 'Réunir les deux mélange et faites cuire en mélangeant continuellement, la crème doit légèrement épaissir sinon vous pouvez utiliser un thermomètre et atteindre la température de 84°C'),
(151, 69, 'Mélanger le sucre et le beurre, ajouter ensuite la farine et la levure chimique, puis ajouter doucement les oeufs pour finir les pépites de chocolat'),
(152, 69, 'Faites ensuite des boudins de 1.350 kg puis couper les en 10, et les mettre en forme'),
(153, 69, 'Cuire au four à 180°C pendant environ 10 minutes'),
(154, 70, 'Bouillir le lait avec la vanille'),
(155, 70, 'Faire fondre le beurre'),
(156, 70, 'Fouetter les oeufs (oeufs + jaunes d\'oeufs) avec le sucre glace, ajouter ensuite le beurre fondu et le rhum puis la farine'),
(157, 70, 'Verser enfin le lait sur le mélange'),
(158, 70, 'Verser votre mélange dans vos moules préalablement beurré (remplir au 3/4)'),
(159, 70, 'Cuire à 200°C pendant 45 minutes'),
(160, 71, 'Faire fondre le beurre et le chocolat noir'),
(161, 71, 'Mélanger les oeufs avec le sucre glace et les faire blanchir, puis ajouter la farine et la levure chimique'),
(162, 71, 'Ensuite ajouter le beurre et chocolat fondu au mélange puis enfin les pépites'),
(163, 71, 'Faites cuire a 180°C pendant 30-40 minutes selon l\'épaisseur du brownie'),
(209, 98, 'Mélangez les graines moulues avec l’eau et laissez reposer 10min. Remuez de temps à autre pour éviter que les graines ne restent au fond.'),
(210, 98, 'Préchauffez le four à 180°C.'),
(211, 98, 'Placez le chocolat et le lait au bain marie, remuez jusqu’à ce que le chocolat soit fondu. Laissez refroidir 10min.'),
(212, 98, 'Dans un robot placez les betteraves cuites grossièrement coupées, le sucre, le mélange de graines de chia, la farine, la levure et le sel. Mixez bien pour qu’il n’y ai plus de morceaux de betteraves.'),
(213, 98, 'Ajoutez le mélange lait, chocolat et mixez jusqu’à obtenir une pâte au cordon, lisse et homogène.'),
(214, 98, 'Torréfier les fruits sec au four pendant 10 minutes puis les concasser grossièrement'),
(215, 98, 'Mélanger les fruits secs à l\'appareil en gardant quelques fruits secs de côté'),
(216, 98, 'Versez dans le moule, beurré, fariné ou recouvert de papier cuisson. Recouvrez des fruits secs restant et pourquoi pas ajouter quelques carré de chocolat en insert pour plus de gourmandise'),
(217, 98, 'Enfournez pour 30 minutes à 180°C.\r\nLaissez refroidir avant de démouler.');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` varchar(15) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `ingredient_name`, `quantity`, `unit`, `recipe_id`) VALUES
(137, ' blancs d\'oeufs', '480', ' g', 61),
(138, ' sucre', '1', ' kg', 61),
(139, ' amandes effilées', '800', ' g', 61),
(140, ' farine', '300', ' g', 61),
(141, ' oeufs', '4', ' ', 61),
(142, ' noisette', '300', ' g', 62),
(143, ' amande', '300', ' g', 62),
(144, ' sucre', '600', ' g', 62),
(145, ' eau', '150', ' g', 62),
(146, ' sucre', '1', ' kg', 63),
(147, ' eau', '250', ' g', 63),
(148, ' amandes effilées', '500', ' g', 63),
(149, ' oeufs', '9', ' ', 64),
(150, ' sucre', '525', ' g', 64),
(151, ' beurre', '375', ' g', 64),
(152, ' miel', '75', ' g', 64),
(153, ' lait', '375', ' g', 64),
(154, ' farine', '825', ' g', 64),
(155, ' levure chimique', '45', ' g', 64),
(156, ' vanille liquide', '0', ' ', 64),
(157, ' sucre', '1', ' kg', 65),
(158, ' poudre d\'amande', '500', ' g', 65),
(159, ' farine', '500', ' g', 65),
(160, ' levure chimique', '20', ' g', 65),
(161, ' blanc d\'oeuf', '1', ' L', 65),
(162, ' beurre', '500', ' g', 65),
(163, ' lait', '1', ' L', 66),
(164, ' oeufs', '4', ' ', 66),
(165, ' sucre', '250', ' g', 66),
(166, ' poudre à flan', '100', ' g', 66),
(167, ' lait', '250', ' g', 67),
(168, ' crème liquide', '250', ' g', 67),
(169, ' vanille', '0', ' ', 67),
(170, ' jaunes d\'oeufs', '4', ' ', 67),
(171, ' sucre', '80', ' g', 67),
(172, ' lait', '500', ' g', 68),
(173, ' jaunes d\'oeufs', '4', ' ', 68),
(174, ' sucre', '135', ' g', 68),
(175, ' vanille', '0', ' ', 68),
(176, ' farine', '3', ' kg', 69),
(177, ' sucre', '1', ' kg', 69),
(178, ' beurre', '2', ' kg', 69),
(179, ' levure chimique', '200', ' g', 69),
(180, ' oeufs', '12', ' ', 69),
(181, ' pépites de chocolat', '3', ' kg ', 69),
(182, ' vanille', '0', ' ', 70),
(183, ' lait', '500', ' g', 70),
(184, ' beurre', '50', ' g', 70),
(185, ' oeufs', '2', ' ', 70),
(186, ' jaunes d\'oeufs', '2', ' ', 70),
(187, ' sucre glace', '250', ' g', 70),
(188, ' rhum', '0', ' ', 70),
(189, ' farine', '100', ' g', 70),
(190, ' chocolat noir', '900', ' g', 71),
(191, ' beurre', '750', ' g', 71),
(192, ' sucre glace', '1200', ' g', 71),
(193, ' oeufs', '600', ' g', 71),
(194, ' farine', '600', ' g', 71),
(195, ' levure chimique', '15', ' g', 71),
(196, ' pépites de chocolat', '500', ' g', 71),
(240, 'betterave cuite', '200', 'g', 98),
(241, 'chocolat noir', '200', 'g', 98),
(242, 'lait d\'amande', '100', 'ml', 98),
(243, 'graines de lin moulue', '2', 'cs', 98),
(244, 'sucre de coco raffiné', '50', 'g', 98),
(245, 'farine complète', '100', 'g', 98),
(246, 'levure', '1', 'sachet', 98),
(247, 'sel', '1', 'pincée', 98),
(248, 'noix', '25', 'g', 98),
(249, 'noisette', '25', 'g', 98),
(250, 'pécan\r\n', '25', 'g', 98),
(251, 'pistache', '25', 'g', 98);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `validate`) VALUES
(1, 'Poche à douille jetable', 19, 'picture_1.jpg', 1),
(15, 'Boîte de 6 douilles ', 15, 'picture_15.jpg', 1),
(16, 'Boîte de 36 douilles', 55, 'picture_16.jpg', 1),
(17, 'Couteau d\'office \r\n', 25, 'picture_17.jpg', 1),
(18, 'Couteau-scie à génoise', 38, 'picture_18.jpg', 1),
(19, 'Douille à petits fours', 4, 'picture_19.jpg', 1),
(20, 'Douille à Saint-Honoré', 4, 'picture_20.jpg', 1),
(21, 'Couteau éminceur', 45, 'picture_21.jpg', 1),
(22, 'Fouet - 25 cm', 15, 'picture_22.jpg', 1),
(23, 'Fouet inox - 20 cm', 11, 'picture_23.jpg', 1),
(24, 'Maryse - 35 cm', 7, 'picture_24.jpg', 1),
(25, 'Maryse - 25 cm', 14, 'picture_25.jpg', 1),
(26, 'Pinceau pâtisserie', 5, 'picture_26.jpg', 1),
(27, 'Pinceau pâtisserie', 11, 'picture_27.jpg', 0),
(28, 'Poche à douille \r\n', 10, 'picture_28.jpg', 1),
(29, 'Rouleau à pâtisserie', 8, 'picture_29.jpg', 1),
(30, 'Rouleau à pâtisserie', 30, 'picture_30.jpg', 1),
(31, 'Spatule coudée ', 24, 'picture_31.jpg', 1),
(32, 'Spatule ', 5, 'picture_32.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `product_description`
--

CREATE TABLE `product_description` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product_description`
--

INSERT INTO `product_description` (`id`, `product_id`, `description`) VALUES
(1, 1, 'Poches à douille jetables en polyéthylène transparent.'),
(2, 1, 'Ces poches pâtissières à usage unique transparentes sont idéales quand on travaille avec des préparations de différentes couleurs.'),
(3, 1, 'La température maximale préconisée pour les préparations est de 70°C.'),
(4, 1, 'Matière : Polyéthylène'),
(5, 1, 'Dimensions : 51 x 30 cm'),
(6, 1, 'Epaisseur : 70 microns'),
(7, 1, 'Marque : Matfer'),
(8, 1, 'Conditionnement : Boîte distributrice carton de 100 poches'),
(24, 15, 'Boîte de 6 douilles unies en acier inoxydable monobloc, sans bord roulé.'),
(25, 15, 'Entretien facile.'),
(26, 15, 'Ø 2, 6, 8, 10, 12, 14 mm'),
(27, 15, 'Répondent aux exigences de l\'hygiène'),
(28, 16, 'Boîte de 36 douilles en acier inoxydable monobloc, sans bord roulé.'),
(29, 16, 'Entretien facile.'),
(30, 16, 'Répondent aux exigences de l\'hygiène.'),
(31, 16, '10 douilles unies (4-6-7-9-10-12-13-15-16-18 mm)'),
(32, 16, '16 douilles cannelées (6 dents : 4-6-7-8-9-10 mm / 7 dents : 12-13 mm / 8 dents : 15 mm / 9 dents : 16-18 mm / 6 dents recourbées : 6 mm / 7 dents recourbées : 9 mm / 8 dents recourbées : 10 mm / 9 dents recourbées : 11 mm / 10 dents recourbées : 18 mm)'),
(33, 16, '5 douilles petits fours (7-9-10-13-15 mm)'),
(34, 16, '2 douilles fleurs (5-6 mm)'),
(35, 16, '2 douilles à bûche (20x3 / 16x2)'),
(36, 16, '1 douille à choux'),
(37, 16, '2 adaptateurs'),
(38, 17, 'Couteau d\'office, gamme Sabatier-Deg, 10 cm'),
(39, 17, 'Lame acier inoxydable. Mitre ronde forgée dans la masse de la lame, manche en thermo-plastique noir garanti lave-vaisselle, 3 rivets aluminium.'),
(40, 17, 'Longueur lame : 10 cm'),
(41, 17, 'Marque : Déglon'),
(42, 18, 'Couteau-scie à génoise (ou entremets). Lame en acier inoxydable pleine soie, manche ABS, 3 rivets, mitre alu rapportée.'),
(43, 18, 'Mis au point par Jean Déglon, le crantage '),
(44, 18, 'Ce crantage permet des découpe sur des mets plus fragiles : pain de mie, génoise, entremets...'),
(45, 18, 'Petites dents de 5,6 mm x ht 1,2 mm'),
(46, 18, 'Longueur lame : 30 cm'),
(47, 19, 'Douille à petits fours, à nombreuses dents, en copolyester.'),
(48, 19, 'Modèle : PF 18'),
(49, 19, 'Diamètre : 18 mm'),
(50, 20, 'Douille pour garnir le Saint-Honoré. En acier inoxydable.'),
(51, 20, 'Dimensions : ht 5,3 cm. Ø trou 1,3 cm'),
(52, 21, 'Couteau éminceur, gamme Sabatier-Deg 20 cm.'),
(53, 21, 'Lame acier inoxydable. Mitre ronde forgée dans la masse de la lame, manche en thermo-plastique noir garanti lave-vaisselle, 3 rivets aluminium.'),
(54, 21, 'Longueur lame : 20 cm'),
(55, 21, 'Marque : Déglon'),
(56, 22, 'Grâce aux fils à mémoire de forme, la pomme du fouet FMC est invrillable pour durée plus longtemps.'),
(57, 22, 'Manche en Exoglass® étanche, résistant à 220° sans risque de brûlure et assurant une parfaite prise en main. Facile d\'entretien, le fouet FMC est lavable au lave-vaisselle'),
(58, 22, 'Démarche HACCP. Agréé NF hygiène alimentaire.'),
(59, 22, 'Pomme classique'),
(60, 22, 'Longueur total : 25 cm'),
(61, 22, 'Longueur manche : 10 cm'),
(62, 23, 'Fouet de cuisine en acier inoxydable 18/10. Qualité professionnelle.'),
(63, 23, 'Longueur totale : 20 cm'),
(64, 23, 'Longueur manche : 8 cm'),
(65, 24, 'Spatule souple à embout en caoutchouc, permettant la récupération totale des crèmes et des sauces dans les récipients de préparation.'),
(66, 24, 'Manche Exoglass® en matériau composite, palette en élastomère thermoplastique. Résistant à 70°C.'),
(67, 24, 'Tenue en température : 70° C'),
(68, 24, 'Longueur totale : 35 cm'),
(69, 24, 'Manche : 23,5 cm'),
(70, 24, 'Palette : 11,5 x 7 cm'),
(71, 25, 'Spatule utilisable pendant la cuisson. Palette souple pour racler parfaitement l\'intérieur des récipients sans les abimer. Lavable au lave vaisselle.'),
(72, 25, 'Recommandée pour les récipients à revêtement anti-adhérent.'),
(73, 25, 'Tenue en température : 260°C'),
(74, 25, 'Longueur totale : 25 cm'),
(75, 25, 'Manche : 17 cm'),
(76, 25, 'Palette : 8,3 x 5,2 cm'),
(77, 26, 'Pinceau pour la pâtisserie, poils en soie naturelle, garanti sans traitement chimique, qualité alimentaire.'),
(78, 26, 'Le montage de la virole rend l\'ensemble indémanchable.'),
(79, 26, 'Manche et virole en matériau composite.'),
(80, 26, 'Lavable au lave-vaisselle.'),
(81, 26, 'Tirure : 6 cm'),
(82, 26, 'Largeur : 3 cm'),
(83, 27, 'Pinceau pour la pâtisserie, poils en soie naturelle, garanti sans traitement chimique, qualité alimentaire.'),
(84, 27, 'Le montage de la virole rend l\'ensemble indémanchable.'),
(85, 27, 'Manche et virole en matériau composite.'),
(86, 27, 'Lavable au lave-vaisselle.'),
(87, 27, 'Tirure : 6 cm'),
(88, 27, 'Largeur : 7 cm'),
(89, 28, 'Poches en polyuréthane très solides et très souples sans bande de soudure ajoutée pour un plus grand confort.'),
(90, 28, 'Surface intérieure lisse pour le glissant des produits et la facilité de nettoyage.'),
(91, 28, 'Surface extérieure assurant une bonne prise en main.'),
(92, 28, 'Poches lavables et stérilisables.'),
(93, 28, 'Matière : Polyuréthane'),
(94, 28, 'Marque : Matfer'),
(95, 28, 'Longueur : 40 cm'),
(96, 29, 'Rouleau à pâtisserie droit en bois de hêtre.'),
(97, 29, 'Conçu pour les écoles et notamment pour être inséré dans les mallettes à pâtisserie.'),
(98, 29, 'Diamètre x longueur : Ø 5 cm x 42 cm'),
(99, 29, 'Poids : 500 g'),
(100, 30, 'Rouleau à pâtisserie droit, en polyéthylène blanc haute densité, monobloc, sans poignées.'),
(101, 30, 'Hygiène garantie.'),
(102, 30, 'Diamètre x longueur : Ø 4,5 x 45 cm'),
(103, 30, 'Poids : 700 g'),
(104, 30, 'Fabriqué en Europe'),
(105, 31, 'Spatule coudée en acier inoxydable trempé.'),
(106, 31, 'Lame flexible, manche surmoulé noir anti-dérapant.'),
(107, 31, 'Utile pour un dressage de précision, pour glacer les préparations, lisser les gâteaux, monter en pointe, exécuter des décors sur chocolat, etc.'),
(108, 31, 'Longueur totale : 47 cm'),
(109, 31, 'Longueur lame : 31 cm'),
(110, 31, 'Largeur : 5,1 cm'),
(111, 31, 'Marque : Matfer'),
(112, 32, 'Spatule en Exoglass®. Matériau composite répondant aux exigences de l\'hygiène. Il est imputrescible, lavable en machine et stérilisable.'),
(113, 32, 'Résistance : 220° C.'),
(114, 32, 'Longueur : 30 cm');

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `validate` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `picture`, `validate`, `user_id`) VALUES
(61, 'Tuiles aux amandes', 'picture_61.jpg', 1, 3),
(62, 'praliné', 'picture_62.jpg', 1, 3),
(63, 'nougatine', 'picture_63.jpg', 1, 3),
(64, 'madeleine', 'picture_64.jpg', 1, 3),
(65, 'financier', 'picture_65.jpg', 1, 3),
(66, 'crème pâtissière ', 'picture_66.jpg', 0, 3),
(67, 'crème brulée', 'picture_67.jpg', 1, 3),
(68, 'crème anglaise', 'picture_68.jpg', 1, 3),
(69, 'cookies', 'picture_69.jpg', 1, 3),
(70, 'cannelés', 'picture_70.jpg', 1, 3),
(71, 'brownie', 'picture_71.jpg', 1, 3),
(98, 'Brownies moelleux à la betterave', 'picture_98.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `inscription_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `address`, `city`, `zip_code`, `country`, `phone`, `inscription_date`, `email`, `password`, `admin`) VALUES
(3, 'cornic', 'baptiste', '10 chemin', 'noisy', '77777', 'france', '0606060606', '2021-03-22', 'baptiste@', '$2y$11$e5857f29bdb253bb4d6eaefVzPaQIwT4YX4BLDevdA4lbPQwngzMa', 1),
(4, 'bap', 'bap', 'bap', 'bap', 'bap77', 'bap', '0606060606', '2021-03-25', 'cornic@free.fr', '$2y$11$dd3830d404e7df3f962ccu6AIhOiuiMWrorW4SLVIcEazSB3NW.Oe', 0),
(5, 'Laville', 'mathieu', '21 ROUTE DE BECCON', 'CRUSEILLES', '74350', 'FRANCE', '0632762140', '2021-04-09', 'mathieulaville91690@gmail.com', '$2y$11$39fa3ce959f16fecdc11cusdBp/9v3nwvNP.sO00gSZVqfUS0RC7m', 1),
(6, 'Cornic', 'Alice', '10 chemin de la croix pigoreau', 'Noisy sur l\'école ', '77123', 'France', '3486964907', '2021-04-18', 'alice.cornic@inseec-france.com ', '$2y$11$05f2bf023ca6284d1771auL8F8mrnOtwWS6qyrIADOu0DVYnCuiYO', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`step_order`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `directions`
--
ALTER TABLE `directions`
  MODIFY `step_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `product_description`
--
ALTER TABLE `product_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
