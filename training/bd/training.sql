-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 26 sep. 2021 à 10:50
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `training`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idart` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `description` text,
  `lien` varchar(400) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(300) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  `code` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idart`, `nom`, `description`, `lien`, `created_at`, `image`, `type`, `idcat`, `code`) VALUES
(84, 'MEET YOUR INVESTORS – FINANCEMENT STARTUPS – ÉDITION 2021', '	                  &lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Mi-mars, toute l’équipe de l’incubateur IONIS 361 a eu la joie de pouvoir accueillir l’événement phare de l’incubateur sur le financement :&amp;nbsp;&lt;font color=&quot;#4c4c4c&quot; face=&quot;Open Sans, sans-serif&quot;&gt;&lt;span style=&quot;background-color: rgb(245, 245, 245);&quot;&gt;&lt;b&gt;Meet Your Investors&lt;/b&gt;.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;LE CONCEPT&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Meet Your Investors s’adresse à tous les entrepreneurs et startups accompagnés par l’incubateur&amp;nbsp;&lt;a href=&quot;https://www.ionis361.com/&quot; style=&quot;&quot;&gt;IONIS 361&lt;/a&gt;&amp;nbsp;en recherches de financements.&amp;nbsp;&lt;a href=&quot;https://actu.ionis-group.com/meet-your-investors-day/&quot; style=&quot;&quot;&gt;Chaque année&lt;/a&gt;, cet événement est un véritable tremplin pour ces dernières qui ont l’opportunité de rencontrer, sur quelques jours, tous les acteurs en financement, dilutif et non dilutif. Pour beaucoup, il marque le début de leur roadshow ou donne un coup d’accélérateur à leur phase de levée de fonds.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Durant 3 jours consécutifs, des rendez-vous de 20 minutes s’enchainent entre investisseurs et startups. Un rythme effréné où chaque entrepreneur répète son pitch inlassablement, où chaque intervenant dispense ses conseils.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pas de perte de temps, les rendez-vous sont personnalisés en fonction des différentes théories d’investissement et stratégies de financement.&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;MEET YOUR INVESTORS C’EST :&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;aligncenter wp-image-690 size-large&quot; src=&quot;https://wp.ionis-group.com/ionis361/wp-content/uploads/sites/12/2021/04/3-jours-de-rencontres-2-1024x410.png&quot; alt=&quot;Meet Your Investors en chiffres - financement&quot; width=&quot;640&quot; height=&quot;256&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; clear: both; margin: 20px 0px; width: 726.75px;&quot;&gt;&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;L’OBJECTIF :&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pour les entrepreneurs, l’objectif est double. Trouver des solutions adaptées à leurs besoins et convaincre les investisseurs de continuer l’aventure à leurs côtés.&lt;br&gt;Les acteurs en financement rencontrent de nouvelles jeunes pousses, découvrent de nouveaux projets et sélectionnent ceux qui les ont convaincus.&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;ET APRÈS ?&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Un premier contact entre les startups et investisseurs a été créé mais cela va plus loin !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les entreprises en recherche de financement non-dilutif savent maintenant vers qui se tourner. Elles ont pu déposer dossiers et autres candidatures. De nombreuses startups entrant en roadshow ont débuté un parcours avec les fonds d’investissements intéressés. Les pitchs et négociations se poursuivent.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Nous ne doutons pas de pouvoir vous compter de belles « success stories » très prochainement !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;A la joie de cet événement en présentiel, s’ajoute le constat satisfaisant que les startups traversent vaillamment et brillamment cette crise sans précédent. La mobilisation des acteurs en financement prouve un vrai attrait pour les startups, une continuité dans le soutient et l’envie de les accompagner dans cette aventure !&lt;/p&gt;\r\n                          \r\n	              ', '', '2021-07-24 12:15:23', '1679915681.png', 'texte', 23, NULL),
(85, 'OPEN ISEG : LES GRANDS GAGNANTS !', '	                  &lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Mi-mars, toute l’équipe de l’incubateur IONIS 361 a eu la joie de pouvoir accueillir l’événement phare de l’incubateur sur le financement :&amp;nbsp;&lt;font color=&quot;#4c4c4c&quot; face=&quot;Open Sans, sans-serif&quot;&gt;&lt;span style=&quot;background-color: rgb(245, 245, 245);&quot;&gt;&lt;b&gt;Meet Your Investors&lt;/b&gt;.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;LE CONCEPT&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Meet Your Investors s’adresse à tous les entrepreneurs et startups accompagnés par l’incubateur&amp;nbsp;&lt;a href=&quot;https://www.ionis361.com/&quot; style=&quot;&quot;&gt;IONIS 361&lt;/a&gt;&amp;nbsp;en recherches de financements.&amp;nbsp;&lt;a href=&quot;https://actu.ionis-group.com/meet-your-investors-day/&quot; style=&quot;&quot;&gt;Chaque année&lt;/a&gt;, cet événement est un véritable tremplin pour ces dernières qui ont l’opportunité de rencontrer, sur quelques jours, tous les acteurs en financement, dilutif et non dilutif. Pour beaucoup, il marque le début de leur roadshow ou donne un coup d’accélérateur à leur phase de levée de fonds.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Durant 3 jours consécutifs, des rendez-vous de 20 minutes s’enchainent entre investisseurs et startups. Un rythme effréné où chaque entrepreneur répète son pitch inlassablement, où chaque intervenant dispense ses conseils.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pas de perte de temps, les rendez-vous sont personnalisés en fonction des différentes théories d’investissement et stratégies de financement.&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;MEET YOUR INVESTORS C’EST :&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;aligncenter wp-image-690 size-large&quot; src=&quot;https://wp.ionis-group.com/ionis361/wp-content/uploads/sites/12/2021/04/3-jours-de-rencontres-2-1024x410.png&quot; alt=&quot;Meet Your Investors en chiffres - financement&quot; width=&quot;640&quot; height=&quot;256&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; clear: both; margin: 20px 0px; width: 726.75px;&quot;&gt;&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;L’OBJECTIF :&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pour les entrepreneurs, l’objectif est double. Trouver des solutions adaptées à leurs besoins et convaincre les investisseurs de continuer l’aventure à leurs côtés.&lt;br&gt;Les acteurs en financement rencontrent de nouvelles jeunes pousses, découvrent de nouveaux projets et sélectionnent ceux qui les ont convaincus.&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;ET APRÈS ?&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Un premier contact entre les startups et investisseurs a été créé mais cela va plus loin !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les entreprises en recherche de financement non-dilutif savent maintenant vers qui se tourner. Elles ont pu déposer dossiers et autres candidatures. De nombreuses startups entrant en roadshow ont débuté un parcours avec les fonds d’investissements intéressés. Les pitchs et négociations se poursuivent.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Nous ne doutons pas de pouvoir vous compter de belles « success stories » très prochainement !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;A la joie de cet événement en présentiel, s’ajoute le constat satisfaisant que les startups traversent vaillamment et brillamment cette crise sans précédent. La mobilisation des acteurs en financement prouve un vrai attrait pour les startups, une continuité dans le soutient et l’envie de les accompagner dans cette aventure !&lt;/p&gt;\r\n                          \r\n	              ', '', '2021-07-24 12:19:52', '1784485231.jpg', 'texte', 23, NULL),
(86, 'CONSEILS D’EXPERTS BOOSTCAMP #1', '&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Mi-juin, l’association Les Déterminés et l’incubateur IONIS 361 ont lancé le programme de formation intensive à l’entrepreneuriat le Boostcamp pour partager leurs conseils en création d’entreprise&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Chaque jour, les porteurs de projet sélectionnés participent à des&amp;nbsp;workshops, des rencontres avec des entrepreneurs inspirants et un accompagnement personnalisé par les startups manager IONIS 361.&lt;br&gt;Tout au long de la première semaine du Boostcamp, nous avons pu découvrir les «&amp;nbsp;good tips&amp;nbsp;» de nos experts&amp;nbsp;en création et développement d’entreprises. Nous avons décidé de vous partager leurs meilleurs conseils !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Design Thinking&lt;/p&gt;&lt;figure id=&quot;attachment_655&quot; aria-describedby=&quot;caption-attachment-655&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 404px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-655&quot; title=&quot;design-thinking&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/06/ux-indonesia-pqzRfBhd9r0-unsplash-1024x683.jpg&quot; alt=&quot;conseils en design thinking&quot; width=&quot;404&quot; height=&quot;269&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 404px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-655&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;boostcamp – design thinking&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;L’expérience utilisateur est au centre de toutes les préoccupations, et pour cause ! Si cette dernière est négative, elle ne conduira pas l’utilisateur à renouveler l’expérience, justement.&lt;br&gt;C’est pourquoi, le rôle du designer est essentiel. Pour garantir la meilleure expérience possible, il ne faut pas se reposer sur ses lauriers.&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les points clés du design thinking : curiosité, empathie, créativité, prototyper, tester, faire des erreurs et recommencer. Les enfants sont des experts dans ce domaine !&lt;/p&gt;&lt;/blockquote&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;L’expérience utilisateur est importante mais l’utilisateur dans tout ça ? Il est et doit rester la priorité de toute entreprise. Connaître ses utilisateurs est essentiel et ces derniers peuvent évoluer.&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Poser son persona sur papier pour toujours garder en tête le profil pour qui l’on réalise son produit.&lt;/p&gt;&lt;/blockquote&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Conseils de Jonathan Scanzi – co-fondateur&amp;nbsp;&lt;a href=&quot;https://evolt.io/&quot; style=&quot;&quot;&gt;Evolt&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Analyse du marché&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;42% des entreprises ne survivent pas à cause de l’absence de marché pour le produit ou le service qu’elles ont créé. Ce chiffre à lui seul révèle l’importance des études de marché.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;L’analyse du marche n’est jamais une étape simple mais elle est pourtant primordiale pour avancer dans son projet.&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les erreurs à ne pas commettre :&lt;br&gt;sous estimer l’importance de l’étude de marché et de la concurrence&lt;br&gt;ne pas analyser la réglementation liée à son marché&lt;br&gt;vouloir tout faire seul ou à l’inverse tout déléguer&lt;br&gt;ne pas challenger les informations récoltées et leur durabilité. Il faut prendre du recul !&lt;/p&gt;&lt;/blockquote&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Conseils de Walid Lacidi – co-fondateur&amp;nbsp;&lt;a href=&quot;http://www.posity.fr/&quot; style=&quot;&quot;&gt;Posity&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Business Model&lt;/p&gt;&lt;figure id=&quot;attachment_659&quot; aria-describedby=&quot;caption-attachment-659&quot; class=&quot;wp-caption aligncenter&quot; style=&quot;margin-right: auto; margin-bottom: 1.5em; margin-left: auto; clear: both; max-width: 100%; width: 499px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-659&quot; title=&quot;business-model&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/06/boostcamp-BM-1024x682.jpg&quot; alt=&quot;business model conseils sur sa construction&quot; width=&quot;499&quot; height=&quot;332&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 499px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-659&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;boostcamp – business model&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Tout entrepreneur, en devenir ou expérimenté, a affaire à cette notion de business model. Terme barbare aux oreilles de certains, le business model est le plan de route d’un projet. Le concept de Business Model Canva, désormais célèbre, permet de poser sur papier les éléments principaux du projet et d’y voir plus clair. On pourrait penser que le business model canva est simplement un tableau à remplir au début du projet, et pourtant, notre expert nous démontre le contraire.&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les secrets d’un bon business model :&lt;br&gt;on peut avoir la meilleur idée du monde mais se planter si le marché n’est pas prêt&lt;br&gt;le marché est très mouvant, ne restez pas figer sur un business model si la réaction du marché ou de la concurrence n’est pas bonne&lt;br&gt;il faut être agile et évoluer en fonction de ces facteurs externes&lt;/p&gt;&lt;/blockquote&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Conseils de Julien Bellot – co-fondateur&amp;nbsp;&lt;a href=&quot;https://www.innovation-gravity.com/&quot; style=&quot;&quot;&gt;Gravity&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Prototypage&lt;/p&gt;&lt;figure id=&quot;attachment_658&quot; aria-describedby=&quot;caption-attachment-658&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 270px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-658&quot; title=&quot;codage&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/06/boostcamp_nocode.jpg&quot; alt=&quot;codage&quot; width=&quot;270&quot; height=&quot;406&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 270px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-658&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;boostcamp – nocode&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Si vous avez un côté perfectionniste, vous devez vous dire que jamais vous n’oseriez présenter votre solution avant qu’elle ne soit parfaitement finalisée. Pourtant, cela prend du temps et coûte souvent beaucoup d’argent.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;De plus, il est extrêmement risqué d’investir dans une solution finale avant même d’avoir tester son idée IRL.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pour cela, nous avons la solution : le prototypage low code / no-code.&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Le no-code permet de diviser par 10 le temps de travail et le budget : idéal pour tester son idée !&lt;br&gt;La clef : lier des outils existants entre eux. Ça ne sert à rien de réinventer la roue !&lt;br&gt;Les points de vigilance : la propriété et la scalabilité&lt;/p&gt;&lt;/blockquote&gt;\r\n                          ', '', '2021-07-24 12:21:56', '536851561.png', 'texte', 23, NULL),
(87, 'EST-IL POSSIBLE DE LEVER DES FONDS EN TEMPS DE CRISE ?', '&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;purLa crise engendrée par la COVID-19 a mis un gros coup de frein aux levées de fonds dans l’écosystème start-ups. Alors que l’année commençait bien avec près de 600 millions d’euros levés en janvier, les chiffres ont rapidement dégringolé.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;2020 vs 2019&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Après un mois de février bien moins prometteur que celui de janvier avec 355 millions d’euros levés, c’est un véritable effondrement en mars.&lt;br&gt;L’écosystème français n’aura réussi à lever seulement 177 millions d’euros, dont 115 millions recensés sur la première semaine.&lt;br&gt;En comparaison, les start-ups françaises avaient levé 364 millions d’euros sur la même période en 2019. Une chute vertigineuse de près de 51%.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Le mois d’avril redonne un peu d’espoir avec 294 millions d’euros levés. Bien que ce chiffre soit en hausse significative comparé au mois de mars, il est important de noter la différence avec l’année précédente. En effet, en avril 2019, les jeunes pousses françaises avaient levé 118 millions d’euros de plus qu’en avril 2020, soit 28,6% de plus.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les quinze premiers jours de mai sont représentatifs de la reprise économique progressive. 23 start-ups ont réussi à lever 221 millions d’euros. Un joli score qu’il faut, en partie, attribuer à Back Market avec une opération de 110 millions d’euros. Le reste du mois semble prometteur, de quoi remonter le moral des entrepreneurs et investisseurs.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les secteurs de prédilection&lt;br&gt;Les start-ups ayant levé des fonds ces 3 derniers mois sont toutes issues d’univers différents mais il est impossible de ne pas relever les 3 secteurs les plus représentés.&lt;br&gt;La GreenTech arrive en tête de liste suivi des secteurs de l’AssurTech et la DeepTech.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Le comportement des fonds&lt;/p&gt;&lt;figure id=&quot;attachment_648&quot; aria-describedby=&quot;caption-attachment-648&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 459px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-648&quot; title=&quot;pitch-levee-de-fonds&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/05/fundraising.png&quot; alt=&quot;&quot; width=&quot;459&quot; height=&quot;258&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 459px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-648&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;Photo by Austin Distel on Unsplash&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Dans ce contexte de crise, les fonds d’investissements et business angels ont axé leurs priorités sur leur portefeuille déjà existant. Leur rôle étant de sécuriser les entreprises qu’ils accompagnent déjà afin de leur permettre de faire face à cette crise. Par conséquent, ils n’ont pas souhaité miser sur de nouvelles pousses.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Il faut toutefois noter que les tours de table qui ont été bouclés durant cette période, ont, pour la plupart, débuté bien avant la crise du coronovirus.&lt;br&gt;Mais les chiffres encourageants du mois de mai nous démontre le soutient des investisseurs aux jeunes pousses !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Lever des fonds&amp;nbsp;: compliqué mais pas impossible&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les investisseurs recommencent à faire confiance et à parier sur de nouvelles pousses tout en restant prudents. Les sommes investies sont assez faibles pour de nombreuses start-ups, mais il est important de noter que la majorité des levées sont en seed ou en série A, ce qui est plutôt encourageant pour les jeunes entreprises !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;En ces temps difficile, il ne faut pas oublier que les start-ups sont synonymes d’agilité et d’adaptabilité. Ces jeunes entreprises innovantes évoluent au quotidien dans des environnements incertains. Elles trouvent des solutions et continuent à avancer.&lt;/p&gt;\r\n                          ', '', '2021-07-24 12:23:36', '223343569.jpg', 'texte', 24, NULL),
(88, 'OBJECTIF SORTIE DE CRISE', '&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Dans quelques jours, la France quittera progressivement le confinement pour reprendre ses activités. Bien que se profile une reprise modérée, il est essentiel pour une entreprise de prévoir la sortie de crise afin de relancer son activité dès que possible dans les meilleures conditions qu’il soit.&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;&lt;b&gt;PROTÉGER SES SALARIÉS&lt;/b&gt;&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Le retour au bureau, ne sera pas aussi simple « qu’avant ». Toute entreprise doit se conformer au protocole national assurant la santé et la sécurité des salariés. S’il est important de reprendre du service, il est également important de prendre en compte les situations et contraintes personnelles de ses salariés afin de les protéger tout en proposant des solutions adaptées aux employés bloqués à la maison pour garder leurs enfants par exemple.&lt;/p&gt;&lt;figure id=&quot;attachment_636&quot; aria-describedby=&quot;caption-attachment-636&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 383px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-636&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/05/team.png&quot; alt=&quot;communiquer sur la crise&quot; width=&quot;383&quot; height=&quot;255&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 383px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-636&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Après presque deux mois loin des yeux, il est essentiel de maintenir (ou, dans le pire des cas, recréer) une cohésion entre les salariés. En effet, les réunions virtuelles laissent peu de place à des échanges plus personnels. Il est pourtant essentiel du créer du lien entre ses équipes. Avec le retour d’une partie des équipes en présentiel, il est important de ne pas faire de différenciation en continuant visioconférences.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les mois à venir restent imprévisibles, il n’est toutefois pas exclu de pouvoir très prochainement se réunir. Vous pouvez, dès à présent, organiser des séminaires, en France, ou même de façon virtuelle grâce aux nouveaux outils déployés durant cette période de confinement.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&amp;nbsp;&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;&lt;b&gt;COMMUNIQUER&lt;/b&gt;&lt;/h3&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Bien qu’il y est des zones de flou, cette période incertaine ne doit pas pousser les entreprises à faire de la rétention d’informations. Il est essentiel d’être transparent avec ses salariés afin qu’eux même puisse s’organiser et être productif.&lt;br&gt;En réalité, les impliquer dans l’organisation de la sortie de crise peut être un excellent moyen de récupérer de bonnes idées à mettre en place, au plus près du terrain !&lt;/p&gt;&lt;figure id=&quot;attachment_637&quot; aria-describedby=&quot;caption-attachment-637&quot; class=&quot;wp-caption aligncenter&quot; style=&quot;margin-right: auto; margin-bottom: 1.5em; margin-left: auto; clear: both; max-width: 100%; width: 311px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-637&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/05/communication.png&quot; alt=&quot;bulle communication&quot; width=&quot;311&quot; height=&quot;207&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 311px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-637&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;La communication interne et tout autant essentielle que la communication externe. Vous allez pouvoir recommencer à livrer vos clients&amp;nbsp;? Vous allez pouvoir recommencer à vous approvisionner chez vos fournisseurs ? Vos consommateurs vont pouvoir compter sur vous&amp;nbsp;«&amp;nbsp;comme avant&amp;nbsp;» ? Informez-les&amp;nbsp;!&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Plus vous anticiper, moins les délais seront importants et plus tôt votre activité pourra repartir.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&amp;nbsp;&lt;/p&gt;&lt;h3 style=&quot;margin-top: 20px; margin-bottom: 10px; line-height: 30px; clear: both;&quot;&gt;&lt;b&gt;LA REPRISE COMMERCIALE&lt;/b&gt;&lt;/h3&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;Faire le bilan&lt;/h4&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Venons-en au cœur du business, la partie financière.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Tout d’abord, il est essentiel de regarder en face l’ampleur des dégâts causés par la crise en dressant un bilan financier de cette période.&lt;br&gt;Bien que l’exercice soit douloureux, n’oubliez pas de tenir compte des reports de charges, des aides proposées par l’Etat et les régions pour sauver votre trésorerie.&amp;nbsp;&lt;a href=&quot;https://www.ionis361.com/blogs/2020/03/covid-19-mesures-de-soutien-focus-entrepreneur-2/&quot; style=&quot;&quot;&gt;(vous les trouverez dans cet article)&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Nous allons sortir de la période de confinement, cependant, l’avenir est plus incertain que jamais. Afin d’essayer de prévoir l’imprévisible, il est important de dresser trois scenarii possibles :&lt;/p&gt;&lt;ul style=&quot;margin-bottom: 40px; padding-left: 40px; list-style: none;&quot;&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;un optimiste avec une sortie de crise et un retour à la normale dès cet été,&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;un neutre en prenant comme base cet automne,&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;un pessimiste en se basant sur une sortie de crise en 2021.&lt;/li&gt;&lt;/ul&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;Développer de nouveaux projets&lt;/h4&gt;&lt;figure id=&quot;attachment_641&quot; aria-describedby=&quot;caption-attachment-641&quot; class=&quot;wp-caption alignleft&quot; style=&quot;display: inline; margin-right: 1.5em; margin-bottom: 1.5em; float: left; max-width: 100%; width: 245px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-641&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/05/Sans-titre.png&quot; alt=&quot;après crise&quot; width=&quot;245&quot; height=&quot;284&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 245px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-641&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Durant cette période de confinement, vous avez peut-être réorganisé votre activité, voir pivoté. Encore une fois, il est important de faire un bilan de ce qui a été fait. Vous devez également décider quelles activités doivent continuer et celles qui doivent s’arrêter. En fonction de cela, la charge de travail sera réorganisée, ce qui impactera également vos salariés.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Profitez de cette période pour relire les projets trainant sur un bout de papier et que vous n’avez jamais eu le temps de mettre en place. Définissez une feuille de route après avoir analyser ces projets dormants. C’est peut-être le bon moment pour les lancer !&lt;/p&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;Trouver des financements&lt;/h4&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Bien entendu, ces projets nécessiteront des financements. Les aides financières misent en place durant la crise ont beaucoup fait parler d’elles. Résultat, on a peu vu les appels à projets et différents concours. Mais ces derniers ne sont pas en arrêt pour autant. Renseignez-vous et commencer dès à présent les démarches, ce qui vous fera gagner un temps précieux par la suite. (&lt;a href=&quot;https://www.bpifrance.fr/A-la-une/Appels-a-projets-concours&quot; style=&quot;&quot;&gt;trouver les appels à projets&lt;/a&gt;)&lt;/p&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;Garder le contact&lt;/h4&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Cette période difficile a l’avantage d’avoir mis en valeur de belles choses, notamment les principes de solidarité et d’entraide. N’hésitez pas à garder le contact avec vos clients et fournisseurs, simplement pour prendre de leurs nouvelles, sans forcément parler business et offres commerciales. Ces échanges vous permettront de renforcer les liens pour un avenir plus serein.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;Cette préparation à la sortie de crise vous permettra de parer à toute éventualité et de faire face au futurs challenges qui se présenteront à vous avec assurance et confiance.&lt;/b&gt;&lt;/p&gt;&lt;div&gt;&lt;em&gt;&lt;strong style=&quot;font-weight: bold;&quot;&gt;&lt;br&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/div&gt;\r\n                          ', '', '2021-07-24 12:25:07', '1020954389.png', 'texte', 24, NULL);
INSERT INTO `article` (`idart`, `nom`, `description`, `lien`, `created_at`, `image`, `type`, `idcat`, `code`) VALUES
(89, 'COVID-19 : LES STARTUPS IONIS 361 SE MOBILISENT', '&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;La situation exceptionnelle que nous vivons à fait émerger de belles initiatives d’entraide et de solidarité. De nombreuses entreprises prennent des mesures pour apporter leur soutien à l’effort international face à lutte contre le coronavirus.&lt;br&gt;&lt;font color=&quot;#333333&quot; face=&quot;Arial, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 18px; background-color: rgb(245, 245, 245);&quot;&gt;&lt;b&gt;Nos start-ups se mobilisent et innovent pour proposer leurs services gratuitement ou même développer de nouvelles solutions. Retrouvez les histoires de ces jeunes pousses qui font leur maximum pour aider au quotidien des français, qu’ils soient sur le front ou confinés chez eux.&lt;/b&gt;&lt;/span&gt;&lt;/font&gt;&lt;/h4&gt;&lt;h1 style=&quot;margin: 20px 0px 10px; line-height: 44px; clear: both;&quot;&gt;DÉVELOPPER DE NOUVELLES PRATIQUES&lt;/h1&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;Eiffo Analytics&lt;/b&gt;&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les fondateurs de cette startup, spécialisée dans l’analyse de données, ont rejoint un groupe de travail afin d’aider, à leur échelle, dans la lutte contre le coronavirus :&amp;nbsp;&lt;b&gt;Data Against Covid&lt;/b&gt;.&lt;br&gt;Cette initiative permet la collaboration entre fonctionnaires et citoyens engagés. Grâce à leurs échanges avec des médecins, des soignants et le Ministère de la Santé, Santé Publique France a pu mettre à disposition du grand public un tableau sur lequel on peut savoir combien de personnes sont en réanimation, décédées, hospitalisées et rétablies, département par département.&lt;/p&gt;&lt;figure id=&quot;attachment_631&quot; aria-describedby=&quot;caption-attachment-631&quot; class=&quot;wp-caption alignleft&quot; style=&quot;display: inline; margin-right: 1.5em; margin-bottom: 1.5em; float: left; max-width: 100%; width: 298px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-631 &quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/entraide.png&quot; alt=&quot;&quot; width=&quot;298&quot; height=&quot;199&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 298px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-631&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Cette initiative permet de soulager la Direction Générale de la Santé et fournit au gouvernement des chiffres et données repris dans plusieurs allocutions du Président de la République et du Premier Ministre.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Le collectif ne s’arrête pas là et travaille déjà sur un autre projet pouvant aider à grande échelle les hôpitaux et leurs patients : une plateforme qui comptabilise les lits disponibles dans les hôpitaux, et qui communique ces informations aux autres hôpitaux et aux SAMU, leur permettant de mieux anticiper et d’offrir de meilleurs soins.&lt;/p&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;Givair&lt;/b&gt;&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;a href=&quot;https://givair.com/&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot; style=&quot;&quot;&gt;Givair&lt;/a&gt;&amp;nbsp;a mis en place le premier dispositif portable pour mesurer la qualité de l’air. Dans le cadre de la lutte contre la propagation de l’épidémie de Covid-19, la start-up se mobilise pour palier la baisse des stocks de certains équipements et contribuer à la protection de tous. Givair met à disposition son imprimante 3D pour fabriquer des visières de protection et des masques alternatifs. La start-up donne les visières de protection et masques à toutes les personnes qui pourraient être en contact étroit avec des porteurs du virus. Si vous êtes dans cette situation, vous pouvez contacter&amp;nbsp;&lt;a id=&quot;ember14120&quot; class=&quot;feed-shared-text-view__email ember-view&quot; href=&quot;mailto:m.rivillo@givair.com&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot; style=&quot;&quot;&gt;m.rivillo@givair.com&lt;/a&gt;&lt;/p&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;Raive&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Raive propose des expériences et produits inédits à gagner et cela pour la bonne cause ! Cette start-up soutient des projets associatifs en France au travers de sa plateforme de collecte de dons. Pour chaque expérience et produit, les dons sont, en partie, reversé à une association.&lt;br&gt;Pour supporter l’effort national, Raive se mobilise en partenariat avec des entrepreneurs dans le but de collecter des dons pour venir en aide aux personnes les plus vulnérables. Pour leur première campagne, 100% des donations seront reversées à la Fondation de France. Pour faire en savoir plus et si vous souhaitez apporter votre contribution, cliquez-ici :&amp;nbsp;&lt;a href=&quot;https://raive.fr/&quot; style=&quot;&quot;&gt;raive.fr&lt;/a&gt;&lt;/p&gt;&lt;h1 style=&quot;margin: 20px 0px 10px; line-height: 44px; clear: both;&quot;&gt;SE FORMER EN LIGNER&lt;/h1&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;Meet in Class&lt;/b&gt;&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Meet in Class, la startup spécialisée dans le soutien scolaire grâce à des cours en distanciel, permet, durant cette période, de suivre les cours de son programme scolaire en ligne.&lt;br&gt;De plus, l’entreprise s’implique pour accompagner les élèves en difficulté. En confinement, la continuité pédagogique à distance a créé d’autant plus d’inégalités entre les élèves ayant les moyens matériels et humains d’être accompagnés et ceux livrés à eux même.&lt;br&gt;Meet in Class profite des vacances de Pâques pour aider ces élèves à rattraper une partie de leur retard, grâce à l’implication des professeurs partenaires. La start-up constitue de petits groupes d’élèves et met à disposition ses outils pour le bon déroulement des cours dans cette démarche de cours solidaires. Pour en bénéficier, rendez-vous sur leur site :&amp;nbsp;&lt;a href=&quot;https://www.meetinclass.com/&quot; style=&quot;&quot;&gt;meetinclass.com&lt;/a&gt;&lt;/p&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;Pipplet&lt;/b&gt;&lt;/h2&gt;&lt;figure id=&quot;attachment_628&quot; aria-describedby=&quot;caption-attachment-628&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 376px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-628&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/work.png&quot; alt=&quot;&quot; width=&quot;376&quot; height=&quot;250&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 376px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-628&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pipplet a développé une certification permettant aux entreprises d’évaluer le niveau en langues de leurs candidats en ligne. Afin d’aider les étudiants postulant aux admissions des écoles, la start-up a décidé d’ouvrir cette certification aux particuliers.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Ils peuvent désormais s’auto-tester et décrypter les points sur lesquels s’améliorer, si besoin.&lt;br&gt;Vous souhaitez connaitre votre niveau en langue étrangère ? C’est par ici :&amp;nbsp;&lt;a class=&quot;c-link&quot; href=&quot;http://www.pipplet.com/&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot; aria-describedby=&quot;slack-kit-tooltip&quot; style=&quot;&quot;&gt;pipplet.com&lt;/a&gt;&lt;/p&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;BizzConnect&lt;/b&gt;&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;BizzConnect est une solution permettant d’organiser des webinaires et rendez-vous qualifiés à distance. Ces événements en ligne sont l’occasion de réunir des personnes n’étant pas sur la même zone géographique et pouvant partager leurs expériences, réunir des équipes sans qu’elles n’aient à traverser la France grâce à la visioconférence, ou encore pouvoir assister à l’intervention d’un expert, et échanger avec lui, que nous n’aurions pu rencontrer en présentiel. Pour découvrir toutes les possibilités que vous offre la solution BizzConnect, cliquez-ici :&amp;nbsp;&lt;a href=&quot;https://bizzconnect.io/&quot; style=&quot;&quot;&gt;bizzconnect.io&lt;/a&gt;&lt;/p&gt;&lt;h1 style=&quot;margin: 20px 0px 10px; line-height: 44px; clear: both;&quot;&gt;DES SOLUTIONS POUR SOUTENIR LES ENTREPRISES…&lt;/h1&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;Divin&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Divin est une plateforme numérique collaborative de mise en relation entre des producteurs, restaurateurs et consommateurs. Certains des partenaires restaurateurs de la startup se proposent d’être un&amp;nbsp;»point relais&amp;nbsp;» pour les producteurs qui ont des clients en centreville de Montpellier. Ces restaurateurs donnent gratuitement accès à leurs locaux (fermés durant cette période) avec chambres froides et réfrégirateurs pour assurer la livraison de paniers malain.&lt;br&gt;Grâce aux bénévoles de l’association, la distribution est assurée, gratuitement, en respectant toutes les consignes d’hygiène et de sécurité.&lt;br&gt;Pour retrouver les produits disponibles et les tarifs, rendez-vous sur&amp;nbsp;&lt;a href=&quot;https://www.facebook.com/DIVIN34&quot; style=&quot;&quot;&gt;la page Facebook de DIVIN&lt;/a&gt;, par sms au 06 87 31 92 63 ou 06 80 71 88 63, ou encore par mail à l’adresse suivante : divincmalin@gmail.com. Les paiements sont réalisés par espèces, chèques ou via les appli Lydia et Pumpkin.&lt;/p&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;Freeckly&lt;/b&gt;&lt;/h2&gt;&lt;figure id=&quot;attachment_632&quot; aria-describedby=&quot;caption-attachment-632&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 383px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-632 &quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/shop1.png&quot; alt=&quot;&quot; width=&quot;383&quot; height=&quot;255&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 383px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-632&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Freeckly propose une solution de gestion des invendus, en ligne, pour les petites marques, détaillants et revendeurs touchés par la fermeture de leurs boutiques. Leur objectif est d’aider ces entreprises à écouler leur stock durant cette période de crise grâce à un concept de vente innovant et inédit. Dans un second temps, Freeckly développe sa solution pour les aider à se relever plus rapidement et facilement de cette crise en optimisant les opérations de déstockage, évitant la destruction de produits et en leur permettant touchant de nouveaux clients.&lt;br&gt;Toutes les infos et les contacts ici :&amp;nbsp;&lt;a href=&quot;http://pro.freeckly.com/&quot; style=&quot;&quot;&gt;freeckly.com&lt;/a&gt;&lt;/p&gt;&lt;h1 style=&quot;margin: 20px 0px 10px; line-height: 44px; clear: both;&quot;&gt;ET POUR AIDER LES PARTICULIERS&lt;/h1&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;Youggy&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Youggy, c’est la plateforme du bénévolat 2.0. La start-up met en relation des associations avec des bénévoles souhaitant apporter leur contribution. Face à cette crise sanitaire, il est important de penser à ceux qui sont pourtant parfois oublier. Youggy a lancé deux grandes collectes solidaires sur Paris et Lyon. L’objectif : collecter un grand nombre de produits d’hygiène et les redistribuer aux personnes en grande précarité.&lt;br&gt;Le défi a été relevé avec succès et l’initiative a permis de lutter contre le manque d’accès à des produits d’hygiène d’un grand nombre de sans-abris.&lt;br&gt;Pour se tenir informer des campagnes solidaires, c’est par ici :&amp;nbsp;&lt;a href=&quot;https://www.youggy.com/&quot; style=&quot;&quot;&gt;youggy.com&lt;/a&gt;&lt;/p&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;&lt;b&gt;Servicoo&lt;/b&gt;&lt;/h2&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Servicoo, le réseau qui rend service, vous permet d’échanger de l’argent, au niveau national ou international, grâce à sa crypto-monnaie, les Servicoins au sein de la Servichain. Dans ces moments où la solidarité est essentielle, Servicoo décide de supprimer tous les frais liés à l’achat de servicoins sur sa plateforme.&lt;br&gt;La start-up met également à disposition un service de dépannage informatique à distance et totalement gratuit grâce à la mobilisation de ses consultants. Pour les contacter, c’est par ici :&amp;nbsp;&lt;a href=&quot;https://www.servicoo.com/&quot; style=&quot;&quot;&gt;servicoo.com&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Nous sommes tous solidaires face à cette crise !&lt;/p&gt;\r\n                          ', '', '2021-07-24 12:27:15', '1493827397.png', 'texte', 24, NULL),
(90, 'COMPRENDRE SA CIBLE COMMERCIALE', '&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;&lt;figure id=&quot;attachment_619&quot; aria-describedby=&quot;caption-attachment-619&quot; class=&quot;wp-caption alignleft&quot; style=&quot;display: inline; margin-right: 1.5em; margin-bottom: 1.5em; float: left; max-width: 100%; width: 3166px;&quot;&gt;&lt;a href=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/cible-commerciale-1.jpg&quot; style=&quot;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-619 size-full&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/cible-commerciale-1.jpg&quot; alt=&quot;&quot; width=&quot;3166&quot; height=&quot;1385&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 766.75px; margin: 20px auto;&quot;&gt;&lt;/a&gt;&lt;figcaption id=&quot;caption-attachment-619&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;Je fais quoi&amp;nbsp;? Pour qui&amp;nbsp;? Comment&amp;nbsp;? Je communique où&amp;nbsp;? Je dis quoi&amp;nbsp;?&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;De nombreuses startups sont victimes du syndrome : «&amp;nbsp;Je fais parce que&amp;nbsp;&lt;b&gt;JE&lt;/b&gt;&amp;nbsp;pense que…&amp;nbsp;» sur au moins une&amp;nbsp;; généralement plusieurs de ces questions.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Ce mode de pensée contre-productif résulte de l’absence de réponse à la question clef :&amp;nbsp;&lt;b&gt;Qui est ma cible&amp;nbsp;?&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Vous allez me répondre : «&amp;nbsp;je sais qui est ma cible&amp;nbsp;», probablement ! Mais le savez-vous vraiment&amp;nbsp;? Plus important, comprenez-vous bien le sous-jacent de cette question&amp;nbsp;?&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Imaginons…&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Aujourd’hui vous proposez une offre de coaching commercial, qui est votre cible&amp;nbsp;?&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Les start-ups&amp;nbsp;? Les commerciaux&amp;nbsp;? Ceux qui cherchent à se perfectionner&amp;nbsp;? Ceux qui n’ont aucune notion commerciale&amp;nbsp;? Ceux à la recherche de formation groupée&amp;nbsp;? Ceux à la recherche de formation personnalisée&amp;nbsp;? Ou les très nombreuses autres réponses possibles et toutes potentiellement bonnes.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;La question de la cible si elle est bien abordée vous permet de répondre à toutes les questions importantes sur l’offre que vous proposez&amp;nbsp;:&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;1/ Qui est ma cible précise&lt;/b&gt;&amp;nbsp;(je fais du coaching personnalisé pour startup avec peu d’XP commerciale).&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;2/ Où trouver cette cible précise&lt;/b&gt;&amp;nbsp;(LinkedIn, incubateur, programme d’accompagnement… etc).&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;3/ A quelles problématiques précises de cette cible je réponds&lt;/b&gt;&amp;nbsp;(besoin d’automatisation, copywriting, closing, créer un argumentaire commercial… etc).&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;4/ Quelle valeur-ajoutée je créé pour cette cible précise&lt;/b&gt;&amp;nbsp;(gain de temps, gain d’argent, gain de confiance, road map commerciale précise… etc).&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;5/ Quels sont mes concurrents sur cette cible précise&lt;/b&gt;&amp;nbsp;(compréhension du marché, compréhension de l’offre de marché existante, définis mon pricing, mes points-forts, mon potentiel de business).&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Et finalement TOUS LES ÉLÉMENTS nécessaires à la construction d’un argumentaire commercial.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pour vous aider dans cette analyse, appuyez vous sur la célèbre «&amp;nbsp;Carte de l’empathie&amp;nbsp;»&lt;/p&gt;&lt;figure id=&quot;attachment_621&quot; aria-describedby=&quot;caption-attachment-621&quot; class=&quot;wp-caption aligncenter&quot; style=&quot;margin-right: auto; margin-bottom: 1.5em; margin-left: auto; clear: both; max-width: 100%; width: 800px;&quot;&gt;&lt;a href=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/empathie-map-1.jpg&quot; style=&quot;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-621 size-full&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/empathie-map-1.jpg&quot; alt=&quot;&quot; width=&quot;800&quot; height=&quot;517&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 766.75px; margin: 20px auto;&quot;&gt;&lt;/a&gt;&lt;figcaption id=&quot;caption-attachment-621&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;b&gt;//////////////////////////&amp;nbsp; &amp;nbsp;Points importants&amp;nbsp; &amp;nbsp; /////////////////////////&lt;/b&gt;&lt;/span&gt;&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;1/ Plus vous entrez dans le détail, mieux c’est.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;2/ Vous n’êtes pas obligé d’avoir des réponses pour chacune des questions.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;3/ C’est un travail continu et non “one-shot”.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Pour comprendre réellement ce qui se passe dans la tête de votre cible, le meilleur moyen reste d’échanger directement avec vos clients potentiels. Vous ne saurez pas ce qu’ils veulent (ou ne veulent pas) tant que vous ne les aurez pas interviewés. Vous constaterez que votre discours commercial se construira naturellement.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Essayez de vous entretenir avec une diversité de clients potentiels, dans des secteurs d’activité différents. L’exercice fera naturellement apparaître votre cible précise et comment s’adresser à elle.&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;N’oubliez jamais : « Ce que l’on conçoit bien s’énonce clairement, et les mots pour le dire arrivent aisément » Nicolas Boileau.&lt;/p&gt;&lt;/blockquote&gt;&lt;/h4&gt;\r\n                          ', '', '2021-07-24 12:29:58', '874470780.jpg', 'texte', 23, NULL),
(91, 'LA PROSPECTION EN TEMPS DE CRISE, SE PRÉPARER POUR REBONDIR À LA REPRISE !', '&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;font color=&quot;#4c4c4c&quot; face=&quot;Open Sans, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px; background-color: rgb(245, 245, 245); border-style: initial; border-color: initial; border-image: initial; height: auto; width: 726.75px;&quot;&gt;&lt;b&gt;&lt;img loading=&quot;lazy&quot; class=&quot;size-large wp-image-608 aligncenter&quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/prospection_commerciale_alliance_connexion-1100x550-1024x512.png&quot; alt=&quot;&quot; width=&quot;640&quot; height=&quot;320&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; clear: both; margin: 20px 0px; width: 726.75px;&quot;&gt;&lt;/b&gt;&lt;/span&gt;&lt;/font&gt;Romain Hévin, coach en business development, aide les entreprises à améliorer leur processus commercial. Découvrez ses conseils pour améliorer votre impact commercial et rebondir après la crise !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;La prospection commerciale est un élément clé dans la stratégie commerciale d’une entreprise, d’une startup! Elle permet d’évangéliser le marché, d’avoir de nouvelles références, de générer du CA, de tester son pitch commercial mais aussi d’en apprendre plus sur la concurrence. En temps de crise ou de période d’activité&amp;nbsp; j’ai souvent remarqué qu’il y’avait deux écoles :&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;1. Ceux qui prospectaient pendant la crise&lt;/b&gt;&lt;br&gt;&lt;b&gt;2. Ceux qui préparaient la prospection et la reprise&lt;/b&gt;&lt;/p&gt;&lt;figure id=&quot;attachment_613&quot; aria-describedby=&quot;caption-attachment-613&quot; class=&quot;wp-caption alignright&quot; style=&quot;display: inline; margin-bottom: 1.5em; margin-left: 1.5em; float: right; max-width: 100%; width: 256px;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-613 &quot; src=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/04/engagement_illustration.png&quot; alt=&quot;&quot; width=&quot;256&quot; height=&quot;256&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 256px; margin: 20px auto;&quot;&gt;&lt;figcaption id=&quot;caption-attachment-613&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Je suis plutôt de la deuxième école. Pourquoi ? Vous devez tout d’abord échanger, rassurer, aider vos clients! Ce qui peut vous demander déjà pas mal de temps et d’investissement ! La prospection en tant de crise peut être mal vue, mal perçue, mal comprise.&amp;nbsp; Alors si vous souhaitez quand même prospecter je vous conseille d’aller piocher dans les comptes que vous nurterez actuellement et d’avoir une approche ultra personnalisée (Customer Centric Selling). C’est probablement le moment de réactiver des prospects sur lesquels vous n’avez pas eu de réponse où avec qui vous n’avez pas beaucoup échangé.&lt;br&gt;De mon point de vue : oubliez la prospection à froid !&lt;/p&gt;&lt;blockquote style=&quot;margin-bottom: 10px; border-left: 5px solid rgb(247, 79, 52); padding: 10px 20px; quotes: &amp;quot;&amp;quot; &amp;quot;&amp;quot;; line-height: 22px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Appliquez plutôt ce doux adage: “L’art d’être tantôt très audacieux et tantôt très prudent est l’art de réussir.”&lt;/p&gt;&lt;/blockquote&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Je vous propose dans ce temps de crise (de pause) une To-Do-List pour améliorer votre impact commercial :&lt;/p&gt;&lt;ul style=&quot;margin-bottom: 40px; padding-left: 40px; list-style: none; text-align: justify;&quot;&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Vérifiez que vous avez le bon ICP et le bon Buyer Persona. Et priorisez vos cibles (choisissez par exemple un ou deux secteurs où vous allez lancer une séquence de prospection dynamique et ciblée dès la reprise ou un peu en amont)&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Construisez des Use Cases par secteur d’activité sur vos clients existants (Ils auront probablement plus de temps pour vous aider en répondant à une «&amp;nbsp;interview&amp;nbsp;» par exemple). Cela vous donnera d’excellents verbatims !&amp;nbsp;&lt;b&gt;Votre client : c’est votre Ambassadeur auprès de vos futurs prospects !&lt;/b&gt;&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Travaillez votre pitch téléphonique en faisant des simulations avec vos équipes. Retravaillez l’accroche ou l’effet wahou par exemple. Cela permet de garder le fighting spirit et surtout consolide le «&amp;nbsp;TeamSpirit&amp;nbsp;» au sein de l’équipe!&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Requalifiez, priorisez et triez votre pipeline dans votre CRM. Vérifiez vos BestCases avec vos clients et sécurisez vos Commit ! Ne passez pas à côté d’une affaire ! Chaque affaires est précieuses !&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Travaillez sur vos propositions commerciales et leurs formats.&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Travaillez votre profil Linkedin pour qu’il ait plus d’impact et n’hésitez pas à publier du contenu sur votre entreprise une fois par semaine.&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Je pense qu’en ces temps difficiles, vous devez améliorer votre approche commerciale en général mais aussi booster votre équipe !&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Optimisez, retravaillez, testez et soyez patients, la reprise va arriver bien plus vite que prévue et comme je le répète souvent à mes clients : «&amp;nbsp;95 pour cent de préparation POUR 5 pour cent d’action !&amp;nbsp;»&lt;br&gt;Je finirais également sur une formule d’Aimé Jacquet en 1998 «&amp;nbsp;&amp;nbsp;Muscle ton jeu Robert , si tu muscles pas ton jeu, fais attention, je t’assure, tu vas voir, tu vas avoir des déconvenues parce que t’es trop gentil.&amp;nbsp;»&lt;/p&gt;&lt;/h4&gt;\r\n                          ', '', '2021-07-24 12:31:47', '4762193.png', 'texte', 24, NULL),
(92, 'LA COMMUNICATION DE CRISE', '&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Gérez la crise, ne la subissez pas&amp;nbsp;!&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;«&amp;nbsp;Les crises se suivent et ne se ressemblent pas. Elles sont pourtant toutes surmontables&amp;nbsp;»&amp;nbsp;affirme SILNICKI, expert en communication de crise. En cette période de crise inconnue et inédite, il est primordial de communiquer afin d’entretenir le contact avec sa communauté. Le confinement fait des réseaux sociaux un élément central de l’information et de l’échange. Mais quels messages doit-on transmettre lorsque l’on est entrepreneur&amp;nbsp;?&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Vous traversez une crise si la&lt;b&gt;&amp;nbsp;&lt;/b&gt;situation menace les intérêts stratégiques de votre business. Plus vos intérêts vitaux sont menacés, plus la crise est grave.&amp;nbsp;Pour sortir de cette situation instable, il vous faut adopter une gouvernance&amp;nbsp;spécifique pour laquelle une communication de situation de crise pertinente est essentielle.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;a href=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/03/com-de-crise-1.jpg&quot; style=&quot;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;alignnone wp-image-600 size-full&quot; title=&quot;communication-crise&quot; src=&quot;https://wp.ionis-group.com/ionis361/wp-content/uploads/sites/12/2020/03/com-de-crise-1.jpg&quot; alt=&quot;communication&quot; width=&quot;776&quot; height=&quot;272&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: inline-block; width: 726.75px; margin: 20px 0px;&quot;&gt;&lt;/a&gt;&lt;/p&gt;&lt;/h4&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;– Les indispensables –&lt;/h2&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;1/ Ne vous précipitez pas !&lt;/b&gt;&amp;nbsp;Analysez la situation et observez la façon dont elle est gérée chez vos semblables et vos concurrents.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;2/ Mesurez l’impact de la crise sur votre marché.&lt;/b&gt;&amp;nbsp;Quelle sera la durée de ses effets, dans combien de temps vont-ils heurter l’entreprise ? A quel point sont-ils préjudiciables ?&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;3/ Mettez en place un plan de communication de crise concret&lt;/b&gt;&amp;nbsp;: établissez un discours cohérent et mettez en œuvre des actions pertinentes, en créant des contenus adaptés au message que vous avez choisi de défendre. Votre communication de crise doit respecter deux règles :&lt;/p&gt;&lt;ul style=&quot;margin-bottom: 40px; padding-left: 40px; list-style: none;&quot;&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Montrer la volonté de votre entreprise à résoudre les problèmes qu’elle rencontre.&lt;/li&gt;&lt;li style=&quot;line-height: 24px; padding-bottom: 5px;&quot;&gt;Répondre aux problématiques spécifiques qui sont nées de cette crise, qui sont propres à chaque start-up&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;4/ Rapprochez-vous de votre communauté&lt;/b&gt;. Tant que le message est pertinent, il soudera vos liens avec celle-ci. Annoncez sincèrement votre empathie. Par exemple, rappelez que le bien-être de la population est la priorité malgré les difficultés que vous rencontrez.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;5/ Choisissez minutieusement vos canaux de diffusion&lt;/b&gt;&amp;nbsp;en fonction pour partager un message pertinent et atteindre votre audience.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;6/ Proposez des outils de réponse basés sur des faits concrets :&lt;/b&gt;&amp;nbsp;par exemple, faites-en sorte que vos missions encore réalisables en temps de crise continuent d’être assurées.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;7/ Communiquez auprès de TOUT le monde :&lt;/b&gt;&amp;nbsp;clients, collaborateurs, investisseurs, partenaires, fournisseurs, prestataires, pairs, etc.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;8/ Soyez transparents&lt;/b&gt;&amp;nbsp;dans votre communication interne comme externe, et acceptez de reconnaître que votre entreprise soit en difficulté. Surtout, n’entrez pas dans une démarche de déni.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&lt;b&gt;9/ Entretenez cette stratégie de communication même une fois la crise passée&lt;/b&gt;, pour assurer la reconstruction et le maintien de votre business.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&amp;nbsp;&lt;/p&gt;&lt;/h4&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;– Les erreurs à éviter –&lt;/h2&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;&lt;figure id=&quot;attachment_604&quot; aria-describedby=&quot;caption-attachment-604&quot; class=&quot;wp-caption alignleft&quot; style=&quot;display: inline; margin-right: 1.5em; margin-bottom: 1.5em; float: left; max-width: 100%; width: 198px;&quot;&gt;&lt;a href=&quot;https://wp-ionis-group.ecole-ingenierie.org/ionis361/wp-content/uploads/sites/12/2020/03/Diapositive1.jpg&quot; style=&quot;&quot;&gt;&lt;img loading=&quot;lazy&quot; class=&quot;wp-image-604 size-medium&quot; src=&quot;https://wp.ionis-group.com/ionis361/wp-content/uploads/sites/12/2020/03/Diapositive1-198x300.jpg&quot; alt=&quot;communiquer en temps de crise&quot; width=&quot;198&quot; height=&quot;300&quot; style=&quot;border: 0px; height: auto; max-width: 100%; display: block; width: 198px; margin: 20px auto;&quot;&gt;&lt;/a&gt;&lt;figcaption id=&quot;caption-attachment-604&quot; class=&quot;wp-caption-text&quot; style=&quot;margin: 0.8075em 0px;&quot;&gt;–&lt;/figcaption&gt;&lt;/figure&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;1/ Réagir trop tard&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;2/ Ne pas communiquer&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;3/ Accuser la situation plutôt que la résoudre&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;4/ Négliger la communication avec vos collaborateurs&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;5/ Attendre que la crise passe sans agir&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;6/ Instrumentaliser la crise&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;&amp;nbsp;&lt;/p&gt;&lt;/h4&gt;&lt;h2 style=&quot;margin-top: 30px; margin-bottom: 30px; line-height: 36px; clear: both; margin-right: 40px;&quot;&gt;– En Bref –&lt;/h2&gt;&lt;h4 style=&quot;margin-bottom: 10px; line-height: 24px; clear: both; margin-top: 10px;&quot;&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Dans un contexte de communication de crise, la difficulté réside dans le fait que les informations doivent être diffusées rapidement alors que vous ne disposez que de très peu de données disponibles.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Il&amp;nbsp;vous faut trouver l’équilibre&amp;nbsp;: ne pas communiquer trop vite, ni trop tard, mais donner des réponses aux inquiétudes de vos clients, partenaires, investisseurs…&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Il ne faut surtout pas négliger la communication d’après-crise&amp;nbsp;: il est important d’évaluer la manière dont vous l’avez gérée.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 30px; line-height: 28px; margin-right: 40px;&quot;&gt;Vous pouvez clore symboliquement la crise en communiquant en rétrospective sur son impact sur votre business, la façon dont vous êtes parvenu à la surmonter ou sur l’avenir qui s’annonce, qu’il soit prometteur ou compliqué.&lt;/p&gt;&lt;/h4&gt;\r\n                          ', '', '2021-07-24 12:34:50', '107085667.jpg', 'texte', 23, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idcat` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcat`, `nom`, `created_at`) VALUES
(23, 'Actualité', '2021-07-24 11:17:28'),
(24, 'Evènement', '2021-07-24 11:17:43');

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

