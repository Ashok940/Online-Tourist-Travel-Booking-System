-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 09:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelbookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `addlongdist`
--

CREATE TABLE `addlongdist` (
  `id` int(11) NOT NULL,
  `depart` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `Price` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `profiles` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addlongdist`
--

INSERT INTO `addlongdist` (`id`, `depart`, `destination`, `Price`, `description`, `profiles`) VALUES
(19, 'patna', 'chennai', '10000', 'Package Include ! Food, Accomedation', 'travel/chn.jpeg'),
(20, 'patna', 'mumbai', '10000', 'Package Include ! Food, Accomedation', 'travel/mumbai.jpeg'),
(21, 'patna', 'bengaluru', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/beng.jpeg'),
(22, 'patna', 'manali', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/man.jpeg'),
(23, 'patna', 'nagpur', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/nag.jpeg'),
(24, 'darbhanga', 'chennai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/chn.jpeg'),
(25, 'darbhanga', 'bengaluru', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/beng.jpeg'),
(26, 'darbhanga', 'mumbai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/mumbai.jpeg'),
(27, 'darbhanga', 'nagpur', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/nag.jpeg'),
(28, 'darbhanga', 'manali', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/man.jpeg'),
(29, 'nagpur', 'mumbai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/mumbai.jpeg'),
(30, 'nagpur', 'manali', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/man.jpeg'),
(31, 'nagpur', 'chennai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/chn.jpeg'),
(32, 'nagpur', 'bengaluru', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/beng.jpeg'),
(33, 'manali', 'mumbai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/mum.jpeg'),
(34, 'manali', 'chennai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/chn.jpeg'),
(35, 'mumbai', 'manali', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/man.jpeg'),
(36, 'mumbai', 'nagpur', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/nag.jpeg'),
(37, 'mumbai', 'chennai', '10000', 'Package Include ! Food, Accomedation,lunch', 'travel/chn.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `addtaxidata`
--

CREATE TABLE `addtaxidata` (
  `id` int(11) NOT NULL,
  `depart` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `profiles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addtaxidata`
--

INSERT INTO `addtaxidata` (`id`, `depart`, `destination`, `Price`, `description`, `profiles`) VALUES
(2, 'chennai', 'Aadiyogi', '4000', 'package include :  lunch, dinner, accomedation', 'taxi/adi.jpeg'),
(3, 'chennai', 'marina beach', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/mari.jpeg'),
(4, 'chennai', 'thousand hills', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/thous.jpeg'),
(5, 'bengaluru', 'nandi hills', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/nandi.jpg'),
(6, 'bengaluru', 'lalbagh', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/lal.jpeg'),
(7, 'bengaluru', 'cubbon park', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/cub.jpg'),
(8, 'manali', 'manali tour', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/manalit.jpeg'),
(9, 'manali', 'shimla manali', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/shimla t.jpeg'),
(10, 'manali', 'himachal tour', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/hima.jpeg'),
(11, 'mumbai', 'Alibag', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/ali.jpeg'),
(12, 'mumbai', 'zipline', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/zip.jpeg'),
(13, 'mumbai', 'night tour', '2000', 'package include :  lunch, dinner, accomedation', 'taxi/night.jpeg'),
(14, 'manali', 'Manali Volvo', '4000', 'Hotel, Lunch, Dinner', 'taxi/volvo man1.jpg'),
(15, 'manali', 'Shimla tours', '4000', 'Hotel, Lunch, Dinner', 'taxi/volvo man.jpg'),
(16, 'manali', 'Shimla Kullu', '4000', 'Hotel, Lunch, Dinner', 'taxi/volvo man2.jpg'),
(17, 'mumbai', 'Sidhivinayak Temple', '4000', 'Hotel, Lunch, Dinner', 'taxi/sidhivinayak.jpg'),
(18, 'mumbai', 'mahalakshmi Temple ', '4000', 'Hotel, Lunch, Dinner', 'taxi/mahalakshmi.jpg'),
(19, 'mumbai', 'Haji Ali dargah', '4000', 'Hotel, Lunch, Dinner', 'taxi/Haji.jpg'),
(20, 'chennai', 'vadapalani murugan temple', '4000', 'Hotel, Lunch, Dinner', 'taxi/vadapalani.jpg'),
(21, 'chennai', 'mahabalipuram', '4000', 'Hotel, Lunch, Dinner', 'taxi/mahabali.jpg'),
(22, 'chennai', 'private night walking', '4000', 'Hotel, Lunch, Dinner', 'taxi/private.jpg'),
(23, 'bengaluru', 'jayanagar', '4000', 'Hotel, Lunch, Dinner', 'taxi/jaya.jpeg'),
(24, 'bengaluru', ' Malleshwaram ', '4000', 'Hotel, Lunch, Dinner', 'taxi/males.jpg'),
(25, 'bengaluru', 'Bannerghatta National Park ', '4000', 'Hotel, Lunch, Dinner', 'taxi/tiger.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(90) DEFAULT NULL,
  `Mobile` varchar(14) NOT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `Mobile`, `password`) VALUES
(1, 'ashokkr9193@gmail.com', '9128720347', 'Ashok!@#123');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(13) DEFAULT NULL,
  `Query` varchar(255) NOT NULL,
  `Date` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `Name`, `Email`, `Mobile`, `Query`, `Date`) VALUES
(2, 'Ashok Kumar', 'ashokkr9193@gmail.com', '9128720347', 'nothing', '2024-03-08 01:38:10'),
(5, 'rajan kumar', 'rajan@gmail.com', '767676767', 'nothing', '2024-03-08 01:47:56'),
(6, 'raj', 'rajankr@gmail.com', '928720347', 'Something ', '2024-03-08 11:07:19'),
(7, 'Nitesh Kumar', 'nitesh@gmail.com', '878787887', 'I have a doubt regarding your bussiness.', '2024-03-08 12:34:40'),
(8, 'Ashok Kumar', 'niteshh@gmail.com', '9128720347', 'no', '2024-03-09 08:58:02'),
(9, 'Ashok Kumar', 'ashokkr9190@gmail.com', '1234', 'i have a doubt regarding that', '2024-03-18 09:06:36'),
(10, 'kalam', 'kalam@gmail.com', '1234567890', 'good morning, i have some issues regarding your booking System. may i want to know everything your give by provide system.', '2024-04-10 10:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `loginusertravels`
--

CREATE TABLE `loginusertravels` (
  `id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `depart` varchar(233) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cpassword` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Name`, `Email`, `Mobile`, `password`, `cpassword`, `date`) VALUES
