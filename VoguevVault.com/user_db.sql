-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 02:43 PM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'kaustubh', '$2y$10$27Ij.EfqgEyXPuIUeElOEOZYz9PbYrb5I7xT727Am3x'),
(3, 'dyutipagalhai', '$2y$10$ZCG6dqbkP9/Kpcc37KoqE.US4Uswjurpo.AIrYfwOcU'),
(4, 'karanb02', '$2y$10$b2iev93V/TNPGTNfyy9oNOfhpdD44i0WHH1ezcxefRH'),
(5, 'karan', '$2y$10$LvS6vGWAWa1TL3hyKUJyf.BdjubjWrJ8SeLt3iFEWts'),
(6, 'karan', '$2y$10$MxoQH2KeBeYZhHa4sEu59uQunP99G8T.muTGp9X5Lp4'),
(7, 'karan', '$2y$10$y6kU7.x.zWKWVn9XzFK2EubYapoJB/bmH4cXGx9V0vt'),
(8, 'karanb', '$2y$10$74JPr8AoRXmO8.Y.qwbQH.kAej79pMb7eAPY6Er5tfr'),
(9, 'karan12', '$2y$10$BrpAmk8lOwTTf8M.No2bR.2U3SXOgdl5b18Wbd1UdYVuPTTDpB3Om'),
(10, 'karan', '$2y$10$p0o9ZBcoB1lX0tM5IsOXqe9zlfbs5chfxFNS3R2ALn64CbmKPeSkG'),
(11, 'karan123', '$2y$10$.X0wWEw8HnpeAcu4Hf878.yFvJvAw1rKA.TLSkBJQDbRDwrQpVPCu'),
(12, 'karanbanerjee', '$2y$10$z.XeQtgAJ71Mm3aHb5TeRuXSFTbSuNXr5hc6.8TTWzQ4Tt7hhc.ne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
