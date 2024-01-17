-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 04:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(0, 'Avijit', '07c095a2817a8d939988f170b5817c054c4ddba7');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farmerlist`
--

CREATE TABLE `farmerlist` (
  `sln` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `govID` varchar(100) DEFAULT NULL,
  `accnum` varchar(100) DEFAULT NULL,
  `ifsc` varchar(100) DEFAULT NULL,
  `upiID` varchar(100) DEFAULT NULL,
  `verify` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmerlist`
--

INSERT INTO `farmerlist` (`sln`, `name`, `email`, `phone`, `dob`, `gender`, `image`, `password`, `address`, `description`, `country`, `city`, `region`, `zip`, `govID`, `accnum`, `ifsc`, `upiID`, `verify`) VALUES
(1, 'Avijit Ram', 'avijit123@gmail.com', '9123678556', '1981-06-16', 'male', 'download.jpeg', '07c095a2817a8d939988f170b5817c054c4ddba7', '16, Shivnagar road', 'Fgnfng', 'India', 'Howrah', 'West Bengal', '700156', 'Efwfe', '2236', 'EFEF', 'EWFWEF', '1'),
(2, 'Shivam Kumar', 'shivam@gmail.com', '22367307', '1989-06-15', 'male', 'download.jpeg', '297beb01dd21c5a2aad009da6abb91d4bc0fdc6d', '14, MAR(E-W), DH Block(Newtown), Action Area I, Newtown', 'Wegvsdv', 'America', 'Kolkata', 'West Bengal', '700156', 'Sdv', 'Sdvsdvsdv', 'DSV', 'DSV', '1'),
(3, 'Avijit Ram', 'shivani@gmail.com', '22367307', '2023-07-05', 'male', 'download.jpeg', '727d5a6d5bfd68ff4cfb34ab08a27a287af04c35', '14, MAR(E-W), DH Block(Newtown), Action Area I, Newtown', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'India', 'Kolkata', 'West Bengal', '700160', '2236', '2236', 'ABCD', '2234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `status`) VALUES
(2, 'gov@gmail.com', '-2', 'p'),
(4, 'gov@gmail.com', '-6', 'p'),
(5, 'gov@gmail.com', '-2-5', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `productdb`
--

CREATE TABLE `productdb` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `details` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdb`
--

INSERT INTO `productdb` (`id`, `name`, `price`, `image`, `details`) VALUES
(2, 'apple', 340, 'barley1.jpg', 'rrtg'),
(5, 'muttor', 34, 'apple1.jpg', 'rger'),
(6, 'chow', 80, 'codebitsdaily.jpeg', 'very pasty');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` longtext NOT NULL,
  `registerDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Fname`, `Lname`, `email`, `password`, `image`, `registerDate`) VALUES
(0, 'Avijit', 'Ram', 'avijit123@gmail.com', '$2y$10$qAXsNHvchH4l5JTmT/cZsu/lctMBoyCxT1HQB0mzQTU', './assets/profile/beard.png', '2023-06-29 03:53:58'),
(0, 'Avijit', 'Ram', 'avijitram2013@gmail.com', '$2y$10$vQSC1h7r46gQoF54ml7Di.MZ4a9fvT8cVg5.MwgRc2D', './assets/profile/beard.png', '2023-07-08 13:37:13'),
(0, 'Ambuj', 'Ram', 'gov@gmail.com', '07c095a2817a8d939988f170b5817c054c4ddba7', './assets/profile/beard.png', '2023-07-08 13:51:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmerlist`
--
ALTER TABLE `farmerlist`
  ADD PRIMARY KEY (`sln`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdb`
--
ALTER TABLE `productdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmerlist`
--
ALTER TABLE `farmerlist`
  MODIFY `sln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productdb`
--
ALTER TABLE `productdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
