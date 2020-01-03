-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 01:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monthly_expense_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `exp_mng_expense`
--

CREATE TABLE `exp_mng_expense` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_mng_expense`
--

INSERT INTO `exp_mng_expense` (`id`, `user_id`, `expense_date`, `amount`, `purpose`) VALUES
(2, 1, '2019-11-10', 3000, 'Electricity Bill'),
(3, 1, '2019-11-16', 13000, 'Mutual Funds'),
(4, 1, '2019-12-18', 1500, 'mutual funds'),
(5, 1, '2019-12-26', 5000, 'Electricity bill'),
(6, 1, '2020-01-06', 5000, 'Electricity Bill'),
(7, 1, '2020-01-11', 10000, 'Shopping'),
(8, 1, '2020-01-15', 3000, 'Grocery'),
(14, 1, '2020-01-17', 500, 'mobile recharge');

-- --------------------------------------------------------

--
-- Table structure for table `exp_mng_income`
--

CREATE TABLE `exp_mng_income` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `source` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_mng_income`
--

INSERT INTO `exp_mng_income` (`id`, `user_id`, `income_date`, `amount`, `source`) VALUES
(5, 1, '2019-11-09', 20000, 'Received Monthly Salary'),
(6, 1, '2019-11-12', 8000, 'Received room rent'),
(7, 1, '2019-11-21', 50000, 'Returns form funds\r\n'),
(10, 1, '2019-12-18', 15000, 'Receieved shop rent'),
(11, 1, '2019-12-26', 9000, 'adas'),
(12, 1, '2019-12-11', 20000, 'salary'),
(13, 1, '2020-01-02', 20000, 'Salary'),
(14, 1, '2020-01-09', 10000, 'Rent Recieved');

-- --------------------------------------------------------

--
-- Table structure for table `exp_mng_users`
--

CREATE TABLE `exp_mng_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_mng_users`
--

INSERT INTO `exp_mng_users` (`id`, `first_name`, `last_name`, `email`, `password`, `profile_pic`) VALUES
(1, 'SHRAVARI ', 'PATIL', 'shravari@gmail.com', '123456', '191221021708shravari_child.jpg'),
(2, 'AKSHAY', 'KAMBLE', 'akshay@gmail.com', '789456', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exp_mng_expense`
--
ALTER TABLE `exp_mng_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_mng_income`
--
ALTER TABLE `exp_mng_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_mng_users`
--
ALTER TABLE `exp_mng_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exp_mng_expense`
--
ALTER TABLE `exp_mng_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exp_mng_income`
--
ALTER TABLE `exp_mng_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exp_mng_users`
--
ALTER TABLE `exp_mng_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
