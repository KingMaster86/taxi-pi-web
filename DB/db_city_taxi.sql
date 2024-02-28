-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2024 at 09:25 PM
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
-- Table structure for table `table_admin_panel`
--

CREATE TABLE `table_admin_panel` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_admin_panel`
--

INSERT INTO `table_admin_panel` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `table_driver`
--

CREATE TABLE `table_driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_email` varchar(50) NOT NULL,
  `driver_phone_no` varchar(12) NOT NULL,
  `driver_id_card_no` varchar(20) NOT NULL,
  `driver_username` varchar(50) NOT NULL,
  `driver_password` varchar(255) NOT NULL,
  `taxi_number` varchar(20) NOT NULL,
  `availability_status` varchar(50) NOT NULL,
  `location_latitude` varchar(20) NOT NULL,
  `location_longitude` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `driver_address_line` varchar(50) NOT NULL,
  `driver_city` varchar(20) NOT NULL,
  `driver_country` varchar(20) NOT NULL,
  `driver_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_driver`
--

INSERT INTO `table_driver` (`driver_id`, `driver_name`, `driver_email`, `driver_phone_no`, `driver_id_card_no`, `driver_username`, `driver_password`, `taxi_number`, `availability_status`, `location_latitude`, `location_longitude`, `start_time`, `end_time`, `driver_address_line`, `driver_city`, `driver_country`, `driver_image`) VALUES
(2, 'Kishor Mariyaan', 'dagymo@example.com', '+94777195282', '938271458712', 'kishore_M', '$2y$10$lk4s0e4AHebA7CpY6/gWTOaqbLACWjgyb/2KtSap5Lmln/Gjw7DJe', 'EP CAD - 1023', 'busy', '7.2924', '80.6382', '06:49:00', '16:15:00', '93 White Hague Freeway', 'nintavur', 'Sri Lanka', 'IMG_9732.JPG'),
(5, 'Sudharshan Raj', 'kycyryraho@example.com', '759878549', '214365870912', 's_raj', '$2y$10$7kTNYktSIIcbDIdHxY7Nz.PZzrjExYEGBJyDdpe/wLcmNCW90.Le6', 'EP QA 5432', 'busy', '7.2924', '80.6382', '04:21:00', '15:21:00', '77 East Oak Avenue', 'Matale', 'Sri Lanka', '406880331_369106048863056_7316214919984039805_n.jpg'),
(6, 'Fayis', 'fayis@gmail.com', '+94751800075', '235789524123', 'fayis@96', '$2y$10$9vwjRPQGtBKXCI9rXiHtJenlzRVnrOLNkQZ5yaQZ4ov/.uRrTVp/S', 'EP CBL - 9226', 'available', '6.93267', '79.8438', '11:35:00', '20:02:00', 'No. 246/A, Meera Nagar Road', 'Nintavur', 'Sri Lanka', 'IMG_0160.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `table_driver_feedback`
--

CREATE TABLE `table_driver_feedback` (
  `id` int(11) NOT NULL,
  `short_subject` varchar(50) NOT NULL,
  `content_body` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_driver_feedback`
--

