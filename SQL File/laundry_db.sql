-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 02:00 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `laundry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5c428d8875d2948607f3e3fe134d71b4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `contactno`, `posting_date`) VALUES
(1, 'Gagandeep', 'Patbandha', 'gagandeep@gmail.com', 'Gagan@123', '7879088788', '2023-01-26 11:46:27'),
(2, 'Gagan', 'Deep', 'gagan223@gmail.com', 'Gagan@1234', '8989898989', '2023-01-31 01:24:04'),
(3, 'Rahul', 'Giri', 'rahul143@gmail.com', 'Rahul123', '7878787878', '2023-01-31 01:28:02'),
(4, 'Sukesh', 'Mohanta', 'sukesh12@gmail.com', 'Sukesh@123', '8976790000', '2023-01-31 01:34:43'),
(5, 'Anuj Kumar', 'jena', 'anuj@gmail.com', 'Anuj@1234', '9999888884', '2023-01-31 16:15:29');

--
-- --------------------------------------------------------
-- 

--
-- Table structure for table `laundry_request`
--

CREATE TABLE `laundry_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `total_dress` INT(11) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_request`
--

INSERT INTO `laundry_request` (`id`, `name`, `contactno`, `total_dress`, `service_type`, `total_price`, `address`, `posting_date`) VALUES (1, 'Gagandeep Patbandha', '7878787878', '2', 'Wash & Iron', '140','Patrapada', '2023-01-31 01:14:31'),
(2, 'Rahul', '4545454545', '4', 'Dry Wash', '240','bbsr', '2023-01-31 01:31:44');

--
-- ---------------------------------------------------------
--

-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;