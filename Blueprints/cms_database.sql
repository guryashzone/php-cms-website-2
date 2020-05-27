-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2020 at 02:48 PM
-- Server version: 10.4.8-MariaDB
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
-- Database: `cms_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_category_master`
--

CREATE TABLE `post_category_master` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_short_name` varchar(10) NOT NULL,
  `category_status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category_master`
--

INSERT INTO `post_category_master` (`category_id`, `category_name`, `category_short_name`, `category_status`) VALUES
(1, 'Php Hypertext Preprocessor', 'PHP', 'active'),
(2, 'Javascript Tutorial', 'Javascript', 'active'),
(3, 'JQuery Tutorials', 'JQuery', 'active'),
(4, 'MySQL', 'MSQL', 'active'),
(5, 'Cascading Style Sheet', 'CSS', 'active'),
(6, 'Asynchronous Javascript & XML', 'AJAX', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment_master`
--

CREATE TABLE `post_comment_master` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `comment_text` varchar(250) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_type` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `comment_status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_comment_master`
--

INSERT INTO `post_comment_master` (`comment_id`, `post_id`, `author_id`, `comment_text`, `comment_date`, `comment_type`, `reply_id`, `comment_status`) VALUES
(1, 2, 3, 'Javascript if fun to code and easy to learn.', '2020-05-21 04:05:00', 1, 0, 'active'),
(2, 2, 3, 'It seems so..', '2020-05-21 04:05:00', 2, 1, 'active'),
(3, 1, 5, 'PHP is better than nay other language.', '2020-05-21 04:05:00pm', 0, 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_master`
--