INSERT INTO `table_driver_feedback` (`id`, `short_subject`, `content_body`, `rating`, `date`, `time`, `reservation_id`) VALUES
(1, 'nice', '$passedReservationId$passedReservationId$passedReservationId$passedReservationId$passedReservationId$passedReservationId$passedReservationId', 2, '2024-02-15', '14:16:41', 1),
(2, 'Better Service', 'Continue your work with this driver. He is genuine and time punctuality....', 4.8, '2024-02-25', '02:52:32', 2),
(3, 'Nice', 'Super service, keep up the good work.', 4.5, '2024-02-25', '02:56:30', 12),
(4, 'Excepturi incidunt ', 'Consequatur VoluptaConsequatur Volupta', 4.5, '2024-02-25', '02:57:27', 13),
(5, 'Nice', '&driver_id={$passedReservationId}&driver_id={$passedReservationId}&driver_id={$passedReservationId}', 4.2, '2024-02-25', '03:06:01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `table_operator`
--

CREATE TABLE `table_operator` (
  `operator_id` int(11) NOT NULL,
  `operator_name` varchar(50) NOT NULL,
  `operator_password` varchar(10) NOT NULL,
  `operator_contact_no` varchar(13) NOT NULL,
  `operator_id_card` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_operator`
--

INSERT INTO `table_operator` (`operator_id`, `operator_name`, `operator_password`, `operator_contact_no`, `operator_id_card`) VALUES
(1, 'operator', 'password', '0777195282', '199631404505');

-- --------------------------------------------------------

--
-- Table structure for table `table_passenger`
--

CREATE TABLE `table_passenger` (
  `id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passenger_email` varchar(100) NOT NULL,
  `passenger_phone_no` varchar(12) NOT NULL,
  `passenger_username` varchar(50) NOT NULL,
  `passenger_password` varchar(255) NOT NULL,
  `passenger_id_card_number` varchar(100) NOT NULL,
  `passenger_address_line` varchar(100) NOT NULL,
  `passenger_city` varchar(100) NOT NULL,
  `passenger_country` varchar(100) NOT NULL,
  `passenger_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_passenger`
--

INSERT INTO `table_passenger` (`id`, `passenger_name`, `passenger_email`, `passenger_phone_no`, `passenger_username`, `passenger_password`, `passenger_id_card_number`, `passenger_address_line`, `passenger_city`, `passenger_country`, `passenger_image`) VALUES
(9, 'Mushkir', 'mushkir59@yahoo.com', '+94751800075', 'mushki', '$2y$10$nZeJfC9z8MtI81V3kEEkl.Z1oIKqnfz5IgbDEth3g2PLdWMIsymxO', '123456789101', 'No. 246/A, Meera Nagar Road', 'Nintavur', 'Sri Lanka', 'IMG_0160.JPG'),
(11, 'Sharfee', 'sharfeesiyas99@gmail.com', '112233669', 'SiyasSh', '$2y$10$VbXklsTuJA/3JFNPPbW.tu7k/Sng5n5YAtwugVbCpDAk5gWjYxCvS', '123456789112', 'No. 246/A, Meera Nagar Road', 'Kalmunai', 'Sri Lanka', '406880331_369106048863056_7316214919984039805_n.jpg'),
(12, 'moahemd', 'mushkirmohamed9699@gmail.com', '119632587', 'mohamed', '$2y$10$mQVwaX1S7nADd1mFalBJJ.m87bag7F.Um7MBtyyeUL2kFFobWiy8.', '111111111111', 'No. 81 White Clarendon Lane', 'Kalmunai', 'Sri Lanka', 'maxresdefault.jpg'),
(13, 'Ebey', 'ebey1921@gmail.com', '+94754582999', 'ebey_y', '$2y$10$VZm8.tErcth9o9eTGboClukQExPB8jTqoCGN9HrRUdNlVh/tjX.ga', '224588779632', 'No. 246/A, Meera Nagar Road', 'Nintavur', 'Sri Lanka', 'emc-placeholder.png'),
(14, 'Ebey Justin', 'mushkirmohamed@gmail.com', '94728072679', 'ebey_just', '$2y$10$/jrj1KmyrX5wZA24oB5DluXIvnywaJUUJJePmtN3T7Unzo3clgkyi', '111111111111', 'No. No. 246/A, Meera Nagar Road', 'Batticaloa', 'Sri Lanka', 'IMG_0160.JPG'),
(15, 'Mohamed Mushkir', 'mushkirmohamed@gmail.com', '94777195282', 'mushki', '$2y$10$yufDyegMKMZFMRwJolDk.uhHybpyolH6jq1f1zIB/YJdrohwrgjXu', '199631401505', 'No. 246/A, Meera Nagar Road', 'Nintavur', 'Sri Lanka', 'emc-placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_passenger_feedback`
--

CREATE TABLE `table_passenger_feedback` (
  `id` int(11) NOT NULL,
  `short_subject` varchar(50) NOT NULL,
  `content_body` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_passenger_feedback`
--

INSERT INTO `table_passenger_feedback` (`id`, `short_subject`, `content_body`, `rating`, `date`, `time`, `reservation_id`) VALUES
(1, 'nice', '../passenger-homepage.php?history../passenger-homepage.php?history../passenger-homepage.php?history../passenger-homepage.php?history', 2.5, '0000-00-00', '00:00:00', 4),
(2, 'nice', 'Aliquam et fugiat sAliquam et fugiat sAliquam et fugiat sAliquam et fugiat sAliquam et fugiat sAliquam et fugiat s', 2.3, '0000-00-00', '00:00:00', 5),
(3, 'nice', 'Nintavur Branch No. 246/A, Meera Nagar Road, Nintavur - 11 Nintavur Branch No. 246/A, Meera Nagar Road, Nintavur - 11 Nintavur Branch No. 246/A, Meera Nagar Road, Nintavur - 11 ', 4.2, '2024-02-15', '10:36:19', 6),
(4, 'nice', '4242424242424242 4242424242424242 4242424242424242 4242424242424242 4242424242424242 ', 2, '2024-02-17', '12:17:15', 17);

-- --------------------------------------------------------

--
-- Table structure for table `table_payment`
--

CREATE TABLE `table_payment` (
  `payment_id` int(11) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `time` datetime NOT NULL,
  `distance` float NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_payment`
--

INSERT INTO `table_payment` (`payment_id`, `date_and_time`, `time`, `distance`, `amount`, `status`, `reservation_id`) VALUES
(1, '2024-02-15 00:00:00', '2024-02-15 00:47:41', 217.213, 21721.3, 'paid', 1),
(2, '2024-02-15 00:00:00', '2024-02-15 01:24:57', 196.732, 19673.2, 'paid', 2),
(3, '2024-02-15 00:00:00', '2024-02-15 01:28:03', 22.89, 2289, 'paid', 3),
(4, '2024-02-15 00:00:00', '2024-02-15 01:36:38', 196.732, 19673.2, 'paid', 4),
(5, '2024-02-15 00:00:00', '2024-02-15 02:07:36', 11.535, 1153.5, 'paid', 5),
(6, '2024-02-15 00:00:00', '2024-02-15 10:34:09', 217.213, 21721.3, 'paid', 6),
(7, '2024-02-15 00:00:00', '2024-02-15 10:35:48', 217.213, 21721.3, 'paid', 6),
(8, '2024-02-16 00:00:00', '2024-02-16 20:53:45', 11.535, 1153.5, 'paid', 7),
(9, '2024-02-16 00:00:00', '2024-02-16 22:10:27', 362.19, 36219, 'paid', 12),
(10, '2024-02-16 00:00:00', '2024-02-16 22:13:12', 362.19, 36219, 'paid', 12),
(11, '2024-02-16 00:00:00', '2024-02-16 22:14:20', 362.19, 36219, 'paid', 12),
(12, '2024-02-16 00:00:00', '2024-02-16 22:15:24', 362.19, 36219, 'paid', 12),
(13, '2024-02-16 00:00:00', '2024-02-16 22:16:06', 362.19, 36219, 'paid', 12),
(14, '2024-02-16 00:00:00', '2024-02-16 22:19:51', 362.19, 36219, 'paid', 12),
(15, '2024-02-16 00:00:00', '2024-02-16 22:21:01', 362.19, 36219, 'paid', 12),
(16, '2024-02-16 00:00:00', '2024-02-16 22:28:04', 362.19, 36219, 'paid', 12),
(17, '2024-02-16 00:00:00', '2024-02-16 22:40:56', 215.46, 21546, 'paid', 13),
(18, '2024-02-17 00:00:00', '2024-02-17 12:13:03', 435.552, 43555.2, 'paid', 17),
(19, '2024-02-25 00:00:00', '2024-02-25 03:20:52', 22.89, 2289, 'paid', 19),
(20, '2024-02-25 00:00:00', '2024-02-25 11:26:24', 51.459, 5145.9, 'paid', 21);

-- --------------------------------------------------------

--
-- Table structure for table `table_reservation`
--

CREATE TABLE `table_reservation` (
  `reservation_id` int(11) NOT NULL,
  `passenger_name` varchar(50) NOT NULL,
  `passenger_contact_no` varchar(13) NOT NULL,
  `pickup_location` varchar(30) NOT NULL,
  `pickup_location_latitude_value` varchar(20) NOT NULL,
  `pickup_location_longitude_value` varchar(20) NOT NULL,
  `drop_location` varchar(30) NOT NULL,
  `drop_location_latitude_value` varchar(20) NOT NULL,
  `drop_location_longitude_value` varchar(20) NOT NULL,
  `reservation_status` varchar(15) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `ride_start_time` varchar(255) NOT NULL,
  `operator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_reservation`
--

INSERT INTO `table_reservation` (`reservation_id`, `passenger_name`, `passenger_contact_no`, `pickup_location`, `pickup_location_latitude_value`, `pickup_location_longitude_value`, `drop_location`, `drop_location_latitude_value`, `drop_location_longitude_value`, `reservation_status`, `driver_id`, `passenger_id`, `ride_start_time`, `operator_id`) VALUES
(1, 'none', 'none', 'Kandy', '7.2905715', '80.6337262', 'akkaraipatu', '7.2193917', '81.8497567', 'completed', 1, 9, '2024-02-15 - 12:47:32am', 0),
(2, 'none', 'none', 'Kalmunai', '7.4143831', '81.8306334', 'kandy', '7.2905715', '80.6337262', 'completed', 6, 9, '2024-02-15 - 01:24:53am', 0),
(3, 'none', 'none', 'Kalmunai', '7.4143831', '81.8306334', 'akkaraipatu', '7.2193917', '81.8497567', 'completed', 3, 9, '2024-02-15 - 01:27:58am', 0),
(4, 'none', 'none', 'Kalmunai', '7.4143831', '81.8306334', 'kandy', '7.2905715', '80.6337262', 'completed', 1, 9, '2024-02-15 - 01:36:27am', 0),
(5, 'none', 'none', 'Kalmunai', '7.4143831', '81.8306334', 'Nintavur', '7.3314137', '81.8333656', 'completed', 1, 9, '2024-02-15 - 02:07:31am', 0),
(6, 'none', 'none', 'Kandy', '7.2905715', '80.6337262', 'akkaraipatu', '7.2193917', '81.8497567', 'completed', 1, 9, '2024-02-15 - 10:34:03am', 0),
(7, 'Mushkir', '+94777195282', 'Kalmunai', '7.4143831', '81.8306334', 'Nintavur', '7.3314137', '81.8333656', 'completed', 1, 9, '2024-02-16 - 08:34:50pm', 0),
(12, 'Mushkir', '+94751800075', 'Kalmunai', '7.4143831', '81.8306334', 'Colombo', '6.9270786', '79.861243', 'completed', 6, 9, '2024-02-16 - 10:10:19pm', 0),
(13, 'Mushkir', '+94751800075', 'Kandy', '7.2905715', '80.6337262', 'Nintavur', '7.3314137', '81.8333656', 'completed', 6, 9, '2024-02-16 - 10:40:44pm', 0),
(17, 'Ebey', '+94754582999', 'Kalmunai', '7.4143831', '81.8306334', 'Colombo', '6.9270786', '79.861243', 'completed', 6, 13, '2024-02-17 - 12:11:49pm', 0),
(19, 'Mushkir', '+94751800075', 'Kalmunai', '7.4143831', '81.8306334', 'akkaraipatu', '7.2193917', '81.8497567', 'completed', 6, 9, '2024-02-25 - 03:20:45am', 0),
(20, 'Muthu Kumari', '7418529632587', 'Kalmunai', '7.4143831', '81.8306334', 'Colombo', '6.9270786', '6.9270786', 'on process', 3, 0, '1974-11-05T02:19', 1),
(21, 'moahemd', '119632587', 'Batticaloa', '7.7249146', '81.6966911', 'Nintavur', '7.3314137', '81.8333656', 'completed', 6, 12, '2024-02-25 - 11:24:47am', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin_panel`
--
ALTER TABLE `table_admin_panel`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_driver`
--
ALTER TABLE `table_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `table_driver_feedback`
--
ALTER TABLE `table_driver_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_operator`
--
ALTER TABLE `table_operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `table_passenger`
--
ALTER TABLE `table_passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_passenger_feedback`
--
ALTER TABLE `table_passenger_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_payment`
--
ALTER TABLE `table_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `table_reservation`
--
ALTER TABLE `table_reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin_panel`
--
ALTER TABLE `table_admin_panel`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_driver`
--
ALTER TABLE `table_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_driver_feedback`
--
ALTER TABLE `table_driver_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_operator`
--
ALTER TABLE `table_operator`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_passenger`
--
ALTER TABLE `table_passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_passenger_feedback`
--
ALTER TABLE `table_passenger_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_payment`
--
ALTER TABLE `table_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_reservation`
--
ALTER TABLE `table_reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
