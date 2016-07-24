-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2016 at 09:20 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `kokan_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'tour', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `meta_keyword`
--

CREATE TABLE IF NOT EXISTS `meta_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descending` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `meta_keyword`
--

INSERT INTO `meta_keyword` (`id`, `keyword`, `title`, `descending`, `status`, `image`) VALUES
(20, 'zzsadasd', 'sdsd', 'afwew', '0', ''),
(22, 'hotel', 'hotel', 'hotel', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `type`, `status`, `action`) VALUES
(4, 'aaa', 'sss', '1', 'aaa'),
(5, 'sssss', 'sss', '1', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE IF NOT EXISTS `tbl_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `question`, `answer`, `category_name`, `status`) VALUES
(11, 'sssss', '<p><em>dsfsgsssfsffsdsf</em></p>\r\n', 'aaa', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_input`
--

CREATE TABLE IF NOT EXISTS `tbl_input` (
  `input_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  PRIMARY KEY (`input_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_input`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE IF NOT EXISTS `tbl_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `logo`, `status`) VALUES
(4, 'upload/new/logo/Desert.jpg', '0'),
(8, '../kokan/cropimage/logo/thumb_14eae057183507846bb3f541ce8cda97.jpg', '0'),
(6, '../kokan/cropimage/logo/thumb_68a82dd0115ff85ef57f696e1c0134e5.jpg', '0'),
(9, '../kokan/cropimage/logo/thumb_8df6d68e7f6e6d4d2a175cc5827e6edd.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `image`, `status`) VALUES
(33, '../kokan/cropimage/upload_images/thumb_b20593f2a9665a225eaac23e65123b6c.jpg', '0'),
(32, '../kokan/cropimage/upload_images/thumb_4bc251c580b768a6d1a8b58eac02922a.jpg', '1'),
(31, '../kokan/cropimage/upload_images/thumb_f58b81fb9e7a388df968dabfe19f9ce0.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_managment`
--

CREATE TABLE IF NOT EXISTS `user_managment` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_managment`
--

INSERT INTO `user_managment` (`user_id`, `user_name`, `email`, `user_role`, `status`) VALUES
(5, 'abcd1', 'abcd1@gmail.com', 'super user', '1'),
(6, 'deva123', 'abcd@gmail.com', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `user_role`) VALUES
(1, 'admin'),
(2, 'super user'),
(3, 'sub user');