CREATE TABLE `coach` (
  `idcoach` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `idf` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `edition` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`idcoach`, `id_user`, `idf`, `created_at`, `edition`) VALUES
(2, 16, 12, '2021-09-21 12:48:04', 'Edition1'),
(3, 15, 11, '2021-09-21 12:54:43', 'Edition1'),
(4, 16, 11, '2021-09-21 12:54:56', 'Edition1');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcomment` int(11) NOT NULL,
  `idart` int(11) DEFAULT NULL,
  `etape1` text,
  `etape2` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcomment`, `idart`, `etape1`, `etape2`, `created_at`) VALUES
(19, 92, '<div class=\"fb-comments\" data-href=\"https://web.facebook.com/Sant%C3%A9-Plus-Asbl-1189030747790120/photos/4298467260179771\" data-width=\"\" data-numposts=\"5\"></div>', '<div class=\"fb-comments\" data-href=\"https://web.facebook.com/Sant%C3%A9-Plus-Asbl-1189030747790120/photos/4298467260179771\" data-width=\"\" data-numposts=\"5\"></div>', '2021-07-24 13:43:47'),
(20, 89, '<div id=\"fb-root\"></div>\r\n<script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v11.0&appId=301499887887474&autoLogAppEvents=1\" nonce=\"qRn3KIJD\"></script>', '<div class=\"fb-comments\" data-href=\"https://web.facebook.com/Sant%C3%A9-Plus-Asbl-1189030747790120/photos/4298467260179771\" data-width=\"\" data-numposts=\"5\"></div>', '2021-07-24 13:44:46');

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `idconference` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `date_debit` date DEFAULT NULL,
  `heure_debit` time DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conference`
--

INSERT INTO `conference` (`idconference`, `nom`, `date_debit`, `heure_debit`, `date_fin`, `heure_fin`, `created_at`, `id_user`) VALUES
(2, 'formation entrepreneuriat niveau 2', '2021-09-14', '13:19:00', '2021-09-14', '14:20:00', '2021-09-14 13:19:16', 7),
(6, 'conférence de l\'agent', '2021-09-15', '14:19:00', '2021-09-15', '15:20:00', '2021-09-14 13:20:00', 7),
(9, 'Communication et pitch', '2021-09-15', '12:20:00', '2021-09-15', '13:20:00', '2021-09-15 11:15:43', 14),
(11, 'Communication et pitch', '2021-09-20', '15:17:00', '2021-09-20', '16:17:00', '2021-09-20 15:17:56', 7),
(12, ' Organisation d\'une conférence : Comment faire ?', '2021-09-26', '15:46:00', '2021-09-26', '15:46:00', '2021-09-25 15:47:04', 7);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `sujet` varchar(700) DEFAULT NULL,
  `message` text,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `message`, `fichier`, `created_at`) VALUES
(10, 'sifa abeli', 'mikah@gmail.com', 'j\'aimerai savoir les informations sur...', 'coucou', NULL, '2021-05-15 20:20:04'),
(12, 'sumaili shabani', 'info.devtech@gmail.com', 'information personnele sur le podcast', 'cool', NULL, '2021-05-22 11:46:03'),
(13, 'joel jong', 'jojo@gmail.com', 'jojo le boss ce moi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '645284740.jpg', '2021-06-11 14:59:27');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idcours` int(11) NOT NULL,
  `nomcours` varchar(300) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `code` varchar(300) DEFAULT NULL,
  `idf` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `descriptioncours` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `pdf` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idcours`, `nomcours`, `logo`, `code`, `idf`, `id_user`, `descriptioncours`, `created_at`, `pdf`) VALUES
(1, 'Vue js', '707551968.png', '960883593', 11, 7, 'Vue (prononcé /vju?/, comme view) est un framework progressif pour la construction d\'interfaces utilisateur. Contrairement à d\'autres frameworks monolithiques, Vue est conçu dès le départ pour être progressivement adoptable. La bibliothèque principale se concentre uniquement sur la couche de vue et est facile à prendre en charge et à intégrer à d\'autres bibliothèques ou projets existants. D\'un autre côté, Vue est également parfaitement capable d\'alimenter des applications sophistiquées à page unique lorsqu\'il est utilisé en combinaison avec des outils modernes et des bibliothèques de support.\r\n\r\nSi vous souhaitez en savoir plus sur Vue avant de vous lancer, nous avons créé une vidéo présentant les principes de base et un exemple de projet.\r\n\r\nSi vous êtes un développeur frontend expérimenté et que vous souhaitez savoir comment Vue se compare à d\'autres bibliothèques/frameworks, consultez la comparaison avec d\'autres frameworks.', '2021-09-21 20:04:59', NULL),
(2, 'React js', '2119442832.png', '768394052', 11, 7, 'Une bibliothèque JavaScript pour créer des interfaces utilisateurs', '2021-09-21 20:10:26', NULL),
(6, 'React, Angular, Vue : quel framework JavaScript choisir ?', '1075811120.png', '643922778', 11, 7, 'Si vous maîtrisez un petit peu le JavaScript, vous avez déjà dû vous retrouver face au choix d’un framework front-end pour votre application web. Si tel est le cas, comment avez-vous fait ?\r\n\r\nDifficile de connaître tous les frameworks, et de savoir rapidement lesquelles conviennent à son projet.\r\n\r\nC’est pourquoi nous avons choisi de vous proposer un article autour de trois des frameworks les plus populaires, pour passer en revue leurs avantages, inconvénients et caractéristiques spécifiques.', '2021-09-21 20:41:36', NULL),
(7, 'Angular', '1266822084.png', '1603921696', 11, 7, 'AngularJS est fondé sur l\'idée que la programmation déclarative doit être utilisée pour construire les interfaces utilisateurs et les composants logiciels de câblage, tandis que la programmation impérative excelle pour exprimer la logique métier3. La conception de AngularJS est guidée par plusieurs objectifs :\r\n\r\ndécoupler les manipulations du DOM de la logique métier. Cela améliore la testabilité du code ;\r\nconsidérer le test d\'une application aussi important que l\'écriture de l\'application elle-même. La difficulté de la phase de test est considérablement impactée par la façon dont le code est structuré ;\r\ndécoupler les côtés client et serveur d\'une application. Cela permet au développement logiciel des côtés client et serveur de progresser en parallèle, et permet la réutilisabilité de chacun des côtés ;\r\nguider les développeurs pendant toute la durée de la construction d\'une application : de la conception de l\'interface utilisateur, en passant par l\'écriture de la logique métier, jusqu\'au test de l\'application ;\r\nrendre les tâches faciles évidentes et les tâches difficiles possibles.', '2021-09-21 21:09:46', NULL),
(8, 'Cours particuliers d’anglais parlé', '1507658143.png', '1240999808', 12, 7, 'Hypnoledge est une méthode innovante permettant l’apprentissage des langues étrangères sous hypnose. Cette méthode, consiste à focaliser son attention par l’hypnose pour permettre à votre partie inconsciente d’apprendre et d’enregistrer plus facilement et rapidement une langue étrangère. Avec l\'hypnose, les difficultés habituellement rencontrées comme la peur de s’exprimer, la baisse de motivation, de concentration, le manque de confiance en soi disparaissent !', '2021-09-21 22:32:54', NULL),
(10, 'Ajax ', '1419433872.jpg', '161108079', 11, 15, 'Ajax est une méthode utilisant différentes technologies ajoutées aux navigateurs web entre 1995 et 2005, et dont la particularité est de permettre d\'effectuer des requêtes au serveur web et, en conséquence, de modifier partiellement la page web affichée sur le poste client sans avoir à afficher une nouvelle page complète. Cette architecture informatique permet de construire des applications Web et des sites web dynamiques interactifs. Ajax est l\'acronyme d\'asynchronous JavaScript and XML : JavaScript et XML asynchrones.\r\n\r\nAjax combine JavaScript et DOM, qui permettent de modifier l\'information présentée dans le navigateur en respectant sa structure, les API Fetch et XMLHttpRequest, qui servent au dialogue asynchrone avec le serveur Web ; ainsi qu\'un format de données (XML ou JSON), afin d\'améliorer maniabilité et confort d\'utilisation des applications internet riches. XML, cité dans l\'acronyme, était historiquement le moyen privilégié pour structurer les informations transmises entre serveur Web et navigateur, de nos jours le JSON tend à le remplacer pour cet usage.\r\n\r\nL\'usage d\'Ajax fonctionne sur tous les navigateurs Web courants : Google Chrome, Safari, Mozilla Firefox, Internet Explorer, Microsoft Edge, Opera, etc.', '2021-09-23 18:34:48', NULL),
(11, 'Jquery', '884494514.png', '1592889177', 11, 15, 'jQuery est une bibliothèque JavaScript libre et multiplateforme créée pour faciliter l\'écriture de scripts côté client dans le code HTML des pages web3. La première version est lancée en janvier 2006 par John Resig.\r\n\r\nLe but de la bibliothèque étant le parcours et la modification du DOM (y compris le support des sélecteurs CSS 1 à 3 et un support basique de XPath), elle contient de nombreuses fonctionnalités ; notamment des animations, la manipulation des feuilles de style en cascade (accessibilité des classes et attributs), la gestion des évènements, etc. L\'utilisation d\'Ajax est facilitée et de nombreux plugins sont présents.\r\n\r\nDepuis sa création en 2006 et notamment à cause de la complexification croissante des interfaces Web, jQuery a connu un large succès auprès des développeurs Web et son apprentissage est aujourd\'hui un des fondamentaux de la formation aux technologies du Web. Il est à l\'heure actuelle la bibliothèque front-end la plus utilisée au monde (plus de la moitié des sites Internet en ligne intègrent jQuery).\r\n\r\nCependant, son utilisation devient moins pertinente avec l\'émergence de nouvelles bibliothèques telles que React (JavaScript) et Vue.js qui la remplacent dans la construction d\'Application web monopage.', '2021-09-23 18:38:01', NULL),
(12, 'Introduction aux Hooks', '1810338892.png', '132322625', 11, 7, 'Les Hooks sont arrivés avec React 16.8. Ils vous permettent de bénéficier d’un état local et d’autres fonctionnalités de React sans avoir à écrire une classe.', '2021-09-26 10:10:55', '1868366743.pdf'),
(13, 'Javascript ES6', '1922421842.jpg', '2130084422', 11, 15, 'ECMAScript 2015 was the second major revision to JavaScript.\r\n\r\nECMAScript 2015 is also known as ES6 and ECMAScript 6.\r\n\r\nThis chapter describes the most important features of ES6.\r\n\r\nNew Features in ES6\r\nThe let keyword\r\nThe const keyword\r\nArrow Functions\r\nFor/of\r\nMap Objects\r\nSet Objects\r\nClasses\r\nPromises\r\nSymbol\r\nDefault Parameters\r\nFunction Rest Parameter\r\nString.includes()\r\nString.startsWith()\r\nString.endsWith()\r\nArray.from()\r\nArray.keys()\r\nArray.find()\r\nArray.findIndex()\r\nNew Math Methods\r\nNew Number Properties\r\nNew Number Methods\r\nNew Global Methods\r\nIterables Object.entries\r\nJavaScript Modules', '2021-09-26 10:28:08', '241388076.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

CREATE TABLE `format` (
  `idformat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `idf` int(11) DEFAULT NULL,
  `jour` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `format`
