-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 06:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pws`
--

-- --------------------------------------------------------

--
-- Table structure for table `dose`
--

CREATE TABLE `dose` (
  `Dose_ID` int(11) NOT NULL,
  `Dose_Type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dose`
--

INSERT INTO `dose` (`Dose_ID`, `Dose_Type`) VALUES
(1, '১+১+১'),
(2, '১+০+০'),
(3, '০+০+১'),
(4, '১+০+১'),
(5, '০+১+০'),
(6, '১+১+১+১'),
(7, '১ টি ট্যাবলেট সকালে খাবেন'),
(8, '১ টি ট্যাবলেট দুপুরে খাবেন'),
(9, '১ টি ট্যাবলেট ঘুমানোর আগে খাবেন'),
(10, '১ টি ট্যাবলেট সকালে খাবেন ও ১ টি ট্যাবলে'),
(11, '১ চামচ দিনে ১ বার'),
(12, '১ চামচ দিনে ২ বার'),
(13, '১ চামচ দিনে ৩ বার'),
(14, '১ চামচ দিনে ৪ বার'),
(15, 'হাফ চামচ দিনে ১ বার'),
(16, 'হাফ চামচ দিনে ২ বার'),
(17, 'হাফ চামচ দিনে ৩ বার'),
(18, 'হাফ চামচ দিনে ৪ বার'),
(19, 'হাফ চামচ দিনে ৬ বার'),
(20, '১ ভায়াল মাংশে দিনে ১ বার'),
(21, '১ ভায়াল মাংশে দিনে ২ বার'),
(22, '১ ভায়াল মাংশে দিনে ৩ বার'),
(23, '১ ভায়াল শিরায় দিনে ১ বার'),
(24, '১ ভায়াল শিরায় দিনে ২ বার'),
(25, '১ ভায়াল শিরায় দিনে ৩ বার'),
(26, '১ অ্যাম্পল মাংশে দিনে ১ বার'),
(27, '১ অ্যাম্পল মাংশে দিনে ২ বার'),
(28, '১ অ্যাম্পল মাংশে দিনে ৩ বার'),
(29, '১ অ্যাম্পল শিরায় দিনে ১ বার'),
(30, '১ অ্যাম্পল শিরায় দিনে ২ বার'),
(31, '১ অ্যাম্পল শিরায় দিনে ৩ বার'),
(32, '২+০+২'),
(33, '২+২+২'),
(34, '২+২+২+২'),
(35, '২+২+২+২+২+২'),
(36, '২ চামচ দিনে ১ বার'),
(37, '২ চামচ দিনে ২ বার'),
(38, '২ চামচ দিনে ৩ বার'),
(39, '২ চামচ দিনে ৪ বার'),
(40, '২ চামচ দিনে ৫ বার'),
(41, '২ চামচ দিনে ৬ বার'),
(42, '১০ ফোঁটা দিনে ৩ বার'),
(43, '১ টি পায়খানার রাস্তায় দিবেন');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dose`
--
ALTER TABLE `dose`
  ADD PRIMARY KEY (`Dose_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dose`
--
ALTER TABLE `dose`
  MODIFY `Dose_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
