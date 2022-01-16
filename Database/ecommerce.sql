-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 05:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `type`, `name`, `email`, `address`) VALUES
(1, 'admin', '123456789', 'Admin', 'admin', 'admin@arcomputer.com', 'Dhaka, Bangladesh'),
(2, 'emp', '123456789', 'Employee', 'Asif Rahman', 'asif@gmail.com', 'Uttara, Dhaka'),
(3, 'emp1', '123456789', 'Employee', 'Tarek Mahmud', 'tareq@gmail.com', '65 Central Rd, Dhaka 1205');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_status` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_status`) VALUES
(1, 'Laptop', 'Yes'),
(2, 'Destop', 'Yes'),
(3, 'Mobiles', 'Yes'),
(4, 'Tablet', 'Yes'),
(5, 'Television', 'Yes'),
(6, 'Camera', 'Yes'),
(7, 'Appliance', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `p_status` enum('Yes','No') NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_discount` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_earning` int(11) NOT NULL,
  `p_sales` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `p_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_title`, `p_status`, `p_price`, `p_discount`, `p_quantity`, `p_earning`, `p_sales`, `cat_name`, `p_image`) VALUES
(9, '\r\nHP 15-ac123tx Core i5 (5th Gen) - (4 GB/1 TB ) Notebook N8M28PA\r\n', 'hp laptop', 'Yes', 42490, 0, 10, 0, 0, '1', 'images/product/HP 15-ac123tx Core i5 (5th Gen).jpeg'),
(10, 'HP AC SERIES 15-AC184TU Intel Core i3 (5th Gen) - (4 GB/1 TB HDD/Free DOS) Notebook T0X61PA', 'hp laptop', 'Yes', 25990, 0, 10, 0, 0, '1', 'images/product/HP AC SERIES 15-AC184TU Intel Core i3 (5th Gen).jpeg'),
(11, 'HP Imprint 15-be001TX Intel Core i5 (6th Gen) - (8 GB/1 TB HDD/Free DOS/2 GB Graphics) Notebook W6T28PA', 'hp laptop', 'Yes', 42990, 0, 20, 0, 0, '1', 'images/product/HP Imprint 15-be001TX Intel Core i5 (6th Gen).jpeg'),
(12, 'HP 15-ac650TU Core i5 (4th Gen) - (4 GB/1 TB HDD/Free DOS) Notebook V5D75PA', 'hp laptop', 'Yes', 31990, 0, 10, 0, 0, '1', 'images/product/HP 15-ac650TU Core i5 (4th Gen).jpeg'),
(13, 'HP 15-ac149TX Core i3 (5th Gen) - (8 GB/1 TB HDD/Free DOS/2 GB Graphics) Notebook P6L84PA#ACJ', 'hp laptop', 'Yes', 34990, 6, 4, 0, 0, '1', 'images/product/HP 15-ac149TX Core i3 (5th Gen).jpeg'),
(14, 'Lenovo Tab 2 A7-20 8 GB 7 inch with Wi-Fi Only', 'lenovo tab tablet', 'Yes', 4490, 0, 14, 0, 0, '4', 'images/product/Lenovo Tab 2 A7-20 8 GB 7 inch with Wi-Fi Only.jpeg'),
(15, 'Lenovo TAB3 7 Essential 8 GB 7 inch with Wi-Fi+3G', 'lenovo tablet tab', 'Yes', 6990, 1, 6, 0, 0, '4', 'images/product/Lenovo TAB3 7 Essential 8 GB 7 inch with Wi-Fi+3G.jpeg'),
(16, 'Lenovo Tab 2 A7-30 3G 8 GB 7 inch with Wi-Fi+3G', 'lenovo tablet tab', 'Yes', 6290, 0, 4, 6290, 1, '4', 'images/product/Lenovo Tab 2 A7-30 3G 8 GB 7 inch with Wi-Fi+3G.jpeg'),
(17, 'Lenovo S8-50F 16 GB 8 inch with Wi-Fi Only', 'lenovo tablet tab', 'Yes', 8999, 0, 4, 8999, 1, '4', 'images/product/Lenovo S8-50F 16 GB 8 inch with Wi-Fi Only.jpeg'),
(18, 'Lenovo Yoga Tab 3 10 16 GB 10.1 inch with Wi-Fi+4G', 'lenovo tablet tab', 'Yes', 18990, 0, 5, 0, 0, '4', 'images/product/Lenovo Yoga Tab 3 10 16 GB 10.1 inch with Wi-Fi+4G.jpeg'),
(20, 'Lenovo Yoga 2 Windows Tablet 10.1 inch with Built-in Keyboard', 'lenovo tablet tab', 'Yes', 32990, 0, 2, 32990, 1, '4', 'images/product/Lenovo Yoga 2 Windows Tablet 10.1 inch with Built-in Keyboard.jpeg'),
(21, 'Lenovo Tab 2 A850 16 GB 8 inch with Wi-Fi+4G', 'lenovo tablet tab', 'Yes', 12525, 0, 4, 12525, 1, '4', 'images/product/Lenovo Tab 2 A850 16 GB 8 inch with Wi-Fi+4G.jpeg'),
(36, 'Dell Optiplex 745 Desktop Package - 4GB - 500GB - 19\" LCD - Windows 7 Home Premium ', 'dell computer desktop', 'Yes', 35000, 0, 6, 0, 0, '2', 'images/product/Dell Optiplex 745 Desktop Package -  Windows 7 Home Premium.jpg'),
(37, 'Lenovo Ideapad 100 Core i3 (5th Gen) - (4 GB/500 GB HDD/Free DOS) 80QQ001XIH IP 100- 15IBD Notebook(15.6 inch, Black)', 'Lenovo laptop', 'Yes', 33599, 0, 7, 0, 0, '1', 'images/product/Lenovo Ideapad 100 Core i3 (5th Gen)  Notebook.jpeg'),
(38, 'Lenovo G50-80 Core i3 (5th Gen) - (4 GB/1 TB HDD/Free DOS) 80E502Q8IH G50-80 Notebook', 'Lenovo laptop', 'Yes', 37599, 0, 9, 37599, 1, '1', 'images/product/Lenovo G50-80 Core i3 (5th Gen) - 80E502Q8IH G50-80 Notebook.jpeg'),
(39, 'Dell Vostro Intel Core i3 (4th Gen) - (4 GB/500 GB HDD/Ubuntu) VOSTRO 3458 Notebook(14 inch, Black)', 'Dell laptop', 'Yes', 36590, 5, 19, 34761, 1, '1', 'images/product/Dell Vostro Intel Core i3 (4th Gen) -  VOSTRO 3458 Notebook.jpeg'),
(40, 'Dell Inspiron Core i7 - (16 GB/2 TB HDD/Windows 10/4 GB Graphics) Y566513HIN9 5559 Notebook', 'Dell laptop', 'Yes', 42999, 0, 5, 0, 0, '1', 'images/product/Dell Inspiron Core i7 - Y566513HIN9 5559 Notebook.jpeg'),
(41, 'Asus Zenbook Intel Dual Core - (4 GB/256 GB SSD/Windows 10) Notebook(13.3 inch, Black, 1.2 kg)', 'ASUS laptop', 'Yes', 36590, 0, 4, 36590, 1, '1', 'images/product/Asus Zenbook Intel Dual Core -  90NB06X1-M11270 UX305FA-FC008T Notebook.jpeg'),
(42, 'Asus ROG Core i7 (6th Gen) - (8 GB/1 TB HDD/Windows 10/4 GB Graphics) 90NB09I3-M05010 GL552VW-CN426T Notebook', 'ASUS laptop', 'Yes', 37590, 0, 15, 0, 0, '1', 'images/product/Asus ROG Core i7 (6th Gen) -  90NB09I3-M05010 GL552VW-CN426T Notebook.jpeg'),
(45, 'Acer One 10 Intel Atom Quad Core - (2 GB/32 GB EMMC Storage/Windows 10) Netbook(10.1 inch, Dark Silver, 1.19 kg)', 'Acer laptop', 'Yes', 42999, 0, 5, 0, 0, '1', 'images/product/Acer One 10 Intel Atom Quad Core - Windows 10 NT.G53SI.001 S1002-15XR Netbook(10.1 inch, Dark Silver, 1.19 kg).jpeg'),
(50, 'Lenovo C40-05 21.5-Inch All-in-One Touchscreen Desktop (Discontinued by Manufacturer)', 'Lenovo desktop computer', 'Yes', 45000, 0, 9, 45000, 1, '2', 'images/product/Lenovo C40-05 21.5-Inch All-in-One Touchscreen Desktop (Discontinued by Manufacturer).jpg'),
(52, 'Asus  23-Inch All-In-One Desktop (Intel Dual Core i5-5200U 2.7 GHz processor, 8GB RAM, 2TB HDD, Windows 8.1)', 'ASUS laptop', 'Yes', 45000, 0, 7, 0, 0, '2', 'images/product/Asus ET2324IUT-C2 23-Inch All-In-One Desktop.jpg'),
(53, 'Dell Inspiron i3459-5025BLK 23.8 Inch FHD Touchscreen All-in-One (6th Generation Intel Core i5, 8 GB RAM, 1 TB HDD )', 'dell desktop', 'Yes', 37599, 2, 6, 0, 0, '2', 'images/product/Dell Inspiron i3459-5025BLK 23.8 Inch FHD Touchscreen All-in-One (6th Generation Intel Core i5, 8 GB RAM, 1 TB HDD ).jpg'),
(54, 'Micromax Canvas Tab P701 8 GB 7 inch with Wi-Fi+4G(Blue)', 'Micromax tablet', 'Yes', 23500, 0, 6, 23500, 1, '4', 'images/product/Micromax Canvas Tab P701 8 GB 7 inch with Wi-Fi+4G(Blue).jpeg'),
(55, 'SAMSUNG Galaxy J Max 8 GB 7 inch with Wi-Fi+4G(Gold)', 'Samsung tablet', 'Yes', 34000, 3, 1, 164900, 5, '4', 'images/product/SAMSUNG Galaxy J Max 8 GB 7 inch with Wi-Fi+4G(Gold).jpeg'),
(62, 'Apple iMac 21.5-Inch Ultrathin Core i5 All-in-one Desktop Computer w/ Apple Keyboard and Mouse', 'apple computer desktop', 'Yes', 68000, 0, 8, 1496000, 22, '2', 'images/product/Apple iMac  Ultrathin All-in-one Desktop Computer w Apple Keyboard and Mouse.jpg'),
(63, 'Lenovo ThinkCentre M91p SFF 3.1GHz Intel Core i5 CPU 8GB RAM 1TB HDD Windows 8 Desktop ', 'lenovo computer desktop', 'Yes', 34000, 0, 1, 34000, 1, '2', 'images/product/Lenovo ThinkCentre M91p SFF 3.1GHz Intel Core i5 CPU 8GB RAM 1TB HDD Windows 8 Desktop.jpg'),
(64, 'CYBERPOWERPC Gamer Ultra GUA3400OS with AMD FX-6300 3.5 GHz Gaming Computer', 'CYBERPOWERPC gaming computer', 'Yes', 85000, 0, 4, 255000, 3, '2', 'images/product/CYBERPOWERPC Gamer Ultra GUA3400OS with AMD FX-6300 3.5 GHz Gaming Computer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `s_id` int(11) NOT NULL,
  `s_firstname` varchar(150) NOT NULL,
  `s_lastname` varchar(150) NOT NULL,
  `s_email` varchar(150) NOT NULL,
  `s_phone` varchar(50) NOT NULL,
  `s_address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `s_cost` int(11) NOT NULL,
  `shipment_status` varchar(50) DEFAULT 'Unseen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`s_id`, `s_firstname`, `s_lastname`, `s_email`, `s_phone`, `s_address`, `city`, `s_cost`, `shipment_status`) VALUES
(31, 'Arif', 'Chowdhury', 'caara09bd@gmail.com', '01827864013', 'St Road, Agrabaad, Chittagong, Bangladesh', 'Feni', 168980, 'Ready For Shipment'),
(32, 'shririn', 'alam', 'shirinaalam0123@gmail.com', '01875262015', 'Khilkhet, Dhaka', 'Dhaka', 136000, 'Ready For Shipment'),
(34, 'Balal', 'Chowdhury', 'balal@gmail.com', '01827864013', 'St Road, Agrabaad, Chittagong, Bangladesh', 'Feni', 68000, 'Ready For Shipment'),
(35, 'arafath', 'Chowdhury', 'arafath2006@gmail.com', '01555626522', 'Dinajpur, Rangpur, Bangladesh', 'chittagong', 12525, 'Product Delivered'),
(36, 'Arif', 'Chowdhury', 'caara09bd@gmail.com', '01812387307', 'St Road, Agrabaad, Chittagong, Bangladesh', 'Feni', 45000, 'Product Delivered'),
(38, 'Mahmud', 'Hasan', 'mahmudmaniksd@gmail.com', '01812387307', 'Gazipur,dhaka', 'Dhaka', 36590, 'Not Decided'),
(39, 'Ahsan', 'Bishal', 'Bishal@gmail.com', '01896532156', 'Road : 30 , Sector : 25 , Gulasn, Dhaka', 'Dhaka', 34761, 'Product Recieved'),
(41, 'Md Arafath', 'Chowdhury', 'caara09bdall@gmail.com', '01555626522', 'Basundhara,dhaka', 'Dhaka', 68000, 'Unseen'),
(42, 'Kamal', 'Hasan', 'kamal018@gmail.com', '01888884013', 'Dhanmondi,dhaka', 'Dhaka', 23500, 'Unseen');

-- --------------------------------------------------------

--
-- Table structure for table `sales_info`
--

CREATE TABLE `sales_info` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `p_option` varchar(200) NOT NULL,
  `bkash` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_info`
--

INSERT INTO `sales_info` (`id`, `s_id`, `p_id`, `quantity`, `cost`, `p_option`, `bkash`, `date`) VALUES
(45, 31, 62, 2, 136000, 'Bkash', '89632154789236', '2018-07-23'),
(46, 31, 55, 1, 168980, 'Bkash', '89632154789236', '2018-07-23'),
(47, 32, 62, 2, 136000, 'Bkash', '89569856789236', '2018-07-27'),
(49, 34, 62, 1, 68000, 'Bkash', '89632154789236', '2018-07-27'),
(50, 35, 21, 1, 12525, 'Bkash', '89632154789236', '2018-07-27'),
(51, 36, 50, 1, 45000, 'Bkash', '89632154789236', '2018-08-13'),
(52, 38, 41, 1, 36590, 'Cash', 'Not Needed', '2018-08-13'),
(53, 39, 39, 1, 34761, 'Bkash', '987865453212', '2018-08-28'),
(60, 41, 62, 1, 68000, 'Bkash', '89632154789236', '2018-08-30'),
(61, 42, 54, 1, 23500, 'Bkash', '89632154789236', '2018-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `email`, `password`, `f_name`, `l_name`, `phone`) VALUES
(1, 'arif', 'caara09bd@gmail.com', '123456789', 'Arif', 'Chowdhury', '01827864013'),
(40, 'Shahanaj', 'shahanazz40@gmail.com', '123456789', 'Shahanaj', 'Pervin', '01899999999'),
(41, 'shirin', 'shirinaalam0123@gmail.com', '123456789', 'Shririn', 'Alam', '01875262015'),
(42, 'arafath', 'caara09bdall@gmail.com', '123456789', 'Md Arafath', 'Chowdhury', '01555626522'),
(45, 'mahmud', 'mahmudmaniksd@gmail.com', '123456789', 'Mahmud', 'Hasan', '01812387307'),
(46, 'Bishal', 'Bishal@gmail.com', '123456789', 'Ahsan', 'Bishal', '01896532156'),
(48, 'Balal09', 'Balal09@gmail.com', '123456789', 'Md Belayat', 'Hossain', '01827868888'),
(56, 'amir', 'amir_hossain@gmail.com', '123456789', 'Amir', 'Hossain', '01812387459'),
(57, 'kamal', 'kamal018@gmail.com', '123456789', 'Kamal', 'Hasan', '01888884013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sales_info`
--
ALTER TABLE `sales_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sales_info`
--
ALTER TABLE `sales_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
