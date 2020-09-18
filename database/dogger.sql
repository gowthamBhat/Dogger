-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 08:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogger`
--

-- --------------------------------------------------------

--
-- Table structure for table `addpet`
--

CREATE TABLE `addpet` (
  `id` int(10) NOT NULL,
  `uname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `petname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `petage` int(10) NOT NULL,
  `breed` varchar(20) CHARACTER SET latin1 NOT NULL,
  `price` int(10) NOT NULL,
  `mobile` int(20) NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `img` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 NOT NULL,
  `stamp` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addpet`
--

INSERT INTO `addpet` (`id`, `uname`, `petname`, `petage`, `breed`, `price`, `mobile`, `address`, `img`, `type`, `stamp`) VALUES
(30, 'preeth', 'jully', 5, 'dabar', 1290, 897117257, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin code-577414', 'HB4AT3D3IMI6TMPTWIZ74WAR54.jpg', 'image/jpeg', '2020-09-17 09:39:49pm'),
(31, 'preeth', 'goerge', 5, 'jerman shepard', 543, 2147483647, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin code-577414', 'smartest-dog-breeds-1553287693.jpg', 'image/jpeg', '2020-09-17 09:40:22pm'),
(32, 'preeth', 'rani', 6, 'dashand', 544, 897117257, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin code-577414', 'tan-and-white-short-coat-dog-laying-down-in-a-brown-wooden-128817.jpg', 'image/jpeg', '2020-09-17 09:41:11pm'),
(33, 'preeth', 'scooby', 6, 'jerman shepard', 1000, 897117257, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin code-577414', 'short-coated-white-dog-on-green-field-247937.jpg', 'image/jpeg', '2020-09-17 09:41:45pm'),
(34, 'gowth', 'maddy', 7, 'vega', 5000, 2147483647, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin ', 'samoyed_puppy_dog_pictures.jpg', 'image/jpeg', '2020-09-18 04:34:53pm');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(10) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `petage` int(10) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `mobile` int(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `uname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) NOT NULL,
  `passcode` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `email`, `passcode`) VALUES
(1, 'gowth', 'gowthambhat793@gmail.com', 'gowth123'),
(2, 'preeth', 'preethambhat23@gmail.com', 'preeth123'),
(3, 'Gowtham', 'gowthambhat793@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addpet`
--
ALTER TABLE `addpet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addpet`
--
ALTER TABLE `addpet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
