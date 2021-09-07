-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 11:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'jeux_videos'),
(2, 'jeux_plateaux'),
(3, 'librairie'),
(4, 'films'),
(5, 'musique'),
(6, 'vetements');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `total` float NOT NULL,
  `id_stripe` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note_produit`
--

CREATE TABLE `note_produit` (
  `id_produit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `descrip` text NOT NULL,
  `prix_unitaire` float NOT NULL,
  `date_en_ligne` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `ref`, `nom_produit`, `descrip`, `prix_unitaire`, `date_en_ligne`) VALUES
(1, '125874', 'Split Peas - Green, Dry', 'viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis donec semper', 9.07, '2021-09-05 09:55:07'),
(2, '3164345', 'Vodka - Smirnoff', 'nisi eu orci mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a', 8.19, '2021-07-13 10:04:17'),
(3, '3464642', 'Bread - French Baquette', 'convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim', 8.68, '2021-09-03 09:55:17'),
(4, '6464911', 'Cookie Double Choco', 'ipsum aliquam non mauris morbi non lectus aliquam sit amet diam', 1.12, '2020-12-09 10:04:04'),
(5, '3464421', 'Pork - Belly Fresh', 'venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam', 6.17, '2020-11-11 10:03:52'),
(6, '9764311', 'Beans - Black Bean, Dry', 'ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu', 2.91, '2021-09-05 09:55:27'),
(7, '6491212', 'Food Colouring - Green', 'cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing', 7.15, '2021-02-16 10:03:42'),
(8, '9731412', 'Lettuce - Arugula', 'pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis', 5.99, '2021-06-08 10:03:31'),
(9, '9734522', 'Oil - Coconut', 'amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus', 2.89, '2021-07-04 10:03:20'),
(10, '7649455', 'Prunes - Pitted', 'mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis', 9.21, '2021-09-09 10:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `produit_categorie`
--

CREATE TABLE `produit_categorie` (
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit_categorie`
--

INSERT INTO `produit_categorie` (`id_produit`, `id_categorie`) VALUES
(1, 3),
(2, 6),
(3, 1),
(4, 3),
(5, 3),
(6, 4),
(7, 5),
(8, 6),
(9, 2),
(10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `genre` varchar(3) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `genre`, `date_naissance`, `email`, `mot_passe`, `adresse`, `cp`, `ville`, `tel`, `date_creation`) VALUES
(1, 'Godber', 'Winn', 'M', '2021-01-08', 'wgodber0@live.com', '95NZlvqWcXWY', '200 Bartillon Street', '15978', 'Nedryhayliv', '921 591 78', '2021-06-09 00:00:00'),
(2, 'Diss', 'Rogers', 'M', '2021-02-21', 'rdiss1@toplist.cz', 'jVUwzo', '57 Washington Alley', '74226', 'Aki', '121 803 96', '2020-10-28 00:00:00'),
(3, 'Gebhard', 'Pasquale', 'M', '2021-01-17', 'pgebhard2@psu.edu', 'Zr47nFu0f', '3518 Colorado Center', '35987', 'Gorē', '818 620 56', '2021-06-28 00:00:00'),
(4, 'Ivanyutin', 'Daveta', 'F', '2020-07-18', 'divanyutin3@examiner.com', 'xyRBXpRA', '47825 Spenser Center', '69223', 'Spassk-Dal’niy', '437 454 54', '2020-09-27 00:00:00'),
(5, 'Stroton', 'Christabel', 'F', '2020-07-17', 'cstroton4@booking.com', 'fY4LygzEVyUp', '0 Tennessee Junction', '02154', 'Gazli', '519 919 07', '2020-10-08 00:00:00'),
(6, 'Elwell', 'Althea', 'F', '2021-08-31', 'aelwell5@networkadvertising.org', 'KwFeBq2St', '0212 Texas Place', '36495', 'Kadengan', '814 403 48', '2020-10-26 00:00:00'),
(7, 'Sturt', 'Boony', 'M', '2021-03-23', 'bsturt6@blogtalkradio.com', 'nV2yV4uoFUI', '40160 Holmberg Alley', '26751', 'Shangxing', '934 931 80', '2020-11-11 00:00:00'),
(8, 'Worge', 'Olin', 'M', '2020-07-25', 'oworge7@indiatimes.com', 'zUpQv7Zm', '9 Erie Court', '37950', 'Jinshanpu', '789 174 98', '2021-06-29 00:00:00'),
(9, 'Ungerecht', 'Abbey', 'F', '2021-01-09', 'aungerecht8@cdc.gov', 'APck67P', '22 Daystar Crossing', '03467', 'Yanggu', '294 109 02', '2021-06-30 00:00:00'),
(10, 'Ruger', 'Jessee', 'M', '2021-08-11', 'jruger9@biblegateway.com', 'xzwsDuL', '1816 Northfield Center', '78135', 'Futian', '423 810 22', '2021-08-29 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_commande` (`id_commande`,`id_user`,`id_panier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_panier` (`id_panier`);

--
-- Indexes for table `note_produit`
--
ALTER TABLE `note_produit`
  ADD KEY `id_produit` (`id_produit`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_panier` (`id_panier`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `produit_categorie`
--
ALTER TABLE `produit_categorie`
  ADD KEY `id_produit` (`id_produit`,`id_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`);

--
-- Constraints for table `note_produit`
--
ALTER TABLE `note_produit`
  ADD CONSTRAINT `note_produit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `note_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Constraints for table `produit_categorie`
--
ALTER TABLE `produit_categorie`
  ADD CONSTRAINT `produit_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `produit_categorie_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
