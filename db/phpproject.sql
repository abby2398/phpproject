-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 01:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `Name`, `Email`, `Message`, `created_at`) VALUES
(582, 'demo', 'demo@demo.com', 'demo', '2023-10-19 12:19:06'),
(714, 'dsacc', 'ram@gmail.com', 'afaffadwd', '2023-11-03 06:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblstd`
--

CREATE TABLE `tblstd` (
  `Student_id` int(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `Class` varchar(1) NOT NULL,
  `Age` int(2) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ProfileImage` varchar(255) DEFAULT 'images/default.jpg',
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstd`
--

INSERT INTO `tblstd` (`Student_id`, `username`, `Class`, `Age`, `Password`, `ProfileImage`, `session_id`) VALUES
(1, 'admin', 'B', 25, 'admin123', 'images/uploads/654373ba9d9bd_360_F_475009987_zwsk4c77x3cTpcI3W1C1LU4pOSyPKaqi.jpg', 'g1c1de44p4o9rcs61c2bjqrpnq');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_images`
--

CREATE TABLE `uploaded_images` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_images`
--

INSERT INTO `uploaded_images` (`image_id`, `image_path`) VALUES
(3, 'images/uploads/650e7f08dc80a_download.jpg'),
(4, 'images/uploads/650e7f0f6bc08_download (1).jpg'),
(5, 'images/uploads/650e7f1bcf5ad_download (2).jpg'),
(6, 'images/uploads/650e7f204b3cb_download (3).jpg'),
(7, 'images/uploads/650e7f3f6bdd5_download (4).jpg'),
(8, 'images/uploads/650e7f4419558_download (5).jpg'),
(9, 'images/uploads/650e7f47ae84f_download (6).jpg'),
(26, 'images/uploads/65437ff603ce6_matt_balck_lamborghini-1920x1080.jpg'),
(27, 'images/uploads/65438e8da3e8b_new xs.svg'),
(28, 'images/uploads/65705688316b5_IMG_4244.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstd`
--
ALTER TABLE `tblstd`
  ADD PRIMARY KEY (`Student_id`);

--
-- Indexes for table `uploaded_images`
--
ALTER TABLE `uploaded_images`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- AUTO_INCREMENT for table `tblstd`
--
ALTER TABLE `tblstd`
  MODIFY `Student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uploaded_images`
--
ALTER TABLE `uploaded_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