CREATE TABLE `post_master` (
  `post_id` int(11) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_short_name` varchar(10) NOT NULL,
  `post_category` int(11) NOT NULL,
  `post_image_url` varchar(500) NOT NULL,
  `post_author_id` int(11) NOT NULL,
  `post_description` text NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `post_status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_master`
--

INSERT INTO `post_master` (`post_id`, `post_name`, `post_short_name`, `post_category`, `post_image_url`, `post_author_id`, `post_description`, `post_date`, `post_status`) VALUES
(1, 'PHP: Hypertext Preprocessor', 'PHP', 1, 'php-illustration.png', 3, 'PHP is a popular general-purpose scripting language that is especially suited to web development.[5] It was originally created by Rasmus Lerdorf in 1994;[6] the PHP reference implementation is now produced by The PHP Group.[7] PHP originally stood for Personal Home Page,[6] but it now stands for the recursive initialism PHP: Hypertext Preprocessor.[8]\r\n\r\nPHP code is usually processed on a web server by a PHP interpreter implemented as a module, a daemon or as a Common Gateway Interface (CGI) executable. On a web server, the result of the interpreted and executed PHP code – which may be any type of data, such as generated HTML or binary image data – would form the whole or part of a HTTP response. Various web template systems, web content management systems, and web frameworks exist which can be employed to orchestrate or facilitate the generation of that response. Additionally, PHP can be used for many programming tasks outside of the web context, such as standalone graphical applications[9] and robotic drone control.[10] Arbitrary PHP code can also be interpreted and executed via command-line interface (CLI).\r\n\r\nThe standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on almost every operating system and platform, free of charge.[11]', '2020-05-21 04:05:00', 'active'),
(2, 'Javascript: ECMA Script', 'JS', 2, 'javascript-1.png', 3, 'JavaScript (/ˈdʒɑːvəˌskrɪpt/),[6] often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.[7] JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.\r\n\r\nAlongside HTML and CSS, JavaScript is one of the core technologies of the World Wide Web.[8] JavaScript enables interactive web pages and is an essential part of web applications. The vast majority of websites use it for client-side page behavior,[9] and all major web browsers have a dedicated JavaScript engine to execute it.\r\n\r\nAs a multi-paradigm language, JavaScript supports event-driven, functional, and imperative programming styles. It has application programming interfaces (APIs) for working with text, dates, regular expressions, standard data structures, and the Document Object Model (DOM). However, the language itself does not include any input/output (I/O), such as networking, storage, or graphics facilities, as the host environment (usually a web browser) provides those APIs.\r\n\r\nJavaScript engines were originally used only in web browsers, but they are now embedded in some servers, usually via Node.js. They are also embedded in a variety of applications created with frameworks such as Electron and Cordova.', '2020-05-21 03:11:14', 'active'),
(3, 'Jquery Fundamentals', 'JQuery', 3, '9e024efb7a36a6850c1b7f34f1866260.png', 3, 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[2] It is free, open-source software using the permissive MIT License.[3] As of May 2019, jQuery is used by 73% of the 10 million most popular websites.[4] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having 3 to 4 times more usage than any other JavaScript library.[4][5]\r\n\r\njQuery\'s syntax is designed to make it easier to navigate a document, select DOM elements, create animations, handle events, and develop Ajax applications. jQuery also provides capabilities for developers to create plug-ins on top of the JavaScript library. This enables developers to create abstractions for low-level interaction and animation, advanced effects and high-level, themeable widgets. The modular approach to the jQuery library allows the creation of powerful dynamic web pages and Web applications.', '2020-05-26 02:21:52pm', 'active'),
(4, 'History of MySQL', 'MySQL Hist', 4, 'a7d06f3362cdb0112c35a38c74fcabc1.webp', 3, 'MySQL (/ˌmaɪˌɛsˌkjuːˈɛl/ \"My S-Q-L\")[5] is an open-source relational database management system (RDBMS).[5][6] Its name is a combination of \"My\", the name of co-founder Michael Widenius\'s daughter,[7] and \"SQL\", the abbreviation for Structured Query Language.\r\n\r\nMySQL is free and open-source software under the terms of the GNU General Public License, and is also available under a variety of proprietary licenses. MySQL was owned and sponsored by the Swedish company MySQL AB, which was bought by Sun Microsystems (now Oracle Corporation).[8] In 2010, when Oracle acquired Sun, Widenius forked the open-source MySQL project to create MariaDB.[9]\r\n\r\nMySQL is a component of the LAMP web application software stack (and others), which is an acronym for Linux, Apache, MySQL, Perl/PHP/Python. MySQL is used by many database-driven web applications, including Drupal, Joomla, phpBB, and WordPress. MySQL is also used by many popular websites, including Facebook,[10][11] Flickr,[12] MediaWiki,[13] Twitter,[14] and YouTube.[15]', '26 May, 2020 05:57:50pm', 'active'),
(5, 'CSS History', 'CSS Hist', 5, '03c9427e39448a5be5f81a9dbf20163e.png', 3, 'Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language like HTML.[1] CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.[2]\r\n\r\nCSS is designed to enable the separation of presentation and content, including layout, colors, and fonts.[3] This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple web pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.\r\n\r\nSeparation of formatting and content also makes it feasible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based browser or screen reader), and on Braille-based tactile devices. CSS also has rules for alternate formatting if the content is accessed on a mobile device.[4]\r\n\r\nThe name cascading comes from the specified priority scheme to determine which style rule applies if more than one rule matches a particular element. This cascading priority scheme is predictable.', '26 May, 2020 06:11pm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_address` varchar(1000) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_address`, `user_type`, `user_status`) VALUES
(3, 'Developer', 'guryash07@gmail.com', '7654356789', '$2y$10$s070t7klGXwbLlPy//Xr2eUQ8Q.mn84E51B1QLjNVtf3HQFaYMyYO', 'Russia', 3, 'active'),
(5, 'Guryash', 'guryash072@gmail.com', '9988787898', '$2y$10$vqpxRQAfXQbw2h58kNsbiOFh8qsIEtkf9BYgAmTCck5deFNmdeYny', 'Russia', 3, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE `user_type_master` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(20) NOT NULL,
  `user_type_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`user_type_id`, `user_type_name`, `user_type_status`) VALUES
(1, 'Admin', 'active'),
(2, 'Blogger', 'active'),
(3, 'Reader', 'active'),
(4, 'Writer', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_category_master`
--
ALTER TABLE `post_category_master`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post_comment_master`
--
ALTER TABLE `post_comment_master`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post_master`
--
ALTER TABLE `post_master`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type_master`
--
ALTER TABLE `user_type_master`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_category_master`
--
ALTER TABLE `post_category_master`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_comment_master`
--
ALTER TABLE `post_comment_master`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_master`
--
ALTER TABLE `post_master`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_type_master`
--
ALTER TABLE `user_type_master`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
