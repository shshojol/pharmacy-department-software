-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 07:25 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` varchar(100) COLLATE utf16_bin NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf16_bin NOT NULL,
  `DOCTOR_NAME` varchar(20) COLLATE utf16_bin NOT NULL,
  `DOCTOR_NUMBER` varchar(100) COLLATE utf16_bin NOT NULL,
  `EMAIL` varchar(255) COLLATE utf16_bin NOT NULL,
  `PASS` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `NAME`, `CONTACT_NUMBER`, `ADDRESS`, `DOCTOR_NAME`, `DOCTOR_NUMBER`, `EMAIL`, `PASS`) VALUES
(4, 'MD Tarikul islam', '12345676901111', 'Motijhil', 'Dr.sohan khan', '0168523523', 'tarik@gmail.com', '123'),
(6, 'Aditya islam', '7365687269', 'Motijhil', 'Dr. Hasan mahamud', '0155822665', 'adi@gmail.com', '123'),
(11, 'Sagor Tiwari', '6862369896', 'Mohammadpur', 'Dr Khan', '01672522622', 'sagor@gmail.com', '123'),
(13, 'Md. Sahin alom', '7622369694', 'kallanpur,mirpur,dhaka', 'Dr Najmul hoque', '016716554212', 'sahin@gmail.com', '123'),
(14, 'zamil hasan', '9802851472', 'mirpur 1', 'Dr. Imrul hasan', '0168465265', 'zamil@gmail.com', '123'),
(15, 'sahid hasan sojol', '0168262342', 'kallanpur', 'Dr. al amin', '6545496326', 'shojol@gmail.com', '123'),
(16, 'abdur', '0125423', 'chottogram', 'hasan', '01551255', 'abdur@gmail.com', '123'),
(22, 'rashid ahmed', '01682596652', 'mirpur', 'Dr.kamarl hasan', '01682623426111', 'rasid@gmail.com', '123'),
(24, 'Tawhid', '0174561111', 'chottogram', 'DR.imran', '58426842', 'tawhid@gmail.com', '123'),
(25, 'masum', '01682623426', 'kallanpur', 'Dr.kamarl hasan', '01682623426', 'masum@gmail.com', '123'),
(26, 'mizan mia', '01682623426', 'kallanpur', 'Dr.kamarl hasan', '', '', ''),
(27, 'Tarikul islam', '01682623426', 'kallanpur', 'Dr.sojol', '016816584', '', ''),
(29, 'sadia islam', '01682623426', 'kallanpur', 'Dr chapai', '015816842', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `INVOICE_ID` int(11) NOT NULL,
  `NET_TOTAL` double NOT NULL DEFAULT 0,
  `INVOICE_DATE` date NOT NULL DEFAULT current_timestamp(),
  `CUSTOMER_ID` int(11) NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  `TOTAL_DISCOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE_ID`, `NET_TOTAL`, `INVOICE_DATE`, `CUSTOMER_ID`, `TOTAL_AMOUNT`, `TOTAL_DISCOUNT`) VALUES
(1, 30, '2021-10-19', 14, 30, 0),
(2, 2626, '2021-10-19', 6, 2626, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `PACKING` varchar(20) COLLATE utf16_bin NOT NULL,
  `GENERIC_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `SUPPLIER_NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `image` varchar(255) COLLATE utf16_bin NOT NULL,
  `RATE` varchar(20) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`ID`, `NAME`, `PACKING`, `GENERIC_NAME`, `SUPPLIER_NAME`, `image`, `RATE`) VALUES
(1, 'Nicip Plus', '10tab', 'Paracetamole', '1', '1537950642Cytomia- Carton Pic1.jpg', '50'),
(2, 'Crosin', '10tab', 'Hdsgvkvajkcbja', '2', '1605071196011.png', '100'),
(4, 'Dolo 650', '15tab', 'paracetamole', '31', 'ADRYL-100ml.jpg', '60'),
(5, 'Gelusil', '10tab', 'mint fla', '12', 'Alarid-Tablet.jpg', '20'),
(6, 'NAPA', '15tab', 'NAPA', '2', 'alatrol-10-mg-tablet-10s-strip_60b67d346ee60.jpeg', '25'),
(8, 'Atropine', '10tab', 'Atropine', '33', 'Alatrol-Syrup.jpg', '40'),
(9, 'tona', '20tab', 'tona', '31', 'GESTON.jpg', '50'),
(10, 'Ace', '10tab', 'ace', '2', 'Pharmaceuticals-Estracon-Tablet.jpg', '70'),
(11, 'histarsin', '10tab', 'histasin', '34', 'images (1).jpg', '250'),
(13, 'Tofen', '10tab', 'tofen', '1', 'images (2).jpg', '60'),
(14, 'aspirin', '10tab', 'aspirin', '2', 'images.jpg', '50'),
(15, 'seram', '20tab', 'seram', '34', 'GESTON.jpg', '500');

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
(123, '2022-03-05', '1', 'Cash payment', 'demo', '20', '5', '100', '5', '100'),
(124, '2022-03-07', '1', 'Cash payment', 'demo', '20', '2', '40', '2', '40'),
(125, '2022-03-07', '13', 'Banking', 'Histarsin', '20', '5', '100', '5', '100'),
(126, '2022-03-07', '12', 'Cash payment', 'seclo,napa', '20,50', '10,20', '200,1000', '30', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_qty` varchar(255) NOT NULL,
  `item_amount` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `customer_id`, `item_name`, `item_price`, `item_qty`, `item_amount`, `total`, `date`) VALUES
