-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 06:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phar`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_purchase`
--

CREATE TABLE `new_purchase` (
  `invoice_number` int(11) NOT NULL,
  `purchase_date` date NOT NULL DEFAULT current_timestamp(),
  `supplier_name` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `total_qty` varchar(255) NOT NULL,
  `total_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_purchase`
--

INSERT INTO `new_purchase` (`invoice_number`, `purchase_date`, `supplier_name`, `payment_type`, `product`, `rate`, `qty`, `amount`, `total_qty`, `total_amt`) VALUES
(103, '2022-03-05', '1', 'Cash payment', 'Histarsin,Tofen', '20,15', '5,10', '100,150', '15', '250'),
(106, '2022-03-05', '34', 'Payment Due', 'Histarsin,Histarsin1', '50,500', '2,3', '100,1500', '5', '1600'),
(123, '2022-03-05', '1', 'Cash payment', 'demo', '20', '5', '100', '5', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_purchase`
--
ALTER TABLE `new_purchase`
  ADD PRIMARY KEY (`invoice_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_purchase`
--
ALTER TABLE `new_purchase`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
