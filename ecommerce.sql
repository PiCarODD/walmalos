-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 05:21 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_customer_id` int(11) NOT NULL,
  `cart_date` date NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_product_id`, `cart_customer_id`, `cart_date`, `cart_qty`, `cart_total_price`) VALUES
(78, 18, 0, '2019-07-12', 1, 100),
(79, 18, 0, '2019-07-12', 1, 100),
(80, 18, 3, '2019-08-04', 2, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(2, 'Jewelry'),
(3, 'Home Accessories'),
(4, 'Cloths'),
(5, 'Shoe'),
(6, 'Handmades'),
(7, 'laptop'),
(8, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 18, 'MTK', 'mtk@gmail.com', 'Good quality', 'approved', '2019-07-10'),
(2, 25, 'MTK', 'mtk@gmail.com', 'Beautiful home accessory', 'approved', '2019-07-10'),
(4, 21, 'MTK', 'mtk@gmail.com', 'This is a good dress.', 'approved', '2019-07-10'),
(5, 20, 'N N', 'nn@gmail.com', 'Bad', 'approved', '2019-07-10'),
(6, 25, 'mk', 'mk@gmail.com', 'Good', 'approved', '2019-07-10'),
(7, 25, 'nyein', 'nyein@gmail.com', 'Nice', 'approved', '2019-07-10'),
(8, 22, 'N N', 'nn@gmail.com', 'Bad quality', 'approved', '2019-07-12'),
(9, 19, '\"><img/src=x>', 'a@gmail.com', '\"><img/src=x>', 'unapproved', '2020-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone_no` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone_no`, `customer_email`, `customer_address`) VALUES
(1, 'Yu Yu', '09977165513', 'yuyu@gmail.com', 'Ygn'),
(2, 'Ko Ko', '09252687250', 'koko@gmail.com', 'Pyin Oo Lwin'),
(3, 'mgmg', '55543758640', 'admin@tuta.pos', 'adfdsfds');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `description`, `start_date`, `end_date`, `location`, `comment`) VALUES
(1, 'acer promotion', 'Up to 50%', '0000-00-00', '0000-00-00', 'Myanmar Plaza', ''),
(4, 'hp promotion', '50% discount', '2019-07-10', '2019-07-11', 'yangon', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_content` text NOT NULL,
  `product_date` date NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_seller_id` int(11) NOT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `product_comment_count` int(11) NOT NULL,
  `product_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_cat_id`, `product_title`, `product_image`, `product_content`, `product_date`, `product_price`, `product_qty`, `product_seller_id`, `product_tag`, `product_status`, `product_comment_count`, `product_view_count`) VALUES
(18, 4, 'cloth 2', 'FB_IMG_1560135380179.jpg', '', '2019-06-27', '10000', 3, 19, '', 'approved', 2, 28),
(19, 5, 'shoe5', 'FB_IMG_1560135825791.jpg', '', '2019-06-27', '10000', 3, 19, '', 'approved', 1, 7),
(20, 2, 'j2', 'FB_IMG_1560135026935.jpg', '', '2019-06-27', '5000', 3, 19, '', 'approved', 1, 22),
(22, 8, 'watch 3', 'FB_IMG_1560136676730.jpg', '', '2019-06-28', '20000', 1, 28, '', 'approved', 1, 2),
(23, 8, 'watch 4', 'FB_IMG_1560136743002.jpg', '', '2019-06-28', '15000', 2, 28, '', 'approved', 0, 2),
(24, 2, 'j2', 'FB_IMG_1560135282874.jpg', '', '2019-07-01', '10000', 6, 19, '', 'approved', 0, 0),
(25, 3, 'home1', 'FB_IMG_1560136053994.jpg', 'This is the best home accessories.', '2019-07-02', '15000', 4, 19, '', 'approved', 3, 4),
(31, 3, 'home4', 'FB_IMG_1560136111937.jpg', 'This is home', '2019-07-03', '1200', 2, 19, '', 'approved', 0, 0),
(35, 4, 'dress', 'FB_IMG_1560134922579.jpg', 'hhhhh', '2019-07-10', '10000', 6, 19, '', 'approved', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_nrc` varchar(255) NOT NULL,
  `user_phone_no` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `rendSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_image`, `user_role`, `user_nrc`, `user_phone_no`, `user_address`, `rendSalt`) VALUES
(32, 'admin', '', '', '$2y$10$0/QU3Er74CFMQbadjQsGCudUvhtRVc9toJZIDvPsWCplH05MbNQKK', 'admin@walmal.pos', '', 'admin', '1/wtf(N)133701', '0941414141', 'Myanmar', ''),
(33, 'user', '', '', '$2y$10$yI/dcE5ZW.5kTQhxJhBLNuFU93zF8NMXUbW5AXzo6kzWm8/K5Dqb.', 'seller@walmal.pos', '', 'seller', '8/wtf(g)133220', '091111441', 'Myanmar', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
