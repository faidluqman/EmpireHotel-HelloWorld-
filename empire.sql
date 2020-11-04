-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 08:02 AM
-- Server version: 5.7.10
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(3, 'HSBC');

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
(1, 'Junior.jpg'),
(2, 'Double.jpg'),
(3, 'Superior.jpg'),
(4, 'Luxury.jpg'),
(5, 'Super_Luxury.jpg'),
(6, 'Master.jpg'),
(7, '1.jpg'),
(8, '2.jpg'),
(9, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `check_in` varchar(15) NOT NULL,
  `check_out` varchar(15) NOT NULL,
  `total_room` varchar(5) NOT NULL,
  `room_type` varchar(5) NOT NULL,
  `total_payment` varchar(10) NOT NULL,
  `bank_type` varchar(40) NOT NULL,
  `refrence_no` varchar(30) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `reservation_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `name`, `email`, `tel`, `check_in`, `check_out`, `total_room`, `room_type`, `total_payment`, `bank_type`, `refrence_no`, `payment_status`, `reservation_status`) VALUES
(1, 'Kise Ryota', 'yellow@basketball.com', '01766166225', '2016-04-23', '2016-04-24', '2', '4', '600.00', ' 1', '12123321114', 'Complete', 'Reserve'),
(2, 'Aomine Daiki', 'Blue@basketball.com', '01111735356', '2016-04-21', '2016-04-22', '1', '1', '120.00', ' 2', '99920038648', 'Invalid', 'Pending'),
(3, 'Atsushi Murasakibara', 'purple@basketball.com', '01266483392', '2016-04-25', '2016-04-27', '1', '1', '240.00', ' 2', '77787588585', 'Checking', 'Pending'),
(4, 'Seijuro Akashi', 'red@basketball.com', '01273323321', '2016-04-20', '2016-04-24', '1', '4', '1200.00', ' 2', '33233213344', 'Complete', 'Reserve'),
(5, 'Shintaro Midorima', 'green@basketball.com', '01774568294', '2016-04-25', '2016-04-26', '1', '3', '250.00', ' 1', '99846335283', 'Complete', 'Reserve'),
(6, 'Tetsuya Kuroko', 'black@basketball.com', '01988788633', '2016-04-27', '2016-04-28', '1', '1', '120.00', ' 1', '97217371273', 'Complete', 'Reserve'),
(7, 'Kida Masaomi', 'bakyura@drrr.com', '01946554748', '2016-04-29', '2016-04-30', '1', '2', '200.00', ' 2', '98392878466', 'Invalid', 'Pending'),
(8, 'Orihara Izaya', 'kanra@drr.com', '01266483392', '2016-04-14', '2016-04-15', '2', '4', '600.00', ' 2', '48326482647', 'Invalid', 'Pending'),
(9, 'Sonohara Anri', 'mai@drrr.com', '01877364273', '2016-04-27', '2016-04-29', '1', '1', '240.00', ' 1', '07877779990', 'Complete', 'Reserve'),
(10, 'Mikado Ryugamine', 'taro_tanaka@drrr.com', '01965362442', '2016-04-21', '2016-04-22', '1', '2', '200.00', ' 3', '98793728739', 'Complete', 'Reserve'),
(11, 'Handa Sei', 'seishuu@bakaramon.org', '01977388210', '2016-04-29', '2016-04-30', '3', '2', '600.00', '3', '21722844489', 'Complete', 'Reserve'),
(12, 'Yatogami', 'yaboku@noragami.com', '0113323321', '2016-04-26', '2016-04-28', '2', '2', '800.00', ' 3', '11927227494', 'Complete', 'Reserve'),
(13, 'Saitama', 'one@punch.com', '01888733622', '2016-04-21', '2016-04-25', '1', '2', '800.00', ' 1', '98819111911', 'Invalid', 'Canceled'),
(14, 'Koyomi Araragi', 'kyuuketsuki@monogatari.com', '01888788665', '2016-04-27', '2016-04-30', '2', '1', '720.00', ' 3', '77826255242', 'Invalid', 'Pending'),
(15, 'Umetarou Nozaki', 'yumeno_sakiko@shoujou.com', '01999677622', '2016-04-14', '2016-04-15', '1', '4', '300.00', ' 3', '76543678923', 'Complete', 'Reserve'),
(16, 'Harry Style', 'harry@vevo.com', '01737729201', '2016-04-29', '2016-04-30', '2', '1', '240.00', ' 2', '52423434234', 'Complete', 'Reserve');

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
(1, 'Junior Suite', '120', '2 Single Bed(s)', 'Our Junior Suites offer breathtaking views of the beach and nature. We give you the feeling of away from the stressed city to relaxed beach sound. We also making sure you have the contact with your loved once by providing free wifi with the ultimate speed you need. Free breakfast for 2 guest from 8.00 am till 10.00 pm.Room service from 9.00 am till 9.00 p.m.Soundproof room and located on first floor.Extra charge on extra mattress. Free cancellation 1 week before. No refund.', '1'),
(2, 'Standard Room', '200', '1 Queen Bed(s)', 'Our Standard Rooms are the perfect combination of function and comfort. can fit more than 2 guest. Free breakfast for 4 guest from 8.00 am till 10.30 pm . Room service from 9.00 am till 10.00 p.m. Free spa treatment for 2 guest from 2.00 pm till 4.00 p.m. Soundproof room.Located on second floor.No refund for room cancellation.', '2'),
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
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