--

INSERT INTO `format` (`idformat`, `id_user`, `idf`, `jour`, `created_at`) VALUES
(6, 12, 12, '2021-09-20', '2021-09-20 12:05:33'),
(7, 13, 12, '2021-09-20', '2021-09-20 12:05:46'),
(8, 11, 11, '2021-09-20', '2021-09-20 12:05:59'),
(9, 12, 11, '2021-09-20', '2021-09-20 12:06:25');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `idf` int(11) NOT NULL,
  `nom` text,
  `date_debit` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `fin_inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`idf`, `nom`, `date_debit`, `date_fin`, `image`, `description`, `created_at`, `fin_inscription`) VALUES
(7, 'pie tshibanda', '2021-07-27', '2021-09-27', '260927238.png', '&lt;div&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/div&gt;\r\n                          ', '2021-07-27 14:15:46', '2021-08-27'),
(8, 'OK Health-malamu : chef de projet sante ', '2021-07-27', '2021-08-27', '1028267778.png', '	                  ok', '2021-07-27 14:19:39', '2021-07-30'),
(10, 'video', '2021-07-27', '2021-10-27', '1945871878.PNG', '	                  Bonjour les gards\r\n	              ', '2021-07-27 14:23:29', '2021-09-27'),
(11, 'programmation fonctionnel pro-moderne', '2021-07-27', '2021-09-27', '594779713.webp', '&lt;div style=&quot;text-align: center; &quot;&gt;&lt;b&gt;venez-y nombreux apprendre le code...&lt;/b&gt;&lt;/div&gt;&lt;div&gt;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;/div&gt;&lt;div&gt;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&lt;/div&gt;&lt;div&gt;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;/div&gt;&lt;div&gt;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;/div&gt;&lt;div&gt;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/div&gt;\r\n                          ', '2021-07-27 14:28:11', '2021-08-27'),
(12, 'Anglais parlé', '2021-09-16', '2021-11-15', '45614169.png', '&lt;div&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/div&gt;', '2021-09-15 16:34:38', '2021-10-15');

-- --------------------------------------------------------

--
-- Structure de la table `inscription_formations`
--

CREATE TABLE `inscription_formations` (
  `idinscription` int(11) NOT NULL,
  `nomcomplet` varchar(3000) DEFAULT NULL,
  `email` varchar(3000) DEFAULT NULL,
  `telephone` varchar(3000) DEFAULT NULL,
  `niveau_etude` text,
  `domicile` varchar(3000) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idf` int(11) DEFAULT NULL,
  `annee` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription_formations`
--

INSERT INTO `inscription_formations` (`idinscription`, `nomcomplet`, `email`, `telephone`, `niveau_etude`, `domicile`, `created_at`, `idf`, `annee`) VALUES
(1, 'yuma kayanda', 'yuma@gmail.com', '+243817883541', 'licencié', 'Quartier katoyi', '2021-07-27 15:47:28', 11, '2020'),
(2, 'patrick kakese', 'kakese@gmail.com', '+243977525214', 'licencié', 'Quartier himbi', '2021-07-27 16:04:19', 11, '2020'),
(3, 'patrick kakese', 'kakese@gmail.com', '+243977525214', 'licencié', 'Quartier himbi', '2021-07-27 16:04:19', 10, '2020'),
(4, 'sefu kakese', 'sefu@gmail.com', '+243977525214', 'licencié', 'Quartier himbi', '2021-07-27 16:04:19', 11, '2020'),
(5, 'jeremie bashonga boss', 'jeremie11@gmail.com', '+243970524665', 'licencié', 'Quartier keshero', '2021-07-27 16:04:19', 11, '2021'),
(7, 'patrona boss', 'patrona@gmail.com', '+243810409151', 'licencié', 'Goma tmk', '2021-07-28 16:29:58', 8, '2021'),
(9, 'seigneur birndwa', 'seigneur@gmail.com', '+243817883541', 'licencié', 'Goma tmk', '2021-07-28 17:06:31', 11, '2021'),
(10, 'seigneur birndwa', 'seigneur@gmail.com', '+243810409151', 'licencié', 'Goma tmk', '2021-08-21 18:26:28', 10, ''),
(13, 'patrona boss', 'info.devtech@gmail.com', '+243810409151', 'licencié', 'Quartier keshero', '2021-08-21 18:35:38', 10, ''),
(14, 'patrona boss', 'sumailiroger681@gmail.com', '+243810409151', 'licencié', 'Goma tmk', '2021-08-21 18:46:11', 10, ''),
(16, 'seigneur birndwa', 'seigneur@gmail.com', '+243810409151', 'licencié', 'Goma tmk', '2021-09-15 16:40:41', 12, '2021'),
(17, 'madeilene olese', 'madeleine@gmail.com', '+243817883541', 'licencié', 'Quartier keshero', '2021-09-15 16:41:17', 12, '2021'),
(18, 'Baraka Bernard espoir', 'Bernard@gmail.com', '+243823187085', 'licencié', 'Goma tmk', '2021-09-15 16:42:16', 12, '2021'),
(19, 'yuma kayanda françois', 'yuma@gmail.com', '+243817883541', 'licencié', 'Goma quartier katoyi', '2021-09-24 14:09:57', 12, '');

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

CREATE TABLE `invite` (
  `idinvite` int(11) NOT NULL,
  `idconference` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invite`
