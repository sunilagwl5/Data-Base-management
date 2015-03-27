-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2014 at 08:08 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbmsproject`
--
CREATE DATABASE IF NOT EXISTS `dbmsproject` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbmsproject`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `title` varchar(30) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL DEFAULT '',
  `publication` varchar(20) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `lib_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`isbn`),
  KEY `lib_id` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`title`, `isbn`, `publication`, `publication_year`, `author`, `lib_id`) VALUES
('Midnight Children', '0099578514', 'Random House Trade', 2006, 'Salman Rushdie', 'book07'),
('Life of Pi', '0156027321', 'Harvest Books', 2003, 'Yann Martel', 'book08'),
('The Namesake', '0618485228 ', 'Mariner Books', 2006, 'Jhumpa Lahiri', 'book06'),
('The God of Small Things', '0679457313', 'Panchama', 1997, 'Arundhati Roy', 'book05'),
('A Passage to India', '0808576887', 'Turtleback Books', 1965, ' E M Forster', 'book09'),
('The White Tiger', '1416562591 ', 'Scholastic', 2008, 'Aravind Adiga', 'book04'),
('Sacred Games', '8804560568', 'Mondadori', 2007, 'Vikram Chandra', 'book10'),
('Number Theory', 'book01', 'McGraw Hills', 2012, 'M Barton', 'book01'),
('Harry Potter Deathly Hallows', 'book02', 'Bloomsburry', 2008, 'J. K. Rowling', 'book02'),
('Everything in Database', 'book03', 'McGrawHills', 2014, 'Suman Saurabh', 'book03');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE IF NOT EXISTS `ebook` (
  `title` varchar(30) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL DEFAULT '',
  `publication` varchar(20) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `lib_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`isbn`),
  KEY `lib_id` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `emp_id` varchar(20) NOT NULL DEFAULT '',
  `course` varchar(20) DEFAULT NULL,
  `faculty_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`emp_id`, `course`, `faculty_id`) VALUES
('facultycse01', 'C, DBMS', 'facultycse01'),
('facultycse02', 'Java, Big data', 'facultycse02'),
('facultycse03', 'COA, OS', 'facultycse03'),
('facultyece01', 'signals', 'facultyece01'),
('facultyhss01', 'BTC', 'facultyhss01');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE IF NOT EXISTS `journals` (
  `title` varchar(30) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL DEFAULT '',
  `publication` varchar(20) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `lib_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`isbn`),
  KEY `lib_id` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`title`, `isbn`, `publication`, `publication_year`, `author`, `lib_id`) VALUES
