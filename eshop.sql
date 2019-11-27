-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 26.Nov 2019, 17:44
-- Verzia serveru: 10.4.6-MariaDB
-- Verzia PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `eshop`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `address` text COLLATE utf8_slovak_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `privileges` varchar(200) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `admins`
--

INSERT INTO `admins` (`id`, `username`, `firstname`, `surname`, `email`, `address`, `pass`, `privileges`) VALUES
(1, 'admin', 'Branislav Hozza', 'Hozza', 'brankohozza@gmail.com', 'ZimnÃ© 536', 'Admin123**', 'abc123'),
(2, 'janko', 'Branislav Hozza', 'Hozza', 'janko@gmail.com', 'ZimnÃ© 536', 'Janko123**', '1,2,5,7');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `admin_tokens`
--

CREATE TABLE `admin_tokens` (
  `id` int(11) NOT NULL,
  `token` text COLLATE utf8_slovak_ci NOT NULL,
  `create_date` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  `expiration_date` date NOT NULL,
  `privileges` varchar(200) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `content` text COLLATE utf8_slovak_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `blog`
--


--
-- Štruktúra tabuľky pre tabuľku `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;



-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `description` text COLLATE utf8_slovak_ci NOT NULL,
  `price` float NOT NULL,
  `image` text COLLATE utf8_slovak_ci NOT NULL,
  `categories` text COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `categories`) VALUES
(1, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(2, 'Yeezy 100', 'Topangy', 250.5, 'img1.jpg', ''),
(3, 'Yeezy 250', 'Topangy', 110.5, 'img1.jpg', ''),
(4, 'Yeezy 350', 'Topangy', 230.5, 'img1.jpg', ''),
(5, 'Adidas 150', 'Topangy', 240.5, 'img1.jpg', ''),
(6, 'Adidas 250', 'Topangy', 250.5, 'img1.jpg', ''),
(7, 'Adidas 350', 'Topangy', 250.5, 'img1.jpg', ''),
(8, 'Adidas 450', 'Topangy', 250.5, 'img1.jpg', ''),
(9, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(10, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(11, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(12, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(13, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(14, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(15, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(16, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(17, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(18, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(19, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(20, 'Yeezy 150', 'Topangy', 250.5, 'img1.jpg', ''),
(21, 'Airforce One 250/4', 'New shoes by Adidas', 150.4, 'img2.jpg', 'Shoes,Adidas'),
(22, 'Puma Tiger 11', 'Puma old school', 98.5, 'img3.jpg', 'Puma,Shoes');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `address` text COLLATE utf8_slovak_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `admin_tokens`
--
ALTER TABLE `admin_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `admin_tokens`
--
ALTER TABLE `admin_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Udalosti
--
CREATE DEFINER=`root`@`localhost` EVENT `removeold_daily` ON SCHEDULE EVERY 24 HOUR STARTS '2019-11-20 19:25:44' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Remove old token' DO DELETE FROM admin_tokens WHERE expiration_date < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