(1, 'Ashok Kumar', 'ashokkr9193@gmail.com', '9128720347', '12345', '12345', '2024-04-03 23:32:28'),
(2, 'Dipendra Kumar', 'dipendra@gmail.com', '8207875392', '12345', '12345', '2024-04-03 23:33:35'),
(3, 'Kalam', 'kalam@gmail.com', '1234567', '123', '123', '2024-04-10 10:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `taxipay`
--

CREATE TABLE `taxipay` (
  `depart` varchar(90) DEFAULT NULL,
  `destination` varchar(90) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxipay`
--

INSERT INTO `taxipay` (`depart`, `destination`, `price`) VALUES
('mumbai', 'Alibag', 2200),
('mumbai', 'city tour', 3000),
('mumbai', 'night tour', 3500),
('mumbai', 'slum tour', 2000),
('mumbai', 'zipline', 2500),
('nagpur', 'dhamma chakra', 3200),
('nagpur', 'ambazari lake', 4200),
('nagpur', 'amba khori', 3000),
('nagpur', 'waki woods', 2200),
('nagpur', 'maharaj bagh temple', 2300),
('bengaluru', 'lalbagh', 4000),
('bengaluru', 'church street', 6000),
('bengaluru', 'cubbon park', 2000),
('bengaluru', 'iskcon temple', 3000),
('bengaluru', 'nandi hills', 5000),
('chennai', 'marina beach', 3000),
('chennai', 'elliot beach', 4000),
('chennai', 'Aadiyogi', 5000),
('chennai', 'thousand hills', 1000),
('chennai', 'mylapore', 2000),
('manali', 'himachal tour', 5000),
('manali', 'manali tour', 2000),
('manali', 'shimla kurfri', 3000),
('manali', 'dharmshala', 4000),
('manali', 'shimla manali', 6000),
('up', 'Aayodhya', 6000),
('up', 'vrindavan', 5000),
('up', 'Agra', 2000),
('up', 'mathura', 3000),
('up', 'varanasi', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `Depart` varchar(90) DEFAULT NULL,
  `Destination` varchar(90) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`Depart`, `Destination`, `price`) VALUES
('patna', 'mumbai', 15000),
('patna', 'chennai', 18000),
('patna', 'nagpur', 13000),
('patna', 'manali', 15000),
('patna', 'bengaluru', 21000),
('patna', 'up', 10000),
('chennai', 'mumbai', 10000),
('chennai', 'nagpur', 5000),
('chennai', 'manali', 20000),
('chennai', 'bengaluru', 3000),
('chennai', 'up', 12000),
('bengaluru', 'mumbai', 10000),
('bengaluru', 'nagpur', 5000),
('bengaluru', 'manali', 20000),
('bengaluru', 'chennai', 3000),
('bengaluru', 'up', 12000),
('mumbai', 'chennai', 10000),
('mumbai', 'nagpur', 5000),
('mumbai', 'manali', 20000),
('mumbai', 'bengaluru', 3000),
('mumbai', 'up', 12000),
('nagpur', 'mumbai', 10000),
('nagpur', 'chennai', 5000),
('nagpur', 'manali', 20000),
('nagpur', 'bengaluru', 3000),
('nagpur', 'up', 12000),
('manali', 'mumbai', 10000),
('manali', 'nagpur', 5000),
('manali', 'chennai', 20000),
('manali', 'bengaluru', 3000),
('manali', 'up', 12000),
('darbhanga', 'mumbai', 20000),
('darbhanga', 'nagpur', 15000),
('darbhanga', 'manali', 20000),
('darbhanga', 'bengaluru', 13000),
('darbhanga', 'up', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `userlong`
--

CREATE TABLE `userlong` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Mobile` varchar(12) DEFAULT NULL,
  `depart` varchar(220) DEFAULT NULL,
  `destination` varchar(220) DEFAULT NULL,
  `ToursPlace` varchar(220) DEFAULT NULL,
  `Duration` varchar(12) NOT NULL,
  `BookedDate` varchar(120) DEFAULT NULL,
  `curDate` varchar(220) DEFAULT current_timestamp(),
  `Mode` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlong`
--

INSERT INTO `userlong` (`id`, `Name`, `Mobile`, `depart`, `destination`, `ToursPlace`, `Duration`, `BookedDate`, `curDate`, `Mode`) VALUES
(3, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '3D-2N', '2024-04-25', '2024-04-03 23:39:14', 'Train'),
(4, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '4D-3N', '2024-04-30', '2024-04-04 00:30:34', 'flight'),
(5, 'Ashok Kumar', '9128720347', 'darbhanga', 'mumbai', 'city tour', '4D-3N', '2024-04-25', '2024-04-04 00:49:36', 'Train'),
(6, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'dharmshala', '4D-3N', '2024-04-25', '2024-04-04 09:57:07', 'flight'),
(7, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '3D-2N', '2024-04-24', '2024-04-04 11:02:34', 'Train'),
(8, 'Ashok Kumar', '9128720347', 'bengaluru', 'bengaluru', 'lalbagh', '2D-1N', '2024-04-30', '2024-04-04 12:21:24', 'Train'),
(9, 'Ashok Kumar', '9128720347', 'bengaluru', 'mumbai', 'Alibag', '5D-4N', '2024-04-06', '2024-04-04 12:42:16', 'Train'),
(10, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '2D-1N', '2024-04-18', '2024-04-04 14:40:24', 'Train'),
(11, 'Ashok Kumar', '9128720347', 'bengaluru', 'chennai', 'marina beach', '2D-1N', '2024-04-12', '2024-04-04 14:43:43', 'flight'),
(12, 'Ashok Kumar', '9128720347', 'bengaluru', 'mumbai', 'city tour', '3D-2N', '2024-04-25', '2024-04-04 16:01:41', 'flight'),
(13, 'Dipendra Kumar', '8207875392', 'bengaluru', 'bengaluru', 'lalbagh', '4D-3N', '2024-04-26', '2024-04-04 16:14:38', 'Train'),
(14, 'Ashok Kumar', '9128720347', 'darbhanga', 'mumbai', 'Alibag', '4D-3N', '2024-04-22', '2024-04-08 13:03:56', 'Train'),
(15, 'Ashok Kumar', '9128720347', 'chennai', 'bengaluru', 'lalbagh', '2D-1N', '2024-04-17', '2024-04-08 13:30:47', 'Train'),
(16, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'manali tour', '3D-2N', '2024-04-18', '2024-04-08 13:32:23', 'Train'),
(17, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '3D-2N', '2024-04-17', '2024-04-08 13:42:48', 'flight'),
(18, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '2D-1N', '2024-04-10', '2024-04-09 23:08:24', 'Train'),
(19, 'Ashok Kumar', '9128720347', 'chennai', 'manali', 'manali tour', '3D-2N', '2024-04-23', '2024-04-10 10:20:39', 'Train'),
(20, '', '', 'bengaluru', 'manali', 'himachal tour', '3D-2N', '2024-04-25', '2024-04-10 10:36:25', 'Train'),
(21, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '2D-1N', '2024-04-17', '2024-04-14 20:22:50', 'Train'),
(22, 'Ashok Kumar', '9128720347', 'bengaluru', 'manali', 'himachal tour', '3D-2N', '2024-04-22', '2024-04-17 12:52:23', 'Train');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addlongdist`
--
ALTER TABLE `addlongdist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addtaxidata`
--
ALTER TABLE `addtaxidata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD UNIQUE KEY `travelun` (`Depart`,`Destination`);

--
-- Indexes for table `userlong`
--
ALTER TABLE `userlong`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addlongdist`
--
ALTER TABLE `addlongdist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `addtaxidata`
--
ALTER TABLE `addtaxidata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlong`
--
ALTER TABLE `userlong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
