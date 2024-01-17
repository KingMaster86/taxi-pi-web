-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2024 at 10:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_city_taxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_driver`
--

CREATE TABLE `table_driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_email` varchar(50) NOT NULL,
  `driver_phone_no` int(11) NOT NULL,
  `driver_id_card_no` varchar(20) NOT NULL,
  `driver_username` varchar(50) NOT NULL,
  `driver_password` varchar(255) NOT NULL,
  `availability_status` varchar(50) NOT NULL,
  `location_latitude` varchar(20) NOT NULL,
  `location_longitude` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `driver_address_line` int(50) NOT NULL,
  `driver_city` int(20) NOT NULL,
  `driver_country` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_passenger`
--

CREATE TABLE `table_passenger` (
  `id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passenger_email` varchar(100) NOT NULL,
  `passenger_phone_no` int(11) NOT NULL,
  `passenger_username` varchar(50) NOT NULL,
  `passenger_password` varchar(255) NOT NULL,
  `passenger_id_card_number` varchar(100) NOT NULL,
  `passenger_address_line` varchar(100) NOT NULL,
  `passenger_city` varchar(100) NOT NULL,
  `passenger_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_passenger`
--

INSERT INTO `table_passenger` (`id`, `passenger_name`, `passenger_email`, `passenger_phone_no`, `passenger_username`, `passenger_password`, `passenger_id_card_number`, `passenger_address_line`, `passenger_city`, `passenger_country`) VALUES
(1, 'abdulla', 'mushkirmohamed9699@gmail.com', 777195282, 'qasux', '$2y$10$2ePD5e0MwTdKgH1Ghp/v7OZCk8GfUg0x0uShlLTpp/ic7tV12wNKm', '741852963258', '65 North Clarendon Avenue', 'Nintavur', 'Sri Lanka'),
(2, 'Gayathri Mariyaan', 'mushkirmohamed9699@gmail.com', 777412589, 'pohur', '$2y$10$8qKxPw/Xc47HgvKX3JClqe0wDeWBkNUN.6UylaJJ996oWAseueHNS', '123456789112', '740 New Boulevard', 'Jeba Gangathar', 'Kishor Devi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_driver`
--
ALTER TABLE `table_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `table_passenger`
--
ALTER TABLE `table_passenger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_driver`
--
ALTER TABLE `table_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_passenger`
--
ALTER TABLE `table_passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
