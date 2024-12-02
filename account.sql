-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 11:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(50) NOT NULL,
  `username_account` varchar(40) DEFAULT NULL,
  `email_account` varchar(40) DEFAULT NULL,
  `password_account` varchar(200) DEFAULT NULL,
  `role_account` varchar(6) DEFAULT NULL,
  `image_account` varchar(50) DEFAULT NULL,
  `login_count_account` int(1) NOT NULL,
  `lock_account` int(1) NOT NULL,
  `ban_count` int(2) NOT NULL,
  `ban_account` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username_account`, `email_account`, `password_account`, `role_account`, `image_account`, `login_count_account`, `lock_account`, `ban_count`, `ban_account`) VALUES
(3, 'oPaNoO', 'pobsook999@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Sy9HRGtDUFVEMm96RUpsQQ$2eS8T17y/m8KXPvIxAsUW0y+KcrY4CyYvbDxW38Ge7U', 'Admin', '', 0, 0, 0, NULL),
(4, 'Pupech', 'pupech@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eHdEM0lrdndEVTVKZlh1Mw$Qip8zAlh0Cbbdj/8LFbyJe86UOhyCNzP0Rj1Ecav/Bs', 'Member', '', 1, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
