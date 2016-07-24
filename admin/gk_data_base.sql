-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 05:38 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `green_konkan`
--

-- --------------------------------------------------------

--
-- Table structure for table `gk_advertise`
--

CREATE TABLE IF NOT EXISTS `gk_advertise` (
  `advertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `decs` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `authar` varchar(255) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`advertise_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gk_advertise`
--

INSERT INTO `gk_advertise` (`advertise_id`, `package_id`, `name`, `email`, `mobile`, `decs`, `image`, `authar`, `duration`, `status`) VALUES
(6, 0, 'snehal1', '', '', 'dddd', '', 'ddd', 'dddd', '0'),
(7, 0, 'devvv1', '', '', 'devvv', '', 'devvv', 'devvv', '1'),
(8, 0, 'Deva11', 'deva.shinde@yahoo.com', '97305019451', 'HI', '', 'Sagar', '1 Month', ''),
(9, 0, 'Dev', 'dev@gmail.com', '9730501945', 'Dev', '', 'Sagar', '1 Month', '1'),
(10, 0, 'Deva S', 'devvv@gmail.com', '9730501945', 'Dev', '', 'Sagar', '1 Month', '1'),
(11, 5, 'abcdd', 'abcd@gmail.com', '9856234578', 'Dev', '', 'abcdd', '200', '1'),
(12, 4, 'RRRR', 'RRRR@gmail.com', '9730501945', 'RRRR', '', 'RRRR', 'RRRR', '1'),
(13, 4, 'Deva', 'aaaa@gmail.com', '9730501945', 'hh', '', 'Sagar', '200', '1'),
(14, 4, 'Deva11', 'Deva11@gmail.com', '9730501945', 'Deva11', '', 'Deva11', 'Deva11', '1'),
(15, 4, 'Nagesh', 'Nagesh@gmail.com', '9730501945', 'Nagesh', '', 'Nagesh1', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gk_adv_images`
--

CREATE TABLE IF NOT EXISTS `gk_adv_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_id` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gk_adv_images`
--

INSERT INTO `gk_adv_images` (`id`, `adv_id`, `image_name`) VALUES
(3, '10', '3bc5ff8a4a021d7cad8bf6649189bb59_Hydrangeas.jpg'),
(2, '10', '76708ad28bbacf2d53f186a71ab7f062_IMG6667.JPG'),
(4, '11', '6c675a6d470f14cb859ead8dbae08e4b_Jellyfish.jpg'),
(5, '12', '5718d84ce70cbdcb8082d78e49d52235_Jellyfish.jpg'),
(6, '13', 'bf9dc5eb3b65e6e58ba689a4524dde8c_Desert.jpg'),
(7, '14', 'e5965c2c48ccca1e855693fd75096dae_Koala.jpg'),
(8, '15', 'e246f6b8272cd8d5caf6547f6b37ea34_Lighthouse.jpg'),
(9, '15', '83dbbc24d3829fc737a8dddc4cde84d8_Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gk_category`
--

CREATE TABLE IF NOT EXISTS `gk_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) NOT NULL,
  `category_image` text NOT NULL,
  `type` varchar(150) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `severity` enum('1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `gk_category`
--

INSERT INTO `gk_category` (`category_id`, `category_name`, `category_image`, `type`, `status`, `severity`) VALUES
(8, 'forts', '', 'forts', '1', '1'),
(9, 'beaches', '', 'beaches', '1', '1'),
(10, 'waterfall', '', 'waterfall', '1', '1'),
(11, 'temples \\ spirituals', '', 'temples \\ spirituals', '1', '1'),
(12, 'temples \\ spirituals', '', 'temples \\ spirituals', '1', '1'),
(13, 'Hill station', '', 'Hill station', '1', '1'),
(14, 'sanctuary', '', 'sanctuary', '', '1'),
(15, 'historiacal places', '', 'historiacal places', '1', '1'),
(22, 's', 'upload/category/Hydrangeas.jpg', 's', '1', '1'),
(25, 'Mangesh', 'upload/category/Koala.jpg', 'Mangesh', '1', '1'),
(26, 'sssss', 'upload/category/Chrysanthemum.jpg', 'sss', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gk_contact_us`
--

CREATE TABLE IF NOT EXISTS `gk_contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `phone` varchar(50) NOT NULL,
  `query` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `gk_contact_us`
--

INSERT INTO `gk_contact_us` (`contact_id`, `name`, `email`, `password`, `status`, `phone`, `query`) VALUES
(22, 'hotel111', 'hotel@infoo', 'hotel', '1', '9730501945', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `gk_faq`
--

CREATE TABLE IF NOT EXISTS `gk_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gk_faq`
--

INSERT INTO `gk_faq` (`faq_id`, `question`, `answer`, `category_name`, `status`) VALUES
(11, 'sssss11s', '<p><em>dsfsgsssfsffsdsf</em></p>\r\n', 'forts', '1'),
(13, 'Nageshhh', '<p>DDDDD</p>\r\n', 'historiacal places', '1'),
(14, 'Deva', '<p><strong>Devidas</strong></p>\r\n', 'forts', '1'),
(15, 'Abcddd', '<p>Abcddd</p>\r\n', 'sanctuary', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gk_landing_text`
--

CREATE TABLE IF NOT EXISTS `gk_landing_text` (
  `input_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`input_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gk_landing_text`
--

INSERT INTO `gk_landing_text` (`input_id`, `title`, `heading`, `status`) VALUES
(5, 'RRRRRR', '<p>dvsdfs</p>\r\n', '1'),
(6, '11111111111', '<h1>ABCD</h1>\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gk_logo`
--

CREATE TABLE IF NOT EXISTS `gk_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `gk_logo`
--

INSERT INTO `gk_logo` (`id`, `logo`, `status`) VALUES
(4, 'upload/new/logo/Desert.jpg', '0'),
(8, '../kokan/cropimage/logo/thumb_14eae057183507846bb3f541ce8cda97.jpg', '0'),
(6, '../kokan/cropimage/logo/thumb_68a82dd0115ff85ef57f696e1c0134e5.jpg', '0'),
(9, '../kokan/cropimage/logo/thumb_8df6d68e7f6e6d4d2a175cc5827e6edd.jpg', '0'),
(10, '../kokan/cropimage/logo/thumb_40061e14b3b02fd18943f2d36c0ab6b1.jpg', '0'),
(12, '../kokan/cropimage/logo/thumb_c2f417c244d117f4ccaa30fad2c7940c.jpg', '0'),
(13, '../kokan/cropimage/logo/thumb_903fc68740af3e0dc8df343198c8a2f3.jpg', '0'),
(14, '../green_konkan/cropimage/logo/thumb_37dd17acad00412e3f27b502478f123a.jpg', '1'),
(15, '../green_konkan/cropimage/logo/thumb_81de72d60629c730c4ee31bea53c7000.jpg', '0'),
(16, '../green_konkan/cropimage/logo/thumb_4e78456c9c2302d772ff46d1d7ad5f3a.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gk_most_visited_place`
--

CREATE TABLE IF NOT EXISTS `gk_most_visited_place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `placename` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gk_most_visited_place`
--

INSERT INTO `gk_most_visited_place` (`place_id`, `placename`, `description`, `address`, `location`, `status`) VALUES
(1, 'chipalun', 'chipalun', 'chipalun', 'chipalun', '0'),
(4, 'abcd', 'abcdabcdabcd', 'abcd', 'abcd', '0'),
(3, 'pune11', 'punepunepune11', 'pune11', 'pune11', '1'),
(5, '777', '77777777777777777777', '7777', '888', '0'),
(6, '8888', '8888888888888888', '8888', '8888', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gk_package`
--

CREATE TABLE IF NOT EXISTS `gk_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `pac_duration` varchar(50) NOT NULL,
  `package_cost` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gk_package`
--

INSERT INTO `gk_package` (`package_id`, `package_name`, `pac_duration`, `package_cost`, `status`) VALUES
(4, 'Platinum', '3 Month', '800', '1'),
(5, 'Gold', '2 Month', '500', '1'),
(6, 'Silver', '1 Month', '300', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gk_seo`
--

CREATE TABLE IF NOT EXISTS `gk_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descending` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `gk_seo`
--

INSERT INTO `gk_seo` (`id`, `keyword`, `title`, `descending`, `status`, `image`) VALUES
(27, 'Deva1', 'Deva1', 'Deva1', '1', ''),
(28, 'AAA', 'AAA', 'AAA', '1', ''),
(29, 'Dev', 'Dev', 'Dev', '1', ''),
(30, 'adasd', 'aaaa', '11', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `gk_slider`
--

CREATE TABLE IF NOT EXISTS `gk_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `gk_slider`
--

INSERT INTO `gk_slider` (`id`, `image`, `status`) VALUES
(33, '../kokan/cropimage/gk_slider_images/thumb_b20593f2a9665a225eaac23e65123b6c.jpg', '0'),
(32, '../kokan/cropimage/gk_slider_images/thumb_4bc251c580b768a6d1a8b58eac02922a.jpg', '0'),
(31, '../kokan/cropimage/gk_slider_images/thumb_f58b81fb9e7a388df968dabfe19f9ce0.jpg', '1'),
(38, '../kokan/cropimage/upload_images/thumb_28f3f75585e2ffd1f0d57ef01b8872c5.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gk_sub_category`
--

CREATE TABLE IF NOT EXISTS `gk_sub_category` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`sub_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gk_sub_category`
--

INSERT INTO `gk_sub_category` (`sub_category_id`, `sub_category`, `category_name`, `type`, `status`) VALUES
(1, 'gffdghthyd', 'instant', 'nnnnnnn', '1'),
(2, 'wdwdwd', 'instant', 'wdwd', '0'),
(3, 'a', 'instant', 'a', '1'),
(4, 'a', 'instant', 'a', '1'),
(5, 'addd', 'instant', 'dddd', '1'),
(6, 'dfgh', 'instant', 'hhhh', '1'),
(7, 'tyhybg', 'instant', 'th6j7', '1'),
(8, 'Dev122', 'waterfall', 'deva', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gk_users`
--

CREATE TABLE IF NOT EXISTS `gk_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gk_users`
--

INSERT INTO `gk_users` (`user_id`, `user_name`, `password`, `email`, `user_role`, `status`) VALUES
(6, 'deva', 'deva', 'abcd@gmail.com', 'admin', '1'),
(7, 'rajesh', 'rajesh', 'rajesh@gmail.com', 'super user', '1'),
(8, 'mangesh', 'mangesh', 'mangesh@gmail.com', 'sub user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `gk_user_role`
--

CREATE TABLE IF NOT EXISTS `gk_user_role` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gk_user_role`
--

INSERT INTO `gk_user_role` (`user_id`, `user_role`) VALUES
(1, 'admin'),
(2, 'super user'),
(3, 'sub user');
