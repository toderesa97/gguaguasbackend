-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 03:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gguaguas`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `userSalt` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `token`, `userSalt`) VALUES
('amisadai', '0f62a48135beb288bebeda656f54c1904afbd67abc590dbf53e64add526077e5', 'manager', '', '36tBPegFIZxJo5NCaX5pMj20oRfzRd'),
('juan', '8d19bce286481a20915ffa109f9e2dcde25c03663906c72a3635e9f61f8bd20a', 'manager', '', 'X23PYCeEub5Zhheb2paSDgCZeIqUt3'),
('orbedi', '5787d98d4648d1744a9475ee1cce94c8bba88c5b2f350e7d2ab11bd5d26be79d', 'manager', '', 'lMjKxSl3v4phioXi0RRPaRCxWMDMAe'),
('pepe', '520e137d758b64d06dd3964cd8cac63d9a7078a91e82c0ec1bd75973bb4b55cd', 'driver', '', 'B5SGY2oTXqecO6g5Xmv5EIGLGJ8GIn'),
('root', 'bb41a4511416bcca366e66c92a097b192946b66f2ab2f6d6447beba275215630', 'root', '', '9alop7gt4fv7fDR0K35F6hBIO0fDhg'),
('tomas', '151e36eab1a821da1923846dfea87f543084497747b99ddb944fd2b24e98814f', 'manager', '', 'AnmFl9v63TwdBVnar0txT3aPztiPlq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