(1, 15, 'histarsin,NAPA', '250,25', '1,1', '250,25', '275', '2022-03-22'),
(2, 15, 'histarsin,NAPA', '250,25', '1,1', '250,25', '275', '2022-03-22'),
(3, 4, 'Crosin,Dolo 650,Atropine', '100,60,40', '1,2,5', '100,120,200', '420', '2022-03-22'),
(4, 6, 'Gelusil,Dolo 650', '20,60', '5,1', '100,60', '160', '2022-03-22'),
(5, 1, 'Dolo 650,Ace', '60,70', '1,1', '60,70', '130', '2022-03-22'),
(6, 1, 'tona', '50', '1', '50', '50', '2022-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_invoice` int(11) NOT NULL,
  `sale_date` date NOT NULL DEFAULT current_timestamp(),
  `customer_name` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `total_qty` varchar(255) NOT NULL,
  `total_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_invoice`, `sale_date`, `customer_name`, `payment_type`, `product`, `rate`, `qty`, `amount`, `total_qty`, `total_amt`) VALUES
(501, '2022-03-05', 4, 'Payment Due', 'napa,napa extra', '50,500', '5,5', '250,2500', '10', '2750'),
(502, '2022-03-06', 15, 'Banking', 'demo4,demo1', '50,200', '2,5', '100,1000', '7', '1100'),
(503, '2022-03-06', 4, 'Payment Due', 'seclo,seclo 2', '16,160', '20,20', '320,3200', '40', '3520'),
(504, '2022-03-07', 4, 'Cash payment', 'napa,seclo', '5,16', '10,10', '50,160', '20', '210');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf16_bin NOT NULL,
  `EMAIL` varchar(100) COLLATE utf16_bin NOT NULL,
  `CONTACT_NUMBER` varchar(100) COLLATE utf16_bin NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `NAME`, `EMAIL`, `CONTACT_NUMBER`, `ADDRESS`) VALUES
(1, 'ACI Limited', 'desai@gmail.com', '99411126542', 'Gazipur'),
(2, 'The ACME Laboratories Ltd', 'bdpl@gmail.com', '8645632963', 'Jatrabari'),
(9, 'Beacon Pharmaceuticals', 'kiranpharma@gmail.com', '7638683637', 'savar'),
(12, 'Beximco Pharma', 'ssdis@gamil.com', '3867868752', 'savar'),
(13, 'Eskayef Pharmaceuticals Ltd.', 'ehh@yahoo.com', '3466626226', 'narayangonj'),
(31, 'Incepta Pharmaceuticals', 'shojolsh@gmail.com', '0168262342', 'mirpur'),
(33, 'Orion Pharma (Bangladesh)', 'ali@gmail.com', '546526655', 'dhanmondi'),
(34, 'Renata Limited', 'sul@yahoo.com', '5426584126', 'jatrabari'),
(35, 'Square Pharmaceuticals', 'shojolsh@gmail.com', '0168262342', 'kallanpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`INVOICE_ID`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `new_purchase`
--
ALTER TABLE `new_purchase`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_invoice`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `new_purchase`
--
ALTER TABLE `new_purchase`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
