-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 08:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golden_grill_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `short_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `short_desc`) VALUES
(16, 'drinks', 'drinks'),
(17, 'Snacks', 'Snacks'),
(18, 'Meal', 'Meal');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `hire_date` date DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `wages_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expensis`
--

CREATE TABLE `expensis` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_code`
--

CREATE TABLE `invoice_code` (
  `id` bigint(20) NOT NULL,
  `invoice_code` bigint(20) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `receipt_no` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_code`
--

INSERT INTO `invoice_code` (`id`, `invoice_code`, `description`, `receipt_no`) VALUES
(4, 174, 'invoice number', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purchase_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `short_desc`, `category_id`, `unit_price`, `added_at`, `purchase_price`) VALUES
(42, '5 Alive', 'djhdg', 16, 300, '2020-09-04 10:36:38', 200),
(43, 'Shawarma', 'Shawarma', 17, 1000, '2020-09-06 17:30:42', 600),
(44, 'Jellof', 'Jellof', 18, 1200, '2020-09-06 17:31:15', 600),
(45, 'Rice and Beans', 'Rice and Beans', 16, 2000, '2020-09-06 18:20:55', 600),
(46, 'Chocolate Cake', 'Cake', 17, 1800, '2020-09-06 18:21:48', 500),
(47, 'Red Velvet Copcakes', 'Cake', 17, 2400, '2020-09-06 18:22:31', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payment_date` varchar(50) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sold_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `invoice_no` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `qty`, `sold_at`, `total_price`, `product_name`, `unit_price`, `user`, `invoice_no`) VALUES
(1550, 5, '2020-07-13 17:15:25', 2250, 'Grandnut Oil', 450, 'Abubakar', 48),
(1551, 1, '2020-07-13 17:15:39', 350, 'Beans Medium', 350, 'Abubakar', 49),
(1552, 30, '2020-07-18 21:49:29', 25500, 'Rice', 850, 'Abubakar', 50),
(1553, 5, '2020-07-18 21:49:29', 2250, 'Grandnut Oil', 450, 'Abubakar', 50),
(1554, 14, '2020-07-18 21:49:29', 4900, 'Beans Medium', 350, 'Abubakar', 50),
(1555, 3, '2020-07-19 09:56:50', 1350, 'Grandnut Oil', 450, 'Abubakar', 51),
(1556, 3, '2020-07-22 17:36:41', 2550, 'Rice', 850, 'Abubakar', 52),
(1557, 10, '2020-07-22 17:39:45', 8500, 'Rice', 850, 'Abubakar', 53),
(1558, 5, '2020-07-22 17:40:02', 2250, 'Grandnut Oil', 450, 'Abubakar', 54),
(1559, 1, '2020-07-22 17:41:34', 350, 'Beans Medium', 350, 'Abubakar', 55),
(1560, 2, '2020-07-22 17:41:57', 700, 'Beans Medium', 350, 'Abubakar', 56),
(1561, 4, '2020-09-04 10:34:49', 1400, 'Beans Medium', 350, 'Sakeenah Abdul', 57),
(1562, 1, '2020-09-04 10:34:49', 450, 'Grandnut Oil', 450, 'Sakeenah Abdul', 57),
(1563, 5, '2020-09-04 11:17:35', 1500, '5 Alive', 300, 'Abubakar', 58),
(1564, 1, '2020-09-06 17:32:20', 300, '5 Alive', 300, 'Hafs', 59),
(1565, 1, '2020-09-06 17:32:20', 1200, 'Jellof', 1200, 'Hafs', 59),
(1566, 1, '2020-09-06 17:32:20', 1000, 'Shawarma', 1000, 'Hafs', 59),
(1567, 1, '2020-09-06 17:34:45', 300, '5 Alive', 300, 'Hafs', 60),
(1568, 1, '2020-09-06 17:34:45', 1200, 'Jellof', 1200, 'Hafs', 60),
(1569, 1, '2020-09-06 17:34:45', 1000, 'Shawarma', 1000, 'Hafs', 60),
(1570, 1, '2020-09-06 17:36:26', 1200, 'Jellof', 1200, 'Hafs', 61),
(1571, 1, '2020-09-06 17:36:26', 300, '5 Alive', 300, 'Hafs', 61),
(1572, 1, '2020-09-06 17:39:35', 300, '5 Alive', 300, 'Employee', 62),
(1573, 1, '2020-09-06 17:39:36', 1200, 'Jellof', 1200, 'Employee', 62),
(1574, 1, '2020-09-06 17:39:36', 1000, 'Shawarma', 1000, 'Employee', 62),
(1575, 1, '2020-09-06 17:40:19', 300, '5 Alive', 300, 'Employee', 63),
(1576, 1, '2020-09-06 17:40:19', 1200, 'Jellof', 1200, 'Employee', 63),
(1577, 1, '2020-09-06 17:42:06', 300, '5 Alive', 300, 'Employee', 64),
(1578, 1, '2020-09-06 17:42:06', 1200, 'Jellof', 1200, 'Employee', 64),
(1579, 1, '2020-09-06 17:42:06', 1000, 'Shawarma', 1000, 'Employee', 64),
(1580, 1, '2020-09-06 17:42:20', 1000, 'Shawarma', 1000, 'Employee', 65),
(1581, 1, '2020-09-06 17:42:20', 1200, 'Jellof', 1200, 'Employee', 65),
(1582, 1, '2020-09-06 17:43:33', 1000, 'Shawarma', 1000, 'Employee', 66),
(1583, 1, '2020-09-06 17:43:33', 1200, 'Jellof', 1200, 'Employee', 66),
(1584, 2, '2020-09-06 17:46:41', 600, '5 Alive', 300, 'Employee', 67),
(1585, 1, '2020-09-06 17:46:41', 1200, 'Jellof', 1200, 'Employee', 67),
(1586, 1, '2020-09-06 17:46:41', 1000, 'Shawarma', 1000, 'Employee', 67),
(1587, 1, '2020-09-06 17:55:52', 300, '5 Alive', 300, 'Employee', 68),
(1588, 1, '2020-09-06 17:55:52', 1200, 'Jellof', 1200, 'Employee', 68),
(1589, 1, '2020-09-06 17:59:06', 300, '5 Alive', 300, 'Employee', 69),
(1590, 1, '2020-09-06 17:59:06', 1000, 'Shawarma', 1000, 'Employee', 69),
(1591, 1, '2020-09-06 18:01:05', 300, '5 Alive', 300, 'Employee', 70),
(1592, 1, '2020-09-06 18:01:05', 1000, 'Shawarma', 1000, 'Employee', 70),
(1593, 1, '2020-09-06 18:01:58', 300, '5 Alive', 300, 'Employee', 71),
(1594, 1, '2020-09-06 18:01:58', 1000, 'Shawarma', 1000, 'Employee', 71),
(1595, 3, '2020-09-06 18:05:08', 900, '5 Alive', 300, 'Employee', 72),
(1596, 1, '2020-09-06 18:09:08', 300, '5 Alive', 300, 'Employee', 73),
(1597, 1, '2020-09-06 18:11:16', 300, '5 Alive', 300, 'Employee', 74),
(1598, 1, '2020-09-06 18:11:59', 300, '5 Alive', 300, 'Employee', 75),
(1599, 1, '2020-09-06 18:14:55', 300, '5 Alive', 300, 'Employee', 76),
(1600, 1, '2020-09-06 18:17:04', 300, '5 Alive', 300, 'Employee', 77),
(1601, 1, '2020-09-06 18:19:10', 300, '5 Alive', 300, 'Employee', 78),
(1602, 1, '2020-09-06 18:23:35', 300, '5 Alive', 300, 'Hafs', 79),
(1603, 1, '2020-09-06 18:23:35', 1800, 'Chocolate Cake', 1800, 'Hafs', 79),
(1604, 1, '2020-09-06 18:23:35', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 79),
(1605, 1, '2020-09-06 18:23:35', 2000, 'Rice and Beans', 2000, 'Hafs', 79),
(1606, 1, '2020-09-06 18:25:39', 300, '5 Alive', 300, 'Hafs', 80),
(1607, 1, '2020-09-06 18:25:39', 1800, 'Chocolate Cake', 1800, 'Hafs', 80),
(1608, 1, '2020-09-06 18:26:58', 300, '5 Alive', 300, 'Hafs', 81),
(1609, 1, '2020-09-06 18:26:59', 1800, 'Chocolate Cake', 1800, 'Hafs', 81),
(1610, 1, '2020-09-06 18:26:59', 2000, 'Rice and Beans', 2000, 'Hafs', 81),
(1611, 1, '2020-09-06 18:27:50', 2000, 'Rice and Beans', 2000, 'Hafs', 82),
(1612, 1, '2020-09-06 18:27:50', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 82),
(1613, 1, '2020-09-06 18:28:21', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 83),
(1614, 1, '2020-09-06 18:28:21', 2000, 'Rice and Beans', 2000, 'Hafs', 83),
(1615, 1, '2020-09-06 18:34:32', 1800, 'Chocolate Cake', 1800, 'Hafs', 84),
(1616, 1, '2020-09-06 18:34:58', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 85),
(1617, 1, '2020-09-06 18:34:58', 1800, 'Chocolate Cake', 1800, 'Hafs', 85),
(1618, 1, '2020-09-06 18:35:26', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 86),
(1619, 1, '2020-09-06 18:35:26', 1800, 'Chocolate Cake', 1800, 'Hafs', 86),
(1620, 1, '2020-09-06 18:35:41', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 87),
(1621, 1, '2020-09-06 18:35:41', 1800, 'Chocolate Cake', 1800, 'Hafs', 87),
(1622, 1, '2020-09-06 18:36:08', 2000, 'Rice and Beans', 2000, 'Hafs', 88),
(1623, 1, '2020-09-06 18:36:08', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 88),
(1624, 1, '2020-09-06 18:36:23', 2000, 'Rice and Beans', 2000, 'Hafs', 89),
(1625, 1, '2020-09-06 18:36:23', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 89),
(1626, 1, '2020-09-06 18:36:47', 1800, 'Chocolate Cake', 1800, 'Hafs', 90),
(1627, 1, '2020-09-06 18:36:47', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 90),
(1628, 1, '2020-09-06 18:38:00', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 91),
(1629, 1, '2020-09-06 18:38:00', 1800, 'Chocolate Cake', 1800, 'Hafs', 91),
(1630, 1, '2020-09-06 18:38:19', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 92),
(1631, 1, '2020-09-06 18:38:19', 1800, 'Chocolate Cake', 1800, 'Hafs', 92),
(1632, 1, '2020-09-06 18:39:11', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 93),
(1633, 1, '2020-09-06 18:39:11', 1800, 'Chocolate Cake', 1800, 'Hafs', 93),
(1634, 1, '2020-09-06 18:41:11', 300, '5 Alive', 300, 'Hafs', 94),
(1635, 1, '2020-09-06 18:41:11', 1800, 'Chocolate Cake', 1800, 'Hafs', 94),
(1636, 1, '2020-09-06 18:41:31', 2000, 'Rice and Beans', 2000, 'Hafs', 95),
(1637, 1, '2020-09-06 18:41:32', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 95),
(1638, 1, '2020-09-06 18:43:21', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 96),
(1639, 1, '2020-09-06 18:43:21', 1800, 'Chocolate Cake', 1800, 'Hafs', 96),
(1640, 1, '2020-09-06 18:52:51', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 97),
(1641, 1, '2020-09-06 18:53:06', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 97),
(1642, 1, '2020-09-06 18:53:36', 2000, 'Rice and Beans', 2000, 'Employee', 98),
(1643, 1, '2020-09-06 18:53:46', 2000, 'Rice and Beans', 2000, 'Employee', 99),
(1644, 1, '2020-09-06 18:54:14', 2400, 'Red Velvet Copcakes', 2400, 'Hafs', 94),
(1645, 1, '2020-09-06 18:55:19', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 100),
(1646, 1, '2020-09-06 18:56:16', 1800, 'Chocolate Cake', 1800, 'Employee', 101),
(1647, 1, '2020-09-06 18:56:16', 300, '5 Alive', 300, 'Employee', 101),
(1648, 1, '2020-09-06 18:57:05', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 102),
(1649, 1, '2020-09-06 18:57:05', 2000, 'Rice and Beans', 2000, 'Employee', 102),
(1650, 1, '2020-09-06 18:58:30', 2000, 'Rice and Beans', 2000, 'Employee', 103),
(1651, 1, '2020-09-06 18:58:30', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 103),
(1652, 1, '2020-09-06 18:58:30', 1800, 'Chocolate Cake', 1800, 'Employee', 103),
(1653, 1, '2020-09-06 18:58:43', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 104),
(1654, 1, '2020-09-06 18:58:43', 2000, 'Rice and Beans', 2000, 'Employee', 104),
(1655, 1, '2020-09-06 19:00:29', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 104),
(1656, 1, '2020-09-06 19:00:29', 2000, 'Rice and Beans', 2000, 'Employee', 104),
(1657, 1, '2020-09-06 19:03:26', 300, '5 Alive', 300, 'Employee', 105),
(1658, 23, '2020-09-06 19:03:26', 6900, '5 Alive', 300, 'Employee', 105),
(1659, 1, '2020-09-06 19:03:26', 2400, 'Red Velvet Copcakes', 2400, 'Employee', 105),
(1660, 27, '2020-09-06 19:03:26', 64800, 'Red Velvet Copcakes', 2400, 'Employee', 105),
(1661, 1, '2020-09-06 19:03:26', 1800, 'Chocolate Cake', 1800, 'Employee', 105),
(1662, 1, '2020-09-06 19:03:45', 2000, 'Rice and Beans', 2000, 'Employee', 106),
(1663, 1, '2020-09-06 19:04:35', 2000, 'Rice and Beans', 2000, 'Employee', 107),
(1664, 1, '2020-09-06 19:04:35', 1800, 'Chocolate Cake', 1800, 'Employee', 107),
(1665, 1, '2020-09-06 19:12:03', 1800, 'Chocolate Cake', 1800, 'Employee', 108),
(1666, 1, '2020-09-06 19:12:03', 2000, 'Rice and Beans', 2000, 'Employee', 108),
(1667, 1, '2020-09-06 19:12:23', 1800, 'Chocolate Cake', 1800, 'Employee', 108),
(1668, 1, '2020-09-06 19:12:23', 2000, 'Rice and Beans', 2000, 'Employee', 108),
(1669, 1, '2020-09-06 19:13:11', 2000, 'Rice and Beans', 2000, 'Employee', 109),
(1670, 1, '2020-09-06 19:13:11', 1800, 'Chocolate Cake', 1800, 'Employee', 109),
(1671, 1, '2020-09-06 19:13:30', 2000, 'Rice and Beans', 2000, 'Employee', 110),
(1672, 1, '2020-09-06 19:13:30', 1800, 'Chocolate Cake', 1800, 'Employee', 110),
(1673, 1, '2020-09-06 19:14:56', 2000, 'Rice and Beans', 2000, 'Employee', 111),
(1674, 1, '2020-09-06 19:15:13', 2000, 'Rice and Beans', 2000, 'Employee', 112),
(1675, 1, '2020-09-06 19:15:45', 1800, 'Chocolate Cake', 1800, 'Employee', 113),
(1676, 1, '2020-09-06 19:16:32', 2000, 'Rice and Beans', 2000, 'Employee', 114),
(1677, 1, '2020-09-06 19:16:32', 1800, 'Chocolate Cake', 1800, 'Employee', 114),
(1678, 1, '2020-09-06 19:20:30', 2000, 'Rice and Beans', 2000, 'Employee', 115),
(1679, 1, '2020-09-06 19:20:30', 1800, 'Chocolate Cake', 1800, 'Employee', 115),
(1680, 1, '2020-09-06 19:21:32', 1800, 'Chocolate Cake', 1800, 'Employee', 116),
(1681, 1, '2020-09-06 19:21:32', 2000, 'Rice and Beans', 2000, 'Employee', 116),
(1682, 1, '2020-09-06 19:22:19', 1800, 'Chocolate Cake', 1800, 'Employee', 117),
(1683, 1, '2020-09-06 19:22:19', 2000, 'Rice and Beans', 2000, 'Employee', 117),
(1684, 1, '2020-09-06 19:22:35', 1800, 'Chocolate Cake', 1800, 'Employee', 118),
(1685, 1, '2020-09-06 19:22:35', 2000, 'Rice and Beans', 2000, 'Employee', 118),
(1686, 1, '2020-09-06 19:25:24', 1800, 'Chocolate Cake', 1800, 'Employee', 119),
(1687, 1, '2020-09-06 19:25:24', 2000, 'Rice and Beans', 2000, 'Employee', 119),
(1688, 1, '2020-09-06 19:25:47', 1800, 'Chocolate Cake', 1800, 'Employee', 120),
(1689, 3, '2020-09-06 19:25:47', 6000, 'Rice and Beans', 2000, 'Employee', 120),
(1690, 1, '2020-09-06 19:26:58', 1800, 'Chocolate Cake', 1800, 'Employee', 121),
(1691, 1, '2020-09-06 19:26:58', 2000, 'Rice and Beans', 2000, 'Employee', 121),
(1692, 1, '2020-09-06 19:31:49', 2000, 'Rice and Beans', 2000, 'Hafs', 122),
(1693, 1, '2020-09-06 19:31:49', 1800, 'Chocolate Cake', 1800, 'Hafs', 122),
(1694, 1, '2020-09-06 19:49:03', 1800, 'Chocolate Cake', 1800, 'Samantha', 123),
(1695, 3, '2020-09-06 19:49:03', 6000, 'Rice and Beans', 2000, 'Samantha', 123),
(1696, 1, '2020-09-06 19:49:46', 1800, 'Chocolate Cake', 1800, 'Samantha', 123),
(1697, 2, '2020-09-06 19:49:46', 4000, 'Rice and Beans', 2000, 'Samantha', 123),
(1698, 1, '2020-09-06 19:50:16', 1800, 'Chocolate Cake', 1800, 'Samantha', 124),
(1699, 3, '2020-09-06 19:50:16', 6000, 'Rice and Beans', 2000, 'Samantha', 124),
(1700, 2, '2020-09-06 19:54:50', 3600, 'Chocolate Cake', 1800, 'Samantha', 125),
(1701, 3, '2020-09-06 19:54:50', 6000, 'Rice and Beans', 2000, 'Samantha', 125),
(1702, 3, '2020-09-06 19:56:55', 5400, 'Chocolate Cake', 1800, 'Samantha', 126),
(1703, 1, '2020-09-06 19:56:55', 2000, 'Rice and Beans', 2000, 'Samantha', 126),
(1704, 4, '2020-10-12 10:37:52', 8000, 'Rice and Beans', 2000, 'Kingabdul', 127),
(1705, 1, '2020-10-12 10:38:47', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 128),
(1706, 1, '2020-10-16 16:09:16', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 129),
(1707, 1, '2020-10-16 16:09:16', 2000, 'Rice and Beans', 2000, 'Kingabdul', 129),
(1708, 1, '2020-10-16 16:09:39', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 130),
(1709, 1, '2020-10-16 16:09:39', 2000, 'Rice and Beans', 2000, 'Kingabdul', 130),
(1710, 2, '2020-10-16 16:10:03', 3600, 'Chocolate Cake', 1800, 'Kingabdul', 131),
(1711, 1, '2020-10-16 16:12:58', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 132),
(1712, 2, '2020-10-16 16:12:58', 3600, 'Chocolate Cake', 1800, 'Kingabdul', 132),
(1713, 1, '2020-10-16 16:13:38', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 133),
(1714, 1, '2020-10-16 16:14:08', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 134),
(1715, 1, '2020-10-16 16:14:33', 1800, 'Chocolate Cake', 1800, 'Kingabdul', 135),
(1716, 4, '2020-10-17 15:34:00', 1200, '5 Alive', 300, 'Kingabdul', 136),
(1717, 1, '2020-11-02 04:37:40', 300, '5 Alive', 300, 'Kingabdul', 137),
(1718, 2, '2020-11-02 04:43:01', 600, '5 Alive', 300, 'Kingabdul', 138),
(1719, 2, '2020-11-02 04:44:28', 600, '5 Alive', 300, 'Kingabdul', 139),
(1720, 2, '2020-11-02 04:46:18', 600, '5 Alive', 300, 'Kingabdul', 140),
(1721, 1, '2020-11-02 04:49:49', 300, '5 Alive', 300, 'Kingabdul', 141),
(1722, 2, '2020-11-02 04:53:18', 600, '5 Alive', 300, 'Kingabdul', 142),
(1723, 1, '2020-11-02 04:54:35', 300, '5 Alive', 300, 'Kingabdul', 143),
(1724, 7, '2020-11-02 04:55:08', 2100, '5 Alive', 300, 'Kingabdul', 144),
(1725, 2, '2020-11-02 04:59:53', 600, '5 Alive', 300, 'Kingabdul', 145),
(1726, 2, '2020-11-02 05:38:59', 600, '5 Alive', 300, 'Kingabdul', 146),
(1727, 1, '2020-11-03 00:13:20', 300, '5 Alive', 300, 'Kingabdul', 147),
(1728, 2, '2020-11-03 00:13:59', 600, '5 Alive', 300, 'Kingabdul', 148),
(1729, 1, '2020-11-03 00:17:28', 300, '5 Alive', 300, 'Kingabdul', 149),
(1730, 14, '2020-11-03 00:25:32', 4200, '5 Alive', 300, 'Kingabdul', 150),
(1731, 8, '2020-11-03 00:25:32', 16000, 'Rice and Beans', 2000, 'Kingabdul', 150),
(1732, 9, '2020-11-03 00:27:57', 2700, '5 Alive', 300, 'Kingabdul', 151),
(1733, 3, '2020-11-03 00:27:57', 6000, 'Rice and Beans', 2000, 'Kingabdul', 151),
(1734, 2, '2020-11-03 00:30:43', 4000, 'Rice and Beans', 2000, 'Kingabdul', 152),
(1735, 3, '2020-11-03 00:30:43', 900, '5 Alive', 300, 'Kingabdul', 152),
(1736, 1, '2020-11-03 00:31:25', 300, '5 Alive', 300, 'Kingabdul', 153),
(1737, 1, '2020-11-03 00:31:26', 2000, 'Rice and Beans', 2000, 'Kingabdul', 153),
(1738, 1, '2020-11-03 00:32:37', 300, '5 Alive', 300, 'Kingabdul', 154),
(1739, 1, '2020-11-03 00:32:37', 2000, 'Rice and Beans', 2000, 'Kingabdul', 154),
(1740, 1, '2020-11-03 00:34:12', 300, '5 Alive', 300, 'Kingabdul', 155),
(1741, 1, '2020-11-03 00:40:22', 300, '5 Alive', 300, 'Kingabdul', 156),
(1742, 1, '2020-11-03 00:40:22', 2000, 'Rice and Beans', 2000, 'Kingabdul', 156),
(1743, 1, '2020-11-03 00:40:57', 300, '5 Alive', 300, 'Kingabdul', 156),
(1744, 1, '2020-11-03 00:41:40', 300, '5 Alive', 300, 'Kingabdul', 157),
(1745, 1, '2020-11-03 00:41:40', 2000, 'Rice and Beans', 2000, 'Kingabdul', 157),
(1746, 1, '2020-11-03 00:42:42', 2000, 'Rice and Beans', 2000, 'Kingabdul', 158),
(1747, 1, '2020-11-03 00:42:42', 300, '5 Alive', 300, 'Kingabdul', 158),
(1748, 9, '2020-11-03 00:43:45', 18000, 'Rice and Beans', 2000, 'Kingabdul', 159),
(1749, 2, '2020-11-03 00:43:45', 600, '5 Alive', 300, 'Kingabdul', 159),
(1750, 4, '2020-11-03 00:55:49', 8000, 'Rice and Beans', 2000, 'Kingabdul', 160),
(1751, 2, '2020-11-03 00:55:49', 600, '5 Alive', 300, 'Kingabdul', 160),
(1752, 1, '2020-11-03 02:48:48', 300, '5 Alive', 300, 'Kingabdul', 161),
(1753, 1, '2020-11-03 02:49:58', 2000, 'Rice and Beans', 2000, 'Kingabdul', 162),
(1754, 1, '2020-11-03 02:50:49', 2000, 'Rice and Beans', 2000, 'Kingabdul', 163),
(1755, 1, '2020-11-03 02:51:22', 300, '5 Alive', 300, 'Kingabdul', 164),
(1756, 1, '2020-11-03 02:51:54', 2000, 'Rice and Beans', 2000, 'Kingabdul', 165),
(1757, 2, '2021-07-09 23:13:18', 600, '5 Alive', 300, 'Kingabdul', 166),
(1758, 3, '2021-07-09 23:13:18', 6000, 'Rice and Beans', 2000, 'Kingabdul', 166),
(1759, 2, '2021-07-09 23:13:18', 2000, 'Shawarma', 1000, 'Kingabdul', 166),
(1760, 77, '2021-07-09 23:13:42', 77000, 'Shawarma', 1000, 'Kingabdul', 167),
(1761, 2, '2021-07-09 23:20:07', 2400, 'Jellof', 1200, 'Kingabdul', 168),
(1762, 1, '2021-07-09 23:20:07', 2000, 'Rice and Beans', 2000, 'Kingabdul', 168),
(1763, 1, '2021-07-09 23:20:07', 300, '5 Alive', 300, 'Kingabdul', 168),
(1764, 3, '2021-07-09 23:20:42', 3600, 'Jellof', 1200, 'Kingabdul', 169),
(1765, 4, '2021-07-09 23:41:01', 4800, 'Jellof', 1200, 'Kingabdul', 170),
(1766, 1, '2021-07-09 23:44:04', 1200, 'Jellof', 1200, 'Kingabdul', 171),
(1767, 3, '2021-07-10 00:05:25', 900, '5 Alive', 300, 'Kingabdul', 172),
(1768, 3, '2021-07-10 00:05:25', 5400, 'Chocolate Cake', 1800, 'Kingabdul', 172),
(1769, 5, '2021-07-10 00:05:25', 10000, 'Rice and Beans', 2000, 'Kingabdul', 172),
(1770, 2, '2021-07-10 00:05:25', 3600, 'Chocolate Cake', 1800, 'Kingabdul', 172),
(1771, 3, '2021-07-10 00:05:25', 6000, 'Rice and Beans', 2000, 'Kingabdul', 172),
(1772, 2, '2021-07-10 00:36:27', 3600, 'Chocolate Cake', 1800, 'Kingabdul', 173),
(1773, 2, '2021-07-10 00:36:27', 4000, 'Rice and Beans', 2000, 'Kingabdul', 173),
(1774, 3, '2021-07-10 17:59:17', 3600, 'Jellof', 1200, 'Kingabdul', 174),
(1775, 1, '2021-07-10 17:59:17', 300, '5 Alive', 300, 'Kingabdul', 174),
(1776, 2, '2021-07-10 17:59:17', 4000, 'Rice and Beans', 2000, 'Kingabdul', 174);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `size` varchar(50) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `qty`, `updated_at`, `size`, `reorder_level`, `unit_price`, `total_price`) VALUES
(20, 45, 1695, '2021-07-10 17:59:17', 'big', 8, 2000, 3490000),
(21, 42, 299, '2021-07-10 17:59:17', 'big', 2, 300, 103500),
(26, 46, 4, '2021-07-10 00:36:27', '', 2, 1800, 10800),
(27, 44, 2, '2021-07-10 17:59:17', '', 1, 1200, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `size` varchar(50) NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`id`, `product_id`, `user_id`, `qty`, `created_at`, `size`, `unit_price`, `total_price`) VALUES
(8, 42, 11, 50, '2020-09-06 17:28:38', 'big', 300, 15000),
(9, 43, 11, 10, '2020-09-06 17:31:40', 'big', 1000, 10000),
(10, 44, 11, 10, '2020-09-06 17:32:02', 'small', 1200, 12000),
(11, 45, 11, 50, '2020-09-06 18:22:49', 'big', 2000, 100000),
(12, 47, 11, 50, '2020-09-06 18:23:04', 'big', 2400, 120000),
(13, 46, 11, 50, '2020-09-06 18:23:16', 'big', 1800, 90000),
(14, 42, 10, 30, '2020-10-17 15:33:37', 'big', 300, 9000),
(15, 45, 10, 1745, '2020-11-03 00:23:47', 'big', 2000, 3490000),
(16, 42, 10, 345, '2020-11-03 00:24:02', 'big', 300, 103500),
(17, 43, 10, 79, '2021-07-09 23:12:21', 'big', 1000, 79000),
(18, 44, 10, 5, '2021-07-09 23:19:37', '', 1200, 6000),
(19, 44, 10, 5, '2021-07-09 23:40:45', '', 1200, 6000),
(20, 46, 10, 5, '2021-07-10 00:01:26', '', 1800, 9000),
(21, 46, 10, 6, '2021-07-10 00:11:19', '', 1800, 10800),
(22, 44, 10, 5, '2021-07-10 17:58:18', '', 1200, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `password`, `name`, `user_type_id`) VALUES
(10, 'king', '$2y$10$U1FE7T8uOybes.Nab.5WD.VHYoEW7uYCGXC7Yr9rPbi0Qt/CbwJGi', 'Kingabdul', 1),
(11, 'hafsat', '$2y$10$o6Hw2OTwbtXZSmXWvuQ5Je8MER5J6evQ59muuWNhzoG.iFvcgMu7q', 'Hafs', 1),
(12, 'emp1', '$2y$10$ggZoVUKBeRfTdgc9rIqZ0eHfKkqGeadfq00hTJjMDMfn8yPn44LCq', 'Employee', 2),
(13, 'samantha', '$2y$10$DVmR61xslnPigJvD14m4ku3YJ/2eDoAMizdClUs8a9oICEQ392EkG', 'Samantha', 2),
(14, 'Cashier', '$2y$10$2pjdbMMZbnkY0edPoI4bceTCn.o7Mlgg4ZQbWcOlNBdp424AmNbMC', 'Sale Girl', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`, `description`) VALUES
(1, 'super admin', 'Super Administrator '),
(2, 'cashier', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `vat_services`
--

CREATE TABLE `vat_services` (
  `id` int(11) NOT NULL,
  `vat_services` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vat_services`
--

INSERT INTO `vat_services` (`id`, `vat_services`, `invoice_no`, `date`) VALUES
(10, 230, 157, '2020-11-03 02:55:20'),
(11, 230, 158, '2020-11-03 02:55:20'),
(12, 1860, 159, '2020-11-03 02:55:20'),
(13, 860, 160, '2020-11-03 02:55:52'),
(14, 30, 161, '2020-11-03 04:48:55'),
(15, 200, 162, '2020-11-03 04:50:28'),
(16, 200, 163, '2020-11-03 04:51:05'),
(17, 30, 164, '2020-11-03 04:51:37'),
(18, 200, 165, '2020-11-03 04:52:29'),
(19, 860, 166, '2021-07-10 00:13:18'),
(20, 7700, 167, '2021-07-10 00:13:42'),
(21, 470, 168, '2021-07-10 00:20:07'),
(22, 360, 169, '2021-07-10 00:20:42'),
(23, 480, 170, '2021-07-10 00:41:01'),
(24, 120, 171, '2021-07-10 00:44:04'),
(25, 2590, 172, '2021-07-10 01:05:25'),
(26, 760, 173, '2021-07-10 01:36:27'),
(27, 790, 174, '2021-07-10 18:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `id` int(11) NOT NULL,
  `wage_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD KEY `IDX00000000920003` (`id`),
  ADD KEY `IDX000000009200004` (`category_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX000000009200010` (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX000000009200012` (`id`),
  ADD KEY `FK00000000920008` (`department_id`),
  ADD KEY `FK00000000920009` (`wages_id`);

--
-- Indexes for table `expensis`
--
ALTER TABLE `expensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920007` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920005` (`id`),
  ADD KEY `FK00000000920002` (`category_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX000000009200013` (`id`),
  ADD KEY `FK000000009200010` (`user_id`),
  ADD KEY `FK000000009200011` (`employee_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920006` (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920007` (`id`),
  ADD KEY `FK00000000920004` (`product_id`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920008` (`id`),
  ADD KEY `FK00000000920005` (`product_id`),
  ADD KEY `FK00000000920006` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920002` (`id`),
  ADD KEY `FK00000000920001` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX00000000920001` (`id`);

--
-- Indexes for table `vat_services`
--
ALTER TABLE `vat_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX000000009200011` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensis`
--
ALTER TABLE `expensis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1777;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vat_services`
--
ALTER TABLE `vat_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `FK00000000920008` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK00000000920009` FOREIGN KEY (`wages_id`) REFERENCES `wages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK00000000920002` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `FK000000009200010` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK000000009200011` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `FK00000000920004` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD CONSTRAINT `FK00000000920005` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK00000000920006` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK00000000920001` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
