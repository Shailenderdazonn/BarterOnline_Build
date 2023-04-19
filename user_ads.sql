-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2023 at 11:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_ads`
--

DROP TABLE IF EXISTS `user_ads`;
CREATE TABLE IF NOT EXISTS `user_ads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(200) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_ads`
--

INSERT INTO `user_ads` (`id`, `title`, `category`, `location`, `price`, `description`, `file`, `userid`) VALUES
(6, 'IPhone 13 pro ', 'Mobile Phones', 'New Brunswick', '850', 'brand 7 month old iphone 13 pro', 'img/1681119834_phone4.jpg', 1),
(7, '2022 HD black bike ', 'Cars and Vehicles', 'Ontario', '9000', 'brand new custon 2022 hd modidifed black bike', 'img/1681120124_x_7_800x0.webp', 1),
(9, 'apple i watch 8 ', 'Electronics & Other', 'Manitoba', '499', 'few months old gsp iwatch 8 in mint condition.', 'img/1681212189_david-svihovec-HM-Y497t5CU-unsplash (1).jpg', 2),
(10, 'sony PS5 512GB', 'Electronics & Other', 'Yukon', '899', '2 week old PS5 with 512 gb ssd and unused remote controller ', 'img/1681212395_billy-freeman-DPOdCl4bGJU-unsplash.jpg', 1),
(229, 'Hp Laptop', 'Electronics & Other', 'British Colombia', '120', 'Few months used Hp laptop for sale.', 'img/1681798420_8tips.jpg', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_ads`
--
ALTER TABLE `user_ads`
  ADD CONSTRAINT `user_ads_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_detail` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
