-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 04:20 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siscom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`cart_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `cart_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `price` double(10,0) NOT NULL,
  `qty` int(10) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category`, `product_name`, `product_desc`, `price`, `qty`, `product_img`, `product_time`) VALUES
(1, '1', 'Wordscapes', 'This modern word game combines the best of word searching and crosswords for tremendous brain challenging fun!', 10, 1, 'wordscape.png', '2017-11-17 15:41:43'),
(2, '1', 'Bookworm', 'Bookworm is a word-forming computer puzzle game by PopCap Games. From a grid of available letters, players connect letters to form words.', 20, 1, 'bookworm.png', '2017-11-17 15:41:47'),
(3, '1', 'Hangaroo', 'Try to solve the phrase or the Kangaroo will be hanged.', 5, 1, 'hangaroo.png', '2017-11-17 15:41:55'),
(4, '1', 'Word Cookies', 'The best word searching puzzle game "Word Cookies" is here! Word Cookies is a simple. yet, exciting word searching puzzle game that literally makes you keep playing!', 10, 1, 'wordcookies.png', '2017-11-17 15:42:01'),
(5, '1', 'Texttwist', 'Twist and turn jumbled letters to make words. Look for patterns and put your vocabulary to the test in the fun!', 5, 1, 'texttwist.png', '2017-11-17 15:42:09'),
(6, '1', 'Merriam Websters Dictionary', 'Get Americas most useful and respected dictionary, optimized for your Android device. This is the best Android app for English language reference, education, and vocabulary building.', 20, 1, 'merriam.png', '2017-11-18 16:40:17'),
(7, '1', 'Stack the Countries', 'Pile up nations while you pile up geography knowledge.', 10, 1, 'stackthecountries.jpg', '2017-11-18 17:15:59'),
(8, '1', 'Math Board', 'Take multiplication, division, addition, and subtraction quizzes with customizable sizes, difficulty levels, and time limits.', 5, 1, 'mathboard.png', '2017-11-17 15:42:28'),
(9, '2', 'Lightbot', 'LightBot is a puzzle game based on coding, it secretly teaches you programming logic as you play!', 70, 1, 'lightbot.png', '2017-11-17 15:42:36'),
(10, '2', 'Spritebox', 'SpriteBox Coding is a full-blown adventure game that gets you coding.. Start from scratch by solving coding puzzles using icons. Over time, icons will give way to textual commands. In no time, you’ll be solving puzzles in a real programming language!', 60, 1, 'spritebox.png', '2017-11-17 15:42:41'),
(11, '2', 'Encarta', 'Microsoft Encarta was a digital multimedia encyclopedia published by Microsoft Corporation from 1993 to 2009. Originally available for sale on 2 to 4 CD-ROMs or a DVD, it was also later available on the World Wide Web via an annual subscription – although later many articles could also be viewed free online with advertisements. By 2008, the complete English version, Encarta Premium, consisted of more than 62,000 articles, numerous photos and illustrations, music clips, videos, interactive content, timelines, maps, atlases and homework tools.', 160, 1, 'encarta.png', '2017-11-17 15:42:45'),
(12, '2', 'WebAssign', 'WebAssign is the company and product name of an online instructional application for faculty and students.', 40, 1, 'webassign.png', '2017-11-17 15:42:51'),
(13, '2', 'MATLAB', 'MATLAB is a multi-paradigm numerical computing environment. A proprietary programming language developed by MathWorks, MATLAB allows matrix manipulations, plotting of functions and data, implementation of algorithms, creation of user interfaces, and interfacing with programs written in other languages, including C, C++, C#, Java, Fortran and Python.', 140, 1, 'matlab.png', '2017-11-17 15:42:58'),
(14, '2', 'Tux Typing', 'Tux Typing - is an open source typing tutor created especially for children. It features several different types of game play, at a variety of difficulty levels. It is designed to be fun and to improve words per minute speed of typists.', 30, 1, 'tuxtyping.png', '2017-11-17 15:43:03'),
(15, '2', 'BlueJ', 'BlueJ is an integrated development environment (IDE) for the Java programming language, developed mainly for educational purposes, but also suitable for small-scale software development. It runs with the help of JDK (Java Development Kit).', 110, 1, 'bluej.png', '2017-11-17 15:43:09'),
(16, '2', 'RoboMind', 'RoboMind is a simple educational programming environment with its own scripting language that allows beginners to learn the basics of computer science by programming a simulated robot. In addition to introducing common programming techniques, it also aims at offering insights in robotics and artificial intelligence. RoboMind is available as stand-alone application for Windows, Linux and Mac OS X. It was first released in 2005 and was originally developed by Arvid Halma, a student of the University of Amsterdam at that time. Since 2011 RoboMind is published by Research Kitchen.', 100, 1, 'robomind.png', '2017-11-17 15:43:15'),
(17, '3', 'Lenovo', 'Lenovo System Update for Windows 10 (32-bit, 64-bit), 8.1 (32-bit, 64-bit), 8 (32-bit, 64-bit), 7 (32-bit, 64-bit) - Desktop, Notebook, Workstation.', 50, 1, 'lenovo.png', '2017-11-17 15:43:24'),
(18, '3', 'Asus', 'Latest ASUS drivers, software, firmware and user manuals for W10, W8.1, W8, W7.', 25, 1, 'asus.png', '2017-11-17 15:43:27'),
(19, '3', 'Acer', 'Acer Drivers Update Utility updates your system drivers for Acer Laptops automatically with just several clicks. It will scan your system first then download and install Acer official drivers to let your Acer Laptop work properly. The Acer Driver Update Utility keeps your Acer laptop Windows system up-to-date. It detects which driver updates are relevant to your computer, and then helps you install them quickly and easily.', 25, 1, 'acer.png', '2017-11-17 15:43:31'),
(20, '3', 'Dell', 'This package provides the Dell System Software Utility and is supported on Latitude E5520/2120, OptiPlex 9010 and Vostro Notebook 3450 that are running the following Windows Operating System: Windows 10 (32-bit, 64-bit), 8.1 (32-bit, 64-bit), 8 (32-bit, 64-bit), 7 (32-bit, 64-bit).', 40, 1, 'dell.png', '2017-11-17 15:43:34'),
(21, '3', 'MSI', 'The Drivers and Utilities disc for MSI motherboards with AMD chipsets. MSI (Micro-Star International) drivers are tiny programs that enable your MSI (Micro-Star International) hardware to communicate with your operating system software. Maintaining updated MSI (Micro-Star International) software prevents crashes and maximizes hardware and system performance.', 80, 1, 'msi.png', '2017-11-17 15:43:37'),
(22, '3', 'Sony', 'Sony Vaio Drivers Download Utility is essential part of your computer. Usually we never care about our drivers until we get a problem. Some of the windows problems can be caused by drivers even looks like not related or by using out-dated drivers or installed wrong device drivers on your computer.', 40, 1, 'sony.png', '2017-11-17 15:43:40'),
(23, '3', 'Toshiba', 'Get the latest utility, drivers and BIOS updates for your laptop and accessories.', 35, 1, 'toshiba.png', '2017-11-17 15:43:43'),
(24, '4', 'Simulink', 'Simulink, developed by MathWorks, is a graphical programming environment for modeling, simulating and analyzing multidomain dynamical systems. Its primary interface is a graphical block diagramming tool and a customizable set of block libraries. ', 250, 1, 'simulink.png', '2017-11-17 15:43:54'),
(25, '4', 'Vensim', 'Vensim is simulation software developed by Ventana Systems. It primarily supports continuous simulation, with some discrete event and agent-based modelling capabilities. It is available commercially and as a free "Personal Learning Edition".', 230, 1, 'vensim.png', '2017-11-17 15:44:01'),
(26, '4', 'Wolfram System Modeler', 'Wolfram SystemModeler, developed by Wolfram MathCore, is a platform for engineering as well as life-science modeling and simulation based on the Modelica language.', 150, 1, 'wolfram.png', '2017-11-17 15:44:11'),
(27, '4', 'PLClogix', 'PLCLogix is a Programmable Logic Controller simulator that emulates the operation of the Logix 5000 PLC by Rockwell Automation. It provides users with the ability to write, edit and debug programs written using a tag-based format.', 200, 1, 'plc.png', '2017-11-17 15:44:18'),
(28, '4', 'Dymola', 'Rapidly solve complex multi-disciplinary systems modeling and analysis problems, using Dymola''s best-in-class Modelica and simulation technology. Dymola is a complete environment for model creation, testing, simulation and post-processing.', 100, 1, 'dymola.png', '2017-11-17 15:44:24'),
(29, '4', 'XAMPP', 'XAMPP is a very easy to install Apache Distribution for Linux, Solaris, Windows, and Mac OS X. The package includes the Apache web server, MySQL, PHP, Perl, a FTP server and phpMyAdmin.', 30, 1, 'xammp.png', '2017-11-19 03:56:41'),
(30, '4', 'Quartus Altera', 'This manual is designed for the novice Altera® Quartus® II design software user and provides an overview of the capabilities of the Quartus II software in programmable logic design. The Altera Quartus II software is the most comprehensive environment available for system-on-a-programmable-chip (SOPC) design.', 200, 1, 'altera.png', '2017-11-17 15:44:38'),
(31, '4', 'AutoCAD', 'A computer-aided drafting software program used to create blueprints for buildings, bridges, and computer chips, among other things. Discover howAutoCAD is used by drafters and other professionals.', 250, 1, 'autocad.png', '2017-11-17 15:44:43'),
(32, '4', 'Android Studio', 'Android Studio is the official integrated development environment for Google''s Android operating system, built on JetBrains'' IntelliJ IDEA software and designed specifically for Android development.', 50, 1, 'androidstudio.png', '2017-11-17 15:44:58'),
(33, '5', 'Android App Development for Beginners', 'The main goal of this course is to teach you anything you need to know about Java & Android to develop your own apps. By the end of this course, you''ll be able to create your own Android apps and add them to your portfolio. ', 150, 1, 'android.png', '2017-11-17 15:45:12'),
(34, '5', 'Learn SQL with ease', '- You''ll learn how to read and write complex queries to a database using one of the most in demand skills - PostgreSQL. These skills are also applicable to any other major SQL database, such as MySQL, Microsoft SQL Server, Amazon Redshift, Oracle, and much more.', 100, 1, 'sql.png', '2017-11-17 15:45:19'),
(35, '5', 'Learn basic Javascript', 'You will learn the very basic of the Javascript,on why and how the Javascript works. You will not just learn the JavaScript language itself, you will also learn how to program. How to solve problems. How to structure and organize code using common JavaScript patterns.', 100, 1, 'js.png', '2017-11-17 15:45:23'),
(36, '5', 'Introduction to PHP', 'In this course you''ll learn everything you need to know about PHP for Web Development. We''ll also learn how to set up an online development environment where you can write your code, and learn all about version control using git and github.', 150, 1, 'php.png', '2017-11-17 15:45:28'),
(37, '5', 'Bootstrap course with responsive web design', 'This course was made based on instructors experience in building Bootstrap website to help students excel with less stress. You will learn the basic of web development that has responsive web design.', 100, 1, 'bootstrap.png', '2017-11-17 15:45:35'),
(38, '5', 'Learn Database design with MySQL', 'This course will teach you the nuances of proper database design. It will teach you all the hidden tips and tricks and will ensure that you learn all the major concepts of a proper database design. This course will also teach you SQL and you will be a SQL power user by the end of this course.', 200, 1, 'database.png', '2017-11-17 15:45:40'),
(39, '6', 'Learn 3D Modelling', 'The course is project-based, so you will applying your new skills immediately to real 3D models. All the project files will be included, as well as additional references and resources - you''ll never get stuck. There are talking-head videos, powerful diagrams, quality screencasts and more.', 200, 1, '3d.png', '2017-11-17 15:45:49'),
(40, '6', 'Learn Photoshop from scratch', 'This course is for Photoshop beginners. It will start from very basics and will go up to the level where you can handle all kinds of projects with clear understanding of work environment, tools, resolution, color modes, layers and other essential concepts.', 50, 1, 'photoshop.png', '2017-11-17 15:45:59'),
(41, '6', 'User Experience Design Fundamentals', 'This course you''ll learn how to create effective web sites, mobile sites and mobile applications that encourage conversions and leave users wanting more.', 40, 1, 'ux.png', '2017-11-17 15:46:04'),
(42, '6', 'Graphic Design for Beginners', 'This course is for anyone who is interested in becoming a graphic designer, and especially geared towards total beginners. We will be using Photoshop, InDesign, and Illustrator; the industry-standard applications for graphic design.', 75, 1, 'graphic.png', '2017-11-17 15:46:09'),
(43, '6', 'Logo Design in Adobe Illustrator', 'In the course, I reveal the whole professional logo design process from start to finish covering everything from sketching, fonts, character placement, symbol development, colour application and much more. You''ll also learn insider tips and tricks as well as having a full briefing of logo design types in exclusive showcases.', 50, 1, 'logodesign.png', '2017-11-17 15:46:19'),
(44, '1', 'Werpa', 'retreyertet', 200, 0, 'IMC++.png', '2017-12-04 04:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `first_name`, `transaction_time`) VALUES
(11, 2, 'Celine', '2017-12-04 03:29:56'),
(12, 5, 'Jeru', '2017-12-04 04:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
`details_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`details_id`, `transaction_id`, `first_name`, `product_id`, `product_name`, `qty`, `price`, `user_id`, `timestamp`) VALUES
(25, 11, 'Celine', 4, 'Word Cookies', 1, 10, 2, '2017-12-04 03:29:56'),
(26, 11, 'Celine', 8, 'Math Board', 1, 5, 2, '2017-12-04 03:29:57'),
(27, 11, 'Celine', 1, 'Wordscapes', 1, 10, 2, '2017-12-04 03:29:57'),
(28, 11, 'Celine', 41, 'User Experience Design Fundamentals', 1, 40, 2, '2017-12-04 03:29:57'),
(29, 12, 'Jeru', 2, 'Bookworm', 1, 20, 5, '2017-12-04 04:06:06'),
(30, 12, 'Jeru', 3, 'Hangaroo', 1, 5, 5, '2017-12-04 04:06:06'),
(31, 12, 'Jeru', 4, 'Word Cookies', 1, 10, 5, '2017-12-04 04:06:06'),
(32, 12, 'Jeru', 1, 'Wordscapes', 1, 10, 5, '2017-12-04 04:06:06'),
(33, 12, 'Jeru', 8, 'Math Board', 1, 5, 5, '2017-12-04 04:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `type` int(1) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `type`, `user_time`) VALUES
(1, 'Admin', 'admin', 'admin@yahoo.com', '1234', 1, '2017-11-17 14:42:27'),
(3, 'Jeru Shalom', 'Barlos', 'jeru@yahoo.com', '12345', 0, '2017-12-04 04:00:41'),
(4, 'Jeru Shalom', 'Barlos', 'jeru@yahoo.com', '12345', 0, '2017-12-04 04:01:07'),
(5, 'Jeru', 'Barlos', 'jerubarlos@gmail.com', '12345', 0, '2017-12-04 04:04:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
 ADD PRIMARY KEY (`details_id`), ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
ADD CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
