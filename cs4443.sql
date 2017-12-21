-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 04:15 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs4443`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbnBook` int(11) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Authors` varchar(30) NOT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbnBook`, `Title`, `Authors`, `genre`, `Quantity`) VALUES
(13608916, 'System Analysis & Design', 'Kenneth E. Kendall', 'Science', 10),
(132151005, 'American Literature', 'Le Thi Thanh', 'American Literature', 10),
(132151006, 'Internet & World Wide Web How to Program', 'Paul J. Deitel', 'Science', 10),
(132151007, 'Norton Anthology of American Literature', 'Harris', 'Fiction', 10),
(132151008, 'A Writer’s Reference', 'Hacker, Diana', 'Horror', 10),
(132151009, 'An Object-Oriented Approach with UML', 'Alan Dennis', 'Science', 10),
(136089162, 'Course Technology', 'Gary B. Shelly', 'Science', 10);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `idLibrarian` varchar(15) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`idLibrarian`, `Password`, `FirstName`, `LastName`) VALUES
('admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(15) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_borrow_book`
--

CREATE TABLE `user_borrow_book` (
  `borrowId` int(11) NOT NULL,
  `Users_UserName` varchar(15) NOT NULL,
  `Book_isbnBook` int(11) NOT NULL,
  `DateBorrowed` varchar(30) NOT NULL,
  `DateReturned` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbnBook`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`idLibrarian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `user_borrow_book`
--
ALTER TABLE `user_borrow_book`
  ADD PRIMARY KEY (`borrowId`),
  ADD KEY `fk_ User_borrow_Book _Book1_idx` (`Book_isbnBook`),
  ADD KEY `fk_ User_borrow_Book _ Users1_idx` (`Users_UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_borrow_book`
--
ALTER TABLE `user_borrow_book`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_borrow_book`
--
ALTER TABLE `user_borrow_book`
  ADD CONSTRAINT `fk_ User_borrow_Book _Book1` FOREIGN KEY (`Book_isbnBook`) REFERENCES `book` (`isbnBook`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ User_borrow_Book _Users1` FOREIGN KEY (`Users_UserName`) REFERENCES `users` (`UserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
