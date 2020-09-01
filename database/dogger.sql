-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 03:51 PM
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
(21, 'gowth', 'jonny', 7, 'husky', 1000, 2147483647, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin code-577414', 'siberian-husky-woods-shutterstock_558432511.jpg', 'image/jpeg', '2020-07-21 11:01:13am');

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

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`id`, `uname`, `petname`, `petage`, `breed`, `price`, `mobile`, `address`, `img`) VALUES
(1, 'gowth', 'nana', 1, 'gaga', 5432, 897117254, '#100,Halasinahalli, Guddekoppa(P), Thirthahalli(T), Shimoga(D) Pin code-577414', 'samoyed_puppy_dog_pictures.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `uname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `passcode` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `passcode`) VALUES
(1, 'gowth', 'gowth123'),
(2, 'preeth', 'preeth123');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