('Advances in Computational Math', '1019-7168', 'Springer', 2002, 'J. Lowengrub', 'journ04'),
('Artificial Intelligence', 'journ01', 'Elsevier', 1970, 'A.G. Cohn', 'journ01'),
('Digital Investigation', 'journ02', 'Elsevier', 2009, 'Eoghan Casey', 'journ02'),
('Information and Software Techn', 'journ03', 'Elsevier', 2005, 'Claes Wohlin', 'journ03');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE IF NOT EXISTS `librarian` (
  `emp_id` varchar(20) NOT NULL DEFAULT '',
  `user_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`emp_id`, `user_id`) VALUES
('librarian01', 'librarian01'),
('librarian02', 'librarian02');

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE IF NOT EXISTS `magazines` (
  `title` varchar(30) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL DEFAULT '',
  `publication` varchar(20) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `lib_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`isbn`),
  KEY `lib_id` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `name` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL DEFAULT '',
  `passwd` varchar(20) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email_id` varchar(20) DEFAULT NULL,
  `isbn1` varchar(20) DEFAULT NULL,
  `isbn2` varchar(20) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_id` (`email_id`),
  KEY `isbn1` (`isbn1`),
  KEY `isbn2` (`isbn2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`name`, `user_id`, `passwd`, `phone_no`, `sex`, `join_date`, `address`, `email_id`, `isbn1`, `isbn2`, `post`) VALUES
('Subrat Kumar Dash', 'facultycse01', '2345678', '9530384760', 'Male', '2014-02-21', '  Kolkatta  ', 'skd@gmail.com', 'journ01', 'book01', '2'),
('Mukesh Jadon', 'facultycse02', '3456789', '9530384759', 'Male', '0000-00-00', 'Bharatpur', 'mjadon@lnmiit.ac.in', NULL, NULL, '2'),
('Preety Singh', 'facultycse03', '456789', '9530384758', 'Female', '0000-00-00', 'Jaipur', 'preetysingh@lnmiit.a', NULL, NULL, '2'),
('Raguvir Tomar', 'facultyece01', '567890123', '9530384757', 'Male', '0000-00-00', 'Hyderabad', 'rtomar@lnmiit.ac.in', NULL, NULL, '2'),
('Manju Dhariwal', 'facultyhss01', '4567890', '9530384746', 'Female', '0000-00-00', 'Jaipur', 'mdhariwal@lnmiit.ac.', NULL, NULL, '2'),
('Sunil Sharma', 'librarian01', '', '8875615382', 'Male', '0000-00-00', ' Jodhpur ', 'sunil.sharma@lnmiit.', NULL, NULL, '3'),
('Rashmita Kaur', 'librarian02', 'qwertyu', '8875615380', 'Female', '0000-00-00', 'Udaipur', 'rashmita.kaur@lnmiit', NULL, NULL, '3'),
('Nitesh Kumar Chaudha', 'y11uc147', 'qwerty', '9530384761', 'Male', '2014-02-21', 'Forbegaanj', 'nitesh@gmail.com', NULL, NULL, '1'),
('Shubham Jain', 'y11uc215', '98789', '9875243561', 'Male', '2014-02-21', 'Jaipur', 'shubhamjain27081993@', NULL, NULL, '1'),
('Suman Saurabh', 'y11uc231', '12321', '9461219803', 'Male', '2014-02-21', 'India', 'sumanrocs@gmail.com', NULL, NULL, '1'),
('Sunil Agarwal', 'y11uc233', 'asdfgh', '9461219809', 'Male', '2014-02-21', 'jaipur', 'sunil@gmail.com', NULL, NULL, '1'),
('Vibhuti Pratap Singh', 'y11uc250', 'zxcvbnm', '9461219801', 'Male', '2014-02-21', 'Motihari', 'vps@gmail.com', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `lid` varchar(20) NOT NULL DEFAULT '',
  `user_id` varchar(20) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `categary` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`lid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`lid`, `user_id`, `issue_date`, `price`, `status`, `categary`) VALUES
('book01', 'facultycse01', '2014-02-21', 120, 1, '1'),
('book02', NULL, NULL, 450, 0, '1'),
('book03', NULL, NULL, 350, 0, '1'),
('book04', NULL, NULL, 250, 0, '1'),
('book05', NULL, NULL, 215, 0, '1'),
('book06', NULL, NULL, 315, 0, '1'),
('book07', NULL, NULL, 360, 0, '1'),
('book08', NULL, NULL, 220, 0, '1'),
('book09', NULL, NULL, 150, 0, '1'),
('book10', NULL, NULL, 415, 0, '1'),
('journ01', 'facultycse01', '2014-02-21', 215, 1, '3'),
('journ02', NULL, NULL, 320, 0, '3'),
('journ03', NULL, NULL, 340, 0, '3'),
('journ04', NULL, NULL, 450, 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stream` varchar(20) DEFAULT NULL,
  `roll_no` varchar(20) NOT NULL DEFAULT '',
  `student_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`roll_no`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stream`, `roll_no`, `student_id`) VALUES
('ece', 'y11uc147', 'y11uc147'),
('ece', 'y11uc215', 'y11uc215'),
('cse', 'Y11UC231', 'y11uc231'),
('cse', 'y11uc233', 'y11uc233'),
('cse', 'y11uc250', 'y11uc250');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `stock` (`lid`);

--
-- Constraints for table `ebook`
--
ALTER TABLE `ebook`
  ADD CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `stock` (`lid`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `member` (`user_id`);

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `stock` (`lid`);

--
-- Constraints for table `librarian`
--
ALTER TABLE `librarian`
  ADD CONSTRAINT `librarian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `member` (`user_id`);

--
-- Constraints for table `magazines`
--
ALTER TABLE `magazines`
  ADD CONSTRAINT `magazines_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `stock` (`lid`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`isbn1`) REFERENCES `stock` (`lid`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`isbn2`) REFERENCES `stock` (`lid`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `member` (`user_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `member` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