--

INSERT INTO `invite` (`idinvite`, `idconference`, `id_user`, `created_at`, `link`) VALUES
(21, 12, 8, '2021-09-25 16:28:54', NULL),
(23, 12, 12, '2021-09-25 16:43:32', NULL),
(24, 12, 13, '2021-09-25 16:46:08', NULL),
(25, 6, 12, '2021-09-25 16:46:48', NULL),
(26, 6, 13, '2021-09-25 16:46:48', NULL),
(30, 12, 16, '2021-09-25 16:56:13', NULL),
(31, 12, 14, '2021-09-25 16:56:23', NULL),
(32, 9, 14, '2021-09-25 17:11:46', NULL),
(33, 12, 15, '2021-09-25 17:14:14', NULL),
(35, 12, 7, '2021-09-25 17:21:14', NULL),
(36, 12, 11, '2021-09-25 17:37:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lesson`
--

CREATE TABLE `lesson` (
  `idlesson` int(11) NOT NULL,
  `nomlesson` varchar(300) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `descriptionlesson` text,
  `code` varchar(300) DEFAULT NULL,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lesson`
--

INSERT INTO `lesson` (`idlesson`, `nomlesson`, `idcours`, `id_user`, `descriptionlesson`, `code`, `fichier`, `created_at`) VALUES
(1, 'Créer une nouvelle appli React', 2, 7, 'Create React App est un environnement confortable pour apprendre React, et constitue la meilleure option pour démarrer une nouvelle application web monopage en React.\r\n\r\nIl configure votre environnement de développement de façon à vous permettre d’utiliser les dernières fonctionnalités de JavaScript, propose une expérience développeur agréable et optimise votre application pour la production. Vous aurez besoin de Node &gt;= 8.10 et de npm &gt;= 5.6 sur votre machine. Pour créer un projet, exécutez :\r\n\r\nnpx create-react-app mon-app\r\ncd mon-app\r\nnpm start', '536690186', '686912239.mp4', '2021-09-22 10:03:13'),
(2, 'Créer une boîte à outils à partir de zéro', 2, 7, 'Une boîte à outils de construction en JavaScript comprend généralement :\r\n\r\nUn gestionnaire de paquets, tel que Yarn ou npm. Il vous permet de tirer parti d’un vaste écosystème de paquets tiers, et de les installer ou les mettre à jour facilement.\r\nUn bundler, tel que webpack ou Parcel. Il vous permet d’écrire du code modulaire et de le regrouper en petits paquets permettant d’optimiser le temps de chargement.\r\nUn compilateur tel que Babel. Il vous permet d’écrire du JavaScript moderne qui fonctionnera quand même dans les navigateurs les plus anciens.\r\nSi vous préférez configurer votre propre boîte à outils JavaScript à partir de zéro, jetez un œil à ce guide qui re-crée certaines des fonctionnalités de Create React App.\r\n\r\nPensez à vous assurer que votre outillage personnalisé est correctement configuré pour la production.', '98903100', '573174525.mp4', '2021-09-22 10:05:54'),
(3, 'Prérequis', 2, 7, 'Nous supposerons que vous êtes un minimum à l’aise avec HTML et JavaScript, mais même si vous venez d’un autre langage de programmation vous devriez être capable de suivre le déroulé. Nous supposerons aussi que vous connaissez déjà les notions de programmation telles que les fonctions, objets, tableaux, et dans une moindre mesure, les classes.\r\n\r\nSi vous avez besoin de réviser votre JavaScript, nous vous conseillons la lecture de ce guide. Remarquez que nous utilisons aussi certains aspects d’ES6—une version récente de JavaScript. Dans ce tutoriel, on utilise les fonctions fléchées, les classes, et les instructions let, et const. Vous pouvez utiliser la REPL Babel pour examiner le résultat de la compilation de code ES6.', '1364354720', '1400402931.mp4', '2021-09-22 10:07:23'),
(4, 'Augmenter la taille maximale des fichiers uploadés en PHP', 7, 7, 'La taille maximale de tout fichier pouvant être uploadé sur un site Web écrit en PHP est déterminée par les valeurs de max_size, mentionnées dans le fichier php.ini du serveur. En cas de serveur hébergé, vous devez contacter l’administrateur du serveur d’hébergement. Il est utile de créer un serveur http local pour les développeurs et leur fournit un accès physique et administratif complet au serveur local. Il s’agit donc du serveur le plus utilisé et il est très facile d’augmenter la limite de téléchargement de fichiers à la valeur souhaitée sur ce serveur.', '825322329', '1090383891.mp4', '2021-09-22 10:20:58'),
(6, 'Introduction', 1, 7, 'We have already created our very first Vue app! This looks pretty similar to rendering a string template, but Vue has done a lot of work under the hood. The data and the DOM are now linked, and everything is now reactive. How do we know? Open your browser’s JavaScript console (right now, on this page) and set app.message to a different value. You should see the rendered example above update accordingly.', '1710665988', '51446353.mp4', '2021-09-22 11:42:31'),
(7, 'The Vue Instance', 1, 7, 'The Vue Instance\r\nCreating a Vue Instance\r\nEvery Vue application starts by creating a new Vue instance with the Vue function:\r\n\r\nvar vm = new Vue({\r\n  // options\r\n})\r\nAlthough not strictly associated with the MVVM pattern, Vue’s design was partly inspired by it. As a convention, we often use the variable vm (short for ViewModel) to refer to our Vue instance.\r\n\r\nWhen you create a Vue instance, you pass in an options object. The majority of this guide describes how you can use these options to create your desired behavior. For reference, you can also browse the full list of options in the API reference.\r\n\r\nA Vue application consists of a root Vue instance created with new Vue, optionally organized into a tree of nested, reusable components. For example, a todo app’s component tree might look like this:\r\n\r\nRoot Instance\r\n?? TodoList\r\n   ?? TodoItem\r\n   ?  ?? TodoButtonDelete\r\n   ?  ?? TodoButtonEdit\r\n   ?? TodoListFooter\r\n      ?? TodosButtonClear\r\n      ?? TodoListStatistics\r\nWe’ll talk about the component system in detail later. For now, just know that all Vue components are also Vue instances, and so accept the same options object (except for a few root-specific options).', '1564950059', '1941268838.mp4', '2021-09-22 11:47:17'),
(8, 'Usage et compréhension', 10, 15, 'Historique\r\nLa bibliothèque JavaScript libre jQuery est créée en 2006 par le développeur américain John Resig. Alors étudiant à l\'université, celui-ci l\'a conçue comme un outil facilitant l\'exploration d\'un document HTML, via sa représentation objet, et permettant de surmonter les différences d\'interprétation du code JavaScript par les navigateurs web4. La première version de JQuery est publiée en janvier 2006 ; la version stable 1.0, en août de la même année. Au départ, l\'œuvre d\'une seule personne, le projet devient celui d\'une communauté de développeurs bénévoles. Il obtient aussi la reconnaissance de la Mozilla Foundation et de multinationales de l\'informatique telles que IBM, Google et Microsoft5.\r\n\r\nUsage\r\nLa librairie jQuery se présente comme un unique fichier JavaScript de 247 ko contenant toutes les fonctions de base6.\r\n\r\nVoici un exemple d\'Ajax avec jQuery :\r\n\r\n$(document).ready(function() {                    // Lorsque le document est chargé\r\n    $(&quot;.load_page_on_click&quot;).click(function() {   // Lorsque l’on clique sur un élément d\'attribut class &quot;load_page_on_click&quot;\r\n        var email = $(&quot;input[name=email]&quot;).val(); // Variable contenant la valeur d\'un élément input d\'attribut name &quot;email&quot;\r\n        $.ajax({                         // Exécution d’une requête Ajax avec la configuration donnée par l\'objet suivant :\r\n            async: &quot;true&quot;,               // - requête asynchrone\r\n            type: &quot;GET&quot;,                 // - type HTTP GET\r\n            url: &quot;mapage.php&quot;,           // - URL de la page à charger\r\n            data: &quot;email=&quot; + encodeURIComponent(email) + &quot;&amp;action=get_email&quot;, // - données à envoyer\r\n            error: function(errorData) { // - fonction de rappel en cas d’erreur\r\n                $(&quot;#error&quot;).html(errorData);\r\n            },\r\n            success: function(data) {    // - fonction de rappel pour le traitement des données reçues en cas de succès\r\n                $(&quot;#container&quot;).html(data); $(&quot;#error&quot;).append(&quot;Contenu chargé&quot;);\r\n            }\r\n        }); // Fermeture de l\'appel à la fonction $.ajax\r\n    });     // Fermeture de la fonction de rappel du $(&quot;.load_page_on_click&quot;).click\r\n});         // Fermeture de la fonction de rappel du $(document).ready\r\nOn peut aussi remplacer la première ligne du script $(document).ready(function() { par $(function() {.\r\n\r\nNotes et références\r\n« https://blog.jquery.com/2021/03/02/jquery-3-6-0-released/ » [archive] (consulté le 2 mars 2021)\r\n« Release 3.6.0 » [archive], 3 mars 2021 (consulté le 10 mars 2021)\r\n(en) « Jquery: write less, do more » [archive] (consulté le 13 juin 2014).\r\nVincent Hermann, « jQuery fête ses dix ans : une première bêta pour la version 3.0 » [archive], Next INpact, 15 janvier 2016 (consulté le 10 juin 2020).\r\nLuc Van Lancker, jQuery : Le framework JavaScript du Web 2.0, éditions ENI, 2009, 537 p. (ISBN 9782746052413 et 2746052415), p. 12-13.\r\n(en) jQuery [archive].\r\nAnnexes\r\nSur les autres projets Wikimedia :\r\n\r\nJQuery, sur Wikiversity\r\nJQuery, sur Wikibooks\r\nArticle connexe\r\nProgrammation web\r\nJQuery UI\r\nJQuery Mobile\r\njQuery DataTables', '1776695461', '759759155.mp4', '2021-09-23 19:03:37'),
(9, 'Comparaison avec vuejs', 11, 15, 'Pourquoi travailler avec Vue.js ?\r\nJ’ai découvert Vue.js il y a plus de deux ans, et j’ai beaucoup de plaisir à l’utiliser. J’ai eu la chance de travailler sur trois projets en Vue.js, associés à d’autres technologies. Mais après ça, je suis revenu sur des projects « backend » plus classique, avec Symfony, eZPublish, Drupal… et avec jQuery pour gérer les événements de clic.\r\n\r\nIl est tout à fait possible de faire des beaux projets avec jQuery, mais j’étais triste de ne plus utiliser Vue.js, et travailler sans est moins fun.\r\n\r\nJusqu’au moment où j’ai eu besoin de synchroniser plusieurs éléments du DOM ensemble avec jQuery, sur un panier interactif pour un site e-commerce. Avant d’en devenir fou, j’ai supprimé tout mon code, et refait mon travail avec Vue.js en seulement une nuit blanche ! Et depuis, je suis heureux.\r\n\r\nDepuis ce jour, j’ai juste envie d’utiliser Vue.js, partout, tout le temps ! Et je vais vous montrer comment procéder.\r\n\r\nNote : les exemples montrés ici ne sont pas parfaits, ils pourraient largement être améliorés, mais j’ai essayé de rester le plus simple possible. Tout le code est disponible ici.\r\n\r\nComparaison d’exemples simples entre jQuery et Vue.js\r\nIntégration simple\r\nUne intégration simple de Vue.js est l’inclusion de la library Vue.js (via un CDN par exemple), une div, et un petit bout de javascript :\r\n\r\n&lt;div id=&quot;Vue&quot;&gt;\r\n  Message from vue : {{ message }}\r\n&lt;/div&gt;\r\nview rawsimple.html hosted with ? by GitHub\r\nnew Vue({\r\n  el: \'#Vue\',\r\n  data() {\r\n    return {\r\n      message: \'I am in Vue\'\r\n    }\r\n  }\r\n})\r\nview rawsimple.vue hosted with ? by GitHub', '1993199238', '1066335987.mp4', '2021-09-23 19:06:27'),
(10, ' Exercices avec jQuery et Ajax', 10, 15, 'Un peu d\'Ajax et de jQuery\r\nLe cours en version transparents et en version article.\r\n\r\nLes bons tutoriaux sur Ajax sont chez\r\n\r\nMozilla\r\nou Xul!\r\nEt pour aller plus loin, plusieurs articles sur Ajax;\r\net les spécifications indispensables, Document, XMLHttpRequest et JavaScript.\r\nC\'est directement chez jQuery que vous pourrez à la fois télécharger la bibliothèque et trouver de bons tutoriaux sur jQuery. La documentation de l\'API est bien faite et est une mine d\'informations.', '20695244', '359731992.mp4', '2021-09-23 20:27:50');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(800) DEFAULT NULL,
  `url` varchar(800) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `icone` varchar(300) DEFAULT NULL,
  `titre` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `message`, `url`, `id_user`, `created_at`, `icone`, `titre`) VALUES
(25, 'yuma kayanda Vient de rejoindre la plateforme ', 'admin/users', 8, '2021-04-12 13:29:13', 'fa fa-user', 'Nouvelle inscription'),
(27, 'kasumba kipundula Vient de rejoindre la plateforme ', 'admin/users', 7, '2021-04-12 13:30:58', 'fa fa-user', 'Nouvelle inscription'),
(28, 'kasumba kipundula Vient de rejoindre la plateforme ', 'admin/users', 8, '2021-04-12 13:30:58', 'fa fa-user', 'Nouvelle inscription'),
(29, 'kasumba kipundula Vient de rejoindre la plateforme ', 'admin/users', 9, '2021-04-12 13:30:58', 'fa fa-user', 'Nouvelle inscription'),
(30, 'mikah kalume Vient de rejoindre la plateforme ', 'admin/users', 7, '2021-04-12 13:33:19', 'fa fa-user', 'Nouvelle inscription'),
(31, 'mikah kalume Vient de rejoindre la plateforme ', 'admin/users', 8, '2021-04-12 13:33:19', 'fa fa-user', 'Nouvelle inscription'),
(34, 'kasumba kipundula vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 17:48:57', 'fa fa-bell', 'nouveau paiement'),
(35, 'kasumba kipundula vient de payer 20$', 'admin/paiement_normale', 7, '2021-09-15 17:49:00', 'fa fa-bell', 'nouveau paiement'),
(36, 'kasumba kipundula vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 17:49:00', 'fa fa-bell', 'nouveau paiement'),
(38, 'kasumba kipundula vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 17:49:06', 'fa fa-bell', 'nouveau paiement'),
(40, 'kasumba kipundula vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 17:50:01', 'fa fa-bell', 'nouveau paiement'),
(42, 'kasumba kipundula vient de payer 10$', 'admin/paiement_normale', 8, '2021-09-15 17:52:57', 'fa fa-bell', 'nouveau paiement'),
(44, 'mikah kalume vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 17:53:36', 'fa fa-bell', 'nouveau paiement'),
(46, 'mikah kalume vient de payer 10$', 'admin/paiement_normale', 8, '2021-09-15 17:54:11', 'fa fa-bell', 'nouveau paiement'),
(48, 'kasumba kipundula vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 17:54:36', 'fa fa-bell', 'nouveau paiement'),
(50, 'yuma kayanda vient de payer 25$', 'admin/paiement_normale', 8, '2021-09-15 17:55:01', 'fa fa-bell', 'nouveau paiement'),
(51, 'Bonjour mikah kalume votre paiement a été invalidé suite à une cause valide. prière de vérifier la cause d\'invalidité de votre paiement au près de l\'administrateur du système ????', 'entreprise/facturePaiement/8038da89e49ac5eabb489cfc6cea9fc1', 13, '2021-09-15 23:00:45', 'fa fa-close', 'Désolé votre paiement a été invalide'),
(53, 'kasumba kipundula vient de payer 30$', 'admin/paiement_normale', 8, '2021-09-15 23:07:26', 'fa fa-bell', 'nouveau paiement'),
(54, 'mikah kalume vient de payer 20$', 'admin/paiement_normale', 7, '2021-09-15 23:08:21', 'fa fa-bell', 'nouveau paiement'),
(55, 'mikah kalume vient de payer 20$', 'admin/paiement_normale', 8, '2021-09-15 23:08:21', 'fa fa-bell', 'nouveau paiement'),
(56, 'yuma kayanda vient de payer 40$', 'admin/paiement_normale', 7, '2021-09-15 23:08:39', 'fa fa-bell', 'nouveau paiement'),
(57, 'yuma kayanda vient de payer 40$', 'admin/paiement_normale', 8, '2021-09-15 23:08:39', 'fa fa-bell', 'nouveau paiement'),
(58, 'mikah kalume vient de payer 5$', 'admin/paiement_normale', 7, '2021-09-19 11:39:38', 'fa fa-bell', 'nouveau paiement'),
(59, 'mikah kalume vient de payer 5$', 'admin/paiement_normale', 8, '2021-09-19 11:39:38', 'fa fa-bell', 'nouveau paiement'),
(60, 'kasumba kipundula vous venez d\'être confirmé', 'user/learn/formation/12/12/2021-09-20', 12, '2021-09-20 12:04:35', 'fa fa-headphones', 'Votre inscription a été validé avec succès'),
(61, 'kasumba kipundula vous venez d\'être confirmé', 'user/learn/formation/12/12/2021-09-20', 12, '2021-09-20 12:05:33', 'fa fa-headphones', 'Votre inscription a été validé avec succès'),
(62, 'mikah kalume vous venez d\'être confirmé', 'user/learn/formation/12/13/2021-09-20', 13, '2021-09-20 12:05:47', 'fa fa-headphones', 'Votre inscription a été validé avec succès'),
(63, 'yuma kayanda vous venez d\'être confirmé', 'user/learn/formation/11/11/2021-09-20', 11, '2021-09-20 12:05:59', 'fa fa-headphones', 'Votre inscription a été validé avec succès'),
(64, 'kasumba kipundula vous venez d\'être confirmé', 'user/learn/formation/11/12/2021-09-20', 12, '2021-09-20 12:06:25', 'fa fa-headphones', 'Votre inscription a été validé avec succès'),
(65, 'John vous venez d\'être attribué à la formationAnglais parlé', 'formateur/myformation/12/15', 15, '2021-09-20 15:10:07', 'fa fa-headphones', 'Coach mentor pour la foration Anglais parlé'),
(66, 'Honoré vous venez d\'être attribué à la formationAnglais parlé', 'formateur/myformation/12/16', 16, '2021-09-21 12:48:04', 'fa fa-headphones', 'Coach mentor pour la foration Anglais parlé'),
(67, 'John vous venez d\'être attribué à la formationprogrammation fonctionnel pro-moderne', 'formateur/myformation/11/15', 15, '2021-09-21 12:54:43', 'fa fa-headphones', 'Coach mentor pour la foration programmation fonctionnel pro-moderne'),
(68, 'Honoré vous venez d\'être attribué à la formationprogrammation fonctionnel pro-moderne', 'formateur/myformation/11/16', 16, '2021-09-21 12:54:56', 'fa fa-headphones', 'Coach mentor pour la foration programmation fonctionnel pro-moderne'),
(69, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/228714395', 11, '2021-09-21 20:37:48', 'fa fa-book', 'nouveau cours: Vue js'),
(70, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/228714395', 12, '2021-09-21 20:37:49', 'fa fa-book', 'nouveau cours: Vue js'),
(71, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1161599114', 11, '2021-09-21 20:38:01', 'fa fa-book', 'nouveau cours: Vue js'),
(72, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1161599114', 12, '2021-09-21 20:38:01', 'fa fa-book', 'nouveau cours: Vue js'),
(73, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1357802879', 11, '2021-09-21 20:39:36', 'fa fa-book', 'nouveau cours: Vue js'),
(74, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1357802879', 12, '2021-09-21 20:39:36', 'fa fa-book', 'nouveau cours: Vue js'),
(75, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/643922778', 11, '2021-09-21 20:41:36', 'fa fa-book', 'nouveau cours: Vue js'),
(76, 'sumaili shabani vient d\'ajouter un cours\r\n		             Vue js à la formation programmation fonctionnel pro-moderne', 'user/cours/11/643922778', 12, '2021-09-21 20:41:37', 'fa fa-book', 'nouveau cours: Vue js'),
(77, 'sumaili shabani vient d\'ajouter un cours\r\n		             Angular à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1603921696', 11, '2021-09-21 21:09:46', 'fa fa-book', 'nouveau cours: Angular'),
(78, 'sumaili shabani vient d\'ajouter un cours\r\n		             Angular à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1603921696', 12, '2021-09-21 21:09:46', 'fa fa-book', 'nouveau cours: Angular'),
(79, 'sumaili shabani vient d\'ajouter un cours\r\n		             Cours particuliers d’anglais parlé à la formation Anglais parlé', 'user/cours/12/1240999808', 12, '2021-09-21 22:32:54', 'fa fa-book', 'nouveau cours: Cours particuliers d’anglais parlé'),
(80, 'sumaili shabani vient d\'ajouter un cours\r\n		             Cours particuliers d’anglais parlé à la formation Anglais parlé', 'user/cours/12/1240999808', 13, '2021-09-21 22:32:54', 'fa fa-book', 'nouveau cours: Cours particuliers d’anglais parlé'),
(81, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Créer une nouvelle appli React à la formation programmation fonctionnel pro-moderne', 'user/lesson/2/536690186', 11, '2021-09-22 10:03:13', 'fa fa-video', 'nouvelle leçon: Créer une nouvelle appli React'),
(82, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Créer une nouvelle appli React à la formation programmation fonctionnel pro-moderne', 'user/lesson/2/536690186', 12, '2021-09-22 10:03:13', 'fa fa-video', 'nouvelle leçon: Créer une nouvelle appli React'),
(83, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Créer une boîte à outils à partir de zéro à la formation programmation fonctionnel pro-moderne', 'user/lesson/2/98903100', 11, '2021-09-22 10:05:54', 'fa fa-video', 'nouvelle leçon: Créer une boîte à outils à partir de zéro'),
(84, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Créer une boîte à outils à partir de zéro à la formation programmation fonctionnel pro-moderne', 'user/lesson/2/98903100', 12, '2021-09-22 10:05:54', 'fa fa-video', 'nouvelle leçon: Créer une boîte à outils à partir de zéro'),
(85, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Augmenter la taille maximale des fichiers uploadés en PHP à la formation programmation fonctionnel pro-moderne', 'user/lesson/7/825322329', 11, '2021-09-22 10:20:58', 'fa fa-video', 'nouvelle leçon: Augmenter la taille maximale des fichiers uploadés en PHP'),
(86, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Augmenter la taille maximale des fichiers uploadés en PHP à la formation programmation fonctionnel pro-moderne', 'user/lesson/7/825322329', 12, '2021-09-22 10:20:58', 'fa fa-video', 'nouvelle leçon: Augmenter la taille maximale des fichiers uploadés en PHP'),
(87, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Introduction à la formation programmation fonctionnel pro-moderne', 'user/lesson/1/2029202850', 11, '2021-09-22 10:30:27', 'fa fa-video', 'nouvelle leçon: Introduction'),
(88, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Introduction à la formation programmation fonctionnel pro-moderne', 'user/lesson/1/2029202850', 12, '2021-09-22 10:30:28', 'fa fa-video', 'nouvelle leçon: Introduction'),
(89, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Introduction à la formation programmation fonctionnel pro-moderne', 'user/lesson/1/1710665988', 11, '2021-09-22 11:42:31', 'fa fa-video', 'nouvelle leçon: Introduction'),
(90, 'sumaili shabani vient d\'ajouter une leçon\r\n		             Introduction à la formation programmation fonctionnel pro-moderne', 'user/lesson/1/1710665988', 12, '2021-09-22 11:42:32', 'fa fa-video', 'nouvelle leçon: Introduction'),
(91, 'sumaili shabani vient d\'ajouter une leçon\r\n		             The Vue Instance à la formation programmation fonctionnel pro-moderne', 'user/lesson/1/1564950059', 11, '2021-09-22 11:47:17', 'fa fa-video', 'nouvelle leçon: The Vue Instance'),
(92, 'sumaili shabani vient d\'ajouter une leçon\r\n		             The Vue Instance à la formation programmation fonctionnel pro-moderne', 'user/lesson/1/1564950059', 12, '2021-09-22 11:47:17', 'fa fa-video', 'nouvelle leçon: The Vue Instance'),
(93, 'sumaili shabani vient d\'ajouter un travail\r\n		             Exercice - Vue 1 à la formation programmation fonctionnel pro-moderne', 'user/work/6/760368505', 11, '2021-09-22 14:30:18', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice - Vue 1'),
(94, 'sumaili shabani vient d\'ajouter un travail\r\n		             Exercice - Vue 1 à la formation programmation fonctionnel pro-moderne', 'user/work/6/760368505', 12, '2021-09-22 14:30:18', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice - Vue 1'),
(95, 'sumaili shabani vient d\'ajouter un travail\r\n		             Premier pas à la formation programmation fonctionnel pro-moderne', 'user/work/7/981859508', 11, '2021-09-22 14:34:23', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Premier pas'),
(96, 'sumaili shabani vient d\'ajouter un travail\r\n		             Premier pas à la formation programmation fonctionnel pro-moderne', 'user/work/7/981859508', 12, '2021-09-22 14:34:23', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Premier pas'),
(97, 'sumaili shabani vient d\'ajouter un travail\r\n		             Mur d\'images (le retour) à la formation programmation fonctionnel pro-moderne', 'user/work/2/1223853253', 11, '2021-09-22 14:58:26', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Mur d\'images (le retour)'),
(98, 'sumaili shabani vient d\'ajouter un travail\r\n		             Mur d\'images (le retour) à la formation programmation fonctionnel pro-moderne', 'user/work/2/1223853253', 12, '2021-09-22 14:58:26', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Mur d\'images (le retour)'),
(99, 'John smith vient d\'ajouter un cours\r\n		             Ajax  à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1606650590', 11, '2021-09-23 18:28:51', 'fa fa-book', 'nouveau cours: Ajax '),
(100, 'John smith vient d\'ajouter un cours\r\n		             Ajax  à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1606650590', 12, '2021-09-23 18:28:51', 'fa fa-book', 'nouveau cours: Ajax '),
(101, 'John smith vient d\'ajouter un cours\r\n		             Angular à la formation programmation fonctionnel pro-moderne', 'user/cours/11/161108079', 11, '2021-09-23 18:34:48', 'fa fa-book', 'nouveau cours: Angular'),
(102, 'John smith vient d\'ajouter un cours\r\n		             Angular à la formation programmation fonctionnel pro-moderne', 'user/cours/11/161108079', 12, '2021-09-23 18:34:48', 'fa fa-book', 'nouveau cours: Angular'),
(103, 'John smith vient d\'ajouter un cours\r\n		             Jquery à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1592889177', 11, '2021-09-23 18:38:01', 'fa fa-book', 'nouveau cours: Jquery'),
(104, 'John smith vient d\'ajouter un cours\r\n		             Jquery à la formation programmation fonctionnel pro-moderne', 'user/cours/11/1592889177', 12, '2021-09-23 18:38:01', 'fa fa-book', 'nouveau cours: Jquery'),
(105, 'John smith vient d\'ajouter une leçon\r\n		             Usage et compréhension à la formation programmation fonctionnel pro-moderne', 'user/lesson/10/1776695461', 11, '2021-09-23 19:03:38', 'fa fa-video', 'nouvelle leçon: Usage et compréhension'),
(106, 'John smith vient d\'ajouter une leçon\r\n		             Usage et compréhension à la formation programmation fonctionnel pro-moderne', 'user/lesson/10/1776695461', 12, '2021-09-23 19:03:38', 'fa fa-video', 'nouvelle leçon: Usage et compréhension'),
(107, 'John smith vient d\'ajouter une leçon\r\n		             Comparaison avec vuejs à la formation programmation fonctionnel pro-moderne', 'user/lesson/11/1993199238', 11, '2021-09-23 19:06:27', 'fa fa-video', 'nouvelle leçon: Comparaison avec vuejs'),
(108, 'John smith vient d\'ajouter une leçon\r\n		             Comparaison avec vuejs à la formation programmation fonctionnel pro-moderne', 'user/lesson/11/1993199238', 12, '2021-09-23 19:06:27', 'fa fa-video', 'nouvelle leçon: Comparaison avec vuejs'),
(109, 'John smith vient d\'ajouter une leçon\r\n		              Exercices avec jQuery et Ajax à la formation programmation fonctionnel pro-moderne', 'user/lesson/10/20695244', 11, '2021-09-23 20:27:50', 'fa fa-video', 'nouvelle leçon:  Exercices avec jQuery et Ajax'),
(110, 'John smith vient d\'ajouter une leçon\r\n		              Exercices avec jQuery et Ajax à la formation programmation fonctionnel pro-moderne', 'user/lesson/10/20695244', 12, '2021-09-23 20:27:51', 'fa fa-video', 'nouvelle leçon:  Exercices avec jQuery et Ajax'),
(111, 'John smith vient d\'ajouter un travail\r\n		             Exercice 1 à la formation programmation fonctionnel pro-moderne', 'user/work/10/472260720', 11, '2021-09-23 20:29:52', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice 1'),
(112, 'John smith vient d\'ajouter un travail\r\n		             Exercice 1 à la formation programmation fonctionnel pro-moderne', 'user/work/10/472260720', 12, '2021-09-23 20:29:53', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice 1'),
(113, 'John smith vient d\'ajouter un travail\r\n		             Exercice n° 2 à la formation programmation fonctionnel pro-moderne', 'user/work/10/1076375630', 11, '2021-09-23 20:51:01', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice n° 2'),
(114, 'John smith vient d\'ajouter un travail\r\n		             Exercice n° 2 à la formation programmation fonctionnel pro-moderne', 'user/work/10/1076375630', 12, '2021-09-23 20:51:01', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice n° 2'),
(115, 'John smith vient d\'ajouter un travail\r\n		             Exercice n° 3 à la formation programmation fonctionnel pro-moderne', 'user/work/9/2070011514', 11, '2021-09-23 20:52:20', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice n° 3'),
(116, 'John smith vient d\'ajouter un travail\r\n		             Exercice n° 3 à la formation programmation fonctionnel pro-moderne', 'user/work/9/2070011514', 12, '2021-09-23 20:52:20', 'fa fa-bookmark-o', 'Vous avez peut être raté travail: Exercice n° 3'),
(119, 'yuma kayanda françois vient d\'ajouter un module ', 'admin/inscri_formation/', 7, '2021-09-24 14:09:57', 'fa fa-compass', 'Nouvelle inscription à la formation'),
(120, 'yuma kayanda françois vient d\'ajouter un module ', 'admin/inscri_formation/', 8, '2021-09-24 14:09:57', 'fa fa-compass', 'Nouvelle inscription à la formation'),
(121, 'yuma kayanda vient de remettre son travail à la formation programmation fonctionnel pro-moderne', 'formateur/formations', 15, '2021-09-25 12:58:49', 'fa fa-tags', 'nouveau dépôt de travail: '),
(122, 'yuma kayanda vient de remettre son travail à la formation programmation fonctionnel pro-moderne', 'formateur/formations', 16, '2021-09-25 12:58:49', 'fa fa-tags', 'nouveau dépôt de travail: '),
(123, 'yuma kayanda vient de remettre son travail à la formation programmation fonctionnel pro-moderne', 'formateur/formations', 15, '2021-09-25 13:02:19', 'fa fa-tags', 'nouveau dépôt de travail: '),
(124, 'yuma kayanda vient de remettre son travail à la formation programmation fonctionnel pro-moderne', 'formateur/formations', 16, '2021-09-25 13:02:19', 'fa fa-tags', 'nouveau dépôt de travail: '),
(125, 'sumaili shabani Vient de vous ajouter pour faire part dans une conférence', 'formateur/joinmetting/https://meet.jit.si/MU12WdAekZc5TZd4IEcA8DnmypYYnP', 14, '2021-09-25 17:11:46', 'fa fa-video', 'Bonjour  jérémie  vous venez d\'être sélectionné(e) dans une conférence'),
(126, 'sumaili shabani Vient de vous ajouter pour faire part dans une conférence', 'formateur/joinmetting/https://meet.jit.si/MU12WdAekZc5TZd4IEcA8DnmypYYnP', 15, '2021-09-25 17:14:14', 'fa fa-video', 'Bonjour  John smith vous venez d\'être sélectionné(e) dans une conférence'),
(127, 'sumaili shabani Vient de vous ajouter pour faire part dans une conférence', 'admin/joinmetting/http://localhost:82/training/admin/reunion', 7, '2021-09-25 17:16:57', 'fa fa-video', 'Bonjour  sumaili shabani vous venez d\'être sélectionné(e) dans une conférence'),
(128, 'sumaili shabani Vient de vous ajouter pour faire part dans une conférence', 'admin/joinmetting/https://meet.jit.si/MU12WdAekZc5TZd4IEcA8DnmypYYnP', 7, '2021-09-25 17:21:15', 'fa fa-video', 'Bonjour  sumaili shabani vous venez d\'être sélectionné(e) dans une conférence'),
(129, 'sumaili shabani Vient de vous ajouter pour faire part dans une conférence', 'user/joinmetting/https://meet.jit.si/FzPegMWzfxO0qfhKsZ3w0ZxFbYBqqM', 11, '2021-09-25 17:37:40', 'fa fa-video', 'Bonjour  yuma kayanda vous venez d\'être sélectionné(e) dans une conférence'),
(130, 'sumaili shabani vient d\'ajouter un cours\r\n		             Introduction aux Hooks à la formation programmation fonctionnel pro-moderne', 'user/cours/11/132322625', 11, '2021-09-26 10:10:55', 'fa fa-book', 'nouveau cours: Introduction aux Hooks'),
(131, 'sumaili shabani vient d\'ajouter un cours\r\n		             Introduction aux Hooks à la formation programmation fonctionnel pro-moderne', 'user/cours/11/132322625', 12, '2021-09-26 10:10:55', 'fa fa-book', 'nouveau cours: Introduction aux Hooks'),
(132, 'John smith vient d\'ajouter un cours\r\n		             Javascript ES6 à la formation programmation fonctionnel pro-moderne', 'user/cours/11/2130084422', 11, '2021-09-26 10:28:08', 'fa fa-book', 'nouveau cours: Javascript ES6'),
(133, 'John smith vient d\'ajouter un cours\r\n		             Javascript ES6 à la formation programmation fonctionnel pro-moderne', 'user/cours/11/2130084422', 12, '2021-09-26 10:28:08', 'fa fa-book', 'nouveau cours: Javascript ES6');

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `id_user`, `created_at`) VALUES
(2, 15, '2021-09-23 08:50:29');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `idp` int(11) NOT NULL,
  `idpersonne` int(11) DEFAULT NULL,
  `date_paie` date DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `motif` text,
  `token` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `codeFacture` varchar(300) DEFAULT NULL,
  `etat_paiement` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`idp`, `idpersonne`, `date_paie`, `montant`, `motif`, `token`, `created_at`, `codeFacture`, `etat_paiement`) VALUES
(11, 12, '2021-09-15', 20, 'gdfgd', 'f13058cb1065b13600fcb4a4f48e8ef9', '2021-09-15 17:54:36', '253614bbac999b38b5b60cae531c4969', 1),
(13, 12, '2021-09-15', 30, 'Paiement inscription à la formation anglais parlé', 'f13058cb1065b13600fcb4a4f48e8ef9', '2021-09-15 23:07:26', '5a01f0597ac4bdf35c24846734ee9a76', 0),
(14, 13, '2021-09-16', 20, 'Paiement formation', '31249d717004bcf0264ace5df8551ef9', '2021-09-15 23:08:21', '8038da89e49ac5eabb489cfc6cea9fc1', 0),
(15, 11, '2021-09-15', 40, 'Paiement formation', 'f13058cb1065b13600fcb4a4f48e8ef9', '2021-09-15 23:08:39', 'b14680dec683e744ada1f2fe08614086', 1),
(16, 13, '2021-09-19', 5, 'Paiement pour formation anglais parlé', 'c90c9336f1e347134334409e8172d19f', '2021-09-19 11:39:38', '3dc4876f3f08201c7c76cb71fa1da439', 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_article`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_article` (
`idart` int(11)
,`nom` varchar(300)
,`description` text
,`lien` varchar(400)
,`type` varchar(300)
,`image` varchar(300)
,`created_at` datetime
,`idcat` int(11)
,`nom_cat` varchar(300)
,`code` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_coach`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_coach` (
`idcoach` int(11)
,`id_user` int(11)
,`idf` int(11)
,`created_at` datetime
,`nom` text
,`date_debit` date
,`date_fin` date
,`edition` varchar(300)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`email` varchar(300)
,`image` varchar(300)
,`telephone` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_commentaire`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_commentaire` (
`idcomment` int(11)
,`idart` int(11)
,`etape1` text
,`etape2` text
,`created_at` datetime
,`nom` varchar(300)
,`description` text
,`lien` varchar(400)
,`image` varchar(300)
,`type` varchar(300)
,`idcat` int(11)
,`nomcat` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_conference`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_conference` (
`idconference` int(11)
,`nom` varchar(300)
,`date_debit` date
,`heure_debit` time
,`date_fin` date
,`heure_fin` time
,`id_user` int(11)
,`created_at` datetime
,`telephone` varchar(300)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`image` varchar(300)
,`email` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_cours`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_cours` (
`pdf` varchar(300)
,`idcours` int(11)
,`nomcours` varchar(300)
,`logo` varchar(300)
,`code` varchar(300)
,`idf` int(11)
,`id_user` int(11)
,`descriptioncours` text
,`created_at` datetime
,`nom` text
,`id` int(11)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`image` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_format`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_format` (
`idformat` int(11)
,`id_user` int(11)
,`idf` int(11)
,`jour` date
,`created_at` datetime
,`nom` text
,`date_debit` date
,`date_fin` date
,`image` varchar(300)
,`description` text
,`fin_inscription` date
,`first_name` varchar(300)
,`last_name` varchar(300)
,`telephone` varchar(300)
,`email` varchar(300)
,`id` int(11)
,`avatar` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_inscription`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_inscription` (
`idinscription` int(11)
,`nomcomplet` varchar(3000)
,`email` varchar(3000)
,`telephone` varchar(3000)
,`niveau_etude` text
,`domicile` varchar(3000)
,`annee` varchar(300)
,`idf` int(11)
,`created_at` datetime
,`nom` text
,`date_debit` date
,`date_fin` date
,`image` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_invite`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_invite` (
`idinvite` int(11)
,`idconference` int(11)
,`id_user` int(11)
,`link` varchar(300)
,`nom` varchar(300)
,`date_debit` date
,`heure_debit` time
,`date_fin` date
,`heure_fin` time
,`id` int(11)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`email` varchar(300)
,`image` varchar(300)
,`telephone` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_lesson`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_lesson` (
`fichier` varchar(300)
,`idlesson` int(11)
,`nomlesson` varchar(300)
,`idcours` int(11)
,`id_user` int(11)
,`descriptionlesson` text
,`created_at` datetime
,`code` varchar(300)
,`nomcours` varchar(300)
,`logo` varchar(300)
,`descriptioncours` text
,`first_name` varchar(300)
,`last_name` varchar(300)
,`image` varchar(300)
,`id` int(11)
,`email` varchar(300)
,`nom` text
,`idf` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_paiement`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_paiement` (
`idp` int(11)
,`idpersonne` int(11)
,`date_paie` date
,`montant` float
,`motif` text
,`token` varchar(300)
,`created_at` datetime
,`codeFacture` varchar(300)
,`etat_paiement` int(11)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`email` varchar(300)
,`telephone` varchar(300)
,`image` varchar(300)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_remise`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_remise` (
`idremise` int(11)
,`idtravail` int(11)
,`file` varchar(300)
,`id_apprenant` int(11)
,`created_at` datetime
,`nomtravail` varchar(300)
,`code` varchar(300)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`email` varchar(300)
,`telephone` varchar(300)
,`image` varchar(300)
,`sexe` varchar(30)
,`full_adresse` text
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_travail`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_travail` (
`idtravail` int(11)
,`nomtravail` varchar(300)
,`descriptiontravail` text
,`fichier` varchar(300)
,`idlesson` int(11)
,`nomlesson` varchar(300)
,`idcours` int(11)
,`id_user` int(11)
,`descriptionlesson` text
,`created_at` datetime
,`code` varchar(300)
,`nomcours` varchar(300)
,`logo` varchar(300)
,`descriptioncours` text
,`first_name` varchar(300)
,`last_name` varchar(300)
,`image` varchar(300)
,`id` int(11)
,`email` varchar(300)
,`nom` text
,`idf` int(11)
,`jour_fin` date
,`heure_fin` time
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_user`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_user` (
`id` int(11)
,`first_name` varchar(300)
,`last_name` varchar(300)
,`email` varchar(300)
,`image` varchar(300)
,`telephone` varchar(300)
,`full_adresse` text
,`biographie` text
,`date_nais` date
,`passwords` varchar(300)
,`idrole` int(11)
,`sexe` varchar(30)
,`facebook` varchar(900)
,`twitter` varchar(900)
,`linkedin` varchar(900)
,`idposte` int(11)
,`nom` varchar(300)
,`debit_event` datetime
);

-- --------------------------------------------------------

--
-- Structure de la table `recupere`
--

CREATE TABLE `recupere` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verification_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recupere`
--

INSERT INTO `recupere` (`id`, `email`, `verification_key`) VALUES
(3, 'alpha@gmail.com', '6aea3cee4087269ebea90ae4229698c7'),
(4, 'alpha@gmail.com', '1123adb273b435474c75f16e4b408015');

-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

CREATE TABLE `remise` (
  `idremise` int(11) NOT NULL,
  `idtravail` int(11) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `id_apprenant` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remise`
--

INSERT INTO `remise` (`idremise`, `idtravail`, `file`, `id_apprenant`, `created_at`) VALUES
(1, 1, '686912239.mp4', 11, '2021-09-22 15:49:45'),
(2, 5, '51446353.mp4', 12, '2021-09-22 15:51:27'),
(3, 5, '51446353.mp4', 12, '2021-09-22 15:51:49'),
(4, 5, '51446353.mp4', 12, '2021-09-22 15:52:05'),
(5, 5, '51446353.mp4', 12, '2021-09-22 15:52:09'),
(6, 5, '51446353.mp4', 12, '2021-09-22 15:52:12'),
(7, 1, '51446353.mp4', 12, '2021-09-22 15:55:01'),
(8, 8, '944881015.docx', 11, '2021-09-25 12:58:49'),
(9, 7, '45936873.pdf', 11, '2021-09-25 13:02:19');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `nom`, `created_at`) VALUES
(1, 'admin', '2021-04-12 16:10:38'),
(2, 'Apprenant', '2021-04-12 16:12:38'),
(3, 'Agent', '2021-04-12 13:54:16'),
(4, 'Formateur', '2021-09-19 11:48:09');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `idinfo` int(11) NOT NULL,
  `nom_site` varchar(300) DEFAULT NULL,
  `icone` varchar(300) DEFAULT NULL,
  `tel1` varchar(300) DEFAULT NULL,
  `tel2` varchar(300) DEFAULT NULL,
  `adresse` text,
  `facebook` varchar(600) DEFAULT NULL,
  `twitter` varchar(600) DEFAULT NULL,
  `linkedin` varchar(600) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `termes` text,
  `confidentialite` text,
  `description` text,
  `mission` text,
  `objectif` text,
  `blog` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_info`
--

INSERT INTO `tbl_info` (`idinfo`, `nom_site`, `icone`, `tel1`, `tel2`, `adresse`, `facebook`, `twitter`, `linkedin`, `email`, `termes`, `confidentialite`, `description`, `mission`, `objectif`, `blog`) VALUES
(1, 'Hub ujn', '594518509.png', '+243817883541', '+243970524665', 'RDC Nord-kivu goma quartier  1 km temoin', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'info.hubujn@gmail.com', 'Notre Politique de protection des données personnelles décrit la manière dont #hub traite les données à caractère personnel des visiteurs et des utilisateurs (ci- après les « Utilisateurs ») lors de leur navigation sur notre site. La Politique de protection des données personnelles fait partie intégrante des Conditions Générales d\'Utilisation du Site.\r\n#devtech accorde en permanence une attention aux données de nos Utilisateurs. Nous pouvons ainsi être amenés à modifier, compléter ou mettre à jour périodiquement la Politique de protection des données personnelles. Nous pourrons aussi apporter des modifications nécessaires afin de respecter les changements de la législation et règlementation en vigueur. Dans la mesure du possible, nous vous notifierons tout changement important. Nous vous encourageons toutefois à consulter régulièrement la dernière version en vigueur, accessible sur notre Site.\r\n', 'Conditions Générales d\'Utilisation\r\nDéfinitions\r\nLes Parties conviennent et acceptent que les termes suivants utilisés avec une majuscule, au singulier et/ou au pluriel, auront, dans le cadre des présentes Conditions Générales d\'Utilisation, la signification définie ci-après :\r\n?« Contrat » : désigne les présentes Conditions Générales d\'Utilisation ainsi que la Politique de protection des données personnelles ;\r\n?« Membre » : désigne indifféremment le Membre Freemium et le Membre Premium ;\r\n?« Membre Freemium » désigne le membre ayant un compte sur notre Plateforme pour accéder aux fonctionnalités gratuites de notre Plateforme ;\r\n?« Membre Premium » désigne le membre ayant un compte sur notre Plateforme pour accéder aux services Premium Solo ou Plus ;\r\n?« Plateforme » : plateforme numérique de type site Web et/ou application mobile permettant l\'accès au Service ainsi que son utilisation ;\r\n?« Utilisateur » : désigne toute personne qui utilise la Plateforme, qu\'elle soit un Visiteur ou un Membre ;\r\n?« Visiteur » : désigne toute personne, internaute, naviguant sur la Plateforme sans création de compte associé.\r\nLes présentes Conditions Générales d\'Utilisation (ci-après les \"CGU\") régissent nos rapports avec vous, personne accédant à la Plateforme, applicables durant votre utilisation de la Plateforme et, si vous êtes un Membre jusqu\'à désactivation de votre compte. Si vous n\'êtes pas d\'accord avec les termes des CGU il vous est vivement recommandé de ne pas utiliser notre Plateforme et nos services.\r\nEn naviguant sur la Plateforme, si vous êtes un Visiteur, vous reconnaissez avoir pris connaissance et accepté l\'intégralité des présentes CGU et notre Politique de protection des données personnelles.\r\nEn créant un compte en cliquant sur le bouton « S\'inscrire avec Facebook » ou « Inscription avec un email » ou « S\'inscrire avec Google » pour devenir Membre, vous êtes invité à lire et accepter les présentes CGU et la Politique de protection des données personnelles, en cochant la case prévue à cet effet.\r\nNous vous encourageons à consulter les « Conditions Générales d\'Utilisation et la Politique de protection des données personnelles » avant votre première utilisation de notre Plateforme et régulièrement lors de leurs mises à jour. Nous pouvons en effet être amenés à modifier les présentes CGU. Si des modifications sont apportées, nous vous informerons par email ou via notre Plateforme pour vous permettre d\'examiner les modifications avant qu\'elles ne prennent effet. Si vous continuez à utiliser notre Plateforme après la publication ou l\'envoi d\'un avis concernant les modifications apportées aux présentes conditions, cela signifie que vous acceptez les mises à jour. Les CGU qui vous seront opposables seront celles en vigueur lors de votre utilisation de la Plateforme.\r\nArticle 1. Inscription au service\r\n1.1 Conditions d\'inscription à la Plateforme\r\nCertaines fonctionnalités de la Plateforme nécessitent d\'être inscrit et d\'obtenir un compte. Avant de pouvoir vous inscrire sur la Plateforme vous devez avoir lu et accepté les présentes CGU et la Politique de protection des données personnelles.\r\nVous déclarez avoir la capacité d\'accepter les présentes conditions générales d\'utilisation, c\'est-à-dire avoir plus de 16 ans et ne pas faire l\'objet d\'une mesure de protection juridique des majeurs (mise sous sauvegarde de justice, sous tutelle ou sous curatelle).\r\nAvant d\'accéder à notre Plateforme, le consentement des mineurs de moins de 16 ans doit être donné par le titulaire de l\'autorité parentale.\r\nNotre Plateforme ne prévoit aucunement l\'inscription, la collecte ou le stockage de renseignement relatifs à toute personne âgée de 15 ans ou moins.\r\n1.2 Création de compte\r\nVous pourrez créer un compte des deux manières suivantes :\r\n?Soit remplir manuellement, sur notre Plateforme, les champs obligatoires figurant sur le formulaire d\'inscription, à l\'aide d\'informations complètes et exactes. ', 'Description du site', 'La mission du site', 'L\'objectif du site', ' Blog pour information');

-- --------------------------------------------------------

--
-- Structure de la table `travail`
--

CREATE TABLE `travail` (
  `idtravail` int(11) NOT NULL,
  `nomtravail` varchar(300) DEFAULT NULL,
  `idlesson` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `descriptiontravail` text,
  `code` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `jour_fin` date DEFAULT NULL,
  `heure_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `travail`
--

INSERT INTO `travail` (`idtravail`, `nomtravail`, `idlesson`, `id_user`, `descriptiontravail`, `code`, `created_at`, `jour_fin`, `heure_fin`) VALUES
(1, 'Exercice - Vue 1', 6, 7, 'Vue\r\nExercice - Vue#\r\nLe but de cet exercice est de créer le champ texte sur le principe de celui utilisé par Twitter. C’est à dire, un simple champ texte, limité à un nombre défini de caractères, un bouton de validation et un bouton d’ajout de photo qui limite encore plus le nombre de caractères.\r\n\r\nC’est en fait exactement la même chose que l’exercice de rappels (fait en Plain ou Vanilla JS), mais cette fois-ci en utilisant Vue. Par exemple, pour la mise à jour du nombre de caractères restants, lors de la saisie du message :\r\n\r\nChargez la librairie Vue\r\nCréez une nouvelle instance de Vue\r\nStockez les données globales dans data (le texte, le nombre de caractères max)\r\nCréez une propriété calculée qui calcule le nombre de caractères restants et utilisez cette valeur pour l’affichage\r\nLors de l’évènement input, mettez à jour la valeur du texte (le nombre de caractères restants devrait se mettre à jour automatiquement)\r\nContinuez les fonctionnalités en suivant ce principe\r\nEnfin, ajoutez une nouvelle fonctionnalité pour les 2 versions (plain JS et Vue) :\r\n\r\nLorsque la limite de caractères est atteinte\r\nAffichez au dessus du message une boite contenant le même message mais dont la partie en trop doit être surlignée en rouge\r\nIl faut également que cela fonctionne lorsque le bouton d’ajout de photo est coché\r\nPour la version Vue, vous aurez besoin de v-if et de v-html', '760368505', '2021-09-22 14:30:18', '2021-09-24', '14:30:00'),
(2, 'Premier pas', 7, 7, 'Exercice - Premier pas#\r\nCréez un fichier &quot;javascript.js&quot;\r\nLiez-le à la page HTML à l\'aide d\'une balise &lt;script&gt;\r\nVotre script doit:\r\n\r\nCréer une variable rayon et stockez-y la valeur 25.\r\nCalculer la surface d\'un cercle pour ce rayon\r\nAfficher la phrase: «La surface d\'un cercle de rayon (rayon) est de (surface)». (Utilisez la console de votre navigateur et utilisez la fonction console.log())\r\nModifiez la valeur de rayon et vérifiez que le code est fonctionnel.\r\nVous aurez besoin de l\'objet global Math', '981859508', '2021-09-22 14:34:23', '2021-09-25', '15:34:00'),
(3, 'Vue js exercice', 6, 7, 'VueJS est un framework Javascript frontend pour créer des interfaces utilisateurs. Tu vas me dire “encore un ?” et la réponse est oui. Sauf qu\'il est un peu différent. Déjà, c\'est intéressant de comprendre que VueJS a été conçu pour être intégré de façon incrémentale.1 juin 2020', '277676201', '2021-09-22 14:41:15', '2021-09-23', '15:41:00'),
(5, 'Mur d\'images (le retour)', 2, 7, 'Mise en place du TP\r\nElle est similaire à celles des TP précédents.\r\n\r\nRécupérez l\'archive contenant les fichiers nécessaires au projet et décompressez la dans votre espace de travail.\r\nInstallez les modules : npm install.\r\nExécutez la commande npm run build pour créer le dossier dist/ et construire un premier bundle.\r\nPendant le TP vous devrez créer les modules JavaScript demandés, il s\'agira des composants React utilisant des expressions JSX. Comme dans les TP précédents, vous utiilser Webpack pendant la phase de développement pour transpiler le JSX puis construire le bundle et enfin visualiser les résultats à chaud avec le serveur de développement :\r\n        npm run dev-server\r\nC\'est la solution que vous devez adopter pour ce TP.\r\n\r\nN\'oubliez pas d\'exécuter la commande npm run build après l\'arrêt du serveur de développement pour mettre à jour le dossier dist/.\r\nCliquez sur le titre d\'un exercice pour le découvrir.', '1223853253', '2021-09-22 14:58:26', '2021-09-26', '15:00:00'),
(6, 'Exercice n° 1', 10, 15, 'Récupérez la page ajax1.html ainsi que data.xml.\r\nModifiez le code pour que les mêmes informations apparaissent maintenant dans une liste énumérée sous le formulaire.\r\nModifiez le code pour que le texte du fichier data.xml contienne maintenant des balises html et que son contenu ne soit pas affiché das la zone de texte mais dans une boîte en-dessous.\r\npassez l\'exercice avec jQuery!', '472260720', '2021-09-23 20:29:52', '2021-09-23', '21:30:00'),
(7, 'Exercice n° 2', 10, 15, 'On reprend l\'exercice des adhérents de la bibliothèque. Proposez une solution avec Ajax (en vous aidant de la bibliothèque jQuery) qui évite de charger toutes les informations.\r\n\r\nVous pouvez utiliser un autre SGBD (MySQL) ou votre propre serveur de bases de données Postgres. Vous trouverez ici le script de création et de peuplement de la base.\r\nCréation de la base biblio\r\nPeuplement de la base biblio\r\nÉcrivez une page qui récupère la liste des adhérents et la propose dans une liste déroulante. On doit pouvoir choisir un adhérent de deux manières différentes : soit dans la liste déroulante, soit en saisissant le nom de l\'adhérent. Une autocomplétion doit alors être proposée pour aider l\'utilisateur.\r\nLorsqu\'un adhérent est choisi dans la liste, les titres des livres empruntés par cet adhérent doivent apparaître dans une boîte à côté de la liste déroulante. Un lien sur le livre doit permettre d\'accéder aux détails sur ce livre (auteur, thème, éditeur) et de les afficher dans la même page.\r\nUn fonctionnement similaire doit permettre d\'accéder à ce même genre d\'informations par le choix d\'un auteur ou d\'un thème.\r\nAjoutez un menu à votre site pour accéder à ces fonctionnalités.\r\nVotre site devra bien sûr être agréable à la navigation, et posséder une CSS appropriée.\r\n\r\nLe travail est à rendre pour le 7 octobre 2013 à 13h30.', '1076375630', '2021-09-23 20:51:01', '2021-09-24', '20:50:00'),
(8, 'Exercice n° 3', 9, 15, 'Une page contient dans une liste déroulante le nom de vos enseignants préférés.\r\n\r\nLorsqu\'un internaute sélectionne un nom dans la liste, la photo de l\'enseignant apparaît.\r\n\r\nC\'est un programme php (sur le serveur) qui possède les liaisons nom de l\'enseignant &lt;-&gt; url de la photo dans un tableau associatif.\r\nProposez une solution à l\'aide d\'Ajax.', '2070011514', '2021-09-23 20:52:20', '2021-09-24', '20:52:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `full_adresse` text,
  `biographie` text,
  `date_nais` date DEFAULT NULL,
  `passwords` varchar(300) DEFAULT NULL,
  `idrole` int(11) NOT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `facebook` varchar(900) DEFAULT NULL,
  `linkedin` varchar(900) DEFAULT NULL,
  `twitter` varchar(900) DEFAULT NULL,
  `idposte` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `telephone`, `full_adresse`, `biographie`, `date_nais`, `passwords`, `idrole`, `sexe`, `facebook`, `linkedin`, `twitter`, `idposte`) VALUES
(7, 'sumaili shabani', 'roger patrona', 'sumailiroger681@gmail.com', '1959189535.jpg', '+243817883541', 'tmk goma avenue mushanganya n°59', '<b>                                    Développeur</b> et <b>entrepreneur</b> en temps plein!                                    ', '1998-08-12', '9db09d6ae665e42340ef0b1ef1eb95b4', 1, 'M', 'https://www.facebook.com/patronat.shabanisumaili.9/', 'https://www.linkedin.com/in/sumaili-shabani-roger-patr%C3%B4na-7426a71a1/', 'https://twitter.com/RogerPatrona', 1),
(8, 'Administrateur', 'Système', 'admin@gmail.com', '1470590476.png', '+243810409151', 'Goma tmk', NULL, '2021-09-20', 'e10adc3949ba59abbe56e057f20f883e', 1, 'M', '', '', '', 1),
(9, 'alpha blonde', 'cubaka', 'alpha@gmail.com', '64089764.jpg', '0998765432', 'Nord-kivu goma', 'Le gars de la planète', '1997-04-13', 'e10adc3949ba59abbe56e057f20f883e', 4, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(11, 'yuma kayanda', 'françois', 'yuma@gmail.com', '106410934.JPG', '+243817883541', 'Goma quartier katoyi', 'Dieu est au contrôle!', '1995-01-09', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(12, 'kasumba kipundula', 'bertin', 'kasumba@gmail.com', '1067028264.JPG', '+243810409151', 'Quartier birere', NULL, '1999-04-13', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/', 1),
(13, 'mikah kalume', 'sefu', 'mikah@gmail.com', '1507513317.jpg', '+243810409151', 'quartier katoyi avenue konde', NULL, '2021-04-13', 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', '', '', '', 1),
(14, 'jérémie ', 'Anguandia', 'anguandiatsandijered03@gmail.com', 'icone-user.png', '+243825053403', 'Goma quartier mabanga-sud tmk', NULL, '2000-09-19', NULL, 4, 'M', '', '', '', 1),
(15, 'John smith', 'amateur ', 'johnsmith@gmail.com', '546117874.jpg', '+243970524665', 'Kinshasa limite deuxième rue', 'Californie USA', '1995-09-20', 'e10adc3949ba59abbe56e057f20f883e', 4, 'M', 'https://www.facebook.com/patronat.shabanisumaili.9/', 'https://www.linkedin.com/in/sumaili-shabani-roger-patr%C3%B4na-7426a71a1/', 'https://twitter.com/RogerPatrona', 1),
(16, 'Honoré', 'ounuanou', 'mercuriseries@gmail.com', 'icone-user.png', '+243817883541', 'Québec canada', NULL, '1993-09-20', NULL, 4, 'M', '', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vues`
--

CREATE TABLE `vues` (
  `idv` int(11) NOT NULL,
  `idart` int(11) DEFAULT NULL,
  `machine` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_article`
--
DROP TABLE IF EXISTS `profile_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_article`  AS  select `article`.`idart` AS `idart`,`article`.`nom` AS `nom`,`article`.`description` AS `description`,`article`.`lien` AS `lien`,`article`.`type` AS `type`,`article`.`image` AS `image`,`article`.`created_at` AS `created_at`,`article`.`idcat` AS `idcat`,`category`.`nom` AS `nom_cat`,`article`.`code` AS `code` from (`article` join `category` on((`article`.`idcat` = `category`.`idcat`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_coach`
--
DROP TABLE IF EXISTS `profile_coach`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_coach`  AS  select `coach`.`idcoach` AS `idcoach`,`coach`.`id_user` AS `id_user`,`coach`.`idf` AS `idf`,`coach`.`created_at` AS `created_at`,`formations`.`nom` AS `nom`,`formations`.`date_debit` AS `date_debit`,`formations`.`date_fin` AS `date_fin`,`coach`.`edition` AS `edition`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`image` AS `image`,`users`.`telephone` AS `telephone` from ((`coach` join `formations` on((`coach`.`idf` = `formations`.`idf`))) join `users` on((`coach`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_commentaire`
--
DROP TABLE IF EXISTS `profile_commentaire`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_commentaire`  AS  select `commentaire`.`idcomment` AS `idcomment`,`commentaire`.`idart` AS `idart`,`commentaire`.`etape1` AS `etape1`,`commentaire`.`etape2` AS `etape2`,`commentaire`.`created_at` AS `created_at`,`article`.`nom` AS `nom`,`article`.`description` AS `description`,`article`.`lien` AS `lien`,`article`.`image` AS `image`,`article`.`type` AS `type`,`article`.`idcat` AS `idcat`,`category`.`nom` AS `nomcat` from ((`commentaire` join `article` on((`article`.`idart` = `commentaire`.`idart`))) join `category` on((`category`.`idcat` = `article`.`idcat`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_conference`
--
DROP TABLE IF EXISTS `profile_conference`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_conference`  AS  select `conference`.`idconference` AS `idconference`,`conference`.`nom` AS `nom`,`conference`.`date_debit` AS `date_debit`,`conference`.`heure_debit` AS `heure_debit`,`conference`.`date_fin` AS `date_fin`,`conference`.`heure_fin` AS `heure_fin`,`conference`.`id_user` AS `id_user`,`conference`.`created_at` AS `created_at`,`users`.`telephone` AS `telephone`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image`,`users`.`email` AS `email` from (`conference` join `users` on((`conference`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_cours`
--
DROP TABLE IF EXISTS `profile_cours`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_cours`  AS  select `cours`.`pdf` AS `pdf`,`cours`.`idcours` AS `idcours`,`cours`.`nomcours` AS `nomcours`,`cours`.`logo` AS `logo`,`cours`.`code` AS `code`,`cours`.`idf` AS `idf`,`cours`.`id_user` AS `id_user`,`cours`.`descriptioncours` AS `descriptioncours`,`cours`.`created_at` AS `created_at`,`formations`.`nom` AS `nom`,`users`.`id` AS `id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image` from ((`cours` join `formations` on((`cours`.`idf` = `formations`.`idf`))) join `users` on((`cours`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_format`
--
DROP TABLE IF EXISTS `profile_format`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_format`  AS  select `format`.`idformat` AS `idformat`,`format`.`id_user` AS `id_user`,`format`.`idf` AS `idf`,`format`.`jour` AS `jour`,`format`.`created_at` AS `created_at`,`formations`.`nom` AS `nom`,`formations`.`date_debit` AS `date_debit`,`formations`.`date_fin` AS `date_fin`,`formations`.`image` AS `image`,`formations`.`description` AS `description`,`formations`.`fin_inscription` AS `fin_inscription`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`telephone` AS `telephone`,`users`.`email` AS `email`,`users`.`id` AS `id`,`users`.`image` AS `avatar` from ((`format` join `formations` on((`format`.`idf` = `formations`.`idf`))) join `users` on((`format`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_inscription`
--
DROP TABLE IF EXISTS `profile_inscription`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_inscription`  AS  select `inscription_formations`.`idinscription` AS `idinscription`,`inscription_formations`.`nomcomplet` AS `nomcomplet`,`inscription_formations`.`email` AS `email`,`inscription_formations`.`telephone` AS `telephone`,`inscription_formations`.`niveau_etude` AS `niveau_etude`,`inscription_formations`.`domicile` AS `domicile`,`inscription_formations`.`annee` AS `annee`,`formations`.`idf` AS `idf`,`inscription_formations`.`created_at` AS `created_at`,`formations`.`nom` AS `nom`,`formations`.`date_debit` AS `date_debit`,`formations`.`date_fin` AS `date_fin`,`formations`.`image` AS `image` from (`inscription_formations` join `formations` on((`inscription_formations`.`idf` = `formations`.`idf`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_invite`
--
DROP TABLE IF EXISTS `profile_invite`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_invite`  AS  select `invite`.`idinvite` AS `idinvite`,`invite`.`idconference` AS `idconference`,`invite`.`id_user` AS `id_user`,`invite`.`link` AS `link`,`conference`.`nom` AS `nom`,`conference`.`date_debit` AS `date_debit`,`conference`.`heure_debit` AS `heure_debit`,`conference`.`date_fin` AS `date_fin`,`conference`.`heure_fin` AS `heure_fin`,`users`.`id` AS `id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`image` AS `image`,`users`.`telephone` AS `telephone` from ((`invite` join `conference` on((`invite`.`idconference` = `conference`.`idconference`))) join `users` on((`invite`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_lesson`
--
DROP TABLE IF EXISTS `profile_lesson`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_lesson`  AS  select `lesson`.`fichier` AS `fichier`,`lesson`.`idlesson` AS `idlesson`,`lesson`.`nomlesson` AS `nomlesson`,`lesson`.`idcours` AS `idcours`,`lesson`.`id_user` AS `id_user`,`lesson`.`descriptionlesson` AS `descriptionlesson`,`lesson`.`created_at` AS `created_at`,`lesson`.`code` AS `code`,`cours`.`nomcours` AS `nomcours`,`cours`.`logo` AS `logo`,`cours`.`descriptioncours` AS `descriptioncours`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image`,`users`.`id` AS `id`,`users`.`email` AS `email`,`formations`.`nom` AS `nom`,`formations`.`idf` AS `idf` from (((`lesson` join `cours` on((`lesson`.`idcours` = `cours`.`idcours`))) join `users` on((`lesson`.`id_user` = `users`.`id`))) join `formations` on((`cours`.`idf` = `formations`.`idf`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_paiement`
--
DROP TABLE IF EXISTS `profile_paiement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_paiement`  AS  select `paiement`.`idp` AS `idp`,`paiement`.`idpersonne` AS `idpersonne`,`paiement`.`date_paie` AS `date_paie`,`paiement`.`montant` AS `montant`,`paiement`.`motif` AS `motif`,`paiement`.`token` AS `token`,`paiement`.`created_at` AS `created_at`,`paiement`.`codeFacture` AS `codeFacture`,`paiement`.`etat_paiement` AS `etat_paiement`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`telephone` AS `telephone`,`users`.`image` AS `image`,`users`.`id` AS `id` from (`paiement` join `users` on((`paiement`.`idpersonne` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_remise`
--
DROP TABLE IF EXISTS `profile_remise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_remise`  AS  select `remise`.`idremise` AS `idremise`,`remise`.`idtravail` AS `idtravail`,`remise`.`file` AS `file`,`remise`.`id_apprenant` AS `id_apprenant`,`remise`.`created_at` AS `created_at`,`travail`.`nomtravail` AS `nomtravail`,`travail`.`code` AS `code`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`telephone` AS `telephone`,`users`.`image` AS `image`,`users`.`sexe` AS `sexe`,`users`.`full_adresse` AS `full_adresse` from ((`remise` join `travail` on((`remise`.`idtravail` = `travail`.`idtravail`))) join `users` on((`remise`.`id_apprenant` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_travail`
--
DROP TABLE IF EXISTS `profile_travail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_travail`  AS  select `travail`.`idtravail` AS `idtravail`,`travail`.`nomtravail` AS `nomtravail`,`travail`.`descriptiontravail` AS `descriptiontravail`,`lesson`.`fichier` AS `fichier`,`lesson`.`idlesson` AS `idlesson`,`lesson`.`nomlesson` AS `nomlesson`,`lesson`.`idcours` AS `idcours`,`travail`.`id_user` AS `id_user`,`lesson`.`descriptionlesson` AS `descriptionlesson`,`travail`.`created_at` AS `created_at`,`travail`.`code` AS `code`,`cours`.`nomcours` AS `nomcours`,`cours`.`logo` AS `logo`,`cours`.`descriptioncours` AS `descriptioncours`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image`,`users`.`id` AS `id`,`users`.`email` AS `email`,`formations`.`nom` AS `nom`,`formations`.`idf` AS `idf`,`travail`.`jour_fin` AS `jour_fin`,`travail`.`heure_fin` AS `heure_fin` from ((((`travail` join `lesson` on((`travail`.`idlesson` = `lesson`.`idlesson`))) join `cours` on((`lesson`.`idcours` = `cours`.`idcours`))) join `users` on((`lesson`.`id_user` = `users`.`id`))) join `formations` on((`cours`.`idf` = `formations`.`idf`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_user`
--
DROP TABLE IF EXISTS `profile_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_user`  AS  select `users`.`id` AS `id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`image` AS `image`,`users`.`telephone` AS `telephone`,`users`.`full_adresse` AS `full_adresse`,`users`.`biographie` AS `biographie`,`users`.`date_nais` AS `date_nais`,`users`.`passwords` AS `passwords`,`users`.`idrole` AS `idrole`,`users`.`sexe` AS `sexe`,`users`.`facebook` AS `facebook`,`users`.`twitter` AS `twitter`,`users`.`linkedin` AS `linkedin`,`users`.`idposte` AS `idposte`,`role`.`nom` AS `nom`,`role`.`created_at` AS `debit_event` from (`users` join `role` on((`users`.`idrole` = `role`.`idrole`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idart`),
  ADD KEY `idcat` (`idcat`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`idcoach`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `idf` (`idf`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idart` (`idart`);

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`idconference`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idcours`),
  ADD KEY `idf` (`idf`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`idformat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `idf` (`idf`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`idf`);

--
-- Index pour la table `inscription_formations`
--
ALTER TABLE `inscription_formations`
  ADD PRIMARY KEY (`idinscription`),
  ADD KEY `idf` (`idf`);

--
-- Index pour la table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`idinvite`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `idconference` (`idconference`);

--
-- Index pour la table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`idlesson`),
  ADD KEY `idcours` (`idcours`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idpersonne` (`idpersonne`);

--
-- Index pour la table `recupere`
--
ALTER TABLE `recupere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `remise`
--
ALTER TABLE `remise`
  ADD PRIMARY KEY (`idremise`),
  ADD KEY `idtravail` (`idtravail`),
  ADD KEY `id_apprenant` (`id_apprenant`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`idinfo`);

--
-- Index pour la table `travail`
--
ALTER TABLE `travail`
  ADD PRIMARY KEY (`idtravail`),
  ADD KEY `idlesson` (`idlesson`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrole` (`idrole`);

--
-- Index pour la table `vues`
--
ALTER TABLE `vues`
  ADD PRIMARY KEY (`idv`),
  ADD KEY `idart` (`idart`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `coach`
--
ALTER TABLE `coach`
  MODIFY `idcoach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `conference`
--
ALTER TABLE `conference`
  MODIFY `idconference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `format`
--
ALTER TABLE `format`
  MODIFY `idformat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `inscription_formations`
--
ALTER TABLE `inscription_formations`
  MODIFY `idinscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `invite`
--
ALTER TABLE `invite`
  MODIFY `idinvite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `idlesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `recupere`
--
ALTER TABLE `recupere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `remise`
--
ALTER TABLE `remise`
  MODIFY `idremise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `idinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `travail`
--
ALTER TABLE `travail`
  MODIFY `idtravail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `vues`
--
ALTER TABLE `vues`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `category` (`idcat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coach_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `formations` (`idf`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idart`) REFERENCES `article` (`idart`) ON DELETE CASCADE;

--
-- Contraintes pour la table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `formations` (`idf`) ON DELETE CASCADE,
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `format`
--
ALTER TABLE `format`
  ADD CONSTRAINT `format_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `format_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `formations` (`idf`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscription_formations`
--
ALTER TABLE `inscription_formations`
  ADD CONSTRAINT `inscription_formations_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `formations` (`idf`) ON DELETE CASCADE;

--
-- Contraintes pour la table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invite_ibfk_2` FOREIGN KEY (`idconference`) REFERENCES `conference` (`idconference`) ON DELETE CASCADE;

--
-- Contraintes pour la table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`idcours`) REFERENCES `cours` (`idcours`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `online`
--
ALTER TABLE `online`
  ADD CONSTRAINT `online_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`idpersonne`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `remise`
--
ALTER TABLE `remise`
  ADD CONSTRAINT `remise_ibfk_1` FOREIGN KEY (`idtravail`) REFERENCES `travail` (`idtravail`) ON DELETE CASCADE,
  ADD CONSTRAINT `remise_ibfk_2` FOREIGN KEY (`id_apprenant`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `travail`
--
ALTER TABLE `travail`
  ADD CONSTRAINT `travail_ibfk_1` FOREIGN KEY (`idlesson`) REFERENCES `lesson` (`idlesson`) ON DELETE CASCADE,
  ADD CONSTRAINT `travail_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vues`
--
ALTER TABLE `vues`
  ADD CONSTRAINT `vues_ibfk_1` FOREIGN KEY (`idart`) REFERENCES `article` (`idart`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
