-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 08:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_position` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_position`) VALUES
(1, 'admin', 'admin123', 'Front Desk');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(1, 'Maybank'),
(2, 'CIMB'),
(3, 'HSBC'),
(4, 'Bank Islam'),
(6, 'AmBank');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `username`, `password`, `name`, `email`, `tel`) VALUES
(1, 'syifa', '123', 'Syifa', 'Syifa@gmail.com', '01111011070'),
(5, 'thatsyifa', '123', 'that', 'syiifahusna@gmail.com', '01111011049');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `picture`) VALUES
(11, '2019_07_14_the-moons-bright-out-tonight-13188462.png'),
(3, 'Superior.jpg'),
(4, 'Luxury.jpg'),
(5, 'Super_Luxury.jpg'),
(6, 'Master.jpg'),
(7, '1.jpg'),
(9, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `cust_id` varchar(10) NOT NULL,
  `check_in` varchar(15) NOT NULL,
  `check_out` varchar(15) NOT NULL,
  `total_room` varchar(5) NOT NULL,
  `room_type` varchar(5) NOT NULL,
  `total_payment` varchar(10) NOT NULL,
  `bank_type` varchar(40) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `reservation_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `cust_id`, `check_in`, `check_out`, `total_room`, `room_type`, `total_payment`, `bank_type`, `payment_status`, `reservation_status`) VALUES
(84, 'thatsyifa', '2020-08-04', '2020-08-05', '1', '1', '120.00', '3', 'Complete', 'Canceled'),
(88, 'thatsyifa', '2020-09-04', '2020-09-05', '3', '1', '360.00', '1', 'Complete', 'Confirm'),
(90, 'syifa', '2020-08-05', '2020-08-07', '2', '3', '1200.00', '2', 'Complete', 'Canceled'),
(86, 'thatsyifa', '2020-08-06', '2020-08-07', '1', '1', '120.00', '3', 'Complete', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rooms_id` int(11) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_price` varchar(10) NOT NULL,
  `room_des` varchar(50) NOT NULL,
  `room_info` varchar(9999) NOT NULL,
  `room_pic` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rooms_id`, `room_type`, `room_price`, `room_des`, `room_info`, `room_pic`) VALUES
(2, 'Standard Room', '200', '1 Queen Bed(s)', 'Our Standard Rooms are the perfect combination of function and comfort. can fit more than 2 guest. Free breakfast for 4 guest from 8.00 am till 10.30 pm . Room service from 9.00 am till 10.00 p.m. Free spa treatment for 2 guest from 2.00 pm till 4.00 p.m. Soundproof room.Located on second floor.No refund for room cancellation.', '6'),
(3, 'Superior Room', '300', '1 King Bed(s)', 'Our Superior Room are comfortable roomy and elegant.Can fit more than 4 guests. Free breakfast for 4 people in VIP menu free 2 breakfast for regular menu. Room service until midnight. Free spa treatment, gym entrance and indoor pool.Located on the third floor and has the view of the sea. No refund for room cancellation.', '3'),
(4, 'Luxury Suite', '400', '2 Queen Bed(s)', 'Luxury Room that is designed  for people who wants to feel like their home.Room service for 24 hour.Free VIP menu breakfast. Free \r\nentry for gym, indoor pool and spa treatment. Located on the top floor and soundproof room.No refund for room cancellation.', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rooms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
