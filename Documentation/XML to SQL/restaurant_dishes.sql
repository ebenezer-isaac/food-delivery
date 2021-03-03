-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 05:20 PM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u117204720_food_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_dishes`
--

CREATE TABLE `restaurant_dishes` (
  `dish_id` int(5) NOT NULL,
  `restaurant_id` int(5) NOT NULL,
  `category` varchar(1) NOT NULL,
  `cuisine` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `taste` varchar(10) DEFAULT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_dishes`
--

INSERT INTO `restaurant_dishes` (`dish_id`, `restaurant_id`, `category`, `cuisine`, `name`, `taste`, `price`) VALUES
(1, 6, 'V', 'Indian', 'Idli', 'Sour', 30),
(2, 6, 'V', 'Indian', 'Pongal', '    Sour', 45),
(3, 6, 'V', 'Indian', 'Poori', 'Sour', 240),
(4, 6, 'V', 'Indian', 'Dosai', 'Sour', 40),
(5, 6, 'N', 'Indian', 'Chicken tandoori', '', 65),
(6, 6, 'N', 'Indian', 'Chicken Briyani', '', 130),
(7, 6, 'V', 'Indian', 'Veg Briyani', '', 260),
(8, 6, 'V', 'Indian', 'Mushroom Briyani', '', 340),
(9, 6, 'V', 'Indian', 'Paneer tikka', '', 240),
(10, 6, 'N', 'Indian', 'Parotta', '', 40),
(11, 6, 'V', 'Italian', 'Lasagne', 'Salty', 30),
(12, 6, 'V', 'Italian', 'Raviolli with pink sauce', 'salty', 45),
(13, 6, 'V', 'Italian', 'Spaghetti', 'Spicy', 240),
(14, 6, 'V', 'Italian', 'White sauce pasta', 'Salty', 40),
(15, 6, 'v', 'Italian', 'Masala mac and cheese', 'Salty', 65),
(16, 6, 'N', 'Italian', 'Cheese garlic bread', '', 130),
(17, 6, 'V', 'Italian', 'Italian minestra', 'Salty', 260),
(18, 6, 'V', 'Italian', 'Quick tiramisu', 'Sweet', 340),
(19, 6, 'V', 'Italian', 'Pizza margherita', 'Salty', 240),
(20, 6, 'V', 'Italian', 'Coasted bell pepper crostini', 'Sour', 40),
(21, 6, 'N', 'Korean', 'Bibimbap', 'Sour', 30),
(22, 6, 'V', 'Korean', 'Kimchi', 'Spicy', 45),
(23, 6, 'V', 'Korean', 'Japachae', 'Sweet', 240),
(24, 6, 'V', 'Korean', 'Gimbap', 'Sour', 40),
(25, 6, 'V', 'Korean', 'Bingsu', 'Sweet', 65),
(26, 6, 'N', 'Korean', 'Deep fried mandu', 'Sour', 130),
(27, 6, 'V', 'Korean', 'Kimchi fried rice', 'Spicy', 260),
(28, 6, 'N', 'Korean', 'Korean ramyeon', 'Spicy', 340),
(29, 6, 'V', 'Korean', 'Tteok-bokki', 'Sweet', 240),
(30, 6, 'V', 'Korean', 'Hotteok', 'Sweet', 40),
(31, 6, 'N', 'Chinese', 'Chilli chicken', 'Spicy', 30),
(32, 6, 'V', 'Chinese', 'Chowmein', 'Spicy', 45),
(33, 6, 'N', 'Chinese', 'Manchow soup', 'Spicy', 240),
(34, 6, 'V', 'Chinese', 'Spring rolls', 'Spicy', 40),
(35, 6, 'N', 'Chinese', 'Schezuan chicken', 'Spicy', 65),
(36, 6, 'V', 'Chinese', 'Fried rice', 'Spicy', 130),
(37, 6, 'N', 'Chinese', 'Hakka noodles', 'Spicy', 260),
(38, 6, 'V', 'Chinese', 'Sweet corn soup', 'Sweet', 340),
(39, 6, 'N', 'Chinese', 'Lemon chicken', 'Salty', 240),
(40, 6, 'V', 'Chinese', 'Dimsums', 'Sour', 40),
(41, 6, 'V', 'American', 'Pancakes', 'Sweet', 30),
(42, 6, 'N', 'American', 'Chicken burger', 'Spicy', 45),
(43, 6, 'V', 'American', 'Vegburger', 'Spicy', 240),
(44, 6, 'V', 'American', 'Apple pie', 'Sweet', 40),
(45, 6, 'V', 'American', 'Tacos', 'Spicy', 65),
(46, 6, 'N', 'American', 'Chicken fried steak', 'Salty', 130),
(47, 6, 'V', 'American', 'Cioppino', 'Spicy', 260),
(48, 6, 'V', 'American', 'Peanut butter sandwich', 'Sweet', 340),
(49, 6, 'V', 'American', 'Donuts', 'Sweet', 240),
(50, 6, 'V', 'American', 'Nachos', 'Spicy', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant_dishes`
--
ALTER TABLE `restaurant_dishes`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant_dishes`
--
ALTER TABLE `restaurant_dishes`
  MODIFY `dish_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `restaurant_dishes`
--
ALTER TABLE `restaurant_dishes`
  ADD CONSTRAINT `restaurant_dishes_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
