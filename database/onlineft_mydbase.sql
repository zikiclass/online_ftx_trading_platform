-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2023 at 07:20 PM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineft_mydbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `front` varchar(300) NOT NULL,
  `back` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kyc_verification`
--

CREATE TABLE `kyc_verification` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `front` varchar(255) DEFAULT NULL,
  `back` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyc_verification`
--

INSERT INTO `kyc_verification` (`id`, `email`, `front`, `back`, `status`) VALUES
(7, 'john@gmail.com', 'assets/kyc/1684873865_1024.png', 'assets/kyc/1684873865_IMG_2499.jpg', 'VERIFIED');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `icon`, `status`) VALUES
(1, 'Congratulations, your changes have been successfully saved.', 'fa fa-check', 'Success'),
(2, 'An error occurred, please try again later.', 'fa fa-times\r\n', 'Errors'),
(4, 'Please be mindful bro', 'fa fa-exclamation-triangle', 'Warning'),
(5, 'The upload is working fine bro', 'fa fa-check', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `email`, `title`, `date`, `message`, `status`) VALUES
(43, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:19:57', 'Your deposit of 777 BTC has been received and will been credited soon', 'READ'),
(42, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:18:49', 'Your deposit of 890 USDT has been received and will been credited soon', 'READ'),
(41, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:12:50', 'Your deposit of 780 ETH has been received and will been credited soon', 'READ'),
(44, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:20:26', 'Your deposit of 780 USDT has been received and will been credited soon', 'READ'),
(45, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:20:58', 'Your deposit of 345 USDT has been received and will been credited soon', 'READ'),
(46, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:40:34', 'Your deposit of 7890 USDT has been received and will been credited soon', 'READ'),
(47, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:41:20', 'Your deposit of 890 DODGE has been received and will been credited soon', 'READ'),
(48, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:46:12', 'Your deposit of 345 BTC has been received and will been credited soon', 'READ'),
(49, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:48:14', 'Your deposit of 670 USDT has been received and will been credited soon', 'READ'),
(50, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:57:00', 'Your deposit of 670 ETH has been received and will been credited soon', 'READ'),
(51, 'john@gmail.com', 'DEPOSIT', '2023-05-19 22:58:04', 'Your deposit of 789 USDT has been received and will been credited soon', 'READ'),
(52, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:00:38', 'Your deposit of 890 DODGE has been received and will been credited soon', 'READ'),
(53, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:03:33', 'Your deposit of 890 BTC has been received and will been credited soon', 'READ'),
(54, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:04:54', 'Your deposit of 7800 USDT has been received and will been credited soon', 'READ'),
(55, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:05:21', 'Your deposit of 45 DODGE has been received and will been credited soon', 'READ'),
(56, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:06:00', 'Your deposit of 34 ETH has been received and will been credited soon', 'READ'),
(57, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:07:20', 'Your deposit of 456 USDT has been received and will been credited soon', 'READ'),
(58, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:18:31', 'Your deposit of 890 USDT has been received and will been credited soon', 'READ'),
(59, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:20:15', 'Your deposit of 900 ETH has been received and will been credited soon', 'READ'),
(60, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:21:56', 'Your deposit of 8900 DODGE has been received and will been credited soon', 'READ'),
(61, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:28:38', 'Your deposit of 788 BTC has been received and will been credited soon', 'READ'),
(62, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:30:32', 'Your deposit of 899 ETH has been received and will been credited soon', 'READ'),
(63, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:31:16', 'Your deposit of 899 DODGE has been received and will been credited soon', 'READ'),
(64, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:32:03', 'Your deposit of 88 ETH has been received and will been credited soon', 'READ'),
(65, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:32:34', 'Your deposit of 777 USDT has been received and will been credited soon', 'READ'),
(66, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:35:34', 'Your deposit of 900 ETH has been received and will been credited soon', 'READ'),
(67, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:36:04', 'Your deposit of 988 USDT has been received and will been credited soon', 'READ'),
(68, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:37:25', 'Your deposit of 788 ETH has been received and will been credited soon', 'READ'),
(69, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:39:27', 'Your deposit of 345 DODGE has been received and will been credited soon', 'READ'),
(70, 'john@gmail.com', 'DEPOSIT', '2023-05-19 23:40:13', 'Your deposit of 788 ETH has been received and will been credited soon', 'READ'),
(99, 'john@gmail.com', 'WITHDRAW', '2023-05-24 19:10:13', 'Your withdrawal of £700 has been approved and a mail will be sent to you from one of our agent. Thanks for your patience', 'UNREAD'),
(98, 'john@gmail.com', 'WITHDRAW', '2023-05-24 12:20:07', 'Your withdrawal of 700 £ has been initiated and will been treated immediately', 'UNREAD'),
(97, 'john@gmail.com', 'WITHDRAW', '2023-05-24 12:14:07', 'Your withdrawal of 890 £ has been initiated and will been treated immediately', 'UNREAD'),
(96, 'john@gmail.com', 'DEPOSIT', '2023-05-23 21:45:07', 'Your deposit of 670 BTC has been initiated and will been credited soon once confirmed', 'UNREAD'),
(95, 'john@gmail.com', 'DEPOSIT', '2023-05-23 21:42:55', 'Your deposit of 45000 BTC has been initiated and will been credited soon once confirmed', 'UNREAD'),
(77, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:17:48', 'Your deposit of 670 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(78, 'collins@gmail.com', 'WITHDRAW', '2023-05-20 20:20:03', 'Your withdrawal of 1890 $ has been initiated and will been treated immediately', 'UNREAD'),
(79, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:21:23', 'Your deposit of 4509 DODGE has been initiated and will been credited soon once confirmed', 'UNREAD'),
(80, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:23:44', 'Your deposit of 788 DODGE has been initiated and will been credited soon once confirmed', 'UNREAD'),
(81, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:31:23', 'Your deposit of 6700 DODGE has been initiated and will been credited soon once confirmed', 'UNREAD'),
(82, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:34:21', 'Your deposit of 7899 ETH has been initiated and will been credited soon once confirmed', 'UNREAD'),
(83, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:37:01', 'Your deposit of 677 BTC has been initiated and will been credited soon once confirmed', 'UNREAD'),
(84, 'collins@gmail.com', 'WITHDRAW', '2023-05-20 20:38:18', 'Your withdrawal of 5667 $ has been initiated and will been treated immediately', 'UNREAD'),
(85, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 20:38:36', 'Your deposit of 566 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(86, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:10:11', 'Your deposit of 445 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(87, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:11:07', 'Your deposit of 5666 ETH has been initiated and will been credited soon once confirmed', 'UNREAD'),
(88, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:35:11', 'Your deposit of 789 DODGE has been initiated and will been credited soon once confirmed', 'UNREAD'),
(89, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:41:15', 'Your deposit of 690 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(90, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:42:50', 'Your deposit of 890 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(91, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:44:56', 'Your deposit of 900 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(92, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:48:58', 'Your deposit of 788 ETH has been initiated and will been credited soon once confirmed', 'UNREAD'),
(93, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:51:24', 'Your deposit of 678 ETH has been initiated and will been credited soon once confirmed', 'UNREAD'),
(94, 'collins@gmail.com', 'DEPOSIT', '2023-05-20 21:51:47', 'Your deposit of 233 BTC has been initiated and will been credited soon once confirmed', 'UNREAD'),
(100, 'john@gmail.com', 'WITHDRAW', '2023-05-24 19:29:37', 'Your withdrawal of £890 has been approved and a mail will be sent to you from one of our agent. Thanks for your patience', 'UNREAD'),
(101, 'edafeshedrach2022@gmail.com', 'WITHDRAW', '2023-05-25 12:52:00', 'Your withdrawal of 7000 $ has been initiated and will been treated immediately', 'UNREAD'),
(102, 'edafeshedrach2022@gmail.com', 'DEPOSIT', '2023-05-25 12:56:08', 'Your deposit of 670 BTC has been initiated and will been credited soon once confirmed', 'UNREAD'),
(103, 'rosafetrade@gmail.com', 'WITHDRAW', '2023-05-27 18:30:08', 'Your withdrawal of 100 £ has been initiated and will been treated immediately', 'UNREAD'),
(104, 'rosafetrade@gmail.com', 'DEPOSIT', '2023-05-27 18:55:33', 'Your deposit of 600 USDT has been initiated and will been credited soon once confirmed', 'UNREAD'),
(105, 'rosafetrade@gmail.com', 'WITHDRAW', '2023-05-27 19:05:18', 'Your withdrawal of 300 £ has been initiated and will been treated immediately', 'UNREAD');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `btc` varchar(255) NOT NULL,
  `eth` varchar(255) NOT NULL,
  `tether` varchar(255) NOT NULL,
  `dogecoin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `btc`, `eth`, `tether`, `dogecoin`) VALUES
(1, '18GE3cE7HwYKYkk7Zpmr7NTbuXWsRKahvs', '0xe1f074d293C1a273FF4FBFA049A10AE5C6140051', 'THANwth3MtAjUERjd8uiqve5o8pbvonNan', 'DCkKAPcmYXLx89wTah1wJxTWP5WSBp3Feo');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `enddate` varchar(250) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `bonus` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transact_type` varchar(100) NOT NULL,
  `paymentmethod` varchar(100) DEFAULT NULL,
  `wallettype` varchar(255) DEFAULT NULL,
  `walletaddr` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `acctname` varchar(255) DEFAULT NULL,
  `acctnumber` varchar(100) DEFAULT NULL,
  `swiftcode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `email`, `amount`, `date`, `status`, `transact_type`, `paymentmethod`, `wallettype`, `walletaddr`, `bankname`, `acctname`, `acctnumber`, `swiftcode`) VALUES
(38, 'john@gmail.com', '780', '2023-05-19 22:12:50', 'PENDING', 'withdraw', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'john@gmail.com', '890', '2023-05-19 22:18:49', 'APPROVED', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'john@gmail.com', '777', '2023-05-19 22:19:57', 'APPROVED', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'john@gmail.com', '780', '2023-05-19 22:20:26', 'APPROVED', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'john@gmail.com', '345', '2023-05-19 22:20:58', 'APPROVED', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'john@gmail.com', '7890', '2023-05-19 22:40:34', 'APPROVED', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'john@gmail.com', '890', '2023-05-19 22:41:20', 'APPROVED', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'john@gmail.com', '345', '2023-05-19 22:46:12', 'APPROVED', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'john@gmail.com', '670', '2023-05-19 22:48:14', 'APPROVED', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'john@gmail.com', '670', '2023-05-19 22:57:00', 'APPROVED', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'john@gmail.com', '789', '2023-05-19 22:58:04', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'john@gmail.com', '890', '2023-05-19 23:00:38', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'john@gmail.com', '890', '2023-05-19 23:03:33', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'john@gmail.com', '7800', '2023-05-19 23:04:54', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'john@gmail.com', '45', '2023-05-19 23:05:21', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'john@gmail.com', '34', '2023-05-19 23:06:00', 'APPROVED', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'john@gmail.com', '456', '2023-05-19 23:07:20', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'john@gmail.com', '890', '2023-05-19 23:18:31', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'john@gmail.com', '900', '2023-05-19 23:20:15', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'john@gmail.com', '8900', '2023-05-19 23:21:56', 'APPROVED', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'john@gmail.com', '788', '2023-05-19 23:28:38', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'john@gmail.com', '899', '2023-05-19 23:30:32', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'john@gmail.com', '899', '2023-05-19 23:31:16', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'john@gmail.com', '88', '2023-05-19 23:32:03', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'john@gmail.com', '777', '2023-05-19 23:32:34', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'john@gmail.com', '900', '2023-05-19 23:35:34', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'john@gmail.com', '988', '2023-05-19 23:36:04', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'john@gmail.com', '788', '2023-05-19 23:37:25', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'john@gmail.com', '345', '2023-05-19 23:39:27', 'APPROVED', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'john@gmail.com', '788', '2023-05-19 23:40:13', 'APPROVED', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'collins@gmail.com', '670', '2023-05-20 20:17:47', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'collins@gmail.com', '1890', '2023-05-20 20:20:03', 'PENDING', 'withdraw', 'Bank Account', 'Bitcoin', NULL, NULL, NULL, NULL, NULL),
(76, 'collins@gmail.com', '4509', '2023-05-20 20:21:23', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'collins@gmail.com', '788', '2023-05-20 20:23:44', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'collins@gmail.com', '6700', '2023-05-20 20:31:23', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'collins@gmail.com', '7899', '2023-05-20 20:34:21', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'collins@gmail.com', '677', '2023-05-20 20:37:01', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'collins@gmail.com', '5667', '2023-05-20 20:38:18', 'PENDING', 'withdraw', 'Crypto Wallet', 'Bitcoin', NULL, NULL, NULL, NULL, NULL),
(82, 'collins@gmail.com', '566', '2023-05-20 20:38:36', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'collins@gmail.com', '445', '2023-05-20 21:10:11', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'collins@gmail.com', '5666', '2023-05-20 21:11:07', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'collins@gmail.com', '789', '2023-05-20 21:35:11', 'PENDING', 'deposit', 'Dogecoin (DODGE)', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'collins@gmail.com', '690', '2023-05-20 21:41:14', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'collins@gmail.com', '890', '2023-05-20 21:42:50', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'collins@gmail.com', '900', '2023-05-20 21:44:56', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'collins@gmail.com', '788', '2023-05-20 21:48:58', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'collins@gmail.com', '678', '2023-05-20 21:51:24', 'PENDING', 'deposit', 'Ethereum (ETH)', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'collins@gmail.com', '233', '2023-05-20 21:51:47', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'john@gmail.com', '45000', '2023-05-23 21:42:55', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'john@gmail.com', '670', '2023-05-23 21:45:07', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'john@gmail.com', '890', '2023-05-24 12:14:07', 'APPROVED', 'withdraw', 'Crypto Wallet', 'Bitcoin', 'gddgdhdg', NULL, NULL, NULL, NULL),
(95, 'john@gmail.com', '700', '2023-05-24 12:20:07', 'APPROVED', 'withdraw', 'Crypto Wallet', 'Bitcoin', 'dfsdf', NULL, NULL, NULL, NULL),
(96, 'edafeshedrach2022@gmail.com', '7000', '2023-05-25 12:52:00', 'PENDING', 'withdraw', 'Crypto Wallet', 'Bitcoin', '18GE3cE7HwYKYkk7Zpmr7NTbuXWsRKahvs', NULL, NULL, NULL, NULL),
(97, 'edafeshedrach2022@gmail.com', '670', '2023-05-25 12:56:08', 'PENDING', 'deposit', 'Bitcoin (BTC)', NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'rosafetrade@gmail.com', '100', '2023-05-27 18:30:08', 'PENDING', 'withdraw', 'Crypto Wallet', 'Bitcoin', 'Isisisu', NULL, NULL, NULL, NULL),
(99, 'rosafetrade@gmail.com', '600', '2023-05-27 18:55:33', 'PENDING', 'deposit', 'Tether - trc20 (USDT)', NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'rosafetrade@gmail.com', '300', '2023-05-27 19:05:18', 'PENDING', 'withdraw', 'Crypto Wallet', 'Bitcoin', 'Jjjj', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invested` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `bonus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '$',
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `level` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BASIC',
  `email_verification_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email_verification_code` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspend_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'OFF',
  `ref_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `withdrawal_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transfer_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdrawal_message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `with_msg_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IPAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `phone`, `country`, `profit`, `invested`, `bonus`, `status`, `date`, `currency`, `password`, `message`, `level`, `email_verification_link`, `email_verification_code`, `suspend_status`, `ref_email`, `role`, `withdrawal_code`, `transfer_code`, `withdrawal_message`, `with_msg_type`, `IPAddress`) VALUES
(64, 'bitmextrades27@gmail.com', 'Ian', '08160758478', 'Austria', '0', '0', '0', 'APPROVED', 'Sun, Jul 25 2021 05:34:24 PM', '$', '$2y$10$GuMioRnuyGLvzGMHPPzIX.FOv8BsmHYP4mjxaw6koamJC/WYZJ8Mm', '', '340', 'b5a7fa21010b119c5ed398aa9c55ca23', NULL, 'OFF', '', '0', '', '', '', '', ''),
(65, 'frank@gmail.com', 'Frank', '09087786656', 'Albania', '0.00', '0', '0', 'APPROVED', '2023-05-16 20:12:10', '£', '$2y$10$.1nd.ZpLC8cMESa3hSwGj.0OIpM6KBeRxazo2VY7aUQMCrsysdilO', '', '', 'onlineftxtrading.com/frank@gmail.com', NULL, 'OFF', 'frankfrank', '0', '', '', '', '', ''),
(68, 'martins@gmail.com', 'Martins', '09899988', 'Argentina', '0.00', '0', '0', 'APPROVED', '2023-05-16 22:10:38', '$', '$2y$10$aEjxyV/5tKYr5qOBsadka.sV6GBdot0b0sNZndoeYEyJBEYruIdS6', '', '', 'onlineftxtrading.com/$2y$10$DTnKppGhgFD5vLFklSyb1.qSM/xGHmtf3TKR3B4H7rK4LdidWT5cS', NULL, 'OFF', NULL, '0', '', '', '', '', ''),
(70, 'john@gmail.com', 'John', '09086685578', 'Benin City', '1000', '4000', '340', 'APPROVED', '2023-05-16 23:14:16', '£', '$2y$10$7WWG84/LdwEZjJri1um63emLSV6bj4wi26KNEmwDhRHwRaBZrOY32', '', '', 'onlineftxtrading.com/$2y$10$cawcb1ihP0zIsDuCimPgsOtil03tOXO7ILw4/WYjzrD.tN3vK69Mq', NULL, 'OFF', NULL, '0', 'CODEWITH', 'CODE-TRANS', 'Congratulation, your withdrawal is successful.', 'success', ''),
(80, 'account@gmail.com', 'account2', '0908777877', 'Uganda', '560', '45000', '1200', 'APPROVED', '2023-05-20 23:32:44', '£', '$2y$10$AKZS4Nt81z2ntRsTXebVzu/GYhTMK5M6V/yDcQ7drw9xXEPrYpbGy', '', 'Standard', 'onlineftxtrading.com/$2y$10$AKZS4Nt81z2ntRsTXebVzu/GYhTMK5M6V/yDcQ7drw9xXEPrYpbGy', NULL, 'OFF', NULL, '1', 'dfs', 'sdf', 'All withdrwa', '', ''),
(81, 'edafeshedrach2022@gmail.com', 'Tggd', '0899393&', 'None', '300000', '2000', '0', 'APPROVED', '2023-05-25 12:28:41', '$', '$2y$10$ZKLr/UNQKnE71V8fx8QM.eAfOkVHOQfVJpGWXeexPpCuEYvN7jqRi', '', 'Standard', 'onlineftxtrading.com/$2y$10$ZKLr/UNQKnE71V8fx8QM.eAfOkVHOQfVJpGWXeexPpCuEYvN7jqRi', NULL, 'OFF', NULL, '0', NULL, NULL, 'WITHDRAWAL SENT', 'success', ''),
(82, 'france@gmail.com', 'France', '09086555', 'Andorra', '0.00', '0', '0', 'APPROVED', '2023-05-25 12:29:18', '$', '$2y$10$Sqi3LfUg7HCsrKneDjBtE.QsagADCGec6UrudSlwxRsVLG8AOowiq', '', 'Standard', 'onlineftxtrading.com/$2y$10$Sqi3LfUg7HCsrKneDjBtE.QsagADCGec6UrudSlwxRsVLG8AOowiq', NULL, 'OFF', NULL, '0', NULL, NULL, NULL, NULL, ''),
(83, 'michael@gmail.com', 'Michael', '09086686675', 'Australia', '0.00', '0', '0', 'APPROVED', '2023-05-26 09:02:27', '£', '$2y$10$bLS.wsrzxSTKYsA8dFLVEealhQFUCRdFM/dV3l5omIf.ewsNl69dK', '', 'Standard', 'onlineftxtrading.com/$2y$10$bLS.wsrzxSTKYsA8dFLVEealhQFUCRdFM/dV3l5omIf.ewsNl69dK', NULL, 'OFF', NULL, '0', NULL, NULL, NULL, NULL, ''),
(84, 'naba03943@gmail.com', 'Syrin', '0694059211', 'French Guiana', '0.00', '0', '0', 'APPROVED', '2023-05-26 09:12:22', '€', '$2y$10$j9ZsB3UXgdGarU12dZZjfOc6I.Iu40je1ziuLyzTLd2VTRGhdbM1i', '', 'Standard', 'onlineftxtrading.com/$2y$10$j9ZsB3UXgdGarU12dZZjfOc6I.Iu40je1ziuLyzTLd2VTRGhdbM1i', NULL, 'OFF', NULL, '0', NULL, NULL, NULL, NULL, ''),
(85, 'leasyrin23@gmail.com', 'Syrin Smith', '0694059211', 'None', '0.00', '0', '0', 'APPROVED', '2023-05-26 09:39:47', '$', '$2y$10$jjd/ZiLKutgjyZZS614cJuJWK8uLbG8pabfSilNVnH0GuRIinu0b.', '', 'Standard', 'onlineftxtrading.com/$2y$10$jjd/ZiLKutgjyZZS614cJuJWK8uLbG8pabfSilNVnH0GuRIinu0b.', NULL, 'OFF', NULL, '0', NULL, NULL, NULL, NULL, ''),
(95, 'raphaelvaleroy@gmail.com', 'VALEROY', '0766142146', 'France', '0.00', '0', '0', 'PENDING', '2023-05-27 06:56:38', '€', '$2y$10$8BIfFGgD2bfC/ZZsDzI7LuNmYRjjaN8AazAicuEOUMQYUfBh5NgZS', '', 'Standard', 'onlineftxtrading.com/email=raphaelvaleroy@gmail.com', '14PUzM', 'OFF', 'raphaelvaleroy@gmail.com', '0', NULL, NULL, NULL, NULL, ''),
(96, 'raphael.valeroy@gmail.com', 'VALEROY', '0766142146', 'France', '0.00', '0', '0', 'PENDING', '2023-05-27 07:06:40', '€', '$2y$10$qjsgkVQayLrE1yp5idLEY.YCyuAe9BUr/e97HudPzYfKvREQ30Dfy', '', 'Standard', 'onlineftxtrading.com/email=raphael.valeroy@gmail.com', 'rRg1IU', 'OFF', 'raphael.valeroy@gmail.com', '0', NULL, NULL, NULL, NULL, ''),
(97, 'rosafetrade@gmail.com', 'Rosafe', '09085585575', 'Australia', '780', '779', '8900', 'APPROVED', '2023-05-27 09:16:16', '£', '$2y$10$2swuc7fLN4Fg.wN3YLXHReAfrNGgYg5ULYDFobhe6zo/aADXB6pf6', '', 'Standard', 'onlineftxtrading.com/email=rosafetrade@gmail.com', 'Un6VXn', 'OFF', NULL, '0', NULL, NULL, 'Withdrawal pending! One of our agent will communicate with you shortly', 'success', '197.210.84.28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_verification`
--
ALTER TABLE `kyc_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kyc_verification`
--
ALTER TABLE `kyc_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
