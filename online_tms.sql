-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 10:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `updatedate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-05-02 18:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `packageid` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `fromdate` varchar(255) NOT NULL,
  `todate` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `cancellby` varchar(255) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `packageid`, `useremail`, `fromdate`, `todate`, `comment`, `regdate`, `status`, `cancellby`, `updatedate`) VALUES
(1, '1', 'overcastmoon@gmail.com', '2020-05-04', '2020-05-06', 'urgent needed', '2020-05-04 07:31:41', '2', 'a', '2020-05-04 07:31:41'),
(2, '2', 'overcastmoon@gmail.com', '2020-05-03', '2020-05-07', 'urgent needed', '2020-05-04 07:46:12', '1', '', '2020-05-04 07:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquery`
--

CREATE TABLE `tbl_inquery` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquery`
--

INSERT INTO `tbl_inquery` (`id`, `fullname`, `email`, `mobile`, `subject`, `description`, `postingdate`, `status`) VALUES
(1, 'Md Mahfujur Rahman', 'overcastmoon@gmail.com', '01925555115', 'subject', 'description', '2020-05-03 16:57:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issu`
--

CREATE TABLE `tbl_issu` (
  `id` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adminremark` text NOT NULL,
  `remarkdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_issu`
--

INSERT INTO `tbl_issu` (`id`, `useremail`, `issue`, `description`, `postingdate`, `adminremark`, `remarkdate`) VALUES
(1, 'overcastmoon@gmail.com', 'Booking Issues', 'Please help me for this criteria . ', '2020-05-04 08:47:02', 'remark', '2020-05-04 08:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `type`, `details`) VALUES
(1, 'terms', 'Help protect your website and its users with clear and fair website terms and conditions. These terms and conditions for a website set out key issues such as acceptable use, privacy, cookies, registration and passwords, intellectual property, links to other sites, termination and disclaimers of responsibility. Terms and conditions are used and necessary to protect a website owner from liability of a user relying on the information or the goods provided from the site then suffering a loss.\r\n\r\nMaking your own terms and conditions for your website is hard, not impossible, to do. It can take a few hours to few days for a person with no legal background to make. But worry no more; we are here to help you out.\r\n\r\nAll you need to do is fill up the blank spaces and then you will receive an email with your personalized terms and conditions.'),
(2, 'privacy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n'),
(3, 'aboutus', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n'),
(4, 'contact', 'test<div>test 2&nbsp; &nbsp;</div><h2 style=\"margin: 0px 0px 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><div>test two</div><div>test data test data&nbsp;</div><div>test<div>test 2&nbsp; &nbsp;</div><h2 style=\"font-family: DauphinPlain; line-height: 24px; color: rgb(0, 0, 0); margin: 0px 0px 10px; font-size: 24px; padding: 0px;\">Where can I get some?</h2><div>test two</div><div style=\"text-align: right; \">test data test data&nbsp;</div></div>											\r\n																						\r\n																						\r\n																						\r\n											');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tourpackage`
--

CREATE TABLE `tbl_tourpackage` (
  `id` int(11) NOT NULL,
  `packagename` varchar(255) NOT NULL,
  `packagetype` varchar(20) NOT NULL,
  `packagelocation` varchar(20) NOT NULL,
  `pakageprice` varbinary(255) NOT NULL,
  `packagefetures` text NOT NULL,
  `packagedetails` text NOT NULL,
  `packageimage` varchar(255) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tourpackage`
--

INSERT INTO `tbl_tourpackage` (`id`, `packagename`, `packagetype`, `packagelocation`, `pakageprice`, `packagefetures`, `packagedetails`, `packageimage`, `createdate`, `updatedate`) VALUES
(1, 'Sajek tour 2', 'Family Package', 'Sajek', 0x313030, 'pickup to drop', 'test demo texttest demo texttest demo texttest demo texttest demo text', '6.jpg', '2020-05-04 08:14:29', '2020-05-04 08:14:29'),
(2, 'Sain Martine', 'Family', 'Saint Martine', 0x313230, 'pick and dropp ', 'test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details test details ', 'HD-Wallpapers-Of-Sachin-Tendulkar-018.jpg', '2020-05-02 19:23:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upda` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `mobile`, `email`, `password`, `regdate`, `upda`) VALUES
(1, 'Md Mahfujur Rahman', '01521202373', 'overcastmoon@gmail.com', '4d0920dae8dc8c37564bfdcecbf23d1d', '2020-05-02 20:04:51', '2020-05-02 20:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inquery`
--
ALTER TABLE `tbl_inquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_issu`
--
ALTER TABLE `tbl_issu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tourpackage`
--
ALTER TABLE `tbl_tourpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inquery`
--
ALTER TABLE `tbl_inquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_issu`
--
ALTER TABLE `tbl_issu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_tourpackage`
--
ALTER TABLE `tbl_tourpackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
