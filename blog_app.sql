-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 12:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `image`, `body`, `created_at`) VALUES
(6, 'ayodejiadekunle84', 'This Sunday is Promising to be exiciting and fun', 'ayo4.jpg', 'im just gonna keep my fingers crossed and pray that my prayers get answered cuz im in dire need of money to spend during the new week!', '3/1/2020 14:08:17'),
(16, 'ayodejiadekunle84', 'The weather is not favourable these days', 'ayo2.jpg', 'aim/ objectives are to become the UKâ€™s leading supplier for the provision of security, cleaning, and property management by providing efficient, effective and proactive personnel/staff for carrying out the highest standard of workmanship.\r\nSKYE FACILITIES MANAGEMENT absolutely understands that customers are our lifeblood, but equally, clients want our services to be proactive, pragmatic and tailored to their needs and requirements. SFM is always and ready to deliver on these points.', '3/5/2020 23:16:15'),
(17, 'ayodejiadekunle84', 'Watch out for the upcoming revival', 'ayo3.jpg', 'We offer services at competitive rates to clients throughout central Scotland and beyond. \r\nThis website illustrates a selection of services within the residential, commercial, and industrial and public sectors where we provide a broad range of facilities services.\r\nWe make sure that buildings and their services meet the needs of the people who work or lives in them. We manage services such as cleaning, property management, security and parking security to any organisation needing protection for their employees and their business e.g. manned guarding, event steward and stewardess, commercial buildings cleaning, construction site cleanup and sparkles, retail security, school porters etc.', '3/5/2020 23:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `register_table`
--

CREATE TABLE `register_table` (
  `id` int(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `pword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_table`
--

INSERT INTO `register_table` (`id`, `username`, `firstname`, `lastname`, `email`, `gender`, `pword`) VALUES
(12, 'opeyemi4', 'opeyemi', 'adekunle', 'opeyemi@gmail.com', 'female', 'wwwwwwww'),
(13, 'opeyemi4', 'opeyemi', 'adekunle', 'opeyemi@gmail.com', 'female', 'xxxxxxxx'),
(14, 'opeyemi4', 'opeyemi', 'adekunle', 'opeyemi@gmail.com', 'female', 'wwwwwwww'),
(15, 'geop44', 'george', 'mckenze', 'gmak@yahoo.com', 'male', 'qqqqqqqq'),
(16, 'ayodejiadekunle84', 'Ayodeji', 'Adekunle', 'ayodejiadekunle@gmail.com', 'male', 'qqqqqqqq'),
(17, 'ayodejiadekunle84', 'Ayodeji', 'Adekunle', 'ayodejiadekunle@gmail.com', 'male', 'qqqqqqqq'),
(18, 'Hadi3', 'Haddi', 'Sunday', 'haadi@yahoo.com', 'male', 'qqqqqqqq'),
(19, 'Hadi3', 'Haddi', 'Sunday', 'haadi@yahoo.com', 'male', 'wwwwwwww'),
(20, 'Hadi3', 'Haddi', 'Sunday', 'haadi@yahoo.com', 'male', 'wwwwwwww'),
(21, 'wemi34', 'wemimo', 'olatunji', 'wemimo3@yahoo.com', 'female', 'wwwwwwww'),
(22, 'ayodesh123', 'Ayodeji', 'Adekunle', 'ayodejiadekunle@gmail.com', 'male', 'bbbbbbbb'),
(23, 'ayodesh123', 'Ayodeji', 'Adekunle', 'ayodejiadekunle@gmail.com', 'male', 'cccccccc'),
(24, 'bayosala', 'adebayo', 'salami', 'bayosher@huncho.com', 'male', 'qqqqqqqq'),
(25, 'bayo22', 'bayo', 'west', 'bayokuk@gmail.com', 'male', 'qqqqqqqq'),
(26, 'bayo22', 'bayo', 'west', 'bayokuk@gmail.com', 'male', 'qqqqqqqq'),
(27, 'ayodejiadekunle84', 'Ayodeji', 'Adekunle', 'ayodejiadekunle@gmail.com', 'male', 'qqqqqqqq'),
(28, 'toks5', 'Toke', 'Yemitan', 'tokeyemi@yahoo.com', 'female', 'qqqqqqqq'),
(29, 'abdulhaadi21', 'abdulhaadi', 'dayo', 'abdulhaadi@gmal.com', 'male', '1234567890'),
(30, 'tayoyem', 'Tayo', 'Yemitan', 'tyemi@gmail.com', 'male', 'eeeeeeee'),
(31, 'tola14', 'Tolani', 'Atobatele', 'tolani@yahoo.com', 'female', 'wwwwwwww');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_table`
--
ALTER TABLE `register_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register_table`
--
ALTER TABLE `register_table`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
